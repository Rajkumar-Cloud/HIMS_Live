<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_storemast_edit extends pharmacy_storemast
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_storemast';

	// Page object name
	public $PageObjName = "pharmacy_storemast_edit";

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

		// Table object (pharmacy_storemast)
		if (!isset($GLOBALS["pharmacy_storemast"]) || get_class($GLOBALS["pharmacy_storemast"]) == PROJECT_NAMESPACE . "pharmacy_storemast") {
			$GLOBALS["pharmacy_storemast"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_storemast"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_storemast');

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
		global $EXPORT, $pharmacy_storemast;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_storemast);
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
					if ($pageName == "pharmacy_storemastview.php")
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
					$this->terminate(GetUrl("pharmacy_storemastlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->BRCODE->setVisibility();
		$this->PRC->setVisibility();
		$this->TYPE->setVisibility();
		$this->DES->setVisibility();
		$this->UM->setVisibility();
		$this->RT->setVisibility();
		$this->UR->Visible = FALSE;
		$this->TAXP->Visible = FALSE;
		$this->BATCHNO->setVisibility();
		$this->OQ->Visible = FALSE;
		$this->RQ->Visible = FALSE;
		$this->MRQ->Visible = FALSE;
		$this->IQ->Visible = FALSE;
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->SALQTY->Visible = FALSE;
		$this->LASTPURDT->setVisibility();
		$this->LASTSUPP->setVisibility();
		$this->GENNAME->setVisibility();
		$this->LASTISSDT->setVisibility();
		$this->CREATEDDT->setVisibility();
		$this->OPPRC->Visible = FALSE;
		$this->RESTRICT->Visible = FALSE;
		$this->BAWAPRC->Visible = FALSE;
		$this->STAXPER->Visible = FALSE;
		$this->TAXTYPE->Visible = FALSE;
		$this->OLDTAXP->Visible = FALSE;
		$this->TAXUPD->Visible = FALSE;
		$this->PACKAGE->Visible = FALSE;
		$this->NEWRT->Visible = FALSE;
		$this->NEWMRP->Visible = FALSE;
		$this->NEWUR->Visible = FALSE;
		$this->STATUS->Visible = FALSE;
		$this->RETNQTY->Visible = FALSE;
		$this->KEMODISC->Visible = FALSE;
		$this->PATSALE->Visible = FALSE;
		$this->ORGAN->Visible = FALSE;
		$this->OLDRQ->Visible = FALSE;
		$this->DRID->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->COMBCODE->setVisibility();
		$this->GENCODE->setVisibility();
		$this->STRENGTH->setVisibility();
		$this->UNIT->setVisibility();
		$this->FORMULARY->setVisibility();
		$this->STOCK->Visible = FALSE;
		$this->RACKNO->setVisibility();
		$this->SUPPNAME->setVisibility();
		$this->COMBNAME->setVisibility();
		$this->GENERICNAME->setVisibility();
		$this->REMARK->setVisibility();
		$this->TEMP->setVisibility();
		$this->PACKING->Visible = FALSE;
		$this->PhysQty->Visible = FALSE;
		$this->LedQty->Visible = FALSE;
		$this->id->setVisibility();
		$this->PurValue->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SaleValue->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->SaleRate->setVisibility();
		$this->HospID->setVisibility();
		$this->BRNAME->setVisibility();
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
		$this->setupLookupOptions($this->LASTSUPP);
		$this->setupLookupOptions($this->GENNAME);
		$this->setupLookupOptions($this->DRID);
		$this->setupLookupOptions($this->MFRCODE);
		$this->setupLookupOptions($this->COMBCODE);
		$this->setupLookupOptions($this->GENCODE);
		$this->setupLookupOptions($this->SUPPNAME);
		$this->setupLookupOptions($this->COMBNAME);
		$this->setupLookupOptions($this->GENERICNAME);

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
					$this->terminate("pharmacy_storemastlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_storemastlist.php")
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

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'TYPE' first before field var 'x_TYPE'
		$val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
		if (!$this->TYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->TYPE->setFormValue($val);
		}

		// Check field name 'DES' first before field var 'x_DES'
		$val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
		if (!$this->DES->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DES->Visible = FALSE; // Disable update for API request
			else
				$this->DES->setFormValue($val);
		}

		// Check field name 'UM' first before field var 'x_UM'
		$val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
		if (!$this->UM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UM->Visible = FALSE; // Disable update for API request
			else
				$this->UM->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
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

		// Check field name 'LASTPURDT' first before field var 'x_LASTPURDT'
		$val = $CurrentForm->hasValue("LASTPURDT") ? $CurrentForm->getValue("LASTPURDT") : $CurrentForm->getValue("x_LASTPURDT");
		if (!$this->LASTPURDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LASTPURDT->Visible = FALSE; // Disable update for API request
			else
				$this->LASTPURDT->setFormValue($val);
			$this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
		}

		// Check field name 'LASTSUPP' first before field var 'x_LASTSUPP'
		$val = $CurrentForm->hasValue("LASTSUPP") ? $CurrentForm->getValue("LASTSUPP") : $CurrentForm->getValue("x_LASTSUPP");
		if (!$this->LASTSUPP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LASTSUPP->Visible = FALSE; // Disable update for API request
			else
				$this->LASTSUPP->setFormValue($val);
		}

		// Check field name 'GENNAME' first before field var 'x_GENNAME'
		$val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
		if (!$this->GENNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENNAME->setFormValue($val);
		}

		// Check field name 'LASTISSDT' first before field var 'x_LASTISSDT'
		$val = $CurrentForm->hasValue("LASTISSDT") ? $CurrentForm->getValue("LASTISSDT") : $CurrentForm->getValue("x_LASTISSDT");
		if (!$this->LASTISSDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LASTISSDT->Visible = FALSE; // Disable update for API request
			else
				$this->LASTISSDT->setFormValue($val);
			$this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
		}

		// Check field name 'CREATEDDT' first before field var 'x_CREATEDDT'
		$val = $CurrentForm->hasValue("CREATEDDT") ? $CurrentForm->getValue("CREATEDDT") : $CurrentForm->getValue("x_CREATEDDT");
		if (!$this->CREATEDDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CREATEDDT->Visible = FALSE; // Disable update for API request
			else
				$this->CREATEDDT->setFormValue($val);
			$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		}

		// Check field name 'DRID' first before field var 'x_DRID'
		$val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
		if (!$this->DRID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DRID->Visible = FALSE; // Disable update for API request
			else
				$this->DRID->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'COMBCODE' first before field var 'x_COMBCODE'
		$val = $CurrentForm->hasValue("COMBCODE") ? $CurrentForm->getValue("COMBCODE") : $CurrentForm->getValue("x_COMBCODE");
		if (!$this->COMBCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->COMBCODE->Visible = FALSE; // Disable update for API request
			else
				$this->COMBCODE->setFormValue($val);
		}

		// Check field name 'GENCODE' first before field var 'x_GENCODE'
		$val = $CurrentForm->hasValue("GENCODE") ? $CurrentForm->getValue("GENCODE") : $CurrentForm->getValue("x_GENCODE");
		if (!$this->GENCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENCODE->Visible = FALSE; // Disable update for API request
			else
				$this->GENCODE->setFormValue($val);
		}

		// Check field name 'STRENGTH' first before field var 'x_STRENGTH'
		$val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
		if (!$this->STRENGTH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->STRENGTH->Visible = FALSE; // Disable update for API request
			else
				$this->STRENGTH->setFormValue($val);
		}

		// Check field name 'UNIT' first before field var 'x_UNIT'
		$val = $CurrentForm->hasValue("UNIT") ? $CurrentForm->getValue("UNIT") : $CurrentForm->getValue("x_UNIT");
		if (!$this->UNIT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UNIT->Visible = FALSE; // Disable update for API request
			else
				$this->UNIT->setFormValue($val);
		}

		// Check field name 'FORMULARY' first before field var 'x_FORMULARY'
		$val = $CurrentForm->hasValue("FORMULARY") ? $CurrentForm->getValue("FORMULARY") : $CurrentForm->getValue("x_FORMULARY");
		if (!$this->FORMULARY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FORMULARY->Visible = FALSE; // Disable update for API request
			else
				$this->FORMULARY->setFormValue($val);
		}

		// Check field name 'RACKNO' first before field var 'x_RACKNO'
		$val = $CurrentForm->hasValue("RACKNO") ? $CurrentForm->getValue("RACKNO") : $CurrentForm->getValue("x_RACKNO");
		if (!$this->RACKNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RACKNO->Visible = FALSE; // Disable update for API request
			else
				$this->RACKNO->setFormValue($val);
		}

		// Check field name 'SUPPNAME' first before field var 'x_SUPPNAME'
		$val = $CurrentForm->hasValue("SUPPNAME") ? $CurrentForm->getValue("SUPPNAME") : $CurrentForm->getValue("x_SUPPNAME");
		if (!$this->SUPPNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SUPPNAME->Visible = FALSE; // Disable update for API request
			else
				$this->SUPPNAME->setFormValue($val);
		}

		// Check field name 'COMBNAME' first before field var 'x_COMBNAME'
		$val = $CurrentForm->hasValue("COMBNAME") ? $CurrentForm->getValue("COMBNAME") : $CurrentForm->getValue("x_COMBNAME");
		if (!$this->COMBNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->COMBNAME->Visible = FALSE; // Disable update for API request
			else
				$this->COMBNAME->setFormValue($val);
		}

		// Check field name 'GENERICNAME' first before field var 'x_GENERICNAME'
		$val = $CurrentForm->hasValue("GENERICNAME") ? $CurrentForm->getValue("GENERICNAME") : $CurrentForm->getValue("x_GENERICNAME");
		if (!$this->GENERICNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENERICNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENERICNAME->setFormValue($val);
		}

		// Check field name 'REMARK' first before field var 'x_REMARK'
		$val = $CurrentForm->hasValue("REMARK") ? $CurrentForm->getValue("REMARK") : $CurrentForm->getValue("x_REMARK");
		if (!$this->REMARK->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->REMARK->Visible = FALSE; // Disable update for API request
			else
				$this->REMARK->setFormValue($val);
		}

		// Check field name 'TEMP' first before field var 'x_TEMP'
		$val = $CurrentForm->hasValue("TEMP") ? $CurrentForm->getValue("TEMP") : $CurrentForm->getValue("x_TEMP");
		if (!$this->TEMP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TEMP->Visible = FALSE; // Disable update for API request
			else
				$this->TEMP->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurValue->Visible = FALSE; // Disable update for API request
			else
				$this->PurValue->setFormValue($val);
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

		// Check field name 'SaleValue' first before field var 'x_SaleValue'
		$val = $CurrentForm->hasValue("SaleValue") ? $CurrentForm->getValue("SaleValue") : $CurrentForm->getValue("x_SaleValue");
		if (!$this->SaleValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SaleValue->Visible = FALSE; // Disable update for API request
			else
				$this->SaleValue->setFormValue($val);
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

		// Check field name 'SaleRate' first before field var 'x_SaleRate'
		$val = $CurrentForm->hasValue("SaleRate") ? $CurrentForm->getValue("SaleRate") : $CurrentForm->getValue("x_SaleRate");
		if (!$this->SaleRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SaleRate->Visible = FALSE; // Disable update for API request
			else
				$this->SaleRate->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->BRNAME->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->TYPE->CurrentValue = $this->TYPE->FormValue;
		$this->DES->CurrentValue = $this->DES->FormValue;
		$this->UM->CurrentValue = $this->UM->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->LASTPURDT->CurrentValue = $this->LASTPURDT->FormValue;
		$this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
		$this->LASTSUPP->CurrentValue = $this->LASTSUPP->FormValue;
		$this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
		$this->LASTISSDT->CurrentValue = $this->LASTISSDT->FormValue;
		$this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
		$this->CREATEDDT->CurrentValue = $this->CREATEDDT->FormValue;
		$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		$this->DRID->CurrentValue = $this->DRID->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->COMBCODE->CurrentValue = $this->COMBCODE->FormValue;
		$this->GENCODE->CurrentValue = $this->GENCODE->FormValue;
		$this->STRENGTH->CurrentValue = $this->STRENGTH->FormValue;
		$this->UNIT->CurrentValue = $this->UNIT->FormValue;
		$this->FORMULARY->CurrentValue = $this->FORMULARY->FormValue;
		$this->RACKNO->CurrentValue = $this->RACKNO->FormValue;
		$this->SUPPNAME->CurrentValue = $this->SUPPNAME->FormValue;
		$this->COMBNAME->CurrentValue = $this->COMBNAME->FormValue;
		$this->GENERICNAME->CurrentValue = $this->GENERICNAME->FormValue;
		$this->REMARK->CurrentValue = $this->REMARK->FormValue;
		$this->TEMP->CurrentValue = $this->TEMP->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SaleValue->CurrentValue = $this->SaleValue->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->SaleRate->CurrentValue = $this->SaleRate->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
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
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->PRC->setDbValue($row['PRC']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DES->setDbValue($row['DES']);
		$this->UM->setDbValue($row['UM']);
		$this->RT->setDbValue($row['RT']);
		$this->UR->setDbValue($row['UR']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->SALQTY->setDbValue($row['SALQTY']);
		$this->LASTPURDT->setDbValue($row['LASTPURDT']);
		$this->LASTSUPP->setDbValue($row['LASTSUPP']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->LASTISSDT->setDbValue($row['LASTISSDT']);
		$this->CREATEDDT->setDbValue($row['CREATEDDT']);
		$this->OPPRC->setDbValue($row['OPPRC']);
		$this->RESTRICT->setDbValue($row['RESTRICT']);
		$this->BAWAPRC->setDbValue($row['BAWAPRC']);
		$this->STAXPER->setDbValue($row['STAXPER']);
		$this->TAXTYPE->setDbValue($row['TAXTYPE']);
		$this->OLDTAXP->setDbValue($row['OLDTAXP']);
		$this->TAXUPD->setDbValue($row['TAXUPD']);
		$this->PACKAGE->setDbValue($row['PACKAGE']);
		$this->NEWRT->setDbValue($row['NEWRT']);
		$this->NEWMRP->setDbValue($row['NEWMRP']);
		$this->NEWUR->setDbValue($row['NEWUR']);
		$this->STATUS->setDbValue($row['STATUS']);
		$this->RETNQTY->setDbValue($row['RETNQTY']);
		$this->KEMODISC->setDbValue($row['KEMODISC']);
		$this->PATSALE->setDbValue($row['PATSALE']);
		$this->ORGAN->setDbValue($row['ORGAN']);
		$this->OLDRQ->setDbValue($row['OLDRQ']);
		$this->DRID->setDbValue($row['DRID']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->COMBCODE->setDbValue($row['COMBCODE']);
		$this->GENCODE->setDbValue($row['GENCODE']);
		$this->STRENGTH->setDbValue($row['STRENGTH']);
		$this->UNIT->setDbValue($row['UNIT']);
		$this->FORMULARY->setDbValue($row['FORMULARY']);
		$this->STOCK->setDbValue($row['STOCK']);
		$this->RACKNO->setDbValue($row['RACKNO']);
		$this->SUPPNAME->setDbValue($row['SUPPNAME']);
		$this->COMBNAME->setDbValue($row['COMBNAME']);
		$this->GENERICNAME->setDbValue($row['GENERICNAME']);
		$this->REMARK->setDbValue($row['REMARK']);
		$this->TEMP->setDbValue($row['TEMP']);
		$this->PACKING->setDbValue($row['PACKING']);
		$this->PhysQty->setDbValue($row['PhysQty']);
		$this->LedQty->setDbValue($row['LedQty']);
		$this->id->setDbValue($row['id']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SaleValue->setDbValue($row['SaleValue']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->SaleRate->setDbValue($row['SaleRate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->BRNAME->setDbValue($row['BRNAME']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['BRCODE'] = NULL;
		$row['PRC'] = NULL;
		$row['TYPE'] = NULL;
		$row['DES'] = NULL;
		$row['UM'] = NULL;
		$row['RT'] = NULL;
		$row['UR'] = NULL;
		$row['TAXP'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['IQ'] = NULL;
		$row['MRP'] = NULL;
		$row['EXPDT'] = NULL;
		$row['SALQTY'] = NULL;
		$row['LASTPURDT'] = NULL;
		$row['LASTSUPP'] = NULL;
		$row['GENNAME'] = NULL;
		$row['LASTISSDT'] = NULL;
		$row['CREATEDDT'] = NULL;
		$row['OPPRC'] = NULL;
		$row['RESTRICT'] = NULL;
		$row['BAWAPRC'] = NULL;
		$row['STAXPER'] = NULL;
		$row['TAXTYPE'] = NULL;
		$row['OLDTAXP'] = NULL;
		$row['TAXUPD'] = NULL;
		$row['PACKAGE'] = NULL;
		$row['NEWRT'] = NULL;
		$row['NEWMRP'] = NULL;
		$row['NEWUR'] = NULL;
		$row['STATUS'] = NULL;
		$row['RETNQTY'] = NULL;
		$row['KEMODISC'] = NULL;
		$row['PATSALE'] = NULL;
		$row['ORGAN'] = NULL;
		$row['OLDRQ'] = NULL;
		$row['DRID'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['COMBCODE'] = NULL;
		$row['GENCODE'] = NULL;
		$row['STRENGTH'] = NULL;
		$row['UNIT'] = NULL;
		$row['FORMULARY'] = NULL;
		$row['STOCK'] = NULL;
		$row['RACKNO'] = NULL;
		$row['SUPPNAME'] = NULL;
		$row['COMBNAME'] = NULL;
		$row['GENERICNAME'] = NULL;
		$row['REMARK'] = NULL;
		$row['TEMP'] = NULL;
		$row['PACKING'] = NULL;
		$row['PhysQty'] = NULL;
		$row['LedQty'] = NULL;
		$row['id'] = NULL;
		$row['PurValue'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SaleValue'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['SaleRate'] = NULL;
		$row['HospID'] = NULL;
		$row['BRNAME'] = NULL;
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

		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue)))
			$this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue)))
			$this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SaleRate->FormValue == $this->SaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->SaleRate->CurrentValue)))
			$this->SaleRate->CurrentValue = ConvertToFloatString($this->SaleRate->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// BRCODE
		// PRC
		// TYPE
		// DES
		// UM
		// RT
		// UR
		// TAXP
		// BATCHNO
		// OQ
		// RQ
		// MRQ
		// IQ
		// MRP
		// EXPDT
		// SALQTY
		// LASTPURDT
		// LASTSUPP
		// GENNAME
		// LASTISSDT
		// CREATEDDT
		// OPPRC
		// RESTRICT
		// BAWAPRC
		// STAXPER
		// TAXTYPE
		// OLDTAXP
		// TAXUPD
		// PACKAGE
		// NEWRT
		// NEWMRP
		// NEWUR
		// STATUS
		// RETNQTY
		// KEMODISC
		// PATSALE
		// ORGAN
		// OLDRQ
		// DRID
		// MFRCODE
		// COMBCODE
		// GENCODE
		// STRENGTH
		// UNIT
		// FORMULARY
		// STOCK
		// RACKNO
		// SUPPNAME
		// COMBNAME
		// GENERICNAME
		// REMARK
		// TEMP
		// PACKING
		// PhysQty
		// LedQty
		// id
		// PurValue
		// PSGST
		// PCGST
		// SaleValue
		// SSGST
		// SCGST
		// SaleRate
		// HospID
		// BRNAME

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// TYPE
			if (strval($this->TYPE->CurrentValue) <> "") {
				$this->TYPE->ViewValue = $this->TYPE->optionCaption($this->TYPE->CurrentValue);
			} else {
				$this->TYPE->ViewValue = NULL;
			}
			$this->TYPE->ViewCustomAttributes = "";

			// DES
			$this->DES->ViewValue = $this->DES->CurrentValue;
			$this->DES->ViewCustomAttributes = "";

			// UM
			$this->UM->ViewValue = $this->UM->CurrentValue;
			$this->UM->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// LASTPURDT
			$this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
			$this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
			$this->LASTPURDT->ViewCustomAttributes = "";

			// LASTSUPP
			$curVal = strval($this->LASTSUPP->CurrentValue);
			if ($curVal <> "") {
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
				if ($this->LASTSUPP->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->LASTSUPP->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
					}
				}
			} else {
				$this->LASTSUPP->ViewValue = NULL;
			}
			$this->LASTSUPP->ViewCustomAttributes = "";

			// GENNAME
			$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENNAME->ViewValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->GENNAME->ViewValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
					}
				}
			} else {
				$this->GENNAME->ViewValue = NULL;
			}
			$this->GENNAME->ViewCustomAttributes = "";

			// LASTISSDT
			$this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
			$this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
			$this->LASTISSDT->ViewCustomAttributes = "";

			// CREATEDDT
			$this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
			$this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
			$this->CREATEDDT->ViewCustomAttributes = "";

			// DRID
			$curVal = strval($this->DRID->CurrentValue);
			if ($curVal <> "") {
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
				if ($this->DRID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DRID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DRID->ViewValue = $this->DRID->CurrentValue;
					}
				}
			} else {
				$this->DRID->ViewValue = NULL;
			}
			$this->DRID->ViewCustomAttributes = "";

			// MFRCODE
			$curVal = strval($this->MFRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
				if ($this->MFRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MFRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
					}
				}
			} else {
				$this->MFRCODE->ViewValue = NULL;
			}
			$this->MFRCODE->ViewCustomAttributes = "";

			// COMBCODE
			$curVal = strval($this->COMBCODE->CurrentValue);
			if ($curVal <> "") {
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
				if ($this->COMBCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->COMBCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
					}
				}
			} else {
				$this->COMBCODE->ViewValue = NULL;
			}
			$this->COMBCODE->ViewCustomAttributes = "";

			// GENCODE
			$curVal = strval($this->GENCODE->CurrentValue);
			if ($curVal <> "") {
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
				if ($this->GENCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
					}
				}
			} else {
				$this->GENCODE->ViewValue = NULL;
			}
			$this->GENCODE->ViewCustomAttributes = "";

			// STRENGTH
			$this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
			$this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
			$this->STRENGTH->ViewCustomAttributes = "";

			// UNIT
			if (strval($this->UNIT->CurrentValue) <> "") {
				$this->UNIT->ViewValue = $this->UNIT->optionCaption($this->UNIT->CurrentValue);
			} else {
				$this->UNIT->ViewValue = NULL;
			}
			$this->UNIT->ViewCustomAttributes = "";

			// FORMULARY
			if (strval($this->FORMULARY->CurrentValue) <> "") {
				$this->FORMULARY->ViewValue = $this->FORMULARY->optionCaption($this->FORMULARY->CurrentValue);
			} else {
				$this->FORMULARY->ViewValue = NULL;
			}
			$this->FORMULARY->ViewCustomAttributes = "";

			// RACKNO
			$this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
			$this->RACKNO->ViewCustomAttributes = "";

			// SUPPNAME
			$curVal = strval($this->SUPPNAME->CurrentValue);
			if ($curVal <> "") {
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
				if ($this->SUPPNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->SUPPNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
					}
				}
			} else {
				$this->SUPPNAME->ViewValue = NULL;
			}
			$this->SUPPNAME->ViewCustomAttributes = "";

			// COMBNAME
			$curVal = strval($this->COMBNAME->CurrentValue);
			if ($curVal <> "") {
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
				if ($this->COMBNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->COMBNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
					}
				}
			} else {
				$this->COMBNAME->ViewValue = NULL;
			}
			$this->COMBNAME->ViewCustomAttributes = "";

			// GENERICNAME
			$curVal = strval($this->GENERICNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
				if ($this->GENERICNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENERICNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
					}
				}
			} else {
				$this->GENERICNAME->ViewValue = NULL;
			}
			$this->GENERICNAME->ViewCustomAttributes = "";

			// REMARK
			$this->REMARK->ViewValue = $this->REMARK->CurrentValue;
			$this->REMARK->ViewCustomAttributes = "";

			// TEMP
			$this->TEMP->ViewValue = $this->TEMP->CurrentValue;
			$this->TEMP->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// SaleValue
			$this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
			$this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
			$this->SaleValue->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// SaleRate
			$this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
			$this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
			$this->SaleRate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// BRNAME
			$this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
			$this->BRNAME->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";
			$this->TYPE->TooltipValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";
			$this->DES->TooltipValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";
			$this->UM->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// LASTPURDT
			$this->LASTPURDT->LinkCustomAttributes = "";
			$this->LASTPURDT->HrefValue = "";
			$this->LASTPURDT->TooltipValue = "";

			// LASTSUPP
			$this->LASTSUPP->LinkCustomAttributes = "";
			$this->LASTSUPP->HrefValue = "";
			$this->LASTSUPP->TooltipValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";
			$this->GENNAME->TooltipValue = "";

			// LASTISSDT
			$this->LASTISSDT->LinkCustomAttributes = "";
			$this->LASTISSDT->HrefValue = "";
			$this->LASTISSDT->TooltipValue = "";

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";
			$this->CREATEDDT->TooltipValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";
			$this->DRID->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";
			$this->COMBCODE->TooltipValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";
			$this->GENCODE->TooltipValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";
			$this->STRENGTH->TooltipValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";
			$this->UNIT->TooltipValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";
			$this->FORMULARY->TooltipValue = "";

			// RACKNO
			$this->RACKNO->LinkCustomAttributes = "";
			$this->RACKNO->HrefValue = "";
			$this->RACKNO->TooltipValue = "";

			// SUPPNAME
			$this->SUPPNAME->LinkCustomAttributes = "";
			$this->SUPPNAME->HrefValue = "";
			$this->SUPPNAME->TooltipValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";
			$this->COMBNAME->TooltipValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";
			$this->GENERICNAME->TooltipValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";
			$this->REMARK->TooltipValue = "";

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";
			$this->TEMP->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";
			$this->SaleValue->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";
			$this->SaleRate->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// TYPE
			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			$this->TYPE->EditValue = $this->TYPE->options(TRUE);

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
			$this->DES->EditValue = HtmlEncode($this->DES->CurrentValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
			$this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

			// LASTPURDT
			$this->LASTPURDT->EditAttrs["class"] = "form-control";
			$this->LASTPURDT->EditCustomAttributes = "";
			$this->LASTPURDT->EditValue = HtmlEncode(FormatDateTime($this->LASTPURDT->CurrentValue, 8));
			$this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

			// LASTSUPP
			$this->LASTSUPP->EditCustomAttributes = "";
			$curVal = trim(strval($this->LASTSUPP->CurrentValue));
			if ($curVal <> "")
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
			else
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->Lookup !== NULL && is_array($this->LASTSUPP->Lookup->Options) ? $curVal : NULL;
			if ($this->LASTSUPP->ViewValue !== NULL) { // Load from cache
				$this->LASTSUPP->EditValue = array_values($this->LASTSUPP->Lookup->Options);
				if ($this->LASTSUPP->ViewValue == "")
					$this->LASTSUPP->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->LASTSUPP->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->LASTSUPP->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
				} else {
					$this->LASTSUPP->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->LASTSUPP->EditValue = $arwrk;
			}

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal <> "") {
				$this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->EditValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
					}
				}
			} else {
				$this->GENNAME->EditValue = NULL;
			}
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// LASTISSDT
			$this->LASTISSDT->EditAttrs["class"] = "form-control";
			$this->LASTISSDT->EditCustomAttributes = "";
			$this->LASTISSDT->EditValue = HtmlEncode(FormatDateTime($this->LASTISSDT->CurrentValue, 8));
			$this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

			// CREATEDDT
			// DRID

			$this->DRID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DRID->CurrentValue));
			if ($curVal <> "")
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
			else
				$this->DRID->ViewValue = $this->DRID->Lookup !== NULL && is_array($this->DRID->Lookup->Options) ? $curVal : NULL;
			if ($this->DRID->ViewValue !== NULL) { // Load from cache
				$this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
				if ($this->DRID->ViewValue == "")
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DRID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DRID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
				} else {
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DRID->EditValue = $arwrk;
			}

			// MFRCODE
			$this->MFRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->MFRCODE->CurrentValue));
			if ($curVal <> "")
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
			else
				$this->MFRCODE->ViewValue = $this->MFRCODE->Lookup !== NULL && is_array($this->MFRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->MFRCODE->ViewValue !== NULL) { // Load from cache
				$this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
				if ($this->MFRCODE->ViewValue == "")
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MFRCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
				} else {
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MFRCODE->EditValue = $arwrk;
			}

			// COMBCODE
			$this->COMBCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBCODE->CurrentValue));
			if ($curVal <> "")
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
			else
				$this->COMBCODE->ViewValue = $this->COMBCODE->Lookup !== NULL && is_array($this->COMBCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBCODE->ViewValue !== NULL) { // Load from cache
				$this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
				if ($this->COMBCODE->ViewValue == "")
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
				} else {
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBCODE->EditValue = $arwrk;
			}

			// GENCODE
			$this->GENCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENCODE->CurrentValue));
			if ($curVal <> "")
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
			else
				$this->GENCODE->ViewValue = $this->GENCODE->Lookup !== NULL && is_array($this->GENCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->GENCODE->ViewValue !== NULL) { // Load from cache
				$this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
				if ($this->GENCODE->ViewValue == "")
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
				} else {
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENCODE->EditValue = $arwrk;
			}

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->CurrentValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
			if (strval($this->STRENGTH->EditValue) <> "" && is_numeric($this->STRENGTH->EditValue))
				$this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);

			// UNIT
			$this->UNIT->EditAttrs["class"] = "form-control";
			$this->UNIT->EditCustomAttributes = "";
			$this->UNIT->EditValue = $this->UNIT->options(TRUE);

			// FORMULARY
			$this->FORMULARY->EditAttrs["class"] = "form-control";
			$this->FORMULARY->EditCustomAttributes = "";
			$this->FORMULARY->EditValue = $this->FORMULARY->options(TRUE);

			// RACKNO
			$this->RACKNO->EditAttrs["class"] = "form-control";
			$this->RACKNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RACKNO->CurrentValue = HtmlDecode($this->RACKNO->CurrentValue);
			$this->RACKNO->EditValue = HtmlEncode($this->RACKNO->CurrentValue);
			$this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

			// SUPPNAME
			$this->SUPPNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->SUPPNAME->CurrentValue));
			if ($curVal <> "")
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
			else
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->Lookup !== NULL && is_array($this->SUPPNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->SUPPNAME->ViewValue !== NULL) { // Load from cache
				$this->SUPPNAME->EditValue = array_values($this->SUPPNAME->Lookup->Options);
				if ($this->SUPPNAME->ViewValue == "")
					$this->SUPPNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->SUPPNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->SUPPNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
				} else {
					$this->SUPPNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->SUPPNAME->EditValue = $arwrk;
			}

			// COMBNAME
			$this->COMBNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBNAME->CurrentValue));
			if ($curVal <> "")
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			else
				$this->COMBNAME->ViewValue = $this->COMBNAME->Lookup !== NULL && is_array($this->COMBNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBNAME->ViewValue !== NULL) { // Load from cache
				$this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
				if ($this->COMBNAME->ViewValue == "")
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
				} else {
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBNAME->EditValue = $arwrk;
			}

			// GENERICNAME
			$this->GENERICNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENERICNAME->CurrentValue));
			if ($curVal <> "")
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			else
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->Lookup !== NULL && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->GENERICNAME->ViewValue !== NULL) { // Load from cache
				$this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
				if ($this->GENERICNAME->ViewValue == "")
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
				} else {
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENERICNAME->EditValue = $arwrk;
			}

			// REMARK
			$this->REMARK->EditAttrs["class"] = "form-control";
			$this->REMARK->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
			$this->REMARK->EditValue = HtmlEncode($this->REMARK->CurrentValue);
			$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

			// TEMP
			$this->TEMP->EditAttrs["class"] = "form-control";
			$this->TEMP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
			$this->TEMP->EditValue = HtmlEncode($this->TEMP->CurrentValue);
			$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

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

			// SaleValue
			$this->SaleValue->EditAttrs["class"] = "form-control";
			$this->SaleValue->EditCustomAttributes = "";
			$this->SaleValue->EditValue = HtmlEncode($this->SaleValue->CurrentValue);
			$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
			if (strval($this->SaleValue->EditValue) <> "" && is_numeric($this->SaleValue->EditValue))
				$this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);

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

			// SaleRate
			$this->SaleRate->EditAttrs["class"] = "form-control";
			$this->SaleRate->EditCustomAttributes = "";
			$this->SaleRate->EditValue = HtmlEncode($this->SaleRate->CurrentValue);
			$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
			if (strval($this->SaleRate->EditValue) <> "" && is_numeric($this->SaleRate->EditValue))
				$this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// BRNAME
			$this->BRNAME->EditAttrs["class"] = "form-control";
			$this->BRNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BRNAME->CurrentValue = HtmlDecode($this->BRNAME->CurrentValue);
			$this->BRNAME->EditValue = HtmlEncode($this->BRNAME->CurrentValue);
			$this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

			// Edit refer script
			// BRCODE

			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// LASTPURDT
			$this->LASTPURDT->LinkCustomAttributes = "";
			$this->LASTPURDT->HrefValue = "";

			// LASTSUPP
			$this->LASTSUPP->LinkCustomAttributes = "";
			$this->LASTSUPP->HrefValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";

			// LASTISSDT
			$this->LASTISSDT->LinkCustomAttributes = "";
			$this->LASTISSDT->HrefValue = "";

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";

			// RACKNO
			$this->RACKNO->LinkCustomAttributes = "";
			$this->RACKNO->HrefValue = "";

			// SUPPNAME
			$this->SUPPNAME->LinkCustomAttributes = "";
			$this->SUPPNAME->HrefValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
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
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->TYPE->Required) {
			if (!$this->TYPE->IsDetailKey && $this->TYPE->FormValue != NULL && $this->TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DES->Required) {
			if (!$this->DES->IsDetailKey && $this->DES->FormValue != NULL && $this->DES->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DES->caption(), $this->DES->RequiredErrorMessage));
			}
		}
		if ($this->UM->Required) {
			if (!$this->UM->IsDetailKey && $this->UM->FormValue != NULL && $this->UM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
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
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->OQ->Required) {
			if (!$this->OQ->IsDetailKey && $this->OQ->FormValue != NULL && $this->OQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
			}
		}
		if ($this->RQ->Required) {
			if (!$this->RQ->IsDetailKey && $this->RQ->FormValue != NULL && $this->RQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
			}
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
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
		if ($this->SALQTY->Required) {
			if (!$this->SALQTY->IsDetailKey && $this->SALQTY->FormValue != NULL && $this->SALQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SALQTY->caption(), $this->SALQTY->RequiredErrorMessage));
			}
		}
		if ($this->LASTPURDT->Required) {
			if (!$this->LASTPURDT->IsDetailKey && $this->LASTPURDT->FormValue != NULL && $this->LASTPURDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTPURDT->caption(), $this->LASTPURDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->LASTPURDT->FormValue)) {
			AddMessage($FormError, $this->LASTPURDT->errorMessage());
		}
		if ($this->LASTSUPP->Required) {
			if (!$this->LASTSUPP->IsDetailKey && $this->LASTSUPP->FormValue != NULL && $this->LASTSUPP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTSUPP->caption(), $this->LASTSUPP->RequiredErrorMessage));
			}
		}
		if ($this->GENNAME->Required) {
			if (!$this->GENNAME->IsDetailKey && $this->GENNAME->FormValue != NULL && $this->GENNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
			}
		}
		if ($this->LASTISSDT->Required) {
			if (!$this->LASTISSDT->IsDetailKey && $this->LASTISSDT->FormValue != NULL && $this->LASTISSDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTISSDT->caption(), $this->LASTISSDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->LASTISSDT->FormValue)) {
			AddMessage($FormError, $this->LASTISSDT->errorMessage());
		}
		if ($this->CREATEDDT->Required) {
			if (!$this->CREATEDDT->IsDetailKey && $this->CREATEDDT->FormValue != NULL && $this->CREATEDDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CREATEDDT->caption(), $this->CREATEDDT->RequiredErrorMessage));
			}
		}
		if ($this->OPPRC->Required) {
			if (!$this->OPPRC->IsDetailKey && $this->OPPRC->FormValue != NULL && $this->OPPRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPPRC->caption(), $this->OPPRC->RequiredErrorMessage));
			}
		}
		if ($this->RESTRICT->Required) {
			if (!$this->RESTRICT->IsDetailKey && $this->RESTRICT->FormValue != NULL && $this->RESTRICT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RESTRICT->caption(), $this->RESTRICT->RequiredErrorMessage));
			}
		}
		if ($this->BAWAPRC->Required) {
			if (!$this->BAWAPRC->IsDetailKey && $this->BAWAPRC->FormValue != NULL && $this->BAWAPRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BAWAPRC->caption(), $this->BAWAPRC->RequiredErrorMessage));
			}
		}
		if ($this->STAXPER->Required) {
			if (!$this->STAXPER->IsDetailKey && $this->STAXPER->FormValue != NULL && $this->STAXPER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAXPER->caption(), $this->STAXPER->RequiredErrorMessage));
			}
		}
		if ($this->TAXTYPE->Required) {
			if (!$this->TAXTYPE->IsDetailKey && $this->TAXTYPE->FormValue != NULL && $this->TAXTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXTYPE->caption(), $this->TAXTYPE->RequiredErrorMessage));
			}
		}
		if ($this->OLDTAXP->Required) {
			if (!$this->OLDTAXP->IsDetailKey && $this->OLDTAXP->FormValue != NULL && $this->OLDTAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDTAXP->caption(), $this->OLDTAXP->RequiredErrorMessage));
			}
		}
		if ($this->TAXUPD->Required) {
			if (!$this->TAXUPD->IsDetailKey && $this->TAXUPD->FormValue != NULL && $this->TAXUPD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXUPD->caption(), $this->TAXUPD->RequiredErrorMessage));
			}
		}
		if ($this->PACKAGE->Required) {
			if (!$this->PACKAGE->IsDetailKey && $this->PACKAGE->FormValue != NULL && $this->PACKAGE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PACKAGE->caption(), $this->PACKAGE->RequiredErrorMessage));
			}
		}
		if ($this->NEWRT->Required) {
			if (!$this->NEWRT->IsDetailKey && $this->NEWRT->FormValue != NULL && $this->NEWRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWRT->caption(), $this->NEWRT->RequiredErrorMessage));
			}
		}
		if ($this->NEWMRP->Required) {
			if (!$this->NEWMRP->IsDetailKey && $this->NEWMRP->FormValue != NULL && $this->NEWMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWMRP->caption(), $this->NEWMRP->RequiredErrorMessage));
			}
		}
		if ($this->NEWUR->Required) {
			if (!$this->NEWUR->IsDetailKey && $this->NEWUR->FormValue != NULL && $this->NEWUR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWUR->caption(), $this->NEWUR->RequiredErrorMessage));
			}
		}
		if ($this->STATUS->Required) {
			if (!$this->STATUS->IsDetailKey && $this->STATUS->FormValue != NULL && $this->STATUS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STATUS->caption(), $this->STATUS->RequiredErrorMessage));
			}
		}
		if ($this->RETNQTY->Required) {
			if (!$this->RETNQTY->IsDetailKey && $this->RETNQTY->FormValue != NULL && $this->RETNQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RETNQTY->caption(), $this->RETNQTY->RequiredErrorMessage));
			}
		}
		if ($this->KEMODISC->Required) {
			if (!$this->KEMODISC->IsDetailKey && $this->KEMODISC->FormValue != NULL && $this->KEMODISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->KEMODISC->caption(), $this->KEMODISC->RequiredErrorMessage));
			}
		}
		if ($this->PATSALE->Required) {
			if (!$this->PATSALE->IsDetailKey && $this->PATSALE->FormValue != NULL && $this->PATSALE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PATSALE->caption(), $this->PATSALE->RequiredErrorMessage));
			}
		}
		if ($this->ORGAN->Required) {
			if (!$this->ORGAN->IsDetailKey && $this->ORGAN->FormValue != NULL && $this->ORGAN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ORGAN->caption(), $this->ORGAN->RequiredErrorMessage));
			}
		}
		if ($this->OLDRQ->Required) {
			if (!$this->OLDRQ->IsDetailKey && $this->OLDRQ->FormValue != NULL && $this->OLDRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDRQ->caption(), $this->OLDRQ->RequiredErrorMessage));
			}
		}
		if ($this->DRID->Required) {
			if (!$this->DRID->IsDetailKey && $this->DRID->FormValue != NULL && $this->DRID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->COMBCODE->Required) {
			if (!$this->COMBCODE->IsDetailKey && $this->COMBCODE->FormValue != NULL && $this->COMBCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COMBCODE->caption(), $this->COMBCODE->RequiredErrorMessage));
			}
		}
		if ($this->GENCODE->Required) {
			if (!$this->GENCODE->IsDetailKey && $this->GENCODE->FormValue != NULL && $this->GENCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENCODE->caption(), $this->GENCODE->RequiredErrorMessage));
			}
		}
		if ($this->STRENGTH->Required) {
			if (!$this->STRENGTH->IsDetailKey && $this->STRENGTH->FormValue != NULL && $this->STRENGTH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STRENGTH->caption(), $this->STRENGTH->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->STRENGTH->FormValue)) {
			AddMessage($FormError, $this->STRENGTH->errorMessage());
		}
		if ($this->UNIT->Required) {
			if (!$this->UNIT->IsDetailKey && $this->UNIT->FormValue != NULL && $this->UNIT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UNIT->caption(), $this->UNIT->RequiredErrorMessage));
			}
		}
		if ($this->FORMULARY->Required) {
			if (!$this->FORMULARY->IsDetailKey && $this->FORMULARY->FormValue != NULL && $this->FORMULARY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FORMULARY->caption(), $this->FORMULARY->RequiredErrorMessage));
			}
		}
		if ($this->STOCK->Required) {
			if (!$this->STOCK->IsDetailKey && $this->STOCK->FormValue != NULL && $this->STOCK->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STOCK->caption(), $this->STOCK->RequiredErrorMessage));
			}
		}
		if ($this->RACKNO->Required) {
			if (!$this->RACKNO->IsDetailKey && $this->RACKNO->FormValue != NULL && $this->RACKNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RACKNO->caption(), $this->RACKNO->RequiredErrorMessage));
			}
		}
		if ($this->SUPPNAME->Required) {
			if (!$this->SUPPNAME->IsDetailKey && $this->SUPPNAME->FormValue != NULL && $this->SUPPNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SUPPNAME->caption(), $this->SUPPNAME->RequiredErrorMessage));
			}
		}
		if ($this->COMBNAME->Required) {
			if (!$this->COMBNAME->IsDetailKey && $this->COMBNAME->FormValue != NULL && $this->COMBNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COMBNAME->caption(), $this->COMBNAME->RequiredErrorMessage));
			}
		}
		if ($this->GENERICNAME->Required) {
			if (!$this->GENERICNAME->IsDetailKey && $this->GENERICNAME->FormValue != NULL && $this->GENERICNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENERICNAME->caption(), $this->GENERICNAME->RequiredErrorMessage));
			}
		}
		if ($this->REMARK->Required) {
			if (!$this->REMARK->IsDetailKey && $this->REMARK->FormValue != NULL && $this->REMARK->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REMARK->caption(), $this->REMARK->RequiredErrorMessage));
			}
		}
		if ($this->TEMP->Required) {
			if (!$this->TEMP->IsDetailKey && $this->TEMP->FormValue != NULL && $this->TEMP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMP->caption(), $this->TEMP->RequiredErrorMessage));
			}
		}
		if ($this->PACKING->Required) {
			if (!$this->PACKING->IsDetailKey && $this->PACKING->FormValue != NULL && $this->PACKING->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PACKING->caption(), $this->PACKING->RequiredErrorMessage));
			}
		}
		if ($this->PhysQty->Required) {
			if (!$this->PhysQty->IsDetailKey && $this->PhysQty->FormValue != NULL && $this->PhysQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PhysQty->caption(), $this->PhysQty->RequiredErrorMessage));
			}
		}
		if ($this->LedQty->Required) {
			if (!$this->LedQty->IsDetailKey && $this->LedQty->FormValue != NULL && $this->LedQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LedQty->caption(), $this->LedQty->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurValue->FormValue)) {
			AddMessage($FormError, $this->PurValue->errorMessage());
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
		if ($this->SaleValue->Required) {
			if (!$this->SaleValue->IsDetailKey && $this->SaleValue->FormValue != NULL && $this->SaleValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SaleValue->caption(), $this->SaleValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SaleValue->FormValue)) {
			AddMessage($FormError, $this->SaleValue->errorMessage());
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
		if ($this->SaleRate->Required) {
			if (!$this->SaleRate->IsDetailKey && $this->SaleRate->FormValue != NULL && $this->SaleRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SaleRate->caption(), $this->SaleRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SaleRate->FormValue)) {
			AddMessage($FormError, $this->SaleRate->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->HospID->FormValue)) {
			AddMessage($FormError, $this->HospID->errorMessage());
		}
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
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
		if ($this->PRC->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`PRC` = '" . AdjustSql($this->PRC->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PRC->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PRC->CurrentValue, $idxErrMsg);
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

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// TYPE
			$this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, NULL, $this->TYPE->ReadOnly);

			// DES
			$this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, NULL, $this->DES->ReadOnly);

			// UM
			$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, $this->UM->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// LASTPURDT
			$this->LASTPURDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTPURDT->CurrentValue, 0), NULL, $this->LASTPURDT->ReadOnly);

			// LASTSUPP
			$this->LASTSUPP->setDbValueDef($rsnew, $this->LASTSUPP->CurrentValue, NULL, $this->LASTSUPP->ReadOnly);

			// GENNAME
			$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, $this->GENNAME->ReadOnly);

			// LASTISSDT
			$this->LASTISSDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTISSDT->CurrentValue, 0), NULL, $this->LASTISSDT->ReadOnly);

			// CREATEDDT
			$this->CREATEDDT->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['CREATEDDT'] = &$this->CREATEDDT->DbValue;

			// DRID
			$this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, NULL, $this->DRID->ReadOnly);

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// COMBCODE
			$this->COMBCODE->setDbValueDef($rsnew, $this->COMBCODE->CurrentValue, NULL, $this->COMBCODE->ReadOnly);

			// GENCODE
			$this->GENCODE->setDbValueDef($rsnew, $this->GENCODE->CurrentValue, NULL, $this->GENCODE->ReadOnly);

			// STRENGTH
			$this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, NULL, $this->STRENGTH->ReadOnly);

			// UNIT
			$this->UNIT->setDbValueDef($rsnew, $this->UNIT->CurrentValue, NULL, $this->UNIT->ReadOnly);

			// FORMULARY
			$this->FORMULARY->setDbValueDef($rsnew, $this->FORMULARY->CurrentValue, NULL, $this->FORMULARY->ReadOnly);

			// RACKNO
			$this->RACKNO->setDbValueDef($rsnew, $this->RACKNO->CurrentValue, NULL, $this->RACKNO->ReadOnly);

			// SUPPNAME
			$this->SUPPNAME->setDbValueDef($rsnew, $this->SUPPNAME->CurrentValue, NULL, $this->SUPPNAME->ReadOnly);

			// COMBNAME
			$this->COMBNAME->setDbValueDef($rsnew, $this->COMBNAME->CurrentValue, NULL, $this->COMBNAME->ReadOnly);

			// GENERICNAME
			$this->GENERICNAME->setDbValueDef($rsnew, $this->GENERICNAME->CurrentValue, NULL, $this->GENERICNAME->ReadOnly);

			// REMARK
			$this->REMARK->setDbValueDef($rsnew, $this->REMARK->CurrentValue, NULL, $this->REMARK->ReadOnly);

			// TEMP
			$this->TEMP->setDbValueDef($rsnew, $this->TEMP->CurrentValue, NULL, $this->TEMP->ReadOnly);

			// PurValue
			$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, $this->PurValue->ReadOnly);

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SaleValue
			$this->SaleValue->setDbValueDef($rsnew, $this->SaleValue->CurrentValue, NULL, $this->SaleValue->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// SaleRate
			$this->SaleRate->setDbValueDef($rsnew, $this->SaleRate->CurrentValue, NULL, $this->SaleRate->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, $this->HospID->ReadOnly);

			// BRNAME
			$this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, NULL, $this->BRNAME->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_storemastlist.php"), "", $this->TableVar, TRUE);
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
						case "x_LASTSUPP":
							break;
						case "x_GENNAME":
							break;
						case "x_DRID":
							break;
						case "x_MFRCODE":
							break;
						case "x_COMBCODE":
							break;
						case "x_GENCODE":
							break;
						case "x_SUPPNAME":
							break;
						case "x_COMBNAME":
							break;
						case "x_GENERICNAME":
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
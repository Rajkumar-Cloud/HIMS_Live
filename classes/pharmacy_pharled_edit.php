<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_pharled_edit extends pharmacy_pharled
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_pharled';

	// Page object name
	public $PageObjName = "pharmacy_pharled_edit";

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

		// Table object (pharmacy_pharled)
		if (!isset($GLOBALS["pharmacy_pharled"]) || get_class($GLOBALS["pharmacy_pharled"]) == PROJECT_NAMESPACE . "pharmacy_pharled") {
			$GLOBALS["pharmacy_pharled"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_pharled"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Table object (pharmacy_billing_voucher)
		if (!isset($GLOBALS['pharmacy_billing_voucher']))
			$GLOBALS['pharmacy_billing_voucher'] = new pharmacy_billing_voucher();

		// Table object (pharmacy_billing_issue)
		if (!isset($GLOBALS['pharmacy_billing_issue']))
			$GLOBALS['pharmacy_billing_issue'] = new pharmacy_billing_issue();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_pharled');

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
		global $EXPORT, $pharmacy_pharled;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_pharled);
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
					if ($pageName == "pharmacy_pharledview.php")
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
					$this->terminate(GetUrl("pharmacy_pharledlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->SiNo->setVisibility();
		$this->SLNO->setVisibility();
		$this->Product->setVisibility();
		$this->RT->setVisibility();
		$this->IQ->setVisibility();
		$this->DAMT->setVisibility();
		$this->Mfg->setVisibility();
		$this->EXPDT->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->BRCODE->setVisibility();
		$this->TYPE->setVisibility();
		$this->DN->setVisibility();
		$this->RDN->setVisibility();
		$this->DT->setVisibility();
		$this->PRC->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->BILLNO->setVisibility();
		$this->BILLDT->setVisibility();
		$this->VALUE->setVisibility();
		$this->DISC->setVisibility();
		$this->TAXP->setVisibility();
		$this->TAX->setVisibility();
		$this->TAXR->setVisibility();
		$this->EMPNO->setVisibility();
		$this->PC->setVisibility();
		$this->DRNAME->setVisibility();
		$this->BTIME->setVisibility();
		$this->ONO->setVisibility();
		$this->ODT->setVisibility();
		$this->PURRT->setVisibility();
		$this->GRP->setVisibility();
		$this->IBATCH->setVisibility();
		$this->IPNO->setVisibility();
		$this->OPNO->setVisibility();
		$this->RECID->setVisibility();
		$this->FQTY->setVisibility();
		$this->UR->setVisibility();
		$this->DCID->setVisibility();
		$this->_USERID->setVisibility();
		$this->MODDT->setVisibility();
		$this->FYM->setVisibility();
		$this->PRCBATCH->setVisibility();
		$this->MRP->setVisibility();
		$this->BILLYM->setVisibility();
		$this->BILLGRP->setVisibility();
		$this->STAFF->setVisibility();
		$this->TEMPIPNO->setVisibility();
		$this->PRNTED->setVisibility();
		$this->PATNAME->setVisibility();
		$this->PJVNO->setVisibility();
		$this->PJVSLNO->setVisibility();
		$this->OTHDISC->setVisibility();
		$this->PJVYM->setVisibility();
		$this->PURDISCPER->setVisibility();
		$this->CASHIER->setVisibility();
		$this->CASHTIME->setVisibility();
		$this->CASHRECD->setVisibility();
		$this->CASHREFNO->setVisibility();
		$this->CASHIERSHIFT->setVisibility();
		$this->PRCODE->setVisibility();
		$this->RELEASEBY->setVisibility();
		$this->CRAUTHOR->setVisibility();
		$this->PAYMENT->setVisibility();
		$this->DRID->setVisibility();
		$this->WARD->setVisibility();
		$this->STAXTYPE->setVisibility();
		$this->PURDISCVAL->setVisibility();
		$this->RNDOFF->setVisibility();
		$this->DISCONMRP->setVisibility();
		$this->DELVDT->setVisibility();
		$this->DELVTIME->setVisibility();
		$this->DELVBY->setVisibility();
		$this->HOSPNO->setVisibility();
		$this->id->setVisibility();
		$this->pbv->setVisibility();
		$this->pbt->setVisibility();
		$this->HosoID->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->Reception->setVisibility();
		$this->PatID->setVisibility();
		$this->mrnno->setVisibility();
		$this->BRNAME->setVisibility();
		$this->sretid->setVisibility();
		$this->sprid->setVisibility();
		$this->baid->setVisibility();
		$this->isdate->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->PurValue->setVisibility();
		$this->PurRate->setVisibility();
		$this->PUnit->setVisibility();
		$this->SUnit->setVisibility();
		$this->HSNCODE->setVisibility();
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
		$this->setupLookupOptions($this->SLNO);

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
					$this->terminate("pharmacy_pharledlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_pharledlist.php")
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

		// Check field name 'SiNo' first before field var 'x_SiNo'
		$val = $CurrentForm->hasValue("SiNo") ? $CurrentForm->getValue("SiNo") : $CurrentForm->getValue("x_SiNo");
		if (!$this->SiNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SiNo->Visible = FALSE; // Disable update for API request
			else
				$this->SiNo->setFormValue($val);
		}

		// Check field name 'SLNO' first before field var 'x_SLNO'
		$val = $CurrentForm->hasValue("SLNO") ? $CurrentForm->getValue("SLNO") : $CurrentForm->getValue("x_SLNO");
		if (!$this->SLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SLNO->Visible = FALSE; // Disable update for API request
			else
				$this->SLNO->setFormValue($val);
		}

		// Check field name 'Product' first before field var 'x_Product'
		$val = $CurrentForm->hasValue("Product") ? $CurrentForm->getValue("Product") : $CurrentForm->getValue("x_Product");
		if (!$this->Product->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Product->Visible = FALSE; // Disable update for API request
			else
				$this->Product->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}

		// Check field name 'DAMT' first before field var 'x_DAMT'
		$val = $CurrentForm->hasValue("DAMT") ? $CurrentForm->getValue("DAMT") : $CurrentForm->getValue("x_DAMT");
		if (!$this->DAMT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DAMT->Visible = FALSE; // Disable update for API request
			else
				$this->DAMT->setFormValue($val);
		}

		// Check field name 'Mfg' first before field var 'x_Mfg'
		$val = $CurrentForm->hasValue("Mfg") ? $CurrentForm->getValue("Mfg") : $CurrentForm->getValue("x_Mfg");
		if (!$this->Mfg->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mfg->Visible = FALSE; // Disable update for API request
			else
				$this->Mfg->setFormValue($val);
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

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
		}

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'TYPE' first before field var 'x_TYPE'
		$val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
		if (!$this->TYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->TYPE->setFormValue($val);
		}

		// Check field name 'DN' first before field var 'x_DN'
		$val = $CurrentForm->hasValue("DN") ? $CurrentForm->getValue("DN") : $CurrentForm->getValue("x_DN");
		if (!$this->DN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DN->Visible = FALSE; // Disable update for API request
			else
				$this->DN->setFormValue($val);
		}

		// Check field name 'RDN' first before field var 'x_RDN'
		$val = $CurrentForm->hasValue("RDN") ? $CurrentForm->getValue("RDN") : $CurrentForm->getValue("x_RDN");
		if (!$this->RDN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RDN->Visible = FALSE; // Disable update for API request
			else
				$this->RDN->setFormValue($val);
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

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
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

		// Check field name 'VALUE' first before field var 'x_VALUE'
		$val = $CurrentForm->hasValue("VALUE") ? $CurrentForm->getValue("VALUE") : $CurrentForm->getValue("x_VALUE");
		if (!$this->VALUE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VALUE->Visible = FALSE; // Disable update for API request
			else
				$this->VALUE->setFormValue($val);
		}

		// Check field name 'DISC' first before field var 'x_DISC'
		$val = $CurrentForm->hasValue("DISC") ? $CurrentForm->getValue("DISC") : $CurrentForm->getValue("x_DISC");
		if (!$this->DISC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DISC->Visible = FALSE; // Disable update for API request
			else
				$this->DISC->setFormValue($val);
		}

		// Check field name 'TAXP' first before field var 'x_TAXP'
		$val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
		if (!$this->TAXP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TAXP->Visible = FALSE; // Disable update for API request
			else
				$this->TAXP->setFormValue($val);
		}

		// Check field name 'TAX' first before field var 'x_TAX'
		$val = $CurrentForm->hasValue("TAX") ? $CurrentForm->getValue("TAX") : $CurrentForm->getValue("x_TAX");
		if (!$this->TAX->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TAX->Visible = FALSE; // Disable update for API request
			else
				$this->TAX->setFormValue($val);
		}

		// Check field name 'TAXR' first before field var 'x_TAXR'
		$val = $CurrentForm->hasValue("TAXR") ? $CurrentForm->getValue("TAXR") : $CurrentForm->getValue("x_TAXR");
		if (!$this->TAXR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TAXR->Visible = FALSE; // Disable update for API request
			else
				$this->TAXR->setFormValue($val);
		}

		// Check field name 'EMPNO' first before field var 'x_EMPNO'
		$val = $CurrentForm->hasValue("EMPNO") ? $CurrentForm->getValue("EMPNO") : $CurrentForm->getValue("x_EMPNO");
		if (!$this->EMPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EMPNO->Visible = FALSE; // Disable update for API request
			else
				$this->EMPNO->setFormValue($val);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'DRNAME' first before field var 'x_DRNAME'
		$val = $CurrentForm->hasValue("DRNAME") ? $CurrentForm->getValue("DRNAME") : $CurrentForm->getValue("x_DRNAME");
		if (!$this->DRNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->DRNAME->setFormValue($val);
		}

		// Check field name 'BTIME' first before field var 'x_BTIME'
		$val = $CurrentForm->hasValue("BTIME") ? $CurrentForm->getValue("BTIME") : $CurrentForm->getValue("x_BTIME");
		if (!$this->BTIME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BTIME->Visible = FALSE; // Disable update for API request
			else
				$this->BTIME->setFormValue($val);
		}

		// Check field name 'ONO' first before field var 'x_ONO'
		$val = $CurrentForm->hasValue("ONO") ? $CurrentForm->getValue("ONO") : $CurrentForm->getValue("x_ONO");
		if (!$this->ONO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ONO->Visible = FALSE; // Disable update for API request
			else
				$this->ONO->setFormValue($val);
		}

		// Check field name 'ODT' first before field var 'x_ODT'
		$val = $CurrentForm->hasValue("ODT") ? $CurrentForm->getValue("ODT") : $CurrentForm->getValue("x_ODT");
		if (!$this->ODT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ODT->Visible = FALSE; // Disable update for API request
			else
				$this->ODT->setFormValue($val);
			$this->ODT->CurrentValue = UnFormatDateTime($this->ODT->CurrentValue, 0);
		}

		// Check field name 'PURRT' first before field var 'x_PURRT'
		$val = $CurrentForm->hasValue("PURRT") ? $CurrentForm->getValue("PURRT") : $CurrentForm->getValue("x_PURRT");
		if (!$this->PURRT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PURRT->Visible = FALSE; // Disable update for API request
			else
				$this->PURRT->setFormValue($val);
		}

		// Check field name 'GRP' first before field var 'x_GRP'
		$val = $CurrentForm->hasValue("GRP") ? $CurrentForm->getValue("GRP") : $CurrentForm->getValue("x_GRP");
		if (!$this->GRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRP->Visible = FALSE; // Disable update for API request
			else
				$this->GRP->setFormValue($val);
		}

		// Check field name 'IBATCH' first before field var 'x_IBATCH'
		$val = $CurrentForm->hasValue("IBATCH") ? $CurrentForm->getValue("IBATCH") : $CurrentForm->getValue("x_IBATCH");
		if (!$this->IBATCH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IBATCH->Visible = FALSE; // Disable update for API request
			else
				$this->IBATCH->setFormValue($val);
		}

		// Check field name 'IPNO' first before field var 'x_IPNO'
		$val = $CurrentForm->hasValue("IPNO") ? $CurrentForm->getValue("IPNO") : $CurrentForm->getValue("x_IPNO");
		if (!$this->IPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IPNO->Visible = FALSE; // Disable update for API request
			else
				$this->IPNO->setFormValue($val);
		}

		// Check field name 'OPNO' first before field var 'x_OPNO'
		$val = $CurrentForm->hasValue("OPNO") ? $CurrentForm->getValue("OPNO") : $CurrentForm->getValue("x_OPNO");
		if (!$this->OPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OPNO->Visible = FALSE; // Disable update for API request
			else
				$this->OPNO->setFormValue($val);
		}

		// Check field name 'RECID' first before field var 'x_RECID'
		$val = $CurrentForm->hasValue("RECID") ? $CurrentForm->getValue("RECID") : $CurrentForm->getValue("x_RECID");
		if (!$this->RECID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RECID->Visible = FALSE; // Disable update for API request
			else
				$this->RECID->setFormValue($val);
		}

		// Check field name 'FQTY' first before field var 'x_FQTY'
		$val = $CurrentForm->hasValue("FQTY") ? $CurrentForm->getValue("FQTY") : $CurrentForm->getValue("x_FQTY");
		if (!$this->FQTY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FQTY->Visible = FALSE; // Disable update for API request
			else
				$this->FQTY->setFormValue($val);
		}

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UR->Visible = FALSE; // Disable update for API request
			else
				$this->UR->setFormValue($val);
		}

		// Check field name 'DCID' first before field var 'x_DCID'
		$val = $CurrentForm->hasValue("DCID") ? $CurrentForm->getValue("DCID") : $CurrentForm->getValue("x_DCID");
		if (!$this->DCID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DCID->Visible = FALSE; // Disable update for API request
			else
				$this->DCID->setFormValue($val);
		}

		// Check field name 'USERID' first before field var 'x__USERID'
		$val = $CurrentForm->hasValue("USERID") ? $CurrentForm->getValue("USERID") : $CurrentForm->getValue("x__USERID");
		if (!$this->_USERID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_USERID->Visible = FALSE; // Disable update for API request
			else
				$this->_USERID->setFormValue($val);
		}

		// Check field name 'MODDT' first before field var 'x_MODDT'
		$val = $CurrentForm->hasValue("MODDT") ? $CurrentForm->getValue("MODDT") : $CurrentForm->getValue("x_MODDT");
		if (!$this->MODDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MODDT->Visible = FALSE; // Disable update for API request
			else
				$this->MODDT->setFormValue($val);
			$this->MODDT->CurrentValue = UnFormatDateTime($this->MODDT->CurrentValue, 0);
		}

		// Check field name 'FYM' first before field var 'x_FYM'
		$val = $CurrentForm->hasValue("FYM") ? $CurrentForm->getValue("FYM") : $CurrentForm->getValue("x_FYM");
		if (!$this->FYM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FYM->Visible = FALSE; // Disable update for API request
			else
				$this->FYM->setFormValue($val);
		}

		// Check field name 'PRCBATCH' first before field var 'x_PRCBATCH'
		$val = $CurrentForm->hasValue("PRCBATCH") ? $CurrentForm->getValue("PRCBATCH") : $CurrentForm->getValue("x_PRCBATCH");
		if (!$this->PRCBATCH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRCBATCH->Visible = FALSE; // Disable update for API request
			else
				$this->PRCBATCH->setFormValue($val);
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
		}

		// Check field name 'BILLYM' first before field var 'x_BILLYM'
		$val = $CurrentForm->hasValue("BILLYM") ? $CurrentForm->getValue("BILLYM") : $CurrentForm->getValue("x_BILLYM");
		if (!$this->BILLYM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLYM->Visible = FALSE; // Disable update for API request
			else
				$this->BILLYM->setFormValue($val);
		}

		// Check field name 'BILLGRP' first before field var 'x_BILLGRP'
		$val = $CurrentForm->hasValue("BILLGRP") ? $CurrentForm->getValue("BILLGRP") : $CurrentForm->getValue("x_BILLGRP");
		if (!$this->BILLGRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLGRP->Visible = FALSE; // Disable update for API request
			else
				$this->BILLGRP->setFormValue($val);
		}

		// Check field name 'STAFF' first before field var 'x_STAFF'
		$val = $CurrentForm->hasValue("STAFF") ? $CurrentForm->getValue("STAFF") : $CurrentForm->getValue("x_STAFF");
		if (!$this->STAFF->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->STAFF->Visible = FALSE; // Disable update for API request
			else
				$this->STAFF->setFormValue($val);
		}

		// Check field name 'TEMPIPNO' first before field var 'x_TEMPIPNO'
		$val = $CurrentForm->hasValue("TEMPIPNO") ? $CurrentForm->getValue("TEMPIPNO") : $CurrentForm->getValue("x_TEMPIPNO");
		if (!$this->TEMPIPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TEMPIPNO->Visible = FALSE; // Disable update for API request
			else
				$this->TEMPIPNO->setFormValue($val);
		}

		// Check field name 'PRNTED' first before field var 'x_PRNTED'
		$val = $CurrentForm->hasValue("PRNTED") ? $CurrentForm->getValue("PRNTED") : $CurrentForm->getValue("x_PRNTED");
		if (!$this->PRNTED->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRNTED->Visible = FALSE; // Disable update for API request
			else
				$this->PRNTED->setFormValue($val);
		}

		// Check field name 'PATNAME' first before field var 'x_PATNAME'
		$val = $CurrentForm->hasValue("PATNAME") ? $CurrentForm->getValue("PATNAME") : $CurrentForm->getValue("x_PATNAME");
		if (!$this->PATNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PATNAME->Visible = FALSE; // Disable update for API request
			else
				$this->PATNAME->setFormValue($val);
		}

		// Check field name 'PJVNO' first before field var 'x_PJVNO'
		$val = $CurrentForm->hasValue("PJVNO") ? $CurrentForm->getValue("PJVNO") : $CurrentForm->getValue("x_PJVNO");
		if (!$this->PJVNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PJVNO->Visible = FALSE; // Disable update for API request
			else
				$this->PJVNO->setFormValue($val);
		}

		// Check field name 'PJVSLNO' first before field var 'x_PJVSLNO'
		$val = $CurrentForm->hasValue("PJVSLNO") ? $CurrentForm->getValue("PJVSLNO") : $CurrentForm->getValue("x_PJVSLNO");
		if (!$this->PJVSLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PJVSLNO->Visible = FALSE; // Disable update for API request
			else
				$this->PJVSLNO->setFormValue($val);
		}

		// Check field name 'OTHDISC' first before field var 'x_OTHDISC'
		$val = $CurrentForm->hasValue("OTHDISC") ? $CurrentForm->getValue("OTHDISC") : $CurrentForm->getValue("x_OTHDISC");
		if (!$this->OTHDISC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OTHDISC->Visible = FALSE; // Disable update for API request
			else
				$this->OTHDISC->setFormValue($val);
		}

		// Check field name 'PJVYM' first before field var 'x_PJVYM'
		$val = $CurrentForm->hasValue("PJVYM") ? $CurrentForm->getValue("PJVYM") : $CurrentForm->getValue("x_PJVYM");
		if (!$this->PJVYM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PJVYM->Visible = FALSE; // Disable update for API request
			else
				$this->PJVYM->setFormValue($val);
		}

		// Check field name 'PURDISCPER' first before field var 'x_PURDISCPER'
		$val = $CurrentForm->hasValue("PURDISCPER") ? $CurrentForm->getValue("PURDISCPER") : $CurrentForm->getValue("x_PURDISCPER");
		if (!$this->PURDISCPER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PURDISCPER->Visible = FALSE; // Disable update for API request
			else
				$this->PURDISCPER->setFormValue($val);
		}

		// Check field name 'CASHIER' first before field var 'x_CASHIER'
		$val = $CurrentForm->hasValue("CASHIER") ? $CurrentForm->getValue("CASHIER") : $CurrentForm->getValue("x_CASHIER");
		if (!$this->CASHIER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CASHIER->Visible = FALSE; // Disable update for API request
			else
				$this->CASHIER->setFormValue($val);
		}

		// Check field name 'CASHTIME' first before field var 'x_CASHTIME'
		$val = $CurrentForm->hasValue("CASHTIME") ? $CurrentForm->getValue("CASHTIME") : $CurrentForm->getValue("x_CASHTIME");
		if (!$this->CASHTIME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CASHTIME->Visible = FALSE; // Disable update for API request
			else
				$this->CASHTIME->setFormValue($val);
		}

		// Check field name 'CASHRECD' first before field var 'x_CASHRECD'
		$val = $CurrentForm->hasValue("CASHRECD") ? $CurrentForm->getValue("CASHRECD") : $CurrentForm->getValue("x_CASHRECD");
		if (!$this->CASHRECD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CASHRECD->Visible = FALSE; // Disable update for API request
			else
				$this->CASHRECD->setFormValue($val);
		}

		// Check field name 'CASHREFNO' first before field var 'x_CASHREFNO'
		$val = $CurrentForm->hasValue("CASHREFNO") ? $CurrentForm->getValue("CASHREFNO") : $CurrentForm->getValue("x_CASHREFNO");
		if (!$this->CASHREFNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CASHREFNO->Visible = FALSE; // Disable update for API request
			else
				$this->CASHREFNO->setFormValue($val);
		}

		// Check field name 'CASHIERSHIFT' first before field var 'x_CASHIERSHIFT'
		$val = $CurrentForm->hasValue("CASHIERSHIFT") ? $CurrentForm->getValue("CASHIERSHIFT") : $CurrentForm->getValue("x_CASHIERSHIFT");
		if (!$this->CASHIERSHIFT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CASHIERSHIFT->Visible = FALSE; // Disable update for API request
			else
				$this->CASHIERSHIFT->setFormValue($val);
		}

		// Check field name 'PRCODE' first before field var 'x_PRCODE'
		$val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
		if (!$this->PRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->PRCODE->setFormValue($val);
		}

		// Check field name 'RELEASEBY' first before field var 'x_RELEASEBY'
		$val = $CurrentForm->hasValue("RELEASEBY") ? $CurrentForm->getValue("RELEASEBY") : $CurrentForm->getValue("x_RELEASEBY");
		if (!$this->RELEASEBY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RELEASEBY->Visible = FALSE; // Disable update for API request
			else
				$this->RELEASEBY->setFormValue($val);
		}

		// Check field name 'CRAUTHOR' first before field var 'x_CRAUTHOR'
		$val = $CurrentForm->hasValue("CRAUTHOR") ? $CurrentForm->getValue("CRAUTHOR") : $CurrentForm->getValue("x_CRAUTHOR");
		if (!$this->CRAUTHOR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CRAUTHOR->Visible = FALSE; // Disable update for API request
			else
				$this->CRAUTHOR->setFormValue($val);
		}

		// Check field name 'PAYMENT' first before field var 'x_PAYMENT'
		$val = $CurrentForm->hasValue("PAYMENT") ? $CurrentForm->getValue("PAYMENT") : $CurrentForm->getValue("x_PAYMENT");
		if (!$this->PAYMENT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PAYMENT->Visible = FALSE; // Disable update for API request
			else
				$this->PAYMENT->setFormValue($val);
		}

		// Check field name 'DRID' first before field var 'x_DRID'
		$val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
		if (!$this->DRID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DRID->Visible = FALSE; // Disable update for API request
			else
				$this->DRID->setFormValue($val);
		}

		// Check field name 'WARD' first before field var 'x_WARD'
		$val = $CurrentForm->hasValue("WARD") ? $CurrentForm->getValue("WARD") : $CurrentForm->getValue("x_WARD");
		if (!$this->WARD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WARD->Visible = FALSE; // Disable update for API request
			else
				$this->WARD->setFormValue($val);
		}

		// Check field name 'STAXTYPE' first before field var 'x_STAXTYPE'
		$val = $CurrentForm->hasValue("STAXTYPE") ? $CurrentForm->getValue("STAXTYPE") : $CurrentForm->getValue("x_STAXTYPE");
		if (!$this->STAXTYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->STAXTYPE->Visible = FALSE; // Disable update for API request
			else
				$this->STAXTYPE->setFormValue($val);
		}

		// Check field name 'PURDISCVAL' first before field var 'x_PURDISCVAL'
		$val = $CurrentForm->hasValue("PURDISCVAL") ? $CurrentForm->getValue("PURDISCVAL") : $CurrentForm->getValue("x_PURDISCVAL");
		if (!$this->PURDISCVAL->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PURDISCVAL->Visible = FALSE; // Disable update for API request
			else
				$this->PURDISCVAL->setFormValue($val);
		}

		// Check field name 'RNDOFF' first before field var 'x_RNDOFF'
		$val = $CurrentForm->hasValue("RNDOFF") ? $CurrentForm->getValue("RNDOFF") : $CurrentForm->getValue("x_RNDOFF");
		if (!$this->RNDOFF->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RNDOFF->Visible = FALSE; // Disable update for API request
			else
				$this->RNDOFF->setFormValue($val);
		}

		// Check field name 'DISCONMRP' first before field var 'x_DISCONMRP'
		$val = $CurrentForm->hasValue("DISCONMRP") ? $CurrentForm->getValue("DISCONMRP") : $CurrentForm->getValue("x_DISCONMRP");
		if (!$this->DISCONMRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DISCONMRP->Visible = FALSE; // Disable update for API request
			else
				$this->DISCONMRP->setFormValue($val);
		}

		// Check field name 'DELVDT' first before field var 'x_DELVDT'
		$val = $CurrentForm->hasValue("DELVDT") ? $CurrentForm->getValue("DELVDT") : $CurrentForm->getValue("x_DELVDT");
		if (!$this->DELVDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DELVDT->Visible = FALSE; // Disable update for API request
			else
				$this->DELVDT->setFormValue($val);
			$this->DELVDT->CurrentValue = UnFormatDateTime($this->DELVDT->CurrentValue, 0);
		}

		// Check field name 'DELVTIME' first before field var 'x_DELVTIME'
		$val = $CurrentForm->hasValue("DELVTIME") ? $CurrentForm->getValue("DELVTIME") : $CurrentForm->getValue("x_DELVTIME");
		if (!$this->DELVTIME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DELVTIME->Visible = FALSE; // Disable update for API request
			else
				$this->DELVTIME->setFormValue($val);
		}

		// Check field name 'DELVBY' first before field var 'x_DELVBY'
		$val = $CurrentForm->hasValue("DELVBY") ? $CurrentForm->getValue("DELVBY") : $CurrentForm->getValue("x_DELVBY");
		if (!$this->DELVBY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DELVBY->Visible = FALSE; // Disable update for API request
			else
				$this->DELVBY->setFormValue($val);
		}

		// Check field name 'HOSPNO' first before field var 'x_HOSPNO'
		$val = $CurrentForm->hasValue("HOSPNO") ? $CurrentForm->getValue("HOSPNO") : $CurrentForm->getValue("x_HOSPNO");
		if (!$this->HOSPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HOSPNO->Visible = FALSE; // Disable update for API request
			else
				$this->HOSPNO->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'pbv' first before field var 'x_pbv'
		$val = $CurrentForm->hasValue("pbv") ? $CurrentForm->getValue("pbv") : $CurrentForm->getValue("x_pbv");
		if (!$this->pbv->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pbv->Visible = FALSE; // Disable update for API request
			else
				$this->pbv->setFormValue($val);
		}

		// Check field name 'pbt' first before field var 'x_pbt'
		$val = $CurrentForm->hasValue("pbt") ? $CurrentForm->getValue("pbt") : $CurrentForm->getValue("x_pbt");
		if (!$this->pbt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pbt->Visible = FALSE; // Disable update for API request
			else
				$this->pbt->setFormValue($val);
		}

		// Check field name 'HosoID' first before field var 'x_HosoID'
		$val = $CurrentForm->hasValue("HosoID") ? $CurrentForm->getValue("HosoID") : $CurrentForm->getValue("x_HosoID");
		if (!$this->HosoID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HosoID->Visible = FALSE; // Disable update for API request
			else
				$this->HosoID->setFormValue($val);
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

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->BRNAME->setFormValue($val);
		}

		// Check field name 'sretid' first before field var 'x_sretid'
		$val = $CurrentForm->hasValue("sretid") ? $CurrentForm->getValue("sretid") : $CurrentForm->getValue("x_sretid");
		if (!$this->sretid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sretid->Visible = FALSE; // Disable update for API request
			else
				$this->sretid->setFormValue($val);
		}

		// Check field name 'sprid' first before field var 'x_sprid'
		$val = $CurrentForm->hasValue("sprid") ? $CurrentForm->getValue("sprid") : $CurrentForm->getValue("x_sprid");
		if (!$this->sprid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sprid->Visible = FALSE; // Disable update for API request
			else
				$this->sprid->setFormValue($val);
		}

		// Check field name 'baid' first before field var 'x_baid'
		$val = $CurrentForm->hasValue("baid") ? $CurrentForm->getValue("baid") : $CurrentForm->getValue("x_baid");
		if (!$this->baid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->baid->Visible = FALSE; // Disable update for API request
			else
				$this->baid->setFormValue($val);
		}

		// Check field name 'isdate' first before field var 'x_isdate'
		$val = $CurrentForm->hasValue("isdate") ? $CurrentForm->getValue("isdate") : $CurrentForm->getValue("x_isdate");
		if (!$this->isdate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->isdate->Visible = FALSE; // Disable update for API request
			else
				$this->isdate->setFormValue($val);
			$this->isdate->CurrentValue = UnFormatDateTime($this->isdate->CurrentValue, 0);
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

		// Check field name 'HSNCODE' first before field var 'x_HSNCODE'
		$val = $CurrentForm->hasValue("HSNCODE") ? $CurrentForm->getValue("HSNCODE") : $CurrentForm->getValue("x_HSNCODE");
		if (!$this->HSNCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HSNCODE->Visible = FALSE; // Disable update for API request
			else
				$this->HSNCODE->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->SiNo->CurrentValue = $this->SiNo->FormValue;
		$this->SLNO->CurrentValue = $this->SLNO->FormValue;
		$this->Product->CurrentValue = $this->Product->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->DAMT->CurrentValue = $this->DAMT->FormValue;
		$this->Mfg->CurrentValue = $this->Mfg->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->TYPE->CurrentValue = $this->TYPE->FormValue;
		$this->DN->CurrentValue = $this->DN->FormValue;
		$this->RDN->CurrentValue = $this->RDN->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->OQ->CurrentValue = $this->OQ->FormValue;
		$this->RQ->CurrentValue = $this->RQ->FormValue;
		$this->MRQ->CurrentValue = $this->MRQ->FormValue;
		$this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
		$this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
		$this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
		$this->VALUE->CurrentValue = $this->VALUE->FormValue;
		$this->DISC->CurrentValue = $this->DISC->FormValue;
		$this->TAXP->CurrentValue = $this->TAXP->FormValue;
		$this->TAX->CurrentValue = $this->TAX->FormValue;
		$this->TAXR->CurrentValue = $this->TAXR->FormValue;
		$this->EMPNO->CurrentValue = $this->EMPNO->FormValue;
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->DRNAME->CurrentValue = $this->DRNAME->FormValue;
		$this->BTIME->CurrentValue = $this->BTIME->FormValue;
		$this->ONO->CurrentValue = $this->ONO->FormValue;
		$this->ODT->CurrentValue = $this->ODT->FormValue;
		$this->ODT->CurrentValue = UnFormatDateTime($this->ODT->CurrentValue, 0);
		$this->PURRT->CurrentValue = $this->PURRT->FormValue;
		$this->GRP->CurrentValue = $this->GRP->FormValue;
		$this->IBATCH->CurrentValue = $this->IBATCH->FormValue;
		$this->IPNO->CurrentValue = $this->IPNO->FormValue;
		$this->OPNO->CurrentValue = $this->OPNO->FormValue;
		$this->RECID->CurrentValue = $this->RECID->FormValue;
		$this->FQTY->CurrentValue = $this->FQTY->FormValue;
		$this->UR->CurrentValue = $this->UR->FormValue;
		$this->DCID->CurrentValue = $this->DCID->FormValue;
		$this->_USERID->CurrentValue = $this->_USERID->FormValue;
		$this->MODDT->CurrentValue = $this->MODDT->FormValue;
		$this->MODDT->CurrentValue = UnFormatDateTime($this->MODDT->CurrentValue, 0);
		$this->FYM->CurrentValue = $this->FYM->FormValue;
		$this->PRCBATCH->CurrentValue = $this->PRCBATCH->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->BILLYM->CurrentValue = $this->BILLYM->FormValue;
		$this->BILLGRP->CurrentValue = $this->BILLGRP->FormValue;
		$this->STAFF->CurrentValue = $this->STAFF->FormValue;
		$this->TEMPIPNO->CurrentValue = $this->TEMPIPNO->FormValue;
		$this->PRNTED->CurrentValue = $this->PRNTED->FormValue;
		$this->PATNAME->CurrentValue = $this->PATNAME->FormValue;
		$this->PJVNO->CurrentValue = $this->PJVNO->FormValue;
		$this->PJVSLNO->CurrentValue = $this->PJVSLNO->FormValue;
		$this->OTHDISC->CurrentValue = $this->OTHDISC->FormValue;
		$this->PJVYM->CurrentValue = $this->PJVYM->FormValue;
		$this->PURDISCPER->CurrentValue = $this->PURDISCPER->FormValue;
		$this->CASHIER->CurrentValue = $this->CASHIER->FormValue;
		$this->CASHTIME->CurrentValue = $this->CASHTIME->FormValue;
		$this->CASHRECD->CurrentValue = $this->CASHRECD->FormValue;
		$this->CASHREFNO->CurrentValue = $this->CASHREFNO->FormValue;
		$this->CASHIERSHIFT->CurrentValue = $this->CASHIERSHIFT->FormValue;
		$this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
		$this->RELEASEBY->CurrentValue = $this->RELEASEBY->FormValue;
		$this->CRAUTHOR->CurrentValue = $this->CRAUTHOR->FormValue;
		$this->PAYMENT->CurrentValue = $this->PAYMENT->FormValue;
		$this->DRID->CurrentValue = $this->DRID->FormValue;
		$this->WARD->CurrentValue = $this->WARD->FormValue;
		$this->STAXTYPE->CurrentValue = $this->STAXTYPE->FormValue;
		$this->PURDISCVAL->CurrentValue = $this->PURDISCVAL->FormValue;
		$this->RNDOFF->CurrentValue = $this->RNDOFF->FormValue;
		$this->DISCONMRP->CurrentValue = $this->DISCONMRP->FormValue;
		$this->DELVDT->CurrentValue = $this->DELVDT->FormValue;
		$this->DELVDT->CurrentValue = UnFormatDateTime($this->DELVDT->CurrentValue, 0);
		$this->DELVTIME->CurrentValue = $this->DELVTIME->FormValue;
		$this->DELVBY->CurrentValue = $this->DELVBY->FormValue;
		$this->HOSPNO->CurrentValue = $this->HOSPNO->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->pbv->CurrentValue = $this->pbv->FormValue;
		$this->pbt->CurrentValue = $this->pbt->FormValue;
		$this->HosoID->CurrentValue = $this->HosoID->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
		$this->sretid->CurrentValue = $this->sretid->FormValue;
		$this->sprid->CurrentValue = $this->sprid->FormValue;
		$this->baid->CurrentValue = $this->baid->FormValue;
		$this->isdate->CurrentValue = $this->isdate->FormValue;
		$this->isdate->CurrentValue = UnFormatDateTime($this->isdate->CurrentValue, 0);
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->PurRate->CurrentValue = $this->PurRate->FormValue;
		$this->PUnit->CurrentValue = $this->PUnit->FormValue;
		$this->SUnit->CurrentValue = $this->SUnit->FormValue;
		$this->HSNCODE->CurrentValue = $this->HSNCODE->FormValue;
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
		$this->SiNo->setDbValue($row['SiNo']);
		$this->SLNO->setDbValue($row['SLNO']);
		$this->Product->setDbValue($row['Product']);
		$this->RT->setDbValue($row['RT']);
		$this->IQ->setDbValue($row['IQ']);
		$this->DAMT->setDbValue($row['DAMT']);
		$this->Mfg->setDbValue($row['Mfg']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DN->setDbValue($row['DN']);
		$this->RDN->setDbValue($row['RDN']);
		$this->DT->setDbValue($row['DT']);
		$this->PRC->setDbValue($row['PRC']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->VALUE->setDbValue($row['VALUE']);
		$this->DISC->setDbValue($row['DISC']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->TAX->setDbValue($row['TAX']);
		$this->TAXR->setDbValue($row['TAXR']);
		$this->EMPNO->setDbValue($row['EMPNO']);
		$this->PC->setDbValue($row['PC']);
		$this->DRNAME->setDbValue($row['DRNAME']);
		$this->BTIME->setDbValue($row['BTIME']);
		$this->ONO->setDbValue($row['ONO']);
		$this->ODT->setDbValue($row['ODT']);
		$this->PURRT->setDbValue($row['PURRT']);
		$this->GRP->setDbValue($row['GRP']);
		$this->IBATCH->setDbValue($row['IBATCH']);
		$this->IPNO->setDbValue($row['IPNO']);
		$this->OPNO->setDbValue($row['OPNO']);
		$this->RECID->setDbValue($row['RECID']);
		$this->FQTY->setDbValue($row['FQTY']);
		$this->UR->setDbValue($row['UR']);
		$this->DCID->setDbValue($row['DCID']);
		$this->_USERID->setDbValue($row['USERID']);
		$this->MODDT->setDbValue($row['MODDT']);
		$this->FYM->setDbValue($row['FYM']);
		$this->PRCBATCH->setDbValue($row['PRCBATCH']);
		$this->MRP->setDbValue($row['MRP']);
		$this->BILLYM->setDbValue($row['BILLYM']);
		$this->BILLGRP->setDbValue($row['BILLGRP']);
		$this->STAFF->setDbValue($row['STAFF']);
		$this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
		$this->PRNTED->setDbValue($row['PRNTED']);
		$this->PATNAME->setDbValue($row['PATNAME']);
		$this->PJVNO->setDbValue($row['PJVNO']);
		$this->PJVSLNO->setDbValue($row['PJVSLNO']);
		$this->OTHDISC->setDbValue($row['OTHDISC']);
		$this->PJVYM->setDbValue($row['PJVYM']);
		$this->PURDISCPER->setDbValue($row['PURDISCPER']);
		$this->CASHIER->setDbValue($row['CASHIER']);
		$this->CASHTIME->setDbValue($row['CASHTIME']);
		$this->CASHRECD->setDbValue($row['CASHRECD']);
		$this->CASHREFNO->setDbValue($row['CASHREFNO']);
		$this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->RELEASEBY->setDbValue($row['RELEASEBY']);
		$this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
		$this->PAYMENT->setDbValue($row['PAYMENT']);
		$this->DRID->setDbValue($row['DRID']);
		$this->WARD->setDbValue($row['WARD']);
		$this->STAXTYPE->setDbValue($row['STAXTYPE']);
		$this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
		$this->RNDOFF->setDbValue($row['RNDOFF']);
		$this->DISCONMRP->setDbValue($row['DISCONMRP']);
		$this->DELVDT->setDbValue($row['DELVDT']);
		$this->DELVTIME->setDbValue($row['DELVTIME']);
		$this->DELVBY->setDbValue($row['DELVBY']);
		$this->HOSPNO->setDbValue($row['HOSPNO']);
		$this->id->setDbValue($row['id']);
		$this->pbv->setDbValue($row['pbv']);
		$this->pbt->setDbValue($row['pbt']);
		$this->HosoID->setDbValue($row['HosoID']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatID->setDbValue($row['PatID']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->BRNAME->setDbValue($row['BRNAME']);
		$this->sretid->setDbValue($row['sretid']);
		$this->sprid->setDbValue($row['sprid']);
		$this->baid->setDbValue($row['baid']);
		$this->isdate->setDbValue($row['isdate']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PurRate->setDbValue($row['PurRate']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->HSNCODE->setDbValue($row['HSNCODE']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['SiNo'] = NULL;
		$row['SLNO'] = NULL;
		$row['Product'] = NULL;
		$row['RT'] = NULL;
		$row['IQ'] = NULL;
		$row['DAMT'] = NULL;
		$row['Mfg'] = NULL;
		$row['EXPDT'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['BRCODE'] = NULL;
		$row['TYPE'] = NULL;
		$row['DN'] = NULL;
		$row['RDN'] = NULL;
		$row['DT'] = NULL;
		$row['PRC'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['BILLNO'] = NULL;
		$row['BILLDT'] = NULL;
		$row['VALUE'] = NULL;
		$row['DISC'] = NULL;
		$row['TAXP'] = NULL;
		$row['TAX'] = NULL;
		$row['TAXR'] = NULL;
		$row['EMPNO'] = NULL;
		$row['PC'] = NULL;
		$row['DRNAME'] = NULL;
		$row['BTIME'] = NULL;
		$row['ONO'] = NULL;
		$row['ODT'] = NULL;
		$row['PURRT'] = NULL;
		$row['GRP'] = NULL;
		$row['IBATCH'] = NULL;
		$row['IPNO'] = NULL;
		$row['OPNO'] = NULL;
		$row['RECID'] = NULL;
		$row['FQTY'] = NULL;
		$row['UR'] = NULL;
		$row['DCID'] = NULL;
		$row['USERID'] = NULL;
		$row['MODDT'] = NULL;
		$row['FYM'] = NULL;
		$row['PRCBATCH'] = NULL;
		$row['MRP'] = NULL;
		$row['BILLYM'] = NULL;
		$row['BILLGRP'] = NULL;
		$row['STAFF'] = NULL;
		$row['TEMPIPNO'] = NULL;
		$row['PRNTED'] = NULL;
		$row['PATNAME'] = NULL;
		$row['PJVNO'] = NULL;
		$row['PJVSLNO'] = NULL;
		$row['OTHDISC'] = NULL;
		$row['PJVYM'] = NULL;
		$row['PURDISCPER'] = NULL;
		$row['CASHIER'] = NULL;
		$row['CASHTIME'] = NULL;
		$row['CASHRECD'] = NULL;
		$row['CASHREFNO'] = NULL;
		$row['CASHIERSHIFT'] = NULL;
		$row['PRCODE'] = NULL;
		$row['RELEASEBY'] = NULL;
		$row['CRAUTHOR'] = NULL;
		$row['PAYMENT'] = NULL;
		$row['DRID'] = NULL;
		$row['WARD'] = NULL;
		$row['STAXTYPE'] = NULL;
		$row['PURDISCVAL'] = NULL;
		$row['RNDOFF'] = NULL;
		$row['DISCONMRP'] = NULL;
		$row['DELVDT'] = NULL;
		$row['DELVTIME'] = NULL;
		$row['DELVBY'] = NULL;
		$row['HOSPNO'] = NULL;
		$row['id'] = NULL;
		$row['pbv'] = NULL;
		$row['pbt'] = NULL;
		$row['HosoID'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['Reception'] = NULL;
		$row['PatID'] = NULL;
		$row['mrnno'] = NULL;
		$row['BRNAME'] = NULL;
		$row['sretid'] = NULL;
		$row['sprid'] = NULL;
		$row['baid'] = NULL;
		$row['isdate'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['PurValue'] = NULL;
		$row['PurRate'] = NULL;
		$row['PUnit'] = NULL;
		$row['SUnit'] = NULL;
		$row['HSNCODE'] = NULL;
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
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue)))
			$this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);

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
		if ($this->VALUE->FormValue == $this->VALUE->CurrentValue && is_numeric(ConvertToFloatString($this->VALUE->CurrentValue)))
			$this->VALUE->CurrentValue = ConvertToFloatString($this->VALUE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DISC->FormValue == $this->DISC->CurrentValue && is_numeric(ConvertToFloatString($this->DISC->CurrentValue)))
			$this->DISC->CurrentValue = ConvertToFloatString($this->DISC->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue)))
			$this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAX->FormValue == $this->TAX->CurrentValue && is_numeric(ConvertToFloatString($this->TAX->CurrentValue)))
			$this->TAX->CurrentValue = ConvertToFloatString($this->TAX->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXR->FormValue == $this->TAXR->CurrentValue && is_numeric(ConvertToFloatString($this->TAXR->CurrentValue)))
			$this->TAXR->CurrentValue = ConvertToFloatString($this->TAXR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PURRT->FormValue == $this->PURRT->CurrentValue && is_numeric(ConvertToFloatString($this->PURRT->CurrentValue)))
			$this->PURRT->CurrentValue = ConvertToFloatString($this->PURRT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->FQTY->FormValue == $this->FQTY->CurrentValue && is_numeric(ConvertToFloatString($this->FQTY->CurrentValue)))
			$this->FQTY->CurrentValue = ConvertToFloatString($this->FQTY->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OTHDISC->FormValue == $this->OTHDISC->CurrentValue && is_numeric(ConvertToFloatString($this->OTHDISC->CurrentValue)))
			$this->OTHDISC->CurrentValue = ConvertToFloatString($this->OTHDISC->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PURDISCPER->FormValue == $this->PURDISCPER->CurrentValue && is_numeric(ConvertToFloatString($this->PURDISCPER->CurrentValue)))
			$this->PURDISCPER->CurrentValue = ConvertToFloatString($this->PURDISCPER->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CASHRECD->FormValue == $this->CASHRECD->CurrentValue && is_numeric(ConvertToFloatString($this->CASHRECD->CurrentValue)))
			$this->CASHRECD->CurrentValue = ConvertToFloatString($this->CASHRECD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PURDISCVAL->FormValue == $this->PURDISCVAL->CurrentValue && is_numeric(ConvertToFloatString($this->PURDISCVAL->CurrentValue)))
			$this->PURDISCVAL->CurrentValue = ConvertToFloatString($this->PURDISCVAL->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RNDOFF->FormValue == $this->RNDOFF->CurrentValue && is_numeric(ConvertToFloatString($this->RNDOFF->CurrentValue)))
			$this->RNDOFF->CurrentValue = ConvertToFloatString($this->RNDOFF->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DISCONMRP->FormValue == $this->DISCONMRP->CurrentValue && is_numeric(ConvertToFloatString($this->DISCONMRP->CurrentValue)))
			$this->DISCONMRP->CurrentValue = ConvertToFloatString($this->DISCONMRP->CurrentValue);

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
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue)))
			$this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// SiNo
		// SLNO
		// Product
		// RT
		// IQ
		// DAMT
		// Mfg
		// EXPDT
		// BATCHNO
		// BRCODE
		// TYPE
		// DN
		// RDN
		// DT
		// PRC
		// OQ
		// RQ
		// MRQ
		// BILLNO
		// BILLDT
		// VALUE
		// DISC
		// TAXP
		// TAX
		// TAXR
		// EMPNO
		// PC
		// DRNAME
		// BTIME
		// ONO
		// ODT
		// PURRT
		// GRP
		// IBATCH
		// IPNO
		// OPNO
		// RECID
		// FQTY
		// UR
		// DCID
		// USERID
		// MODDT
		// FYM
		// PRCBATCH
		// MRP
		// BILLYM
		// BILLGRP
		// STAFF
		// TEMPIPNO
		// PRNTED
		// PATNAME
		// PJVNO
		// PJVSLNO
		// OTHDISC
		// PJVYM
		// PURDISCPER
		// CASHIER
		// CASHTIME
		// CASHRECD
		// CASHREFNO
		// CASHIERSHIFT
		// PRCODE
		// RELEASEBY
		// CRAUTHOR
		// PAYMENT
		// DRID
		// WARD
		// STAXTYPE
		// PURDISCVAL
		// RNDOFF
		// DISCONMRP
		// DELVDT
		// DELVTIME
		// DELVBY
		// HOSPNO
		// id
		// pbv
		// pbt
		// HosoID
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// MFRCODE
		// Reception
		// PatID
		// mrnno
		// BRNAME
		// sretid
		// sprid
		// baid
		// isdate
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// PurValue
		// PurRate
		// PUnit
		// SUnit
		// HSNCODE

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// SiNo
			$this->SiNo->ViewValue = $this->SiNo->CurrentValue;
			$this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
			$this->SiNo->ViewCustomAttributes = "";

			// SLNO
			$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->ViewValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = FormatDateTime($rswrk->fields('df4'), 0);
						$this->SLNO->ViewValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
					}
				}
			} else {
				$this->SLNO->ViewValue = NULL;
			}
			$this->SLNO->ViewCustomAttributes = "";

			// Product
			$this->Product->ViewValue = $this->Product->CurrentValue;
			$this->Product->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// DAMT
			$this->DAMT->ViewValue = $this->DAMT->CurrentValue;
			$this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
			$this->DAMT->ViewCustomAttributes = "";

			// Mfg
			$this->Mfg->ViewValue = $this->Mfg->CurrentValue;
			$this->Mfg->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewCustomAttributes = "";

			// TYPE
			$this->TYPE->ViewValue = $this->TYPE->CurrentValue;
			$this->TYPE->ViewCustomAttributes = "";

			// DN
			$this->DN->ViewValue = $this->DN->CurrentValue;
			$this->DN->ViewCustomAttributes = "";

			// RDN
			$this->RDN->ViewValue = $this->RDN->CurrentValue;
			$this->RDN->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

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

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
			$this->BILLDT->ViewCustomAttributes = "";

			// VALUE
			$this->VALUE->ViewValue = $this->VALUE->CurrentValue;
			$this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
			$this->VALUE->ViewCustomAttributes = "";

			// DISC
			$this->DISC->ViewValue = $this->DISC->CurrentValue;
			$this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
			$this->DISC->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// TAX
			$this->TAX->ViewValue = $this->TAX->CurrentValue;
			$this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
			$this->TAX->ViewCustomAttributes = "";

			// TAXR
			$this->TAXR->ViewValue = $this->TAXR->CurrentValue;
			$this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
			$this->TAXR->ViewCustomAttributes = "";

			// EMPNO
			$this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
			$this->EMPNO->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// DRNAME
			$this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
			$this->DRNAME->ViewCustomAttributes = "";

			// BTIME
			$this->BTIME->ViewValue = $this->BTIME->CurrentValue;
			$this->BTIME->ViewCustomAttributes = "";

			// ONO
			$this->ONO->ViewValue = $this->ONO->CurrentValue;
			$this->ONO->ViewCustomAttributes = "";

			// ODT
			$this->ODT->ViewValue = $this->ODT->CurrentValue;
			$this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
			$this->ODT->ViewCustomAttributes = "";

			// PURRT
			$this->PURRT->ViewValue = $this->PURRT->CurrentValue;
			$this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
			$this->PURRT->ViewCustomAttributes = "";

			// GRP
			$this->GRP->ViewValue = $this->GRP->CurrentValue;
			$this->GRP->ViewCustomAttributes = "";

			// IBATCH
			$this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
			$this->IBATCH->ViewCustomAttributes = "";

			// IPNO
			$this->IPNO->ViewValue = $this->IPNO->CurrentValue;
			$this->IPNO->ViewCustomAttributes = "";

			// OPNO
			$this->OPNO->ViewValue = $this->OPNO->CurrentValue;
			$this->OPNO->ViewCustomAttributes = "";

			// RECID
			$this->RECID->ViewValue = $this->RECID->CurrentValue;
			$this->RECID->ViewCustomAttributes = "";

			// FQTY
			$this->FQTY->ViewValue = $this->FQTY->CurrentValue;
			$this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
			$this->FQTY->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// DCID
			$this->DCID->ViewValue = $this->DCID->CurrentValue;
			$this->DCID->ViewCustomAttributes = "";

			// USERID
			$this->_USERID->ViewValue = $this->_USERID->CurrentValue;
			$this->_USERID->ViewCustomAttributes = "";

			// MODDT
			$this->MODDT->ViewValue = $this->MODDT->CurrentValue;
			$this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
			$this->MODDT->ViewCustomAttributes = "";

			// FYM
			$this->FYM->ViewValue = $this->FYM->CurrentValue;
			$this->FYM->ViewCustomAttributes = "";

			// PRCBATCH
			$this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
			$this->PRCBATCH->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// BILLYM
			$this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
			$this->BILLYM->ViewCustomAttributes = "";

			// BILLGRP
			$this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
			$this->BILLGRP->ViewCustomAttributes = "";

			// STAFF
			$this->STAFF->ViewValue = $this->STAFF->CurrentValue;
			$this->STAFF->ViewCustomAttributes = "";

			// TEMPIPNO
			$this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
			$this->TEMPIPNO->ViewCustomAttributes = "";

			// PRNTED
			$this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
			$this->PRNTED->ViewCustomAttributes = "";

			// PATNAME
			$this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
			$this->PATNAME->ViewCustomAttributes = "";

			// PJVNO
			$this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
			$this->PJVNO->ViewCustomAttributes = "";

			// PJVSLNO
			$this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
			$this->PJVSLNO->ViewCustomAttributes = "";

			// OTHDISC
			$this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
			$this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
			$this->OTHDISC->ViewCustomAttributes = "";

			// PJVYM
			$this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
			$this->PJVYM->ViewCustomAttributes = "";

			// PURDISCPER
			$this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
			$this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
			$this->PURDISCPER->ViewCustomAttributes = "";

			// CASHIER
			$this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
			$this->CASHIER->ViewCustomAttributes = "";

			// CASHTIME
			$this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
			$this->CASHTIME->ViewCustomAttributes = "";

			// CASHRECD
			$this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
			$this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
			$this->CASHRECD->ViewCustomAttributes = "";

			// CASHREFNO
			$this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
			$this->CASHREFNO->ViewCustomAttributes = "";

			// CASHIERSHIFT
			$this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
			$this->CASHIERSHIFT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// RELEASEBY
			$this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
			$this->RELEASEBY->ViewCustomAttributes = "";

			// CRAUTHOR
			$this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
			$this->CRAUTHOR->ViewCustomAttributes = "";

			// PAYMENT
			$this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
			$this->PAYMENT->ViewCustomAttributes = "";

			// DRID
			$this->DRID->ViewValue = $this->DRID->CurrentValue;
			$this->DRID->ViewCustomAttributes = "";

			// WARD
			$this->WARD->ViewValue = $this->WARD->CurrentValue;
			$this->WARD->ViewCustomAttributes = "";

			// STAXTYPE
			$this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
			$this->STAXTYPE->ViewCustomAttributes = "";

			// PURDISCVAL
			$this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
			$this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
			$this->PURDISCVAL->ViewCustomAttributes = "";

			// RNDOFF
			$this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
			$this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
			$this->RNDOFF->ViewCustomAttributes = "";

			// DISCONMRP
			$this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
			$this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
			$this->DISCONMRP->ViewCustomAttributes = "";

			// DELVDT
			$this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
			$this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
			$this->DELVDT->ViewCustomAttributes = "";

			// DELVTIME
			$this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
			$this->DELVTIME->ViewCustomAttributes = "";

			// DELVBY
			$this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
			$this->DELVBY->ViewCustomAttributes = "";

			// HOSPNO
			$this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
			$this->HOSPNO->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pbv
			$this->pbv->ViewValue = $this->pbv->CurrentValue;
			$this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
			$this->pbv->ViewCustomAttributes = "";

			// pbt
			$this->pbt->ViewValue = $this->pbt->CurrentValue;
			$this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
			$this->pbt->ViewCustomAttributes = "";

			// HosoID
			$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
			$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
			$this->HosoID->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// BRNAME
			$this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
			$this->BRNAME->ViewCustomAttributes = "";

			// sretid
			$this->sretid->ViewValue = $this->sretid->CurrentValue;
			$this->sretid->ViewValue = FormatNumber($this->sretid->ViewValue, 0, -2, -2, -2);
			$this->sretid->ViewCustomAttributes = "";

			// sprid
			$this->sprid->ViewValue = $this->sprid->CurrentValue;
			$this->sprid->ViewValue = FormatNumber($this->sprid->ViewValue, 0, -2, -2, -2);
			$this->sprid->ViewCustomAttributes = "";

			// baid
			$this->baid->ViewValue = $this->baid->CurrentValue;
			$this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
			$this->baid->ViewCustomAttributes = "";

			// isdate
			$this->isdate->ViewValue = $this->isdate->CurrentValue;
			$this->isdate->ViewValue = FormatDateTime($this->isdate->ViewValue, 0);
			$this->isdate->ViewCustomAttributes = "";

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

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// HSNCODE
			$this->HSNCODE->ViewValue = $this->HSNCODE->CurrentValue;
			$this->HSNCODE->ViewCustomAttributes = "";

			// SiNo
			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";
			$this->SiNo->TooltipValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";
			$this->SLNO->TooltipValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";
			$this->Product->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";
			$this->DAMT->TooltipValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";
			$this->Mfg->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";
			$this->TYPE->TooltipValue = "";

			// DN
			$this->DN->LinkCustomAttributes = "";
			$this->DN->HrefValue = "";
			$this->DN->TooltipValue = "";

			// RDN
			$this->RDN->LinkCustomAttributes = "";
			$this->RDN->HrefValue = "";
			$this->RDN->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

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

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";
			$this->BILLNO->TooltipValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";
			$this->BILLDT->TooltipValue = "";

			// VALUE
			$this->VALUE->LinkCustomAttributes = "";
			$this->VALUE->HrefValue = "";
			$this->VALUE->TooltipValue = "";

			// DISC
			$this->DISC->LinkCustomAttributes = "";
			$this->DISC->HrefValue = "";
			$this->DISC->TooltipValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";
			$this->TAXP->TooltipValue = "";

			// TAX
			$this->TAX->LinkCustomAttributes = "";
			$this->TAX->HrefValue = "";
			$this->TAX->TooltipValue = "";

			// TAXR
			$this->TAXR->LinkCustomAttributes = "";
			$this->TAXR->HrefValue = "";
			$this->TAXR->TooltipValue = "";

			// EMPNO
			$this->EMPNO->LinkCustomAttributes = "";
			$this->EMPNO->HrefValue = "";
			$this->EMPNO->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// DRNAME
			$this->DRNAME->LinkCustomAttributes = "";
			$this->DRNAME->HrefValue = "";
			$this->DRNAME->TooltipValue = "";

			// BTIME
			$this->BTIME->LinkCustomAttributes = "";
			$this->BTIME->HrefValue = "";
			$this->BTIME->TooltipValue = "";

			// ONO
			$this->ONO->LinkCustomAttributes = "";
			$this->ONO->HrefValue = "";
			$this->ONO->TooltipValue = "";

			// ODT
			$this->ODT->LinkCustomAttributes = "";
			$this->ODT->HrefValue = "";
			$this->ODT->TooltipValue = "";

			// PURRT
			$this->PURRT->LinkCustomAttributes = "";
			$this->PURRT->HrefValue = "";
			$this->PURRT->TooltipValue = "";

			// GRP
			$this->GRP->LinkCustomAttributes = "";
			$this->GRP->HrefValue = "";
			$this->GRP->TooltipValue = "";

			// IBATCH
			$this->IBATCH->LinkCustomAttributes = "";
			$this->IBATCH->HrefValue = "";
			$this->IBATCH->TooltipValue = "";

			// IPNO
			$this->IPNO->LinkCustomAttributes = "";
			$this->IPNO->HrefValue = "";
			$this->IPNO->TooltipValue = "";

			// OPNO
			$this->OPNO->LinkCustomAttributes = "";
			$this->OPNO->HrefValue = "";
			$this->OPNO->TooltipValue = "";

			// RECID
			$this->RECID->LinkCustomAttributes = "";
			$this->RECID->HrefValue = "";
			$this->RECID->TooltipValue = "";

			// FQTY
			$this->FQTY->LinkCustomAttributes = "";
			$this->FQTY->HrefValue = "";
			$this->FQTY->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// DCID
			$this->DCID->LinkCustomAttributes = "";
			$this->DCID->HrefValue = "";
			$this->DCID->TooltipValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";
			$this->_USERID->TooltipValue = "";

			// MODDT
			$this->MODDT->LinkCustomAttributes = "";
			$this->MODDT->HrefValue = "";
			$this->MODDT->TooltipValue = "";

			// FYM
			$this->FYM->LinkCustomAttributes = "";
			$this->FYM->HrefValue = "";
			$this->FYM->TooltipValue = "";

			// PRCBATCH
			$this->PRCBATCH->LinkCustomAttributes = "";
			$this->PRCBATCH->HrefValue = "";
			$this->PRCBATCH->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// BILLYM
			$this->BILLYM->LinkCustomAttributes = "";
			$this->BILLYM->HrefValue = "";
			$this->BILLYM->TooltipValue = "";

			// BILLGRP
			$this->BILLGRP->LinkCustomAttributes = "";
			$this->BILLGRP->HrefValue = "";
			$this->BILLGRP->TooltipValue = "";

			// STAFF
			$this->STAFF->LinkCustomAttributes = "";
			$this->STAFF->HrefValue = "";
			$this->STAFF->TooltipValue = "";

			// TEMPIPNO
			$this->TEMPIPNO->LinkCustomAttributes = "";
			$this->TEMPIPNO->HrefValue = "";
			$this->TEMPIPNO->TooltipValue = "";

			// PRNTED
			$this->PRNTED->LinkCustomAttributes = "";
			$this->PRNTED->HrefValue = "";
			$this->PRNTED->TooltipValue = "";

			// PATNAME
			$this->PATNAME->LinkCustomAttributes = "";
			$this->PATNAME->HrefValue = "";
			$this->PATNAME->TooltipValue = "";

			// PJVNO
			$this->PJVNO->LinkCustomAttributes = "";
			$this->PJVNO->HrefValue = "";
			$this->PJVNO->TooltipValue = "";

			// PJVSLNO
			$this->PJVSLNO->LinkCustomAttributes = "";
			$this->PJVSLNO->HrefValue = "";
			$this->PJVSLNO->TooltipValue = "";

			// OTHDISC
			$this->OTHDISC->LinkCustomAttributes = "";
			$this->OTHDISC->HrefValue = "";
			$this->OTHDISC->TooltipValue = "";

			// PJVYM
			$this->PJVYM->LinkCustomAttributes = "";
			$this->PJVYM->HrefValue = "";
			$this->PJVYM->TooltipValue = "";

			// PURDISCPER
			$this->PURDISCPER->LinkCustomAttributes = "";
			$this->PURDISCPER->HrefValue = "";
			$this->PURDISCPER->TooltipValue = "";

			// CASHIER
			$this->CASHIER->LinkCustomAttributes = "";
			$this->CASHIER->HrefValue = "";
			$this->CASHIER->TooltipValue = "";

			// CASHTIME
			$this->CASHTIME->LinkCustomAttributes = "";
			$this->CASHTIME->HrefValue = "";
			$this->CASHTIME->TooltipValue = "";

			// CASHRECD
			$this->CASHRECD->LinkCustomAttributes = "";
			$this->CASHRECD->HrefValue = "";
			$this->CASHRECD->TooltipValue = "";

			// CASHREFNO
			$this->CASHREFNO->LinkCustomAttributes = "";
			$this->CASHREFNO->HrefValue = "";
			$this->CASHREFNO->TooltipValue = "";

			// CASHIERSHIFT
			$this->CASHIERSHIFT->LinkCustomAttributes = "";
			$this->CASHIERSHIFT->HrefValue = "";
			$this->CASHIERSHIFT->TooltipValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";
			$this->PRCODE->TooltipValue = "";

			// RELEASEBY
			$this->RELEASEBY->LinkCustomAttributes = "";
			$this->RELEASEBY->HrefValue = "";
			$this->RELEASEBY->TooltipValue = "";

			// CRAUTHOR
			$this->CRAUTHOR->LinkCustomAttributes = "";
			$this->CRAUTHOR->HrefValue = "";
			$this->CRAUTHOR->TooltipValue = "";

			// PAYMENT
			$this->PAYMENT->LinkCustomAttributes = "";
			$this->PAYMENT->HrefValue = "";
			$this->PAYMENT->TooltipValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";
			$this->DRID->TooltipValue = "";

			// WARD
			$this->WARD->LinkCustomAttributes = "";
			$this->WARD->HrefValue = "";
			$this->WARD->TooltipValue = "";

			// STAXTYPE
			$this->STAXTYPE->LinkCustomAttributes = "";
			$this->STAXTYPE->HrefValue = "";
			$this->STAXTYPE->TooltipValue = "";

			// PURDISCVAL
			$this->PURDISCVAL->LinkCustomAttributes = "";
			$this->PURDISCVAL->HrefValue = "";
			$this->PURDISCVAL->TooltipValue = "";

			// RNDOFF
			$this->RNDOFF->LinkCustomAttributes = "";
			$this->RNDOFF->HrefValue = "";
			$this->RNDOFF->TooltipValue = "";

			// DISCONMRP
			$this->DISCONMRP->LinkCustomAttributes = "";
			$this->DISCONMRP->HrefValue = "";
			$this->DISCONMRP->TooltipValue = "";

			// DELVDT
			$this->DELVDT->LinkCustomAttributes = "";
			$this->DELVDT->HrefValue = "";
			$this->DELVDT->TooltipValue = "";

			// DELVTIME
			$this->DELVTIME->LinkCustomAttributes = "";
			$this->DELVTIME->HrefValue = "";
			$this->DELVTIME->TooltipValue = "";

			// DELVBY
			$this->DELVBY->LinkCustomAttributes = "";
			$this->DELVBY->HrefValue = "";
			$this->DELVBY->TooltipValue = "";

			// HOSPNO
			$this->HOSPNO->LinkCustomAttributes = "";
			$this->HOSPNO->HrefValue = "";
			$this->HOSPNO->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// pbv
			$this->pbv->LinkCustomAttributes = "";
			$this->pbv->HrefValue = "";
			$this->pbv->TooltipValue = "";

			// pbt
			$this->pbt->LinkCustomAttributes = "";
			$this->pbt->HrefValue = "";
			$this->pbt->TooltipValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";
			$this->HosoID->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";

			// sretid
			$this->sretid->LinkCustomAttributes = "";
			$this->sretid->HrefValue = "";
			$this->sretid->TooltipValue = "";

			// sprid
			$this->sprid->LinkCustomAttributes = "";
			$this->sprid->HrefValue = "";
			$this->sprid->TooltipValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";
			$this->baid->TooltipValue = "";

			// isdate
			$this->isdate->LinkCustomAttributes = "";
			$this->isdate->HrefValue = "";
			$this->isdate->TooltipValue = "";

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

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";
			$this->PurRate->TooltipValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";
			$this->PUnit->TooltipValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";
			$this->SUnit->TooltipValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";
			$this->HSNCODE->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// SiNo
			$this->SiNo->EditAttrs["class"] = "form-control";
			$this->SiNo->EditCustomAttributes = "";
			$this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
			$this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

			// SLNO
			$this->SLNO->EditAttrs["class"] = "form-control";
			$this->SLNO->EditCustomAttributes = "";
			$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
						$arwrk[4] = HtmlEncode(FormatDateTime($rswrk->fields('df4'), 0));
						$this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
					}
				}
			} else {
				$this->SLNO->EditValue = NULL;
			}
			$this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

			// Product
			$this->Product->EditAttrs["class"] = "form-control";
			$this->Product->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
			$this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
			$this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue))
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);

			// DAMT
			$this->DAMT->EditAttrs["class"] = "form-control";
			$this->DAMT->EditCustomAttributes = "";
			$this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
			$this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
			if (strval($this->DAMT->EditValue) <> "" && is_numeric($this->DAMT->EditValue))
				$this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);

			// Mfg
			$this->Mfg->EditAttrs["class"] = "form-control";
			$this->Mfg->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
			$this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
			$this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// BRCODE
			// TYPE

			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TYPE->CurrentValue = HtmlDecode($this->TYPE->CurrentValue);
			$this->TYPE->EditValue = HtmlEncode($this->TYPE->CurrentValue);
			$this->TYPE->PlaceHolder = RemoveHtml($this->TYPE->caption());

			// DN
			$this->DN->EditAttrs["class"] = "form-control";
			$this->DN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DN->CurrentValue = HtmlDecode($this->DN->CurrentValue);
			$this->DN->EditValue = HtmlEncode($this->DN->CurrentValue);
			$this->DN->PlaceHolder = RemoveHtml($this->DN->caption());

			// RDN
			$this->RDN->EditAttrs["class"] = "form-control";
			$this->RDN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RDN->CurrentValue = HtmlDecode($this->RDN->CurrentValue);
			$this->RDN->EditValue = HtmlEncode($this->RDN->CurrentValue);
			$this->RDN->PlaceHolder = RemoveHtml($this->RDN->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

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

			// VALUE
			$this->VALUE->EditAttrs["class"] = "form-control";
			$this->VALUE->EditCustomAttributes = "";
			$this->VALUE->EditValue = HtmlEncode($this->VALUE->CurrentValue);
			$this->VALUE->PlaceHolder = RemoveHtml($this->VALUE->caption());
			if (strval($this->VALUE->EditValue) <> "" && is_numeric($this->VALUE->EditValue))
				$this->VALUE->EditValue = FormatNumber($this->VALUE->EditValue, -2, -2, -2, -2);

			// DISC
			$this->DISC->EditAttrs["class"] = "form-control";
			$this->DISC->EditCustomAttributes = "";
			$this->DISC->EditValue = HtmlEncode($this->DISC->CurrentValue);
			$this->DISC->PlaceHolder = RemoveHtml($this->DISC->caption());
			if (strval($this->DISC->EditValue) <> "" && is_numeric($this->DISC->EditValue))
				$this->DISC->EditValue = FormatNumber($this->DISC->EditValue, -2, -2, -2, -2);

			// TAXP
			$this->TAXP->EditAttrs["class"] = "form-control";
			$this->TAXP->EditCustomAttributes = "";
			$this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
			$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
			if (strval($this->TAXP->EditValue) <> "" && is_numeric($this->TAXP->EditValue))
				$this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);

			// TAX
			$this->TAX->EditAttrs["class"] = "form-control";
			$this->TAX->EditCustomAttributes = "";
			$this->TAX->EditValue = HtmlEncode($this->TAX->CurrentValue);
			$this->TAX->PlaceHolder = RemoveHtml($this->TAX->caption());
			if (strval($this->TAX->EditValue) <> "" && is_numeric($this->TAX->EditValue))
				$this->TAX->EditValue = FormatNumber($this->TAX->EditValue, -2, -2, -2, -2);

			// TAXR
			$this->TAXR->EditAttrs["class"] = "form-control";
			$this->TAXR->EditCustomAttributes = "";
			$this->TAXR->EditValue = HtmlEncode($this->TAXR->CurrentValue);
			$this->TAXR->PlaceHolder = RemoveHtml($this->TAXR->caption());
			if (strval($this->TAXR->EditValue) <> "" && is_numeric($this->TAXR->EditValue))
				$this->TAXR->EditValue = FormatNumber($this->TAXR->EditValue, -2, -2, -2, -2);

			// EMPNO
			$this->EMPNO->EditAttrs["class"] = "form-control";
			$this->EMPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EMPNO->CurrentValue = HtmlDecode($this->EMPNO->CurrentValue);
			$this->EMPNO->EditValue = HtmlEncode($this->EMPNO->CurrentValue);
			$this->EMPNO->PlaceHolder = RemoveHtml($this->EMPNO->caption());

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
			$this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// DRNAME
			$this->DRNAME->EditAttrs["class"] = "form-control";
			$this->DRNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DRNAME->CurrentValue = HtmlDecode($this->DRNAME->CurrentValue);
			$this->DRNAME->EditValue = HtmlEncode($this->DRNAME->CurrentValue);
			$this->DRNAME->PlaceHolder = RemoveHtml($this->DRNAME->caption());

			// BTIME
			$this->BTIME->EditAttrs["class"] = "form-control";
			$this->BTIME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BTIME->CurrentValue = HtmlDecode($this->BTIME->CurrentValue);
			$this->BTIME->EditValue = HtmlEncode($this->BTIME->CurrentValue);
			$this->BTIME->PlaceHolder = RemoveHtml($this->BTIME->caption());

			// ONO
			$this->ONO->EditAttrs["class"] = "form-control";
			$this->ONO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ONO->CurrentValue = HtmlDecode($this->ONO->CurrentValue);
			$this->ONO->EditValue = HtmlEncode($this->ONO->CurrentValue);
			$this->ONO->PlaceHolder = RemoveHtml($this->ONO->caption());

			// ODT
			$this->ODT->EditAttrs["class"] = "form-control";
			$this->ODT->EditCustomAttributes = "";
			$this->ODT->EditValue = HtmlEncode(FormatDateTime($this->ODT->CurrentValue, 8));
			$this->ODT->PlaceHolder = RemoveHtml($this->ODT->caption());

			// PURRT
			$this->PURRT->EditAttrs["class"] = "form-control";
			$this->PURRT->EditCustomAttributes = "";
			$this->PURRT->EditValue = HtmlEncode($this->PURRT->CurrentValue);
			$this->PURRT->PlaceHolder = RemoveHtml($this->PURRT->caption());
			if (strval($this->PURRT->EditValue) <> "" && is_numeric($this->PURRT->EditValue))
				$this->PURRT->EditValue = FormatNumber($this->PURRT->EditValue, -2, -2, -2, -2);

			// GRP
			$this->GRP->EditAttrs["class"] = "form-control";
			$this->GRP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GRP->CurrentValue = HtmlDecode($this->GRP->CurrentValue);
			$this->GRP->EditValue = HtmlEncode($this->GRP->CurrentValue);
			$this->GRP->PlaceHolder = RemoveHtml($this->GRP->caption());

			// IBATCH
			$this->IBATCH->EditAttrs["class"] = "form-control";
			$this->IBATCH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IBATCH->CurrentValue = HtmlDecode($this->IBATCH->CurrentValue);
			$this->IBATCH->EditValue = HtmlEncode($this->IBATCH->CurrentValue);
			$this->IBATCH->PlaceHolder = RemoveHtml($this->IBATCH->caption());

			// IPNO
			$this->IPNO->EditAttrs["class"] = "form-control";
			$this->IPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
			$this->IPNO->EditValue = HtmlEncode($this->IPNO->CurrentValue);
			$this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

			// OPNO
			$this->OPNO->EditAttrs["class"] = "form-control";
			$this->OPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
			$this->OPNO->EditValue = HtmlEncode($this->OPNO->CurrentValue);
			$this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

			// RECID
			$this->RECID->EditAttrs["class"] = "form-control";
			$this->RECID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RECID->CurrentValue = HtmlDecode($this->RECID->CurrentValue);
			$this->RECID->EditValue = HtmlEncode($this->RECID->CurrentValue);
			$this->RECID->PlaceHolder = RemoveHtml($this->RECID->caption());

			// FQTY
			$this->FQTY->EditAttrs["class"] = "form-control";
			$this->FQTY->EditCustomAttributes = "";
			$this->FQTY->EditValue = HtmlEncode($this->FQTY->CurrentValue);
			$this->FQTY->PlaceHolder = RemoveHtml($this->FQTY->caption());
			if (strval($this->FQTY->EditValue) <> "" && is_numeric($this->FQTY->EditValue))
				$this->FQTY->EditValue = FormatNumber($this->FQTY->EditValue, -2, -2, -2, -2);

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue))
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);

			// DCID
			$this->DCID->EditAttrs["class"] = "form-control";
			$this->DCID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DCID->CurrentValue = HtmlDecode($this->DCID->CurrentValue);
			$this->DCID->EditValue = HtmlEncode($this->DCID->CurrentValue);
			$this->DCID->PlaceHolder = RemoveHtml($this->DCID->caption());

			// USERID
			// MODDT

			$this->MODDT->EditAttrs["class"] = "form-control";
			$this->MODDT->EditCustomAttributes = "";
			$this->MODDT->EditValue = HtmlEncode(FormatDateTime($this->MODDT->CurrentValue, 8));
			$this->MODDT->PlaceHolder = RemoveHtml($this->MODDT->caption());

			// FYM
			$this->FYM->EditAttrs["class"] = "form-control";
			$this->FYM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FYM->CurrentValue = HtmlDecode($this->FYM->CurrentValue);
			$this->FYM->EditValue = HtmlEncode($this->FYM->CurrentValue);
			$this->FYM->PlaceHolder = RemoveHtml($this->FYM->caption());

			// PRCBATCH
			$this->PRCBATCH->EditAttrs["class"] = "form-control";
			$this->PRCBATCH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRCBATCH->CurrentValue = HtmlDecode($this->PRCBATCH->CurrentValue);
			$this->PRCBATCH->EditValue = HtmlEncode($this->PRCBATCH->CurrentValue);
			$this->PRCBATCH->PlaceHolder = RemoveHtml($this->PRCBATCH->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

			// BILLYM
			$this->BILLYM->EditAttrs["class"] = "form-control";
			$this->BILLYM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLYM->CurrentValue = HtmlDecode($this->BILLYM->CurrentValue);
			$this->BILLYM->EditValue = HtmlEncode($this->BILLYM->CurrentValue);
			$this->BILLYM->PlaceHolder = RemoveHtml($this->BILLYM->caption());

			// BILLGRP
			$this->BILLGRP->EditAttrs["class"] = "form-control";
			$this->BILLGRP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLGRP->CurrentValue = HtmlDecode($this->BILLGRP->CurrentValue);
			$this->BILLGRP->EditValue = HtmlEncode($this->BILLGRP->CurrentValue);
			$this->BILLGRP->PlaceHolder = RemoveHtml($this->BILLGRP->caption());

			// STAFF
			$this->STAFF->EditAttrs["class"] = "form-control";
			$this->STAFF->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->STAFF->CurrentValue = HtmlDecode($this->STAFF->CurrentValue);
			$this->STAFF->EditValue = HtmlEncode($this->STAFF->CurrentValue);
			$this->STAFF->PlaceHolder = RemoveHtml($this->STAFF->caption());

			// TEMPIPNO
			$this->TEMPIPNO->EditAttrs["class"] = "form-control";
			$this->TEMPIPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TEMPIPNO->CurrentValue = HtmlDecode($this->TEMPIPNO->CurrentValue);
			$this->TEMPIPNO->EditValue = HtmlEncode($this->TEMPIPNO->CurrentValue);
			$this->TEMPIPNO->PlaceHolder = RemoveHtml($this->TEMPIPNO->caption());

			// PRNTED
			$this->PRNTED->EditAttrs["class"] = "form-control";
			$this->PRNTED->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRNTED->CurrentValue = HtmlDecode($this->PRNTED->CurrentValue);
			$this->PRNTED->EditValue = HtmlEncode($this->PRNTED->CurrentValue);
			$this->PRNTED->PlaceHolder = RemoveHtml($this->PRNTED->caption());

			// PATNAME
			$this->PATNAME->EditAttrs["class"] = "form-control";
			$this->PATNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PATNAME->CurrentValue = HtmlDecode($this->PATNAME->CurrentValue);
			$this->PATNAME->EditValue = HtmlEncode($this->PATNAME->CurrentValue);
			$this->PATNAME->PlaceHolder = RemoveHtml($this->PATNAME->caption());

			// PJVNO
			$this->PJVNO->EditAttrs["class"] = "form-control";
			$this->PJVNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PJVNO->CurrentValue = HtmlDecode($this->PJVNO->CurrentValue);
			$this->PJVNO->EditValue = HtmlEncode($this->PJVNO->CurrentValue);
			$this->PJVNO->PlaceHolder = RemoveHtml($this->PJVNO->caption());

			// PJVSLNO
			$this->PJVSLNO->EditAttrs["class"] = "form-control";
			$this->PJVSLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PJVSLNO->CurrentValue = HtmlDecode($this->PJVSLNO->CurrentValue);
			$this->PJVSLNO->EditValue = HtmlEncode($this->PJVSLNO->CurrentValue);
			$this->PJVSLNO->PlaceHolder = RemoveHtml($this->PJVSLNO->caption());

			// OTHDISC
			$this->OTHDISC->EditAttrs["class"] = "form-control";
			$this->OTHDISC->EditCustomAttributes = "";
			$this->OTHDISC->EditValue = HtmlEncode($this->OTHDISC->CurrentValue);
			$this->OTHDISC->PlaceHolder = RemoveHtml($this->OTHDISC->caption());
			if (strval($this->OTHDISC->EditValue) <> "" && is_numeric($this->OTHDISC->EditValue))
				$this->OTHDISC->EditValue = FormatNumber($this->OTHDISC->EditValue, -2, -2, -2, -2);

			// PJVYM
			$this->PJVYM->EditAttrs["class"] = "form-control";
			$this->PJVYM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PJVYM->CurrentValue = HtmlDecode($this->PJVYM->CurrentValue);
			$this->PJVYM->EditValue = HtmlEncode($this->PJVYM->CurrentValue);
			$this->PJVYM->PlaceHolder = RemoveHtml($this->PJVYM->caption());

			// PURDISCPER
			$this->PURDISCPER->EditAttrs["class"] = "form-control";
			$this->PURDISCPER->EditCustomAttributes = "";
			$this->PURDISCPER->EditValue = HtmlEncode($this->PURDISCPER->CurrentValue);
			$this->PURDISCPER->PlaceHolder = RemoveHtml($this->PURDISCPER->caption());
			if (strval($this->PURDISCPER->EditValue) <> "" && is_numeric($this->PURDISCPER->EditValue))
				$this->PURDISCPER->EditValue = FormatNumber($this->PURDISCPER->EditValue, -2, -2, -2, -2);

			// CASHIER
			$this->CASHIER->EditAttrs["class"] = "form-control";
			$this->CASHIER->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CASHIER->CurrentValue = HtmlDecode($this->CASHIER->CurrentValue);
			$this->CASHIER->EditValue = HtmlEncode($this->CASHIER->CurrentValue);
			$this->CASHIER->PlaceHolder = RemoveHtml($this->CASHIER->caption());

			// CASHTIME
			$this->CASHTIME->EditAttrs["class"] = "form-control";
			$this->CASHTIME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CASHTIME->CurrentValue = HtmlDecode($this->CASHTIME->CurrentValue);
			$this->CASHTIME->EditValue = HtmlEncode($this->CASHTIME->CurrentValue);
			$this->CASHTIME->PlaceHolder = RemoveHtml($this->CASHTIME->caption());

			// CASHRECD
			$this->CASHRECD->EditAttrs["class"] = "form-control";
			$this->CASHRECD->EditCustomAttributes = "";
			$this->CASHRECD->EditValue = HtmlEncode($this->CASHRECD->CurrentValue);
			$this->CASHRECD->PlaceHolder = RemoveHtml($this->CASHRECD->caption());
			if (strval($this->CASHRECD->EditValue) <> "" && is_numeric($this->CASHRECD->EditValue))
				$this->CASHRECD->EditValue = FormatNumber($this->CASHRECD->EditValue, -2, -2, -2, -2);

			// CASHREFNO
			$this->CASHREFNO->EditAttrs["class"] = "form-control";
			$this->CASHREFNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CASHREFNO->CurrentValue = HtmlDecode($this->CASHREFNO->CurrentValue);
			$this->CASHREFNO->EditValue = HtmlEncode($this->CASHREFNO->CurrentValue);
			$this->CASHREFNO->PlaceHolder = RemoveHtml($this->CASHREFNO->caption());

			// CASHIERSHIFT
			$this->CASHIERSHIFT->EditAttrs["class"] = "form-control";
			$this->CASHIERSHIFT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CASHIERSHIFT->CurrentValue = HtmlDecode($this->CASHIERSHIFT->CurrentValue);
			$this->CASHIERSHIFT->EditValue = HtmlEncode($this->CASHIERSHIFT->CurrentValue);
			$this->CASHIERSHIFT->PlaceHolder = RemoveHtml($this->CASHIERSHIFT->caption());

			// PRCODE
			$this->PRCODE->EditAttrs["class"] = "form-control";
			$this->PRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
			$this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
			$this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

			// RELEASEBY
			$this->RELEASEBY->EditAttrs["class"] = "form-control";
			$this->RELEASEBY->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RELEASEBY->CurrentValue = HtmlDecode($this->RELEASEBY->CurrentValue);
			$this->RELEASEBY->EditValue = HtmlEncode($this->RELEASEBY->CurrentValue);
			$this->RELEASEBY->PlaceHolder = RemoveHtml($this->RELEASEBY->caption());

			// CRAUTHOR
			$this->CRAUTHOR->EditAttrs["class"] = "form-control";
			$this->CRAUTHOR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CRAUTHOR->CurrentValue = HtmlDecode($this->CRAUTHOR->CurrentValue);
			$this->CRAUTHOR->EditValue = HtmlEncode($this->CRAUTHOR->CurrentValue);
			$this->CRAUTHOR->PlaceHolder = RemoveHtml($this->CRAUTHOR->caption());

			// PAYMENT
			$this->PAYMENT->EditAttrs["class"] = "form-control";
			$this->PAYMENT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PAYMENT->CurrentValue = HtmlDecode($this->PAYMENT->CurrentValue);
			$this->PAYMENT->EditValue = HtmlEncode($this->PAYMENT->CurrentValue);
			$this->PAYMENT->PlaceHolder = RemoveHtml($this->PAYMENT->caption());

			// DRID
			$this->DRID->EditAttrs["class"] = "form-control";
			$this->DRID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DRID->CurrentValue = HtmlDecode($this->DRID->CurrentValue);
			$this->DRID->EditValue = HtmlEncode($this->DRID->CurrentValue);
			$this->DRID->PlaceHolder = RemoveHtml($this->DRID->caption());

			// WARD
			$this->WARD->EditAttrs["class"] = "form-control";
			$this->WARD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WARD->CurrentValue = HtmlDecode($this->WARD->CurrentValue);
			$this->WARD->EditValue = HtmlEncode($this->WARD->CurrentValue);
			$this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());

			// STAXTYPE
			$this->STAXTYPE->EditAttrs["class"] = "form-control";
			$this->STAXTYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->STAXTYPE->CurrentValue = HtmlDecode($this->STAXTYPE->CurrentValue);
			$this->STAXTYPE->EditValue = HtmlEncode($this->STAXTYPE->CurrentValue);
			$this->STAXTYPE->PlaceHolder = RemoveHtml($this->STAXTYPE->caption());

			// PURDISCVAL
			$this->PURDISCVAL->EditAttrs["class"] = "form-control";
			$this->PURDISCVAL->EditCustomAttributes = "";
			$this->PURDISCVAL->EditValue = HtmlEncode($this->PURDISCVAL->CurrentValue);
			$this->PURDISCVAL->PlaceHolder = RemoveHtml($this->PURDISCVAL->caption());
			if (strval($this->PURDISCVAL->EditValue) <> "" && is_numeric($this->PURDISCVAL->EditValue))
				$this->PURDISCVAL->EditValue = FormatNumber($this->PURDISCVAL->EditValue, -2, -2, -2, -2);

			// RNDOFF
			$this->RNDOFF->EditAttrs["class"] = "form-control";
			$this->RNDOFF->EditCustomAttributes = "";
			$this->RNDOFF->EditValue = HtmlEncode($this->RNDOFF->CurrentValue);
			$this->RNDOFF->PlaceHolder = RemoveHtml($this->RNDOFF->caption());
			if (strval($this->RNDOFF->EditValue) <> "" && is_numeric($this->RNDOFF->EditValue))
				$this->RNDOFF->EditValue = FormatNumber($this->RNDOFF->EditValue, -2, -2, -2, -2);

			// DISCONMRP
			$this->DISCONMRP->EditAttrs["class"] = "form-control";
			$this->DISCONMRP->EditCustomAttributes = "";
			$this->DISCONMRP->EditValue = HtmlEncode($this->DISCONMRP->CurrentValue);
			$this->DISCONMRP->PlaceHolder = RemoveHtml($this->DISCONMRP->caption());
			if (strval($this->DISCONMRP->EditValue) <> "" && is_numeric($this->DISCONMRP->EditValue))
				$this->DISCONMRP->EditValue = FormatNumber($this->DISCONMRP->EditValue, -2, -2, -2, -2);

			// DELVDT
			$this->DELVDT->EditAttrs["class"] = "form-control";
			$this->DELVDT->EditCustomAttributes = "";
			$this->DELVDT->EditValue = HtmlEncode(FormatDateTime($this->DELVDT->CurrentValue, 8));
			$this->DELVDT->PlaceHolder = RemoveHtml($this->DELVDT->caption());

			// DELVTIME
			$this->DELVTIME->EditAttrs["class"] = "form-control";
			$this->DELVTIME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DELVTIME->CurrentValue = HtmlDecode($this->DELVTIME->CurrentValue);
			$this->DELVTIME->EditValue = HtmlEncode($this->DELVTIME->CurrentValue);
			$this->DELVTIME->PlaceHolder = RemoveHtml($this->DELVTIME->caption());

			// DELVBY
			$this->DELVBY->EditAttrs["class"] = "form-control";
			$this->DELVBY->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DELVBY->CurrentValue = HtmlDecode($this->DELVBY->CurrentValue);
			$this->DELVBY->EditValue = HtmlEncode($this->DELVBY->CurrentValue);
			$this->DELVBY->PlaceHolder = RemoveHtml($this->DELVBY->caption());

			// HOSPNO
			$this->HOSPNO->EditAttrs["class"] = "form-control";
			$this->HOSPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HOSPNO->CurrentValue = HtmlDecode($this->HOSPNO->CurrentValue);
			$this->HOSPNO->EditValue = HtmlEncode($this->HOSPNO->CurrentValue);
			$this->HOSPNO->PlaceHolder = RemoveHtml($this->HOSPNO->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pbv
			$this->pbv->EditAttrs["class"] = "form-control";
			$this->pbv->EditCustomAttributes = "";
			if ($this->pbv->getSessionValue() <> "") {
				$this->pbv->CurrentValue = $this->pbv->getSessionValue();
			$this->pbv->ViewValue = $this->pbv->CurrentValue;
			$this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
			$this->pbv->ViewCustomAttributes = "";
			} else {
			$this->pbv->EditValue = HtmlEncode($this->pbv->CurrentValue);
			$this->pbv->PlaceHolder = RemoveHtml($this->pbv->caption());
			}

			// pbt
			$this->pbt->EditAttrs["class"] = "form-control";
			$this->pbt->EditCustomAttributes = "";
			if ($this->pbt->getSessionValue() <> "") {
				$this->pbt->CurrentValue = $this->pbt->getSessionValue();
			$this->pbt->ViewValue = $this->pbt->CurrentValue;
			$this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
			$this->pbt->ViewCustomAttributes = "";
			} else {
			$this->pbt->EditValue = HtmlEncode($this->pbt->CurrentValue);
			$this->pbt->PlaceHolder = RemoveHtml($this->pbt->caption());
			}

			// HosoID
			// modifiedby
			// modifieddatetime
			// MFRCODE

			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() <> "") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";
			} else {
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
			}

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if ($this->PatID->getSessionValue() <> "") {
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";
			} else {
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
			}

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() <> "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// BRNAME
			// sretid

			$this->sretid->EditAttrs["class"] = "form-control";
			$this->sretid->EditCustomAttributes = "";
			$this->sretid->EditValue = HtmlEncode($this->sretid->CurrentValue);
			$this->sretid->PlaceHolder = RemoveHtml($this->sretid->caption());

			// sprid
			$this->sprid->EditAttrs["class"] = "form-control";
			$this->sprid->EditCustomAttributes = "";
			$this->sprid->EditValue = HtmlEncode($this->sprid->CurrentValue);
			$this->sprid->PlaceHolder = RemoveHtml($this->sprid->caption());

			// baid
			$this->baid->EditAttrs["class"] = "form-control";
			$this->baid->EditCustomAttributes = "";
			$this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
			$this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

			// isdate
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

			// HSNCODE
			$this->HSNCODE->EditAttrs["class"] = "form-control";
			$this->HSNCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

			// Edit refer script
			// SiNo

			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";

			// DN
			$this->DN->LinkCustomAttributes = "";
			$this->DN->HrefValue = "";

			// RDN
			$this->RDN->LinkCustomAttributes = "";
			$this->RDN->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";

			// VALUE
			$this->VALUE->LinkCustomAttributes = "";
			$this->VALUE->HrefValue = "";

			// DISC
			$this->DISC->LinkCustomAttributes = "";
			$this->DISC->HrefValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";

			// TAX
			$this->TAX->LinkCustomAttributes = "";
			$this->TAX->HrefValue = "";

			// TAXR
			$this->TAXR->LinkCustomAttributes = "";
			$this->TAXR->HrefValue = "";

			// EMPNO
			$this->EMPNO->LinkCustomAttributes = "";
			$this->EMPNO->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// DRNAME
			$this->DRNAME->LinkCustomAttributes = "";
			$this->DRNAME->HrefValue = "";

			// BTIME
			$this->BTIME->LinkCustomAttributes = "";
			$this->BTIME->HrefValue = "";

			// ONO
			$this->ONO->LinkCustomAttributes = "";
			$this->ONO->HrefValue = "";

			// ODT
			$this->ODT->LinkCustomAttributes = "";
			$this->ODT->HrefValue = "";

			// PURRT
			$this->PURRT->LinkCustomAttributes = "";
			$this->PURRT->HrefValue = "";

			// GRP
			$this->GRP->LinkCustomAttributes = "";
			$this->GRP->HrefValue = "";

			// IBATCH
			$this->IBATCH->LinkCustomAttributes = "";
			$this->IBATCH->HrefValue = "";

			// IPNO
			$this->IPNO->LinkCustomAttributes = "";
			$this->IPNO->HrefValue = "";

			// OPNO
			$this->OPNO->LinkCustomAttributes = "";
			$this->OPNO->HrefValue = "";

			// RECID
			$this->RECID->LinkCustomAttributes = "";
			$this->RECID->HrefValue = "";

			// FQTY
			$this->FQTY->LinkCustomAttributes = "";
			$this->FQTY->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// DCID
			$this->DCID->LinkCustomAttributes = "";
			$this->DCID->HrefValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";

			// MODDT
			$this->MODDT->LinkCustomAttributes = "";
			$this->MODDT->HrefValue = "";

			// FYM
			$this->FYM->LinkCustomAttributes = "";
			$this->FYM->HrefValue = "";

			// PRCBATCH
			$this->PRCBATCH->LinkCustomAttributes = "";
			$this->PRCBATCH->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// BILLYM
			$this->BILLYM->LinkCustomAttributes = "";
			$this->BILLYM->HrefValue = "";

			// BILLGRP
			$this->BILLGRP->LinkCustomAttributes = "";
			$this->BILLGRP->HrefValue = "";

			// STAFF
			$this->STAFF->LinkCustomAttributes = "";
			$this->STAFF->HrefValue = "";

			// TEMPIPNO
			$this->TEMPIPNO->LinkCustomAttributes = "";
			$this->TEMPIPNO->HrefValue = "";

			// PRNTED
			$this->PRNTED->LinkCustomAttributes = "";
			$this->PRNTED->HrefValue = "";

			// PATNAME
			$this->PATNAME->LinkCustomAttributes = "";
			$this->PATNAME->HrefValue = "";

			// PJVNO
			$this->PJVNO->LinkCustomAttributes = "";
			$this->PJVNO->HrefValue = "";

			// PJVSLNO
			$this->PJVSLNO->LinkCustomAttributes = "";
			$this->PJVSLNO->HrefValue = "";

			// OTHDISC
			$this->OTHDISC->LinkCustomAttributes = "";
			$this->OTHDISC->HrefValue = "";

			// PJVYM
			$this->PJVYM->LinkCustomAttributes = "";
			$this->PJVYM->HrefValue = "";

			// PURDISCPER
			$this->PURDISCPER->LinkCustomAttributes = "";
			$this->PURDISCPER->HrefValue = "";

			// CASHIER
			$this->CASHIER->LinkCustomAttributes = "";
			$this->CASHIER->HrefValue = "";

			// CASHTIME
			$this->CASHTIME->LinkCustomAttributes = "";
			$this->CASHTIME->HrefValue = "";

			// CASHRECD
			$this->CASHRECD->LinkCustomAttributes = "";
			$this->CASHRECD->HrefValue = "";

			// CASHREFNO
			$this->CASHREFNO->LinkCustomAttributes = "";
			$this->CASHREFNO->HrefValue = "";

			// CASHIERSHIFT
			$this->CASHIERSHIFT->LinkCustomAttributes = "";
			$this->CASHIERSHIFT->HrefValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";

			// RELEASEBY
			$this->RELEASEBY->LinkCustomAttributes = "";
			$this->RELEASEBY->HrefValue = "";

			// CRAUTHOR
			$this->CRAUTHOR->LinkCustomAttributes = "";
			$this->CRAUTHOR->HrefValue = "";

			// PAYMENT
			$this->PAYMENT->LinkCustomAttributes = "";
			$this->PAYMENT->HrefValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";

			// WARD
			$this->WARD->LinkCustomAttributes = "";
			$this->WARD->HrefValue = "";

			// STAXTYPE
			$this->STAXTYPE->LinkCustomAttributes = "";
			$this->STAXTYPE->HrefValue = "";

			// PURDISCVAL
			$this->PURDISCVAL->LinkCustomAttributes = "";
			$this->PURDISCVAL->HrefValue = "";

			// RNDOFF
			$this->RNDOFF->LinkCustomAttributes = "";
			$this->RNDOFF->HrefValue = "";

			// DISCONMRP
			$this->DISCONMRP->LinkCustomAttributes = "";
			$this->DISCONMRP->HrefValue = "";

			// DELVDT
			$this->DELVDT->LinkCustomAttributes = "";
			$this->DELVDT->HrefValue = "";

			// DELVTIME
			$this->DELVTIME->LinkCustomAttributes = "";
			$this->DELVTIME->HrefValue = "";

			// DELVBY
			$this->DELVBY->LinkCustomAttributes = "";
			$this->DELVBY->HrefValue = "";

			// HOSPNO
			$this->HOSPNO->LinkCustomAttributes = "";
			$this->HOSPNO->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// pbv
			$this->pbv->LinkCustomAttributes = "";
			$this->pbv->HrefValue = "";

			// pbt
			$this->pbt->LinkCustomAttributes = "";
			$this->pbt->HrefValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";

			// sretid
			$this->sretid->LinkCustomAttributes = "";
			$this->sretid->HrefValue = "";

			// sprid
			$this->sprid->LinkCustomAttributes = "";
			$this->sprid->HrefValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";

			// isdate
			$this->isdate->LinkCustomAttributes = "";
			$this->isdate->HrefValue = "";

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

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";
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
		if ($this->SiNo->Required) {
			if (!$this->SiNo->IsDetailKey && $this->SiNo->FormValue != NULL && $this->SiNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SiNo->caption(), $this->SiNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SiNo->FormValue)) {
			AddMessage($FormError, $this->SiNo->errorMessage());
		}
		if ($this->SLNO->Required) {
			if (!$this->SLNO->IsDetailKey && $this->SLNO->FormValue != NULL && $this->SLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SLNO->caption(), $this->SLNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SLNO->FormValue)) {
			AddMessage($FormError, $this->SLNO->errorMessage());
		}
		if ($this->Product->Required) {
			if (!$this->Product->IsDetailKey && $this->Product->FormValue != NULL && $this->Product->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Product->caption(), $this->Product->RequiredErrorMessage));
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
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IQ->FormValue)) {
			AddMessage($FormError, $this->IQ->errorMessage());
		}
		if ($this->DAMT->Required) {
			if (!$this->DAMT->IsDetailKey && $this->DAMT->FormValue != NULL && $this->DAMT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DAMT->caption(), $this->DAMT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DAMT->FormValue)) {
			AddMessage($FormError, $this->DAMT->errorMessage());
		}
		if ($this->Mfg->Required) {
			if (!$this->Mfg->IsDetailKey && $this->Mfg->FormValue != NULL && $this->Mfg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mfg->caption(), $this->Mfg->RequiredErrorMessage));
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
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->TYPE->Required) {
			if (!$this->TYPE->IsDetailKey && $this->TYPE->FormValue != NULL && $this->TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DN->Required) {
			if (!$this->DN->IsDetailKey && $this->DN->FormValue != NULL && $this->DN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DN->caption(), $this->DN->RequiredErrorMessage));
			}
		}
		if ($this->RDN->Required) {
			if (!$this->RDN->IsDetailKey && $this->RDN->FormValue != NULL && $this->RDN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RDN->caption(), $this->RDN->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DT->FormValue)) {
			AddMessage($FormError, $this->DT->errorMessage());
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
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
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRQ->FormValue)) {
			AddMessage($FormError, $this->MRQ->errorMessage());
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
		if ($this->VALUE->Required) {
			if (!$this->VALUE->IsDetailKey && $this->VALUE->FormValue != NULL && $this->VALUE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VALUE->caption(), $this->VALUE->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->VALUE->FormValue)) {
			AddMessage($FormError, $this->VALUE->errorMessage());
		}
		if ($this->DISC->Required) {
			if (!$this->DISC->IsDetailKey && $this->DISC->FormValue != NULL && $this->DISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DISC->caption(), $this->DISC->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DISC->FormValue)) {
			AddMessage($FormError, $this->DISC->errorMessage());
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TAXP->FormValue)) {
			AddMessage($FormError, $this->TAXP->errorMessage());
		}
		if ($this->TAX->Required) {
			if (!$this->TAX->IsDetailKey && $this->TAX->FormValue != NULL && $this->TAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAX->caption(), $this->TAX->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TAX->FormValue)) {
			AddMessage($FormError, $this->TAX->errorMessage());
		}
		if ($this->TAXR->Required) {
			if (!$this->TAXR->IsDetailKey && $this->TAXR->FormValue != NULL && $this->TAXR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXR->caption(), $this->TAXR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TAXR->FormValue)) {
			AddMessage($FormError, $this->TAXR->errorMessage());
		}
		if ($this->EMPNO->Required) {
			if (!$this->EMPNO->IsDetailKey && $this->EMPNO->FormValue != NULL && $this->EMPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EMPNO->caption(), $this->EMPNO->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->DRNAME->Required) {
			if (!$this->DRNAME->IsDetailKey && $this->DRNAME->FormValue != NULL && $this->DRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRNAME->caption(), $this->DRNAME->RequiredErrorMessage));
			}
		}
		if ($this->BTIME->Required) {
			if (!$this->BTIME->IsDetailKey && $this->BTIME->FormValue != NULL && $this->BTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BTIME->caption(), $this->BTIME->RequiredErrorMessage));
			}
		}
		if ($this->ONO->Required) {
			if (!$this->ONO->IsDetailKey && $this->ONO->FormValue != NULL && $this->ONO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ONO->caption(), $this->ONO->RequiredErrorMessage));
			}
		}
		if ($this->ODT->Required) {
			if (!$this->ODT->IsDetailKey && $this->ODT->FormValue != NULL && $this->ODT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ODT->caption(), $this->ODT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ODT->FormValue)) {
			AddMessage($FormError, $this->ODT->errorMessage());
		}
		if ($this->PURRT->Required) {
			if (!$this->PURRT->IsDetailKey && $this->PURRT->FormValue != NULL && $this->PURRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURRT->caption(), $this->PURRT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PURRT->FormValue)) {
			AddMessage($FormError, $this->PURRT->errorMessage());
		}
		if ($this->GRP->Required) {
			if (!$this->GRP->IsDetailKey && $this->GRP->FormValue != NULL && $this->GRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRP->caption(), $this->GRP->RequiredErrorMessage));
			}
		}
		if ($this->IBATCH->Required) {
			if (!$this->IBATCH->IsDetailKey && $this->IBATCH->FormValue != NULL && $this->IBATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IBATCH->caption(), $this->IBATCH->RequiredErrorMessage));
			}
		}
		if ($this->IPNO->Required) {
			if (!$this->IPNO->IsDetailKey && $this->IPNO->FormValue != NULL && $this->IPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IPNO->caption(), $this->IPNO->RequiredErrorMessage));
			}
		}
		if ($this->OPNO->Required) {
			if (!$this->OPNO->IsDetailKey && $this->OPNO->FormValue != NULL && $this->OPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPNO->caption(), $this->OPNO->RequiredErrorMessage));
			}
		}
		if ($this->RECID->Required) {
			if (!$this->RECID->IsDetailKey && $this->RECID->FormValue != NULL && $this->RECID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RECID->caption(), $this->RECID->RequiredErrorMessage));
			}
		}
		if ($this->FQTY->Required) {
			if (!$this->FQTY->IsDetailKey && $this->FQTY->FormValue != NULL && $this->FQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FQTY->caption(), $this->FQTY->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->FQTY->FormValue)) {
			AddMessage($FormError, $this->FQTY->errorMessage());
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->DCID->Required) {
			if (!$this->DCID->IsDetailKey && $this->DCID->FormValue != NULL && $this->DCID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DCID->caption(), $this->DCID->RequiredErrorMessage));
			}
		}
		if ($this->_USERID->Required) {
			if (!$this->_USERID->IsDetailKey && $this->_USERID->FormValue != NULL && $this->_USERID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_USERID->caption(), $this->_USERID->RequiredErrorMessage));
			}
		}
		if ($this->MODDT->Required) {
			if (!$this->MODDT->IsDetailKey && $this->MODDT->FormValue != NULL && $this->MODDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MODDT->caption(), $this->MODDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->MODDT->FormValue)) {
			AddMessage($FormError, $this->MODDT->errorMessage());
		}
		if ($this->FYM->Required) {
			if (!$this->FYM->IsDetailKey && $this->FYM->FormValue != NULL && $this->FYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FYM->caption(), $this->FYM->RequiredErrorMessage));
			}
		}
		if ($this->PRCBATCH->Required) {
			if (!$this->PRCBATCH->IsDetailKey && $this->PRCBATCH->FormValue != NULL && $this->PRCBATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCBATCH->caption(), $this->PRCBATCH->RequiredErrorMessage));
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
		if ($this->BILLYM->Required) {
			if (!$this->BILLYM->IsDetailKey && $this->BILLYM->FormValue != NULL && $this->BILLYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLYM->caption(), $this->BILLYM->RequiredErrorMessage));
			}
		}
		if ($this->BILLGRP->Required) {
			if (!$this->BILLGRP->IsDetailKey && $this->BILLGRP->FormValue != NULL && $this->BILLGRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLGRP->caption(), $this->BILLGRP->RequiredErrorMessage));
			}
		}
		if ($this->STAFF->Required) {
			if (!$this->STAFF->IsDetailKey && $this->STAFF->FormValue != NULL && $this->STAFF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAFF->caption(), $this->STAFF->RequiredErrorMessage));
			}
		}
		if ($this->TEMPIPNO->Required) {
			if (!$this->TEMPIPNO->IsDetailKey && $this->TEMPIPNO->FormValue != NULL && $this->TEMPIPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMPIPNO->caption(), $this->TEMPIPNO->RequiredErrorMessage));
			}
		}
		if ($this->PRNTED->Required) {
			if (!$this->PRNTED->IsDetailKey && $this->PRNTED->FormValue != NULL && $this->PRNTED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRNTED->caption(), $this->PRNTED->RequiredErrorMessage));
			}
		}
		if ($this->PATNAME->Required) {
			if (!$this->PATNAME->IsDetailKey && $this->PATNAME->FormValue != NULL && $this->PATNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PATNAME->caption(), $this->PATNAME->RequiredErrorMessage));
			}
		}
		if ($this->PJVNO->Required) {
			if (!$this->PJVNO->IsDetailKey && $this->PJVNO->FormValue != NULL && $this->PJVNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVNO->caption(), $this->PJVNO->RequiredErrorMessage));
			}
		}
		if ($this->PJVSLNO->Required) {
			if (!$this->PJVSLNO->IsDetailKey && $this->PJVSLNO->FormValue != NULL && $this->PJVSLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVSLNO->caption(), $this->PJVSLNO->RequiredErrorMessage));
			}
		}
		if ($this->OTHDISC->Required) {
			if (!$this->OTHDISC->IsDetailKey && $this->OTHDISC->FormValue != NULL && $this->OTHDISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OTHDISC->caption(), $this->OTHDISC->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OTHDISC->FormValue)) {
			AddMessage($FormError, $this->OTHDISC->errorMessage());
		}
		if ($this->PJVYM->Required) {
			if (!$this->PJVYM->IsDetailKey && $this->PJVYM->FormValue != NULL && $this->PJVYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVYM->caption(), $this->PJVYM->RequiredErrorMessage));
			}
		}
		if ($this->PURDISCPER->Required) {
			if (!$this->PURDISCPER->IsDetailKey && $this->PURDISCPER->FormValue != NULL && $this->PURDISCPER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURDISCPER->caption(), $this->PURDISCPER->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PURDISCPER->FormValue)) {
			AddMessage($FormError, $this->PURDISCPER->errorMessage());
		}
		if ($this->CASHIER->Required) {
			if (!$this->CASHIER->IsDetailKey && $this->CASHIER->FormValue != NULL && $this->CASHIER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHIER->caption(), $this->CASHIER->RequiredErrorMessage));
			}
		}
		if ($this->CASHTIME->Required) {
			if (!$this->CASHTIME->IsDetailKey && $this->CASHTIME->FormValue != NULL && $this->CASHTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHTIME->caption(), $this->CASHTIME->RequiredErrorMessage));
			}
		}
		if ($this->CASHRECD->Required) {
			if (!$this->CASHRECD->IsDetailKey && $this->CASHRECD->FormValue != NULL && $this->CASHRECD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHRECD->caption(), $this->CASHRECD->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->CASHRECD->FormValue)) {
			AddMessage($FormError, $this->CASHRECD->errorMessage());
		}
		if ($this->CASHREFNO->Required) {
			if (!$this->CASHREFNO->IsDetailKey && $this->CASHREFNO->FormValue != NULL && $this->CASHREFNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHREFNO->caption(), $this->CASHREFNO->RequiredErrorMessage));
			}
		}
		if ($this->CASHIERSHIFT->Required) {
			if (!$this->CASHIERSHIFT->IsDetailKey && $this->CASHIERSHIFT->FormValue != NULL && $this->CASHIERSHIFT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHIERSHIFT->caption(), $this->CASHIERSHIFT->RequiredErrorMessage));
			}
		}
		if ($this->PRCODE->Required) {
			if (!$this->PRCODE->IsDetailKey && $this->PRCODE->FormValue != NULL && $this->PRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
			}
		}
		if ($this->RELEASEBY->Required) {
			if (!$this->RELEASEBY->IsDetailKey && $this->RELEASEBY->FormValue != NULL && $this->RELEASEBY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RELEASEBY->caption(), $this->RELEASEBY->RequiredErrorMessage));
			}
		}
		if ($this->CRAUTHOR->Required) {
			if (!$this->CRAUTHOR->IsDetailKey && $this->CRAUTHOR->FormValue != NULL && $this->CRAUTHOR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CRAUTHOR->caption(), $this->CRAUTHOR->RequiredErrorMessage));
			}
		}
		if ($this->PAYMENT->Required) {
			if (!$this->PAYMENT->IsDetailKey && $this->PAYMENT->FormValue != NULL && $this->PAYMENT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PAYMENT->caption(), $this->PAYMENT->RequiredErrorMessage));
			}
		}
		if ($this->DRID->Required) {
			if (!$this->DRID->IsDetailKey && $this->DRID->FormValue != NULL && $this->DRID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
			}
		}
		if ($this->WARD->Required) {
			if (!$this->WARD->IsDetailKey && $this->WARD->FormValue != NULL && $this->WARD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WARD->caption(), $this->WARD->RequiredErrorMessage));
			}
		}
		if ($this->STAXTYPE->Required) {
			if (!$this->STAXTYPE->IsDetailKey && $this->STAXTYPE->FormValue != NULL && $this->STAXTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAXTYPE->caption(), $this->STAXTYPE->RequiredErrorMessage));
			}
		}
		if ($this->PURDISCVAL->Required) {
			if (!$this->PURDISCVAL->IsDetailKey && $this->PURDISCVAL->FormValue != NULL && $this->PURDISCVAL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURDISCVAL->caption(), $this->PURDISCVAL->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PURDISCVAL->FormValue)) {
			AddMessage($FormError, $this->PURDISCVAL->errorMessage());
		}
		if ($this->RNDOFF->Required) {
			if (!$this->RNDOFF->IsDetailKey && $this->RNDOFF->FormValue != NULL && $this->RNDOFF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RNDOFF->caption(), $this->RNDOFF->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RNDOFF->FormValue)) {
			AddMessage($FormError, $this->RNDOFF->errorMessage());
		}
		if ($this->DISCONMRP->Required) {
			if (!$this->DISCONMRP->IsDetailKey && $this->DISCONMRP->FormValue != NULL && $this->DISCONMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DISCONMRP->caption(), $this->DISCONMRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DISCONMRP->FormValue)) {
			AddMessage($FormError, $this->DISCONMRP->errorMessage());
		}
		if ($this->DELVDT->Required) {
			if (!$this->DELVDT->IsDetailKey && $this->DELVDT->FormValue != NULL && $this->DELVDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVDT->caption(), $this->DELVDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DELVDT->FormValue)) {
			AddMessage($FormError, $this->DELVDT->errorMessage());
		}
		if ($this->DELVTIME->Required) {
			if (!$this->DELVTIME->IsDetailKey && $this->DELVTIME->FormValue != NULL && $this->DELVTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVTIME->caption(), $this->DELVTIME->RequiredErrorMessage));
			}
		}
		if ($this->DELVBY->Required) {
			if (!$this->DELVBY->IsDetailKey && $this->DELVBY->FormValue != NULL && $this->DELVBY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVBY->caption(), $this->DELVBY->RequiredErrorMessage));
			}
		}
		if ($this->HOSPNO->Required) {
			if (!$this->HOSPNO->IsDetailKey && $this->HOSPNO->FormValue != NULL && $this->HOSPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOSPNO->caption(), $this->HOSPNO->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->pbv->Required) {
			if (!$this->pbv->IsDetailKey && $this->pbv->FormValue != NULL && $this->pbv->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pbv->caption(), $this->pbv->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pbv->FormValue)) {
			AddMessage($FormError, $this->pbv->errorMessage());
		}
		if ($this->pbt->Required) {
			if (!$this->pbt->IsDetailKey && $this->pbt->FormValue != NULL && $this->pbt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pbt->caption(), $this->pbt->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pbt->FormValue)) {
			AddMessage($FormError, $this->pbt->errorMessage());
		}
		if ($this->HosoID->Required) {
			if (!$this->HosoID->IsDetailKey && $this->HosoID->FormValue != NULL && $this->HosoID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HosoID->caption(), $this->HosoID->RequiredErrorMessage));
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
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Reception->FormValue)) {
			AddMessage($FormError, $this->Reception->errorMessage());
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PatID->FormValue)) {
			AddMessage($FormError, $this->PatID->errorMessage());
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
			}
		}
		if ($this->sretid->Required) {
			if (!$this->sretid->IsDetailKey && $this->sretid->FormValue != NULL && $this->sretid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sretid->caption(), $this->sretid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sretid->FormValue)) {
			AddMessage($FormError, $this->sretid->errorMessage());
		}
		if ($this->sprid->Required) {
			if (!$this->sprid->IsDetailKey && $this->sprid->FormValue != NULL && $this->sprid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sprid->caption(), $this->sprid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sprid->FormValue)) {
			AddMessage($FormError, $this->sprid->errorMessage());
		}
		if ($this->baid->Required) {
			if (!$this->baid->IsDetailKey && $this->baid->FormValue != NULL && $this->baid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->baid->caption(), $this->baid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->baid->FormValue)) {
			AddMessage($FormError, $this->baid->errorMessage());
		}
		if ($this->isdate->Required) {
			if (!$this->isdate->IsDetailKey && $this->isdate->FormValue != NULL && $this->isdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isdate->caption(), $this->isdate->RequiredErrorMessage));
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
		if ($this->HSNCODE->Required) {
			if (!$this->HSNCODE->IsDetailKey && $this->HSNCODE->FormValue != NULL && $this->HSNCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSNCODE->caption(), $this->HSNCODE->RequiredErrorMessage));
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

			// SiNo
			$this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, NULL, $this->SiNo->ReadOnly);

			// SLNO
			$this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, NULL, $this->SLNO->ReadOnly);

			// Product
			$this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, NULL, $this->Product->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// DAMT
			$this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, NULL, $this->DAMT->ReadOnly);

			// Mfg
			$this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, NULL, $this->Mfg->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

			// TYPE
			$this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, NULL, $this->TYPE->ReadOnly);

			// DN
			$this->DN->setDbValueDef($rsnew, $this->DN->CurrentValue, NULL, $this->DN->ReadOnly);

			// RDN
			$this->RDN->setDbValueDef($rsnew, $this->RDN->CurrentValue, NULL, $this->RDN->ReadOnly);

			// DT
			$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), NULL, $this->DT->ReadOnly);

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// OQ
			$this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, NULL, $this->OQ->ReadOnly);

			// RQ
			$this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, NULL, $this->RQ->ReadOnly);

			// MRQ
			$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, $this->MRQ->ReadOnly);

			// BILLNO
			$this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, NULL, $this->BILLNO->ReadOnly);

			// BILLDT
			$this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), NULL, $this->BILLDT->ReadOnly);

			// VALUE
			$this->VALUE->setDbValueDef($rsnew, $this->VALUE->CurrentValue, NULL, $this->VALUE->ReadOnly);

			// DISC
			$this->DISC->setDbValueDef($rsnew, $this->DISC->CurrentValue, NULL, $this->DISC->ReadOnly);

			// TAXP
			$this->TAXP->setDbValueDef($rsnew, $this->TAXP->CurrentValue, NULL, $this->TAXP->ReadOnly);

			// TAX
			$this->TAX->setDbValueDef($rsnew, $this->TAX->CurrentValue, NULL, $this->TAX->ReadOnly);

			// TAXR
			$this->TAXR->setDbValueDef($rsnew, $this->TAXR->CurrentValue, NULL, $this->TAXR->ReadOnly);

			// EMPNO
			$this->EMPNO->setDbValueDef($rsnew, $this->EMPNO->CurrentValue, NULL, $this->EMPNO->ReadOnly);

			// PC
			$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, $this->PC->ReadOnly);

			// DRNAME
			$this->DRNAME->setDbValueDef($rsnew, $this->DRNAME->CurrentValue, NULL, $this->DRNAME->ReadOnly);

			// BTIME
			$this->BTIME->setDbValueDef($rsnew, $this->BTIME->CurrentValue, NULL, $this->BTIME->ReadOnly);

			// ONO
			$this->ONO->setDbValueDef($rsnew, $this->ONO->CurrentValue, NULL, $this->ONO->ReadOnly);

			// ODT
			$this->ODT->setDbValueDef($rsnew, UnFormatDateTime($this->ODT->CurrentValue, 0), NULL, $this->ODT->ReadOnly);

			// PURRT
			$this->PURRT->setDbValueDef($rsnew, $this->PURRT->CurrentValue, NULL, $this->PURRT->ReadOnly);

			// GRP
			$this->GRP->setDbValueDef($rsnew, $this->GRP->CurrentValue, NULL, $this->GRP->ReadOnly);

			// IBATCH
			$this->IBATCH->setDbValueDef($rsnew, $this->IBATCH->CurrentValue, NULL, $this->IBATCH->ReadOnly);

			// IPNO
			$this->IPNO->setDbValueDef($rsnew, $this->IPNO->CurrentValue, NULL, $this->IPNO->ReadOnly);

			// OPNO
			$this->OPNO->setDbValueDef($rsnew, $this->OPNO->CurrentValue, NULL, $this->OPNO->ReadOnly);

			// RECID
			$this->RECID->setDbValueDef($rsnew, $this->RECID->CurrentValue, NULL, $this->RECID->ReadOnly);

			// FQTY
			$this->FQTY->setDbValueDef($rsnew, $this->FQTY->CurrentValue, NULL, $this->FQTY->ReadOnly);

			// UR
			$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, $this->UR->ReadOnly);

			// DCID
			$this->DCID->setDbValueDef($rsnew, $this->DCID->CurrentValue, NULL, $this->DCID->ReadOnly);

			// USERID
			$this->_USERID->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['USERID'] = &$this->_USERID->DbValue;

			// MODDT
			$this->MODDT->setDbValueDef($rsnew, UnFormatDateTime($this->MODDT->CurrentValue, 0), NULL, $this->MODDT->ReadOnly);

			// FYM
			$this->FYM->setDbValueDef($rsnew, $this->FYM->CurrentValue, NULL, $this->FYM->ReadOnly);

			// PRCBATCH
			$this->PRCBATCH->setDbValueDef($rsnew, $this->PRCBATCH->CurrentValue, NULL, $this->PRCBATCH->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// BILLYM
			$this->BILLYM->setDbValueDef($rsnew, $this->BILLYM->CurrentValue, NULL, $this->BILLYM->ReadOnly);

			// BILLGRP
			$this->BILLGRP->setDbValueDef($rsnew, $this->BILLGRP->CurrentValue, NULL, $this->BILLGRP->ReadOnly);

			// STAFF
			$this->STAFF->setDbValueDef($rsnew, $this->STAFF->CurrentValue, NULL, $this->STAFF->ReadOnly);

			// TEMPIPNO
			$this->TEMPIPNO->setDbValueDef($rsnew, $this->TEMPIPNO->CurrentValue, NULL, $this->TEMPIPNO->ReadOnly);

			// PRNTED
			$this->PRNTED->setDbValueDef($rsnew, $this->PRNTED->CurrentValue, NULL, $this->PRNTED->ReadOnly);

			// PATNAME
			$this->PATNAME->setDbValueDef($rsnew, $this->PATNAME->CurrentValue, NULL, $this->PATNAME->ReadOnly);

			// PJVNO
			$this->PJVNO->setDbValueDef($rsnew, $this->PJVNO->CurrentValue, NULL, $this->PJVNO->ReadOnly);

			// PJVSLNO
			$this->PJVSLNO->setDbValueDef($rsnew, $this->PJVSLNO->CurrentValue, NULL, $this->PJVSLNO->ReadOnly);

			// OTHDISC
			$this->OTHDISC->setDbValueDef($rsnew, $this->OTHDISC->CurrentValue, NULL, $this->OTHDISC->ReadOnly);

			// PJVYM
			$this->PJVYM->setDbValueDef($rsnew, $this->PJVYM->CurrentValue, NULL, $this->PJVYM->ReadOnly);

			// PURDISCPER
			$this->PURDISCPER->setDbValueDef($rsnew, $this->PURDISCPER->CurrentValue, NULL, $this->PURDISCPER->ReadOnly);

			// CASHIER
			$this->CASHIER->setDbValueDef($rsnew, $this->CASHIER->CurrentValue, NULL, $this->CASHIER->ReadOnly);

			// CASHTIME
			$this->CASHTIME->setDbValueDef($rsnew, $this->CASHTIME->CurrentValue, NULL, $this->CASHTIME->ReadOnly);

			// CASHRECD
			$this->CASHRECD->setDbValueDef($rsnew, $this->CASHRECD->CurrentValue, NULL, $this->CASHRECD->ReadOnly);

			// CASHREFNO
			$this->CASHREFNO->setDbValueDef($rsnew, $this->CASHREFNO->CurrentValue, NULL, $this->CASHREFNO->ReadOnly);

			// CASHIERSHIFT
			$this->CASHIERSHIFT->setDbValueDef($rsnew, $this->CASHIERSHIFT->CurrentValue, NULL, $this->CASHIERSHIFT->ReadOnly);

			// PRCODE
			$this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, NULL, $this->PRCODE->ReadOnly);

			// RELEASEBY
			$this->RELEASEBY->setDbValueDef($rsnew, $this->RELEASEBY->CurrentValue, NULL, $this->RELEASEBY->ReadOnly);

			// CRAUTHOR
			$this->CRAUTHOR->setDbValueDef($rsnew, $this->CRAUTHOR->CurrentValue, NULL, $this->CRAUTHOR->ReadOnly);

			// PAYMENT
			$this->PAYMENT->setDbValueDef($rsnew, $this->PAYMENT->CurrentValue, NULL, $this->PAYMENT->ReadOnly);

			// DRID
			$this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, NULL, $this->DRID->ReadOnly);

			// WARD
			$this->WARD->setDbValueDef($rsnew, $this->WARD->CurrentValue, NULL, $this->WARD->ReadOnly);

			// STAXTYPE
			$this->STAXTYPE->setDbValueDef($rsnew, $this->STAXTYPE->CurrentValue, NULL, $this->STAXTYPE->ReadOnly);

			// PURDISCVAL
			$this->PURDISCVAL->setDbValueDef($rsnew, $this->PURDISCVAL->CurrentValue, NULL, $this->PURDISCVAL->ReadOnly);

			// RNDOFF
			$this->RNDOFF->setDbValueDef($rsnew, $this->RNDOFF->CurrentValue, NULL, $this->RNDOFF->ReadOnly);

			// DISCONMRP
			$this->DISCONMRP->setDbValueDef($rsnew, $this->DISCONMRP->CurrentValue, NULL, $this->DISCONMRP->ReadOnly);

			// DELVDT
			$this->DELVDT->setDbValueDef($rsnew, UnFormatDateTime($this->DELVDT->CurrentValue, 0), NULL, $this->DELVDT->ReadOnly);

			// DELVTIME
			$this->DELVTIME->setDbValueDef($rsnew, $this->DELVTIME->CurrentValue, NULL, $this->DELVTIME->ReadOnly);

			// DELVBY
			$this->DELVBY->setDbValueDef($rsnew, $this->DELVBY->CurrentValue, NULL, $this->DELVBY->ReadOnly);

			// HOSPNO
			$this->HOSPNO->setDbValueDef($rsnew, $this->HOSPNO->CurrentValue, NULL, $this->HOSPNO->ReadOnly);

			// pbv
			$this->pbv->setDbValueDef($rsnew, $this->pbv->CurrentValue, NULL, $this->pbv->ReadOnly);

			// pbt
			$this->pbt->setDbValueDef($rsnew, $this->pbt->CurrentValue, NULL, $this->pbt->ReadOnly);

			// HosoID
			$this->HosoID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HosoID'] = &$this->HosoID->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// Reception
			$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, $this->Reception->ReadOnly);

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly);

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);

			// BRNAME
			$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

			// sretid
			$this->sretid->setDbValueDef($rsnew, $this->sretid->CurrentValue, NULL, $this->sretid->ReadOnly);

			// sprid
			$this->sprid->setDbValueDef($rsnew, $this->sprid->CurrentValue, NULL, $this->sprid->ReadOnly);

			// baid
			$this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, NULL, $this->baid->ReadOnly);

			// isdate
			$this->isdate->setDbValueDef($rsnew, CurrentDate(), NULL);
			$rsnew['isdate'] = &$this->isdate->DbValue;

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// PurValue
			$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, $this->PurValue->ReadOnly);

			// PurRate
			$this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, NULL, $this->PurRate->ReadOnly);

			// PUnit
			$this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, NULL, $this->PUnit->ReadOnly);

			// SUnit
			$this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, NULL, $this->SUnit->ReadOnly);

			// HSNCODE
			$this->HSNCODE->setDbValueDef($rsnew, $this->HSNCODE->CurrentValue, NULL, $this->HSNCODE->ReadOnly);

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
			if ($masterTblVar == "pharmacy_billing_voucher") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->pbv->setQueryStringValue(Get("fk_id"));
					$this->pbv->setSessionValue($this->pbv->QueryStringValue);
					if (!is_numeric($this->pbv->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "pharmacy_billing_issue") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->pbt->setQueryStringValue(Get("fk_id"));
					$this->pbt->setSessionValue($this->pbt->QueryStringValue);
					if (!is_numeric($this->pbt->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Get("fk_mrnNo") !== NULL) {
					$this->mrnno->setQueryStringValue(Get("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_patient_id") !== NULL) {
					$this->PatID->setQueryStringValue(Get("fk_patient_id"));
					$this->PatID->setSessionValue($this->PatID->QueryStringValue);
					if (!is_numeric($this->PatID->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_id") !== NULL) {
					$this->Reception->setQueryStringValue(Get("fk_id"));
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($this->Reception->QueryStringValue))
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
			if ($masterTblVar == "pharmacy_billing_voucher") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->pbv->setFormValue(Post("fk_id"));
					$this->pbv->setSessionValue($this->pbv->FormValue);
					if (!is_numeric($this->pbv->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "pharmacy_billing_issue") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->pbt->setFormValue(Post("fk_id"));
					$this->pbt->setSessionValue($this->pbt->FormValue);
					if (!is_numeric($this->pbt->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Post("fk_mrnNo") !== NULL) {
					$this->mrnno->setFormValue(Post("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_patient_id") !== NULL) {
					$this->PatID->setFormValue(Post("fk_patient_id"));
					$this->PatID->setSessionValue($this->PatID->FormValue);
					if (!is_numeric($this->PatID->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_id") !== NULL) {
					$this->Reception->setFormValue(Post("fk_id"));
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($this->Reception->FormValue))
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
			if ($masterTblVar <> "pharmacy_billing_voucher") {
				if ($this->pbv->CurrentValue == "")
					$this->pbv->setSessionValue("");
			}
			if ($masterTblVar <> "pharmacy_billing_issue") {
				if ($this->pbt->CurrentValue == "")
					$this->pbt->setSessionValue("");
			}
			if ($masterTblVar <> "ip_admission") {
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
				if ($this->PatID->CurrentValue == "")
					$this->PatID->setSessionValue("");
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_pharledlist.php"), "", $this->TableVar, TRUE);
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
				case "x_SLNO":
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
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
						case "x_SLNO":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
							$row[4] = FormatDateTime($row[4], 0);
							$row['df4'] = $row[4];
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
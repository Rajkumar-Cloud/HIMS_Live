<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_storemast_addopt extends pharmacy_storemast
{

	// Page ID
	public $PageID = "addopt";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_storemast';

	// Page object name
	public $PageObjName = "pharmacy_storemast_addopt";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'addopt');

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
			SaveDebugMessage();
			AddHeader("Location", $url);
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

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

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
		$this->UR->setVisibility();
		$this->TAXP->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->SALQTY->setVisibility();
		$this->LASTPURDT->setVisibility();
		$this->LASTSUPP->setVisibility();
		$this->GENNAME->setVisibility();
		$this->LASTISSDT->setVisibility();
		$this->CREATEDDT->setVisibility();
		$this->OPPRC->setVisibility();
		$this->RESTRICT->setVisibility();
		$this->BAWAPRC->setVisibility();
		$this->STAXPER->setVisibility();
		$this->TAXTYPE->setVisibility();
		$this->OLDTAXP->setVisibility();
		$this->TAXUPD->setVisibility();
		$this->PACKAGE->setVisibility();
		$this->NEWRT->setVisibility();
		$this->NEWMRP->setVisibility();
		$this->NEWUR->setVisibility();
		$this->STATUS->setVisibility();
		$this->RETNQTY->setVisibility();
		$this->KEMODISC->setVisibility();
		$this->PATSALE->setVisibility();
		$this->ORGAN->setVisibility();
		$this->OLDRQ->setVisibility();
		$this->DRID->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->COMBCODE->setVisibility();
		$this->GENCODE->setVisibility();
		$this->STRENGTH->setVisibility();
		$this->UNIT->setVisibility();
		$this->FORMULARY->setVisibility();
		$this->STOCK->setVisibility();
		$this->RACKNO->setVisibility();
		$this->SUPPNAME->setVisibility();
		$this->COMBNAME->setVisibility();
		$this->GENERICNAME->setVisibility();
		$this->REMARK->setVisibility();
		$this->TEMP->setVisibility();
		$this->PACKING->setVisibility();
		$this->PhysQty->setVisibility();
		$this->LedQty->setVisibility();
		$this->id->Visible = FALSE;
		$this->PurValue->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SaleValue->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->SaleRate->setVisibility();
		$this->HospID->setVisibility();
		$this->BRNAME->setVisibility();
		$this->OV->setVisibility();
		$this->LATESTOV->setVisibility();
		$this->ITEMTYPE->setVisibility();
		$this->ROWID->setVisibility();
		$this->MOVED->setVisibility();
		$this->NEWTAX->setVisibility();
		$this->HSNCODE->setVisibility();
		$this->OLDTAX->setVisibility();
		$this->Scheduling->setVisibility();
		$this->Schedulingh1->setVisibility();
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
		set_error_handler(PROJECT_NAMESPACE . "ErrorHandler");

		// Set up Breadcrumb
		//$this->setupBreadcrumb(); // Not used

		$this->loadRowValues(); // Load default values

		// Render row
		$this->RowType = ROWTYPE_ADD; // Render add type
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
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->TYPE->CurrentValue = NULL;
		$this->TYPE->OldValue = $this->TYPE->CurrentValue;
		$this->DES->CurrentValue = NULL;
		$this->DES->OldValue = $this->DES->CurrentValue;
		$this->UM->CurrentValue = NULL;
		$this->UM->OldValue = $this->UM->CurrentValue;
		$this->RT->CurrentValue = NULL;
		$this->RT->OldValue = $this->RT->CurrentValue;
		$this->UR->CurrentValue = NULL;
		$this->UR->OldValue = $this->UR->CurrentValue;
		$this->TAXP->CurrentValue = NULL;
		$this->TAXP->OldValue = $this->TAXP->CurrentValue;
		$this->BATCHNO->CurrentValue = NULL;
		$this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
		$this->OQ->CurrentValue = NULL;
		$this->OQ->OldValue = $this->OQ->CurrentValue;
		$this->RQ->CurrentValue = NULL;
		$this->RQ->OldValue = $this->RQ->CurrentValue;
		$this->MRQ->CurrentValue = NULL;
		$this->MRQ->OldValue = $this->MRQ->CurrentValue;
		$this->IQ->CurrentValue = NULL;
		$this->IQ->OldValue = $this->IQ->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->EXPDT->CurrentValue = NULL;
		$this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
		$this->SALQTY->CurrentValue = NULL;
		$this->SALQTY->OldValue = $this->SALQTY->CurrentValue;
		$this->LASTPURDT->CurrentValue = NULL;
		$this->LASTPURDT->OldValue = $this->LASTPURDT->CurrentValue;
		$this->LASTSUPP->CurrentValue = NULL;
		$this->LASTSUPP->OldValue = $this->LASTSUPP->CurrentValue;
		$this->GENNAME->CurrentValue = NULL;
		$this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
		$this->LASTISSDT->CurrentValue = NULL;
		$this->LASTISSDT->OldValue = $this->LASTISSDT->CurrentValue;
		$this->CREATEDDT->CurrentValue = NULL;
		$this->CREATEDDT->OldValue = $this->CREATEDDT->CurrentValue;
		$this->OPPRC->CurrentValue = NULL;
		$this->OPPRC->OldValue = $this->OPPRC->CurrentValue;
		$this->RESTRICT->CurrentValue = NULL;
		$this->RESTRICT->OldValue = $this->RESTRICT->CurrentValue;
		$this->BAWAPRC->CurrentValue = NULL;
		$this->BAWAPRC->OldValue = $this->BAWAPRC->CurrentValue;
		$this->STAXPER->CurrentValue = NULL;
		$this->STAXPER->OldValue = $this->STAXPER->CurrentValue;
		$this->TAXTYPE->CurrentValue = NULL;
		$this->TAXTYPE->OldValue = $this->TAXTYPE->CurrentValue;
		$this->OLDTAXP->CurrentValue = NULL;
		$this->OLDTAXP->OldValue = $this->OLDTAXP->CurrentValue;
		$this->TAXUPD->CurrentValue = NULL;
		$this->TAXUPD->OldValue = $this->TAXUPD->CurrentValue;
		$this->PACKAGE->CurrentValue = NULL;
		$this->PACKAGE->OldValue = $this->PACKAGE->CurrentValue;
		$this->NEWRT->CurrentValue = NULL;
		$this->NEWRT->OldValue = $this->NEWRT->CurrentValue;
		$this->NEWMRP->CurrentValue = NULL;
		$this->NEWMRP->OldValue = $this->NEWMRP->CurrentValue;
		$this->NEWUR->CurrentValue = NULL;
		$this->NEWUR->OldValue = $this->NEWUR->CurrentValue;
		$this->STATUS->CurrentValue = NULL;
		$this->STATUS->OldValue = $this->STATUS->CurrentValue;
		$this->RETNQTY->CurrentValue = NULL;
		$this->RETNQTY->OldValue = $this->RETNQTY->CurrentValue;
		$this->KEMODISC->CurrentValue = NULL;
		$this->KEMODISC->OldValue = $this->KEMODISC->CurrentValue;
		$this->PATSALE->CurrentValue = NULL;
		$this->PATSALE->OldValue = $this->PATSALE->CurrentValue;
		$this->ORGAN->CurrentValue = NULL;
		$this->ORGAN->OldValue = $this->ORGAN->CurrentValue;
		$this->OLDRQ->CurrentValue = NULL;
		$this->OLDRQ->OldValue = $this->OLDRQ->CurrentValue;
		$this->DRID->CurrentValue = NULL;
		$this->DRID->OldValue = $this->DRID->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->COMBCODE->CurrentValue = NULL;
		$this->COMBCODE->OldValue = $this->COMBCODE->CurrentValue;
		$this->GENCODE->CurrentValue = NULL;
		$this->GENCODE->OldValue = $this->GENCODE->CurrentValue;
		$this->STRENGTH->CurrentValue = NULL;
		$this->STRENGTH->OldValue = $this->STRENGTH->CurrentValue;
		$this->UNIT->CurrentValue = NULL;
		$this->UNIT->OldValue = $this->UNIT->CurrentValue;
		$this->FORMULARY->CurrentValue = NULL;
		$this->FORMULARY->OldValue = $this->FORMULARY->CurrentValue;
		$this->STOCK->CurrentValue = NULL;
		$this->STOCK->OldValue = $this->STOCK->CurrentValue;
		$this->RACKNO->CurrentValue = NULL;
		$this->RACKNO->OldValue = $this->RACKNO->CurrentValue;
		$this->SUPPNAME->CurrentValue = NULL;
		$this->SUPPNAME->OldValue = $this->SUPPNAME->CurrentValue;
		$this->COMBNAME->CurrentValue = NULL;
		$this->COMBNAME->OldValue = $this->COMBNAME->CurrentValue;
		$this->GENERICNAME->CurrentValue = NULL;
		$this->GENERICNAME->OldValue = $this->GENERICNAME->CurrentValue;
		$this->REMARK->CurrentValue = NULL;
		$this->REMARK->OldValue = $this->REMARK->CurrentValue;
		$this->TEMP->CurrentValue = NULL;
		$this->TEMP->OldValue = $this->TEMP->CurrentValue;
		$this->PACKING->CurrentValue = NULL;
		$this->PACKING->OldValue = $this->PACKING->CurrentValue;
		$this->PhysQty->CurrentValue = NULL;
		$this->PhysQty->OldValue = $this->PhysQty->CurrentValue;
		$this->LedQty->CurrentValue = NULL;
		$this->LedQty->OldValue = $this->LedQty->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->PurValue->CurrentValue = NULL;
		$this->PurValue->OldValue = $this->PurValue->CurrentValue;
		$this->PSGST->CurrentValue = NULL;
		$this->PSGST->OldValue = $this->PSGST->CurrentValue;
		$this->PCGST->CurrentValue = NULL;
		$this->PCGST->OldValue = $this->PCGST->CurrentValue;
		$this->SaleValue->CurrentValue = NULL;
		$this->SaleValue->OldValue = $this->SaleValue->CurrentValue;
		$this->SSGST->CurrentValue = NULL;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = NULL;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->SaleRate->CurrentValue = NULL;
		$this->SaleRate->OldValue = $this->SaleRate->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->BRNAME->CurrentValue = NULL;
		$this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
		$this->OV->CurrentValue = NULL;
		$this->OV->OldValue = $this->OV->CurrentValue;
		$this->LATESTOV->CurrentValue = NULL;
		$this->LATESTOV->OldValue = $this->LATESTOV->CurrentValue;
		$this->ITEMTYPE->CurrentValue = NULL;
		$this->ITEMTYPE->OldValue = $this->ITEMTYPE->CurrentValue;
		$this->ROWID->CurrentValue = NULL;
		$this->ROWID->OldValue = $this->ROWID->CurrentValue;
		$this->MOVED->CurrentValue = NULL;
		$this->MOVED->OldValue = $this->MOVED->CurrentValue;
		$this->NEWTAX->CurrentValue = NULL;
		$this->NEWTAX->OldValue = $this->NEWTAX->CurrentValue;
		$this->HSNCODE->CurrentValue = NULL;
		$this->HSNCODE->OldValue = $this->HSNCODE->CurrentValue;
		$this->OLDTAX->CurrentValue = NULL;
		$this->OLDTAX->OldValue = $this->OLDTAX->CurrentValue;
		$this->Scheduling->CurrentValue = NULL;
		$this->Scheduling->OldValue = $this->Scheduling->CurrentValue;
		$this->Schedulingh1->CurrentValue = NULL;
		$this->Schedulingh1->OldValue = $this->Schedulingh1->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			$this->BRCODE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			$this->PRC->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'TYPE' first before field var 'x_TYPE'
		$val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
		if (!$this->TYPE->IsDetailKey) {
			$this->TYPE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'DES' first before field var 'x_DES'
		$val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
		if (!$this->DES->IsDetailKey) {
			$this->DES->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'UM' first before field var 'x_UM'
		$val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
		if (!$this->UM->IsDetailKey) {
			$this->UM->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			$this->RT->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			$this->UR->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'TAXP' first before field var 'x_TAXP'
		$val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
		if (!$this->TAXP->IsDetailKey) {
			$this->TAXP->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			$this->BATCHNO->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'OQ' first before field var 'x_OQ'
		$val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
		if (!$this->OQ->IsDetailKey) {
			$this->OQ->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'RQ' first before field var 'x_RQ'
		$val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
		if (!$this->RQ->IsDetailKey) {
			$this->RQ->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'MRQ' first before field var 'x_MRQ'
		$val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
		if (!$this->MRQ->IsDetailKey) {
			$this->MRQ->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			$this->IQ->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			$this->MRP->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			$this->EXPDT->setFormValue(ConvertFromUtf8($val));
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}

		// Check field name 'SALQTY' first before field var 'x_SALQTY'
		$val = $CurrentForm->hasValue("SALQTY") ? $CurrentForm->getValue("SALQTY") : $CurrentForm->getValue("x_SALQTY");
		if (!$this->SALQTY->IsDetailKey) {
			$this->SALQTY->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'LASTPURDT' first before field var 'x_LASTPURDT'
		$val = $CurrentForm->hasValue("LASTPURDT") ? $CurrentForm->getValue("LASTPURDT") : $CurrentForm->getValue("x_LASTPURDT");
		if (!$this->LASTPURDT->IsDetailKey) {
			$this->LASTPURDT->setFormValue(ConvertFromUtf8($val));
			$this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
		}

		// Check field name 'LASTSUPP' first before field var 'x_LASTSUPP'
		$val = $CurrentForm->hasValue("LASTSUPP") ? $CurrentForm->getValue("LASTSUPP") : $CurrentForm->getValue("x_LASTSUPP");
		if (!$this->LASTSUPP->IsDetailKey) {
			$this->LASTSUPP->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'GENNAME' first before field var 'x_GENNAME'
		$val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
		if (!$this->GENNAME->IsDetailKey) {
			$this->GENNAME->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'LASTISSDT' first before field var 'x_LASTISSDT'
		$val = $CurrentForm->hasValue("LASTISSDT") ? $CurrentForm->getValue("LASTISSDT") : $CurrentForm->getValue("x_LASTISSDT");
		if (!$this->LASTISSDT->IsDetailKey) {
			$this->LASTISSDT->setFormValue(ConvertFromUtf8($val));
			$this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
		}

		// Check field name 'CREATEDDT' first before field var 'x_CREATEDDT'
		$val = $CurrentForm->hasValue("CREATEDDT") ? $CurrentForm->getValue("CREATEDDT") : $CurrentForm->getValue("x_CREATEDDT");
		if (!$this->CREATEDDT->IsDetailKey) {
			$this->CREATEDDT->setFormValue(ConvertFromUtf8($val));
			$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		}

		// Check field name 'OPPRC' first before field var 'x_OPPRC'
		$val = $CurrentForm->hasValue("OPPRC") ? $CurrentForm->getValue("OPPRC") : $CurrentForm->getValue("x_OPPRC");
		if (!$this->OPPRC->IsDetailKey) {
			$this->OPPRC->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'RESTRICT' first before field var 'x_RESTRICT'
		$val = $CurrentForm->hasValue("RESTRICT") ? $CurrentForm->getValue("RESTRICT") : $CurrentForm->getValue("x_RESTRICT");
		if (!$this->RESTRICT->IsDetailKey) {
			$this->RESTRICT->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'BAWAPRC' first before field var 'x_BAWAPRC'
		$val = $CurrentForm->hasValue("BAWAPRC") ? $CurrentForm->getValue("BAWAPRC") : $CurrentForm->getValue("x_BAWAPRC");
		if (!$this->BAWAPRC->IsDetailKey) {
			$this->BAWAPRC->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'STAXPER' first before field var 'x_STAXPER'
		$val = $CurrentForm->hasValue("STAXPER") ? $CurrentForm->getValue("STAXPER") : $CurrentForm->getValue("x_STAXPER");
		if (!$this->STAXPER->IsDetailKey) {
			$this->STAXPER->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'TAXTYPE' first before field var 'x_TAXTYPE'
		$val = $CurrentForm->hasValue("TAXTYPE") ? $CurrentForm->getValue("TAXTYPE") : $CurrentForm->getValue("x_TAXTYPE");
		if (!$this->TAXTYPE->IsDetailKey) {
			$this->TAXTYPE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'OLDTAXP' first before field var 'x_OLDTAXP'
		$val = $CurrentForm->hasValue("OLDTAXP") ? $CurrentForm->getValue("OLDTAXP") : $CurrentForm->getValue("x_OLDTAXP");
		if (!$this->OLDTAXP->IsDetailKey) {
			$this->OLDTAXP->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'TAXUPD' first before field var 'x_TAXUPD'
		$val = $CurrentForm->hasValue("TAXUPD") ? $CurrentForm->getValue("TAXUPD") : $CurrentForm->getValue("x_TAXUPD");
		if (!$this->TAXUPD->IsDetailKey) {
			$this->TAXUPD->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PACKAGE' first before field var 'x_PACKAGE'
		$val = $CurrentForm->hasValue("PACKAGE") ? $CurrentForm->getValue("PACKAGE") : $CurrentForm->getValue("x_PACKAGE");
		if (!$this->PACKAGE->IsDetailKey) {
			$this->PACKAGE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'NEWRT' first before field var 'x_NEWRT'
		$val = $CurrentForm->hasValue("NEWRT") ? $CurrentForm->getValue("NEWRT") : $CurrentForm->getValue("x_NEWRT");
		if (!$this->NEWRT->IsDetailKey) {
			$this->NEWRT->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'NEWMRP' first before field var 'x_NEWMRP'
		$val = $CurrentForm->hasValue("NEWMRP") ? $CurrentForm->getValue("NEWMRP") : $CurrentForm->getValue("x_NEWMRP");
		if (!$this->NEWMRP->IsDetailKey) {
			$this->NEWMRP->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'NEWUR' first before field var 'x_NEWUR'
		$val = $CurrentForm->hasValue("NEWUR") ? $CurrentForm->getValue("NEWUR") : $CurrentForm->getValue("x_NEWUR");
		if (!$this->NEWUR->IsDetailKey) {
			$this->NEWUR->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'STATUS' first before field var 'x_STATUS'
		$val = $CurrentForm->hasValue("STATUS") ? $CurrentForm->getValue("STATUS") : $CurrentForm->getValue("x_STATUS");
		if (!$this->STATUS->IsDetailKey) {
			$this->STATUS->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'RETNQTY' first before field var 'x_RETNQTY'
		$val = $CurrentForm->hasValue("RETNQTY") ? $CurrentForm->getValue("RETNQTY") : $CurrentForm->getValue("x_RETNQTY");
		if (!$this->RETNQTY->IsDetailKey) {
			$this->RETNQTY->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'KEMODISC' first before field var 'x_KEMODISC'
		$val = $CurrentForm->hasValue("KEMODISC") ? $CurrentForm->getValue("KEMODISC") : $CurrentForm->getValue("x_KEMODISC");
		if (!$this->KEMODISC->IsDetailKey) {
			$this->KEMODISC->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PATSALE' first before field var 'x_PATSALE'
		$val = $CurrentForm->hasValue("PATSALE") ? $CurrentForm->getValue("PATSALE") : $CurrentForm->getValue("x_PATSALE");
		if (!$this->PATSALE->IsDetailKey) {
			$this->PATSALE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ORGAN' first before field var 'x_ORGAN'
		$val = $CurrentForm->hasValue("ORGAN") ? $CurrentForm->getValue("ORGAN") : $CurrentForm->getValue("x_ORGAN");
		if (!$this->ORGAN->IsDetailKey) {
			$this->ORGAN->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'OLDRQ' first before field var 'x_OLDRQ'
		$val = $CurrentForm->hasValue("OLDRQ") ? $CurrentForm->getValue("OLDRQ") : $CurrentForm->getValue("x_OLDRQ");
		if (!$this->OLDRQ->IsDetailKey) {
			$this->OLDRQ->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'DRID' first before field var 'x_DRID'
		$val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
		if (!$this->DRID->IsDetailKey) {
			$this->DRID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			$this->MFRCODE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'COMBCODE' first before field var 'x_COMBCODE'
		$val = $CurrentForm->hasValue("COMBCODE") ? $CurrentForm->getValue("COMBCODE") : $CurrentForm->getValue("x_COMBCODE");
		if (!$this->COMBCODE->IsDetailKey) {
			$this->COMBCODE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'GENCODE' first before field var 'x_GENCODE'
		$val = $CurrentForm->hasValue("GENCODE") ? $CurrentForm->getValue("GENCODE") : $CurrentForm->getValue("x_GENCODE");
		if (!$this->GENCODE->IsDetailKey) {
			$this->GENCODE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'STRENGTH' first before field var 'x_STRENGTH'
		$val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
		if (!$this->STRENGTH->IsDetailKey) {
			$this->STRENGTH->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'UNIT' first before field var 'x_UNIT'
		$val = $CurrentForm->hasValue("UNIT") ? $CurrentForm->getValue("UNIT") : $CurrentForm->getValue("x_UNIT");
		if (!$this->UNIT->IsDetailKey) {
			$this->UNIT->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'FORMULARY' first before field var 'x_FORMULARY'
		$val = $CurrentForm->hasValue("FORMULARY") ? $CurrentForm->getValue("FORMULARY") : $CurrentForm->getValue("x_FORMULARY");
		if (!$this->FORMULARY->IsDetailKey) {
			$this->FORMULARY->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'STOCK' first before field var 'x_STOCK'
		$val = $CurrentForm->hasValue("STOCK") ? $CurrentForm->getValue("STOCK") : $CurrentForm->getValue("x_STOCK");
		if (!$this->STOCK->IsDetailKey) {
			$this->STOCK->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'RACKNO' first before field var 'x_RACKNO'
		$val = $CurrentForm->hasValue("RACKNO") ? $CurrentForm->getValue("RACKNO") : $CurrentForm->getValue("x_RACKNO");
		if (!$this->RACKNO->IsDetailKey) {
			$this->RACKNO->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'SUPPNAME' first before field var 'x_SUPPNAME'
		$val = $CurrentForm->hasValue("SUPPNAME") ? $CurrentForm->getValue("SUPPNAME") : $CurrentForm->getValue("x_SUPPNAME");
		if (!$this->SUPPNAME->IsDetailKey) {
			$this->SUPPNAME->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'COMBNAME' first before field var 'x_COMBNAME'
		$val = $CurrentForm->hasValue("COMBNAME") ? $CurrentForm->getValue("COMBNAME") : $CurrentForm->getValue("x_COMBNAME");
		if (!$this->COMBNAME->IsDetailKey) {
			$this->COMBNAME->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'GENERICNAME' first before field var 'x_GENERICNAME'
		$val = $CurrentForm->hasValue("GENERICNAME") ? $CurrentForm->getValue("GENERICNAME") : $CurrentForm->getValue("x_GENERICNAME");
		if (!$this->GENERICNAME->IsDetailKey) {
			$this->GENERICNAME->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'REMARK' first before field var 'x_REMARK'
		$val = $CurrentForm->hasValue("REMARK") ? $CurrentForm->getValue("REMARK") : $CurrentForm->getValue("x_REMARK");
		if (!$this->REMARK->IsDetailKey) {
			$this->REMARK->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'TEMP' first before field var 'x_TEMP'
		$val = $CurrentForm->hasValue("TEMP") ? $CurrentForm->getValue("TEMP") : $CurrentForm->getValue("x_TEMP");
		if (!$this->TEMP->IsDetailKey) {
			$this->TEMP->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PACKING' first before field var 'x_PACKING'
		$val = $CurrentForm->hasValue("PACKING") ? $CurrentForm->getValue("PACKING") : $CurrentForm->getValue("x_PACKING");
		if (!$this->PACKING->IsDetailKey) {
			$this->PACKING->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PhysQty' first before field var 'x_PhysQty'
		$val = $CurrentForm->hasValue("PhysQty") ? $CurrentForm->getValue("PhysQty") : $CurrentForm->getValue("x_PhysQty");
		if (!$this->PhysQty->IsDetailKey) {
			$this->PhysQty->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'LedQty' first before field var 'x_LedQty'
		$val = $CurrentForm->hasValue("LedQty") ? $CurrentForm->getValue("LedQty") : $CurrentForm->getValue("x_LedQty");
		if (!$this->LedQty->IsDetailKey) {
			$this->LedQty->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			$this->PurValue->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PSGST' first before field var 'x_PSGST'
		$val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
		if (!$this->PSGST->IsDetailKey) {
			$this->PSGST->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PCGST' first before field var 'x_PCGST'
		$val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
		if (!$this->PCGST->IsDetailKey) {
			$this->PCGST->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'SaleValue' first before field var 'x_SaleValue'
		$val = $CurrentForm->hasValue("SaleValue") ? $CurrentForm->getValue("SaleValue") : $CurrentForm->getValue("x_SaleValue");
		if (!$this->SaleValue->IsDetailKey) {
			$this->SaleValue->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'SSGST' first before field var 'x_SSGST'
		$val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
		if (!$this->SSGST->IsDetailKey) {
			$this->SSGST->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'SCGST' first before field var 'x_SCGST'
		$val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
		if (!$this->SCGST->IsDetailKey) {
			$this->SCGST->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'SaleRate' first before field var 'x_SaleRate'
		$val = $CurrentForm->hasValue("SaleRate") ? $CurrentForm->getValue("SaleRate") : $CurrentForm->getValue("x_SaleRate");
		if (!$this->SaleRate->IsDetailKey) {
			$this->SaleRate->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			$this->HospID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			$this->BRNAME->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'OV' first before field var 'x_OV'
		$val = $CurrentForm->hasValue("OV") ? $CurrentForm->getValue("OV") : $CurrentForm->getValue("x_OV");
		if (!$this->OV->IsDetailKey) {
			$this->OV->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'LATESTOV' first before field var 'x_LATESTOV'
		$val = $CurrentForm->hasValue("LATESTOV") ? $CurrentForm->getValue("LATESTOV") : $CurrentForm->getValue("x_LATESTOV");
		if (!$this->LATESTOV->IsDetailKey) {
			$this->LATESTOV->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ITEMTYPE' first before field var 'x_ITEMTYPE'
		$val = $CurrentForm->hasValue("ITEMTYPE") ? $CurrentForm->getValue("ITEMTYPE") : $CurrentForm->getValue("x_ITEMTYPE");
		if (!$this->ITEMTYPE->IsDetailKey) {
			$this->ITEMTYPE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ROWID' first before field var 'x_ROWID'
		$val = $CurrentForm->hasValue("ROWID") ? $CurrentForm->getValue("ROWID") : $CurrentForm->getValue("x_ROWID");
		if (!$this->ROWID->IsDetailKey) {
			$this->ROWID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'MOVED' first before field var 'x_MOVED'
		$val = $CurrentForm->hasValue("MOVED") ? $CurrentForm->getValue("MOVED") : $CurrentForm->getValue("x_MOVED");
		if (!$this->MOVED->IsDetailKey) {
			$this->MOVED->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'NEWTAX' first before field var 'x_NEWTAX'
		$val = $CurrentForm->hasValue("NEWTAX") ? $CurrentForm->getValue("NEWTAX") : $CurrentForm->getValue("x_NEWTAX");
		if (!$this->NEWTAX->IsDetailKey) {
			$this->NEWTAX->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'HSNCODE' first before field var 'x_HSNCODE'
		$val = $CurrentForm->hasValue("HSNCODE") ? $CurrentForm->getValue("HSNCODE") : $CurrentForm->getValue("x_HSNCODE");
		if (!$this->HSNCODE->IsDetailKey) {
			$this->HSNCODE->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'OLDTAX' first before field var 'x_OLDTAX'
		$val = $CurrentForm->hasValue("OLDTAX") ? $CurrentForm->getValue("OLDTAX") : $CurrentForm->getValue("x_OLDTAX");
		if (!$this->OLDTAX->IsDetailKey) {
			$this->OLDTAX->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Scheduling' first before field var 'x_Scheduling'
		$val = $CurrentForm->hasValue("Scheduling") ? $CurrentForm->getValue("Scheduling") : $CurrentForm->getValue("x_Scheduling");
		if (!$this->Scheduling->IsDetailKey) {
			$this->Scheduling->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Schedulingh1' first before field var 'x_Schedulingh1'
		$val = $CurrentForm->hasValue("Schedulingh1") ? $CurrentForm->getValue("Schedulingh1") : $CurrentForm->getValue("x_Schedulingh1");
		if (!$this->Schedulingh1->IsDetailKey) {
			$this->Schedulingh1->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->BRCODE->CurrentValue = ConvertToUtf8($this->BRCODE->FormValue);
		$this->PRC->CurrentValue = ConvertToUtf8($this->PRC->FormValue);
		$this->TYPE->CurrentValue = ConvertToUtf8($this->TYPE->FormValue);
		$this->DES->CurrentValue = ConvertToUtf8($this->DES->FormValue);
		$this->UM->CurrentValue = ConvertToUtf8($this->UM->FormValue);
		$this->RT->CurrentValue = ConvertToUtf8($this->RT->FormValue);
		$this->UR->CurrentValue = ConvertToUtf8($this->UR->FormValue);
		$this->TAXP->CurrentValue = ConvertToUtf8($this->TAXP->FormValue);
		$this->BATCHNO->CurrentValue = ConvertToUtf8($this->BATCHNO->FormValue);
		$this->OQ->CurrentValue = ConvertToUtf8($this->OQ->FormValue);
		$this->RQ->CurrentValue = ConvertToUtf8($this->RQ->FormValue);
		$this->MRQ->CurrentValue = ConvertToUtf8($this->MRQ->FormValue);
		$this->IQ->CurrentValue = ConvertToUtf8($this->IQ->FormValue);
		$this->MRP->CurrentValue = ConvertToUtf8($this->MRP->FormValue);
		$this->EXPDT->CurrentValue = ConvertToUtf8($this->EXPDT->FormValue);
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->SALQTY->CurrentValue = ConvertToUtf8($this->SALQTY->FormValue);
		$this->LASTPURDT->CurrentValue = ConvertToUtf8($this->LASTPURDT->FormValue);
		$this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
		$this->LASTSUPP->CurrentValue = ConvertToUtf8($this->LASTSUPP->FormValue);
		$this->GENNAME->CurrentValue = ConvertToUtf8($this->GENNAME->FormValue);
		$this->LASTISSDT->CurrentValue = ConvertToUtf8($this->LASTISSDT->FormValue);
		$this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
		$this->CREATEDDT->CurrentValue = ConvertToUtf8($this->CREATEDDT->FormValue);
		$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		$this->OPPRC->CurrentValue = ConvertToUtf8($this->OPPRC->FormValue);
		$this->RESTRICT->CurrentValue = ConvertToUtf8($this->RESTRICT->FormValue);
		$this->BAWAPRC->CurrentValue = ConvertToUtf8($this->BAWAPRC->FormValue);
		$this->STAXPER->CurrentValue = ConvertToUtf8($this->STAXPER->FormValue);
		$this->TAXTYPE->CurrentValue = ConvertToUtf8($this->TAXTYPE->FormValue);
		$this->OLDTAXP->CurrentValue = ConvertToUtf8($this->OLDTAXP->FormValue);
		$this->TAXUPD->CurrentValue = ConvertToUtf8($this->TAXUPD->FormValue);
		$this->PACKAGE->CurrentValue = ConvertToUtf8($this->PACKAGE->FormValue);
		$this->NEWRT->CurrentValue = ConvertToUtf8($this->NEWRT->FormValue);
		$this->NEWMRP->CurrentValue = ConvertToUtf8($this->NEWMRP->FormValue);
		$this->NEWUR->CurrentValue = ConvertToUtf8($this->NEWUR->FormValue);
		$this->STATUS->CurrentValue = ConvertToUtf8($this->STATUS->FormValue);
		$this->RETNQTY->CurrentValue = ConvertToUtf8($this->RETNQTY->FormValue);
		$this->KEMODISC->CurrentValue = ConvertToUtf8($this->KEMODISC->FormValue);
		$this->PATSALE->CurrentValue = ConvertToUtf8($this->PATSALE->FormValue);
		$this->ORGAN->CurrentValue = ConvertToUtf8($this->ORGAN->FormValue);
		$this->OLDRQ->CurrentValue = ConvertToUtf8($this->OLDRQ->FormValue);
		$this->DRID->CurrentValue = ConvertToUtf8($this->DRID->FormValue);
		$this->MFRCODE->CurrentValue = ConvertToUtf8($this->MFRCODE->FormValue);
		$this->COMBCODE->CurrentValue = ConvertToUtf8($this->COMBCODE->FormValue);
		$this->GENCODE->CurrentValue = ConvertToUtf8($this->GENCODE->FormValue);
		$this->STRENGTH->CurrentValue = ConvertToUtf8($this->STRENGTH->FormValue);
		$this->UNIT->CurrentValue = ConvertToUtf8($this->UNIT->FormValue);
		$this->FORMULARY->CurrentValue = ConvertToUtf8($this->FORMULARY->FormValue);
		$this->STOCK->CurrentValue = ConvertToUtf8($this->STOCK->FormValue);
		$this->RACKNO->CurrentValue = ConvertToUtf8($this->RACKNO->FormValue);
		$this->SUPPNAME->CurrentValue = ConvertToUtf8($this->SUPPNAME->FormValue);
		$this->COMBNAME->CurrentValue = ConvertToUtf8($this->COMBNAME->FormValue);
		$this->GENERICNAME->CurrentValue = ConvertToUtf8($this->GENERICNAME->FormValue);
		$this->REMARK->CurrentValue = ConvertToUtf8($this->REMARK->FormValue);
		$this->TEMP->CurrentValue = ConvertToUtf8($this->TEMP->FormValue);
		$this->PACKING->CurrentValue = ConvertToUtf8($this->PACKING->FormValue);
		$this->PhysQty->CurrentValue = ConvertToUtf8($this->PhysQty->FormValue);
		$this->LedQty->CurrentValue = ConvertToUtf8($this->LedQty->FormValue);
		$this->PurValue->CurrentValue = ConvertToUtf8($this->PurValue->FormValue);
		$this->PSGST->CurrentValue = ConvertToUtf8($this->PSGST->FormValue);
		$this->PCGST->CurrentValue = ConvertToUtf8($this->PCGST->FormValue);
		$this->SaleValue->CurrentValue = ConvertToUtf8($this->SaleValue->FormValue);
		$this->SSGST->CurrentValue = ConvertToUtf8($this->SSGST->FormValue);
		$this->SCGST->CurrentValue = ConvertToUtf8($this->SCGST->FormValue);
		$this->SaleRate->CurrentValue = ConvertToUtf8($this->SaleRate->FormValue);
		$this->HospID->CurrentValue = ConvertToUtf8($this->HospID->FormValue);
		$this->BRNAME->CurrentValue = ConvertToUtf8($this->BRNAME->FormValue);
		$this->OV->CurrentValue = ConvertToUtf8($this->OV->FormValue);
		$this->LATESTOV->CurrentValue = ConvertToUtf8($this->LATESTOV->FormValue);
		$this->ITEMTYPE->CurrentValue = ConvertToUtf8($this->ITEMTYPE->FormValue);
		$this->ROWID->CurrentValue = ConvertToUtf8($this->ROWID->FormValue);
		$this->MOVED->CurrentValue = ConvertToUtf8($this->MOVED->FormValue);
		$this->NEWTAX->CurrentValue = ConvertToUtf8($this->NEWTAX->FormValue);
		$this->HSNCODE->CurrentValue = ConvertToUtf8($this->HSNCODE->FormValue);
		$this->OLDTAX->CurrentValue = ConvertToUtf8($this->OLDTAX->FormValue);
		$this->Scheduling->CurrentValue = ConvertToUtf8($this->Scheduling->FormValue);
		$this->Schedulingh1->CurrentValue = ConvertToUtf8($this->Schedulingh1->FormValue);
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
		$this->OV->setDbValue($row['OV']);
		$this->LATESTOV->setDbValue($row['LATESTOV']);
		$this->ITEMTYPE->setDbValue($row['ITEMTYPE']);
		$this->ROWID->setDbValue($row['ROWID']);
		$this->MOVED->setDbValue($row['MOVED']);
		$this->NEWTAX->setDbValue($row['NEWTAX']);
		$this->HSNCODE->setDbValue($row['HSNCODE']);
		$this->OLDTAX->setDbValue($row['OLDTAX']);
		$this->Scheduling->setDbValue($row['Scheduling']);
		$this->Schedulingh1->setDbValue($row['Schedulingh1']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['TYPE'] = $this->TYPE->CurrentValue;
		$row['DES'] = $this->DES->CurrentValue;
		$row['UM'] = $this->UM->CurrentValue;
		$row['RT'] = $this->RT->CurrentValue;
		$row['UR'] = $this->UR->CurrentValue;
		$row['TAXP'] = $this->TAXP->CurrentValue;
		$row['BATCHNO'] = $this->BATCHNO->CurrentValue;
		$row['OQ'] = $this->OQ->CurrentValue;
		$row['RQ'] = $this->RQ->CurrentValue;
		$row['MRQ'] = $this->MRQ->CurrentValue;
		$row['IQ'] = $this->IQ->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['EXPDT'] = $this->EXPDT->CurrentValue;
		$row['SALQTY'] = $this->SALQTY->CurrentValue;
		$row['LASTPURDT'] = $this->LASTPURDT->CurrentValue;
		$row['LASTSUPP'] = $this->LASTSUPP->CurrentValue;
		$row['GENNAME'] = $this->GENNAME->CurrentValue;
		$row['LASTISSDT'] = $this->LASTISSDT->CurrentValue;
		$row['CREATEDDT'] = $this->CREATEDDT->CurrentValue;
		$row['OPPRC'] = $this->OPPRC->CurrentValue;
		$row['RESTRICT'] = $this->RESTRICT->CurrentValue;
		$row['BAWAPRC'] = $this->BAWAPRC->CurrentValue;
		$row['STAXPER'] = $this->STAXPER->CurrentValue;
		$row['TAXTYPE'] = $this->TAXTYPE->CurrentValue;
		$row['OLDTAXP'] = $this->OLDTAXP->CurrentValue;
		$row['TAXUPD'] = $this->TAXUPD->CurrentValue;
		$row['PACKAGE'] = $this->PACKAGE->CurrentValue;
		$row['NEWRT'] = $this->NEWRT->CurrentValue;
		$row['NEWMRP'] = $this->NEWMRP->CurrentValue;
		$row['NEWUR'] = $this->NEWUR->CurrentValue;
		$row['STATUS'] = $this->STATUS->CurrentValue;
		$row['RETNQTY'] = $this->RETNQTY->CurrentValue;
		$row['KEMODISC'] = $this->KEMODISC->CurrentValue;
		$row['PATSALE'] = $this->PATSALE->CurrentValue;
		$row['ORGAN'] = $this->ORGAN->CurrentValue;
		$row['OLDRQ'] = $this->OLDRQ->CurrentValue;
		$row['DRID'] = $this->DRID->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['COMBCODE'] = $this->COMBCODE->CurrentValue;
		$row['GENCODE'] = $this->GENCODE->CurrentValue;
		$row['STRENGTH'] = $this->STRENGTH->CurrentValue;
		$row['UNIT'] = $this->UNIT->CurrentValue;
		$row['FORMULARY'] = $this->FORMULARY->CurrentValue;
		$row['STOCK'] = $this->STOCK->CurrentValue;
		$row['RACKNO'] = $this->RACKNO->CurrentValue;
		$row['SUPPNAME'] = $this->SUPPNAME->CurrentValue;
		$row['COMBNAME'] = $this->COMBNAME->CurrentValue;
		$row['GENERICNAME'] = $this->GENERICNAME->CurrentValue;
		$row['REMARK'] = $this->REMARK->CurrentValue;
		$row['TEMP'] = $this->TEMP->CurrentValue;
		$row['PACKING'] = $this->PACKING->CurrentValue;
		$row['PhysQty'] = $this->PhysQty->CurrentValue;
		$row['LedQty'] = $this->LedQty->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['SaleValue'] = $this->SaleValue->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['SaleRate'] = $this->SaleRate->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['BRNAME'] = $this->BRNAME->CurrentValue;
		$row['OV'] = $this->OV->CurrentValue;
		$row['LATESTOV'] = $this->LATESTOV->CurrentValue;
		$row['ITEMTYPE'] = $this->ITEMTYPE->CurrentValue;
		$row['ROWID'] = $this->ROWID->CurrentValue;
		$row['MOVED'] = $this->MOVED->CurrentValue;
		$row['NEWTAX'] = $this->NEWTAX->CurrentValue;
		$row['HSNCODE'] = $this->HSNCODE->CurrentValue;
		$row['OLDTAX'] = $this->OLDTAX->CurrentValue;
		$row['Scheduling'] = $this->Scheduling->CurrentValue;
		$row['Schedulingh1'] = $this->Schedulingh1->CurrentValue;
		return $row;
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
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue)))
			$this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);

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
		if ($this->SALQTY->FormValue == $this->SALQTY->CurrentValue && is_numeric(ConvertToFloatString($this->SALQTY->CurrentValue)))
			$this->SALQTY->CurrentValue = ConvertToFloatString($this->SALQTY->CurrentValue);

		// Convert decimal values if posted back
		if ($this->STAXPER->FormValue == $this->STAXPER->CurrentValue && is_numeric(ConvertToFloatString($this->STAXPER->CurrentValue)))
			$this->STAXPER->CurrentValue = ConvertToFloatString($this->STAXPER->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDTAXP->FormValue == $this->OLDTAXP->CurrentValue && is_numeric(ConvertToFloatString($this->OLDTAXP->CurrentValue)))
			$this->OLDTAXP->CurrentValue = ConvertToFloatString($this->OLDTAXP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWRT->FormValue == $this->NEWRT->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRT->CurrentValue)))
			$this->NEWRT->CurrentValue = ConvertToFloatString($this->NEWRT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWMRP->FormValue == $this->NEWMRP->CurrentValue && is_numeric(ConvertToFloatString($this->NEWMRP->CurrentValue)))
			$this->NEWMRP->CurrentValue = ConvertToFloatString($this->NEWMRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWUR->FormValue == $this->NEWUR->CurrentValue && is_numeric(ConvertToFloatString($this->NEWUR->CurrentValue)))
			$this->NEWUR->CurrentValue = ConvertToFloatString($this->NEWUR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RETNQTY->FormValue == $this->RETNQTY->CurrentValue && is_numeric(ConvertToFloatString($this->RETNQTY->CurrentValue)))
			$this->RETNQTY->CurrentValue = ConvertToFloatString($this->RETNQTY->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PATSALE->FormValue == $this->PATSALE->CurrentValue && is_numeric(ConvertToFloatString($this->PATSALE->CurrentValue)))
			$this->PATSALE->CurrentValue = ConvertToFloatString($this->PATSALE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRQ->FormValue == $this->OLDRQ->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRQ->CurrentValue)))
			$this->OLDRQ->CurrentValue = ConvertToFloatString($this->OLDRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue)))
			$this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);

		// Convert decimal values if posted back
		if ($this->STOCK->FormValue == $this->STOCK->CurrentValue && is_numeric(ConvertToFloatString($this->STOCK->CurrentValue)))
			$this->STOCK->CurrentValue = ConvertToFloatString($this->STOCK->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PACKING->FormValue == $this->PACKING->CurrentValue && is_numeric(ConvertToFloatString($this->PACKING->CurrentValue)))
			$this->PACKING->CurrentValue = ConvertToFloatString($this->PACKING->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PhysQty->FormValue == $this->PhysQty->CurrentValue && is_numeric(ConvertToFloatString($this->PhysQty->CurrentValue)))
			$this->PhysQty->CurrentValue = ConvertToFloatString($this->PhysQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LedQty->FormValue == $this->LedQty->CurrentValue && is_numeric(ConvertToFloatString($this->LedQty->CurrentValue)))
			$this->LedQty->CurrentValue = ConvertToFloatString($this->LedQty->CurrentValue);

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

		// Convert decimal values if posted back
		if ($this->OV->FormValue == $this->OV->CurrentValue && is_numeric(ConvertToFloatString($this->OV->CurrentValue)))
			$this->OV->CurrentValue = ConvertToFloatString($this->OV->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LATESTOV->FormValue == $this->LATESTOV->CurrentValue && is_numeric(ConvertToFloatString($this->LATESTOV->CurrentValue)))
			$this->LATESTOV->CurrentValue = ConvertToFloatString($this->LATESTOV->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWTAX->FormValue == $this->NEWTAX->CurrentValue && is_numeric(ConvertToFloatString($this->NEWTAX->CurrentValue)))
			$this->NEWTAX->CurrentValue = ConvertToFloatString($this->NEWTAX->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDTAX->FormValue == $this->OLDTAX->CurrentValue && is_numeric(ConvertToFloatString($this->OLDTAX->CurrentValue)))
			$this->OLDTAX->CurrentValue = ConvertToFloatString($this->OLDTAX->CurrentValue);

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
		// OV
		// LATESTOV
		// ITEMTYPE
		// ROWID
		// MOVED
		// NEWTAX
		// HSNCODE
		// OLDTAX
		// Scheduling
		// Schedulingh1

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

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

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

			// SALQTY
			$this->SALQTY->ViewValue = $this->SALQTY->CurrentValue;
			$this->SALQTY->ViewValue = FormatNumber($this->SALQTY->ViewValue, 2, -2, -2, -2);
			$this->SALQTY->ViewCustomAttributes = "";

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

			// OPPRC
			$this->OPPRC->ViewValue = $this->OPPRC->CurrentValue;
			$this->OPPRC->ViewCustomAttributes = "";

			// RESTRICT
			$this->RESTRICT->ViewValue = $this->RESTRICT->CurrentValue;
			$this->RESTRICT->ViewCustomAttributes = "";

			// BAWAPRC
			$this->BAWAPRC->ViewValue = $this->BAWAPRC->CurrentValue;
			$this->BAWAPRC->ViewCustomAttributes = "";

			// STAXPER
			$this->STAXPER->ViewValue = $this->STAXPER->CurrentValue;
			$this->STAXPER->ViewValue = FormatNumber($this->STAXPER->ViewValue, 2, -2, -2, -2);
			$this->STAXPER->ViewCustomAttributes = "";

			// TAXTYPE
			$this->TAXTYPE->ViewValue = $this->TAXTYPE->CurrentValue;
			$this->TAXTYPE->ViewCustomAttributes = "";

			// OLDTAXP
			$this->OLDTAXP->ViewValue = $this->OLDTAXP->CurrentValue;
			$this->OLDTAXP->ViewValue = FormatNumber($this->OLDTAXP->ViewValue, 2, -2, -2, -2);
			$this->OLDTAXP->ViewCustomAttributes = "";

			// TAXUPD
			$this->TAXUPD->ViewValue = $this->TAXUPD->CurrentValue;
			$this->TAXUPD->ViewCustomAttributes = "";

			// PACKAGE
			$this->PACKAGE->ViewValue = $this->PACKAGE->CurrentValue;
			$this->PACKAGE->ViewCustomAttributes = "";

			// NEWRT
			$this->NEWRT->ViewValue = $this->NEWRT->CurrentValue;
			$this->NEWRT->ViewValue = FormatNumber($this->NEWRT->ViewValue, 2, -2, -2, -2);
			$this->NEWRT->ViewCustomAttributes = "";

			// NEWMRP
			$this->NEWMRP->ViewValue = $this->NEWMRP->CurrentValue;
			$this->NEWMRP->ViewValue = FormatNumber($this->NEWMRP->ViewValue, 2, -2, -2, -2);
			$this->NEWMRP->ViewCustomAttributes = "";

			// NEWUR
			$this->NEWUR->ViewValue = $this->NEWUR->CurrentValue;
			$this->NEWUR->ViewValue = FormatNumber($this->NEWUR->ViewValue, 2, -2, -2, -2);
			$this->NEWUR->ViewCustomAttributes = "";

			// STATUS
			$this->STATUS->ViewValue = $this->STATUS->CurrentValue;
			$this->STATUS->ViewCustomAttributes = "";

			// RETNQTY
			$this->RETNQTY->ViewValue = $this->RETNQTY->CurrentValue;
			$this->RETNQTY->ViewValue = FormatNumber($this->RETNQTY->ViewValue, 2, -2, -2, -2);
			$this->RETNQTY->ViewCustomAttributes = "";

			// KEMODISC
			$this->KEMODISC->ViewValue = $this->KEMODISC->CurrentValue;
			$this->KEMODISC->ViewCustomAttributes = "";

			// PATSALE
			$this->PATSALE->ViewValue = $this->PATSALE->CurrentValue;
			$this->PATSALE->ViewValue = FormatNumber($this->PATSALE->ViewValue, 2, -2, -2, -2);
			$this->PATSALE->ViewCustomAttributes = "";

			// ORGAN
			$this->ORGAN->ViewValue = $this->ORGAN->CurrentValue;
			$this->ORGAN->ViewCustomAttributes = "";

			// OLDRQ
			$this->OLDRQ->ViewValue = $this->OLDRQ->CurrentValue;
			$this->OLDRQ->ViewValue = FormatNumber($this->OLDRQ->ViewValue, 2, -2, -2, -2);
			$this->OLDRQ->ViewCustomAttributes = "";

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

			// STOCK
			$this->STOCK->ViewValue = $this->STOCK->CurrentValue;
			$this->STOCK->ViewValue = FormatNumber($this->STOCK->ViewValue, 2, -2, -2, -2);
			$this->STOCK->ViewCustomAttributes = "";

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

			// PACKING
			$this->PACKING->ViewValue = $this->PACKING->CurrentValue;
			$this->PACKING->ViewValue = FormatNumber($this->PACKING->ViewValue, 2, -2, -2, -2);
			$this->PACKING->ViewCustomAttributes = "";

			// PhysQty
			$this->PhysQty->ViewValue = $this->PhysQty->CurrentValue;
			$this->PhysQty->ViewValue = FormatNumber($this->PhysQty->ViewValue, 2, -2, -2, -2);
			$this->PhysQty->ViewCustomAttributes = "";

			// LedQty
			$this->LedQty->ViewValue = $this->LedQty->CurrentValue;
			$this->LedQty->ViewValue = FormatNumber($this->LedQty->ViewValue, 2, -2, -2, -2);
			$this->LedQty->ViewCustomAttributes = "";

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

			// OV
			$this->OV->ViewValue = $this->OV->CurrentValue;
			$this->OV->ViewValue = FormatNumber($this->OV->ViewValue, 2, -2, -2, -2);
			$this->OV->ViewCustomAttributes = "";

			// LATESTOV
			$this->LATESTOV->ViewValue = $this->LATESTOV->CurrentValue;
			$this->LATESTOV->ViewValue = FormatNumber($this->LATESTOV->ViewValue, 2, -2, -2, -2);
			$this->LATESTOV->ViewCustomAttributes = "";

			// ITEMTYPE
			$this->ITEMTYPE->ViewValue = $this->ITEMTYPE->CurrentValue;
			$this->ITEMTYPE->ViewCustomAttributes = "";

			// ROWID
			$this->ROWID->ViewValue = $this->ROWID->CurrentValue;
			$this->ROWID->ViewCustomAttributes = "";

			// MOVED
			$this->MOVED->ViewValue = $this->MOVED->CurrentValue;
			$this->MOVED->ViewValue = FormatNumber($this->MOVED->ViewValue, 0, -2, -2, -2);
			$this->MOVED->ViewCustomAttributes = "";

			// NEWTAX
			$this->NEWTAX->ViewValue = $this->NEWTAX->CurrentValue;
			$this->NEWTAX->ViewValue = FormatNumber($this->NEWTAX->ViewValue, 2, -2, -2, -2);
			$this->NEWTAX->ViewCustomAttributes = "";

			// HSNCODE
			$this->HSNCODE->ViewValue = $this->HSNCODE->CurrentValue;
			$this->HSNCODE->ViewCustomAttributes = "";

			// OLDTAX
			$this->OLDTAX->ViewValue = $this->OLDTAX->CurrentValue;
			$this->OLDTAX->ViewValue = FormatNumber($this->OLDTAX->ViewValue, 2, -2, -2, -2);
			$this->OLDTAX->ViewCustomAttributes = "";

			// Scheduling
			if (strval($this->Scheduling->CurrentValue) <> "") {
				$this->Scheduling->ViewValue = $this->Scheduling->optionCaption($this->Scheduling->CurrentValue);
			} else {
				$this->Scheduling->ViewValue = NULL;
			}
			$this->Scheduling->ViewCustomAttributes = "";

			// Schedulingh1
			if (strval($this->Schedulingh1->CurrentValue) <> "") {
				$this->Schedulingh1->ViewValue = $this->Schedulingh1->optionCaption($this->Schedulingh1->CurrentValue);
			} else {
				$this->Schedulingh1->ViewValue = NULL;
			}
			$this->Schedulingh1->ViewCustomAttributes = "";

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

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";
			$this->TAXP->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

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

			// SALQTY
			$this->SALQTY->LinkCustomAttributes = "";
			$this->SALQTY->HrefValue = "";
			$this->SALQTY->TooltipValue = "";

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

			// OPPRC
			$this->OPPRC->LinkCustomAttributes = "";
			$this->OPPRC->HrefValue = "";
			$this->OPPRC->TooltipValue = "";

			// RESTRICT
			$this->RESTRICT->LinkCustomAttributes = "";
			$this->RESTRICT->HrefValue = "";
			$this->RESTRICT->TooltipValue = "";

			// BAWAPRC
			$this->BAWAPRC->LinkCustomAttributes = "";
			$this->BAWAPRC->HrefValue = "";
			$this->BAWAPRC->TooltipValue = "";

			// STAXPER
			$this->STAXPER->LinkCustomAttributes = "";
			$this->STAXPER->HrefValue = "";
			$this->STAXPER->TooltipValue = "";

			// TAXTYPE
			$this->TAXTYPE->LinkCustomAttributes = "";
			$this->TAXTYPE->HrefValue = "";
			$this->TAXTYPE->TooltipValue = "";

			// OLDTAXP
			$this->OLDTAXP->LinkCustomAttributes = "";
			$this->OLDTAXP->HrefValue = "";
			$this->OLDTAXP->TooltipValue = "";

			// TAXUPD
			$this->TAXUPD->LinkCustomAttributes = "";
			$this->TAXUPD->HrefValue = "";
			$this->TAXUPD->TooltipValue = "";

			// PACKAGE
			$this->PACKAGE->LinkCustomAttributes = "";
			$this->PACKAGE->HrefValue = "";
			$this->PACKAGE->TooltipValue = "";

			// NEWRT
			$this->NEWRT->LinkCustomAttributes = "";
			$this->NEWRT->HrefValue = "";
			$this->NEWRT->TooltipValue = "";

			// NEWMRP
			$this->NEWMRP->LinkCustomAttributes = "";
			$this->NEWMRP->HrefValue = "";
			$this->NEWMRP->TooltipValue = "";

			// NEWUR
			$this->NEWUR->LinkCustomAttributes = "";
			$this->NEWUR->HrefValue = "";
			$this->NEWUR->TooltipValue = "";

			// STATUS
			$this->STATUS->LinkCustomAttributes = "";
			$this->STATUS->HrefValue = "";
			$this->STATUS->TooltipValue = "";

			// RETNQTY
			$this->RETNQTY->LinkCustomAttributes = "";
			$this->RETNQTY->HrefValue = "";
			$this->RETNQTY->TooltipValue = "";

			// KEMODISC
			$this->KEMODISC->LinkCustomAttributes = "";
			$this->KEMODISC->HrefValue = "";
			$this->KEMODISC->TooltipValue = "";

			// PATSALE
			$this->PATSALE->LinkCustomAttributes = "";
			$this->PATSALE->HrefValue = "";
			$this->PATSALE->TooltipValue = "";

			// ORGAN
			$this->ORGAN->LinkCustomAttributes = "";
			$this->ORGAN->HrefValue = "";
			$this->ORGAN->TooltipValue = "";

			// OLDRQ
			$this->OLDRQ->LinkCustomAttributes = "";
			$this->OLDRQ->HrefValue = "";
			$this->OLDRQ->TooltipValue = "";

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

			// STOCK
			$this->STOCK->LinkCustomAttributes = "";
			$this->STOCK->HrefValue = "";
			$this->STOCK->TooltipValue = "";

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

			// PACKING
			$this->PACKING->LinkCustomAttributes = "";
			$this->PACKING->HrefValue = "";
			$this->PACKING->TooltipValue = "";

			// PhysQty
			$this->PhysQty->LinkCustomAttributes = "";
			$this->PhysQty->HrefValue = "";
			$this->PhysQty->TooltipValue = "";

			// LedQty
			$this->LedQty->LinkCustomAttributes = "";
			$this->LedQty->HrefValue = "";
			$this->LedQty->TooltipValue = "";

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

			// OV
			$this->OV->LinkCustomAttributes = "";
			$this->OV->HrefValue = "";
			$this->OV->TooltipValue = "";

			// LATESTOV
			$this->LATESTOV->LinkCustomAttributes = "";
			$this->LATESTOV->HrefValue = "";
			$this->LATESTOV->TooltipValue = "";

			// ITEMTYPE
			$this->ITEMTYPE->LinkCustomAttributes = "";
			$this->ITEMTYPE->HrefValue = "";
			$this->ITEMTYPE->TooltipValue = "";

			// ROWID
			$this->ROWID->LinkCustomAttributes = "";
			$this->ROWID->HrefValue = "";
			$this->ROWID->TooltipValue = "";

			// MOVED
			$this->MOVED->LinkCustomAttributes = "";
			$this->MOVED->HrefValue = "";
			$this->MOVED->TooltipValue = "";

			// NEWTAX
			$this->NEWTAX->LinkCustomAttributes = "";
			$this->NEWTAX->HrefValue = "";
			$this->NEWTAX->TooltipValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";
			$this->HSNCODE->TooltipValue = "";

			// OLDTAX
			$this->OLDTAX->LinkCustomAttributes = "";
			$this->OLDTAX->HrefValue = "";
			$this->OLDTAX->TooltipValue = "";

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";
			$this->Scheduling->TooltipValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
			$this->Schedulingh1->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->CurrentValue = PharmacyID();

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

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue))
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);

			// TAXP
			$this->TAXP->EditAttrs["class"] = "form-control";
			$this->TAXP->EditCustomAttributes = "";
			$this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
			$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
			if (strval($this->TAXP->EditValue) <> "" && is_numeric($this->TAXP->EditValue))
				$this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

			// SALQTY
			$this->SALQTY->EditAttrs["class"] = "form-control";
			$this->SALQTY->EditCustomAttributes = "";
			$this->SALQTY->EditValue = HtmlEncode($this->SALQTY->CurrentValue);
			$this->SALQTY->PlaceHolder = RemoveHtml($this->SALQTY->caption());
			if (strval($this->SALQTY->EditValue) <> "" && is_numeric($this->SALQTY->EditValue))
				$this->SALQTY->EditValue = FormatNumber($this->SALQTY->EditValue, -2, -2, -2, -2);

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
			$this->CREATEDDT->EditAttrs["class"] = "form-control";
			$this->CREATEDDT->EditCustomAttributes = "";
			$this->CREATEDDT->CurrentValue = FormatDateTime(CurrentDateTime(), 8);

			// OPPRC
			$this->OPPRC->EditAttrs["class"] = "form-control";
			$this->OPPRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OPPRC->CurrentValue = HtmlDecode($this->OPPRC->CurrentValue);
			$this->OPPRC->EditValue = HtmlEncode($this->OPPRC->CurrentValue);
			$this->OPPRC->PlaceHolder = RemoveHtml($this->OPPRC->caption());

			// RESTRICT
			$this->RESTRICT->EditAttrs["class"] = "form-control";
			$this->RESTRICT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RESTRICT->CurrentValue = HtmlDecode($this->RESTRICT->CurrentValue);
			$this->RESTRICT->EditValue = HtmlEncode($this->RESTRICT->CurrentValue);
			$this->RESTRICT->PlaceHolder = RemoveHtml($this->RESTRICT->caption());

			// BAWAPRC
			$this->BAWAPRC->EditAttrs["class"] = "form-control";
			$this->BAWAPRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BAWAPRC->CurrentValue = HtmlDecode($this->BAWAPRC->CurrentValue);
			$this->BAWAPRC->EditValue = HtmlEncode($this->BAWAPRC->CurrentValue);
			$this->BAWAPRC->PlaceHolder = RemoveHtml($this->BAWAPRC->caption());

			// STAXPER
			$this->STAXPER->EditAttrs["class"] = "form-control";
			$this->STAXPER->EditCustomAttributes = "";
			$this->STAXPER->EditValue = HtmlEncode($this->STAXPER->CurrentValue);
			$this->STAXPER->PlaceHolder = RemoveHtml($this->STAXPER->caption());
			if (strval($this->STAXPER->EditValue) <> "" && is_numeric($this->STAXPER->EditValue))
				$this->STAXPER->EditValue = FormatNumber($this->STAXPER->EditValue, -2, -2, -2, -2);

			// TAXTYPE
			$this->TAXTYPE->EditAttrs["class"] = "form-control";
			$this->TAXTYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TAXTYPE->CurrentValue = HtmlDecode($this->TAXTYPE->CurrentValue);
			$this->TAXTYPE->EditValue = HtmlEncode($this->TAXTYPE->CurrentValue);
			$this->TAXTYPE->PlaceHolder = RemoveHtml($this->TAXTYPE->caption());

			// OLDTAXP
			$this->OLDTAXP->EditAttrs["class"] = "form-control";
			$this->OLDTAXP->EditCustomAttributes = "";
			$this->OLDTAXP->EditValue = HtmlEncode($this->OLDTAXP->CurrentValue);
			$this->OLDTAXP->PlaceHolder = RemoveHtml($this->OLDTAXP->caption());
			if (strval($this->OLDTAXP->EditValue) <> "" && is_numeric($this->OLDTAXP->EditValue))
				$this->OLDTAXP->EditValue = FormatNumber($this->OLDTAXP->EditValue, -2, -2, -2, -2);

			// TAXUPD
			$this->TAXUPD->EditAttrs["class"] = "form-control";
			$this->TAXUPD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TAXUPD->CurrentValue = HtmlDecode($this->TAXUPD->CurrentValue);
			$this->TAXUPD->EditValue = HtmlEncode($this->TAXUPD->CurrentValue);
			$this->TAXUPD->PlaceHolder = RemoveHtml($this->TAXUPD->caption());

			// PACKAGE
			$this->PACKAGE->EditAttrs["class"] = "form-control";
			$this->PACKAGE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PACKAGE->CurrentValue = HtmlDecode($this->PACKAGE->CurrentValue);
			$this->PACKAGE->EditValue = HtmlEncode($this->PACKAGE->CurrentValue);
			$this->PACKAGE->PlaceHolder = RemoveHtml($this->PACKAGE->caption());

			// NEWRT
			$this->NEWRT->EditAttrs["class"] = "form-control";
			$this->NEWRT->EditCustomAttributes = "";
			$this->NEWRT->EditValue = HtmlEncode($this->NEWRT->CurrentValue);
			$this->NEWRT->PlaceHolder = RemoveHtml($this->NEWRT->caption());
			if (strval($this->NEWRT->EditValue) <> "" && is_numeric($this->NEWRT->EditValue))
				$this->NEWRT->EditValue = FormatNumber($this->NEWRT->EditValue, -2, -2, -2, -2);

			// NEWMRP
			$this->NEWMRP->EditAttrs["class"] = "form-control";
			$this->NEWMRP->EditCustomAttributes = "";
			$this->NEWMRP->EditValue = HtmlEncode($this->NEWMRP->CurrentValue);
			$this->NEWMRP->PlaceHolder = RemoveHtml($this->NEWMRP->caption());
			if (strval($this->NEWMRP->EditValue) <> "" && is_numeric($this->NEWMRP->EditValue))
				$this->NEWMRP->EditValue = FormatNumber($this->NEWMRP->EditValue, -2, -2, -2, -2);

			// NEWUR
			$this->NEWUR->EditAttrs["class"] = "form-control";
			$this->NEWUR->EditCustomAttributes = "";
			$this->NEWUR->EditValue = HtmlEncode($this->NEWUR->CurrentValue);
			$this->NEWUR->PlaceHolder = RemoveHtml($this->NEWUR->caption());
			if (strval($this->NEWUR->EditValue) <> "" && is_numeric($this->NEWUR->EditValue))
				$this->NEWUR->EditValue = FormatNumber($this->NEWUR->EditValue, -2, -2, -2, -2);

			// STATUS
			$this->STATUS->EditAttrs["class"] = "form-control";
			$this->STATUS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->STATUS->CurrentValue = HtmlDecode($this->STATUS->CurrentValue);
			$this->STATUS->EditValue = HtmlEncode($this->STATUS->CurrentValue);
			$this->STATUS->PlaceHolder = RemoveHtml($this->STATUS->caption());

			// RETNQTY
			$this->RETNQTY->EditAttrs["class"] = "form-control";
			$this->RETNQTY->EditCustomAttributes = "";
			$this->RETNQTY->EditValue = HtmlEncode($this->RETNQTY->CurrentValue);
			$this->RETNQTY->PlaceHolder = RemoveHtml($this->RETNQTY->caption());
			if (strval($this->RETNQTY->EditValue) <> "" && is_numeric($this->RETNQTY->EditValue))
				$this->RETNQTY->EditValue = FormatNumber($this->RETNQTY->EditValue, -2, -2, -2, -2);

			// KEMODISC
			$this->KEMODISC->EditAttrs["class"] = "form-control";
			$this->KEMODISC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->KEMODISC->CurrentValue = HtmlDecode($this->KEMODISC->CurrentValue);
			$this->KEMODISC->EditValue = HtmlEncode($this->KEMODISC->CurrentValue);
			$this->KEMODISC->PlaceHolder = RemoveHtml($this->KEMODISC->caption());

			// PATSALE
			$this->PATSALE->EditAttrs["class"] = "form-control";
			$this->PATSALE->EditCustomAttributes = "";
			$this->PATSALE->EditValue = HtmlEncode($this->PATSALE->CurrentValue);
			$this->PATSALE->PlaceHolder = RemoveHtml($this->PATSALE->caption());
			if (strval($this->PATSALE->EditValue) <> "" && is_numeric($this->PATSALE->EditValue))
				$this->PATSALE->EditValue = FormatNumber($this->PATSALE->EditValue, -2, -2, -2, -2);

			// ORGAN
			$this->ORGAN->EditAttrs["class"] = "form-control";
			$this->ORGAN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ORGAN->CurrentValue = HtmlDecode($this->ORGAN->CurrentValue);
			$this->ORGAN->EditValue = HtmlEncode($this->ORGAN->CurrentValue);
			$this->ORGAN->PlaceHolder = RemoveHtml($this->ORGAN->caption());

			// OLDRQ
			$this->OLDRQ->EditAttrs["class"] = "form-control";
			$this->OLDRQ->EditCustomAttributes = "";
			$this->OLDRQ->EditValue = HtmlEncode($this->OLDRQ->CurrentValue);
			$this->OLDRQ->PlaceHolder = RemoveHtml($this->OLDRQ->caption());
			if (strval($this->OLDRQ->EditValue) <> "" && is_numeric($this->OLDRQ->EditValue))
				$this->OLDRQ->EditValue = FormatNumber($this->OLDRQ->EditValue, -2, -2, -2, -2);

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

			// STOCK
			$this->STOCK->EditAttrs["class"] = "form-control";
			$this->STOCK->EditCustomAttributes = "";
			$this->STOCK->EditValue = HtmlEncode($this->STOCK->CurrentValue);
			$this->STOCK->PlaceHolder = RemoveHtml($this->STOCK->caption());
			if (strval($this->STOCK->EditValue) <> "" && is_numeric($this->STOCK->EditValue))
				$this->STOCK->EditValue = FormatNumber($this->STOCK->EditValue, -2, -2, -2, -2);

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

			// PACKING
			$this->PACKING->EditAttrs["class"] = "form-control";
			$this->PACKING->EditCustomAttributes = "";
			$this->PACKING->EditValue = HtmlEncode($this->PACKING->CurrentValue);
			$this->PACKING->PlaceHolder = RemoveHtml($this->PACKING->caption());
			if (strval($this->PACKING->EditValue) <> "" && is_numeric($this->PACKING->EditValue))
				$this->PACKING->EditValue = FormatNumber($this->PACKING->EditValue, -2, -2, -2, -2);

			// PhysQty
			$this->PhysQty->EditAttrs["class"] = "form-control";
			$this->PhysQty->EditCustomAttributes = "";
			$this->PhysQty->EditValue = HtmlEncode($this->PhysQty->CurrentValue);
			$this->PhysQty->PlaceHolder = RemoveHtml($this->PhysQty->caption());
			if (strval($this->PhysQty->EditValue) <> "" && is_numeric($this->PhysQty->EditValue))
				$this->PhysQty->EditValue = FormatNumber($this->PhysQty->EditValue, -2, -2, -2, -2);

			// LedQty
			$this->LedQty->EditAttrs["class"] = "form-control";
			$this->LedQty->EditCustomAttributes = "";
			$this->LedQty->EditValue = HtmlEncode($this->LedQty->CurrentValue);
			$this->LedQty->PlaceHolder = RemoveHtml($this->LedQty->caption());
			if (strval($this->LedQty->EditValue) <> "" && is_numeric($this->LedQty->EditValue))
				$this->LedQty->EditValue = FormatNumber($this->LedQty->EditValue, -2, -2, -2, -2);

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
			$this->HospID->CurrentValue = HospitalID();

			// BRNAME
			$this->BRNAME->EditAttrs["class"] = "form-control";
			$this->BRNAME->EditCustomAttributes = "";
			$this->BRNAME->CurrentValue = PharmacyID();

			// OV
			$this->OV->EditAttrs["class"] = "form-control";
			$this->OV->EditCustomAttributes = "";
			$this->OV->EditValue = HtmlEncode($this->OV->CurrentValue);
			$this->OV->PlaceHolder = RemoveHtml($this->OV->caption());
			if (strval($this->OV->EditValue) <> "" && is_numeric($this->OV->EditValue))
				$this->OV->EditValue = FormatNumber($this->OV->EditValue, -2, -2, -2, -2);

			// LATESTOV
			$this->LATESTOV->EditAttrs["class"] = "form-control";
			$this->LATESTOV->EditCustomAttributes = "";
			$this->LATESTOV->EditValue = HtmlEncode($this->LATESTOV->CurrentValue);
			$this->LATESTOV->PlaceHolder = RemoveHtml($this->LATESTOV->caption());
			if (strval($this->LATESTOV->EditValue) <> "" && is_numeric($this->LATESTOV->EditValue))
				$this->LATESTOV->EditValue = FormatNumber($this->LATESTOV->EditValue, -2, -2, -2, -2);

			// ITEMTYPE
			$this->ITEMTYPE->EditAttrs["class"] = "form-control";
			$this->ITEMTYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ITEMTYPE->CurrentValue = HtmlDecode($this->ITEMTYPE->CurrentValue);
			$this->ITEMTYPE->EditValue = HtmlEncode($this->ITEMTYPE->CurrentValue);
			$this->ITEMTYPE->PlaceHolder = RemoveHtml($this->ITEMTYPE->caption());

			// ROWID
			$this->ROWID->EditAttrs["class"] = "form-control";
			$this->ROWID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ROWID->CurrentValue = HtmlDecode($this->ROWID->CurrentValue);
			$this->ROWID->EditValue = HtmlEncode($this->ROWID->CurrentValue);
			$this->ROWID->PlaceHolder = RemoveHtml($this->ROWID->caption());

			// MOVED
			$this->MOVED->EditAttrs["class"] = "form-control";
			$this->MOVED->EditCustomAttributes = "";
			$this->MOVED->EditValue = HtmlEncode($this->MOVED->CurrentValue);
			$this->MOVED->PlaceHolder = RemoveHtml($this->MOVED->caption());

			// NEWTAX
			$this->NEWTAX->EditAttrs["class"] = "form-control";
			$this->NEWTAX->EditCustomAttributes = "";
			$this->NEWTAX->EditValue = HtmlEncode($this->NEWTAX->CurrentValue);
			$this->NEWTAX->PlaceHolder = RemoveHtml($this->NEWTAX->caption());
			if (strval($this->NEWTAX->EditValue) <> "" && is_numeric($this->NEWTAX->EditValue))
				$this->NEWTAX->EditValue = FormatNumber($this->NEWTAX->EditValue, -2, -2, -2, -2);

			// HSNCODE
			$this->HSNCODE->EditAttrs["class"] = "form-control";
			$this->HSNCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

			// OLDTAX
			$this->OLDTAX->EditAttrs["class"] = "form-control";
			$this->OLDTAX->EditCustomAttributes = "";
			$this->OLDTAX->EditValue = HtmlEncode($this->OLDTAX->CurrentValue);
			$this->OLDTAX->PlaceHolder = RemoveHtml($this->OLDTAX->caption());
			if (strval($this->OLDTAX->EditValue) <> "" && is_numeric($this->OLDTAX->EditValue))
				$this->OLDTAX->EditValue = FormatNumber($this->OLDTAX->EditValue, -2, -2, -2, -2);

			// Scheduling
			$this->Scheduling->EditCustomAttributes = "";
			$this->Scheduling->EditValue = $this->Scheduling->options(FALSE);

			// Schedulingh1
			$this->Schedulingh1->EditCustomAttributes = "";
			$this->Schedulingh1->EditValue = $this->Schedulingh1->options(FALSE);

			// Add refer script
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

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

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

			// SALQTY
			$this->SALQTY->LinkCustomAttributes = "";
			$this->SALQTY->HrefValue = "";

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

			// OPPRC
			$this->OPPRC->LinkCustomAttributes = "";
			$this->OPPRC->HrefValue = "";

			// RESTRICT
			$this->RESTRICT->LinkCustomAttributes = "";
			$this->RESTRICT->HrefValue = "";

			// BAWAPRC
			$this->BAWAPRC->LinkCustomAttributes = "";
			$this->BAWAPRC->HrefValue = "";

			// STAXPER
			$this->STAXPER->LinkCustomAttributes = "";
			$this->STAXPER->HrefValue = "";

			// TAXTYPE
			$this->TAXTYPE->LinkCustomAttributes = "";
			$this->TAXTYPE->HrefValue = "";

			// OLDTAXP
			$this->OLDTAXP->LinkCustomAttributes = "";
			$this->OLDTAXP->HrefValue = "";

			// TAXUPD
			$this->TAXUPD->LinkCustomAttributes = "";
			$this->TAXUPD->HrefValue = "";

			// PACKAGE
			$this->PACKAGE->LinkCustomAttributes = "";
			$this->PACKAGE->HrefValue = "";

			// NEWRT
			$this->NEWRT->LinkCustomAttributes = "";
			$this->NEWRT->HrefValue = "";

			// NEWMRP
			$this->NEWMRP->LinkCustomAttributes = "";
			$this->NEWMRP->HrefValue = "";

			// NEWUR
			$this->NEWUR->LinkCustomAttributes = "";
			$this->NEWUR->HrefValue = "";

			// STATUS
			$this->STATUS->LinkCustomAttributes = "";
			$this->STATUS->HrefValue = "";

			// RETNQTY
			$this->RETNQTY->LinkCustomAttributes = "";
			$this->RETNQTY->HrefValue = "";

			// KEMODISC
			$this->KEMODISC->LinkCustomAttributes = "";
			$this->KEMODISC->HrefValue = "";

			// PATSALE
			$this->PATSALE->LinkCustomAttributes = "";
			$this->PATSALE->HrefValue = "";

			// ORGAN
			$this->ORGAN->LinkCustomAttributes = "";
			$this->ORGAN->HrefValue = "";

			// OLDRQ
			$this->OLDRQ->LinkCustomAttributes = "";
			$this->OLDRQ->HrefValue = "";

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

			// STOCK
			$this->STOCK->LinkCustomAttributes = "";
			$this->STOCK->HrefValue = "";

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

			// PACKING
			$this->PACKING->LinkCustomAttributes = "";
			$this->PACKING->HrefValue = "";

			// PhysQty
			$this->PhysQty->LinkCustomAttributes = "";
			$this->PhysQty->HrefValue = "";

			// LedQty
			$this->LedQty->LinkCustomAttributes = "";
			$this->LedQty->HrefValue = "";

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

			// OV
			$this->OV->LinkCustomAttributes = "";
			$this->OV->HrefValue = "";

			// LATESTOV
			$this->LATESTOV->LinkCustomAttributes = "";
			$this->LATESTOV->HrefValue = "";

			// ITEMTYPE
			$this->ITEMTYPE->LinkCustomAttributes = "";
			$this->ITEMTYPE->HrefValue = "";

			// ROWID
			$this->ROWID->LinkCustomAttributes = "";
			$this->ROWID->HrefValue = "";

			// MOVED
			$this->MOVED->LinkCustomAttributes = "";
			$this->MOVED->HrefValue = "";

			// NEWTAX
			$this->NEWTAX->LinkCustomAttributes = "";
			$this->NEWTAX->HrefValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";

			// OLDTAX
			$this->OLDTAX->LinkCustomAttributes = "";
			$this->OLDTAX->HrefValue = "";

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
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
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TAXP->FormValue)) {
			AddMessage($FormError, $this->TAXP->errorMessage());
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
		if ($this->SALQTY->Required) {
			if (!$this->SALQTY->IsDetailKey && $this->SALQTY->FormValue != NULL && $this->SALQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SALQTY->caption(), $this->SALQTY->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SALQTY->FormValue)) {
			AddMessage($FormError, $this->SALQTY->errorMessage());
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
		if (!CheckNumber($this->STAXPER->FormValue)) {
			AddMessage($FormError, $this->STAXPER->errorMessage());
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
		if (!CheckNumber($this->OLDTAXP->FormValue)) {
			AddMessage($FormError, $this->OLDTAXP->errorMessage());
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
		if (!CheckNumber($this->NEWRT->FormValue)) {
			AddMessage($FormError, $this->NEWRT->errorMessage());
		}
		if ($this->NEWMRP->Required) {
			if (!$this->NEWMRP->IsDetailKey && $this->NEWMRP->FormValue != NULL && $this->NEWMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWMRP->caption(), $this->NEWMRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NEWMRP->FormValue)) {
			AddMessage($FormError, $this->NEWMRP->errorMessage());
		}
		if ($this->NEWUR->Required) {
			if (!$this->NEWUR->IsDetailKey && $this->NEWUR->FormValue != NULL && $this->NEWUR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWUR->caption(), $this->NEWUR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NEWUR->FormValue)) {
			AddMessage($FormError, $this->NEWUR->errorMessage());
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
		if (!CheckNumber($this->RETNQTY->FormValue)) {
			AddMessage($FormError, $this->RETNQTY->errorMessage());
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
		if (!CheckNumber($this->PATSALE->FormValue)) {
			AddMessage($FormError, $this->PATSALE->errorMessage());
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
		if (!CheckNumber($this->OLDRQ->FormValue)) {
			AddMessage($FormError, $this->OLDRQ->errorMessage());
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
		if (!CheckNumber($this->STOCK->FormValue)) {
			AddMessage($FormError, $this->STOCK->errorMessage());
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
		if (!CheckNumber($this->PACKING->FormValue)) {
			AddMessage($FormError, $this->PACKING->errorMessage());
		}
		if ($this->PhysQty->Required) {
			if (!$this->PhysQty->IsDetailKey && $this->PhysQty->FormValue != NULL && $this->PhysQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PhysQty->caption(), $this->PhysQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PhysQty->FormValue)) {
			AddMessage($FormError, $this->PhysQty->errorMessage());
		}
		if ($this->LedQty->Required) {
			if (!$this->LedQty->IsDetailKey && $this->LedQty->FormValue != NULL && $this->LedQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LedQty->caption(), $this->LedQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LedQty->FormValue)) {
			AddMessage($FormError, $this->LedQty->errorMessage());
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
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
			}
		}
		if ($this->OV->Required) {
			if (!$this->OV->IsDetailKey && $this->OV->FormValue != NULL && $this->OV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OV->caption(), $this->OV->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OV->FormValue)) {
			AddMessage($FormError, $this->OV->errorMessage());
		}
		if ($this->LATESTOV->Required) {
			if (!$this->LATESTOV->IsDetailKey && $this->LATESTOV->FormValue != NULL && $this->LATESTOV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LATESTOV->caption(), $this->LATESTOV->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LATESTOV->FormValue)) {
			AddMessage($FormError, $this->LATESTOV->errorMessage());
		}
		if ($this->ITEMTYPE->Required) {
			if (!$this->ITEMTYPE->IsDetailKey && $this->ITEMTYPE->FormValue != NULL && $this->ITEMTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ITEMTYPE->caption(), $this->ITEMTYPE->RequiredErrorMessage));
			}
		}
		if ($this->ROWID->Required) {
			if (!$this->ROWID->IsDetailKey && $this->ROWID->FormValue != NULL && $this->ROWID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ROWID->caption(), $this->ROWID->RequiredErrorMessage));
			}
		}
		if ($this->MOVED->Required) {
			if (!$this->MOVED->IsDetailKey && $this->MOVED->FormValue != NULL && $this->MOVED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MOVED->caption(), $this->MOVED->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->MOVED->FormValue)) {
			AddMessage($FormError, $this->MOVED->errorMessage());
		}
		if ($this->NEWTAX->Required) {
			if (!$this->NEWTAX->IsDetailKey && $this->NEWTAX->FormValue != NULL && $this->NEWTAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWTAX->caption(), $this->NEWTAX->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NEWTAX->FormValue)) {
			AddMessage($FormError, $this->NEWTAX->errorMessage());
		}
		if ($this->HSNCODE->Required) {
			if (!$this->HSNCODE->IsDetailKey && $this->HSNCODE->FormValue != NULL && $this->HSNCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSNCODE->caption(), $this->HSNCODE->RequiredErrorMessage));
			}
		}
		if ($this->OLDTAX->Required) {
			if (!$this->OLDTAX->IsDetailKey && $this->OLDTAX->FormValue != NULL && $this->OLDTAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDTAX->caption(), $this->OLDTAX->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OLDTAX->FormValue)) {
			AddMessage($FormError, $this->OLDTAX->errorMessage());
		}
		if ($this->Scheduling->Required) {
			if ($this->Scheduling->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Scheduling->caption(), $this->Scheduling->RequiredErrorMessage));
			}
		}
		if ($this->Schedulingh1->Required) {
			if ($this->Schedulingh1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Schedulingh1->caption(), $this->Schedulingh1->RequiredErrorMessage));
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
		if ($this->PRC->CurrentValue <> "") { // Check field with unique index
			$filter = "(PRC = '" . AdjustSql($this->PRC->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PRC->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PRC->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// BRCODE
		$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// TYPE
		$this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, NULL, FALSE);

		// DES
		$this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, NULL, FALSE);

		// UM
		$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, strval($this->UM->CurrentValue) == "");

		// RT
		$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, strval($this->RT->CurrentValue) == "");

		// UR
		$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, strval($this->UR->CurrentValue) == "");

		// TAXP
		$this->TAXP->setDbValueDef($rsnew, $this->TAXP->CurrentValue, NULL, strval($this->TAXP->CurrentValue) == "");

		// BATCHNO
		$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, FALSE);

		// OQ
		$this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, NULL, strval($this->OQ->CurrentValue) == "");

		// RQ
		$this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, NULL, strval($this->RQ->CurrentValue) == "");

		// MRQ
		$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, strval($this->MRQ->CurrentValue) == "");

		// IQ
		$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, strval($this->IQ->CurrentValue) == "");

		// MRP
		$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, strval($this->MRP->CurrentValue) == "");

		// EXPDT
		$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, FALSE);

		// SALQTY
		$this->SALQTY->setDbValueDef($rsnew, $this->SALQTY->CurrentValue, NULL, strval($this->SALQTY->CurrentValue) == "");

		// LASTPURDT
		$this->LASTPURDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTPURDT->CurrentValue, 0), NULL, FALSE);

		// LASTSUPP
		$this->LASTSUPP->setDbValueDef($rsnew, $this->LASTSUPP->CurrentValue, NULL, FALSE);

		// GENNAME
		$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, FALSE);

		// LASTISSDT
		$this->LASTISSDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTISSDT->CurrentValue, 0), NULL, FALSE);

		// CREATEDDT
		$this->CREATEDDT->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['CREATEDDT'] = &$this->CREATEDDT->DbValue;

		// OPPRC
		$this->OPPRC->setDbValueDef($rsnew, $this->OPPRC->CurrentValue, NULL, FALSE);

		// RESTRICT
		$this->RESTRICT->setDbValueDef($rsnew, $this->RESTRICT->CurrentValue, NULL, FALSE);

		// BAWAPRC
		$this->BAWAPRC->setDbValueDef($rsnew, $this->BAWAPRC->CurrentValue, NULL, FALSE);

		// STAXPER
		$this->STAXPER->setDbValueDef($rsnew, $this->STAXPER->CurrentValue, NULL, FALSE);

		// TAXTYPE
		$this->TAXTYPE->setDbValueDef($rsnew, $this->TAXTYPE->CurrentValue, NULL, FALSE);

		// OLDTAXP
		$this->OLDTAXP->setDbValueDef($rsnew, $this->OLDTAXP->CurrentValue, NULL, FALSE);

		// TAXUPD
		$this->TAXUPD->setDbValueDef($rsnew, $this->TAXUPD->CurrentValue, NULL, FALSE);

		// PACKAGE
		$this->PACKAGE->setDbValueDef($rsnew, $this->PACKAGE->CurrentValue, NULL, FALSE);

		// NEWRT
		$this->NEWRT->setDbValueDef($rsnew, $this->NEWRT->CurrentValue, NULL, strval($this->NEWRT->CurrentValue) == "");

		// NEWMRP
		$this->NEWMRP->setDbValueDef($rsnew, $this->NEWMRP->CurrentValue, NULL, strval($this->NEWMRP->CurrentValue) == "");

		// NEWUR
		$this->NEWUR->setDbValueDef($rsnew, $this->NEWUR->CurrentValue, NULL, strval($this->NEWUR->CurrentValue) == "");

		// STATUS
		$this->STATUS->setDbValueDef($rsnew, $this->STATUS->CurrentValue, NULL, FALSE);

		// RETNQTY
		$this->RETNQTY->setDbValueDef($rsnew, $this->RETNQTY->CurrentValue, NULL, strval($this->RETNQTY->CurrentValue) == "");

		// KEMODISC
		$this->KEMODISC->setDbValueDef($rsnew, $this->KEMODISC->CurrentValue, NULL, FALSE);

		// PATSALE
		$this->PATSALE->setDbValueDef($rsnew, $this->PATSALE->CurrentValue, NULL, strval($this->PATSALE->CurrentValue) == "");

		// ORGAN
		$this->ORGAN->setDbValueDef($rsnew, $this->ORGAN->CurrentValue, NULL, FALSE);

		// OLDRQ
		$this->OLDRQ->setDbValueDef($rsnew, $this->OLDRQ->CurrentValue, NULL, strval($this->OLDRQ->CurrentValue) == "");

		// DRID
		$this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, NULL, FALSE);

		// MFRCODE
		$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, FALSE);

		// COMBCODE
		$this->COMBCODE->setDbValueDef($rsnew, $this->COMBCODE->CurrentValue, NULL, FALSE);

		// GENCODE
		$this->GENCODE->setDbValueDef($rsnew, $this->GENCODE->CurrentValue, NULL, FALSE);

		// STRENGTH
		$this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, NULL, strval($this->STRENGTH->CurrentValue) == "");

		// UNIT
		$this->UNIT->setDbValueDef($rsnew, $this->UNIT->CurrentValue, NULL, FALSE);

		// FORMULARY
		$this->FORMULARY->setDbValueDef($rsnew, $this->FORMULARY->CurrentValue, NULL, FALSE);

		// STOCK
		$this->STOCK->setDbValueDef($rsnew, $this->STOCK->CurrentValue, NULL, strval($this->STOCK->CurrentValue) == "");

		// RACKNO
		$this->RACKNO->setDbValueDef($rsnew, $this->RACKNO->CurrentValue, NULL, FALSE);

		// SUPPNAME
		$this->SUPPNAME->setDbValueDef($rsnew, $this->SUPPNAME->CurrentValue, NULL, FALSE);

		// COMBNAME
		$this->COMBNAME->setDbValueDef($rsnew, $this->COMBNAME->CurrentValue, NULL, FALSE);

		// GENERICNAME
		$this->GENERICNAME->setDbValueDef($rsnew, $this->GENERICNAME->CurrentValue, NULL, FALSE);

		// REMARK
		$this->REMARK->setDbValueDef($rsnew, $this->REMARK->CurrentValue, NULL, FALSE);

		// TEMP
		$this->TEMP->setDbValueDef($rsnew, $this->TEMP->CurrentValue, NULL, FALSE);

		// PACKING
		$this->PACKING->setDbValueDef($rsnew, $this->PACKING->CurrentValue, NULL, FALSE);

		// PhysQty
		$this->PhysQty->setDbValueDef($rsnew, $this->PhysQty->CurrentValue, NULL, strval($this->PhysQty->CurrentValue) == "");

		// LedQty
		$this->LedQty->setDbValueDef($rsnew, $this->LedQty->CurrentValue, NULL, strval($this->LedQty->CurrentValue) == "");

		// PurValue
		$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, strval($this->PurValue->CurrentValue) == "");

		// PSGST
		$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, strval($this->PSGST->CurrentValue) == "");

		// PCGST
		$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, strval($this->PCGST->CurrentValue) == "");

		// SaleValue
		$this->SaleValue->setDbValueDef($rsnew, $this->SaleValue->CurrentValue, NULL, strval($this->SaleValue->CurrentValue) == "");

		// SSGST
		$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, strval($this->SSGST->CurrentValue) == "");

		// SCGST
		$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, strval($this->SCGST->CurrentValue) == "");

		// SaleRate
		$this->SaleRate->setDbValueDef($rsnew, $this->SaleRate->CurrentValue, NULL, strval($this->SaleRate->CurrentValue) == "");

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// BRNAME
		$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

		// OV
		$this->OV->setDbValueDef($rsnew, $this->OV->CurrentValue, NULL, strval($this->OV->CurrentValue) == "");

		// LATESTOV
		$this->LATESTOV->setDbValueDef($rsnew, $this->LATESTOV->CurrentValue, NULL, strval($this->LATESTOV->CurrentValue) == "");

		// ITEMTYPE
		$this->ITEMTYPE->setDbValueDef($rsnew, $this->ITEMTYPE->CurrentValue, NULL, FALSE);

		// ROWID
		$this->ROWID->setDbValueDef($rsnew, $this->ROWID->CurrentValue, NULL, FALSE);

		// MOVED
		$this->MOVED->setDbValueDef($rsnew, $this->MOVED->CurrentValue, NULL, FALSE);

		// NEWTAX
		$this->NEWTAX->setDbValueDef($rsnew, $this->NEWTAX->CurrentValue, NULL, strval($this->NEWTAX->CurrentValue) == "");

		// HSNCODE
		$this->HSNCODE->setDbValueDef($rsnew, $this->HSNCODE->CurrentValue, NULL, FALSE);

		// OLDTAX
		$this->OLDTAX->setDbValueDef($rsnew, $this->OLDTAX->CurrentValue, NULL, strval($this->OLDTAX->CurrentValue) == "");

		// Scheduling
		$this->Scheduling->setDbValueDef($rsnew, $this->Scheduling->CurrentValue, NULL, FALSE);

		// Schedulingh1
		$this->Schedulingh1->setDbValueDef($rsnew, $this->Schedulingh1->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_storemastlist.php"), "", $this->TableVar, TRUE);
		$pageId = "addopt";
		$Breadcrumb->add("addopt", $pageId, $url);
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
}
?>
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_storemast_search extends pharmacy_storemast
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_storemast';

	// Page object name
	public $PageObjName = "pharmacy_storemast_search";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

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
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

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
			if (!$Security->canSearch()) {
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
		$this->OV->Visible = FALSE;
		$this->LATESTOV->Visible = FALSE;
		$this->ITEMTYPE->Visible = FALSE;
		$this->ROWID->Visible = FALSE;
		$this->MOVED->Visible = FALSE;
		$this->NEWTAX->Visible = FALSE;
		$this->HSNCODE->Visible = FALSE;
		$this->OLDTAX->Visible = FALSE;
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

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		if ($this->isPageRequest()) { // Validate request

			// Get action
			$this->CurrentAction = Post("action");
			if ($this->isSearch()) {

				// Build search string for advanced search, remove blank field
				$this->loadSearchValues(); // Get search values
				if ($this->validateSearch()) {
					$srchStr = $this->buildAdvancedSearch();
				} else {
					$srchStr = "";
					$this->setFailureMessage($SearchError);
				}
				if ($srchStr <> "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "pharmacy_storemastlist.php" . "?" . $srchStr;
					$this->terminate($srchStr); // Go to list page
				}
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Render row for search
		$this->RowType = ROWTYPE_SEARCH;
		$this->resetAttributes();
		$this->renderRow();
	}

	// Build advanced search
	protected function buildAdvancedSearch()
	{
		$srchUrl = "";
		$this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
		$this->buildSearchUrl($srchUrl, $this->PRC); // PRC
		$this->buildSearchUrl($srchUrl, $this->TYPE); // TYPE
		$this->buildSearchUrl($srchUrl, $this->DES); // DES
		$this->buildSearchUrl($srchUrl, $this->UM); // UM
		$this->buildSearchUrl($srchUrl, $this->RT); // RT
		$this->buildSearchUrl($srchUrl, $this->UR); // UR
		$this->buildSearchUrl($srchUrl, $this->TAXP); // TAXP
		$this->buildSearchUrl($srchUrl, $this->BATCHNO); // BATCHNO
		$this->buildSearchUrl($srchUrl, $this->OQ); // OQ
		$this->buildSearchUrl($srchUrl, $this->RQ); // RQ
		$this->buildSearchUrl($srchUrl, $this->MRQ); // MRQ
		$this->buildSearchUrl($srchUrl, $this->IQ); // IQ
		$this->buildSearchUrl($srchUrl, $this->MRP); // MRP
		$this->buildSearchUrl($srchUrl, $this->EXPDT); // EXPDT
		$this->buildSearchUrl($srchUrl, $this->SALQTY); // SALQTY
		$this->buildSearchUrl($srchUrl, $this->LASTPURDT); // LASTPURDT
		$this->buildSearchUrl($srchUrl, $this->LASTSUPP); // LASTSUPP
		$this->buildSearchUrl($srchUrl, $this->GENNAME); // GENNAME
		$this->buildSearchUrl($srchUrl, $this->LASTISSDT); // LASTISSDT
		$this->buildSearchUrl($srchUrl, $this->CREATEDDT); // CREATEDDT
		$this->buildSearchUrl($srchUrl, $this->OPPRC); // OPPRC
		$this->buildSearchUrl($srchUrl, $this->RESTRICT); // RESTRICT
		$this->buildSearchUrl($srchUrl, $this->BAWAPRC); // BAWAPRC
		$this->buildSearchUrl($srchUrl, $this->STAXPER); // STAXPER
		$this->buildSearchUrl($srchUrl, $this->TAXTYPE); // TAXTYPE
		$this->buildSearchUrl($srchUrl, $this->OLDTAXP); // OLDTAXP
		$this->buildSearchUrl($srchUrl, $this->TAXUPD); // TAXUPD
		$this->buildSearchUrl($srchUrl, $this->PACKAGE); // PACKAGE
		$this->buildSearchUrl($srchUrl, $this->NEWRT); // NEWRT
		$this->buildSearchUrl($srchUrl, $this->NEWMRP); // NEWMRP
		$this->buildSearchUrl($srchUrl, $this->NEWUR); // NEWUR
		$this->buildSearchUrl($srchUrl, $this->STATUS); // STATUS
		$this->buildSearchUrl($srchUrl, $this->RETNQTY); // RETNQTY
		$this->buildSearchUrl($srchUrl, $this->KEMODISC); // KEMODISC
		$this->buildSearchUrl($srchUrl, $this->PATSALE); // PATSALE
		$this->buildSearchUrl($srchUrl, $this->ORGAN); // ORGAN
		$this->buildSearchUrl($srchUrl, $this->OLDRQ); // OLDRQ
		$this->buildSearchUrl($srchUrl, $this->DRID); // DRID
		$this->buildSearchUrl($srchUrl, $this->MFRCODE); // MFRCODE
		$this->buildSearchUrl($srchUrl, $this->COMBCODE); // COMBCODE
		$this->buildSearchUrl($srchUrl, $this->GENCODE); // GENCODE
		$this->buildSearchUrl($srchUrl, $this->STRENGTH); // STRENGTH
		$this->buildSearchUrl($srchUrl, $this->UNIT); // UNIT
		$this->buildSearchUrl($srchUrl, $this->FORMULARY); // FORMULARY
		$this->buildSearchUrl($srchUrl, $this->STOCK); // STOCK
		$this->buildSearchUrl($srchUrl, $this->RACKNO); // RACKNO
		$this->buildSearchUrl($srchUrl, $this->SUPPNAME); // SUPPNAME
		$this->buildSearchUrl($srchUrl, $this->COMBNAME); // COMBNAME
		$this->buildSearchUrl($srchUrl, $this->GENERICNAME); // GENERICNAME
		$this->buildSearchUrl($srchUrl, $this->REMARK); // REMARK
		$this->buildSearchUrl($srchUrl, $this->TEMP); // TEMP
		$this->buildSearchUrl($srchUrl, $this->PACKING); // PACKING
		$this->buildSearchUrl($srchUrl, $this->PhysQty); // PhysQty
		$this->buildSearchUrl($srchUrl, $this->LedQty); // LedQty
		$this->buildSearchUrl($srchUrl, $this->id); // id
		$this->buildSearchUrl($srchUrl, $this->PurValue); // PurValue
		$this->buildSearchUrl($srchUrl, $this->PSGST); // PSGST
		$this->buildSearchUrl($srchUrl, $this->PCGST); // PCGST
		$this->buildSearchUrl($srchUrl, $this->SaleValue); // SaleValue
		$this->buildSearchUrl($srchUrl, $this->SSGST); // SSGST
		$this->buildSearchUrl($srchUrl, $this->SCGST); // SCGST
		$this->buildSearchUrl($srchUrl, $this->SaleRate); // SaleRate
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->BRNAME); // BRNAME
		$this->buildSearchUrl($srchUrl, $this->Scheduling); // Scheduling
		$this->buildSearchUrl($srchUrl, $this->Schedulingh1); // Schedulingh1
		if ($srchUrl <> "")
			$srchUrl .= "&";
		$srchUrl .= "cmd=search";
		return $srchUrl;
	}

	// Build search URL
	protected function buildSearchUrl(&$url, &$fld, $oprOnly = FALSE)
	{
		global $CurrentForm;
		$wrk = "";
		$fldParm = $fld->Param;
		$fldVal = $CurrentForm->getValue("x_$fldParm");
		$fldOpr = $CurrentForm->getValue("z_$fldParm");
		$fldCond = $CurrentForm->getValue("v_$fldParm");
		$fldVal2 = $CurrentForm->getValue("y_$fldParm");
		$fldOpr2 = $CurrentForm->getValue("w_$fldParm");
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal <> "" && $fldVal2 <> "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal <> "" && $isValidValue && IsValidOpr($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr <> "" && $oprOnly && IsValidOpr($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 <> "" && $isValidValue && IsValidOpr($fldOpr2, $fldDataType)) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 <> "" && $oprOnly && IsValidOpr($fldOpr2, $fldDataType))) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk <> "") {
			if ($url <> "")
				$url .= "&";
			$url .= $wrk;
		}
	}
	protected function searchValueIsNumeric($fld, $value)
	{
		if (IsFloatFormat($fld->Type))
			$value = ConvertToFloatString($value);
		return is_numeric($value);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// BRCODE

		if (!$this->isAddOrEdit())
			$this->BRCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BRCODE"));
		$this->BRCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BRCODE"));

		// PRC
		if (!$this->isAddOrEdit())
			$this->PRC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PRC"));
		$this->PRC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PRC"));

		// TYPE
		if (!$this->isAddOrEdit())
			$this->TYPE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TYPE"));
		$this->TYPE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TYPE"));

		// DES
		if (!$this->isAddOrEdit())
			$this->DES->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DES"));
		$this->DES->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DES"));

		// UM
		if (!$this->isAddOrEdit())
			$this->UM->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_UM"));
		$this->UM->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_UM"));

		// RT
		if (!$this->isAddOrEdit())
			$this->RT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RT"));
		$this->RT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RT"));

		// UR
		if (!$this->isAddOrEdit())
			$this->UR->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_UR"));
		$this->UR->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_UR"));

		// TAXP
		if (!$this->isAddOrEdit())
			$this->TAXP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TAXP"));
		$this->TAXP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TAXP"));

		// BATCHNO
		if (!$this->isAddOrEdit())
			$this->BATCHNO->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BATCHNO"));
		$this->BATCHNO->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BATCHNO"));

		// OQ
		if (!$this->isAddOrEdit())
			$this->OQ->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_OQ"));
		$this->OQ->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_OQ"));

		// RQ
		if (!$this->isAddOrEdit())
			$this->RQ->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RQ"));
		$this->RQ->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RQ"));

		// MRQ
		if (!$this->isAddOrEdit())
			$this->MRQ->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_MRQ"));
		$this->MRQ->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_MRQ"));

		// IQ
		if (!$this->isAddOrEdit())
			$this->IQ->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_IQ"));
		$this->IQ->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_IQ"));

		// MRP
		if (!$this->isAddOrEdit())
			$this->MRP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_MRP"));
		$this->MRP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_MRP"));

		// EXPDT
		if (!$this->isAddOrEdit())
			$this->EXPDT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_EXPDT"));
		$this->EXPDT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_EXPDT"));

		// SALQTY
		if (!$this->isAddOrEdit())
			$this->SALQTY->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SALQTY"));
		$this->SALQTY->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SALQTY"));

		// LASTPURDT
		if (!$this->isAddOrEdit())
			$this->LASTPURDT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LASTPURDT"));
		$this->LASTPURDT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LASTPURDT"));

		// LASTSUPP
		if (!$this->isAddOrEdit())
			$this->LASTSUPP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LASTSUPP"));
		$this->LASTSUPP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LASTSUPP"));

		// GENNAME
		if (!$this->isAddOrEdit())
			$this->GENNAME->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GENNAME"));
		$this->GENNAME->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GENNAME"));

		// LASTISSDT
		if (!$this->isAddOrEdit())
			$this->LASTISSDT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LASTISSDT"));
		$this->LASTISSDT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LASTISSDT"));

		// CREATEDDT
		if (!$this->isAddOrEdit())
			$this->CREATEDDT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CREATEDDT"));
		$this->CREATEDDT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CREATEDDT"));

		// OPPRC
		if (!$this->isAddOrEdit())
			$this->OPPRC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_OPPRC"));
		$this->OPPRC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_OPPRC"));

		// RESTRICT
		if (!$this->isAddOrEdit())
			$this->RESTRICT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RESTRICT"));
		$this->RESTRICT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RESTRICT"));

		// BAWAPRC
		if (!$this->isAddOrEdit())
			$this->BAWAPRC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BAWAPRC"));
		$this->BAWAPRC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BAWAPRC"));

		// STAXPER
		if (!$this->isAddOrEdit())
			$this->STAXPER->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_STAXPER"));
		$this->STAXPER->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_STAXPER"));

		// TAXTYPE
		if (!$this->isAddOrEdit())
			$this->TAXTYPE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TAXTYPE"));
		$this->TAXTYPE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TAXTYPE"));

		// OLDTAXP
		if (!$this->isAddOrEdit())
			$this->OLDTAXP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_OLDTAXP"));
		$this->OLDTAXP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_OLDTAXP"));

		// TAXUPD
		if (!$this->isAddOrEdit())
			$this->TAXUPD->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TAXUPD"));
		$this->TAXUPD->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TAXUPD"));

		// PACKAGE
		if (!$this->isAddOrEdit())
			$this->PACKAGE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PACKAGE"));
		$this->PACKAGE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PACKAGE"));

		// NEWRT
		if (!$this->isAddOrEdit())
			$this->NEWRT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_NEWRT"));
		$this->NEWRT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_NEWRT"));

		// NEWMRP
		if (!$this->isAddOrEdit())
			$this->NEWMRP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_NEWMRP"));
		$this->NEWMRP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_NEWMRP"));

		// NEWUR
		if (!$this->isAddOrEdit())
			$this->NEWUR->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_NEWUR"));
		$this->NEWUR->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_NEWUR"));

		// STATUS
		if (!$this->isAddOrEdit())
			$this->STATUS->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_STATUS"));
		$this->STATUS->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_STATUS"));

		// RETNQTY
		if (!$this->isAddOrEdit())
			$this->RETNQTY->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RETNQTY"));
		$this->RETNQTY->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RETNQTY"));

		// KEMODISC
		if (!$this->isAddOrEdit())
			$this->KEMODISC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_KEMODISC"));
		$this->KEMODISC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_KEMODISC"));

		// PATSALE
		if (!$this->isAddOrEdit())
			$this->PATSALE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PATSALE"));
		$this->PATSALE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PATSALE"));

		// ORGAN
		if (!$this->isAddOrEdit())
			$this->ORGAN->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ORGAN"));
		$this->ORGAN->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ORGAN"));

		// OLDRQ
		if (!$this->isAddOrEdit())
			$this->OLDRQ->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_OLDRQ"));
		$this->OLDRQ->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_OLDRQ"));

		// DRID
		if (!$this->isAddOrEdit())
			$this->DRID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DRID"));
		$this->DRID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DRID"));

		// MFRCODE
		if (!$this->isAddOrEdit())
			$this->MFRCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_MFRCODE"));
		$this->MFRCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_MFRCODE"));

		// COMBCODE
		if (!$this->isAddOrEdit())
			$this->COMBCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_COMBCODE"));
		$this->COMBCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_COMBCODE"));

		// GENCODE
		if (!$this->isAddOrEdit())
			$this->GENCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GENCODE"));
		$this->GENCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GENCODE"));

		// STRENGTH
		if (!$this->isAddOrEdit())
			$this->STRENGTH->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_STRENGTH"));
		$this->STRENGTH->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_STRENGTH"));

		// UNIT
		if (!$this->isAddOrEdit())
			$this->UNIT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_UNIT"));
		$this->UNIT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_UNIT"));

		// FORMULARY
		if (!$this->isAddOrEdit())
			$this->FORMULARY->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_FORMULARY"));
		$this->FORMULARY->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_FORMULARY"));

		// STOCK
		if (!$this->isAddOrEdit())
			$this->STOCK->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_STOCK"));
		$this->STOCK->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_STOCK"));

		// RACKNO
		if (!$this->isAddOrEdit())
			$this->RACKNO->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RACKNO"));
		$this->RACKNO->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RACKNO"));

		// SUPPNAME
		if (!$this->isAddOrEdit())
			$this->SUPPNAME->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SUPPNAME"));
		$this->SUPPNAME->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SUPPNAME"));

		// COMBNAME
		if (!$this->isAddOrEdit())
			$this->COMBNAME->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_COMBNAME"));
		$this->COMBNAME->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_COMBNAME"));

		// GENERICNAME
		if (!$this->isAddOrEdit())
			$this->GENERICNAME->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GENERICNAME"));
		$this->GENERICNAME->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GENERICNAME"));

		// REMARK
		if (!$this->isAddOrEdit())
			$this->REMARK->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_REMARK"));
		$this->REMARK->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_REMARK"));

		// TEMP
		if (!$this->isAddOrEdit())
			$this->TEMP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TEMP"));
		$this->TEMP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TEMP"));

		// PACKING
		if (!$this->isAddOrEdit())
			$this->PACKING->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PACKING"));
		$this->PACKING->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PACKING"));

		// PhysQty
		if (!$this->isAddOrEdit())
			$this->PhysQty->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PhysQty"));
		$this->PhysQty->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PhysQty"));

		// LedQty
		if (!$this->isAddOrEdit())
			$this->LedQty->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LedQty"));
		$this->LedQty->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LedQty"));

		// id
		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_id"));
		$this->id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_id"));

		// PurValue
		if (!$this->isAddOrEdit())
			$this->PurValue->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PurValue"));
		$this->PurValue->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PurValue"));

		// PSGST
		if (!$this->isAddOrEdit())
			$this->PSGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PSGST"));
		$this->PSGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PSGST"));

		// PCGST
		if (!$this->isAddOrEdit())
			$this->PCGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PCGST"));
		$this->PCGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PCGST"));

		// SaleValue
		if (!$this->isAddOrEdit())
			$this->SaleValue->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SaleValue"));
		$this->SaleValue->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SaleValue"));

		// SSGST
		if (!$this->isAddOrEdit())
			$this->SSGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SSGST"));
		$this->SSGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SSGST"));

		// SCGST
		if (!$this->isAddOrEdit())
			$this->SCGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SCGST"));
		$this->SCGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SCGST"));

		// SaleRate
		if (!$this->isAddOrEdit())
			$this->SaleRate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SaleRate"));
		$this->SaleRate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SaleRate"));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospID"));
		$this->HospID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospID"));

		// BRNAME
		if (!$this->isAddOrEdit())
			$this->BRNAME->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BRNAME"));
		$this->BRNAME->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BRNAME"));

		// Scheduling
		if (!$this->isAddOrEdit())
			$this->Scheduling->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Scheduling"));
		$this->Scheduling->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Scheduling"));

		// Schedulingh1
		if (!$this->isAddOrEdit())
			$this->Schedulingh1->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Schedulingh1"));
		$this->Schedulingh1->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Schedulingh1"));
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

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";
			$this->Scheduling->TooltipValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
			$this->Schedulingh1->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// TYPE
			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			$this->TYPE->EditValue = $this->TYPE->options(TRUE);

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DES->AdvancedSearch->SearchValue = HtmlDecode($this->DES->AdvancedSearch->SearchValue);
			$this->DES->EditValue = HtmlEncode($this->DES->AdvancedSearch->SearchValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
			$this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->AdvancedSearch->SearchValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());

			// TAXP
			$this->TAXP->EditAttrs["class"] = "form-control";
			$this->TAXP->EditCustomAttributes = "";
			$this->TAXP->EditValue = HtmlEncode($this->TAXP->AdvancedSearch->SearchValue);
			$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// OQ
			$this->OQ->EditAttrs["class"] = "form-control";
			$this->OQ->EditCustomAttributes = "";
			$this->OQ->EditValue = HtmlEncode($this->OQ->AdvancedSearch->SearchValue);
			$this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());

			// RQ
			$this->RQ->EditAttrs["class"] = "form-control";
			$this->RQ->EditCustomAttributes = "";
			$this->RQ->EditValue = HtmlEncode($this->RQ->AdvancedSearch->SearchValue);
			$this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// SALQTY
			$this->SALQTY->EditAttrs["class"] = "form-control";
			$this->SALQTY->EditCustomAttributes = "";
			$this->SALQTY->EditValue = HtmlEncode($this->SALQTY->AdvancedSearch->SearchValue);
			$this->SALQTY->PlaceHolder = RemoveHtml($this->SALQTY->caption());

			// LASTPURDT
			$this->LASTPURDT->EditAttrs["class"] = "form-control";
			$this->LASTPURDT->EditCustomAttributes = "";
			$this->LASTPURDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LASTPURDT->AdvancedSearch->SearchValue, 0), 8));
			$this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

			// LASTSUPP
			$this->LASTSUPP->EditCustomAttributes = "";
			$curVal = trim(strval($this->LASTSUPP->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->LASTSUPP->AdvancedSearch->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
			else
				$this->LASTSUPP->AdvancedSearch->ViewValue = $this->LASTSUPP->Lookup !== NULL && is_array($this->LASTSUPP->Lookup->Options) ? $curVal : NULL;
			if ($this->LASTSUPP->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->LASTSUPP->EditValue = array_values($this->LASTSUPP->Lookup->Options);
				if ($this->LASTSUPP->AdvancedSearch->ViewValue == "")
					$this->LASTSUPP->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->LASTSUPP->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->LASTSUPP->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->LASTSUPP->AdvancedSearch->ViewValue = $this->LASTSUPP->displayValue($arwrk);
				} else {
					$this->LASTSUPP->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->LASTSUPP->EditValue = $arwrk;
			}

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
			$curVal = strval($this->GENNAME->AdvancedSearch->SearchValue);
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
						$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->GENNAME->EditValue = NULL;
			}
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// LASTISSDT
			$this->LASTISSDT->EditAttrs["class"] = "form-control";
			$this->LASTISSDT->EditCustomAttributes = "";
			$this->LASTISSDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LASTISSDT->AdvancedSearch->SearchValue, 0), 8));
			$this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

			// CREATEDDT
			$this->CREATEDDT->EditAttrs["class"] = "form-control";
			$this->CREATEDDT->EditCustomAttributes = "";
			$this->CREATEDDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CREATEDDT->AdvancedSearch->SearchValue, 0), 8));
			$this->CREATEDDT->PlaceHolder = RemoveHtml($this->CREATEDDT->caption());

			// OPPRC
			$this->OPPRC->EditAttrs["class"] = "form-control";
			$this->OPPRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OPPRC->AdvancedSearch->SearchValue = HtmlDecode($this->OPPRC->AdvancedSearch->SearchValue);
			$this->OPPRC->EditValue = HtmlEncode($this->OPPRC->AdvancedSearch->SearchValue);
			$this->OPPRC->PlaceHolder = RemoveHtml($this->OPPRC->caption());

			// RESTRICT
			$this->RESTRICT->EditAttrs["class"] = "form-control";
			$this->RESTRICT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RESTRICT->AdvancedSearch->SearchValue = HtmlDecode($this->RESTRICT->AdvancedSearch->SearchValue);
			$this->RESTRICT->EditValue = HtmlEncode($this->RESTRICT->AdvancedSearch->SearchValue);
			$this->RESTRICT->PlaceHolder = RemoveHtml($this->RESTRICT->caption());

			// BAWAPRC
			$this->BAWAPRC->EditAttrs["class"] = "form-control";
			$this->BAWAPRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BAWAPRC->AdvancedSearch->SearchValue = HtmlDecode($this->BAWAPRC->AdvancedSearch->SearchValue);
			$this->BAWAPRC->EditValue = HtmlEncode($this->BAWAPRC->AdvancedSearch->SearchValue);
			$this->BAWAPRC->PlaceHolder = RemoveHtml($this->BAWAPRC->caption());

			// STAXPER
			$this->STAXPER->EditAttrs["class"] = "form-control";
			$this->STAXPER->EditCustomAttributes = "";
			$this->STAXPER->EditValue = HtmlEncode($this->STAXPER->AdvancedSearch->SearchValue);
			$this->STAXPER->PlaceHolder = RemoveHtml($this->STAXPER->caption());

			// TAXTYPE
			$this->TAXTYPE->EditAttrs["class"] = "form-control";
			$this->TAXTYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TAXTYPE->AdvancedSearch->SearchValue = HtmlDecode($this->TAXTYPE->AdvancedSearch->SearchValue);
			$this->TAXTYPE->EditValue = HtmlEncode($this->TAXTYPE->AdvancedSearch->SearchValue);
			$this->TAXTYPE->PlaceHolder = RemoveHtml($this->TAXTYPE->caption());

			// OLDTAXP
			$this->OLDTAXP->EditAttrs["class"] = "form-control";
			$this->OLDTAXP->EditCustomAttributes = "";
			$this->OLDTAXP->EditValue = HtmlEncode($this->OLDTAXP->AdvancedSearch->SearchValue);
			$this->OLDTAXP->PlaceHolder = RemoveHtml($this->OLDTAXP->caption());

			// TAXUPD
			$this->TAXUPD->EditAttrs["class"] = "form-control";
			$this->TAXUPD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TAXUPD->AdvancedSearch->SearchValue = HtmlDecode($this->TAXUPD->AdvancedSearch->SearchValue);
			$this->TAXUPD->EditValue = HtmlEncode($this->TAXUPD->AdvancedSearch->SearchValue);
			$this->TAXUPD->PlaceHolder = RemoveHtml($this->TAXUPD->caption());

			// PACKAGE
			$this->PACKAGE->EditAttrs["class"] = "form-control";
			$this->PACKAGE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PACKAGE->AdvancedSearch->SearchValue = HtmlDecode($this->PACKAGE->AdvancedSearch->SearchValue);
			$this->PACKAGE->EditValue = HtmlEncode($this->PACKAGE->AdvancedSearch->SearchValue);
			$this->PACKAGE->PlaceHolder = RemoveHtml($this->PACKAGE->caption());

			// NEWRT
			$this->NEWRT->EditAttrs["class"] = "form-control";
			$this->NEWRT->EditCustomAttributes = "";
			$this->NEWRT->EditValue = HtmlEncode($this->NEWRT->AdvancedSearch->SearchValue);
			$this->NEWRT->PlaceHolder = RemoveHtml($this->NEWRT->caption());

			// NEWMRP
			$this->NEWMRP->EditAttrs["class"] = "form-control";
			$this->NEWMRP->EditCustomAttributes = "";
			$this->NEWMRP->EditValue = HtmlEncode($this->NEWMRP->AdvancedSearch->SearchValue);
			$this->NEWMRP->PlaceHolder = RemoveHtml($this->NEWMRP->caption());

			// NEWUR
			$this->NEWUR->EditAttrs["class"] = "form-control";
			$this->NEWUR->EditCustomAttributes = "";
			$this->NEWUR->EditValue = HtmlEncode($this->NEWUR->AdvancedSearch->SearchValue);
			$this->NEWUR->PlaceHolder = RemoveHtml($this->NEWUR->caption());

			// STATUS
			$this->STATUS->EditAttrs["class"] = "form-control";
			$this->STATUS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->STATUS->AdvancedSearch->SearchValue = HtmlDecode($this->STATUS->AdvancedSearch->SearchValue);
			$this->STATUS->EditValue = HtmlEncode($this->STATUS->AdvancedSearch->SearchValue);
			$this->STATUS->PlaceHolder = RemoveHtml($this->STATUS->caption());

			// RETNQTY
			$this->RETNQTY->EditAttrs["class"] = "form-control";
			$this->RETNQTY->EditCustomAttributes = "";
			$this->RETNQTY->EditValue = HtmlEncode($this->RETNQTY->AdvancedSearch->SearchValue);
			$this->RETNQTY->PlaceHolder = RemoveHtml($this->RETNQTY->caption());

			// KEMODISC
			$this->KEMODISC->EditAttrs["class"] = "form-control";
			$this->KEMODISC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->KEMODISC->AdvancedSearch->SearchValue = HtmlDecode($this->KEMODISC->AdvancedSearch->SearchValue);
			$this->KEMODISC->EditValue = HtmlEncode($this->KEMODISC->AdvancedSearch->SearchValue);
			$this->KEMODISC->PlaceHolder = RemoveHtml($this->KEMODISC->caption());

			// PATSALE
			$this->PATSALE->EditAttrs["class"] = "form-control";
			$this->PATSALE->EditCustomAttributes = "";
			$this->PATSALE->EditValue = HtmlEncode($this->PATSALE->AdvancedSearch->SearchValue);
			$this->PATSALE->PlaceHolder = RemoveHtml($this->PATSALE->caption());

			// ORGAN
			$this->ORGAN->EditAttrs["class"] = "form-control";
			$this->ORGAN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ORGAN->AdvancedSearch->SearchValue = HtmlDecode($this->ORGAN->AdvancedSearch->SearchValue);
			$this->ORGAN->EditValue = HtmlEncode($this->ORGAN->AdvancedSearch->SearchValue);
			$this->ORGAN->PlaceHolder = RemoveHtml($this->ORGAN->caption());

			// OLDRQ
			$this->OLDRQ->EditAttrs["class"] = "form-control";
			$this->OLDRQ->EditCustomAttributes = "";
			$this->OLDRQ->EditValue = HtmlEncode($this->OLDRQ->AdvancedSearch->SearchValue);
			$this->OLDRQ->PlaceHolder = RemoveHtml($this->OLDRQ->caption());

			// DRID
			$this->DRID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DRID->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->DRID->AdvancedSearch->ViewValue = $this->DRID->lookupCacheOption($curVal);
			else
				$this->DRID->AdvancedSearch->ViewValue = $this->DRID->Lookup !== NULL && is_array($this->DRID->Lookup->Options) ? $curVal : NULL;
			if ($this->DRID->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
				if ($this->DRID->AdvancedSearch->ViewValue == "")
					$this->DRID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DRID->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DRID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DRID->AdvancedSearch->ViewValue = $this->DRID->displayValue($arwrk);
				} else {
					$this->DRID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DRID->EditValue = $arwrk;
			}

			// MFRCODE
			$this->MFRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->MFRCODE->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->MFRCODE->AdvancedSearch->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
			else
				$this->MFRCODE->AdvancedSearch->ViewValue = $this->MFRCODE->Lookup !== NULL && is_array($this->MFRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->MFRCODE->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
				if ($this->MFRCODE->AdvancedSearch->ViewValue == "")
					$this->MFRCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MFRCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->MFRCODE->AdvancedSearch->ViewValue = $this->MFRCODE->displayValue($arwrk);
				} else {
					$this->MFRCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MFRCODE->EditValue = $arwrk;
			}

			// COMBCODE
			$this->COMBCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBCODE->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->COMBCODE->AdvancedSearch->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
			else
				$this->COMBCODE->AdvancedSearch->ViewValue = $this->COMBCODE->Lookup !== NULL && is_array($this->COMBCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBCODE->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
				if ($this->COMBCODE->AdvancedSearch->ViewValue == "")
					$this->COMBCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->COMBCODE->AdvancedSearch->ViewValue = $this->COMBCODE->displayValue($arwrk);
				} else {
					$this->COMBCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBCODE->EditValue = $arwrk;
			}

			// GENCODE
			$this->GENCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENCODE->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->GENCODE->AdvancedSearch->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
			else
				$this->GENCODE->AdvancedSearch->ViewValue = $this->GENCODE->Lookup !== NULL && is_array($this->GENCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->GENCODE->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
				if ($this->GENCODE->AdvancedSearch->ViewValue == "")
					$this->GENCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->GENCODE->AdvancedSearch->ViewValue = $this->GENCODE->displayValue($arwrk);
				} else {
					$this->GENCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENCODE->EditValue = $arwrk;
			}

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->AdvancedSearch->SearchValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());

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
			$this->STOCK->EditValue = HtmlEncode($this->STOCK->AdvancedSearch->SearchValue);
			$this->STOCK->PlaceHolder = RemoveHtml($this->STOCK->caption());

			// RACKNO
			$this->RACKNO->EditAttrs["class"] = "form-control";
			$this->RACKNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RACKNO->AdvancedSearch->SearchValue = HtmlDecode($this->RACKNO->AdvancedSearch->SearchValue);
			$this->RACKNO->EditValue = HtmlEncode($this->RACKNO->AdvancedSearch->SearchValue);
			$this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

			// SUPPNAME
			$this->SUPPNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->SUPPNAME->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->SUPPNAME->AdvancedSearch->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
			else
				$this->SUPPNAME->AdvancedSearch->ViewValue = $this->SUPPNAME->Lookup !== NULL && is_array($this->SUPPNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->SUPPNAME->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->SUPPNAME->EditValue = array_values($this->SUPPNAME->Lookup->Options);
				if ($this->SUPPNAME->AdvancedSearch->ViewValue == "")
					$this->SUPPNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->SUPPNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->SUPPNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->SUPPNAME->AdvancedSearch->ViewValue = $this->SUPPNAME->displayValue($arwrk);
				} else {
					$this->SUPPNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->SUPPNAME->EditValue = $arwrk;
			}

			// COMBNAME
			$this->COMBNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBNAME->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			else
				$this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->Lookup !== NULL && is_array($this->COMBNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBNAME->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
				if ($this->COMBNAME->AdvancedSearch->ViewValue == "")
					$this->COMBNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->displayValue($arwrk);
				} else {
					$this->COMBNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->COMBNAME->EditValue = $arwrk;
			}

			// GENERICNAME
			$this->GENERICNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENERICNAME->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			else
				$this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->Lookup !== NULL && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->GENERICNAME->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
				if ($this->GENERICNAME->AdvancedSearch->ViewValue == "")
					$this->GENERICNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->displayValue($arwrk);
				} else {
					$this->GENERICNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GENERICNAME->EditValue = $arwrk;
			}

			// REMARK
			$this->REMARK->EditAttrs["class"] = "form-control";
			$this->REMARK->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->REMARK->AdvancedSearch->SearchValue = HtmlDecode($this->REMARK->AdvancedSearch->SearchValue);
			$this->REMARK->EditValue = HtmlEncode($this->REMARK->AdvancedSearch->SearchValue);
			$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

			// TEMP
			$this->TEMP->EditAttrs["class"] = "form-control";
			$this->TEMP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TEMP->AdvancedSearch->SearchValue = HtmlDecode($this->TEMP->AdvancedSearch->SearchValue);
			$this->TEMP->EditValue = HtmlEncode($this->TEMP->AdvancedSearch->SearchValue);
			$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

			// PACKING
			$this->PACKING->EditAttrs["class"] = "form-control";
			$this->PACKING->EditCustomAttributes = "";
			$this->PACKING->EditValue = HtmlEncode($this->PACKING->AdvancedSearch->SearchValue);
			$this->PACKING->PlaceHolder = RemoveHtml($this->PACKING->caption());

			// PhysQty
			$this->PhysQty->EditAttrs["class"] = "form-control";
			$this->PhysQty->EditCustomAttributes = "";
			$this->PhysQty->EditValue = HtmlEncode($this->PhysQty->AdvancedSearch->SearchValue);
			$this->PhysQty->PlaceHolder = RemoveHtml($this->PhysQty->caption());

			// LedQty
			$this->LedQty->EditAttrs["class"] = "form-control";
			$this->LedQty->EditCustomAttributes = "";
			$this->LedQty->EditValue = HtmlEncode($this->LedQty->AdvancedSearch->SearchValue);
			$this->LedQty->PlaceHolder = RemoveHtml($this->LedQty->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->AdvancedSearch->SearchValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->AdvancedSearch->SearchValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());

			// SaleValue
			$this->SaleValue->EditAttrs["class"] = "form-control";
			$this->SaleValue->EditCustomAttributes = "";
			$this->SaleValue->EditValue = HtmlEncode($this->SaleValue->AdvancedSearch->SearchValue);
			$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->AdvancedSearch->SearchValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->AdvancedSearch->SearchValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());

			// SaleRate
			$this->SaleRate->EditAttrs["class"] = "form-control";
			$this->SaleRate->EditCustomAttributes = "";
			$this->SaleRate->EditValue = HtmlEncode($this->SaleRate->AdvancedSearch->SearchValue);
			$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// BRNAME
			$this->BRNAME->EditAttrs["class"] = "form-control";
			$this->BRNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BRNAME->AdvancedSearch->SearchValue = HtmlDecode($this->BRNAME->AdvancedSearch->SearchValue);
			$this->BRNAME->EditValue = HtmlEncode($this->BRNAME->AdvancedSearch->SearchValue);
			$this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

			// Scheduling
			$this->Scheduling->EditCustomAttributes = "";
			$this->Scheduling->EditValue = $this->Scheduling->options(FALSE);

			// Schedulingh1
			$this->Schedulingh1->EditCustomAttributes = "";
			$this->Schedulingh1->EditValue = $this->Schedulingh1->options(FALSE);
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;
		if (!CheckNumber($this->RT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RT->errorMessage());
		}
		if (!CheckNumber($this->UR->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->UR->errorMessage());
		}
		if (!CheckNumber($this->TAXP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->TAXP->errorMessage());
		}
		if (!CheckNumber($this->OQ->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->OQ->errorMessage());
		}
		if (!CheckNumber($this->RQ->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RQ->errorMessage());
		}
		if (!CheckNumber($this->MRQ->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->MRQ->errorMessage());
		}
		if (!CheckNumber($this->IQ->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->IQ->errorMessage());
		}
		if (!CheckNumber($this->MRP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->MRP->errorMessage());
		}
		if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EXPDT->errorMessage());
		}
		if (!CheckNumber($this->SALQTY->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SALQTY->errorMessage());
		}
		if (!CheckDate($this->LASTPURDT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->LASTPURDT->errorMessage());
		}
		if (!CheckDate($this->LASTISSDT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->LASTISSDT->errorMessage());
		}
		if (!CheckDate($this->CREATEDDT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CREATEDDT->errorMessage());
		}
		if (!CheckNumber($this->STAXPER->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->STAXPER->errorMessage());
		}
		if (!CheckNumber($this->OLDTAXP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->OLDTAXP->errorMessage());
		}
		if (!CheckNumber($this->NEWRT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->NEWRT->errorMessage());
		}
		if (!CheckNumber($this->NEWMRP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->NEWMRP->errorMessage());
		}
		if (!CheckNumber($this->NEWUR->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->NEWUR->errorMessage());
		}
		if (!CheckNumber($this->RETNQTY->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RETNQTY->errorMessage());
		}
		if (!CheckNumber($this->PATSALE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PATSALE->errorMessage());
		}
		if (!CheckNumber($this->OLDRQ->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->OLDRQ->errorMessage());
		}
		if (!CheckNumber($this->STRENGTH->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->STRENGTH->errorMessage());
		}
		if (!CheckNumber($this->STOCK->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->STOCK->errorMessage());
		}
		if (!CheckNumber($this->PACKING->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PACKING->errorMessage());
		}
		if (!CheckNumber($this->PhysQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PhysQty->errorMessage());
		}
		if (!CheckNumber($this->LedQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->LedQty->errorMessage());
		}
		if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->id->errorMessage());
		}
		if (!CheckNumber($this->PurValue->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PurValue->errorMessage());
		}
		if (!CheckNumber($this->PSGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PSGST->errorMessage());
		}
		if (!CheckNumber($this->PCGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PCGST->errorMessage());
		}
		if (!CheckNumber($this->SaleValue->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SaleValue->errorMessage());
		}
		if (!CheckNumber($this->SSGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SSGST->errorMessage());
		}
		if (!CheckNumber($this->SCGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SCGST->errorMessage());
		}
		if (!CheckNumber($this->SaleRate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SaleRate->errorMessage());
		}
		if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->HospID->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->BRCODE->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->TYPE->AdvancedSearch->load();
		$this->DES->AdvancedSearch->load();
		$this->UM->AdvancedSearch->load();
		$this->RT->AdvancedSearch->load();
		$this->UR->AdvancedSearch->load();
		$this->TAXP->AdvancedSearch->load();
		$this->BATCHNO->AdvancedSearch->load();
		$this->OQ->AdvancedSearch->load();
		$this->RQ->AdvancedSearch->load();
		$this->MRQ->AdvancedSearch->load();
		$this->IQ->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->EXPDT->AdvancedSearch->load();
		$this->SALQTY->AdvancedSearch->load();
		$this->LASTPURDT->AdvancedSearch->load();
		$this->LASTSUPP->AdvancedSearch->load();
		$this->GENNAME->AdvancedSearch->load();
		$this->LASTISSDT->AdvancedSearch->load();
		$this->CREATEDDT->AdvancedSearch->load();
		$this->OPPRC->AdvancedSearch->load();
		$this->RESTRICT->AdvancedSearch->load();
		$this->BAWAPRC->AdvancedSearch->load();
		$this->STAXPER->AdvancedSearch->load();
		$this->TAXTYPE->AdvancedSearch->load();
		$this->OLDTAXP->AdvancedSearch->load();
		$this->TAXUPD->AdvancedSearch->load();
		$this->PACKAGE->AdvancedSearch->load();
		$this->NEWRT->AdvancedSearch->load();
		$this->NEWMRP->AdvancedSearch->load();
		$this->NEWUR->AdvancedSearch->load();
		$this->STATUS->AdvancedSearch->load();
		$this->RETNQTY->AdvancedSearch->load();
		$this->KEMODISC->AdvancedSearch->load();
		$this->PATSALE->AdvancedSearch->load();
		$this->ORGAN->AdvancedSearch->load();
		$this->OLDRQ->AdvancedSearch->load();
		$this->DRID->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->COMBCODE->AdvancedSearch->load();
		$this->GENCODE->AdvancedSearch->load();
		$this->STRENGTH->AdvancedSearch->load();
		$this->UNIT->AdvancedSearch->load();
		$this->FORMULARY->AdvancedSearch->load();
		$this->STOCK->AdvancedSearch->load();
		$this->RACKNO->AdvancedSearch->load();
		$this->SUPPNAME->AdvancedSearch->load();
		$this->COMBNAME->AdvancedSearch->load();
		$this->GENERICNAME->AdvancedSearch->load();
		$this->REMARK->AdvancedSearch->load();
		$this->TEMP->AdvancedSearch->load();
		$this->PACKING->AdvancedSearch->load();
		$this->PhysQty->AdvancedSearch->load();
		$this->LedQty->AdvancedSearch->load();
		$this->id->AdvancedSearch->load();
		$this->PurValue->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->SaleValue->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->SaleRate->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->BRNAME->AdvancedSearch->load();
		$this->Scheduling->AdvancedSearch->load();
		$this->Schedulingh1->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_storemastlist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
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
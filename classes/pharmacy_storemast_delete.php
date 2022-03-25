<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_storemast_delete extends pharmacy_storemast
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_storemast';

	// Page object name
	public $PageObjName = "pharmacy_storemast_delete";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

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
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $TotalRecs = 0;
	public $RecCnt;
	public $RecKeys = array();
	public $StartRowCnt = 1;
	public $RowCnt = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm;

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
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("pharmacy_storemastlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
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
		$this->LASTPURDT->Visible = FALSE;
		$this->LASTSUPP->Visible = FALSE;
		$this->GENNAME->setVisibility();
		$this->LASTISSDT->Visible = FALSE;
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
		$this->RACKNO->Visible = FALSE;
		$this->SUPPNAME->Visible = FALSE;
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

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("pharmacy_storemastlist.php"); // Prevent SQL injection, return to list
			return;
		}

		// Set up filter (WHERE Clause)
		$this->CurrentFilter = $filter;

		// Get action
		if (IsApi()) {
			$this->CurrentAction = "delete"; // Delete record directly
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action");
		} elseif (Get("action") == "1") {
			$this->CurrentAction = "delete"; // Delete record directly
		} else {
			$this->CurrentAction = "show"; // Display record
		}
		if ($this->isDelete()) {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->deleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
				if (IsApi()) {
					$this->terminate(TRUE);
					return;
				} else {
					$this->terminate($this->getReturnUrl()); // Return to caller
				}
			} else { // Delete failed
				if (IsApi()) {
					$this->terminate();
					return;
				}
				$this->CurrentAction = "show"; // Display record
			}
		}
		if ($this->isShow()) { // Load records for display
			if ($this->Recordset = $this->loadRecordset())
				$this->TotalRecs = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecs <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("pharmacy_storemastlist.php"); // Return to list
			}
		}
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$row['OV'] = NULL;
		$row['LATESTOV'] = NULL;
		$row['ITEMTYPE'] = NULL;
		$row['ROWID'] = NULL;
		$row['MOVED'] = NULL;
		$row['NEWTAX'] = NULL;
		$row['HSNCODE'] = NULL;
		$row['OLDTAX'] = NULL;
		$row['Scheduling'] = NULL;
		$row['Schedulingh1'] = NULL;
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
		// OV

		$this->OV->CellCssStyle = "white-space: nowrap;";

		// LATESTOV
		$this->LATESTOV->CellCssStyle = "white-space: nowrap;";

		// ITEMTYPE
		$this->ITEMTYPE->CellCssStyle = "white-space: nowrap;";

		// ROWID
		$this->ROWID->CellCssStyle = "white-space: nowrap;";

		// MOVED
		$this->MOVED->CellCssStyle = "white-space: nowrap;";

		// NEWTAX
		$this->NEWTAX->CellCssStyle = "white-space: nowrap;";

		// HSNCODE
		$this->HSNCODE->CellCssStyle = "white-space: nowrap;";

		// OLDTAX
		$this->OLDTAX->CellCssStyle = "white-space: nowrap;";

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

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";
			$this->GENNAME->TooltipValue = "";

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

			// Scheduling
			$this->Scheduling->LinkCustomAttributes = "";
			$this->Scheduling->HrefValue = "";
			$this->Scheduling->TooltipValue = "";

			// Schedulingh1
			$this->Schedulingh1->LinkCustomAttributes = "";
			$this->Schedulingh1->HrefValue = "";
			$this->Schedulingh1->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		$conn->beginTrans();

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey <> "")
					$thisKey .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
				$thisKey .= $row['id'];
				if (DELETE_UPLOADED_FILES) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($deleteRows === FALSE)
					break;
				if ($key <> "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}
		if ($deleteRows) {
			$conn->commitTrans(); // Commit the changes
		} else {
			$conn->rollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_storemastlist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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
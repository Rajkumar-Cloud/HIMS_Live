<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class store_suppliers_delete extends store_suppliers
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'store_suppliers';

	// Page object name
	public $PageObjName = "store_suppliers_delete";

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

		// Table object (store_suppliers)
		if (!isset($GLOBALS["store_suppliers"]) || get_class($GLOBALS["store_suppliers"]) == PROJECT_NAMESPACE . "store_suppliers") {
			$GLOBALS["store_suppliers"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["store_suppliers"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_suppliers');

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
		global $EXPORT, $store_suppliers;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($store_suppliers);
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
					$this->terminate(GetUrl("store_supplierslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
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
		$this->HospID->setVisibility();
		$this->BranchID->setVisibility();
		$this->StoreID->setVisibility();
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
		// Set up Breadcrumb

		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("store_supplierslist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("store_supplierslist.php"); // Return to list
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
		$this->HospID->setDbValue($row['HospID']);
		$this->BranchID->setDbValue($row['BranchID']);
		$this->StoreID->setDbValue($row['StoreID']);
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
		$row['HospID'] = NULL;
		$row['BranchID'] = NULL;
		$row['StoreID'] = NULL;
		return $row;
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
		// HospID
		// BranchID
		// StoreID

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// BranchID
			$this->BranchID->ViewValue = $this->BranchID->CurrentValue;
			$this->BranchID->ViewValue = FormatNumber($this->BranchID->ViewValue, 0, -2, -2, -2);
			$this->BranchID->ViewCustomAttributes = "";

			// StoreID
			$this->StoreID->ViewValue = $this->StoreID->CurrentValue;
			$this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
			$this->StoreID->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// BranchID
			$this->BranchID->LinkCustomAttributes = "";
			$this->BranchID->HrefValue = "";
			$this->BranchID->TooltipValue = "";

			// StoreID
			$this->StoreID->LinkCustomAttributes = "";
			$this->StoreID->HrefValue = "";
			$this->StoreID->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("store_supplierslist.php"), "", $this->TableVar, TRUE);
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
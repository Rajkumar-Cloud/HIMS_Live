<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class depositdetails_delete extends depositdetails
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'depositdetails';

	// Page object name
	public $PageObjName = "depositdetails_delete";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
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
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

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
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
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
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
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
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (depositdetails)
		if (!isset($GLOBALS["depositdetails"]) || get_class($GLOBALS["depositdetails"]) == PROJECT_NAMESPACE . "depositdetails") {
			$GLOBALS["depositdetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["depositdetails"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'depositdetails');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (user_login)
		$UserTable = $UserTable ?: new user_login();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $depositdetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($depositdetails);
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
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
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
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
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

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
	}
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $TotalRecords = 0;
	public $RecordCount;
	public $RecKeys = [];
	public $StartRowCount = 1;
	public $RowCount = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canDelete()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
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
					$this->terminate(GetUrl("depositdetailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->DepositDate->setVisibility();
		$this->DepositToBankSelect->Visible = FALSE;
		$this->DepositToBank->Visible = FALSE;
		$this->TransferToSelect->Visible = FALSE;
		$this->TransferTo->setVisibility();
		$this->OpeningBalance->setVisibility();
		$this->Other->setVisibility();
		$this->TotalCash->setVisibility();
		$this->Cheque->setVisibility();
		$this->Card->setVisibility();
		$this->NEFTRTGS->setVisibility();
		$this->TotalTransferDepositAmount->setVisibility();
		$this->CreatedBy->Visible = FALSE;
		$this->CreatedDateTime->Visible = FALSE;
		$this->ModifiedBy->Visible = FALSE;
		$this->ModifiedDateTime->Visible = FALSE;
		$this->CreatedUserName->setVisibility();
		$this->ModifiedUserName->Visible = FALSE;
		$this->A2000Count->Visible = FALSE;
		$this->A2000Amount->Visible = FALSE;
		$this->A1000Count->Visible = FALSE;
		$this->A1000Amount->Visible = FALSE;
		$this->A500Count->Visible = FALSE;
		$this->A500Amount->Visible = FALSE;
		$this->A200Count->Visible = FALSE;
		$this->A200Amount->Visible = FALSE;
		$this->A100Count->Visible = FALSE;
		$this->A100Amount->Visible = FALSE;
		$this->A50Count->Visible = FALSE;
		$this->A50Amount->Visible = FALSE;
		$this->A20Count->Visible = FALSE;
		$this->A20Amount->Visible = FALSE;
		$this->A10Count->Visible = FALSE;
		$this->A10Amount->Visible = FALSE;
		$this->BalanceAmount->Visible = FALSE;
		$this->CashCollected->setVisibility();
		$this->RTGS->setVisibility();
		$this->PAYTM->setVisibility();
		$this->HospID->Visible = FALSE;
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
		$this->setupLookupOptions($this->DepositToBank);
		$this->setupLookupOptions($this->TransferTo);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("depositdetailslist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("depositdetailslist.php"); // Prevent SQL injection, return to list
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
				$this->TotalRecords = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecords <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("depositdetailslist.php"); // Return to list
			}
		}
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
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
		$conn = $this->getConnection();
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
		$this->DepositDate->setDbValue($row['DepositDate']);
		$this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
		$this->DepositToBank->setDbValue($row['DepositToBank']);
		$this->TransferToSelect->setDbValue($row['TransferToSelect']);
		$this->TransferTo->setDbValue($row['TransferTo']);
		$this->OpeningBalance->setDbValue($row['OpeningBalance']);
		$this->Other->setDbValue($row['Other']);
		$this->TotalCash->setDbValue($row['TotalCash']);
		$this->Cheque->setDbValue($row['Cheque']);
		$this->Card->setDbValue($row['Card']);
		$this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
		$this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->CreatedUserName->setDbValue($row['CreatedUserName']);
		$this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
		$this->A2000Count->setDbValue($row['A2000Count']);
		$this->A2000Amount->setDbValue($row['A2000Amount']);
		$this->A1000Count->setDbValue($row['A1000Count']);
		$this->A1000Amount->setDbValue($row['A1000Amount']);
		$this->A500Count->setDbValue($row['A500Count']);
		$this->A500Amount->setDbValue($row['A500Amount']);
		$this->A200Count->setDbValue($row['A200Count']);
		$this->A200Amount->setDbValue($row['A200Amount']);
		$this->A100Count->setDbValue($row['A100Count']);
		$this->A100Amount->setDbValue($row['A100Amount']);
		$this->A50Count->setDbValue($row['A50Count']);
		$this->A50Amount->setDbValue($row['A50Amount']);
		$this->A20Count->setDbValue($row['A20Count']);
		$this->A20Amount->setDbValue($row['A20Amount']);
		$this->A10Count->setDbValue($row['A10Count']);
		$this->A10Amount->setDbValue($row['A10Amount']);
		$this->BalanceAmount->setDbValue($row['BalanceAmount']);
		$this->CashCollected->setDbValue($row['CashCollected']);
		$this->RTGS->setDbValue($row['RTGS']);
		$this->PAYTM->setDbValue($row['PAYTM']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['DepositDate'] = NULL;
		$row['DepositToBankSelect'] = NULL;
		$row['DepositToBank'] = NULL;
		$row['TransferToSelect'] = NULL;
		$row['TransferTo'] = NULL;
		$row['OpeningBalance'] = NULL;
		$row['Other'] = NULL;
		$row['TotalCash'] = NULL;
		$row['Cheque'] = NULL;
		$row['Card'] = NULL;
		$row['NEFTRTGS'] = NULL;
		$row['TotalTransferDepositAmount'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['ModifiedBy'] = NULL;
		$row['ModifiedDateTime'] = NULL;
		$row['CreatedUserName'] = NULL;
		$row['ModifiedUserName'] = NULL;
		$row['A2000Count'] = NULL;
		$row['A2000Amount'] = NULL;
		$row['A1000Count'] = NULL;
		$row['A1000Amount'] = NULL;
		$row['A500Count'] = NULL;
		$row['A500Amount'] = NULL;
		$row['A200Count'] = NULL;
		$row['A200Amount'] = NULL;
		$row['A100Count'] = NULL;
		$row['A100Amount'] = NULL;
		$row['A50Count'] = NULL;
		$row['A50Amount'] = NULL;
		$row['A20Count'] = NULL;
		$row['A20Amount'] = NULL;
		$row['A10Count'] = NULL;
		$row['A10Amount'] = NULL;
		$row['BalanceAmount'] = NULL;
		$row['CashCollected'] = NULL;
		$row['RTGS'] = NULL;
		$row['PAYTM'] = NULL;
		$row['HospID'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue)))
			$this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue)))
			$this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue)))
			$this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue)))
			$this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue)))
			$this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue)))
			$this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue)))
			$this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue)))
			$this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue)))
			$this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// DepositDate
		// DepositToBankSelect
		// DepositToBank
		// TransferToSelect
		// TransferTo
		// OpeningBalance
		// Other
		// TotalCash
		// Cheque
		// Card
		// NEFTRTGS
		// TotalTransferDepositAmount
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// CreatedUserName
		// ModifiedUserName
		// A2000Count
		// A2000Amount
		// A1000Count
		// A1000Amount
		// A500Count
		// A500Amount
		// A200Count
		// A200Amount
		// A100Count
		// A100Amount
		// A50Count
		// A50Amount
		// A20Count
		// A20Amount
		// A10Count
		// A10Amount
		// BalanceAmount
		// CashCollected
		// RTGS
		// PAYTM
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// DepositDate
			$this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
			$this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 7);
			$this->DepositDate->ViewCustomAttributes = "";

			// DepositToBankSelect
			if (strval($this->DepositToBankSelect->CurrentValue) != "") {
				$this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->optionCaption($this->DepositToBankSelect->CurrentValue);
			} else {
				$this->DepositToBankSelect->ViewValue = NULL;
			}
			$this->DepositToBankSelect->ViewCustomAttributes = "";

			// DepositToBank
			$curVal = strval($this->DepositToBank->CurrentValue);
			if ($curVal != "") {
				$this->DepositToBank->ViewValue = $this->DepositToBank->lookupCacheOption($curVal);
				if ($this->DepositToBank->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Branch_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DepositToBank->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->DepositToBank->ViewValue = $this->DepositToBank->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
					}
				}
			} else {
				$this->DepositToBank->ViewValue = NULL;
			}
			$this->DepositToBank->ViewCustomAttributes = "";

			// TransferToSelect
			$this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
			$this->TransferToSelect->ViewCustomAttributes = "";

			// TransferTo
			$curVal = strval($this->TransferTo->CurrentValue);
			if ($curVal != "") {
				$this->TransferTo->ViewValue = $this->TransferTo->lookupCacheOption($curVal);
				if ($this->TransferTo->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TransferTo->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TransferTo->ViewValue = $this->TransferTo->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
					}
				}
			} else {
				$this->TransferTo->ViewValue = NULL;
			}
			$this->TransferTo->ViewCustomAttributes = "";

			// OpeningBalance
			$this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
			$this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
			$this->OpeningBalance->ViewCustomAttributes = "";

			// Other
			$this->Other->ViewValue = $this->Other->CurrentValue;
			$this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
			$this->Other->ViewCustomAttributes = "";

			// TotalCash
			$this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
			$this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
			$this->TotalCash->ViewCustomAttributes = "";

			// Cheque
			$this->Cheque->ViewValue = $this->Cheque->CurrentValue;
			$this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
			$this->Cheque->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// NEFTRTGS
			$this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
			$this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
			$this->NEFTRTGS->ViewCustomAttributes = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
			$this->TotalTransferDepositAmount->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// CreatedUserName
			$this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
			$this->CreatedUserName->ViewCustomAttributes = "";

			// ModifiedUserName
			$this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
			$this->ModifiedUserName->ViewCustomAttributes = "";

			// A2000Count
			$this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
			$this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
			$this->A2000Count->ViewCustomAttributes = "";

			// A2000Amount
			$this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
			$this->A2000Amount->ViewValue = FormatCurrency($this->A2000Amount->ViewValue, 2, -2, -2, -2);
			$this->A2000Amount->ViewCustomAttributes = "";

			// A1000Count
			$this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
			$this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
			$this->A1000Count->ViewCustomAttributes = "";

			// A1000Amount
			$this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
			$this->A1000Amount->ViewValue = FormatCurrency($this->A1000Amount->ViewValue, 2, -2, -2, -2);
			$this->A1000Amount->ViewCustomAttributes = "";

			// A500Count
			$this->A500Count->ViewValue = $this->A500Count->CurrentValue;
			$this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
			$this->A500Count->ViewCustomAttributes = "";

			// A500Amount
			$this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
			$this->A500Amount->ViewValue = FormatCurrency($this->A500Amount->ViewValue, 2, -2, -2, -2);
			$this->A500Amount->ViewCustomAttributes = "";

			// A200Count
			$this->A200Count->ViewValue = $this->A200Count->CurrentValue;
			$this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
			$this->A200Count->ViewCustomAttributes = "";

			// A200Amount
			$this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
			$this->A200Amount->ViewValue = FormatCurrency($this->A200Amount->ViewValue, 2, -2, -2, -2);
			$this->A200Amount->ViewCustomAttributes = "";

			// A100Count
			$this->A100Count->ViewValue = $this->A100Count->CurrentValue;
			$this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
			$this->A100Count->ViewCustomAttributes = "";

			// A100Amount
			$this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
			$this->A100Amount->ViewValue = FormatCurrency($this->A100Amount->ViewValue, 2, -2, -2, -2);
			$this->A100Amount->ViewCustomAttributes = "";

			// A50Count
			$this->A50Count->ViewValue = $this->A50Count->CurrentValue;
			$this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
			$this->A50Count->ViewCustomAttributes = "";

			// A50Amount
			$this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
			$this->A50Amount->ViewValue = FormatCurrency($this->A50Amount->ViewValue, 2, -2, -2, -2);
			$this->A50Amount->ViewCustomAttributes = "";

			// A20Count
			$this->A20Count->ViewValue = $this->A20Count->CurrentValue;
			$this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
			$this->A20Count->ViewCustomAttributes = "";

			// A20Amount
			$this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
			$this->A20Amount->ViewValue = FormatCurrency($this->A20Amount->ViewValue, 2, -2, -2, -2);
			$this->A20Amount->ViewCustomAttributes = "";

			// A10Count
			$this->A10Count->ViewValue = $this->A10Count->CurrentValue;
			$this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
			$this->A10Count->ViewCustomAttributes = "";

			// A10Amount
			$this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
			$this->A10Amount->ViewValue = FormatCurrency($this->A10Amount->ViewValue, 2, -2, -2, -2);
			$this->A10Amount->ViewCustomAttributes = "";

			// BalanceAmount
			$this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
			$this->BalanceAmount->ViewValue = FormatCurrency($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
			$this->BalanceAmount->ViewCustomAttributes = "";

			// CashCollected
			$this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
			$this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
			$this->CashCollected->ViewCustomAttributes = "";

			// RTGS
			$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
			$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
			$this->RTGS->ViewCustomAttributes = "";

			// PAYTM
			$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
			$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
			$this->PAYTM->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// DepositDate
			$this->DepositDate->LinkCustomAttributes = "";
			$this->DepositDate->HrefValue = "";
			$this->DepositDate->TooltipValue = "";

			// TransferTo
			$this->TransferTo->LinkCustomAttributes = "";
			$this->TransferTo->HrefValue = "";
			$this->TransferTo->TooltipValue = "";

			// OpeningBalance
			$this->OpeningBalance->LinkCustomAttributes = "";
			$this->OpeningBalance->HrefValue = "";
			$this->OpeningBalance->TooltipValue = "";

			// Other
			$this->Other->LinkCustomAttributes = "";
			$this->Other->HrefValue = "";
			$this->Other->TooltipValue = "";

			// TotalCash
			$this->TotalCash->LinkCustomAttributes = "";
			$this->TotalCash->HrefValue = "";
			$this->TotalCash->TooltipValue = "";

			// Cheque
			$this->Cheque->LinkCustomAttributes = "";
			$this->Cheque->HrefValue = "";
			$this->Cheque->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";

			// NEFTRTGS
			$this->NEFTRTGS->LinkCustomAttributes = "";
			$this->NEFTRTGS->HrefValue = "";
			$this->NEFTRTGS->TooltipValue = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->LinkCustomAttributes = "";
			$this->TotalTransferDepositAmount->HrefValue = "";
			$this->TotalTransferDepositAmount->TooltipValue = "";

			// CreatedUserName
			$this->CreatedUserName->LinkCustomAttributes = "";
			$this->CreatedUserName->HrefValue = "";
			$this->CreatedUserName->TooltipValue = "";

			// CashCollected
			$this->CashCollected->LinkCustomAttributes = "";
			$this->CashCollected->HrefValue = "";
			$this->CashCollected->TooltipValue = "";

			// RTGS
			$this->RTGS->LinkCustomAttributes = "";
			$this->RTGS->HrefValue = "";
			$this->RTGS->TooltipValue = "";

			// PAYTM
			$this->PAYTM->LinkCustomAttributes = "";
			$this->PAYTM->HrefValue = "";
			$this->PAYTM->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
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
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
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
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("depositdetailslist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_DepositToBankSelect":
					break;
				case "x_DepositToBank":
					break;
				case "x_TransferTo":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_DepositToBank":
							break;
						case "x_TransferTo":
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
} // End class
?>
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class monitor_treatment_plan_delete extends monitor_treatment_plan
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'monitor_treatment_plan';

	// Page object name
	public $PageObjName = "monitor_treatment_plan_delete";

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

		// Table object (monitor_treatment_plan)
		if (!isset($GLOBALS["monitor_treatment_plan"]) || get_class($GLOBALS["monitor_treatment_plan"]) == PROJECT_NAMESPACE . "monitor_treatment_plan") {
			$GLOBALS["monitor_treatment_plan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["monitor_treatment_plan"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'monitor_treatment_plan');

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
		global $monitor_treatment_plan;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($monitor_treatment_plan);
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
					$this->terminate(GetUrl("monitor_treatment_planlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PatId->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->MobileNo->setVisibility();
		$this->ConsultantName->setVisibility();
		$this->RefDrName->setVisibility();
		$this->RefDrMobileNo->setVisibility();
		$this->NewVisitDate->setVisibility();
		$this->NewVisitYesNo->setVisibility();
		$this->Treatment->setVisibility();
		$this->IUIDoneDate1->setVisibility();
		$this->IUIDoneYesNo1->setVisibility();
		$this->UPTTestDate1->setVisibility();
		$this->UPTTestYesNo1->setVisibility();
		$this->IUIDoneDate2->setVisibility();
		$this->IUIDoneYesNo2->setVisibility();
		$this->UPTTestDate2->setVisibility();
		$this->UPTTestYesNo2->setVisibility();
		$this->IUIDoneDate3->setVisibility();
		$this->IUIDoneYesNo3->setVisibility();
		$this->UPTTestDate3->setVisibility();
		$this->UPTTestYesNo3->setVisibility();
		$this->IUIDoneDate4->setVisibility();
		$this->IUIDoneYesNo4->setVisibility();
		$this->UPTTestDate4->setVisibility();
		$this->UPTTestYesNo4->setVisibility();
		$this->IVFStimulationDate->setVisibility();
		$this->IVFStimulationYesNo->setVisibility();
		$this->OPUDate->setVisibility();
		$this->OPUYesNo->setVisibility();
		$this->ETDate->setVisibility();
		$this->ETYesNo->setVisibility();
		$this->BetaHCGDate->setVisibility();
		$this->BetaHCGYesNo->setVisibility();
		$this->FETDate->setVisibility();
		$this->FETYesNo->setVisibility();
		$this->FBetaHCGDate->setVisibility();
		$this->FBetaHCGYesNo->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->HospID->setVisibility();
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
		$this->setupLookupOptions($this->PatId);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("monitor_treatment_planlist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("monitor_treatment_planlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("monitor_treatment_planlist.php"); // Return to list
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
		$this->PatId->setDbValue($row['PatId']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->MobileNo->setDbValue($row['MobileNo']);
		$this->ConsultantName->setDbValue($row['ConsultantName']);
		$this->RefDrName->setDbValue($row['RefDrName']);
		$this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
		$this->NewVisitDate->setDbValue($row['NewVisitDate']);
		$this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
		$this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
		$this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
		$this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
		$this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
		$this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
		$this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
		$this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
		$this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
		$this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
		$this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
		$this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
		$this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
		$this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
		$this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
		$this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
		$this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
		$this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
		$this->OPUDate->setDbValue($row['OPUDate']);
		$this->OPUYesNo->setDbValue($row['OPUYesNo']);
		$this->ETDate->setDbValue($row['ETDate']);
		$this->ETYesNo->setDbValue($row['ETYesNo']);
		$this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
		$this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
		$this->FETDate->setDbValue($row['FETDate']);
		$this->FETYesNo->setDbValue($row['FETYesNo']);
		$this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
		$this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatId'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['Age'] = NULL;
		$row['MobileNo'] = NULL;
		$row['ConsultantName'] = NULL;
		$row['RefDrName'] = NULL;
		$row['RefDrMobileNo'] = NULL;
		$row['NewVisitDate'] = NULL;
		$row['NewVisitYesNo'] = NULL;
		$row['Treatment'] = NULL;
		$row['IUIDoneDate1'] = NULL;
		$row['IUIDoneYesNo1'] = NULL;
		$row['UPTTestDate1'] = NULL;
		$row['UPTTestYesNo1'] = NULL;
		$row['IUIDoneDate2'] = NULL;
		$row['IUIDoneYesNo2'] = NULL;
		$row['UPTTestDate2'] = NULL;
		$row['UPTTestYesNo2'] = NULL;
		$row['IUIDoneDate3'] = NULL;
		$row['IUIDoneYesNo3'] = NULL;
		$row['UPTTestDate3'] = NULL;
		$row['UPTTestYesNo3'] = NULL;
		$row['IUIDoneDate4'] = NULL;
		$row['IUIDoneYesNo4'] = NULL;
		$row['UPTTestDate4'] = NULL;
		$row['UPTTestYesNo4'] = NULL;
		$row['IVFStimulationDate'] = NULL;
		$row['IVFStimulationYesNo'] = NULL;
		$row['OPUDate'] = NULL;
		$row['OPUYesNo'] = NULL;
		$row['ETDate'] = NULL;
		$row['ETYesNo'] = NULL;
		$row['BetaHCGDate'] = NULL;
		$row['BetaHCGYesNo'] = NULL;
		$row['FETDate'] = NULL;
		$row['FETYesNo'] = NULL;
		$row['FBetaHCGDate'] = NULL;
		$row['FBetaHCGYesNo'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['HospID'] = NULL;
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
		// id
		// PatId
		// PatientId
		// PatientName
		// Age
		// MobileNo
		// ConsultantName
		// RefDrName
		// RefDrMobileNo
		// NewVisitDate
		// NewVisitYesNo
		// Treatment
		// IUIDoneDate1
		// IUIDoneYesNo1
		// UPTTestDate1
		// UPTTestYesNo1
		// IUIDoneDate2
		// IUIDoneYesNo2
		// UPTTestDate2
		// UPTTestYesNo2
		// IUIDoneDate3
		// IUIDoneYesNo3
		// UPTTestDate3
		// UPTTestYesNo3
		// IUIDoneDate4
		// IUIDoneYesNo4
		// UPTTestDate4
		// UPTTestYesNo4
		// IVFStimulationDate
		// IVFStimulationYesNo
		// OPUDate
		// OPUYesNo
		// ETDate
		// ETYesNo
		// BetaHCGDate
		// BetaHCGYesNo
		// FETDate
		// FETYesNo
		// FBetaHCGDate
		// FBetaHCGYesNo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatId
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal != "") {
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->ViewValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->ViewValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// MobileNo
			$this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
			$this->MobileNo->ViewCustomAttributes = "";

			// ConsultantName
			$this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
			$this->ConsultantName->ViewCustomAttributes = "";

			// RefDrName
			$this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
			$this->RefDrName->ViewCustomAttributes = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
			$this->RefDrMobileNo->ViewCustomAttributes = "";

			// NewVisitDate
			$this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
			$this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 7);
			$this->NewVisitDate->ViewCustomAttributes = "";

			// NewVisitYesNo
			if (strval($this->NewVisitYesNo->CurrentValue) != "") {
				$this->NewVisitYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->NewVisitYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->NewVisitYesNo->ViewValue->add($this->NewVisitYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->NewVisitYesNo->ViewValue = NULL;
			}
			$this->NewVisitYesNo->ViewCustomAttributes = "";

			// Treatment
			if (strval($this->Treatment->CurrentValue) != "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
			$this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 7);
			$this->IUIDoneDate1->ViewCustomAttributes = "";

			// IUIDoneYesNo1
			if (strval($this->IUIDoneYesNo1->CurrentValue) != "") {
				$this->IUIDoneYesNo1->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo1->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo1->ViewValue->add($this->IUIDoneYesNo1->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo1->ViewValue = NULL;
			}
			$this->IUIDoneYesNo1->ViewCustomAttributes = "";

			// UPTTestDate1
			$this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
			$this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 7);
			$this->UPTTestDate1->ViewCustomAttributes = "";

			// UPTTestYesNo1
			if (strval($this->UPTTestYesNo1->CurrentValue) != "") {
				$this->UPTTestYesNo1->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo1->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo1->ViewValue->add($this->UPTTestYesNo1->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo1->ViewValue = NULL;
			}
			$this->UPTTestYesNo1->ViewCustomAttributes = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
			$this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 7);
			$this->IUIDoneDate2->ViewCustomAttributes = "";

			// IUIDoneYesNo2
			if (strval($this->IUIDoneYesNo2->CurrentValue) != "") {
				$this->IUIDoneYesNo2->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo2->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo2->ViewValue->add($this->IUIDoneYesNo2->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo2->ViewValue = NULL;
			}
			$this->IUIDoneYesNo2->ViewCustomAttributes = "";

			// UPTTestDate2
			$this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
			$this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 7);
			$this->UPTTestDate2->ViewCustomAttributes = "";

			// UPTTestYesNo2
			if (strval($this->UPTTestYesNo2->CurrentValue) != "") {
				$this->UPTTestYesNo2->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo2->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo2->ViewValue->add($this->UPTTestYesNo2->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo2->ViewValue = NULL;
			}
			$this->UPTTestYesNo2->ViewCustomAttributes = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
			$this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 7);
			$this->IUIDoneDate3->ViewCustomAttributes = "";

			// IUIDoneYesNo3
			if (strval($this->IUIDoneYesNo3->CurrentValue) != "") {
				$this->IUIDoneYesNo3->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo3->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo3->ViewValue->add($this->IUIDoneYesNo3->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo3->ViewValue = NULL;
			}
			$this->IUIDoneYesNo3->ViewCustomAttributes = "";

			// UPTTestDate3
			$this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
			$this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 7);
			$this->UPTTestDate3->ViewCustomAttributes = "";

			// UPTTestYesNo3
			if (strval($this->UPTTestYesNo3->CurrentValue) != "") {
				$this->UPTTestYesNo3->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo3->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo3->ViewValue->add($this->UPTTestYesNo3->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo3->ViewValue = NULL;
			}
			$this->UPTTestYesNo3->ViewCustomAttributes = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
			$this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 7);
			$this->IUIDoneDate4->ViewCustomAttributes = "";

			// IUIDoneYesNo4
			if (strval($this->IUIDoneYesNo4->CurrentValue) != "") {
				$this->IUIDoneYesNo4->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo4->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo4->ViewValue->add($this->IUIDoneYesNo4->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo4->ViewValue = NULL;
			}
			$this->IUIDoneYesNo4->ViewCustomAttributes = "";

			// UPTTestDate4
			$this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
			$this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 7);
			$this->UPTTestDate4->ViewCustomAttributes = "";

			// UPTTestYesNo4
			if (strval($this->UPTTestYesNo4->CurrentValue) != "") {
				$this->UPTTestYesNo4->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo4->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo4->ViewValue->add($this->UPTTestYesNo4->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo4->ViewValue = NULL;
			}
			$this->UPTTestYesNo4->ViewCustomAttributes = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
			$this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 7);
			$this->IVFStimulationDate->ViewCustomAttributes = "";

			// IVFStimulationYesNo
			if (strval($this->IVFStimulationYesNo->CurrentValue) != "") {
				$this->IVFStimulationYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IVFStimulationYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IVFStimulationYesNo->ViewValue->add($this->IVFStimulationYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IVFStimulationYesNo->ViewValue = NULL;
			}
			$this->IVFStimulationYesNo->ViewCustomAttributes = "";

			// OPUDate
			$this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
			$this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 7);
			$this->OPUDate->ViewCustomAttributes = "";

			// OPUYesNo
			if (strval($this->OPUYesNo->CurrentValue) != "") {
				$this->OPUYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OPUYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OPUYesNo->ViewValue->add($this->OPUYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OPUYesNo->ViewValue = NULL;
			}
			$this->OPUYesNo->ViewCustomAttributes = "";

			// ETDate
			$this->ETDate->ViewValue = $this->ETDate->CurrentValue;
			$this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 7);
			$this->ETDate->ViewCustomAttributes = "";

			// ETYesNo
			if (strval($this->ETYesNo->CurrentValue) != "") {
				$this->ETYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ETYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ETYesNo->ViewValue->add($this->ETYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ETYesNo->ViewValue = NULL;
			}
			$this->ETYesNo->ViewCustomAttributes = "";

			// BetaHCGDate
			$this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
			$this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 7);
			$this->BetaHCGDate->ViewCustomAttributes = "";

			// BetaHCGYesNo
			if (strval($this->BetaHCGYesNo->CurrentValue) != "") {
				$this->BetaHCGYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->BetaHCGYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->BetaHCGYesNo->ViewValue->add($this->BetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->BetaHCGYesNo->ViewValue = NULL;
			}
			$this->BetaHCGYesNo->ViewCustomAttributes = "";

			// FETDate
			$this->FETDate->ViewValue = $this->FETDate->CurrentValue;
			$this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 7);
			$this->FETDate->ViewCustomAttributes = "";

			// FETYesNo
			if (strval($this->FETYesNo->CurrentValue) != "") {
				$this->FETYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FETYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FETYesNo->ViewValue->add($this->FETYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FETYesNo->ViewValue = NULL;
			}
			$this->FETYesNo->ViewCustomAttributes = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
			$this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 7);
			$this->FBetaHCGDate->ViewCustomAttributes = "";

			// FBetaHCGYesNo
			if (strval($this->FBetaHCGYesNo->CurrentValue) != "") {
				$this->FBetaHCGYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FBetaHCGYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FBetaHCGYesNo->ViewValue->add($this->FBetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FBetaHCGYesNo->ViewValue = NULL;
			}
			$this->FBetaHCGYesNo->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// MobileNo
			$this->MobileNo->LinkCustomAttributes = "";
			$this->MobileNo->HrefValue = "";
			$this->MobileNo->TooltipValue = "";

			// ConsultantName
			$this->ConsultantName->LinkCustomAttributes = "";
			$this->ConsultantName->HrefValue = "";
			$this->ConsultantName->TooltipValue = "";

			// RefDrName
			$this->RefDrName->LinkCustomAttributes = "";
			$this->RefDrName->HrefValue = "";
			$this->RefDrName->TooltipValue = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->LinkCustomAttributes = "";
			$this->RefDrMobileNo->HrefValue = "";
			$this->RefDrMobileNo->TooltipValue = "";

			// NewVisitDate
			$this->NewVisitDate->LinkCustomAttributes = "";
			$this->NewVisitDate->HrefValue = "";
			$this->NewVisitDate->TooltipValue = "";

			// NewVisitYesNo
			$this->NewVisitYesNo->LinkCustomAttributes = "";
			$this->NewVisitYesNo->HrefValue = "";
			$this->NewVisitYesNo->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->LinkCustomAttributes = "";
			$this->IUIDoneDate1->HrefValue = "";
			$this->IUIDoneDate1->TooltipValue = "";

			// IUIDoneYesNo1
			$this->IUIDoneYesNo1->LinkCustomAttributes = "";
			$this->IUIDoneYesNo1->HrefValue = "";
			$this->IUIDoneYesNo1->TooltipValue = "";

			// UPTTestDate1
			$this->UPTTestDate1->LinkCustomAttributes = "";
			$this->UPTTestDate1->HrefValue = "";
			$this->UPTTestDate1->TooltipValue = "";

			// UPTTestYesNo1
			$this->UPTTestYesNo1->LinkCustomAttributes = "";
			$this->UPTTestYesNo1->HrefValue = "";
			$this->UPTTestYesNo1->TooltipValue = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->LinkCustomAttributes = "";
			$this->IUIDoneDate2->HrefValue = "";
			$this->IUIDoneDate2->TooltipValue = "";

			// IUIDoneYesNo2
			$this->IUIDoneYesNo2->LinkCustomAttributes = "";
			$this->IUIDoneYesNo2->HrefValue = "";
			$this->IUIDoneYesNo2->TooltipValue = "";

			// UPTTestDate2
			$this->UPTTestDate2->LinkCustomAttributes = "";
			$this->UPTTestDate2->HrefValue = "";
			$this->UPTTestDate2->TooltipValue = "";

			// UPTTestYesNo2
			$this->UPTTestYesNo2->LinkCustomAttributes = "";
			$this->UPTTestYesNo2->HrefValue = "";
			$this->UPTTestYesNo2->TooltipValue = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->LinkCustomAttributes = "";
			$this->IUIDoneDate3->HrefValue = "";
			$this->IUIDoneDate3->TooltipValue = "";

			// IUIDoneYesNo3
			$this->IUIDoneYesNo3->LinkCustomAttributes = "";
			$this->IUIDoneYesNo3->HrefValue = "";
			$this->IUIDoneYesNo3->TooltipValue = "";

			// UPTTestDate3
			$this->UPTTestDate3->LinkCustomAttributes = "";
			$this->UPTTestDate3->HrefValue = "";
			$this->UPTTestDate3->TooltipValue = "";

			// UPTTestYesNo3
			$this->UPTTestYesNo3->LinkCustomAttributes = "";
			$this->UPTTestYesNo3->HrefValue = "";
			$this->UPTTestYesNo3->TooltipValue = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->LinkCustomAttributes = "";
			$this->IUIDoneDate4->HrefValue = "";
			$this->IUIDoneDate4->TooltipValue = "";

			// IUIDoneYesNo4
			$this->IUIDoneYesNo4->LinkCustomAttributes = "";
			$this->IUIDoneYesNo4->HrefValue = "";
			$this->IUIDoneYesNo4->TooltipValue = "";

			// UPTTestDate4
			$this->UPTTestDate4->LinkCustomAttributes = "";
			$this->UPTTestDate4->HrefValue = "";
			$this->UPTTestDate4->TooltipValue = "";

			// UPTTestYesNo4
			$this->UPTTestYesNo4->LinkCustomAttributes = "";
			$this->UPTTestYesNo4->HrefValue = "";
			$this->UPTTestYesNo4->TooltipValue = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->LinkCustomAttributes = "";
			$this->IVFStimulationDate->HrefValue = "";
			$this->IVFStimulationDate->TooltipValue = "";

			// IVFStimulationYesNo
			$this->IVFStimulationYesNo->LinkCustomAttributes = "";
			$this->IVFStimulationYesNo->HrefValue = "";
			$this->IVFStimulationYesNo->TooltipValue = "";

			// OPUDate
			$this->OPUDate->LinkCustomAttributes = "";
			$this->OPUDate->HrefValue = "";
			$this->OPUDate->TooltipValue = "";

			// OPUYesNo
			$this->OPUYesNo->LinkCustomAttributes = "";
			$this->OPUYesNo->HrefValue = "";
			$this->OPUYesNo->TooltipValue = "";

			// ETDate
			$this->ETDate->LinkCustomAttributes = "";
			$this->ETDate->HrefValue = "";
			$this->ETDate->TooltipValue = "";

			// ETYesNo
			$this->ETYesNo->LinkCustomAttributes = "";
			$this->ETYesNo->HrefValue = "";
			$this->ETYesNo->TooltipValue = "";

			// BetaHCGDate
			$this->BetaHCGDate->LinkCustomAttributes = "";
			$this->BetaHCGDate->HrefValue = "";
			$this->BetaHCGDate->TooltipValue = "";

			// BetaHCGYesNo
			$this->BetaHCGYesNo->LinkCustomAttributes = "";
			$this->BetaHCGYesNo->HrefValue = "";
			$this->BetaHCGYesNo->TooltipValue = "";

			// FETDate
			$this->FETDate->LinkCustomAttributes = "";
			$this->FETDate->HrefValue = "";
			$this->FETDate->TooltipValue = "";

			// FETYesNo
			$this->FETYesNo->LinkCustomAttributes = "";
			$this->FETYesNo->HrefValue = "";
			$this->FETYesNo->TooltipValue = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->LinkCustomAttributes = "";
			$this->FBetaHCGDate->HrefValue = "";
			$this->FBetaHCGDate->TooltipValue = "";

			// FBetaHCGYesNo
			$this->FBetaHCGYesNo->LinkCustomAttributes = "";
			$this->FBetaHCGYesNo->HrefValue = "";
			$this->FBetaHCGYesNo->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("monitor_treatment_planlist.php"), "", $this->TableVar, TRUE);
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
				case "x_PatId":
					break;
				case "x_NewVisitYesNo":
					break;
				case "x_Treatment":
					break;
				case "x_IUIDoneYesNo1":
					break;
				case "x_UPTTestYesNo1":
					break;
				case "x_IUIDoneYesNo2":
					break;
				case "x_UPTTestYesNo2":
					break;
				case "x_IUIDoneYesNo3":
					break;
				case "x_UPTTestYesNo3":
					break;
				case "x_IUIDoneYesNo4":
					break;
				case "x_UPTTestYesNo4":
					break;
				case "x_IVFStimulationYesNo":
					break;
				case "x_OPUYesNo":
					break;
				case "x_ETYesNo":
					break;
				case "x_BetaHCGYesNo":
					break;
				case "x_FETYesNo":
					break;
				case "x_FBetaHCGYesNo":
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
						case "x_PatId":
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
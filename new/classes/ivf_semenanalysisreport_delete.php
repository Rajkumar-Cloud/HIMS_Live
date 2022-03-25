<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_semenanalysisreport_delete extends ivf_semenanalysisreport
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_semenanalysisreport';

	// Page object name
	public $PageObjName = "ivf_semenanalysisreport_delete";

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

		// Table object (ivf_semenanalysisreport)
		if (!isset($GLOBALS["ivf_semenanalysisreport"]) || get_class($GLOBALS["ivf_semenanalysisreport"]) == PROJECT_NAMESPACE . "ivf_semenanalysisreport") {
			$GLOBALS["ivf_semenanalysisreport"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_semenanalysisreport"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS['view_ivf_treatment']))
			$GLOBALS['view_ivf_treatment'] = new view_ivf_treatment();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_semenanalysisreport');

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
		global $ivf_semenanalysisreport;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_semenanalysisreport);
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
					$this->terminate(GetUrl("ivf_semenanalysisreportlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->PatientName->setVisibility();
		$this->HusbandName->setVisibility();
		$this->RequestDr->setVisibility();
		$this->CollectionDate->setVisibility();
		$this->ResultDate->setVisibility();
		$this->RequestSample->setVisibility();
		$this->CollectionType->setVisibility();
		$this->CollectionMethod->setVisibility();
		$this->Medicationused->setVisibility();
		$this->DifficultiesinCollection->setVisibility();
		$this->pH->setVisibility();
		$this->Timeofcollection->setVisibility();
		$this->Timeofexamination->setVisibility();
		$this->Volume->setVisibility();
		$this->Concentration->setVisibility();
		$this->Total->setVisibility();
		$this->ProgressiveMotility->setVisibility();
		$this->NonProgrssiveMotile->setVisibility();
		$this->Immotile->setVisibility();
		$this->TotalProgrssiveMotile->setVisibility();
		$this->Appearance->setVisibility();
		$this->Homogenosity->setVisibility();
		$this->CompleteSample->setVisibility();
		$this->Liquefactiontime->setVisibility();
		$this->Normal->setVisibility();
		$this->Abnormal->setVisibility();
		$this->Headdefects->setVisibility();
		$this->MidpieceDefects->setVisibility();
		$this->TailDefects->setVisibility();
		$this->NormalProgMotile->setVisibility();
		$this->ImmatureForms->setVisibility();
		$this->Leucocytes->setVisibility();
		$this->Agglutination->setVisibility();
		$this->Debris->setVisibility();
		$this->Diagnosis->setVisibility();
		$this->Observations->setVisibility();
		$this->Signature->setVisibility();
		$this->SemenOrgin->setVisibility();
		$this->Donor->setVisibility();
		$this->DonorBloodgroup->setVisibility();
		$this->Tank->setVisibility();
		$this->Location->setVisibility();
		$this->Volume1->setVisibility();
		$this->Concentration1->setVisibility();
		$this->Total1->setVisibility();
		$this->ProgressiveMotility1->setVisibility();
		$this->NonProgrssiveMotile1->setVisibility();
		$this->Immotile1->setVisibility();
		$this->TotalProgrssiveMotile1->setVisibility();
		$this->TidNo->setVisibility();
		$this->Color->setVisibility();
		$this->DoneBy->setVisibility();
		$this->Method->setVisibility();
		$this->Abstinence->setVisibility();
		$this->ProcessedBy->setVisibility();
		$this->InseminationTime->setVisibility();
		$this->InseminationBy->setVisibility();
		$this->Big->setVisibility();
		$this->Medium->setVisibility();
		$this->Small->setVisibility();
		$this->NoHalo->setVisibility();
		$this->Fragmented->setVisibility();
		$this->NonFragmented->setVisibility();
		$this->DFI->setVisibility();
		$this->IsueBy->setVisibility();
		$this->Volume2->setVisibility();
		$this->Concentration2->setVisibility();
		$this->Total2->setVisibility();
		$this->ProgressiveMotility2->setVisibility();
		$this->NonProgrssiveMotile2->setVisibility();
		$this->Immotile2->setVisibility();
		$this->TotalProgrssiveMotile2->setVisibility();
		$this->MACS->Visible = FALSE;
		$this->IssuedBy->setVisibility();
		$this->IssuedTo->setVisibility();
		$this->PaID->setVisibility();
		$this->PaName->setVisibility();
		$this->PaMobile->setVisibility();
		$this->PartnerID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerMobile->setVisibility();
		$this->PREG_TEST_DATE->setVisibility();
		$this->SPECIFIC_PROBLEMS->setVisibility();
		$this->IMSC_1->setVisibility();
		$this->IMSC_2->setVisibility();
		$this->LIQUIFACTION_STORAGE->setVisibility();
		$this->IUI_PREP_METHOD->setVisibility();
		$this->TIME_FROM_TRIGGER->setVisibility();
		$this->COLLECTION_TO_PREPARATION->setVisibility();
		$this->TIME_FROM_PREP_TO_INSEM->setVisibility();
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
		$this->setupLookupOptions($this->Donor);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_semenanalysisreportlist.php");
			return;
		}

		// Set up master/detail parameters
		$this->setupMasterParms();

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivf_semenanalysisreportlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("ivf_semenanalysisreportlist.php"); // Return to list
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->HusbandName->setDbValue($row['HusbandName']);
		$this->RequestDr->setDbValue($row['RequestDr']);
		$this->CollectionDate->setDbValue($row['CollectionDate']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->RequestSample->setDbValue($row['RequestSample']);
		$this->CollectionType->setDbValue($row['CollectionType']);
		$this->CollectionMethod->setDbValue($row['CollectionMethod']);
		$this->Medicationused->setDbValue($row['Medicationused']);
		$this->DifficultiesinCollection->setDbValue($row['DifficultiesinCollection']);
		$this->pH->setDbValue($row['pH']);
		$this->Timeofcollection->setDbValue($row['Timeofcollection']);
		$this->Timeofexamination->setDbValue($row['Timeofexamination']);
		$this->Volume->setDbValue($row['Volume']);
		$this->Concentration->setDbValue($row['Concentration']);
		$this->Total->setDbValue($row['Total']);
		$this->ProgressiveMotility->setDbValue($row['ProgressiveMotility']);
		$this->NonProgrssiveMotile->setDbValue($row['NonProgrssiveMotile']);
		$this->Immotile->setDbValue($row['Immotile']);
		$this->TotalProgrssiveMotile->setDbValue($row['TotalProgrssiveMotile']);
		$this->Appearance->setDbValue($row['Appearance']);
		$this->Homogenosity->setDbValue($row['Homogenosity']);
		$this->CompleteSample->setDbValue($row['CompleteSample']);
		$this->Liquefactiontime->setDbValue($row['Liquefactiontime']);
		$this->Normal->setDbValue($row['Normal']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->Headdefects->setDbValue($row['Headdefects']);
		$this->MidpieceDefects->setDbValue($row['MidpieceDefects']);
		$this->TailDefects->setDbValue($row['TailDefects']);
		$this->NormalProgMotile->setDbValue($row['NormalProgMotile']);
		$this->ImmatureForms->setDbValue($row['ImmatureForms']);
		$this->Leucocytes->setDbValue($row['Leucocytes']);
		$this->Agglutination->setDbValue($row['Agglutination']);
		$this->Debris->setDbValue($row['Debris']);
		$this->Diagnosis->setDbValue($row['Diagnosis']);
		$this->Observations->setDbValue($row['Observations']);
		$this->Signature->setDbValue($row['Signature']);
		$this->SemenOrgin->setDbValue($row['SemenOrgin']);
		$this->Donor->setDbValue($row['Donor']);
		$this->DonorBloodgroup->setDbValue($row['DonorBloodgroup']);
		$this->Tank->setDbValue($row['Tank']);
		$this->Location->setDbValue($row['Location']);
		$this->Volume1->setDbValue($row['Volume1']);
		$this->Concentration1->setDbValue($row['Concentration1']);
		$this->Total1->setDbValue($row['Total1']);
		$this->ProgressiveMotility1->setDbValue($row['ProgressiveMotility1']);
		$this->NonProgrssiveMotile1->setDbValue($row['NonProgrssiveMotile1']);
		$this->Immotile1->setDbValue($row['Immotile1']);
		$this->TotalProgrssiveMotile1->setDbValue($row['TotalProgrssiveMotile1']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Color->setDbValue($row['Color']);
		$this->DoneBy->setDbValue($row['DoneBy']);
		$this->Method->setDbValue($row['Method']);
		$this->Abstinence->setDbValue($row['Abstinence']);
		$this->ProcessedBy->setDbValue($row['ProcessedBy']);
		$this->InseminationTime->setDbValue($row['InseminationTime']);
		$this->InseminationBy->setDbValue($row['InseminationBy']);
		$this->Big->setDbValue($row['Big']);
		$this->Medium->setDbValue($row['Medium']);
		$this->Small->setDbValue($row['Small']);
		$this->NoHalo->setDbValue($row['NoHalo']);
		$this->Fragmented->setDbValue($row['Fragmented']);
		$this->NonFragmented->setDbValue($row['NonFragmented']);
		$this->DFI->setDbValue($row['DFI']);
		$this->IsueBy->setDbValue($row['IsueBy']);
		$this->Volume2->setDbValue($row['Volume2']);
		$this->Concentration2->setDbValue($row['Concentration2']);
		$this->Total2->setDbValue($row['Total2']);
		$this->ProgressiveMotility2->setDbValue($row['ProgressiveMotility2']);
		$this->NonProgrssiveMotile2->setDbValue($row['NonProgrssiveMotile2']);
		$this->Immotile2->setDbValue($row['Immotile2']);
		$this->TotalProgrssiveMotile2->setDbValue($row['TotalProgrssiveMotile2']);
		$this->MACS->setDbValue($row['MACS']);
		$this->IssuedBy->setDbValue($row['IssuedBy']);
		$this->IssuedTo->setDbValue($row['IssuedTo']);
		$this->PaID->setDbValue($row['PaID']);
		$this->PaName->setDbValue($row['PaName']);
		$this->PaMobile->setDbValue($row['PaMobile']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerMobile->setDbValue($row['PartnerMobile']);
		$this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
		$this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
		$this->IMSC_1->setDbValue($row['IMSC_1']);
		$this->IMSC_2->setDbValue($row['IMSC_2']);
		$this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
		$this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
		$this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
		$this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
		$this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['PatientName'] = NULL;
		$row['HusbandName'] = NULL;
		$row['RequestDr'] = NULL;
		$row['CollectionDate'] = NULL;
		$row['ResultDate'] = NULL;
		$row['RequestSample'] = NULL;
		$row['CollectionType'] = NULL;
		$row['CollectionMethod'] = NULL;
		$row['Medicationused'] = NULL;
		$row['DifficultiesinCollection'] = NULL;
		$row['pH'] = NULL;
		$row['Timeofcollection'] = NULL;
		$row['Timeofexamination'] = NULL;
		$row['Volume'] = NULL;
		$row['Concentration'] = NULL;
		$row['Total'] = NULL;
		$row['ProgressiveMotility'] = NULL;
		$row['NonProgrssiveMotile'] = NULL;
		$row['Immotile'] = NULL;
		$row['TotalProgrssiveMotile'] = NULL;
		$row['Appearance'] = NULL;
		$row['Homogenosity'] = NULL;
		$row['CompleteSample'] = NULL;
		$row['Liquefactiontime'] = NULL;
		$row['Normal'] = NULL;
		$row['Abnormal'] = NULL;
		$row['Headdefects'] = NULL;
		$row['MidpieceDefects'] = NULL;
		$row['TailDefects'] = NULL;
		$row['NormalProgMotile'] = NULL;
		$row['ImmatureForms'] = NULL;
		$row['Leucocytes'] = NULL;
		$row['Agglutination'] = NULL;
		$row['Debris'] = NULL;
		$row['Diagnosis'] = NULL;
		$row['Observations'] = NULL;
		$row['Signature'] = NULL;
		$row['SemenOrgin'] = NULL;
		$row['Donor'] = NULL;
		$row['DonorBloodgroup'] = NULL;
		$row['Tank'] = NULL;
		$row['Location'] = NULL;
		$row['Volume1'] = NULL;
		$row['Concentration1'] = NULL;
		$row['Total1'] = NULL;
		$row['ProgressiveMotility1'] = NULL;
		$row['NonProgrssiveMotile1'] = NULL;
		$row['Immotile1'] = NULL;
		$row['TotalProgrssiveMotile1'] = NULL;
		$row['TidNo'] = NULL;
		$row['Color'] = NULL;
		$row['DoneBy'] = NULL;
		$row['Method'] = NULL;
		$row['Abstinence'] = NULL;
		$row['ProcessedBy'] = NULL;
		$row['InseminationTime'] = NULL;
		$row['InseminationBy'] = NULL;
		$row['Big'] = NULL;
		$row['Medium'] = NULL;
		$row['Small'] = NULL;
		$row['NoHalo'] = NULL;
		$row['Fragmented'] = NULL;
		$row['NonFragmented'] = NULL;
		$row['DFI'] = NULL;
		$row['IsueBy'] = NULL;
		$row['Volume2'] = NULL;
		$row['Concentration2'] = NULL;
		$row['Total2'] = NULL;
		$row['ProgressiveMotility2'] = NULL;
		$row['NonProgrssiveMotile2'] = NULL;
		$row['Immotile2'] = NULL;
		$row['TotalProgrssiveMotile2'] = NULL;
		$row['MACS'] = NULL;
		$row['IssuedBy'] = NULL;
		$row['IssuedTo'] = NULL;
		$row['PaID'] = NULL;
		$row['PaName'] = NULL;
		$row['PaMobile'] = NULL;
		$row['PartnerID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerMobile'] = NULL;
		$row['PREG_TEST_DATE'] = NULL;
		$row['SPECIFIC_PROBLEMS'] = NULL;
		$row['IMSC_1'] = NULL;
		$row['IMSC_2'] = NULL;
		$row['LIQUIFACTION_STORAGE'] = NULL;
		$row['IUI_PREP_METHOD'] = NULL;
		$row['TIME_FROM_TRIGGER'] = NULL;
		$row['COLLECTION_TO_PREPARATION'] = NULL;
		$row['TIME_FROM_PREP_TO_INSEM'] = NULL;
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
		// RIDNo
		// PatientName
		// HusbandName
		// RequestDr
		// CollectionDate
		// ResultDate
		// RequestSample
		// CollectionType
		// CollectionMethod
		// Medicationused
		// DifficultiesinCollection
		// pH
		// Timeofcollection
		// Timeofexamination
		// Volume
		// Concentration
		// Total
		// ProgressiveMotility
		// NonProgrssiveMotile
		// Immotile
		// TotalProgrssiveMotile
		// Appearance
		// Homogenosity
		// CompleteSample
		// Liquefactiontime
		// Normal
		// Abnormal
		// Headdefects
		// MidpieceDefects
		// TailDefects
		// NormalProgMotile
		// ImmatureForms
		// Leucocytes
		// Agglutination
		// Debris
		// Diagnosis
		// Observations
		// Signature
		// SemenOrgin
		// Donor
		// DonorBloodgroup
		// Tank
		// Location
		// Volume1
		// Concentration1
		// Total1
		// ProgressiveMotility1
		// NonProgrssiveMotile1
		// Immotile1
		// TotalProgrssiveMotile1
		// TidNo
		// Color
		// DoneBy
		// Method
		// Abstinence
		// ProcessedBy
		// InseminationTime
		// InseminationBy
		// Big
		// Medium
		// Small
		// NoHalo
		// Fragmented
		// NonFragmented
		// DFI
		// IsueBy
		// Volume2
		// Concentration2
		// Total2
		// ProgressiveMotility2
		// NonProgrssiveMotile2
		// Immotile2
		// TotalProgrssiveMotile2
		// MACS
		// IssuedBy
		// IssuedTo
		// PaID
		// PaName
		// PaMobile
		// PartnerID
		// PartnerName
		// PartnerMobile
		// PREG_TEST_DATE
		// SPECIFIC_PROBLEMS
		// IMSC_1
		// IMSC_2
		// LIQUIFACTION_STORAGE
		// IUI_PREP_METHOD
		// TIME_FROM_TRIGGER
		// COLLECTION_TO_PREPARATION
		// TIME_FROM_PREP_TO_INSEM

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// HusbandName
			$this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
			$this->HusbandName->ViewCustomAttributes = "";

			// RequestDr
			$this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
			$this->RequestDr->ViewCustomAttributes = "";

			// CollectionDate
			$this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
			$this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
			$this->CollectionDate->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// RequestSample
			if (strval($this->RequestSample->CurrentValue) != "") {
				$this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
			} else {
				$this->RequestSample->ViewValue = NULL;
			}
			$this->RequestSample->ViewCustomAttributes = "";

			// CollectionType
			if (strval($this->CollectionType->CurrentValue) != "") {
				$this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
			} else {
				$this->CollectionType->ViewValue = NULL;
			}
			$this->CollectionType->ViewCustomAttributes = "";

			// CollectionMethod
			if (strval($this->CollectionMethod->CurrentValue) != "") {
				$this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
			} else {
				$this->CollectionMethod->ViewValue = NULL;
			}
			$this->CollectionMethod->ViewCustomAttributes = "";

			// Medicationused
			if (strval($this->Medicationused->CurrentValue) != "") {
				$this->Medicationused->ViewValue = $this->Medicationused->optionCaption($this->Medicationused->CurrentValue);
			} else {
				$this->Medicationused->ViewValue = NULL;
			}
			$this->Medicationused->ViewCustomAttributes = "";

			// DifficultiesinCollection
			if (strval($this->DifficultiesinCollection->CurrentValue) != "") {
				$this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
			} else {
				$this->DifficultiesinCollection->ViewValue = NULL;
			}
			$this->DifficultiesinCollection->ViewCustomAttributes = "";

			// pH
			$this->pH->ViewValue = $this->pH->CurrentValue;
			$this->pH->ViewCustomAttributes = "";

			// Timeofcollection
			$this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
			$this->Timeofcollection->ViewCustomAttributes = "";

			// Timeofexamination
			$this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
			$this->Timeofexamination->ViewCustomAttributes = "";

			// Volume
			$this->Volume->ViewValue = $this->Volume->CurrentValue;
			$this->Volume->ViewCustomAttributes = "";

			// Concentration
			$this->Concentration->ViewValue = $this->Concentration->CurrentValue;
			$this->Concentration->ViewCustomAttributes = "";

			// Total
			$this->Total->ViewValue = $this->Total->CurrentValue;
			$this->Total->ViewCustomAttributes = "";

			// ProgressiveMotility
			$this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
			$this->ProgressiveMotility->ViewCustomAttributes = "";

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
			$this->NonProgrssiveMotile->ViewCustomAttributes = "";

			// Immotile
			$this->Immotile->ViewValue = $this->Immotile->CurrentValue;
			$this->Immotile->ViewCustomAttributes = "";

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
			$this->TotalProgrssiveMotile->ViewCustomAttributes = "";

			// Appearance
			$this->Appearance->ViewValue = $this->Appearance->CurrentValue;
			$this->Appearance->ViewCustomAttributes = "";

			// Homogenosity
			if (strval($this->Homogenosity->CurrentValue) != "") {
				$this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
			} else {
				$this->Homogenosity->ViewValue = NULL;
			}
			$this->Homogenosity->ViewCustomAttributes = "";

			// CompleteSample
			if (strval($this->CompleteSample->CurrentValue) != "") {
				$this->CompleteSample->ViewValue = $this->CompleteSample->optionCaption($this->CompleteSample->CurrentValue);
			} else {
				$this->CompleteSample->ViewValue = NULL;
			}
			$this->CompleteSample->ViewCustomAttributes = "";

			// Liquefactiontime
			$this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
			$this->Liquefactiontime->ViewCustomAttributes = "";

			// Normal
			$this->Normal->ViewValue = $this->Normal->CurrentValue;
			$this->Normal->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// Headdefects
			$this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
			$this->Headdefects->ViewCustomAttributes = "";

			// MidpieceDefects
			$this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
			$this->MidpieceDefects->ViewCustomAttributes = "";

			// TailDefects
			$this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
			$this->TailDefects->ViewCustomAttributes = "";

			// NormalProgMotile
			$this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
			$this->NormalProgMotile->ViewCustomAttributes = "";

			// ImmatureForms
			$this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
			$this->ImmatureForms->ViewCustomAttributes = "";

			// Leucocytes
			$this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
			$this->Leucocytes->ViewCustomAttributes = "";

			// Agglutination
			$this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
			$this->Agglutination->ViewCustomAttributes = "";

			// Debris
			$this->Debris->ViewValue = $this->Debris->CurrentValue;
			$this->Debris->ViewCustomAttributes = "";

			// Diagnosis
			$this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
			$this->Diagnosis->ViewCustomAttributes = "";

			// Observations
			$this->Observations->ViewValue = $this->Observations->CurrentValue;
			$this->Observations->ViewCustomAttributes = "";

			// Signature
			$this->Signature->ViewValue = $this->Signature->CurrentValue;
			$this->Signature->ViewCustomAttributes = "";

			// SemenOrgin
			if (strval($this->SemenOrgin->CurrentValue) != "") {
				$this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
			} else {
				$this->SemenOrgin->ViewValue = NULL;
			}
			$this->SemenOrgin->ViewCustomAttributes = "";

			// Donor
			$curVal = strval($this->Donor->CurrentValue);
			if ($curVal != "") {
				$this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
				if ($this->Donor->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Donor->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Donor->ViewValue = $this->Donor->CurrentValue;
					}
				}
			} else {
				$this->Donor->ViewValue = NULL;
			}
			$this->Donor->ViewCustomAttributes = "";

			// DonorBloodgroup
			$this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
			$this->DonorBloodgroup->ViewCustomAttributes = "";

			// Tank
			$this->Tank->ViewValue = $this->Tank->CurrentValue;
			$this->Tank->ViewCustomAttributes = "";

			// Location
			$this->Location->ViewValue = $this->Location->CurrentValue;
			$this->Location->ViewCustomAttributes = "";

			// Volume1
			$this->Volume1->ViewValue = $this->Volume1->CurrentValue;
			$this->Volume1->ViewCustomAttributes = "";

			// Concentration1
			$this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
			$this->Concentration1->ViewCustomAttributes = "";

			// Total1
			$this->Total1->ViewValue = $this->Total1->CurrentValue;
			$this->Total1->ViewCustomAttributes = "";

			// ProgressiveMotility1
			$this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
			$this->ProgressiveMotility1->ViewCustomAttributes = "";

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
			$this->NonProgrssiveMotile1->ViewCustomAttributes = "";

			// Immotile1
			$this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
			$this->Immotile1->ViewCustomAttributes = "";

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
			$this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Color
			$this->Color->ViewValue = $this->Color->CurrentValue;
			$this->Color->ViewCustomAttributes = "";

			// DoneBy
			$this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
			$this->DoneBy->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Abstinence
			$this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
			$this->Abstinence->ViewCustomAttributes = "";

			// ProcessedBy
			$this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
			$this->ProcessedBy->ViewCustomAttributes = "";

			// InseminationTime
			$this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
			$this->InseminationTime->ViewCustomAttributes = "";

			// InseminationBy
			$this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
			$this->InseminationBy->ViewCustomAttributes = "";

			// Big
			$this->Big->ViewValue = $this->Big->CurrentValue;
			$this->Big->ViewCustomAttributes = "";

			// Medium
			$this->Medium->ViewValue = $this->Medium->CurrentValue;
			$this->Medium->ViewCustomAttributes = "";

			// Small
			$this->Small->ViewValue = $this->Small->CurrentValue;
			$this->Small->ViewCustomAttributes = "";

			// NoHalo
			$this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
			$this->NoHalo->ViewCustomAttributes = "";

			// Fragmented
			$this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
			$this->Fragmented->ViewCustomAttributes = "";

			// NonFragmented
			$this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
			$this->NonFragmented->ViewCustomAttributes = "";

			// DFI
			$this->DFI->ViewValue = $this->DFI->CurrentValue;
			$this->DFI->ViewCustomAttributes = "";

			// IsueBy
			$this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
			$this->IsueBy->ViewCustomAttributes = "";

			// Volume2
			$this->Volume2->ViewValue = $this->Volume2->CurrentValue;
			$this->Volume2->ViewCustomAttributes = "";

			// Concentration2
			$this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
			$this->Concentration2->ViewCustomAttributes = "";

			// Total2
			$this->Total2->ViewValue = $this->Total2->CurrentValue;
			$this->Total2->ViewCustomAttributes = "";

			// ProgressiveMotility2
			$this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
			$this->ProgressiveMotility2->ViewCustomAttributes = "";

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
			$this->NonProgrssiveMotile2->ViewCustomAttributes = "";

			// Immotile2
			$this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
			$this->Immotile2->ViewCustomAttributes = "";

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
			$this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

			// IssuedBy
			$this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
			$this->IssuedBy->ViewCustomAttributes = "";

			// IssuedTo
			$this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
			$this->IssuedTo->ViewCustomAttributes = "";

			// PaID
			$this->PaID->ViewValue = $this->PaID->CurrentValue;
			$this->PaID->ViewCustomAttributes = "";

			// PaName
			$this->PaName->ViewValue = $this->PaName->CurrentValue;
			$this->PaName->ViewCustomAttributes = "";

			// PaMobile
			$this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
			$this->PaMobile->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerMobile
			$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
			$this->PartnerMobile->ViewCustomAttributes = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
			$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
			$this->PREG_TEST_DATE->ViewCustomAttributes = "";

			// SPECIFIC_PROBLEMS
			if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) != "") {
				$this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->optionCaption($this->SPECIFIC_PROBLEMS->CurrentValue);
			} else {
				$this->SPECIFIC_PROBLEMS->ViewValue = NULL;
			}
			$this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

			// IMSC_1
			$this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
			$this->IMSC_1->ViewCustomAttributes = "";

			// IMSC_2
			$this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
			$this->IMSC_2->ViewCustomAttributes = "";

			// LIQUIFACTION_STORAGE
			if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) != "") {
				$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
			} else {
				$this->LIQUIFACTION_STORAGE->ViewValue = NULL;
			}
			$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

			// IUI_PREP_METHOD
			if (strval($this->IUI_PREP_METHOD->CurrentValue) != "") {
				$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
			} else {
				$this->IUI_PREP_METHOD->ViewValue = NULL;
			}
			$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

			// TIME_FROM_TRIGGER
			if (strval($this->TIME_FROM_TRIGGER->CurrentValue) != "") {
				$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
			} else {
				$this->TIME_FROM_TRIGGER->ViewValue = NULL;
			}
			$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

			// COLLECTION_TO_PREPARATION
			if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) != "") {
				$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
			} else {
				$this->COLLECTION_TO_PREPARATION->ViewValue = NULL;
			}
			$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
			$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// HusbandName
			$this->HusbandName->LinkCustomAttributes = "";
			$this->HusbandName->HrefValue = "";
			$this->HusbandName->TooltipValue = "";

			// RequestDr
			$this->RequestDr->LinkCustomAttributes = "";
			$this->RequestDr->HrefValue = "";
			$this->RequestDr->TooltipValue = "";

			// CollectionDate
			$this->CollectionDate->LinkCustomAttributes = "";
			$this->CollectionDate->HrefValue = "";
			$this->CollectionDate->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// RequestSample
			$this->RequestSample->LinkCustomAttributes = "";
			$this->RequestSample->HrefValue = "";
			$this->RequestSample->TooltipValue = "";

			// CollectionType
			$this->CollectionType->LinkCustomAttributes = "";
			$this->CollectionType->HrefValue = "";
			$this->CollectionType->TooltipValue = "";

			// CollectionMethod
			$this->CollectionMethod->LinkCustomAttributes = "";
			$this->CollectionMethod->HrefValue = "";
			$this->CollectionMethod->TooltipValue = "";

			// Medicationused
			$this->Medicationused->LinkCustomAttributes = "";
			$this->Medicationused->HrefValue = "";
			$this->Medicationused->TooltipValue = "";

			// DifficultiesinCollection
			$this->DifficultiesinCollection->LinkCustomAttributes = "";
			$this->DifficultiesinCollection->HrefValue = "";
			$this->DifficultiesinCollection->TooltipValue = "";

			// pH
			$this->pH->LinkCustomAttributes = "";
			$this->pH->HrefValue = "";
			$this->pH->TooltipValue = "";

			// Timeofcollection
			$this->Timeofcollection->LinkCustomAttributes = "";
			$this->Timeofcollection->HrefValue = "";
			$this->Timeofcollection->TooltipValue = "";

			// Timeofexamination
			$this->Timeofexamination->LinkCustomAttributes = "";
			$this->Timeofexamination->HrefValue = "";
			$this->Timeofexamination->TooltipValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";
			$this->Volume->TooltipValue = "";

			// Concentration
			$this->Concentration->LinkCustomAttributes = "";
			$this->Concentration->HrefValue = "";
			$this->Concentration->TooltipValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";
			$this->Total->TooltipValue = "";

			// ProgressiveMotility
			$this->ProgressiveMotility->LinkCustomAttributes = "";
			$this->ProgressiveMotility->HrefValue = "";
			$this->ProgressiveMotility->TooltipValue = "";

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile->HrefValue = "";
			$this->NonProgrssiveMotile->TooltipValue = "";

			// Immotile
			$this->Immotile->LinkCustomAttributes = "";
			$this->Immotile->HrefValue = "";
			$this->Immotile->TooltipValue = "";

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile->HrefValue = "";
			$this->TotalProgrssiveMotile->TooltipValue = "";

			// Appearance
			$this->Appearance->LinkCustomAttributes = "";
			$this->Appearance->HrefValue = "";
			$this->Appearance->TooltipValue = "";

			// Homogenosity
			$this->Homogenosity->LinkCustomAttributes = "";
			$this->Homogenosity->HrefValue = "";
			$this->Homogenosity->TooltipValue = "";

			// CompleteSample
			$this->CompleteSample->LinkCustomAttributes = "";
			$this->CompleteSample->HrefValue = "";
			$this->CompleteSample->TooltipValue = "";

			// Liquefactiontime
			$this->Liquefactiontime->LinkCustomAttributes = "";
			$this->Liquefactiontime->HrefValue = "";
			$this->Liquefactiontime->TooltipValue = "";

			// Normal
			$this->Normal->LinkCustomAttributes = "";
			$this->Normal->HrefValue = "";
			$this->Normal->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";

			// Headdefects
			$this->Headdefects->LinkCustomAttributes = "";
			$this->Headdefects->HrefValue = "";
			$this->Headdefects->TooltipValue = "";

			// MidpieceDefects
			$this->MidpieceDefects->LinkCustomAttributes = "";
			$this->MidpieceDefects->HrefValue = "";
			$this->MidpieceDefects->TooltipValue = "";

			// TailDefects
			$this->TailDefects->LinkCustomAttributes = "";
			$this->TailDefects->HrefValue = "";
			$this->TailDefects->TooltipValue = "";

			// NormalProgMotile
			$this->NormalProgMotile->LinkCustomAttributes = "";
			$this->NormalProgMotile->HrefValue = "";
			$this->NormalProgMotile->TooltipValue = "";

			// ImmatureForms
			$this->ImmatureForms->LinkCustomAttributes = "";
			$this->ImmatureForms->HrefValue = "";
			$this->ImmatureForms->TooltipValue = "";

			// Leucocytes
			$this->Leucocytes->LinkCustomAttributes = "";
			$this->Leucocytes->HrefValue = "";
			$this->Leucocytes->TooltipValue = "";

			// Agglutination
			$this->Agglutination->LinkCustomAttributes = "";
			$this->Agglutination->HrefValue = "";
			$this->Agglutination->TooltipValue = "";

			// Debris
			$this->Debris->LinkCustomAttributes = "";
			$this->Debris->HrefValue = "";
			$this->Debris->TooltipValue = "";

			// Diagnosis
			$this->Diagnosis->LinkCustomAttributes = "";
			$this->Diagnosis->HrefValue = "";
			$this->Diagnosis->TooltipValue = "";

			// Observations
			$this->Observations->LinkCustomAttributes = "";
			$this->Observations->HrefValue = "";
			$this->Observations->TooltipValue = "";

			// Signature
			$this->Signature->LinkCustomAttributes = "";
			$this->Signature->HrefValue = "";
			$this->Signature->TooltipValue = "";

			// SemenOrgin
			$this->SemenOrgin->LinkCustomAttributes = "";
			$this->SemenOrgin->HrefValue = "";
			$this->SemenOrgin->TooltipValue = "";

			// Donor
			$this->Donor->LinkCustomAttributes = "";
			$this->Donor->HrefValue = "";
			$this->Donor->TooltipValue = "";

			// DonorBloodgroup
			$this->DonorBloodgroup->LinkCustomAttributes = "";
			$this->DonorBloodgroup->HrefValue = "";
			$this->DonorBloodgroup->TooltipValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";
			$this->Tank->TooltipValue = "";

			// Location
			$this->Location->LinkCustomAttributes = "";
			$this->Location->HrefValue = "";
			$this->Location->TooltipValue = "";

			// Volume1
			$this->Volume1->LinkCustomAttributes = "";
			$this->Volume1->HrefValue = "";
			$this->Volume1->TooltipValue = "";

			// Concentration1
			$this->Concentration1->LinkCustomAttributes = "";
			$this->Concentration1->HrefValue = "";
			$this->Concentration1->TooltipValue = "";

			// Total1
			$this->Total1->LinkCustomAttributes = "";
			$this->Total1->HrefValue = "";
			$this->Total1->TooltipValue = "";

			// ProgressiveMotility1
			$this->ProgressiveMotility1->LinkCustomAttributes = "";
			$this->ProgressiveMotility1->HrefValue = "";
			$this->ProgressiveMotility1->TooltipValue = "";

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile1->HrefValue = "";
			$this->NonProgrssiveMotile1->TooltipValue = "";

			// Immotile1
			$this->Immotile1->LinkCustomAttributes = "";
			$this->Immotile1->HrefValue = "";
			$this->Immotile1->TooltipValue = "";

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile1->HrefValue = "";
			$this->TotalProgrssiveMotile1->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Color
			$this->Color->LinkCustomAttributes = "";
			$this->Color->HrefValue = "";
			$this->Color->TooltipValue = "";

			// DoneBy
			$this->DoneBy->LinkCustomAttributes = "";
			$this->DoneBy->HrefValue = "";
			$this->DoneBy->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Abstinence
			$this->Abstinence->LinkCustomAttributes = "";
			$this->Abstinence->HrefValue = "";
			$this->Abstinence->TooltipValue = "";

			// ProcessedBy
			$this->ProcessedBy->LinkCustomAttributes = "";
			$this->ProcessedBy->HrefValue = "";
			$this->ProcessedBy->TooltipValue = "";

			// InseminationTime
			$this->InseminationTime->LinkCustomAttributes = "";
			$this->InseminationTime->HrefValue = "";
			$this->InseminationTime->TooltipValue = "";

			// InseminationBy
			$this->InseminationBy->LinkCustomAttributes = "";
			$this->InseminationBy->HrefValue = "";
			$this->InseminationBy->TooltipValue = "";

			// Big
			$this->Big->LinkCustomAttributes = "";
			$this->Big->HrefValue = "";
			$this->Big->TooltipValue = "";

			// Medium
			$this->Medium->LinkCustomAttributes = "";
			$this->Medium->HrefValue = "";
			$this->Medium->TooltipValue = "";

			// Small
			$this->Small->LinkCustomAttributes = "";
			$this->Small->HrefValue = "";
			$this->Small->TooltipValue = "";

			// NoHalo
			$this->NoHalo->LinkCustomAttributes = "";
			$this->NoHalo->HrefValue = "";
			$this->NoHalo->TooltipValue = "";

			// Fragmented
			$this->Fragmented->LinkCustomAttributes = "";
			$this->Fragmented->HrefValue = "";
			$this->Fragmented->TooltipValue = "";

			// NonFragmented
			$this->NonFragmented->LinkCustomAttributes = "";
			$this->NonFragmented->HrefValue = "";
			$this->NonFragmented->TooltipValue = "";

			// DFI
			$this->DFI->LinkCustomAttributes = "";
			$this->DFI->HrefValue = "";
			$this->DFI->TooltipValue = "";

			// IsueBy
			$this->IsueBy->LinkCustomAttributes = "";
			$this->IsueBy->HrefValue = "";
			$this->IsueBy->TooltipValue = "";

			// Volume2
			$this->Volume2->LinkCustomAttributes = "";
			$this->Volume2->HrefValue = "";
			$this->Volume2->TooltipValue = "";

			// Concentration2
			$this->Concentration2->LinkCustomAttributes = "";
			$this->Concentration2->HrefValue = "";
			$this->Concentration2->TooltipValue = "";

			// Total2
			$this->Total2->LinkCustomAttributes = "";
			$this->Total2->HrefValue = "";
			$this->Total2->TooltipValue = "";

			// ProgressiveMotility2
			$this->ProgressiveMotility2->LinkCustomAttributes = "";
			$this->ProgressiveMotility2->HrefValue = "";
			$this->ProgressiveMotility2->TooltipValue = "";

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile2->HrefValue = "";
			$this->NonProgrssiveMotile2->TooltipValue = "";

			// Immotile2
			$this->Immotile2->LinkCustomAttributes = "";
			$this->Immotile2->HrefValue = "";
			$this->Immotile2->TooltipValue = "";

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile2->HrefValue = "";
			$this->TotalProgrssiveMotile2->TooltipValue = "";

			// IssuedBy
			$this->IssuedBy->LinkCustomAttributes = "";
			$this->IssuedBy->HrefValue = "";
			$this->IssuedBy->TooltipValue = "";

			// IssuedTo
			$this->IssuedTo->LinkCustomAttributes = "";
			$this->IssuedTo->HrefValue = "";
			$this->IssuedTo->TooltipValue = "";

			// PaID
			$this->PaID->LinkCustomAttributes = "";
			$this->PaID->HrefValue = "";
			$this->PaID->TooltipValue = "";

			// PaName
			$this->PaName->LinkCustomAttributes = "";
			$this->PaName->HrefValue = "";
			$this->PaName->TooltipValue = "";

			// PaMobile
			$this->PaMobile->LinkCustomAttributes = "";
			$this->PaMobile->HrefValue = "";
			$this->PaMobile->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerMobile
			$this->PartnerMobile->LinkCustomAttributes = "";
			$this->PartnerMobile->HrefValue = "";
			$this->PartnerMobile->TooltipValue = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->LinkCustomAttributes = "";
			$this->PREG_TEST_DATE->HrefValue = "";
			$this->PREG_TEST_DATE->TooltipValue = "";

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_PROBLEMS->TooltipValue = "";

			// IMSC_1
			$this->IMSC_1->LinkCustomAttributes = "";
			$this->IMSC_1->HrefValue = "";
			$this->IMSC_1->TooltipValue = "";

			// IMSC_2
			$this->IMSC_2->LinkCustomAttributes = "";
			$this->IMSC_2->HrefValue = "";
			$this->IMSC_2->TooltipValue = "";

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
			$this->LIQUIFACTION_STORAGE->HrefValue = "";
			$this->LIQUIFACTION_STORAGE->TooltipValue = "";

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->LinkCustomAttributes = "";
			$this->IUI_PREP_METHOD->HrefValue = "";
			$this->IUI_PREP_METHOD->TooltipValue = "";

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
			$this->TIME_FROM_TRIGGER->HrefValue = "";
			$this->TIME_FROM_TRIGGER->TooltipValue = "";

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
			$this->COLLECTION_TO_PREPARATION->HrefValue = "";
			$this->COLLECTION_TO_PREPARATION->TooltipValue = "";

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
			$this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
			$this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("PatientName"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setQueryStringValue($parm);
					$this->PatientName->setQueryStringValue($GLOBALS["view_ivf_treatment"]->Name->QueryStringValue);
					$this->PatientName->setSessionValue($this->PatientName->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("PatientName"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setQueryStringValue($parm);
					$this->PatientName->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->Name->QueryStringValue);
					$this->PatientName->setSessionValue($this->PatientName->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["view_ivf_treatment"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("PatientName"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setFormValue($parm);
					$this->PatientName->setFormValue($GLOBALS["view_ivf_treatment"]->Name->FormValue);
					$this->PatientName->setSessionValue($this->PatientName->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("PatientName"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setFormValue($parm);
					$this->PatientName->setFormValue($GLOBALS["ivf_treatment_plan"]->Name->FormValue);
					$this->PatientName->setSessionValue($this->PatientName->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["ivf_treatment_plan"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->FormValue))
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
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "view_ivf_treatment") {
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->PatientName->CurrentValue == "")
					$this->PatientName->setSessionValue("");
			}
			if ($masterTblVar != "ivf_treatment_plan") {
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->PatientName->CurrentValue == "")
					$this->PatientName->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_semenanalysisreportlist.php"), "", $this->TableVar, TRUE);
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
				case "x_RequestSample":
					break;
				case "x_CollectionType":
					break;
				case "x_CollectionMethod":
					break;
				case "x_Medicationused":
					break;
				case "x_DifficultiesinCollection":
					break;
				case "x_Homogenosity":
					break;
				case "x_CompleteSample":
					break;
				case "x_SemenOrgin":
					break;
				case "x_Donor":
					break;
				case "x_MACS":
					break;
				case "x_SPECIFIC_PROBLEMS":
					break;
				case "x_LIQUIFACTION_STORAGE":
					break;
				case "x_IUI_PREP_METHOD":
					break;
				case "x_TIME_FROM_TRIGGER":
					break;
				case "x_COLLECTION_TO_PREPARATION":
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
						case "x_Donor":
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
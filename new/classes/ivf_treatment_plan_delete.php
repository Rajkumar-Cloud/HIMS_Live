<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_treatment_plan_delete extends ivf_treatment_plan
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_treatment_plan';

	// Page object name
	public $PageObjName = "ivf_treatment_plan_delete";

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

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS["ivf_treatment_plan"]) || get_class($GLOBALS["ivf_treatment_plan"]) == PROJECT_NAMESPACE . "ivf_treatment_plan") {
			$GLOBALS["ivf_treatment_plan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_treatment_plan"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf)
		if (!isset($GLOBALS['ivf']))
			$GLOBALS['ivf'] = new ivf();

		// Table object (view_donor_ivf)
		if (!isset($GLOBALS['view_donor_ivf']))
			$GLOBALS['view_donor_ivf'] = new view_donor_ivf();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_treatment_plan');

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
		global $ivf_treatment_plan;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_treatment_plan);
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
					$this->terminate(GetUrl("ivf_treatment_planlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->RIDNO->Visible = FALSE;
		$this->Name->Visible = FALSE;
		$this->TreatmentStartDate->setVisibility();
		$this->Age->Visible = FALSE;
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->IVFCycleNO->setVisibility();
		$this->RESULT->Visible = FALSE;
		$this->status->Visible = FALSE;
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->TreatementStopDate->Visible = FALSE;
		$this->TypePatient->Visible = FALSE;
		$this->Treatment->setVisibility();
		$this->TreatmentTec->setVisibility();
		$this->TypeOfCycle->setVisibility();
		$this->SpermOrgin->setVisibility();
		$this->State->setVisibility();
		$this->Origin->setVisibility();
		$this->MACS->setVisibility();
		$this->Technique->setVisibility();
		$this->PgdPlanning->setVisibility();
		$this->IMSI->setVisibility();
		$this->SequentialCulture->setVisibility();
		$this->TimeLapse->setVisibility();
		$this->AH->setVisibility();
		$this->Weight->setVisibility();
		$this->BMI->setVisibility();
		$this->MaleIndications->setVisibility();
		$this->FemaleIndications->setVisibility();
		$this->UseOfThe->Visible = FALSE;
		$this->Ectopic->Visible = FALSE;
		$this->Heterotopic->Visible = FALSE;
		$this->TransferDFE->Visible = FALSE;
		$this->Evolutive->Visible = FALSE;
		$this->Number->Visible = FALSE;
		$this->SequentialCult->Visible = FALSE;
		$this->TineLapse->Visible = FALSE;
		$this->PatientName->Visible = FALSE;
		$this->PatientID->Visible = FALSE;
		$this->PartnerName->Visible = FALSE;
		$this->PartnerID->Visible = FALSE;
		$this->WifeCell->Visible = FALSE;
		$this->HusbandCell->Visible = FALSE;
		$this->CoupleID->Visible = FALSE;
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
		$this->setupLookupOptions($this->status);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_treatment_planlist.php");
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
			$this->terminate("ivf_treatment_planlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("ivf_treatment_planlist.php"); // Return to list
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
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
		$this->Age->setDbValue($row['Age']);
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->IVFCycleNO->setDbValue($row['IVFCycleNO']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
		$this->TypePatient->setDbValue($row['TypePatient']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->TreatmentTec->setDbValue($row['TreatmentTec']);
		$this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
		$this->SpermOrgin->setDbValue($row['SpermOrgin']);
		$this->State->setDbValue($row['State']);
		$this->Origin->setDbValue($row['Origin']);
		$this->MACS->setDbValue($row['MACS']);
		$this->Technique->setDbValue($row['Technique']);
		$this->PgdPlanning->setDbValue($row['PgdPlanning']);
		$this->IMSI->setDbValue($row['IMSI']);
		$this->SequentialCulture->setDbValue($row['SequentialCulture']);
		$this->TimeLapse->setDbValue($row['TimeLapse']);
		$this->AH->setDbValue($row['AH']);
		$this->Weight->setDbValue($row['Weight']);
		$this->BMI->setDbValue($row['BMI']);
		$this->MaleIndications->setDbValue($row['MaleIndications']);
		$this->FemaleIndications->setDbValue($row['FemaleIndications']);
		$this->UseOfThe->setDbValue($row['UseOfThe']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Heterotopic->setDbValue($row['Heterotopic']);
		$this->TransferDFE->setDbValue($row['TransferDFE']);
		$this->Evolutive->setDbValue($row['Evolutive']);
		$this->Number->setDbValue($row['Number']);
		$this->SequentialCult->setDbValue($row['SequentialCult']);
		$this->TineLapse->setDbValue($row['TineLapse']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->WifeCell->setDbValue($row['WifeCell']);
		$this->HusbandCell->setDbValue($row['HusbandCell']);
		$this->CoupleID->setDbValue($row['CoupleID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['TreatmentStartDate'] = NULL;
		$row['Age'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['IVFCycleNO'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TreatementStopDate'] = NULL;
		$row['TypePatient'] = NULL;
		$row['Treatment'] = NULL;
		$row['TreatmentTec'] = NULL;
		$row['TypeOfCycle'] = NULL;
		$row['SpermOrgin'] = NULL;
		$row['State'] = NULL;
		$row['Origin'] = NULL;
		$row['MACS'] = NULL;
		$row['Technique'] = NULL;
		$row['PgdPlanning'] = NULL;
		$row['IMSI'] = NULL;
		$row['SequentialCulture'] = NULL;
		$row['TimeLapse'] = NULL;
		$row['AH'] = NULL;
		$row['Weight'] = NULL;
		$row['BMI'] = NULL;
		$row['MaleIndications'] = NULL;
		$row['FemaleIndications'] = NULL;
		$row['UseOfThe'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Heterotopic'] = NULL;
		$row['TransferDFE'] = NULL;
		$row['Evolutive'] = NULL;
		$row['Number'] = NULL;
		$row['SequentialCult'] = NULL;
		$row['TineLapse'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['WifeCell'] = NULL;
		$row['HusbandCell'] = NULL;
		$row['CoupleID'] = NULL;
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
		// RIDNO
		// Name
		// TreatmentStartDate
		// Age
		// treatment_status
		// ARTCYCLE
		// IVFCycleNO
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TreatementStopDate
		// TypePatient
		// Treatment
		// TreatmentTec
		// TypeOfCycle
		// SpermOrgin
		// State
		// Origin
		// MACS
		// Technique
		// PgdPlanning
		// IMSI
		// SequentialCulture
		// TimeLapse
		// AH
		// Weight
		// BMI
		// MaleIndications
		// FemaleIndications
		// UseOfThe
		// Ectopic
		// Heterotopic
		// TransferDFE
		// Evolutive
		// Number
		// SequentialCult
		// TineLapse
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// WifeCell
		// HusbandCell
		// CoupleID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
			$this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 7);
			$this->TreatmentStartDate->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// treatment_status
			if (strval($this->treatment_status->CurrentValue) != "") {
				$this->treatment_status->ViewValue = $this->treatment_status->optionCaption($this->treatment_status->CurrentValue);
			} else {
				$this->treatment_status->ViewValue = NULL;
			}
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			if (strval($this->ARTCYCLE->CurrentValue) != "") {
				$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
			} else {
				$this->ARTCYCLE->ViewValue = NULL;
			}
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// IVFCycleNO
			$this->IVFCycleNO->ViewValue = $this->IVFCycleNO->CurrentValue;
			$this->IVFCycleNO->ViewCustomAttributes = "";

			// RESULT
			if (strval($this->RESULT->CurrentValue) != "") {
				$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
			} else {
				$this->RESULT->ViewValue = NULL;
			}
			$this->RESULT->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal != "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->status->ViewValue = $this->status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status->ViewValue = $this->status->CurrentValue;
					}
				}
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// TreatementStopDate
			$this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
			$this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 7);
			$this->TreatementStopDate->ViewCustomAttributes = "";

			// TypePatient
			$this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
			$this->TypePatient->ViewCustomAttributes = "";

			// Treatment
			if (strval($this->Treatment->CurrentValue) != "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// TreatmentTec
			$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
			$this->TreatmentTec->ViewCustomAttributes = "";

			// TypeOfCycle
			if (strval($this->TypeOfCycle->CurrentValue) != "") {
				$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->optionCaption($this->TypeOfCycle->CurrentValue);
			} else {
				$this->TypeOfCycle->ViewValue = NULL;
			}
			$this->TypeOfCycle->ViewCustomAttributes = "";

			// SpermOrgin
			if (strval($this->SpermOrgin->CurrentValue) != "") {
				$this->SpermOrgin->ViewValue = $this->SpermOrgin->optionCaption($this->SpermOrgin->CurrentValue);
			} else {
				$this->SpermOrgin->ViewValue = NULL;
			}
			$this->SpermOrgin->ViewCustomAttributes = "";

			// State
			if (strval($this->State->CurrentValue) != "") {
				$this->State->ViewValue = $this->State->optionCaption($this->State->CurrentValue);
			} else {
				$this->State->ViewValue = NULL;
			}
			$this->State->ViewCustomAttributes = "";

			// Origin
			$this->Origin->ViewValue = $this->Origin->CurrentValue;
			$this->Origin->ViewCustomAttributes = "";

			// MACS
			if (strval($this->MACS->CurrentValue) != "") {
				$this->MACS->ViewValue = $this->MACS->optionCaption($this->MACS->CurrentValue);
			} else {
				$this->MACS->ViewValue = NULL;
			}
			$this->MACS->ViewCustomAttributes = "";

			// Technique
			$this->Technique->ViewValue = $this->Technique->CurrentValue;
			$this->Technique->ViewCustomAttributes = "";

			// PgdPlanning
			if (strval($this->PgdPlanning->CurrentValue) != "") {
				$this->PgdPlanning->ViewValue = $this->PgdPlanning->optionCaption($this->PgdPlanning->CurrentValue);
			} else {
				$this->PgdPlanning->ViewValue = NULL;
			}
			$this->PgdPlanning->ViewCustomAttributes = "";

			// IMSI
			$this->IMSI->ViewValue = $this->IMSI->CurrentValue;
			$this->IMSI->ViewCustomAttributes = "";

			// SequentialCulture
			$this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
			$this->SequentialCulture->ViewCustomAttributes = "";

			// TimeLapse
			$this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
			$this->TimeLapse->ViewCustomAttributes = "";

			// AH
			$this->AH->ViewValue = $this->AH->CurrentValue;
			$this->AH->ViewCustomAttributes = "";

			// Weight
			$this->Weight->ViewValue = $this->Weight->CurrentValue;
			$this->Weight->ViewCustomAttributes = "";

			// BMI
			$this->BMI->ViewValue = $this->BMI->CurrentValue;
			$this->BMI->ViewCustomAttributes = "";

			// MaleIndications
			if (strval($this->MaleIndications->CurrentValue) != "") {
				$this->MaleIndications->ViewValue = $this->MaleIndications->optionCaption($this->MaleIndications->CurrentValue);
			} else {
				$this->MaleIndications->ViewValue = NULL;
			}
			$this->MaleIndications->ViewCustomAttributes = "";

			// FemaleIndications
			if (strval($this->FemaleIndications->CurrentValue) != "") {
				$this->FemaleIndications->ViewValue = $this->FemaleIndications->optionCaption($this->FemaleIndications->CurrentValue);
			} else {
				$this->FemaleIndications->ViewValue = NULL;
			}
			$this->FemaleIndications->ViewCustomAttributes = "";

			// UseOfThe
			$this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
			$this->UseOfThe->ViewCustomAttributes = "";

			// Ectopic
			$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
			$this->Ectopic->ViewCustomAttributes = "";

			// Heterotopic
			if (strval($this->Heterotopic->CurrentValue) != "") {
				$this->Heterotopic->ViewValue = $this->Heterotopic->optionCaption($this->Heterotopic->CurrentValue);
			} else {
				$this->Heterotopic->ViewValue = NULL;
			}
			$this->Heterotopic->ViewCustomAttributes = "";

			// TransferDFE
			if (strval($this->TransferDFE->CurrentValue) != "") {
				$this->TransferDFE->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->TransferDFE->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->TransferDFE->ViewValue->add($this->TransferDFE->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->TransferDFE->ViewValue = NULL;
			}
			$this->TransferDFE->ViewCustomAttributes = "";

			// Evolutive
			$this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
			$this->Evolutive->ViewCustomAttributes = "";

			// Number
			$this->Number->ViewValue = $this->Number->CurrentValue;
			$this->Number->ViewCustomAttributes = "";

			// SequentialCult
			$this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
			$this->SequentialCult->ViewCustomAttributes = "";

			// TineLapse
			if (strval($this->TineLapse->CurrentValue) != "") {
				$this->TineLapse->ViewValue = $this->TineLapse->optionCaption($this->TineLapse->CurrentValue);
			} else {
				$this->TineLapse->ViewValue = NULL;
			}
			$this->TineLapse->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// WifeCell
			$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
			$this->WifeCell->ViewCustomAttributes = "";

			// HusbandCell
			$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
			$this->HusbandCell->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";
			$this->TreatmentStartDate->TooltipValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// IVFCycleNO
			$this->IVFCycleNO->LinkCustomAttributes = "";
			$this->IVFCycleNO->HrefValue = "";
			$this->IVFCycleNO->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";
			$this->TreatmentTec->TooltipValue = "";

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";
			$this->TypeOfCycle->TooltipValue = "";

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";
			$this->SpermOrgin->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";
			$this->Origin->TooltipValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";
			$this->MACS->TooltipValue = "";

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";
			$this->Technique->TooltipValue = "";

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";
			$this->PgdPlanning->TooltipValue = "";

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";
			$this->IMSI->TooltipValue = "";

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";
			$this->SequentialCulture->TooltipValue = "";

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";
			$this->TimeLapse->TooltipValue = "";

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";
			$this->AH->TooltipValue = "";

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";
			$this->Weight->TooltipValue = "";

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";
			$this->BMI->TooltipValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";
			$this->MaleIndications->TooltipValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";
			$this->FemaleIndications->TooltipValue = "";
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
			if ($masterTblVar == "ivf") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("RIDNO"))) !== NULL) {
					$GLOBALS["ivf"]->id->setQueryStringValue($parm);
					$this->RIDNO->setQueryStringValue($GLOBALS["ivf"]->id->QueryStringValue);
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Female", Get("Name"))) !== NULL) {
					$GLOBALS["ivf"]->Female->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["ivf"]->Female->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf"]->Female->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "view_donor_ivf") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("RIDNO"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->id->setQueryStringValue($parm);
					$this->RIDNO->setQueryStringValue($GLOBALS["view_donor_ivf"]->id->QueryStringValue);
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Female", Get("Name"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->Female->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["view_donor_ivf"]->Female->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->Female->QueryStringValue))
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
			if ($masterTblVar == "ivf") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("RIDNO"))) !== NULL) {
					$GLOBALS["ivf"]->id->setFormValue($parm);
					$this->RIDNO->setFormValue($GLOBALS["ivf"]->id->FormValue);
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($GLOBALS["ivf"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Female", Post("Name"))) !== NULL) {
					$GLOBALS["ivf"]->Female->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["ivf"]->Female->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
					if (!is_numeric($GLOBALS["ivf"]->Female->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "view_donor_ivf") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("RIDNO"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->id->setFormValue($parm);
					$this->RIDNO->setFormValue($GLOBALS["view_donor_ivf"]->id->FormValue);
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Female", Post("Name"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->Female->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["view_donor_ivf"]->Female->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->Female->FormValue))
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
			if ($masterTblVar != "ivf") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
			}
			if ($masterTblVar != "view_donor_ivf") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_treatment_planlist.php"), "", $this->TableVar, TRUE);
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
				case "x_treatment_status":
					break;
				case "x_ARTCYCLE":
					break;
				case "x_RESULT":
					break;
				case "x_status":
					break;
				case "x_Treatment":
					break;
				case "x_TypeOfCycle":
					break;
				case "x_SpermOrgin":
					break;
				case "x_State":
					break;
				case "x_MACS":
					break;
				case "x_PgdPlanning":
					break;
				case "x_MaleIndications":
					break;
				case "x_FemaleIndications":
					break;
				case "x_Heterotopic":
					break;
				case "x_TransferDFE":
					break;
				case "x_TineLapse":
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
						case "x_status":
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
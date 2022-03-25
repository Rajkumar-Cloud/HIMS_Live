<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_et_chart_delete extends ivf_et_chart
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_et_chart';

	// Page object name
	public $PageObjName = "ivf_et_chart_delete";

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

		// Table object (ivf_et_chart)
		if (!isset($GLOBALS["ivf_et_chart"]) || get_class($GLOBALS["ivf_et_chart"]) == PROJECT_NAMESPACE . "ivf_et_chart") {
			$GLOBALS["ivf_et_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_et_chart"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_et_chart');

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
		global $ivf_et_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_et_chart);
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
					$this->terminate(GetUrl("ivf_et_chartlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ARTCycle->setVisibility();
		$this->Consultant->setVisibility();
		$this->InseminatinTechnique->setVisibility();
		$this->IndicationForART->setVisibility();
		$this->PreTreatment->setVisibility();
		$this->Hysteroscopy->setVisibility();
		$this->EndometrialScratching->setVisibility();
		$this->TrialCannulation->setVisibility();
		$this->CYCLETYPE->setVisibility();
		$this->HRTCYCLE->setVisibility();
		$this->OralEstrogenDosage->setVisibility();
		$this->VaginalEstrogen->setVisibility();
		$this->GCSF->setVisibility();
		$this->ActivatedPRP->setVisibility();
		$this->ERA->setVisibility();
		$this->UCLcm->setVisibility();
		$this->DATEOFSTART->setVisibility();
		$this->DATEOFEMBRYOTRANSFER->setVisibility();
		$this->DAYOFEMBRYOTRANSFER->setVisibility();
		$this->NOOFEMBRYOSTHAWED->setVisibility();
		$this->NOOFEMBRYOSTRANSFERRED->setVisibility();
		$this->DAYOFEMBRYOS->setVisibility();
		$this->CRYOPRESERVEDEMBRYOS->setVisibility();
		$this->Code1->setVisibility();
		$this->Code2->setVisibility();
		$this->CellStage1->setVisibility();
		$this->CellStage2->setVisibility();
		$this->Grade1->setVisibility();
		$this->Grade2->setVisibility();
		$this->ProcedureRecord->Visible = FALSE;
		$this->Medicationsadvised->Visible = FALSE;
		$this->PostProcedureInstructions->Visible = FALSE;
		$this->PregnancyTestingWithSerumBetaHcG->setVisibility();
		$this->ReviewDate->setVisibility();
		$this->ReviewDoctor->setVisibility();
		$this->TemplateProcedureRecord->Visible = FALSE;
		$this->TemplateMedicationsadvised->Visible = FALSE;
		$this->TemplatePostProcedureInstructions->Visible = FALSE;
		$this->TidNo->setVisibility();
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
		$this->setupLookupOptions($this->TemplateProcedureRecord);
		$this->setupLookupOptions($this->TemplateMedicationsadvised);
		$this->setupLookupOptions($this->TemplatePostProcedureInstructions);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_et_chartlist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivf_et_chartlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("ivf_et_chartlist.php"); // Return to list
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
		$this->Name->setDbValue($row['Name']);
		$this->ARTCycle->setDbValue($row['ARTCycle']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
		$this->IndicationForART->setDbValue($row['IndicationForART']);
		$this->PreTreatment->setDbValue($row['PreTreatment']);
		$this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
		$this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
		$this->TrialCannulation->setDbValue($row['TrialCannulation']);
		$this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
		$this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
		$this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
		$this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
		$this->GCSF->setDbValue($row['GCSF']);
		$this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
		$this->ERA->setDbValue($row['ERA']);
		$this->UCLcm->setDbValue($row['UCLcm']);
		$this->DATEOFSTART->setDbValue($row['DATEOFSTART']);
		$this->DATEOFEMBRYOTRANSFER->setDbValue($row['DATEOFEMBRYOTRANSFER']);
		$this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
		$this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
		$this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
		$this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
		$this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
		$this->Code1->setDbValue($row['Code1']);
		$this->Code2->setDbValue($row['Code2']);
		$this->CellStage1->setDbValue($row['CellStage1']);
		$this->CellStage2->setDbValue($row['CellStage2']);
		$this->Grade1->setDbValue($row['Grade1']);
		$this->Grade2->setDbValue($row['Grade2']);
		$this->ProcedureRecord->setDbValue($row['ProcedureRecord']);
		$this->Medicationsadvised->setDbValue($row['Medicationsadvised']);
		$this->PostProcedureInstructions->setDbValue($row['PostProcedureInstructions']);
		$this->PregnancyTestingWithSerumBetaHcG->setDbValue($row['PregnancyTestingWithSerumBetaHcG']);
		$this->ReviewDate->setDbValue($row['ReviewDate']);
		$this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
		$this->TemplateProcedureRecord->setDbValue($row['TemplateProcedureRecord']);
		$this->TemplateMedicationsadvised->setDbValue($row['TemplateMedicationsadvised']);
		$this->TemplatePostProcedureInstructions->setDbValue($row['TemplatePostProcedureInstructions']);
		$this->TidNo->setDbValue($row['TidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ARTCycle'] = NULL;
		$row['Consultant'] = NULL;
		$row['InseminatinTechnique'] = NULL;
		$row['IndicationForART'] = NULL;
		$row['PreTreatment'] = NULL;
		$row['Hysteroscopy'] = NULL;
		$row['EndometrialScratching'] = NULL;
		$row['TrialCannulation'] = NULL;
		$row['CYCLETYPE'] = NULL;
		$row['HRTCYCLE'] = NULL;
		$row['OralEstrogenDosage'] = NULL;
		$row['VaginalEstrogen'] = NULL;
		$row['GCSF'] = NULL;
		$row['ActivatedPRP'] = NULL;
		$row['ERA'] = NULL;
		$row['UCLcm'] = NULL;
		$row['DATEOFSTART'] = NULL;
		$row['DATEOFEMBRYOTRANSFER'] = NULL;
		$row['DAYOFEMBRYOTRANSFER'] = NULL;
		$row['NOOFEMBRYOSTHAWED'] = NULL;
		$row['NOOFEMBRYOSTRANSFERRED'] = NULL;
		$row['DAYOFEMBRYOS'] = NULL;
		$row['CRYOPRESERVEDEMBRYOS'] = NULL;
		$row['Code1'] = NULL;
		$row['Code2'] = NULL;
		$row['CellStage1'] = NULL;
		$row['CellStage2'] = NULL;
		$row['Grade1'] = NULL;
		$row['Grade2'] = NULL;
		$row['ProcedureRecord'] = NULL;
		$row['Medicationsadvised'] = NULL;
		$row['PostProcedureInstructions'] = NULL;
		$row['PregnancyTestingWithSerumBetaHcG'] = NULL;
		$row['ReviewDate'] = NULL;
		$row['ReviewDoctor'] = NULL;
		$row['TemplateProcedureRecord'] = NULL;
		$row['TemplateMedicationsadvised'] = NULL;
		$row['TemplatePostProcedureInstructions'] = NULL;
		$row['TidNo'] = NULL;
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
		// Name
		// ARTCycle
		// Consultant
		// InseminatinTechnique
		// IndicationForART
		// PreTreatment
		// Hysteroscopy
		// EndometrialScratching
		// TrialCannulation
		// CYCLETYPE
		// HRTCYCLE
		// OralEstrogenDosage
		// VaginalEstrogen
		// GCSF
		// ActivatedPRP
		// ERA
		// UCLcm
		// DATEOFSTART
		// DATEOFEMBRYOTRANSFER
		// DAYOFEMBRYOTRANSFER
		// NOOFEMBRYOSTHAWED
		// NOOFEMBRYOSTRANSFERRED
		// DAYOFEMBRYOS
		// CRYOPRESERVEDEMBRYOS
		// Code1
		// Code2
		// CellStage1
		// CellStage2
		// Grade1
		// Grade2
		// ProcedureRecord
		// Medicationsadvised
		// PostProcedureInstructions
		// PregnancyTestingWithSerumBetaHcG
		// ReviewDate
		// ReviewDoctor
		// TemplateProcedureRecord
		// TemplateMedicationsadvised
		// TemplatePostProcedureInstructions
		// TidNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// ARTCycle
			if (strval($this->ARTCycle->CurrentValue) != "") {
				$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
			} else {
				$this->ARTCycle->ViewValue = NULL;
			}
			$this->ARTCycle->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// InseminatinTechnique
			if (strval($this->InseminatinTechnique->CurrentValue) != "") {
				$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
			} else {
				$this->InseminatinTechnique->ViewValue = NULL;
			}
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// IndicationForART
			$this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
			$this->IndicationForART->ViewCustomAttributes = "";

			// PreTreatment
			if (strval($this->PreTreatment->CurrentValue) != "") {
				$this->PreTreatment->ViewValue = $this->PreTreatment->optionCaption($this->PreTreatment->CurrentValue);
			} else {
				$this->PreTreatment->ViewValue = NULL;
			}
			$this->PreTreatment->ViewCustomAttributes = "";

			// Hysteroscopy
			if (strval($this->Hysteroscopy->CurrentValue) != "") {
				$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
			} else {
				$this->Hysteroscopy->ViewValue = NULL;
			}
			$this->Hysteroscopy->ViewCustomAttributes = "";

			// EndometrialScratching
			if (strval($this->EndometrialScratching->CurrentValue) != "") {
				$this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
			} else {
				$this->EndometrialScratching->ViewValue = NULL;
			}
			$this->EndometrialScratching->ViewCustomAttributes = "";

			// TrialCannulation
			if (strval($this->TrialCannulation->CurrentValue) != "") {
				$this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
			} else {
				$this->TrialCannulation->ViewValue = NULL;
			}
			$this->TrialCannulation->ViewCustomAttributes = "";

			// CYCLETYPE
			if (strval($this->CYCLETYPE->CurrentValue) != "") {
				$this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
			} else {
				$this->CYCLETYPE->ViewValue = NULL;
			}
			$this->CYCLETYPE->ViewCustomAttributes = "";

			// HRTCYCLE
			$this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
			$this->HRTCYCLE->ViewCustomAttributes = "";

			// OralEstrogenDosage
			if (strval($this->OralEstrogenDosage->CurrentValue) != "") {
				$this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
			} else {
				$this->OralEstrogenDosage->ViewValue = NULL;
			}
			$this->OralEstrogenDosage->ViewCustomAttributes = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
			$this->VaginalEstrogen->ViewCustomAttributes = "";

			// GCSF
			if (strval($this->GCSF->CurrentValue) != "") {
				$this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
			} else {
				$this->GCSF->ViewValue = NULL;
			}
			$this->GCSF->ViewCustomAttributes = "";

			// ActivatedPRP
			if (strval($this->ActivatedPRP->CurrentValue) != "") {
				$this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
			} else {
				$this->ActivatedPRP->ViewValue = NULL;
			}
			$this->ActivatedPRP->ViewCustomAttributes = "";

			// ERA
			if (strval($this->ERA->CurrentValue) != "") {
				$this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
			} else {
				$this->ERA->ViewValue = NULL;
			}
			$this->ERA->ViewCustomAttributes = "";

			// UCLcm
			$this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
			$this->UCLcm->ViewCustomAttributes = "";

			// DATEOFSTART
			$this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
			$this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 11);
			$this->DATEOFSTART->ViewCustomAttributes = "";

			// DATEOFEMBRYOTRANSFER
			$this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
			$this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 11);
			$this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
			$this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
			$this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
			$this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
			$this->DAYOFEMBRYOS->ViewCustomAttributes = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
			$this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

			// Code1
			$this->Code1->ViewValue = $this->Code1->CurrentValue;
			$this->Code1->ViewCustomAttributes = "";

			// Code2
			$this->Code2->ViewValue = $this->Code2->CurrentValue;
			$this->Code2->ViewCustomAttributes = "";

			// CellStage1
			$this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
			$this->CellStage1->ViewCustomAttributes = "";

			// CellStage2
			$this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
			$this->CellStage2->ViewCustomAttributes = "";

			// Grade1
			$this->Grade1->ViewValue = $this->Grade1->CurrentValue;
			$this->Grade1->ViewCustomAttributes = "";

			// Grade2
			$this->Grade2->ViewValue = $this->Grade2->CurrentValue;
			$this->Grade2->ViewCustomAttributes = "";

			// PregnancyTestingWithSerumBetaHcG
			$this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
			$this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

			// ReviewDate
			$this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
			$this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
			$this->ReviewDate->ViewCustomAttributes = "";

			// ReviewDoctor
			$this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
			$this->ReviewDoctor->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";
			$this->ARTCycle->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";
			$this->InseminatinTechnique->TooltipValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";
			$this->IndicationForART->TooltipValue = "";

			// PreTreatment
			$this->PreTreatment->LinkCustomAttributes = "";
			$this->PreTreatment->HrefValue = "";
			$this->PreTreatment->TooltipValue = "";

			// Hysteroscopy
			$this->Hysteroscopy->LinkCustomAttributes = "";
			$this->Hysteroscopy->HrefValue = "";
			$this->Hysteroscopy->TooltipValue = "";

			// EndometrialScratching
			$this->EndometrialScratching->LinkCustomAttributes = "";
			$this->EndometrialScratching->HrefValue = "";
			$this->EndometrialScratching->TooltipValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";
			$this->TrialCannulation->TooltipValue = "";

			// CYCLETYPE
			$this->CYCLETYPE->LinkCustomAttributes = "";
			$this->CYCLETYPE->HrefValue = "";
			$this->CYCLETYPE->TooltipValue = "";

			// HRTCYCLE
			$this->HRTCYCLE->LinkCustomAttributes = "";
			$this->HRTCYCLE->HrefValue = "";
			$this->HRTCYCLE->TooltipValue = "";

			// OralEstrogenDosage
			$this->OralEstrogenDosage->LinkCustomAttributes = "";
			$this->OralEstrogenDosage->HrefValue = "";
			$this->OralEstrogenDosage->TooltipValue = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->LinkCustomAttributes = "";
			$this->VaginalEstrogen->HrefValue = "";
			$this->VaginalEstrogen->TooltipValue = "";

			// GCSF
			$this->GCSF->LinkCustomAttributes = "";
			$this->GCSF->HrefValue = "";
			$this->GCSF->TooltipValue = "";

			// ActivatedPRP
			$this->ActivatedPRP->LinkCustomAttributes = "";
			$this->ActivatedPRP->HrefValue = "";
			$this->ActivatedPRP->TooltipValue = "";

			// ERA
			$this->ERA->LinkCustomAttributes = "";
			$this->ERA->HrefValue = "";
			$this->ERA->TooltipValue = "";

			// UCLcm
			$this->UCLcm->LinkCustomAttributes = "";
			$this->UCLcm->HrefValue = "";
			$this->UCLcm->TooltipValue = "";

			// DATEOFSTART
			$this->DATEOFSTART->LinkCustomAttributes = "";
			$this->DATEOFSTART->HrefValue = "";
			$this->DATEOFSTART->TooltipValue = "";

			// DATEOFEMBRYOTRANSFER
			$this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DATEOFEMBRYOTRANSFER->HrefValue = "";
			$this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOTRANSFER->HrefValue = "";
			$this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTHAWED->HrefValue = "";
			$this->NOOFEMBRYOSTHAWED->TooltipValue = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
			$this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOS->HrefValue = "";
			$this->DAYOFEMBRYOS->TooltipValue = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
			$this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
			$this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

			// Code1
			$this->Code1->LinkCustomAttributes = "";
			$this->Code1->HrefValue = "";
			$this->Code1->TooltipValue = "";

			// Code2
			$this->Code2->LinkCustomAttributes = "";
			$this->Code2->HrefValue = "";
			$this->Code2->TooltipValue = "";

			// CellStage1
			$this->CellStage1->LinkCustomAttributes = "";
			$this->CellStage1->HrefValue = "";
			$this->CellStage1->TooltipValue = "";

			// CellStage2
			$this->CellStage2->LinkCustomAttributes = "";
			$this->CellStage2->HrefValue = "";
			$this->CellStage2->TooltipValue = "";

			// Grade1
			$this->Grade1->LinkCustomAttributes = "";
			$this->Grade1->HrefValue = "";
			$this->Grade1->TooltipValue = "";

			// Grade2
			$this->Grade2->LinkCustomAttributes = "";
			$this->Grade2->HrefValue = "";
			$this->Grade2->TooltipValue = "";

			// PregnancyTestingWithSerumBetaHcG
			$this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
			$this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
			$this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";
			$this->ReviewDate->TooltipValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";
			$this->ReviewDoctor->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_et_chartlist.php"), "", $this->TableVar, TRUE);
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
				case "x_ARTCycle":
					break;
				case "x_InseminatinTechnique":
					break;
				case "x_PreTreatment":
					break;
				case "x_Hysteroscopy":
					break;
				case "x_EndometrialScratching":
					break;
				case "x_TrialCannulation":
					break;
				case "x_CYCLETYPE":
					break;
				case "x_OralEstrogenDosage":
					break;
				case "x_GCSF":
					break;
				case "x_ActivatedPRP":
					break;
				case "x_ERA":
					break;
				case "x_TemplateProcedureRecord":
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Procedure Record'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateMedicationsadvised":
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Medications Advised'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePostProcedureInstructions":
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Post Procedure Instructions'";
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
						case "x_TemplateProcedureRecord":
							break;
						case "x_TemplateMedicationsadvised":
							break;
						case "x_TemplatePostProcedureInstructions":
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
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_ot_delivery_register_delete extends patient_ot_delivery_register
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_ot_delivery_register';

	// Page object name
	public $PageObjName = "patient_ot_delivery_register_delete";

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

		// Table object (patient_ot_delivery_register)
		if (!isset($GLOBALS["patient_ot_delivery_register"]) || get_class($GLOBALS["patient_ot_delivery_register"]) == PROJECT_NAMESPACE . "patient_ot_delivery_register") {
			$GLOBALS["patient_ot_delivery_register"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_ot_delivery_register"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_delivery_register');

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
		global $patient_ot_delivery_register;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_ot_delivery_register);
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
					$this->terminate(GetUrl("patient_ot_delivery_registerlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->mrnno->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->ObstetricsHistryMale->Visible = FALSE;
		$this->ObstetricsHistryFeMale->setVisibility();
		$this->Abortion->setVisibility();
		$this->ChildBirthDate->setVisibility();
		$this->ChildBirthTime->setVisibility();
		$this->ChildSex->setVisibility();
		$this->ChildWt->setVisibility();
		$this->ChildDay->setVisibility();
		$this->ChildOE->setVisibility();
		$this->TypeofDelivery->Visible = FALSE;
		$this->ChildBlGrp->setVisibility();
		$this->ApgarScore->setVisibility();
		$this->birthnotification->setVisibility();
		$this->formno->setVisibility();
		$this->dte->setVisibility();
		$this->motherReligion->setVisibility();
		$this->bloodgroup->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->PatientID->setVisibility();
		$this->HospID->setVisibility();
		$this->ChildBirthDate1->setVisibility();
		$this->ChildBirthTime1->setVisibility();
		$this->ChildSex1->setVisibility();
		$this->ChildWt1->setVisibility();
		$this->ChildDay1->setVisibility();
		$this->ChildOE1->setVisibility();
		$this->TypeofDelivery1->Visible = FALSE;
		$this->ChildBlGrp1->setVisibility();
		$this->ApgarScore1->setVisibility();
		$this->birthnotification1->setVisibility();
		$this->formno1->setVisibility();
		$this->proposedSurgery->Visible = FALSE;
		$this->surgeryProcedure->Visible = FALSE;
		$this->typeOfAnaesthesia->Visible = FALSE;
		$this->RecievedTime->setVisibility();
		$this->AnaesthesiaStarted->setVisibility();
		$this->AnaesthesiaEnded->setVisibility();
		$this->surgeryStarted->setVisibility();
		$this->surgeryEnded->setVisibility();
		$this->RecoveryTime->setVisibility();
		$this->ShiftedTime->setVisibility();
		$this->Duration->setVisibility();
		$this->DrVisit1->Visible = FALSE;
		$this->DrVisit2->Visible = FALSE;
		$this->DrVisit3->Visible = FALSE;
		$this->DrVisit4->Visible = FALSE;
		$this->Surgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AsstSurgeon1->setVisibility();
		$this->AsstSurgeon2->setVisibility();
		$this->paediatric->setVisibility();
		$this->ScrubNurse1->setVisibility();
		$this->ScrubNurse2->setVisibility();
		$this->FloorNurse->setVisibility();
		$this->Technician->setVisibility();
		$this->HouseKeeping->setVisibility();
		$this->countsCheckedMops->setVisibility();
		$this->gauze->setVisibility();
		$this->needles->setVisibility();
		$this->bloodloss->setVisibility();
		$this->bloodtransfusion->setVisibility();
		$this->implantsUsed->Visible = FALSE;
		$this->MaterialsForHPE->Visible = FALSE;
		$this->Reception->setVisibility();
		$this->PId->setVisibility();
		$this->PatientSearch->Visible = FALSE;
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
		$this->setupLookupOptions($this->DrVisit1);
		$this->setupLookupOptions($this->DrVisit2);
		$this->setupLookupOptions($this->DrVisit3);
		$this->setupLookupOptions($this->DrVisit4);
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anaesthetist);
		$this->setupLookupOptions($this->AsstSurgeon1);
		$this->setupLookupOptions($this->AsstSurgeon2);
		$this->setupLookupOptions($this->paediatric);
		$this->setupLookupOptions($this->PatientSearch);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("patient_ot_delivery_registerlist.php");
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
			$this->terminate("patient_ot_delivery_registerlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("patient_ot_delivery_registerlist.php"); // Return to list
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
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->ObstetricsHistryMale->setDbValue($row['ObstetricsHistryMale']);
		$this->ObstetricsHistryFeMale->setDbValue($row['ObstetricsHistryFeMale']);
		$this->Abortion->setDbValue($row['Abortion']);
		$this->ChildBirthDate->setDbValue($row['ChildBirthDate']);
		$this->ChildBirthTime->setDbValue($row['ChildBirthTime']);
		$this->ChildSex->setDbValue($row['ChildSex']);
		$this->ChildWt->setDbValue($row['ChildWt']);
		$this->ChildDay->setDbValue($row['ChildDay']);
		$this->ChildOE->setDbValue($row['ChildOE']);
		$this->TypeofDelivery->setDbValue($row['TypeofDelivery']);
		$this->ChildBlGrp->setDbValue($row['ChildBlGrp']);
		$this->ApgarScore->setDbValue($row['ApgarScore']);
		$this->birthnotification->setDbValue($row['birthnotification']);
		$this->formno->setDbValue($row['formno']);
		$this->dte->setDbValue($row['dte']);
		$this->motherReligion->setDbValue($row['motherReligion']);
		$this->bloodgroup->setDbValue($row['bloodgroup']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->ChildBirthDate1->setDbValue($row['ChildBirthDate1']);
		$this->ChildBirthTime1->setDbValue($row['ChildBirthTime1']);
		$this->ChildSex1->setDbValue($row['ChildSex1']);
		$this->ChildWt1->setDbValue($row['ChildWt1']);
		$this->ChildDay1->setDbValue($row['ChildDay1']);
		$this->ChildOE1->setDbValue($row['ChildOE1']);
		$this->TypeofDelivery1->setDbValue($row['TypeofDelivery1']);
		$this->ChildBlGrp1->setDbValue($row['ChildBlGrp1']);
		$this->ApgarScore1->setDbValue($row['ApgarScore1']);
		$this->birthnotification1->setDbValue($row['birthnotification1']);
		$this->formno1->setDbValue($row['formno1']);
		$this->proposedSurgery->setDbValue($row['proposedSurgery']);
		$this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
		$this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
		$this->RecievedTime->setDbValue($row['RecievedTime']);
		$this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
		$this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
		$this->surgeryStarted->setDbValue($row['surgeryStarted']);
		$this->surgeryEnded->setDbValue($row['surgeryEnded']);
		$this->RecoveryTime->setDbValue($row['RecoveryTime']);
		$this->ShiftedTime->setDbValue($row['ShiftedTime']);
		$this->Duration->setDbValue($row['Duration']);
		$this->DrVisit1->setDbValue($row['DrVisit1']);
		$this->DrVisit2->setDbValue($row['DrVisit2']);
		$this->DrVisit3->setDbValue($row['DrVisit3']);
		$this->DrVisit4->setDbValue($row['DrVisit4']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
		$this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
		$this->paediatric->setDbValue($row['paediatric']);
		$this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
		$this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
		$this->FloorNurse->setDbValue($row['FloorNurse']);
		$this->Technician->setDbValue($row['Technician']);
		$this->HouseKeeping->setDbValue($row['HouseKeeping']);
		$this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
		$this->gauze->setDbValue($row['gauze']);
		$this->needles->setDbValue($row['needles']);
		$this->bloodloss->setDbValue($row['bloodloss']);
		$this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
		$this->implantsUsed->setDbValue($row['implantsUsed']);
		$this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PId->setDbValue($row['PId']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatID'] = NULL;
		$row['PatientName'] = NULL;
		$row['mrnno'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['ObstetricsHistryMale'] = NULL;
		$row['ObstetricsHistryFeMale'] = NULL;
		$row['Abortion'] = NULL;
		$row['ChildBirthDate'] = NULL;
		$row['ChildBirthTime'] = NULL;
		$row['ChildSex'] = NULL;
		$row['ChildWt'] = NULL;
		$row['ChildDay'] = NULL;
		$row['ChildOE'] = NULL;
		$row['TypeofDelivery'] = NULL;
		$row['ChildBlGrp'] = NULL;
		$row['ApgarScore'] = NULL;
		$row['birthnotification'] = NULL;
		$row['formno'] = NULL;
		$row['dte'] = NULL;
		$row['motherReligion'] = NULL;
		$row['bloodgroup'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['PatientID'] = NULL;
		$row['HospID'] = NULL;
		$row['ChildBirthDate1'] = NULL;
		$row['ChildBirthTime1'] = NULL;
		$row['ChildSex1'] = NULL;
		$row['ChildWt1'] = NULL;
		$row['ChildDay1'] = NULL;
		$row['ChildOE1'] = NULL;
		$row['TypeofDelivery1'] = NULL;
		$row['ChildBlGrp1'] = NULL;
		$row['ApgarScore1'] = NULL;
		$row['birthnotification1'] = NULL;
		$row['formno1'] = NULL;
		$row['proposedSurgery'] = NULL;
		$row['surgeryProcedure'] = NULL;
		$row['typeOfAnaesthesia'] = NULL;
		$row['RecievedTime'] = NULL;
		$row['AnaesthesiaStarted'] = NULL;
		$row['AnaesthesiaEnded'] = NULL;
		$row['surgeryStarted'] = NULL;
		$row['surgeryEnded'] = NULL;
		$row['RecoveryTime'] = NULL;
		$row['ShiftedTime'] = NULL;
		$row['Duration'] = NULL;
		$row['DrVisit1'] = NULL;
		$row['DrVisit2'] = NULL;
		$row['DrVisit3'] = NULL;
		$row['DrVisit4'] = NULL;
		$row['Surgeon'] = NULL;
		$row['Anaesthetist'] = NULL;
		$row['AsstSurgeon1'] = NULL;
		$row['AsstSurgeon2'] = NULL;
		$row['paediatric'] = NULL;
		$row['ScrubNurse1'] = NULL;
		$row['ScrubNurse2'] = NULL;
		$row['FloorNurse'] = NULL;
		$row['Technician'] = NULL;
		$row['HouseKeeping'] = NULL;
		$row['countsCheckedMops'] = NULL;
		$row['gauze'] = NULL;
		$row['needles'] = NULL;
		$row['bloodloss'] = NULL;
		$row['bloodtransfusion'] = NULL;
		$row['implantsUsed'] = NULL;
		$row['MaterialsForHPE'] = NULL;
		$row['Reception'] = NULL;
		$row['PId'] = NULL;
		$row['PatientSearch'] = NULL;
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
		// PatID
		// PatientName
		// mrnno
		// MobileNumber
		// Age
		// Gender
		// profilePic
		// ObstetricsHistryMale
		// ObstetricsHistryFeMale
		// Abortion
		// ChildBirthDate
		// ChildBirthTime
		// ChildSex
		// ChildWt
		// ChildDay
		// ChildOE
		// TypeofDelivery
		// ChildBlGrp
		// ApgarScore
		// birthnotification
		// formno
		// dte
		// motherReligion
		// bloodgroup
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatientID
		// HospID
		// ChildBirthDate1
		// ChildBirthTime1
		// ChildSex1
		// ChildWt1
		// ChildDay1
		// ChildOE1
		// TypeofDelivery1
		// ChildBlGrp1
		// ApgarScore1
		// birthnotification1
		// formno1
		// proposedSurgery
		// surgeryProcedure
		// typeOfAnaesthesia
		// RecievedTime
		// AnaesthesiaStarted
		// AnaesthesiaEnded
		// surgeryStarted
		// surgeryEnded
		// RecoveryTime
		// ShiftedTime
		// Duration
		// DrVisit1
		// DrVisit2
		// DrVisit3
		// DrVisit4
		// Surgeon
		// Anaesthetist
		// AsstSurgeon1
		// AsstSurgeon2
		// paediatric
		// ScrubNurse1
		// ScrubNurse2
		// FloorNurse
		// Technician
		// HouseKeeping
		// countsCheckedMops
		// gauze
		// needles
		// bloodloss
		// bloodtransfusion
		// implantsUsed
		// MaterialsForHPE
		// Reception
		// PId
		// PatientSearch

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// ObstetricsHistryFeMale
			$this->ObstetricsHistryFeMale->ViewValue = $this->ObstetricsHistryFeMale->CurrentValue;
			$this->ObstetricsHistryFeMale->ViewCustomAttributes = "";

			// Abortion
			$this->Abortion->ViewValue = $this->Abortion->CurrentValue;
			$this->Abortion->ViewCustomAttributes = "";

			// ChildBirthDate
			$this->ChildBirthDate->ViewValue = $this->ChildBirthDate->CurrentValue;
			$this->ChildBirthDate->ViewValue = FormatDateTime($this->ChildBirthDate->ViewValue, 7);
			$this->ChildBirthDate->ViewCustomAttributes = "";

			// ChildBirthTime
			$this->ChildBirthTime->ViewValue = $this->ChildBirthTime->CurrentValue;
			$this->ChildBirthTime->ViewCustomAttributes = "";

			// ChildSex
			$this->ChildSex->ViewValue = $this->ChildSex->CurrentValue;
			$this->ChildSex->ViewCustomAttributes = "";

			// ChildWt
			$this->ChildWt->ViewValue = $this->ChildWt->CurrentValue;
			$this->ChildWt->ViewCustomAttributes = "";

			// ChildDay
			$this->ChildDay->ViewValue = $this->ChildDay->CurrentValue;
			$this->ChildDay->ViewCustomAttributes = "";

			// ChildOE
			$this->ChildOE->ViewValue = $this->ChildOE->CurrentValue;
			$this->ChildOE->ViewCustomAttributes = "";

			// ChildBlGrp
			$this->ChildBlGrp->ViewValue = $this->ChildBlGrp->CurrentValue;
			$this->ChildBlGrp->ViewCustomAttributes = "";

			// ApgarScore
			$this->ApgarScore->ViewValue = $this->ApgarScore->CurrentValue;
			$this->ApgarScore->ViewCustomAttributes = "";

			// birthnotification
			$this->birthnotification->ViewValue = $this->birthnotification->CurrentValue;
			$this->birthnotification->ViewCustomAttributes = "";

			// formno
			$this->formno->ViewValue = $this->formno->CurrentValue;
			$this->formno->ViewCustomAttributes = "";

			// dte
			$this->dte->ViewValue = $this->dte->CurrentValue;
			$this->dte->ViewValue = FormatDateTime($this->dte->ViewValue, 0);
			$this->dte->ViewCustomAttributes = "";

			// motherReligion
			$this->motherReligion->ViewValue = $this->motherReligion->CurrentValue;
			$this->motherReligion->ViewCustomAttributes = "";

			// bloodgroup
			$this->bloodgroup->ViewValue = $this->bloodgroup->CurrentValue;
			$this->bloodgroup->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
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

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// ChildBirthDate1
			$this->ChildBirthDate1->ViewValue = $this->ChildBirthDate1->CurrentValue;
			$this->ChildBirthDate1->ViewValue = FormatDateTime($this->ChildBirthDate1->ViewValue, 0);
			$this->ChildBirthDate1->ViewCustomAttributes = "";

			// ChildBirthTime1
			$this->ChildBirthTime1->ViewValue = $this->ChildBirthTime1->CurrentValue;
			$this->ChildBirthTime1->ViewCustomAttributes = "";

			// ChildSex1
			$this->ChildSex1->ViewValue = $this->ChildSex1->CurrentValue;
			$this->ChildSex1->ViewCustomAttributes = "";

			// ChildWt1
			$this->ChildWt1->ViewValue = $this->ChildWt1->CurrentValue;
			$this->ChildWt1->ViewCustomAttributes = "";

			// ChildDay1
			$this->ChildDay1->ViewValue = $this->ChildDay1->CurrentValue;
			$this->ChildDay1->ViewCustomAttributes = "";

			// ChildOE1
			$this->ChildOE1->ViewValue = $this->ChildOE1->CurrentValue;
			$this->ChildOE1->ViewCustomAttributes = "";

			// ChildBlGrp1
			$this->ChildBlGrp1->ViewValue = $this->ChildBlGrp1->CurrentValue;
			$this->ChildBlGrp1->ViewCustomAttributes = "";

			// ApgarScore1
			$this->ApgarScore1->ViewValue = $this->ApgarScore1->CurrentValue;
			$this->ApgarScore1->ViewCustomAttributes = "";

			// birthnotification1
			$this->birthnotification1->ViewValue = $this->birthnotification1->CurrentValue;
			$this->birthnotification1->ViewCustomAttributes = "";

			// formno1
			$this->formno1->ViewValue = $this->formno1->CurrentValue;
			$this->formno1->ViewCustomAttributes = "";

			// RecievedTime
			$this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
			$this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
			$this->RecievedTime->ViewCustomAttributes = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
			$this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
			$this->AnaesthesiaStarted->ViewCustomAttributes = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
			$this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
			$this->AnaesthesiaEnded->ViewCustomAttributes = "";

			// surgeryStarted
			$this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
			$this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
			$this->surgeryStarted->ViewCustomAttributes = "";

			// surgeryEnded
			$this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
			$this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 11);
			$this->surgeryEnded->ViewCustomAttributes = "";

			// RecoveryTime
			$this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
			$this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
			$this->RecoveryTime->ViewCustomAttributes = "";

			// ShiftedTime
			$this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
			$this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
			$this->ShiftedTime->ViewCustomAttributes = "";

			// Duration
			$this->Duration->ViewValue = $this->Duration->CurrentValue;
			$this->Duration->ViewCustomAttributes = "";

			// Surgeon
			$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal != "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
					}
				}
			} else {
				$this->Surgeon->ViewValue = NULL;
			}
			$this->Surgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
			$curVal = strval($this->Anaesthetist->CurrentValue);
			if ($curVal != "") {
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
				if ($this->Anaesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anaesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anaesthetist->ViewValue = NULL;
			}
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
			$curVal = strval($this->AsstSurgeon1->CurrentValue);
			if ($curVal != "") {
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
				if ($this->AsstSurgeon1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon1->ViewValue = NULL;
			}
			$this->AsstSurgeon1->ViewCustomAttributes = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
			$curVal = strval($this->AsstSurgeon2->CurrentValue);
			if ($curVal != "") {
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
				if ($this->AsstSurgeon2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon2->ViewValue = NULL;
			}
			$this->AsstSurgeon2->ViewCustomAttributes = "";

			// paediatric
			$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
			$curVal = strval($this->paediatric->CurrentValue);
			if ($curVal != "") {
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
				if ($this->paediatric->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->paediatric->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
					}
				}
			} else {
				$this->paediatric->ViewValue = NULL;
			}
			$this->paediatric->ViewCustomAttributes = "";

			// ScrubNurse1
			$this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
			$this->ScrubNurse1->ViewCustomAttributes = "";

			// ScrubNurse2
			$this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
			$this->ScrubNurse2->ViewCustomAttributes = "";

			// FloorNurse
			$this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
			$this->FloorNurse->ViewCustomAttributes = "";

			// Technician
			$this->Technician->ViewValue = $this->Technician->CurrentValue;
			$this->Technician->ViewCustomAttributes = "";

			// HouseKeeping
			$this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
			$this->HouseKeeping->ViewCustomAttributes = "";

			// countsCheckedMops
			$this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
			$this->countsCheckedMops->ViewCustomAttributes = "";

			// gauze
			$this->gauze->ViewValue = $this->gauze->CurrentValue;
			$this->gauze->ViewCustomAttributes = "";

			// needles
			$this->needles->ViewValue = $this->needles->CurrentValue;
			$this->needles->ViewCustomAttributes = "";

			// bloodloss
			$this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
			$this->bloodloss->ViewCustomAttributes = "";

			// bloodtransfusion
			$this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
			$this->bloodtransfusion->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// ObstetricsHistryFeMale
			$this->ObstetricsHistryFeMale->LinkCustomAttributes = "";
			$this->ObstetricsHistryFeMale->HrefValue = "";
			$this->ObstetricsHistryFeMale->TooltipValue = "";

			// Abortion
			$this->Abortion->LinkCustomAttributes = "";
			$this->Abortion->HrefValue = "";
			$this->Abortion->TooltipValue = "";

			// ChildBirthDate
			$this->ChildBirthDate->LinkCustomAttributes = "";
			$this->ChildBirthDate->HrefValue = "";
			$this->ChildBirthDate->TooltipValue = "";

			// ChildBirthTime
			$this->ChildBirthTime->LinkCustomAttributes = "";
			$this->ChildBirthTime->HrefValue = "";
			$this->ChildBirthTime->TooltipValue = "";

			// ChildSex
			$this->ChildSex->LinkCustomAttributes = "";
			$this->ChildSex->HrefValue = "";
			$this->ChildSex->TooltipValue = "";

			// ChildWt
			$this->ChildWt->LinkCustomAttributes = "";
			$this->ChildWt->HrefValue = "";
			$this->ChildWt->TooltipValue = "";

			// ChildDay
			$this->ChildDay->LinkCustomAttributes = "";
			$this->ChildDay->HrefValue = "";
			$this->ChildDay->TooltipValue = "";

			// ChildOE
			$this->ChildOE->LinkCustomAttributes = "";
			$this->ChildOE->HrefValue = "";
			$this->ChildOE->TooltipValue = "";

			// ChildBlGrp
			$this->ChildBlGrp->LinkCustomAttributes = "";
			$this->ChildBlGrp->HrefValue = "";
			$this->ChildBlGrp->TooltipValue = "";

			// ApgarScore
			$this->ApgarScore->LinkCustomAttributes = "";
			$this->ApgarScore->HrefValue = "";
			$this->ApgarScore->TooltipValue = "";

			// birthnotification
			$this->birthnotification->LinkCustomAttributes = "";
			$this->birthnotification->HrefValue = "";
			$this->birthnotification->TooltipValue = "";

			// formno
			$this->formno->LinkCustomAttributes = "";
			$this->formno->HrefValue = "";
			$this->formno->TooltipValue = "";

			// dte
			$this->dte->LinkCustomAttributes = "";
			$this->dte->HrefValue = "";
			$this->dte->TooltipValue = "";

			// motherReligion
			$this->motherReligion->LinkCustomAttributes = "";
			$this->motherReligion->HrefValue = "";
			$this->motherReligion->TooltipValue = "";

			// bloodgroup
			$this->bloodgroup->LinkCustomAttributes = "";
			$this->bloodgroup->HrefValue = "";
			$this->bloodgroup->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

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

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// ChildBirthDate1
			$this->ChildBirthDate1->LinkCustomAttributes = "";
			$this->ChildBirthDate1->HrefValue = "";
			$this->ChildBirthDate1->TooltipValue = "";

			// ChildBirthTime1
			$this->ChildBirthTime1->LinkCustomAttributes = "";
			$this->ChildBirthTime1->HrefValue = "";
			$this->ChildBirthTime1->TooltipValue = "";

			// ChildSex1
			$this->ChildSex1->LinkCustomAttributes = "";
			$this->ChildSex1->HrefValue = "";
			$this->ChildSex1->TooltipValue = "";

			// ChildWt1
			$this->ChildWt1->LinkCustomAttributes = "";
			$this->ChildWt1->HrefValue = "";
			$this->ChildWt1->TooltipValue = "";

			// ChildDay1
			$this->ChildDay1->LinkCustomAttributes = "";
			$this->ChildDay1->HrefValue = "";
			$this->ChildDay1->TooltipValue = "";

			// ChildOE1
			$this->ChildOE1->LinkCustomAttributes = "";
			$this->ChildOE1->HrefValue = "";
			$this->ChildOE1->TooltipValue = "";

			// ChildBlGrp1
			$this->ChildBlGrp1->LinkCustomAttributes = "";
			$this->ChildBlGrp1->HrefValue = "";
			$this->ChildBlGrp1->TooltipValue = "";

			// ApgarScore1
			$this->ApgarScore1->LinkCustomAttributes = "";
			$this->ApgarScore1->HrefValue = "";
			$this->ApgarScore1->TooltipValue = "";

			// birthnotification1
			$this->birthnotification1->LinkCustomAttributes = "";
			$this->birthnotification1->HrefValue = "";
			$this->birthnotification1->TooltipValue = "";

			// formno1
			$this->formno1->LinkCustomAttributes = "";
			$this->formno1->HrefValue = "";
			$this->formno1->TooltipValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";
			$this->RecievedTime->TooltipValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";
			$this->AnaesthesiaStarted->TooltipValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";
			$this->AnaesthesiaEnded->TooltipValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";
			$this->surgeryStarted->TooltipValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";
			$this->surgeryEnded->TooltipValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";
			$this->RecoveryTime->TooltipValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";
			$this->ShiftedTime->TooltipValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";
			$this->Duration->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";
			$this->AsstSurgeon1->TooltipValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";
			$this->AsstSurgeon2->TooltipValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";
			$this->paediatric->TooltipValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";
			$this->ScrubNurse1->TooltipValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";
			$this->ScrubNurse2->TooltipValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";
			$this->FloorNurse->TooltipValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";
			$this->Technician->TooltipValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";
			$this->HouseKeeping->TooltipValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";
			$this->countsCheckedMops->TooltipValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";
			$this->gauze->TooltipValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";
			$this->needles->TooltipValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";
			$this->bloodloss->TooltipValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";
			$this->bloodtransfusion->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setQueryStringValue($parm);
					$this->Reception->setQueryStringValue($GLOBALS["ip_admission"]->id->QueryStringValue);
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setQueryStringValue($parm);
					$this->mrnno->setQueryStringValue($GLOBALS["ip_admission"]->mrnNo->QueryStringValue);
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_patient_id", Get("PId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setQueryStringValue($parm);
					$this->PId->setQueryStringValue($GLOBALS["ip_admission"]->patient_id->QueryStringValue);
					$this->PId->setSessionValue($this->PId->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->QueryStringValue))
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setFormValue($parm);
					$this->Reception->setFormValue($GLOBALS["ip_admission"]->id->FormValue);
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setFormValue($parm);
					$this->mrnno->setFormValue($GLOBALS["ip_admission"]->mrnNo->FormValue);
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_patient_id", Post("PId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setFormValue($parm);
					$this->PId->setFormValue($GLOBALS["ip_admission"]->patient_id->FormValue);
					$this->PId->setSessionValue($this->PId->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->FormValue))
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
			if ($masterTblVar != "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
				if ($this->PId->CurrentValue == "")
					$this->PId->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_ot_delivery_registerlist.php"), "", $this->TableVar, TRUE);
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
				case "x_DrVisit1":
					break;
				case "x_DrVisit2":
					break;
				case "x_DrVisit3":
					break;
				case "x_DrVisit4":
					break;
				case "x_Surgeon":
					break;
				case "x_Anaesthetist":
					break;
				case "x_AsstSurgeon1":
					break;
				case "x_AsstSurgeon2":
					break;
				case "x_paediatric":
					break;
				case "x_PatientSearch":
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
						case "x_DrVisit1":
							break;
						case "x_DrVisit2":
							break;
						case "x_DrVisit3":
							break;
						case "x_DrVisit4":
							break;
						case "x_Surgeon":
							break;
						case "x_Anaesthetist":
							break;
						case "x_AsstSurgeon1":
							break;
						case "x_AsstSurgeon2":
							break;
						case "x_paediatric":
							break;
						case "x_PatientSearch":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_vitals_history_delete extends view_vitals_history
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_vitals_history';

	// Page object name
	public $PageObjName = "view_vitals_history_delete";

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

		// Table object (view_vitals_history)
		if (!isset($GLOBALS["view_vitals_history"]) || get_class($GLOBALS["view_vitals_history"]) == PROJECT_NAMESPACE . "view_vitals_history") {
			$GLOBALS["view_vitals_history"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_vitals_history"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_vitals_history');

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
		global $EXPORT, $view_vitals_history;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_vitals_history);
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
					$this->terminate(GetUrl("view_vitals_historylist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->Age->setVisibility();
		$this->SEX->setVisibility();
		$this->Religion->setVisibility();
		$this->Address->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->DoublewitnessName1->setVisibility();
		$this->DoublewitnessName2->setVisibility();
		$this->Chiefcomplaints->setVisibility();
		$this->MenstrualHistory->setVisibility();
		$this->ObstetricHistory->setVisibility();
		$this->MedicalHistory->setVisibility();
		$this->SurgicalHistory->setVisibility();
		$this->Generalexaminationpallor->setVisibility();
		$this->PR->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->PROVISIONALDIAGNOSIS->setVisibility();
		$this->Investigations->setVisibility();
		$this->Fheight->setVisibility();
		$this->Fweight->setVisibility();
		$this->FBMI->setVisibility();
		$this->FBloodgroup->setVisibility();
		$this->Mheight->setVisibility();
		$this->Mweight->setVisibility();
		$this->MBMI->setVisibility();
		$this->MBloodgroup->setVisibility();
		$this->FBuild->setVisibility();
		$this->MBuild->setVisibility();
		$this->FSkinColor->setVisibility();
		$this->MSkinColor->setVisibility();
		$this->FEyesColor->setVisibility();
		$this->MEyesColor->setVisibility();
		$this->FHairColor->setVisibility();
		$this->MhairColor->setVisibility();
		$this->FhairTexture->setVisibility();
		$this->MHairTexture->setVisibility();
		$this->Fothers->setVisibility();
		$this->Mothers->setVisibility();
		$this->PGE->setVisibility();
		$this->PPR->setVisibility();
		$this->PBP->setVisibility();
		$this->Breast->setVisibility();
		$this->PPA->setVisibility();
		$this->PPSV->setVisibility();
		$this->PPAPSMEAR->setVisibility();
		$this->PTHYROID->setVisibility();
		$this->MTHYROID->setVisibility();
		$this->SecSexCharacters->setVisibility();
		$this->PenisUM->setVisibility();
		$this->VAS->setVisibility();
		$this->EPIDIDYMIS->setVisibility();
		$this->Varicocele->setVisibility();
		$this->FertilityTreatmentHistory->Visible = FALSE;
		$this->SurgeryHistory->Visible = FALSE;
		$this->FamilyHistory->setVisibility();
		$this->PInvestigations->Visible = FALSE;
		$this->Addictions->setVisibility();
		$this->Medications->Visible = FALSE;
		$this->Medical->setVisibility();
		$this->Surgical->setVisibility();
		$this->CoitalHistory->setVisibility();
		$this->SemenAnalysis->Visible = FALSE;
		$this->MInsvestications->Visible = FALSE;
		$this->PImpression->Visible = FALSE;
		$this->MIMpression->Visible = FALSE;
		$this->PPlanOfManagement->Visible = FALSE;
		$this->MPlanOfManagement->Visible = FALSE;
		$this->PReadMore->Visible = FALSE;
		$this->MReadMore->Visible = FALSE;
		$this->MariedFor->setVisibility();
		$this->CMNCM->setVisibility();
		$this->TidNo->setVisibility();
		$this->pFamilyHistory->setVisibility();
		$this->pTemplateMedications->Visible = FALSE;
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
		$this->setupLookupOptions($this->FBloodgroup);
		$this->setupLookupOptions($this->MBloodgroup);
		$this->setupLookupOptions($this->FamilyHistory);
		$this->setupLookupOptions($this->Surgical);
		$this->setupLookupOptions($this->CoitalHistory);
		$this->setupLookupOptions($this->pFamilyHistory);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("view_vitals_historylist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("view_vitals_historylist.php"); // Return to list
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
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
		$this->id->setDbValue($row['id']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->Age->setDbValue($row['Age']);
		$this->SEX->setDbValue($row['SEX']);
		$this->Religion->setDbValue($row['Religion']);
		$this->Address->setDbValue($row['Address']);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->DoublewitnessName1->setDbValue($row['DoublewitnessName1']);
		$this->DoublewitnessName2->setDbValue($row['DoublewitnessName2']);
		$this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
		$this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
		$this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
		$this->MedicalHistory->setDbValue($row['MedicalHistory']);
		$this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
		$this->Generalexaminationpallor->setDbValue($row['Generalexaminationpallor']);
		$this->PR->setDbValue($row['PR']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
		$this->Investigations->setDbValue($row['Investigations']);
		$this->Fheight->setDbValue($row['Fheight']);
		$this->Fweight->setDbValue($row['Fweight']);
		$this->FBMI->setDbValue($row['FBMI']);
		$this->FBloodgroup->setDbValue($row['FBloodgroup']);
		$this->Mheight->setDbValue($row['Mheight']);
		$this->Mweight->setDbValue($row['Mweight']);
		$this->MBMI->setDbValue($row['MBMI']);
		$this->MBloodgroup->setDbValue($row['MBloodgroup']);
		$this->FBuild->setDbValue($row['FBuild']);
		$this->MBuild->setDbValue($row['MBuild']);
		$this->FSkinColor->setDbValue($row['FSkinColor']);
		$this->MSkinColor->setDbValue($row['MSkinColor']);
		$this->FEyesColor->setDbValue($row['FEyesColor']);
		$this->MEyesColor->setDbValue($row['MEyesColor']);
		$this->FHairColor->setDbValue($row['FHairColor']);
		$this->MhairColor->setDbValue($row['MhairColor']);
		$this->FhairTexture->setDbValue($row['FhairTexture']);
		$this->MHairTexture->setDbValue($row['MHairTexture']);
		$this->Fothers->setDbValue($row['Fothers']);
		$this->Mothers->setDbValue($row['Mothers']);
		$this->PGE->setDbValue($row['PGE']);
		$this->PPR->setDbValue($row['PPR']);
		$this->PBP->setDbValue($row['PBP']);
		$this->Breast->setDbValue($row['Breast']);
		$this->PPA->setDbValue($row['PPA']);
		$this->PPSV->setDbValue($row['PPSV']);
		$this->PPAPSMEAR->setDbValue($row['PPAPSMEAR']);
		$this->PTHYROID->setDbValue($row['PTHYROID']);
		$this->MTHYROID->setDbValue($row['MTHYROID']);
		$this->SecSexCharacters->setDbValue($row['SecSexCharacters']);
		$this->PenisUM->setDbValue($row['PenisUM']);
		$this->VAS->setDbValue($row['VAS']);
		$this->EPIDIDYMIS->setDbValue($row['EPIDIDYMIS']);
		$this->Varicocele->setDbValue($row['Varicocele']);
		$this->FertilityTreatmentHistory->setDbValue($row['FertilityTreatmentHistory']);
		$this->SurgeryHistory->setDbValue($row['SurgeryHistory']);
		$this->FamilyHistory->setDbValue($row['FamilyHistory']);
		$this->PInvestigations->setDbValue($row['PInvestigations']);
		$this->Addictions->setDbValue($row['Addictions']);
		$this->Medications->setDbValue($row['Medications']);
		$this->Medical->setDbValue($row['Medical']);
		$this->Surgical->setDbValue($row['Surgical']);
		if (array_key_exists('EV__Surgical', $rs->fields)) {
			$this->Surgical->VirtualValue = $rs->fields('EV__Surgical'); // Set up virtual field value
		} else {
			$this->Surgical->VirtualValue = ""; // Clear value
		}
		$this->CoitalHistory->setDbValue($row['CoitalHistory']);
		$this->SemenAnalysis->setDbValue($row['SemenAnalysis']);
		$this->MInsvestications->setDbValue($row['MInsvestications']);
		$this->PImpression->setDbValue($row['PImpression']);
		$this->MIMpression->setDbValue($row['MIMpression']);
		$this->PPlanOfManagement->setDbValue($row['PPlanOfManagement']);
		$this->MPlanOfManagement->setDbValue($row['MPlanOfManagement']);
		$this->PReadMore->setDbValue($row['PReadMore']);
		$this->MReadMore->setDbValue($row['MReadMore']);
		$this->MariedFor->setDbValue($row['MariedFor']);
		$this->CMNCM->setDbValue($row['CMNCM']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->pFamilyHistory->setDbValue($row['pFamilyHistory']);
		$this->pTemplateMedications->setDbValue($row['pTemplateMedications']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['SEX'] = NULL;
		$row['Religion'] = NULL;
		$row['Address'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['DoublewitnessName1'] = NULL;
		$row['DoublewitnessName2'] = NULL;
		$row['Chiefcomplaints'] = NULL;
		$row['MenstrualHistory'] = NULL;
		$row['ObstetricHistory'] = NULL;
		$row['MedicalHistory'] = NULL;
		$row['SurgicalHistory'] = NULL;
		$row['Generalexaminationpallor'] = NULL;
		$row['PR'] = NULL;
		$row['CVS'] = NULL;
		$row['PA'] = NULL;
		$row['PROVISIONALDIAGNOSIS'] = NULL;
		$row['Investigations'] = NULL;
		$row['Fheight'] = NULL;
		$row['Fweight'] = NULL;
		$row['FBMI'] = NULL;
		$row['FBloodgroup'] = NULL;
		$row['Mheight'] = NULL;
		$row['Mweight'] = NULL;
		$row['MBMI'] = NULL;
		$row['MBloodgroup'] = NULL;
		$row['FBuild'] = NULL;
		$row['MBuild'] = NULL;
		$row['FSkinColor'] = NULL;
		$row['MSkinColor'] = NULL;
		$row['FEyesColor'] = NULL;
		$row['MEyesColor'] = NULL;
		$row['FHairColor'] = NULL;
		$row['MhairColor'] = NULL;
		$row['FhairTexture'] = NULL;
		$row['MHairTexture'] = NULL;
		$row['Fothers'] = NULL;
		$row['Mothers'] = NULL;
		$row['PGE'] = NULL;
		$row['PPR'] = NULL;
		$row['PBP'] = NULL;
		$row['Breast'] = NULL;
		$row['PPA'] = NULL;
		$row['PPSV'] = NULL;
		$row['PPAPSMEAR'] = NULL;
		$row['PTHYROID'] = NULL;
		$row['MTHYROID'] = NULL;
		$row['SecSexCharacters'] = NULL;
		$row['PenisUM'] = NULL;
		$row['VAS'] = NULL;
		$row['EPIDIDYMIS'] = NULL;
		$row['Varicocele'] = NULL;
		$row['FertilityTreatmentHistory'] = NULL;
		$row['SurgeryHistory'] = NULL;
		$row['FamilyHistory'] = NULL;
		$row['PInvestigations'] = NULL;
		$row['Addictions'] = NULL;
		$row['Medications'] = NULL;
		$row['Medical'] = NULL;
		$row['Surgical'] = NULL;
		$row['CoitalHistory'] = NULL;
		$row['SemenAnalysis'] = NULL;
		$row['MInsvestications'] = NULL;
		$row['PImpression'] = NULL;
		$row['MIMpression'] = NULL;
		$row['PPlanOfManagement'] = NULL;
		$row['MPlanOfManagement'] = NULL;
		$row['PReadMore'] = NULL;
		$row['MReadMore'] = NULL;
		$row['MariedFor'] = NULL;
		$row['CMNCM'] = NULL;
		$row['TidNo'] = NULL;
		$row['pFamilyHistory'] = NULL;
		$row['pTemplateMedications'] = NULL;
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
		// Age
		// SEX
		// Religion
		// Address
		// IdentificationMark
		// DoublewitnessName1
		// DoublewitnessName2
		// Chiefcomplaints
		// MenstrualHistory
		// ObstetricHistory
		// MedicalHistory
		// SurgicalHistory
		// Generalexaminationpallor
		// PR
		// CVS
		// PA
		// PROVISIONALDIAGNOSIS
		// Investigations
		// Fheight
		// Fweight
		// FBMI
		// FBloodgroup
		// Mheight
		// Mweight
		// MBMI
		// MBloodgroup
		// FBuild
		// MBuild
		// FSkinColor
		// MSkinColor
		// FEyesColor
		// MEyesColor
		// FHairColor
		// MhairColor
		// FhairTexture
		// MHairTexture
		// Fothers
		// Mothers
		// PGE
		// PPR
		// PBP
		// Breast
		// PPA
		// PPSV
		// PPAPSMEAR
		// PTHYROID
		// MTHYROID
		// SecSexCharacters
		// PenisUM
		// VAS
		// EPIDIDYMIS
		// Varicocele
		// FertilityTreatmentHistory
		// SurgeryHistory
		// FamilyHistory
		// PInvestigations
		// Addictions
		// Medications
		// Medical
		// Surgical
		// CoitalHistory
		// SemenAnalysis
		// MInsvestications
		// PImpression
		// MIMpression
		// PPlanOfManagement
		// MPlanOfManagement
		// PReadMore
		// MReadMore
		// MariedFor
		// CMNCM
		// TidNo
		// pFamilyHistory
		// pTemplateMedications

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

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// SEX
			$this->SEX->ViewValue = $this->SEX->CurrentValue;
			$this->SEX->ViewCustomAttributes = "";

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->ViewCustomAttributes = "";

			// Address
			$this->Address->ViewValue = $this->Address->CurrentValue;
			$this->Address->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// DoublewitnessName1
			$this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
			$this->DoublewitnessName1->ViewCustomAttributes = "";

			// DoublewitnessName2
			$this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
			$this->DoublewitnessName2->ViewCustomAttributes = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
			$this->Chiefcomplaints->ViewCustomAttributes = "";

			// MenstrualHistory
			$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// ObstetricHistory
			$this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
			$this->ObstetricHistory->ViewCustomAttributes = "";

			// MedicalHistory
			if (strval($this->MedicalHistory->CurrentValue) <> "") {
				$this->MedicalHistory->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->MedicalHistory->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->MedicalHistory->ViewValue->add($this->MedicalHistory->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->MedicalHistory->ViewValue = NULL;
			}
			$this->MedicalHistory->ViewCustomAttributes = "";

			// SurgicalHistory
			$this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
			$this->SurgicalHistory->ViewCustomAttributes = "";

			// Generalexaminationpallor
			$this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
			$this->Generalexaminationpallor->ViewCustomAttributes = "";

			// PR
			$this->PR->ViewValue = $this->PR->CurrentValue;
			$this->PR->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
			$this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

			// Investigations
			$this->Investigations->ViewValue = $this->Investigations->CurrentValue;
			$this->Investigations->ViewCustomAttributes = "";

			// Fheight
			$this->Fheight->ViewValue = $this->Fheight->CurrentValue;
			$this->Fheight->ViewCustomAttributes = "";

			// Fweight
			$this->Fweight->ViewValue = $this->Fweight->CurrentValue;
			$this->Fweight->ViewCustomAttributes = "";

			// FBMI
			$this->FBMI->ViewValue = $this->FBMI->CurrentValue;
			$this->FBMI->ViewCustomAttributes = "";

			// FBloodgroup
			$curVal = strval($this->FBloodgroup->CurrentValue);
			if ($curVal <> "") {
				$this->FBloodgroup->ViewValue = $this->FBloodgroup->lookupCacheOption($curVal);
				if ($this->FBloodgroup->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->FBloodgroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->FBloodgroup->ViewValue = $this->FBloodgroup->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
					}
				}
			} else {
				$this->FBloodgroup->ViewValue = NULL;
			}
			$this->FBloodgroup->ViewCustomAttributes = "";

			// Mheight
			$this->Mheight->ViewValue = $this->Mheight->CurrentValue;
			$this->Mheight->ViewCustomAttributes = "";

			// Mweight
			$this->Mweight->ViewValue = $this->Mweight->CurrentValue;
			$this->Mweight->ViewCustomAttributes = "";

			// MBMI
			$this->MBMI->ViewValue = $this->MBMI->CurrentValue;
			$this->MBMI->ViewCustomAttributes = "";

			// MBloodgroup
			$curVal = strval($this->MBloodgroup->CurrentValue);
			if ($curVal <> "") {
				$this->MBloodgroup->ViewValue = $this->MBloodgroup->lookupCacheOption($curVal);
				if ($this->MBloodgroup->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MBloodgroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->MBloodgroup->ViewValue = $this->MBloodgroup->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
					}
				}
			} else {
				$this->MBloodgroup->ViewValue = NULL;
			}
			$this->MBloodgroup->ViewCustomAttributes = "";

			// FBuild
			if (strval($this->FBuild->CurrentValue) <> "") {
				$this->FBuild->ViewValue = $this->FBuild->optionCaption($this->FBuild->CurrentValue);
			} else {
				$this->FBuild->ViewValue = NULL;
			}
			$this->FBuild->ViewCustomAttributes = "";

			// MBuild
			if (strval($this->MBuild->CurrentValue) <> "") {
				$this->MBuild->ViewValue = $this->MBuild->optionCaption($this->MBuild->CurrentValue);
			} else {
				$this->MBuild->ViewValue = NULL;
			}
			$this->MBuild->ViewCustomAttributes = "";

			// FSkinColor
			if (strval($this->FSkinColor->CurrentValue) <> "") {
				$this->FSkinColor->ViewValue = $this->FSkinColor->optionCaption($this->FSkinColor->CurrentValue);
			} else {
				$this->FSkinColor->ViewValue = NULL;
			}
			$this->FSkinColor->ViewCustomAttributes = "";

			// MSkinColor
			if (strval($this->MSkinColor->CurrentValue) <> "") {
				$this->MSkinColor->ViewValue = $this->MSkinColor->optionCaption($this->MSkinColor->CurrentValue);
			} else {
				$this->MSkinColor->ViewValue = NULL;
			}
			$this->MSkinColor->ViewCustomAttributes = "";

			// FEyesColor
			if (strval($this->FEyesColor->CurrentValue) <> "") {
				$this->FEyesColor->ViewValue = $this->FEyesColor->optionCaption($this->FEyesColor->CurrentValue);
			} else {
				$this->FEyesColor->ViewValue = NULL;
			}
			$this->FEyesColor->ViewCustomAttributes = "";

			// MEyesColor
			if (strval($this->MEyesColor->CurrentValue) <> "") {
				$this->MEyesColor->ViewValue = $this->MEyesColor->optionCaption($this->MEyesColor->CurrentValue);
			} else {
				$this->MEyesColor->ViewValue = NULL;
			}
			$this->MEyesColor->ViewCustomAttributes = "";

			// FHairColor
			if (strval($this->FHairColor->CurrentValue) <> "") {
				$this->FHairColor->ViewValue = $this->FHairColor->optionCaption($this->FHairColor->CurrentValue);
			} else {
				$this->FHairColor->ViewValue = NULL;
			}
			$this->FHairColor->ViewCustomAttributes = "";

			// MhairColor
			if (strval($this->MhairColor->CurrentValue) <> "") {
				$this->MhairColor->ViewValue = $this->MhairColor->optionCaption($this->MhairColor->CurrentValue);
			} else {
				$this->MhairColor->ViewValue = NULL;
			}
			$this->MhairColor->ViewCustomAttributes = "";

			// FhairTexture
			if (strval($this->FhairTexture->CurrentValue) <> "") {
				$this->FhairTexture->ViewValue = $this->FhairTexture->optionCaption($this->FhairTexture->CurrentValue);
			} else {
				$this->FhairTexture->ViewValue = NULL;
			}
			$this->FhairTexture->ViewCustomAttributes = "";

			// MHairTexture
			if (strval($this->MHairTexture->CurrentValue) <> "") {
				$this->MHairTexture->ViewValue = $this->MHairTexture->optionCaption($this->MHairTexture->CurrentValue);
			} else {
				$this->MHairTexture->ViewValue = NULL;
			}
			$this->MHairTexture->ViewCustomAttributes = "";

			// Fothers
			$this->Fothers->ViewValue = $this->Fothers->CurrentValue;
			$this->Fothers->ViewCustomAttributes = "";

			// Mothers
			$this->Mothers->ViewValue = $this->Mothers->CurrentValue;
			$this->Mothers->ViewCustomAttributes = "";

			// PGE
			$this->PGE->ViewValue = $this->PGE->CurrentValue;
			$this->PGE->ViewCustomAttributes = "";

			// PPR
			$this->PPR->ViewValue = $this->PPR->CurrentValue;
			$this->PPR->ViewCustomAttributes = "";

			// PBP
			$this->PBP->ViewValue = $this->PBP->CurrentValue;
			$this->PBP->ViewCustomAttributes = "";

			// Breast
			$this->Breast->ViewValue = $this->Breast->CurrentValue;
			$this->Breast->ViewCustomAttributes = "";

			// PPA
			$this->PPA->ViewValue = $this->PPA->CurrentValue;
			$this->PPA->ViewCustomAttributes = "";

			// PPSV
			$this->PPSV->ViewValue = $this->PPSV->CurrentValue;
			$this->PPSV->ViewCustomAttributes = "";

			// PPAPSMEAR
			$this->PPAPSMEAR->ViewValue = $this->PPAPSMEAR->CurrentValue;
			$this->PPAPSMEAR->ViewCustomAttributes = "";

			// PTHYROID
			$this->PTHYROID->ViewValue = $this->PTHYROID->CurrentValue;
			$this->PTHYROID->ViewCustomAttributes = "";

			// MTHYROID
			$this->MTHYROID->ViewValue = $this->MTHYROID->CurrentValue;
			$this->MTHYROID->ViewCustomAttributes = "";

			// SecSexCharacters
			$this->SecSexCharacters->ViewValue = $this->SecSexCharacters->CurrentValue;
			$this->SecSexCharacters->ViewCustomAttributes = "";

			// PenisUM
			$this->PenisUM->ViewValue = $this->PenisUM->CurrentValue;
			$this->PenisUM->ViewCustomAttributes = "";

			// VAS
			$this->VAS->ViewValue = $this->VAS->CurrentValue;
			$this->VAS->ViewCustomAttributes = "";

			// EPIDIDYMIS
			$this->EPIDIDYMIS->ViewValue = $this->EPIDIDYMIS->CurrentValue;
			$this->EPIDIDYMIS->ViewCustomAttributes = "";

			// Varicocele
			$this->Varicocele->ViewValue = $this->Varicocele->CurrentValue;
			$this->Varicocele->ViewCustomAttributes = "";

			// FamilyHistory
			$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
			$curVal = strval($this->FamilyHistory->CurrentValue);
			if ($curVal <> "") {
				$this->FamilyHistory->ViewValue = $this->FamilyHistory->lookupCacheOption($curVal);
				if ($this->FamilyHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->FamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->FamilyHistory->ViewValue = $this->FamilyHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
					}
				}
			} else {
				$this->FamilyHistory->ViewValue = NULL;
			}
			$this->FamilyHistory->ViewCustomAttributes = "";

			// Addictions
			if (strval($this->Addictions->CurrentValue) <> "") {
				$this->Addictions->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Addictions->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Addictions->ViewValue->add($this->Addictions->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Addictions->ViewValue = NULL;
			}
			$this->Addictions->ViewCustomAttributes = "";

			// Medical
			if (strval($this->Medical->CurrentValue) <> "") {
				$this->Medical->ViewValue = $this->Medical->optionCaption($this->Medical->CurrentValue);
			} else {
				$this->Medical->ViewValue = NULL;
			}
			$this->Medical->ViewCustomAttributes = "";

			// Surgical
			if ($this->Surgical->VirtualValue <> "") {
				$this->Surgical->ViewValue = $this->Surgical->VirtualValue;
			} else {
				$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
			$curVal = strval($this->Surgical->CurrentValue);
			if ($curVal <> "") {
				$this->Surgical->ViewValue = $this->Surgical->lookupCacheOption($curVal);
				if ($this->Surgical->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='SurgicalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Surgical->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgical->ViewValue = $this->Surgical->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
					}
				}
			} else {
				$this->Surgical->ViewValue = NULL;
			}
			}
			$this->Surgical->ViewCustomAttributes = "";

			// CoitalHistory
			$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
			$curVal = strval($this->CoitalHistory->CurrentValue);
			if ($curVal <> "") {
				$this->CoitalHistory->ViewValue = $this->CoitalHistory->lookupCacheOption($curVal);
				if ($this->CoitalHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='CoitalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->CoitalHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->CoitalHistory->ViewValue = $this->CoitalHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
					}
				}
			} else {
				$this->CoitalHistory->ViewValue = NULL;
			}
			$this->CoitalHistory->ViewCustomAttributes = "";

			// MariedFor
			$this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
			$this->MariedFor->ViewCustomAttributes = "";

			// CMNCM
			$this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
			$this->CMNCM->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// pFamilyHistory
			$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
			$curVal = strval($this->pFamilyHistory->CurrentValue);
			if ($curVal <> "") {
				$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->lookupCacheOption($curVal);
				if ($this->pFamilyHistory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->pFamilyHistory->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
					}
				}
			} else {
				$this->pFamilyHistory->ViewValue = NULL;
			}
			$this->pFamilyHistory->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// SEX
			$this->SEX->LinkCustomAttributes = "";
			$this->SEX->HrefValue = "";
			$this->SEX->TooltipValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";
			$this->Religion->TooltipValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";
			$this->Address->TooltipValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// DoublewitnessName1
			$this->DoublewitnessName1->LinkCustomAttributes = "";
			$this->DoublewitnessName1->HrefValue = "";
			$this->DoublewitnessName1->TooltipValue = "";

			// DoublewitnessName2
			$this->DoublewitnessName2->LinkCustomAttributes = "";
			$this->DoublewitnessName2->HrefValue = "";
			$this->DoublewitnessName2->TooltipValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";
			$this->Chiefcomplaints->TooltipValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";
			$this->MenstrualHistory->TooltipValue = "";

			// ObstetricHistory
			$this->ObstetricHistory->LinkCustomAttributes = "";
			$this->ObstetricHistory->HrefValue = "";
			$this->ObstetricHistory->TooltipValue = "";

			// MedicalHistory
			$this->MedicalHistory->LinkCustomAttributes = "";
			$this->MedicalHistory->HrefValue = "";
			$this->MedicalHistory->TooltipValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";
			$this->SurgicalHistory->TooltipValue = "";

			// Generalexaminationpallor
			$this->Generalexaminationpallor->LinkCustomAttributes = "";
			$this->Generalexaminationpallor->HrefValue = "";
			$this->Generalexaminationpallor->TooltipValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";
			$this->PR->TooltipValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";
			$this->PROVISIONALDIAGNOSIS->TooltipValue = "";

			// Investigations
			$this->Investigations->LinkCustomAttributes = "";
			$this->Investigations->HrefValue = "";
			$this->Investigations->TooltipValue = "";

			// Fheight
			$this->Fheight->LinkCustomAttributes = "";
			$this->Fheight->HrefValue = "";
			$this->Fheight->TooltipValue = "";

			// Fweight
			$this->Fweight->LinkCustomAttributes = "";
			$this->Fweight->HrefValue = "";
			$this->Fweight->TooltipValue = "";

			// FBMI
			$this->FBMI->LinkCustomAttributes = "";
			$this->FBMI->HrefValue = "";
			$this->FBMI->TooltipValue = "";

			// FBloodgroup
			$this->FBloodgroup->LinkCustomAttributes = "";
			$this->FBloodgroup->HrefValue = "";
			$this->FBloodgroup->TooltipValue = "";

			// Mheight
			$this->Mheight->LinkCustomAttributes = "";
			$this->Mheight->HrefValue = "";
			$this->Mheight->TooltipValue = "";

			// Mweight
			$this->Mweight->LinkCustomAttributes = "";
			$this->Mweight->HrefValue = "";
			$this->Mweight->TooltipValue = "";

			// MBMI
			$this->MBMI->LinkCustomAttributes = "";
			$this->MBMI->HrefValue = "";
			$this->MBMI->TooltipValue = "";

			// MBloodgroup
			$this->MBloodgroup->LinkCustomAttributes = "";
			$this->MBloodgroup->HrefValue = "";
			$this->MBloodgroup->TooltipValue = "";

			// FBuild
			$this->FBuild->LinkCustomAttributes = "";
			$this->FBuild->HrefValue = "";
			$this->FBuild->TooltipValue = "";

			// MBuild
			$this->MBuild->LinkCustomAttributes = "";
			$this->MBuild->HrefValue = "";
			$this->MBuild->TooltipValue = "";

			// FSkinColor
			$this->FSkinColor->LinkCustomAttributes = "";
			$this->FSkinColor->HrefValue = "";
			$this->FSkinColor->TooltipValue = "";

			// MSkinColor
			$this->MSkinColor->LinkCustomAttributes = "";
			$this->MSkinColor->HrefValue = "";
			$this->MSkinColor->TooltipValue = "";

			// FEyesColor
			$this->FEyesColor->LinkCustomAttributes = "";
			$this->FEyesColor->HrefValue = "";
			$this->FEyesColor->TooltipValue = "";

			// MEyesColor
			$this->MEyesColor->LinkCustomAttributes = "";
			$this->MEyesColor->HrefValue = "";
			$this->MEyesColor->TooltipValue = "";

			// FHairColor
			$this->FHairColor->LinkCustomAttributes = "";
			$this->FHairColor->HrefValue = "";
			$this->FHairColor->TooltipValue = "";

			// MhairColor
			$this->MhairColor->LinkCustomAttributes = "";
			$this->MhairColor->HrefValue = "";
			$this->MhairColor->TooltipValue = "";

			// FhairTexture
			$this->FhairTexture->LinkCustomAttributes = "";
			$this->FhairTexture->HrefValue = "";
			$this->FhairTexture->TooltipValue = "";

			// MHairTexture
			$this->MHairTexture->LinkCustomAttributes = "";
			$this->MHairTexture->HrefValue = "";
			$this->MHairTexture->TooltipValue = "";

			// Fothers
			$this->Fothers->LinkCustomAttributes = "";
			$this->Fothers->HrefValue = "";
			$this->Fothers->TooltipValue = "";

			// Mothers
			$this->Mothers->LinkCustomAttributes = "";
			$this->Mothers->HrefValue = "";
			$this->Mothers->TooltipValue = "";

			// PGE
			$this->PGE->LinkCustomAttributes = "";
			$this->PGE->HrefValue = "";
			$this->PGE->TooltipValue = "";

			// PPR
			$this->PPR->LinkCustomAttributes = "";
			$this->PPR->HrefValue = "";
			$this->PPR->TooltipValue = "";

			// PBP
			$this->PBP->LinkCustomAttributes = "";
			$this->PBP->HrefValue = "";
			$this->PBP->TooltipValue = "";

			// Breast
			$this->Breast->LinkCustomAttributes = "";
			$this->Breast->HrefValue = "";
			$this->Breast->TooltipValue = "";

			// PPA
			$this->PPA->LinkCustomAttributes = "";
			$this->PPA->HrefValue = "";
			$this->PPA->TooltipValue = "";

			// PPSV
			$this->PPSV->LinkCustomAttributes = "";
			$this->PPSV->HrefValue = "";
			$this->PPSV->TooltipValue = "";

			// PPAPSMEAR
			$this->PPAPSMEAR->LinkCustomAttributes = "";
			$this->PPAPSMEAR->HrefValue = "";
			$this->PPAPSMEAR->TooltipValue = "";

			// PTHYROID
			$this->PTHYROID->LinkCustomAttributes = "";
			$this->PTHYROID->HrefValue = "";
			$this->PTHYROID->TooltipValue = "";

			// MTHYROID
			$this->MTHYROID->LinkCustomAttributes = "";
			$this->MTHYROID->HrefValue = "";
			$this->MTHYROID->TooltipValue = "";

			// SecSexCharacters
			$this->SecSexCharacters->LinkCustomAttributes = "";
			$this->SecSexCharacters->HrefValue = "";
			$this->SecSexCharacters->TooltipValue = "";

			// PenisUM
			$this->PenisUM->LinkCustomAttributes = "";
			$this->PenisUM->HrefValue = "";
			$this->PenisUM->TooltipValue = "";

			// VAS
			$this->VAS->LinkCustomAttributes = "";
			$this->VAS->HrefValue = "";
			$this->VAS->TooltipValue = "";

			// EPIDIDYMIS
			$this->EPIDIDYMIS->LinkCustomAttributes = "";
			$this->EPIDIDYMIS->HrefValue = "";
			$this->EPIDIDYMIS->TooltipValue = "";

			// Varicocele
			$this->Varicocele->LinkCustomAttributes = "";
			$this->Varicocele->HrefValue = "";
			$this->Varicocele->TooltipValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";
			$this->FamilyHistory->TooltipValue = "";

			// Addictions
			$this->Addictions->LinkCustomAttributes = "";
			$this->Addictions->HrefValue = "";
			$this->Addictions->TooltipValue = "";

			// Medical
			$this->Medical->LinkCustomAttributes = "";
			$this->Medical->HrefValue = "";
			$this->Medical->TooltipValue = "";

			// Surgical
			$this->Surgical->LinkCustomAttributes = "";
			$this->Surgical->HrefValue = "";
			$this->Surgical->TooltipValue = "";

			// CoitalHistory
			$this->CoitalHistory->LinkCustomAttributes = "";
			$this->CoitalHistory->HrefValue = "";
			$this->CoitalHistory->TooltipValue = "";

			// MariedFor
			$this->MariedFor->LinkCustomAttributes = "";
			$this->MariedFor->HrefValue = "";
			$this->MariedFor->TooltipValue = "";

			// CMNCM
			$this->CMNCM->LinkCustomAttributes = "";
			$this->CMNCM->HrefValue = "";
			$this->CMNCM->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// pFamilyHistory
			$this->pFamilyHistory->LinkCustomAttributes = "";
			$this->pFamilyHistory->HrefValue = "";
			$this->pFamilyHistory->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_vitals_historylist.php"), "", $this->TableVar, TRUE);
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
				case "x_FamilyHistory":
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Surgical":
					$lookupFilter = function() {
						return "`HistoryType`='SurgicalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_CoitalHistory":
					$lookupFilter = function() {
						return "`HistoryType`='CoitalHistory'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_pFamilyHistory":
					$lookupFilter = function() {
						return "`HistoryType`='FamilyHistory'";
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
						case "x_FBloodgroup":
							break;
						case "x_MBloodgroup":
							break;
						case "x_FamilyHistory":
							break;
						case "x_Surgical":
							break;
						case "x_CoitalHistory":
							break;
						case "x_pFamilyHistory":
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
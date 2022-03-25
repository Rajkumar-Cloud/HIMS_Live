<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_otherprocedure_grid extends ivf_otherprocedure
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_otherprocedure';

	// Page object name
	public $PageObjName = "ivf_otherprocedure_grid";

	// Grid form hidden field names
	public $FormName = "fivf_otherproceduregrid";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;
	public $CancelUrl;

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
		$this->FormActionName .= "_" . $this->FormName;
		$this->FormKeyName .= "_" . $this->FormName;
		$this->FormOldKeyName .= "_" . $this->FormName;
		$this->FormBlankRowName .= "_" . $this->FormName;
		$this->FormKeyCountName .= "_" . $this->FormName;
		$GLOBALS["Grid"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (ivf_otherprocedure)
		if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
			$GLOBALS["ivf_otherprocedure"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["ivf_otherprocedure"];

		}
		$this->AddUrl = "ivf_otherprocedureadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Export
		global $EXPORT, $ivf_otherprocedure;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_otherprocedure);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}

//		$GLOBALS["Table"] = &$GLOBALS["MasterTable"];
		unset($GLOBALS["Grid"]);
		if ($url === "")
			return;
		if (!IsApi())
			$this->Page_Redirecting($url);

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

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $ShowOtherOptions = FALSE;
	public $DisplayRecs = 20;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $Pager;
	public $AutoHidePager = AUTO_HIDE_PAGER;
	public $AutoHidePageSizeSelector = AUTO_HIDE_PAGE_SIZE_SELECTOR;
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $RecCnt = 0; // Record count
	public $EditRowCnt;
	public $StartRowCnt = 1;
	public $RowCnt = 0;
	public $Attrs = array(); // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SearchError, $EXPORT;

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
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
		}

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->id->setVisibility();
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->Age->Visible = FALSE;
		$this->SEX->Visible = FALSE;
		$this->Address->Visible = FALSE;
		$this->DateofAdmission->setVisibility();
		$this->DateofProcedure->setVisibility();
		$this->DateofDischarge->setVisibility();
		$this->Consultant->setVisibility();
		$this->Surgeon->setVisibility();
		$this->Anesthetist->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->ProcedureDone->setVisibility();
		$this->PROVISIONALDIAGNOSIS->setVisibility();
		$this->Chiefcomplaints->setVisibility();
		$this->MaritallHistory->setVisibility();
		$this->MenstrualHistory->setVisibility();
		$this->SurgicalHistory->setVisibility();
		$this->PastHistory->setVisibility();
		$this->FamilyHistory->setVisibility();
		$this->Temp->setVisibility();
		$this->Pulse->setVisibility();
		$this->BP->setVisibility();
		$this->CNS->setVisibility();
		$this->_RS->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->InvestigationReport->setVisibility();
		$this->FinalDiagnosis->Visible = FALSE;
		$this->Treatment->Visible = FALSE;
		$this->DetailOfOperation->Visible = FALSE;
		$this->FollowUpAdvice->Visible = FALSE;
		$this->FollowUpMedication->Visible = FALSE;
		$this->Plan->Visible = FALSE;
		$this->TempleteFinalDiagnosis->Visible = FALSE;
		$this->TemplateTreatment->Visible = FALSE;
		$this->TemplateOperation->Visible = FALSE;
		$this->TemplateFollowUpAdvice->Visible = FALSE;
		$this->TemplateFollowUpMedication->Visible = FALSE;
		$this->TemplatePlan->Visible = FALSE;
		$this->QRCode->Visible = FALSE;
		$this->TidNo->setVisibility();
		$this->hideFieldsForAddEdit();

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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Setup other options
		$this->setupOtherOptions();

		// Set up lookup cache
		$this->setupLookupOptions($this->Name);
		$this->setupLookupOptions($this->Consultant);
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anesthetist);
		$this->setupLookupOptions($this->TempleteFinalDiagnosis);
		$this->setupLookupOptions($this->TemplateTreatment);
		$this->setupLookupOptions($this->TemplateOperation);
		$this->setupLookupOptions($this->TemplateFollowUpAdvice);
		$this->setupLookupOptions($this->TemplateFollowUpMedication);
		$this->setupLookupOptions($this->TemplatePlan);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = &$this->ListOptions->getItem("griddelete");
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
			$this->loadSortOrder();

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
			global $ivf_treatment_plan;
			$rsmaster = $ivf_treatment_plan->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ivf_treatment_planlist.php"); // Return to master page
			} else {
				$ivf_treatment_plan->loadListRowValues($rsmaster);
				$ivf_treatment_plan->RowType = ROWTYPE_MASTER; // Master row
				$ivf_treatment_plan->renderListRow();
				$rsmaster->close();
			}
		}

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}
		if ($this->isGridAdd()) {
			if ($this->CurrentMode == "copy") {
				$selectLimit = $this->UseSelectLimit;
				if ($selectLimit) {
					$this->TotalRecs = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecs = $this->Recordset->RecordCount();
				}
				$this->StartRec = 1;
				$this->DisplayRecs = $this->TotalRecs;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRec = 1;
				$this->DisplayRecs = $this->GridAddRowCount;
			}
			$this->TotalRecs = $this->DisplayRecs;
			$this->StopRec = $this->DisplayRecs;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecs = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
			$this->StartRec = 1;
			$this->DisplayRecs = $this->TotalRecs; // Display all records
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecs == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecs]);
			$this->terminate(TRUE);
		}
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecs()
	{
		$wrk = Get(TABLE_REC_PER_PAGE, "");
		if ($wrk <> "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecs = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecs = -1;
				} else {
					$this->DisplayRecs = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecs); // Save to Session

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key <> "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey <> "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter <> "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode($GLOBALS["COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arKeyFlds) >= 1) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = &$this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "" && $rowaction <> "insert")
				continue; // Skip
			if ($rowaction == "insert") {
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
				$this->loadOldRecord(); // Load old record
			}
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key <> "")
						$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter <> "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->clearInlineMode(); // Clear grid add mode and return
			return TRUE;
		}
		if ($gridInsert) {

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_RIDNO") && $CurrentForm->hasValue("o_RIDNO") && $this->RIDNO->CurrentValue <> $this->RIDNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue <> $this->Name->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateofAdmission") && $CurrentForm->hasValue("o_DateofAdmission") && $this->DateofAdmission->CurrentValue <> $this->DateofAdmission->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateofProcedure") && $CurrentForm->hasValue("o_DateofProcedure") && $this->DateofProcedure->CurrentValue <> $this->DateofProcedure->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateofDischarge") && $CurrentForm->hasValue("o_DateofDischarge") && $this->DateofDischarge->CurrentValue <> $this->DateofDischarge->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Consultant") && $CurrentForm->hasValue("o_Consultant") && $this->Consultant->CurrentValue <> $this->Consultant->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Surgeon") && $CurrentForm->hasValue("o_Surgeon") && $this->Surgeon->CurrentValue <> $this->Surgeon->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Anesthetist") && $CurrentForm->hasValue("o_Anesthetist") && $this->Anesthetist->CurrentValue <> $this->Anesthetist->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IdentificationMark") && $CurrentForm->hasValue("o_IdentificationMark") && $this->IdentificationMark->CurrentValue <> $this->IdentificationMark->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProcedureDone") && $CurrentForm->hasValue("o_ProcedureDone") && $this->ProcedureDone->CurrentValue <> $this->ProcedureDone->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PROVISIONALDIAGNOSIS") && $CurrentForm->hasValue("o_PROVISIONALDIAGNOSIS") && $this->PROVISIONALDIAGNOSIS->CurrentValue <> $this->PROVISIONALDIAGNOSIS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Chiefcomplaints") && $CurrentForm->hasValue("o_Chiefcomplaints") && $this->Chiefcomplaints->CurrentValue <> $this->Chiefcomplaints->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MaritallHistory") && $CurrentForm->hasValue("o_MaritallHistory") && $this->MaritallHistory->CurrentValue <> $this->MaritallHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MenstrualHistory") && $CurrentForm->hasValue("o_MenstrualHistory") && $this->MenstrualHistory->CurrentValue <> $this->MenstrualHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SurgicalHistory") && $CurrentForm->hasValue("o_SurgicalHistory") && $this->SurgicalHistory->CurrentValue <> $this->SurgicalHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PastHistory") && $CurrentForm->hasValue("o_PastHistory") && $this->PastHistory->CurrentValue <> $this->PastHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FamilyHistory") && $CurrentForm->hasValue("o_FamilyHistory") && $this->FamilyHistory->CurrentValue <> $this->FamilyHistory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Temp") && $CurrentForm->hasValue("o_Temp") && $this->Temp->CurrentValue <> $this->Temp->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pulse") && $CurrentForm->hasValue("o_Pulse") && $this->Pulse->CurrentValue <> $this->Pulse->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BP") && $CurrentForm->hasValue("o_BP") && $this->BP->CurrentValue <> $this->BP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CNS") && $CurrentForm->hasValue("o_CNS") && $this->CNS->CurrentValue <> $this->CNS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x__RS") && $CurrentForm->hasValue("o__RS") && $this->_RS->CurrentValue <> $this->_RS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CVS") && $CurrentForm->hasValue("o_CVS") && $this->CVS->CurrentValue <> $this->CVS->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PA") && $CurrentForm->hasValue("o_PA") && $this->PA->CurrentValue <> $this->PA->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_InvestigationReport") && $CurrentForm->hasValue("o_InvestigationReport") && $this->InvestigationReport->CurrentValue <> $this->InvestigationReport->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue <> $this->TidNo->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = array();

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->RIDNO->setSessionValue("");
				$this->Name->setSessionValue("");
				$this->TidNo->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = TRUE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
		$item->OnLeft = TRUE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$item = &$this->ListOptions->getItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode <> "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = &$options->Items["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($this->CurrentMode == "view") { // View mode

		// "view"
		$opt = &$this->ListOptions->Items["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = &$this->ListOptions->Items["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	public function setRecordKey(&$key, $rs)
	{
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs->fields('id');
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = &$this->OtherOptions["addedit"];
		$option->UseDropDownButton = FALSE;
		$option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$option->UseButtonGroup = TRUE;

		//$option->ButtonClass = ""; // Class for button group
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Add
		if ($this->CurrentMode == "view") { // Check view mode
			$item = &$option->add("add");
			$addcaption = HtmlTitle($Language->phrase("AddLink"));
			$this->AddUrl = $this->getAddUrl();
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
			$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());
		}
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = &$options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = $Security->canAdd();
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = &$options["addedit"];
			$item = &$option->getItem("add");
			$this->ShowOtherOptions = $item && $item->Visible;
		}
	}
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->SEX->CurrentValue = NULL;
		$this->SEX->OldValue = $this->SEX->CurrentValue;
		$this->Address->CurrentValue = NULL;
		$this->Address->OldValue = $this->Address->CurrentValue;
		$this->DateofAdmission->CurrentValue = NULL;
		$this->DateofAdmission->OldValue = $this->DateofAdmission->CurrentValue;
		$this->DateofProcedure->CurrentValue = NULL;
		$this->DateofProcedure->OldValue = $this->DateofProcedure->CurrentValue;
		$this->DateofDischarge->CurrentValue = NULL;
		$this->DateofDischarge->OldValue = $this->DateofDischarge->CurrentValue;
		$this->Consultant->CurrentValue = NULL;
		$this->Consultant->OldValue = $this->Consultant->CurrentValue;
		$this->Surgeon->CurrentValue = NULL;
		$this->Surgeon->OldValue = $this->Surgeon->CurrentValue;
		$this->Anesthetist->CurrentValue = NULL;
		$this->Anesthetist->OldValue = $this->Anesthetist->CurrentValue;
		$this->IdentificationMark->CurrentValue = NULL;
		$this->IdentificationMark->OldValue = $this->IdentificationMark->CurrentValue;
		$this->ProcedureDone->CurrentValue = NULL;
		$this->ProcedureDone->OldValue = $this->ProcedureDone->CurrentValue;
		$this->PROVISIONALDIAGNOSIS->CurrentValue = NULL;
		$this->PROVISIONALDIAGNOSIS->OldValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$this->Chiefcomplaints->CurrentValue = NULL;
		$this->Chiefcomplaints->OldValue = $this->Chiefcomplaints->CurrentValue;
		$this->MaritallHistory->CurrentValue = NULL;
		$this->MaritallHistory->OldValue = $this->MaritallHistory->CurrentValue;
		$this->MenstrualHistory->CurrentValue = NULL;
		$this->MenstrualHistory->OldValue = $this->MenstrualHistory->CurrentValue;
		$this->SurgicalHistory->CurrentValue = NULL;
		$this->SurgicalHistory->OldValue = $this->SurgicalHistory->CurrentValue;
		$this->PastHistory->CurrentValue = NULL;
		$this->PastHistory->OldValue = $this->PastHistory->CurrentValue;
		$this->FamilyHistory->CurrentValue = NULL;
		$this->FamilyHistory->OldValue = $this->FamilyHistory->CurrentValue;
		$this->Temp->CurrentValue = NULL;
		$this->Temp->OldValue = $this->Temp->CurrentValue;
		$this->Pulse->CurrentValue = NULL;
		$this->Pulse->OldValue = $this->Pulse->CurrentValue;
		$this->BP->CurrentValue = NULL;
		$this->BP->OldValue = $this->BP->CurrentValue;
		$this->CNS->CurrentValue = NULL;
		$this->CNS->OldValue = $this->CNS->CurrentValue;
		$this->_RS->CurrentValue = NULL;
		$this->_RS->OldValue = $this->_RS->CurrentValue;
		$this->CVS->CurrentValue = NULL;
		$this->CVS->OldValue = $this->CVS->CurrentValue;
		$this->PA->CurrentValue = NULL;
		$this->PA->OldValue = $this->PA->CurrentValue;
		$this->InvestigationReport->CurrentValue = NULL;
		$this->InvestigationReport->OldValue = $this->InvestigationReport->CurrentValue;
		$this->FinalDiagnosis->CurrentValue = NULL;
		$this->FinalDiagnosis->OldValue = $this->FinalDiagnosis->CurrentValue;
		$this->Treatment->CurrentValue = NULL;
		$this->Treatment->OldValue = $this->Treatment->CurrentValue;
		$this->DetailOfOperation->CurrentValue = NULL;
		$this->DetailOfOperation->OldValue = $this->DetailOfOperation->CurrentValue;
		$this->FollowUpAdvice->CurrentValue = NULL;
		$this->FollowUpAdvice->OldValue = $this->FollowUpAdvice->CurrentValue;
		$this->FollowUpMedication->CurrentValue = NULL;
		$this->FollowUpMedication->OldValue = $this->FollowUpMedication->CurrentValue;
		$this->Plan->CurrentValue = NULL;
		$this->Plan->OldValue = $this->Plan->CurrentValue;
		$this->TempleteFinalDiagnosis->CurrentValue = NULL;
		$this->TempleteFinalDiagnosis->OldValue = $this->TempleteFinalDiagnosis->CurrentValue;
		$this->TemplateTreatment->CurrentValue = NULL;
		$this->TemplateTreatment->OldValue = $this->TemplateTreatment->CurrentValue;
		$this->TemplateOperation->CurrentValue = NULL;
		$this->TemplateOperation->OldValue = $this->TemplateOperation->CurrentValue;
		$this->TemplateFollowUpAdvice->CurrentValue = NULL;
		$this->TemplateFollowUpAdvice->OldValue = $this->TemplateFollowUpAdvice->CurrentValue;
		$this->TemplateFollowUpMedication->CurrentValue = NULL;
		$this->TemplateFollowUpMedication->OldValue = $this->TemplateFollowUpMedication->CurrentValue;
		$this->TemplatePlan->CurrentValue = NULL;
		$this->TemplatePlan->OldValue = $this->TemplatePlan->CurrentValue;
		$this->QRCode->CurrentValue = NULL;
		$this->QRCode->OldValue = $this->QRCode->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}
		$this->RIDNO->setOldValue($CurrentForm->getValue("o_RIDNO"));

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}
		$this->Name->setOldValue($CurrentForm->getValue("o_Name"));

		// Check field name 'DateofAdmission' first before field var 'x_DateofAdmission'
		$val = $CurrentForm->hasValue("DateofAdmission") ? $CurrentForm->getValue("DateofAdmission") : $CurrentForm->getValue("x_DateofAdmission");
		if (!$this->DateofAdmission->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DateofAdmission->Visible = FALSE; // Disable update for API request
			else
				$this->DateofAdmission->setFormValue($val);
			$this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 11);
		}
		$this->DateofAdmission->setOldValue($CurrentForm->getValue("o_DateofAdmission"));

		// Check field name 'DateofProcedure' first before field var 'x_DateofProcedure'
		$val = $CurrentForm->hasValue("DateofProcedure") ? $CurrentForm->getValue("DateofProcedure") : $CurrentForm->getValue("x_DateofProcedure");
		if (!$this->DateofProcedure->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DateofProcedure->Visible = FALSE; // Disable update for API request
			else
				$this->DateofProcedure->setFormValue($val);
			$this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 11);
		}
		$this->DateofProcedure->setOldValue($CurrentForm->getValue("o_DateofProcedure"));

		// Check field name 'DateofDischarge' first before field var 'x_DateofDischarge'
		$val = $CurrentForm->hasValue("DateofDischarge") ? $CurrentForm->getValue("DateofDischarge") : $CurrentForm->getValue("x_DateofDischarge");
		if (!$this->DateofDischarge->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DateofDischarge->Visible = FALSE; // Disable update for API request
			else
				$this->DateofDischarge->setFormValue($val);
			$this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 11);
		}
		$this->DateofDischarge->setOldValue($CurrentForm->getValue("o_DateofDischarge"));

		// Check field name 'Consultant' first before field var 'x_Consultant'
		$val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
		if (!$this->Consultant->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Consultant->Visible = FALSE; // Disable update for API request
			else
				$this->Consultant->setFormValue($val);
		}
		$this->Consultant->setOldValue($CurrentForm->getValue("o_Consultant"));

		// Check field name 'Surgeon' first before field var 'x_Surgeon'
		$val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
		if (!$this->Surgeon->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Surgeon->Visible = FALSE; // Disable update for API request
			else
				$this->Surgeon->setFormValue($val);
		}
		$this->Surgeon->setOldValue($CurrentForm->getValue("o_Surgeon"));

		// Check field name 'Anesthetist' first before field var 'x_Anesthetist'
		$val = $CurrentForm->hasValue("Anesthetist") ? $CurrentForm->getValue("Anesthetist") : $CurrentForm->getValue("x_Anesthetist");
		if (!$this->Anesthetist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Anesthetist->Visible = FALSE; // Disable update for API request
			else
				$this->Anesthetist->setFormValue($val);
		}
		$this->Anesthetist->setOldValue($CurrentForm->getValue("o_Anesthetist"));

		// Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
		$val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
		if (!$this->IdentificationMark->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IdentificationMark->Visible = FALSE; // Disable update for API request
			else
				$this->IdentificationMark->setFormValue($val);
		}
		$this->IdentificationMark->setOldValue($CurrentForm->getValue("o_IdentificationMark"));

		// Check field name 'ProcedureDone' first before field var 'x_ProcedureDone'
		$val = $CurrentForm->hasValue("ProcedureDone") ? $CurrentForm->getValue("ProcedureDone") : $CurrentForm->getValue("x_ProcedureDone");
		if (!$this->ProcedureDone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureDone->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureDone->setFormValue($val);
		}
		$this->ProcedureDone->setOldValue($CurrentForm->getValue("o_ProcedureDone"));

		// Check field name 'PROVISIONALDIAGNOSIS' first before field var 'x_PROVISIONALDIAGNOSIS'
		$val = $CurrentForm->hasValue("PROVISIONALDIAGNOSIS") ? $CurrentForm->getValue("PROVISIONALDIAGNOSIS") : $CurrentForm->getValue("x_PROVISIONALDIAGNOSIS");
		if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PROVISIONALDIAGNOSIS->Visible = FALSE; // Disable update for API request
			else
				$this->PROVISIONALDIAGNOSIS->setFormValue($val);
		}
		$this->PROVISIONALDIAGNOSIS->setOldValue($CurrentForm->getValue("o_PROVISIONALDIAGNOSIS"));

		// Check field name 'Chiefcomplaints' first before field var 'x_Chiefcomplaints'
		$val = $CurrentForm->hasValue("Chiefcomplaints") ? $CurrentForm->getValue("Chiefcomplaints") : $CurrentForm->getValue("x_Chiefcomplaints");
		if (!$this->Chiefcomplaints->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Chiefcomplaints->Visible = FALSE; // Disable update for API request
			else
				$this->Chiefcomplaints->setFormValue($val);
		}
		$this->Chiefcomplaints->setOldValue($CurrentForm->getValue("o_Chiefcomplaints"));

		// Check field name 'MaritallHistory' first before field var 'x_MaritallHistory'
		$val = $CurrentForm->hasValue("MaritallHistory") ? $CurrentForm->getValue("MaritallHistory") : $CurrentForm->getValue("x_MaritallHistory");
		if (!$this->MaritallHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MaritallHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MaritallHistory->setFormValue($val);
		}
		$this->MaritallHistory->setOldValue($CurrentForm->getValue("o_MaritallHistory"));

		// Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
		$val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
		if (!$this->MenstrualHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MenstrualHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MenstrualHistory->setFormValue($val);
		}
		$this->MenstrualHistory->setOldValue($CurrentForm->getValue("o_MenstrualHistory"));

		// Check field name 'SurgicalHistory' first before field var 'x_SurgicalHistory'
		$val = $CurrentForm->hasValue("SurgicalHistory") ? $CurrentForm->getValue("SurgicalHistory") : $CurrentForm->getValue("x_SurgicalHistory");
		if (!$this->SurgicalHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SurgicalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->SurgicalHistory->setFormValue($val);
		}
		$this->SurgicalHistory->setOldValue($CurrentForm->getValue("o_SurgicalHistory"));

		// Check field name 'PastHistory' first before field var 'x_PastHistory'
		$val = $CurrentForm->hasValue("PastHistory") ? $CurrentForm->getValue("PastHistory") : $CurrentForm->getValue("x_PastHistory");
		if (!$this->PastHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PastHistory->Visible = FALSE; // Disable update for API request
			else
				$this->PastHistory->setFormValue($val);
		}
		$this->PastHistory->setOldValue($CurrentForm->getValue("o_PastHistory"));

		// Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
		$val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
		if (!$this->FamilyHistory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FamilyHistory->Visible = FALSE; // Disable update for API request
			else
				$this->FamilyHistory->setFormValue($val);
		}
		$this->FamilyHistory->setOldValue($CurrentForm->getValue("o_FamilyHistory"));

		// Check field name 'Temp' first before field var 'x_Temp'
		$val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
		if (!$this->Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Temp->setFormValue($val);
		}
		$this->Temp->setOldValue($CurrentForm->getValue("o_Temp"));

		// Check field name 'Pulse' first before field var 'x_Pulse'
		$val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
		if (!$this->Pulse->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pulse->Visible = FALSE; // Disable update for API request
			else
				$this->Pulse->setFormValue($val);
		}
		$this->Pulse->setOldValue($CurrentForm->getValue("o_Pulse"));

		// Check field name 'BP' first before field var 'x_BP'
		$val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
		if (!$this->BP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BP->Visible = FALSE; // Disable update for API request
			else
				$this->BP->setFormValue($val);
		}
		$this->BP->setOldValue($CurrentForm->getValue("o_BP"));

		// Check field name 'CNS' first before field var 'x_CNS'
		$val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
		if (!$this->CNS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CNS->Visible = FALSE; // Disable update for API request
			else
				$this->CNS->setFormValue($val);
		}
		$this->CNS->setOldValue($CurrentForm->getValue("o_CNS"));

		// Check field name 'RS' first before field var 'x__RS'
		$val = $CurrentForm->hasValue("RS") ? $CurrentForm->getValue("RS") : $CurrentForm->getValue("x__RS");
		if (!$this->_RS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_RS->Visible = FALSE; // Disable update for API request
			else
				$this->_RS->setFormValue($val);
		}
		$this->_RS->setOldValue($CurrentForm->getValue("o__RS"));

		// Check field name 'CVS' first before field var 'x_CVS'
		$val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
		if (!$this->CVS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CVS->Visible = FALSE; // Disable update for API request
			else
				$this->CVS->setFormValue($val);
		}
		$this->CVS->setOldValue($CurrentForm->getValue("o_CVS"));

		// Check field name 'PA' first before field var 'x_PA'
		$val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
		if (!$this->PA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PA->Visible = FALSE; // Disable update for API request
			else
				$this->PA->setFormValue($val);
		}
		$this->PA->setOldValue($CurrentForm->getValue("o_PA"));

		// Check field name 'InvestigationReport' first before field var 'x_InvestigationReport'
		$val = $CurrentForm->hasValue("InvestigationReport") ? $CurrentForm->getValue("InvestigationReport") : $CurrentForm->getValue("x_InvestigationReport");
		if (!$this->InvestigationReport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->InvestigationReport->Visible = FALSE; // Disable update for API request
			else
				$this->InvestigationReport->setFormValue($val);
		}
		$this->InvestigationReport->setOldValue($CurrentForm->getValue("o_InvestigationReport"));

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}
		$this->TidNo->setOldValue($CurrentForm->getValue("o_TidNo"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->DateofAdmission->CurrentValue = $this->DateofAdmission->FormValue;
		$this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 11);
		$this->DateofProcedure->CurrentValue = $this->DateofProcedure->FormValue;
		$this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 11);
		$this->DateofDischarge->CurrentValue = $this->DateofDischarge->FormValue;
		$this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 11);
		$this->Consultant->CurrentValue = $this->Consultant->FormValue;
		$this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
		$this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
		$this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
		$this->ProcedureDone->CurrentValue = $this->ProcedureDone->FormValue;
		$this->PROVISIONALDIAGNOSIS->CurrentValue = $this->PROVISIONALDIAGNOSIS->FormValue;
		$this->Chiefcomplaints->CurrentValue = $this->Chiefcomplaints->FormValue;
		$this->MaritallHistory->CurrentValue = $this->MaritallHistory->FormValue;
		$this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
		$this->SurgicalHistory->CurrentValue = $this->SurgicalHistory->FormValue;
		$this->PastHistory->CurrentValue = $this->PastHistory->FormValue;
		$this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
		$this->Temp->CurrentValue = $this->Temp->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->CNS->CurrentValue = $this->CNS->FormValue;
		$this->_RS->CurrentValue = $this->_RS->FormValue;
		$this->CVS->CurrentValue = $this->CVS->FormValue;
		$this->PA->CurrentValue = $this->PA->FormValue;
		$this->InvestigationReport->CurrentValue = $this->InvestigationReport->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
		$this->id->setDbValue($row['id']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->Age->setDbValue($row['Age']);
		$this->SEX->setDbValue($row['SEX']);
		$this->Address->setDbValue($row['Address']);
		$this->DateofAdmission->setDbValue($row['DateofAdmission']);
		$this->DateofProcedure->setDbValue($row['DateofProcedure']);
		$this->DateofDischarge->setDbValue($row['DateofDischarge']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anesthetist->setDbValue($row['Anesthetist']);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->ProcedureDone->setDbValue($row['ProcedureDone']);
		$this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
		$this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
		$this->MaritallHistory->setDbValue($row['MaritallHistory']);
		$this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
		$this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
		$this->PastHistory->setDbValue($row['PastHistory']);
		$this->FamilyHistory->setDbValue($row['FamilyHistory']);
		$this->Temp->setDbValue($row['Temp']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->BP->setDbValue($row['BP']);
		$this->CNS->setDbValue($row['CNS']);
		$this->_RS->setDbValue($row['RS']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->InvestigationReport->setDbValue($row['InvestigationReport']);
		$this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
		$this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
		$this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
		$this->Plan->setDbValue($row['Plan']);
		$this->TempleteFinalDiagnosis->setDbValue($row['TempleteFinalDiagnosis']);
		$this->TemplateTreatment->setDbValue($row['TemplateTreatment']);
		$this->TemplateOperation->setDbValue($row['TemplateOperation']);
		$this->TemplateFollowUpAdvice->setDbValue($row['TemplateFollowUpAdvice']);
		$this->TemplateFollowUpMedication->setDbValue($row['TemplateFollowUpMedication']);
		$this->TemplatePlan->setDbValue($row['TemplatePlan']);
		$this->QRCode->setDbValue($row['QRCode']);
		$this->TidNo->setDbValue($row['TidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['SEX'] = $this->SEX->CurrentValue;
		$row['Address'] = $this->Address->CurrentValue;
		$row['DateofAdmission'] = $this->DateofAdmission->CurrentValue;
		$row['DateofProcedure'] = $this->DateofProcedure->CurrentValue;
		$row['DateofDischarge'] = $this->DateofDischarge->CurrentValue;
		$row['Consultant'] = $this->Consultant->CurrentValue;
		$row['Surgeon'] = $this->Surgeon->CurrentValue;
		$row['Anesthetist'] = $this->Anesthetist->CurrentValue;
		$row['IdentificationMark'] = $this->IdentificationMark->CurrentValue;
		$row['ProcedureDone'] = $this->ProcedureDone->CurrentValue;
		$row['PROVISIONALDIAGNOSIS'] = $this->PROVISIONALDIAGNOSIS->CurrentValue;
		$row['Chiefcomplaints'] = $this->Chiefcomplaints->CurrentValue;
		$row['MaritallHistory'] = $this->MaritallHistory->CurrentValue;
		$row['MenstrualHistory'] = $this->MenstrualHistory->CurrentValue;
		$row['SurgicalHistory'] = $this->SurgicalHistory->CurrentValue;
		$row['PastHistory'] = $this->PastHistory->CurrentValue;
		$row['FamilyHistory'] = $this->FamilyHistory->CurrentValue;
		$row['Temp'] = $this->Temp->CurrentValue;
		$row['Pulse'] = $this->Pulse->CurrentValue;
		$row['BP'] = $this->BP->CurrentValue;
		$row['CNS'] = $this->CNS->CurrentValue;
		$row['RS'] = $this->_RS->CurrentValue;
		$row['CVS'] = $this->CVS->CurrentValue;
		$row['PA'] = $this->PA->CurrentValue;
		$row['InvestigationReport'] = $this->InvestigationReport->CurrentValue;
		$row['FinalDiagnosis'] = $this->FinalDiagnosis->CurrentValue;
		$row['Treatment'] = $this->Treatment->CurrentValue;
		$row['DetailOfOperation'] = $this->DetailOfOperation->CurrentValue;
		$row['FollowUpAdvice'] = $this->FollowUpAdvice->CurrentValue;
		$row['FollowUpMedication'] = $this->FollowUpMedication->CurrentValue;
		$row['Plan'] = $this->Plan->CurrentValue;
		$row['TempleteFinalDiagnosis'] = $this->TempleteFinalDiagnosis->CurrentValue;
		$row['TemplateTreatment'] = $this->TemplateTreatment->CurrentValue;
		$row['TemplateOperation'] = $this->TemplateOperation->CurrentValue;
		$row['TemplateFollowUpAdvice'] = $this->TemplateFollowUpAdvice->CurrentValue;
		$row['TemplateFollowUpMedication'] = $this->TemplateFollowUpMedication->CurrentValue;
		$row['TemplatePlan'] = $this->TemplatePlan->CurrentValue;
		$row['QRCode'] = $this->QRCode->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$this->id->CurrentValue = strval($arKeys[0]); // id
			else
				$validKey = FALSE;
		} else {
			$validKey = FALSE;
		}

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// RIDNO
		// Name
		// Age
		// SEX
		// Address
		// DateofAdmission
		// DateofProcedure
		// DateofDischarge
		// Consultant
		// Surgeon
		// Anesthetist
		// IdentificationMark
		// ProcedureDone
		// PROVISIONALDIAGNOSIS
		// Chiefcomplaints
		// MaritallHistory
		// MenstrualHistory
		// SurgicalHistory
		// PastHistory
		// FamilyHistory
		// Temp
		// Pulse
		// BP
		// CNS
		// RS
		// CVS
		// PA
		// InvestigationReport
		// FinalDiagnosis
		// Treatment
		// DetailOfOperation
		// FollowUpAdvice
		// FollowUpMedication
		// Plan
		// TempleteFinalDiagnosis
		// TemplateTreatment
		// TemplateOperation
		// TemplateFollowUpAdvice
		// TemplateFollowUpMedication
		// TemplatePlan
		// QRCode
		// TidNo

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
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal <> "") {
				$this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Name->ViewValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->ViewValue = $this->Name->CurrentValue;
					}
				}
			} else {
				$this->Name->ViewValue = NULL;
			}
			$this->Name->ViewCustomAttributes = "";

			// DateofAdmission
			$this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
			$this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 11);
			$this->DateofAdmission->ViewCustomAttributes = "";

			// DateofProcedure
			$this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
			$this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 11);
			$this->DateofProcedure->ViewCustomAttributes = "";

			// DateofDischarge
			$this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
			$this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 11);
			$this->DateofDischarge->ViewCustomAttributes = "";

			// Consultant
			$curVal = strval($this->Consultant->CurrentValue);
			if ($curVal <> "") {
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
				if ($this->Consultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Consultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
					}
				}
			} else {
				$this->Consultant->ViewValue = NULL;
			}
			$this->Consultant->ViewCustomAttributes = "";

			// Surgeon
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal <> "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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

			// Anesthetist
			$curVal = strval($this->Anesthetist->CurrentValue);
			if ($curVal <> "") {
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
				if ($this->Anesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anesthetist->ViewValue = NULL;
			}
			$this->Anesthetist->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// ProcedureDone
			$this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
			$this->ProcedureDone->ViewCustomAttributes = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
			$this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
			$this->Chiefcomplaints->ViewCustomAttributes = "";

			// MaritallHistory
			$this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
			$this->MaritallHistory->ViewCustomAttributes = "";

			// MenstrualHistory
			$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// SurgicalHistory
			$this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
			$this->SurgicalHistory->ViewCustomAttributes = "";

			// PastHistory
			$this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
			$this->PastHistory->ViewCustomAttributes = "";

			// FamilyHistory
			$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
			$this->FamilyHistory->ViewCustomAttributes = "";

			// Temp
			$this->Temp->ViewValue = $this->Temp->CurrentValue;
			$this->Temp->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// CNS
			$this->CNS->ViewValue = $this->CNS->CurrentValue;
			$this->CNS->ViewCustomAttributes = "";

			// RS
			$this->_RS->ViewValue = $this->_RS->CurrentValue;
			$this->_RS->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// InvestigationReport
			$this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
			$this->InvestigationReport->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";
			$this->DateofAdmission->TooltipValue = "";

			// DateofProcedure
			$this->DateofProcedure->LinkCustomAttributes = "";
			$this->DateofProcedure->HrefValue = "";
			$this->DateofProcedure->TooltipValue = "";

			// DateofDischarge
			$this->DateofDischarge->LinkCustomAttributes = "";
			$this->DateofDischarge->HrefValue = "";
			$this->DateofDischarge->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";
			$this->Anesthetist->TooltipValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// ProcedureDone
			$this->ProcedureDone->LinkCustomAttributes = "";
			$this->ProcedureDone->HrefValue = "";
			$this->ProcedureDone->TooltipValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";
			$this->PROVISIONALDIAGNOSIS->TooltipValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";
			$this->Chiefcomplaints->TooltipValue = "";

			// MaritallHistory
			$this->MaritallHistory->LinkCustomAttributes = "";
			$this->MaritallHistory->HrefValue = "";
			$this->MaritallHistory->TooltipValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";
			$this->MenstrualHistory->TooltipValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";
			$this->SurgicalHistory->TooltipValue = "";

			// PastHistory
			$this->PastHistory->LinkCustomAttributes = "";
			$this->PastHistory->HrefValue = "";
			$this->PastHistory->TooltipValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";
			$this->FamilyHistory->TooltipValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";
			$this->Temp->TooltipValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";
			$this->Pulse->TooltipValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";
			$this->BP->TooltipValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";
			$this->CNS->TooltipValue = "";

			// RS
			$this->_RS->LinkCustomAttributes = "";
			$this->_RS->HrefValue = "";
			$this->_RS->TooltipValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";

			// InvestigationReport
			$this->InvestigationReport->LinkCustomAttributes = "";
			$this->InvestigationReport->HrefValue = "";
			$this->InvestigationReport->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			if ($this->RIDNO->getSessionValue() <> "") {
				$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
				$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";
			} else {
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal <> "") {
				$this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Name->ViewValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->ViewValue = $this->Name->CurrentValue;
					}
				}
			} else {
				$this->Name->ViewValue = NULL;
			}
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal <> "") {
				$this->Name->EditValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Name->EditValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
					}
				}
			} else {
				$this->Name->EditValue = NULL;
			}
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// DateofAdmission
			$this->DateofAdmission->EditAttrs["class"] = "form-control";
			$this->DateofAdmission->EditCustomAttributes = "";
			$this->DateofAdmission->EditValue = HtmlEncode(FormatDateTime($this->DateofAdmission->CurrentValue, 11));
			$this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

			// DateofProcedure
			$this->DateofProcedure->EditAttrs["class"] = "form-control";
			$this->DateofProcedure->EditCustomAttributes = "";
			$this->DateofProcedure->EditValue = HtmlEncode(FormatDateTime($this->DateofProcedure->CurrentValue, 11));
			$this->DateofProcedure->PlaceHolder = RemoveHtml($this->DateofProcedure->caption());

			// DateofDischarge
			$this->DateofDischarge->EditAttrs["class"] = "form-control";
			$this->DateofDischarge->EditCustomAttributes = "";
			$this->DateofDischarge->EditValue = HtmlEncode(FormatDateTime($this->DateofDischarge->CurrentValue, 11));
			$this->DateofDischarge->PlaceHolder = RemoveHtml($this->DateofDischarge->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->Consultant->CurrentValue));
			if ($curVal <> "")
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
			else
				$this->Consultant->ViewValue = $this->Consultant->Lookup !== NULL && is_array($this->Consultant->Lookup->Options) ? $curVal : NULL;
			if ($this->Consultant->ViewValue !== NULL) { // Load from cache
				$this->Consultant->EditValue = array_values($this->Consultant->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Consultant->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Consultant->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Consultant->EditValue = $arwrk;
			}

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			$curVal = trim(strval($this->Surgeon->CurrentValue));
			if ($curVal <> "")
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			else
				$this->Surgeon->ViewValue = $this->Surgeon->Lookup !== NULL && is_array($this->Surgeon->Lookup->Options) ? $curVal : NULL;
			if ($this->Surgeon->ViewValue !== NULL) { // Load from cache
				$this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Surgeon->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Surgeon->EditValue = $arwrk;
			}

			// Anesthetist
			$this->Anesthetist->EditAttrs["class"] = "form-control";
			$this->Anesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anesthetist->CurrentValue));
			if ($curVal <> "")
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
			else
				$this->Anesthetist->ViewValue = $this->Anesthetist->Lookup !== NULL && is_array($this->Anesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anesthetist->EditValue = array_values($this->Anesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Anesthetist->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Anesthetist->EditValue = $arwrk;
			}

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// ProcedureDone
			$this->ProcedureDone->EditAttrs["class"] = "form-control";
			$this->ProcedureDone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
			$this->ProcedureDone->EditValue = HtmlEncode($this->ProcedureDone->CurrentValue);
			$this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
			$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->EditValue = HtmlEncode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

			// Chiefcomplaints
			$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
			$this->Chiefcomplaints->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->EditValue = HtmlEncode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

			// MaritallHistory
			$this->MaritallHistory->EditAttrs["class"] = "form-control";
			$this->MaritallHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
			$this->MaritallHistory->EditValue = HtmlEncode($this->MaritallHistory->CurrentValue);
			$this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

			// MenstrualHistory
			$this->MenstrualHistory->EditAttrs["class"] = "form-control";
			$this->MenstrualHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

			// SurgicalHistory
			$this->SurgicalHistory->EditAttrs["class"] = "form-control";
			$this->SurgicalHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

			// PastHistory
			$this->PastHistory->EditAttrs["class"] = "form-control";
			$this->PastHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
			$this->PastHistory->EditValue = HtmlEncode($this->PastHistory->CurrentValue);
			$this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

			// FamilyHistory
			$this->FamilyHistory->EditAttrs["class"] = "form-control";
			$this->FamilyHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RS
			$this->_RS->EditAttrs["class"] = "form-control";
			$this->_RS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
			$this->_RS->EditValue = HtmlEncode($this->_RS->CurrentValue);
			$this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// InvestigationReport
			$this->InvestigationReport->EditAttrs["class"] = "form-control";
			$this->InvestigationReport->EditCustomAttributes = "";
			$this->InvestigationReport->EditValue = HtmlEncode($this->InvestigationReport->CurrentValue);
			$this->InvestigationReport->PlaceHolder = RemoveHtml($this->InvestigationReport->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() <> "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->OldValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
			} else {
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";

			// DateofProcedure
			$this->DateofProcedure->LinkCustomAttributes = "";
			$this->DateofProcedure->HrefValue = "";

			// DateofDischarge
			$this->DateofDischarge->LinkCustomAttributes = "";
			$this->DateofDischarge->HrefValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";

			// ProcedureDone
			$this->ProcedureDone->LinkCustomAttributes = "";
			$this->ProcedureDone->HrefValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";

			// MaritallHistory
			$this->MaritallHistory->LinkCustomAttributes = "";
			$this->MaritallHistory->HrefValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";

			// PastHistory
			$this->PastHistory->LinkCustomAttributes = "";
			$this->PastHistory->HrefValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RS
			$this->_RS->LinkCustomAttributes = "";
			$this->_RS->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// InvestigationReport
			$this->InvestigationReport->LinkCustomAttributes = "";
			$this->InvestigationReport->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			if ($this->RIDNO->getSessionValue() <> "") {
				$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
				$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";
			} else {
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal <> "") {
				$this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Name->ViewValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->ViewValue = $this->Name->CurrentValue;
					}
				}
			} else {
				$this->Name->ViewValue = NULL;
			}
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal <> "") {
				$this->Name->EditValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Name->EditValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
					}
				}
			} else {
				$this->Name->EditValue = NULL;
			}
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// DateofAdmission
			$this->DateofAdmission->EditAttrs["class"] = "form-control";
			$this->DateofAdmission->EditCustomAttributes = "";
			$this->DateofAdmission->EditValue = HtmlEncode(FormatDateTime($this->DateofAdmission->CurrentValue, 11));
			$this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

			// DateofProcedure
			$this->DateofProcedure->EditAttrs["class"] = "form-control";
			$this->DateofProcedure->EditCustomAttributes = "";
			$this->DateofProcedure->EditValue = HtmlEncode(FormatDateTime($this->DateofProcedure->CurrentValue, 11));
			$this->DateofProcedure->PlaceHolder = RemoveHtml($this->DateofProcedure->caption());

			// DateofDischarge
			$this->DateofDischarge->EditAttrs["class"] = "form-control";
			$this->DateofDischarge->EditCustomAttributes = "";
			$this->DateofDischarge->EditValue = HtmlEncode(FormatDateTime($this->DateofDischarge->CurrentValue, 11));
			$this->DateofDischarge->PlaceHolder = RemoveHtml($this->DateofDischarge->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->Consultant->CurrentValue));
			if ($curVal <> "")
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
			else
				$this->Consultant->ViewValue = $this->Consultant->Lookup !== NULL && is_array($this->Consultant->Lookup->Options) ? $curVal : NULL;
			if ($this->Consultant->ViewValue !== NULL) { // Load from cache
				$this->Consultant->EditValue = array_values($this->Consultant->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Consultant->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Consultant->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Consultant->EditValue = $arwrk;
			}

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			$curVal = trim(strval($this->Surgeon->CurrentValue));
			if ($curVal <> "")
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			else
				$this->Surgeon->ViewValue = $this->Surgeon->Lookup !== NULL && is_array($this->Surgeon->Lookup->Options) ? $curVal : NULL;
			if ($this->Surgeon->ViewValue !== NULL) { // Load from cache
				$this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Surgeon->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Surgeon->EditValue = $arwrk;
			}

			// Anesthetist
			$this->Anesthetist->EditAttrs["class"] = "form-control";
			$this->Anesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anesthetist->CurrentValue));
			if ($curVal <> "")
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
			else
				$this->Anesthetist->ViewValue = $this->Anesthetist->Lookup !== NULL && is_array($this->Anesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anesthetist->EditValue = array_values($this->Anesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Anesthetist->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Anesthetist->EditValue = $arwrk;
			}

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// ProcedureDone
			$this->ProcedureDone->EditAttrs["class"] = "form-control";
			$this->ProcedureDone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
			$this->ProcedureDone->EditValue = HtmlEncode($this->ProcedureDone->CurrentValue);
			$this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
			$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->EditValue = HtmlEncode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

			// Chiefcomplaints
			$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
			$this->Chiefcomplaints->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->EditValue = HtmlEncode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

			// MaritallHistory
			$this->MaritallHistory->EditAttrs["class"] = "form-control";
			$this->MaritallHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
			$this->MaritallHistory->EditValue = HtmlEncode($this->MaritallHistory->CurrentValue);
			$this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

			// MenstrualHistory
			$this->MenstrualHistory->EditAttrs["class"] = "form-control";
			$this->MenstrualHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

			// SurgicalHistory
			$this->SurgicalHistory->EditAttrs["class"] = "form-control";
			$this->SurgicalHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

			// PastHistory
			$this->PastHistory->EditAttrs["class"] = "form-control";
			$this->PastHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
			$this->PastHistory->EditValue = HtmlEncode($this->PastHistory->CurrentValue);
			$this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

			// FamilyHistory
			$this->FamilyHistory->EditAttrs["class"] = "form-control";
			$this->FamilyHistory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RS
			$this->_RS->EditAttrs["class"] = "form-control";
			$this->_RS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
			$this->_RS->EditValue = HtmlEncode($this->_RS->CurrentValue);
			$this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// InvestigationReport
			$this->InvestigationReport->EditAttrs["class"] = "form-control";
			$this->InvestigationReport->EditCustomAttributes = "";
			$this->InvestigationReport->EditValue = HtmlEncode($this->InvestigationReport->CurrentValue);
			$this->InvestigationReport->PlaceHolder = RemoveHtml($this->InvestigationReport->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() <> "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->OldValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
			} else {
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";

			// DateofProcedure
			$this->DateofProcedure->LinkCustomAttributes = "";
			$this->DateofProcedure->HrefValue = "";

			// DateofDischarge
			$this->DateofDischarge->LinkCustomAttributes = "";
			$this->DateofDischarge->HrefValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";

			// ProcedureDone
			$this->ProcedureDone->LinkCustomAttributes = "";
			$this->ProcedureDone->HrefValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";

			// MaritallHistory
			$this->MaritallHistory->LinkCustomAttributes = "";
			$this->MaritallHistory->HrefValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";

			// PastHistory
			$this->PastHistory->LinkCustomAttributes = "";
			$this->PastHistory->HrefValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RS
			$this->_RS->LinkCustomAttributes = "";
			$this->_RS->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// InvestigationReport
			$this->InvestigationReport->LinkCustomAttributes = "";
			$this->InvestigationReport->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNO->FormValue)) {
			AddMessage($FormError, $this->RIDNO->errorMessage());
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->SEX->Required) {
			if (!$this->SEX->IsDetailKey && $this->SEX->FormValue != NULL && $this->SEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SEX->caption(), $this->SEX->RequiredErrorMessage));
			}
		}
		if ($this->Address->Required) {
			if (!$this->Address->IsDetailKey && $this->Address->FormValue != NULL && $this->Address->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
			}
		}
		if ($this->DateofAdmission->Required) {
			if (!$this->DateofAdmission->IsDetailKey && $this->DateofAdmission->FormValue != NULL && $this->DateofAdmission->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofAdmission->caption(), $this->DateofAdmission->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DateofAdmission->FormValue)) {
			AddMessage($FormError, $this->DateofAdmission->errorMessage());
		}
		if ($this->DateofProcedure->Required) {
			if (!$this->DateofProcedure->IsDetailKey && $this->DateofProcedure->FormValue != NULL && $this->DateofProcedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofProcedure->caption(), $this->DateofProcedure->RequiredErrorMessage));
			}
		}
		if ($this->DateofDischarge->Required) {
			if (!$this->DateofDischarge->IsDetailKey && $this->DateofDischarge->FormValue != NULL && $this->DateofDischarge->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofDischarge->caption(), $this->DateofDischarge->RequiredErrorMessage));
			}
		}
		if ($this->Consultant->Required) {
			if (!$this->Consultant->IsDetailKey && $this->Consultant->FormValue != NULL && $this->Consultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
			}
		}
		if ($this->Surgeon->Required) {
			if (!$this->Surgeon->IsDetailKey && $this->Surgeon->FormValue != NULL && $this->Surgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
			}
		}
		if ($this->Anesthetist->Required) {
			if (!$this->Anesthetist->IsDetailKey && $this->Anesthetist->FormValue != NULL && $this->Anesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
			}
		}
		if ($this->IdentificationMark->Required) {
			if (!$this->IdentificationMark->IsDetailKey && $this->IdentificationMark->FormValue != NULL && $this->IdentificationMark->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureDone->Required) {
			if (!$this->ProcedureDone->IsDetailKey && $this->ProcedureDone->FormValue != NULL && $this->ProcedureDone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureDone->caption(), $this->ProcedureDone->RequiredErrorMessage));
			}
		}
		if ($this->PROVISIONALDIAGNOSIS->Required) {
			if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey && $this->PROVISIONALDIAGNOSIS->FormValue != NULL && $this->PROVISIONALDIAGNOSIS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PROVISIONALDIAGNOSIS->caption(), $this->PROVISIONALDIAGNOSIS->RequiredErrorMessage));
			}
		}
		if ($this->Chiefcomplaints->Required) {
			if (!$this->Chiefcomplaints->IsDetailKey && $this->Chiefcomplaints->FormValue != NULL && $this->Chiefcomplaints->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Chiefcomplaints->caption(), $this->Chiefcomplaints->RequiredErrorMessage));
			}
		}
		if ($this->MaritallHistory->Required) {
			if (!$this->MaritallHistory->IsDetailKey && $this->MaritallHistory->FormValue != NULL && $this->MaritallHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaritallHistory->caption(), $this->MaritallHistory->RequiredErrorMessage));
			}
		}
		if ($this->MenstrualHistory->Required) {
			if (!$this->MenstrualHistory->IsDetailKey && $this->MenstrualHistory->FormValue != NULL && $this->MenstrualHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
			}
		}
		if ($this->SurgicalHistory->Required) {
			if (!$this->SurgicalHistory->IsDetailKey && $this->SurgicalHistory->FormValue != NULL && $this->SurgicalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurgicalHistory->caption(), $this->SurgicalHistory->RequiredErrorMessage));
			}
		}
		if ($this->PastHistory->Required) {
			if (!$this->PastHistory->IsDetailKey && $this->PastHistory->FormValue != NULL && $this->PastHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PastHistory->caption(), $this->PastHistory->RequiredErrorMessage));
			}
		}
		if ($this->FamilyHistory->Required) {
			if (!$this->FamilyHistory->IsDetailKey && $this->FamilyHistory->FormValue != NULL && $this->FamilyHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
			}
		}
		if ($this->Temp->Required) {
			if (!$this->Temp->IsDetailKey && $this->Temp->FormValue != NULL && $this->Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
			}
		}
		if ($this->Pulse->Required) {
			if (!$this->Pulse->IsDetailKey && $this->Pulse->FormValue != NULL && $this->Pulse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
			}
		}
		if ($this->BP->Required) {
			if (!$this->BP->IsDetailKey && $this->BP->FormValue != NULL && $this->BP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
			}
		}
		if ($this->CNS->Required) {
			if (!$this->CNS->IsDetailKey && $this->CNS->FormValue != NULL && $this->CNS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
			}
		}
		if ($this->_RS->Required) {
			if (!$this->_RS->IsDetailKey && $this->_RS->FormValue != NULL && $this->_RS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_RS->caption(), $this->_RS->RequiredErrorMessage));
			}
		}
		if ($this->CVS->Required) {
			if (!$this->CVS->IsDetailKey && $this->CVS->FormValue != NULL && $this->CVS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
			}
		}
		if ($this->PA->Required) {
			if (!$this->PA->IsDetailKey && $this->PA->FormValue != NULL && $this->PA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
			}
		}
		if ($this->InvestigationReport->Required) {
			if (!$this->InvestigationReport->IsDetailKey && $this->InvestigationReport->FormValue != NULL && $this->InvestigationReport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InvestigationReport->caption(), $this->InvestigationReport->RequiredErrorMessage));
			}
		}
		if ($this->FinalDiagnosis->Required) {
			if (!$this->FinalDiagnosis->IsDetailKey && $this->FinalDiagnosis->FormValue != NULL && $this->FinalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FinalDiagnosis->caption(), $this->FinalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->Treatment->Required) {
			if (!$this->Treatment->IsDetailKey && $this->Treatment->FormValue != NULL && $this->Treatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
			}
		}
		if ($this->DetailOfOperation->Required) {
			if (!$this->DetailOfOperation->IsDetailKey && $this->DetailOfOperation->FormValue != NULL && $this->DetailOfOperation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DetailOfOperation->caption(), $this->DetailOfOperation->RequiredErrorMessage));
			}
		}
		if ($this->FollowUpAdvice->Required) {
			if (!$this->FollowUpAdvice->IsDetailKey && $this->FollowUpAdvice->FormValue != NULL && $this->FollowUpAdvice->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowUpAdvice->caption(), $this->FollowUpAdvice->RequiredErrorMessage));
			}
		}
		if ($this->FollowUpMedication->Required) {
			if (!$this->FollowUpMedication->IsDetailKey && $this->FollowUpMedication->FormValue != NULL && $this->FollowUpMedication->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowUpMedication->caption(), $this->FollowUpMedication->RequiredErrorMessage));
			}
		}
		if ($this->Plan->Required) {
			if (!$this->Plan->IsDetailKey && $this->Plan->FormValue != NULL && $this->Plan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Plan->caption(), $this->Plan->RequiredErrorMessage));
			}
		}
		if ($this->TempleteFinalDiagnosis->Required) {
			if (!$this->TempleteFinalDiagnosis->IsDetailKey && $this->TempleteFinalDiagnosis->FormValue != NULL && $this->TempleteFinalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TempleteFinalDiagnosis->caption(), $this->TempleteFinalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->TemplateTreatment->Required) {
			if (!$this->TemplateTreatment->IsDetailKey && $this->TemplateTreatment->FormValue != NULL && $this->TemplateTreatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateTreatment->caption(), $this->TemplateTreatment->RequiredErrorMessage));
			}
		}
		if ($this->TemplateOperation->Required) {
			if (!$this->TemplateOperation->IsDetailKey && $this->TemplateOperation->FormValue != NULL && $this->TemplateOperation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateOperation->caption(), $this->TemplateOperation->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFollowUpAdvice->Required) {
			if (!$this->TemplateFollowUpAdvice->IsDetailKey && $this->TemplateFollowUpAdvice->FormValue != NULL && $this->TemplateFollowUpAdvice->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFollowUpAdvice->caption(), $this->TemplateFollowUpAdvice->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFollowUpMedication->Required) {
			if (!$this->TemplateFollowUpMedication->IsDetailKey && $this->TemplateFollowUpMedication->FormValue != NULL && $this->TemplateFollowUpMedication->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFollowUpMedication->caption(), $this->TemplateFollowUpMedication->RequiredErrorMessage));
			}
		}
		if ($this->TemplatePlan->Required) {
			if (!$this->TemplatePlan->IsDetailKey && $this->TemplatePlan->FormValue != NULL && $this->TemplatePlan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplatePlan->caption(), $this->TemplatePlan->RequiredErrorMessage));
			}
		}
		if ($this->QRCode->Required) {
			if (!$this->QRCode->IsDetailKey && $this->QRCode->FormValue != NULL && $this->QRCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QRCode->caption(), $this->QRCode->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// RIDNO
			$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, $this->RIDNO->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// DateofAdmission
			$this->DateofAdmission->setDbValueDef($rsnew, UnFormatDateTime($this->DateofAdmission->CurrentValue, 11), NULL, $this->DateofAdmission->ReadOnly);

			// DateofProcedure
			$this->DateofProcedure->setDbValueDef($rsnew, UnFormatDateTime($this->DateofProcedure->CurrentValue, 11), NULL, $this->DateofProcedure->ReadOnly);

			// DateofDischarge
			$this->DateofDischarge->setDbValueDef($rsnew, UnFormatDateTime($this->DateofDischarge->CurrentValue, 11), NULL, $this->DateofDischarge->ReadOnly);

			// Consultant
			$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, $this->Consultant->ReadOnly);

			// Surgeon
			$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, $this->Surgeon->ReadOnly);

			// Anesthetist
			$this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, NULL, $this->Anesthetist->ReadOnly);

			// IdentificationMark
			$this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, NULL, $this->IdentificationMark->ReadOnly);

			// ProcedureDone
			$this->ProcedureDone->setDbValueDef($rsnew, $this->ProcedureDone->CurrentValue, NULL, $this->ProcedureDone->ReadOnly);

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->setDbValueDef($rsnew, $this->PROVISIONALDIAGNOSIS->CurrentValue, NULL, $this->PROVISIONALDIAGNOSIS->ReadOnly);

			// Chiefcomplaints
			$this->Chiefcomplaints->setDbValueDef($rsnew, $this->Chiefcomplaints->CurrentValue, NULL, $this->Chiefcomplaints->ReadOnly);

			// MaritallHistory
			$this->MaritallHistory->setDbValueDef($rsnew, $this->MaritallHistory->CurrentValue, NULL, $this->MaritallHistory->ReadOnly);

			// MenstrualHistory
			$this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, NULL, $this->MenstrualHistory->ReadOnly);

			// SurgicalHistory
			$this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, NULL, $this->SurgicalHistory->ReadOnly);

			// PastHistory
			$this->PastHistory->setDbValueDef($rsnew, $this->PastHistory->CurrentValue, NULL, $this->PastHistory->ReadOnly);

			// FamilyHistory
			$this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, NULL, $this->FamilyHistory->ReadOnly);

			// Temp
			$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, $this->Temp->ReadOnly);

			// Pulse
			$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, $this->Pulse->ReadOnly);

			// BP
			$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, $this->BP->ReadOnly);

			// CNS
			$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, $this->CNS->ReadOnly);

			// RS
			$this->_RS->setDbValueDef($rsnew, $this->_RS->CurrentValue, NULL, $this->_RS->ReadOnly);

			// CVS
			$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, $this->CVS->ReadOnly);

			// PA
			$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, $this->PA->ReadOnly);

			// InvestigationReport
			$this->InvestigationReport->setDbValueDef($rsnew, $this->InvestigationReport->CurrentValue, NULL, $this->InvestigationReport->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Set up foreign key field value from Session
			if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
				$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// RIDNO
		$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// DateofAdmission
		$this->DateofAdmission->setDbValueDef($rsnew, UnFormatDateTime($this->DateofAdmission->CurrentValue, 11), NULL, FALSE);

		// DateofProcedure
		$this->DateofProcedure->setDbValueDef($rsnew, UnFormatDateTime($this->DateofProcedure->CurrentValue, 11), NULL, FALSE);

		// DateofDischarge
		$this->DateofDischarge->setDbValueDef($rsnew, UnFormatDateTime($this->DateofDischarge->CurrentValue, 11), NULL, FALSE);

		// Consultant
		$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, FALSE);

		// Surgeon
		$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, FALSE);

		// Anesthetist
		$this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, NULL, FALSE);

		// IdentificationMark
		$this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, NULL, FALSE);

		// ProcedureDone
		$this->ProcedureDone->setDbValueDef($rsnew, $this->ProcedureDone->CurrentValue, NULL, FALSE);

		// PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->setDbValueDef($rsnew, $this->PROVISIONALDIAGNOSIS->CurrentValue, NULL, FALSE);

		// Chiefcomplaints
		$this->Chiefcomplaints->setDbValueDef($rsnew, $this->Chiefcomplaints->CurrentValue, NULL, FALSE);

		// MaritallHistory
		$this->MaritallHistory->setDbValueDef($rsnew, $this->MaritallHistory->CurrentValue, NULL, FALSE);

		// MenstrualHistory
		$this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, NULL, FALSE);

		// SurgicalHistory
		$this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, NULL, FALSE);

		// PastHistory
		$this->PastHistory->setDbValueDef($rsnew, $this->PastHistory->CurrentValue, NULL, FALSE);

		// FamilyHistory
		$this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, NULL, FALSE);

		// Temp
		$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, FALSE);

		// Pulse
		$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, FALSE);

		// BP
		$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, FALSE);

		// CNS
		$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, FALSE);

		// RS
		$this->_RS->setDbValueDef($rsnew, $this->_RS->CurrentValue, NULL, FALSE);

		// CVS
		$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, FALSE);

		// PA
		$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, FALSE);

		// InvestigationReport
		$this->InvestigationReport->setDbValueDef($rsnew, $this->InvestigationReport->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{

		// Hide foreign keys
		$masterTblVar = $this->getCurrentMasterTable();
		if ($masterTblVar == "ivf_treatment_plan") {
			$this->RIDNO->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Name->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->TidNo->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_TempleteFinalDiagnosis":
					$lookupFilter = function() {
						return "`TemplateType`='TemplateDiagnosis'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateTreatment":
					$lookupFilter = function() {
						return "`TemplateType`='Treatment'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateOperation":
					$lookupFilter = function() {
						return "`TemplateType`='Operation'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpAdvice":
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpAdvice '";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpMedication":
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpMedication'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePlan":
					$lookupFilter = function() {
						return "`TemplateType`='TemplatePlan'";
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
						case "x_Name":
							break;
						case "x_Consultant":
							break;
						case "x_Surgeon":
							break;
						case "x_Anesthetist":
							break;
						case "x_TempleteFinalDiagnosis":
							break;
						case "x_TemplateTreatment":
							break;
						case "x_TemplateOperation":
							break;
						case "x_TemplateFollowUpAdvice":
							break;
						case "x_TemplateFollowUpMedication":
							break;
						case "x_TemplatePlan":
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_embryology_chart_delete extends ivf_embryology_chart
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_embryology_chart';

	// Page object name
	public $PageObjName = "ivf_embryology_chart_delete";

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

		// Table object (ivf_embryology_chart)
		if (!isset($GLOBALS["ivf_embryology_chart"]) || get_class($GLOBALS["ivf_embryology_chart"]) == PROJECT_NAMESPACE . "ivf_embryology_chart") {
			$GLOBALS["ivf_embryology_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_embryology_chart"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Table object (ivf_oocytedenudation)
		if (!isset($GLOBALS['ivf_oocytedenudation']))
			$GLOBALS['ivf_oocytedenudation'] = new ivf_oocytedenudation();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_embryology_chart');

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
		global $EXPORT, $ivf_embryology_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_embryology_chart);
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
					$this->terminate(GetUrl("ivf_embryology_chartlist.php"));
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
		$this->SpermOrigin->setVisibility();
		$this->InseminatinTechnique->setVisibility();
		$this->IndicationForART->setVisibility();
		$this->Day0sino->setVisibility();
		$this->Day0OocyteStage->setVisibility();
		$this->Day0PolarBodyPosition->setVisibility();
		$this->Day0Breakage->setVisibility();
		$this->Day0Attempts->setVisibility();
		$this->Day0SPZMorpho->setVisibility();
		$this->Day0SPZLocation->setVisibility();
		$this->Day0SpOrgin->setVisibility();
		$this->Day5Cryoptop->setVisibility();
		$this->Day1Sperm->setVisibility();
		$this->Day1PN->setVisibility();
		$this->Day1PB->setVisibility();
		$this->Day1Pronucleus->setVisibility();
		$this->Day1Nucleolus->setVisibility();
		$this->Day1Halo->setVisibility();
		$this->Day2SiNo->setVisibility();
		$this->Day2CellNo->setVisibility();
		$this->Day2Frag->setVisibility();
		$this->Day2Symmetry->setVisibility();
		$this->Day2Cryoptop->setVisibility();
		$this->Day2Grade->setVisibility();
		$this->Day2End->setVisibility();
		$this->Day3Sino->setVisibility();
		$this->Day3CellNo->setVisibility();
		$this->Day3Frag->setVisibility();
		$this->Day3Symmetry->setVisibility();
		$this->Day3ZP->setVisibility();
		$this->Day3Vacoules->setVisibility();
		$this->Day3Grade->setVisibility();
		$this->Day3Cryoptop->setVisibility();
		$this->Day3End->setVisibility();
		$this->Day4SiNo->setVisibility();
		$this->Day4CellNo->setVisibility();
		$this->Day4Frag->setVisibility();
		$this->Day4Symmetry->setVisibility();
		$this->Day4Grade->setVisibility();
		$this->Day4Cryoptop->setVisibility();
		$this->Day4End->setVisibility();
		$this->Day5CellNo->setVisibility();
		$this->Day5ICM->setVisibility();
		$this->Day5TE->setVisibility();
		$this->Day5Observation->setVisibility();
		$this->Day5Collapsed->setVisibility();
		$this->Day5Vacoulles->setVisibility();
		$this->Day5Grade->setVisibility();
		$this->Day6CellNo->setVisibility();
		$this->Day6ICM->setVisibility();
		$this->Day6TE->setVisibility();
		$this->Day6Observation->setVisibility();
		$this->Day6Collapsed->setVisibility();
		$this->Day6Vacoulles->setVisibility();
		$this->Day6Grade->setVisibility();
		$this->Day6Cryoptop->setVisibility();
		$this->EndSiNo->setVisibility();
		$this->EndingDay->setVisibility();
		$this->EndingCellStage->setVisibility();
		$this->EndingGrade->setVisibility();
		$this->EndingState->setVisibility();
		$this->TidNo->setVisibility();
		$this->DidNO->setVisibility();
		$this->ICSiIVFDateTime->setVisibility();
		$this->PrimaryEmbrologist->setVisibility();
		$this->SecondaryEmbrologist->setVisibility();
		$this->Incubator->setVisibility();
		$this->location->setVisibility();
		$this->OocyteNo->setVisibility();
		$this->Stage->setVisibility();
		$this->Remarks->setVisibility();
		$this->vitrificationDate->setVisibility();
		$this->vitriPrimaryEmbryologist->setVisibility();
		$this->vitriSecondaryEmbryologist->setVisibility();
		$this->vitriEmbryoNo->setVisibility();
		$this->thawReFrozen->setVisibility();
		$this->vitriFertilisationDate->setVisibility();
		$this->vitriDay->setVisibility();
		$this->vitriStage->setVisibility();
		$this->vitriGrade->setVisibility();
		$this->vitriIncubator->setVisibility();
		$this->vitriTank->setVisibility();
		$this->vitriCanister->setVisibility();
		$this->vitriGobiet->setVisibility();
		$this->vitriViscotube->setVisibility();
		$this->vitriCryolockNo->setVisibility();
		$this->vitriCryolockColour->setVisibility();
		$this->thawDate->setVisibility();
		$this->thawPrimaryEmbryologist->setVisibility();
		$this->thawSecondaryEmbryologist->setVisibility();
		$this->thawET->setVisibility();
		$this->thawAbserve->setVisibility();
		$this->thawDiscard->setVisibility();
		$this->ETCatheter->setVisibility();
		$this->ETDifficulty->setVisibility();
		$this->ETEasy->setVisibility();
		$this->ETComments->setVisibility();
		$this->ETDoctor->setVisibility();
		$this->ETEmbryologist->setVisibility();
		$this->ETDate->setVisibility();
		$this->Day1End->setVisibility();
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
		// Set up master/detail parameters

		$this->setupMasterParms();

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivf_embryology_chartlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("ivf_embryology_chartlist.php"); // Return to list
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
		$this->id->setDbValue($row['id']);
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ARTCycle->setDbValue($row['ARTCycle']);
		$this->SpermOrigin->setDbValue($row['SpermOrigin']);
		$this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
		$this->IndicationForART->setDbValue($row['IndicationForART']);
		$this->Day0sino->setDbValue($row['Day0sino']);
		$this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
		$this->Day0PolarBodyPosition->setDbValue($row['Day0PolarBodyPosition']);
		$this->Day0Breakage->setDbValue($row['Day0Breakage']);
		$this->Day0Attempts->setDbValue($row['Day0Attempts']);
		$this->Day0SPZMorpho->setDbValue($row['Day0SPZMorpho']);
		$this->Day0SPZLocation->setDbValue($row['Day0SPZLocation']);
		$this->Day0SpOrgin->setDbValue($row['Day0SpOrgin']);
		$this->Day5Cryoptop->setDbValue($row['Day5Cryoptop']);
		$this->Day1Sperm->setDbValue($row['Day1Sperm']);
		$this->Day1PN->setDbValue($row['Day1PN']);
		$this->Day1PB->setDbValue($row['Day1PB']);
		$this->Day1Pronucleus->setDbValue($row['Day1Pronucleus']);
		$this->Day1Nucleolus->setDbValue($row['Day1Nucleolus']);
		$this->Day1Halo->setDbValue($row['Day1Halo']);
		$this->Day2SiNo->setDbValue($row['Day2SiNo']);
		$this->Day2CellNo->setDbValue($row['Day2CellNo']);
		$this->Day2Frag->setDbValue($row['Day2Frag']);
		$this->Day2Symmetry->setDbValue($row['Day2Symmetry']);
		$this->Day2Cryoptop->setDbValue($row['Day2Cryoptop']);
		$this->Day2Grade->setDbValue($row['Day2Grade']);
		$this->Day2End->setDbValue($row['Day2End']);
		$this->Day3Sino->setDbValue($row['Day3Sino']);
		$this->Day3CellNo->setDbValue($row['Day3CellNo']);
		$this->Day3Frag->setDbValue($row['Day3Frag']);
		$this->Day3Symmetry->setDbValue($row['Day3Symmetry']);
		$this->Day3ZP->setDbValue($row['Day3ZP']);
		$this->Day3Vacoules->setDbValue($row['Day3Vacoules']);
		$this->Day3Grade->setDbValue($row['Day3Grade']);
		$this->Day3Cryoptop->setDbValue($row['Day3Cryoptop']);
		$this->Day3End->setDbValue($row['Day3End']);
		$this->Day4SiNo->setDbValue($row['Day4SiNo']);
		$this->Day4CellNo->setDbValue($row['Day4CellNo']);
		$this->Day4Frag->setDbValue($row['Day4Frag']);
		$this->Day4Symmetry->setDbValue($row['Day4Symmetry']);
		$this->Day4Grade->setDbValue($row['Day4Grade']);
		$this->Day4Cryoptop->setDbValue($row['Day4Cryoptop']);
		$this->Day4End->setDbValue($row['Day4End']);
		$this->Day5CellNo->setDbValue($row['Day5CellNo']);
		$this->Day5ICM->setDbValue($row['Day5ICM']);
		$this->Day5TE->setDbValue($row['Day5TE']);
		$this->Day5Observation->setDbValue($row['Day5Observation']);
		$this->Day5Collapsed->setDbValue($row['Day5Collapsed']);
		$this->Day5Vacoulles->setDbValue($row['Day5Vacoulles']);
		$this->Day5Grade->setDbValue($row['Day5Grade']);
		$this->Day6CellNo->setDbValue($row['Day6CellNo']);
		$this->Day6ICM->setDbValue($row['Day6ICM']);
		$this->Day6TE->setDbValue($row['Day6TE']);
		$this->Day6Observation->setDbValue($row['Day6Observation']);
		$this->Day6Collapsed->setDbValue($row['Day6Collapsed']);
		$this->Day6Vacoulles->setDbValue($row['Day6Vacoulles']);
		$this->Day6Grade->setDbValue($row['Day6Grade']);
		$this->Day6Cryoptop->setDbValue($row['Day6Cryoptop']);
		$this->EndSiNo->setDbValue($row['EndSiNo']);
		$this->EndingDay->setDbValue($row['EndingDay']);
		$this->EndingCellStage->setDbValue($row['EndingCellStage']);
		$this->EndingGrade->setDbValue($row['EndingGrade']);
		$this->EndingState->setDbValue($row['EndingState']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->DidNO->setDbValue($row['DidNO']);
		$this->ICSiIVFDateTime->setDbValue($row['ICSiIVFDateTime']);
		$this->PrimaryEmbrologist->setDbValue($row['PrimaryEmbrologist']);
		$this->SecondaryEmbrologist->setDbValue($row['SecondaryEmbrologist']);
		$this->Incubator->setDbValue($row['Incubator']);
		$this->location->setDbValue($row['location']);
		$this->OocyteNo->setDbValue($row['OocyteNo']);
		$this->Stage->setDbValue($row['Stage']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->vitrificationDate->setDbValue($row['vitrificationDate']);
		$this->vitriPrimaryEmbryologist->setDbValue($row['vitriPrimaryEmbryologist']);
		$this->vitriSecondaryEmbryologist->setDbValue($row['vitriSecondaryEmbryologist']);
		$this->vitriEmbryoNo->setDbValue($row['vitriEmbryoNo']);
		$this->thawReFrozen->setDbValue($row['thawReFrozen']);
		$this->vitriFertilisationDate->setDbValue($row['vitriFertilisationDate']);
		$this->vitriDay->setDbValue($row['vitriDay']);
		$this->vitriStage->setDbValue($row['vitriStage']);
		$this->vitriGrade->setDbValue($row['vitriGrade']);
		$this->vitriIncubator->setDbValue($row['vitriIncubator']);
		$this->vitriTank->setDbValue($row['vitriTank']);
		$this->vitriCanister->setDbValue($row['vitriCanister']);
		$this->vitriGobiet->setDbValue($row['vitriGobiet']);
		$this->vitriViscotube->setDbValue($row['vitriViscotube']);
		$this->vitriCryolockNo->setDbValue($row['vitriCryolockNo']);
		$this->vitriCryolockColour->setDbValue($row['vitriCryolockColour']);
		$this->thawDate->setDbValue($row['thawDate']);
		$this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
		$this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
		$this->thawET->setDbValue($row['thawET']);
		$this->thawAbserve->setDbValue($row['thawAbserve']);
		$this->thawDiscard->setDbValue($row['thawDiscard']);
		$this->ETCatheter->setDbValue($row['ETCatheter']);
		$this->ETDifficulty->setDbValue($row['ETDifficulty']);
		$this->ETEasy->setDbValue($row['ETEasy']);
		$this->ETComments->setDbValue($row['ETComments']);
		$this->ETDoctor->setDbValue($row['ETDoctor']);
		$this->ETEmbryologist->setDbValue($row['ETEmbryologist']);
		$this->ETDate->setDbValue($row['ETDate']);
		$this->Day1End->setDbValue($row['Day1End']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ARTCycle'] = NULL;
		$row['SpermOrigin'] = NULL;
		$row['InseminatinTechnique'] = NULL;
		$row['IndicationForART'] = NULL;
		$row['Day0sino'] = NULL;
		$row['Day0OocyteStage'] = NULL;
		$row['Day0PolarBodyPosition'] = NULL;
		$row['Day0Breakage'] = NULL;
		$row['Day0Attempts'] = NULL;
		$row['Day0SPZMorpho'] = NULL;
		$row['Day0SPZLocation'] = NULL;
		$row['Day0SpOrgin'] = NULL;
		$row['Day5Cryoptop'] = NULL;
		$row['Day1Sperm'] = NULL;
		$row['Day1PN'] = NULL;
		$row['Day1PB'] = NULL;
		$row['Day1Pronucleus'] = NULL;
		$row['Day1Nucleolus'] = NULL;
		$row['Day1Halo'] = NULL;
		$row['Day2SiNo'] = NULL;
		$row['Day2CellNo'] = NULL;
		$row['Day2Frag'] = NULL;
		$row['Day2Symmetry'] = NULL;
		$row['Day2Cryoptop'] = NULL;
		$row['Day2Grade'] = NULL;
		$row['Day2End'] = NULL;
		$row['Day3Sino'] = NULL;
		$row['Day3CellNo'] = NULL;
		$row['Day3Frag'] = NULL;
		$row['Day3Symmetry'] = NULL;
		$row['Day3ZP'] = NULL;
		$row['Day3Vacoules'] = NULL;
		$row['Day3Grade'] = NULL;
		$row['Day3Cryoptop'] = NULL;
		$row['Day3End'] = NULL;
		$row['Day4SiNo'] = NULL;
		$row['Day4CellNo'] = NULL;
		$row['Day4Frag'] = NULL;
		$row['Day4Symmetry'] = NULL;
		$row['Day4Grade'] = NULL;
		$row['Day4Cryoptop'] = NULL;
		$row['Day4End'] = NULL;
		$row['Day5CellNo'] = NULL;
		$row['Day5ICM'] = NULL;
		$row['Day5TE'] = NULL;
		$row['Day5Observation'] = NULL;
		$row['Day5Collapsed'] = NULL;
		$row['Day5Vacoulles'] = NULL;
		$row['Day5Grade'] = NULL;
		$row['Day6CellNo'] = NULL;
		$row['Day6ICM'] = NULL;
		$row['Day6TE'] = NULL;
		$row['Day6Observation'] = NULL;
		$row['Day6Collapsed'] = NULL;
		$row['Day6Vacoulles'] = NULL;
		$row['Day6Grade'] = NULL;
		$row['Day6Cryoptop'] = NULL;
		$row['EndSiNo'] = NULL;
		$row['EndingDay'] = NULL;
		$row['EndingCellStage'] = NULL;
		$row['EndingGrade'] = NULL;
		$row['EndingState'] = NULL;
		$row['TidNo'] = NULL;
		$row['DidNO'] = NULL;
		$row['ICSiIVFDateTime'] = NULL;
		$row['PrimaryEmbrologist'] = NULL;
		$row['SecondaryEmbrologist'] = NULL;
		$row['Incubator'] = NULL;
		$row['location'] = NULL;
		$row['OocyteNo'] = NULL;
		$row['Stage'] = NULL;
		$row['Remarks'] = NULL;
		$row['vitrificationDate'] = NULL;
		$row['vitriPrimaryEmbryologist'] = NULL;
		$row['vitriSecondaryEmbryologist'] = NULL;
		$row['vitriEmbryoNo'] = NULL;
		$row['thawReFrozen'] = NULL;
		$row['vitriFertilisationDate'] = NULL;
		$row['vitriDay'] = NULL;
		$row['vitriStage'] = NULL;
		$row['vitriGrade'] = NULL;
		$row['vitriIncubator'] = NULL;
		$row['vitriTank'] = NULL;
		$row['vitriCanister'] = NULL;
		$row['vitriGobiet'] = NULL;
		$row['vitriViscotube'] = NULL;
		$row['vitriCryolockNo'] = NULL;
		$row['vitriCryolockColour'] = NULL;
		$row['thawDate'] = NULL;
		$row['thawPrimaryEmbryologist'] = NULL;
		$row['thawSecondaryEmbryologist'] = NULL;
		$row['thawET'] = NULL;
		$row['thawAbserve'] = NULL;
		$row['thawDiscard'] = NULL;
		$row['ETCatheter'] = NULL;
		$row['ETDifficulty'] = NULL;
		$row['ETEasy'] = NULL;
		$row['ETComments'] = NULL;
		$row['ETDoctor'] = NULL;
		$row['ETEmbryologist'] = NULL;
		$row['ETDate'] = NULL;
		$row['Day1End'] = NULL;
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
		// SpermOrigin
		// InseminatinTechnique
		// IndicationForART
		// Day0sino
		// Day0OocyteStage
		// Day0PolarBodyPosition
		// Day0Breakage
		// Day0Attempts
		// Day0SPZMorpho
		// Day0SPZLocation
		// Day0SpOrgin
		// Day5Cryoptop
		// Day1Sperm
		// Day1PN
		// Day1PB
		// Day1Pronucleus
		// Day1Nucleolus
		// Day1Halo
		// Day2SiNo
		// Day2CellNo
		// Day2Frag
		// Day2Symmetry
		// Day2Cryoptop
		// Day2Grade
		// Day2End
		// Day3Sino
		// Day3CellNo
		// Day3Frag
		// Day3Symmetry
		// Day3ZP
		// Day3Vacoules
		// Day3Grade
		// Day3Cryoptop
		// Day3End
		// Day4SiNo
		// Day4CellNo
		// Day4Frag
		// Day4Symmetry
		// Day4Grade
		// Day4Cryoptop
		// Day4End
		// Day5CellNo
		// Day5ICM
		// Day5TE
		// Day5Observation
		// Day5Collapsed
		// Day5Vacoulles
		// Day5Grade
		// Day6CellNo
		// Day6ICM
		// Day6TE
		// Day6Observation
		// Day6Collapsed
		// Day6Vacoulles
		// Day6Grade
		// Day6Cryoptop
		// EndSiNo
		// EndingDay
		// EndingCellStage
		// EndingGrade
		// EndingState
		// TidNo
		// DidNO
		// ICSiIVFDateTime
		// PrimaryEmbrologist
		// SecondaryEmbrologist
		// Incubator
		// location
		// OocyteNo
		// Stage
		// Remarks
		// vitrificationDate
		// vitriPrimaryEmbryologist
		// vitriSecondaryEmbryologist
		// vitriEmbryoNo
		// thawReFrozen
		// vitriFertilisationDate
		// vitriDay
		// vitriStage
		// vitriGrade
		// vitriIncubator
		// vitriTank
		// vitriCanister
		// vitriGobiet
		// vitriViscotube
		// vitriCryolockNo
		// vitriCryolockColour
		// thawDate
		// thawPrimaryEmbryologist
		// thawSecondaryEmbryologist
		// thawET
		// thawAbserve
		// thawDiscard
		// ETCatheter
		// ETDifficulty
		// ETEasy
		// ETComments
		// ETDoctor
		// ETEmbryologist
		// ETDate
		// Day1End

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
			$this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
			$this->ARTCycle->ViewCustomAttributes = "";

			// SpermOrigin
			$this->SpermOrigin->ViewValue = $this->SpermOrigin->CurrentValue;
			$this->SpermOrigin->ViewCustomAttributes = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// IndicationForART
			$this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
			$this->IndicationForART->ViewCustomAttributes = "";

			// Day0sino
			$this->Day0sino->ViewValue = $this->Day0sino->CurrentValue;
			$this->Day0sino->ViewCustomAttributes = "";

			// Day0OocyteStage
			$this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
			$this->Day0OocyteStage->ViewCustomAttributes = "";

			// Day0PolarBodyPosition
			if (strval($this->Day0PolarBodyPosition->CurrentValue) <> "") {
				$this->Day0PolarBodyPosition->ViewValue = $this->Day0PolarBodyPosition->optionCaption($this->Day0PolarBodyPosition->CurrentValue);
			} else {
				$this->Day0PolarBodyPosition->ViewValue = NULL;
			}
			$this->Day0PolarBodyPosition->ViewCustomAttributes = "";

			// Day0Breakage
			if (strval($this->Day0Breakage->CurrentValue) <> "") {
				$this->Day0Breakage->ViewValue = $this->Day0Breakage->optionCaption($this->Day0Breakage->CurrentValue);
			} else {
				$this->Day0Breakage->ViewValue = NULL;
			}
			$this->Day0Breakage->ViewCustomAttributes = "";

			// Day0Attempts
			if (strval($this->Day0Attempts->CurrentValue) <> "") {
				$this->Day0Attempts->ViewValue = $this->Day0Attempts->optionCaption($this->Day0Attempts->CurrentValue);
			} else {
				$this->Day0Attempts->ViewValue = NULL;
			}
			$this->Day0Attempts->ViewCustomAttributes = "";

			// Day0SPZMorpho
			if (strval($this->Day0SPZMorpho->CurrentValue) <> "") {
				$this->Day0SPZMorpho->ViewValue = $this->Day0SPZMorpho->optionCaption($this->Day0SPZMorpho->CurrentValue);
			} else {
				$this->Day0SPZMorpho->ViewValue = NULL;
			}
			$this->Day0SPZMorpho->ViewCustomAttributes = "";

			// Day0SPZLocation
			if (strval($this->Day0SPZLocation->CurrentValue) <> "") {
				$this->Day0SPZLocation->ViewValue = $this->Day0SPZLocation->optionCaption($this->Day0SPZLocation->CurrentValue);
			} else {
				$this->Day0SPZLocation->ViewValue = NULL;
			}
			$this->Day0SPZLocation->ViewCustomAttributes = "";

			// Day0SpOrgin
			if (strval($this->Day0SpOrgin->CurrentValue) <> "") {
				$this->Day0SpOrgin->ViewValue = $this->Day0SpOrgin->optionCaption($this->Day0SpOrgin->CurrentValue);
			} else {
				$this->Day0SpOrgin->ViewValue = NULL;
			}
			$this->Day0SpOrgin->ViewCustomAttributes = "";

			// Day5Cryoptop
			if (strval($this->Day5Cryoptop->CurrentValue) <> "") {
				$this->Day5Cryoptop->ViewValue = $this->Day5Cryoptop->optionCaption($this->Day5Cryoptop->CurrentValue);
			} else {
				$this->Day5Cryoptop->ViewValue = NULL;
			}
			$this->Day5Cryoptop->ViewCustomAttributes = "";

			// Day1Sperm
			$this->Day1Sperm->ViewValue = $this->Day1Sperm->CurrentValue;
			$this->Day1Sperm->ViewCustomAttributes = "";

			// Day1PN
			if (strval($this->Day1PN->CurrentValue) <> "") {
				$this->Day1PN->ViewValue = $this->Day1PN->optionCaption($this->Day1PN->CurrentValue);
			} else {
				$this->Day1PN->ViewValue = NULL;
			}
			$this->Day1PN->ViewCustomAttributes = "";

			// Day1PB
			if (strval($this->Day1PB->CurrentValue) <> "") {
				$this->Day1PB->ViewValue = $this->Day1PB->optionCaption($this->Day1PB->CurrentValue);
			} else {
				$this->Day1PB->ViewValue = NULL;
			}
			$this->Day1PB->ViewCustomAttributes = "";

			// Day1Pronucleus
			if (strval($this->Day1Pronucleus->CurrentValue) <> "") {
				$this->Day1Pronucleus->ViewValue = $this->Day1Pronucleus->optionCaption($this->Day1Pronucleus->CurrentValue);
			} else {
				$this->Day1Pronucleus->ViewValue = NULL;
			}
			$this->Day1Pronucleus->ViewCustomAttributes = "";

			// Day1Nucleolus
			if (strval($this->Day1Nucleolus->CurrentValue) <> "") {
				$this->Day1Nucleolus->ViewValue = $this->Day1Nucleolus->optionCaption($this->Day1Nucleolus->CurrentValue);
			} else {
				$this->Day1Nucleolus->ViewValue = NULL;
			}
			$this->Day1Nucleolus->ViewCustomAttributes = "";

			// Day1Halo
			if (strval($this->Day1Halo->CurrentValue) <> "") {
				$this->Day1Halo->ViewValue = $this->Day1Halo->optionCaption($this->Day1Halo->CurrentValue);
			} else {
				$this->Day1Halo->ViewValue = NULL;
			}
			$this->Day1Halo->ViewCustomAttributes = "";

			// Day2SiNo
			$this->Day2SiNo->ViewValue = $this->Day2SiNo->CurrentValue;
			$this->Day2SiNo->ViewCustomAttributes = "";

			// Day2CellNo
			$this->Day2CellNo->ViewValue = $this->Day2CellNo->CurrentValue;
			$this->Day2CellNo->ViewCustomAttributes = "";

			// Day2Frag
			$this->Day2Frag->ViewValue = $this->Day2Frag->CurrentValue;
			$this->Day2Frag->ViewCustomAttributes = "";

			// Day2Symmetry
			$this->Day2Symmetry->ViewValue = $this->Day2Symmetry->CurrentValue;
			$this->Day2Symmetry->ViewCustomAttributes = "";

			// Day2Cryoptop
			$this->Day2Cryoptop->ViewValue = $this->Day2Cryoptop->CurrentValue;
			$this->Day2Cryoptop->ViewCustomAttributes = "";

			// Day2Grade
			$this->Day2Grade->ViewValue = $this->Day2Grade->CurrentValue;
			$this->Day2Grade->ViewCustomAttributes = "";

			// Day2End
			if (strval($this->Day2End->CurrentValue) <> "") {
				$this->Day2End->ViewValue = $this->Day2End->optionCaption($this->Day2End->CurrentValue);
			} else {
				$this->Day2End->ViewValue = NULL;
			}
			$this->Day2End->ViewCustomAttributes = "";

			// Day3Sino
			$this->Day3Sino->ViewValue = $this->Day3Sino->CurrentValue;
			$this->Day3Sino->ViewCustomAttributes = "";

			// Day3CellNo
			$this->Day3CellNo->ViewValue = $this->Day3CellNo->CurrentValue;
			$this->Day3CellNo->ViewCustomAttributes = "";

			// Day3Frag
			if (strval($this->Day3Frag->CurrentValue) <> "") {
				$this->Day3Frag->ViewValue = $this->Day3Frag->optionCaption($this->Day3Frag->CurrentValue);
			} else {
				$this->Day3Frag->ViewValue = NULL;
			}
			$this->Day3Frag->ViewCustomAttributes = "";

			// Day3Symmetry
			if (strval($this->Day3Symmetry->CurrentValue) <> "") {
				$this->Day3Symmetry->ViewValue = $this->Day3Symmetry->optionCaption($this->Day3Symmetry->CurrentValue);
			} else {
				$this->Day3Symmetry->ViewValue = NULL;
			}
			$this->Day3Symmetry->ViewCustomAttributes = "";

			// Day3ZP
			if (strval($this->Day3ZP->CurrentValue) <> "") {
				$this->Day3ZP->ViewValue = $this->Day3ZP->optionCaption($this->Day3ZP->CurrentValue);
			} else {
				$this->Day3ZP->ViewValue = NULL;
			}
			$this->Day3ZP->ViewCustomAttributes = "";

			// Day3Vacoules
			if (strval($this->Day3Vacoules->CurrentValue) <> "") {
				$this->Day3Vacoules->ViewValue = $this->Day3Vacoules->optionCaption($this->Day3Vacoules->CurrentValue);
			} else {
				$this->Day3Vacoules->ViewValue = NULL;
			}
			$this->Day3Vacoules->ViewCustomAttributes = "";

			// Day3Grade
			if (strval($this->Day3Grade->CurrentValue) <> "") {
				$this->Day3Grade->ViewValue = $this->Day3Grade->optionCaption($this->Day3Grade->CurrentValue);
			} else {
				$this->Day3Grade->ViewValue = NULL;
			}
			$this->Day3Grade->ViewCustomAttributes = "";

			// Day3Cryoptop
			if (strval($this->Day3Cryoptop->CurrentValue) <> "") {
				$this->Day3Cryoptop->ViewValue = $this->Day3Cryoptop->optionCaption($this->Day3Cryoptop->CurrentValue);
			} else {
				$this->Day3Cryoptop->ViewValue = NULL;
			}
			$this->Day3Cryoptop->ViewCustomAttributes = "";

			// Day3End
			if (strval($this->Day3End->CurrentValue) <> "") {
				$this->Day3End->ViewValue = $this->Day3End->optionCaption($this->Day3End->CurrentValue);
			} else {
				$this->Day3End->ViewValue = NULL;
			}
			$this->Day3End->ViewCustomAttributes = "";

			// Day4SiNo
			$this->Day4SiNo->ViewValue = $this->Day4SiNo->CurrentValue;
			$this->Day4SiNo->ViewCustomAttributes = "";

			// Day4CellNo
			$this->Day4CellNo->ViewValue = $this->Day4CellNo->CurrentValue;
			$this->Day4CellNo->ViewCustomAttributes = "";

			// Day4Frag
			$this->Day4Frag->ViewValue = $this->Day4Frag->CurrentValue;
			$this->Day4Frag->ViewCustomAttributes = "";

			// Day4Symmetry
			$this->Day4Symmetry->ViewValue = $this->Day4Symmetry->CurrentValue;
			$this->Day4Symmetry->ViewCustomAttributes = "";

			// Day4Grade
			$this->Day4Grade->ViewValue = $this->Day4Grade->CurrentValue;
			$this->Day4Grade->ViewCustomAttributes = "";

			// Day4Cryoptop
			if (strval($this->Day4Cryoptop->CurrentValue) <> "") {
				$this->Day4Cryoptop->ViewValue = $this->Day4Cryoptop->optionCaption($this->Day4Cryoptop->CurrentValue);
			} else {
				$this->Day4Cryoptop->ViewValue = NULL;
			}
			$this->Day4Cryoptop->ViewCustomAttributes = "";

			// Day4End
			if (strval($this->Day4End->CurrentValue) <> "") {
				$this->Day4End->ViewValue = $this->Day4End->optionCaption($this->Day4End->CurrentValue);
			} else {
				$this->Day4End->ViewValue = NULL;
			}
			$this->Day4End->ViewCustomAttributes = "";

			// Day5CellNo
			$this->Day5CellNo->ViewValue = $this->Day5CellNo->CurrentValue;
			$this->Day5CellNo->ViewCustomAttributes = "";

			// Day5ICM
			if (strval($this->Day5ICM->CurrentValue) <> "") {
				$this->Day5ICM->ViewValue = $this->Day5ICM->optionCaption($this->Day5ICM->CurrentValue);
			} else {
				$this->Day5ICM->ViewValue = NULL;
			}
			$this->Day5ICM->ViewCustomAttributes = "";

			// Day5TE
			if (strval($this->Day5TE->CurrentValue) <> "") {
				$this->Day5TE->ViewValue = $this->Day5TE->optionCaption($this->Day5TE->CurrentValue);
			} else {
				$this->Day5TE->ViewValue = NULL;
			}
			$this->Day5TE->ViewCustomAttributes = "";

			// Day5Observation
			if (strval($this->Day5Observation->CurrentValue) <> "") {
				$this->Day5Observation->ViewValue = $this->Day5Observation->optionCaption($this->Day5Observation->CurrentValue);
			} else {
				$this->Day5Observation->ViewValue = NULL;
			}
			$this->Day5Observation->ViewCustomAttributes = "";

			// Day5Collapsed
			if (strval($this->Day5Collapsed->CurrentValue) <> "") {
				$this->Day5Collapsed->ViewValue = $this->Day5Collapsed->optionCaption($this->Day5Collapsed->CurrentValue);
			} else {
				$this->Day5Collapsed->ViewValue = NULL;
			}
			$this->Day5Collapsed->ViewCustomAttributes = "";

			// Day5Vacoulles
			if (strval($this->Day5Vacoulles->CurrentValue) <> "") {
				$this->Day5Vacoulles->ViewValue = $this->Day5Vacoulles->optionCaption($this->Day5Vacoulles->CurrentValue);
			} else {
				$this->Day5Vacoulles->ViewValue = NULL;
			}
			$this->Day5Vacoulles->ViewCustomAttributes = "";

			// Day5Grade
			if (strval($this->Day5Grade->CurrentValue) <> "") {
				$this->Day5Grade->ViewValue = $this->Day5Grade->optionCaption($this->Day5Grade->CurrentValue);
			} else {
				$this->Day5Grade->ViewValue = NULL;
			}
			$this->Day5Grade->ViewCustomAttributes = "";

			// Day6CellNo
			$this->Day6CellNo->ViewValue = $this->Day6CellNo->CurrentValue;
			$this->Day6CellNo->ViewCustomAttributes = "";

			// Day6ICM
			if (strval($this->Day6ICM->CurrentValue) <> "") {
				$this->Day6ICM->ViewValue = $this->Day6ICM->optionCaption($this->Day6ICM->CurrentValue);
			} else {
				$this->Day6ICM->ViewValue = NULL;
			}
			$this->Day6ICM->ViewCustomAttributes = "";

			// Day6TE
			if (strval($this->Day6TE->CurrentValue) <> "") {
				$this->Day6TE->ViewValue = $this->Day6TE->optionCaption($this->Day6TE->CurrentValue);
			} else {
				$this->Day6TE->ViewValue = NULL;
			}
			$this->Day6TE->ViewCustomAttributes = "";

			// Day6Observation
			if (strval($this->Day6Observation->CurrentValue) <> "") {
				$this->Day6Observation->ViewValue = $this->Day6Observation->optionCaption($this->Day6Observation->CurrentValue);
			} else {
				$this->Day6Observation->ViewValue = NULL;
			}
			$this->Day6Observation->ViewCustomAttributes = "";

			// Day6Collapsed
			if (strval($this->Day6Collapsed->CurrentValue) <> "") {
				$this->Day6Collapsed->ViewValue = $this->Day6Collapsed->optionCaption($this->Day6Collapsed->CurrentValue);
			} else {
				$this->Day6Collapsed->ViewValue = NULL;
			}
			$this->Day6Collapsed->ViewCustomAttributes = "";

			// Day6Vacoulles
			if (strval($this->Day6Vacoulles->CurrentValue) <> "") {
				$this->Day6Vacoulles->ViewValue = $this->Day6Vacoulles->optionCaption($this->Day6Vacoulles->CurrentValue);
			} else {
				$this->Day6Vacoulles->ViewValue = NULL;
			}
			$this->Day6Vacoulles->ViewCustomAttributes = "";

			// Day6Grade
			if (strval($this->Day6Grade->CurrentValue) <> "") {
				$this->Day6Grade->ViewValue = $this->Day6Grade->optionCaption($this->Day6Grade->CurrentValue);
			} else {
				$this->Day6Grade->ViewValue = NULL;
			}
			$this->Day6Grade->ViewCustomAttributes = "";

			// Day6Cryoptop
			$this->Day6Cryoptop->ViewValue = $this->Day6Cryoptop->CurrentValue;
			$this->Day6Cryoptop->ViewCustomAttributes = "";

			// EndSiNo
			$this->EndSiNo->ViewValue = $this->EndSiNo->CurrentValue;
			$this->EndSiNo->ViewCustomAttributes = "";

			// EndingDay
			if (strval($this->EndingDay->CurrentValue) <> "") {
				$this->EndingDay->ViewValue = $this->EndingDay->optionCaption($this->EndingDay->CurrentValue);
			} else {
				$this->EndingDay->ViewValue = NULL;
			}
			$this->EndingDay->ViewCustomAttributes = "";

			// EndingCellStage
			$this->EndingCellStage->ViewValue = $this->EndingCellStage->CurrentValue;
			$this->EndingCellStage->ViewCustomAttributes = "";

			// EndingGrade
			if (strval($this->EndingGrade->CurrentValue) <> "") {
				$this->EndingGrade->ViewValue = $this->EndingGrade->optionCaption($this->EndingGrade->CurrentValue);
			} else {
				$this->EndingGrade->ViewValue = NULL;
			}
			$this->EndingGrade->ViewCustomAttributes = "";

			// EndingState
			if (strval($this->EndingState->CurrentValue) <> "") {
				$this->EndingState->ViewValue = $this->EndingState->optionCaption($this->EndingState->CurrentValue);
			} else {
				$this->EndingState->ViewValue = NULL;
			}
			$this->EndingState->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// DidNO
			$this->DidNO->ViewValue = $this->DidNO->CurrentValue;
			$this->DidNO->ViewCustomAttributes = "";

			// ICSiIVFDateTime
			$this->ICSiIVFDateTime->ViewValue = $this->ICSiIVFDateTime->CurrentValue;
			$this->ICSiIVFDateTime->ViewValue = FormatDateTime($this->ICSiIVFDateTime->ViewValue, 0);
			$this->ICSiIVFDateTime->ViewCustomAttributes = "";

			// PrimaryEmbrologist
			$this->PrimaryEmbrologist->ViewValue = $this->PrimaryEmbrologist->CurrentValue;
			$this->PrimaryEmbrologist->ViewCustomAttributes = "";

			// SecondaryEmbrologist
			$this->SecondaryEmbrologist->ViewValue = $this->SecondaryEmbrologist->CurrentValue;
			$this->SecondaryEmbrologist->ViewCustomAttributes = "";

			// Incubator
			$this->Incubator->ViewValue = $this->Incubator->CurrentValue;
			$this->Incubator->ViewCustomAttributes = "";

			// location
			$this->location->ViewValue = $this->location->CurrentValue;
			$this->location->ViewCustomAttributes = "";

			// OocyteNo
			$this->OocyteNo->ViewValue = $this->OocyteNo->CurrentValue;
			$this->OocyteNo->ViewCustomAttributes = "";

			// Stage
			if (strval($this->Stage->CurrentValue) <> "") {
				$this->Stage->ViewValue = $this->Stage->optionCaption($this->Stage->CurrentValue);
			} else {
				$this->Stage->ViewValue = NULL;
			}
			$this->Stage->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// vitrificationDate
			$this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
			$this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
			$this->vitrificationDate->ViewCustomAttributes = "";

			// vitriPrimaryEmbryologist
			$this->vitriPrimaryEmbryologist->ViewValue = $this->vitriPrimaryEmbryologist->CurrentValue;
			$this->vitriPrimaryEmbryologist->ViewCustomAttributes = "";

			// vitriSecondaryEmbryologist
			$this->vitriSecondaryEmbryologist->ViewValue = $this->vitriSecondaryEmbryologist->CurrentValue;
			$this->vitriSecondaryEmbryologist->ViewCustomAttributes = "";

			// vitriEmbryoNo
			$this->vitriEmbryoNo->ViewValue = $this->vitriEmbryoNo->CurrentValue;
			$this->vitriEmbryoNo->ViewCustomAttributes = "";

			// thawReFrozen
			if (strval($this->thawReFrozen->CurrentValue) <> "") {
				$this->thawReFrozen->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->thawReFrozen->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->thawReFrozen->ViewValue->add($this->thawReFrozen->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->thawReFrozen->ViewValue = NULL;
			}
			$this->thawReFrozen->ViewCustomAttributes = "";

			// vitriFertilisationDate
			$this->vitriFertilisationDate->ViewValue = $this->vitriFertilisationDate->CurrentValue;
			$this->vitriFertilisationDate->ViewValue = FormatDateTime($this->vitriFertilisationDate->ViewValue, 0);
			$this->vitriFertilisationDate->ViewCustomAttributes = "";

			// vitriDay
			if (strval($this->vitriDay->CurrentValue) <> "") {
				$this->vitriDay->ViewValue = $this->vitriDay->optionCaption($this->vitriDay->CurrentValue);
			} else {
				$this->vitriDay->ViewValue = NULL;
			}
			$this->vitriDay->ViewCustomAttributes = "";

			// vitriStage
			$this->vitriStage->ViewValue = $this->vitriStage->CurrentValue;
			$this->vitriStage->ViewCustomAttributes = "";

			// vitriGrade
			if (strval($this->vitriGrade->CurrentValue) <> "") {
				$this->vitriGrade->ViewValue = $this->vitriGrade->optionCaption($this->vitriGrade->CurrentValue);
			} else {
				$this->vitriGrade->ViewValue = NULL;
			}
			$this->vitriGrade->ViewCustomAttributes = "";

			// vitriIncubator
			$this->vitriIncubator->ViewValue = $this->vitriIncubator->CurrentValue;
			$this->vitriIncubator->ViewCustomAttributes = "";

			// vitriTank
			$this->vitriTank->ViewValue = $this->vitriTank->CurrentValue;
			$this->vitriTank->ViewCustomAttributes = "";

			// vitriCanister
			$this->vitriCanister->ViewValue = $this->vitriCanister->CurrentValue;
			$this->vitriCanister->ViewCustomAttributes = "";

			// vitriGobiet
			$this->vitriGobiet->ViewValue = $this->vitriGobiet->CurrentValue;
			$this->vitriGobiet->ViewCustomAttributes = "";

			// vitriViscotube
			$this->vitriViscotube->ViewValue = $this->vitriViscotube->CurrentValue;
			$this->vitriViscotube->ViewCustomAttributes = "";

			// vitriCryolockNo
			$this->vitriCryolockNo->ViewValue = $this->vitriCryolockNo->CurrentValue;
			$this->vitriCryolockNo->ViewCustomAttributes = "";

			// vitriCryolockColour
			$this->vitriCryolockColour->ViewValue = $this->vitriCryolockColour->CurrentValue;
			$this->vitriCryolockColour->ViewCustomAttributes = "";

			// thawDate
			$this->thawDate->ViewValue = $this->thawDate->CurrentValue;
			$this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
			$this->thawDate->ViewCustomAttributes = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
			$this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
			$this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

			// thawET
			if (strval($this->thawET->CurrentValue) <> "") {
				$this->thawET->ViewValue = $this->thawET->optionCaption($this->thawET->CurrentValue);
			} else {
				$this->thawET->ViewValue = NULL;
			}
			$this->thawET->ViewCustomAttributes = "";

			// thawAbserve
			$this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
			$this->thawAbserve->ViewCustomAttributes = "";

			// thawDiscard
			$this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
			$this->thawDiscard->ViewCustomAttributes = "";

			// ETCatheter
			$this->ETCatheter->ViewValue = $this->ETCatheter->CurrentValue;
			$this->ETCatheter->ViewCustomAttributes = "";

			// ETDifficulty
			if (strval($this->ETDifficulty->CurrentValue) <> "") {
				$this->ETDifficulty->ViewValue = $this->ETDifficulty->optionCaption($this->ETDifficulty->CurrentValue);
			} else {
				$this->ETDifficulty->ViewValue = NULL;
			}
			$this->ETDifficulty->ViewCustomAttributes = "";

			// ETEasy
			if (strval($this->ETEasy->CurrentValue) <> "") {
				$this->ETEasy->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ETEasy->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ETEasy->ViewValue->add($this->ETEasy->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ETEasy->ViewValue = NULL;
			}
			$this->ETEasy->ViewCustomAttributes = "";

			// ETComments
			$this->ETComments->ViewValue = $this->ETComments->CurrentValue;
			$this->ETComments->ViewCustomAttributes = "";

			// ETDoctor
			$this->ETDoctor->ViewValue = $this->ETDoctor->CurrentValue;
			$this->ETDoctor->ViewCustomAttributes = "";

			// ETEmbryologist
			$this->ETEmbryologist->ViewValue = $this->ETEmbryologist->CurrentValue;
			$this->ETEmbryologist->ViewCustomAttributes = "";

			// ETDate
			$this->ETDate->ViewValue = $this->ETDate->CurrentValue;
			$this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
			$this->ETDate->ViewCustomAttributes = "";

			// Day1End
			if (strval($this->Day1End->CurrentValue) <> "") {
				$this->Day1End->ViewValue = $this->Day1End->optionCaption($this->Day1End->CurrentValue);
			} else {
				$this->Day1End->ViewValue = NULL;
			}
			$this->Day1End->ViewCustomAttributes = "";

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

			// SpermOrigin
			$this->SpermOrigin->LinkCustomAttributes = "";
			$this->SpermOrigin->HrefValue = "";
			$this->SpermOrigin->TooltipValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";
			$this->InseminatinTechnique->TooltipValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";
			$this->IndicationForART->TooltipValue = "";

			// Day0sino
			$this->Day0sino->LinkCustomAttributes = "";
			$this->Day0sino->HrefValue = "";
			$this->Day0sino->TooltipValue = "";

			// Day0OocyteStage
			$this->Day0OocyteStage->LinkCustomAttributes = "";
			$this->Day0OocyteStage->HrefValue = "";
			$this->Day0OocyteStage->TooltipValue = "";

			// Day0PolarBodyPosition
			$this->Day0PolarBodyPosition->LinkCustomAttributes = "";
			$this->Day0PolarBodyPosition->HrefValue = "";
			$this->Day0PolarBodyPosition->TooltipValue = "";

			// Day0Breakage
			$this->Day0Breakage->LinkCustomAttributes = "";
			$this->Day0Breakage->HrefValue = "";
			$this->Day0Breakage->TooltipValue = "";

			// Day0Attempts
			$this->Day0Attempts->LinkCustomAttributes = "";
			$this->Day0Attempts->HrefValue = "";
			$this->Day0Attempts->TooltipValue = "";

			// Day0SPZMorpho
			$this->Day0SPZMorpho->LinkCustomAttributes = "";
			$this->Day0SPZMorpho->HrefValue = "";
			$this->Day0SPZMorpho->TooltipValue = "";

			// Day0SPZLocation
			$this->Day0SPZLocation->LinkCustomAttributes = "";
			$this->Day0SPZLocation->HrefValue = "";
			$this->Day0SPZLocation->TooltipValue = "";

			// Day0SpOrgin
			$this->Day0SpOrgin->LinkCustomAttributes = "";
			$this->Day0SpOrgin->HrefValue = "";
			$this->Day0SpOrgin->TooltipValue = "";

			// Day5Cryoptop
			$this->Day5Cryoptop->LinkCustomAttributes = "";
			$this->Day5Cryoptop->HrefValue = "";
			$this->Day5Cryoptop->TooltipValue = "";

			// Day1Sperm
			$this->Day1Sperm->LinkCustomAttributes = "";
			$this->Day1Sperm->HrefValue = "";
			$this->Day1Sperm->TooltipValue = "";

			// Day1PN
			$this->Day1PN->LinkCustomAttributes = "";
			$this->Day1PN->HrefValue = "";
			$this->Day1PN->TooltipValue = "";

			// Day1PB
			$this->Day1PB->LinkCustomAttributes = "";
			$this->Day1PB->HrefValue = "";
			$this->Day1PB->TooltipValue = "";

			// Day1Pronucleus
			$this->Day1Pronucleus->LinkCustomAttributes = "";
			$this->Day1Pronucleus->HrefValue = "";
			$this->Day1Pronucleus->TooltipValue = "";

			// Day1Nucleolus
			$this->Day1Nucleolus->LinkCustomAttributes = "";
			$this->Day1Nucleolus->HrefValue = "";
			$this->Day1Nucleolus->TooltipValue = "";

			// Day1Halo
			$this->Day1Halo->LinkCustomAttributes = "";
			$this->Day1Halo->HrefValue = "";
			$this->Day1Halo->TooltipValue = "";

			// Day2SiNo
			$this->Day2SiNo->LinkCustomAttributes = "";
			$this->Day2SiNo->HrefValue = "";
			$this->Day2SiNo->TooltipValue = "";

			// Day2CellNo
			$this->Day2CellNo->LinkCustomAttributes = "";
			$this->Day2CellNo->HrefValue = "";
			$this->Day2CellNo->TooltipValue = "";

			// Day2Frag
			$this->Day2Frag->LinkCustomAttributes = "";
			$this->Day2Frag->HrefValue = "";
			$this->Day2Frag->TooltipValue = "";

			// Day2Symmetry
			$this->Day2Symmetry->LinkCustomAttributes = "";
			$this->Day2Symmetry->HrefValue = "";
			$this->Day2Symmetry->TooltipValue = "";

			// Day2Cryoptop
			$this->Day2Cryoptop->LinkCustomAttributes = "";
			$this->Day2Cryoptop->HrefValue = "";
			$this->Day2Cryoptop->TooltipValue = "";

			// Day2Grade
			$this->Day2Grade->LinkCustomAttributes = "";
			$this->Day2Grade->HrefValue = "";
			$this->Day2Grade->TooltipValue = "";

			// Day2End
			$this->Day2End->LinkCustomAttributes = "";
			$this->Day2End->HrefValue = "";
			$this->Day2End->TooltipValue = "";

			// Day3Sino
			$this->Day3Sino->LinkCustomAttributes = "";
			$this->Day3Sino->HrefValue = "";
			$this->Day3Sino->TooltipValue = "";

			// Day3CellNo
			$this->Day3CellNo->LinkCustomAttributes = "";
			$this->Day3CellNo->HrefValue = "";
			$this->Day3CellNo->TooltipValue = "";

			// Day3Frag
			$this->Day3Frag->LinkCustomAttributes = "";
			$this->Day3Frag->HrefValue = "";
			$this->Day3Frag->TooltipValue = "";

			// Day3Symmetry
			$this->Day3Symmetry->LinkCustomAttributes = "";
			$this->Day3Symmetry->HrefValue = "";
			$this->Day3Symmetry->TooltipValue = "";

			// Day3ZP
			$this->Day3ZP->LinkCustomAttributes = "";
			$this->Day3ZP->HrefValue = "";
			$this->Day3ZP->TooltipValue = "";

			// Day3Vacoules
			$this->Day3Vacoules->LinkCustomAttributes = "";
			$this->Day3Vacoules->HrefValue = "";
			$this->Day3Vacoules->TooltipValue = "";

			// Day3Grade
			$this->Day3Grade->LinkCustomAttributes = "";
			$this->Day3Grade->HrefValue = "";
			$this->Day3Grade->TooltipValue = "";

			// Day3Cryoptop
			$this->Day3Cryoptop->LinkCustomAttributes = "";
			$this->Day3Cryoptop->HrefValue = "";
			$this->Day3Cryoptop->TooltipValue = "";

			// Day3End
			$this->Day3End->LinkCustomAttributes = "";
			$this->Day3End->HrefValue = "";
			$this->Day3End->TooltipValue = "";

			// Day4SiNo
			$this->Day4SiNo->LinkCustomAttributes = "";
			$this->Day4SiNo->HrefValue = "";
			$this->Day4SiNo->TooltipValue = "";

			// Day4CellNo
			$this->Day4CellNo->LinkCustomAttributes = "";
			$this->Day4CellNo->HrefValue = "";
			$this->Day4CellNo->TooltipValue = "";

			// Day4Frag
			$this->Day4Frag->LinkCustomAttributes = "";
			$this->Day4Frag->HrefValue = "";
			$this->Day4Frag->TooltipValue = "";

			// Day4Symmetry
			$this->Day4Symmetry->LinkCustomAttributes = "";
			$this->Day4Symmetry->HrefValue = "";
			$this->Day4Symmetry->TooltipValue = "";

			// Day4Grade
			$this->Day4Grade->LinkCustomAttributes = "";
			$this->Day4Grade->HrefValue = "";
			$this->Day4Grade->TooltipValue = "";

			// Day4Cryoptop
			$this->Day4Cryoptop->LinkCustomAttributes = "";
			$this->Day4Cryoptop->HrefValue = "";
			$this->Day4Cryoptop->TooltipValue = "";

			// Day4End
			$this->Day4End->LinkCustomAttributes = "";
			$this->Day4End->HrefValue = "";
			$this->Day4End->TooltipValue = "";

			// Day5CellNo
			$this->Day5CellNo->LinkCustomAttributes = "";
			$this->Day5CellNo->HrefValue = "";
			$this->Day5CellNo->TooltipValue = "";

			// Day5ICM
			$this->Day5ICM->LinkCustomAttributes = "";
			$this->Day5ICM->HrefValue = "";
			$this->Day5ICM->TooltipValue = "";

			// Day5TE
			$this->Day5TE->LinkCustomAttributes = "";
			$this->Day5TE->HrefValue = "";
			$this->Day5TE->TooltipValue = "";

			// Day5Observation
			$this->Day5Observation->LinkCustomAttributes = "";
			$this->Day5Observation->HrefValue = "";
			$this->Day5Observation->TooltipValue = "";

			// Day5Collapsed
			$this->Day5Collapsed->LinkCustomAttributes = "";
			$this->Day5Collapsed->HrefValue = "";
			$this->Day5Collapsed->TooltipValue = "";

			// Day5Vacoulles
			$this->Day5Vacoulles->LinkCustomAttributes = "";
			$this->Day5Vacoulles->HrefValue = "";
			$this->Day5Vacoulles->TooltipValue = "";

			// Day5Grade
			$this->Day5Grade->LinkCustomAttributes = "";
			$this->Day5Grade->HrefValue = "";
			$this->Day5Grade->TooltipValue = "";

			// Day6CellNo
			$this->Day6CellNo->LinkCustomAttributes = "";
			$this->Day6CellNo->HrefValue = "";
			$this->Day6CellNo->TooltipValue = "";

			// Day6ICM
			$this->Day6ICM->LinkCustomAttributes = "";
			$this->Day6ICM->HrefValue = "";
			$this->Day6ICM->TooltipValue = "";

			// Day6TE
			$this->Day6TE->LinkCustomAttributes = "";
			$this->Day6TE->HrefValue = "";
			$this->Day6TE->TooltipValue = "";

			// Day6Observation
			$this->Day6Observation->LinkCustomAttributes = "";
			$this->Day6Observation->HrefValue = "";
			$this->Day6Observation->TooltipValue = "";

			// Day6Collapsed
			$this->Day6Collapsed->LinkCustomAttributes = "";
			$this->Day6Collapsed->HrefValue = "";
			$this->Day6Collapsed->TooltipValue = "";

			// Day6Vacoulles
			$this->Day6Vacoulles->LinkCustomAttributes = "";
			$this->Day6Vacoulles->HrefValue = "";
			$this->Day6Vacoulles->TooltipValue = "";

			// Day6Grade
			$this->Day6Grade->LinkCustomAttributes = "";
			$this->Day6Grade->HrefValue = "";
			$this->Day6Grade->TooltipValue = "";

			// Day6Cryoptop
			$this->Day6Cryoptop->LinkCustomAttributes = "";
			$this->Day6Cryoptop->HrefValue = "";
			$this->Day6Cryoptop->TooltipValue = "";

			// EndSiNo
			$this->EndSiNo->LinkCustomAttributes = "";
			$this->EndSiNo->HrefValue = "";
			$this->EndSiNo->TooltipValue = "";

			// EndingDay
			$this->EndingDay->LinkCustomAttributes = "";
			$this->EndingDay->HrefValue = "";
			$this->EndingDay->TooltipValue = "";

			// EndingCellStage
			$this->EndingCellStage->LinkCustomAttributes = "";
			$this->EndingCellStage->HrefValue = "";
			$this->EndingCellStage->TooltipValue = "";

			// EndingGrade
			$this->EndingGrade->LinkCustomAttributes = "";
			$this->EndingGrade->HrefValue = "";
			$this->EndingGrade->TooltipValue = "";

			// EndingState
			$this->EndingState->LinkCustomAttributes = "";
			$this->EndingState->HrefValue = "";
			$this->EndingState->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// DidNO
			$this->DidNO->LinkCustomAttributes = "";
			$this->DidNO->HrefValue = "";
			$this->DidNO->TooltipValue = "";

			// ICSiIVFDateTime
			$this->ICSiIVFDateTime->LinkCustomAttributes = "";
			$this->ICSiIVFDateTime->HrefValue = "";
			$this->ICSiIVFDateTime->TooltipValue = "";

			// PrimaryEmbrologist
			$this->PrimaryEmbrologist->LinkCustomAttributes = "";
			$this->PrimaryEmbrologist->HrefValue = "";
			$this->PrimaryEmbrologist->TooltipValue = "";

			// SecondaryEmbrologist
			$this->SecondaryEmbrologist->LinkCustomAttributes = "";
			$this->SecondaryEmbrologist->HrefValue = "";
			$this->SecondaryEmbrologist->TooltipValue = "";

			// Incubator
			$this->Incubator->LinkCustomAttributes = "";
			$this->Incubator->HrefValue = "";
			$this->Incubator->TooltipValue = "";

			// location
			$this->location->LinkCustomAttributes = "";
			$this->location->HrefValue = "";
			$this->location->TooltipValue = "";

			// OocyteNo
			$this->OocyteNo->LinkCustomAttributes = "";
			$this->OocyteNo->HrefValue = "";
			$this->OocyteNo->TooltipValue = "";

			// Stage
			$this->Stage->LinkCustomAttributes = "";
			$this->Stage->HrefValue = "";
			$this->Stage->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";
			$this->vitrificationDate->TooltipValue = "";

			// vitriPrimaryEmbryologist
			$this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->vitriPrimaryEmbryologist->HrefValue = "";
			$this->vitriPrimaryEmbryologist->TooltipValue = "";

			// vitriSecondaryEmbryologist
			$this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->vitriSecondaryEmbryologist->HrefValue = "";
			$this->vitriSecondaryEmbryologist->TooltipValue = "";

			// vitriEmbryoNo
			$this->vitriEmbryoNo->LinkCustomAttributes = "";
			$this->vitriEmbryoNo->HrefValue = "";
			$this->vitriEmbryoNo->TooltipValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";
			$this->thawReFrozen->TooltipValue = "";

			// vitriFertilisationDate
			$this->vitriFertilisationDate->LinkCustomAttributes = "";
			$this->vitriFertilisationDate->HrefValue = "";
			$this->vitriFertilisationDate->TooltipValue = "";

			// vitriDay
			$this->vitriDay->LinkCustomAttributes = "";
			$this->vitriDay->HrefValue = "";
			$this->vitriDay->TooltipValue = "";

			// vitriStage
			$this->vitriStage->LinkCustomAttributes = "";
			$this->vitriStage->HrefValue = "";
			$this->vitriStage->TooltipValue = "";

			// vitriGrade
			$this->vitriGrade->LinkCustomAttributes = "";
			$this->vitriGrade->HrefValue = "";
			$this->vitriGrade->TooltipValue = "";

			// vitriIncubator
			$this->vitriIncubator->LinkCustomAttributes = "";
			$this->vitriIncubator->HrefValue = "";
			$this->vitriIncubator->TooltipValue = "";

			// vitriTank
			$this->vitriTank->LinkCustomAttributes = "";
			$this->vitriTank->HrefValue = "";
			$this->vitriTank->TooltipValue = "";

			// vitriCanister
			$this->vitriCanister->LinkCustomAttributes = "";
			$this->vitriCanister->HrefValue = "";
			$this->vitriCanister->TooltipValue = "";

			// vitriGobiet
			$this->vitriGobiet->LinkCustomAttributes = "";
			$this->vitriGobiet->HrefValue = "";
			$this->vitriGobiet->TooltipValue = "";

			// vitriViscotube
			$this->vitriViscotube->LinkCustomAttributes = "";
			$this->vitriViscotube->HrefValue = "";
			$this->vitriViscotube->TooltipValue = "";

			// vitriCryolockNo
			$this->vitriCryolockNo->LinkCustomAttributes = "";
			$this->vitriCryolockNo->HrefValue = "";
			$this->vitriCryolockNo->TooltipValue = "";

			// vitriCryolockColour
			$this->vitriCryolockColour->LinkCustomAttributes = "";
			$this->vitriCryolockColour->HrefValue = "";
			$this->vitriCryolockColour->TooltipValue = "";

			// thawDate
			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";
			$this->thawDate->TooltipValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";
			$this->thawPrimaryEmbryologist->TooltipValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";
			$this->thawSecondaryEmbryologist->TooltipValue = "";

			// thawET
			$this->thawET->LinkCustomAttributes = "";
			$this->thawET->HrefValue = "";
			$this->thawET->TooltipValue = "";

			// thawAbserve
			$this->thawAbserve->LinkCustomAttributes = "";
			$this->thawAbserve->HrefValue = "";
			$this->thawAbserve->TooltipValue = "";

			// thawDiscard
			$this->thawDiscard->LinkCustomAttributes = "";
			$this->thawDiscard->HrefValue = "";
			$this->thawDiscard->TooltipValue = "";

			// ETCatheter
			$this->ETCatheter->LinkCustomAttributes = "";
			$this->ETCatheter->HrefValue = "";
			$this->ETCatheter->TooltipValue = "";

			// ETDifficulty
			$this->ETDifficulty->LinkCustomAttributes = "";
			$this->ETDifficulty->HrefValue = "";
			$this->ETDifficulty->TooltipValue = "";

			// ETEasy
			$this->ETEasy->LinkCustomAttributes = "";
			$this->ETEasy->HrefValue = "";
			$this->ETEasy->TooltipValue = "";

			// ETComments
			$this->ETComments->LinkCustomAttributes = "";
			$this->ETComments->HrefValue = "";
			$this->ETComments->TooltipValue = "";

			// ETDoctor
			$this->ETDoctor->LinkCustomAttributes = "";
			$this->ETDoctor->HrefValue = "";
			$this->ETDoctor->TooltipValue = "";

			// ETEmbryologist
			$this->ETEmbryologist->LinkCustomAttributes = "";
			$this->ETEmbryologist->HrefValue = "";
			$this->ETEmbryologist->TooltipValue = "";

			// ETDate
			$this->ETDate->LinkCustomAttributes = "";
			$this->ETDate->HrefValue = "";
			$this->ETDate->TooltipValue = "";

			// Day1End
			$this->Day1End->LinkCustomAttributes = "";
			$this->Day1End->HrefValue = "";
			$this->Day1End->TooltipValue = "";
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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (Get("fk_RIDNO") !== NULL) {
					$this->RIDNo->setQueryStringValue(Get("fk_RIDNO"));
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($this->RIDNo->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Name") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Name"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_id") !== NULL) {
					$this->TidNo->setQueryStringValue(Get("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($this->TidNo->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ivf_oocytedenudation") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->DidNO->setQueryStringValue(Get("fk_id"));
					$this->DidNO->setSessionValue($this->DidNO->QueryStringValue);
					if (!is_numeric($this->DidNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (Post("fk_RIDNO") !== NULL) {
					$this->RIDNo->setFormValue(Post("fk_RIDNO"));
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($this->RIDNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Name") !== NULL) {
					$this->Name->setFormValue(Post("fk_Name"));
					$this->Name->setSessionValue($this->Name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_id") !== NULL) {
					$this->TidNo->setFormValue(Post("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($this->TidNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ivf_oocytedenudation") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->DidNO->setFormValue(Post("fk_id"));
					$this->DidNO->setSessionValue($this->DidNO->FormValue);
					if (!is_numeric($this->DidNO->FormValue))
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
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "ivf_treatment_plan") {
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
			}
			if ($masterTblVar <> "ivf_oocytedenudation") {
				if ($this->DidNO->CurrentValue == "")
					$this->DidNO->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_embryology_chartlist.php"), "", $this->TableVar, TRUE);
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
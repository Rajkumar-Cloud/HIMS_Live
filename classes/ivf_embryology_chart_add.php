<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_embryology_chart_add extends ivf_embryology_chart
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_embryology_chart';

	// Page object name
	public $PageObjName = "ivf_embryology_chart_add";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "ivf_embryology_chartview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_embryology_chartlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
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
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("ivf_embryology_chartlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "ivf_embryology_chartlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "ivf_embryology_chartview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
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
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->ARTCycle->CurrentValue = NULL;
		$this->ARTCycle->OldValue = $this->ARTCycle->CurrentValue;
		$this->SpermOrigin->CurrentValue = NULL;
		$this->SpermOrigin->OldValue = $this->SpermOrigin->CurrentValue;
		$this->InseminatinTechnique->CurrentValue = NULL;
		$this->InseminatinTechnique->OldValue = $this->InseminatinTechnique->CurrentValue;
		$this->IndicationForART->CurrentValue = NULL;
		$this->IndicationForART->OldValue = $this->IndicationForART->CurrentValue;
		$this->Day0sino->CurrentValue = NULL;
		$this->Day0sino->OldValue = $this->Day0sino->CurrentValue;
		$this->Day0OocyteStage->CurrentValue = NULL;
		$this->Day0OocyteStage->OldValue = $this->Day0OocyteStage->CurrentValue;
		$this->Day0PolarBodyPosition->CurrentValue = NULL;
		$this->Day0PolarBodyPosition->OldValue = $this->Day0PolarBodyPosition->CurrentValue;
		$this->Day0Breakage->CurrentValue = NULL;
		$this->Day0Breakage->OldValue = $this->Day0Breakage->CurrentValue;
		$this->Day0Attempts->CurrentValue = NULL;
		$this->Day0Attempts->OldValue = $this->Day0Attempts->CurrentValue;
		$this->Day0SPZMorpho->CurrentValue = NULL;
		$this->Day0SPZMorpho->OldValue = $this->Day0SPZMorpho->CurrentValue;
		$this->Day0SPZLocation->CurrentValue = NULL;
		$this->Day0SPZLocation->OldValue = $this->Day0SPZLocation->CurrentValue;
		$this->Day0SpOrgin->CurrentValue = NULL;
		$this->Day0SpOrgin->OldValue = $this->Day0SpOrgin->CurrentValue;
		$this->Day5Cryoptop->CurrentValue = NULL;
		$this->Day5Cryoptop->OldValue = $this->Day5Cryoptop->CurrentValue;
		$this->Day1Sperm->CurrentValue = NULL;
		$this->Day1Sperm->OldValue = $this->Day1Sperm->CurrentValue;
		$this->Day1PN->CurrentValue = NULL;
		$this->Day1PN->OldValue = $this->Day1PN->CurrentValue;
		$this->Day1PB->CurrentValue = NULL;
		$this->Day1PB->OldValue = $this->Day1PB->CurrentValue;
		$this->Day1Pronucleus->CurrentValue = NULL;
		$this->Day1Pronucleus->OldValue = $this->Day1Pronucleus->CurrentValue;
		$this->Day1Nucleolus->CurrentValue = NULL;
		$this->Day1Nucleolus->OldValue = $this->Day1Nucleolus->CurrentValue;
		$this->Day1Halo->CurrentValue = NULL;
		$this->Day1Halo->OldValue = $this->Day1Halo->CurrentValue;
		$this->Day2SiNo->CurrentValue = NULL;
		$this->Day2SiNo->OldValue = $this->Day2SiNo->CurrentValue;
		$this->Day2CellNo->CurrentValue = NULL;
		$this->Day2CellNo->OldValue = $this->Day2CellNo->CurrentValue;
		$this->Day2Frag->CurrentValue = NULL;
		$this->Day2Frag->OldValue = $this->Day2Frag->CurrentValue;
		$this->Day2Symmetry->CurrentValue = NULL;
		$this->Day2Symmetry->OldValue = $this->Day2Symmetry->CurrentValue;
		$this->Day2Cryoptop->CurrentValue = NULL;
		$this->Day2Cryoptop->OldValue = $this->Day2Cryoptop->CurrentValue;
		$this->Day2Grade->CurrentValue = NULL;
		$this->Day2Grade->OldValue = $this->Day2Grade->CurrentValue;
		$this->Day2End->CurrentValue = NULL;
		$this->Day2End->OldValue = $this->Day2End->CurrentValue;
		$this->Day3Sino->CurrentValue = NULL;
		$this->Day3Sino->OldValue = $this->Day3Sino->CurrentValue;
		$this->Day3CellNo->CurrentValue = NULL;
		$this->Day3CellNo->OldValue = $this->Day3CellNo->CurrentValue;
		$this->Day3Frag->CurrentValue = NULL;
		$this->Day3Frag->OldValue = $this->Day3Frag->CurrentValue;
		$this->Day3Symmetry->CurrentValue = NULL;
		$this->Day3Symmetry->OldValue = $this->Day3Symmetry->CurrentValue;
		$this->Day3ZP->CurrentValue = NULL;
		$this->Day3ZP->OldValue = $this->Day3ZP->CurrentValue;
		$this->Day3Vacoules->CurrentValue = NULL;
		$this->Day3Vacoules->OldValue = $this->Day3Vacoules->CurrentValue;
		$this->Day3Grade->CurrentValue = NULL;
		$this->Day3Grade->OldValue = $this->Day3Grade->CurrentValue;
		$this->Day3Cryoptop->CurrentValue = NULL;
		$this->Day3Cryoptop->OldValue = $this->Day3Cryoptop->CurrentValue;
		$this->Day3End->CurrentValue = NULL;
		$this->Day3End->OldValue = $this->Day3End->CurrentValue;
		$this->Day4SiNo->CurrentValue = NULL;
		$this->Day4SiNo->OldValue = $this->Day4SiNo->CurrentValue;
		$this->Day4CellNo->CurrentValue = NULL;
		$this->Day4CellNo->OldValue = $this->Day4CellNo->CurrentValue;
		$this->Day4Frag->CurrentValue = NULL;
		$this->Day4Frag->OldValue = $this->Day4Frag->CurrentValue;
		$this->Day4Symmetry->CurrentValue = NULL;
		$this->Day4Symmetry->OldValue = $this->Day4Symmetry->CurrentValue;
		$this->Day4Grade->CurrentValue = NULL;
		$this->Day4Grade->OldValue = $this->Day4Grade->CurrentValue;
		$this->Day4Cryoptop->CurrentValue = NULL;
		$this->Day4Cryoptop->OldValue = $this->Day4Cryoptop->CurrentValue;
		$this->Day4End->CurrentValue = NULL;
		$this->Day4End->OldValue = $this->Day4End->CurrentValue;
		$this->Day5CellNo->CurrentValue = NULL;
		$this->Day5CellNo->OldValue = $this->Day5CellNo->CurrentValue;
		$this->Day5ICM->CurrentValue = NULL;
		$this->Day5ICM->OldValue = $this->Day5ICM->CurrentValue;
		$this->Day5TE->CurrentValue = NULL;
		$this->Day5TE->OldValue = $this->Day5TE->CurrentValue;
		$this->Day5Observation->CurrentValue = NULL;
		$this->Day5Observation->OldValue = $this->Day5Observation->CurrentValue;
		$this->Day5Collapsed->CurrentValue = NULL;
		$this->Day5Collapsed->OldValue = $this->Day5Collapsed->CurrentValue;
		$this->Day5Vacoulles->CurrentValue = NULL;
		$this->Day5Vacoulles->OldValue = $this->Day5Vacoulles->CurrentValue;
		$this->Day5Grade->CurrentValue = NULL;
		$this->Day5Grade->OldValue = $this->Day5Grade->CurrentValue;
		$this->Day6CellNo->CurrentValue = NULL;
		$this->Day6CellNo->OldValue = $this->Day6CellNo->CurrentValue;
		$this->Day6ICM->CurrentValue = NULL;
		$this->Day6ICM->OldValue = $this->Day6ICM->CurrentValue;
		$this->Day6TE->CurrentValue = NULL;
		$this->Day6TE->OldValue = $this->Day6TE->CurrentValue;
		$this->Day6Observation->CurrentValue = NULL;
		$this->Day6Observation->OldValue = $this->Day6Observation->CurrentValue;
		$this->Day6Collapsed->CurrentValue = NULL;
		$this->Day6Collapsed->OldValue = $this->Day6Collapsed->CurrentValue;
		$this->Day6Vacoulles->CurrentValue = NULL;
		$this->Day6Vacoulles->OldValue = $this->Day6Vacoulles->CurrentValue;
		$this->Day6Grade->CurrentValue = NULL;
		$this->Day6Grade->OldValue = $this->Day6Grade->CurrentValue;
		$this->Day6Cryoptop->CurrentValue = NULL;
		$this->Day6Cryoptop->OldValue = $this->Day6Cryoptop->CurrentValue;
		$this->EndSiNo->CurrentValue = NULL;
		$this->EndSiNo->OldValue = $this->EndSiNo->CurrentValue;
		$this->EndingDay->CurrentValue = NULL;
		$this->EndingDay->OldValue = $this->EndingDay->CurrentValue;
		$this->EndingCellStage->CurrentValue = NULL;
		$this->EndingCellStage->OldValue = $this->EndingCellStage->CurrentValue;
		$this->EndingGrade->CurrentValue = NULL;
		$this->EndingGrade->OldValue = $this->EndingGrade->CurrentValue;
		$this->EndingState->CurrentValue = NULL;
		$this->EndingState->OldValue = $this->EndingState->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->DidNO->CurrentValue = NULL;
		$this->DidNO->OldValue = $this->DidNO->CurrentValue;
		$this->ICSiIVFDateTime->CurrentValue = NULL;
		$this->ICSiIVFDateTime->OldValue = $this->ICSiIVFDateTime->CurrentValue;
		$this->PrimaryEmbrologist->CurrentValue = NULL;
		$this->PrimaryEmbrologist->OldValue = $this->PrimaryEmbrologist->CurrentValue;
		$this->SecondaryEmbrologist->CurrentValue = NULL;
		$this->SecondaryEmbrologist->OldValue = $this->SecondaryEmbrologist->CurrentValue;
		$this->Incubator->CurrentValue = NULL;
		$this->Incubator->OldValue = $this->Incubator->CurrentValue;
		$this->location->CurrentValue = NULL;
		$this->location->OldValue = $this->location->CurrentValue;
		$this->OocyteNo->CurrentValue = NULL;
		$this->OocyteNo->OldValue = $this->OocyteNo->CurrentValue;
		$this->Stage->CurrentValue = NULL;
		$this->Stage->OldValue = $this->Stage->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->vitrificationDate->CurrentValue = NULL;
		$this->vitrificationDate->OldValue = $this->vitrificationDate->CurrentValue;
		$this->vitriPrimaryEmbryologist->CurrentValue = NULL;
		$this->vitriPrimaryEmbryologist->OldValue = $this->vitriPrimaryEmbryologist->CurrentValue;
		$this->vitriSecondaryEmbryologist->CurrentValue = NULL;
		$this->vitriSecondaryEmbryologist->OldValue = $this->vitriSecondaryEmbryologist->CurrentValue;
		$this->vitriEmbryoNo->CurrentValue = NULL;
		$this->vitriEmbryoNo->OldValue = $this->vitriEmbryoNo->CurrentValue;
		$this->thawReFrozen->CurrentValue = NULL;
		$this->thawReFrozen->OldValue = $this->thawReFrozen->CurrentValue;
		$this->vitriFertilisationDate->CurrentValue = NULL;
		$this->vitriFertilisationDate->OldValue = $this->vitriFertilisationDate->CurrentValue;
		$this->vitriDay->CurrentValue = NULL;
		$this->vitriDay->OldValue = $this->vitriDay->CurrentValue;
		$this->vitriStage->CurrentValue = NULL;
		$this->vitriStage->OldValue = $this->vitriStage->CurrentValue;
		$this->vitriGrade->CurrentValue = NULL;
		$this->vitriGrade->OldValue = $this->vitriGrade->CurrentValue;
		$this->vitriIncubator->CurrentValue = NULL;
		$this->vitriIncubator->OldValue = $this->vitriIncubator->CurrentValue;
		$this->vitriTank->CurrentValue = NULL;
		$this->vitriTank->OldValue = $this->vitriTank->CurrentValue;
		$this->vitriCanister->CurrentValue = NULL;
		$this->vitriCanister->OldValue = $this->vitriCanister->CurrentValue;
		$this->vitriGobiet->CurrentValue = NULL;
		$this->vitriGobiet->OldValue = $this->vitriGobiet->CurrentValue;
		$this->vitriViscotube->CurrentValue = NULL;
		$this->vitriViscotube->OldValue = $this->vitriViscotube->CurrentValue;
		$this->vitriCryolockNo->CurrentValue = NULL;
		$this->vitriCryolockNo->OldValue = $this->vitriCryolockNo->CurrentValue;
		$this->vitriCryolockColour->CurrentValue = NULL;
		$this->vitriCryolockColour->OldValue = $this->vitriCryolockColour->CurrentValue;
		$this->thawDate->CurrentValue = NULL;
		$this->thawDate->OldValue = $this->thawDate->CurrentValue;
		$this->thawPrimaryEmbryologist->CurrentValue = NULL;
		$this->thawPrimaryEmbryologist->OldValue = $this->thawPrimaryEmbryologist->CurrentValue;
		$this->thawSecondaryEmbryologist->CurrentValue = NULL;
		$this->thawSecondaryEmbryologist->OldValue = $this->thawSecondaryEmbryologist->CurrentValue;
		$this->thawET->CurrentValue = NULL;
		$this->thawET->OldValue = $this->thawET->CurrentValue;
		$this->thawAbserve->CurrentValue = NULL;
		$this->thawAbserve->OldValue = $this->thawAbserve->CurrentValue;
		$this->thawDiscard->CurrentValue = NULL;
		$this->thawDiscard->OldValue = $this->thawDiscard->CurrentValue;
		$this->ETCatheter->CurrentValue = NULL;
		$this->ETCatheter->OldValue = $this->ETCatheter->CurrentValue;
		$this->ETDifficulty->CurrentValue = NULL;
		$this->ETDifficulty->OldValue = $this->ETDifficulty->CurrentValue;
		$this->ETEasy->CurrentValue = NULL;
		$this->ETEasy->OldValue = $this->ETEasy->CurrentValue;
		$this->ETComments->CurrentValue = NULL;
		$this->ETComments->OldValue = $this->ETComments->CurrentValue;
		$this->ETDoctor->CurrentValue = NULL;
		$this->ETDoctor->OldValue = $this->ETDoctor->CurrentValue;
		$this->ETEmbryologist->CurrentValue = NULL;
		$this->ETEmbryologist->OldValue = $this->ETEmbryologist->CurrentValue;
		$this->ETDate->CurrentValue = NULL;
		$this->ETDate->OldValue = $this->ETDate->CurrentValue;
		$this->Day1End->CurrentValue = NULL;
		$this->Day1End->OldValue = $this->Day1End->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'ARTCycle' first before field var 'x_ARTCycle'
		$val = $CurrentForm->hasValue("ARTCycle") ? $CurrentForm->getValue("ARTCycle") : $CurrentForm->getValue("x_ARTCycle");
		if (!$this->ARTCycle->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ARTCycle->Visible = FALSE; // Disable update for API request
			else
				$this->ARTCycle->setFormValue($val);
		}

		// Check field name 'SpermOrigin' first before field var 'x_SpermOrigin'
		$val = $CurrentForm->hasValue("SpermOrigin") ? $CurrentForm->getValue("SpermOrigin") : $CurrentForm->getValue("x_SpermOrigin");
		if (!$this->SpermOrigin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SpermOrigin->Visible = FALSE; // Disable update for API request
			else
				$this->SpermOrigin->setFormValue($val);
		}

		// Check field name 'InseminatinTechnique' first before field var 'x_InseminatinTechnique'
		$val = $CurrentForm->hasValue("InseminatinTechnique") ? $CurrentForm->getValue("InseminatinTechnique") : $CurrentForm->getValue("x_InseminatinTechnique");
		if (!$this->InseminatinTechnique->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->InseminatinTechnique->Visible = FALSE; // Disable update for API request
			else
				$this->InseminatinTechnique->setFormValue($val);
		}

		// Check field name 'IndicationForART' first before field var 'x_IndicationForART'
		$val = $CurrentForm->hasValue("IndicationForART") ? $CurrentForm->getValue("IndicationForART") : $CurrentForm->getValue("x_IndicationForART");
		if (!$this->IndicationForART->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IndicationForART->Visible = FALSE; // Disable update for API request
			else
				$this->IndicationForART->setFormValue($val);
		}

		// Check field name 'Day0sino' first before field var 'x_Day0sino'
		$val = $CurrentForm->hasValue("Day0sino") ? $CurrentForm->getValue("Day0sino") : $CurrentForm->getValue("x_Day0sino");
		if (!$this->Day0sino->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0sino->Visible = FALSE; // Disable update for API request
			else
				$this->Day0sino->setFormValue($val);
		}

		// Check field name 'Day0OocyteStage' first before field var 'x_Day0OocyteStage'
		$val = $CurrentForm->hasValue("Day0OocyteStage") ? $CurrentForm->getValue("Day0OocyteStage") : $CurrentForm->getValue("x_Day0OocyteStage");
		if (!$this->Day0OocyteStage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0OocyteStage->Visible = FALSE; // Disable update for API request
			else
				$this->Day0OocyteStage->setFormValue($val);
		}

		// Check field name 'Day0PolarBodyPosition' first before field var 'x_Day0PolarBodyPosition'
		$val = $CurrentForm->hasValue("Day0PolarBodyPosition") ? $CurrentForm->getValue("Day0PolarBodyPosition") : $CurrentForm->getValue("x_Day0PolarBodyPosition");
		if (!$this->Day0PolarBodyPosition->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0PolarBodyPosition->Visible = FALSE; // Disable update for API request
			else
				$this->Day0PolarBodyPosition->setFormValue($val);
		}

		// Check field name 'Day0Breakage' first before field var 'x_Day0Breakage'
		$val = $CurrentForm->hasValue("Day0Breakage") ? $CurrentForm->getValue("Day0Breakage") : $CurrentForm->getValue("x_Day0Breakage");
		if (!$this->Day0Breakage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0Breakage->Visible = FALSE; // Disable update for API request
			else
				$this->Day0Breakage->setFormValue($val);
		}

		// Check field name 'Day0Attempts' first before field var 'x_Day0Attempts'
		$val = $CurrentForm->hasValue("Day0Attempts") ? $CurrentForm->getValue("Day0Attempts") : $CurrentForm->getValue("x_Day0Attempts");
		if (!$this->Day0Attempts->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0Attempts->Visible = FALSE; // Disable update for API request
			else
				$this->Day0Attempts->setFormValue($val);
		}

		// Check field name 'Day0SPZMorpho' first before field var 'x_Day0SPZMorpho'
		$val = $CurrentForm->hasValue("Day0SPZMorpho") ? $CurrentForm->getValue("Day0SPZMorpho") : $CurrentForm->getValue("x_Day0SPZMorpho");
		if (!$this->Day0SPZMorpho->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0SPZMorpho->Visible = FALSE; // Disable update for API request
			else
				$this->Day0SPZMorpho->setFormValue($val);
		}

		// Check field name 'Day0SPZLocation' first before field var 'x_Day0SPZLocation'
		$val = $CurrentForm->hasValue("Day0SPZLocation") ? $CurrentForm->getValue("Day0SPZLocation") : $CurrentForm->getValue("x_Day0SPZLocation");
		if (!$this->Day0SPZLocation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0SPZLocation->Visible = FALSE; // Disable update for API request
			else
				$this->Day0SPZLocation->setFormValue($val);
		}

		// Check field name 'Day0SpOrgin' first before field var 'x_Day0SpOrgin'
		$val = $CurrentForm->hasValue("Day0SpOrgin") ? $CurrentForm->getValue("Day0SpOrgin") : $CurrentForm->getValue("x_Day0SpOrgin");
		if (!$this->Day0SpOrgin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day0SpOrgin->Visible = FALSE; // Disable update for API request
			else
				$this->Day0SpOrgin->setFormValue($val);
		}

		// Check field name 'Day5Cryoptop' first before field var 'x_Day5Cryoptop'
		$val = $CurrentForm->hasValue("Day5Cryoptop") ? $CurrentForm->getValue("Day5Cryoptop") : $CurrentForm->getValue("x_Day5Cryoptop");
		if (!$this->Day5Cryoptop->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5Cryoptop->Visible = FALSE; // Disable update for API request
			else
				$this->Day5Cryoptop->setFormValue($val);
		}

		// Check field name 'Day1Sperm' first before field var 'x_Day1Sperm'
		$val = $CurrentForm->hasValue("Day1Sperm") ? $CurrentForm->getValue("Day1Sperm") : $CurrentForm->getValue("x_Day1Sperm");
		if (!$this->Day1Sperm->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1Sperm->Visible = FALSE; // Disable update for API request
			else
				$this->Day1Sperm->setFormValue($val);
		}

		// Check field name 'Day1PN' first before field var 'x_Day1PN'
		$val = $CurrentForm->hasValue("Day1PN") ? $CurrentForm->getValue("Day1PN") : $CurrentForm->getValue("x_Day1PN");
		if (!$this->Day1PN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1PN->Visible = FALSE; // Disable update for API request
			else
				$this->Day1PN->setFormValue($val);
		}

		// Check field name 'Day1PB' first before field var 'x_Day1PB'
		$val = $CurrentForm->hasValue("Day1PB") ? $CurrentForm->getValue("Day1PB") : $CurrentForm->getValue("x_Day1PB");
		if (!$this->Day1PB->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1PB->Visible = FALSE; // Disable update for API request
			else
				$this->Day1PB->setFormValue($val);
		}

		// Check field name 'Day1Pronucleus' first before field var 'x_Day1Pronucleus'
		$val = $CurrentForm->hasValue("Day1Pronucleus") ? $CurrentForm->getValue("Day1Pronucleus") : $CurrentForm->getValue("x_Day1Pronucleus");
		if (!$this->Day1Pronucleus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1Pronucleus->Visible = FALSE; // Disable update for API request
			else
				$this->Day1Pronucleus->setFormValue($val);
		}

		// Check field name 'Day1Nucleolus' first before field var 'x_Day1Nucleolus'
		$val = $CurrentForm->hasValue("Day1Nucleolus") ? $CurrentForm->getValue("Day1Nucleolus") : $CurrentForm->getValue("x_Day1Nucleolus");
		if (!$this->Day1Nucleolus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1Nucleolus->Visible = FALSE; // Disable update for API request
			else
				$this->Day1Nucleolus->setFormValue($val);
		}

		// Check field name 'Day1Halo' first before field var 'x_Day1Halo'
		$val = $CurrentForm->hasValue("Day1Halo") ? $CurrentForm->getValue("Day1Halo") : $CurrentForm->getValue("x_Day1Halo");
		if (!$this->Day1Halo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1Halo->Visible = FALSE; // Disable update for API request
			else
				$this->Day1Halo->setFormValue($val);
		}

		// Check field name 'Day2SiNo' first before field var 'x_Day2SiNo'
		$val = $CurrentForm->hasValue("Day2SiNo") ? $CurrentForm->getValue("Day2SiNo") : $CurrentForm->getValue("x_Day2SiNo");
		if (!$this->Day2SiNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2SiNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day2SiNo->setFormValue($val);
		}

		// Check field name 'Day2CellNo' first before field var 'x_Day2CellNo'
		$val = $CurrentForm->hasValue("Day2CellNo") ? $CurrentForm->getValue("Day2CellNo") : $CurrentForm->getValue("x_Day2CellNo");
		if (!$this->Day2CellNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2CellNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day2CellNo->setFormValue($val);
		}

		// Check field name 'Day2Frag' first before field var 'x_Day2Frag'
		$val = $CurrentForm->hasValue("Day2Frag") ? $CurrentForm->getValue("Day2Frag") : $CurrentForm->getValue("x_Day2Frag");
		if (!$this->Day2Frag->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2Frag->Visible = FALSE; // Disable update for API request
			else
				$this->Day2Frag->setFormValue($val);
		}

		// Check field name 'Day2Symmetry' first before field var 'x_Day2Symmetry'
		$val = $CurrentForm->hasValue("Day2Symmetry") ? $CurrentForm->getValue("Day2Symmetry") : $CurrentForm->getValue("x_Day2Symmetry");
		if (!$this->Day2Symmetry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2Symmetry->Visible = FALSE; // Disable update for API request
			else
				$this->Day2Symmetry->setFormValue($val);
		}

		// Check field name 'Day2Cryoptop' first before field var 'x_Day2Cryoptop'
		$val = $CurrentForm->hasValue("Day2Cryoptop") ? $CurrentForm->getValue("Day2Cryoptop") : $CurrentForm->getValue("x_Day2Cryoptop");
		if (!$this->Day2Cryoptop->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2Cryoptop->Visible = FALSE; // Disable update for API request
			else
				$this->Day2Cryoptop->setFormValue($val);
		}

		// Check field name 'Day2Grade' first before field var 'x_Day2Grade'
		$val = $CurrentForm->hasValue("Day2Grade") ? $CurrentForm->getValue("Day2Grade") : $CurrentForm->getValue("x_Day2Grade");
		if (!$this->Day2Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Day2Grade->setFormValue($val);
		}

		// Check field name 'Day2End' first before field var 'x_Day2End'
		$val = $CurrentForm->hasValue("Day2End") ? $CurrentForm->getValue("Day2End") : $CurrentForm->getValue("x_Day2End");
		if (!$this->Day2End->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2End->Visible = FALSE; // Disable update for API request
			else
				$this->Day2End->setFormValue($val);
		}

		// Check field name 'Day3Sino' first before field var 'x_Day3Sino'
		$val = $CurrentForm->hasValue("Day3Sino") ? $CurrentForm->getValue("Day3Sino") : $CurrentForm->getValue("x_Day3Sino");
		if (!$this->Day3Sino->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3Sino->Visible = FALSE; // Disable update for API request
			else
				$this->Day3Sino->setFormValue($val);
		}

		// Check field name 'Day3CellNo' first before field var 'x_Day3CellNo'
		$val = $CurrentForm->hasValue("Day3CellNo") ? $CurrentForm->getValue("Day3CellNo") : $CurrentForm->getValue("x_Day3CellNo");
		if (!$this->Day3CellNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3CellNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day3CellNo->setFormValue($val);
		}

		// Check field name 'Day3Frag' first before field var 'x_Day3Frag'
		$val = $CurrentForm->hasValue("Day3Frag") ? $CurrentForm->getValue("Day3Frag") : $CurrentForm->getValue("x_Day3Frag");
		if (!$this->Day3Frag->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3Frag->Visible = FALSE; // Disable update for API request
			else
				$this->Day3Frag->setFormValue($val);
		}

		// Check field name 'Day3Symmetry' first before field var 'x_Day3Symmetry'
		$val = $CurrentForm->hasValue("Day3Symmetry") ? $CurrentForm->getValue("Day3Symmetry") : $CurrentForm->getValue("x_Day3Symmetry");
		if (!$this->Day3Symmetry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3Symmetry->Visible = FALSE; // Disable update for API request
			else
				$this->Day3Symmetry->setFormValue($val);
		}

		// Check field name 'Day3ZP' first before field var 'x_Day3ZP'
		$val = $CurrentForm->hasValue("Day3ZP") ? $CurrentForm->getValue("Day3ZP") : $CurrentForm->getValue("x_Day3ZP");
		if (!$this->Day3ZP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3ZP->Visible = FALSE; // Disable update for API request
			else
				$this->Day3ZP->setFormValue($val);
		}

		// Check field name 'Day3Vacoules' first before field var 'x_Day3Vacoules'
		$val = $CurrentForm->hasValue("Day3Vacoules") ? $CurrentForm->getValue("Day3Vacoules") : $CurrentForm->getValue("x_Day3Vacoules");
		if (!$this->Day3Vacoules->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3Vacoules->Visible = FALSE; // Disable update for API request
			else
				$this->Day3Vacoules->setFormValue($val);
		}

		// Check field name 'Day3Grade' first before field var 'x_Day3Grade'
		$val = $CurrentForm->hasValue("Day3Grade") ? $CurrentForm->getValue("Day3Grade") : $CurrentForm->getValue("x_Day3Grade");
		if (!$this->Day3Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Day3Grade->setFormValue($val);
		}

		// Check field name 'Day3Cryoptop' first before field var 'x_Day3Cryoptop'
		$val = $CurrentForm->hasValue("Day3Cryoptop") ? $CurrentForm->getValue("Day3Cryoptop") : $CurrentForm->getValue("x_Day3Cryoptop");
		if (!$this->Day3Cryoptop->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3Cryoptop->Visible = FALSE; // Disable update for API request
			else
				$this->Day3Cryoptop->setFormValue($val);
		}

		// Check field name 'Day3End' first before field var 'x_Day3End'
		$val = $CurrentForm->hasValue("Day3End") ? $CurrentForm->getValue("Day3End") : $CurrentForm->getValue("x_Day3End");
		if (!$this->Day3End->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3End->Visible = FALSE; // Disable update for API request
			else
				$this->Day3End->setFormValue($val);
		}

		// Check field name 'Day4SiNo' first before field var 'x_Day4SiNo'
		$val = $CurrentForm->hasValue("Day4SiNo") ? $CurrentForm->getValue("Day4SiNo") : $CurrentForm->getValue("x_Day4SiNo");
		if (!$this->Day4SiNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4SiNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day4SiNo->setFormValue($val);
		}

		// Check field name 'Day4CellNo' first before field var 'x_Day4CellNo'
		$val = $CurrentForm->hasValue("Day4CellNo") ? $CurrentForm->getValue("Day4CellNo") : $CurrentForm->getValue("x_Day4CellNo");
		if (!$this->Day4CellNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4CellNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day4CellNo->setFormValue($val);
		}

		// Check field name 'Day4Frag' first before field var 'x_Day4Frag'
		$val = $CurrentForm->hasValue("Day4Frag") ? $CurrentForm->getValue("Day4Frag") : $CurrentForm->getValue("x_Day4Frag");
		if (!$this->Day4Frag->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4Frag->Visible = FALSE; // Disable update for API request
			else
				$this->Day4Frag->setFormValue($val);
		}

		// Check field name 'Day4Symmetry' first before field var 'x_Day4Symmetry'
		$val = $CurrentForm->hasValue("Day4Symmetry") ? $CurrentForm->getValue("Day4Symmetry") : $CurrentForm->getValue("x_Day4Symmetry");
		if (!$this->Day4Symmetry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4Symmetry->Visible = FALSE; // Disable update for API request
			else
				$this->Day4Symmetry->setFormValue($val);
		}

		// Check field name 'Day4Grade' first before field var 'x_Day4Grade'
		$val = $CurrentForm->hasValue("Day4Grade") ? $CurrentForm->getValue("Day4Grade") : $CurrentForm->getValue("x_Day4Grade");
		if (!$this->Day4Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Day4Grade->setFormValue($val);
		}

		// Check field name 'Day4Cryoptop' first before field var 'x_Day4Cryoptop'
		$val = $CurrentForm->hasValue("Day4Cryoptop") ? $CurrentForm->getValue("Day4Cryoptop") : $CurrentForm->getValue("x_Day4Cryoptop");
		if (!$this->Day4Cryoptop->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4Cryoptop->Visible = FALSE; // Disable update for API request
			else
				$this->Day4Cryoptop->setFormValue($val);
		}

		// Check field name 'Day4End' first before field var 'x_Day4End'
		$val = $CurrentForm->hasValue("Day4End") ? $CurrentForm->getValue("Day4End") : $CurrentForm->getValue("x_Day4End");
		if (!$this->Day4End->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4End->Visible = FALSE; // Disable update for API request
			else
				$this->Day4End->setFormValue($val);
		}

		// Check field name 'Day5CellNo' first before field var 'x_Day5CellNo'
		$val = $CurrentForm->hasValue("Day5CellNo") ? $CurrentForm->getValue("Day5CellNo") : $CurrentForm->getValue("x_Day5CellNo");
		if (!$this->Day5CellNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5CellNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day5CellNo->setFormValue($val);
		}

		// Check field name 'Day5ICM' first before field var 'x_Day5ICM'
		$val = $CurrentForm->hasValue("Day5ICM") ? $CurrentForm->getValue("Day5ICM") : $CurrentForm->getValue("x_Day5ICM");
		if (!$this->Day5ICM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5ICM->Visible = FALSE; // Disable update for API request
			else
				$this->Day5ICM->setFormValue($val);
		}

		// Check field name 'Day5TE' first before field var 'x_Day5TE'
		$val = $CurrentForm->hasValue("Day5TE") ? $CurrentForm->getValue("Day5TE") : $CurrentForm->getValue("x_Day5TE");
		if (!$this->Day5TE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5TE->Visible = FALSE; // Disable update for API request
			else
				$this->Day5TE->setFormValue($val);
		}

		// Check field name 'Day5Observation' first before field var 'x_Day5Observation'
		$val = $CurrentForm->hasValue("Day5Observation") ? $CurrentForm->getValue("Day5Observation") : $CurrentForm->getValue("x_Day5Observation");
		if (!$this->Day5Observation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5Observation->Visible = FALSE; // Disable update for API request
			else
				$this->Day5Observation->setFormValue($val);
		}

		// Check field name 'Day5Collapsed' first before field var 'x_Day5Collapsed'
		$val = $CurrentForm->hasValue("Day5Collapsed") ? $CurrentForm->getValue("Day5Collapsed") : $CurrentForm->getValue("x_Day5Collapsed");
		if (!$this->Day5Collapsed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5Collapsed->Visible = FALSE; // Disable update for API request
			else
				$this->Day5Collapsed->setFormValue($val);
		}

		// Check field name 'Day5Vacoulles' first before field var 'x_Day5Vacoulles'
		$val = $CurrentForm->hasValue("Day5Vacoulles") ? $CurrentForm->getValue("Day5Vacoulles") : $CurrentForm->getValue("x_Day5Vacoulles");
		if (!$this->Day5Vacoulles->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5Vacoulles->Visible = FALSE; // Disable update for API request
			else
				$this->Day5Vacoulles->setFormValue($val);
		}

		// Check field name 'Day5Grade' first before field var 'x_Day5Grade'
		$val = $CurrentForm->hasValue("Day5Grade") ? $CurrentForm->getValue("Day5Grade") : $CurrentForm->getValue("x_Day5Grade");
		if (!$this->Day5Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Day5Grade->setFormValue($val);
		}

		// Check field name 'Day6CellNo' first before field var 'x_Day6CellNo'
		$val = $CurrentForm->hasValue("Day6CellNo") ? $CurrentForm->getValue("Day6CellNo") : $CurrentForm->getValue("x_Day6CellNo");
		if (!$this->Day6CellNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6CellNo->Visible = FALSE; // Disable update for API request
			else
				$this->Day6CellNo->setFormValue($val);
		}

		// Check field name 'Day6ICM' first before field var 'x_Day6ICM'
		$val = $CurrentForm->hasValue("Day6ICM") ? $CurrentForm->getValue("Day6ICM") : $CurrentForm->getValue("x_Day6ICM");
		if (!$this->Day6ICM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6ICM->Visible = FALSE; // Disable update for API request
			else
				$this->Day6ICM->setFormValue($val);
		}

		// Check field name 'Day6TE' first before field var 'x_Day6TE'
		$val = $CurrentForm->hasValue("Day6TE") ? $CurrentForm->getValue("Day6TE") : $CurrentForm->getValue("x_Day6TE");
		if (!$this->Day6TE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6TE->Visible = FALSE; // Disable update for API request
			else
				$this->Day6TE->setFormValue($val);
		}

		// Check field name 'Day6Observation' first before field var 'x_Day6Observation'
		$val = $CurrentForm->hasValue("Day6Observation") ? $CurrentForm->getValue("Day6Observation") : $CurrentForm->getValue("x_Day6Observation");
		if (!$this->Day6Observation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6Observation->Visible = FALSE; // Disable update for API request
			else
				$this->Day6Observation->setFormValue($val);
		}

		// Check field name 'Day6Collapsed' first before field var 'x_Day6Collapsed'
		$val = $CurrentForm->hasValue("Day6Collapsed") ? $CurrentForm->getValue("Day6Collapsed") : $CurrentForm->getValue("x_Day6Collapsed");
		if (!$this->Day6Collapsed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6Collapsed->Visible = FALSE; // Disable update for API request
			else
				$this->Day6Collapsed->setFormValue($val);
		}

		// Check field name 'Day6Vacoulles' first before field var 'x_Day6Vacoulles'
		$val = $CurrentForm->hasValue("Day6Vacoulles") ? $CurrentForm->getValue("Day6Vacoulles") : $CurrentForm->getValue("x_Day6Vacoulles");
		if (!$this->Day6Vacoulles->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6Vacoulles->Visible = FALSE; // Disable update for API request
			else
				$this->Day6Vacoulles->setFormValue($val);
		}

		// Check field name 'Day6Grade' first before field var 'x_Day6Grade'
		$val = $CurrentForm->hasValue("Day6Grade") ? $CurrentForm->getValue("Day6Grade") : $CurrentForm->getValue("x_Day6Grade");
		if (!$this->Day6Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Day6Grade->setFormValue($val);
		}

		// Check field name 'Day6Cryoptop' first before field var 'x_Day6Cryoptop'
		$val = $CurrentForm->hasValue("Day6Cryoptop") ? $CurrentForm->getValue("Day6Cryoptop") : $CurrentForm->getValue("x_Day6Cryoptop");
		if (!$this->Day6Cryoptop->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day6Cryoptop->Visible = FALSE; // Disable update for API request
			else
				$this->Day6Cryoptop->setFormValue($val);
		}

		// Check field name 'EndSiNo' first before field var 'x_EndSiNo'
		$val = $CurrentForm->hasValue("EndSiNo") ? $CurrentForm->getValue("EndSiNo") : $CurrentForm->getValue("x_EndSiNo");
		if (!$this->EndSiNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EndSiNo->Visible = FALSE; // Disable update for API request
			else
				$this->EndSiNo->setFormValue($val);
		}

		// Check field name 'EndingDay' first before field var 'x_EndingDay'
		$val = $CurrentForm->hasValue("EndingDay") ? $CurrentForm->getValue("EndingDay") : $CurrentForm->getValue("x_EndingDay");
		if (!$this->EndingDay->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EndingDay->Visible = FALSE; // Disable update for API request
			else
				$this->EndingDay->setFormValue($val);
		}

		// Check field name 'EndingCellStage' first before field var 'x_EndingCellStage'
		$val = $CurrentForm->hasValue("EndingCellStage") ? $CurrentForm->getValue("EndingCellStage") : $CurrentForm->getValue("x_EndingCellStage");
		if (!$this->EndingCellStage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EndingCellStage->Visible = FALSE; // Disable update for API request
			else
				$this->EndingCellStage->setFormValue($val);
		}

		// Check field name 'EndingGrade' first before field var 'x_EndingGrade'
		$val = $CurrentForm->hasValue("EndingGrade") ? $CurrentForm->getValue("EndingGrade") : $CurrentForm->getValue("x_EndingGrade");
		if (!$this->EndingGrade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EndingGrade->Visible = FALSE; // Disable update for API request
			else
				$this->EndingGrade->setFormValue($val);
		}

		// Check field name 'EndingState' first before field var 'x_EndingState'
		$val = $CurrentForm->hasValue("EndingState") ? $CurrentForm->getValue("EndingState") : $CurrentForm->getValue("x_EndingState");
		if (!$this->EndingState->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EndingState->Visible = FALSE; // Disable update for API request
			else
				$this->EndingState->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'DidNO' first before field var 'x_DidNO'
		$val = $CurrentForm->hasValue("DidNO") ? $CurrentForm->getValue("DidNO") : $CurrentForm->getValue("x_DidNO");
		if (!$this->DidNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DidNO->Visible = FALSE; // Disable update for API request
			else
				$this->DidNO->setFormValue($val);
		}

		// Check field name 'ICSiIVFDateTime' first before field var 'x_ICSiIVFDateTime'
		$val = $CurrentForm->hasValue("ICSiIVFDateTime") ? $CurrentForm->getValue("ICSiIVFDateTime") : $CurrentForm->getValue("x_ICSiIVFDateTime");
		if (!$this->ICSiIVFDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSiIVFDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ICSiIVFDateTime->setFormValue($val);
			$this->ICSiIVFDateTime->CurrentValue = UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0);
		}

		// Check field name 'PrimaryEmbrologist' first before field var 'x_PrimaryEmbrologist'
		$val = $CurrentForm->hasValue("PrimaryEmbrologist") ? $CurrentForm->getValue("PrimaryEmbrologist") : $CurrentForm->getValue("x_PrimaryEmbrologist");
		if (!$this->PrimaryEmbrologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrimaryEmbrologist->Visible = FALSE; // Disable update for API request
			else
				$this->PrimaryEmbrologist->setFormValue($val);
		}

		// Check field name 'SecondaryEmbrologist' first before field var 'x_SecondaryEmbrologist'
		$val = $CurrentForm->hasValue("SecondaryEmbrologist") ? $CurrentForm->getValue("SecondaryEmbrologist") : $CurrentForm->getValue("x_SecondaryEmbrologist");
		if (!$this->SecondaryEmbrologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SecondaryEmbrologist->Visible = FALSE; // Disable update for API request
			else
				$this->SecondaryEmbrologist->setFormValue($val);
		}

		// Check field name 'Incubator' first before field var 'x_Incubator'
		$val = $CurrentForm->hasValue("Incubator") ? $CurrentForm->getValue("Incubator") : $CurrentForm->getValue("x_Incubator");
		if (!$this->Incubator->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incubator->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator->setFormValue($val);
		}

		// Check field name 'location' first before field var 'x_location'
		$val = $CurrentForm->hasValue("location") ? $CurrentForm->getValue("location") : $CurrentForm->getValue("x_location");
		if (!$this->location->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->location->Visible = FALSE; // Disable update for API request
			else
				$this->location->setFormValue($val);
		}

		// Check field name 'OocyteNo' first before field var 'x_OocyteNo'
		$val = $CurrentForm->hasValue("OocyteNo") ? $CurrentForm->getValue("OocyteNo") : $CurrentForm->getValue("x_OocyteNo");
		if (!$this->OocyteNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocyteNo->Visible = FALSE; // Disable update for API request
			else
				$this->OocyteNo->setFormValue($val);
		}

		// Check field name 'Stage' first before field var 'x_Stage'
		$val = $CurrentForm->hasValue("Stage") ? $CurrentForm->getValue("Stage") : $CurrentForm->getValue("x_Stage");
		if (!$this->Stage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Stage->Visible = FALSE; // Disable update for API request
			else
				$this->Stage->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'vitrificationDate' first before field var 'x_vitrificationDate'
		$val = $CurrentForm->hasValue("vitrificationDate") ? $CurrentForm->getValue("vitrificationDate") : $CurrentForm->getValue("x_vitrificationDate");
		if (!$this->vitrificationDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitrificationDate->Visible = FALSE; // Disable update for API request
			else
				$this->vitrificationDate->setFormValue($val);
			$this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
		}

		// Check field name 'vitriPrimaryEmbryologist' first before field var 'x_vitriPrimaryEmbryologist'
		$val = $CurrentForm->hasValue("vitriPrimaryEmbryologist") ? $CurrentForm->getValue("vitriPrimaryEmbryologist") : $CurrentForm->getValue("x_vitriPrimaryEmbryologist");
		if (!$this->vitriPrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriPrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->vitriPrimaryEmbryologist->setFormValue($val);
		}

		// Check field name 'vitriSecondaryEmbryologist' first before field var 'x_vitriSecondaryEmbryologist'
		$val = $CurrentForm->hasValue("vitriSecondaryEmbryologist") ? $CurrentForm->getValue("vitriSecondaryEmbryologist") : $CurrentForm->getValue("x_vitriSecondaryEmbryologist");
		if (!$this->vitriSecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriSecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->vitriSecondaryEmbryologist->setFormValue($val);
		}

		// Check field name 'vitriEmbryoNo' first before field var 'x_vitriEmbryoNo'
		$val = $CurrentForm->hasValue("vitriEmbryoNo") ? $CurrentForm->getValue("vitriEmbryoNo") : $CurrentForm->getValue("x_vitriEmbryoNo");
		if (!$this->vitriEmbryoNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriEmbryoNo->Visible = FALSE; // Disable update for API request
			else
				$this->vitriEmbryoNo->setFormValue($val);
		}

		// Check field name 'thawReFrozen' first before field var 'x_thawReFrozen'
		$val = $CurrentForm->hasValue("thawReFrozen") ? $CurrentForm->getValue("thawReFrozen") : $CurrentForm->getValue("x_thawReFrozen");
		if (!$this->thawReFrozen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawReFrozen->Visible = FALSE; // Disable update for API request
			else
				$this->thawReFrozen->setFormValue($val);
		}

		// Check field name 'vitriFertilisationDate' first before field var 'x_vitriFertilisationDate'
		$val = $CurrentForm->hasValue("vitriFertilisationDate") ? $CurrentForm->getValue("vitriFertilisationDate") : $CurrentForm->getValue("x_vitriFertilisationDate");
		if (!$this->vitriFertilisationDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriFertilisationDate->Visible = FALSE; // Disable update for API request
			else
				$this->vitriFertilisationDate->setFormValue($val);
			$this->vitriFertilisationDate->CurrentValue = UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0);
		}

		// Check field name 'vitriDay' first before field var 'x_vitriDay'
		$val = $CurrentForm->hasValue("vitriDay") ? $CurrentForm->getValue("vitriDay") : $CurrentForm->getValue("x_vitriDay");
		if (!$this->vitriDay->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriDay->Visible = FALSE; // Disable update for API request
			else
				$this->vitriDay->setFormValue($val);
		}

		// Check field name 'vitriStage' first before field var 'x_vitriStage'
		$val = $CurrentForm->hasValue("vitriStage") ? $CurrentForm->getValue("vitriStage") : $CurrentForm->getValue("x_vitriStage");
		if (!$this->vitriStage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriStage->Visible = FALSE; // Disable update for API request
			else
				$this->vitriStage->setFormValue($val);
		}

		// Check field name 'vitriGrade' first before field var 'x_vitriGrade'
		$val = $CurrentForm->hasValue("vitriGrade") ? $CurrentForm->getValue("vitriGrade") : $CurrentForm->getValue("x_vitriGrade");
		if (!$this->vitriGrade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriGrade->Visible = FALSE; // Disable update for API request
			else
				$this->vitriGrade->setFormValue($val);
		}

		// Check field name 'vitriIncubator' first before field var 'x_vitriIncubator'
		$val = $CurrentForm->hasValue("vitriIncubator") ? $CurrentForm->getValue("vitriIncubator") : $CurrentForm->getValue("x_vitriIncubator");
		if (!$this->vitriIncubator->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriIncubator->Visible = FALSE; // Disable update for API request
			else
				$this->vitriIncubator->setFormValue($val);
		}

		// Check field name 'vitriTank' first before field var 'x_vitriTank'
		$val = $CurrentForm->hasValue("vitriTank") ? $CurrentForm->getValue("vitriTank") : $CurrentForm->getValue("x_vitriTank");
		if (!$this->vitriTank->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriTank->Visible = FALSE; // Disable update for API request
			else
				$this->vitriTank->setFormValue($val);
		}

		// Check field name 'vitriCanister' first before field var 'x_vitriCanister'
		$val = $CurrentForm->hasValue("vitriCanister") ? $CurrentForm->getValue("vitriCanister") : $CurrentForm->getValue("x_vitriCanister");
		if (!$this->vitriCanister->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriCanister->Visible = FALSE; // Disable update for API request
			else
				$this->vitriCanister->setFormValue($val);
		}

		// Check field name 'vitriGobiet' first before field var 'x_vitriGobiet'
		$val = $CurrentForm->hasValue("vitriGobiet") ? $CurrentForm->getValue("vitriGobiet") : $CurrentForm->getValue("x_vitriGobiet");
		if (!$this->vitriGobiet->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriGobiet->Visible = FALSE; // Disable update for API request
			else
				$this->vitriGobiet->setFormValue($val);
		}

		// Check field name 'vitriViscotube' first before field var 'x_vitriViscotube'
		$val = $CurrentForm->hasValue("vitriViscotube") ? $CurrentForm->getValue("vitriViscotube") : $CurrentForm->getValue("x_vitriViscotube");
		if (!$this->vitriViscotube->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriViscotube->Visible = FALSE; // Disable update for API request
			else
				$this->vitriViscotube->setFormValue($val);
		}

		// Check field name 'vitriCryolockNo' first before field var 'x_vitriCryolockNo'
		$val = $CurrentForm->hasValue("vitriCryolockNo") ? $CurrentForm->getValue("vitriCryolockNo") : $CurrentForm->getValue("x_vitriCryolockNo");
		if (!$this->vitriCryolockNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriCryolockNo->Visible = FALSE; // Disable update for API request
			else
				$this->vitriCryolockNo->setFormValue($val);
		}

		// Check field name 'vitriCryolockColour' first before field var 'x_vitriCryolockColour'
		$val = $CurrentForm->hasValue("vitriCryolockColour") ? $CurrentForm->getValue("vitriCryolockColour") : $CurrentForm->getValue("x_vitriCryolockColour");
		if (!$this->vitriCryolockColour->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitriCryolockColour->Visible = FALSE; // Disable update for API request
			else
				$this->vitriCryolockColour->setFormValue($val);
		}

		// Check field name 'thawDate' first before field var 'x_thawDate'
		$val = $CurrentForm->hasValue("thawDate") ? $CurrentForm->getValue("thawDate") : $CurrentForm->getValue("x_thawDate");
		if (!$this->thawDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawDate->Visible = FALSE; // Disable update for API request
			else
				$this->thawDate->setFormValue($val);
			$this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
		}

		// Check field name 'thawPrimaryEmbryologist' first before field var 'x_thawPrimaryEmbryologist'
		$val = $CurrentForm->hasValue("thawPrimaryEmbryologist") ? $CurrentForm->getValue("thawPrimaryEmbryologist") : $CurrentForm->getValue("x_thawPrimaryEmbryologist");
		if (!$this->thawPrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawPrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->thawPrimaryEmbryologist->setFormValue($val);
		}

		// Check field name 'thawSecondaryEmbryologist' first before field var 'x_thawSecondaryEmbryologist'
		$val = $CurrentForm->hasValue("thawSecondaryEmbryologist") ? $CurrentForm->getValue("thawSecondaryEmbryologist") : $CurrentForm->getValue("x_thawSecondaryEmbryologist");
		if (!$this->thawSecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawSecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->thawSecondaryEmbryologist->setFormValue($val);
		}

		// Check field name 'thawET' first before field var 'x_thawET'
		$val = $CurrentForm->hasValue("thawET") ? $CurrentForm->getValue("thawET") : $CurrentForm->getValue("x_thawET");
		if (!$this->thawET->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawET->Visible = FALSE; // Disable update for API request
			else
				$this->thawET->setFormValue($val);
		}

		// Check field name 'thawAbserve' first before field var 'x_thawAbserve'
		$val = $CurrentForm->hasValue("thawAbserve") ? $CurrentForm->getValue("thawAbserve") : $CurrentForm->getValue("x_thawAbserve");
		if (!$this->thawAbserve->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawAbserve->Visible = FALSE; // Disable update for API request
			else
				$this->thawAbserve->setFormValue($val);
		}

		// Check field name 'thawDiscard' first before field var 'x_thawDiscard'
		$val = $CurrentForm->hasValue("thawDiscard") ? $CurrentForm->getValue("thawDiscard") : $CurrentForm->getValue("x_thawDiscard");
		if (!$this->thawDiscard->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->thawDiscard->Visible = FALSE; // Disable update for API request
			else
				$this->thawDiscard->setFormValue($val);
		}

		// Check field name 'ETCatheter' first before field var 'x_ETCatheter'
		$val = $CurrentForm->hasValue("ETCatheter") ? $CurrentForm->getValue("ETCatheter") : $CurrentForm->getValue("x_ETCatheter");
		if (!$this->ETCatheter->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETCatheter->Visible = FALSE; // Disable update for API request
			else
				$this->ETCatheter->setFormValue($val);
		}

		// Check field name 'ETDifficulty' first before field var 'x_ETDifficulty'
		$val = $CurrentForm->hasValue("ETDifficulty") ? $CurrentForm->getValue("ETDifficulty") : $CurrentForm->getValue("x_ETDifficulty");
		if (!$this->ETDifficulty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETDifficulty->Visible = FALSE; // Disable update for API request
			else
				$this->ETDifficulty->setFormValue($val);
		}

		// Check field name 'ETEasy' first before field var 'x_ETEasy'
		$val = $CurrentForm->hasValue("ETEasy") ? $CurrentForm->getValue("ETEasy") : $CurrentForm->getValue("x_ETEasy");
		if (!$this->ETEasy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETEasy->Visible = FALSE; // Disable update for API request
			else
				$this->ETEasy->setFormValue($val);
		}

		// Check field name 'ETComments' first before field var 'x_ETComments'
		$val = $CurrentForm->hasValue("ETComments") ? $CurrentForm->getValue("ETComments") : $CurrentForm->getValue("x_ETComments");
		if (!$this->ETComments->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETComments->Visible = FALSE; // Disable update for API request
			else
				$this->ETComments->setFormValue($val);
		}

		// Check field name 'ETDoctor' first before field var 'x_ETDoctor'
		$val = $CurrentForm->hasValue("ETDoctor") ? $CurrentForm->getValue("ETDoctor") : $CurrentForm->getValue("x_ETDoctor");
		if (!$this->ETDoctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETDoctor->Visible = FALSE; // Disable update for API request
			else
				$this->ETDoctor->setFormValue($val);
		}

		// Check field name 'ETEmbryologist' first before field var 'x_ETEmbryologist'
		$val = $CurrentForm->hasValue("ETEmbryologist") ? $CurrentForm->getValue("ETEmbryologist") : $CurrentForm->getValue("x_ETEmbryologist");
		if (!$this->ETEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->ETEmbryologist->setFormValue($val);
		}

		// Check field name 'ETDate' first before field var 'x_ETDate'
		$val = $CurrentForm->hasValue("ETDate") ? $CurrentForm->getValue("ETDate") : $CurrentForm->getValue("x_ETDate");
		if (!$this->ETDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETDate->Visible = FALSE; // Disable update for API request
			else
				$this->ETDate->setFormValue($val);
			$this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 0);
		}

		// Check field name 'Day1End' first before field var 'x_Day1End'
		$val = $CurrentForm->hasValue("Day1End") ? $CurrentForm->getValue("Day1End") : $CurrentForm->getValue("x_Day1End");
		if (!$this->Day1End->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1End->Visible = FALSE; // Disable update for API request
			else
				$this->Day1End->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
		$this->SpermOrigin->CurrentValue = $this->SpermOrigin->FormValue;
		$this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
		$this->IndicationForART->CurrentValue = $this->IndicationForART->FormValue;
		$this->Day0sino->CurrentValue = $this->Day0sino->FormValue;
		$this->Day0OocyteStage->CurrentValue = $this->Day0OocyteStage->FormValue;
		$this->Day0PolarBodyPosition->CurrentValue = $this->Day0PolarBodyPosition->FormValue;
		$this->Day0Breakage->CurrentValue = $this->Day0Breakage->FormValue;
		$this->Day0Attempts->CurrentValue = $this->Day0Attempts->FormValue;
		$this->Day0SPZMorpho->CurrentValue = $this->Day0SPZMorpho->FormValue;
		$this->Day0SPZLocation->CurrentValue = $this->Day0SPZLocation->FormValue;
		$this->Day0SpOrgin->CurrentValue = $this->Day0SpOrgin->FormValue;
		$this->Day5Cryoptop->CurrentValue = $this->Day5Cryoptop->FormValue;
		$this->Day1Sperm->CurrentValue = $this->Day1Sperm->FormValue;
		$this->Day1PN->CurrentValue = $this->Day1PN->FormValue;
		$this->Day1PB->CurrentValue = $this->Day1PB->FormValue;
		$this->Day1Pronucleus->CurrentValue = $this->Day1Pronucleus->FormValue;
		$this->Day1Nucleolus->CurrentValue = $this->Day1Nucleolus->FormValue;
		$this->Day1Halo->CurrentValue = $this->Day1Halo->FormValue;
		$this->Day2SiNo->CurrentValue = $this->Day2SiNo->FormValue;
		$this->Day2CellNo->CurrentValue = $this->Day2CellNo->FormValue;
		$this->Day2Frag->CurrentValue = $this->Day2Frag->FormValue;
		$this->Day2Symmetry->CurrentValue = $this->Day2Symmetry->FormValue;
		$this->Day2Cryoptop->CurrentValue = $this->Day2Cryoptop->FormValue;
		$this->Day2Grade->CurrentValue = $this->Day2Grade->FormValue;
		$this->Day2End->CurrentValue = $this->Day2End->FormValue;
		$this->Day3Sino->CurrentValue = $this->Day3Sino->FormValue;
		$this->Day3CellNo->CurrentValue = $this->Day3CellNo->FormValue;
		$this->Day3Frag->CurrentValue = $this->Day3Frag->FormValue;
		$this->Day3Symmetry->CurrentValue = $this->Day3Symmetry->FormValue;
		$this->Day3ZP->CurrentValue = $this->Day3ZP->FormValue;
		$this->Day3Vacoules->CurrentValue = $this->Day3Vacoules->FormValue;
		$this->Day3Grade->CurrentValue = $this->Day3Grade->FormValue;
		$this->Day3Cryoptop->CurrentValue = $this->Day3Cryoptop->FormValue;
		$this->Day3End->CurrentValue = $this->Day3End->FormValue;
		$this->Day4SiNo->CurrentValue = $this->Day4SiNo->FormValue;
		$this->Day4CellNo->CurrentValue = $this->Day4CellNo->FormValue;
		$this->Day4Frag->CurrentValue = $this->Day4Frag->FormValue;
		$this->Day4Symmetry->CurrentValue = $this->Day4Symmetry->FormValue;
		$this->Day4Grade->CurrentValue = $this->Day4Grade->FormValue;
		$this->Day4Cryoptop->CurrentValue = $this->Day4Cryoptop->FormValue;
		$this->Day4End->CurrentValue = $this->Day4End->FormValue;
		$this->Day5CellNo->CurrentValue = $this->Day5CellNo->FormValue;
		$this->Day5ICM->CurrentValue = $this->Day5ICM->FormValue;
		$this->Day5TE->CurrentValue = $this->Day5TE->FormValue;
		$this->Day5Observation->CurrentValue = $this->Day5Observation->FormValue;
		$this->Day5Collapsed->CurrentValue = $this->Day5Collapsed->FormValue;
		$this->Day5Vacoulles->CurrentValue = $this->Day5Vacoulles->FormValue;
		$this->Day5Grade->CurrentValue = $this->Day5Grade->FormValue;
		$this->Day6CellNo->CurrentValue = $this->Day6CellNo->FormValue;
		$this->Day6ICM->CurrentValue = $this->Day6ICM->FormValue;
		$this->Day6TE->CurrentValue = $this->Day6TE->FormValue;
		$this->Day6Observation->CurrentValue = $this->Day6Observation->FormValue;
		$this->Day6Collapsed->CurrentValue = $this->Day6Collapsed->FormValue;
		$this->Day6Vacoulles->CurrentValue = $this->Day6Vacoulles->FormValue;
		$this->Day6Grade->CurrentValue = $this->Day6Grade->FormValue;
		$this->Day6Cryoptop->CurrentValue = $this->Day6Cryoptop->FormValue;
		$this->EndSiNo->CurrentValue = $this->EndSiNo->FormValue;
		$this->EndingDay->CurrentValue = $this->EndingDay->FormValue;
		$this->EndingCellStage->CurrentValue = $this->EndingCellStage->FormValue;
		$this->EndingGrade->CurrentValue = $this->EndingGrade->FormValue;
		$this->EndingState->CurrentValue = $this->EndingState->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->DidNO->CurrentValue = $this->DidNO->FormValue;
		$this->ICSiIVFDateTime->CurrentValue = $this->ICSiIVFDateTime->FormValue;
		$this->ICSiIVFDateTime->CurrentValue = UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0);
		$this->PrimaryEmbrologist->CurrentValue = $this->PrimaryEmbrologist->FormValue;
		$this->SecondaryEmbrologist->CurrentValue = $this->SecondaryEmbrologist->FormValue;
		$this->Incubator->CurrentValue = $this->Incubator->FormValue;
		$this->location->CurrentValue = $this->location->FormValue;
		$this->OocyteNo->CurrentValue = $this->OocyteNo->FormValue;
		$this->Stage->CurrentValue = $this->Stage->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->vitrificationDate->CurrentValue = $this->vitrificationDate->FormValue;
		$this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
		$this->vitriPrimaryEmbryologist->CurrentValue = $this->vitriPrimaryEmbryologist->FormValue;
		$this->vitriSecondaryEmbryologist->CurrentValue = $this->vitriSecondaryEmbryologist->FormValue;
		$this->vitriEmbryoNo->CurrentValue = $this->vitriEmbryoNo->FormValue;
		$this->thawReFrozen->CurrentValue = $this->thawReFrozen->FormValue;
		$this->vitriFertilisationDate->CurrentValue = $this->vitriFertilisationDate->FormValue;
		$this->vitriFertilisationDate->CurrentValue = UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0);
		$this->vitriDay->CurrentValue = $this->vitriDay->FormValue;
		$this->vitriStage->CurrentValue = $this->vitriStage->FormValue;
		$this->vitriGrade->CurrentValue = $this->vitriGrade->FormValue;
		$this->vitriIncubator->CurrentValue = $this->vitriIncubator->FormValue;
		$this->vitriTank->CurrentValue = $this->vitriTank->FormValue;
		$this->vitriCanister->CurrentValue = $this->vitriCanister->FormValue;
		$this->vitriGobiet->CurrentValue = $this->vitriGobiet->FormValue;
		$this->vitriViscotube->CurrentValue = $this->vitriViscotube->FormValue;
		$this->vitriCryolockNo->CurrentValue = $this->vitriCryolockNo->FormValue;
		$this->vitriCryolockColour->CurrentValue = $this->vitriCryolockColour->FormValue;
		$this->thawDate->CurrentValue = $this->thawDate->FormValue;
		$this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
		$this->thawPrimaryEmbryologist->CurrentValue = $this->thawPrimaryEmbryologist->FormValue;
		$this->thawSecondaryEmbryologist->CurrentValue = $this->thawSecondaryEmbryologist->FormValue;
		$this->thawET->CurrentValue = $this->thawET->FormValue;
		$this->thawAbserve->CurrentValue = $this->thawAbserve->FormValue;
		$this->thawDiscard->CurrentValue = $this->thawDiscard->FormValue;
		$this->ETCatheter->CurrentValue = $this->ETCatheter->FormValue;
		$this->ETDifficulty->CurrentValue = $this->ETDifficulty->FormValue;
		$this->ETEasy->CurrentValue = $this->ETEasy->FormValue;
		$this->ETComments->CurrentValue = $this->ETComments->FormValue;
		$this->ETDoctor->CurrentValue = $this->ETDoctor->FormValue;
		$this->ETEmbryologist->CurrentValue = $this->ETEmbryologist->FormValue;
		$this->ETDate->CurrentValue = $this->ETDate->FormValue;
		$this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 0);
		$this->Day1End->CurrentValue = $this->Day1End->FormValue;
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
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['ARTCycle'] = $this->ARTCycle->CurrentValue;
		$row['SpermOrigin'] = $this->SpermOrigin->CurrentValue;
		$row['InseminatinTechnique'] = $this->InseminatinTechnique->CurrentValue;
		$row['IndicationForART'] = $this->IndicationForART->CurrentValue;
		$row['Day0sino'] = $this->Day0sino->CurrentValue;
		$row['Day0OocyteStage'] = $this->Day0OocyteStage->CurrentValue;
		$row['Day0PolarBodyPosition'] = $this->Day0PolarBodyPosition->CurrentValue;
		$row['Day0Breakage'] = $this->Day0Breakage->CurrentValue;
		$row['Day0Attempts'] = $this->Day0Attempts->CurrentValue;
		$row['Day0SPZMorpho'] = $this->Day0SPZMorpho->CurrentValue;
		$row['Day0SPZLocation'] = $this->Day0SPZLocation->CurrentValue;
		$row['Day0SpOrgin'] = $this->Day0SpOrgin->CurrentValue;
		$row['Day5Cryoptop'] = $this->Day5Cryoptop->CurrentValue;
		$row['Day1Sperm'] = $this->Day1Sperm->CurrentValue;
		$row['Day1PN'] = $this->Day1PN->CurrentValue;
		$row['Day1PB'] = $this->Day1PB->CurrentValue;
		$row['Day1Pronucleus'] = $this->Day1Pronucleus->CurrentValue;
		$row['Day1Nucleolus'] = $this->Day1Nucleolus->CurrentValue;
		$row['Day1Halo'] = $this->Day1Halo->CurrentValue;
		$row['Day2SiNo'] = $this->Day2SiNo->CurrentValue;
		$row['Day2CellNo'] = $this->Day2CellNo->CurrentValue;
		$row['Day2Frag'] = $this->Day2Frag->CurrentValue;
		$row['Day2Symmetry'] = $this->Day2Symmetry->CurrentValue;
		$row['Day2Cryoptop'] = $this->Day2Cryoptop->CurrentValue;
		$row['Day2Grade'] = $this->Day2Grade->CurrentValue;
		$row['Day2End'] = $this->Day2End->CurrentValue;
		$row['Day3Sino'] = $this->Day3Sino->CurrentValue;
		$row['Day3CellNo'] = $this->Day3CellNo->CurrentValue;
		$row['Day3Frag'] = $this->Day3Frag->CurrentValue;
		$row['Day3Symmetry'] = $this->Day3Symmetry->CurrentValue;
		$row['Day3ZP'] = $this->Day3ZP->CurrentValue;
		$row['Day3Vacoules'] = $this->Day3Vacoules->CurrentValue;
		$row['Day3Grade'] = $this->Day3Grade->CurrentValue;
		$row['Day3Cryoptop'] = $this->Day3Cryoptop->CurrentValue;
		$row['Day3End'] = $this->Day3End->CurrentValue;
		$row['Day4SiNo'] = $this->Day4SiNo->CurrentValue;
		$row['Day4CellNo'] = $this->Day4CellNo->CurrentValue;
		$row['Day4Frag'] = $this->Day4Frag->CurrentValue;
		$row['Day4Symmetry'] = $this->Day4Symmetry->CurrentValue;
		$row['Day4Grade'] = $this->Day4Grade->CurrentValue;
		$row['Day4Cryoptop'] = $this->Day4Cryoptop->CurrentValue;
		$row['Day4End'] = $this->Day4End->CurrentValue;
		$row['Day5CellNo'] = $this->Day5CellNo->CurrentValue;
		$row['Day5ICM'] = $this->Day5ICM->CurrentValue;
		$row['Day5TE'] = $this->Day5TE->CurrentValue;
		$row['Day5Observation'] = $this->Day5Observation->CurrentValue;
		$row['Day5Collapsed'] = $this->Day5Collapsed->CurrentValue;
		$row['Day5Vacoulles'] = $this->Day5Vacoulles->CurrentValue;
		$row['Day5Grade'] = $this->Day5Grade->CurrentValue;
		$row['Day6CellNo'] = $this->Day6CellNo->CurrentValue;
		$row['Day6ICM'] = $this->Day6ICM->CurrentValue;
		$row['Day6TE'] = $this->Day6TE->CurrentValue;
		$row['Day6Observation'] = $this->Day6Observation->CurrentValue;
		$row['Day6Collapsed'] = $this->Day6Collapsed->CurrentValue;
		$row['Day6Vacoulles'] = $this->Day6Vacoulles->CurrentValue;
		$row['Day6Grade'] = $this->Day6Grade->CurrentValue;
		$row['Day6Cryoptop'] = $this->Day6Cryoptop->CurrentValue;
		$row['EndSiNo'] = $this->EndSiNo->CurrentValue;
		$row['EndingDay'] = $this->EndingDay->CurrentValue;
		$row['EndingCellStage'] = $this->EndingCellStage->CurrentValue;
		$row['EndingGrade'] = $this->EndingGrade->CurrentValue;
		$row['EndingState'] = $this->EndingState->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['DidNO'] = $this->DidNO->CurrentValue;
		$row['ICSiIVFDateTime'] = $this->ICSiIVFDateTime->CurrentValue;
		$row['PrimaryEmbrologist'] = $this->PrimaryEmbrologist->CurrentValue;
		$row['SecondaryEmbrologist'] = $this->SecondaryEmbrologist->CurrentValue;
		$row['Incubator'] = $this->Incubator->CurrentValue;
		$row['location'] = $this->location->CurrentValue;
		$row['OocyteNo'] = $this->OocyteNo->CurrentValue;
		$row['Stage'] = $this->Stage->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['vitrificationDate'] = $this->vitrificationDate->CurrentValue;
		$row['vitriPrimaryEmbryologist'] = $this->vitriPrimaryEmbryologist->CurrentValue;
		$row['vitriSecondaryEmbryologist'] = $this->vitriSecondaryEmbryologist->CurrentValue;
		$row['vitriEmbryoNo'] = $this->vitriEmbryoNo->CurrentValue;
		$row['thawReFrozen'] = $this->thawReFrozen->CurrentValue;
		$row['vitriFertilisationDate'] = $this->vitriFertilisationDate->CurrentValue;
		$row['vitriDay'] = $this->vitriDay->CurrentValue;
		$row['vitriStage'] = $this->vitriStage->CurrentValue;
		$row['vitriGrade'] = $this->vitriGrade->CurrentValue;
		$row['vitriIncubator'] = $this->vitriIncubator->CurrentValue;
		$row['vitriTank'] = $this->vitriTank->CurrentValue;
		$row['vitriCanister'] = $this->vitriCanister->CurrentValue;
		$row['vitriGobiet'] = $this->vitriGobiet->CurrentValue;
		$row['vitriViscotube'] = $this->vitriViscotube->CurrentValue;
		$row['vitriCryolockNo'] = $this->vitriCryolockNo->CurrentValue;
		$row['vitriCryolockColour'] = $this->vitriCryolockColour->CurrentValue;
		$row['thawDate'] = $this->thawDate->CurrentValue;
		$row['thawPrimaryEmbryologist'] = $this->thawPrimaryEmbryologist->CurrentValue;
		$row['thawSecondaryEmbryologist'] = $this->thawSecondaryEmbryologist->CurrentValue;
		$row['thawET'] = $this->thawET->CurrentValue;
		$row['thawAbserve'] = $this->thawAbserve->CurrentValue;
		$row['thawDiscard'] = $this->thawDiscard->CurrentValue;
		$row['ETCatheter'] = $this->ETCatheter->CurrentValue;
		$row['ETDifficulty'] = $this->ETDifficulty->CurrentValue;
		$row['ETEasy'] = $this->ETEasy->CurrentValue;
		$row['ETComments'] = $this->ETComments->CurrentValue;
		$row['ETDoctor'] = $this->ETDoctor->CurrentValue;
		$row['ETEmbryologist'] = $this->ETEmbryologist->CurrentValue;
		$row['ETDate'] = $this->ETDate->CurrentValue;
		$row['Day1End'] = $this->Day1End->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) <> "")
			$this->id->CurrentValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() <> "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
			} else {
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// ARTCycle
			$this->ARTCycle->EditAttrs["class"] = "form-control";
			$this->ARTCycle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

			// SpermOrigin
			$this->SpermOrigin->EditAttrs["class"] = "form-control";
			$this->SpermOrigin->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SpermOrigin->CurrentValue = HtmlDecode($this->SpermOrigin->CurrentValue);
			$this->SpermOrigin->EditValue = HtmlEncode($this->SpermOrigin->CurrentValue);
			$this->SpermOrigin->PlaceHolder = RemoveHtml($this->SpermOrigin->caption());

			// InseminatinTechnique
			$this->InseminatinTechnique->EditAttrs["class"] = "form-control";
			$this->InseminatinTechnique->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->InseminatinTechnique->CurrentValue = HtmlDecode($this->InseminatinTechnique->CurrentValue);
			$this->InseminatinTechnique->EditValue = HtmlEncode($this->InseminatinTechnique->CurrentValue);
			$this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

			// IndicationForART
			$this->IndicationForART->EditAttrs["class"] = "form-control";
			$this->IndicationForART->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
			$this->IndicationForART->EditValue = HtmlEncode($this->IndicationForART->CurrentValue);
			$this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

			// Day0sino
			$this->Day0sino->EditAttrs["class"] = "form-control";
			$this->Day0sino->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day0sino->CurrentValue = HtmlDecode($this->Day0sino->CurrentValue);
			$this->Day0sino->EditValue = HtmlEncode($this->Day0sino->CurrentValue);
			$this->Day0sino->PlaceHolder = RemoveHtml($this->Day0sino->caption());

			// Day0OocyteStage
			$this->Day0OocyteStage->EditAttrs["class"] = "form-control";
			$this->Day0OocyteStage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day0OocyteStage->CurrentValue = HtmlDecode($this->Day0OocyteStage->CurrentValue);
			$this->Day0OocyteStage->EditValue = HtmlEncode($this->Day0OocyteStage->CurrentValue);
			$this->Day0OocyteStage->PlaceHolder = RemoveHtml($this->Day0OocyteStage->caption());

			// Day0PolarBodyPosition
			$this->Day0PolarBodyPosition->EditAttrs["class"] = "form-control";
			$this->Day0PolarBodyPosition->EditCustomAttributes = "";
			$this->Day0PolarBodyPosition->EditValue = $this->Day0PolarBodyPosition->options(TRUE);

			// Day0Breakage
			$this->Day0Breakage->EditAttrs["class"] = "form-control";
			$this->Day0Breakage->EditCustomAttributes = "";
			$this->Day0Breakage->EditValue = $this->Day0Breakage->options(TRUE);

			// Day0Attempts
			$this->Day0Attempts->EditAttrs["class"] = "form-control";
			$this->Day0Attempts->EditCustomAttributes = "";
			$this->Day0Attempts->EditValue = $this->Day0Attempts->options(TRUE);

			// Day0SPZMorpho
			$this->Day0SPZMorpho->EditAttrs["class"] = "form-control";
			$this->Day0SPZMorpho->EditCustomAttributes = "";
			$this->Day0SPZMorpho->EditValue = $this->Day0SPZMorpho->options(TRUE);

			// Day0SPZLocation
			$this->Day0SPZLocation->EditAttrs["class"] = "form-control";
			$this->Day0SPZLocation->EditCustomAttributes = "";
			$this->Day0SPZLocation->EditValue = $this->Day0SPZLocation->options(TRUE);

			// Day0SpOrgin
			$this->Day0SpOrgin->EditAttrs["class"] = "form-control";
			$this->Day0SpOrgin->EditCustomAttributes = "";
			$this->Day0SpOrgin->EditValue = $this->Day0SpOrgin->options(TRUE);

			// Day5Cryoptop
			$this->Day5Cryoptop->EditAttrs["class"] = "form-control";
			$this->Day5Cryoptop->EditCustomAttributes = "";
			$this->Day5Cryoptop->EditValue = $this->Day5Cryoptop->options(TRUE);

			// Day1Sperm
			$this->Day1Sperm->EditAttrs["class"] = "form-control";
			$this->Day1Sperm->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day1Sperm->CurrentValue = HtmlDecode($this->Day1Sperm->CurrentValue);
			$this->Day1Sperm->EditValue = HtmlEncode($this->Day1Sperm->CurrentValue);
			$this->Day1Sperm->PlaceHolder = RemoveHtml($this->Day1Sperm->caption());

			// Day1PN
			$this->Day1PN->EditAttrs["class"] = "form-control";
			$this->Day1PN->EditCustomAttributes = "";
			$this->Day1PN->EditValue = $this->Day1PN->options(TRUE);

			// Day1PB
			$this->Day1PB->EditAttrs["class"] = "form-control";
			$this->Day1PB->EditCustomAttributes = "";
			$this->Day1PB->EditValue = $this->Day1PB->options(TRUE);

			// Day1Pronucleus
			$this->Day1Pronucleus->EditAttrs["class"] = "form-control";
			$this->Day1Pronucleus->EditCustomAttributes = "";
			$this->Day1Pronucleus->EditValue = $this->Day1Pronucleus->options(TRUE);

			// Day1Nucleolus
			$this->Day1Nucleolus->EditAttrs["class"] = "form-control";
			$this->Day1Nucleolus->EditCustomAttributes = "";
			$this->Day1Nucleolus->EditValue = $this->Day1Nucleolus->options(TRUE);

			// Day1Halo
			$this->Day1Halo->EditAttrs["class"] = "form-control";
			$this->Day1Halo->EditCustomAttributes = "";
			$this->Day1Halo->EditValue = $this->Day1Halo->options(TRUE);

			// Day2SiNo
			$this->Day2SiNo->EditAttrs["class"] = "form-control";
			$this->Day2SiNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day2SiNo->CurrentValue = HtmlDecode($this->Day2SiNo->CurrentValue);
			$this->Day2SiNo->EditValue = HtmlEncode($this->Day2SiNo->CurrentValue);
			$this->Day2SiNo->PlaceHolder = RemoveHtml($this->Day2SiNo->caption());

			// Day2CellNo
			$this->Day2CellNo->EditAttrs["class"] = "form-control";
			$this->Day2CellNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day2CellNo->CurrentValue = HtmlDecode($this->Day2CellNo->CurrentValue);
			$this->Day2CellNo->EditValue = HtmlEncode($this->Day2CellNo->CurrentValue);
			$this->Day2CellNo->PlaceHolder = RemoveHtml($this->Day2CellNo->caption());

			// Day2Frag
			$this->Day2Frag->EditAttrs["class"] = "form-control";
			$this->Day2Frag->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day2Frag->CurrentValue = HtmlDecode($this->Day2Frag->CurrentValue);
			$this->Day2Frag->EditValue = HtmlEncode($this->Day2Frag->CurrentValue);
			$this->Day2Frag->PlaceHolder = RemoveHtml($this->Day2Frag->caption());

			// Day2Symmetry
			$this->Day2Symmetry->EditAttrs["class"] = "form-control";
			$this->Day2Symmetry->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day2Symmetry->CurrentValue = HtmlDecode($this->Day2Symmetry->CurrentValue);
			$this->Day2Symmetry->EditValue = HtmlEncode($this->Day2Symmetry->CurrentValue);
			$this->Day2Symmetry->PlaceHolder = RemoveHtml($this->Day2Symmetry->caption());

			// Day2Cryoptop
			$this->Day2Cryoptop->EditAttrs["class"] = "form-control";
			$this->Day2Cryoptop->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day2Cryoptop->CurrentValue = HtmlDecode($this->Day2Cryoptop->CurrentValue);
			$this->Day2Cryoptop->EditValue = HtmlEncode($this->Day2Cryoptop->CurrentValue);
			$this->Day2Cryoptop->PlaceHolder = RemoveHtml($this->Day2Cryoptop->caption());

			// Day2Grade
			$this->Day2Grade->EditAttrs["class"] = "form-control";
			$this->Day2Grade->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day2Grade->CurrentValue = HtmlDecode($this->Day2Grade->CurrentValue);
			$this->Day2Grade->EditValue = HtmlEncode($this->Day2Grade->CurrentValue);
			$this->Day2Grade->PlaceHolder = RemoveHtml($this->Day2Grade->caption());

			// Day2End
			$this->Day2End->EditAttrs["class"] = "form-control";
			$this->Day2End->EditCustomAttributes = "";
			$this->Day2End->EditValue = $this->Day2End->options(TRUE);

			// Day3Sino
			$this->Day3Sino->EditAttrs["class"] = "form-control";
			$this->Day3Sino->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day3Sino->CurrentValue = HtmlDecode($this->Day3Sino->CurrentValue);
			$this->Day3Sino->EditValue = HtmlEncode($this->Day3Sino->CurrentValue);
			$this->Day3Sino->PlaceHolder = RemoveHtml($this->Day3Sino->caption());

			// Day3CellNo
			$this->Day3CellNo->EditAttrs["class"] = "form-control";
			$this->Day3CellNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day3CellNo->CurrentValue = HtmlDecode($this->Day3CellNo->CurrentValue);
			$this->Day3CellNo->EditValue = HtmlEncode($this->Day3CellNo->CurrentValue);
			$this->Day3CellNo->PlaceHolder = RemoveHtml($this->Day3CellNo->caption());

			// Day3Frag
			$this->Day3Frag->EditAttrs["class"] = "form-control";
			$this->Day3Frag->EditCustomAttributes = "";
			$this->Day3Frag->EditValue = $this->Day3Frag->options(TRUE);

			// Day3Symmetry
			$this->Day3Symmetry->EditAttrs["class"] = "form-control";
			$this->Day3Symmetry->EditCustomAttributes = "";
			$this->Day3Symmetry->EditValue = $this->Day3Symmetry->options(TRUE);

			// Day3ZP
			$this->Day3ZP->EditAttrs["class"] = "form-control";
			$this->Day3ZP->EditCustomAttributes = "";
			$this->Day3ZP->EditValue = $this->Day3ZP->options(TRUE);

			// Day3Vacoules
			$this->Day3Vacoules->EditAttrs["class"] = "form-control";
			$this->Day3Vacoules->EditCustomAttributes = "";
			$this->Day3Vacoules->EditValue = $this->Day3Vacoules->options(TRUE);

			// Day3Grade
			$this->Day3Grade->EditAttrs["class"] = "form-control";
			$this->Day3Grade->EditCustomAttributes = "";
			$this->Day3Grade->EditValue = $this->Day3Grade->options(TRUE);

			// Day3Cryoptop
			$this->Day3Cryoptop->EditAttrs["class"] = "form-control";
			$this->Day3Cryoptop->EditCustomAttributes = "";
			$this->Day3Cryoptop->EditValue = $this->Day3Cryoptop->options(TRUE);

			// Day3End
			$this->Day3End->EditAttrs["class"] = "form-control";
			$this->Day3End->EditCustomAttributes = "";
			$this->Day3End->EditValue = $this->Day3End->options(TRUE);

			// Day4SiNo
			$this->Day4SiNo->EditAttrs["class"] = "form-control";
			$this->Day4SiNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day4SiNo->CurrentValue = HtmlDecode($this->Day4SiNo->CurrentValue);
			$this->Day4SiNo->EditValue = HtmlEncode($this->Day4SiNo->CurrentValue);
			$this->Day4SiNo->PlaceHolder = RemoveHtml($this->Day4SiNo->caption());

			// Day4CellNo
			$this->Day4CellNo->EditAttrs["class"] = "form-control";
			$this->Day4CellNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day4CellNo->CurrentValue = HtmlDecode($this->Day4CellNo->CurrentValue);
			$this->Day4CellNo->EditValue = HtmlEncode($this->Day4CellNo->CurrentValue);
			$this->Day4CellNo->PlaceHolder = RemoveHtml($this->Day4CellNo->caption());

			// Day4Frag
			$this->Day4Frag->EditAttrs["class"] = "form-control";
			$this->Day4Frag->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day4Frag->CurrentValue = HtmlDecode($this->Day4Frag->CurrentValue);
			$this->Day4Frag->EditValue = HtmlEncode($this->Day4Frag->CurrentValue);
			$this->Day4Frag->PlaceHolder = RemoveHtml($this->Day4Frag->caption());

			// Day4Symmetry
			$this->Day4Symmetry->EditAttrs["class"] = "form-control";
			$this->Day4Symmetry->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day4Symmetry->CurrentValue = HtmlDecode($this->Day4Symmetry->CurrentValue);
			$this->Day4Symmetry->EditValue = HtmlEncode($this->Day4Symmetry->CurrentValue);
			$this->Day4Symmetry->PlaceHolder = RemoveHtml($this->Day4Symmetry->caption());

			// Day4Grade
			$this->Day4Grade->EditAttrs["class"] = "form-control";
			$this->Day4Grade->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day4Grade->CurrentValue = HtmlDecode($this->Day4Grade->CurrentValue);
			$this->Day4Grade->EditValue = HtmlEncode($this->Day4Grade->CurrentValue);
			$this->Day4Grade->PlaceHolder = RemoveHtml($this->Day4Grade->caption());

			// Day4Cryoptop
			$this->Day4Cryoptop->EditAttrs["class"] = "form-control";
			$this->Day4Cryoptop->EditCustomAttributes = "";
			$this->Day4Cryoptop->EditValue = $this->Day4Cryoptop->options(TRUE);

			// Day4End
			$this->Day4End->EditAttrs["class"] = "form-control";
			$this->Day4End->EditCustomAttributes = "";
			$this->Day4End->EditValue = $this->Day4End->options(TRUE);

			// Day5CellNo
			$this->Day5CellNo->EditAttrs["class"] = "form-control";
			$this->Day5CellNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day5CellNo->CurrentValue = HtmlDecode($this->Day5CellNo->CurrentValue);
			$this->Day5CellNo->EditValue = HtmlEncode($this->Day5CellNo->CurrentValue);
			$this->Day5CellNo->PlaceHolder = RemoveHtml($this->Day5CellNo->caption());

			// Day5ICM
			$this->Day5ICM->EditAttrs["class"] = "form-control";
			$this->Day5ICM->EditCustomAttributes = "";
			$this->Day5ICM->EditValue = $this->Day5ICM->options(TRUE);

			// Day5TE
			$this->Day5TE->EditAttrs["class"] = "form-control";
			$this->Day5TE->EditCustomAttributes = "";
			$this->Day5TE->EditValue = $this->Day5TE->options(TRUE);

			// Day5Observation
			$this->Day5Observation->EditAttrs["class"] = "form-control";
			$this->Day5Observation->EditCustomAttributes = "";
			$this->Day5Observation->EditValue = $this->Day5Observation->options(TRUE);

			// Day5Collapsed
			$this->Day5Collapsed->EditAttrs["class"] = "form-control";
			$this->Day5Collapsed->EditCustomAttributes = "";
			$this->Day5Collapsed->EditValue = $this->Day5Collapsed->options(TRUE);

			// Day5Vacoulles
			$this->Day5Vacoulles->EditAttrs["class"] = "form-control";
			$this->Day5Vacoulles->EditCustomAttributes = "";
			$this->Day5Vacoulles->EditValue = $this->Day5Vacoulles->options(TRUE);

			// Day5Grade
			$this->Day5Grade->EditAttrs["class"] = "form-control";
			$this->Day5Grade->EditCustomAttributes = "";
			$this->Day5Grade->EditValue = $this->Day5Grade->options(TRUE);

			// Day6CellNo
			$this->Day6CellNo->EditAttrs["class"] = "form-control";
			$this->Day6CellNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day6CellNo->CurrentValue = HtmlDecode($this->Day6CellNo->CurrentValue);
			$this->Day6CellNo->EditValue = HtmlEncode($this->Day6CellNo->CurrentValue);
			$this->Day6CellNo->PlaceHolder = RemoveHtml($this->Day6CellNo->caption());

			// Day6ICM
			$this->Day6ICM->EditAttrs["class"] = "form-control";
			$this->Day6ICM->EditCustomAttributes = "";
			$this->Day6ICM->EditValue = $this->Day6ICM->options(TRUE);

			// Day6TE
			$this->Day6TE->EditAttrs["class"] = "form-control";
			$this->Day6TE->EditCustomAttributes = "";
			$this->Day6TE->EditValue = $this->Day6TE->options(TRUE);

			// Day6Observation
			$this->Day6Observation->EditAttrs["class"] = "form-control";
			$this->Day6Observation->EditCustomAttributes = "";
			$this->Day6Observation->EditValue = $this->Day6Observation->options(TRUE);

			// Day6Collapsed
			$this->Day6Collapsed->EditAttrs["class"] = "form-control";
			$this->Day6Collapsed->EditCustomAttributes = "";
			$this->Day6Collapsed->EditValue = $this->Day6Collapsed->options(TRUE);

			// Day6Vacoulles
			$this->Day6Vacoulles->EditAttrs["class"] = "form-control";
			$this->Day6Vacoulles->EditCustomAttributes = "";
			$this->Day6Vacoulles->EditValue = $this->Day6Vacoulles->options(TRUE);

			// Day6Grade
			$this->Day6Grade->EditAttrs["class"] = "form-control";
			$this->Day6Grade->EditCustomAttributes = "";
			$this->Day6Grade->EditValue = $this->Day6Grade->options(TRUE);

			// Day6Cryoptop
			$this->Day6Cryoptop->EditAttrs["class"] = "form-control";
			$this->Day6Cryoptop->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Day6Cryoptop->CurrentValue = HtmlDecode($this->Day6Cryoptop->CurrentValue);
			$this->Day6Cryoptop->EditValue = HtmlEncode($this->Day6Cryoptop->CurrentValue);
			$this->Day6Cryoptop->PlaceHolder = RemoveHtml($this->Day6Cryoptop->caption());

			// EndSiNo
			$this->EndSiNo->EditAttrs["class"] = "form-control";
			$this->EndSiNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EndSiNo->CurrentValue = HtmlDecode($this->EndSiNo->CurrentValue);
			$this->EndSiNo->EditValue = HtmlEncode($this->EndSiNo->CurrentValue);
			$this->EndSiNo->PlaceHolder = RemoveHtml($this->EndSiNo->caption());

			// EndingDay
			$this->EndingDay->EditAttrs["class"] = "form-control";
			$this->EndingDay->EditCustomAttributes = "";
			$this->EndingDay->EditValue = $this->EndingDay->options(TRUE);

			// EndingCellStage
			$this->EndingCellStage->EditAttrs["class"] = "form-control";
			$this->EndingCellStage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EndingCellStage->CurrentValue = HtmlDecode($this->EndingCellStage->CurrentValue);
			$this->EndingCellStage->EditValue = HtmlEncode($this->EndingCellStage->CurrentValue);
			$this->EndingCellStage->PlaceHolder = RemoveHtml($this->EndingCellStage->caption());

			// EndingGrade
			$this->EndingGrade->EditAttrs["class"] = "form-control";
			$this->EndingGrade->EditCustomAttributes = "";
			$this->EndingGrade->EditValue = $this->EndingGrade->options(TRUE);

			// EndingState
			$this->EndingState->EditAttrs["class"] = "form-control";
			$this->EndingState->EditCustomAttributes = "";
			$this->EndingState->EditValue = $this->EndingState->options(TRUE);

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() <> "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
			} else {
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// DidNO
			$this->DidNO->EditAttrs["class"] = "form-control";
			$this->DidNO->EditCustomAttributes = "";
			if ($this->DidNO->getSessionValue() <> "") {
				$this->DidNO->CurrentValue = $this->DidNO->getSessionValue();
			$this->DidNO->ViewValue = $this->DidNO->CurrentValue;
			$this->DidNO->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->DidNO->CurrentValue = HtmlDecode($this->DidNO->CurrentValue);
			$this->DidNO->EditValue = HtmlEncode($this->DidNO->CurrentValue);
			$this->DidNO->PlaceHolder = RemoveHtml($this->DidNO->caption());
			}

			// ICSiIVFDateTime
			$this->ICSiIVFDateTime->EditAttrs["class"] = "form-control";
			$this->ICSiIVFDateTime->EditCustomAttributes = "";
			$this->ICSiIVFDateTime->EditValue = HtmlEncode(FormatDateTime($this->ICSiIVFDateTime->CurrentValue, 8));
			$this->ICSiIVFDateTime->PlaceHolder = RemoveHtml($this->ICSiIVFDateTime->caption());

			// PrimaryEmbrologist
			$this->PrimaryEmbrologist->EditAttrs["class"] = "form-control";
			$this->PrimaryEmbrologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrimaryEmbrologist->CurrentValue = HtmlDecode($this->PrimaryEmbrologist->CurrentValue);
			$this->PrimaryEmbrologist->EditValue = HtmlEncode($this->PrimaryEmbrologist->CurrentValue);
			$this->PrimaryEmbrologist->PlaceHolder = RemoveHtml($this->PrimaryEmbrologist->caption());

			// SecondaryEmbrologist
			$this->SecondaryEmbrologist->EditAttrs["class"] = "form-control";
			$this->SecondaryEmbrologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SecondaryEmbrologist->CurrentValue = HtmlDecode($this->SecondaryEmbrologist->CurrentValue);
			$this->SecondaryEmbrologist->EditValue = HtmlEncode($this->SecondaryEmbrologist->CurrentValue);
			$this->SecondaryEmbrologist->PlaceHolder = RemoveHtml($this->SecondaryEmbrologist->caption());

			// Incubator
			$this->Incubator->EditAttrs["class"] = "form-control";
			$this->Incubator->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Incubator->CurrentValue = HtmlDecode($this->Incubator->CurrentValue);
			$this->Incubator->EditValue = HtmlEncode($this->Incubator->CurrentValue);
			$this->Incubator->PlaceHolder = RemoveHtml($this->Incubator->caption());

			// location
			$this->location->EditAttrs["class"] = "form-control";
			$this->location->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->location->CurrentValue = HtmlDecode($this->location->CurrentValue);
			$this->location->EditValue = HtmlEncode($this->location->CurrentValue);
			$this->location->PlaceHolder = RemoveHtml($this->location->caption());

			// OocyteNo
			$this->OocyteNo->EditAttrs["class"] = "form-control";
			$this->OocyteNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocyteNo->CurrentValue = HtmlDecode($this->OocyteNo->CurrentValue);
			$this->OocyteNo->EditValue = HtmlEncode($this->OocyteNo->CurrentValue);
			$this->OocyteNo->PlaceHolder = RemoveHtml($this->OocyteNo->caption());

			// Stage
			$this->Stage->EditAttrs["class"] = "form-control";
			$this->Stage->EditCustomAttributes = "";
			$this->Stage->EditValue = $this->Stage->options(TRUE);

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// vitrificationDate
			$this->vitrificationDate->EditAttrs["class"] = "form-control";
			$this->vitrificationDate->EditCustomAttributes = "";
			$this->vitrificationDate->EditValue = HtmlEncode(FormatDateTime($this->vitrificationDate->CurrentValue, 8));
			$this->vitrificationDate->PlaceHolder = RemoveHtml($this->vitrificationDate->caption());

			// vitriPrimaryEmbryologist
			$this->vitriPrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->vitriPrimaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriPrimaryEmbryologist->CurrentValue = HtmlDecode($this->vitriPrimaryEmbryologist->CurrentValue);
			$this->vitriPrimaryEmbryologist->EditValue = HtmlEncode($this->vitriPrimaryEmbryologist->CurrentValue);
			$this->vitriPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->vitriPrimaryEmbryologist->caption());

			// vitriSecondaryEmbryologist
			$this->vitriSecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->vitriSecondaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriSecondaryEmbryologist->CurrentValue = HtmlDecode($this->vitriSecondaryEmbryologist->CurrentValue);
			$this->vitriSecondaryEmbryologist->EditValue = HtmlEncode($this->vitriSecondaryEmbryologist->CurrentValue);
			$this->vitriSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->vitriSecondaryEmbryologist->caption());

			// vitriEmbryoNo
			$this->vitriEmbryoNo->EditAttrs["class"] = "form-control";
			$this->vitriEmbryoNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriEmbryoNo->CurrentValue = HtmlDecode($this->vitriEmbryoNo->CurrentValue);
			$this->vitriEmbryoNo->EditValue = HtmlEncode($this->vitriEmbryoNo->CurrentValue);
			$this->vitriEmbryoNo->PlaceHolder = RemoveHtml($this->vitriEmbryoNo->caption());

			// thawReFrozen
			$this->thawReFrozen->EditCustomAttributes = "";
			$this->thawReFrozen->EditValue = $this->thawReFrozen->options(FALSE);

			// vitriFertilisationDate
			$this->vitriFertilisationDate->EditAttrs["class"] = "form-control";
			$this->vitriFertilisationDate->EditCustomAttributes = "";
			$this->vitriFertilisationDate->EditValue = HtmlEncode(FormatDateTime($this->vitriFertilisationDate->CurrentValue, 8));
			$this->vitriFertilisationDate->PlaceHolder = RemoveHtml($this->vitriFertilisationDate->caption());

			// vitriDay
			$this->vitriDay->EditAttrs["class"] = "form-control";
			$this->vitriDay->EditCustomAttributes = "";
			$this->vitriDay->EditValue = $this->vitriDay->options(TRUE);

			// vitriStage
			$this->vitriStage->EditAttrs["class"] = "form-control";
			$this->vitriStage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriStage->CurrentValue = HtmlDecode($this->vitriStage->CurrentValue);
			$this->vitriStage->EditValue = HtmlEncode($this->vitriStage->CurrentValue);
			$this->vitriStage->PlaceHolder = RemoveHtml($this->vitriStage->caption());

			// vitriGrade
			$this->vitriGrade->EditAttrs["class"] = "form-control";
			$this->vitriGrade->EditCustomAttributes = "";
			$this->vitriGrade->EditValue = $this->vitriGrade->options(TRUE);

			// vitriIncubator
			$this->vitriIncubator->EditAttrs["class"] = "form-control";
			$this->vitriIncubator->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriIncubator->CurrentValue = HtmlDecode($this->vitriIncubator->CurrentValue);
			$this->vitriIncubator->EditValue = HtmlEncode($this->vitriIncubator->CurrentValue);
			$this->vitriIncubator->PlaceHolder = RemoveHtml($this->vitriIncubator->caption());

			// vitriTank
			$this->vitriTank->EditAttrs["class"] = "form-control";
			$this->vitriTank->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriTank->CurrentValue = HtmlDecode($this->vitriTank->CurrentValue);
			$this->vitriTank->EditValue = HtmlEncode($this->vitriTank->CurrentValue);
			$this->vitriTank->PlaceHolder = RemoveHtml($this->vitriTank->caption());

			// vitriCanister
			$this->vitriCanister->EditAttrs["class"] = "form-control";
			$this->vitriCanister->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriCanister->CurrentValue = HtmlDecode($this->vitriCanister->CurrentValue);
			$this->vitriCanister->EditValue = HtmlEncode($this->vitriCanister->CurrentValue);
			$this->vitriCanister->PlaceHolder = RemoveHtml($this->vitriCanister->caption());

			// vitriGobiet
			$this->vitriGobiet->EditAttrs["class"] = "form-control";
			$this->vitriGobiet->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriGobiet->CurrentValue = HtmlDecode($this->vitriGobiet->CurrentValue);
			$this->vitriGobiet->EditValue = HtmlEncode($this->vitriGobiet->CurrentValue);
			$this->vitriGobiet->PlaceHolder = RemoveHtml($this->vitriGobiet->caption());

			// vitriViscotube
			$this->vitriViscotube->EditAttrs["class"] = "form-control";
			$this->vitriViscotube->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriViscotube->CurrentValue = HtmlDecode($this->vitriViscotube->CurrentValue);
			$this->vitriViscotube->EditValue = HtmlEncode($this->vitriViscotube->CurrentValue);
			$this->vitriViscotube->PlaceHolder = RemoveHtml($this->vitriViscotube->caption());

			// vitriCryolockNo
			$this->vitriCryolockNo->EditAttrs["class"] = "form-control";
			$this->vitriCryolockNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriCryolockNo->CurrentValue = HtmlDecode($this->vitriCryolockNo->CurrentValue);
			$this->vitriCryolockNo->EditValue = HtmlEncode($this->vitriCryolockNo->CurrentValue);
			$this->vitriCryolockNo->PlaceHolder = RemoveHtml($this->vitriCryolockNo->caption());

			// vitriCryolockColour
			$this->vitriCryolockColour->EditAttrs["class"] = "form-control";
			$this->vitriCryolockColour->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vitriCryolockColour->CurrentValue = HtmlDecode($this->vitriCryolockColour->CurrentValue);
			$this->vitriCryolockColour->EditValue = HtmlEncode($this->vitriCryolockColour->CurrentValue);
			$this->vitriCryolockColour->PlaceHolder = RemoveHtml($this->vitriCryolockColour->caption());

			// thawDate
			$this->thawDate->EditAttrs["class"] = "form-control";
			$this->thawDate->EditCustomAttributes = "";
			$this->thawDate->EditValue = HtmlEncode(FormatDateTime($this->thawDate->CurrentValue, 8));
			$this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawPrimaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->EditValue = HtmlEncode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawSecondaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->EditValue = HtmlEncode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

			// thawET
			$this->thawET->EditAttrs["class"] = "form-control";
			$this->thawET->EditCustomAttributes = "";
			$this->thawET->EditValue = $this->thawET->options(TRUE);

			// thawAbserve
			$this->thawAbserve->EditAttrs["class"] = "form-control";
			$this->thawAbserve->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawAbserve->CurrentValue = HtmlDecode($this->thawAbserve->CurrentValue);
			$this->thawAbserve->EditValue = HtmlEncode($this->thawAbserve->CurrentValue);
			$this->thawAbserve->PlaceHolder = RemoveHtml($this->thawAbserve->caption());

			// thawDiscard
			$this->thawDiscard->EditAttrs["class"] = "form-control";
			$this->thawDiscard->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->thawDiscard->CurrentValue = HtmlDecode($this->thawDiscard->CurrentValue);
			$this->thawDiscard->EditValue = HtmlEncode($this->thawDiscard->CurrentValue);
			$this->thawDiscard->PlaceHolder = RemoveHtml($this->thawDiscard->caption());

			// ETCatheter
			$this->ETCatheter->EditAttrs["class"] = "form-control";
			$this->ETCatheter->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ETCatheter->CurrentValue = HtmlDecode($this->ETCatheter->CurrentValue);
			$this->ETCatheter->EditValue = HtmlEncode($this->ETCatheter->CurrentValue);
			$this->ETCatheter->PlaceHolder = RemoveHtml($this->ETCatheter->caption());

			// ETDifficulty
			$this->ETDifficulty->EditAttrs["class"] = "form-control";
			$this->ETDifficulty->EditCustomAttributes = "";
			$this->ETDifficulty->EditValue = $this->ETDifficulty->options(TRUE);

			// ETEasy
			$this->ETEasy->EditCustomAttributes = "";
			$this->ETEasy->EditValue = $this->ETEasy->options(FALSE);

			// ETComments
			$this->ETComments->EditAttrs["class"] = "form-control";
			$this->ETComments->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ETComments->CurrentValue = HtmlDecode($this->ETComments->CurrentValue);
			$this->ETComments->EditValue = HtmlEncode($this->ETComments->CurrentValue);
			$this->ETComments->PlaceHolder = RemoveHtml($this->ETComments->caption());

			// ETDoctor
			$this->ETDoctor->EditAttrs["class"] = "form-control";
			$this->ETDoctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ETDoctor->CurrentValue = HtmlDecode($this->ETDoctor->CurrentValue);
			$this->ETDoctor->EditValue = HtmlEncode($this->ETDoctor->CurrentValue);
			$this->ETDoctor->PlaceHolder = RemoveHtml($this->ETDoctor->caption());

			// ETEmbryologist
			$this->ETEmbryologist->EditAttrs["class"] = "form-control";
			$this->ETEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ETEmbryologist->CurrentValue = HtmlDecode($this->ETEmbryologist->CurrentValue);
			$this->ETEmbryologist->EditValue = HtmlEncode($this->ETEmbryologist->CurrentValue);
			$this->ETEmbryologist->PlaceHolder = RemoveHtml($this->ETEmbryologist->caption());

			// ETDate
			$this->ETDate->EditAttrs["class"] = "form-control";
			$this->ETDate->EditCustomAttributes = "";
			$this->ETDate->EditValue = HtmlEncode(FormatDateTime($this->ETDate->CurrentValue, 8));
			$this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

			// Day1End
			$this->Day1End->EditAttrs["class"] = "form-control";
			$this->Day1End->EditCustomAttributes = "";
			$this->Day1End->EditValue = $this->Day1End->options(TRUE);

			// Add refer script
			// RIDNo

			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";

			// SpermOrigin
			$this->SpermOrigin->LinkCustomAttributes = "";
			$this->SpermOrigin->HrefValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";

			// Day0sino
			$this->Day0sino->LinkCustomAttributes = "";
			$this->Day0sino->HrefValue = "";

			// Day0OocyteStage
			$this->Day0OocyteStage->LinkCustomAttributes = "";
			$this->Day0OocyteStage->HrefValue = "";

			// Day0PolarBodyPosition
			$this->Day0PolarBodyPosition->LinkCustomAttributes = "";
			$this->Day0PolarBodyPosition->HrefValue = "";

			// Day0Breakage
			$this->Day0Breakage->LinkCustomAttributes = "";
			$this->Day0Breakage->HrefValue = "";

			// Day0Attempts
			$this->Day0Attempts->LinkCustomAttributes = "";
			$this->Day0Attempts->HrefValue = "";

			// Day0SPZMorpho
			$this->Day0SPZMorpho->LinkCustomAttributes = "";
			$this->Day0SPZMorpho->HrefValue = "";

			// Day0SPZLocation
			$this->Day0SPZLocation->LinkCustomAttributes = "";
			$this->Day0SPZLocation->HrefValue = "";

			// Day0SpOrgin
			$this->Day0SpOrgin->LinkCustomAttributes = "";
			$this->Day0SpOrgin->HrefValue = "";

			// Day5Cryoptop
			$this->Day5Cryoptop->LinkCustomAttributes = "";
			$this->Day5Cryoptop->HrefValue = "";

			// Day1Sperm
			$this->Day1Sperm->LinkCustomAttributes = "";
			$this->Day1Sperm->HrefValue = "";

			// Day1PN
			$this->Day1PN->LinkCustomAttributes = "";
			$this->Day1PN->HrefValue = "";

			// Day1PB
			$this->Day1PB->LinkCustomAttributes = "";
			$this->Day1PB->HrefValue = "";

			// Day1Pronucleus
			$this->Day1Pronucleus->LinkCustomAttributes = "";
			$this->Day1Pronucleus->HrefValue = "";

			// Day1Nucleolus
			$this->Day1Nucleolus->LinkCustomAttributes = "";
			$this->Day1Nucleolus->HrefValue = "";

			// Day1Halo
			$this->Day1Halo->LinkCustomAttributes = "";
			$this->Day1Halo->HrefValue = "";

			// Day2SiNo
			$this->Day2SiNo->LinkCustomAttributes = "";
			$this->Day2SiNo->HrefValue = "";

			// Day2CellNo
			$this->Day2CellNo->LinkCustomAttributes = "";
			$this->Day2CellNo->HrefValue = "";

			// Day2Frag
			$this->Day2Frag->LinkCustomAttributes = "";
			$this->Day2Frag->HrefValue = "";

			// Day2Symmetry
			$this->Day2Symmetry->LinkCustomAttributes = "";
			$this->Day2Symmetry->HrefValue = "";

			// Day2Cryoptop
			$this->Day2Cryoptop->LinkCustomAttributes = "";
			$this->Day2Cryoptop->HrefValue = "";

			// Day2Grade
			$this->Day2Grade->LinkCustomAttributes = "";
			$this->Day2Grade->HrefValue = "";

			// Day2End
			$this->Day2End->LinkCustomAttributes = "";
			$this->Day2End->HrefValue = "";

			// Day3Sino
			$this->Day3Sino->LinkCustomAttributes = "";
			$this->Day3Sino->HrefValue = "";

			// Day3CellNo
			$this->Day3CellNo->LinkCustomAttributes = "";
			$this->Day3CellNo->HrefValue = "";

			// Day3Frag
			$this->Day3Frag->LinkCustomAttributes = "";
			$this->Day3Frag->HrefValue = "";

			// Day3Symmetry
			$this->Day3Symmetry->LinkCustomAttributes = "";
			$this->Day3Symmetry->HrefValue = "";

			// Day3ZP
			$this->Day3ZP->LinkCustomAttributes = "";
			$this->Day3ZP->HrefValue = "";

			// Day3Vacoules
			$this->Day3Vacoules->LinkCustomAttributes = "";
			$this->Day3Vacoules->HrefValue = "";

			// Day3Grade
			$this->Day3Grade->LinkCustomAttributes = "";
			$this->Day3Grade->HrefValue = "";

			// Day3Cryoptop
			$this->Day3Cryoptop->LinkCustomAttributes = "";
			$this->Day3Cryoptop->HrefValue = "";

			// Day3End
			$this->Day3End->LinkCustomAttributes = "";
			$this->Day3End->HrefValue = "";

			// Day4SiNo
			$this->Day4SiNo->LinkCustomAttributes = "";
			$this->Day4SiNo->HrefValue = "";

			// Day4CellNo
			$this->Day4CellNo->LinkCustomAttributes = "";
			$this->Day4CellNo->HrefValue = "";

			// Day4Frag
			$this->Day4Frag->LinkCustomAttributes = "";
			$this->Day4Frag->HrefValue = "";

			// Day4Symmetry
			$this->Day4Symmetry->LinkCustomAttributes = "";
			$this->Day4Symmetry->HrefValue = "";

			// Day4Grade
			$this->Day4Grade->LinkCustomAttributes = "";
			$this->Day4Grade->HrefValue = "";

			// Day4Cryoptop
			$this->Day4Cryoptop->LinkCustomAttributes = "";
			$this->Day4Cryoptop->HrefValue = "";

			// Day4End
			$this->Day4End->LinkCustomAttributes = "";
			$this->Day4End->HrefValue = "";

			// Day5CellNo
			$this->Day5CellNo->LinkCustomAttributes = "";
			$this->Day5CellNo->HrefValue = "";

			// Day5ICM
			$this->Day5ICM->LinkCustomAttributes = "";
			$this->Day5ICM->HrefValue = "";

			// Day5TE
			$this->Day5TE->LinkCustomAttributes = "";
			$this->Day5TE->HrefValue = "";

			// Day5Observation
			$this->Day5Observation->LinkCustomAttributes = "";
			$this->Day5Observation->HrefValue = "";

			// Day5Collapsed
			$this->Day5Collapsed->LinkCustomAttributes = "";
			$this->Day5Collapsed->HrefValue = "";

			// Day5Vacoulles
			$this->Day5Vacoulles->LinkCustomAttributes = "";
			$this->Day5Vacoulles->HrefValue = "";

			// Day5Grade
			$this->Day5Grade->LinkCustomAttributes = "";
			$this->Day5Grade->HrefValue = "";

			// Day6CellNo
			$this->Day6CellNo->LinkCustomAttributes = "";
			$this->Day6CellNo->HrefValue = "";

			// Day6ICM
			$this->Day6ICM->LinkCustomAttributes = "";
			$this->Day6ICM->HrefValue = "";

			// Day6TE
			$this->Day6TE->LinkCustomAttributes = "";
			$this->Day6TE->HrefValue = "";

			// Day6Observation
			$this->Day6Observation->LinkCustomAttributes = "";
			$this->Day6Observation->HrefValue = "";

			// Day6Collapsed
			$this->Day6Collapsed->LinkCustomAttributes = "";
			$this->Day6Collapsed->HrefValue = "";

			// Day6Vacoulles
			$this->Day6Vacoulles->LinkCustomAttributes = "";
			$this->Day6Vacoulles->HrefValue = "";

			// Day6Grade
			$this->Day6Grade->LinkCustomAttributes = "";
			$this->Day6Grade->HrefValue = "";

			// Day6Cryoptop
			$this->Day6Cryoptop->LinkCustomAttributes = "";
			$this->Day6Cryoptop->HrefValue = "";

			// EndSiNo
			$this->EndSiNo->LinkCustomAttributes = "";
			$this->EndSiNo->HrefValue = "";

			// EndingDay
			$this->EndingDay->LinkCustomAttributes = "";
			$this->EndingDay->HrefValue = "";

			// EndingCellStage
			$this->EndingCellStage->LinkCustomAttributes = "";
			$this->EndingCellStage->HrefValue = "";

			// EndingGrade
			$this->EndingGrade->LinkCustomAttributes = "";
			$this->EndingGrade->HrefValue = "";

			// EndingState
			$this->EndingState->LinkCustomAttributes = "";
			$this->EndingState->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// DidNO
			$this->DidNO->LinkCustomAttributes = "";
			$this->DidNO->HrefValue = "";

			// ICSiIVFDateTime
			$this->ICSiIVFDateTime->LinkCustomAttributes = "";
			$this->ICSiIVFDateTime->HrefValue = "";

			// PrimaryEmbrologist
			$this->PrimaryEmbrologist->LinkCustomAttributes = "";
			$this->PrimaryEmbrologist->HrefValue = "";

			// SecondaryEmbrologist
			$this->SecondaryEmbrologist->LinkCustomAttributes = "";
			$this->SecondaryEmbrologist->HrefValue = "";

			// Incubator
			$this->Incubator->LinkCustomAttributes = "";
			$this->Incubator->HrefValue = "";

			// location
			$this->location->LinkCustomAttributes = "";
			$this->location->HrefValue = "";

			// OocyteNo
			$this->OocyteNo->LinkCustomAttributes = "";
			$this->OocyteNo->HrefValue = "";

			// Stage
			$this->Stage->LinkCustomAttributes = "";
			$this->Stage->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";

			// vitriPrimaryEmbryologist
			$this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->vitriPrimaryEmbryologist->HrefValue = "";

			// vitriSecondaryEmbryologist
			$this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->vitriSecondaryEmbryologist->HrefValue = "";

			// vitriEmbryoNo
			$this->vitriEmbryoNo->LinkCustomAttributes = "";
			$this->vitriEmbryoNo->HrefValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";

			// vitriFertilisationDate
			$this->vitriFertilisationDate->LinkCustomAttributes = "";
			$this->vitriFertilisationDate->HrefValue = "";

			// vitriDay
			$this->vitriDay->LinkCustomAttributes = "";
			$this->vitriDay->HrefValue = "";

			// vitriStage
			$this->vitriStage->LinkCustomAttributes = "";
			$this->vitriStage->HrefValue = "";

			// vitriGrade
			$this->vitriGrade->LinkCustomAttributes = "";
			$this->vitriGrade->HrefValue = "";

			// vitriIncubator
			$this->vitriIncubator->LinkCustomAttributes = "";
			$this->vitriIncubator->HrefValue = "";

			// vitriTank
			$this->vitriTank->LinkCustomAttributes = "";
			$this->vitriTank->HrefValue = "";

			// vitriCanister
			$this->vitriCanister->LinkCustomAttributes = "";
			$this->vitriCanister->HrefValue = "";

			// vitriGobiet
			$this->vitriGobiet->LinkCustomAttributes = "";
			$this->vitriGobiet->HrefValue = "";

			// vitriViscotube
			$this->vitriViscotube->LinkCustomAttributes = "";
			$this->vitriViscotube->HrefValue = "";

			// vitriCryolockNo
			$this->vitriCryolockNo->LinkCustomAttributes = "";
			$this->vitriCryolockNo->HrefValue = "";

			// vitriCryolockColour
			$this->vitriCryolockColour->LinkCustomAttributes = "";
			$this->vitriCryolockColour->HrefValue = "";

			// thawDate
			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";

			// thawET
			$this->thawET->LinkCustomAttributes = "";
			$this->thawET->HrefValue = "";

			// thawAbserve
			$this->thawAbserve->LinkCustomAttributes = "";
			$this->thawAbserve->HrefValue = "";

			// thawDiscard
			$this->thawDiscard->LinkCustomAttributes = "";
			$this->thawDiscard->HrefValue = "";

			// ETCatheter
			$this->ETCatheter->LinkCustomAttributes = "";
			$this->ETCatheter->HrefValue = "";

			// ETDifficulty
			$this->ETDifficulty->LinkCustomAttributes = "";
			$this->ETDifficulty->HrefValue = "";

			// ETEasy
			$this->ETEasy->LinkCustomAttributes = "";
			$this->ETEasy->HrefValue = "";

			// ETComments
			$this->ETComments->LinkCustomAttributes = "";
			$this->ETComments->HrefValue = "";

			// ETDoctor
			$this->ETDoctor->LinkCustomAttributes = "";
			$this->ETDoctor->HrefValue = "";

			// ETEmbryologist
			$this->ETEmbryologist->LinkCustomAttributes = "";
			$this->ETEmbryologist->HrefValue = "";

			// ETDate
			$this->ETDate->LinkCustomAttributes = "";
			$this->ETDate->HrefValue = "";

			// Day1End
			$this->Day1End->LinkCustomAttributes = "";
			$this->Day1End->HrefValue = "";
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

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNo->FormValue)) {
			AddMessage($FormError, $this->RIDNo->errorMessage());
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->ARTCycle->Required) {
			if (!$this->ARTCycle->IsDetailKey && $this->ARTCycle->FormValue != NULL && $this->ARTCycle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
			}
		}
		if ($this->SpermOrigin->Required) {
			if (!$this->SpermOrigin->IsDetailKey && $this->SpermOrigin->FormValue != NULL && $this->SpermOrigin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SpermOrigin->caption(), $this->SpermOrigin->RequiredErrorMessage));
			}
		}
		if ($this->InseminatinTechnique->Required) {
			if (!$this->InseminatinTechnique->IsDetailKey && $this->InseminatinTechnique->FormValue != NULL && $this->InseminatinTechnique->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InseminatinTechnique->caption(), $this->InseminatinTechnique->RequiredErrorMessage));
			}
		}
		if ($this->IndicationForART->Required) {
			if (!$this->IndicationForART->IsDetailKey && $this->IndicationForART->FormValue != NULL && $this->IndicationForART->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IndicationForART->caption(), $this->IndicationForART->RequiredErrorMessage));
			}
		}
		if ($this->Day0sino->Required) {
			if (!$this->Day0sino->IsDetailKey && $this->Day0sino->FormValue != NULL && $this->Day0sino->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0sino->caption(), $this->Day0sino->RequiredErrorMessage));
			}
		}
		if ($this->Day0OocyteStage->Required) {
			if (!$this->Day0OocyteStage->IsDetailKey && $this->Day0OocyteStage->FormValue != NULL && $this->Day0OocyteStage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0OocyteStage->caption(), $this->Day0OocyteStage->RequiredErrorMessage));
			}
		}
		if ($this->Day0PolarBodyPosition->Required) {
			if (!$this->Day0PolarBodyPosition->IsDetailKey && $this->Day0PolarBodyPosition->FormValue != NULL && $this->Day0PolarBodyPosition->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0PolarBodyPosition->caption(), $this->Day0PolarBodyPosition->RequiredErrorMessage));
			}
		}
		if ($this->Day0Breakage->Required) {
			if (!$this->Day0Breakage->IsDetailKey && $this->Day0Breakage->FormValue != NULL && $this->Day0Breakage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0Breakage->caption(), $this->Day0Breakage->RequiredErrorMessage));
			}
		}
		if ($this->Day0Attempts->Required) {
			if (!$this->Day0Attempts->IsDetailKey && $this->Day0Attempts->FormValue != NULL && $this->Day0Attempts->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0Attempts->caption(), $this->Day0Attempts->RequiredErrorMessage));
			}
		}
		if ($this->Day0SPZMorpho->Required) {
			if (!$this->Day0SPZMorpho->IsDetailKey && $this->Day0SPZMorpho->FormValue != NULL && $this->Day0SPZMorpho->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0SPZMorpho->caption(), $this->Day0SPZMorpho->RequiredErrorMessage));
			}
		}
		if ($this->Day0SPZLocation->Required) {
			if (!$this->Day0SPZLocation->IsDetailKey && $this->Day0SPZLocation->FormValue != NULL && $this->Day0SPZLocation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0SPZLocation->caption(), $this->Day0SPZLocation->RequiredErrorMessage));
			}
		}
		if ($this->Day0SpOrgin->Required) {
			if (!$this->Day0SpOrgin->IsDetailKey && $this->Day0SpOrgin->FormValue != NULL && $this->Day0SpOrgin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day0SpOrgin->caption(), $this->Day0SpOrgin->RequiredErrorMessage));
			}
		}
		if ($this->Day5Cryoptop->Required) {
			if (!$this->Day5Cryoptop->IsDetailKey && $this->Day5Cryoptop->FormValue != NULL && $this->Day5Cryoptop->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5Cryoptop->caption(), $this->Day5Cryoptop->RequiredErrorMessage));
			}
		}
		if ($this->Day1Sperm->Required) {
			if (!$this->Day1Sperm->IsDetailKey && $this->Day1Sperm->FormValue != NULL && $this->Day1Sperm->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1Sperm->caption(), $this->Day1Sperm->RequiredErrorMessage));
			}
		}
		if ($this->Day1PN->Required) {
			if (!$this->Day1PN->IsDetailKey && $this->Day1PN->FormValue != NULL && $this->Day1PN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1PN->caption(), $this->Day1PN->RequiredErrorMessage));
			}
		}
		if ($this->Day1PB->Required) {
			if (!$this->Day1PB->IsDetailKey && $this->Day1PB->FormValue != NULL && $this->Day1PB->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1PB->caption(), $this->Day1PB->RequiredErrorMessage));
			}
		}
		if ($this->Day1Pronucleus->Required) {
			if (!$this->Day1Pronucleus->IsDetailKey && $this->Day1Pronucleus->FormValue != NULL && $this->Day1Pronucleus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1Pronucleus->caption(), $this->Day1Pronucleus->RequiredErrorMessage));
			}
		}
		if ($this->Day1Nucleolus->Required) {
			if (!$this->Day1Nucleolus->IsDetailKey && $this->Day1Nucleolus->FormValue != NULL && $this->Day1Nucleolus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1Nucleolus->caption(), $this->Day1Nucleolus->RequiredErrorMessage));
			}
		}
		if ($this->Day1Halo->Required) {
			if (!$this->Day1Halo->IsDetailKey && $this->Day1Halo->FormValue != NULL && $this->Day1Halo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1Halo->caption(), $this->Day1Halo->RequiredErrorMessage));
			}
		}
		if ($this->Day2SiNo->Required) {
			if (!$this->Day2SiNo->IsDetailKey && $this->Day2SiNo->FormValue != NULL && $this->Day2SiNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2SiNo->caption(), $this->Day2SiNo->RequiredErrorMessage));
			}
		}
		if ($this->Day2CellNo->Required) {
			if (!$this->Day2CellNo->IsDetailKey && $this->Day2CellNo->FormValue != NULL && $this->Day2CellNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2CellNo->caption(), $this->Day2CellNo->RequiredErrorMessage));
			}
		}
		if ($this->Day2Frag->Required) {
			if (!$this->Day2Frag->IsDetailKey && $this->Day2Frag->FormValue != NULL && $this->Day2Frag->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2Frag->caption(), $this->Day2Frag->RequiredErrorMessage));
			}
		}
		if ($this->Day2Symmetry->Required) {
			if (!$this->Day2Symmetry->IsDetailKey && $this->Day2Symmetry->FormValue != NULL && $this->Day2Symmetry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2Symmetry->caption(), $this->Day2Symmetry->RequiredErrorMessage));
			}
		}
		if ($this->Day2Cryoptop->Required) {
			if (!$this->Day2Cryoptop->IsDetailKey && $this->Day2Cryoptop->FormValue != NULL && $this->Day2Cryoptop->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2Cryoptop->caption(), $this->Day2Cryoptop->RequiredErrorMessage));
			}
		}
		if ($this->Day2Grade->Required) {
			if (!$this->Day2Grade->IsDetailKey && $this->Day2Grade->FormValue != NULL && $this->Day2Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2Grade->caption(), $this->Day2Grade->RequiredErrorMessage));
			}
		}
		if ($this->Day2End->Required) {
			if (!$this->Day2End->IsDetailKey && $this->Day2End->FormValue != NULL && $this->Day2End->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2End->caption(), $this->Day2End->RequiredErrorMessage));
			}
		}
		if ($this->Day3Sino->Required) {
			if (!$this->Day3Sino->IsDetailKey && $this->Day3Sino->FormValue != NULL && $this->Day3Sino->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3Sino->caption(), $this->Day3Sino->RequiredErrorMessage));
			}
		}
		if ($this->Day3CellNo->Required) {
			if (!$this->Day3CellNo->IsDetailKey && $this->Day3CellNo->FormValue != NULL && $this->Day3CellNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3CellNo->caption(), $this->Day3CellNo->RequiredErrorMessage));
			}
		}
		if ($this->Day3Frag->Required) {
			if (!$this->Day3Frag->IsDetailKey && $this->Day3Frag->FormValue != NULL && $this->Day3Frag->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3Frag->caption(), $this->Day3Frag->RequiredErrorMessage));
			}
		}
		if ($this->Day3Symmetry->Required) {
			if (!$this->Day3Symmetry->IsDetailKey && $this->Day3Symmetry->FormValue != NULL && $this->Day3Symmetry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3Symmetry->caption(), $this->Day3Symmetry->RequiredErrorMessage));
			}
		}
		if ($this->Day3ZP->Required) {
			if (!$this->Day3ZP->IsDetailKey && $this->Day3ZP->FormValue != NULL && $this->Day3ZP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3ZP->caption(), $this->Day3ZP->RequiredErrorMessage));
			}
		}
		if ($this->Day3Vacoules->Required) {
			if (!$this->Day3Vacoules->IsDetailKey && $this->Day3Vacoules->FormValue != NULL && $this->Day3Vacoules->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3Vacoules->caption(), $this->Day3Vacoules->RequiredErrorMessage));
			}
		}
		if ($this->Day3Grade->Required) {
			if (!$this->Day3Grade->IsDetailKey && $this->Day3Grade->FormValue != NULL && $this->Day3Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3Grade->caption(), $this->Day3Grade->RequiredErrorMessage));
			}
		}
		if ($this->Day3Cryoptop->Required) {
			if (!$this->Day3Cryoptop->IsDetailKey && $this->Day3Cryoptop->FormValue != NULL && $this->Day3Cryoptop->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3Cryoptop->caption(), $this->Day3Cryoptop->RequiredErrorMessage));
			}
		}
		if ($this->Day3End->Required) {
			if (!$this->Day3End->IsDetailKey && $this->Day3End->FormValue != NULL && $this->Day3End->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3End->caption(), $this->Day3End->RequiredErrorMessage));
			}
		}
		if ($this->Day4SiNo->Required) {
			if (!$this->Day4SiNo->IsDetailKey && $this->Day4SiNo->FormValue != NULL && $this->Day4SiNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4SiNo->caption(), $this->Day4SiNo->RequiredErrorMessage));
			}
		}
		if ($this->Day4CellNo->Required) {
			if (!$this->Day4CellNo->IsDetailKey && $this->Day4CellNo->FormValue != NULL && $this->Day4CellNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4CellNo->caption(), $this->Day4CellNo->RequiredErrorMessage));
			}
		}
		if ($this->Day4Frag->Required) {
			if (!$this->Day4Frag->IsDetailKey && $this->Day4Frag->FormValue != NULL && $this->Day4Frag->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4Frag->caption(), $this->Day4Frag->RequiredErrorMessage));
			}
		}
		if ($this->Day4Symmetry->Required) {
			if (!$this->Day4Symmetry->IsDetailKey && $this->Day4Symmetry->FormValue != NULL && $this->Day4Symmetry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4Symmetry->caption(), $this->Day4Symmetry->RequiredErrorMessage));
			}
		}
		if ($this->Day4Grade->Required) {
			if (!$this->Day4Grade->IsDetailKey && $this->Day4Grade->FormValue != NULL && $this->Day4Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4Grade->caption(), $this->Day4Grade->RequiredErrorMessage));
			}
		}
		if ($this->Day4Cryoptop->Required) {
			if (!$this->Day4Cryoptop->IsDetailKey && $this->Day4Cryoptop->FormValue != NULL && $this->Day4Cryoptop->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4Cryoptop->caption(), $this->Day4Cryoptop->RequiredErrorMessage));
			}
		}
		if ($this->Day4End->Required) {
			if (!$this->Day4End->IsDetailKey && $this->Day4End->FormValue != NULL && $this->Day4End->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4End->caption(), $this->Day4End->RequiredErrorMessage));
			}
		}
		if ($this->Day5CellNo->Required) {
			if (!$this->Day5CellNo->IsDetailKey && $this->Day5CellNo->FormValue != NULL && $this->Day5CellNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5CellNo->caption(), $this->Day5CellNo->RequiredErrorMessage));
			}
		}
		if ($this->Day5ICM->Required) {
			if (!$this->Day5ICM->IsDetailKey && $this->Day5ICM->FormValue != NULL && $this->Day5ICM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5ICM->caption(), $this->Day5ICM->RequiredErrorMessage));
			}
		}
		if ($this->Day5TE->Required) {
			if (!$this->Day5TE->IsDetailKey && $this->Day5TE->FormValue != NULL && $this->Day5TE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5TE->caption(), $this->Day5TE->RequiredErrorMessage));
			}
		}
		if ($this->Day5Observation->Required) {
			if (!$this->Day5Observation->IsDetailKey && $this->Day5Observation->FormValue != NULL && $this->Day5Observation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5Observation->caption(), $this->Day5Observation->RequiredErrorMessage));
			}
		}
		if ($this->Day5Collapsed->Required) {
			if (!$this->Day5Collapsed->IsDetailKey && $this->Day5Collapsed->FormValue != NULL && $this->Day5Collapsed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5Collapsed->caption(), $this->Day5Collapsed->RequiredErrorMessage));
			}
		}
		if ($this->Day5Vacoulles->Required) {
			if (!$this->Day5Vacoulles->IsDetailKey && $this->Day5Vacoulles->FormValue != NULL && $this->Day5Vacoulles->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5Vacoulles->caption(), $this->Day5Vacoulles->RequiredErrorMessage));
			}
		}
		if ($this->Day5Grade->Required) {
			if (!$this->Day5Grade->IsDetailKey && $this->Day5Grade->FormValue != NULL && $this->Day5Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5Grade->caption(), $this->Day5Grade->RequiredErrorMessage));
			}
		}
		if ($this->Day6CellNo->Required) {
			if (!$this->Day6CellNo->IsDetailKey && $this->Day6CellNo->FormValue != NULL && $this->Day6CellNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6CellNo->caption(), $this->Day6CellNo->RequiredErrorMessage));
			}
		}
		if ($this->Day6ICM->Required) {
			if (!$this->Day6ICM->IsDetailKey && $this->Day6ICM->FormValue != NULL && $this->Day6ICM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6ICM->caption(), $this->Day6ICM->RequiredErrorMessage));
			}
		}
		if ($this->Day6TE->Required) {
			if (!$this->Day6TE->IsDetailKey && $this->Day6TE->FormValue != NULL && $this->Day6TE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6TE->caption(), $this->Day6TE->RequiredErrorMessage));
			}
		}
		if ($this->Day6Observation->Required) {
			if (!$this->Day6Observation->IsDetailKey && $this->Day6Observation->FormValue != NULL && $this->Day6Observation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6Observation->caption(), $this->Day6Observation->RequiredErrorMessage));
			}
		}
		if ($this->Day6Collapsed->Required) {
			if (!$this->Day6Collapsed->IsDetailKey && $this->Day6Collapsed->FormValue != NULL && $this->Day6Collapsed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6Collapsed->caption(), $this->Day6Collapsed->RequiredErrorMessage));
			}
		}
		if ($this->Day6Vacoulles->Required) {
			if (!$this->Day6Vacoulles->IsDetailKey && $this->Day6Vacoulles->FormValue != NULL && $this->Day6Vacoulles->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6Vacoulles->caption(), $this->Day6Vacoulles->RequiredErrorMessage));
			}
		}
		if ($this->Day6Grade->Required) {
			if (!$this->Day6Grade->IsDetailKey && $this->Day6Grade->FormValue != NULL && $this->Day6Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6Grade->caption(), $this->Day6Grade->RequiredErrorMessage));
			}
		}
		if ($this->Day6Cryoptop->Required) {
			if (!$this->Day6Cryoptop->IsDetailKey && $this->Day6Cryoptop->FormValue != NULL && $this->Day6Cryoptop->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day6Cryoptop->caption(), $this->Day6Cryoptop->RequiredErrorMessage));
			}
		}
		if ($this->EndSiNo->Required) {
			if (!$this->EndSiNo->IsDetailKey && $this->EndSiNo->FormValue != NULL && $this->EndSiNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndSiNo->caption(), $this->EndSiNo->RequiredErrorMessage));
			}
		}
		if ($this->EndingDay->Required) {
			if (!$this->EndingDay->IsDetailKey && $this->EndingDay->FormValue != NULL && $this->EndingDay->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndingDay->caption(), $this->EndingDay->RequiredErrorMessage));
			}
		}
		if ($this->EndingCellStage->Required) {
			if (!$this->EndingCellStage->IsDetailKey && $this->EndingCellStage->FormValue != NULL && $this->EndingCellStage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndingCellStage->caption(), $this->EndingCellStage->RequiredErrorMessage));
			}
		}
		if ($this->EndingGrade->Required) {
			if (!$this->EndingGrade->IsDetailKey && $this->EndingGrade->FormValue != NULL && $this->EndingGrade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndingGrade->caption(), $this->EndingGrade->RequiredErrorMessage));
			}
		}
		if ($this->EndingState->Required) {
			if (!$this->EndingState->IsDetailKey && $this->EndingState->FormValue != NULL && $this->EndingState->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndingState->caption(), $this->EndingState->RequiredErrorMessage));
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
		if ($this->DidNO->Required) {
			if (!$this->DidNO->IsDetailKey && $this->DidNO->FormValue != NULL && $this->DidNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DidNO->caption(), $this->DidNO->RequiredErrorMessage));
			}
		}
		if ($this->ICSiIVFDateTime->Required) {
			if (!$this->ICSiIVFDateTime->IsDetailKey && $this->ICSiIVFDateTime->FormValue != NULL && $this->ICSiIVFDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSiIVFDateTime->caption(), $this->ICSiIVFDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ICSiIVFDateTime->FormValue)) {
			AddMessage($FormError, $this->ICSiIVFDateTime->errorMessage());
		}
		if ($this->PrimaryEmbrologist->Required) {
			if (!$this->PrimaryEmbrologist->IsDetailKey && $this->PrimaryEmbrologist->FormValue != NULL && $this->PrimaryEmbrologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrimaryEmbrologist->caption(), $this->PrimaryEmbrologist->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryEmbrologist->Required) {
			if (!$this->SecondaryEmbrologist->IsDetailKey && $this->SecondaryEmbrologist->FormValue != NULL && $this->SecondaryEmbrologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryEmbrologist->caption(), $this->SecondaryEmbrologist->RequiredErrorMessage));
			}
		}
		if ($this->Incubator->Required) {
			if (!$this->Incubator->IsDetailKey && $this->Incubator->FormValue != NULL && $this->Incubator->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
			}
		}
		if ($this->location->Required) {
			if (!$this->location->IsDetailKey && $this->location->FormValue != NULL && $this->location->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->location->caption(), $this->location->RequiredErrorMessage));
			}
		}
		if ($this->OocyteNo->Required) {
			if (!$this->OocyteNo->IsDetailKey && $this->OocyteNo->FormValue != NULL && $this->OocyteNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocyteNo->caption(), $this->OocyteNo->RequiredErrorMessage));
			}
		}
		if ($this->Stage->Required) {
			if (!$this->Stage->IsDetailKey && $this->Stage->FormValue != NULL && $this->Stage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->vitrificationDate->Required) {
			if (!$this->vitrificationDate->IsDetailKey && $this->vitrificationDate->FormValue != NULL && $this->vitrificationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitrificationDate->caption(), $this->vitrificationDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->vitrificationDate->FormValue)) {
			AddMessage($FormError, $this->vitrificationDate->errorMessage());
		}
		if ($this->vitriPrimaryEmbryologist->Required) {
			if (!$this->vitriPrimaryEmbryologist->IsDetailKey && $this->vitriPrimaryEmbryologist->FormValue != NULL && $this->vitriPrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriPrimaryEmbryologist->caption(), $this->vitriPrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->vitriSecondaryEmbryologist->Required) {
			if (!$this->vitriSecondaryEmbryologist->IsDetailKey && $this->vitriSecondaryEmbryologist->FormValue != NULL && $this->vitriSecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriSecondaryEmbryologist->caption(), $this->vitriSecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->vitriEmbryoNo->Required) {
			if (!$this->vitriEmbryoNo->IsDetailKey && $this->vitriEmbryoNo->FormValue != NULL && $this->vitriEmbryoNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriEmbryoNo->caption(), $this->vitriEmbryoNo->RequiredErrorMessage));
			}
		}
		if ($this->thawReFrozen->Required) {
			if ($this->thawReFrozen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawReFrozen->caption(), $this->thawReFrozen->RequiredErrorMessage));
			}
		}
		if ($this->vitriFertilisationDate->Required) {
			if (!$this->vitriFertilisationDate->IsDetailKey && $this->vitriFertilisationDate->FormValue != NULL && $this->vitriFertilisationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriFertilisationDate->caption(), $this->vitriFertilisationDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->vitriFertilisationDate->FormValue)) {
			AddMessage($FormError, $this->vitriFertilisationDate->errorMessage());
		}
		if ($this->vitriDay->Required) {
			if (!$this->vitriDay->IsDetailKey && $this->vitriDay->FormValue != NULL && $this->vitriDay->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriDay->caption(), $this->vitriDay->RequiredErrorMessage));
			}
		}
		if ($this->vitriStage->Required) {
			if (!$this->vitriStage->IsDetailKey && $this->vitriStage->FormValue != NULL && $this->vitriStage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriStage->caption(), $this->vitriStage->RequiredErrorMessage));
			}
		}
		if ($this->vitriGrade->Required) {
			if (!$this->vitriGrade->IsDetailKey && $this->vitriGrade->FormValue != NULL && $this->vitriGrade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriGrade->caption(), $this->vitriGrade->RequiredErrorMessage));
			}
		}
		if ($this->vitriIncubator->Required) {
			if (!$this->vitriIncubator->IsDetailKey && $this->vitriIncubator->FormValue != NULL && $this->vitriIncubator->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriIncubator->caption(), $this->vitriIncubator->RequiredErrorMessage));
			}
		}
		if ($this->vitriTank->Required) {
			if (!$this->vitriTank->IsDetailKey && $this->vitriTank->FormValue != NULL && $this->vitriTank->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriTank->caption(), $this->vitriTank->RequiredErrorMessage));
			}
		}
		if ($this->vitriCanister->Required) {
			if (!$this->vitriCanister->IsDetailKey && $this->vitriCanister->FormValue != NULL && $this->vitriCanister->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriCanister->caption(), $this->vitriCanister->RequiredErrorMessage));
			}
		}
		if ($this->vitriGobiet->Required) {
			if (!$this->vitriGobiet->IsDetailKey && $this->vitriGobiet->FormValue != NULL && $this->vitriGobiet->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriGobiet->caption(), $this->vitriGobiet->RequiredErrorMessage));
			}
		}
		if ($this->vitriViscotube->Required) {
			if (!$this->vitriViscotube->IsDetailKey && $this->vitriViscotube->FormValue != NULL && $this->vitriViscotube->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriViscotube->caption(), $this->vitriViscotube->RequiredErrorMessage));
			}
		}
		if ($this->vitriCryolockNo->Required) {
			if (!$this->vitriCryolockNo->IsDetailKey && $this->vitriCryolockNo->FormValue != NULL && $this->vitriCryolockNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriCryolockNo->caption(), $this->vitriCryolockNo->RequiredErrorMessage));
			}
		}
		if ($this->vitriCryolockColour->Required) {
			if (!$this->vitriCryolockColour->IsDetailKey && $this->vitriCryolockColour->FormValue != NULL && $this->vitriCryolockColour->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitriCryolockColour->caption(), $this->vitriCryolockColour->RequiredErrorMessage));
			}
		}
		if ($this->thawDate->Required) {
			if (!$this->thawDate->IsDetailKey && $this->thawDate->FormValue != NULL && $this->thawDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawDate->caption(), $this->thawDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->thawDate->FormValue)) {
			AddMessage($FormError, $this->thawDate->errorMessage());
		}
		if ($this->thawPrimaryEmbryologist->Required) {
			if (!$this->thawPrimaryEmbryologist->IsDetailKey && $this->thawPrimaryEmbryologist->FormValue != NULL && $this->thawPrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawPrimaryEmbryologist->caption(), $this->thawPrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->thawSecondaryEmbryologist->Required) {
			if (!$this->thawSecondaryEmbryologist->IsDetailKey && $this->thawSecondaryEmbryologist->FormValue != NULL && $this->thawSecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawSecondaryEmbryologist->caption(), $this->thawSecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->thawET->Required) {
			if (!$this->thawET->IsDetailKey && $this->thawET->FormValue != NULL && $this->thawET->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawET->caption(), $this->thawET->RequiredErrorMessage));
			}
		}
		if ($this->thawAbserve->Required) {
			if (!$this->thawAbserve->IsDetailKey && $this->thawAbserve->FormValue != NULL && $this->thawAbserve->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawAbserve->caption(), $this->thawAbserve->RequiredErrorMessage));
			}
		}
		if ($this->thawDiscard->Required) {
			if (!$this->thawDiscard->IsDetailKey && $this->thawDiscard->FormValue != NULL && $this->thawDiscard->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawDiscard->caption(), $this->thawDiscard->RequiredErrorMessage));
			}
		}
		if ($this->ETCatheter->Required) {
			if (!$this->ETCatheter->IsDetailKey && $this->ETCatheter->FormValue != NULL && $this->ETCatheter->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETCatheter->caption(), $this->ETCatheter->RequiredErrorMessage));
			}
		}
		if ($this->ETDifficulty->Required) {
			if (!$this->ETDifficulty->IsDetailKey && $this->ETDifficulty->FormValue != NULL && $this->ETDifficulty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETDifficulty->caption(), $this->ETDifficulty->RequiredErrorMessage));
			}
		}
		if ($this->ETEasy->Required) {
			if ($this->ETEasy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETEasy->caption(), $this->ETEasy->RequiredErrorMessage));
			}
		}
		if ($this->ETComments->Required) {
			if (!$this->ETComments->IsDetailKey && $this->ETComments->FormValue != NULL && $this->ETComments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETComments->caption(), $this->ETComments->RequiredErrorMessage));
			}
		}
		if ($this->ETDoctor->Required) {
			if (!$this->ETDoctor->IsDetailKey && $this->ETDoctor->FormValue != NULL && $this->ETDoctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETDoctor->caption(), $this->ETDoctor->RequiredErrorMessage));
			}
		}
		if ($this->ETEmbryologist->Required) {
			if (!$this->ETEmbryologist->IsDetailKey && $this->ETEmbryologist->FormValue != NULL && $this->ETEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETEmbryologist->caption(), $this->ETEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->ETDate->Required) {
			if (!$this->ETDate->IsDetailKey && $this->ETDate->FormValue != NULL && $this->ETDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETDate->caption(), $this->ETDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ETDate->FormValue)) {
			AddMessage($FormError, $this->ETDate->errorMessage());
		}
		if ($this->Day1End->Required) {
			if (!$this->Day1End->IsDetailKey && $this->Day1End->FormValue != NULL && $this->Day1End->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1End->caption(), $this->Day1End->RequiredErrorMessage));
			}
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// RIDNo
		$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// ARTCycle
		$this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, NULL, FALSE);

		// SpermOrigin
		$this->SpermOrigin->setDbValueDef($rsnew, $this->SpermOrigin->CurrentValue, NULL, FALSE);

		// InseminatinTechnique
		$this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, NULL, FALSE);

		// IndicationForART
		$this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, NULL, FALSE);

		// Day0sino
		$this->Day0sino->setDbValueDef($rsnew, $this->Day0sino->CurrentValue, NULL, FALSE);

		// Day0OocyteStage
		$this->Day0OocyteStage->setDbValueDef($rsnew, $this->Day0OocyteStage->CurrentValue, NULL, FALSE);

		// Day0PolarBodyPosition
		$this->Day0PolarBodyPosition->setDbValueDef($rsnew, $this->Day0PolarBodyPosition->CurrentValue, NULL, FALSE);

		// Day0Breakage
		$this->Day0Breakage->setDbValueDef($rsnew, $this->Day0Breakage->CurrentValue, NULL, FALSE);

		// Day0Attempts
		$this->Day0Attempts->setDbValueDef($rsnew, $this->Day0Attempts->CurrentValue, NULL, FALSE);

		// Day0SPZMorpho
		$this->Day0SPZMorpho->setDbValueDef($rsnew, $this->Day0SPZMorpho->CurrentValue, NULL, FALSE);

		// Day0SPZLocation
		$this->Day0SPZLocation->setDbValueDef($rsnew, $this->Day0SPZLocation->CurrentValue, NULL, FALSE);

		// Day0SpOrgin
		$this->Day0SpOrgin->setDbValueDef($rsnew, $this->Day0SpOrgin->CurrentValue, NULL, FALSE);

		// Day5Cryoptop
		$this->Day5Cryoptop->setDbValueDef($rsnew, $this->Day5Cryoptop->CurrentValue, NULL, FALSE);

		// Day1Sperm
		$this->Day1Sperm->setDbValueDef($rsnew, $this->Day1Sperm->CurrentValue, NULL, FALSE);

		// Day1PN
		$this->Day1PN->setDbValueDef($rsnew, $this->Day1PN->CurrentValue, NULL, FALSE);

		// Day1PB
		$this->Day1PB->setDbValueDef($rsnew, $this->Day1PB->CurrentValue, NULL, FALSE);

		// Day1Pronucleus
		$this->Day1Pronucleus->setDbValueDef($rsnew, $this->Day1Pronucleus->CurrentValue, NULL, FALSE);

		// Day1Nucleolus
		$this->Day1Nucleolus->setDbValueDef($rsnew, $this->Day1Nucleolus->CurrentValue, NULL, FALSE);

		// Day1Halo
		$this->Day1Halo->setDbValueDef($rsnew, $this->Day1Halo->CurrentValue, NULL, FALSE);

		// Day2SiNo
		$this->Day2SiNo->setDbValueDef($rsnew, $this->Day2SiNo->CurrentValue, NULL, FALSE);

		// Day2CellNo
		$this->Day2CellNo->setDbValueDef($rsnew, $this->Day2CellNo->CurrentValue, NULL, FALSE);

		// Day2Frag
		$this->Day2Frag->setDbValueDef($rsnew, $this->Day2Frag->CurrentValue, NULL, FALSE);

		// Day2Symmetry
		$this->Day2Symmetry->setDbValueDef($rsnew, $this->Day2Symmetry->CurrentValue, NULL, FALSE);

		// Day2Cryoptop
		$this->Day2Cryoptop->setDbValueDef($rsnew, $this->Day2Cryoptop->CurrentValue, NULL, FALSE);

		// Day2Grade
		$this->Day2Grade->setDbValueDef($rsnew, $this->Day2Grade->CurrentValue, NULL, FALSE);

		// Day2End
		$this->Day2End->setDbValueDef($rsnew, $this->Day2End->CurrentValue, NULL, FALSE);

		// Day3Sino
		$this->Day3Sino->setDbValueDef($rsnew, $this->Day3Sino->CurrentValue, NULL, FALSE);

		// Day3CellNo
		$this->Day3CellNo->setDbValueDef($rsnew, $this->Day3CellNo->CurrentValue, NULL, FALSE);

		// Day3Frag
		$this->Day3Frag->setDbValueDef($rsnew, $this->Day3Frag->CurrentValue, NULL, FALSE);

		// Day3Symmetry
		$this->Day3Symmetry->setDbValueDef($rsnew, $this->Day3Symmetry->CurrentValue, NULL, FALSE);

		// Day3ZP
		$this->Day3ZP->setDbValueDef($rsnew, $this->Day3ZP->CurrentValue, NULL, FALSE);

		// Day3Vacoules
		$this->Day3Vacoules->setDbValueDef($rsnew, $this->Day3Vacoules->CurrentValue, NULL, FALSE);

		// Day3Grade
		$this->Day3Grade->setDbValueDef($rsnew, $this->Day3Grade->CurrentValue, NULL, FALSE);

		// Day3Cryoptop
		$this->Day3Cryoptop->setDbValueDef($rsnew, $this->Day3Cryoptop->CurrentValue, NULL, FALSE);

		// Day3End
		$this->Day3End->setDbValueDef($rsnew, $this->Day3End->CurrentValue, NULL, FALSE);

		// Day4SiNo
		$this->Day4SiNo->setDbValueDef($rsnew, $this->Day4SiNo->CurrentValue, NULL, FALSE);

		// Day4CellNo
		$this->Day4CellNo->setDbValueDef($rsnew, $this->Day4CellNo->CurrentValue, NULL, FALSE);

		// Day4Frag
		$this->Day4Frag->setDbValueDef($rsnew, $this->Day4Frag->CurrentValue, NULL, FALSE);

		// Day4Symmetry
		$this->Day4Symmetry->setDbValueDef($rsnew, $this->Day4Symmetry->CurrentValue, NULL, FALSE);

		// Day4Grade
		$this->Day4Grade->setDbValueDef($rsnew, $this->Day4Grade->CurrentValue, NULL, FALSE);

		// Day4Cryoptop
		$this->Day4Cryoptop->setDbValueDef($rsnew, $this->Day4Cryoptop->CurrentValue, NULL, FALSE);

		// Day4End
		$this->Day4End->setDbValueDef($rsnew, $this->Day4End->CurrentValue, NULL, FALSE);

		// Day5CellNo
		$this->Day5CellNo->setDbValueDef($rsnew, $this->Day5CellNo->CurrentValue, NULL, FALSE);

		// Day5ICM
		$this->Day5ICM->setDbValueDef($rsnew, $this->Day5ICM->CurrentValue, NULL, FALSE);

		// Day5TE
		$this->Day5TE->setDbValueDef($rsnew, $this->Day5TE->CurrentValue, NULL, FALSE);

		// Day5Observation
		$this->Day5Observation->setDbValueDef($rsnew, $this->Day5Observation->CurrentValue, NULL, FALSE);

		// Day5Collapsed
		$this->Day5Collapsed->setDbValueDef($rsnew, $this->Day5Collapsed->CurrentValue, NULL, FALSE);

		// Day5Vacoulles
		$this->Day5Vacoulles->setDbValueDef($rsnew, $this->Day5Vacoulles->CurrentValue, NULL, FALSE);

		// Day5Grade
		$this->Day5Grade->setDbValueDef($rsnew, $this->Day5Grade->CurrentValue, NULL, FALSE);

		// Day6CellNo
		$this->Day6CellNo->setDbValueDef($rsnew, $this->Day6CellNo->CurrentValue, NULL, FALSE);

		// Day6ICM
		$this->Day6ICM->setDbValueDef($rsnew, $this->Day6ICM->CurrentValue, NULL, FALSE);

		// Day6TE
		$this->Day6TE->setDbValueDef($rsnew, $this->Day6TE->CurrentValue, NULL, FALSE);

		// Day6Observation
		$this->Day6Observation->setDbValueDef($rsnew, $this->Day6Observation->CurrentValue, NULL, FALSE);

		// Day6Collapsed
		$this->Day6Collapsed->setDbValueDef($rsnew, $this->Day6Collapsed->CurrentValue, NULL, FALSE);

		// Day6Vacoulles
		$this->Day6Vacoulles->setDbValueDef($rsnew, $this->Day6Vacoulles->CurrentValue, NULL, FALSE);

		// Day6Grade
		$this->Day6Grade->setDbValueDef($rsnew, $this->Day6Grade->CurrentValue, NULL, FALSE);

		// Day6Cryoptop
		$this->Day6Cryoptop->setDbValueDef($rsnew, $this->Day6Cryoptop->CurrentValue, NULL, FALSE);

		// EndSiNo
		$this->EndSiNo->setDbValueDef($rsnew, $this->EndSiNo->CurrentValue, NULL, FALSE);

		// EndingDay
		$this->EndingDay->setDbValueDef($rsnew, $this->EndingDay->CurrentValue, NULL, FALSE);

		// EndingCellStage
		$this->EndingCellStage->setDbValueDef($rsnew, $this->EndingCellStage->CurrentValue, NULL, FALSE);

		// EndingGrade
		$this->EndingGrade->setDbValueDef($rsnew, $this->EndingGrade->CurrentValue, NULL, FALSE);

		// EndingState
		$this->EndingState->setDbValueDef($rsnew, $this->EndingState->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// DidNO
		$this->DidNO->setDbValueDef($rsnew, $this->DidNO->CurrentValue, NULL, FALSE);

		// ICSiIVFDateTime
		$this->ICSiIVFDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0), NULL, FALSE);

		// PrimaryEmbrologist
		$this->PrimaryEmbrologist->setDbValueDef($rsnew, $this->PrimaryEmbrologist->CurrentValue, NULL, FALSE);

		// SecondaryEmbrologist
		$this->SecondaryEmbrologist->setDbValueDef($rsnew, $this->SecondaryEmbrologist->CurrentValue, NULL, FALSE);

		// Incubator
		$this->Incubator->setDbValueDef($rsnew, $this->Incubator->CurrentValue, NULL, FALSE);

		// location
		$this->location->setDbValueDef($rsnew, $this->location->CurrentValue, NULL, FALSE);

		// OocyteNo
		$this->OocyteNo->setDbValueDef($rsnew, $this->OocyteNo->CurrentValue, NULL, FALSE);

		// Stage
		$this->Stage->setDbValueDef($rsnew, $this->Stage->CurrentValue, NULL, FALSE);

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// vitrificationDate
		$this->vitrificationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitrificationDate->CurrentValue, 0), NULL, FALSE);

		// vitriPrimaryEmbryologist
		$this->vitriPrimaryEmbryologist->setDbValueDef($rsnew, $this->vitriPrimaryEmbryologist->CurrentValue, NULL, FALSE);

		// vitriSecondaryEmbryologist
		$this->vitriSecondaryEmbryologist->setDbValueDef($rsnew, $this->vitriSecondaryEmbryologist->CurrentValue, NULL, FALSE);

		// vitriEmbryoNo
		$this->vitriEmbryoNo->setDbValueDef($rsnew, $this->vitriEmbryoNo->CurrentValue, NULL, FALSE);

		// thawReFrozen
		$this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, NULL, FALSE);

		// vitriFertilisationDate
		$this->vitriFertilisationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0), NULL, FALSE);

		// vitriDay
		$this->vitriDay->setDbValueDef($rsnew, $this->vitriDay->CurrentValue, NULL, FALSE);

		// vitriStage
		$this->vitriStage->setDbValueDef($rsnew, $this->vitriStage->CurrentValue, NULL, FALSE);

		// vitriGrade
		$this->vitriGrade->setDbValueDef($rsnew, $this->vitriGrade->CurrentValue, NULL, FALSE);

		// vitriIncubator
		$this->vitriIncubator->setDbValueDef($rsnew, $this->vitriIncubator->CurrentValue, NULL, FALSE);

		// vitriTank
		$this->vitriTank->setDbValueDef($rsnew, $this->vitriTank->CurrentValue, NULL, FALSE);

		// vitriCanister
		$this->vitriCanister->setDbValueDef($rsnew, $this->vitriCanister->CurrentValue, NULL, FALSE);

		// vitriGobiet
		$this->vitriGobiet->setDbValueDef($rsnew, $this->vitriGobiet->CurrentValue, NULL, FALSE);

		// vitriViscotube
		$this->vitriViscotube->setDbValueDef($rsnew, $this->vitriViscotube->CurrentValue, NULL, FALSE);

		// vitriCryolockNo
		$this->vitriCryolockNo->setDbValueDef($rsnew, $this->vitriCryolockNo->CurrentValue, NULL, FALSE);

		// vitriCryolockColour
		$this->vitriCryolockColour->setDbValueDef($rsnew, $this->vitriCryolockColour->CurrentValue, NULL, FALSE);

		// thawDate
		$this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), NULL, FALSE);

		// thawPrimaryEmbryologist
		$this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, NULL, FALSE);

		// thawSecondaryEmbryologist
		$this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, NULL, FALSE);

		// thawET
		$this->thawET->setDbValueDef($rsnew, $this->thawET->CurrentValue, NULL, FALSE);

		// thawAbserve
		$this->thawAbserve->setDbValueDef($rsnew, $this->thawAbserve->CurrentValue, NULL, FALSE);

		// thawDiscard
		$this->thawDiscard->setDbValueDef($rsnew, $this->thawDiscard->CurrentValue, NULL, FALSE);

		// ETCatheter
		$this->ETCatheter->setDbValueDef($rsnew, $this->ETCatheter->CurrentValue, NULL, FALSE);

		// ETDifficulty
		$this->ETDifficulty->setDbValueDef($rsnew, $this->ETDifficulty->CurrentValue, NULL, FALSE);

		// ETEasy
		$this->ETEasy->setDbValueDef($rsnew, $this->ETEasy->CurrentValue, NULL, FALSE);

		// ETComments
		$this->ETComments->setDbValueDef($rsnew, $this->ETComments->CurrentValue, NULL, FALSE);

		// ETDoctor
		$this->ETDoctor->setDbValueDef($rsnew, $this->ETDoctor->CurrentValue, NULL, FALSE);

		// ETEmbryologist
		$this->ETEmbryologist->setDbValueDef($rsnew, $this->ETEmbryologist->CurrentValue, NULL, FALSE);

		// ETDate
		$this->ETDate->setDbValueDef($rsnew, UnFormatDateTime($this->ETDate->CurrentValue, 0), NULL, FALSE);

		// Day1End
		$this->Day1End->setDbValueDef($rsnew, $this->Day1End->CurrentValue, NULL, FALSE);

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
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
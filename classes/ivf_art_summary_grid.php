<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_art_summary_grid extends ivf_art_summary
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_art_summary';

	// Page object name
	public $PageObjName = "ivf_art_summary_grid";

	// Grid form hidden field names
	public $FormName = "fivf_art_summarygrid";
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

		// Table object (ivf_art_summary)
		if (!isset($GLOBALS["ivf_art_summary"]) || get_class($GLOBALS["ivf_art_summary"]) == PROJECT_NAMESPACE . "ivf_art_summary") {
			$GLOBALS["ivf_art_summary"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["ivf_art_summary"];

		}
		$this->AddUrl = "ivf_art_summaryadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_art_summary');

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
		global $EXPORT, $ivf_art_summary;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_art_summary);
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
		$this->ARTCycle->setVisibility();
		$this->Spermorigin->setVisibility();
		$this->IndicationforART->setVisibility();
		$this->DateofICSI->setVisibility();
		$this->Origin->setVisibility();
		$this->Status->setVisibility();
		$this->Method->setVisibility();
		$this->pre_Concentration->setVisibility();
		$this->pre_Motility->setVisibility();
		$this->pre_Morphology->setVisibility();
		$this->post_Concentration->setVisibility();
		$this->post_Motility->setVisibility();
		$this->post_Morphology->setVisibility();
		$this->NumberofEmbryostransferred->setVisibility();
		$this->Embryosunderobservation->setVisibility();
		$this->EmbryoDevelopmentSummary->setVisibility();
		$this->EmbryologistSignature->setVisibility();
		$this->IVFRegistrationID->setVisibility();
		$this->InseminatinTechnique->setVisibility();
		$this->ICSIDetails->setVisibility();
		$this->DateofET->setVisibility();
		$this->Reasonfornotranfer->setVisibility();
		$this->EmbryosCryopreserved->setVisibility();
		$this->LegendCellStage->setVisibility();
		$this->ConsultantsSignature->setVisibility();
		$this->Name->setVisibility();
		$this->M2->setVisibility();
		$this->Mi2->setVisibility();
		$this->ICSI->setVisibility();
		$this->IVF->setVisibility();
		$this->M1->setVisibility();
		$this->GV->setVisibility();
		$this->Others->setVisibility();
		$this->Normal2PN->setVisibility();
		$this->Abnormalfertilisation1N->setVisibility();
		$this->Abnormalfertilisation3N->setVisibility();
		$this->NotFertilized->setVisibility();
		$this->Degenerated->setVisibility();
		$this->SpermDate->setVisibility();
		$this->Code1->setVisibility();
		$this->Day1->setVisibility();
		$this->CellStage1->setVisibility();
		$this->Grade1->setVisibility();
		$this->State1->setVisibility();
		$this->Code2->setVisibility();
		$this->Day2->setVisibility();
		$this->CellStage2->setVisibility();
		$this->Grade2->setVisibility();
		$this->State2->setVisibility();
		$this->Code3->setVisibility();
		$this->Day3->setVisibility();
		$this->CellStage3->setVisibility();
		$this->Grade3->setVisibility();
		$this->State3->setVisibility();
		$this->Code4->setVisibility();
		$this->Day4->setVisibility();
		$this->CellStage4->setVisibility();
		$this->Grade4->setVisibility();
		$this->State4->setVisibility();
		$this->Code5->setVisibility();
		$this->Day5->setVisibility();
		$this->CellStage5->setVisibility();
		$this->Grade5->setVisibility();
		$this->State5->setVisibility();
		$this->TidNo->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Volume->setVisibility();
		$this->Volume1->setVisibility();
		$this->Volume2->setVisibility();
		$this->Concentration2->setVisibility();
		$this->Total->setVisibility();
		$this->Total1->setVisibility();
		$this->Total2->setVisibility();
		$this->Progressive->setVisibility();
		$this->Progressive1->setVisibility();
		$this->Progressive2->setVisibility();
		$this->NotProgressive->setVisibility();
		$this->NotProgressive1->setVisibility();
		$this->NotProgressive2->setVisibility();
		$this->Motility2->setVisibility();
		$this->Morphology2->setVisibility();
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
		$this->setupLookupOptions($this->ConsultantsSignature);

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
		if ($CurrentForm->hasValue("x_ARTCycle") && $CurrentForm->hasValue("o_ARTCycle") && $this->ARTCycle->CurrentValue <> $this->ARTCycle->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Spermorigin") && $CurrentForm->hasValue("o_Spermorigin") && $this->Spermorigin->CurrentValue <> $this->Spermorigin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IndicationforART") && $CurrentForm->hasValue("o_IndicationforART") && $this->IndicationforART->CurrentValue <> $this->IndicationforART->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateofICSI") && $CurrentForm->hasValue("o_DateofICSI") && $this->DateofICSI->CurrentValue <> $this->DateofICSI->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Origin") && $CurrentForm->hasValue("o_Origin") && $this->Origin->CurrentValue <> $this->Origin->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue <> $this->Status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Method") && $CurrentForm->hasValue("o_Method") && $this->Method->CurrentValue <> $this->Method->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_pre_Concentration") && $CurrentForm->hasValue("o_pre_Concentration") && $this->pre_Concentration->CurrentValue <> $this->pre_Concentration->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_pre_Motility") && $CurrentForm->hasValue("o_pre_Motility") && $this->pre_Motility->CurrentValue <> $this->pre_Motility->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_pre_Morphology") && $CurrentForm->hasValue("o_pre_Morphology") && $this->pre_Morphology->CurrentValue <> $this->pre_Morphology->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_post_Concentration") && $CurrentForm->hasValue("o_post_Concentration") && $this->post_Concentration->CurrentValue <> $this->post_Concentration->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_post_Motility") && $CurrentForm->hasValue("o_post_Motility") && $this->post_Motility->CurrentValue <> $this->post_Motility->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_post_Morphology") && $CurrentForm->hasValue("o_post_Morphology") && $this->post_Morphology->CurrentValue <> $this->post_Morphology->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NumberofEmbryostransferred") && $CurrentForm->hasValue("o_NumberofEmbryostransferred") && $this->NumberofEmbryostransferred->CurrentValue <> $this->NumberofEmbryostransferred->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Embryosunderobservation") && $CurrentForm->hasValue("o_Embryosunderobservation") && $this->Embryosunderobservation->CurrentValue <> $this->Embryosunderobservation->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EmbryoDevelopmentSummary") && $CurrentForm->hasValue("o_EmbryoDevelopmentSummary") && $this->EmbryoDevelopmentSummary->CurrentValue <> $this->EmbryoDevelopmentSummary->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EmbryologistSignature") && $CurrentForm->hasValue("o_EmbryologistSignature") && $this->EmbryologistSignature->CurrentValue <> $this->EmbryologistSignature->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IVFRegistrationID") && $CurrentForm->hasValue("o_IVFRegistrationID") && $this->IVFRegistrationID->CurrentValue <> $this->IVFRegistrationID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_InseminatinTechnique") && $CurrentForm->hasValue("o_InseminatinTechnique") && $this->InseminatinTechnique->CurrentValue <> $this->InseminatinTechnique->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ICSIDetails") && $CurrentForm->hasValue("o_ICSIDetails") && $this->ICSIDetails->CurrentValue <> $this->ICSIDetails->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DateofET") && $CurrentForm->hasValue("o_DateofET") && $this->DateofET->CurrentValue <> $this->DateofET->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Reasonfornotranfer") && $CurrentForm->hasValue("o_Reasonfornotranfer") && $this->Reasonfornotranfer->CurrentValue <> $this->Reasonfornotranfer->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EmbryosCryopreserved") && $CurrentForm->hasValue("o_EmbryosCryopreserved") && $this->EmbryosCryopreserved->CurrentValue <> $this->EmbryosCryopreserved->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LegendCellStage") && $CurrentForm->hasValue("o_LegendCellStage") && $this->LegendCellStage->CurrentValue <> $this->LegendCellStage->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ConsultantsSignature") && $CurrentForm->hasValue("o_ConsultantsSignature") && $this->ConsultantsSignature->CurrentValue <> $this->ConsultantsSignature->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue <> $this->Name->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_M2") && $CurrentForm->hasValue("o_M2") && $this->M2->CurrentValue <> $this->M2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mi2") && $CurrentForm->hasValue("o_Mi2") && $this->Mi2->CurrentValue <> $this->Mi2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ICSI") && $CurrentForm->hasValue("o_ICSI") && $this->ICSI->CurrentValue <> $this->ICSI->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IVF") && $CurrentForm->hasValue("o_IVF") && $this->IVF->CurrentValue <> $this->IVF->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_M1") && $CurrentForm->hasValue("o_M1") && $this->M1->CurrentValue <> $this->M1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GV") && $CurrentForm->hasValue("o_GV") && $this->GV->CurrentValue <> $this->GV->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Others") && $CurrentForm->hasValue("o_Others") && $this->Others->CurrentValue <> $this->Others->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Normal2PN") && $CurrentForm->hasValue("o_Normal2PN") && $this->Normal2PN->CurrentValue <> $this->Normal2PN->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Abnormalfertilisation1N") && $CurrentForm->hasValue("o_Abnormalfertilisation1N") && $this->Abnormalfertilisation1N->CurrentValue <> $this->Abnormalfertilisation1N->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Abnormalfertilisation3N") && $CurrentForm->hasValue("o_Abnormalfertilisation3N") && $this->Abnormalfertilisation3N->CurrentValue <> $this->Abnormalfertilisation3N->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NotFertilized") && $CurrentForm->hasValue("o_NotFertilized") && $this->NotFertilized->CurrentValue <> $this->NotFertilized->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Degenerated") && $CurrentForm->hasValue("o_Degenerated") && $this->Degenerated->CurrentValue <> $this->Degenerated->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SpermDate") && $CurrentForm->hasValue("o_SpermDate") && $this->SpermDate->CurrentValue <> $this->SpermDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Code1") && $CurrentForm->hasValue("o_Code1") && $this->Code1->CurrentValue <> $this->Code1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Day1") && $CurrentForm->hasValue("o_Day1") && $this->Day1->CurrentValue <> $this->Day1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CellStage1") && $CurrentForm->hasValue("o_CellStage1") && $this->CellStage1->CurrentValue <> $this->CellStage1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Grade1") && $CurrentForm->hasValue("o_Grade1") && $this->Grade1->CurrentValue <> $this->Grade1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State1") && $CurrentForm->hasValue("o_State1") && $this->State1->CurrentValue <> $this->State1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Code2") && $CurrentForm->hasValue("o_Code2") && $this->Code2->CurrentValue <> $this->Code2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Day2") && $CurrentForm->hasValue("o_Day2") && $this->Day2->CurrentValue <> $this->Day2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CellStage2") && $CurrentForm->hasValue("o_CellStage2") && $this->CellStage2->CurrentValue <> $this->CellStage2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Grade2") && $CurrentForm->hasValue("o_Grade2") && $this->Grade2->CurrentValue <> $this->Grade2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State2") && $CurrentForm->hasValue("o_State2") && $this->State2->CurrentValue <> $this->State2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Code3") && $CurrentForm->hasValue("o_Code3") && $this->Code3->CurrentValue <> $this->Code3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Day3") && $CurrentForm->hasValue("o_Day3") && $this->Day3->CurrentValue <> $this->Day3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CellStage3") && $CurrentForm->hasValue("o_CellStage3") && $this->CellStage3->CurrentValue <> $this->CellStage3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Grade3") && $CurrentForm->hasValue("o_Grade3") && $this->Grade3->CurrentValue <> $this->Grade3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State3") && $CurrentForm->hasValue("o_State3") && $this->State3->CurrentValue <> $this->State3->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Code4") && $CurrentForm->hasValue("o_Code4") && $this->Code4->CurrentValue <> $this->Code4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Day4") && $CurrentForm->hasValue("o_Day4") && $this->Day4->CurrentValue <> $this->Day4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CellStage4") && $CurrentForm->hasValue("o_CellStage4") && $this->CellStage4->CurrentValue <> $this->CellStage4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Grade4") && $CurrentForm->hasValue("o_Grade4") && $this->Grade4->CurrentValue <> $this->Grade4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State4") && $CurrentForm->hasValue("o_State4") && $this->State4->CurrentValue <> $this->State4->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Code5") && $CurrentForm->hasValue("o_Code5") && $this->Code5->CurrentValue <> $this->Code5->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Day5") && $CurrentForm->hasValue("o_Day5") && $this->Day5->CurrentValue <> $this->Day5->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CellStage5") && $CurrentForm->hasValue("o_CellStage5") && $this->CellStage5->CurrentValue <> $this->CellStage5->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Grade5") && $CurrentForm->hasValue("o_Grade5") && $this->Grade5->CurrentValue <> $this->Grade5->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State5") && $CurrentForm->hasValue("o_State5") && $this->State5->CurrentValue <> $this->State5->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue <> $this->TidNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RIDNo") && $CurrentForm->hasValue("o_RIDNo") && $this->RIDNo->CurrentValue <> $this->RIDNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Volume") && $CurrentForm->hasValue("o_Volume") && $this->Volume->CurrentValue <> $this->Volume->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Volume1") && $CurrentForm->hasValue("o_Volume1") && $this->Volume1->CurrentValue <> $this->Volume1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Volume2") && $CurrentForm->hasValue("o_Volume2") && $this->Volume2->CurrentValue <> $this->Volume2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Concentration2") && $CurrentForm->hasValue("o_Concentration2") && $this->Concentration2->CurrentValue <> $this->Concentration2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Total") && $CurrentForm->hasValue("o_Total") && $this->Total->CurrentValue <> $this->Total->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Total1") && $CurrentForm->hasValue("o_Total1") && $this->Total1->CurrentValue <> $this->Total1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Total2") && $CurrentForm->hasValue("o_Total2") && $this->Total2->CurrentValue <> $this->Total2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Progressive") && $CurrentForm->hasValue("o_Progressive") && $this->Progressive->CurrentValue <> $this->Progressive->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Progressive1") && $CurrentForm->hasValue("o_Progressive1") && $this->Progressive1->CurrentValue <> $this->Progressive1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Progressive2") && $CurrentForm->hasValue("o_Progressive2") && $this->Progressive2->CurrentValue <> $this->Progressive2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NotProgressive") && $CurrentForm->hasValue("o_NotProgressive") && $this->NotProgressive->CurrentValue <> $this->NotProgressive->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NotProgressive1") && $CurrentForm->hasValue("o_NotProgressive1") && $this->NotProgressive1->CurrentValue <> $this->NotProgressive1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NotProgressive2") && $CurrentForm->hasValue("o_NotProgressive2") && $this->NotProgressive2->CurrentValue <> $this->NotProgressive2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Motility2") && $CurrentForm->hasValue("o_Motility2") && $this->Motility2->CurrentValue <> $this->Motility2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Morphology2") && $CurrentForm->hasValue("o_Morphology2") && $this->Morphology2->CurrentValue <> $this->Morphology2->OldValue)
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
				$this->TidNo->setSessionValue("");
				$this->Name->setSessionValue("");
				$this->RIDNo->setSessionValue("");
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
		$this->ARTCycle->CurrentValue = NULL;
		$this->ARTCycle->OldValue = $this->ARTCycle->CurrentValue;
		$this->Spermorigin->CurrentValue = NULL;
		$this->Spermorigin->OldValue = $this->Spermorigin->CurrentValue;
		$this->IndicationforART->CurrentValue = NULL;
		$this->IndicationforART->OldValue = $this->IndicationforART->CurrentValue;
		$this->DateofICSI->CurrentValue = NULL;
		$this->DateofICSI->OldValue = $this->DateofICSI->CurrentValue;
		$this->Origin->CurrentValue = NULL;
		$this->Origin->OldValue = $this->Origin->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->Method->CurrentValue = NULL;
		$this->Method->OldValue = $this->Method->CurrentValue;
		$this->pre_Concentration->CurrentValue = NULL;
		$this->pre_Concentration->OldValue = $this->pre_Concentration->CurrentValue;
		$this->pre_Motility->CurrentValue = NULL;
		$this->pre_Motility->OldValue = $this->pre_Motility->CurrentValue;
		$this->pre_Morphology->CurrentValue = NULL;
		$this->pre_Morphology->OldValue = $this->pre_Morphology->CurrentValue;
		$this->post_Concentration->CurrentValue = NULL;
		$this->post_Concentration->OldValue = $this->post_Concentration->CurrentValue;
		$this->post_Motility->CurrentValue = NULL;
		$this->post_Motility->OldValue = $this->post_Motility->CurrentValue;
		$this->post_Morphology->CurrentValue = NULL;
		$this->post_Morphology->OldValue = $this->post_Morphology->CurrentValue;
		$this->NumberofEmbryostransferred->CurrentValue = NULL;
		$this->NumberofEmbryostransferred->OldValue = $this->NumberofEmbryostransferred->CurrentValue;
		$this->Embryosunderobservation->CurrentValue = NULL;
		$this->Embryosunderobservation->OldValue = $this->Embryosunderobservation->CurrentValue;
		$this->EmbryoDevelopmentSummary->CurrentValue = NULL;
		$this->EmbryoDevelopmentSummary->OldValue = $this->EmbryoDevelopmentSummary->CurrentValue;
		$this->EmbryologistSignature->CurrentValue = NULL;
		$this->EmbryologistSignature->OldValue = $this->EmbryologistSignature->CurrentValue;
		$this->IVFRegistrationID->CurrentValue = NULL;
		$this->IVFRegistrationID->OldValue = $this->IVFRegistrationID->CurrentValue;
		$this->InseminatinTechnique->CurrentValue = NULL;
		$this->InseminatinTechnique->OldValue = $this->InseminatinTechnique->CurrentValue;
		$this->ICSIDetails->CurrentValue = NULL;
		$this->ICSIDetails->OldValue = $this->ICSIDetails->CurrentValue;
		$this->DateofET->CurrentValue = NULL;
		$this->DateofET->OldValue = $this->DateofET->CurrentValue;
		$this->Reasonfornotranfer->CurrentValue = NULL;
		$this->Reasonfornotranfer->OldValue = $this->Reasonfornotranfer->CurrentValue;
		$this->EmbryosCryopreserved->CurrentValue = NULL;
		$this->EmbryosCryopreserved->OldValue = $this->EmbryosCryopreserved->CurrentValue;
		$this->LegendCellStage->CurrentValue = NULL;
		$this->LegendCellStage->OldValue = $this->LegendCellStage->CurrentValue;
		$this->ConsultantsSignature->CurrentValue = NULL;
		$this->ConsultantsSignature->OldValue = $this->ConsultantsSignature->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->M2->CurrentValue = NULL;
		$this->M2->OldValue = $this->M2->CurrentValue;
		$this->Mi2->CurrentValue = NULL;
		$this->Mi2->OldValue = $this->Mi2->CurrentValue;
		$this->ICSI->CurrentValue = NULL;
		$this->ICSI->OldValue = $this->ICSI->CurrentValue;
		$this->IVF->CurrentValue = NULL;
		$this->IVF->OldValue = $this->IVF->CurrentValue;
		$this->M1->CurrentValue = NULL;
		$this->M1->OldValue = $this->M1->CurrentValue;
		$this->GV->CurrentValue = NULL;
		$this->GV->OldValue = $this->GV->CurrentValue;
		$this->Others->CurrentValue = NULL;
		$this->Others->OldValue = $this->Others->CurrentValue;
		$this->Normal2PN->CurrentValue = NULL;
		$this->Normal2PN->OldValue = $this->Normal2PN->CurrentValue;
		$this->Abnormalfertilisation1N->CurrentValue = NULL;
		$this->Abnormalfertilisation1N->OldValue = $this->Abnormalfertilisation1N->CurrentValue;
		$this->Abnormalfertilisation3N->CurrentValue = NULL;
		$this->Abnormalfertilisation3N->OldValue = $this->Abnormalfertilisation3N->CurrentValue;
		$this->NotFertilized->CurrentValue = NULL;
		$this->NotFertilized->OldValue = $this->NotFertilized->CurrentValue;
		$this->Degenerated->CurrentValue = NULL;
		$this->Degenerated->OldValue = $this->Degenerated->CurrentValue;
		$this->SpermDate->CurrentValue = NULL;
		$this->SpermDate->OldValue = $this->SpermDate->CurrentValue;
		$this->Code1->CurrentValue = NULL;
		$this->Code1->OldValue = $this->Code1->CurrentValue;
		$this->Day1->CurrentValue = NULL;
		$this->Day1->OldValue = $this->Day1->CurrentValue;
		$this->CellStage1->CurrentValue = NULL;
		$this->CellStage1->OldValue = $this->CellStage1->CurrentValue;
		$this->Grade1->CurrentValue = NULL;
		$this->Grade1->OldValue = $this->Grade1->CurrentValue;
		$this->State1->CurrentValue = NULL;
		$this->State1->OldValue = $this->State1->CurrentValue;
		$this->Code2->CurrentValue = NULL;
		$this->Code2->OldValue = $this->Code2->CurrentValue;
		$this->Day2->CurrentValue = NULL;
		$this->Day2->OldValue = $this->Day2->CurrentValue;
		$this->CellStage2->CurrentValue = NULL;
		$this->CellStage2->OldValue = $this->CellStage2->CurrentValue;
		$this->Grade2->CurrentValue = NULL;
		$this->Grade2->OldValue = $this->Grade2->CurrentValue;
		$this->State2->CurrentValue = NULL;
		$this->State2->OldValue = $this->State2->CurrentValue;
		$this->Code3->CurrentValue = NULL;
		$this->Code3->OldValue = $this->Code3->CurrentValue;
		$this->Day3->CurrentValue = NULL;
		$this->Day3->OldValue = $this->Day3->CurrentValue;
		$this->CellStage3->CurrentValue = NULL;
		$this->CellStage3->OldValue = $this->CellStage3->CurrentValue;
		$this->Grade3->CurrentValue = NULL;
		$this->Grade3->OldValue = $this->Grade3->CurrentValue;
		$this->State3->CurrentValue = NULL;
		$this->State3->OldValue = $this->State3->CurrentValue;
		$this->Code4->CurrentValue = NULL;
		$this->Code4->OldValue = $this->Code4->CurrentValue;
		$this->Day4->CurrentValue = NULL;
		$this->Day4->OldValue = $this->Day4->CurrentValue;
		$this->CellStage4->CurrentValue = NULL;
		$this->CellStage4->OldValue = $this->CellStage4->CurrentValue;
		$this->Grade4->CurrentValue = NULL;
		$this->Grade4->OldValue = $this->Grade4->CurrentValue;
		$this->State4->CurrentValue = NULL;
		$this->State4->OldValue = $this->State4->CurrentValue;
		$this->Code5->CurrentValue = NULL;
		$this->Code5->OldValue = $this->Code5->CurrentValue;
		$this->Day5->CurrentValue = NULL;
		$this->Day5->OldValue = $this->Day5->CurrentValue;
		$this->CellStage5->CurrentValue = NULL;
		$this->CellStage5->OldValue = $this->CellStage5->CurrentValue;
		$this->Grade5->CurrentValue = NULL;
		$this->Grade5->OldValue = $this->Grade5->CurrentValue;
		$this->State5->CurrentValue = NULL;
		$this->State5->OldValue = $this->State5->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
		$this->Volume->CurrentValue = NULL;
		$this->Volume->OldValue = $this->Volume->CurrentValue;
		$this->Volume1->CurrentValue = NULL;
		$this->Volume1->OldValue = $this->Volume1->CurrentValue;
		$this->Volume2->CurrentValue = NULL;
		$this->Volume2->OldValue = $this->Volume2->CurrentValue;
		$this->Concentration2->CurrentValue = NULL;
		$this->Concentration2->OldValue = $this->Concentration2->CurrentValue;
		$this->Total->CurrentValue = NULL;
		$this->Total->OldValue = $this->Total->CurrentValue;
		$this->Total1->CurrentValue = NULL;
		$this->Total1->OldValue = $this->Total1->CurrentValue;
		$this->Total2->CurrentValue = NULL;
		$this->Total2->OldValue = $this->Total2->CurrentValue;
		$this->Progressive->CurrentValue = NULL;
		$this->Progressive->OldValue = $this->Progressive->CurrentValue;
		$this->Progressive1->CurrentValue = NULL;
		$this->Progressive1->OldValue = $this->Progressive1->CurrentValue;
		$this->Progressive2->CurrentValue = NULL;
		$this->Progressive2->OldValue = $this->Progressive2->CurrentValue;
		$this->NotProgressive->CurrentValue = NULL;
		$this->NotProgressive->OldValue = $this->NotProgressive->CurrentValue;
		$this->NotProgressive1->CurrentValue = NULL;
		$this->NotProgressive1->OldValue = $this->NotProgressive1->CurrentValue;
		$this->NotProgressive2->CurrentValue = NULL;
		$this->NotProgressive2->OldValue = $this->NotProgressive2->CurrentValue;
		$this->Motility2->CurrentValue = NULL;
		$this->Motility2->OldValue = $this->Motility2->CurrentValue;
		$this->Morphology2->CurrentValue = NULL;
		$this->Morphology2->OldValue = $this->Morphology2->CurrentValue;
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

		// Check field name 'ARTCycle' first before field var 'x_ARTCycle'
		$val = $CurrentForm->hasValue("ARTCycle") ? $CurrentForm->getValue("ARTCycle") : $CurrentForm->getValue("x_ARTCycle");
		if (!$this->ARTCycle->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ARTCycle->Visible = FALSE; // Disable update for API request
			else
				$this->ARTCycle->setFormValue($val);
		}
		$this->ARTCycle->setOldValue($CurrentForm->getValue("o_ARTCycle"));

		// Check field name 'Spermorigin' first before field var 'x_Spermorigin'
		$val = $CurrentForm->hasValue("Spermorigin") ? $CurrentForm->getValue("Spermorigin") : $CurrentForm->getValue("x_Spermorigin");
		if (!$this->Spermorigin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Spermorigin->Visible = FALSE; // Disable update for API request
			else
				$this->Spermorigin->setFormValue($val);
		}
		$this->Spermorigin->setOldValue($CurrentForm->getValue("o_Spermorigin"));

		// Check field name 'IndicationforART' first before field var 'x_IndicationforART'
		$val = $CurrentForm->hasValue("IndicationforART") ? $CurrentForm->getValue("IndicationforART") : $CurrentForm->getValue("x_IndicationforART");
		if (!$this->IndicationforART->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IndicationforART->Visible = FALSE; // Disable update for API request
			else
				$this->IndicationforART->setFormValue($val);
		}
		$this->IndicationforART->setOldValue($CurrentForm->getValue("o_IndicationforART"));

		// Check field name 'DateofICSI' first before field var 'x_DateofICSI'
		$val = $CurrentForm->hasValue("DateofICSI") ? $CurrentForm->getValue("DateofICSI") : $CurrentForm->getValue("x_DateofICSI");
		if (!$this->DateofICSI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DateofICSI->Visible = FALSE; // Disable update for API request
			else
				$this->DateofICSI->setFormValue($val);
			$this->DateofICSI->CurrentValue = UnFormatDateTime($this->DateofICSI->CurrentValue, 7);
		}
		$this->DateofICSI->setOldValue($CurrentForm->getValue("o_DateofICSI"));

		// Check field name 'Origin' first before field var 'x_Origin'
		$val = $CurrentForm->hasValue("Origin") ? $CurrentForm->getValue("Origin") : $CurrentForm->getValue("x_Origin");
		if (!$this->Origin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Origin->Visible = FALSE; // Disable update for API request
			else
				$this->Origin->setFormValue($val);
		}
		$this->Origin->setOldValue($CurrentForm->getValue("o_Origin"));

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}
		$this->Status->setOldValue($CurrentForm->getValue("o_Status"));

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}
		$this->Method->setOldValue($CurrentForm->getValue("o_Method"));

		// Check field name 'pre_Concentration' first before field var 'x_pre_Concentration'
		$val = $CurrentForm->hasValue("pre_Concentration") ? $CurrentForm->getValue("pre_Concentration") : $CurrentForm->getValue("x_pre_Concentration");
		if (!$this->pre_Concentration->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pre_Concentration->Visible = FALSE; // Disable update for API request
			else
				$this->pre_Concentration->setFormValue($val);
		}
		$this->pre_Concentration->setOldValue($CurrentForm->getValue("o_pre_Concentration"));

		// Check field name 'pre_Motility' first before field var 'x_pre_Motility'
		$val = $CurrentForm->hasValue("pre_Motility") ? $CurrentForm->getValue("pre_Motility") : $CurrentForm->getValue("x_pre_Motility");
		if (!$this->pre_Motility->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pre_Motility->Visible = FALSE; // Disable update for API request
			else
				$this->pre_Motility->setFormValue($val);
		}
		$this->pre_Motility->setOldValue($CurrentForm->getValue("o_pre_Motility"));

		// Check field name 'pre_Morphology' first before field var 'x_pre_Morphology'
		$val = $CurrentForm->hasValue("pre_Morphology") ? $CurrentForm->getValue("pre_Morphology") : $CurrentForm->getValue("x_pre_Morphology");
		if (!$this->pre_Morphology->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pre_Morphology->Visible = FALSE; // Disable update for API request
			else
				$this->pre_Morphology->setFormValue($val);
		}
		$this->pre_Morphology->setOldValue($CurrentForm->getValue("o_pre_Morphology"));

		// Check field name 'post_Concentration' first before field var 'x_post_Concentration'
		$val = $CurrentForm->hasValue("post_Concentration") ? $CurrentForm->getValue("post_Concentration") : $CurrentForm->getValue("x_post_Concentration");
		if (!$this->post_Concentration->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->post_Concentration->Visible = FALSE; // Disable update for API request
			else
				$this->post_Concentration->setFormValue($val);
		}
		$this->post_Concentration->setOldValue($CurrentForm->getValue("o_post_Concentration"));

		// Check field name 'post_Motility' first before field var 'x_post_Motility'
		$val = $CurrentForm->hasValue("post_Motility") ? $CurrentForm->getValue("post_Motility") : $CurrentForm->getValue("x_post_Motility");
		if (!$this->post_Motility->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->post_Motility->Visible = FALSE; // Disable update for API request
			else
				$this->post_Motility->setFormValue($val);
		}
		$this->post_Motility->setOldValue($CurrentForm->getValue("o_post_Motility"));

		// Check field name 'post_Morphology' first before field var 'x_post_Morphology'
		$val = $CurrentForm->hasValue("post_Morphology") ? $CurrentForm->getValue("post_Morphology") : $CurrentForm->getValue("x_post_Morphology");
		if (!$this->post_Morphology->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->post_Morphology->Visible = FALSE; // Disable update for API request
			else
				$this->post_Morphology->setFormValue($val);
		}
		$this->post_Morphology->setOldValue($CurrentForm->getValue("o_post_Morphology"));

		// Check field name 'NumberofEmbryostransferred' first before field var 'x_NumberofEmbryostransferred'
		$val = $CurrentForm->hasValue("NumberofEmbryostransferred") ? $CurrentForm->getValue("NumberofEmbryostransferred") : $CurrentForm->getValue("x_NumberofEmbryostransferred");
		if (!$this->NumberofEmbryostransferred->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NumberofEmbryostransferred->Visible = FALSE; // Disable update for API request
			else
				$this->NumberofEmbryostransferred->setFormValue($val);
		}
		$this->NumberofEmbryostransferred->setOldValue($CurrentForm->getValue("o_NumberofEmbryostransferred"));

		// Check field name 'Embryosunderobservation' first before field var 'x_Embryosunderobservation'
		$val = $CurrentForm->hasValue("Embryosunderobservation") ? $CurrentForm->getValue("Embryosunderobservation") : $CurrentForm->getValue("x_Embryosunderobservation");
		if (!$this->Embryosunderobservation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Embryosunderobservation->Visible = FALSE; // Disable update for API request
			else
				$this->Embryosunderobservation->setFormValue($val);
		}
		$this->Embryosunderobservation->setOldValue($CurrentForm->getValue("o_Embryosunderobservation"));

		// Check field name 'EmbryoDevelopmentSummary' first before field var 'x_EmbryoDevelopmentSummary'
		$val = $CurrentForm->hasValue("EmbryoDevelopmentSummary") ? $CurrentForm->getValue("EmbryoDevelopmentSummary") : $CurrentForm->getValue("x_EmbryoDevelopmentSummary");
		if (!$this->EmbryoDevelopmentSummary->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EmbryoDevelopmentSummary->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryoDevelopmentSummary->setFormValue($val);
		}
		$this->EmbryoDevelopmentSummary->setOldValue($CurrentForm->getValue("o_EmbryoDevelopmentSummary"));

		// Check field name 'EmbryologistSignature' first before field var 'x_EmbryologistSignature'
		$val = $CurrentForm->hasValue("EmbryologistSignature") ? $CurrentForm->getValue("EmbryologistSignature") : $CurrentForm->getValue("x_EmbryologistSignature");
		if (!$this->EmbryologistSignature->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EmbryologistSignature->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryologistSignature->setFormValue($val);
		}
		$this->EmbryologistSignature->setOldValue($CurrentForm->getValue("o_EmbryologistSignature"));

		// Check field name 'IVFRegistrationID' first before field var 'x_IVFRegistrationID'
		$val = $CurrentForm->hasValue("IVFRegistrationID") ? $CurrentForm->getValue("IVFRegistrationID") : $CurrentForm->getValue("x_IVFRegistrationID");
		if (!$this->IVFRegistrationID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IVFRegistrationID->Visible = FALSE; // Disable update for API request
			else
				$this->IVFRegistrationID->setFormValue($val);
		}
		$this->IVFRegistrationID->setOldValue($CurrentForm->getValue("o_IVFRegistrationID"));

		// Check field name 'InseminatinTechnique' first before field var 'x_InseminatinTechnique'
		$val = $CurrentForm->hasValue("InseminatinTechnique") ? $CurrentForm->getValue("InseminatinTechnique") : $CurrentForm->getValue("x_InseminatinTechnique");
		if (!$this->InseminatinTechnique->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->InseminatinTechnique->Visible = FALSE; // Disable update for API request
			else
				$this->InseminatinTechnique->setFormValue($val);
		}
		$this->InseminatinTechnique->setOldValue($CurrentForm->getValue("o_InseminatinTechnique"));

		// Check field name 'ICSIDetails' first before field var 'x_ICSIDetails'
		$val = $CurrentForm->hasValue("ICSIDetails") ? $CurrentForm->getValue("ICSIDetails") : $CurrentForm->getValue("x_ICSIDetails");
		if (!$this->ICSIDetails->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSIDetails->Visible = FALSE; // Disable update for API request
			else
				$this->ICSIDetails->setFormValue($val);
		}
		$this->ICSIDetails->setOldValue($CurrentForm->getValue("o_ICSIDetails"));

		// Check field name 'DateofET' first before field var 'x_DateofET'
		$val = $CurrentForm->hasValue("DateofET") ? $CurrentForm->getValue("DateofET") : $CurrentForm->getValue("x_DateofET");
		if (!$this->DateofET->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DateofET->Visible = FALSE; // Disable update for API request
			else
				$this->DateofET->setFormValue($val);
		}
		$this->DateofET->setOldValue($CurrentForm->getValue("o_DateofET"));

		// Check field name 'Reasonfornotranfer' first before field var 'x_Reasonfornotranfer'
		$val = $CurrentForm->hasValue("Reasonfornotranfer") ? $CurrentForm->getValue("Reasonfornotranfer") : $CurrentForm->getValue("x_Reasonfornotranfer");
		if (!$this->Reasonfornotranfer->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reasonfornotranfer->Visible = FALSE; // Disable update for API request
			else
				$this->Reasonfornotranfer->setFormValue($val);
		}
		$this->Reasonfornotranfer->setOldValue($CurrentForm->getValue("o_Reasonfornotranfer"));

		// Check field name 'EmbryosCryopreserved' first before field var 'x_EmbryosCryopreserved'
		$val = $CurrentForm->hasValue("EmbryosCryopreserved") ? $CurrentForm->getValue("EmbryosCryopreserved") : $CurrentForm->getValue("x_EmbryosCryopreserved");
		if (!$this->EmbryosCryopreserved->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EmbryosCryopreserved->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryosCryopreserved->setFormValue($val);
		}
		$this->EmbryosCryopreserved->setOldValue($CurrentForm->getValue("o_EmbryosCryopreserved"));

		// Check field name 'LegendCellStage' first before field var 'x_LegendCellStage'
		$val = $CurrentForm->hasValue("LegendCellStage") ? $CurrentForm->getValue("LegendCellStage") : $CurrentForm->getValue("x_LegendCellStage");
		if (!$this->LegendCellStage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LegendCellStage->Visible = FALSE; // Disable update for API request
			else
				$this->LegendCellStage->setFormValue($val);
		}
		$this->LegendCellStage->setOldValue($CurrentForm->getValue("o_LegendCellStage"));

		// Check field name 'ConsultantsSignature' first before field var 'x_ConsultantsSignature'
		$val = $CurrentForm->hasValue("ConsultantsSignature") ? $CurrentForm->getValue("ConsultantsSignature") : $CurrentForm->getValue("x_ConsultantsSignature");
		if (!$this->ConsultantsSignature->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ConsultantsSignature->Visible = FALSE; // Disable update for API request
			else
				$this->ConsultantsSignature->setFormValue($val);
		}
		$this->ConsultantsSignature->setOldValue($CurrentForm->getValue("o_ConsultantsSignature"));

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}
		$this->Name->setOldValue($CurrentForm->getValue("o_Name"));

		// Check field name 'M2' first before field var 'x_M2'
		$val = $CurrentForm->hasValue("M2") ? $CurrentForm->getValue("M2") : $CurrentForm->getValue("x_M2");
		if (!$this->M2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->M2->Visible = FALSE; // Disable update for API request
			else
				$this->M2->setFormValue($val);
		}
		$this->M2->setOldValue($CurrentForm->getValue("o_M2"));

		// Check field name 'Mi2' first before field var 'x_Mi2'
		$val = $CurrentForm->hasValue("Mi2") ? $CurrentForm->getValue("Mi2") : $CurrentForm->getValue("x_Mi2");
		if (!$this->Mi2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mi2->Visible = FALSE; // Disable update for API request
			else
				$this->Mi2->setFormValue($val);
		}
		$this->Mi2->setOldValue($CurrentForm->getValue("o_Mi2"));

		// Check field name 'ICSI' first before field var 'x_ICSI'
		$val = $CurrentForm->hasValue("ICSI") ? $CurrentForm->getValue("ICSI") : $CurrentForm->getValue("x_ICSI");
		if (!$this->ICSI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSI->Visible = FALSE; // Disable update for API request
			else
				$this->ICSI->setFormValue($val);
		}
		$this->ICSI->setOldValue($CurrentForm->getValue("o_ICSI"));

		// Check field name 'IVF' first before field var 'x_IVF'
		$val = $CurrentForm->hasValue("IVF") ? $CurrentForm->getValue("IVF") : $CurrentForm->getValue("x_IVF");
		if (!$this->IVF->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IVF->Visible = FALSE; // Disable update for API request
			else
				$this->IVF->setFormValue($val);
		}
		$this->IVF->setOldValue($CurrentForm->getValue("o_IVF"));

		// Check field name 'M1' first before field var 'x_M1'
		$val = $CurrentForm->hasValue("M1") ? $CurrentForm->getValue("M1") : $CurrentForm->getValue("x_M1");
		if (!$this->M1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->M1->Visible = FALSE; // Disable update for API request
			else
				$this->M1->setFormValue($val);
		}
		$this->M1->setOldValue($CurrentForm->getValue("o_M1"));

		// Check field name 'GV' first before field var 'x_GV'
		$val = $CurrentForm->hasValue("GV") ? $CurrentForm->getValue("GV") : $CurrentForm->getValue("x_GV");
		if (!$this->GV->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GV->Visible = FALSE; // Disable update for API request
			else
				$this->GV->setFormValue($val);
		}
		$this->GV->setOldValue($CurrentForm->getValue("o_GV"));

		// Check field name 'Others' first before field var 'x_Others'
		$val = $CurrentForm->hasValue("Others") ? $CurrentForm->getValue("Others") : $CurrentForm->getValue("x_Others");
		if (!$this->Others->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Others->Visible = FALSE; // Disable update for API request
			else
				$this->Others->setFormValue($val);
		}
		$this->Others->setOldValue($CurrentForm->getValue("o_Others"));

		// Check field name 'Normal2PN' first before field var 'x_Normal2PN'
		$val = $CurrentForm->hasValue("Normal2PN") ? $CurrentForm->getValue("Normal2PN") : $CurrentForm->getValue("x_Normal2PN");
		if (!$this->Normal2PN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Normal2PN->Visible = FALSE; // Disable update for API request
			else
				$this->Normal2PN->setFormValue($val);
		}
		$this->Normal2PN->setOldValue($CurrentForm->getValue("o_Normal2PN"));

		// Check field name 'Abnormalfertilisation1N' first before field var 'x_Abnormalfertilisation1N'
		$val = $CurrentForm->hasValue("Abnormalfertilisation1N") ? $CurrentForm->getValue("Abnormalfertilisation1N") : $CurrentForm->getValue("x_Abnormalfertilisation1N");
		if (!$this->Abnormalfertilisation1N->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Abnormalfertilisation1N->Visible = FALSE; // Disable update for API request
			else
				$this->Abnormalfertilisation1N->setFormValue($val);
		}
		$this->Abnormalfertilisation1N->setOldValue($CurrentForm->getValue("o_Abnormalfertilisation1N"));

		// Check field name 'Abnormalfertilisation3N' first before field var 'x_Abnormalfertilisation3N'
		$val = $CurrentForm->hasValue("Abnormalfertilisation3N") ? $CurrentForm->getValue("Abnormalfertilisation3N") : $CurrentForm->getValue("x_Abnormalfertilisation3N");
		if (!$this->Abnormalfertilisation3N->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Abnormalfertilisation3N->Visible = FALSE; // Disable update for API request
			else
				$this->Abnormalfertilisation3N->setFormValue($val);
		}
		$this->Abnormalfertilisation3N->setOldValue($CurrentForm->getValue("o_Abnormalfertilisation3N"));

		// Check field name 'NotFertilized' first before field var 'x_NotFertilized'
		$val = $CurrentForm->hasValue("NotFertilized") ? $CurrentForm->getValue("NotFertilized") : $CurrentForm->getValue("x_NotFertilized");
		if (!$this->NotFertilized->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NotFertilized->Visible = FALSE; // Disable update for API request
			else
				$this->NotFertilized->setFormValue($val);
		}
		$this->NotFertilized->setOldValue($CurrentForm->getValue("o_NotFertilized"));

		// Check field name 'Degenerated' first before field var 'x_Degenerated'
		$val = $CurrentForm->hasValue("Degenerated") ? $CurrentForm->getValue("Degenerated") : $CurrentForm->getValue("x_Degenerated");
		if (!$this->Degenerated->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Degenerated->Visible = FALSE; // Disable update for API request
			else
				$this->Degenerated->setFormValue($val);
		}
		$this->Degenerated->setOldValue($CurrentForm->getValue("o_Degenerated"));

		// Check field name 'SpermDate' first before field var 'x_SpermDate'
		$val = $CurrentForm->hasValue("SpermDate") ? $CurrentForm->getValue("SpermDate") : $CurrentForm->getValue("x_SpermDate");
		if (!$this->SpermDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SpermDate->Visible = FALSE; // Disable update for API request
			else
				$this->SpermDate->setFormValue($val);
			$this->SpermDate->CurrentValue = UnFormatDateTime($this->SpermDate->CurrentValue, 0);
		}
		$this->SpermDate->setOldValue($CurrentForm->getValue("o_SpermDate"));

		// Check field name 'Code1' first before field var 'x_Code1'
		$val = $CurrentForm->hasValue("Code1") ? $CurrentForm->getValue("Code1") : $CurrentForm->getValue("x_Code1");
		if (!$this->Code1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code1->Visible = FALSE; // Disable update for API request
			else
				$this->Code1->setFormValue($val);
		}
		$this->Code1->setOldValue($CurrentForm->getValue("o_Code1"));

		// Check field name 'Day1' first before field var 'x_Day1'
		$val = $CurrentForm->hasValue("Day1") ? $CurrentForm->getValue("Day1") : $CurrentForm->getValue("x_Day1");
		if (!$this->Day1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day1->Visible = FALSE; // Disable update for API request
			else
				$this->Day1->setFormValue($val);
		}
		$this->Day1->setOldValue($CurrentForm->getValue("o_Day1"));

		// Check field name 'CellStage1' first before field var 'x_CellStage1'
		$val = $CurrentForm->hasValue("CellStage1") ? $CurrentForm->getValue("CellStage1") : $CurrentForm->getValue("x_CellStage1");
		if (!$this->CellStage1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage1->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage1->setFormValue($val);
		}
		$this->CellStage1->setOldValue($CurrentForm->getValue("o_CellStage1"));

		// Check field name 'Grade1' first before field var 'x_Grade1'
		$val = $CurrentForm->hasValue("Grade1") ? $CurrentForm->getValue("Grade1") : $CurrentForm->getValue("x_Grade1");
		if (!$this->Grade1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade1->Visible = FALSE; // Disable update for API request
			else
				$this->Grade1->setFormValue($val);
		}
		$this->Grade1->setOldValue($CurrentForm->getValue("o_Grade1"));

		// Check field name 'State1' first before field var 'x_State1'
		$val = $CurrentForm->hasValue("State1") ? $CurrentForm->getValue("State1") : $CurrentForm->getValue("x_State1");
		if (!$this->State1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State1->Visible = FALSE; // Disable update for API request
			else
				$this->State1->setFormValue($val);
		}
		$this->State1->setOldValue($CurrentForm->getValue("o_State1"));

		// Check field name 'Code2' first before field var 'x_Code2'
		$val = $CurrentForm->hasValue("Code2") ? $CurrentForm->getValue("Code2") : $CurrentForm->getValue("x_Code2");
		if (!$this->Code2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code2->Visible = FALSE; // Disable update for API request
			else
				$this->Code2->setFormValue($val);
		}
		$this->Code2->setOldValue($CurrentForm->getValue("o_Code2"));

		// Check field name 'Day2' first before field var 'x_Day2'
		$val = $CurrentForm->hasValue("Day2") ? $CurrentForm->getValue("Day2") : $CurrentForm->getValue("x_Day2");
		if (!$this->Day2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day2->Visible = FALSE; // Disable update for API request
			else
				$this->Day2->setFormValue($val);
		}
		$this->Day2->setOldValue($CurrentForm->getValue("o_Day2"));

		// Check field name 'CellStage2' first before field var 'x_CellStage2'
		$val = $CurrentForm->hasValue("CellStage2") ? $CurrentForm->getValue("CellStage2") : $CurrentForm->getValue("x_CellStage2");
		if (!$this->CellStage2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage2->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage2->setFormValue($val);
		}
		$this->CellStage2->setOldValue($CurrentForm->getValue("o_CellStage2"));

		// Check field name 'Grade2' first before field var 'x_Grade2'
		$val = $CurrentForm->hasValue("Grade2") ? $CurrentForm->getValue("Grade2") : $CurrentForm->getValue("x_Grade2");
		if (!$this->Grade2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade2->Visible = FALSE; // Disable update for API request
			else
				$this->Grade2->setFormValue($val);
		}
		$this->Grade2->setOldValue($CurrentForm->getValue("o_Grade2"));

		// Check field name 'State2' first before field var 'x_State2'
		$val = $CurrentForm->hasValue("State2") ? $CurrentForm->getValue("State2") : $CurrentForm->getValue("x_State2");
		if (!$this->State2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State2->Visible = FALSE; // Disable update for API request
			else
				$this->State2->setFormValue($val);
		}
		$this->State2->setOldValue($CurrentForm->getValue("o_State2"));

		// Check field name 'Code3' first before field var 'x_Code3'
		$val = $CurrentForm->hasValue("Code3") ? $CurrentForm->getValue("Code3") : $CurrentForm->getValue("x_Code3");
		if (!$this->Code3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code3->Visible = FALSE; // Disable update for API request
			else
				$this->Code3->setFormValue($val);
		}
		$this->Code3->setOldValue($CurrentForm->getValue("o_Code3"));

		// Check field name 'Day3' first before field var 'x_Day3'
		$val = $CurrentForm->hasValue("Day3") ? $CurrentForm->getValue("Day3") : $CurrentForm->getValue("x_Day3");
		if (!$this->Day3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day3->Visible = FALSE; // Disable update for API request
			else
				$this->Day3->setFormValue($val);
		}
		$this->Day3->setOldValue($CurrentForm->getValue("o_Day3"));

		// Check field name 'CellStage3' first before field var 'x_CellStage3'
		$val = $CurrentForm->hasValue("CellStage3") ? $CurrentForm->getValue("CellStage3") : $CurrentForm->getValue("x_CellStage3");
		if (!$this->CellStage3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage3->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage3->setFormValue($val);
		}
		$this->CellStage3->setOldValue($CurrentForm->getValue("o_CellStage3"));

		// Check field name 'Grade3' first before field var 'x_Grade3'
		$val = $CurrentForm->hasValue("Grade3") ? $CurrentForm->getValue("Grade3") : $CurrentForm->getValue("x_Grade3");
		if (!$this->Grade3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade3->Visible = FALSE; // Disable update for API request
			else
				$this->Grade3->setFormValue($val);
		}
		$this->Grade3->setOldValue($CurrentForm->getValue("o_Grade3"));

		// Check field name 'State3' first before field var 'x_State3'
		$val = $CurrentForm->hasValue("State3") ? $CurrentForm->getValue("State3") : $CurrentForm->getValue("x_State3");
		if (!$this->State3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State3->Visible = FALSE; // Disable update for API request
			else
				$this->State3->setFormValue($val);
		}
		$this->State3->setOldValue($CurrentForm->getValue("o_State3"));

		// Check field name 'Code4' first before field var 'x_Code4'
		$val = $CurrentForm->hasValue("Code4") ? $CurrentForm->getValue("Code4") : $CurrentForm->getValue("x_Code4");
		if (!$this->Code4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code4->Visible = FALSE; // Disable update for API request
			else
				$this->Code4->setFormValue($val);
		}
		$this->Code4->setOldValue($CurrentForm->getValue("o_Code4"));

		// Check field name 'Day4' first before field var 'x_Day4'
		$val = $CurrentForm->hasValue("Day4") ? $CurrentForm->getValue("Day4") : $CurrentForm->getValue("x_Day4");
		if (!$this->Day4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day4->Visible = FALSE; // Disable update for API request
			else
				$this->Day4->setFormValue($val);
		}
		$this->Day4->setOldValue($CurrentForm->getValue("o_Day4"));

		// Check field name 'CellStage4' first before field var 'x_CellStage4'
		$val = $CurrentForm->hasValue("CellStage4") ? $CurrentForm->getValue("CellStage4") : $CurrentForm->getValue("x_CellStage4");
		if (!$this->CellStage4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage4->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage4->setFormValue($val);
		}
		$this->CellStage4->setOldValue($CurrentForm->getValue("o_CellStage4"));

		// Check field name 'Grade4' first before field var 'x_Grade4'
		$val = $CurrentForm->hasValue("Grade4") ? $CurrentForm->getValue("Grade4") : $CurrentForm->getValue("x_Grade4");
		if (!$this->Grade4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade4->Visible = FALSE; // Disable update for API request
			else
				$this->Grade4->setFormValue($val);
		}
		$this->Grade4->setOldValue($CurrentForm->getValue("o_Grade4"));

		// Check field name 'State4' first before field var 'x_State4'
		$val = $CurrentForm->hasValue("State4") ? $CurrentForm->getValue("State4") : $CurrentForm->getValue("x_State4");
		if (!$this->State4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State4->Visible = FALSE; // Disable update for API request
			else
				$this->State4->setFormValue($val);
		}
		$this->State4->setOldValue($CurrentForm->getValue("o_State4"));

		// Check field name 'Code5' first before field var 'x_Code5'
		$val = $CurrentForm->hasValue("Code5") ? $CurrentForm->getValue("Code5") : $CurrentForm->getValue("x_Code5");
		if (!$this->Code5->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code5->Visible = FALSE; // Disable update for API request
			else
				$this->Code5->setFormValue($val);
		}
		$this->Code5->setOldValue($CurrentForm->getValue("o_Code5"));

		// Check field name 'Day5' first before field var 'x_Day5'
		$val = $CurrentForm->hasValue("Day5") ? $CurrentForm->getValue("Day5") : $CurrentForm->getValue("x_Day5");
		if (!$this->Day5->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day5->Visible = FALSE; // Disable update for API request
			else
				$this->Day5->setFormValue($val);
		}
		$this->Day5->setOldValue($CurrentForm->getValue("o_Day5"));

		// Check field name 'CellStage5' first before field var 'x_CellStage5'
		$val = $CurrentForm->hasValue("CellStage5") ? $CurrentForm->getValue("CellStage5") : $CurrentForm->getValue("x_CellStage5");
		if (!$this->CellStage5->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage5->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage5->setFormValue($val);
		}
		$this->CellStage5->setOldValue($CurrentForm->getValue("o_CellStage5"));

		// Check field name 'Grade5' first before field var 'x_Grade5'
		$val = $CurrentForm->hasValue("Grade5") ? $CurrentForm->getValue("Grade5") : $CurrentForm->getValue("x_Grade5");
		if (!$this->Grade5->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade5->Visible = FALSE; // Disable update for API request
			else
				$this->Grade5->setFormValue($val);
		}
		$this->Grade5->setOldValue($CurrentForm->getValue("o_Grade5"));

		// Check field name 'State5' first before field var 'x_State5'
		$val = $CurrentForm->hasValue("State5") ? $CurrentForm->getValue("State5") : $CurrentForm->getValue("x_State5");
		if (!$this->State5->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State5->Visible = FALSE; // Disable update for API request
			else
				$this->State5->setFormValue($val);
		}
		$this->State5->setOldValue($CurrentForm->getValue("o_State5"));

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}
		$this->TidNo->setOldValue($CurrentForm->getValue("o_TidNo"));

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}
		$this->RIDNo->setOldValue($CurrentForm->getValue("o_RIDNo"));

		// Check field name 'Volume' first before field var 'x_Volume'
		$val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
		if (!$this->Volume->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Volume->Visible = FALSE; // Disable update for API request
			else
				$this->Volume->setFormValue($val);
		}
		$this->Volume->setOldValue($CurrentForm->getValue("o_Volume"));

		// Check field name 'Volume1' first before field var 'x_Volume1'
		$val = $CurrentForm->hasValue("Volume1") ? $CurrentForm->getValue("Volume1") : $CurrentForm->getValue("x_Volume1");
		if (!$this->Volume1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Volume1->Visible = FALSE; // Disable update for API request
			else
				$this->Volume1->setFormValue($val);
		}
		$this->Volume1->setOldValue($CurrentForm->getValue("o_Volume1"));

		// Check field name 'Volume2' first before field var 'x_Volume2'
		$val = $CurrentForm->hasValue("Volume2") ? $CurrentForm->getValue("Volume2") : $CurrentForm->getValue("x_Volume2");
		if (!$this->Volume2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Volume2->Visible = FALSE; // Disable update for API request
			else
				$this->Volume2->setFormValue($val);
		}
		$this->Volume2->setOldValue($CurrentForm->getValue("o_Volume2"));

		// Check field name 'Concentration2' first before field var 'x_Concentration2'
		$val = $CurrentForm->hasValue("Concentration2") ? $CurrentForm->getValue("Concentration2") : $CurrentForm->getValue("x_Concentration2");
		if (!$this->Concentration2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Concentration2->Visible = FALSE; // Disable update for API request
			else
				$this->Concentration2->setFormValue($val);
		}
		$this->Concentration2->setOldValue($CurrentForm->getValue("o_Concentration2"));

		// Check field name 'Total' first before field var 'x_Total'
		$val = $CurrentForm->hasValue("Total") ? $CurrentForm->getValue("Total") : $CurrentForm->getValue("x_Total");
		if (!$this->Total->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Total->Visible = FALSE; // Disable update for API request
			else
				$this->Total->setFormValue($val);
		}
		$this->Total->setOldValue($CurrentForm->getValue("o_Total"));

		// Check field name 'Total1' first before field var 'x_Total1'
		$val = $CurrentForm->hasValue("Total1") ? $CurrentForm->getValue("Total1") : $CurrentForm->getValue("x_Total1");
		if (!$this->Total1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Total1->Visible = FALSE; // Disable update for API request
			else
				$this->Total1->setFormValue($val);
		}
		$this->Total1->setOldValue($CurrentForm->getValue("o_Total1"));

		// Check field name 'Total2' first before field var 'x_Total2'
		$val = $CurrentForm->hasValue("Total2") ? $CurrentForm->getValue("Total2") : $CurrentForm->getValue("x_Total2");
		if (!$this->Total2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Total2->Visible = FALSE; // Disable update for API request
			else
				$this->Total2->setFormValue($val);
		}
		$this->Total2->setOldValue($CurrentForm->getValue("o_Total2"));

		// Check field name 'Progressive' first before field var 'x_Progressive'
		$val = $CurrentForm->hasValue("Progressive") ? $CurrentForm->getValue("Progressive") : $CurrentForm->getValue("x_Progressive");
		if (!$this->Progressive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Progressive->Visible = FALSE; // Disable update for API request
			else
				$this->Progressive->setFormValue($val);
		}
		$this->Progressive->setOldValue($CurrentForm->getValue("o_Progressive"));

		// Check field name 'Progressive1' first before field var 'x_Progressive1'
		$val = $CurrentForm->hasValue("Progressive1") ? $CurrentForm->getValue("Progressive1") : $CurrentForm->getValue("x_Progressive1");
		if (!$this->Progressive1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Progressive1->Visible = FALSE; // Disable update for API request
			else
				$this->Progressive1->setFormValue($val);
		}
		$this->Progressive1->setOldValue($CurrentForm->getValue("o_Progressive1"));

		// Check field name 'Progressive2' first before field var 'x_Progressive2'
		$val = $CurrentForm->hasValue("Progressive2") ? $CurrentForm->getValue("Progressive2") : $CurrentForm->getValue("x_Progressive2");
		if (!$this->Progressive2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Progressive2->Visible = FALSE; // Disable update for API request
			else
				$this->Progressive2->setFormValue($val);
		}
		$this->Progressive2->setOldValue($CurrentForm->getValue("o_Progressive2"));

		// Check field name 'NotProgressive' first before field var 'x_NotProgressive'
		$val = $CurrentForm->hasValue("NotProgressive") ? $CurrentForm->getValue("NotProgressive") : $CurrentForm->getValue("x_NotProgressive");
		if (!$this->NotProgressive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NotProgressive->Visible = FALSE; // Disable update for API request
			else
				$this->NotProgressive->setFormValue($val);
		}
		$this->NotProgressive->setOldValue($CurrentForm->getValue("o_NotProgressive"));

		// Check field name 'NotProgressive1' first before field var 'x_NotProgressive1'
		$val = $CurrentForm->hasValue("NotProgressive1") ? $CurrentForm->getValue("NotProgressive1") : $CurrentForm->getValue("x_NotProgressive1");
		if (!$this->NotProgressive1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NotProgressive1->Visible = FALSE; // Disable update for API request
			else
				$this->NotProgressive1->setFormValue($val);
		}
		$this->NotProgressive1->setOldValue($CurrentForm->getValue("o_NotProgressive1"));

		// Check field name 'NotProgressive2' first before field var 'x_NotProgressive2'
		$val = $CurrentForm->hasValue("NotProgressive2") ? $CurrentForm->getValue("NotProgressive2") : $CurrentForm->getValue("x_NotProgressive2");
		if (!$this->NotProgressive2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NotProgressive2->Visible = FALSE; // Disable update for API request
			else
				$this->NotProgressive2->setFormValue($val);
		}
		$this->NotProgressive2->setOldValue($CurrentForm->getValue("o_NotProgressive2"));

		// Check field name 'Motility2' first before field var 'x_Motility2'
		$val = $CurrentForm->hasValue("Motility2") ? $CurrentForm->getValue("Motility2") : $CurrentForm->getValue("x_Motility2");
		if (!$this->Motility2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Motility2->Visible = FALSE; // Disable update for API request
			else
				$this->Motility2->setFormValue($val);
		}
		$this->Motility2->setOldValue($CurrentForm->getValue("o_Motility2"));

		// Check field name 'Morphology2' first before field var 'x_Morphology2'
		$val = $CurrentForm->hasValue("Morphology2") ? $CurrentForm->getValue("Morphology2") : $CurrentForm->getValue("x_Morphology2");
		if (!$this->Morphology2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Morphology2->Visible = FALSE; // Disable update for API request
			else
				$this->Morphology2->setFormValue($val);
		}
		$this->Morphology2->setOldValue($CurrentForm->getValue("o_Morphology2"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
		$this->Spermorigin->CurrentValue = $this->Spermorigin->FormValue;
		$this->IndicationforART->CurrentValue = $this->IndicationforART->FormValue;
		$this->DateofICSI->CurrentValue = $this->DateofICSI->FormValue;
		$this->DateofICSI->CurrentValue = UnFormatDateTime($this->DateofICSI->CurrentValue, 7);
		$this->Origin->CurrentValue = $this->Origin->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->pre_Concentration->CurrentValue = $this->pre_Concentration->FormValue;
		$this->pre_Motility->CurrentValue = $this->pre_Motility->FormValue;
		$this->pre_Morphology->CurrentValue = $this->pre_Morphology->FormValue;
		$this->post_Concentration->CurrentValue = $this->post_Concentration->FormValue;
		$this->post_Motility->CurrentValue = $this->post_Motility->FormValue;
		$this->post_Morphology->CurrentValue = $this->post_Morphology->FormValue;
		$this->NumberofEmbryostransferred->CurrentValue = $this->NumberofEmbryostransferred->FormValue;
		$this->Embryosunderobservation->CurrentValue = $this->Embryosunderobservation->FormValue;
		$this->EmbryoDevelopmentSummary->CurrentValue = $this->EmbryoDevelopmentSummary->FormValue;
		$this->EmbryologistSignature->CurrentValue = $this->EmbryologistSignature->FormValue;
		$this->IVFRegistrationID->CurrentValue = $this->IVFRegistrationID->FormValue;
		$this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
		$this->ICSIDetails->CurrentValue = $this->ICSIDetails->FormValue;
		$this->DateofET->CurrentValue = $this->DateofET->FormValue;
		$this->Reasonfornotranfer->CurrentValue = $this->Reasonfornotranfer->FormValue;
		$this->EmbryosCryopreserved->CurrentValue = $this->EmbryosCryopreserved->FormValue;
		$this->LegendCellStage->CurrentValue = $this->LegendCellStage->FormValue;
		$this->ConsultantsSignature->CurrentValue = $this->ConsultantsSignature->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->M2->CurrentValue = $this->M2->FormValue;
		$this->Mi2->CurrentValue = $this->Mi2->FormValue;
		$this->ICSI->CurrentValue = $this->ICSI->FormValue;
		$this->IVF->CurrentValue = $this->IVF->FormValue;
		$this->M1->CurrentValue = $this->M1->FormValue;
		$this->GV->CurrentValue = $this->GV->FormValue;
		$this->Others->CurrentValue = $this->Others->FormValue;
		$this->Normal2PN->CurrentValue = $this->Normal2PN->FormValue;
		$this->Abnormalfertilisation1N->CurrentValue = $this->Abnormalfertilisation1N->FormValue;
		$this->Abnormalfertilisation3N->CurrentValue = $this->Abnormalfertilisation3N->FormValue;
		$this->NotFertilized->CurrentValue = $this->NotFertilized->FormValue;
		$this->Degenerated->CurrentValue = $this->Degenerated->FormValue;
		$this->SpermDate->CurrentValue = $this->SpermDate->FormValue;
		$this->SpermDate->CurrentValue = UnFormatDateTime($this->SpermDate->CurrentValue, 0);
		$this->Code1->CurrentValue = $this->Code1->FormValue;
		$this->Day1->CurrentValue = $this->Day1->FormValue;
		$this->CellStage1->CurrentValue = $this->CellStage1->FormValue;
		$this->Grade1->CurrentValue = $this->Grade1->FormValue;
		$this->State1->CurrentValue = $this->State1->FormValue;
		$this->Code2->CurrentValue = $this->Code2->FormValue;
		$this->Day2->CurrentValue = $this->Day2->FormValue;
		$this->CellStage2->CurrentValue = $this->CellStage2->FormValue;
		$this->Grade2->CurrentValue = $this->Grade2->FormValue;
		$this->State2->CurrentValue = $this->State2->FormValue;
		$this->Code3->CurrentValue = $this->Code3->FormValue;
		$this->Day3->CurrentValue = $this->Day3->FormValue;
		$this->CellStage3->CurrentValue = $this->CellStage3->FormValue;
		$this->Grade3->CurrentValue = $this->Grade3->FormValue;
		$this->State3->CurrentValue = $this->State3->FormValue;
		$this->Code4->CurrentValue = $this->Code4->FormValue;
		$this->Day4->CurrentValue = $this->Day4->FormValue;
		$this->CellStage4->CurrentValue = $this->CellStage4->FormValue;
		$this->Grade4->CurrentValue = $this->Grade4->FormValue;
		$this->State4->CurrentValue = $this->State4->FormValue;
		$this->Code5->CurrentValue = $this->Code5->FormValue;
		$this->Day5->CurrentValue = $this->Day5->FormValue;
		$this->CellStage5->CurrentValue = $this->CellStage5->FormValue;
		$this->Grade5->CurrentValue = $this->Grade5->FormValue;
		$this->State5->CurrentValue = $this->State5->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->Volume->CurrentValue = $this->Volume->FormValue;
		$this->Volume1->CurrentValue = $this->Volume1->FormValue;
		$this->Volume2->CurrentValue = $this->Volume2->FormValue;
		$this->Concentration2->CurrentValue = $this->Concentration2->FormValue;
		$this->Total->CurrentValue = $this->Total->FormValue;
		$this->Total1->CurrentValue = $this->Total1->FormValue;
		$this->Total2->CurrentValue = $this->Total2->FormValue;
		$this->Progressive->CurrentValue = $this->Progressive->FormValue;
		$this->Progressive1->CurrentValue = $this->Progressive1->FormValue;
		$this->Progressive2->CurrentValue = $this->Progressive2->FormValue;
		$this->NotProgressive->CurrentValue = $this->NotProgressive->FormValue;
		$this->NotProgressive1->CurrentValue = $this->NotProgressive1->FormValue;
		$this->NotProgressive2->CurrentValue = $this->NotProgressive2->FormValue;
		$this->Motility2->CurrentValue = $this->Motility2->FormValue;
		$this->Morphology2->CurrentValue = $this->Morphology2->FormValue;
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
		$this->ARTCycle->setDbValue($row['ARTCycle']);
		$this->Spermorigin->setDbValue($row['Spermorigin']);
		$this->IndicationforART->setDbValue($row['IndicationforART']);
		$this->DateofICSI->setDbValue($row['DateofICSI']);
		$this->Origin->setDbValue($row['Origin']);
		$this->Status->setDbValue($row['Status']);
		$this->Method->setDbValue($row['Method']);
		$this->pre_Concentration->setDbValue($row['pre_Concentration']);
		$this->pre_Motility->setDbValue($row['pre_Motility']);
		$this->pre_Morphology->setDbValue($row['pre_Morphology']);
		$this->post_Concentration->setDbValue($row['post_Concentration']);
		$this->post_Motility->setDbValue($row['post_Motility']);
		$this->post_Morphology->setDbValue($row['post_Morphology']);
		$this->NumberofEmbryostransferred->setDbValue($row['NumberofEmbryostransferred']);
		$this->Embryosunderobservation->setDbValue($row['Embryosunderobservation']);
		$this->EmbryoDevelopmentSummary->setDbValue($row['EmbryoDevelopmentSummary']);
		$this->EmbryologistSignature->setDbValue($row['EmbryologistSignature']);
		$this->IVFRegistrationID->setDbValue($row['IVFRegistrationID']);
		$this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
		$this->ICSIDetails->setDbValue($row['ICSIDetails']);
		$this->DateofET->setDbValue($row['DateofET']);
		$this->Reasonfornotranfer->setDbValue($row['Reasonfornotranfer']);
		$this->EmbryosCryopreserved->setDbValue($row['EmbryosCryopreserved']);
		$this->LegendCellStage->setDbValue($row['LegendCellStage']);
		$this->ConsultantsSignature->setDbValue($row['ConsultantsSignature']);
		$this->Name->setDbValue($row['Name']);
		$this->M2->setDbValue($row['M2']);
		$this->Mi2->setDbValue($row['Mi2']);
		$this->ICSI->setDbValue($row['ICSI']);
		$this->IVF->setDbValue($row['IVF']);
		$this->M1->setDbValue($row['M1']);
		$this->GV->setDbValue($row['GV']);
		$this->Others->setDbValue($row['Others']);
		$this->Normal2PN->setDbValue($row['Normal2PN']);
		$this->Abnormalfertilisation1N->setDbValue($row['Abnormalfertilisation1N']);
		$this->Abnormalfertilisation3N->setDbValue($row['Abnormalfertilisation3N']);
		$this->NotFertilized->setDbValue($row['NotFertilized']);
		$this->Degenerated->setDbValue($row['Degenerated']);
		$this->SpermDate->setDbValue($row['SpermDate']);
		$this->Code1->setDbValue($row['Code1']);
		$this->Day1->setDbValue($row['Day1']);
		$this->CellStage1->setDbValue($row['CellStage1']);
		$this->Grade1->setDbValue($row['Grade1']);
		$this->State1->setDbValue($row['State1']);
		$this->Code2->setDbValue($row['Code2']);
		$this->Day2->setDbValue($row['Day2']);
		$this->CellStage2->setDbValue($row['CellStage2']);
		$this->Grade2->setDbValue($row['Grade2']);
		$this->State2->setDbValue($row['State2']);
		$this->Code3->setDbValue($row['Code3']);
		$this->Day3->setDbValue($row['Day3']);
		$this->CellStage3->setDbValue($row['CellStage3']);
		$this->Grade3->setDbValue($row['Grade3']);
		$this->State3->setDbValue($row['State3']);
		$this->Code4->setDbValue($row['Code4']);
		$this->Day4->setDbValue($row['Day4']);
		$this->CellStage4->setDbValue($row['CellStage4']);
		$this->Grade4->setDbValue($row['Grade4']);
		$this->State4->setDbValue($row['State4']);
		$this->Code5->setDbValue($row['Code5']);
		$this->Day5->setDbValue($row['Day5']);
		$this->CellStage5->setDbValue($row['CellStage5']);
		$this->Grade5->setDbValue($row['Grade5']);
		$this->State5->setDbValue($row['State5']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Volume->setDbValue($row['Volume']);
		$this->Volume1->setDbValue($row['Volume1']);
		$this->Volume2->setDbValue($row['Volume2']);
		$this->Concentration2->setDbValue($row['Concentration2']);
		$this->Total->setDbValue($row['Total']);
		$this->Total1->setDbValue($row['Total1']);
		$this->Total2->setDbValue($row['Total2']);
		$this->Progressive->setDbValue($row['Progressive']);
		$this->Progressive1->setDbValue($row['Progressive1']);
		$this->Progressive2->setDbValue($row['Progressive2']);
		$this->NotProgressive->setDbValue($row['NotProgressive']);
		$this->NotProgressive1->setDbValue($row['NotProgressive1']);
		$this->NotProgressive2->setDbValue($row['NotProgressive2']);
		$this->Motility2->setDbValue($row['Motility2']);
		$this->Morphology2->setDbValue($row['Morphology2']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['ARTCycle'] = $this->ARTCycle->CurrentValue;
		$row['Spermorigin'] = $this->Spermorigin->CurrentValue;
		$row['IndicationforART'] = $this->IndicationforART->CurrentValue;
		$row['DateofICSI'] = $this->DateofICSI->CurrentValue;
		$row['Origin'] = $this->Origin->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['Method'] = $this->Method->CurrentValue;
		$row['pre_Concentration'] = $this->pre_Concentration->CurrentValue;
		$row['pre_Motility'] = $this->pre_Motility->CurrentValue;
		$row['pre_Morphology'] = $this->pre_Morphology->CurrentValue;
		$row['post_Concentration'] = $this->post_Concentration->CurrentValue;
		$row['post_Motility'] = $this->post_Motility->CurrentValue;
		$row['post_Morphology'] = $this->post_Morphology->CurrentValue;
		$row['NumberofEmbryostransferred'] = $this->NumberofEmbryostransferred->CurrentValue;
		$row['Embryosunderobservation'] = $this->Embryosunderobservation->CurrentValue;
		$row['EmbryoDevelopmentSummary'] = $this->EmbryoDevelopmentSummary->CurrentValue;
		$row['EmbryologistSignature'] = $this->EmbryologistSignature->CurrentValue;
		$row['IVFRegistrationID'] = $this->IVFRegistrationID->CurrentValue;
		$row['InseminatinTechnique'] = $this->InseminatinTechnique->CurrentValue;
		$row['ICSIDetails'] = $this->ICSIDetails->CurrentValue;
		$row['DateofET'] = $this->DateofET->CurrentValue;
		$row['Reasonfornotranfer'] = $this->Reasonfornotranfer->CurrentValue;
		$row['EmbryosCryopreserved'] = $this->EmbryosCryopreserved->CurrentValue;
		$row['LegendCellStage'] = $this->LegendCellStage->CurrentValue;
		$row['ConsultantsSignature'] = $this->ConsultantsSignature->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['M2'] = $this->M2->CurrentValue;
		$row['Mi2'] = $this->Mi2->CurrentValue;
		$row['ICSI'] = $this->ICSI->CurrentValue;
		$row['IVF'] = $this->IVF->CurrentValue;
		$row['M1'] = $this->M1->CurrentValue;
		$row['GV'] = $this->GV->CurrentValue;
		$row['Others'] = $this->Others->CurrentValue;
		$row['Normal2PN'] = $this->Normal2PN->CurrentValue;
		$row['Abnormalfertilisation1N'] = $this->Abnormalfertilisation1N->CurrentValue;
		$row['Abnormalfertilisation3N'] = $this->Abnormalfertilisation3N->CurrentValue;
		$row['NotFertilized'] = $this->NotFertilized->CurrentValue;
		$row['Degenerated'] = $this->Degenerated->CurrentValue;
		$row['SpermDate'] = $this->SpermDate->CurrentValue;
		$row['Code1'] = $this->Code1->CurrentValue;
		$row['Day1'] = $this->Day1->CurrentValue;
		$row['CellStage1'] = $this->CellStage1->CurrentValue;
		$row['Grade1'] = $this->Grade1->CurrentValue;
		$row['State1'] = $this->State1->CurrentValue;
		$row['Code2'] = $this->Code2->CurrentValue;
		$row['Day2'] = $this->Day2->CurrentValue;
		$row['CellStage2'] = $this->CellStage2->CurrentValue;
		$row['Grade2'] = $this->Grade2->CurrentValue;
		$row['State2'] = $this->State2->CurrentValue;
		$row['Code3'] = $this->Code3->CurrentValue;
		$row['Day3'] = $this->Day3->CurrentValue;
		$row['CellStage3'] = $this->CellStage3->CurrentValue;
		$row['Grade3'] = $this->Grade3->CurrentValue;
		$row['State3'] = $this->State3->CurrentValue;
		$row['Code4'] = $this->Code4->CurrentValue;
		$row['Day4'] = $this->Day4->CurrentValue;
		$row['CellStage4'] = $this->CellStage4->CurrentValue;
		$row['Grade4'] = $this->Grade4->CurrentValue;
		$row['State4'] = $this->State4->CurrentValue;
		$row['Code5'] = $this->Code5->CurrentValue;
		$row['Day5'] = $this->Day5->CurrentValue;
		$row['CellStage5'] = $this->CellStage5->CurrentValue;
		$row['Grade5'] = $this->Grade5->CurrentValue;
		$row['State5'] = $this->State5->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['Volume'] = $this->Volume->CurrentValue;
		$row['Volume1'] = $this->Volume1->CurrentValue;
		$row['Volume2'] = $this->Volume2->CurrentValue;
		$row['Concentration2'] = $this->Concentration2->CurrentValue;
		$row['Total'] = $this->Total->CurrentValue;
		$row['Total1'] = $this->Total1->CurrentValue;
		$row['Total2'] = $this->Total2->CurrentValue;
		$row['Progressive'] = $this->Progressive->CurrentValue;
		$row['Progressive1'] = $this->Progressive1->CurrentValue;
		$row['Progressive2'] = $this->Progressive2->CurrentValue;
		$row['NotProgressive'] = $this->NotProgressive->CurrentValue;
		$row['NotProgressive1'] = $this->NotProgressive1->CurrentValue;
		$row['NotProgressive2'] = $this->NotProgressive2->CurrentValue;
		$row['Motility2'] = $this->Motility2->CurrentValue;
		$row['Morphology2'] = $this->Morphology2->CurrentValue;
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
		// ARTCycle
		// Spermorigin
		// IndicationforART
		// DateofICSI
		// Origin
		// Status
		// Method
		// pre_Concentration
		// pre_Motility
		// pre_Morphology
		// post_Concentration
		// post_Motility
		// post_Morphology
		// NumberofEmbryostransferred
		// Embryosunderobservation
		// EmbryoDevelopmentSummary
		// EmbryologistSignature
		// IVFRegistrationID
		// InseminatinTechnique
		// ICSIDetails
		// DateofET
		// Reasonfornotranfer
		// EmbryosCryopreserved
		// LegendCellStage
		// ConsultantsSignature
		// Name
		// M2
		// Mi2
		// ICSI
		// IVF
		// M1
		// GV
		// Others
		// Normal2PN
		// Abnormalfertilisation1N
		// Abnormalfertilisation3N
		// NotFertilized
		// Degenerated
		// SpermDate
		// Code1
		// Day1
		// CellStage1
		// Grade1
		// State1
		// Code2
		// Day2
		// CellStage2
		// Grade2
		// State2
		// Code3
		// Day3
		// CellStage3
		// Grade3
		// State3
		// Code4
		// Day4
		// CellStage4
		// Grade4
		// State4
		// Code5
		// Day5
		// CellStage5
		// Grade5
		// State5
		// TidNo
		// RIDNo
		// Volume
		// Volume1
		// Volume2
		// Concentration2
		// Total
		// Total1
		// Total2
		// Progressive
		// Progressive1
		// Progressive2
		// NotProgressive
		// NotProgressive1
		// NotProgressive2
		// Motility2
		// Morphology2

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// ARTCycle
			if (strval($this->ARTCycle->CurrentValue) <> "") {
				$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
			} else {
				$this->ARTCycle->ViewValue = NULL;
			}
			$this->ARTCycle->ViewCustomAttributes = "";

			// Spermorigin
			if (strval($this->Spermorigin->CurrentValue) <> "") {
				$this->Spermorigin->ViewValue = $this->Spermorigin->optionCaption($this->Spermorigin->CurrentValue);
			} else {
				$this->Spermorigin->ViewValue = NULL;
			}
			$this->Spermorigin->ViewCustomAttributes = "";

			// IndicationforART
			$this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
			$this->IndicationforART->ViewCustomAttributes = "";

			// DateofICSI
			$this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
			$this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 7);
			$this->DateofICSI->ViewCustomAttributes = "";

			// Origin
			if (strval($this->Origin->CurrentValue) <> "") {
				$this->Origin->ViewValue = $this->Origin->optionCaption($this->Origin->CurrentValue);
			} else {
				$this->Origin->ViewValue = NULL;
			}
			$this->Origin->ViewCustomAttributes = "";

			// Status
			if (strval($this->Status->CurrentValue) <> "") {
				$this->Status->ViewValue = $this->Status->optionCaption($this->Status->CurrentValue);
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// Method
			if (strval($this->Method->CurrentValue) <> "") {
				$this->Method->ViewValue = $this->Method->optionCaption($this->Method->CurrentValue);
			} else {
				$this->Method->ViewValue = NULL;
			}
			$this->Method->ViewCustomAttributes = "";

			// pre_Concentration
			$this->pre_Concentration->ViewValue = $this->pre_Concentration->CurrentValue;
			$this->pre_Concentration->ViewCustomAttributes = "";

			// pre_Motility
			$this->pre_Motility->ViewValue = $this->pre_Motility->CurrentValue;
			$this->pre_Motility->ViewCustomAttributes = "";

			// pre_Morphology
			$this->pre_Morphology->ViewValue = $this->pre_Morphology->CurrentValue;
			$this->pre_Morphology->ViewCustomAttributes = "";

			// post_Concentration
			$this->post_Concentration->ViewValue = $this->post_Concentration->CurrentValue;
			$this->post_Concentration->ViewCustomAttributes = "";

			// post_Motility
			$this->post_Motility->ViewValue = $this->post_Motility->CurrentValue;
			$this->post_Motility->ViewCustomAttributes = "";

			// post_Morphology
			$this->post_Morphology->ViewValue = $this->post_Morphology->CurrentValue;
			$this->post_Morphology->ViewCustomAttributes = "";

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
			$this->NumberofEmbryostransferred->ViewCustomAttributes = "";

			// Embryosunderobservation
			$this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
			$this->Embryosunderobservation->ViewCustomAttributes = "";

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
			$this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

			// EmbryologistSignature
			$this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
			$this->EmbryologistSignature->ViewCustomAttributes = "";

			// IVFRegistrationID
			$this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
			$this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
			$this->IVFRegistrationID->ViewCustomAttributes = "";

			// InseminatinTechnique
			if (strval($this->InseminatinTechnique->CurrentValue) <> "") {
				$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
			} else {
				$this->InseminatinTechnique->ViewValue = NULL;
			}
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// ICSIDetails
			$this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
			$this->ICSIDetails->ViewCustomAttributes = "";

			// DateofET
			if (strval($this->DateofET->CurrentValue) <> "") {
				$this->DateofET->ViewValue = $this->DateofET->optionCaption($this->DateofET->CurrentValue);
			} else {
				$this->DateofET->ViewValue = NULL;
			}
			$this->DateofET->ViewCustomAttributes = "";

			// Reasonfornotranfer
			if (strval($this->Reasonfornotranfer->CurrentValue) <> "") {
				$this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->optionCaption($this->Reasonfornotranfer->CurrentValue);
			} else {
				$this->Reasonfornotranfer->ViewValue = NULL;
			}
			$this->Reasonfornotranfer->ViewCustomAttributes = "";

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
			$this->EmbryosCryopreserved->ViewCustomAttributes = "";

			// LegendCellStage
			$this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
			$this->LegendCellStage->ViewCustomAttributes = "";

			// ConsultantsSignature
			$curVal = strval($this->ConsultantsSignature->CurrentValue);
			if ($curVal <> "") {
				$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
				if ($this->ConsultantsSignature->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ConsultantsSignature->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
					}
				}
			} else {
				$this->ConsultantsSignature->ViewValue = NULL;
			}
			$this->ConsultantsSignature->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// M2
			$this->M2->ViewValue = $this->M2->CurrentValue;
			$this->M2->ViewCustomAttributes = "";

			// Mi2
			$this->Mi2->ViewValue = $this->Mi2->CurrentValue;
			$this->Mi2->ViewCustomAttributes = "";

			// ICSI
			$this->ICSI->ViewValue = $this->ICSI->CurrentValue;
			$this->ICSI->ViewCustomAttributes = "";

			// IVF
			$this->IVF->ViewValue = $this->IVF->CurrentValue;
			$this->IVF->ViewCustomAttributes = "";

			// M1
			$this->M1->ViewValue = $this->M1->CurrentValue;
			$this->M1->ViewCustomAttributes = "";

			// GV
			$this->GV->ViewValue = $this->GV->CurrentValue;
			$this->GV->ViewCustomAttributes = "";

			// Others
			$this->Others->ViewValue = $this->Others->CurrentValue;
			$this->Others->ViewCustomAttributes = "";

			// Normal2PN
			$this->Normal2PN->ViewValue = $this->Normal2PN->CurrentValue;
			$this->Normal2PN->ViewCustomAttributes = "";

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->ViewValue = $this->Abnormalfertilisation1N->CurrentValue;
			$this->Abnormalfertilisation1N->ViewCustomAttributes = "";

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->ViewValue = $this->Abnormalfertilisation3N->CurrentValue;
			$this->Abnormalfertilisation3N->ViewCustomAttributes = "";

			// NotFertilized
			$this->NotFertilized->ViewValue = $this->NotFertilized->CurrentValue;
			$this->NotFertilized->ViewCustomAttributes = "";

			// Degenerated
			$this->Degenerated->ViewValue = $this->Degenerated->CurrentValue;
			$this->Degenerated->ViewCustomAttributes = "";

			// SpermDate
			$this->SpermDate->ViewValue = $this->SpermDate->CurrentValue;
			$this->SpermDate->ViewValue = FormatDateTime($this->SpermDate->ViewValue, 0);
			$this->SpermDate->ViewCustomAttributes = "";

			// Code1
			$this->Code1->ViewValue = $this->Code1->CurrentValue;
			$this->Code1->ViewCustomAttributes = "";

			// Day1
			if (strval($this->Day1->CurrentValue) <> "") {
				$this->Day1->ViewValue = $this->Day1->optionCaption($this->Day1->CurrentValue);
			} else {
				$this->Day1->ViewValue = NULL;
			}
			$this->Day1->ViewCustomAttributes = "";

			// CellStage1
			if (strval($this->CellStage1->CurrentValue) <> "") {
				$this->CellStage1->ViewValue = $this->CellStage1->optionCaption($this->CellStage1->CurrentValue);
			} else {
				$this->CellStage1->ViewValue = NULL;
			}
			$this->CellStage1->ViewCustomAttributes = "";

			// Grade1
			if (strval($this->Grade1->CurrentValue) <> "") {
				$this->Grade1->ViewValue = $this->Grade1->optionCaption($this->Grade1->CurrentValue);
			} else {
				$this->Grade1->ViewValue = NULL;
			}
			$this->Grade1->ViewCustomAttributes = "";

			// State1
			if (strval($this->State1->CurrentValue) <> "") {
				$this->State1->ViewValue = $this->State1->optionCaption($this->State1->CurrentValue);
			} else {
				$this->State1->ViewValue = NULL;
			}
			$this->State1->ViewCustomAttributes = "";

			// Code2
			$this->Code2->ViewValue = $this->Code2->CurrentValue;
			$this->Code2->ViewCustomAttributes = "";

			// Day2
			if (strval($this->Day2->CurrentValue) <> "") {
				$this->Day2->ViewValue = $this->Day2->optionCaption($this->Day2->CurrentValue);
			} else {
				$this->Day2->ViewValue = NULL;
			}
			$this->Day2->ViewCustomAttributes = "";

			// CellStage2
			if (strval($this->CellStage2->CurrentValue) <> "") {
				$this->CellStage2->ViewValue = $this->CellStage2->optionCaption($this->CellStage2->CurrentValue);
			} else {
				$this->CellStage2->ViewValue = NULL;
			}
			$this->CellStage2->ViewCustomAttributes = "";

			// Grade2
			if (strval($this->Grade2->CurrentValue) <> "") {
				$this->Grade2->ViewValue = $this->Grade2->optionCaption($this->Grade2->CurrentValue);
			} else {
				$this->Grade2->ViewValue = NULL;
			}
			$this->Grade2->ViewCustomAttributes = "";

			// State2
			if (strval($this->State2->CurrentValue) <> "") {
				$this->State2->ViewValue = $this->State2->optionCaption($this->State2->CurrentValue);
			} else {
				$this->State2->ViewValue = NULL;
			}
			$this->State2->ViewCustomAttributes = "";

			// Code3
			$this->Code3->ViewValue = $this->Code3->CurrentValue;
			$this->Code3->ViewCustomAttributes = "";

			// Day3
			if (strval($this->Day3->CurrentValue) <> "") {
				$this->Day3->ViewValue = $this->Day3->optionCaption($this->Day3->CurrentValue);
			} else {
				$this->Day3->ViewValue = NULL;
			}
			$this->Day3->ViewCustomAttributes = "";

			// CellStage3
			if (strval($this->CellStage3->CurrentValue) <> "") {
				$this->CellStage3->ViewValue = $this->CellStage3->optionCaption($this->CellStage3->CurrentValue);
			} else {
				$this->CellStage3->ViewValue = NULL;
			}
			$this->CellStage3->ViewCustomAttributes = "";

			// Grade3
			if (strval($this->Grade3->CurrentValue) <> "") {
				$this->Grade3->ViewValue = $this->Grade3->optionCaption($this->Grade3->CurrentValue);
			} else {
				$this->Grade3->ViewValue = NULL;
			}
			$this->Grade3->ViewCustomAttributes = "";

			// State3
			if (strval($this->State3->CurrentValue) <> "") {
				$this->State3->ViewValue = $this->State3->optionCaption($this->State3->CurrentValue);
			} else {
				$this->State3->ViewValue = NULL;
			}
			$this->State3->ViewCustomAttributes = "";

			// Code4
			$this->Code4->ViewValue = $this->Code4->CurrentValue;
			$this->Code4->ViewCustomAttributes = "";

			// Day4
			if (strval($this->Day4->CurrentValue) <> "") {
				$this->Day4->ViewValue = $this->Day4->optionCaption($this->Day4->CurrentValue);
			} else {
				$this->Day4->ViewValue = NULL;
			}
			$this->Day4->ViewCustomAttributes = "";

			// CellStage4
			if (strval($this->CellStage4->CurrentValue) <> "") {
				$this->CellStage4->ViewValue = $this->CellStage4->optionCaption($this->CellStage4->CurrentValue);
			} else {
				$this->CellStage4->ViewValue = NULL;
			}
			$this->CellStage4->ViewCustomAttributes = "";

			// Grade4
			if (strval($this->Grade4->CurrentValue) <> "") {
				$this->Grade4->ViewValue = $this->Grade4->optionCaption($this->Grade4->CurrentValue);
			} else {
				$this->Grade4->ViewValue = NULL;
			}
			$this->Grade4->ViewCustomAttributes = "";

			// State4
			if (strval($this->State4->CurrentValue) <> "") {
				$this->State4->ViewValue = $this->State4->optionCaption($this->State4->CurrentValue);
			} else {
				$this->State4->ViewValue = NULL;
			}
			$this->State4->ViewCustomAttributes = "";

			// Code5
			$this->Code5->ViewValue = $this->Code5->CurrentValue;
			$this->Code5->ViewCustomAttributes = "";

			// Day5
			if (strval($this->Day5->CurrentValue) <> "") {
				$this->Day5->ViewValue = $this->Day5->optionCaption($this->Day5->CurrentValue);
			} else {
				$this->Day5->ViewValue = NULL;
			}
			$this->Day5->ViewCustomAttributes = "";

			// CellStage5
			if (strval($this->CellStage5->CurrentValue) <> "") {
				$this->CellStage5->ViewValue = $this->CellStage5->optionCaption($this->CellStage5->CurrentValue);
			} else {
				$this->CellStage5->ViewValue = NULL;
			}
			$this->CellStage5->ViewCustomAttributes = "";

			// Grade5
			if (strval($this->Grade5->CurrentValue) <> "") {
				$this->Grade5->ViewValue = $this->Grade5->optionCaption($this->Grade5->CurrentValue);
			} else {
				$this->Grade5->ViewValue = NULL;
			}
			$this->Grade5->ViewCustomAttributes = "";

			// State5
			if (strval($this->State5->CurrentValue) <> "") {
				$this->State5->ViewValue = $this->State5->optionCaption($this->State5->CurrentValue);
			} else {
				$this->State5->ViewValue = NULL;
			}
			$this->State5->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// Volume
			$this->Volume->ViewValue = $this->Volume->CurrentValue;
			$this->Volume->ViewCustomAttributes = "";

			// Volume1
			$this->Volume1->ViewValue = $this->Volume1->CurrentValue;
			$this->Volume1->ViewCustomAttributes = "";

			// Volume2
			$this->Volume2->ViewValue = $this->Volume2->CurrentValue;
			$this->Volume2->ViewCustomAttributes = "";

			// Concentration2
			$this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
			$this->Concentration2->ViewCustomAttributes = "";

			// Total
			$this->Total->ViewValue = $this->Total->CurrentValue;
			$this->Total->ViewCustomAttributes = "";

			// Total1
			$this->Total1->ViewValue = $this->Total1->CurrentValue;
			$this->Total1->ViewCustomAttributes = "";

			// Total2
			$this->Total2->ViewValue = $this->Total2->CurrentValue;
			$this->Total2->ViewCustomAttributes = "";

			// Progressive
			$this->Progressive->ViewValue = $this->Progressive->CurrentValue;
			$this->Progressive->ViewCustomAttributes = "";

			// Progressive1
			$this->Progressive1->ViewValue = $this->Progressive1->CurrentValue;
			$this->Progressive1->ViewCustomAttributes = "";

			// Progressive2
			$this->Progressive2->ViewValue = $this->Progressive2->CurrentValue;
			$this->Progressive2->ViewCustomAttributes = "";

			// NotProgressive
			$this->NotProgressive->ViewValue = $this->NotProgressive->CurrentValue;
			$this->NotProgressive->ViewCustomAttributes = "";

			// NotProgressive1
			$this->NotProgressive1->ViewValue = $this->NotProgressive1->CurrentValue;
			$this->NotProgressive1->ViewCustomAttributes = "";

			// NotProgressive2
			$this->NotProgressive2->ViewValue = $this->NotProgressive2->CurrentValue;
			$this->NotProgressive2->ViewCustomAttributes = "";

			// Motility2
			$this->Motility2->ViewValue = $this->Motility2->CurrentValue;
			$this->Motility2->ViewCustomAttributes = "";

			// Morphology2
			$this->Morphology2->ViewValue = $this->Morphology2->CurrentValue;
			$this->Morphology2->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";
			$this->ARTCycle->TooltipValue = "";

			// Spermorigin
			$this->Spermorigin->LinkCustomAttributes = "";
			$this->Spermorigin->HrefValue = "";
			$this->Spermorigin->TooltipValue = "";

			// IndicationforART
			$this->IndicationforART->LinkCustomAttributes = "";
			$this->IndicationforART->HrefValue = "";
			$this->IndicationforART->TooltipValue = "";

			// DateofICSI
			$this->DateofICSI->LinkCustomAttributes = "";
			$this->DateofICSI->HrefValue = "";
			$this->DateofICSI->TooltipValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";
			$this->Origin->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// pre_Concentration
			$this->pre_Concentration->LinkCustomAttributes = "";
			$this->pre_Concentration->HrefValue = "";
			$this->pre_Concentration->TooltipValue = "";

			// pre_Motility
			$this->pre_Motility->LinkCustomAttributes = "";
			$this->pre_Motility->HrefValue = "";
			$this->pre_Motility->TooltipValue = "";

			// pre_Morphology
			$this->pre_Morphology->LinkCustomAttributes = "";
			$this->pre_Morphology->HrefValue = "";
			$this->pre_Morphology->TooltipValue = "";

			// post_Concentration
			$this->post_Concentration->LinkCustomAttributes = "";
			$this->post_Concentration->HrefValue = "";
			$this->post_Concentration->TooltipValue = "";

			// post_Motility
			$this->post_Motility->LinkCustomAttributes = "";
			$this->post_Motility->HrefValue = "";
			$this->post_Motility->TooltipValue = "";

			// post_Morphology
			$this->post_Morphology->LinkCustomAttributes = "";
			$this->post_Morphology->HrefValue = "";
			$this->post_Morphology->TooltipValue = "";

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->LinkCustomAttributes = "";
			$this->NumberofEmbryostransferred->HrefValue = "";
			$this->NumberofEmbryostransferred->TooltipValue = "";

			// Embryosunderobservation
			$this->Embryosunderobservation->LinkCustomAttributes = "";
			$this->Embryosunderobservation->HrefValue = "";
			$this->Embryosunderobservation->TooltipValue = "";

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
			$this->EmbryoDevelopmentSummary->HrefValue = "";
			$this->EmbryoDevelopmentSummary->TooltipValue = "";

			// EmbryologistSignature
			$this->EmbryologistSignature->LinkCustomAttributes = "";
			$this->EmbryologistSignature->HrefValue = "";
			$this->EmbryologistSignature->TooltipValue = "";

			// IVFRegistrationID
			$this->IVFRegistrationID->LinkCustomAttributes = "";
			$this->IVFRegistrationID->HrefValue = "";
			$this->IVFRegistrationID->TooltipValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";
			$this->InseminatinTechnique->TooltipValue = "";

			// ICSIDetails
			$this->ICSIDetails->LinkCustomAttributes = "";
			$this->ICSIDetails->HrefValue = "";
			$this->ICSIDetails->TooltipValue = "";

			// DateofET
			$this->DateofET->LinkCustomAttributes = "";
			$this->DateofET->HrefValue = "";
			$this->DateofET->TooltipValue = "";

			// Reasonfornotranfer
			$this->Reasonfornotranfer->LinkCustomAttributes = "";
			$this->Reasonfornotranfer->HrefValue = "";
			$this->Reasonfornotranfer->TooltipValue = "";

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->LinkCustomAttributes = "";
			$this->EmbryosCryopreserved->HrefValue = "";
			$this->EmbryosCryopreserved->TooltipValue = "";

			// LegendCellStage
			$this->LegendCellStage->LinkCustomAttributes = "";
			$this->LegendCellStage->HrefValue = "";
			$this->LegendCellStage->TooltipValue = "";

			// ConsultantsSignature
			$this->ConsultantsSignature->LinkCustomAttributes = "";
			$this->ConsultantsSignature->HrefValue = "";
			$this->ConsultantsSignature->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// M2
			$this->M2->LinkCustomAttributes = "";
			$this->M2->HrefValue = "";
			$this->M2->TooltipValue = "";

			// Mi2
			$this->Mi2->LinkCustomAttributes = "";
			$this->Mi2->HrefValue = "";
			$this->Mi2->TooltipValue = "";

			// ICSI
			$this->ICSI->LinkCustomAttributes = "";
			$this->ICSI->HrefValue = "";
			$this->ICSI->TooltipValue = "";

			// IVF
			$this->IVF->LinkCustomAttributes = "";
			$this->IVF->HrefValue = "";
			$this->IVF->TooltipValue = "";

			// M1
			$this->M1->LinkCustomAttributes = "";
			$this->M1->HrefValue = "";
			$this->M1->TooltipValue = "";

			// GV
			$this->GV->LinkCustomAttributes = "";
			$this->GV->HrefValue = "";
			$this->GV->TooltipValue = "";

			// Others
			$this->Others->LinkCustomAttributes = "";
			$this->Others->HrefValue = "";
			$this->Others->TooltipValue = "";

			// Normal2PN
			$this->Normal2PN->LinkCustomAttributes = "";
			$this->Normal2PN->HrefValue = "";
			$this->Normal2PN->TooltipValue = "";

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->LinkCustomAttributes = "";
			$this->Abnormalfertilisation1N->HrefValue = "";
			$this->Abnormalfertilisation1N->TooltipValue = "";

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->LinkCustomAttributes = "";
			$this->Abnormalfertilisation3N->HrefValue = "";
			$this->Abnormalfertilisation3N->TooltipValue = "";

			// NotFertilized
			$this->NotFertilized->LinkCustomAttributes = "";
			$this->NotFertilized->HrefValue = "";
			$this->NotFertilized->TooltipValue = "";

			// Degenerated
			$this->Degenerated->LinkCustomAttributes = "";
			$this->Degenerated->HrefValue = "";
			$this->Degenerated->TooltipValue = "";

			// SpermDate
			$this->SpermDate->LinkCustomAttributes = "";
			$this->SpermDate->HrefValue = "";
			$this->SpermDate->TooltipValue = "";

			// Code1
			$this->Code1->LinkCustomAttributes = "";
			$this->Code1->HrefValue = "";
			$this->Code1->TooltipValue = "";

			// Day1
			$this->Day1->LinkCustomAttributes = "";
			$this->Day1->HrefValue = "";
			$this->Day1->TooltipValue = "";

			// CellStage1
			$this->CellStage1->LinkCustomAttributes = "";
			$this->CellStage1->HrefValue = "";
			$this->CellStage1->TooltipValue = "";

			// Grade1
			$this->Grade1->LinkCustomAttributes = "";
			$this->Grade1->HrefValue = "";
			$this->Grade1->TooltipValue = "";

			// State1
			$this->State1->LinkCustomAttributes = "";
			$this->State1->HrefValue = "";
			$this->State1->TooltipValue = "";

			// Code2
			$this->Code2->LinkCustomAttributes = "";
			$this->Code2->HrefValue = "";
			$this->Code2->TooltipValue = "";

			// Day2
			$this->Day2->LinkCustomAttributes = "";
			$this->Day2->HrefValue = "";
			$this->Day2->TooltipValue = "";

			// CellStage2
			$this->CellStage2->LinkCustomAttributes = "";
			$this->CellStage2->HrefValue = "";
			$this->CellStage2->TooltipValue = "";

			// Grade2
			$this->Grade2->LinkCustomAttributes = "";
			$this->Grade2->HrefValue = "";
			$this->Grade2->TooltipValue = "";

			// State2
			$this->State2->LinkCustomAttributes = "";
			$this->State2->HrefValue = "";
			$this->State2->TooltipValue = "";

			// Code3
			$this->Code3->LinkCustomAttributes = "";
			$this->Code3->HrefValue = "";
			$this->Code3->TooltipValue = "";

			// Day3
			$this->Day3->LinkCustomAttributes = "";
			$this->Day3->HrefValue = "";
			$this->Day3->TooltipValue = "";

			// CellStage3
			$this->CellStage3->LinkCustomAttributes = "";
			$this->CellStage3->HrefValue = "";
			$this->CellStage3->TooltipValue = "";

			// Grade3
			$this->Grade3->LinkCustomAttributes = "";
			$this->Grade3->HrefValue = "";
			$this->Grade3->TooltipValue = "";

			// State3
			$this->State3->LinkCustomAttributes = "";
			$this->State3->HrefValue = "";
			$this->State3->TooltipValue = "";

			// Code4
			$this->Code4->LinkCustomAttributes = "";
			$this->Code4->HrefValue = "";
			$this->Code4->TooltipValue = "";

			// Day4
			$this->Day4->LinkCustomAttributes = "";
			$this->Day4->HrefValue = "";
			$this->Day4->TooltipValue = "";

			// CellStage4
			$this->CellStage4->LinkCustomAttributes = "";
			$this->CellStage4->HrefValue = "";
			$this->CellStage4->TooltipValue = "";

			// Grade4
			$this->Grade4->LinkCustomAttributes = "";
			$this->Grade4->HrefValue = "";
			$this->Grade4->TooltipValue = "";

			// State4
			$this->State4->LinkCustomAttributes = "";
			$this->State4->HrefValue = "";
			$this->State4->TooltipValue = "";

			// Code5
			$this->Code5->LinkCustomAttributes = "";
			$this->Code5->HrefValue = "";
			$this->Code5->TooltipValue = "";

			// Day5
			$this->Day5->LinkCustomAttributes = "";
			$this->Day5->HrefValue = "";
			$this->Day5->TooltipValue = "";

			// CellStage5
			$this->CellStage5->LinkCustomAttributes = "";
			$this->CellStage5->HrefValue = "";
			$this->CellStage5->TooltipValue = "";

			// Grade5
			$this->Grade5->LinkCustomAttributes = "";
			$this->Grade5->HrefValue = "";
			$this->Grade5->TooltipValue = "";

			// State5
			$this->State5->LinkCustomAttributes = "";
			$this->State5->HrefValue = "";
			$this->State5->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";
			$this->Volume->TooltipValue = "";

			// Volume1
			$this->Volume1->LinkCustomAttributes = "";
			$this->Volume1->HrefValue = "";
			$this->Volume1->TooltipValue = "";

			// Volume2
			$this->Volume2->LinkCustomAttributes = "";
			$this->Volume2->HrefValue = "";
			$this->Volume2->TooltipValue = "";

			// Concentration2
			$this->Concentration2->LinkCustomAttributes = "";
			$this->Concentration2->HrefValue = "";
			$this->Concentration2->TooltipValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";
			$this->Total->TooltipValue = "";

			// Total1
			$this->Total1->LinkCustomAttributes = "";
			$this->Total1->HrefValue = "";
			$this->Total1->TooltipValue = "";

			// Total2
			$this->Total2->LinkCustomAttributes = "";
			$this->Total2->HrefValue = "";
			$this->Total2->TooltipValue = "";

			// Progressive
			$this->Progressive->LinkCustomAttributes = "";
			$this->Progressive->HrefValue = "";
			$this->Progressive->TooltipValue = "";

			// Progressive1
			$this->Progressive1->LinkCustomAttributes = "";
			$this->Progressive1->HrefValue = "";
			$this->Progressive1->TooltipValue = "";

			// Progressive2
			$this->Progressive2->LinkCustomAttributes = "";
			$this->Progressive2->HrefValue = "";
			$this->Progressive2->TooltipValue = "";

			// NotProgressive
			$this->NotProgressive->LinkCustomAttributes = "";
			$this->NotProgressive->HrefValue = "";
			$this->NotProgressive->TooltipValue = "";

			// NotProgressive1
			$this->NotProgressive1->LinkCustomAttributes = "";
			$this->NotProgressive1->HrefValue = "";
			$this->NotProgressive1->TooltipValue = "";

			// NotProgressive2
			$this->NotProgressive2->LinkCustomAttributes = "";
			$this->NotProgressive2->HrefValue = "";
			$this->NotProgressive2->TooltipValue = "";

			// Motility2
			$this->Motility2->LinkCustomAttributes = "";
			$this->Motility2->HrefValue = "";
			$this->Motility2->TooltipValue = "";

			// Morphology2
			$this->Morphology2->LinkCustomAttributes = "";
			$this->Morphology2->HrefValue = "";
			$this->Morphology2->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// ARTCycle

			$this->ARTCycle->EditAttrs["class"] = "form-control";
			$this->ARTCycle->EditCustomAttributes = "";
			$this->ARTCycle->EditValue = $this->ARTCycle->options(TRUE);

			// Spermorigin
			$this->Spermorigin->EditAttrs["class"] = "form-control";
			$this->Spermorigin->EditCustomAttributes = "";
			$this->Spermorigin->EditValue = $this->Spermorigin->options(TRUE);

			// IndicationforART
			$this->IndicationforART->EditAttrs["class"] = "form-control";
			$this->IndicationforART->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IndicationforART->CurrentValue = HtmlDecode($this->IndicationforART->CurrentValue);
			$this->IndicationforART->EditValue = HtmlEncode($this->IndicationforART->CurrentValue);
			$this->IndicationforART->PlaceHolder = RemoveHtml($this->IndicationforART->caption());

			// DateofICSI
			$this->DateofICSI->EditAttrs["class"] = "form-control";
			$this->DateofICSI->EditCustomAttributes = "";
			$this->DateofICSI->EditValue = HtmlEncode(FormatDateTime($this->DateofICSI->CurrentValue, 7));
			$this->DateofICSI->PlaceHolder = RemoveHtml($this->DateofICSI->caption());

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			$this->Origin->EditValue = $this->Origin->options(TRUE);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = $this->Status->options(TRUE);

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			$this->Method->EditValue = $this->Method->options(TRUE);

			// pre_Concentration
			$this->pre_Concentration->EditAttrs["class"] = "form-control";
			$this->pre_Concentration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pre_Concentration->CurrentValue = HtmlDecode($this->pre_Concentration->CurrentValue);
			$this->pre_Concentration->EditValue = HtmlEncode($this->pre_Concentration->CurrentValue);
			$this->pre_Concentration->PlaceHolder = RemoveHtml($this->pre_Concentration->caption());

			// pre_Motility
			$this->pre_Motility->EditAttrs["class"] = "form-control";
			$this->pre_Motility->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pre_Motility->CurrentValue = HtmlDecode($this->pre_Motility->CurrentValue);
			$this->pre_Motility->EditValue = HtmlEncode($this->pre_Motility->CurrentValue);
			$this->pre_Motility->PlaceHolder = RemoveHtml($this->pre_Motility->caption());

			// pre_Morphology
			$this->pre_Morphology->EditAttrs["class"] = "form-control";
			$this->pre_Morphology->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pre_Morphology->CurrentValue = HtmlDecode($this->pre_Morphology->CurrentValue);
			$this->pre_Morphology->EditValue = HtmlEncode($this->pre_Morphology->CurrentValue);
			$this->pre_Morphology->PlaceHolder = RemoveHtml($this->pre_Morphology->caption());

			// post_Concentration
			$this->post_Concentration->EditAttrs["class"] = "form-control";
			$this->post_Concentration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->post_Concentration->CurrentValue = HtmlDecode($this->post_Concentration->CurrentValue);
			$this->post_Concentration->EditValue = HtmlEncode($this->post_Concentration->CurrentValue);
			$this->post_Concentration->PlaceHolder = RemoveHtml($this->post_Concentration->caption());

			// post_Motility
			$this->post_Motility->EditAttrs["class"] = "form-control";
			$this->post_Motility->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->post_Motility->CurrentValue = HtmlDecode($this->post_Motility->CurrentValue);
			$this->post_Motility->EditValue = HtmlEncode($this->post_Motility->CurrentValue);
			$this->post_Motility->PlaceHolder = RemoveHtml($this->post_Motility->caption());

			// post_Morphology
			$this->post_Morphology->EditAttrs["class"] = "form-control";
			$this->post_Morphology->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->post_Morphology->CurrentValue = HtmlDecode($this->post_Morphology->CurrentValue);
			$this->post_Morphology->EditValue = HtmlEncode($this->post_Morphology->CurrentValue);
			$this->post_Morphology->PlaceHolder = RemoveHtml($this->post_Morphology->caption());

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->EditAttrs["class"] = "form-control";
			$this->NumberofEmbryostransferred->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NumberofEmbryostransferred->CurrentValue = HtmlDecode($this->NumberofEmbryostransferred->CurrentValue);
			$this->NumberofEmbryostransferred->EditValue = HtmlEncode($this->NumberofEmbryostransferred->CurrentValue);
			$this->NumberofEmbryostransferred->PlaceHolder = RemoveHtml($this->NumberofEmbryostransferred->caption());

			// Embryosunderobservation
			$this->Embryosunderobservation->EditAttrs["class"] = "form-control";
			$this->Embryosunderobservation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Embryosunderobservation->CurrentValue = HtmlDecode($this->Embryosunderobservation->CurrentValue);
			$this->Embryosunderobservation->EditValue = HtmlEncode($this->Embryosunderobservation->CurrentValue);
			$this->Embryosunderobservation->PlaceHolder = RemoveHtml($this->Embryosunderobservation->caption());

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->EditAttrs["class"] = "form-control";
			$this->EmbryoDevelopmentSummary->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryoDevelopmentSummary->CurrentValue = HtmlDecode($this->EmbryoDevelopmentSummary->CurrentValue);
			$this->EmbryoDevelopmentSummary->EditValue = HtmlEncode($this->EmbryoDevelopmentSummary->CurrentValue);
			$this->EmbryoDevelopmentSummary->PlaceHolder = RemoveHtml($this->EmbryoDevelopmentSummary->caption());

			// EmbryologistSignature
			$this->EmbryologistSignature->EditAttrs["class"] = "form-control";
			$this->EmbryologistSignature->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryologistSignature->CurrentValue = HtmlDecode($this->EmbryologistSignature->CurrentValue);
			$this->EmbryologistSignature->EditValue = HtmlEncode($this->EmbryologistSignature->CurrentValue);
			$this->EmbryologistSignature->PlaceHolder = RemoveHtml($this->EmbryologistSignature->caption());

			// IVFRegistrationID
			$this->IVFRegistrationID->EditAttrs["class"] = "form-control";
			$this->IVFRegistrationID->EditCustomAttributes = "";
			$this->IVFRegistrationID->EditValue = HtmlEncode($this->IVFRegistrationID->CurrentValue);
			$this->IVFRegistrationID->PlaceHolder = RemoveHtml($this->IVFRegistrationID->caption());

			// InseminatinTechnique
			$this->InseminatinTechnique->EditAttrs["class"] = "form-control";
			$this->InseminatinTechnique->EditCustomAttributes = "";
			$this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(TRUE);

			// ICSIDetails
			$this->ICSIDetails->EditAttrs["class"] = "form-control";
			$this->ICSIDetails->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ICSIDetails->CurrentValue = HtmlDecode($this->ICSIDetails->CurrentValue);
			$this->ICSIDetails->EditValue = HtmlEncode($this->ICSIDetails->CurrentValue);
			$this->ICSIDetails->PlaceHolder = RemoveHtml($this->ICSIDetails->caption());

			// DateofET
			$this->DateofET->EditAttrs["class"] = "form-control";
			$this->DateofET->EditCustomAttributes = "";
			$this->DateofET->EditValue = $this->DateofET->options(TRUE);

			// Reasonfornotranfer
			$this->Reasonfornotranfer->EditAttrs["class"] = "form-control";
			$this->Reasonfornotranfer->EditCustomAttributes = "";
			$this->Reasonfornotranfer->EditValue = $this->Reasonfornotranfer->options(TRUE);

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->EditAttrs["class"] = "form-control";
			$this->EmbryosCryopreserved->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryosCryopreserved->CurrentValue = HtmlDecode($this->EmbryosCryopreserved->CurrentValue);
			$this->EmbryosCryopreserved->EditValue = HtmlEncode($this->EmbryosCryopreserved->CurrentValue);
			$this->EmbryosCryopreserved->PlaceHolder = RemoveHtml($this->EmbryosCryopreserved->caption());

			// LegendCellStage
			$this->LegendCellStage->EditAttrs["class"] = "form-control";
			$this->LegendCellStage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LegendCellStage->CurrentValue = HtmlDecode($this->LegendCellStage->CurrentValue);
			$this->LegendCellStage->EditValue = HtmlEncode($this->LegendCellStage->CurrentValue);
			$this->LegendCellStage->PlaceHolder = RemoveHtml($this->LegendCellStage->caption());

			// ConsultantsSignature
			$this->ConsultantsSignature->EditCustomAttributes = "";
			$curVal = trim(strval($this->ConsultantsSignature->CurrentValue));
			if ($curVal <> "")
				$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
			else
				$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->Lookup !== NULL && is_array($this->ConsultantsSignature->Lookup->Options) ? $curVal : NULL;
			if ($this->ConsultantsSignature->ViewValue !== NULL) { // Load from cache
				$this->ConsultantsSignature->EditValue = array_values($this->ConsultantsSignature->Lookup->Options);
				if ($this->ConsultantsSignature->ViewValue == "")
					$this->ConsultantsSignature->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->ConsultantsSignature->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ConsultantsSignature->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
				} else {
					$this->ConsultantsSignature->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ConsultantsSignature->EditValue = $arwrk;
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// M2
			$this->M2->EditAttrs["class"] = "form-control";
			$this->M2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->M2->CurrentValue = HtmlDecode($this->M2->CurrentValue);
			$this->M2->EditValue = HtmlEncode($this->M2->CurrentValue);
			$this->M2->PlaceHolder = RemoveHtml($this->M2->caption());

			// Mi2
			$this->Mi2->EditAttrs["class"] = "form-control";
			$this->Mi2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mi2->CurrentValue = HtmlDecode($this->Mi2->CurrentValue);
			$this->Mi2->EditValue = HtmlEncode($this->Mi2->CurrentValue);
			$this->Mi2->PlaceHolder = RemoveHtml($this->Mi2->caption());

			// ICSI
			$this->ICSI->EditAttrs["class"] = "form-control";
			$this->ICSI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ICSI->CurrentValue = HtmlDecode($this->ICSI->CurrentValue);
			$this->ICSI->EditValue = HtmlEncode($this->ICSI->CurrentValue);
			$this->ICSI->PlaceHolder = RemoveHtml($this->ICSI->caption());

			// IVF
			$this->IVF->EditAttrs["class"] = "form-control";
			$this->IVF->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IVF->CurrentValue = HtmlDecode($this->IVF->CurrentValue);
			$this->IVF->EditValue = HtmlEncode($this->IVF->CurrentValue);
			$this->IVF->PlaceHolder = RemoveHtml($this->IVF->caption());

			// M1
			$this->M1->EditAttrs["class"] = "form-control";
			$this->M1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->M1->CurrentValue = HtmlDecode($this->M1->CurrentValue);
			$this->M1->EditValue = HtmlEncode($this->M1->CurrentValue);
			$this->M1->PlaceHolder = RemoveHtml($this->M1->caption());

			// GV
			$this->GV->EditAttrs["class"] = "form-control";
			$this->GV->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GV->CurrentValue = HtmlDecode($this->GV->CurrentValue);
			$this->GV->EditValue = HtmlEncode($this->GV->CurrentValue);
			$this->GV->PlaceHolder = RemoveHtml($this->GV->caption());

			// Others
			$this->Others->EditAttrs["class"] = "form-control";
			$this->Others->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Others->CurrentValue = HtmlDecode($this->Others->CurrentValue);
			$this->Others->EditValue = HtmlEncode($this->Others->CurrentValue);
			$this->Others->PlaceHolder = RemoveHtml($this->Others->caption());

			// Normal2PN
			$this->Normal2PN->EditAttrs["class"] = "form-control";
			$this->Normal2PN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Normal2PN->CurrentValue = HtmlDecode($this->Normal2PN->CurrentValue);
			$this->Normal2PN->EditValue = HtmlEncode($this->Normal2PN->CurrentValue);
			$this->Normal2PN->PlaceHolder = RemoveHtml($this->Normal2PN->caption());

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->EditAttrs["class"] = "form-control";
			$this->Abnormalfertilisation1N->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormalfertilisation1N->CurrentValue = HtmlDecode($this->Abnormalfertilisation1N->CurrentValue);
			$this->Abnormalfertilisation1N->EditValue = HtmlEncode($this->Abnormalfertilisation1N->CurrentValue);
			$this->Abnormalfertilisation1N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation1N->caption());

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->EditAttrs["class"] = "form-control";
			$this->Abnormalfertilisation3N->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormalfertilisation3N->CurrentValue = HtmlDecode($this->Abnormalfertilisation3N->CurrentValue);
			$this->Abnormalfertilisation3N->EditValue = HtmlEncode($this->Abnormalfertilisation3N->CurrentValue);
			$this->Abnormalfertilisation3N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation3N->caption());

			// NotFertilized
			$this->NotFertilized->EditAttrs["class"] = "form-control";
			$this->NotFertilized->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotFertilized->CurrentValue = HtmlDecode($this->NotFertilized->CurrentValue);
			$this->NotFertilized->EditValue = HtmlEncode($this->NotFertilized->CurrentValue);
			$this->NotFertilized->PlaceHolder = RemoveHtml($this->NotFertilized->caption());

			// Degenerated
			$this->Degenerated->EditAttrs["class"] = "form-control";
			$this->Degenerated->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Degenerated->CurrentValue = HtmlDecode($this->Degenerated->CurrentValue);
			$this->Degenerated->EditValue = HtmlEncode($this->Degenerated->CurrentValue);
			$this->Degenerated->PlaceHolder = RemoveHtml($this->Degenerated->caption());

			// SpermDate
			$this->SpermDate->EditAttrs["class"] = "form-control";
			$this->SpermDate->EditCustomAttributes = "";
			$this->SpermDate->EditValue = HtmlEncode(FormatDateTime($this->SpermDate->CurrentValue, 8));
			$this->SpermDate->PlaceHolder = RemoveHtml($this->SpermDate->caption());

			// Code1
			$this->Code1->EditAttrs["class"] = "form-control";
			$this->Code1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
			$this->Code1->EditValue = HtmlEncode($this->Code1->CurrentValue);
			$this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

			// Day1
			$this->Day1->EditAttrs["class"] = "form-control";
			$this->Day1->EditCustomAttributes = "";
			$this->Day1->EditValue = $this->Day1->options(TRUE);

			// CellStage1
			$this->CellStage1->EditAttrs["class"] = "form-control";
			$this->CellStage1->EditCustomAttributes = "";
			$this->CellStage1->EditValue = $this->CellStage1->options(TRUE);

			// Grade1
			$this->Grade1->EditAttrs["class"] = "form-control";
			$this->Grade1->EditCustomAttributes = "";
			$this->Grade1->EditValue = $this->Grade1->options(TRUE);

			// State1
			$this->State1->EditAttrs["class"] = "form-control";
			$this->State1->EditCustomAttributes = "";
			$this->State1->EditValue = $this->State1->options(TRUE);

			// Code2
			$this->Code2->EditAttrs["class"] = "form-control";
			$this->Code2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
			$this->Code2->EditValue = HtmlEncode($this->Code2->CurrentValue);
			$this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

			// Day2
			$this->Day2->EditAttrs["class"] = "form-control";
			$this->Day2->EditCustomAttributes = "";
			$this->Day2->EditValue = $this->Day2->options(TRUE);

			// CellStage2
			$this->CellStage2->EditAttrs["class"] = "form-control";
			$this->CellStage2->EditCustomAttributes = "";
			$this->CellStage2->EditValue = $this->CellStage2->options(TRUE);

			// Grade2
			$this->Grade2->EditAttrs["class"] = "form-control";
			$this->Grade2->EditCustomAttributes = "";
			$this->Grade2->EditValue = $this->Grade2->options(TRUE);

			// State2
			$this->State2->EditAttrs["class"] = "form-control";
			$this->State2->EditCustomAttributes = "";
			$this->State2->EditValue = $this->State2->options(TRUE);

			// Code3
			$this->Code3->EditAttrs["class"] = "form-control";
			$this->Code3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code3->CurrentValue = HtmlDecode($this->Code3->CurrentValue);
			$this->Code3->EditValue = HtmlEncode($this->Code3->CurrentValue);
			$this->Code3->PlaceHolder = RemoveHtml($this->Code3->caption());

			// Day3
			$this->Day3->EditAttrs["class"] = "form-control";
			$this->Day3->EditCustomAttributes = "";
			$this->Day3->EditValue = $this->Day3->options(TRUE);

			// CellStage3
			$this->CellStage3->EditAttrs["class"] = "form-control";
			$this->CellStage3->EditCustomAttributes = "";
			$this->CellStage3->EditValue = $this->CellStage3->options(TRUE);

			// Grade3
			$this->Grade3->EditAttrs["class"] = "form-control";
			$this->Grade3->EditCustomAttributes = "";
			$this->Grade3->EditValue = $this->Grade3->options(TRUE);

			// State3
			$this->State3->EditAttrs["class"] = "form-control";
			$this->State3->EditCustomAttributes = "";
			$this->State3->EditValue = $this->State3->options(TRUE);

			// Code4
			$this->Code4->EditAttrs["class"] = "form-control";
			$this->Code4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code4->CurrentValue = HtmlDecode($this->Code4->CurrentValue);
			$this->Code4->EditValue = HtmlEncode($this->Code4->CurrentValue);
			$this->Code4->PlaceHolder = RemoveHtml($this->Code4->caption());

			// Day4
			$this->Day4->EditAttrs["class"] = "form-control";
			$this->Day4->EditCustomAttributes = "";
			$this->Day4->EditValue = $this->Day4->options(TRUE);

			// CellStage4
			$this->CellStage4->EditAttrs["class"] = "form-control";
			$this->CellStage4->EditCustomAttributes = "";
			$this->CellStage4->EditValue = $this->CellStage4->options(TRUE);

			// Grade4
			$this->Grade4->EditAttrs["class"] = "form-control";
			$this->Grade4->EditCustomAttributes = "";
			$this->Grade4->EditValue = $this->Grade4->options(TRUE);

			// State4
			$this->State4->EditAttrs["class"] = "form-control";
			$this->State4->EditCustomAttributes = "";
			$this->State4->EditValue = $this->State4->options(TRUE);

			// Code5
			$this->Code5->EditAttrs["class"] = "form-control";
			$this->Code5->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code5->CurrentValue = HtmlDecode($this->Code5->CurrentValue);
			$this->Code5->EditValue = HtmlEncode($this->Code5->CurrentValue);
			$this->Code5->PlaceHolder = RemoveHtml($this->Code5->caption());

			// Day5
			$this->Day5->EditAttrs["class"] = "form-control";
			$this->Day5->EditCustomAttributes = "";
			$this->Day5->EditValue = $this->Day5->options(TRUE);

			// CellStage5
			$this->CellStage5->EditAttrs["class"] = "form-control";
			$this->CellStage5->EditCustomAttributes = "";
			$this->CellStage5->EditValue = $this->CellStage5->options(TRUE);

			// Grade5
			$this->Grade5->EditAttrs["class"] = "form-control";
			$this->Grade5->EditCustomAttributes = "";
			$this->Grade5->EditValue = $this->Grade5->options(TRUE);

			// State5
			$this->State5->EditAttrs["class"] = "form-control";
			$this->State5->EditCustomAttributes = "";
			$this->State5->EditValue = $this->State5->options(TRUE);

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

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() <> "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
			} else {
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// Volume
			$this->Volume->EditAttrs["class"] = "form-control";
			$this->Volume->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
			$this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
			$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

			// Volume1
			$this->Volume1->EditAttrs["class"] = "form-control";
			$this->Volume1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
			$this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
			$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

			// Volume2
			$this->Volume2->EditAttrs["class"] = "form-control";
			$this->Volume2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
			$this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
			$this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

			// Concentration2
			$this->Concentration2->EditAttrs["class"] = "form-control";
			$this->Concentration2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
			$this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
			$this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

			// Total
			$this->Total->EditAttrs["class"] = "form-control";
			$this->Total->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
			$this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
			$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

			// Total1
			$this->Total1->EditAttrs["class"] = "form-control";
			$this->Total1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
			$this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
			$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

			// Total2
			$this->Total2->EditAttrs["class"] = "form-control";
			$this->Total2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
			$this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
			$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

			// Progressive
			$this->Progressive->EditAttrs["class"] = "form-control";
			$this->Progressive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Progressive->CurrentValue = HtmlDecode($this->Progressive->CurrentValue);
			$this->Progressive->EditValue = HtmlEncode($this->Progressive->CurrentValue);
			$this->Progressive->PlaceHolder = RemoveHtml($this->Progressive->caption());

			// Progressive1
			$this->Progressive1->EditAttrs["class"] = "form-control";
			$this->Progressive1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Progressive1->CurrentValue = HtmlDecode($this->Progressive1->CurrentValue);
			$this->Progressive1->EditValue = HtmlEncode($this->Progressive1->CurrentValue);
			$this->Progressive1->PlaceHolder = RemoveHtml($this->Progressive1->caption());

			// Progressive2
			$this->Progressive2->EditAttrs["class"] = "form-control";
			$this->Progressive2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Progressive2->CurrentValue = HtmlDecode($this->Progressive2->CurrentValue);
			$this->Progressive2->EditValue = HtmlEncode($this->Progressive2->CurrentValue);
			$this->Progressive2->PlaceHolder = RemoveHtml($this->Progressive2->caption());

			// NotProgressive
			$this->NotProgressive->EditAttrs["class"] = "form-control";
			$this->NotProgressive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotProgressive->CurrentValue = HtmlDecode($this->NotProgressive->CurrentValue);
			$this->NotProgressive->EditValue = HtmlEncode($this->NotProgressive->CurrentValue);
			$this->NotProgressive->PlaceHolder = RemoveHtml($this->NotProgressive->caption());

			// NotProgressive1
			$this->NotProgressive1->EditAttrs["class"] = "form-control";
			$this->NotProgressive1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotProgressive1->CurrentValue = HtmlDecode($this->NotProgressive1->CurrentValue);
			$this->NotProgressive1->EditValue = HtmlEncode($this->NotProgressive1->CurrentValue);
			$this->NotProgressive1->PlaceHolder = RemoveHtml($this->NotProgressive1->caption());

			// NotProgressive2
			$this->NotProgressive2->EditAttrs["class"] = "form-control";
			$this->NotProgressive2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotProgressive2->CurrentValue = HtmlDecode($this->NotProgressive2->CurrentValue);
			$this->NotProgressive2->EditValue = HtmlEncode($this->NotProgressive2->CurrentValue);
			$this->NotProgressive2->PlaceHolder = RemoveHtml($this->NotProgressive2->caption());

			// Motility2
			$this->Motility2->EditAttrs["class"] = "form-control";
			$this->Motility2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Motility2->CurrentValue = HtmlDecode($this->Motility2->CurrentValue);
			$this->Motility2->EditValue = HtmlEncode($this->Motility2->CurrentValue);
			$this->Motility2->PlaceHolder = RemoveHtml($this->Motility2->caption());

			// Morphology2
			$this->Morphology2->EditAttrs["class"] = "form-control";
			$this->Morphology2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Morphology2->CurrentValue = HtmlDecode($this->Morphology2->CurrentValue);
			$this->Morphology2->EditValue = HtmlEncode($this->Morphology2->CurrentValue);
			$this->Morphology2->PlaceHolder = RemoveHtml($this->Morphology2->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";

			// Spermorigin
			$this->Spermorigin->LinkCustomAttributes = "";
			$this->Spermorigin->HrefValue = "";

			// IndicationforART
			$this->IndicationforART->LinkCustomAttributes = "";
			$this->IndicationforART->HrefValue = "";

			// DateofICSI
			$this->DateofICSI->LinkCustomAttributes = "";
			$this->DateofICSI->HrefValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// pre_Concentration
			$this->pre_Concentration->LinkCustomAttributes = "";
			$this->pre_Concentration->HrefValue = "";

			// pre_Motility
			$this->pre_Motility->LinkCustomAttributes = "";
			$this->pre_Motility->HrefValue = "";

			// pre_Morphology
			$this->pre_Morphology->LinkCustomAttributes = "";
			$this->pre_Morphology->HrefValue = "";

			// post_Concentration
			$this->post_Concentration->LinkCustomAttributes = "";
			$this->post_Concentration->HrefValue = "";

			// post_Motility
			$this->post_Motility->LinkCustomAttributes = "";
			$this->post_Motility->HrefValue = "";

			// post_Morphology
			$this->post_Morphology->LinkCustomAttributes = "";
			$this->post_Morphology->HrefValue = "";

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->LinkCustomAttributes = "";
			$this->NumberofEmbryostransferred->HrefValue = "";

			// Embryosunderobservation
			$this->Embryosunderobservation->LinkCustomAttributes = "";
			$this->Embryosunderobservation->HrefValue = "";

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
			$this->EmbryoDevelopmentSummary->HrefValue = "";

			// EmbryologistSignature
			$this->EmbryologistSignature->LinkCustomAttributes = "";
			$this->EmbryologistSignature->HrefValue = "";

			// IVFRegistrationID
			$this->IVFRegistrationID->LinkCustomAttributes = "";
			$this->IVFRegistrationID->HrefValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";

			// ICSIDetails
			$this->ICSIDetails->LinkCustomAttributes = "";
			$this->ICSIDetails->HrefValue = "";

			// DateofET
			$this->DateofET->LinkCustomAttributes = "";
			$this->DateofET->HrefValue = "";

			// Reasonfornotranfer
			$this->Reasonfornotranfer->LinkCustomAttributes = "";
			$this->Reasonfornotranfer->HrefValue = "";

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->LinkCustomAttributes = "";
			$this->EmbryosCryopreserved->HrefValue = "";

			// LegendCellStage
			$this->LegendCellStage->LinkCustomAttributes = "";
			$this->LegendCellStage->HrefValue = "";

			// ConsultantsSignature
			$this->ConsultantsSignature->LinkCustomAttributes = "";
			$this->ConsultantsSignature->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// M2
			$this->M2->LinkCustomAttributes = "";
			$this->M2->HrefValue = "";

			// Mi2
			$this->Mi2->LinkCustomAttributes = "";
			$this->Mi2->HrefValue = "";

			// ICSI
			$this->ICSI->LinkCustomAttributes = "";
			$this->ICSI->HrefValue = "";

			// IVF
			$this->IVF->LinkCustomAttributes = "";
			$this->IVF->HrefValue = "";

			// M1
			$this->M1->LinkCustomAttributes = "";
			$this->M1->HrefValue = "";

			// GV
			$this->GV->LinkCustomAttributes = "";
			$this->GV->HrefValue = "";

			// Others
			$this->Others->LinkCustomAttributes = "";
			$this->Others->HrefValue = "";

			// Normal2PN
			$this->Normal2PN->LinkCustomAttributes = "";
			$this->Normal2PN->HrefValue = "";

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->LinkCustomAttributes = "";
			$this->Abnormalfertilisation1N->HrefValue = "";

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->LinkCustomAttributes = "";
			$this->Abnormalfertilisation3N->HrefValue = "";

			// NotFertilized
			$this->NotFertilized->LinkCustomAttributes = "";
			$this->NotFertilized->HrefValue = "";

			// Degenerated
			$this->Degenerated->LinkCustomAttributes = "";
			$this->Degenerated->HrefValue = "";

			// SpermDate
			$this->SpermDate->LinkCustomAttributes = "";
			$this->SpermDate->HrefValue = "";

			// Code1
			$this->Code1->LinkCustomAttributes = "";
			$this->Code1->HrefValue = "";

			// Day1
			$this->Day1->LinkCustomAttributes = "";
			$this->Day1->HrefValue = "";

			// CellStage1
			$this->CellStage1->LinkCustomAttributes = "";
			$this->CellStage1->HrefValue = "";

			// Grade1
			$this->Grade1->LinkCustomAttributes = "";
			$this->Grade1->HrefValue = "";

			// State1
			$this->State1->LinkCustomAttributes = "";
			$this->State1->HrefValue = "";

			// Code2
			$this->Code2->LinkCustomAttributes = "";
			$this->Code2->HrefValue = "";

			// Day2
			$this->Day2->LinkCustomAttributes = "";
			$this->Day2->HrefValue = "";

			// CellStage2
			$this->CellStage2->LinkCustomAttributes = "";
			$this->CellStage2->HrefValue = "";

			// Grade2
			$this->Grade2->LinkCustomAttributes = "";
			$this->Grade2->HrefValue = "";

			// State2
			$this->State2->LinkCustomAttributes = "";
			$this->State2->HrefValue = "";

			// Code3
			$this->Code3->LinkCustomAttributes = "";
			$this->Code3->HrefValue = "";

			// Day3
			$this->Day3->LinkCustomAttributes = "";
			$this->Day3->HrefValue = "";

			// CellStage3
			$this->CellStage3->LinkCustomAttributes = "";
			$this->CellStage3->HrefValue = "";

			// Grade3
			$this->Grade3->LinkCustomAttributes = "";
			$this->Grade3->HrefValue = "";

			// State3
			$this->State3->LinkCustomAttributes = "";
			$this->State3->HrefValue = "";

			// Code4
			$this->Code4->LinkCustomAttributes = "";
			$this->Code4->HrefValue = "";

			// Day4
			$this->Day4->LinkCustomAttributes = "";
			$this->Day4->HrefValue = "";

			// CellStage4
			$this->CellStage4->LinkCustomAttributes = "";
			$this->CellStage4->HrefValue = "";

			// Grade4
			$this->Grade4->LinkCustomAttributes = "";
			$this->Grade4->HrefValue = "";

			// State4
			$this->State4->LinkCustomAttributes = "";
			$this->State4->HrefValue = "";

			// Code5
			$this->Code5->LinkCustomAttributes = "";
			$this->Code5->HrefValue = "";

			// Day5
			$this->Day5->LinkCustomAttributes = "";
			$this->Day5->HrefValue = "";

			// CellStage5
			$this->CellStage5->LinkCustomAttributes = "";
			$this->CellStage5->HrefValue = "";

			// Grade5
			$this->Grade5->LinkCustomAttributes = "";
			$this->Grade5->HrefValue = "";

			// State5
			$this->State5->LinkCustomAttributes = "";
			$this->State5->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";

			// Volume1
			$this->Volume1->LinkCustomAttributes = "";
			$this->Volume1->HrefValue = "";

			// Volume2
			$this->Volume2->LinkCustomAttributes = "";
			$this->Volume2->HrefValue = "";

			// Concentration2
			$this->Concentration2->LinkCustomAttributes = "";
			$this->Concentration2->HrefValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";

			// Total1
			$this->Total1->LinkCustomAttributes = "";
			$this->Total1->HrefValue = "";

			// Total2
			$this->Total2->LinkCustomAttributes = "";
			$this->Total2->HrefValue = "";

			// Progressive
			$this->Progressive->LinkCustomAttributes = "";
			$this->Progressive->HrefValue = "";

			// Progressive1
			$this->Progressive1->LinkCustomAttributes = "";
			$this->Progressive1->HrefValue = "";

			// Progressive2
			$this->Progressive2->LinkCustomAttributes = "";
			$this->Progressive2->HrefValue = "";

			// NotProgressive
			$this->NotProgressive->LinkCustomAttributes = "";
			$this->NotProgressive->HrefValue = "";

			// NotProgressive1
			$this->NotProgressive1->LinkCustomAttributes = "";
			$this->NotProgressive1->HrefValue = "";

			// NotProgressive2
			$this->NotProgressive2->LinkCustomAttributes = "";
			$this->NotProgressive2->HrefValue = "";

			// Motility2
			$this->Motility2->LinkCustomAttributes = "";
			$this->Motility2->HrefValue = "";

			// Morphology2
			$this->Morphology2->LinkCustomAttributes = "";
			$this->Morphology2->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// ARTCycle
			$this->ARTCycle->EditAttrs["class"] = "form-control";
			$this->ARTCycle->EditCustomAttributes = "";
			$this->ARTCycle->EditValue = $this->ARTCycle->options(TRUE);

			// Spermorigin
			$this->Spermorigin->EditAttrs["class"] = "form-control";
			$this->Spermorigin->EditCustomAttributes = "";
			$this->Spermorigin->EditValue = $this->Spermorigin->options(TRUE);

			// IndicationforART
			$this->IndicationforART->EditAttrs["class"] = "form-control";
			$this->IndicationforART->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IndicationforART->CurrentValue = HtmlDecode($this->IndicationforART->CurrentValue);
			$this->IndicationforART->EditValue = HtmlEncode($this->IndicationforART->CurrentValue);
			$this->IndicationforART->PlaceHolder = RemoveHtml($this->IndicationforART->caption());

			// DateofICSI
			$this->DateofICSI->EditAttrs["class"] = "form-control";
			$this->DateofICSI->EditCustomAttributes = "";
			$this->DateofICSI->EditValue = HtmlEncode(FormatDateTime($this->DateofICSI->CurrentValue, 7));
			$this->DateofICSI->PlaceHolder = RemoveHtml($this->DateofICSI->caption());

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			$this->Origin->EditValue = $this->Origin->options(TRUE);

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = $this->Status->options(TRUE);

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			$this->Method->EditValue = $this->Method->options(TRUE);

			// pre_Concentration
			$this->pre_Concentration->EditAttrs["class"] = "form-control";
			$this->pre_Concentration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pre_Concentration->CurrentValue = HtmlDecode($this->pre_Concentration->CurrentValue);
			$this->pre_Concentration->EditValue = HtmlEncode($this->pre_Concentration->CurrentValue);
			$this->pre_Concentration->PlaceHolder = RemoveHtml($this->pre_Concentration->caption());

			// pre_Motility
			$this->pre_Motility->EditAttrs["class"] = "form-control";
			$this->pre_Motility->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pre_Motility->CurrentValue = HtmlDecode($this->pre_Motility->CurrentValue);
			$this->pre_Motility->EditValue = HtmlEncode($this->pre_Motility->CurrentValue);
			$this->pre_Motility->PlaceHolder = RemoveHtml($this->pre_Motility->caption());

			// pre_Morphology
			$this->pre_Morphology->EditAttrs["class"] = "form-control";
			$this->pre_Morphology->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pre_Morphology->CurrentValue = HtmlDecode($this->pre_Morphology->CurrentValue);
			$this->pre_Morphology->EditValue = HtmlEncode($this->pre_Morphology->CurrentValue);
			$this->pre_Morphology->PlaceHolder = RemoveHtml($this->pre_Morphology->caption());

			// post_Concentration
			$this->post_Concentration->EditAttrs["class"] = "form-control";
			$this->post_Concentration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->post_Concentration->CurrentValue = HtmlDecode($this->post_Concentration->CurrentValue);
			$this->post_Concentration->EditValue = HtmlEncode($this->post_Concentration->CurrentValue);
			$this->post_Concentration->PlaceHolder = RemoveHtml($this->post_Concentration->caption());

			// post_Motility
			$this->post_Motility->EditAttrs["class"] = "form-control";
			$this->post_Motility->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->post_Motility->CurrentValue = HtmlDecode($this->post_Motility->CurrentValue);
			$this->post_Motility->EditValue = HtmlEncode($this->post_Motility->CurrentValue);
			$this->post_Motility->PlaceHolder = RemoveHtml($this->post_Motility->caption());

			// post_Morphology
			$this->post_Morphology->EditAttrs["class"] = "form-control";
			$this->post_Morphology->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->post_Morphology->CurrentValue = HtmlDecode($this->post_Morphology->CurrentValue);
			$this->post_Morphology->EditValue = HtmlEncode($this->post_Morphology->CurrentValue);
			$this->post_Morphology->PlaceHolder = RemoveHtml($this->post_Morphology->caption());

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->EditAttrs["class"] = "form-control";
			$this->NumberofEmbryostransferred->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NumberofEmbryostransferred->CurrentValue = HtmlDecode($this->NumberofEmbryostransferred->CurrentValue);
			$this->NumberofEmbryostransferred->EditValue = HtmlEncode($this->NumberofEmbryostransferred->CurrentValue);
			$this->NumberofEmbryostransferred->PlaceHolder = RemoveHtml($this->NumberofEmbryostransferred->caption());

			// Embryosunderobservation
			$this->Embryosunderobservation->EditAttrs["class"] = "form-control";
			$this->Embryosunderobservation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Embryosunderobservation->CurrentValue = HtmlDecode($this->Embryosunderobservation->CurrentValue);
			$this->Embryosunderobservation->EditValue = HtmlEncode($this->Embryosunderobservation->CurrentValue);
			$this->Embryosunderobservation->PlaceHolder = RemoveHtml($this->Embryosunderobservation->caption());

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->EditAttrs["class"] = "form-control";
			$this->EmbryoDevelopmentSummary->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryoDevelopmentSummary->CurrentValue = HtmlDecode($this->EmbryoDevelopmentSummary->CurrentValue);
			$this->EmbryoDevelopmentSummary->EditValue = HtmlEncode($this->EmbryoDevelopmentSummary->CurrentValue);
			$this->EmbryoDevelopmentSummary->PlaceHolder = RemoveHtml($this->EmbryoDevelopmentSummary->caption());

			// EmbryologistSignature
			$this->EmbryologistSignature->EditAttrs["class"] = "form-control";
			$this->EmbryologistSignature->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryologistSignature->CurrentValue = HtmlDecode($this->EmbryologistSignature->CurrentValue);
			$this->EmbryologistSignature->EditValue = HtmlEncode($this->EmbryologistSignature->CurrentValue);
			$this->EmbryologistSignature->PlaceHolder = RemoveHtml($this->EmbryologistSignature->caption());

			// IVFRegistrationID
			$this->IVFRegistrationID->EditAttrs["class"] = "form-control";
			$this->IVFRegistrationID->EditCustomAttributes = "";
			$this->IVFRegistrationID->EditValue = HtmlEncode($this->IVFRegistrationID->CurrentValue);
			$this->IVFRegistrationID->PlaceHolder = RemoveHtml($this->IVFRegistrationID->caption());

			// InseminatinTechnique
			$this->InseminatinTechnique->EditAttrs["class"] = "form-control";
			$this->InseminatinTechnique->EditCustomAttributes = "";
			$this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(TRUE);

			// ICSIDetails
			$this->ICSIDetails->EditAttrs["class"] = "form-control";
			$this->ICSIDetails->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ICSIDetails->CurrentValue = HtmlDecode($this->ICSIDetails->CurrentValue);
			$this->ICSIDetails->EditValue = HtmlEncode($this->ICSIDetails->CurrentValue);
			$this->ICSIDetails->PlaceHolder = RemoveHtml($this->ICSIDetails->caption());

			// DateofET
			$this->DateofET->EditAttrs["class"] = "form-control";
			$this->DateofET->EditCustomAttributes = "";
			$this->DateofET->EditValue = $this->DateofET->options(TRUE);

			// Reasonfornotranfer
			$this->Reasonfornotranfer->EditAttrs["class"] = "form-control";
			$this->Reasonfornotranfer->EditCustomAttributes = "";
			$this->Reasonfornotranfer->EditValue = $this->Reasonfornotranfer->options(TRUE);

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->EditAttrs["class"] = "form-control";
			$this->EmbryosCryopreserved->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EmbryosCryopreserved->CurrentValue = HtmlDecode($this->EmbryosCryopreserved->CurrentValue);
			$this->EmbryosCryopreserved->EditValue = HtmlEncode($this->EmbryosCryopreserved->CurrentValue);
			$this->EmbryosCryopreserved->PlaceHolder = RemoveHtml($this->EmbryosCryopreserved->caption());

			// LegendCellStage
			$this->LegendCellStage->EditAttrs["class"] = "form-control";
			$this->LegendCellStage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LegendCellStage->CurrentValue = HtmlDecode($this->LegendCellStage->CurrentValue);
			$this->LegendCellStage->EditValue = HtmlEncode($this->LegendCellStage->CurrentValue);
			$this->LegendCellStage->PlaceHolder = RemoveHtml($this->LegendCellStage->caption());

			// ConsultantsSignature
			$this->ConsultantsSignature->EditCustomAttributes = "";
			$curVal = trim(strval($this->ConsultantsSignature->CurrentValue));
			if ($curVal <> "")
				$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
			else
				$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->Lookup !== NULL && is_array($this->ConsultantsSignature->Lookup->Options) ? $curVal : NULL;
			if ($this->ConsultantsSignature->ViewValue !== NULL) { // Load from cache
				$this->ConsultantsSignature->EditValue = array_values($this->ConsultantsSignature->Lookup->Options);
				if ($this->ConsultantsSignature->ViewValue == "")
					$this->ConsultantsSignature->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->ConsultantsSignature->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ConsultantsSignature->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
				} else {
					$this->ConsultantsSignature->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ConsultantsSignature->EditValue = $arwrk;
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->OldValue = $this->Name->CurrentValue;
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// M2
			$this->M2->EditAttrs["class"] = "form-control";
			$this->M2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->M2->CurrentValue = HtmlDecode($this->M2->CurrentValue);
			$this->M2->EditValue = HtmlEncode($this->M2->CurrentValue);
			$this->M2->PlaceHolder = RemoveHtml($this->M2->caption());

			// Mi2
			$this->Mi2->EditAttrs["class"] = "form-control";
			$this->Mi2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mi2->CurrentValue = HtmlDecode($this->Mi2->CurrentValue);
			$this->Mi2->EditValue = HtmlEncode($this->Mi2->CurrentValue);
			$this->Mi2->PlaceHolder = RemoveHtml($this->Mi2->caption());

			// ICSI
			$this->ICSI->EditAttrs["class"] = "form-control";
			$this->ICSI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ICSI->CurrentValue = HtmlDecode($this->ICSI->CurrentValue);
			$this->ICSI->EditValue = HtmlEncode($this->ICSI->CurrentValue);
			$this->ICSI->PlaceHolder = RemoveHtml($this->ICSI->caption());

			// IVF
			$this->IVF->EditAttrs["class"] = "form-control";
			$this->IVF->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IVF->CurrentValue = HtmlDecode($this->IVF->CurrentValue);
			$this->IVF->EditValue = HtmlEncode($this->IVF->CurrentValue);
			$this->IVF->PlaceHolder = RemoveHtml($this->IVF->caption());

			// M1
			$this->M1->EditAttrs["class"] = "form-control";
			$this->M1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->M1->CurrentValue = HtmlDecode($this->M1->CurrentValue);
			$this->M1->EditValue = HtmlEncode($this->M1->CurrentValue);
			$this->M1->PlaceHolder = RemoveHtml($this->M1->caption());

			// GV
			$this->GV->EditAttrs["class"] = "form-control";
			$this->GV->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GV->CurrentValue = HtmlDecode($this->GV->CurrentValue);
			$this->GV->EditValue = HtmlEncode($this->GV->CurrentValue);
			$this->GV->PlaceHolder = RemoveHtml($this->GV->caption());

			// Others
			$this->Others->EditAttrs["class"] = "form-control";
			$this->Others->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Others->CurrentValue = HtmlDecode($this->Others->CurrentValue);
			$this->Others->EditValue = HtmlEncode($this->Others->CurrentValue);
			$this->Others->PlaceHolder = RemoveHtml($this->Others->caption());

			// Normal2PN
			$this->Normal2PN->EditAttrs["class"] = "form-control";
			$this->Normal2PN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Normal2PN->CurrentValue = HtmlDecode($this->Normal2PN->CurrentValue);
			$this->Normal2PN->EditValue = HtmlEncode($this->Normal2PN->CurrentValue);
			$this->Normal2PN->PlaceHolder = RemoveHtml($this->Normal2PN->caption());

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->EditAttrs["class"] = "form-control";
			$this->Abnormalfertilisation1N->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormalfertilisation1N->CurrentValue = HtmlDecode($this->Abnormalfertilisation1N->CurrentValue);
			$this->Abnormalfertilisation1N->EditValue = HtmlEncode($this->Abnormalfertilisation1N->CurrentValue);
			$this->Abnormalfertilisation1N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation1N->caption());

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->EditAttrs["class"] = "form-control";
			$this->Abnormalfertilisation3N->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormalfertilisation3N->CurrentValue = HtmlDecode($this->Abnormalfertilisation3N->CurrentValue);
			$this->Abnormalfertilisation3N->EditValue = HtmlEncode($this->Abnormalfertilisation3N->CurrentValue);
			$this->Abnormalfertilisation3N->PlaceHolder = RemoveHtml($this->Abnormalfertilisation3N->caption());

			// NotFertilized
			$this->NotFertilized->EditAttrs["class"] = "form-control";
			$this->NotFertilized->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotFertilized->CurrentValue = HtmlDecode($this->NotFertilized->CurrentValue);
			$this->NotFertilized->EditValue = HtmlEncode($this->NotFertilized->CurrentValue);
			$this->NotFertilized->PlaceHolder = RemoveHtml($this->NotFertilized->caption());

			// Degenerated
			$this->Degenerated->EditAttrs["class"] = "form-control";
			$this->Degenerated->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Degenerated->CurrentValue = HtmlDecode($this->Degenerated->CurrentValue);
			$this->Degenerated->EditValue = HtmlEncode($this->Degenerated->CurrentValue);
			$this->Degenerated->PlaceHolder = RemoveHtml($this->Degenerated->caption());

			// SpermDate
			$this->SpermDate->EditAttrs["class"] = "form-control";
			$this->SpermDate->EditCustomAttributes = "";
			$this->SpermDate->EditValue = HtmlEncode(FormatDateTime($this->SpermDate->CurrentValue, 8));
			$this->SpermDate->PlaceHolder = RemoveHtml($this->SpermDate->caption());

			// Code1
			$this->Code1->EditAttrs["class"] = "form-control";
			$this->Code1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
			$this->Code1->EditValue = HtmlEncode($this->Code1->CurrentValue);
			$this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

			// Day1
			$this->Day1->EditAttrs["class"] = "form-control";
			$this->Day1->EditCustomAttributes = "";
			$this->Day1->EditValue = $this->Day1->options(TRUE);

			// CellStage1
			$this->CellStage1->EditAttrs["class"] = "form-control";
			$this->CellStage1->EditCustomAttributes = "";
			$this->CellStage1->EditValue = $this->CellStage1->options(TRUE);

			// Grade1
			$this->Grade1->EditAttrs["class"] = "form-control";
			$this->Grade1->EditCustomAttributes = "";
			$this->Grade1->EditValue = $this->Grade1->options(TRUE);

			// State1
			$this->State1->EditAttrs["class"] = "form-control";
			$this->State1->EditCustomAttributes = "";
			$this->State1->EditValue = $this->State1->options(TRUE);

			// Code2
			$this->Code2->EditAttrs["class"] = "form-control";
			$this->Code2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
			$this->Code2->EditValue = HtmlEncode($this->Code2->CurrentValue);
			$this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

			// Day2
			$this->Day2->EditAttrs["class"] = "form-control";
			$this->Day2->EditCustomAttributes = "";
			$this->Day2->EditValue = $this->Day2->options(TRUE);

			// CellStage2
			$this->CellStage2->EditAttrs["class"] = "form-control";
			$this->CellStage2->EditCustomAttributes = "";
			$this->CellStage2->EditValue = $this->CellStage2->options(TRUE);

			// Grade2
			$this->Grade2->EditAttrs["class"] = "form-control";
			$this->Grade2->EditCustomAttributes = "";
			$this->Grade2->EditValue = $this->Grade2->options(TRUE);

			// State2
			$this->State2->EditAttrs["class"] = "form-control";
			$this->State2->EditCustomAttributes = "";
			$this->State2->EditValue = $this->State2->options(TRUE);

			// Code3
			$this->Code3->EditAttrs["class"] = "form-control";
			$this->Code3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code3->CurrentValue = HtmlDecode($this->Code3->CurrentValue);
			$this->Code3->EditValue = HtmlEncode($this->Code3->CurrentValue);
			$this->Code3->PlaceHolder = RemoveHtml($this->Code3->caption());

			// Day3
			$this->Day3->EditAttrs["class"] = "form-control";
			$this->Day3->EditCustomAttributes = "";
			$this->Day3->EditValue = $this->Day3->options(TRUE);

			// CellStage3
			$this->CellStage3->EditAttrs["class"] = "form-control";
			$this->CellStage3->EditCustomAttributes = "";
			$this->CellStage3->EditValue = $this->CellStage3->options(TRUE);

			// Grade3
			$this->Grade3->EditAttrs["class"] = "form-control";
			$this->Grade3->EditCustomAttributes = "";
			$this->Grade3->EditValue = $this->Grade3->options(TRUE);

			// State3
			$this->State3->EditAttrs["class"] = "form-control";
			$this->State3->EditCustomAttributes = "";
			$this->State3->EditValue = $this->State3->options(TRUE);

			// Code4
			$this->Code4->EditAttrs["class"] = "form-control";
			$this->Code4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code4->CurrentValue = HtmlDecode($this->Code4->CurrentValue);
			$this->Code4->EditValue = HtmlEncode($this->Code4->CurrentValue);
			$this->Code4->PlaceHolder = RemoveHtml($this->Code4->caption());

			// Day4
			$this->Day4->EditAttrs["class"] = "form-control";
			$this->Day4->EditCustomAttributes = "";
			$this->Day4->EditValue = $this->Day4->options(TRUE);

			// CellStage4
			$this->CellStage4->EditAttrs["class"] = "form-control";
			$this->CellStage4->EditCustomAttributes = "";
			$this->CellStage4->EditValue = $this->CellStage4->options(TRUE);

			// Grade4
			$this->Grade4->EditAttrs["class"] = "form-control";
			$this->Grade4->EditCustomAttributes = "";
			$this->Grade4->EditValue = $this->Grade4->options(TRUE);

			// State4
			$this->State4->EditAttrs["class"] = "form-control";
			$this->State4->EditCustomAttributes = "";
			$this->State4->EditValue = $this->State4->options(TRUE);

			// Code5
			$this->Code5->EditAttrs["class"] = "form-control";
			$this->Code5->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code5->CurrentValue = HtmlDecode($this->Code5->CurrentValue);
			$this->Code5->EditValue = HtmlEncode($this->Code5->CurrentValue);
			$this->Code5->PlaceHolder = RemoveHtml($this->Code5->caption());

			// Day5
			$this->Day5->EditAttrs["class"] = "form-control";
			$this->Day5->EditCustomAttributes = "";
			$this->Day5->EditValue = $this->Day5->options(TRUE);

			// CellStage5
			$this->CellStage5->EditAttrs["class"] = "form-control";
			$this->CellStage5->EditCustomAttributes = "";
			$this->CellStage5->EditValue = $this->CellStage5->options(TRUE);

			// Grade5
			$this->Grade5->EditAttrs["class"] = "form-control";
			$this->Grade5->EditCustomAttributes = "";
			$this->Grade5->EditValue = $this->Grade5->options(TRUE);

			// State5
			$this->State5->EditAttrs["class"] = "form-control";
			$this->State5->EditCustomAttributes = "";
			$this->State5->EditValue = $this->State5->options(TRUE);

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

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() <> "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
			} else {
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// Volume
			$this->Volume->EditAttrs["class"] = "form-control";
			$this->Volume->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
			$this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
			$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

			// Volume1
			$this->Volume1->EditAttrs["class"] = "form-control";
			$this->Volume1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
			$this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
			$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

			// Volume2
			$this->Volume2->EditAttrs["class"] = "form-control";
			$this->Volume2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
			$this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
			$this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

			// Concentration2
			$this->Concentration2->EditAttrs["class"] = "form-control";
			$this->Concentration2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
			$this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
			$this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

			// Total
			$this->Total->EditAttrs["class"] = "form-control";
			$this->Total->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
			$this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
			$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

			// Total1
			$this->Total1->EditAttrs["class"] = "form-control";
			$this->Total1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
			$this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
			$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

			// Total2
			$this->Total2->EditAttrs["class"] = "form-control";
			$this->Total2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
			$this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
			$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

			// Progressive
			$this->Progressive->EditAttrs["class"] = "form-control";
			$this->Progressive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Progressive->CurrentValue = HtmlDecode($this->Progressive->CurrentValue);
			$this->Progressive->EditValue = HtmlEncode($this->Progressive->CurrentValue);
			$this->Progressive->PlaceHolder = RemoveHtml($this->Progressive->caption());

			// Progressive1
			$this->Progressive1->EditAttrs["class"] = "form-control";
			$this->Progressive1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Progressive1->CurrentValue = HtmlDecode($this->Progressive1->CurrentValue);
			$this->Progressive1->EditValue = HtmlEncode($this->Progressive1->CurrentValue);
			$this->Progressive1->PlaceHolder = RemoveHtml($this->Progressive1->caption());

			// Progressive2
			$this->Progressive2->EditAttrs["class"] = "form-control";
			$this->Progressive2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Progressive2->CurrentValue = HtmlDecode($this->Progressive2->CurrentValue);
			$this->Progressive2->EditValue = HtmlEncode($this->Progressive2->CurrentValue);
			$this->Progressive2->PlaceHolder = RemoveHtml($this->Progressive2->caption());

			// NotProgressive
			$this->NotProgressive->EditAttrs["class"] = "form-control";
			$this->NotProgressive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotProgressive->CurrentValue = HtmlDecode($this->NotProgressive->CurrentValue);
			$this->NotProgressive->EditValue = HtmlEncode($this->NotProgressive->CurrentValue);
			$this->NotProgressive->PlaceHolder = RemoveHtml($this->NotProgressive->caption());

			// NotProgressive1
			$this->NotProgressive1->EditAttrs["class"] = "form-control";
			$this->NotProgressive1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotProgressive1->CurrentValue = HtmlDecode($this->NotProgressive1->CurrentValue);
			$this->NotProgressive1->EditValue = HtmlEncode($this->NotProgressive1->CurrentValue);
			$this->NotProgressive1->PlaceHolder = RemoveHtml($this->NotProgressive1->caption());

			// NotProgressive2
			$this->NotProgressive2->EditAttrs["class"] = "form-control";
			$this->NotProgressive2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NotProgressive2->CurrentValue = HtmlDecode($this->NotProgressive2->CurrentValue);
			$this->NotProgressive2->EditValue = HtmlEncode($this->NotProgressive2->CurrentValue);
			$this->NotProgressive2->PlaceHolder = RemoveHtml($this->NotProgressive2->caption());

			// Motility2
			$this->Motility2->EditAttrs["class"] = "form-control";
			$this->Motility2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Motility2->CurrentValue = HtmlDecode($this->Motility2->CurrentValue);
			$this->Motility2->EditValue = HtmlEncode($this->Motility2->CurrentValue);
			$this->Motility2->PlaceHolder = RemoveHtml($this->Motility2->caption());

			// Morphology2
			$this->Morphology2->EditAttrs["class"] = "form-control";
			$this->Morphology2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Morphology2->CurrentValue = HtmlDecode($this->Morphology2->CurrentValue);
			$this->Morphology2->EditValue = HtmlEncode($this->Morphology2->CurrentValue);
			$this->Morphology2->PlaceHolder = RemoveHtml($this->Morphology2->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";

			// Spermorigin
			$this->Spermorigin->LinkCustomAttributes = "";
			$this->Spermorigin->HrefValue = "";

			// IndicationforART
			$this->IndicationforART->LinkCustomAttributes = "";
			$this->IndicationforART->HrefValue = "";

			// DateofICSI
			$this->DateofICSI->LinkCustomAttributes = "";
			$this->DateofICSI->HrefValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// pre_Concentration
			$this->pre_Concentration->LinkCustomAttributes = "";
			$this->pre_Concentration->HrefValue = "";

			// pre_Motility
			$this->pre_Motility->LinkCustomAttributes = "";
			$this->pre_Motility->HrefValue = "";

			// pre_Morphology
			$this->pre_Morphology->LinkCustomAttributes = "";
			$this->pre_Morphology->HrefValue = "";

			// post_Concentration
			$this->post_Concentration->LinkCustomAttributes = "";
			$this->post_Concentration->HrefValue = "";

			// post_Motility
			$this->post_Motility->LinkCustomAttributes = "";
			$this->post_Motility->HrefValue = "";

			// post_Morphology
			$this->post_Morphology->LinkCustomAttributes = "";
			$this->post_Morphology->HrefValue = "";

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->LinkCustomAttributes = "";
			$this->NumberofEmbryostransferred->HrefValue = "";

			// Embryosunderobservation
			$this->Embryosunderobservation->LinkCustomAttributes = "";
			$this->Embryosunderobservation->HrefValue = "";

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
			$this->EmbryoDevelopmentSummary->HrefValue = "";

			// EmbryologistSignature
			$this->EmbryologistSignature->LinkCustomAttributes = "";
			$this->EmbryologistSignature->HrefValue = "";

			// IVFRegistrationID
			$this->IVFRegistrationID->LinkCustomAttributes = "";
			$this->IVFRegistrationID->HrefValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";

			// ICSIDetails
			$this->ICSIDetails->LinkCustomAttributes = "";
			$this->ICSIDetails->HrefValue = "";

			// DateofET
			$this->DateofET->LinkCustomAttributes = "";
			$this->DateofET->HrefValue = "";

			// Reasonfornotranfer
			$this->Reasonfornotranfer->LinkCustomAttributes = "";
			$this->Reasonfornotranfer->HrefValue = "";

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->LinkCustomAttributes = "";
			$this->EmbryosCryopreserved->HrefValue = "";

			// LegendCellStage
			$this->LegendCellStage->LinkCustomAttributes = "";
			$this->LegendCellStage->HrefValue = "";

			// ConsultantsSignature
			$this->ConsultantsSignature->LinkCustomAttributes = "";
			$this->ConsultantsSignature->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// M2
			$this->M2->LinkCustomAttributes = "";
			$this->M2->HrefValue = "";

			// Mi2
			$this->Mi2->LinkCustomAttributes = "";
			$this->Mi2->HrefValue = "";

			// ICSI
			$this->ICSI->LinkCustomAttributes = "";
			$this->ICSI->HrefValue = "";

			// IVF
			$this->IVF->LinkCustomAttributes = "";
			$this->IVF->HrefValue = "";

			// M1
			$this->M1->LinkCustomAttributes = "";
			$this->M1->HrefValue = "";

			// GV
			$this->GV->LinkCustomAttributes = "";
			$this->GV->HrefValue = "";

			// Others
			$this->Others->LinkCustomAttributes = "";
			$this->Others->HrefValue = "";

			// Normal2PN
			$this->Normal2PN->LinkCustomAttributes = "";
			$this->Normal2PN->HrefValue = "";

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->LinkCustomAttributes = "";
			$this->Abnormalfertilisation1N->HrefValue = "";

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->LinkCustomAttributes = "";
			$this->Abnormalfertilisation3N->HrefValue = "";

			// NotFertilized
			$this->NotFertilized->LinkCustomAttributes = "";
			$this->NotFertilized->HrefValue = "";

			// Degenerated
			$this->Degenerated->LinkCustomAttributes = "";
			$this->Degenerated->HrefValue = "";

			// SpermDate
			$this->SpermDate->LinkCustomAttributes = "";
			$this->SpermDate->HrefValue = "";

			// Code1
			$this->Code1->LinkCustomAttributes = "";
			$this->Code1->HrefValue = "";

			// Day1
			$this->Day1->LinkCustomAttributes = "";
			$this->Day1->HrefValue = "";

			// CellStage1
			$this->CellStage1->LinkCustomAttributes = "";
			$this->CellStage1->HrefValue = "";

			// Grade1
			$this->Grade1->LinkCustomAttributes = "";
			$this->Grade1->HrefValue = "";

			// State1
			$this->State1->LinkCustomAttributes = "";
			$this->State1->HrefValue = "";

			// Code2
			$this->Code2->LinkCustomAttributes = "";
			$this->Code2->HrefValue = "";

			// Day2
			$this->Day2->LinkCustomAttributes = "";
			$this->Day2->HrefValue = "";

			// CellStage2
			$this->CellStage2->LinkCustomAttributes = "";
			$this->CellStage2->HrefValue = "";

			// Grade2
			$this->Grade2->LinkCustomAttributes = "";
			$this->Grade2->HrefValue = "";

			// State2
			$this->State2->LinkCustomAttributes = "";
			$this->State2->HrefValue = "";

			// Code3
			$this->Code3->LinkCustomAttributes = "";
			$this->Code3->HrefValue = "";

			// Day3
			$this->Day3->LinkCustomAttributes = "";
			$this->Day3->HrefValue = "";

			// CellStage3
			$this->CellStage3->LinkCustomAttributes = "";
			$this->CellStage3->HrefValue = "";

			// Grade3
			$this->Grade3->LinkCustomAttributes = "";
			$this->Grade3->HrefValue = "";

			// State3
			$this->State3->LinkCustomAttributes = "";
			$this->State3->HrefValue = "";

			// Code4
			$this->Code4->LinkCustomAttributes = "";
			$this->Code4->HrefValue = "";

			// Day4
			$this->Day4->LinkCustomAttributes = "";
			$this->Day4->HrefValue = "";

			// CellStage4
			$this->CellStage4->LinkCustomAttributes = "";
			$this->CellStage4->HrefValue = "";

			// Grade4
			$this->Grade4->LinkCustomAttributes = "";
			$this->Grade4->HrefValue = "";

			// State4
			$this->State4->LinkCustomAttributes = "";
			$this->State4->HrefValue = "";

			// Code5
			$this->Code5->LinkCustomAttributes = "";
			$this->Code5->HrefValue = "";

			// Day5
			$this->Day5->LinkCustomAttributes = "";
			$this->Day5->HrefValue = "";

			// CellStage5
			$this->CellStage5->LinkCustomAttributes = "";
			$this->CellStage5->HrefValue = "";

			// Grade5
			$this->Grade5->LinkCustomAttributes = "";
			$this->Grade5->HrefValue = "";

			// State5
			$this->State5->LinkCustomAttributes = "";
			$this->State5->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";

			// Volume1
			$this->Volume1->LinkCustomAttributes = "";
			$this->Volume1->HrefValue = "";

			// Volume2
			$this->Volume2->LinkCustomAttributes = "";
			$this->Volume2->HrefValue = "";

			// Concentration2
			$this->Concentration2->LinkCustomAttributes = "";
			$this->Concentration2->HrefValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";

			// Total1
			$this->Total1->LinkCustomAttributes = "";
			$this->Total1->HrefValue = "";

			// Total2
			$this->Total2->LinkCustomAttributes = "";
			$this->Total2->HrefValue = "";

			// Progressive
			$this->Progressive->LinkCustomAttributes = "";
			$this->Progressive->HrefValue = "";

			// Progressive1
			$this->Progressive1->LinkCustomAttributes = "";
			$this->Progressive1->HrefValue = "";

			// Progressive2
			$this->Progressive2->LinkCustomAttributes = "";
			$this->Progressive2->HrefValue = "";

			// NotProgressive
			$this->NotProgressive->LinkCustomAttributes = "";
			$this->NotProgressive->HrefValue = "";

			// NotProgressive1
			$this->NotProgressive1->LinkCustomAttributes = "";
			$this->NotProgressive1->HrefValue = "";

			// NotProgressive2
			$this->NotProgressive2->LinkCustomAttributes = "";
			$this->NotProgressive2->HrefValue = "";

			// Motility2
			$this->Motility2->LinkCustomAttributes = "";
			$this->Motility2->HrefValue = "";

			// Morphology2
			$this->Morphology2->LinkCustomAttributes = "";
			$this->Morphology2->HrefValue = "";
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
		if ($this->ARTCycle->Required) {
			if (!$this->ARTCycle->IsDetailKey && $this->ARTCycle->FormValue != NULL && $this->ARTCycle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
			}
		}
		if ($this->Spermorigin->Required) {
			if (!$this->Spermorigin->IsDetailKey && $this->Spermorigin->FormValue != NULL && $this->Spermorigin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Spermorigin->caption(), $this->Spermorigin->RequiredErrorMessage));
			}
		}
		if ($this->IndicationforART->Required) {
			if (!$this->IndicationforART->IsDetailKey && $this->IndicationforART->FormValue != NULL && $this->IndicationforART->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IndicationforART->caption(), $this->IndicationforART->RequiredErrorMessage));
			}
		}
		if ($this->DateofICSI->Required) {
			if (!$this->DateofICSI->IsDetailKey && $this->DateofICSI->FormValue != NULL && $this->DateofICSI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofICSI->caption(), $this->DateofICSI->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DateofICSI->FormValue)) {
			AddMessage($FormError, $this->DateofICSI->errorMessage());
		}
		if ($this->Origin->Required) {
			if (!$this->Origin->IsDetailKey && $this->Origin->FormValue != NULL && $this->Origin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Origin->caption(), $this->Origin->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if (!$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->pre_Concentration->Required) {
			if (!$this->pre_Concentration->IsDetailKey && $this->pre_Concentration->FormValue != NULL && $this->pre_Concentration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pre_Concentration->caption(), $this->pre_Concentration->RequiredErrorMessage));
			}
		}
		if ($this->pre_Motility->Required) {
			if (!$this->pre_Motility->IsDetailKey && $this->pre_Motility->FormValue != NULL && $this->pre_Motility->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pre_Motility->caption(), $this->pre_Motility->RequiredErrorMessage));
			}
		}
		if ($this->pre_Morphology->Required) {
			if (!$this->pre_Morphology->IsDetailKey && $this->pre_Morphology->FormValue != NULL && $this->pre_Morphology->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pre_Morphology->caption(), $this->pre_Morphology->RequiredErrorMessage));
			}
		}
		if ($this->post_Concentration->Required) {
			if (!$this->post_Concentration->IsDetailKey && $this->post_Concentration->FormValue != NULL && $this->post_Concentration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->post_Concentration->caption(), $this->post_Concentration->RequiredErrorMessage));
			}
		}
		if ($this->post_Motility->Required) {
			if (!$this->post_Motility->IsDetailKey && $this->post_Motility->FormValue != NULL && $this->post_Motility->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->post_Motility->caption(), $this->post_Motility->RequiredErrorMessage));
			}
		}
		if ($this->post_Morphology->Required) {
			if (!$this->post_Morphology->IsDetailKey && $this->post_Morphology->FormValue != NULL && $this->post_Morphology->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->post_Morphology->caption(), $this->post_Morphology->RequiredErrorMessage));
			}
		}
		if ($this->NumberofEmbryostransferred->Required) {
			if (!$this->NumberofEmbryostransferred->IsDetailKey && $this->NumberofEmbryostransferred->FormValue != NULL && $this->NumberofEmbryostransferred->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NumberofEmbryostransferred->caption(), $this->NumberofEmbryostransferred->RequiredErrorMessage));
			}
		}
		if ($this->Embryosunderobservation->Required) {
			if (!$this->Embryosunderobservation->IsDetailKey && $this->Embryosunderobservation->FormValue != NULL && $this->Embryosunderobservation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Embryosunderobservation->caption(), $this->Embryosunderobservation->RequiredErrorMessage));
			}
		}
		if ($this->EmbryoDevelopmentSummary->Required) {
			if (!$this->EmbryoDevelopmentSummary->IsDetailKey && $this->EmbryoDevelopmentSummary->FormValue != NULL && $this->EmbryoDevelopmentSummary->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryoDevelopmentSummary->caption(), $this->EmbryoDevelopmentSummary->RequiredErrorMessage));
			}
		}
		if ($this->EmbryologistSignature->Required) {
			if (!$this->EmbryologistSignature->IsDetailKey && $this->EmbryologistSignature->FormValue != NULL && $this->EmbryologistSignature->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryologistSignature->caption(), $this->EmbryologistSignature->RequiredErrorMessage));
			}
		}
		if ($this->IVFRegistrationID->Required) {
			if (!$this->IVFRegistrationID->IsDetailKey && $this->IVFRegistrationID->FormValue != NULL && $this->IVFRegistrationID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IVFRegistrationID->caption(), $this->IVFRegistrationID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->IVFRegistrationID->FormValue)) {
			AddMessage($FormError, $this->IVFRegistrationID->errorMessage());
		}
		if ($this->InseminatinTechnique->Required) {
			if (!$this->InseminatinTechnique->IsDetailKey && $this->InseminatinTechnique->FormValue != NULL && $this->InseminatinTechnique->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InseminatinTechnique->caption(), $this->InseminatinTechnique->RequiredErrorMessage));
			}
		}
		if ($this->ICSIDetails->Required) {
			if (!$this->ICSIDetails->IsDetailKey && $this->ICSIDetails->FormValue != NULL && $this->ICSIDetails->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSIDetails->caption(), $this->ICSIDetails->RequiredErrorMessage));
			}
		}
		if ($this->DateofET->Required) {
			if (!$this->DateofET->IsDetailKey && $this->DateofET->FormValue != NULL && $this->DateofET->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofET->caption(), $this->DateofET->RequiredErrorMessage));
			}
		}
		if ($this->Reasonfornotranfer->Required) {
			if (!$this->Reasonfornotranfer->IsDetailKey && $this->Reasonfornotranfer->FormValue != NULL && $this->Reasonfornotranfer->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reasonfornotranfer->caption(), $this->Reasonfornotranfer->RequiredErrorMessage));
			}
		}
		if ($this->EmbryosCryopreserved->Required) {
			if (!$this->EmbryosCryopreserved->IsDetailKey && $this->EmbryosCryopreserved->FormValue != NULL && $this->EmbryosCryopreserved->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryosCryopreserved->caption(), $this->EmbryosCryopreserved->RequiredErrorMessage));
			}
		}
		if ($this->LegendCellStage->Required) {
			if (!$this->LegendCellStage->IsDetailKey && $this->LegendCellStage->FormValue != NULL && $this->LegendCellStage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LegendCellStage->caption(), $this->LegendCellStage->RequiredErrorMessage));
			}
		}
		if ($this->ConsultantsSignature->Required) {
			if (!$this->ConsultantsSignature->IsDetailKey && $this->ConsultantsSignature->FormValue != NULL && $this->ConsultantsSignature->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ConsultantsSignature->caption(), $this->ConsultantsSignature->RequiredErrorMessage));
			}
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->M2->Required) {
			if (!$this->M2->IsDetailKey && $this->M2->FormValue != NULL && $this->M2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->M2->caption(), $this->M2->RequiredErrorMessage));
			}
		}
		if ($this->Mi2->Required) {
			if (!$this->Mi2->IsDetailKey && $this->Mi2->FormValue != NULL && $this->Mi2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mi2->caption(), $this->Mi2->RequiredErrorMessage));
			}
		}
		if ($this->ICSI->Required) {
			if (!$this->ICSI->IsDetailKey && $this->ICSI->FormValue != NULL && $this->ICSI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSI->caption(), $this->ICSI->RequiredErrorMessage));
			}
		}
		if ($this->IVF->Required) {
			if (!$this->IVF->IsDetailKey && $this->IVF->FormValue != NULL && $this->IVF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IVF->caption(), $this->IVF->RequiredErrorMessage));
			}
		}
		if ($this->M1->Required) {
			if (!$this->M1->IsDetailKey && $this->M1->FormValue != NULL && $this->M1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->M1->caption(), $this->M1->RequiredErrorMessage));
			}
		}
		if ($this->GV->Required) {
			if (!$this->GV->IsDetailKey && $this->GV->FormValue != NULL && $this->GV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GV->caption(), $this->GV->RequiredErrorMessage));
			}
		}
		if ($this->Others->Required) {
			if (!$this->Others->IsDetailKey && $this->Others->FormValue != NULL && $this->Others->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Others->caption(), $this->Others->RequiredErrorMessage));
			}
		}
		if ($this->Normal2PN->Required) {
			if (!$this->Normal2PN->IsDetailKey && $this->Normal2PN->FormValue != NULL && $this->Normal2PN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Normal2PN->caption(), $this->Normal2PN->RequiredErrorMessage));
			}
		}
		if ($this->Abnormalfertilisation1N->Required) {
			if (!$this->Abnormalfertilisation1N->IsDetailKey && $this->Abnormalfertilisation1N->FormValue != NULL && $this->Abnormalfertilisation1N->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormalfertilisation1N->caption(), $this->Abnormalfertilisation1N->RequiredErrorMessage));
			}
		}
		if ($this->Abnormalfertilisation3N->Required) {
			if (!$this->Abnormalfertilisation3N->IsDetailKey && $this->Abnormalfertilisation3N->FormValue != NULL && $this->Abnormalfertilisation3N->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormalfertilisation3N->caption(), $this->Abnormalfertilisation3N->RequiredErrorMessage));
			}
		}
		if ($this->NotFertilized->Required) {
			if (!$this->NotFertilized->IsDetailKey && $this->NotFertilized->FormValue != NULL && $this->NotFertilized->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NotFertilized->caption(), $this->NotFertilized->RequiredErrorMessage));
			}
		}
		if ($this->Degenerated->Required) {
			if (!$this->Degenerated->IsDetailKey && $this->Degenerated->FormValue != NULL && $this->Degenerated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Degenerated->caption(), $this->Degenerated->RequiredErrorMessage));
			}
		}
		if ($this->SpermDate->Required) {
			if (!$this->SpermDate->IsDetailKey && $this->SpermDate->FormValue != NULL && $this->SpermDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SpermDate->caption(), $this->SpermDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SpermDate->FormValue)) {
			AddMessage($FormError, $this->SpermDate->errorMessage());
		}
		if ($this->Code1->Required) {
			if (!$this->Code1->IsDetailKey && $this->Code1->FormValue != NULL && $this->Code1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code1->caption(), $this->Code1->RequiredErrorMessage));
			}
		}
		if ($this->Day1->Required) {
			if (!$this->Day1->IsDetailKey && $this->Day1->FormValue != NULL && $this->Day1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day1->caption(), $this->Day1->RequiredErrorMessage));
			}
		}
		if ($this->CellStage1->Required) {
			if (!$this->CellStage1->IsDetailKey && $this->CellStage1->FormValue != NULL && $this->CellStage1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage1->caption(), $this->CellStage1->RequiredErrorMessage));
			}
		}
		if ($this->Grade1->Required) {
			if (!$this->Grade1->IsDetailKey && $this->Grade1->FormValue != NULL && $this->Grade1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade1->caption(), $this->Grade1->RequiredErrorMessage));
			}
		}
		if ($this->State1->Required) {
			if (!$this->State1->IsDetailKey && $this->State1->FormValue != NULL && $this->State1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State1->caption(), $this->State1->RequiredErrorMessage));
			}
		}
		if ($this->Code2->Required) {
			if (!$this->Code2->IsDetailKey && $this->Code2->FormValue != NULL && $this->Code2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code2->caption(), $this->Code2->RequiredErrorMessage));
			}
		}
		if ($this->Day2->Required) {
			if (!$this->Day2->IsDetailKey && $this->Day2->FormValue != NULL && $this->Day2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day2->caption(), $this->Day2->RequiredErrorMessage));
			}
		}
		if ($this->CellStage2->Required) {
			if (!$this->CellStage2->IsDetailKey && $this->CellStage2->FormValue != NULL && $this->CellStage2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage2->caption(), $this->CellStage2->RequiredErrorMessage));
			}
		}
		if ($this->Grade2->Required) {
			if (!$this->Grade2->IsDetailKey && $this->Grade2->FormValue != NULL && $this->Grade2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade2->caption(), $this->Grade2->RequiredErrorMessage));
			}
		}
		if ($this->State2->Required) {
			if (!$this->State2->IsDetailKey && $this->State2->FormValue != NULL && $this->State2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State2->caption(), $this->State2->RequiredErrorMessage));
			}
		}
		if ($this->Code3->Required) {
			if (!$this->Code3->IsDetailKey && $this->Code3->FormValue != NULL && $this->Code3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code3->caption(), $this->Code3->RequiredErrorMessage));
			}
		}
		if ($this->Day3->Required) {
			if (!$this->Day3->IsDetailKey && $this->Day3->FormValue != NULL && $this->Day3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day3->caption(), $this->Day3->RequiredErrorMessage));
			}
		}
		if ($this->CellStage3->Required) {
			if (!$this->CellStage3->IsDetailKey && $this->CellStage3->FormValue != NULL && $this->CellStage3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage3->caption(), $this->CellStage3->RequiredErrorMessage));
			}
		}
		if ($this->Grade3->Required) {
			if (!$this->Grade3->IsDetailKey && $this->Grade3->FormValue != NULL && $this->Grade3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade3->caption(), $this->Grade3->RequiredErrorMessage));
			}
		}
		if ($this->State3->Required) {
			if (!$this->State3->IsDetailKey && $this->State3->FormValue != NULL && $this->State3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State3->caption(), $this->State3->RequiredErrorMessage));
			}
		}
		if ($this->Code4->Required) {
			if (!$this->Code4->IsDetailKey && $this->Code4->FormValue != NULL && $this->Code4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code4->caption(), $this->Code4->RequiredErrorMessage));
			}
		}
		if ($this->Day4->Required) {
			if (!$this->Day4->IsDetailKey && $this->Day4->FormValue != NULL && $this->Day4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day4->caption(), $this->Day4->RequiredErrorMessage));
			}
		}
		if ($this->CellStage4->Required) {
			if (!$this->CellStage4->IsDetailKey && $this->CellStage4->FormValue != NULL && $this->CellStage4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage4->caption(), $this->CellStage4->RequiredErrorMessage));
			}
		}
		if ($this->Grade4->Required) {
			if (!$this->Grade4->IsDetailKey && $this->Grade4->FormValue != NULL && $this->Grade4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade4->caption(), $this->Grade4->RequiredErrorMessage));
			}
		}
		if ($this->State4->Required) {
			if (!$this->State4->IsDetailKey && $this->State4->FormValue != NULL && $this->State4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State4->caption(), $this->State4->RequiredErrorMessage));
			}
		}
		if ($this->Code5->Required) {
			if (!$this->Code5->IsDetailKey && $this->Code5->FormValue != NULL && $this->Code5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code5->caption(), $this->Code5->RequiredErrorMessage));
			}
		}
		if ($this->Day5->Required) {
			if (!$this->Day5->IsDetailKey && $this->Day5->FormValue != NULL && $this->Day5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day5->caption(), $this->Day5->RequiredErrorMessage));
			}
		}
		if ($this->CellStage5->Required) {
			if (!$this->CellStage5->IsDetailKey && $this->CellStage5->FormValue != NULL && $this->CellStage5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage5->caption(), $this->CellStage5->RequiredErrorMessage));
			}
		}
		if ($this->Grade5->Required) {
			if (!$this->Grade5->IsDetailKey && $this->Grade5->FormValue != NULL && $this->Grade5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade5->caption(), $this->Grade5->RequiredErrorMessage));
			}
		}
		if ($this->State5->Required) {
			if (!$this->State5->IsDetailKey && $this->State5->FormValue != NULL && $this->State5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State5->caption(), $this->State5->RequiredErrorMessage));
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
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNo->FormValue)) {
			AddMessage($FormError, $this->RIDNo->errorMessage());
		}
		if ($this->Volume->Required) {
			if (!$this->Volume->IsDetailKey && $this->Volume->FormValue != NULL && $this->Volume->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
			}
		}
		if ($this->Volume1->Required) {
			if (!$this->Volume1->IsDetailKey && $this->Volume1->FormValue != NULL && $this->Volume1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume1->caption(), $this->Volume1->RequiredErrorMessage));
			}
		}
		if ($this->Volume2->Required) {
			if (!$this->Volume2->IsDetailKey && $this->Volume2->FormValue != NULL && $this->Volume2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume2->caption(), $this->Volume2->RequiredErrorMessage));
			}
		}
		if ($this->Concentration2->Required) {
			if (!$this->Concentration2->IsDetailKey && $this->Concentration2->FormValue != NULL && $this->Concentration2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Concentration2->caption(), $this->Concentration2->RequiredErrorMessage));
			}
		}
		if ($this->Total->Required) {
			if (!$this->Total->IsDetailKey && $this->Total->FormValue != NULL && $this->Total->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total->caption(), $this->Total->RequiredErrorMessage));
			}
		}
		if ($this->Total1->Required) {
			if (!$this->Total1->IsDetailKey && $this->Total1->FormValue != NULL && $this->Total1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total1->caption(), $this->Total1->RequiredErrorMessage));
			}
		}
		if ($this->Total2->Required) {
			if (!$this->Total2->IsDetailKey && $this->Total2->FormValue != NULL && $this->Total2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total2->caption(), $this->Total2->RequiredErrorMessage));
			}
		}
		if ($this->Progressive->Required) {
			if (!$this->Progressive->IsDetailKey && $this->Progressive->FormValue != NULL && $this->Progressive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Progressive->caption(), $this->Progressive->RequiredErrorMessage));
			}
		}
		if ($this->Progressive1->Required) {
			if (!$this->Progressive1->IsDetailKey && $this->Progressive1->FormValue != NULL && $this->Progressive1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Progressive1->caption(), $this->Progressive1->RequiredErrorMessage));
			}
		}
		if ($this->Progressive2->Required) {
			if (!$this->Progressive2->IsDetailKey && $this->Progressive2->FormValue != NULL && $this->Progressive2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Progressive2->caption(), $this->Progressive2->RequiredErrorMessage));
			}
		}
		if ($this->NotProgressive->Required) {
			if (!$this->NotProgressive->IsDetailKey && $this->NotProgressive->FormValue != NULL && $this->NotProgressive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NotProgressive->caption(), $this->NotProgressive->RequiredErrorMessage));
			}
		}
		if ($this->NotProgressive1->Required) {
			if (!$this->NotProgressive1->IsDetailKey && $this->NotProgressive1->FormValue != NULL && $this->NotProgressive1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NotProgressive1->caption(), $this->NotProgressive1->RequiredErrorMessage));
			}
		}
		if ($this->NotProgressive2->Required) {
			if (!$this->NotProgressive2->IsDetailKey && $this->NotProgressive2->FormValue != NULL && $this->NotProgressive2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NotProgressive2->caption(), $this->NotProgressive2->RequiredErrorMessage));
			}
		}
		if ($this->Motility2->Required) {
			if (!$this->Motility2->IsDetailKey && $this->Motility2->FormValue != NULL && $this->Motility2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Motility2->caption(), $this->Motility2->RequiredErrorMessage));
			}
		}
		if ($this->Morphology2->Required) {
			if (!$this->Morphology2->IsDetailKey && $this->Morphology2->FormValue != NULL && $this->Morphology2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Morphology2->caption(), $this->Morphology2->RequiredErrorMessage));
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

			// ARTCycle
			$this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, NULL, $this->ARTCycle->ReadOnly);

			// Spermorigin
			$this->Spermorigin->setDbValueDef($rsnew, $this->Spermorigin->CurrentValue, NULL, $this->Spermorigin->ReadOnly);

			// IndicationforART
			$this->IndicationforART->setDbValueDef($rsnew, $this->IndicationforART->CurrentValue, NULL, $this->IndicationforART->ReadOnly);

			// DateofICSI
			$this->DateofICSI->setDbValueDef($rsnew, UnFormatDateTime($this->DateofICSI->CurrentValue, 7), NULL, $this->DateofICSI->ReadOnly);

			// Origin
			$this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, NULL, $this->Origin->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, $this->Status->ReadOnly);

			// Method
			$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, $this->Method->ReadOnly);

			// pre_Concentration
			$this->pre_Concentration->setDbValueDef($rsnew, $this->pre_Concentration->CurrentValue, NULL, $this->pre_Concentration->ReadOnly);

			// pre_Motility
			$this->pre_Motility->setDbValueDef($rsnew, $this->pre_Motility->CurrentValue, NULL, $this->pre_Motility->ReadOnly);

			// pre_Morphology
			$this->pre_Morphology->setDbValueDef($rsnew, $this->pre_Morphology->CurrentValue, NULL, $this->pre_Morphology->ReadOnly);

			// post_Concentration
			$this->post_Concentration->setDbValueDef($rsnew, $this->post_Concentration->CurrentValue, NULL, $this->post_Concentration->ReadOnly);

			// post_Motility
			$this->post_Motility->setDbValueDef($rsnew, $this->post_Motility->CurrentValue, NULL, $this->post_Motility->ReadOnly);

			// post_Morphology
			$this->post_Morphology->setDbValueDef($rsnew, $this->post_Morphology->CurrentValue, NULL, $this->post_Morphology->ReadOnly);

			// NumberofEmbryostransferred
			$this->NumberofEmbryostransferred->setDbValueDef($rsnew, $this->NumberofEmbryostransferred->CurrentValue, NULL, $this->NumberofEmbryostransferred->ReadOnly);

			// Embryosunderobservation
			$this->Embryosunderobservation->setDbValueDef($rsnew, $this->Embryosunderobservation->CurrentValue, NULL, $this->Embryosunderobservation->ReadOnly);

			// EmbryoDevelopmentSummary
			$this->EmbryoDevelopmentSummary->setDbValueDef($rsnew, $this->EmbryoDevelopmentSummary->CurrentValue, NULL, $this->EmbryoDevelopmentSummary->ReadOnly);

			// EmbryologistSignature
			$this->EmbryologistSignature->setDbValueDef($rsnew, $this->EmbryologistSignature->CurrentValue, NULL, $this->EmbryologistSignature->ReadOnly);

			// IVFRegistrationID
			$this->IVFRegistrationID->setDbValueDef($rsnew, $this->IVFRegistrationID->CurrentValue, 0, $this->IVFRegistrationID->ReadOnly);

			// InseminatinTechnique
			$this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, NULL, $this->InseminatinTechnique->ReadOnly);

			// ICSIDetails
			$this->ICSIDetails->setDbValueDef($rsnew, $this->ICSIDetails->CurrentValue, NULL, $this->ICSIDetails->ReadOnly);

			// DateofET
			$this->DateofET->setDbValueDef($rsnew, $this->DateofET->CurrentValue, NULL, $this->DateofET->ReadOnly);

			// Reasonfornotranfer
			$this->Reasonfornotranfer->setDbValueDef($rsnew, $this->Reasonfornotranfer->CurrentValue, NULL, $this->Reasonfornotranfer->ReadOnly);

			// EmbryosCryopreserved
			$this->EmbryosCryopreserved->setDbValueDef($rsnew, $this->EmbryosCryopreserved->CurrentValue, NULL, $this->EmbryosCryopreserved->ReadOnly);

			// LegendCellStage
			$this->LegendCellStage->setDbValueDef($rsnew, $this->LegendCellStage->CurrentValue, NULL, $this->LegendCellStage->ReadOnly);

			// ConsultantsSignature
			$this->ConsultantsSignature->setDbValueDef($rsnew, $this->ConsultantsSignature->CurrentValue, NULL, $this->ConsultantsSignature->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// M2
			$this->M2->setDbValueDef($rsnew, $this->M2->CurrentValue, NULL, $this->M2->ReadOnly);

			// Mi2
			$this->Mi2->setDbValueDef($rsnew, $this->Mi2->CurrentValue, NULL, $this->Mi2->ReadOnly);

			// ICSI
			$this->ICSI->setDbValueDef($rsnew, $this->ICSI->CurrentValue, NULL, $this->ICSI->ReadOnly);

			// IVF
			$this->IVF->setDbValueDef($rsnew, $this->IVF->CurrentValue, NULL, $this->IVF->ReadOnly);

			// M1
			$this->M1->setDbValueDef($rsnew, $this->M1->CurrentValue, NULL, $this->M1->ReadOnly);

			// GV
			$this->GV->setDbValueDef($rsnew, $this->GV->CurrentValue, NULL, $this->GV->ReadOnly);

			// Others
			$this->Others->setDbValueDef($rsnew, $this->Others->CurrentValue, NULL, $this->Others->ReadOnly);

			// Normal2PN
			$this->Normal2PN->setDbValueDef($rsnew, $this->Normal2PN->CurrentValue, NULL, $this->Normal2PN->ReadOnly);

			// Abnormalfertilisation1N
			$this->Abnormalfertilisation1N->setDbValueDef($rsnew, $this->Abnormalfertilisation1N->CurrentValue, NULL, $this->Abnormalfertilisation1N->ReadOnly);

			// Abnormalfertilisation3N
			$this->Abnormalfertilisation3N->setDbValueDef($rsnew, $this->Abnormalfertilisation3N->CurrentValue, NULL, $this->Abnormalfertilisation3N->ReadOnly);

			// NotFertilized
			$this->NotFertilized->setDbValueDef($rsnew, $this->NotFertilized->CurrentValue, NULL, $this->NotFertilized->ReadOnly);

			// Degenerated
			$this->Degenerated->setDbValueDef($rsnew, $this->Degenerated->CurrentValue, NULL, $this->Degenerated->ReadOnly);

			// SpermDate
			$this->SpermDate->setDbValueDef($rsnew, UnFormatDateTime($this->SpermDate->CurrentValue, 0), NULL, $this->SpermDate->ReadOnly);

			// Code1
			$this->Code1->setDbValueDef($rsnew, $this->Code1->CurrentValue, NULL, $this->Code1->ReadOnly);

			// Day1
			$this->Day1->setDbValueDef($rsnew, $this->Day1->CurrentValue, NULL, $this->Day1->ReadOnly);

			// CellStage1
			$this->CellStage1->setDbValueDef($rsnew, $this->CellStage1->CurrentValue, NULL, $this->CellStage1->ReadOnly);

			// Grade1
			$this->Grade1->setDbValueDef($rsnew, $this->Grade1->CurrentValue, NULL, $this->Grade1->ReadOnly);

			// State1
			$this->State1->setDbValueDef($rsnew, $this->State1->CurrentValue, NULL, $this->State1->ReadOnly);

			// Code2
			$this->Code2->setDbValueDef($rsnew, $this->Code2->CurrentValue, NULL, $this->Code2->ReadOnly);

			// Day2
			$this->Day2->setDbValueDef($rsnew, $this->Day2->CurrentValue, NULL, $this->Day2->ReadOnly);

			// CellStage2
			$this->CellStage2->setDbValueDef($rsnew, $this->CellStage2->CurrentValue, NULL, $this->CellStage2->ReadOnly);

			// Grade2
			$this->Grade2->setDbValueDef($rsnew, $this->Grade2->CurrentValue, NULL, $this->Grade2->ReadOnly);

			// State2
			$this->State2->setDbValueDef($rsnew, $this->State2->CurrentValue, NULL, $this->State2->ReadOnly);

			// Code3
			$this->Code3->setDbValueDef($rsnew, $this->Code3->CurrentValue, NULL, $this->Code3->ReadOnly);

			// Day3
			$this->Day3->setDbValueDef($rsnew, $this->Day3->CurrentValue, NULL, $this->Day3->ReadOnly);

			// CellStage3
			$this->CellStage3->setDbValueDef($rsnew, $this->CellStage3->CurrentValue, NULL, $this->CellStage3->ReadOnly);

			// Grade3
			$this->Grade3->setDbValueDef($rsnew, $this->Grade3->CurrentValue, NULL, $this->Grade3->ReadOnly);

			// State3
			$this->State3->setDbValueDef($rsnew, $this->State3->CurrentValue, NULL, $this->State3->ReadOnly);

			// Code4
			$this->Code4->setDbValueDef($rsnew, $this->Code4->CurrentValue, NULL, $this->Code4->ReadOnly);

			// Day4
			$this->Day4->setDbValueDef($rsnew, $this->Day4->CurrentValue, NULL, $this->Day4->ReadOnly);

			// CellStage4
			$this->CellStage4->setDbValueDef($rsnew, $this->CellStage4->CurrentValue, NULL, $this->CellStage4->ReadOnly);

			// Grade4
			$this->Grade4->setDbValueDef($rsnew, $this->Grade4->CurrentValue, NULL, $this->Grade4->ReadOnly);

			// State4
			$this->State4->setDbValueDef($rsnew, $this->State4->CurrentValue, NULL, $this->State4->ReadOnly);

			// Code5
			$this->Code5->setDbValueDef($rsnew, $this->Code5->CurrentValue, NULL, $this->Code5->ReadOnly);

			// Day5
			$this->Day5->setDbValueDef($rsnew, $this->Day5->CurrentValue, NULL, $this->Day5->ReadOnly);

			// CellStage5
			$this->CellStage5->setDbValueDef($rsnew, $this->CellStage5->CurrentValue, NULL, $this->CellStage5->ReadOnly);

			// Grade5
			$this->Grade5->setDbValueDef($rsnew, $this->Grade5->CurrentValue, NULL, $this->Grade5->ReadOnly);

			// State5
			$this->State5->setDbValueDef($rsnew, $this->State5->CurrentValue, NULL, $this->State5->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// RIDNo
			$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, NULL, $this->RIDNo->ReadOnly);

			// Volume
			$this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, NULL, $this->Volume->ReadOnly);

			// Volume1
			$this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, NULL, $this->Volume1->ReadOnly);

			// Volume2
			$this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, NULL, $this->Volume2->ReadOnly);

			// Concentration2
			$this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, NULL, $this->Concentration2->ReadOnly);

			// Total
			$this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, NULL, $this->Total->ReadOnly);

			// Total1
			$this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, NULL, $this->Total1->ReadOnly);

			// Total2
			$this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, NULL, $this->Total2->ReadOnly);

			// Progressive
			$this->Progressive->setDbValueDef($rsnew, $this->Progressive->CurrentValue, NULL, $this->Progressive->ReadOnly);

			// Progressive1
			$this->Progressive1->setDbValueDef($rsnew, $this->Progressive1->CurrentValue, NULL, $this->Progressive1->ReadOnly);

			// Progressive2
			$this->Progressive2->setDbValueDef($rsnew, $this->Progressive2->CurrentValue, NULL, $this->Progressive2->ReadOnly);

			// NotProgressive
			$this->NotProgressive->setDbValueDef($rsnew, $this->NotProgressive->CurrentValue, NULL, $this->NotProgressive->ReadOnly);

			// NotProgressive1
			$this->NotProgressive1->setDbValueDef($rsnew, $this->NotProgressive1->CurrentValue, NULL, $this->NotProgressive1->ReadOnly);

			// NotProgressive2
			$this->NotProgressive2->setDbValueDef($rsnew, $this->NotProgressive2->CurrentValue, NULL, $this->NotProgressive2->ReadOnly);

			// Motility2
			$this->Motility2->setDbValueDef($rsnew, $this->Motility2->CurrentValue, NULL, $this->Motility2->ReadOnly);

			// Morphology2
			$this->Morphology2->setDbValueDef($rsnew, $this->Morphology2->CurrentValue, NULL, $this->Morphology2->ReadOnly);

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
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// ARTCycle
		$this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, NULL, FALSE);

		// Spermorigin
		$this->Spermorigin->setDbValueDef($rsnew, $this->Spermorigin->CurrentValue, NULL, FALSE);

		// IndicationforART
		$this->IndicationforART->setDbValueDef($rsnew, $this->IndicationforART->CurrentValue, NULL, FALSE);

		// DateofICSI
		$this->DateofICSI->setDbValueDef($rsnew, UnFormatDateTime($this->DateofICSI->CurrentValue, 7), NULL, FALSE);

		// Origin
		$this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, FALSE);

		// Method
		$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, FALSE);

		// pre_Concentration
		$this->pre_Concentration->setDbValueDef($rsnew, $this->pre_Concentration->CurrentValue, NULL, FALSE);

		// pre_Motility
		$this->pre_Motility->setDbValueDef($rsnew, $this->pre_Motility->CurrentValue, NULL, FALSE);

		// pre_Morphology
		$this->pre_Morphology->setDbValueDef($rsnew, $this->pre_Morphology->CurrentValue, NULL, FALSE);

		// post_Concentration
		$this->post_Concentration->setDbValueDef($rsnew, $this->post_Concentration->CurrentValue, NULL, FALSE);

		// post_Motility
		$this->post_Motility->setDbValueDef($rsnew, $this->post_Motility->CurrentValue, NULL, FALSE);

		// post_Morphology
		$this->post_Morphology->setDbValueDef($rsnew, $this->post_Morphology->CurrentValue, NULL, FALSE);

		// NumberofEmbryostransferred
		$this->NumberofEmbryostransferred->setDbValueDef($rsnew, $this->NumberofEmbryostransferred->CurrentValue, NULL, FALSE);

		// Embryosunderobservation
		$this->Embryosunderobservation->setDbValueDef($rsnew, $this->Embryosunderobservation->CurrentValue, NULL, FALSE);

		// EmbryoDevelopmentSummary
		$this->EmbryoDevelopmentSummary->setDbValueDef($rsnew, $this->EmbryoDevelopmentSummary->CurrentValue, NULL, FALSE);

		// EmbryologistSignature
		$this->EmbryologistSignature->setDbValueDef($rsnew, $this->EmbryologistSignature->CurrentValue, NULL, FALSE);

		// IVFRegistrationID
		$this->IVFRegistrationID->setDbValueDef($rsnew, $this->IVFRegistrationID->CurrentValue, 0, FALSE);

		// InseminatinTechnique
		$this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, NULL, FALSE);

		// ICSIDetails
		$this->ICSIDetails->setDbValueDef($rsnew, $this->ICSIDetails->CurrentValue, NULL, FALSE);

		// DateofET
		$this->DateofET->setDbValueDef($rsnew, $this->DateofET->CurrentValue, NULL, FALSE);

		// Reasonfornotranfer
		$this->Reasonfornotranfer->setDbValueDef($rsnew, $this->Reasonfornotranfer->CurrentValue, NULL, FALSE);

		// EmbryosCryopreserved
		$this->EmbryosCryopreserved->setDbValueDef($rsnew, $this->EmbryosCryopreserved->CurrentValue, NULL, FALSE);

		// LegendCellStage
		$this->LegendCellStage->setDbValueDef($rsnew, $this->LegendCellStage->CurrentValue, NULL, FALSE);

		// ConsultantsSignature
		$this->ConsultantsSignature->setDbValueDef($rsnew, $this->ConsultantsSignature->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// M2
		$this->M2->setDbValueDef($rsnew, $this->M2->CurrentValue, NULL, FALSE);

		// Mi2
		$this->Mi2->setDbValueDef($rsnew, $this->Mi2->CurrentValue, NULL, FALSE);

		// ICSI
		$this->ICSI->setDbValueDef($rsnew, $this->ICSI->CurrentValue, NULL, FALSE);

		// IVF
		$this->IVF->setDbValueDef($rsnew, $this->IVF->CurrentValue, NULL, FALSE);

		// M1
		$this->M1->setDbValueDef($rsnew, $this->M1->CurrentValue, NULL, FALSE);

		// GV
		$this->GV->setDbValueDef($rsnew, $this->GV->CurrentValue, NULL, FALSE);

		// Others
		$this->Others->setDbValueDef($rsnew, $this->Others->CurrentValue, NULL, FALSE);

		// Normal2PN
		$this->Normal2PN->setDbValueDef($rsnew, $this->Normal2PN->CurrentValue, NULL, FALSE);

		// Abnormalfertilisation1N
		$this->Abnormalfertilisation1N->setDbValueDef($rsnew, $this->Abnormalfertilisation1N->CurrentValue, NULL, FALSE);

		// Abnormalfertilisation3N
		$this->Abnormalfertilisation3N->setDbValueDef($rsnew, $this->Abnormalfertilisation3N->CurrentValue, NULL, FALSE);

		// NotFertilized
		$this->NotFertilized->setDbValueDef($rsnew, $this->NotFertilized->CurrentValue, NULL, FALSE);

		// Degenerated
		$this->Degenerated->setDbValueDef($rsnew, $this->Degenerated->CurrentValue, NULL, FALSE);

		// SpermDate
		$this->SpermDate->setDbValueDef($rsnew, UnFormatDateTime($this->SpermDate->CurrentValue, 0), NULL, FALSE);

		// Code1
		$this->Code1->setDbValueDef($rsnew, $this->Code1->CurrentValue, NULL, FALSE);

		// Day1
		$this->Day1->setDbValueDef($rsnew, $this->Day1->CurrentValue, NULL, FALSE);

		// CellStage1
		$this->CellStage1->setDbValueDef($rsnew, $this->CellStage1->CurrentValue, NULL, FALSE);

		// Grade1
		$this->Grade1->setDbValueDef($rsnew, $this->Grade1->CurrentValue, NULL, FALSE);

		// State1
		$this->State1->setDbValueDef($rsnew, $this->State1->CurrentValue, NULL, FALSE);

		// Code2
		$this->Code2->setDbValueDef($rsnew, $this->Code2->CurrentValue, NULL, FALSE);

		// Day2
		$this->Day2->setDbValueDef($rsnew, $this->Day2->CurrentValue, NULL, FALSE);

		// CellStage2
		$this->CellStage2->setDbValueDef($rsnew, $this->CellStage2->CurrentValue, NULL, FALSE);

		// Grade2
		$this->Grade2->setDbValueDef($rsnew, $this->Grade2->CurrentValue, NULL, FALSE);

		// State2
		$this->State2->setDbValueDef($rsnew, $this->State2->CurrentValue, NULL, FALSE);

		// Code3
		$this->Code3->setDbValueDef($rsnew, $this->Code3->CurrentValue, NULL, FALSE);

		// Day3
		$this->Day3->setDbValueDef($rsnew, $this->Day3->CurrentValue, NULL, FALSE);

		// CellStage3
		$this->CellStage3->setDbValueDef($rsnew, $this->CellStage3->CurrentValue, NULL, FALSE);

		// Grade3
		$this->Grade3->setDbValueDef($rsnew, $this->Grade3->CurrentValue, NULL, FALSE);

		// State3
		$this->State3->setDbValueDef($rsnew, $this->State3->CurrentValue, NULL, FALSE);

		// Code4
		$this->Code4->setDbValueDef($rsnew, $this->Code4->CurrentValue, NULL, FALSE);

		// Day4
		$this->Day4->setDbValueDef($rsnew, $this->Day4->CurrentValue, NULL, FALSE);

		// CellStage4
		$this->CellStage4->setDbValueDef($rsnew, $this->CellStage4->CurrentValue, NULL, FALSE);

		// Grade4
		$this->Grade4->setDbValueDef($rsnew, $this->Grade4->CurrentValue, NULL, FALSE);

		// State4
		$this->State4->setDbValueDef($rsnew, $this->State4->CurrentValue, NULL, FALSE);

		// Code5
		$this->Code5->setDbValueDef($rsnew, $this->Code5->CurrentValue, NULL, FALSE);

		// Day5
		$this->Day5->setDbValueDef($rsnew, $this->Day5->CurrentValue, NULL, FALSE);

		// CellStage5
		$this->CellStage5->setDbValueDef($rsnew, $this->CellStage5->CurrentValue, NULL, FALSE);

		// Grade5
		$this->Grade5->setDbValueDef($rsnew, $this->Grade5->CurrentValue, NULL, FALSE);

		// State5
		$this->State5->setDbValueDef($rsnew, $this->State5->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// RIDNo
		$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, NULL, FALSE);

		// Volume
		$this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, NULL, FALSE);

		// Volume1
		$this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, NULL, FALSE);

		// Volume2
		$this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, NULL, FALSE);

		// Concentration2
		$this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, NULL, FALSE);

		// Total
		$this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, NULL, FALSE);

		// Total1
		$this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, NULL, FALSE);

		// Total2
		$this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, NULL, FALSE);

		// Progressive
		$this->Progressive->setDbValueDef($rsnew, $this->Progressive->CurrentValue, NULL, FALSE);

		// Progressive1
		$this->Progressive1->setDbValueDef($rsnew, $this->Progressive1->CurrentValue, NULL, FALSE);

		// Progressive2
		$this->Progressive2->setDbValueDef($rsnew, $this->Progressive2->CurrentValue, NULL, FALSE);

		// NotProgressive
		$this->NotProgressive->setDbValueDef($rsnew, $this->NotProgressive->CurrentValue, NULL, FALSE);

		// NotProgressive1
		$this->NotProgressive1->setDbValueDef($rsnew, $this->NotProgressive1->CurrentValue, NULL, FALSE);

		// NotProgressive2
		$this->NotProgressive2->setDbValueDef($rsnew, $this->NotProgressive2->CurrentValue, NULL, FALSE);

		// Motility2
		$this->Motility2->setDbValueDef($rsnew, $this->Motility2->CurrentValue, NULL, FALSE);

		// Morphology2
		$this->Morphology2->setDbValueDef($rsnew, $this->Morphology2->CurrentValue, NULL, FALSE);

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
			$this->TidNo->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Name->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->RIDNo->Visible = FALSE;
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
						case "x_ConsultantsSignature":
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
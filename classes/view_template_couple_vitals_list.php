<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_template_couple_vitals_list extends view_template_couple_vitals
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_template_couple_vitals';

	// Page object name
	public $PageObjName = "view_template_couple_vitals_list";

	// Grid form hidden field names
	public $FormName = "fview_template_couple_vitalslist";
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

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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

		// Table object (view_template_couple_vitals)
		if (!isset($GLOBALS["view_template_couple_vitals"]) || get_class($GLOBALS["view_template_couple_vitals"]) == PROJECT_NAMESPACE . "view_template_couple_vitals") {
			$GLOBALS["view_template_couple_vitals"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_template_couple_vitals"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "view_template_couple_vitalsadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "view_template_couple_vitalsdelete.php";
		$this->MultiUpdateUrl = "view_template_couple_vitalsupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_template_couple_vitals');

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

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions();
		$this->ImportOptions->Tag = "div";
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions();
		$this->OtherOptions["detail"]->Tag = "div";
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions();
		$this->OtherOptions["action"]->Tag = "div";
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option fview_template_couple_vitalslistsrch";

		// List actions
		$this->ListActions = new ListActions();
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
		global $EXPORT, $view_template_couple_vitals;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_template_couple_vitals);
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
			$key .= @$ar['id'] . $COMPOSITE_KEY_SEPARATOR;
			$key .= @$ar['hid'];
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->hid->Visible = FALSE;
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

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom <> "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (defined(PROJECT_NAMESPACE . "USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (defined(PROJECT_NAMESPACE . "USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->id->setVisibility();
		$this->Male->setVisibility();
		$this->Female->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->malepropic->Visible = FALSE;
		$this->femalepropic->Visible = FALSE;
		$this->HusbandEducation->setVisibility();
		$this->WifeEducation->setVisibility();
		$this->HusbandWorkHours->setVisibility();
		$this->WifeWorkHours->setVisibility();
		$this->PatientLanguage->setVisibility();
		$this->ReferedBy->setVisibility();
		$this->ReferPhNo->setVisibility();
		$this->WifeCell->setVisibility();
		$this->HusbandCell->setVisibility();
		$this->WifeEmail->setVisibility();
		$this->HusbandEmail->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->CoupleID->setVisibility();
		$this->HospID->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatientID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerID->setVisibility();
		$this->DrID->setVisibility();
		$this->DrDepartment->setVisibility();
		$this->Doctor->setVisibility();
		$this->hid->setVisibility();
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->Age->setVisibility();
		$this->SEX->setVisibility();
		$this->Religion->setVisibility();
		$this->Address->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->DoublewitnessName1->Visible = FALSE;
		$this->DoublewitnessName2->Visible = FALSE;
		$this->Chiefcomplaints->Visible = FALSE;
		$this->MenstrualHistory->Visible = FALSE;
		$this->ObstetricHistory->Visible = FALSE;
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
		$this->AntiTPO->setVisibility();
		$this->AntiTG->setVisibility();
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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions->Items["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		// Search filters

		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

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

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall") && $this->Command <> "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();
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

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->Command <> "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRec = 1;
			$this->DisplayRecs = $this->GridAddRowCount;
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
			if ($this->DisplayRecs <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecs = $this->TotalRecs;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRec();
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

		// Search options
		$this->setupSearchOptions();

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
		if (count($arKeyFlds) >= 2) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
				return FALSE;
			$this->hid->setFormValue($arKeyFlds[1]);
			if (!is_numeric($this->hid->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";

		// Load server side filters
		if (SEARCH_FILTER_OPTION == "Server" && isset($UserProfile))
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_template_couple_vitalslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->Male->AdvancedSearch->toJson(), ","); // Field Male
		$filterList = Concat($filterList, $this->Female->AdvancedSearch->toJson(), ","); // Field Female
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->malepropic->AdvancedSearch->toJson(), ","); // Field malepropic
		$filterList = Concat($filterList, $this->femalepropic->AdvancedSearch->toJson(), ","); // Field femalepropic
		$filterList = Concat($filterList, $this->HusbandEducation->AdvancedSearch->toJson(), ","); // Field HusbandEducation
		$filterList = Concat($filterList, $this->WifeEducation->AdvancedSearch->toJson(), ","); // Field WifeEducation
		$filterList = Concat($filterList, $this->HusbandWorkHours->AdvancedSearch->toJson(), ","); // Field HusbandWorkHours
		$filterList = Concat($filterList, $this->WifeWorkHours->AdvancedSearch->toJson(), ","); // Field WifeWorkHours
		$filterList = Concat($filterList, $this->PatientLanguage->AdvancedSearch->toJson(), ","); // Field PatientLanguage
		$filterList = Concat($filterList, $this->ReferedBy->AdvancedSearch->toJson(), ","); // Field ReferedBy
		$filterList = Concat($filterList, $this->ReferPhNo->AdvancedSearch->toJson(), ","); // Field ReferPhNo
		$filterList = Concat($filterList, $this->WifeCell->AdvancedSearch->toJson(), ","); // Field WifeCell
		$filterList = Concat($filterList, $this->HusbandCell->AdvancedSearch->toJson(), ","); // Field HusbandCell
		$filterList = Concat($filterList, $this->WifeEmail->AdvancedSearch->toJson(), ","); // Field WifeEmail
		$filterList = Concat($filterList, $this->HusbandEmail->AdvancedSearch->toJson(), ","); // Field HusbandEmail
		$filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
		$filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
		$filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
		$filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
		$filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
		$filterList = Concat($filterList, $this->DrDepartment->AdvancedSearch->toJson(), ","); // Field DrDepartment
		$filterList = Concat($filterList, $this->Doctor->AdvancedSearch->toJson(), ","); // Field Doctor
		$filterList = Concat($filterList, $this->hid->AdvancedSearch->toJson(), ","); // Field hid
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->SEX->AdvancedSearch->toJson(), ","); // Field SEX
		$filterList = Concat($filterList, $this->Religion->AdvancedSearch->toJson(), ","); // Field Religion
		$filterList = Concat($filterList, $this->Address->AdvancedSearch->toJson(), ","); // Field Address
		$filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
		$filterList = Concat($filterList, $this->DoublewitnessName1->AdvancedSearch->toJson(), ","); // Field DoublewitnessName1
		$filterList = Concat($filterList, $this->DoublewitnessName2->AdvancedSearch->toJson(), ","); // Field DoublewitnessName2
		$filterList = Concat($filterList, $this->Chiefcomplaints->AdvancedSearch->toJson(), ","); // Field Chiefcomplaints
		$filterList = Concat($filterList, $this->MenstrualHistory->AdvancedSearch->toJson(), ","); // Field MenstrualHistory
		$filterList = Concat($filterList, $this->ObstetricHistory->AdvancedSearch->toJson(), ","); // Field ObstetricHistory
		$filterList = Concat($filterList, $this->MedicalHistory->AdvancedSearch->toJson(), ","); // Field MedicalHistory
		$filterList = Concat($filterList, $this->SurgicalHistory->AdvancedSearch->toJson(), ","); // Field SurgicalHistory
		$filterList = Concat($filterList, $this->Generalexaminationpallor->AdvancedSearch->toJson(), ","); // Field Generalexaminationpallor
		$filterList = Concat($filterList, $this->PR->AdvancedSearch->toJson(), ","); // Field PR
		$filterList = Concat($filterList, $this->CVS->AdvancedSearch->toJson(), ","); // Field CVS
		$filterList = Concat($filterList, $this->PA->AdvancedSearch->toJson(), ","); // Field PA
		$filterList = Concat($filterList, $this->PROVISIONALDIAGNOSIS->AdvancedSearch->toJson(), ","); // Field PROVISIONALDIAGNOSIS
		$filterList = Concat($filterList, $this->Investigations->AdvancedSearch->toJson(), ","); // Field Investigations
		$filterList = Concat($filterList, $this->Fheight->AdvancedSearch->toJson(), ","); // Field Fheight
		$filterList = Concat($filterList, $this->Fweight->AdvancedSearch->toJson(), ","); // Field Fweight
		$filterList = Concat($filterList, $this->FBMI->AdvancedSearch->toJson(), ","); // Field FBMI
		$filterList = Concat($filterList, $this->FBloodgroup->AdvancedSearch->toJson(), ","); // Field FBloodgroup
		$filterList = Concat($filterList, $this->Mheight->AdvancedSearch->toJson(), ","); // Field Mheight
		$filterList = Concat($filterList, $this->Mweight->AdvancedSearch->toJson(), ","); // Field Mweight
		$filterList = Concat($filterList, $this->MBMI->AdvancedSearch->toJson(), ","); // Field MBMI
		$filterList = Concat($filterList, $this->MBloodgroup->AdvancedSearch->toJson(), ","); // Field MBloodgroup
		$filterList = Concat($filterList, $this->FBuild->AdvancedSearch->toJson(), ","); // Field FBuild
		$filterList = Concat($filterList, $this->MBuild->AdvancedSearch->toJson(), ","); // Field MBuild
		$filterList = Concat($filterList, $this->FSkinColor->AdvancedSearch->toJson(), ","); // Field FSkinColor
		$filterList = Concat($filterList, $this->MSkinColor->AdvancedSearch->toJson(), ","); // Field MSkinColor
		$filterList = Concat($filterList, $this->FEyesColor->AdvancedSearch->toJson(), ","); // Field FEyesColor
		$filterList = Concat($filterList, $this->MEyesColor->AdvancedSearch->toJson(), ","); // Field MEyesColor
		$filterList = Concat($filterList, $this->FHairColor->AdvancedSearch->toJson(), ","); // Field FHairColor
		$filterList = Concat($filterList, $this->MhairColor->AdvancedSearch->toJson(), ","); // Field MhairColor
		$filterList = Concat($filterList, $this->FhairTexture->AdvancedSearch->toJson(), ","); // Field FhairTexture
		$filterList = Concat($filterList, $this->MHairTexture->AdvancedSearch->toJson(), ","); // Field MHairTexture
		$filterList = Concat($filterList, $this->Fothers->AdvancedSearch->toJson(), ","); // Field Fothers
		$filterList = Concat($filterList, $this->Mothers->AdvancedSearch->toJson(), ","); // Field Mothers
		$filterList = Concat($filterList, $this->PGE->AdvancedSearch->toJson(), ","); // Field PGE
		$filterList = Concat($filterList, $this->PPR->AdvancedSearch->toJson(), ","); // Field PPR
		$filterList = Concat($filterList, $this->PBP->AdvancedSearch->toJson(), ","); // Field PBP
		$filterList = Concat($filterList, $this->Breast->AdvancedSearch->toJson(), ","); // Field Breast
		$filterList = Concat($filterList, $this->PPA->AdvancedSearch->toJson(), ","); // Field PPA
		$filterList = Concat($filterList, $this->PPSV->AdvancedSearch->toJson(), ","); // Field PPSV
		$filterList = Concat($filterList, $this->PPAPSMEAR->AdvancedSearch->toJson(), ","); // Field PPAPSMEAR
		$filterList = Concat($filterList, $this->PTHYROID->AdvancedSearch->toJson(), ","); // Field PTHYROID
		$filterList = Concat($filterList, $this->MTHYROID->AdvancedSearch->toJson(), ","); // Field MTHYROID
		$filterList = Concat($filterList, $this->SecSexCharacters->AdvancedSearch->toJson(), ","); // Field SecSexCharacters
		$filterList = Concat($filterList, $this->PenisUM->AdvancedSearch->toJson(), ","); // Field PenisUM
		$filterList = Concat($filterList, $this->VAS->AdvancedSearch->toJson(), ","); // Field VAS
		$filterList = Concat($filterList, $this->EPIDIDYMIS->AdvancedSearch->toJson(), ","); // Field EPIDIDYMIS
		$filterList = Concat($filterList, $this->Varicocele->AdvancedSearch->toJson(), ","); // Field Varicocele
		$filterList = Concat($filterList, $this->FertilityTreatmentHistory->AdvancedSearch->toJson(), ","); // Field FertilityTreatmentHistory
		$filterList = Concat($filterList, $this->SurgeryHistory->AdvancedSearch->toJson(), ","); // Field SurgeryHistory
		$filterList = Concat($filterList, $this->FamilyHistory->AdvancedSearch->toJson(), ","); // Field FamilyHistory
		$filterList = Concat($filterList, $this->PInvestigations->AdvancedSearch->toJson(), ","); // Field PInvestigations
		$filterList = Concat($filterList, $this->Addictions->AdvancedSearch->toJson(), ","); // Field Addictions
		$filterList = Concat($filterList, $this->Medications->AdvancedSearch->toJson(), ","); // Field Medications
		$filterList = Concat($filterList, $this->Medical->AdvancedSearch->toJson(), ","); // Field Medical
		$filterList = Concat($filterList, $this->Surgical->AdvancedSearch->toJson(), ","); // Field Surgical
		$filterList = Concat($filterList, $this->CoitalHistory->AdvancedSearch->toJson(), ","); // Field CoitalHistory
		$filterList = Concat($filterList, $this->SemenAnalysis->AdvancedSearch->toJson(), ","); // Field SemenAnalysis
		$filterList = Concat($filterList, $this->MInsvestications->AdvancedSearch->toJson(), ","); // Field MInsvestications
		$filterList = Concat($filterList, $this->PImpression->AdvancedSearch->toJson(), ","); // Field PImpression
		$filterList = Concat($filterList, $this->MIMpression->AdvancedSearch->toJson(), ","); // Field MIMpression
		$filterList = Concat($filterList, $this->PPlanOfManagement->AdvancedSearch->toJson(), ","); // Field PPlanOfManagement
		$filterList = Concat($filterList, $this->MPlanOfManagement->AdvancedSearch->toJson(), ","); // Field MPlanOfManagement
		$filterList = Concat($filterList, $this->PReadMore->AdvancedSearch->toJson(), ","); // Field PReadMore
		$filterList = Concat($filterList, $this->MReadMore->AdvancedSearch->toJson(), ","); // Field MReadMore
		$filterList = Concat($filterList, $this->MariedFor->AdvancedSearch->toJson(), ","); // Field MariedFor
		$filterList = Concat($filterList, $this->CMNCM->AdvancedSearch->toJson(), ","); // Field CMNCM
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->pFamilyHistory->AdvancedSearch->toJson(), ","); // Field pFamilyHistory
		$filterList = Concat($filterList, $this->pTemplateMedications->AdvancedSearch->toJson(), ","); // Field pTemplateMedications
		$filterList = Concat($filterList, $this->AntiTPO->AdvancedSearch->toJson(), ","); // Field AntiTPO
		$filterList = Concat($filterList, $this->AntiTG->AdvancedSearch->toJson(), ","); // Field AntiTG
		if ($this->BasicSearch->Keyword <> "") {
			$wrk = "\"" . TABLE_BASIC_SEARCH . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . TABLE_BASIC_SEARCH_TYPE . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList <> "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList <> "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList <> "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fview_template_couple_vitalslistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field Male
		$this->Male->AdvancedSearch->SearchValue = @$filter["x_Male"];
		$this->Male->AdvancedSearch->SearchOperator = @$filter["z_Male"];
		$this->Male->AdvancedSearch->SearchCondition = @$filter["v_Male"];
		$this->Male->AdvancedSearch->SearchValue2 = @$filter["y_Male"];
		$this->Male->AdvancedSearch->SearchOperator2 = @$filter["w_Male"];
		$this->Male->AdvancedSearch->save();

		// Field Female
		$this->Female->AdvancedSearch->SearchValue = @$filter["x_Female"];
		$this->Female->AdvancedSearch->SearchOperator = @$filter["z_Female"];
		$this->Female->AdvancedSearch->SearchCondition = @$filter["v_Female"];
		$this->Female->AdvancedSearch->SearchValue2 = @$filter["y_Female"];
		$this->Female->AdvancedSearch->SearchOperator2 = @$filter["w_Female"];
		$this->Female->AdvancedSearch->save();

		// Field status
		$this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
		$this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
		$this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
		$this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
		$this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
		$this->status->AdvancedSearch->save();

		// Field createdby
		$this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
		$this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
		$this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
		$this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
		$this->createdby->AdvancedSearch->save();

		// Field createddatetime
		$this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
		$this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
		$this->createddatetime->AdvancedSearch->save();

		// Field modifiedby
		$this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
		$this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
		$this->modifiedby->AdvancedSearch->save();

		// Field modifieddatetime
		$this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
		$this->modifieddatetime->AdvancedSearch->save();

		// Field malepropic
		$this->malepropic->AdvancedSearch->SearchValue = @$filter["x_malepropic"];
		$this->malepropic->AdvancedSearch->SearchOperator = @$filter["z_malepropic"];
		$this->malepropic->AdvancedSearch->SearchCondition = @$filter["v_malepropic"];
		$this->malepropic->AdvancedSearch->SearchValue2 = @$filter["y_malepropic"];
		$this->malepropic->AdvancedSearch->SearchOperator2 = @$filter["w_malepropic"];
		$this->malepropic->AdvancedSearch->save();

		// Field femalepropic
		$this->femalepropic->AdvancedSearch->SearchValue = @$filter["x_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchOperator = @$filter["z_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchCondition = @$filter["v_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchValue2 = @$filter["y_femalepropic"];
		$this->femalepropic->AdvancedSearch->SearchOperator2 = @$filter["w_femalepropic"];
		$this->femalepropic->AdvancedSearch->save();

		// Field HusbandEducation
		$this->HusbandEducation->AdvancedSearch->SearchValue = @$filter["x_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchOperator = @$filter["z_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchCondition = @$filter["v_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchValue2 = @$filter["y_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandEducation"];
		$this->HusbandEducation->AdvancedSearch->save();

		// Field WifeEducation
		$this->WifeEducation->AdvancedSearch->SearchValue = @$filter["x_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchOperator = @$filter["z_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchCondition = @$filter["v_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchValue2 = @$filter["y_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->SearchOperator2 = @$filter["w_WifeEducation"];
		$this->WifeEducation->AdvancedSearch->save();

		// Field HusbandWorkHours
		$this->HusbandWorkHours->AdvancedSearch->SearchValue = @$filter["x_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchOperator = @$filter["z_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchCondition = @$filter["v_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandWorkHours"];
		$this->HusbandWorkHours->AdvancedSearch->save();

		// Field WifeWorkHours
		$this->WifeWorkHours->AdvancedSearch->SearchValue = @$filter["x_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchOperator = @$filter["z_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchCondition = @$filter["v_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_WifeWorkHours"];
		$this->WifeWorkHours->AdvancedSearch->save();

		// Field PatientLanguage
		$this->PatientLanguage->AdvancedSearch->SearchValue = @$filter["x_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchOperator = @$filter["z_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchCondition = @$filter["v_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchValue2 = @$filter["y_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->SearchOperator2 = @$filter["w_PatientLanguage"];
		$this->PatientLanguage->AdvancedSearch->save();

		// Field ReferedBy
		$this->ReferedBy->AdvancedSearch->SearchValue = @$filter["x_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchOperator = @$filter["z_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchCondition = @$filter["v_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchValue2 = @$filter["y_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedBy"];
		$this->ReferedBy->AdvancedSearch->save();

		// Field ReferPhNo
		$this->ReferPhNo->AdvancedSearch->SearchValue = @$filter["x_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchOperator = @$filter["z_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchCondition = @$filter["v_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferPhNo"];
		$this->ReferPhNo->AdvancedSearch->save();

		// Field WifeCell
		$this->WifeCell->AdvancedSearch->SearchValue = @$filter["x_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchOperator = @$filter["z_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchCondition = @$filter["v_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchValue2 = @$filter["y_WifeCell"];
		$this->WifeCell->AdvancedSearch->SearchOperator2 = @$filter["w_WifeCell"];
		$this->WifeCell->AdvancedSearch->save();

		// Field HusbandCell
		$this->HusbandCell->AdvancedSearch->SearchValue = @$filter["x_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchOperator = @$filter["z_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchCondition = @$filter["v_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchValue2 = @$filter["y_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandCell"];
		$this->HusbandCell->AdvancedSearch->save();

		// Field WifeEmail
		$this->WifeEmail->AdvancedSearch->SearchValue = @$filter["x_WifeEmail"];
		$this->WifeEmail->AdvancedSearch->SearchOperator = @$filter["z_WifeEmail"];
		$this->WifeEmail->AdvancedSearch->SearchCondition = @$filter["v_WifeEmail"];
		$this->WifeEmail->AdvancedSearch->SearchValue2 = @$filter["y_WifeEmail"];
		$this->WifeEmail->AdvancedSearch->SearchOperator2 = @$filter["w_WifeEmail"];
		$this->WifeEmail->AdvancedSearch->save();

		// Field HusbandEmail
		$this->HusbandEmail->AdvancedSearch->SearchValue = @$filter["x_HusbandEmail"];
		$this->HusbandEmail->AdvancedSearch->SearchOperator = @$filter["z_HusbandEmail"];
		$this->HusbandEmail->AdvancedSearch->SearchCondition = @$filter["v_HusbandEmail"];
		$this->HusbandEmail->AdvancedSearch->SearchValue2 = @$filter["y_HusbandEmail"];
		$this->HusbandEmail->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandEmail"];
		$this->HusbandEmail->AdvancedSearch->save();

		// Field ARTCYCLE
		$this->ARTCYCLE->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE"];
		$this->ARTCYCLE->AdvancedSearch->save();

		// Field RESULT
		$this->RESULT->AdvancedSearch->SearchValue = @$filter["x_RESULT"];
		$this->RESULT->AdvancedSearch->SearchOperator = @$filter["z_RESULT"];
		$this->RESULT->AdvancedSearch->SearchCondition = @$filter["v_RESULT"];
		$this->RESULT->AdvancedSearch->SearchValue2 = @$filter["y_RESULT"];
		$this->RESULT->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT"];
		$this->RESULT->AdvancedSearch->save();

		// Field CoupleID
		$this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
		$this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
		$this->CoupleID->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

		// Field PartnerName
		$this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
		$this->PartnerName->AdvancedSearch->save();

		// Field PartnerID
		$this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
		$this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
		$this->PartnerID->AdvancedSearch->save();

		// Field DrID
		$this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
		$this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
		$this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
		$this->DrID->AdvancedSearch->save();

		// Field DrDepartment
		$this->DrDepartment->AdvancedSearch->SearchValue = @$filter["x_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchOperator = @$filter["z_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchCondition = @$filter["v_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchValue2 = @$filter["y_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchOperator2 = @$filter["w_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->save();

		// Field Doctor
		$this->Doctor->AdvancedSearch->SearchValue = @$filter["x_Doctor"];
		$this->Doctor->AdvancedSearch->SearchOperator = @$filter["z_Doctor"];
		$this->Doctor->AdvancedSearch->SearchCondition = @$filter["v_Doctor"];
		$this->Doctor->AdvancedSearch->SearchValue2 = @$filter["y_Doctor"];
		$this->Doctor->AdvancedSearch->SearchOperator2 = @$filter["w_Doctor"];
		$this->Doctor->AdvancedSearch->save();

		// Field hid
		$this->hid->AdvancedSearch->SearchValue = @$filter["x_hid"];
		$this->hid->AdvancedSearch->SearchOperator = @$filter["z_hid"];
		$this->hid->AdvancedSearch->SearchCondition = @$filter["v_hid"];
		$this->hid->AdvancedSearch->SearchValue2 = @$filter["y_hid"];
		$this->hid->AdvancedSearch->SearchOperator2 = @$filter["w_hid"];
		$this->hid->AdvancedSearch->save();

		// Field RIDNO
		$this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
		$this->RIDNO->AdvancedSearch->save();

		// Field Name
		$this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
		$this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
		$this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
		$this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
		$this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
		$this->Name->AdvancedSearch->save();

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

		// Field SEX
		$this->SEX->AdvancedSearch->SearchValue = @$filter["x_SEX"];
		$this->SEX->AdvancedSearch->SearchOperator = @$filter["z_SEX"];
		$this->SEX->AdvancedSearch->SearchCondition = @$filter["v_SEX"];
		$this->SEX->AdvancedSearch->SearchValue2 = @$filter["y_SEX"];
		$this->SEX->AdvancedSearch->SearchOperator2 = @$filter["w_SEX"];
		$this->SEX->AdvancedSearch->save();

		// Field Religion
		$this->Religion->AdvancedSearch->SearchValue = @$filter["x_Religion"];
		$this->Religion->AdvancedSearch->SearchOperator = @$filter["z_Religion"];
		$this->Religion->AdvancedSearch->SearchCondition = @$filter["v_Religion"];
		$this->Religion->AdvancedSearch->SearchValue2 = @$filter["y_Religion"];
		$this->Religion->AdvancedSearch->SearchOperator2 = @$filter["w_Religion"];
		$this->Religion->AdvancedSearch->save();

		// Field Address
		$this->Address->AdvancedSearch->SearchValue = @$filter["x_Address"];
		$this->Address->AdvancedSearch->SearchOperator = @$filter["z_Address"];
		$this->Address->AdvancedSearch->SearchCondition = @$filter["v_Address"];
		$this->Address->AdvancedSearch->SearchValue2 = @$filter["y_Address"];
		$this->Address->AdvancedSearch->SearchOperator2 = @$filter["w_Address"];
		$this->Address->AdvancedSearch->save();

		// Field IdentificationMark
		$this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
		$this->IdentificationMark->AdvancedSearch->save();

		// Field DoublewitnessName1
		$this->DoublewitnessName1->AdvancedSearch->SearchValue = @$filter["x_DoublewitnessName1"];
		$this->DoublewitnessName1->AdvancedSearch->SearchOperator = @$filter["z_DoublewitnessName1"];
		$this->DoublewitnessName1->AdvancedSearch->SearchCondition = @$filter["v_DoublewitnessName1"];
		$this->DoublewitnessName1->AdvancedSearch->SearchValue2 = @$filter["y_DoublewitnessName1"];
		$this->DoublewitnessName1->AdvancedSearch->SearchOperator2 = @$filter["w_DoublewitnessName1"];
		$this->DoublewitnessName1->AdvancedSearch->save();

		// Field DoublewitnessName2
		$this->DoublewitnessName2->AdvancedSearch->SearchValue = @$filter["x_DoublewitnessName2"];
		$this->DoublewitnessName2->AdvancedSearch->SearchOperator = @$filter["z_DoublewitnessName2"];
		$this->DoublewitnessName2->AdvancedSearch->SearchCondition = @$filter["v_DoublewitnessName2"];
		$this->DoublewitnessName2->AdvancedSearch->SearchValue2 = @$filter["y_DoublewitnessName2"];
		$this->DoublewitnessName2->AdvancedSearch->SearchOperator2 = @$filter["w_DoublewitnessName2"];
		$this->DoublewitnessName2->AdvancedSearch->save();

		// Field Chiefcomplaints
		$this->Chiefcomplaints->AdvancedSearch->SearchValue = @$filter["x_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchOperator = @$filter["z_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchCondition = @$filter["v_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchValue2 = @$filter["y_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->SearchOperator2 = @$filter["w_Chiefcomplaints"];
		$this->Chiefcomplaints->AdvancedSearch->save();

		// Field MenstrualHistory
		$this->MenstrualHistory->AdvancedSearch->SearchValue = @$filter["x_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchOperator = @$filter["z_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchCondition = @$filter["v_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchValue2 = @$filter["y_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MenstrualHistory"];
		$this->MenstrualHistory->AdvancedSearch->save();

		// Field ObstetricHistory
		$this->ObstetricHistory->AdvancedSearch->SearchValue = @$filter["x_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchOperator = @$filter["z_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchCondition = @$filter["v_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchValue2 = @$filter["y_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->SearchOperator2 = @$filter["w_ObstetricHistory"];
		$this->ObstetricHistory->AdvancedSearch->save();

		// Field MedicalHistory
		$this->MedicalHistory->AdvancedSearch->SearchValue = @$filter["x_MedicalHistory"];
		$this->MedicalHistory->AdvancedSearch->SearchOperator = @$filter["z_MedicalHistory"];
		$this->MedicalHistory->AdvancedSearch->SearchCondition = @$filter["v_MedicalHistory"];
		$this->MedicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_MedicalHistory"];
		$this->MedicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MedicalHistory"];
		$this->MedicalHistory->AdvancedSearch->save();

		// Field SurgicalHistory
		$this->SurgicalHistory->AdvancedSearch->SearchValue = @$filter["x_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchOperator = @$filter["z_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchCondition = @$filter["v_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_SurgicalHistory"];
		$this->SurgicalHistory->AdvancedSearch->save();

		// Field Generalexaminationpallor
		$this->Generalexaminationpallor->AdvancedSearch->SearchValue = @$filter["x_Generalexaminationpallor"];
		$this->Generalexaminationpallor->AdvancedSearch->SearchOperator = @$filter["z_Generalexaminationpallor"];
		$this->Generalexaminationpallor->AdvancedSearch->SearchCondition = @$filter["v_Generalexaminationpallor"];
		$this->Generalexaminationpallor->AdvancedSearch->SearchValue2 = @$filter["y_Generalexaminationpallor"];
		$this->Generalexaminationpallor->AdvancedSearch->SearchOperator2 = @$filter["w_Generalexaminationpallor"];
		$this->Generalexaminationpallor->AdvancedSearch->save();

		// Field PR
		$this->PR->AdvancedSearch->SearchValue = @$filter["x_PR"];
		$this->PR->AdvancedSearch->SearchOperator = @$filter["z_PR"];
		$this->PR->AdvancedSearch->SearchCondition = @$filter["v_PR"];
		$this->PR->AdvancedSearch->SearchValue2 = @$filter["y_PR"];
		$this->PR->AdvancedSearch->SearchOperator2 = @$filter["w_PR"];
		$this->PR->AdvancedSearch->save();

		// Field CVS
		$this->CVS->AdvancedSearch->SearchValue = @$filter["x_CVS"];
		$this->CVS->AdvancedSearch->SearchOperator = @$filter["z_CVS"];
		$this->CVS->AdvancedSearch->SearchCondition = @$filter["v_CVS"];
		$this->CVS->AdvancedSearch->SearchValue2 = @$filter["y_CVS"];
		$this->CVS->AdvancedSearch->SearchOperator2 = @$filter["w_CVS"];
		$this->CVS->AdvancedSearch->save();

		// Field PA
		$this->PA->AdvancedSearch->SearchValue = @$filter["x_PA"];
		$this->PA->AdvancedSearch->SearchOperator = @$filter["z_PA"];
		$this->PA->AdvancedSearch->SearchCondition = @$filter["v_PA"];
		$this->PA->AdvancedSearch->SearchValue2 = @$filter["y_PA"];
		$this->PA->AdvancedSearch->SearchOperator2 = @$filter["w_PA"];
		$this->PA->AdvancedSearch->save();

		// Field PROVISIONALDIAGNOSIS
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue = @$filter["x_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator = @$filter["z_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchCondition = @$filter["v_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue2 = @$filter["y_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator2 = @$filter["w_PROVISIONALDIAGNOSIS"];
		$this->PROVISIONALDIAGNOSIS->AdvancedSearch->save();

		// Field Investigations
		$this->Investigations->AdvancedSearch->SearchValue = @$filter["x_Investigations"];
		$this->Investigations->AdvancedSearch->SearchOperator = @$filter["z_Investigations"];
		$this->Investigations->AdvancedSearch->SearchCondition = @$filter["v_Investigations"];
		$this->Investigations->AdvancedSearch->SearchValue2 = @$filter["y_Investigations"];
		$this->Investigations->AdvancedSearch->SearchOperator2 = @$filter["w_Investigations"];
		$this->Investigations->AdvancedSearch->save();

		// Field Fheight
		$this->Fheight->AdvancedSearch->SearchValue = @$filter["x_Fheight"];
		$this->Fheight->AdvancedSearch->SearchOperator = @$filter["z_Fheight"];
		$this->Fheight->AdvancedSearch->SearchCondition = @$filter["v_Fheight"];
		$this->Fheight->AdvancedSearch->SearchValue2 = @$filter["y_Fheight"];
		$this->Fheight->AdvancedSearch->SearchOperator2 = @$filter["w_Fheight"];
		$this->Fheight->AdvancedSearch->save();

		// Field Fweight
		$this->Fweight->AdvancedSearch->SearchValue = @$filter["x_Fweight"];
		$this->Fweight->AdvancedSearch->SearchOperator = @$filter["z_Fweight"];
		$this->Fweight->AdvancedSearch->SearchCondition = @$filter["v_Fweight"];
		$this->Fweight->AdvancedSearch->SearchValue2 = @$filter["y_Fweight"];
		$this->Fweight->AdvancedSearch->SearchOperator2 = @$filter["w_Fweight"];
		$this->Fweight->AdvancedSearch->save();

		// Field FBMI
		$this->FBMI->AdvancedSearch->SearchValue = @$filter["x_FBMI"];
		$this->FBMI->AdvancedSearch->SearchOperator = @$filter["z_FBMI"];
		$this->FBMI->AdvancedSearch->SearchCondition = @$filter["v_FBMI"];
		$this->FBMI->AdvancedSearch->SearchValue2 = @$filter["y_FBMI"];
		$this->FBMI->AdvancedSearch->SearchOperator2 = @$filter["w_FBMI"];
		$this->FBMI->AdvancedSearch->save();

		// Field FBloodgroup
		$this->FBloodgroup->AdvancedSearch->SearchValue = @$filter["x_FBloodgroup"];
		$this->FBloodgroup->AdvancedSearch->SearchOperator = @$filter["z_FBloodgroup"];
		$this->FBloodgroup->AdvancedSearch->SearchCondition = @$filter["v_FBloodgroup"];
		$this->FBloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_FBloodgroup"];
		$this->FBloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_FBloodgroup"];
		$this->FBloodgroup->AdvancedSearch->save();

		// Field Mheight
		$this->Mheight->AdvancedSearch->SearchValue = @$filter["x_Mheight"];
		$this->Mheight->AdvancedSearch->SearchOperator = @$filter["z_Mheight"];
		$this->Mheight->AdvancedSearch->SearchCondition = @$filter["v_Mheight"];
		$this->Mheight->AdvancedSearch->SearchValue2 = @$filter["y_Mheight"];
		$this->Mheight->AdvancedSearch->SearchOperator2 = @$filter["w_Mheight"];
		$this->Mheight->AdvancedSearch->save();

		// Field Mweight
		$this->Mweight->AdvancedSearch->SearchValue = @$filter["x_Mweight"];
		$this->Mweight->AdvancedSearch->SearchOperator = @$filter["z_Mweight"];
		$this->Mweight->AdvancedSearch->SearchCondition = @$filter["v_Mweight"];
		$this->Mweight->AdvancedSearch->SearchValue2 = @$filter["y_Mweight"];
		$this->Mweight->AdvancedSearch->SearchOperator2 = @$filter["w_Mweight"];
		$this->Mweight->AdvancedSearch->save();

		// Field MBMI
		$this->MBMI->AdvancedSearch->SearchValue = @$filter["x_MBMI"];
		$this->MBMI->AdvancedSearch->SearchOperator = @$filter["z_MBMI"];
		$this->MBMI->AdvancedSearch->SearchCondition = @$filter["v_MBMI"];
		$this->MBMI->AdvancedSearch->SearchValue2 = @$filter["y_MBMI"];
		$this->MBMI->AdvancedSearch->SearchOperator2 = @$filter["w_MBMI"];
		$this->MBMI->AdvancedSearch->save();

		// Field MBloodgroup
		$this->MBloodgroup->AdvancedSearch->SearchValue = @$filter["x_MBloodgroup"];
		$this->MBloodgroup->AdvancedSearch->SearchOperator = @$filter["z_MBloodgroup"];
		$this->MBloodgroup->AdvancedSearch->SearchCondition = @$filter["v_MBloodgroup"];
		$this->MBloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_MBloodgroup"];
		$this->MBloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_MBloodgroup"];
		$this->MBloodgroup->AdvancedSearch->save();

		// Field FBuild
		$this->FBuild->AdvancedSearch->SearchValue = @$filter["x_FBuild"];
		$this->FBuild->AdvancedSearch->SearchOperator = @$filter["z_FBuild"];
		$this->FBuild->AdvancedSearch->SearchCondition = @$filter["v_FBuild"];
		$this->FBuild->AdvancedSearch->SearchValue2 = @$filter["y_FBuild"];
		$this->FBuild->AdvancedSearch->SearchOperator2 = @$filter["w_FBuild"];
		$this->FBuild->AdvancedSearch->save();

		// Field MBuild
		$this->MBuild->AdvancedSearch->SearchValue = @$filter["x_MBuild"];
		$this->MBuild->AdvancedSearch->SearchOperator = @$filter["z_MBuild"];
		$this->MBuild->AdvancedSearch->SearchCondition = @$filter["v_MBuild"];
		$this->MBuild->AdvancedSearch->SearchValue2 = @$filter["y_MBuild"];
		$this->MBuild->AdvancedSearch->SearchOperator2 = @$filter["w_MBuild"];
		$this->MBuild->AdvancedSearch->save();

		// Field FSkinColor
		$this->FSkinColor->AdvancedSearch->SearchValue = @$filter["x_FSkinColor"];
		$this->FSkinColor->AdvancedSearch->SearchOperator = @$filter["z_FSkinColor"];
		$this->FSkinColor->AdvancedSearch->SearchCondition = @$filter["v_FSkinColor"];
		$this->FSkinColor->AdvancedSearch->SearchValue2 = @$filter["y_FSkinColor"];
		$this->FSkinColor->AdvancedSearch->SearchOperator2 = @$filter["w_FSkinColor"];
		$this->FSkinColor->AdvancedSearch->save();

		// Field MSkinColor
		$this->MSkinColor->AdvancedSearch->SearchValue = @$filter["x_MSkinColor"];
		$this->MSkinColor->AdvancedSearch->SearchOperator = @$filter["z_MSkinColor"];
		$this->MSkinColor->AdvancedSearch->SearchCondition = @$filter["v_MSkinColor"];
		$this->MSkinColor->AdvancedSearch->SearchValue2 = @$filter["y_MSkinColor"];
		$this->MSkinColor->AdvancedSearch->SearchOperator2 = @$filter["w_MSkinColor"];
		$this->MSkinColor->AdvancedSearch->save();

		// Field FEyesColor
		$this->FEyesColor->AdvancedSearch->SearchValue = @$filter["x_FEyesColor"];
		$this->FEyesColor->AdvancedSearch->SearchOperator = @$filter["z_FEyesColor"];
		$this->FEyesColor->AdvancedSearch->SearchCondition = @$filter["v_FEyesColor"];
		$this->FEyesColor->AdvancedSearch->SearchValue2 = @$filter["y_FEyesColor"];
		$this->FEyesColor->AdvancedSearch->SearchOperator2 = @$filter["w_FEyesColor"];
		$this->FEyesColor->AdvancedSearch->save();

		// Field MEyesColor
		$this->MEyesColor->AdvancedSearch->SearchValue = @$filter["x_MEyesColor"];
		$this->MEyesColor->AdvancedSearch->SearchOperator = @$filter["z_MEyesColor"];
		$this->MEyesColor->AdvancedSearch->SearchCondition = @$filter["v_MEyesColor"];
		$this->MEyesColor->AdvancedSearch->SearchValue2 = @$filter["y_MEyesColor"];
		$this->MEyesColor->AdvancedSearch->SearchOperator2 = @$filter["w_MEyesColor"];
		$this->MEyesColor->AdvancedSearch->save();

		// Field FHairColor
		$this->FHairColor->AdvancedSearch->SearchValue = @$filter["x_FHairColor"];
		$this->FHairColor->AdvancedSearch->SearchOperator = @$filter["z_FHairColor"];
		$this->FHairColor->AdvancedSearch->SearchCondition = @$filter["v_FHairColor"];
		$this->FHairColor->AdvancedSearch->SearchValue2 = @$filter["y_FHairColor"];
		$this->FHairColor->AdvancedSearch->SearchOperator2 = @$filter["w_FHairColor"];
		$this->FHairColor->AdvancedSearch->save();

		// Field MhairColor
		$this->MhairColor->AdvancedSearch->SearchValue = @$filter["x_MhairColor"];
		$this->MhairColor->AdvancedSearch->SearchOperator = @$filter["z_MhairColor"];
		$this->MhairColor->AdvancedSearch->SearchCondition = @$filter["v_MhairColor"];
		$this->MhairColor->AdvancedSearch->SearchValue2 = @$filter["y_MhairColor"];
		$this->MhairColor->AdvancedSearch->SearchOperator2 = @$filter["w_MhairColor"];
		$this->MhairColor->AdvancedSearch->save();

		// Field FhairTexture
		$this->FhairTexture->AdvancedSearch->SearchValue = @$filter["x_FhairTexture"];
		$this->FhairTexture->AdvancedSearch->SearchOperator = @$filter["z_FhairTexture"];
		$this->FhairTexture->AdvancedSearch->SearchCondition = @$filter["v_FhairTexture"];
		$this->FhairTexture->AdvancedSearch->SearchValue2 = @$filter["y_FhairTexture"];
		$this->FhairTexture->AdvancedSearch->SearchOperator2 = @$filter["w_FhairTexture"];
		$this->FhairTexture->AdvancedSearch->save();

		// Field MHairTexture
		$this->MHairTexture->AdvancedSearch->SearchValue = @$filter["x_MHairTexture"];
		$this->MHairTexture->AdvancedSearch->SearchOperator = @$filter["z_MHairTexture"];
		$this->MHairTexture->AdvancedSearch->SearchCondition = @$filter["v_MHairTexture"];
		$this->MHairTexture->AdvancedSearch->SearchValue2 = @$filter["y_MHairTexture"];
		$this->MHairTexture->AdvancedSearch->SearchOperator2 = @$filter["w_MHairTexture"];
		$this->MHairTexture->AdvancedSearch->save();

		// Field Fothers
		$this->Fothers->AdvancedSearch->SearchValue = @$filter["x_Fothers"];
		$this->Fothers->AdvancedSearch->SearchOperator = @$filter["z_Fothers"];
		$this->Fothers->AdvancedSearch->SearchCondition = @$filter["v_Fothers"];
		$this->Fothers->AdvancedSearch->SearchValue2 = @$filter["y_Fothers"];
		$this->Fothers->AdvancedSearch->SearchOperator2 = @$filter["w_Fothers"];
		$this->Fothers->AdvancedSearch->save();

		// Field Mothers
		$this->Mothers->AdvancedSearch->SearchValue = @$filter["x_Mothers"];
		$this->Mothers->AdvancedSearch->SearchOperator = @$filter["z_Mothers"];
		$this->Mothers->AdvancedSearch->SearchCondition = @$filter["v_Mothers"];
		$this->Mothers->AdvancedSearch->SearchValue2 = @$filter["y_Mothers"];
		$this->Mothers->AdvancedSearch->SearchOperator2 = @$filter["w_Mothers"];
		$this->Mothers->AdvancedSearch->save();

		// Field PGE
		$this->PGE->AdvancedSearch->SearchValue = @$filter["x_PGE"];
		$this->PGE->AdvancedSearch->SearchOperator = @$filter["z_PGE"];
		$this->PGE->AdvancedSearch->SearchCondition = @$filter["v_PGE"];
		$this->PGE->AdvancedSearch->SearchValue2 = @$filter["y_PGE"];
		$this->PGE->AdvancedSearch->SearchOperator2 = @$filter["w_PGE"];
		$this->PGE->AdvancedSearch->save();

		// Field PPR
		$this->PPR->AdvancedSearch->SearchValue = @$filter["x_PPR"];
		$this->PPR->AdvancedSearch->SearchOperator = @$filter["z_PPR"];
		$this->PPR->AdvancedSearch->SearchCondition = @$filter["v_PPR"];
		$this->PPR->AdvancedSearch->SearchValue2 = @$filter["y_PPR"];
		$this->PPR->AdvancedSearch->SearchOperator2 = @$filter["w_PPR"];
		$this->PPR->AdvancedSearch->save();

		// Field PBP
		$this->PBP->AdvancedSearch->SearchValue = @$filter["x_PBP"];
		$this->PBP->AdvancedSearch->SearchOperator = @$filter["z_PBP"];
		$this->PBP->AdvancedSearch->SearchCondition = @$filter["v_PBP"];
		$this->PBP->AdvancedSearch->SearchValue2 = @$filter["y_PBP"];
		$this->PBP->AdvancedSearch->SearchOperator2 = @$filter["w_PBP"];
		$this->PBP->AdvancedSearch->save();

		// Field Breast
		$this->Breast->AdvancedSearch->SearchValue = @$filter["x_Breast"];
		$this->Breast->AdvancedSearch->SearchOperator = @$filter["z_Breast"];
		$this->Breast->AdvancedSearch->SearchCondition = @$filter["v_Breast"];
		$this->Breast->AdvancedSearch->SearchValue2 = @$filter["y_Breast"];
		$this->Breast->AdvancedSearch->SearchOperator2 = @$filter["w_Breast"];
		$this->Breast->AdvancedSearch->save();

		// Field PPA
		$this->PPA->AdvancedSearch->SearchValue = @$filter["x_PPA"];
		$this->PPA->AdvancedSearch->SearchOperator = @$filter["z_PPA"];
		$this->PPA->AdvancedSearch->SearchCondition = @$filter["v_PPA"];
		$this->PPA->AdvancedSearch->SearchValue2 = @$filter["y_PPA"];
		$this->PPA->AdvancedSearch->SearchOperator2 = @$filter["w_PPA"];
		$this->PPA->AdvancedSearch->save();

		// Field PPSV
		$this->PPSV->AdvancedSearch->SearchValue = @$filter["x_PPSV"];
		$this->PPSV->AdvancedSearch->SearchOperator = @$filter["z_PPSV"];
		$this->PPSV->AdvancedSearch->SearchCondition = @$filter["v_PPSV"];
		$this->PPSV->AdvancedSearch->SearchValue2 = @$filter["y_PPSV"];
		$this->PPSV->AdvancedSearch->SearchOperator2 = @$filter["w_PPSV"];
		$this->PPSV->AdvancedSearch->save();

		// Field PPAPSMEAR
		$this->PPAPSMEAR->AdvancedSearch->SearchValue = @$filter["x_PPAPSMEAR"];
		$this->PPAPSMEAR->AdvancedSearch->SearchOperator = @$filter["z_PPAPSMEAR"];
		$this->PPAPSMEAR->AdvancedSearch->SearchCondition = @$filter["v_PPAPSMEAR"];
		$this->PPAPSMEAR->AdvancedSearch->SearchValue2 = @$filter["y_PPAPSMEAR"];
		$this->PPAPSMEAR->AdvancedSearch->SearchOperator2 = @$filter["w_PPAPSMEAR"];
		$this->PPAPSMEAR->AdvancedSearch->save();

		// Field PTHYROID
		$this->PTHYROID->AdvancedSearch->SearchValue = @$filter["x_PTHYROID"];
		$this->PTHYROID->AdvancedSearch->SearchOperator = @$filter["z_PTHYROID"];
		$this->PTHYROID->AdvancedSearch->SearchCondition = @$filter["v_PTHYROID"];
		$this->PTHYROID->AdvancedSearch->SearchValue2 = @$filter["y_PTHYROID"];
		$this->PTHYROID->AdvancedSearch->SearchOperator2 = @$filter["w_PTHYROID"];
		$this->PTHYROID->AdvancedSearch->save();

		// Field MTHYROID
		$this->MTHYROID->AdvancedSearch->SearchValue = @$filter["x_MTHYROID"];
		$this->MTHYROID->AdvancedSearch->SearchOperator = @$filter["z_MTHYROID"];
		$this->MTHYROID->AdvancedSearch->SearchCondition = @$filter["v_MTHYROID"];
		$this->MTHYROID->AdvancedSearch->SearchValue2 = @$filter["y_MTHYROID"];
		$this->MTHYROID->AdvancedSearch->SearchOperator2 = @$filter["w_MTHYROID"];
		$this->MTHYROID->AdvancedSearch->save();

		// Field SecSexCharacters
		$this->SecSexCharacters->AdvancedSearch->SearchValue = @$filter["x_SecSexCharacters"];
		$this->SecSexCharacters->AdvancedSearch->SearchOperator = @$filter["z_SecSexCharacters"];
		$this->SecSexCharacters->AdvancedSearch->SearchCondition = @$filter["v_SecSexCharacters"];
		$this->SecSexCharacters->AdvancedSearch->SearchValue2 = @$filter["y_SecSexCharacters"];
		$this->SecSexCharacters->AdvancedSearch->SearchOperator2 = @$filter["w_SecSexCharacters"];
		$this->SecSexCharacters->AdvancedSearch->save();

		// Field PenisUM
		$this->PenisUM->AdvancedSearch->SearchValue = @$filter["x_PenisUM"];
		$this->PenisUM->AdvancedSearch->SearchOperator = @$filter["z_PenisUM"];
		$this->PenisUM->AdvancedSearch->SearchCondition = @$filter["v_PenisUM"];
		$this->PenisUM->AdvancedSearch->SearchValue2 = @$filter["y_PenisUM"];
		$this->PenisUM->AdvancedSearch->SearchOperator2 = @$filter["w_PenisUM"];
		$this->PenisUM->AdvancedSearch->save();

		// Field VAS
		$this->VAS->AdvancedSearch->SearchValue = @$filter["x_VAS"];
		$this->VAS->AdvancedSearch->SearchOperator = @$filter["z_VAS"];
		$this->VAS->AdvancedSearch->SearchCondition = @$filter["v_VAS"];
		$this->VAS->AdvancedSearch->SearchValue2 = @$filter["y_VAS"];
		$this->VAS->AdvancedSearch->SearchOperator2 = @$filter["w_VAS"];
		$this->VAS->AdvancedSearch->save();

		// Field EPIDIDYMIS
		$this->EPIDIDYMIS->AdvancedSearch->SearchValue = @$filter["x_EPIDIDYMIS"];
		$this->EPIDIDYMIS->AdvancedSearch->SearchOperator = @$filter["z_EPIDIDYMIS"];
		$this->EPIDIDYMIS->AdvancedSearch->SearchCondition = @$filter["v_EPIDIDYMIS"];
		$this->EPIDIDYMIS->AdvancedSearch->SearchValue2 = @$filter["y_EPIDIDYMIS"];
		$this->EPIDIDYMIS->AdvancedSearch->SearchOperator2 = @$filter["w_EPIDIDYMIS"];
		$this->EPIDIDYMIS->AdvancedSearch->save();

		// Field Varicocele
		$this->Varicocele->AdvancedSearch->SearchValue = @$filter["x_Varicocele"];
		$this->Varicocele->AdvancedSearch->SearchOperator = @$filter["z_Varicocele"];
		$this->Varicocele->AdvancedSearch->SearchCondition = @$filter["v_Varicocele"];
		$this->Varicocele->AdvancedSearch->SearchValue2 = @$filter["y_Varicocele"];
		$this->Varicocele->AdvancedSearch->SearchOperator2 = @$filter["w_Varicocele"];
		$this->Varicocele->AdvancedSearch->save();

		// Field FertilityTreatmentHistory
		$this->FertilityTreatmentHistory->AdvancedSearch->SearchValue = @$filter["x_FertilityTreatmentHistory"];
		$this->FertilityTreatmentHistory->AdvancedSearch->SearchOperator = @$filter["z_FertilityTreatmentHistory"];
		$this->FertilityTreatmentHistory->AdvancedSearch->SearchCondition = @$filter["v_FertilityTreatmentHistory"];
		$this->FertilityTreatmentHistory->AdvancedSearch->SearchValue2 = @$filter["y_FertilityTreatmentHistory"];
		$this->FertilityTreatmentHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FertilityTreatmentHistory"];
		$this->FertilityTreatmentHistory->AdvancedSearch->save();

		// Field SurgeryHistory
		$this->SurgeryHistory->AdvancedSearch->SearchValue = @$filter["x_SurgeryHistory"];
		$this->SurgeryHistory->AdvancedSearch->SearchOperator = @$filter["z_SurgeryHistory"];
		$this->SurgeryHistory->AdvancedSearch->SearchCondition = @$filter["v_SurgeryHistory"];
		$this->SurgeryHistory->AdvancedSearch->SearchValue2 = @$filter["y_SurgeryHistory"];
		$this->SurgeryHistory->AdvancedSearch->SearchOperator2 = @$filter["w_SurgeryHistory"];
		$this->SurgeryHistory->AdvancedSearch->save();

		// Field FamilyHistory
		$this->FamilyHistory->AdvancedSearch->SearchValue = @$filter["x_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FamilyHistory"];
		$this->FamilyHistory->AdvancedSearch->save();

		// Field PInvestigations
		$this->PInvestigations->AdvancedSearch->SearchValue = @$filter["x_PInvestigations"];
		$this->PInvestigations->AdvancedSearch->SearchOperator = @$filter["z_PInvestigations"];
		$this->PInvestigations->AdvancedSearch->SearchCondition = @$filter["v_PInvestigations"];
		$this->PInvestigations->AdvancedSearch->SearchValue2 = @$filter["y_PInvestigations"];
		$this->PInvestigations->AdvancedSearch->SearchOperator2 = @$filter["w_PInvestigations"];
		$this->PInvestigations->AdvancedSearch->save();

		// Field Addictions
		$this->Addictions->AdvancedSearch->SearchValue = @$filter["x_Addictions"];
		$this->Addictions->AdvancedSearch->SearchOperator = @$filter["z_Addictions"];
		$this->Addictions->AdvancedSearch->SearchCondition = @$filter["v_Addictions"];
		$this->Addictions->AdvancedSearch->SearchValue2 = @$filter["y_Addictions"];
		$this->Addictions->AdvancedSearch->SearchOperator2 = @$filter["w_Addictions"];
		$this->Addictions->AdvancedSearch->save();

		// Field Medications
		$this->Medications->AdvancedSearch->SearchValue = @$filter["x_Medications"];
		$this->Medications->AdvancedSearch->SearchOperator = @$filter["z_Medications"];
		$this->Medications->AdvancedSearch->SearchCondition = @$filter["v_Medications"];
		$this->Medications->AdvancedSearch->SearchValue2 = @$filter["y_Medications"];
		$this->Medications->AdvancedSearch->SearchOperator2 = @$filter["w_Medications"];
		$this->Medications->AdvancedSearch->save();

		// Field Medical
		$this->Medical->AdvancedSearch->SearchValue = @$filter["x_Medical"];
		$this->Medical->AdvancedSearch->SearchOperator = @$filter["z_Medical"];
		$this->Medical->AdvancedSearch->SearchCondition = @$filter["v_Medical"];
		$this->Medical->AdvancedSearch->SearchValue2 = @$filter["y_Medical"];
		$this->Medical->AdvancedSearch->SearchOperator2 = @$filter["w_Medical"];
		$this->Medical->AdvancedSearch->save();

		// Field Surgical
		$this->Surgical->AdvancedSearch->SearchValue = @$filter["x_Surgical"];
		$this->Surgical->AdvancedSearch->SearchOperator = @$filter["z_Surgical"];
		$this->Surgical->AdvancedSearch->SearchCondition = @$filter["v_Surgical"];
		$this->Surgical->AdvancedSearch->SearchValue2 = @$filter["y_Surgical"];
		$this->Surgical->AdvancedSearch->SearchOperator2 = @$filter["w_Surgical"];
		$this->Surgical->AdvancedSearch->save();

		// Field CoitalHistory
		$this->CoitalHistory->AdvancedSearch->SearchValue = @$filter["x_CoitalHistory"];
		$this->CoitalHistory->AdvancedSearch->SearchOperator = @$filter["z_CoitalHistory"];
		$this->CoitalHistory->AdvancedSearch->SearchCondition = @$filter["v_CoitalHistory"];
		$this->CoitalHistory->AdvancedSearch->SearchValue2 = @$filter["y_CoitalHistory"];
		$this->CoitalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_CoitalHistory"];
		$this->CoitalHistory->AdvancedSearch->save();

		// Field SemenAnalysis
		$this->SemenAnalysis->AdvancedSearch->SearchValue = @$filter["x_SemenAnalysis"];
		$this->SemenAnalysis->AdvancedSearch->SearchOperator = @$filter["z_SemenAnalysis"];
		$this->SemenAnalysis->AdvancedSearch->SearchCondition = @$filter["v_SemenAnalysis"];
		$this->SemenAnalysis->AdvancedSearch->SearchValue2 = @$filter["y_SemenAnalysis"];
		$this->SemenAnalysis->AdvancedSearch->SearchOperator2 = @$filter["w_SemenAnalysis"];
		$this->SemenAnalysis->AdvancedSearch->save();

		// Field MInsvestications
		$this->MInsvestications->AdvancedSearch->SearchValue = @$filter["x_MInsvestications"];
		$this->MInsvestications->AdvancedSearch->SearchOperator = @$filter["z_MInsvestications"];
		$this->MInsvestications->AdvancedSearch->SearchCondition = @$filter["v_MInsvestications"];
		$this->MInsvestications->AdvancedSearch->SearchValue2 = @$filter["y_MInsvestications"];
		$this->MInsvestications->AdvancedSearch->SearchOperator2 = @$filter["w_MInsvestications"];
		$this->MInsvestications->AdvancedSearch->save();

		// Field PImpression
		$this->PImpression->AdvancedSearch->SearchValue = @$filter["x_PImpression"];
		$this->PImpression->AdvancedSearch->SearchOperator = @$filter["z_PImpression"];
		$this->PImpression->AdvancedSearch->SearchCondition = @$filter["v_PImpression"];
		$this->PImpression->AdvancedSearch->SearchValue2 = @$filter["y_PImpression"];
		$this->PImpression->AdvancedSearch->SearchOperator2 = @$filter["w_PImpression"];
		$this->PImpression->AdvancedSearch->save();

		// Field MIMpression
		$this->MIMpression->AdvancedSearch->SearchValue = @$filter["x_MIMpression"];
		$this->MIMpression->AdvancedSearch->SearchOperator = @$filter["z_MIMpression"];
		$this->MIMpression->AdvancedSearch->SearchCondition = @$filter["v_MIMpression"];
		$this->MIMpression->AdvancedSearch->SearchValue2 = @$filter["y_MIMpression"];
		$this->MIMpression->AdvancedSearch->SearchOperator2 = @$filter["w_MIMpression"];
		$this->MIMpression->AdvancedSearch->save();

		// Field PPlanOfManagement
		$this->PPlanOfManagement->AdvancedSearch->SearchValue = @$filter["x_PPlanOfManagement"];
		$this->PPlanOfManagement->AdvancedSearch->SearchOperator = @$filter["z_PPlanOfManagement"];
		$this->PPlanOfManagement->AdvancedSearch->SearchCondition = @$filter["v_PPlanOfManagement"];
		$this->PPlanOfManagement->AdvancedSearch->SearchValue2 = @$filter["y_PPlanOfManagement"];
		$this->PPlanOfManagement->AdvancedSearch->SearchOperator2 = @$filter["w_PPlanOfManagement"];
		$this->PPlanOfManagement->AdvancedSearch->save();

		// Field MPlanOfManagement
		$this->MPlanOfManagement->AdvancedSearch->SearchValue = @$filter["x_MPlanOfManagement"];
		$this->MPlanOfManagement->AdvancedSearch->SearchOperator = @$filter["z_MPlanOfManagement"];
		$this->MPlanOfManagement->AdvancedSearch->SearchCondition = @$filter["v_MPlanOfManagement"];
		$this->MPlanOfManagement->AdvancedSearch->SearchValue2 = @$filter["y_MPlanOfManagement"];
		$this->MPlanOfManagement->AdvancedSearch->SearchOperator2 = @$filter["w_MPlanOfManagement"];
		$this->MPlanOfManagement->AdvancedSearch->save();

		// Field PReadMore
		$this->PReadMore->AdvancedSearch->SearchValue = @$filter["x_PReadMore"];
		$this->PReadMore->AdvancedSearch->SearchOperator = @$filter["z_PReadMore"];
		$this->PReadMore->AdvancedSearch->SearchCondition = @$filter["v_PReadMore"];
		$this->PReadMore->AdvancedSearch->SearchValue2 = @$filter["y_PReadMore"];
		$this->PReadMore->AdvancedSearch->SearchOperator2 = @$filter["w_PReadMore"];
		$this->PReadMore->AdvancedSearch->save();

		// Field MReadMore
		$this->MReadMore->AdvancedSearch->SearchValue = @$filter["x_MReadMore"];
		$this->MReadMore->AdvancedSearch->SearchOperator = @$filter["z_MReadMore"];
		$this->MReadMore->AdvancedSearch->SearchCondition = @$filter["v_MReadMore"];
		$this->MReadMore->AdvancedSearch->SearchValue2 = @$filter["y_MReadMore"];
		$this->MReadMore->AdvancedSearch->SearchOperator2 = @$filter["w_MReadMore"];
		$this->MReadMore->AdvancedSearch->save();

		// Field MariedFor
		$this->MariedFor->AdvancedSearch->SearchValue = @$filter["x_MariedFor"];
		$this->MariedFor->AdvancedSearch->SearchOperator = @$filter["z_MariedFor"];
		$this->MariedFor->AdvancedSearch->SearchCondition = @$filter["v_MariedFor"];
		$this->MariedFor->AdvancedSearch->SearchValue2 = @$filter["y_MariedFor"];
		$this->MariedFor->AdvancedSearch->SearchOperator2 = @$filter["w_MariedFor"];
		$this->MariedFor->AdvancedSearch->save();

		// Field CMNCM
		$this->CMNCM->AdvancedSearch->SearchValue = @$filter["x_CMNCM"];
		$this->CMNCM->AdvancedSearch->SearchOperator = @$filter["z_CMNCM"];
		$this->CMNCM->AdvancedSearch->SearchCondition = @$filter["v_CMNCM"];
		$this->CMNCM->AdvancedSearch->SearchValue2 = @$filter["y_CMNCM"];
		$this->CMNCM->AdvancedSearch->SearchOperator2 = @$filter["w_CMNCM"];
		$this->CMNCM->AdvancedSearch->save();

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();

		// Field pFamilyHistory
		$this->pFamilyHistory->AdvancedSearch->SearchValue = @$filter["x_pFamilyHistory"];
		$this->pFamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_pFamilyHistory"];
		$this->pFamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_pFamilyHistory"];
		$this->pFamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_pFamilyHistory"];
		$this->pFamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_pFamilyHistory"];
		$this->pFamilyHistory->AdvancedSearch->save();

		// Field pTemplateMedications
		$this->pTemplateMedications->AdvancedSearch->SearchValue = @$filter["x_pTemplateMedications"];
		$this->pTemplateMedications->AdvancedSearch->SearchOperator = @$filter["z_pTemplateMedications"];
		$this->pTemplateMedications->AdvancedSearch->SearchCondition = @$filter["v_pTemplateMedications"];
		$this->pTemplateMedications->AdvancedSearch->SearchValue2 = @$filter["y_pTemplateMedications"];
		$this->pTemplateMedications->AdvancedSearch->SearchOperator2 = @$filter["w_pTemplateMedications"];
		$this->pTemplateMedications->AdvancedSearch->save();

		// Field AntiTPO
		$this->AntiTPO->AdvancedSearch->SearchValue = @$filter["x_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchOperator = @$filter["z_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchCondition = @$filter["v_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchValue2 = @$filter["y_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->SearchOperator2 = @$filter["w_AntiTPO"];
		$this->AntiTPO->AdvancedSearch->save();

		// Field AntiTG
		$this->AntiTG->AdvancedSearch->SearchValue = @$filter["x_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchOperator = @$filter["z_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchCondition = @$filter["v_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchValue2 = @$filter["y_AntiTG"];
		$this->AntiTG->AdvancedSearch->SearchOperator2 = @$filter["w_AntiTG"];
		$this->AntiTG->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->malepropic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->femalepropic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandEducation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeEducation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandWorkHours, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeWorkHours, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientLanguage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReferPhNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeCell, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandCell, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->WifeEmail, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HusbandEmail, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ARTCYCLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RESULT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DrDepartment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Doctor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SEX, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Religion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Address, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DoublewitnessName1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DoublewitnessName2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Chiefcomplaints, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MenstrualHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ObstetricHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MedicalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SurgicalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Generalexaminationpallor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CVS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PROVISIONALDIAGNOSIS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Investigations, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Fheight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Fweight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FBMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FBloodgroup, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mheight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mweight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MBMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MBloodgroup, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FBuild, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MBuild, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FSkinColor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MSkinColor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FEyesColor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MEyesColor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FHairColor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MhairColor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FhairTexture, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MHairTexture, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Fothers, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mothers, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PGE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PPR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PBP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Breast, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PPA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PPSV, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PPAPSMEAR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PTHYROID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MTHYROID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SecSexCharacters, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PenisUM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VAS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EPIDIDYMIS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Varicocele, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FertilityTreatmentHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SurgeryHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FamilyHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PInvestigations, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Addictions, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Medications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Medical, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Surgical, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CoitalHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SemenAnalysis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MInsvestications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PImpression, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MIMpression, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PPlanOfManagement, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MPlanOfManagement, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PReadMore, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MReadMore, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MariedFor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CMNCM, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->pFamilyHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->pTemplateMedications, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AntiTPO, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AntiTG, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		global $BASIC_SEARCH_IGNORE_PATTERN;
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = array(); // Array for SQL parts
		$arCond = array(); // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if ($BASIC_SEARCH_IGNORE_PATTERN <> "") {
				$keyword = preg_replace($BASIC_SEARCH_IGNORE_PATTERN, "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = array($keyword);
			}
			foreach ($ar as $keyword) {
				if ($keyword <> "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == NULL_VALUE) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == NOT_NULL_VALUE) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk <> "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] <> "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql <> "") {
			if ($where <> "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword <> "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword <> "") {
						if ($searchStr <> "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql(array($keyword), $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, array("", "reset", "resetall")))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->Male); // Male
			$this->updateSort($this->Female); // Female
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->HusbandEducation); // HusbandEducation
			$this->updateSort($this->WifeEducation); // WifeEducation
			$this->updateSort($this->HusbandWorkHours); // HusbandWorkHours
			$this->updateSort($this->WifeWorkHours); // WifeWorkHours
			$this->updateSort($this->PatientLanguage); // PatientLanguage
			$this->updateSort($this->ReferedBy); // ReferedBy
			$this->updateSort($this->ReferPhNo); // ReferPhNo
			$this->updateSort($this->WifeCell); // WifeCell
			$this->updateSort($this->HusbandCell); // HusbandCell
			$this->updateSort($this->WifeEmail); // WifeEmail
			$this->updateSort($this->HusbandEmail); // HusbandEmail
			$this->updateSort($this->ARTCYCLE); // ARTCYCLE
			$this->updateSort($this->RESULT); // RESULT
			$this->updateSort($this->CoupleID); // CoupleID
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->PartnerName); // PartnerName
			$this->updateSort($this->PartnerID); // PartnerID
			$this->updateSort($this->DrID); // DrID
			$this->updateSort($this->DrDepartment); // DrDepartment
			$this->updateSort($this->Doctor); // Doctor
			$this->updateSort($this->hid); // hid
			$this->updateSort($this->RIDNO); // RIDNO
			$this->updateSort($this->Name); // Name
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->SEX); // SEX
			$this->updateSort($this->Religion); // Religion
			$this->updateSort($this->Address); // Address
			$this->updateSort($this->IdentificationMark); // IdentificationMark
			$this->updateSort($this->MedicalHistory); // MedicalHistory
			$this->updateSort($this->SurgicalHistory); // SurgicalHistory
			$this->updateSort($this->Generalexaminationpallor); // Generalexaminationpallor
			$this->updateSort($this->PR); // PR
			$this->updateSort($this->CVS); // CVS
			$this->updateSort($this->PA); // PA
			$this->updateSort($this->PROVISIONALDIAGNOSIS); // PROVISIONALDIAGNOSIS
			$this->updateSort($this->Investigations); // Investigations
			$this->updateSort($this->Fheight); // Fheight
			$this->updateSort($this->Fweight); // Fweight
			$this->updateSort($this->FBMI); // FBMI
			$this->updateSort($this->FBloodgroup); // FBloodgroup
			$this->updateSort($this->Mheight); // Mheight
			$this->updateSort($this->Mweight); // Mweight
			$this->updateSort($this->MBMI); // MBMI
			$this->updateSort($this->MBloodgroup); // MBloodgroup
			$this->updateSort($this->FBuild); // FBuild
			$this->updateSort($this->MBuild); // MBuild
			$this->updateSort($this->FSkinColor); // FSkinColor
			$this->updateSort($this->MSkinColor); // MSkinColor
			$this->updateSort($this->FEyesColor); // FEyesColor
			$this->updateSort($this->MEyesColor); // MEyesColor
			$this->updateSort($this->FHairColor); // FHairColor
			$this->updateSort($this->MhairColor); // MhairColor
			$this->updateSort($this->FhairTexture); // FhairTexture
			$this->updateSort($this->MHairTexture); // MHairTexture
			$this->updateSort($this->Fothers); // Fothers
			$this->updateSort($this->Mothers); // Mothers
			$this->updateSort($this->PGE); // PGE
			$this->updateSort($this->PPR); // PPR
			$this->updateSort($this->PBP); // PBP
			$this->updateSort($this->Breast); // Breast
			$this->updateSort($this->PPA); // PPA
			$this->updateSort($this->PPSV); // PPSV
			$this->updateSort($this->PPAPSMEAR); // PPAPSMEAR
			$this->updateSort($this->PTHYROID); // PTHYROID
			$this->updateSort($this->MTHYROID); // MTHYROID
			$this->updateSort($this->SecSexCharacters); // SecSexCharacters
			$this->updateSort($this->PenisUM); // PenisUM
			$this->updateSort($this->VAS); // VAS
			$this->updateSort($this->EPIDIDYMIS); // EPIDIDYMIS
			$this->updateSort($this->Varicocele); // Varicocele
			$this->updateSort($this->FamilyHistory); // FamilyHistory
			$this->updateSort($this->Addictions); // Addictions
			$this->updateSort($this->Medical); // Medical
			$this->updateSort($this->Surgical); // Surgical
			$this->updateSort($this->CoitalHistory); // CoitalHistory
			$this->updateSort($this->MariedFor); // MariedFor
			$this->updateSort($this->CMNCM); // CMNCM
			$this->updateSort($this->TidNo); // TidNo
			$this->updateSort($this->pFamilyHistory); // pFamilyHistory
			$this->updateSort($this->AntiTPO); // AntiTPO
			$this->updateSort($this->AntiTG); // AntiTG
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

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->Male->setSort("");
				$this->Female->setSort("");
				$this->status->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->HusbandEducation->setSort("");
				$this->WifeEducation->setSort("");
				$this->HusbandWorkHours->setSort("");
				$this->WifeWorkHours->setSort("");
				$this->PatientLanguage->setSort("");
				$this->ReferedBy->setSort("");
				$this->ReferPhNo->setSort("");
				$this->WifeCell->setSort("");
				$this->HusbandCell->setSort("");
				$this->WifeEmail->setSort("");
				$this->HusbandEmail->setSort("");
				$this->ARTCYCLE->setSort("");
				$this->RESULT->setSort("");
				$this->CoupleID->setSort("");
				$this->HospID->setSort("");
				$this->PatientName->setSort("");
				$this->PatientID->setSort("");
				$this->PartnerName->setSort("");
				$this->PartnerID->setSort("");
				$this->DrID->setSort("");
				$this->DrDepartment->setSort("");
				$this->Doctor->setSort("");
				$this->hid->setSort("");
				$this->RIDNO->setSort("");
				$this->Name->setSort("");
				$this->Age->setSort("");
				$this->SEX->setSort("");
				$this->Religion->setSort("");
				$this->Address->setSort("");
				$this->IdentificationMark->setSort("");
				$this->MedicalHistory->setSort("");
				$this->SurgicalHistory->setSort("");
				$this->Generalexaminationpallor->setSort("");
				$this->PR->setSort("");
				$this->CVS->setSort("");
				$this->PA->setSort("");
				$this->PROVISIONALDIAGNOSIS->setSort("");
				$this->Investigations->setSort("");
				$this->Fheight->setSort("");
				$this->Fweight->setSort("");
				$this->FBMI->setSort("");
				$this->FBloodgroup->setSort("");
				$this->Mheight->setSort("");
				$this->Mweight->setSort("");
				$this->MBMI->setSort("");
				$this->MBloodgroup->setSort("");
				$this->FBuild->setSort("");
				$this->MBuild->setSort("");
				$this->FSkinColor->setSort("");
				$this->MSkinColor->setSort("");
				$this->FEyesColor->setSort("");
				$this->MEyesColor->setSort("");
				$this->FHairColor->setSort("");
				$this->MhairColor->setSort("");
				$this->FhairTexture->setSort("");
				$this->MHairTexture->setSort("");
				$this->Fothers->setSort("");
				$this->Mothers->setSort("");
				$this->PGE->setSort("");
				$this->PPR->setSort("");
				$this->PBP->setSort("");
				$this->Breast->setSort("");
				$this->PPA->setSort("");
				$this->PPSV->setSort("");
				$this->PPAPSMEAR->setSort("");
				$this->PTHYROID->setSort("");
				$this->MTHYROID->setSort("");
				$this->SecSexCharacters->setSort("");
				$this->PenisUM->setSort("");
				$this->VAS->setSort("");
				$this->EPIDIDYMIS->setSort("");
				$this->Varicocele->setSort("");
				$this->FamilyHistory->setSort("");
				$this->Addictions->setSort("");
				$this->Medical->setSort("");
				$this->Surgical->setSort("");
				$this->CoitalHistory->setSort("");
				$this->MariedFor->setSort("");
				$this->CMNCM->setSort("");
				$this->TidNo->setSort("");
				$this->pFamilyHistory->setSort("");
				$this->AntiTPO->setSort("");
				$this->AntiTG->setSort("");
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

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew.selectAllKey(this);\">";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = TRUE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
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

		// Set up list action buttons
		$opt = &$this->ListOptions->getItem("listactions");
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = array();
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $Language->phrase("ListActionButton") . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = &$this->ListOptions->Items["checkbox"];
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue . $GLOBALS["COMPOSITE_KEY_SEPARATOR"] . $this->hid->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseDropDownButton = TRUE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_template_couple_vitalslistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_template_couple_vitalslistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fview_template_couple_vitalslist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->getItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter <> "" && $userAction <> "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions->Items[$userAction]->Caption;
				if (!$this->ListActions->Items[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = '';
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() <> "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() <> "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere <> "") ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_template_couple_vitalslistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}
	protected function setupListOptionsExt()
	{
		global $Security, $Language;

		// Hide detail items for dropdown if necessary
		$this->ListOptions->hideDetailItemsForDropDown();
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

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(TABLE_BASIC_SEARCH, ""), FALSE);
		if ($this->BasicSearch->Keyword <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(TABLE_BASIC_SEARCH_TYPE, ""), FALSE);
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
		$this->Male->setDbValue($row['Male']);
		$this->Female->setDbValue($row['Female']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->malepropic->setDbValue($row['malepropic']);
		$this->femalepropic->setDbValue($row['femalepropic']);
		$this->HusbandEducation->setDbValue($row['HusbandEducation']);
		$this->WifeEducation->setDbValue($row['WifeEducation']);
		$this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
		$this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
		$this->PatientLanguage->setDbValue($row['PatientLanguage']);
		$this->ReferedBy->setDbValue($row['ReferedBy']);
		$this->ReferPhNo->setDbValue($row['ReferPhNo']);
		$this->WifeCell->setDbValue($row['WifeCell']);
		$this->HusbandCell->setDbValue($row['HusbandCell']);
		$this->WifeEmail->setDbValue($row['WifeEmail']);
		$this->HusbandEmail->setDbValue($row['HusbandEmail']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->CoupleID->setDbValue($row['CoupleID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->Doctor->setDbValue($row['Doctor']);
		$this->hid->setDbValue($row['hid']);
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
		$this->AntiTPO->setDbValue($row['AntiTPO']);
		$this->AntiTG->setDbValue($row['AntiTG']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Male'] = NULL;
		$row['Female'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['malepropic'] = NULL;
		$row['femalepropic'] = NULL;
		$row['HusbandEducation'] = NULL;
		$row['WifeEducation'] = NULL;
		$row['HusbandWorkHours'] = NULL;
		$row['WifeWorkHours'] = NULL;
		$row['PatientLanguage'] = NULL;
		$row['ReferedBy'] = NULL;
		$row['ReferPhNo'] = NULL;
		$row['WifeCell'] = NULL;
		$row['HusbandCell'] = NULL;
		$row['WifeEmail'] = NULL;
		$row['HusbandEmail'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['RESULT'] = NULL;
		$row['CoupleID'] = NULL;
		$row['HospID'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['DrID'] = NULL;
		$row['DrDepartment'] = NULL;
		$row['Doctor'] = NULL;
		$row['hid'] = NULL;
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
		$row['AntiTPO'] = NULL;
		$row['AntiTG'] = NULL;
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
		if (strval($this->getKey("hid")) <> "")
			$this->hid->CurrentValue = $this->getKey("hid"); // hid
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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Male
		// Female
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// malepropic
		// femalepropic
		// HusbandEducation
		// WifeEducation
		// HusbandWorkHours
		// WifeWorkHours
		// PatientLanguage
		// ReferedBy
		// ReferPhNo
		// WifeCell
		// HusbandCell
		// WifeEmail
		// HusbandEmail
		// ARTCYCLE
		// RESULT
		// CoupleID
		// HospID
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// DrID
		// DrDepartment
		// Doctor
		// hid
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
		// AntiTPO
		// AntiTG

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Male
			$this->Male->ViewValue = $this->Male->CurrentValue;
			$this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
			$this->Male->ViewCustomAttributes = "";

			// Female
			$this->Female->ViewValue = $this->Female->CurrentValue;
			$this->Female->ViewValue = FormatNumber($this->Female->ViewValue, 0, -2, -2, -2);
			$this->Female->ViewCustomAttributes = "";

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

			// HusbandEducation
			$this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
			$this->HusbandEducation->ViewCustomAttributes = "";

			// WifeEducation
			$this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
			$this->WifeEducation->ViewCustomAttributes = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
			$this->HusbandWorkHours->ViewCustomAttributes = "";

			// WifeWorkHours
			$this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
			$this->WifeWorkHours->ViewCustomAttributes = "";

			// PatientLanguage
			$this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
			$this->PatientLanguage->ViewCustomAttributes = "";

			// ReferedBy
			$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
			$this->ReferedBy->ViewCustomAttributes = "";

			// ReferPhNo
			$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
			$this->ReferPhNo->ViewCustomAttributes = "";

			// WifeCell
			$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
			$this->WifeCell->ViewCustomAttributes = "";

			// HusbandCell
			$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
			$this->HusbandCell->ViewCustomAttributes = "";

			// WifeEmail
			$this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
			$this->WifeEmail->ViewCustomAttributes = "";

			// HusbandEmail
			$this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
			$this->HusbandEmail->ViewCustomAttributes = "";

			// ARTCYCLE
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
			$this->RESULT->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

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

			// DrID
			$this->DrID->ViewValue = $this->DrID->CurrentValue;
			$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
			$this->DrID->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// hid
			$this->hid->ViewValue = $this->hid->CurrentValue;
			$this->hid->ViewCustomAttributes = "";

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

			// MedicalHistory
			$this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
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
			$this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
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
			$this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
			$this->MBloodgroup->ViewCustomAttributes = "";

			// FBuild
			$this->FBuild->ViewValue = $this->FBuild->CurrentValue;
			$this->FBuild->ViewCustomAttributes = "";

			// MBuild
			$this->MBuild->ViewValue = $this->MBuild->CurrentValue;
			$this->MBuild->ViewCustomAttributes = "";

			// FSkinColor
			$this->FSkinColor->ViewValue = $this->FSkinColor->CurrentValue;
			$this->FSkinColor->ViewCustomAttributes = "";

			// MSkinColor
			$this->MSkinColor->ViewValue = $this->MSkinColor->CurrentValue;
			$this->MSkinColor->ViewCustomAttributes = "";

			// FEyesColor
			$this->FEyesColor->ViewValue = $this->FEyesColor->CurrentValue;
			$this->FEyesColor->ViewCustomAttributes = "";

			// MEyesColor
			$this->MEyesColor->ViewValue = $this->MEyesColor->CurrentValue;
			$this->MEyesColor->ViewCustomAttributes = "";

			// FHairColor
			$this->FHairColor->ViewValue = $this->FHairColor->CurrentValue;
			$this->FHairColor->ViewCustomAttributes = "";

			// MhairColor
			$this->MhairColor->ViewValue = $this->MhairColor->CurrentValue;
			$this->MhairColor->ViewCustomAttributes = "";

			// FhairTexture
			$this->FhairTexture->ViewValue = $this->FhairTexture->CurrentValue;
			$this->FhairTexture->ViewCustomAttributes = "";

			// MHairTexture
			$this->MHairTexture->ViewValue = $this->MHairTexture->CurrentValue;
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
			$this->FamilyHistory->ViewCustomAttributes = "";

			// Addictions
			$this->Addictions->ViewValue = $this->Addictions->CurrentValue;
			$this->Addictions->ViewCustomAttributes = "";

			// Medical
			$this->Medical->ViewValue = $this->Medical->CurrentValue;
			$this->Medical->ViewCustomAttributes = "";

			// Surgical
			$this->Surgical->ViewValue = $this->Surgical->CurrentValue;
			$this->Surgical->ViewCustomAttributes = "";

			// CoitalHistory
			$this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
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
			$this->pFamilyHistory->ViewCustomAttributes = "";

			// AntiTPO
			$this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
			$this->AntiTPO->ViewCustomAttributes = "";

			// AntiTG
			$this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
			$this->AntiTG->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Male
			$this->Male->LinkCustomAttributes = "";
			$this->Male->HrefValue = "";
			$this->Male->TooltipValue = "";

			// Female
			$this->Female->LinkCustomAttributes = "";
			$this->Female->HrefValue = "";
			$this->Female->TooltipValue = "";

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

			// HusbandEducation
			$this->HusbandEducation->LinkCustomAttributes = "";
			$this->HusbandEducation->HrefValue = "";
			$this->HusbandEducation->TooltipValue = "";

			// WifeEducation
			$this->WifeEducation->LinkCustomAttributes = "";
			$this->WifeEducation->HrefValue = "";
			$this->WifeEducation->TooltipValue = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->LinkCustomAttributes = "";
			$this->HusbandWorkHours->HrefValue = "";
			$this->HusbandWorkHours->TooltipValue = "";

			// WifeWorkHours
			$this->WifeWorkHours->LinkCustomAttributes = "";
			$this->WifeWorkHours->HrefValue = "";
			$this->WifeWorkHours->TooltipValue = "";

			// PatientLanguage
			$this->PatientLanguage->LinkCustomAttributes = "";
			$this->PatientLanguage->HrefValue = "";
			$this->PatientLanguage->TooltipValue = "";

			// ReferedBy
			$this->ReferedBy->LinkCustomAttributes = "";
			$this->ReferedBy->HrefValue = "";
			$this->ReferedBy->TooltipValue = "";

			// ReferPhNo
			$this->ReferPhNo->LinkCustomAttributes = "";
			$this->ReferPhNo->HrefValue = "";
			$this->ReferPhNo->TooltipValue = "";

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";
			$this->WifeCell->TooltipValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";
			$this->HusbandCell->TooltipValue = "";

			// WifeEmail
			$this->WifeEmail->LinkCustomAttributes = "";
			$this->WifeEmail->HrefValue = "";
			$this->WifeEmail->TooltipValue = "";

			// HusbandEmail
			$this->HusbandEmail->LinkCustomAttributes = "";
			$this->HusbandEmail->HrefValue = "";
			$this->HusbandEmail->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";

			// hid
			$this->hid->LinkCustomAttributes = "";
			$this->hid->HrefValue = "";
			$this->hid->TooltipValue = "";

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

			// AntiTPO
			$this->AntiTPO->LinkCustomAttributes = "";
			$this->AntiTPO->HrefValue = "";
			$this->AntiTPO->TooltipValue = "";

			// AntiTG
			$this->AntiTG->LinkCustomAttributes = "";
			$this->AntiTG->HrefValue = "";
			$this->AntiTG->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fview_template_couple_vitalslist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fview_template_couple_vitalslist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fview_template_couple_vitalslist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = TRUE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = TRUE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = TRUE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = TRUE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = TRUE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = TRUE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$url = "";
		$item->Body = "<button id=\"emf_view_template_couple_vitals\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_view_template_couple_vitals',hdr:ew.language.phrase('ExportToEmailText'),f:document.fview_template_couple_vitalslist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
		$item->Visible = FALSE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = TRUE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed 
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(PROJECT_CHARSET, "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecs = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(EXPORT_ALL_TIME_LIMIT);
			$this->DisplayRecs = $this->TotalRecs;
			$this->StopRec = $this->TotalRecs;
		} else { // Export one page only
			$this->setupStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecs <= 0) {
				$this->StopRec = $this->TotalRecs;
			} else {
				$this->StopRec = $this->StartRec + $this->DisplayRecs - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs <= 0 ? $this->TotalRecs : $this->DisplayRecs);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRec = 1;
			$this->StopRec = $this->DisplayRecs <= 0 ? $this->TotalRecs : $this->DisplayRecs;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRec, $this->StopRec, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!DEBUG_ENABLED && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (DEBUG_ENABLED && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
}
?>
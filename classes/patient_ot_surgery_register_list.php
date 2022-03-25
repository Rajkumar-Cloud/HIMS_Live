<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_ot_surgery_register_list extends patient_ot_surgery_register
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_ot_surgery_register';

	// Page object name
	public $PageObjName = "patient_ot_surgery_register_list";

	// Grid form hidden field names
	public $FormName = "fpatient_ot_surgery_registerlist";
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

		// Table object (patient_ot_surgery_register)
		if (!isset($GLOBALS["patient_ot_surgery_register"]) || get_class($GLOBALS["patient_ot_surgery_register"]) == PROJECT_NAMESPACE . "patient_ot_surgery_register") {
			$GLOBALS["patient_ot_surgery_register"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_ot_surgery_register"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "patient_ot_surgery_registeradd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "patient_ot_surgery_registerdelete.php";
		$this->MultiUpdateUrl = "patient_ot_surgery_registerupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_surgery_register');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpatient_ot_surgery_registerlistsrch";

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
		global $EXPORT, $patient_ot_surgery_register;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($patient_ot_surgery_register);
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
		if ($this->isAddOrEdit())
			$this->status->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
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
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->mrnno->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->diagnosis->Visible = FALSE;
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
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->HospID->setVisibility();
		$this->PatientSearch->Visible = FALSE;
		$this->Reception->setVisibility();
		$this->PatientID->setVisibility();
		$this->PId->setVisibility();
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
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anaesthetist);
		$this->setupLookupOptions($this->AsstSurgeon1);
		$this->setupLookupOptions($this->AsstSurgeon2);
		$this->setupLookupOptions($this->paediatric);
		$this->setupLookupOptions($this->PatientSearch);

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
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

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

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
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

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
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

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ip_admissionlist.php"); // Return to master page
			} else {
				$ip_admission->loadListRowValues($rsmaster);
				$ip_admission->RowType = ROWTYPE_MASTER; // Master row
				$ip_admission->renderListRow();
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
		if (count($arKeyFlds) >= 1) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_ot_surgery_registerlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->diagnosis->AdvancedSearch->toJson(), ","); // Field diagnosis
		$filterList = Concat($filterList, $this->proposedSurgery->AdvancedSearch->toJson(), ","); // Field proposedSurgery
		$filterList = Concat($filterList, $this->surgeryProcedure->AdvancedSearch->toJson(), ","); // Field surgeryProcedure
		$filterList = Concat($filterList, $this->typeOfAnaesthesia->AdvancedSearch->toJson(), ","); // Field typeOfAnaesthesia
		$filterList = Concat($filterList, $this->RecievedTime->AdvancedSearch->toJson(), ","); // Field RecievedTime
		$filterList = Concat($filterList, $this->AnaesthesiaStarted->AdvancedSearch->toJson(), ","); // Field AnaesthesiaStarted
		$filterList = Concat($filterList, $this->AnaesthesiaEnded->AdvancedSearch->toJson(), ","); // Field AnaesthesiaEnded
		$filterList = Concat($filterList, $this->surgeryStarted->AdvancedSearch->toJson(), ","); // Field surgeryStarted
		$filterList = Concat($filterList, $this->surgeryEnded->AdvancedSearch->toJson(), ","); // Field surgeryEnded
		$filterList = Concat($filterList, $this->RecoveryTime->AdvancedSearch->toJson(), ","); // Field RecoveryTime
		$filterList = Concat($filterList, $this->ShiftedTime->AdvancedSearch->toJson(), ","); // Field ShiftedTime
		$filterList = Concat($filterList, $this->Duration->AdvancedSearch->toJson(), ","); // Field Duration
		$filterList = Concat($filterList, $this->Surgeon->AdvancedSearch->toJson(), ","); // Field Surgeon
		$filterList = Concat($filterList, $this->Anaesthetist->AdvancedSearch->toJson(), ","); // Field Anaesthetist
		$filterList = Concat($filterList, $this->AsstSurgeon1->AdvancedSearch->toJson(), ","); // Field AsstSurgeon1
		$filterList = Concat($filterList, $this->AsstSurgeon2->AdvancedSearch->toJson(), ","); // Field AsstSurgeon2
		$filterList = Concat($filterList, $this->paediatric->AdvancedSearch->toJson(), ","); // Field paediatric
		$filterList = Concat($filterList, $this->ScrubNurse1->AdvancedSearch->toJson(), ","); // Field ScrubNurse1
		$filterList = Concat($filterList, $this->ScrubNurse2->AdvancedSearch->toJson(), ","); // Field ScrubNurse2
		$filterList = Concat($filterList, $this->FloorNurse->AdvancedSearch->toJson(), ","); // Field FloorNurse
		$filterList = Concat($filterList, $this->Technician->AdvancedSearch->toJson(), ","); // Field Technician
		$filterList = Concat($filterList, $this->HouseKeeping->AdvancedSearch->toJson(), ","); // Field HouseKeeping
		$filterList = Concat($filterList, $this->countsCheckedMops->AdvancedSearch->toJson(), ","); // Field countsCheckedMops
		$filterList = Concat($filterList, $this->gauze->AdvancedSearch->toJson(), ","); // Field gauze
		$filterList = Concat($filterList, $this->needles->AdvancedSearch->toJson(), ","); // Field needles
		$filterList = Concat($filterList, $this->bloodloss->AdvancedSearch->toJson(), ","); // Field bloodloss
		$filterList = Concat($filterList, $this->bloodtransfusion->AdvancedSearch->toJson(), ","); // Field bloodtransfusion
		$filterList = Concat($filterList, $this->implantsUsed->AdvancedSearch->toJson(), ","); // Field implantsUsed
		$filterList = Concat($filterList, $this->MaterialsForHPE->AdvancedSearch->toJson(), ","); // Field MaterialsForHPE
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->PatientSearch->AdvancedSearch->toJson(), ","); // Field PatientSearch
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->PId->AdvancedSearch->toJson(), ","); // Field PId
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpatient_ot_surgery_registerlistsrch", $filters);
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

		// Field PatID
		$this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
		$this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
		$this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
		$this->PatID->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field MobileNumber
		$this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
		$this->MobileNumber->AdvancedSearch->save();

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

		// Field Gender
		$this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
		$this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
		$this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
		$this->Gender->AdvancedSearch->save();

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field diagnosis
		$this->diagnosis->AdvancedSearch->SearchValue = @$filter["x_diagnosis"];
		$this->diagnosis->AdvancedSearch->SearchOperator = @$filter["z_diagnosis"];
		$this->diagnosis->AdvancedSearch->SearchCondition = @$filter["v_diagnosis"];
		$this->diagnosis->AdvancedSearch->SearchValue2 = @$filter["y_diagnosis"];
		$this->diagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_diagnosis"];
		$this->diagnosis->AdvancedSearch->save();

		// Field proposedSurgery
		$this->proposedSurgery->AdvancedSearch->SearchValue = @$filter["x_proposedSurgery"];
		$this->proposedSurgery->AdvancedSearch->SearchOperator = @$filter["z_proposedSurgery"];
		$this->proposedSurgery->AdvancedSearch->SearchCondition = @$filter["v_proposedSurgery"];
		$this->proposedSurgery->AdvancedSearch->SearchValue2 = @$filter["y_proposedSurgery"];
		$this->proposedSurgery->AdvancedSearch->SearchOperator2 = @$filter["w_proposedSurgery"];
		$this->proposedSurgery->AdvancedSearch->save();

		// Field surgeryProcedure
		$this->surgeryProcedure->AdvancedSearch->SearchValue = @$filter["x_surgeryProcedure"];
		$this->surgeryProcedure->AdvancedSearch->SearchOperator = @$filter["z_surgeryProcedure"];
		$this->surgeryProcedure->AdvancedSearch->SearchCondition = @$filter["v_surgeryProcedure"];
		$this->surgeryProcedure->AdvancedSearch->SearchValue2 = @$filter["y_surgeryProcedure"];
		$this->surgeryProcedure->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryProcedure"];
		$this->surgeryProcedure->AdvancedSearch->save();

		// Field typeOfAnaesthesia
		$this->typeOfAnaesthesia->AdvancedSearch->SearchValue = @$filter["x_typeOfAnaesthesia"];
		$this->typeOfAnaesthesia->AdvancedSearch->SearchOperator = @$filter["z_typeOfAnaesthesia"];
		$this->typeOfAnaesthesia->AdvancedSearch->SearchCondition = @$filter["v_typeOfAnaesthesia"];
		$this->typeOfAnaesthesia->AdvancedSearch->SearchValue2 = @$filter["y_typeOfAnaesthesia"];
		$this->typeOfAnaesthesia->AdvancedSearch->SearchOperator2 = @$filter["w_typeOfAnaesthesia"];
		$this->typeOfAnaesthesia->AdvancedSearch->save();

		// Field RecievedTime
		$this->RecievedTime->AdvancedSearch->SearchValue = @$filter["x_RecievedTime"];
		$this->RecievedTime->AdvancedSearch->SearchOperator = @$filter["z_RecievedTime"];
		$this->RecievedTime->AdvancedSearch->SearchCondition = @$filter["v_RecievedTime"];
		$this->RecievedTime->AdvancedSearch->SearchValue2 = @$filter["y_RecievedTime"];
		$this->RecievedTime->AdvancedSearch->SearchOperator2 = @$filter["w_RecievedTime"];
		$this->RecievedTime->AdvancedSearch->save();

		// Field AnaesthesiaStarted
		$this->AnaesthesiaStarted->AdvancedSearch->SearchValue = @$filter["x_AnaesthesiaStarted"];
		$this->AnaesthesiaStarted->AdvancedSearch->SearchOperator = @$filter["z_AnaesthesiaStarted"];
		$this->AnaesthesiaStarted->AdvancedSearch->SearchCondition = @$filter["v_AnaesthesiaStarted"];
		$this->AnaesthesiaStarted->AdvancedSearch->SearchValue2 = @$filter["y_AnaesthesiaStarted"];
		$this->AnaesthesiaStarted->AdvancedSearch->SearchOperator2 = @$filter["w_AnaesthesiaStarted"];
		$this->AnaesthesiaStarted->AdvancedSearch->save();

		// Field AnaesthesiaEnded
		$this->AnaesthesiaEnded->AdvancedSearch->SearchValue = @$filter["x_AnaesthesiaEnded"];
		$this->AnaesthesiaEnded->AdvancedSearch->SearchOperator = @$filter["z_AnaesthesiaEnded"];
		$this->AnaesthesiaEnded->AdvancedSearch->SearchCondition = @$filter["v_AnaesthesiaEnded"];
		$this->AnaesthesiaEnded->AdvancedSearch->SearchValue2 = @$filter["y_AnaesthesiaEnded"];
		$this->AnaesthesiaEnded->AdvancedSearch->SearchOperator2 = @$filter["w_AnaesthesiaEnded"];
		$this->AnaesthesiaEnded->AdvancedSearch->save();

		// Field surgeryStarted
		$this->surgeryStarted->AdvancedSearch->SearchValue = @$filter["x_surgeryStarted"];
		$this->surgeryStarted->AdvancedSearch->SearchOperator = @$filter["z_surgeryStarted"];
		$this->surgeryStarted->AdvancedSearch->SearchCondition = @$filter["v_surgeryStarted"];
		$this->surgeryStarted->AdvancedSearch->SearchValue2 = @$filter["y_surgeryStarted"];
		$this->surgeryStarted->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryStarted"];
		$this->surgeryStarted->AdvancedSearch->save();

		// Field surgeryEnded
		$this->surgeryEnded->AdvancedSearch->SearchValue = @$filter["x_surgeryEnded"];
		$this->surgeryEnded->AdvancedSearch->SearchOperator = @$filter["z_surgeryEnded"];
		$this->surgeryEnded->AdvancedSearch->SearchCondition = @$filter["v_surgeryEnded"];
		$this->surgeryEnded->AdvancedSearch->SearchValue2 = @$filter["y_surgeryEnded"];
		$this->surgeryEnded->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryEnded"];
		$this->surgeryEnded->AdvancedSearch->save();

		// Field RecoveryTime
		$this->RecoveryTime->AdvancedSearch->SearchValue = @$filter["x_RecoveryTime"];
		$this->RecoveryTime->AdvancedSearch->SearchOperator = @$filter["z_RecoveryTime"];
		$this->RecoveryTime->AdvancedSearch->SearchCondition = @$filter["v_RecoveryTime"];
		$this->RecoveryTime->AdvancedSearch->SearchValue2 = @$filter["y_RecoveryTime"];
		$this->RecoveryTime->AdvancedSearch->SearchOperator2 = @$filter["w_RecoveryTime"];
		$this->RecoveryTime->AdvancedSearch->save();

		// Field ShiftedTime
		$this->ShiftedTime->AdvancedSearch->SearchValue = @$filter["x_ShiftedTime"];
		$this->ShiftedTime->AdvancedSearch->SearchOperator = @$filter["z_ShiftedTime"];
		$this->ShiftedTime->AdvancedSearch->SearchCondition = @$filter["v_ShiftedTime"];
		$this->ShiftedTime->AdvancedSearch->SearchValue2 = @$filter["y_ShiftedTime"];
		$this->ShiftedTime->AdvancedSearch->SearchOperator2 = @$filter["w_ShiftedTime"];
		$this->ShiftedTime->AdvancedSearch->save();

		// Field Duration
		$this->Duration->AdvancedSearch->SearchValue = @$filter["x_Duration"];
		$this->Duration->AdvancedSearch->SearchOperator = @$filter["z_Duration"];
		$this->Duration->AdvancedSearch->SearchCondition = @$filter["v_Duration"];
		$this->Duration->AdvancedSearch->SearchValue2 = @$filter["y_Duration"];
		$this->Duration->AdvancedSearch->SearchOperator2 = @$filter["w_Duration"];
		$this->Duration->AdvancedSearch->save();

		// Field Surgeon
		$this->Surgeon->AdvancedSearch->SearchValue = @$filter["x_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchOperator = @$filter["z_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchCondition = @$filter["v_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchValue2 = @$filter["y_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchOperator2 = @$filter["w_Surgeon"];
		$this->Surgeon->AdvancedSearch->save();

		// Field Anaesthetist
		$this->Anaesthetist->AdvancedSearch->SearchValue = @$filter["x_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->save();

		// Field AsstSurgeon1
		$this->AsstSurgeon1->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon1"];
		$this->AsstSurgeon1->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon1"];
		$this->AsstSurgeon1->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon1"];
		$this->AsstSurgeon1->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon1"];
		$this->AsstSurgeon1->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon1"];
		$this->AsstSurgeon1->AdvancedSearch->save();

		// Field AsstSurgeon2
		$this->AsstSurgeon2->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon2"];
		$this->AsstSurgeon2->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon2"];
		$this->AsstSurgeon2->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon2"];
		$this->AsstSurgeon2->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon2"];
		$this->AsstSurgeon2->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon2"];
		$this->AsstSurgeon2->AdvancedSearch->save();

		// Field paediatric
		$this->paediatric->AdvancedSearch->SearchValue = @$filter["x_paediatric"];
		$this->paediatric->AdvancedSearch->SearchOperator = @$filter["z_paediatric"];
		$this->paediatric->AdvancedSearch->SearchCondition = @$filter["v_paediatric"];
		$this->paediatric->AdvancedSearch->SearchValue2 = @$filter["y_paediatric"];
		$this->paediatric->AdvancedSearch->SearchOperator2 = @$filter["w_paediatric"];
		$this->paediatric->AdvancedSearch->save();

		// Field ScrubNurse1
		$this->ScrubNurse1->AdvancedSearch->SearchValue = @$filter["x_ScrubNurse1"];
		$this->ScrubNurse1->AdvancedSearch->SearchOperator = @$filter["z_ScrubNurse1"];
		$this->ScrubNurse1->AdvancedSearch->SearchCondition = @$filter["v_ScrubNurse1"];
		$this->ScrubNurse1->AdvancedSearch->SearchValue2 = @$filter["y_ScrubNurse1"];
		$this->ScrubNurse1->AdvancedSearch->SearchOperator2 = @$filter["w_ScrubNurse1"];
		$this->ScrubNurse1->AdvancedSearch->save();

		// Field ScrubNurse2
		$this->ScrubNurse2->AdvancedSearch->SearchValue = @$filter["x_ScrubNurse2"];
		$this->ScrubNurse2->AdvancedSearch->SearchOperator = @$filter["z_ScrubNurse2"];
		$this->ScrubNurse2->AdvancedSearch->SearchCondition = @$filter["v_ScrubNurse2"];
		$this->ScrubNurse2->AdvancedSearch->SearchValue2 = @$filter["y_ScrubNurse2"];
		$this->ScrubNurse2->AdvancedSearch->SearchOperator2 = @$filter["w_ScrubNurse2"];
		$this->ScrubNurse2->AdvancedSearch->save();

		// Field FloorNurse
		$this->FloorNurse->AdvancedSearch->SearchValue = @$filter["x_FloorNurse"];
		$this->FloorNurse->AdvancedSearch->SearchOperator = @$filter["z_FloorNurse"];
		$this->FloorNurse->AdvancedSearch->SearchCondition = @$filter["v_FloorNurse"];
		$this->FloorNurse->AdvancedSearch->SearchValue2 = @$filter["y_FloorNurse"];
		$this->FloorNurse->AdvancedSearch->SearchOperator2 = @$filter["w_FloorNurse"];
		$this->FloorNurse->AdvancedSearch->save();

		// Field Technician
		$this->Technician->AdvancedSearch->SearchValue = @$filter["x_Technician"];
		$this->Technician->AdvancedSearch->SearchOperator = @$filter["z_Technician"];
		$this->Technician->AdvancedSearch->SearchCondition = @$filter["v_Technician"];
		$this->Technician->AdvancedSearch->SearchValue2 = @$filter["y_Technician"];
		$this->Technician->AdvancedSearch->SearchOperator2 = @$filter["w_Technician"];
		$this->Technician->AdvancedSearch->save();

		// Field HouseKeeping
		$this->HouseKeeping->AdvancedSearch->SearchValue = @$filter["x_HouseKeeping"];
		$this->HouseKeeping->AdvancedSearch->SearchOperator = @$filter["z_HouseKeeping"];
		$this->HouseKeeping->AdvancedSearch->SearchCondition = @$filter["v_HouseKeeping"];
		$this->HouseKeeping->AdvancedSearch->SearchValue2 = @$filter["y_HouseKeeping"];
		$this->HouseKeeping->AdvancedSearch->SearchOperator2 = @$filter["w_HouseKeeping"];
		$this->HouseKeeping->AdvancedSearch->save();

		// Field countsCheckedMops
		$this->countsCheckedMops->AdvancedSearch->SearchValue = @$filter["x_countsCheckedMops"];
		$this->countsCheckedMops->AdvancedSearch->SearchOperator = @$filter["z_countsCheckedMops"];
		$this->countsCheckedMops->AdvancedSearch->SearchCondition = @$filter["v_countsCheckedMops"];
		$this->countsCheckedMops->AdvancedSearch->SearchValue2 = @$filter["y_countsCheckedMops"];
		$this->countsCheckedMops->AdvancedSearch->SearchOperator2 = @$filter["w_countsCheckedMops"];
		$this->countsCheckedMops->AdvancedSearch->save();

		// Field gauze
		$this->gauze->AdvancedSearch->SearchValue = @$filter["x_gauze"];
		$this->gauze->AdvancedSearch->SearchOperator = @$filter["z_gauze"];
		$this->gauze->AdvancedSearch->SearchCondition = @$filter["v_gauze"];
		$this->gauze->AdvancedSearch->SearchValue2 = @$filter["y_gauze"];
		$this->gauze->AdvancedSearch->SearchOperator2 = @$filter["w_gauze"];
		$this->gauze->AdvancedSearch->save();

		// Field needles
		$this->needles->AdvancedSearch->SearchValue = @$filter["x_needles"];
		$this->needles->AdvancedSearch->SearchOperator = @$filter["z_needles"];
		$this->needles->AdvancedSearch->SearchCondition = @$filter["v_needles"];
		$this->needles->AdvancedSearch->SearchValue2 = @$filter["y_needles"];
		$this->needles->AdvancedSearch->SearchOperator2 = @$filter["w_needles"];
		$this->needles->AdvancedSearch->save();

		// Field bloodloss
		$this->bloodloss->AdvancedSearch->SearchValue = @$filter["x_bloodloss"];
		$this->bloodloss->AdvancedSearch->SearchOperator = @$filter["z_bloodloss"];
		$this->bloodloss->AdvancedSearch->SearchCondition = @$filter["v_bloodloss"];
		$this->bloodloss->AdvancedSearch->SearchValue2 = @$filter["y_bloodloss"];
		$this->bloodloss->AdvancedSearch->SearchOperator2 = @$filter["w_bloodloss"];
		$this->bloodloss->AdvancedSearch->save();

		// Field bloodtransfusion
		$this->bloodtransfusion->AdvancedSearch->SearchValue = @$filter["x_bloodtransfusion"];
		$this->bloodtransfusion->AdvancedSearch->SearchOperator = @$filter["z_bloodtransfusion"];
		$this->bloodtransfusion->AdvancedSearch->SearchCondition = @$filter["v_bloodtransfusion"];
		$this->bloodtransfusion->AdvancedSearch->SearchValue2 = @$filter["y_bloodtransfusion"];
		$this->bloodtransfusion->AdvancedSearch->SearchOperator2 = @$filter["w_bloodtransfusion"];
		$this->bloodtransfusion->AdvancedSearch->save();

		// Field implantsUsed
		$this->implantsUsed->AdvancedSearch->SearchValue = @$filter["x_implantsUsed"];
		$this->implantsUsed->AdvancedSearch->SearchOperator = @$filter["z_implantsUsed"];
		$this->implantsUsed->AdvancedSearch->SearchCondition = @$filter["v_implantsUsed"];
		$this->implantsUsed->AdvancedSearch->SearchValue2 = @$filter["y_implantsUsed"];
		$this->implantsUsed->AdvancedSearch->SearchOperator2 = @$filter["w_implantsUsed"];
		$this->implantsUsed->AdvancedSearch->save();

		// Field MaterialsForHPE
		$this->MaterialsForHPE->AdvancedSearch->SearchValue = @$filter["x_MaterialsForHPE"];
		$this->MaterialsForHPE->AdvancedSearch->SearchOperator = @$filter["z_MaterialsForHPE"];
		$this->MaterialsForHPE->AdvancedSearch->SearchCondition = @$filter["v_MaterialsForHPE"];
		$this->MaterialsForHPE->AdvancedSearch->SearchValue2 = @$filter["y_MaterialsForHPE"];
		$this->MaterialsForHPE->AdvancedSearch->SearchOperator2 = @$filter["w_MaterialsForHPE"];
		$this->MaterialsForHPE->AdvancedSearch->save();

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

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field PatientSearch
		$this->PatientSearch->AdvancedSearch->SearchValue = @$filter["x_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchOperator = @$filter["z_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchCondition = @$filter["v_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchValue2 = @$filter["y_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->SearchOperator2 = @$filter["w_PatientSearch"];
		$this->PatientSearch->AdvancedSearch->save();

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

		// Field PId
		$this->PId->AdvancedSearch->SearchValue = @$filter["x_PId"];
		$this->PId->AdvancedSearch->SearchOperator = @$filter["z_PId"];
		$this->PId->AdvancedSearch->SearchCondition = @$filter["v_PId"];
		$this->PId->AdvancedSearch->SearchValue2 = @$filter["y_PId"];
		$this->PId->AdvancedSearch->SearchOperator2 = @$filter["w_PId"];
		$this->PId->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[TABLE_BASIC_SEARCH]);
		$this->BasicSearch->setType(@$filter[TABLE_BASIC_SEARCH_TYPE]);
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->id, $default, FALSE); // id
		$this->buildSearchSql($where, $this->PatID, $default, FALSE); // PatID
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->mrnno, $default, FALSE); // mrnno
		$this->buildSearchSql($where, $this->MobileNumber, $default, FALSE); // MobileNumber
		$this->buildSearchSql($where, $this->Age, $default, FALSE); // Age
		$this->buildSearchSql($where, $this->Gender, $default, FALSE); // Gender
		$this->buildSearchSql($where, $this->profilePic, $default, FALSE); // profilePic
		$this->buildSearchSql($where, $this->diagnosis, $default, FALSE); // diagnosis
		$this->buildSearchSql($where, $this->proposedSurgery, $default, FALSE); // proposedSurgery
		$this->buildSearchSql($where, $this->surgeryProcedure, $default, FALSE); // surgeryProcedure
		$this->buildSearchSql($where, $this->typeOfAnaesthesia, $default, FALSE); // typeOfAnaesthesia
		$this->buildSearchSql($where, $this->RecievedTime, $default, FALSE); // RecievedTime
		$this->buildSearchSql($where, $this->AnaesthesiaStarted, $default, FALSE); // AnaesthesiaStarted
		$this->buildSearchSql($where, $this->AnaesthesiaEnded, $default, FALSE); // AnaesthesiaEnded
		$this->buildSearchSql($where, $this->surgeryStarted, $default, FALSE); // surgeryStarted
		$this->buildSearchSql($where, $this->surgeryEnded, $default, FALSE); // surgeryEnded
		$this->buildSearchSql($where, $this->RecoveryTime, $default, FALSE); // RecoveryTime
		$this->buildSearchSql($where, $this->ShiftedTime, $default, FALSE); // ShiftedTime
		$this->buildSearchSql($where, $this->Duration, $default, FALSE); // Duration
		$this->buildSearchSql($where, $this->Surgeon, $default, FALSE); // Surgeon
		$this->buildSearchSql($where, $this->Anaesthetist, $default, FALSE); // Anaesthetist
		$this->buildSearchSql($where, $this->AsstSurgeon1, $default, FALSE); // AsstSurgeon1
		$this->buildSearchSql($where, $this->AsstSurgeon2, $default, FALSE); // AsstSurgeon2
		$this->buildSearchSql($where, $this->paediatric, $default, FALSE); // paediatric
		$this->buildSearchSql($where, $this->ScrubNurse1, $default, FALSE); // ScrubNurse1
		$this->buildSearchSql($where, $this->ScrubNurse2, $default, FALSE); // ScrubNurse2
		$this->buildSearchSql($where, $this->FloorNurse, $default, FALSE); // FloorNurse
		$this->buildSearchSql($where, $this->Technician, $default, FALSE); // Technician
		$this->buildSearchSql($where, $this->HouseKeeping, $default, FALSE); // HouseKeeping
		$this->buildSearchSql($where, $this->countsCheckedMops, $default, FALSE); // countsCheckedMops
		$this->buildSearchSql($where, $this->gauze, $default, FALSE); // gauze
		$this->buildSearchSql($where, $this->needles, $default, FALSE); // needles
		$this->buildSearchSql($where, $this->bloodloss, $default, FALSE); // bloodloss
		$this->buildSearchSql($where, $this->bloodtransfusion, $default, FALSE); // bloodtransfusion
		$this->buildSearchSql($where, $this->implantsUsed, $default, FALSE); // implantsUsed
		$this->buildSearchSql($where, $this->MaterialsForHPE, $default, FALSE); // MaterialsForHPE
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->PatientSearch, $default, FALSE); // PatientSearch
		$this->buildSearchSql($where, $this->Reception, $default, FALSE); // Reception
		$this->buildSearchSql($where, $this->PatientID, $default, FALSE); // PatientID
		$this->buildSearchSql($where, $this->PId, $default, FALSE); // PId

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->PatID->AdvancedSearch->save(); // PatID
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->mrnno->AdvancedSearch->save(); // mrnno
			$this->MobileNumber->AdvancedSearch->save(); // MobileNumber
			$this->Age->AdvancedSearch->save(); // Age
			$this->Gender->AdvancedSearch->save(); // Gender
			$this->profilePic->AdvancedSearch->save(); // profilePic
			$this->diagnosis->AdvancedSearch->save(); // diagnosis
			$this->proposedSurgery->AdvancedSearch->save(); // proposedSurgery
			$this->surgeryProcedure->AdvancedSearch->save(); // surgeryProcedure
			$this->typeOfAnaesthesia->AdvancedSearch->save(); // typeOfAnaesthesia
			$this->RecievedTime->AdvancedSearch->save(); // RecievedTime
			$this->AnaesthesiaStarted->AdvancedSearch->save(); // AnaesthesiaStarted
			$this->AnaesthesiaEnded->AdvancedSearch->save(); // AnaesthesiaEnded
			$this->surgeryStarted->AdvancedSearch->save(); // surgeryStarted
			$this->surgeryEnded->AdvancedSearch->save(); // surgeryEnded
			$this->RecoveryTime->AdvancedSearch->save(); // RecoveryTime
			$this->ShiftedTime->AdvancedSearch->save(); // ShiftedTime
			$this->Duration->AdvancedSearch->save(); // Duration
			$this->Surgeon->AdvancedSearch->save(); // Surgeon
			$this->Anaesthetist->AdvancedSearch->save(); // Anaesthetist
			$this->AsstSurgeon1->AdvancedSearch->save(); // AsstSurgeon1
			$this->AsstSurgeon2->AdvancedSearch->save(); // AsstSurgeon2
			$this->paediatric->AdvancedSearch->save(); // paediatric
			$this->ScrubNurse1->AdvancedSearch->save(); // ScrubNurse1
			$this->ScrubNurse2->AdvancedSearch->save(); // ScrubNurse2
			$this->FloorNurse->AdvancedSearch->save(); // FloorNurse
			$this->Technician->AdvancedSearch->save(); // Technician
			$this->HouseKeeping->AdvancedSearch->save(); // HouseKeeping
			$this->countsCheckedMops->AdvancedSearch->save(); // countsCheckedMops
			$this->gauze->AdvancedSearch->save(); // gauze
			$this->needles->AdvancedSearch->save(); // needles
			$this->bloodloss->AdvancedSearch->save(); // bloodloss
			$this->bloodtransfusion->AdvancedSearch->save(); // bloodtransfusion
			$this->implantsUsed->AdvancedSearch->save(); // implantsUsed
			$this->MaterialsForHPE->AdvancedSearch->save(); // MaterialsForHPE
			$this->status->AdvancedSearch->save(); // status
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->PatientSearch->AdvancedSearch->save(); // PatientSearch
			$this->Reception->AdvancedSearch->save(); // Reception
			$this->PatientID->AdvancedSearch->save(); // PatientID
			$this->PId->AdvancedSearch->save(); // PId
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (SEARCH_MULTI_VALUE_OPTION == 1)
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal <> "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 <> "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 <> "")
				$wrk = ($wrk <> "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == NULL_VALUE || $fldVal == NOT_NULL_VALUE)
			return $fldVal;
		$value = $fldVal;
		if ($fld->DataType == DATATYPE_BOOLEAN) {
			if ($fldVal <> "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal <> "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->PatID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->diagnosis, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->proposedSurgery, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->surgeryProcedure, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->typeOfAnaesthesia, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Surgeon, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Anaesthetist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AsstSurgeon1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AsstSurgeon2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->paediatric, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ScrubNurse1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ScrubNurse2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FloorNurse, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Technician, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HouseKeeping, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->countsCheckedMops, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->gauze, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->needles, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->bloodloss, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->bloodtransfusion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->implantsUsed, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaterialsForHPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientSearch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
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
		if ($this->id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mrnno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MobileNumber->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->profilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->diagnosis->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->proposedSurgery->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->surgeryProcedure->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->typeOfAnaesthesia->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RecievedTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AnaesthesiaStarted->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AnaesthesiaEnded->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->surgeryStarted->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->surgeryEnded->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RecoveryTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ShiftedTime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Duration->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Surgeon->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Anaesthetist->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AsstSurgeon1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AsstSurgeon2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->paediatric->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ScrubNurse1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ScrubNurse2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FloorNurse->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Technician->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HouseKeeping->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->countsCheckedMops->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->gauze->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->needles->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->bloodloss->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->bloodtransfusion->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->implantsUsed->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MaterialsForHPE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->status->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createdby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->createddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifiedby->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modifieddatetime->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientSearch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Reception->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PId->AdvancedSearch->issetSession())
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

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
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

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->id->AdvancedSearch->unsetSession();
		$this->PatID->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->mrnno->AdvancedSearch->unsetSession();
		$this->MobileNumber->AdvancedSearch->unsetSession();
		$this->Age->AdvancedSearch->unsetSession();
		$this->Gender->AdvancedSearch->unsetSession();
		$this->profilePic->AdvancedSearch->unsetSession();
		$this->diagnosis->AdvancedSearch->unsetSession();
		$this->proposedSurgery->AdvancedSearch->unsetSession();
		$this->surgeryProcedure->AdvancedSearch->unsetSession();
		$this->typeOfAnaesthesia->AdvancedSearch->unsetSession();
		$this->RecievedTime->AdvancedSearch->unsetSession();
		$this->AnaesthesiaStarted->AdvancedSearch->unsetSession();
		$this->AnaesthesiaEnded->AdvancedSearch->unsetSession();
		$this->surgeryStarted->AdvancedSearch->unsetSession();
		$this->surgeryEnded->AdvancedSearch->unsetSession();
		$this->RecoveryTime->AdvancedSearch->unsetSession();
		$this->ShiftedTime->AdvancedSearch->unsetSession();
		$this->Duration->AdvancedSearch->unsetSession();
		$this->Surgeon->AdvancedSearch->unsetSession();
		$this->Anaesthetist->AdvancedSearch->unsetSession();
		$this->AsstSurgeon1->AdvancedSearch->unsetSession();
		$this->AsstSurgeon2->AdvancedSearch->unsetSession();
		$this->paediatric->AdvancedSearch->unsetSession();
		$this->ScrubNurse1->AdvancedSearch->unsetSession();
		$this->ScrubNurse2->AdvancedSearch->unsetSession();
		$this->FloorNurse->AdvancedSearch->unsetSession();
		$this->Technician->AdvancedSearch->unsetSession();
		$this->HouseKeeping->AdvancedSearch->unsetSession();
		$this->countsCheckedMops->AdvancedSearch->unsetSession();
		$this->gauze->AdvancedSearch->unsetSession();
		$this->needles->AdvancedSearch->unsetSession();
		$this->bloodloss->AdvancedSearch->unsetSession();
		$this->bloodtransfusion->AdvancedSearch->unsetSession();
		$this->implantsUsed->AdvancedSearch->unsetSession();
		$this->MaterialsForHPE->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->PatientSearch->AdvancedSearch->unsetSession();
		$this->Reception->AdvancedSearch->unsetSession();
		$this->PatientID->AdvancedSearch->unsetSession();
		$this->PId->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->diagnosis->AdvancedSearch->load();
		$this->proposedSurgery->AdvancedSearch->load();
		$this->surgeryProcedure->AdvancedSearch->load();
		$this->typeOfAnaesthesia->AdvancedSearch->load();
		$this->RecievedTime->AdvancedSearch->load();
		$this->AnaesthesiaStarted->AdvancedSearch->load();
		$this->AnaesthesiaEnded->AdvancedSearch->load();
		$this->surgeryStarted->AdvancedSearch->load();
		$this->surgeryEnded->AdvancedSearch->load();
		$this->RecoveryTime->AdvancedSearch->load();
		$this->ShiftedTime->AdvancedSearch->load();
		$this->Duration->AdvancedSearch->load();
		$this->Surgeon->AdvancedSearch->load();
		$this->Anaesthetist->AdvancedSearch->load();
		$this->AsstSurgeon1->AdvancedSearch->load();
		$this->AsstSurgeon2->AdvancedSearch->load();
		$this->paediatric->AdvancedSearch->load();
		$this->ScrubNurse1->AdvancedSearch->load();
		$this->ScrubNurse2->AdvancedSearch->load();
		$this->FloorNurse->AdvancedSearch->load();
		$this->Technician->AdvancedSearch->load();
		$this->HouseKeeping->AdvancedSearch->load();
		$this->countsCheckedMops->AdvancedSearch->load();
		$this->gauze->AdvancedSearch->load();
		$this->needles->AdvancedSearch->load();
		$this->bloodloss->AdvancedSearch->load();
		$this->bloodtransfusion->AdvancedSearch->load();
		$this->implantsUsed->AdvancedSearch->load();
		$this->MaterialsForHPE->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->PatientSearch->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->PId->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->PatID); // PatID
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->mrnno); // mrnno
			$this->updateSort($this->MobileNumber); // MobileNumber
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->Gender); // Gender
			$this->updateSort($this->RecievedTime); // RecievedTime
			$this->updateSort($this->AnaesthesiaStarted); // AnaesthesiaStarted
			$this->updateSort($this->AnaesthesiaEnded); // AnaesthesiaEnded
			$this->updateSort($this->surgeryStarted); // surgeryStarted
			$this->updateSort($this->surgeryEnded); // surgeryEnded
			$this->updateSort($this->RecoveryTime); // RecoveryTime
			$this->updateSort($this->ShiftedTime); // ShiftedTime
			$this->updateSort($this->Duration); // Duration
			$this->updateSort($this->Surgeon); // Surgeon
			$this->updateSort($this->Anaesthetist); // Anaesthetist
			$this->updateSort($this->AsstSurgeon1); // AsstSurgeon1
			$this->updateSort($this->AsstSurgeon2); // AsstSurgeon2
			$this->updateSort($this->paediatric); // paediatric
			$this->updateSort($this->ScrubNurse1); // ScrubNurse1
			$this->updateSort($this->ScrubNurse2); // ScrubNurse2
			$this->updateSort($this->FloorNurse); // FloorNurse
			$this->updateSort($this->Technician); // Technician
			$this->updateSort($this->HouseKeeping); // HouseKeeping
			$this->updateSort($this->countsCheckedMops); // countsCheckedMops
			$this->updateSort($this->gauze); // gauze
			$this->updateSort($this->needles); // needles
			$this->updateSort($this->bloodloss); // bloodloss
			$this->updateSort($this->bloodtransfusion); // bloodtransfusion
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->Reception); // Reception
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->PId); // PId
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
				$this->id->setSort("DESC");
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->Reception->setSessionValue("");
				$this->mrnno->setSessionValue("");
				$this->PId->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->PatID->setSort("");
				$this->PatientName->setSort("");
				$this->mrnno->setSort("");
				$this->MobileNumber->setSort("");
				$this->Age->setSort("");
				$this->Gender->setSort("");
				$this->RecievedTime->setSort("");
				$this->AnaesthesiaStarted->setSort("");
				$this->AnaesthesiaEnded->setSort("");
				$this->surgeryStarted->setSort("");
				$this->surgeryEnded->setSort("");
				$this->RecoveryTime->setSort("");
				$this->ShiftedTime->setSort("");
				$this->Duration->setSort("");
				$this->Surgeon->setSort("");
				$this->Anaesthetist->setSort("");
				$this->AsstSurgeon1->setSort("");
				$this->AsstSurgeon2->setSort("");
				$this->paediatric->setSort("");
				$this->ScrubNurse1->setSort("");
				$this->ScrubNurse2->setSort("");
				$this->FloorNurse->setSort("");
				$this->Technician->setSort("");
				$this->HouseKeeping->setSort("");
				$this->countsCheckedMops->setSort("");
				$this->gauze->setSort("");
				$this->needles->setSort("");
				$this->bloodloss->setSort("");
				$this->bloodtransfusion->setSort("");
				$this->status->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->HospID->setSort("");
				$this->Reception->setSort("");
				$this->PatientID->setSort("");
				$this->PId->setSort("");
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
		$opt->Body = "<input type=\"checkbox\" name=\"key_m[]\" class=\"ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\">";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_ot_surgery_registerlistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_ot_surgery_registerlistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fpatient_ot_surgery_registerlist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_ot_surgery_registerlistsrch\">" . $Language->phrase("SearchLink") . "</button>";
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

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue(Get("x_id", Get("id", "")));
		if ($this->id->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->id->AdvancedSearch->setSearchOperator(Get("z_id", ""));

		// PatID
		if (!$this->isAddOrEdit())
			$this->PatID->AdvancedSearch->setSearchValue(Get("x_PatID", Get("PatID", "")));
		if ($this->PatID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatID->AdvancedSearch->setSearchOperator(Get("z_PatID", ""));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue(Get("x_PatientName", Get("PatientName", "")));
		if ($this->PatientName->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientName->AdvancedSearch->setSearchOperator(Get("z_PatientName", ""));

		// mrnno
		if (!$this->isAddOrEdit())
			$this->mrnno->AdvancedSearch->setSearchValue(Get("x_mrnno", Get("mrnno", "")));
		if ($this->mrnno->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->mrnno->AdvancedSearch->setSearchOperator(Get("z_mrnno", ""));

		// MobileNumber
		if (!$this->isAddOrEdit())
			$this->MobileNumber->AdvancedSearch->setSearchValue(Get("x_MobileNumber", Get("MobileNumber", "")));
		if ($this->MobileNumber->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MobileNumber->AdvancedSearch->setSearchOperator(Get("z_MobileNumber", ""));

		// Age
		if (!$this->isAddOrEdit())
			$this->Age->AdvancedSearch->setSearchValue(Get("x_Age", Get("Age", "")));
		if ($this->Age->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Age->AdvancedSearch->setSearchOperator(Get("z_Age", ""));

		// Gender
		if (!$this->isAddOrEdit())
			$this->Gender->AdvancedSearch->setSearchValue(Get("x_Gender", Get("Gender", "")));
		if ($this->Gender->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Gender->AdvancedSearch->setSearchOperator(Get("z_Gender", ""));

		// profilePic
		if (!$this->isAddOrEdit())
			$this->profilePic->AdvancedSearch->setSearchValue(Get("x_profilePic", Get("profilePic", "")));
		if ($this->profilePic->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->profilePic->AdvancedSearch->setSearchOperator(Get("z_profilePic", ""));

		// diagnosis
		if (!$this->isAddOrEdit())
			$this->diagnosis->AdvancedSearch->setSearchValue(Get("x_diagnosis", Get("diagnosis", "")));
		if ($this->diagnosis->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->diagnosis->AdvancedSearch->setSearchOperator(Get("z_diagnosis", ""));

		// proposedSurgery
		if (!$this->isAddOrEdit())
			$this->proposedSurgery->AdvancedSearch->setSearchValue(Get("x_proposedSurgery", Get("proposedSurgery", "")));
		if ($this->proposedSurgery->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->proposedSurgery->AdvancedSearch->setSearchOperator(Get("z_proposedSurgery", ""));

		// surgeryProcedure
		if (!$this->isAddOrEdit())
			$this->surgeryProcedure->AdvancedSearch->setSearchValue(Get("x_surgeryProcedure", Get("surgeryProcedure", "")));
		if ($this->surgeryProcedure->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->surgeryProcedure->AdvancedSearch->setSearchOperator(Get("z_surgeryProcedure", ""));

		// typeOfAnaesthesia
		if (!$this->isAddOrEdit())
			$this->typeOfAnaesthesia->AdvancedSearch->setSearchValue(Get("x_typeOfAnaesthesia", Get("typeOfAnaesthesia", "")));
		if ($this->typeOfAnaesthesia->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->typeOfAnaesthesia->AdvancedSearch->setSearchOperator(Get("z_typeOfAnaesthesia", ""));

		// RecievedTime
		if (!$this->isAddOrEdit())
			$this->RecievedTime->AdvancedSearch->setSearchValue(Get("x_RecievedTime", Get("RecievedTime", "")));
		if ($this->RecievedTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RecievedTime->AdvancedSearch->setSearchOperator(Get("z_RecievedTime", ""));

		// AnaesthesiaStarted
		if (!$this->isAddOrEdit())
			$this->AnaesthesiaStarted->AdvancedSearch->setSearchValue(Get("x_AnaesthesiaStarted", Get("AnaesthesiaStarted", "")));
		if ($this->AnaesthesiaStarted->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AnaesthesiaStarted->AdvancedSearch->setSearchOperator(Get("z_AnaesthesiaStarted", ""));

		// AnaesthesiaEnded
		if (!$this->isAddOrEdit())
			$this->AnaesthesiaEnded->AdvancedSearch->setSearchValue(Get("x_AnaesthesiaEnded", Get("AnaesthesiaEnded", "")));
		if ($this->AnaesthesiaEnded->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AnaesthesiaEnded->AdvancedSearch->setSearchOperator(Get("z_AnaesthesiaEnded", ""));

		// surgeryStarted
		if (!$this->isAddOrEdit())
			$this->surgeryStarted->AdvancedSearch->setSearchValue(Get("x_surgeryStarted", Get("surgeryStarted", "")));
		if ($this->surgeryStarted->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->surgeryStarted->AdvancedSearch->setSearchOperator(Get("z_surgeryStarted", ""));

		// surgeryEnded
		if (!$this->isAddOrEdit())
			$this->surgeryEnded->AdvancedSearch->setSearchValue(Get("x_surgeryEnded", Get("surgeryEnded", "")));
		if ($this->surgeryEnded->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->surgeryEnded->AdvancedSearch->setSearchOperator(Get("z_surgeryEnded", ""));

		// RecoveryTime
		if (!$this->isAddOrEdit())
			$this->RecoveryTime->AdvancedSearch->setSearchValue(Get("x_RecoveryTime", Get("RecoveryTime", "")));
		if ($this->RecoveryTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->RecoveryTime->AdvancedSearch->setSearchOperator(Get("z_RecoveryTime", ""));

		// ShiftedTime
		if (!$this->isAddOrEdit())
			$this->ShiftedTime->AdvancedSearch->setSearchValue(Get("x_ShiftedTime", Get("ShiftedTime", "")));
		if ($this->ShiftedTime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ShiftedTime->AdvancedSearch->setSearchOperator(Get("z_ShiftedTime", ""));

		// Duration
		if (!$this->isAddOrEdit())
			$this->Duration->AdvancedSearch->setSearchValue(Get("x_Duration", Get("Duration", "")));
		if ($this->Duration->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Duration->AdvancedSearch->setSearchOperator(Get("z_Duration", ""));

		// Surgeon
		if (!$this->isAddOrEdit())
			$this->Surgeon->AdvancedSearch->setSearchValue(Get("x_Surgeon", Get("Surgeon", "")));
		if ($this->Surgeon->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Surgeon->AdvancedSearch->setSearchOperator(Get("z_Surgeon", ""));

		// Anaesthetist
		if (!$this->isAddOrEdit())
			$this->Anaesthetist->AdvancedSearch->setSearchValue(Get("x_Anaesthetist", Get("Anaesthetist", "")));
		if ($this->Anaesthetist->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Anaesthetist->AdvancedSearch->setSearchOperator(Get("z_Anaesthetist", ""));

		// AsstSurgeon1
		if (!$this->isAddOrEdit())
			$this->AsstSurgeon1->AdvancedSearch->setSearchValue(Get("x_AsstSurgeon1", Get("AsstSurgeon1", "")));
		if ($this->AsstSurgeon1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AsstSurgeon1->AdvancedSearch->setSearchOperator(Get("z_AsstSurgeon1", ""));

		// AsstSurgeon2
		if (!$this->isAddOrEdit())
			$this->AsstSurgeon2->AdvancedSearch->setSearchValue(Get("x_AsstSurgeon2", Get("AsstSurgeon2", "")));
		if ($this->AsstSurgeon2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->AsstSurgeon2->AdvancedSearch->setSearchOperator(Get("z_AsstSurgeon2", ""));

		// paediatric
		if (!$this->isAddOrEdit())
			$this->paediatric->AdvancedSearch->setSearchValue(Get("x_paediatric", Get("paediatric", "")));
		if ($this->paediatric->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->paediatric->AdvancedSearch->setSearchOperator(Get("z_paediatric", ""));

		// ScrubNurse1
		if (!$this->isAddOrEdit())
			$this->ScrubNurse1->AdvancedSearch->setSearchValue(Get("x_ScrubNurse1", Get("ScrubNurse1", "")));
		if ($this->ScrubNurse1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ScrubNurse1->AdvancedSearch->setSearchOperator(Get("z_ScrubNurse1", ""));

		// ScrubNurse2
		if (!$this->isAddOrEdit())
			$this->ScrubNurse2->AdvancedSearch->setSearchValue(Get("x_ScrubNurse2", Get("ScrubNurse2", "")));
		if ($this->ScrubNurse2->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->ScrubNurse2->AdvancedSearch->setSearchOperator(Get("z_ScrubNurse2", ""));

		// FloorNurse
		if (!$this->isAddOrEdit())
			$this->FloorNurse->AdvancedSearch->setSearchValue(Get("x_FloorNurse", Get("FloorNurse", "")));
		if ($this->FloorNurse->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->FloorNurse->AdvancedSearch->setSearchOperator(Get("z_FloorNurse", ""));

		// Technician
		if (!$this->isAddOrEdit())
			$this->Technician->AdvancedSearch->setSearchValue(Get("x_Technician", Get("Technician", "")));
		if ($this->Technician->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Technician->AdvancedSearch->setSearchOperator(Get("z_Technician", ""));

		// HouseKeeping
		if (!$this->isAddOrEdit())
			$this->HouseKeeping->AdvancedSearch->setSearchValue(Get("x_HouseKeeping", Get("HouseKeeping", "")));
		if ($this->HouseKeeping->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HouseKeeping->AdvancedSearch->setSearchOperator(Get("z_HouseKeeping", ""));

		// countsCheckedMops
		if (!$this->isAddOrEdit())
			$this->countsCheckedMops->AdvancedSearch->setSearchValue(Get("x_countsCheckedMops", Get("countsCheckedMops", "")));
		if ($this->countsCheckedMops->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->countsCheckedMops->AdvancedSearch->setSearchOperator(Get("z_countsCheckedMops", ""));

		// gauze
		if (!$this->isAddOrEdit())
			$this->gauze->AdvancedSearch->setSearchValue(Get("x_gauze", Get("gauze", "")));
		if ($this->gauze->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->gauze->AdvancedSearch->setSearchOperator(Get("z_gauze", ""));

		// needles
		if (!$this->isAddOrEdit())
			$this->needles->AdvancedSearch->setSearchValue(Get("x_needles", Get("needles", "")));
		if ($this->needles->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->needles->AdvancedSearch->setSearchOperator(Get("z_needles", ""));

		// bloodloss
		if (!$this->isAddOrEdit())
			$this->bloodloss->AdvancedSearch->setSearchValue(Get("x_bloodloss", Get("bloodloss", "")));
		if ($this->bloodloss->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->bloodloss->AdvancedSearch->setSearchOperator(Get("z_bloodloss", ""));

		// bloodtransfusion
		if (!$this->isAddOrEdit())
			$this->bloodtransfusion->AdvancedSearch->setSearchValue(Get("x_bloodtransfusion", Get("bloodtransfusion", "")));
		if ($this->bloodtransfusion->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->bloodtransfusion->AdvancedSearch->setSearchOperator(Get("z_bloodtransfusion", ""));

		// implantsUsed
		if (!$this->isAddOrEdit())
			$this->implantsUsed->AdvancedSearch->setSearchValue(Get("x_implantsUsed", Get("implantsUsed", "")));
		if ($this->implantsUsed->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->implantsUsed->AdvancedSearch->setSearchOperator(Get("z_implantsUsed", ""));

		// MaterialsForHPE
		if (!$this->isAddOrEdit())
			$this->MaterialsForHPE->AdvancedSearch->setSearchValue(Get("x_MaterialsForHPE", Get("MaterialsForHPE", "")));
		if ($this->MaterialsForHPE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MaterialsForHPE->AdvancedSearch->setSearchOperator(Get("z_MaterialsForHPE", ""));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue(Get("x_status", Get("status", "")));
		if ($this->status->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->status->AdvancedSearch->setSearchOperator(Get("z_status", ""));

		// createdby
		if (!$this->isAddOrEdit())
			$this->createdby->AdvancedSearch->setSearchValue(Get("x_createdby", Get("createdby", "")));
		if ($this->createdby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createdby->AdvancedSearch->setSearchOperator(Get("z_createdby", ""));

		// createddatetime
		if (!$this->isAddOrEdit())
			$this->createddatetime->AdvancedSearch->setSearchValue(Get("x_createddatetime", Get("createddatetime", "")));
		if ($this->createddatetime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createddatetime->AdvancedSearch->setSearchOperator(Get("z_createddatetime", ""));
		$this->createddatetime->AdvancedSearch->setSearchCondition(Get("v_createddatetime", ""));
		$this->createddatetime->AdvancedSearch->setSearchValue2(Get("y_createddatetime", ""));
		if ($this->createddatetime->AdvancedSearch->SearchValue2 <> "" && $this->Command == "")
			$this->Command = "search";
		$this->createddatetime->AdvancedSearch->setSearchOperator2(Get("w_createddatetime", ""));

		// modifiedby
		if (!$this->isAddOrEdit())
			$this->modifiedby->AdvancedSearch->setSearchValue(Get("x_modifiedby", Get("modifiedby", "")));
		if ($this->modifiedby->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->modifiedby->AdvancedSearch->setSearchOperator(Get("z_modifiedby", ""));

		// modifieddatetime
		if (!$this->isAddOrEdit())
			$this->modifieddatetime->AdvancedSearch->setSearchValue(Get("x_modifieddatetime", Get("modifieddatetime", "")));
		if ($this->modifieddatetime->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->modifieddatetime->AdvancedSearch->setSearchOperator(Get("z_modifieddatetime", ""));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue(Get("x_HospID", Get("HospID", "")));
		if ($this->HospID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->HospID->AdvancedSearch->setSearchOperator(Get("z_HospID", ""));

		// PatientSearch
		if (!$this->isAddOrEdit())
			$this->PatientSearch->AdvancedSearch->setSearchValue(Get("x_PatientSearch", Get("PatientSearch", "")));
		if ($this->PatientSearch->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientSearch->AdvancedSearch->setSearchOperator(Get("z_PatientSearch", ""));

		// Reception
		if (!$this->isAddOrEdit())
			$this->Reception->AdvancedSearch->setSearchValue(Get("x_Reception", Get("Reception", "")));
		if ($this->Reception->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->Reception->AdvancedSearch->setSearchOperator(Get("z_Reception", ""));

		// PatientID
		if (!$this->isAddOrEdit())
			$this->PatientID->AdvancedSearch->setSearchValue(Get("x_PatientID", Get("PatientID", "")));
		if ($this->PatientID->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PatientID->AdvancedSearch->setSearchOperator(Get("z_PatientID", ""));

		// PId
		if (!$this->isAddOrEdit())
			$this->PId->AdvancedSearch->setSearchValue(Get("x_PId", Get("PId", "")));
		if ($this->PId->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PId->AdvancedSearch->setSearchOperator(Get("z_PId", ""));
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
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->diagnosis->setDbValue($row['diagnosis']);
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
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PId->setDbValue($row['PId']);
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
		$row['diagnosis'] = NULL;
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
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['HospID'] = NULL;
		$row['PatientSearch'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientID'] = NULL;
		$row['PId'] = NULL;
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
		// PatID
		// PatientName
		// mrnno
		// MobileNumber
		// Age
		// Gender
		// profilePic
		// diagnosis
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
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// PatientSearch
		// Reception
		// PatientID
		// PId

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
			$this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 17);
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

			// Anaesthetist
			$curVal = strval($this->Anaesthetist->CurrentValue);
			if ($curVal <> "") {
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
				if ($this->Anaesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anaesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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
			$curVal = strval($this->AsstSurgeon1->CurrentValue);
			if ($curVal <> "") {
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
				if ($this->AsstSurgeon1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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
			$curVal = strval($this->AsstSurgeon2->CurrentValue);
			if ($curVal <> "") {
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
				if ($this->AsstSurgeon2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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
			$curVal = strval($this->paediatric->CurrentValue);
			if ($curVal <> "") {
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
				if ($this->paediatric->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->paediatric->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// RecievedTime
			$this->RecievedTime->EditAttrs["class"] = "form-control";
			$this->RecievedTime->EditCustomAttributes = "";
			$this->RecievedTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->RecievedTime->AdvancedSearch->SearchValue, 11), 11));
			$this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaStarted->EditCustomAttributes = "";
			$this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AnaesthesiaStarted->AdvancedSearch->SearchValue, 11), 11));
			$this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaEnded->EditCustomAttributes = "";
			$this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AnaesthesiaEnded->AdvancedSearch->SearchValue, 11), 11));
			$this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

			// surgeryStarted
			$this->surgeryStarted->EditAttrs["class"] = "form-control";
			$this->surgeryStarted->EditCustomAttributes = "";
			$this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->surgeryStarted->AdvancedSearch->SearchValue, 11), 11));
			$this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

			// surgeryEnded
			$this->surgeryEnded->EditAttrs["class"] = "form-control";
			$this->surgeryEnded->EditCustomAttributes = "";
			$this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->surgeryEnded->AdvancedSearch->SearchValue, 17), 17));
			$this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

			// RecoveryTime
			$this->RecoveryTime->EditAttrs["class"] = "form-control";
			$this->RecoveryTime->EditCustomAttributes = "";
			$this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->RecoveryTime->AdvancedSearch->SearchValue, 11), 11));
			$this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

			// ShiftedTime
			$this->ShiftedTime->EditAttrs["class"] = "form-control";
			$this->ShiftedTime->EditCustomAttributes = "";
			$this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ShiftedTime->AdvancedSearch->SearchValue, 11), 11));
			$this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

			// Duration
			$this->Duration->EditAttrs["class"] = "form-control";
			$this->Duration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Duration->AdvancedSearch->SearchValue = HtmlDecode($this->Duration->AdvancedSearch->SearchValue);
			$this->Duration->EditValue = HtmlEncode($this->Duration->AdvancedSearch->SearchValue);
			$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon1->EditCustomAttributes = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon2->EditCustomAttributes = "";

			// paediatric
			$this->paediatric->EditAttrs["class"] = "form-control";
			$this->paediatric->EditCustomAttributes = "";

			// ScrubNurse1
			$this->ScrubNurse1->EditAttrs["class"] = "form-control";
			$this->ScrubNurse1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ScrubNurse1->AdvancedSearch->SearchValue = HtmlDecode($this->ScrubNurse1->AdvancedSearch->SearchValue);
			$this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->AdvancedSearch->SearchValue);
			$this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

			// ScrubNurse2
			$this->ScrubNurse2->EditAttrs["class"] = "form-control";
			$this->ScrubNurse2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ScrubNurse2->AdvancedSearch->SearchValue = HtmlDecode($this->ScrubNurse2->AdvancedSearch->SearchValue);
			$this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->AdvancedSearch->SearchValue);
			$this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

			// FloorNurse
			$this->FloorNurse->EditAttrs["class"] = "form-control";
			$this->FloorNurse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FloorNurse->AdvancedSearch->SearchValue = HtmlDecode($this->FloorNurse->AdvancedSearch->SearchValue);
			$this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->AdvancedSearch->SearchValue);
			$this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

			// Technician
			$this->Technician->EditAttrs["class"] = "form-control";
			$this->Technician->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Technician->AdvancedSearch->SearchValue = HtmlDecode($this->Technician->AdvancedSearch->SearchValue);
			$this->Technician->EditValue = HtmlEncode($this->Technician->AdvancedSearch->SearchValue);
			$this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

			// HouseKeeping
			$this->HouseKeeping->EditAttrs["class"] = "form-control";
			$this->HouseKeeping->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HouseKeeping->AdvancedSearch->SearchValue = HtmlDecode($this->HouseKeeping->AdvancedSearch->SearchValue);
			$this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->AdvancedSearch->SearchValue);
			$this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

			// countsCheckedMops
			$this->countsCheckedMops->EditAttrs["class"] = "form-control";
			$this->countsCheckedMops->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->countsCheckedMops->AdvancedSearch->SearchValue = HtmlDecode($this->countsCheckedMops->AdvancedSearch->SearchValue);
			$this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->AdvancedSearch->SearchValue);
			$this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

			// gauze
			$this->gauze->EditAttrs["class"] = "form-control";
			$this->gauze->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->gauze->AdvancedSearch->SearchValue = HtmlDecode($this->gauze->AdvancedSearch->SearchValue);
			$this->gauze->EditValue = HtmlEncode($this->gauze->AdvancedSearch->SearchValue);
			$this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

			// needles
			$this->needles->EditAttrs["class"] = "form-control";
			$this->needles->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->needles->AdvancedSearch->SearchValue = HtmlDecode($this->needles->AdvancedSearch->SearchValue);
			$this->needles->EditValue = HtmlEncode($this->needles->AdvancedSearch->SearchValue);
			$this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

			// bloodloss
			$this->bloodloss->EditAttrs["class"] = "form-control";
			$this->bloodloss->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->bloodloss->AdvancedSearch->SearchValue = HtmlDecode($this->bloodloss->AdvancedSearch->SearchValue);
			$this->bloodloss->EditValue = HtmlEncode($this->bloodloss->AdvancedSearch->SearchValue);
			$this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

			// bloodtransfusion
			$this->bloodtransfusion->EditAttrs["class"] = "form-control";
			$this->bloodtransfusion->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->bloodtransfusion->AdvancedSearch->SearchValue = HtmlDecode($this->bloodtransfusion->AdvancedSearch->SearchValue);
			$this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->AdvancedSearch->SearchValue);
			$this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->AdvancedSearch->SearchValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			$this->PId->EditValue = HtmlEncode($this->PId->AdvancedSearch->SearchValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->diagnosis->AdvancedSearch->load();
		$this->proposedSurgery->AdvancedSearch->load();
		$this->surgeryProcedure->AdvancedSearch->load();
		$this->typeOfAnaesthesia->AdvancedSearch->load();
		$this->RecievedTime->AdvancedSearch->load();
		$this->AnaesthesiaStarted->AdvancedSearch->load();
		$this->AnaesthesiaEnded->AdvancedSearch->load();
		$this->surgeryStarted->AdvancedSearch->load();
		$this->surgeryEnded->AdvancedSearch->load();
		$this->RecoveryTime->AdvancedSearch->load();
		$this->ShiftedTime->AdvancedSearch->load();
		$this->Duration->AdvancedSearch->load();
		$this->Surgeon->AdvancedSearch->load();
		$this->Anaesthetist->AdvancedSearch->load();
		$this->AsstSurgeon1->AdvancedSearch->load();
		$this->AsstSurgeon2->AdvancedSearch->load();
		$this->paediatric->AdvancedSearch->load();
		$this->ScrubNurse1->AdvancedSearch->load();
		$this->ScrubNurse2->AdvancedSearch->load();
		$this->FloorNurse->AdvancedSearch->load();
		$this->Technician->AdvancedSearch->load();
		$this->HouseKeeping->AdvancedSearch->load();
		$this->countsCheckedMops->AdvancedSearch->load();
		$this->gauze->AdvancedSearch->load();
		$this->needles->AdvancedSearch->load();
		$this->bloodloss->AdvancedSearch->load();
		$this->bloodtransfusion->AdvancedSearch->load();
		$this->implantsUsed->AdvancedSearch->load();
		$this->MaterialsForHPE->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->PatientSearch->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->PId->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fpatient_ot_surgery_registerlist,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fpatient_ot_surgery_registerlist,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fpatient_ot_surgery_registerlist,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
		$item->Body = "<button id=\"emf_patient_ot_surgery_register\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_patient_ot_surgery_register',hdr:ew.language.phrase('ExportToEmailText'),f:document.fpatient_ot_surgery_registerlist,sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
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

		// Export master record
		if (EXPORT_MASTER_RECORD && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			if (!isset($ip_admission))
				$ip_admission = new ip_admission();
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || EXPORT_MASTER_RECORD_FOR_CSV) {
					$doc->Table = &$ip_admission;
					$ip_admission->exportDocument($doc, $rsmaster);
					$doc->exportEmptyRow();
					$doc->Table = &$this;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsmaster->close();
			}
		}
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->Reception->setQueryStringValue(Get("fk_id"));
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($this->Reception->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_mrnNo") !== NULL) {
					$this->mrnno->setQueryStringValue(Get("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_patient_id") !== NULL) {
					$this->PId->setQueryStringValue(Get("fk_patient_id"));
					$this->PId->setSessionValue($this->PId->QueryStringValue);
					if (!is_numeric($this->PId->QueryStringValue))
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->Reception->setFormValue(Post("fk_id"));
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($this->Reception->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_mrnNo") !== NULL) {
					$this->mrnno->setFormValue(Post("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_patient_id") !== NULL) {
					$this->PId->setFormValue(Post("fk_patient_id"));
					$this->PId->setSessionValue($this->PId->FormValue);
					if (!is_numeric($this->PId->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Update URL
			$this->AddUrl = $this->addMasterUrl($this->AddUrl);
			$this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
			$this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
			$this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);
			$this->CancelUrl = $this->addMasterUrl($this->CancelUrl);

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "ip_admission") {
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
							$row[3] = FormatNumber($row[3], 0, -2, -2, -2);
							$row['df3'] = $row[3];
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
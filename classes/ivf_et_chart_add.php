<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_et_chart_add extends ivf_et_chart
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_et_chart';

	// Page object name
	public $PageObjName = "ivf_et_chart_add";

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

		// Table object (ivf_et_chart)
		if (!isset($GLOBALS["ivf_et_chart"]) || get_class($GLOBALS["ivf_et_chart"]) == PROJECT_NAMESPACE . "ivf_et_chart") {
			$GLOBALS["ivf_et_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_et_chart"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_et_chart');

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
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $EXPORT, $ivf_et_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
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
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
					if ($pageName == "ivf_et_chartview.php")
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
					$this->terminate(GetUrl("ivf_et_chartlist.php"));
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
		$this->ProcedureRecord->setVisibility();
		$this->Medicationsadvised->setVisibility();
		$this->PostProcedureInstructions->setVisibility();
		$this->PregnancyTestingWithSerumBetaHcG->setVisibility();
		$this->ReviewDate->setVisibility();
		$this->ReviewDoctor->setVisibility();
		$this->TemplateProcedureRecord->setVisibility();
		$this->TemplateMedicationsadvised->setVisibility();
		$this->TemplatePostProcedureInstructions->setVisibility();
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
					$this->terminate("ivf_et_chartlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "ivf_et_chartlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "ivf_et_chartview.php")
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
		$this->Consultant->CurrentValue = NULL;
		$this->Consultant->OldValue = $this->Consultant->CurrentValue;
		$this->InseminatinTechnique->CurrentValue = NULL;
		$this->InseminatinTechnique->OldValue = $this->InseminatinTechnique->CurrentValue;
		$this->IndicationForART->CurrentValue = NULL;
		$this->IndicationForART->OldValue = $this->IndicationForART->CurrentValue;
		$this->PreTreatment->CurrentValue = NULL;
		$this->PreTreatment->OldValue = $this->PreTreatment->CurrentValue;
		$this->Hysteroscopy->CurrentValue = NULL;
		$this->Hysteroscopy->OldValue = $this->Hysteroscopy->CurrentValue;
		$this->EndometrialScratching->CurrentValue = NULL;
		$this->EndometrialScratching->OldValue = $this->EndometrialScratching->CurrentValue;
		$this->TrialCannulation->CurrentValue = NULL;
		$this->TrialCannulation->OldValue = $this->TrialCannulation->CurrentValue;
		$this->CYCLETYPE->CurrentValue = NULL;
		$this->CYCLETYPE->OldValue = $this->CYCLETYPE->CurrentValue;
		$this->HRTCYCLE->CurrentValue = NULL;
		$this->HRTCYCLE->OldValue = $this->HRTCYCLE->CurrentValue;
		$this->OralEstrogenDosage->CurrentValue = NULL;
		$this->OralEstrogenDosage->OldValue = $this->OralEstrogenDosage->CurrentValue;
		$this->VaginalEstrogen->CurrentValue = NULL;
		$this->VaginalEstrogen->OldValue = $this->VaginalEstrogen->CurrentValue;
		$this->GCSF->CurrentValue = NULL;
		$this->GCSF->OldValue = $this->GCSF->CurrentValue;
		$this->ActivatedPRP->CurrentValue = NULL;
		$this->ActivatedPRP->OldValue = $this->ActivatedPRP->CurrentValue;
		$this->ERA->CurrentValue = NULL;
		$this->ERA->OldValue = $this->ERA->CurrentValue;
		$this->UCLcm->CurrentValue = NULL;
		$this->UCLcm->OldValue = $this->UCLcm->CurrentValue;
		$this->DATEOFSTART->CurrentValue = NULL;
		$this->DATEOFSTART->OldValue = $this->DATEOFSTART->CurrentValue;
		$this->DATEOFEMBRYOTRANSFER->CurrentValue = NULL;
		$this->DATEOFEMBRYOTRANSFER->OldValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
		$this->DAYOFEMBRYOTRANSFER->CurrentValue = NULL;
		$this->DAYOFEMBRYOTRANSFER->OldValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
		$this->NOOFEMBRYOSTHAWED->CurrentValue = NULL;
		$this->NOOFEMBRYOSTHAWED->OldValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
		$this->NOOFEMBRYOSTRANSFERRED->CurrentValue = NULL;
		$this->NOOFEMBRYOSTRANSFERRED->OldValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
		$this->DAYOFEMBRYOS->CurrentValue = NULL;
		$this->DAYOFEMBRYOS->OldValue = $this->DAYOFEMBRYOS->CurrentValue;
		$this->CRYOPRESERVEDEMBRYOS->CurrentValue = NULL;
		$this->CRYOPRESERVEDEMBRYOS->OldValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
		$this->Code1->CurrentValue = NULL;
		$this->Code1->OldValue = $this->Code1->CurrentValue;
		$this->Code2->CurrentValue = NULL;
		$this->Code2->OldValue = $this->Code2->CurrentValue;
		$this->CellStage1->CurrentValue = NULL;
		$this->CellStage1->OldValue = $this->CellStage1->CurrentValue;
		$this->CellStage2->CurrentValue = NULL;
		$this->CellStage2->OldValue = $this->CellStage2->CurrentValue;
		$this->Grade1->CurrentValue = NULL;
		$this->Grade1->OldValue = $this->Grade1->CurrentValue;
		$this->Grade2->CurrentValue = NULL;
		$this->Grade2->OldValue = $this->Grade2->CurrentValue;
		$this->ProcedureRecord->CurrentValue = NULL;
		$this->ProcedureRecord->OldValue = $this->ProcedureRecord->CurrentValue;
		$this->Medicationsadvised->CurrentValue = NULL;
		$this->Medicationsadvised->OldValue = $this->Medicationsadvised->CurrentValue;
		$this->PostProcedureInstructions->CurrentValue = NULL;
		$this->PostProcedureInstructions->OldValue = $this->PostProcedureInstructions->CurrentValue;
		$this->PregnancyTestingWithSerumBetaHcG->CurrentValue = NULL;
		$this->PregnancyTestingWithSerumBetaHcG->OldValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
		$this->ReviewDate->CurrentValue = NULL;
		$this->ReviewDate->OldValue = $this->ReviewDate->CurrentValue;
		$this->ReviewDoctor->CurrentValue = NULL;
		$this->ReviewDoctor->OldValue = $this->ReviewDoctor->CurrentValue;
		$this->TemplateProcedureRecord->CurrentValue = NULL;
		$this->TemplateProcedureRecord->OldValue = $this->TemplateProcedureRecord->CurrentValue;
		$this->TemplateMedicationsadvised->CurrentValue = NULL;
		$this->TemplateMedicationsadvised->OldValue = $this->TemplateMedicationsadvised->CurrentValue;
		$this->TemplatePostProcedureInstructions->CurrentValue = NULL;
		$this->TemplatePostProcedureInstructions->OldValue = $this->TemplatePostProcedureInstructions->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
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

		// Check field name 'Consultant' first before field var 'x_Consultant'
		$val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
		if (!$this->Consultant->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Consultant->Visible = FALSE; // Disable update for API request
			else
				$this->Consultant->setFormValue($val);
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

		// Check field name 'PreTreatment' first before field var 'x_PreTreatment'
		$val = $CurrentForm->hasValue("PreTreatment") ? $CurrentForm->getValue("PreTreatment") : $CurrentForm->getValue("x_PreTreatment");
		if (!$this->PreTreatment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PreTreatment->Visible = FALSE; // Disable update for API request
			else
				$this->PreTreatment->setFormValue($val);
		}

		// Check field name 'Hysteroscopy' first before field var 'x_Hysteroscopy'
		$val = $CurrentForm->hasValue("Hysteroscopy") ? $CurrentForm->getValue("Hysteroscopy") : $CurrentForm->getValue("x_Hysteroscopy");
		if (!$this->Hysteroscopy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Hysteroscopy->Visible = FALSE; // Disable update for API request
			else
				$this->Hysteroscopy->setFormValue($val);
		}

		// Check field name 'EndometrialScratching' first before field var 'x_EndometrialScratching'
		$val = $CurrentForm->hasValue("EndometrialScratching") ? $CurrentForm->getValue("EndometrialScratching") : $CurrentForm->getValue("x_EndometrialScratching");
		if (!$this->EndometrialScratching->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EndometrialScratching->Visible = FALSE; // Disable update for API request
			else
				$this->EndometrialScratching->setFormValue($val);
		}

		// Check field name 'TrialCannulation' first before field var 'x_TrialCannulation'
		$val = $CurrentForm->hasValue("TrialCannulation") ? $CurrentForm->getValue("TrialCannulation") : $CurrentForm->getValue("x_TrialCannulation");
		if (!$this->TrialCannulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TrialCannulation->Visible = FALSE; // Disable update for API request
			else
				$this->TrialCannulation->setFormValue($val);
		}

		// Check field name 'CYCLETYPE' first before field var 'x_CYCLETYPE'
		$val = $CurrentForm->hasValue("CYCLETYPE") ? $CurrentForm->getValue("CYCLETYPE") : $CurrentForm->getValue("x_CYCLETYPE");
		if (!$this->CYCLETYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CYCLETYPE->Visible = FALSE; // Disable update for API request
			else
				$this->CYCLETYPE->setFormValue($val);
		}

		// Check field name 'HRTCYCLE' first before field var 'x_HRTCYCLE'
		$val = $CurrentForm->hasValue("HRTCYCLE") ? $CurrentForm->getValue("HRTCYCLE") : $CurrentForm->getValue("x_HRTCYCLE");
		if (!$this->HRTCYCLE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HRTCYCLE->Visible = FALSE; // Disable update for API request
			else
				$this->HRTCYCLE->setFormValue($val);
		}

		// Check field name 'OralEstrogenDosage' first before field var 'x_OralEstrogenDosage'
		$val = $CurrentForm->hasValue("OralEstrogenDosage") ? $CurrentForm->getValue("OralEstrogenDosage") : $CurrentForm->getValue("x_OralEstrogenDosage");
		if (!$this->OralEstrogenDosage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OralEstrogenDosage->Visible = FALSE; // Disable update for API request
			else
				$this->OralEstrogenDosage->setFormValue($val);
		}

		// Check field name 'VaginalEstrogen' first before field var 'x_VaginalEstrogen'
		$val = $CurrentForm->hasValue("VaginalEstrogen") ? $CurrentForm->getValue("VaginalEstrogen") : $CurrentForm->getValue("x_VaginalEstrogen");
		if (!$this->VaginalEstrogen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VaginalEstrogen->Visible = FALSE; // Disable update for API request
			else
				$this->VaginalEstrogen->setFormValue($val);
		}

		// Check field name 'GCSF' first before field var 'x_GCSF'
		$val = $CurrentForm->hasValue("GCSF") ? $CurrentForm->getValue("GCSF") : $CurrentForm->getValue("x_GCSF");
		if (!$this->GCSF->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GCSF->Visible = FALSE; // Disable update for API request
			else
				$this->GCSF->setFormValue($val);
		}

		// Check field name 'ActivatedPRP' first before field var 'x_ActivatedPRP'
		$val = $CurrentForm->hasValue("ActivatedPRP") ? $CurrentForm->getValue("ActivatedPRP") : $CurrentForm->getValue("x_ActivatedPRP");
		if (!$this->ActivatedPRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ActivatedPRP->Visible = FALSE; // Disable update for API request
			else
				$this->ActivatedPRP->setFormValue($val);
		}

		// Check field name 'ERA' first before field var 'x_ERA'
		$val = $CurrentForm->hasValue("ERA") ? $CurrentForm->getValue("ERA") : $CurrentForm->getValue("x_ERA");
		if (!$this->ERA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ERA->Visible = FALSE; // Disable update for API request
			else
				$this->ERA->setFormValue($val);
		}

		// Check field name 'UCLcm' first before field var 'x_UCLcm'
		$val = $CurrentForm->hasValue("UCLcm") ? $CurrentForm->getValue("UCLcm") : $CurrentForm->getValue("x_UCLcm");
		if (!$this->UCLcm->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UCLcm->Visible = FALSE; // Disable update for API request
			else
				$this->UCLcm->setFormValue($val);
		}

		// Check field name 'DATEOFSTART' first before field var 'x_DATEOFSTART'
		$val = $CurrentForm->hasValue("DATEOFSTART") ? $CurrentForm->getValue("DATEOFSTART") : $CurrentForm->getValue("x_DATEOFSTART");
		if (!$this->DATEOFSTART->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DATEOFSTART->Visible = FALSE; // Disable update for API request
			else
				$this->DATEOFSTART->setFormValue($val);
			$this->DATEOFSTART->CurrentValue = UnFormatDateTime($this->DATEOFSTART->CurrentValue, 11);
		}

		// Check field name 'DATEOFEMBRYOTRANSFER' first before field var 'x_DATEOFEMBRYOTRANSFER'
		$val = $CurrentForm->hasValue("DATEOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DATEOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DATEOFEMBRYOTRANSFER");
		if (!$this->DATEOFEMBRYOTRANSFER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DATEOFEMBRYOTRANSFER->Visible = FALSE; // Disable update for API request
			else
				$this->DATEOFEMBRYOTRANSFER->setFormValue($val);
			$this->DATEOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11);
		}

		// Check field name 'DAYOFEMBRYOTRANSFER' first before field var 'x_DAYOFEMBRYOTRANSFER'
		$val = $CurrentForm->hasValue("DAYOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DAYOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DAYOFEMBRYOTRANSFER");
		if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DAYOFEMBRYOTRANSFER->Visible = FALSE; // Disable update for API request
			else
				$this->DAYOFEMBRYOTRANSFER->setFormValue($val);
		}

		// Check field name 'NOOFEMBRYOSTHAWED' first before field var 'x_NOOFEMBRYOSTHAWED'
		$val = $CurrentForm->hasValue("NOOFEMBRYOSTHAWED") ? $CurrentForm->getValue("NOOFEMBRYOSTHAWED") : $CurrentForm->getValue("x_NOOFEMBRYOSTHAWED");
		if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NOOFEMBRYOSTHAWED->Visible = FALSE; // Disable update for API request
			else
				$this->NOOFEMBRYOSTHAWED->setFormValue($val);
		}

		// Check field name 'NOOFEMBRYOSTRANSFERRED' first before field var 'x_NOOFEMBRYOSTRANSFERRED'
		$val = $CurrentForm->hasValue("NOOFEMBRYOSTRANSFERRED") ? $CurrentForm->getValue("NOOFEMBRYOSTRANSFERRED") : $CurrentForm->getValue("x_NOOFEMBRYOSTRANSFERRED");
		if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NOOFEMBRYOSTRANSFERRED->Visible = FALSE; // Disable update for API request
			else
				$this->NOOFEMBRYOSTRANSFERRED->setFormValue($val);
		}

		// Check field name 'DAYOFEMBRYOS' first before field var 'x_DAYOFEMBRYOS'
		$val = $CurrentForm->hasValue("DAYOFEMBRYOS") ? $CurrentForm->getValue("DAYOFEMBRYOS") : $CurrentForm->getValue("x_DAYOFEMBRYOS");
		if (!$this->DAYOFEMBRYOS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DAYOFEMBRYOS->Visible = FALSE; // Disable update for API request
			else
				$this->DAYOFEMBRYOS->setFormValue($val);
		}

		// Check field name 'CRYOPRESERVEDEMBRYOS' first before field var 'x_CRYOPRESERVEDEMBRYOS'
		$val = $CurrentForm->hasValue("CRYOPRESERVEDEMBRYOS") ? $CurrentForm->getValue("CRYOPRESERVEDEMBRYOS") : $CurrentForm->getValue("x_CRYOPRESERVEDEMBRYOS");
		if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CRYOPRESERVEDEMBRYOS->Visible = FALSE; // Disable update for API request
			else
				$this->CRYOPRESERVEDEMBRYOS->setFormValue($val);
		}

		// Check field name 'Code1' first before field var 'x_Code1'
		$val = $CurrentForm->hasValue("Code1") ? $CurrentForm->getValue("Code1") : $CurrentForm->getValue("x_Code1");
		if (!$this->Code1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code1->Visible = FALSE; // Disable update for API request
			else
				$this->Code1->setFormValue($val);
		}

		// Check field name 'Code2' first before field var 'x_Code2'
		$val = $CurrentForm->hasValue("Code2") ? $CurrentForm->getValue("Code2") : $CurrentForm->getValue("x_Code2");
		if (!$this->Code2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code2->Visible = FALSE; // Disable update for API request
			else
				$this->Code2->setFormValue($val);
		}

		// Check field name 'CellStage1' first before field var 'x_CellStage1'
		$val = $CurrentForm->hasValue("CellStage1") ? $CurrentForm->getValue("CellStage1") : $CurrentForm->getValue("x_CellStage1");
		if (!$this->CellStage1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage1->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage1->setFormValue($val);
		}

		// Check field name 'CellStage2' first before field var 'x_CellStage2'
		$val = $CurrentForm->hasValue("CellStage2") ? $CurrentForm->getValue("CellStage2") : $CurrentForm->getValue("x_CellStage2");
		if (!$this->CellStage2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CellStage2->Visible = FALSE; // Disable update for API request
			else
				$this->CellStage2->setFormValue($val);
		}

		// Check field name 'Grade1' first before field var 'x_Grade1'
		$val = $CurrentForm->hasValue("Grade1") ? $CurrentForm->getValue("Grade1") : $CurrentForm->getValue("x_Grade1");
		if (!$this->Grade1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade1->Visible = FALSE; // Disable update for API request
			else
				$this->Grade1->setFormValue($val);
		}

		// Check field name 'Grade2' first before field var 'x_Grade2'
		$val = $CurrentForm->hasValue("Grade2") ? $CurrentForm->getValue("Grade2") : $CurrentForm->getValue("x_Grade2");
		if (!$this->Grade2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade2->Visible = FALSE; // Disable update for API request
			else
				$this->Grade2->setFormValue($val);
		}

		// Check field name 'ProcedureRecord' first before field var 'x_ProcedureRecord'
		$val = $CurrentForm->hasValue("ProcedureRecord") ? $CurrentForm->getValue("ProcedureRecord") : $CurrentForm->getValue("x_ProcedureRecord");
		if (!$this->ProcedureRecord->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureRecord->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureRecord->setFormValue($val);
		}

		// Check field name 'Medicationsadvised' first before field var 'x_Medicationsadvised'
		$val = $CurrentForm->hasValue("Medicationsadvised") ? $CurrentForm->getValue("Medicationsadvised") : $CurrentForm->getValue("x_Medicationsadvised");
		if (!$this->Medicationsadvised->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Medicationsadvised->Visible = FALSE; // Disable update for API request
			else
				$this->Medicationsadvised->setFormValue($val);
		}

		// Check field name 'PostProcedureInstructions' first before field var 'x_PostProcedureInstructions'
		$val = $CurrentForm->hasValue("PostProcedureInstructions") ? $CurrentForm->getValue("PostProcedureInstructions") : $CurrentForm->getValue("x_PostProcedureInstructions");
		if (!$this->PostProcedureInstructions->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PostProcedureInstructions->Visible = FALSE; // Disable update for API request
			else
				$this->PostProcedureInstructions->setFormValue($val);
		}

		// Check field name 'PregnancyTestingWithSerumBetaHcG' first before field var 'x_PregnancyTestingWithSerumBetaHcG'
		$val = $CurrentForm->hasValue("PregnancyTestingWithSerumBetaHcG") ? $CurrentForm->getValue("PregnancyTestingWithSerumBetaHcG") : $CurrentForm->getValue("x_PregnancyTestingWithSerumBetaHcG");
		if (!$this->PregnancyTestingWithSerumBetaHcG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PregnancyTestingWithSerumBetaHcG->Visible = FALSE; // Disable update for API request
			else
				$this->PregnancyTestingWithSerumBetaHcG->setFormValue($val);
		}

		// Check field name 'ReviewDate' first before field var 'x_ReviewDate'
		$val = $CurrentForm->hasValue("ReviewDate") ? $CurrentForm->getValue("ReviewDate") : $CurrentForm->getValue("x_ReviewDate");
		if (!$this->ReviewDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReviewDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReviewDate->setFormValue($val);
			$this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
		}

		// Check field name 'ReviewDoctor' first before field var 'x_ReviewDoctor'
		$val = $CurrentForm->hasValue("ReviewDoctor") ? $CurrentForm->getValue("ReviewDoctor") : $CurrentForm->getValue("x_ReviewDoctor");
		if (!$this->ReviewDoctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReviewDoctor->Visible = FALSE; // Disable update for API request
			else
				$this->ReviewDoctor->setFormValue($val);
		}

		// Check field name 'TemplateProcedureRecord' first before field var 'x_TemplateProcedureRecord'
		$val = $CurrentForm->hasValue("TemplateProcedureRecord") ? $CurrentForm->getValue("TemplateProcedureRecord") : $CurrentForm->getValue("x_TemplateProcedureRecord");
		if (!$this->TemplateProcedureRecord->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateProcedureRecord->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateProcedureRecord->setFormValue($val);
		}

		// Check field name 'TemplateMedicationsadvised' first before field var 'x_TemplateMedicationsadvised'
		$val = $CurrentForm->hasValue("TemplateMedicationsadvised") ? $CurrentForm->getValue("TemplateMedicationsadvised") : $CurrentForm->getValue("x_TemplateMedicationsadvised");
		if (!$this->TemplateMedicationsadvised->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateMedicationsadvised->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateMedicationsadvised->setFormValue($val);
		}

		// Check field name 'TemplatePostProcedureInstructions' first before field var 'x_TemplatePostProcedureInstructions'
		$val = $CurrentForm->hasValue("TemplatePostProcedureInstructions") ? $CurrentForm->getValue("TemplatePostProcedureInstructions") : $CurrentForm->getValue("x_TemplatePostProcedureInstructions");
		if (!$this->TemplatePostProcedureInstructions->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplatePostProcedureInstructions->Visible = FALSE; // Disable update for API request
			else
				$this->TemplatePostProcedureInstructions->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
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
		$this->Consultant->CurrentValue = $this->Consultant->FormValue;
		$this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
		$this->IndicationForART->CurrentValue = $this->IndicationForART->FormValue;
		$this->PreTreatment->CurrentValue = $this->PreTreatment->FormValue;
		$this->Hysteroscopy->CurrentValue = $this->Hysteroscopy->FormValue;
		$this->EndometrialScratching->CurrentValue = $this->EndometrialScratching->FormValue;
		$this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
		$this->CYCLETYPE->CurrentValue = $this->CYCLETYPE->FormValue;
		$this->HRTCYCLE->CurrentValue = $this->HRTCYCLE->FormValue;
		$this->OralEstrogenDosage->CurrentValue = $this->OralEstrogenDosage->FormValue;
		$this->VaginalEstrogen->CurrentValue = $this->VaginalEstrogen->FormValue;
		$this->GCSF->CurrentValue = $this->GCSF->FormValue;
		$this->ActivatedPRP->CurrentValue = $this->ActivatedPRP->FormValue;
		$this->ERA->CurrentValue = $this->ERA->FormValue;
		$this->UCLcm->CurrentValue = $this->UCLcm->FormValue;
		$this->DATEOFSTART->CurrentValue = $this->DATEOFSTART->FormValue;
		$this->DATEOFSTART->CurrentValue = UnFormatDateTime($this->DATEOFSTART->CurrentValue, 11);
		$this->DATEOFEMBRYOTRANSFER->CurrentValue = $this->DATEOFEMBRYOTRANSFER->FormValue;
		$this->DATEOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11);
		$this->DAYOFEMBRYOTRANSFER->CurrentValue = $this->DAYOFEMBRYOTRANSFER->FormValue;
		$this->NOOFEMBRYOSTHAWED->CurrentValue = $this->NOOFEMBRYOSTHAWED->FormValue;
		$this->NOOFEMBRYOSTRANSFERRED->CurrentValue = $this->NOOFEMBRYOSTRANSFERRED->FormValue;
		$this->DAYOFEMBRYOS->CurrentValue = $this->DAYOFEMBRYOS->FormValue;
		$this->CRYOPRESERVEDEMBRYOS->CurrentValue = $this->CRYOPRESERVEDEMBRYOS->FormValue;
		$this->Code1->CurrentValue = $this->Code1->FormValue;
		$this->Code2->CurrentValue = $this->Code2->FormValue;
		$this->CellStage1->CurrentValue = $this->CellStage1->FormValue;
		$this->CellStage2->CurrentValue = $this->CellStage2->FormValue;
		$this->Grade1->CurrentValue = $this->Grade1->FormValue;
		$this->Grade2->CurrentValue = $this->Grade2->FormValue;
		$this->ProcedureRecord->CurrentValue = $this->ProcedureRecord->FormValue;
		$this->Medicationsadvised->CurrentValue = $this->Medicationsadvised->FormValue;
		$this->PostProcedureInstructions->CurrentValue = $this->PostProcedureInstructions->FormValue;
		$this->PregnancyTestingWithSerumBetaHcG->CurrentValue = $this->PregnancyTestingWithSerumBetaHcG->FormValue;
		$this->ReviewDate->CurrentValue = $this->ReviewDate->FormValue;
		$this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
		$this->ReviewDoctor->CurrentValue = $this->ReviewDoctor->FormValue;
		$this->TemplateProcedureRecord->CurrentValue = $this->TemplateProcedureRecord->FormValue;
		$this->TemplateMedicationsadvised->CurrentValue = $this->TemplateMedicationsadvised->FormValue;
		$this->TemplatePostProcedureInstructions->CurrentValue = $this->TemplatePostProcedureInstructions->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['ARTCycle'] = $this->ARTCycle->CurrentValue;
		$row['Consultant'] = $this->Consultant->CurrentValue;
		$row['InseminatinTechnique'] = $this->InseminatinTechnique->CurrentValue;
		$row['IndicationForART'] = $this->IndicationForART->CurrentValue;
		$row['PreTreatment'] = $this->PreTreatment->CurrentValue;
		$row['Hysteroscopy'] = $this->Hysteroscopy->CurrentValue;
		$row['EndometrialScratching'] = $this->EndometrialScratching->CurrentValue;
		$row['TrialCannulation'] = $this->TrialCannulation->CurrentValue;
		$row['CYCLETYPE'] = $this->CYCLETYPE->CurrentValue;
		$row['HRTCYCLE'] = $this->HRTCYCLE->CurrentValue;
		$row['OralEstrogenDosage'] = $this->OralEstrogenDosage->CurrentValue;
		$row['VaginalEstrogen'] = $this->VaginalEstrogen->CurrentValue;
		$row['GCSF'] = $this->GCSF->CurrentValue;
		$row['ActivatedPRP'] = $this->ActivatedPRP->CurrentValue;
		$row['ERA'] = $this->ERA->CurrentValue;
		$row['UCLcm'] = $this->UCLcm->CurrentValue;
		$row['DATEOFSTART'] = $this->DATEOFSTART->CurrentValue;
		$row['DATEOFEMBRYOTRANSFER'] = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
		$row['DAYOFEMBRYOTRANSFER'] = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
		$row['NOOFEMBRYOSTHAWED'] = $this->NOOFEMBRYOSTHAWED->CurrentValue;
		$row['NOOFEMBRYOSTRANSFERRED'] = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
		$row['DAYOFEMBRYOS'] = $this->DAYOFEMBRYOS->CurrentValue;
		$row['CRYOPRESERVEDEMBRYOS'] = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
		$row['Code1'] = $this->Code1->CurrentValue;
		$row['Code2'] = $this->Code2->CurrentValue;
		$row['CellStage1'] = $this->CellStage1->CurrentValue;
		$row['CellStage2'] = $this->CellStage2->CurrentValue;
		$row['Grade1'] = $this->Grade1->CurrentValue;
		$row['Grade2'] = $this->Grade2->CurrentValue;
		$row['ProcedureRecord'] = $this->ProcedureRecord->CurrentValue;
		$row['Medicationsadvised'] = $this->Medicationsadvised->CurrentValue;
		$row['PostProcedureInstructions'] = $this->PostProcedureInstructions->CurrentValue;
		$row['PregnancyTestingWithSerumBetaHcG'] = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
		$row['ReviewDate'] = $this->ReviewDate->CurrentValue;
		$row['ReviewDoctor'] = $this->ReviewDoctor->CurrentValue;
		$row['TemplateProcedureRecord'] = $this->TemplateProcedureRecord->CurrentValue;
		$row['TemplateMedicationsadvised'] = $this->TemplateMedicationsadvised->CurrentValue;
		$row['TemplatePostProcedureInstructions'] = $this->TemplatePostProcedureInstructions->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
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
			if (strval($this->ARTCycle->CurrentValue) <> "") {
				$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
			} else {
				$this->ARTCycle->ViewValue = NULL;
			}
			$this->ARTCycle->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// InseminatinTechnique
			if (strval($this->InseminatinTechnique->CurrentValue) <> "") {
				$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
			} else {
				$this->InseminatinTechnique->ViewValue = NULL;
			}
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// IndicationForART
			$this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
			$this->IndicationForART->ViewCustomAttributes = "";

			// PreTreatment
			if (strval($this->PreTreatment->CurrentValue) <> "") {
				$this->PreTreatment->ViewValue = $this->PreTreatment->optionCaption($this->PreTreatment->CurrentValue);
			} else {
				$this->PreTreatment->ViewValue = NULL;
			}
			$this->PreTreatment->ViewCustomAttributes = "";

			// Hysteroscopy
			if (strval($this->Hysteroscopy->CurrentValue) <> "") {
				$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
			} else {
				$this->Hysteroscopy->ViewValue = NULL;
			}
			$this->Hysteroscopy->ViewCustomAttributes = "";

			// EndometrialScratching
			if (strval($this->EndometrialScratching->CurrentValue) <> "") {
				$this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
			} else {
				$this->EndometrialScratching->ViewValue = NULL;
			}
			$this->EndometrialScratching->ViewCustomAttributes = "";

			// TrialCannulation
			if (strval($this->TrialCannulation->CurrentValue) <> "") {
				$this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
			} else {
				$this->TrialCannulation->ViewValue = NULL;
			}
			$this->TrialCannulation->ViewCustomAttributes = "";

			// CYCLETYPE
			if (strval($this->CYCLETYPE->CurrentValue) <> "") {
				$this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
			} else {
				$this->CYCLETYPE->ViewValue = NULL;
			}
			$this->CYCLETYPE->ViewCustomAttributes = "";

			// HRTCYCLE
			$this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
			$this->HRTCYCLE->ViewCustomAttributes = "";

			// OralEstrogenDosage
			if (strval($this->OralEstrogenDosage->CurrentValue) <> "") {
				$this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
			} else {
				$this->OralEstrogenDosage->ViewValue = NULL;
			}
			$this->OralEstrogenDosage->ViewCustomAttributes = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
			$this->VaginalEstrogen->ViewCustomAttributes = "";

			// GCSF
			if (strval($this->GCSF->CurrentValue) <> "") {
				$this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
			} else {
				$this->GCSF->ViewValue = NULL;
			}
			$this->GCSF->ViewCustomAttributes = "";

			// ActivatedPRP
			if (strval($this->ActivatedPRP->CurrentValue) <> "") {
				$this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
			} else {
				$this->ActivatedPRP->ViewValue = NULL;
			}
			$this->ActivatedPRP->ViewCustomAttributes = "";

			// ERA
			if (strval($this->ERA->CurrentValue) <> "") {
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

			// ProcedureRecord
			$this->ProcedureRecord->ViewValue = $this->ProcedureRecord->CurrentValue;
			$this->ProcedureRecord->ViewCustomAttributes = "";

			// Medicationsadvised
			$this->Medicationsadvised->ViewValue = $this->Medicationsadvised->CurrentValue;
			$this->Medicationsadvised->ViewCustomAttributes = "";

			// PostProcedureInstructions
			$this->PostProcedureInstructions->ViewValue = $this->PostProcedureInstructions->CurrentValue;
			$this->PostProcedureInstructions->ViewCustomAttributes = "";

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

			// TemplateProcedureRecord
			$curVal = strval($this->TemplateProcedureRecord->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->lookupCacheOption($curVal);
				if ($this->TemplateProcedureRecord->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Procedure Record'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateProcedureRecord->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->CurrentValue;
					}
				}
			} else {
				$this->TemplateProcedureRecord->ViewValue = NULL;
			}
			$this->TemplateProcedureRecord->ViewCustomAttributes = "";

			// TemplateMedicationsadvised
			$curVal = strval($this->TemplateMedicationsadvised->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->lookupCacheOption($curVal);
				if ($this->TemplateMedicationsadvised->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Medications Advised'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateMedicationsadvised->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->CurrentValue;
					}
				}
			} else {
				$this->TemplateMedicationsadvised->ViewValue = NULL;
			}
			$this->TemplateMedicationsadvised->ViewCustomAttributes = "";

			// TemplatePostProcedureInstructions
			$curVal = strval($this->TemplatePostProcedureInstructions->CurrentValue);
			if ($curVal <> "") {
				$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->lookupCacheOption($curVal);
				if ($this->TemplatePostProcedureInstructions->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ET Template Post Procedure Instructions'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplatePostProcedureInstructions->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->CurrentValue;
					}
				}
			} else {
				$this->TemplatePostProcedureInstructions->ViewValue = NULL;
			}
			$this->TemplatePostProcedureInstructions->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

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

			// ProcedureRecord
			$this->ProcedureRecord->LinkCustomAttributes = "";
			$this->ProcedureRecord->HrefValue = "";
			$this->ProcedureRecord->TooltipValue = "";

			// Medicationsadvised
			$this->Medicationsadvised->LinkCustomAttributes = "";
			$this->Medicationsadvised->HrefValue = "";
			$this->Medicationsadvised->TooltipValue = "";

			// PostProcedureInstructions
			$this->PostProcedureInstructions->LinkCustomAttributes = "";
			$this->PostProcedureInstructions->HrefValue = "";
			$this->PostProcedureInstructions->TooltipValue = "";

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

			// TemplateProcedureRecord
			$this->TemplateProcedureRecord->LinkCustomAttributes = "";
			$this->TemplateProcedureRecord->HrefValue = "";
			$this->TemplateProcedureRecord->TooltipValue = "";

			// TemplateMedicationsadvised
			$this->TemplateMedicationsadvised->LinkCustomAttributes = "";
			$this->TemplateMedicationsadvised->HrefValue = "";
			$this->TemplateMedicationsadvised->TooltipValue = "";

			// TemplatePostProcedureInstructions
			$this->TemplatePostProcedureInstructions->LinkCustomAttributes = "";
			$this->TemplatePostProcedureInstructions->HrefValue = "";
			$this->TemplatePostProcedureInstructions->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// ARTCycle
			$this->ARTCycle->EditAttrs["class"] = "form-control";
			$this->ARTCycle->EditCustomAttributes = "";
			$this->ARTCycle->EditValue = $this->ARTCycle->options(TRUE);

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
			$this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
			$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

			// InseminatinTechnique
			$this->InseminatinTechnique->EditAttrs["class"] = "form-control";
			$this->InseminatinTechnique->EditCustomAttributes = "";
			$this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(TRUE);

			// IndicationForART
			$this->IndicationForART->EditAttrs["class"] = "form-control";
			$this->IndicationForART->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
			$this->IndicationForART->EditValue = HtmlEncode($this->IndicationForART->CurrentValue);
			$this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

			// PreTreatment
			$this->PreTreatment->EditAttrs["class"] = "form-control";
			$this->PreTreatment->EditCustomAttributes = "";
			$this->PreTreatment->EditValue = $this->PreTreatment->options(TRUE);

			// Hysteroscopy
			$this->Hysteroscopy->EditAttrs["class"] = "form-control";
			$this->Hysteroscopy->EditCustomAttributes = "";
			$this->Hysteroscopy->EditValue = $this->Hysteroscopy->options(TRUE);

			// EndometrialScratching
			$this->EndometrialScratching->EditAttrs["class"] = "form-control";
			$this->EndometrialScratching->EditCustomAttributes = "";
			$this->EndometrialScratching->EditValue = $this->EndometrialScratching->options(TRUE);

			// TrialCannulation
			$this->TrialCannulation->EditAttrs["class"] = "form-control";
			$this->TrialCannulation->EditCustomAttributes = "";
			$this->TrialCannulation->EditValue = $this->TrialCannulation->options(TRUE);

			// CYCLETYPE
			$this->CYCLETYPE->EditAttrs["class"] = "form-control";
			$this->CYCLETYPE->EditCustomAttributes = "";
			$this->CYCLETYPE->EditValue = $this->CYCLETYPE->options(TRUE);

			// HRTCYCLE
			$this->HRTCYCLE->EditAttrs["class"] = "form-control";
			$this->HRTCYCLE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HRTCYCLE->CurrentValue = HtmlDecode($this->HRTCYCLE->CurrentValue);
			$this->HRTCYCLE->EditValue = HtmlEncode($this->HRTCYCLE->CurrentValue);
			$this->HRTCYCLE->PlaceHolder = RemoveHtml($this->HRTCYCLE->caption());

			// OralEstrogenDosage
			$this->OralEstrogenDosage->EditAttrs["class"] = "form-control";
			$this->OralEstrogenDosage->EditCustomAttributes = "";
			$this->OralEstrogenDosage->EditValue = $this->OralEstrogenDosage->options(TRUE);

			// VaginalEstrogen
			$this->VaginalEstrogen->EditAttrs["class"] = "form-control";
			$this->VaginalEstrogen->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VaginalEstrogen->CurrentValue = HtmlDecode($this->VaginalEstrogen->CurrentValue);
			$this->VaginalEstrogen->EditValue = HtmlEncode($this->VaginalEstrogen->CurrentValue);
			$this->VaginalEstrogen->PlaceHolder = RemoveHtml($this->VaginalEstrogen->caption());

			// GCSF
			$this->GCSF->EditAttrs["class"] = "form-control";
			$this->GCSF->EditCustomAttributes = "";
			$this->GCSF->EditValue = $this->GCSF->options(TRUE);

			// ActivatedPRP
			$this->ActivatedPRP->EditAttrs["class"] = "form-control";
			$this->ActivatedPRP->EditCustomAttributes = "";
			$this->ActivatedPRP->EditValue = $this->ActivatedPRP->options(TRUE);

			// ERA
			$this->ERA->EditAttrs["class"] = "form-control";
			$this->ERA->EditCustomAttributes = "";
			$this->ERA->EditValue = $this->ERA->options(TRUE);

			// UCLcm
			$this->UCLcm->EditAttrs["class"] = "form-control";
			$this->UCLcm->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
			$this->UCLcm->EditValue = HtmlEncode($this->UCLcm->CurrentValue);
			$this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

			// DATEOFSTART
			$this->DATEOFSTART->EditAttrs["class"] = "form-control";
			$this->DATEOFSTART->EditCustomAttributes = "";
			$this->DATEOFSTART->EditValue = HtmlEncode(FormatDateTime($this->DATEOFSTART->CurrentValue, 11));
			$this->DATEOFSTART->PlaceHolder = RemoveHtml($this->DATEOFSTART->caption());

			// DATEOFEMBRYOTRANSFER
			$this->DATEOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
			$this->DATEOFEMBRYOTRANSFER->EditCustomAttributes = "";
			$this->DATEOFEMBRYOTRANSFER->EditValue = HtmlEncode(FormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11));
			$this->DATEOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATEOFEMBRYOTRANSFER->caption());

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
			$this->DAYOFEMBRYOTRANSFER->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DAYOFEMBRYOTRANSFER->CurrentValue = HtmlDecode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
			$this->DAYOFEMBRYOTRANSFER->EditValue = HtmlEncode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
			$this->DAYOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOTRANSFER->caption());

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->EditAttrs["class"] = "form-control";
			$this->NOOFEMBRYOSTHAWED->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NOOFEMBRYOSTHAWED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTHAWED->CurrentValue);
			$this->NOOFEMBRYOSTHAWED->EditValue = HtmlEncode($this->NOOFEMBRYOSTHAWED->CurrentValue);
			$this->NOOFEMBRYOSTHAWED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTHAWED->caption());

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->EditAttrs["class"] = "form-control";
			$this->NOOFEMBRYOSTRANSFERRED->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NOOFEMBRYOSTRANSFERRED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
			$this->NOOFEMBRYOSTRANSFERRED->EditValue = HtmlEncode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
			$this->NOOFEMBRYOSTRANSFERRED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTRANSFERRED->caption());

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->EditAttrs["class"] = "form-control";
			$this->DAYOFEMBRYOS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DAYOFEMBRYOS->CurrentValue = HtmlDecode($this->DAYOFEMBRYOS->CurrentValue);
			$this->DAYOFEMBRYOS->EditValue = HtmlEncode($this->DAYOFEMBRYOS->CurrentValue);
			$this->DAYOFEMBRYOS->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOS->caption());

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->EditAttrs["class"] = "form-control";
			$this->CRYOPRESERVEDEMBRYOS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CRYOPRESERVEDEMBRYOS->CurrentValue = HtmlDecode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
			$this->CRYOPRESERVEDEMBRYOS->EditValue = HtmlEncode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
			$this->CRYOPRESERVEDEMBRYOS->PlaceHolder = RemoveHtml($this->CRYOPRESERVEDEMBRYOS->caption());

			// Code1
			$this->Code1->EditAttrs["class"] = "form-control";
			$this->Code1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
			$this->Code1->EditValue = HtmlEncode($this->Code1->CurrentValue);
			$this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

			// Code2
			$this->Code2->EditAttrs["class"] = "form-control";
			$this->Code2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
			$this->Code2->EditValue = HtmlEncode($this->Code2->CurrentValue);
			$this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

			// CellStage1
			$this->CellStage1->EditAttrs["class"] = "form-control";
			$this->CellStage1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CellStage1->CurrentValue = HtmlDecode($this->CellStage1->CurrentValue);
			$this->CellStage1->EditValue = HtmlEncode($this->CellStage1->CurrentValue);
			$this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

			// CellStage2
			$this->CellStage2->EditAttrs["class"] = "form-control";
			$this->CellStage2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CellStage2->CurrentValue = HtmlDecode($this->CellStage2->CurrentValue);
			$this->CellStage2->EditValue = HtmlEncode($this->CellStage2->CurrentValue);
			$this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

			// Grade1
			$this->Grade1->EditAttrs["class"] = "form-control";
			$this->Grade1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Grade1->CurrentValue = HtmlDecode($this->Grade1->CurrentValue);
			$this->Grade1->EditValue = HtmlEncode($this->Grade1->CurrentValue);
			$this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

			// Grade2
			$this->Grade2->EditAttrs["class"] = "form-control";
			$this->Grade2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Grade2->CurrentValue = HtmlDecode($this->Grade2->CurrentValue);
			$this->Grade2->EditValue = HtmlEncode($this->Grade2->CurrentValue);
			$this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

			// ProcedureRecord
			$this->ProcedureRecord->EditAttrs["class"] = "form-control";
			$this->ProcedureRecord->EditCustomAttributes = "";
			$this->ProcedureRecord->EditValue = HtmlEncode($this->ProcedureRecord->CurrentValue);
			$this->ProcedureRecord->PlaceHolder = RemoveHtml($this->ProcedureRecord->caption());

			// Medicationsadvised
			$this->Medicationsadvised->EditAttrs["class"] = "form-control";
			$this->Medicationsadvised->EditCustomAttributes = "";
			$this->Medicationsadvised->EditValue = HtmlEncode($this->Medicationsadvised->CurrentValue);
			$this->Medicationsadvised->PlaceHolder = RemoveHtml($this->Medicationsadvised->caption());

			// PostProcedureInstructions
			$this->PostProcedureInstructions->EditAttrs["class"] = "form-control";
			$this->PostProcedureInstructions->EditCustomAttributes = "";
			$this->PostProcedureInstructions->EditValue = HtmlEncode($this->PostProcedureInstructions->CurrentValue);
			$this->PostProcedureInstructions->PlaceHolder = RemoveHtml($this->PostProcedureInstructions->caption());

			// PregnancyTestingWithSerumBetaHcG
			$this->PregnancyTestingWithSerumBetaHcG->EditAttrs["class"] = "form-control";
			$this->PregnancyTestingWithSerumBetaHcG->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PregnancyTestingWithSerumBetaHcG->CurrentValue = HtmlDecode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
			$this->PregnancyTestingWithSerumBetaHcG->EditValue = HtmlEncode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
			$this->PregnancyTestingWithSerumBetaHcG->PlaceHolder = RemoveHtml($this->PregnancyTestingWithSerumBetaHcG->caption());

			// ReviewDate
			$this->ReviewDate->EditAttrs["class"] = "form-control";
			$this->ReviewDate->EditCustomAttributes = "";
			$this->ReviewDate->EditValue = HtmlEncode(FormatDateTime($this->ReviewDate->CurrentValue, 8));
			$this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

			// ReviewDoctor
			$this->ReviewDoctor->EditAttrs["class"] = "form-control";
			$this->ReviewDoctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
			$this->ReviewDoctor->EditValue = HtmlEncode($this->ReviewDoctor->CurrentValue);
			$this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

			// TemplateProcedureRecord
			$this->TemplateProcedureRecord->EditAttrs["class"] = "form-control";
			$this->TemplateProcedureRecord->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateProcedureRecord->CurrentValue));
			if ($curVal <> "")
				$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->lookupCacheOption($curVal);
			else
				$this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->Lookup !== NULL && is_array($this->TemplateProcedureRecord->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateProcedureRecord->ViewValue !== NULL) { // Load from cache
				$this->TemplateProcedureRecord->EditValue = array_values($this->TemplateProcedureRecord->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateProcedureRecord->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ET Template Procedure Record'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateProcedureRecord->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateProcedureRecord->EditValue = $arwrk;
			}

			// TemplateMedicationsadvised
			$this->TemplateMedicationsadvised->EditAttrs["class"] = "form-control";
			$this->TemplateMedicationsadvised->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateMedicationsadvised->CurrentValue));
			if ($curVal <> "")
				$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->lookupCacheOption($curVal);
			else
				$this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->Lookup !== NULL && is_array($this->TemplateMedicationsadvised->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateMedicationsadvised->ViewValue !== NULL) { // Load from cache
				$this->TemplateMedicationsadvised->EditValue = array_values($this->TemplateMedicationsadvised->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateMedicationsadvised->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ET Template Medications Advised'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateMedicationsadvised->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateMedicationsadvised->EditValue = $arwrk;
			}

			// TemplatePostProcedureInstructions
			$this->TemplatePostProcedureInstructions->EditAttrs["class"] = "form-control";
			$this->TemplatePostProcedureInstructions->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplatePostProcedureInstructions->CurrentValue));
			if ($curVal <> "")
				$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->lookupCacheOption($curVal);
			else
				$this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->Lookup !== NULL && is_array($this->TemplatePostProcedureInstructions->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplatePostProcedureInstructions->ViewValue !== NULL) { // Load from cache
				$this->TemplatePostProcedureInstructions->EditValue = array_values($this->TemplatePostProcedureInstructions->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplatePostProcedureInstructions->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ET Template Post Procedure Instructions'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePostProcedureInstructions->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplatePostProcedureInstructions->EditValue = $arwrk;
			}

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

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

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";

			// PreTreatment
			$this->PreTreatment->LinkCustomAttributes = "";
			$this->PreTreatment->HrefValue = "";

			// Hysteroscopy
			$this->Hysteroscopy->LinkCustomAttributes = "";
			$this->Hysteroscopy->HrefValue = "";

			// EndometrialScratching
			$this->EndometrialScratching->LinkCustomAttributes = "";
			$this->EndometrialScratching->HrefValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";

			// CYCLETYPE
			$this->CYCLETYPE->LinkCustomAttributes = "";
			$this->CYCLETYPE->HrefValue = "";

			// HRTCYCLE
			$this->HRTCYCLE->LinkCustomAttributes = "";
			$this->HRTCYCLE->HrefValue = "";

			// OralEstrogenDosage
			$this->OralEstrogenDosage->LinkCustomAttributes = "";
			$this->OralEstrogenDosage->HrefValue = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->LinkCustomAttributes = "";
			$this->VaginalEstrogen->HrefValue = "";

			// GCSF
			$this->GCSF->LinkCustomAttributes = "";
			$this->GCSF->HrefValue = "";

			// ActivatedPRP
			$this->ActivatedPRP->LinkCustomAttributes = "";
			$this->ActivatedPRP->HrefValue = "";

			// ERA
			$this->ERA->LinkCustomAttributes = "";
			$this->ERA->HrefValue = "";

			// UCLcm
			$this->UCLcm->LinkCustomAttributes = "";
			$this->UCLcm->HrefValue = "";

			// DATEOFSTART
			$this->DATEOFSTART->LinkCustomAttributes = "";
			$this->DATEOFSTART->HrefValue = "";

			// DATEOFEMBRYOTRANSFER
			$this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DATEOFEMBRYOTRANSFER->HrefValue = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOTRANSFER->HrefValue = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTHAWED->HrefValue = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOS->HrefValue = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
			$this->CRYOPRESERVEDEMBRYOS->HrefValue = "";

			// Code1
			$this->Code1->LinkCustomAttributes = "";
			$this->Code1->HrefValue = "";

			// Code2
			$this->Code2->LinkCustomAttributes = "";
			$this->Code2->HrefValue = "";

			// CellStage1
			$this->CellStage1->LinkCustomAttributes = "";
			$this->CellStage1->HrefValue = "";

			// CellStage2
			$this->CellStage2->LinkCustomAttributes = "";
			$this->CellStage2->HrefValue = "";

			// Grade1
			$this->Grade1->LinkCustomAttributes = "";
			$this->Grade1->HrefValue = "";

			// Grade2
			$this->Grade2->LinkCustomAttributes = "";
			$this->Grade2->HrefValue = "";

			// ProcedureRecord
			$this->ProcedureRecord->LinkCustomAttributes = "";
			$this->ProcedureRecord->HrefValue = "";

			// Medicationsadvised
			$this->Medicationsadvised->LinkCustomAttributes = "";
			$this->Medicationsadvised->HrefValue = "";

			// PostProcedureInstructions
			$this->PostProcedureInstructions->LinkCustomAttributes = "";
			$this->PostProcedureInstructions->HrefValue = "";

			// PregnancyTestingWithSerumBetaHcG
			$this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
			$this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";

			// TemplateProcedureRecord
			$this->TemplateProcedureRecord->LinkCustomAttributes = "";
			$this->TemplateProcedureRecord->HrefValue = "";

			// TemplateMedicationsadvised
			$this->TemplateMedicationsadvised->LinkCustomAttributes = "";
			$this->TemplateMedicationsadvised->HrefValue = "";

			// TemplatePostProcedureInstructions
			$this->TemplatePostProcedureInstructions->LinkCustomAttributes = "";
			$this->TemplatePostProcedureInstructions->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
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
		if ($this->Consultant->Required) {
			if (!$this->Consultant->IsDetailKey && $this->Consultant->FormValue != NULL && $this->Consultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
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
		if ($this->PreTreatment->Required) {
			if (!$this->PreTreatment->IsDetailKey && $this->PreTreatment->FormValue != NULL && $this->PreTreatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreTreatment->caption(), $this->PreTreatment->RequiredErrorMessage));
			}
		}
		if ($this->Hysteroscopy->Required) {
			if (!$this->Hysteroscopy->IsDetailKey && $this->Hysteroscopy->FormValue != NULL && $this->Hysteroscopy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Hysteroscopy->caption(), $this->Hysteroscopy->RequiredErrorMessage));
			}
		}
		if ($this->EndometrialScratching->Required) {
			if (!$this->EndometrialScratching->IsDetailKey && $this->EndometrialScratching->FormValue != NULL && $this->EndometrialScratching->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndometrialScratching->caption(), $this->EndometrialScratching->RequiredErrorMessage));
			}
		}
		if ($this->TrialCannulation->Required) {
			if (!$this->TrialCannulation->IsDetailKey && $this->TrialCannulation->FormValue != NULL && $this->TrialCannulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
			}
		}
		if ($this->CYCLETYPE->Required) {
			if (!$this->CYCLETYPE->IsDetailKey && $this->CYCLETYPE->FormValue != NULL && $this->CYCLETYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CYCLETYPE->caption(), $this->CYCLETYPE->RequiredErrorMessage));
			}
		}
		if ($this->HRTCYCLE->Required) {
			if (!$this->HRTCYCLE->IsDetailKey && $this->HRTCYCLE->FormValue != NULL && $this->HRTCYCLE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HRTCYCLE->caption(), $this->HRTCYCLE->RequiredErrorMessage));
			}
		}
		if ($this->OralEstrogenDosage->Required) {
			if (!$this->OralEstrogenDosage->IsDetailKey && $this->OralEstrogenDosage->FormValue != NULL && $this->OralEstrogenDosage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OralEstrogenDosage->caption(), $this->OralEstrogenDosage->RequiredErrorMessage));
			}
		}
		if ($this->VaginalEstrogen->Required) {
			if (!$this->VaginalEstrogen->IsDetailKey && $this->VaginalEstrogen->FormValue != NULL && $this->VaginalEstrogen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VaginalEstrogen->caption(), $this->VaginalEstrogen->RequiredErrorMessage));
			}
		}
		if ($this->GCSF->Required) {
			if (!$this->GCSF->IsDetailKey && $this->GCSF->FormValue != NULL && $this->GCSF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GCSF->caption(), $this->GCSF->RequiredErrorMessage));
			}
		}
		if ($this->ActivatedPRP->Required) {
			if (!$this->ActivatedPRP->IsDetailKey && $this->ActivatedPRP->FormValue != NULL && $this->ActivatedPRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ActivatedPRP->caption(), $this->ActivatedPRP->RequiredErrorMessage));
			}
		}
		if ($this->ERA->Required) {
			if (!$this->ERA->IsDetailKey && $this->ERA->FormValue != NULL && $this->ERA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ERA->caption(), $this->ERA->RequiredErrorMessage));
			}
		}
		if ($this->UCLcm->Required) {
			if (!$this->UCLcm->IsDetailKey && $this->UCLcm->FormValue != NULL && $this->UCLcm->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UCLcm->caption(), $this->UCLcm->RequiredErrorMessage));
			}
		}
		if ($this->DATEOFSTART->Required) {
			if (!$this->DATEOFSTART->IsDetailKey && $this->DATEOFSTART->FormValue != NULL && $this->DATEOFSTART->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DATEOFSTART->caption(), $this->DATEOFSTART->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DATEOFSTART->FormValue)) {
			AddMessage($FormError, $this->DATEOFSTART->errorMessage());
		}
		if ($this->DATEOFEMBRYOTRANSFER->Required) {
			if (!$this->DATEOFEMBRYOTRANSFER->IsDetailKey && $this->DATEOFEMBRYOTRANSFER->FormValue != NULL && $this->DATEOFEMBRYOTRANSFER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DATEOFEMBRYOTRANSFER->caption(), $this->DATEOFEMBRYOTRANSFER->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DATEOFEMBRYOTRANSFER->FormValue)) {
			AddMessage($FormError, $this->DATEOFEMBRYOTRANSFER->errorMessage());
		}
		if ($this->DAYOFEMBRYOTRANSFER->Required) {
			if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey && $this->DAYOFEMBRYOTRANSFER->FormValue != NULL && $this->DAYOFEMBRYOTRANSFER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DAYOFEMBRYOTRANSFER->caption(), $this->DAYOFEMBRYOTRANSFER->RequiredErrorMessage));
			}
		}
		if ($this->NOOFEMBRYOSTHAWED->Required) {
			if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey && $this->NOOFEMBRYOSTHAWED->FormValue != NULL && $this->NOOFEMBRYOSTHAWED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NOOFEMBRYOSTHAWED->caption(), $this->NOOFEMBRYOSTHAWED->RequiredErrorMessage));
			}
		}
		if ($this->NOOFEMBRYOSTRANSFERRED->Required) {
			if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey && $this->NOOFEMBRYOSTRANSFERRED->FormValue != NULL && $this->NOOFEMBRYOSTRANSFERRED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NOOFEMBRYOSTRANSFERRED->caption(), $this->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage));
			}
		}
		if ($this->DAYOFEMBRYOS->Required) {
			if (!$this->DAYOFEMBRYOS->IsDetailKey && $this->DAYOFEMBRYOS->FormValue != NULL && $this->DAYOFEMBRYOS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DAYOFEMBRYOS->caption(), $this->DAYOFEMBRYOS->RequiredErrorMessage));
			}
		}
		if ($this->CRYOPRESERVEDEMBRYOS->Required) {
			if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey && $this->CRYOPRESERVEDEMBRYOS->FormValue != NULL && $this->CRYOPRESERVEDEMBRYOS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CRYOPRESERVEDEMBRYOS->caption(), $this->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage));
			}
		}
		if ($this->Code1->Required) {
			if (!$this->Code1->IsDetailKey && $this->Code1->FormValue != NULL && $this->Code1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code1->caption(), $this->Code1->RequiredErrorMessage));
			}
		}
		if ($this->Code2->Required) {
			if (!$this->Code2->IsDetailKey && $this->Code2->FormValue != NULL && $this->Code2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code2->caption(), $this->Code2->RequiredErrorMessage));
			}
		}
		if ($this->CellStage1->Required) {
			if (!$this->CellStage1->IsDetailKey && $this->CellStage1->FormValue != NULL && $this->CellStage1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage1->caption(), $this->CellStage1->RequiredErrorMessage));
			}
		}
		if ($this->CellStage2->Required) {
			if (!$this->CellStage2->IsDetailKey && $this->CellStage2->FormValue != NULL && $this->CellStage2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CellStage2->caption(), $this->CellStage2->RequiredErrorMessage));
			}
		}
		if ($this->Grade1->Required) {
			if (!$this->Grade1->IsDetailKey && $this->Grade1->FormValue != NULL && $this->Grade1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade1->caption(), $this->Grade1->RequiredErrorMessage));
			}
		}
		if ($this->Grade2->Required) {
			if (!$this->Grade2->IsDetailKey && $this->Grade2->FormValue != NULL && $this->Grade2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade2->caption(), $this->Grade2->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureRecord->Required) {
			if (!$this->ProcedureRecord->IsDetailKey && $this->ProcedureRecord->FormValue != NULL && $this->ProcedureRecord->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureRecord->caption(), $this->ProcedureRecord->RequiredErrorMessage));
			}
		}
		if ($this->Medicationsadvised->Required) {
			if (!$this->Medicationsadvised->IsDetailKey && $this->Medicationsadvised->FormValue != NULL && $this->Medicationsadvised->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medicationsadvised->caption(), $this->Medicationsadvised->RequiredErrorMessage));
			}
		}
		if ($this->PostProcedureInstructions->Required) {
			if (!$this->PostProcedureInstructions->IsDetailKey && $this->PostProcedureInstructions->FormValue != NULL && $this->PostProcedureInstructions->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PostProcedureInstructions->caption(), $this->PostProcedureInstructions->RequiredErrorMessage));
			}
		}
		if ($this->PregnancyTestingWithSerumBetaHcG->Required) {
			if (!$this->PregnancyTestingWithSerumBetaHcG->IsDetailKey && $this->PregnancyTestingWithSerumBetaHcG->FormValue != NULL && $this->PregnancyTestingWithSerumBetaHcG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PregnancyTestingWithSerumBetaHcG->caption(), $this->PregnancyTestingWithSerumBetaHcG->RequiredErrorMessage));
			}
		}
		if ($this->ReviewDate->Required) {
			if (!$this->ReviewDate->IsDetailKey && $this->ReviewDate->FormValue != NULL && $this->ReviewDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReviewDate->caption(), $this->ReviewDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReviewDate->FormValue)) {
			AddMessage($FormError, $this->ReviewDate->errorMessage());
		}
		if ($this->ReviewDoctor->Required) {
			if (!$this->ReviewDoctor->IsDetailKey && $this->ReviewDoctor->FormValue != NULL && $this->ReviewDoctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReviewDoctor->caption(), $this->ReviewDoctor->RequiredErrorMessage));
			}
		}
		if ($this->TemplateProcedureRecord->Required) {
			if (!$this->TemplateProcedureRecord->IsDetailKey && $this->TemplateProcedureRecord->FormValue != NULL && $this->TemplateProcedureRecord->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateProcedureRecord->caption(), $this->TemplateProcedureRecord->RequiredErrorMessage));
			}
		}
		if ($this->TemplateMedicationsadvised->Required) {
			if (!$this->TemplateMedicationsadvised->IsDetailKey && $this->TemplateMedicationsadvised->FormValue != NULL && $this->TemplateMedicationsadvised->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateMedicationsadvised->caption(), $this->TemplateMedicationsadvised->RequiredErrorMessage));
			}
		}
		if ($this->TemplatePostProcedureInstructions->Required) {
			if (!$this->TemplatePostProcedureInstructions->IsDetailKey && $this->TemplatePostProcedureInstructions->FormValue != NULL && $this->TemplatePostProcedureInstructions->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplatePostProcedureInstructions->caption(), $this->TemplatePostProcedureInstructions->RequiredErrorMessage));
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

		// Consultant
		$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, FALSE);

		// InseminatinTechnique
		$this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, NULL, FALSE);

		// IndicationForART
		$this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, NULL, FALSE);

		// PreTreatment
		$this->PreTreatment->setDbValueDef($rsnew, $this->PreTreatment->CurrentValue, NULL, FALSE);

		// Hysteroscopy
		$this->Hysteroscopy->setDbValueDef($rsnew, $this->Hysteroscopy->CurrentValue, NULL, FALSE);

		// EndometrialScratching
		$this->EndometrialScratching->setDbValueDef($rsnew, $this->EndometrialScratching->CurrentValue, NULL, FALSE);

		// TrialCannulation
		$this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, NULL, FALSE);

		// CYCLETYPE
		$this->CYCLETYPE->setDbValueDef($rsnew, $this->CYCLETYPE->CurrentValue, NULL, FALSE);

		// HRTCYCLE
		$this->HRTCYCLE->setDbValueDef($rsnew, $this->HRTCYCLE->CurrentValue, NULL, FALSE);

		// OralEstrogenDosage
		$this->OralEstrogenDosage->setDbValueDef($rsnew, $this->OralEstrogenDosage->CurrentValue, NULL, FALSE);

		// VaginalEstrogen
		$this->VaginalEstrogen->setDbValueDef($rsnew, $this->VaginalEstrogen->CurrentValue, NULL, FALSE);

		// GCSF
		$this->GCSF->setDbValueDef($rsnew, $this->GCSF->CurrentValue, NULL, FALSE);

		// ActivatedPRP
		$this->ActivatedPRP->setDbValueDef($rsnew, $this->ActivatedPRP->CurrentValue, NULL, FALSE);

		// ERA
		$this->ERA->setDbValueDef($rsnew, $this->ERA->CurrentValue, NULL, FALSE);

		// UCLcm
		$this->UCLcm->setDbValueDef($rsnew, $this->UCLcm->CurrentValue, NULL, FALSE);

		// DATEOFSTART
		$this->DATEOFSTART->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFSTART->CurrentValue, 11), NULL, FALSE);

		// DATEOFEMBRYOTRANSFER
		$this->DATEOFEMBRYOTRANSFER->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11), NULL, FALSE);

		// DAYOFEMBRYOTRANSFER
		$this->DAYOFEMBRYOTRANSFER->setDbValueDef($rsnew, $this->DAYOFEMBRYOTRANSFER->CurrentValue, NULL, FALSE);

		// NOOFEMBRYOSTHAWED
		$this->NOOFEMBRYOSTHAWED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTHAWED->CurrentValue, NULL, FALSE);

		// NOOFEMBRYOSTRANSFERRED
		$this->NOOFEMBRYOSTRANSFERRED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTRANSFERRED->CurrentValue, NULL, FALSE);

		// DAYOFEMBRYOS
		$this->DAYOFEMBRYOS->setDbValueDef($rsnew, $this->DAYOFEMBRYOS->CurrentValue, NULL, FALSE);

		// CRYOPRESERVEDEMBRYOS
		$this->CRYOPRESERVEDEMBRYOS->setDbValueDef($rsnew, $this->CRYOPRESERVEDEMBRYOS->CurrentValue, NULL, FALSE);

		// Code1
		$this->Code1->setDbValueDef($rsnew, $this->Code1->CurrentValue, NULL, FALSE);

		// Code2
		$this->Code2->setDbValueDef($rsnew, $this->Code2->CurrentValue, NULL, FALSE);

		// CellStage1
		$this->CellStage1->setDbValueDef($rsnew, $this->CellStage1->CurrentValue, NULL, FALSE);

		// CellStage2
		$this->CellStage2->setDbValueDef($rsnew, $this->CellStage2->CurrentValue, NULL, FALSE);

		// Grade1
		$this->Grade1->setDbValueDef($rsnew, $this->Grade1->CurrentValue, NULL, FALSE);

		// Grade2
		$this->Grade2->setDbValueDef($rsnew, $this->Grade2->CurrentValue, NULL, FALSE);

		// ProcedureRecord
		$this->ProcedureRecord->setDbValueDef($rsnew, $this->ProcedureRecord->CurrentValue, NULL, FALSE);

		// Medicationsadvised
		$this->Medicationsadvised->setDbValueDef($rsnew, $this->Medicationsadvised->CurrentValue, NULL, FALSE);

		// PostProcedureInstructions
		$this->PostProcedureInstructions->setDbValueDef($rsnew, $this->PostProcedureInstructions->CurrentValue, NULL, FALSE);

		// PregnancyTestingWithSerumBetaHcG
		$this->PregnancyTestingWithSerumBetaHcG->setDbValueDef($rsnew, $this->PregnancyTestingWithSerumBetaHcG->CurrentValue, NULL, FALSE);

		// ReviewDate
		$this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), NULL, FALSE);

		// ReviewDoctor
		$this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, NULL, FALSE);

		// TemplateProcedureRecord
		$this->TemplateProcedureRecord->setDbValueDef($rsnew, $this->TemplateProcedureRecord->CurrentValue, "", FALSE);

		// TemplateMedicationsadvised
		$this->TemplateMedicationsadvised->setDbValueDef($rsnew, $this->TemplateMedicationsadvised->CurrentValue, "", FALSE);

		// TemplatePostProcedureInstructions
		$this->TemplatePostProcedureInstructions->setDbValueDef($rsnew, $this->TemplatePostProcedureInstructions->CurrentValue, "", FALSE);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_et_chartlist.php"), "", $this->TableVar, TRUE);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_ovum_pick_up_chart_edit extends ivf_ovum_pick_up_chart
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_ovum_pick_up_chart';

	// Page object name
	public $PageObjName = "ivf_ovum_pick_up_chart_edit";

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

		// Table object (ivf_ovum_pick_up_chart)
		if (!isset($GLOBALS["ivf_ovum_pick_up_chart"]) || get_class($GLOBALS["ivf_ovum_pick_up_chart"]) == PROJECT_NAMESPACE . "ivf_ovum_pick_up_chart") {
			$GLOBALS["ivf_ovum_pick_up_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_ovum_pick_up_chart"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_ovum_pick_up_chart');

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
		global $EXPORT, $ivf_ovum_pick_up_chart;
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
				$doc = new $class($ivf_ovum_pick_up_chart);
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
					if ($pageName == "ivf_ovum_pick_up_chartview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_ovum_pick_up_chartlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ARTCycle->setVisibility();
		$this->Consultant->setVisibility();
		$this->TotalDoseOfStimulation->setVisibility();
		$this->Protocol->setVisibility();
		$this->NumberOfDaysOfStimulation->setVisibility();
		$this->TriggerDateTime->setVisibility();
		$this->OPUDateTime->setVisibility();
		$this->HoursAfterTrigger->setVisibility();
		$this->SerumE2->setVisibility();
		$this->SerumP4->setVisibility();
		$this->FORT->setVisibility();
		$this->ExperctedOocytes->setVisibility();
		$this->NoOfOocytesRetrieved->setVisibility();
		$this->OocytesRetreivalRate->setVisibility();
		$this->Anesthesia->setVisibility();
		$this->TrialCannulation->setVisibility();
		$this->UCL->setVisibility();
		$this->Angle->setVisibility();
		$this->EMS->setVisibility();
		$this->Cannulation->setVisibility();
		$this->ProcedureT->setVisibility();
		$this->NoOfOocytesRetrievedd->setVisibility();
		$this->CourseInHospital->setVisibility();
		$this->DischargeAdvise->setVisibility();
		$this->FollowUpAdvise->setVisibility();
		$this->PlanT->setVisibility();
		$this->ReviewDate->setVisibility();
		$this->ReviewDoctor->setVisibility();
		$this->TemplateProcedure->setVisibility();
		$this->TemplateCourseInHospital->setVisibility();
		$this->TemplateDischargeAdvise->setVisibility();
		$this->TemplateFollowUpAdvise->setVisibility();
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
		$this->setupLookupOptions($this->TemplateProcedure);
		$this->setupLookupOptions($this->TemplateCourseInHospital);
		$this->setupLookupOptions($this->TemplateDischargeAdvise);
		$this->setupLookupOptions($this->TemplateFollowUpAdvise);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("ivf_ovum_pick_up_chartlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ivf_ovum_pick_up_chartlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
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

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

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

		// Check field name 'TotalDoseOfStimulation' first before field var 'x_TotalDoseOfStimulation'
		$val = $CurrentForm->hasValue("TotalDoseOfStimulation") ? $CurrentForm->getValue("TotalDoseOfStimulation") : $CurrentForm->getValue("x_TotalDoseOfStimulation");
		if (!$this->TotalDoseOfStimulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TotalDoseOfStimulation->Visible = FALSE; // Disable update for API request
			else
				$this->TotalDoseOfStimulation->setFormValue($val);
		}

		// Check field name 'Protocol' first before field var 'x_Protocol'
		$val = $CurrentForm->hasValue("Protocol") ? $CurrentForm->getValue("Protocol") : $CurrentForm->getValue("x_Protocol");
		if (!$this->Protocol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Protocol->Visible = FALSE; // Disable update for API request
			else
				$this->Protocol->setFormValue($val);
		}

		// Check field name 'NumberOfDaysOfStimulation' first before field var 'x_NumberOfDaysOfStimulation'
		$val = $CurrentForm->hasValue("NumberOfDaysOfStimulation") ? $CurrentForm->getValue("NumberOfDaysOfStimulation") : $CurrentForm->getValue("x_NumberOfDaysOfStimulation");
		if (!$this->NumberOfDaysOfStimulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NumberOfDaysOfStimulation->Visible = FALSE; // Disable update for API request
			else
				$this->NumberOfDaysOfStimulation->setFormValue($val);
		}

		// Check field name 'TriggerDateTime' first before field var 'x_TriggerDateTime'
		$val = $CurrentForm->hasValue("TriggerDateTime") ? $CurrentForm->getValue("TriggerDateTime") : $CurrentForm->getValue("x_TriggerDateTime");
		if (!$this->TriggerDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TriggerDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->TriggerDateTime->setFormValue($val);
			$this->TriggerDateTime->CurrentValue = UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0);
		}

		// Check field name 'OPUDateTime' first before field var 'x_OPUDateTime'
		$val = $CurrentForm->hasValue("OPUDateTime") ? $CurrentForm->getValue("OPUDateTime") : $CurrentForm->getValue("x_OPUDateTime");
		if (!$this->OPUDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OPUDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->OPUDateTime->setFormValue($val);
			$this->OPUDateTime->CurrentValue = UnFormatDateTime($this->OPUDateTime->CurrentValue, 0);
		}

		// Check field name 'HoursAfterTrigger' first before field var 'x_HoursAfterTrigger'
		$val = $CurrentForm->hasValue("HoursAfterTrigger") ? $CurrentForm->getValue("HoursAfterTrigger") : $CurrentForm->getValue("x_HoursAfterTrigger");
		if (!$this->HoursAfterTrigger->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HoursAfterTrigger->Visible = FALSE; // Disable update for API request
			else
				$this->HoursAfterTrigger->setFormValue($val);
		}

		// Check field name 'SerumE2' first before field var 'x_SerumE2'
		$val = $CurrentForm->hasValue("SerumE2") ? $CurrentForm->getValue("SerumE2") : $CurrentForm->getValue("x_SerumE2");
		if (!$this->SerumE2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SerumE2->Visible = FALSE; // Disable update for API request
			else
				$this->SerumE2->setFormValue($val);
		}

		// Check field name 'SerumP4' first before field var 'x_SerumP4'
		$val = $CurrentForm->hasValue("SerumP4") ? $CurrentForm->getValue("SerumP4") : $CurrentForm->getValue("x_SerumP4");
		if (!$this->SerumP4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SerumP4->Visible = FALSE; // Disable update for API request
			else
				$this->SerumP4->setFormValue($val);
		}

		// Check field name 'FORT' first before field var 'x_FORT'
		$val = $CurrentForm->hasValue("FORT") ? $CurrentForm->getValue("FORT") : $CurrentForm->getValue("x_FORT");
		if (!$this->FORT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FORT->Visible = FALSE; // Disable update for API request
			else
				$this->FORT->setFormValue($val);
		}

		// Check field name 'ExperctedOocytes' first before field var 'x_ExperctedOocytes'
		$val = $CurrentForm->hasValue("ExperctedOocytes") ? $CurrentForm->getValue("ExperctedOocytes") : $CurrentForm->getValue("x_ExperctedOocytes");
		if (!$this->ExperctedOocytes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ExperctedOocytes->Visible = FALSE; // Disable update for API request
			else
				$this->ExperctedOocytes->setFormValue($val);
		}

		// Check field name 'NoOfOocytesRetrieved' first before field var 'x_NoOfOocytesRetrieved'
		$val = $CurrentForm->hasValue("NoOfOocytesRetrieved") ? $CurrentForm->getValue("NoOfOocytesRetrieved") : $CurrentForm->getValue("x_NoOfOocytesRetrieved");
		if (!$this->NoOfOocytesRetrieved->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfOocytesRetrieved->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfOocytesRetrieved->setFormValue($val);
		}

		// Check field name 'OocytesRetreivalRate' first before field var 'x_OocytesRetreivalRate'
		$val = $CurrentForm->hasValue("OocytesRetreivalRate") ? $CurrentForm->getValue("OocytesRetreivalRate") : $CurrentForm->getValue("x_OocytesRetreivalRate");
		if (!$this->OocytesRetreivalRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocytesRetreivalRate->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesRetreivalRate->setFormValue($val);
		}

		// Check field name 'Anesthesia' first before field var 'x_Anesthesia'
		$val = $CurrentForm->hasValue("Anesthesia") ? $CurrentForm->getValue("Anesthesia") : $CurrentForm->getValue("x_Anesthesia");
		if (!$this->Anesthesia->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Anesthesia->Visible = FALSE; // Disable update for API request
			else
				$this->Anesthesia->setFormValue($val);
		}

		// Check field name 'TrialCannulation' first before field var 'x_TrialCannulation'
		$val = $CurrentForm->hasValue("TrialCannulation") ? $CurrentForm->getValue("TrialCannulation") : $CurrentForm->getValue("x_TrialCannulation");
		if (!$this->TrialCannulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TrialCannulation->Visible = FALSE; // Disable update for API request
			else
				$this->TrialCannulation->setFormValue($val);
		}

		// Check field name 'UCL' first before field var 'x_UCL'
		$val = $CurrentForm->hasValue("UCL") ? $CurrentForm->getValue("UCL") : $CurrentForm->getValue("x_UCL");
		if (!$this->UCL->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UCL->Visible = FALSE; // Disable update for API request
			else
				$this->UCL->setFormValue($val);
		}

		// Check field name 'Angle' first before field var 'x_Angle'
		$val = $CurrentForm->hasValue("Angle") ? $CurrentForm->getValue("Angle") : $CurrentForm->getValue("x_Angle");
		if (!$this->Angle->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Angle->Visible = FALSE; // Disable update for API request
			else
				$this->Angle->setFormValue($val);
		}

		// Check field name 'EMS' first before field var 'x_EMS'
		$val = $CurrentForm->hasValue("EMS") ? $CurrentForm->getValue("EMS") : $CurrentForm->getValue("x_EMS");
		if (!$this->EMS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EMS->Visible = FALSE; // Disable update for API request
			else
				$this->EMS->setFormValue($val);
		}

		// Check field name 'Cannulation' first before field var 'x_Cannulation'
		$val = $CurrentForm->hasValue("Cannulation") ? $CurrentForm->getValue("Cannulation") : $CurrentForm->getValue("x_Cannulation");
		if (!$this->Cannulation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cannulation->Visible = FALSE; // Disable update for API request
			else
				$this->Cannulation->setFormValue($val);
		}

		// Check field name 'ProcedureT' first before field var 'x_ProcedureT'
		$val = $CurrentForm->hasValue("ProcedureT") ? $CurrentForm->getValue("ProcedureT") : $CurrentForm->getValue("x_ProcedureT");
		if (!$this->ProcedureT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureT->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureT->setFormValue($val);
		}

		// Check field name 'NoOfOocytesRetrievedd' first before field var 'x_NoOfOocytesRetrievedd'
		$val = $CurrentForm->hasValue("NoOfOocytesRetrievedd") ? $CurrentForm->getValue("NoOfOocytesRetrievedd") : $CurrentForm->getValue("x_NoOfOocytesRetrievedd");
		if (!$this->NoOfOocytesRetrievedd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfOocytesRetrievedd->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfOocytesRetrievedd->setFormValue($val);
		}

		// Check field name 'CourseInHospital' first before field var 'x_CourseInHospital'
		$val = $CurrentForm->hasValue("CourseInHospital") ? $CurrentForm->getValue("CourseInHospital") : $CurrentForm->getValue("x_CourseInHospital");
		if (!$this->CourseInHospital->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CourseInHospital->Visible = FALSE; // Disable update for API request
			else
				$this->CourseInHospital->setFormValue($val);
		}

		// Check field name 'DischargeAdvise' first before field var 'x_DischargeAdvise'
		$val = $CurrentForm->hasValue("DischargeAdvise") ? $CurrentForm->getValue("DischargeAdvise") : $CurrentForm->getValue("x_DischargeAdvise");
		if (!$this->DischargeAdvise->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DischargeAdvise->Visible = FALSE; // Disable update for API request
			else
				$this->DischargeAdvise->setFormValue($val);
		}

		// Check field name 'FollowUpAdvise' first before field var 'x_FollowUpAdvise'
		$val = $CurrentForm->hasValue("FollowUpAdvise") ? $CurrentForm->getValue("FollowUpAdvise") : $CurrentForm->getValue("x_FollowUpAdvise");
		if (!$this->FollowUpAdvise->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FollowUpAdvise->Visible = FALSE; // Disable update for API request
			else
				$this->FollowUpAdvise->setFormValue($val);
		}

		// Check field name 'PlanT' first before field var 'x_PlanT'
		$val = $CurrentForm->hasValue("PlanT") ? $CurrentForm->getValue("PlanT") : $CurrentForm->getValue("x_PlanT");
		if (!$this->PlanT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PlanT->Visible = FALSE; // Disable update for API request
			else
				$this->PlanT->setFormValue($val);
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

		// Check field name 'TemplateProcedure' first before field var 'x_TemplateProcedure'
		$val = $CurrentForm->hasValue("TemplateProcedure") ? $CurrentForm->getValue("TemplateProcedure") : $CurrentForm->getValue("x_TemplateProcedure");
		if (!$this->TemplateProcedure->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateProcedure->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateProcedure->setFormValue($val);
		}

		// Check field name 'TemplateCourseInHospital' first before field var 'x_TemplateCourseInHospital'
		$val = $CurrentForm->hasValue("TemplateCourseInHospital") ? $CurrentForm->getValue("TemplateCourseInHospital") : $CurrentForm->getValue("x_TemplateCourseInHospital");
		if (!$this->TemplateCourseInHospital->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateCourseInHospital->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateCourseInHospital->setFormValue($val);
		}

		// Check field name 'TemplateDischargeAdvise' first before field var 'x_TemplateDischargeAdvise'
		$val = $CurrentForm->hasValue("TemplateDischargeAdvise") ? $CurrentForm->getValue("TemplateDischargeAdvise") : $CurrentForm->getValue("x_TemplateDischargeAdvise");
		if (!$this->TemplateDischargeAdvise->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateDischargeAdvise->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateDischargeAdvise->setFormValue($val);
		}

		// Check field name 'TemplateFollowUpAdvise' first before field var 'x_TemplateFollowUpAdvise'
		$val = $CurrentForm->hasValue("TemplateFollowUpAdvise") ? $CurrentForm->getValue("TemplateFollowUpAdvise") : $CurrentForm->getValue("x_TemplateFollowUpAdvise");
		if (!$this->TemplateFollowUpAdvise->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateFollowUpAdvise->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateFollowUpAdvise->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
		$this->Consultant->CurrentValue = $this->Consultant->FormValue;
		$this->TotalDoseOfStimulation->CurrentValue = $this->TotalDoseOfStimulation->FormValue;
		$this->Protocol->CurrentValue = $this->Protocol->FormValue;
		$this->NumberOfDaysOfStimulation->CurrentValue = $this->NumberOfDaysOfStimulation->FormValue;
		$this->TriggerDateTime->CurrentValue = $this->TriggerDateTime->FormValue;
		$this->TriggerDateTime->CurrentValue = UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0);
		$this->OPUDateTime->CurrentValue = $this->OPUDateTime->FormValue;
		$this->OPUDateTime->CurrentValue = UnFormatDateTime($this->OPUDateTime->CurrentValue, 0);
		$this->HoursAfterTrigger->CurrentValue = $this->HoursAfterTrigger->FormValue;
		$this->SerumE2->CurrentValue = $this->SerumE2->FormValue;
		$this->SerumP4->CurrentValue = $this->SerumP4->FormValue;
		$this->FORT->CurrentValue = $this->FORT->FormValue;
		$this->ExperctedOocytes->CurrentValue = $this->ExperctedOocytes->FormValue;
		$this->NoOfOocytesRetrieved->CurrentValue = $this->NoOfOocytesRetrieved->FormValue;
		$this->OocytesRetreivalRate->CurrentValue = $this->OocytesRetreivalRate->FormValue;
		$this->Anesthesia->CurrentValue = $this->Anesthesia->FormValue;
		$this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
		$this->UCL->CurrentValue = $this->UCL->FormValue;
		$this->Angle->CurrentValue = $this->Angle->FormValue;
		$this->EMS->CurrentValue = $this->EMS->FormValue;
		$this->Cannulation->CurrentValue = $this->Cannulation->FormValue;
		$this->ProcedureT->CurrentValue = $this->ProcedureT->FormValue;
		$this->NoOfOocytesRetrievedd->CurrentValue = $this->NoOfOocytesRetrievedd->FormValue;
		$this->CourseInHospital->CurrentValue = $this->CourseInHospital->FormValue;
		$this->DischargeAdvise->CurrentValue = $this->DischargeAdvise->FormValue;
		$this->FollowUpAdvise->CurrentValue = $this->FollowUpAdvise->FormValue;
		$this->PlanT->CurrentValue = $this->PlanT->FormValue;
		$this->ReviewDate->CurrentValue = $this->ReviewDate->FormValue;
		$this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
		$this->ReviewDoctor->CurrentValue = $this->ReviewDoctor->FormValue;
		$this->TemplateProcedure->CurrentValue = $this->TemplateProcedure->FormValue;
		$this->TemplateCourseInHospital->CurrentValue = $this->TemplateCourseInHospital->FormValue;
		$this->TemplateDischargeAdvise->CurrentValue = $this->TemplateDischargeAdvise->FormValue;
		$this->TemplateFollowUpAdvise->CurrentValue = $this->TemplateFollowUpAdvise->FormValue;
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
		$this->TotalDoseOfStimulation->setDbValue($row['TotalDoseOfStimulation']);
		$this->Protocol->setDbValue($row['Protocol']);
		$this->NumberOfDaysOfStimulation->setDbValue($row['NumberOfDaysOfStimulation']);
		$this->TriggerDateTime->setDbValue($row['TriggerDateTime']);
		$this->OPUDateTime->setDbValue($row['OPUDateTime']);
		$this->HoursAfterTrigger->setDbValue($row['HoursAfterTrigger']);
		$this->SerumE2->setDbValue($row['SerumE2']);
		$this->SerumP4->setDbValue($row['SerumP4']);
		$this->FORT->setDbValue($row['FORT']);
		$this->ExperctedOocytes->setDbValue($row['ExperctedOocytes']);
		$this->NoOfOocytesRetrieved->setDbValue($row['NoOfOocytesRetrieved']);
		$this->OocytesRetreivalRate->setDbValue($row['OocytesRetreivalRate']);
		$this->Anesthesia->setDbValue($row['Anesthesia']);
		$this->TrialCannulation->setDbValue($row['TrialCannulation']);
		$this->UCL->setDbValue($row['UCL']);
		$this->Angle->setDbValue($row['Angle']);
		$this->EMS->setDbValue($row['EMS']);
		$this->Cannulation->setDbValue($row['Cannulation']);
		$this->ProcedureT->setDbValue($row['ProcedureT']);
		$this->NoOfOocytesRetrievedd->setDbValue($row['NoOfOocytesRetrievedd']);
		$this->CourseInHospital->setDbValue($row['CourseInHospital']);
		$this->DischargeAdvise->setDbValue($row['DischargeAdvise']);
		$this->FollowUpAdvise->setDbValue($row['FollowUpAdvise']);
		$this->PlanT->setDbValue($row['PlanT']);
		$this->ReviewDate->setDbValue($row['ReviewDate']);
		$this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
		$this->TemplateProcedure->setDbValue($row['TemplateProcedure']);
		$this->TemplateCourseInHospital->setDbValue($row['TemplateCourseInHospital']);
		$this->TemplateDischargeAdvise->setDbValue($row['TemplateDischargeAdvise']);
		$this->TemplateFollowUpAdvise->setDbValue($row['TemplateFollowUpAdvise']);
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
		$row['TotalDoseOfStimulation'] = NULL;
		$row['Protocol'] = NULL;
		$row['NumberOfDaysOfStimulation'] = NULL;
		$row['TriggerDateTime'] = NULL;
		$row['OPUDateTime'] = NULL;
		$row['HoursAfterTrigger'] = NULL;
		$row['SerumE2'] = NULL;
		$row['SerumP4'] = NULL;
		$row['FORT'] = NULL;
		$row['ExperctedOocytes'] = NULL;
		$row['NoOfOocytesRetrieved'] = NULL;
		$row['OocytesRetreivalRate'] = NULL;
		$row['Anesthesia'] = NULL;
		$row['TrialCannulation'] = NULL;
		$row['UCL'] = NULL;
		$row['Angle'] = NULL;
		$row['EMS'] = NULL;
		$row['Cannulation'] = NULL;
		$row['ProcedureT'] = NULL;
		$row['NoOfOocytesRetrievedd'] = NULL;
		$row['CourseInHospital'] = NULL;
		$row['DischargeAdvise'] = NULL;
		$row['FollowUpAdvise'] = NULL;
		$row['PlanT'] = NULL;
		$row['ReviewDate'] = NULL;
		$row['ReviewDoctor'] = NULL;
		$row['TemplateProcedure'] = NULL;
		$row['TemplateCourseInHospital'] = NULL;
		$row['TemplateDischargeAdvise'] = NULL;
		$row['TemplateFollowUpAdvise'] = NULL;
		$row['TidNo'] = NULL;
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
		// TotalDoseOfStimulation
		// Protocol
		// NumberOfDaysOfStimulation
		// TriggerDateTime
		// OPUDateTime
		// HoursAfterTrigger
		// SerumE2
		// SerumP4
		// FORT
		// ExperctedOocytes
		// NoOfOocytesRetrieved
		// OocytesRetreivalRate
		// Anesthesia
		// TrialCannulation
		// UCL
		// Angle
		// EMS
		// Cannulation
		// ProcedureT
		// NoOfOocytesRetrievedd
		// CourseInHospital
		// DischargeAdvise
		// FollowUpAdvise
		// PlanT
		// ReviewDate
		// ReviewDoctor
		// TemplateProcedure
		// TemplateCourseInHospital
		// TemplateDischargeAdvise
		// TemplateFollowUpAdvise
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
			$this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
			$this->ARTCycle->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->ViewValue = $this->TotalDoseOfStimulation->CurrentValue;
			$this->TotalDoseOfStimulation->ViewCustomAttributes = "";

			// Protocol
			if (strval($this->Protocol->CurrentValue) <> "") {
				$this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
			} else {
				$this->Protocol->ViewValue = NULL;
			}
			$this->Protocol->ViewCustomAttributes = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->ViewValue = $this->NumberOfDaysOfStimulation->CurrentValue;
			$this->NumberOfDaysOfStimulation->ViewCustomAttributes = "";

			// TriggerDateTime
			$this->TriggerDateTime->ViewValue = $this->TriggerDateTime->CurrentValue;
			$this->TriggerDateTime->ViewValue = FormatDateTime($this->TriggerDateTime->ViewValue, 0);
			$this->TriggerDateTime->ViewCustomAttributes = "";

			// OPUDateTime
			$this->OPUDateTime->ViewValue = $this->OPUDateTime->CurrentValue;
			$this->OPUDateTime->ViewValue = FormatDateTime($this->OPUDateTime->ViewValue, 0);
			$this->OPUDateTime->ViewCustomAttributes = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->ViewValue = $this->HoursAfterTrigger->CurrentValue;
			$this->HoursAfterTrigger->ViewCustomAttributes = "";

			// SerumE2
			$this->SerumE2->ViewValue = $this->SerumE2->CurrentValue;
			$this->SerumE2->ViewCustomAttributes = "";

			// SerumP4
			$this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
			$this->SerumP4->ViewCustomAttributes = "";

			// FORT
			$this->FORT->ViewValue = $this->FORT->CurrentValue;
			$this->FORT->ViewCustomAttributes = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->ViewValue = $this->ExperctedOocytes->CurrentValue;
			$this->ExperctedOocytes->ViewCustomAttributes = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->ViewValue = $this->NoOfOocytesRetrieved->CurrentValue;
			$this->NoOfOocytesRetrieved->ViewCustomAttributes = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->ViewValue = $this->OocytesRetreivalRate->CurrentValue;
			$this->OocytesRetreivalRate->ViewCustomAttributes = "";

			// Anesthesia
			$this->Anesthesia->ViewValue = $this->Anesthesia->CurrentValue;
			$this->Anesthesia->ViewCustomAttributes = "";

			// TrialCannulation
			$this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
			$this->TrialCannulation->ViewCustomAttributes = "";

			// UCL
			$this->UCL->ViewValue = $this->UCL->CurrentValue;
			$this->UCL->ViewCustomAttributes = "";

			// Angle
			$this->Angle->ViewValue = $this->Angle->CurrentValue;
			$this->Angle->ViewCustomAttributes = "";

			// EMS
			$this->EMS->ViewValue = $this->EMS->CurrentValue;
			$this->EMS->ViewCustomAttributes = "";

			// Cannulation
			if (strval($this->Cannulation->CurrentValue) <> "") {
				$this->Cannulation->ViewValue = $this->Cannulation->optionCaption($this->Cannulation->CurrentValue);
			} else {
				$this->Cannulation->ViewValue = NULL;
			}
			$this->Cannulation->ViewCustomAttributes = "";

			// ProcedureT
			$this->ProcedureT->ViewValue = $this->ProcedureT->CurrentValue;
			$this->ProcedureT->ViewCustomAttributes = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->ViewValue = $this->NoOfOocytesRetrievedd->CurrentValue;
			$this->NoOfOocytesRetrievedd->ViewCustomAttributes = "";

			// CourseInHospital
			$this->CourseInHospital->ViewValue = $this->CourseInHospital->CurrentValue;
			$this->CourseInHospital->ViewCustomAttributes = "";

			// DischargeAdvise
			$this->DischargeAdvise->ViewValue = $this->DischargeAdvise->CurrentValue;
			$this->DischargeAdvise->ViewCustomAttributes = "";

			// FollowUpAdvise
			$this->FollowUpAdvise->ViewValue = $this->FollowUpAdvise->CurrentValue;
			$this->FollowUpAdvise->ViewCustomAttributes = "";

			// PlanT
			if (strval($this->PlanT->CurrentValue) <> "") {
				$this->PlanT->ViewValue = $this->PlanT->optionCaption($this->PlanT->CurrentValue);
			} else {
				$this->PlanT->ViewValue = NULL;
			}
			$this->PlanT->ViewCustomAttributes = "";

			// ReviewDate
			$this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
			$this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
			$this->ReviewDate->ViewCustomAttributes = "";

			// ReviewDoctor
			$this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
			$this->ReviewDoctor->ViewCustomAttributes = "";

			// TemplateProcedure
			$curVal = strval($this->TemplateProcedure->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->lookupCacheOption($curVal);
				if ($this->TemplateProcedure->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ovum Procedure'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateProcedure->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->CurrentValue;
					}
				}
			} else {
				$this->TemplateProcedure->ViewValue = NULL;
			}
			$this->TemplateProcedure->ViewCustomAttributes = "";

			// TemplateCourseInHospital
			$curVal = strval($this->TemplateCourseInHospital->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->lookupCacheOption($curVal);
				if ($this->TemplateCourseInHospital->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ovum Course In Hospital'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateCourseInHospital->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->CurrentValue;
					}
				}
			} else {
				$this->TemplateCourseInHospital->ViewValue = NULL;
			}
			$this->TemplateCourseInHospital->ViewCustomAttributes = "";

			// TemplateDischargeAdvise
			$curVal = strval($this->TemplateDischargeAdvise->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->lookupCacheOption($curVal);
				if ($this->TemplateDischargeAdvise->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ovum Discharge Advise'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateDischargeAdvise->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->CurrentValue;
					}
				}
			} else {
				$this->TemplateDischargeAdvise->ViewValue = NULL;
			}
			$this->TemplateDischargeAdvise->ViewCustomAttributes = "";

			// TemplateFollowUpAdvise
			$curVal = strval($this->TemplateFollowUpAdvise->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->lookupCacheOption($curVal);
				if ($this->TemplateFollowUpAdvise->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='ovum Follow Up Advise'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateFollowUpAdvise->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->CurrentValue;
					}
				}
			} else {
				$this->TemplateFollowUpAdvise->ViewValue = NULL;
			}
			$this->TemplateFollowUpAdvise->ViewCustomAttributes = "";

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

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->LinkCustomAttributes = "";
			$this->TotalDoseOfStimulation->HrefValue = "";
			$this->TotalDoseOfStimulation->TooltipValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";
			$this->Protocol->TooltipValue = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
			$this->NumberOfDaysOfStimulation->HrefValue = "";
			$this->NumberOfDaysOfStimulation->TooltipValue = "";

			// TriggerDateTime
			$this->TriggerDateTime->LinkCustomAttributes = "";
			$this->TriggerDateTime->HrefValue = "";
			$this->TriggerDateTime->TooltipValue = "";

			// OPUDateTime
			$this->OPUDateTime->LinkCustomAttributes = "";
			$this->OPUDateTime->HrefValue = "";
			$this->OPUDateTime->TooltipValue = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->LinkCustomAttributes = "";
			$this->HoursAfterTrigger->HrefValue = "";
			$this->HoursAfterTrigger->TooltipValue = "";

			// SerumE2
			$this->SerumE2->LinkCustomAttributes = "";
			$this->SerumE2->HrefValue = "";
			$this->SerumE2->TooltipValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";
			$this->SerumP4->TooltipValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";
			$this->FORT->TooltipValue = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->LinkCustomAttributes = "";
			$this->ExperctedOocytes->HrefValue = "";
			$this->ExperctedOocytes->TooltipValue = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrieved->HrefValue = "";
			$this->NoOfOocytesRetrieved->TooltipValue = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->LinkCustomAttributes = "";
			$this->OocytesRetreivalRate->HrefValue = "";
			$this->OocytesRetreivalRate->TooltipValue = "";

			// Anesthesia
			$this->Anesthesia->LinkCustomAttributes = "";
			$this->Anesthesia->HrefValue = "";
			$this->Anesthesia->TooltipValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";
			$this->TrialCannulation->TooltipValue = "";

			// UCL
			$this->UCL->LinkCustomAttributes = "";
			$this->UCL->HrefValue = "";
			$this->UCL->TooltipValue = "";

			// Angle
			$this->Angle->LinkCustomAttributes = "";
			$this->Angle->HrefValue = "";
			$this->Angle->TooltipValue = "";

			// EMS
			$this->EMS->LinkCustomAttributes = "";
			$this->EMS->HrefValue = "";
			$this->EMS->TooltipValue = "";

			// Cannulation
			$this->Cannulation->LinkCustomAttributes = "";
			$this->Cannulation->HrefValue = "";
			$this->Cannulation->TooltipValue = "";

			// ProcedureT
			$this->ProcedureT->LinkCustomAttributes = "";
			$this->ProcedureT->HrefValue = "";
			$this->ProcedureT->TooltipValue = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrievedd->HrefValue = "";
			$this->NoOfOocytesRetrievedd->TooltipValue = "";

			// CourseInHospital
			$this->CourseInHospital->LinkCustomAttributes = "";
			$this->CourseInHospital->HrefValue = "";
			$this->CourseInHospital->TooltipValue = "";

			// DischargeAdvise
			$this->DischargeAdvise->LinkCustomAttributes = "";
			$this->DischargeAdvise->HrefValue = "";
			$this->DischargeAdvise->TooltipValue = "";

			// FollowUpAdvise
			$this->FollowUpAdvise->LinkCustomAttributes = "";
			$this->FollowUpAdvise->HrefValue = "";
			$this->FollowUpAdvise->TooltipValue = "";

			// PlanT
			$this->PlanT->LinkCustomAttributes = "";
			$this->PlanT->HrefValue = "";
			$this->PlanT->TooltipValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";
			$this->ReviewDate->TooltipValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";
			$this->ReviewDoctor->TooltipValue = "";

			// TemplateProcedure
			$this->TemplateProcedure->LinkCustomAttributes = "";
			$this->TemplateProcedure->HrefValue = "";
			$this->TemplateProcedure->TooltipValue = "";

			// TemplateCourseInHospital
			$this->TemplateCourseInHospital->LinkCustomAttributes = "";
			$this->TemplateCourseInHospital->HrefValue = "";
			$this->TemplateCourseInHospital->TooltipValue = "";

			// TemplateDischargeAdvise
			$this->TemplateDischargeAdvise->LinkCustomAttributes = "";
			$this->TemplateDischargeAdvise->HrefValue = "";
			$this->TemplateDischargeAdvise->TooltipValue = "";

			// TemplateFollowUpAdvise
			$this->TemplateFollowUpAdvise->LinkCustomAttributes = "";
			$this->TemplateFollowUpAdvise->HrefValue = "";
			$this->TemplateFollowUpAdvise->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

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
			if (REMOVE_XSS)
				$this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
			$this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
			$this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
			$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->EditAttrs["class"] = "form-control";
			$this->TotalDoseOfStimulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalDoseOfStimulation->CurrentValue = HtmlDecode($this->TotalDoseOfStimulation->CurrentValue);
			$this->TotalDoseOfStimulation->EditValue = HtmlEncode($this->TotalDoseOfStimulation->CurrentValue);
			$this->TotalDoseOfStimulation->PlaceHolder = RemoveHtml($this->TotalDoseOfStimulation->caption());

			// Protocol
			$this->Protocol->EditAttrs["class"] = "form-control";
			$this->Protocol->EditCustomAttributes = "";
			$this->Protocol->EditValue = $this->Protocol->options(TRUE);

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->EditAttrs["class"] = "form-control";
			$this->NumberOfDaysOfStimulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NumberOfDaysOfStimulation->CurrentValue = HtmlDecode($this->NumberOfDaysOfStimulation->CurrentValue);
			$this->NumberOfDaysOfStimulation->EditValue = HtmlEncode($this->NumberOfDaysOfStimulation->CurrentValue);
			$this->NumberOfDaysOfStimulation->PlaceHolder = RemoveHtml($this->NumberOfDaysOfStimulation->caption());

			// TriggerDateTime
			$this->TriggerDateTime->EditAttrs["class"] = "form-control";
			$this->TriggerDateTime->EditCustomAttributes = "";
			$this->TriggerDateTime->EditValue = HtmlEncode(FormatDateTime($this->TriggerDateTime->CurrentValue, 8));
			$this->TriggerDateTime->PlaceHolder = RemoveHtml($this->TriggerDateTime->caption());

			// OPUDateTime
			$this->OPUDateTime->EditAttrs["class"] = "form-control";
			$this->OPUDateTime->EditCustomAttributes = "";
			$this->OPUDateTime->EditValue = HtmlEncode(FormatDateTime($this->OPUDateTime->CurrentValue, 8));
			$this->OPUDateTime->PlaceHolder = RemoveHtml($this->OPUDateTime->caption());

			// HoursAfterTrigger
			$this->HoursAfterTrigger->EditAttrs["class"] = "form-control";
			$this->HoursAfterTrigger->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HoursAfterTrigger->CurrentValue = HtmlDecode($this->HoursAfterTrigger->CurrentValue);
			$this->HoursAfterTrigger->EditValue = HtmlEncode($this->HoursAfterTrigger->CurrentValue);
			$this->HoursAfterTrigger->PlaceHolder = RemoveHtml($this->HoursAfterTrigger->caption());

			// SerumE2
			$this->SerumE2->EditAttrs["class"] = "form-control";
			$this->SerumE2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SerumE2->CurrentValue = HtmlDecode($this->SerumE2->CurrentValue);
			$this->SerumE2->EditValue = HtmlEncode($this->SerumE2->CurrentValue);
			$this->SerumE2->PlaceHolder = RemoveHtml($this->SerumE2->caption());

			// SerumP4
			$this->SerumP4->EditAttrs["class"] = "form-control";
			$this->SerumP4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
			$this->SerumP4->EditValue = HtmlEncode($this->SerumP4->CurrentValue);
			$this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

			// FORT
			$this->FORT->EditAttrs["class"] = "form-control";
			$this->FORT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
			$this->FORT->EditValue = HtmlEncode($this->FORT->CurrentValue);
			$this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

			// ExperctedOocytes
			$this->ExperctedOocytes->EditAttrs["class"] = "form-control";
			$this->ExperctedOocytes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ExperctedOocytes->CurrentValue = HtmlDecode($this->ExperctedOocytes->CurrentValue);
			$this->ExperctedOocytes->EditValue = HtmlEncode($this->ExperctedOocytes->CurrentValue);
			$this->ExperctedOocytes->PlaceHolder = RemoveHtml($this->ExperctedOocytes->caption());

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->EditAttrs["class"] = "form-control";
			$this->NoOfOocytesRetrieved->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytesRetrieved->CurrentValue = HtmlDecode($this->NoOfOocytesRetrieved->CurrentValue);
			$this->NoOfOocytesRetrieved->EditValue = HtmlEncode($this->NoOfOocytesRetrieved->CurrentValue);
			$this->NoOfOocytesRetrieved->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrieved->caption());

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->EditAttrs["class"] = "form-control";
			$this->OocytesRetreivalRate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesRetreivalRate->CurrentValue = HtmlDecode($this->OocytesRetreivalRate->CurrentValue);
			$this->OocytesRetreivalRate->EditValue = HtmlEncode($this->OocytesRetreivalRate->CurrentValue);
			$this->OocytesRetreivalRate->PlaceHolder = RemoveHtml($this->OocytesRetreivalRate->caption());

			// Anesthesia
			$this->Anesthesia->EditAttrs["class"] = "form-control";
			$this->Anesthesia->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Anesthesia->CurrentValue = HtmlDecode($this->Anesthesia->CurrentValue);
			$this->Anesthesia->EditValue = HtmlEncode($this->Anesthesia->CurrentValue);
			$this->Anesthesia->PlaceHolder = RemoveHtml($this->Anesthesia->caption());

			// TrialCannulation
			$this->TrialCannulation->EditAttrs["class"] = "form-control";
			$this->TrialCannulation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
			$this->TrialCannulation->EditValue = HtmlEncode($this->TrialCannulation->CurrentValue);
			$this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

			// UCL
			$this->UCL->EditAttrs["class"] = "form-control";
			$this->UCL->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UCL->CurrentValue = HtmlDecode($this->UCL->CurrentValue);
			$this->UCL->EditValue = HtmlEncode($this->UCL->CurrentValue);
			$this->UCL->PlaceHolder = RemoveHtml($this->UCL->caption());

			// Angle
			$this->Angle->EditAttrs["class"] = "form-control";
			$this->Angle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Angle->CurrentValue = HtmlDecode($this->Angle->CurrentValue);
			$this->Angle->EditValue = HtmlEncode($this->Angle->CurrentValue);
			$this->Angle->PlaceHolder = RemoveHtml($this->Angle->caption());

			// EMS
			$this->EMS->EditAttrs["class"] = "form-control";
			$this->EMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EMS->CurrentValue = HtmlDecode($this->EMS->CurrentValue);
			$this->EMS->EditValue = HtmlEncode($this->EMS->CurrentValue);
			$this->EMS->PlaceHolder = RemoveHtml($this->EMS->caption());

			// Cannulation
			$this->Cannulation->EditAttrs["class"] = "form-control";
			$this->Cannulation->EditCustomAttributes = "";
			$this->Cannulation->EditValue = $this->Cannulation->options(TRUE);

			// ProcedureT
			$this->ProcedureT->EditAttrs["class"] = "form-control";
			$this->ProcedureT->EditCustomAttributes = "";
			$this->ProcedureT->EditValue = HtmlEncode($this->ProcedureT->CurrentValue);
			$this->ProcedureT->PlaceHolder = RemoveHtml($this->ProcedureT->caption());

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->EditAttrs["class"] = "form-control";
			$this->NoOfOocytesRetrievedd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytesRetrievedd->CurrentValue = HtmlDecode($this->NoOfOocytesRetrievedd->CurrentValue);
			$this->NoOfOocytesRetrievedd->EditValue = HtmlEncode($this->NoOfOocytesRetrievedd->CurrentValue);
			$this->NoOfOocytesRetrievedd->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrievedd->caption());

			// CourseInHospital
			$this->CourseInHospital->EditAttrs["class"] = "form-control";
			$this->CourseInHospital->EditCustomAttributes = "";
			$this->CourseInHospital->EditValue = HtmlEncode($this->CourseInHospital->CurrentValue);
			$this->CourseInHospital->PlaceHolder = RemoveHtml($this->CourseInHospital->caption());

			// DischargeAdvise
			$this->DischargeAdvise->EditAttrs["class"] = "form-control";
			$this->DischargeAdvise->EditCustomAttributes = "";
			$this->DischargeAdvise->EditValue = HtmlEncode($this->DischargeAdvise->CurrentValue);
			$this->DischargeAdvise->PlaceHolder = RemoveHtml($this->DischargeAdvise->caption());

			// FollowUpAdvise
			$this->FollowUpAdvise->EditAttrs["class"] = "form-control";
			$this->FollowUpAdvise->EditCustomAttributes = "";
			$this->FollowUpAdvise->EditValue = HtmlEncode($this->FollowUpAdvise->CurrentValue);
			$this->FollowUpAdvise->PlaceHolder = RemoveHtml($this->FollowUpAdvise->caption());

			// PlanT
			$this->PlanT->EditAttrs["class"] = "form-control";
			$this->PlanT->EditCustomAttributes = "";
			$this->PlanT->EditValue = $this->PlanT->options(TRUE);

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

			// TemplateProcedure
			$this->TemplateProcedure->EditAttrs["class"] = "form-control";
			$this->TemplateProcedure->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateProcedure->CurrentValue));
			if ($curVal <> "")
				$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->lookupCacheOption($curVal);
			else
				$this->TemplateProcedure->ViewValue = $this->TemplateProcedure->Lookup !== NULL && is_array($this->TemplateProcedure->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateProcedure->ViewValue !== NULL) { // Load from cache
				$this->TemplateProcedure->EditValue = array_values($this->TemplateProcedure->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateProcedure->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ovum Procedure'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateProcedure->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateProcedure->EditValue = $arwrk;
			}

			// TemplateCourseInHospital
			$this->TemplateCourseInHospital->EditAttrs["class"] = "form-control";
			$this->TemplateCourseInHospital->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateCourseInHospital->CurrentValue));
			if ($curVal <> "")
				$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->lookupCacheOption($curVal);
			else
				$this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->Lookup !== NULL && is_array($this->TemplateCourseInHospital->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateCourseInHospital->ViewValue !== NULL) { // Load from cache
				$this->TemplateCourseInHospital->EditValue = array_values($this->TemplateCourseInHospital->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateCourseInHospital->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ovum Course In Hospital'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateCourseInHospital->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateCourseInHospital->EditValue = $arwrk;
			}

			// TemplateDischargeAdvise
			$this->TemplateDischargeAdvise->EditAttrs["class"] = "form-control";
			$this->TemplateDischargeAdvise->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateDischargeAdvise->CurrentValue));
			if ($curVal <> "")
				$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->lookupCacheOption($curVal);
			else
				$this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->Lookup !== NULL && is_array($this->TemplateDischargeAdvise->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateDischargeAdvise->ViewValue !== NULL) { // Load from cache
				$this->TemplateDischargeAdvise->EditValue = array_values($this->TemplateDischargeAdvise->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateDischargeAdvise->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ovum Discharge Advise'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateDischargeAdvise->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateDischargeAdvise->EditValue = $arwrk;
			}

			// TemplateFollowUpAdvise
			$this->TemplateFollowUpAdvise->EditAttrs["class"] = "form-control";
			$this->TemplateFollowUpAdvise->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateFollowUpAdvise->CurrentValue));
			if ($curVal <> "")
				$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->lookupCacheOption($curVal);
			else
				$this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->Lookup !== NULL && is_array($this->TemplateFollowUpAdvise->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateFollowUpAdvise->ViewValue !== NULL) { // Load from cache
				$this->TemplateFollowUpAdvise->EditValue = array_values($this->TemplateFollowUpAdvise->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFollowUpAdvise->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='ovum Follow Up Advise'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFollowUpAdvise->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateFollowUpAdvise->EditValue = $arwrk;
			}

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

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

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->LinkCustomAttributes = "";
			$this->TotalDoseOfStimulation->HrefValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
			$this->NumberOfDaysOfStimulation->HrefValue = "";

			// TriggerDateTime
			$this->TriggerDateTime->LinkCustomAttributes = "";
			$this->TriggerDateTime->HrefValue = "";

			// OPUDateTime
			$this->OPUDateTime->LinkCustomAttributes = "";
			$this->OPUDateTime->HrefValue = "";

			// HoursAfterTrigger
			$this->HoursAfterTrigger->LinkCustomAttributes = "";
			$this->HoursAfterTrigger->HrefValue = "";

			// SerumE2
			$this->SerumE2->LinkCustomAttributes = "";
			$this->SerumE2->HrefValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";

			// ExperctedOocytes
			$this->ExperctedOocytes->LinkCustomAttributes = "";
			$this->ExperctedOocytes->HrefValue = "";

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrieved->HrefValue = "";

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->LinkCustomAttributes = "";
			$this->OocytesRetreivalRate->HrefValue = "";

			// Anesthesia
			$this->Anesthesia->LinkCustomAttributes = "";
			$this->Anesthesia->HrefValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";

			// UCL
			$this->UCL->LinkCustomAttributes = "";
			$this->UCL->HrefValue = "";

			// Angle
			$this->Angle->LinkCustomAttributes = "";
			$this->Angle->HrefValue = "";

			// EMS
			$this->EMS->LinkCustomAttributes = "";
			$this->EMS->HrefValue = "";

			// Cannulation
			$this->Cannulation->LinkCustomAttributes = "";
			$this->Cannulation->HrefValue = "";

			// ProcedureT
			$this->ProcedureT->LinkCustomAttributes = "";
			$this->ProcedureT->HrefValue = "";

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
			$this->NoOfOocytesRetrievedd->HrefValue = "";

			// CourseInHospital
			$this->CourseInHospital->LinkCustomAttributes = "";
			$this->CourseInHospital->HrefValue = "";

			// DischargeAdvise
			$this->DischargeAdvise->LinkCustomAttributes = "";
			$this->DischargeAdvise->HrefValue = "";

			// FollowUpAdvise
			$this->FollowUpAdvise->LinkCustomAttributes = "";
			$this->FollowUpAdvise->HrefValue = "";

			// PlanT
			$this->PlanT->LinkCustomAttributes = "";
			$this->PlanT->HrefValue = "";

			// ReviewDate
			$this->ReviewDate->LinkCustomAttributes = "";
			$this->ReviewDate->HrefValue = "";

			// ReviewDoctor
			$this->ReviewDoctor->LinkCustomAttributes = "";
			$this->ReviewDoctor->HrefValue = "";

			// TemplateProcedure
			$this->TemplateProcedure->LinkCustomAttributes = "";
			$this->TemplateProcedure->HrefValue = "";

			// TemplateCourseInHospital
			$this->TemplateCourseInHospital->LinkCustomAttributes = "";
			$this->TemplateCourseInHospital->HrefValue = "";

			// TemplateDischargeAdvise
			$this->TemplateDischargeAdvise->LinkCustomAttributes = "";
			$this->TemplateDischargeAdvise->HrefValue = "";

			// TemplateFollowUpAdvise
			$this->TemplateFollowUpAdvise->LinkCustomAttributes = "";
			$this->TemplateFollowUpAdvise->HrefValue = "";

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
		if ($this->TotalDoseOfStimulation->Required) {
			if (!$this->TotalDoseOfStimulation->IsDetailKey && $this->TotalDoseOfStimulation->FormValue != NULL && $this->TotalDoseOfStimulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalDoseOfStimulation->caption(), $this->TotalDoseOfStimulation->RequiredErrorMessage));
			}
		}
		if ($this->Protocol->Required) {
			if (!$this->Protocol->IsDetailKey && $this->Protocol->FormValue != NULL && $this->Protocol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Protocol->caption(), $this->Protocol->RequiredErrorMessage));
			}
		}
		if ($this->NumberOfDaysOfStimulation->Required) {
			if (!$this->NumberOfDaysOfStimulation->IsDetailKey && $this->NumberOfDaysOfStimulation->FormValue != NULL && $this->NumberOfDaysOfStimulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NumberOfDaysOfStimulation->caption(), $this->NumberOfDaysOfStimulation->RequiredErrorMessage));
			}
		}
		if ($this->TriggerDateTime->Required) {
			if (!$this->TriggerDateTime->IsDetailKey && $this->TriggerDateTime->FormValue != NULL && $this->TriggerDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TriggerDateTime->caption(), $this->TriggerDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->TriggerDateTime->FormValue)) {
			AddMessage($FormError, $this->TriggerDateTime->errorMessage());
		}
		if ($this->OPUDateTime->Required) {
			if (!$this->OPUDateTime->IsDetailKey && $this->OPUDateTime->FormValue != NULL && $this->OPUDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPUDateTime->caption(), $this->OPUDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->OPUDateTime->FormValue)) {
			AddMessage($FormError, $this->OPUDateTime->errorMessage());
		}
		if ($this->HoursAfterTrigger->Required) {
			if (!$this->HoursAfterTrigger->IsDetailKey && $this->HoursAfterTrigger->FormValue != NULL && $this->HoursAfterTrigger->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HoursAfterTrigger->caption(), $this->HoursAfterTrigger->RequiredErrorMessage));
			}
		}
		if ($this->SerumE2->Required) {
			if (!$this->SerumE2->IsDetailKey && $this->SerumE2->FormValue != NULL && $this->SerumE2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SerumE2->caption(), $this->SerumE2->RequiredErrorMessage));
			}
		}
		if ($this->SerumP4->Required) {
			if (!$this->SerumP4->IsDetailKey && $this->SerumP4->FormValue != NULL && $this->SerumP4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SerumP4->caption(), $this->SerumP4->RequiredErrorMessage));
			}
		}
		if ($this->FORT->Required) {
			if (!$this->FORT->IsDetailKey && $this->FORT->FormValue != NULL && $this->FORT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FORT->caption(), $this->FORT->RequiredErrorMessage));
			}
		}
		if ($this->ExperctedOocytes->Required) {
			if (!$this->ExperctedOocytes->IsDetailKey && $this->ExperctedOocytes->FormValue != NULL && $this->ExperctedOocytes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExperctedOocytes->caption(), $this->ExperctedOocytes->RequiredErrorMessage));
			}
		}
		if ($this->NoOfOocytesRetrieved->Required) {
			if (!$this->NoOfOocytesRetrieved->IsDetailKey && $this->NoOfOocytesRetrieved->FormValue != NULL && $this->NoOfOocytesRetrieved->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfOocytesRetrieved->caption(), $this->NoOfOocytesRetrieved->RequiredErrorMessage));
			}
		}
		if ($this->OocytesRetreivalRate->Required) {
			if (!$this->OocytesRetreivalRate->IsDetailKey && $this->OocytesRetreivalRate->FormValue != NULL && $this->OocytesRetreivalRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesRetreivalRate->caption(), $this->OocytesRetreivalRate->RequiredErrorMessage));
			}
		}
		if ($this->Anesthesia->Required) {
			if (!$this->Anesthesia->IsDetailKey && $this->Anesthesia->FormValue != NULL && $this->Anesthesia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anesthesia->caption(), $this->Anesthesia->RequiredErrorMessage));
			}
		}
		if ($this->TrialCannulation->Required) {
			if (!$this->TrialCannulation->IsDetailKey && $this->TrialCannulation->FormValue != NULL && $this->TrialCannulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
			}
		}
		if ($this->UCL->Required) {
			if (!$this->UCL->IsDetailKey && $this->UCL->FormValue != NULL && $this->UCL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UCL->caption(), $this->UCL->RequiredErrorMessage));
			}
		}
		if ($this->Angle->Required) {
			if (!$this->Angle->IsDetailKey && $this->Angle->FormValue != NULL && $this->Angle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Angle->caption(), $this->Angle->RequiredErrorMessage));
			}
		}
		if ($this->EMS->Required) {
			if (!$this->EMS->IsDetailKey && $this->EMS->FormValue != NULL && $this->EMS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EMS->caption(), $this->EMS->RequiredErrorMessage));
			}
		}
		if ($this->Cannulation->Required) {
			if (!$this->Cannulation->IsDetailKey && $this->Cannulation->FormValue != NULL && $this->Cannulation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cannulation->caption(), $this->Cannulation->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureT->Required) {
			if (!$this->ProcedureT->IsDetailKey && $this->ProcedureT->FormValue != NULL && $this->ProcedureT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureT->caption(), $this->ProcedureT->RequiredErrorMessage));
			}
		}
		if ($this->NoOfOocytesRetrievedd->Required) {
			if (!$this->NoOfOocytesRetrievedd->IsDetailKey && $this->NoOfOocytesRetrievedd->FormValue != NULL && $this->NoOfOocytesRetrievedd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfOocytesRetrievedd->caption(), $this->NoOfOocytesRetrievedd->RequiredErrorMessage));
			}
		}
		if ($this->CourseInHospital->Required) {
			if (!$this->CourseInHospital->IsDetailKey && $this->CourseInHospital->FormValue != NULL && $this->CourseInHospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CourseInHospital->caption(), $this->CourseInHospital->RequiredErrorMessage));
			}
		}
		if ($this->DischargeAdvise->Required) {
			if (!$this->DischargeAdvise->IsDetailKey && $this->DischargeAdvise->FormValue != NULL && $this->DischargeAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DischargeAdvise->caption(), $this->DischargeAdvise->RequiredErrorMessage));
			}
		}
		if ($this->FollowUpAdvise->Required) {
			if (!$this->FollowUpAdvise->IsDetailKey && $this->FollowUpAdvise->FormValue != NULL && $this->FollowUpAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowUpAdvise->caption(), $this->FollowUpAdvise->RequiredErrorMessage));
			}
		}
		if ($this->PlanT->Required) {
			if (!$this->PlanT->IsDetailKey && $this->PlanT->FormValue != NULL && $this->PlanT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PlanT->caption(), $this->PlanT->RequiredErrorMessage));
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
		if ($this->TemplateProcedure->Required) {
			if (!$this->TemplateProcedure->IsDetailKey && $this->TemplateProcedure->FormValue != NULL && $this->TemplateProcedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateProcedure->caption(), $this->TemplateProcedure->RequiredErrorMessage));
			}
		}
		if ($this->TemplateCourseInHospital->Required) {
			if (!$this->TemplateCourseInHospital->IsDetailKey && $this->TemplateCourseInHospital->FormValue != NULL && $this->TemplateCourseInHospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateCourseInHospital->caption(), $this->TemplateCourseInHospital->RequiredErrorMessage));
			}
		}
		if ($this->TemplateDischargeAdvise->Required) {
			if (!$this->TemplateDischargeAdvise->IsDetailKey && $this->TemplateDischargeAdvise->FormValue != NULL && $this->TemplateDischargeAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateDischargeAdvise->caption(), $this->TemplateDischargeAdvise->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFollowUpAdvise->Required) {
			if (!$this->TemplateFollowUpAdvise->IsDetailKey && $this->TemplateFollowUpAdvise->FormValue != NULL && $this->TemplateFollowUpAdvise->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFollowUpAdvise->caption(), $this->TemplateFollowUpAdvise->RequiredErrorMessage));
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

			// RIDNo
			$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, $this->RIDNo->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// ARTCycle
			$this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, NULL, $this->ARTCycle->ReadOnly);

			// Consultant
			$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, $this->Consultant->ReadOnly);

			// TotalDoseOfStimulation
			$this->TotalDoseOfStimulation->setDbValueDef($rsnew, $this->TotalDoseOfStimulation->CurrentValue, NULL, $this->TotalDoseOfStimulation->ReadOnly);

			// Protocol
			$this->Protocol->setDbValueDef($rsnew, $this->Protocol->CurrentValue, NULL, $this->Protocol->ReadOnly);

			// NumberOfDaysOfStimulation
			$this->NumberOfDaysOfStimulation->setDbValueDef($rsnew, $this->NumberOfDaysOfStimulation->CurrentValue, NULL, $this->NumberOfDaysOfStimulation->ReadOnly);

			// TriggerDateTime
			$this->TriggerDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0), NULL, $this->TriggerDateTime->ReadOnly);

			// OPUDateTime
			$this->OPUDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDateTime->CurrentValue, 0), NULL, $this->OPUDateTime->ReadOnly);

			// HoursAfterTrigger
			$this->HoursAfterTrigger->setDbValueDef($rsnew, $this->HoursAfterTrigger->CurrentValue, NULL, $this->HoursAfterTrigger->ReadOnly);

			// SerumE2
			$this->SerumE2->setDbValueDef($rsnew, $this->SerumE2->CurrentValue, NULL, $this->SerumE2->ReadOnly);

			// SerumP4
			$this->SerumP4->setDbValueDef($rsnew, $this->SerumP4->CurrentValue, NULL, $this->SerumP4->ReadOnly);

			// FORT
			$this->FORT->setDbValueDef($rsnew, $this->FORT->CurrentValue, NULL, $this->FORT->ReadOnly);

			// ExperctedOocytes
			$this->ExperctedOocytes->setDbValueDef($rsnew, $this->ExperctedOocytes->CurrentValue, NULL, $this->ExperctedOocytes->ReadOnly);

			// NoOfOocytesRetrieved
			$this->NoOfOocytesRetrieved->setDbValueDef($rsnew, $this->NoOfOocytesRetrieved->CurrentValue, NULL, $this->NoOfOocytesRetrieved->ReadOnly);

			// OocytesRetreivalRate
			$this->OocytesRetreivalRate->setDbValueDef($rsnew, $this->OocytesRetreivalRate->CurrentValue, NULL, $this->OocytesRetreivalRate->ReadOnly);

			// Anesthesia
			$this->Anesthesia->setDbValueDef($rsnew, $this->Anesthesia->CurrentValue, NULL, $this->Anesthesia->ReadOnly);

			// TrialCannulation
			$this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, NULL, $this->TrialCannulation->ReadOnly);

			// UCL
			$this->UCL->setDbValueDef($rsnew, $this->UCL->CurrentValue, NULL, $this->UCL->ReadOnly);

			// Angle
			$this->Angle->setDbValueDef($rsnew, $this->Angle->CurrentValue, NULL, $this->Angle->ReadOnly);

			// EMS
			$this->EMS->setDbValueDef($rsnew, $this->EMS->CurrentValue, NULL, $this->EMS->ReadOnly);

			// Cannulation
			$this->Cannulation->setDbValueDef($rsnew, $this->Cannulation->CurrentValue, NULL, $this->Cannulation->ReadOnly);

			// ProcedureT
			$this->ProcedureT->setDbValueDef($rsnew, $this->ProcedureT->CurrentValue, NULL, $this->ProcedureT->ReadOnly);

			// NoOfOocytesRetrievedd
			$this->NoOfOocytesRetrievedd->setDbValueDef($rsnew, $this->NoOfOocytesRetrievedd->CurrentValue, NULL, $this->NoOfOocytesRetrievedd->ReadOnly);

			// CourseInHospital
			$this->CourseInHospital->setDbValueDef($rsnew, $this->CourseInHospital->CurrentValue, NULL, $this->CourseInHospital->ReadOnly);

			// DischargeAdvise
			$this->DischargeAdvise->setDbValueDef($rsnew, $this->DischargeAdvise->CurrentValue, NULL, $this->DischargeAdvise->ReadOnly);

			// FollowUpAdvise
			$this->FollowUpAdvise->setDbValueDef($rsnew, $this->FollowUpAdvise->CurrentValue, NULL, $this->FollowUpAdvise->ReadOnly);

			// PlanT
			$this->PlanT->setDbValueDef($rsnew, $this->PlanT->CurrentValue, NULL, $this->PlanT->ReadOnly);

			// ReviewDate
			$this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), NULL, $this->ReviewDate->ReadOnly);

			// ReviewDoctor
			$this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, NULL, $this->ReviewDoctor->ReadOnly);

			// TemplateProcedure
			$this->TemplateProcedure->setDbValueDef($rsnew, $this->TemplateProcedure->CurrentValue, "", $this->TemplateProcedure->ReadOnly);

			// TemplateCourseInHospital
			$this->TemplateCourseInHospital->setDbValueDef($rsnew, $this->TemplateCourseInHospital->CurrentValue, "", $this->TemplateCourseInHospital->ReadOnly);

			// TemplateDischargeAdvise
			$this->TemplateDischargeAdvise->setDbValueDef($rsnew, $this->TemplateDischargeAdvise->CurrentValue, "", $this->TemplateDischargeAdvise->ReadOnly);

			// TemplateFollowUpAdvise
			$this->TemplateFollowUpAdvise->setDbValueDef($rsnew, $this->TemplateFollowUpAdvise->CurrentValue, "", $this->TemplateFollowUpAdvise->ReadOnly);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_ovum_pick_up_chartlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_TemplateProcedure":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Procedure'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateCourseInHospital":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Course In Hospital'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateDischargeAdvise":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Discharge Advise'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpAdvise":
					$lookupFilter = function() {
						return "`TemplateType`='ovum Follow Up Advise'";
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
						case "x_TemplateProcedure":
							break;
						case "x_TemplateCourseInHospital":
							break;
						case "x_TemplateDischargeAdvise":
							break;
						case "x_TemplateFollowUpAdvise":
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
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class appointment_scheduler_add extends appointment_scheduler
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'appointment_scheduler';

	// Page object name
	public $PageObjName = "appointment_scheduler_add";

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

		// Table object (appointment_scheduler)
		if (!isset($GLOBALS["appointment_scheduler"]) || get_class($GLOBALS["appointment_scheduler"]) == PROJECT_NAMESPACE . "appointment_scheduler") {
			$GLOBALS["appointment_scheduler"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["appointment_scheduler"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (doctors)
		if (!isset($GLOBALS['doctors']))
			$GLOBALS['doctors'] = new doctors();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'appointment_scheduler');

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
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$SkipHeaderFooter = $OldSkipHeaderFooter;
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $appointment_scheduler;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($appointment_scheduler);
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
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "appointment_schedulerview.php")
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
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canAdd()) {
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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("appointment_schedulerlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$OldSkipHeaderFooter = $SkipHeaderFooter;
		$SkipHeaderFooter = TRUE;
		$this->id->Visible = FALSE;
		$this->start_date->setVisibility();
		$this->end_date->setVisibility();
		$this->patientID->setVisibility();
		$this->patientName->setVisibility();
		$this->DoctorID->setVisibility();
		$this->DoctorName->setVisibility();
		$this->AppointmentStatus->setVisibility();
		$this->status->setVisibility();
		$this->DoctorCode->setVisibility();
		$this->Department->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->text->setVisibility();
		$this->appointment_status->setVisibility();
		$this->PId->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->SchEmail->setVisibility();
		$this->appointment_type->setVisibility();
		$this->Notified->setVisibility();
		$this->Purpose->setVisibility();
		$this->Notes->setVisibility();
		$this->PatientType->setVisibility();
		$this->Referal->setVisibility();
		$this->paymentType->setVisibility();
		$this->tittle->setVisibility();
		$this->gendar->setVisibility();
		$this->Dob->setVisibility();
		$this->Age->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->createdBy->setVisibility();
		$this->createdDateTime->setVisibility();
		$this->PatientTypee->setVisibility();
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
		$this->setupLookupOptions($this->patientID);
		$this->setupLookupOptions($this->DoctorName);
		$this->setupLookupOptions($this->Referal);
		$this->setupLookupOptions($this->tittle);
		$this->setupLookupOptions($this->gendar);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->PatientTypee);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("appointment_schedulerlist.php");
			return;
		}

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
					$this->terminate("appointment_schedulerlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "appointment_schedulerlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "appointment_schedulerview.php")
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
		$this->start_date->CurrentValue = NULL;
		$this->start_date->OldValue = $this->start_date->CurrentValue;
		$this->end_date->CurrentValue = NULL;
		$this->end_date->OldValue = $this->end_date->CurrentValue;
		$this->patientID->CurrentValue = NULL;
		$this->patientID->OldValue = $this->patientID->CurrentValue;
		$this->patientName->CurrentValue = NULL;
		$this->patientName->OldValue = $this->patientName->CurrentValue;
		$this->DoctorID->CurrentValue = NULL;
		$this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
		$this->DoctorName->CurrentValue = NULL;
		$this->DoctorName->OldValue = $this->DoctorName->CurrentValue;
		$this->AppointmentStatus->CurrentValue = NULL;
		$this->AppointmentStatus->OldValue = $this->AppointmentStatus->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->DoctorCode->CurrentValue = NULL;
		$this->DoctorCode->OldValue = $this->DoctorCode->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->scheduler_id->CurrentValue = NULL;
		$this->scheduler_id->OldValue = $this->scheduler_id->CurrentValue;
		$this->text->CurrentValue = NULL;
		$this->text->OldValue = $this->text->CurrentValue;
		$this->appointment_status->CurrentValue = NULL;
		$this->appointment_status->OldValue = $this->appointment_status->CurrentValue;
		$this->PId->CurrentValue = NULL;
		$this->PId->OldValue = $this->PId->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->SchEmail->CurrentValue = NULL;
		$this->SchEmail->OldValue = $this->SchEmail->CurrentValue;
		$this->appointment_type->CurrentValue = NULL;
		$this->appointment_type->OldValue = $this->appointment_type->CurrentValue;
		$this->Notified->CurrentValue = NULL;
		$this->Notified->OldValue = $this->Notified->CurrentValue;
		$this->Purpose->CurrentValue = NULL;
		$this->Purpose->OldValue = $this->Purpose->CurrentValue;
		$this->Notes->CurrentValue = NULL;
		$this->Notes->OldValue = $this->Notes->CurrentValue;
		$this->PatientType->CurrentValue = NULL;
		$this->PatientType->OldValue = $this->PatientType->CurrentValue;
		$this->Referal->CurrentValue = NULL;
		$this->Referal->OldValue = $this->Referal->CurrentValue;
		$this->paymentType->CurrentValue = NULL;
		$this->paymentType->OldValue = $this->paymentType->CurrentValue;
		$this->tittle->CurrentValue = NULL;
		$this->tittle->OldValue = $this->tittle->CurrentValue;
		$this->gendar->CurrentValue = NULL;
		$this->gendar->OldValue = $this->gendar->CurrentValue;
		$this->Dob->CurrentValue = NULL;
		$this->Dob->OldValue = $this->Dob->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->WhereDidYouHear->CurrentValue = NULL;
		$this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->createdBy->CurrentValue = NULL;
		$this->createdBy->OldValue = $this->createdBy->CurrentValue;
		$this->createdDateTime->CurrentValue = NULL;
		$this->createdDateTime->OldValue = $this->createdDateTime->CurrentValue;
		$this->PatientTypee->CurrentValue = NULL;
		$this->PatientTypee->OldValue = $this->PatientTypee->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'start_date' first before field var 'x_start_date'
		$val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
		if (!$this->start_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->start_date->Visible = FALSE; // Disable update for API request
			else
				$this->start_date->setFormValue($val);
			$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		}

		// Check field name 'end_date' first before field var 'x_end_date'
		$val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
		if (!$this->end_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->end_date->Visible = FALSE; // Disable update for API request
			else
				$this->end_date->setFormValue($val);
			$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		}

		// Check field name 'patientID' first before field var 'x_patientID'
		$val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
		if (!$this->patientID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patientID->Visible = FALSE; // Disable update for API request
			else
				$this->patientID->setFormValue($val);
		}

		// Check field name 'patientName' first before field var 'x_patientName'
		$val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
		if (!$this->patientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patientName->Visible = FALSE; // Disable update for API request
			else
				$this->patientName->setFormValue($val);
		}

		// Check field name 'DoctorID' first before field var 'x_DoctorID'
		$val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
		if (!$this->DoctorID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DoctorID->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorID->setFormValue($val);
		}

		// Check field name 'DoctorName' first before field var 'x_DoctorName'
		$val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
		if (!$this->DoctorName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DoctorName->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorName->setFormValue($val);
		}

		// Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
		$val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
		if (!$this->AppointmentStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AppointmentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->AppointmentStatus->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'DoctorCode' first before field var 'x_DoctorCode'
		$val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
		if (!$this->DoctorCode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DoctorCode->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorCode->setFormValue($val);
		}

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}

		// Check field name 'scheduler_id' first before field var 'x_scheduler_id'
		$val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
		if (!$this->scheduler_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->scheduler_id->Visible = FALSE; // Disable update for API request
			else
				$this->scheduler_id->setFormValue($val);
		}

		// Check field name 'text' first before field var 'x_text'
		$val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
		if (!$this->text->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->text->Visible = FALSE; // Disable update for API request
			else
				$this->text->setFormValue($val);
		}

		// Check field name 'appointment_status' first before field var 'x_appointment_status'
		$val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
		if (!$this->appointment_status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->appointment_status->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_status->setFormValue($val);
		}

		// Check field name 'PId' first before field var 'x_PId'
		$val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
		if (!$this->PId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PId->Visible = FALSE; // Disable update for API request
			else
				$this->PId->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}

		// Check field name 'SchEmail' first before field var 'x_SchEmail'
		$val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
		if (!$this->SchEmail->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SchEmail->Visible = FALSE; // Disable update for API request
			else
				$this->SchEmail->setFormValue($val);
		}

		// Check field name 'appointment_type' first before field var 'x_appointment_type'
		$val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
		if (!$this->appointment_type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->appointment_type->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_type->setFormValue($val);
		}

		// Check field name 'Notified' first before field var 'x_Notified'
		$val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
		if (!$this->Notified->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Notified->Visible = FALSE; // Disable update for API request
			else
				$this->Notified->setFormValue($val);
		}

		// Check field name 'Purpose' first before field var 'x_Purpose'
		$val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
		if (!$this->Purpose->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Purpose->Visible = FALSE; // Disable update for API request
			else
				$this->Purpose->setFormValue($val);
		}

		// Check field name 'Notes' first before field var 'x_Notes'
		$val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
		if (!$this->Notes->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Notes->Visible = FALSE; // Disable update for API request
			else
				$this->Notes->setFormValue($val);
		}

		// Check field name 'PatientType' first before field var 'x_PatientType'
		$val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
		if (!$this->PatientType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientType->Visible = FALSE; // Disable update for API request
			else
				$this->PatientType->setFormValue($val);
		}

		// Check field name 'Referal' first before field var 'x_Referal'
		$val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
		if (!$this->Referal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Referal->Visible = FALSE; // Disable update for API request
			else
				$this->Referal->setFormValue($val);
		}

		// Check field name 'paymentType' first before field var 'x_paymentType'
		$val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
		if (!$this->paymentType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->paymentType->Visible = FALSE; // Disable update for API request
			else
				$this->paymentType->setFormValue($val);
		}

		// Check field name 'tittle' first before field var 'x_tittle'
		$val = $CurrentForm->hasValue("tittle") ? $CurrentForm->getValue("tittle") : $CurrentForm->getValue("x_tittle");
		if (!$this->tittle->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tittle->Visible = FALSE; // Disable update for API request
			else
				$this->tittle->setFormValue($val);
		}

		// Check field name 'gendar' first before field var 'x_gendar'
		$val = $CurrentForm->hasValue("gendar") ? $CurrentForm->getValue("gendar") : $CurrentForm->getValue("x_gendar");
		if (!$this->gendar->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->gendar->Visible = FALSE; // Disable update for API request
			else
				$this->gendar->setFormValue($val);
		}

		// Check field name 'Dob' first before field var 'x_Dob'
		$val = $CurrentForm->hasValue("Dob") ? $CurrentForm->getValue("Dob") : $CurrentForm->getValue("x_Dob");
		if (!$this->Dob->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Dob->Visible = FALSE; // Disable update for API request
			else
				$this->Dob->setFormValue($val);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
		$val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
		if (!$this->WhereDidYouHear->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->WhereDidYouHear->Visible = FALSE; // Disable update for API request
			else
				$this->WhereDidYouHear->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'createdBy' first before field var 'x_createdBy'
		$val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
		if (!$this->createdBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createdBy->Visible = FALSE; // Disable update for API request
			else
				$this->createdBy->setFormValue($val);
		}

		// Check field name 'createdDateTime' first before field var 'x_createdDateTime'
		$val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
		if (!$this->createdDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createdDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->createdDateTime->setFormValue($val);
			$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		}

		// Check field name 'PatientTypee' first before field var 'x_PatientTypee'
		$val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
		if (!$this->PatientTypee->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientTypee->Visible = FALSE; // Disable update for API request
			else
				$this->PatientTypee->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->start_date->CurrentValue = $this->start_date->FormValue;
		$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		$this->end_date->CurrentValue = $this->end_date->FormValue;
		$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		$this->patientID->CurrentValue = $this->patientID->FormValue;
		$this->patientName->CurrentValue = $this->patientName->FormValue;
		$this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
		$this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
		$this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
		$this->text->CurrentValue = $this->text->FormValue;
		$this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
		$this->PId->CurrentValue = $this->PId->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
		$this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
		$this->Notified->CurrentValue = $this->Notified->FormValue;
		$this->Purpose->CurrentValue = $this->Purpose->FormValue;
		$this->Notes->CurrentValue = $this->Notes->FormValue;
		$this->PatientType->CurrentValue = $this->PatientType->FormValue;
		$this->Referal->CurrentValue = $this->Referal->FormValue;
		$this->paymentType->CurrentValue = $this->paymentType->FormValue;
		$this->tittle->CurrentValue = $this->tittle->FormValue;
		$this->gendar->CurrentValue = $this->gendar->FormValue;
		$this->Dob->CurrentValue = $this->Dob->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->createdBy->CurrentValue = $this->createdBy->FormValue;
		$this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
		$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		$this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
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
		$this->start_date->setDbValue($row['start_date']);
		$this->end_date->setDbValue($row['end_date']);
		$this->patientID->setDbValue($row['patientID']);
		if (array_key_exists('EV__patientID', $rs->fields)) {
			$this->patientID->VirtualValue = $rs->fields('EV__patientID'); // Set up virtual field value
		} else {
			$this->patientID->VirtualValue = ""; // Clear value
		}
		$this->patientName->setDbValue($row['patientName']);
		$this->DoctorID->setDbValue($row['DoctorID']);
		$this->DoctorName->setDbValue($row['DoctorName']);
		$this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
		$this->status->setDbValue($row['status']);
		$this->DoctorCode->setDbValue($row['DoctorCode']);
		$this->Department->setDbValue($row['Department']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->text->setDbValue($row['text']);
		$this->appointment_status->setDbValue($row['appointment_status']);
		$this->PId->setDbValue($row['PId']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->SchEmail->setDbValue($row['SchEmail']);
		$this->appointment_type->setDbValue($row['appointment_type']);
		$this->Notified->setDbValue($row['Notified']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->Notes->setDbValue($row['Notes']);
		$this->PatientType->setDbValue($row['PatientType']);
		$this->Referal->setDbValue($row['Referal']);
		if (array_key_exists('EV__Referal', $rs->fields)) {
			$this->Referal->VirtualValue = $rs->fields('EV__Referal'); // Set up virtual field value
		} else {
			$this->Referal->VirtualValue = ""; // Clear value
		}
		$this->paymentType->setDbValue($row['paymentType']);
		$this->tittle->setDbValue($row['tittle']);
		$this->gendar->setDbValue($row['gendar']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Age->setDbValue($row['Age']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdBy->setDbValue($row['createdBy']);
		$this->createdDateTime->setDbValue($row['createdDateTime']);
		$this->PatientTypee->setDbValue($row['PatientTypee']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['start_date'] = $this->start_date->CurrentValue;
		$row['end_date'] = $this->end_date->CurrentValue;
		$row['patientID'] = $this->patientID->CurrentValue;
		$row['patientName'] = $this->patientName->CurrentValue;
		$row['DoctorID'] = $this->DoctorID->CurrentValue;
		$row['DoctorName'] = $this->DoctorName->CurrentValue;
		$row['AppointmentStatus'] = $this->AppointmentStatus->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['DoctorCode'] = $this->DoctorCode->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['scheduler_id'] = $this->scheduler_id->CurrentValue;
		$row['text'] = $this->text->CurrentValue;
		$row['appointment_status'] = $this->appointment_status->CurrentValue;
		$row['PId'] = $this->PId->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['SchEmail'] = $this->SchEmail->CurrentValue;
		$row['appointment_type'] = $this->appointment_type->CurrentValue;
		$row['Notified'] = $this->Notified->CurrentValue;
		$row['Purpose'] = $this->Purpose->CurrentValue;
		$row['Notes'] = $this->Notes->CurrentValue;
		$row['PatientType'] = $this->PatientType->CurrentValue;
		$row['Referal'] = $this->Referal->CurrentValue;
		$row['paymentType'] = $this->paymentType->CurrentValue;
		$row['tittle'] = $this->tittle->CurrentValue;
		$row['gendar'] = $this->gendar->CurrentValue;
		$row['Dob'] = $this->Dob->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['createdBy'] = $this->createdBy->CurrentValue;
		$row['createdDateTime'] = $this->createdDateTime->CurrentValue;
		$row['PatientTypee'] = $this->PatientTypee->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
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
		// start_date
		// end_date
		// patientID
		// patientName
		// DoctorID
		// DoctorName
		// AppointmentStatus
		// status
		// DoctorCode
		// Department
		// scheduler_id
		// text
		// appointment_status
		// PId
		// MobileNumber
		// SchEmail
		// appointment_type
		// Notified
		// Purpose
		// Notes
		// PatientType
		// Referal
		// paymentType
		// tittle
		// gendar
		// Dob
		// Age
		// WhereDidYouHear
		// HospID
		// createdBy
		// createdDateTime
		// PatientTypee

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
			$this->start_date->ViewCustomAttributes = "";

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
			$this->end_date->ViewCustomAttributes = "";

			// patientID
			if ($this->patientID->VirtualValue != "") {
				$this->patientID->ViewValue = $this->patientID->VirtualValue;
			} else {
				$curVal = strval($this->patientID->CurrentValue);
				if ($curVal != "") {
					$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
					if ($this->patientID->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->patientID->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$arwrk[3] = $rswrk->fields('df3');
							$arwrk[4] = $rswrk->fields('df4');
							$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->patientID->ViewValue = $this->patientID->CurrentValue;
						}
					}
				} else {
					$this->patientID->ViewValue = NULL;
				}
			}
			$this->patientID->ViewCustomAttributes = "";

			// patientName
			$this->patientName->ViewValue = $this->patientName->CurrentValue;
			$this->patientName->ViewCustomAttributes = "";

			// DoctorID
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";

			// DoctorName
			$curVal = strval($this->DoctorName->CurrentValue);
			if ($curVal != "") {
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
				if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
					}
				}
			} else {
				$this->DoctorName->ViewValue = NULL;
			}
			$this->DoctorName->ViewCustomAttributes = "";

			// AppointmentStatus
			$this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
			$this->AppointmentStatus->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) != "") {
				$this->status->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->status->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// DoctorCode
			$this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
			$this->DoctorCode->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->ViewValue = $this->text->CurrentValue;
			$this->text->ViewCustomAttributes = "";

			// appointment_status
			$this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
			$this->appointment_status->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// SchEmail
			$this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
			$this->SchEmail->ViewCustomAttributes = "";

			// appointment_type
			if (strval($this->appointment_type->CurrentValue) != "") {
				$this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
			} else {
				$this->appointment_type->ViewValue = NULL;
			}
			$this->appointment_type->ViewCustomAttributes = "";

			// Notified
			if (strval($this->Notified->CurrentValue) != "") {
				$this->Notified->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Notified->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Notified->ViewValue = NULL;
			}
			$this->Notified->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// Notes
			$this->Notes->ViewValue = $this->Notes->CurrentValue;
			$this->Notes->ViewCustomAttributes = "";

			// PatientType
			if (strval($this->PatientType->CurrentValue) != "") {
				$this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
			} else {
				$this->PatientType->ViewValue = NULL;
			}
			$this->PatientType->ViewCustomAttributes = "";

			// Referal
			if ($this->Referal->VirtualValue != "") {
				$this->Referal->ViewValue = $this->Referal->VirtualValue;
			} else {
				$curVal = strval($this->Referal->CurrentValue);
				if ($curVal != "") {
					$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
					if ($this->Referal->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->Referal->ViewValue = $this->Referal->CurrentValue;
						}
					}
				} else {
					$this->Referal->ViewValue = NULL;
				}
			}
			$this->Referal->ViewCustomAttributes = "";

			// paymentType
			$this->paymentType->ViewValue = $this->paymentType->CurrentValue;
			$this->paymentType->ViewCustomAttributes = "";

			// tittle
			$curVal = strval($this->tittle->CurrentValue);
			if ($curVal != "") {
				$this->tittle->ViewValue = $this->tittle->lookupCacheOption($curVal);
				if ($this->tittle->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->tittle->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->tittle->ViewValue = $this->tittle->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->tittle->ViewValue = $this->tittle->CurrentValue;
					}
				}
			} else {
				$this->tittle->ViewValue = NULL;
			}
			$this->tittle->ViewCustomAttributes = "";

			// gendar
			$curVal = strval($this->gendar->CurrentValue);
			if ($curVal != "") {
				$this->gendar->ViewValue = $this->gendar->lookupCacheOption($curVal);
				if ($this->gendar->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gendar->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->gendar->ViewValue = $this->gendar->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gendar->ViewValue = $this->gendar->CurrentValue;
					}
				}
			} else {
				$this->gendar->ViewValue = NULL;
			}
			$this->gendar->ViewCustomAttributes = "";

			// Dob
			$this->Dob->ViewValue = $this->Dob->CurrentValue;
			$this->Dob->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// WhereDidYouHear
			$curVal = strval($this->WhereDidYouHear->CurrentValue);
			if ($curVal != "") {
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
				if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->WhereDidYouHear->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
					}
				}
			} else {
				$this->WhereDidYouHear->ViewValue = NULL;
			}
			$this->WhereDidYouHear->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// createdBy
			$this->createdBy->ViewValue = $this->createdBy->CurrentValue;
			$this->createdBy->ViewCustomAttributes = "";

			// createdDateTime
			$this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
			$this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
			$this->createdDateTime->ViewCustomAttributes = "";

			// PatientTypee
			$curVal = strval($this->PatientTypee->CurrentValue);
			if ($curVal != "") {
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
				if ($this->PatientTypee->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PatientTypee->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
					}
				}
			} else {
				$this->PatientTypee->ViewValue = NULL;
			}
			$this->PatientTypee->ViewCustomAttributes = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";
			$this->start_date->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";
			$this->end_date->TooltipValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";
			$this->patientID->TooltipValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";
			$this->patientName->TooltipValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";
			$this->DoctorID->TooltipValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";
			$this->DoctorName->TooltipValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";
			$this->AppointmentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";
			$this->DoctorCode->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";
			$this->text->TooltipValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";
			$this->appointment_status->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";
			$this->SchEmail->TooltipValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";
			$this->appointment_type->TooltipValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";
			$this->Notified->TooltipValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";
			$this->Notes->TooltipValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";
			$this->PatientType->TooltipValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";
			$this->Referal->TooltipValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";
			$this->paymentType->TooltipValue = "";

			// tittle
			$this->tittle->LinkCustomAttributes = "";
			$this->tittle->HrefValue = "";
			$this->tittle->TooltipValue = "";

			// gendar
			$this->gendar->LinkCustomAttributes = "";
			$this->gendar->HrefValue = "";
			$this->gendar->TooltipValue = "";

			// Dob
			$this->Dob->LinkCustomAttributes = "";
			$this->Dob->HrefValue = "";
			$this->Dob->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
			$this->PatientTypee->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// start_date
			$this->start_date->EditAttrs["class"] = "form-control";
			$this->start_date->EditCustomAttributes = "";
			$this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
			$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

			// end_date
			$this->end_date->EditAttrs["class"] = "form-control";
			$this->end_date->EditCustomAttributes = "";
			$this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
			$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

			// patientID
			$this->patientID->EditCustomAttributes = "";
			$curVal = trim(strval($this->patientID->CurrentValue));
			if ($curVal != "")
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
			else
				$this->patientID->ViewValue = $this->patientID->Lookup !== NULL && is_array($this->patientID->Lookup->Options) ? $curVal : NULL;
			if ($this->patientID->ViewValue !== NULL) { // Load from cache
				$this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
				if ($this->patientID->ViewValue == "")
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->patientID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
				} else {
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patientID->EditValue = $arwrk;
			}

			// patientName
			$this->patientName->EditAttrs["class"] = "form-control";
			$this->patientName->EditCustomAttributes = "";
			if (!$this->patientName->Raw)
				$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
			$this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
			$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

			// DoctorID
			$this->DoctorID->EditAttrs["class"] = "form-control";
			$this->DoctorID->EditCustomAttributes = "";
			if ($this->DoctorID->getSessionValue() != "") {
				$this->DoctorID->CurrentValue = $this->DoctorID->getSessionValue();
				$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
				$this->DoctorID->ViewCustomAttributes = "";
			} else {
				$this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
				$this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());
			}

			// DoctorName
			$this->DoctorName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DoctorName->CurrentValue));
			if ($curVal != "")
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			else
				$this->DoctorName->ViewValue = $this->DoctorName->Lookup !== NULL && is_array($this->DoctorName->Lookup->Options) ? $curVal : NULL;
			if ($this->DoctorName->ViewValue !== NULL) { // Load from cache
				$this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
				if ($this->DoctorName->ViewValue == "")
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DoctorName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
				} else {
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DoctorName->EditValue = $arwrk;
			}

			// AppointmentStatus
			$this->AppointmentStatus->EditAttrs["class"] = "form-control";
			$this->AppointmentStatus->EditCustomAttributes = "";
			if (!$this->AppointmentStatus->Raw)
				$this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// DoctorCode
			$this->DoctorCode->EditAttrs["class"] = "form-control";
			$this->DoctorCode->EditCustomAttributes = "";
			if (!$this->DoctorCode->Raw)
				$this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (!$this->Department->Raw)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			if (!$this->scheduler_id->Raw)
				$this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

			// text
			$this->text->EditAttrs["class"] = "form-control";
			$this->text->EditCustomAttributes = "";
			if (!$this->text->Raw)
				$this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
			$this->text->EditValue = HtmlEncode($this->text->CurrentValue);
			$this->text->PlaceHolder = RemoveHtml($this->text->caption());

			// appointment_status
			$this->appointment_status->EditAttrs["class"] = "form-control";
			$this->appointment_status->EditCustomAttributes = "";
			if (!$this->appointment_status->Raw)
				$this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
			$this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
			$this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// SchEmail
			$this->SchEmail->EditAttrs["class"] = "form-control";
			$this->SchEmail->EditCustomAttributes = "";
			if (!$this->SchEmail->Raw)
				$this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
			$this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
			$this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

			// appointment_type
			$this->appointment_type->EditCustomAttributes = "";
			$this->appointment_type->EditValue = $this->appointment_type->options(FALSE);

			// Notified
			$this->Notified->EditCustomAttributes = "";
			$this->Notified->EditValue = $this->Notified->options(FALSE);

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			if (!$this->Purpose->Raw)
				$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
			$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

			// Notes
			$this->Notes->EditAttrs["class"] = "form-control";
			$this->Notes->EditCustomAttributes = "";
			if (!$this->Notes->Raw)
				$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
			$this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
			$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

			// PatientType
			$this->PatientType->EditCustomAttributes = "";
			$this->PatientType->EditValue = $this->PatientType->options(FALSE);

			// Referal
			$this->Referal->EditCustomAttributes = "";
			$curVal = trim(strval($this->Referal->CurrentValue));
			if ($curVal != "")
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
			else
				$this->Referal->ViewValue = $this->Referal->Lookup !== NULL && is_array($this->Referal->Lookup->Options) ? $curVal : NULL;
			if ($this->Referal->ViewValue !== NULL) { // Load from cache
				$this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
				if ($this->Referal->ViewValue == "")
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Referal->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
				} else {
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Referal->EditValue = $arwrk;
			}

			// paymentType
			$this->paymentType->EditAttrs["class"] = "form-control";
			$this->paymentType->EditCustomAttributes = "";
			if (!$this->paymentType->Raw)
				$this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
			$this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
			$this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

			// tittle
			$this->tittle->EditAttrs["class"] = "form-control";
			$this->tittle->EditCustomAttributes = "";
			$curVal = trim(strval($this->tittle->CurrentValue));
			if ($curVal != "")
				$this->tittle->ViewValue = $this->tittle->lookupCacheOption($curVal);
			else
				$this->tittle->ViewValue = $this->tittle->Lookup !== NULL && is_array($this->tittle->Lookup->Options) ? $curVal : NULL;
			if ($this->tittle->ViewValue !== NULL) { // Load from cache
				$this->tittle->EditValue = array_values($this->tittle->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->tittle->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->tittle->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->tittle->EditValue = $arwrk;
			}

			// gendar
			$this->gendar->EditAttrs["class"] = "form-control";
			$this->gendar->EditCustomAttributes = "";
			$curVal = trim(strval($this->gendar->CurrentValue));
			if ($curVal != "")
				$this->gendar->ViewValue = $this->gendar->lookupCacheOption($curVal);
			else
				$this->gendar->ViewValue = $this->gendar->Lookup !== NULL && is_array($this->gendar->Lookup->Options) ? $curVal : NULL;
			if ($this->gendar->ViewValue !== NULL) { // Load from cache
				$this->gendar->EditValue = array_values($this->gendar->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->gendar->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->gendar->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->gendar->EditValue = $arwrk;
			}

			// Dob
			$this->Dob->EditAttrs["class"] = "form-control";
			$this->Dob->EditCustomAttributes = "";
			if (!$this->Dob->Raw)
				$this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
			$this->Dob->EditValue = HtmlEncode($this->Dob->CurrentValue);
			$this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";
			$curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
			if ($curVal != "")
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			else
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== NULL && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : NULL;
			if ($this->WhereDidYouHear->ViewValue !== NULL) { // Load from cache
				$this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->WhereDidYouHear->EditValue = $arwrk;
			}

			// HospID
			// createdBy
			// createdDateTime
			// PatientTypee

			$this->PatientTypee->EditAttrs["class"] = "form-control";
			$this->PatientTypee->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientTypee->CurrentValue));
			if ($curVal != "")
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
			else
				$this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== NULL && is_array($this->PatientTypee->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientTypee->ViewValue !== NULL) { // Load from cache
				$this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PatientTypee->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PatientTypee->EditValue = $arwrk;
			}

			// Add refer script
			// start_date

			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";

			// tittle
			$this->tittle->LinkCustomAttributes = "";
			$this->tittle->HrefValue = "";

			// gendar
			$this->gendar->LinkCustomAttributes = "";
			$this->gendar->HrefValue = "";

			// Dob
			$this->Dob->LinkCustomAttributes = "";
			$this->Dob->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
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
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->start_date->Required) {
			if (!$this->start_date->IsDetailKey && $this->start_date->FormValue != NULL && $this->start_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->start_date->FormValue)) {
			AddMessage($FormError, $this->start_date->errorMessage());
		}
		if ($this->end_date->Required) {
			if (!$this->end_date->IsDetailKey && $this->end_date->FormValue != NULL && $this->end_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->end_date->FormValue)) {
			AddMessage($FormError, $this->end_date->errorMessage());
		}
		if ($this->patientID->Required) {
			if (!$this->patientID->IsDetailKey && $this->patientID->FormValue != NULL && $this->patientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
			}
		}
		if ($this->patientName->Required) {
			if (!$this->patientName->IsDetailKey && $this->patientName->FormValue != NULL && $this->patientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
			}
		}
		if ($this->DoctorID->Required) {
			if (!$this->DoctorID->IsDetailKey && $this->DoctorID->FormValue != NULL && $this->DoctorID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
			}
		}
		if ($this->DoctorName->Required) {
			if (!$this->DoctorName->IsDetailKey && $this->DoctorName->FormValue != NULL && $this->DoctorName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
			}
		}
		if ($this->AppointmentStatus->Required) {
			if (!$this->AppointmentStatus->IsDetailKey && $this->AppointmentStatus->FormValue != NULL && $this->AppointmentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->DoctorCode->Required) {
			if (!$this->DoctorCode->IsDetailKey && $this->DoctorCode->FormValue != NULL && $this->DoctorCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if (!$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->scheduler_id->Required) {
			if (!$this->scheduler_id->IsDetailKey && $this->scheduler_id->FormValue != NULL && $this->scheduler_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
			}
		}
		if ($this->text->Required) {
			if (!$this->text->IsDetailKey && $this->text->FormValue != NULL && $this->text->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
			}
		}
		if ($this->appointment_status->Required) {
			if (!$this->appointment_status->IsDetailKey && $this->appointment_status->FormValue != NULL && $this->appointment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
			}
		}
		if ($this->PId->Required) {
			if (!$this->PId->IsDetailKey && $this->PId->FormValue != NULL && $this->PId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PId->FormValue)) {
			AddMessage($FormError, $this->PId->errorMessage());
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->SchEmail->Required) {
			if (!$this->SchEmail->IsDetailKey && $this->SchEmail->FormValue != NULL && $this->SchEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
			}
		}
		if ($this->appointment_type->Required) {
			if ($this->appointment_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
			}
		}
		if ($this->Notified->Required) {
			if ($this->Notified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
			}
		}
		if ($this->Purpose->Required) {
			if (!$this->Purpose->IsDetailKey && $this->Purpose->FormValue != NULL && $this->Purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
			}
		}
		if ($this->Notes->Required) {
			if (!$this->Notes->IsDetailKey && $this->Notes->FormValue != NULL && $this->Notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
			}
		}
		if ($this->PatientType->Required) {
			if ($this->PatientType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
			}
		}
		if ($this->Referal->Required) {
			if (!$this->Referal->IsDetailKey && $this->Referal->FormValue != NULL && $this->Referal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
			}
		}
		if ($this->paymentType->Required) {
			if (!$this->paymentType->IsDetailKey && $this->paymentType->FormValue != NULL && $this->paymentType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
			}
		}
		if ($this->tittle->Required) {
			if (!$this->tittle->IsDetailKey && $this->tittle->FormValue != NULL && $this->tittle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tittle->caption(), $this->tittle->RequiredErrorMessage));
			}
		}
		if ($this->gendar->Required) {
			if (!$this->gendar->IsDetailKey && $this->gendar->FormValue != NULL && $this->gendar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gendar->caption(), $this->gendar->RequiredErrorMessage));
			}
		}
		if ($this->Dob->Required) {
			if (!$this->Dob->IsDetailKey && $this->Dob->FormValue != NULL && $this->Dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dob->caption(), $this->Dob->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->WhereDidYouHear->Required) {
			if ($this->WhereDidYouHear->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->createdBy->Required) {
			if (!$this->createdBy->IsDetailKey && $this->createdBy->FormValue != NULL && $this->createdBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
			}
		}
		if ($this->createdDateTime->Required) {
			if (!$this->createdDateTime->IsDetailKey && $this->createdDateTime->FormValue != NULL && $this->createdDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
			}
		}
		if ($this->PatientTypee->Required) {
			if (!$this->PatientTypee->IsDetailKey && $this->PatientTypee->FormValue != NULL && $this->PatientTypee->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// start_date
		$this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), NULL, FALSE);

		// end_date
		$this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), NULL, FALSE);

		// patientID
		$this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, NULL, FALSE);

		// patientName
		$this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, NULL, FALSE);

		// DoctorID
		$this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, NULL, FALSE);

		// DoctorName
		$this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, NULL, FALSE);

		// AppointmentStatus
		$this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// DoctorCode
		$this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// scheduler_id
		$this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, NULL, FALSE);

		// text
		$this->text->setDbValueDef($rsnew, $this->text->CurrentValue, NULL, FALSE);

		// appointment_status
		$this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, NULL, FALSE);

		// PId
		$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// SchEmail
		$this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, NULL, FALSE);

		// appointment_type
		$this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, NULL, FALSE);

		// Notified
		$this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, NULL, FALSE);

		// Purpose
		$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, FALSE);

		// Notes
		$this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, NULL, FALSE);

		// PatientType
		$this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, NULL, FALSE);

		// Referal
		$this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, NULL, FALSE);

		// paymentType
		$this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, NULL, FALSE);

		// tittle
		$this->tittle->setDbValueDef($rsnew, $this->tittle->CurrentValue, "", FALSE);

		// gendar
		$this->gendar->setDbValueDef($rsnew, $this->gendar->CurrentValue, "", FALSE);

		// Dob
		$this->Dob->setDbValueDef($rsnew, $this->Dob->CurrentValue, "", FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, "", FALSE);

		// WhereDidYouHear
		$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// createdBy
		$this->createdBy->CurrentValue = GetUserName();
		$this->createdBy->setDbValueDef($rsnew, $this->createdBy->CurrentValue, NULL);

		// createdDateTime
		$this->createdDateTime->CurrentValue = CurrentDateTime();
		$this->createdDateTime->setDbValueDef($rsnew, $this->createdDateTime->CurrentValue, NULL);

		// PatientTypee
		$this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
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

		// Clean upload path if any
		if ($addRow) {
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
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "doctors") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("DoctorID"))) !== NULL) {
					$GLOBALS["doctors"]->id->setQueryStringValue($parm);
					$this->DoctorID->setQueryStringValue($GLOBALS["doctors"]->id->QueryStringValue);
					$this->DoctorID->setSessionValue($this->DoctorID->QueryStringValue);
					if (!is_numeric($GLOBALS["doctors"]->id->QueryStringValue))
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
			if ($masterTblVar == "doctors") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("DoctorID"))) !== NULL) {
					$GLOBALS["doctors"]->id->setFormValue($parm);
					$this->DoctorID->setFormValue($GLOBALS["doctors"]->id->FormValue);
					$this->DoctorID->setSessionValue($this->DoctorID->FormValue);
					if (!is_numeric($GLOBALS["doctors"]->id->FormValue))
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
			if ($masterTblVar != "doctors") {
				if ($this->DoctorID->CurrentValue == "")
					$this->DoctorID->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("appointment_schedulerlist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
				case "x_patientID":
					break;
				case "x_DoctorName":
					break;
				case "x_status":
					break;
				case "x_appointment_type":
					break;
				case "x_Notified":
					break;
				case "x_PatientType":
					break;
				case "x_Referal":
					break;
				case "x_tittle":
					break;
				case "x_gendar":
					break;
				case "x_WhereDidYouHear":
					break;
				case "x_PatientTypee":
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
						case "x_patientID":
							break;
						case "x_DoctorName":
							break;
						case "x_Referal":
							break;
						case "x_tittle":
							break;
						case "x_gendar":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_PatientTypee":
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
} // End class
?>
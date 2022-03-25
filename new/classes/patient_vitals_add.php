<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_vitals_add extends patient_vitals
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_vitals';

	// Page object name
	public $PageObjName = "patient_vitals_add";

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

		// Table object (patient_vitals)
		if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
			$GLOBALS["patient_vitals"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_vitals"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');

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
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $patient_vitals;
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
				$doc = new $class($patient_vitals);
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
					if ($pageName == "patient_vitalsview.php")
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
					$this->terminate(GetUrl("patient_vitalslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatID->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->profilePic->setVisibility();
		$this->HT->setVisibility();
		$this->WT->setVisibility();
		$this->SurfaceArea->setVisibility();
		$this->BodyMassIndex->setVisibility();
		$this->ClinicalFindings->setVisibility();
		$this->ClinicalDiagnosis->setVisibility();
		$this->AnticoagulantifAny->setVisibility();
		$this->FoodAllergies->setVisibility();
		$this->GenericAllergies->setVisibility();
		$this->GroupAllergies->setVisibility();
		$this->Temp->setVisibility();
		$this->Pulse->setVisibility();
		$this->BP->setVisibility();
		$this->PR->setVisibility();
		$this->CNS->setVisibility();
		$this->RSA->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->PS->setVisibility();
		$this->PV->setVisibility();
		$this->clinicaldetails->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->PatientSearch->setVisibility();
		$this->PatientId->setVisibility();
		$this->Reception->setVisibility();
		$this->HospID->setVisibility();
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
		$this->setupLookupOptions($this->AnticoagulantifAny);
		$this->setupLookupOptions($this->GenericAllergies);
		$this->setupLookupOptions($this->GroupAllergies);
		$this->setupLookupOptions($this->clinicaldetails);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->PatientSearch);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("patient_vitalslist.php");
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
					$this->terminate("patient_vitalslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "patient_vitalslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "patient_vitalsview.php")
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
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->HT->CurrentValue = NULL;
		$this->HT->OldValue = $this->HT->CurrentValue;
		$this->WT->CurrentValue = NULL;
		$this->WT->OldValue = $this->WT->CurrentValue;
		$this->SurfaceArea->CurrentValue = NULL;
		$this->SurfaceArea->OldValue = $this->SurfaceArea->CurrentValue;
		$this->BodyMassIndex->CurrentValue = NULL;
		$this->BodyMassIndex->OldValue = $this->BodyMassIndex->CurrentValue;
		$this->ClinicalFindings->CurrentValue = NULL;
		$this->ClinicalFindings->OldValue = $this->ClinicalFindings->CurrentValue;
		$this->ClinicalDiagnosis->CurrentValue = NULL;
		$this->ClinicalDiagnosis->OldValue = $this->ClinicalDiagnosis->CurrentValue;
		$this->AnticoagulantifAny->CurrentValue = NULL;
		$this->AnticoagulantifAny->OldValue = $this->AnticoagulantifAny->CurrentValue;
		$this->FoodAllergies->CurrentValue = NULL;
		$this->FoodAllergies->OldValue = $this->FoodAllergies->CurrentValue;
		$this->GenericAllergies->CurrentValue = NULL;
		$this->GenericAllergies->OldValue = $this->GenericAllergies->CurrentValue;
		$this->GroupAllergies->CurrentValue = NULL;
		$this->GroupAllergies->OldValue = $this->GroupAllergies->CurrentValue;
		$this->Temp->CurrentValue = NULL;
		$this->Temp->OldValue = $this->Temp->CurrentValue;
		$this->Pulse->CurrentValue = NULL;
		$this->Pulse->OldValue = $this->Pulse->CurrentValue;
		$this->BP->CurrentValue = NULL;
		$this->BP->OldValue = $this->BP->CurrentValue;
		$this->PR->CurrentValue = NULL;
		$this->PR->OldValue = $this->PR->CurrentValue;
		$this->CNS->CurrentValue = NULL;
		$this->CNS->OldValue = $this->CNS->CurrentValue;
		$this->RSA->CurrentValue = NULL;
		$this->RSA->OldValue = $this->RSA->CurrentValue;
		$this->CVS->CurrentValue = NULL;
		$this->CVS->OldValue = $this->CVS->CurrentValue;
		$this->PA->CurrentValue = NULL;
		$this->PA->OldValue = $this->PA->CurrentValue;
		$this->PS->CurrentValue = NULL;
		$this->PS->OldValue = $this->PS->CurrentValue;
		$this->PV->CurrentValue = NULL;
		$this->PV->OldValue = $this->PV->CurrentValue;
		$this->clinicaldetails->CurrentValue = NULL;
		$this->clinicaldetails->OldValue = $this->clinicaldetails->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->PatientSearch->CurrentValue = NULL;
		$this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'HT' first before field var 'x_HT'
		$val = $CurrentForm->hasValue("HT") ? $CurrentForm->getValue("HT") : $CurrentForm->getValue("x_HT");
		if (!$this->HT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HT->Visible = FALSE; // Disable update for API request
			else
				$this->HT->setFormValue($val);
		}

		// Check field name 'WT' first before field var 'x_WT'
		$val = $CurrentForm->hasValue("WT") ? $CurrentForm->getValue("WT") : $CurrentForm->getValue("x_WT");
		if (!$this->WT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->WT->Visible = FALSE; // Disable update for API request
			else
				$this->WT->setFormValue($val);
		}

		// Check field name 'SurfaceArea' first before field var 'x_SurfaceArea'
		$val = $CurrentForm->hasValue("SurfaceArea") ? $CurrentForm->getValue("SurfaceArea") : $CurrentForm->getValue("x_SurfaceArea");
		if (!$this->SurfaceArea->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SurfaceArea->Visible = FALSE; // Disable update for API request
			else
				$this->SurfaceArea->setFormValue($val);
		}

		// Check field name 'BodyMassIndex' first before field var 'x_BodyMassIndex'
		$val = $CurrentForm->hasValue("BodyMassIndex") ? $CurrentForm->getValue("BodyMassIndex") : $CurrentForm->getValue("x_BodyMassIndex");
		if (!$this->BodyMassIndex->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BodyMassIndex->Visible = FALSE; // Disable update for API request
			else
				$this->BodyMassIndex->setFormValue($val);
		}

		// Check field name 'ClinicalFindings' first before field var 'x_ClinicalFindings'
		$val = $CurrentForm->hasValue("ClinicalFindings") ? $CurrentForm->getValue("ClinicalFindings") : $CurrentForm->getValue("x_ClinicalFindings");
		if (!$this->ClinicalFindings->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ClinicalFindings->Visible = FALSE; // Disable update for API request
			else
				$this->ClinicalFindings->setFormValue($val);
		}

		// Check field name 'ClinicalDiagnosis' first before field var 'x_ClinicalDiagnosis'
		$val = $CurrentForm->hasValue("ClinicalDiagnosis") ? $CurrentForm->getValue("ClinicalDiagnosis") : $CurrentForm->getValue("x_ClinicalDiagnosis");
		if (!$this->ClinicalDiagnosis->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ClinicalDiagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->ClinicalDiagnosis->setFormValue($val);
		}

		// Check field name 'AnticoagulantifAny' first before field var 'x_AnticoagulantifAny'
		$val = $CurrentForm->hasValue("AnticoagulantifAny") ? $CurrentForm->getValue("AnticoagulantifAny") : $CurrentForm->getValue("x_AnticoagulantifAny");
		if (!$this->AnticoagulantifAny->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnticoagulantifAny->Visible = FALSE; // Disable update for API request
			else
				$this->AnticoagulantifAny->setFormValue($val);
		}

		// Check field name 'FoodAllergies' first before field var 'x_FoodAllergies'
		$val = $CurrentForm->hasValue("FoodAllergies") ? $CurrentForm->getValue("FoodAllergies") : $CurrentForm->getValue("x_FoodAllergies");
		if (!$this->FoodAllergies->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FoodAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->FoodAllergies->setFormValue($val);
		}

		// Check field name 'GenericAllergies' first before field var 'x_GenericAllergies'
		$val = $CurrentForm->hasValue("GenericAllergies") ? $CurrentForm->getValue("GenericAllergies") : $CurrentForm->getValue("x_GenericAllergies");
		if (!$this->GenericAllergies->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GenericAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->GenericAllergies->setFormValue($val);
		}

		// Check field name 'GroupAllergies' first before field var 'x_GroupAllergies'
		$val = $CurrentForm->hasValue("GroupAllergies") ? $CurrentForm->getValue("GroupAllergies") : $CurrentForm->getValue("x_GroupAllergies");
		if (!$this->GroupAllergies->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GroupAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->GroupAllergies->setFormValue($val);
		}

		// Check field name 'Temp' first before field var 'x_Temp'
		$val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
		if (!$this->Temp->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Temp->setFormValue($val);
		}

		// Check field name 'Pulse' first before field var 'x_Pulse'
		$val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
		if (!$this->Pulse->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Pulse->Visible = FALSE; // Disable update for API request
			else
				$this->Pulse->setFormValue($val);
		}

		// Check field name 'BP' first before field var 'x_BP'
		$val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
		if (!$this->BP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BP->Visible = FALSE; // Disable update for API request
			else
				$this->BP->setFormValue($val);
		}

		// Check field name 'PR' first before field var 'x_PR'
		$val = $CurrentForm->hasValue("PR") ? $CurrentForm->getValue("PR") : $CurrentForm->getValue("x_PR");
		if (!$this->PR->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PR->Visible = FALSE; // Disable update for API request
			else
				$this->PR->setFormValue($val);
		}

		// Check field name 'CNS' first before field var 'x_CNS'
		$val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
		if (!$this->CNS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CNS->Visible = FALSE; // Disable update for API request
			else
				$this->CNS->setFormValue($val);
		}

		// Check field name 'RSA' first before field var 'x_RSA'
		$val = $CurrentForm->hasValue("RSA") ? $CurrentForm->getValue("RSA") : $CurrentForm->getValue("x_RSA");
		if (!$this->RSA->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RSA->Visible = FALSE; // Disable update for API request
			else
				$this->RSA->setFormValue($val);
		}

		// Check field name 'CVS' first before field var 'x_CVS'
		$val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
		if (!$this->CVS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CVS->Visible = FALSE; // Disable update for API request
			else
				$this->CVS->setFormValue($val);
		}

		// Check field name 'PA' first before field var 'x_PA'
		$val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
		if (!$this->PA->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PA->Visible = FALSE; // Disable update for API request
			else
				$this->PA->setFormValue($val);
		}

		// Check field name 'PS' first before field var 'x_PS'
		$val = $CurrentForm->hasValue("PS") ? $CurrentForm->getValue("PS") : $CurrentForm->getValue("x_PS");
		if (!$this->PS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PS->Visible = FALSE; // Disable update for API request
			else
				$this->PS->setFormValue($val);
		}

		// Check field name 'PV' first before field var 'x_PV'
		$val = $CurrentForm->hasValue("PV") ? $CurrentForm->getValue("PV") : $CurrentForm->getValue("x_PV");
		if (!$this->PV->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PV->Visible = FALSE; // Disable update for API request
			else
				$this->PV->setFormValue($val);
		}

		// Check field name 'clinicaldetails' first before field var 'x_clinicaldetails'
		$val = $CurrentForm->hasValue("clinicaldetails") ? $CurrentForm->getValue("clinicaldetails") : $CurrentForm->getValue("x_clinicaldetails");
		if (!$this->clinicaldetails->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->clinicaldetails->Visible = FALSE; // Disable update for API request
			else
				$this->clinicaldetails->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}

		// Check field name 'PatientSearch' first before field var 'x_PatientSearch'
		$val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
		if (!$this->PatientSearch->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientSearch->Visible = FALSE; // Disable update for API request
			else
				$this->PatientSearch->setFormValue($val);
		}

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->HT->CurrentValue = $this->HT->FormValue;
		$this->WT->CurrentValue = $this->WT->FormValue;
		$this->SurfaceArea->CurrentValue = $this->SurfaceArea->FormValue;
		$this->BodyMassIndex->CurrentValue = $this->BodyMassIndex->FormValue;
		$this->ClinicalFindings->CurrentValue = $this->ClinicalFindings->FormValue;
		$this->ClinicalDiagnosis->CurrentValue = $this->ClinicalDiagnosis->FormValue;
		$this->AnticoagulantifAny->CurrentValue = $this->AnticoagulantifAny->FormValue;
		$this->FoodAllergies->CurrentValue = $this->FoodAllergies->FormValue;
		$this->GenericAllergies->CurrentValue = $this->GenericAllergies->FormValue;
		$this->GroupAllergies->CurrentValue = $this->GroupAllergies->FormValue;
		$this->Temp->CurrentValue = $this->Temp->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->PR->CurrentValue = $this->PR->FormValue;
		$this->CNS->CurrentValue = $this->CNS->FormValue;
		$this->RSA->CurrentValue = $this->RSA->FormValue;
		$this->CVS->CurrentValue = $this->CVS->FormValue;
		$this->PA->CurrentValue = $this->PA->FormValue;
		$this->PS->CurrentValue = $this->PS->FormValue;
		$this->PV->CurrentValue = $this->PV->FormValue;
		$this->clinicaldetails->CurrentValue = $this->clinicaldetails->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
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
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatID->setDbValue($row['PatID']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->HT->setDbValue($row['HT']);
		$this->WT->setDbValue($row['WT']);
		$this->SurfaceArea->setDbValue($row['SurfaceArea']);
		$this->BodyMassIndex->setDbValue($row['BodyMassIndex']);
		$this->ClinicalFindings->setDbValue($row['ClinicalFindings']);
		$this->ClinicalDiagnosis->setDbValue($row['ClinicalDiagnosis']);
		$this->AnticoagulantifAny->setDbValue($row['AnticoagulantifAny']);
		$this->FoodAllergies->setDbValue($row['FoodAllergies']);
		$this->GenericAllergies->setDbValue($row['GenericAllergies']);
		$this->GroupAllergies->setDbValue($row['GroupAllergies']);
		if (array_key_exists('EV__GroupAllergies', $rs->fields)) {
			$this->GroupAllergies->VirtualValue = $rs->fields('EV__GroupAllergies'); // Set up virtual field value
		} else {
			$this->GroupAllergies->VirtualValue = ""; // Clear value
		}
		$this->Temp->setDbValue($row['Temp']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->BP->setDbValue($row['BP']);
		$this->PR->setDbValue($row['PR']);
		$this->CNS->setDbValue($row['CNS']);
		$this->RSA->setDbValue($row['RSA']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->PS->setDbValue($row['PS']);
		$this->PV->setDbValue($row['PV']);
		$this->clinicaldetails->setDbValue($row['clinicaldetails']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->Reception->setDbValue($row['Reception']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['HT'] = $this->HT->CurrentValue;
		$row['WT'] = $this->WT->CurrentValue;
		$row['SurfaceArea'] = $this->SurfaceArea->CurrentValue;
		$row['BodyMassIndex'] = $this->BodyMassIndex->CurrentValue;
		$row['ClinicalFindings'] = $this->ClinicalFindings->CurrentValue;
		$row['ClinicalDiagnosis'] = $this->ClinicalDiagnosis->CurrentValue;
		$row['AnticoagulantifAny'] = $this->AnticoagulantifAny->CurrentValue;
		$row['FoodAllergies'] = $this->FoodAllergies->CurrentValue;
		$row['GenericAllergies'] = $this->GenericAllergies->CurrentValue;
		$row['GroupAllergies'] = $this->GroupAllergies->CurrentValue;
		$row['Temp'] = $this->Temp->CurrentValue;
		$row['Pulse'] = $this->Pulse->CurrentValue;
		$row['BP'] = $this->BP->CurrentValue;
		$row['PR'] = $this->PR->CurrentValue;
		$row['CNS'] = $this->CNS->CurrentValue;
		$row['RSA'] = $this->RSA->CurrentValue;
		$row['CVS'] = $this->CVS->CurrentValue;
		$row['PA'] = $this->PA->CurrentValue;
		$row['PS'] = $this->PS->CurrentValue;
		$row['PV'] = $this->PV->CurrentValue;
		$row['clinicaldetails'] = $this->clinicaldetails->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['PatientSearch'] = $this->PatientSearch->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
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
		// mrnno
		// PatientName
		// PatID
		// MobileNumber
		// profilePic
		// HT
		// WT
		// SurfaceArea
		// BodyMassIndex
		// ClinicalFindings
		// ClinicalDiagnosis
		// AnticoagulantifAny
		// FoodAllergies
		// GenericAllergies
		// GroupAllergies
		// Temp
		// Pulse
		// BP
		// PR
		// CNS
		// RSA
		// CVS
		// PA
		// PS
		// PV
		// clinicaldetails
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Age
		// Gender
		// PatientSearch
		// PatientId
		// Reception
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->CssClass = "font-weight-bold";
			$this->profilePic->ViewCustomAttributes = "";

			// HT
			$this->HT->ViewValue = $this->HT->CurrentValue;
			$this->HT->ViewCustomAttributes = "";

			// WT
			$this->WT->ViewValue = $this->WT->CurrentValue;
			$this->WT->ViewCustomAttributes = "";

			// SurfaceArea
			$this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
			$this->SurfaceArea->ViewCustomAttributes = "";

			// BodyMassIndex
			$this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
			$this->BodyMassIndex->ViewCustomAttributes = "";

			// ClinicalFindings
			$this->ClinicalFindings->ViewValue = $this->ClinicalFindings->CurrentValue;
			$this->ClinicalFindings->ViewCustomAttributes = "";

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->ViewValue = $this->ClinicalDiagnosis->CurrentValue;
			$this->ClinicalDiagnosis->ViewCustomAttributes = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal != "") {
				$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
					}
				}
			} else {
				$this->AnticoagulantifAny->ViewValue = NULL;
			}
			$this->AnticoagulantifAny->ViewCustomAttributes = "";

			// FoodAllergies
			$this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
			$this->FoodAllergies->ViewCustomAttributes = "";

			// GenericAllergies
			$curVal = strval($this->GenericAllergies->CurrentValue);
			if ($curVal != "") {
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
				if ($this->GenericAllergies->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->GenericAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->GenericAllergies->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
					}
				}
			} else {
				$this->GenericAllergies->ViewValue = NULL;
			}
			$this->GenericAllergies->ViewCustomAttributes = "";

			// GroupAllergies
			if ($this->GroupAllergies->VirtualValue != "") {
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
			} else {
				$curVal = strval($this->GroupAllergies->CurrentValue);
				if ($curVal != "") {
					$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
					if ($this->GroupAllergies->ViewValue === NULL) { // Lookup from database
						$arwrk = explode(",", $curVal);
						$filterWrk = "";
						foreach ($arwrk as $wrk) {
							if ($filterWrk != "")
								$filterWrk .= " OR ";
							$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
						}
						$sqlWrk = $this->GroupAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$this->GroupAllergies->ViewValue = new OptionValues();
							$ari = 0;
							while (!$rswrk->EOF) {
								$arwrk = [];
								$arwrk[1] = $rswrk->fields('df');
								$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
								$rswrk->MoveNext();
								$ari++;
							}
							$rswrk->Close();
						} else {
							$this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
						}
					}
				} else {
					$this->GroupAllergies->ViewValue = NULL;
				}
			}
			$this->GroupAllergies->ViewCustomAttributes = "";

			// Temp
			$this->Temp->ViewValue = $this->Temp->CurrentValue;
			$this->Temp->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// PR
			$this->PR->ViewValue = $this->PR->CurrentValue;
			$this->PR->ViewCustomAttributes = "";

			// CNS
			$this->CNS->ViewValue = $this->CNS->CurrentValue;
			$this->CNS->ViewCustomAttributes = "";

			// RSA
			$this->RSA->ViewValue = $this->RSA->CurrentValue;
			$this->RSA->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// PS
			$this->PS->ViewValue = $this->PS->CurrentValue;
			$this->PS->ViewCustomAttributes = "";

			// PV
			$this->PV->ViewValue = $this->PV->CurrentValue;
			$this->PV->ViewCustomAttributes = "";

			// clinicaldetails
			$curVal = strval($this->clinicaldetails->CurrentValue);
			if ($curVal != "") {
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
				if ($this->clinicaldetails->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->clinicaldetails->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->clinicaldetails->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
					}
				}
			} else {
				$this->clinicaldetails->ViewValue = NULL;
			}
			$this->clinicaldetails->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal != "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->status->ViewValue = $this->status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status->ViewValue = $this->status->CurrentValue;
					}
				}
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// PatientSearch
			$curVal = strval($this->PatientSearch->CurrentValue);
			if ($curVal != "") {
				$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
				if ($this->PatientSearch->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatientSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
					}
				}
			} else {
				$this->PatientSearch->ViewValue = NULL;
			}
			$this->PatientSearch->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";
			$this->HT->TooltipValue = "";

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";
			$this->WT->TooltipValue = "";

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";
			$this->SurfaceArea->TooltipValue = "";

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";
			$this->BodyMassIndex->TooltipValue = "";

			// ClinicalFindings
			$this->ClinicalFindings->LinkCustomAttributes = "";
			$this->ClinicalFindings->HrefValue = "";
			$this->ClinicalFindings->TooltipValue = "";

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->LinkCustomAttributes = "";
			$this->ClinicalDiagnosis->HrefValue = "";
			$this->ClinicalDiagnosis->TooltipValue = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";
			$this->AnticoagulantifAny->TooltipValue = "";

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";
			$this->FoodAllergies->TooltipValue = "";

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";
			$this->GenericAllergies->TooltipValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";
			$this->GroupAllergies->TooltipValue = "";

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

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";
			$this->PR->TooltipValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";
			$this->CNS->TooltipValue = "";

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";
			$this->RSA->TooltipValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";
			$this->PS->TooltipValue = "";

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";
			$this->PV->TooltipValue = "";

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";
			$this->clinicaldetails->TooltipValue = "";

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

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() != "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
				$this->mrnno->ViewCustomAttributes = "";
			} else {
				if (!$this->mrnno->Raw)
					$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
				$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
				$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (!$this->PatID->Raw)
				$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (!$this->profilePic->Raw)
				$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// HT
			$this->HT->EditAttrs["class"] = "form-control";
			$this->HT->EditCustomAttributes = "";
			if (!$this->HT->Raw)
				$this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
			$this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
			$this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

			// WT
			$this->WT->EditAttrs["class"] = "form-control";
			$this->WT->EditCustomAttributes = "";
			if (!$this->WT->Raw)
				$this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
			$this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
			$this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

			// SurfaceArea
			$this->SurfaceArea->EditAttrs["class"] = "form-control";
			$this->SurfaceArea->EditCustomAttributes = "";
			if (!$this->SurfaceArea->Raw)
				$this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

			// BodyMassIndex
			$this->BodyMassIndex->EditAttrs["class"] = "form-control";
			$this->BodyMassIndex->EditCustomAttributes = "";
			if (!$this->BodyMassIndex->Raw)
				$this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

			// ClinicalFindings
			$this->ClinicalFindings->EditAttrs["class"] = "form-control";
			$this->ClinicalFindings->EditCustomAttributes = "";
			$this->ClinicalFindings->EditValue = HtmlEncode($this->ClinicalFindings->CurrentValue);
			$this->ClinicalFindings->PlaceHolder = RemoveHtml($this->ClinicalFindings->caption());

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->EditAttrs["class"] = "form-control";
			$this->ClinicalDiagnosis->EditCustomAttributes = "";
			$this->ClinicalDiagnosis->EditValue = HtmlEncode($this->ClinicalDiagnosis->CurrentValue);
			$this->ClinicalDiagnosis->PlaceHolder = RemoveHtml($this->ClinicalDiagnosis->caption());

			// AnticoagulantifAny
			$this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
			$this->AnticoagulantifAny->EditCustomAttributes = "";
			if (!$this->AnticoagulantifAny->Raw)
				$this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
			$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal != "") {
				$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
					}
				}
			} else {
				$this->AnticoagulantifAny->EditValue = NULL;
			}
			$this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

			// FoodAllergies
			$this->FoodAllergies->EditAttrs["class"] = "form-control";
			$this->FoodAllergies->EditCustomAttributes = "";
			if (!$this->FoodAllergies->Raw)
				$this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

			// GenericAllergies
			$this->GenericAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GenericAllergies->CurrentValue));
			if ($curVal != "")
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
			else
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== NULL && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GenericAllergies->ViewValue !== NULL) { // Load from cache
				$this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
				if ($this->GenericAllergies->ViewValue == "")
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GenericAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GenericAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->GenericAllergies->EditValue = $arwrk;
			}

			// GroupAllergies
			$this->GroupAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GroupAllergies->CurrentValue));
			if ($curVal != "")
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
			else
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== NULL && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GroupAllergies->ViewValue !== NULL) { // Load from cache
				$this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
				if ($this->GroupAllergies->ViewValue == "")
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GroupAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GroupAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->GroupAllergies->EditValue = $arwrk;
			}

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (!$this->Temp->Raw)
				$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (!$this->Pulse->Raw)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (!$this->BP->Raw)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// PR
			$this->PR->EditAttrs["class"] = "form-control";
			$this->PR->EditCustomAttributes = "";
			if (!$this->PR->Raw)
				$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
			$this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
			$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (!$this->CNS->Raw)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RSA
			$this->RSA->EditAttrs["class"] = "form-control";
			$this->RSA->EditCustomAttributes = "";
			if (!$this->RSA->Raw)
				$this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
			$this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
			$this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (!$this->CVS->Raw)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (!$this->PA->Raw)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// PS
			$this->PS->EditAttrs["class"] = "form-control";
			$this->PS->EditCustomAttributes = "";
			if (!$this->PS->Raw)
				$this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
			$this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
			$this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

			// PV
			$this->PV->EditAttrs["class"] = "form-control";
			$this->PV->EditCustomAttributes = "";
			if (!$this->PV->Raw)
				$this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
			$this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
			$this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

			// clinicaldetails
			$this->clinicaldetails->EditCustomAttributes = "";
			$curVal = trim(strval($this->clinicaldetails->CurrentValue));
			if ($curVal != "")
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
			else
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== NULL && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : NULL;
			if ($this->clinicaldetails->ViewValue !== NULL) { // Load from cache
				$this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->clinicaldetails->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->clinicaldetails->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal != "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->status->EditValue = $arwrk;
			}

			// createdby
			// createddatetime
			// Age

			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// PatientSearch
			$this->PatientSearch->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientSearch->CurrentValue));
			if ($curVal != "")
				$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
			else
				$this->PatientSearch->ViewValue = $this->PatientSearch->Lookup !== NULL && is_array($this->PatientSearch->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientSearch->ViewValue !== NULL) { // Load from cache
				$this->PatientSearch->EditValue = array_values($this->PatientSearch->Lookup->Options);
				if ($this->PatientSearch->ViewValue == "")
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PatientSearch->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PatientSearch->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
				} else {
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PatientSearch->EditValue = $arwrk;
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if ($this->PatientId->getSessionValue() != "") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
				$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
				$this->PatientId->ViewCustomAttributes = "";
			} else {
				$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
				$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
			}

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() != "") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
				$this->Reception->ViewValue = $this->Reception->CurrentValue;
				$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
				$this->Reception->ViewCustomAttributes = "";
			} else {
				$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
				$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
			}

			// HospID
			// Add refer script
			// mrnno

			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";

			// ClinicalFindings
			$this->ClinicalFindings->LinkCustomAttributes = "";
			$this->ClinicalFindings->HrefValue = "";

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->LinkCustomAttributes = "";
			$this->ClinicalDiagnosis->HrefValue = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->HT->Required) {
			if (!$this->HT->IsDetailKey && $this->HT->FormValue != NULL && $this->HT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HT->caption(), $this->HT->RequiredErrorMessage));
			}
		}
		if ($this->WT->Required) {
			if (!$this->WT->IsDetailKey && $this->WT->FormValue != NULL && $this->WT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WT->caption(), $this->WT->RequiredErrorMessage));
			}
		}
		if ($this->SurfaceArea->Required) {
			if (!$this->SurfaceArea->IsDetailKey && $this->SurfaceArea->FormValue != NULL && $this->SurfaceArea->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurfaceArea->caption(), $this->SurfaceArea->RequiredErrorMessage));
			}
		}
		if ($this->BodyMassIndex->Required) {
			if (!$this->BodyMassIndex->IsDetailKey && $this->BodyMassIndex->FormValue != NULL && $this->BodyMassIndex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BodyMassIndex->caption(), $this->BodyMassIndex->RequiredErrorMessage));
			}
		}
		if ($this->ClinicalFindings->Required) {
			if (!$this->ClinicalFindings->IsDetailKey && $this->ClinicalFindings->FormValue != NULL && $this->ClinicalFindings->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClinicalFindings->caption(), $this->ClinicalFindings->RequiredErrorMessage));
			}
		}
		if ($this->ClinicalDiagnosis->Required) {
			if (!$this->ClinicalDiagnosis->IsDetailKey && $this->ClinicalDiagnosis->FormValue != NULL && $this->ClinicalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClinicalDiagnosis->caption(), $this->ClinicalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->AnticoagulantifAny->Required) {
			if (!$this->AnticoagulantifAny->IsDetailKey && $this->AnticoagulantifAny->FormValue != NULL && $this->AnticoagulantifAny->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnticoagulantifAny->caption(), $this->AnticoagulantifAny->RequiredErrorMessage));
			}
		}
		if ($this->FoodAllergies->Required) {
			if (!$this->FoodAllergies->IsDetailKey && $this->FoodAllergies->FormValue != NULL && $this->FoodAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FoodAllergies->caption(), $this->FoodAllergies->RequiredErrorMessage));
			}
		}
		if ($this->GenericAllergies->Required) {
			if ($this->GenericAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GenericAllergies->caption(), $this->GenericAllergies->RequiredErrorMessage));
			}
		}
		if ($this->GroupAllergies->Required) {
			if ($this->GroupAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupAllergies->caption(), $this->GroupAllergies->RequiredErrorMessage));
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
		if ($this->PR->Required) {
			if (!$this->PR->IsDetailKey && $this->PR->FormValue != NULL && $this->PR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR->caption(), $this->PR->RequiredErrorMessage));
			}
		}
		if ($this->CNS->Required) {
			if (!$this->CNS->IsDetailKey && $this->CNS->FormValue != NULL && $this->CNS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
			}
		}
		if ($this->RSA->Required) {
			if (!$this->RSA->IsDetailKey && $this->RSA->FormValue != NULL && $this->RSA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RSA->caption(), $this->RSA->RequiredErrorMessage));
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
		if ($this->PS->Required) {
			if (!$this->PS->IsDetailKey && $this->PS->FormValue != NULL && $this->PS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PS->caption(), $this->PS->RequiredErrorMessage));
			}
		}
		if ($this->PV->Required) {
			if (!$this->PV->IsDetailKey && $this->PV->FormValue != NULL && $this->PV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PV->caption(), $this->PV->RequiredErrorMessage));
			}
		}
		if ($this->clinicaldetails->Required) {
			if ($this->clinicaldetails->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->clinicaldetails->caption(), $this->clinicaldetails->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->PatientSearch->Required) {
			if (!$this->PatientSearch->IsDetailKey && $this->PatientSearch->FormValue != NULL && $this->PatientSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Reception->FormValue)) {
			AddMessage($FormError, $this->Reception->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// HT
		$this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, NULL, FALSE);

		// WT
		$this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, NULL, FALSE);

		// SurfaceArea
		$this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, NULL, FALSE);

		// BodyMassIndex
		$this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, NULL, FALSE);

		// ClinicalFindings
		$this->ClinicalFindings->setDbValueDef($rsnew, $this->ClinicalFindings->CurrentValue, NULL, FALSE);

		// ClinicalDiagnosis
		$this->ClinicalDiagnosis->setDbValueDef($rsnew, $this->ClinicalDiagnosis->CurrentValue, NULL, FALSE);

		// AnticoagulantifAny
		$this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, NULL, FALSE);

		// FoodAllergies
		$this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, NULL, FALSE);

		// GenericAllergies
		$this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, NULL, FALSE);

		// GroupAllergies
		$this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, NULL, FALSE);

		// Temp
		$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, FALSE);

		// Pulse
		$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, FALSE);

		// BP
		$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, FALSE);

		// PR
		$this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, NULL, FALSE);

		// CNS
		$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, FALSE);

		// RSA
		$this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, NULL, FALSE);

		// CVS
		$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, FALSE);

		// PA
		$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, FALSE);

		// PS
		$this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, NULL, FALSE);

		// PV
		$this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, NULL, FALSE);

		// clinicaldetails
		$this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->CurrentValue = CurrentUserName();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// PatientSearch
		$this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setQueryStringValue($parm);
					$this->Reception->setQueryStringValue($GLOBALS["ip_admission"]->id->QueryStringValue);
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_patient_id", Get("PatientId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setQueryStringValue($parm);
					$this->PatientId->setQueryStringValue($GLOBALS["ip_admission"]->patient_id->QueryStringValue);
					$this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setQueryStringValue($parm);
					$this->mrnno->setQueryStringValue($GLOBALS["ip_admission"]->mrnNo->QueryStringValue);
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
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
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setFormValue($parm);
					$this->Reception->setFormValue($GLOBALS["ip_admission"]->id->FormValue);
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_patient_id", Post("PatientId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setFormValue($parm);
					$this->PatientId->setFormValue($GLOBALS["ip_admission"]->patient_id->FormValue);
					$this->PatientId->setSessionValue($this->PatientId->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setFormValue($parm);
					$this->mrnno->setFormValue($GLOBALS["ip_admission"]->mrnNo->FormValue);
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
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
			if ($masterTblVar != "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->PatientId->CurrentValue == "")
					$this->PatientId->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_vitalslist.php"), "", $this->TableVar, TRUE);
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
				case "x_AnticoagulantifAny":
					break;
				case "x_GenericAllergies":
					break;
				case "x_GroupAllergies":
					break;
				case "x_clinicaldetails":
					break;
				case "x_status":
					break;
				case "x_PatientSearch":
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
						case "x_AnticoagulantifAny":
							break;
						case "x_GenericAllergies":
							break;
						case "x_GroupAllergies":
							break;
						case "x_clinicaldetails":
							break;
						case "x_status":
							break;
						case "x_PatientSearch":
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
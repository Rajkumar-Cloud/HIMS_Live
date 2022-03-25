<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_addopt extends patient
{

	// Page ID
	public $PageID = "addopt";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient';

	// Page object name
	public $PageObjName = "patient_addopt";

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

		// Table object (patient)
		if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
			$GLOBALS["patient"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'addopt');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');

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

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $patient;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient);
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
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
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
			$key .= @$ar['id'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['PatientID'];
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

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
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
					$this->terminate(GetUrl("patientlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->PatientID->setVisibility();
		$this->title->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->Age->setVisibility();
		$this->blood_group->setVisibility();
		$this->mobile_no->setVisibility();
		$this->description->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->profilePic->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->Religion->setVisibility();
		$this->Nationality->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->spouse_title->setVisibility();
		$this->spouse_first_name->setVisibility();
		$this->spouse_middle_name->setVisibility();
		$this->spouse_last_name->setVisibility();
		$this->spouse_gender->setVisibility();
		$this->spouse_dob->setVisibility();
		$this->spouse_Age->setVisibility();
		$this->spouse_blood_group->setVisibility();
		$this->spouse_mobile_no->setVisibility();
		$this->Maritalstatus->setVisibility();
		$this->Business->setVisibility();
		$this->Patient_Language->setVisibility();
		$this->Passport->setVisibility();
		$this->VisaNo->setVisibility();
		$this->ValidityOfVisa->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->street->setVisibility();
		$this->town->setVisibility();
		$this->province->setVisibility();
		$this->country->setVisibility();
		$this->postal_code->setVisibility();
		$this->PEmail->setVisibility();
		$this->PEmergencyContact->setVisibility();
		$this->occupation->setVisibility();
		$this->spouse_occupation->setVisibility();
		$this->WhatsApp->setVisibility();
		$this->CouppleID->setVisibility();
		$this->MaleID->setVisibility();
		$this->FemaleID->setVisibility();
		$this->GroupID->setVisibility();
		$this->Relationship->setVisibility();
		$this->AppointmentSearch->setVisibility();
		$this->FacebookID->setVisibility();
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
		$this->setupLookupOptions($this->title);
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->blood_group);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->ReferA4TreatingConsultant);
		$this->setupLookupOptions($this->spouse_title);
		$this->setupLookupOptions($this->spouse_gender);
		$this->setupLookupOptions($this->spouse_blood_group);
		$this->setupLookupOptions($this->Maritalstatus);
		$this->setupLookupOptions($this->Business);
		$this->setupLookupOptions($this->Patient_Language);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->AppointmentSearch);
		set_error_handler(PROJECT_NAMESPACE . "ErrorHandler");

		// Set up Breadcrumb
		//$this->setupBreadcrumb(); // Not used

		$this->loadRowValues(); // Load default values

		// Render row
		$this->RowType = ROWTYPE_ADD; // Render add type
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
		$this->profilePic->Upload->Index = $CurrentForm->Index;
		$this->profilePic->Upload->uploadFile();
		$this->profilePic->CurrentValue = $this->profilePic->Upload->FileName;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->title->CurrentValue = NULL;
		$this->title->OldValue = $this->title->CurrentValue;
		$this->first_name->CurrentValue = NULL;
		$this->first_name->OldValue = $this->first_name->CurrentValue;
		$this->middle_name->CurrentValue = NULL;
		$this->middle_name->OldValue = $this->middle_name->CurrentValue;
		$this->last_name->CurrentValue = NULL;
		$this->last_name->OldValue = $this->last_name->CurrentValue;
		$this->gender->CurrentValue = NULL;
		$this->gender->OldValue = $this->gender->CurrentValue;
		$this->dob->CurrentValue = NULL;
		$this->dob->OldValue = $this->dob->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->blood_group->CurrentValue = NULL;
		$this->blood_group->OldValue = $this->blood_group->CurrentValue;
		$this->mobile_no->CurrentValue = NULL;
		$this->mobile_no->OldValue = $this->mobile_no->CurrentValue;
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
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
		$this->profilePic->Upload->DbValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->Upload->DbValue;
		$this->profilePic->CurrentValue = NULL; // Clear file related field
		$this->IdentificationMark->CurrentValue = NULL;
		$this->IdentificationMark->OldValue = $this->IdentificationMark->CurrentValue;
		$this->Religion->CurrentValue = NULL;
		$this->Religion->OldValue = $this->Religion->CurrentValue;
		$this->Nationality->CurrentValue = NULL;
		$this->Nationality->OldValue = $this->Nationality->CurrentValue;
		$this->ReferedByDr->CurrentValue = NULL;
		$this->ReferedByDr->OldValue = $this->ReferedByDr->CurrentValue;
		$this->ReferClinicname->CurrentValue = NULL;
		$this->ReferClinicname->OldValue = $this->ReferClinicname->CurrentValue;
		$this->ReferCity->CurrentValue = NULL;
		$this->ReferCity->OldValue = $this->ReferCity->CurrentValue;
		$this->ReferMobileNo->CurrentValue = NULL;
		$this->ReferMobileNo->OldValue = $this->ReferMobileNo->CurrentValue;
		$this->ReferA4TreatingConsultant->CurrentValue = NULL;
		$this->ReferA4TreatingConsultant->OldValue = $this->ReferA4TreatingConsultant->CurrentValue;
		$this->PurposreReferredfor->CurrentValue = NULL;
		$this->PurposreReferredfor->OldValue = $this->PurposreReferredfor->CurrentValue;
		$this->spouse_title->CurrentValue = NULL;
		$this->spouse_title->OldValue = $this->spouse_title->CurrentValue;
		$this->spouse_first_name->CurrentValue = NULL;
		$this->spouse_first_name->OldValue = $this->spouse_first_name->CurrentValue;
		$this->spouse_middle_name->CurrentValue = NULL;
		$this->spouse_middle_name->OldValue = $this->spouse_middle_name->CurrentValue;
		$this->spouse_last_name->CurrentValue = NULL;
		$this->spouse_last_name->OldValue = $this->spouse_last_name->CurrentValue;
		$this->spouse_gender->CurrentValue = NULL;
		$this->spouse_gender->OldValue = $this->spouse_gender->CurrentValue;
		$this->spouse_dob->CurrentValue = NULL;
		$this->spouse_dob->OldValue = $this->spouse_dob->CurrentValue;
		$this->spouse_Age->CurrentValue = NULL;
		$this->spouse_Age->OldValue = $this->spouse_Age->CurrentValue;
		$this->spouse_blood_group->CurrentValue = NULL;
		$this->spouse_blood_group->OldValue = $this->spouse_blood_group->CurrentValue;
		$this->spouse_mobile_no->CurrentValue = NULL;
		$this->spouse_mobile_no->OldValue = $this->spouse_mobile_no->CurrentValue;
		$this->Maritalstatus->CurrentValue = NULL;
		$this->Maritalstatus->OldValue = $this->Maritalstatus->CurrentValue;
		$this->Business->CurrentValue = NULL;
		$this->Business->OldValue = $this->Business->CurrentValue;
		$this->Patient_Language->CurrentValue = NULL;
		$this->Patient_Language->OldValue = $this->Patient_Language->CurrentValue;
		$this->Passport->CurrentValue = NULL;
		$this->Passport->OldValue = $this->Passport->CurrentValue;
		$this->VisaNo->CurrentValue = NULL;
		$this->VisaNo->OldValue = $this->VisaNo->CurrentValue;
		$this->ValidityOfVisa->CurrentValue = NULL;
		$this->ValidityOfVisa->OldValue = $this->ValidityOfVisa->CurrentValue;
		$this->WhereDidYouHear->CurrentValue = NULL;
		$this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->street->CurrentValue = NULL;
		$this->street->OldValue = $this->street->CurrentValue;
		$this->town->CurrentValue = NULL;
		$this->town->OldValue = $this->town->CurrentValue;
		$this->province->CurrentValue = NULL;
		$this->province->OldValue = $this->province->CurrentValue;
		$this->country->CurrentValue = NULL;
		$this->country->OldValue = $this->country->CurrentValue;
		$this->postal_code->CurrentValue = NULL;
		$this->postal_code->OldValue = $this->postal_code->CurrentValue;
		$this->PEmail->CurrentValue = NULL;
		$this->PEmail->OldValue = $this->PEmail->CurrentValue;
		$this->PEmergencyContact->CurrentValue = NULL;
		$this->PEmergencyContact->OldValue = $this->PEmergencyContact->CurrentValue;
		$this->occupation->CurrentValue = NULL;
		$this->occupation->OldValue = $this->occupation->CurrentValue;
		$this->spouse_occupation->CurrentValue = NULL;
		$this->spouse_occupation->OldValue = $this->spouse_occupation->CurrentValue;
		$this->WhatsApp->CurrentValue = NULL;
		$this->WhatsApp->OldValue = $this->WhatsApp->CurrentValue;
		$this->CouppleID->CurrentValue = NULL;
		$this->CouppleID->OldValue = $this->CouppleID->CurrentValue;
		$this->MaleID->CurrentValue = NULL;
		$this->MaleID->OldValue = $this->MaleID->CurrentValue;
		$this->FemaleID->CurrentValue = NULL;
		$this->FemaleID->OldValue = $this->FemaleID->CurrentValue;
		$this->GroupID->CurrentValue = NULL;
		$this->GroupID->OldValue = $this->GroupID->CurrentValue;
		$this->Relationship->CurrentValue = NULL;
		$this->Relationship->OldValue = $this->Relationship->CurrentValue;
		$this->AppointmentSearch->CurrentValue = NULL;
		$this->AppointmentSearch->OldValue = $this->AppointmentSearch->CurrentValue;
		$this->FacebookID->CurrentValue = NULL;
		$this->FacebookID->OldValue = $this->FacebookID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			$this->PatientID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'title' first before field var 'x_title'
		$val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x_title");
		if (!$this->title->IsDetailKey) {
			$this->title->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'first_name' first before field var 'x_first_name'
		$val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
		if (!$this->first_name->IsDetailKey) {
			$this->first_name->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'middle_name' first before field var 'x_middle_name'
		$val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
		if (!$this->middle_name->IsDetailKey) {
			$this->middle_name->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'last_name' first before field var 'x_last_name'
		$val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
		if (!$this->last_name->IsDetailKey) {
			$this->last_name->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			$this->gender->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'dob' first before field var 'x_dob'
		$val = $CurrentForm->hasValue("dob") ? $CurrentForm->getValue("dob") : $CurrentForm->getValue("x_dob");
		if (!$this->dob->IsDetailKey) {
			$this->dob->setFormValue(ConvertFromUtf8($val));
			$this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 7);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			$this->Age->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'blood_group' first before field var 'x_blood_group'
		$val = $CurrentForm->hasValue("blood_group") ? $CurrentForm->getValue("blood_group") : $CurrentForm->getValue("x_blood_group");
		if (!$this->blood_group->IsDetailKey) {
			$this->blood_group->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'mobile_no' first before field var 'x_mobile_no'
		$val = $CurrentForm->hasValue("mobile_no") ? $CurrentForm->getValue("mobile_no") : $CurrentForm->getValue("x_mobile_no");
		if (!$this->mobile_no->IsDetailKey) {
			$this->mobile_no->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			$this->description->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			$this->status->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			$this->createdby->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			$this->createddatetime->setFormValue(ConvertFromUtf8($val));
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			$this->modifiedby->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			$this->modifieddatetime->setFormValue(ConvertFromUtf8($val));
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}

		// Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
		$val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
		if (!$this->IdentificationMark->IsDetailKey) {
			$this->IdentificationMark->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Religion' first before field var 'x_Religion'
		$val = $CurrentForm->hasValue("Religion") ? $CurrentForm->getValue("Religion") : $CurrentForm->getValue("x_Religion");
		if (!$this->Religion->IsDetailKey) {
			$this->Religion->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Nationality' first before field var 'x_Nationality'
		$val = $CurrentForm->hasValue("Nationality") ? $CurrentForm->getValue("Nationality") : $CurrentForm->getValue("x_Nationality");
		if (!$this->Nationality->IsDetailKey) {
			$this->Nationality->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ReferedByDr' first before field var 'x_ReferedByDr'
		$val = $CurrentForm->hasValue("ReferedByDr") ? $CurrentForm->getValue("ReferedByDr") : $CurrentForm->getValue("x_ReferedByDr");
		if (!$this->ReferedByDr->IsDetailKey) {
			$this->ReferedByDr->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ReferClinicname' first before field var 'x_ReferClinicname'
		$val = $CurrentForm->hasValue("ReferClinicname") ? $CurrentForm->getValue("ReferClinicname") : $CurrentForm->getValue("x_ReferClinicname");
		if (!$this->ReferClinicname->IsDetailKey) {
			$this->ReferClinicname->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ReferCity' first before field var 'x_ReferCity'
		$val = $CurrentForm->hasValue("ReferCity") ? $CurrentForm->getValue("ReferCity") : $CurrentForm->getValue("x_ReferCity");
		if (!$this->ReferCity->IsDetailKey) {
			$this->ReferCity->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ReferMobileNo' first before field var 'x_ReferMobileNo'
		$val = $CurrentForm->hasValue("ReferMobileNo") ? $CurrentForm->getValue("ReferMobileNo") : $CurrentForm->getValue("x_ReferMobileNo");
		if (!$this->ReferMobileNo->IsDetailKey) {
			$this->ReferMobileNo->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ReferA4TreatingConsultant' first before field var 'x_ReferA4TreatingConsultant'
		$val = $CurrentForm->hasValue("ReferA4TreatingConsultant") ? $CurrentForm->getValue("ReferA4TreatingConsultant") : $CurrentForm->getValue("x_ReferA4TreatingConsultant");
		if (!$this->ReferA4TreatingConsultant->IsDetailKey) {
			$this->ReferA4TreatingConsultant->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PurposreReferredfor' first before field var 'x_PurposreReferredfor'
		$val = $CurrentForm->hasValue("PurposreReferredfor") ? $CurrentForm->getValue("PurposreReferredfor") : $CurrentForm->getValue("x_PurposreReferredfor");
		if (!$this->PurposreReferredfor->IsDetailKey) {
			$this->PurposreReferredfor->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_title' first before field var 'x_spouse_title'
		$val = $CurrentForm->hasValue("spouse_title") ? $CurrentForm->getValue("spouse_title") : $CurrentForm->getValue("x_spouse_title");
		if (!$this->spouse_title->IsDetailKey) {
			$this->spouse_title->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_first_name' first before field var 'x_spouse_first_name'
		$val = $CurrentForm->hasValue("spouse_first_name") ? $CurrentForm->getValue("spouse_first_name") : $CurrentForm->getValue("x_spouse_first_name");
		if (!$this->spouse_first_name->IsDetailKey) {
			$this->spouse_first_name->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_middle_name' first before field var 'x_spouse_middle_name'
		$val = $CurrentForm->hasValue("spouse_middle_name") ? $CurrentForm->getValue("spouse_middle_name") : $CurrentForm->getValue("x_spouse_middle_name");
		if (!$this->spouse_middle_name->IsDetailKey) {
			$this->spouse_middle_name->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_last_name' first before field var 'x_spouse_last_name'
		$val = $CurrentForm->hasValue("spouse_last_name") ? $CurrentForm->getValue("spouse_last_name") : $CurrentForm->getValue("x_spouse_last_name");
		if (!$this->spouse_last_name->IsDetailKey) {
			$this->spouse_last_name->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_gender' first before field var 'x_spouse_gender'
		$val = $CurrentForm->hasValue("spouse_gender") ? $CurrentForm->getValue("spouse_gender") : $CurrentForm->getValue("x_spouse_gender");
		if (!$this->spouse_gender->IsDetailKey) {
			$this->spouse_gender->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_dob' first before field var 'x_spouse_dob'
		$val = $CurrentForm->hasValue("spouse_dob") ? $CurrentForm->getValue("spouse_dob") : $CurrentForm->getValue("x_spouse_dob");
		if (!$this->spouse_dob->IsDetailKey) {
			$this->spouse_dob->setFormValue(ConvertFromUtf8($val));
			$this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 7);
		}

		// Check field name 'spouse_Age' first before field var 'x_spouse_Age'
		$val = $CurrentForm->hasValue("spouse_Age") ? $CurrentForm->getValue("spouse_Age") : $CurrentForm->getValue("x_spouse_Age");
		if (!$this->spouse_Age->IsDetailKey) {
			$this->spouse_Age->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_blood_group' first before field var 'x_spouse_blood_group'
		$val = $CurrentForm->hasValue("spouse_blood_group") ? $CurrentForm->getValue("spouse_blood_group") : $CurrentForm->getValue("x_spouse_blood_group");
		if (!$this->spouse_blood_group->IsDetailKey) {
			$this->spouse_blood_group->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_mobile_no' first before field var 'x_spouse_mobile_no'
		$val = $CurrentForm->hasValue("spouse_mobile_no") ? $CurrentForm->getValue("spouse_mobile_no") : $CurrentForm->getValue("x_spouse_mobile_no");
		if (!$this->spouse_mobile_no->IsDetailKey) {
			$this->spouse_mobile_no->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Maritalstatus' first before field var 'x_Maritalstatus'
		$val = $CurrentForm->hasValue("Maritalstatus") ? $CurrentForm->getValue("Maritalstatus") : $CurrentForm->getValue("x_Maritalstatus");
		if (!$this->Maritalstatus->IsDetailKey) {
			$this->Maritalstatus->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Business' first before field var 'x_Business'
		$val = $CurrentForm->hasValue("Business") ? $CurrentForm->getValue("Business") : $CurrentForm->getValue("x_Business");
		if (!$this->Business->IsDetailKey) {
			$this->Business->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Patient_Language' first before field var 'x_Patient_Language'
		$val = $CurrentForm->hasValue("Patient_Language") ? $CurrentForm->getValue("Patient_Language") : $CurrentForm->getValue("x_Patient_Language");
		if (!$this->Patient_Language->IsDetailKey) {
			$this->Patient_Language->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Passport' first before field var 'x_Passport'
		$val = $CurrentForm->hasValue("Passport") ? $CurrentForm->getValue("Passport") : $CurrentForm->getValue("x_Passport");
		if (!$this->Passport->IsDetailKey) {
			$this->Passport->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'VisaNo' first before field var 'x_VisaNo'
		$val = $CurrentForm->hasValue("VisaNo") ? $CurrentForm->getValue("VisaNo") : $CurrentForm->getValue("x_VisaNo");
		if (!$this->VisaNo->IsDetailKey) {
			$this->VisaNo->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'ValidityOfVisa' first before field var 'x_ValidityOfVisa'
		$val = $CurrentForm->hasValue("ValidityOfVisa") ? $CurrentForm->getValue("ValidityOfVisa") : $CurrentForm->getValue("x_ValidityOfVisa");
		if (!$this->ValidityOfVisa->IsDetailKey) {
			$this->ValidityOfVisa->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
		$val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
		if (!$this->WhereDidYouHear->IsDetailKey) {
			$this->WhereDidYouHear->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			$this->HospID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'street' first before field var 'x_street'
		$val = $CurrentForm->hasValue("street") ? $CurrentForm->getValue("street") : $CurrentForm->getValue("x_street");
		if (!$this->street->IsDetailKey) {
			$this->street->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'town' first before field var 'x_town'
		$val = $CurrentForm->hasValue("town") ? $CurrentForm->getValue("town") : $CurrentForm->getValue("x_town");
		if (!$this->town->IsDetailKey) {
			$this->town->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'province' first before field var 'x_province'
		$val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
		if (!$this->province->IsDetailKey) {
			$this->province->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'country' first before field var 'x_country'
		$val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
		if (!$this->country->IsDetailKey) {
			$this->country->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'postal_code' first before field var 'x_postal_code'
		$val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
		if (!$this->postal_code->IsDetailKey) {
			$this->postal_code->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PEmail' first before field var 'x_PEmail'
		$val = $CurrentForm->hasValue("PEmail") ? $CurrentForm->getValue("PEmail") : $CurrentForm->getValue("x_PEmail");
		if (!$this->PEmail->IsDetailKey) {
			$this->PEmail->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'PEmergencyContact' first before field var 'x_PEmergencyContact'
		$val = $CurrentForm->hasValue("PEmergencyContact") ? $CurrentForm->getValue("PEmergencyContact") : $CurrentForm->getValue("x_PEmergencyContact");
		if (!$this->PEmergencyContact->IsDetailKey) {
			$this->PEmergencyContact->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'occupation' first before field var 'x_occupation'
		$val = $CurrentForm->hasValue("occupation") ? $CurrentForm->getValue("occupation") : $CurrentForm->getValue("x_occupation");
		if (!$this->occupation->IsDetailKey) {
			$this->occupation->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'spouse_occupation' first before field var 'x_spouse_occupation'
		$val = $CurrentForm->hasValue("spouse_occupation") ? $CurrentForm->getValue("spouse_occupation") : $CurrentForm->getValue("x_spouse_occupation");
		if (!$this->spouse_occupation->IsDetailKey) {
			$this->spouse_occupation->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'WhatsApp' first before field var 'x_WhatsApp'
		$val = $CurrentForm->hasValue("WhatsApp") ? $CurrentForm->getValue("WhatsApp") : $CurrentForm->getValue("x_WhatsApp");
		if (!$this->WhatsApp->IsDetailKey) {
			$this->WhatsApp->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'CouppleID' first before field var 'x_CouppleID'
		$val = $CurrentForm->hasValue("CouppleID") ? $CurrentForm->getValue("CouppleID") : $CurrentForm->getValue("x_CouppleID");
		if (!$this->CouppleID->IsDetailKey) {
			$this->CouppleID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'MaleID' first before field var 'x_MaleID'
		$val = $CurrentForm->hasValue("MaleID") ? $CurrentForm->getValue("MaleID") : $CurrentForm->getValue("x_MaleID");
		if (!$this->MaleID->IsDetailKey) {
			$this->MaleID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'FemaleID' first before field var 'x_FemaleID'
		$val = $CurrentForm->hasValue("FemaleID") ? $CurrentForm->getValue("FemaleID") : $CurrentForm->getValue("x_FemaleID");
		if (!$this->FemaleID->IsDetailKey) {
			$this->FemaleID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'GroupID' first before field var 'x_GroupID'
		$val = $CurrentForm->hasValue("GroupID") ? $CurrentForm->getValue("GroupID") : $CurrentForm->getValue("x_GroupID");
		if (!$this->GroupID->IsDetailKey) {
			$this->GroupID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Relationship' first before field var 'x_Relationship'
		$val = $CurrentForm->hasValue("Relationship") ? $CurrentForm->getValue("Relationship") : $CurrentForm->getValue("x_Relationship");
		if (!$this->Relationship->IsDetailKey) {
			$this->Relationship->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'AppointmentSearch' first before field var 'x_AppointmentSearch'
		$val = $CurrentForm->hasValue("AppointmentSearch") ? $CurrentForm->getValue("AppointmentSearch") : $CurrentForm->getValue("x_AppointmentSearch");
		if (!$this->AppointmentSearch->IsDetailKey) {
			$this->AppointmentSearch->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'FacebookID' first before field var 'x_FacebookID'
		$val = $CurrentForm->hasValue("FacebookID") ? $CurrentForm->getValue("FacebookID") : $CurrentForm->getValue("x_FacebookID");
		if (!$this->FacebookID->IsDetailKey) {
			$this->FacebookID->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PatientID->CurrentValue = ConvertToUtf8($this->PatientID->FormValue);
		$this->title->CurrentValue = ConvertToUtf8($this->title->FormValue);
		$this->first_name->CurrentValue = ConvertToUtf8($this->first_name->FormValue);
		$this->middle_name->CurrentValue = ConvertToUtf8($this->middle_name->FormValue);
		$this->last_name->CurrentValue = ConvertToUtf8($this->last_name->FormValue);
		$this->gender->CurrentValue = ConvertToUtf8($this->gender->FormValue);
		$this->dob->CurrentValue = ConvertToUtf8($this->dob->FormValue);
		$this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 7);
		$this->Age->CurrentValue = ConvertToUtf8($this->Age->FormValue);
		$this->blood_group->CurrentValue = ConvertToUtf8($this->blood_group->FormValue);
		$this->mobile_no->CurrentValue = ConvertToUtf8($this->mobile_no->FormValue);
		$this->description->CurrentValue = ConvertToUtf8($this->description->FormValue);
		$this->status->CurrentValue = ConvertToUtf8($this->status->FormValue);
		$this->createdby->CurrentValue = ConvertToUtf8($this->createdby->FormValue);
		$this->createddatetime->CurrentValue = ConvertToUtf8($this->createddatetime->FormValue);
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = ConvertToUtf8($this->modifiedby->FormValue);
		$this->modifieddatetime->CurrentValue = ConvertToUtf8($this->modifieddatetime->FormValue);
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->IdentificationMark->CurrentValue = ConvertToUtf8($this->IdentificationMark->FormValue);
		$this->Religion->CurrentValue = ConvertToUtf8($this->Religion->FormValue);
		$this->Nationality->CurrentValue = ConvertToUtf8($this->Nationality->FormValue);
		$this->ReferedByDr->CurrentValue = ConvertToUtf8($this->ReferedByDr->FormValue);
		$this->ReferClinicname->CurrentValue = ConvertToUtf8($this->ReferClinicname->FormValue);
		$this->ReferCity->CurrentValue = ConvertToUtf8($this->ReferCity->FormValue);
		$this->ReferMobileNo->CurrentValue = ConvertToUtf8($this->ReferMobileNo->FormValue);
		$this->ReferA4TreatingConsultant->CurrentValue = ConvertToUtf8($this->ReferA4TreatingConsultant->FormValue);
		$this->PurposreReferredfor->CurrentValue = ConvertToUtf8($this->PurposreReferredfor->FormValue);
		$this->spouse_title->CurrentValue = ConvertToUtf8($this->spouse_title->FormValue);
		$this->spouse_first_name->CurrentValue = ConvertToUtf8($this->spouse_first_name->FormValue);
		$this->spouse_middle_name->CurrentValue = ConvertToUtf8($this->spouse_middle_name->FormValue);
		$this->spouse_last_name->CurrentValue = ConvertToUtf8($this->spouse_last_name->FormValue);
		$this->spouse_gender->CurrentValue = ConvertToUtf8($this->spouse_gender->FormValue);
		$this->spouse_dob->CurrentValue = ConvertToUtf8($this->spouse_dob->FormValue);
		$this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 7);
		$this->spouse_Age->CurrentValue = ConvertToUtf8($this->spouse_Age->FormValue);
		$this->spouse_blood_group->CurrentValue = ConvertToUtf8($this->spouse_blood_group->FormValue);
		$this->spouse_mobile_no->CurrentValue = ConvertToUtf8($this->spouse_mobile_no->FormValue);
		$this->Maritalstatus->CurrentValue = ConvertToUtf8($this->Maritalstatus->FormValue);
		$this->Business->CurrentValue = ConvertToUtf8($this->Business->FormValue);
		$this->Patient_Language->CurrentValue = ConvertToUtf8($this->Patient_Language->FormValue);
		$this->Passport->CurrentValue = ConvertToUtf8($this->Passport->FormValue);
		$this->VisaNo->CurrentValue = ConvertToUtf8($this->VisaNo->FormValue);
		$this->ValidityOfVisa->CurrentValue = ConvertToUtf8($this->ValidityOfVisa->FormValue);
		$this->WhereDidYouHear->CurrentValue = ConvertToUtf8($this->WhereDidYouHear->FormValue);
		$this->HospID->CurrentValue = ConvertToUtf8($this->HospID->FormValue);
		$this->street->CurrentValue = ConvertToUtf8($this->street->FormValue);
		$this->town->CurrentValue = ConvertToUtf8($this->town->FormValue);
		$this->province->CurrentValue = ConvertToUtf8($this->province->FormValue);
		$this->country->CurrentValue = ConvertToUtf8($this->country->FormValue);
		$this->postal_code->CurrentValue = ConvertToUtf8($this->postal_code->FormValue);
		$this->PEmail->CurrentValue = ConvertToUtf8($this->PEmail->FormValue);
		$this->PEmergencyContact->CurrentValue = ConvertToUtf8($this->PEmergencyContact->FormValue);
		$this->occupation->CurrentValue = ConvertToUtf8($this->occupation->FormValue);
		$this->spouse_occupation->CurrentValue = ConvertToUtf8($this->spouse_occupation->FormValue);
		$this->WhatsApp->CurrentValue = ConvertToUtf8($this->WhatsApp->FormValue);
		$this->CouppleID->CurrentValue = ConvertToUtf8($this->CouppleID->FormValue);
		$this->MaleID->CurrentValue = ConvertToUtf8($this->MaleID->FormValue);
		$this->FemaleID->CurrentValue = ConvertToUtf8($this->FemaleID->FormValue);
		$this->GroupID->CurrentValue = ConvertToUtf8($this->GroupID->FormValue);
		$this->Relationship->CurrentValue = ConvertToUtf8($this->Relationship->FormValue);
		$this->AppointmentSearch->CurrentValue = ConvertToUtf8($this->AppointmentSearch->FormValue);
		$this->FacebookID->CurrentValue = ConvertToUtf8($this->FacebookID->FormValue);
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
		$this->PatientID->setDbValue($row['PatientID']);
		$this->title->setDbValue($row['title']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->dob->setDbValue($row['dob']);
		$this->Age->setDbValue($row['Age']);
		$this->blood_group->setDbValue($row['blood_group']);
		$this->mobile_no->setDbValue($row['mobile_no']);
		$this->description->setDbValue($row['description']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->Religion->setDbValue($row['Religion']);
		$this->Nationality->setDbValue($row['Nationality']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		if (array_key_exists('EV__ReferedByDr', $rs->fields)) {
			$this->ReferedByDr->VirtualValue = $rs->fields('EV__ReferedByDr'); // Set up virtual field value
		} else {
			$this->ReferedByDr->VirtualValue = ""; // Clear value
		}
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		if (array_key_exists('EV__ReferA4TreatingConsultant', $rs->fields)) {
			$this->ReferA4TreatingConsultant->VirtualValue = $rs->fields('EV__ReferA4TreatingConsultant'); // Set up virtual field value
		} else {
			$this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
		}
		$this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
		$this->spouse_title->setDbValue($row['spouse_title']);
		$this->spouse_first_name->setDbValue($row['spouse_first_name']);
		$this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
		$this->spouse_last_name->setDbValue($row['spouse_last_name']);
		$this->spouse_gender->setDbValue($row['spouse_gender']);
		$this->spouse_dob->setDbValue($row['spouse_dob']);
		$this->spouse_Age->setDbValue($row['spouse_Age']);
		$this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
		$this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
		$this->Maritalstatus->setDbValue($row['Maritalstatus']);
		$this->Business->setDbValue($row['Business']);
		$this->Patient_Language->setDbValue($row['Patient_Language']);
		$this->Passport->setDbValue($row['Passport']);
		$this->VisaNo->setDbValue($row['VisaNo']);
		$this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->street->setDbValue($row['street']);
		$this->town->setDbValue($row['town']);
		$this->province->setDbValue($row['province']);
		$this->country->setDbValue($row['country']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->PEmail->setDbValue($row['PEmail']);
		$this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
		$this->occupation->setDbValue($row['occupation']);
		$this->spouse_occupation->setDbValue($row['spouse_occupation']);
		$this->WhatsApp->setDbValue($row['WhatsApp']);
		$this->CouppleID->setDbValue($row['CouppleID']);
		$this->MaleID->setDbValue($row['MaleID']);
		$this->FemaleID->setDbValue($row['FemaleID']);
		$this->GroupID->setDbValue($row['GroupID']);
		$this->Relationship->setDbValue($row['Relationship']);
		$this->AppointmentSearch->setDbValue($row['AppointmentSearch']);
		$this->FacebookID->setDbValue($row['FacebookID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['title'] = $this->title->CurrentValue;
		$row['first_name'] = $this->first_name->CurrentValue;
		$row['middle_name'] = $this->middle_name->CurrentValue;
		$row['last_name'] = $this->last_name->CurrentValue;
		$row['gender'] = $this->gender->CurrentValue;
		$row['dob'] = $this->dob->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['blood_group'] = $this->blood_group->CurrentValue;
		$row['mobile_no'] = $this->mobile_no->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['profilePic'] = $this->profilePic->Upload->DbValue;
		$row['IdentificationMark'] = $this->IdentificationMark->CurrentValue;
		$row['Religion'] = $this->Religion->CurrentValue;
		$row['Nationality'] = $this->Nationality->CurrentValue;
		$row['ReferedByDr'] = $this->ReferedByDr->CurrentValue;
		$row['ReferClinicname'] = $this->ReferClinicname->CurrentValue;
		$row['ReferCity'] = $this->ReferCity->CurrentValue;
		$row['ReferMobileNo'] = $this->ReferMobileNo->CurrentValue;
		$row['ReferA4TreatingConsultant'] = $this->ReferA4TreatingConsultant->CurrentValue;
		$row['PurposreReferredfor'] = $this->PurposreReferredfor->CurrentValue;
		$row['spouse_title'] = $this->spouse_title->CurrentValue;
		$row['spouse_first_name'] = $this->spouse_first_name->CurrentValue;
		$row['spouse_middle_name'] = $this->spouse_middle_name->CurrentValue;
		$row['spouse_last_name'] = $this->spouse_last_name->CurrentValue;
		$row['spouse_gender'] = $this->spouse_gender->CurrentValue;
		$row['spouse_dob'] = $this->spouse_dob->CurrentValue;
		$row['spouse_Age'] = $this->spouse_Age->CurrentValue;
		$row['spouse_blood_group'] = $this->spouse_blood_group->CurrentValue;
		$row['spouse_mobile_no'] = $this->spouse_mobile_no->CurrentValue;
		$row['Maritalstatus'] = $this->Maritalstatus->CurrentValue;
		$row['Business'] = $this->Business->CurrentValue;
		$row['Patient_Language'] = $this->Patient_Language->CurrentValue;
		$row['Passport'] = $this->Passport->CurrentValue;
		$row['VisaNo'] = $this->VisaNo->CurrentValue;
		$row['ValidityOfVisa'] = $this->ValidityOfVisa->CurrentValue;
		$row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['street'] = $this->street->CurrentValue;
		$row['town'] = $this->town->CurrentValue;
		$row['province'] = $this->province->CurrentValue;
		$row['country'] = $this->country->CurrentValue;
		$row['postal_code'] = $this->postal_code->CurrentValue;
		$row['PEmail'] = $this->PEmail->CurrentValue;
		$row['PEmergencyContact'] = $this->PEmergencyContact->CurrentValue;
		$row['occupation'] = $this->occupation->CurrentValue;
		$row['spouse_occupation'] = $this->spouse_occupation->CurrentValue;
		$row['WhatsApp'] = $this->WhatsApp->CurrentValue;
		$row['CouppleID'] = $this->CouppleID->CurrentValue;
		$row['MaleID'] = $this->MaleID->CurrentValue;
		$row['FemaleID'] = $this->FemaleID->CurrentValue;
		$row['GroupID'] = $this->GroupID->CurrentValue;
		$row['Relationship'] = $this->Relationship->CurrentValue;
		$row['AppointmentSearch'] = $this->AppointmentSearch->CurrentValue;
		$row['FacebookID'] = $this->FacebookID->CurrentValue;
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
		// PatientID
		// title
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// Age
		// blood_group
		// mobile_no
		// description
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// IdentificationMark
		// Religion
		// Nationality
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// spouse_title
		// spouse_first_name
		// spouse_middle_name
		// spouse_last_name
		// spouse_gender
		// spouse_dob
		// spouse_Age
		// spouse_blood_group
		// spouse_mobile_no
		// Maritalstatus
		// Business
		// Patient_Language
		// Passport
		// VisaNo
		// ValidityOfVisa
		// WhereDidYouHear
		// HospID
		// street
		// town
		// province
		// country
		// postal_code
		// PEmail
		// PEmergencyContact
		// occupation
		// spouse_occupation
		// WhatsApp
		// CouppleID
		// MaleID
		// FemaleID
		// GroupID
		// Relationship
		// AppointmentSearch
		// FacebookID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// title
			$curVal = strval($this->title->CurrentValue);
			if ($curVal != "") {
				$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
				if ($this->title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->title->ViewValue = $this->title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->title->ViewValue = $this->title->CurrentValue;
					}
				}
			} else {
				$this->title->ViewValue = NULL;
			}
			$this->title->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// middle_name
			$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
			$this->middle_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// gender
			$curVal = strval($this->gender->CurrentValue);
			if ($curVal != "") {
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->gender->ViewValue = $this->gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gender->ViewValue = $this->gender->CurrentValue;
					}
				}
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
			$this->dob->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// blood_group
			$curVal = strval($this->blood_group->CurrentValue);
			if ($curVal != "") {
				$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
				if ($this->blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
					}
				}
			} else {
				$this->blood_group->ViewValue = NULL;
			}
			$this->blood_group->ViewCustomAttributes = "";

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

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

			// profilePic
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->ImageWidth = 80;
				$this->profilePic->ImageHeight = 80;
				$this->profilePic->ImageAlt = $this->profilePic->alt();
				$this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
			} else {
				$this->profilePic->ViewValue = "";
			}
			$this->profilePic->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->ViewCustomAttributes = "";

			// Nationality
			$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
			$this->Nationality->ViewCustomAttributes = "";

			// ReferedByDr
			if ($this->ReferedByDr->VirtualValue != "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
			} else {
				$curVal = strval($this->ReferedByDr->CurrentValue);
				if ($curVal != "") {
					$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
					if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
						}
					}
				} else {
					$this->ReferedByDr->ViewValue = NULL;
				}
			}
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			if ($this->ReferA4TreatingConsultant->VirtualValue != "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
			} else {
				$curVal = strval($this->ReferA4TreatingConsultant->CurrentValue);
				if ($curVal != "") {
					$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
					if ($this->ReferA4TreatingConsultant->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$lookupFilter = function() {
							return "`HospID`='".HospitalID()."'";
						};
						$lookupFilter = $lookupFilter->bindTo($this);
						$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
						}
					}
				} else {
					$this->ReferA4TreatingConsultant->ViewValue = NULL;
				}
			}
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// spouse_title
			$curVal = strval($this->spouse_title->CurrentValue);
			if ($curVal != "") {
				$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
				if ($this->spouse_title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
					}
				}
			} else {
				$this->spouse_title->ViewValue = NULL;
			}
			$this->spouse_title->ViewCustomAttributes = "";

			// spouse_first_name
			$this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
			$this->spouse_first_name->ViewCustomAttributes = "";

			// spouse_middle_name
			$this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
			$this->spouse_middle_name->ViewCustomAttributes = "";

			// spouse_last_name
			$this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
			$this->spouse_last_name->ViewCustomAttributes = "";

			// spouse_gender
			$curVal = strval($this->spouse_gender->CurrentValue);
			if ($curVal != "") {
				$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
				if ($this->spouse_gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
					}
				}
			} else {
				$this->spouse_gender->ViewValue = NULL;
			}
			$this->spouse_gender->ViewCustomAttributes = "";

			// spouse_dob
			$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
			$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
			$this->spouse_dob->ViewCustomAttributes = "";

			// spouse_Age
			$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
			$this->spouse_Age->ViewCustomAttributes = "";

			// spouse_blood_group
			$curVal = strval($this->spouse_blood_group->CurrentValue);
			if ($curVal != "") {
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
				if ($this->spouse_blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
					}
				}
			} else {
				$this->spouse_blood_group->ViewValue = NULL;
			}
			$this->spouse_blood_group->ViewCustomAttributes = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
			$this->spouse_mobile_no->ViewCustomAttributes = "";

			// Maritalstatus
			$curVal = strval($this->Maritalstatus->CurrentValue);
			if ($curVal != "") {
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
				if ($this->Maritalstatus->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Maritalstatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
					}
				}
			} else {
				$this->Maritalstatus->ViewValue = NULL;
			}
			$this->Maritalstatus->ViewCustomAttributes = "";

			// Business
			$this->Business->ViewValue = $this->Business->CurrentValue;
			$curVal = strval($this->Business->CurrentValue);
			if ($curVal != "") {
				$this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
				if ($this->Business->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Business->ViewValue = $this->Business->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Business->ViewValue = $this->Business->CurrentValue;
					}
				}
			} else {
				$this->Business->ViewValue = NULL;
			}
			$this->Business->ViewCustomAttributes = "";

			// Patient_Language
			$curVal = strval($this->Patient_Language->CurrentValue);
			if ($curVal != "") {
				$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
				if ($this->Patient_Language->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Patient_Language->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
					}
				}
			} else {
				$this->Patient_Language->ViewValue = NULL;
			}
			$this->Patient_Language->ViewCustomAttributes = "";

			// Passport
			$this->Passport->ViewValue = $this->Passport->CurrentValue;
			$this->Passport->ViewCustomAttributes = "";

			// VisaNo
			$this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
			$this->VisaNo->ViewCustomAttributes = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
			$this->ValidityOfVisa->ViewCustomAttributes = "";

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
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal != "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// street
			$this->street->ViewValue = $this->street->CurrentValue;
			$this->street->ViewCustomAttributes = "";

			// town
			$this->town->ViewValue = $this->town->CurrentValue;
			$this->town->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// PEmail
			$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
			$this->PEmail->ViewCustomAttributes = "";

			// PEmergencyContact
			$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
			$this->PEmergencyContact->ViewCustomAttributes = "";

			// occupation
			$this->occupation->ViewValue = $this->occupation->CurrentValue;
			$this->occupation->ViewCustomAttributes = "";

			// spouse_occupation
			$this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
			$this->spouse_occupation->ViewCustomAttributes = "";

			// WhatsApp
			$this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
			$this->WhatsApp->ViewCustomAttributes = "";

			// CouppleID
			$this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
			$this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
			$this->CouppleID->ViewCustomAttributes = "";

			// MaleID
			$this->MaleID->ViewValue = $this->MaleID->CurrentValue;
			$this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
			$this->MaleID->ViewCustomAttributes = "";

			// FemaleID
			$this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
			$this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
			$this->FemaleID->ViewCustomAttributes = "";

			// GroupID
			$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
			$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
			$this->GroupID->ViewCustomAttributes = "";

			// Relationship
			$this->Relationship->ViewValue = $this->Relationship->CurrentValue;
			$this->Relationship->ViewCustomAttributes = "";

			// AppointmentSearch
			$curVal = strval($this->AppointmentSearch->CurrentValue);
			if ($curVal != "") {
				$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
				if ($this->AppointmentSearch->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AppointmentSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->CurrentValue;
					}
				}
			} else {
				$this->AppointmentSearch->ViewValue = NULL;
			}
			$this->AppointmentSearch->ViewCustomAttributes = "";

			// FacebookID
			$this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
			$this->FacebookID->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";
			$this->middle_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";
			$this->dob->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";
			$this->blood_group->TooltipValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";
			$this->mobile_no->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

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

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
				$this->profilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport())
					$this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
			} else {
				$this->profilePic->HrefValue = "";
			}
			$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
			$this->profilePic->TooltipValue = "";
			if ($this->profilePic->UseColorbox) {
				if (EmptyValue($this->profilePic->TooltipValue))
					$this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->profilePic->LinkAttrs["data-rel"] = "patient_x_profilePic";
				$this->profilePic->LinkAttrs->appendClass("ew-lightbox");
			}

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";
			$this->Religion->TooltipValue = "";

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";
			$this->Nationality->TooltipValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";
			$this->spouse_title->TooltipValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";
			$this->spouse_first_name->TooltipValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";
			$this->spouse_middle_name->TooltipValue = "";

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";
			$this->spouse_last_name->TooltipValue = "";

			// spouse_gender
			$this->spouse_gender->LinkCustomAttributes = "";
			$this->spouse_gender->HrefValue = "";
			$this->spouse_gender->TooltipValue = "";

			// spouse_dob
			$this->spouse_dob->LinkCustomAttributes = "";
			$this->spouse_dob->HrefValue = "";
			$this->spouse_dob->TooltipValue = "";

			// spouse_Age
			$this->spouse_Age->LinkCustomAttributes = "";
			$this->spouse_Age->HrefValue = "";
			$this->spouse_Age->TooltipValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";
			$this->spouse_blood_group->TooltipValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";
			$this->spouse_mobile_no->TooltipValue = "";

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";
			$this->Maritalstatus->TooltipValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";
			$this->Business->TooltipValue = "";

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";
			$this->Patient_Language->TooltipValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";
			$this->Passport->TooltipValue = "";

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";
			$this->VisaNo->TooltipValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";
			$this->ValidityOfVisa->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// street
			$this->street->LinkCustomAttributes = "";
			$this->street->HrefValue = "";
			$this->street->TooltipValue = "";

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";
			$this->town->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";
			$this->PEmail->TooltipValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";
			$this->PEmergencyContact->TooltipValue = "";

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";
			$this->occupation->TooltipValue = "";

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";
			$this->spouse_occupation->TooltipValue = "";

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";
			$this->WhatsApp->TooltipValue = "";

			// CouppleID
			$this->CouppleID->LinkCustomAttributes = "";
			$this->CouppleID->HrefValue = "";
			$this->CouppleID->TooltipValue = "";

			// MaleID
			$this->MaleID->LinkCustomAttributes = "";
			$this->MaleID->HrefValue = "";
			$this->MaleID->TooltipValue = "";

			// FemaleID
			$this->FemaleID->LinkCustomAttributes = "";
			$this->FemaleID->HrefValue = "";
			$this->FemaleID->TooltipValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";
			$this->GroupID->TooltipValue = "";

			// Relationship
			$this->Relationship->LinkCustomAttributes = "";
			$this->Relationship->HrefValue = "";
			$this->Relationship->TooltipValue = "";

			// AppointmentSearch
			$this->AppointmentSearch->LinkCustomAttributes = "";
			$this->AppointmentSearch->HrefValue = "";
			$this->AppointmentSearch->TooltipValue = "";

			// FacebookID
			$this->FacebookID->LinkCustomAttributes = "";
			$this->FacebookID->HrefValue = "";
			$this->FacebookID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";
			$curVal = trim(strval($this->title->CurrentValue));
			if ($curVal != "")
				$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
			else
				$this->title->ViewValue = $this->title->Lookup !== NULL && is_array($this->title->Lookup->Options) ? $curVal : NULL;
			if ($this->title->ViewValue !== NULL) { // Load from cache
				$this->title->EditValue = array_values($this->title->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->title->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->title->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->title->EditValue = $arwrk;
			}

			// first_name
			$this->first_name->EditAttrs["class"] = "form-control";
			$this->first_name->EditCustomAttributes = "";
			if (!$this->first_name->Raw)
				$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// middle_name
			$this->middle_name->EditAttrs["class"] = "form-control";
			$this->middle_name->EditCustomAttributes = "";
			if (!$this->middle_name->Raw)
				$this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
			$this->middle_name->EditValue = HtmlEncode($this->middle_name->CurrentValue);
			$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (!$this->last_name->Raw)
				$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->gender->CurrentValue));
			if ($curVal != "")
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
			else
				$this->gender->ViewValue = $this->gender->Lookup !== NULL && is_array($this->gender->Lookup->Options) ? $curVal : NULL;
			if ($this->gender->ViewValue !== NULL) { // Load from cache
				$this->gender->EditValue = array_values($this->gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->gender->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->gender->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->gender->EditValue = $arwrk;
			}

			// dob
			$this->dob->EditAttrs["class"] = "form-control";
			$this->dob->EditCustomAttributes = "";
			$this->dob->EditValue = HtmlEncode(FormatDateTime($this->dob->CurrentValue, 7));
			$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// blood_group
			$this->blood_group->EditAttrs["class"] = "form-control";
			$this->blood_group->EditCustomAttributes = "";
			$curVal = trim(strval($this->blood_group->CurrentValue));
			if ($curVal != "")
				$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
			else
				$this->blood_group->ViewValue = $this->blood_group->Lookup !== NULL && is_array($this->blood_group->Lookup->Options) ? $curVal : NULL;
			if ($this->blood_group->ViewValue !== NULL) { // Load from cache
				$this->blood_group->EditValue = array_values($this->blood_group->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->blood_group->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->blood_group->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->blood_group->EditValue = $arwrk;
			}

			// mobile_no
			$this->mobile_no->EditAttrs["class"] = "form-control";
			$this->mobile_no->EditCustomAttributes = "";
			if (!$this->mobile_no->Raw)
				$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
			$this->mobile_no->EditValue = HtmlEncode($this->mobile_no->CurrentValue);
			$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (!$this->description->Raw)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

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
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->CurrentValue = CurrentUserName();

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->CurrentValue = FormatDateTime(CurrentDateTime(), 8);

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->CurrentValue = CurrentUserName();

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->CurrentValue = FormatDateTime(CurrentDateTime(), 8);

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->ImageWidth = 80;
				$this->profilePic->ImageHeight = 80;
				$this->profilePic->ImageAlt = $this->profilePic->alt();
				$this->profilePic->EditValue = $this->profilePic->Upload->DbValue;
			} else {
				$this->profilePic->EditValue = "";
			}
			if (!EmptyValue($this->profilePic->CurrentValue))
					$this->profilePic->Upload->FileName = $this->profilePic->CurrentValue;
			if ($this->isShow())
				RenderUploadField($this->profilePic);

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (!$this->IdentificationMark->Raw)
				$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// Religion
			$this->Religion->EditAttrs["class"] = "form-control";
			$this->Religion->EditCustomAttributes = "";
			if (!$this->Religion->Raw)
				$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
			$this->Religion->EditValue = HtmlEncode($this->Religion->CurrentValue);
			$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

			// Nationality
			$this->Nationality->EditAttrs["class"] = "form-control";
			$this->Nationality->EditCustomAttributes = "";
			if (!$this->Nationality->Raw)
				$this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
			$this->Nationality->EditValue = HtmlEncode($this->Nationality->CurrentValue);
			$this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

			// ReferedByDr
			$this->ReferedByDr->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferedByDr->CurrentValue));
			if ($curVal != "")
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
			else
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->Lookup !== NULL && is_array($this->ReferedByDr->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferedByDr->ViewValue !== NULL) { // Load from cache
				$this->ReferedByDr->EditValue = array_values($this->ReferedByDr->Lookup->Options);
				if ($this->ReferedByDr->ViewValue == "")
					$this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->ReferedByDr->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferedByDr->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
				} else {
					$this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ReferedByDr->EditValue = $arwrk;
			}

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			if (!$this->ReferClinicname->Raw)
				$this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
			$this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->CurrentValue);
			$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			if (!$this->ReferCity->Raw)
				$this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
			$this->ReferCity->EditValue = HtmlEncode($this->ReferCity->CurrentValue);
			$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			if (!$this->ReferMobileNo->Raw)
				$this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
			$this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->CurrentValue);
			$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
			if ($curVal != "")
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
			else
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->Lookup !== NULL && is_array($this->ReferA4TreatingConsultant->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferA4TreatingConsultant->ViewValue !== NULL) { // Load from cache
				$this->ReferA4TreatingConsultant->EditValue = array_values($this->ReferA4TreatingConsultant->Lookup->Options);
				if ($this->ReferA4TreatingConsultant->ViewValue == "")
					$this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->ReferA4TreatingConsultant->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
				} else {
					$this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ReferA4TreatingConsultant->EditValue = $arwrk;
			}

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (!$this->PurposreReferredfor->Raw)
				$this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// spouse_title
			$this->spouse_title->EditAttrs["class"] = "form-control";
			$this->spouse_title->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_title->CurrentValue));
			if ($curVal != "")
				$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
			else
				$this->spouse_title->ViewValue = $this->spouse_title->Lookup !== NULL && is_array($this->spouse_title->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_title->ViewValue !== NULL) { // Load from cache
				$this->spouse_title->EditValue = array_values($this->spouse_title->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->spouse_title->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->spouse_title->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->spouse_title->EditValue = $arwrk;
			}

			// spouse_first_name
			$this->spouse_first_name->EditAttrs["class"] = "form-control";
			$this->spouse_first_name->EditCustomAttributes = "";
			if (!$this->spouse_first_name->Raw)
				$this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
			$this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->CurrentValue);
			$this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

			// spouse_middle_name
			$this->spouse_middle_name->EditAttrs["class"] = "form-control";
			$this->spouse_middle_name->EditCustomAttributes = "";
			if (!$this->spouse_middle_name->Raw)
				$this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
			$this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->CurrentValue);
			$this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

			// spouse_last_name
			$this->spouse_last_name->EditAttrs["class"] = "form-control";
			$this->spouse_last_name->EditCustomAttributes = "";
			if (!$this->spouse_last_name->Raw)
				$this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
			$this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->CurrentValue);
			$this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

			// spouse_gender
			$this->spouse_gender->EditAttrs["class"] = "form-control";
			$this->spouse_gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_gender->CurrentValue));
			if ($curVal != "")
				$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
			else
				$this->spouse_gender->ViewValue = $this->spouse_gender->Lookup !== NULL && is_array($this->spouse_gender->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_gender->ViewValue !== NULL) { // Load from cache
				$this->spouse_gender->EditValue = array_values($this->spouse_gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->spouse_gender->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->spouse_gender->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->spouse_gender->EditValue = $arwrk;
			}

			// spouse_dob
			$this->spouse_dob->EditAttrs["class"] = "form-control";
			$this->spouse_dob->EditCustomAttributes = "";
			$this->spouse_dob->EditValue = HtmlEncode(FormatDateTime($this->spouse_dob->CurrentValue, 7));
			$this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

			// spouse_Age
			$this->spouse_Age->EditAttrs["class"] = "form-control";
			$this->spouse_Age->EditCustomAttributes = "";
			if (!$this->spouse_Age->Raw)
				$this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
			$this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->CurrentValue);
			$this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

			// spouse_blood_group
			$this->spouse_blood_group->EditAttrs["class"] = "form-control";
			$this->spouse_blood_group->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_blood_group->CurrentValue));
			if ($curVal != "")
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
			else
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->Lookup !== NULL && is_array($this->spouse_blood_group->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_blood_group->ViewValue !== NULL) { // Load from cache
				$this->spouse_blood_group->EditValue = array_values($this->spouse_blood_group->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->spouse_blood_group->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->spouse_blood_group->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->spouse_blood_group->EditValue = $arwrk;
			}

			// spouse_mobile_no
			$this->spouse_mobile_no->EditAttrs["class"] = "form-control";
			$this->spouse_mobile_no->EditCustomAttributes = "";
			if (!$this->spouse_mobile_no->Raw)
				$this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
			$this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->CurrentValue);
			$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

			// Maritalstatus
			$this->Maritalstatus->EditAttrs["class"] = "form-control";
			$this->Maritalstatus->EditCustomAttributes = "";
			$curVal = trim(strval($this->Maritalstatus->CurrentValue));
			if ($curVal != "")
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
			else
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->Lookup !== NULL && is_array($this->Maritalstatus->Lookup->Options) ? $curVal : NULL;
			if ($this->Maritalstatus->ViewValue !== NULL) { // Load from cache
				$this->Maritalstatus->EditValue = array_values($this->Maritalstatus->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`MaritalStatus`" . SearchString("=", $this->Maritalstatus->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Maritalstatus->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Maritalstatus->EditValue = $arwrk;
			}

			// Business
			$this->Business->EditAttrs["class"] = "form-control";
			$this->Business->EditCustomAttributes = "";
			if (!$this->Business->Raw)
				$this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
			$this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
			$curVal = strval($this->Business->CurrentValue);
			if ($curVal != "") {
				$this->Business->EditValue = $this->Business->lookupCacheOption($curVal);
				if ($this->Business->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Business->EditValue = $this->Business->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
					}
				}
			} else {
				$this->Business->EditValue = NULL;
			}
			$this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

			// Patient_Language
			$this->Patient_Language->EditAttrs["class"] = "form-control";
			$this->Patient_Language->EditCustomAttributes = "";
			$curVal = trim(strval($this->Patient_Language->CurrentValue));
			if ($curVal != "")
				$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
			else
				$this->Patient_Language->ViewValue = $this->Patient_Language->Lookup !== NULL && is_array($this->Patient_Language->Lookup->Options) ? $curVal : NULL;
			if ($this->Patient_Language->ViewValue !== NULL) { // Load from cache
				$this->Patient_Language->EditValue = array_values($this->Patient_Language->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Language`" . SearchString("=", $this->Patient_Language->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Patient_Language->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Patient_Language->EditValue = $arwrk;
			}

			// Passport
			$this->Passport->EditAttrs["class"] = "form-control";
			$this->Passport->EditCustomAttributes = "";
			if (!$this->Passport->Raw)
				$this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
			$this->Passport->EditValue = HtmlEncode($this->Passport->CurrentValue);
			$this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

			// VisaNo
			$this->VisaNo->EditAttrs["class"] = "form-control";
			$this->VisaNo->EditCustomAttributes = "";
			if (!$this->VisaNo->Raw)
				$this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
			$this->VisaNo->EditValue = HtmlEncode($this->VisaNo->CurrentValue);
			$this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

			// ValidityOfVisa
			$this->ValidityOfVisa->EditAttrs["class"] = "form-control";
			$this->ValidityOfVisa->EditCustomAttributes = "";
			if (!$this->ValidityOfVisa->Raw)
				$this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
			$this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->CurrentValue);
			$this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

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
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->CurrentValue = HospitalID();

			// street
			$this->street->EditAttrs["class"] = "form-control";
			$this->street->EditCustomAttributes = "";
			if (!$this->street->Raw)
				$this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
			$this->street->EditValue = HtmlEncode($this->street->CurrentValue);
			$this->street->PlaceHolder = RemoveHtml($this->street->caption());

			// town
			$this->town->EditAttrs["class"] = "form-control";
			$this->town->EditCustomAttributes = "";
			if (!$this->town->Raw)
				$this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
			$this->town->EditValue = HtmlEncode($this->town->CurrentValue);
			$this->town->PlaceHolder = RemoveHtml($this->town->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			if (!$this->province->Raw)
				$this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
			$this->province->EditValue = HtmlEncode($this->province->CurrentValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (!$this->country->Raw)
				$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
			$this->country->EditValue = HtmlEncode($this->country->CurrentValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (!$this->postal_code->Raw)
				$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// PEmail
			$this->PEmail->EditAttrs["class"] = "form-control";
			$this->PEmail->EditCustomAttributes = "";
			if (!$this->PEmail->Raw)
				$this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
			$this->PEmail->EditValue = HtmlEncode($this->PEmail->CurrentValue);
			$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

			// PEmergencyContact
			$this->PEmergencyContact->EditAttrs["class"] = "form-control";
			$this->PEmergencyContact->EditCustomAttributes = "";
			if (!$this->PEmergencyContact->Raw)
				$this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
			$this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->CurrentValue);
			$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

			// occupation
			$this->occupation->EditAttrs["class"] = "form-control";
			$this->occupation->EditCustomAttributes = "";
			if (!$this->occupation->Raw)
				$this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
			$this->occupation->EditValue = HtmlEncode($this->occupation->CurrentValue);
			$this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

			// spouse_occupation
			$this->spouse_occupation->EditAttrs["class"] = "form-control";
			$this->spouse_occupation->EditCustomAttributes = "";
			if (!$this->spouse_occupation->Raw)
				$this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
			$this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->CurrentValue);
			$this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

			// WhatsApp
			$this->WhatsApp->EditAttrs["class"] = "form-control";
			$this->WhatsApp->EditCustomAttributes = "";
			if (!$this->WhatsApp->Raw)
				$this->WhatsApp->CurrentValue = HtmlDecode($this->WhatsApp->CurrentValue);
			$this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->CurrentValue);
			$this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

			// CouppleID
			$this->CouppleID->EditAttrs["class"] = "form-control";
			$this->CouppleID->EditCustomAttributes = "";
			$this->CouppleID->EditValue = HtmlEncode($this->CouppleID->CurrentValue);
			$this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

			// MaleID
			$this->MaleID->EditAttrs["class"] = "form-control";
			$this->MaleID->EditCustomAttributes = "";
			$this->MaleID->EditValue = HtmlEncode($this->MaleID->CurrentValue);
			$this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

			// FemaleID
			$this->FemaleID->EditAttrs["class"] = "form-control";
			$this->FemaleID->EditCustomAttributes = "";
			$this->FemaleID->EditValue = HtmlEncode($this->FemaleID->CurrentValue);
			$this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

			// GroupID
			$this->GroupID->EditAttrs["class"] = "form-control";
			$this->GroupID->EditCustomAttributes = "";
			$this->GroupID->EditValue = HtmlEncode($this->GroupID->CurrentValue);
			$this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

			// Relationship
			$this->Relationship->EditAttrs["class"] = "form-control";
			$this->Relationship->EditCustomAttributes = "";
			if (!$this->Relationship->Raw)
				$this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
			$this->Relationship->EditValue = HtmlEncode($this->Relationship->CurrentValue);
			$this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

			// AppointmentSearch
			$this->AppointmentSearch->EditCustomAttributes = "";
			$curVal = trim(strval($this->AppointmentSearch->CurrentValue));
			if ($curVal != "")
				$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
			else
				$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->Lookup !== NULL && is_array($this->AppointmentSearch->Lookup->Options) ? $curVal : NULL;
			if ($this->AppointmentSearch->ViewValue !== NULL) { // Load from cache
				$this->AppointmentSearch->EditValue = array_values($this->AppointmentSearch->Lookup->Options);
				if ($this->AppointmentSearch->ViewValue == "")
					$this->AppointmentSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->AppointmentSearch->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AppointmentSearch->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
				} else {
					$this->AppointmentSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AppointmentSearch->EditValue = $arwrk;
			}

			// FacebookID
			$this->FacebookID->EditAttrs["class"] = "form-control";
			$this->FacebookID->EditCustomAttributes = "";
			if (!$this->FacebookID->Raw)
				$this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
			$this->FacebookID->EditValue = HtmlEncode($this->FacebookID->CurrentValue);
			$this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

			// Add refer script
			// PatientID

			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
				$this->profilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport())
					$this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
			} else {
				$this->profilePic->HrefValue = "";
			}
			$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";

			// spouse_gender
			$this->spouse_gender->LinkCustomAttributes = "";
			$this->spouse_gender->HrefValue = "";

			// spouse_dob
			$this->spouse_dob->LinkCustomAttributes = "";
			$this->spouse_dob->HrefValue = "";

			// spouse_Age
			$this->spouse_Age->LinkCustomAttributes = "";
			$this->spouse_Age->HrefValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// street
			$this->street->LinkCustomAttributes = "";
			$this->street->HrefValue = "";

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";

			// CouppleID
			$this->CouppleID->LinkCustomAttributes = "";
			$this->CouppleID->HrefValue = "";

			// MaleID
			$this->MaleID->LinkCustomAttributes = "";
			$this->MaleID->HrefValue = "";

			// FemaleID
			$this->FemaleID->LinkCustomAttributes = "";
			$this->FemaleID->HrefValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";

			// Relationship
			$this->Relationship->LinkCustomAttributes = "";
			$this->Relationship->HrefValue = "";

			// AppointmentSearch
			$this->AppointmentSearch->LinkCustomAttributes = "";
			$this->AppointmentSearch->HrefValue = "";

			// FacebookID
			$this->FacebookID->LinkCustomAttributes = "";
			$this->FacebookID->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->title->Required) {
			if (!$this->title->IsDetailKey && $this->title->FormValue != NULL && $this->title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
			}
		}
		if ($this->first_name->Required) {
			if (!$this->first_name->IsDetailKey && $this->first_name->FormValue != NULL && $this->first_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
			}
		}
		if ($this->middle_name->Required) {
			if (!$this->middle_name->IsDetailKey && $this->middle_name->FormValue != NULL && $this->middle_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->middle_name->caption(), $this->middle_name->RequiredErrorMessage));
			}
		}
		if ($this->last_name->Required) {
			if (!$this->last_name->IsDetailKey && $this->last_name->FormValue != NULL && $this->last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if (!$this->gender->IsDetailKey && $this->gender->FormValue != NULL && $this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
			}
		}
		if ($this->dob->Required) {
			if (!$this->dob->IsDetailKey && $this->dob->FormValue != NULL && $this->dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dob->caption(), $this->dob->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->dob->FormValue)) {
			AddMessage($FormError, $this->dob->errorMessage());
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->blood_group->Required) {
			if (!$this->blood_group->IsDetailKey && $this->blood_group->FormValue != NULL && $this->blood_group->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->blood_group->caption(), $this->blood_group->RequiredErrorMessage));
			}
		}
		if ($this->mobile_no->Required) {
			if (!$this->mobile_no->IsDetailKey && $this->mobile_no->FormValue != NULL && $this->mobile_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_no->caption(), $this->mobile_no->RequiredErrorMessage));
			}
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
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
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if ($this->profilePic->Upload->FileName == "" && !$this->profilePic->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->IdentificationMark->Required) {
			if (!$this->IdentificationMark->IsDetailKey && $this->IdentificationMark->FormValue != NULL && $this->IdentificationMark->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
			}
		}
		if ($this->Religion->Required) {
			if (!$this->Religion->IsDetailKey && $this->Religion->FormValue != NULL && $this->Religion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Religion->caption(), $this->Religion->RequiredErrorMessage));
			}
		}
		if ($this->Nationality->Required) {
			if (!$this->Nationality->IsDetailKey && $this->Nationality->FormValue != NULL && $this->Nationality->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nationality->caption(), $this->Nationality->RequiredErrorMessage));
			}
		}
		if ($this->ReferedByDr->Required) {
			if (!$this->ReferedByDr->IsDetailKey && $this->ReferedByDr->FormValue != NULL && $this->ReferedByDr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferedByDr->caption(), $this->ReferedByDr->RequiredErrorMessage));
			}
		}
		if ($this->ReferClinicname->Required) {
			if (!$this->ReferClinicname->IsDetailKey && $this->ReferClinicname->FormValue != NULL && $this->ReferClinicname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferClinicname->caption(), $this->ReferClinicname->RequiredErrorMessage));
			}
		}
		if ($this->ReferCity->Required) {
			if (!$this->ReferCity->IsDetailKey && $this->ReferCity->FormValue != NULL && $this->ReferCity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferCity->caption(), $this->ReferCity->RequiredErrorMessage));
			}
		}
		if ($this->ReferMobileNo->Required) {
			if (!$this->ReferMobileNo->IsDetailKey && $this->ReferMobileNo->FormValue != NULL && $this->ReferMobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferMobileNo->caption(), $this->ReferMobileNo->RequiredErrorMessage));
			}
		}
		if ($this->ReferA4TreatingConsultant->Required) {
			if (!$this->ReferA4TreatingConsultant->IsDetailKey && $this->ReferA4TreatingConsultant->FormValue != NULL && $this->ReferA4TreatingConsultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferA4TreatingConsultant->caption(), $this->ReferA4TreatingConsultant->RequiredErrorMessage));
			}
		}
		if ($this->PurposreReferredfor->Required) {
			if (!$this->PurposreReferredfor->IsDetailKey && $this->PurposreReferredfor->FormValue != NULL && $this->PurposreReferredfor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurposreReferredfor->caption(), $this->PurposreReferredfor->RequiredErrorMessage));
			}
		}
		if ($this->spouse_title->Required) {
			if (!$this->spouse_title->IsDetailKey && $this->spouse_title->FormValue != NULL && $this->spouse_title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_title->caption(), $this->spouse_title->RequiredErrorMessage));
			}
		}
		if ($this->spouse_first_name->Required) {
			if (!$this->spouse_first_name->IsDetailKey && $this->spouse_first_name->FormValue != NULL && $this->spouse_first_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_first_name->caption(), $this->spouse_first_name->RequiredErrorMessage));
			}
		}
		if ($this->spouse_middle_name->Required) {
			if (!$this->spouse_middle_name->IsDetailKey && $this->spouse_middle_name->FormValue != NULL && $this->spouse_middle_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_middle_name->caption(), $this->spouse_middle_name->RequiredErrorMessage));
			}
		}
		if ($this->spouse_last_name->Required) {
			if (!$this->spouse_last_name->IsDetailKey && $this->spouse_last_name->FormValue != NULL && $this->spouse_last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_last_name->caption(), $this->spouse_last_name->RequiredErrorMessage));
			}
		}
		if ($this->spouse_gender->Required) {
			if (!$this->spouse_gender->IsDetailKey && $this->spouse_gender->FormValue != NULL && $this->spouse_gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_gender->caption(), $this->spouse_gender->RequiredErrorMessage));
			}
		}
		if ($this->spouse_dob->Required) {
			if (!$this->spouse_dob->IsDetailKey && $this->spouse_dob->FormValue != NULL && $this->spouse_dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_dob->caption(), $this->spouse_dob->RequiredErrorMessage));
			}
		}
		if ($this->spouse_Age->Required) {
			if (!$this->spouse_Age->IsDetailKey && $this->spouse_Age->FormValue != NULL && $this->spouse_Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_Age->caption(), $this->spouse_Age->RequiredErrorMessage));
			}
		}
		if ($this->spouse_blood_group->Required) {
			if (!$this->spouse_blood_group->IsDetailKey && $this->spouse_blood_group->FormValue != NULL && $this->spouse_blood_group->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_blood_group->caption(), $this->spouse_blood_group->RequiredErrorMessage));
			}
		}
		if ($this->spouse_mobile_no->Required) {
			if (!$this->spouse_mobile_no->IsDetailKey && $this->spouse_mobile_no->FormValue != NULL && $this->spouse_mobile_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_mobile_no->caption(), $this->spouse_mobile_no->RequiredErrorMessage));
			}
		}
		if ($this->Maritalstatus->Required) {
			if (!$this->Maritalstatus->IsDetailKey && $this->Maritalstatus->FormValue != NULL && $this->Maritalstatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Maritalstatus->caption(), $this->Maritalstatus->RequiredErrorMessage));
			}
		}
		if ($this->Business->Required) {
			if (!$this->Business->IsDetailKey && $this->Business->FormValue != NULL && $this->Business->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Business->caption(), $this->Business->RequiredErrorMessage));
			}
		}
		if ($this->Patient_Language->Required) {
			if (!$this->Patient_Language->IsDetailKey && $this->Patient_Language->FormValue != NULL && $this->Patient_Language->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Patient_Language->caption(), $this->Patient_Language->RequiredErrorMessage));
			}
		}
		if ($this->Passport->Required) {
			if (!$this->Passport->IsDetailKey && $this->Passport->FormValue != NULL && $this->Passport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Passport->caption(), $this->Passport->RequiredErrorMessage));
			}
		}
		if ($this->VisaNo->Required) {
			if (!$this->VisaNo->IsDetailKey && $this->VisaNo->FormValue != NULL && $this->VisaNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VisaNo->caption(), $this->VisaNo->RequiredErrorMessage));
			}
		}
		if ($this->ValidityOfVisa->Required) {
			if (!$this->ValidityOfVisa->IsDetailKey && $this->ValidityOfVisa->FormValue != NULL && $this->ValidityOfVisa->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ValidityOfVisa->caption(), $this->ValidityOfVisa->RequiredErrorMessage));
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
		if ($this->street->Required) {
			if (!$this->street->IsDetailKey && $this->street->FormValue != NULL && $this->street->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->street->caption(), $this->street->RequiredErrorMessage));
			}
		}
		if ($this->town->Required) {
			if (!$this->town->IsDetailKey && $this->town->FormValue != NULL && $this->town->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->town->caption(), $this->town->RequiredErrorMessage));
			}
		}
		if ($this->province->Required) {
			if (!$this->province->IsDetailKey && $this->province->FormValue != NULL && $this->province->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
			}
		}
		if ($this->country->Required) {
			if (!$this->country->IsDetailKey && $this->country->FormValue != NULL && $this->country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
			}
		}
		if ($this->postal_code->Required) {
			if (!$this->postal_code->IsDetailKey && $this->postal_code->FormValue != NULL && $this->postal_code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
			}
		}
		if ($this->PEmail->Required) {
			if (!$this->PEmail->IsDetailKey && $this->PEmail->FormValue != NULL && $this->PEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PEmail->caption(), $this->PEmail->RequiredErrorMessage));
			}
		}
		if ($this->PEmergencyContact->Required) {
			if (!$this->PEmergencyContact->IsDetailKey && $this->PEmergencyContact->FormValue != NULL && $this->PEmergencyContact->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PEmergencyContact->caption(), $this->PEmergencyContact->RequiredErrorMessage));
			}
		}
		if ($this->occupation->Required) {
			if (!$this->occupation->IsDetailKey && $this->occupation->FormValue != NULL && $this->occupation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->occupation->caption(), $this->occupation->RequiredErrorMessage));
			}
		}
		if ($this->spouse_occupation->Required) {
			if (!$this->spouse_occupation->IsDetailKey && $this->spouse_occupation->FormValue != NULL && $this->spouse_occupation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_occupation->caption(), $this->spouse_occupation->RequiredErrorMessage));
			}
		}
		if ($this->WhatsApp->Required) {
			if (!$this->WhatsApp->IsDetailKey && $this->WhatsApp->FormValue != NULL && $this->WhatsApp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhatsApp->caption(), $this->WhatsApp->RequiredErrorMessage));
			}
		}
		if ($this->CouppleID->Required) {
			if (!$this->CouppleID->IsDetailKey && $this->CouppleID->FormValue != NULL && $this->CouppleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CouppleID->caption(), $this->CouppleID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CouppleID->FormValue)) {
			AddMessage($FormError, $this->CouppleID->errorMessage());
		}
		if ($this->MaleID->Required) {
			if (!$this->MaleID->IsDetailKey && $this->MaleID->FormValue != NULL && $this->MaleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaleID->caption(), $this->MaleID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->MaleID->FormValue)) {
			AddMessage($FormError, $this->MaleID->errorMessage());
		}
		if ($this->FemaleID->Required) {
			if (!$this->FemaleID->IsDetailKey && $this->FemaleID->FormValue != NULL && $this->FemaleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FemaleID->caption(), $this->FemaleID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->FemaleID->FormValue)) {
			AddMessage($FormError, $this->FemaleID->errorMessage());
		}
		if ($this->GroupID->Required) {
			if (!$this->GroupID->IsDetailKey && $this->GroupID->FormValue != NULL && $this->GroupID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupID->caption(), $this->GroupID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->GroupID->FormValue)) {
			AddMessage($FormError, $this->GroupID->errorMessage());
		}
		if ($this->Relationship->Required) {
			if (!$this->Relationship->IsDetailKey && $this->Relationship->FormValue != NULL && $this->Relationship->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Relationship->caption(), $this->Relationship->RequiredErrorMessage));
			}
		}
		if ($this->AppointmentSearch->Required) {
			if (!$this->AppointmentSearch->IsDetailKey && $this->AppointmentSearch->FormValue != NULL && $this->AppointmentSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AppointmentSearch->caption(), $this->AppointmentSearch->RequiredErrorMessage));
			}
		}
		if ($this->FacebookID->Required) {
			if (!$this->FacebookID->IsDetailKey && $this->FacebookID->FormValue != NULL && $this->FacebookID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FacebookID->caption(), $this->FacebookID->RequiredErrorMessage));
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

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, "", FALSE);

		// title
		$this->title->setDbValueDef($rsnew, $this->title->CurrentValue, NULL, FALSE);

		// first_name
		$this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, NULL, FALSE);

		// middle_name
		$this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, NULL, FALSE);

		// last_name
		$this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, NULL, FALSE);

		// gender
		$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, FALSE);

		// dob
		$this->dob->setDbValueDef($rsnew, UnFormatDateTime($this->dob->CurrentValue, 7), NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// blood_group
		$this->blood_group->setDbValueDef($rsnew, $this->blood_group->CurrentValue, NULL, FALSE);

		// mobile_no
		$this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, NULL, FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->CurrentValue = CurrentUserName();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// modifiedby
		$this->modifiedby->CurrentValue = CurrentUserName();
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

		// modifieddatetime
		$this->modifieddatetime->CurrentValue = CurrentDateTime();
		$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

		// profilePic
		if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
			$this->profilePic->Upload->DbValue = ""; // No need to delete old file
			if ($this->profilePic->Upload->FileName == "") {
				$rsnew['profilePic'] = NULL;
			} else {
				$rsnew['profilePic'] = $this->profilePic->Upload->FileName;
			}
		}

		// IdentificationMark
		$this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, NULL, FALSE);

		// Religion
		$this->Religion->setDbValueDef($rsnew, $this->Religion->CurrentValue, NULL, FALSE);

		// Nationality
		$this->Nationality->setDbValueDef($rsnew, $this->Nationality->CurrentValue, NULL, FALSE);

		// ReferedByDr
		$this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, NULL, FALSE);

		// ReferClinicname
		$this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, NULL, FALSE);

		// ReferCity
		$this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, NULL, FALSE);

		// ReferMobileNo
		$this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, NULL, FALSE);

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, NULL, FALSE);

		// PurposreReferredfor
		$this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, NULL, FALSE);

		// spouse_title
		$this->spouse_title->setDbValueDef($rsnew, $this->spouse_title->CurrentValue, NULL, FALSE);

		// spouse_first_name
		$this->spouse_first_name->setDbValueDef($rsnew, $this->spouse_first_name->CurrentValue, NULL, FALSE);

		// spouse_middle_name
		$this->spouse_middle_name->setDbValueDef($rsnew, $this->spouse_middle_name->CurrentValue, NULL, FALSE);

		// spouse_last_name
		$this->spouse_last_name->setDbValueDef($rsnew, $this->spouse_last_name->CurrentValue, NULL, FALSE);

		// spouse_gender
		$this->spouse_gender->setDbValueDef($rsnew, $this->spouse_gender->CurrentValue, NULL, FALSE);

		// spouse_dob
		$this->spouse_dob->setDbValueDef($rsnew, UnFormatDateTime($this->spouse_dob->CurrentValue, 7), NULL, FALSE);

		// spouse_Age
		$this->spouse_Age->setDbValueDef($rsnew, $this->spouse_Age->CurrentValue, NULL, FALSE);

		// spouse_blood_group
		$this->spouse_blood_group->setDbValueDef($rsnew, $this->spouse_blood_group->CurrentValue, NULL, FALSE);

		// spouse_mobile_no
		$this->spouse_mobile_no->setDbValueDef($rsnew, $this->spouse_mobile_no->CurrentValue, NULL, FALSE);

		// Maritalstatus
		$this->Maritalstatus->setDbValueDef($rsnew, $this->Maritalstatus->CurrentValue, NULL, FALSE);

		// Business
		$this->Business->setDbValueDef($rsnew, $this->Business->CurrentValue, NULL, FALSE);

		// Patient_Language
		$this->Patient_Language->setDbValueDef($rsnew, $this->Patient_Language->CurrentValue, NULL, FALSE);

		// Passport
		$this->Passport->setDbValueDef($rsnew, $this->Passport->CurrentValue, NULL, FALSE);

		// VisaNo
		$this->VisaNo->setDbValueDef($rsnew, $this->VisaNo->CurrentValue, NULL, FALSE);

		// ValidityOfVisa
		$this->ValidityOfVisa->setDbValueDef($rsnew, $this->ValidityOfVisa->CurrentValue, NULL, FALSE);

		// WhereDidYouHear
		$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// street
		$this->street->setDbValueDef($rsnew, $this->street->CurrentValue, NULL, FALSE);

		// town
		$this->town->setDbValueDef($rsnew, $this->town->CurrentValue, NULL, FALSE);

		// province
		$this->province->setDbValueDef($rsnew, $this->province->CurrentValue, NULL, FALSE);

		// country
		$this->country->setDbValueDef($rsnew, $this->country->CurrentValue, NULL, FALSE);

		// postal_code
		$this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, NULL, FALSE);

		// PEmail
		$this->PEmail->setDbValueDef($rsnew, $this->PEmail->CurrentValue, NULL, FALSE);

		// PEmergencyContact
		$this->PEmergencyContact->setDbValueDef($rsnew, $this->PEmergencyContact->CurrentValue, NULL, FALSE);

		// occupation
		$this->occupation->setDbValueDef($rsnew, $this->occupation->CurrentValue, NULL, FALSE);

		// spouse_occupation
		$this->spouse_occupation->setDbValueDef($rsnew, $this->spouse_occupation->CurrentValue, NULL, FALSE);

		// WhatsApp
		$this->WhatsApp->setDbValueDef($rsnew, $this->WhatsApp->CurrentValue, NULL, FALSE);

		// CouppleID
		$this->CouppleID->setDbValueDef($rsnew, $this->CouppleID->CurrentValue, NULL, FALSE);

		// MaleID
		$this->MaleID->setDbValueDef($rsnew, $this->MaleID->CurrentValue, NULL, FALSE);

		// FemaleID
		$this->FemaleID->setDbValueDef($rsnew, $this->FemaleID->CurrentValue, NULL, FALSE);

		// GroupID
		$this->GroupID->setDbValueDef($rsnew, $this->GroupID->CurrentValue, NULL, FALSE);

		// Relationship
		$this->Relationship->setDbValueDef($rsnew, $this->Relationship->CurrentValue, NULL, FALSE);

		// AppointmentSearch
		$this->AppointmentSearch->setDbValueDef($rsnew, $this->AppointmentSearch->CurrentValue, "", FALSE);

		// FacebookID
		$this->FacebookID->setDbValueDef($rsnew, $this->FacebookID->CurrentValue, NULL, FALSE);
		if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->profilePic->Upload->DbValue) ? [] : [$this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)];
			if (!EmptyValue($this->profilePic->Upload->FileName)) {
				$newFiles = [$this->profilePic->Upload->FileName];
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] != "") {
						$file = $newFiles[$i];
						$tempPath = UploadTempPath($this->profilePic, $this->profilePic->Upload->Index);
						if (file_exists($tempPath . $file)) {
							if (Config("DELETE_UPLOADED_FILES")) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										array_splice($oldFiles, $j, 1);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->profilePic->physicalUploadPath(), $file); // Get new file name
							if ($file1 != $file) { // Rename temp file
								while (file_exists($tempPath . $file1) || file_exists($this->profilePic->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->profilePic->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename($tempPath . $file, $tempPath . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->profilePic->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
				$this->profilePic->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
				$this->profilePic->setDbValueDef($rsnew, $this->profilePic->Upload->FileName, NULL, FALSE);
			}
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['PatientID']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
				if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->profilePic->Upload->DbValue) ? [] : [$this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)];
					if (!EmptyValue($this->profilePic->Upload->FileName)) {
						$newFiles = [$this->profilePic->Upload->FileName];
						$newFiles2 = [$this->profilePic->htmlDecode($rsnew['profilePic'])];
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] != "") {
								$file = UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] != "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->profilePic->Upload->SaveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = [];
					}
					if (Config("DELETE_UPLOADED_FILES")) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile != "" && !in_array($oldFile, $newFiles))
								@unlink($this->profilePic->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
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

			// profilePic
			CleanUploadTempPath($this->profilePic, $this->profilePic->Upload->Index);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patientlist.php"), "", $this->TableVar, TRUE);
		$pageId = "addopt";
		$Breadcrumb->add("addopt", $pageId, $url);
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
				case "x_title":
					break;
				case "x_gender":
					break;
				case "x_blood_group":
					break;
				case "x_status":
					break;
				case "x_ReferedByDr":
					break;
				case "x_ReferA4TreatingConsultant":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_spouse_title":
					break;
				case "x_spouse_gender":
					break;
				case "x_spouse_blood_group":
					break;
				case "x_Maritalstatus":
					break;
				case "x_Business":
					break;
				case "x_Patient_Language":
					break;
				case "x_WhereDidYouHear":
					break;
				case "x_HospID":
					break;
				case "x_AppointmentSearch":
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
						case "x_title":
							break;
						case "x_gender":
							break;
						case "x_blood_group":
							break;
						case "x_status":
							break;
						case "x_ReferedByDr":
							break;
						case "x_ReferA4TreatingConsultant":
							break;
						case "x_spouse_title":
							break;
						case "x_spouse_gender":
							break;
						case "x_spouse_blood_group":
							break;
						case "x_Maritalstatus":
							break;
						case "x_Business":
							break;
						case "x_Patient_Language":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_HospID":
							break;
						case "x_AppointmentSearch":
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
} // End class
?>
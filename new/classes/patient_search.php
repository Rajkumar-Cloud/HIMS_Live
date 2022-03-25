<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_search extends patient
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient';

	// Page object name
	public $PageObjName = "patient_search";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "patientview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

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
			if (!$Security->canSearch()) {
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
		$this->id->setVisibility();
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

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		if ($this->isPageRequest()) { // Validate request

			// Get action
			$this->CurrentAction = Post("action");
			if ($this->isSearch()) {

				// Build search string for advanced search, remove blank field
				$this->loadSearchValues(); // Get search values
				if ($this->validateSearch()) {
					$srchStr = $this->buildAdvancedSearch();
				} else {
					$srchStr = "";
					$this->setFailureMessage($SearchError);
				}
				if ($srchStr != "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "patientlist.php" . "?" . $srchStr;
					$this->terminate($srchStr); // Go to list page
				}
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Render row for search
		$this->RowType = ROWTYPE_SEARCH;
		$this->resetAttributes();
		$this->renderRow();
	}

	// Build advanced search
	protected function buildAdvancedSearch()
	{
		$srchUrl = "";
		$this->buildSearchUrl($srchUrl, $this->id); // id
		$this->buildSearchUrl($srchUrl, $this->PatientID); // PatientID
		$this->buildSearchUrl($srchUrl, $this->title); // title
		$this->buildSearchUrl($srchUrl, $this->first_name); // first_name
		$this->buildSearchUrl($srchUrl, $this->middle_name); // middle_name
		$this->buildSearchUrl($srchUrl, $this->last_name); // last_name
		$this->buildSearchUrl($srchUrl, $this->gender); // gender
		$this->buildSearchUrl($srchUrl, $this->dob); // dob
		$this->buildSearchUrl($srchUrl, $this->Age); // Age
		$this->buildSearchUrl($srchUrl, $this->blood_group); // blood_group
		$this->buildSearchUrl($srchUrl, $this->mobile_no); // mobile_no
		$this->buildSearchUrl($srchUrl, $this->description); // description
		$this->buildSearchUrl($srchUrl, $this->status); // status
		$this->buildSearchUrl($srchUrl, $this->createdby); // createdby
		$this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
		$this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
		$this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
		$this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
		$this->buildSearchUrl($srchUrl, $this->IdentificationMark); // IdentificationMark
		$this->buildSearchUrl($srchUrl, $this->Religion); // Religion
		$this->buildSearchUrl($srchUrl, $this->Nationality); // Nationality
		$this->buildSearchUrl($srchUrl, $this->ReferedByDr); // ReferedByDr
		$this->buildSearchUrl($srchUrl, $this->ReferClinicname); // ReferClinicname
		$this->buildSearchUrl($srchUrl, $this->ReferCity); // ReferCity
		$this->buildSearchUrl($srchUrl, $this->ReferMobileNo); // ReferMobileNo
		$this->buildSearchUrl($srchUrl, $this->ReferA4TreatingConsultant); // ReferA4TreatingConsultant
		$this->buildSearchUrl($srchUrl, $this->PurposreReferredfor); // PurposreReferredfor
		$this->buildSearchUrl($srchUrl, $this->spouse_title); // spouse_title
		$this->buildSearchUrl($srchUrl, $this->spouse_first_name); // spouse_first_name
		$this->buildSearchUrl($srchUrl, $this->spouse_middle_name); // spouse_middle_name
		$this->buildSearchUrl($srchUrl, $this->spouse_last_name); // spouse_last_name
		$this->buildSearchUrl($srchUrl, $this->spouse_gender); // spouse_gender
		$this->buildSearchUrl($srchUrl, $this->spouse_dob); // spouse_dob
		$this->buildSearchUrl($srchUrl, $this->spouse_Age); // spouse_Age
		$this->buildSearchUrl($srchUrl, $this->spouse_blood_group); // spouse_blood_group
		$this->buildSearchUrl($srchUrl, $this->spouse_mobile_no); // spouse_mobile_no
		$this->buildSearchUrl($srchUrl, $this->Maritalstatus); // Maritalstatus
		$this->buildSearchUrl($srchUrl, $this->Business); // Business
		$this->buildSearchUrl($srchUrl, $this->Patient_Language); // Patient_Language
		$this->buildSearchUrl($srchUrl, $this->Passport); // Passport
		$this->buildSearchUrl($srchUrl, $this->VisaNo); // VisaNo
		$this->buildSearchUrl($srchUrl, $this->ValidityOfVisa); // ValidityOfVisa
		$this->buildSearchUrl($srchUrl, $this->WhereDidYouHear); // WhereDidYouHear
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->street); // street
		$this->buildSearchUrl($srchUrl, $this->town); // town
		$this->buildSearchUrl($srchUrl, $this->province); // province
		$this->buildSearchUrl($srchUrl, $this->country); // country
		$this->buildSearchUrl($srchUrl, $this->postal_code); // postal_code
		$this->buildSearchUrl($srchUrl, $this->PEmail); // PEmail
		$this->buildSearchUrl($srchUrl, $this->PEmergencyContact); // PEmergencyContact
		$this->buildSearchUrl($srchUrl, $this->occupation); // occupation
		$this->buildSearchUrl($srchUrl, $this->spouse_occupation); // spouse_occupation
		$this->buildSearchUrl($srchUrl, $this->WhatsApp); // WhatsApp
		$this->buildSearchUrl($srchUrl, $this->CouppleID); // CouppleID
		$this->buildSearchUrl($srchUrl, $this->MaleID); // MaleID
		$this->buildSearchUrl($srchUrl, $this->FemaleID); // FemaleID
		$this->buildSearchUrl($srchUrl, $this->GroupID); // GroupID
		$this->buildSearchUrl($srchUrl, $this->Relationship); // Relationship
		$this->buildSearchUrl($srchUrl, $this->AppointmentSearch); // AppointmentSearch
		$this->buildSearchUrl($srchUrl, $this->FacebookID); // FacebookID
		if ($srchUrl != "")
			$srchUrl .= "&";
		$srchUrl .= "cmd=search";
		return $srchUrl;
	}

	// Build search URL
	protected function buildSearchUrl(&$url, &$fld, $oprOnly = FALSE)
	{
		global $CurrentForm;
		$wrk = "";
		$fldParm = $fld->Param;
		$fldVal = $CurrentForm->getValue("x_$fldParm");
		$fldOpr = $CurrentForm->getValue("z_$fldParm");
		$fldCond = $CurrentForm->getValue("v_$fldParm");
		$fldVal2 = $CurrentForm->getValue("y_$fldParm");
		$fldOpr2 = $CurrentForm->getValue("w_$fldParm");
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal != "" && $fldVal2 != "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal != "" && $isValidValue && IsValidOperator($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr != "" && $oprOnly && IsValidOperator($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 != "" && $isValidValue && IsValidOperator($fldOpr2, $fldDataType)) {
				if ($wrk != "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 != "" && $oprOnly && IsValidOperator($fldOpr2, $fldDataType))) {
				if ($wrk != "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk != "") {
			if ($url != "")
				$url .= "&";
			$url .= $wrk;
		}
	}
	protected function searchValueIsNumeric($fld, $value)
	{
		if (IsFloatFormat($fld->Type))
			$value = ConvertToFloatString($value);
		return is_numeric($value);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;
		if ($this->id->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->title->AdvancedSearch->post())
			$got = TRUE;
		if ($this->first_name->AdvancedSearch->post())
			$got = TRUE;
		if ($this->middle_name->AdvancedSearch->post())
			$got = TRUE;
		if ($this->last_name->AdvancedSearch->post())
			$got = TRUE;
		if ($this->gender->AdvancedSearch->post())
			$got = TRUE;
		if ($this->dob->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Age->AdvancedSearch->post())
			$got = TRUE;
		if ($this->blood_group->AdvancedSearch->post())
			$got = TRUE;
		if ($this->mobile_no->AdvancedSearch->post())
			$got = TRUE;
		if ($this->description->AdvancedSearch->post())
			$got = TRUE;
		if ($this->status->AdvancedSearch->post())
			$got = TRUE;
		if ($this->createdby->AdvancedSearch->post())
			$got = TRUE;
		if ($this->createddatetime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->modifiedby->AdvancedSearch->post())
			$got = TRUE;
		if ($this->modifieddatetime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->profilePic->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IdentificationMark->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Religion->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Nationality->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ReferedByDr->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ReferClinicname->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ReferCity->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ReferMobileNo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ReferA4TreatingConsultant->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PurposreReferredfor->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_title->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_first_name->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_middle_name->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_last_name->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_gender->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_dob->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_Age->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_blood_group->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_mobile_no->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Maritalstatus->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Business->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Patient_Language->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Passport->AdvancedSearch->post())
			$got = TRUE;
		if ($this->VisaNo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ValidityOfVisa->AdvancedSearch->post())
			$got = TRUE;
		if ($this->WhereDidYouHear->AdvancedSearch->post())
			$got = TRUE;
		if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue))
			$this->WhereDidYouHear->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->WhereDidYouHear->AdvancedSearch->SearchValue);
		if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue2))
			$this->WhereDidYouHear->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->WhereDidYouHear->AdvancedSearch->SearchValue2);
		if ($this->HospID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->street->AdvancedSearch->post())
			$got = TRUE;
		if ($this->town->AdvancedSearch->post())
			$got = TRUE;
		if ($this->province->AdvancedSearch->post())
			$got = TRUE;
		if ($this->country->AdvancedSearch->post())
			$got = TRUE;
		if ($this->postal_code->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PEmail->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PEmergencyContact->AdvancedSearch->post())
			$got = TRUE;
		if ($this->occupation->AdvancedSearch->post())
			$got = TRUE;
		if ($this->spouse_occupation->AdvancedSearch->post())
			$got = TRUE;
		if ($this->WhatsApp->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CouppleID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->MaleID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->FemaleID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->GroupID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Relationship->AdvancedSearch->post())
			$got = TRUE;
		if ($this->AppointmentSearch->AdvancedSearch->post())
			$got = TRUE;
		if ($this->FacebookID->AdvancedSearch->post())
			$got = TRUE;
		return $got;
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

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";
			$curVal = trim(strval($this->title->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->title->AdvancedSearch->ViewValue = $this->title->lookupCacheOption($curVal);
			else
				$this->title->AdvancedSearch->ViewValue = $this->title->Lookup !== NULL && is_array($this->title->Lookup->Options) ? $curVal : NULL;
			if ($this->title->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->title->EditValue = array_values($this->title->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->title->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
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
				$this->first_name->AdvancedSearch->SearchValue = HtmlDecode($this->first_name->AdvancedSearch->SearchValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->AdvancedSearch->SearchValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// middle_name
			$this->middle_name->EditAttrs["class"] = "form-control";
			$this->middle_name->EditCustomAttributes = "";
			if (!$this->middle_name->Raw)
				$this->middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->middle_name->AdvancedSearch->SearchValue);
			$this->middle_name->EditValue = HtmlEncode($this->middle_name->AdvancedSearch->SearchValue);
			$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (!$this->last_name->Raw)
				$this->last_name->AdvancedSearch->SearchValue = HtmlDecode($this->last_name->AdvancedSearch->SearchValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->AdvancedSearch->SearchValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->gender->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->gender->AdvancedSearch->ViewValue = $this->gender->lookupCacheOption($curVal);
			else
				$this->gender->AdvancedSearch->ViewValue = $this->gender->Lookup !== NULL && is_array($this->gender->Lookup->Options) ? $curVal : NULL;
			if ($this->gender->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->gender->EditValue = array_values($this->gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->gender->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
			$this->dob->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->dob->AdvancedSearch->SearchValue, 7), 7));
			$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// blood_group
			$this->blood_group->EditAttrs["class"] = "form-control";
			$this->blood_group->EditCustomAttributes = "";
			$curVal = trim(strval($this->blood_group->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->blood_group->AdvancedSearch->ViewValue = $this->blood_group->lookupCacheOption($curVal);
			else
				$this->blood_group->AdvancedSearch->ViewValue = $this->blood_group->Lookup !== NULL && is_array($this->blood_group->Lookup->Options) ? $curVal : NULL;
			if ($this->blood_group->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->blood_group->EditValue = array_values($this->blood_group->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->blood_group->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
				$this->mobile_no->AdvancedSearch->SearchValue = HtmlDecode($this->mobile_no->AdvancedSearch->SearchValue);
			$this->mobile_no->EditValue = HtmlEncode($this->mobile_no->AdvancedSearch->SearchValue);
			$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (!$this->description->Raw)
				$this->description->AdvancedSearch->SearchValue = HtmlDecode($this->description->AdvancedSearch->SearchValue);
			$this->description->EditValue = HtmlEncode($this->description->AdvancedSearch->SearchValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->status->AdvancedSearch->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->AdvancedSearch->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
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

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (!$this->profilePic->Raw)
				$this->profilePic->AdvancedSearch->SearchValue = HtmlDecode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (!$this->IdentificationMark->Raw)
				$this->IdentificationMark->AdvancedSearch->SearchValue = HtmlDecode($this->IdentificationMark->AdvancedSearch->SearchValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->AdvancedSearch->SearchValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// Religion
			$this->Religion->EditAttrs["class"] = "form-control";
			$this->Religion->EditCustomAttributes = "";
			if (!$this->Religion->Raw)
				$this->Religion->AdvancedSearch->SearchValue = HtmlDecode($this->Religion->AdvancedSearch->SearchValue);
			$this->Religion->EditValue = HtmlEncode($this->Religion->AdvancedSearch->SearchValue);
			$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

			// Nationality
			$this->Nationality->EditAttrs["class"] = "form-control";
			$this->Nationality->EditCustomAttributes = "";
			if (!$this->Nationality->Raw)
				$this->Nationality->AdvancedSearch->SearchValue = HtmlDecode($this->Nationality->AdvancedSearch->SearchValue);
			$this->Nationality->EditValue = HtmlEncode($this->Nationality->AdvancedSearch->SearchValue);
			$this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

			// ReferedByDr
			$this->ReferedByDr->EditAttrs["class"] = "form-control";
			$this->ReferedByDr->EditCustomAttributes = "";
			if (!$this->ReferedByDr->Raw)
				$this->ReferedByDr->AdvancedSearch->SearchValue = HtmlDecode($this->ReferedByDr->AdvancedSearch->SearchValue);
			$this->ReferedByDr->EditValue = HtmlEncode($this->ReferedByDr->AdvancedSearch->SearchValue);
			$this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			if (!$this->ReferClinicname->Raw)
				$this->ReferClinicname->AdvancedSearch->SearchValue = HtmlDecode($this->ReferClinicname->AdvancedSearch->SearchValue);
			$this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->AdvancedSearch->SearchValue);
			$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			if (!$this->ReferCity->Raw)
				$this->ReferCity->AdvancedSearch->SearchValue = HtmlDecode($this->ReferCity->AdvancedSearch->SearchValue);
			$this->ReferCity->EditValue = HtmlEncode($this->ReferCity->AdvancedSearch->SearchValue);
			$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			if (!$this->ReferMobileNo->Raw)
				$this->ReferMobileNo->AdvancedSearch->SearchValue = HtmlDecode($this->ReferMobileNo->AdvancedSearch->SearchValue);
			$this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->AdvancedSearch->SearchValue);
			$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			if (!$this->ReferA4TreatingConsultant->Raw)
				$this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = HtmlDecode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
			$this->ReferA4TreatingConsultant->EditValue = HtmlEncode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
			$this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (!$this->PurposreReferredfor->Raw)
				$this->PurposreReferredfor->AdvancedSearch->SearchValue = HtmlDecode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// spouse_title
			$this->spouse_title->EditAttrs["class"] = "form-control";
			$this->spouse_title->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_title->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->spouse_title->AdvancedSearch->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
			else
				$this->spouse_title->AdvancedSearch->ViewValue = $this->spouse_title->Lookup !== NULL && is_array($this->spouse_title->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_title->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->spouse_title->EditValue = array_values($this->spouse_title->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->spouse_title->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
				$this->spouse_first_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_first_name->AdvancedSearch->SearchValue);
			$this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->AdvancedSearch->SearchValue);
			$this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

			// spouse_middle_name
			$this->spouse_middle_name->EditAttrs["class"] = "form-control";
			$this->spouse_middle_name->EditCustomAttributes = "";
			if (!$this->spouse_middle_name->Raw)
				$this->spouse_middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_middle_name->AdvancedSearch->SearchValue);
			$this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->AdvancedSearch->SearchValue);
			$this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

			// spouse_last_name
			$this->spouse_last_name->EditAttrs["class"] = "form-control";
			$this->spouse_last_name->EditCustomAttributes = "";
			if (!$this->spouse_last_name->Raw)
				$this->spouse_last_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_last_name->AdvancedSearch->SearchValue);
			$this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->AdvancedSearch->SearchValue);
			$this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

			// spouse_gender
			$this->spouse_gender->EditAttrs["class"] = "form-control";
			$this->spouse_gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_gender->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->spouse_gender->AdvancedSearch->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
			else
				$this->spouse_gender->AdvancedSearch->ViewValue = $this->spouse_gender->Lookup !== NULL && is_array($this->spouse_gender->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_gender->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->spouse_gender->EditValue = array_values($this->spouse_gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->spouse_gender->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
			$this->spouse_dob->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->spouse_dob->AdvancedSearch->SearchValue, 7), 7));
			$this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

			// spouse_Age
			$this->spouse_Age->EditAttrs["class"] = "form-control";
			$this->spouse_Age->EditCustomAttributes = "";
			if (!$this->spouse_Age->Raw)
				$this->spouse_Age->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_Age->AdvancedSearch->SearchValue);
			$this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->AdvancedSearch->SearchValue);
			$this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

			// spouse_blood_group
			$this->spouse_blood_group->EditAttrs["class"] = "form-control";
			$this->spouse_blood_group->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_blood_group->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->spouse_blood_group->AdvancedSearch->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
			else
				$this->spouse_blood_group->AdvancedSearch->ViewValue = $this->spouse_blood_group->Lookup !== NULL && is_array($this->spouse_blood_group->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_blood_group->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->spouse_blood_group->EditValue = array_values($this->spouse_blood_group->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->spouse_blood_group->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
				$this->spouse_mobile_no->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_mobile_no->AdvancedSearch->SearchValue);
			$this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->AdvancedSearch->SearchValue);
			$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

			// Maritalstatus
			$this->Maritalstatus->EditAttrs["class"] = "form-control";
			$this->Maritalstatus->EditCustomAttributes = "";
			$curVal = trim(strval($this->Maritalstatus->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Maritalstatus->AdvancedSearch->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
			else
				$this->Maritalstatus->AdvancedSearch->ViewValue = $this->Maritalstatus->Lookup !== NULL && is_array($this->Maritalstatus->Lookup->Options) ? $curVal : NULL;
			if ($this->Maritalstatus->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Maritalstatus->EditValue = array_values($this->Maritalstatus->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`MaritalStatus`" . SearchString("=", $this->Maritalstatus->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
				$this->Business->AdvancedSearch->SearchValue = HtmlDecode($this->Business->AdvancedSearch->SearchValue);
			$this->Business->EditValue = HtmlEncode($this->Business->AdvancedSearch->SearchValue);
			$curVal = strval($this->Business->AdvancedSearch->SearchValue);
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
						$this->Business->EditValue = HtmlEncode($this->Business->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->Business->EditValue = NULL;
			}
			$this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

			// Patient_Language
			$this->Patient_Language->EditAttrs["class"] = "form-control";
			$this->Patient_Language->EditCustomAttributes = "";
			$curVal = trim(strval($this->Patient_Language->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Patient_Language->AdvancedSearch->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
			else
				$this->Patient_Language->AdvancedSearch->ViewValue = $this->Patient_Language->Lookup !== NULL && is_array($this->Patient_Language->Lookup->Options) ? $curVal : NULL;
			if ($this->Patient_Language->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Patient_Language->EditValue = array_values($this->Patient_Language->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Language`" . SearchString("=", $this->Patient_Language->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
				$this->Passport->AdvancedSearch->SearchValue = HtmlDecode($this->Passport->AdvancedSearch->SearchValue);
			$this->Passport->EditValue = HtmlEncode($this->Passport->AdvancedSearch->SearchValue);
			$this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

			// VisaNo
			$this->VisaNo->EditAttrs["class"] = "form-control";
			$this->VisaNo->EditCustomAttributes = "";
			if (!$this->VisaNo->Raw)
				$this->VisaNo->AdvancedSearch->SearchValue = HtmlDecode($this->VisaNo->AdvancedSearch->SearchValue);
			$this->VisaNo->EditValue = HtmlEncode($this->VisaNo->AdvancedSearch->SearchValue);
			$this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

			// ValidityOfVisa
			$this->ValidityOfVisa->EditAttrs["class"] = "form-control";
			$this->ValidityOfVisa->EditCustomAttributes = "";
			if (!$this->ValidityOfVisa->Raw)
				$this->ValidityOfVisa->AdvancedSearch->SearchValue = HtmlDecode($this->ValidityOfVisa->AdvancedSearch->SearchValue);
			$this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->AdvancedSearch->SearchValue);
			$this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";
			$curVal = trim(strval($this->WhereDidYouHear->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->WhereDidYouHear->AdvancedSearch->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			else
				$this->WhereDidYouHear->AdvancedSearch->ViewValue = $this->WhereDidYouHear->Lookup !== NULL && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : NULL;
			if ($this->WhereDidYouHear->AdvancedSearch->ViewValue !== NULL) { // Load from cache
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
			$curVal = trim(strval($this->HospID->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->HospID->AdvancedSearch->ViewValue = $this->HospID->lookupCacheOption($curVal);
			else
				$this->HospID->AdvancedSearch->ViewValue = $this->HospID->Lookup !== NULL && is_array($this->HospID->Lookup->Options) ? $curVal : NULL;
			if ($this->HospID->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->HospID->EditValue = array_values($this->HospID->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HospID->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HospID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->HospID->EditValue = $arwrk;
			}

			// street
			$this->street->EditAttrs["class"] = "form-control";
			$this->street->EditCustomAttributes = "";
			if (!$this->street->Raw)
				$this->street->AdvancedSearch->SearchValue = HtmlDecode($this->street->AdvancedSearch->SearchValue);
			$this->street->EditValue = HtmlEncode($this->street->AdvancedSearch->SearchValue);
			$this->street->PlaceHolder = RemoveHtml($this->street->caption());

			// town
			$this->town->EditAttrs["class"] = "form-control";
			$this->town->EditCustomAttributes = "";
			if (!$this->town->Raw)
				$this->town->AdvancedSearch->SearchValue = HtmlDecode($this->town->AdvancedSearch->SearchValue);
			$this->town->EditValue = HtmlEncode($this->town->AdvancedSearch->SearchValue);
			$this->town->PlaceHolder = RemoveHtml($this->town->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			if (!$this->province->Raw)
				$this->province->AdvancedSearch->SearchValue = HtmlDecode($this->province->AdvancedSearch->SearchValue);
			$this->province->EditValue = HtmlEncode($this->province->AdvancedSearch->SearchValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (!$this->country->Raw)
				$this->country->AdvancedSearch->SearchValue = HtmlDecode($this->country->AdvancedSearch->SearchValue);
			$this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (!$this->postal_code->Raw)
				$this->postal_code->AdvancedSearch->SearchValue = HtmlDecode($this->postal_code->AdvancedSearch->SearchValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->AdvancedSearch->SearchValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// PEmail
			$this->PEmail->EditAttrs["class"] = "form-control";
			$this->PEmail->EditCustomAttributes = "";
			if (!$this->PEmail->Raw)
				$this->PEmail->AdvancedSearch->SearchValue = HtmlDecode($this->PEmail->AdvancedSearch->SearchValue);
			$this->PEmail->EditValue = HtmlEncode($this->PEmail->AdvancedSearch->SearchValue);
			$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

			// PEmergencyContact
			$this->PEmergencyContact->EditAttrs["class"] = "form-control";
			$this->PEmergencyContact->EditCustomAttributes = "";
			if (!$this->PEmergencyContact->Raw)
				$this->PEmergencyContact->AdvancedSearch->SearchValue = HtmlDecode($this->PEmergencyContact->AdvancedSearch->SearchValue);
			$this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->AdvancedSearch->SearchValue);
			$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

			// occupation
			$this->occupation->EditAttrs["class"] = "form-control";
			$this->occupation->EditCustomAttributes = "";
			if (!$this->occupation->Raw)
				$this->occupation->AdvancedSearch->SearchValue = HtmlDecode($this->occupation->AdvancedSearch->SearchValue);
			$this->occupation->EditValue = HtmlEncode($this->occupation->AdvancedSearch->SearchValue);
			$this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

			// spouse_occupation
			$this->spouse_occupation->EditAttrs["class"] = "form-control";
			$this->spouse_occupation->EditCustomAttributes = "";
			if (!$this->spouse_occupation->Raw)
				$this->spouse_occupation->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_occupation->AdvancedSearch->SearchValue);
			$this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->AdvancedSearch->SearchValue);
			$this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

			// WhatsApp
			$this->WhatsApp->EditAttrs["class"] = "form-control";
			$this->WhatsApp->EditCustomAttributes = "";
			if (!$this->WhatsApp->Raw)
				$this->WhatsApp->AdvancedSearch->SearchValue = HtmlDecode($this->WhatsApp->AdvancedSearch->SearchValue);
			$this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->AdvancedSearch->SearchValue);
			$this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

			// CouppleID
			$this->CouppleID->EditAttrs["class"] = "form-control";
			$this->CouppleID->EditCustomAttributes = "";
			$this->CouppleID->EditValue = HtmlEncode($this->CouppleID->AdvancedSearch->SearchValue);
			$this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

			// MaleID
			$this->MaleID->EditAttrs["class"] = "form-control";
			$this->MaleID->EditCustomAttributes = "";
			$this->MaleID->EditValue = HtmlEncode($this->MaleID->AdvancedSearch->SearchValue);
			$this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

			// FemaleID
			$this->FemaleID->EditAttrs["class"] = "form-control";
			$this->FemaleID->EditCustomAttributes = "";
			$this->FemaleID->EditValue = HtmlEncode($this->FemaleID->AdvancedSearch->SearchValue);
			$this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

			// GroupID
			$this->GroupID->EditAttrs["class"] = "form-control";
			$this->GroupID->EditCustomAttributes = "";
			$this->GroupID->EditValue = HtmlEncode($this->GroupID->AdvancedSearch->SearchValue);
			$this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

			// Relationship
			$this->Relationship->EditAttrs["class"] = "form-control";
			$this->Relationship->EditCustomAttributes = "";
			if (!$this->Relationship->Raw)
				$this->Relationship->AdvancedSearch->SearchValue = HtmlDecode($this->Relationship->AdvancedSearch->SearchValue);
			$this->Relationship->EditValue = HtmlEncode($this->Relationship->AdvancedSearch->SearchValue);
			$this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

			// AppointmentSearch
			$this->AppointmentSearch->EditCustomAttributes = "";
			$curVal = trim(strval($this->AppointmentSearch->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->AppointmentSearch->AdvancedSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
			else
				$this->AppointmentSearch->AdvancedSearch->ViewValue = $this->AppointmentSearch->Lookup !== NULL && is_array($this->AppointmentSearch->Lookup->Options) ? $curVal : NULL;
			if ($this->AppointmentSearch->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->AppointmentSearch->EditValue = array_values($this->AppointmentSearch->Lookup->Options);
				if ($this->AppointmentSearch->AdvancedSearch->ViewValue == "")
					$this->AppointmentSearch->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->AppointmentSearch->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AppointmentSearch->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->AppointmentSearch->AdvancedSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
				} else {
					$this->AppointmentSearch->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
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
				$this->FacebookID->AdvancedSearch->SearchValue = HtmlDecode($this->FacebookID->AdvancedSearch->SearchValue);
			$this->FacebookID->EditValue = HtmlEncode($this->FacebookID->AdvancedSearch->SearchValue);
			$this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;
		if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->id->errorMessage());
		}
		if (!CheckEuroDate($this->dob->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->dob->errorMessage());
		}
		if (!CheckInteger($this->createdby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createdby->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckInteger($this->modifiedby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifiedby->errorMessage());
		}
		if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifieddatetime->errorMessage());
		}
		if (!CheckInteger($this->CouppleID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CouppleID->errorMessage());
		}
		if (!CheckInteger($this->MaleID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->MaleID->errorMessage());
		}
		if (!CheckInteger($this->FemaleID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->FemaleID->errorMessage());
		}
		if (!CheckInteger($this->GroupID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->GroupID->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->title->AdvancedSearch->load();
		$this->first_name->AdvancedSearch->load();
		$this->middle_name->AdvancedSearch->load();
		$this->last_name->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->dob->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->blood_group->AdvancedSearch->load();
		$this->mobile_no->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->IdentificationMark->AdvancedSearch->load();
		$this->Religion->AdvancedSearch->load();
		$this->Nationality->AdvancedSearch->load();
		$this->ReferedByDr->AdvancedSearch->load();
		$this->ReferClinicname->AdvancedSearch->load();
		$this->ReferCity->AdvancedSearch->load();
		$this->ReferMobileNo->AdvancedSearch->load();
		$this->ReferA4TreatingConsultant->AdvancedSearch->load();
		$this->PurposreReferredfor->AdvancedSearch->load();
		$this->spouse_title->AdvancedSearch->load();
		$this->spouse_first_name->AdvancedSearch->load();
		$this->spouse_middle_name->AdvancedSearch->load();
		$this->spouse_last_name->AdvancedSearch->load();
		$this->spouse_gender->AdvancedSearch->load();
		$this->spouse_dob->AdvancedSearch->load();
		$this->spouse_Age->AdvancedSearch->load();
		$this->spouse_blood_group->AdvancedSearch->load();
		$this->spouse_mobile_no->AdvancedSearch->load();
		$this->Maritalstatus->AdvancedSearch->load();
		$this->Business->AdvancedSearch->load();
		$this->Patient_Language->AdvancedSearch->load();
		$this->Passport->AdvancedSearch->load();
		$this->VisaNo->AdvancedSearch->load();
		$this->ValidityOfVisa->AdvancedSearch->load();
		$this->WhereDidYouHear->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->street->AdvancedSearch->load();
		$this->town->AdvancedSearch->load();
		$this->province->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->postal_code->AdvancedSearch->load();
		$this->PEmail->AdvancedSearch->load();
		$this->PEmergencyContact->AdvancedSearch->load();
		$this->occupation->AdvancedSearch->load();
		$this->spouse_occupation->AdvancedSearch->load();
		$this->WhatsApp->AdvancedSearch->load();
		$this->CouppleID->AdvancedSearch->load();
		$this->MaleID->AdvancedSearch->load();
		$this->FemaleID->AdvancedSearch->load();
		$this->GroupID->AdvancedSearch->load();
		$this->Relationship->AdvancedSearch->load();
		$this->AppointmentSearch->AdvancedSearch->load();
		$this->FacebookID->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patientlist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>
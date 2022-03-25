<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_prescription_search extends patient_prescription
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_prescription';

	// Page object name
	public $PageObjName = "patient_prescription_search";

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

		// Table object (patient_prescription)
		if (!isset($GLOBALS["patient_prescription"]) || get_class($GLOBALS["patient_prescription"]) == PROJECT_NAMESPACE . "patient_prescription") {
			$GLOBALS["patient_prescription"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_prescription"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_prescription');

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
		global $patient_prescription;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_prescription);
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
					if ($pageName == "patient_prescriptionview.php")
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
					$this->terminate(GetUrl("patient_prescriptionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Medicine->setVisibility();
		$this->M->setVisibility();
		$this->A->setVisibility();
		$this->N->setVisibility();
		$this->NoOfDays->setVisibility();
		$this->PreRoute->setVisibility();
		$this->TimeOfTaking->setVisibility();
		$this->Type->setVisibility();
		$this->mrnno->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->Status->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreateDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
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
		$this->setupLookupOptions($this->Medicine);
		$this->setupLookupOptions($this->PreRoute);
		$this->setupLookupOptions($this->TimeOfTaking);
		$this->setupLookupOptions($this->Status);

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
					$srchStr = "patient_prescriptionlist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->Reception); // Reception
		$this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
		$this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
		$this->buildSearchUrl($srchUrl, $this->Medicine); // Medicine
		$this->buildSearchUrl($srchUrl, $this->M); // M
		$this->buildSearchUrl($srchUrl, $this->A); // A
		$this->buildSearchUrl($srchUrl, $this->N); // N
		$this->buildSearchUrl($srchUrl, $this->NoOfDays); // NoOfDays
		$this->buildSearchUrl($srchUrl, $this->PreRoute); // PreRoute
		$this->buildSearchUrl($srchUrl, $this->TimeOfTaking); // TimeOfTaking
		$this->buildSearchUrl($srchUrl, $this->Type); // Type
		$this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
		$this->buildSearchUrl($srchUrl, $this->Age); // Age
		$this->buildSearchUrl($srchUrl, $this->Gender); // Gender
		$this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
		$this->buildSearchUrl($srchUrl, $this->Status); // Status
		$this->buildSearchUrl($srchUrl, $this->CreatedBy); // CreatedBy
		$this->buildSearchUrl($srchUrl, $this->CreateDateTime); // CreateDateTime
		$this->buildSearchUrl($srchUrl, $this->ModifiedBy); // ModifiedBy
		$this->buildSearchUrl($srchUrl, $this->ModifiedDateTime); // ModifiedDateTime
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
		if ($this->Reception->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientId->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Medicine->AdvancedSearch->post())
			$got = TRUE;
		if ($this->M->AdvancedSearch->post())
			$got = TRUE;
		if ($this->A->AdvancedSearch->post())
			$got = TRUE;
		if ($this->N->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NoOfDays->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PreRoute->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TimeOfTaking->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Type->AdvancedSearch->post())
			$got = TRUE;
		if ($this->mrnno->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Age->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Gender->AdvancedSearch->post())
			$got = TRUE;
		if ($this->profilePic->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Status->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CreatedBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CreateDateTime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ModifiedBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ModifiedDateTime->AdvancedSearch->post())
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
		// Reception
		// PatientId
		// PatientName
		// Medicine
		// M
		// A
		// N
		// NoOfDays
		// PreRoute
		// TimeOfTaking
		// Type
		// mrnno
		// Age
		// Gender
		// profilePic
		// Status
		// CreatedBy
		// CreateDateTime
		// ModifiedBy
		// ModifiedDateTime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Medicine
			$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
			$curVal = strval($this->Medicine->CurrentValue);
			if ($curVal != "") {
				$this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
					}
				}
			} else {
				$this->Medicine->ViewValue = NULL;
			}
			$this->Medicine->ViewCustomAttributes = "";

			// M
			$this->M->ViewValue = $this->M->CurrentValue;
			$this->M->ViewCustomAttributes = "";

			// A
			$this->A->ViewValue = $this->A->CurrentValue;
			$this->A->ViewCustomAttributes = "";

			// N
			$this->N->ViewValue = $this->N->CurrentValue;
			$this->N->ViewCustomAttributes = "";

			// NoOfDays
			$this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
			$this->NoOfDays->ViewCustomAttributes = "";

			// PreRoute
			if ($this->PreRoute->VirtualValue != "") {
				$this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
			} else {
				$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
				$curVal = strval($this->PreRoute->CurrentValue);
				if ($curVal != "") {
					$this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
					if ($this->PreRoute->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->PreRoute->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
						}
					}
				} else {
					$this->PreRoute->ViewValue = NULL;
				}
			}
			$this->PreRoute->ViewCustomAttributes = "";

			// TimeOfTaking
			if ($this->TimeOfTaking->VirtualValue != "") {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
			} else {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
				$curVal = strval($this->TimeOfTaking->CurrentValue);
				if ($curVal != "") {
					$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
					if ($this->TimeOfTaking->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->TimeOfTaking->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
						}
					}
				} else {
					$this->TimeOfTaking->ViewValue = NULL;
				}
			}
			$this->TimeOfTaking->ViewCustomAttributes = "";

			// Type
			if (strval($this->Type->CurrentValue) != "") {
				$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
			} else {
				$this->Type->ViewValue = NULL;
			}
			$this->Type->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// Status
			$curVal = strval($this->Status->CurrentValue);
			if ($curVal != "") {
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
				if ($this->Status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Status->ViewValue = $this->Status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Status->ViewValue = $this->Status->CurrentValue;
					}
				}
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreateDateTime
			$this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
			$this->CreateDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";
			$this->Medicine->TooltipValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";
			$this->M->TooltipValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";
			$this->A->TooltipValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";
			$this->N->TooltipValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";
			$this->NoOfDays->TooltipValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";
			$this->PreRoute->TooltipValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";
			$this->TimeOfTaking->TooltipValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";
			$this->Type->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";
			$this->CreateDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Medicine
			$this->Medicine->EditAttrs["class"] = "form-control";
			$this->Medicine->EditCustomAttributes = "";
			if (!$this->Medicine->Raw)
				$this->Medicine->AdvancedSearch->SearchValue = HtmlDecode($this->Medicine->AdvancedSearch->SearchValue);
			$this->Medicine->EditValue = HtmlEncode($this->Medicine->AdvancedSearch->SearchValue);
			$curVal = strval($this->Medicine->AdvancedSearch->SearchValue);
			if ($curVal != "") {
				$this->Medicine->EditValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Medicine->EditValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->EditValue = HtmlEncode($this->Medicine->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->Medicine->EditValue = NULL;
			}
			$this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

			// M
			$this->M->EditAttrs["class"] = "form-control";
			$this->M->EditCustomAttributes = "";
			if (!$this->M->Raw)
				$this->M->AdvancedSearch->SearchValue = HtmlDecode($this->M->AdvancedSearch->SearchValue);
			$this->M->EditValue = HtmlEncode($this->M->AdvancedSearch->SearchValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (!$this->A->Raw)
				$this->A->AdvancedSearch->SearchValue = HtmlDecode($this->A->AdvancedSearch->SearchValue);
			$this->A->EditValue = HtmlEncode($this->A->AdvancedSearch->SearchValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// N
			$this->N->EditAttrs["class"] = "form-control";
			$this->N->EditCustomAttributes = "";
			if (!$this->N->Raw)
				$this->N->AdvancedSearch->SearchValue = HtmlDecode($this->N->AdvancedSearch->SearchValue);
			$this->N->EditValue = HtmlEncode($this->N->AdvancedSearch->SearchValue);
			$this->N->PlaceHolder = RemoveHtml($this->N->caption());

			// NoOfDays
			$this->NoOfDays->EditAttrs["class"] = "form-control";
			$this->NoOfDays->EditCustomAttributes = "";
			if (!$this->NoOfDays->Raw)
				$this->NoOfDays->AdvancedSearch->SearchValue = HtmlDecode($this->NoOfDays->AdvancedSearch->SearchValue);
			$this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->AdvancedSearch->SearchValue);
			$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

			// PreRoute
			$this->PreRoute->EditAttrs["class"] = "form-control";
			$this->PreRoute->EditCustomAttributes = "";
			if (!$this->PreRoute->Raw)
				$this->PreRoute->AdvancedSearch->SearchValue = HtmlDecode($this->PreRoute->AdvancedSearch->SearchValue);
			$this->PreRoute->EditValue = HtmlEncode($this->PreRoute->AdvancedSearch->SearchValue);
			$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

			// TimeOfTaking
			$this->TimeOfTaking->EditAttrs["class"] = "form-control";
			$this->TimeOfTaking->EditCustomAttributes = "";
			if (!$this->TimeOfTaking->Raw)
				$this->TimeOfTaking->AdvancedSearch->SearchValue = HtmlDecode($this->TimeOfTaking->AdvancedSearch->SearchValue);
			$this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->AdvancedSearch->SearchValue);
			$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

			// Type
			$this->Type->EditAttrs["class"] = "form-control";
			$this->Type->EditCustomAttributes = "";
			$this->Type->EditValue = $this->Type->options(TRUE);

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (!$this->mrnno->Raw)
				$this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Status->AdvancedSearch->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->AdvancedSearch->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->Status->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Status->EditValue = $arwrk;
			}

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			if (!$this->CreatedBy->Raw)
				$this->CreatedBy->AdvancedSearch->SearchValue = HtmlDecode($this->CreatedBy->AdvancedSearch->SearchValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->AdvancedSearch->SearchValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// CreateDateTime
			$this->CreateDateTime->EditAttrs["class"] = "form-control";
			$this->CreateDateTime->EditCustomAttributes = "";
			if (!$this->CreateDateTime->Raw)
				$this->CreateDateTime->AdvancedSearch->SearchValue = HtmlDecode($this->CreateDateTime->AdvancedSearch->SearchValue);
			$this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->AdvancedSearch->SearchValue);
			$this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (!$this->ModifiedBy->Raw)
				$this->ModifiedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ModifiedBy->AdvancedSearch->SearchValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->AdvancedSearch->SearchValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// ModifiedDateTime
			$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->ModifiedDateTime->EditCustomAttributes = "";
			if (!$this->ModifiedDateTime->Raw)
				$this->ModifiedDateTime->AdvancedSearch->SearchValue = HtmlDecode($this->ModifiedDateTime->AdvancedSearch->SearchValue);
			$this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->AdvancedSearch->SearchValue);
			$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());
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
		if (!CheckInteger($this->Reception->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Reception->errorMessage());
		}
		if (!CheckInteger($this->PatientId->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PatientId->errorMessage());
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
		$this->Reception->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Medicine->AdvancedSearch->load();
		$this->M->AdvancedSearch->load();
		$this->A->AdvancedSearch->load();
		$this->N->AdvancedSearch->load();
		$this->NoOfDays->AdvancedSearch->load();
		$this->PreRoute->AdvancedSearch->load();
		$this->TimeOfTaking->AdvancedSearch->load();
		$this->Type->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Status->AdvancedSearch->load();
		$this->CreatedBy->AdvancedSearch->load();
		$this->CreateDateTime->AdvancedSearch->load();
		$this->ModifiedBy->AdvancedSearch->load();
		$this->ModifiedDateTime->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_prescriptionlist.php"), "", $this->TableVar, TRUE);
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
				case "x_Medicine":
					break;
				case "x_PreRoute":
					break;
				case "x_TimeOfTaking":
					break;
				case "x_Type":
					break;
				case "x_Status":
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
						case "x_Medicine":
							break;
						case "x_PreRoute":
							break;
						case "x_TimeOfTaking":
							break;
						case "x_Status":
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
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_otherprocedure_edit extends ivf_otherprocedure
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_otherprocedure';

	// Page object name
	public $PageObjName = "ivf_otherprocedure_edit";

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

		// Table object (ivf_otherprocedure)
		if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
			$GLOBALS["ivf_otherprocedure"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_otherprocedure"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');

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
		global $ivf_otherprocedure;
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
				$doc = new $class($ivf_otherprocedure);
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
					if ($pageName == "ivf_otherprocedureview.php")
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
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canEdit()) {
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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_otherprocedurelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->Age->setVisibility();
		$this->SEX->setVisibility();
		$this->Address->setVisibility();
		$this->DateofAdmission->setVisibility();
		$this->DateofProcedure->setVisibility();
		$this->DateofDischarge->setVisibility();
		$this->Consultant->setVisibility();
		$this->Surgeon->setVisibility();
		$this->Anesthetist->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->ProcedureDone->setVisibility();
		$this->PROVISIONALDIAGNOSIS->setVisibility();
		$this->Chiefcomplaints->setVisibility();
		$this->MaritallHistory->setVisibility();
		$this->MenstrualHistory->setVisibility();
		$this->SurgicalHistory->setVisibility();
		$this->PastHistory->setVisibility();
		$this->FamilyHistory->setVisibility();
		$this->Temp->setVisibility();
		$this->Pulse->setVisibility();
		$this->BP->setVisibility();
		$this->CNS->setVisibility();
		$this->_RS->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->InvestigationReport->setVisibility();
		$this->FinalDiagnosis->setVisibility();
		$this->Treatment->setVisibility();
		$this->DetailOfOperation->setVisibility();
		$this->FollowUpAdvice->setVisibility();
		$this->FollowUpMedication->setVisibility();
		$this->Plan->setVisibility();
		$this->TempleteFinalDiagnosis->setVisibility();
		$this->TemplateTreatment->setVisibility();
		$this->TemplateOperation->setVisibility();
		$this->TemplateFollowUpAdvice->setVisibility();
		$this->TemplateFollowUpMedication->setVisibility();
		$this->TemplatePlan->setVisibility();
		$this->QRCode->setVisibility();
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
		$this->setupLookupOptions($this->Name);
		$this->setupLookupOptions($this->Consultant);
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anesthetist);
		$this->setupLookupOptions($this->TempleteFinalDiagnosis);
		$this->setupLookupOptions($this->TemplateTreatment);
		$this->setupLookupOptions($this->TemplateOperation);
		$this->setupLookupOptions($this->TemplateFollowUpAdvice);
		$this->setupLookupOptions($this->TemplateFollowUpMedication);
		$this->setupLookupOptions($this->TemplatePlan);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_otherprocedurelist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->id->setOldValue($this->id->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->id->setQueryStringValue(Key(0));
				$this->id->setOldValue($this->id->QueryStringValue);
			} elseif (Post("id") !== NULL) {
				$this->id->setFormValue(Post("id"));
				$this->id->setOldValue($this->id->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->id->setQueryStringValue(Route(2));
				$this->id->setOldValue($this->id->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_id")) {
					$this->id->setFormValue($CurrentForm->getValue("x_id"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("id") !== NULL) {
					$this->id->setQueryStringValue(Get("id"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->id->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->id->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

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
					$this->terminate("ivf_otherprocedurelist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ivf_otherprocedurelist.php")
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

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'SEX' first before field var 'x_SEX'
		$val = $CurrentForm->hasValue("SEX") ? $CurrentForm->getValue("SEX") : $CurrentForm->getValue("x_SEX");
		if (!$this->SEX->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SEX->Visible = FALSE; // Disable update for API request
			else
				$this->SEX->setFormValue($val);
		}

		// Check field name 'Address' first before field var 'x_Address'
		$val = $CurrentForm->hasValue("Address") ? $CurrentForm->getValue("Address") : $CurrentForm->getValue("x_Address");
		if (!$this->Address->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Address->Visible = FALSE; // Disable update for API request
			else
				$this->Address->setFormValue($val);
		}

		// Check field name 'DateofAdmission' first before field var 'x_DateofAdmission'
		$val = $CurrentForm->hasValue("DateofAdmission") ? $CurrentForm->getValue("DateofAdmission") : $CurrentForm->getValue("x_DateofAdmission");
		if (!$this->DateofAdmission->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DateofAdmission->Visible = FALSE; // Disable update for API request
			else
				$this->DateofAdmission->setFormValue($val);
			$this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 11);
		}

		// Check field name 'DateofProcedure' first before field var 'x_DateofProcedure'
		$val = $CurrentForm->hasValue("DateofProcedure") ? $CurrentForm->getValue("DateofProcedure") : $CurrentForm->getValue("x_DateofProcedure");
		if (!$this->DateofProcedure->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DateofProcedure->Visible = FALSE; // Disable update for API request
			else
				$this->DateofProcedure->setFormValue($val);
			$this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 11);
		}

		// Check field name 'DateofDischarge' first before field var 'x_DateofDischarge'
		$val = $CurrentForm->hasValue("DateofDischarge") ? $CurrentForm->getValue("DateofDischarge") : $CurrentForm->getValue("x_DateofDischarge");
		if (!$this->DateofDischarge->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DateofDischarge->Visible = FALSE; // Disable update for API request
			else
				$this->DateofDischarge->setFormValue($val);
			$this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 11);
		}

		// Check field name 'Consultant' first before field var 'x_Consultant'
		$val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
		if (!$this->Consultant->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Consultant->Visible = FALSE; // Disable update for API request
			else
				$this->Consultant->setFormValue($val);
		}

		// Check field name 'Surgeon' first before field var 'x_Surgeon'
		$val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
		if (!$this->Surgeon->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Surgeon->Visible = FALSE; // Disable update for API request
			else
				$this->Surgeon->setFormValue($val);
		}

		// Check field name 'Anesthetist' first before field var 'x_Anesthetist'
		$val = $CurrentForm->hasValue("Anesthetist") ? $CurrentForm->getValue("Anesthetist") : $CurrentForm->getValue("x_Anesthetist");
		if (!$this->Anesthetist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Anesthetist->Visible = FALSE; // Disable update for API request
			else
				$this->Anesthetist->setFormValue($val);
		}

		// Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
		$val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
		if (!$this->IdentificationMark->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IdentificationMark->Visible = FALSE; // Disable update for API request
			else
				$this->IdentificationMark->setFormValue($val);
		}

		// Check field name 'ProcedureDone' first before field var 'x_ProcedureDone'
		$val = $CurrentForm->hasValue("ProcedureDone") ? $CurrentForm->getValue("ProcedureDone") : $CurrentForm->getValue("x_ProcedureDone");
		if (!$this->ProcedureDone->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProcedureDone->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureDone->setFormValue($val);
		}

		// Check field name 'PROVISIONALDIAGNOSIS' first before field var 'x_PROVISIONALDIAGNOSIS'
		$val = $CurrentForm->hasValue("PROVISIONALDIAGNOSIS") ? $CurrentForm->getValue("PROVISIONALDIAGNOSIS") : $CurrentForm->getValue("x_PROVISIONALDIAGNOSIS");
		if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PROVISIONALDIAGNOSIS->Visible = FALSE; // Disable update for API request
			else
				$this->PROVISIONALDIAGNOSIS->setFormValue($val);
		}

		// Check field name 'Chiefcomplaints' first before field var 'x_Chiefcomplaints'
		$val = $CurrentForm->hasValue("Chiefcomplaints") ? $CurrentForm->getValue("Chiefcomplaints") : $CurrentForm->getValue("x_Chiefcomplaints");
		if (!$this->Chiefcomplaints->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Chiefcomplaints->Visible = FALSE; // Disable update for API request
			else
				$this->Chiefcomplaints->setFormValue($val);
		}

		// Check field name 'MaritallHistory' first before field var 'x_MaritallHistory'
		$val = $CurrentForm->hasValue("MaritallHistory") ? $CurrentForm->getValue("MaritallHistory") : $CurrentForm->getValue("x_MaritallHistory");
		if (!$this->MaritallHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MaritallHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MaritallHistory->setFormValue($val);
		}

		// Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
		$val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
		if (!$this->MenstrualHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MenstrualHistory->Visible = FALSE; // Disable update for API request
			else
				$this->MenstrualHistory->setFormValue($val);
		}

		// Check field name 'SurgicalHistory' first before field var 'x_SurgicalHistory'
		$val = $CurrentForm->hasValue("SurgicalHistory") ? $CurrentForm->getValue("SurgicalHistory") : $CurrentForm->getValue("x_SurgicalHistory");
		if (!$this->SurgicalHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SurgicalHistory->Visible = FALSE; // Disable update for API request
			else
				$this->SurgicalHistory->setFormValue($val);
		}

		// Check field name 'PastHistory' first before field var 'x_PastHistory'
		$val = $CurrentForm->hasValue("PastHistory") ? $CurrentForm->getValue("PastHistory") : $CurrentForm->getValue("x_PastHistory");
		if (!$this->PastHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PastHistory->Visible = FALSE; // Disable update for API request
			else
				$this->PastHistory->setFormValue($val);
		}

		// Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
		$val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
		if (!$this->FamilyHistory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FamilyHistory->Visible = FALSE; // Disable update for API request
			else
				$this->FamilyHistory->setFormValue($val);
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

		// Check field name 'CNS' first before field var 'x_CNS'
		$val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
		if (!$this->CNS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CNS->Visible = FALSE; // Disable update for API request
			else
				$this->CNS->setFormValue($val);
		}

		// Check field name 'RS' first before field var 'x__RS'
		$val = $CurrentForm->hasValue("RS") ? $CurrentForm->getValue("RS") : $CurrentForm->getValue("x__RS");
		if (!$this->_RS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_RS->Visible = FALSE; // Disable update for API request
			else
				$this->_RS->setFormValue($val);
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

		// Check field name 'InvestigationReport' first before field var 'x_InvestigationReport'
		$val = $CurrentForm->hasValue("InvestigationReport") ? $CurrentForm->getValue("InvestigationReport") : $CurrentForm->getValue("x_InvestigationReport");
		if (!$this->InvestigationReport->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->InvestigationReport->Visible = FALSE; // Disable update for API request
			else
				$this->InvestigationReport->setFormValue($val);
		}

		// Check field name 'FinalDiagnosis' first before field var 'x_FinalDiagnosis'
		$val = $CurrentForm->hasValue("FinalDiagnosis") ? $CurrentForm->getValue("FinalDiagnosis") : $CurrentForm->getValue("x_FinalDiagnosis");
		if (!$this->FinalDiagnosis->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FinalDiagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->FinalDiagnosis->setFormValue($val);
		}

		// Check field name 'Treatment' first before field var 'x_Treatment'
		$val = $CurrentForm->hasValue("Treatment") ? $CurrentForm->getValue("Treatment") : $CurrentForm->getValue("x_Treatment");
		if (!$this->Treatment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Treatment->Visible = FALSE; // Disable update for API request
			else
				$this->Treatment->setFormValue($val);
		}

		// Check field name 'DetailOfOperation' first before field var 'x_DetailOfOperation'
		$val = $CurrentForm->hasValue("DetailOfOperation") ? $CurrentForm->getValue("DetailOfOperation") : $CurrentForm->getValue("x_DetailOfOperation");
		if (!$this->DetailOfOperation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DetailOfOperation->Visible = FALSE; // Disable update for API request
			else
				$this->DetailOfOperation->setFormValue($val);
		}

		// Check field name 'FollowUpAdvice' first before field var 'x_FollowUpAdvice'
		$val = $CurrentForm->hasValue("FollowUpAdvice") ? $CurrentForm->getValue("FollowUpAdvice") : $CurrentForm->getValue("x_FollowUpAdvice");
		if (!$this->FollowUpAdvice->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FollowUpAdvice->Visible = FALSE; // Disable update for API request
			else
				$this->FollowUpAdvice->setFormValue($val);
		}

		// Check field name 'FollowUpMedication' first before field var 'x_FollowUpMedication'
		$val = $CurrentForm->hasValue("FollowUpMedication") ? $CurrentForm->getValue("FollowUpMedication") : $CurrentForm->getValue("x_FollowUpMedication");
		if (!$this->FollowUpMedication->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FollowUpMedication->Visible = FALSE; // Disable update for API request
			else
				$this->FollowUpMedication->setFormValue($val);
		}

		// Check field name 'Plan' first before field var 'x_Plan'
		$val = $CurrentForm->hasValue("Plan") ? $CurrentForm->getValue("Plan") : $CurrentForm->getValue("x_Plan");
		if (!$this->Plan->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Plan->Visible = FALSE; // Disable update for API request
			else
				$this->Plan->setFormValue($val);
		}

		// Check field name 'TempleteFinalDiagnosis' first before field var 'x_TempleteFinalDiagnosis'
		$val = $CurrentForm->hasValue("TempleteFinalDiagnosis") ? $CurrentForm->getValue("TempleteFinalDiagnosis") : $CurrentForm->getValue("x_TempleteFinalDiagnosis");
		if (!$this->TempleteFinalDiagnosis->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TempleteFinalDiagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->TempleteFinalDiagnosis->setFormValue($val);
		}

		// Check field name 'TemplateTreatment' first before field var 'x_TemplateTreatment'
		$val = $CurrentForm->hasValue("TemplateTreatment") ? $CurrentForm->getValue("TemplateTreatment") : $CurrentForm->getValue("x_TemplateTreatment");
		if (!$this->TemplateTreatment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TemplateTreatment->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateTreatment->setFormValue($val);
		}

		// Check field name 'TemplateOperation' first before field var 'x_TemplateOperation'
		$val = $CurrentForm->hasValue("TemplateOperation") ? $CurrentForm->getValue("TemplateOperation") : $CurrentForm->getValue("x_TemplateOperation");
		if (!$this->TemplateOperation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TemplateOperation->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateOperation->setFormValue($val);
		}

		// Check field name 'TemplateFollowUpAdvice' first before field var 'x_TemplateFollowUpAdvice'
		$val = $CurrentForm->hasValue("TemplateFollowUpAdvice") ? $CurrentForm->getValue("TemplateFollowUpAdvice") : $CurrentForm->getValue("x_TemplateFollowUpAdvice");
		if (!$this->TemplateFollowUpAdvice->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TemplateFollowUpAdvice->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateFollowUpAdvice->setFormValue($val);
		}

		// Check field name 'TemplateFollowUpMedication' first before field var 'x_TemplateFollowUpMedication'
		$val = $CurrentForm->hasValue("TemplateFollowUpMedication") ? $CurrentForm->getValue("TemplateFollowUpMedication") : $CurrentForm->getValue("x_TemplateFollowUpMedication");
		if (!$this->TemplateFollowUpMedication->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TemplateFollowUpMedication->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateFollowUpMedication->setFormValue($val);
		}

		// Check field name 'TemplatePlan' first before field var 'x_TemplatePlan'
		$val = $CurrentForm->hasValue("TemplatePlan") ? $CurrentForm->getValue("TemplatePlan") : $CurrentForm->getValue("x_TemplatePlan");
		if (!$this->TemplatePlan->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TemplatePlan->Visible = FALSE; // Disable update for API request
			else
				$this->TemplatePlan->setFormValue($val);
		}

		// Check field name 'QRCode' first before field var 'x_QRCode'
		$val = $CurrentForm->hasValue("QRCode") ? $CurrentForm->getValue("QRCode") : $CurrentForm->getValue("x_QRCode");
		if (!$this->QRCode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->QRCode->Visible = FALSE; // Disable update for API request
			else
				$this->QRCode->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
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
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->SEX->CurrentValue = $this->SEX->FormValue;
		$this->Address->CurrentValue = $this->Address->FormValue;
		$this->DateofAdmission->CurrentValue = $this->DateofAdmission->FormValue;
		$this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 11);
		$this->DateofProcedure->CurrentValue = $this->DateofProcedure->FormValue;
		$this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 11);
		$this->DateofDischarge->CurrentValue = $this->DateofDischarge->FormValue;
		$this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 11);
		$this->Consultant->CurrentValue = $this->Consultant->FormValue;
		$this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
		$this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
		$this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
		$this->ProcedureDone->CurrentValue = $this->ProcedureDone->FormValue;
		$this->PROVISIONALDIAGNOSIS->CurrentValue = $this->PROVISIONALDIAGNOSIS->FormValue;
		$this->Chiefcomplaints->CurrentValue = $this->Chiefcomplaints->FormValue;
		$this->MaritallHistory->CurrentValue = $this->MaritallHistory->FormValue;
		$this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
		$this->SurgicalHistory->CurrentValue = $this->SurgicalHistory->FormValue;
		$this->PastHistory->CurrentValue = $this->PastHistory->FormValue;
		$this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
		$this->Temp->CurrentValue = $this->Temp->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->CNS->CurrentValue = $this->CNS->FormValue;
		$this->_RS->CurrentValue = $this->_RS->FormValue;
		$this->CVS->CurrentValue = $this->CVS->FormValue;
		$this->PA->CurrentValue = $this->PA->FormValue;
		$this->InvestigationReport->CurrentValue = $this->InvestigationReport->FormValue;
		$this->FinalDiagnosis->CurrentValue = $this->FinalDiagnosis->FormValue;
		$this->Treatment->CurrentValue = $this->Treatment->FormValue;
		$this->DetailOfOperation->CurrentValue = $this->DetailOfOperation->FormValue;
		$this->FollowUpAdvice->CurrentValue = $this->FollowUpAdvice->FormValue;
		$this->FollowUpMedication->CurrentValue = $this->FollowUpMedication->FormValue;
		$this->Plan->CurrentValue = $this->Plan->FormValue;
		$this->TempleteFinalDiagnosis->CurrentValue = $this->TempleteFinalDiagnosis->FormValue;
		$this->TemplateTreatment->CurrentValue = $this->TemplateTreatment->FormValue;
		$this->TemplateOperation->CurrentValue = $this->TemplateOperation->FormValue;
		$this->TemplateFollowUpAdvice->CurrentValue = $this->TemplateFollowUpAdvice->FormValue;
		$this->TemplateFollowUpMedication->CurrentValue = $this->TemplateFollowUpMedication->FormValue;
		$this->TemplatePlan->CurrentValue = $this->TemplatePlan->FormValue;
		$this->QRCode->CurrentValue = $this->QRCode->FormValue;
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
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->Age->setDbValue($row['Age']);
		$this->SEX->setDbValue($row['SEX']);
		$this->Address->setDbValue($row['Address']);
		$this->DateofAdmission->setDbValue($row['DateofAdmission']);
		$this->DateofProcedure->setDbValue($row['DateofProcedure']);
		$this->DateofDischarge->setDbValue($row['DateofDischarge']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anesthetist->setDbValue($row['Anesthetist']);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->ProcedureDone->setDbValue($row['ProcedureDone']);
		$this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
		$this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
		$this->MaritallHistory->setDbValue($row['MaritallHistory']);
		$this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
		$this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
		$this->PastHistory->setDbValue($row['PastHistory']);
		$this->FamilyHistory->setDbValue($row['FamilyHistory']);
		$this->Temp->setDbValue($row['Temp']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->BP->setDbValue($row['BP']);
		$this->CNS->setDbValue($row['CNS']);
		$this->_RS->setDbValue($row['RS']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->InvestigationReport->setDbValue($row['InvestigationReport']);
		$this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
		$this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
		$this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
		$this->Plan->setDbValue($row['Plan']);
		$this->TempleteFinalDiagnosis->setDbValue($row['TempleteFinalDiagnosis']);
		$this->TemplateTreatment->setDbValue($row['TemplateTreatment']);
		$this->TemplateOperation->setDbValue($row['TemplateOperation']);
		$this->TemplateFollowUpAdvice->setDbValue($row['TemplateFollowUpAdvice']);
		$this->TemplateFollowUpMedication->setDbValue($row['TemplateFollowUpMedication']);
		$this->TemplatePlan->setDbValue($row['TemplatePlan']);
		$this->QRCode->setDbValue($row['QRCode']);
		$this->TidNo->setDbValue($row['TidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['SEX'] = NULL;
		$row['Address'] = NULL;
		$row['DateofAdmission'] = NULL;
		$row['DateofProcedure'] = NULL;
		$row['DateofDischarge'] = NULL;
		$row['Consultant'] = NULL;
		$row['Surgeon'] = NULL;
		$row['Anesthetist'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['ProcedureDone'] = NULL;
		$row['PROVISIONALDIAGNOSIS'] = NULL;
		$row['Chiefcomplaints'] = NULL;
		$row['MaritallHistory'] = NULL;
		$row['MenstrualHistory'] = NULL;
		$row['SurgicalHistory'] = NULL;
		$row['PastHistory'] = NULL;
		$row['FamilyHistory'] = NULL;
		$row['Temp'] = NULL;
		$row['Pulse'] = NULL;
		$row['BP'] = NULL;
		$row['CNS'] = NULL;
		$row['RS'] = NULL;
		$row['CVS'] = NULL;
		$row['PA'] = NULL;
		$row['InvestigationReport'] = NULL;
		$row['FinalDiagnosis'] = NULL;
		$row['Treatment'] = NULL;
		$row['DetailOfOperation'] = NULL;
		$row['FollowUpAdvice'] = NULL;
		$row['FollowUpMedication'] = NULL;
		$row['Plan'] = NULL;
		$row['TempleteFinalDiagnosis'] = NULL;
		$row['TemplateTreatment'] = NULL;
		$row['TemplateOperation'] = NULL;
		$row['TemplateFollowUpAdvice'] = NULL;
		$row['TemplateFollowUpMedication'] = NULL;
		$row['TemplatePlan'] = NULL;
		$row['QRCode'] = NULL;
		$row['TidNo'] = NULL;
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
		// RIDNO
		// Name
		// Age
		// SEX
		// Address
		// DateofAdmission
		// DateofProcedure
		// DateofDischarge
		// Consultant
		// Surgeon
		// Anesthetist
		// IdentificationMark
		// ProcedureDone
		// PROVISIONALDIAGNOSIS
		// Chiefcomplaints
		// MaritallHistory
		// MenstrualHistory
		// SurgicalHistory
		// PastHistory
		// FamilyHistory
		// Temp
		// Pulse
		// BP
		// CNS
		// RS
		// CVS
		// PA
		// InvestigationReport
		// FinalDiagnosis
		// Treatment
		// DetailOfOperation
		// FollowUpAdvice
		// FollowUpMedication
		// Plan
		// TempleteFinalDiagnosis
		// TemplateTreatment
		// TemplateOperation
		// TemplateFollowUpAdvice
		// TemplateFollowUpMedication
		// TemplatePlan
		// QRCode
		// TidNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal != "") {
				$this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Name->ViewValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->ViewValue = $this->Name->CurrentValue;
					}
				}
			} else {
				$this->Name->ViewValue = NULL;
			}
			$this->Name->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// SEX
			$this->SEX->ViewValue = $this->SEX->CurrentValue;
			$this->SEX->ViewCustomAttributes = "";

			// Address
			$this->Address->ViewValue = $this->Address->CurrentValue;
			$this->Address->ViewCustomAttributes = "";

			// DateofAdmission
			$this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
			$this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 11);
			$this->DateofAdmission->ViewCustomAttributes = "";

			// DateofProcedure
			$this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
			$this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 11);
			$this->DateofProcedure->ViewCustomAttributes = "";

			// DateofDischarge
			$this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
			$this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 11);
			$this->DateofDischarge->ViewCustomAttributes = "";

			// Consultant
			$curVal = strval($this->Consultant->CurrentValue);
			if ($curVal != "") {
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
				if ($this->Consultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Consultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
					}
				}
			} else {
				$this->Consultant->ViewValue = NULL;
			}
			$this->Consultant->ViewCustomAttributes = "";

			// Surgeon
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal != "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
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

			// Anesthetist
			$curVal = strval($this->Anesthetist->CurrentValue);
			if ($curVal != "") {
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
				if ($this->Anesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anesthetist->ViewValue = NULL;
			}
			$this->Anesthetist->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// ProcedureDone
			$this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
			$this->ProcedureDone->ViewCustomAttributes = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
			$this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
			$this->Chiefcomplaints->ViewCustomAttributes = "";

			// MaritallHistory
			$this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
			$this->MaritallHistory->ViewCustomAttributes = "";

			// MenstrualHistory
			$this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
			$this->MenstrualHistory->ViewCustomAttributes = "";

			// SurgicalHistory
			$this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
			$this->SurgicalHistory->ViewCustomAttributes = "";

			// PastHistory
			$this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
			$this->PastHistory->ViewCustomAttributes = "";

			// FamilyHistory
			$this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
			$this->FamilyHistory->ViewCustomAttributes = "";

			// Temp
			$this->Temp->ViewValue = $this->Temp->CurrentValue;
			$this->Temp->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// CNS
			$this->CNS->ViewValue = $this->CNS->CurrentValue;
			$this->CNS->ViewCustomAttributes = "";

			// RS
			$this->_RS->ViewValue = $this->_RS->CurrentValue;
			$this->_RS->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// InvestigationReport
			$this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
			$this->InvestigationReport->ViewCustomAttributes = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
			$this->FinalDiagnosis->ViewCustomAttributes = "";

			// Treatment
			$this->Treatment->ViewValue = $this->Treatment->CurrentValue;
			$this->Treatment->ViewCustomAttributes = "";

			// DetailOfOperation
			$this->DetailOfOperation->ViewValue = $this->DetailOfOperation->CurrentValue;
			$this->DetailOfOperation->ViewCustomAttributes = "";

			// FollowUpAdvice
			$this->FollowUpAdvice->ViewValue = $this->FollowUpAdvice->CurrentValue;
			$this->FollowUpAdvice->ViewCustomAttributes = "";

			// FollowUpMedication
			$this->FollowUpMedication->ViewValue = $this->FollowUpMedication->CurrentValue;
			$this->FollowUpMedication->ViewCustomAttributes = "";

			// Plan
			$this->Plan->ViewValue = $this->Plan->CurrentValue;
			$this->Plan->ViewCustomAttributes = "";

			// TempleteFinalDiagnosis
			$curVal = strval($this->TempleteFinalDiagnosis->CurrentValue);
			if ($curVal != "") {
				$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->lookupCacheOption($curVal);
				if ($this->TempleteFinalDiagnosis->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='TemplateDiagnosis'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TempleteFinalDiagnosis->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->CurrentValue;
					}
				}
			} else {
				$this->TempleteFinalDiagnosis->ViewValue = NULL;
			}
			$this->TempleteFinalDiagnosis->ViewCustomAttributes = "";

			// TemplateTreatment
			$curVal = strval($this->TemplateTreatment->CurrentValue);
			if ($curVal != "") {
				$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->lookupCacheOption($curVal);
				if ($this->TemplateTreatment->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Treatment'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateTreatment->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->CurrentValue;
					}
				}
			} else {
				$this->TemplateTreatment->ViewValue = NULL;
			}
			$this->TemplateTreatment->ViewCustomAttributes = "";

			// TemplateOperation
			$curVal = strval($this->TemplateOperation->CurrentValue);
			if ($curVal != "") {
				$this->TemplateOperation->ViewValue = $this->TemplateOperation->lookupCacheOption($curVal);
				if ($this->TemplateOperation->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Operation'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateOperation->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateOperation->ViewValue = $this->TemplateOperation->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateOperation->ViewValue = $this->TemplateOperation->CurrentValue;
					}
				}
			} else {
				$this->TemplateOperation->ViewValue = NULL;
			}
			$this->TemplateOperation->ViewCustomAttributes = "";

			// TemplateFollowUpAdvice
			$curVal = strval($this->TemplateFollowUpAdvice->CurrentValue);
			if ($curVal != "") {
				$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->lookupCacheOption($curVal);
				if ($this->TemplateFollowUpAdvice->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpAdvice '";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateFollowUpAdvice->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->CurrentValue;
					}
				}
			} else {
				$this->TemplateFollowUpAdvice->ViewValue = NULL;
			}
			$this->TemplateFollowUpAdvice->ViewCustomAttributes = "";

			// TemplateFollowUpMedication
			$curVal = strval($this->TemplateFollowUpMedication->CurrentValue);
			if ($curVal != "") {
				$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->lookupCacheOption($curVal);
				if ($this->TemplateFollowUpMedication->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpMedication'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateFollowUpMedication->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->CurrentValue;
					}
				}
			} else {
				$this->TemplateFollowUpMedication->ViewValue = NULL;
			}
			$this->TemplateFollowUpMedication->ViewCustomAttributes = "";

			// TemplatePlan
			$curVal = strval($this->TemplatePlan->CurrentValue);
			if ($curVal != "") {
				$this->TemplatePlan->ViewValue = $this->TemplatePlan->lookupCacheOption($curVal);
				if ($this->TemplatePlan->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='TemplatePlan'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplatePlan->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplatePlan->ViewValue = $this->TemplatePlan->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplatePlan->ViewValue = $this->TemplatePlan->CurrentValue;
					}
				}
			} else {
				$this->TemplatePlan->ViewValue = NULL;
			}
			$this->TemplatePlan->ViewCustomAttributes = "";

			// QRCode
			$this->QRCode->ViewValue = $this->QRCode->CurrentValue;
			$this->QRCode->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);
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

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";
			$this->Address->TooltipValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";
			$this->DateofAdmission->TooltipValue = "";

			// DateofProcedure
			$this->DateofProcedure->LinkCustomAttributes = "";
			$this->DateofProcedure->HrefValue = "";
			$this->DateofProcedure->TooltipValue = "";

			// DateofDischarge
			$this->DateofDischarge->LinkCustomAttributes = "";
			$this->DateofDischarge->HrefValue = "";
			$this->DateofDischarge->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";
			$this->Anesthetist->TooltipValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// ProcedureDone
			$this->ProcedureDone->LinkCustomAttributes = "";
			$this->ProcedureDone->HrefValue = "";
			$this->ProcedureDone->TooltipValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";
			$this->PROVISIONALDIAGNOSIS->TooltipValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";
			$this->Chiefcomplaints->TooltipValue = "";

			// MaritallHistory
			$this->MaritallHistory->LinkCustomAttributes = "";
			$this->MaritallHistory->HrefValue = "";
			$this->MaritallHistory->TooltipValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";
			$this->MenstrualHistory->TooltipValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";
			$this->SurgicalHistory->TooltipValue = "";

			// PastHistory
			$this->PastHistory->LinkCustomAttributes = "";
			$this->PastHistory->HrefValue = "";
			$this->PastHistory->TooltipValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";
			$this->FamilyHistory->TooltipValue = "";

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

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";
			$this->CNS->TooltipValue = "";

			// RS
			$this->_RS->LinkCustomAttributes = "";
			$this->_RS->HrefValue = "";
			$this->_RS->TooltipValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";

			// InvestigationReport
			$this->InvestigationReport->LinkCustomAttributes = "";
			$this->InvestigationReport->HrefValue = "";
			$this->InvestigationReport->TooltipValue = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->LinkCustomAttributes = "";
			$this->FinalDiagnosis->HrefValue = "";
			$this->FinalDiagnosis->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// DetailOfOperation
			$this->DetailOfOperation->LinkCustomAttributes = "";
			$this->DetailOfOperation->HrefValue = "";
			$this->DetailOfOperation->TooltipValue = "";

			// FollowUpAdvice
			$this->FollowUpAdvice->LinkCustomAttributes = "";
			$this->FollowUpAdvice->HrefValue = "";
			$this->FollowUpAdvice->TooltipValue = "";

			// FollowUpMedication
			$this->FollowUpMedication->LinkCustomAttributes = "";
			$this->FollowUpMedication->HrefValue = "";
			$this->FollowUpMedication->TooltipValue = "";

			// Plan
			$this->Plan->LinkCustomAttributes = "";
			$this->Plan->HrefValue = "";
			$this->Plan->TooltipValue = "";

			// TempleteFinalDiagnosis
			$this->TempleteFinalDiagnosis->LinkCustomAttributes = "";
			$this->TempleteFinalDiagnosis->HrefValue = "";
			$this->TempleteFinalDiagnosis->TooltipValue = "";

			// TemplateTreatment
			$this->TemplateTreatment->LinkCustomAttributes = "";
			$this->TemplateTreatment->HrefValue = "";
			$this->TemplateTreatment->TooltipValue = "";

			// TemplateOperation
			$this->TemplateOperation->LinkCustomAttributes = "";
			$this->TemplateOperation->HrefValue = "";
			$this->TemplateOperation->TooltipValue = "";

			// TemplateFollowUpAdvice
			$this->TemplateFollowUpAdvice->LinkCustomAttributes = "";
			$this->TemplateFollowUpAdvice->HrefValue = "";
			$this->TemplateFollowUpAdvice->TooltipValue = "";

			// TemplateFollowUpMedication
			$this->TemplateFollowUpMedication->LinkCustomAttributes = "";
			$this->TemplateFollowUpMedication->HrefValue = "";
			$this->TemplateFollowUpMedication->TooltipValue = "";

			// TemplatePlan
			$this->TemplatePlan->LinkCustomAttributes = "";
			$this->TemplatePlan->HrefValue = "";
			$this->TemplatePlan->TooltipValue = "";

			// QRCode
			$this->QRCode->LinkCustomAttributes = "";
			$this->QRCode->HrefValue = "";
			$this->QRCode->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'QRCODE', 80);
			$this->QRCode->TooltipValue = "";

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

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (!$this->Name->Raw)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$curVal = strval($this->Name->CurrentValue);
			if ($curVal != "") {
				$this->Name->EditValue = $this->Name->lookupCacheOption($curVal);
				if ($this->Name->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Name->EditValue = $this->Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
					}
				}
			} else {
				$this->Name->EditValue = NULL;
			}
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// SEX
			$this->SEX->EditAttrs["class"] = "form-control";
			$this->SEX->EditCustomAttributes = "";
			if (!$this->SEX->Raw)
				$this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
			$this->SEX->EditValue = HtmlEncode($this->SEX->CurrentValue);
			$this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

			// Address
			$this->Address->EditAttrs["class"] = "form-control";
			$this->Address->EditCustomAttributes = "";
			if (!$this->Address->Raw)
				$this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
			$this->Address->EditValue = HtmlEncode($this->Address->CurrentValue);
			$this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

			// DateofAdmission
			$this->DateofAdmission->EditAttrs["class"] = "form-control";
			$this->DateofAdmission->EditCustomAttributes = "";
			$this->DateofAdmission->EditValue = HtmlEncode(FormatDateTime($this->DateofAdmission->CurrentValue, 11));
			$this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

			// DateofProcedure
			$this->DateofProcedure->EditAttrs["class"] = "form-control";
			$this->DateofProcedure->EditCustomAttributes = "";
			$this->DateofProcedure->EditValue = HtmlEncode(FormatDateTime($this->DateofProcedure->CurrentValue, 11));
			$this->DateofProcedure->PlaceHolder = RemoveHtml($this->DateofProcedure->caption());

			// DateofDischarge
			$this->DateofDischarge->EditAttrs["class"] = "form-control";
			$this->DateofDischarge->EditCustomAttributes = "";
			$this->DateofDischarge->EditValue = HtmlEncode(FormatDateTime($this->DateofDischarge->CurrentValue, 11));
			$this->DateofDischarge->PlaceHolder = RemoveHtml($this->DateofDischarge->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->Consultant->CurrentValue));
			if ($curVal != "")
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
			else
				$this->Consultant->ViewValue = $this->Consultant->Lookup !== NULL && is_array($this->Consultant->Lookup->Options) ? $curVal : NULL;
			if ($this->Consultant->ViewValue !== NULL) { // Load from cache
				$this->Consultant->EditValue = array_values($this->Consultant->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Consultant->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Consultant->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Consultant->EditValue = $arwrk;
			}

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			$curVal = trim(strval($this->Surgeon->CurrentValue));
			if ($curVal != "")
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			else
				$this->Surgeon->ViewValue = $this->Surgeon->Lookup !== NULL && is_array($this->Surgeon->Lookup->Options) ? $curVal : NULL;
			if ($this->Surgeon->ViewValue !== NULL) { // Load from cache
				$this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Surgeon->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Surgeon->EditValue = $arwrk;
			}

			// Anesthetist
			$this->Anesthetist->EditAttrs["class"] = "form-control";
			$this->Anesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anesthetist->CurrentValue));
			if ($curVal != "")
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
			else
				$this->Anesthetist->ViewValue = $this->Anesthetist->Lookup !== NULL && is_array($this->Anesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anesthetist->EditValue = array_values($this->Anesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Anesthetist->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Anesthetist->EditValue = $arwrk;
			}

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (!$this->IdentificationMark->Raw)
				$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// ProcedureDone
			$this->ProcedureDone->EditAttrs["class"] = "form-control";
			$this->ProcedureDone->EditCustomAttributes = "";
			if (!$this->ProcedureDone->Raw)
				$this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
			$this->ProcedureDone->EditValue = HtmlEncode($this->ProcedureDone->CurrentValue);
			$this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
			$this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
			if (!$this->PROVISIONALDIAGNOSIS->Raw)
				$this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->EditValue = HtmlEncode($this->PROVISIONALDIAGNOSIS->CurrentValue);
			$this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

			// Chiefcomplaints
			$this->Chiefcomplaints->EditAttrs["class"] = "form-control";
			$this->Chiefcomplaints->EditCustomAttributes = "";
			if (!$this->Chiefcomplaints->Raw)
				$this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->EditValue = HtmlEncode($this->Chiefcomplaints->CurrentValue);
			$this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

			// MaritallHistory
			$this->MaritallHistory->EditAttrs["class"] = "form-control";
			$this->MaritallHistory->EditCustomAttributes = "";
			if (!$this->MaritallHistory->Raw)
				$this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
			$this->MaritallHistory->EditValue = HtmlEncode($this->MaritallHistory->CurrentValue);
			$this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

			// MenstrualHistory
			$this->MenstrualHistory->EditAttrs["class"] = "form-control";
			$this->MenstrualHistory->EditCustomAttributes = "";
			if (!$this->MenstrualHistory->Raw)
				$this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
			$this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

			// SurgicalHistory
			$this->SurgicalHistory->EditAttrs["class"] = "form-control";
			$this->SurgicalHistory->EditCustomAttributes = "";
			if (!$this->SurgicalHistory->Raw)
				$this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
			$this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

			// PastHistory
			$this->PastHistory->EditAttrs["class"] = "form-control";
			$this->PastHistory->EditCustomAttributes = "";
			if (!$this->PastHistory->Raw)
				$this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
			$this->PastHistory->EditValue = HtmlEncode($this->PastHistory->CurrentValue);
			$this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

			// FamilyHistory
			$this->FamilyHistory->EditAttrs["class"] = "form-control";
			$this->FamilyHistory->EditCustomAttributes = "";
			if (!$this->FamilyHistory->Raw)
				$this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
			$this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

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

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (!$this->CNS->Raw)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RS
			$this->_RS->EditAttrs["class"] = "form-control";
			$this->_RS->EditCustomAttributes = "";
			if (!$this->_RS->Raw)
				$this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
			$this->_RS->EditValue = HtmlEncode($this->_RS->CurrentValue);
			$this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

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

			// InvestigationReport
			$this->InvestigationReport->EditAttrs["class"] = "form-control";
			$this->InvestigationReport->EditCustomAttributes = "";
			$this->InvestigationReport->EditValue = HtmlEncode($this->InvestigationReport->CurrentValue);
			$this->InvestigationReport->PlaceHolder = RemoveHtml($this->InvestigationReport->caption());

			// FinalDiagnosis
			$this->FinalDiagnosis->EditAttrs["class"] = "form-control";
			$this->FinalDiagnosis->EditCustomAttributes = "";
			$this->FinalDiagnosis->EditValue = HtmlEncode($this->FinalDiagnosis->CurrentValue);
			$this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			$this->Treatment->EditValue = HtmlEncode($this->Treatment->CurrentValue);
			$this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

			// DetailOfOperation
			$this->DetailOfOperation->EditAttrs["class"] = "form-control";
			$this->DetailOfOperation->EditCustomAttributes = "";
			$this->DetailOfOperation->EditValue = HtmlEncode($this->DetailOfOperation->CurrentValue);
			$this->DetailOfOperation->PlaceHolder = RemoveHtml($this->DetailOfOperation->caption());

			// FollowUpAdvice
			$this->FollowUpAdvice->EditAttrs["class"] = "form-control";
			$this->FollowUpAdvice->EditCustomAttributes = "";
			$this->FollowUpAdvice->EditValue = HtmlEncode($this->FollowUpAdvice->CurrentValue);
			$this->FollowUpAdvice->PlaceHolder = RemoveHtml($this->FollowUpAdvice->caption());

			// FollowUpMedication
			$this->FollowUpMedication->EditAttrs["class"] = "form-control";
			$this->FollowUpMedication->EditCustomAttributes = "";
			$this->FollowUpMedication->EditValue = HtmlEncode($this->FollowUpMedication->CurrentValue);
			$this->FollowUpMedication->PlaceHolder = RemoveHtml($this->FollowUpMedication->caption());

			// Plan
			$this->Plan->EditAttrs["class"] = "form-control";
			$this->Plan->EditCustomAttributes = "";
			$this->Plan->EditValue = HtmlEncode($this->Plan->CurrentValue);
			$this->Plan->PlaceHolder = RemoveHtml($this->Plan->caption());

			// TempleteFinalDiagnosis
			$this->TempleteFinalDiagnosis->EditAttrs["class"] = "form-control";
			$this->TempleteFinalDiagnosis->EditCustomAttributes = "";
			$curVal = trim(strval($this->TempleteFinalDiagnosis->CurrentValue));
			if ($curVal != "")
				$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->lookupCacheOption($curVal);
			else
				$this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->Lookup !== NULL && is_array($this->TempleteFinalDiagnosis->Lookup->Options) ? $curVal : NULL;
			if ($this->TempleteFinalDiagnosis->ViewValue !== NULL) { // Load from cache
				$this->TempleteFinalDiagnosis->EditValue = array_values($this->TempleteFinalDiagnosis->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TempleteFinalDiagnosis->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='TemplateDiagnosis'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TempleteFinalDiagnosis->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TempleteFinalDiagnosis->EditValue = $arwrk;
			}

			// TemplateTreatment
			$this->TemplateTreatment->EditAttrs["class"] = "form-control";
			$this->TemplateTreatment->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateTreatment->CurrentValue));
			if ($curVal != "")
				$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->lookupCacheOption($curVal);
			else
				$this->TemplateTreatment->ViewValue = $this->TemplateTreatment->Lookup !== NULL && is_array($this->TemplateTreatment->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateTreatment->ViewValue !== NULL) { // Load from cache
				$this->TemplateTreatment->EditValue = array_values($this->TemplateTreatment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateTreatment->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Treatment'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateTreatment->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplateTreatment->EditValue = $arwrk;
			}

			// TemplateOperation
			$this->TemplateOperation->EditAttrs["class"] = "form-control";
			$this->TemplateOperation->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateOperation->CurrentValue));
			if ($curVal != "")
				$this->TemplateOperation->ViewValue = $this->TemplateOperation->lookupCacheOption($curVal);
			else
				$this->TemplateOperation->ViewValue = $this->TemplateOperation->Lookup !== NULL && is_array($this->TemplateOperation->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateOperation->ViewValue !== NULL) { // Load from cache
				$this->TemplateOperation->EditValue = array_values($this->TemplateOperation->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateOperation->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Operation'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateOperation->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplateOperation->EditValue = $arwrk;
			}

			// TemplateFollowUpAdvice
			$this->TemplateFollowUpAdvice->EditAttrs["class"] = "form-control";
			$this->TemplateFollowUpAdvice->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateFollowUpAdvice->CurrentValue));
			if ($curVal != "")
				$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->lookupCacheOption($curVal);
			else
				$this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->Lookup !== NULL && is_array($this->TemplateFollowUpAdvice->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateFollowUpAdvice->ViewValue !== NULL) { // Load from cache
				$this->TemplateFollowUpAdvice->EditValue = array_values($this->TemplateFollowUpAdvice->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFollowUpAdvice->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='FollowUpAdvice '";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFollowUpAdvice->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplateFollowUpAdvice->EditValue = $arwrk;
			}

			// TemplateFollowUpMedication
			$this->TemplateFollowUpMedication->EditAttrs["class"] = "form-control";
			$this->TemplateFollowUpMedication->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateFollowUpMedication->CurrentValue));
			if ($curVal != "")
				$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->lookupCacheOption($curVal);
			else
				$this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->Lookup !== NULL && is_array($this->TemplateFollowUpMedication->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateFollowUpMedication->ViewValue !== NULL) { // Load from cache
				$this->TemplateFollowUpMedication->EditValue = array_values($this->TemplateFollowUpMedication->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFollowUpMedication->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='FollowUpMedication'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateFollowUpMedication->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplateFollowUpMedication->EditValue = $arwrk;
			}

			// TemplatePlan
			$this->TemplatePlan->EditAttrs["class"] = "form-control";
			$this->TemplatePlan->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplatePlan->CurrentValue));
			if ($curVal != "")
				$this->TemplatePlan->ViewValue = $this->TemplatePlan->lookupCacheOption($curVal);
			else
				$this->TemplatePlan->ViewValue = $this->TemplatePlan->Lookup !== NULL && is_array($this->TemplatePlan->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplatePlan->ViewValue !== NULL) { // Load from cache
				$this->TemplatePlan->EditValue = array_values($this->TemplatePlan->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplatePlan->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='TemplatePlan'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplatePlan->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplatePlan->EditValue = $arwrk;
			}

			// QRCode
			$this->QRCode->EditAttrs["class"] = "form-control";
			$this->QRCode->EditCustomAttributes = "";
			$this->QRCode->EditValue = HtmlEncode($this->QRCode->CurrentValue);
			$this->QRCode->PlaceHolder = RemoveHtml($this->QRCode->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// SEX
			$this->SEX->LinkCustomAttributes = "";
			$this->SEX->HrefValue = "";

			// Address
			$this->Address->LinkCustomAttributes = "";
			$this->Address->HrefValue = "";

			// DateofAdmission
			$this->DateofAdmission->LinkCustomAttributes = "";
			$this->DateofAdmission->HrefValue = "";

			// DateofProcedure
			$this->DateofProcedure->LinkCustomAttributes = "";
			$this->DateofProcedure->HrefValue = "";

			// DateofDischarge
			$this->DateofDischarge->LinkCustomAttributes = "";
			$this->DateofDischarge->HrefValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";

			// ProcedureDone
			$this->ProcedureDone->LinkCustomAttributes = "";
			$this->ProcedureDone->HrefValue = "";

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
			$this->PROVISIONALDIAGNOSIS->HrefValue = "";

			// Chiefcomplaints
			$this->Chiefcomplaints->LinkCustomAttributes = "";
			$this->Chiefcomplaints->HrefValue = "";

			// MaritallHistory
			$this->MaritallHistory->LinkCustomAttributes = "";
			$this->MaritallHistory->HrefValue = "";

			// MenstrualHistory
			$this->MenstrualHistory->LinkCustomAttributes = "";
			$this->MenstrualHistory->HrefValue = "";

			// SurgicalHistory
			$this->SurgicalHistory->LinkCustomAttributes = "";
			$this->SurgicalHistory->HrefValue = "";

			// PastHistory
			$this->PastHistory->LinkCustomAttributes = "";
			$this->PastHistory->HrefValue = "";

			// FamilyHistory
			$this->FamilyHistory->LinkCustomAttributes = "";
			$this->FamilyHistory->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RS
			$this->_RS->LinkCustomAttributes = "";
			$this->_RS->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// InvestigationReport
			$this->InvestigationReport->LinkCustomAttributes = "";
			$this->InvestigationReport->HrefValue = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->LinkCustomAttributes = "";
			$this->FinalDiagnosis->HrefValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";

			// DetailOfOperation
			$this->DetailOfOperation->LinkCustomAttributes = "";
			$this->DetailOfOperation->HrefValue = "";

			// FollowUpAdvice
			$this->FollowUpAdvice->LinkCustomAttributes = "";
			$this->FollowUpAdvice->HrefValue = "";

			// FollowUpMedication
			$this->FollowUpMedication->LinkCustomAttributes = "";
			$this->FollowUpMedication->HrefValue = "";

			// Plan
			$this->Plan->LinkCustomAttributes = "";
			$this->Plan->HrefValue = "";

			// TempleteFinalDiagnosis
			$this->TempleteFinalDiagnosis->LinkCustomAttributes = "";
			$this->TempleteFinalDiagnosis->HrefValue = "";

			// TemplateTreatment
			$this->TemplateTreatment->LinkCustomAttributes = "";
			$this->TemplateTreatment->HrefValue = "";

			// TemplateOperation
			$this->TemplateOperation->LinkCustomAttributes = "";
			$this->TemplateOperation->HrefValue = "";

			// TemplateFollowUpAdvice
			$this->TemplateFollowUpAdvice->LinkCustomAttributes = "";
			$this->TemplateFollowUpAdvice->HrefValue = "";

			// TemplateFollowUpMedication
			$this->TemplateFollowUpMedication->LinkCustomAttributes = "";
			$this->TemplateFollowUpMedication->HrefValue = "";

			// TemplatePlan
			$this->TemplatePlan->LinkCustomAttributes = "";
			$this->TemplatePlan->HrefValue = "";

			// QRCode
			$this->QRCode->LinkCustomAttributes = "";
			$this->QRCode->HrefValue = "";
			$this->QRCode->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'QRCODE', 80);

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
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
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNO->FormValue)) {
			AddMessage($FormError, $this->RIDNO->errorMessage());
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->SEX->Required) {
			if (!$this->SEX->IsDetailKey && $this->SEX->FormValue != NULL && $this->SEX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SEX->caption(), $this->SEX->RequiredErrorMessage));
			}
		}
		if ($this->Address->Required) {
			if (!$this->Address->IsDetailKey && $this->Address->FormValue != NULL && $this->Address->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
			}
		}
		if ($this->DateofAdmission->Required) {
			if (!$this->DateofAdmission->IsDetailKey && $this->DateofAdmission->FormValue != NULL && $this->DateofAdmission->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofAdmission->caption(), $this->DateofAdmission->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DateofAdmission->FormValue)) {
			AddMessage($FormError, $this->DateofAdmission->errorMessage());
		}
		if ($this->DateofProcedure->Required) {
			if (!$this->DateofProcedure->IsDetailKey && $this->DateofProcedure->FormValue != NULL && $this->DateofProcedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofProcedure->caption(), $this->DateofProcedure->RequiredErrorMessage));
			}
		}
		if ($this->DateofDischarge->Required) {
			if (!$this->DateofDischarge->IsDetailKey && $this->DateofDischarge->FormValue != NULL && $this->DateofDischarge->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateofDischarge->caption(), $this->DateofDischarge->RequiredErrorMessage));
			}
		}
		if ($this->Consultant->Required) {
			if (!$this->Consultant->IsDetailKey && $this->Consultant->FormValue != NULL && $this->Consultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
			}
		}
		if ($this->Surgeon->Required) {
			if (!$this->Surgeon->IsDetailKey && $this->Surgeon->FormValue != NULL && $this->Surgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
			}
		}
		if ($this->Anesthetist->Required) {
			if (!$this->Anesthetist->IsDetailKey && $this->Anesthetist->FormValue != NULL && $this->Anesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
			}
		}
		if ($this->IdentificationMark->Required) {
			if (!$this->IdentificationMark->IsDetailKey && $this->IdentificationMark->FormValue != NULL && $this->IdentificationMark->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureDone->Required) {
			if (!$this->ProcedureDone->IsDetailKey && $this->ProcedureDone->FormValue != NULL && $this->ProcedureDone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureDone->caption(), $this->ProcedureDone->RequiredErrorMessage));
			}
		}
		if ($this->PROVISIONALDIAGNOSIS->Required) {
			if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey && $this->PROVISIONALDIAGNOSIS->FormValue != NULL && $this->PROVISIONALDIAGNOSIS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PROVISIONALDIAGNOSIS->caption(), $this->PROVISIONALDIAGNOSIS->RequiredErrorMessage));
			}
		}
		if ($this->Chiefcomplaints->Required) {
			if (!$this->Chiefcomplaints->IsDetailKey && $this->Chiefcomplaints->FormValue != NULL && $this->Chiefcomplaints->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Chiefcomplaints->caption(), $this->Chiefcomplaints->RequiredErrorMessage));
			}
		}
		if ($this->MaritallHistory->Required) {
			if (!$this->MaritallHistory->IsDetailKey && $this->MaritallHistory->FormValue != NULL && $this->MaritallHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaritallHistory->caption(), $this->MaritallHistory->RequiredErrorMessage));
			}
		}
		if ($this->MenstrualHistory->Required) {
			if (!$this->MenstrualHistory->IsDetailKey && $this->MenstrualHistory->FormValue != NULL && $this->MenstrualHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
			}
		}
		if ($this->SurgicalHistory->Required) {
			if (!$this->SurgicalHistory->IsDetailKey && $this->SurgicalHistory->FormValue != NULL && $this->SurgicalHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurgicalHistory->caption(), $this->SurgicalHistory->RequiredErrorMessage));
			}
		}
		if ($this->PastHistory->Required) {
			if (!$this->PastHistory->IsDetailKey && $this->PastHistory->FormValue != NULL && $this->PastHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PastHistory->caption(), $this->PastHistory->RequiredErrorMessage));
			}
		}
		if ($this->FamilyHistory->Required) {
			if (!$this->FamilyHistory->IsDetailKey && $this->FamilyHistory->FormValue != NULL && $this->FamilyHistory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
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
		if ($this->CNS->Required) {
			if (!$this->CNS->IsDetailKey && $this->CNS->FormValue != NULL && $this->CNS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
			}
		}
		if ($this->_RS->Required) {
			if (!$this->_RS->IsDetailKey && $this->_RS->FormValue != NULL && $this->_RS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_RS->caption(), $this->_RS->RequiredErrorMessage));
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
		if ($this->InvestigationReport->Required) {
			if (!$this->InvestigationReport->IsDetailKey && $this->InvestigationReport->FormValue != NULL && $this->InvestigationReport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InvestigationReport->caption(), $this->InvestigationReport->RequiredErrorMessage));
			}
		}
		if ($this->FinalDiagnosis->Required) {
			if (!$this->FinalDiagnosis->IsDetailKey && $this->FinalDiagnosis->FormValue != NULL && $this->FinalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FinalDiagnosis->caption(), $this->FinalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->Treatment->Required) {
			if (!$this->Treatment->IsDetailKey && $this->Treatment->FormValue != NULL && $this->Treatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
			}
		}
		if ($this->DetailOfOperation->Required) {
			if (!$this->DetailOfOperation->IsDetailKey && $this->DetailOfOperation->FormValue != NULL && $this->DetailOfOperation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DetailOfOperation->caption(), $this->DetailOfOperation->RequiredErrorMessage));
			}
		}
		if ($this->FollowUpAdvice->Required) {
			if (!$this->FollowUpAdvice->IsDetailKey && $this->FollowUpAdvice->FormValue != NULL && $this->FollowUpAdvice->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowUpAdvice->caption(), $this->FollowUpAdvice->RequiredErrorMessage));
			}
		}
		if ($this->FollowUpMedication->Required) {
			if (!$this->FollowUpMedication->IsDetailKey && $this->FollowUpMedication->FormValue != NULL && $this->FollowUpMedication->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowUpMedication->caption(), $this->FollowUpMedication->RequiredErrorMessage));
			}
		}
		if ($this->Plan->Required) {
			if (!$this->Plan->IsDetailKey && $this->Plan->FormValue != NULL && $this->Plan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Plan->caption(), $this->Plan->RequiredErrorMessage));
			}
		}
		if ($this->TempleteFinalDiagnosis->Required) {
			if (!$this->TempleteFinalDiagnosis->IsDetailKey && $this->TempleteFinalDiagnosis->FormValue != NULL && $this->TempleteFinalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TempleteFinalDiagnosis->caption(), $this->TempleteFinalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->TemplateTreatment->Required) {
			if (!$this->TemplateTreatment->IsDetailKey && $this->TemplateTreatment->FormValue != NULL && $this->TemplateTreatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateTreatment->caption(), $this->TemplateTreatment->RequiredErrorMessage));
			}
		}
		if ($this->TemplateOperation->Required) {
			if (!$this->TemplateOperation->IsDetailKey && $this->TemplateOperation->FormValue != NULL && $this->TemplateOperation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateOperation->caption(), $this->TemplateOperation->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFollowUpAdvice->Required) {
			if (!$this->TemplateFollowUpAdvice->IsDetailKey && $this->TemplateFollowUpAdvice->FormValue != NULL && $this->TemplateFollowUpAdvice->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFollowUpAdvice->caption(), $this->TemplateFollowUpAdvice->RequiredErrorMessage));
			}
		}
		if ($this->TemplateFollowUpMedication->Required) {
			if (!$this->TemplateFollowUpMedication->IsDetailKey && $this->TemplateFollowUpMedication->FormValue != NULL && $this->TemplateFollowUpMedication->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateFollowUpMedication->caption(), $this->TemplateFollowUpMedication->RequiredErrorMessage));
			}
		}
		if ($this->TemplatePlan->Required) {
			if (!$this->TemplatePlan->IsDetailKey && $this->TemplatePlan->FormValue != NULL && $this->TemplatePlan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplatePlan->caption(), $this->TemplatePlan->RequiredErrorMessage));
			}
		}
		if ($this->QRCode->Required) {
			if (!$this->QRCode->IsDetailKey && $this->QRCode->FormValue != NULL && $this->QRCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QRCode->caption(), $this->QRCode->RequiredErrorMessage));
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
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
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

			// RIDNO
			$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, $this->RIDNO->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// SEX
			$this->SEX->setDbValueDef($rsnew, $this->SEX->CurrentValue, NULL, $this->SEX->ReadOnly);

			// Address
			$this->Address->setDbValueDef($rsnew, $this->Address->CurrentValue, NULL, $this->Address->ReadOnly);

			// DateofAdmission
			$this->DateofAdmission->setDbValueDef($rsnew, UnFormatDateTime($this->DateofAdmission->CurrentValue, 11), NULL, $this->DateofAdmission->ReadOnly);

			// DateofProcedure
			$this->DateofProcedure->setDbValueDef($rsnew, UnFormatDateTime($this->DateofProcedure->CurrentValue, 11), NULL, $this->DateofProcedure->ReadOnly);

			// DateofDischarge
			$this->DateofDischarge->setDbValueDef($rsnew, UnFormatDateTime($this->DateofDischarge->CurrentValue, 11), NULL, $this->DateofDischarge->ReadOnly);

			// Consultant
			$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, $this->Consultant->ReadOnly);

			// Surgeon
			$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, $this->Surgeon->ReadOnly);

			// Anesthetist
			$this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, NULL, $this->Anesthetist->ReadOnly);

			// IdentificationMark
			$this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, NULL, $this->IdentificationMark->ReadOnly);

			// ProcedureDone
			$this->ProcedureDone->setDbValueDef($rsnew, $this->ProcedureDone->CurrentValue, NULL, $this->ProcedureDone->ReadOnly);

			// PROVISIONALDIAGNOSIS
			$this->PROVISIONALDIAGNOSIS->setDbValueDef($rsnew, $this->PROVISIONALDIAGNOSIS->CurrentValue, NULL, $this->PROVISIONALDIAGNOSIS->ReadOnly);

			// Chiefcomplaints
			$this->Chiefcomplaints->setDbValueDef($rsnew, $this->Chiefcomplaints->CurrentValue, NULL, $this->Chiefcomplaints->ReadOnly);

			// MaritallHistory
			$this->MaritallHistory->setDbValueDef($rsnew, $this->MaritallHistory->CurrentValue, NULL, $this->MaritallHistory->ReadOnly);

			// MenstrualHistory
			$this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, NULL, $this->MenstrualHistory->ReadOnly);

			// SurgicalHistory
			$this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, NULL, $this->SurgicalHistory->ReadOnly);

			// PastHistory
			$this->PastHistory->setDbValueDef($rsnew, $this->PastHistory->CurrentValue, NULL, $this->PastHistory->ReadOnly);

			// FamilyHistory
			$this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, NULL, $this->FamilyHistory->ReadOnly);

			// Temp
			$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, $this->Temp->ReadOnly);

			// Pulse
			$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, $this->Pulse->ReadOnly);

			// BP
			$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, $this->BP->ReadOnly);

			// CNS
			$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, $this->CNS->ReadOnly);

			// RS
			$this->_RS->setDbValueDef($rsnew, $this->_RS->CurrentValue, NULL, $this->_RS->ReadOnly);

			// CVS
			$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, $this->CVS->ReadOnly);

			// PA
			$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, $this->PA->ReadOnly);

			// InvestigationReport
			$this->InvestigationReport->setDbValueDef($rsnew, $this->InvestigationReport->CurrentValue, NULL, $this->InvestigationReport->ReadOnly);

			// FinalDiagnosis
			$this->FinalDiagnosis->setDbValueDef($rsnew, $this->FinalDiagnosis->CurrentValue, NULL, $this->FinalDiagnosis->ReadOnly);

			// Treatment
			$this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, NULL, $this->Treatment->ReadOnly);

			// DetailOfOperation
			$this->DetailOfOperation->setDbValueDef($rsnew, $this->DetailOfOperation->CurrentValue, NULL, $this->DetailOfOperation->ReadOnly);

			// FollowUpAdvice
			$this->FollowUpAdvice->setDbValueDef($rsnew, $this->FollowUpAdvice->CurrentValue, NULL, $this->FollowUpAdvice->ReadOnly);

			// FollowUpMedication
			$this->FollowUpMedication->setDbValueDef($rsnew, $this->FollowUpMedication->CurrentValue, NULL, $this->FollowUpMedication->ReadOnly);

			// Plan
			$this->Plan->setDbValueDef($rsnew, $this->Plan->CurrentValue, NULL, $this->Plan->ReadOnly);

			// TempleteFinalDiagnosis
			$this->TempleteFinalDiagnosis->setDbValueDef($rsnew, $this->TempleteFinalDiagnosis->CurrentValue, "", $this->TempleteFinalDiagnosis->ReadOnly);

			// TemplateTreatment
			$this->TemplateTreatment->setDbValueDef($rsnew, $this->TemplateTreatment->CurrentValue, "", $this->TemplateTreatment->ReadOnly);

			// TemplateOperation
			$this->TemplateOperation->setDbValueDef($rsnew, $this->TemplateOperation->CurrentValue, "", $this->TemplateOperation->ReadOnly);

			// TemplateFollowUpAdvice
			$this->TemplateFollowUpAdvice->setDbValueDef($rsnew, $this->TemplateFollowUpAdvice->CurrentValue, "", $this->TemplateFollowUpAdvice->ReadOnly);

			// TemplateFollowUpMedication
			$this->TemplateFollowUpMedication->setDbValueDef($rsnew, $this->TemplateFollowUpMedication->CurrentValue, "", $this->TemplateFollowUpMedication->ReadOnly);

			// TemplatePlan
			$this->TemplatePlan->setDbValueDef($rsnew, $this->TemplatePlan->CurrentValue, "", $this->TemplatePlan->ReadOnly);

			// QRCode
			$this->QRCode->setDbValueDef($rsnew, $this->QRCode->CurrentValue, "", $this->QRCode->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
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

		// Clean upload path if any
		if ($editRow) {
		}

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_otherprocedurelist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
				case "x_Name":
					break;
				case "x_Consultant":
					break;
				case "x_Surgeon":
					break;
				case "x_Anesthetist":
					break;
				case "x_TempleteFinalDiagnosis":
					$lookupFilter = function() {
						return "`TemplateType`='TemplateDiagnosis'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateTreatment":
					$lookupFilter = function() {
						return "`TemplateType`='Treatment'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateOperation":
					$lookupFilter = function() {
						return "`TemplateType`='Operation'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpAdvice":
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpAdvice '";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplateFollowUpMedication":
					$lookupFilter = function() {
						return "`TemplateType`='FollowUpMedication'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_TemplatePlan":
					$lookupFilter = function() {
						return "`TemplateType`='TemplatePlan'";
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
						case "x_Name":
							break;
						case "x_Consultant":
							break;
						case "x_Surgeon":
							break;
						case "x_Anesthetist":
							break;
						case "x_TempleteFinalDiagnosis":
							break;
						case "x_TemplateTreatment":
							break;
						case "x_TemplateOperation":
							break;
						case "x_TemplateFollowUpAdvice":
							break;
						case "x_TemplateFollowUpMedication":
							break;
						case "x_TemplatePlan":
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

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
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
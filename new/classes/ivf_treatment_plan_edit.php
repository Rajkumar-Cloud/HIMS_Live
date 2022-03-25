<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_treatment_plan_edit extends ivf_treatment_plan
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_treatment_plan';

	// Page object name
	public $PageObjName = "ivf_treatment_plan_edit";

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

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS["ivf_treatment_plan"]) || get_class($GLOBALS["ivf_treatment_plan"]) == PROJECT_NAMESPACE . "ivf_treatment_plan") {
			$GLOBALS["ivf_treatment_plan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_treatment_plan"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf)
		if (!isset($GLOBALS['ivf']))
			$GLOBALS['ivf'] = new ivf();

		// Table object (view_donor_ivf)
		if (!isset($GLOBALS['view_donor_ivf']))
			$GLOBALS['view_donor_ivf'] = new view_donor_ivf();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_treatment_plan');

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
		global $ivf_treatment_plan;
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
				$doc = new $class($ivf_treatment_plan);
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
					if ($pageName == "ivf_treatment_planview.php")
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
					$this->terminate(GetUrl("ivf_treatment_planlist.php"));
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
		$this->TreatmentStartDate->setVisibility();
		$this->Age->setVisibility();
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->IVFCycleNO->setVisibility();
		$this->RESULT->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TreatementStopDate->setVisibility();
		$this->TypePatient->setVisibility();
		$this->Treatment->setVisibility();
		$this->TreatmentTec->setVisibility();
		$this->TypeOfCycle->setVisibility();
		$this->SpermOrgin->setVisibility();
		$this->State->setVisibility();
		$this->Origin->setVisibility();
		$this->MACS->setVisibility();
		$this->Technique->setVisibility();
		$this->PgdPlanning->setVisibility();
		$this->IMSI->setVisibility();
		$this->SequentialCulture->setVisibility();
		$this->TimeLapse->setVisibility();
		$this->AH->setVisibility();
		$this->Weight->setVisibility();
		$this->BMI->setVisibility();
		$this->MaleIndications->setVisibility();
		$this->FemaleIndications->setVisibility();
		$this->UseOfThe->setVisibility();
		$this->Ectopic->setVisibility();
		$this->Heterotopic->setVisibility();
		$this->TransferDFE->setVisibility();
		$this->Evolutive->setVisibility();
		$this->Number->setVisibility();
		$this->SequentialCult->setVisibility();
		$this->TineLapse->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatientID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerID->setVisibility();
		$this->WifeCell->setVisibility();
		$this->HusbandCell->setVisibility();
		$this->CoupleID->setVisibility();
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
		$this->setupLookupOptions($this->status);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_treatment_planlist.php");
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

			// Set up master detail parameters
			$this->setupMasterParms();

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
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
					$this->terminate("ivf_treatment_planlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ivf_treatment_planlist.php")
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

					// Set up detail parameters
					$this->setupDetailParms();
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

		// Check field name 'TreatmentStartDate' first before field var 'x_TreatmentStartDate'
		$val = $CurrentForm->hasValue("TreatmentStartDate") ? $CurrentForm->getValue("TreatmentStartDate") : $CurrentForm->getValue("x_TreatmentStartDate");
		if (!$this->TreatmentStartDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TreatmentStartDate->Visible = FALSE; // Disable update for API request
			else
				$this->TreatmentStartDate->setFormValue($val);
			$this->TreatmentStartDate->CurrentValue = UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'treatment_status' first before field var 'x_treatment_status'
		$val = $CurrentForm->hasValue("treatment_status") ? $CurrentForm->getValue("treatment_status") : $CurrentForm->getValue("x_treatment_status");
		if (!$this->treatment_status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->treatment_status->Visible = FALSE; // Disable update for API request
			else
				$this->treatment_status->setFormValue($val);
		}

		// Check field name 'ARTCYCLE' first before field var 'x_ARTCYCLE'
		$val = $CurrentForm->hasValue("ARTCYCLE") ? $CurrentForm->getValue("ARTCYCLE") : $CurrentForm->getValue("x_ARTCYCLE");
		if (!$this->ARTCYCLE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ARTCYCLE->Visible = FALSE; // Disable update for API request
			else
				$this->ARTCYCLE->setFormValue($val);
		}

		// Check field name 'IVFCycleNO' first before field var 'x_IVFCycleNO'
		$val = $CurrentForm->hasValue("IVFCycleNO") ? $CurrentForm->getValue("IVFCycleNO") : $CurrentForm->getValue("x_IVFCycleNO");
		if (!$this->IVFCycleNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IVFCycleNO->Visible = FALSE; // Disable update for API request
			else
				$this->IVFCycleNO->setFormValue($val);
		}

		// Check field name 'RESULT' first before field var 'x_RESULT'
		$val = $CurrentForm->hasValue("RESULT") ? $CurrentForm->getValue("RESULT") : $CurrentForm->getValue("x_RESULT");
		if (!$this->RESULT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RESULT->Visible = FALSE; // Disable update for API request
			else
				$this->RESULT->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}

		// Check field name 'TreatementStopDate' first before field var 'x_TreatementStopDate'
		$val = $CurrentForm->hasValue("TreatementStopDate") ? $CurrentForm->getValue("TreatementStopDate") : $CurrentForm->getValue("x_TreatementStopDate");
		if (!$this->TreatementStopDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TreatementStopDate->Visible = FALSE; // Disable update for API request
			else
				$this->TreatementStopDate->setFormValue($val);
			$this->TreatementStopDate->CurrentValue = UnFormatDateTime($this->TreatementStopDate->CurrentValue, 7);
		}

		// Check field name 'TypePatient' first before field var 'x_TypePatient'
		$val = $CurrentForm->hasValue("TypePatient") ? $CurrentForm->getValue("TypePatient") : $CurrentForm->getValue("x_TypePatient");
		if (!$this->TypePatient->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TypePatient->Visible = FALSE; // Disable update for API request
			else
				$this->TypePatient->setFormValue($val);
		}

		// Check field name 'Treatment' first before field var 'x_Treatment'
		$val = $CurrentForm->hasValue("Treatment") ? $CurrentForm->getValue("Treatment") : $CurrentForm->getValue("x_Treatment");
		if (!$this->Treatment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Treatment->Visible = FALSE; // Disable update for API request
			else
				$this->Treatment->setFormValue($val);
		}

		// Check field name 'TreatmentTec' first before field var 'x_TreatmentTec'
		$val = $CurrentForm->hasValue("TreatmentTec") ? $CurrentForm->getValue("TreatmentTec") : $CurrentForm->getValue("x_TreatmentTec");
		if (!$this->TreatmentTec->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TreatmentTec->Visible = FALSE; // Disable update for API request
			else
				$this->TreatmentTec->setFormValue($val);
		}

		// Check field name 'TypeOfCycle' first before field var 'x_TypeOfCycle'
		$val = $CurrentForm->hasValue("TypeOfCycle") ? $CurrentForm->getValue("TypeOfCycle") : $CurrentForm->getValue("x_TypeOfCycle");
		if (!$this->TypeOfCycle->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TypeOfCycle->Visible = FALSE; // Disable update for API request
			else
				$this->TypeOfCycle->setFormValue($val);
		}

		// Check field name 'SpermOrgin' first before field var 'x_SpermOrgin'
		$val = $CurrentForm->hasValue("SpermOrgin") ? $CurrentForm->getValue("SpermOrgin") : $CurrentForm->getValue("x_SpermOrgin");
		if (!$this->SpermOrgin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SpermOrgin->Visible = FALSE; // Disable update for API request
			else
				$this->SpermOrgin->setFormValue($val);
		}

		// Check field name 'State' first before field var 'x_State'
		$val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
		if (!$this->State->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->State->Visible = FALSE; // Disable update for API request
			else
				$this->State->setFormValue($val);
		}

		// Check field name 'Origin' first before field var 'x_Origin'
		$val = $CurrentForm->hasValue("Origin") ? $CurrentForm->getValue("Origin") : $CurrentForm->getValue("x_Origin");
		if (!$this->Origin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Origin->Visible = FALSE; // Disable update for API request
			else
				$this->Origin->setFormValue($val);
		}

		// Check field name 'MACS' first before field var 'x_MACS'
		$val = $CurrentForm->hasValue("MACS") ? $CurrentForm->getValue("MACS") : $CurrentForm->getValue("x_MACS");
		if (!$this->MACS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MACS->Visible = FALSE; // Disable update for API request
			else
				$this->MACS->setFormValue($val);
		}

		// Check field name 'Technique' first before field var 'x_Technique'
		$val = $CurrentForm->hasValue("Technique") ? $CurrentForm->getValue("Technique") : $CurrentForm->getValue("x_Technique");
		if (!$this->Technique->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Technique->Visible = FALSE; // Disable update for API request
			else
				$this->Technique->setFormValue($val);
		}

		// Check field name 'PgdPlanning' first before field var 'x_PgdPlanning'
		$val = $CurrentForm->hasValue("PgdPlanning") ? $CurrentForm->getValue("PgdPlanning") : $CurrentForm->getValue("x_PgdPlanning");
		if (!$this->PgdPlanning->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PgdPlanning->Visible = FALSE; // Disable update for API request
			else
				$this->PgdPlanning->setFormValue($val);
		}

		// Check field name 'IMSI' first before field var 'x_IMSI'
		$val = $CurrentForm->hasValue("IMSI") ? $CurrentForm->getValue("IMSI") : $CurrentForm->getValue("x_IMSI");
		if (!$this->IMSI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IMSI->Visible = FALSE; // Disable update for API request
			else
				$this->IMSI->setFormValue($val);
		}

		// Check field name 'SequentialCulture' first before field var 'x_SequentialCulture'
		$val = $CurrentForm->hasValue("SequentialCulture") ? $CurrentForm->getValue("SequentialCulture") : $CurrentForm->getValue("x_SequentialCulture");
		if (!$this->SequentialCulture->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SequentialCulture->Visible = FALSE; // Disable update for API request
			else
				$this->SequentialCulture->setFormValue($val);
		}

		// Check field name 'TimeLapse' first before field var 'x_TimeLapse'
		$val = $CurrentForm->hasValue("TimeLapse") ? $CurrentForm->getValue("TimeLapse") : $CurrentForm->getValue("x_TimeLapse");
		if (!$this->TimeLapse->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TimeLapse->Visible = FALSE; // Disable update for API request
			else
				$this->TimeLapse->setFormValue($val);
		}

		// Check field name 'AH' first before field var 'x_AH'
		$val = $CurrentForm->hasValue("AH") ? $CurrentForm->getValue("AH") : $CurrentForm->getValue("x_AH");
		if (!$this->AH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AH->Visible = FALSE; // Disable update for API request
			else
				$this->AH->setFormValue($val);
		}

		// Check field name 'Weight' first before field var 'x_Weight'
		$val = $CurrentForm->hasValue("Weight") ? $CurrentForm->getValue("Weight") : $CurrentForm->getValue("x_Weight");
		if (!$this->Weight->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Weight->Visible = FALSE; // Disable update for API request
			else
				$this->Weight->setFormValue($val);
		}

		// Check field name 'BMI' first before field var 'x_BMI'
		$val = $CurrentForm->hasValue("BMI") ? $CurrentForm->getValue("BMI") : $CurrentForm->getValue("x_BMI");
		if (!$this->BMI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BMI->Visible = FALSE; // Disable update for API request
			else
				$this->BMI->setFormValue($val);
		}

		// Check field name 'MaleIndications' first before field var 'x_MaleIndications'
		$val = $CurrentForm->hasValue("MaleIndications") ? $CurrentForm->getValue("MaleIndications") : $CurrentForm->getValue("x_MaleIndications");
		if (!$this->MaleIndications->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MaleIndications->Visible = FALSE; // Disable update for API request
			else
				$this->MaleIndications->setFormValue($val);
		}

		// Check field name 'FemaleIndications' first before field var 'x_FemaleIndications'
		$val = $CurrentForm->hasValue("FemaleIndications") ? $CurrentForm->getValue("FemaleIndications") : $CurrentForm->getValue("x_FemaleIndications");
		if (!$this->FemaleIndications->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FemaleIndications->Visible = FALSE; // Disable update for API request
			else
				$this->FemaleIndications->setFormValue($val);
		}

		// Check field name 'UseOfThe' first before field var 'x_UseOfThe'
		$val = $CurrentForm->hasValue("UseOfThe") ? $CurrentForm->getValue("UseOfThe") : $CurrentForm->getValue("x_UseOfThe");
		if (!$this->UseOfThe->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UseOfThe->Visible = FALSE; // Disable update for API request
			else
				$this->UseOfThe->setFormValue($val);
		}

		// Check field name 'Ectopic' first before field var 'x_Ectopic'
		$val = $CurrentForm->hasValue("Ectopic") ? $CurrentForm->getValue("Ectopic") : $CurrentForm->getValue("x_Ectopic");
		if (!$this->Ectopic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Ectopic->Visible = FALSE; // Disable update for API request
			else
				$this->Ectopic->setFormValue($val);
		}

		// Check field name 'Heterotopic' first before field var 'x_Heterotopic'
		$val = $CurrentForm->hasValue("Heterotopic") ? $CurrentForm->getValue("Heterotopic") : $CurrentForm->getValue("x_Heterotopic");
		if (!$this->Heterotopic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Heterotopic->Visible = FALSE; // Disable update for API request
			else
				$this->Heterotopic->setFormValue($val);
		}

		// Check field name 'TransferDFE' first before field var 'x_TransferDFE'
		$val = $CurrentForm->hasValue("TransferDFE") ? $CurrentForm->getValue("TransferDFE") : $CurrentForm->getValue("x_TransferDFE");
		if (!$this->TransferDFE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TransferDFE->Visible = FALSE; // Disable update for API request
			else
				$this->TransferDFE->setFormValue($val);
		}

		// Check field name 'Evolutive' first before field var 'x_Evolutive'
		$val = $CurrentForm->hasValue("Evolutive") ? $CurrentForm->getValue("Evolutive") : $CurrentForm->getValue("x_Evolutive");
		if (!$this->Evolutive->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Evolutive->Visible = FALSE; // Disable update for API request
			else
				$this->Evolutive->setFormValue($val);
		}

		// Check field name 'Number' first before field var 'x_Number'
		$val = $CurrentForm->hasValue("Number") ? $CurrentForm->getValue("Number") : $CurrentForm->getValue("x_Number");
		if (!$this->Number->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Number->Visible = FALSE; // Disable update for API request
			else
				$this->Number->setFormValue($val);
		}

		// Check field name 'SequentialCult' first before field var 'x_SequentialCult'
		$val = $CurrentForm->hasValue("SequentialCult") ? $CurrentForm->getValue("SequentialCult") : $CurrentForm->getValue("x_SequentialCult");
		if (!$this->SequentialCult->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SequentialCult->Visible = FALSE; // Disable update for API request
			else
				$this->SequentialCult->setFormValue($val);
		}

		// Check field name 'TineLapse' first before field var 'x_TineLapse'
		$val = $CurrentForm->hasValue("TineLapse") ? $CurrentForm->getValue("TineLapse") : $CurrentForm->getValue("x_TineLapse");
		if (!$this->TineLapse->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TineLapse->Visible = FALSE; // Disable update for API request
			else
				$this->TineLapse->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'PartnerName' first before field var 'x_PartnerName'
		$val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
		if (!$this->PartnerName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerName->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerName->setFormValue($val);
		}

		// Check field name 'PartnerID' first before field var 'x_PartnerID'
		$val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
		if (!$this->PartnerID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerID->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerID->setFormValue($val);
		}

		// Check field name 'WifeCell' first before field var 'x_WifeCell'
		$val = $CurrentForm->hasValue("WifeCell") ? $CurrentForm->getValue("WifeCell") : $CurrentForm->getValue("x_WifeCell");
		if (!$this->WifeCell->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->WifeCell->Visible = FALSE; // Disable update for API request
			else
				$this->WifeCell->setFormValue($val);
		}

		// Check field name 'HusbandCell' first before field var 'x_HusbandCell'
		$val = $CurrentForm->hasValue("HusbandCell") ? $CurrentForm->getValue("HusbandCell") : $CurrentForm->getValue("x_HusbandCell");
		if (!$this->HusbandCell->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HusbandCell->Visible = FALSE; // Disable update for API request
			else
				$this->HusbandCell->setFormValue($val);
		}

		// Check field name 'CoupleID' first before field var 'x_CoupleID'
		$val = $CurrentForm->hasValue("CoupleID") ? $CurrentForm->getValue("CoupleID") : $CurrentForm->getValue("x_CoupleID");
		if (!$this->CoupleID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CoupleID->Visible = FALSE; // Disable update for API request
			else
				$this->CoupleID->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->TreatmentStartDate->CurrentValue = $this->TreatmentStartDate->FormValue;
		$this->TreatmentStartDate->CurrentValue = UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7);
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->treatment_status->CurrentValue = $this->treatment_status->FormValue;
		$this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
		$this->IVFCycleNO->CurrentValue = $this->IVFCycleNO->FormValue;
		$this->RESULT->CurrentValue = $this->RESULT->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->TreatementStopDate->CurrentValue = $this->TreatementStopDate->FormValue;
		$this->TreatementStopDate->CurrentValue = UnFormatDateTime($this->TreatementStopDate->CurrentValue, 7);
		$this->TypePatient->CurrentValue = $this->TypePatient->FormValue;
		$this->Treatment->CurrentValue = $this->Treatment->FormValue;
		$this->TreatmentTec->CurrentValue = $this->TreatmentTec->FormValue;
		$this->TypeOfCycle->CurrentValue = $this->TypeOfCycle->FormValue;
		$this->SpermOrgin->CurrentValue = $this->SpermOrgin->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Origin->CurrentValue = $this->Origin->FormValue;
		$this->MACS->CurrentValue = $this->MACS->FormValue;
		$this->Technique->CurrentValue = $this->Technique->FormValue;
		$this->PgdPlanning->CurrentValue = $this->PgdPlanning->FormValue;
		$this->IMSI->CurrentValue = $this->IMSI->FormValue;
		$this->SequentialCulture->CurrentValue = $this->SequentialCulture->FormValue;
		$this->TimeLapse->CurrentValue = $this->TimeLapse->FormValue;
		$this->AH->CurrentValue = $this->AH->FormValue;
		$this->Weight->CurrentValue = $this->Weight->FormValue;
		$this->BMI->CurrentValue = $this->BMI->FormValue;
		$this->MaleIndications->CurrentValue = $this->MaleIndications->FormValue;
		$this->FemaleIndications->CurrentValue = $this->FemaleIndications->FormValue;
		$this->UseOfThe->CurrentValue = $this->UseOfThe->FormValue;
		$this->Ectopic->CurrentValue = $this->Ectopic->FormValue;
		$this->Heterotopic->CurrentValue = $this->Heterotopic->FormValue;
		$this->TransferDFE->CurrentValue = $this->TransferDFE->FormValue;
		$this->Evolutive->CurrentValue = $this->Evolutive->FormValue;
		$this->Number->CurrentValue = $this->Number->FormValue;
		$this->SequentialCult->CurrentValue = $this->SequentialCult->FormValue;
		$this->TineLapse->CurrentValue = $this->TineLapse->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
		$this->WifeCell->CurrentValue = $this->WifeCell->FormValue;
		$this->HusbandCell->CurrentValue = $this->HusbandCell->FormValue;
		$this->CoupleID->CurrentValue = $this->CoupleID->FormValue;
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
		$this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
		$this->Age->setDbValue($row['Age']);
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->IVFCycleNO->setDbValue($row['IVFCycleNO']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
		$this->TypePatient->setDbValue($row['TypePatient']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->TreatmentTec->setDbValue($row['TreatmentTec']);
		$this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
		$this->SpermOrgin->setDbValue($row['SpermOrgin']);
		$this->State->setDbValue($row['State']);
		$this->Origin->setDbValue($row['Origin']);
		$this->MACS->setDbValue($row['MACS']);
		$this->Technique->setDbValue($row['Technique']);
		$this->PgdPlanning->setDbValue($row['PgdPlanning']);
		$this->IMSI->setDbValue($row['IMSI']);
		$this->SequentialCulture->setDbValue($row['SequentialCulture']);
		$this->TimeLapse->setDbValue($row['TimeLapse']);
		$this->AH->setDbValue($row['AH']);
		$this->Weight->setDbValue($row['Weight']);
		$this->BMI->setDbValue($row['BMI']);
		$this->MaleIndications->setDbValue($row['MaleIndications']);
		$this->FemaleIndications->setDbValue($row['FemaleIndications']);
		$this->UseOfThe->setDbValue($row['UseOfThe']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Heterotopic->setDbValue($row['Heterotopic']);
		$this->TransferDFE->setDbValue($row['TransferDFE']);
		$this->Evolutive->setDbValue($row['Evolutive']);
		$this->Number->setDbValue($row['Number']);
		$this->SequentialCult->setDbValue($row['SequentialCult']);
		$this->TineLapse->setDbValue($row['TineLapse']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->WifeCell->setDbValue($row['WifeCell']);
		$this->HusbandCell->setDbValue($row['HusbandCell']);
		$this->CoupleID->setDbValue($row['CoupleID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['TreatmentStartDate'] = NULL;
		$row['Age'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['IVFCycleNO'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TreatementStopDate'] = NULL;
		$row['TypePatient'] = NULL;
		$row['Treatment'] = NULL;
		$row['TreatmentTec'] = NULL;
		$row['TypeOfCycle'] = NULL;
		$row['SpermOrgin'] = NULL;
		$row['State'] = NULL;
		$row['Origin'] = NULL;
		$row['MACS'] = NULL;
		$row['Technique'] = NULL;
		$row['PgdPlanning'] = NULL;
		$row['IMSI'] = NULL;
		$row['SequentialCulture'] = NULL;
		$row['TimeLapse'] = NULL;
		$row['AH'] = NULL;
		$row['Weight'] = NULL;
		$row['BMI'] = NULL;
		$row['MaleIndications'] = NULL;
		$row['FemaleIndications'] = NULL;
		$row['UseOfThe'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Heterotopic'] = NULL;
		$row['TransferDFE'] = NULL;
		$row['Evolutive'] = NULL;
		$row['Number'] = NULL;
		$row['SequentialCult'] = NULL;
		$row['TineLapse'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['WifeCell'] = NULL;
		$row['HusbandCell'] = NULL;
		$row['CoupleID'] = NULL;
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
		// TreatmentStartDate
		// Age
		// treatment_status
		// ARTCYCLE
		// IVFCycleNO
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TreatementStopDate
		// TypePatient
		// Treatment
		// TreatmentTec
		// TypeOfCycle
		// SpermOrgin
		// State
		// Origin
		// MACS
		// Technique
		// PgdPlanning
		// IMSI
		// SequentialCulture
		// TimeLapse
		// AH
		// Weight
		// BMI
		// MaleIndications
		// FemaleIndications
		// UseOfThe
		// Ectopic
		// Heterotopic
		// TransferDFE
		// Evolutive
		// Number
		// SequentialCult
		// TineLapse
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// WifeCell
		// HusbandCell
		// CoupleID

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
			$this->Name->ViewCustomAttributes = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
			$this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 7);
			$this->TreatmentStartDate->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// treatment_status
			if (strval($this->treatment_status->CurrentValue) != "") {
				$this->treatment_status->ViewValue = $this->treatment_status->optionCaption($this->treatment_status->CurrentValue);
			} else {
				$this->treatment_status->ViewValue = NULL;
			}
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			if (strval($this->ARTCYCLE->CurrentValue) != "") {
				$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
			} else {
				$this->ARTCYCLE->ViewValue = NULL;
			}
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// IVFCycleNO
			$this->IVFCycleNO->ViewValue = $this->IVFCycleNO->CurrentValue;
			$this->IVFCycleNO->ViewCustomAttributes = "";

			// RESULT
			if (strval($this->RESULT->CurrentValue) != "") {
				$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
			} else {
				$this->RESULT->ViewValue = NULL;
			}
			$this->RESULT->ViewCustomAttributes = "";

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

			// TreatementStopDate
			$this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
			$this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 7);
			$this->TreatementStopDate->ViewCustomAttributes = "";

			// TypePatient
			$this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
			$this->TypePatient->ViewCustomAttributes = "";

			// Treatment
			if (strval($this->Treatment->CurrentValue) != "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// TreatmentTec
			$this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
			$this->TreatmentTec->ViewCustomAttributes = "";

			// TypeOfCycle
			if (strval($this->TypeOfCycle->CurrentValue) != "") {
				$this->TypeOfCycle->ViewValue = $this->TypeOfCycle->optionCaption($this->TypeOfCycle->CurrentValue);
			} else {
				$this->TypeOfCycle->ViewValue = NULL;
			}
			$this->TypeOfCycle->ViewCustomAttributes = "";

			// SpermOrgin
			if (strval($this->SpermOrgin->CurrentValue) != "") {
				$this->SpermOrgin->ViewValue = $this->SpermOrgin->optionCaption($this->SpermOrgin->CurrentValue);
			} else {
				$this->SpermOrgin->ViewValue = NULL;
			}
			$this->SpermOrgin->ViewCustomAttributes = "";

			// State
			if (strval($this->State->CurrentValue) != "") {
				$this->State->ViewValue = $this->State->optionCaption($this->State->CurrentValue);
			} else {
				$this->State->ViewValue = NULL;
			}
			$this->State->ViewCustomAttributes = "";

			// Origin
			$this->Origin->ViewValue = $this->Origin->CurrentValue;
			$this->Origin->ViewCustomAttributes = "";

			// MACS
			if (strval($this->MACS->CurrentValue) != "") {
				$this->MACS->ViewValue = $this->MACS->optionCaption($this->MACS->CurrentValue);
			} else {
				$this->MACS->ViewValue = NULL;
			}
			$this->MACS->ViewCustomAttributes = "";

			// Technique
			$this->Technique->ViewValue = $this->Technique->CurrentValue;
			$this->Technique->ViewCustomAttributes = "";

			// PgdPlanning
			if (strval($this->PgdPlanning->CurrentValue) != "") {
				$this->PgdPlanning->ViewValue = $this->PgdPlanning->optionCaption($this->PgdPlanning->CurrentValue);
			} else {
				$this->PgdPlanning->ViewValue = NULL;
			}
			$this->PgdPlanning->ViewCustomAttributes = "";

			// IMSI
			$this->IMSI->ViewValue = $this->IMSI->CurrentValue;
			$this->IMSI->ViewCustomAttributes = "";

			// SequentialCulture
			$this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
			$this->SequentialCulture->ViewCustomAttributes = "";

			// TimeLapse
			$this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
			$this->TimeLapse->ViewCustomAttributes = "";

			// AH
			$this->AH->ViewValue = $this->AH->CurrentValue;
			$this->AH->ViewCustomAttributes = "";

			// Weight
			$this->Weight->ViewValue = $this->Weight->CurrentValue;
			$this->Weight->ViewCustomAttributes = "";

			// BMI
			$this->BMI->ViewValue = $this->BMI->CurrentValue;
			$this->BMI->ViewCustomAttributes = "";

			// MaleIndications
			if (strval($this->MaleIndications->CurrentValue) != "") {
				$this->MaleIndications->ViewValue = $this->MaleIndications->optionCaption($this->MaleIndications->CurrentValue);
			} else {
				$this->MaleIndications->ViewValue = NULL;
			}
			$this->MaleIndications->ViewCustomAttributes = "";

			// FemaleIndications
			if (strval($this->FemaleIndications->CurrentValue) != "") {
				$this->FemaleIndications->ViewValue = $this->FemaleIndications->optionCaption($this->FemaleIndications->CurrentValue);
			} else {
				$this->FemaleIndications->ViewValue = NULL;
			}
			$this->FemaleIndications->ViewCustomAttributes = "";

			// UseOfThe
			$this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
			$this->UseOfThe->ViewCustomAttributes = "";

			// Ectopic
			$this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
			$this->Ectopic->ViewCustomAttributes = "";

			// Heterotopic
			if (strval($this->Heterotopic->CurrentValue) != "") {
				$this->Heterotopic->ViewValue = $this->Heterotopic->optionCaption($this->Heterotopic->CurrentValue);
			} else {
				$this->Heterotopic->ViewValue = NULL;
			}
			$this->Heterotopic->ViewCustomAttributes = "";

			// TransferDFE
			if (strval($this->TransferDFE->CurrentValue) != "") {
				$this->TransferDFE->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->TransferDFE->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->TransferDFE->ViewValue->add($this->TransferDFE->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->TransferDFE->ViewValue = NULL;
			}
			$this->TransferDFE->ViewCustomAttributes = "";

			// Evolutive
			$this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
			$this->Evolutive->ViewCustomAttributes = "";

			// Number
			$this->Number->ViewValue = $this->Number->CurrentValue;
			$this->Number->ViewCustomAttributes = "";

			// SequentialCult
			$this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
			$this->SequentialCult->ViewCustomAttributes = "";

			// TineLapse
			if (strval($this->TineLapse->CurrentValue) != "") {
				$this->TineLapse->ViewValue = $this->TineLapse->optionCaption($this->TineLapse->CurrentValue);
			} else {
				$this->TineLapse->ViewValue = NULL;
			}
			$this->TineLapse->ViewCustomAttributes = "";

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

			// WifeCell
			$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
			$this->WifeCell->ViewCustomAttributes = "";

			// HusbandCell
			$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
			$this->HusbandCell->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";
			$this->TreatmentStartDate->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// IVFCycleNO
			$this->IVFCycleNO->LinkCustomAttributes = "";
			$this->IVFCycleNO->HrefValue = "";
			$this->IVFCycleNO->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// TreatementStopDate
			$this->TreatementStopDate->LinkCustomAttributes = "";
			$this->TreatementStopDate->HrefValue = "";
			$this->TreatementStopDate->TooltipValue = "";

			// TypePatient
			$this->TypePatient->LinkCustomAttributes = "";
			$this->TypePatient->HrefValue = "";
			$this->TypePatient->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";
			$this->TreatmentTec->TooltipValue = "";

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";
			$this->TypeOfCycle->TooltipValue = "";

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";
			$this->SpermOrgin->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";
			$this->Origin->TooltipValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";
			$this->MACS->TooltipValue = "";

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";
			$this->Technique->TooltipValue = "";

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";
			$this->PgdPlanning->TooltipValue = "";

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";
			$this->IMSI->TooltipValue = "";

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";
			$this->SequentialCulture->TooltipValue = "";

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";
			$this->TimeLapse->TooltipValue = "";

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";
			$this->AH->TooltipValue = "";

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";
			$this->Weight->TooltipValue = "";

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";
			$this->BMI->TooltipValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";
			$this->MaleIndications->TooltipValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";
			$this->FemaleIndications->TooltipValue = "";

			// UseOfThe
			$this->UseOfThe->LinkCustomAttributes = "";
			$this->UseOfThe->HrefValue = "";
			$this->UseOfThe->TooltipValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";
			$this->Ectopic->TooltipValue = "";

			// Heterotopic
			$this->Heterotopic->LinkCustomAttributes = "";
			$this->Heterotopic->HrefValue = "";
			$this->Heterotopic->TooltipValue = "";

			// TransferDFE
			$this->TransferDFE->LinkCustomAttributes = "";
			$this->TransferDFE->HrefValue = "";
			$this->TransferDFE->TooltipValue = "";

			// Evolutive
			$this->Evolutive->LinkCustomAttributes = "";
			$this->Evolutive->HrefValue = "";
			$this->Evolutive->TooltipValue = "";

			// Number
			$this->Number->LinkCustomAttributes = "";
			$this->Number->HrefValue = "";
			$this->Number->TooltipValue = "";

			// SequentialCult
			$this->SequentialCult->LinkCustomAttributes = "";
			$this->SequentialCult->HrefValue = "";
			$this->SequentialCult->TooltipValue = "";

			// TineLapse
			$this->TineLapse->LinkCustomAttributes = "";
			$this->TineLapse->HrefValue = "";
			$this->TineLapse->TooltipValue = "";

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

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";
			$this->WifeCell->TooltipValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";
			$this->HusbandCell->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			if ($this->RIDNO->getSessionValue() != "") {
				$this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
				$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
				$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
				$this->RIDNO->ViewCustomAttributes = "";
			} else {
				$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
				$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() != "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
				$this->Name->ViewValue = $this->Name->CurrentValue;
				$this->Name->ViewCustomAttributes = "";
			} else {
				if (!$this->Name->Raw)
					$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
				$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
				$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// TreatmentStartDate
			$this->TreatmentStartDate->EditAttrs["class"] = "form-control";
			$this->TreatmentStartDate->EditCustomAttributes = "";
			$this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime($this->TreatmentStartDate->CurrentValue, 7));
			$this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// treatment_status
			$this->treatment_status->EditAttrs["class"] = "form-control";
			$this->treatment_status->EditCustomAttributes = "";
			$this->treatment_status->EditValue = $this->treatment_status->options(TRUE);

			// ARTCYCLE
			$this->ARTCYCLE->EditCustomAttributes = "";
			$this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(FALSE);

			// IVFCycleNO
			$this->IVFCycleNO->EditAttrs["class"] = "form-control";
			$this->IVFCycleNO->EditCustomAttributes = "";
			if (!$this->IVFCycleNO->Raw)
				$this->IVFCycleNO->CurrentValue = HtmlDecode($this->IVFCycleNO->CurrentValue);
			$this->IVFCycleNO->EditValue = HtmlEncode($this->IVFCycleNO->CurrentValue);
			$this->IVFCycleNO->PlaceHolder = RemoveHtml($this->IVFCycleNO->caption());

			// RESULT
			$this->RESULT->EditAttrs["class"] = "form-control";
			$this->RESULT->EditCustomAttributes = "";
			$this->RESULT->EditValue = $this->RESULT->options(TRUE);

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

			// modifiedby
			// modifieddatetime
			// TreatementStopDate

			$this->TreatementStopDate->EditAttrs["class"] = "form-control";
			$this->TreatementStopDate->EditCustomAttributes = "";
			$this->TreatementStopDate->EditValue = HtmlEncode(FormatDateTime($this->TreatementStopDate->CurrentValue, 7));
			$this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

			// TypePatient
			$this->TypePatient->EditAttrs["class"] = "form-control";
			$this->TypePatient->EditCustomAttributes = "";
			if (!$this->TypePatient->Raw)
				$this->TypePatient->CurrentValue = HtmlDecode($this->TypePatient->CurrentValue);
			$this->TypePatient->EditValue = HtmlEncode($this->TypePatient->CurrentValue);
			$this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			$this->Treatment->EditValue = $this->Treatment->options(TRUE);

			// TreatmentTec
			$this->TreatmentTec->EditAttrs["class"] = "form-control";
			$this->TreatmentTec->EditCustomAttributes = "";
			if (!$this->TreatmentTec->Raw)
				$this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
			$this->TreatmentTec->EditValue = HtmlEncode($this->TreatmentTec->CurrentValue);
			$this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

			// TypeOfCycle
			$this->TypeOfCycle->EditCustomAttributes = "";
			$this->TypeOfCycle->EditValue = $this->TypeOfCycle->options(FALSE);

			// SpermOrgin
			$this->SpermOrgin->EditAttrs["class"] = "form-control";
			$this->SpermOrgin->EditCustomAttributes = "";
			$this->SpermOrgin->EditValue = $this->SpermOrgin->options(TRUE);

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			$this->State->EditValue = $this->State->options(TRUE);

			// Origin
			$this->Origin->EditAttrs["class"] = "form-control";
			$this->Origin->EditCustomAttributes = "";
			if (!$this->Origin->Raw)
				$this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
			$this->Origin->EditValue = HtmlEncode($this->Origin->CurrentValue);
			$this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

			// MACS
			$this->MACS->EditCustomAttributes = "";
			$this->MACS->EditValue = $this->MACS->options(FALSE);

			// Technique
			$this->Technique->EditAttrs["class"] = "form-control";
			$this->Technique->EditCustomAttributes = "";
			if (!$this->Technique->Raw)
				$this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
			$this->Technique->EditValue = HtmlEncode($this->Technique->CurrentValue);
			$this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

			// PgdPlanning
			$this->PgdPlanning->EditCustomAttributes = "";
			$this->PgdPlanning->EditValue = $this->PgdPlanning->options(FALSE);

			// IMSI
			$this->IMSI->EditAttrs["class"] = "form-control";
			$this->IMSI->EditCustomAttributes = "";
			if (!$this->IMSI->Raw)
				$this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
			$this->IMSI->EditValue = HtmlEncode($this->IMSI->CurrentValue);
			$this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

			// SequentialCulture
			$this->SequentialCulture->EditAttrs["class"] = "form-control";
			$this->SequentialCulture->EditCustomAttributes = "";
			if (!$this->SequentialCulture->Raw)
				$this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
			$this->SequentialCulture->EditValue = HtmlEncode($this->SequentialCulture->CurrentValue);
			$this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

			// TimeLapse
			$this->TimeLapse->EditAttrs["class"] = "form-control";
			$this->TimeLapse->EditCustomAttributes = "";
			if (!$this->TimeLapse->Raw)
				$this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
			$this->TimeLapse->EditValue = HtmlEncode($this->TimeLapse->CurrentValue);
			$this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

			// AH
			$this->AH->EditAttrs["class"] = "form-control";
			$this->AH->EditCustomAttributes = "";
			if (!$this->AH->Raw)
				$this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
			$this->AH->EditValue = HtmlEncode($this->AH->CurrentValue);
			$this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

			// Weight
			$this->Weight->EditAttrs["class"] = "form-control";
			$this->Weight->EditCustomAttributes = "";
			if (!$this->Weight->Raw)
				$this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
			$this->Weight->EditValue = HtmlEncode($this->Weight->CurrentValue);
			$this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

			// BMI
			$this->BMI->EditAttrs["class"] = "form-control";
			$this->BMI->EditCustomAttributes = "";
			if (!$this->BMI->Raw)
				$this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
			$this->BMI->EditValue = HtmlEncode($this->BMI->CurrentValue);
			$this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

			// MaleIndications
			$this->MaleIndications->EditAttrs["class"] = "form-control";
			$this->MaleIndications->EditCustomAttributes = "";
			$this->MaleIndications->EditValue = $this->MaleIndications->options(TRUE);

			// FemaleIndications
			$this->FemaleIndications->EditAttrs["class"] = "form-control";
			$this->FemaleIndications->EditCustomAttributes = "";
			$this->FemaleIndications->EditValue = $this->FemaleIndications->options(TRUE);

			// UseOfThe
			$this->UseOfThe->EditAttrs["class"] = "form-control";
			$this->UseOfThe->EditCustomAttributes = "";
			if (!$this->UseOfThe->Raw)
				$this->UseOfThe->CurrentValue = HtmlDecode($this->UseOfThe->CurrentValue);
			$this->UseOfThe->EditValue = HtmlEncode($this->UseOfThe->CurrentValue);
			$this->UseOfThe->PlaceHolder = RemoveHtml($this->UseOfThe->caption());

			// Ectopic
			$this->Ectopic->EditAttrs["class"] = "form-control";
			$this->Ectopic->EditCustomAttributes = "";
			if (!$this->Ectopic->Raw)
				$this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
			$this->Ectopic->EditValue = HtmlEncode($this->Ectopic->CurrentValue);
			$this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

			// Heterotopic
			$this->Heterotopic->EditAttrs["class"] = "form-control";
			$this->Heterotopic->EditCustomAttributes = "";
			$this->Heterotopic->EditValue = $this->Heterotopic->options(TRUE);

			// TransferDFE
			$this->TransferDFE->EditCustomAttributes = "";
			$this->TransferDFE->EditValue = $this->TransferDFE->options(FALSE);

			// Evolutive
			$this->Evolutive->EditAttrs["class"] = "form-control";
			$this->Evolutive->EditCustomAttributes = "";
			if (!$this->Evolutive->Raw)
				$this->Evolutive->CurrentValue = HtmlDecode($this->Evolutive->CurrentValue);
			$this->Evolutive->EditValue = HtmlEncode($this->Evolutive->CurrentValue);
			$this->Evolutive->PlaceHolder = RemoveHtml($this->Evolutive->caption());

			// Number
			$this->Number->EditAttrs["class"] = "form-control";
			$this->Number->EditCustomAttributes = "";
			if (!$this->Number->Raw)
				$this->Number->CurrentValue = HtmlDecode($this->Number->CurrentValue);
			$this->Number->EditValue = HtmlEncode($this->Number->CurrentValue);
			$this->Number->PlaceHolder = RemoveHtml($this->Number->caption());

			// SequentialCult
			$this->SequentialCult->EditAttrs["class"] = "form-control";
			$this->SequentialCult->EditCustomAttributes = "";
			if (!$this->SequentialCult->Raw)
				$this->SequentialCult->CurrentValue = HtmlDecode($this->SequentialCult->CurrentValue);
			$this->SequentialCult->EditValue = HtmlEncode($this->SequentialCult->CurrentValue);
			$this->SequentialCult->PlaceHolder = RemoveHtml($this->SequentialCult->caption());

			// TineLapse
			$this->TineLapse->EditAttrs["class"] = "form-control";
			$this->TineLapse->EditCustomAttributes = "";
			$this->TineLapse->EditValue = $this->TineLapse->options(TRUE);

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (!$this->PartnerName->Raw)
				$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PartnerID
			$this->PartnerID->EditAttrs["class"] = "form-control";
			$this->PartnerID->EditCustomAttributes = "";
			if (!$this->PartnerID->Raw)
				$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
			$this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
			$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

			// WifeCell
			$this->WifeCell->EditAttrs["class"] = "form-control";
			$this->WifeCell->EditCustomAttributes = "";
			if (!$this->WifeCell->Raw)
				$this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
			$this->WifeCell->EditValue = HtmlEncode($this->WifeCell->CurrentValue);
			$this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

			// HusbandCell
			$this->HusbandCell->EditAttrs["class"] = "form-control";
			$this->HusbandCell->EditCustomAttributes = "";
			if (!$this->HusbandCell->Raw)
				$this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
			$this->HusbandCell->EditValue = HtmlEncode($this->HusbandCell->CurrentValue);
			$this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

			// CoupleID
			$this->CoupleID->EditAttrs["class"] = "form-control";
			$this->CoupleID->EditCustomAttributes = "";
			if (!$this->CoupleID->Raw)
				$this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
			$this->CoupleID->EditValue = HtmlEncode($this->CoupleID->CurrentValue);
			$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// TreatmentStartDate
			$this->TreatmentStartDate->LinkCustomAttributes = "";
			$this->TreatmentStartDate->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";

			// IVFCycleNO
			$this->IVFCycleNO->LinkCustomAttributes = "";
			$this->IVFCycleNO->HrefValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// TreatementStopDate
			$this->TreatementStopDate->LinkCustomAttributes = "";
			$this->TreatementStopDate->HrefValue = "";

			// TypePatient
			$this->TypePatient->LinkCustomAttributes = "";
			$this->TypePatient->HrefValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";

			// TreatmentTec
			$this->TreatmentTec->LinkCustomAttributes = "";
			$this->TreatmentTec->HrefValue = "";

			// TypeOfCycle
			$this->TypeOfCycle->LinkCustomAttributes = "";
			$this->TypeOfCycle->HrefValue = "";

			// SpermOrgin
			$this->SpermOrgin->LinkCustomAttributes = "";
			$this->SpermOrgin->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Origin
			$this->Origin->LinkCustomAttributes = "";
			$this->Origin->HrefValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";

			// Technique
			$this->Technique->LinkCustomAttributes = "";
			$this->Technique->HrefValue = "";

			// PgdPlanning
			$this->PgdPlanning->LinkCustomAttributes = "";
			$this->PgdPlanning->HrefValue = "";

			// IMSI
			$this->IMSI->LinkCustomAttributes = "";
			$this->IMSI->HrefValue = "";

			// SequentialCulture
			$this->SequentialCulture->LinkCustomAttributes = "";
			$this->SequentialCulture->HrefValue = "";

			// TimeLapse
			$this->TimeLapse->LinkCustomAttributes = "";
			$this->TimeLapse->HrefValue = "";

			// AH
			$this->AH->LinkCustomAttributes = "";
			$this->AH->HrefValue = "";

			// Weight
			$this->Weight->LinkCustomAttributes = "";
			$this->Weight->HrefValue = "";

			// BMI
			$this->BMI->LinkCustomAttributes = "";
			$this->BMI->HrefValue = "";

			// MaleIndications
			$this->MaleIndications->LinkCustomAttributes = "";
			$this->MaleIndications->HrefValue = "";

			// FemaleIndications
			$this->FemaleIndications->LinkCustomAttributes = "";
			$this->FemaleIndications->HrefValue = "";

			// UseOfThe
			$this->UseOfThe->LinkCustomAttributes = "";
			$this->UseOfThe->HrefValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";

			// Heterotopic
			$this->Heterotopic->LinkCustomAttributes = "";
			$this->Heterotopic->HrefValue = "";

			// TransferDFE
			$this->TransferDFE->LinkCustomAttributes = "";
			$this->TransferDFE->HrefValue = "";

			// Evolutive
			$this->Evolutive->LinkCustomAttributes = "";
			$this->Evolutive->HrefValue = "";

			// Number
			$this->Number->LinkCustomAttributes = "";
			$this->Number->HrefValue = "";

			// SequentialCult
			$this->SequentialCult->LinkCustomAttributes = "";
			$this->SequentialCult->HrefValue = "";

			// TineLapse
			$this->TineLapse->LinkCustomAttributes = "";
			$this->TineLapse->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
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
		if ($this->TreatmentStartDate->Required) {
			if (!$this->TreatmentStartDate->IsDetailKey && $this->TreatmentStartDate->FormValue != NULL && $this->TreatmentStartDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TreatmentStartDate->caption(), $this->TreatmentStartDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->TreatmentStartDate->FormValue)) {
			AddMessage($FormError, $this->TreatmentStartDate->errorMessage());
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->treatment_status->Required) {
			if (!$this->treatment_status->IsDetailKey && $this->treatment_status->FormValue != NULL && $this->treatment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->treatment_status->caption(), $this->treatment_status->RequiredErrorMessage));
			}
		}
		if ($this->ARTCYCLE->Required) {
			if ($this->ARTCYCLE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
			}
		}
		if ($this->IVFCycleNO->Required) {
			if (!$this->IVFCycleNO->IsDetailKey && $this->IVFCycleNO->FormValue != NULL && $this->IVFCycleNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IVFCycleNO->caption(), $this->IVFCycleNO->RequiredErrorMessage));
			}
		}
		if ($this->RESULT->Required) {
			if (!$this->RESULT->IsDetailKey && $this->RESULT->FormValue != NULL && $this->RESULT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RESULT->caption(), $this->RESULT->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
		if ($this->TreatementStopDate->Required) {
			if (!$this->TreatementStopDate->IsDetailKey && $this->TreatementStopDate->FormValue != NULL && $this->TreatementStopDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TreatementStopDate->caption(), $this->TreatementStopDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->TreatementStopDate->FormValue)) {
			AddMessage($FormError, $this->TreatementStopDate->errorMessage());
		}
		if ($this->TypePatient->Required) {
			if (!$this->TypePatient->IsDetailKey && $this->TypePatient->FormValue != NULL && $this->TypePatient->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TypePatient->caption(), $this->TypePatient->RequiredErrorMessage));
			}
		}
		if ($this->Treatment->Required) {
			if (!$this->Treatment->IsDetailKey && $this->Treatment->FormValue != NULL && $this->Treatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
			}
		}
		if ($this->TreatmentTec->Required) {
			if (!$this->TreatmentTec->IsDetailKey && $this->TreatmentTec->FormValue != NULL && $this->TreatmentTec->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TreatmentTec->caption(), $this->TreatmentTec->RequiredErrorMessage));
			}
		}
		if ($this->TypeOfCycle->Required) {
			if ($this->TypeOfCycle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TypeOfCycle->caption(), $this->TypeOfCycle->RequiredErrorMessage));
			}
		}
		if ($this->SpermOrgin->Required) {
			if (!$this->SpermOrgin->IsDetailKey && $this->SpermOrgin->FormValue != NULL && $this->SpermOrgin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SpermOrgin->caption(), $this->SpermOrgin->RequiredErrorMessage));
			}
		}
		if ($this->State->Required) {
			if (!$this->State->IsDetailKey && $this->State->FormValue != NULL && $this->State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
			}
		}
		if ($this->Origin->Required) {
			if (!$this->Origin->IsDetailKey && $this->Origin->FormValue != NULL && $this->Origin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Origin->caption(), $this->Origin->RequiredErrorMessage));
			}
		}
		if ($this->MACS->Required) {
			if ($this->MACS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MACS->caption(), $this->MACS->RequiredErrorMessage));
			}
		}
		if ($this->Technique->Required) {
			if (!$this->Technique->IsDetailKey && $this->Technique->FormValue != NULL && $this->Technique->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Technique->caption(), $this->Technique->RequiredErrorMessage));
			}
		}
		if ($this->PgdPlanning->Required) {
			if ($this->PgdPlanning->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PgdPlanning->caption(), $this->PgdPlanning->RequiredErrorMessage));
			}
		}
		if ($this->IMSI->Required) {
			if (!$this->IMSI->IsDetailKey && $this->IMSI->FormValue != NULL && $this->IMSI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IMSI->caption(), $this->IMSI->RequiredErrorMessage));
			}
		}
		if ($this->SequentialCulture->Required) {
			if (!$this->SequentialCulture->IsDetailKey && $this->SequentialCulture->FormValue != NULL && $this->SequentialCulture->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SequentialCulture->caption(), $this->SequentialCulture->RequiredErrorMessage));
			}
		}
		if ($this->TimeLapse->Required) {
			if (!$this->TimeLapse->IsDetailKey && $this->TimeLapse->FormValue != NULL && $this->TimeLapse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TimeLapse->caption(), $this->TimeLapse->RequiredErrorMessage));
			}
		}
		if ($this->AH->Required) {
			if (!$this->AH->IsDetailKey && $this->AH->FormValue != NULL && $this->AH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AH->caption(), $this->AH->RequiredErrorMessage));
			}
		}
		if ($this->Weight->Required) {
			if (!$this->Weight->IsDetailKey && $this->Weight->FormValue != NULL && $this->Weight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Weight->caption(), $this->Weight->RequiredErrorMessage));
			}
		}
		if ($this->BMI->Required) {
			if (!$this->BMI->IsDetailKey && $this->BMI->FormValue != NULL && $this->BMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BMI->caption(), $this->BMI->RequiredErrorMessage));
			}
		}
		if ($this->MaleIndications->Required) {
			if (!$this->MaleIndications->IsDetailKey && $this->MaleIndications->FormValue != NULL && $this->MaleIndications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaleIndications->caption(), $this->MaleIndications->RequiredErrorMessage));
			}
		}
		if ($this->FemaleIndications->Required) {
			if (!$this->FemaleIndications->IsDetailKey && $this->FemaleIndications->FormValue != NULL && $this->FemaleIndications->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FemaleIndications->caption(), $this->FemaleIndications->RequiredErrorMessage));
			}
		}
		if ($this->UseOfThe->Required) {
			if (!$this->UseOfThe->IsDetailKey && $this->UseOfThe->FormValue != NULL && $this->UseOfThe->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UseOfThe->caption(), $this->UseOfThe->RequiredErrorMessage));
			}
		}
		if ($this->Ectopic->Required) {
			if (!$this->Ectopic->IsDetailKey && $this->Ectopic->FormValue != NULL && $this->Ectopic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Ectopic->caption(), $this->Ectopic->RequiredErrorMessage));
			}
		}
		if ($this->Heterotopic->Required) {
			if (!$this->Heterotopic->IsDetailKey && $this->Heterotopic->FormValue != NULL && $this->Heterotopic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Heterotopic->caption(), $this->Heterotopic->RequiredErrorMessage));
			}
		}
		if ($this->TransferDFE->Required) {
			if ($this->TransferDFE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransferDFE->caption(), $this->TransferDFE->RequiredErrorMessage));
			}
		}
		if ($this->Evolutive->Required) {
			if (!$this->Evolutive->IsDetailKey && $this->Evolutive->FormValue != NULL && $this->Evolutive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Evolutive->caption(), $this->Evolutive->RequiredErrorMessage));
			}
		}
		if ($this->Number->Required) {
			if (!$this->Number->IsDetailKey && $this->Number->FormValue != NULL && $this->Number->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Number->caption(), $this->Number->RequiredErrorMessage));
			}
		}
		if ($this->SequentialCult->Required) {
			if (!$this->SequentialCult->IsDetailKey && $this->SequentialCult->FormValue != NULL && $this->SequentialCult->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SequentialCult->caption(), $this->SequentialCult->RequiredErrorMessage));
			}
		}
		if ($this->TineLapse->Required) {
			if (!$this->TineLapse->IsDetailKey && $this->TineLapse->FormValue != NULL && $this->TineLapse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TineLapse->caption(), $this->TineLapse->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->PartnerID->Required) {
			if (!$this->PartnerID->IsDetailKey && $this->PartnerID->FormValue != NULL && $this->PartnerID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
			}
		}
		if ($this->WifeCell->Required) {
			if (!$this->WifeCell->IsDetailKey && $this->WifeCell->FormValue != NULL && $this->WifeCell->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WifeCell->caption(), $this->WifeCell->RequiredErrorMessage));
			}
		}
		if ($this->HusbandCell->Required) {
			if (!$this->HusbandCell->IsDetailKey && $this->HusbandCell->FormValue != NULL && $this->HusbandCell->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HusbandCell->caption(), $this->HusbandCell->RequiredErrorMessage));
			}
		}
		if ($this->CoupleID->Required) {
			if (!$this->CoupleID->IsDetailKey && $this->CoupleID->FormValue != NULL && $this->CoupleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CoupleID->caption(), $this->CoupleID->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("ivf_outcome", $detailTblVar) && $GLOBALS["ivf_outcome"]->DetailEdit) {
			if (!isset($GLOBALS["ivf_outcome_grid"]))
				$GLOBALS["ivf_outcome_grid"] = new ivf_outcome_grid(); // Get detail page object
			$GLOBALS["ivf_outcome_grid"]->validateGridForm();
		}
		if (in_array("ivf_stimulation_chart", $detailTblVar) && $GLOBALS["ivf_stimulation_chart"]->DetailEdit) {
			if (!isset($GLOBALS["ivf_stimulation_chart_grid"]))
				$GLOBALS["ivf_stimulation_chart_grid"] = new ivf_stimulation_chart_grid(); // Get detail page object
			$GLOBALS["ivf_stimulation_chart_grid"]->validateGridForm();
		}
		if (in_array("ivf_semenanalysisreport", $detailTblVar) && $GLOBALS["ivf_semenanalysisreport"]->DetailEdit) {
			if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
				$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid(); // Get detail page object
			$GLOBALS["ivf_semenanalysisreport_grid"]->validateGridForm();
		}
		if (in_array("ivf_embryology_chart", $detailTblVar) && $GLOBALS["ivf_embryology_chart"]->DetailEdit) {
			if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
				$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid(); // Get detail page object
			$GLOBALS["ivf_embryology_chart_grid"]->validateGridForm();
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

			// Begin transaction
			if ($this->getCurrentDetailTable() != "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// RIDNO
			$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, $this->RIDNO->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, $this->Name->ReadOnly);

			// TreatmentStartDate
			$this->TreatmentStartDate->setDbValueDef($rsnew, UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 7), NULL, $this->TreatmentStartDate->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// treatment_status
			$this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, NULL, $this->treatment_status->ReadOnly);

			// ARTCYCLE
			$this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, NULL, $this->ARTCYCLE->ReadOnly);

			// IVFCycleNO
			$this->IVFCycleNO->setDbValueDef($rsnew, $this->IVFCycleNO->CurrentValue, NULL, $this->IVFCycleNO->ReadOnly);

			// RESULT
			$this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, NULL, $this->RESULT->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// modifiedby
			$this->modifiedby->CurrentValue = CurrentUserName();
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

			// modifieddatetime
			$this->modifieddatetime->CurrentValue = CurrentDateTime();
			$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

			// TreatementStopDate
			$this->TreatementStopDate->setDbValueDef($rsnew, UnFormatDateTime($this->TreatementStopDate->CurrentValue, 7), NULL, $this->TreatementStopDate->ReadOnly);

			// TypePatient
			$this->TypePatient->setDbValueDef($rsnew, $this->TypePatient->CurrentValue, NULL, $this->TypePatient->ReadOnly);

			// Treatment
			$this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, NULL, $this->Treatment->ReadOnly);

			// TreatmentTec
			$this->TreatmentTec->setDbValueDef($rsnew, $this->TreatmentTec->CurrentValue, NULL, $this->TreatmentTec->ReadOnly);

			// TypeOfCycle
			$this->TypeOfCycle->setDbValueDef($rsnew, $this->TypeOfCycle->CurrentValue, NULL, $this->TypeOfCycle->ReadOnly);

			// SpermOrgin
			$this->SpermOrgin->setDbValueDef($rsnew, $this->SpermOrgin->CurrentValue, NULL, $this->SpermOrgin->ReadOnly);

			// State
			$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, $this->State->ReadOnly);

			// Origin
			$this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, NULL, $this->Origin->ReadOnly);

			// MACS
			$this->MACS->setDbValueDef($rsnew, $this->MACS->CurrentValue, NULL, $this->MACS->ReadOnly);

			// Technique
			$this->Technique->setDbValueDef($rsnew, $this->Technique->CurrentValue, NULL, $this->Technique->ReadOnly);

			// PgdPlanning
			$this->PgdPlanning->setDbValueDef($rsnew, $this->PgdPlanning->CurrentValue, NULL, $this->PgdPlanning->ReadOnly);

			// IMSI
			$this->IMSI->setDbValueDef($rsnew, $this->IMSI->CurrentValue, NULL, $this->IMSI->ReadOnly);

			// SequentialCulture
			$this->SequentialCulture->setDbValueDef($rsnew, $this->SequentialCulture->CurrentValue, NULL, $this->SequentialCulture->ReadOnly);

			// TimeLapse
			$this->TimeLapse->setDbValueDef($rsnew, $this->TimeLapse->CurrentValue, NULL, $this->TimeLapse->ReadOnly);

			// AH
			$this->AH->setDbValueDef($rsnew, $this->AH->CurrentValue, NULL, $this->AH->ReadOnly);

			// Weight
			$this->Weight->setDbValueDef($rsnew, $this->Weight->CurrentValue, NULL, $this->Weight->ReadOnly);

			// BMI
			$this->BMI->setDbValueDef($rsnew, $this->BMI->CurrentValue, NULL, $this->BMI->ReadOnly);

			// MaleIndications
			$this->MaleIndications->setDbValueDef($rsnew, $this->MaleIndications->CurrentValue, NULL, $this->MaleIndications->ReadOnly);

			// FemaleIndications
			$this->FemaleIndications->setDbValueDef($rsnew, $this->FemaleIndications->CurrentValue, NULL, $this->FemaleIndications->ReadOnly);

			// UseOfThe
			$this->UseOfThe->setDbValueDef($rsnew, $this->UseOfThe->CurrentValue, NULL, $this->UseOfThe->ReadOnly);

			// Ectopic
			$this->Ectopic->setDbValueDef($rsnew, $this->Ectopic->CurrentValue, NULL, $this->Ectopic->ReadOnly);

			// Heterotopic
			$this->Heterotopic->setDbValueDef($rsnew, $this->Heterotopic->CurrentValue, NULL, $this->Heterotopic->ReadOnly);

			// TransferDFE
			$this->TransferDFE->setDbValueDef($rsnew, $this->TransferDFE->CurrentValue, NULL, $this->TransferDFE->ReadOnly);

			// Evolutive
			$this->Evolutive->setDbValueDef($rsnew, $this->Evolutive->CurrentValue, NULL, $this->Evolutive->ReadOnly);

			// Number
			$this->Number->setDbValueDef($rsnew, $this->Number->CurrentValue, NULL, $this->Number->ReadOnly);

			// SequentialCult
			$this->SequentialCult->setDbValueDef($rsnew, $this->SequentialCult->CurrentValue, NULL, $this->SequentialCult->ReadOnly);

			// TineLapse
			$this->TineLapse->setDbValueDef($rsnew, $this->TineLapse->CurrentValue, NULL, $this->TineLapse->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// PatientID
			$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, $this->PatientID->ReadOnly);

			// PartnerName
			$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, $this->PartnerName->ReadOnly);

			// PartnerID
			$this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, NULL, $this->PartnerID->ReadOnly);

			// WifeCell
			$this->WifeCell->setDbValueDef($rsnew, $this->WifeCell->CurrentValue, NULL, $this->WifeCell->ReadOnly);

			// HusbandCell
			$this->HusbandCell->setDbValueDef($rsnew, $this->HusbandCell->CurrentValue, NULL, $this->HusbandCell->ReadOnly);

			// CoupleID
			$this->CoupleID->setDbValueDef($rsnew, $this->CoupleID->CurrentValue, NULL, $this->CoupleID->ReadOnly);

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

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("ivf_outcome", $detailTblVar) && $GLOBALS["ivf_outcome"]->DetailEdit) {
						if (!isset($GLOBALS["ivf_outcome_grid"]))
							$GLOBALS["ivf_outcome_grid"] = new ivf_outcome_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "ivf_outcome"); // Load user level of detail table
						$editRow = $GLOBALS["ivf_outcome_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("ivf_stimulation_chart", $detailTblVar) && $GLOBALS["ivf_stimulation_chart"]->DetailEdit) {
						if (!isset($GLOBALS["ivf_stimulation_chart_grid"]))
							$GLOBALS["ivf_stimulation_chart_grid"] = new ivf_stimulation_chart_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "ivf_stimulation_chart"); // Load user level of detail table
						$editRow = $GLOBALS["ivf_stimulation_chart_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("ivf_semenanalysisreport", $detailTblVar) && $GLOBALS["ivf_semenanalysisreport"]->DetailEdit) {
						if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
							$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "ivf_semenanalysisreport"); // Load user level of detail table
						$editRow = $GLOBALS["ivf_semenanalysisreport_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("ivf_embryology_chart", $detailTblVar) && $GLOBALS["ivf_embryology_chart"]->DetailEdit) {
						if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
							$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "ivf_embryology_chart"); // Load user level of detail table
						$editRow = $GLOBALS["ivf_embryology_chart_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() != "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
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
			if ($masterTblVar == "ivf") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("RIDNO"))) !== NULL) {
					$GLOBALS["ivf"]->id->setQueryStringValue($parm);
					$this->RIDNO->setQueryStringValue($GLOBALS["ivf"]->id->QueryStringValue);
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Female", Get("Name"))) !== NULL) {
					$GLOBALS["ivf"]->Female->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["ivf"]->Female->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf"]->Female->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "view_donor_ivf") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("RIDNO"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->id->setQueryStringValue($parm);
					$this->RIDNO->setQueryStringValue($GLOBALS["view_donor_ivf"]->id->QueryStringValue);
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Female", Get("Name"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->Female->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["view_donor_ivf"]->Female->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->Female->QueryStringValue))
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
			if ($masterTblVar == "ivf") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("RIDNO"))) !== NULL) {
					$GLOBALS["ivf"]->id->setFormValue($parm);
					$this->RIDNO->setFormValue($GLOBALS["ivf"]->id->FormValue);
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($GLOBALS["ivf"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Female", Post("Name"))) !== NULL) {
					$GLOBALS["ivf"]->Female->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["ivf"]->Female->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
					if (!is_numeric($GLOBALS["ivf"]->Female->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "view_donor_ivf") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("RIDNO"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->id->setFormValue($parm);
					$this->RIDNO->setFormValue($GLOBALS["view_donor_ivf"]->id->FormValue);
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Female", Post("Name"))) !== NULL) {
					$GLOBALS["view_donor_ivf"]->Female->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["view_donor_ivf"]->Female->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
					if (!is_numeric($GLOBALS["view_donor_ivf"]->Female->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "ivf") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
			}
			if ($masterTblVar != "view_donor_ivf") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		$detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
		if ($detailTblVar !== NULL) {
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar != "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("ivf_outcome", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_outcome_grid"]))
					$GLOBALS["ivf_outcome_grid"] = new ivf_outcome_grid();
				if ($GLOBALS["ivf_outcome_grid"]->DetailEdit) {
					$GLOBALS["ivf_outcome_grid"]->CurrentMode = "edit";
					$GLOBALS["ivf_outcome_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["ivf_outcome_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_outcome_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_outcome_grid"]->RIDNO->IsDetailKey = TRUE;
					$GLOBALS["ivf_outcome_grid"]->RIDNO->CurrentValue = $this->RIDNO->CurrentValue;
					$GLOBALS["ivf_outcome_grid"]->RIDNO->setSessionValue($GLOBALS["ivf_outcome_grid"]->RIDNO->CurrentValue);
					$GLOBALS["ivf_outcome_grid"]->Name->IsDetailKey = TRUE;
					$GLOBALS["ivf_outcome_grid"]->Name->CurrentValue = $this->Name->CurrentValue;
					$GLOBALS["ivf_outcome_grid"]->Name->setSessionValue($GLOBALS["ivf_outcome_grid"]->Name->CurrentValue);
					$GLOBALS["ivf_outcome_grid"]->TidNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_outcome_grid"]->TidNo->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_outcome_grid"]->TidNo->setSessionValue($GLOBALS["ivf_outcome_grid"]->TidNo->CurrentValue);
				}
			}
			if (in_array("ivf_stimulation_chart", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_stimulation_chart_grid"]))
					$GLOBALS["ivf_stimulation_chart_grid"] = new ivf_stimulation_chart_grid();
				if ($GLOBALS["ivf_stimulation_chart_grid"]->DetailEdit) {
					$GLOBALS["ivf_stimulation_chart_grid"]->CurrentMode = "edit";
					$GLOBALS["ivf_stimulation_chart_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["ivf_stimulation_chart_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_stimulation_chart_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_stimulation_chart_grid"]->RIDNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_stimulation_chart_grid"]->RIDNo->CurrentValue = $this->RIDNO->CurrentValue;
					$GLOBALS["ivf_stimulation_chart_grid"]->RIDNo->setSessionValue($GLOBALS["ivf_stimulation_chart_grid"]->RIDNo->CurrentValue);
					$GLOBALS["ivf_stimulation_chart_grid"]->Name->IsDetailKey = TRUE;
					$GLOBALS["ivf_stimulation_chart_grid"]->Name->CurrentValue = $this->Name->CurrentValue;
					$GLOBALS["ivf_stimulation_chart_grid"]->Name->setSessionValue($GLOBALS["ivf_stimulation_chart_grid"]->Name->CurrentValue);
					$GLOBALS["ivf_stimulation_chart_grid"]->TidNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_stimulation_chart_grid"]->TidNo->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_stimulation_chart_grid"]->TidNo->setSessionValue($GLOBALS["ivf_stimulation_chart_grid"]->TidNo->CurrentValue);
				}
			}
			if (in_array("ivf_semenanalysisreport", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_semenanalysisreport_grid"]))
					$GLOBALS["ivf_semenanalysisreport_grid"] = new ivf_semenanalysisreport_grid();
				if ($GLOBALS["ivf_semenanalysisreport_grid"]->DetailEdit) {
					$GLOBALS["ivf_semenanalysisreport_grid"]->CurrentMode = "edit";
					$GLOBALS["ivf_semenanalysisreport_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["ivf_semenanalysisreport_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_semenanalysisreport_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_semenanalysisreport_grid"]->RIDNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_semenanalysisreport_grid"]->RIDNo->CurrentValue = $this->RIDNO->CurrentValue;
					$GLOBALS["ivf_semenanalysisreport_grid"]->RIDNo->setSessionValue($GLOBALS["ivf_semenanalysisreport_grid"]->RIDNo->CurrentValue);
					$GLOBALS["ivf_semenanalysisreport_grid"]->PatientName->IsDetailKey = TRUE;
					$GLOBALS["ivf_semenanalysisreport_grid"]->PatientName->CurrentValue = $this->Name->CurrentValue;
					$GLOBALS["ivf_semenanalysisreport_grid"]->PatientName->setSessionValue($GLOBALS["ivf_semenanalysisreport_grid"]->PatientName->CurrentValue);
					$GLOBALS["ivf_semenanalysisreport_grid"]->TidNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_semenanalysisreport_grid"]->TidNo->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_semenanalysisreport_grid"]->TidNo->setSessionValue($GLOBALS["ivf_semenanalysisreport_grid"]->TidNo->CurrentValue);
				}
			}
			if (in_array("ivf_embryology_chart", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
					$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
				if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit) {
					$GLOBALS["ivf_embryology_chart_grid"]->CurrentMode = "edit";
					$GLOBALS["ivf_embryology_chart_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["ivf_embryology_chart_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_embryology_chart_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_embryology_chart_grid"]->RIDNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_embryology_chart_grid"]->RIDNo->CurrentValue = $this->RIDNO->CurrentValue;
					$GLOBALS["ivf_embryology_chart_grid"]->RIDNo->setSessionValue($GLOBALS["ivf_embryology_chart_grid"]->RIDNo->CurrentValue);
					$GLOBALS["ivf_embryology_chart_grid"]->Name->IsDetailKey = TRUE;
					$GLOBALS["ivf_embryology_chart_grid"]->Name->CurrentValue = $this->Name->CurrentValue;
					$GLOBALS["ivf_embryology_chart_grid"]->Name->setSessionValue($GLOBALS["ivf_embryology_chart_grid"]->Name->CurrentValue);
					$GLOBALS["ivf_embryology_chart_grid"]->TidNo->IsDetailKey = TRUE;
					$GLOBALS["ivf_embryology_chart_grid"]->TidNo->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_embryology_chart_grid"]->TidNo->setSessionValue($GLOBALS["ivf_embryology_chart_grid"]->TidNo->CurrentValue);
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->setSessionValue(""); // Clear session key
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_treatment_planlist.php"), "", $this->TableVar, TRUE);
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
				case "x_treatment_status":
					break;
				case "x_ARTCYCLE":
					break;
				case "x_RESULT":
					break;
				case "x_status":
					break;
				case "x_Treatment":
					break;
				case "x_TypeOfCycle":
					break;
				case "x_SpermOrgin":
					break;
				case "x_State":
					break;
				case "x_MACS":
					break;
				case "x_PgdPlanning":
					break;
				case "x_MaleIndications":
					break;
				case "x_FemaleIndications":
					break;
				case "x_Heterotopic":
					break;
				case "x_TransferDFE":
					break;
				case "x_TineLapse":
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
						case "x_status":
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

	   $PageReDirect = $_POST["Repagehistoryview"];
	   if($PageReDirect == "EditFunction")
	   {
	  $url = "ivf_treatment_planview.php?showdetail=&id=".$this->id->CurrentValue."&showmaster=ivf&fk_id=".$_POST["fk_id"]."&fk_Female=".$_POST["fk_Female"];
	   }
	   if($PageReDirect == "ViewFunction")
	   {
	   		$newURL = "ivf_vitals_historyedit.php?id=";
	   		header('Location: '.$newURL);
	   }
	   if($PageReDirect == "NextFunction")
	   {
		$url = "ivf_treatment_planview.php?showdetail=&id=".$this->id->CurrentValue."&showmaster=ivf&fk_id=".$_POST["fk_id"]."&fk_Female=".$_POST["fk_Female"];

			 // $url = "ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$_POST["ivfRIDNO"]."&fk_Female=".$_POST["x_Name"];
	   }
	   if($PageReDirect == "HomeFunction")
	   {
			$url = "FertilityHome.php?id=".$_POST["ivfRIDNO"];	   		
	   }
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
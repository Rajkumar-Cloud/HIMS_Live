<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_outcome_edit extends ivf_outcome
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_outcome';

	// Page object name
	public $PageObjName = "ivf_outcome_edit";

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

		// Table object (ivf_outcome)
		if (!isset($GLOBALS["ivf_outcome"]) || get_class($GLOBALS["ivf_outcome"]) == PROJECT_NAMESPACE . "ivf_outcome") {
			$GLOBALS["ivf_outcome"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_outcome"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_outcome');

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
		global $ivf_outcome;
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
				$doc = new $class($ivf_outcome);
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
					if ($pageName == "ivf_outcomeview.php")
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
					$this->terminate(GetUrl("ivf_outcomelist.php"));
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
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->outcomeDate->setVisibility();
		$this->outcomeDay->setVisibility();
		$this->OPResult->setVisibility();
		$this->Gestation->setVisibility();
		$this->TransferdEmbryos->setVisibility();
		$this->InitalOfSacs->setVisibility();
		$this->ImplimentationRate->setVisibility();
		$this->EmbryoNo->setVisibility();
		$this->ExtrauterineSac->setVisibility();
		$this->PregnancyMonozygotic->setVisibility();
		$this->TypeGestation->setVisibility();
		$this->Urine->setVisibility();
		$this->PTdate->setVisibility();
		$this->Reduced->setVisibility();
		$this->INduced->setVisibility();
		$this->INducedDate->setVisibility();
		$this->Miscarriage->setVisibility();
		$this->Induced1->setVisibility();
		$this->Type->setVisibility();
		$this->IfClinical->setVisibility();
		$this->GADate->setVisibility();
		$this->GA->setVisibility();
		$this->FoetalDeath->setVisibility();
		$this->FerinatalDeath->setVisibility();
		$this->TidNo->setVisibility();
		$this->Ectopic->setVisibility();
		$this->Extra->setVisibility();
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
		// Check permission

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_outcomelist.php");
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
					$this->terminate("ivf_outcomelist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ivf_outcomelist.php")
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

		// Check field name 'outcomeDate' first before field var 'x_outcomeDate'
		$val = $CurrentForm->hasValue("outcomeDate") ? $CurrentForm->getValue("outcomeDate") : $CurrentForm->getValue("x_outcomeDate");
		if (!$this->outcomeDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->outcomeDate->Visible = FALSE; // Disable update for API request
			else
				$this->outcomeDate->setFormValue($val);
			$this->outcomeDate->CurrentValue = UnFormatDateTime($this->outcomeDate->CurrentValue, 0);
		}

		// Check field name 'outcomeDay' first before field var 'x_outcomeDay'
		$val = $CurrentForm->hasValue("outcomeDay") ? $CurrentForm->getValue("outcomeDay") : $CurrentForm->getValue("x_outcomeDay");
		if (!$this->outcomeDay->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->outcomeDay->Visible = FALSE; // Disable update for API request
			else
				$this->outcomeDay->setFormValue($val);
			$this->outcomeDay->CurrentValue = UnFormatDateTime($this->outcomeDay->CurrentValue, 0);
		}

		// Check field name 'OPResult' first before field var 'x_OPResult'
		$val = $CurrentForm->hasValue("OPResult") ? $CurrentForm->getValue("OPResult") : $CurrentForm->getValue("x_OPResult");
		if (!$this->OPResult->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OPResult->Visible = FALSE; // Disable update for API request
			else
				$this->OPResult->setFormValue($val);
		}

		// Check field name 'Gestation' first before field var 'x_Gestation'
		$val = $CurrentForm->hasValue("Gestation") ? $CurrentForm->getValue("Gestation") : $CurrentForm->getValue("x_Gestation");
		if (!$this->Gestation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gestation->Visible = FALSE; // Disable update for API request
			else
				$this->Gestation->setFormValue($val);
		}

		// Check field name 'TransferdEmbryos' first before field var 'x_TransferdEmbryos'
		$val = $CurrentForm->hasValue("TransferdEmbryos") ? $CurrentForm->getValue("TransferdEmbryos") : $CurrentForm->getValue("x_TransferdEmbryos");
		if (!$this->TransferdEmbryos->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TransferdEmbryos->Visible = FALSE; // Disable update for API request
			else
				$this->TransferdEmbryos->setFormValue($val);
		}

		// Check field name 'InitalOfSacs' first before field var 'x_InitalOfSacs'
		$val = $CurrentForm->hasValue("InitalOfSacs") ? $CurrentForm->getValue("InitalOfSacs") : $CurrentForm->getValue("x_InitalOfSacs");
		if (!$this->InitalOfSacs->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->InitalOfSacs->Visible = FALSE; // Disable update for API request
			else
				$this->InitalOfSacs->setFormValue($val);
		}

		// Check field name 'ImplimentationRate' first before field var 'x_ImplimentationRate'
		$val = $CurrentForm->hasValue("ImplimentationRate") ? $CurrentForm->getValue("ImplimentationRate") : $CurrentForm->getValue("x_ImplimentationRate");
		if (!$this->ImplimentationRate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ImplimentationRate->Visible = FALSE; // Disable update for API request
			else
				$this->ImplimentationRate->setFormValue($val);
		}

		// Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
		$val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
		if (!$this->EmbryoNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EmbryoNo->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryoNo->setFormValue($val);
		}

		// Check field name 'ExtrauterineSac' first before field var 'x_ExtrauterineSac'
		$val = $CurrentForm->hasValue("ExtrauterineSac") ? $CurrentForm->getValue("ExtrauterineSac") : $CurrentForm->getValue("x_ExtrauterineSac");
		if (!$this->ExtrauterineSac->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ExtrauterineSac->Visible = FALSE; // Disable update for API request
			else
				$this->ExtrauterineSac->setFormValue($val);
		}

		// Check field name 'PregnancyMonozygotic' first before field var 'x_PregnancyMonozygotic'
		$val = $CurrentForm->hasValue("PregnancyMonozygotic") ? $CurrentForm->getValue("PregnancyMonozygotic") : $CurrentForm->getValue("x_PregnancyMonozygotic");
		if (!$this->PregnancyMonozygotic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PregnancyMonozygotic->Visible = FALSE; // Disable update for API request
			else
				$this->PregnancyMonozygotic->setFormValue($val);
		}

		// Check field name 'TypeGestation' first before field var 'x_TypeGestation'
		$val = $CurrentForm->hasValue("TypeGestation") ? $CurrentForm->getValue("TypeGestation") : $CurrentForm->getValue("x_TypeGestation");
		if (!$this->TypeGestation->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TypeGestation->Visible = FALSE; // Disable update for API request
			else
				$this->TypeGestation->setFormValue($val);
		}

		// Check field name 'Urine' first before field var 'x_Urine'
		$val = $CurrentForm->hasValue("Urine") ? $CurrentForm->getValue("Urine") : $CurrentForm->getValue("x_Urine");
		if (!$this->Urine->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Urine->Visible = FALSE; // Disable update for API request
			else
				$this->Urine->setFormValue($val);
		}

		// Check field name 'PTdate' first before field var 'x_PTdate'
		$val = $CurrentForm->hasValue("PTdate") ? $CurrentForm->getValue("PTdate") : $CurrentForm->getValue("x_PTdate");
		if (!$this->PTdate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PTdate->Visible = FALSE; // Disable update for API request
			else
				$this->PTdate->setFormValue($val);
		}

		// Check field name 'Reduced' first before field var 'x_Reduced'
		$val = $CurrentForm->hasValue("Reduced") ? $CurrentForm->getValue("Reduced") : $CurrentForm->getValue("x_Reduced");
		if (!$this->Reduced->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reduced->Visible = FALSE; // Disable update for API request
			else
				$this->Reduced->setFormValue($val);
		}

		// Check field name 'INduced' first before field var 'x_INduced'
		$val = $CurrentForm->hasValue("INduced") ? $CurrentForm->getValue("INduced") : $CurrentForm->getValue("x_INduced");
		if (!$this->INduced->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->INduced->Visible = FALSE; // Disable update for API request
			else
				$this->INduced->setFormValue($val);
		}

		// Check field name 'INducedDate' first before field var 'x_INducedDate'
		$val = $CurrentForm->hasValue("INducedDate") ? $CurrentForm->getValue("INducedDate") : $CurrentForm->getValue("x_INducedDate");
		if (!$this->INducedDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->INducedDate->Visible = FALSE; // Disable update for API request
			else
				$this->INducedDate->setFormValue($val);
		}

		// Check field name 'Miscarriage' first before field var 'x_Miscarriage'
		$val = $CurrentForm->hasValue("Miscarriage") ? $CurrentForm->getValue("Miscarriage") : $CurrentForm->getValue("x_Miscarriage");
		if (!$this->Miscarriage->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Miscarriage->Visible = FALSE; // Disable update for API request
			else
				$this->Miscarriage->setFormValue($val);
		}

		// Check field name 'Induced1' first before field var 'x_Induced1'
		$val = $CurrentForm->hasValue("Induced1") ? $CurrentForm->getValue("Induced1") : $CurrentForm->getValue("x_Induced1");
		if (!$this->Induced1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Induced1->Visible = FALSE; // Disable update for API request
			else
				$this->Induced1->setFormValue($val);
		}

		// Check field name 'Type' first before field var 'x_Type'
		$val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
		if (!$this->Type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Type->Visible = FALSE; // Disable update for API request
			else
				$this->Type->setFormValue($val);
		}

		// Check field name 'IfClinical' first before field var 'x_IfClinical'
		$val = $CurrentForm->hasValue("IfClinical") ? $CurrentForm->getValue("IfClinical") : $CurrentForm->getValue("x_IfClinical");
		if (!$this->IfClinical->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IfClinical->Visible = FALSE; // Disable update for API request
			else
				$this->IfClinical->setFormValue($val);
		}

		// Check field name 'GADate' first before field var 'x_GADate'
		$val = $CurrentForm->hasValue("GADate") ? $CurrentForm->getValue("GADate") : $CurrentForm->getValue("x_GADate");
		if (!$this->GADate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GADate->Visible = FALSE; // Disable update for API request
			else
				$this->GADate->setFormValue($val);
		}

		// Check field name 'GA' first before field var 'x_GA'
		$val = $CurrentForm->hasValue("GA") ? $CurrentForm->getValue("GA") : $CurrentForm->getValue("x_GA");
		if (!$this->GA->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GA->Visible = FALSE; // Disable update for API request
			else
				$this->GA->setFormValue($val);
		}

		// Check field name 'FoetalDeath' first before field var 'x_FoetalDeath'
		$val = $CurrentForm->hasValue("FoetalDeath") ? $CurrentForm->getValue("FoetalDeath") : $CurrentForm->getValue("x_FoetalDeath");
		if (!$this->FoetalDeath->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FoetalDeath->Visible = FALSE; // Disable update for API request
			else
				$this->FoetalDeath->setFormValue($val);
		}

		// Check field name 'FerinatalDeath' first before field var 'x_FerinatalDeath'
		$val = $CurrentForm->hasValue("FerinatalDeath") ? $CurrentForm->getValue("FerinatalDeath") : $CurrentForm->getValue("x_FerinatalDeath");
		if (!$this->FerinatalDeath->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FerinatalDeath->Visible = FALSE; // Disable update for API request
			else
				$this->FerinatalDeath->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'Ectopic' first before field var 'x_Ectopic'
		$val = $CurrentForm->hasValue("Ectopic") ? $CurrentForm->getValue("Ectopic") : $CurrentForm->getValue("x_Ectopic");
		if (!$this->Ectopic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Ectopic->Visible = FALSE; // Disable update for API request
			else
				$this->Ectopic->setFormValue($val);
		}

		// Check field name 'Extra' first before field var 'x_Extra'
		$val = $CurrentForm->hasValue("Extra") ? $CurrentForm->getValue("Extra") : $CurrentForm->getValue("x_Extra");
		if (!$this->Extra->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Extra->Visible = FALSE; // Disable update for API request
			else
				$this->Extra->setFormValue($val);
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
		$this->treatment_status->CurrentValue = $this->treatment_status->FormValue;
		$this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
		$this->RESULT->CurrentValue = $this->RESULT->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->outcomeDate->CurrentValue = $this->outcomeDate->FormValue;
		$this->outcomeDate->CurrentValue = UnFormatDateTime($this->outcomeDate->CurrentValue, 0);
		$this->outcomeDay->CurrentValue = $this->outcomeDay->FormValue;
		$this->outcomeDay->CurrentValue = UnFormatDateTime($this->outcomeDay->CurrentValue, 0);
		$this->OPResult->CurrentValue = $this->OPResult->FormValue;
		$this->Gestation->CurrentValue = $this->Gestation->FormValue;
		$this->TransferdEmbryos->CurrentValue = $this->TransferdEmbryos->FormValue;
		$this->InitalOfSacs->CurrentValue = $this->InitalOfSacs->FormValue;
		$this->ImplimentationRate->CurrentValue = $this->ImplimentationRate->FormValue;
		$this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
		$this->ExtrauterineSac->CurrentValue = $this->ExtrauterineSac->FormValue;
		$this->PregnancyMonozygotic->CurrentValue = $this->PregnancyMonozygotic->FormValue;
		$this->TypeGestation->CurrentValue = $this->TypeGestation->FormValue;
		$this->Urine->CurrentValue = $this->Urine->FormValue;
		$this->PTdate->CurrentValue = $this->PTdate->FormValue;
		$this->Reduced->CurrentValue = $this->Reduced->FormValue;
		$this->INduced->CurrentValue = $this->INduced->FormValue;
		$this->INducedDate->CurrentValue = $this->INducedDate->FormValue;
		$this->Miscarriage->CurrentValue = $this->Miscarriage->FormValue;
		$this->Induced1->CurrentValue = $this->Induced1->FormValue;
		$this->Type->CurrentValue = $this->Type->FormValue;
		$this->IfClinical->CurrentValue = $this->IfClinical->FormValue;
		$this->GADate->CurrentValue = $this->GADate->FormValue;
		$this->GA->CurrentValue = $this->GA->FormValue;
		$this->FoetalDeath->CurrentValue = $this->FoetalDeath->FormValue;
		$this->FerinatalDeath->CurrentValue = $this->FerinatalDeath->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->Ectopic->CurrentValue = $this->Ectopic->FormValue;
		$this->Extra->CurrentValue = $this->Extra->FormValue;
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
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->outcomeDate->setDbValue($row['outcomeDate']);
		$this->outcomeDay->setDbValue($row['outcomeDay']);
		$this->OPResult->setDbValue($row['OPResult']);
		$this->Gestation->setDbValue($row['Gestation']);
		$this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
		$this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
		$this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
		$this->EmbryoNo->setDbValue($row['EmbryoNo']);
		$this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
		$this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
		$this->TypeGestation->setDbValue($row['TypeGestation']);
		$this->Urine->setDbValue($row['Urine']);
		$this->PTdate->setDbValue($row['PTdate']);
		$this->Reduced->setDbValue($row['Reduced']);
		$this->INduced->setDbValue($row['INduced']);
		$this->INducedDate->setDbValue($row['INducedDate']);
		$this->Miscarriage->setDbValue($row['Miscarriage']);
		$this->Induced1->setDbValue($row['Induced1']);
		$this->Type->setDbValue($row['Type']);
		$this->IfClinical->setDbValue($row['IfClinical']);
		$this->GADate->setDbValue($row['GADate']);
		$this->GA->setDbValue($row['GA']);
		$this->FoetalDeath->setDbValue($row['FoetalDeath']);
		$this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Extra->setDbValue($row['Extra']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['outcomeDate'] = NULL;
		$row['outcomeDay'] = NULL;
		$row['OPResult'] = NULL;
		$row['Gestation'] = NULL;
		$row['TransferdEmbryos'] = NULL;
		$row['InitalOfSacs'] = NULL;
		$row['ImplimentationRate'] = NULL;
		$row['EmbryoNo'] = NULL;
		$row['ExtrauterineSac'] = NULL;
		$row['PregnancyMonozygotic'] = NULL;
		$row['TypeGestation'] = NULL;
		$row['Urine'] = NULL;
		$row['PTdate'] = NULL;
		$row['Reduced'] = NULL;
		$row['INduced'] = NULL;
		$row['INducedDate'] = NULL;
		$row['Miscarriage'] = NULL;
		$row['Induced1'] = NULL;
		$row['Type'] = NULL;
		$row['IfClinical'] = NULL;
		$row['GADate'] = NULL;
		$row['GA'] = NULL;
		$row['FoetalDeath'] = NULL;
		$row['FerinatalDeath'] = NULL;
		$row['TidNo'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Extra'] = NULL;
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
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// outcomeDate
		// outcomeDay
		// OPResult
		// Gestation
		// TransferdEmbryos
		// InitalOfSacs
		// ImplimentationRate
		// EmbryoNo
		// ExtrauterineSac
		// PregnancyMonozygotic
		// TypeGestation
		// Urine
		// PTdate
		// Reduced
		// INduced
		// INducedDate
		// Miscarriage
		// Induced1
		// Type
		// IfClinical
		// GADate
		// GA
		// FoetalDeath
		// FerinatalDeath
		// TidNo
		// Ectopic
		// Extra

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

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// treatment_status
			$this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
			$this->RESULT->ViewCustomAttributes = "";

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

			// outcomeDate
			$this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
			$this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
			$this->outcomeDate->ViewCustomAttributes = "";

			// outcomeDay
			$this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
			$this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
			$this->outcomeDay->ViewCustomAttributes = "";

			// OPResult
			$this->OPResult->ViewValue = $this->OPResult->CurrentValue;
			$this->OPResult->ViewCustomAttributes = "";

			// Gestation
			if (strval($this->Gestation->CurrentValue) != "") {
				$this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
			} else {
				$this->Gestation->ViewValue = NULL;
			}
			$this->Gestation->ViewCustomAttributes = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
			$this->TransferdEmbryos->ViewCustomAttributes = "";

			// InitalOfSacs
			$this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
			$this->InitalOfSacs->ViewCustomAttributes = "";

			// ImplimentationRate
			$this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
			$this->ImplimentationRate->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
			$this->ExtrauterineSac->ViewCustomAttributes = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
			$this->PregnancyMonozygotic->ViewCustomAttributes = "";

			// TypeGestation
			$this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
			$this->TypeGestation->ViewCustomAttributes = "";

			// Urine
			if (strval($this->Urine->CurrentValue) != "") {
				$this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
			} else {
				$this->Urine->ViewValue = NULL;
			}
			$this->Urine->ViewCustomAttributes = "";

			// PTdate
			$this->PTdate->ViewValue = $this->PTdate->CurrentValue;
			$this->PTdate->ViewCustomAttributes = "";

			// Reduced
			$this->Reduced->ViewValue = $this->Reduced->CurrentValue;
			$this->Reduced->ViewCustomAttributes = "";

			// INduced
			$this->INduced->ViewValue = $this->INduced->CurrentValue;
			$this->INduced->ViewCustomAttributes = "";

			// INducedDate
			$this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
			$this->INducedDate->ViewCustomAttributes = "";

			// Miscarriage
			if (strval($this->Miscarriage->CurrentValue) != "") {
				$this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
			} else {
				$this->Miscarriage->ViewValue = NULL;
			}
			$this->Miscarriage->ViewCustomAttributes = "";

			// Induced1
			if (strval($this->Induced1->CurrentValue) != "") {
				$this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
			} else {
				$this->Induced1->ViewValue = NULL;
			}
			$this->Induced1->ViewCustomAttributes = "";

			// Type
			if (strval($this->Type->CurrentValue) != "") {
				$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
			} else {
				$this->Type->ViewValue = NULL;
			}
			$this->Type->ViewCustomAttributes = "";

			// IfClinical
			$this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
			$this->IfClinical->ViewCustomAttributes = "";

			// GADate
			$this->GADate->ViewValue = $this->GADate->CurrentValue;
			$this->GADate->ViewCustomAttributes = "";

			// GA
			$this->GA->ViewValue = $this->GA->CurrentValue;
			$this->GA->ViewCustomAttributes = "";

			// FoetalDeath
			if (strval($this->FoetalDeath->CurrentValue) != "") {
				$this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
			} else {
				$this->FoetalDeath->ViewValue = NULL;
			}
			$this->FoetalDeath->ViewCustomAttributes = "";

			// FerinatalDeath
			if (strval($this->FerinatalDeath->CurrentValue) != "") {
				$this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
			} else {
				$this->FerinatalDeath->ViewValue = NULL;
			}
			$this->FerinatalDeath->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Ectopic
			if (strval($this->Ectopic->CurrentValue) != "") {
				$this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
			} else {
				$this->Ectopic->ViewValue = NULL;
			}
			$this->Ectopic->ViewCustomAttributes = "";

			// Extra
			if (strval($this->Extra->CurrentValue) != "") {
				$this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
			} else {
				$this->Extra->ViewValue = NULL;
			}
			$this->Extra->ViewCustomAttributes = "";

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

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

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

			// outcomeDate
			$this->outcomeDate->LinkCustomAttributes = "";
			$this->outcomeDate->HrefValue = "";
			$this->outcomeDate->TooltipValue = "";

			// outcomeDay
			$this->outcomeDay->LinkCustomAttributes = "";
			$this->outcomeDay->HrefValue = "";
			$this->outcomeDay->TooltipValue = "";

			// OPResult
			$this->OPResult->LinkCustomAttributes = "";
			$this->OPResult->HrefValue = "";
			$this->OPResult->TooltipValue = "";

			// Gestation
			$this->Gestation->LinkCustomAttributes = "";
			$this->Gestation->HrefValue = "";
			$this->Gestation->TooltipValue = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->LinkCustomAttributes = "";
			$this->TransferdEmbryos->HrefValue = "";
			$this->TransferdEmbryos->TooltipValue = "";

			// InitalOfSacs
			$this->InitalOfSacs->LinkCustomAttributes = "";
			$this->InitalOfSacs->HrefValue = "";
			$this->InitalOfSacs->TooltipValue = "";

			// ImplimentationRate
			$this->ImplimentationRate->LinkCustomAttributes = "";
			$this->ImplimentationRate->HrefValue = "";
			$this->ImplimentationRate->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->LinkCustomAttributes = "";
			$this->ExtrauterineSac->HrefValue = "";
			$this->ExtrauterineSac->TooltipValue = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->LinkCustomAttributes = "";
			$this->PregnancyMonozygotic->HrefValue = "";
			$this->PregnancyMonozygotic->TooltipValue = "";

			// TypeGestation
			$this->TypeGestation->LinkCustomAttributes = "";
			$this->TypeGestation->HrefValue = "";
			$this->TypeGestation->TooltipValue = "";

			// Urine
			$this->Urine->LinkCustomAttributes = "";
			$this->Urine->HrefValue = "";
			$this->Urine->TooltipValue = "";

			// PTdate
			$this->PTdate->LinkCustomAttributes = "";
			$this->PTdate->HrefValue = "";
			$this->PTdate->TooltipValue = "";

			// Reduced
			$this->Reduced->LinkCustomAttributes = "";
			$this->Reduced->HrefValue = "";
			$this->Reduced->TooltipValue = "";

			// INduced
			$this->INduced->LinkCustomAttributes = "";
			$this->INduced->HrefValue = "";
			$this->INduced->TooltipValue = "";

			// INducedDate
			$this->INducedDate->LinkCustomAttributes = "";
			$this->INducedDate->HrefValue = "";
			$this->INducedDate->TooltipValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";
			$this->Miscarriage->TooltipValue = "";

			// Induced1
			$this->Induced1->LinkCustomAttributes = "";
			$this->Induced1->HrefValue = "";
			$this->Induced1->TooltipValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";
			$this->Type->TooltipValue = "";

			// IfClinical
			$this->IfClinical->LinkCustomAttributes = "";
			$this->IfClinical->HrefValue = "";
			$this->IfClinical->TooltipValue = "";

			// GADate
			$this->GADate->LinkCustomAttributes = "";
			$this->GADate->HrefValue = "";
			$this->GADate->TooltipValue = "";

			// GA
			$this->GA->LinkCustomAttributes = "";
			$this->GA->HrefValue = "";
			$this->GA->TooltipValue = "";

			// FoetalDeath
			$this->FoetalDeath->LinkCustomAttributes = "";
			$this->FoetalDeath->HrefValue = "";
			$this->FoetalDeath->TooltipValue = "";

			// FerinatalDeath
			$this->FerinatalDeath->LinkCustomAttributes = "";
			$this->FerinatalDeath->HrefValue = "";
			$this->FerinatalDeath->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";
			$this->Ectopic->TooltipValue = "";

			// Extra
			$this->Extra->LinkCustomAttributes = "";
			$this->Extra->HrefValue = "";
			$this->Extra->TooltipValue = "";
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
			if (!$this->treatment_status->Raw)
				$this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
			$this->treatment_status->EditValue = HtmlEncode($this->treatment_status->CurrentValue);
			$this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

			// ARTCYCLE
			$this->ARTCYCLE->EditAttrs["class"] = "form-control";
			$this->ARTCYCLE->EditCustomAttributes = "";
			if (!$this->ARTCYCLE->Raw)
				$this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
			$this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->CurrentValue);
			$this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

			// RESULT
			$this->RESULT->EditAttrs["class"] = "form-control";
			$this->RESULT->EditCustomAttributes = "";
			if (!$this->RESULT->Raw)
				$this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
			$this->RESULT->EditValue = HtmlEncode($this->RESULT->CurrentValue);
			$this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// outcomeDate
			$this->outcomeDate->EditAttrs["class"] = "form-control";
			$this->outcomeDate->EditCustomAttributes = "";
			$this->outcomeDate->EditValue = HtmlEncode(FormatDateTime($this->outcomeDate->CurrentValue, 8));
			$this->outcomeDate->PlaceHolder = RemoveHtml($this->outcomeDate->caption());

			// outcomeDay
			$this->outcomeDay->EditAttrs["class"] = "form-control";
			$this->outcomeDay->EditCustomAttributes = "";
			$this->outcomeDay->EditValue = HtmlEncode(FormatDateTime($this->outcomeDay->CurrentValue, 8));
			$this->outcomeDay->PlaceHolder = RemoveHtml($this->outcomeDay->caption());

			// OPResult
			$this->OPResult->EditAttrs["class"] = "form-control";
			$this->OPResult->EditCustomAttributes = "";
			if (!$this->OPResult->Raw)
				$this->OPResult->CurrentValue = HtmlDecode($this->OPResult->CurrentValue);
			$this->OPResult->EditValue = HtmlEncode($this->OPResult->CurrentValue);
			$this->OPResult->PlaceHolder = RemoveHtml($this->OPResult->caption());

			// Gestation
			$this->Gestation->EditCustomAttributes = "";
			$this->Gestation->EditValue = $this->Gestation->options(FALSE);

			// TransferdEmbryos
			$this->TransferdEmbryos->EditAttrs["class"] = "form-control";
			$this->TransferdEmbryos->EditCustomAttributes = "";
			if (!$this->TransferdEmbryos->Raw)
				$this->TransferdEmbryos->CurrentValue = HtmlDecode($this->TransferdEmbryos->CurrentValue);
			$this->TransferdEmbryos->EditValue = HtmlEncode($this->TransferdEmbryos->CurrentValue);
			$this->TransferdEmbryos->PlaceHolder = RemoveHtml($this->TransferdEmbryos->caption());

			// InitalOfSacs
			$this->InitalOfSacs->EditAttrs["class"] = "form-control";
			$this->InitalOfSacs->EditCustomAttributes = "";
			if (!$this->InitalOfSacs->Raw)
				$this->InitalOfSacs->CurrentValue = HtmlDecode($this->InitalOfSacs->CurrentValue);
			$this->InitalOfSacs->EditValue = HtmlEncode($this->InitalOfSacs->CurrentValue);
			$this->InitalOfSacs->PlaceHolder = RemoveHtml($this->InitalOfSacs->caption());

			// ImplimentationRate
			$this->ImplimentationRate->EditAttrs["class"] = "form-control";
			$this->ImplimentationRate->EditCustomAttributes = "";
			if (!$this->ImplimentationRate->Raw)
				$this->ImplimentationRate->CurrentValue = HtmlDecode($this->ImplimentationRate->CurrentValue);
			$this->ImplimentationRate->EditValue = HtmlEncode($this->ImplimentationRate->CurrentValue);
			$this->ImplimentationRate->PlaceHolder = RemoveHtml($this->ImplimentationRate->caption());

			// EmbryoNo
			$this->EmbryoNo->EditAttrs["class"] = "form-control";
			$this->EmbryoNo->EditCustomAttributes = "";
			if (!$this->EmbryoNo->Raw)
				$this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
			$this->EmbryoNo->EditValue = HtmlEncode($this->EmbryoNo->CurrentValue);
			$this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

			// ExtrauterineSac
			$this->ExtrauterineSac->EditAttrs["class"] = "form-control";
			$this->ExtrauterineSac->EditCustomAttributes = "";
			if (!$this->ExtrauterineSac->Raw)
				$this->ExtrauterineSac->CurrentValue = HtmlDecode($this->ExtrauterineSac->CurrentValue);
			$this->ExtrauterineSac->EditValue = HtmlEncode($this->ExtrauterineSac->CurrentValue);
			$this->ExtrauterineSac->PlaceHolder = RemoveHtml($this->ExtrauterineSac->caption());

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->EditAttrs["class"] = "form-control";
			$this->PregnancyMonozygotic->EditCustomAttributes = "";
			if (!$this->PregnancyMonozygotic->Raw)
				$this->PregnancyMonozygotic->CurrentValue = HtmlDecode($this->PregnancyMonozygotic->CurrentValue);
			$this->PregnancyMonozygotic->EditValue = HtmlEncode($this->PregnancyMonozygotic->CurrentValue);
			$this->PregnancyMonozygotic->PlaceHolder = RemoveHtml($this->PregnancyMonozygotic->caption());

			// TypeGestation
			$this->TypeGestation->EditAttrs["class"] = "form-control";
			$this->TypeGestation->EditCustomAttributes = "";
			if (!$this->TypeGestation->Raw)
				$this->TypeGestation->CurrentValue = HtmlDecode($this->TypeGestation->CurrentValue);
			$this->TypeGestation->EditValue = HtmlEncode($this->TypeGestation->CurrentValue);
			$this->TypeGestation->PlaceHolder = RemoveHtml($this->TypeGestation->caption());

			// Urine
			$this->Urine->EditAttrs["class"] = "form-control";
			$this->Urine->EditCustomAttributes = "";
			$this->Urine->EditValue = $this->Urine->options(TRUE);

			// PTdate
			$this->PTdate->EditAttrs["class"] = "form-control";
			$this->PTdate->EditCustomAttributes = "";
			if (!$this->PTdate->Raw)
				$this->PTdate->CurrentValue = HtmlDecode($this->PTdate->CurrentValue);
			$this->PTdate->EditValue = HtmlEncode($this->PTdate->CurrentValue);
			$this->PTdate->PlaceHolder = RemoveHtml($this->PTdate->caption());

			// Reduced
			$this->Reduced->EditAttrs["class"] = "form-control";
			$this->Reduced->EditCustomAttributes = "";
			if (!$this->Reduced->Raw)
				$this->Reduced->CurrentValue = HtmlDecode($this->Reduced->CurrentValue);
			$this->Reduced->EditValue = HtmlEncode($this->Reduced->CurrentValue);
			$this->Reduced->PlaceHolder = RemoveHtml($this->Reduced->caption());

			// INduced
			$this->INduced->EditAttrs["class"] = "form-control";
			$this->INduced->EditCustomAttributes = "";
			if (!$this->INduced->Raw)
				$this->INduced->CurrentValue = HtmlDecode($this->INduced->CurrentValue);
			$this->INduced->EditValue = HtmlEncode($this->INduced->CurrentValue);
			$this->INduced->PlaceHolder = RemoveHtml($this->INduced->caption());

			// INducedDate
			$this->INducedDate->EditAttrs["class"] = "form-control";
			$this->INducedDate->EditCustomAttributes = "";
			if (!$this->INducedDate->Raw)
				$this->INducedDate->CurrentValue = HtmlDecode($this->INducedDate->CurrentValue);
			$this->INducedDate->EditValue = HtmlEncode($this->INducedDate->CurrentValue);
			$this->INducedDate->PlaceHolder = RemoveHtml($this->INducedDate->caption());

			// Miscarriage
			$this->Miscarriage->EditCustomAttributes = "";
			$this->Miscarriage->EditValue = $this->Miscarriage->options(FALSE);

			// Induced1
			$this->Induced1->EditCustomAttributes = "";
			$this->Induced1->EditValue = $this->Induced1->options(FALSE);

			// Type
			$this->Type->EditCustomAttributes = "";
			$this->Type->EditValue = $this->Type->options(FALSE);

			// IfClinical
			$this->IfClinical->EditAttrs["class"] = "form-control";
			$this->IfClinical->EditCustomAttributes = "";
			if (!$this->IfClinical->Raw)
				$this->IfClinical->CurrentValue = HtmlDecode($this->IfClinical->CurrentValue);
			$this->IfClinical->EditValue = HtmlEncode($this->IfClinical->CurrentValue);
			$this->IfClinical->PlaceHolder = RemoveHtml($this->IfClinical->caption());

			// GADate
			$this->GADate->EditAttrs["class"] = "form-control";
			$this->GADate->EditCustomAttributes = "";
			if (!$this->GADate->Raw)
				$this->GADate->CurrentValue = HtmlDecode($this->GADate->CurrentValue);
			$this->GADate->EditValue = HtmlEncode($this->GADate->CurrentValue);
			$this->GADate->PlaceHolder = RemoveHtml($this->GADate->caption());

			// GA
			$this->GA->EditAttrs["class"] = "form-control";
			$this->GA->EditCustomAttributes = "";
			if (!$this->GA->Raw)
				$this->GA->CurrentValue = HtmlDecode($this->GA->CurrentValue);
			$this->GA->EditValue = HtmlEncode($this->GA->CurrentValue);
			$this->GA->PlaceHolder = RemoveHtml($this->GA->caption());

			// FoetalDeath
			$this->FoetalDeath->EditAttrs["class"] = "form-control";
			$this->FoetalDeath->EditCustomAttributes = "";
			$this->FoetalDeath->EditValue = $this->FoetalDeath->options(TRUE);

			// FerinatalDeath
			$this->FerinatalDeath->EditAttrs["class"] = "form-control";
			$this->FerinatalDeath->EditCustomAttributes = "";
			$this->FerinatalDeath->EditValue = $this->FerinatalDeath->options(TRUE);

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() != "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
				$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
				$this->TidNo->ViewCustomAttributes = "";
			} else {
				$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
				$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// Ectopic
			$this->Ectopic->EditCustomAttributes = "";
			$this->Ectopic->EditValue = $this->Ectopic->options(FALSE);

			// Extra
			$this->Extra->EditCustomAttributes = "";
			$this->Extra->EditValue = $this->Extra->options(FALSE);

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

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";

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

			// outcomeDate
			$this->outcomeDate->LinkCustomAttributes = "";
			$this->outcomeDate->HrefValue = "";

			// outcomeDay
			$this->outcomeDay->LinkCustomAttributes = "";
			$this->outcomeDay->HrefValue = "";

			// OPResult
			$this->OPResult->LinkCustomAttributes = "";
			$this->OPResult->HrefValue = "";

			// Gestation
			$this->Gestation->LinkCustomAttributes = "";
			$this->Gestation->HrefValue = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->LinkCustomAttributes = "";
			$this->TransferdEmbryos->HrefValue = "";

			// InitalOfSacs
			$this->InitalOfSacs->LinkCustomAttributes = "";
			$this->InitalOfSacs->HrefValue = "";

			// ImplimentationRate
			$this->ImplimentationRate->LinkCustomAttributes = "";
			$this->ImplimentationRate->HrefValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->LinkCustomAttributes = "";
			$this->ExtrauterineSac->HrefValue = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->LinkCustomAttributes = "";
			$this->PregnancyMonozygotic->HrefValue = "";

			// TypeGestation
			$this->TypeGestation->LinkCustomAttributes = "";
			$this->TypeGestation->HrefValue = "";

			// Urine
			$this->Urine->LinkCustomAttributes = "";
			$this->Urine->HrefValue = "";

			// PTdate
			$this->PTdate->LinkCustomAttributes = "";
			$this->PTdate->HrefValue = "";

			// Reduced
			$this->Reduced->LinkCustomAttributes = "";
			$this->Reduced->HrefValue = "";

			// INduced
			$this->INduced->LinkCustomAttributes = "";
			$this->INduced->HrefValue = "";

			// INducedDate
			$this->INducedDate->LinkCustomAttributes = "";
			$this->INducedDate->HrefValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";

			// Induced1
			$this->Induced1->LinkCustomAttributes = "";
			$this->Induced1->HrefValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";

			// IfClinical
			$this->IfClinical->LinkCustomAttributes = "";
			$this->IfClinical->HrefValue = "";

			// GADate
			$this->GADate->LinkCustomAttributes = "";
			$this->GADate->HrefValue = "";

			// GA
			$this->GA->LinkCustomAttributes = "";
			$this->GA->HrefValue = "";

			// FoetalDeath
			$this->FoetalDeath->LinkCustomAttributes = "";
			$this->FoetalDeath->HrefValue = "";

			// FerinatalDeath
			$this->FerinatalDeath->LinkCustomAttributes = "";
			$this->FerinatalDeath->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";

			// Extra
			$this->Extra->LinkCustomAttributes = "";
			$this->Extra->HrefValue = "";
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
		if ($this->treatment_status->Required) {
			if (!$this->treatment_status->IsDetailKey && $this->treatment_status->FormValue != NULL && $this->treatment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->treatment_status->caption(), $this->treatment_status->RequiredErrorMessage));
			}
		}
		if ($this->ARTCYCLE->Required) {
			if (!$this->ARTCYCLE->IsDetailKey && $this->ARTCYCLE->FormValue != NULL && $this->ARTCYCLE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
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
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->createdby->FormValue)) {
			AddMessage($FormError, $this->createdby->errorMessage());
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->createddatetime->FormValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->modifiedby->FormValue)) {
			AddMessage($FormError, $this->modifiedby->errorMessage());
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->modifieddatetime->FormValue)) {
			AddMessage($FormError, $this->modifieddatetime->errorMessage());
		}
		if ($this->outcomeDate->Required) {
			if (!$this->outcomeDate->IsDetailKey && $this->outcomeDate->FormValue != NULL && $this->outcomeDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->outcomeDate->caption(), $this->outcomeDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->outcomeDate->FormValue)) {
			AddMessage($FormError, $this->outcomeDate->errorMessage());
		}
		if ($this->outcomeDay->Required) {
			if (!$this->outcomeDay->IsDetailKey && $this->outcomeDay->FormValue != NULL && $this->outcomeDay->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->outcomeDay->caption(), $this->outcomeDay->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->outcomeDay->FormValue)) {
			AddMessage($FormError, $this->outcomeDay->errorMessage());
		}
		if ($this->OPResult->Required) {
			if (!$this->OPResult->IsDetailKey && $this->OPResult->FormValue != NULL && $this->OPResult->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPResult->caption(), $this->OPResult->RequiredErrorMessage));
			}
		}
		if ($this->Gestation->Required) {
			if ($this->Gestation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gestation->caption(), $this->Gestation->RequiredErrorMessage));
			}
		}
		if ($this->TransferdEmbryos->Required) {
			if (!$this->TransferdEmbryos->IsDetailKey && $this->TransferdEmbryos->FormValue != NULL && $this->TransferdEmbryos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransferdEmbryos->caption(), $this->TransferdEmbryos->RequiredErrorMessage));
			}
		}
		if ($this->InitalOfSacs->Required) {
			if (!$this->InitalOfSacs->IsDetailKey && $this->InitalOfSacs->FormValue != NULL && $this->InitalOfSacs->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InitalOfSacs->caption(), $this->InitalOfSacs->RequiredErrorMessage));
			}
		}
		if ($this->ImplimentationRate->Required) {
			if (!$this->ImplimentationRate->IsDetailKey && $this->ImplimentationRate->FormValue != NULL && $this->ImplimentationRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ImplimentationRate->caption(), $this->ImplimentationRate->RequiredErrorMessage));
			}
		}
		if ($this->EmbryoNo->Required) {
			if (!$this->EmbryoNo->IsDetailKey && $this->EmbryoNo->FormValue != NULL && $this->EmbryoNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
			}
		}
		if ($this->ExtrauterineSac->Required) {
			if (!$this->ExtrauterineSac->IsDetailKey && $this->ExtrauterineSac->FormValue != NULL && $this->ExtrauterineSac->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExtrauterineSac->caption(), $this->ExtrauterineSac->RequiredErrorMessage));
			}
		}
		if ($this->PregnancyMonozygotic->Required) {
			if (!$this->PregnancyMonozygotic->IsDetailKey && $this->PregnancyMonozygotic->FormValue != NULL && $this->PregnancyMonozygotic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PregnancyMonozygotic->caption(), $this->PregnancyMonozygotic->RequiredErrorMessage));
			}
		}
		if ($this->TypeGestation->Required) {
			if (!$this->TypeGestation->IsDetailKey && $this->TypeGestation->FormValue != NULL && $this->TypeGestation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TypeGestation->caption(), $this->TypeGestation->RequiredErrorMessage));
			}
		}
		if ($this->Urine->Required) {
			if (!$this->Urine->IsDetailKey && $this->Urine->FormValue != NULL && $this->Urine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Urine->caption(), $this->Urine->RequiredErrorMessage));
			}
		}
		if ($this->PTdate->Required) {
			if (!$this->PTdate->IsDetailKey && $this->PTdate->FormValue != NULL && $this->PTdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PTdate->caption(), $this->PTdate->RequiredErrorMessage));
			}
		}
		if ($this->Reduced->Required) {
			if (!$this->Reduced->IsDetailKey && $this->Reduced->FormValue != NULL && $this->Reduced->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reduced->caption(), $this->Reduced->RequiredErrorMessage));
			}
		}
		if ($this->INduced->Required) {
			if (!$this->INduced->IsDetailKey && $this->INduced->FormValue != NULL && $this->INduced->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->INduced->caption(), $this->INduced->RequiredErrorMessage));
			}
		}
		if ($this->INducedDate->Required) {
			if (!$this->INducedDate->IsDetailKey && $this->INducedDate->FormValue != NULL && $this->INducedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->INducedDate->caption(), $this->INducedDate->RequiredErrorMessage));
			}
		}
		if ($this->Miscarriage->Required) {
			if ($this->Miscarriage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Miscarriage->caption(), $this->Miscarriage->RequiredErrorMessage));
			}
		}
		if ($this->Induced1->Required) {
			if ($this->Induced1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Induced1->caption(), $this->Induced1->RequiredErrorMessage));
			}
		}
		if ($this->Type->Required) {
			if ($this->Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
			}
		}
		if ($this->IfClinical->Required) {
			if (!$this->IfClinical->IsDetailKey && $this->IfClinical->FormValue != NULL && $this->IfClinical->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IfClinical->caption(), $this->IfClinical->RequiredErrorMessage));
			}
		}
		if ($this->GADate->Required) {
			if (!$this->GADate->IsDetailKey && $this->GADate->FormValue != NULL && $this->GADate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GADate->caption(), $this->GADate->RequiredErrorMessage));
			}
		}
		if ($this->GA->Required) {
			if (!$this->GA->IsDetailKey && $this->GA->FormValue != NULL && $this->GA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GA->caption(), $this->GA->RequiredErrorMessage));
			}
		}
		if ($this->FoetalDeath->Required) {
			if (!$this->FoetalDeath->IsDetailKey && $this->FoetalDeath->FormValue != NULL && $this->FoetalDeath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FoetalDeath->caption(), $this->FoetalDeath->RequiredErrorMessage));
			}
		}
		if ($this->FerinatalDeath->Required) {
			if (!$this->FerinatalDeath->IsDetailKey && $this->FerinatalDeath->FormValue != NULL && $this->FerinatalDeath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FerinatalDeath->caption(), $this->FerinatalDeath->RequiredErrorMessage));
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
		if ($this->Ectopic->Required) {
			if ($this->Ectopic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Ectopic->caption(), $this->Ectopic->RequiredErrorMessage));
			}
		}
		if ($this->Extra->Required) {
			if ($this->Extra->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Extra->caption(), $this->Extra->RequiredErrorMessage));
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

			// treatment_status
			$this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, NULL, $this->treatment_status->ReadOnly);

			// ARTCYCLE
			$this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, NULL, $this->ARTCYCLE->ReadOnly);

			// RESULT
			$this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, NULL, $this->RESULT->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// createdby
			$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL, $this->createdby->ReadOnly);

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), NULL, $this->createddatetime->ReadOnly);

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL, $this->modifiedby->ReadOnly);

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), NULL, $this->modifieddatetime->ReadOnly);

			// outcomeDate
			$this->outcomeDate->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDate->CurrentValue, 0), NULL, $this->outcomeDate->ReadOnly);

			// outcomeDay
			$this->outcomeDay->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDay->CurrentValue, 0), NULL, $this->outcomeDay->ReadOnly);

			// OPResult
			$this->OPResult->setDbValueDef($rsnew, $this->OPResult->CurrentValue, NULL, $this->OPResult->ReadOnly);

			// Gestation
			$this->Gestation->setDbValueDef($rsnew, $this->Gestation->CurrentValue, NULL, $this->Gestation->ReadOnly);

			// TransferdEmbryos
			$this->TransferdEmbryos->setDbValueDef($rsnew, $this->TransferdEmbryos->CurrentValue, NULL, $this->TransferdEmbryos->ReadOnly);

			// InitalOfSacs
			$this->InitalOfSacs->setDbValueDef($rsnew, $this->InitalOfSacs->CurrentValue, NULL, $this->InitalOfSacs->ReadOnly);

			// ImplimentationRate
			$this->ImplimentationRate->setDbValueDef($rsnew, $this->ImplimentationRate->CurrentValue, NULL, $this->ImplimentationRate->ReadOnly);

			// EmbryoNo
			$this->EmbryoNo->setDbValueDef($rsnew, $this->EmbryoNo->CurrentValue, NULL, $this->EmbryoNo->ReadOnly);

			// ExtrauterineSac
			$this->ExtrauterineSac->setDbValueDef($rsnew, $this->ExtrauterineSac->CurrentValue, NULL, $this->ExtrauterineSac->ReadOnly);

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->setDbValueDef($rsnew, $this->PregnancyMonozygotic->CurrentValue, NULL, $this->PregnancyMonozygotic->ReadOnly);

			// TypeGestation
			$this->TypeGestation->setDbValueDef($rsnew, $this->TypeGestation->CurrentValue, NULL, $this->TypeGestation->ReadOnly);

			// Urine
			$this->Urine->setDbValueDef($rsnew, $this->Urine->CurrentValue, NULL, $this->Urine->ReadOnly);

			// PTdate
			$this->PTdate->setDbValueDef($rsnew, $this->PTdate->CurrentValue, NULL, $this->PTdate->ReadOnly);

			// Reduced
			$this->Reduced->setDbValueDef($rsnew, $this->Reduced->CurrentValue, NULL, $this->Reduced->ReadOnly);

			// INduced
			$this->INduced->setDbValueDef($rsnew, $this->INduced->CurrentValue, NULL, $this->INduced->ReadOnly);

			// INducedDate
			$this->INducedDate->setDbValueDef($rsnew, $this->INducedDate->CurrentValue, NULL, $this->INducedDate->ReadOnly);

			// Miscarriage
			$this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, NULL, $this->Miscarriage->ReadOnly);

			// Induced1
			$this->Induced1->setDbValueDef($rsnew, $this->Induced1->CurrentValue, NULL, $this->Induced1->ReadOnly);

			// Type
			$this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, NULL, $this->Type->ReadOnly);

			// IfClinical
			$this->IfClinical->setDbValueDef($rsnew, $this->IfClinical->CurrentValue, NULL, $this->IfClinical->ReadOnly);

			// GADate
			$this->GADate->setDbValueDef($rsnew, $this->GADate->CurrentValue, NULL, $this->GADate->ReadOnly);

			// GA
			$this->GA->setDbValueDef($rsnew, $this->GA->CurrentValue, NULL, $this->GA->ReadOnly);

			// FoetalDeath
			$this->FoetalDeath->setDbValueDef($rsnew, $this->FoetalDeath->CurrentValue, NULL, $this->FoetalDeath->ReadOnly);

			// FerinatalDeath
			$this->FerinatalDeath->setDbValueDef($rsnew, $this->FerinatalDeath->CurrentValue, NULL, $this->FerinatalDeath->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// Ectopic
			$this->Ectopic->setDbValueDef($rsnew, $this->Ectopic->CurrentValue, NULL, $this->Ectopic->ReadOnly);

			// Extra
			$this->Extra->setDbValueDef($rsnew, $this->Extra->CurrentValue, NULL, $this->Extra->ReadOnly);

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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Get("fk_RIDNO", Get("RIDNO"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNO->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue);
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("Name"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->Name->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue))
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Post("fk_RIDNO", Post("RIDNO"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setFormValue($parm);
					$this->RIDNO->setFormValue($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue);
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("Name"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["ivf_treatment_plan"]->Name->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["ivf_treatment_plan"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->FormValue))
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
			if ($masterTblVar != "ivf_treatment_plan") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_outcomelist.php"), "", $this->TableVar, TRUE);
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
				case "x_Gestation":
					break;
				case "x_Urine":
					break;
				case "x_Miscarriage":
					break;
				case "x_Induced1":
					break;
				case "x_Type":
					break;
				case "x_FoetalDeath":
					break;
				case "x_FerinatalDeath":
					break;
				case "x_Ectopic":
					break;
				case "x_Extra":
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
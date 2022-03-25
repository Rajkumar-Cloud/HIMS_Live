<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_prescription_edit extends patient_prescription
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_prescription';

	// Page object name
	public $PageObjName = "patient_prescription_edit";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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
		$this->Reception->Required = FALSE;
		$this->PatientId->Required = FALSE;

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

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("patient_prescriptionlist.php");
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
					$this->terminate("patient_prescriptionlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patient_prescriptionlist.php")
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

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'Medicine' first before field var 'x_Medicine'
		$val = $CurrentForm->hasValue("Medicine") ? $CurrentForm->getValue("Medicine") : $CurrentForm->getValue("x_Medicine");
		if (!$this->Medicine->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Medicine->Visible = FALSE; // Disable update for API request
			else
				$this->Medicine->setFormValue($val);
		}

		// Check field name 'M' first before field var 'x_M'
		$val = $CurrentForm->hasValue("M") ? $CurrentForm->getValue("M") : $CurrentForm->getValue("x_M");
		if (!$this->M->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->M->Visible = FALSE; // Disable update for API request
			else
				$this->M->setFormValue($val);
		}

		// Check field name 'A' first before field var 'x_A'
		$val = $CurrentForm->hasValue("A") ? $CurrentForm->getValue("A") : $CurrentForm->getValue("x_A");
		if (!$this->A->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A->Visible = FALSE; // Disable update for API request
			else
				$this->A->setFormValue($val);
		}

		// Check field name 'N' first before field var 'x_N'
		$val = $CurrentForm->hasValue("N") ? $CurrentForm->getValue("N") : $CurrentForm->getValue("x_N");
		if (!$this->N->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->N->Visible = FALSE; // Disable update for API request
			else
				$this->N->setFormValue($val);
		}

		// Check field name 'NoOfDays' first before field var 'x_NoOfDays'
		$val = $CurrentForm->hasValue("NoOfDays") ? $CurrentForm->getValue("NoOfDays") : $CurrentForm->getValue("x_NoOfDays");
		if (!$this->NoOfDays->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoOfDays->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfDays->setFormValue($val);
		}

		// Check field name 'PreRoute' first before field var 'x_PreRoute'
		$val = $CurrentForm->hasValue("PreRoute") ? $CurrentForm->getValue("PreRoute") : $CurrentForm->getValue("x_PreRoute");
		if (!$this->PreRoute->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PreRoute->Visible = FALSE; // Disable update for API request
			else
				$this->PreRoute->setFormValue($val);
		}

		// Check field name 'TimeOfTaking' first before field var 'x_TimeOfTaking'
		$val = $CurrentForm->hasValue("TimeOfTaking") ? $CurrentForm->getValue("TimeOfTaking") : $CurrentForm->getValue("x_TimeOfTaking");
		if (!$this->TimeOfTaking->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TimeOfTaking->Visible = FALSE; // Disable update for API request
			else
				$this->TimeOfTaking->setFormValue($val);
		}

		// Check field name 'Type' first before field var 'x_Type'
		$val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
		if (!$this->Type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Type->Visible = FALSE; // Disable update for API request
			else
				$this->Type->setFormValue($val);
		}

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
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

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'CreateDateTime' first before field var 'x_CreateDateTime'
		$val = $CurrentForm->hasValue("CreateDateTime") ? $CurrentForm->getValue("CreateDateTime") : $CurrentForm->getValue("x_CreateDateTime");
		if (!$this->CreateDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreateDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreateDateTime->setFormValue($val);
		}

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Medicine->CurrentValue = $this->Medicine->FormValue;
		$this->M->CurrentValue = $this->M->FormValue;
		$this->A->CurrentValue = $this->A->FormValue;
		$this->N->CurrentValue = $this->N->FormValue;
		$this->NoOfDays->CurrentValue = $this->NoOfDays->FormValue;
		$this->PreRoute->CurrentValue = $this->PreRoute->FormValue;
		$this->TimeOfTaking->CurrentValue = $this->TimeOfTaking->FormValue;
		$this->Type->CurrentValue = $this->Type->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreateDateTime->CurrentValue = $this->CreateDateTime->FormValue;
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
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
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Medicine->setDbValue($row['Medicine']);
		$this->M->setDbValue($row['M']);
		$this->A->setDbValue($row['A']);
		$this->N->setDbValue($row['N']);
		$this->NoOfDays->setDbValue($row['NoOfDays']);
		$this->PreRoute->setDbValue($row['PreRoute']);
		if (array_key_exists('EV__PreRoute', $rs->fields)) {
			$this->PreRoute->VirtualValue = $rs->fields('EV__PreRoute'); // Set up virtual field value
		} else {
			$this->PreRoute->VirtualValue = ""; // Clear value
		}
		$this->TimeOfTaking->setDbValue($row['TimeOfTaking']);
		if (array_key_exists('EV__TimeOfTaking', $rs->fields)) {
			$this->TimeOfTaking->VirtualValue = $rs->fields('EV__TimeOfTaking'); // Set up virtual field value
		} else {
			$this->TimeOfTaking->VirtualValue = ""; // Clear value
		}
		$this->Type->setDbValue($row['Type']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Status->setDbValue($row['Status']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreateDateTime->setDbValue($row['CreateDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['Medicine'] = NULL;
		$row['M'] = NULL;
		$row['A'] = NULL;
		$row['N'] = NULL;
		$row['NoOfDays'] = NULL;
		$row['PreRoute'] = NULL;
		$row['TimeOfTaking'] = NULL;
		$row['Type'] = NULL;
		$row['mrnno'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['Status'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['CreateDateTime'] = NULL;
		$row['ModifiedBy'] = NULL;
		$row['ModifiedDateTime'] = NULL;
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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Medicine
			$this->Medicine->EditAttrs["class"] = "form-control";
			$this->Medicine->EditCustomAttributes = "";
			if (!$this->Medicine->Raw)
				$this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
			$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
			$curVal = strval($this->Medicine->CurrentValue);
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
						$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
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
				$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
			$this->M->EditValue = HtmlEncode($this->M->CurrentValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (!$this->A->Raw)
				$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
			$this->A->EditValue = HtmlEncode($this->A->CurrentValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// N
			$this->N->EditAttrs["class"] = "form-control";
			$this->N->EditCustomAttributes = "";
			if (!$this->N->Raw)
				$this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
			$this->N->EditValue = HtmlEncode($this->N->CurrentValue);
			$this->N->PlaceHolder = RemoveHtml($this->N->caption());

			// NoOfDays
			$this->NoOfDays->EditAttrs["class"] = "form-control";
			$this->NoOfDays->EditCustomAttributes = "";
			if (!$this->NoOfDays->Raw)
				$this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

			// PreRoute
			$this->PreRoute->EditAttrs["class"] = "form-control";
			$this->PreRoute->EditCustomAttributes = "";
			if (!$this->PreRoute->Raw)
				$this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
			$this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
			$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

			// TimeOfTaking
			$this->TimeOfTaking->EditAttrs["class"] = "form-control";
			$this->TimeOfTaking->EditCustomAttributes = "";
			if (!$this->TimeOfTaking->Raw)
				$this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

			// Type
			$this->Type->EditAttrs["class"] = "form-control";
			$this->Type->EditCustomAttributes = "";
			$this->Type->EditValue = $this->Type->options(TRUE);

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

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

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->CurrentValue));
			if ($curVal != "")
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Status`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_STRING, "");
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
				$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// CreateDateTime
			$this->CreateDateTime->EditAttrs["class"] = "form-control";
			$this->CreateDateTime->EditCustomAttributes = "";
			if (!$this->CreateDateTime->Raw)
				$this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
			$this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->CurrentValue);
			$this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (!$this->ModifiedBy->Raw)
				$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// ModifiedDateTime
			$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->ModifiedDateTime->EditCustomAttributes = "";
			if (!$this->ModifiedDateTime->Raw)
				$this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
			$this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->CurrentValue);
			$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

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

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
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
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Medicine->Required) {
			if (!$this->Medicine->IsDetailKey && $this->Medicine->FormValue != NULL && $this->Medicine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medicine->caption(), $this->Medicine->RequiredErrorMessage));
			}
		}
		if ($this->M->Required) {
			if (!$this->M->IsDetailKey && $this->M->FormValue != NULL && $this->M->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
			}
		}
		if ($this->A->Required) {
			if (!$this->A->IsDetailKey && $this->A->FormValue != NULL && $this->A->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
			}
		}
		if ($this->N->Required) {
			if (!$this->N->IsDetailKey && $this->N->FormValue != NULL && $this->N->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->N->caption(), $this->N->RequiredErrorMessage));
			}
		}
		if ($this->NoOfDays->Required) {
			if (!$this->NoOfDays->IsDetailKey && $this->NoOfDays->FormValue != NULL && $this->NoOfDays->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfDays->caption(), $this->NoOfDays->RequiredErrorMessage));
			}
		}
		if ($this->PreRoute->Required) {
			if (!$this->PreRoute->IsDetailKey && $this->PreRoute->FormValue != NULL && $this->PreRoute->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreRoute->caption(), $this->PreRoute->RequiredErrorMessage));
			}
		}
		if ($this->TimeOfTaking->Required) {
			if (!$this->TimeOfTaking->IsDetailKey && $this->TimeOfTaking->FormValue != NULL && $this->TimeOfTaking->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TimeOfTaking->caption(), $this->TimeOfTaking->RequiredErrorMessage));
			}
		}
		if ($this->Type->Required) {
			if (!$this->Type->IsDetailKey && $this->Type->FormValue != NULL && $this->Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreateDateTime->Required) {
			if (!$this->CreateDateTime->IsDetailKey && $this->CreateDateTime->FormValue != NULL && $this->CreateDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreateDateTime->caption(), $this->CreateDateTime->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
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

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Medicine
			$this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, NULL, $this->Medicine->ReadOnly);

			// M
			$this->M->setDbValueDef($rsnew, $this->M->CurrentValue, NULL, $this->M->ReadOnly);

			// A
			$this->A->setDbValueDef($rsnew, $this->A->CurrentValue, NULL, $this->A->ReadOnly);

			// N
			$this->N->setDbValueDef($rsnew, $this->N->CurrentValue, NULL, $this->N->ReadOnly);

			// NoOfDays
			$this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, NULL, $this->NoOfDays->ReadOnly);

			// PreRoute
			$this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, NULL, $this->PreRoute->ReadOnly);

			// TimeOfTaking
			$this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, NULL, $this->TimeOfTaking->ReadOnly);

			// Type
			$this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, NULL, $this->Type->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, $this->Status->ReadOnly);

			// CreatedBy
			$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, $this->CreatedBy->ReadOnly);

			// CreateDateTime
			$this->CreateDateTime->setDbValueDef($rsnew, $this->CreateDateTime->CurrentValue, NULL, $this->CreateDateTime->ReadOnly);

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, $this->ModifiedBy->ReadOnly);

			// ModifiedDateTime
			$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL, $this->ModifiedDateTime->ReadOnly);

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
			$this->setSessionWhere($this->getDetailFilter());

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_prescriptionlist.php"), "", $this->TableVar, TRUE);
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
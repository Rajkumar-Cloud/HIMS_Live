<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class employee_edit extends employee
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee';

	// Page object name
	public $PageObjName = "employee_edit";

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

		// Table object (employee)
		if (!isset($GLOBALS["employee"]) || get_class($GLOBALS["employee"]) == PROJECT_NAMESPACE . "employee") {
			$GLOBALS["employee"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');

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
		global $employee;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($employee);
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
					if ($pageName == "employeeview.php")
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
					$this->terminate(GetUrl("employeelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->empNo->setVisibility();
		$this->tittle->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->start_date->setVisibility();
		$this->end_date->setVisibility();
		$this->employee_role_id->setVisibility();
		$this->default_shift_start->setVisibility();
		$this->default_shift_end->setVisibility();
		$this->working_days->setVisibility();
		$this->working_location->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->profilePic->setVisibility();
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
		$this->setupLookupOptions($this->tittle);
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->employee_role_id);
		$this->setupLookupOptions($this->working_location);
		$this->setupLookupOptions($this->status);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("employeelist.php");
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
					$this->terminate("employeelist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "employeelist.php")
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
		$this->profilePic->Upload->Index = $CurrentForm->Index;
		$this->profilePic->Upload->uploadFile();
		$this->profilePic->CurrentValue = $this->profilePic->Upload->FileName;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'empNo' first before field var 'x_empNo'
		$val = $CurrentForm->hasValue("empNo") ? $CurrentForm->getValue("empNo") : $CurrentForm->getValue("x_empNo");
		if (!$this->empNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->empNo->Visible = FALSE; // Disable update for API request
			else
				$this->empNo->setFormValue($val);
		}

		// Check field name 'tittle' first before field var 'x_tittle'
		$val = $CurrentForm->hasValue("tittle") ? $CurrentForm->getValue("tittle") : $CurrentForm->getValue("x_tittle");
		if (!$this->tittle->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tittle->Visible = FALSE; // Disable update for API request
			else
				$this->tittle->setFormValue($val);
		}

		// Check field name 'first_name' first before field var 'x_first_name'
		$val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
		if (!$this->first_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->first_name->Visible = FALSE; // Disable update for API request
			else
				$this->first_name->setFormValue($val);
		}

		// Check field name 'middle_name' first before field var 'x_middle_name'
		$val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
		if (!$this->middle_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->middle_name->Visible = FALSE; // Disable update for API request
			else
				$this->middle_name->setFormValue($val);
		}

		// Check field name 'last_name' first before field var 'x_last_name'
		$val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
		if (!$this->last_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->last_name->Visible = FALSE; // Disable update for API request
			else
				$this->last_name->setFormValue($val);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}

		// Check field name 'dob' first before field var 'x_dob'
		$val = $CurrentForm->hasValue("dob") ? $CurrentForm->getValue("dob") : $CurrentForm->getValue("x_dob");
		if (!$this->dob->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->dob->Visible = FALSE; // Disable update for API request
			else
				$this->dob->setFormValue($val);
			$this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 0);
		}

		// Check field name 'start_date' first before field var 'x_start_date'
		$val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
		if (!$this->start_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->start_date->Visible = FALSE; // Disable update for API request
			else
				$this->start_date->setFormValue($val);
			$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
		}

		// Check field name 'end_date' first before field var 'x_end_date'
		$val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
		if (!$this->end_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->end_date->Visible = FALSE; // Disable update for API request
			else
				$this->end_date->setFormValue($val);
			$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 0);
		}

		// Check field name 'employee_role_id' first before field var 'x_employee_role_id'
		$val = $CurrentForm->hasValue("employee_role_id") ? $CurrentForm->getValue("employee_role_id") : $CurrentForm->getValue("x_employee_role_id");
		if (!$this->employee_role_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->employee_role_id->Visible = FALSE; // Disable update for API request
			else
				$this->employee_role_id->setFormValue($val);
		}

		// Check field name 'default_shift_start' first before field var 'x_default_shift_start'
		$val = $CurrentForm->hasValue("default_shift_start") ? $CurrentForm->getValue("default_shift_start") : $CurrentForm->getValue("x_default_shift_start");
		if (!$this->default_shift_start->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->default_shift_start->Visible = FALSE; // Disable update for API request
			else
				$this->default_shift_start->setFormValue($val);
			$this->default_shift_start->CurrentValue = UnFormatDateTime($this->default_shift_start->CurrentValue, 4);
		}

		// Check field name 'default_shift_end' first before field var 'x_default_shift_end'
		$val = $CurrentForm->hasValue("default_shift_end") ? $CurrentForm->getValue("default_shift_end") : $CurrentForm->getValue("x_default_shift_end");
		if (!$this->default_shift_end->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->default_shift_end->Visible = FALSE; // Disable update for API request
			else
				$this->default_shift_end->setFormValue($val);
			$this->default_shift_end->CurrentValue = UnFormatDateTime($this->default_shift_end->CurrentValue, 4);
		}

		// Check field name 'working_days' first before field var 'x_working_days'
		$val = $CurrentForm->hasValue("working_days") ? $CurrentForm->getValue("working_days") : $CurrentForm->getValue("x_working_days");
		if (!$this->working_days->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->working_days->Visible = FALSE; // Disable update for API request
			else
				$this->working_days->setFormValue($val);
		}

		// Check field name 'working_location' first before field var 'x_working_location'
		$val = $CurrentForm->hasValue("working_location") ? $CurrentForm->getValue("working_location") : $CurrentForm->getValue("x_working_location");
		if (!$this->working_location->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->working_location->Visible = FALSE; // Disable update for API request
			else
				$this->working_location->setFormValue($val);
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

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->empNo->CurrentValue = $this->empNo->FormValue;
		$this->tittle->CurrentValue = $this->tittle->FormValue;
		$this->first_name->CurrentValue = $this->first_name->FormValue;
		$this->middle_name->CurrentValue = $this->middle_name->FormValue;
		$this->last_name->CurrentValue = $this->last_name->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->dob->CurrentValue = $this->dob->FormValue;
		$this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 0);
		$this->start_date->CurrentValue = $this->start_date->FormValue;
		$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
		$this->end_date->CurrentValue = $this->end_date->FormValue;
		$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 0);
		$this->employee_role_id->CurrentValue = $this->employee_role_id->FormValue;
		$this->default_shift_start->CurrentValue = $this->default_shift_start->FormValue;
		$this->default_shift_start->CurrentValue = UnFormatDateTime($this->default_shift_start->CurrentValue, 4);
		$this->default_shift_end->CurrentValue = $this->default_shift_end->FormValue;
		$this->default_shift_end->CurrentValue = UnFormatDateTime($this->default_shift_end->CurrentValue, 4);
		$this->working_days->CurrentValue = $this->working_days->FormValue;
		$this->working_location->CurrentValue = $this->working_location->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
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
		$this->empNo->setDbValue($row['empNo']);
		$this->tittle->setDbValue($row['tittle']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->dob->setDbValue($row['dob']);
		$this->start_date->setDbValue($row['start_date']);
		$this->end_date->setDbValue($row['end_date']);
		$this->employee_role_id->setDbValue($row['employee_role_id']);
		$this->default_shift_start->setDbValue($row['default_shift_start']);
		$this->default_shift_end->setDbValue($row['default_shift_end']);
		$this->working_days->setDbValue($row['working_days']);
		$this->working_location->setDbValue($row['working_location']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['empNo'] = NULL;
		$row['tittle'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['dob'] = NULL;
		$row['start_date'] = NULL;
		$row['end_date'] = NULL;
		$row['employee_role_id'] = NULL;
		$row['default_shift_start'] = NULL;
		$row['default_shift_end'] = NULL;
		$row['working_days'] = NULL;
		$row['working_location'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['profilePic'] = NULL;
		$row['HospID'] = NULL;
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
		// empNo
		// tittle
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// start_date
		// end_date
		// employee_role_id
		// default_shift_start
		// default_shift_end
		// working_days
		// working_location
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// empNo
			$this->empNo->ViewValue = $this->empNo->CurrentValue;
			$this->empNo->ViewCustomAttributes = "";

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
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
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
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
			$this->dob->ViewCustomAttributes = "";

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
			$this->start_date->ViewCustomAttributes = "";

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 0);
			$this->end_date->ViewCustomAttributes = "";

			// employee_role_id
			$curVal = strval($this->employee_role_id->CurrentValue);
			if ($curVal != "") {
				$this->employee_role_id->ViewValue = $this->employee_role_id->lookupCacheOption($curVal);
				if ($this->employee_role_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->employee_role_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->employee_role_id->ViewValue = $this->employee_role_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->employee_role_id->ViewValue = $this->employee_role_id->CurrentValue;
					}
				}
			} else {
				$this->employee_role_id->ViewValue = NULL;
			}
			$this->employee_role_id->ViewCustomAttributes = "";

			// default_shift_start
			$this->default_shift_start->ViewValue = $this->default_shift_start->CurrentValue;
			$this->default_shift_start->ViewValue = FormatDateTime($this->default_shift_start->ViewValue, 4);
			$this->default_shift_start->ViewCustomAttributes = "";

			// default_shift_end
			$this->default_shift_end->ViewValue = $this->default_shift_end->CurrentValue;
			$this->default_shift_end->ViewValue = FormatDateTime($this->default_shift_end->ViewValue, 4);
			$this->default_shift_end->ViewCustomAttributes = "";

			// working_days
			$this->working_days->ViewValue = $this->working_days->CurrentValue;
			$this->working_days->ViewCustomAttributes = "";

			// working_location
			$curVal = strval($this->working_location->CurrentValue);
			if ($curVal != "") {
				$this->working_location->ViewValue = $this->working_location->lookupCacheOption($curVal);
				if ($this->working_location->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->working_location->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->working_location->ViewValue = $this->working_location->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->working_location->ViewValue = $this->working_location->CurrentValue;
					}
				}
			} else {
				$this->working_location->ViewValue = NULL;
			}
			$this->working_location->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// empNo
			$this->empNo->LinkCustomAttributes = "";
			$this->empNo->HrefValue = "";
			$this->empNo->TooltipValue = "";

			// tittle
			$this->tittle->LinkCustomAttributes = "";
			$this->tittle->HrefValue = "";
			$this->tittle->TooltipValue = "";

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

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";
			$this->start_date->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";
			$this->end_date->TooltipValue = "";

			// employee_role_id
			$this->employee_role_id->LinkCustomAttributes = "";
			$this->employee_role_id->HrefValue = "";
			$this->employee_role_id->TooltipValue = "";

			// default_shift_start
			$this->default_shift_start->LinkCustomAttributes = "";
			$this->default_shift_start->HrefValue = "";
			$this->default_shift_start->TooltipValue = "";

			// default_shift_end
			$this->default_shift_end->LinkCustomAttributes = "";
			$this->default_shift_end->HrefValue = "";
			$this->default_shift_end->TooltipValue = "";

			// working_days
			$this->working_days->LinkCustomAttributes = "";
			$this->working_days->HrefValue = "";
			$this->working_days->TooltipValue = "";

			// working_location
			$this->working_location->LinkCustomAttributes = "";
			$this->working_location->HrefValue = "";
			$this->working_location->TooltipValue = "";

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
				$this->profilePic->LinkAttrs["data-rel"] = "employee_x_profilePic";
				$this->profilePic->LinkAttrs->appendClass("ew-lightbox");
			}

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// empNo
			$this->empNo->EditAttrs["class"] = "form-control";
			$this->empNo->EditCustomAttributes = "";
			if (!$this->empNo->Raw)
				$this->empNo->CurrentValue = HtmlDecode($this->empNo->CurrentValue);
			$this->empNo->EditValue = HtmlEncode($this->empNo->CurrentValue);
			$this->empNo->PlaceHolder = RemoveHtml($this->empNo->caption());

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
					$filterWrk = "`id`" . SearchString("=", $this->gender->CurrentValue, DATATYPE_NUMBER, "");
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
			$this->dob->EditValue = HtmlEncode(FormatDateTime($this->dob->CurrentValue, 8));
			$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

			// start_date
			$this->start_date->EditAttrs["class"] = "form-control";
			$this->start_date->EditCustomAttributes = "";
			$this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 8));
			$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

			// end_date
			$this->end_date->EditAttrs["class"] = "form-control";
			$this->end_date->EditCustomAttributes = "";
			$this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 8));
			$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

			// employee_role_id
			$this->employee_role_id->EditAttrs["class"] = "form-control";
			$this->employee_role_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->employee_role_id->CurrentValue));
			if ($curVal != "")
				$this->employee_role_id->ViewValue = $this->employee_role_id->lookupCacheOption($curVal);
			else
				$this->employee_role_id->ViewValue = $this->employee_role_id->Lookup !== NULL && is_array($this->employee_role_id->Lookup->Options) ? $curVal : NULL;
			if ($this->employee_role_id->ViewValue !== NULL) { // Load from cache
				$this->employee_role_id->EditValue = array_values($this->employee_role_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->employee_role_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->employee_role_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->employee_role_id->EditValue = $arwrk;
			}

			// default_shift_start
			$this->default_shift_start->EditAttrs["class"] = "form-control";
			$this->default_shift_start->EditCustomAttributes = "";
			$this->default_shift_start->EditValue = HtmlEncode($this->default_shift_start->CurrentValue);
			$this->default_shift_start->PlaceHolder = RemoveHtml($this->default_shift_start->caption());

			// default_shift_end
			$this->default_shift_end->EditAttrs["class"] = "form-control";
			$this->default_shift_end->EditCustomAttributes = "";
			$this->default_shift_end->EditValue = HtmlEncode($this->default_shift_end->CurrentValue);
			$this->default_shift_end->PlaceHolder = RemoveHtml($this->default_shift_end->caption());

			// working_days
			$this->working_days->EditAttrs["class"] = "form-control";
			$this->working_days->EditCustomAttributes = "";
			if (!$this->working_days->Raw)
				$this->working_days->CurrentValue = HtmlDecode($this->working_days->CurrentValue);
			$this->working_days->EditValue = HtmlEncode($this->working_days->CurrentValue);
			$this->working_days->PlaceHolder = RemoveHtml($this->working_days->caption());

			// working_location
			$this->working_location->EditAttrs["class"] = "form-control";
			$this->working_location->EditCustomAttributes = "";
			$curVal = trim(strval($this->working_location->CurrentValue));
			if ($curVal != "")
				$this->working_location->ViewValue = $this->working_location->lookupCacheOption($curVal);
			else
				$this->working_location->ViewValue = $this->working_location->Lookup !== NULL && is_array($this->working_location->Lookup->Options) ? $curVal : NULL;
			if ($this->working_location->ViewValue !== NULL) { // Load from cache
				$this->working_location->EditValue = array_values($this->working_location->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->working_location->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->working_location->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->working_location->EditValue = $arwrk;
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

			// modifiedby
			// modifieddatetime
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

			// HospID
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// empNo
			$this->empNo->LinkCustomAttributes = "";
			$this->empNo->HrefValue = "";

			// tittle
			$this->tittle->LinkCustomAttributes = "";
			$this->tittle->HrefValue = "";

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

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";

			// employee_role_id
			$this->employee_role_id->LinkCustomAttributes = "";
			$this->employee_role_id->HrefValue = "";

			// default_shift_start
			$this->default_shift_start->LinkCustomAttributes = "";
			$this->default_shift_start->HrefValue = "";

			// default_shift_end
			$this->default_shift_end->LinkCustomAttributes = "";
			$this->default_shift_end->HrefValue = "";

			// working_days
			$this->working_days->LinkCustomAttributes = "";
			$this->working_days->HrefValue = "";

			// working_location
			$this->working_location->LinkCustomAttributes = "";
			$this->working_location->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
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
		if ($this->empNo->Required) {
			if (!$this->empNo->IsDetailKey && $this->empNo->FormValue != NULL && $this->empNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->empNo->caption(), $this->empNo->RequiredErrorMessage));
			}
		}
		if ($this->tittle->Required) {
			if (!$this->tittle->IsDetailKey && $this->tittle->FormValue != NULL && $this->tittle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tittle->caption(), $this->tittle->RequiredErrorMessage));
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
		if (!CheckDate($this->dob->FormValue)) {
			AddMessage($FormError, $this->dob->errorMessage());
		}
		if ($this->start_date->Required) {
			if (!$this->start_date->IsDetailKey && $this->start_date->FormValue != NULL && $this->start_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->start_date->FormValue)) {
			AddMessage($FormError, $this->start_date->errorMessage());
		}
		if ($this->end_date->Required) {
			if (!$this->end_date->IsDetailKey && $this->end_date->FormValue != NULL && $this->end_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->end_date->FormValue)) {
			AddMessage($FormError, $this->end_date->errorMessage());
		}
		if ($this->employee_role_id->Required) {
			if (!$this->employee_role_id->IsDetailKey && $this->employee_role_id->FormValue != NULL && $this->employee_role_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->employee_role_id->caption(), $this->employee_role_id->RequiredErrorMessage));
			}
		}
		if ($this->default_shift_start->Required) {
			if (!$this->default_shift_start->IsDetailKey && $this->default_shift_start->FormValue != NULL && $this->default_shift_start->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->default_shift_start->caption(), $this->default_shift_start->RequiredErrorMessage));
			}
		}
		if (!CheckTime($this->default_shift_start->FormValue)) {
			AddMessage($FormError, $this->default_shift_start->errorMessage());
		}
		if ($this->default_shift_end->Required) {
			if (!$this->default_shift_end->IsDetailKey && $this->default_shift_end->FormValue != NULL && $this->default_shift_end->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->default_shift_end->caption(), $this->default_shift_end->RequiredErrorMessage));
			}
		}
		if (!CheckTime($this->default_shift_end->FormValue)) {
			AddMessage($FormError, $this->default_shift_end->errorMessage());
		}
		if ($this->working_days->Required) {
			if (!$this->working_days->IsDetailKey && $this->working_days->FormValue != NULL && $this->working_days->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->working_days->caption(), $this->working_days->RequiredErrorMessage));
			}
		}
		if ($this->working_location->Required) {
			if (!$this->working_location->IsDetailKey && $this->working_location->FormValue != NULL && $this->working_location->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->working_location->caption(), $this->working_location->RequiredErrorMessage));
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
		if ($this->profilePic->Required) {
			if ($this->profilePic->Upload->FileName == "" && !$this->profilePic->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("employee_address", $detailTblVar) && $GLOBALS["employee_address"]->DetailEdit) {
			if (!isset($GLOBALS["employee_address_grid"]))
				$GLOBALS["employee_address_grid"] = new employee_address_grid(); // Get detail page object
			$GLOBALS["employee_address_grid"]->validateGridForm();
		}
		if (in_array("employee_telephone", $detailTblVar) && $GLOBALS["employee_telephone"]->DetailEdit) {
			if (!isset($GLOBALS["employee_telephone_grid"]))
				$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid(); // Get detail page object
			$GLOBALS["employee_telephone_grid"]->validateGridForm();
		}
		if (in_array("employee_email", $detailTblVar) && $GLOBALS["employee_email"]->DetailEdit) {
			if (!isset($GLOBALS["employee_email_grid"]))
				$GLOBALS["employee_email_grid"] = new employee_email_grid(); // Get detail page object
			$GLOBALS["employee_email_grid"]->validateGridForm();
		}
		if (in_array("employee_has_degree", $detailTblVar) && $GLOBALS["employee_has_degree"]->DetailEdit) {
			if (!isset($GLOBALS["employee_has_degree_grid"]))
				$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid(); // Get detail page object
			$GLOBALS["employee_has_degree_grid"]->validateGridForm();
		}
		if (in_array("employee_has_experience", $detailTblVar) && $GLOBALS["employee_has_experience"]->DetailEdit) {
			if (!isset($GLOBALS["employee_has_experience_grid"]))
				$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid(); // Get detail page object
			$GLOBALS["employee_has_experience_grid"]->validateGridForm();
		}
		if (in_array("employee_document", $detailTblVar) && $GLOBALS["employee_document"]->DetailEdit) {
			if (!isset($GLOBALS["employee_document_grid"]))
				$GLOBALS["employee_document_grid"] = new employee_document_grid(); // Get detail page object
			$GLOBALS["employee_document_grid"]->validateGridForm();
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

			// empNo
			$this->empNo->setDbValueDef($rsnew, $this->empNo->CurrentValue, NULL, $this->empNo->ReadOnly);

			// tittle
			$this->tittle->setDbValueDef($rsnew, $this->tittle->CurrentValue, 0, $this->tittle->ReadOnly);

			// first_name
			$this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", $this->first_name->ReadOnly);

			// middle_name
			$this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, NULL, $this->middle_name->ReadOnly);

			// last_name
			$this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, NULL, $this->last_name->ReadOnly);

			// gender
			$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, 0, $this->gender->ReadOnly);

			// dob
			$this->dob->setDbValueDef($rsnew, UnFormatDateTime($this->dob->CurrentValue, 0), NULL, $this->dob->ReadOnly);

			// start_date
			$this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 0), NULL, $this->start_date->ReadOnly);

			// end_date
			$this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 0), NULL, $this->end_date->ReadOnly);

			// employee_role_id
			$this->employee_role_id->setDbValueDef($rsnew, $this->employee_role_id->CurrentValue, 0, $this->employee_role_id->ReadOnly);

			// default_shift_start
			$this->default_shift_start->setDbValueDef($rsnew, $this->default_shift_start->CurrentValue, CurrentTime(), $this->default_shift_start->ReadOnly);

			// default_shift_end
			$this->default_shift_end->setDbValueDef($rsnew, $this->default_shift_end->CurrentValue, CurrentTime(), $this->default_shift_end->ReadOnly);

			// working_days
			$this->working_days->setDbValueDef($rsnew, $this->working_days->CurrentValue, "", $this->working_days->ReadOnly);

			// working_location
			$this->working_location->setDbValueDef($rsnew, $this->working_location->CurrentValue, 0, $this->working_location->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, $this->status->ReadOnly);

			// profilePic
			if ($this->profilePic->Visible && !$this->profilePic->ReadOnly && !$this->profilePic->Upload->KeepFile) {
				$this->profilePic->Upload->DbValue = $rsold['profilePic']; // Get original value
				if ($this->profilePic->Upload->FileName == "") {
					$rsnew['profilePic'] = NULL;
				} else {
					$rsnew['profilePic'] = $this->profilePic->Upload->FileName;
				}
			}

			// HospID
			$this->HospID->CurrentValue = HospitalID();
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);
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
					$this->profilePic->setDbValueDef($rsnew, $this->profilePic->Upload->FileName, NULL, $this->profilePic->ReadOnly);
				}
			}

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

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("employee_address", $detailTblVar) && $GLOBALS["employee_address"]->DetailEdit) {
						if (!isset($GLOBALS["employee_address_grid"]))
							$GLOBALS["employee_address_grid"] = new employee_address_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "employee_address"); // Load user level of detail table
						$editRow = $GLOBALS["employee_address_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("employee_telephone", $detailTblVar) && $GLOBALS["employee_telephone"]->DetailEdit) {
						if (!isset($GLOBALS["employee_telephone_grid"]))
							$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "employee_telephone"); // Load user level of detail table
						$editRow = $GLOBALS["employee_telephone_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("employee_email", $detailTblVar) && $GLOBALS["employee_email"]->DetailEdit) {
						if (!isset($GLOBALS["employee_email_grid"]))
							$GLOBALS["employee_email_grid"] = new employee_email_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "employee_email"); // Load user level of detail table
						$editRow = $GLOBALS["employee_email_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("employee_has_degree", $detailTblVar) && $GLOBALS["employee_has_degree"]->DetailEdit) {
						if (!isset($GLOBALS["employee_has_degree_grid"]))
							$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "employee_has_degree"); // Load user level of detail table
						$editRow = $GLOBALS["employee_has_degree_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("employee_has_experience", $detailTblVar) && $GLOBALS["employee_has_experience"]->DetailEdit) {
						if (!isset($GLOBALS["employee_has_experience_grid"]))
							$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "employee_has_experience"); // Load user level of detail table
						$editRow = $GLOBALS["employee_has_experience_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("employee_document", $detailTblVar) && $GLOBALS["employee_document"]->DetailEdit) {
						if (!isset($GLOBALS["employee_document_grid"]))
							$GLOBALS["employee_document_grid"] = new employee_document_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "employee_document"); // Load user level of detail table
						$editRow = $GLOBALS["employee_document_grid"]->gridUpdate();
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

			// profilePic
			CleanUploadTempPath($this->profilePic, $this->profilePic->Upload->Index);
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
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
			if (in_array("employee_address", $detailTblVar)) {
				if (!isset($GLOBALS["employee_address_grid"]))
					$GLOBALS["employee_address_grid"] = new employee_address_grid();
				if ($GLOBALS["employee_address_grid"]->DetailEdit) {
					$GLOBALS["employee_address_grid"]->CurrentMode = "edit";
					$GLOBALS["employee_address_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["employee_address_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_address_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_address_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_address_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_address_grid"]->employee_id->setSessionValue($GLOBALS["employee_address_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_telephone", $detailTblVar)) {
				if (!isset($GLOBALS["employee_telephone_grid"]))
					$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid();
				if ($GLOBALS["employee_telephone_grid"]->DetailEdit) {
					$GLOBALS["employee_telephone_grid"]->CurrentMode = "edit";
					$GLOBALS["employee_telephone_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["employee_telephone_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_telephone_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_telephone_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_telephone_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_telephone_grid"]->employee_id->setSessionValue($GLOBALS["employee_telephone_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_email", $detailTblVar)) {
				if (!isset($GLOBALS["employee_email_grid"]))
					$GLOBALS["employee_email_grid"] = new employee_email_grid();
				if ($GLOBALS["employee_email_grid"]->DetailEdit) {
					$GLOBALS["employee_email_grid"]->CurrentMode = "edit";
					$GLOBALS["employee_email_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["employee_email_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_email_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_email_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_email_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_email_grid"]->employee_id->setSessionValue($GLOBALS["employee_email_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_has_degree", $detailTblVar)) {
				if (!isset($GLOBALS["employee_has_degree_grid"]))
					$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid();
				if ($GLOBALS["employee_has_degree_grid"]->DetailEdit) {
					$GLOBALS["employee_has_degree_grid"]->CurrentMode = "edit";
					$GLOBALS["employee_has_degree_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["employee_has_degree_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_has_degree_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_has_degree_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_has_degree_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_has_degree_grid"]->employee_id->setSessionValue($GLOBALS["employee_has_degree_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_has_experience", $detailTblVar)) {
				if (!isset($GLOBALS["employee_has_experience_grid"]))
					$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid();
				if ($GLOBALS["employee_has_experience_grid"]->DetailEdit) {
					$GLOBALS["employee_has_experience_grid"]->CurrentMode = "edit";
					$GLOBALS["employee_has_experience_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["employee_has_experience_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_has_experience_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_has_experience_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_has_experience_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_has_experience_grid"]->employee_id->setSessionValue($GLOBALS["employee_has_experience_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_document", $detailTblVar)) {
				if (!isset($GLOBALS["employee_document_grid"]))
					$GLOBALS["employee_document_grid"] = new employee_document_grid();
				if ($GLOBALS["employee_document_grid"]->DetailEdit) {
					$GLOBALS["employee_document_grid"]->CurrentMode = "edit";
					$GLOBALS["employee_document_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["employee_document_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_document_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_document_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_document_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_document_grid"]->employee_id->setSessionValue($GLOBALS["employee_document_grid"]->employee_id->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employeelist.php"), "", $this->TableVar, TRUE);
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
				case "x_tittle":
					break;
				case "x_gender":
					break;
				case "x_employee_role_id":
					break;
				case "x_working_location":
					break;
				case "x_status":
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
						case "x_tittle":
							break;
						case "x_gender":
							break;
						case "x_employee_role_id":
							break;
						case "x_working_location":
							break;
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
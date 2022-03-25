<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class task_management_edit extends task_management
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'task_management';

	// Page object name
	public $PageObjName = "task_management_edit";

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

		// Table object (task_management)
		if (!isset($GLOBALS["task_management"]) || get_class($GLOBALS["task_management"]) == PROJECT_NAMESPACE . "task_management") {
			$GLOBALS["task_management"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["task_management"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'task_management');

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
		global $task_management;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($task_management);
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
					if ($pageName == "task_managementview.php")
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
					$this->terminate(GetUrl("task_managementlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->TaskName->setVisibility();
		$this->AssignTo->setVisibility();
		$this->Description->setVisibility();
		$this->StartDate->setVisibility();
		$this->EndDate->setVisibility();
		$this->StatusOfTask->setVisibility();
		$this->ForwardTo->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->GetUserName->Visible = FALSE;
		$this->GetModifiedName->setVisibility();
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
		$this->setupLookupOptions($this->AssignTo);
		$this->setupLookupOptions($this->ForwardTo);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("task_managementlist.php");
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
					$this->terminate("task_managementlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "task_managementlist.php")
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

		// Check field name 'TaskName' first before field var 'x_TaskName'
		$val = $CurrentForm->hasValue("TaskName") ? $CurrentForm->getValue("TaskName") : $CurrentForm->getValue("x_TaskName");
		if (!$this->TaskName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TaskName->Visible = FALSE; // Disable update for API request
			else
				$this->TaskName->setFormValue($val);
		}

		// Check field name 'AssignTo' first before field var 'x_AssignTo'
		$val = $CurrentForm->hasValue("AssignTo") ? $CurrentForm->getValue("AssignTo") : $CurrentForm->getValue("x_AssignTo");
		if (!$this->AssignTo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AssignTo->Visible = FALSE; // Disable update for API request
			else
				$this->AssignTo->setFormValue($val);
		}

		// Check field name 'Description' first before field var 'x_Description'
		$val = $CurrentForm->hasValue("Description") ? $CurrentForm->getValue("Description") : $CurrentForm->getValue("x_Description");
		if (!$this->Description->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Description->Visible = FALSE; // Disable update for API request
			else
				$this->Description->setFormValue($val);
		}

		// Check field name 'StartDate' first before field var 'x_StartDate'
		$val = $CurrentForm->hasValue("StartDate") ? $CurrentForm->getValue("StartDate") : $CurrentForm->getValue("x_StartDate");
		if (!$this->StartDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StartDate->Visible = FALSE; // Disable update for API request
			else
				$this->StartDate->setFormValue($val);
			$this->StartDate->CurrentValue = UnFormatDateTime($this->StartDate->CurrentValue, 7);
		}

		// Check field name 'EndDate' first before field var 'x_EndDate'
		$val = $CurrentForm->hasValue("EndDate") ? $CurrentForm->getValue("EndDate") : $CurrentForm->getValue("x_EndDate");
		if (!$this->EndDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EndDate->Visible = FALSE; // Disable update for API request
			else
				$this->EndDate->setFormValue($val);
			$this->EndDate->CurrentValue = UnFormatDateTime($this->EndDate->CurrentValue, 7);
		}

		// Check field name 'StatusOfTask' first before field var 'x_StatusOfTask'
		$val = $CurrentForm->hasValue("StatusOfTask") ? $CurrentForm->getValue("StatusOfTask") : $CurrentForm->getValue("x_StatusOfTask");
		if (!$this->StatusOfTask->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StatusOfTask->Visible = FALSE; // Disable update for API request
			else
				$this->StatusOfTask->setFormValue($val);
		}

		// Check field name 'ForwardTo' first before field var 'x_ForwardTo'
		$val = $CurrentForm->hasValue("ForwardTo") ? $CurrentForm->getValue("ForwardTo") : $CurrentForm->getValue("x_ForwardTo");
		if (!$this->ForwardTo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ForwardTo->Visible = FALSE; // Disable update for API request
			else
				$this->ForwardTo->setFormValue($val);
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

		// Check field name 'GetModifiedName' first before field var 'x_GetModifiedName'
		$val = $CurrentForm->hasValue("GetModifiedName") ? $CurrentForm->getValue("GetModifiedName") : $CurrentForm->getValue("x_GetModifiedName");
		if (!$this->GetModifiedName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GetModifiedName->Visible = FALSE; // Disable update for API request
			else
				$this->GetModifiedName->setFormValue($val);
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
		$this->TaskName->CurrentValue = $this->TaskName->FormValue;
		$this->AssignTo->CurrentValue = $this->AssignTo->FormValue;
		$this->Description->CurrentValue = $this->Description->FormValue;
		$this->StartDate->CurrentValue = $this->StartDate->FormValue;
		$this->StartDate->CurrentValue = UnFormatDateTime($this->StartDate->CurrentValue, 7);
		$this->EndDate->CurrentValue = $this->EndDate->FormValue;
		$this->EndDate->CurrentValue = UnFormatDateTime($this->EndDate->CurrentValue, 7);
		$this->StatusOfTask->CurrentValue = $this->StatusOfTask->FormValue;
		$this->ForwardTo->CurrentValue = $this->ForwardTo->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->GetModifiedName->CurrentValue = $this->GetModifiedName->FormValue;
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
		$this->TaskName->setDbValue($row['TaskName']);
		$this->AssignTo->setDbValue($row['AssignTo']);
		$this->Description->setDbValue($row['Description']);
		$this->StartDate->setDbValue($row['StartDate']);
		$this->EndDate->setDbValue($row['EndDate']);
		$this->StatusOfTask->setDbValue($row['StatusOfTask']);
		$this->ForwardTo->setDbValue($row['ForwardTo']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->GetUserName->setDbValue($row['GetUserName']);
		$this->GetModifiedName->setDbValue($row['GetModifiedName']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['TaskName'] = NULL;
		$row['AssignTo'] = NULL;
		$row['Description'] = NULL;
		$row['StartDate'] = NULL;
		$row['EndDate'] = NULL;
		$row['StatusOfTask'] = NULL;
		$row['ForwardTo'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['GetUserName'] = NULL;
		$row['GetModifiedName'] = NULL;
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
		// TaskName
		// AssignTo
		// Description
		// StartDate
		// EndDate
		// StatusOfTask
		// ForwardTo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// GetUserName
		// GetModifiedName
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// TaskName
			$this->TaskName->ViewValue = $this->TaskName->CurrentValue;
			$this->TaskName->ViewCustomAttributes = "";

			// AssignTo
			$curVal = strval($this->AssignTo->CurrentValue);
			if ($curVal != "") {
				$this->AssignTo->ViewValue = $this->AssignTo->lookupCacheOption($curVal);
				if ($this->AssignTo->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`User_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID` = '".HospitalID()."' ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->AssignTo->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->AssignTo->ViewValue = $this->AssignTo->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AssignTo->ViewValue = $this->AssignTo->CurrentValue;
					}
				}
			} else {
				$this->AssignTo->ViewValue = NULL;
			}
			$this->AssignTo->ViewCustomAttributes = "";

			// Description
			$this->Description->ViewValue = $this->Description->CurrentValue;
			$this->Description->ViewCustomAttributes = "";

			// StartDate
			$this->StartDate->ViewValue = $this->StartDate->CurrentValue;
			$this->StartDate->ViewValue = FormatDateTime($this->StartDate->ViewValue, 7);
			$this->StartDate->ViewCustomAttributes = "";

			// EndDate
			$this->EndDate->ViewValue = $this->EndDate->CurrentValue;
			$this->EndDate->ViewValue = FormatDateTime($this->EndDate->ViewValue, 7);
			$this->EndDate->ViewCustomAttributes = "";

			// StatusOfTask
			if (strval($this->StatusOfTask->CurrentValue) != "") {
				$this->StatusOfTask->ViewValue = $this->StatusOfTask->optionCaption($this->StatusOfTask->CurrentValue);
			} else {
				$this->StatusOfTask->ViewValue = NULL;
			}
			$this->StatusOfTask->ViewCustomAttributes = "";

			// ForwardTo
			$curVal = strval($this->ForwardTo->CurrentValue);
			if ($curVal != "") {
				$this->ForwardTo->ViewValue = $this->ForwardTo->lookupCacheOption($curVal);
				if ($this->ForwardTo->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`User_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID` = '".HospitalID()."' ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->ForwardTo->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ForwardTo->ViewValue = $this->ForwardTo->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ForwardTo->ViewValue = $this->ForwardTo->CurrentValue;
					}
				}
			} else {
				$this->ForwardTo->ViewValue = NULL;
			}
			$this->ForwardTo->ViewCustomAttributes = "";

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

			// GetUserName
			$this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
			$this->GetUserName->ViewCustomAttributes = "";

			// GetModifiedName
			$this->GetModifiedName->ViewValue = $this->GetModifiedName->CurrentValue;
			$this->GetModifiedName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// TaskName
			$this->TaskName->LinkCustomAttributes = "";
			$this->TaskName->HrefValue = "";
			$this->TaskName->TooltipValue = "";

			// AssignTo
			$this->AssignTo->LinkCustomAttributes = "";
			$this->AssignTo->HrefValue = "";
			$this->AssignTo->TooltipValue = "";

			// Description
			$this->Description->LinkCustomAttributes = "";
			$this->Description->HrefValue = "";
			$this->Description->TooltipValue = "";

			// StartDate
			$this->StartDate->LinkCustomAttributes = "";
			$this->StartDate->HrefValue = "";
			$this->StartDate->TooltipValue = "";

			// EndDate
			$this->EndDate->LinkCustomAttributes = "";
			$this->EndDate->HrefValue = "";
			$this->EndDate->TooltipValue = "";

			// StatusOfTask
			$this->StatusOfTask->LinkCustomAttributes = "";
			$this->StatusOfTask->HrefValue = "";
			$this->StatusOfTask->TooltipValue = "";

			// ForwardTo
			$this->ForwardTo->LinkCustomAttributes = "";
			$this->ForwardTo->HrefValue = "";
			$this->ForwardTo->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// GetModifiedName
			$this->GetModifiedName->LinkCustomAttributes = "";
			$this->GetModifiedName->HrefValue = "";
			$this->GetModifiedName->TooltipValue = "";

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

			// TaskName
			$this->TaskName->EditAttrs["class"] = "form-control";
			$this->TaskName->EditCustomAttributes = "";
			if (!$this->TaskName->Raw)
				$this->TaskName->CurrentValue = HtmlDecode($this->TaskName->CurrentValue);
			$this->TaskName->EditValue = HtmlEncode($this->TaskName->CurrentValue);
			$this->TaskName->PlaceHolder = RemoveHtml($this->TaskName->caption());

			// AssignTo
			$this->AssignTo->EditAttrs["class"] = "form-control";
			$this->AssignTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->AssignTo->CurrentValue));
			if ($curVal != "")
				$this->AssignTo->ViewValue = $this->AssignTo->lookupCacheOption($curVal);
			else
				$this->AssignTo->ViewValue = $this->AssignTo->Lookup !== NULL && is_array($this->AssignTo->Lookup->Options) ? $curVal : NULL;
			if ($this->AssignTo->ViewValue !== NULL) { // Load from cache
				$this->AssignTo->EditValue = array_values($this->AssignTo->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`User_Name`" . SearchString("=", $this->AssignTo->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID` = '".HospitalID()."' ";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->AssignTo->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AssignTo->EditValue = $arwrk;
			}

			// Description
			$this->Description->EditAttrs["class"] = "form-control";
			$this->Description->EditCustomAttributes = "";
			$this->Description->EditValue = HtmlEncode($this->Description->CurrentValue);
			$this->Description->PlaceHolder = RemoveHtml($this->Description->caption());

			// StartDate
			$this->StartDate->EditAttrs["class"] = "form-control";
			$this->StartDate->EditCustomAttributes = "";
			$this->StartDate->EditValue = HtmlEncode(FormatDateTime($this->StartDate->CurrentValue, 7));
			$this->StartDate->PlaceHolder = RemoveHtml($this->StartDate->caption());

			// EndDate
			$this->EndDate->EditAttrs["class"] = "form-control";
			$this->EndDate->EditCustomAttributes = "";
			$this->EndDate->EditValue = HtmlEncode(FormatDateTime($this->EndDate->CurrentValue, 7));
			$this->EndDate->PlaceHolder = RemoveHtml($this->EndDate->caption());

			// StatusOfTask
			$this->StatusOfTask->EditAttrs["class"] = "form-control";
			$this->StatusOfTask->EditCustomAttributes = "";
			$this->StatusOfTask->EditValue = $this->StatusOfTask->options(TRUE);

			// ForwardTo
			$this->ForwardTo->EditAttrs["class"] = "form-control";
			$this->ForwardTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->ForwardTo->CurrentValue));
			if ($curVal != "")
				$this->ForwardTo->ViewValue = $this->ForwardTo->lookupCacheOption($curVal);
			else
				$this->ForwardTo->ViewValue = $this->ForwardTo->Lookup !== NULL && is_array($this->ForwardTo->Lookup->Options) ? $curVal : NULL;
			if ($this->ForwardTo->ViewValue !== NULL) { // Load from cache
				$this->ForwardTo->EditValue = array_values($this->ForwardTo->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`User_Name`" . SearchString("=", $this->ForwardTo->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID` = '".HospitalID()."' ";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->ForwardTo->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ForwardTo->EditValue = $arwrk;
			}

			// modifiedby
			// modifieddatetime
			// GetModifiedName
			// HospID
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// TaskName
			$this->TaskName->LinkCustomAttributes = "";
			$this->TaskName->HrefValue = "";

			// AssignTo
			$this->AssignTo->LinkCustomAttributes = "";
			$this->AssignTo->HrefValue = "";

			// Description
			$this->Description->LinkCustomAttributes = "";
			$this->Description->HrefValue = "";

			// StartDate
			$this->StartDate->LinkCustomAttributes = "";
			$this->StartDate->HrefValue = "";

			// EndDate
			$this->EndDate->LinkCustomAttributes = "";
			$this->EndDate->HrefValue = "";

			// StatusOfTask
			$this->StatusOfTask->LinkCustomAttributes = "";
			$this->StatusOfTask->HrefValue = "";

			// ForwardTo
			$this->ForwardTo->LinkCustomAttributes = "";
			$this->ForwardTo->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// GetModifiedName
			$this->GetModifiedName->LinkCustomAttributes = "";
			$this->GetModifiedName->HrefValue = "";

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
		if ($this->TaskName->Required) {
			if (!$this->TaskName->IsDetailKey && $this->TaskName->FormValue != NULL && $this->TaskName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TaskName->caption(), $this->TaskName->RequiredErrorMessage));
			}
		}
		if ($this->AssignTo->Required) {
			if (!$this->AssignTo->IsDetailKey && $this->AssignTo->FormValue != NULL && $this->AssignTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AssignTo->caption(), $this->AssignTo->RequiredErrorMessage));
			}
		}
		if ($this->Description->Required) {
			if (!$this->Description->IsDetailKey && $this->Description->FormValue != NULL && $this->Description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Description->caption(), $this->Description->RequiredErrorMessage));
			}
		}
		if ($this->StartDate->Required) {
			if (!$this->StartDate->IsDetailKey && $this->StartDate->FormValue != NULL && $this->StartDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StartDate->caption(), $this->StartDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->StartDate->FormValue)) {
			AddMessage($FormError, $this->StartDate->errorMessage());
		}
		if ($this->EndDate->Required) {
			if (!$this->EndDate->IsDetailKey && $this->EndDate->FormValue != NULL && $this->EndDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EndDate->caption(), $this->EndDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->EndDate->FormValue)) {
			AddMessage($FormError, $this->EndDate->errorMessage());
		}
		if ($this->StatusOfTask->Required) {
			if (!$this->StatusOfTask->IsDetailKey && $this->StatusOfTask->FormValue != NULL && $this->StatusOfTask->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StatusOfTask->caption(), $this->StatusOfTask->RequiredErrorMessage));
			}
		}
		if ($this->ForwardTo->Required) {
			if (!$this->ForwardTo->IsDetailKey && $this->ForwardTo->FormValue != NULL && $this->ForwardTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ForwardTo->caption(), $this->ForwardTo->RequiredErrorMessage));
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
		if ($this->GetModifiedName->Required) {
			if (!$this->GetModifiedName->IsDetailKey && $this->GetModifiedName->FormValue != NULL && $this->GetModifiedName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GetModifiedName->caption(), $this->GetModifiedName->RequiredErrorMessage));
			}
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

			// TaskName
			$this->TaskName->setDbValueDef($rsnew, $this->TaskName->CurrentValue, NULL, $this->TaskName->ReadOnly);

			// AssignTo
			$this->AssignTo->setDbValueDef($rsnew, $this->AssignTo->CurrentValue, NULL, $this->AssignTo->ReadOnly);

			// Description
			$this->Description->setDbValueDef($rsnew, $this->Description->CurrentValue, NULL, $this->Description->ReadOnly);

			// StartDate
			$this->StartDate->setDbValueDef($rsnew, UnFormatDateTime($this->StartDate->CurrentValue, 7), NULL, $this->StartDate->ReadOnly);

			// EndDate
			$this->EndDate->setDbValueDef($rsnew, UnFormatDateTime($this->EndDate->CurrentValue, 7), NULL, $this->EndDate->ReadOnly);

			// StatusOfTask
			$this->StatusOfTask->setDbValueDef($rsnew, $this->StatusOfTask->CurrentValue, NULL, $this->StatusOfTask->ReadOnly);

			// ForwardTo
			$this->ForwardTo->setDbValueDef($rsnew, $this->ForwardTo->CurrentValue, NULL, $this->ForwardTo->ReadOnly);

			// modifiedby
			$this->modifiedby->CurrentValue = CurrentUserName();
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

			// modifieddatetime
			$this->modifieddatetime->CurrentValue = CurrentDateTime();
			$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

			// GetModifiedName
			$this->GetModifiedName->CurrentValue = GetUserName();
			$this->GetModifiedName->setDbValueDef($rsnew, $this->GetModifiedName->CurrentValue, NULL);

			// HospID
			$this->HospID->CurrentValue = HospitalID();
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("task_managementlist.php"), "", $this->TableVar, TRUE);
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
				case "x_AssignTo":
					$lookupFilter = function() {
						return "`HospID` = '".HospitalID()."' ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_StatusOfTask":
					break;
				case "x_ForwardTo":
					$lookupFilter = function() {
						return "`HospID` = '".HospitalID()."' ";
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
						case "x_AssignTo":
							break;
						case "x_ForwardTo":
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
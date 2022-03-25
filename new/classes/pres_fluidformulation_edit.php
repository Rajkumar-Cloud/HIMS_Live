<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pres_fluidformulation_edit extends pres_fluidformulation
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_fluidformulation';

	// Page object name
	public $PageObjName = "pres_fluidformulation_edit";

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

		// Table object (pres_fluidformulation)
		if (!isset($GLOBALS["pres_fluidformulation"]) || get_class($GLOBALS["pres_fluidformulation"]) == PROJECT_NAMESPACE . "pres_fluidformulation") {
			$GLOBALS["pres_fluidformulation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_fluidformulation"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_fluidformulation');

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
		global $pres_fluidformulation;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pres_fluidformulation);
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
					if ($pageName == "pres_fluidformulationview.php")
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
					$this->terminate(GetUrl("pres_fluidformulationlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Tradename->setVisibility();
		$this->Itemcode->setVisibility();
		$this->Genericname->setVisibility();
		$this->Volume->setVisibility();
		$this->VolumeUnit->setVisibility();
		$this->Strength->setVisibility();
		$this->StrengthUnit->setVisibility();
		$this->_Route->setVisibility();
		$this->Forms->setVisibility();
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
			$this->terminate("pres_fluidformulationlist.php");
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
					$this->terminate("pres_fluidformulationlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pres_fluidformulationlist.php")
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

		// Check field name 'Tradename' first before field var 'x_Tradename'
		$val = $CurrentForm->hasValue("Tradename") ? $CurrentForm->getValue("Tradename") : $CurrentForm->getValue("x_Tradename");
		if (!$this->Tradename->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Tradename->Visible = FALSE; // Disable update for API request
			else
				$this->Tradename->setFormValue($val);
		}

		// Check field name 'Itemcode' first before field var 'x_Itemcode'
		$val = $CurrentForm->hasValue("Itemcode") ? $CurrentForm->getValue("Itemcode") : $CurrentForm->getValue("x_Itemcode");
		if (!$this->Itemcode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Itemcode->Visible = FALSE; // Disable update for API request
			else
				$this->Itemcode->setFormValue($val);
		}

		// Check field name 'Genericname' first before field var 'x_Genericname'
		$val = $CurrentForm->hasValue("Genericname") ? $CurrentForm->getValue("Genericname") : $CurrentForm->getValue("x_Genericname");
		if (!$this->Genericname->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Genericname->Visible = FALSE; // Disable update for API request
			else
				$this->Genericname->setFormValue($val);
		}

		// Check field name 'Volume' first before field var 'x_Volume'
		$val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
		if (!$this->Volume->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Volume->Visible = FALSE; // Disable update for API request
			else
				$this->Volume->setFormValue($val);
		}

		// Check field name 'VolumeUnit' first before field var 'x_VolumeUnit'
		$val = $CurrentForm->hasValue("VolumeUnit") ? $CurrentForm->getValue("VolumeUnit") : $CurrentForm->getValue("x_VolumeUnit");
		if (!$this->VolumeUnit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->VolumeUnit->Visible = FALSE; // Disable update for API request
			else
				$this->VolumeUnit->setFormValue($val);
		}

		// Check field name 'Strength' first before field var 'x_Strength'
		$val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
		if (!$this->Strength->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength->Visible = FALSE; // Disable update for API request
			else
				$this->Strength->setFormValue($val);
		}

		// Check field name 'StrengthUnit' first before field var 'x_StrengthUnit'
		$val = $CurrentForm->hasValue("StrengthUnit") ? $CurrentForm->getValue("StrengthUnit") : $CurrentForm->getValue("x_StrengthUnit");
		if (!$this->StrengthUnit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->StrengthUnit->Visible = FALSE; // Disable update for API request
			else
				$this->StrengthUnit->setFormValue($val);
		}

		// Check field name 'Route' first before field var 'x__Route'
		$val = $CurrentForm->hasValue("Route") ? $CurrentForm->getValue("Route") : $CurrentForm->getValue("x__Route");
		if (!$this->_Route->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_Route->Visible = FALSE; // Disable update for API request
			else
				$this->_Route->setFormValue($val);
		}

		// Check field name 'Forms' first before field var 'x_Forms'
		$val = $CurrentForm->hasValue("Forms") ? $CurrentForm->getValue("Forms") : $CurrentForm->getValue("x_Forms");
		if (!$this->Forms->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Forms->Visible = FALSE; // Disable update for API request
			else
				$this->Forms->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Tradename->CurrentValue = $this->Tradename->FormValue;
		$this->Itemcode->CurrentValue = $this->Itemcode->FormValue;
		$this->Genericname->CurrentValue = $this->Genericname->FormValue;
		$this->Volume->CurrentValue = $this->Volume->FormValue;
		$this->VolumeUnit->CurrentValue = $this->VolumeUnit->FormValue;
		$this->Strength->CurrentValue = $this->Strength->FormValue;
		$this->StrengthUnit->CurrentValue = $this->StrengthUnit->FormValue;
		$this->_Route->CurrentValue = $this->_Route->FormValue;
		$this->Forms->CurrentValue = $this->Forms->FormValue;
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
		$this->Tradename->setDbValue($row['Tradename']);
		$this->Itemcode->setDbValue($row['Itemcode']);
		$this->Genericname->setDbValue($row['Genericname']);
		$this->Volume->setDbValue($row['Volume']);
		$this->VolumeUnit->setDbValue($row['VolumeUnit']);
		$this->Strength->setDbValue($row['Strength']);
		$this->StrengthUnit->setDbValue($row['StrengthUnit']);
		$this->_Route->setDbValue($row['Route']);
		$this->Forms->setDbValue($row['Forms']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Tradename'] = NULL;
		$row['Itemcode'] = NULL;
		$row['Genericname'] = NULL;
		$row['Volume'] = NULL;
		$row['VolumeUnit'] = NULL;
		$row['Strength'] = NULL;
		$row['StrengthUnit'] = NULL;
		$row['Route'] = NULL;
		$row['Forms'] = NULL;
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
		// Convert decimal values if posted back

		if ($this->Volume->FormValue == $this->Volume->CurrentValue && is_numeric(ConvertToFloatString($this->Volume->CurrentValue)))
			$this->Volume->CurrentValue = ConvertToFloatString($this->Volume->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Strength->FormValue == $this->Strength->CurrentValue && is_numeric(ConvertToFloatString($this->Strength->CurrentValue)))
			$this->Strength->CurrentValue = ConvertToFloatString($this->Strength->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Tradename
		// Itemcode
		// Genericname
		// Volume
		// VolumeUnit
		// Strength
		// StrengthUnit
		// Route
		// Forms

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Tradename
			$this->Tradename->ViewValue = $this->Tradename->CurrentValue;
			$this->Tradename->ViewCustomAttributes = "";

			// Itemcode
			$this->Itemcode->ViewValue = $this->Itemcode->CurrentValue;
			$this->Itemcode->ViewCustomAttributes = "";

			// Genericname
			$this->Genericname->ViewValue = $this->Genericname->CurrentValue;
			$this->Genericname->ViewCustomAttributes = "";

			// Volume
			$this->Volume->ViewValue = $this->Volume->CurrentValue;
			$this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
			$this->Volume->ViewCustomAttributes = "";

			// VolumeUnit
			$this->VolumeUnit->ViewValue = $this->VolumeUnit->CurrentValue;
			$this->VolumeUnit->ViewCustomAttributes = "";

			// Strength
			$this->Strength->ViewValue = $this->Strength->CurrentValue;
			$this->Strength->ViewValue = FormatNumber($this->Strength->ViewValue, 2, -2, -2, -2);
			$this->Strength->ViewCustomAttributes = "";

			// StrengthUnit
			$this->StrengthUnit->ViewValue = $this->StrengthUnit->CurrentValue;
			$this->StrengthUnit->ViewCustomAttributes = "";

			// Route
			$this->_Route->ViewValue = $this->_Route->CurrentValue;
			$this->_Route->ViewCustomAttributes = "";

			// Forms
			$this->Forms->ViewValue = $this->Forms->CurrentValue;
			$this->Forms->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Tradename
			$this->Tradename->LinkCustomAttributes = "";
			$this->Tradename->HrefValue = "";
			$this->Tradename->TooltipValue = "";

			// Itemcode
			$this->Itemcode->LinkCustomAttributes = "";
			$this->Itemcode->HrefValue = "";
			$this->Itemcode->TooltipValue = "";

			// Genericname
			$this->Genericname->LinkCustomAttributes = "";
			$this->Genericname->HrefValue = "";
			$this->Genericname->TooltipValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";
			$this->Volume->TooltipValue = "";

			// VolumeUnit
			$this->VolumeUnit->LinkCustomAttributes = "";
			$this->VolumeUnit->HrefValue = "";
			$this->VolumeUnit->TooltipValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";
			$this->Strength->TooltipValue = "";

			// StrengthUnit
			$this->StrengthUnit->LinkCustomAttributes = "";
			$this->StrengthUnit->HrefValue = "";
			$this->StrengthUnit->TooltipValue = "";

			// Route
			$this->_Route->LinkCustomAttributes = "";
			$this->_Route->HrefValue = "";
			$this->_Route->TooltipValue = "";

			// Forms
			$this->Forms->LinkCustomAttributes = "";
			$this->Forms->HrefValue = "";
			$this->Forms->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Tradename
			$this->Tradename->EditAttrs["class"] = "form-control";
			$this->Tradename->EditCustomAttributes = "";
			if (!$this->Tradename->Raw)
				$this->Tradename->CurrentValue = HtmlDecode($this->Tradename->CurrentValue);
			$this->Tradename->EditValue = HtmlEncode($this->Tradename->CurrentValue);
			$this->Tradename->PlaceHolder = RemoveHtml($this->Tradename->caption());

			// Itemcode
			$this->Itemcode->EditAttrs["class"] = "form-control";
			$this->Itemcode->EditCustomAttributes = "";
			if (!$this->Itemcode->Raw)
				$this->Itemcode->CurrentValue = HtmlDecode($this->Itemcode->CurrentValue);
			$this->Itemcode->EditValue = HtmlEncode($this->Itemcode->CurrentValue);
			$this->Itemcode->PlaceHolder = RemoveHtml($this->Itemcode->caption());

			// Genericname
			$this->Genericname->EditAttrs["class"] = "form-control";
			$this->Genericname->EditCustomAttributes = "";
			if (!$this->Genericname->Raw)
				$this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
			$this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
			$this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

			// Volume
			$this->Volume->EditAttrs["class"] = "form-control";
			$this->Volume->EditCustomAttributes = "";
			$this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
			$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
			if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue))
				$this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
			

			// VolumeUnit
			$this->VolumeUnit->EditAttrs["class"] = "form-control";
			$this->VolumeUnit->EditCustomAttributes = "";
			if (!$this->VolumeUnit->Raw)
				$this->VolumeUnit->CurrentValue = HtmlDecode($this->VolumeUnit->CurrentValue);
			$this->VolumeUnit->EditValue = HtmlEncode($this->VolumeUnit->CurrentValue);
			$this->VolumeUnit->PlaceHolder = RemoveHtml($this->VolumeUnit->caption());

			// Strength
			$this->Strength->EditAttrs["class"] = "form-control";
			$this->Strength->EditCustomAttributes = "";
			$this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
			$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());
			if (strval($this->Strength->EditValue) != "" && is_numeric($this->Strength->EditValue))
				$this->Strength->EditValue = FormatNumber($this->Strength->EditValue, -2, -2, -2, -2);
			

			// StrengthUnit
			$this->StrengthUnit->EditAttrs["class"] = "form-control";
			$this->StrengthUnit->EditCustomAttributes = "";
			if (!$this->StrengthUnit->Raw)
				$this->StrengthUnit->CurrentValue = HtmlDecode($this->StrengthUnit->CurrentValue);
			$this->StrengthUnit->EditValue = HtmlEncode($this->StrengthUnit->CurrentValue);
			$this->StrengthUnit->PlaceHolder = RemoveHtml($this->StrengthUnit->caption());

			// Route
			$this->_Route->EditAttrs["class"] = "form-control";
			$this->_Route->EditCustomAttributes = "";
			if (!$this->_Route->Raw)
				$this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
			$this->_Route->EditValue = HtmlEncode($this->_Route->CurrentValue);
			$this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

			// Forms
			$this->Forms->EditAttrs["class"] = "form-control";
			$this->Forms->EditCustomAttributes = "";
			if (!$this->Forms->Raw)
				$this->Forms->CurrentValue = HtmlDecode($this->Forms->CurrentValue);
			$this->Forms->EditValue = HtmlEncode($this->Forms->CurrentValue);
			$this->Forms->PlaceHolder = RemoveHtml($this->Forms->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Tradename
			$this->Tradename->LinkCustomAttributes = "";
			$this->Tradename->HrefValue = "";

			// Itemcode
			$this->Itemcode->LinkCustomAttributes = "";
			$this->Itemcode->HrefValue = "";

			// Genericname
			$this->Genericname->LinkCustomAttributes = "";
			$this->Genericname->HrefValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";

			// VolumeUnit
			$this->VolumeUnit->LinkCustomAttributes = "";
			$this->VolumeUnit->HrefValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";

			// StrengthUnit
			$this->StrengthUnit->LinkCustomAttributes = "";
			$this->StrengthUnit->HrefValue = "";

			// Route
			$this->_Route->LinkCustomAttributes = "";
			$this->_Route->HrefValue = "";

			// Forms
			$this->Forms->LinkCustomAttributes = "";
			$this->Forms->HrefValue = "";
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
		if ($this->Tradename->Required) {
			if (!$this->Tradename->IsDetailKey && $this->Tradename->FormValue != NULL && $this->Tradename->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tradename->caption(), $this->Tradename->RequiredErrorMessage));
			}
		}
		if ($this->Itemcode->Required) {
			if (!$this->Itemcode->IsDetailKey && $this->Itemcode->FormValue != NULL && $this->Itemcode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Itemcode->caption(), $this->Itemcode->RequiredErrorMessage));
			}
		}
		if ($this->Genericname->Required) {
			if (!$this->Genericname->IsDetailKey && $this->Genericname->FormValue != NULL && $this->Genericname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Genericname->caption(), $this->Genericname->RequiredErrorMessage));
			}
		}
		if ($this->Volume->Required) {
			if (!$this->Volume->IsDetailKey && $this->Volume->FormValue != NULL && $this->Volume->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Volume->FormValue)) {
			AddMessage($FormError, $this->Volume->errorMessage());
		}
		if ($this->VolumeUnit->Required) {
			if (!$this->VolumeUnit->IsDetailKey && $this->VolumeUnit->FormValue != NULL && $this->VolumeUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VolumeUnit->caption(), $this->VolumeUnit->RequiredErrorMessage));
			}
		}
		if ($this->Strength->Required) {
			if (!$this->Strength->IsDetailKey && $this->Strength->FormValue != NULL && $this->Strength->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Strength->FormValue)) {
			AddMessage($FormError, $this->Strength->errorMessage());
		}
		if ($this->StrengthUnit->Required) {
			if (!$this->StrengthUnit->IsDetailKey && $this->StrengthUnit->FormValue != NULL && $this->StrengthUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StrengthUnit->caption(), $this->StrengthUnit->RequiredErrorMessage));
			}
		}
		if ($this->_Route->Required) {
			if (!$this->_Route->IsDetailKey && $this->_Route->FormValue != NULL && $this->_Route->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Route->caption(), $this->_Route->RequiredErrorMessage));
			}
		}
		if ($this->Forms->Required) {
			if (!$this->Forms->IsDetailKey && $this->Forms->FormValue != NULL && $this->Forms->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Forms->caption(), $this->Forms->RequiredErrorMessage));
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

			// Tradename
			$this->Tradename->setDbValueDef($rsnew, $this->Tradename->CurrentValue, NULL, $this->Tradename->ReadOnly);

			// Itemcode
			$this->Itemcode->setDbValueDef($rsnew, $this->Itemcode->CurrentValue, NULL, $this->Itemcode->ReadOnly);

			// Genericname
			$this->Genericname->setDbValueDef($rsnew, $this->Genericname->CurrentValue, NULL, $this->Genericname->ReadOnly);

			// Volume
			$this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, NULL, $this->Volume->ReadOnly);

			// VolumeUnit
			$this->VolumeUnit->setDbValueDef($rsnew, $this->VolumeUnit->CurrentValue, NULL, $this->VolumeUnit->ReadOnly);

			// Strength
			$this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, NULL, $this->Strength->ReadOnly);

			// StrengthUnit
			$this->StrengthUnit->setDbValueDef($rsnew, $this->StrengthUnit->CurrentValue, NULL, $this->StrengthUnit->ReadOnly);

			// Route
			$this->_Route->setDbValueDef($rsnew, $this->_Route->CurrentValue, NULL, $this->_Route->ReadOnly);

			// Forms
			$this->Forms->setDbValueDef($rsnew, $this->Forms->CurrentValue, NULL, $this->Forms->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pres_fluidformulationlist.php"), "", $this->TableVar, TRUE);
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
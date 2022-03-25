<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pharmacy_services_add extends pharmacy_services
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_services';

	// Page object name
	public $PageObjName = "pharmacy_services_add";

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

		// Table object (pharmacy_services)
		if (!isset($GLOBALS["pharmacy_services"]) || get_class($GLOBALS["pharmacy_services"]) == PROJECT_NAMESPACE . "pharmacy_services") {
			$GLOBALS["pharmacy_services"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_services"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (mas_pharmacy)
		if (!isset($GLOBALS['mas_pharmacy']))
			$GLOBALS['mas_pharmacy'] = new mas_pharmacy();

		// Table object (pharmacy)
		if (!isset($GLOBALS['pharmacy']))
			$GLOBALS['pharmacy'] = new pharmacy();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_services');

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
		global $pharmacy_services;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pharmacy_services);
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
					if ($pageName == "pharmacy_servicesview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

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
			if (!$Security->canAdd()) {
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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("pharmacy_serviceslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->pharmacy_id->setVisibility();
		$this->patient_id->setVisibility();
		$this->name->setVisibility();
		$this->amount->setVisibility();
		$this->description->setVisibility();
		$this->charged_date->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
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
		$this->setupLookupOptions($this->pharmacy_id);
		$this->setupLookupOptions($this->name);
		$this->setupLookupOptions($this->status);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pharmacy_serviceslist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("pharmacy_serviceslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "pharmacy_serviceslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "pharmacy_servicesview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->pharmacy_id->CurrentValue = NULL;
		$this->pharmacy_id->OldValue = $this->pharmacy_id->CurrentValue;
		$this->patient_id->CurrentValue = NULL;
		$this->patient_id->OldValue = $this->patient_id->CurrentValue;
		$this->name->CurrentValue = NULL;
		$this->name->OldValue = $this->name->CurrentValue;
		$this->amount->CurrentValue = NULL;
		$this->amount->OldValue = $this->amount->CurrentValue;
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
		$this->charged_date->CurrentValue = NULL;
		$this->charged_date->OldValue = $this->charged_date->CurrentValue;
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
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'pharmacy_id' first before field var 'x_pharmacy_id'
		$val = $CurrentForm->hasValue("pharmacy_id") ? $CurrentForm->getValue("pharmacy_id") : $CurrentForm->getValue("x_pharmacy_id");
		if (!$this->pharmacy_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->pharmacy_id->Visible = FALSE; // Disable update for API request
			else
				$this->pharmacy_id->setFormValue($val);
		}

		// Check field name 'patient_id' first before field var 'x_patient_id'
		$val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
		if (!$this->patient_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_id->Visible = FALSE; // Disable update for API request
			else
				$this->patient_id->setFormValue($val);
		}

		// Check field name 'name' first before field var 'x_name'
		$val = $CurrentForm->hasValue("name") ? $CurrentForm->getValue("name") : $CurrentForm->getValue("x_name");
		if (!$this->name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->name->Visible = FALSE; // Disable update for API request
			else
				$this->name->setFormValue($val);
		}

		// Check field name 'amount' first before field var 'x_amount'
		$val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
		if (!$this->amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->amount->Visible = FALSE; // Disable update for API request
			else
				$this->amount->setFormValue($val);
		}

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}

		// Check field name 'charged_date' first before field var 'x_charged_date'
		$val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
		if (!$this->charged_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->charged_date->Visible = FALSE; // Disable update for API request
			else
				$this->charged_date->setFormValue($val);
			$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->pharmacy_id->CurrentValue = $this->pharmacy_id->FormValue;
		$this->patient_id->CurrentValue = $this->patient_id->FormValue;
		$this->name->CurrentValue = $this->name->FormValue;
		$this->amount->CurrentValue = $this->amount->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->charged_date->CurrentValue = $this->charged_date->FormValue;
		$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
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
		$this->pharmacy_id->setDbValue($row['pharmacy_id']);
		$this->patient_id->setDbValue($row['patient_id']);
		$this->name->setDbValue($row['name']);
		if (array_key_exists('EV__name', $rs->fields)) {
			$this->name->VirtualValue = $rs->fields('EV__name'); // Set up virtual field value
		} else {
			$this->name->VirtualValue = ""; // Clear value
		}
		$this->amount->setDbValue($row['amount']);
		$this->description->setDbValue($row['description']);
		$this->charged_date->setDbValue($row['charged_date']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['pharmacy_id'] = $this->pharmacy_id->CurrentValue;
		$row['patient_id'] = $this->patient_id->CurrentValue;
		$row['name'] = $this->name->CurrentValue;
		$row['amount'] = $this->amount->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['charged_date'] = $this->charged_date->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
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

		if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue)))
			$this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// pharmacy_id
		// patient_id
		// name
		// amount
		// description
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pharmacy_id
			$curVal = strval($this->pharmacy_id->CurrentValue);
			if ($curVal != "") {
				$this->pharmacy_id->ViewValue = $this->pharmacy_id->lookupCacheOption($curVal);
				if ($this->pharmacy_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->pharmacy_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->pharmacy_id->ViewValue = $this->pharmacy_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pharmacy_id->ViewValue = $this->pharmacy_id->CurrentValue;
					}
				}
			} else {
				$this->pharmacy_id->ViewValue = NULL;
			}
			$this->pharmacy_id->ViewCustomAttributes = "";

			// patient_id
			$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
			$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
			$this->patient_id->ViewCustomAttributes = "";

			// name
			if ($this->name->VirtualValue != "") {
				$this->name->ViewValue = $this->name->VirtualValue;
			} else {
				$curVal = strval($this->name->CurrentValue);
				if ($curVal != "") {
					$this->name->ViewValue = $this->name->lookupCacheOption($curVal);
					if ($this->name->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->name->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->name->ViewValue = $this->name->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->name->ViewValue = $this->name->CurrentValue;
						}
					}
				} else {
					$this->name->ViewValue = NULL;
				}
			}
			$this->name->ViewCustomAttributes = "";

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// charged_date
			$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
			$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
			$this->charged_date->ViewCustomAttributes = "";

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

			// pharmacy_id
			$this->pharmacy_id->LinkCustomAttributes = "";
			$this->pharmacy_id->HrefValue = "";
			$this->pharmacy_id->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// name
			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";
			$this->name->TooltipValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";
			$this->amount->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";
			$this->charged_date->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// pharmacy_id
			$this->pharmacy_id->EditAttrs["class"] = "form-control";
			$this->pharmacy_id->EditCustomAttributes = "";
			if ($this->pharmacy_id->getSessionValue() != "") {
				$this->pharmacy_id->CurrentValue = $this->pharmacy_id->getSessionValue();
				$curVal = strval($this->pharmacy_id->CurrentValue);
				if ($curVal != "") {
					$this->pharmacy_id->ViewValue = $this->pharmacy_id->lookupCacheOption($curVal);
					if ($this->pharmacy_id->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->pharmacy_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->pharmacy_id->ViewValue = $this->pharmacy_id->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->pharmacy_id->ViewValue = $this->pharmacy_id->CurrentValue;
						}
					}
				} else {
					$this->pharmacy_id->ViewValue = NULL;
				}
				$this->pharmacy_id->ViewCustomAttributes = "";
			} else {
				$curVal = trim(strval($this->pharmacy_id->CurrentValue));
				if ($curVal != "")
					$this->pharmacy_id->ViewValue = $this->pharmacy_id->lookupCacheOption($curVal);
				else
					$this->pharmacy_id->ViewValue = $this->pharmacy_id->Lookup !== NULL && is_array($this->pharmacy_id->Lookup->Options) ? $curVal : NULL;
				if ($this->pharmacy_id->ViewValue !== NULL) { // Load from cache
					$this->pharmacy_id->EditValue = array_values($this->pharmacy_id->Lookup->Options);
				} else { // Lookup from database
					if ($curVal == "") {
						$filterWrk = "0=1";
					} else {
						$filterWrk = "`id`" . SearchString("=", $this->pharmacy_id->CurrentValue, DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->pharmacy_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					$arwrk = $rswrk ? $rswrk->getRows() : [];
					if ($rswrk)
						$rswrk->close();
					$this->pharmacy_id->EditValue = $arwrk;
				}
			}

			// patient_id
			$this->patient_id->EditAttrs["class"] = "form-control";
			$this->patient_id->EditCustomAttributes = "";
			if ($this->patient_id->getSessionValue() != "") {
				$this->patient_id->CurrentValue = $this->patient_id->getSessionValue();
				$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
				$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
				$this->patient_id->ViewCustomAttributes = "";
			} else {
				$this->patient_id->EditValue = HtmlEncode($this->patient_id->CurrentValue);
				$this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());
			}

			// name
			$this->name->EditCustomAttributes = "";
			if ($this->name->getSessionValue() != "") {
				$this->name->CurrentValue = $this->name->getSessionValue();
				if ($this->name->VirtualValue != "") {
					$this->name->ViewValue = $this->name->VirtualValue;
				} else {
					$curVal = strval($this->name->CurrentValue);
					if ($curVal != "") {
						$this->name->ViewValue = $this->name->lookupCacheOption($curVal);
						if ($this->name->ViewValue === NULL) { // Lookup from database
							$filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
							$sqlWrk = $this->name->Lookup->getSql(FALSE, $filterWrk, '', $this);
							$rswrk = Conn()->execute($sqlWrk);
							if ($rswrk && !$rswrk->EOF) { // Lookup values found
								$arwrk = [];
								$arwrk[1] = $rswrk->fields('df');
								$this->name->ViewValue = $this->name->displayValue($arwrk);
								$rswrk->Close();
							} else {
								$this->name->ViewValue = $this->name->CurrentValue;
							}
						}
					} else {
						$this->name->ViewValue = NULL;
					}
				}
				$this->name->ViewCustomAttributes = "";
			} else {
				$curVal = trim(strval($this->name->CurrentValue));
				if ($curVal != "")
					$this->name->ViewValue = $this->name->lookupCacheOption($curVal);
				else
					$this->name->ViewValue = $this->name->Lookup !== NULL && is_array($this->name->Lookup->Options) ? $curVal : NULL;
				if ($this->name->ViewValue !== NULL) { // Load from cache
					$this->name->EditValue = array_values($this->name->Lookup->Options);
					if ($this->name->ViewValue == "")
						$this->name->ViewValue = $Language->phrase("PleaseSelect");
				} else { // Lookup from database
					if ($curVal == "") {
						$filterWrk = "0=1";
					} else {
						$filterWrk = "`name`" . SearchString("=", $this->name->CurrentValue, DATATYPE_STRING, "");
					}
					$sqlWrk = $this->name->Lookup->getSql(TRUE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->name->ViewValue = $this->name->displayValue($arwrk);
					} else {
						$this->name->ViewValue = $Language->phrase("PleaseSelect");
					}
					$arwrk = $rswrk ? $rswrk->getRows() : [];
					if ($rswrk)
						$rswrk->close();
					$this->name->EditValue = $arwrk;
				}
			}

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			if ($this->amount->getSessionValue() != "") {
				$this->amount->CurrentValue = $this->amount->getSessionValue();
				$this->amount->ViewValue = $this->amount->CurrentValue;
				$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
				$this->amount->ViewCustomAttributes = "";
			} else {
				$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
				$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
				if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue))
					$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
				
			}

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if ($this->description->getSessionValue() != "") {
				$this->description->CurrentValue = $this->description->getSessionValue();
				$this->description->ViewValue = $this->description->CurrentValue;
				$this->description->ViewCustomAttributes = "";
			} else {
				$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
				$this->description->PlaceHolder = RemoveHtml($this->description->caption());
			}

			// charged_date
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
			// createddatetime
			// Add refer script
			// pharmacy_id

			$this->pharmacy_id->LinkCustomAttributes = "";
			$this->pharmacy_id->HrefValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";

			// name
			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
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
		if ($this->pharmacy_id->Required) {
			if (!$this->pharmacy_id->IsDetailKey && $this->pharmacy_id->FormValue != NULL && $this->pharmacy_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pharmacy_id->caption(), $this->pharmacy_id->RequiredErrorMessage));
			}
		}
		if ($this->patient_id->Required) {
			if (!$this->patient_id->IsDetailKey && $this->patient_id->FormValue != NULL && $this->patient_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patient_id->FormValue)) {
			AddMessage($FormError, $this->patient_id->errorMessage());
		}
		if ($this->name->Required) {
			if (!$this->name->IsDetailKey && $this->name->FormValue != NULL && $this->name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->name->caption(), $this->name->RequiredErrorMessage));
			}
		}
		if ($this->amount->Required) {
			if (!$this->amount->IsDetailKey && $this->amount->FormValue != NULL && $this->amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->amount->FormValue)) {
			AddMessage($FormError, $this->amount->errorMessage());
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->charged_date->Required) {
			if (!$this->charged_date->IsDetailKey && $this->charged_date->FormValue != NULL && $this->charged_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
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

		// pharmacy_id
		$this->pharmacy_id->setDbValueDef($rsnew, $this->pharmacy_id->CurrentValue, 0, FALSE);

		// patient_id
		$this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, FALSE);

		// name
		$this->name->setDbValueDef($rsnew, $this->name->CurrentValue, "", FALSE);

		// amount
		$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, FALSE);

		// charged_date
		$this->charged_date->CurrentValue = CurrentDate();
		$this->charged_date->setDbValueDef($rsnew, $this->charged_date->CurrentValue, CurrentDate());

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, FALSE);

		// createdby
		$this->createdby->CurrentValue = CurrentUserID();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
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
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
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
			if ($masterTblVar == "pharmacy") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("pharmacy_id"))) !== NULL) {
					$GLOBALS["pharmacy"]->id->setQueryStringValue($parm);
					$this->pharmacy_id->setQueryStringValue($GLOBALS["pharmacy"]->id->QueryStringValue);
					$this->pharmacy_id->setSessionValue($this->pharmacy_id->QueryStringValue);
					if (!is_numeric($GLOBALS["pharmacy"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_patient_id", Get("patient_id"))) !== NULL) {
					$GLOBALS["pharmacy"]->patient_id->setQueryStringValue($parm);
					$this->patient_id->setQueryStringValue($GLOBALS["pharmacy"]->patient_id->QueryStringValue);
					$this->patient_id->setSessionValue($this->patient_id->QueryStringValue);
					if (!is_numeric($GLOBALS["pharmacy"]->patient_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "mas_pharmacy") {
				$validMaster = TRUE;
				if (($parm = Get("fk_name", Get("name"))) !== NULL) {
					$GLOBALS["mas_pharmacy"]->name->setQueryStringValue($parm);
					$this->name->setQueryStringValue($GLOBALS["mas_pharmacy"]->name->QueryStringValue);
					$this->name->setSessionValue($this->name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_amount", Get("amount"))) !== NULL) {
					$GLOBALS["mas_pharmacy"]->amount->setQueryStringValue($parm);
					$this->amount->setQueryStringValue($GLOBALS["mas_pharmacy"]->amount->QueryStringValue);
					$this->amount->setSessionValue($this->amount->QueryStringValue);
					if (!is_numeric($GLOBALS["mas_pharmacy"]->amount->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_description", Get("description"))) !== NULL) {
					$GLOBALS["mas_pharmacy"]->description->setQueryStringValue($parm);
					$this->description->setQueryStringValue($GLOBALS["mas_pharmacy"]->description->QueryStringValue);
					$this->description->setSessionValue($this->description->QueryStringValue);
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
			if ($masterTblVar == "pharmacy") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("pharmacy_id"))) !== NULL) {
					$GLOBALS["pharmacy"]->id->setFormValue($parm);
					$this->pharmacy_id->setFormValue($GLOBALS["pharmacy"]->id->FormValue);
					$this->pharmacy_id->setSessionValue($this->pharmacy_id->FormValue);
					if (!is_numeric($GLOBALS["pharmacy"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_patient_id", Post("patient_id"))) !== NULL) {
					$GLOBALS["pharmacy"]->patient_id->setFormValue($parm);
					$this->patient_id->setFormValue($GLOBALS["pharmacy"]->patient_id->FormValue);
					$this->patient_id->setSessionValue($this->patient_id->FormValue);
					if (!is_numeric($GLOBALS["pharmacy"]->patient_id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "mas_pharmacy") {
				$validMaster = TRUE;
				if (($parm = Post("fk_name", Post("name"))) !== NULL) {
					$GLOBALS["mas_pharmacy"]->name->setFormValue($parm);
					$this->name->setFormValue($GLOBALS["mas_pharmacy"]->name->FormValue);
					$this->name->setSessionValue($this->name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_amount", Post("amount"))) !== NULL) {
					$GLOBALS["mas_pharmacy"]->amount->setFormValue($parm);
					$this->amount->setFormValue($GLOBALS["mas_pharmacy"]->amount->FormValue);
					$this->amount->setSessionValue($this->amount->FormValue);
					if (!is_numeric($GLOBALS["mas_pharmacy"]->amount->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_description", Post("description"))) !== NULL) {
					$GLOBALS["mas_pharmacy"]->description->setFormValue($parm);
					$this->description->setFormValue($GLOBALS["mas_pharmacy"]->description->FormValue);
					$this->description->setSessionValue($this->description->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "pharmacy") {
				if ($this->pharmacy_id->CurrentValue == "")
					$this->pharmacy_id->setSessionValue("");
				if ($this->patient_id->CurrentValue == "")
					$this->patient_id->setSessionValue("");
			}
			if ($masterTblVar != "mas_pharmacy") {
				if ($this->name->CurrentValue == "")
					$this->name->setSessionValue("");
				if ($this->amount->CurrentValue == "")
					$this->amount->setSessionValue("");
				if ($this->description->CurrentValue == "")
					$this->description->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_serviceslist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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
				case "x_pharmacy_id":
					break;
				case "x_name":
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
						case "x_pharmacy_id":
							break;
						case "x_name":
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
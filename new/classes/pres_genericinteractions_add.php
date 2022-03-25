<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pres_genericinteractions_add extends pres_genericinteractions
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_genericinteractions';

	// Page object name
	public $PageObjName = "pres_genericinteractions_add";

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

		// Table object (pres_genericinteractions)
		if (!isset($GLOBALS["pres_genericinteractions"]) || get_class($GLOBALS["pres_genericinteractions"]) == PROJECT_NAMESPACE . "pres_genericinteractions") {
			$GLOBALS["pres_genericinteractions"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_genericinteractions"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_genericinteractions');

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
		global $pres_genericinteractions;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pres_genericinteractions);
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
					if ($pageName == "pres_genericinteractionsview.php")
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
					$this->terminate(GetUrl("pres_genericinteractionslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->Genericname->setVisibility();
		$this->Catid->setVisibility();
		$this->Interactions->setVisibility();
		$this->Intid->setVisibility();
		$this->Createddt->setVisibility();
		$this->Createdtm->setVisibility();
		$this->Statusbit->setVisibility();
		$this->Remarks->setVisibility();
		$this->Username->setVisibility();
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

		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pres_genericinteractionslist.php");
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
					$this->terminate("pres_genericinteractionslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "pres_genericinteractionslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "pres_genericinteractionsview.php")
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
		$this->Genericname->CurrentValue = NULL;
		$this->Genericname->OldValue = $this->Genericname->CurrentValue;
		$this->Catid->CurrentValue = NULL;
		$this->Catid->OldValue = $this->Catid->CurrentValue;
		$this->Interactions->CurrentValue = NULL;
		$this->Interactions->OldValue = $this->Interactions->CurrentValue;
		$this->Intid->CurrentValue = NULL;
		$this->Intid->OldValue = $this->Intid->CurrentValue;
		$this->Createddt->CurrentValue = NULL;
		$this->Createddt->OldValue = $this->Createddt->CurrentValue;
		$this->Createdtm->CurrentValue = NULL;
		$this->Createdtm->OldValue = $this->Createdtm->CurrentValue;
		$this->Statusbit->CurrentValue = NULL;
		$this->Statusbit->OldValue = $this->Statusbit->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->Username->CurrentValue = NULL;
		$this->Username->OldValue = $this->Username->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Genericname' first before field var 'x_Genericname'
		$val = $CurrentForm->hasValue("Genericname") ? $CurrentForm->getValue("Genericname") : $CurrentForm->getValue("x_Genericname");
		if (!$this->Genericname->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Genericname->Visible = FALSE; // Disable update for API request
			else
				$this->Genericname->setFormValue($val);
		}

		// Check field name 'Catid' first before field var 'x_Catid'
		$val = $CurrentForm->hasValue("Catid") ? $CurrentForm->getValue("Catid") : $CurrentForm->getValue("x_Catid");
		if (!$this->Catid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Catid->Visible = FALSE; // Disable update for API request
			else
				$this->Catid->setFormValue($val);
		}

		// Check field name 'Interactions' first before field var 'x_Interactions'
		$val = $CurrentForm->hasValue("Interactions") ? $CurrentForm->getValue("Interactions") : $CurrentForm->getValue("x_Interactions");
		if (!$this->Interactions->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Interactions->Visible = FALSE; // Disable update for API request
			else
				$this->Interactions->setFormValue($val);
		}

		// Check field name 'Intid' first before field var 'x_Intid'
		$val = $CurrentForm->hasValue("Intid") ? $CurrentForm->getValue("Intid") : $CurrentForm->getValue("x_Intid");
		if (!$this->Intid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Intid->Visible = FALSE; // Disable update for API request
			else
				$this->Intid->setFormValue($val);
		}

		// Check field name 'Createddt' first before field var 'x_Createddt'
		$val = $CurrentForm->hasValue("Createddt") ? $CurrentForm->getValue("Createddt") : $CurrentForm->getValue("x_Createddt");
		if (!$this->Createddt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Createddt->Visible = FALSE; // Disable update for API request
			else
				$this->Createddt->setFormValue($val);
			$this->Createddt->CurrentValue = UnFormatDateTime($this->Createddt->CurrentValue, 0);
		}

		// Check field name 'Createdtm' first before field var 'x_Createdtm'
		$val = $CurrentForm->hasValue("Createdtm") ? $CurrentForm->getValue("Createdtm") : $CurrentForm->getValue("x_Createdtm");
		if (!$this->Createdtm->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Createdtm->Visible = FALSE; // Disable update for API request
			else
				$this->Createdtm->setFormValue($val);
			$this->Createdtm->CurrentValue = UnFormatDateTime($this->Createdtm->CurrentValue, 4);
		}

		// Check field name 'Statusbit' first before field var 'x_Statusbit'
		$val = $CurrentForm->hasValue("Statusbit") ? $CurrentForm->getValue("Statusbit") : $CurrentForm->getValue("x_Statusbit");
		if (!$this->Statusbit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Statusbit->Visible = FALSE; // Disable update for API request
			else
				$this->Statusbit->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'Username' first before field var 'x_Username'
		$val = $CurrentForm->hasValue("Username") ? $CurrentForm->getValue("Username") : $CurrentForm->getValue("x_Username");
		if (!$this->Username->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Username->Visible = FALSE; // Disable update for API request
			else
				$this->Username->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Genericname->CurrentValue = $this->Genericname->FormValue;
		$this->Catid->CurrentValue = $this->Catid->FormValue;
		$this->Interactions->CurrentValue = $this->Interactions->FormValue;
		$this->Intid->CurrentValue = $this->Intid->FormValue;
		$this->Createddt->CurrentValue = $this->Createddt->FormValue;
		$this->Createddt->CurrentValue = UnFormatDateTime($this->Createddt->CurrentValue, 0);
		$this->Createdtm->CurrentValue = $this->Createdtm->FormValue;
		$this->Createdtm->CurrentValue = UnFormatDateTime($this->Createdtm->CurrentValue, 4);
		$this->Statusbit->CurrentValue = $this->Statusbit->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->Username->CurrentValue = $this->Username->FormValue;
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
		$this->Genericname->setDbValue($row['Genericname']);
		$this->Catid->setDbValue($row['Catid']);
		$this->Interactions->setDbValue($row['Interactions']);
		$this->Intid->setDbValue($row['Intid']);
		$this->Createddt->setDbValue($row['Createddt']);
		$this->Createdtm->setDbValue($row['Createdtm']);
		$this->Statusbit->setDbValue($row['Statusbit']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->Username->setDbValue($row['Username']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Genericname'] = $this->Genericname->CurrentValue;
		$row['Catid'] = $this->Catid->CurrentValue;
		$row['Interactions'] = $this->Interactions->CurrentValue;
		$row['Intid'] = $this->Intid->CurrentValue;
		$row['Createddt'] = $this->Createddt->CurrentValue;
		$row['Createdtm'] = $this->Createdtm->CurrentValue;
		$row['Statusbit'] = $this->Statusbit->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['Username'] = $this->Username->CurrentValue;
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
		// Genericname
		// Catid
		// Interactions
		// Intid
		// Createddt
		// Createdtm
		// Statusbit
		// Remarks
		// Username

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Genericname
			$this->Genericname->ViewValue = $this->Genericname->CurrentValue;
			$this->Genericname->ViewCustomAttributes = "";

			// Catid
			$this->Catid->ViewValue = $this->Catid->CurrentValue;
			$this->Catid->ViewValue = FormatNumber($this->Catid->ViewValue, 0, -2, -2, -2);
			$this->Catid->ViewCustomAttributes = "";

			// Interactions
			$this->Interactions->ViewValue = $this->Interactions->CurrentValue;
			$this->Interactions->ViewCustomAttributes = "";

			// Intid
			$this->Intid->ViewValue = $this->Intid->CurrentValue;
			$this->Intid->ViewValue = FormatNumber($this->Intid->ViewValue, 0, -2, -2, -2);
			$this->Intid->ViewCustomAttributes = "";

			// Createddt
			$this->Createddt->ViewValue = $this->Createddt->CurrentValue;
			$this->Createddt->ViewValue = FormatDateTime($this->Createddt->ViewValue, 0);
			$this->Createddt->ViewCustomAttributes = "";

			// Createdtm
			$this->Createdtm->ViewValue = $this->Createdtm->CurrentValue;
			$this->Createdtm->ViewValue = FormatDateTime($this->Createdtm->ViewValue, 4);
			$this->Createdtm->ViewCustomAttributes = "";

			// Statusbit
			$this->Statusbit->ViewValue = $this->Statusbit->CurrentValue;
			$this->Statusbit->ViewValue = FormatNumber($this->Statusbit->ViewValue, 0, -2, -2, -2);
			$this->Statusbit->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// Username
			$this->Username->ViewValue = $this->Username->CurrentValue;
			$this->Username->ViewCustomAttributes = "";

			// Genericname
			$this->Genericname->LinkCustomAttributes = "";
			$this->Genericname->HrefValue = "";
			$this->Genericname->TooltipValue = "";

			// Catid
			$this->Catid->LinkCustomAttributes = "";
			$this->Catid->HrefValue = "";
			$this->Catid->TooltipValue = "";

			// Interactions
			$this->Interactions->LinkCustomAttributes = "";
			$this->Interactions->HrefValue = "";
			$this->Interactions->TooltipValue = "";

			// Intid
			$this->Intid->LinkCustomAttributes = "";
			$this->Intid->HrefValue = "";
			$this->Intid->TooltipValue = "";

			// Createddt
			$this->Createddt->LinkCustomAttributes = "";
			$this->Createddt->HrefValue = "";
			$this->Createddt->TooltipValue = "";

			// Createdtm
			$this->Createdtm->LinkCustomAttributes = "";
			$this->Createdtm->HrefValue = "";
			$this->Createdtm->TooltipValue = "";

			// Statusbit
			$this->Statusbit->LinkCustomAttributes = "";
			$this->Statusbit->HrefValue = "";
			$this->Statusbit->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// Username
			$this->Username->LinkCustomAttributes = "";
			$this->Username->HrefValue = "";
			$this->Username->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Genericname
			$this->Genericname->EditAttrs["class"] = "form-control";
			$this->Genericname->EditCustomAttributes = "";
			if (!$this->Genericname->Raw)
				$this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
			$this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
			$this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

			// Catid
			$this->Catid->EditAttrs["class"] = "form-control";
			$this->Catid->EditCustomAttributes = "";
			$this->Catid->EditValue = HtmlEncode($this->Catid->CurrentValue);
			$this->Catid->PlaceHolder = RemoveHtml($this->Catid->caption());

			// Interactions
			$this->Interactions->EditAttrs["class"] = "form-control";
			$this->Interactions->EditCustomAttributes = "";
			if (!$this->Interactions->Raw)
				$this->Interactions->CurrentValue = HtmlDecode($this->Interactions->CurrentValue);
			$this->Interactions->EditValue = HtmlEncode($this->Interactions->CurrentValue);
			$this->Interactions->PlaceHolder = RemoveHtml($this->Interactions->caption());

			// Intid
			$this->Intid->EditAttrs["class"] = "form-control";
			$this->Intid->EditCustomAttributes = "";
			$this->Intid->EditValue = HtmlEncode($this->Intid->CurrentValue);
			$this->Intid->PlaceHolder = RemoveHtml($this->Intid->caption());

			// Createddt
			$this->Createddt->EditAttrs["class"] = "form-control";
			$this->Createddt->EditCustomAttributes = "";
			$this->Createddt->EditValue = HtmlEncode(FormatDateTime($this->Createddt->CurrentValue, 8));
			$this->Createddt->PlaceHolder = RemoveHtml($this->Createddt->caption());

			// Createdtm
			$this->Createdtm->EditAttrs["class"] = "form-control";
			$this->Createdtm->EditCustomAttributes = "";
			$this->Createdtm->EditValue = HtmlEncode($this->Createdtm->CurrentValue);
			$this->Createdtm->PlaceHolder = RemoveHtml($this->Createdtm->caption());

			// Statusbit
			$this->Statusbit->EditAttrs["class"] = "form-control";
			$this->Statusbit->EditCustomAttributes = "";
			$this->Statusbit->EditValue = HtmlEncode($this->Statusbit->CurrentValue);
			$this->Statusbit->PlaceHolder = RemoveHtml($this->Statusbit->caption());

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			if (!$this->Remarks->Raw)
				$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// Username
			$this->Username->EditAttrs["class"] = "form-control";
			$this->Username->EditCustomAttributes = "";
			if (!$this->Username->Raw)
				$this->Username->CurrentValue = HtmlDecode($this->Username->CurrentValue);
			$this->Username->EditValue = HtmlEncode($this->Username->CurrentValue);
			$this->Username->PlaceHolder = RemoveHtml($this->Username->caption());

			// Add refer script
			// Genericname

			$this->Genericname->LinkCustomAttributes = "";
			$this->Genericname->HrefValue = "";

			// Catid
			$this->Catid->LinkCustomAttributes = "";
			$this->Catid->HrefValue = "";

			// Interactions
			$this->Interactions->LinkCustomAttributes = "";
			$this->Interactions->HrefValue = "";

			// Intid
			$this->Intid->LinkCustomAttributes = "";
			$this->Intid->HrefValue = "";

			// Createddt
			$this->Createddt->LinkCustomAttributes = "";
			$this->Createddt->HrefValue = "";

			// Createdtm
			$this->Createdtm->LinkCustomAttributes = "";
			$this->Createdtm->HrefValue = "";

			// Statusbit
			$this->Statusbit->LinkCustomAttributes = "";
			$this->Statusbit->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// Username
			$this->Username->LinkCustomAttributes = "";
			$this->Username->HrefValue = "";
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
		if ($this->Genericname->Required) {
			if (!$this->Genericname->IsDetailKey && $this->Genericname->FormValue != NULL && $this->Genericname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Genericname->caption(), $this->Genericname->RequiredErrorMessage));
			}
		}
		if ($this->Catid->Required) {
			if (!$this->Catid->IsDetailKey && $this->Catid->FormValue != NULL && $this->Catid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Catid->caption(), $this->Catid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Catid->FormValue)) {
			AddMessage($FormError, $this->Catid->errorMessage());
		}
		if ($this->Interactions->Required) {
			if (!$this->Interactions->IsDetailKey && $this->Interactions->FormValue != NULL && $this->Interactions->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Interactions->caption(), $this->Interactions->RequiredErrorMessage));
			}
		}
		if ($this->Intid->Required) {
			if (!$this->Intid->IsDetailKey && $this->Intid->FormValue != NULL && $this->Intid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Intid->caption(), $this->Intid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Intid->FormValue)) {
			AddMessage($FormError, $this->Intid->errorMessage());
		}
		if ($this->Createddt->Required) {
			if (!$this->Createddt->IsDetailKey && $this->Createddt->FormValue != NULL && $this->Createddt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Createddt->caption(), $this->Createddt->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Createddt->FormValue)) {
			AddMessage($FormError, $this->Createddt->errorMessage());
		}
		if ($this->Createdtm->Required) {
			if (!$this->Createdtm->IsDetailKey && $this->Createdtm->FormValue != NULL && $this->Createdtm->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Createdtm->caption(), $this->Createdtm->RequiredErrorMessage));
			}
		}
		if (!CheckTime($this->Createdtm->FormValue)) {
			AddMessage($FormError, $this->Createdtm->errorMessage());
		}
		if ($this->Statusbit->Required) {
			if (!$this->Statusbit->IsDetailKey && $this->Statusbit->FormValue != NULL && $this->Statusbit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Statusbit->caption(), $this->Statusbit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Statusbit->FormValue)) {
			AddMessage($FormError, $this->Statusbit->errorMessage());
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->Username->Required) {
			if (!$this->Username->IsDetailKey && $this->Username->FormValue != NULL && $this->Username->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Username->caption(), $this->Username->RequiredErrorMessage));
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

		// Genericname
		$this->Genericname->setDbValueDef($rsnew, $this->Genericname->CurrentValue, NULL, FALSE);

		// Catid
		$this->Catid->setDbValueDef($rsnew, $this->Catid->CurrentValue, NULL, FALSE);

		// Interactions
		$this->Interactions->setDbValueDef($rsnew, $this->Interactions->CurrentValue, NULL, FALSE);

		// Intid
		$this->Intid->setDbValueDef($rsnew, $this->Intid->CurrentValue, NULL, FALSE);

		// Createddt
		$this->Createddt->setDbValueDef($rsnew, UnFormatDateTime($this->Createddt->CurrentValue, 0), NULL, FALSE);

		// Createdtm
		$this->Createdtm->setDbValueDef($rsnew, $this->Createdtm->CurrentValue, NULL, FALSE);

		// Statusbit
		$this->Statusbit->setDbValueDef($rsnew, $this->Statusbit->CurrentValue, NULL, FALSE);

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// Username
		$this->Username->setDbValueDef($rsnew, $this->Username->CurrentValue, NULL, FALSE);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pres_genericinteractionslist.php"), "", $this->TableVar, TRUE);
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
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pres_trade_combination_names_edit extends pres_trade_combination_names
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_trade_combination_names';

	// Page object name
	public $PageObjName = "pres_trade_combination_names_edit";

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

		// Table object (pres_trade_combination_names)
		if (!isset($GLOBALS["pres_trade_combination_names"]) || get_class($GLOBALS["pres_trade_combination_names"]) == PROJECT_NAMESPACE . "pres_trade_combination_names") {
			$GLOBALS["pres_trade_combination_names"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_trade_combination_names"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_trade_combination_names');

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
		global $pres_trade_combination_names;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pres_trade_combination_names);
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
					if ($pageName == "pres_trade_combination_namesview.php")
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
					$this->terminate(GetUrl("pres_trade_combination_nameslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->tradenames_id->setVisibility();
		$this->GENERIC_NAMES->setVisibility();
		$this->TRADE_NAME->setVisibility();
		$this->Drug_Name->setVisibility();
		$this->PR_CODE->setVisibility();
		$this->GenericNames_symbols->setVisibility();
		$this->CONTAINER_TYPE->setVisibility();
		$this->STRENGTH->setVisibility();
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
			$this->terminate("pres_trade_combination_nameslist.php");
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
					$this->terminate("pres_trade_combination_nameslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pres_trade_combination_nameslist.php")
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

		// Check field name 'tradenames_id' first before field var 'x_tradenames_id'
		$val = $CurrentForm->hasValue("tradenames_id") ? $CurrentForm->getValue("tradenames_id") : $CurrentForm->getValue("x_tradenames_id");
		if (!$this->tradenames_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->tradenames_id->Visible = FALSE; // Disable update for API request
			else
				$this->tradenames_id->setFormValue($val);
		}

		// Check field name 'GENERIC_NAMES' first before field var 'x_GENERIC_NAMES'
		$val = $CurrentForm->hasValue("GENERIC_NAMES") ? $CurrentForm->getValue("GENERIC_NAMES") : $CurrentForm->getValue("x_GENERIC_NAMES");
		if (!$this->GENERIC_NAMES->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GENERIC_NAMES->Visible = FALSE; // Disable update for API request
			else
				$this->GENERIC_NAMES->setFormValue($val);
		}

		// Check field name 'TRADE_NAME' first before field var 'x_TRADE_NAME'
		$val = $CurrentForm->hasValue("TRADE_NAME") ? $CurrentForm->getValue("TRADE_NAME") : $CurrentForm->getValue("x_TRADE_NAME");
		if (!$this->TRADE_NAME->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TRADE_NAME->Visible = FALSE; // Disable update for API request
			else
				$this->TRADE_NAME->setFormValue($val);
		}

		// Check field name 'Drug_Name' first before field var 'x_Drug_Name'
		$val = $CurrentForm->hasValue("Drug_Name") ? $CurrentForm->getValue("Drug_Name") : $CurrentForm->getValue("x_Drug_Name");
		if (!$this->Drug_Name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Drug_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Drug_Name->setFormValue($val);
		}

		// Check field name 'PR_CODE' first before field var 'x_PR_CODE'
		$val = $CurrentForm->hasValue("PR_CODE") ? $CurrentForm->getValue("PR_CODE") : $CurrentForm->getValue("x_PR_CODE");
		if (!$this->PR_CODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PR_CODE->Visible = FALSE; // Disable update for API request
			else
				$this->PR_CODE->setFormValue($val);
		}

		// Check field name 'GenericNames_symbols' first before field var 'x_GenericNames_symbols'
		$val = $CurrentForm->hasValue("GenericNames_symbols") ? $CurrentForm->getValue("GenericNames_symbols") : $CurrentForm->getValue("x_GenericNames_symbols");
		if (!$this->GenericNames_symbols->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GenericNames_symbols->Visible = FALSE; // Disable update for API request
			else
				$this->GenericNames_symbols->setFormValue($val);
		}

		// Check field name 'CONTAINER_TYPE' first before field var 'x_CONTAINER_TYPE'
		$val = $CurrentForm->hasValue("CONTAINER_TYPE") ? $CurrentForm->getValue("CONTAINER_TYPE") : $CurrentForm->getValue("x_CONTAINER_TYPE");
		if (!$this->CONTAINER_TYPE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CONTAINER_TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->CONTAINER_TYPE->setFormValue($val);
		}

		// Check field name 'STRENGTH' first before field var 'x_STRENGTH'
		$val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
		if (!$this->STRENGTH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->STRENGTH->Visible = FALSE; // Disable update for API request
			else
				$this->STRENGTH->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->tradenames_id->CurrentValue = $this->tradenames_id->FormValue;
		$this->GENERIC_NAMES->CurrentValue = $this->GENERIC_NAMES->FormValue;
		$this->TRADE_NAME->CurrentValue = $this->TRADE_NAME->FormValue;
		$this->Drug_Name->CurrentValue = $this->Drug_Name->FormValue;
		$this->PR_CODE->CurrentValue = $this->PR_CODE->FormValue;
		$this->GenericNames_symbols->CurrentValue = $this->GenericNames_symbols->FormValue;
		$this->CONTAINER_TYPE->CurrentValue = $this->CONTAINER_TYPE->FormValue;
		$this->STRENGTH->CurrentValue = $this->STRENGTH->FormValue;
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
		$this->tradenames_id->setDbValue($row['tradenames_id']);
		$this->GENERIC_NAMES->setDbValue($row['GENERIC_NAMES']);
		$this->TRADE_NAME->setDbValue($row['TRADE_NAME']);
		$this->Drug_Name->setDbValue($row['Drug_Name']);
		$this->PR_CODE->setDbValue($row['PR_CODE']);
		$this->GenericNames_symbols->setDbValue($row['GenericNames_symbols']);
		$this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
		$this->STRENGTH->setDbValue($row['STRENGTH']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['tradenames_id'] = NULL;
		$row['GENERIC_NAMES'] = NULL;
		$row['TRADE_NAME'] = NULL;
		$row['Drug_Name'] = NULL;
		$row['PR_CODE'] = NULL;
		$row['GenericNames_symbols'] = NULL;
		$row['CONTAINER_TYPE'] = NULL;
		$row['STRENGTH'] = NULL;
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
		// tradenames_id
		// GENERIC_NAMES
		// TRADE_NAME
		// Drug_Name
		// PR_CODE
		// GenericNames_symbols
		// CONTAINER_TYPE
		// STRENGTH

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// tradenames_id
			$this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
			$this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
			$this->tradenames_id->ViewCustomAttributes = "";

			// GENERIC_NAMES
			$this->GENERIC_NAMES->ViewValue = $this->GENERIC_NAMES->CurrentValue;
			$this->GENERIC_NAMES->ViewCustomAttributes = "";

			// TRADE_NAME
			$this->TRADE_NAME->ViewValue = $this->TRADE_NAME->CurrentValue;
			$this->TRADE_NAME->ViewCustomAttributes = "";

			// Drug_Name
			$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
			$this->Drug_Name->ViewCustomAttributes = "";

			// PR_CODE
			$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
			$this->PR_CODE->ViewCustomAttributes = "";

			// GenericNames_symbols
			$this->GenericNames_symbols->ViewValue = $this->GenericNames_symbols->CurrentValue;
			$this->GenericNames_symbols->ViewCustomAttributes = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
			$this->CONTAINER_TYPE->ViewCustomAttributes = "";

			// STRENGTH
			$this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
			$this->STRENGTH->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// tradenames_id
			$this->tradenames_id->LinkCustomAttributes = "";
			$this->tradenames_id->HrefValue = "";
			$this->tradenames_id->TooltipValue = "";

			// GENERIC_NAMES
			$this->GENERIC_NAMES->LinkCustomAttributes = "";
			$this->GENERIC_NAMES->HrefValue = "";
			$this->GENERIC_NAMES->TooltipValue = "";

			// TRADE_NAME
			$this->TRADE_NAME->LinkCustomAttributes = "";
			$this->TRADE_NAME->HrefValue = "";
			$this->TRADE_NAME->TooltipValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";
			$this->Drug_Name->TooltipValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";
			$this->PR_CODE->TooltipValue = "";

			// GenericNames_symbols
			$this->GenericNames_symbols->LinkCustomAttributes = "";
			$this->GenericNames_symbols->HrefValue = "";
			$this->GenericNames_symbols->TooltipValue = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->LinkCustomAttributes = "";
			$this->CONTAINER_TYPE->HrefValue = "";
			$this->CONTAINER_TYPE->TooltipValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";
			$this->STRENGTH->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// tradenames_id
			$this->tradenames_id->EditAttrs["class"] = "form-control";
			$this->tradenames_id->EditCustomAttributes = "";
			$this->tradenames_id->EditValue = HtmlEncode($this->tradenames_id->CurrentValue);
			$this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());

			// GENERIC_NAMES
			$this->GENERIC_NAMES->EditAttrs["class"] = "form-control";
			$this->GENERIC_NAMES->EditCustomAttributes = "";
			$this->GENERIC_NAMES->EditValue = HtmlEncode($this->GENERIC_NAMES->CurrentValue);
			$this->GENERIC_NAMES->PlaceHolder = RemoveHtml($this->GENERIC_NAMES->caption());

			// TRADE_NAME
			$this->TRADE_NAME->EditAttrs["class"] = "form-control";
			$this->TRADE_NAME->EditCustomAttributes = "";
			$this->TRADE_NAME->EditValue = HtmlEncode($this->TRADE_NAME->CurrentValue);
			$this->TRADE_NAME->PlaceHolder = RemoveHtml($this->TRADE_NAME->caption());

			// Drug_Name
			$this->Drug_Name->EditAttrs["class"] = "form-control";
			$this->Drug_Name->EditCustomAttributes = "";
			$this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->CurrentValue);
			$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

			// PR_CODE
			$this->PR_CODE->EditAttrs["class"] = "form-control";
			$this->PR_CODE->EditCustomAttributes = "";
			if (!$this->PR_CODE->Raw)
				$this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
			$this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->CurrentValue);
			$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

			// GenericNames_symbols
			$this->GenericNames_symbols->EditAttrs["class"] = "form-control";
			$this->GenericNames_symbols->EditCustomAttributes = "";
			$this->GenericNames_symbols->EditValue = HtmlEncode($this->GenericNames_symbols->CurrentValue);
			$this->GenericNames_symbols->PlaceHolder = RemoveHtml($this->GenericNames_symbols->caption());

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
			$this->CONTAINER_TYPE->EditCustomAttributes = "";
			if (!$this->CONTAINER_TYPE->Raw)
				$this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
			$this->CONTAINER_TYPE->EditValue = HtmlEncode($this->CONTAINER_TYPE->CurrentValue);
			$this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			if (!$this->STRENGTH->Raw)
				$this->STRENGTH->CurrentValue = HtmlDecode($this->STRENGTH->CurrentValue);
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->CurrentValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// tradenames_id
			$this->tradenames_id->LinkCustomAttributes = "";
			$this->tradenames_id->HrefValue = "";

			// GENERIC_NAMES
			$this->GENERIC_NAMES->LinkCustomAttributes = "";
			$this->GENERIC_NAMES->HrefValue = "";

			// TRADE_NAME
			$this->TRADE_NAME->LinkCustomAttributes = "";
			$this->TRADE_NAME->HrefValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";

			// GenericNames_symbols
			$this->GenericNames_symbols->LinkCustomAttributes = "";
			$this->GenericNames_symbols->HrefValue = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->LinkCustomAttributes = "";
			$this->CONTAINER_TYPE->HrefValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";
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
		if ($this->tradenames_id->Required) {
			if (!$this->tradenames_id->IsDetailKey && $this->tradenames_id->FormValue != NULL && $this->tradenames_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tradenames_id->caption(), $this->tradenames_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tradenames_id->FormValue)) {
			AddMessage($FormError, $this->tradenames_id->errorMessage());
		}
		if ($this->GENERIC_NAMES->Required) {
			if (!$this->GENERIC_NAMES->IsDetailKey && $this->GENERIC_NAMES->FormValue != NULL && $this->GENERIC_NAMES->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENERIC_NAMES->caption(), $this->GENERIC_NAMES->RequiredErrorMessage));
			}
		}
		if ($this->TRADE_NAME->Required) {
			if (!$this->TRADE_NAME->IsDetailKey && $this->TRADE_NAME->FormValue != NULL && $this->TRADE_NAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TRADE_NAME->caption(), $this->TRADE_NAME->RequiredErrorMessage));
			}
		}
		if ($this->Drug_Name->Required) {
			if (!$this->Drug_Name->IsDetailKey && $this->Drug_Name->FormValue != NULL && $this->Drug_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Drug_Name->caption(), $this->Drug_Name->RequiredErrorMessage));
			}
		}
		if ($this->PR_CODE->Required) {
			if (!$this->PR_CODE->IsDetailKey && $this->PR_CODE->FormValue != NULL && $this->PR_CODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR_CODE->caption(), $this->PR_CODE->RequiredErrorMessage));
			}
		}
		if ($this->GenericNames_symbols->Required) {
			if (!$this->GenericNames_symbols->IsDetailKey && $this->GenericNames_symbols->FormValue != NULL && $this->GenericNames_symbols->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GenericNames_symbols->caption(), $this->GenericNames_symbols->RequiredErrorMessage));
			}
		}
		if ($this->CONTAINER_TYPE->Required) {
			if (!$this->CONTAINER_TYPE->IsDetailKey && $this->CONTAINER_TYPE->FormValue != NULL && $this->CONTAINER_TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CONTAINER_TYPE->caption(), $this->CONTAINER_TYPE->RequiredErrorMessage));
			}
		}
		if ($this->STRENGTH->Required) {
			if (!$this->STRENGTH->IsDetailKey && $this->STRENGTH->FormValue != NULL && $this->STRENGTH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STRENGTH->caption(), $this->STRENGTH->RequiredErrorMessage));
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

			// tradenames_id
			$this->tradenames_id->setDbValueDef($rsnew, $this->tradenames_id->CurrentValue, 0, $this->tradenames_id->ReadOnly);

			// GENERIC_NAMES
			$this->GENERIC_NAMES->setDbValueDef($rsnew, $this->GENERIC_NAMES->CurrentValue, NULL, $this->GENERIC_NAMES->ReadOnly);

			// TRADE_NAME
			$this->TRADE_NAME->setDbValueDef($rsnew, $this->TRADE_NAME->CurrentValue, NULL, $this->TRADE_NAME->ReadOnly);

			// Drug_Name
			$this->Drug_Name->setDbValueDef($rsnew, $this->Drug_Name->CurrentValue, NULL, $this->Drug_Name->ReadOnly);

			// PR_CODE
			$this->PR_CODE->setDbValueDef($rsnew, $this->PR_CODE->CurrentValue, NULL, $this->PR_CODE->ReadOnly);

			// GenericNames_symbols
			$this->GenericNames_symbols->setDbValueDef($rsnew, $this->GenericNames_symbols->CurrentValue, NULL, $this->GenericNames_symbols->ReadOnly);

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->setDbValueDef($rsnew, $this->CONTAINER_TYPE->CurrentValue, NULL, $this->CONTAINER_TYPE->ReadOnly);

			// STRENGTH
			$this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, NULL, $this->STRENGTH->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pres_trade_combination_nameslist.php"), "", $this->TableVar, TRUE);
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
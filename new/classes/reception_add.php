<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class reception_add extends reception
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'reception';

	// Page object name
	public $PageObjName = "reception_add";

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

		// Table object (reception)
		if (!isset($GLOBALS["reception"]) || get_class($GLOBALS["reception"]) == PROJECT_NAMESPACE . "reception") {
			$GLOBALS["reception"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["reception"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'reception');

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
		global $reception;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($reception);
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
					if ($pageName == "receptionview.php")
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
					$this->terminate(GetUrl("receptionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->PatientID->setVisibility();
		$this->PatientName->setVisibility();
		$this->OorN->setVisibility();
		$this->PRIMARY_CONSULTANT->setVisibility();
		$this->CATEGORY->setVisibility();
		$this->PROCEDURE->setVisibility();
		$this->Amount->setVisibility();
		$this->MODE_OF_PAYMENT->setVisibility();
		$this->NEXT_REVIEW_DATE->setVisibility();
		$this->REMARKS->setVisibility();
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
		$this->setupLookupOptions($this->CATEGORY);
		$this->setupLookupOptions($this->PROCEDURE);
		$this->setupLookupOptions($this->MODE_OF_PAYMENT);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("receptionlist.php");
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
					$this->terminate("receptionlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "receptionlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "receptionview.php")
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
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->OorN->CurrentValue = NULL;
		$this->OorN->OldValue = $this->OorN->CurrentValue;
		$this->PRIMARY_CONSULTANT->CurrentValue = NULL;
		$this->PRIMARY_CONSULTANT->OldValue = $this->PRIMARY_CONSULTANT->CurrentValue;
		$this->CATEGORY->CurrentValue = NULL;
		$this->CATEGORY->OldValue = $this->CATEGORY->CurrentValue;
		$this->PROCEDURE->CurrentValue = NULL;
		$this->PROCEDURE->OldValue = $this->PROCEDURE->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->MODE_OF_PAYMENT->CurrentValue = NULL;
		$this->MODE_OF_PAYMENT->OldValue = $this->MODE_OF_PAYMENT->CurrentValue;
		$this->NEXT_REVIEW_DATE->CurrentValue = NULL;
		$this->NEXT_REVIEW_DATE->OldValue = $this->NEXT_REVIEW_DATE->CurrentValue;
		$this->REMARKS->CurrentValue = NULL;
		$this->REMARKS->OldValue = $this->REMARKS->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'OorN' first before field var 'x_OorN'
		$val = $CurrentForm->hasValue("OorN") ? $CurrentForm->getValue("OorN") : $CurrentForm->getValue("x_OorN");
		if (!$this->OorN->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OorN->Visible = FALSE; // Disable update for API request
			else
				$this->OorN->setFormValue($val);
		}

		// Check field name 'PRIMARY_CONSULTANT' first before field var 'x_PRIMARY_CONSULTANT'
		$val = $CurrentForm->hasValue("PRIMARY_CONSULTANT") ? $CurrentForm->getValue("PRIMARY_CONSULTANT") : $CurrentForm->getValue("x_PRIMARY_CONSULTANT");
		if (!$this->PRIMARY_CONSULTANT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRIMARY_CONSULTANT->Visible = FALSE; // Disable update for API request
			else
				$this->PRIMARY_CONSULTANT->setFormValue($val);
		}

		// Check field name 'CATEGORY' first before field var 'x_CATEGORY'
		$val = $CurrentForm->hasValue("CATEGORY") ? $CurrentForm->getValue("CATEGORY") : $CurrentForm->getValue("x_CATEGORY");
		if (!$this->CATEGORY->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CATEGORY->Visible = FALSE; // Disable update for API request
			else
				$this->CATEGORY->setFormValue($val);
		}

		// Check field name 'PROCEDURE' first before field var 'x_PROCEDURE'
		$val = $CurrentForm->hasValue("PROCEDURE") ? $CurrentForm->getValue("PROCEDURE") : $CurrentForm->getValue("x_PROCEDURE");
		if (!$this->PROCEDURE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PROCEDURE->Visible = FALSE; // Disable update for API request
			else
				$this->PROCEDURE->setFormValue($val);
		}

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}

		// Check field name 'MODE OF PAYMENT' first before field var 'x_MODE_OF_PAYMENT'
		$val = $CurrentForm->hasValue("MODE OF PAYMENT") ? $CurrentForm->getValue("MODE OF PAYMENT") : $CurrentForm->getValue("x_MODE_OF_PAYMENT");
		if (!$this->MODE_OF_PAYMENT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MODE_OF_PAYMENT->Visible = FALSE; // Disable update for API request
			else
				$this->MODE_OF_PAYMENT->setFormValue($val);
		}

		// Check field name 'NEXT REVIEW DATE' first before field var 'x_NEXT_REVIEW_DATE'
		$val = $CurrentForm->hasValue("NEXT REVIEW DATE") ? $CurrentForm->getValue("NEXT REVIEW DATE") : $CurrentForm->getValue("x_NEXT_REVIEW_DATE");
		if (!$this->NEXT_REVIEW_DATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NEXT_REVIEW_DATE->Visible = FALSE; // Disable update for API request
			else
				$this->NEXT_REVIEW_DATE->setFormValue($val);
			$this->NEXT_REVIEW_DATE->CurrentValue = UnFormatDateTime($this->NEXT_REVIEW_DATE->CurrentValue, 0);
		}

		// Check field name 'REMARKS' first before field var 'x_REMARKS'
		$val = $CurrentForm->hasValue("REMARKS") ? $CurrentForm->getValue("REMARKS") : $CurrentForm->getValue("x_REMARKS");
		if (!$this->REMARKS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->REMARKS->Visible = FALSE; // Disable update for API request
			else
				$this->REMARKS->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->OorN->CurrentValue = $this->OorN->FormValue;
		$this->PRIMARY_CONSULTANT->CurrentValue = $this->PRIMARY_CONSULTANT->FormValue;
		$this->CATEGORY->CurrentValue = $this->CATEGORY->FormValue;
		$this->PROCEDURE->CurrentValue = $this->PROCEDURE->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->MODE_OF_PAYMENT->CurrentValue = $this->MODE_OF_PAYMENT->FormValue;
		$this->NEXT_REVIEW_DATE->CurrentValue = $this->NEXT_REVIEW_DATE->FormValue;
		$this->NEXT_REVIEW_DATE->CurrentValue = UnFormatDateTime($this->NEXT_REVIEW_DATE->CurrentValue, 0);
		$this->REMARKS->CurrentValue = $this->REMARKS->FormValue;
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
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->OorN->setDbValue($row['OorN']);
		$this->PRIMARY_CONSULTANT->setDbValue($row['PRIMARY_CONSULTANT']);
		$this->CATEGORY->setDbValue($row['CATEGORY']);
		$this->PROCEDURE->setDbValue($row['PROCEDURE']);
		$this->Amount->setDbValue($row['Amount']);
		$this->MODE_OF_PAYMENT->setDbValue($row['MODE OF PAYMENT']);
		$this->NEXT_REVIEW_DATE->setDbValue($row['NEXT REVIEW DATE']);
		$this->REMARKS->setDbValue($row['REMARKS']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['OorN'] = $this->OorN->CurrentValue;
		$row['PRIMARY_CONSULTANT'] = $this->PRIMARY_CONSULTANT->CurrentValue;
		$row['CATEGORY'] = $this->CATEGORY->CurrentValue;
		$row['PROCEDURE'] = $this->PROCEDURE->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['MODE OF PAYMENT'] = $this->MODE_OF_PAYMENT->CurrentValue;
		$row['NEXT REVIEW DATE'] = $this->NEXT_REVIEW_DATE->CurrentValue;
		$row['REMARKS'] = $this->REMARKS->CurrentValue;
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
		// PatientID
		// PatientName
		// OorN
		// PRIMARY_CONSULTANT
		// CATEGORY
		// PROCEDURE
		// Amount
		// MODE OF PAYMENT
		// NEXT REVIEW DATE
		// REMARKS

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// OorN
			$this->OorN->ViewValue = $this->OorN->CurrentValue;
			$this->OorN->ViewCustomAttributes = "";

			// PRIMARY_CONSULTANT
			$this->PRIMARY_CONSULTANT->ViewValue = $this->PRIMARY_CONSULTANT->CurrentValue;
			$this->PRIMARY_CONSULTANT->ViewCustomAttributes = "";

			// CATEGORY
			$curVal = strval($this->CATEGORY->CurrentValue);
			if ($curVal != "") {
				$this->CATEGORY->ViewValue = $this->CATEGORY->lookupCacheOption($curVal);
				if ($this->CATEGORY->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CATEGORY`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->CATEGORY->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->CATEGORY->ViewValue = $this->CATEGORY->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CATEGORY->ViewValue = $this->CATEGORY->CurrentValue;
					}
				}
			} else {
				$this->CATEGORY->ViewValue = NULL;
			}
			$this->CATEGORY->ViewCustomAttributes = "";

			// PROCEDURE
			$curVal = strval($this->PROCEDURE->CurrentValue);
			if ($curVal != "") {
				$this->PROCEDURE->ViewValue = $this->PROCEDURE->lookupCacheOption($curVal);
				if ($this->PROCEDURE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PROCEDURE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PROCEDURE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PROCEDURE->ViewValue = $this->PROCEDURE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
					}
				}
			} else {
				$this->PROCEDURE->ViewValue = NULL;
			}
			$this->PROCEDURE->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewCustomAttributes = "";

			// MODE OF PAYMENT
			$curVal = strval($this->MODE_OF_PAYMENT->CurrentValue);
			if ($curVal != "") {
				$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->lookupCacheOption($curVal);
				if ($this->MODE_OF_PAYMENT->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MODE_OF_PAYMENT->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->CurrentValue;
					}
				}
			} else {
				$this->MODE_OF_PAYMENT->ViewValue = NULL;
			}
			$this->MODE_OF_PAYMENT->ViewCustomAttributes = "";

			// NEXT REVIEW DATE
			$this->NEXT_REVIEW_DATE->ViewValue = $this->NEXT_REVIEW_DATE->CurrentValue;
			$this->NEXT_REVIEW_DATE->ViewValue = FormatDateTime($this->NEXT_REVIEW_DATE->ViewValue, 0);
			$this->NEXT_REVIEW_DATE->ViewCustomAttributes = "";

			// REMARKS
			$this->REMARKS->ViewValue = $this->REMARKS->CurrentValue;
			$this->REMARKS->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// OorN
			$this->OorN->LinkCustomAttributes = "";
			$this->OorN->HrefValue = "";
			$this->OorN->TooltipValue = "";

			// PRIMARY_CONSULTANT
			$this->PRIMARY_CONSULTANT->LinkCustomAttributes = "";
			$this->PRIMARY_CONSULTANT->HrefValue = "";
			$this->PRIMARY_CONSULTANT->TooltipValue = "";

			// CATEGORY
			$this->CATEGORY->LinkCustomAttributes = "";
			$this->CATEGORY->HrefValue = "";
			$this->CATEGORY->TooltipValue = "";

			// PROCEDURE
			$this->PROCEDURE->LinkCustomAttributes = "";
			$this->PROCEDURE->HrefValue = "";
			$this->PROCEDURE->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// MODE OF PAYMENT
			$this->MODE_OF_PAYMENT->LinkCustomAttributes = "";
			$this->MODE_OF_PAYMENT->HrefValue = "";
			$this->MODE_OF_PAYMENT->TooltipValue = "";

			// NEXT REVIEW DATE
			$this->NEXT_REVIEW_DATE->LinkCustomAttributes = "";
			$this->NEXT_REVIEW_DATE->HrefValue = "";
			$this->NEXT_REVIEW_DATE->TooltipValue = "";

			// REMARKS
			$this->REMARKS->LinkCustomAttributes = "";
			$this->REMARKS->HrefValue = "";
			$this->REMARKS->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// OorN
			$this->OorN->EditAttrs["class"] = "form-control";
			$this->OorN->EditCustomAttributes = "";
			if (!$this->OorN->Raw)
				$this->OorN->CurrentValue = HtmlDecode($this->OorN->CurrentValue);
			$this->OorN->EditValue = HtmlEncode($this->OorN->CurrentValue);
			$this->OorN->PlaceHolder = RemoveHtml($this->OorN->caption());

			// PRIMARY_CONSULTANT
			$this->PRIMARY_CONSULTANT->EditAttrs["class"] = "form-control";
			$this->PRIMARY_CONSULTANT->EditCustomAttributes = "";
			if (!$this->PRIMARY_CONSULTANT->Raw)
				$this->PRIMARY_CONSULTANT->CurrentValue = HtmlDecode($this->PRIMARY_CONSULTANT->CurrentValue);
			$this->PRIMARY_CONSULTANT->EditValue = HtmlEncode($this->PRIMARY_CONSULTANT->CurrentValue);
			$this->PRIMARY_CONSULTANT->PlaceHolder = RemoveHtml($this->PRIMARY_CONSULTANT->caption());

			// CATEGORY
			$this->CATEGORY->EditAttrs["class"] = "form-control";
			$this->CATEGORY->EditCustomAttributes = "";
			$curVal = trim(strval($this->CATEGORY->CurrentValue));
			if ($curVal != "")
				$this->CATEGORY->ViewValue = $this->CATEGORY->lookupCacheOption($curVal);
			else
				$this->CATEGORY->ViewValue = $this->CATEGORY->Lookup !== NULL && is_array($this->CATEGORY->Lookup->Options) ? $curVal : NULL;
			if ($this->CATEGORY->ViewValue !== NULL) { // Load from cache
				$this->CATEGORY->EditValue = array_values($this->CATEGORY->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CATEGORY`" . SearchString("=", $this->CATEGORY->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->CATEGORY->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->CATEGORY->EditValue = $arwrk;
			}

			// PROCEDURE
			$this->PROCEDURE->EditAttrs["class"] = "form-control";
			$this->PROCEDURE->EditCustomAttributes = "";
			$curVal = trim(strval($this->PROCEDURE->CurrentValue));
			if ($curVal != "")
				$this->PROCEDURE->ViewValue = $this->PROCEDURE->lookupCacheOption($curVal);
			else
				$this->PROCEDURE->ViewValue = $this->PROCEDURE->Lookup !== NULL && is_array($this->PROCEDURE->Lookup->Options) ? $curVal : NULL;
			if ($this->PROCEDURE->ViewValue !== NULL) { // Load from cache
				$this->PROCEDURE->EditValue = array_values($this->PROCEDURE->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PROCEDURE`" . SearchString("=", $this->PROCEDURE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PROCEDURE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PROCEDURE->EditValue = $arwrk;
			}

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			if (!$this->Amount->Raw)
				$this->Amount->CurrentValue = HtmlDecode($this->Amount->CurrentValue);
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// MODE OF PAYMENT
			$this->MODE_OF_PAYMENT->EditAttrs["class"] = "form-control";
			$this->MODE_OF_PAYMENT->EditCustomAttributes = "";
			$curVal = trim(strval($this->MODE_OF_PAYMENT->CurrentValue));
			if ($curVal != "")
				$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->lookupCacheOption($curVal);
			else
				$this->MODE_OF_PAYMENT->ViewValue = $this->MODE_OF_PAYMENT->Lookup !== NULL && is_array($this->MODE_OF_PAYMENT->Lookup->Options) ? $curVal : NULL;
			if ($this->MODE_OF_PAYMENT->ViewValue !== NULL) { // Load from cache
				$this->MODE_OF_PAYMENT->EditValue = array_values($this->MODE_OF_PAYMENT->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->MODE_OF_PAYMENT->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MODE_OF_PAYMENT->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->MODE_OF_PAYMENT->EditValue = $arwrk;
			}

			// NEXT REVIEW DATE
			$this->NEXT_REVIEW_DATE->EditAttrs["class"] = "form-control";
			$this->NEXT_REVIEW_DATE->EditCustomAttributes = "";
			$this->NEXT_REVIEW_DATE->EditValue = HtmlEncode(FormatDateTime($this->NEXT_REVIEW_DATE->CurrentValue, 8));
			$this->NEXT_REVIEW_DATE->PlaceHolder = RemoveHtml($this->NEXT_REVIEW_DATE->caption());

			// REMARKS
			$this->REMARKS->EditAttrs["class"] = "form-control";
			$this->REMARKS->EditCustomAttributes = "";
			if (!$this->REMARKS->Raw)
				$this->REMARKS->CurrentValue = HtmlDecode($this->REMARKS->CurrentValue);
			$this->REMARKS->EditValue = HtmlEncode($this->REMARKS->CurrentValue);
			$this->REMARKS->PlaceHolder = RemoveHtml($this->REMARKS->caption());

			// Add refer script
			// PatientID

			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// OorN
			$this->OorN->LinkCustomAttributes = "";
			$this->OorN->HrefValue = "";

			// PRIMARY_CONSULTANT
			$this->PRIMARY_CONSULTANT->LinkCustomAttributes = "";
			$this->PRIMARY_CONSULTANT->HrefValue = "";

			// CATEGORY
			$this->CATEGORY->LinkCustomAttributes = "";
			$this->CATEGORY->HrefValue = "";

			// PROCEDURE
			$this->PROCEDURE->LinkCustomAttributes = "";
			$this->PROCEDURE->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// MODE OF PAYMENT
			$this->MODE_OF_PAYMENT->LinkCustomAttributes = "";
			$this->MODE_OF_PAYMENT->HrefValue = "";

			// NEXT REVIEW DATE
			$this->NEXT_REVIEW_DATE->LinkCustomAttributes = "";
			$this->NEXT_REVIEW_DATE->HrefValue = "";

			// REMARKS
			$this->REMARKS->LinkCustomAttributes = "";
			$this->REMARKS->HrefValue = "";
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
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->OorN->Required) {
			if (!$this->OorN->IsDetailKey && $this->OorN->FormValue != NULL && $this->OorN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OorN->caption(), $this->OorN->RequiredErrorMessage));
			}
		}
		if ($this->PRIMARY_CONSULTANT->Required) {
			if (!$this->PRIMARY_CONSULTANT->IsDetailKey && $this->PRIMARY_CONSULTANT->FormValue != NULL && $this->PRIMARY_CONSULTANT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRIMARY_CONSULTANT->caption(), $this->PRIMARY_CONSULTANT->RequiredErrorMessage));
			}
		}
		if ($this->CATEGORY->Required) {
			if (!$this->CATEGORY->IsDetailKey && $this->CATEGORY->FormValue != NULL && $this->CATEGORY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CATEGORY->caption(), $this->CATEGORY->RequiredErrorMessage));
			}
		}
		if ($this->PROCEDURE->Required) {
			if (!$this->PROCEDURE->IsDetailKey && $this->PROCEDURE->FormValue != NULL && $this->PROCEDURE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PROCEDURE->caption(), $this->PROCEDURE->RequiredErrorMessage));
			}
		}
		if ($this->Amount->Required) {
			if (!$this->Amount->IsDetailKey && $this->Amount->FormValue != NULL && $this->Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
			}
		}
		if ($this->MODE_OF_PAYMENT->Required) {
			if (!$this->MODE_OF_PAYMENT->IsDetailKey && $this->MODE_OF_PAYMENT->FormValue != NULL && $this->MODE_OF_PAYMENT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MODE_OF_PAYMENT->caption(), $this->MODE_OF_PAYMENT->RequiredErrorMessage));
			}
		}
		if ($this->NEXT_REVIEW_DATE->Required) {
			if (!$this->NEXT_REVIEW_DATE->IsDetailKey && $this->NEXT_REVIEW_DATE->FormValue != NULL && $this->NEXT_REVIEW_DATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEXT_REVIEW_DATE->caption(), $this->NEXT_REVIEW_DATE->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->NEXT_REVIEW_DATE->FormValue)) {
			AddMessage($FormError, $this->NEXT_REVIEW_DATE->errorMessage());
		}
		if ($this->REMARKS->Required) {
			if (!$this->REMARKS->IsDetailKey && $this->REMARKS->FormValue != NULL && $this->REMARKS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REMARKS->caption(), $this->REMARKS->RequiredErrorMessage));
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

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// OorN
		$this->OorN->setDbValueDef($rsnew, $this->OorN->CurrentValue, NULL, FALSE);

		// PRIMARY_CONSULTANT
		$this->PRIMARY_CONSULTANT->setDbValueDef($rsnew, $this->PRIMARY_CONSULTANT->CurrentValue, NULL, FALSE);

		// CATEGORY
		$this->CATEGORY->setDbValueDef($rsnew, $this->CATEGORY->CurrentValue, NULL, FALSE);

		// PROCEDURE
		$this->PROCEDURE->setDbValueDef($rsnew, $this->PROCEDURE->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// MODE OF PAYMENT
		$this->MODE_OF_PAYMENT->setDbValueDef($rsnew, $this->MODE_OF_PAYMENT->CurrentValue, NULL, FALSE);

		// NEXT REVIEW DATE
		$this->NEXT_REVIEW_DATE->setDbValueDef($rsnew, UnFormatDateTime($this->NEXT_REVIEW_DATE->CurrentValue, 0), NULL, FALSE);

		// REMARKS
		$this->REMARKS->setDbValueDef($rsnew, $this->REMARKS->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("receptionlist.php"), "", $this->TableVar, TRUE);
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
				case "x_CATEGORY":
					break;
				case "x_PROCEDURE":
					break;
				case "x_MODE_OF_PAYMENT":
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
						case "x_CATEGORY":
							break;
						case "x_PROCEDURE":
							break;
						case "x_MODE_OF_PAYMENT":
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
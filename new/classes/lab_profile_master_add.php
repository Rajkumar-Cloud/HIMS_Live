<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class lab_profile_master_add extends lab_profile_master
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_profile_master';

	// Page object name
	public $PageObjName = "lab_profile_master_add";

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

		// Table object (lab_profile_master)
		if (!isset($GLOBALS["lab_profile_master"]) || get_class($GLOBALS["lab_profile_master"]) == PROJECT_NAMESPACE . "lab_profile_master") {
			$GLOBALS["lab_profile_master"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_profile_master"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_profile_master');

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
		global $lab_profile_master;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($lab_profile_master);
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
					if ($pageName == "lab_profile_masterview.php")
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
					$this->terminate(GetUrl("lab_profile_masterlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->ProfileCode->setVisibility();
		$this->ProfileName->setVisibility();
		$this->ProfileAmount->setVisibility();
		$this->ProfileSpecialAmount->setVisibility();
		$this->ProfileMasterInactive->setVisibility();
		$this->ReagentAmt->setVisibility();
		$this->LabAmt->setVisibility();
		$this->RefAmt->setVisibility();
		$this->MainDeptCD->setVisibility();
		$this->Individual->setVisibility();
		$this->ShortName->setVisibility();
		$this->Note->setVisibility();
		$this->PrevAmt->setVisibility();
		$this->BillName->setVisibility();
		$this->ActualAmt->setVisibility();
		$this->NoHeading->setVisibility();
		$this->EditDate->setVisibility();
		$this->EditUser->setVisibility();
		$this->HISCD->setVisibility();
		$this->PriceList->setVisibility();
		$this->IPAmt->setVisibility();
		$this->IInsAmt->setVisibility();
		$this->ManualCD->setVisibility();
		$this->Free->setVisibility();
		$this->IIpAmt->setVisibility();
		$this->InsAmt->setVisibility();
		$this->OutSource->setVisibility();
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
			$this->terminate("lab_profile_masterlist.php");
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
					$this->terminate("lab_profile_masterlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "lab_profile_masterlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "lab_profile_masterview.php")
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
		$this->ProfileCode->CurrentValue = NULL;
		$this->ProfileCode->OldValue = $this->ProfileCode->CurrentValue;
		$this->ProfileName->CurrentValue = NULL;
		$this->ProfileName->OldValue = $this->ProfileName->CurrentValue;
		$this->ProfileAmount->CurrentValue = NULL;
		$this->ProfileAmount->OldValue = $this->ProfileAmount->CurrentValue;
		$this->ProfileSpecialAmount->CurrentValue = NULL;
		$this->ProfileSpecialAmount->OldValue = $this->ProfileSpecialAmount->CurrentValue;
		$this->ProfileMasterInactive->CurrentValue = NULL;
		$this->ProfileMasterInactive->OldValue = $this->ProfileMasterInactive->CurrentValue;
		$this->ReagentAmt->CurrentValue = NULL;
		$this->ReagentAmt->OldValue = $this->ReagentAmt->CurrentValue;
		$this->LabAmt->CurrentValue = NULL;
		$this->LabAmt->OldValue = $this->LabAmt->CurrentValue;
		$this->RefAmt->CurrentValue = NULL;
		$this->RefAmt->OldValue = $this->RefAmt->CurrentValue;
		$this->MainDeptCD->CurrentValue = NULL;
		$this->MainDeptCD->OldValue = $this->MainDeptCD->CurrentValue;
		$this->Individual->CurrentValue = NULL;
		$this->Individual->OldValue = $this->Individual->CurrentValue;
		$this->ShortName->CurrentValue = NULL;
		$this->ShortName->OldValue = $this->ShortName->CurrentValue;
		$this->Note->CurrentValue = NULL;
		$this->Note->OldValue = $this->Note->CurrentValue;
		$this->PrevAmt->CurrentValue = NULL;
		$this->PrevAmt->OldValue = $this->PrevAmt->CurrentValue;
		$this->BillName->CurrentValue = NULL;
		$this->BillName->OldValue = $this->BillName->CurrentValue;
		$this->ActualAmt->CurrentValue = NULL;
		$this->ActualAmt->OldValue = $this->ActualAmt->CurrentValue;
		$this->NoHeading->CurrentValue = NULL;
		$this->NoHeading->OldValue = $this->NoHeading->CurrentValue;
		$this->EditDate->CurrentValue = NULL;
		$this->EditDate->OldValue = $this->EditDate->CurrentValue;
		$this->EditUser->CurrentValue = NULL;
		$this->EditUser->OldValue = $this->EditUser->CurrentValue;
		$this->HISCD->CurrentValue = NULL;
		$this->HISCD->OldValue = $this->HISCD->CurrentValue;
		$this->PriceList->CurrentValue = NULL;
		$this->PriceList->OldValue = $this->PriceList->CurrentValue;
		$this->IPAmt->CurrentValue = NULL;
		$this->IPAmt->OldValue = $this->IPAmt->CurrentValue;
		$this->IInsAmt->CurrentValue = NULL;
		$this->IInsAmt->OldValue = $this->IInsAmt->CurrentValue;
		$this->ManualCD->CurrentValue = NULL;
		$this->ManualCD->OldValue = $this->ManualCD->CurrentValue;
		$this->Free->CurrentValue = NULL;
		$this->Free->OldValue = $this->Free->CurrentValue;
		$this->IIpAmt->CurrentValue = NULL;
		$this->IIpAmt->OldValue = $this->IIpAmt->CurrentValue;
		$this->InsAmt->CurrentValue = NULL;
		$this->InsAmt->OldValue = $this->InsAmt->CurrentValue;
		$this->OutSource->CurrentValue = NULL;
		$this->OutSource->OldValue = $this->OutSource->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'ProfileCode' first before field var 'x_ProfileCode'
		$val = $CurrentForm->hasValue("ProfileCode") ? $CurrentForm->getValue("ProfileCode") : $CurrentForm->getValue("x_ProfileCode");
		if (!$this->ProfileCode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProfileCode->Visible = FALSE; // Disable update for API request
			else
				$this->ProfileCode->setFormValue($val);
		}

		// Check field name 'ProfileName' first before field var 'x_ProfileName'
		$val = $CurrentForm->hasValue("ProfileName") ? $CurrentForm->getValue("ProfileName") : $CurrentForm->getValue("x_ProfileName");
		if (!$this->ProfileName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProfileName->Visible = FALSE; // Disable update for API request
			else
				$this->ProfileName->setFormValue($val);
		}

		// Check field name 'ProfileAmount' first before field var 'x_ProfileAmount'
		$val = $CurrentForm->hasValue("ProfileAmount") ? $CurrentForm->getValue("ProfileAmount") : $CurrentForm->getValue("x_ProfileAmount");
		if (!$this->ProfileAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProfileAmount->Visible = FALSE; // Disable update for API request
			else
				$this->ProfileAmount->setFormValue($val);
		}

		// Check field name 'ProfileSpecialAmount' first before field var 'x_ProfileSpecialAmount'
		$val = $CurrentForm->hasValue("ProfileSpecialAmount") ? $CurrentForm->getValue("ProfileSpecialAmount") : $CurrentForm->getValue("x_ProfileSpecialAmount");
		if (!$this->ProfileSpecialAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProfileSpecialAmount->Visible = FALSE; // Disable update for API request
			else
				$this->ProfileSpecialAmount->setFormValue($val);
		}

		// Check field name 'ProfileMasterInactive' first before field var 'x_ProfileMasterInactive'
		$val = $CurrentForm->hasValue("ProfileMasterInactive") ? $CurrentForm->getValue("ProfileMasterInactive") : $CurrentForm->getValue("x_ProfileMasterInactive");
		if (!$this->ProfileMasterInactive->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProfileMasterInactive->Visible = FALSE; // Disable update for API request
			else
				$this->ProfileMasterInactive->setFormValue($val);
		}

		// Check field name 'ReagentAmt' first before field var 'x_ReagentAmt'
		$val = $CurrentForm->hasValue("ReagentAmt") ? $CurrentForm->getValue("ReagentAmt") : $CurrentForm->getValue("x_ReagentAmt");
		if (!$this->ReagentAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReagentAmt->Visible = FALSE; // Disable update for API request
			else
				$this->ReagentAmt->setFormValue($val);
		}

		// Check field name 'LabAmt' first before field var 'x_LabAmt'
		$val = $CurrentForm->hasValue("LabAmt") ? $CurrentForm->getValue("LabAmt") : $CurrentForm->getValue("x_LabAmt");
		if (!$this->LabAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LabAmt->Visible = FALSE; // Disable update for API request
			else
				$this->LabAmt->setFormValue($val);
		}

		// Check field name 'RefAmt' first before field var 'x_RefAmt'
		$val = $CurrentForm->hasValue("RefAmt") ? $CurrentForm->getValue("RefAmt") : $CurrentForm->getValue("x_RefAmt");
		if (!$this->RefAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RefAmt->Visible = FALSE; // Disable update for API request
			else
				$this->RefAmt->setFormValue($val);
		}

		// Check field name 'MainDeptCD' first before field var 'x_MainDeptCD'
		$val = $CurrentForm->hasValue("MainDeptCD") ? $CurrentForm->getValue("MainDeptCD") : $CurrentForm->getValue("x_MainDeptCD");
		if (!$this->MainDeptCD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MainDeptCD->Visible = FALSE; // Disable update for API request
			else
				$this->MainDeptCD->setFormValue($val);
		}

		// Check field name 'Individual' first before field var 'x_Individual'
		$val = $CurrentForm->hasValue("Individual") ? $CurrentForm->getValue("Individual") : $CurrentForm->getValue("x_Individual");
		if (!$this->Individual->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Individual->Visible = FALSE; // Disable update for API request
			else
				$this->Individual->setFormValue($val);
		}

		// Check field name 'ShortName' first before field var 'x_ShortName'
		$val = $CurrentForm->hasValue("ShortName") ? $CurrentForm->getValue("ShortName") : $CurrentForm->getValue("x_ShortName");
		if (!$this->ShortName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ShortName->Visible = FALSE; // Disable update for API request
			else
				$this->ShortName->setFormValue($val);
		}

		// Check field name 'Note' first before field var 'x_Note'
		$val = $CurrentForm->hasValue("Note") ? $CurrentForm->getValue("Note") : $CurrentForm->getValue("x_Note");
		if (!$this->Note->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Note->Visible = FALSE; // Disable update for API request
			else
				$this->Note->setFormValue($val);
		}

		// Check field name 'PrevAmt' first before field var 'x_PrevAmt'
		$val = $CurrentForm->hasValue("PrevAmt") ? $CurrentForm->getValue("PrevAmt") : $CurrentForm->getValue("x_PrevAmt");
		if (!$this->PrevAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PrevAmt->Visible = FALSE; // Disable update for API request
			else
				$this->PrevAmt->setFormValue($val);
		}

		// Check field name 'BillName' first before field var 'x_BillName'
		$val = $CurrentForm->hasValue("BillName") ? $CurrentForm->getValue("BillName") : $CurrentForm->getValue("x_BillName");
		if (!$this->BillName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillName->Visible = FALSE; // Disable update for API request
			else
				$this->BillName->setFormValue($val);
		}

		// Check field name 'ActualAmt' first before field var 'x_ActualAmt'
		$val = $CurrentForm->hasValue("ActualAmt") ? $CurrentForm->getValue("ActualAmt") : $CurrentForm->getValue("x_ActualAmt");
		if (!$this->ActualAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ActualAmt->Visible = FALSE; // Disable update for API request
			else
				$this->ActualAmt->setFormValue($val);
		}

		// Check field name 'NoHeading' first before field var 'x_NoHeading'
		$val = $CurrentForm->hasValue("NoHeading") ? $CurrentForm->getValue("NoHeading") : $CurrentForm->getValue("x_NoHeading");
		if (!$this->NoHeading->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoHeading->Visible = FALSE; // Disable update for API request
			else
				$this->NoHeading->setFormValue($val);
		}

		// Check field name 'EditDate' first before field var 'x_EditDate'
		$val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
		if (!$this->EditDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EditDate->Visible = FALSE; // Disable update for API request
			else
				$this->EditDate->setFormValue($val);
			$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		}

		// Check field name 'EditUser' first before field var 'x_EditUser'
		$val = $CurrentForm->hasValue("EditUser") ? $CurrentForm->getValue("EditUser") : $CurrentForm->getValue("x_EditUser");
		if (!$this->EditUser->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EditUser->Visible = FALSE; // Disable update for API request
			else
				$this->EditUser->setFormValue($val);
		}

		// Check field name 'HISCD' first before field var 'x_HISCD'
		$val = $CurrentForm->hasValue("HISCD") ? $CurrentForm->getValue("HISCD") : $CurrentForm->getValue("x_HISCD");
		if (!$this->HISCD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HISCD->Visible = FALSE; // Disable update for API request
			else
				$this->HISCD->setFormValue($val);
		}

		// Check field name 'PriceList' first before field var 'x_PriceList'
		$val = $CurrentForm->hasValue("PriceList") ? $CurrentForm->getValue("PriceList") : $CurrentForm->getValue("x_PriceList");
		if (!$this->PriceList->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PriceList->Visible = FALSE; // Disable update for API request
			else
				$this->PriceList->setFormValue($val);
		}

		// Check field name 'IPAmt' first before field var 'x_IPAmt'
		$val = $CurrentForm->hasValue("IPAmt") ? $CurrentForm->getValue("IPAmt") : $CurrentForm->getValue("x_IPAmt");
		if (!$this->IPAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IPAmt->Visible = FALSE; // Disable update for API request
			else
				$this->IPAmt->setFormValue($val);
		}

		// Check field name 'IInsAmt' first before field var 'x_IInsAmt'
		$val = $CurrentForm->hasValue("IInsAmt") ? $CurrentForm->getValue("IInsAmt") : $CurrentForm->getValue("x_IInsAmt");
		if (!$this->IInsAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IInsAmt->Visible = FALSE; // Disable update for API request
			else
				$this->IInsAmt->setFormValue($val);
		}

		// Check field name 'ManualCD' first before field var 'x_ManualCD'
		$val = $CurrentForm->hasValue("ManualCD") ? $CurrentForm->getValue("ManualCD") : $CurrentForm->getValue("x_ManualCD");
		if (!$this->ManualCD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ManualCD->Visible = FALSE; // Disable update for API request
			else
				$this->ManualCD->setFormValue($val);
		}

		// Check field name 'Free' first before field var 'x_Free'
		$val = $CurrentForm->hasValue("Free") ? $CurrentForm->getValue("Free") : $CurrentForm->getValue("x_Free");
		if (!$this->Free->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Free->Visible = FALSE; // Disable update for API request
			else
				$this->Free->setFormValue($val);
		}

		// Check field name 'IIpAmt' first before field var 'x_IIpAmt'
		$val = $CurrentForm->hasValue("IIpAmt") ? $CurrentForm->getValue("IIpAmt") : $CurrentForm->getValue("x_IIpAmt");
		if (!$this->IIpAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IIpAmt->Visible = FALSE; // Disable update for API request
			else
				$this->IIpAmt->setFormValue($val);
		}

		// Check field name 'InsAmt' first before field var 'x_InsAmt'
		$val = $CurrentForm->hasValue("InsAmt") ? $CurrentForm->getValue("InsAmt") : $CurrentForm->getValue("x_InsAmt");
		if (!$this->InsAmt->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->InsAmt->Visible = FALSE; // Disable update for API request
			else
				$this->InsAmt->setFormValue($val);
		}

		// Check field name 'OutSource' first before field var 'x_OutSource'
		$val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
		if (!$this->OutSource->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OutSource->Visible = FALSE; // Disable update for API request
			else
				$this->OutSource->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ProfileCode->CurrentValue = $this->ProfileCode->FormValue;
		$this->ProfileName->CurrentValue = $this->ProfileName->FormValue;
		$this->ProfileAmount->CurrentValue = $this->ProfileAmount->FormValue;
		$this->ProfileSpecialAmount->CurrentValue = $this->ProfileSpecialAmount->FormValue;
		$this->ProfileMasterInactive->CurrentValue = $this->ProfileMasterInactive->FormValue;
		$this->ReagentAmt->CurrentValue = $this->ReagentAmt->FormValue;
		$this->LabAmt->CurrentValue = $this->LabAmt->FormValue;
		$this->RefAmt->CurrentValue = $this->RefAmt->FormValue;
		$this->MainDeptCD->CurrentValue = $this->MainDeptCD->FormValue;
		$this->Individual->CurrentValue = $this->Individual->FormValue;
		$this->ShortName->CurrentValue = $this->ShortName->FormValue;
		$this->Note->CurrentValue = $this->Note->FormValue;
		$this->PrevAmt->CurrentValue = $this->PrevAmt->FormValue;
		$this->BillName->CurrentValue = $this->BillName->FormValue;
		$this->ActualAmt->CurrentValue = $this->ActualAmt->FormValue;
		$this->NoHeading->CurrentValue = $this->NoHeading->FormValue;
		$this->EditDate->CurrentValue = $this->EditDate->FormValue;
		$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		$this->EditUser->CurrentValue = $this->EditUser->FormValue;
		$this->HISCD->CurrentValue = $this->HISCD->FormValue;
		$this->PriceList->CurrentValue = $this->PriceList->FormValue;
		$this->IPAmt->CurrentValue = $this->IPAmt->FormValue;
		$this->IInsAmt->CurrentValue = $this->IInsAmt->FormValue;
		$this->ManualCD->CurrentValue = $this->ManualCD->FormValue;
		$this->Free->CurrentValue = $this->Free->FormValue;
		$this->IIpAmt->CurrentValue = $this->IIpAmt->FormValue;
		$this->InsAmt->CurrentValue = $this->InsAmt->FormValue;
		$this->OutSource->CurrentValue = $this->OutSource->FormValue;
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
		$this->ProfileCode->setDbValue($row['ProfileCode']);
		$this->ProfileName->setDbValue($row['ProfileName']);
		$this->ProfileAmount->setDbValue($row['ProfileAmount']);
		$this->ProfileSpecialAmount->setDbValue($row['ProfileSpecialAmount']);
		$this->ProfileMasterInactive->setDbValue($row['ProfileMasterInactive']);
		$this->ReagentAmt->setDbValue($row['ReagentAmt']);
		$this->LabAmt->setDbValue($row['LabAmt']);
		$this->RefAmt->setDbValue($row['RefAmt']);
		$this->MainDeptCD->setDbValue($row['MainDeptCD']);
		$this->Individual->setDbValue($row['Individual']);
		$this->ShortName->setDbValue($row['ShortName']);
		$this->Note->setDbValue($row['Note']);
		$this->PrevAmt->setDbValue($row['PrevAmt']);
		$this->BillName->setDbValue($row['BillName']);
		$this->ActualAmt->setDbValue($row['ActualAmt']);
		$this->NoHeading->setDbValue($row['NoHeading']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->EditUser->setDbValue($row['EditUser']);
		$this->HISCD->setDbValue($row['HISCD']);
		$this->PriceList->setDbValue($row['PriceList']);
		$this->IPAmt->setDbValue($row['IPAmt']);
		$this->IInsAmt->setDbValue($row['IInsAmt']);
		$this->ManualCD->setDbValue($row['ManualCD']);
		$this->Free->setDbValue($row['Free']);
		$this->IIpAmt->setDbValue($row['IIpAmt']);
		$this->InsAmt->setDbValue($row['InsAmt']);
		$this->OutSource->setDbValue($row['OutSource']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['ProfileCode'] = $this->ProfileCode->CurrentValue;
		$row['ProfileName'] = $this->ProfileName->CurrentValue;
		$row['ProfileAmount'] = $this->ProfileAmount->CurrentValue;
		$row['ProfileSpecialAmount'] = $this->ProfileSpecialAmount->CurrentValue;
		$row['ProfileMasterInactive'] = $this->ProfileMasterInactive->CurrentValue;
		$row['ReagentAmt'] = $this->ReagentAmt->CurrentValue;
		$row['LabAmt'] = $this->LabAmt->CurrentValue;
		$row['RefAmt'] = $this->RefAmt->CurrentValue;
		$row['MainDeptCD'] = $this->MainDeptCD->CurrentValue;
		$row['Individual'] = $this->Individual->CurrentValue;
		$row['ShortName'] = $this->ShortName->CurrentValue;
		$row['Note'] = $this->Note->CurrentValue;
		$row['PrevAmt'] = $this->PrevAmt->CurrentValue;
		$row['BillName'] = $this->BillName->CurrentValue;
		$row['ActualAmt'] = $this->ActualAmt->CurrentValue;
		$row['NoHeading'] = $this->NoHeading->CurrentValue;
		$row['EditDate'] = $this->EditDate->CurrentValue;
		$row['EditUser'] = $this->EditUser->CurrentValue;
		$row['HISCD'] = $this->HISCD->CurrentValue;
		$row['PriceList'] = $this->PriceList->CurrentValue;
		$row['IPAmt'] = $this->IPAmt->CurrentValue;
		$row['IInsAmt'] = $this->IInsAmt->CurrentValue;
		$row['ManualCD'] = $this->ManualCD->CurrentValue;
		$row['Free'] = $this->Free->CurrentValue;
		$row['IIpAmt'] = $this->IIpAmt->CurrentValue;
		$row['InsAmt'] = $this->InsAmt->CurrentValue;
		$row['OutSource'] = $this->OutSource->CurrentValue;
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

		if ($this->ProfileAmount->FormValue == $this->ProfileAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileAmount->CurrentValue)))
			$this->ProfileAmount->CurrentValue = ConvertToFloatString($this->ProfileAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProfileSpecialAmount->FormValue == $this->ProfileSpecialAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue)))
			$this->ProfileSpecialAmount->CurrentValue = ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue)))
			$this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue)))
			$this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue)))
			$this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue)))
			$this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue)))
			$this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue)))
			$this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IInsAmt->FormValue == $this->IInsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IInsAmt->CurrentValue)))
			$this->IInsAmt->CurrentValue = ConvertToFloatString($this->IInsAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IIpAmt->FormValue == $this->IIpAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IIpAmt->CurrentValue)))
			$this->IIpAmt->CurrentValue = ConvertToFloatString($this->IIpAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue)))
			$this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// ProfileCode
		// ProfileName
		// ProfileAmount
		// ProfileSpecialAmount
		// ProfileMasterInactive
		// ReagentAmt
		// LabAmt
		// RefAmt
		// MainDeptCD
		// Individual
		// ShortName
		// Note
		// PrevAmt
		// BillName
		// ActualAmt
		// NoHeading
		// EditDate
		// EditUser
		// HISCD
		// PriceList
		// IPAmt
		// IInsAmt
		// ManualCD
		// Free
		// IIpAmt
		// InsAmt
		// OutSource

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// ProfileCode
			$this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
			$this->ProfileCode->ViewCustomAttributes = "";

			// ProfileName
			$this->ProfileName->ViewValue = $this->ProfileName->CurrentValue;
			$this->ProfileName->ViewCustomAttributes = "";

			// ProfileAmount
			$this->ProfileAmount->ViewValue = $this->ProfileAmount->CurrentValue;
			$this->ProfileAmount->ViewValue = FormatNumber($this->ProfileAmount->ViewValue, 2, -2, -2, -2);
			$this->ProfileAmount->ViewCustomAttributes = "";

			// ProfileSpecialAmount
			$this->ProfileSpecialAmount->ViewValue = $this->ProfileSpecialAmount->CurrentValue;
			$this->ProfileSpecialAmount->ViewValue = FormatNumber($this->ProfileSpecialAmount->ViewValue, 2, -2, -2, -2);
			$this->ProfileSpecialAmount->ViewCustomAttributes = "";

			// ProfileMasterInactive
			$this->ProfileMasterInactive->ViewValue = $this->ProfileMasterInactive->CurrentValue;
			$this->ProfileMasterInactive->ViewCustomAttributes = "";

			// ReagentAmt
			$this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
			$this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
			$this->ReagentAmt->ViewCustomAttributes = "";

			// LabAmt
			$this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
			$this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
			$this->LabAmt->ViewCustomAttributes = "";

			// RefAmt
			$this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
			$this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
			$this->RefAmt->ViewCustomAttributes = "";

			// MainDeptCD
			$this->MainDeptCD->ViewValue = $this->MainDeptCD->CurrentValue;
			$this->MainDeptCD->ViewCustomAttributes = "";

			// Individual
			$this->Individual->ViewValue = $this->Individual->CurrentValue;
			$this->Individual->ViewCustomAttributes = "";

			// ShortName
			$this->ShortName->ViewValue = $this->ShortName->CurrentValue;
			$this->ShortName->ViewCustomAttributes = "";

			// Note
			$this->Note->ViewValue = $this->Note->CurrentValue;
			$this->Note->ViewCustomAttributes = "";

			// PrevAmt
			$this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
			$this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
			$this->PrevAmt->ViewCustomAttributes = "";

			// BillName
			$this->BillName->ViewValue = $this->BillName->CurrentValue;
			$this->BillName->ViewCustomAttributes = "";

			// ActualAmt
			$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
			$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
			$this->ActualAmt->ViewCustomAttributes = "";

			// NoHeading
			$this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
			$this->NoHeading->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// EditUser
			$this->EditUser->ViewValue = $this->EditUser->CurrentValue;
			$this->EditUser->ViewCustomAttributes = "";

			// HISCD
			$this->HISCD->ViewValue = $this->HISCD->CurrentValue;
			$this->HISCD->ViewCustomAttributes = "";

			// PriceList
			$this->PriceList->ViewValue = $this->PriceList->CurrentValue;
			$this->PriceList->ViewCustomAttributes = "";

			// IPAmt
			$this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
			$this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
			$this->IPAmt->ViewCustomAttributes = "";

			// IInsAmt
			$this->IInsAmt->ViewValue = $this->IInsAmt->CurrentValue;
			$this->IInsAmt->ViewValue = FormatNumber($this->IInsAmt->ViewValue, 2, -2, -2, -2);
			$this->IInsAmt->ViewCustomAttributes = "";

			// ManualCD
			$this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
			$this->ManualCD->ViewCustomAttributes = "";

			// Free
			$this->Free->ViewValue = $this->Free->CurrentValue;
			$this->Free->ViewCustomAttributes = "";

			// IIpAmt
			$this->IIpAmt->ViewValue = $this->IIpAmt->CurrentValue;
			$this->IIpAmt->ViewValue = FormatNumber($this->IIpAmt->ViewValue, 2, -2, -2, -2);
			$this->IIpAmt->ViewCustomAttributes = "";

			// InsAmt
			$this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
			$this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
			$this->InsAmt->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// ProfileCode
			$this->ProfileCode->LinkCustomAttributes = "";
			$this->ProfileCode->HrefValue = "";
			$this->ProfileCode->TooltipValue = "";

			// ProfileName
			$this->ProfileName->LinkCustomAttributes = "";
			$this->ProfileName->HrefValue = "";
			$this->ProfileName->TooltipValue = "";

			// ProfileAmount
			$this->ProfileAmount->LinkCustomAttributes = "";
			$this->ProfileAmount->HrefValue = "";
			$this->ProfileAmount->TooltipValue = "";

			// ProfileSpecialAmount
			$this->ProfileSpecialAmount->LinkCustomAttributes = "";
			$this->ProfileSpecialAmount->HrefValue = "";
			$this->ProfileSpecialAmount->TooltipValue = "";

			// ProfileMasterInactive
			$this->ProfileMasterInactive->LinkCustomAttributes = "";
			$this->ProfileMasterInactive->HrefValue = "";
			$this->ProfileMasterInactive->TooltipValue = "";

			// ReagentAmt
			$this->ReagentAmt->LinkCustomAttributes = "";
			$this->ReagentAmt->HrefValue = "";
			$this->ReagentAmt->TooltipValue = "";

			// LabAmt
			$this->LabAmt->LinkCustomAttributes = "";
			$this->LabAmt->HrefValue = "";
			$this->LabAmt->TooltipValue = "";

			// RefAmt
			$this->RefAmt->LinkCustomAttributes = "";
			$this->RefAmt->HrefValue = "";
			$this->RefAmt->TooltipValue = "";

			// MainDeptCD
			$this->MainDeptCD->LinkCustomAttributes = "";
			$this->MainDeptCD->HrefValue = "";
			$this->MainDeptCD->TooltipValue = "";

			// Individual
			$this->Individual->LinkCustomAttributes = "";
			$this->Individual->HrefValue = "";
			$this->Individual->TooltipValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";
			$this->ShortName->TooltipValue = "";

			// Note
			$this->Note->LinkCustomAttributes = "";
			$this->Note->HrefValue = "";
			$this->Note->TooltipValue = "";

			// PrevAmt
			$this->PrevAmt->LinkCustomAttributes = "";
			$this->PrevAmt->HrefValue = "";
			$this->PrevAmt->TooltipValue = "";

			// BillName
			$this->BillName->LinkCustomAttributes = "";
			$this->BillName->HrefValue = "";
			$this->BillName->TooltipValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";
			$this->ActualAmt->TooltipValue = "";

			// NoHeading
			$this->NoHeading->LinkCustomAttributes = "";
			$this->NoHeading->HrefValue = "";
			$this->NoHeading->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// EditUser
			$this->EditUser->LinkCustomAttributes = "";
			$this->EditUser->HrefValue = "";
			$this->EditUser->TooltipValue = "";

			// HISCD
			$this->HISCD->LinkCustomAttributes = "";
			$this->HISCD->HrefValue = "";
			$this->HISCD->TooltipValue = "";

			// PriceList
			$this->PriceList->LinkCustomAttributes = "";
			$this->PriceList->HrefValue = "";
			$this->PriceList->TooltipValue = "";

			// IPAmt
			$this->IPAmt->LinkCustomAttributes = "";
			$this->IPAmt->HrefValue = "";
			$this->IPAmt->TooltipValue = "";

			// IInsAmt
			$this->IInsAmt->LinkCustomAttributes = "";
			$this->IInsAmt->HrefValue = "";
			$this->IInsAmt->TooltipValue = "";

			// ManualCD
			$this->ManualCD->LinkCustomAttributes = "";
			$this->ManualCD->HrefValue = "";
			$this->ManualCD->TooltipValue = "";

			// Free
			$this->Free->LinkCustomAttributes = "";
			$this->Free->HrefValue = "";
			$this->Free->TooltipValue = "";

			// IIpAmt
			$this->IIpAmt->LinkCustomAttributes = "";
			$this->IIpAmt->HrefValue = "";
			$this->IIpAmt->TooltipValue = "";

			// InsAmt
			$this->InsAmt->LinkCustomAttributes = "";
			$this->InsAmt->HrefValue = "";
			$this->InsAmt->TooltipValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
			$this->OutSource->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// ProfileCode
			$this->ProfileCode->EditAttrs["class"] = "form-control";
			$this->ProfileCode->EditCustomAttributes = "";
			if (!$this->ProfileCode->Raw)
				$this->ProfileCode->CurrentValue = HtmlDecode($this->ProfileCode->CurrentValue);
			$this->ProfileCode->EditValue = HtmlEncode($this->ProfileCode->CurrentValue);
			$this->ProfileCode->PlaceHolder = RemoveHtml($this->ProfileCode->caption());

			// ProfileName
			$this->ProfileName->EditAttrs["class"] = "form-control";
			$this->ProfileName->EditCustomAttributes = "";
			if (!$this->ProfileName->Raw)
				$this->ProfileName->CurrentValue = HtmlDecode($this->ProfileName->CurrentValue);
			$this->ProfileName->EditValue = HtmlEncode($this->ProfileName->CurrentValue);
			$this->ProfileName->PlaceHolder = RemoveHtml($this->ProfileName->caption());

			// ProfileAmount
			$this->ProfileAmount->EditAttrs["class"] = "form-control";
			$this->ProfileAmount->EditCustomAttributes = "";
			$this->ProfileAmount->EditValue = HtmlEncode($this->ProfileAmount->CurrentValue);
			$this->ProfileAmount->PlaceHolder = RemoveHtml($this->ProfileAmount->caption());
			if (strval($this->ProfileAmount->EditValue) != "" && is_numeric($this->ProfileAmount->EditValue))
				$this->ProfileAmount->EditValue = FormatNumber($this->ProfileAmount->EditValue, -2, -2, -2, -2);
			

			// ProfileSpecialAmount
			$this->ProfileSpecialAmount->EditAttrs["class"] = "form-control";
			$this->ProfileSpecialAmount->EditCustomAttributes = "";
			$this->ProfileSpecialAmount->EditValue = HtmlEncode($this->ProfileSpecialAmount->CurrentValue);
			$this->ProfileSpecialAmount->PlaceHolder = RemoveHtml($this->ProfileSpecialAmount->caption());
			if (strval($this->ProfileSpecialAmount->EditValue) != "" && is_numeric($this->ProfileSpecialAmount->EditValue))
				$this->ProfileSpecialAmount->EditValue = FormatNumber($this->ProfileSpecialAmount->EditValue, -2, -2, -2, -2);
			

			// ProfileMasterInactive
			$this->ProfileMasterInactive->EditAttrs["class"] = "form-control";
			$this->ProfileMasterInactive->EditCustomAttributes = "";
			if (!$this->ProfileMasterInactive->Raw)
				$this->ProfileMasterInactive->CurrentValue = HtmlDecode($this->ProfileMasterInactive->CurrentValue);
			$this->ProfileMasterInactive->EditValue = HtmlEncode($this->ProfileMasterInactive->CurrentValue);
			$this->ProfileMasterInactive->PlaceHolder = RemoveHtml($this->ProfileMasterInactive->caption());

			// ReagentAmt
			$this->ReagentAmt->EditAttrs["class"] = "form-control";
			$this->ReagentAmt->EditCustomAttributes = "";
			$this->ReagentAmt->EditValue = HtmlEncode($this->ReagentAmt->CurrentValue);
			$this->ReagentAmt->PlaceHolder = RemoveHtml($this->ReagentAmt->caption());
			if (strval($this->ReagentAmt->EditValue) != "" && is_numeric($this->ReagentAmt->EditValue))
				$this->ReagentAmt->EditValue = FormatNumber($this->ReagentAmt->EditValue, -2, -2, -2, -2);
			

			// LabAmt
			$this->LabAmt->EditAttrs["class"] = "form-control";
			$this->LabAmt->EditCustomAttributes = "";
			$this->LabAmt->EditValue = HtmlEncode($this->LabAmt->CurrentValue);
			$this->LabAmt->PlaceHolder = RemoveHtml($this->LabAmt->caption());
			if (strval($this->LabAmt->EditValue) != "" && is_numeric($this->LabAmt->EditValue))
				$this->LabAmt->EditValue = FormatNumber($this->LabAmt->EditValue, -2, -2, -2, -2);
			

			// RefAmt
			$this->RefAmt->EditAttrs["class"] = "form-control";
			$this->RefAmt->EditCustomAttributes = "";
			$this->RefAmt->EditValue = HtmlEncode($this->RefAmt->CurrentValue);
			$this->RefAmt->PlaceHolder = RemoveHtml($this->RefAmt->caption());
			if (strval($this->RefAmt->EditValue) != "" && is_numeric($this->RefAmt->EditValue))
				$this->RefAmt->EditValue = FormatNumber($this->RefAmt->EditValue, -2, -2, -2, -2);
			

			// MainDeptCD
			$this->MainDeptCD->EditAttrs["class"] = "form-control";
			$this->MainDeptCD->EditCustomAttributes = "";
			if (!$this->MainDeptCD->Raw)
				$this->MainDeptCD->CurrentValue = HtmlDecode($this->MainDeptCD->CurrentValue);
			$this->MainDeptCD->EditValue = HtmlEncode($this->MainDeptCD->CurrentValue);
			$this->MainDeptCD->PlaceHolder = RemoveHtml($this->MainDeptCD->caption());

			// Individual
			$this->Individual->EditAttrs["class"] = "form-control";
			$this->Individual->EditCustomAttributes = "";
			if (!$this->Individual->Raw)
				$this->Individual->CurrentValue = HtmlDecode($this->Individual->CurrentValue);
			$this->Individual->EditValue = HtmlEncode($this->Individual->CurrentValue);
			$this->Individual->PlaceHolder = RemoveHtml($this->Individual->caption());

			// ShortName
			$this->ShortName->EditAttrs["class"] = "form-control";
			$this->ShortName->EditCustomAttributes = "";
			if (!$this->ShortName->Raw)
				$this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
			$this->ShortName->EditValue = HtmlEncode($this->ShortName->CurrentValue);
			$this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

			// Note
			$this->Note->EditAttrs["class"] = "form-control";
			$this->Note->EditCustomAttributes = "";
			$this->Note->EditValue = HtmlEncode($this->Note->CurrentValue);
			$this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

			// PrevAmt
			$this->PrevAmt->EditAttrs["class"] = "form-control";
			$this->PrevAmt->EditCustomAttributes = "";
			$this->PrevAmt->EditValue = HtmlEncode($this->PrevAmt->CurrentValue);
			$this->PrevAmt->PlaceHolder = RemoveHtml($this->PrevAmt->caption());
			if (strval($this->PrevAmt->EditValue) != "" && is_numeric($this->PrevAmt->EditValue))
				$this->PrevAmt->EditValue = FormatNumber($this->PrevAmt->EditValue, -2, -2, -2, -2);
			

			// BillName
			$this->BillName->EditAttrs["class"] = "form-control";
			$this->BillName->EditCustomAttributes = "";
			if (!$this->BillName->Raw)
				$this->BillName->CurrentValue = HtmlDecode($this->BillName->CurrentValue);
			$this->BillName->EditValue = HtmlEncode($this->BillName->CurrentValue);
			$this->BillName->PlaceHolder = RemoveHtml($this->BillName->caption());

			// ActualAmt
			$this->ActualAmt->EditAttrs["class"] = "form-control";
			$this->ActualAmt->EditCustomAttributes = "";
			$this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->CurrentValue);
			$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
			if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue))
				$this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
			

			// NoHeading
			$this->NoHeading->EditAttrs["class"] = "form-control";
			$this->NoHeading->EditCustomAttributes = "";
			if (!$this->NoHeading->Raw)
				$this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
			$this->NoHeading->EditValue = HtmlEncode($this->NoHeading->CurrentValue);
			$this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditUser
			$this->EditUser->EditAttrs["class"] = "form-control";
			$this->EditUser->EditCustomAttributes = "";
			if (!$this->EditUser->Raw)
				$this->EditUser->CurrentValue = HtmlDecode($this->EditUser->CurrentValue);
			$this->EditUser->EditValue = HtmlEncode($this->EditUser->CurrentValue);
			$this->EditUser->PlaceHolder = RemoveHtml($this->EditUser->caption());

			// HISCD
			$this->HISCD->EditAttrs["class"] = "form-control";
			$this->HISCD->EditCustomAttributes = "";
			if (!$this->HISCD->Raw)
				$this->HISCD->CurrentValue = HtmlDecode($this->HISCD->CurrentValue);
			$this->HISCD->EditValue = HtmlEncode($this->HISCD->CurrentValue);
			$this->HISCD->PlaceHolder = RemoveHtml($this->HISCD->caption());

			// PriceList
			$this->PriceList->EditAttrs["class"] = "form-control";
			$this->PriceList->EditCustomAttributes = "";
			if (!$this->PriceList->Raw)
				$this->PriceList->CurrentValue = HtmlDecode($this->PriceList->CurrentValue);
			$this->PriceList->EditValue = HtmlEncode($this->PriceList->CurrentValue);
			$this->PriceList->PlaceHolder = RemoveHtml($this->PriceList->caption());

			// IPAmt
			$this->IPAmt->EditAttrs["class"] = "form-control";
			$this->IPAmt->EditCustomAttributes = "";
			$this->IPAmt->EditValue = HtmlEncode($this->IPAmt->CurrentValue);
			$this->IPAmt->PlaceHolder = RemoveHtml($this->IPAmt->caption());
			if (strval($this->IPAmt->EditValue) != "" && is_numeric($this->IPAmt->EditValue))
				$this->IPAmt->EditValue = FormatNumber($this->IPAmt->EditValue, -2, -2, -2, -2);
			

			// IInsAmt
			$this->IInsAmt->EditAttrs["class"] = "form-control";
			$this->IInsAmt->EditCustomAttributes = "";
			$this->IInsAmt->EditValue = HtmlEncode($this->IInsAmt->CurrentValue);
			$this->IInsAmt->PlaceHolder = RemoveHtml($this->IInsAmt->caption());
			if (strval($this->IInsAmt->EditValue) != "" && is_numeric($this->IInsAmt->EditValue))
				$this->IInsAmt->EditValue = FormatNumber($this->IInsAmt->EditValue, -2, -2, -2, -2);
			

			// ManualCD
			$this->ManualCD->EditAttrs["class"] = "form-control";
			$this->ManualCD->EditCustomAttributes = "";
			if (!$this->ManualCD->Raw)
				$this->ManualCD->CurrentValue = HtmlDecode($this->ManualCD->CurrentValue);
			$this->ManualCD->EditValue = HtmlEncode($this->ManualCD->CurrentValue);
			$this->ManualCD->PlaceHolder = RemoveHtml($this->ManualCD->caption());

			// Free
			$this->Free->EditAttrs["class"] = "form-control";
			$this->Free->EditCustomAttributes = "";
			if (!$this->Free->Raw)
				$this->Free->CurrentValue = HtmlDecode($this->Free->CurrentValue);
			$this->Free->EditValue = HtmlEncode($this->Free->CurrentValue);
			$this->Free->PlaceHolder = RemoveHtml($this->Free->caption());

			// IIpAmt
			$this->IIpAmt->EditAttrs["class"] = "form-control";
			$this->IIpAmt->EditCustomAttributes = "";
			$this->IIpAmt->EditValue = HtmlEncode($this->IIpAmt->CurrentValue);
			$this->IIpAmt->PlaceHolder = RemoveHtml($this->IIpAmt->caption());
			if (strval($this->IIpAmt->EditValue) != "" && is_numeric($this->IIpAmt->EditValue))
				$this->IIpAmt->EditValue = FormatNumber($this->IIpAmt->EditValue, -2, -2, -2, -2);
			

			// InsAmt
			$this->InsAmt->EditAttrs["class"] = "form-control";
			$this->InsAmt->EditCustomAttributes = "";
			$this->InsAmt->EditValue = HtmlEncode($this->InsAmt->CurrentValue);
			$this->InsAmt->PlaceHolder = RemoveHtml($this->InsAmt->caption());
			if (strval($this->InsAmt->EditValue) != "" && is_numeric($this->InsAmt->EditValue))
				$this->InsAmt->EditValue = FormatNumber($this->InsAmt->EditValue, -2, -2, -2, -2);
			

			// OutSource
			$this->OutSource->EditAttrs["class"] = "form-control";
			$this->OutSource->EditCustomAttributes = "";
			if (!$this->OutSource->Raw)
				$this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
			$this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
			$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

			// Add refer script
			// ProfileCode

			$this->ProfileCode->LinkCustomAttributes = "";
			$this->ProfileCode->HrefValue = "";

			// ProfileName
			$this->ProfileName->LinkCustomAttributes = "";
			$this->ProfileName->HrefValue = "";

			// ProfileAmount
			$this->ProfileAmount->LinkCustomAttributes = "";
			$this->ProfileAmount->HrefValue = "";

			// ProfileSpecialAmount
			$this->ProfileSpecialAmount->LinkCustomAttributes = "";
			$this->ProfileSpecialAmount->HrefValue = "";

			// ProfileMasterInactive
			$this->ProfileMasterInactive->LinkCustomAttributes = "";
			$this->ProfileMasterInactive->HrefValue = "";

			// ReagentAmt
			$this->ReagentAmt->LinkCustomAttributes = "";
			$this->ReagentAmt->HrefValue = "";

			// LabAmt
			$this->LabAmt->LinkCustomAttributes = "";
			$this->LabAmt->HrefValue = "";

			// RefAmt
			$this->RefAmt->LinkCustomAttributes = "";
			$this->RefAmt->HrefValue = "";

			// MainDeptCD
			$this->MainDeptCD->LinkCustomAttributes = "";
			$this->MainDeptCD->HrefValue = "";

			// Individual
			$this->Individual->LinkCustomAttributes = "";
			$this->Individual->HrefValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";

			// Note
			$this->Note->LinkCustomAttributes = "";
			$this->Note->HrefValue = "";

			// PrevAmt
			$this->PrevAmt->LinkCustomAttributes = "";
			$this->PrevAmt->HrefValue = "";

			// BillName
			$this->BillName->LinkCustomAttributes = "";
			$this->BillName->HrefValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";

			// NoHeading
			$this->NoHeading->LinkCustomAttributes = "";
			$this->NoHeading->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// EditUser
			$this->EditUser->LinkCustomAttributes = "";
			$this->EditUser->HrefValue = "";

			// HISCD
			$this->HISCD->LinkCustomAttributes = "";
			$this->HISCD->HrefValue = "";

			// PriceList
			$this->PriceList->LinkCustomAttributes = "";
			$this->PriceList->HrefValue = "";

			// IPAmt
			$this->IPAmt->LinkCustomAttributes = "";
			$this->IPAmt->HrefValue = "";

			// IInsAmt
			$this->IInsAmt->LinkCustomAttributes = "";
			$this->IInsAmt->HrefValue = "";

			// ManualCD
			$this->ManualCD->LinkCustomAttributes = "";
			$this->ManualCD->HrefValue = "";

			// Free
			$this->Free->LinkCustomAttributes = "";
			$this->Free->HrefValue = "";

			// IIpAmt
			$this->IIpAmt->LinkCustomAttributes = "";
			$this->IIpAmt->HrefValue = "";

			// InsAmt
			$this->InsAmt->LinkCustomAttributes = "";
			$this->InsAmt->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
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
		if ($this->ProfileCode->Required) {
			if (!$this->ProfileCode->IsDetailKey && $this->ProfileCode->FormValue != NULL && $this->ProfileCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfileCode->caption(), $this->ProfileCode->RequiredErrorMessage));
			}
		}
		if ($this->ProfileName->Required) {
			if (!$this->ProfileName->IsDetailKey && $this->ProfileName->FormValue != NULL && $this->ProfileName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfileName->caption(), $this->ProfileName->RequiredErrorMessage));
			}
		}
		if ($this->ProfileAmount->Required) {
			if (!$this->ProfileAmount->IsDetailKey && $this->ProfileAmount->FormValue != NULL && $this->ProfileAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfileAmount->caption(), $this->ProfileAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ProfileAmount->FormValue)) {
			AddMessage($FormError, $this->ProfileAmount->errorMessage());
		}
		if ($this->ProfileSpecialAmount->Required) {
			if (!$this->ProfileSpecialAmount->IsDetailKey && $this->ProfileSpecialAmount->FormValue != NULL && $this->ProfileSpecialAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfileSpecialAmount->caption(), $this->ProfileSpecialAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ProfileSpecialAmount->FormValue)) {
			AddMessage($FormError, $this->ProfileSpecialAmount->errorMessage());
		}
		if ($this->ProfileMasterInactive->Required) {
			if (!$this->ProfileMasterInactive->IsDetailKey && $this->ProfileMasterInactive->FormValue != NULL && $this->ProfileMasterInactive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfileMasterInactive->caption(), $this->ProfileMasterInactive->RequiredErrorMessage));
			}
		}
		if ($this->ReagentAmt->Required) {
			if (!$this->ReagentAmt->IsDetailKey && $this->ReagentAmt->FormValue != NULL && $this->ReagentAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReagentAmt->caption(), $this->ReagentAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ReagentAmt->FormValue)) {
			AddMessage($FormError, $this->ReagentAmt->errorMessage());
		}
		if ($this->LabAmt->Required) {
			if (!$this->LabAmt->IsDetailKey && $this->LabAmt->FormValue != NULL && $this->LabAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabAmt->caption(), $this->LabAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LabAmt->FormValue)) {
			AddMessage($FormError, $this->LabAmt->errorMessage());
		}
		if ($this->RefAmt->Required) {
			if (!$this->RefAmt->IsDetailKey && $this->RefAmt->FormValue != NULL && $this->RefAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefAmt->caption(), $this->RefAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RefAmt->FormValue)) {
			AddMessage($FormError, $this->RefAmt->errorMessage());
		}
		if ($this->MainDeptCD->Required) {
			if (!$this->MainDeptCD->IsDetailKey && $this->MainDeptCD->FormValue != NULL && $this->MainDeptCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MainDeptCD->caption(), $this->MainDeptCD->RequiredErrorMessage));
			}
		}
		if ($this->Individual->Required) {
			if (!$this->Individual->IsDetailKey && $this->Individual->FormValue != NULL && $this->Individual->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Individual->caption(), $this->Individual->RequiredErrorMessage));
			}
		}
		if ($this->ShortName->Required) {
			if (!$this->ShortName->IsDetailKey && $this->ShortName->FormValue != NULL && $this->ShortName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ShortName->caption(), $this->ShortName->RequiredErrorMessage));
			}
		}
		if ($this->Note->Required) {
			if (!$this->Note->IsDetailKey && $this->Note->FormValue != NULL && $this->Note->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Note->caption(), $this->Note->RequiredErrorMessage));
			}
		}
		if ($this->PrevAmt->Required) {
			if (!$this->PrevAmt->IsDetailKey && $this->PrevAmt->FormValue != NULL && $this->PrevAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrevAmt->caption(), $this->PrevAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PrevAmt->FormValue)) {
			AddMessage($FormError, $this->PrevAmt->errorMessage());
		}
		if ($this->BillName->Required) {
			if (!$this->BillName->IsDetailKey && $this->BillName->FormValue != NULL && $this->BillName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillName->caption(), $this->BillName->RequiredErrorMessage));
			}
		}
		if ($this->ActualAmt->Required) {
			if (!$this->ActualAmt->IsDetailKey && $this->ActualAmt->FormValue != NULL && $this->ActualAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ActualAmt->caption(), $this->ActualAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ActualAmt->FormValue)) {
			AddMessage($FormError, $this->ActualAmt->errorMessage());
		}
		if ($this->NoHeading->Required) {
			if (!$this->NoHeading->IsDetailKey && $this->NoHeading->FormValue != NULL && $this->NoHeading->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoHeading->caption(), $this->NoHeading->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->Required) {
			if (!$this->EditDate->IsDetailKey && $this->EditDate->FormValue != NULL && $this->EditDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EditDate->FormValue)) {
			AddMessage($FormError, $this->EditDate->errorMessage());
		}
		if ($this->EditUser->Required) {
			if (!$this->EditUser->IsDetailKey && $this->EditUser->FormValue != NULL && $this->EditUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditUser->caption(), $this->EditUser->RequiredErrorMessage));
			}
		}
		if ($this->HISCD->Required) {
			if (!$this->HISCD->IsDetailKey && $this->HISCD->FormValue != NULL && $this->HISCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HISCD->caption(), $this->HISCD->RequiredErrorMessage));
			}
		}
		if ($this->PriceList->Required) {
			if (!$this->PriceList->IsDetailKey && $this->PriceList->FormValue != NULL && $this->PriceList->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PriceList->caption(), $this->PriceList->RequiredErrorMessage));
			}
		}
		if ($this->IPAmt->Required) {
			if (!$this->IPAmt->IsDetailKey && $this->IPAmt->FormValue != NULL && $this->IPAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IPAmt->caption(), $this->IPAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IPAmt->FormValue)) {
			AddMessage($FormError, $this->IPAmt->errorMessage());
		}
		if ($this->IInsAmt->Required) {
			if (!$this->IInsAmt->IsDetailKey && $this->IInsAmt->FormValue != NULL && $this->IInsAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IInsAmt->caption(), $this->IInsAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IInsAmt->FormValue)) {
			AddMessage($FormError, $this->IInsAmt->errorMessage());
		}
		if ($this->ManualCD->Required) {
			if (!$this->ManualCD->IsDetailKey && $this->ManualCD->FormValue != NULL && $this->ManualCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ManualCD->caption(), $this->ManualCD->RequiredErrorMessage));
			}
		}
		if ($this->Free->Required) {
			if (!$this->Free->IsDetailKey && $this->Free->FormValue != NULL && $this->Free->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Free->caption(), $this->Free->RequiredErrorMessage));
			}
		}
		if ($this->IIpAmt->Required) {
			if (!$this->IIpAmt->IsDetailKey && $this->IIpAmt->FormValue != NULL && $this->IIpAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IIpAmt->caption(), $this->IIpAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IIpAmt->FormValue)) {
			AddMessage($FormError, $this->IIpAmt->errorMessage());
		}
		if ($this->InsAmt->Required) {
			if (!$this->InsAmt->IsDetailKey && $this->InsAmt->FormValue != NULL && $this->InsAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InsAmt->caption(), $this->InsAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->InsAmt->FormValue)) {
			AddMessage($FormError, $this->InsAmt->errorMessage());
		}
		if ($this->OutSource->Required) {
			if (!$this->OutSource->IsDetailKey && $this->OutSource->FormValue != NULL && $this->OutSource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
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

		// ProfileCode
		$this->ProfileCode->setDbValueDef($rsnew, $this->ProfileCode->CurrentValue, "", FALSE);

		// ProfileName
		$this->ProfileName->setDbValueDef($rsnew, $this->ProfileName->CurrentValue, "", FALSE);

		// ProfileAmount
		$this->ProfileAmount->setDbValueDef($rsnew, $this->ProfileAmount->CurrentValue, 0, FALSE);

		// ProfileSpecialAmount
		$this->ProfileSpecialAmount->setDbValueDef($rsnew, $this->ProfileSpecialAmount->CurrentValue, 0, FALSE);

		// ProfileMasterInactive
		$this->ProfileMasterInactive->setDbValueDef($rsnew, $this->ProfileMasterInactive->CurrentValue, "", FALSE);

		// ReagentAmt
		$this->ReagentAmt->setDbValueDef($rsnew, $this->ReagentAmt->CurrentValue, 0, FALSE);

		// LabAmt
		$this->LabAmt->setDbValueDef($rsnew, $this->LabAmt->CurrentValue, 0, FALSE);

		// RefAmt
		$this->RefAmt->setDbValueDef($rsnew, $this->RefAmt->CurrentValue, 0, FALSE);

		// MainDeptCD
		$this->MainDeptCD->setDbValueDef($rsnew, $this->MainDeptCD->CurrentValue, "", FALSE);

		// Individual
		$this->Individual->setDbValueDef($rsnew, $this->Individual->CurrentValue, "", FALSE);

		// ShortName
		$this->ShortName->setDbValueDef($rsnew, $this->ShortName->CurrentValue, "", FALSE);

		// Note
		$this->Note->setDbValueDef($rsnew, $this->Note->CurrentValue, "", FALSE);

		// PrevAmt
		$this->PrevAmt->setDbValueDef($rsnew, $this->PrevAmt->CurrentValue, 0, FALSE);

		// BillName
		$this->BillName->setDbValueDef($rsnew, $this->BillName->CurrentValue, "", FALSE);

		// ActualAmt
		$this->ActualAmt->setDbValueDef($rsnew, $this->ActualAmt->CurrentValue, 0, FALSE);

		// NoHeading
		$this->NoHeading->setDbValueDef($rsnew, $this->NoHeading->CurrentValue, "", FALSE);

		// EditDate
		$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, FALSE);

		// EditUser
		$this->EditUser->setDbValueDef($rsnew, $this->EditUser->CurrentValue, "", FALSE);

		// HISCD
		$this->HISCD->setDbValueDef($rsnew, $this->HISCD->CurrentValue, "", FALSE);

		// PriceList
		$this->PriceList->setDbValueDef($rsnew, $this->PriceList->CurrentValue, "", FALSE);

		// IPAmt
		$this->IPAmt->setDbValueDef($rsnew, $this->IPAmt->CurrentValue, 0, FALSE);

		// IInsAmt
		$this->IInsAmt->setDbValueDef($rsnew, $this->IInsAmt->CurrentValue, 0, FALSE);

		// ManualCD
		$this->ManualCD->setDbValueDef($rsnew, $this->ManualCD->CurrentValue, "", FALSE);

		// Free
		$this->Free->setDbValueDef($rsnew, $this->Free->CurrentValue, "", FALSE);

		// IIpAmt
		$this->IIpAmt->setDbValueDef($rsnew, $this->IIpAmt->CurrentValue, 0, FALSE);

		// InsAmt
		$this->InsAmt->setDbValueDef($rsnew, $this->InsAmt->CurrentValue, 0, FALSE);

		// OutSource
		$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, "", FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_profile_masterlist.php"), "", $this->TableVar, TRUE);
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
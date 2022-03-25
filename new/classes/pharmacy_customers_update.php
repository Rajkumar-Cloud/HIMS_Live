<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pharmacy_customers_update extends pharmacy_customers
{

	// Page ID
	public $PageID = "update";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_customers';

	// Page object name
	public $PageObjName = "pharmacy_customers_update";

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

		// Table object (pharmacy_customers)
		if (!isset($GLOBALS["pharmacy_customers"]) || get_class($GLOBALS["pharmacy_customers"]) == PROJECT_NAMESPACE . "pharmacy_customers") {
			$GLOBALS["pharmacy_customers"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_customers"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'update');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_customers');

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
		global $pharmacy_customers;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pharmacy_customers);
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
					if ($pageName == "pharmacy_customersview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-update-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $RecKeys;
	public $Disabled;
	public $UpdateCount = 0;

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
					$this->terminate(GetUrl("pharmacy_customerslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->Customercode->setVisibility();
		$this->Customername->setVisibility();
		$this->Address1->setVisibility();
		$this->Address2->setVisibility();
		$this->Address3->setVisibility();
		$this->State->setVisibility();
		$this->Pincode->setVisibility();
		$this->Phone->setVisibility();
		$this->Fax->setVisibility();
		$this->_Email->setVisibility();
		$this->Ratetype->setVisibility();
		$this->Creationdate->setVisibility();
		$this->ContactPerson->setVisibility();
		$this->CPPhone->setVisibility();
		$this->id->Visible = FALSE;
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
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-update-form ew-horizontal";

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Try to load keys from list form
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		if (Post("action") !== NULL && Post("action") !== "") {

			// Get action
			$this->CurrentAction = Post("action");
			$this->loadFormValues(); // Get form values

			// Validate form
			if (!$this->validateForm()) {
				$this->CurrentAction = "show"; // Form error, reset action
				$this->setFailureMessage($FormError);
			}
		} else {
			$this->loadMultiUpdateValues(); // Load initial values to form
		}
		if (count($this->RecKeys) <= 0)
			$this->terminate("pharmacy_customerslist.php"); // No records selected, return to list
		if ($this->isUpdate()) {
				if ($this->updateRows()) { // Update Records based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
					$this->terminate($this->getReturnUrl()); // Return to caller
				} else {
					$this->restoreFormValues(); // Restore form values
				}
		}

		// Render row
		$this->RowType = ROWTYPE_EDIT; // Render edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	protected function loadMultiUpdateValues()
	{
		$this->CurrentFilter = $this->getFilterFromRecordKeys();

		// Load recordset
		if ($this->Recordset = $this->loadRecordset()) {
			$i = 1;
			while (!$this->Recordset->EOF) {
				if ($i == 1) {
					$this->Customercode->setDbValue($this->Recordset->fields('Customercode'));
					$this->Customername->setDbValue($this->Recordset->fields('Customername'));
					$this->Address1->setDbValue($this->Recordset->fields('Address1'));
					$this->Address2->setDbValue($this->Recordset->fields('Address2'));
					$this->Address3->setDbValue($this->Recordset->fields('Address3'));
					$this->State->setDbValue($this->Recordset->fields('State'));
					$this->Pincode->setDbValue($this->Recordset->fields('Pincode'));
					$this->Phone->setDbValue($this->Recordset->fields('Phone'));
					$this->Fax->setDbValue($this->Recordset->fields('Fax'));
					$this->_Email->setDbValue($this->Recordset->fields('Email'));
					$this->Ratetype->setDbValue($this->Recordset->fields('Ratetype'));
					$this->Creationdate->setDbValue($this->Recordset->fields('Creationdate'));
					$this->ContactPerson->setDbValue($this->Recordset->fields('ContactPerson'));
					$this->CPPhone->setDbValue($this->Recordset->fields('CPPhone'));
				} else {
					if (!CompareValue($this->Customercode->DbValue, $this->Recordset->fields('Customercode')))
						$this->Customercode->CurrentValue = NULL;
					if (!CompareValue($this->Customername->DbValue, $this->Recordset->fields('Customername')))
						$this->Customername->CurrentValue = NULL;
					if (!CompareValue($this->Address1->DbValue, $this->Recordset->fields('Address1')))
						$this->Address1->CurrentValue = NULL;
					if (!CompareValue($this->Address2->DbValue, $this->Recordset->fields('Address2')))
						$this->Address2->CurrentValue = NULL;
					if (!CompareValue($this->Address3->DbValue, $this->Recordset->fields('Address3')))
						$this->Address3->CurrentValue = NULL;
					if (!CompareValue($this->State->DbValue, $this->Recordset->fields('State')))
						$this->State->CurrentValue = NULL;
					if (!CompareValue($this->Pincode->DbValue, $this->Recordset->fields('Pincode')))
						$this->Pincode->CurrentValue = NULL;
					if (!CompareValue($this->Phone->DbValue, $this->Recordset->fields('Phone')))
						$this->Phone->CurrentValue = NULL;
					if (!CompareValue($this->Fax->DbValue, $this->Recordset->fields('Fax')))
						$this->Fax->CurrentValue = NULL;
					if (!CompareValue($this->_Email->DbValue, $this->Recordset->fields('Email')))
						$this->_Email->CurrentValue = NULL;
					if (!CompareValue($this->Ratetype->DbValue, $this->Recordset->fields('Ratetype')))
						$this->Ratetype->CurrentValue = NULL;
					if (!CompareValue($this->Creationdate->DbValue, $this->Recordset->fields('Creationdate')))
						$this->Creationdate->CurrentValue = NULL;
					if (!CompareValue($this->ContactPerson->DbValue, $this->Recordset->fields('ContactPerson')))
						$this->ContactPerson->CurrentValue = NULL;
					if (!CompareValue($this->CPPhone->DbValue, $this->Recordset->fields('CPPhone')))
						$this->CPPhone->CurrentValue = NULL;
				}
				$i++;
				$this->Recordset->moveNext();
			}
			$this->Recordset->close();
		}
	}

	// Set up key value
	protected function setupKeyValues($key)
	{
		$keyFld = $key;
		if (!is_numeric($keyFld))
			return FALSE;
		$this->id->OldValue = $keyFld;
		return TRUE;
	}

	// Update all selected rows
	protected function updateRows()
	{
		global $Language;
		$conn = $this->getConnection();
		$conn->beginTrans();

		// Get old recordset
		$this->CurrentFilter = $this->getFilterFromRecordKeys(FALSE);
		$sql = $this->getCurrentSql();
		$rsold = $conn->execute($sql);

		// Update all rows
		$key = "";
		foreach ($this->RecKeys as $reckey) {
			if ($this->setupKeyValues($reckey)) {
				$thisKey = $reckey;
				$this->SendEmail = FALSE; // Do not send email on update success
				$this->UpdateCount += 1; // Update record count for records being updated
				$updateRows = $this->editRow(); // Update this row
			} else {
				$updateRows = FALSE;
			}
			if (!$updateRows)
				break; // Update failed
			if ($key != "")
				$key .= ", ";
			$key .= $thisKey;
		}

		// Check if all rows updated
		if ($updateRows) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->execute($sql);
		} else {
			$conn->rollbackTrans(); // Rollback transaction
		}
		return $updateRows;
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

		// Check field name 'Customercode' first before field var 'x_Customercode'
		$val = $CurrentForm->hasValue("Customercode") ? $CurrentForm->getValue("Customercode") : $CurrentForm->getValue("x_Customercode");
		if (!$this->Customercode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Customercode->Visible = FALSE; // Disable update for API request
			else
				$this->Customercode->setFormValue($val);
		}
		$this->Customercode->MultiUpdate = $CurrentForm->getValue("u_Customercode");

		// Check field name 'Customername' first before field var 'x_Customername'
		$val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
		if (!$this->Customername->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Customername->Visible = FALSE; // Disable update for API request
			else
				$this->Customername->setFormValue($val);
		}
		$this->Customername->MultiUpdate = $CurrentForm->getValue("u_Customername");

		// Check field name 'Address1' first before field var 'x_Address1'
		$val = $CurrentForm->hasValue("Address1") ? $CurrentForm->getValue("Address1") : $CurrentForm->getValue("x_Address1");
		if (!$this->Address1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Address1->Visible = FALSE; // Disable update for API request
			else
				$this->Address1->setFormValue($val);
		}
		$this->Address1->MultiUpdate = $CurrentForm->getValue("u_Address1");

		// Check field name 'Address2' first before field var 'x_Address2'
		$val = $CurrentForm->hasValue("Address2") ? $CurrentForm->getValue("Address2") : $CurrentForm->getValue("x_Address2");
		if (!$this->Address2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Address2->Visible = FALSE; // Disable update for API request
			else
				$this->Address2->setFormValue($val);
		}
		$this->Address2->MultiUpdate = $CurrentForm->getValue("u_Address2");

		// Check field name 'Address3' first before field var 'x_Address3'
		$val = $CurrentForm->hasValue("Address3") ? $CurrentForm->getValue("Address3") : $CurrentForm->getValue("x_Address3");
		if (!$this->Address3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Address3->Visible = FALSE; // Disable update for API request
			else
				$this->Address3->setFormValue($val);
		}
		$this->Address3->MultiUpdate = $CurrentForm->getValue("u_Address3");

		// Check field name 'State' first before field var 'x_State'
		$val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
		if (!$this->State->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->State->Visible = FALSE; // Disable update for API request
			else
				$this->State->setFormValue($val);
		}
		$this->State->MultiUpdate = $CurrentForm->getValue("u_State");

		// Check field name 'Pincode' first before field var 'x_Pincode'
		$val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
		if (!$this->Pincode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Pincode->Visible = FALSE; // Disable update for API request
			else
				$this->Pincode->setFormValue($val);
		}
		$this->Pincode->MultiUpdate = $CurrentForm->getValue("u_Pincode");

		// Check field name 'Phone' first before field var 'x_Phone'
		$val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
		if (!$this->Phone->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Phone->Visible = FALSE; // Disable update for API request
			else
				$this->Phone->setFormValue($val);
		}
		$this->Phone->MultiUpdate = $CurrentForm->getValue("u_Phone");

		// Check field name 'Fax' first before field var 'x_Fax'
		$val = $CurrentForm->hasValue("Fax") ? $CurrentForm->getValue("Fax") : $CurrentForm->getValue("x_Fax");
		if (!$this->Fax->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Fax->Visible = FALSE; // Disable update for API request
			else
				$this->Fax->setFormValue($val);
		}
		$this->Fax->MultiUpdate = $CurrentForm->getValue("u_Fax");

		// Check field name 'Email' first before field var 'x__Email'
		$val = $CurrentForm->hasValue("Email") ? $CurrentForm->getValue("Email") : $CurrentForm->getValue("x__Email");
		if (!$this->_Email->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->_Email->Visible = FALSE; // Disable update for API request
			else
				$this->_Email->setFormValue($val);
		}
		$this->_Email->MultiUpdate = $CurrentForm->getValue("u__Email");

		// Check field name 'Ratetype' first before field var 'x_Ratetype'
		$val = $CurrentForm->hasValue("Ratetype") ? $CurrentForm->getValue("Ratetype") : $CurrentForm->getValue("x_Ratetype");
		if (!$this->Ratetype->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Ratetype->Visible = FALSE; // Disable update for API request
			else
				$this->Ratetype->setFormValue($val);
		}
		$this->Ratetype->MultiUpdate = $CurrentForm->getValue("u_Ratetype");

		// Check field name 'Creationdate' first before field var 'x_Creationdate'
		$val = $CurrentForm->hasValue("Creationdate") ? $CurrentForm->getValue("Creationdate") : $CurrentForm->getValue("x_Creationdate");
		if (!$this->Creationdate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Creationdate->Visible = FALSE; // Disable update for API request
			else
				$this->Creationdate->setFormValue($val);
			$this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
		}
		$this->Creationdate->MultiUpdate = $CurrentForm->getValue("u_Creationdate");

		// Check field name 'ContactPerson' first before field var 'x_ContactPerson'
		$val = $CurrentForm->hasValue("ContactPerson") ? $CurrentForm->getValue("ContactPerson") : $CurrentForm->getValue("x_ContactPerson");
		if (!$this->ContactPerson->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ContactPerson->Visible = FALSE; // Disable update for API request
			else
				$this->ContactPerson->setFormValue($val);
		}
		$this->ContactPerson->MultiUpdate = $CurrentForm->getValue("u_ContactPerson");

		// Check field name 'CPPhone' first before field var 'x_CPPhone'
		$val = $CurrentForm->hasValue("CPPhone") ? $CurrentForm->getValue("CPPhone") : $CurrentForm->getValue("x_CPPhone");
		if (!$this->CPPhone->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CPPhone->Visible = FALSE; // Disable update for API request
			else
				$this->CPPhone->setFormValue($val);
		}
		$this->CPPhone->MultiUpdate = $CurrentForm->getValue("u_CPPhone");

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Customercode->CurrentValue = $this->Customercode->FormValue;
		$this->Customername->CurrentValue = $this->Customername->FormValue;
		$this->Address1->CurrentValue = $this->Address1->FormValue;
		$this->Address2->CurrentValue = $this->Address2->FormValue;
		$this->Address3->CurrentValue = $this->Address3->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Pincode->CurrentValue = $this->Pincode->FormValue;
		$this->Phone->CurrentValue = $this->Phone->FormValue;
		$this->Fax->CurrentValue = $this->Fax->FormValue;
		$this->_Email->CurrentValue = $this->_Email->FormValue;
		$this->Ratetype->CurrentValue = $this->Ratetype->FormValue;
		$this->Creationdate->CurrentValue = $this->Creationdate->FormValue;
		$this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
		$this->ContactPerson->CurrentValue = $this->ContactPerson->FormValue;
		$this->CPPhone->CurrentValue = $this->CPPhone->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->Customercode->setDbValue($row['Customercode']);
		$this->Customername->setDbValue($row['Customername']);
		$this->Address1->setDbValue($row['Address1']);
		$this->Address2->setDbValue($row['Address2']);
		$this->Address3->setDbValue($row['Address3']);
		$this->State->setDbValue($row['State']);
		$this->Pincode->setDbValue($row['Pincode']);
		$this->Phone->setDbValue($row['Phone']);
		$this->Fax->setDbValue($row['Fax']);
		$this->_Email->setDbValue($row['Email']);
		$this->Ratetype->setDbValue($row['Ratetype']);
		$this->Creationdate->setDbValue($row['Creationdate']);
		$this->ContactPerson->setDbValue($row['ContactPerson']);
		$this->CPPhone->setDbValue($row['CPPhone']);
		$this->id->setDbValue($row['id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Customercode'] = NULL;
		$row['Customername'] = NULL;
		$row['Address1'] = NULL;
		$row['Address2'] = NULL;
		$row['Address3'] = NULL;
		$row['State'] = NULL;
		$row['Pincode'] = NULL;
		$row['Phone'] = NULL;
		$row['Fax'] = NULL;
		$row['Email'] = NULL;
		$row['Ratetype'] = NULL;
		$row['Creationdate'] = NULL;
		$row['ContactPerson'] = NULL;
		$row['CPPhone'] = NULL;
		$row['id'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// Customercode
		// Customername
		// Address1
		// Address2
		// Address3
		// State
		// Pincode
		// Phone
		// Fax
		// Email
		// Ratetype
		// Creationdate
		// ContactPerson
		// CPPhone
		// id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Customercode
			$this->Customercode->ViewValue = $this->Customercode->CurrentValue;
			$this->Customercode->ViewValue = FormatNumber($this->Customercode->ViewValue, 0, -2, -2, -2);
			$this->Customercode->ViewCustomAttributes = "";

			// Customername
			$this->Customername->ViewValue = $this->Customername->CurrentValue;
			$this->Customername->ViewCustomAttributes = "";

			// Address1
			$this->Address1->ViewValue = $this->Address1->CurrentValue;
			$this->Address1->ViewCustomAttributes = "";

			// Address2
			$this->Address2->ViewValue = $this->Address2->CurrentValue;
			$this->Address2->ViewCustomAttributes = "";

			// Address3
			$this->Address3->ViewValue = $this->Address3->CurrentValue;
			$this->Address3->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Pincode
			$this->Pincode->ViewValue = $this->Pincode->CurrentValue;
			$this->Pincode->ViewCustomAttributes = "";

			// Phone
			$this->Phone->ViewValue = $this->Phone->CurrentValue;
			$this->Phone->ViewCustomAttributes = "";

			// Fax
			$this->Fax->ViewValue = $this->Fax->CurrentValue;
			$this->Fax->ViewCustomAttributes = "";

			// Email
			$this->_Email->ViewValue = $this->_Email->CurrentValue;
			$this->_Email->ViewCustomAttributes = "";

			// Ratetype
			$this->Ratetype->ViewValue = $this->Ratetype->CurrentValue;
			$this->Ratetype->ViewCustomAttributes = "";

			// Creationdate
			$this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
			$this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
			$this->Creationdate->ViewCustomAttributes = "";

			// ContactPerson
			$this->ContactPerson->ViewValue = $this->ContactPerson->CurrentValue;
			$this->ContactPerson->ViewCustomAttributes = "";

			// CPPhone
			$this->CPPhone->ViewValue = $this->CPPhone->CurrentValue;
			$this->CPPhone->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Customercode
			$this->Customercode->LinkCustomAttributes = "";
			$this->Customercode->HrefValue = "";
			$this->Customercode->TooltipValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";
			$this->Customername->TooltipValue = "";

			// Address1
			$this->Address1->LinkCustomAttributes = "";
			$this->Address1->HrefValue = "";
			$this->Address1->TooltipValue = "";

			// Address2
			$this->Address2->LinkCustomAttributes = "";
			$this->Address2->HrefValue = "";
			$this->Address2->TooltipValue = "";

			// Address3
			$this->Address3->LinkCustomAttributes = "";
			$this->Address3->HrefValue = "";
			$this->Address3->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";
			$this->Pincode->TooltipValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";
			$this->Phone->TooltipValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";
			$this->Fax->TooltipValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";
			$this->_Email->TooltipValue = "";

			// Ratetype
			$this->Ratetype->LinkCustomAttributes = "";
			$this->Ratetype->HrefValue = "";
			$this->Ratetype->TooltipValue = "";

			// Creationdate
			$this->Creationdate->LinkCustomAttributes = "";
			$this->Creationdate->HrefValue = "";
			$this->Creationdate->TooltipValue = "";

			// ContactPerson
			$this->ContactPerson->LinkCustomAttributes = "";
			$this->ContactPerson->HrefValue = "";
			$this->ContactPerson->TooltipValue = "";

			// CPPhone
			$this->CPPhone->LinkCustomAttributes = "";
			$this->CPPhone->HrefValue = "";
			$this->CPPhone->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Customercode
			$this->Customercode->EditAttrs["class"] = "form-control";
			$this->Customercode->EditCustomAttributes = "";
			$this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
			$this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

			// Customername
			$this->Customername->EditAttrs["class"] = "form-control";
			$this->Customername->EditCustomAttributes = "";
			$this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
			$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

			// Address1
			$this->Address1->EditAttrs["class"] = "form-control";
			$this->Address1->EditCustomAttributes = "";
			if (!$this->Address1->Raw)
				$this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
			$this->Address1->EditValue = HtmlEncode($this->Address1->CurrentValue);
			$this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

			// Address2
			$this->Address2->EditAttrs["class"] = "form-control";
			$this->Address2->EditCustomAttributes = "";
			if (!$this->Address2->Raw)
				$this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
			$this->Address2->EditValue = HtmlEncode($this->Address2->CurrentValue);
			$this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

			// Address3
			$this->Address3->EditAttrs["class"] = "form-control";
			$this->Address3->EditCustomAttributes = "";
			if (!$this->Address3->Raw)
				$this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
			$this->Address3->EditValue = HtmlEncode($this->Address3->CurrentValue);
			$this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			if (!$this->State->Raw)
				$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
			$this->State->EditValue = HtmlEncode($this->State->CurrentValue);
			$this->State->PlaceHolder = RemoveHtml($this->State->caption());

			// Pincode
			$this->Pincode->EditAttrs["class"] = "form-control";
			$this->Pincode->EditCustomAttributes = "";
			if (!$this->Pincode->Raw)
				$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
			$this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
			$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

			// Phone
			$this->Phone->EditAttrs["class"] = "form-control";
			$this->Phone->EditCustomAttributes = "";
			if (!$this->Phone->Raw)
				$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
			$this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
			$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

			// Fax
			$this->Fax->EditAttrs["class"] = "form-control";
			$this->Fax->EditCustomAttributes = "";
			if (!$this->Fax->Raw)
				$this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
			$this->Fax->EditValue = HtmlEncode($this->Fax->CurrentValue);
			$this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

			// Email
			$this->_Email->EditAttrs["class"] = "form-control";
			$this->_Email->EditCustomAttributes = "";
			if (!$this->_Email->Raw)
				$this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
			$this->_Email->EditValue = HtmlEncode($this->_Email->CurrentValue);
			$this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

			// Ratetype
			$this->Ratetype->EditAttrs["class"] = "form-control";
			$this->Ratetype->EditCustomAttributes = "";
			if (!$this->Ratetype->Raw)
				$this->Ratetype->CurrentValue = HtmlDecode($this->Ratetype->CurrentValue);
			$this->Ratetype->EditValue = HtmlEncode($this->Ratetype->CurrentValue);
			$this->Ratetype->PlaceHolder = RemoveHtml($this->Ratetype->caption());

			// Creationdate
			$this->Creationdate->EditAttrs["class"] = "form-control";
			$this->Creationdate->EditCustomAttributes = "";
			$this->Creationdate->EditValue = HtmlEncode(FormatDateTime($this->Creationdate->CurrentValue, 8));
			$this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

			// ContactPerson
			$this->ContactPerson->EditAttrs["class"] = "form-control";
			$this->ContactPerson->EditCustomAttributes = "";
			if (!$this->ContactPerson->Raw)
				$this->ContactPerson->CurrentValue = HtmlDecode($this->ContactPerson->CurrentValue);
			$this->ContactPerson->EditValue = HtmlEncode($this->ContactPerson->CurrentValue);
			$this->ContactPerson->PlaceHolder = RemoveHtml($this->ContactPerson->caption());

			// CPPhone
			$this->CPPhone->EditAttrs["class"] = "form-control";
			$this->CPPhone->EditCustomAttributes = "";
			if (!$this->CPPhone->Raw)
				$this->CPPhone->CurrentValue = HtmlDecode($this->CPPhone->CurrentValue);
			$this->CPPhone->EditValue = HtmlEncode($this->CPPhone->CurrentValue);
			$this->CPPhone->PlaceHolder = RemoveHtml($this->CPPhone->caption());

			// Edit refer script
			// Customercode

			$this->Customercode->LinkCustomAttributes = "";
			$this->Customercode->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

			// Address1
			$this->Address1->LinkCustomAttributes = "";
			$this->Address1->HrefValue = "";

			// Address2
			$this->Address2->LinkCustomAttributes = "";
			$this->Address2->HrefValue = "";

			// Address3
			$this->Address3->LinkCustomAttributes = "";
			$this->Address3->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";

			// Ratetype
			$this->Ratetype->LinkCustomAttributes = "";
			$this->Ratetype->HrefValue = "";

			// Creationdate
			$this->Creationdate->LinkCustomAttributes = "";
			$this->Creationdate->HrefValue = "";

			// ContactPerson
			$this->ContactPerson->LinkCustomAttributes = "";
			$this->ContactPerson->HrefValue = "";

			// CPPhone
			$this->CPPhone->LinkCustomAttributes = "";
			$this->CPPhone->HrefValue = "";
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
		$updateCnt = 0;
		if ($this->Customercode->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Customername->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Address1->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Address2->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Address3->MultiUpdate == "1")
			$updateCnt++;
		if ($this->State->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Pincode->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Phone->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Fax->MultiUpdate == "1")
			$updateCnt++;
		if ($this->_Email->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Ratetype->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Creationdate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ContactPerson->MultiUpdate == "1")
			$updateCnt++;
		if ($this->CPPhone->MultiUpdate == "1")
			$updateCnt++;
		if ($updateCnt == 0) {
			$FormError = $Language->phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->Customercode->Required) {
			if ($this->Customercode->MultiUpdate != "" && !$this->Customercode->IsDetailKey && $this->Customercode->FormValue != NULL && $this->Customercode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
			}
		}
		if ($this->Customercode->MultiUpdate != "") {
			if (!CheckInteger($this->Customercode->FormValue)) {
				AddMessage($FormError, $this->Customercode->errorMessage());
			}
		}
		if ($this->Customername->Required) {
			if ($this->Customername->MultiUpdate != "" && !$this->Customername->IsDetailKey && $this->Customername->FormValue != NULL && $this->Customername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
			}
		}
		if ($this->Address1->Required) {
			if ($this->Address1->MultiUpdate != "" && !$this->Address1->IsDetailKey && $this->Address1->FormValue != NULL && $this->Address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address1->caption(), $this->Address1->RequiredErrorMessage));
			}
		}
		if ($this->Address2->Required) {
			if ($this->Address2->MultiUpdate != "" && !$this->Address2->IsDetailKey && $this->Address2->FormValue != NULL && $this->Address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address2->caption(), $this->Address2->RequiredErrorMessage));
			}
		}
		if ($this->Address3->Required) {
			if ($this->Address3->MultiUpdate != "" && !$this->Address3->IsDetailKey && $this->Address3->FormValue != NULL && $this->Address3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address3->caption(), $this->Address3->RequiredErrorMessage));
			}
		}
		if ($this->State->Required) {
			if ($this->State->MultiUpdate != "" && !$this->State->IsDetailKey && $this->State->FormValue != NULL && $this->State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
			}
		}
		if ($this->Pincode->Required) {
			if ($this->Pincode->MultiUpdate != "" && !$this->Pincode->IsDetailKey && $this->Pincode->FormValue != NULL && $this->Pincode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
			}
		}
		if ($this->Phone->Required) {
			if ($this->Phone->MultiUpdate != "" && !$this->Phone->IsDetailKey && $this->Phone->FormValue != NULL && $this->Phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
			}
		}
		if ($this->Fax->Required) {
			if ($this->Fax->MultiUpdate != "" && !$this->Fax->IsDetailKey && $this->Fax->FormValue != NULL && $this->Fax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fax->caption(), $this->Fax->RequiredErrorMessage));
			}
		}
		if ($this->_Email->Required) {
			if ($this->_Email->MultiUpdate != "" && !$this->_Email->IsDetailKey && $this->_Email->FormValue != NULL && $this->_Email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Email->caption(), $this->_Email->RequiredErrorMessage));
			}
		}
		if ($this->Ratetype->Required) {
			if ($this->Ratetype->MultiUpdate != "" && !$this->Ratetype->IsDetailKey && $this->Ratetype->FormValue != NULL && $this->Ratetype->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Ratetype->caption(), $this->Ratetype->RequiredErrorMessage));
			}
		}
		if ($this->Creationdate->Required) {
			if ($this->Creationdate->MultiUpdate != "" && !$this->Creationdate->IsDetailKey && $this->Creationdate->FormValue != NULL && $this->Creationdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Creationdate->caption(), $this->Creationdate->RequiredErrorMessage));
			}
		}
		if ($this->Creationdate->MultiUpdate != "") {
			if (!CheckDate($this->Creationdate->FormValue)) {
				AddMessage($FormError, $this->Creationdate->errorMessage());
			}
		}
		if ($this->ContactPerson->Required) {
			if ($this->ContactPerson->MultiUpdate != "" && !$this->ContactPerson->IsDetailKey && $this->ContactPerson->FormValue != NULL && $this->ContactPerson->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ContactPerson->caption(), $this->ContactPerson->RequiredErrorMessage));
			}
		}
		if ($this->CPPhone->Required) {
			if ($this->CPPhone->MultiUpdate != "" && !$this->CPPhone->IsDetailKey && $this->CPPhone->FormValue != NULL && $this->CPPhone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CPPhone->caption(), $this->CPPhone->RequiredErrorMessage));
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

			// Customercode
			$this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, 0, $this->Customercode->ReadOnly || $this->Customercode->MultiUpdate != "1");

			// Customername
			$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, $this->Customername->ReadOnly || $this->Customername->MultiUpdate != "1");

			// Address1
			$this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, NULL, $this->Address1->ReadOnly || $this->Address1->MultiUpdate != "1");

			// Address2
			$this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, NULL, $this->Address2->ReadOnly || $this->Address2->MultiUpdate != "1");

			// Address3
			$this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, NULL, $this->Address3->ReadOnly || $this->Address3->MultiUpdate != "1");

			// State
			$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, $this->State->ReadOnly || $this->State->MultiUpdate != "1");

			// Pincode
			$this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, NULL, $this->Pincode->ReadOnly || $this->Pincode->MultiUpdate != "1");

			// Phone
			$this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, NULL, $this->Phone->ReadOnly || $this->Phone->MultiUpdate != "1");

			// Fax
			$this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, NULL, $this->Fax->ReadOnly || $this->Fax->MultiUpdate != "1");

			// Email
			$this->_Email->setDbValueDef($rsnew, $this->_Email->CurrentValue, NULL, $this->_Email->ReadOnly || $this->_Email->MultiUpdate != "1");

			// Ratetype
			$this->Ratetype->setDbValueDef($rsnew, $this->Ratetype->CurrentValue, NULL, $this->Ratetype->ReadOnly || $this->Ratetype->MultiUpdate != "1");

			// Creationdate
			$this->Creationdate->setDbValueDef($rsnew, UnFormatDateTime($this->Creationdate->CurrentValue, 0), NULL, $this->Creationdate->ReadOnly || $this->Creationdate->MultiUpdate != "1");

			// ContactPerson
			$this->ContactPerson->setDbValueDef($rsnew, $this->ContactPerson->CurrentValue, NULL, $this->ContactPerson->ReadOnly || $this->ContactPerson->MultiUpdate != "1");

			// CPPhone
			$this->CPPhone->setDbValueDef($rsnew, $this->CPPhone->CurrentValue, NULL, $this->CPPhone->ReadOnly || $this->CPPhone->MultiUpdate != "1");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_customerslist.php"), "", $this->TableVar, TRUE);
		$pageId = "update";
		$Breadcrumb->add("update", $pageId, $url);
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
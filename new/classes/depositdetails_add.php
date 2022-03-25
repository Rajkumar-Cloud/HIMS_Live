<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class depositdetails_add extends depositdetails
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'depositdetails';

	// Page object name
	public $PageObjName = "depositdetails_add";

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

		// Table object (depositdetails)
		if (!isset($GLOBALS["depositdetails"]) || get_class($GLOBALS["depositdetails"]) == PROJECT_NAMESPACE . "depositdetails") {
			$GLOBALS["depositdetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["depositdetails"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'depositdetails');

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
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $depositdetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($depositdetails);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
					if ($pageName == "depositdetailsview.php")
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
					$this->terminate(GetUrl("depositdetailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->DepositDate->setVisibility();
		$this->DepositToBankSelect->setVisibility();
		$this->DepositToBank->setVisibility();
		$this->TransferToSelect->setVisibility();
		$this->TransferTo->setVisibility();
		$this->OpeningBalance->setVisibility();
		$this->Other->setVisibility();
		$this->TotalCash->setVisibility();
		$this->Cheque->setVisibility();
		$this->Card->setVisibility();
		$this->NEFTRTGS->setVisibility();
		$this->TotalTransferDepositAmount->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
		$this->CreatedUserName->setVisibility();
		$this->ModifiedUserName->setVisibility();
		$this->A2000Count->setVisibility();
		$this->A2000Amount->setVisibility();
		$this->A1000Count->setVisibility();
		$this->A1000Amount->setVisibility();
		$this->A500Count->setVisibility();
		$this->A500Amount->setVisibility();
		$this->A200Count->setVisibility();
		$this->A200Amount->setVisibility();
		$this->A100Count->setVisibility();
		$this->A100Amount->setVisibility();
		$this->A50Count->setVisibility();
		$this->A50Amount->setVisibility();
		$this->A20Count->setVisibility();
		$this->A20Amount->setVisibility();
		$this->A10Count->setVisibility();
		$this->A10Amount->setVisibility();
		$this->BalanceAmount->setVisibility();
		$this->CashCollected->setVisibility();
		$this->RTGS->setVisibility();
		$this->PAYTM->setVisibility();
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
		$this->setupLookupOptions($this->DepositToBank);
		$this->setupLookupOptions($this->TransferTo);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("depositdetailslist.php");
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
					$this->terminate("depositdetailslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "depositdetailslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "depositdetailsview.php")
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
		$this->DepositDate->CurrentValue = NULL;
		$this->DepositDate->OldValue = $this->DepositDate->CurrentValue;
		$this->DepositToBankSelect->CurrentValue = NULL;
		$this->DepositToBankSelect->OldValue = $this->DepositToBankSelect->CurrentValue;
		$this->DepositToBank->CurrentValue = NULL;
		$this->DepositToBank->OldValue = $this->DepositToBank->CurrentValue;
		$this->TransferToSelect->CurrentValue = NULL;
		$this->TransferToSelect->OldValue = $this->TransferToSelect->CurrentValue;
		$this->TransferTo->CurrentValue = NULL;
		$this->TransferTo->OldValue = $this->TransferTo->CurrentValue;
		$this->OpeningBalance->CurrentValue = NULL;
		$this->OpeningBalance->OldValue = $this->OpeningBalance->CurrentValue;
		$this->Other->CurrentValue = NULL;
		$this->Other->OldValue = $this->Other->CurrentValue;
		$this->TotalCash->CurrentValue = NULL;
		$this->TotalCash->OldValue = $this->TotalCash->CurrentValue;
		$this->Cheque->CurrentValue = NULL;
		$this->Cheque->OldValue = $this->Cheque->CurrentValue;
		$this->Card->CurrentValue = NULL;
		$this->Card->OldValue = $this->Card->CurrentValue;
		$this->NEFTRTGS->CurrentValue = NULL;
		$this->NEFTRTGS->OldValue = $this->NEFTRTGS->CurrentValue;
		$this->TotalTransferDepositAmount->CurrentValue = NULL;
		$this->TotalTransferDepositAmount->OldValue = $this->TotalTransferDepositAmount->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->CreatedDateTime->CurrentValue = NULL;
		$this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedDateTime->CurrentValue = NULL;
		$this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
		$this->CreatedUserName->CurrentValue = NULL;
		$this->CreatedUserName->OldValue = $this->CreatedUserName->CurrentValue;
		$this->ModifiedUserName->CurrentValue = NULL;
		$this->ModifiedUserName->OldValue = $this->ModifiedUserName->CurrentValue;
		$this->A2000Count->CurrentValue = NULL;
		$this->A2000Count->OldValue = $this->A2000Count->CurrentValue;
		$this->A2000Amount->CurrentValue = NULL;
		$this->A2000Amount->OldValue = $this->A2000Amount->CurrentValue;
		$this->A1000Count->CurrentValue = NULL;
		$this->A1000Count->OldValue = $this->A1000Count->CurrentValue;
		$this->A1000Amount->CurrentValue = NULL;
		$this->A1000Amount->OldValue = $this->A1000Amount->CurrentValue;
		$this->A500Count->CurrentValue = NULL;
		$this->A500Count->OldValue = $this->A500Count->CurrentValue;
		$this->A500Amount->CurrentValue = NULL;
		$this->A500Amount->OldValue = $this->A500Amount->CurrentValue;
		$this->A200Count->CurrentValue = NULL;
		$this->A200Count->OldValue = $this->A200Count->CurrentValue;
		$this->A200Amount->CurrentValue = NULL;
		$this->A200Amount->OldValue = $this->A200Amount->CurrentValue;
		$this->A100Count->CurrentValue = NULL;
		$this->A100Count->OldValue = $this->A100Count->CurrentValue;
		$this->A100Amount->CurrentValue = NULL;
		$this->A100Amount->OldValue = $this->A100Amount->CurrentValue;
		$this->A50Count->CurrentValue = NULL;
		$this->A50Count->OldValue = $this->A50Count->CurrentValue;
		$this->A50Amount->CurrentValue = NULL;
		$this->A50Amount->OldValue = $this->A50Amount->CurrentValue;
		$this->A20Count->CurrentValue = NULL;
		$this->A20Count->OldValue = $this->A20Count->CurrentValue;
		$this->A20Amount->CurrentValue = NULL;
		$this->A20Amount->OldValue = $this->A20Amount->CurrentValue;
		$this->A10Count->CurrentValue = NULL;
		$this->A10Count->OldValue = $this->A10Count->CurrentValue;
		$this->A10Amount->CurrentValue = NULL;
		$this->A10Amount->OldValue = $this->A10Amount->CurrentValue;
		$this->BalanceAmount->CurrentValue = NULL;
		$this->BalanceAmount->OldValue = $this->BalanceAmount->CurrentValue;
		$this->CashCollected->CurrentValue = NULL;
		$this->CashCollected->OldValue = $this->CashCollected->CurrentValue;
		$this->RTGS->CurrentValue = NULL;
		$this->RTGS->OldValue = $this->RTGS->CurrentValue;
		$this->PAYTM->CurrentValue = NULL;
		$this->PAYTM->OldValue = $this->PAYTM->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'DepositDate' first before field var 'x_DepositDate'
		$val = $CurrentForm->hasValue("DepositDate") ? $CurrentForm->getValue("DepositDate") : $CurrentForm->getValue("x_DepositDate");
		if (!$this->DepositDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DepositDate->Visible = FALSE; // Disable update for API request
			else
				$this->DepositDate->setFormValue($val);
			$this->DepositDate->CurrentValue = UnFormatDateTime($this->DepositDate->CurrentValue, 7);
		}

		// Check field name 'DepositToBankSelect' first before field var 'x_DepositToBankSelect'
		$val = $CurrentForm->hasValue("DepositToBankSelect") ? $CurrentForm->getValue("DepositToBankSelect") : $CurrentForm->getValue("x_DepositToBankSelect");
		if (!$this->DepositToBankSelect->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DepositToBankSelect->Visible = FALSE; // Disable update for API request
			else
				$this->DepositToBankSelect->setFormValue($val);
		}

		// Check field name 'DepositToBank' first before field var 'x_DepositToBank'
		$val = $CurrentForm->hasValue("DepositToBank") ? $CurrentForm->getValue("DepositToBank") : $CurrentForm->getValue("x_DepositToBank");
		if (!$this->DepositToBank->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DepositToBank->Visible = FALSE; // Disable update for API request
			else
				$this->DepositToBank->setFormValue($val);
		}

		// Check field name 'TransferToSelect' first before field var 'x_TransferToSelect'
		$val = $CurrentForm->hasValue("TransferToSelect") ? $CurrentForm->getValue("TransferToSelect") : $CurrentForm->getValue("x_TransferToSelect");
		if (!$this->TransferToSelect->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TransferToSelect->Visible = FALSE; // Disable update for API request
			else
				$this->TransferToSelect->setFormValue($val);
		}

		// Check field name 'TransferTo' first before field var 'x_TransferTo'
		$val = $CurrentForm->hasValue("TransferTo") ? $CurrentForm->getValue("TransferTo") : $CurrentForm->getValue("x_TransferTo");
		if (!$this->TransferTo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TransferTo->Visible = FALSE; // Disable update for API request
			else
				$this->TransferTo->setFormValue($val);
		}

		// Check field name 'OpeningBalance' first before field var 'x_OpeningBalance'
		$val = $CurrentForm->hasValue("OpeningBalance") ? $CurrentForm->getValue("OpeningBalance") : $CurrentForm->getValue("x_OpeningBalance");
		if (!$this->OpeningBalance->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OpeningBalance->Visible = FALSE; // Disable update for API request
			else
				$this->OpeningBalance->setFormValue($val);
		}

		// Check field name 'Other' first before field var 'x_Other'
		$val = $CurrentForm->hasValue("Other") ? $CurrentForm->getValue("Other") : $CurrentForm->getValue("x_Other");
		if (!$this->Other->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Other->Visible = FALSE; // Disable update for API request
			else
				$this->Other->setFormValue($val);
		}

		// Check field name 'TotalCash' first before field var 'x_TotalCash'
		$val = $CurrentForm->hasValue("TotalCash") ? $CurrentForm->getValue("TotalCash") : $CurrentForm->getValue("x_TotalCash");
		if (!$this->TotalCash->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TotalCash->Visible = FALSE; // Disable update for API request
			else
				$this->TotalCash->setFormValue($val);
		}

		// Check field name 'Cheque' first before field var 'x_Cheque'
		$val = $CurrentForm->hasValue("Cheque") ? $CurrentForm->getValue("Cheque") : $CurrentForm->getValue("x_Cheque");
		if (!$this->Cheque->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Cheque->Visible = FALSE; // Disable update for API request
			else
				$this->Cheque->setFormValue($val);
		}

		// Check field name 'Card' first before field var 'x_Card'
		$val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
		if (!$this->Card->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Card->Visible = FALSE; // Disable update for API request
			else
				$this->Card->setFormValue($val);
		}

		// Check field name 'NEFTRTGS' first before field var 'x_NEFTRTGS'
		$val = $CurrentForm->hasValue("NEFTRTGS") ? $CurrentForm->getValue("NEFTRTGS") : $CurrentForm->getValue("x_NEFTRTGS");
		if (!$this->NEFTRTGS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NEFTRTGS->Visible = FALSE; // Disable update for API request
			else
				$this->NEFTRTGS->setFormValue($val);
		}

		// Check field name 'TotalTransferDepositAmount' first before field var 'x_TotalTransferDepositAmount'
		$val = $CurrentForm->hasValue("TotalTransferDepositAmount") ? $CurrentForm->getValue("TotalTransferDepositAmount") : $CurrentForm->getValue("x_TotalTransferDepositAmount");
		if (!$this->TotalTransferDepositAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TotalTransferDepositAmount->Visible = FALSE; // Disable update for API request
			else
				$this->TotalTransferDepositAmount->setFormValue($val);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
		$val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
		if (!$this->CreatedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDateTime->setFormValue($val);
			$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
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
			$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		}

		// Check field name 'CreatedUserName' first before field var 'x_CreatedUserName'
		$val = $CurrentForm->hasValue("CreatedUserName") ? $CurrentForm->getValue("CreatedUserName") : $CurrentForm->getValue("x_CreatedUserName");
		if (!$this->CreatedUserName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedUserName->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedUserName->setFormValue($val);
		}

		// Check field name 'ModifiedUserName' first before field var 'x_ModifiedUserName'
		$val = $CurrentForm->hasValue("ModifiedUserName") ? $CurrentForm->getValue("ModifiedUserName") : $CurrentForm->getValue("x_ModifiedUserName");
		if (!$this->ModifiedUserName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedUserName->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedUserName->setFormValue($val);
		}

		// Check field name 'A2000Count' first before field var 'x_A2000Count'
		$val = $CurrentForm->hasValue("A2000Count") ? $CurrentForm->getValue("A2000Count") : $CurrentForm->getValue("x_A2000Count");
		if (!$this->A2000Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A2000Count->Visible = FALSE; // Disable update for API request
			else
				$this->A2000Count->setFormValue($val);
		}

		// Check field name 'A2000Amount' first before field var 'x_A2000Amount'
		$val = $CurrentForm->hasValue("A2000Amount") ? $CurrentForm->getValue("A2000Amount") : $CurrentForm->getValue("x_A2000Amount");
		if (!$this->A2000Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A2000Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A2000Amount->setFormValue($val);
		}

		// Check field name 'A1000Count' first before field var 'x_A1000Count'
		$val = $CurrentForm->hasValue("A1000Count") ? $CurrentForm->getValue("A1000Count") : $CurrentForm->getValue("x_A1000Count");
		if (!$this->A1000Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A1000Count->Visible = FALSE; // Disable update for API request
			else
				$this->A1000Count->setFormValue($val);
		}

		// Check field name 'A1000Amount' first before field var 'x_A1000Amount'
		$val = $CurrentForm->hasValue("A1000Amount") ? $CurrentForm->getValue("A1000Amount") : $CurrentForm->getValue("x_A1000Amount");
		if (!$this->A1000Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A1000Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A1000Amount->setFormValue($val);
		}

		// Check field name 'A500Count' first before field var 'x_A500Count'
		$val = $CurrentForm->hasValue("A500Count") ? $CurrentForm->getValue("A500Count") : $CurrentForm->getValue("x_A500Count");
		if (!$this->A500Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A500Count->Visible = FALSE; // Disable update for API request
			else
				$this->A500Count->setFormValue($val);
		}

		// Check field name 'A500Amount' first before field var 'x_A500Amount'
		$val = $CurrentForm->hasValue("A500Amount") ? $CurrentForm->getValue("A500Amount") : $CurrentForm->getValue("x_A500Amount");
		if (!$this->A500Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A500Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A500Amount->setFormValue($val);
		}

		// Check field name 'A200Count' first before field var 'x_A200Count'
		$val = $CurrentForm->hasValue("A200Count") ? $CurrentForm->getValue("A200Count") : $CurrentForm->getValue("x_A200Count");
		if (!$this->A200Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A200Count->Visible = FALSE; // Disable update for API request
			else
				$this->A200Count->setFormValue($val);
		}

		// Check field name 'A200Amount' first before field var 'x_A200Amount'
		$val = $CurrentForm->hasValue("A200Amount") ? $CurrentForm->getValue("A200Amount") : $CurrentForm->getValue("x_A200Amount");
		if (!$this->A200Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A200Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A200Amount->setFormValue($val);
		}

		// Check field name 'A100Count' first before field var 'x_A100Count'
		$val = $CurrentForm->hasValue("A100Count") ? $CurrentForm->getValue("A100Count") : $CurrentForm->getValue("x_A100Count");
		if (!$this->A100Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A100Count->Visible = FALSE; // Disable update for API request
			else
				$this->A100Count->setFormValue($val);
		}

		// Check field name 'A100Amount' first before field var 'x_A100Amount'
		$val = $CurrentForm->hasValue("A100Amount") ? $CurrentForm->getValue("A100Amount") : $CurrentForm->getValue("x_A100Amount");
		if (!$this->A100Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A100Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A100Amount->setFormValue($val);
		}

		// Check field name 'A50Count' first before field var 'x_A50Count'
		$val = $CurrentForm->hasValue("A50Count") ? $CurrentForm->getValue("A50Count") : $CurrentForm->getValue("x_A50Count");
		if (!$this->A50Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A50Count->Visible = FALSE; // Disable update for API request
			else
				$this->A50Count->setFormValue($val);
		}

		// Check field name 'A50Amount' first before field var 'x_A50Amount'
		$val = $CurrentForm->hasValue("A50Amount") ? $CurrentForm->getValue("A50Amount") : $CurrentForm->getValue("x_A50Amount");
		if (!$this->A50Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A50Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A50Amount->setFormValue($val);
		}

		// Check field name 'A20Count' first before field var 'x_A20Count'
		$val = $CurrentForm->hasValue("A20Count") ? $CurrentForm->getValue("A20Count") : $CurrentForm->getValue("x_A20Count");
		if (!$this->A20Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A20Count->Visible = FALSE; // Disable update for API request
			else
				$this->A20Count->setFormValue($val);
		}

		// Check field name 'A20Amount' first before field var 'x_A20Amount'
		$val = $CurrentForm->hasValue("A20Amount") ? $CurrentForm->getValue("A20Amount") : $CurrentForm->getValue("x_A20Amount");
		if (!$this->A20Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A20Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A20Amount->setFormValue($val);
		}

		// Check field name 'A10Count' first before field var 'x_A10Count'
		$val = $CurrentForm->hasValue("A10Count") ? $CurrentForm->getValue("A10Count") : $CurrentForm->getValue("x_A10Count");
		if (!$this->A10Count->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A10Count->Visible = FALSE; // Disable update for API request
			else
				$this->A10Count->setFormValue($val);
		}

		// Check field name 'A10Amount' first before field var 'x_A10Amount'
		$val = $CurrentForm->hasValue("A10Amount") ? $CurrentForm->getValue("A10Amount") : $CurrentForm->getValue("x_A10Amount");
		if (!$this->A10Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->A10Amount->Visible = FALSE; // Disable update for API request
			else
				$this->A10Amount->setFormValue($val);
		}

		// Check field name 'BalanceAmount' first before field var 'x_BalanceAmount'
		$val = $CurrentForm->hasValue("BalanceAmount") ? $CurrentForm->getValue("BalanceAmount") : $CurrentForm->getValue("x_BalanceAmount");
		if (!$this->BalanceAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BalanceAmount->Visible = FALSE; // Disable update for API request
			else
				$this->BalanceAmount->setFormValue($val);
		}

		// Check field name 'CashCollected' first before field var 'x_CashCollected'
		$val = $CurrentForm->hasValue("CashCollected") ? $CurrentForm->getValue("CashCollected") : $CurrentForm->getValue("x_CashCollected");
		if (!$this->CashCollected->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CashCollected->Visible = FALSE; // Disable update for API request
			else
				$this->CashCollected->setFormValue($val);
		}

		// Check field name 'RTGS' first before field var 'x_RTGS'
		$val = $CurrentForm->hasValue("RTGS") ? $CurrentForm->getValue("RTGS") : $CurrentForm->getValue("x_RTGS");
		if (!$this->RTGS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RTGS->Visible = FALSE; // Disable update for API request
			else
				$this->RTGS->setFormValue($val);
		}

		// Check field name 'PAYTM' first before field var 'x_PAYTM'
		$val = $CurrentForm->hasValue("PAYTM") ? $CurrentForm->getValue("PAYTM") : $CurrentForm->getValue("x_PAYTM");
		if (!$this->PAYTM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PAYTM->Visible = FALSE; // Disable update for API request
			else
				$this->PAYTM->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->DepositDate->CurrentValue = $this->DepositDate->FormValue;
		$this->DepositDate->CurrentValue = UnFormatDateTime($this->DepositDate->CurrentValue, 7);
		$this->DepositToBankSelect->CurrentValue = $this->DepositToBankSelect->FormValue;
		$this->DepositToBank->CurrentValue = $this->DepositToBank->FormValue;
		$this->TransferToSelect->CurrentValue = $this->TransferToSelect->FormValue;
		$this->TransferTo->CurrentValue = $this->TransferTo->FormValue;
		$this->OpeningBalance->CurrentValue = $this->OpeningBalance->FormValue;
		$this->Other->CurrentValue = $this->Other->FormValue;
		$this->TotalCash->CurrentValue = $this->TotalCash->FormValue;
		$this->Cheque->CurrentValue = $this->Cheque->FormValue;
		$this->Card->CurrentValue = $this->Card->FormValue;
		$this->NEFTRTGS->CurrentValue = $this->NEFTRTGS->FormValue;
		$this->TotalTransferDepositAmount->CurrentValue = $this->TotalTransferDepositAmount->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
		$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
		$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		$this->CreatedUserName->CurrentValue = $this->CreatedUserName->FormValue;
		$this->ModifiedUserName->CurrentValue = $this->ModifiedUserName->FormValue;
		$this->A2000Count->CurrentValue = $this->A2000Count->FormValue;
		$this->A2000Amount->CurrentValue = $this->A2000Amount->FormValue;
		$this->A1000Count->CurrentValue = $this->A1000Count->FormValue;
		$this->A1000Amount->CurrentValue = $this->A1000Amount->FormValue;
		$this->A500Count->CurrentValue = $this->A500Count->FormValue;
		$this->A500Amount->CurrentValue = $this->A500Amount->FormValue;
		$this->A200Count->CurrentValue = $this->A200Count->FormValue;
		$this->A200Amount->CurrentValue = $this->A200Amount->FormValue;
		$this->A100Count->CurrentValue = $this->A100Count->FormValue;
		$this->A100Amount->CurrentValue = $this->A100Amount->FormValue;
		$this->A50Count->CurrentValue = $this->A50Count->FormValue;
		$this->A50Amount->CurrentValue = $this->A50Amount->FormValue;
		$this->A20Count->CurrentValue = $this->A20Count->FormValue;
		$this->A20Amount->CurrentValue = $this->A20Amount->FormValue;
		$this->A10Count->CurrentValue = $this->A10Count->FormValue;
		$this->A10Amount->CurrentValue = $this->A10Amount->FormValue;
		$this->BalanceAmount->CurrentValue = $this->BalanceAmount->FormValue;
		$this->CashCollected->CurrentValue = $this->CashCollected->FormValue;
		$this->RTGS->CurrentValue = $this->RTGS->FormValue;
		$this->PAYTM->CurrentValue = $this->PAYTM->FormValue;
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
		$this->DepositDate->setDbValue($row['DepositDate']);
		$this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
		$this->DepositToBank->setDbValue($row['DepositToBank']);
		$this->TransferToSelect->setDbValue($row['TransferToSelect']);
		$this->TransferTo->setDbValue($row['TransferTo']);
		$this->OpeningBalance->setDbValue($row['OpeningBalance']);
		$this->Other->setDbValue($row['Other']);
		$this->TotalCash->setDbValue($row['TotalCash']);
		$this->Cheque->setDbValue($row['Cheque']);
		$this->Card->setDbValue($row['Card']);
		$this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
		$this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->CreatedUserName->setDbValue($row['CreatedUserName']);
		$this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
		$this->A2000Count->setDbValue($row['A2000Count']);
		$this->A2000Amount->setDbValue($row['A2000Amount']);
		$this->A1000Count->setDbValue($row['A1000Count']);
		$this->A1000Amount->setDbValue($row['A1000Amount']);
		$this->A500Count->setDbValue($row['A500Count']);
		$this->A500Amount->setDbValue($row['A500Amount']);
		$this->A200Count->setDbValue($row['A200Count']);
		$this->A200Amount->setDbValue($row['A200Amount']);
		$this->A100Count->setDbValue($row['A100Count']);
		$this->A100Amount->setDbValue($row['A100Amount']);
		$this->A50Count->setDbValue($row['A50Count']);
		$this->A50Amount->setDbValue($row['A50Amount']);
		$this->A20Count->setDbValue($row['A20Count']);
		$this->A20Amount->setDbValue($row['A20Amount']);
		$this->A10Count->setDbValue($row['A10Count']);
		$this->A10Amount->setDbValue($row['A10Amount']);
		$this->BalanceAmount->setDbValue($row['BalanceAmount']);
		$this->CashCollected->setDbValue($row['CashCollected']);
		$this->RTGS->setDbValue($row['RTGS']);
		$this->PAYTM->setDbValue($row['PAYTM']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['DepositDate'] = $this->DepositDate->CurrentValue;
		$row['DepositToBankSelect'] = $this->DepositToBankSelect->CurrentValue;
		$row['DepositToBank'] = $this->DepositToBank->CurrentValue;
		$row['TransferToSelect'] = $this->TransferToSelect->CurrentValue;
		$row['TransferTo'] = $this->TransferTo->CurrentValue;
		$row['OpeningBalance'] = $this->OpeningBalance->CurrentValue;
		$row['Other'] = $this->Other->CurrentValue;
		$row['TotalCash'] = $this->TotalCash->CurrentValue;
		$row['Cheque'] = $this->Cheque->CurrentValue;
		$row['Card'] = $this->Card->CurrentValue;
		$row['NEFTRTGS'] = $this->NEFTRTGS->CurrentValue;
		$row['TotalTransferDepositAmount'] = $this->TotalTransferDepositAmount->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
		$row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
		$row['CreatedUserName'] = $this->CreatedUserName->CurrentValue;
		$row['ModifiedUserName'] = $this->ModifiedUserName->CurrentValue;
		$row['A2000Count'] = $this->A2000Count->CurrentValue;
		$row['A2000Amount'] = $this->A2000Amount->CurrentValue;
		$row['A1000Count'] = $this->A1000Count->CurrentValue;
		$row['A1000Amount'] = $this->A1000Amount->CurrentValue;
		$row['A500Count'] = $this->A500Count->CurrentValue;
		$row['A500Amount'] = $this->A500Amount->CurrentValue;
		$row['A200Count'] = $this->A200Count->CurrentValue;
		$row['A200Amount'] = $this->A200Amount->CurrentValue;
		$row['A100Count'] = $this->A100Count->CurrentValue;
		$row['A100Amount'] = $this->A100Amount->CurrentValue;
		$row['A50Count'] = $this->A50Count->CurrentValue;
		$row['A50Amount'] = $this->A50Amount->CurrentValue;
		$row['A20Count'] = $this->A20Count->CurrentValue;
		$row['A20Amount'] = $this->A20Amount->CurrentValue;
		$row['A10Count'] = $this->A10Count->CurrentValue;
		$row['A10Amount'] = $this->A10Amount->CurrentValue;
		$row['BalanceAmount'] = $this->BalanceAmount->CurrentValue;
		$row['CashCollected'] = $this->CashCollected->CurrentValue;
		$row['RTGS'] = $this->RTGS->CurrentValue;
		$row['PAYTM'] = $this->PAYTM->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
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

		if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue)))
			$this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue)))
			$this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue)))
			$this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue)))
			$this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue)))
			$this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue)))
			$this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A2000Amount->FormValue == $this->A2000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A2000Amount->CurrentValue)))
			$this->A2000Amount->CurrentValue = ConvertToFloatString($this->A2000Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A1000Amount->FormValue == $this->A1000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A1000Amount->CurrentValue)))
			$this->A1000Amount->CurrentValue = ConvertToFloatString($this->A1000Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A500Amount->FormValue == $this->A500Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A500Amount->CurrentValue)))
			$this->A500Amount->CurrentValue = ConvertToFloatString($this->A500Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A200Amount->FormValue == $this->A200Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A200Amount->CurrentValue)))
			$this->A200Amount->CurrentValue = ConvertToFloatString($this->A200Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A100Amount->FormValue == $this->A100Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A100Amount->CurrentValue)))
			$this->A100Amount->CurrentValue = ConvertToFloatString($this->A100Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A50Amount->FormValue == $this->A50Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A50Amount->CurrentValue)))
			$this->A50Amount->CurrentValue = ConvertToFloatString($this->A50Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A20Amount->FormValue == $this->A20Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A20Amount->CurrentValue)))
			$this->A20Amount->CurrentValue = ConvertToFloatString($this->A20Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->A10Amount->FormValue == $this->A10Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A10Amount->CurrentValue)))
			$this->A10Amount->CurrentValue = ConvertToFloatString($this->A10Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BalanceAmount->FormValue == $this->BalanceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->BalanceAmount->CurrentValue)))
			$this->BalanceAmount->CurrentValue = ConvertToFloatString($this->BalanceAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue)))
			$this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue)))
			$this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue)))
			$this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// DepositDate
		// DepositToBankSelect
		// DepositToBank
		// TransferToSelect
		// TransferTo
		// OpeningBalance
		// Other
		// TotalCash
		// Cheque
		// Card
		// NEFTRTGS
		// TotalTransferDepositAmount
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// CreatedUserName
		// ModifiedUserName
		// A2000Count
		// A2000Amount
		// A1000Count
		// A1000Amount
		// A500Count
		// A500Amount
		// A200Count
		// A200Amount
		// A100Count
		// A100Amount
		// A50Count
		// A50Amount
		// A20Count
		// A20Amount
		// A10Count
		// A10Amount
		// BalanceAmount
		// CashCollected
		// RTGS
		// PAYTM
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// DepositDate
			$this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
			$this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 7);
			$this->DepositDate->ViewCustomAttributes = "";

			// DepositToBankSelect
			if (strval($this->DepositToBankSelect->CurrentValue) != "") {
				$this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->optionCaption($this->DepositToBankSelect->CurrentValue);
			} else {
				$this->DepositToBankSelect->ViewValue = NULL;
			}
			$this->DepositToBankSelect->ViewCustomAttributes = "";

			// DepositToBank
			$curVal = strval($this->DepositToBank->CurrentValue);
			if ($curVal != "") {
				$this->DepositToBank->ViewValue = $this->DepositToBank->lookupCacheOption($curVal);
				if ($this->DepositToBank->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Branch_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DepositToBank->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->DepositToBank->ViewValue = $this->DepositToBank->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
					}
				}
			} else {
				$this->DepositToBank->ViewValue = NULL;
			}
			$this->DepositToBank->ViewCustomAttributes = "";

			// TransferToSelect
			$this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
			$this->TransferToSelect->ViewCustomAttributes = "";

			// TransferTo
			$curVal = strval($this->TransferTo->CurrentValue);
			if ($curVal != "") {
				$this->TransferTo->ViewValue = $this->TransferTo->lookupCacheOption($curVal);
				if ($this->TransferTo->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TransferTo->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TransferTo->ViewValue = $this->TransferTo->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
					}
				}
			} else {
				$this->TransferTo->ViewValue = NULL;
			}
			$this->TransferTo->ViewCustomAttributes = "";

			// OpeningBalance
			$this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
			$this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
			$this->OpeningBalance->ViewCustomAttributes = "";

			// Other
			$this->Other->ViewValue = $this->Other->CurrentValue;
			$this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
			$this->Other->ViewCustomAttributes = "";

			// TotalCash
			$this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
			$this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
			$this->TotalCash->ViewCustomAttributes = "";

			// Cheque
			$this->Cheque->ViewValue = $this->Cheque->CurrentValue;
			$this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
			$this->Cheque->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// NEFTRTGS
			$this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
			$this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
			$this->NEFTRTGS->ViewCustomAttributes = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
			$this->TotalTransferDepositAmount->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// CreatedUserName
			$this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
			$this->CreatedUserName->ViewCustomAttributes = "";

			// ModifiedUserName
			$this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
			$this->ModifiedUserName->ViewCustomAttributes = "";

			// A2000Count
			$this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
			$this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
			$this->A2000Count->ViewCustomAttributes = "";

			// A2000Amount
			$this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
			$this->A2000Amount->ViewValue = FormatCurrency($this->A2000Amount->ViewValue, 2, -2, -2, -2);
			$this->A2000Amount->ViewCustomAttributes = "";

			// A1000Count
			$this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
			$this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
			$this->A1000Count->ViewCustomAttributes = "";

			// A1000Amount
			$this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
			$this->A1000Amount->ViewValue = FormatCurrency($this->A1000Amount->ViewValue, 2, -2, -2, -2);
			$this->A1000Amount->ViewCustomAttributes = "";

			// A500Count
			$this->A500Count->ViewValue = $this->A500Count->CurrentValue;
			$this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
			$this->A500Count->ViewCustomAttributes = "";

			// A500Amount
			$this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
			$this->A500Amount->ViewValue = FormatCurrency($this->A500Amount->ViewValue, 2, -2, -2, -2);
			$this->A500Amount->ViewCustomAttributes = "";

			// A200Count
			$this->A200Count->ViewValue = $this->A200Count->CurrentValue;
			$this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
			$this->A200Count->ViewCustomAttributes = "";

			// A200Amount
			$this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
			$this->A200Amount->ViewValue = FormatCurrency($this->A200Amount->ViewValue, 2, -2, -2, -2);
			$this->A200Amount->ViewCustomAttributes = "";

			// A100Count
			$this->A100Count->ViewValue = $this->A100Count->CurrentValue;
			$this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
			$this->A100Count->ViewCustomAttributes = "";

			// A100Amount
			$this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
			$this->A100Amount->ViewValue = FormatCurrency($this->A100Amount->ViewValue, 2, -2, -2, -2);
			$this->A100Amount->ViewCustomAttributes = "";

			// A50Count
			$this->A50Count->ViewValue = $this->A50Count->CurrentValue;
			$this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
			$this->A50Count->ViewCustomAttributes = "";

			// A50Amount
			$this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
			$this->A50Amount->ViewValue = FormatCurrency($this->A50Amount->ViewValue, 2, -2, -2, -2);
			$this->A50Amount->ViewCustomAttributes = "";

			// A20Count
			$this->A20Count->ViewValue = $this->A20Count->CurrentValue;
			$this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
			$this->A20Count->ViewCustomAttributes = "";

			// A20Amount
			$this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
			$this->A20Amount->ViewValue = FormatCurrency($this->A20Amount->ViewValue, 2, -2, -2, -2);
			$this->A20Amount->ViewCustomAttributes = "";

			// A10Count
			$this->A10Count->ViewValue = $this->A10Count->CurrentValue;
			$this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
			$this->A10Count->ViewCustomAttributes = "";

			// A10Amount
			$this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
			$this->A10Amount->ViewValue = FormatCurrency($this->A10Amount->ViewValue, 2, -2, -2, -2);
			$this->A10Amount->ViewCustomAttributes = "";

			// BalanceAmount
			$this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
			$this->BalanceAmount->ViewValue = FormatCurrency($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
			$this->BalanceAmount->ViewCustomAttributes = "";

			// CashCollected
			$this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
			$this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
			$this->CashCollected->ViewCustomAttributes = "";

			// RTGS
			$this->RTGS->ViewValue = $this->RTGS->CurrentValue;
			$this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
			$this->RTGS->ViewCustomAttributes = "";

			// PAYTM
			$this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
			$this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
			$this->PAYTM->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// DepositDate
			$this->DepositDate->LinkCustomAttributes = "";
			$this->DepositDate->HrefValue = "";
			$this->DepositDate->TooltipValue = "";

			// DepositToBankSelect
			$this->DepositToBankSelect->LinkCustomAttributes = "";
			$this->DepositToBankSelect->HrefValue = "";
			$this->DepositToBankSelect->TooltipValue = "";

			// DepositToBank
			$this->DepositToBank->LinkCustomAttributes = "";
			$this->DepositToBank->HrefValue = "";
			$this->DepositToBank->TooltipValue = "";

			// TransferToSelect
			$this->TransferToSelect->LinkCustomAttributes = "";
			$this->TransferToSelect->HrefValue = "";
			$this->TransferToSelect->TooltipValue = "";

			// TransferTo
			$this->TransferTo->LinkCustomAttributes = "";
			$this->TransferTo->HrefValue = "";
			$this->TransferTo->TooltipValue = "";

			// OpeningBalance
			$this->OpeningBalance->LinkCustomAttributes = "";
			$this->OpeningBalance->HrefValue = "";
			$this->OpeningBalance->TooltipValue = "";

			// Other
			$this->Other->LinkCustomAttributes = "";
			$this->Other->HrefValue = "";
			$this->Other->TooltipValue = "";

			// TotalCash
			$this->TotalCash->LinkCustomAttributes = "";
			$this->TotalCash->HrefValue = "";
			$this->TotalCash->TooltipValue = "";

			// Cheque
			$this->Cheque->LinkCustomAttributes = "";
			$this->Cheque->HrefValue = "";
			$this->Cheque->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";

			// NEFTRTGS
			$this->NEFTRTGS->LinkCustomAttributes = "";
			$this->NEFTRTGS->HrefValue = "";
			$this->NEFTRTGS->TooltipValue = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->LinkCustomAttributes = "";
			$this->TotalTransferDepositAmount->HrefValue = "";
			$this->TotalTransferDepositAmount->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";

			// CreatedUserName
			$this->CreatedUserName->LinkCustomAttributes = "";
			$this->CreatedUserName->HrefValue = "";
			$this->CreatedUserName->TooltipValue = "";

			// ModifiedUserName
			$this->ModifiedUserName->LinkCustomAttributes = "";
			$this->ModifiedUserName->HrefValue = "";
			$this->ModifiedUserName->TooltipValue = "";

			// A2000Count
			$this->A2000Count->LinkCustomAttributes = "";
			$this->A2000Count->HrefValue = "";
			$this->A2000Count->TooltipValue = "";

			// A2000Amount
			$this->A2000Amount->LinkCustomAttributes = "";
			$this->A2000Amount->HrefValue = "";
			$this->A2000Amount->TooltipValue = "";

			// A1000Count
			$this->A1000Count->LinkCustomAttributes = "";
			$this->A1000Count->HrefValue = "";
			$this->A1000Count->TooltipValue = "";

			// A1000Amount
			$this->A1000Amount->LinkCustomAttributes = "";
			$this->A1000Amount->HrefValue = "";
			$this->A1000Amount->TooltipValue = "";

			// A500Count
			$this->A500Count->LinkCustomAttributes = "";
			$this->A500Count->HrefValue = "";
			$this->A500Count->TooltipValue = "";

			// A500Amount
			$this->A500Amount->LinkCustomAttributes = "";
			$this->A500Amount->HrefValue = "";
			$this->A500Amount->TooltipValue = "";

			// A200Count
			$this->A200Count->LinkCustomAttributes = "";
			$this->A200Count->HrefValue = "";
			$this->A200Count->TooltipValue = "";

			// A200Amount
			$this->A200Amount->LinkCustomAttributes = "";
			$this->A200Amount->HrefValue = "";
			$this->A200Amount->TooltipValue = "";

			// A100Count
			$this->A100Count->LinkCustomAttributes = "";
			$this->A100Count->HrefValue = "";
			$this->A100Count->TooltipValue = "";

			// A100Amount
			$this->A100Amount->LinkCustomAttributes = "";
			$this->A100Amount->HrefValue = "";
			$this->A100Amount->TooltipValue = "";

			// A50Count
			$this->A50Count->LinkCustomAttributes = "";
			$this->A50Count->HrefValue = "";
			$this->A50Count->TooltipValue = "";

			// A50Amount
			$this->A50Amount->LinkCustomAttributes = "";
			$this->A50Amount->HrefValue = "";
			$this->A50Amount->TooltipValue = "";

			// A20Count
			$this->A20Count->LinkCustomAttributes = "";
			$this->A20Count->HrefValue = "";
			$this->A20Count->TooltipValue = "";

			// A20Amount
			$this->A20Amount->LinkCustomAttributes = "";
			$this->A20Amount->HrefValue = "";
			$this->A20Amount->TooltipValue = "";

			// A10Count
			$this->A10Count->LinkCustomAttributes = "";
			$this->A10Count->HrefValue = "";
			$this->A10Count->TooltipValue = "";

			// A10Amount
			$this->A10Amount->LinkCustomAttributes = "";
			$this->A10Amount->HrefValue = "";
			$this->A10Amount->TooltipValue = "";

			// BalanceAmount
			$this->BalanceAmount->LinkCustomAttributes = "";
			$this->BalanceAmount->HrefValue = "";
			$this->BalanceAmount->TooltipValue = "";

			// CashCollected
			$this->CashCollected->LinkCustomAttributes = "";
			$this->CashCollected->HrefValue = "";
			$this->CashCollected->TooltipValue = "";

			// RTGS
			$this->RTGS->LinkCustomAttributes = "";
			$this->RTGS->HrefValue = "";
			$this->RTGS->TooltipValue = "";

			// PAYTM
			$this->PAYTM->LinkCustomAttributes = "";
			$this->PAYTM->HrefValue = "";
			$this->PAYTM->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// DepositDate
			$this->DepositDate->EditAttrs["class"] = "form-control";
			$this->DepositDate->EditCustomAttributes = "";
			$this->DepositDate->EditValue = HtmlEncode(FormatDateTime($this->DepositDate->CurrentValue, 7));
			$this->DepositDate->PlaceHolder = RemoveHtml($this->DepositDate->caption());

			// DepositToBankSelect
			$this->DepositToBankSelect->EditCustomAttributes = "";
			$this->DepositToBankSelect->EditValue = $this->DepositToBankSelect->options(FALSE);

			// DepositToBank
			$this->DepositToBank->EditAttrs["class"] = "form-control";
			$this->DepositToBank->EditCustomAttributes = "";
			$curVal = trim(strval($this->DepositToBank->CurrentValue));
			if ($curVal != "")
				$this->DepositToBank->ViewValue = $this->DepositToBank->lookupCacheOption($curVal);
			else
				$this->DepositToBank->ViewValue = $this->DepositToBank->Lookup !== NULL && is_array($this->DepositToBank->Lookup->Options) ? $curVal : NULL;
			if ($this->DepositToBank->ViewValue !== NULL) { // Load from cache
				$this->DepositToBank->EditValue = array_values($this->DepositToBank->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Branch_Name`" . SearchString("=", $this->DepositToBank->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DepositToBank->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DepositToBank->EditValue = $arwrk;
			}

			// TransferToSelect
			$this->TransferToSelect->EditAttrs["class"] = "form-control";
			$this->TransferToSelect->EditCustomAttributes = "";
			if (!$this->TransferToSelect->Raw)
				$this->TransferToSelect->CurrentValue = HtmlDecode($this->TransferToSelect->CurrentValue);
			$this->TransferToSelect->EditValue = HtmlEncode($this->TransferToSelect->CurrentValue);
			$this->TransferToSelect->PlaceHolder = RemoveHtml($this->TransferToSelect->caption());

			// TransferTo
			$this->TransferTo->EditAttrs["class"] = "form-control";
			$this->TransferTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->TransferTo->CurrentValue));
			if ($curVal != "")
				$this->TransferTo->ViewValue = $this->TransferTo->lookupCacheOption($curVal);
			else
				$this->TransferTo->ViewValue = $this->TransferTo->Lookup !== NULL && is_array($this->TransferTo->Lookup->Options) ? $curVal : NULL;
			if ($this->TransferTo->ViewValue !== NULL) { // Load from cache
				$this->TransferTo->EditValue = array_values($this->TransferTo->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->TransferTo->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->TransferTo->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TransferTo->EditValue = $arwrk;
			}

			// OpeningBalance
			$this->OpeningBalance->EditAttrs["class"] = "form-control";
			$this->OpeningBalance->EditCustomAttributes = "";
			$this->OpeningBalance->EditValue = HtmlEncode($this->OpeningBalance->CurrentValue);
			$this->OpeningBalance->PlaceHolder = RemoveHtml($this->OpeningBalance->caption());
			if (strval($this->OpeningBalance->EditValue) != "" && is_numeric($this->OpeningBalance->EditValue))
				$this->OpeningBalance->EditValue = FormatNumber($this->OpeningBalance->EditValue, -2, -2, -2, -2);
			

			// Other
			$this->Other->EditAttrs["class"] = "form-control";
			$this->Other->EditCustomAttributes = "";
			$this->Other->EditValue = HtmlEncode($this->Other->CurrentValue);
			$this->Other->PlaceHolder = RemoveHtml($this->Other->caption());
			if (strval($this->Other->EditValue) != "" && is_numeric($this->Other->EditValue))
				$this->Other->EditValue = FormatNumber($this->Other->EditValue, -2, -2, -2, -2);
			

			// TotalCash
			$this->TotalCash->EditAttrs["class"] = "form-control";
			$this->TotalCash->EditCustomAttributes = "";
			$this->TotalCash->EditValue = HtmlEncode($this->TotalCash->CurrentValue);
			$this->TotalCash->PlaceHolder = RemoveHtml($this->TotalCash->caption());
			if (strval($this->TotalCash->EditValue) != "" && is_numeric($this->TotalCash->EditValue))
				$this->TotalCash->EditValue = FormatNumber($this->TotalCash->EditValue, -2, -2, -2, -2);
			

			// Cheque
			$this->Cheque->EditAttrs["class"] = "form-control";
			$this->Cheque->EditCustomAttributes = "";
			$this->Cheque->EditValue = HtmlEncode($this->Cheque->CurrentValue);
			$this->Cheque->PlaceHolder = RemoveHtml($this->Cheque->caption());
			if (strval($this->Cheque->EditValue) != "" && is_numeric($this->Cheque->EditValue))
				$this->Cheque->EditValue = FormatNumber($this->Cheque->EditValue, -2, -2, -2, -2);
			

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
			if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue))
				$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
			

			// NEFTRTGS
			$this->NEFTRTGS->EditAttrs["class"] = "form-control";
			$this->NEFTRTGS->EditCustomAttributes = "";
			$this->NEFTRTGS->EditValue = HtmlEncode($this->NEFTRTGS->CurrentValue);
			$this->NEFTRTGS->PlaceHolder = RemoveHtml($this->NEFTRTGS->caption());
			if (strval($this->NEFTRTGS->EditValue) != "" && is_numeric($this->NEFTRTGS->EditValue))
				$this->NEFTRTGS->EditValue = FormatNumber($this->NEFTRTGS->EditValue, -2, -2, -2, -2);
			

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->EditAttrs["class"] = "form-control";
			$this->TotalTransferDepositAmount->EditCustomAttributes = "";
			$this->TotalTransferDepositAmount->EditValue = HtmlEncode($this->TotalTransferDepositAmount->CurrentValue);
			$this->TotalTransferDepositAmount->PlaceHolder = RemoveHtml($this->TotalTransferDepositAmount->caption());
			if (strval($this->TotalTransferDepositAmount->EditValue) != "" && is_numeric($this->TotalTransferDepositAmount->EditValue))
				$this->TotalTransferDepositAmount->EditValue = FormatNumber($this->TotalTransferDepositAmount->EditValue, -2, -1, -2, 0);
			

			// CreatedBy
			// CreatedDateTime
			// ModifiedBy
			// ModifiedDateTime
			// CreatedUserName
			// ModifiedUserName
			// A2000Count

			$this->A2000Count->EditAttrs["class"] = "form-control";
			$this->A2000Count->EditCustomAttributes = "";
			$this->A2000Count->EditValue = HtmlEncode($this->A2000Count->CurrentValue);
			$this->A2000Count->PlaceHolder = RemoveHtml($this->A2000Count->caption());

			// A2000Amount
			$this->A2000Amount->EditAttrs["class"] = "form-control";
			$this->A2000Amount->EditCustomAttributes = "";
			$this->A2000Amount->EditValue = HtmlEncode($this->A2000Amount->CurrentValue);
			$this->A2000Amount->PlaceHolder = RemoveHtml($this->A2000Amount->caption());
			if (strval($this->A2000Amount->EditValue) != "" && is_numeric($this->A2000Amount->EditValue))
				$this->A2000Amount->EditValue = FormatNumber($this->A2000Amount->EditValue, -2, -2, -2, -2);
			

			// A1000Count
			$this->A1000Count->EditAttrs["class"] = "form-control";
			$this->A1000Count->EditCustomAttributes = "";
			$this->A1000Count->EditValue = HtmlEncode($this->A1000Count->CurrentValue);
			$this->A1000Count->PlaceHolder = RemoveHtml($this->A1000Count->caption());

			// A1000Amount
			$this->A1000Amount->EditAttrs["class"] = "form-control";
			$this->A1000Amount->EditCustomAttributes = "";
			$this->A1000Amount->EditValue = HtmlEncode($this->A1000Amount->CurrentValue);
			$this->A1000Amount->PlaceHolder = RemoveHtml($this->A1000Amount->caption());
			if (strval($this->A1000Amount->EditValue) != "" && is_numeric($this->A1000Amount->EditValue))
				$this->A1000Amount->EditValue = FormatNumber($this->A1000Amount->EditValue, -2, -2, -2, -2);
			

			// A500Count
			$this->A500Count->EditAttrs["class"] = "form-control";
			$this->A500Count->EditCustomAttributes = "";
			$this->A500Count->EditValue = HtmlEncode($this->A500Count->CurrentValue);
			$this->A500Count->PlaceHolder = RemoveHtml($this->A500Count->caption());

			// A500Amount
			$this->A500Amount->EditAttrs["class"] = "form-control";
			$this->A500Amount->EditCustomAttributes = "";
			$this->A500Amount->EditValue = HtmlEncode($this->A500Amount->CurrentValue);
			$this->A500Amount->PlaceHolder = RemoveHtml($this->A500Amount->caption());
			if (strval($this->A500Amount->EditValue) != "" && is_numeric($this->A500Amount->EditValue))
				$this->A500Amount->EditValue = FormatNumber($this->A500Amount->EditValue, -2, -2, -2, -2);
			

			// A200Count
			$this->A200Count->EditAttrs["class"] = "form-control";
			$this->A200Count->EditCustomAttributes = "";
			$this->A200Count->EditValue = HtmlEncode($this->A200Count->CurrentValue);
			$this->A200Count->PlaceHolder = RemoveHtml($this->A200Count->caption());

			// A200Amount
			$this->A200Amount->EditAttrs["class"] = "form-control";
			$this->A200Amount->EditCustomAttributes = "";
			$this->A200Amount->EditValue = HtmlEncode($this->A200Amount->CurrentValue);
			$this->A200Amount->PlaceHolder = RemoveHtml($this->A200Amount->caption());
			if (strval($this->A200Amount->EditValue) != "" && is_numeric($this->A200Amount->EditValue))
				$this->A200Amount->EditValue = FormatNumber($this->A200Amount->EditValue, -2, -2, -2, -2);
			

			// A100Count
			$this->A100Count->EditAttrs["class"] = "form-control";
			$this->A100Count->EditCustomAttributes = "";
			$this->A100Count->EditValue = HtmlEncode($this->A100Count->CurrentValue);
			$this->A100Count->PlaceHolder = RemoveHtml($this->A100Count->caption());

			// A100Amount
			$this->A100Amount->EditAttrs["class"] = "form-control";
			$this->A100Amount->EditCustomAttributes = "";
			$this->A100Amount->EditValue = HtmlEncode($this->A100Amount->CurrentValue);
			$this->A100Amount->PlaceHolder = RemoveHtml($this->A100Amount->caption());
			if (strval($this->A100Amount->EditValue) != "" && is_numeric($this->A100Amount->EditValue))
				$this->A100Amount->EditValue = FormatNumber($this->A100Amount->EditValue, -2, -2, -2, -2);
			

			// A50Count
			$this->A50Count->EditAttrs["class"] = "form-control";
			$this->A50Count->EditCustomAttributes = "";
			$this->A50Count->EditValue = HtmlEncode($this->A50Count->CurrentValue);
			$this->A50Count->PlaceHolder = RemoveHtml($this->A50Count->caption());

			// A50Amount
			$this->A50Amount->EditAttrs["class"] = "form-control";
			$this->A50Amount->EditCustomAttributes = "";
			$this->A50Amount->EditValue = HtmlEncode($this->A50Amount->CurrentValue);
			$this->A50Amount->PlaceHolder = RemoveHtml($this->A50Amount->caption());
			if (strval($this->A50Amount->EditValue) != "" && is_numeric($this->A50Amount->EditValue))
				$this->A50Amount->EditValue = FormatNumber($this->A50Amount->EditValue, -2, -2, -2, -2);
			

			// A20Count
			$this->A20Count->EditAttrs["class"] = "form-control";
			$this->A20Count->EditCustomAttributes = "";
			$this->A20Count->EditValue = HtmlEncode($this->A20Count->CurrentValue);
			$this->A20Count->PlaceHolder = RemoveHtml($this->A20Count->caption());

			// A20Amount
			$this->A20Amount->EditAttrs["class"] = "form-control";
			$this->A20Amount->EditCustomAttributes = "";
			$this->A20Amount->EditValue = HtmlEncode($this->A20Amount->CurrentValue);
			$this->A20Amount->PlaceHolder = RemoveHtml($this->A20Amount->caption());
			if (strval($this->A20Amount->EditValue) != "" && is_numeric($this->A20Amount->EditValue))
				$this->A20Amount->EditValue = FormatNumber($this->A20Amount->EditValue, -2, -2, -2, -2);
			

			// A10Count
			$this->A10Count->EditAttrs["class"] = "form-control";
			$this->A10Count->EditCustomAttributes = "";
			$this->A10Count->EditValue = HtmlEncode($this->A10Count->CurrentValue);
			$this->A10Count->PlaceHolder = RemoveHtml($this->A10Count->caption());

			// A10Amount
			$this->A10Amount->EditAttrs["class"] = "form-control";
			$this->A10Amount->EditCustomAttributes = "";
			$this->A10Amount->EditValue = HtmlEncode($this->A10Amount->CurrentValue);
			$this->A10Amount->PlaceHolder = RemoveHtml($this->A10Amount->caption());
			if (strval($this->A10Amount->EditValue) != "" && is_numeric($this->A10Amount->EditValue))
				$this->A10Amount->EditValue = FormatNumber($this->A10Amount->EditValue, -2, -2, -2, -2);
			

			// BalanceAmount
			$this->BalanceAmount->EditAttrs["class"] = "form-control";
			$this->BalanceAmount->EditCustomAttributes = "";
			$this->BalanceAmount->EditValue = HtmlEncode($this->BalanceAmount->CurrentValue);
			$this->BalanceAmount->PlaceHolder = RemoveHtml($this->BalanceAmount->caption());
			if (strval($this->BalanceAmount->EditValue) != "" && is_numeric($this->BalanceAmount->EditValue))
				$this->BalanceAmount->EditValue = FormatNumber($this->BalanceAmount->EditValue, -2, -2, -2, -2);
			

			// CashCollected
			$this->CashCollected->EditAttrs["class"] = "form-control";
			$this->CashCollected->EditCustomAttributes = "";
			$this->CashCollected->EditValue = HtmlEncode($this->CashCollected->CurrentValue);
			$this->CashCollected->PlaceHolder = RemoveHtml($this->CashCollected->caption());
			if (strval($this->CashCollected->EditValue) != "" && is_numeric($this->CashCollected->EditValue))
				$this->CashCollected->EditValue = FormatNumber($this->CashCollected->EditValue, -2, -2, -2, -2);
			

			// RTGS
			$this->RTGS->EditAttrs["class"] = "form-control";
			$this->RTGS->EditCustomAttributes = "";
			$this->RTGS->EditValue = HtmlEncode($this->RTGS->CurrentValue);
			$this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());
			if (strval($this->RTGS->EditValue) != "" && is_numeric($this->RTGS->EditValue))
				$this->RTGS->EditValue = FormatNumber($this->RTGS->EditValue, -2, -2, -2, -2);
			

			// PAYTM
			$this->PAYTM->EditAttrs["class"] = "form-control";
			$this->PAYTM->EditCustomAttributes = "";
			$this->PAYTM->EditValue = HtmlEncode($this->PAYTM->CurrentValue);
			$this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());
			if (strval($this->PAYTM->EditValue) != "" && is_numeric($this->PAYTM->EditValue))
				$this->PAYTM->EditValue = FormatNumber($this->PAYTM->EditValue, -2, -2, -2, -2);
			

			// HospID
			// Add refer script
			// DepositDate

			$this->DepositDate->LinkCustomAttributes = "";
			$this->DepositDate->HrefValue = "";

			// DepositToBankSelect
			$this->DepositToBankSelect->LinkCustomAttributes = "";
			$this->DepositToBankSelect->HrefValue = "";

			// DepositToBank
			$this->DepositToBank->LinkCustomAttributes = "";
			$this->DepositToBank->HrefValue = "";

			// TransferToSelect
			$this->TransferToSelect->LinkCustomAttributes = "";
			$this->TransferToSelect->HrefValue = "";

			// TransferTo
			$this->TransferTo->LinkCustomAttributes = "";
			$this->TransferTo->HrefValue = "";

			// OpeningBalance
			$this->OpeningBalance->LinkCustomAttributes = "";
			$this->OpeningBalance->HrefValue = "";

			// Other
			$this->Other->LinkCustomAttributes = "";
			$this->Other->HrefValue = "";

			// TotalCash
			$this->TotalCash->LinkCustomAttributes = "";
			$this->TotalCash->HrefValue = "";

			// Cheque
			$this->Cheque->LinkCustomAttributes = "";
			$this->Cheque->HrefValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";

			// NEFTRTGS
			$this->NEFTRTGS->LinkCustomAttributes = "";
			$this->NEFTRTGS->HrefValue = "";

			// TotalTransferDepositAmount
			$this->TotalTransferDepositAmount->LinkCustomAttributes = "";
			$this->TotalTransferDepositAmount->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";

			// CreatedUserName
			$this->CreatedUserName->LinkCustomAttributes = "";
			$this->CreatedUserName->HrefValue = "";

			// ModifiedUserName
			$this->ModifiedUserName->LinkCustomAttributes = "";
			$this->ModifiedUserName->HrefValue = "";

			// A2000Count
			$this->A2000Count->LinkCustomAttributes = "";
			$this->A2000Count->HrefValue = "";

			// A2000Amount
			$this->A2000Amount->LinkCustomAttributes = "";
			$this->A2000Amount->HrefValue = "";

			// A1000Count
			$this->A1000Count->LinkCustomAttributes = "";
			$this->A1000Count->HrefValue = "";

			// A1000Amount
			$this->A1000Amount->LinkCustomAttributes = "";
			$this->A1000Amount->HrefValue = "";

			// A500Count
			$this->A500Count->LinkCustomAttributes = "";
			$this->A500Count->HrefValue = "";

			// A500Amount
			$this->A500Amount->LinkCustomAttributes = "";
			$this->A500Amount->HrefValue = "";

			// A200Count
			$this->A200Count->LinkCustomAttributes = "";
			$this->A200Count->HrefValue = "";

			// A200Amount
			$this->A200Amount->LinkCustomAttributes = "";
			$this->A200Amount->HrefValue = "";

			// A100Count
			$this->A100Count->LinkCustomAttributes = "";
			$this->A100Count->HrefValue = "";

			// A100Amount
			$this->A100Amount->LinkCustomAttributes = "";
			$this->A100Amount->HrefValue = "";

			// A50Count
			$this->A50Count->LinkCustomAttributes = "";
			$this->A50Count->HrefValue = "";

			// A50Amount
			$this->A50Amount->LinkCustomAttributes = "";
			$this->A50Amount->HrefValue = "";

			// A20Count
			$this->A20Count->LinkCustomAttributes = "";
			$this->A20Count->HrefValue = "";

			// A20Amount
			$this->A20Amount->LinkCustomAttributes = "";
			$this->A20Amount->HrefValue = "";

			// A10Count
			$this->A10Count->LinkCustomAttributes = "";
			$this->A10Count->HrefValue = "";

			// A10Amount
			$this->A10Amount->LinkCustomAttributes = "";
			$this->A10Amount->HrefValue = "";

			// BalanceAmount
			$this->BalanceAmount->LinkCustomAttributes = "";
			$this->BalanceAmount->HrefValue = "";

			// CashCollected
			$this->CashCollected->LinkCustomAttributes = "";
			$this->CashCollected->HrefValue = "";

			// RTGS
			$this->RTGS->LinkCustomAttributes = "";
			$this->RTGS->HrefValue = "";

			// PAYTM
			$this->PAYTM->LinkCustomAttributes = "";
			$this->PAYTM->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
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
		if ($this->DepositDate->Required) {
			if (!$this->DepositDate->IsDetailKey && $this->DepositDate->FormValue != NULL && $this->DepositDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepositDate->caption(), $this->DepositDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DepositDate->FormValue)) {
			AddMessage($FormError, $this->DepositDate->errorMessage());
		}
		if ($this->DepositToBankSelect->Required) {
			if ($this->DepositToBankSelect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepositToBankSelect->caption(), $this->DepositToBankSelect->RequiredErrorMessage));
			}
		}
		if ($this->DepositToBank->Required) {
			if (!$this->DepositToBank->IsDetailKey && $this->DepositToBank->FormValue != NULL && $this->DepositToBank->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepositToBank->caption(), $this->DepositToBank->RequiredErrorMessage));
			}
		}
		if ($this->TransferToSelect->Required) {
			if (!$this->TransferToSelect->IsDetailKey && $this->TransferToSelect->FormValue != NULL && $this->TransferToSelect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransferToSelect->caption(), $this->TransferToSelect->RequiredErrorMessage));
			}
		}
		if ($this->TransferTo->Required) {
			if (!$this->TransferTo->IsDetailKey && $this->TransferTo->FormValue != NULL && $this->TransferTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransferTo->caption(), $this->TransferTo->RequiredErrorMessage));
			}
		}
		if ($this->OpeningBalance->Required) {
			if (!$this->OpeningBalance->IsDetailKey && $this->OpeningBalance->FormValue != NULL && $this->OpeningBalance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OpeningBalance->caption(), $this->OpeningBalance->RequiredErrorMessage));
			}
		}
		if ($this->Other->Required) {
			if (!$this->Other->IsDetailKey && $this->Other->FormValue != NULL && $this->Other->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Other->caption(), $this->Other->RequiredErrorMessage));
			}
		}
		if ($this->TotalCash->Required) {
			if (!$this->TotalCash->IsDetailKey && $this->TotalCash->FormValue != NULL && $this->TotalCash->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalCash->caption(), $this->TotalCash->RequiredErrorMessage));
			}
		}
		if ($this->Cheque->Required) {
			if (!$this->Cheque->IsDetailKey && $this->Cheque->FormValue != NULL && $this->Cheque->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cheque->caption(), $this->Cheque->RequiredErrorMessage));
			}
		}
		if ($this->Card->Required) {
			if (!$this->Card->IsDetailKey && $this->Card->FormValue != NULL && $this->Card->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
			}
		}
		if ($this->NEFTRTGS->Required) {
			if (!$this->NEFTRTGS->IsDetailKey && $this->NEFTRTGS->FormValue != NULL && $this->NEFTRTGS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEFTRTGS->caption(), $this->NEFTRTGS->RequiredErrorMessage));
			}
		}
		if ($this->TotalTransferDepositAmount->Required) {
			if (!$this->TotalTransferDepositAmount->IsDetailKey && $this->TotalTransferDepositAmount->FormValue != NULL && $this->TotalTransferDepositAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalTransferDepositAmount->caption(), $this->TotalTransferDepositAmount->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
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
		if ($this->CreatedUserName->Required) {
			if (!$this->CreatedUserName->IsDetailKey && $this->CreatedUserName->FormValue != NULL && $this->CreatedUserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedUserName->caption(), $this->CreatedUserName->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedUserName->Required) {
			if (!$this->ModifiedUserName->IsDetailKey && $this->ModifiedUserName->FormValue != NULL && $this->ModifiedUserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedUserName->caption(), $this->ModifiedUserName->RequiredErrorMessage));
			}
		}
		if ($this->A2000Count->Required) {
			if (!$this->A2000Count->IsDetailKey && $this->A2000Count->FormValue != NULL && $this->A2000Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A2000Count->caption(), $this->A2000Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A2000Count->FormValue)) {
			AddMessage($FormError, $this->A2000Count->errorMessage());
		}
		if ($this->A2000Amount->Required) {
			if (!$this->A2000Amount->IsDetailKey && $this->A2000Amount->FormValue != NULL && $this->A2000Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A2000Amount->caption(), $this->A2000Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A2000Amount->FormValue)) {
			AddMessage($FormError, $this->A2000Amount->errorMessage());
		}
		if ($this->A1000Count->Required) {
			if (!$this->A1000Count->IsDetailKey && $this->A1000Count->FormValue != NULL && $this->A1000Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A1000Count->caption(), $this->A1000Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A1000Count->FormValue)) {
			AddMessage($FormError, $this->A1000Count->errorMessage());
		}
		if ($this->A1000Amount->Required) {
			if (!$this->A1000Amount->IsDetailKey && $this->A1000Amount->FormValue != NULL && $this->A1000Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A1000Amount->caption(), $this->A1000Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A1000Amount->FormValue)) {
			AddMessage($FormError, $this->A1000Amount->errorMessage());
		}
		if ($this->A500Count->Required) {
			if (!$this->A500Count->IsDetailKey && $this->A500Count->FormValue != NULL && $this->A500Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A500Count->caption(), $this->A500Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A500Count->FormValue)) {
			AddMessage($FormError, $this->A500Count->errorMessage());
		}
		if ($this->A500Amount->Required) {
			if (!$this->A500Amount->IsDetailKey && $this->A500Amount->FormValue != NULL && $this->A500Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A500Amount->caption(), $this->A500Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A500Amount->FormValue)) {
			AddMessage($FormError, $this->A500Amount->errorMessage());
		}
		if ($this->A200Count->Required) {
			if (!$this->A200Count->IsDetailKey && $this->A200Count->FormValue != NULL && $this->A200Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A200Count->caption(), $this->A200Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A200Count->FormValue)) {
			AddMessage($FormError, $this->A200Count->errorMessage());
		}
		if ($this->A200Amount->Required) {
			if (!$this->A200Amount->IsDetailKey && $this->A200Amount->FormValue != NULL && $this->A200Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A200Amount->caption(), $this->A200Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A200Amount->FormValue)) {
			AddMessage($FormError, $this->A200Amount->errorMessage());
		}
		if ($this->A100Count->Required) {
			if (!$this->A100Count->IsDetailKey && $this->A100Count->FormValue != NULL && $this->A100Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A100Count->caption(), $this->A100Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A100Count->FormValue)) {
			AddMessage($FormError, $this->A100Count->errorMessage());
		}
		if ($this->A100Amount->Required) {
			if (!$this->A100Amount->IsDetailKey && $this->A100Amount->FormValue != NULL && $this->A100Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A100Amount->caption(), $this->A100Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A100Amount->FormValue)) {
			AddMessage($FormError, $this->A100Amount->errorMessage());
		}
		if ($this->A50Count->Required) {
			if (!$this->A50Count->IsDetailKey && $this->A50Count->FormValue != NULL && $this->A50Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A50Count->caption(), $this->A50Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A50Count->FormValue)) {
			AddMessage($FormError, $this->A50Count->errorMessage());
		}
		if ($this->A50Amount->Required) {
			if (!$this->A50Amount->IsDetailKey && $this->A50Amount->FormValue != NULL && $this->A50Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A50Amount->caption(), $this->A50Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A50Amount->FormValue)) {
			AddMessage($FormError, $this->A50Amount->errorMessage());
		}
		if ($this->A20Count->Required) {
			if (!$this->A20Count->IsDetailKey && $this->A20Count->FormValue != NULL && $this->A20Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A20Count->caption(), $this->A20Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A20Count->FormValue)) {
			AddMessage($FormError, $this->A20Count->errorMessage());
		}
		if ($this->A20Amount->Required) {
			if (!$this->A20Amount->IsDetailKey && $this->A20Amount->FormValue != NULL && $this->A20Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A20Amount->caption(), $this->A20Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A20Amount->FormValue)) {
			AddMessage($FormError, $this->A20Amount->errorMessage());
		}
		if ($this->A10Count->Required) {
			if (!$this->A10Count->IsDetailKey && $this->A10Count->FormValue != NULL && $this->A10Count->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A10Count->caption(), $this->A10Count->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->A10Count->FormValue)) {
			AddMessage($FormError, $this->A10Count->errorMessage());
		}
		if ($this->A10Amount->Required) {
			if (!$this->A10Amount->IsDetailKey && $this->A10Amount->FormValue != NULL && $this->A10Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A10Amount->caption(), $this->A10Amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->A10Amount->FormValue)) {
			AddMessage($FormError, $this->A10Amount->errorMessage());
		}
		if ($this->BalanceAmount->Required) {
			if (!$this->BalanceAmount->IsDetailKey && $this->BalanceAmount->FormValue != NULL && $this->BalanceAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BalanceAmount->caption(), $this->BalanceAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BalanceAmount->FormValue)) {
			AddMessage($FormError, $this->BalanceAmount->errorMessage());
		}
		if ($this->CashCollected->Required) {
			if (!$this->CashCollected->IsDetailKey && $this->CashCollected->FormValue != NULL && $this->CashCollected->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CashCollected->caption(), $this->CashCollected->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->CashCollected->FormValue)) {
			AddMessage($FormError, $this->CashCollected->errorMessage());
		}
		if ($this->RTGS->Required) {
			if (!$this->RTGS->IsDetailKey && $this->RTGS->FormValue != NULL && $this->RTGS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RTGS->caption(), $this->RTGS->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RTGS->FormValue)) {
			AddMessage($FormError, $this->RTGS->errorMessage());
		}
		if ($this->PAYTM->Required) {
			if (!$this->PAYTM->IsDetailKey && $this->PAYTM->FormValue != NULL && $this->PAYTM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PAYTM->caption(), $this->PAYTM->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PAYTM->FormValue)) {
			AddMessage($FormError, $this->PAYTM->errorMessage());
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

		// DepositDate
		$this->DepositDate->setDbValueDef($rsnew, UnFormatDateTime($this->DepositDate->CurrentValue, 7), NULL, FALSE);

		// DepositToBankSelect
		$this->DepositToBankSelect->setDbValueDef($rsnew, $this->DepositToBankSelect->CurrentValue, NULL, FALSE);

		// DepositToBank
		$this->DepositToBank->setDbValueDef($rsnew, $this->DepositToBank->CurrentValue, NULL, FALSE);

		// TransferToSelect
		$this->TransferToSelect->setDbValueDef($rsnew, $this->TransferToSelect->CurrentValue, NULL, FALSE);

		// TransferTo
		$this->TransferTo->setDbValueDef($rsnew, $this->TransferTo->CurrentValue, NULL, FALSE);

		// OpeningBalance
		$this->OpeningBalance->setDbValueDef($rsnew, $this->OpeningBalance->CurrentValue, NULL, FALSE);

		// Other
		$this->Other->setDbValueDef($rsnew, $this->Other->CurrentValue, NULL, FALSE);

		// TotalCash
		$this->TotalCash->setDbValueDef($rsnew, $this->TotalCash->CurrentValue, NULL, FALSE);

		// Cheque
		$this->Cheque->setDbValueDef($rsnew, $this->Cheque->CurrentValue, NULL, FALSE);

		// Card
		$this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, NULL, FALSE);

		// NEFTRTGS
		$this->NEFTRTGS->setDbValueDef($rsnew, $this->NEFTRTGS->CurrentValue, NULL, FALSE);

		// TotalTransferDepositAmount
		$this->TotalTransferDepositAmount->setDbValueDef($rsnew, $this->TotalTransferDepositAmount->CurrentValue, NULL, FALSE);

		// CreatedBy
		$this->CreatedBy->CurrentValue = CurrentUserID();
		$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL);

		// CreatedDateTime
		$this->CreatedDateTime->CurrentValue = CurrentDateTime();
		$this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, NULL);

		// ModifiedBy
		$this->ModifiedBy->CurrentValue = CurrentUserID();
		$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL);

		// ModifiedDateTime
		$this->ModifiedDateTime->CurrentValue = CurrentDateTime();
		$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL);

		// CreatedUserName
		$this->CreatedUserName->CurrentValue = GetUserName();
		$this->CreatedUserName->setDbValueDef($rsnew, $this->CreatedUserName->CurrentValue, NULL);

		// ModifiedUserName
		$this->ModifiedUserName->CurrentValue = GetUserName();
		$this->ModifiedUserName->setDbValueDef($rsnew, $this->ModifiedUserName->CurrentValue, NULL);

		// A2000Count
		$this->A2000Count->setDbValueDef($rsnew, $this->A2000Count->CurrentValue, NULL, FALSE);

		// A2000Amount
		$this->A2000Amount->setDbValueDef($rsnew, $this->A2000Amount->CurrentValue, NULL, FALSE);

		// A1000Count
		$this->A1000Count->setDbValueDef($rsnew, $this->A1000Count->CurrentValue, NULL, FALSE);

		// A1000Amount
		$this->A1000Amount->setDbValueDef($rsnew, $this->A1000Amount->CurrentValue, NULL, FALSE);

		// A500Count
		$this->A500Count->setDbValueDef($rsnew, $this->A500Count->CurrentValue, NULL, FALSE);

		// A500Amount
		$this->A500Amount->setDbValueDef($rsnew, $this->A500Amount->CurrentValue, NULL, FALSE);

		// A200Count
		$this->A200Count->setDbValueDef($rsnew, $this->A200Count->CurrentValue, NULL, FALSE);

		// A200Amount
		$this->A200Amount->setDbValueDef($rsnew, $this->A200Amount->CurrentValue, NULL, FALSE);

		// A100Count
		$this->A100Count->setDbValueDef($rsnew, $this->A100Count->CurrentValue, NULL, FALSE);

		// A100Amount
		$this->A100Amount->setDbValueDef($rsnew, $this->A100Amount->CurrentValue, NULL, FALSE);

		// A50Count
		$this->A50Count->setDbValueDef($rsnew, $this->A50Count->CurrentValue, NULL, FALSE);

		// A50Amount
		$this->A50Amount->setDbValueDef($rsnew, $this->A50Amount->CurrentValue, NULL, FALSE);

		// A20Count
		$this->A20Count->setDbValueDef($rsnew, $this->A20Count->CurrentValue, NULL, FALSE);

		// A20Amount
		$this->A20Amount->setDbValueDef($rsnew, $this->A20Amount->CurrentValue, NULL, FALSE);

		// A10Count
		$this->A10Count->setDbValueDef($rsnew, $this->A10Count->CurrentValue, NULL, FALSE);

		// A10Amount
		$this->A10Amount->setDbValueDef($rsnew, $this->A10Amount->CurrentValue, NULL, FALSE);

		// BalanceAmount
		$this->BalanceAmount->setDbValueDef($rsnew, $this->BalanceAmount->CurrentValue, NULL, FALSE);

		// CashCollected
		$this->CashCollected->setDbValueDef($rsnew, $this->CashCollected->CurrentValue, NULL, FALSE);

		// RTGS
		$this->RTGS->setDbValueDef($rsnew, $this->RTGS->CurrentValue, NULL, FALSE);

		// PAYTM
		$this->PAYTM->setDbValueDef($rsnew, $this->PAYTM->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("depositdetailslist.php"), "", $this->TableVar, TRUE);
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
				case "x_DepositToBankSelect":
					break;
				case "x_DepositToBank":
					break;
				case "x_TransferTo":
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
						case "x_DepositToBank":
							break;
						case "x_TransferTo":
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
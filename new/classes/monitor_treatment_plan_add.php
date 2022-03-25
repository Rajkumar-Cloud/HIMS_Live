<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class monitor_treatment_plan_add extends monitor_treatment_plan
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'monitor_treatment_plan';

	// Page object name
	public $PageObjName = "monitor_treatment_plan_add";

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

		// Table object (monitor_treatment_plan)
		if (!isset($GLOBALS["monitor_treatment_plan"]) || get_class($GLOBALS["monitor_treatment_plan"]) == PROJECT_NAMESPACE . "monitor_treatment_plan") {
			$GLOBALS["monitor_treatment_plan"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["monitor_treatment_plan"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'monitor_treatment_plan');

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
		global $monitor_treatment_plan;
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
				$doc = new $class($monitor_treatment_plan);
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
					if ($pageName == "monitor_treatment_planview.php")
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
					$this->terminate(GetUrl("monitor_treatment_planlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->PatId->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->MobileNo->setVisibility();
		$this->ConsultantName->setVisibility();
		$this->RefDrName->setVisibility();
		$this->RefDrMobileNo->setVisibility();
		$this->NewVisitDate->setVisibility();
		$this->NewVisitYesNo->setVisibility();
		$this->Treatment->setVisibility();
		$this->IUIDoneDate1->setVisibility();
		$this->IUIDoneYesNo1->setVisibility();
		$this->UPTTestDate1->setVisibility();
		$this->UPTTestYesNo1->setVisibility();
		$this->IUIDoneDate2->setVisibility();
		$this->IUIDoneYesNo2->setVisibility();
		$this->UPTTestDate2->setVisibility();
		$this->UPTTestYesNo2->setVisibility();
		$this->IUIDoneDate3->setVisibility();
		$this->IUIDoneYesNo3->setVisibility();
		$this->UPTTestDate3->setVisibility();
		$this->UPTTestYesNo3->setVisibility();
		$this->IUIDoneDate4->setVisibility();
		$this->IUIDoneYesNo4->setVisibility();
		$this->UPTTestDate4->setVisibility();
		$this->UPTTestYesNo4->setVisibility();
		$this->IVFStimulationDate->setVisibility();
		$this->IVFStimulationYesNo->setVisibility();
		$this->OPUDate->setVisibility();
		$this->OPUYesNo->setVisibility();
		$this->ETDate->setVisibility();
		$this->ETYesNo->setVisibility();
		$this->BetaHCGDate->setVisibility();
		$this->BetaHCGYesNo->setVisibility();
		$this->FETDate->setVisibility();
		$this->FETYesNo->setVisibility();
		$this->FBetaHCGDate->setVisibility();
		$this->FBetaHCGYesNo->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
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
		$this->setupLookupOptions($this->PatId);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("monitor_treatment_planlist.php");
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
					$this->terminate("monitor_treatment_planlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "monitor_treatment_planlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "monitor_treatment_planview.php")
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
		$this->PatId->CurrentValue = NULL;
		$this->PatId->OldValue = $this->PatId->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->MobileNo->CurrentValue = NULL;
		$this->MobileNo->OldValue = $this->MobileNo->CurrentValue;
		$this->ConsultantName->CurrentValue = NULL;
		$this->ConsultantName->OldValue = $this->ConsultantName->CurrentValue;
		$this->RefDrName->CurrentValue = NULL;
		$this->RefDrName->OldValue = $this->RefDrName->CurrentValue;
		$this->RefDrMobileNo->CurrentValue = NULL;
		$this->RefDrMobileNo->OldValue = $this->RefDrMobileNo->CurrentValue;
		$this->NewVisitDate->CurrentValue = NULL;
		$this->NewVisitDate->OldValue = $this->NewVisitDate->CurrentValue;
		$this->NewVisitYesNo->CurrentValue = NULL;
		$this->NewVisitYesNo->OldValue = $this->NewVisitYesNo->CurrentValue;
		$this->Treatment->CurrentValue = NULL;
		$this->Treatment->OldValue = $this->Treatment->CurrentValue;
		$this->IUIDoneDate1->CurrentValue = NULL;
		$this->IUIDoneDate1->OldValue = $this->IUIDoneDate1->CurrentValue;
		$this->IUIDoneYesNo1->CurrentValue = NULL;
		$this->IUIDoneYesNo1->OldValue = $this->IUIDoneYesNo1->CurrentValue;
		$this->UPTTestDate1->CurrentValue = NULL;
		$this->UPTTestDate1->OldValue = $this->UPTTestDate1->CurrentValue;
		$this->UPTTestYesNo1->CurrentValue = NULL;
		$this->UPTTestYesNo1->OldValue = $this->UPTTestYesNo1->CurrentValue;
		$this->IUIDoneDate2->CurrentValue = NULL;
		$this->IUIDoneDate2->OldValue = $this->IUIDoneDate2->CurrentValue;
		$this->IUIDoneYesNo2->CurrentValue = NULL;
		$this->IUIDoneYesNo2->OldValue = $this->IUIDoneYesNo2->CurrentValue;
		$this->UPTTestDate2->CurrentValue = NULL;
		$this->UPTTestDate2->OldValue = $this->UPTTestDate2->CurrentValue;
		$this->UPTTestYesNo2->CurrentValue = NULL;
		$this->UPTTestYesNo2->OldValue = $this->UPTTestYesNo2->CurrentValue;
		$this->IUIDoneDate3->CurrentValue = NULL;
		$this->IUIDoneDate3->OldValue = $this->IUIDoneDate3->CurrentValue;
		$this->IUIDoneYesNo3->CurrentValue = NULL;
		$this->IUIDoneYesNo3->OldValue = $this->IUIDoneYesNo3->CurrentValue;
		$this->UPTTestDate3->CurrentValue = NULL;
		$this->UPTTestDate3->OldValue = $this->UPTTestDate3->CurrentValue;
		$this->UPTTestYesNo3->CurrentValue = NULL;
		$this->UPTTestYesNo3->OldValue = $this->UPTTestYesNo3->CurrentValue;
		$this->IUIDoneDate4->CurrentValue = NULL;
		$this->IUIDoneDate4->OldValue = $this->IUIDoneDate4->CurrentValue;
		$this->IUIDoneYesNo4->CurrentValue = NULL;
		$this->IUIDoneYesNo4->OldValue = $this->IUIDoneYesNo4->CurrentValue;
		$this->UPTTestDate4->CurrentValue = NULL;
		$this->UPTTestDate4->OldValue = $this->UPTTestDate4->CurrentValue;
		$this->UPTTestYesNo4->CurrentValue = NULL;
		$this->UPTTestYesNo4->OldValue = $this->UPTTestYesNo4->CurrentValue;
		$this->IVFStimulationDate->CurrentValue = NULL;
		$this->IVFStimulationDate->OldValue = $this->IVFStimulationDate->CurrentValue;
		$this->IVFStimulationYesNo->CurrentValue = NULL;
		$this->IVFStimulationYesNo->OldValue = $this->IVFStimulationYesNo->CurrentValue;
		$this->OPUDate->CurrentValue = NULL;
		$this->OPUDate->OldValue = $this->OPUDate->CurrentValue;
		$this->OPUYesNo->CurrentValue = NULL;
		$this->OPUYesNo->OldValue = $this->OPUYesNo->CurrentValue;
		$this->ETDate->CurrentValue = NULL;
		$this->ETDate->OldValue = $this->ETDate->CurrentValue;
		$this->ETYesNo->CurrentValue = NULL;
		$this->ETYesNo->OldValue = $this->ETYesNo->CurrentValue;
		$this->BetaHCGDate->CurrentValue = NULL;
		$this->BetaHCGDate->OldValue = $this->BetaHCGDate->CurrentValue;
		$this->BetaHCGYesNo->CurrentValue = NULL;
		$this->BetaHCGYesNo->OldValue = $this->BetaHCGYesNo->CurrentValue;
		$this->FETDate->CurrentValue = NULL;
		$this->FETDate->OldValue = $this->FETDate->CurrentValue;
		$this->FETYesNo->CurrentValue = NULL;
		$this->FETYesNo->OldValue = $this->FETYesNo->CurrentValue;
		$this->FBetaHCGDate->CurrentValue = NULL;
		$this->FBetaHCGDate->OldValue = $this->FBetaHCGDate->CurrentValue;
		$this->FBetaHCGYesNo->CurrentValue = NULL;
		$this->FBetaHCGYesNo->OldValue = $this->FBetaHCGYesNo->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'PatId' first before field var 'x_PatId'
		$val = $CurrentForm->hasValue("PatId") ? $CurrentForm->getValue("PatId") : $CurrentForm->getValue("x_PatId");
		if (!$this->PatId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatId->Visible = FALSE; // Disable update for API request
			else
				$this->PatId->setFormValue($val);
		}

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'MobileNo' first before field var 'x_MobileNo'
		$val = $CurrentForm->hasValue("MobileNo") ? $CurrentForm->getValue("MobileNo") : $CurrentForm->getValue("x_MobileNo");
		if (!$this->MobileNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNo->setFormValue($val);
		}

		// Check field name 'ConsultantName' first before field var 'x_ConsultantName'
		$val = $CurrentForm->hasValue("ConsultantName") ? $CurrentForm->getValue("ConsultantName") : $CurrentForm->getValue("x_ConsultantName");
		if (!$this->ConsultantName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ConsultantName->Visible = FALSE; // Disable update for API request
			else
				$this->ConsultantName->setFormValue($val);
		}

		// Check field name 'RefDrName' first before field var 'x_RefDrName'
		$val = $CurrentForm->hasValue("RefDrName") ? $CurrentForm->getValue("RefDrName") : $CurrentForm->getValue("x_RefDrName");
		if (!$this->RefDrName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RefDrName->Visible = FALSE; // Disable update for API request
			else
				$this->RefDrName->setFormValue($val);
		}

		// Check field name 'RefDrMobileNo' first before field var 'x_RefDrMobileNo'
		$val = $CurrentForm->hasValue("RefDrMobileNo") ? $CurrentForm->getValue("RefDrMobileNo") : $CurrentForm->getValue("x_RefDrMobileNo");
		if (!$this->RefDrMobileNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RefDrMobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->RefDrMobileNo->setFormValue($val);
		}

		// Check field name 'NewVisitDate' first before field var 'x_NewVisitDate'
		$val = $CurrentForm->hasValue("NewVisitDate") ? $CurrentForm->getValue("NewVisitDate") : $CurrentForm->getValue("x_NewVisitDate");
		if (!$this->NewVisitDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NewVisitDate->Visible = FALSE; // Disable update for API request
			else
				$this->NewVisitDate->setFormValue($val);
			$this->NewVisitDate->CurrentValue = UnFormatDateTime($this->NewVisitDate->CurrentValue, 7);
		}

		// Check field name 'NewVisitYesNo' first before field var 'x_NewVisitYesNo'
		$val = $CurrentForm->hasValue("NewVisitYesNo") ? $CurrentForm->getValue("NewVisitYesNo") : $CurrentForm->getValue("x_NewVisitYesNo");
		if (!$this->NewVisitYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NewVisitYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->NewVisitYesNo->setFormValue($val);
		}

		// Check field name 'Treatment' first before field var 'x_Treatment'
		$val = $CurrentForm->hasValue("Treatment") ? $CurrentForm->getValue("Treatment") : $CurrentForm->getValue("x_Treatment");
		if (!$this->Treatment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Treatment->Visible = FALSE; // Disable update for API request
			else
				$this->Treatment->setFormValue($val);
		}

		// Check field name 'IUIDoneDate1' first before field var 'x_IUIDoneDate1'
		$val = $CurrentForm->hasValue("IUIDoneDate1") ? $CurrentForm->getValue("IUIDoneDate1") : $CurrentForm->getValue("x_IUIDoneDate1");
		if (!$this->IUIDoneDate1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneDate1->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneDate1->setFormValue($val);
			$this->IUIDoneDate1->CurrentValue = UnFormatDateTime($this->IUIDoneDate1->CurrentValue, 7);
		}

		// Check field name 'IUIDoneYesNo1' first before field var 'x_IUIDoneYesNo1'
		$val = $CurrentForm->hasValue("IUIDoneYesNo1") ? $CurrentForm->getValue("IUIDoneYesNo1") : $CurrentForm->getValue("x_IUIDoneYesNo1");
		if (!$this->IUIDoneYesNo1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneYesNo1->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneYesNo1->setFormValue($val);
		}

		// Check field name 'UPTTestDate1' first before field var 'x_UPTTestDate1'
		$val = $CurrentForm->hasValue("UPTTestDate1") ? $CurrentForm->getValue("UPTTestDate1") : $CurrentForm->getValue("x_UPTTestDate1");
		if (!$this->UPTTestDate1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestDate1->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestDate1->setFormValue($val);
			$this->UPTTestDate1->CurrentValue = UnFormatDateTime($this->UPTTestDate1->CurrentValue, 7);
		}

		// Check field name 'UPTTestYesNo1' first before field var 'x_UPTTestYesNo1'
		$val = $CurrentForm->hasValue("UPTTestYesNo1") ? $CurrentForm->getValue("UPTTestYesNo1") : $CurrentForm->getValue("x_UPTTestYesNo1");
		if (!$this->UPTTestYesNo1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestYesNo1->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestYesNo1->setFormValue($val);
		}

		// Check field name 'IUIDoneDate2' first before field var 'x_IUIDoneDate2'
		$val = $CurrentForm->hasValue("IUIDoneDate2") ? $CurrentForm->getValue("IUIDoneDate2") : $CurrentForm->getValue("x_IUIDoneDate2");
		if (!$this->IUIDoneDate2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneDate2->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneDate2->setFormValue($val);
			$this->IUIDoneDate2->CurrentValue = UnFormatDateTime($this->IUIDoneDate2->CurrentValue, 7);
		}

		// Check field name 'IUIDoneYesNo2' first before field var 'x_IUIDoneYesNo2'
		$val = $CurrentForm->hasValue("IUIDoneYesNo2") ? $CurrentForm->getValue("IUIDoneYesNo2") : $CurrentForm->getValue("x_IUIDoneYesNo2");
		if (!$this->IUIDoneYesNo2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneYesNo2->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneYesNo2->setFormValue($val);
		}

		// Check field name 'UPTTestDate2' first before field var 'x_UPTTestDate2'
		$val = $CurrentForm->hasValue("UPTTestDate2") ? $CurrentForm->getValue("UPTTestDate2") : $CurrentForm->getValue("x_UPTTestDate2");
		if (!$this->UPTTestDate2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestDate2->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestDate2->setFormValue($val);
			$this->UPTTestDate2->CurrentValue = UnFormatDateTime($this->UPTTestDate2->CurrentValue, 7);
		}

		// Check field name 'UPTTestYesNo2' first before field var 'x_UPTTestYesNo2'
		$val = $CurrentForm->hasValue("UPTTestYesNo2") ? $CurrentForm->getValue("UPTTestYesNo2") : $CurrentForm->getValue("x_UPTTestYesNo2");
		if (!$this->UPTTestYesNo2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestYesNo2->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestYesNo2->setFormValue($val);
		}

		// Check field name 'IUIDoneDate3' first before field var 'x_IUIDoneDate3'
		$val = $CurrentForm->hasValue("IUIDoneDate3") ? $CurrentForm->getValue("IUIDoneDate3") : $CurrentForm->getValue("x_IUIDoneDate3");
		if (!$this->IUIDoneDate3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneDate3->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneDate3->setFormValue($val);
			$this->IUIDoneDate3->CurrentValue = UnFormatDateTime($this->IUIDoneDate3->CurrentValue, 7);
		}

		// Check field name 'IUIDoneYesNo3' first before field var 'x_IUIDoneYesNo3'
		$val = $CurrentForm->hasValue("IUIDoneYesNo3") ? $CurrentForm->getValue("IUIDoneYesNo3") : $CurrentForm->getValue("x_IUIDoneYesNo3");
		if (!$this->IUIDoneYesNo3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneYesNo3->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneYesNo3->setFormValue($val);
		}

		// Check field name 'UPTTestDate3' first before field var 'x_UPTTestDate3'
		$val = $CurrentForm->hasValue("UPTTestDate3") ? $CurrentForm->getValue("UPTTestDate3") : $CurrentForm->getValue("x_UPTTestDate3");
		if (!$this->UPTTestDate3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestDate3->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestDate3->setFormValue($val);
			$this->UPTTestDate3->CurrentValue = UnFormatDateTime($this->UPTTestDate3->CurrentValue, 7);
		}

		// Check field name 'UPTTestYesNo3' first before field var 'x_UPTTestYesNo3'
		$val = $CurrentForm->hasValue("UPTTestYesNo3") ? $CurrentForm->getValue("UPTTestYesNo3") : $CurrentForm->getValue("x_UPTTestYesNo3");
		if (!$this->UPTTestYesNo3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestYesNo3->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestYesNo3->setFormValue($val);
		}

		// Check field name 'IUIDoneDate4' first before field var 'x_IUIDoneDate4'
		$val = $CurrentForm->hasValue("IUIDoneDate4") ? $CurrentForm->getValue("IUIDoneDate4") : $CurrentForm->getValue("x_IUIDoneDate4");
		if (!$this->IUIDoneDate4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneDate4->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneDate4->setFormValue($val);
			$this->IUIDoneDate4->CurrentValue = UnFormatDateTime($this->IUIDoneDate4->CurrentValue, 7);
		}

		// Check field name 'IUIDoneYesNo4' first before field var 'x_IUIDoneYesNo4'
		$val = $CurrentForm->hasValue("IUIDoneYesNo4") ? $CurrentForm->getValue("IUIDoneYesNo4") : $CurrentForm->getValue("x_IUIDoneYesNo4");
		if (!$this->IUIDoneYesNo4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUIDoneYesNo4->Visible = FALSE; // Disable update for API request
			else
				$this->IUIDoneYesNo4->setFormValue($val);
		}

		// Check field name 'UPTTestDate4' first before field var 'x_UPTTestDate4'
		$val = $CurrentForm->hasValue("UPTTestDate4") ? $CurrentForm->getValue("UPTTestDate4") : $CurrentForm->getValue("x_UPTTestDate4");
		if (!$this->UPTTestDate4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestDate4->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestDate4->setFormValue($val);
			$this->UPTTestDate4->CurrentValue = UnFormatDateTime($this->UPTTestDate4->CurrentValue, 7);
		}

		// Check field name 'UPTTestYesNo4' first before field var 'x_UPTTestYesNo4'
		$val = $CurrentForm->hasValue("UPTTestYesNo4") ? $CurrentForm->getValue("UPTTestYesNo4") : $CurrentForm->getValue("x_UPTTestYesNo4");
		if (!$this->UPTTestYesNo4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UPTTestYesNo4->Visible = FALSE; // Disable update for API request
			else
				$this->UPTTestYesNo4->setFormValue($val);
		}

		// Check field name 'IVFStimulationDate' first before field var 'x_IVFStimulationDate'
		$val = $CurrentForm->hasValue("IVFStimulationDate") ? $CurrentForm->getValue("IVFStimulationDate") : $CurrentForm->getValue("x_IVFStimulationDate");
		if (!$this->IVFStimulationDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IVFStimulationDate->Visible = FALSE; // Disable update for API request
			else
				$this->IVFStimulationDate->setFormValue($val);
			$this->IVFStimulationDate->CurrentValue = UnFormatDateTime($this->IVFStimulationDate->CurrentValue, 7);
		}

		// Check field name 'IVFStimulationYesNo' first before field var 'x_IVFStimulationYesNo'
		$val = $CurrentForm->hasValue("IVFStimulationYesNo") ? $CurrentForm->getValue("IVFStimulationYesNo") : $CurrentForm->getValue("x_IVFStimulationYesNo");
		if (!$this->IVFStimulationYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IVFStimulationYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->IVFStimulationYesNo->setFormValue($val);
		}

		// Check field name 'OPUDate' first before field var 'x_OPUDate'
		$val = $CurrentForm->hasValue("OPUDate") ? $CurrentForm->getValue("OPUDate") : $CurrentForm->getValue("x_OPUDate");
		if (!$this->OPUDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OPUDate->Visible = FALSE; // Disable update for API request
			else
				$this->OPUDate->setFormValue($val);
			$this->OPUDate->CurrentValue = UnFormatDateTime($this->OPUDate->CurrentValue, 7);
		}

		// Check field name 'OPUYesNo' first before field var 'x_OPUYesNo'
		$val = $CurrentForm->hasValue("OPUYesNo") ? $CurrentForm->getValue("OPUYesNo") : $CurrentForm->getValue("x_OPUYesNo");
		if (!$this->OPUYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OPUYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->OPUYesNo->setFormValue($val);
		}

		// Check field name 'ETDate' first before field var 'x_ETDate'
		$val = $CurrentForm->hasValue("ETDate") ? $CurrentForm->getValue("ETDate") : $CurrentForm->getValue("x_ETDate");
		if (!$this->ETDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ETDate->Visible = FALSE; // Disable update for API request
			else
				$this->ETDate->setFormValue($val);
			$this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 7);
		}

		// Check field name 'ETYesNo' first before field var 'x_ETYesNo'
		$val = $CurrentForm->hasValue("ETYesNo") ? $CurrentForm->getValue("ETYesNo") : $CurrentForm->getValue("x_ETYesNo");
		if (!$this->ETYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ETYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->ETYesNo->setFormValue($val);
		}

		// Check field name 'BetaHCGDate' first before field var 'x_BetaHCGDate'
		$val = $CurrentForm->hasValue("BetaHCGDate") ? $CurrentForm->getValue("BetaHCGDate") : $CurrentForm->getValue("x_BetaHCGDate");
		if (!$this->BetaHCGDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BetaHCGDate->Visible = FALSE; // Disable update for API request
			else
				$this->BetaHCGDate->setFormValue($val);
			$this->BetaHCGDate->CurrentValue = UnFormatDateTime($this->BetaHCGDate->CurrentValue, 7);
		}

		// Check field name 'BetaHCGYesNo' first before field var 'x_BetaHCGYesNo'
		$val = $CurrentForm->hasValue("BetaHCGYesNo") ? $CurrentForm->getValue("BetaHCGYesNo") : $CurrentForm->getValue("x_BetaHCGYesNo");
		if (!$this->BetaHCGYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BetaHCGYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->BetaHCGYesNo->setFormValue($val);
		}

		// Check field name 'FETDate' first before field var 'x_FETDate'
		$val = $CurrentForm->hasValue("FETDate") ? $CurrentForm->getValue("FETDate") : $CurrentForm->getValue("x_FETDate");
		if (!$this->FETDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FETDate->Visible = FALSE; // Disable update for API request
			else
				$this->FETDate->setFormValue($val);
			$this->FETDate->CurrentValue = UnFormatDateTime($this->FETDate->CurrentValue, 7);
		}

		// Check field name 'FETYesNo' first before field var 'x_FETYesNo'
		$val = $CurrentForm->hasValue("FETYesNo") ? $CurrentForm->getValue("FETYesNo") : $CurrentForm->getValue("x_FETYesNo");
		if (!$this->FETYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FETYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->FETYesNo->setFormValue($val);
		}

		// Check field name 'FBetaHCGDate' first before field var 'x_FBetaHCGDate'
		$val = $CurrentForm->hasValue("FBetaHCGDate") ? $CurrentForm->getValue("FBetaHCGDate") : $CurrentForm->getValue("x_FBetaHCGDate");
		if (!$this->FBetaHCGDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FBetaHCGDate->Visible = FALSE; // Disable update for API request
			else
				$this->FBetaHCGDate->setFormValue($val);
			$this->FBetaHCGDate->CurrentValue = UnFormatDateTime($this->FBetaHCGDate->CurrentValue, 7);
		}

		// Check field name 'FBetaHCGYesNo' first before field var 'x_FBetaHCGYesNo'
		$val = $CurrentForm->hasValue("FBetaHCGYesNo") ? $CurrentForm->getValue("FBetaHCGYesNo") : $CurrentForm->getValue("x_FBetaHCGYesNo");
		if (!$this->FBetaHCGYesNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FBetaHCGYesNo->Visible = FALSE; // Disable update for API request
			else
				$this->FBetaHCGYesNo->setFormValue($val);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PatId->CurrentValue = $this->PatId->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->MobileNo->CurrentValue = $this->MobileNo->FormValue;
		$this->ConsultantName->CurrentValue = $this->ConsultantName->FormValue;
		$this->RefDrName->CurrentValue = $this->RefDrName->FormValue;
		$this->RefDrMobileNo->CurrentValue = $this->RefDrMobileNo->FormValue;
		$this->NewVisitDate->CurrentValue = $this->NewVisitDate->FormValue;
		$this->NewVisitDate->CurrentValue = UnFormatDateTime($this->NewVisitDate->CurrentValue, 7);
		$this->NewVisitYesNo->CurrentValue = $this->NewVisitYesNo->FormValue;
		$this->Treatment->CurrentValue = $this->Treatment->FormValue;
		$this->IUIDoneDate1->CurrentValue = $this->IUIDoneDate1->FormValue;
		$this->IUIDoneDate1->CurrentValue = UnFormatDateTime($this->IUIDoneDate1->CurrentValue, 7);
		$this->IUIDoneYesNo1->CurrentValue = $this->IUIDoneYesNo1->FormValue;
		$this->UPTTestDate1->CurrentValue = $this->UPTTestDate1->FormValue;
		$this->UPTTestDate1->CurrentValue = UnFormatDateTime($this->UPTTestDate1->CurrentValue, 7);
		$this->UPTTestYesNo1->CurrentValue = $this->UPTTestYesNo1->FormValue;
		$this->IUIDoneDate2->CurrentValue = $this->IUIDoneDate2->FormValue;
		$this->IUIDoneDate2->CurrentValue = UnFormatDateTime($this->IUIDoneDate2->CurrentValue, 7);
		$this->IUIDoneYesNo2->CurrentValue = $this->IUIDoneYesNo2->FormValue;
		$this->UPTTestDate2->CurrentValue = $this->UPTTestDate2->FormValue;
		$this->UPTTestDate2->CurrentValue = UnFormatDateTime($this->UPTTestDate2->CurrentValue, 7);
		$this->UPTTestYesNo2->CurrentValue = $this->UPTTestYesNo2->FormValue;
		$this->IUIDoneDate3->CurrentValue = $this->IUIDoneDate3->FormValue;
		$this->IUIDoneDate3->CurrentValue = UnFormatDateTime($this->IUIDoneDate3->CurrentValue, 7);
		$this->IUIDoneYesNo3->CurrentValue = $this->IUIDoneYesNo3->FormValue;
		$this->UPTTestDate3->CurrentValue = $this->UPTTestDate3->FormValue;
		$this->UPTTestDate3->CurrentValue = UnFormatDateTime($this->UPTTestDate3->CurrentValue, 7);
		$this->UPTTestYesNo3->CurrentValue = $this->UPTTestYesNo3->FormValue;
		$this->IUIDoneDate4->CurrentValue = $this->IUIDoneDate4->FormValue;
		$this->IUIDoneDate4->CurrentValue = UnFormatDateTime($this->IUIDoneDate4->CurrentValue, 7);
		$this->IUIDoneYesNo4->CurrentValue = $this->IUIDoneYesNo4->FormValue;
		$this->UPTTestDate4->CurrentValue = $this->UPTTestDate4->FormValue;
		$this->UPTTestDate4->CurrentValue = UnFormatDateTime($this->UPTTestDate4->CurrentValue, 7);
		$this->UPTTestYesNo4->CurrentValue = $this->UPTTestYesNo4->FormValue;
		$this->IVFStimulationDate->CurrentValue = $this->IVFStimulationDate->FormValue;
		$this->IVFStimulationDate->CurrentValue = UnFormatDateTime($this->IVFStimulationDate->CurrentValue, 7);
		$this->IVFStimulationYesNo->CurrentValue = $this->IVFStimulationYesNo->FormValue;
		$this->OPUDate->CurrentValue = $this->OPUDate->FormValue;
		$this->OPUDate->CurrentValue = UnFormatDateTime($this->OPUDate->CurrentValue, 7);
		$this->OPUYesNo->CurrentValue = $this->OPUYesNo->FormValue;
		$this->ETDate->CurrentValue = $this->ETDate->FormValue;
		$this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 7);
		$this->ETYesNo->CurrentValue = $this->ETYesNo->FormValue;
		$this->BetaHCGDate->CurrentValue = $this->BetaHCGDate->FormValue;
		$this->BetaHCGDate->CurrentValue = UnFormatDateTime($this->BetaHCGDate->CurrentValue, 7);
		$this->BetaHCGYesNo->CurrentValue = $this->BetaHCGYesNo->FormValue;
		$this->FETDate->CurrentValue = $this->FETDate->FormValue;
		$this->FETDate->CurrentValue = UnFormatDateTime($this->FETDate->CurrentValue, 7);
		$this->FETYesNo->CurrentValue = $this->FETYesNo->FormValue;
		$this->FBetaHCGDate->CurrentValue = $this->FBetaHCGDate->FormValue;
		$this->FBetaHCGDate->CurrentValue = UnFormatDateTime($this->FBetaHCGDate->CurrentValue, 7);
		$this->FBetaHCGYesNo->CurrentValue = $this->FBetaHCGYesNo->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
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
		$this->PatId->setDbValue($row['PatId']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->MobileNo->setDbValue($row['MobileNo']);
		$this->ConsultantName->setDbValue($row['ConsultantName']);
		$this->RefDrName->setDbValue($row['RefDrName']);
		$this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
		$this->NewVisitDate->setDbValue($row['NewVisitDate']);
		$this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
		$this->Treatment->setDbValue($row['Treatment']);
		$this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
		$this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
		$this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
		$this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
		$this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
		$this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
		$this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
		$this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
		$this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
		$this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
		$this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
		$this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
		$this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
		$this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
		$this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
		$this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
		$this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
		$this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
		$this->OPUDate->setDbValue($row['OPUDate']);
		$this->OPUYesNo->setDbValue($row['OPUYesNo']);
		$this->ETDate->setDbValue($row['ETDate']);
		$this->ETYesNo->setDbValue($row['ETYesNo']);
		$this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
		$this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
		$this->FETDate->setDbValue($row['FETDate']);
		$this->FETYesNo->setDbValue($row['FETYesNo']);
		$this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
		$this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatId'] = $this->PatId->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['MobileNo'] = $this->MobileNo->CurrentValue;
		$row['ConsultantName'] = $this->ConsultantName->CurrentValue;
		$row['RefDrName'] = $this->RefDrName->CurrentValue;
		$row['RefDrMobileNo'] = $this->RefDrMobileNo->CurrentValue;
		$row['NewVisitDate'] = $this->NewVisitDate->CurrentValue;
		$row['NewVisitYesNo'] = $this->NewVisitYesNo->CurrentValue;
		$row['Treatment'] = $this->Treatment->CurrentValue;
		$row['IUIDoneDate1'] = $this->IUIDoneDate1->CurrentValue;
		$row['IUIDoneYesNo1'] = $this->IUIDoneYesNo1->CurrentValue;
		$row['UPTTestDate1'] = $this->UPTTestDate1->CurrentValue;
		$row['UPTTestYesNo1'] = $this->UPTTestYesNo1->CurrentValue;
		$row['IUIDoneDate2'] = $this->IUIDoneDate2->CurrentValue;
		$row['IUIDoneYesNo2'] = $this->IUIDoneYesNo2->CurrentValue;
		$row['UPTTestDate2'] = $this->UPTTestDate2->CurrentValue;
		$row['UPTTestYesNo2'] = $this->UPTTestYesNo2->CurrentValue;
		$row['IUIDoneDate3'] = $this->IUIDoneDate3->CurrentValue;
		$row['IUIDoneYesNo3'] = $this->IUIDoneYesNo3->CurrentValue;
		$row['UPTTestDate3'] = $this->UPTTestDate3->CurrentValue;
		$row['UPTTestYesNo3'] = $this->UPTTestYesNo3->CurrentValue;
		$row['IUIDoneDate4'] = $this->IUIDoneDate4->CurrentValue;
		$row['IUIDoneYesNo4'] = $this->IUIDoneYesNo4->CurrentValue;
		$row['UPTTestDate4'] = $this->UPTTestDate4->CurrentValue;
		$row['UPTTestYesNo4'] = $this->UPTTestYesNo4->CurrentValue;
		$row['IVFStimulationDate'] = $this->IVFStimulationDate->CurrentValue;
		$row['IVFStimulationYesNo'] = $this->IVFStimulationYesNo->CurrentValue;
		$row['OPUDate'] = $this->OPUDate->CurrentValue;
		$row['OPUYesNo'] = $this->OPUYesNo->CurrentValue;
		$row['ETDate'] = $this->ETDate->CurrentValue;
		$row['ETYesNo'] = $this->ETYesNo->CurrentValue;
		$row['BetaHCGDate'] = $this->BetaHCGDate->CurrentValue;
		$row['BetaHCGYesNo'] = $this->BetaHCGYesNo->CurrentValue;
		$row['FETDate'] = $this->FETDate->CurrentValue;
		$row['FETYesNo'] = $this->FETYesNo->CurrentValue;
		$row['FBetaHCGDate'] = $this->FBetaHCGDate->CurrentValue;
		$row['FBetaHCGYesNo'] = $this->FBetaHCGYesNo->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
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
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// PatId
		// PatientId
		// PatientName
		// Age
		// MobileNo
		// ConsultantName
		// RefDrName
		// RefDrMobileNo
		// NewVisitDate
		// NewVisitYesNo
		// Treatment
		// IUIDoneDate1
		// IUIDoneYesNo1
		// UPTTestDate1
		// UPTTestYesNo1
		// IUIDoneDate2
		// IUIDoneYesNo2
		// UPTTestDate2
		// UPTTestYesNo2
		// IUIDoneDate3
		// IUIDoneYesNo3
		// UPTTestDate3
		// UPTTestYesNo3
		// IUIDoneDate4
		// IUIDoneYesNo4
		// UPTTestDate4
		// UPTTestYesNo4
		// IVFStimulationDate
		// IVFStimulationYesNo
		// OPUDate
		// OPUYesNo
		// ETDate
		// ETYesNo
		// BetaHCGDate
		// BetaHCGYesNo
		// FETDate
		// FETYesNo
		// FBetaHCGDate
		// FBetaHCGYesNo
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatId
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal != "") {
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->ViewValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->ViewValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// MobileNo
			$this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
			$this->MobileNo->ViewCustomAttributes = "";

			// ConsultantName
			$this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
			$this->ConsultantName->ViewCustomAttributes = "";

			// RefDrName
			$this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
			$this->RefDrName->ViewCustomAttributes = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
			$this->RefDrMobileNo->ViewCustomAttributes = "";

			// NewVisitDate
			$this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
			$this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 7);
			$this->NewVisitDate->ViewCustomAttributes = "";

			// NewVisitYesNo
			if (strval($this->NewVisitYesNo->CurrentValue) != "") {
				$this->NewVisitYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->NewVisitYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->NewVisitYesNo->ViewValue->add($this->NewVisitYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->NewVisitYesNo->ViewValue = NULL;
			}
			$this->NewVisitYesNo->ViewCustomAttributes = "";

			// Treatment
			if (strval($this->Treatment->CurrentValue) != "") {
				$this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
			} else {
				$this->Treatment->ViewValue = NULL;
			}
			$this->Treatment->ViewCustomAttributes = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
			$this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 7);
			$this->IUIDoneDate1->ViewCustomAttributes = "";

			// IUIDoneYesNo1
			if (strval($this->IUIDoneYesNo1->CurrentValue) != "") {
				$this->IUIDoneYesNo1->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo1->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo1->ViewValue->add($this->IUIDoneYesNo1->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo1->ViewValue = NULL;
			}
			$this->IUIDoneYesNo1->ViewCustomAttributes = "";

			// UPTTestDate1
			$this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
			$this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 7);
			$this->UPTTestDate1->ViewCustomAttributes = "";

			// UPTTestYesNo1
			if (strval($this->UPTTestYesNo1->CurrentValue) != "") {
				$this->UPTTestYesNo1->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo1->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo1->ViewValue->add($this->UPTTestYesNo1->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo1->ViewValue = NULL;
			}
			$this->UPTTestYesNo1->ViewCustomAttributes = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
			$this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 7);
			$this->IUIDoneDate2->ViewCustomAttributes = "";

			// IUIDoneYesNo2
			if (strval($this->IUIDoneYesNo2->CurrentValue) != "") {
				$this->IUIDoneYesNo2->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo2->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo2->ViewValue->add($this->IUIDoneYesNo2->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo2->ViewValue = NULL;
			}
			$this->IUIDoneYesNo2->ViewCustomAttributes = "";

			// UPTTestDate2
			$this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
			$this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 7);
			$this->UPTTestDate2->ViewCustomAttributes = "";

			// UPTTestYesNo2
			if (strval($this->UPTTestYesNo2->CurrentValue) != "") {
				$this->UPTTestYesNo2->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo2->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo2->ViewValue->add($this->UPTTestYesNo2->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo2->ViewValue = NULL;
			}
			$this->UPTTestYesNo2->ViewCustomAttributes = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
			$this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 7);
			$this->IUIDoneDate3->ViewCustomAttributes = "";

			// IUIDoneYesNo3
			if (strval($this->IUIDoneYesNo3->CurrentValue) != "") {
				$this->IUIDoneYesNo3->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo3->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo3->ViewValue->add($this->IUIDoneYesNo3->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo3->ViewValue = NULL;
			}
			$this->IUIDoneYesNo3->ViewCustomAttributes = "";

			// UPTTestDate3
			$this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
			$this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 7);
			$this->UPTTestDate3->ViewCustomAttributes = "";

			// UPTTestYesNo3
			if (strval($this->UPTTestYesNo3->CurrentValue) != "") {
				$this->UPTTestYesNo3->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo3->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo3->ViewValue->add($this->UPTTestYesNo3->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo3->ViewValue = NULL;
			}
			$this->UPTTestYesNo3->ViewCustomAttributes = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
			$this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 7);
			$this->IUIDoneDate4->ViewCustomAttributes = "";

			// IUIDoneYesNo4
			if (strval($this->IUIDoneYesNo4->CurrentValue) != "") {
				$this->IUIDoneYesNo4->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IUIDoneYesNo4->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IUIDoneYesNo4->ViewValue->add($this->IUIDoneYesNo4->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IUIDoneYesNo4->ViewValue = NULL;
			}
			$this->IUIDoneYesNo4->ViewCustomAttributes = "";

			// UPTTestDate4
			$this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
			$this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 7);
			$this->UPTTestDate4->ViewCustomAttributes = "";

			// UPTTestYesNo4
			if (strval($this->UPTTestYesNo4->CurrentValue) != "") {
				$this->UPTTestYesNo4->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->UPTTestYesNo4->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->UPTTestYesNo4->ViewValue->add($this->UPTTestYesNo4->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->UPTTestYesNo4->ViewValue = NULL;
			}
			$this->UPTTestYesNo4->ViewCustomAttributes = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
			$this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 7);
			$this->IVFStimulationDate->ViewCustomAttributes = "";

			// IVFStimulationYesNo
			if (strval($this->IVFStimulationYesNo->CurrentValue) != "") {
				$this->IVFStimulationYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IVFStimulationYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IVFStimulationYesNo->ViewValue->add($this->IVFStimulationYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IVFStimulationYesNo->ViewValue = NULL;
			}
			$this->IVFStimulationYesNo->ViewCustomAttributes = "";

			// OPUDate
			$this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
			$this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 7);
			$this->OPUDate->ViewCustomAttributes = "";

			// OPUYesNo
			if (strval($this->OPUYesNo->CurrentValue) != "") {
				$this->OPUYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OPUYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OPUYesNo->ViewValue->add($this->OPUYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OPUYesNo->ViewValue = NULL;
			}
			$this->OPUYesNo->ViewCustomAttributes = "";

			// ETDate
			$this->ETDate->ViewValue = $this->ETDate->CurrentValue;
			$this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 7);
			$this->ETDate->ViewCustomAttributes = "";

			// ETYesNo
			if (strval($this->ETYesNo->CurrentValue) != "") {
				$this->ETYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ETYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ETYesNo->ViewValue->add($this->ETYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ETYesNo->ViewValue = NULL;
			}
			$this->ETYesNo->ViewCustomAttributes = "";

			// BetaHCGDate
			$this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
			$this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 7);
			$this->BetaHCGDate->ViewCustomAttributes = "";

			// BetaHCGYesNo
			if (strval($this->BetaHCGYesNo->CurrentValue) != "") {
				$this->BetaHCGYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->BetaHCGYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->BetaHCGYesNo->ViewValue->add($this->BetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->BetaHCGYesNo->ViewValue = NULL;
			}
			$this->BetaHCGYesNo->ViewCustomAttributes = "";

			// FETDate
			$this->FETDate->ViewValue = $this->FETDate->CurrentValue;
			$this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 7);
			$this->FETDate->ViewCustomAttributes = "";

			// FETYesNo
			if (strval($this->FETYesNo->CurrentValue) != "") {
				$this->FETYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FETYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FETYesNo->ViewValue->add($this->FETYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FETYesNo->ViewValue = NULL;
			}
			$this->FETYesNo->ViewCustomAttributes = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
			$this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 7);
			$this->FBetaHCGDate->ViewCustomAttributes = "";

			// FBetaHCGYesNo
			if (strval($this->FBetaHCGYesNo->CurrentValue) != "") {
				$this->FBetaHCGYesNo->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->FBetaHCGYesNo->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->FBetaHCGYesNo->ViewValue->add($this->FBetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->FBetaHCGYesNo->ViewValue = NULL;
			}
			$this->FBetaHCGYesNo->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// MobileNo
			$this->MobileNo->LinkCustomAttributes = "";
			$this->MobileNo->HrefValue = "";
			$this->MobileNo->TooltipValue = "";

			// ConsultantName
			$this->ConsultantName->LinkCustomAttributes = "";
			$this->ConsultantName->HrefValue = "";
			$this->ConsultantName->TooltipValue = "";

			// RefDrName
			$this->RefDrName->LinkCustomAttributes = "";
			$this->RefDrName->HrefValue = "";
			$this->RefDrName->TooltipValue = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->LinkCustomAttributes = "";
			$this->RefDrMobileNo->HrefValue = "";
			$this->RefDrMobileNo->TooltipValue = "";

			// NewVisitDate
			$this->NewVisitDate->LinkCustomAttributes = "";
			$this->NewVisitDate->HrefValue = "";
			$this->NewVisitDate->TooltipValue = "";

			// NewVisitYesNo
			$this->NewVisitYesNo->LinkCustomAttributes = "";
			$this->NewVisitYesNo->HrefValue = "";
			$this->NewVisitYesNo->TooltipValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";
			$this->Treatment->TooltipValue = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->LinkCustomAttributes = "";
			$this->IUIDoneDate1->HrefValue = "";
			$this->IUIDoneDate1->TooltipValue = "";

			// IUIDoneYesNo1
			$this->IUIDoneYesNo1->LinkCustomAttributes = "";
			$this->IUIDoneYesNo1->HrefValue = "";
			$this->IUIDoneYesNo1->TooltipValue = "";

			// UPTTestDate1
			$this->UPTTestDate1->LinkCustomAttributes = "";
			$this->UPTTestDate1->HrefValue = "";
			$this->UPTTestDate1->TooltipValue = "";

			// UPTTestYesNo1
			$this->UPTTestYesNo1->LinkCustomAttributes = "";
			$this->UPTTestYesNo1->HrefValue = "";
			$this->UPTTestYesNo1->TooltipValue = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->LinkCustomAttributes = "";
			$this->IUIDoneDate2->HrefValue = "";
			$this->IUIDoneDate2->TooltipValue = "";

			// IUIDoneYesNo2
			$this->IUIDoneYesNo2->LinkCustomAttributes = "";
			$this->IUIDoneYesNo2->HrefValue = "";
			$this->IUIDoneYesNo2->TooltipValue = "";

			// UPTTestDate2
			$this->UPTTestDate2->LinkCustomAttributes = "";
			$this->UPTTestDate2->HrefValue = "";
			$this->UPTTestDate2->TooltipValue = "";

			// UPTTestYesNo2
			$this->UPTTestYesNo2->LinkCustomAttributes = "";
			$this->UPTTestYesNo2->HrefValue = "";
			$this->UPTTestYesNo2->TooltipValue = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->LinkCustomAttributes = "";
			$this->IUIDoneDate3->HrefValue = "";
			$this->IUIDoneDate3->TooltipValue = "";

			// IUIDoneYesNo3
			$this->IUIDoneYesNo3->LinkCustomAttributes = "";
			$this->IUIDoneYesNo3->HrefValue = "";
			$this->IUIDoneYesNo3->TooltipValue = "";

			// UPTTestDate3
			$this->UPTTestDate3->LinkCustomAttributes = "";
			$this->UPTTestDate3->HrefValue = "";
			$this->UPTTestDate3->TooltipValue = "";

			// UPTTestYesNo3
			$this->UPTTestYesNo3->LinkCustomAttributes = "";
			$this->UPTTestYesNo3->HrefValue = "";
			$this->UPTTestYesNo3->TooltipValue = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->LinkCustomAttributes = "";
			$this->IUIDoneDate4->HrefValue = "";
			$this->IUIDoneDate4->TooltipValue = "";

			// IUIDoneYesNo4
			$this->IUIDoneYesNo4->LinkCustomAttributes = "";
			$this->IUIDoneYesNo4->HrefValue = "";
			$this->IUIDoneYesNo4->TooltipValue = "";

			// UPTTestDate4
			$this->UPTTestDate4->LinkCustomAttributes = "";
			$this->UPTTestDate4->HrefValue = "";
			$this->UPTTestDate4->TooltipValue = "";

			// UPTTestYesNo4
			$this->UPTTestYesNo4->LinkCustomAttributes = "";
			$this->UPTTestYesNo4->HrefValue = "";
			$this->UPTTestYesNo4->TooltipValue = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->LinkCustomAttributes = "";
			$this->IVFStimulationDate->HrefValue = "";
			$this->IVFStimulationDate->TooltipValue = "";

			// IVFStimulationYesNo
			$this->IVFStimulationYesNo->LinkCustomAttributes = "";
			$this->IVFStimulationYesNo->HrefValue = "";
			$this->IVFStimulationYesNo->TooltipValue = "";

			// OPUDate
			$this->OPUDate->LinkCustomAttributes = "";
			$this->OPUDate->HrefValue = "";
			$this->OPUDate->TooltipValue = "";

			// OPUYesNo
			$this->OPUYesNo->LinkCustomAttributes = "";
			$this->OPUYesNo->HrefValue = "";
			$this->OPUYesNo->TooltipValue = "";

			// ETDate
			$this->ETDate->LinkCustomAttributes = "";
			$this->ETDate->HrefValue = "";
			$this->ETDate->TooltipValue = "";

			// ETYesNo
			$this->ETYesNo->LinkCustomAttributes = "";
			$this->ETYesNo->HrefValue = "";
			$this->ETYesNo->TooltipValue = "";

			// BetaHCGDate
			$this->BetaHCGDate->LinkCustomAttributes = "";
			$this->BetaHCGDate->HrefValue = "";
			$this->BetaHCGDate->TooltipValue = "";

			// BetaHCGYesNo
			$this->BetaHCGYesNo->LinkCustomAttributes = "";
			$this->BetaHCGYesNo->HrefValue = "";
			$this->BetaHCGYesNo->TooltipValue = "";

			// FETDate
			$this->FETDate->LinkCustomAttributes = "";
			$this->FETDate->HrefValue = "";
			$this->FETDate->TooltipValue = "";

			// FETYesNo
			$this->FETYesNo->LinkCustomAttributes = "";
			$this->FETYesNo->HrefValue = "";
			$this->FETYesNo->TooltipValue = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->LinkCustomAttributes = "";
			$this->FBetaHCGDate->HrefValue = "";
			$this->FBetaHCGDate->TooltipValue = "";

			// FBetaHCGYesNo
			$this->FBetaHCGYesNo->LinkCustomAttributes = "";
			$this->FBetaHCGYesNo->HrefValue = "";
			$this->FBetaHCGYesNo->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PatId
			$this->PatId->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatId->CurrentValue));
			if ($curVal != "")
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
			else
				$this->PatId->ViewValue = $this->PatId->Lookup !== NULL && is_array($this->PatId->Lookup->Options) ? $curVal : NULL;
			if ($this->PatId->ViewValue !== NULL) { // Load from cache
				$this->PatId->EditValue = array_values($this->PatId->Lookup->Options);
				if ($this->PatId->ViewValue == "")
					$this->PatId->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PatId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PatId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
				} else {
					$this->PatId->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PatId->EditValue = $arwrk;
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// MobileNo
			$this->MobileNo->EditAttrs["class"] = "form-control";
			$this->MobileNo->EditCustomAttributes = "";
			if (!$this->MobileNo->Raw)
				$this->MobileNo->CurrentValue = HtmlDecode($this->MobileNo->CurrentValue);
			$this->MobileNo->EditValue = HtmlEncode($this->MobileNo->CurrentValue);
			$this->MobileNo->PlaceHolder = RemoveHtml($this->MobileNo->caption());

			// ConsultantName
			$this->ConsultantName->EditAttrs["class"] = "form-control";
			$this->ConsultantName->EditCustomAttributes = "";
			if (!$this->ConsultantName->Raw)
				$this->ConsultantName->CurrentValue = HtmlDecode($this->ConsultantName->CurrentValue);
			$this->ConsultantName->EditValue = HtmlEncode($this->ConsultantName->CurrentValue);
			$this->ConsultantName->PlaceHolder = RemoveHtml($this->ConsultantName->caption());

			// RefDrName
			$this->RefDrName->EditAttrs["class"] = "form-control";
			$this->RefDrName->EditCustomAttributes = "";
			if (!$this->RefDrName->Raw)
				$this->RefDrName->CurrentValue = HtmlDecode($this->RefDrName->CurrentValue);
			$this->RefDrName->EditValue = HtmlEncode($this->RefDrName->CurrentValue);
			$this->RefDrName->PlaceHolder = RemoveHtml($this->RefDrName->caption());

			// RefDrMobileNo
			$this->RefDrMobileNo->EditAttrs["class"] = "form-control";
			$this->RefDrMobileNo->EditCustomAttributes = "";
			if (!$this->RefDrMobileNo->Raw)
				$this->RefDrMobileNo->CurrentValue = HtmlDecode($this->RefDrMobileNo->CurrentValue);
			$this->RefDrMobileNo->EditValue = HtmlEncode($this->RefDrMobileNo->CurrentValue);
			$this->RefDrMobileNo->PlaceHolder = RemoveHtml($this->RefDrMobileNo->caption());

			// NewVisitDate
			$this->NewVisitDate->EditAttrs["class"] = "form-control";
			$this->NewVisitDate->EditCustomAttributes = "";
			$this->NewVisitDate->EditValue = HtmlEncode(FormatDateTime($this->NewVisitDate->CurrentValue, 7));
			$this->NewVisitDate->PlaceHolder = RemoveHtml($this->NewVisitDate->caption());

			// NewVisitYesNo
			$this->NewVisitYesNo->EditCustomAttributes = "";
			$this->NewVisitYesNo->EditValue = $this->NewVisitYesNo->options(FALSE);

			// Treatment
			$this->Treatment->EditAttrs["class"] = "form-control";
			$this->Treatment->EditCustomAttributes = "";
			$this->Treatment->EditValue = $this->Treatment->options(TRUE);

			// IUIDoneDate1
			$this->IUIDoneDate1->EditAttrs["class"] = "form-control";
			$this->IUIDoneDate1->EditCustomAttributes = "";
			$this->IUIDoneDate1->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate1->CurrentValue, 7));
			$this->IUIDoneDate1->PlaceHolder = RemoveHtml($this->IUIDoneDate1->caption());

			// IUIDoneYesNo1
			$this->IUIDoneYesNo1->EditCustomAttributes = "";
			$this->IUIDoneYesNo1->EditValue = $this->IUIDoneYesNo1->options(FALSE);

			// UPTTestDate1
			$this->UPTTestDate1->EditAttrs["class"] = "form-control";
			$this->UPTTestDate1->EditCustomAttributes = "";
			$this->UPTTestDate1->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate1->CurrentValue, 7));
			$this->UPTTestDate1->PlaceHolder = RemoveHtml($this->UPTTestDate1->caption());

			// UPTTestYesNo1
			$this->UPTTestYesNo1->EditCustomAttributes = "";
			$this->UPTTestYesNo1->EditValue = $this->UPTTestYesNo1->options(FALSE);

			// IUIDoneDate2
			$this->IUIDoneDate2->EditAttrs["class"] = "form-control";
			$this->IUIDoneDate2->EditCustomAttributes = "";
			$this->IUIDoneDate2->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate2->CurrentValue, 7));
			$this->IUIDoneDate2->PlaceHolder = RemoveHtml($this->IUIDoneDate2->caption());

			// IUIDoneYesNo2
			$this->IUIDoneYesNo2->EditCustomAttributes = "";
			$this->IUIDoneYesNo2->EditValue = $this->IUIDoneYesNo2->options(FALSE);

			// UPTTestDate2
			$this->UPTTestDate2->EditAttrs["class"] = "form-control";
			$this->UPTTestDate2->EditCustomAttributes = "";
			$this->UPTTestDate2->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate2->CurrentValue, 7));
			$this->UPTTestDate2->PlaceHolder = RemoveHtml($this->UPTTestDate2->caption());

			// UPTTestYesNo2
			$this->UPTTestYesNo2->EditCustomAttributes = "";
			$this->UPTTestYesNo2->EditValue = $this->UPTTestYesNo2->options(FALSE);

			// IUIDoneDate3
			$this->IUIDoneDate3->EditAttrs["class"] = "form-control";
			$this->IUIDoneDate3->EditCustomAttributes = "";
			$this->IUIDoneDate3->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate3->CurrentValue, 7));
			$this->IUIDoneDate3->PlaceHolder = RemoveHtml($this->IUIDoneDate3->caption());

			// IUIDoneYesNo3
			$this->IUIDoneYesNo3->EditCustomAttributes = "";
			$this->IUIDoneYesNo3->EditValue = $this->IUIDoneYesNo3->options(FALSE);

			// UPTTestDate3
			$this->UPTTestDate3->EditAttrs["class"] = "form-control";
			$this->UPTTestDate3->EditCustomAttributes = "";
			$this->UPTTestDate3->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate3->CurrentValue, 7));
			$this->UPTTestDate3->PlaceHolder = RemoveHtml($this->UPTTestDate3->caption());

			// UPTTestYesNo3
			$this->UPTTestYesNo3->EditCustomAttributes = "";
			$this->UPTTestYesNo3->EditValue = $this->UPTTestYesNo3->options(FALSE);

			// IUIDoneDate4
			$this->IUIDoneDate4->EditAttrs["class"] = "form-control";
			$this->IUIDoneDate4->EditCustomAttributes = "";
			$this->IUIDoneDate4->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate4->CurrentValue, 7));
			$this->IUIDoneDate4->PlaceHolder = RemoveHtml($this->IUIDoneDate4->caption());

			// IUIDoneYesNo4
			$this->IUIDoneYesNo4->EditCustomAttributes = "";
			$this->IUIDoneYesNo4->EditValue = $this->IUIDoneYesNo4->options(FALSE);

			// UPTTestDate4
			$this->UPTTestDate4->EditAttrs["class"] = "form-control";
			$this->UPTTestDate4->EditCustomAttributes = "";
			$this->UPTTestDate4->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate4->CurrentValue, 7));
			$this->UPTTestDate4->PlaceHolder = RemoveHtml($this->UPTTestDate4->caption());

			// UPTTestYesNo4
			$this->UPTTestYesNo4->EditCustomAttributes = "";
			$this->UPTTestYesNo4->EditValue = $this->UPTTestYesNo4->options(FALSE);

			// IVFStimulationDate
			$this->IVFStimulationDate->EditAttrs["class"] = "form-control";
			$this->IVFStimulationDate->EditCustomAttributes = "";
			$this->IVFStimulationDate->EditValue = HtmlEncode(FormatDateTime($this->IVFStimulationDate->CurrentValue, 7));
			$this->IVFStimulationDate->PlaceHolder = RemoveHtml($this->IVFStimulationDate->caption());

			// IVFStimulationYesNo
			$this->IVFStimulationYesNo->EditCustomAttributes = "";
			$this->IVFStimulationYesNo->EditValue = $this->IVFStimulationYesNo->options(FALSE);

			// OPUDate
			$this->OPUDate->EditAttrs["class"] = "form-control";
			$this->OPUDate->EditCustomAttributes = "";
			$this->OPUDate->EditValue = HtmlEncode(FormatDateTime($this->OPUDate->CurrentValue, 7));
			$this->OPUDate->PlaceHolder = RemoveHtml($this->OPUDate->caption());

			// OPUYesNo
			$this->OPUYesNo->EditCustomAttributes = "";
			$this->OPUYesNo->EditValue = $this->OPUYesNo->options(FALSE);

			// ETDate
			$this->ETDate->EditAttrs["class"] = "form-control";
			$this->ETDate->EditCustomAttributes = "";
			$this->ETDate->EditValue = HtmlEncode(FormatDateTime($this->ETDate->CurrentValue, 7));
			$this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

			// ETYesNo
			$this->ETYesNo->EditCustomAttributes = "";
			$this->ETYesNo->EditValue = $this->ETYesNo->options(FALSE);

			// BetaHCGDate
			$this->BetaHCGDate->EditAttrs["class"] = "form-control";
			$this->BetaHCGDate->EditCustomAttributes = "";
			$this->BetaHCGDate->EditValue = HtmlEncode(FormatDateTime($this->BetaHCGDate->CurrentValue, 7));
			$this->BetaHCGDate->PlaceHolder = RemoveHtml($this->BetaHCGDate->caption());

			// BetaHCGYesNo
			$this->BetaHCGYesNo->EditCustomAttributes = "";
			$this->BetaHCGYesNo->EditValue = $this->BetaHCGYesNo->options(FALSE);

			// FETDate
			$this->FETDate->EditAttrs["class"] = "form-control";
			$this->FETDate->EditCustomAttributes = "";
			$this->FETDate->EditValue = HtmlEncode(FormatDateTime($this->FETDate->CurrentValue, 7));
			$this->FETDate->PlaceHolder = RemoveHtml($this->FETDate->caption());

			// FETYesNo
			$this->FETYesNo->EditCustomAttributes = "";
			$this->FETYesNo->EditValue = $this->FETYesNo->options(FALSE);

			// FBetaHCGDate
			$this->FBetaHCGDate->EditAttrs["class"] = "form-control";
			$this->FBetaHCGDate->EditCustomAttributes = "";
			$this->FBetaHCGDate->EditValue = HtmlEncode(FormatDateTime($this->FBetaHCGDate->CurrentValue, 7));
			$this->FBetaHCGDate->PlaceHolder = RemoveHtml($this->FBetaHCGDate->caption());

			// FBetaHCGYesNo
			$this->FBetaHCGYesNo->EditCustomAttributes = "";
			$this->FBetaHCGYesNo->EditValue = $this->FBetaHCGYesNo->options(FALSE);

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// HospID
			// Add refer script
			// PatId

			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// MobileNo
			$this->MobileNo->LinkCustomAttributes = "";
			$this->MobileNo->HrefValue = "";

			// ConsultantName
			$this->ConsultantName->LinkCustomAttributes = "";
			$this->ConsultantName->HrefValue = "";

			// RefDrName
			$this->RefDrName->LinkCustomAttributes = "";
			$this->RefDrName->HrefValue = "";

			// RefDrMobileNo
			$this->RefDrMobileNo->LinkCustomAttributes = "";
			$this->RefDrMobileNo->HrefValue = "";

			// NewVisitDate
			$this->NewVisitDate->LinkCustomAttributes = "";
			$this->NewVisitDate->HrefValue = "";

			// NewVisitYesNo
			$this->NewVisitYesNo->LinkCustomAttributes = "";
			$this->NewVisitYesNo->HrefValue = "";

			// Treatment
			$this->Treatment->LinkCustomAttributes = "";
			$this->Treatment->HrefValue = "";

			// IUIDoneDate1
			$this->IUIDoneDate1->LinkCustomAttributes = "";
			$this->IUIDoneDate1->HrefValue = "";

			// IUIDoneYesNo1
			$this->IUIDoneYesNo1->LinkCustomAttributes = "";
			$this->IUIDoneYesNo1->HrefValue = "";

			// UPTTestDate1
			$this->UPTTestDate1->LinkCustomAttributes = "";
			$this->UPTTestDate1->HrefValue = "";

			// UPTTestYesNo1
			$this->UPTTestYesNo1->LinkCustomAttributes = "";
			$this->UPTTestYesNo1->HrefValue = "";

			// IUIDoneDate2
			$this->IUIDoneDate2->LinkCustomAttributes = "";
			$this->IUIDoneDate2->HrefValue = "";

			// IUIDoneYesNo2
			$this->IUIDoneYesNo2->LinkCustomAttributes = "";
			$this->IUIDoneYesNo2->HrefValue = "";

			// UPTTestDate2
			$this->UPTTestDate2->LinkCustomAttributes = "";
			$this->UPTTestDate2->HrefValue = "";

			// UPTTestYesNo2
			$this->UPTTestYesNo2->LinkCustomAttributes = "";
			$this->UPTTestYesNo2->HrefValue = "";

			// IUIDoneDate3
			$this->IUIDoneDate3->LinkCustomAttributes = "";
			$this->IUIDoneDate3->HrefValue = "";

			// IUIDoneYesNo3
			$this->IUIDoneYesNo3->LinkCustomAttributes = "";
			$this->IUIDoneYesNo3->HrefValue = "";

			// UPTTestDate3
			$this->UPTTestDate3->LinkCustomAttributes = "";
			$this->UPTTestDate3->HrefValue = "";

			// UPTTestYesNo3
			$this->UPTTestYesNo3->LinkCustomAttributes = "";
			$this->UPTTestYesNo3->HrefValue = "";

			// IUIDoneDate4
			$this->IUIDoneDate4->LinkCustomAttributes = "";
			$this->IUIDoneDate4->HrefValue = "";

			// IUIDoneYesNo4
			$this->IUIDoneYesNo4->LinkCustomAttributes = "";
			$this->IUIDoneYesNo4->HrefValue = "";

			// UPTTestDate4
			$this->UPTTestDate4->LinkCustomAttributes = "";
			$this->UPTTestDate4->HrefValue = "";

			// UPTTestYesNo4
			$this->UPTTestYesNo4->LinkCustomAttributes = "";
			$this->UPTTestYesNo4->HrefValue = "";

			// IVFStimulationDate
			$this->IVFStimulationDate->LinkCustomAttributes = "";
			$this->IVFStimulationDate->HrefValue = "";

			// IVFStimulationYesNo
			$this->IVFStimulationYesNo->LinkCustomAttributes = "";
			$this->IVFStimulationYesNo->HrefValue = "";

			// OPUDate
			$this->OPUDate->LinkCustomAttributes = "";
			$this->OPUDate->HrefValue = "";

			// OPUYesNo
			$this->OPUYesNo->LinkCustomAttributes = "";
			$this->OPUYesNo->HrefValue = "";

			// ETDate
			$this->ETDate->LinkCustomAttributes = "";
			$this->ETDate->HrefValue = "";

			// ETYesNo
			$this->ETYesNo->LinkCustomAttributes = "";
			$this->ETYesNo->HrefValue = "";

			// BetaHCGDate
			$this->BetaHCGDate->LinkCustomAttributes = "";
			$this->BetaHCGDate->HrefValue = "";

			// BetaHCGYesNo
			$this->BetaHCGYesNo->LinkCustomAttributes = "";
			$this->BetaHCGYesNo->HrefValue = "";

			// FETDate
			$this->FETDate->LinkCustomAttributes = "";
			$this->FETDate->HrefValue = "";

			// FETYesNo
			$this->FETYesNo->LinkCustomAttributes = "";
			$this->FETYesNo->HrefValue = "";

			// FBetaHCGDate
			$this->FBetaHCGDate->LinkCustomAttributes = "";
			$this->FBetaHCGDate->HrefValue = "";

			// FBetaHCGYesNo
			$this->FBetaHCGYesNo->LinkCustomAttributes = "";
			$this->FBetaHCGYesNo->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

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
		if ($this->PatId->Required) {
			if (!$this->PatId->IsDetailKey && $this->PatId->FormValue != NULL && $this->PatId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->MobileNo->Required) {
			if (!$this->MobileNo->IsDetailKey && $this->MobileNo->FormValue != NULL && $this->MobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNo->caption(), $this->MobileNo->RequiredErrorMessage));
			}
		}
		if ($this->ConsultantName->Required) {
			if (!$this->ConsultantName->IsDetailKey && $this->ConsultantName->FormValue != NULL && $this->ConsultantName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ConsultantName->caption(), $this->ConsultantName->RequiredErrorMessage));
			}
		}
		if ($this->RefDrName->Required) {
			if (!$this->RefDrName->IsDetailKey && $this->RefDrName->FormValue != NULL && $this->RefDrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefDrName->caption(), $this->RefDrName->RequiredErrorMessage));
			}
		}
		if ($this->RefDrMobileNo->Required) {
			if (!$this->RefDrMobileNo->IsDetailKey && $this->RefDrMobileNo->FormValue != NULL && $this->RefDrMobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefDrMobileNo->caption(), $this->RefDrMobileNo->RequiredErrorMessage));
			}
		}
		if ($this->NewVisitDate->Required) {
			if (!$this->NewVisitDate->IsDetailKey && $this->NewVisitDate->FormValue != NULL && $this->NewVisitDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NewVisitDate->caption(), $this->NewVisitDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->NewVisitDate->FormValue)) {
			AddMessage($FormError, $this->NewVisitDate->errorMessage());
		}
		if ($this->NewVisitYesNo->Required) {
			if ($this->NewVisitYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NewVisitYesNo->caption(), $this->NewVisitYesNo->RequiredErrorMessage));
			}
		}
		if ($this->Treatment->Required) {
			if (!$this->Treatment->IsDetailKey && $this->Treatment->FormValue != NULL && $this->Treatment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
			}
		}
		if ($this->IUIDoneDate1->Required) {
			if (!$this->IUIDoneDate1->IsDetailKey && $this->IUIDoneDate1->FormValue != NULL && $this->IUIDoneDate1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneDate1->caption(), $this->IUIDoneDate1->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->IUIDoneDate1->FormValue)) {
			AddMessage($FormError, $this->IUIDoneDate1->errorMessage());
		}
		if ($this->IUIDoneYesNo1->Required) {
			if ($this->IUIDoneYesNo1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneYesNo1->caption(), $this->IUIDoneYesNo1->RequiredErrorMessage));
			}
		}
		if ($this->UPTTestDate1->Required) {
			if (!$this->UPTTestDate1->IsDetailKey && $this->UPTTestDate1->FormValue != NULL && $this->UPTTestDate1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestDate1->caption(), $this->UPTTestDate1->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->UPTTestDate1->FormValue)) {
			AddMessage($FormError, $this->UPTTestDate1->errorMessage());
		}
		if ($this->UPTTestYesNo1->Required) {
			if ($this->UPTTestYesNo1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestYesNo1->caption(), $this->UPTTestYesNo1->RequiredErrorMessage));
			}
		}
		if ($this->IUIDoneDate2->Required) {
			if (!$this->IUIDoneDate2->IsDetailKey && $this->IUIDoneDate2->FormValue != NULL && $this->IUIDoneDate2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneDate2->caption(), $this->IUIDoneDate2->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->IUIDoneDate2->FormValue)) {
			AddMessage($FormError, $this->IUIDoneDate2->errorMessage());
		}
		if ($this->IUIDoneYesNo2->Required) {
			if ($this->IUIDoneYesNo2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneYesNo2->caption(), $this->IUIDoneYesNo2->RequiredErrorMessage));
			}
		}
		if ($this->UPTTestDate2->Required) {
			if (!$this->UPTTestDate2->IsDetailKey && $this->UPTTestDate2->FormValue != NULL && $this->UPTTestDate2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestDate2->caption(), $this->UPTTestDate2->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->UPTTestDate2->FormValue)) {
			AddMessage($FormError, $this->UPTTestDate2->errorMessage());
		}
		if ($this->UPTTestYesNo2->Required) {
			if ($this->UPTTestYesNo2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestYesNo2->caption(), $this->UPTTestYesNo2->RequiredErrorMessage));
			}
		}
		if ($this->IUIDoneDate3->Required) {
			if (!$this->IUIDoneDate3->IsDetailKey && $this->IUIDoneDate3->FormValue != NULL && $this->IUIDoneDate3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneDate3->caption(), $this->IUIDoneDate3->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->IUIDoneDate3->FormValue)) {
			AddMessage($FormError, $this->IUIDoneDate3->errorMessage());
		}
		if ($this->IUIDoneYesNo3->Required) {
			if ($this->IUIDoneYesNo3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneYesNo3->caption(), $this->IUIDoneYesNo3->RequiredErrorMessage));
			}
		}
		if ($this->UPTTestDate3->Required) {
			if (!$this->UPTTestDate3->IsDetailKey && $this->UPTTestDate3->FormValue != NULL && $this->UPTTestDate3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestDate3->caption(), $this->UPTTestDate3->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->UPTTestDate3->FormValue)) {
			AddMessage($FormError, $this->UPTTestDate3->errorMessage());
		}
		if ($this->UPTTestYesNo3->Required) {
			if ($this->UPTTestYesNo3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestYesNo3->caption(), $this->UPTTestYesNo3->RequiredErrorMessage));
			}
		}
		if ($this->IUIDoneDate4->Required) {
			if (!$this->IUIDoneDate4->IsDetailKey && $this->IUIDoneDate4->FormValue != NULL && $this->IUIDoneDate4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneDate4->caption(), $this->IUIDoneDate4->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->IUIDoneDate4->FormValue)) {
			AddMessage($FormError, $this->IUIDoneDate4->errorMessage());
		}
		if ($this->IUIDoneYesNo4->Required) {
			if ($this->IUIDoneYesNo4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUIDoneYesNo4->caption(), $this->IUIDoneYesNo4->RequiredErrorMessage));
			}
		}
		if ($this->UPTTestDate4->Required) {
			if (!$this->UPTTestDate4->IsDetailKey && $this->UPTTestDate4->FormValue != NULL && $this->UPTTestDate4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestDate4->caption(), $this->UPTTestDate4->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->UPTTestDate4->FormValue)) {
			AddMessage($FormError, $this->UPTTestDate4->errorMessage());
		}
		if ($this->UPTTestYesNo4->Required) {
			if ($this->UPTTestYesNo4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPTTestYesNo4->caption(), $this->UPTTestYesNo4->RequiredErrorMessage));
			}
		}
		if ($this->IVFStimulationDate->Required) {
			if (!$this->IVFStimulationDate->IsDetailKey && $this->IVFStimulationDate->FormValue != NULL && $this->IVFStimulationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IVFStimulationDate->caption(), $this->IVFStimulationDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->IVFStimulationDate->FormValue)) {
			AddMessage($FormError, $this->IVFStimulationDate->errorMessage());
		}
		if ($this->IVFStimulationYesNo->Required) {
			if ($this->IVFStimulationYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IVFStimulationYesNo->caption(), $this->IVFStimulationYesNo->RequiredErrorMessage));
			}
		}
		if ($this->OPUDate->Required) {
			if (!$this->OPUDate->IsDetailKey && $this->OPUDate->FormValue != NULL && $this->OPUDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPUDate->caption(), $this->OPUDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->OPUDate->FormValue)) {
			AddMessage($FormError, $this->OPUDate->errorMessage());
		}
		if ($this->OPUYesNo->Required) {
			if ($this->OPUYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPUYesNo->caption(), $this->OPUYesNo->RequiredErrorMessage));
			}
		}
		if ($this->ETDate->Required) {
			if (!$this->ETDate->IsDetailKey && $this->ETDate->FormValue != NULL && $this->ETDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETDate->caption(), $this->ETDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ETDate->FormValue)) {
			AddMessage($FormError, $this->ETDate->errorMessage());
		}
		if ($this->ETYesNo->Required) {
			if ($this->ETYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETYesNo->caption(), $this->ETYesNo->RequiredErrorMessage));
			}
		}
		if ($this->BetaHCGDate->Required) {
			if (!$this->BetaHCGDate->IsDetailKey && $this->BetaHCGDate->FormValue != NULL && $this->BetaHCGDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BetaHCGDate->caption(), $this->BetaHCGDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->BetaHCGDate->FormValue)) {
			AddMessage($FormError, $this->BetaHCGDate->errorMessage());
		}
		if ($this->BetaHCGYesNo->Required) {
			if ($this->BetaHCGYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BetaHCGYesNo->caption(), $this->BetaHCGYesNo->RequiredErrorMessage));
			}
		}
		if ($this->FETDate->Required) {
			if (!$this->FETDate->IsDetailKey && $this->FETDate->FormValue != NULL && $this->FETDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FETDate->caption(), $this->FETDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->FETDate->FormValue)) {
			AddMessage($FormError, $this->FETDate->errorMessage());
		}
		if ($this->FETYesNo->Required) {
			if ($this->FETYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FETYesNo->caption(), $this->FETYesNo->RequiredErrorMessage));
			}
		}
		if ($this->FBetaHCGDate->Required) {
			if (!$this->FBetaHCGDate->IsDetailKey && $this->FBetaHCGDate->FormValue != NULL && $this->FBetaHCGDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FBetaHCGDate->caption(), $this->FBetaHCGDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->FBetaHCGDate->FormValue)) {
			AddMessage($FormError, $this->FBetaHCGDate->errorMessage());
		}
		if ($this->FBetaHCGYesNo->Required) {
			if ($this->FBetaHCGYesNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FBetaHCGYesNo->caption(), $this->FBetaHCGYesNo->RequiredErrorMessage));
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

		// PatId
		$this->PatId->setDbValueDef($rsnew, $this->PatId->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// MobileNo
		$this->MobileNo->setDbValueDef($rsnew, $this->MobileNo->CurrentValue, NULL, FALSE);

		// ConsultantName
		$this->ConsultantName->setDbValueDef($rsnew, $this->ConsultantName->CurrentValue, NULL, FALSE);

		// RefDrName
		$this->RefDrName->setDbValueDef($rsnew, $this->RefDrName->CurrentValue, NULL, FALSE);

		// RefDrMobileNo
		$this->RefDrMobileNo->setDbValueDef($rsnew, $this->RefDrMobileNo->CurrentValue, NULL, FALSE);

		// NewVisitDate
		$this->NewVisitDate->setDbValueDef($rsnew, UnFormatDateTime($this->NewVisitDate->CurrentValue, 7), NULL, FALSE);

		// NewVisitYesNo
		$this->NewVisitYesNo->setDbValueDef($rsnew, $this->NewVisitYesNo->CurrentValue, NULL, FALSE);

		// Treatment
		$this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, NULL, FALSE);

		// IUIDoneDate1
		$this->IUIDoneDate1->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate1->CurrentValue, 7), NULL, FALSE);

		// IUIDoneYesNo1
		$this->IUIDoneYesNo1->setDbValueDef($rsnew, $this->IUIDoneYesNo1->CurrentValue, NULL, FALSE);

		// UPTTestDate1
		$this->UPTTestDate1->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate1->CurrentValue, 7), NULL, FALSE);

		// UPTTestYesNo1
		$this->UPTTestYesNo1->setDbValueDef($rsnew, $this->UPTTestYesNo1->CurrentValue, NULL, FALSE);

		// IUIDoneDate2
		$this->IUIDoneDate2->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate2->CurrentValue, 7), NULL, FALSE);

		// IUIDoneYesNo2
		$this->IUIDoneYesNo2->setDbValueDef($rsnew, $this->IUIDoneYesNo2->CurrentValue, NULL, FALSE);

		// UPTTestDate2
		$this->UPTTestDate2->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate2->CurrentValue, 7), NULL, FALSE);

		// UPTTestYesNo2
		$this->UPTTestYesNo2->setDbValueDef($rsnew, $this->UPTTestYesNo2->CurrentValue, NULL, FALSE);

		// IUIDoneDate3
		$this->IUIDoneDate3->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate3->CurrentValue, 7), NULL, FALSE);

		// IUIDoneYesNo3
		$this->IUIDoneYesNo3->setDbValueDef($rsnew, $this->IUIDoneYesNo3->CurrentValue, NULL, FALSE);

		// UPTTestDate3
		$this->UPTTestDate3->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate3->CurrentValue, 7), NULL, FALSE);

		// UPTTestYesNo3
		$this->UPTTestYesNo3->setDbValueDef($rsnew, $this->UPTTestYesNo3->CurrentValue, NULL, FALSE);

		// IUIDoneDate4
		$this->IUIDoneDate4->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate4->CurrentValue, 7), NULL, FALSE);

		// IUIDoneYesNo4
		$this->IUIDoneYesNo4->setDbValueDef($rsnew, $this->IUIDoneYesNo4->CurrentValue, NULL, FALSE);

		// UPTTestDate4
		$this->UPTTestDate4->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate4->CurrentValue, 7), NULL, FALSE);

		// UPTTestYesNo4
		$this->UPTTestYesNo4->setDbValueDef($rsnew, $this->UPTTestYesNo4->CurrentValue, NULL, FALSE);

		// IVFStimulationDate
		$this->IVFStimulationDate->setDbValueDef($rsnew, UnFormatDateTime($this->IVFStimulationDate->CurrentValue, 7), NULL, FALSE);

		// IVFStimulationYesNo
		$this->IVFStimulationYesNo->setDbValueDef($rsnew, $this->IVFStimulationYesNo->CurrentValue, NULL, FALSE);

		// OPUDate
		$this->OPUDate->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDate->CurrentValue, 7), NULL, FALSE);

		// OPUYesNo
		$this->OPUYesNo->setDbValueDef($rsnew, $this->OPUYesNo->CurrentValue, NULL, FALSE);

		// ETDate
		$this->ETDate->setDbValueDef($rsnew, UnFormatDateTime($this->ETDate->CurrentValue, 7), NULL, FALSE);

		// ETYesNo
		$this->ETYesNo->setDbValueDef($rsnew, $this->ETYesNo->CurrentValue, NULL, FALSE);

		// BetaHCGDate
		$this->BetaHCGDate->setDbValueDef($rsnew, UnFormatDateTime($this->BetaHCGDate->CurrentValue, 7), NULL, FALSE);

		// BetaHCGYesNo
		$this->BetaHCGYesNo->setDbValueDef($rsnew, $this->BetaHCGYesNo->CurrentValue, NULL, FALSE);

		// FETDate
		$this->FETDate->setDbValueDef($rsnew, UnFormatDateTime($this->FETDate->CurrentValue, 7), NULL, FALSE);

		// FETYesNo
		$this->FETYesNo->setDbValueDef($rsnew, $this->FETYesNo->CurrentValue, NULL, FALSE);

		// FBetaHCGDate
		$this->FBetaHCGDate->setDbValueDef($rsnew, UnFormatDateTime($this->FBetaHCGDate->CurrentValue, 7), NULL, FALSE);

		// FBetaHCGYesNo
		$this->FBetaHCGYesNo->setDbValueDef($rsnew, $this->FBetaHCGYesNo->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->CurrentValue = CurrentUserName();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// modifiedby
		$this->modifiedby->CurrentValue = CurrentUserName();
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

		// modifieddatetime
		$this->modifieddatetime->CurrentValue = CurrentDateTime();
		$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("monitor_treatment_planlist.php"), "", $this->TableVar, TRUE);
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
				case "x_PatId":
					break;
				case "x_NewVisitYesNo":
					break;
				case "x_Treatment":
					break;
				case "x_IUIDoneYesNo1":
					break;
				case "x_UPTTestYesNo1":
					break;
				case "x_IUIDoneYesNo2":
					break;
				case "x_UPTTestYesNo2":
					break;
				case "x_IUIDoneYesNo3":
					break;
				case "x_UPTTestYesNo3":
					break;
				case "x_IUIDoneYesNo4":
					break;
				case "x_UPTTestYesNo4":
					break;
				case "x_IVFStimulationYesNo":
					break;
				case "x_OPUYesNo":
					break;
				case "x_ETYesNo":
					break;
				case "x_BetaHCGYesNo":
					break;
				case "x_FETYesNo":
					break;
				case "x_FBetaHCGYesNo":
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
						case "x_PatId":
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
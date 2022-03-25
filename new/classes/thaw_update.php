<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class thaw_update extends thaw
{

	// Page ID
	public $PageID = "update";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'thaw';

	// Page object name
	public $PageObjName = "thaw_update";

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

		// Table object (thaw)
		if (!isset($GLOBALS["thaw"]) || get_class($GLOBALS["thaw"]) == PROJECT_NAMESPACE . "thaw") {
			$GLOBALS["thaw"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["thaw"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'update');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'thaw');

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
		global $thaw;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($thaw);
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
					if ($pageName == "thawview.php")
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
					$this->terminate(GetUrl("thawlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->RIDNo->setVisibility();
		$this->PatientName->setVisibility();
		$this->TiDNo->setVisibility();
		$this->thawDate->setVisibility();
		$this->thawPrimaryEmbryologist->setVisibility();
		$this->thawSecondaryEmbryologist->setVisibility();
		$this->thawET->Visible = FALSE;
		$this->thawReFrozen->setVisibility();
		$this->thawAbserve->Visible = FALSE;
		$this->thawDiscard->Visible = FALSE;
		$this->vitrificationDate->setVisibility();
		$this->PrimaryEmbryologist->setVisibility();
		$this->SecondaryEmbryologist->setVisibility();
		$this->EmbryoNo->setVisibility();
		$this->FertilisationDate->setVisibility();
		$this->Day->setVisibility();
		$this->Grade->setVisibility();
		$this->Incubator->setVisibility();
		$this->Tank->setVisibility();
		$this->Canister->setVisibility();
		$this->Gobiet->setVisibility();
		$this->CryolockNo->setVisibility();
		$this->CryolockColour->setVisibility();
		$this->Stage->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->RIDNo->Required = FALSE;
		$this->TiDNo->Required = FALSE;

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
			$this->terminate("thawlist.php"); // No records selected, return to list
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
					$this->RIDNo->setDbValue($this->Recordset->fields('RIDNo'));
					$this->PatientName->setDbValue($this->Recordset->fields('PatientName'));
					$this->TiDNo->setDbValue($this->Recordset->fields('TiDNo'));
					$this->thawDate->setDbValue($this->Recordset->fields('thawDate'));
					$this->thawPrimaryEmbryologist->setDbValue($this->Recordset->fields('thawPrimaryEmbryologist'));
					$this->thawSecondaryEmbryologist->setDbValue($this->Recordset->fields('thawSecondaryEmbryologist'));
					$this->thawReFrozen->setDbValue($this->Recordset->fields('thawReFrozen'));
					$this->vitrificationDate->setDbValue($this->Recordset->fields('vitrificationDate'));
					$this->PrimaryEmbryologist->setDbValue($this->Recordset->fields('PrimaryEmbryologist'));
					$this->SecondaryEmbryologist->setDbValue($this->Recordset->fields('SecondaryEmbryologist'));
					$this->EmbryoNo->setDbValue($this->Recordset->fields('EmbryoNo'));
					$this->FertilisationDate->setDbValue($this->Recordset->fields('FertilisationDate'));
					$this->Day->setDbValue($this->Recordset->fields('Day'));
					$this->Grade->setDbValue($this->Recordset->fields('Grade'));
					$this->Incubator->setDbValue($this->Recordset->fields('Incubator'));
					$this->Tank->setDbValue($this->Recordset->fields('Tank'));
					$this->Canister->setDbValue($this->Recordset->fields('Canister'));
					$this->Gobiet->setDbValue($this->Recordset->fields('Gobiet'));
					$this->CryolockNo->setDbValue($this->Recordset->fields('CryolockNo'));
					$this->CryolockColour->setDbValue($this->Recordset->fields('CryolockColour'));
					$this->Stage->setDbValue($this->Recordset->fields('Stage'));
				} else {
					if (!CompareValue($this->RIDNo->DbValue, $this->Recordset->fields('RIDNo')))
						$this->RIDNo->CurrentValue = NULL;
					if (!CompareValue($this->PatientName->DbValue, $this->Recordset->fields('PatientName')))
						$this->PatientName->CurrentValue = NULL;
					if (!CompareValue($this->TiDNo->DbValue, $this->Recordset->fields('TiDNo')))
						$this->TiDNo->CurrentValue = NULL;
					if (!CompareValue($this->thawDate->DbValue, $this->Recordset->fields('thawDate')))
						$this->thawDate->CurrentValue = NULL;
					if (!CompareValue($this->thawPrimaryEmbryologist->DbValue, $this->Recordset->fields('thawPrimaryEmbryologist')))
						$this->thawPrimaryEmbryologist->CurrentValue = NULL;
					if (!CompareValue($this->thawSecondaryEmbryologist->DbValue, $this->Recordset->fields('thawSecondaryEmbryologist')))
						$this->thawSecondaryEmbryologist->CurrentValue = NULL;
					if (!CompareValue($this->thawReFrozen->DbValue, $this->Recordset->fields('thawReFrozen')))
						$this->thawReFrozen->CurrentValue = NULL;
					if (!CompareValue($this->vitrificationDate->DbValue, $this->Recordset->fields('vitrificationDate')))
						$this->vitrificationDate->CurrentValue = NULL;
					if (!CompareValue($this->PrimaryEmbryologist->DbValue, $this->Recordset->fields('PrimaryEmbryologist')))
						$this->PrimaryEmbryologist->CurrentValue = NULL;
					if (!CompareValue($this->SecondaryEmbryologist->DbValue, $this->Recordset->fields('SecondaryEmbryologist')))
						$this->SecondaryEmbryologist->CurrentValue = NULL;
					if (!CompareValue($this->EmbryoNo->DbValue, $this->Recordset->fields('EmbryoNo')))
						$this->EmbryoNo->CurrentValue = NULL;
					if (!CompareValue($this->FertilisationDate->DbValue, $this->Recordset->fields('FertilisationDate')))
						$this->FertilisationDate->CurrentValue = NULL;
					if (!CompareValue($this->Day->DbValue, $this->Recordset->fields('Day')))
						$this->Day->CurrentValue = NULL;
					if (!CompareValue($this->Grade->DbValue, $this->Recordset->fields('Grade')))
						$this->Grade->CurrentValue = NULL;
					if (!CompareValue($this->Incubator->DbValue, $this->Recordset->fields('Incubator')))
						$this->Incubator->CurrentValue = NULL;
					if (!CompareValue($this->Tank->DbValue, $this->Recordset->fields('Tank')))
						$this->Tank->CurrentValue = NULL;
					if (!CompareValue($this->Canister->DbValue, $this->Recordset->fields('Canister')))
						$this->Canister->CurrentValue = NULL;
					if (!CompareValue($this->Gobiet->DbValue, $this->Recordset->fields('Gobiet')))
						$this->Gobiet->CurrentValue = NULL;
					if (!CompareValue($this->CryolockNo->DbValue, $this->Recordset->fields('CryolockNo')))
						$this->CryolockNo->CurrentValue = NULL;
					if (!CompareValue($this->CryolockColour->DbValue, $this->Recordset->fields('CryolockColour')))
						$this->CryolockColour->CurrentValue = NULL;
					if (!CompareValue($this->Stage->DbValue, $this->Recordset->fields('Stage')))
						$this->Stage->CurrentValue = NULL;
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

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}
		$this->RIDNo->MultiUpdate = $CurrentForm->getValue("u_RIDNo");

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->MultiUpdate = $CurrentForm->getValue("u_PatientName");

		// Check field name 'TiDNo' first before field var 'x_TiDNo'
		$val = $CurrentForm->hasValue("TiDNo") ? $CurrentForm->getValue("TiDNo") : $CurrentForm->getValue("x_TiDNo");
		if (!$this->TiDNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TiDNo->Visible = FALSE; // Disable update for API request
			else
				$this->TiDNo->setFormValue($val);
		}
		$this->TiDNo->MultiUpdate = $CurrentForm->getValue("u_TiDNo");

		// Check field name 'thawDate' first before field var 'x_thawDate'
		$val = $CurrentForm->hasValue("thawDate") ? $CurrentForm->getValue("thawDate") : $CurrentForm->getValue("x_thawDate");
		if (!$this->thawDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->thawDate->Visible = FALSE; // Disable update for API request
			else
				$this->thawDate->setFormValue($val);
			$this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
		}
		$this->thawDate->MultiUpdate = $CurrentForm->getValue("u_thawDate");

		// Check field name 'thawPrimaryEmbryologist' first before field var 'x_thawPrimaryEmbryologist'
		$val = $CurrentForm->hasValue("thawPrimaryEmbryologist") ? $CurrentForm->getValue("thawPrimaryEmbryologist") : $CurrentForm->getValue("x_thawPrimaryEmbryologist");
		if (!$this->thawPrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->thawPrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->thawPrimaryEmbryologist->setFormValue($val);
		}
		$this->thawPrimaryEmbryologist->MultiUpdate = $CurrentForm->getValue("u_thawPrimaryEmbryologist");

		// Check field name 'thawSecondaryEmbryologist' first before field var 'x_thawSecondaryEmbryologist'
		$val = $CurrentForm->hasValue("thawSecondaryEmbryologist") ? $CurrentForm->getValue("thawSecondaryEmbryologist") : $CurrentForm->getValue("x_thawSecondaryEmbryologist");
		if (!$this->thawSecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->thawSecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->thawSecondaryEmbryologist->setFormValue($val);
		}
		$this->thawSecondaryEmbryologist->MultiUpdate = $CurrentForm->getValue("u_thawSecondaryEmbryologist");

		// Check field name 'thawReFrozen' first before field var 'x_thawReFrozen'
		$val = $CurrentForm->hasValue("thawReFrozen") ? $CurrentForm->getValue("thawReFrozen") : $CurrentForm->getValue("x_thawReFrozen");
		if (!$this->thawReFrozen->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->thawReFrozen->Visible = FALSE; // Disable update for API request
			else
				$this->thawReFrozen->setFormValue($val);
		}
		$this->thawReFrozen->MultiUpdate = $CurrentForm->getValue("u_thawReFrozen");

		// Check field name 'vitrificationDate' first before field var 'x_vitrificationDate'
		$val = $CurrentForm->hasValue("vitrificationDate") ? $CurrentForm->getValue("vitrificationDate") : $CurrentForm->getValue("x_vitrificationDate");
		if (!$this->vitrificationDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->vitrificationDate->Visible = FALSE; // Disable update for API request
			else
				$this->vitrificationDate->setFormValue($val);
			$this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
		}
		$this->vitrificationDate->MultiUpdate = $CurrentForm->getValue("u_vitrificationDate");

		// Check field name 'PrimaryEmbryologist' first before field var 'x_PrimaryEmbryologist'
		$val = $CurrentForm->hasValue("PrimaryEmbryologist") ? $CurrentForm->getValue("PrimaryEmbryologist") : $CurrentForm->getValue("x_PrimaryEmbryologist");
		if (!$this->PrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->PrimaryEmbryologist->setFormValue($val);
		}
		$this->PrimaryEmbryologist->MultiUpdate = $CurrentForm->getValue("u_PrimaryEmbryologist");

		// Check field name 'SecondaryEmbryologist' first before field var 'x_SecondaryEmbryologist'
		$val = $CurrentForm->hasValue("SecondaryEmbryologist") ? $CurrentForm->getValue("SecondaryEmbryologist") : $CurrentForm->getValue("x_SecondaryEmbryologist");
		if (!$this->SecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->SecondaryEmbryologist->setFormValue($val);
		}
		$this->SecondaryEmbryologist->MultiUpdate = $CurrentForm->getValue("u_SecondaryEmbryologist");

		// Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
		$val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
		if (!$this->EmbryoNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EmbryoNo->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryoNo->setFormValue($val);
		}
		$this->EmbryoNo->MultiUpdate = $CurrentForm->getValue("u_EmbryoNo");

		// Check field name 'FertilisationDate' first before field var 'x_FertilisationDate'
		$val = $CurrentForm->hasValue("FertilisationDate") ? $CurrentForm->getValue("FertilisationDate") : $CurrentForm->getValue("x_FertilisationDate");
		if (!$this->FertilisationDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FertilisationDate->Visible = FALSE; // Disable update for API request
			else
				$this->FertilisationDate->setFormValue($val);
			$this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
		}
		$this->FertilisationDate->MultiUpdate = $CurrentForm->getValue("u_FertilisationDate");

		// Check field name 'Day' first before field var 'x_Day'
		$val = $CurrentForm->hasValue("Day") ? $CurrentForm->getValue("Day") : $CurrentForm->getValue("x_Day");
		if (!$this->Day->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Day->Visible = FALSE; // Disable update for API request
			else
				$this->Day->setFormValue($val);
		}
		$this->Day->MultiUpdate = $CurrentForm->getValue("u_Day");

		// Check field name 'Grade' first before field var 'x_Grade'
		$val = $CurrentForm->hasValue("Grade") ? $CurrentForm->getValue("Grade") : $CurrentForm->getValue("x_Grade");
		if (!$this->Grade->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Grade->setFormValue($val);
		}
		$this->Grade->MultiUpdate = $CurrentForm->getValue("u_Grade");

		// Check field name 'Incubator' first before field var 'x_Incubator'
		$val = $CurrentForm->hasValue("Incubator") ? $CurrentForm->getValue("Incubator") : $CurrentForm->getValue("x_Incubator");
		if (!$this->Incubator->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Incubator->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator->setFormValue($val);
		}
		$this->Incubator->MultiUpdate = $CurrentForm->getValue("u_Incubator");

		// Check field name 'Tank' first before field var 'x_Tank'
		$val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
		if (!$this->Tank->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Tank->Visible = FALSE; // Disable update for API request
			else
				$this->Tank->setFormValue($val);
		}
		$this->Tank->MultiUpdate = $CurrentForm->getValue("u_Tank");

		// Check field name 'Canister' first before field var 'x_Canister'
		$val = $CurrentForm->hasValue("Canister") ? $CurrentForm->getValue("Canister") : $CurrentForm->getValue("x_Canister");
		if (!$this->Canister->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Canister->Visible = FALSE; // Disable update for API request
			else
				$this->Canister->setFormValue($val);
		}
		$this->Canister->MultiUpdate = $CurrentForm->getValue("u_Canister");

		// Check field name 'Gobiet' first before field var 'x_Gobiet'
		$val = $CurrentForm->hasValue("Gobiet") ? $CurrentForm->getValue("Gobiet") : $CurrentForm->getValue("x_Gobiet");
		if (!$this->Gobiet->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gobiet->Visible = FALSE; // Disable update for API request
			else
				$this->Gobiet->setFormValue($val);
		}
		$this->Gobiet->MultiUpdate = $CurrentForm->getValue("u_Gobiet");

		// Check field name 'CryolockNo' first before field var 'x_CryolockNo'
		$val = $CurrentForm->hasValue("CryolockNo") ? $CurrentForm->getValue("CryolockNo") : $CurrentForm->getValue("x_CryolockNo");
		if (!$this->CryolockNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CryolockNo->Visible = FALSE; // Disable update for API request
			else
				$this->CryolockNo->setFormValue($val);
		}
		$this->CryolockNo->MultiUpdate = $CurrentForm->getValue("u_CryolockNo");

		// Check field name 'CryolockColour' first before field var 'x_CryolockColour'
		$val = $CurrentForm->hasValue("CryolockColour") ? $CurrentForm->getValue("CryolockColour") : $CurrentForm->getValue("x_CryolockColour");
		if (!$this->CryolockColour->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CryolockColour->Visible = FALSE; // Disable update for API request
			else
				$this->CryolockColour->setFormValue($val);
		}
		$this->CryolockColour->MultiUpdate = $CurrentForm->getValue("u_CryolockColour");

		// Check field name 'Stage' first before field var 'x_Stage'
		$val = $CurrentForm->hasValue("Stage") ? $CurrentForm->getValue("Stage") : $CurrentForm->getValue("x_Stage");
		if (!$this->Stage->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Stage->Visible = FALSE; // Disable update for API request
			else
				$this->Stage->setFormValue($val);
		}
		$this->Stage->MultiUpdate = $CurrentForm->getValue("u_Stage");

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
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->TiDNo->CurrentValue = $this->TiDNo->FormValue;
		$this->thawDate->CurrentValue = $this->thawDate->FormValue;
		$this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
		$this->thawPrimaryEmbryologist->CurrentValue = $this->thawPrimaryEmbryologist->FormValue;
		$this->thawSecondaryEmbryologist->CurrentValue = $this->thawSecondaryEmbryologist->FormValue;
		$this->thawReFrozen->CurrentValue = $this->thawReFrozen->FormValue;
		$this->vitrificationDate->CurrentValue = $this->vitrificationDate->FormValue;
		$this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
		$this->PrimaryEmbryologist->CurrentValue = $this->PrimaryEmbryologist->FormValue;
		$this->SecondaryEmbryologist->CurrentValue = $this->SecondaryEmbryologist->FormValue;
		$this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
		$this->FertilisationDate->CurrentValue = $this->FertilisationDate->FormValue;
		$this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
		$this->Day->CurrentValue = $this->Day->FormValue;
		$this->Grade->CurrentValue = $this->Grade->FormValue;
		$this->Incubator->CurrentValue = $this->Incubator->FormValue;
		$this->Tank->CurrentValue = $this->Tank->FormValue;
		$this->Canister->CurrentValue = $this->Canister->FormValue;
		$this->Gobiet->CurrentValue = $this->Gobiet->FormValue;
		$this->CryolockNo->CurrentValue = $this->CryolockNo->FormValue;
		$this->CryolockColour->CurrentValue = $this->CryolockColour->FormValue;
		$this->Stage->CurrentValue = $this->Stage->FormValue;
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
		$this->id->setDbValue($row['id']);
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->TiDNo->setDbValue($row['TiDNo']);
		$this->thawDate->setDbValue($row['thawDate']);
		$this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
		$this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
		$this->thawET->setDbValue($row['thawET']);
		$this->thawReFrozen->setDbValue($row['thawReFrozen']);
		$this->thawAbserve->setDbValue($row['thawAbserve']);
		$this->thawDiscard->setDbValue($row['thawDiscard']);
		$this->vitrificationDate->setDbValue($row['vitrificationDate']);
		$this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
		$this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
		$this->EmbryoNo->setDbValue($row['EmbryoNo']);
		$this->FertilisationDate->setDbValue($row['FertilisationDate']);
		$this->Day->setDbValue($row['Day']);
		$this->Grade->setDbValue($row['Grade']);
		$this->Incubator->setDbValue($row['Incubator']);
		$this->Tank->setDbValue($row['Tank']);
		$this->Canister->setDbValue($row['Canister']);
		$this->Gobiet->setDbValue($row['Gobiet']);
		$this->CryolockNo->setDbValue($row['CryolockNo']);
		$this->CryolockColour->setDbValue($row['CryolockColour']);
		$this->Stage->setDbValue($row['Stage']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['PatientName'] = NULL;
		$row['TiDNo'] = NULL;
		$row['thawDate'] = NULL;
		$row['thawPrimaryEmbryologist'] = NULL;
		$row['thawSecondaryEmbryologist'] = NULL;
		$row['thawET'] = NULL;
		$row['thawReFrozen'] = NULL;
		$row['thawAbserve'] = NULL;
		$row['thawDiscard'] = NULL;
		$row['vitrificationDate'] = NULL;
		$row['PrimaryEmbryologist'] = NULL;
		$row['SecondaryEmbryologist'] = NULL;
		$row['EmbryoNo'] = NULL;
		$row['FertilisationDate'] = NULL;
		$row['Day'] = NULL;
		$row['Grade'] = NULL;
		$row['Incubator'] = NULL;
		$row['Tank'] = NULL;
		$row['Canister'] = NULL;
		$row['Gobiet'] = NULL;
		$row['CryolockNo'] = NULL;
		$row['CryolockColour'] = NULL;
		$row['Stage'] = NULL;
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
		// id
		// RIDNo
		// PatientName
		// TiDNo
		// thawDate
		// thawPrimaryEmbryologist
		// thawSecondaryEmbryologist
		// thawET
		// thawReFrozen
		// thawAbserve
		// thawDiscard
		// vitrificationDate
		// PrimaryEmbryologist
		// SecondaryEmbryologist
		// EmbryoNo
		// FertilisationDate
		// Day
		// Grade
		// Incubator
		// Tank
		// Canister
		// Gobiet
		// CryolockNo
		// CryolockColour
		// Stage

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// TiDNo
			$this->TiDNo->ViewValue = $this->TiDNo->CurrentValue;
			$this->TiDNo->ViewValue = FormatNumber($this->TiDNo->ViewValue, 0, -2, -2, -2);
			$this->TiDNo->ViewCustomAttributes = "";

			// thawDate
			$this->thawDate->ViewValue = $this->thawDate->CurrentValue;
			$this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
			$this->thawDate->ViewCustomAttributes = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
			$this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
			$this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

			// thawReFrozen
			if (strval($this->thawReFrozen->CurrentValue) != "") {
				$this->thawReFrozen->ViewValue = $this->thawReFrozen->optionCaption($this->thawReFrozen->CurrentValue);
			} else {
				$this->thawReFrozen->ViewValue = NULL;
			}
			$this->thawReFrozen->ViewCustomAttributes = "";

			// vitrificationDate
			$this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
			$this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
			$this->vitrificationDate->ViewCustomAttributes = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
			$this->PrimaryEmbryologist->ViewCustomAttributes = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
			$this->SecondaryEmbryologist->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// FertilisationDate
			$this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
			$this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
			$this->FertilisationDate->ViewCustomAttributes = "";

			// Day
			if (strval($this->Day->CurrentValue) != "") {
				$this->Day->ViewValue = $this->Day->optionCaption($this->Day->CurrentValue);
			} else {
				$this->Day->ViewValue = NULL;
			}
			$this->Day->ViewCustomAttributes = "";

			// Grade
			if (strval($this->Grade->CurrentValue) != "") {
				$this->Grade->ViewValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
			} else {
				$this->Grade->ViewValue = NULL;
			}
			$this->Grade->ViewCustomAttributes = "";

			// Incubator
			$this->Incubator->ViewValue = $this->Incubator->CurrentValue;
			$this->Incubator->ViewCustomAttributes = "";

			// Tank
			$this->Tank->ViewValue = $this->Tank->CurrentValue;
			$this->Tank->ViewCustomAttributes = "";

			// Canister
			$this->Canister->ViewValue = $this->Canister->CurrentValue;
			$this->Canister->ViewCustomAttributes = "";

			// Gobiet
			$this->Gobiet->ViewValue = $this->Gobiet->CurrentValue;
			$this->Gobiet->ViewCustomAttributes = "";

			// CryolockNo
			$this->CryolockNo->ViewValue = $this->CryolockNo->CurrentValue;
			$this->CryolockNo->ViewCustomAttributes = "";

			// CryolockColour
			$this->CryolockColour->ViewValue = $this->CryolockColour->CurrentValue;
			$this->CryolockColour->ViewCustomAttributes = "";

			// Stage
			$this->Stage->ViewValue = $this->Stage->CurrentValue;
			$this->Stage->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// TiDNo
			$this->TiDNo->LinkCustomAttributes = "";
			$this->TiDNo->HrefValue = "";
			$this->TiDNo->TooltipValue = "";

			// thawDate
			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";
			$this->thawDate->TooltipValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";
			$this->thawPrimaryEmbryologist->TooltipValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";
			$this->thawSecondaryEmbryologist->TooltipValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";
			$this->thawReFrozen->TooltipValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";
			$this->vitrificationDate->TooltipValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";
			$this->PrimaryEmbryologist->TooltipValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";
			$this->SecondaryEmbryologist->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// FertilisationDate
			$this->FertilisationDate->LinkCustomAttributes = "";
			$this->FertilisationDate->HrefValue = "";
			$this->FertilisationDate->TooltipValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";
			$this->Day->TooltipValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
			$this->Grade->TooltipValue = "";

			// Incubator
			$this->Incubator->LinkCustomAttributes = "";
			$this->Incubator->HrefValue = "";
			$this->Incubator->TooltipValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";
			$this->Tank->TooltipValue = "";

			// Canister
			$this->Canister->LinkCustomAttributes = "";
			$this->Canister->HrefValue = "";
			$this->Canister->TooltipValue = "";

			// Gobiet
			$this->Gobiet->LinkCustomAttributes = "";
			$this->Gobiet->HrefValue = "";
			$this->Gobiet->TooltipValue = "";

			// CryolockNo
			$this->CryolockNo->LinkCustomAttributes = "";
			$this->CryolockNo->HrefValue = "";
			$this->CryolockNo->TooltipValue = "";

			// CryolockColour
			$this->CryolockColour->LinkCustomAttributes = "";
			$this->CryolockColour->HrefValue = "";
			$this->CryolockColour->TooltipValue = "";

			// Stage
			$this->Stage->LinkCustomAttributes = "";
			$this->Stage->HrefValue = "";
			$this->Stage->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// TiDNo
			$this->TiDNo->EditAttrs["class"] = "form-control";
			$this->TiDNo->EditCustomAttributes = "";
			$this->TiDNo->EditValue = $this->TiDNo->CurrentValue;
			$this->TiDNo->EditValue = FormatNumber($this->TiDNo->EditValue, 0, -2, -2, -2);
			$this->TiDNo->ViewCustomAttributes = "";

			// thawDate
			$this->thawDate->EditAttrs["class"] = "form-control";
			$this->thawDate->EditCustomAttributes = "";
			$this->thawDate->EditValue = HtmlEncode(FormatDateTime($this->thawDate->CurrentValue, 8));
			$this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawPrimaryEmbryologist->EditCustomAttributes = "";
			if (!$this->thawPrimaryEmbryologist->Raw)
				$this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->EditValue = HtmlEncode($this->thawPrimaryEmbryologist->CurrentValue);
			$this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->thawSecondaryEmbryologist->EditCustomAttributes = "";
			if (!$this->thawSecondaryEmbryologist->Raw)
				$this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->EditValue = HtmlEncode($this->thawSecondaryEmbryologist->CurrentValue);
			$this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

			// thawReFrozen
			$this->thawReFrozen->EditAttrs["class"] = "form-control";
			$this->thawReFrozen->EditCustomAttributes = "";
			$this->thawReFrozen->EditValue = $this->thawReFrozen->options(TRUE);

			// vitrificationDate
			$this->vitrificationDate->EditAttrs["class"] = "form-control";
			$this->vitrificationDate->EditCustomAttributes = "";
			$this->vitrificationDate->EditValue = $this->vitrificationDate->CurrentValue;
			$this->vitrificationDate->EditValue = FormatDateTime($this->vitrificationDate->EditValue, 0);
			$this->vitrificationDate->ViewCustomAttributes = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->PrimaryEmbryologist->EditCustomAttributes = "";
			$this->PrimaryEmbryologist->EditValue = $this->PrimaryEmbryologist->CurrentValue;
			$this->PrimaryEmbryologist->ViewCustomAttributes = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->SecondaryEmbryologist->EditCustomAttributes = "";
			$this->SecondaryEmbryologist->EditValue = $this->SecondaryEmbryologist->CurrentValue;
			$this->SecondaryEmbryologist->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->EditAttrs["class"] = "form-control";
			$this->EmbryoNo->EditCustomAttributes = "";
			$this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// FertilisationDate
			$this->FertilisationDate->EditAttrs["class"] = "form-control";
			$this->FertilisationDate->EditCustomAttributes = "";
			$this->FertilisationDate->EditValue = $this->FertilisationDate->CurrentValue;
			$this->FertilisationDate->EditValue = FormatDateTime($this->FertilisationDate->EditValue, 0);
			$this->FertilisationDate->ViewCustomAttributes = "";

			// Day
			$this->Day->EditAttrs["class"] = "form-control";
			$this->Day->EditCustomAttributes = "";
			if (strval($this->Day->CurrentValue) != "") {
				$this->Day->EditValue = $this->Day->optionCaption($this->Day->CurrentValue);
			} else {
				$this->Day->EditValue = NULL;
			}
			$this->Day->ViewCustomAttributes = "";

			// Grade
			$this->Grade->EditAttrs["class"] = "form-control";
			$this->Grade->EditCustomAttributes = "";
			if (strval($this->Grade->CurrentValue) != "") {
				$this->Grade->EditValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
			} else {
				$this->Grade->EditValue = NULL;
			}
			$this->Grade->ViewCustomAttributes = "";

			// Incubator
			$this->Incubator->EditAttrs["class"] = "form-control";
			$this->Incubator->EditCustomAttributes = "";
			$this->Incubator->EditValue = $this->Incubator->CurrentValue;
			$this->Incubator->ViewCustomAttributes = "";

			// Tank
			$this->Tank->EditAttrs["class"] = "form-control";
			$this->Tank->EditCustomAttributes = "";
			$this->Tank->EditValue = $this->Tank->CurrentValue;
			$this->Tank->ViewCustomAttributes = "";

			// Canister
			$this->Canister->EditAttrs["class"] = "form-control";
			$this->Canister->EditCustomAttributes = "";
			$this->Canister->EditValue = $this->Canister->CurrentValue;
			$this->Canister->ViewCustomAttributes = "";

			// Gobiet
			$this->Gobiet->EditAttrs["class"] = "form-control";
			$this->Gobiet->EditCustomAttributes = "";
			$this->Gobiet->EditValue = $this->Gobiet->CurrentValue;
			$this->Gobiet->ViewCustomAttributes = "";

			// CryolockNo
			$this->CryolockNo->EditAttrs["class"] = "form-control";
			$this->CryolockNo->EditCustomAttributes = "";
			$this->CryolockNo->EditValue = $this->CryolockNo->CurrentValue;
			$this->CryolockNo->ViewCustomAttributes = "";

			// CryolockColour
			$this->CryolockColour->EditAttrs["class"] = "form-control";
			$this->CryolockColour->EditCustomAttributes = "";
			$this->CryolockColour->EditValue = $this->CryolockColour->CurrentValue;
			$this->CryolockColour->ViewCustomAttributes = "";

			// Stage
			$this->Stage->EditAttrs["class"] = "form-control";
			$this->Stage->EditCustomAttributes = "";
			$this->Stage->EditValue = $this->Stage->CurrentValue;
			$this->Stage->ViewCustomAttributes = "";

			// Edit refer script
			// RIDNo

			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// TiDNo
			$this->TiDNo->LinkCustomAttributes = "";
			$this->TiDNo->HrefValue = "";
			$this->TiDNo->TooltipValue = "";

			// thawDate
			$this->thawDate->LinkCustomAttributes = "";
			$this->thawDate->HrefValue = "";

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
			$this->thawPrimaryEmbryologist->HrefValue = "";

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
			$this->thawSecondaryEmbryologist->HrefValue = "";

			// thawReFrozen
			$this->thawReFrozen->LinkCustomAttributes = "";
			$this->thawReFrozen->HrefValue = "";

			// vitrificationDate
			$this->vitrificationDate->LinkCustomAttributes = "";
			$this->vitrificationDate->HrefValue = "";
			$this->vitrificationDate->TooltipValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";
			$this->PrimaryEmbryologist->TooltipValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";
			$this->SecondaryEmbryologist->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// FertilisationDate
			$this->FertilisationDate->LinkCustomAttributes = "";
			$this->FertilisationDate->HrefValue = "";
			$this->FertilisationDate->TooltipValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";
			$this->Day->TooltipValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
			$this->Grade->TooltipValue = "";

			// Incubator
			$this->Incubator->LinkCustomAttributes = "";
			$this->Incubator->HrefValue = "";
			$this->Incubator->TooltipValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";
			$this->Tank->TooltipValue = "";

			// Canister
			$this->Canister->LinkCustomAttributes = "";
			$this->Canister->HrefValue = "";
			$this->Canister->TooltipValue = "";

			// Gobiet
			$this->Gobiet->LinkCustomAttributes = "";
			$this->Gobiet->HrefValue = "";
			$this->Gobiet->TooltipValue = "";

			// CryolockNo
			$this->CryolockNo->LinkCustomAttributes = "";
			$this->CryolockNo->HrefValue = "";
			$this->CryolockNo->TooltipValue = "";

			// CryolockColour
			$this->CryolockColour->LinkCustomAttributes = "";
			$this->CryolockColour->HrefValue = "";
			$this->CryolockColour->TooltipValue = "";

			// Stage
			$this->Stage->LinkCustomAttributes = "";
			$this->Stage->HrefValue = "";
			$this->Stage->TooltipValue = "";
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
		if ($this->RIDNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatientName->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TiDNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->thawDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->thawPrimaryEmbryologist->MultiUpdate == "1")
			$updateCnt++;
		if ($this->thawSecondaryEmbryologist->MultiUpdate == "1")
			$updateCnt++;
		if ($this->thawReFrozen->MultiUpdate == "1")
			$updateCnt++;
		if ($this->vitrificationDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PrimaryEmbryologist->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SecondaryEmbryologist->MultiUpdate == "1")
			$updateCnt++;
		if ($this->EmbryoNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->FertilisationDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Day->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Grade->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Incubator->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Tank->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Canister->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Gobiet->MultiUpdate == "1")
			$updateCnt++;
		if ($this->CryolockNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->CryolockColour->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Stage->MultiUpdate == "1")
			$updateCnt++;
		if ($updateCnt == 0) {
			$FormError = $Language->phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->RIDNo->Required) {
			if ($this->RIDNo->MultiUpdate != "" && !$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if ($this->PatientName->MultiUpdate != "" && !$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->TiDNo->Required) {
			if ($this->TiDNo->MultiUpdate != "" && !$this->TiDNo->IsDetailKey && $this->TiDNo->FormValue != NULL && $this->TiDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TiDNo->caption(), $this->TiDNo->RequiredErrorMessage));
			}
		}
		if ($this->thawDate->Required) {
			if ($this->thawDate->MultiUpdate != "" && !$this->thawDate->IsDetailKey && $this->thawDate->FormValue != NULL && $this->thawDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawDate->caption(), $this->thawDate->RequiredErrorMessage));
			}
		}
		if ($this->thawDate->MultiUpdate != "") {
			if (!CheckDate($this->thawDate->FormValue)) {
				AddMessage($FormError, $this->thawDate->errorMessage());
			}
		}
		if ($this->thawPrimaryEmbryologist->Required) {
			if ($this->thawPrimaryEmbryologist->MultiUpdate != "" && !$this->thawPrimaryEmbryologist->IsDetailKey && $this->thawPrimaryEmbryologist->FormValue != NULL && $this->thawPrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawPrimaryEmbryologist->caption(), $this->thawPrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->thawSecondaryEmbryologist->Required) {
			if ($this->thawSecondaryEmbryologist->MultiUpdate != "" && !$this->thawSecondaryEmbryologist->IsDetailKey && $this->thawSecondaryEmbryologist->FormValue != NULL && $this->thawSecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawSecondaryEmbryologist->caption(), $this->thawSecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->thawReFrozen->Required) {
			if ($this->thawReFrozen->MultiUpdate != "" && !$this->thawReFrozen->IsDetailKey && $this->thawReFrozen->FormValue != NULL && $this->thawReFrozen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->thawReFrozen->caption(), $this->thawReFrozen->RequiredErrorMessage));
			}
		}
		if ($this->vitrificationDate->Required) {
			if ($this->vitrificationDate->MultiUpdate != "" && !$this->vitrificationDate->IsDetailKey && $this->vitrificationDate->FormValue != NULL && $this->vitrificationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitrificationDate->caption(), $this->vitrificationDate->RequiredErrorMessage));
			}
		}
		if ($this->PrimaryEmbryologist->Required) {
			if ($this->PrimaryEmbryologist->MultiUpdate != "" && !$this->PrimaryEmbryologist->IsDetailKey && $this->PrimaryEmbryologist->FormValue != NULL && $this->PrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrimaryEmbryologist->caption(), $this->PrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryEmbryologist->Required) {
			if ($this->SecondaryEmbryologist->MultiUpdate != "" && !$this->SecondaryEmbryologist->IsDetailKey && $this->SecondaryEmbryologist->FormValue != NULL && $this->SecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryEmbryologist->caption(), $this->SecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->EmbryoNo->Required) {
			if ($this->EmbryoNo->MultiUpdate != "" && !$this->EmbryoNo->IsDetailKey && $this->EmbryoNo->FormValue != NULL && $this->EmbryoNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
			}
		}
		if ($this->FertilisationDate->Required) {
			if ($this->FertilisationDate->MultiUpdate != "" && !$this->FertilisationDate->IsDetailKey && $this->FertilisationDate->FormValue != NULL && $this->FertilisationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FertilisationDate->caption(), $this->FertilisationDate->RequiredErrorMessage));
			}
		}
		if ($this->Day->Required) {
			if ($this->Day->MultiUpdate != "" && !$this->Day->IsDetailKey && $this->Day->FormValue != NULL && $this->Day->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day->caption(), $this->Day->RequiredErrorMessage));
			}
		}
		if ($this->Grade->Required) {
			if ($this->Grade->MultiUpdate != "" && !$this->Grade->IsDetailKey && $this->Grade->FormValue != NULL && $this->Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade->caption(), $this->Grade->RequiredErrorMessage));
			}
		}
		if ($this->Incubator->Required) {
			if ($this->Incubator->MultiUpdate != "" && !$this->Incubator->IsDetailKey && $this->Incubator->FormValue != NULL && $this->Incubator->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
			}
		}
		if ($this->Tank->Required) {
			if ($this->Tank->MultiUpdate != "" && !$this->Tank->IsDetailKey && $this->Tank->FormValue != NULL && $this->Tank->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
			}
		}
		if ($this->Canister->Required) {
			if ($this->Canister->MultiUpdate != "" && !$this->Canister->IsDetailKey && $this->Canister->FormValue != NULL && $this->Canister->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Canister->caption(), $this->Canister->RequiredErrorMessage));
			}
		}
		if ($this->Gobiet->Required) {
			if ($this->Gobiet->MultiUpdate != "" && !$this->Gobiet->IsDetailKey && $this->Gobiet->FormValue != NULL && $this->Gobiet->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gobiet->caption(), $this->Gobiet->RequiredErrorMessage));
			}
		}
		if ($this->CryolockNo->Required) {
			if ($this->CryolockNo->MultiUpdate != "" && !$this->CryolockNo->IsDetailKey && $this->CryolockNo->FormValue != NULL && $this->CryolockNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CryolockNo->caption(), $this->CryolockNo->RequiredErrorMessage));
			}
		}
		if ($this->CryolockColour->Required) {
			if ($this->CryolockColour->MultiUpdate != "" && !$this->CryolockColour->IsDetailKey && $this->CryolockColour->FormValue != NULL && $this->CryolockColour->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CryolockColour->caption(), $this->CryolockColour->RequiredErrorMessage));
			}
		}
		if ($this->Stage->Required) {
			if ($this->Stage->MultiUpdate != "" && !$this->Stage->IsDetailKey && $this->Stage->FormValue != NULL && $this->Stage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
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

			// thawDate
			$this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), NULL, $this->thawDate->ReadOnly || $this->thawDate->MultiUpdate != "1");

			// thawPrimaryEmbryologist
			$this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, NULL, $this->thawPrimaryEmbryologist->ReadOnly || $this->thawPrimaryEmbryologist->MultiUpdate != "1");

			// thawSecondaryEmbryologist
			$this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, NULL, $this->thawSecondaryEmbryologist->ReadOnly || $this->thawSecondaryEmbryologist->MultiUpdate != "1");

			// thawReFrozen
			$this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, NULL, $this->thawReFrozen->ReadOnly || $this->thawReFrozen->MultiUpdate != "1");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("thawlist.php"), "", $this->TableVar, TRUE);
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
				case "x_thawReFrozen":
					break;
				case "x_Day":
					break;
				case "x_Grade":
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
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pres_tradenames_new_edit extends pres_tradenames_new
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_tradenames_new';

	// Page object name
	public $PageObjName = "pres_tradenames_new_edit";

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

		// Table object (pres_tradenames_new)
		if (!isset($GLOBALS["pres_tradenames_new"]) || get_class($GLOBALS["pres_tradenames_new"]) == PROJECT_NAMESPACE . "pres_tradenames_new") {
			$GLOBALS["pres_tradenames_new"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_tradenames_new"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_tradenames_new');

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
		global $pres_tradenames_new;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pres_tradenames_new);
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
					if ($pageName == "pres_tradenames_newview.php")
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
			$key .= @$ar['ID'];
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
			$this->ID->Visible = FALSE;
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
					$this->terminate(GetUrl("pres_tradenames_newlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->ID->setVisibility();
		$this->Drug_Name->setVisibility();
		$this->Generic_Name->setVisibility();
		$this->Trade_Name->setVisibility();
		$this->PR_CODE->setVisibility();
		$this->Form->setVisibility();
		$this->Strength->setVisibility();
		$this->Unit->setVisibility();
		$this->CONTAINER_TYPE->setVisibility();
		$this->CONTAINER_STRENGTH->setVisibility();
		$this->TypeOfDrug->setVisibility();
		$this->ProductType->setVisibility();
		$this->Generic_Name1->setVisibility();
		$this->Strength1->setVisibility();
		$this->Unit1->setVisibility();
		$this->Generic_Name2->setVisibility();
		$this->Strength2->setVisibility();
		$this->Unit2->setVisibility();
		$this->Generic_Name3->setVisibility();
		$this->Strength3->setVisibility();
		$this->Unit3->setVisibility();
		$this->Generic_Name4->setVisibility();
		$this->Generic_Name5->setVisibility();
		$this->Strength4->setVisibility();
		$this->Strength5->setVisibility();
		$this->Unit4->setVisibility();
		$this->Unit5->setVisibility();
		$this->AlterNative1->setVisibility();
		$this->AlterNative2->setVisibility();
		$this->AlterNative3->setVisibility();
		$this->AlterNative4->setVisibility();
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
		$this->setupLookupOptions($this->Generic_Name);
		$this->setupLookupOptions($this->Form);
		$this->setupLookupOptions($this->Unit);
		$this->setupLookupOptions($this->Generic_Name1);
		$this->setupLookupOptions($this->Unit1);
		$this->setupLookupOptions($this->Generic_Name2);
		$this->setupLookupOptions($this->Unit2);
		$this->setupLookupOptions($this->Generic_Name3);
		$this->setupLookupOptions($this->Unit3);
		$this->setupLookupOptions($this->Generic_Name4);
		$this->setupLookupOptions($this->Generic_Name5);
		$this->setupLookupOptions($this->Unit4);
		$this->setupLookupOptions($this->Unit5);
		$this->setupLookupOptions($this->AlterNative1);
		$this->setupLookupOptions($this->AlterNative2);
		$this->setupLookupOptions($this->AlterNative3);
		$this->setupLookupOptions($this->AlterNative4);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pres_tradenames_newlist.php");
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
			if (Get("ID") !== NULL) {
				$this->ID->setQueryStringValue(Get("ID"));
				$this->ID->setOldValue($this->ID->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->ID->setQueryStringValue(Key(0));
				$this->ID->setOldValue($this->ID->QueryStringValue);
			} elseif (Post("ID") !== NULL) {
				$this->ID->setFormValue(Post("ID"));
				$this->ID->setOldValue($this->ID->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->ID->setQueryStringValue(Route(2));
				$this->ID->setOldValue($this->ID->QueryStringValue);
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
				if ($CurrentForm->hasValue("x_ID")) {
					$this->ID->setFormValue($CurrentForm->getValue("x_ID"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("ID") !== NULL) {
					$this->ID->setQueryStringValue(Get("ID"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->ID->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->ID->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
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
					$this->terminate("pres_tradenames_newlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pres_tradenames_newlist.php")
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

					// Set up detail parameters
					$this->setupDetailParms();
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

		// Check field name 'ID' first before field var 'x_ID'
		$val = $CurrentForm->hasValue("ID") ? $CurrentForm->getValue("ID") : $CurrentForm->getValue("x_ID");
		if (!$this->ID->IsDetailKey)
			$this->ID->setFormValue($val);

		// Check field name 'Drug_Name' first before field var 'x_Drug_Name'
		$val = $CurrentForm->hasValue("Drug_Name") ? $CurrentForm->getValue("Drug_Name") : $CurrentForm->getValue("x_Drug_Name");
		if (!$this->Drug_Name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Drug_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Drug_Name->setFormValue($val);
		}

		// Check field name 'Generic_Name' first before field var 'x_Generic_Name'
		$val = $CurrentForm->hasValue("Generic_Name") ? $CurrentForm->getValue("Generic_Name") : $CurrentForm->getValue("x_Generic_Name");
		if (!$this->Generic_Name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Generic_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name->setFormValue($val);
		}

		// Check field name 'Trade_Name' first before field var 'x_Trade_Name'
		$val = $CurrentForm->hasValue("Trade_Name") ? $CurrentForm->getValue("Trade_Name") : $CurrentForm->getValue("x_Trade_Name");
		if (!$this->Trade_Name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Trade_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Trade_Name->setFormValue($val);
		}

		// Check field name 'PR_CODE' first before field var 'x_PR_CODE'
		$val = $CurrentForm->hasValue("PR_CODE") ? $CurrentForm->getValue("PR_CODE") : $CurrentForm->getValue("x_PR_CODE");
		if (!$this->PR_CODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PR_CODE->Visible = FALSE; // Disable update for API request
			else
				$this->PR_CODE->setFormValue($val);
		}

		// Check field name 'Form' first before field var 'x_Form'
		$val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
		if (!$this->Form->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Form->Visible = FALSE; // Disable update for API request
			else
				$this->Form->setFormValue($val);
		}

		// Check field name 'Strength' first before field var 'x_Strength'
		$val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
		if (!$this->Strength->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength->Visible = FALSE; // Disable update for API request
			else
				$this->Strength->setFormValue($val);
		}

		// Check field name 'Unit' first before field var 'x_Unit'
		$val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
		if (!$this->Unit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit->Visible = FALSE; // Disable update for API request
			else
				$this->Unit->setFormValue($val);
		}

		// Check field name 'CONTAINER_TYPE' first before field var 'x_CONTAINER_TYPE'
		$val = $CurrentForm->hasValue("CONTAINER_TYPE") ? $CurrentForm->getValue("CONTAINER_TYPE") : $CurrentForm->getValue("x_CONTAINER_TYPE");
		if (!$this->CONTAINER_TYPE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CONTAINER_TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->CONTAINER_TYPE->setFormValue($val);
		}

		// Check field name 'CONTAINER_STRENGTH' first before field var 'x_CONTAINER_STRENGTH'
		$val = $CurrentForm->hasValue("CONTAINER_STRENGTH") ? $CurrentForm->getValue("CONTAINER_STRENGTH") : $CurrentForm->getValue("x_CONTAINER_STRENGTH");
		if (!$this->CONTAINER_STRENGTH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CONTAINER_STRENGTH->Visible = FALSE; // Disable update for API request
			else
				$this->CONTAINER_STRENGTH->setFormValue($val);
		}

		// Check field name 'TypeOfDrug' first before field var 'x_TypeOfDrug'
		$val = $CurrentForm->hasValue("TypeOfDrug") ? $CurrentForm->getValue("TypeOfDrug") : $CurrentForm->getValue("x_TypeOfDrug");
		if (!$this->TypeOfDrug->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TypeOfDrug->Visible = FALSE; // Disable update for API request
			else
				$this->TypeOfDrug->setFormValue($val);
		}

		// Check field name 'ProductType' first before field var 'x_ProductType'
		$val = $CurrentForm->hasValue("ProductType") ? $CurrentForm->getValue("ProductType") : $CurrentForm->getValue("x_ProductType");
		if (!$this->ProductType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProductType->Visible = FALSE; // Disable update for API request
			else
				$this->ProductType->setFormValue($val);
		}

		// Check field name 'Generic_Name1' first before field var 'x_Generic_Name1'
		$val = $CurrentForm->hasValue("Generic_Name1") ? $CurrentForm->getValue("Generic_Name1") : $CurrentForm->getValue("x_Generic_Name1");
		if (!$this->Generic_Name1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Generic_Name1->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name1->setFormValue($val);
		}

		// Check field name 'Strength1' first before field var 'x_Strength1'
		$val = $CurrentForm->hasValue("Strength1") ? $CurrentForm->getValue("Strength1") : $CurrentForm->getValue("x_Strength1");
		if (!$this->Strength1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength1->Visible = FALSE; // Disable update for API request
			else
				$this->Strength1->setFormValue($val);
		}

		// Check field name 'Unit1' first before field var 'x_Unit1'
		$val = $CurrentForm->hasValue("Unit1") ? $CurrentForm->getValue("Unit1") : $CurrentForm->getValue("x_Unit1");
		if (!$this->Unit1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit1->Visible = FALSE; // Disable update for API request
			else
				$this->Unit1->setFormValue($val);
		}

		// Check field name 'Generic_Name2' first before field var 'x_Generic_Name2'
		$val = $CurrentForm->hasValue("Generic_Name2") ? $CurrentForm->getValue("Generic_Name2") : $CurrentForm->getValue("x_Generic_Name2");
		if (!$this->Generic_Name2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Generic_Name2->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name2->setFormValue($val);
		}

		// Check field name 'Strength2' first before field var 'x_Strength2'
		$val = $CurrentForm->hasValue("Strength2") ? $CurrentForm->getValue("Strength2") : $CurrentForm->getValue("x_Strength2");
		if (!$this->Strength2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength2->Visible = FALSE; // Disable update for API request
			else
				$this->Strength2->setFormValue($val);
		}

		// Check field name 'Unit2' first before field var 'x_Unit2'
		$val = $CurrentForm->hasValue("Unit2") ? $CurrentForm->getValue("Unit2") : $CurrentForm->getValue("x_Unit2");
		if (!$this->Unit2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit2->Visible = FALSE; // Disable update for API request
			else
				$this->Unit2->setFormValue($val);
		}

		// Check field name 'Generic_Name3' first before field var 'x_Generic_Name3'
		$val = $CurrentForm->hasValue("Generic_Name3") ? $CurrentForm->getValue("Generic_Name3") : $CurrentForm->getValue("x_Generic_Name3");
		if (!$this->Generic_Name3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Generic_Name3->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name3->setFormValue($val);
		}

		// Check field name 'Strength3' first before field var 'x_Strength3'
		$val = $CurrentForm->hasValue("Strength3") ? $CurrentForm->getValue("Strength3") : $CurrentForm->getValue("x_Strength3");
		if (!$this->Strength3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength3->Visible = FALSE; // Disable update for API request
			else
				$this->Strength3->setFormValue($val);
		}

		// Check field name 'Unit3' first before field var 'x_Unit3'
		$val = $CurrentForm->hasValue("Unit3") ? $CurrentForm->getValue("Unit3") : $CurrentForm->getValue("x_Unit3");
		if (!$this->Unit3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit3->Visible = FALSE; // Disable update for API request
			else
				$this->Unit3->setFormValue($val);
		}

		// Check field name 'Generic_Name4' first before field var 'x_Generic_Name4'
		$val = $CurrentForm->hasValue("Generic_Name4") ? $CurrentForm->getValue("Generic_Name4") : $CurrentForm->getValue("x_Generic_Name4");
		if (!$this->Generic_Name4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Generic_Name4->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name4->setFormValue($val);
		}

		// Check field name 'Generic_Name5' first before field var 'x_Generic_Name5'
		$val = $CurrentForm->hasValue("Generic_Name5") ? $CurrentForm->getValue("Generic_Name5") : $CurrentForm->getValue("x_Generic_Name5");
		if (!$this->Generic_Name5->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Generic_Name5->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name5->setFormValue($val);
		}

		// Check field name 'Strength4' first before field var 'x_Strength4'
		$val = $CurrentForm->hasValue("Strength4") ? $CurrentForm->getValue("Strength4") : $CurrentForm->getValue("x_Strength4");
		if (!$this->Strength4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength4->Visible = FALSE; // Disable update for API request
			else
				$this->Strength4->setFormValue($val);
		}

		// Check field name 'Strength5' first before field var 'x_Strength5'
		$val = $CurrentForm->hasValue("Strength5") ? $CurrentForm->getValue("Strength5") : $CurrentForm->getValue("x_Strength5");
		if (!$this->Strength5->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Strength5->Visible = FALSE; // Disable update for API request
			else
				$this->Strength5->setFormValue($val);
		}

		// Check field name 'Unit4' first before field var 'x_Unit4'
		$val = $CurrentForm->hasValue("Unit4") ? $CurrentForm->getValue("Unit4") : $CurrentForm->getValue("x_Unit4");
		if (!$this->Unit4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit4->Visible = FALSE; // Disable update for API request
			else
				$this->Unit4->setFormValue($val);
		}

		// Check field name 'Unit5' first before field var 'x_Unit5'
		$val = $CurrentForm->hasValue("Unit5") ? $CurrentForm->getValue("Unit5") : $CurrentForm->getValue("x_Unit5");
		if (!$this->Unit5->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Unit5->Visible = FALSE; // Disable update for API request
			else
				$this->Unit5->setFormValue($val);
		}

		// Check field name 'AlterNative1' first before field var 'x_AlterNative1'
		$val = $CurrentForm->hasValue("AlterNative1") ? $CurrentForm->getValue("AlterNative1") : $CurrentForm->getValue("x_AlterNative1");
		if (!$this->AlterNative1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AlterNative1->Visible = FALSE; // Disable update for API request
			else
				$this->AlterNative1->setFormValue($val);
		}

		// Check field name 'AlterNative2' first before field var 'x_AlterNative2'
		$val = $CurrentForm->hasValue("AlterNative2") ? $CurrentForm->getValue("AlterNative2") : $CurrentForm->getValue("x_AlterNative2");
		if (!$this->AlterNative2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AlterNative2->Visible = FALSE; // Disable update for API request
			else
				$this->AlterNative2->setFormValue($val);
		}

		// Check field name 'AlterNative3' first before field var 'x_AlterNative3'
		$val = $CurrentForm->hasValue("AlterNative3") ? $CurrentForm->getValue("AlterNative3") : $CurrentForm->getValue("x_AlterNative3");
		if (!$this->AlterNative3->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AlterNative3->Visible = FALSE; // Disable update for API request
			else
				$this->AlterNative3->setFormValue($val);
		}

		// Check field name 'AlterNative4' first before field var 'x_AlterNative4'
		$val = $CurrentForm->hasValue("AlterNative4") ? $CurrentForm->getValue("AlterNative4") : $CurrentForm->getValue("x_AlterNative4");
		if (!$this->AlterNative4->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AlterNative4->Visible = FALSE; // Disable update for API request
			else
				$this->AlterNative4->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ID->CurrentValue = $this->ID->FormValue;
		$this->Drug_Name->CurrentValue = $this->Drug_Name->FormValue;
		$this->Generic_Name->CurrentValue = $this->Generic_Name->FormValue;
		$this->Trade_Name->CurrentValue = $this->Trade_Name->FormValue;
		$this->PR_CODE->CurrentValue = $this->PR_CODE->FormValue;
		$this->Form->CurrentValue = $this->Form->FormValue;
		$this->Strength->CurrentValue = $this->Strength->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->CONTAINER_TYPE->CurrentValue = $this->CONTAINER_TYPE->FormValue;
		$this->CONTAINER_STRENGTH->CurrentValue = $this->CONTAINER_STRENGTH->FormValue;
		$this->TypeOfDrug->CurrentValue = $this->TypeOfDrug->FormValue;
		$this->ProductType->CurrentValue = $this->ProductType->FormValue;
		$this->Generic_Name1->CurrentValue = $this->Generic_Name1->FormValue;
		$this->Strength1->CurrentValue = $this->Strength1->FormValue;
		$this->Unit1->CurrentValue = $this->Unit1->FormValue;
		$this->Generic_Name2->CurrentValue = $this->Generic_Name2->FormValue;
		$this->Strength2->CurrentValue = $this->Strength2->FormValue;
		$this->Unit2->CurrentValue = $this->Unit2->FormValue;
		$this->Generic_Name3->CurrentValue = $this->Generic_Name3->FormValue;
		$this->Strength3->CurrentValue = $this->Strength3->FormValue;
		$this->Unit3->CurrentValue = $this->Unit3->FormValue;
		$this->Generic_Name4->CurrentValue = $this->Generic_Name4->FormValue;
		$this->Generic_Name5->CurrentValue = $this->Generic_Name5->FormValue;
		$this->Strength4->CurrentValue = $this->Strength4->FormValue;
		$this->Strength5->CurrentValue = $this->Strength5->FormValue;
		$this->Unit4->CurrentValue = $this->Unit4->FormValue;
		$this->Unit5->CurrentValue = $this->Unit5->FormValue;
		$this->AlterNative1->CurrentValue = $this->AlterNative1->FormValue;
		$this->AlterNative2->CurrentValue = $this->AlterNative2->FormValue;
		$this->AlterNative3->CurrentValue = $this->AlterNative3->FormValue;
		$this->AlterNative4->CurrentValue = $this->AlterNative4->FormValue;
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
		$this->ID->setDbValue($row['ID']);
		$this->Drug_Name->setDbValue($row['Drug_Name']);
		$this->Generic_Name->setDbValue($row['Generic_Name']);
		$this->Trade_Name->setDbValue($row['Trade_Name']);
		$this->PR_CODE->setDbValue($row['PR_CODE']);
		$this->Form->setDbValue($row['Form']);
		$this->Strength->setDbValue($row['Strength']);
		$this->Unit->setDbValue($row['Unit']);
		$this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
		$this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
		$this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
		$this->ProductType->setDbValue($row['ProductType']);
		$this->Generic_Name1->setDbValue($row['Generic_Name1']);
		$this->Strength1->setDbValue($row['Strength1']);
		$this->Unit1->setDbValue($row['Unit1']);
		$this->Generic_Name2->setDbValue($row['Generic_Name2']);
		$this->Strength2->setDbValue($row['Strength2']);
		$this->Unit2->setDbValue($row['Unit2']);
		$this->Generic_Name3->setDbValue($row['Generic_Name3']);
		$this->Strength3->setDbValue($row['Strength3']);
		$this->Unit3->setDbValue($row['Unit3']);
		$this->Generic_Name4->setDbValue($row['Generic_Name4']);
		$this->Generic_Name5->setDbValue($row['Generic_Name5']);
		$this->Strength4->setDbValue($row['Strength4']);
		$this->Strength5->setDbValue($row['Strength5']);
		$this->Unit4->setDbValue($row['Unit4']);
		$this->Unit5->setDbValue($row['Unit5']);
		$this->AlterNative1->setDbValue($row['AlterNative1']);
		$this->AlterNative2->setDbValue($row['AlterNative2']);
		$this->AlterNative3->setDbValue($row['AlterNative3']);
		$this->AlterNative4->setDbValue($row['AlterNative4']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['ID'] = NULL;
		$row['Drug_Name'] = NULL;
		$row['Generic_Name'] = NULL;
		$row['Trade_Name'] = NULL;
		$row['PR_CODE'] = NULL;
		$row['Form'] = NULL;
		$row['Strength'] = NULL;
		$row['Unit'] = NULL;
		$row['CONTAINER_TYPE'] = NULL;
		$row['CONTAINER_STRENGTH'] = NULL;
		$row['TypeOfDrug'] = NULL;
		$row['ProductType'] = NULL;
		$row['Generic_Name1'] = NULL;
		$row['Strength1'] = NULL;
		$row['Unit1'] = NULL;
		$row['Generic_Name2'] = NULL;
		$row['Strength2'] = NULL;
		$row['Unit2'] = NULL;
		$row['Generic_Name3'] = NULL;
		$row['Strength3'] = NULL;
		$row['Unit3'] = NULL;
		$row['Generic_Name4'] = NULL;
		$row['Generic_Name5'] = NULL;
		$row['Strength4'] = NULL;
		$row['Strength5'] = NULL;
		$row['Unit4'] = NULL;
		$row['Unit5'] = NULL;
		$row['AlterNative1'] = NULL;
		$row['AlterNative2'] = NULL;
		$row['AlterNative3'] = NULL;
		$row['AlterNative4'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("ID")) != "")
			$this->ID->OldValue = $this->getKey("ID"); // ID
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
		// ID
		// Drug_Name
		// Generic_Name
		// Trade_Name
		// PR_CODE
		// Form
		// Strength
		// Unit
		// CONTAINER_TYPE
		// CONTAINER_STRENGTH
		// TypeOfDrug
		// ProductType
		// Generic_Name1
		// Strength1
		// Unit1
		// Generic_Name2
		// Strength2
		// Unit2
		// Generic_Name3
		// Strength3
		// Unit3
		// Generic_Name4
		// Generic_Name5
		// Strength4
		// Strength5
		// Unit4
		// Unit5
		// AlterNative1
		// AlterNative2
		// AlterNative3
		// AlterNative4

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ID
			$this->ID->ViewValue = $this->ID->CurrentValue;
			$this->ID->ViewCustomAttributes = "";

			// Drug_Name
			$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
			$this->Drug_Name->ViewCustomAttributes = "";

			// Generic_Name
			$curVal = strval($this->Generic_Name->CurrentValue);
			if ($curVal != "") {
				$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
				if ($this->Generic_Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name->ViewValue = NULL;
			}
			$this->Generic_Name->ViewCustomAttributes = "";

			// Trade_Name
			$this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
			$this->Trade_Name->ViewCustomAttributes = "";

			// PR_CODE
			$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
			$this->PR_CODE->ViewCustomAttributes = "";

			// Form
			$curVal = strval($this->Form->CurrentValue);
			if ($curVal != "") {
				$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
				if ($this->Form->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Form->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Form->ViewValue = $this->Form->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Form->ViewValue = $this->Form->CurrentValue;
					}
				}
			} else {
				$this->Form->ViewValue = NULL;
			}
			$this->Form->ViewCustomAttributes = "";

			// Strength
			$this->Strength->ViewValue = $this->Strength->CurrentValue;
			$this->Strength->ViewCustomAttributes = "";

			// Unit
			$curVal = strval($this->Unit->CurrentValue);
			if ($curVal != "") {
				$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
				if ($this->Unit->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit->ViewValue = $this->Unit->CurrentValue;
					}
				}
			} else {
				$this->Unit->ViewValue = NULL;
			}
			$this->Unit->ViewCustomAttributes = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
			$this->CONTAINER_TYPE->ViewCustomAttributes = "";

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
			$this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

			// TypeOfDrug
			if (strval($this->TypeOfDrug->CurrentValue) != "") {
				$this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
			} else {
				$this->TypeOfDrug->ViewValue = NULL;
			}
			$this->TypeOfDrug->ViewCustomAttributes = "";

			// ProductType
			if (strval($this->ProductType->CurrentValue) != "") {
				$this->ProductType->ViewValue = $this->ProductType->optionCaption($this->ProductType->CurrentValue);
			} else {
				$this->ProductType->ViewValue = NULL;
			}
			$this->ProductType->ViewCustomAttributes = "";

			// Generic_Name1
			$curVal = strval($this->Generic_Name1->CurrentValue);
			if ($curVal != "") {
				$this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
				if ($this->Generic_Name1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name1->ViewValue = NULL;
			}
			$this->Generic_Name1->ViewCustomAttributes = "";

			// Strength1
			$this->Strength1->ViewValue = $this->Strength1->CurrentValue;
			$this->Strength1->ViewCustomAttributes = "";

			// Unit1
			$curVal = strval($this->Unit1->CurrentValue);
			if ($curVal != "") {
				$this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
				if ($this->Unit1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit1->ViewValue = $this->Unit1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit1->ViewValue = $this->Unit1->CurrentValue;
					}
				}
			} else {
				$this->Unit1->ViewValue = NULL;
			}
			$this->Unit1->ViewCustomAttributes = "";

			// Generic_Name2
			$curVal = strval($this->Generic_Name2->CurrentValue);
			if ($curVal != "") {
				$this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
				if ($this->Generic_Name2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name2->ViewValue = NULL;
			}
			$this->Generic_Name2->ViewCustomAttributes = "";

			// Strength2
			$this->Strength2->ViewValue = $this->Strength2->CurrentValue;
			$this->Strength2->ViewCustomAttributes = "";

			// Unit2
			$curVal = strval($this->Unit2->CurrentValue);
			if ($curVal != "") {
				$this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
				if ($this->Unit2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit2->ViewValue = $this->Unit2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit2->ViewValue = $this->Unit2->CurrentValue;
					}
				}
			} else {
				$this->Unit2->ViewValue = NULL;
			}
			$this->Unit2->ViewCustomAttributes = "";

			// Generic_Name3
			$curVal = strval($this->Generic_Name3->CurrentValue);
			if ($curVal != "") {
				$this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
				if ($this->Generic_Name3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name3->ViewValue = NULL;
			}
			$this->Generic_Name3->ViewCustomAttributes = "";

			// Strength3
			$this->Strength3->ViewValue = $this->Strength3->CurrentValue;
			$this->Strength3->ViewCustomAttributes = "";

			// Unit3
			$curVal = strval($this->Unit3->CurrentValue);
			if ($curVal != "") {
				$this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
				if ($this->Unit3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit3->ViewValue = $this->Unit3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit3->ViewValue = $this->Unit3->CurrentValue;
					}
				}
			} else {
				$this->Unit3->ViewValue = NULL;
			}
			$this->Unit3->ViewCustomAttributes = "";

			// Generic_Name4
			$curVal = strval($this->Generic_Name4->CurrentValue);
			if ($curVal != "") {
				$this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
				if ($this->Generic_Name4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name4->ViewValue = NULL;
			}
			$this->Generic_Name4->ViewCustomAttributes = "";

			// Generic_Name5
			$curVal = strval($this->Generic_Name5->CurrentValue);
			if ($curVal != "") {
				$this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
				if ($this->Generic_Name5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name5->ViewValue = NULL;
			}
			$this->Generic_Name5->ViewCustomAttributes = "";

			// Strength4
			$this->Strength4->ViewValue = $this->Strength4->CurrentValue;
			$this->Strength4->ViewCustomAttributes = "";

			// Strength5
			$this->Strength5->ViewValue = $this->Strength5->CurrentValue;
			$this->Strength5->ViewCustomAttributes = "";

			// Unit4
			$curVal = strval($this->Unit4->CurrentValue);
			if ($curVal != "") {
				$this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
				if ($this->Unit4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit4->ViewValue = $this->Unit4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit4->ViewValue = $this->Unit4->CurrentValue;
					}
				}
			} else {
				$this->Unit4->ViewValue = NULL;
			}
			$this->Unit4->ViewCustomAttributes = "";

			// Unit5
			$curVal = strval($this->Unit5->CurrentValue);
			if ($curVal != "") {
				$this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
				if ($this->Unit5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit5->ViewValue = $this->Unit5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit5->ViewValue = $this->Unit5->CurrentValue;
					}
				}
			} else {
				$this->Unit5->ViewValue = NULL;
			}
			$this->Unit5->ViewCustomAttributes = "";

			// AlterNative1
			$curVal = strval($this->AlterNative1->CurrentValue);
			if ($curVal != "") {
				$this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
				if ($this->AlterNative1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
					}
				}
			} else {
				$this->AlterNative1->ViewValue = NULL;
			}
			$this->AlterNative1->ViewCustomAttributes = "";

			// AlterNative2
			$curVal = strval($this->AlterNative2->CurrentValue);
			if ($curVal != "") {
				$this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
				if ($this->AlterNative2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
					}
				}
			} else {
				$this->AlterNative2->ViewValue = NULL;
			}
			$this->AlterNative2->ViewCustomAttributes = "";

			// AlterNative3
			$curVal = strval($this->AlterNative3->CurrentValue);
			if ($curVal != "") {
				$this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
				if ($this->AlterNative3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
					}
				}
			} else {
				$this->AlterNative3->ViewValue = NULL;
			}
			$this->AlterNative3->ViewCustomAttributes = "";

			// AlterNative4
			$curVal = strval($this->AlterNative4->CurrentValue);
			if ($curVal != "") {
				$this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
				if ($this->AlterNative4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AlterNative4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
					}
				}
			} else {
				$this->AlterNative4->ViewValue = NULL;
			}
			$this->AlterNative4->ViewCustomAttributes = "";

			// ID
			$this->ID->LinkCustomAttributes = "";
			$this->ID->HrefValue = "";
			$this->ID->TooltipValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";
			$this->Drug_Name->TooltipValue = "";

			// Generic_Name
			$this->Generic_Name->LinkCustomAttributes = "";
			$this->Generic_Name->HrefValue = "";
			$this->Generic_Name->TooltipValue = "";

			// Trade_Name
			$this->Trade_Name->LinkCustomAttributes = "";
			$this->Trade_Name->HrefValue = "";
			$this->Trade_Name->TooltipValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";
			$this->PR_CODE->TooltipValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";
			$this->Form->TooltipValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";
			$this->Strength->TooltipValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->LinkCustomAttributes = "";
			$this->CONTAINER_TYPE->HrefValue = "";
			$this->CONTAINER_TYPE->TooltipValue = "";

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
			$this->CONTAINER_STRENGTH->HrefValue = "";
			$this->CONTAINER_STRENGTH->TooltipValue = "";

			// TypeOfDrug
			$this->TypeOfDrug->LinkCustomAttributes = "";
			$this->TypeOfDrug->HrefValue = "";
			$this->TypeOfDrug->TooltipValue = "";

			// ProductType
			$this->ProductType->LinkCustomAttributes = "";
			$this->ProductType->HrefValue = "";
			$this->ProductType->TooltipValue = "";

			// Generic_Name1
			$this->Generic_Name1->LinkCustomAttributes = "";
			$this->Generic_Name1->HrefValue = "";
			$this->Generic_Name1->TooltipValue = "";

			// Strength1
			$this->Strength1->LinkCustomAttributes = "";
			$this->Strength1->HrefValue = "";
			$this->Strength1->TooltipValue = "";

			// Unit1
			$this->Unit1->LinkCustomAttributes = "";
			$this->Unit1->HrefValue = "";
			$this->Unit1->TooltipValue = "";

			// Generic_Name2
			$this->Generic_Name2->LinkCustomAttributes = "";
			$this->Generic_Name2->HrefValue = "";
			$this->Generic_Name2->TooltipValue = "";

			// Strength2
			$this->Strength2->LinkCustomAttributes = "";
			$this->Strength2->HrefValue = "";
			$this->Strength2->TooltipValue = "";

			// Unit2
			$this->Unit2->LinkCustomAttributes = "";
			$this->Unit2->HrefValue = "";
			$this->Unit2->TooltipValue = "";

			// Generic_Name3
			$this->Generic_Name3->LinkCustomAttributes = "";
			$this->Generic_Name3->HrefValue = "";
			$this->Generic_Name3->TooltipValue = "";

			// Strength3
			$this->Strength3->LinkCustomAttributes = "";
			$this->Strength3->HrefValue = "";
			$this->Strength3->TooltipValue = "";

			// Unit3
			$this->Unit3->LinkCustomAttributes = "";
			$this->Unit3->HrefValue = "";
			$this->Unit3->TooltipValue = "";

			// Generic_Name4
			$this->Generic_Name4->LinkCustomAttributes = "";
			$this->Generic_Name4->HrefValue = "";
			$this->Generic_Name4->TooltipValue = "";

			// Generic_Name5
			$this->Generic_Name5->LinkCustomAttributes = "";
			$this->Generic_Name5->HrefValue = "";
			$this->Generic_Name5->TooltipValue = "";

			// Strength4
			$this->Strength4->LinkCustomAttributes = "";
			$this->Strength4->HrefValue = "";
			$this->Strength4->TooltipValue = "";

			// Strength5
			$this->Strength5->LinkCustomAttributes = "";
			$this->Strength5->HrefValue = "";
			$this->Strength5->TooltipValue = "";

			// Unit4
			$this->Unit4->LinkCustomAttributes = "";
			$this->Unit4->HrefValue = "";
			$this->Unit4->TooltipValue = "";

			// Unit5
			$this->Unit5->LinkCustomAttributes = "";
			$this->Unit5->HrefValue = "";
			$this->Unit5->TooltipValue = "";

			// AlterNative1
			$this->AlterNative1->LinkCustomAttributes = "";
			$this->AlterNative1->HrefValue = "";
			$this->AlterNative1->TooltipValue = "";

			// AlterNative2
			$this->AlterNative2->LinkCustomAttributes = "";
			$this->AlterNative2->HrefValue = "";
			$this->AlterNative2->TooltipValue = "";

			// AlterNative3
			$this->AlterNative3->LinkCustomAttributes = "";
			$this->AlterNative3->HrefValue = "";
			$this->AlterNative3->TooltipValue = "";

			// AlterNative4
			$this->AlterNative4->LinkCustomAttributes = "";
			$this->AlterNative4->HrefValue = "";
			$this->AlterNative4->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// ID
			$this->ID->EditAttrs["class"] = "form-control";
			$this->ID->EditCustomAttributes = "";
			$this->ID->EditValue = $this->ID->CurrentValue;
			$this->ID->ViewCustomAttributes = "";

			// Drug_Name
			$this->Drug_Name->EditAttrs["class"] = "form-control";
			$this->Drug_Name->EditCustomAttributes = "";
			if (!$this->Drug_Name->Raw)
				$this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
			$this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->CurrentValue);
			$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

			// Generic_Name
			$this->Generic_Name->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name->CurrentValue));
			if ($curVal != "")
				$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
			else
				$this->Generic_Name->ViewValue = $this->Generic_Name->Lookup !== NULL && is_array($this->Generic_Name->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name->EditValue = array_values($this->Generic_Name->Lookup->Options);
				if ($this->Generic_Name->ViewValue == "")
					$this->Generic_Name->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
				} else {
					$this->Generic_Name->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Generic_Name->EditValue = $arwrk;
			}

			// Trade_Name
			$this->Trade_Name->EditAttrs["class"] = "form-control";
			$this->Trade_Name->EditCustomAttributes = "";
			if (!$this->Trade_Name->Raw)
				$this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
			$this->Trade_Name->EditValue = HtmlEncode($this->Trade_Name->CurrentValue);
			$this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

			// PR_CODE
			$this->PR_CODE->EditAttrs["class"] = "form-control";
			$this->PR_CODE->EditCustomAttributes = "";
			if (!$this->PR_CODE->Raw)
				$this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
			$this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->CurrentValue);
			$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

			// Form
			$this->Form->EditAttrs["class"] = "form-control";
			$this->Form->EditCustomAttributes = "";
			$curVal = trim(strval($this->Form->CurrentValue));
			if ($curVal != "")
				$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
			else
				$this->Form->ViewValue = $this->Form->Lookup !== NULL && is_array($this->Form->Lookup->Options) ? $curVal : NULL;
			if ($this->Form->ViewValue !== NULL) { // Load from cache
				$this->Form->EditValue = array_values($this->Form->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Forms`" . SearchString("=", $this->Form->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Form->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Form->EditValue = $arwrk;
			}

			// Strength
			$this->Strength->EditAttrs["class"] = "form-control";
			$this->Strength->EditCustomAttributes = "";
			if (!$this->Strength->Raw)
				$this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
			$this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
			$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit->CurrentValue));
			if ($curVal != "")
				$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
			else
				$this->Unit->ViewValue = $this->Unit->Lookup !== NULL && is_array($this->Unit->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit->ViewValue !== NULL) { // Load from cache
				$this->Unit->EditValue = array_values($this->Unit->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Unit->EditValue = $arwrk;
			}

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
			$this->CONTAINER_TYPE->EditCustomAttributes = "";
			if (!$this->CONTAINER_TYPE->Raw)
				$this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
			$this->CONTAINER_TYPE->EditValue = HtmlEncode($this->CONTAINER_TYPE->CurrentValue);
			$this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
			$this->CONTAINER_STRENGTH->EditCustomAttributes = "";
			if (!$this->CONTAINER_STRENGTH->Raw)
				$this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
			$this->CONTAINER_STRENGTH->EditValue = HtmlEncode($this->CONTAINER_STRENGTH->CurrentValue);
			$this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

			// TypeOfDrug
			$this->TypeOfDrug->EditAttrs["class"] = "form-control";
			$this->TypeOfDrug->EditCustomAttributes = "";
			$this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(TRUE);

			// ProductType
			$this->ProductType->EditAttrs["class"] = "form-control";
			$this->ProductType->EditCustomAttributes = "";
			$this->ProductType->EditValue = $this->ProductType->options(TRUE);

			// Generic_Name1
			$this->Generic_Name1->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name1->CurrentValue));
			if ($curVal != "")
				$this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
			else
				$this->Generic_Name1->ViewValue = $this->Generic_Name1->Lookup !== NULL && is_array($this->Generic_Name1->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name1->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name1->EditValue = array_values($this->Generic_Name1->Lookup->Options);
				if ($this->Generic_Name1->ViewValue == "")
					$this->Generic_Name1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name1->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
				} else {
					$this->Generic_Name1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Generic_Name1->EditValue = $arwrk;
			}

			// Strength1
			$this->Strength1->EditAttrs["class"] = "form-control";
			$this->Strength1->EditCustomAttributes = "";
			if (!$this->Strength1->Raw)
				$this->Strength1->CurrentValue = HtmlDecode($this->Strength1->CurrentValue);
			$this->Strength1->EditValue = HtmlEncode($this->Strength1->CurrentValue);
			$this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

			// Unit1
			$this->Unit1->EditAttrs["class"] = "form-control";
			$this->Unit1->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit1->CurrentValue));
			if ($curVal != "")
				$this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
			else
				$this->Unit1->ViewValue = $this->Unit1->Lookup !== NULL && is_array($this->Unit1->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit1->ViewValue !== NULL) { // Load from cache
				$this->Unit1->EditValue = array_values($this->Unit1->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit1->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Unit1->EditValue = $arwrk;
			}

			// Generic_Name2
			$this->Generic_Name2->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name2->CurrentValue));
			if ($curVal != "")
				$this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
			else
				$this->Generic_Name2->ViewValue = $this->Generic_Name2->Lookup !== NULL && is_array($this->Generic_Name2->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name2->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name2->EditValue = array_values($this->Generic_Name2->Lookup->Options);
				if ($this->Generic_Name2->ViewValue == "")
					$this->Generic_Name2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name2->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
				} else {
					$this->Generic_Name2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Generic_Name2->EditValue = $arwrk;
			}

			// Strength2
			$this->Strength2->EditAttrs["class"] = "form-control";
			$this->Strength2->EditCustomAttributes = "";
			if (!$this->Strength2->Raw)
				$this->Strength2->CurrentValue = HtmlDecode($this->Strength2->CurrentValue);
			$this->Strength2->EditValue = HtmlEncode($this->Strength2->CurrentValue);
			$this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

			// Unit2
			$this->Unit2->EditAttrs["class"] = "form-control";
			$this->Unit2->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit2->CurrentValue));
			if ($curVal != "")
				$this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
			else
				$this->Unit2->ViewValue = $this->Unit2->Lookup !== NULL && is_array($this->Unit2->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit2->ViewValue !== NULL) { // Load from cache
				$this->Unit2->EditValue = array_values($this->Unit2->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit2->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Unit2->EditValue = $arwrk;
			}

			// Generic_Name3
			$this->Generic_Name3->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name3->CurrentValue));
			if ($curVal != "")
				$this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
			else
				$this->Generic_Name3->ViewValue = $this->Generic_Name3->Lookup !== NULL && is_array($this->Generic_Name3->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name3->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name3->EditValue = array_values($this->Generic_Name3->Lookup->Options);
				if ($this->Generic_Name3->ViewValue == "")
					$this->Generic_Name3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name3->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
				} else {
					$this->Generic_Name3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Generic_Name3->EditValue = $arwrk;
			}

			// Strength3
			$this->Strength3->EditAttrs["class"] = "form-control";
			$this->Strength3->EditCustomAttributes = "";
			if (!$this->Strength3->Raw)
				$this->Strength3->CurrentValue = HtmlDecode($this->Strength3->CurrentValue);
			$this->Strength3->EditValue = HtmlEncode($this->Strength3->CurrentValue);
			$this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

			// Unit3
			$this->Unit3->EditAttrs["class"] = "form-control";
			$this->Unit3->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit3->CurrentValue));
			if ($curVal != "")
				$this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
			else
				$this->Unit3->ViewValue = $this->Unit3->Lookup !== NULL && is_array($this->Unit3->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit3->ViewValue !== NULL) { // Load from cache
				$this->Unit3->EditValue = array_values($this->Unit3->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit3->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Unit3->EditValue = $arwrk;
			}

			// Generic_Name4
			$this->Generic_Name4->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name4->CurrentValue));
			if ($curVal != "")
				$this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
			else
				$this->Generic_Name4->ViewValue = $this->Generic_Name4->Lookup !== NULL && is_array($this->Generic_Name4->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name4->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name4->EditValue = array_values($this->Generic_Name4->Lookup->Options);
				if ($this->Generic_Name4->ViewValue == "")
					$this->Generic_Name4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name4->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
				} else {
					$this->Generic_Name4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Generic_Name4->EditValue = $arwrk;
			}

			// Generic_Name5
			$this->Generic_Name5->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name5->CurrentValue));
			if ($curVal != "")
				$this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
			else
				$this->Generic_Name5->ViewValue = $this->Generic_Name5->Lookup !== NULL && is_array($this->Generic_Name5->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name5->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name5->EditValue = array_values($this->Generic_Name5->Lookup->Options);
				if ($this->Generic_Name5->ViewValue == "")
					$this->Generic_Name5->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name5->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name5->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
				} else {
					$this->Generic_Name5->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Generic_Name5->EditValue = $arwrk;
			}

			// Strength4
			$this->Strength4->EditAttrs["class"] = "form-control";
			$this->Strength4->EditCustomAttributes = "";
			if (!$this->Strength4->Raw)
				$this->Strength4->CurrentValue = HtmlDecode($this->Strength4->CurrentValue);
			$this->Strength4->EditValue = HtmlEncode($this->Strength4->CurrentValue);
			$this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

			// Strength5
			$this->Strength5->EditAttrs["class"] = "form-control";
			$this->Strength5->EditCustomAttributes = "";
			if (!$this->Strength5->Raw)
				$this->Strength5->CurrentValue = HtmlDecode($this->Strength5->CurrentValue);
			$this->Strength5->EditValue = HtmlEncode($this->Strength5->CurrentValue);
			$this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

			// Unit4
			$this->Unit4->EditAttrs["class"] = "form-control";
			$this->Unit4->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit4->CurrentValue));
			if ($curVal != "")
				$this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
			else
				$this->Unit4->ViewValue = $this->Unit4->Lookup !== NULL && is_array($this->Unit4->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit4->ViewValue !== NULL) { // Load from cache
				$this->Unit4->EditValue = array_values($this->Unit4->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit4->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Unit4->EditValue = $arwrk;
			}

			// Unit5
			$this->Unit5->EditAttrs["class"] = "form-control";
			$this->Unit5->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit5->CurrentValue));
			if ($curVal != "")
				$this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
			else
				$this->Unit5->ViewValue = $this->Unit5->Lookup !== NULL && is_array($this->Unit5->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit5->ViewValue !== NULL) { // Load from cache
				$this->Unit5->EditValue = array_values($this->Unit5->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit5->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit5->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Unit5->EditValue = $arwrk;
			}

			// AlterNative1
			$this->AlterNative1->EditCustomAttributes = "";
			$curVal = trim(strval($this->AlterNative1->CurrentValue));
			if ($curVal != "")
				$this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
			else
				$this->AlterNative1->ViewValue = $this->AlterNative1->Lookup !== NULL && is_array($this->AlterNative1->Lookup->Options) ? $curVal : NULL;
			if ($this->AlterNative1->ViewValue !== NULL) { // Load from cache
				$this->AlterNative1->EditValue = array_values($this->AlterNative1->Lookup->Options);
				if ($this->AlterNative1->ViewValue == "")
					$this->AlterNative1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`ID`" . SearchString("=", $this->AlterNative1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AlterNative1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
				} else {
					$this->AlterNative1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AlterNative1->EditValue = $arwrk;
			}

			// AlterNative2
			$this->AlterNative2->EditCustomAttributes = "";
			$curVal = trim(strval($this->AlterNative2->CurrentValue));
			if ($curVal != "")
				$this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
			else
				$this->AlterNative2->ViewValue = $this->AlterNative2->Lookup !== NULL && is_array($this->AlterNative2->Lookup->Options) ? $curVal : NULL;
			if ($this->AlterNative2->ViewValue !== NULL) { // Load from cache
				$this->AlterNative2->EditValue = array_values($this->AlterNative2->Lookup->Options);
				if ($this->AlterNative2->ViewValue == "")
					$this->AlterNative2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`ID`" . SearchString("=", $this->AlterNative2->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AlterNative2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
				} else {
					$this->AlterNative2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AlterNative2->EditValue = $arwrk;
			}

			// AlterNative3
			$this->AlterNative3->EditCustomAttributes = "";
			$curVal = trim(strval($this->AlterNative3->CurrentValue));
			if ($curVal != "")
				$this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
			else
				$this->AlterNative3->ViewValue = $this->AlterNative3->Lookup !== NULL && is_array($this->AlterNative3->Lookup->Options) ? $curVal : NULL;
			if ($this->AlterNative3->ViewValue !== NULL) { // Load from cache
				$this->AlterNative3->EditValue = array_values($this->AlterNative3->Lookup->Options);
				if ($this->AlterNative3->ViewValue == "")
					$this->AlterNative3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`ID`" . SearchString("=", $this->AlterNative3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AlterNative3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
				} else {
					$this->AlterNative3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AlterNative3->EditValue = $arwrk;
			}

			// AlterNative4
			$this->AlterNative4->EditCustomAttributes = "";
			$curVal = trim(strval($this->AlterNative4->CurrentValue));
			if ($curVal != "")
				$this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
			else
				$this->AlterNative4->ViewValue = $this->AlterNative4->Lookup !== NULL && is_array($this->AlterNative4->Lookup->Options) ? $curVal : NULL;
			if ($this->AlterNative4->ViewValue !== NULL) { // Load from cache
				$this->AlterNative4->EditValue = array_values($this->AlterNative4->Lookup->Options);
				if ($this->AlterNative4->ViewValue == "")
					$this->AlterNative4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`ID`" . SearchString("=", $this->AlterNative4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AlterNative4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
				} else {
					$this->AlterNative4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->AlterNative4->EditValue = $arwrk;
			}

			// Edit refer script
			// ID

			$this->ID->LinkCustomAttributes = "";
			$this->ID->HrefValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";

			// Generic_Name
			$this->Generic_Name->LinkCustomAttributes = "";
			$this->Generic_Name->HrefValue = "";

			// Trade_Name
			$this->Trade_Name->LinkCustomAttributes = "";
			$this->Trade_Name->HrefValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->LinkCustomAttributes = "";
			$this->CONTAINER_TYPE->HrefValue = "";

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
			$this->CONTAINER_STRENGTH->HrefValue = "";

			// TypeOfDrug
			$this->TypeOfDrug->LinkCustomAttributes = "";
			$this->TypeOfDrug->HrefValue = "";

			// ProductType
			$this->ProductType->LinkCustomAttributes = "";
			$this->ProductType->HrefValue = "";

			// Generic_Name1
			$this->Generic_Name1->LinkCustomAttributes = "";
			$this->Generic_Name1->HrefValue = "";

			// Strength1
			$this->Strength1->LinkCustomAttributes = "";
			$this->Strength1->HrefValue = "";

			// Unit1
			$this->Unit1->LinkCustomAttributes = "";
			$this->Unit1->HrefValue = "";

			// Generic_Name2
			$this->Generic_Name2->LinkCustomAttributes = "";
			$this->Generic_Name2->HrefValue = "";

			// Strength2
			$this->Strength2->LinkCustomAttributes = "";
			$this->Strength2->HrefValue = "";

			// Unit2
			$this->Unit2->LinkCustomAttributes = "";
			$this->Unit2->HrefValue = "";

			// Generic_Name3
			$this->Generic_Name3->LinkCustomAttributes = "";
			$this->Generic_Name3->HrefValue = "";

			// Strength3
			$this->Strength3->LinkCustomAttributes = "";
			$this->Strength3->HrefValue = "";

			// Unit3
			$this->Unit3->LinkCustomAttributes = "";
			$this->Unit3->HrefValue = "";

			// Generic_Name4
			$this->Generic_Name4->LinkCustomAttributes = "";
			$this->Generic_Name4->HrefValue = "";

			// Generic_Name5
			$this->Generic_Name5->LinkCustomAttributes = "";
			$this->Generic_Name5->HrefValue = "";

			// Strength4
			$this->Strength4->LinkCustomAttributes = "";
			$this->Strength4->HrefValue = "";

			// Strength5
			$this->Strength5->LinkCustomAttributes = "";
			$this->Strength5->HrefValue = "";

			// Unit4
			$this->Unit4->LinkCustomAttributes = "";
			$this->Unit4->HrefValue = "";

			// Unit5
			$this->Unit5->LinkCustomAttributes = "";
			$this->Unit5->HrefValue = "";

			// AlterNative1
			$this->AlterNative1->LinkCustomAttributes = "";
			$this->AlterNative1->HrefValue = "";

			// AlterNative2
			$this->AlterNative2->LinkCustomAttributes = "";
			$this->AlterNative2->HrefValue = "";

			// AlterNative3
			$this->AlterNative3->LinkCustomAttributes = "";
			$this->AlterNative3->HrefValue = "";

			// AlterNative4
			$this->AlterNative4->LinkCustomAttributes = "";
			$this->AlterNative4->HrefValue = "";
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
		if ($this->ID->Required) {
			if (!$this->ID->IsDetailKey && $this->ID->FormValue != NULL && $this->ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ID->caption(), $this->ID->RequiredErrorMessage));
			}
		}
		if ($this->Drug_Name->Required) {
			if (!$this->Drug_Name->IsDetailKey && $this->Drug_Name->FormValue != NULL && $this->Drug_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Drug_Name->caption(), $this->Drug_Name->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name->Required) {
			if (!$this->Generic_Name->IsDetailKey && $this->Generic_Name->FormValue != NULL && $this->Generic_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name->caption(), $this->Generic_Name->RequiredErrorMessage));
			}
		}
		if ($this->Trade_Name->Required) {
			if (!$this->Trade_Name->IsDetailKey && $this->Trade_Name->FormValue != NULL && $this->Trade_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Trade_Name->caption(), $this->Trade_Name->RequiredErrorMessage));
			}
		}
		if ($this->PR_CODE->Required) {
			if (!$this->PR_CODE->IsDetailKey && $this->PR_CODE->FormValue != NULL && $this->PR_CODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR_CODE->caption(), $this->PR_CODE->RequiredErrorMessage));
			}
		}
		if ($this->Form->Required) {
			if (!$this->Form->IsDetailKey && $this->Form->FormValue != NULL && $this->Form->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
			}
		}
		if ($this->Strength->Required) {
			if (!$this->Strength->IsDetailKey && $this->Strength->FormValue != NULL && $this->Strength->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
			}
		}
		if ($this->Unit->Required) {
			if (!$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if ($this->CONTAINER_TYPE->Required) {
			if (!$this->CONTAINER_TYPE->IsDetailKey && $this->CONTAINER_TYPE->FormValue != NULL && $this->CONTAINER_TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CONTAINER_TYPE->caption(), $this->CONTAINER_TYPE->RequiredErrorMessage));
			}
		}
		if ($this->CONTAINER_STRENGTH->Required) {
			if (!$this->CONTAINER_STRENGTH->IsDetailKey && $this->CONTAINER_STRENGTH->FormValue != NULL && $this->CONTAINER_STRENGTH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CONTAINER_STRENGTH->caption(), $this->CONTAINER_STRENGTH->RequiredErrorMessage));
			}
		}
		if ($this->TypeOfDrug->Required) {
			if (!$this->TypeOfDrug->IsDetailKey && $this->TypeOfDrug->FormValue != NULL && $this->TypeOfDrug->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TypeOfDrug->caption(), $this->TypeOfDrug->RequiredErrorMessage));
			}
		}
		if ($this->ProductType->Required) {
			if (!$this->ProductType->IsDetailKey && $this->ProductType->FormValue != NULL && $this->ProductType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductType->caption(), $this->ProductType->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name1->Required) {
			if (!$this->Generic_Name1->IsDetailKey && $this->Generic_Name1->FormValue != NULL && $this->Generic_Name1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name1->caption(), $this->Generic_Name1->RequiredErrorMessage));
			}
		}
		if ($this->Strength1->Required) {
			if (!$this->Strength1->IsDetailKey && $this->Strength1->FormValue != NULL && $this->Strength1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength1->caption(), $this->Strength1->RequiredErrorMessage));
			}
		}
		if ($this->Unit1->Required) {
			if (!$this->Unit1->IsDetailKey && $this->Unit1->FormValue != NULL && $this->Unit1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit1->caption(), $this->Unit1->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name2->Required) {
			if (!$this->Generic_Name2->IsDetailKey && $this->Generic_Name2->FormValue != NULL && $this->Generic_Name2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name2->caption(), $this->Generic_Name2->RequiredErrorMessage));
			}
		}
		if ($this->Strength2->Required) {
			if (!$this->Strength2->IsDetailKey && $this->Strength2->FormValue != NULL && $this->Strength2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength2->caption(), $this->Strength2->RequiredErrorMessage));
			}
		}
		if ($this->Unit2->Required) {
			if (!$this->Unit2->IsDetailKey && $this->Unit2->FormValue != NULL && $this->Unit2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit2->caption(), $this->Unit2->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name3->Required) {
			if (!$this->Generic_Name3->IsDetailKey && $this->Generic_Name3->FormValue != NULL && $this->Generic_Name3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name3->caption(), $this->Generic_Name3->RequiredErrorMessage));
			}
		}
		if ($this->Strength3->Required) {
			if (!$this->Strength3->IsDetailKey && $this->Strength3->FormValue != NULL && $this->Strength3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength3->caption(), $this->Strength3->RequiredErrorMessage));
			}
		}
		if ($this->Unit3->Required) {
			if (!$this->Unit3->IsDetailKey && $this->Unit3->FormValue != NULL && $this->Unit3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit3->caption(), $this->Unit3->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name4->Required) {
			if (!$this->Generic_Name4->IsDetailKey && $this->Generic_Name4->FormValue != NULL && $this->Generic_Name4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name4->caption(), $this->Generic_Name4->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name5->Required) {
			if (!$this->Generic_Name5->IsDetailKey && $this->Generic_Name5->FormValue != NULL && $this->Generic_Name5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name5->caption(), $this->Generic_Name5->RequiredErrorMessage));
			}
		}
		if ($this->Strength4->Required) {
			if (!$this->Strength4->IsDetailKey && $this->Strength4->FormValue != NULL && $this->Strength4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength4->caption(), $this->Strength4->RequiredErrorMessage));
			}
		}
		if ($this->Strength5->Required) {
			if (!$this->Strength5->IsDetailKey && $this->Strength5->FormValue != NULL && $this->Strength5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength5->caption(), $this->Strength5->RequiredErrorMessage));
			}
		}
		if ($this->Unit4->Required) {
			if (!$this->Unit4->IsDetailKey && $this->Unit4->FormValue != NULL && $this->Unit4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit4->caption(), $this->Unit4->RequiredErrorMessage));
			}
		}
		if ($this->Unit5->Required) {
			if (!$this->Unit5->IsDetailKey && $this->Unit5->FormValue != NULL && $this->Unit5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit5->caption(), $this->Unit5->RequiredErrorMessage));
			}
		}
		if ($this->AlterNative1->Required) {
			if (!$this->AlterNative1->IsDetailKey && $this->AlterNative1->FormValue != NULL && $this->AlterNative1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AlterNative1->caption(), $this->AlterNative1->RequiredErrorMessage));
			}
		}
		if ($this->AlterNative2->Required) {
			if (!$this->AlterNative2->IsDetailKey && $this->AlterNative2->FormValue != NULL && $this->AlterNative2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AlterNative2->caption(), $this->AlterNative2->RequiredErrorMessage));
			}
		}
		if ($this->AlterNative3->Required) {
			if (!$this->AlterNative3->IsDetailKey && $this->AlterNative3->FormValue != NULL && $this->AlterNative3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AlterNative3->caption(), $this->AlterNative3->RequiredErrorMessage));
			}
		}
		if ($this->AlterNative4->Required) {
			if (!$this->AlterNative4->IsDetailKey && $this->AlterNative4->FormValue != NULL && $this->AlterNative4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AlterNative4->caption(), $this->AlterNative4->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("pres_trade_combination_names_new", $detailTblVar) && $GLOBALS["pres_trade_combination_names_new"]->DetailEdit) {
			if (!isset($GLOBALS["pres_trade_combination_names_new_grid"]))
				$GLOBALS["pres_trade_combination_names_new_grid"] = new pres_trade_combination_names_new_grid(); // Get detail page object
			$GLOBALS["pres_trade_combination_names_new_grid"]->validateGridForm();
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

			// Begin transaction
			if ($this->getCurrentDetailTable() != "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// Drug_Name
			$this->Drug_Name->setDbValueDef($rsnew, $this->Drug_Name->CurrentValue, NULL, $this->Drug_Name->ReadOnly);

			// Generic_Name
			$this->Generic_Name->setDbValueDef($rsnew, $this->Generic_Name->CurrentValue, NULL, $this->Generic_Name->ReadOnly);

			// Trade_Name
			$this->Trade_Name->setDbValueDef($rsnew, $this->Trade_Name->CurrentValue, "", $this->Trade_Name->ReadOnly);

			// PR_CODE
			$this->PR_CODE->setDbValueDef($rsnew, $this->PR_CODE->CurrentValue, "", $this->PR_CODE->ReadOnly);

			// Form
			$this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, NULL, $this->Form->ReadOnly);

			// Strength
			$this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, NULL, $this->Strength->ReadOnly);

			// Unit
			$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, NULL, $this->Unit->ReadOnly);

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->setDbValueDef($rsnew, $this->CONTAINER_TYPE->CurrentValue, NULL, $this->CONTAINER_TYPE->ReadOnly);

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->setDbValueDef($rsnew, $this->CONTAINER_STRENGTH->CurrentValue, NULL, $this->CONTAINER_STRENGTH->ReadOnly);

			// TypeOfDrug
			$this->TypeOfDrug->setDbValueDef($rsnew, $this->TypeOfDrug->CurrentValue, NULL, $this->TypeOfDrug->ReadOnly);

			// ProductType
			$this->ProductType->setDbValueDef($rsnew, $this->ProductType->CurrentValue, NULL, $this->ProductType->ReadOnly);

			// Generic_Name1
			$this->Generic_Name1->setDbValueDef($rsnew, $this->Generic_Name1->CurrentValue, NULL, $this->Generic_Name1->ReadOnly);

			// Strength1
			$this->Strength1->setDbValueDef($rsnew, $this->Strength1->CurrentValue, NULL, $this->Strength1->ReadOnly);

			// Unit1
			$this->Unit1->setDbValueDef($rsnew, $this->Unit1->CurrentValue, NULL, $this->Unit1->ReadOnly);

			// Generic_Name2
			$this->Generic_Name2->setDbValueDef($rsnew, $this->Generic_Name2->CurrentValue, NULL, $this->Generic_Name2->ReadOnly);

			// Strength2
			$this->Strength2->setDbValueDef($rsnew, $this->Strength2->CurrentValue, NULL, $this->Strength2->ReadOnly);

			// Unit2
			$this->Unit2->setDbValueDef($rsnew, $this->Unit2->CurrentValue, NULL, $this->Unit2->ReadOnly);

			// Generic_Name3
			$this->Generic_Name3->setDbValueDef($rsnew, $this->Generic_Name3->CurrentValue, NULL, $this->Generic_Name3->ReadOnly);

			// Strength3
			$this->Strength3->setDbValueDef($rsnew, $this->Strength3->CurrentValue, NULL, $this->Strength3->ReadOnly);

			// Unit3
			$this->Unit3->setDbValueDef($rsnew, $this->Unit3->CurrentValue, NULL, $this->Unit3->ReadOnly);

			// Generic_Name4
			$this->Generic_Name4->setDbValueDef($rsnew, $this->Generic_Name4->CurrentValue, NULL, $this->Generic_Name4->ReadOnly);

			// Generic_Name5
			$this->Generic_Name5->setDbValueDef($rsnew, $this->Generic_Name5->CurrentValue, NULL, $this->Generic_Name5->ReadOnly);

			// Strength4
			$this->Strength4->setDbValueDef($rsnew, $this->Strength4->CurrentValue, NULL, $this->Strength4->ReadOnly);

			// Strength5
			$this->Strength5->setDbValueDef($rsnew, $this->Strength5->CurrentValue, NULL, $this->Strength5->ReadOnly);

			// Unit4
			$this->Unit4->setDbValueDef($rsnew, $this->Unit4->CurrentValue, NULL, $this->Unit4->ReadOnly);

			// Unit5
			$this->Unit5->setDbValueDef($rsnew, $this->Unit5->CurrentValue, NULL, $this->Unit5->ReadOnly);

			// AlterNative1
			$this->AlterNative1->setDbValueDef($rsnew, $this->AlterNative1->CurrentValue, NULL, $this->AlterNative1->ReadOnly);

			// AlterNative2
			$this->AlterNative2->setDbValueDef($rsnew, $this->AlterNative2->CurrentValue, NULL, $this->AlterNative2->ReadOnly);

			// AlterNative3
			$this->AlterNative3->setDbValueDef($rsnew, $this->AlterNative3->CurrentValue, NULL, $this->AlterNative3->ReadOnly);

			// AlterNative4
			$this->AlterNative4->setDbValueDef($rsnew, $this->AlterNative4->CurrentValue, NULL, $this->AlterNative4->ReadOnly);

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

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("pres_trade_combination_names_new", $detailTblVar) && $GLOBALS["pres_trade_combination_names_new"]->DetailEdit) {
						if (!isset($GLOBALS["pres_trade_combination_names_new_grid"]))
							$GLOBALS["pres_trade_combination_names_new_grid"] = new pres_trade_combination_names_new_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "pres_trade_combination_names_new"); // Load user level of detail table
						$editRow = $GLOBALS["pres_trade_combination_names_new_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() != "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
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

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		$detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
		if ($detailTblVar !== NULL) {
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar != "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("pres_trade_combination_names_new", $detailTblVar)) {
				if (!isset($GLOBALS["pres_trade_combination_names_new_grid"]))
					$GLOBALS["pres_trade_combination_names_new_grid"] = new pres_trade_combination_names_new_grid();
				if ($GLOBALS["pres_trade_combination_names_new_grid"]->DetailEdit) {
					$GLOBALS["pres_trade_combination_names_new_grid"]->CurrentMode = "edit";
					$GLOBALS["pres_trade_combination_names_new_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["pres_trade_combination_names_new_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["pres_trade_combination_names_new_grid"]->setStartRecordNumber(1);
					$GLOBALS["pres_trade_combination_names_new_grid"]->tradenames_id->IsDetailKey = TRUE;
					$GLOBALS["pres_trade_combination_names_new_grid"]->tradenames_id->CurrentValue = $this->ID->CurrentValue;
					$GLOBALS["pres_trade_combination_names_new_grid"]->tradenames_id->setSessionValue($GLOBALS["pres_trade_combination_names_new_grid"]->tradenames_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pres_tradenames_newlist.php"), "", $this->TableVar, TRUE);
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
				case "x_Generic_Name":
					break;
				case "x_Form":
					break;
				case "x_Unit":
					break;
				case "x_TypeOfDrug":
					break;
				case "x_ProductType":
					break;
				case "x_Generic_Name1":
					break;
				case "x_Unit1":
					break;
				case "x_Generic_Name2":
					break;
				case "x_Unit2":
					break;
				case "x_Generic_Name3":
					break;
				case "x_Unit3":
					break;
				case "x_Generic_Name4":
					break;
				case "x_Generic_Name5":
					break;
				case "x_Unit4":
					break;
				case "x_Unit5":
					break;
				case "x_AlterNative1":
					break;
				case "x_AlterNative2":
					break;
				case "x_AlterNative3":
					break;
				case "x_AlterNative4":
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
						case "x_Generic_Name":
							break;
						case "x_Form":
							break;
						case "x_Unit":
							break;
						case "x_Generic_Name1":
							break;
						case "x_Unit1":
							break;
						case "x_Generic_Name2":
							break;
						case "x_Unit2":
							break;
						case "x_Generic_Name3":
							break;
						case "x_Unit3":
							break;
						case "x_Generic_Name4":
							break;
						case "x_Generic_Name5":
							break;
						case "x_Unit4":
							break;
						case "x_Unit5":
							break;
						case "x_AlterNative1":
							break;
						case "x_AlterNative2":
							break;
						case "x_AlterNative3":
							break;
						case "x_AlterNative4":
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
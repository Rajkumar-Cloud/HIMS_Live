<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_donorsemendetails_edit extends ivf_donorsemendetails
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_donorsemendetails';

	// Page object name
	public $PageObjName = "ivf_donorsemendetails_edit";

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

		// Table object (ivf_donorsemendetails)
		if (!isset($GLOBALS["ivf_donorsemendetails"]) || get_class($GLOBALS["ivf_donorsemendetails"]) == PROJECT_NAMESPACE . "ivf_donorsemendetails") {
			$GLOBALS["ivf_donorsemendetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_donorsemendetails"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_donorsemendetails');

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
		global $ivf_donorsemendetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_donorsemendetails);
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
					if ($pageName == "ivf_donorsemendetailsview.php")
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
					$this->terminate(GetUrl("ivf_donorsemendetailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->TidNo->setVisibility();
		$this->Agency->setVisibility();
		$this->ReceivedOn->setVisibility();
		$this->ReceivedBy->setVisibility();
		$this->DonorNo->setVisibility();
		$this->BatchNo->setVisibility();
		$this->BloodGroup->setVisibility();
		$this->Height->setVisibility();
		$this->SkinColor->setVisibility();
		$this->EyeColor->setVisibility();
		$this->HairColor->setVisibility();
		$this->NoOfVials->setVisibility();
		$this->Tank->setVisibility();
		$this->Canister->setVisibility();
		$this->Remarks->setVisibility();
		$this->patientid->setVisibility();
		$this->coupleid->setVisibility();
		$this->Usedstatus->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->Lagency->setVisibility();
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
		$this->setupLookupOptions($this->BloodGroup);
		$this->setupLookupOptions($this->Lagency);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_donorsemendetailslist.php");
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
					$this->terminate("ivf_donorsemendetailslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ivf_donorsemendetailslist.php")
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

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'Agency' first before field var 'x_Agency'
		$val = $CurrentForm->hasValue("Agency") ? $CurrentForm->getValue("Agency") : $CurrentForm->getValue("x_Agency");
		if (!$this->Agency->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Agency->Visible = FALSE; // Disable update for API request
			else
				$this->Agency->setFormValue($val);
		}

		// Check field name 'ReceivedOn' first before field var 'x_ReceivedOn'
		$val = $CurrentForm->hasValue("ReceivedOn") ? $CurrentForm->getValue("ReceivedOn") : $CurrentForm->getValue("x_ReceivedOn");
		if (!$this->ReceivedOn->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReceivedOn->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedOn->setFormValue($val);
			$this->ReceivedOn->CurrentValue = UnFormatDateTime($this->ReceivedOn->CurrentValue, 0);
		}

		// Check field name 'ReceivedBy' first before field var 'x_ReceivedBy'
		$val = $CurrentForm->hasValue("ReceivedBy") ? $CurrentForm->getValue("ReceivedBy") : $CurrentForm->getValue("x_ReceivedBy");
		if (!$this->ReceivedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReceivedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedBy->setFormValue($val);
		}

		// Check field name 'DonorNo' first before field var 'x_DonorNo'
		$val = $CurrentForm->hasValue("DonorNo") ? $CurrentForm->getValue("DonorNo") : $CurrentForm->getValue("x_DonorNo");
		if (!$this->DonorNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DonorNo->Visible = FALSE; // Disable update for API request
			else
				$this->DonorNo->setFormValue($val);
		}

		// Check field name 'BatchNo' first before field var 'x_BatchNo'
		$val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
		if (!$this->BatchNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->BatchNo->setFormValue($val);
		}

		// Check field name 'BloodGroup' first before field var 'x_BloodGroup'
		$val = $CurrentForm->hasValue("BloodGroup") ? $CurrentForm->getValue("BloodGroup") : $CurrentForm->getValue("x_BloodGroup");
		if (!$this->BloodGroup->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BloodGroup->Visible = FALSE; // Disable update for API request
			else
				$this->BloodGroup->setFormValue($val);
		}

		// Check field name 'Height' first before field var 'x_Height'
		$val = $CurrentForm->hasValue("Height") ? $CurrentForm->getValue("Height") : $CurrentForm->getValue("x_Height");
		if (!$this->Height->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Height->Visible = FALSE; // Disable update for API request
			else
				$this->Height->setFormValue($val);
		}

		// Check field name 'SkinColor' first before field var 'x_SkinColor'
		$val = $CurrentForm->hasValue("SkinColor") ? $CurrentForm->getValue("SkinColor") : $CurrentForm->getValue("x_SkinColor");
		if (!$this->SkinColor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SkinColor->Visible = FALSE; // Disable update for API request
			else
				$this->SkinColor->setFormValue($val);
		}

		// Check field name 'EyeColor' first before field var 'x_EyeColor'
		$val = $CurrentForm->hasValue("EyeColor") ? $CurrentForm->getValue("EyeColor") : $CurrentForm->getValue("x_EyeColor");
		if (!$this->EyeColor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EyeColor->Visible = FALSE; // Disable update for API request
			else
				$this->EyeColor->setFormValue($val);
		}

		// Check field name 'HairColor' first before field var 'x_HairColor'
		$val = $CurrentForm->hasValue("HairColor") ? $CurrentForm->getValue("HairColor") : $CurrentForm->getValue("x_HairColor");
		if (!$this->HairColor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HairColor->Visible = FALSE; // Disable update for API request
			else
				$this->HairColor->setFormValue($val);
		}

		// Check field name 'NoOfVials' first before field var 'x_NoOfVials'
		$val = $CurrentForm->hasValue("NoOfVials") ? $CurrentForm->getValue("NoOfVials") : $CurrentForm->getValue("x_NoOfVials");
		if (!$this->NoOfVials->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoOfVials->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfVials->setFormValue($val);
		}

		// Check field name 'Tank' first before field var 'x_Tank'
		$val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
		if (!$this->Tank->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Tank->Visible = FALSE; // Disable update for API request
			else
				$this->Tank->setFormValue($val);
		}

		// Check field name 'Canister' first before field var 'x_Canister'
		$val = $CurrentForm->hasValue("Canister") ? $CurrentForm->getValue("Canister") : $CurrentForm->getValue("x_Canister");
		if (!$this->Canister->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Canister->Visible = FALSE; // Disable update for API request
			else
				$this->Canister->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'patientid' first before field var 'x_patientid'
		$val = $CurrentForm->hasValue("patientid") ? $CurrentForm->getValue("patientid") : $CurrentForm->getValue("x_patientid");
		if (!$this->patientid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patientid->Visible = FALSE; // Disable update for API request
			else
				$this->patientid->setFormValue($val);
		}

		// Check field name 'coupleid' first before field var 'x_coupleid'
		$val = $CurrentForm->hasValue("coupleid") ? $CurrentForm->getValue("coupleid") : $CurrentForm->getValue("x_coupleid");
		if (!$this->coupleid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->coupleid->Visible = FALSE; // Disable update for API request
			else
				$this->coupleid->setFormValue($val);
		}

		// Check field name 'Usedstatus' first before field var 'x_Usedstatus'
		$val = $CurrentForm->hasValue("Usedstatus") ? $CurrentForm->getValue("Usedstatus") : $CurrentForm->getValue("x_Usedstatus");
		if (!$this->Usedstatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Usedstatus->Visible = FALSE; // Disable update for API request
			else
				$this->Usedstatus->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
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

		// Check field name 'Lagency' first before field var 'x_Lagency'
		$val = $CurrentForm->hasValue("Lagency") ? $CurrentForm->getValue("Lagency") : $CurrentForm->getValue("x_Lagency");
		if (!$this->Lagency->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Lagency->Visible = FALSE; // Disable update for API request
			else
				$this->Lagency->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->Agency->CurrentValue = $this->Agency->FormValue;
		$this->ReceivedOn->CurrentValue = $this->ReceivedOn->FormValue;
		$this->ReceivedOn->CurrentValue = UnFormatDateTime($this->ReceivedOn->CurrentValue, 0);
		$this->ReceivedBy->CurrentValue = $this->ReceivedBy->FormValue;
		$this->DonorNo->CurrentValue = $this->DonorNo->FormValue;
		$this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
		$this->BloodGroup->CurrentValue = $this->BloodGroup->FormValue;
		$this->Height->CurrentValue = $this->Height->FormValue;
		$this->SkinColor->CurrentValue = $this->SkinColor->FormValue;
		$this->EyeColor->CurrentValue = $this->EyeColor->FormValue;
		$this->HairColor->CurrentValue = $this->HairColor->FormValue;
		$this->NoOfVials->CurrentValue = $this->NoOfVials->FormValue;
		$this->Tank->CurrentValue = $this->Tank->FormValue;
		$this->Canister->CurrentValue = $this->Canister->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->patientid->CurrentValue = $this->patientid->FormValue;
		$this->coupleid->CurrentValue = $this->coupleid->FormValue;
		$this->Usedstatus->CurrentValue = $this->Usedstatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->Lagency->CurrentValue = $this->Lagency->FormValue;
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
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Agency->setDbValue($row['Agency']);
		$this->ReceivedOn->setDbValue($row['ReceivedOn']);
		$this->ReceivedBy->setDbValue($row['ReceivedBy']);
		$this->DonorNo->setDbValue($row['DonorNo']);
		$this->BatchNo->setDbValue($row['BatchNo']);
		$this->BloodGroup->setDbValue($row['BloodGroup']);
		$this->Height->setDbValue($row['Height']);
		$this->SkinColor->setDbValue($row['SkinColor']);
		$this->EyeColor->setDbValue($row['EyeColor']);
		$this->HairColor->setDbValue($row['HairColor']);
		$this->NoOfVials->setDbValue($row['NoOfVials']);
		$this->Tank->setDbValue($row['Tank']);
		$this->Canister->setDbValue($row['Canister']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->patientid->setDbValue($row['patientid']);
		$this->coupleid->setDbValue($row['coupleid']);
		$this->Usedstatus->setDbValue($row['Usedstatus']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->Lagency->setDbValue($row['Lagency']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['TidNo'] = NULL;
		$row['Agency'] = NULL;
		$row['ReceivedOn'] = NULL;
		$row['ReceivedBy'] = NULL;
		$row['DonorNo'] = NULL;
		$row['BatchNo'] = NULL;
		$row['BloodGroup'] = NULL;
		$row['Height'] = NULL;
		$row['SkinColor'] = NULL;
		$row['EyeColor'] = NULL;
		$row['HairColor'] = NULL;
		$row['NoOfVials'] = NULL;
		$row['Tank'] = NULL;
		$row['Canister'] = NULL;
		$row['Remarks'] = NULL;
		$row['patientid'] = NULL;
		$row['coupleid'] = NULL;
		$row['Usedstatus'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['Lagency'] = NULL;
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
		// RIDNo
		// TidNo
		// Agency
		// ReceivedOn
		// ReceivedBy
		// DonorNo
		// BatchNo
		// BloodGroup
		// Height
		// SkinColor
		// EyeColor
		// HairColor
		// NoOfVials
		// Tank
		// Canister
		// Remarks
		// patientid
		// coupleid
		// Usedstatus
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Lagency

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Agency
			$this->Agency->ViewValue = $this->Agency->CurrentValue;
			$this->Agency->ViewCustomAttributes = "";

			// ReceivedOn
			$this->ReceivedOn->ViewValue = $this->ReceivedOn->CurrentValue;
			$this->ReceivedOn->ViewValue = FormatDateTime($this->ReceivedOn->ViewValue, 0);
			$this->ReceivedOn->ViewCustomAttributes = "";

			// ReceivedBy
			$this->ReceivedBy->ViewValue = $this->ReceivedBy->CurrentValue;
			$this->ReceivedBy->ViewCustomAttributes = "";

			// DonorNo
			$this->DonorNo->ViewValue = $this->DonorNo->CurrentValue;
			$this->DonorNo->ViewCustomAttributes = "";

			// BatchNo
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";

			// BloodGroup
			$curVal = strval($this->BloodGroup->CurrentValue);
			if ($curVal != "") {
				$this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
				if ($this->BloodGroup->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->BloodGroup->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->BloodGroup->ViewValue = $this->BloodGroup->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BloodGroup->ViewValue = $this->BloodGroup->CurrentValue;
					}
				}
			} else {
				$this->BloodGroup->ViewValue = NULL;
			}
			$this->BloodGroup->ViewCustomAttributes = "";

			// Height
			$this->Height->ViewValue = $this->Height->CurrentValue;
			$this->Height->ViewCustomAttributes = "";

			// SkinColor
			if (strval($this->SkinColor->CurrentValue) != "") {
				$this->SkinColor->ViewValue = $this->SkinColor->optionCaption($this->SkinColor->CurrentValue);
			} else {
				$this->SkinColor->ViewValue = NULL;
			}
			$this->SkinColor->ViewCustomAttributes = "";

			// EyeColor
			if (strval($this->EyeColor->CurrentValue) != "") {
				$this->EyeColor->ViewValue = $this->EyeColor->optionCaption($this->EyeColor->CurrentValue);
			} else {
				$this->EyeColor->ViewValue = NULL;
			}
			$this->EyeColor->ViewCustomAttributes = "";

			// HairColor
			if (strval($this->HairColor->CurrentValue) != "") {
				$this->HairColor->ViewValue = $this->HairColor->optionCaption($this->HairColor->CurrentValue);
			} else {
				$this->HairColor->ViewValue = NULL;
			}
			$this->HairColor->ViewCustomAttributes = "";

			// NoOfVials
			$this->NoOfVials->ViewValue = $this->NoOfVials->CurrentValue;
			$this->NoOfVials->ViewCustomAttributes = "";

			// Tank
			$this->Tank->ViewValue = $this->Tank->CurrentValue;
			$this->Tank->ViewCustomAttributes = "";

			// Canister
			$this->Canister->ViewValue = $this->Canister->CurrentValue;
			$this->Canister->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// patientid
			$this->patientid->ViewValue = $this->patientid->CurrentValue;
			$this->patientid->ViewValue = FormatNumber($this->patientid->ViewValue, 0, -2, -2, -2);
			$this->patientid->ViewCustomAttributes = "";

			// coupleid
			$this->coupleid->ViewValue = $this->coupleid->CurrentValue;
			$this->coupleid->ViewValue = FormatNumber($this->coupleid->ViewValue, 0, -2, -2, -2);
			$this->coupleid->ViewCustomAttributes = "";

			// Usedstatus
			$this->Usedstatus->ViewValue = $this->Usedstatus->CurrentValue;
			$this->Usedstatus->ViewValue = FormatNumber($this->Usedstatus->ViewValue, 0, -2, -2, -2);
			$this->Usedstatus->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// Lagency
			$curVal = strval($this->Lagency->CurrentValue);
			if ($curVal != "") {
				$this->Lagency->ViewValue = $this->Lagency->lookupCacheOption($curVal);
				if ($this->Lagency->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Lagency->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Lagency->ViewValue = $this->Lagency->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Lagency->ViewValue = $this->Lagency->CurrentValue;
					}
				}
			} else {
				$this->Lagency->ViewValue = NULL;
			}
			$this->Lagency->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Agency
			$this->Agency->LinkCustomAttributes = "";
			$this->Agency->HrefValue = "";
			$this->Agency->TooltipValue = "";

			// ReceivedOn
			$this->ReceivedOn->LinkCustomAttributes = "";
			$this->ReceivedOn->HrefValue = "";
			$this->ReceivedOn->TooltipValue = "";

			// ReceivedBy
			$this->ReceivedBy->LinkCustomAttributes = "";
			$this->ReceivedBy->HrefValue = "";
			$this->ReceivedBy->TooltipValue = "";

			// DonorNo
			$this->DonorNo->LinkCustomAttributes = "";
			$this->DonorNo->HrefValue = "";
			$this->DonorNo->TooltipValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";
			$this->BatchNo->TooltipValue = "";

			// BloodGroup
			$this->BloodGroup->LinkCustomAttributes = "";
			$this->BloodGroup->HrefValue = "";
			$this->BloodGroup->TooltipValue = "";

			// Height
			$this->Height->LinkCustomAttributes = "";
			$this->Height->HrefValue = "";
			$this->Height->TooltipValue = "";

			// SkinColor
			$this->SkinColor->LinkCustomAttributes = "";
			$this->SkinColor->HrefValue = "";
			$this->SkinColor->TooltipValue = "";

			// EyeColor
			$this->EyeColor->LinkCustomAttributes = "";
			$this->EyeColor->HrefValue = "";
			$this->EyeColor->TooltipValue = "";

			// HairColor
			$this->HairColor->LinkCustomAttributes = "";
			$this->HairColor->HrefValue = "";
			$this->HairColor->TooltipValue = "";

			// NoOfVials
			$this->NoOfVials->LinkCustomAttributes = "";
			$this->NoOfVials->HrefValue = "";
			$this->NoOfVials->TooltipValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";
			$this->Tank->TooltipValue = "";

			// Canister
			$this->Canister->LinkCustomAttributes = "";
			$this->Canister->HrefValue = "";
			$this->Canister->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// patientid
			$this->patientid->LinkCustomAttributes = "";
			$this->patientid->HrefValue = "";
			$this->patientid->TooltipValue = "";

			// coupleid
			$this->coupleid->LinkCustomAttributes = "";
			$this->coupleid->HrefValue = "";
			$this->coupleid->TooltipValue = "";

			// Usedstatus
			$this->Usedstatus->LinkCustomAttributes = "";
			$this->Usedstatus->HrefValue = "";
			$this->Usedstatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// Lagency
			$this->Lagency->LinkCustomAttributes = "";
			$this->Lagency->HrefValue = "";
			$this->Lagency->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// Agency
			$this->Agency->EditAttrs["class"] = "form-control";
			$this->Agency->EditCustomAttributes = "";
			if (!$this->Agency->Raw)
				$this->Agency->CurrentValue = HtmlDecode($this->Agency->CurrentValue);
			$this->Agency->EditValue = HtmlEncode($this->Agency->CurrentValue);
			$this->Agency->PlaceHolder = RemoveHtml($this->Agency->caption());

			// ReceivedOn
			$this->ReceivedOn->EditAttrs["class"] = "form-control";
			$this->ReceivedOn->EditCustomAttributes = "";
			$this->ReceivedOn->EditValue = HtmlEncode(FormatDateTime($this->ReceivedOn->CurrentValue, 8));
			$this->ReceivedOn->PlaceHolder = RemoveHtml($this->ReceivedOn->caption());

			// ReceivedBy
			$this->ReceivedBy->EditAttrs["class"] = "form-control";
			$this->ReceivedBy->EditCustomAttributes = "";
			if (!$this->ReceivedBy->Raw)
				$this->ReceivedBy->CurrentValue = HtmlDecode($this->ReceivedBy->CurrentValue);
			$this->ReceivedBy->EditValue = HtmlEncode($this->ReceivedBy->CurrentValue);
			$this->ReceivedBy->PlaceHolder = RemoveHtml($this->ReceivedBy->caption());

			// DonorNo
			$this->DonorNo->EditAttrs["class"] = "form-control";
			$this->DonorNo->EditCustomAttributes = "";
			if (!$this->DonorNo->Raw)
				$this->DonorNo->CurrentValue = HtmlDecode($this->DonorNo->CurrentValue);
			$this->DonorNo->EditValue = HtmlEncode($this->DonorNo->CurrentValue);
			$this->DonorNo->PlaceHolder = RemoveHtml($this->DonorNo->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if (!$this->BatchNo->Raw)
				$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

			// BloodGroup
			$this->BloodGroup->EditAttrs["class"] = "form-control";
			$this->BloodGroup->EditCustomAttributes = "";
			$curVal = trim(strval($this->BloodGroup->CurrentValue));
			if ($curVal != "")
				$this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
			else
				$this->BloodGroup->ViewValue = $this->BloodGroup->Lookup !== NULL && is_array($this->BloodGroup->Lookup->Options) ? $curVal : NULL;
			if ($this->BloodGroup->ViewValue !== NULL) { // Load from cache
				$this->BloodGroup->EditValue = array_values($this->BloodGroup->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->BloodGroup->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->BloodGroup->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->BloodGroup->EditValue = $arwrk;
			}

			// Height
			$this->Height->EditAttrs["class"] = "form-control";
			$this->Height->EditCustomAttributes = "";
			if (!$this->Height->Raw)
				$this->Height->CurrentValue = HtmlDecode($this->Height->CurrentValue);
			$this->Height->EditValue = HtmlEncode($this->Height->CurrentValue);
			$this->Height->PlaceHolder = RemoveHtml($this->Height->caption());

			// SkinColor
			$this->SkinColor->EditAttrs["class"] = "form-control";
			$this->SkinColor->EditCustomAttributes = "";
			$this->SkinColor->EditValue = $this->SkinColor->options(TRUE);

			// EyeColor
			$this->EyeColor->EditAttrs["class"] = "form-control";
			$this->EyeColor->EditCustomAttributes = "";
			$this->EyeColor->EditValue = $this->EyeColor->options(TRUE);

			// HairColor
			$this->HairColor->EditAttrs["class"] = "form-control";
			$this->HairColor->EditCustomAttributes = "";
			$this->HairColor->EditValue = $this->HairColor->options(TRUE);

			// NoOfVials
			$this->NoOfVials->EditAttrs["class"] = "form-control";
			$this->NoOfVials->EditCustomAttributes = "";
			if (!$this->NoOfVials->Raw)
				$this->NoOfVials->CurrentValue = HtmlDecode($this->NoOfVials->CurrentValue);
			$this->NoOfVials->EditValue = HtmlEncode($this->NoOfVials->CurrentValue);
			$this->NoOfVials->PlaceHolder = RemoveHtml($this->NoOfVials->caption());

			// Tank
			$this->Tank->EditAttrs["class"] = "form-control";
			$this->Tank->EditCustomAttributes = "";
			if (!$this->Tank->Raw)
				$this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
			$this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
			$this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

			// Canister
			$this->Canister->EditAttrs["class"] = "form-control";
			$this->Canister->EditCustomAttributes = "";
			if (!$this->Canister->Raw)
				$this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
			$this->Canister->EditValue = HtmlEncode($this->Canister->CurrentValue);
			$this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			if (!$this->Remarks->Raw)
				$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// patientid
			$this->patientid->EditAttrs["class"] = "form-control";
			$this->patientid->EditCustomAttributes = "";
			$this->patientid->EditValue = HtmlEncode($this->patientid->CurrentValue);
			$this->patientid->PlaceHolder = RemoveHtml($this->patientid->caption());

			// coupleid
			$this->coupleid->EditAttrs["class"] = "form-control";
			$this->coupleid->EditCustomAttributes = "";
			$this->coupleid->EditValue = HtmlEncode($this->coupleid->CurrentValue);
			$this->coupleid->PlaceHolder = RemoveHtml($this->coupleid->caption());

			// Usedstatus
			$this->Usedstatus->EditAttrs["class"] = "form-control";
			$this->Usedstatus->EditCustomAttributes = "";
			$this->Usedstatus->EditValue = HtmlEncode($this->Usedstatus->CurrentValue);
			$this->Usedstatus->PlaceHolder = RemoveHtml($this->Usedstatus->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// modifiedby
			// modifieddatetime
			// Lagency

			$this->Lagency->EditAttrs["class"] = "form-control";
			$this->Lagency->EditCustomAttributes = "";
			$curVal = trim(strval($this->Lagency->CurrentValue));
			if ($curVal != "")
				$this->Lagency->ViewValue = $this->Lagency->lookupCacheOption($curVal);
			else
				$this->Lagency->ViewValue = $this->Lagency->Lookup !== NULL && is_array($this->Lagency->Lookup->Options) ? $curVal : NULL;
			if ($this->Lagency->ViewValue !== NULL) { // Load from cache
				$this->Lagency->EditValue = array_values($this->Lagency->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->Lagency->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Lagency->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Lagency->EditValue = $arwrk;
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// Agency
			$this->Agency->LinkCustomAttributes = "";
			$this->Agency->HrefValue = "";

			// ReceivedOn
			$this->ReceivedOn->LinkCustomAttributes = "";
			$this->ReceivedOn->HrefValue = "";

			// ReceivedBy
			$this->ReceivedBy->LinkCustomAttributes = "";
			$this->ReceivedBy->HrefValue = "";

			// DonorNo
			$this->DonorNo->LinkCustomAttributes = "";
			$this->DonorNo->HrefValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";

			// BloodGroup
			$this->BloodGroup->LinkCustomAttributes = "";
			$this->BloodGroup->HrefValue = "";

			// Height
			$this->Height->LinkCustomAttributes = "";
			$this->Height->HrefValue = "";

			// SkinColor
			$this->SkinColor->LinkCustomAttributes = "";
			$this->SkinColor->HrefValue = "";

			// EyeColor
			$this->EyeColor->LinkCustomAttributes = "";
			$this->EyeColor->HrefValue = "";

			// HairColor
			$this->HairColor->LinkCustomAttributes = "";
			$this->HairColor->HrefValue = "";

			// NoOfVials
			$this->NoOfVials->LinkCustomAttributes = "";
			$this->NoOfVials->HrefValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";

			// Canister
			$this->Canister->LinkCustomAttributes = "";
			$this->Canister->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// patientid
			$this->patientid->LinkCustomAttributes = "";
			$this->patientid->HrefValue = "";

			// coupleid
			$this->coupleid->LinkCustomAttributes = "";
			$this->coupleid->HrefValue = "";

			// Usedstatus
			$this->Usedstatus->LinkCustomAttributes = "";
			$this->Usedstatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// Lagency
			$this->Lagency->LinkCustomAttributes = "";
			$this->Lagency->HrefValue = "";
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
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNo->FormValue)) {
			AddMessage($FormError, $this->RIDNo->errorMessage());
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}
		if ($this->Agency->Required) {
			if (!$this->Agency->IsDetailKey && $this->Agency->FormValue != NULL && $this->Agency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Agency->caption(), $this->Agency->RequiredErrorMessage));
			}
		}
		if ($this->ReceivedOn->Required) {
			if (!$this->ReceivedOn->IsDetailKey && $this->ReceivedOn->FormValue != NULL && $this->ReceivedOn->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedOn->caption(), $this->ReceivedOn->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReceivedOn->FormValue)) {
			AddMessage($FormError, $this->ReceivedOn->errorMessage());
		}
		if ($this->ReceivedBy->Required) {
			if (!$this->ReceivedBy->IsDetailKey && $this->ReceivedBy->FormValue != NULL && $this->ReceivedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedBy->caption(), $this->ReceivedBy->RequiredErrorMessage));
			}
		}
		if ($this->DonorNo->Required) {
			if (!$this->DonorNo->IsDetailKey && $this->DonorNo->FormValue != NULL && $this->DonorNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DonorNo->caption(), $this->DonorNo->RequiredErrorMessage));
			}
		}
		if ($this->BatchNo->Required) {
			if (!$this->BatchNo->IsDetailKey && $this->BatchNo->FormValue != NULL && $this->BatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
			}
		}
		if ($this->BloodGroup->Required) {
			if (!$this->BloodGroup->IsDetailKey && $this->BloodGroup->FormValue != NULL && $this->BloodGroup->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BloodGroup->caption(), $this->BloodGroup->RequiredErrorMessage));
			}
		}
		if ($this->Height->Required) {
			if (!$this->Height->IsDetailKey && $this->Height->FormValue != NULL && $this->Height->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Height->caption(), $this->Height->RequiredErrorMessage));
			}
		}
		if ($this->SkinColor->Required) {
			if (!$this->SkinColor->IsDetailKey && $this->SkinColor->FormValue != NULL && $this->SkinColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SkinColor->caption(), $this->SkinColor->RequiredErrorMessage));
			}
		}
		if ($this->EyeColor->Required) {
			if (!$this->EyeColor->IsDetailKey && $this->EyeColor->FormValue != NULL && $this->EyeColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EyeColor->caption(), $this->EyeColor->RequiredErrorMessage));
			}
		}
		if ($this->HairColor->Required) {
			if (!$this->HairColor->IsDetailKey && $this->HairColor->FormValue != NULL && $this->HairColor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HairColor->caption(), $this->HairColor->RequiredErrorMessage));
			}
		}
		if ($this->NoOfVials->Required) {
			if (!$this->NoOfVials->IsDetailKey && $this->NoOfVials->FormValue != NULL && $this->NoOfVials->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfVials->caption(), $this->NoOfVials->RequiredErrorMessage));
			}
		}
		if ($this->Tank->Required) {
			if (!$this->Tank->IsDetailKey && $this->Tank->FormValue != NULL && $this->Tank->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
			}
		}
		if ($this->Canister->Required) {
			if (!$this->Canister->IsDetailKey && $this->Canister->FormValue != NULL && $this->Canister->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Canister->caption(), $this->Canister->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->patientid->Required) {
			if (!$this->patientid->IsDetailKey && $this->patientid->FormValue != NULL && $this->patientid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientid->caption(), $this->patientid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patientid->FormValue)) {
			AddMessage($FormError, $this->patientid->errorMessage());
		}
		if ($this->coupleid->Required) {
			if (!$this->coupleid->IsDetailKey && $this->coupleid->FormValue != NULL && $this->coupleid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->coupleid->caption(), $this->coupleid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->coupleid->FormValue)) {
			AddMessage($FormError, $this->coupleid->errorMessage());
		}
		if ($this->Usedstatus->Required) {
			if (!$this->Usedstatus->IsDetailKey && $this->Usedstatus->FormValue != NULL && $this->Usedstatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Usedstatus->caption(), $this->Usedstatus->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Usedstatus->FormValue)) {
			AddMessage($FormError, $this->Usedstatus->errorMessage());
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
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
		if ($this->Lagency->Required) {
			if (!$this->Lagency->IsDetailKey && $this->Lagency->FormValue != NULL && $this->Lagency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Lagency->caption(), $this->Lagency->RequiredErrorMessage));
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

			// RIDNo
			$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, NULL, $this->RIDNo->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// Agency
			$this->Agency->setDbValueDef($rsnew, $this->Agency->CurrentValue, NULL, $this->Agency->ReadOnly);

			// ReceivedOn
			$this->ReceivedOn->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedOn->CurrentValue, 0), NULL, $this->ReceivedOn->ReadOnly);

			// ReceivedBy
			$this->ReceivedBy->setDbValueDef($rsnew, $this->ReceivedBy->CurrentValue, NULL, $this->ReceivedBy->ReadOnly);

			// DonorNo
			$this->DonorNo->setDbValueDef($rsnew, $this->DonorNo->CurrentValue, NULL, $this->DonorNo->ReadOnly);

			// BatchNo
			$this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, NULL, $this->BatchNo->ReadOnly);

			// BloodGroup
			$this->BloodGroup->setDbValueDef($rsnew, $this->BloodGroup->CurrentValue, NULL, $this->BloodGroup->ReadOnly);

			// Height
			$this->Height->setDbValueDef($rsnew, $this->Height->CurrentValue, NULL, $this->Height->ReadOnly);

			// SkinColor
			$this->SkinColor->setDbValueDef($rsnew, $this->SkinColor->CurrentValue, NULL, $this->SkinColor->ReadOnly);

			// EyeColor
			$this->EyeColor->setDbValueDef($rsnew, $this->EyeColor->CurrentValue, NULL, $this->EyeColor->ReadOnly);

			// HairColor
			$this->HairColor->setDbValueDef($rsnew, $this->HairColor->CurrentValue, NULL, $this->HairColor->ReadOnly);

			// NoOfVials
			$this->NoOfVials->setDbValueDef($rsnew, $this->NoOfVials->CurrentValue, NULL, $this->NoOfVials->ReadOnly);

			// Tank
			$this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, NULL, $this->Tank->ReadOnly);

			// Canister
			$this->Canister->setDbValueDef($rsnew, $this->Canister->CurrentValue, NULL, $this->Canister->ReadOnly);

			// Remarks
			$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, $this->Remarks->ReadOnly);

			// patientid
			$this->patientid->setDbValueDef($rsnew, $this->patientid->CurrentValue, NULL, $this->patientid->ReadOnly);

			// coupleid
			$this->coupleid->setDbValueDef($rsnew, $this->coupleid->CurrentValue, NULL, $this->coupleid->ReadOnly);

			// Usedstatus
			$this->Usedstatus->setDbValueDef($rsnew, $this->Usedstatus->CurrentValue, NULL, $this->Usedstatus->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// modifiedby
			$this->modifiedby->CurrentValue = CurrentUserName();
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

			// modifieddatetime
			$this->modifieddatetime->CurrentValue = CurrentDateTime();
			$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

			// Lagency
			$this->Lagency->setDbValueDef($rsnew, $this->Lagency->CurrentValue, "", $this->Lagency->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_donorsemendetailslist.php"), "", $this->TableVar, TRUE);
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
				case "x_BloodGroup":
					break;
				case "x_SkinColor":
					break;
				case "x_EyeColor":
					break;
				case "x_HairColor":
					break;
				case "x_Lagency":
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
						case "x_BloodGroup":
							break;
						case "x_Lagency":
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
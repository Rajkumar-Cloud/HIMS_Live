<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_insurance_edit extends patient_insurance
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_insurance';

	// Page object name
	public $PageObjName = "patient_insurance_edit";

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

		// Table object (patient_insurance)
		if (!isset($GLOBALS["patient_insurance"]) || get_class($GLOBALS["patient_insurance"]) == PROJECT_NAMESPACE . "patient_insurance") {
			$GLOBALS["patient_insurance"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_insurance"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_insurance');

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
		global $patient_insurance;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_insurance);
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
					if ($pageName == "patient_insuranceview.php")
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
					$this->terminate(GetUrl("patient_insurancelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Company->setVisibility();
		$this->AddressInsuranceCarierName->setVisibility();
		$this->ContactName->setVisibility();
		$this->ContactMobile->setVisibility();
		$this->PolicyType->setVisibility();
		$this->PolicyName->setVisibility();
		$this->PolicyNo->setVisibility();
		$this->PolicyAmount->setVisibility();
		$this->RefLetterNo->setVisibility();
		$this->ReferenceBy->setVisibility();
		$this->ReferenceDate->setVisibility();
		$this->DocumentAttatch->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->mrnno->setVisibility();
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
			$this->terminate("patient_insurancelist.php");
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

			// Set up master detail parameters
			$this->setupMasterParms();

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
					$this->terminate("patient_insurancelist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patient_insurancelist.php")
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
		$this->DocumentAttatch->Upload->Index = $CurrentForm->Index;
		$this->DocumentAttatch->Upload->uploadFile();
		$this->DocumentAttatch->CurrentValue = $this->DocumentAttatch->Upload->FileName;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
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

		// Check field name 'Company' first before field var 'x_Company'
		$val = $CurrentForm->hasValue("Company") ? $CurrentForm->getValue("Company") : $CurrentForm->getValue("x_Company");
		if (!$this->Company->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Company->Visible = FALSE; // Disable update for API request
			else
				$this->Company->setFormValue($val);
		}

		// Check field name 'AddressInsuranceCarierName' first before field var 'x_AddressInsuranceCarierName'
		$val = $CurrentForm->hasValue("AddressInsuranceCarierName") ? $CurrentForm->getValue("AddressInsuranceCarierName") : $CurrentForm->getValue("x_AddressInsuranceCarierName");
		if (!$this->AddressInsuranceCarierName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AddressInsuranceCarierName->Visible = FALSE; // Disable update for API request
			else
				$this->AddressInsuranceCarierName->setFormValue($val);
		}

		// Check field name 'ContactName' first before field var 'x_ContactName'
		$val = $CurrentForm->hasValue("ContactName") ? $CurrentForm->getValue("ContactName") : $CurrentForm->getValue("x_ContactName");
		if (!$this->ContactName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ContactName->Visible = FALSE; // Disable update for API request
			else
				$this->ContactName->setFormValue($val);
		}

		// Check field name 'ContactMobile' first before field var 'x_ContactMobile'
		$val = $CurrentForm->hasValue("ContactMobile") ? $CurrentForm->getValue("ContactMobile") : $CurrentForm->getValue("x_ContactMobile");
		if (!$this->ContactMobile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ContactMobile->Visible = FALSE; // Disable update for API request
			else
				$this->ContactMobile->setFormValue($val);
		}

		// Check field name 'PolicyType' first before field var 'x_PolicyType'
		$val = $CurrentForm->hasValue("PolicyType") ? $CurrentForm->getValue("PolicyType") : $CurrentForm->getValue("x_PolicyType");
		if (!$this->PolicyType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PolicyType->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyType->setFormValue($val);
		}

		// Check field name 'PolicyName' first before field var 'x_PolicyName'
		$val = $CurrentForm->hasValue("PolicyName") ? $CurrentForm->getValue("PolicyName") : $CurrentForm->getValue("x_PolicyName");
		if (!$this->PolicyName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PolicyName->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyName->setFormValue($val);
		}

		// Check field name 'PolicyNo' first before field var 'x_PolicyNo'
		$val = $CurrentForm->hasValue("PolicyNo") ? $CurrentForm->getValue("PolicyNo") : $CurrentForm->getValue("x_PolicyNo");
		if (!$this->PolicyNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PolicyNo->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyNo->setFormValue($val);
		}

		// Check field name 'PolicyAmount' first before field var 'x_PolicyAmount'
		$val = $CurrentForm->hasValue("PolicyAmount") ? $CurrentForm->getValue("PolicyAmount") : $CurrentForm->getValue("x_PolicyAmount");
		if (!$this->PolicyAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PolicyAmount->Visible = FALSE; // Disable update for API request
			else
				$this->PolicyAmount->setFormValue($val);
		}

		// Check field name 'RefLetterNo' first before field var 'x_RefLetterNo'
		$val = $CurrentForm->hasValue("RefLetterNo") ? $CurrentForm->getValue("RefLetterNo") : $CurrentForm->getValue("x_RefLetterNo");
		if (!$this->RefLetterNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RefLetterNo->Visible = FALSE; // Disable update for API request
			else
				$this->RefLetterNo->setFormValue($val);
		}

		// Check field name 'ReferenceBy' first before field var 'x_ReferenceBy'
		$val = $CurrentForm->hasValue("ReferenceBy") ? $CurrentForm->getValue("ReferenceBy") : $CurrentForm->getValue("x_ReferenceBy");
		if (!$this->ReferenceBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferenceBy->Visible = FALSE; // Disable update for API request
			else
				$this->ReferenceBy->setFormValue($val);
		}

		// Check field name 'ReferenceDate' first before field var 'x_ReferenceDate'
		$val = $CurrentForm->hasValue("ReferenceDate") ? $CurrentForm->getValue("ReferenceDate") : $CurrentForm->getValue("x_ReferenceDate");
		if (!$this->ReferenceDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferenceDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReferenceDate->setFormValue($val);
			$this->ReferenceDate->CurrentValue = UnFormatDateTime($this->ReferenceDate->CurrentValue, 0);
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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Company->CurrentValue = $this->Company->FormValue;
		$this->AddressInsuranceCarierName->CurrentValue = $this->AddressInsuranceCarierName->FormValue;
		$this->ContactName->CurrentValue = $this->ContactName->FormValue;
		$this->ContactMobile->CurrentValue = $this->ContactMobile->FormValue;
		$this->PolicyType->CurrentValue = $this->PolicyType->FormValue;
		$this->PolicyName->CurrentValue = $this->PolicyName->FormValue;
		$this->PolicyNo->CurrentValue = $this->PolicyNo->FormValue;
		$this->PolicyAmount->CurrentValue = $this->PolicyAmount->FormValue;
		$this->RefLetterNo->CurrentValue = $this->RefLetterNo->FormValue;
		$this->ReferenceBy->CurrentValue = $this->ReferenceBy->FormValue;
		$this->ReferenceDate->CurrentValue = $this->ReferenceDate->FormValue;
		$this->ReferenceDate->CurrentValue = UnFormatDateTime($this->ReferenceDate->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
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
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Company->setDbValue($row['Company']);
		$this->AddressInsuranceCarierName->setDbValue($row['AddressInsuranceCarierName']);
		$this->ContactName->setDbValue($row['ContactName']);
		$this->ContactMobile->setDbValue($row['ContactMobile']);
		$this->PolicyType->setDbValue($row['PolicyType']);
		$this->PolicyName->setDbValue($row['PolicyName']);
		$this->PolicyNo->setDbValue($row['PolicyNo']);
		$this->PolicyAmount->setDbValue($row['PolicyAmount']);
		$this->RefLetterNo->setDbValue($row['RefLetterNo']);
		$this->ReferenceBy->setDbValue($row['ReferenceBy']);
		$this->ReferenceDate->setDbValue($row['ReferenceDate']);
		$this->DocumentAttatch->Upload->DbValue = $row['DocumentAttatch'];
		$this->DocumentAttatch->setDbValue($this->DocumentAttatch->Upload->DbValue);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->mrnno->setDbValue($row['mrnno']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['Company'] = NULL;
		$row['AddressInsuranceCarierName'] = NULL;
		$row['ContactName'] = NULL;
		$row['ContactMobile'] = NULL;
		$row['PolicyType'] = NULL;
		$row['PolicyName'] = NULL;
		$row['PolicyNo'] = NULL;
		$row['PolicyAmount'] = NULL;
		$row['RefLetterNo'] = NULL;
		$row['ReferenceBy'] = NULL;
		$row['ReferenceDate'] = NULL;
		$row['DocumentAttatch'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['mrnno'] = NULL;
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
		// Reception
		// PatientId
		// PatientName
		// Company
		// AddressInsuranceCarierName
		// ContactName
		// ContactMobile
		// PolicyType
		// PolicyName
		// PolicyNo
		// PolicyAmount
		// RefLetterNo
		// ReferenceBy
		// ReferenceDate
		// DocumentAttatch
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Company
			$this->Company->ViewValue = $this->Company->CurrentValue;
			$this->Company->ViewCustomAttributes = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->ViewValue = $this->AddressInsuranceCarierName->CurrentValue;
			$this->AddressInsuranceCarierName->ViewCustomAttributes = "";

			// ContactName
			$this->ContactName->ViewValue = $this->ContactName->CurrentValue;
			$this->ContactName->ViewCustomAttributes = "";

			// ContactMobile
			$this->ContactMobile->ViewValue = $this->ContactMobile->CurrentValue;
			$this->ContactMobile->ViewCustomAttributes = "";

			// PolicyType
			$this->PolicyType->ViewValue = $this->PolicyType->CurrentValue;
			$this->PolicyType->ViewCustomAttributes = "";

			// PolicyName
			$this->PolicyName->ViewValue = $this->PolicyName->CurrentValue;
			$this->PolicyName->ViewCustomAttributes = "";

			// PolicyNo
			$this->PolicyNo->ViewValue = $this->PolicyNo->CurrentValue;
			$this->PolicyNo->ViewCustomAttributes = "";

			// PolicyAmount
			$this->PolicyAmount->ViewValue = $this->PolicyAmount->CurrentValue;
			$this->PolicyAmount->ViewCustomAttributes = "";

			// RefLetterNo
			$this->RefLetterNo->ViewValue = $this->RefLetterNo->CurrentValue;
			$this->RefLetterNo->ViewCustomAttributes = "";

			// ReferenceBy
			$this->ReferenceBy->ViewValue = $this->ReferenceBy->CurrentValue;
			$this->ReferenceBy->ViewCustomAttributes = "";

			// ReferenceDate
			$this->ReferenceDate->ViewValue = $this->ReferenceDate->CurrentValue;
			$this->ReferenceDate->ViewValue = FormatDateTime($this->ReferenceDate->ViewValue, 0);
			$this->ReferenceDate->ViewCustomAttributes = "";

			// DocumentAttatch
			if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
				$this->DocumentAttatch->ViewValue = $this->DocumentAttatch->Upload->DbValue;
			} else {
				$this->DocumentAttatch->ViewValue = "";
			}
			$this->DocumentAttatch->ViewCustomAttributes = "";

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

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Company
			$this->Company->LinkCustomAttributes = "";
			$this->Company->HrefValue = "";
			$this->Company->TooltipValue = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->LinkCustomAttributes = "";
			$this->AddressInsuranceCarierName->HrefValue = "";
			$this->AddressInsuranceCarierName->TooltipValue = "";

			// ContactName
			$this->ContactName->LinkCustomAttributes = "";
			$this->ContactName->HrefValue = "";
			$this->ContactName->TooltipValue = "";

			// ContactMobile
			$this->ContactMobile->LinkCustomAttributes = "";
			$this->ContactMobile->HrefValue = "";
			$this->ContactMobile->TooltipValue = "";

			// PolicyType
			$this->PolicyType->LinkCustomAttributes = "";
			$this->PolicyType->HrefValue = "";
			$this->PolicyType->TooltipValue = "";

			// PolicyName
			$this->PolicyName->LinkCustomAttributes = "";
			$this->PolicyName->HrefValue = "";
			$this->PolicyName->TooltipValue = "";

			// PolicyNo
			$this->PolicyNo->LinkCustomAttributes = "";
			$this->PolicyNo->HrefValue = "";
			$this->PolicyNo->TooltipValue = "";

			// PolicyAmount
			$this->PolicyAmount->LinkCustomAttributes = "";
			$this->PolicyAmount->HrefValue = "";
			$this->PolicyAmount->TooltipValue = "";

			// RefLetterNo
			$this->RefLetterNo->LinkCustomAttributes = "";
			$this->RefLetterNo->HrefValue = "";
			$this->RefLetterNo->TooltipValue = "";

			// ReferenceBy
			$this->ReferenceBy->LinkCustomAttributes = "";
			$this->ReferenceBy->HrefValue = "";
			$this->ReferenceBy->TooltipValue = "";

			// ReferenceDate
			$this->ReferenceDate->LinkCustomAttributes = "";
			$this->ReferenceDate->HrefValue = "";
			$this->ReferenceDate->TooltipValue = "";

			// DocumentAttatch
			$this->DocumentAttatch->LinkCustomAttributes = "";
			$this->DocumentAttatch->HrefValue = "";
			$this->DocumentAttatch->ExportHrefValue = $this->DocumentAttatch->UploadPath . $this->DocumentAttatch->Upload->DbValue;
			$this->DocumentAttatch->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Company
			$this->Company->EditAttrs["class"] = "form-control";
			$this->Company->EditCustomAttributes = "";
			if (!$this->Company->Raw)
				$this->Company->CurrentValue = HtmlDecode($this->Company->CurrentValue);
			$this->Company->EditValue = HtmlEncode($this->Company->CurrentValue);
			$this->Company->PlaceHolder = RemoveHtml($this->Company->caption());

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->EditAttrs["class"] = "form-control";
			$this->AddressInsuranceCarierName->EditCustomAttributes = "";
			if (!$this->AddressInsuranceCarierName->Raw)
				$this->AddressInsuranceCarierName->CurrentValue = HtmlDecode($this->AddressInsuranceCarierName->CurrentValue);
			$this->AddressInsuranceCarierName->EditValue = HtmlEncode($this->AddressInsuranceCarierName->CurrentValue);
			$this->AddressInsuranceCarierName->PlaceHolder = RemoveHtml($this->AddressInsuranceCarierName->caption());

			// ContactName
			$this->ContactName->EditAttrs["class"] = "form-control";
			$this->ContactName->EditCustomAttributes = "";
			if (!$this->ContactName->Raw)
				$this->ContactName->CurrentValue = HtmlDecode($this->ContactName->CurrentValue);
			$this->ContactName->EditValue = HtmlEncode($this->ContactName->CurrentValue);
			$this->ContactName->PlaceHolder = RemoveHtml($this->ContactName->caption());

			// ContactMobile
			$this->ContactMobile->EditAttrs["class"] = "form-control";
			$this->ContactMobile->EditCustomAttributes = "";
			if (!$this->ContactMobile->Raw)
				$this->ContactMobile->CurrentValue = HtmlDecode($this->ContactMobile->CurrentValue);
			$this->ContactMobile->EditValue = HtmlEncode($this->ContactMobile->CurrentValue);
			$this->ContactMobile->PlaceHolder = RemoveHtml($this->ContactMobile->caption());

			// PolicyType
			$this->PolicyType->EditAttrs["class"] = "form-control";
			$this->PolicyType->EditCustomAttributes = "";
			if (!$this->PolicyType->Raw)
				$this->PolicyType->CurrentValue = HtmlDecode($this->PolicyType->CurrentValue);
			$this->PolicyType->EditValue = HtmlEncode($this->PolicyType->CurrentValue);
			$this->PolicyType->PlaceHolder = RemoveHtml($this->PolicyType->caption());

			// PolicyName
			$this->PolicyName->EditAttrs["class"] = "form-control";
			$this->PolicyName->EditCustomAttributes = "";
			if (!$this->PolicyName->Raw)
				$this->PolicyName->CurrentValue = HtmlDecode($this->PolicyName->CurrentValue);
			$this->PolicyName->EditValue = HtmlEncode($this->PolicyName->CurrentValue);
			$this->PolicyName->PlaceHolder = RemoveHtml($this->PolicyName->caption());

			// PolicyNo
			$this->PolicyNo->EditAttrs["class"] = "form-control";
			$this->PolicyNo->EditCustomAttributes = "";
			if (!$this->PolicyNo->Raw)
				$this->PolicyNo->CurrentValue = HtmlDecode($this->PolicyNo->CurrentValue);
			$this->PolicyNo->EditValue = HtmlEncode($this->PolicyNo->CurrentValue);
			$this->PolicyNo->PlaceHolder = RemoveHtml($this->PolicyNo->caption());

			// PolicyAmount
			$this->PolicyAmount->EditAttrs["class"] = "form-control";
			$this->PolicyAmount->EditCustomAttributes = "";
			if (!$this->PolicyAmount->Raw)
				$this->PolicyAmount->CurrentValue = HtmlDecode($this->PolicyAmount->CurrentValue);
			$this->PolicyAmount->EditValue = HtmlEncode($this->PolicyAmount->CurrentValue);
			$this->PolicyAmount->PlaceHolder = RemoveHtml($this->PolicyAmount->caption());

			// RefLetterNo
			$this->RefLetterNo->EditAttrs["class"] = "form-control";
			$this->RefLetterNo->EditCustomAttributes = "";
			if (!$this->RefLetterNo->Raw)
				$this->RefLetterNo->CurrentValue = HtmlDecode($this->RefLetterNo->CurrentValue);
			$this->RefLetterNo->EditValue = HtmlEncode($this->RefLetterNo->CurrentValue);
			$this->RefLetterNo->PlaceHolder = RemoveHtml($this->RefLetterNo->caption());

			// ReferenceBy
			$this->ReferenceBy->EditAttrs["class"] = "form-control";
			$this->ReferenceBy->EditCustomAttributes = "";
			if (!$this->ReferenceBy->Raw)
				$this->ReferenceBy->CurrentValue = HtmlDecode($this->ReferenceBy->CurrentValue);
			$this->ReferenceBy->EditValue = HtmlEncode($this->ReferenceBy->CurrentValue);
			$this->ReferenceBy->PlaceHolder = RemoveHtml($this->ReferenceBy->caption());

			// ReferenceDate
			$this->ReferenceDate->EditAttrs["class"] = "form-control";
			$this->ReferenceDate->EditCustomAttributes = "";
			$this->ReferenceDate->EditValue = HtmlEncode(FormatDateTime($this->ReferenceDate->CurrentValue, 8));
			$this->ReferenceDate->PlaceHolder = RemoveHtml($this->ReferenceDate->caption());

			// DocumentAttatch
			$this->DocumentAttatch->EditAttrs["class"] = "form-control";
			$this->DocumentAttatch->EditCustomAttributes = "";
			if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
				$this->DocumentAttatch->EditValue = $this->DocumentAttatch->Upload->DbValue;
			} else {
				$this->DocumentAttatch->EditValue = "";
			}
			if (!EmptyValue($this->DocumentAttatch->CurrentValue))
					$this->DocumentAttatch->Upload->FileName = $this->DocumentAttatch->CurrentValue;
			if ($this->isShow())
				RenderUploadField($this->DocumentAttatch);

			// modifiedby
			// modifieddatetime
			// mrnno

			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() != "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
				$this->mrnno->ViewCustomAttributes = "";
			} else {
				if (!$this->mrnno->Raw)
					$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
				$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
				$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Company
			$this->Company->LinkCustomAttributes = "";
			$this->Company->HrefValue = "";

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->LinkCustomAttributes = "";
			$this->AddressInsuranceCarierName->HrefValue = "";

			// ContactName
			$this->ContactName->LinkCustomAttributes = "";
			$this->ContactName->HrefValue = "";

			// ContactMobile
			$this->ContactMobile->LinkCustomAttributes = "";
			$this->ContactMobile->HrefValue = "";

			// PolicyType
			$this->PolicyType->LinkCustomAttributes = "";
			$this->PolicyType->HrefValue = "";

			// PolicyName
			$this->PolicyName->LinkCustomAttributes = "";
			$this->PolicyName->HrefValue = "";

			// PolicyNo
			$this->PolicyNo->LinkCustomAttributes = "";
			$this->PolicyNo->HrefValue = "";

			// PolicyAmount
			$this->PolicyAmount->LinkCustomAttributes = "";
			$this->PolicyAmount->HrefValue = "";

			// RefLetterNo
			$this->RefLetterNo->LinkCustomAttributes = "";
			$this->RefLetterNo->HrefValue = "";

			// ReferenceBy
			$this->ReferenceBy->LinkCustomAttributes = "";
			$this->ReferenceBy->HrefValue = "";

			// ReferenceDate
			$this->ReferenceDate->LinkCustomAttributes = "";
			$this->ReferenceDate->HrefValue = "";

			// DocumentAttatch
			$this->DocumentAttatch->LinkCustomAttributes = "";
			$this->DocumentAttatch->HrefValue = "";
			$this->DocumentAttatch->ExportHrefValue = $this->DocumentAttatch->UploadPath . $this->DocumentAttatch->Upload->DbValue;

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
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
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
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
		if ($this->Company->Required) {
			if (!$this->Company->IsDetailKey && $this->Company->FormValue != NULL && $this->Company->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Company->caption(), $this->Company->RequiredErrorMessage));
			}
		}
		if ($this->AddressInsuranceCarierName->Required) {
			if (!$this->AddressInsuranceCarierName->IsDetailKey && $this->AddressInsuranceCarierName->FormValue != NULL && $this->AddressInsuranceCarierName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AddressInsuranceCarierName->caption(), $this->AddressInsuranceCarierName->RequiredErrorMessage));
			}
		}
		if ($this->ContactName->Required) {
			if (!$this->ContactName->IsDetailKey && $this->ContactName->FormValue != NULL && $this->ContactName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ContactName->caption(), $this->ContactName->RequiredErrorMessage));
			}
		}
		if ($this->ContactMobile->Required) {
			if (!$this->ContactMobile->IsDetailKey && $this->ContactMobile->FormValue != NULL && $this->ContactMobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ContactMobile->caption(), $this->ContactMobile->RequiredErrorMessage));
			}
		}
		if ($this->PolicyType->Required) {
			if (!$this->PolicyType->IsDetailKey && $this->PolicyType->FormValue != NULL && $this->PolicyType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyType->caption(), $this->PolicyType->RequiredErrorMessage));
			}
		}
		if ($this->PolicyName->Required) {
			if (!$this->PolicyName->IsDetailKey && $this->PolicyName->FormValue != NULL && $this->PolicyName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyName->caption(), $this->PolicyName->RequiredErrorMessage));
			}
		}
		if ($this->PolicyNo->Required) {
			if (!$this->PolicyNo->IsDetailKey && $this->PolicyNo->FormValue != NULL && $this->PolicyNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyNo->caption(), $this->PolicyNo->RequiredErrorMessage));
			}
		}
		if ($this->PolicyAmount->Required) {
			if (!$this->PolicyAmount->IsDetailKey && $this->PolicyAmount->FormValue != NULL && $this->PolicyAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PolicyAmount->caption(), $this->PolicyAmount->RequiredErrorMessage));
			}
		}
		if ($this->RefLetterNo->Required) {
			if (!$this->RefLetterNo->IsDetailKey && $this->RefLetterNo->FormValue != NULL && $this->RefLetterNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefLetterNo->caption(), $this->RefLetterNo->RequiredErrorMessage));
			}
		}
		if ($this->ReferenceBy->Required) {
			if (!$this->ReferenceBy->IsDetailKey && $this->ReferenceBy->FormValue != NULL && $this->ReferenceBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferenceBy->caption(), $this->ReferenceBy->RequiredErrorMessage));
			}
		}
		if ($this->ReferenceDate->Required) {
			if (!$this->ReferenceDate->IsDetailKey && $this->ReferenceDate->FormValue != NULL && $this->ReferenceDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferenceDate->caption(), $this->ReferenceDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReferenceDate->FormValue)) {
			AddMessage($FormError, $this->ReferenceDate->errorMessage());
		}
		if ($this->DocumentAttatch->Required) {
			if ($this->DocumentAttatch->Upload->FileName == "" && !$this->DocumentAttatch->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->DocumentAttatch->caption(), $this->DocumentAttatch->RequiredErrorMessage));
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Company
			$this->Company->setDbValueDef($rsnew, $this->Company->CurrentValue, NULL, $this->Company->ReadOnly);

			// AddressInsuranceCarierName
			$this->AddressInsuranceCarierName->setDbValueDef($rsnew, $this->AddressInsuranceCarierName->CurrentValue, NULL, $this->AddressInsuranceCarierName->ReadOnly);

			// ContactName
			$this->ContactName->setDbValueDef($rsnew, $this->ContactName->CurrentValue, NULL, $this->ContactName->ReadOnly);

			// ContactMobile
			$this->ContactMobile->setDbValueDef($rsnew, $this->ContactMobile->CurrentValue, NULL, $this->ContactMobile->ReadOnly);

			// PolicyType
			$this->PolicyType->setDbValueDef($rsnew, $this->PolicyType->CurrentValue, NULL, $this->PolicyType->ReadOnly);

			// PolicyName
			$this->PolicyName->setDbValueDef($rsnew, $this->PolicyName->CurrentValue, NULL, $this->PolicyName->ReadOnly);

			// PolicyNo
			$this->PolicyNo->setDbValueDef($rsnew, $this->PolicyNo->CurrentValue, NULL, $this->PolicyNo->ReadOnly);

			// PolicyAmount
			$this->PolicyAmount->setDbValueDef($rsnew, $this->PolicyAmount->CurrentValue, NULL, $this->PolicyAmount->ReadOnly);

			// RefLetterNo
			$this->RefLetterNo->setDbValueDef($rsnew, $this->RefLetterNo->CurrentValue, NULL, $this->RefLetterNo->ReadOnly);

			// ReferenceBy
			$this->ReferenceBy->setDbValueDef($rsnew, $this->ReferenceBy->CurrentValue, NULL, $this->ReferenceBy->ReadOnly);

			// ReferenceDate
			$this->ReferenceDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReferenceDate->CurrentValue, 0), NULL, $this->ReferenceDate->ReadOnly);

			// DocumentAttatch
			if ($this->DocumentAttatch->Visible && !$this->DocumentAttatch->ReadOnly && !$this->DocumentAttatch->Upload->KeepFile) {
				$this->DocumentAttatch->Upload->DbValue = $rsold['DocumentAttatch']; // Get original value
				if ($this->DocumentAttatch->Upload->FileName == "") {
					$rsnew['DocumentAttatch'] = NULL;
				} else {
					$rsnew['DocumentAttatch'] = $this->DocumentAttatch->Upload->FileName;
				}
			}

			// modifiedby
			$this->modifiedby->CurrentValue = CurrentUserID();
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

			// modifieddatetime
			$this->modifieddatetime->CurrentValue = CurrentDateTime();
			$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);
			if ($this->DocumentAttatch->Visible && !$this->DocumentAttatch->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->DocumentAttatch->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->htmlDecode(strval($this->DocumentAttatch->Upload->DbValue)));
				if (!EmptyValue($this->DocumentAttatch->Upload->FileName)) {
					$newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), strval($this->DocumentAttatch->Upload->FileName));
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] != "") {
							$file = $newFiles[$i];
							$tempPath = UploadTempPath($this->DocumentAttatch, $this->DocumentAttatch->Upload->Index);
							if (file_exists($tempPath . $file)) {
								if (Config("DELETE_UPLOADED_FILES")) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											array_splice($oldFiles, $j, 1);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->DocumentAttatch->physicalUploadPath(), $file); // Get new file name
								if ($file1 != $file) { // Rename temp file
									while (file_exists($tempPath . $file1) || file_exists($this->DocumentAttatch->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->DocumentAttatch->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename($tempPath . $file, $tempPath . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->DocumentAttatch->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
					$this->DocumentAttatch->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
					$this->DocumentAttatch->setDbValueDef($rsnew, $this->DocumentAttatch->Upload->FileName, NULL, $this->DocumentAttatch->ReadOnly);
				}
			}

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
					if ($this->DocumentAttatch->Visible && !$this->DocumentAttatch->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->DocumentAttatch->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->htmlDecode(strval($this->DocumentAttatch->Upload->DbValue)));
						if (!EmptyValue($this->DocumentAttatch->Upload->FileName)) {
							$newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->Upload->FileName);
							$newFiles2 = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->htmlDecode($rsnew['DocumentAttatch']));
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] != "") {
									$file = UploadTempPath($this->DocumentAttatch, $this->DocumentAttatch->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] != "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->DocumentAttatch->Upload->SaveToFile($newFiles[$i], TRUE, $i)) { // Just replace
											$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = [];
						}
						if (Config("DELETE_UPLOADED_FILES")) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile != "" && !in_array($oldFile, $newFiles))
									@unlink($this->DocumentAttatch->oldPhysicalUploadPath() . $oldFile);
							}
						}
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

			// DocumentAttatch
			CleanUploadTempPath($this->DocumentAttatch, $this->DocumentAttatch->Upload->Index);
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setQueryStringValue($parm);
					$this->Reception->setQueryStringValue($GLOBALS["ip_admission"]->id->QueryStringValue);
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_patient_id", Get("PatientId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setQueryStringValue($parm);
					$this->PatientId->setQueryStringValue($GLOBALS["ip_admission"]->patient_id->QueryStringValue);
					$this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setQueryStringValue($parm);
					$this->mrnno->setQueryStringValue($GLOBALS["ip_admission"]->mrnNo->QueryStringValue);
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("Reception"))) !== NULL) {
					$GLOBALS["ip_admission"]->id->setFormValue($parm);
					$this->Reception->setFormValue($GLOBALS["ip_admission"]->id->FormValue);
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_patient_id", Post("PatientId"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setFormValue($parm);
					$this->PatientId->setFormValue($GLOBALS["ip_admission"]->patient_id->FormValue);
					$this->PatientId->setSessionValue($this->PatientId->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setFormValue($parm);
					$this->mrnno->setFormValue($GLOBALS["ip_admission"]->mrnNo->FormValue);
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->PatientId->CurrentValue == "")
					$this->PatientId->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_insurancelist.php"), "", $this->TableVar, TRUE);
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
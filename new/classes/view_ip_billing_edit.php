<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_ip_billing_edit extends view_ip_billing
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_ip_billing';

	// Page object name
	public $PageObjName = "view_ip_billing_edit";

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

		// Table object (view_ip_billing)
		if (!isset($GLOBALS["view_ip_billing"]) || get_class($GLOBALS["view_ip_billing"]) == PROJECT_NAMESPACE . "view_ip_billing") {
			$GLOBALS["view_ip_billing"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_ip_billing"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ip_billing');

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
		global $view_ip_billing;
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
				$doc = new $class($view_ip_billing);
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
					if ($pageName == "view_ip_billingview.php")
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
					$this->terminate(GetUrl("view_ip_billinglist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PatientID->setVisibility();
		$this->patient_name->setVisibility();
		$this->mrnNo->setVisibility();
		$this->mobileno->setVisibility();
		$this->profilePic->setVisibility();
		$this->gender->setVisibility();
		$this->age->setVisibility();
		$this->physician_id->setVisibility();
		$this->typeRegsisteration->setVisibility();
		$this->PaymentCategory->setVisibility();
		$this->admission_consultant_id->setVisibility();
		$this->leading_consultant_id->setVisibility();
		$this->cause->setVisibility();
		$this->admission_date->setVisibility();
		$this->release_date->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->HospID->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->patient_id->setVisibility();
		$this->BillClosing->setVisibility();
		$this->BillClosingDate->setVisibility();
		$this->BillNumber->setVisibility();
		$this->ClosingAmount->setVisibility();
		$this->ClosingType->setVisibility();
		$this->BillAmount->setVisibility();
		$this->billclosedBy->setVisibility();
		$this->bllcloseByDate->setVisibility();
		$this->ReportHeader->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->mrnNo->Required = FALSE;
		$this->patient_id->Required = FALSE;

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
			$this->terminate("view_ip_billinglist.php");
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
					$this->terminate("view_ip_billinglist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "view_ip_billinglist.php")
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

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'patient_name' first before field var 'x_patient_name'
		$val = $CurrentForm->hasValue("patient_name") ? $CurrentForm->getValue("patient_name") : $CurrentForm->getValue("x_patient_name");
		if (!$this->patient_name->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_name->Visible = FALSE; // Disable update for API request
			else
				$this->patient_name->setFormValue($val);
		}

		// Check field name 'mrnNo' first before field var 'x_mrnNo'
		$val = $CurrentForm->hasValue("mrnNo") ? $CurrentForm->getValue("mrnNo") : $CurrentForm->getValue("x_mrnNo");
		if (!$this->mrnNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnNo->Visible = FALSE; // Disable update for API request
			else
				$this->mrnNo->setFormValue($val);
		}

		// Check field name 'mobileno' first before field var 'x_mobileno'
		$val = $CurrentForm->hasValue("mobileno") ? $CurrentForm->getValue("mobileno") : $CurrentForm->getValue("x_mobileno");
		if (!$this->mobileno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mobileno->Visible = FALSE; // Disable update for API request
			else
				$this->mobileno->setFormValue($val);
		}

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}

		// Check field name 'age' first before field var 'x_age'
		$val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
		if (!$this->age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->age->Visible = FALSE; // Disable update for API request
			else
				$this->age->setFormValue($val);
		}

		// Check field name 'physician_id' first before field var 'x_physician_id'
		$val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
		if (!$this->physician_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->physician_id->Visible = FALSE; // Disable update for API request
			else
				$this->physician_id->setFormValue($val);
		}

		// Check field name 'typeRegsisteration' first before field var 'x_typeRegsisteration'
		$val = $CurrentForm->hasValue("typeRegsisteration") ? $CurrentForm->getValue("typeRegsisteration") : $CurrentForm->getValue("x_typeRegsisteration");
		if (!$this->typeRegsisteration->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->typeRegsisteration->Visible = FALSE; // Disable update for API request
			else
				$this->typeRegsisteration->setFormValue($val);
		}

		// Check field name 'PaymentCategory' first before field var 'x_PaymentCategory'
		$val = $CurrentForm->hasValue("PaymentCategory") ? $CurrentForm->getValue("PaymentCategory") : $CurrentForm->getValue("x_PaymentCategory");
		if (!$this->PaymentCategory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PaymentCategory->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentCategory->setFormValue($val);
		}

		// Check field name 'admission_consultant_id' first before field var 'x_admission_consultant_id'
		$val = $CurrentForm->hasValue("admission_consultant_id") ? $CurrentForm->getValue("admission_consultant_id") : $CurrentForm->getValue("x_admission_consultant_id");
		if (!$this->admission_consultant_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->admission_consultant_id->Visible = FALSE; // Disable update for API request
			else
				$this->admission_consultant_id->setFormValue($val);
		}

		// Check field name 'leading_consultant_id' first before field var 'x_leading_consultant_id'
		$val = $CurrentForm->hasValue("leading_consultant_id") ? $CurrentForm->getValue("leading_consultant_id") : $CurrentForm->getValue("x_leading_consultant_id");
		if (!$this->leading_consultant_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->leading_consultant_id->Visible = FALSE; // Disable update for API request
			else
				$this->leading_consultant_id->setFormValue($val);
		}

		// Check field name 'cause' first before field var 'x_cause'
		$val = $CurrentForm->hasValue("cause") ? $CurrentForm->getValue("cause") : $CurrentForm->getValue("x_cause");
		if (!$this->cause->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->cause->Visible = FALSE; // Disable update for API request
			else
				$this->cause->setFormValue($val);
		}

		// Check field name 'admission_date' first before field var 'x_admission_date'
		$val = $CurrentForm->hasValue("admission_date") ? $CurrentForm->getValue("admission_date") : $CurrentForm->getValue("x_admission_date");
		if (!$this->admission_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->admission_date->Visible = FALSE; // Disable update for API request
			else
				$this->admission_date->setFormValue($val);
			$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
		}

		// Check field name 'release_date' first before field var 'x_release_date'
		$val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
		if (!$this->release_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->release_date->Visible = FALSE; // Disable update for API request
			else
				$this->release_date->setFormValue($val);
			$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 7);
		}

		// Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
		$val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
		if (!$this->PaymentStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PaymentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentStatus->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
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

		// Check field name 'ReferedByDr' first before field var 'x_ReferedByDr'
		$val = $CurrentForm->hasValue("ReferedByDr") ? $CurrentForm->getValue("ReferedByDr") : $CurrentForm->getValue("x_ReferedByDr");
		if (!$this->ReferedByDr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferedByDr->Visible = FALSE; // Disable update for API request
			else
				$this->ReferedByDr->setFormValue($val);
		}

		// Check field name 'ReferClinicname' first before field var 'x_ReferClinicname'
		$val = $CurrentForm->hasValue("ReferClinicname") ? $CurrentForm->getValue("ReferClinicname") : $CurrentForm->getValue("x_ReferClinicname");
		if (!$this->ReferClinicname->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferClinicname->Visible = FALSE; // Disable update for API request
			else
				$this->ReferClinicname->setFormValue($val);
		}

		// Check field name 'ReferCity' first before field var 'x_ReferCity'
		$val = $CurrentForm->hasValue("ReferCity") ? $CurrentForm->getValue("ReferCity") : $CurrentForm->getValue("x_ReferCity");
		if (!$this->ReferCity->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferCity->Visible = FALSE; // Disable update for API request
			else
				$this->ReferCity->setFormValue($val);
		}

		// Check field name 'ReferMobileNo' first before field var 'x_ReferMobileNo'
		$val = $CurrentForm->hasValue("ReferMobileNo") ? $CurrentForm->getValue("ReferMobileNo") : $CurrentForm->getValue("x_ReferMobileNo");
		if (!$this->ReferMobileNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferMobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->ReferMobileNo->setFormValue($val);
		}

		// Check field name 'ReferA4TreatingConsultant' first before field var 'x_ReferA4TreatingConsultant'
		$val = $CurrentForm->hasValue("ReferA4TreatingConsultant") ? $CurrentForm->getValue("ReferA4TreatingConsultant") : $CurrentForm->getValue("x_ReferA4TreatingConsultant");
		if (!$this->ReferA4TreatingConsultant->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReferA4TreatingConsultant->Visible = FALSE; // Disable update for API request
			else
				$this->ReferA4TreatingConsultant->setFormValue($val);
		}

		// Check field name 'PurposreReferredfor' first before field var 'x_PurposreReferredfor'
		$val = $CurrentForm->hasValue("PurposreReferredfor") ? $CurrentForm->getValue("PurposreReferredfor") : $CurrentForm->getValue("x_PurposreReferredfor");
		if (!$this->PurposreReferredfor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PurposreReferredfor->Visible = FALSE; // Disable update for API request
			else
				$this->PurposreReferredfor->setFormValue($val);
		}

		// Check field name 'patient_id' first before field var 'x_patient_id'
		$val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
		if (!$this->patient_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_id->Visible = FALSE; // Disable update for API request
			else
				$this->patient_id->setFormValue($val);
		}

		// Check field name 'BillClosing' first before field var 'x_BillClosing'
		$val = $CurrentForm->hasValue("BillClosing") ? $CurrentForm->getValue("BillClosing") : $CurrentForm->getValue("x_BillClosing");
		if (!$this->BillClosing->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillClosing->Visible = FALSE; // Disable update for API request
			else
				$this->BillClosing->setFormValue($val);
		}

		// Check field name 'BillClosingDate' first before field var 'x_BillClosingDate'
		$val = $CurrentForm->hasValue("BillClosingDate") ? $CurrentForm->getValue("BillClosingDate") : $CurrentForm->getValue("x_BillClosingDate");
		if (!$this->BillClosingDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillClosingDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillClosingDate->setFormValue($val);
			$this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 7);
		}

		// Check field name 'BillNumber' first before field var 'x_BillNumber'
		$val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
		if (!$this->BillNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->BillNumber->setFormValue($val);
		}

		// Check field name 'ClosingAmount' first before field var 'x_ClosingAmount'
		$val = $CurrentForm->hasValue("ClosingAmount") ? $CurrentForm->getValue("ClosingAmount") : $CurrentForm->getValue("x_ClosingAmount");
		if (!$this->ClosingAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ClosingAmount->Visible = FALSE; // Disable update for API request
			else
				$this->ClosingAmount->setFormValue($val);
		}

		// Check field name 'ClosingType' first before field var 'x_ClosingType'
		$val = $CurrentForm->hasValue("ClosingType") ? $CurrentForm->getValue("ClosingType") : $CurrentForm->getValue("x_ClosingType");
		if (!$this->ClosingType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ClosingType->Visible = FALSE; // Disable update for API request
			else
				$this->ClosingType->setFormValue($val);
		}

		// Check field name 'BillAmount' first before field var 'x_BillAmount'
		$val = $CurrentForm->hasValue("BillAmount") ? $CurrentForm->getValue("BillAmount") : $CurrentForm->getValue("x_BillAmount");
		if (!$this->BillAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillAmount->Visible = FALSE; // Disable update for API request
			else
				$this->BillAmount->setFormValue($val);
		}

		// Check field name 'billclosedBy' first before field var 'x_billclosedBy'
		$val = $CurrentForm->hasValue("billclosedBy") ? $CurrentForm->getValue("billclosedBy") : $CurrentForm->getValue("x_billclosedBy");
		if (!$this->billclosedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->billclosedBy->Visible = FALSE; // Disable update for API request
			else
				$this->billclosedBy->setFormValue($val);
		}

		// Check field name 'bllcloseByDate' first before field var 'x_bllcloseByDate'
		$val = $CurrentForm->hasValue("bllcloseByDate") ? $CurrentForm->getValue("bllcloseByDate") : $CurrentForm->getValue("x_bllcloseByDate");
		if (!$this->bllcloseByDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->bllcloseByDate->Visible = FALSE; // Disable update for API request
			else
				$this->bllcloseByDate->setFormValue($val);
			$this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
		}

		// Check field name 'ReportHeader' first before field var 'x_ReportHeader'
		$val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
		if (!$this->ReportHeader->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReportHeader->Visible = FALSE; // Disable update for API request
			else
				$this->ReportHeader->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->patient_name->CurrentValue = $this->patient_name->FormValue;
		$this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
		$this->mobileno->CurrentValue = $this->mobileno->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->age->CurrentValue = $this->age->FormValue;
		$this->physician_id->CurrentValue = $this->physician_id->FormValue;
		$this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
		$this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
		$this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
		$this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
		$this->cause->CurrentValue = $this->cause->FormValue;
		$this->admission_date->CurrentValue = $this->admission_date->FormValue;
		$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
		$this->release_date->CurrentValue = $this->release_date->FormValue;
		$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 7);
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
		$this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
		$this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
		$this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
		$this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
		$this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
		$this->patient_id->CurrentValue = $this->patient_id->FormValue;
		$this->BillClosing->CurrentValue = $this->BillClosing->FormValue;
		$this->BillClosingDate->CurrentValue = $this->BillClosingDate->FormValue;
		$this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 7);
		$this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
		$this->ClosingAmount->CurrentValue = $this->ClosingAmount->FormValue;
		$this->ClosingType->CurrentValue = $this->ClosingType->FormValue;
		$this->BillAmount->CurrentValue = $this->BillAmount->FormValue;
		$this->billclosedBy->CurrentValue = $this->billclosedBy->FormValue;
		$this->bllcloseByDate->CurrentValue = $this->bllcloseByDate->FormValue;
		$this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
		$this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
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
		$this->patient_name->setDbValue($row['patient_name']);
		$this->mrnNo->setDbValue($row['mrnNo']);
		$this->mobileno->setDbValue($row['mobileno']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->gender->setDbValue($row['gender']);
		$this->age->setDbValue($row['age']);
		$this->physician_id->setDbValue($row['physician_id']);
		$this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
		$this->PaymentCategory->setDbValue($row['PaymentCategory']);
		$this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
		$this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
		$this->cause->setDbValue($row['cause']);
		$this->admission_date->setDbValue($row['admission_date']);
		$this->release_date->setDbValue($row['release_date']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		$this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
		$this->patient_id->setDbValue($row['patient_id']);
		$this->BillClosing->setDbValue($row['BillClosing']);
		$this->BillClosingDate->setDbValue($row['BillClosingDate']);
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->ClosingAmount->setDbValue($row['ClosingAmount']);
		$this->ClosingType->setDbValue($row['ClosingType']);
		$this->BillAmount->setDbValue($row['BillAmount']);
		$this->billclosedBy->setDbValue($row['billclosedBy']);
		$this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
		$this->ReportHeader->setDbValue($row['ReportHeader']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatientID'] = NULL;
		$row['patient_name'] = NULL;
		$row['mrnNo'] = NULL;
		$row['mobileno'] = NULL;
		$row['profilePic'] = NULL;
		$row['gender'] = NULL;
		$row['age'] = NULL;
		$row['physician_id'] = NULL;
		$row['typeRegsisteration'] = NULL;
		$row['PaymentCategory'] = NULL;
		$row['admission_consultant_id'] = NULL;
		$row['leading_consultant_id'] = NULL;
		$row['cause'] = NULL;
		$row['admission_date'] = NULL;
		$row['release_date'] = NULL;
		$row['PaymentStatus'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['HospID'] = NULL;
		$row['ReferedByDr'] = NULL;
		$row['ReferClinicname'] = NULL;
		$row['ReferCity'] = NULL;
		$row['ReferMobileNo'] = NULL;
		$row['ReferA4TreatingConsultant'] = NULL;
		$row['PurposreReferredfor'] = NULL;
		$row['patient_id'] = NULL;
		$row['BillClosing'] = NULL;
		$row['BillClosingDate'] = NULL;
		$row['BillNumber'] = NULL;
		$row['ClosingAmount'] = NULL;
		$row['ClosingType'] = NULL;
		$row['BillAmount'] = NULL;
		$row['billclosedBy'] = NULL;
		$row['bllcloseByDate'] = NULL;
		$row['ReportHeader'] = NULL;
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
		// patient_name
		// mrnNo
		// mobileno
		// profilePic
		// gender
		// age
		// physician_id
		// typeRegsisteration
		// PaymentCategory
		// admission_consultant_id
		// leading_consultant_id
		// cause
		// admission_date
		// release_date
		// PaymentStatus
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// patient_id
		// BillClosing
		// BillClosingDate
		// BillNumber
		// ClosingAmount
		// ClosingType
		// BillAmount
		// billclosedBy
		// bllcloseByDate
		// ReportHeader

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// patient_name
			$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
			$this->patient_name->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
			$this->mrnNo->ViewCustomAttributes = "";

			// mobileno
			$this->mobileno->ViewValue = $this->mobileno->CurrentValue;
			$this->mobileno->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewCustomAttributes = "";

			// physician_id
			$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
			$this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
			$this->physician_id->ViewCustomAttributes = "";

			// typeRegsisteration
			$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
			$this->typeRegsisteration->ViewCustomAttributes = "";

			// PaymentCategory
			$this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
			$this->PaymentCategory->ViewCustomAttributes = "";

			// admission_consultant_id
			$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
			$this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->admission_consultant_id->ViewCustomAttributes = "";

			// leading_consultant_id
			$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
			$this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->leading_consultant_id->ViewCustomAttributes = "";

			// cause
			$this->cause->ViewValue = $this->cause->CurrentValue;
			$this->cause->ViewCustomAttributes = "";

			// admission_date
			$this->admission_date->ViewValue = $this->admission_date->CurrentValue;
			$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->ViewValue = $this->release_date->CurrentValue;
			$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 7);
			$this->release_date->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
			$this->PaymentStatus->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// ReferedByDr
			$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// patient_id
			$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
			$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
			$this->patient_id->ViewCustomAttributes = "";

			// BillClosing
			if (strval($this->BillClosing->CurrentValue) != "") {
				$this->BillClosing->ViewValue = $this->BillClosing->optionCaption($this->BillClosing->CurrentValue);
			} else {
				$this->BillClosing->ViewValue = NULL;
			}
			$this->BillClosing->ViewCustomAttributes = "";

			// BillClosingDate
			$this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
			$this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 7);
			$this->BillClosingDate->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// ClosingAmount
			$this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
			$this->ClosingAmount->ViewCustomAttributes = "";

			// ClosingType
			$this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
			$this->ClosingType->ViewCustomAttributes = "";

			// BillAmount
			$this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
			$this->BillAmount->ViewCustomAttributes = "";

			// billclosedBy
			$this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
			$this->billclosedBy->ViewCustomAttributes = "";

			// bllcloseByDate
			$this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
			$this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
			$this->bllcloseByDate->ViewCustomAttributes = "";

			// ReportHeader
			if (strval($this->ReportHeader->CurrentValue) != "") {
				$this->ReportHeader->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ReportHeader->ViewValue = NULL;
			}
			$this->ReportHeader->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";
			$this->patient_name->TooltipValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";
			$this->mrnNo->TooltipValue = "";

			// mobileno
			$this->mobileno->LinkCustomAttributes = "";
			$this->mobileno->HrefValue = "";
			$this->mobileno->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";
			$this->typeRegsisteration->TooltipValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";
			$this->PaymentCategory->TooltipValue = "";

			// admission_consultant_id
			$this->admission_consultant_id->LinkCustomAttributes = "";
			$this->admission_consultant_id->HrefValue = "";
			$this->admission_consultant_id->TooltipValue = "";

			// leading_consultant_id
			$this->leading_consultant_id->LinkCustomAttributes = "";
			$this->leading_consultant_id->HrefValue = "";
			$this->leading_consultant_id->TooltipValue = "";

			// cause
			$this->cause->LinkCustomAttributes = "";
			$this->cause->HrefValue = "";
			$this->cause->TooltipValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";
			$this->admission_date->TooltipValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";
			$this->release_date->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

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

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// BillClosing
			$this->BillClosing->LinkCustomAttributes = "";
			$this->BillClosing->HrefValue = "";
			$this->BillClosing->TooltipValue = "";

			// BillClosingDate
			$this->BillClosingDate->LinkCustomAttributes = "";
			$this->BillClosingDate->HrefValue = "";
			$this->BillClosingDate->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// ClosingAmount
			$this->ClosingAmount->LinkCustomAttributes = "";
			$this->ClosingAmount->HrefValue = "";
			$this->ClosingAmount->TooltipValue = "";

			// ClosingType
			$this->ClosingType->LinkCustomAttributes = "";
			$this->ClosingType->HrefValue = "";
			$this->ClosingType->TooltipValue = "";

			// BillAmount
			$this->BillAmount->LinkCustomAttributes = "";
			$this->BillAmount->HrefValue = "";
			$this->BillAmount->TooltipValue = "";

			// billclosedBy
			$this->billclosedBy->LinkCustomAttributes = "";
			$this->billclosedBy->HrefValue = "";
			$this->billclosedBy->TooltipValue = "";

			// bllcloseByDate
			$this->bllcloseByDate->LinkCustomAttributes = "";
			$this->bllcloseByDate->HrefValue = "";
			$this->bllcloseByDate->TooltipValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
			$this->ReportHeader->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			$this->PatientID->EditValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// patient_name
			$this->patient_name->EditAttrs["class"] = "form-control";
			$this->patient_name->EditCustomAttributes = "";
			$this->patient_name->EditValue = $this->patient_name->CurrentValue;
			$this->patient_name->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->EditAttrs["class"] = "form-control";
			$this->mrnNo->EditCustomAttributes = "";
			$this->mrnNo->EditValue = $this->mrnNo->CurrentValue;
			$this->mrnNo->ViewCustomAttributes = "";

			// mobileno
			$this->mobileno->EditAttrs["class"] = "form-control";
			$this->mobileno->EditCustomAttributes = "";
			$this->mobileno->EditValue = $this->mobileno->CurrentValue;
			$this->mobileno->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			$this->gender->EditValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// age
			$this->age->EditAttrs["class"] = "form-control";
			$this->age->EditCustomAttributes = "";
			$this->age->EditValue = $this->age->CurrentValue;
			$this->age->ViewCustomAttributes = "";

			// physician_id
			$this->physician_id->EditAttrs["class"] = "form-control";
			$this->physician_id->EditCustomAttributes = "";
			$this->physician_id->EditValue = $this->physician_id->CurrentValue;
			$this->physician_id->EditValue = FormatNumber($this->physician_id->EditValue, 0, -2, -2, -2);
			$this->physician_id->ViewCustomAttributes = "";

			// typeRegsisteration
			$this->typeRegsisteration->EditAttrs["class"] = "form-control";
			$this->typeRegsisteration->EditCustomAttributes = "";
			$this->typeRegsisteration->EditValue = $this->typeRegsisteration->CurrentValue;
			$this->typeRegsisteration->ViewCustomAttributes = "";

			// PaymentCategory
			$this->PaymentCategory->EditAttrs["class"] = "form-control";
			$this->PaymentCategory->EditCustomAttributes = "";
			$this->PaymentCategory->EditValue = $this->PaymentCategory->CurrentValue;
			$this->PaymentCategory->ViewCustomAttributes = "";

			// admission_consultant_id
			$this->admission_consultant_id->EditAttrs["class"] = "form-control";
			$this->admission_consultant_id->EditCustomAttributes = "";
			$this->admission_consultant_id->EditValue = $this->admission_consultant_id->CurrentValue;
			$this->admission_consultant_id->EditValue = FormatNumber($this->admission_consultant_id->EditValue, 0, -2, -2, -2);
			$this->admission_consultant_id->ViewCustomAttributes = "";

			// leading_consultant_id
			$this->leading_consultant_id->EditAttrs["class"] = "form-control";
			$this->leading_consultant_id->EditCustomAttributes = "";
			$this->leading_consultant_id->EditValue = $this->leading_consultant_id->CurrentValue;
			$this->leading_consultant_id->EditValue = FormatNumber($this->leading_consultant_id->EditValue, 0, -2, -2, -2);
			$this->leading_consultant_id->ViewCustomAttributes = "";

			// cause
			$this->cause->EditAttrs["class"] = "form-control";
			$this->cause->EditCustomAttributes = "";
			$this->cause->EditValue = $this->cause->CurrentValue;
			$this->cause->ViewCustomAttributes = "";

			// admission_date
			$this->admission_date->EditAttrs["class"] = "form-control";
			$this->admission_date->EditCustomAttributes = "";
			$this->admission_date->EditValue = $this->admission_date->CurrentValue;
			$this->admission_date->EditValue = FormatDateTime($this->admission_date->EditValue, 0);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->EditAttrs["class"] = "form-control";
			$this->release_date->EditCustomAttributes = "";
			$this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 7));
			$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			$this->PaymentStatus->EditValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->EditValue = FormatNumber($this->PaymentStatus->EditValue, 0, -2, -2, -2);
			$this->PaymentStatus->ViewCustomAttributes = "";

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->CurrentValue;
			$this->status->EditValue = FormatNumber($this->status->EditValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = $this->createdby->CurrentValue;
			$this->createdby->EditValue = FormatNumber($this->createdby->EditValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->EditValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->EditValue = FormatNumber($this->modifiedby->EditValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->EditValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// ReferedByDr
			$this->ReferedByDr->EditAttrs["class"] = "form-control";
			$this->ReferedByDr->EditCustomAttributes = "";
			$this->ReferedByDr->EditValue = $this->ReferedByDr->CurrentValue;
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			$this->ReferClinicname->EditValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			$this->ReferCity->EditValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			$this->ReferMobileNo->EditValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			$this->ReferA4TreatingConsultant->EditValue = $this->ReferA4TreatingConsultant->CurrentValue;
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			$this->PurposreReferredfor->EditValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// patient_id
			$this->patient_id->EditAttrs["class"] = "form-control";
			$this->patient_id->EditCustomAttributes = "";
			$this->patient_id->EditValue = $this->patient_id->CurrentValue;
			$this->patient_id->EditValue = FormatNumber($this->patient_id->EditValue, 0, -2, -2, -2);
			$this->patient_id->ViewCustomAttributes = "";

			// BillClosing
			$this->BillClosing->EditAttrs["class"] = "form-control";
			$this->BillClosing->EditCustomAttributes = "";
			$this->BillClosing->EditValue = $this->BillClosing->options(TRUE);

			// BillClosingDate
			$this->BillClosingDate->EditAttrs["class"] = "form-control";
			$this->BillClosingDate->EditCustomAttributes = "";
			$this->BillClosingDate->EditValue = HtmlEncode(FormatDateTime($this->BillClosingDate->CurrentValue, 7));
			$this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (!$this->BillNumber->Raw)
				$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// ClosingAmount
			$this->ClosingAmount->EditAttrs["class"] = "form-control";
			$this->ClosingAmount->EditCustomAttributes = "";
			if (!$this->ClosingAmount->Raw)
				$this->ClosingAmount->CurrentValue = HtmlDecode($this->ClosingAmount->CurrentValue);
			$this->ClosingAmount->EditValue = HtmlEncode($this->ClosingAmount->CurrentValue);
			$this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

			// ClosingType
			$this->ClosingType->EditAttrs["class"] = "form-control";
			$this->ClosingType->EditCustomAttributes = "";
			if (!$this->ClosingType->Raw)
				$this->ClosingType->CurrentValue = HtmlDecode($this->ClosingType->CurrentValue);
			$this->ClosingType->EditValue = HtmlEncode($this->ClosingType->CurrentValue);
			$this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

			// BillAmount
			$this->BillAmount->EditAttrs["class"] = "form-control";
			$this->BillAmount->EditCustomAttributes = "";
			if (!$this->BillAmount->Raw)
				$this->BillAmount->CurrentValue = HtmlDecode($this->BillAmount->CurrentValue);
			$this->BillAmount->EditValue = HtmlEncode($this->BillAmount->CurrentValue);
			$this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

			// billclosedBy
			// bllcloseByDate
			// ReportHeader

			$this->ReportHeader->EditCustomAttributes = "";
			$this->ReportHeader->EditValue = $this->ReportHeader->options(FALSE);

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";
			$this->patient_name->TooltipValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";
			$this->mrnNo->TooltipValue = "";

			// mobileno
			$this->mobileno->LinkCustomAttributes = "";
			$this->mobileno->HrefValue = "";
			$this->mobileno->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";
			$this->typeRegsisteration->TooltipValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";
			$this->PaymentCategory->TooltipValue = "";

			// admission_consultant_id
			$this->admission_consultant_id->LinkCustomAttributes = "";
			$this->admission_consultant_id->HrefValue = "";
			$this->admission_consultant_id->TooltipValue = "";

			// leading_consultant_id
			$this->leading_consultant_id->LinkCustomAttributes = "";
			$this->leading_consultant_id->HrefValue = "";
			$this->leading_consultant_id->TooltipValue = "";

			// cause
			$this->cause->LinkCustomAttributes = "";
			$this->cause->HrefValue = "";
			$this->cause->TooltipValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";
			$this->admission_date->TooltipValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

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

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// BillClosing
			$this->BillClosing->LinkCustomAttributes = "";
			$this->BillClosing->HrefValue = "";

			// BillClosingDate
			$this->BillClosingDate->LinkCustomAttributes = "";
			$this->BillClosingDate->HrefValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";

			// ClosingAmount
			$this->ClosingAmount->LinkCustomAttributes = "";
			$this->ClosingAmount->HrefValue = "";

			// ClosingType
			$this->ClosingType->LinkCustomAttributes = "";
			$this->ClosingType->HrefValue = "";

			// BillAmount
			$this->BillAmount->LinkCustomAttributes = "";
			$this->BillAmount->HrefValue = "";

			// billclosedBy
			$this->billclosedBy->LinkCustomAttributes = "";
			$this->billclosedBy->HrefValue = "";

			// bllcloseByDate
			$this->bllcloseByDate->LinkCustomAttributes = "";
			$this->bllcloseByDate->HrefValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
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
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->patient_name->Required) {
			if (!$this->patient_name->IsDetailKey && $this->patient_name->FormValue != NULL && $this->patient_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_name->caption(), $this->patient_name->RequiredErrorMessage));
			}
		}
		if ($this->mrnNo->Required) {
			if (!$this->mrnNo->IsDetailKey && $this->mrnNo->FormValue != NULL && $this->mrnNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnNo->caption(), $this->mrnNo->RequiredErrorMessage));
			}
		}
		if ($this->mobileno->Required) {
			if (!$this->mobileno->IsDetailKey && $this->mobileno->FormValue != NULL && $this->mobileno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobileno->caption(), $this->mobileno->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if (!$this->gender->IsDetailKey && $this->gender->FormValue != NULL && $this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
			}
		}
		if ($this->age->Required) {
			if (!$this->age->IsDetailKey && $this->age->FormValue != NULL && $this->age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
			}
		}
		if ($this->physician_id->Required) {
			if (!$this->physician_id->IsDetailKey && $this->physician_id->FormValue != NULL && $this->physician_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
			}
		}
		if ($this->typeRegsisteration->Required) {
			if (!$this->typeRegsisteration->IsDetailKey && $this->typeRegsisteration->FormValue != NULL && $this->typeRegsisteration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->typeRegsisteration->caption(), $this->typeRegsisteration->RequiredErrorMessage));
			}
		}
		if ($this->PaymentCategory->Required) {
			if (!$this->PaymentCategory->IsDetailKey && $this->PaymentCategory->FormValue != NULL && $this->PaymentCategory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentCategory->caption(), $this->PaymentCategory->RequiredErrorMessage));
			}
		}
		if ($this->admission_consultant_id->Required) {
			if (!$this->admission_consultant_id->IsDetailKey && $this->admission_consultant_id->FormValue != NULL && $this->admission_consultant_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->admission_consultant_id->caption(), $this->admission_consultant_id->RequiredErrorMessage));
			}
		}
		if ($this->leading_consultant_id->Required) {
			if (!$this->leading_consultant_id->IsDetailKey && $this->leading_consultant_id->FormValue != NULL && $this->leading_consultant_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leading_consultant_id->caption(), $this->leading_consultant_id->RequiredErrorMessage));
			}
		}
		if ($this->cause->Required) {
			if (!$this->cause->IsDetailKey && $this->cause->FormValue != NULL && $this->cause->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cause->caption(), $this->cause->RequiredErrorMessage));
			}
		}
		if ($this->admission_date->Required) {
			if (!$this->admission_date->IsDetailKey && $this->admission_date->FormValue != NULL && $this->admission_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->admission_date->caption(), $this->admission_date->RequiredErrorMessage));
			}
		}
		if ($this->release_date->Required) {
			if (!$this->release_date->IsDetailKey && $this->release_date->FormValue != NULL && $this->release_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->release_date->caption(), $this->release_date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->release_date->FormValue)) {
			AddMessage($FormError, $this->release_date->errorMessage());
		}
		if ($this->PaymentStatus->Required) {
			if (!$this->PaymentStatus->IsDetailKey && $this->PaymentStatus->FormValue != NULL && $this->PaymentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
		if ($this->ReferedByDr->Required) {
			if (!$this->ReferedByDr->IsDetailKey && $this->ReferedByDr->FormValue != NULL && $this->ReferedByDr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferedByDr->caption(), $this->ReferedByDr->RequiredErrorMessage));
			}
		}
		if ($this->ReferClinicname->Required) {
			if (!$this->ReferClinicname->IsDetailKey && $this->ReferClinicname->FormValue != NULL && $this->ReferClinicname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferClinicname->caption(), $this->ReferClinicname->RequiredErrorMessage));
			}
		}
		if ($this->ReferCity->Required) {
			if (!$this->ReferCity->IsDetailKey && $this->ReferCity->FormValue != NULL && $this->ReferCity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferCity->caption(), $this->ReferCity->RequiredErrorMessage));
			}
		}
		if ($this->ReferMobileNo->Required) {
			if (!$this->ReferMobileNo->IsDetailKey && $this->ReferMobileNo->FormValue != NULL && $this->ReferMobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferMobileNo->caption(), $this->ReferMobileNo->RequiredErrorMessage));
			}
		}
		if ($this->ReferA4TreatingConsultant->Required) {
			if (!$this->ReferA4TreatingConsultant->IsDetailKey && $this->ReferA4TreatingConsultant->FormValue != NULL && $this->ReferA4TreatingConsultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferA4TreatingConsultant->caption(), $this->ReferA4TreatingConsultant->RequiredErrorMessage));
			}
		}
		if ($this->PurposreReferredfor->Required) {
			if (!$this->PurposreReferredfor->IsDetailKey && $this->PurposreReferredfor->FormValue != NULL && $this->PurposreReferredfor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurposreReferredfor->caption(), $this->PurposreReferredfor->RequiredErrorMessage));
			}
		}
		if ($this->patient_id->Required) {
			if (!$this->patient_id->IsDetailKey && $this->patient_id->FormValue != NULL && $this->patient_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
			}
		}
		if ($this->BillClosing->Required) {
			if (!$this->BillClosing->IsDetailKey && $this->BillClosing->FormValue != NULL && $this->BillClosing->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillClosing->caption(), $this->BillClosing->RequiredErrorMessage));
			}
		}
		if ($this->BillClosingDate->Required) {
			if (!$this->BillClosingDate->IsDetailKey && $this->BillClosingDate->FormValue != NULL && $this->BillClosingDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillClosingDate->caption(), $this->BillClosingDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->BillClosingDate->FormValue)) {
			AddMessage($FormError, $this->BillClosingDate->errorMessage());
		}
		if ($this->BillNumber->Required) {
			if (!$this->BillNumber->IsDetailKey && $this->BillNumber->FormValue != NULL && $this->BillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
			}
		}
		if ($this->ClosingAmount->Required) {
			if (!$this->ClosingAmount->IsDetailKey && $this->ClosingAmount->FormValue != NULL && $this->ClosingAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClosingAmount->caption(), $this->ClosingAmount->RequiredErrorMessage));
			}
		}
		if ($this->ClosingType->Required) {
			if (!$this->ClosingType->IsDetailKey && $this->ClosingType->FormValue != NULL && $this->ClosingType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClosingType->caption(), $this->ClosingType->RequiredErrorMessage));
			}
		}
		if ($this->BillAmount->Required) {
			if (!$this->BillAmount->IsDetailKey && $this->BillAmount->FormValue != NULL && $this->BillAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillAmount->caption(), $this->BillAmount->RequiredErrorMessage));
			}
		}
		if ($this->billclosedBy->Required) {
			if (!$this->billclosedBy->IsDetailKey && $this->billclosedBy->FormValue != NULL && $this->billclosedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->billclosedBy->caption(), $this->billclosedBy->RequiredErrorMessage));
			}
		}
		if ($this->bllcloseByDate->Required) {
			if (!$this->bllcloseByDate->IsDetailKey && $this->bllcloseByDate->FormValue != NULL && $this->bllcloseByDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bllcloseByDate->caption(), $this->bllcloseByDate->RequiredErrorMessage));
			}
		}
		if ($this->ReportHeader->Required) {
			if ($this->ReportHeader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
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

			// release_date
			$this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 7), NULL, $this->release_date->ReadOnly);

			// BillClosing
			$this->BillClosing->setDbValueDef($rsnew, $this->BillClosing->CurrentValue, NULL, $this->BillClosing->ReadOnly);

			// BillClosingDate
			$this->BillClosingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillClosingDate->CurrentValue, 7), NULL, $this->BillClosingDate->ReadOnly);

			// BillNumber
			$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, $this->BillNumber->ReadOnly);

			// ClosingAmount
			$this->ClosingAmount->setDbValueDef($rsnew, $this->ClosingAmount->CurrentValue, NULL, $this->ClosingAmount->ReadOnly);

			// ClosingType
			$this->ClosingType->setDbValueDef($rsnew, $this->ClosingType->CurrentValue, NULL, $this->ClosingType->ReadOnly);

			// BillAmount
			$this->BillAmount->setDbValueDef($rsnew, $this->BillAmount->CurrentValue, NULL, $this->BillAmount->ReadOnly);

			// billclosedBy
			$this->billclosedBy->CurrentValue = CurrentUserName();
			$this->billclosedBy->setDbValueDef($rsnew, $this->billclosedBy->CurrentValue, NULL);

			// bllcloseByDate
			$this->bllcloseByDate->CurrentValue = CurrentDateTime();
			$this->bllcloseByDate->setDbValueDef($rsnew, $this->bllcloseByDate->CurrentValue, NULL);

			// ReportHeader
			$this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, NULL, $this->ReportHeader->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_ip_billinglist.php"), "", $this->TableVar, TRUE);
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
				case "x_BillClosing":
					break;
				case "x_ReportHeader":
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
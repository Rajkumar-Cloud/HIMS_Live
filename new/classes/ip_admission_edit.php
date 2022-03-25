<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ip_admission_edit extends ip_admission
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ip_admission';

	// Page object name
	public $PageObjName = "ip_admission_edit";

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

		// Table object (ip_admission)
		if (!isset($GLOBALS["ip_admission"]) || get_class($GLOBALS["ip_admission"]) == PROJECT_NAMESPACE . "ip_admission") {
			$GLOBALS["ip_admission"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ip_admission"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ip_admission');

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
		global $ip_admission;
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
				$doc = new $class($ip_admission);
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
					if ($pageName == "ip_admissionview.php")
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
					$this->terminate(GetUrl("ip_admissionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->mrnNo->setVisibility();
		$this->PatientID->setVisibility();
		$this->patient_name->setVisibility();
		$this->mobileno->setVisibility();
		$this->gender->setVisibility();
		$this->age->setVisibility();
		$this->typeRegsisteration->setVisibility();
		$this->PaymentCategory->setVisibility();
		$this->physician_id->setVisibility();
		$this->admission_consultant_id->setVisibility();
		$this->leading_consultant_id->setVisibility();
		$this->cause->setVisibility();
		$this->admission_date->setVisibility();
		$this->release_date->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->profilePic->setVisibility();
		$this->HospID->setVisibility();
		$this->DOB->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->BillClosing->setVisibility();
		$this->BillClosingDate->setVisibility();
		$this->BillNumber->setVisibility();
		$this->ClosingAmount->setVisibility();
		$this->ClosingType->setVisibility();
		$this->BillAmount->setVisibility();
		$this->billclosedBy->setVisibility();
		$this->bllcloseByDate->setVisibility();
		$this->ReportHeader->setVisibility();
		$this->Procedure->setVisibility();
		$this->Consultant->setVisibility();
		$this->Anesthetist->setVisibility();
		$this->Amound->setVisibility();
		$this->Package->setVisibility();
		$this->patient_id->setVisibility();
		$this->PartnerID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerMobile->setVisibility();
		$this->Cid->setVisibility();
		$this->PartId->setVisibility();
		$this->IDProof->setVisibility();
		$this->AdviceToOtherHospital->setVisibility();
		$this->Reason->setVisibility();
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
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->typeRegsisteration);
		$this->setupLookupOptions($this->PaymentCategory);
		$this->setupLookupOptions($this->physician_id);
		$this->setupLookupOptions($this->admission_consultant_id);
		$this->setupLookupOptions($this->leading_consultant_id);
		$this->setupLookupOptions($this->PaymentStatus);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->ReferA4TreatingConsultant);
		$this->setupLookupOptions($this->patient_id);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ip_admissionlist.php");
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
					$this->terminate("ip_admissionlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ip_admissionlist.php")
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'mrnNo' first before field var 'x_mrnNo'
		$val = $CurrentForm->hasValue("mrnNo") ? $CurrentForm->getValue("mrnNo") : $CurrentForm->getValue("x_mrnNo");
		if (!$this->mrnNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnNo->Visible = FALSE; // Disable update for API request
			else
				$this->mrnNo->setFormValue($val);
		}

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

		// Check field name 'mobileno' first before field var 'x_mobileno'
		$val = $CurrentForm->hasValue("mobileno") ? $CurrentForm->getValue("mobileno") : $CurrentForm->getValue("x_mobileno");
		if (!$this->mobileno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mobileno->Visible = FALSE; // Disable update for API request
			else
				$this->mobileno->setFormValue($val);
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

		// Check field name 'physician_id' first before field var 'x_physician_id'
		$val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
		if (!$this->physician_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->physician_id->Visible = FALSE; // Disable update for API request
			else
				$this->physician_id->setFormValue($val);
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
			$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 11);
		}

		// Check field name 'release_date' first before field var 'x_release_date'
		$val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
		if (!$this->release_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->release_date->Visible = FALSE; // Disable update for API request
			else
				$this->release_date->setFormValue($val);
			$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 17);
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

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'DOB' first before field var 'x_DOB'
		$val = $CurrentForm->hasValue("DOB") ? $CurrentForm->getValue("DOB") : $CurrentForm->getValue("x_DOB");
		if (!$this->DOB->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DOB->Visible = FALSE; // Disable update for API request
			else
				$this->DOB->setFormValue($val);
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
			$this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 0);
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

		// Check field name 'Procedure' first before field var 'x_Procedure'
		$val = $CurrentForm->hasValue("Procedure") ? $CurrentForm->getValue("Procedure") : $CurrentForm->getValue("x_Procedure");
		if (!$this->Procedure->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Procedure->Visible = FALSE; // Disable update for API request
			else
				$this->Procedure->setFormValue($val);
		}

		// Check field name 'Consultant' first before field var 'x_Consultant'
		$val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
		if (!$this->Consultant->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Consultant->Visible = FALSE; // Disable update for API request
			else
				$this->Consultant->setFormValue($val);
		}

		// Check field name 'Anesthetist' first before field var 'x_Anesthetist'
		$val = $CurrentForm->hasValue("Anesthetist") ? $CurrentForm->getValue("Anesthetist") : $CurrentForm->getValue("x_Anesthetist");
		if (!$this->Anesthetist->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Anesthetist->Visible = FALSE; // Disable update for API request
			else
				$this->Anesthetist->setFormValue($val);
		}

		// Check field name 'Amound' first before field var 'x_Amound'
		$val = $CurrentForm->hasValue("Amound") ? $CurrentForm->getValue("Amound") : $CurrentForm->getValue("x_Amound");
		if (!$this->Amound->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Amound->Visible = FALSE; // Disable update for API request
			else
				$this->Amound->setFormValue($val);
		}

		// Check field name 'Package' first before field var 'x_Package'
		$val = $CurrentForm->hasValue("Package") ? $CurrentForm->getValue("Package") : $CurrentForm->getValue("x_Package");
		if (!$this->Package->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Package->Visible = FALSE; // Disable update for API request
			else
				$this->Package->setFormValue($val);
		}

		// Check field name 'patient_id' first before field var 'x_patient_id'
		$val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
		if (!$this->patient_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_id->Visible = FALSE; // Disable update for API request
			else
				$this->patient_id->setFormValue($val);
		}

		// Check field name 'PartnerID' first before field var 'x_PartnerID'
		$val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
		if (!$this->PartnerID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerID->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerID->setFormValue($val);
		}

		// Check field name 'PartnerName' first before field var 'x_PartnerName'
		$val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
		if (!$this->PartnerName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerName->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerName->setFormValue($val);
		}

		// Check field name 'PartnerMobile' first before field var 'x_PartnerMobile'
		$val = $CurrentForm->hasValue("PartnerMobile") ? $CurrentForm->getValue("PartnerMobile") : $CurrentForm->getValue("x_PartnerMobile");
		if (!$this->PartnerMobile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerMobile->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerMobile->setFormValue($val);
		}

		// Check field name 'Cid' first before field var 'x_Cid'
		$val = $CurrentForm->hasValue("Cid") ? $CurrentForm->getValue("Cid") : $CurrentForm->getValue("x_Cid");
		if (!$this->Cid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Cid->Visible = FALSE; // Disable update for API request
			else
				$this->Cid->setFormValue($val);
		}

		// Check field name 'PartId' first before field var 'x_PartId'
		$val = $CurrentForm->hasValue("PartId") ? $CurrentForm->getValue("PartId") : $CurrentForm->getValue("x_PartId");
		if (!$this->PartId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartId->Visible = FALSE; // Disable update for API request
			else
				$this->PartId->setFormValue($val);
		}

		// Check field name 'IDProof' first before field var 'x_IDProof'
		$val = $CurrentForm->hasValue("IDProof") ? $CurrentForm->getValue("IDProof") : $CurrentForm->getValue("x_IDProof");
		if (!$this->IDProof->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IDProof->Visible = FALSE; // Disable update for API request
			else
				$this->IDProof->setFormValue($val);
		}

		// Check field name 'AdviceToOtherHospital' first before field var 'x_AdviceToOtherHospital'
		$val = $CurrentForm->hasValue("AdviceToOtherHospital") ? $CurrentForm->getValue("AdviceToOtherHospital") : $CurrentForm->getValue("x_AdviceToOtherHospital");
		if (!$this->AdviceToOtherHospital->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AdviceToOtherHospital->Visible = FALSE; // Disable update for API request
			else
				$this->AdviceToOtherHospital->setFormValue($val);
		}

		// Check field name 'Reason' first before field var 'x_Reason'
		$val = $CurrentForm->hasValue("Reason") ? $CurrentForm->getValue("Reason") : $CurrentForm->getValue("x_Reason");
		if (!$this->Reason->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reason->Visible = FALSE; // Disable update for API request
			else
				$this->Reason->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->patient_name->CurrentValue = $this->patient_name->FormValue;
		$this->mobileno->CurrentValue = $this->mobileno->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->age->CurrentValue = $this->age->FormValue;
		$this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
		$this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
		$this->physician_id->CurrentValue = $this->physician_id->FormValue;
		$this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
		$this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
		$this->cause->CurrentValue = $this->cause->FormValue;
		$this->admission_date->CurrentValue = $this->admission_date->FormValue;
		$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 11);
		$this->release_date->CurrentValue = $this->release_date->FormValue;
		$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 17);
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->DOB->CurrentValue = $this->DOB->FormValue;
		$this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
		$this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
		$this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
		$this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
		$this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
		$this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
		$this->BillClosing->CurrentValue = $this->BillClosing->FormValue;
		$this->BillClosingDate->CurrentValue = $this->BillClosingDate->FormValue;
		$this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 0);
		$this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
		$this->ClosingAmount->CurrentValue = $this->ClosingAmount->FormValue;
		$this->ClosingType->CurrentValue = $this->ClosingType->FormValue;
		$this->BillAmount->CurrentValue = $this->BillAmount->FormValue;
		$this->billclosedBy->CurrentValue = $this->billclosedBy->FormValue;
		$this->bllcloseByDate->CurrentValue = $this->bllcloseByDate->FormValue;
		$this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
		$this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
		$this->Procedure->CurrentValue = $this->Procedure->FormValue;
		$this->Consultant->CurrentValue = $this->Consultant->FormValue;
		$this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
		$this->Amound->CurrentValue = $this->Amound->FormValue;
		$this->Package->CurrentValue = $this->Package->FormValue;
		$this->patient_id->CurrentValue = $this->patient_id->FormValue;
		$this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
		$this->Cid->CurrentValue = $this->Cid->FormValue;
		$this->PartId->CurrentValue = $this->PartId->FormValue;
		$this->IDProof->CurrentValue = $this->IDProof->FormValue;
		$this->AdviceToOtherHospital->CurrentValue = $this->AdviceToOtherHospital->FormValue;
		$this->Reason->CurrentValue = $this->Reason->FormValue;
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
		$this->mrnNo->setDbValue($row['mrnNo']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->patient_name->setDbValue($row['patient_name']);
		$this->mobileno->setDbValue($row['mobileno']);
		$this->gender->setDbValue($row['gender']);
		$this->age->setDbValue($row['age']);
		$this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
		$this->PaymentCategory->setDbValue($row['PaymentCategory']);
		$this->physician_id->setDbValue($row['physician_id']);
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
		$this->profilePic->setDbValue($row['profilePic']);
		$this->HospID->setDbValue($row['HospID']);
		$this->DOB->setDbValue($row['DOB']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		if (array_key_exists('EV__ReferedByDr', $rs->fields)) {
			$this->ReferedByDr->VirtualValue = $rs->fields('EV__ReferedByDr'); // Set up virtual field value
		} else {
			$this->ReferedByDr->VirtualValue = ""; // Clear value
		}
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		if (array_key_exists('EV__ReferA4TreatingConsultant', $rs->fields)) {
			$this->ReferA4TreatingConsultant->VirtualValue = $rs->fields('EV__ReferA4TreatingConsultant'); // Set up virtual field value
		} else {
			$this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
		}
		$this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
		$this->BillClosing->setDbValue($row['BillClosing']);
		$this->BillClosingDate->setDbValue($row['BillClosingDate']);
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->ClosingAmount->setDbValue($row['ClosingAmount']);
		$this->ClosingType->setDbValue($row['ClosingType']);
		$this->BillAmount->setDbValue($row['BillAmount']);
		$this->billclosedBy->setDbValue($row['billclosedBy']);
		$this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
		$this->ReportHeader->setDbValue($row['ReportHeader']);
		$this->Procedure->setDbValue($row['Procedure']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->Anesthetist->setDbValue($row['Anesthetist']);
		$this->Amound->setDbValue($row['Amound']);
		$this->Package->setDbValue($row['Package']);
		$this->patient_id->setDbValue($row['patient_id']);
		if (array_key_exists('EV__patient_id', $rs->fields)) {
			$this->patient_id->VirtualValue = $rs->fields('EV__patient_id'); // Set up virtual field value
		} else {
			$this->patient_id->VirtualValue = ""; // Clear value
		}
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerMobile->setDbValue($row['PartnerMobile']);
		$this->Cid->setDbValue($row['Cid']);
		$this->PartId->setDbValue($row['PartId']);
		$this->IDProof->setDbValue($row['IDProof']);
		$this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
		$this->Reason->setDbValue($row['Reason']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['mrnNo'] = NULL;
		$row['PatientID'] = NULL;
		$row['patient_name'] = NULL;
		$row['mobileno'] = NULL;
		$row['gender'] = NULL;
		$row['age'] = NULL;
		$row['typeRegsisteration'] = NULL;
		$row['PaymentCategory'] = NULL;
		$row['physician_id'] = NULL;
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
		$row['profilePic'] = NULL;
		$row['HospID'] = NULL;
		$row['DOB'] = NULL;
		$row['ReferedByDr'] = NULL;
		$row['ReferClinicname'] = NULL;
		$row['ReferCity'] = NULL;
		$row['ReferMobileNo'] = NULL;
		$row['ReferA4TreatingConsultant'] = NULL;
		$row['PurposreReferredfor'] = NULL;
		$row['BillClosing'] = NULL;
		$row['BillClosingDate'] = NULL;
		$row['BillNumber'] = NULL;
		$row['ClosingAmount'] = NULL;
		$row['ClosingType'] = NULL;
		$row['BillAmount'] = NULL;
		$row['billclosedBy'] = NULL;
		$row['bllcloseByDate'] = NULL;
		$row['ReportHeader'] = NULL;
		$row['Procedure'] = NULL;
		$row['Consultant'] = NULL;
		$row['Anesthetist'] = NULL;
		$row['Amound'] = NULL;
		$row['Package'] = NULL;
		$row['patient_id'] = NULL;
		$row['PartnerID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerMobile'] = NULL;
		$row['Cid'] = NULL;
		$row['PartId'] = NULL;
		$row['IDProof'] = NULL;
		$row['AdviceToOtherHospital'] = NULL;
		$row['Reason'] = NULL;
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

		if ($this->Amound->FormValue == $this->Amound->CurrentValue && is_numeric(ConvertToFloatString($this->Amound->CurrentValue)))
			$this->Amound->CurrentValue = ConvertToFloatString($this->Amound->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// mrnNo
		// PatientID
		// patient_name
		// mobileno
		// gender
		// age
		// typeRegsisteration
		// PaymentCategory
		// physician_id
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
		// profilePic
		// HospID
		// DOB
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// BillClosing
		// BillClosingDate
		// BillNumber
		// ClosingAmount
		// ClosingType
		// BillAmount
		// billclosedBy
		// bllcloseByDate
		// ReportHeader
		// Procedure
		// Consultant
		// Anesthetist
		// Amound
		// Package
		// patient_id
		// PartnerID
		// PartnerName
		// PartnerMobile
		// Cid
		// PartId
		// IDProof
		// AdviceToOtherHospital
		// Reason

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
			$this->mrnNo->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// patient_name
			$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
			$this->patient_name->ViewCustomAttributes = "";

			// mobileno
			$this->mobileno->ViewValue = $this->mobileno->CurrentValue;
			$this->mobileno->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$curVal = strval($this->gender->CurrentValue);
			if ($curVal != "") {
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->gender->ViewValue = $this->gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gender->ViewValue = $this->gender->CurrentValue;
					}
				}
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewCustomAttributes = "";

			// typeRegsisteration
			$curVal = strval($this->typeRegsisteration->CurrentValue);
			if ($curVal != "") {
				$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
				if ($this->typeRegsisteration->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`RegsistrationType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->typeRegsisteration->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
					}
				}
			} else {
				$this->typeRegsisteration->ViewValue = NULL;
			}
			$this->typeRegsisteration->ViewCustomAttributes = "";

			// PaymentCategory
			$curVal = strval($this->PaymentCategory->CurrentValue);
			if ($curVal != "") {
				$this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
				if ($this->PaymentCategory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Category`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PaymentCategory->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PaymentCategory->ViewValue = $this->PaymentCategory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
					}
				}
			} else {
				$this->PaymentCategory->ViewValue = NULL;
			}
			$this->PaymentCategory->ViewCustomAttributes = "";

			// physician_id
			$curVal = strval($this->physician_id->CurrentValue);
			if ($curVal != "") {
				$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
				if ($this->physician_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->physician_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
					}
				}
			} else {
				$this->physician_id->ViewValue = NULL;
			}
			$this->physician_id->ViewCustomAttributes = "";

			// admission_consultant_id
			$curVal = strval($this->admission_consultant_id->CurrentValue);
			if ($curVal != "") {
				$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
				if ($this->admission_consultant_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->admission_consultant_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
					}
				}
			} else {
				$this->admission_consultant_id->ViewValue = NULL;
			}
			$this->admission_consultant_id->ViewCustomAttributes = "";

			// leading_consultant_id
			$curVal = strval($this->leading_consultant_id->CurrentValue);
			if ($curVal != "") {
				$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->lookupCacheOption($curVal);
				if ($this->leading_consultant_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->leading_consultant_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
					}
				}
			} else {
				$this->leading_consultant_id->ViewValue = NULL;
			}
			$this->leading_consultant_id->ViewCustomAttributes = "";

			// cause
			$this->cause->ViewValue = $this->cause->CurrentValue;
			$this->cause->ViewCustomAttributes = "";

			// admission_date
			$this->admission_date->ViewValue = $this->admission_date->CurrentValue;
			$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 11);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->ViewValue = $this->release_date->CurrentValue;
			$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 17);
			$this->release_date->ViewCustomAttributes = "";

			// PaymentStatus
			$curVal = strval($this->PaymentStatus->CurrentValue);
			if ($curVal != "") {
				$this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
				if ($this->PaymentStatus->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PaymentStatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->PaymentStatus->ViewValue = $this->PaymentStatus->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
					}
				}
			} else {
				$this->PaymentStatus->ViewValue = NULL;
			}
			$this->PaymentStatus->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal != "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->status->ViewValue = $this->status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status->ViewValue = $this->status->CurrentValue;
					}
				}
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

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

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// HospID
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal != "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// DOB
			$this->DOB->ViewValue = $this->DOB->CurrentValue;
			$this->DOB->ViewCustomAttributes = "";

			// ReferedByDr
			if ($this->ReferedByDr->VirtualValue != "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
			} else {
				$curVal = strval($this->ReferedByDr->CurrentValue);
				if ($curVal != "") {
					$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
					if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
						}
					}
				} else {
					$this->ReferedByDr->ViewValue = NULL;
				}
			}
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
			if ($this->ReferA4TreatingConsultant->VirtualValue != "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
			} else {
				$curVal = strval($this->ReferA4TreatingConsultant->CurrentValue);
				if ($curVal != "") {
					$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
					if ($this->ReferA4TreatingConsultant->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
						}
					}
				} else {
					$this->ReferA4TreatingConsultant->ViewValue = NULL;
				}
			}
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// BillClosing
			$this->BillClosing->ViewValue = $this->BillClosing->CurrentValue;
			$this->BillClosing->ViewCustomAttributes = "";

			// BillClosingDate
			$this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
			$this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
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
			$this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
			$this->ReportHeader->ViewCustomAttributes = "";

			// Procedure
			$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
			$this->Procedure->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// Anesthetist
			$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
			$this->Anesthetist->ViewCustomAttributes = "";

			// Amound
			$this->Amound->ViewValue = $this->Amound->CurrentValue;
			$this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
			$this->Amound->ViewCustomAttributes = "";

			// Package
			$this->Package->ViewValue = $this->Package->CurrentValue;
			$this->Package->ViewCustomAttributes = "";

			// patient_id
			if ($this->patient_id->VirtualValue != "") {
				$this->patient_id->ViewValue = $this->patient_id->VirtualValue;
			} else {
				$curVal = strval($this->patient_id->CurrentValue);
				if ($curVal != "") {
					$this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
					if ($this->patient_id->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
						$sqlWrk = $this->patient_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$arwrk[2] = $rswrk->fields('df2');
							$arwrk[3] = $rswrk->fields('df3');
							$this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
						}
					}
				} else {
					$this->patient_id->ViewValue = NULL;
				}
			}
			$this->patient_id->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerMobile
			$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
			$this->PartnerMobile->ViewCustomAttributes = "";

			// Cid
			$this->Cid->ViewValue = $this->Cid->CurrentValue;
			$this->Cid->ViewValue = FormatNumber($this->Cid->ViewValue, 0, -2, -2, -2);
			$this->Cid->ViewCustomAttributes = "";

			// PartId
			$this->PartId->ViewValue = $this->PartId->CurrentValue;
			$this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
			$this->PartId->ViewCustomAttributes = "";

			// IDProof
			$this->IDProof->ViewValue = $this->IDProof->CurrentValue;
			$this->IDProof->ViewCustomAttributes = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
			$this->AdviceToOtherHospital->ViewCustomAttributes = "";

			// Reason
			$this->Reason->ViewValue = $this->Reason->CurrentValue;
			$this->Reason->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";
			$this->mrnNo->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";
			$this->patient_name->TooltipValue = "";

			// mobileno
			$this->mobileno->LinkCustomAttributes = "";
			$this->mobileno->HrefValue = "";
			$this->mobileno->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";
			$this->typeRegsisteration->TooltipValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";
			$this->PaymentCategory->TooltipValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

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

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// DOB
			$this->DOB->LinkCustomAttributes = "";
			$this->DOB->HrefValue = "";
			$this->DOB->TooltipValue = "";

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

			// Procedure
			$this->Procedure->LinkCustomAttributes = "";
			$this->Procedure->HrefValue = "";
			$this->Procedure->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";
			$this->Anesthetist->TooltipValue = "";

			// Amound
			$this->Amound->LinkCustomAttributes = "";
			$this->Amound->HrefValue = "";
			$this->Amound->TooltipValue = "";

			// Package
			$this->Package->LinkCustomAttributes = "";
			$this->Package->HrefValue = "";
			$this->Package->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerMobile
			$this->PartnerMobile->LinkCustomAttributes = "";
			$this->PartnerMobile->HrefValue = "";
			$this->PartnerMobile->TooltipValue = "";

			// Cid
			$this->Cid->LinkCustomAttributes = "";
			$this->Cid->HrefValue = "";
			$this->Cid->TooltipValue = "";

			// PartId
			$this->PartId->LinkCustomAttributes = "";
			$this->PartId->HrefValue = "";
			$this->PartId->TooltipValue = "";

			// IDProof
			$this->IDProof->LinkCustomAttributes = "";
			$this->IDProof->HrefValue = "";
			$this->IDProof->TooltipValue = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->LinkCustomAttributes = "";
			$this->AdviceToOtherHospital->HrefValue = "";
			$this->AdviceToOtherHospital->TooltipValue = "";

			// Reason
			$this->Reason->LinkCustomAttributes = "";
			$this->Reason->HrefValue = "";
			$this->Reason->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->EditAttrs["class"] = "form-control";
			$this->mrnNo->EditCustomAttributes = "";
			if (!$this->mrnNo->Raw)
				$this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
			$this->mrnNo->EditValue = HtmlEncode($this->mrnNo->CurrentValue);
			$this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// patient_name
			$this->patient_name->EditAttrs["class"] = "form-control";
			$this->patient_name->EditCustomAttributes = "";
			if (!$this->patient_name->Raw)
				$this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
			$this->patient_name->EditValue = HtmlEncode($this->patient_name->CurrentValue);
			$this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

			// mobileno
			$this->mobileno->EditAttrs["class"] = "form-control";
			$this->mobileno->EditCustomAttributes = "";
			if (!$this->mobileno->Raw)
				$this->mobileno->CurrentValue = HtmlDecode($this->mobileno->CurrentValue);
			$this->mobileno->EditValue = HtmlEncode($this->mobileno->CurrentValue);
			$this->mobileno->PlaceHolder = RemoveHtml($this->mobileno->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			if (!$this->gender->Raw)
				$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
			$this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
			$curVal = strval($this->gender->CurrentValue);
			if ($curVal != "") {
				$this->gender->EditValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->gender->EditValue = $this->gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
					}
				}
			} else {
				$this->gender->EditValue = NULL;
			}
			$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

			// age
			$this->age->EditAttrs["class"] = "form-control";
			$this->age->EditCustomAttributes = "";
			if (!$this->age->Raw)
				$this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
			$this->age->EditValue = HtmlEncode($this->age->CurrentValue);
			$this->age->PlaceHolder = RemoveHtml($this->age->caption());

			// typeRegsisteration
			$this->typeRegsisteration->EditAttrs["class"] = "form-control";
			$this->typeRegsisteration->EditCustomAttributes = "";
			$curVal = trim(strval($this->typeRegsisteration->CurrentValue));
			if ($curVal != "")
				$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
			else
				$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->Lookup !== NULL && is_array($this->typeRegsisteration->Lookup->Options) ? $curVal : NULL;
			if ($this->typeRegsisteration->ViewValue !== NULL) { // Load from cache
				$this->typeRegsisteration->EditValue = array_values($this->typeRegsisteration->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`RegsistrationType`" . SearchString("=", $this->typeRegsisteration->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->typeRegsisteration->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->typeRegsisteration->EditValue = $arwrk;
			}

			// PaymentCategory
			$this->PaymentCategory->EditAttrs["class"] = "form-control";
			$this->PaymentCategory->EditCustomAttributes = "";
			$curVal = trim(strval($this->PaymentCategory->CurrentValue));
			if ($curVal != "")
				$this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
			else
				$this->PaymentCategory->ViewValue = $this->PaymentCategory->Lookup !== NULL && is_array($this->PaymentCategory->Lookup->Options) ? $curVal : NULL;
			if ($this->PaymentCategory->ViewValue !== NULL) { // Load from cache
				$this->PaymentCategory->EditValue = array_values($this->PaymentCategory->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Category`" . SearchString("=", $this->PaymentCategory->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PaymentCategory->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PaymentCategory->EditValue = $arwrk;
			}

			// physician_id
			$this->physician_id->EditAttrs["class"] = "form-control";
			$this->physician_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->physician_id->CurrentValue));
			if ($curVal != "")
				$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
			else
				$this->physician_id->ViewValue = $this->physician_id->Lookup !== NULL && is_array($this->physician_id->Lookup->Options) ? $curVal : NULL;
			if ($this->physician_id->ViewValue !== NULL) { // Load from cache
				$this->physician_id->EditValue = array_values($this->physician_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->physician_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->physician_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->physician_id->EditValue = $arwrk;
			}

			// admission_consultant_id
			$this->admission_consultant_id->EditAttrs["class"] = "form-control";
			$this->admission_consultant_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->admission_consultant_id->CurrentValue));
			if ($curVal != "")
				$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
			else
				$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->Lookup !== NULL && is_array($this->admission_consultant_id->Lookup->Options) ? $curVal : NULL;
			if ($this->admission_consultant_id->ViewValue !== NULL) { // Load from cache
				$this->admission_consultant_id->EditValue = array_values($this->admission_consultant_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->admission_consultant_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->admission_consultant_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->admission_consultant_id->EditValue = $arwrk;
			}

			// leading_consultant_id
			$this->leading_consultant_id->EditAttrs["class"] = "form-control";
			$this->leading_consultant_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->leading_consultant_id->CurrentValue));
			if ($curVal != "")
				$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->lookupCacheOption($curVal);
			else
				$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->Lookup !== NULL && is_array($this->leading_consultant_id->Lookup->Options) ? $curVal : NULL;
			if ($this->leading_consultant_id->ViewValue !== NULL) { // Load from cache
				$this->leading_consultant_id->EditValue = array_values($this->leading_consultant_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->leading_consultant_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->leading_consultant_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->leading_consultant_id->EditValue = $arwrk;
			}

			// cause
			$this->cause->EditAttrs["class"] = "form-control";
			$this->cause->EditCustomAttributes = "";
			$this->cause->EditValue = HtmlEncode($this->cause->CurrentValue);
			$this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

			// admission_date
			$this->admission_date->EditAttrs["class"] = "form-control";
			$this->admission_date->EditCustomAttributes = "";
			$this->admission_date->EditValue = HtmlEncode(FormatDateTime($this->admission_date->CurrentValue, 11));
			$this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

			// release_date
			$this->release_date->EditAttrs["class"] = "form-control";
			$this->release_date->EditCustomAttributes = "";
			$this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 17));
			$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			$curVal = trim(strval($this->PaymentStatus->CurrentValue));
			if ($curVal != "")
				$this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
			else
				$this->PaymentStatus->ViewValue = $this->PaymentStatus->Lookup !== NULL && is_array($this->PaymentStatus->Lookup->Options) ? $curVal : NULL;
			if ($this->PaymentStatus->ViewValue !== NULL) { // Load from cache
				$this->PaymentStatus->EditValue = array_values($this->PaymentStatus->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PaymentStatus->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PaymentStatus->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PaymentStatus->EditValue = $arwrk;
			}

			// status
			// modifiedby
			// modifieddatetime
			// profilePic

			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// HospID
			// DOB

			$this->DOB->EditAttrs["class"] = "form-control";
			$this->DOB->EditCustomAttributes = "";
			if (!$this->DOB->Raw)
				$this->DOB->CurrentValue = HtmlDecode($this->DOB->CurrentValue);
			$this->DOB->EditValue = HtmlEncode($this->DOB->CurrentValue);
			$this->DOB->PlaceHolder = RemoveHtml($this->DOB->caption());

			// ReferedByDr
			$this->ReferedByDr->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferedByDr->CurrentValue));
			if ($curVal != "")
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
			else
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->Lookup !== NULL && is_array($this->ReferedByDr->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferedByDr->ViewValue !== NULL) { // Load from cache
				$this->ReferedByDr->EditValue = array_values($this->ReferedByDr->Lookup->Options);
				if ($this->ReferedByDr->ViewValue == "")
					$this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->ReferedByDr->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferedByDr->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
				} else {
					$this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ReferedByDr->EditValue = $arwrk;
			}

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			if (!$this->ReferClinicname->Raw)
				$this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
			$this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->CurrentValue);
			$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			if (!$this->ReferCity->Raw)
				$this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
			$this->ReferCity->EditValue = HtmlEncode($this->ReferCity->CurrentValue);
			$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			if (!$this->ReferMobileNo->Raw)
				$this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
			$this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->CurrentValue);
			$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
			if ($curVal != "")
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
			else
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->Lookup !== NULL && is_array($this->ReferA4TreatingConsultant->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferA4TreatingConsultant->ViewValue !== NULL) { // Load from cache
				$this->ReferA4TreatingConsultant->EditValue = array_values($this->ReferA4TreatingConsultant->Lookup->Options);
				if ($this->ReferA4TreatingConsultant->ViewValue == "")
					$this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->ReferA4TreatingConsultant->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
				} else {
					$this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ReferA4TreatingConsultant->EditValue = $arwrk;
			}

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (!$this->PurposreReferredfor->Raw)
				$this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// BillClosing
			$this->BillClosing->EditAttrs["class"] = "form-control";
			$this->BillClosing->EditCustomAttributes = "";
			if (!$this->BillClosing->Raw)
				$this->BillClosing->CurrentValue = HtmlDecode($this->BillClosing->CurrentValue);
			$this->BillClosing->EditValue = HtmlEncode($this->BillClosing->CurrentValue);
			$this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

			// BillClosingDate
			$this->BillClosingDate->EditAttrs["class"] = "form-control";
			$this->BillClosingDate->EditCustomAttributes = "";
			$this->BillClosingDate->EditValue = HtmlEncode(FormatDateTime($this->BillClosingDate->CurrentValue, 8));
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
			$this->billclosedBy->EditAttrs["class"] = "form-control";
			$this->billclosedBy->EditCustomAttributes = "";
			if (!$this->billclosedBy->Raw)
				$this->billclosedBy->CurrentValue = HtmlDecode($this->billclosedBy->CurrentValue);
			$this->billclosedBy->EditValue = HtmlEncode($this->billclosedBy->CurrentValue);
			$this->billclosedBy->PlaceHolder = RemoveHtml($this->billclosedBy->caption());

			// bllcloseByDate
			$this->bllcloseByDate->EditAttrs["class"] = "form-control";
			$this->bllcloseByDate->EditCustomAttributes = "";
			$this->bllcloseByDate->EditValue = HtmlEncode(FormatDateTime($this->bllcloseByDate->CurrentValue, 8));
			$this->bllcloseByDate->PlaceHolder = RemoveHtml($this->bllcloseByDate->caption());

			// ReportHeader
			$this->ReportHeader->EditAttrs["class"] = "form-control";
			$this->ReportHeader->EditCustomAttributes = "";
			if (!$this->ReportHeader->Raw)
				$this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
			$this->ReportHeader->EditValue = HtmlEncode($this->ReportHeader->CurrentValue);
			$this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

			// Procedure
			$this->Procedure->EditAttrs["class"] = "form-control";
			$this->Procedure->EditCustomAttributes = "";
			if (!$this->Procedure->Raw)
				$this->Procedure->CurrentValue = HtmlDecode($this->Procedure->CurrentValue);
			$this->Procedure->EditValue = HtmlEncode($this->Procedure->CurrentValue);
			$this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			if (!$this->Consultant->Raw)
				$this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
			$this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
			$this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

			// Anesthetist
			$this->Anesthetist->EditAttrs["class"] = "form-control";
			$this->Anesthetist->EditCustomAttributes = "";
			if (!$this->Anesthetist->Raw)
				$this->Anesthetist->CurrentValue = HtmlDecode($this->Anesthetist->CurrentValue);
			$this->Anesthetist->EditValue = HtmlEncode($this->Anesthetist->CurrentValue);
			$this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

			// Amound
			$this->Amound->EditAttrs["class"] = "form-control";
			$this->Amound->EditCustomAttributes = "";
			$this->Amound->EditValue = HtmlEncode($this->Amound->CurrentValue);
			$this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());
			if (strval($this->Amound->EditValue) != "" && is_numeric($this->Amound->EditValue))
				$this->Amound->EditValue = FormatNumber($this->Amound->EditValue, -2, -2, -2, -2);
			

			// Package
			$this->Package->EditAttrs["class"] = "form-control";
			$this->Package->EditCustomAttributes = "";
			if (!$this->Package->Raw)
				$this->Package->CurrentValue = HtmlDecode($this->Package->CurrentValue);
			$this->Package->EditValue = HtmlEncode($this->Package->CurrentValue);
			$this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

			// patient_id
			$this->patient_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient_id->CurrentValue));
			if ($curVal != "")
				$this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
			else
				$this->patient_id->ViewValue = $this->patient_id->Lookup !== NULL && is_array($this->patient_id->Lookup->Options) ? $curVal : NULL;
			if ($this->patient_id->ViewValue !== NULL) { // Load from cache
				$this->patient_id->EditValue = array_values($this->patient_id->Lookup->Options);
				if ($this->patient_id->ViewValue == "")
					$this->patient_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->patient_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
				} else {
					$this->patient_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->patient_id->EditValue = $arwrk;
			}

			// PartnerID
			$this->PartnerID->EditAttrs["class"] = "form-control";
			$this->PartnerID->EditCustomAttributes = "";
			if (!$this->PartnerID->Raw)
				$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
			$this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
			$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (!$this->PartnerName->Raw)
				$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PartnerMobile
			$this->PartnerMobile->EditAttrs["class"] = "form-control";
			$this->PartnerMobile->EditCustomAttributes = "";
			if (!$this->PartnerMobile->Raw)
				$this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
			$this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->CurrentValue);
			$this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

			// Cid
			$this->Cid->EditAttrs["class"] = "form-control";
			$this->Cid->EditCustomAttributes = "";
			$this->Cid->EditValue = HtmlEncode($this->Cid->CurrentValue);
			$this->Cid->PlaceHolder = RemoveHtml($this->Cid->caption());

			// PartId
			$this->PartId->EditAttrs["class"] = "form-control";
			$this->PartId->EditCustomAttributes = "";
			$this->PartId->EditValue = HtmlEncode($this->PartId->CurrentValue);
			$this->PartId->PlaceHolder = RemoveHtml($this->PartId->caption());

			// IDProof
			$this->IDProof->EditAttrs["class"] = "form-control";
			$this->IDProof->EditCustomAttributes = "";
			if (!$this->IDProof->Raw)
				$this->IDProof->CurrentValue = HtmlDecode($this->IDProof->CurrentValue);
			$this->IDProof->EditValue = HtmlEncode($this->IDProof->CurrentValue);
			$this->IDProof->PlaceHolder = RemoveHtml($this->IDProof->caption());

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
			$this->AdviceToOtherHospital->EditCustomAttributes = "";
			if (!$this->AdviceToOtherHospital->Raw)
				$this->AdviceToOtherHospital->CurrentValue = HtmlDecode($this->AdviceToOtherHospital->CurrentValue);
			$this->AdviceToOtherHospital->EditValue = HtmlEncode($this->AdviceToOtherHospital->CurrentValue);
			$this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

			// Reason
			$this->Reason->EditAttrs["class"] = "form-control";
			$this->Reason->EditCustomAttributes = "";
			$this->Reason->EditValue = HtmlEncode($this->Reason->CurrentValue);
			$this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";

			// mobileno
			$this->mobileno->LinkCustomAttributes = "";
			$this->mobileno->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";

			// admission_consultant_id
			$this->admission_consultant_id->LinkCustomAttributes = "";
			$this->admission_consultant_id->HrefValue = "";

			// leading_consultant_id
			$this->leading_consultant_id->LinkCustomAttributes = "";
			$this->leading_consultant_id->HrefValue = "";

			// cause
			$this->cause->LinkCustomAttributes = "";
			$this->cause->HrefValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// DOB
			$this->DOB->LinkCustomAttributes = "";
			$this->DOB->HrefValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";

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

			// Procedure
			$this->Procedure->LinkCustomAttributes = "";
			$this->Procedure->HrefValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";

			// Amound
			$this->Amound->LinkCustomAttributes = "";
			$this->Amound->HrefValue = "";

			// Package
			$this->Package->LinkCustomAttributes = "";
			$this->Package->HrefValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// PartnerMobile
			$this->PartnerMobile->LinkCustomAttributes = "";
			$this->PartnerMobile->HrefValue = "";

			// Cid
			$this->Cid->LinkCustomAttributes = "";
			$this->Cid->HrefValue = "";

			// PartId
			$this->PartId->LinkCustomAttributes = "";
			$this->PartId->HrefValue = "";

			// IDProof
			$this->IDProof->LinkCustomAttributes = "";
			$this->IDProof->HrefValue = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->LinkCustomAttributes = "";
			$this->AdviceToOtherHospital->HrefValue = "";

			// Reason
			$this->Reason->LinkCustomAttributes = "";
			$this->Reason->HrefValue = "";
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
		if ($this->mrnNo->Required) {
			if (!$this->mrnNo->IsDetailKey && $this->mrnNo->FormValue != NULL && $this->mrnNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnNo->caption(), $this->mrnNo->RequiredErrorMessage));
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
		if ($this->mobileno->Required) {
			if (!$this->mobileno->IsDetailKey && $this->mobileno->FormValue != NULL && $this->mobileno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobileno->caption(), $this->mobileno->RequiredErrorMessage));
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
		if ($this->physician_id->Required) {
			if (!$this->physician_id->IsDetailKey && $this->physician_id->FormValue != NULL && $this->physician_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
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
		if (!CheckEuroDate($this->admission_date->FormValue)) {
			AddMessage($FormError, $this->admission_date->errorMessage());
		}
		if ($this->release_date->Required) {
			if (!$this->release_date->IsDetailKey && $this->release_date->FormValue != NULL && $this->release_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->release_date->caption(), $this->release_date->RequiredErrorMessage));
			}
		}
		if (!CheckShortEuroDate($this->release_date->FormValue)) {
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
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->DOB->Required) {
			if (!$this->DOB->IsDetailKey && $this->DOB->FormValue != NULL && $this->DOB->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DOB->caption(), $this->DOB->RequiredErrorMessage));
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
		if (!CheckDate($this->BillClosingDate->FormValue)) {
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
		if (!CheckDate($this->bllcloseByDate->FormValue)) {
			AddMessage($FormError, $this->bllcloseByDate->errorMessage());
		}
		if ($this->ReportHeader->Required) {
			if (!$this->ReportHeader->IsDetailKey && $this->ReportHeader->FormValue != NULL && $this->ReportHeader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
			}
		}
		if ($this->Procedure->Required) {
			if (!$this->Procedure->IsDetailKey && $this->Procedure->FormValue != NULL && $this->Procedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Procedure->caption(), $this->Procedure->RequiredErrorMessage));
			}
		}
		if ($this->Consultant->Required) {
			if (!$this->Consultant->IsDetailKey && $this->Consultant->FormValue != NULL && $this->Consultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
			}
		}
		if ($this->Anesthetist->Required) {
			if (!$this->Anesthetist->IsDetailKey && $this->Anesthetist->FormValue != NULL && $this->Anesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
			}
		}
		if ($this->Amound->Required) {
			if (!$this->Amound->IsDetailKey && $this->Amound->FormValue != NULL && $this->Amound->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amound->caption(), $this->Amound->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Amound->FormValue)) {
			AddMessage($FormError, $this->Amound->errorMessage());
		}
		if ($this->Package->Required) {
			if (!$this->Package->IsDetailKey && $this->Package->FormValue != NULL && $this->Package->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Package->caption(), $this->Package->RequiredErrorMessage));
			}
		}
		if ($this->patient_id->Required) {
			if (!$this->patient_id->IsDetailKey && $this->patient_id->FormValue != NULL && $this->patient_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
			}
		}
		if ($this->PartnerID->Required) {
			if (!$this->PartnerID->IsDetailKey && $this->PartnerID->FormValue != NULL && $this->PartnerID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
			}
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->PartnerMobile->Required) {
			if (!$this->PartnerMobile->IsDetailKey && $this->PartnerMobile->FormValue != NULL && $this->PartnerMobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerMobile->caption(), $this->PartnerMobile->RequiredErrorMessage));
			}
		}
		if ($this->Cid->Required) {
			if (!$this->Cid->IsDetailKey && $this->Cid->FormValue != NULL && $this->Cid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cid->caption(), $this->Cid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Cid->FormValue)) {
			AddMessage($FormError, $this->Cid->errorMessage());
		}
		if ($this->PartId->Required) {
			if (!$this->PartId->IsDetailKey && $this->PartId->FormValue != NULL && $this->PartId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartId->caption(), $this->PartId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PartId->FormValue)) {
			AddMessage($FormError, $this->PartId->errorMessage());
		}
		if ($this->IDProof->Required) {
			if (!$this->IDProof->IsDetailKey && $this->IDProof->FormValue != NULL && $this->IDProof->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IDProof->caption(), $this->IDProof->RequiredErrorMessage));
			}
		}
		if ($this->AdviceToOtherHospital->Required) {
			if (!$this->AdviceToOtherHospital->IsDetailKey && $this->AdviceToOtherHospital->FormValue != NULL && $this->AdviceToOtherHospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdviceToOtherHospital->caption(), $this->AdviceToOtherHospital->RequiredErrorMessage));
			}
		}
		if ($this->Reason->Required) {
			if (!$this->Reason->IsDetailKey && $this->Reason->FormValue != NULL && $this->Reason->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reason->caption(), $this->Reason->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("patient_vitals", $detailTblVar) && $GLOBALS["patient_vitals"]->DetailEdit) {
			if (!isset($GLOBALS["patient_vitals_grid"]))
				$GLOBALS["patient_vitals_grid"] = new patient_vitals_grid(); // Get detail page object
			$GLOBALS["patient_vitals_grid"]->validateGridForm();
		}
		if (in_array("patient_history", $detailTblVar) && $GLOBALS["patient_history"]->DetailEdit) {
			if (!isset($GLOBALS["patient_history_grid"]))
				$GLOBALS["patient_history_grid"] = new patient_history_grid(); // Get detail page object
			$GLOBALS["patient_history_grid"]->validateGridForm();
		}
		if (in_array("patient_provisional_diagnosis", $detailTblVar) && $GLOBALS["patient_provisional_diagnosis"]->DetailEdit) {
			if (!isset($GLOBALS["patient_provisional_diagnosis_grid"]))
				$GLOBALS["patient_provisional_diagnosis_grid"] = new patient_provisional_diagnosis_grid(); // Get detail page object
			$GLOBALS["patient_provisional_diagnosis_grid"]->validateGridForm();
		}
		if (in_array("patient_prescription", $detailTblVar) && $GLOBALS["patient_prescription"]->DetailEdit) {
			if (!isset($GLOBALS["patient_prescription_grid"]))
				$GLOBALS["patient_prescription_grid"] = new patient_prescription_grid(); // Get detail page object
			$GLOBALS["patient_prescription_grid"]->validateGridForm();
		}
		if (in_array("patient_final_diagnosis", $detailTblVar) && $GLOBALS["patient_final_diagnosis"]->DetailEdit) {
			if (!isset($GLOBALS["patient_final_diagnosis_grid"]))
				$GLOBALS["patient_final_diagnosis_grid"] = new patient_final_diagnosis_grid(); // Get detail page object
			$GLOBALS["patient_final_diagnosis_grid"]->validateGridForm();
		}
		if (in_array("patient_follow_up", $detailTblVar) && $GLOBALS["patient_follow_up"]->DetailEdit) {
			if (!isset($GLOBALS["patient_follow_up_grid"]))
				$GLOBALS["patient_follow_up_grid"] = new patient_follow_up_grid(); // Get detail page object
			$GLOBALS["patient_follow_up_grid"]->validateGridForm();
		}
		if (in_array("patient_ot_delivery_register", $detailTblVar) && $GLOBALS["patient_ot_delivery_register"]->DetailEdit) {
			if (!isset($GLOBALS["patient_ot_delivery_register_grid"]))
				$GLOBALS["patient_ot_delivery_register_grid"] = new patient_ot_delivery_register_grid(); // Get detail page object
			$GLOBALS["patient_ot_delivery_register_grid"]->validateGridForm();
		}
		if (in_array("patient_ot_surgery_register", $detailTblVar) && $GLOBALS["patient_ot_surgery_register"]->DetailEdit) {
			if (!isset($GLOBALS["patient_ot_surgery_register_grid"]))
				$GLOBALS["patient_ot_surgery_register_grid"] = new patient_ot_surgery_register_grid(); // Get detail page object
			$GLOBALS["patient_ot_surgery_register_grid"]->validateGridForm();
		}
		if (in_array("patient_services", $detailTblVar) && $GLOBALS["patient_services"]->DetailEdit) {
			if (!isset($GLOBALS["patient_services_grid"]))
				$GLOBALS["patient_services_grid"] = new patient_services_grid(); // Get detail page object
			$GLOBALS["patient_services_grid"]->validateGridForm();
		}
		if (in_array("patient_investigations", $detailTblVar) && $GLOBALS["patient_investigations"]->DetailEdit) {
			if (!isset($GLOBALS["patient_investigations_grid"]))
				$GLOBALS["patient_investigations_grid"] = new patient_investigations_grid(); // Get detail page object
			$GLOBALS["patient_investigations_grid"]->validateGridForm();
		}
		if (in_array("patient_insurance", $detailTblVar) && $GLOBALS["patient_insurance"]->DetailEdit) {
			if (!isset($GLOBALS["patient_insurance_grid"]))
				$GLOBALS["patient_insurance_grid"] = new patient_insurance_grid(); // Get detail page object
			$GLOBALS["patient_insurance_grid"]->validateGridForm();
		}
		if (in_array("pharmacy_pharled", $detailTblVar) && $GLOBALS["pharmacy_pharled"]->DetailEdit) {
			if (!isset($GLOBALS["pharmacy_pharled_grid"]))
				$GLOBALS["pharmacy_pharled_grid"] = new pharmacy_pharled_grid(); // Get detail page object
			$GLOBALS["pharmacy_pharled_grid"]->validateGridForm();
		}
		if (in_array("view_ip_advance", $detailTblVar) && $GLOBALS["view_ip_advance"]->DetailEdit) {
			if (!isset($GLOBALS["view_ip_advance_grid"]))
				$GLOBALS["view_ip_advance_grid"] = new view_ip_advance_grid(); // Get detail page object
			$GLOBALS["view_ip_advance_grid"]->validateGridForm();
		}
		if (in_array("patient_room", $detailTblVar) && $GLOBALS["patient_room"]->DetailEdit) {
			if (!isset($GLOBALS["patient_room_grid"]))
				$GLOBALS["patient_room_grid"] = new patient_room_grid(); // Get detail page object
			$GLOBALS["patient_room_grid"]->validateGridForm();
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

			// mrnNo
			$this->mrnNo->setDbValueDef($rsnew, $this->mrnNo->CurrentValue, "", $this->mrnNo->ReadOnly);

			// PatientID
			$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, $this->PatientID->ReadOnly);

			// patient_name
			$this->patient_name->setDbValueDef($rsnew, $this->patient_name->CurrentValue, NULL, $this->patient_name->ReadOnly);

			// mobileno
			$this->mobileno->setDbValueDef($rsnew, $this->mobileno->CurrentValue, NULL, $this->mobileno->ReadOnly);

			// gender
			$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, $this->gender->ReadOnly);

			// age
			$this->age->setDbValueDef($rsnew, $this->age->CurrentValue, NULL, $this->age->ReadOnly);

			// typeRegsisteration
			$this->typeRegsisteration->setDbValueDef($rsnew, $this->typeRegsisteration->CurrentValue, NULL, $this->typeRegsisteration->ReadOnly);

			// PaymentCategory
			$this->PaymentCategory->setDbValueDef($rsnew, $this->PaymentCategory->CurrentValue, NULL, $this->PaymentCategory->ReadOnly);

			// physician_id
			$this->physician_id->setDbValueDef($rsnew, $this->physician_id->CurrentValue, NULL, $this->physician_id->ReadOnly);

			// admission_consultant_id
			$this->admission_consultant_id->setDbValueDef($rsnew, $this->admission_consultant_id->CurrentValue, NULL, $this->admission_consultant_id->ReadOnly);

			// leading_consultant_id
			$this->leading_consultant_id->setDbValueDef($rsnew, $this->leading_consultant_id->CurrentValue, NULL, $this->leading_consultant_id->ReadOnly);

			// cause
			$this->cause->setDbValueDef($rsnew, $this->cause->CurrentValue, NULL, $this->cause->ReadOnly);

			// admission_date
			$this->admission_date->setDbValueDef($rsnew, UnFormatDateTime($this->admission_date->CurrentValue, 11), NULL, $this->admission_date->ReadOnly);

			// release_date
			$this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 17), NULL, $this->release_date->ReadOnly);

			// PaymentStatus
			$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, $this->PaymentStatus->ReadOnly);

			// status
			$this->status->CurrentValue = ActiveStatusbit();
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL);

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly);

			// HospID
			$this->HospID->CurrentValue = HospitalID();
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

			// DOB
			$this->DOB->setDbValueDef($rsnew, $this->DOB->CurrentValue, "", $this->DOB->ReadOnly);

			// ReferedByDr
			$this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, NULL, $this->ReferedByDr->ReadOnly);

			// ReferClinicname
			$this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, NULL, $this->ReferClinicname->ReadOnly);

			// ReferCity
			$this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, NULL, $this->ReferCity->ReadOnly);

			// ReferMobileNo
			$this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, NULL, $this->ReferMobileNo->ReadOnly);

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, NULL, $this->ReferA4TreatingConsultant->ReadOnly);

			// PurposreReferredfor
			$this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, NULL, $this->PurposreReferredfor->ReadOnly);

			// BillClosing
			$this->BillClosing->setDbValueDef($rsnew, $this->BillClosing->CurrentValue, NULL, $this->BillClosing->ReadOnly);

			// BillClosingDate
			$this->BillClosingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillClosingDate->CurrentValue, 0), NULL, $this->BillClosingDate->ReadOnly);

			// BillNumber
			$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, $this->BillNumber->ReadOnly);

			// ClosingAmount
			$this->ClosingAmount->setDbValueDef($rsnew, $this->ClosingAmount->CurrentValue, NULL, $this->ClosingAmount->ReadOnly);

			// ClosingType
			$this->ClosingType->setDbValueDef($rsnew, $this->ClosingType->CurrentValue, NULL, $this->ClosingType->ReadOnly);

			// BillAmount
			$this->BillAmount->setDbValueDef($rsnew, $this->BillAmount->CurrentValue, NULL, $this->BillAmount->ReadOnly);

			// billclosedBy
			$this->billclosedBy->setDbValueDef($rsnew, $this->billclosedBy->CurrentValue, NULL, $this->billclosedBy->ReadOnly);

			// bllcloseByDate
			$this->bllcloseByDate->setDbValueDef($rsnew, UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0), NULL, $this->bllcloseByDate->ReadOnly);

			// ReportHeader
			$this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, NULL, $this->ReportHeader->ReadOnly);

			// Procedure
			$this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, NULL, $this->Procedure->ReadOnly);

			// Consultant
			$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, $this->Consultant->ReadOnly);

			// Anesthetist
			$this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, NULL, $this->Anesthetist->ReadOnly);

			// Amound
			$this->Amound->setDbValueDef($rsnew, $this->Amound->CurrentValue, NULL, $this->Amound->ReadOnly);

			// Package
			$this->Package->setDbValueDef($rsnew, $this->Package->CurrentValue, NULL, $this->Package->ReadOnly);

			// patient_id
			$this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, $this->patient_id->ReadOnly);

			// PartnerID
			$this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, NULL, $this->PartnerID->ReadOnly);

			// PartnerName
			$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, $this->PartnerName->ReadOnly);

			// PartnerMobile
			$this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, NULL, $this->PartnerMobile->ReadOnly);

			// Cid
			$this->Cid->setDbValueDef($rsnew, $this->Cid->CurrentValue, NULL, $this->Cid->ReadOnly);

			// PartId
			$this->PartId->setDbValueDef($rsnew, $this->PartId->CurrentValue, NULL, $this->PartId->ReadOnly);

			// IDProof
			$this->IDProof->setDbValueDef($rsnew, $this->IDProof->CurrentValue, NULL, $this->IDProof->ReadOnly);

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->setDbValueDef($rsnew, $this->AdviceToOtherHospital->CurrentValue, NULL, $this->AdviceToOtherHospital->ReadOnly);

			// Reason
			$this->Reason->setDbValueDef($rsnew, $this->Reason->CurrentValue, NULL, $this->Reason->ReadOnly);

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
					if (in_array("patient_vitals", $detailTblVar) && $GLOBALS["patient_vitals"]->DetailEdit) {
						if (!isset($GLOBALS["patient_vitals_grid"]))
							$GLOBALS["patient_vitals_grid"] = new patient_vitals_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_vitals"); // Load user level of detail table
						$editRow = $GLOBALS["patient_vitals_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_history", $detailTblVar) && $GLOBALS["patient_history"]->DetailEdit) {
						if (!isset($GLOBALS["patient_history_grid"]))
							$GLOBALS["patient_history_grid"] = new patient_history_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_history"); // Load user level of detail table
						$editRow = $GLOBALS["patient_history_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_provisional_diagnosis", $detailTblVar) && $GLOBALS["patient_provisional_diagnosis"]->DetailEdit) {
						if (!isset($GLOBALS["patient_provisional_diagnosis_grid"]))
							$GLOBALS["patient_provisional_diagnosis_grid"] = new patient_provisional_diagnosis_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_provisional_diagnosis"); // Load user level of detail table
						$editRow = $GLOBALS["patient_provisional_diagnosis_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_prescription", $detailTblVar) && $GLOBALS["patient_prescription"]->DetailEdit) {
						if (!isset($GLOBALS["patient_prescription_grid"]))
							$GLOBALS["patient_prescription_grid"] = new patient_prescription_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_prescription"); // Load user level of detail table
						$editRow = $GLOBALS["patient_prescription_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_final_diagnosis", $detailTblVar) && $GLOBALS["patient_final_diagnosis"]->DetailEdit) {
						if (!isset($GLOBALS["patient_final_diagnosis_grid"]))
							$GLOBALS["patient_final_diagnosis_grid"] = new patient_final_diagnosis_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_final_diagnosis"); // Load user level of detail table
						$editRow = $GLOBALS["patient_final_diagnosis_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_follow_up", $detailTblVar) && $GLOBALS["patient_follow_up"]->DetailEdit) {
						if (!isset($GLOBALS["patient_follow_up_grid"]))
							$GLOBALS["patient_follow_up_grid"] = new patient_follow_up_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_follow_up"); // Load user level of detail table
						$editRow = $GLOBALS["patient_follow_up_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_ot_delivery_register", $detailTblVar) && $GLOBALS["patient_ot_delivery_register"]->DetailEdit) {
						if (!isset($GLOBALS["patient_ot_delivery_register_grid"]))
							$GLOBALS["patient_ot_delivery_register_grid"] = new patient_ot_delivery_register_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_ot_delivery_register"); // Load user level of detail table
						$editRow = $GLOBALS["patient_ot_delivery_register_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_ot_surgery_register", $detailTblVar) && $GLOBALS["patient_ot_surgery_register"]->DetailEdit) {
						if (!isset($GLOBALS["patient_ot_surgery_register_grid"]))
							$GLOBALS["patient_ot_surgery_register_grid"] = new patient_ot_surgery_register_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_ot_surgery_register"); // Load user level of detail table
						$editRow = $GLOBALS["patient_ot_surgery_register_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_services", $detailTblVar) && $GLOBALS["patient_services"]->DetailEdit) {
						if (!isset($GLOBALS["patient_services_grid"]))
							$GLOBALS["patient_services_grid"] = new patient_services_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_services"); // Load user level of detail table
						$editRow = $GLOBALS["patient_services_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_investigations", $detailTblVar) && $GLOBALS["patient_investigations"]->DetailEdit) {
						if (!isset($GLOBALS["patient_investigations_grid"]))
							$GLOBALS["patient_investigations_grid"] = new patient_investigations_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_investigations"); // Load user level of detail table
						$editRow = $GLOBALS["patient_investigations_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_insurance", $detailTblVar) && $GLOBALS["patient_insurance"]->DetailEdit) {
						if (!isset($GLOBALS["patient_insurance_grid"]))
							$GLOBALS["patient_insurance_grid"] = new patient_insurance_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_insurance"); // Load user level of detail table
						$editRow = $GLOBALS["patient_insurance_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("pharmacy_pharled", $detailTblVar) && $GLOBALS["pharmacy_pharled"]->DetailEdit) {
						if (!isset($GLOBALS["pharmacy_pharled_grid"]))
							$GLOBALS["pharmacy_pharled_grid"] = new pharmacy_pharled_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "pharmacy_pharled"); // Load user level of detail table
						$editRow = $GLOBALS["pharmacy_pharled_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("view_ip_advance", $detailTblVar) && $GLOBALS["view_ip_advance"]->DetailEdit) {
						if (!isset($GLOBALS["view_ip_advance_grid"]))
							$GLOBALS["view_ip_advance_grid"] = new view_ip_advance_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "view_ip_advance"); // Load user level of detail table
						$editRow = $GLOBALS["view_ip_advance_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_room", $detailTblVar) && $GLOBALS["patient_room"]->DetailEdit) {
						if (!isset($GLOBALS["patient_room_grid"]))
							$GLOBALS["patient_room_grid"] = new patient_room_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_room"); // Load user level of detail table
						$editRow = $GLOBALS["patient_room_grid"]->gridUpdate();
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
			if (in_array("patient_vitals", $detailTblVar)) {
				if (!isset($GLOBALS["patient_vitals_grid"]))
					$GLOBALS["patient_vitals_grid"] = new patient_vitals_grid();
				if ($GLOBALS["patient_vitals_grid"]->DetailEdit) {
					$GLOBALS["patient_vitals_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_vitals_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_vitals_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_vitals_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_vitals_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_vitals_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_vitals_grid"]->Reception->setSessionValue($GLOBALS["patient_vitals_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_vitals_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_vitals_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_vitals_grid"]->PatientId->setSessionValue($GLOBALS["patient_vitals_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_vitals_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_vitals_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_vitals_grid"]->mrnno->setSessionValue($GLOBALS["patient_vitals_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_history", $detailTblVar)) {
				if (!isset($GLOBALS["patient_history_grid"]))
					$GLOBALS["patient_history_grid"] = new patient_history_grid();
				if ($GLOBALS["patient_history_grid"]->DetailEdit) {
					$GLOBALS["patient_history_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_history_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_history_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_history_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_history_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_history_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_history_grid"]->Reception->setSessionValue($GLOBALS["patient_history_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_history_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_history_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_history_grid"]->PatientId->setSessionValue($GLOBALS["patient_history_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_history_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_history_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_history_grid"]->mrnno->setSessionValue($GLOBALS["patient_history_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_provisional_diagnosis", $detailTblVar)) {
				if (!isset($GLOBALS["patient_provisional_diagnosis_grid"]))
					$GLOBALS["patient_provisional_diagnosis_grid"] = new patient_provisional_diagnosis_grid();
				if ($GLOBALS["patient_provisional_diagnosis_grid"]->DetailEdit) {
					$GLOBALS["patient_provisional_diagnosis_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_provisional_diagnosis_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_provisional_diagnosis_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_provisional_diagnosis_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_provisional_diagnosis_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_provisional_diagnosis_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_provisional_diagnosis_grid"]->Reception->setSessionValue($GLOBALS["patient_provisional_diagnosis_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_provisional_diagnosis_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_provisional_diagnosis_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_provisional_diagnosis_grid"]->PatientId->setSessionValue($GLOBALS["patient_provisional_diagnosis_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_provisional_diagnosis_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_provisional_diagnosis_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_provisional_diagnosis_grid"]->mrnno->setSessionValue($GLOBALS["patient_provisional_diagnosis_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_prescription", $detailTblVar)) {
				if (!isset($GLOBALS["patient_prescription_grid"]))
					$GLOBALS["patient_prescription_grid"] = new patient_prescription_grid();
				if ($GLOBALS["patient_prescription_grid"]->DetailEdit) {
					$GLOBALS["patient_prescription_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_prescription_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_prescription_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_prescription_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_prescription_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_prescription_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_prescription_grid"]->Reception->setSessionValue($GLOBALS["patient_prescription_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_prescription_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_prescription_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_prescription_grid"]->PatientId->setSessionValue($GLOBALS["patient_prescription_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_prescription_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_prescription_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_prescription_grid"]->mrnno->setSessionValue($GLOBALS["patient_prescription_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_final_diagnosis", $detailTblVar)) {
				if (!isset($GLOBALS["patient_final_diagnosis_grid"]))
					$GLOBALS["patient_final_diagnosis_grid"] = new patient_final_diagnosis_grid();
				if ($GLOBALS["patient_final_diagnosis_grid"]->DetailEdit) {
					$GLOBALS["patient_final_diagnosis_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_final_diagnosis_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_final_diagnosis_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_final_diagnosis_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_final_diagnosis_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_final_diagnosis_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_final_diagnosis_grid"]->Reception->setSessionValue($GLOBALS["patient_final_diagnosis_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_final_diagnosis_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_final_diagnosis_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_final_diagnosis_grid"]->PatientId->setSessionValue($GLOBALS["patient_final_diagnosis_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_final_diagnosis_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_final_diagnosis_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_final_diagnosis_grid"]->mrnno->setSessionValue($GLOBALS["patient_final_diagnosis_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_follow_up", $detailTblVar)) {
				if (!isset($GLOBALS["patient_follow_up_grid"]))
					$GLOBALS["patient_follow_up_grid"] = new patient_follow_up_grid();
				if ($GLOBALS["patient_follow_up_grid"]->DetailEdit) {
					$GLOBALS["patient_follow_up_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_follow_up_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_follow_up_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_follow_up_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_follow_up_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_follow_up_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_follow_up_grid"]->Reception->setSessionValue($GLOBALS["patient_follow_up_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_follow_up_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_follow_up_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_follow_up_grid"]->PatientId->setSessionValue($GLOBALS["patient_follow_up_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_follow_up_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_follow_up_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_follow_up_grid"]->mrnno->setSessionValue($GLOBALS["patient_follow_up_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_ot_delivery_register", $detailTblVar)) {
				if (!isset($GLOBALS["patient_ot_delivery_register_grid"]))
					$GLOBALS["patient_ot_delivery_register_grid"] = new patient_ot_delivery_register_grid();
				if ($GLOBALS["patient_ot_delivery_register_grid"]->DetailEdit) {
					$GLOBALS["patient_ot_delivery_register_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_ot_delivery_register_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_ot_delivery_register_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_ot_delivery_register_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_ot_delivery_register_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_ot_delivery_register_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_ot_delivery_register_grid"]->Reception->setSessionValue($GLOBALS["patient_ot_delivery_register_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_ot_delivery_register_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_ot_delivery_register_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_ot_delivery_register_grid"]->mrnno->setSessionValue($GLOBALS["patient_ot_delivery_register_grid"]->mrnno->CurrentValue);
					$GLOBALS["patient_ot_delivery_register_grid"]->PId->IsDetailKey = TRUE;
					$GLOBALS["patient_ot_delivery_register_grid"]->PId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_ot_delivery_register_grid"]->PId->setSessionValue($GLOBALS["patient_ot_delivery_register_grid"]->PId->CurrentValue);
				}
			}
			if (in_array("patient_ot_surgery_register", $detailTblVar)) {
				if (!isset($GLOBALS["patient_ot_surgery_register_grid"]))
					$GLOBALS["patient_ot_surgery_register_grid"] = new patient_ot_surgery_register_grid();
				if ($GLOBALS["patient_ot_surgery_register_grid"]->DetailEdit) {
					$GLOBALS["patient_ot_surgery_register_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_ot_surgery_register_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_ot_surgery_register_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_ot_surgery_register_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_ot_surgery_register_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_ot_surgery_register_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_ot_surgery_register_grid"]->Reception->setSessionValue($GLOBALS["patient_ot_surgery_register_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_ot_surgery_register_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_ot_surgery_register_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_ot_surgery_register_grid"]->mrnno->setSessionValue($GLOBALS["patient_ot_surgery_register_grid"]->mrnno->CurrentValue);
					$GLOBALS["patient_ot_surgery_register_grid"]->PId->IsDetailKey = TRUE;
					$GLOBALS["patient_ot_surgery_register_grid"]->PId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_ot_surgery_register_grid"]->PId->setSessionValue($GLOBALS["patient_ot_surgery_register_grid"]->PId->CurrentValue);
				}
			}
			if (in_array("patient_services", $detailTblVar)) {
				if (!isset($GLOBALS["patient_services_grid"]))
					$GLOBALS["patient_services_grid"] = new patient_services_grid();
				if ($GLOBALS["patient_services_grid"]->DetailEdit) {
					$GLOBALS["patient_services_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_services_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_services_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_services_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_services_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_services_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_services_grid"]->Reception->setSessionValue($GLOBALS["patient_services_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_services_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_services_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_services_grid"]->mrnno->setSessionValue($GLOBALS["patient_services_grid"]->mrnno->CurrentValue);
					$GLOBALS["patient_services_grid"]->PatID->IsDetailKey = TRUE;
					$GLOBALS["patient_services_grid"]->PatID->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_services_grid"]->PatID->setSessionValue($GLOBALS["patient_services_grid"]->PatID->CurrentValue);
					$GLOBALS["patient_services_grid"]->Vid->setSessionValue(""); // Clear session key
				}
			}
			if (in_array("patient_investigations", $detailTblVar)) {
				if (!isset($GLOBALS["patient_investigations_grid"]))
					$GLOBALS["patient_investigations_grid"] = new patient_investigations_grid();
				if ($GLOBALS["patient_investigations_grid"]->DetailEdit) {
					$GLOBALS["patient_investigations_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_investigations_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_investigations_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_investigations_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_investigations_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_investigations_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_investigations_grid"]->Reception->setSessionValue($GLOBALS["patient_investigations_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_investigations_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_investigations_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_investigations_grid"]->PatientId->setSessionValue($GLOBALS["patient_investigations_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_investigations_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_investigations_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_investigations_grid"]->mrnno->setSessionValue($GLOBALS["patient_investigations_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("patient_insurance", $detailTblVar)) {
				if (!isset($GLOBALS["patient_insurance_grid"]))
					$GLOBALS["patient_insurance_grid"] = new patient_insurance_grid();
				if ($GLOBALS["patient_insurance_grid"]->DetailEdit) {
					$GLOBALS["patient_insurance_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_insurance_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_insurance_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_insurance_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_insurance_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_insurance_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_insurance_grid"]->Reception->setSessionValue($GLOBALS["patient_insurance_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_insurance_grid"]->PatientId->IsDetailKey = TRUE;
					$GLOBALS["patient_insurance_grid"]->PatientId->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_insurance_grid"]->PatientId->setSessionValue($GLOBALS["patient_insurance_grid"]->PatientId->CurrentValue);
					$GLOBALS["patient_insurance_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_insurance_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_insurance_grid"]->mrnno->setSessionValue($GLOBALS["patient_insurance_grid"]->mrnno->CurrentValue);
				}
			}
			if (in_array("pharmacy_pharled", $detailTblVar)) {
				if (!isset($GLOBALS["pharmacy_pharled_grid"]))
					$GLOBALS["pharmacy_pharled_grid"] = new pharmacy_pharled_grid();
				if ($GLOBALS["pharmacy_pharled_grid"]->DetailEdit) {
					$GLOBALS["pharmacy_pharled_grid"]->CurrentMode = "edit";
					$GLOBALS["pharmacy_pharled_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["pharmacy_pharled_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["pharmacy_pharled_grid"]->setStartRecordNumber(1);
					$GLOBALS["pharmacy_pharled_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["pharmacy_pharled_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["pharmacy_pharled_grid"]->mrnno->setSessionValue($GLOBALS["pharmacy_pharled_grid"]->mrnno->CurrentValue);
					$GLOBALS["pharmacy_pharled_grid"]->PatID->IsDetailKey = TRUE;
					$GLOBALS["pharmacy_pharled_grid"]->PatID->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["pharmacy_pharled_grid"]->PatID->setSessionValue($GLOBALS["pharmacy_pharled_grid"]->PatID->CurrentValue);
					$GLOBALS["pharmacy_pharled_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["pharmacy_pharled_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["pharmacy_pharled_grid"]->Reception->setSessionValue($GLOBALS["pharmacy_pharled_grid"]->Reception->CurrentValue);
					$GLOBALS["pharmacy_pharled_grid"]->pbv->setSessionValue(""); // Clear session key
					$GLOBALS["pharmacy_pharled_grid"]->pbt->setSessionValue(""); // Clear session key
				}
			}
			if (in_array("view_ip_advance", $detailTblVar)) {
				if (!isset($GLOBALS["view_ip_advance_grid"]))
					$GLOBALS["view_ip_advance_grid"] = new view_ip_advance_grid();
				if ($GLOBALS["view_ip_advance_grid"]->DetailEdit) {
					$GLOBALS["view_ip_advance_grid"]->CurrentMode = "edit";
					$GLOBALS["view_ip_advance_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["view_ip_advance_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["view_ip_advance_grid"]->setStartRecordNumber(1);
					$GLOBALS["view_ip_advance_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["view_ip_advance_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["view_ip_advance_grid"]->mrnno->setSessionValue($GLOBALS["view_ip_advance_grid"]->mrnno->CurrentValue);
					$GLOBALS["view_ip_advance_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["view_ip_advance_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["view_ip_advance_grid"]->Reception->setSessionValue($GLOBALS["view_ip_advance_grid"]->Reception->CurrentValue);
					$GLOBALS["view_ip_advance_grid"]->PatID->IsDetailKey = TRUE;
					$GLOBALS["view_ip_advance_grid"]->PatID->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["view_ip_advance_grid"]->PatID->setSessionValue($GLOBALS["view_ip_advance_grid"]->PatID->CurrentValue);
				}
			}
			if (in_array("patient_room", $detailTblVar)) {
				if (!isset($GLOBALS["patient_room_grid"]))
					$GLOBALS["patient_room_grid"] = new patient_room_grid();
				if ($GLOBALS["patient_room_grid"]->DetailEdit) {
					$GLOBALS["patient_room_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_room_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_room_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_room_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_room_grid"]->Reception->IsDetailKey = TRUE;
					$GLOBALS["patient_room_grid"]->Reception->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_room_grid"]->Reception->setSessionValue($GLOBALS["patient_room_grid"]->Reception->CurrentValue);
					$GLOBALS["patient_room_grid"]->mrnno->IsDetailKey = TRUE;
					$GLOBALS["patient_room_grid"]->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
					$GLOBALS["patient_room_grid"]->mrnno->setSessionValue($GLOBALS["patient_room_grid"]->mrnno->CurrentValue);
					$GLOBALS["patient_room_grid"]->PatID->IsDetailKey = TRUE;
					$GLOBALS["patient_room_grid"]->PatID->CurrentValue = $this->patient_id->CurrentValue;
					$GLOBALS["patient_room_grid"]->PatID->setSessionValue($GLOBALS["patient_room_grid"]->PatID->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ip_admissionlist.php"), "", $this->TableVar, TRUE);
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
				case "x_gender":
					break;
				case "x_typeRegsisteration":
					break;
				case "x_PaymentCategory":
					break;
				case "x_physician_id":
					break;
				case "x_admission_consultant_id":
					break;
				case "x_leading_consultant_id":
					break;
				case "x_PaymentStatus":
					break;
				case "x_status":
					break;
				case "x_HospID":
					break;
				case "x_ReferedByDr":
					break;
				case "x_ReferA4TreatingConsultant":
					break;
				case "x_patient_id":
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
						case "x_gender":
							break;
						case "x_typeRegsisteration":
							break;
						case "x_PaymentCategory":
							break;
						case "x_physician_id":
							break;
						case "x_admission_consultant_id":
							break;
						case "x_leading_consultant_id":
							break;
						case "x_PaymentStatus":
							break;
						case "x_status":
							break;
						case "x_HospID":
							break;
						case "x_ReferedByDr":
							break;
						case "x_ReferA4TreatingConsultant":
							break;
						case "x_patient_id":
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
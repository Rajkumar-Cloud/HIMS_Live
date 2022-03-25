<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_ip_patient_admission_add extends view_ip_patient_admission
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_ip_patient_admission';

	// Page object name
	public $PageObjName = "view_ip_patient_admission_add";

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

		// Table object (view_ip_patient_admission)
		if (!isset($GLOBALS["view_ip_patient_admission"]) || get_class($GLOBALS["view_ip_patient_admission"]) == PROJECT_NAMESPACE . "view_ip_patient_admission") {
			$GLOBALS["view_ip_patient_admission"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_ip_patient_admission"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ip_patient_admission');

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
		global $view_ip_patient_admission;
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
				$doc = new $class($view_ip_patient_admission);
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
					if ($pageName == "view_ip_patient_admissionview.php")
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
					$this->terminate(GetUrl("view_ip_patient_admissionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->mrnNo->setVisibility();
		$this->PatientID->setVisibility();
		$this->patient_name->setVisibility();
		$this->mobileno->setVisibility();
		$this->profilePic->setVisibility();
		$this->gender->setVisibility();
		$this->age->setVisibility();
		$this->Package->setVisibility();
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
		$this->physician_id->setVisibility();
		$this->PartnerID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerMobile->setVisibility();
		$this->patient_id->setVisibility();
		$this->Cid->setVisibility();
		$this->PartId->setVisibility();
		$this->IDProof->setVisibility();
		$this->DOB->setVisibility();
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
		$this->setupLookupOptions($this->typeRegsisteration);
		$this->setupLookupOptions($this->PaymentCategory);
		$this->setupLookupOptions($this->PaymentStatus);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->Procedure);
		$this->setupLookupOptions($this->Consultant);
		$this->setupLookupOptions($this->Anesthetist);
		$this->setupLookupOptions($this->physician_id);
		$this->setupLookupOptions($this->patient_id);
		$this->setupLookupOptions($this->Cid);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("view_ip_patient_admissionlist.php");
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
					$this->terminate("view_ip_patient_admissionlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "view_ip_patient_admissionlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "view_ip_patient_admissionview.php")
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
		$this->mrnNo->CurrentValue = NULL;
		$this->mrnNo->OldValue = $this->mrnNo->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->patient_name->CurrentValue = NULL;
		$this->patient_name->OldValue = $this->patient_name->CurrentValue;
		$this->mobileno->CurrentValue = NULL;
		$this->mobileno->OldValue = $this->mobileno->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->gender->CurrentValue = NULL;
		$this->gender->OldValue = $this->gender->CurrentValue;
		$this->age->CurrentValue = NULL;
		$this->age->OldValue = $this->age->CurrentValue;
		$this->Package->CurrentValue = NULL;
		$this->Package->OldValue = $this->Package->CurrentValue;
		$this->typeRegsisteration->CurrentValue = NULL;
		$this->typeRegsisteration->OldValue = $this->typeRegsisteration->CurrentValue;
		$this->PaymentCategory->CurrentValue = NULL;
		$this->PaymentCategory->OldValue = $this->PaymentCategory->CurrentValue;
		$this->admission_consultant_id->CurrentValue = NULL;
		$this->admission_consultant_id->OldValue = $this->admission_consultant_id->CurrentValue;
		$this->leading_consultant_id->CurrentValue = NULL;
		$this->leading_consultant_id->OldValue = $this->leading_consultant_id->CurrentValue;
		$this->cause->CurrentValue = NULL;
		$this->cause->OldValue = $this->cause->CurrentValue;
		$this->admission_date->CurrentValue = NULL;
		$this->admission_date->OldValue = $this->admission_date->CurrentValue;
		$this->release_date->CurrentValue = NULL;
		$this->release_date->OldValue = $this->release_date->CurrentValue;
		$this->PaymentStatus->CurrentValue = NULL;
		$this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
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
		$this->ReferedByDr->CurrentValue = NULL;
		$this->ReferedByDr->OldValue = $this->ReferedByDr->CurrentValue;
		$this->ReferClinicname->CurrentValue = NULL;
		$this->ReferClinicname->OldValue = $this->ReferClinicname->CurrentValue;
		$this->ReferCity->CurrentValue = NULL;
		$this->ReferCity->OldValue = $this->ReferCity->CurrentValue;
		$this->ReferMobileNo->CurrentValue = NULL;
		$this->ReferMobileNo->OldValue = $this->ReferMobileNo->CurrentValue;
		$this->ReferA4TreatingConsultant->CurrentValue = NULL;
		$this->ReferA4TreatingConsultant->OldValue = $this->ReferA4TreatingConsultant->CurrentValue;
		$this->PurposreReferredfor->CurrentValue = NULL;
		$this->PurposreReferredfor->OldValue = $this->PurposreReferredfor->CurrentValue;
		$this->BillClosing->CurrentValue = NULL;
		$this->BillClosing->OldValue = $this->BillClosing->CurrentValue;
		$this->BillClosingDate->CurrentValue = NULL;
		$this->BillClosingDate->OldValue = $this->BillClosingDate->CurrentValue;
		$this->BillNumber->CurrentValue = NULL;
		$this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
		$this->ClosingAmount->CurrentValue = NULL;
		$this->ClosingAmount->OldValue = $this->ClosingAmount->CurrentValue;
		$this->ClosingType->CurrentValue = NULL;
		$this->ClosingType->OldValue = $this->ClosingType->CurrentValue;
		$this->BillAmount->CurrentValue = NULL;
		$this->BillAmount->OldValue = $this->BillAmount->CurrentValue;
		$this->billclosedBy->CurrentValue = NULL;
		$this->billclosedBy->OldValue = $this->billclosedBy->CurrentValue;
		$this->bllcloseByDate->CurrentValue = NULL;
		$this->bllcloseByDate->OldValue = $this->bllcloseByDate->CurrentValue;
		$this->ReportHeader->CurrentValue = NULL;
		$this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
		$this->Procedure->CurrentValue = NULL;
		$this->Procedure->OldValue = $this->Procedure->CurrentValue;
		$this->Consultant->CurrentValue = NULL;
		$this->Consultant->OldValue = $this->Consultant->CurrentValue;
		$this->Anesthetist->CurrentValue = NULL;
		$this->Anesthetist->OldValue = $this->Anesthetist->CurrentValue;
		$this->Amound->CurrentValue = NULL;
		$this->Amound->OldValue = $this->Amound->CurrentValue;
		$this->physician_id->CurrentValue = NULL;
		$this->physician_id->OldValue = $this->physician_id->CurrentValue;
		$this->PartnerID->CurrentValue = NULL;
		$this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
		$this->PartnerName->CurrentValue = NULL;
		$this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
		$this->PartnerMobile->CurrentValue = NULL;
		$this->PartnerMobile->OldValue = $this->PartnerMobile->CurrentValue;
		$this->patient_id->CurrentValue = NULL;
		$this->patient_id->OldValue = $this->patient_id->CurrentValue;
		$this->Cid->CurrentValue = NULL;
		$this->Cid->OldValue = $this->Cid->CurrentValue;
		$this->PartId->CurrentValue = NULL;
		$this->PartId->OldValue = $this->PartId->CurrentValue;
		$this->IDProof->CurrentValue = NULL;
		$this->IDProof->OldValue = $this->IDProof->CurrentValue;
		$this->DOB->CurrentValue = NULL;
		$this->DOB->OldValue = $this->DOB->CurrentValue;
		$this->AdviceToOtherHospital->CurrentValue = NULL;
		$this->AdviceToOtherHospital->OldValue = $this->AdviceToOtherHospital->CurrentValue;
		$this->Reason->CurrentValue = NULL;
		$this->Reason->OldValue = $this->Reason->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

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

		// Check field name 'Package' first before field var 'x_Package'
		$val = $CurrentForm->hasValue("Package") ? $CurrentForm->getValue("Package") : $CurrentForm->getValue("x_Package");
		if (!$this->Package->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Package->Visible = FALSE; // Disable update for API request
			else
				$this->Package->setFormValue($val);
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
			$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 11);
		}

		// Check field name 'release_date' first before field var 'x_release_date'
		$val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
		if (!$this->release_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->release_date->Visible = FALSE; // Disable update for API request
			else
				$this->release_date->setFormValue($val);
			$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 11);
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

		// Check field name 'physician_id' first before field var 'x_physician_id'
		$val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
		if (!$this->physician_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->physician_id->Visible = FALSE; // Disable update for API request
			else
				$this->physician_id->setFormValue($val);
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

		// Check field name 'patient_id' first before field var 'x_patient_id'
		$val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
		if (!$this->patient_id->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_id->Visible = FALSE; // Disable update for API request
			else
				$this->patient_id->setFormValue($val);
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

		// Check field name 'DOB' first before field var 'x_DOB'
		$val = $CurrentForm->hasValue("DOB") ? $CurrentForm->getValue("DOB") : $CurrentForm->getValue("x_DOB");
		if (!$this->DOB->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DOB->Visible = FALSE; // Disable update for API request
			else
				$this->DOB->setFormValue($val);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->patient_name->CurrentValue = $this->patient_name->FormValue;
		$this->mobileno->CurrentValue = $this->mobileno->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->age->CurrentValue = $this->age->FormValue;
		$this->Package->CurrentValue = $this->Package->FormValue;
		$this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
		$this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
		$this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
		$this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
		$this->cause->CurrentValue = $this->cause->FormValue;
		$this->admission_date->CurrentValue = $this->admission_date->FormValue;
		$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 11);
		$this->release_date->CurrentValue = $this->release_date->FormValue;
		$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 11);
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
		$this->physician_id->CurrentValue = $this->physician_id->FormValue;
		$this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
		$this->patient_id->CurrentValue = $this->patient_id->FormValue;
		$this->Cid->CurrentValue = $this->Cid->FormValue;
		$this->PartId->CurrentValue = $this->PartId->FormValue;
		$this->IDProof->CurrentValue = $this->IDProof->FormValue;
		$this->DOB->CurrentValue = $this->DOB->FormValue;
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
		$this->profilePic->setDbValue($row['profilePic']);
		$this->gender->setDbValue($row['gender']);
		$this->age->setDbValue($row['age']);
		$this->Package->setDbValue($row['Package']);
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
		$this->physician_id->setDbValue($row['physician_id']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerMobile->setDbValue($row['PartnerMobile']);
		$this->patient_id->setDbValue($row['patient_id']);
		$this->Cid->setDbValue($row['Cid']);
		$this->PartId->setDbValue($row['PartId']);
		$this->IDProof->setDbValue($row['IDProof']);
		$this->DOB->setDbValue($row['DOB']);
		$this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
		$this->Reason->setDbValue($row['Reason']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['mrnNo'] = $this->mrnNo->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['patient_name'] = $this->patient_name->CurrentValue;
		$row['mobileno'] = $this->mobileno->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['gender'] = $this->gender->CurrentValue;
		$row['age'] = $this->age->CurrentValue;
		$row['Package'] = $this->Package->CurrentValue;
		$row['typeRegsisteration'] = $this->typeRegsisteration->CurrentValue;
		$row['PaymentCategory'] = $this->PaymentCategory->CurrentValue;
		$row['admission_consultant_id'] = $this->admission_consultant_id->CurrentValue;
		$row['leading_consultant_id'] = $this->leading_consultant_id->CurrentValue;
		$row['cause'] = $this->cause->CurrentValue;
		$row['admission_date'] = $this->admission_date->CurrentValue;
		$row['release_date'] = $this->release_date->CurrentValue;
		$row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['ReferedByDr'] = $this->ReferedByDr->CurrentValue;
		$row['ReferClinicname'] = $this->ReferClinicname->CurrentValue;
		$row['ReferCity'] = $this->ReferCity->CurrentValue;
		$row['ReferMobileNo'] = $this->ReferMobileNo->CurrentValue;
		$row['ReferA4TreatingConsultant'] = $this->ReferA4TreatingConsultant->CurrentValue;
		$row['PurposreReferredfor'] = $this->PurposreReferredfor->CurrentValue;
		$row['BillClosing'] = $this->BillClosing->CurrentValue;
		$row['BillClosingDate'] = $this->BillClosingDate->CurrentValue;
		$row['BillNumber'] = $this->BillNumber->CurrentValue;
		$row['ClosingAmount'] = $this->ClosingAmount->CurrentValue;
		$row['ClosingType'] = $this->ClosingType->CurrentValue;
		$row['BillAmount'] = $this->BillAmount->CurrentValue;
		$row['billclosedBy'] = $this->billclosedBy->CurrentValue;
		$row['bllcloseByDate'] = $this->bllcloseByDate->CurrentValue;
		$row['ReportHeader'] = $this->ReportHeader->CurrentValue;
		$row['Procedure'] = $this->Procedure->CurrentValue;
		$row['Consultant'] = $this->Consultant->CurrentValue;
		$row['Anesthetist'] = $this->Anesthetist->CurrentValue;
		$row['Amound'] = $this->Amound->CurrentValue;
		$row['physician_id'] = $this->physician_id->CurrentValue;
		$row['PartnerID'] = $this->PartnerID->CurrentValue;
		$row['PartnerName'] = $this->PartnerName->CurrentValue;
		$row['PartnerMobile'] = $this->PartnerMobile->CurrentValue;
		$row['patient_id'] = $this->patient_id->CurrentValue;
		$row['Cid'] = $this->Cid->CurrentValue;
		$row['PartId'] = $this->PartId->CurrentValue;
		$row['IDProof'] = $this->IDProof->CurrentValue;
		$row['DOB'] = $this->DOB->CurrentValue;
		$row['AdviceToOtherHospital'] = $this->AdviceToOtherHospital->CurrentValue;
		$row['Reason'] = $this->Reason->CurrentValue;
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
		// profilePic
		// gender
		// age
		// Package
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
		// physician_id
		// PartnerID
		// PartnerName
		// PartnerMobile
		// patient_id
		// Cid
		// PartId
		// IDProof
		// DOB
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

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewCustomAttributes = "";

			// Package
			$this->Package->ViewValue = $this->Package->CurrentValue;
			$this->Package->ViewCustomAttributes = "";

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
			$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 11);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->ViewValue = $this->release_date->CurrentValue;
			$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 11);
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

			// ReferedByDr
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

			// BillClosing
			if (strval($this->BillClosing->CurrentValue) != "") {
				$this->BillClosing->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->BillClosing->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->BillClosing->ViewValue->add($this->BillClosing->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->BillClosing->ViewValue = NULL;
			}
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

			// Procedure
			$curVal = strval($this->Procedure->CurrentValue);
			if ($curVal != "") {
				$this->Procedure->ViewValue = $this->Procedure->lookupCacheOption($curVal);
				if ($this->Procedure->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Procedure->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Procedure->ViewValue = $this->Procedure->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
					}
				}
			} else {
				$this->Procedure->ViewValue = NULL;
			}
			$this->Procedure->ViewCustomAttributes = "";

			// Consultant
			$curVal = strval($this->Consultant->CurrentValue);
			if ($curVal != "") {
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
				if ($this->Consultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Consultant->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
					}
				}
			} else {
				$this->Consultant->ViewValue = NULL;
			}
			$this->Consultant->ViewCustomAttributes = "";

			// Anesthetist
			$curVal = strval($this->Anesthetist->CurrentValue);
			if ($curVal != "") {
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
				if ($this->Anesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Anesthetist->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anesthetist->ViewValue = NULL;
			}
			$this->Anesthetist->ViewCustomAttributes = "";

			// Amound
			$this->Amound->ViewValue = $this->Amound->CurrentValue;
			$this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
			$this->Amound->ViewCustomAttributes = "";

			// physician_id
			$curVal = strval($this->physician_id->CurrentValue);
			if ($curVal != "") {
				$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
				if ($this->physician_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->physician_id->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
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

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerMobile
			$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
			$this->PartnerMobile->ViewCustomAttributes = "";

			// patient_id
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
			$this->patient_id->ViewCustomAttributes = "";

			// Cid
			$curVal = strval($this->Cid->CurrentValue);
			if ($curVal != "") {
				$this->Cid->ViewValue = $this->Cid->lookupCacheOption($curVal);
				if ($this->Cid->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Cid->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->Cid->ViewValue = $this->Cid->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Cid->ViewValue = $this->Cid->CurrentValue;
					}
				}
			} else {
				$this->Cid->ViewValue = NULL;
			}
			$this->Cid->ViewCustomAttributes = "";

			// PartId
			$this->PartId->ViewValue = $this->PartId->CurrentValue;
			$this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
			$this->PartId->ViewCustomAttributes = "";

			// IDProof
			$this->IDProof->ViewValue = $this->IDProof->CurrentValue;
			$this->IDProof->ViewCustomAttributes = "";

			// DOB
			$this->DOB->ViewValue = $this->DOB->CurrentValue;
			$this->DOB->ViewCustomAttributes = "";

			// AdviceToOtherHospital
			if (strval($this->AdviceToOtherHospital->CurrentValue) != "") {
				$this->AdviceToOtherHospital->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->AdviceToOtherHospital->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->AdviceToOtherHospital->ViewValue->add($this->AdviceToOtherHospital->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->AdviceToOtherHospital->ViewValue = NULL;
			}
			$this->AdviceToOtherHospital->ViewCustomAttributes = "";

			// Reason
			$this->Reason->ViewValue = $this->Reason->CurrentValue;
			$this->Reason->ViewCustomAttributes = "";

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

			// Package
			$this->Package->LinkCustomAttributes = "";
			$this->Package->HrefValue = "";
			$this->Package->TooltipValue = "";

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

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

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

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

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

			// DOB
			$this->DOB->LinkCustomAttributes = "";
			$this->DOB->HrefValue = "";
			$this->DOB->TooltipValue = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->LinkCustomAttributes = "";
			$this->AdviceToOtherHospital->HrefValue = "";
			$this->AdviceToOtherHospital->TooltipValue = "";

			// Reason
			$this->Reason->LinkCustomAttributes = "";
			$this->Reason->HrefValue = "";
			$this->Reason->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

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

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (!$this->profilePic->Raw)
				$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			if (!$this->gender->Raw)
				$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
			$this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
			$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

			// age
			$this->age->EditAttrs["class"] = "form-control";
			$this->age->EditCustomAttributes = "";
			if (!$this->age->Raw)
				$this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
			$this->age->EditValue = HtmlEncode($this->age->CurrentValue);
			$this->age->PlaceHolder = RemoveHtml($this->age->caption());

			// Package
			$this->Package->EditAttrs["class"] = "form-control";
			$this->Package->EditCustomAttributes = "";
			if (!$this->Package->Raw)
				$this->Package->CurrentValue = HtmlDecode($this->Package->CurrentValue);
			$this->Package->EditValue = HtmlEncode($this->Package->CurrentValue);
			$this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

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

			// admission_consultant_id
			$this->admission_consultant_id->EditAttrs["class"] = "form-control";
			$this->admission_consultant_id->EditCustomAttributes = "";
			$this->admission_consultant_id->EditValue = HtmlEncode($this->admission_consultant_id->CurrentValue);
			$this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

			// leading_consultant_id
			$this->leading_consultant_id->EditAttrs["class"] = "form-control";
			$this->leading_consultant_id->EditCustomAttributes = "";
			$this->leading_consultant_id->EditValue = HtmlEncode($this->leading_consultant_id->CurrentValue);
			$this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

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
			$this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 11));
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
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// HospID
			// ReferedByDr

			$this->ReferedByDr->EditAttrs["class"] = "form-control";
			$this->ReferedByDr->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferedByDr->CurrentValue));
			if ($curVal != "")
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
			else
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->Lookup !== NULL && is_array($this->ReferedByDr->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferedByDr->ViewValue !== NULL) { // Load from cache
				$this->ReferedByDr->EditValue = array_values($this->ReferedByDr->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->ReferedByDr->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferedByDr->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
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
			$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			if (!$this->ReferA4TreatingConsultant->Raw)
				$this->ReferA4TreatingConsultant->CurrentValue = HtmlDecode($this->ReferA4TreatingConsultant->CurrentValue);
			$this->ReferA4TreatingConsultant->EditValue = HtmlEncode($this->ReferA4TreatingConsultant->CurrentValue);
			$this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (!$this->PurposreReferredfor->Raw)
				$this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// BillClosing
			$this->BillClosing->EditCustomAttributes = "";
			$this->BillClosing->EditValue = $this->BillClosing->options(FALSE);

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
			$this->ReportHeader->EditCustomAttributes = "";
			$this->ReportHeader->EditValue = $this->ReportHeader->options(FALSE);

			// Procedure
			$this->Procedure->EditCustomAttributes = "";
			$curVal = trim(strval($this->Procedure->CurrentValue));
			if ($curVal != "")
				$this->Procedure->ViewValue = $this->Procedure->lookupCacheOption($curVal);
			else
				$this->Procedure->ViewValue = $this->Procedure->Lookup !== NULL && is_array($this->Procedure->Lookup->Options) ? $curVal : NULL;
			if ($this->Procedure->ViewValue !== NULL) { // Load from cache
				$this->Procedure->EditValue = array_values($this->Procedure->Lookup->Options);
				if ($this->Procedure->ViewValue == "")
					$this->Procedure->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`SERVICE`" . SearchString("=", $this->Procedure->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Procedure->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Procedure->ViewValue = $this->Procedure->displayValue($arwrk);
				} else {
					$this->Procedure->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Procedure->EditValue = $arwrk;
			}

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->Consultant->CurrentValue));
			if ($curVal != "")
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
			else
				$this->Consultant->ViewValue = $this->Consultant->Lookup !== NULL && is_array($this->Consultant->Lookup->Options) ? $curVal : NULL;
			if ($this->Consultant->ViewValue !== NULL) { // Load from cache
				$this->Consultant->EditValue = array_values($this->Consultant->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Consultant->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Consultant->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Consultant->EditValue = $arwrk;
			}

			// Anesthetist
			$this->Anesthetist->EditAttrs["class"] = "form-control";
			$this->Anesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anesthetist->CurrentValue));
			if ($curVal != "")
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
			else
				$this->Anesthetist->ViewValue = $this->Anesthetist->Lookup !== NULL && is_array($this->Anesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anesthetist->EditValue = array_values($this->Anesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Anesthetist->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Anesthetist->EditValue = $arwrk;
			}

			// Amound
			$this->Amound->EditAttrs["class"] = "form-control";
			$this->Amound->EditCustomAttributes = "";
			$this->Amound->EditValue = HtmlEncode($this->Amound->CurrentValue);
			$this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());
			if (strval($this->Amound->EditValue) != "" && is_numeric($this->Amound->EditValue))
				$this->Amound->EditValue = FormatNumber($this->Amound->EditValue, -2, -2, -2, -2);
			

			// physician_id
			$this->physician_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->physician_id->CurrentValue));
			if ($curVal != "")
				$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
			else
				$this->physician_id->ViewValue = $this->physician_id->Lookup !== NULL && is_array($this->physician_id->Lookup->Options) ? $curVal : NULL;
			if ($this->physician_id->ViewValue !== NULL) { // Load from cache
				$this->physician_id->EditValue = array_values($this->physician_id->Lookup->Options);
				if ($this->physician_id->ViewValue == "")
					$this->physician_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->physician_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->physician_id->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
				} else {
					$this->physician_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->physician_id->EditValue = $arwrk;
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

			// Cid
			$this->Cid->EditCustomAttributes = "";
			$curVal = trim(strval($this->Cid->CurrentValue));
			if ($curVal != "")
				$this->Cid->ViewValue = $this->Cid->lookupCacheOption($curVal);
			else
				$this->Cid->ViewValue = $this->Cid->Lookup !== NULL && is_array($this->Cid->Lookup->Options) ? $curVal : NULL;
			if ($this->Cid->ViewValue !== NULL) { // Load from cache
				$this->Cid->EditValue = array_values($this->Cid->Lookup->Options);
				if ($this->Cid->ViewValue == "")
					$this->Cid->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Cid->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Cid->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->Cid->ViewValue = $this->Cid->displayValue($arwrk);
				} else {
					$this->Cid->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Cid->EditValue = $arwrk;
			}

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

			// DOB
			$this->DOB->EditAttrs["class"] = "form-control";
			$this->DOB->EditCustomAttributes = "";
			if (!$this->DOB->Raw)
				$this->DOB->CurrentValue = HtmlDecode($this->DOB->CurrentValue);
			$this->DOB->EditValue = HtmlEncode($this->DOB->CurrentValue);
			$this->DOB->PlaceHolder = RemoveHtml($this->DOB->caption());

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->EditCustomAttributes = "";
			$this->AdviceToOtherHospital->EditValue = $this->AdviceToOtherHospital->options(FALSE);

			// Reason
			$this->Reason->EditAttrs["class"] = "form-control";
			$this->Reason->EditCustomAttributes = "";
			$this->Reason->EditValue = HtmlEncode($this->Reason->CurrentValue);
			$this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

			// Add refer script
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

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";

			// Package
			$this->Package->LinkCustomAttributes = "";
			$this->Package->HrefValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";

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

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// PartnerMobile
			$this->PartnerMobile->LinkCustomAttributes = "";
			$this->PartnerMobile->HrefValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";

			// Cid
			$this->Cid->LinkCustomAttributes = "";
			$this->Cid->HrefValue = "";

			// PartId
			$this->PartId->LinkCustomAttributes = "";
			$this->PartId->HrefValue = "";

			// IDProof
			$this->IDProof->LinkCustomAttributes = "";
			$this->IDProof->HrefValue = "";

			// DOB
			$this->DOB->LinkCustomAttributes = "";
			$this->DOB->HrefValue = "";

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
		if ($this->Package->Required) {
			if (!$this->Package->IsDetailKey && $this->Package->FormValue != NULL && $this->Package->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Package->caption(), $this->Package->RequiredErrorMessage));
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
		if (!CheckInteger($this->admission_consultant_id->FormValue)) {
			AddMessage($FormError, $this->admission_consultant_id->errorMessage());
		}
		if ($this->leading_consultant_id->Required) {
			if (!$this->leading_consultant_id->IsDetailKey && $this->leading_consultant_id->FormValue != NULL && $this->leading_consultant_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leading_consultant_id->caption(), $this->leading_consultant_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->leading_consultant_id->FormValue)) {
			AddMessage($FormError, $this->leading_consultant_id->errorMessage());
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
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
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
		if ($this->BillClosing->Required) {
			if ($this->BillClosing->FormValue == "") {
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
			if ($this->ReportHeader->FormValue == "") {
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
		if ($this->physician_id->Required) {
			if (!$this->physician_id->IsDetailKey && $this->physician_id->FormValue != NULL && $this->physician_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
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
		if ($this->patient_id->Required) {
			if (!$this->patient_id->IsDetailKey && $this->patient_id->FormValue != NULL && $this->patient_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
			}
		}
		if ($this->Cid->Required) {
			if (!$this->Cid->IsDetailKey && $this->Cid->FormValue != NULL && $this->Cid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cid->caption(), $this->Cid->RequiredErrorMessage));
			}
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
		if ($this->DOB->Required) {
			if (!$this->DOB->IsDetailKey && $this->DOB->FormValue != NULL && $this->DOB->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DOB->caption(), $this->DOB->RequiredErrorMessage));
			}
		}
		if ($this->AdviceToOtherHospital->Required) {
			if ($this->AdviceToOtherHospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdviceToOtherHospital->caption(), $this->AdviceToOtherHospital->RequiredErrorMessage));
			}
		}
		if ($this->Reason->Required) {
			if (!$this->Reason->IsDetailKey && $this->Reason->FormValue != NULL && $this->Reason->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reason->caption(), $this->Reason->RequiredErrorMessage));
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

		// mrnNo
		$this->mrnNo->setDbValueDef($rsnew, $this->mrnNo->CurrentValue, "", FALSE);

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// patient_name
		$this->patient_name->setDbValueDef($rsnew, $this->patient_name->CurrentValue, NULL, FALSE);

		// mobileno
		$this->mobileno->setDbValueDef($rsnew, $this->mobileno->CurrentValue, NULL, FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// gender
		$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, FALSE);

		// age
		$this->age->setDbValueDef($rsnew, $this->age->CurrentValue, NULL, FALSE);

		// Package
		$this->Package->setDbValueDef($rsnew, $this->Package->CurrentValue, NULL, FALSE);

		// typeRegsisteration
		$this->typeRegsisteration->setDbValueDef($rsnew, $this->typeRegsisteration->CurrentValue, NULL, FALSE);

		// PaymentCategory
		$this->PaymentCategory->setDbValueDef($rsnew, $this->PaymentCategory->CurrentValue, NULL, FALSE);

		// admission_consultant_id
		$this->admission_consultant_id->setDbValueDef($rsnew, $this->admission_consultant_id->CurrentValue, NULL, FALSE);

		// leading_consultant_id
		$this->leading_consultant_id->setDbValueDef($rsnew, $this->leading_consultant_id->CurrentValue, NULL, FALSE);

		// cause
		$this->cause->setDbValueDef($rsnew, $this->cause->CurrentValue, NULL, FALSE);

		// admission_date
		$this->admission_date->setDbValueDef($rsnew, UnFormatDateTime($this->admission_date->CurrentValue, 11), NULL, FALSE);

		// release_date
		$this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 11), NULL, FALSE);

		// PaymentStatus
		$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->CurrentValue = CurrentUserID();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// modifiedby
		$this->modifiedby->CurrentValue = CurrentUserID();
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

		// modifieddatetime
		$this->modifieddatetime->CurrentValue = CurrentDateTime();
		$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// ReferedByDr
		$this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, NULL, FALSE);

		// ReferClinicname
		$this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, NULL, FALSE);

		// ReferCity
		$this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, NULL, FALSE);

		// ReferMobileNo
		$this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, NULL, FALSE);

		// ReferA4TreatingConsultant
		$this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, NULL, FALSE);

		// PurposreReferredfor
		$this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, NULL, FALSE);

		// BillClosing
		$this->BillClosing->setDbValueDef($rsnew, $this->BillClosing->CurrentValue, NULL, FALSE);

		// BillClosingDate
		$this->BillClosingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillClosingDate->CurrentValue, 0), NULL, FALSE);

		// BillNumber
		$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, FALSE);

		// ClosingAmount
		$this->ClosingAmount->setDbValueDef($rsnew, $this->ClosingAmount->CurrentValue, NULL, FALSE);

		// ClosingType
		$this->ClosingType->setDbValueDef($rsnew, $this->ClosingType->CurrentValue, NULL, FALSE);

		// BillAmount
		$this->BillAmount->setDbValueDef($rsnew, $this->BillAmount->CurrentValue, NULL, FALSE);

		// billclosedBy
		$this->billclosedBy->setDbValueDef($rsnew, $this->billclosedBy->CurrentValue, NULL, FALSE);

		// bllcloseByDate
		$this->bllcloseByDate->setDbValueDef($rsnew, UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0), NULL, FALSE);

		// ReportHeader
		$this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, NULL, FALSE);

		// Procedure
		$this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, NULL, FALSE);

		// Consultant
		$this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, NULL, FALSE);

		// Anesthetist
		$this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, NULL, FALSE);

		// Amound
		$this->Amound->setDbValueDef($rsnew, $this->Amound->CurrentValue, NULL, FALSE);

		// physician_id
		$this->physician_id->setDbValueDef($rsnew, $this->physician_id->CurrentValue, NULL, FALSE);

		// PartnerID
		$this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, NULL, FALSE);

		// PartnerName
		$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, FALSE);

		// PartnerMobile
		$this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, NULL, FALSE);

		// patient_id
		$this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, FALSE);

		// Cid
		$this->Cid->setDbValueDef($rsnew, $this->Cid->CurrentValue, NULL, FALSE);

		// PartId
		$this->PartId->setDbValueDef($rsnew, $this->PartId->CurrentValue, NULL, FALSE);

		// IDProof
		$this->IDProof->setDbValueDef($rsnew, $this->IDProof->CurrentValue, NULL, FALSE);

		// DOB
		$this->DOB->setDbValueDef($rsnew, $this->DOB->CurrentValue, "", FALSE);

		// AdviceToOtherHospital
		$this->AdviceToOtherHospital->setDbValueDef($rsnew, $this->AdviceToOtherHospital->CurrentValue, NULL, FALSE);

		// Reason
		$this->Reason->setDbValueDef($rsnew, $this->Reason->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_ip_patient_admissionlist.php"), "", $this->TableVar, TRUE);
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
				case "x_typeRegsisteration":
					break;
				case "x_PaymentCategory":
					break;
				case "x_PaymentStatus":
					break;
				case "x_HospID":
					break;
				case "x_ReferedByDr":
					break;
				case "x_BillClosing":
					break;
				case "x_ReportHeader":
					break;
				case "x_Procedure":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Consultant":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Anesthetist":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_physician_id":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_patient_id":
					break;
				case "x_Cid":
					break;
				case "x_AdviceToOtherHospital":
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
						case "x_typeRegsisteration":
							break;
						case "x_PaymentCategory":
							break;
						case "x_PaymentStatus":
							break;
						case "x_HospID":
							break;
						case "x_ReferedByDr":
							break;
						case "x_Procedure":
							break;
						case "x_Consultant":
							break;
						case "x_Anesthetist":
							break;
						case "x_physician_id":
							break;
						case "x_patient_id":
							break;
						case "x_Cid":
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
			$UserProfile = new UserProfile();
			$id =  $UserProfile->Profile['id'];
			$HospID =  $UserProfile->Profile['HospID'];
			$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
			if($hospital_PreFixCode == "")
			{
				getHospitalDetails($HospID);
				$UserProfile = new UserProfile();
				$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
			}
			$this->mrnNo->EditValue =  $hospital_PreFixCode . 'MRN'. getmrnNo($HospID);
			$this->mrnNo->ReadOnly = true;
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
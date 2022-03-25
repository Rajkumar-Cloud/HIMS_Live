<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_opd_follow_up_search extends patient_opd_follow_up
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_opd_follow_up';

	// Page object name
	public $PageObjName = "patient_opd_follow_up_search";

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

		// Table object (patient_opd_follow_up)
		if (!isset($GLOBALS["patient_opd_follow_up"]) || get_class($GLOBALS["patient_opd_follow_up"]) == PROJECT_NAMESPACE . "patient_opd_follow_up") {
			$GLOBALS["patient_opd_follow_up"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_opd_follow_up"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_opd_follow_up');

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
		global $patient_opd_follow_up;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient_opd_follow_up);
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
					if ($pageName == "patient_opd_follow_upview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

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
			if (!$Security->canSearch()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("patient_opd_follow_uplist.php"));
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
		$this->PatID->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Telephone->setVisibility();
		$this->mrnno->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->procedurenotes->setVisibility();
		$this->NextReviewDate->setVisibility();
		$this->ICSIAdvised->setVisibility();
		$this->DeliveryRegistered->setVisibility();
		$this->EDD->setVisibility();
		$this->SerologyPositive->setVisibility();
		$this->Allergy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->LMP->setVisibility();
		$this->Procedure->setVisibility();
		$this->ProcedureDateTime->setVisibility();
		$this->ICSIDate->setVisibility();
		$this->PatientSearch->setVisibility();
		$this->HospID->setVisibility();
		$this->createdUserName->setVisibility();
		$this->TemplateDrNotes->setVisibility();
		$this->reportheader->setVisibility();
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
		$this->setupLookupOptions($this->Allergy);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->PatientSearch);
		$this->setupLookupOptions($this->TemplateDrNotes);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		if ($this->isPageRequest()) { // Validate request

			// Get action
			$this->CurrentAction = Post("action");
			if ($this->isSearch()) {

				// Build search string for advanced search, remove blank field
				$this->loadSearchValues(); // Get search values
				if ($this->validateSearch()) {
					$srchStr = $this->buildAdvancedSearch();
				} else {
					$srchStr = "";
					$this->setFailureMessage($SearchError);
				}
				if ($srchStr != "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "patient_opd_follow_uplist.php" . "?" . $srchStr;
					$this->terminate($srchStr); // Go to list page
				}
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Render row for search
		$this->RowType = ROWTYPE_SEARCH;
		$this->resetAttributes();
		$this->renderRow();
	}

	// Build advanced search
	protected function buildAdvancedSearch()
	{
		$srchUrl = "";
		$this->buildSearchUrl($srchUrl, $this->id); // id
		$this->buildSearchUrl($srchUrl, $this->Reception); // Reception
		$this->buildSearchUrl($srchUrl, $this->PatID); // PatID
		$this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
		$this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
		$this->buildSearchUrl($srchUrl, $this->MobileNumber); // MobileNumber
		$this->buildSearchUrl($srchUrl, $this->Telephone); // Telephone
		$this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
		$this->buildSearchUrl($srchUrl, $this->Age); // Age
		$this->buildSearchUrl($srchUrl, $this->Gender); // Gender
		$this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
		$this->buildSearchUrl($srchUrl, $this->procedurenotes); // procedurenotes
		$this->buildSearchUrl($srchUrl, $this->NextReviewDate); // NextReviewDate
		$this->buildSearchUrl($srchUrl, $this->ICSIAdvised); // ICSIAdvised
		$this->buildSearchUrl($srchUrl, $this->DeliveryRegistered); // DeliveryRegistered
		$this->buildSearchUrl($srchUrl, $this->EDD); // EDD
		$this->buildSearchUrl($srchUrl, $this->SerologyPositive); // SerologyPositive
		$this->buildSearchUrl($srchUrl, $this->Allergy); // Allergy
		$this->buildSearchUrl($srchUrl, $this->status); // status
		$this->buildSearchUrl($srchUrl, $this->createdby); // createdby
		$this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
		$this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
		$this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
		$this->buildSearchUrl($srchUrl, $this->LMP); // LMP
		$this->buildSearchUrl($srchUrl, $this->Procedure); // Procedure
		$this->buildSearchUrl($srchUrl, $this->ProcedureDateTime); // ProcedureDateTime
		$this->buildSearchUrl($srchUrl, $this->ICSIDate); // ICSIDate
		$this->buildSearchUrl($srchUrl, $this->PatientSearch); // PatientSearch
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->createdUserName); // createdUserName
		$this->buildSearchUrl($srchUrl, $this->TemplateDrNotes); // TemplateDrNotes
		$this->buildSearchUrl($srchUrl, $this->reportheader); // reportheader
		if ($srchUrl != "")
			$srchUrl .= "&";
		$srchUrl .= "cmd=search";
		return $srchUrl;
	}

	// Build search URL
	protected function buildSearchUrl(&$url, &$fld, $oprOnly = FALSE)
	{
		global $CurrentForm;
		$wrk = "";
		$fldParm = $fld->Param;
		$fldVal = $CurrentForm->getValue("x_$fldParm");
		$fldOpr = $CurrentForm->getValue("z_$fldParm");
		$fldCond = $CurrentForm->getValue("v_$fldParm");
		$fldVal2 = $CurrentForm->getValue("y_$fldParm");
		$fldOpr2 = $CurrentForm->getValue("w_$fldParm");
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal != "" && $fldVal2 != "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal != "" && $isValidValue && IsValidOperator($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr != "" && $oprOnly && IsValidOperator($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 != "" && $isValidValue && IsValidOperator($fldOpr2, $fldDataType)) {
				if ($wrk != "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 != "" && $oprOnly && IsValidOperator($fldOpr2, $fldDataType))) {
				if ($wrk != "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk != "") {
			if ($url != "")
				$url .= "&";
			$url .= $wrk;
		}
	}
	protected function searchValueIsNumeric($fld, $value)
	{
		if (IsFloatFormat($fld->Type))
			$value = ConvertToFloatString($value);
		return is_numeric($value);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;
		if ($this->id->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Reception->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientId->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->MobileNumber->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Telephone->AdvancedSearch->post())
			$got = TRUE;
		if ($this->mrnno->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Age->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Gender->AdvancedSearch->post())
			$got = TRUE;
		if ($this->profilePic->AdvancedSearch->post())
			$got = TRUE;
		if ($this->procedurenotes->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NextReviewDate->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ICSIAdvised->AdvancedSearch->post())
			$got = TRUE;
		if (is_array($this->ICSIAdvised->AdvancedSearch->SearchValue))
			$this->ICSIAdvised->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ICSIAdvised->AdvancedSearch->SearchValue);
		if (is_array($this->ICSIAdvised->AdvancedSearch->SearchValue2))
			$this->ICSIAdvised->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ICSIAdvised->AdvancedSearch->SearchValue2);
		if ($this->DeliveryRegistered->AdvancedSearch->post())
			$got = TRUE;
		if (is_array($this->DeliveryRegistered->AdvancedSearch->SearchValue))
			$this->DeliveryRegistered->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->DeliveryRegistered->AdvancedSearch->SearchValue);
		if (is_array($this->DeliveryRegistered->AdvancedSearch->SearchValue2))
			$this->DeliveryRegistered->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->DeliveryRegistered->AdvancedSearch->SearchValue2);
		if ($this->EDD->AdvancedSearch->post())
			$got = TRUE;
		if ($this->SerologyPositive->AdvancedSearch->post())
			$got = TRUE;
		if (is_array($this->SerologyPositive->AdvancedSearch->SearchValue))
			$this->SerologyPositive->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->SerologyPositive->AdvancedSearch->SearchValue);
		if (is_array($this->SerologyPositive->AdvancedSearch->SearchValue2))
			$this->SerologyPositive->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->SerologyPositive->AdvancedSearch->SearchValue2);
		if ($this->Allergy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->status->AdvancedSearch->post())
			$got = TRUE;
		if ($this->createdby->AdvancedSearch->post())
			$got = TRUE;
		if ($this->createddatetime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->modifiedby->AdvancedSearch->post())
			$got = TRUE;
		if ($this->modifieddatetime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->LMP->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Procedure->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ProcedureDateTime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ICSIDate->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientSearch->AdvancedSearch->post())
			$got = TRUE;
		if ($this->HospID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->createdUserName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TemplateDrNotes->AdvancedSearch->post())
			$got = TRUE;
		if ($this->reportheader->AdvancedSearch->post())
			$got = TRUE;
		if (is_array($this->reportheader->AdvancedSearch->SearchValue))
			$this->reportheader->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->reportheader->AdvancedSearch->SearchValue);
		if (is_array($this->reportheader->AdvancedSearch->SearchValue2))
			$this->reportheader->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->reportheader->AdvancedSearch->SearchValue2);
		return $got;
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
		// PatID
		// PatientId
		// PatientName
		// MobileNumber
		// Telephone
		// mrnno
		// Age
		// Gender
		// profilePic
		// procedurenotes
		// NextReviewDate
		// ICSIAdvised
		// DeliveryRegistered
		// EDD
		// SerologyPositive
		// Allergy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// LMP
		// Procedure
		// ProcedureDateTime
		// ICSIDate
		// PatientSearch
		// HospID
		// createdUserName
		// TemplateDrNotes
		// reportheader

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Telephone
			$this->Telephone->ViewValue = $this->Telephone->CurrentValue;
			$this->Telephone->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// procedurenotes
			$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
			$this->procedurenotes->ViewCustomAttributes = "";

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
			$this->NextReviewDate->ViewCustomAttributes = "";

			// ICSIAdvised
			if (strval($this->ICSIAdvised->CurrentValue) != "") {
				$this->ICSIAdvised->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ICSIAdvised->ViewValue = NULL;
			}
			$this->ICSIAdvised->ViewCustomAttributes = "";

			// DeliveryRegistered
			if (strval($this->DeliveryRegistered->CurrentValue) != "") {
				$this->DeliveryRegistered->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->DeliveryRegistered->ViewValue = NULL;
			}
			$this->DeliveryRegistered->ViewCustomAttributes = "";

			// EDD
			$this->EDD->ViewValue = $this->EDD->CurrentValue;
			$this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 7);
			$this->EDD->ViewCustomAttributes = "";

			// SerologyPositive
			if (strval($this->SerologyPositive->CurrentValue) != "") {
				$this->SerologyPositive->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->SerologyPositive->ViewValue = NULL;
			}
			$this->SerologyPositive->ViewCustomAttributes = "";

			// Allergy
			$this->Allergy->ViewValue = $this->Allergy->CurrentValue;
			$curVal = strval($this->Allergy->CurrentValue);
			if ($curVal != "") {
				$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
				if ($this->Allergy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Allergy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Allergy->ViewValue = $this->Allergy->CurrentValue;
					}
				}
			} else {
				$this->Allergy->ViewValue = NULL;
			}
			$this->Allergy->ViewCustomAttributes = "";

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

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
			$this->LMP->ViewCustomAttributes = "";

			// Procedure
			$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
			$this->Procedure->ViewCustomAttributes = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
			$this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 11);
			$this->ProcedureDateTime->ViewCustomAttributes = "";

			// ICSIDate
			$this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
			$this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 7);
			$this->ICSIDate->ViewCustomAttributes = "";

			// PatientSearch
			$curVal = strval($this->PatientSearch->CurrentValue);
			if ($curVal != "") {
				$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
				if ($this->PatientSearch->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatientSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
					}
				}
			} else {
				$this->PatientSearch->ViewValue = NULL;
			}
			$this->PatientSearch->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// createdUserName
			$this->createdUserName->ViewValue = $this->createdUserName->CurrentValue;
			$this->createdUserName->ViewCustomAttributes = "";

			// TemplateDrNotes
			$curVal = strval($this->TemplateDrNotes->CurrentValue);
			if ($curVal != "") {
				$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
				if ($this->TemplateDrNotes->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Doctor Notes'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateDrNotes->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->CurrentValue;
					}
				}
			} else {
				$this->TemplateDrNotes->ViewValue = NULL;
			}
			$this->TemplateDrNotes->ViewCustomAttributes = "";

			// reportheader
			if (strval($this->reportheader->CurrentValue) != "") {
				$this->reportheader->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->reportheader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->reportheader->ViewValue->add($this->reportheader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->reportheader->ViewValue = NULL;
			}
			$this->reportheader->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 80);
			$this->Reception->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->ExportHrefValue = Barcode()->getHrefValue($this->PatientId->CurrentValue, 'CODE128', 40);
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// Telephone
			$this->Telephone->LinkCustomAttributes = "";
			$this->Telephone->HrefValue = "";
			$this->Telephone->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// procedurenotes
			$this->procedurenotes->LinkCustomAttributes = "";
			$this->procedurenotes->HrefValue = "";
			$this->procedurenotes->TooltipValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";
			$this->NextReviewDate->TooltipValue = "";

			// ICSIAdvised
			$this->ICSIAdvised->LinkCustomAttributes = "";
			$this->ICSIAdvised->HrefValue = "";
			$this->ICSIAdvised->TooltipValue = "";

			// DeliveryRegistered
			$this->DeliveryRegistered->LinkCustomAttributes = "";
			$this->DeliveryRegistered->HrefValue = "";
			$this->DeliveryRegistered->TooltipValue = "";

			// EDD
			$this->EDD->LinkCustomAttributes = "";
			$this->EDD->HrefValue = "";
			$this->EDD->TooltipValue = "";

			// SerologyPositive
			$this->SerologyPositive->LinkCustomAttributes = "";
			$this->SerologyPositive->HrefValue = "";
			$this->SerologyPositive->TooltipValue = "";

			// Allergy
			$this->Allergy->LinkCustomAttributes = "";
			$this->Allergy->HrefValue = "";
			$this->Allergy->TooltipValue = "";

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

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// Procedure
			$this->Procedure->LinkCustomAttributes = "";
			$this->Procedure->HrefValue = "";
			$this->Procedure->TooltipValue = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->LinkCustomAttributes = "";
			$this->ProcedureDateTime->HrefValue = "";
			$this->ProcedureDateTime->TooltipValue = "";

			// ICSIDate
			$this->ICSIDate->LinkCustomAttributes = "";
			$this->ICSIDate->HrefValue = "";
			$this->ICSIDate->TooltipValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// createdUserName
			$this->createdUserName->LinkCustomAttributes = "";
			$this->createdUserName->HrefValue = "";
			$this->createdUserName->TooltipValue = "";

			// TemplateDrNotes
			$this->TemplateDrNotes->LinkCustomAttributes = "";
			$this->TemplateDrNotes->HrefValue = "";
			$this->TemplateDrNotes->TooltipValue = "";

			// reportheader
			$this->reportheader->LinkCustomAttributes = "";
			$this->reportheader->HrefValue = "";
			$this->reportheader->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if (!$this->Reception->Raw)
				$this->Reception->AdvancedSearch->SearchValue = HtmlDecode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (!$this->PatID->Raw)
				$this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (!$this->MobileNumber->Raw)
				$this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// Telephone
			$this->Telephone->EditAttrs["class"] = "form-control";
			$this->Telephone->EditCustomAttributes = "";
			if (!$this->Telephone->Raw)
				$this->Telephone->AdvancedSearch->SearchValue = HtmlDecode($this->Telephone->AdvancedSearch->SearchValue);
			$this->Telephone->EditValue = HtmlEncode($this->Telephone->AdvancedSearch->SearchValue);
			$this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (!$this->mrnno->Raw)
				$this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// procedurenotes
			$this->procedurenotes->EditAttrs["class"] = "form-control";
			$this->procedurenotes->EditCustomAttributes = "";
			$this->procedurenotes->EditValue = HtmlEncode($this->procedurenotes->AdvancedSearch->SearchValue);
			$this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

			// NextReviewDate
			$this->NextReviewDate->EditAttrs["class"] = "form-control";
			$this->NextReviewDate->EditCustomAttributes = "";
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->NextReviewDate->AdvancedSearch->SearchValue, 7), 7));
			$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

			// ICSIAdvised
			$this->ICSIAdvised->EditCustomAttributes = "";
			$this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(FALSE);

			// DeliveryRegistered
			$this->DeliveryRegistered->EditCustomAttributes = "";
			$this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(FALSE);

			// EDD
			$this->EDD->EditAttrs["class"] = "form-control";
			$this->EDD->EditCustomAttributes = "";
			$this->EDD->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD->AdvancedSearch->SearchValue, 7), 7));
			$this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

			// SerologyPositive
			$this->SerologyPositive->EditCustomAttributes = "";
			$this->SerologyPositive->EditValue = $this->SerologyPositive->options(FALSE);

			// Allergy
			$this->Allergy->EditAttrs["class"] = "form-control";
			$this->Allergy->EditCustomAttributes = "";
			if (!$this->Allergy->Raw)
				$this->Allergy->AdvancedSearch->SearchValue = HtmlDecode($this->Allergy->AdvancedSearch->SearchValue);
			$this->Allergy->EditValue = HtmlEncode($this->Allergy->AdvancedSearch->SearchValue);
			$curVal = strval($this->Allergy->AdvancedSearch->SearchValue);
			if ($curVal != "") {
				$this->Allergy->EditValue = $this->Allergy->lookupCacheOption($curVal);
				if ($this->Allergy->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Allergy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Allergy->EditValue = $this->Allergy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Allergy->EditValue = HtmlEncode($this->Allergy->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->Allergy->EditValue = NULL;
			}
			$this->Allergy->PlaceHolder = RemoveHtml($this->Allergy->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->status->AdvancedSearch->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->AdvancedSearch->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->status->EditValue = $arwrk;
			}

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// LMP
			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LMP->AdvancedSearch->SearchValue, 7), 7));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// Procedure
			$this->Procedure->EditAttrs["class"] = "form-control";
			$this->Procedure->EditCustomAttributes = "";
			$this->Procedure->EditValue = HtmlEncode($this->Procedure->AdvancedSearch->SearchValue);
			$this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

			// ProcedureDateTime
			$this->ProcedureDateTime->EditAttrs["class"] = "form-control";
			$this->ProcedureDateTime->EditCustomAttributes = "";
			$this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ProcedureDateTime->AdvancedSearch->SearchValue, 11), 11));
			$this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

			// ICSIDate
			$this->ICSIDate->EditAttrs["class"] = "form-control";
			$this->ICSIDate->EditCustomAttributes = "";
			$this->ICSIDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ICSIDate->AdvancedSearch->SearchValue, 7), 7));
			$this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

			// PatientSearch
			$this->PatientSearch->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientSearch->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->PatientSearch->AdvancedSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
			else
				$this->PatientSearch->AdvancedSearch->ViewValue = $this->PatientSearch->Lookup !== NULL && is_array($this->PatientSearch->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientSearch->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->PatientSearch->EditValue = array_values($this->PatientSearch->Lookup->Options);
				if ($this->PatientSearch->AdvancedSearch->ViewValue == "")
					$this->PatientSearch->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PatientSearch->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PatientSearch->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->PatientSearch->AdvancedSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
				} else {
					$this->PatientSearch->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->PatientSearch->EditValue = $arwrk;
			}

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			if (!$this->HospID->Raw)
				$this->HospID->AdvancedSearch->SearchValue = HtmlDecode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// createdUserName
			$this->createdUserName->EditAttrs["class"] = "form-control";
			$this->createdUserName->EditCustomAttributes = "";
			if (!$this->createdUserName->Raw)
				$this->createdUserName->AdvancedSearch->SearchValue = HtmlDecode($this->createdUserName->AdvancedSearch->SearchValue);
			$this->createdUserName->EditValue = HtmlEncode($this->createdUserName->AdvancedSearch->SearchValue);
			$this->createdUserName->PlaceHolder = RemoveHtml($this->createdUserName->caption());

			// TemplateDrNotes
			$this->TemplateDrNotes->EditAttrs["class"] = "form-control";
			$this->TemplateDrNotes->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateDrNotes->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->TemplateDrNotes->AdvancedSearch->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
			else
				$this->TemplateDrNotes->AdvancedSearch->ViewValue = $this->TemplateDrNotes->Lookup !== NULL && is_array($this->TemplateDrNotes->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateDrNotes->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->TemplateDrNotes->EditValue = array_values($this->TemplateDrNotes->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateDrNotes->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Doctor Notes'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateDrNotes->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplateDrNotes->EditValue = $arwrk;
			}

			// reportheader
			$this->reportheader->EditCustomAttributes = "";
			$this->reportheader->EditValue = $this->reportheader->options(FALSE);
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;
		if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->id->errorMessage());
		}
		if (!CheckEuroDate($this->NextReviewDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->NextReviewDate->errorMessage());
		}
		if (!CheckEuroDate($this->EDD->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EDD->errorMessage());
		}
		if (!CheckInteger($this->createdby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createdby->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckInteger($this->modifiedby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifiedby->errorMessage());
		}
		if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifieddatetime->errorMessage());
		}
		if (!CheckEuroDate($this->LMP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->LMP->errorMessage());
		}
		if (!CheckEuroDate($this->ICSIDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ICSIDate->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->MobileNumber->AdvancedSearch->load();
		$this->Telephone->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->procedurenotes->AdvancedSearch->load();
		$this->NextReviewDate->AdvancedSearch->load();
		$this->ICSIAdvised->AdvancedSearch->load();
		$this->DeliveryRegistered->AdvancedSearch->load();
		$this->EDD->AdvancedSearch->load();
		$this->SerologyPositive->AdvancedSearch->load();
		$this->Allergy->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->LMP->AdvancedSearch->load();
		$this->Procedure->AdvancedSearch->load();
		$this->ProcedureDateTime->AdvancedSearch->load();
		$this->ICSIDate->AdvancedSearch->load();
		$this->PatientSearch->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->createdUserName->AdvancedSearch->load();
		$this->TemplateDrNotes->AdvancedSearch->load();
		$this->reportheader->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_opd_follow_uplist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
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
				case "x_ICSIAdvised":
					break;
				case "x_DeliveryRegistered":
					break;
				case "x_SerologyPositive":
					break;
				case "x_Allergy":
					break;
				case "x_status":
					break;
				case "x_PatientSearch":
					break;
				case "x_TemplateDrNotes":
					$lookupFilter = function() {
						return "`TemplateType`='Doctor Notes'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_reportheader":
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
						case "x_Allergy":
							break;
						case "x_status":
							break;
						case "x_PatientSearch":
							break;
						case "x_TemplateDrNotes":
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
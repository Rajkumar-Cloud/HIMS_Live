<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_semenanalysis_search extends view_semenanalysis
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_semenanalysis';

	// Page object name
	public $PageObjName = "view_semenanalysis_search";

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

		// Table object (view_semenanalysis)
		if (!isset($GLOBALS["view_semenanalysis"]) || get_class($GLOBALS["view_semenanalysis"]) == PROJECT_NAMESPACE . "view_semenanalysis") {
			$GLOBALS["view_semenanalysis"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_semenanalysis"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_semenanalysis');

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
		global $view_semenanalysis;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($view_semenanalysis);
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
					if ($pageName == "view_semenanalysisview.php")
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
					$this->terminate(GetUrl("view_semenanalysislist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PaID->setVisibility();
		$this->PaName->setVisibility();
		$this->PaMobile->setVisibility();
		$this->PartnerID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerMobile->setVisibility();
		$this->RIDNo->setVisibility();
		$this->PatientName->setVisibility();
		$this->HusbandName->setVisibility();
		$this->RequestDr->setVisibility();
		$this->CollectionDate->setVisibility();
		$this->ResultDate->setVisibility();
		$this->RequestSample->setVisibility();
		$this->CollectionType->setVisibility();
		$this->CollectionMethod->setVisibility();
		$this->Medicationused->setVisibility();
		$this->DifficultiesinCollection->setVisibility();
		$this->Volume->setVisibility();
		$this->pH->setVisibility();
		$this->Timeofcollection->setVisibility();
		$this->Timeofexamination->setVisibility();
		$this->Concentration->setVisibility();
		$this->Total->setVisibility();
		$this->ProgressiveMotility->setVisibility();
		$this->NonProgrssiveMotile->setVisibility();
		$this->Immotile->setVisibility();
		$this->TotalProgrssiveMotile->setVisibility();
		$this->Appearance->setVisibility();
		$this->Homogenosity->setVisibility();
		$this->CompleteSample->setVisibility();
		$this->Liquefactiontime->setVisibility();
		$this->Normal->setVisibility();
		$this->Abnormal->setVisibility();
		$this->Headdefects->setVisibility();
		$this->MidpieceDefects->setVisibility();
		$this->TailDefects->setVisibility();
		$this->NormalProgMotile->setVisibility();
		$this->ImmatureForms->setVisibility();
		$this->Leucocytes->setVisibility();
		$this->Agglutination->setVisibility();
		$this->Debris->setVisibility();
		$this->Diagnosis->setVisibility();
		$this->Observations->setVisibility();
		$this->Signature->setVisibility();
		$this->SemenOrgin->setVisibility();
		$this->Donor->setVisibility();
		$this->DonorBloodgroup->setVisibility();
		$this->Tank->setVisibility();
		$this->Location->setVisibility();
		$this->Volume1->setVisibility();
		$this->Concentration1->setVisibility();
		$this->Total1->setVisibility();
		$this->ProgressiveMotility1->setVisibility();
		$this->NonProgrssiveMotile1->setVisibility();
		$this->Immotile1->setVisibility();
		$this->TotalProgrssiveMotile1->setVisibility();
		$this->TidNo->setVisibility();
		$this->Color->setVisibility();
		$this->DoneBy->setVisibility();
		$this->Method->setVisibility();
		$this->Abstinence->setVisibility();
		$this->ProcessedBy->setVisibility();
		$this->InseminationTime->setVisibility();
		$this->InseminationBy->setVisibility();
		$this->Big->setVisibility();
		$this->Medium->setVisibility();
		$this->Small->setVisibility();
		$this->NoHalo->setVisibility();
		$this->Fragmented->setVisibility();
		$this->NonFragmented->setVisibility();
		$this->DFI->setVisibility();
		$this->IsueBy->setVisibility();
		$this->Volume2->setVisibility();
		$this->Concentration2->setVisibility();
		$this->Total2->setVisibility();
		$this->ProgressiveMotility2->setVisibility();
		$this->NonProgrssiveMotile2->setVisibility();
		$this->Immotile2->setVisibility();
		$this->TotalProgrssiveMotile2->setVisibility();
		$this->IssuedBy->setVisibility();
		$this->IssuedTo->setVisibility();
		$this->MACS->setVisibility();
		$this->PREG_TEST_DATE->setVisibility();
		$this->SPECIFIC_PROBLEMS->setVisibility();
		$this->IMSC_1->setVisibility();
		$this->IMSC_2->setVisibility();
		$this->LIQUIFACTION_STORAGE->setVisibility();
		$this->IUI_PREP_METHOD->setVisibility();
		$this->TIME_FROM_TRIGGER->setVisibility();
		$this->COLLECTION_TO_PREPARATION->setVisibility();
		$this->TIME_FROM_PREP_TO_INSEM->setVisibility();
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
		$this->setupLookupOptions($this->RIDNo);
		$this->setupLookupOptions($this->PatientName);
		$this->setupLookupOptions($this->HusbandName);
		$this->setupLookupOptions($this->Medicationused);
		$this->setupLookupOptions($this->Donor);

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
					$srchStr = "view_semenanalysislist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->PaID); // PaID
		$this->buildSearchUrl($srchUrl, $this->PaName); // PaName
		$this->buildSearchUrl($srchUrl, $this->PaMobile); // PaMobile
		$this->buildSearchUrl($srchUrl, $this->PartnerID); // PartnerID
		$this->buildSearchUrl($srchUrl, $this->PartnerName); // PartnerName
		$this->buildSearchUrl($srchUrl, $this->PartnerMobile); // PartnerMobile
		$this->buildSearchUrl($srchUrl, $this->RIDNo); // RIDNo
		$this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
		$this->buildSearchUrl($srchUrl, $this->HusbandName); // HusbandName
		$this->buildSearchUrl($srchUrl, $this->RequestDr); // RequestDr
		$this->buildSearchUrl($srchUrl, $this->CollectionDate); // CollectionDate
		$this->buildSearchUrl($srchUrl, $this->ResultDate); // ResultDate
		$this->buildSearchUrl($srchUrl, $this->RequestSample); // RequestSample
		$this->buildSearchUrl($srchUrl, $this->CollectionType); // CollectionType
		$this->buildSearchUrl($srchUrl, $this->CollectionMethod); // CollectionMethod
		$this->buildSearchUrl($srchUrl, $this->Medicationused); // Medicationused
		$this->buildSearchUrl($srchUrl, $this->DifficultiesinCollection); // DifficultiesinCollection
		$this->buildSearchUrl($srchUrl, $this->Volume); // Volume
		$this->buildSearchUrl($srchUrl, $this->pH); // pH
		$this->buildSearchUrl($srchUrl, $this->Timeofcollection); // Timeofcollection
		$this->buildSearchUrl($srchUrl, $this->Timeofexamination); // Timeofexamination
		$this->buildSearchUrl($srchUrl, $this->Concentration); // Concentration
		$this->buildSearchUrl($srchUrl, $this->Total); // Total
		$this->buildSearchUrl($srchUrl, $this->ProgressiveMotility); // ProgressiveMotility
		$this->buildSearchUrl($srchUrl, $this->NonProgrssiveMotile); // NonProgrssiveMotile
		$this->buildSearchUrl($srchUrl, $this->Immotile); // Immotile
		$this->buildSearchUrl($srchUrl, $this->TotalProgrssiveMotile); // TotalProgrssiveMotile
		$this->buildSearchUrl($srchUrl, $this->Appearance); // Appearance
		$this->buildSearchUrl($srchUrl, $this->Homogenosity); // Homogenosity
		$this->buildSearchUrl($srchUrl, $this->CompleteSample); // CompleteSample
		$this->buildSearchUrl($srchUrl, $this->Liquefactiontime); // Liquefactiontime
		$this->buildSearchUrl($srchUrl, $this->Normal); // Normal
		$this->buildSearchUrl($srchUrl, $this->Abnormal); // Abnormal
		$this->buildSearchUrl($srchUrl, $this->Headdefects); // Headdefects
		$this->buildSearchUrl($srchUrl, $this->MidpieceDefects); // MidpieceDefects
		$this->buildSearchUrl($srchUrl, $this->TailDefects); // TailDefects
		$this->buildSearchUrl($srchUrl, $this->NormalProgMotile); // NormalProgMotile
		$this->buildSearchUrl($srchUrl, $this->ImmatureForms); // ImmatureForms
		$this->buildSearchUrl($srchUrl, $this->Leucocytes); // Leucocytes
		$this->buildSearchUrl($srchUrl, $this->Agglutination); // Agglutination
		$this->buildSearchUrl($srchUrl, $this->Debris); // Debris
		$this->buildSearchUrl($srchUrl, $this->Diagnosis); // Diagnosis
		$this->buildSearchUrl($srchUrl, $this->Observations); // Observations
		$this->buildSearchUrl($srchUrl, $this->Signature); // Signature
		$this->buildSearchUrl($srchUrl, $this->SemenOrgin); // SemenOrgin
		$this->buildSearchUrl($srchUrl, $this->Donor); // Donor
		$this->buildSearchUrl($srchUrl, $this->DonorBloodgroup); // DonorBloodgroup
		$this->buildSearchUrl($srchUrl, $this->Tank); // Tank
		$this->buildSearchUrl($srchUrl, $this->Location); // Location
		$this->buildSearchUrl($srchUrl, $this->Volume1); // Volume1
		$this->buildSearchUrl($srchUrl, $this->Concentration1); // Concentration1
		$this->buildSearchUrl($srchUrl, $this->Total1); // Total1
		$this->buildSearchUrl($srchUrl, $this->ProgressiveMotility1); // ProgressiveMotility1
		$this->buildSearchUrl($srchUrl, $this->NonProgrssiveMotile1); // NonProgrssiveMotile1
		$this->buildSearchUrl($srchUrl, $this->Immotile1); // Immotile1
		$this->buildSearchUrl($srchUrl, $this->TotalProgrssiveMotile1); // TotalProgrssiveMotile1
		$this->buildSearchUrl($srchUrl, $this->TidNo); // TidNo
		$this->buildSearchUrl($srchUrl, $this->Color); // Color
		$this->buildSearchUrl($srchUrl, $this->DoneBy); // DoneBy
		$this->buildSearchUrl($srchUrl, $this->Method); // Method
		$this->buildSearchUrl($srchUrl, $this->Abstinence); // Abstinence
		$this->buildSearchUrl($srchUrl, $this->ProcessedBy); // ProcessedBy
		$this->buildSearchUrl($srchUrl, $this->InseminationTime); // InseminationTime
		$this->buildSearchUrl($srchUrl, $this->InseminationBy); // InseminationBy
		$this->buildSearchUrl($srchUrl, $this->Big); // Big
		$this->buildSearchUrl($srchUrl, $this->Medium); // Medium
		$this->buildSearchUrl($srchUrl, $this->Small); // Small
		$this->buildSearchUrl($srchUrl, $this->NoHalo); // NoHalo
		$this->buildSearchUrl($srchUrl, $this->Fragmented); // Fragmented
		$this->buildSearchUrl($srchUrl, $this->NonFragmented); // NonFragmented
		$this->buildSearchUrl($srchUrl, $this->DFI); // DFI
		$this->buildSearchUrl($srchUrl, $this->IsueBy); // IsueBy
		$this->buildSearchUrl($srchUrl, $this->Volume2); // Volume2
		$this->buildSearchUrl($srchUrl, $this->Concentration2); // Concentration2
		$this->buildSearchUrl($srchUrl, $this->Total2); // Total2
		$this->buildSearchUrl($srchUrl, $this->ProgressiveMotility2); // ProgressiveMotility2
		$this->buildSearchUrl($srchUrl, $this->NonProgrssiveMotile2); // NonProgrssiveMotile2
		$this->buildSearchUrl($srchUrl, $this->Immotile2); // Immotile2
		$this->buildSearchUrl($srchUrl, $this->TotalProgrssiveMotile2); // TotalProgrssiveMotile2
		$this->buildSearchUrl($srchUrl, $this->IssuedBy); // IssuedBy
		$this->buildSearchUrl($srchUrl, $this->IssuedTo); // IssuedTo
		$this->buildSearchUrl($srchUrl, $this->MACS); // MACS
		$this->buildSearchUrl($srchUrl, $this->PREG_TEST_DATE); // PREG_TEST_DATE
		$this->buildSearchUrl($srchUrl, $this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
		$this->buildSearchUrl($srchUrl, $this->IMSC_1); // IMSC_1
		$this->buildSearchUrl($srchUrl, $this->IMSC_2); // IMSC_2
		$this->buildSearchUrl($srchUrl, $this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
		$this->buildSearchUrl($srchUrl, $this->IUI_PREP_METHOD); // IUI_PREP_METHOD
		$this->buildSearchUrl($srchUrl, $this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
		$this->buildSearchUrl($srchUrl, $this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
		$this->buildSearchUrl($srchUrl, $this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
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
		if ($this->PaID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PaName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PaMobile->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PartnerID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PartnerName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PartnerMobile->AdvancedSearch->post())
			$got = TRUE;
		if ($this->RIDNo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PatientName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->HusbandName->AdvancedSearch->post())
			$got = TRUE;
		if ($this->RequestDr->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CollectionDate->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ResultDate->AdvancedSearch->post())
			$got = TRUE;
		if ($this->RequestSample->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CollectionType->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CollectionMethod->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Medicationused->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DifficultiesinCollection->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Volume->AdvancedSearch->post())
			$got = TRUE;
		if ($this->pH->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Timeofcollection->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Timeofexamination->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Concentration->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Total->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ProgressiveMotility->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NonProgrssiveMotile->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Immotile->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TotalProgrssiveMotile->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Appearance->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Homogenosity->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CompleteSample->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Liquefactiontime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Normal->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Abnormal->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Headdefects->AdvancedSearch->post())
			$got = TRUE;
		if ($this->MidpieceDefects->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TailDefects->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NormalProgMotile->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ImmatureForms->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Leucocytes->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Agglutination->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Debris->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Diagnosis->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Observations->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Signature->AdvancedSearch->post())
			$got = TRUE;
		if ($this->SemenOrgin->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Donor->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DonorBloodgroup->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Tank->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Location->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Volume1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Concentration1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Total1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ProgressiveMotility1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NonProgrssiveMotile1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Immotile1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TotalProgrssiveMotile1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TidNo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Color->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DoneBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Method->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Abstinence->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ProcessedBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->InseminationTime->AdvancedSearch->post())
			$got = TRUE;
		if ($this->InseminationBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Big->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Medium->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Small->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NoHalo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Fragmented->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NonFragmented->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DFI->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IsueBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Volume2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Concentration2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Total2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ProgressiveMotility2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NonProgrssiveMotile2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Immotile2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TotalProgrssiveMotile2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IssuedBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IssuedTo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->MACS->AdvancedSearch->post())
			$got = TRUE;
		if (is_array($this->MACS->AdvancedSearch->SearchValue))
			$this->MACS->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->MACS->AdvancedSearch->SearchValue);
		if (is_array($this->MACS->AdvancedSearch->SearchValue2))
			$this->MACS->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->MACS->AdvancedSearch->SearchValue2);
		if ($this->PREG_TEST_DATE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->SPECIFIC_PROBLEMS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IMSC_1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IMSC_2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->LIQUIFACTION_STORAGE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->IUI_PREP_METHOD->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TIME_FROM_TRIGGER->AdvancedSearch->post())
			$got = TRUE;
		if ($this->COLLECTION_TO_PREPARATION->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->post())
			$got = TRUE;
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
		// PaID
		// PaName
		// PaMobile
		// PartnerID
		// PartnerName
		// PartnerMobile
		// RIDNo
		// PatientName
		// HusbandName
		// RequestDr
		// CollectionDate
		// ResultDate
		// RequestSample
		// CollectionType
		// CollectionMethod
		// Medicationused
		// DifficultiesinCollection
		// Volume
		// pH
		// Timeofcollection
		// Timeofexamination
		// Concentration
		// Total
		// ProgressiveMotility
		// NonProgrssiveMotile
		// Immotile
		// TotalProgrssiveMotile
		// Appearance
		// Homogenosity
		// CompleteSample
		// Liquefactiontime
		// Normal
		// Abnormal
		// Headdefects
		// MidpieceDefects
		// TailDefects
		// NormalProgMotile
		// ImmatureForms
		// Leucocytes
		// Agglutination
		// Debris
		// Diagnosis
		// Observations
		// Signature
		// SemenOrgin
		// Donor
		// DonorBloodgroup
		// Tank
		// Location
		// Volume1
		// Concentration1
		// Total1
		// ProgressiveMotility1
		// NonProgrssiveMotile1
		// Immotile1
		// TotalProgrssiveMotile1
		// TidNo
		// Color
		// DoneBy
		// Method
		// Abstinence
		// ProcessedBy
		// InseminationTime
		// InseminationBy
		// Big
		// Medium
		// Small
		// NoHalo
		// Fragmented
		// NonFragmented
		// DFI
		// IsueBy
		// Volume2
		// Concentration2
		// Total2
		// ProgressiveMotility2
		// NonProgrssiveMotile2
		// Immotile2
		// TotalProgrssiveMotile2
		// IssuedBy
		// IssuedTo
		// MACS
		// PREG_TEST_DATE
		// SPECIFIC_PROBLEMS
		// IMSC_1
		// IMSC_2
		// LIQUIFACTION_STORAGE
		// IUI_PREP_METHOD
		// TIME_FROM_TRIGGER
		// COLLECTION_TO_PREPARATION
		// TIME_FROM_PREP_TO_INSEM

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PaID
			$this->PaID->ViewValue = $this->PaID->CurrentValue;
			$this->PaID->ViewCustomAttributes = "";

			// PaName
			$this->PaName->ViewValue = $this->PaName->CurrentValue;
			$this->PaName->ViewCustomAttributes = "";

			// PaMobile
			$this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
			$this->PaMobile->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerMobile
			$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
			$this->PartnerMobile->ViewCustomAttributes = "";

			// RIDNo
			$curVal = strval($this->RIDNo->CurrentValue);
			if ($curVal != "") {
				$this->RIDNo->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
				if ($this->RIDNo->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->RIDNo->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RIDNo->ViewValue = $this->RIDNo->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
					}
				}
			} else {
				$this->RIDNo->ViewValue = NULL;
			}
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$curVal = strval($this->PatientName->CurrentValue);
			if ($curVal != "") {
				$this->PatientName->ViewValue = $this->PatientName->lookupCacheOption($curVal);
				if ($this->PatientName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatientName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatientName->ViewValue = $this->PatientName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
					}
				}
			} else {
				$this->PatientName->ViewValue = NULL;
			}
			$this->PatientName->ViewCustomAttributes = "";

			// HusbandName
			$curVal = strval($this->HusbandName->CurrentValue);
			if ($curVal != "") {
				$this->HusbandName->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
				if ($this->HusbandName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HusbandName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->HusbandName->ViewValue = $this->HusbandName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
					}
				}
			} else {
				$this->HusbandName->ViewValue = NULL;
			}
			$this->HusbandName->ViewCustomAttributes = "";

			// RequestDr
			$this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
			$this->RequestDr->ViewCustomAttributes = "";

			// CollectionDate
			$this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
			$this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 7);
			$this->CollectionDate->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 7);
			$this->ResultDate->ViewCustomAttributes = "";

			// RequestSample
			if (strval($this->RequestSample->CurrentValue) != "") {
				$this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
			} else {
				$this->RequestSample->ViewValue = NULL;
			}
			$this->RequestSample->ViewCustomAttributes = "";

			// CollectionType
			if (strval($this->CollectionType->CurrentValue) != "") {
				$this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
			} else {
				$this->CollectionType->ViewValue = NULL;
			}
			$this->CollectionType->ViewCustomAttributes = "";

			// CollectionMethod
			if (strval($this->CollectionMethod->CurrentValue) != "") {
				$this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
			} else {
				$this->CollectionMethod->ViewValue = NULL;
			}
			$this->CollectionMethod->ViewCustomAttributes = "";

			// Medicationused
			$curVal = strval($this->Medicationused->CurrentValue);
			if ($curVal != "") {
				$this->Medicationused->ViewValue = $this->Medicationused->lookupCacheOption($curVal);
				if ($this->Medicationused->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Medication`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicationused->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Medicationused->ViewValue = $this->Medicationused->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicationused->ViewValue = $this->Medicationused->CurrentValue;
					}
				}
			} else {
				$this->Medicationused->ViewValue = NULL;
			}
			$this->Medicationused->ViewCustomAttributes = "";

			// DifficultiesinCollection
			if (strval($this->DifficultiesinCollection->CurrentValue) != "") {
				$this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
			} else {
				$this->DifficultiesinCollection->ViewValue = NULL;
			}
			$this->DifficultiesinCollection->ViewCustomAttributes = "";

			// Volume
			$this->Volume->ViewValue = $this->Volume->CurrentValue;
			$this->Volume->ViewCustomAttributes = "";

			// pH
			$this->pH->ViewValue = $this->pH->CurrentValue;
			$this->pH->ViewCustomAttributes = "";

			// Timeofcollection
			$this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
			$this->Timeofcollection->ViewCustomAttributes = "";

			// Timeofexamination
			$this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
			$this->Timeofexamination->ViewCustomAttributes = "";

			// Concentration
			$this->Concentration->ViewValue = $this->Concentration->CurrentValue;
			$this->Concentration->ViewCustomAttributes = "";

			// Total
			$this->Total->ViewValue = $this->Total->CurrentValue;
			$this->Total->ViewCustomAttributes = "";

			// ProgressiveMotility
			$this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
			$this->ProgressiveMotility->ViewCustomAttributes = "";

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
			$this->NonProgrssiveMotile->ViewCustomAttributes = "";

			// Immotile
			$this->Immotile->ViewValue = $this->Immotile->CurrentValue;
			$this->Immotile->ViewCustomAttributes = "";

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
			$this->TotalProgrssiveMotile->ViewCustomAttributes = "";

			// Appearance
			$this->Appearance->ViewValue = $this->Appearance->CurrentValue;
			$this->Appearance->ViewCustomAttributes = "";

			// Homogenosity
			if (strval($this->Homogenosity->CurrentValue) != "") {
				$this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
			} else {
				$this->Homogenosity->ViewValue = NULL;
			}
			$this->Homogenosity->ViewCustomAttributes = "";

			// CompleteSample
			if (strval($this->CompleteSample->CurrentValue) != "") {
				$this->CompleteSample->ViewValue = $this->CompleteSample->optionCaption($this->CompleteSample->CurrentValue);
			} else {
				$this->CompleteSample->ViewValue = NULL;
			}
			$this->CompleteSample->ViewCustomAttributes = "";

			// Liquefactiontime
			$this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
			$this->Liquefactiontime->ViewCustomAttributes = "";

			// Normal
			$this->Normal->ViewValue = $this->Normal->CurrentValue;
			$this->Normal->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// Headdefects
			$this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
			$this->Headdefects->ViewCustomAttributes = "";

			// MidpieceDefects
			$this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
			$this->MidpieceDefects->ViewCustomAttributes = "";

			// TailDefects
			$this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
			$this->TailDefects->ViewCustomAttributes = "";

			// NormalProgMotile
			$this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
			$this->NormalProgMotile->ViewCustomAttributes = "";

			// ImmatureForms
			$this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
			$this->ImmatureForms->ViewCustomAttributes = "";

			// Leucocytes
			$this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
			$this->Leucocytes->ViewCustomAttributes = "";

			// Agglutination
			$this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
			$this->Agglutination->ViewCustomAttributes = "";

			// Debris
			$this->Debris->ViewValue = $this->Debris->CurrentValue;
			$this->Debris->ViewCustomAttributes = "";

			// Diagnosis
			$this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
			$this->Diagnosis->ViewCustomAttributes = "";

			// Observations
			$this->Observations->ViewValue = $this->Observations->CurrentValue;
			$this->Observations->ViewCustomAttributes = "";

			// Signature
			$this->Signature->ViewValue = $this->Signature->CurrentValue;
			$this->Signature->ViewCustomAttributes = "";

			// SemenOrgin
			if (strval($this->SemenOrgin->CurrentValue) != "") {
				$this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
			} else {
				$this->SemenOrgin->ViewValue = NULL;
			}
			$this->SemenOrgin->ViewCustomAttributes = "";

			// Donor
			$curVal = strval($this->Donor->CurrentValue);
			if ($curVal != "") {
				$this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
				if ($this->Donor->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Donor->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Donor->ViewValue = $this->Donor->CurrentValue;
					}
				}
			} else {
				$this->Donor->ViewValue = NULL;
			}
			$this->Donor->ViewCustomAttributes = "";

			// DonorBloodgroup
			$this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
			$this->DonorBloodgroup->ViewCustomAttributes = "";

			// Tank
			$this->Tank->ViewValue = $this->Tank->CurrentValue;
			$this->Tank->ViewCustomAttributes = "";

			// Location
			$this->Location->ViewValue = $this->Location->CurrentValue;
			$this->Location->ViewCustomAttributes = "";

			// Volume1
			$this->Volume1->ViewValue = $this->Volume1->CurrentValue;
			$this->Volume1->ViewCustomAttributes = "";

			// Concentration1
			$this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
			$this->Concentration1->ViewCustomAttributes = "";

			// Total1
			$this->Total1->ViewValue = $this->Total1->CurrentValue;
			$this->Total1->ViewCustomAttributes = "";

			// ProgressiveMotility1
			$this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
			$this->ProgressiveMotility1->ViewCustomAttributes = "";

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
			$this->NonProgrssiveMotile1->ViewCustomAttributes = "";

			// Immotile1
			$this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
			$this->Immotile1->ViewCustomAttributes = "";

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
			$this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Color
			$this->Color->ViewValue = $this->Color->CurrentValue;
			$this->Color->ViewCustomAttributes = "";

			// DoneBy
			$this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
			$this->DoneBy->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Abstinence
			$this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
			$this->Abstinence->ViewCustomAttributes = "";

			// ProcessedBy
			$this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
			$this->ProcessedBy->ViewCustomAttributes = "";

			// InseminationTime
			$this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
			$this->InseminationTime->ViewCustomAttributes = "";

			// InseminationBy
			$this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
			$this->InseminationBy->ViewCustomAttributes = "";

			// Big
			$this->Big->ViewValue = $this->Big->CurrentValue;
			$this->Big->ViewCustomAttributes = "";

			// Medium
			$this->Medium->ViewValue = $this->Medium->CurrentValue;
			$this->Medium->ViewCustomAttributes = "";

			// Small
			$this->Small->ViewValue = $this->Small->CurrentValue;
			$this->Small->ViewCustomAttributes = "";

			// NoHalo
			$this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
			$this->NoHalo->ViewCustomAttributes = "";

			// Fragmented
			$this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
			$this->Fragmented->ViewCustomAttributes = "";

			// NonFragmented
			$this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
			$this->NonFragmented->ViewCustomAttributes = "";

			// DFI
			$this->DFI->ViewValue = $this->DFI->CurrentValue;
			$this->DFI->ViewCustomAttributes = "";

			// IsueBy
			$this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
			$this->IsueBy->ViewCustomAttributes = "";

			// Volume2
			$this->Volume2->ViewValue = $this->Volume2->CurrentValue;
			$this->Volume2->ViewCustomAttributes = "";

			// Concentration2
			$this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
			$this->Concentration2->ViewCustomAttributes = "";

			// Total2
			$this->Total2->ViewValue = $this->Total2->CurrentValue;
			$this->Total2->ViewCustomAttributes = "";

			// ProgressiveMotility2
			$this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
			$this->ProgressiveMotility2->ViewCustomAttributes = "";

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
			$this->NonProgrssiveMotile2->ViewCustomAttributes = "";

			// Immotile2
			$this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
			$this->Immotile2->ViewCustomAttributes = "";

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
			$this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

			// IssuedBy
			$this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
			$this->IssuedBy->ViewCustomAttributes = "";

			// IssuedTo
			$this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
			$this->IssuedTo->ViewCustomAttributes = "";

			// MACS
			if (strval($this->MACS->CurrentValue) != "") {
				$this->MACS->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->MACS->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->MACS->ViewValue->add($this->MACS->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->MACS->ViewValue = NULL;
			}
			$this->MACS->ViewCustomAttributes = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
			$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
			$this->PREG_TEST_DATE->ViewCustomAttributes = "";

			// SPECIFIC_PROBLEMS
			if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) != "") {
				$this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->optionCaption($this->SPECIFIC_PROBLEMS->CurrentValue);
			} else {
				$this->SPECIFIC_PROBLEMS->ViewValue = NULL;
			}
			$this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

			// IMSC_1
			$this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
			$this->IMSC_1->ViewCustomAttributes = "";

			// IMSC_2
			$this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
			$this->IMSC_2->ViewCustomAttributes = "";

			// LIQUIFACTION_STORAGE
			if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) != "") {
				$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
			} else {
				$this->LIQUIFACTION_STORAGE->ViewValue = NULL;
			}
			$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

			// IUI_PREP_METHOD
			if (strval($this->IUI_PREP_METHOD->CurrentValue) != "") {
				$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
			} else {
				$this->IUI_PREP_METHOD->ViewValue = NULL;
			}
			$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

			// TIME_FROM_TRIGGER
			if (strval($this->TIME_FROM_TRIGGER->CurrentValue) != "") {
				$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
			} else {
				$this->TIME_FROM_TRIGGER->ViewValue = NULL;
			}
			$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

			// COLLECTION_TO_PREPARATION
			if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) != "") {
				$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
			} else {
				$this->COLLECTION_TO_PREPARATION->ViewValue = NULL;
			}
			$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

			// TIME_FROM_PREP_TO_INSEM
			if (strval($this->TIME_FROM_PREP_TO_INSEM->CurrentValue) != "") {
				$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->optionCaption($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
			} else {
				$this->TIME_FROM_PREP_TO_INSEM->ViewValue = NULL;
			}
			$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PaID
			$this->PaID->LinkCustomAttributes = "";
			$this->PaID->HrefValue = "";
			$this->PaID->TooltipValue = "";

			// PaName
			$this->PaName->LinkCustomAttributes = "";
			$this->PaName->HrefValue = "";
			$this->PaName->TooltipValue = "";

			// PaMobile
			$this->PaMobile->LinkCustomAttributes = "";
			$this->PaMobile->HrefValue = "";
			$this->PaMobile->TooltipValue = "";

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

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// HusbandName
			$this->HusbandName->LinkCustomAttributes = "";
			$this->HusbandName->HrefValue = "";
			$this->HusbandName->TooltipValue = "";

			// RequestDr
			$this->RequestDr->LinkCustomAttributes = "";
			$this->RequestDr->HrefValue = "";
			$this->RequestDr->TooltipValue = "";

			// CollectionDate
			$this->CollectionDate->LinkCustomAttributes = "";
			$this->CollectionDate->HrefValue = "";
			$this->CollectionDate->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// RequestSample
			$this->RequestSample->LinkCustomAttributes = "";
			$this->RequestSample->HrefValue = "";
			$this->RequestSample->TooltipValue = "";

			// CollectionType
			$this->CollectionType->LinkCustomAttributes = "";
			$this->CollectionType->HrefValue = "";
			$this->CollectionType->TooltipValue = "";

			// CollectionMethod
			$this->CollectionMethod->LinkCustomAttributes = "";
			$this->CollectionMethod->HrefValue = "";
			$this->CollectionMethod->TooltipValue = "";

			// Medicationused
			$this->Medicationused->LinkCustomAttributes = "";
			$this->Medicationused->HrefValue = "";
			$this->Medicationused->TooltipValue = "";

			// DifficultiesinCollection
			$this->DifficultiesinCollection->LinkCustomAttributes = "";
			$this->DifficultiesinCollection->HrefValue = "";
			$this->DifficultiesinCollection->TooltipValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";
			$this->Volume->TooltipValue = "";

			// pH
			$this->pH->LinkCustomAttributes = "";
			$this->pH->HrefValue = "";
			$this->pH->TooltipValue = "";

			// Timeofcollection
			$this->Timeofcollection->LinkCustomAttributes = "";
			$this->Timeofcollection->HrefValue = "";
			$this->Timeofcollection->TooltipValue = "";

			// Timeofexamination
			$this->Timeofexamination->LinkCustomAttributes = "";
			$this->Timeofexamination->HrefValue = "";
			$this->Timeofexamination->TooltipValue = "";

			// Concentration
			$this->Concentration->LinkCustomAttributes = "";
			$this->Concentration->HrefValue = "";
			$this->Concentration->TooltipValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";
			$this->Total->TooltipValue = "";

			// ProgressiveMotility
			$this->ProgressiveMotility->LinkCustomAttributes = "";
			$this->ProgressiveMotility->HrefValue = "";
			$this->ProgressiveMotility->TooltipValue = "";

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile->HrefValue = "";
			$this->NonProgrssiveMotile->TooltipValue = "";

			// Immotile
			$this->Immotile->LinkCustomAttributes = "";
			$this->Immotile->HrefValue = "";
			$this->Immotile->TooltipValue = "";

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile->HrefValue = "";
			$this->TotalProgrssiveMotile->TooltipValue = "";

			// Appearance
			$this->Appearance->LinkCustomAttributes = "";
			$this->Appearance->HrefValue = "";
			$this->Appearance->TooltipValue = "";

			// Homogenosity
			$this->Homogenosity->LinkCustomAttributes = "";
			$this->Homogenosity->HrefValue = "";
			$this->Homogenosity->TooltipValue = "";

			// CompleteSample
			$this->CompleteSample->LinkCustomAttributes = "";
			$this->CompleteSample->HrefValue = "";
			$this->CompleteSample->TooltipValue = "";

			// Liquefactiontime
			$this->Liquefactiontime->LinkCustomAttributes = "";
			$this->Liquefactiontime->HrefValue = "";
			$this->Liquefactiontime->TooltipValue = "";

			// Normal
			$this->Normal->LinkCustomAttributes = "";
			$this->Normal->HrefValue = "";
			$this->Normal->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";

			// Headdefects
			$this->Headdefects->LinkCustomAttributes = "";
			$this->Headdefects->HrefValue = "";
			$this->Headdefects->TooltipValue = "";

			// MidpieceDefects
			$this->MidpieceDefects->LinkCustomAttributes = "";
			$this->MidpieceDefects->HrefValue = "";
			$this->MidpieceDefects->TooltipValue = "";

			// TailDefects
			$this->TailDefects->LinkCustomAttributes = "";
			$this->TailDefects->HrefValue = "";
			$this->TailDefects->TooltipValue = "";

			// NormalProgMotile
			$this->NormalProgMotile->LinkCustomAttributes = "";
			$this->NormalProgMotile->HrefValue = "";
			$this->NormalProgMotile->TooltipValue = "";

			// ImmatureForms
			$this->ImmatureForms->LinkCustomAttributes = "";
			$this->ImmatureForms->HrefValue = "";
			$this->ImmatureForms->TooltipValue = "";

			// Leucocytes
			$this->Leucocytes->LinkCustomAttributes = "";
			$this->Leucocytes->HrefValue = "";
			$this->Leucocytes->TooltipValue = "";

			// Agglutination
			$this->Agglutination->LinkCustomAttributes = "";
			$this->Agglutination->HrefValue = "";
			$this->Agglutination->TooltipValue = "";

			// Debris
			$this->Debris->LinkCustomAttributes = "";
			$this->Debris->HrefValue = "";
			$this->Debris->TooltipValue = "";

			// Diagnosis
			$this->Diagnosis->LinkCustomAttributes = "";
			$this->Diagnosis->HrefValue = "";
			$this->Diagnosis->TooltipValue = "";

			// Observations
			$this->Observations->LinkCustomAttributes = "";
			$this->Observations->HrefValue = "";
			$this->Observations->TooltipValue = "";

			// Signature
			$this->Signature->LinkCustomAttributes = "";
			$this->Signature->HrefValue = "";
			$this->Signature->TooltipValue = "";

			// SemenOrgin
			$this->SemenOrgin->LinkCustomAttributes = "";
			$this->SemenOrgin->HrefValue = "";
			$this->SemenOrgin->TooltipValue = "";

			// Donor
			$this->Donor->LinkCustomAttributes = "";
			$this->Donor->HrefValue = "";
			$this->Donor->TooltipValue = "";

			// DonorBloodgroup
			$this->DonorBloodgroup->LinkCustomAttributes = "";
			$this->DonorBloodgroup->HrefValue = "";
			$this->DonorBloodgroup->TooltipValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";
			$this->Tank->TooltipValue = "";

			// Location
			$this->Location->LinkCustomAttributes = "";
			$this->Location->HrefValue = "";
			$this->Location->TooltipValue = "";

			// Volume1
			$this->Volume1->LinkCustomAttributes = "";
			$this->Volume1->HrefValue = "";
			$this->Volume1->TooltipValue = "";

			// Concentration1
			$this->Concentration1->LinkCustomAttributes = "";
			$this->Concentration1->HrefValue = "";
			$this->Concentration1->TooltipValue = "";

			// Total1
			$this->Total1->LinkCustomAttributes = "";
			$this->Total1->HrefValue = "";
			$this->Total1->TooltipValue = "";

			// ProgressiveMotility1
			$this->ProgressiveMotility1->LinkCustomAttributes = "";
			$this->ProgressiveMotility1->HrefValue = "";
			$this->ProgressiveMotility1->TooltipValue = "";

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile1->HrefValue = "";
			$this->NonProgrssiveMotile1->TooltipValue = "";

			// Immotile1
			$this->Immotile1->LinkCustomAttributes = "";
			$this->Immotile1->HrefValue = "";
			$this->Immotile1->TooltipValue = "";

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile1->HrefValue = "";
			$this->TotalProgrssiveMotile1->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Color
			$this->Color->LinkCustomAttributes = "";
			$this->Color->HrefValue = "";
			$this->Color->TooltipValue = "";

			// DoneBy
			$this->DoneBy->LinkCustomAttributes = "";
			$this->DoneBy->HrefValue = "";
			$this->DoneBy->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Abstinence
			$this->Abstinence->LinkCustomAttributes = "";
			$this->Abstinence->HrefValue = "";
			$this->Abstinence->TooltipValue = "";

			// ProcessedBy
			$this->ProcessedBy->LinkCustomAttributes = "";
			$this->ProcessedBy->HrefValue = "";
			$this->ProcessedBy->TooltipValue = "";

			// InseminationTime
			$this->InseminationTime->LinkCustomAttributes = "";
			$this->InseminationTime->HrefValue = "";
			$this->InseminationTime->TooltipValue = "";

			// InseminationBy
			$this->InseminationBy->LinkCustomAttributes = "";
			$this->InseminationBy->HrefValue = "";
			$this->InseminationBy->TooltipValue = "";

			// Big
			$this->Big->LinkCustomAttributes = "";
			$this->Big->HrefValue = "";
			$this->Big->TooltipValue = "";

			// Medium
			$this->Medium->LinkCustomAttributes = "";
			$this->Medium->HrefValue = "";
			$this->Medium->TooltipValue = "";

			// Small
			$this->Small->LinkCustomAttributes = "";
			$this->Small->HrefValue = "";
			$this->Small->TooltipValue = "";

			// NoHalo
			$this->NoHalo->LinkCustomAttributes = "";
			$this->NoHalo->HrefValue = "";
			$this->NoHalo->TooltipValue = "";

			// Fragmented
			$this->Fragmented->LinkCustomAttributes = "";
			$this->Fragmented->HrefValue = "";
			$this->Fragmented->TooltipValue = "";

			// NonFragmented
			$this->NonFragmented->LinkCustomAttributes = "";
			$this->NonFragmented->HrefValue = "";
			$this->NonFragmented->TooltipValue = "";

			// DFI
			$this->DFI->LinkCustomAttributes = "";
			$this->DFI->HrefValue = "";
			$this->DFI->TooltipValue = "";

			// IsueBy
			$this->IsueBy->LinkCustomAttributes = "";
			$this->IsueBy->HrefValue = "";
			$this->IsueBy->TooltipValue = "";

			// Volume2
			$this->Volume2->LinkCustomAttributes = "";
			$this->Volume2->HrefValue = "";
			$this->Volume2->TooltipValue = "";

			// Concentration2
			$this->Concentration2->LinkCustomAttributes = "";
			$this->Concentration2->HrefValue = "";
			$this->Concentration2->TooltipValue = "";

			// Total2
			$this->Total2->LinkCustomAttributes = "";
			$this->Total2->HrefValue = "";
			$this->Total2->TooltipValue = "";

			// ProgressiveMotility2
			$this->ProgressiveMotility2->LinkCustomAttributes = "";
			$this->ProgressiveMotility2->HrefValue = "";
			$this->ProgressiveMotility2->TooltipValue = "";

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile2->HrefValue = "";
			$this->NonProgrssiveMotile2->TooltipValue = "";

			// Immotile2
			$this->Immotile2->LinkCustomAttributes = "";
			$this->Immotile2->HrefValue = "";
			$this->Immotile2->TooltipValue = "";

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile2->HrefValue = "";
			$this->TotalProgrssiveMotile2->TooltipValue = "";

			// IssuedBy
			$this->IssuedBy->LinkCustomAttributes = "";
			$this->IssuedBy->HrefValue = "";
			$this->IssuedBy->TooltipValue = "";

			// IssuedTo
			$this->IssuedTo->LinkCustomAttributes = "";
			$this->IssuedTo->HrefValue = "";
			$this->IssuedTo->TooltipValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";
			$this->MACS->TooltipValue = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->LinkCustomAttributes = "";
			$this->PREG_TEST_DATE->HrefValue = "";
			$this->PREG_TEST_DATE->TooltipValue = "";

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_PROBLEMS->TooltipValue = "";

			// IMSC_1
			$this->IMSC_1->LinkCustomAttributes = "";
			$this->IMSC_1->HrefValue = "";
			$this->IMSC_1->TooltipValue = "";

			// IMSC_2
			$this->IMSC_2->LinkCustomAttributes = "";
			$this->IMSC_2->HrefValue = "";
			$this->IMSC_2->TooltipValue = "";

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
			$this->LIQUIFACTION_STORAGE->HrefValue = "";
			$this->LIQUIFACTION_STORAGE->TooltipValue = "";

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->LinkCustomAttributes = "";
			$this->IUI_PREP_METHOD->HrefValue = "";
			$this->IUI_PREP_METHOD->TooltipValue = "";

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
			$this->TIME_FROM_TRIGGER->HrefValue = "";
			$this->TIME_FROM_TRIGGER->TooltipValue = "";

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
			$this->COLLECTION_TO_PREPARATION->HrefValue = "";
			$this->COLLECTION_TO_PREPARATION->TooltipValue = "";

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
			$this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
			$this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PaID
			$this->PaID->EditAttrs["class"] = "form-control";
			$this->PaID->EditCustomAttributes = "";
			if (!$this->PaID->Raw)
				$this->PaID->AdvancedSearch->SearchValue = HtmlDecode($this->PaID->AdvancedSearch->SearchValue);
			$this->PaID->EditValue = HtmlEncode($this->PaID->AdvancedSearch->SearchValue);
			$this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

			// PaName
			$this->PaName->EditAttrs["class"] = "form-control";
			$this->PaName->EditCustomAttributes = "";
			if (!$this->PaName->Raw)
				$this->PaName->AdvancedSearch->SearchValue = HtmlDecode($this->PaName->AdvancedSearch->SearchValue);
			$this->PaName->EditValue = HtmlEncode($this->PaName->AdvancedSearch->SearchValue);
			$this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

			// PaMobile
			$this->PaMobile->EditAttrs["class"] = "form-control";
			$this->PaMobile->EditCustomAttributes = "";
			if (!$this->PaMobile->Raw)
				$this->PaMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PaMobile->AdvancedSearch->SearchValue);
			$this->PaMobile->EditValue = HtmlEncode($this->PaMobile->AdvancedSearch->SearchValue);
			$this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

			// PartnerID
			$this->PartnerID->EditAttrs["class"] = "form-control";
			$this->PartnerID->EditCustomAttributes = "";
			if (!$this->PartnerID->Raw)
				$this->PartnerID->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerID->AdvancedSearch->SearchValue);
			$this->PartnerID->EditValue = HtmlEncode($this->PartnerID->AdvancedSearch->SearchValue);
			$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (!$this->PartnerName->Raw)
				$this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PartnerMobile
			$this->PartnerMobile->EditAttrs["class"] = "form-control";
			$this->PartnerMobile->EditCustomAttributes = "";
			if (!$this->PartnerMobile->Raw)
				$this->PartnerMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerMobile->AdvancedSearch->SearchValue);
			$this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->AdvancedSearch->SearchValue);
			$this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

			// RIDNo
			$this->RIDNo->EditCustomAttributes = "";
			$curVal = trim(strval($this->RIDNo->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->RIDNo->AdvancedSearch->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
			else
				$this->RIDNo->AdvancedSearch->ViewValue = $this->RIDNo->Lookup !== NULL && is_array($this->RIDNo->Lookup->Options) ? $curVal : NULL;
			if ($this->RIDNo->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->RIDNo->EditValue = array_values($this->RIDNo->Lookup->Options);
				if ($this->RIDNo->AdvancedSearch->ViewValue == "")
					$this->RIDNo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->RIDNo->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->RIDNo->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->RIDNo->AdvancedSearch->ViewValue = $this->RIDNo->displayValue($arwrk);
				} else {
					$this->RIDNo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->RIDNo->EditValue = $arwrk;
			}

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$curVal = strval($this->PatientName->AdvancedSearch->SearchValue);
			if ($curVal != "") {
				$this->PatientName->EditValue = $this->PatientName->lookupCacheOption($curVal);
				if ($this->PatientName->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatientName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
						$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
						$this->PatientName->EditValue = $this->PatientName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->PatientName->EditValue = NULL;
			}
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// HusbandName
			$this->HusbandName->EditCustomAttributes = "";
			$curVal = trim(strval($this->HusbandName->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->HusbandName->AdvancedSearch->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
			else
				$this->HusbandName->AdvancedSearch->ViewValue = $this->HusbandName->Lookup !== NULL && is_array($this->HusbandName->Lookup->Options) ? $curVal : NULL;
			if ($this->HusbandName->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->HusbandName->EditValue = array_values($this->HusbandName->Lookup->Options);
				if ($this->HusbandName->AdvancedSearch->ViewValue == "")
					$this->HusbandName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HusbandName->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HusbandName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->HusbandName->AdvancedSearch->ViewValue = $this->HusbandName->displayValue($arwrk);
				} else {
					$this->HusbandName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->HusbandName->EditValue = $arwrk;
			}

			// RequestDr
			$this->RequestDr->EditAttrs["class"] = "form-control";
			$this->RequestDr->EditCustomAttributes = "";
			if (!$this->RequestDr->Raw)
				$this->RequestDr->AdvancedSearch->SearchValue = HtmlDecode($this->RequestDr->AdvancedSearch->SearchValue);
			$this->RequestDr->EditValue = HtmlEncode($this->RequestDr->AdvancedSearch->SearchValue);
			$this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

			// CollectionDate
			$this->CollectionDate->EditAttrs["class"] = "form-control";
			$this->CollectionDate->EditCustomAttributes = "";
			$this->CollectionDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CollectionDate->AdvancedSearch->SearchValue, 7), 7));
			$this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 7), 7));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// RequestSample
			$this->RequestSample->EditAttrs["class"] = "form-control";
			$this->RequestSample->EditCustomAttributes = "";
			$this->RequestSample->EditValue = $this->RequestSample->options(TRUE);

			// CollectionType
			$this->CollectionType->EditAttrs["class"] = "form-control";
			$this->CollectionType->EditCustomAttributes = "";
			$this->CollectionType->EditValue = $this->CollectionType->options(TRUE);

			// CollectionMethod
			$this->CollectionMethod->EditAttrs["class"] = "form-control";
			$this->CollectionMethod->EditCustomAttributes = "";
			$this->CollectionMethod->EditValue = $this->CollectionMethod->options(TRUE);

			// Medicationused
			$this->Medicationused->EditAttrs["class"] = "form-control";
			$this->Medicationused->EditCustomAttributes = "";
			$curVal = trim(strval($this->Medicationused->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Medicationused->AdvancedSearch->ViewValue = $this->Medicationused->lookupCacheOption($curVal);
			else
				$this->Medicationused->AdvancedSearch->ViewValue = $this->Medicationused->Lookup !== NULL && is_array($this->Medicationused->Lookup->Options) ? $curVal : NULL;
			if ($this->Medicationused->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Medicationused->EditValue = array_values($this->Medicationused->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Medication`" . SearchString("=", $this->Medicationused->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Medicationused->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Medicationused->EditValue = $arwrk;
			}

			// DifficultiesinCollection
			$this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
			$this->DifficultiesinCollection->EditCustomAttributes = "";
			$this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(TRUE);

			// Volume
			$this->Volume->EditAttrs["class"] = "form-control";
			$this->Volume->EditCustomAttributes = "";
			if (!$this->Volume->Raw)
				$this->Volume->AdvancedSearch->SearchValue = HtmlDecode($this->Volume->AdvancedSearch->SearchValue);
			$this->Volume->EditValue = HtmlEncode($this->Volume->AdvancedSearch->SearchValue);
			$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

			// pH
			$this->pH->EditAttrs["class"] = "form-control";
			$this->pH->EditCustomAttributes = "";
			if (!$this->pH->Raw)
				$this->pH->AdvancedSearch->SearchValue = HtmlDecode($this->pH->AdvancedSearch->SearchValue);
			$this->pH->EditValue = HtmlEncode($this->pH->AdvancedSearch->SearchValue);
			$this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

			// Timeofcollection
			$this->Timeofcollection->EditAttrs["class"] = "form-control";
			$this->Timeofcollection->EditCustomAttributes = "";
			if (!$this->Timeofcollection->Raw)
				$this->Timeofcollection->AdvancedSearch->SearchValue = HtmlDecode($this->Timeofcollection->AdvancedSearch->SearchValue);
			$this->Timeofcollection->EditValue = HtmlEncode($this->Timeofcollection->AdvancedSearch->SearchValue);
			$this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

			// Timeofexamination
			$this->Timeofexamination->EditAttrs["class"] = "form-control";
			$this->Timeofexamination->EditCustomAttributes = "";
			if (!$this->Timeofexamination->Raw)
				$this->Timeofexamination->AdvancedSearch->SearchValue = HtmlDecode($this->Timeofexamination->AdvancedSearch->SearchValue);
			$this->Timeofexamination->EditValue = HtmlEncode($this->Timeofexamination->AdvancedSearch->SearchValue);
			$this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

			// Concentration
			$this->Concentration->EditAttrs["class"] = "form-control";
			$this->Concentration->EditCustomAttributes = "";
			if (!$this->Concentration->Raw)
				$this->Concentration->AdvancedSearch->SearchValue = HtmlDecode($this->Concentration->AdvancedSearch->SearchValue);
			$this->Concentration->EditValue = HtmlEncode($this->Concentration->AdvancedSearch->SearchValue);
			$this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

			// Total
			$this->Total->EditAttrs["class"] = "form-control";
			$this->Total->EditCustomAttributes = "";
			if (!$this->Total->Raw)
				$this->Total->AdvancedSearch->SearchValue = HtmlDecode($this->Total->AdvancedSearch->SearchValue);
			$this->Total->EditValue = HtmlEncode($this->Total->AdvancedSearch->SearchValue);
			$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

			// ProgressiveMotility
			$this->ProgressiveMotility->EditAttrs["class"] = "form-control";
			$this->ProgressiveMotility->EditCustomAttributes = "";
			if (!$this->ProgressiveMotility->Raw)
				$this->ProgressiveMotility->AdvancedSearch->SearchValue = HtmlDecode($this->ProgressiveMotility->AdvancedSearch->SearchValue);
			$this->ProgressiveMotility->EditValue = HtmlEncode($this->ProgressiveMotility->AdvancedSearch->SearchValue);
			$this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
			$this->NonProgrssiveMotile->EditCustomAttributes = "";
			if (!$this->NonProgrssiveMotile->Raw)
				$this->NonProgrssiveMotile->AdvancedSearch->SearchValue = HtmlDecode($this->NonProgrssiveMotile->AdvancedSearch->SearchValue);
			$this->NonProgrssiveMotile->EditValue = HtmlEncode($this->NonProgrssiveMotile->AdvancedSearch->SearchValue);
			$this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

			// Immotile
			$this->Immotile->EditAttrs["class"] = "form-control";
			$this->Immotile->EditCustomAttributes = "";
			if (!$this->Immotile->Raw)
				$this->Immotile->AdvancedSearch->SearchValue = HtmlDecode($this->Immotile->AdvancedSearch->SearchValue);
			$this->Immotile->EditValue = HtmlEncode($this->Immotile->AdvancedSearch->SearchValue);
			$this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
			$this->TotalProgrssiveMotile->EditCustomAttributes = "";
			if (!$this->TotalProgrssiveMotile->Raw)
				$this->TotalProgrssiveMotile->AdvancedSearch->SearchValue = HtmlDecode($this->TotalProgrssiveMotile->AdvancedSearch->SearchValue);
			$this->TotalProgrssiveMotile->EditValue = HtmlEncode($this->TotalProgrssiveMotile->AdvancedSearch->SearchValue);
			$this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

			// Appearance
			$this->Appearance->EditAttrs["class"] = "form-control";
			$this->Appearance->EditCustomAttributes = "";
			if (!$this->Appearance->Raw)
				$this->Appearance->AdvancedSearch->SearchValue = HtmlDecode($this->Appearance->AdvancedSearch->SearchValue);
			$this->Appearance->EditValue = HtmlEncode($this->Appearance->AdvancedSearch->SearchValue);
			$this->Appearance->PlaceHolder = RemoveHtml($this->Appearance->caption());

			// Homogenosity
			$this->Homogenosity->EditAttrs["class"] = "form-control";
			$this->Homogenosity->EditCustomAttributes = "";
			$this->Homogenosity->EditValue = $this->Homogenosity->options(TRUE);

			// CompleteSample
			$this->CompleteSample->EditAttrs["class"] = "form-control";
			$this->CompleteSample->EditCustomAttributes = "";
			$this->CompleteSample->EditValue = $this->CompleteSample->options(TRUE);

			// Liquefactiontime
			$this->Liquefactiontime->EditAttrs["class"] = "form-control";
			$this->Liquefactiontime->EditCustomAttributes = "";
			if (!$this->Liquefactiontime->Raw)
				$this->Liquefactiontime->AdvancedSearch->SearchValue = HtmlDecode($this->Liquefactiontime->AdvancedSearch->SearchValue);
			$this->Liquefactiontime->EditValue = HtmlEncode($this->Liquefactiontime->AdvancedSearch->SearchValue);
			$this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

			// Normal
			$this->Normal->EditAttrs["class"] = "form-control";
			$this->Normal->EditCustomAttributes = "";
			if (!$this->Normal->Raw)
				$this->Normal->AdvancedSearch->SearchValue = HtmlDecode($this->Normal->AdvancedSearch->SearchValue);
			$this->Normal->EditValue = HtmlEncode($this->Normal->AdvancedSearch->SearchValue);
			$this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// Headdefects
			$this->Headdefects->EditAttrs["class"] = "form-control";
			$this->Headdefects->EditCustomAttributes = "";
			if (!$this->Headdefects->Raw)
				$this->Headdefects->AdvancedSearch->SearchValue = HtmlDecode($this->Headdefects->AdvancedSearch->SearchValue);
			$this->Headdefects->EditValue = HtmlEncode($this->Headdefects->AdvancedSearch->SearchValue);
			$this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

			// MidpieceDefects
			$this->MidpieceDefects->EditAttrs["class"] = "form-control";
			$this->MidpieceDefects->EditCustomAttributes = "";
			if (!$this->MidpieceDefects->Raw)
				$this->MidpieceDefects->AdvancedSearch->SearchValue = HtmlDecode($this->MidpieceDefects->AdvancedSearch->SearchValue);
			$this->MidpieceDefects->EditValue = HtmlEncode($this->MidpieceDefects->AdvancedSearch->SearchValue);
			$this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

			// TailDefects
			$this->TailDefects->EditAttrs["class"] = "form-control";
			$this->TailDefects->EditCustomAttributes = "";
			if (!$this->TailDefects->Raw)
				$this->TailDefects->AdvancedSearch->SearchValue = HtmlDecode($this->TailDefects->AdvancedSearch->SearchValue);
			$this->TailDefects->EditValue = HtmlEncode($this->TailDefects->AdvancedSearch->SearchValue);
			$this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

			// NormalProgMotile
			$this->NormalProgMotile->EditAttrs["class"] = "form-control";
			$this->NormalProgMotile->EditCustomAttributes = "";
			if (!$this->NormalProgMotile->Raw)
				$this->NormalProgMotile->AdvancedSearch->SearchValue = HtmlDecode($this->NormalProgMotile->AdvancedSearch->SearchValue);
			$this->NormalProgMotile->EditValue = HtmlEncode($this->NormalProgMotile->AdvancedSearch->SearchValue);
			$this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

			// ImmatureForms
			$this->ImmatureForms->EditAttrs["class"] = "form-control";
			$this->ImmatureForms->EditCustomAttributes = "";
			if (!$this->ImmatureForms->Raw)
				$this->ImmatureForms->AdvancedSearch->SearchValue = HtmlDecode($this->ImmatureForms->AdvancedSearch->SearchValue);
			$this->ImmatureForms->EditValue = HtmlEncode($this->ImmatureForms->AdvancedSearch->SearchValue);
			$this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

			// Leucocytes
			$this->Leucocytes->EditAttrs["class"] = "form-control";
			$this->Leucocytes->EditCustomAttributes = "";
			if (!$this->Leucocytes->Raw)
				$this->Leucocytes->AdvancedSearch->SearchValue = HtmlDecode($this->Leucocytes->AdvancedSearch->SearchValue);
			$this->Leucocytes->EditValue = HtmlEncode($this->Leucocytes->AdvancedSearch->SearchValue);
			$this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

			// Agglutination
			$this->Agglutination->EditAttrs["class"] = "form-control";
			$this->Agglutination->EditCustomAttributes = "";
			if (!$this->Agglutination->Raw)
				$this->Agglutination->AdvancedSearch->SearchValue = HtmlDecode($this->Agglutination->AdvancedSearch->SearchValue);
			$this->Agglutination->EditValue = HtmlEncode($this->Agglutination->AdvancedSearch->SearchValue);
			$this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

			// Debris
			$this->Debris->EditAttrs["class"] = "form-control";
			$this->Debris->EditCustomAttributes = "";
			if (!$this->Debris->Raw)
				$this->Debris->AdvancedSearch->SearchValue = HtmlDecode($this->Debris->AdvancedSearch->SearchValue);
			$this->Debris->EditValue = HtmlEncode($this->Debris->AdvancedSearch->SearchValue);
			$this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

			// Diagnosis
			$this->Diagnosis->EditAttrs["class"] = "form-control";
			$this->Diagnosis->EditCustomAttributes = "";
			if (!$this->Diagnosis->Raw)
				$this->Diagnosis->AdvancedSearch->SearchValue = HtmlDecode($this->Diagnosis->AdvancedSearch->SearchValue);
			$this->Diagnosis->EditValue = HtmlEncode($this->Diagnosis->AdvancedSearch->SearchValue);
			$this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

			// Observations
			$this->Observations->EditAttrs["class"] = "form-control";
			$this->Observations->EditCustomAttributes = "";
			if (!$this->Observations->Raw)
				$this->Observations->AdvancedSearch->SearchValue = HtmlDecode($this->Observations->AdvancedSearch->SearchValue);
			$this->Observations->EditValue = HtmlEncode($this->Observations->AdvancedSearch->SearchValue);
			$this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

			// Signature
			$this->Signature->EditAttrs["class"] = "form-control";
			$this->Signature->EditCustomAttributes = "";
			if (!$this->Signature->Raw)
				$this->Signature->AdvancedSearch->SearchValue = HtmlDecode($this->Signature->AdvancedSearch->SearchValue);
			$this->Signature->EditValue = HtmlEncode($this->Signature->AdvancedSearch->SearchValue);
			$this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

			// SemenOrgin
			$this->SemenOrgin->EditAttrs["class"] = "form-control";
			$this->SemenOrgin->EditCustomAttributes = "";
			$this->SemenOrgin->EditValue = $this->SemenOrgin->options(TRUE);

			// Donor
			$this->Donor->EditCustomAttributes = "";
			$curVal = trim(strval($this->Donor->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Donor->AdvancedSearch->ViewValue = $this->Donor->lookupCacheOption($curVal);
			else
				$this->Donor->AdvancedSearch->ViewValue = $this->Donor->Lookup !== NULL && is_array($this->Donor->Lookup->Options) ? $curVal : NULL;
			if ($this->Donor->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Donor->EditValue = array_values($this->Donor->Lookup->Options);
				if ($this->Donor->AdvancedSearch->ViewValue == "")
					$this->Donor->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Donor->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Donor->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Donor->AdvancedSearch->ViewValue = $this->Donor->displayValue($arwrk);
				} else {
					$this->Donor->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Donor->EditValue = $arwrk;
			}

			// DonorBloodgroup
			$this->DonorBloodgroup->EditAttrs["class"] = "form-control";
			$this->DonorBloodgroup->EditCustomAttributes = "";
			if (!$this->DonorBloodgroup->Raw)
				$this->DonorBloodgroup->AdvancedSearch->SearchValue = HtmlDecode($this->DonorBloodgroup->AdvancedSearch->SearchValue);
			$this->DonorBloodgroup->EditValue = HtmlEncode($this->DonorBloodgroup->AdvancedSearch->SearchValue);
			$this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

			// Tank
			$this->Tank->EditAttrs["class"] = "form-control";
			$this->Tank->EditCustomAttributes = "";
			if (!$this->Tank->Raw)
				$this->Tank->AdvancedSearch->SearchValue = HtmlDecode($this->Tank->AdvancedSearch->SearchValue);
			$this->Tank->EditValue = HtmlEncode($this->Tank->AdvancedSearch->SearchValue);
			$this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

			// Location
			$this->Location->EditAttrs["class"] = "form-control";
			$this->Location->EditCustomAttributes = "";
			if (!$this->Location->Raw)
				$this->Location->AdvancedSearch->SearchValue = HtmlDecode($this->Location->AdvancedSearch->SearchValue);
			$this->Location->EditValue = HtmlEncode($this->Location->AdvancedSearch->SearchValue);
			$this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

			// Volume1
			$this->Volume1->EditAttrs["class"] = "form-control";
			$this->Volume1->EditCustomAttributes = "";
			if (!$this->Volume1->Raw)
				$this->Volume1->AdvancedSearch->SearchValue = HtmlDecode($this->Volume1->AdvancedSearch->SearchValue);
			$this->Volume1->EditValue = HtmlEncode($this->Volume1->AdvancedSearch->SearchValue);
			$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

			// Concentration1
			$this->Concentration1->EditAttrs["class"] = "form-control";
			$this->Concentration1->EditCustomAttributes = "";
			if (!$this->Concentration1->Raw)
				$this->Concentration1->AdvancedSearch->SearchValue = HtmlDecode($this->Concentration1->AdvancedSearch->SearchValue);
			$this->Concentration1->EditValue = HtmlEncode($this->Concentration1->AdvancedSearch->SearchValue);
			$this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

			// Total1
			$this->Total1->EditAttrs["class"] = "form-control";
			$this->Total1->EditCustomAttributes = "";
			if (!$this->Total1->Raw)
				$this->Total1->AdvancedSearch->SearchValue = HtmlDecode($this->Total1->AdvancedSearch->SearchValue);
			$this->Total1->EditValue = HtmlEncode($this->Total1->AdvancedSearch->SearchValue);
			$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

			// ProgressiveMotility1
			$this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
			$this->ProgressiveMotility1->EditCustomAttributes = "";
			if (!$this->ProgressiveMotility1->Raw)
				$this->ProgressiveMotility1->AdvancedSearch->SearchValue = HtmlDecode($this->ProgressiveMotility1->AdvancedSearch->SearchValue);
			$this->ProgressiveMotility1->EditValue = HtmlEncode($this->ProgressiveMotility1->AdvancedSearch->SearchValue);
			$this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
			$this->NonProgrssiveMotile1->EditCustomAttributes = "";
			if (!$this->NonProgrssiveMotile1->Raw)
				$this->NonProgrssiveMotile1->AdvancedSearch->SearchValue = HtmlDecode($this->NonProgrssiveMotile1->AdvancedSearch->SearchValue);
			$this->NonProgrssiveMotile1->EditValue = HtmlEncode($this->NonProgrssiveMotile1->AdvancedSearch->SearchValue);
			$this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

			// Immotile1
			$this->Immotile1->EditAttrs["class"] = "form-control";
			$this->Immotile1->EditCustomAttributes = "";
			if (!$this->Immotile1->Raw)
				$this->Immotile1->AdvancedSearch->SearchValue = HtmlDecode($this->Immotile1->AdvancedSearch->SearchValue);
			$this->Immotile1->EditValue = HtmlEncode($this->Immotile1->AdvancedSearch->SearchValue);
			$this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
			$this->TotalProgrssiveMotile1->EditCustomAttributes = "";
			if (!$this->TotalProgrssiveMotile1->Raw)
				$this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue = HtmlDecode($this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue);
			$this->TotalProgrssiveMotile1->EditValue = HtmlEncode($this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue);
			$this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->AdvancedSearch->SearchValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// Color
			$this->Color->EditAttrs["class"] = "form-control";
			$this->Color->EditCustomAttributes = "";
			if (!$this->Color->Raw)
				$this->Color->AdvancedSearch->SearchValue = HtmlDecode($this->Color->AdvancedSearch->SearchValue);
			$this->Color->EditValue = HtmlEncode($this->Color->AdvancedSearch->SearchValue);
			$this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

			// DoneBy
			$this->DoneBy->EditAttrs["class"] = "form-control";
			$this->DoneBy->EditCustomAttributes = "";
			if (!$this->DoneBy->Raw)
				$this->DoneBy->AdvancedSearch->SearchValue = HtmlDecode($this->DoneBy->AdvancedSearch->SearchValue);
			$this->DoneBy->EditValue = HtmlEncode($this->DoneBy->AdvancedSearch->SearchValue);
			$this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (!$this->Method->Raw)
				$this->Method->AdvancedSearch->SearchValue = HtmlDecode($this->Method->AdvancedSearch->SearchValue);
			$this->Method->EditValue = HtmlEncode($this->Method->AdvancedSearch->SearchValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Abstinence
			$this->Abstinence->EditAttrs["class"] = "form-control";
			$this->Abstinence->EditCustomAttributes = "";
			if (!$this->Abstinence->Raw)
				$this->Abstinence->AdvancedSearch->SearchValue = HtmlDecode($this->Abstinence->AdvancedSearch->SearchValue);
			$this->Abstinence->EditValue = HtmlEncode($this->Abstinence->AdvancedSearch->SearchValue);
			$this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

			// ProcessedBy
			$this->ProcessedBy->EditAttrs["class"] = "form-control";
			$this->ProcessedBy->EditCustomAttributes = "";
			if (!$this->ProcessedBy->Raw)
				$this->ProcessedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ProcessedBy->AdvancedSearch->SearchValue);
			$this->ProcessedBy->EditValue = HtmlEncode($this->ProcessedBy->AdvancedSearch->SearchValue);
			$this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

			// InseminationTime
			$this->InseminationTime->EditAttrs["class"] = "form-control";
			$this->InseminationTime->EditCustomAttributes = "";
			if (!$this->InseminationTime->Raw)
				$this->InseminationTime->AdvancedSearch->SearchValue = HtmlDecode($this->InseminationTime->AdvancedSearch->SearchValue);
			$this->InseminationTime->EditValue = HtmlEncode($this->InseminationTime->AdvancedSearch->SearchValue);
			$this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

			// InseminationBy
			$this->InseminationBy->EditAttrs["class"] = "form-control";
			$this->InseminationBy->EditCustomAttributes = "";
			if (!$this->InseminationBy->Raw)
				$this->InseminationBy->AdvancedSearch->SearchValue = HtmlDecode($this->InseminationBy->AdvancedSearch->SearchValue);
			$this->InseminationBy->EditValue = HtmlEncode($this->InseminationBy->AdvancedSearch->SearchValue);
			$this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

			// Big
			$this->Big->EditAttrs["class"] = "form-control";
			$this->Big->EditCustomAttributes = "";
			if (!$this->Big->Raw)
				$this->Big->AdvancedSearch->SearchValue = HtmlDecode($this->Big->AdvancedSearch->SearchValue);
			$this->Big->EditValue = HtmlEncode($this->Big->AdvancedSearch->SearchValue);
			$this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

			// Medium
			$this->Medium->EditAttrs["class"] = "form-control";
			$this->Medium->EditCustomAttributes = "";
			if (!$this->Medium->Raw)
				$this->Medium->AdvancedSearch->SearchValue = HtmlDecode($this->Medium->AdvancedSearch->SearchValue);
			$this->Medium->EditValue = HtmlEncode($this->Medium->AdvancedSearch->SearchValue);
			$this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

			// Small
			$this->Small->EditAttrs["class"] = "form-control";
			$this->Small->EditCustomAttributes = "";
			if (!$this->Small->Raw)
				$this->Small->AdvancedSearch->SearchValue = HtmlDecode($this->Small->AdvancedSearch->SearchValue);
			$this->Small->EditValue = HtmlEncode($this->Small->AdvancedSearch->SearchValue);
			$this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

			// NoHalo
			$this->NoHalo->EditAttrs["class"] = "form-control";
			$this->NoHalo->EditCustomAttributes = "";
			if (!$this->NoHalo->Raw)
				$this->NoHalo->AdvancedSearch->SearchValue = HtmlDecode($this->NoHalo->AdvancedSearch->SearchValue);
			$this->NoHalo->EditValue = HtmlEncode($this->NoHalo->AdvancedSearch->SearchValue);
			$this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

			// Fragmented
			$this->Fragmented->EditAttrs["class"] = "form-control";
			$this->Fragmented->EditCustomAttributes = "";
			if (!$this->Fragmented->Raw)
				$this->Fragmented->AdvancedSearch->SearchValue = HtmlDecode($this->Fragmented->AdvancedSearch->SearchValue);
			$this->Fragmented->EditValue = HtmlEncode($this->Fragmented->AdvancedSearch->SearchValue);
			$this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

			// NonFragmented
			$this->NonFragmented->EditAttrs["class"] = "form-control";
			$this->NonFragmented->EditCustomAttributes = "";
			if (!$this->NonFragmented->Raw)
				$this->NonFragmented->AdvancedSearch->SearchValue = HtmlDecode($this->NonFragmented->AdvancedSearch->SearchValue);
			$this->NonFragmented->EditValue = HtmlEncode($this->NonFragmented->AdvancedSearch->SearchValue);
			$this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

			// DFI
			$this->DFI->EditAttrs["class"] = "form-control";
			$this->DFI->EditCustomAttributes = "";
			if (!$this->DFI->Raw)
				$this->DFI->AdvancedSearch->SearchValue = HtmlDecode($this->DFI->AdvancedSearch->SearchValue);
			$this->DFI->EditValue = HtmlEncode($this->DFI->AdvancedSearch->SearchValue);
			$this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

			// IsueBy
			$this->IsueBy->EditAttrs["class"] = "form-control";
			$this->IsueBy->EditCustomAttributes = "";
			if (!$this->IsueBy->Raw)
				$this->IsueBy->AdvancedSearch->SearchValue = HtmlDecode($this->IsueBy->AdvancedSearch->SearchValue);
			$this->IsueBy->EditValue = HtmlEncode($this->IsueBy->AdvancedSearch->SearchValue);
			$this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

			// Volume2
			$this->Volume2->EditAttrs["class"] = "form-control";
			$this->Volume2->EditCustomAttributes = "";
			if (!$this->Volume2->Raw)
				$this->Volume2->AdvancedSearch->SearchValue = HtmlDecode($this->Volume2->AdvancedSearch->SearchValue);
			$this->Volume2->EditValue = HtmlEncode($this->Volume2->AdvancedSearch->SearchValue);
			$this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

			// Concentration2
			$this->Concentration2->EditAttrs["class"] = "form-control";
			$this->Concentration2->EditCustomAttributes = "";
			if (!$this->Concentration2->Raw)
				$this->Concentration2->AdvancedSearch->SearchValue = HtmlDecode($this->Concentration2->AdvancedSearch->SearchValue);
			$this->Concentration2->EditValue = HtmlEncode($this->Concentration2->AdvancedSearch->SearchValue);
			$this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

			// Total2
			$this->Total2->EditAttrs["class"] = "form-control";
			$this->Total2->EditCustomAttributes = "";
			if (!$this->Total2->Raw)
				$this->Total2->AdvancedSearch->SearchValue = HtmlDecode($this->Total2->AdvancedSearch->SearchValue);
			$this->Total2->EditValue = HtmlEncode($this->Total2->AdvancedSearch->SearchValue);
			$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

			// ProgressiveMotility2
			$this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
			$this->ProgressiveMotility2->EditCustomAttributes = "";
			if (!$this->ProgressiveMotility2->Raw)
				$this->ProgressiveMotility2->AdvancedSearch->SearchValue = HtmlDecode($this->ProgressiveMotility2->AdvancedSearch->SearchValue);
			$this->ProgressiveMotility2->EditValue = HtmlEncode($this->ProgressiveMotility2->AdvancedSearch->SearchValue);
			$this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
			$this->NonProgrssiveMotile2->EditCustomAttributes = "";
			if (!$this->NonProgrssiveMotile2->Raw)
				$this->NonProgrssiveMotile2->AdvancedSearch->SearchValue = HtmlDecode($this->NonProgrssiveMotile2->AdvancedSearch->SearchValue);
			$this->NonProgrssiveMotile2->EditValue = HtmlEncode($this->NonProgrssiveMotile2->AdvancedSearch->SearchValue);
			$this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

			// Immotile2
			$this->Immotile2->EditAttrs["class"] = "form-control";
			$this->Immotile2->EditCustomAttributes = "";
			if (!$this->Immotile2->Raw)
				$this->Immotile2->AdvancedSearch->SearchValue = HtmlDecode($this->Immotile2->AdvancedSearch->SearchValue);
			$this->Immotile2->EditValue = HtmlEncode($this->Immotile2->AdvancedSearch->SearchValue);
			$this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
			$this->TotalProgrssiveMotile2->EditCustomAttributes = "";
			if (!$this->TotalProgrssiveMotile2->Raw)
				$this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue = HtmlDecode($this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue);
			$this->TotalProgrssiveMotile2->EditValue = HtmlEncode($this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue);
			$this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

			// IssuedBy
			$this->IssuedBy->EditAttrs["class"] = "form-control";
			$this->IssuedBy->EditCustomAttributes = "";
			if (!$this->IssuedBy->Raw)
				$this->IssuedBy->AdvancedSearch->SearchValue = HtmlDecode($this->IssuedBy->AdvancedSearch->SearchValue);
			$this->IssuedBy->EditValue = HtmlEncode($this->IssuedBy->AdvancedSearch->SearchValue);
			$this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

			// IssuedTo
			$this->IssuedTo->EditAttrs["class"] = "form-control";
			$this->IssuedTo->EditCustomAttributes = "";
			if (!$this->IssuedTo->Raw)
				$this->IssuedTo->AdvancedSearch->SearchValue = HtmlDecode($this->IssuedTo->AdvancedSearch->SearchValue);
			$this->IssuedTo->EditValue = HtmlEncode($this->IssuedTo->AdvancedSearch->SearchValue);
			$this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

			// MACS
			$this->MACS->EditCustomAttributes = "";
			$this->MACS->EditValue = $this->MACS->options(FALSE);

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
			$this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(TRUE);

			// IMSC_1
			$this->IMSC_1->EditAttrs["class"] = "form-control";
			$this->IMSC_1->EditCustomAttributes = "";
			if (!$this->IMSC_1->Raw)
				$this->IMSC_1->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_1->AdvancedSearch->SearchValue);
			$this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->AdvancedSearch->SearchValue);
			$this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

			// IMSC_2
			$this->IMSC_2->EditAttrs["class"] = "form-control";
			$this->IMSC_2->EditCustomAttributes = "";
			if (!$this->IMSC_2->Raw)
				$this->IMSC_2->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_2->AdvancedSearch->SearchValue);
			$this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->AdvancedSearch->SearchValue);
			$this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
			$this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
			$this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->options(TRUE);

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
			$this->IUI_PREP_METHOD->EditCustomAttributes = "";
			$this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->options(TRUE);

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
			$this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
			$this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->options(TRUE);

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
			$this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
			$this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->options(TRUE);

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
			$this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
			$this->TIME_FROM_PREP_TO_INSEM->EditValue = $this->TIME_FROM_PREP_TO_INSEM->options(TRUE);
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
		if (!CheckEuroDate($this->CollectionDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CollectionDate->errorMessage());
		}
		if (!CheckEuroDate($this->ResultDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ResultDate->errorMessage());
		}
		if (!CheckInteger($this->TidNo->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->TidNo->errorMessage());
		}
		if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PREG_TEST_DATE->errorMessage());
		}
		if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->PREG_TEST_DATE->errorMessage());
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
		$this->PaID->AdvancedSearch->load();
		$this->PaName->AdvancedSearch->load();
		$this->PaMobile->AdvancedSearch->load();
		$this->PartnerID->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PartnerMobile->AdvancedSearch->load();
		$this->RIDNo->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->HusbandName->AdvancedSearch->load();
		$this->RequestDr->AdvancedSearch->load();
		$this->CollectionDate->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->RequestSample->AdvancedSearch->load();
		$this->CollectionType->AdvancedSearch->load();
		$this->CollectionMethod->AdvancedSearch->load();
		$this->Medicationused->AdvancedSearch->load();
		$this->DifficultiesinCollection->AdvancedSearch->load();
		$this->Volume->AdvancedSearch->load();
		$this->pH->AdvancedSearch->load();
		$this->Timeofcollection->AdvancedSearch->load();
		$this->Timeofexamination->AdvancedSearch->load();
		$this->Concentration->AdvancedSearch->load();
		$this->Total->AdvancedSearch->load();
		$this->ProgressiveMotility->AdvancedSearch->load();
		$this->NonProgrssiveMotile->AdvancedSearch->load();
		$this->Immotile->AdvancedSearch->load();
		$this->TotalProgrssiveMotile->AdvancedSearch->load();
		$this->Appearance->AdvancedSearch->load();
		$this->Homogenosity->AdvancedSearch->load();
		$this->CompleteSample->AdvancedSearch->load();
		$this->Liquefactiontime->AdvancedSearch->load();
		$this->Normal->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->Headdefects->AdvancedSearch->load();
		$this->MidpieceDefects->AdvancedSearch->load();
		$this->TailDefects->AdvancedSearch->load();
		$this->NormalProgMotile->AdvancedSearch->load();
		$this->ImmatureForms->AdvancedSearch->load();
		$this->Leucocytes->AdvancedSearch->load();
		$this->Agglutination->AdvancedSearch->load();
		$this->Debris->AdvancedSearch->load();
		$this->Diagnosis->AdvancedSearch->load();
		$this->Observations->AdvancedSearch->load();
		$this->Signature->AdvancedSearch->load();
		$this->SemenOrgin->AdvancedSearch->load();
		$this->Donor->AdvancedSearch->load();
		$this->DonorBloodgroup->AdvancedSearch->load();
		$this->Tank->AdvancedSearch->load();
		$this->Location->AdvancedSearch->load();
		$this->Volume1->AdvancedSearch->load();
		$this->Concentration1->AdvancedSearch->load();
		$this->Total1->AdvancedSearch->load();
		$this->ProgressiveMotility1->AdvancedSearch->load();
		$this->NonProgrssiveMotile1->AdvancedSearch->load();
		$this->Immotile1->AdvancedSearch->load();
		$this->TotalProgrssiveMotile1->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->Color->AdvancedSearch->load();
		$this->DoneBy->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Abstinence->AdvancedSearch->load();
		$this->ProcessedBy->AdvancedSearch->load();
		$this->InseminationTime->AdvancedSearch->load();
		$this->InseminationBy->AdvancedSearch->load();
		$this->Big->AdvancedSearch->load();
		$this->Medium->AdvancedSearch->load();
		$this->Small->AdvancedSearch->load();
		$this->NoHalo->AdvancedSearch->load();
		$this->Fragmented->AdvancedSearch->load();
		$this->NonFragmented->AdvancedSearch->load();
		$this->DFI->AdvancedSearch->load();
		$this->IsueBy->AdvancedSearch->load();
		$this->Volume2->AdvancedSearch->load();
		$this->Concentration2->AdvancedSearch->load();
		$this->Total2->AdvancedSearch->load();
		$this->ProgressiveMotility2->AdvancedSearch->load();
		$this->NonProgrssiveMotile2->AdvancedSearch->load();
		$this->Immotile2->AdvancedSearch->load();
		$this->TotalProgrssiveMotile2->AdvancedSearch->load();
		$this->IssuedBy->AdvancedSearch->load();
		$this->IssuedTo->AdvancedSearch->load();
		$this->MACS->AdvancedSearch->load();
		$this->PREG_TEST_DATE->AdvancedSearch->load();
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
		$this->IMSC_1->AdvancedSearch->load();
		$this->IMSC_2->AdvancedSearch->load();
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
		$this->IUI_PREP_METHOD->AdvancedSearch->load();
		$this->TIME_FROM_TRIGGER->AdvancedSearch->load();
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_semenanalysislist.php"), "", $this->TableVar, TRUE);
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
				case "x_RIDNo":
					break;
				case "x_PatientName":
					break;
				case "x_HusbandName":
					break;
				case "x_RequestSample":
					break;
				case "x_CollectionType":
					break;
				case "x_CollectionMethod":
					break;
				case "x_Medicationused":
					break;
				case "x_DifficultiesinCollection":
					break;
				case "x_Homogenosity":
					break;
				case "x_CompleteSample":
					break;
				case "x_SemenOrgin":
					break;
				case "x_Donor":
					break;
				case "x_MACS":
					break;
				case "x_SPECIFIC_PROBLEMS":
					break;
				case "x_LIQUIFACTION_STORAGE":
					break;
				case "x_IUI_PREP_METHOD":
					break;
				case "x_TIME_FROM_TRIGGER":
					break;
				case "x_COLLECTION_TO_PREPARATION":
					break;
				case "x_TIME_FROM_PREP_TO_INSEM":
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
						case "x_RIDNo":
							break;
						case "x_PatientName":
							break;
						case "x_HusbandName":
							break;
						case "x_Medicationused":
							break;
						case "x_Donor":
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
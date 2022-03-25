<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_iui_excel_search extends view_iui_excel
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_iui_excel';

	// Page object name
	public $PageObjName = "view_iui_excel_search";

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

		// Table object (view_iui_excel)
		if (!isset($GLOBALS["view_iui_excel"]) || get_class($GLOBALS["view_iui_excel"]) == PROJECT_NAMESPACE . "view_iui_excel") {
			$GLOBALS["view_iui_excel"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_iui_excel"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_iui_excel');

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
		global $view_iui_excel;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($view_iui_excel);
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
					if ($pageName == "view_iui_excelview.php")
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
			$key .= @$ar['CoupleID'];
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
					$this->terminate(GetUrl("view_iui_excellist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->NAME->setVisibility();
		$this->HUSBAND_NAME->setVisibility();
		$this->CoupleID->setVisibility();
		$this->AGE____WIFE->setVisibility();
		$this->AGE__HUSBAND->setVisibility();
		$this->ANXIOUS_TO_CONCEIVE_FOR->setVisibility();
		$this->AMH_28_NG2FML29->setVisibility();
		$this->TUBAL_PATENCY->setVisibility();
		$this->HSG->setVisibility();
		$this->DHL->setVisibility();
		$this->UTERINE_PROBLEMS->setVisibility();
		$this->W_COMORBIDS->setVisibility();
		$this->H_COMORBIDS->setVisibility();
		$this->SEXUAL_DYSFUNCTION->setVisibility();
		$this->PREV_IUI->setVisibility();
		$this->PREV_IVF->setVisibility();
		$this->TABLETS->setVisibility();
		$this->INJTYPE->setVisibility();
		$this->LMP->setVisibility();
		$this->TRIGGERR->setVisibility();
		$this->TRIGGERDATE->setVisibility();
		$this->FOLLICLE_STATUS->setVisibility();
		$this->NUMBER_OF_IUI->setVisibility();
		$this->PROCEDURE->setVisibility();
		$this->LUTEAL_SUPPORT->setVisibility();
		$this->H2FD_SAMPLE->setVisibility();
		$this->DONOR___I_D->setVisibility();
		$this->PREG_TEST_DATE->setVisibility();
		$this->COLLECTION__METHOD->setVisibility();
		$this->SAMPLE_SOURCE->setVisibility();
		$this->SPECIFIC_PROBLEMS->setVisibility();
		$this->IMSC_1->setVisibility();
		$this->IMSC_2->setVisibility();
		$this->LIQUIFACTION_STORAGE->setVisibility();
		$this->IUI_PREP_METHOD->setVisibility();
		$this->TIME_FROM_TRIGGER->setVisibility();
		$this->COLLECTION_TO_PREPARATION->setVisibility();
		$this->TIME_FROM_PREP_TO_INSEM->setVisibility();
		$this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
		$this->RESULTS->setVisibility();
		$this->ONGOING_PREG->setVisibility();
		$this->EDD_Date->setVisibility();
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
					$srchStr = "view_iui_excellist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->NAME); // NAME
		$this->buildSearchUrl($srchUrl, $this->HUSBAND_NAME); // HUSBAND NAME
		$this->buildSearchUrl($srchUrl, $this->CoupleID); // CoupleID
		$this->buildSearchUrl($srchUrl, $this->AGE____WIFE); // AGE  - WIFE
		$this->buildSearchUrl($srchUrl, $this->AGE__HUSBAND); // AGE- HUSBAND
		$this->buildSearchUrl($srchUrl, $this->ANXIOUS_TO_CONCEIVE_FOR); // ANXIOUS TO CONCEIVE FOR
		$this->buildSearchUrl($srchUrl, $this->AMH_28_NG2FML29); // AMH ( NG/ML)
		$this->buildSearchUrl($srchUrl, $this->TUBAL_PATENCY); // TUBAL_PATENCY
		$this->buildSearchUrl($srchUrl, $this->HSG); // HSG
		$this->buildSearchUrl($srchUrl, $this->DHL); // DHL
		$this->buildSearchUrl($srchUrl, $this->UTERINE_PROBLEMS); // UTERINE_PROBLEMS
		$this->buildSearchUrl($srchUrl, $this->W_COMORBIDS); // W_COMORBIDS
		$this->buildSearchUrl($srchUrl, $this->H_COMORBIDS); // H_COMORBIDS
		$this->buildSearchUrl($srchUrl, $this->SEXUAL_DYSFUNCTION); // SEXUAL_DYSFUNCTION
		$this->buildSearchUrl($srchUrl, $this->PREV_IUI); // PREV IUI
		$this->buildSearchUrl($srchUrl, $this->PREV_IVF); // PREV_IVF
		$this->buildSearchUrl($srchUrl, $this->TABLETS); // TABLETS
		$this->buildSearchUrl($srchUrl, $this->INJTYPE); // INJTYPE
		$this->buildSearchUrl($srchUrl, $this->LMP); // LMP
		$this->buildSearchUrl($srchUrl, $this->TRIGGERR); // TRIGGERR
		$this->buildSearchUrl($srchUrl, $this->TRIGGERDATE); // TRIGGERDATE
		$this->buildSearchUrl($srchUrl, $this->FOLLICLE_STATUS); // FOLLICLE_STATUS
		$this->buildSearchUrl($srchUrl, $this->NUMBER_OF_IUI); // NUMBER_OF_IUI
		$this->buildSearchUrl($srchUrl, $this->PROCEDURE); // PROCEDURE
		$this->buildSearchUrl($srchUrl, $this->LUTEAL_SUPPORT); // LUTEAL_SUPPORT
		$this->buildSearchUrl($srchUrl, $this->H2FD_SAMPLE); // H/D SAMPLE
		$this->buildSearchUrl($srchUrl, $this->DONOR___I_D); // DONOR - I.D
		$this->buildSearchUrl($srchUrl, $this->PREG_TEST_DATE); // PREG_TEST_DATE
		$this->buildSearchUrl($srchUrl, $this->COLLECTION__METHOD); // COLLECTION  METHOD
		$this->buildSearchUrl($srchUrl, $this->SAMPLE_SOURCE); // SAMPLE SOURCE
		$this->buildSearchUrl($srchUrl, $this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
		$this->buildSearchUrl($srchUrl, $this->IMSC_1); // IMSC_1
		$this->buildSearchUrl($srchUrl, $this->IMSC_2); // IMSC_2
		$this->buildSearchUrl($srchUrl, $this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
		$this->buildSearchUrl($srchUrl, $this->IUI_PREP_METHOD); // IUI_PREP_METHOD
		$this->buildSearchUrl($srchUrl, $this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
		$this->buildSearchUrl($srchUrl, $this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
		$this->buildSearchUrl($srchUrl, $this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
		$this->buildSearchUrl($srchUrl, $this->SPECIFIC_MATERNAL_PROBLEMS); // SPECIFIC_MATERNAL_PROBLEMS
		$this->buildSearchUrl($srchUrl, $this->RESULTS); // RESULTS
		$this->buildSearchUrl($srchUrl, $this->ONGOING_PREG); // ONGOING_PREG
		$this->buildSearchUrl($srchUrl, $this->EDD_Date); // EDD_Date
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
		if ($this->NAME->AdvancedSearch->post())
			$got = TRUE;
		if ($this->HUSBAND_NAME->AdvancedSearch->post())
			$got = TRUE;
		if ($this->CoupleID->AdvancedSearch->post())
			$got = TRUE;
		if ($this->AGE____WIFE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->AGE__HUSBAND->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->post())
			$got = TRUE;
		if ($this->AMH_28_NG2FML29->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TUBAL_PATENCY->AdvancedSearch->post())
			$got = TRUE;
		if ($this->HSG->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DHL->AdvancedSearch->post())
			$got = TRUE;
		if ($this->UTERINE_PROBLEMS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->W_COMORBIDS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->H_COMORBIDS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->SEXUAL_DYSFUNCTION->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PREV_IUI->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PREV_IVF->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TABLETS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->INJTYPE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->LMP->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TRIGGERR->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TRIGGERDATE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->FOLLICLE_STATUS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->NUMBER_OF_IUI->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PROCEDURE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->LUTEAL_SUPPORT->AdvancedSearch->post())
			$got = TRUE;
		if ($this->H2FD_SAMPLE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DONOR___I_D->AdvancedSearch->post())
			$got = TRUE;
		if ($this->PREG_TEST_DATE->AdvancedSearch->post())
			$got = TRUE;
		if ($this->COLLECTION__METHOD->AdvancedSearch->post())
			$got = TRUE;
		if ($this->SAMPLE_SOURCE->AdvancedSearch->post())
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
		if ($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->RESULTS->AdvancedSearch->post())
			$got = TRUE;
		if ($this->ONGOING_PREG->AdvancedSearch->post())
			$got = TRUE;
		if ($this->EDD_Date->AdvancedSearch->post())
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
		// NAME
		// HUSBAND NAME
		// CoupleID
		// AGE  - WIFE
		// AGE- HUSBAND
		// ANXIOUS TO CONCEIVE FOR
		// AMH ( NG/ML)
		// TUBAL_PATENCY
		// HSG
		// DHL
		// UTERINE_PROBLEMS
		// W_COMORBIDS
		// H_COMORBIDS
		// SEXUAL_DYSFUNCTION
		// PREV IUI
		// PREV_IVF
		// TABLETS
		// INJTYPE
		// LMP
		// TRIGGERR
		// TRIGGERDATE
		// FOLLICLE_STATUS
		// NUMBER_OF_IUI
		// PROCEDURE
		// LUTEAL_SUPPORT
		// H/D SAMPLE
		// DONOR - I.D
		// PREG_TEST_DATE
		// COLLECTION  METHOD
		// SAMPLE SOURCE
		// SPECIFIC_PROBLEMS
		// IMSC_1
		// IMSC_2
		// LIQUIFACTION_STORAGE
		// IUI_PREP_METHOD
		// TIME_FROM_TRIGGER
		// COLLECTION_TO_PREPARATION
		// TIME_FROM_PREP_TO_INSEM
		// SPECIFIC_MATERNAL_PROBLEMS
		// RESULTS
		// ONGOING_PREG
		// EDD_Date

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// NAME
			$this->NAME->ViewValue = $this->NAME->CurrentValue;
			$this->NAME->ViewCustomAttributes = "";

			// HUSBAND NAME
			$this->HUSBAND_NAME->ViewValue = $this->HUSBAND_NAME->CurrentValue;
			$this->HUSBAND_NAME->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// AGE  - WIFE
			$this->AGE____WIFE->ViewValue = $this->AGE____WIFE->CurrentValue;
			$this->AGE____WIFE->ViewCustomAttributes = "";

			// AGE- HUSBAND
			$this->AGE__HUSBAND->ViewValue = $this->AGE__HUSBAND->CurrentValue;
			$this->AGE__HUSBAND->ViewCustomAttributes = "";

			// ANXIOUS TO CONCEIVE FOR
			$this->ANXIOUS_TO_CONCEIVE_FOR->ViewValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
			$this->ANXIOUS_TO_CONCEIVE_FOR->ViewCustomAttributes = "";

			// AMH ( NG/ML)
			$this->AMH_28_NG2FML29->ViewValue = $this->AMH_28_NG2FML29->CurrentValue;
			$this->AMH_28_NG2FML29->ViewCustomAttributes = "";

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
			$this->TUBAL_PATENCY->ViewCustomAttributes = "";

			// HSG
			$this->HSG->ViewValue = $this->HSG->CurrentValue;
			$this->HSG->ViewCustomAttributes = "";

			// DHL
			$this->DHL->ViewValue = $this->DHL->CurrentValue;
			$this->DHL->ViewCustomAttributes = "";

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
			$this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

			// W_COMORBIDS
			$this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
			$this->W_COMORBIDS->ViewCustomAttributes = "";

			// H_COMORBIDS
			$this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
			$this->H_COMORBIDS->ViewCustomAttributes = "";

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
			$this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

			// PREV IUI
			$this->PREV_IUI->ViewValue = $this->PREV_IUI->CurrentValue;
			$this->PREV_IUI->ViewCustomAttributes = "";

			// PREV_IVF
			$this->PREV_IVF->ViewValue = $this->PREV_IVF->CurrentValue;
			$this->PREV_IVF->ViewCustomAttributes = "";

			// TABLETS
			$this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
			$this->TABLETS->ViewCustomAttributes = "";

			// INJTYPE
			$this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
			$this->INJTYPE->ViewCustomAttributes = "";

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
			$this->LMP->ViewCustomAttributes = "";

			// TRIGGERR
			$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
			$this->TRIGGERR->ViewCustomAttributes = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
			$this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
			$this->TRIGGERDATE->ViewCustomAttributes = "";

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
			$this->FOLLICLE_STATUS->ViewCustomAttributes = "";

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
			$this->NUMBER_OF_IUI->ViewCustomAttributes = "";

			// PROCEDURE
			$this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
			$this->PROCEDURE->ViewCustomAttributes = "";

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
			$this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

			// H/D SAMPLE
			$this->H2FD_SAMPLE->ViewValue = $this->H2FD_SAMPLE->CurrentValue;
			$this->H2FD_SAMPLE->ViewCustomAttributes = "";

			// DONOR - I.D
			$this->DONOR___I_D->ViewValue = $this->DONOR___I_D->CurrentValue;
			$this->DONOR___I_D->ViewValue = FormatNumber($this->DONOR___I_D->ViewValue, 0, -2, -2, -2);
			$this->DONOR___I_D->ViewCustomAttributes = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
			$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
			$this->PREG_TEST_DATE->ViewCustomAttributes = "";

			// COLLECTION  METHOD
			$this->COLLECTION__METHOD->ViewValue = $this->COLLECTION__METHOD->CurrentValue;
			$this->COLLECTION__METHOD->ViewCustomAttributes = "";

			// SAMPLE SOURCE
			$this->SAMPLE_SOURCE->ViewValue = $this->SAMPLE_SOURCE->CurrentValue;
			$this->SAMPLE_SOURCE->ViewCustomAttributes = "";

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
			$this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

			// IMSC_1
			$this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
			$this->IMSC_1->ViewCustomAttributes = "";

			// IMSC_2
			$this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
			$this->IMSC_2->ViewCustomAttributes = "";

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
			$this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
			$this->IUI_PREP_METHOD->ViewCustomAttributes = "";

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
			$this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
			$this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
			$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
			$this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

			// RESULTS
			$this->RESULTS->ViewValue = $this->RESULTS->CurrentValue;
			$this->RESULTS->ViewCustomAttributes = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
			$this->ONGOING_PREG->ViewCustomAttributes = "";

			// EDD_Date
			$this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
			$this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
			$this->EDD_Date->ViewCustomAttributes = "";

			// NAME
			$this->NAME->LinkCustomAttributes = "";
			$this->NAME->HrefValue = "";
			$this->NAME->TooltipValue = "";

			// HUSBAND NAME
			$this->HUSBAND_NAME->LinkCustomAttributes = "";
			$this->HUSBAND_NAME->HrefValue = "";
			$this->HUSBAND_NAME->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";

			// AGE  - WIFE
			$this->AGE____WIFE->LinkCustomAttributes = "";
			$this->AGE____WIFE->HrefValue = "";
			$this->AGE____WIFE->TooltipValue = "";

			// AGE- HUSBAND
			$this->AGE__HUSBAND->LinkCustomAttributes = "";
			$this->AGE__HUSBAND->HrefValue = "";
			$this->AGE__HUSBAND->TooltipValue = "";

			// ANXIOUS TO CONCEIVE FOR
			$this->ANXIOUS_TO_CONCEIVE_FOR->LinkCustomAttributes = "";
			$this->ANXIOUS_TO_CONCEIVE_FOR->HrefValue = "";
			$this->ANXIOUS_TO_CONCEIVE_FOR->TooltipValue = "";

			// AMH ( NG/ML)
			$this->AMH_28_NG2FML29->LinkCustomAttributes = "";
			$this->AMH_28_NG2FML29->HrefValue = "";
			$this->AMH_28_NG2FML29->TooltipValue = "";

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->LinkCustomAttributes = "";
			$this->TUBAL_PATENCY->HrefValue = "";
			$this->TUBAL_PATENCY->TooltipValue = "";

			// HSG
			$this->HSG->LinkCustomAttributes = "";
			$this->HSG->HrefValue = "";
			$this->HSG->TooltipValue = "";

			// DHL
			$this->DHL->LinkCustomAttributes = "";
			$this->DHL->HrefValue = "";
			$this->DHL->TooltipValue = "";

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
			$this->UTERINE_PROBLEMS->HrefValue = "";
			$this->UTERINE_PROBLEMS->TooltipValue = "";

			// W_COMORBIDS
			$this->W_COMORBIDS->LinkCustomAttributes = "";
			$this->W_COMORBIDS->HrefValue = "";
			$this->W_COMORBIDS->TooltipValue = "";

			// H_COMORBIDS
			$this->H_COMORBIDS->LinkCustomAttributes = "";
			$this->H_COMORBIDS->HrefValue = "";
			$this->H_COMORBIDS->TooltipValue = "";

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
			$this->SEXUAL_DYSFUNCTION->HrefValue = "";
			$this->SEXUAL_DYSFUNCTION->TooltipValue = "";

			// PREV IUI
			$this->PREV_IUI->LinkCustomAttributes = "";
			$this->PREV_IUI->HrefValue = "";
			$this->PREV_IUI->TooltipValue = "";

			// PREV_IVF
			$this->PREV_IVF->LinkCustomAttributes = "";
			$this->PREV_IVF->HrefValue = "";
			$this->PREV_IVF->TooltipValue = "";

			// TABLETS
			$this->TABLETS->LinkCustomAttributes = "";
			$this->TABLETS->HrefValue = "";
			$this->TABLETS->TooltipValue = "";

			// INJTYPE
			$this->INJTYPE->LinkCustomAttributes = "";
			$this->INJTYPE->HrefValue = "";
			$this->INJTYPE->TooltipValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// TRIGGERR
			$this->TRIGGERR->LinkCustomAttributes = "";
			$this->TRIGGERR->HrefValue = "";
			$this->TRIGGERR->TooltipValue = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->LinkCustomAttributes = "";
			$this->TRIGGERDATE->HrefValue = "";
			$this->TRIGGERDATE->TooltipValue = "";

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->LinkCustomAttributes = "";
			$this->FOLLICLE_STATUS->HrefValue = "";
			$this->FOLLICLE_STATUS->TooltipValue = "";

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->LinkCustomAttributes = "";
			$this->NUMBER_OF_IUI->HrefValue = "";
			$this->NUMBER_OF_IUI->TooltipValue = "";

			// PROCEDURE
			$this->PROCEDURE->LinkCustomAttributes = "";
			$this->PROCEDURE->HrefValue = "";
			$this->PROCEDURE->TooltipValue = "";

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
			$this->LUTEAL_SUPPORT->HrefValue = "";
			$this->LUTEAL_SUPPORT->TooltipValue = "";

			// H/D SAMPLE
			$this->H2FD_SAMPLE->LinkCustomAttributes = "";
			$this->H2FD_SAMPLE->HrefValue = "";
			$this->H2FD_SAMPLE->TooltipValue = "";

			// DONOR - I.D
			$this->DONOR___I_D->LinkCustomAttributes = "";
			$this->DONOR___I_D->HrefValue = "";
			$this->DONOR___I_D->TooltipValue = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->LinkCustomAttributes = "";
			$this->PREG_TEST_DATE->HrefValue = "";
			$this->PREG_TEST_DATE->TooltipValue = "";

			// COLLECTION  METHOD
			$this->COLLECTION__METHOD->LinkCustomAttributes = "";
			$this->COLLECTION__METHOD->HrefValue = "";
			$this->COLLECTION__METHOD->TooltipValue = "";

			// SAMPLE SOURCE
			$this->SAMPLE_SOURCE->LinkCustomAttributes = "";
			$this->SAMPLE_SOURCE->HrefValue = "";
			$this->SAMPLE_SOURCE->TooltipValue = "";

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

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

			// RESULTS
			$this->RESULTS->LinkCustomAttributes = "";
			$this->RESULTS->HrefValue = "";
			$this->RESULTS->TooltipValue = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->LinkCustomAttributes = "";
			$this->ONGOING_PREG->HrefValue = "";
			$this->ONGOING_PREG->TooltipValue = "";

			// EDD_Date
			$this->EDD_Date->LinkCustomAttributes = "";
			$this->EDD_Date->HrefValue = "";
			$this->EDD_Date->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// NAME
			$this->NAME->EditAttrs["class"] = "form-control";
			$this->NAME->EditCustomAttributes = "";
			if (!$this->NAME->Raw)
				$this->NAME->AdvancedSearch->SearchValue = HtmlDecode($this->NAME->AdvancedSearch->SearchValue);
			$this->NAME->EditValue = HtmlEncode($this->NAME->AdvancedSearch->SearchValue);
			$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

			// HUSBAND NAME
			$this->HUSBAND_NAME->EditAttrs["class"] = "form-control";
			$this->HUSBAND_NAME->EditCustomAttributes = "";
			if (!$this->HUSBAND_NAME->Raw)
				$this->HUSBAND_NAME->AdvancedSearch->SearchValue = HtmlDecode($this->HUSBAND_NAME->AdvancedSearch->SearchValue);
			$this->HUSBAND_NAME->EditValue = HtmlEncode($this->HUSBAND_NAME->AdvancedSearch->SearchValue);
			$this->HUSBAND_NAME->PlaceHolder = RemoveHtml($this->HUSBAND_NAME->caption());

			// CoupleID
			$this->CoupleID->EditAttrs["class"] = "form-control";
			$this->CoupleID->EditCustomAttributes = "";
			if (!$this->CoupleID->Raw)
				$this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
			$this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
			$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

			// AGE  - WIFE
			$this->AGE____WIFE->EditAttrs["class"] = "form-control";
			$this->AGE____WIFE->EditCustomAttributes = "";
			if (!$this->AGE____WIFE->Raw)
				$this->AGE____WIFE->AdvancedSearch->SearchValue = HtmlDecode($this->AGE____WIFE->AdvancedSearch->SearchValue);
			$this->AGE____WIFE->EditValue = HtmlEncode($this->AGE____WIFE->AdvancedSearch->SearchValue);
			$this->AGE____WIFE->PlaceHolder = RemoveHtml($this->AGE____WIFE->caption());

			// AGE- HUSBAND
			$this->AGE__HUSBAND->EditAttrs["class"] = "form-control";
			$this->AGE__HUSBAND->EditCustomAttributes = "";
			if (!$this->AGE__HUSBAND->Raw)
				$this->AGE__HUSBAND->AdvancedSearch->SearchValue = HtmlDecode($this->AGE__HUSBAND->AdvancedSearch->SearchValue);
			$this->AGE__HUSBAND->EditValue = HtmlEncode($this->AGE__HUSBAND->AdvancedSearch->SearchValue);
			$this->AGE__HUSBAND->PlaceHolder = RemoveHtml($this->AGE__HUSBAND->caption());

			// ANXIOUS TO CONCEIVE FOR
			$this->ANXIOUS_TO_CONCEIVE_FOR->EditAttrs["class"] = "form-control";
			$this->ANXIOUS_TO_CONCEIVE_FOR->EditCustomAttributes = "";
			if (!$this->ANXIOUS_TO_CONCEIVE_FOR->Raw)
				$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue = HtmlDecode($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue);
			$this->ANXIOUS_TO_CONCEIVE_FOR->EditValue = HtmlEncode($this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue);
			$this->ANXIOUS_TO_CONCEIVE_FOR->PlaceHolder = RemoveHtml($this->ANXIOUS_TO_CONCEIVE_FOR->caption());

			// AMH ( NG/ML)
			$this->AMH_28_NG2FML29->EditAttrs["class"] = "form-control";
			$this->AMH_28_NG2FML29->EditCustomAttributes = "";
			if (!$this->AMH_28_NG2FML29->Raw)
				$this->AMH_28_NG2FML29->AdvancedSearch->SearchValue = HtmlDecode($this->AMH_28_NG2FML29->AdvancedSearch->SearchValue);
			$this->AMH_28_NG2FML29->EditValue = HtmlEncode($this->AMH_28_NG2FML29->AdvancedSearch->SearchValue);
			$this->AMH_28_NG2FML29->PlaceHolder = RemoveHtml($this->AMH_28_NG2FML29->caption());

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
			$this->TUBAL_PATENCY->EditCustomAttributes = "";
			if (!$this->TUBAL_PATENCY->Raw)
				$this->TUBAL_PATENCY->AdvancedSearch->SearchValue = HtmlDecode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
			$this->TUBAL_PATENCY->EditValue = HtmlEncode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
			$this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

			// HSG
			$this->HSG->EditAttrs["class"] = "form-control";
			$this->HSG->EditCustomAttributes = "";
			if (!$this->HSG->Raw)
				$this->HSG->AdvancedSearch->SearchValue = HtmlDecode($this->HSG->AdvancedSearch->SearchValue);
			$this->HSG->EditValue = HtmlEncode($this->HSG->AdvancedSearch->SearchValue);
			$this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

			// DHL
			$this->DHL->EditAttrs["class"] = "form-control";
			$this->DHL->EditCustomAttributes = "";
			if (!$this->DHL->Raw)
				$this->DHL->AdvancedSearch->SearchValue = HtmlDecode($this->DHL->AdvancedSearch->SearchValue);
			$this->DHL->EditValue = HtmlEncode($this->DHL->AdvancedSearch->SearchValue);
			$this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->UTERINE_PROBLEMS->EditCustomAttributes = "";
			if (!$this->UTERINE_PROBLEMS->Raw)
				$this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
			$this->UTERINE_PROBLEMS->EditValue = HtmlEncode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
			$this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

			// W_COMORBIDS
			$this->W_COMORBIDS->EditAttrs["class"] = "form-control";
			$this->W_COMORBIDS->EditCustomAttributes = "";
			if (!$this->W_COMORBIDS->Raw)
				$this->W_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
			$this->W_COMORBIDS->EditValue = HtmlEncode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
			$this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

			// H_COMORBIDS
			$this->H_COMORBIDS->EditAttrs["class"] = "form-control";
			$this->H_COMORBIDS->EditCustomAttributes = "";
			if (!$this->H_COMORBIDS->Raw)
				$this->H_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
			$this->H_COMORBIDS->EditValue = HtmlEncode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
			$this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
			$this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
			if (!$this->SEXUAL_DYSFUNCTION->Raw)
				$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
			$this->SEXUAL_DYSFUNCTION->EditValue = HtmlEncode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
			$this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

			// PREV IUI
			$this->PREV_IUI->EditAttrs["class"] = "form-control";
			$this->PREV_IUI->EditCustomAttributes = "";
			if (!$this->PREV_IUI->Raw)
				$this->PREV_IUI->AdvancedSearch->SearchValue = HtmlDecode($this->PREV_IUI->AdvancedSearch->SearchValue);
			$this->PREV_IUI->EditValue = HtmlEncode($this->PREV_IUI->AdvancedSearch->SearchValue);
			$this->PREV_IUI->PlaceHolder = RemoveHtml($this->PREV_IUI->caption());

			// PREV_IVF
			$this->PREV_IVF->EditAttrs["class"] = "form-control";
			$this->PREV_IVF->EditCustomAttributes = "";
			$this->PREV_IVF->EditValue = HtmlEncode($this->PREV_IVF->AdvancedSearch->SearchValue);
			$this->PREV_IVF->PlaceHolder = RemoveHtml($this->PREV_IVF->caption());

			// TABLETS
			$this->TABLETS->EditAttrs["class"] = "form-control";
			$this->TABLETS->EditCustomAttributes = "";
			if (!$this->TABLETS->Raw)
				$this->TABLETS->AdvancedSearch->SearchValue = HtmlDecode($this->TABLETS->AdvancedSearch->SearchValue);
			$this->TABLETS->EditValue = HtmlEncode($this->TABLETS->AdvancedSearch->SearchValue);
			$this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

			// INJTYPE
			$this->INJTYPE->EditAttrs["class"] = "form-control";
			$this->INJTYPE->EditCustomAttributes = "";
			if (!$this->INJTYPE->Raw)
				$this->INJTYPE->AdvancedSearch->SearchValue = HtmlDecode($this->INJTYPE->AdvancedSearch->SearchValue);
			$this->INJTYPE->EditValue = HtmlEncode($this->INJTYPE->AdvancedSearch->SearchValue);
			$this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

			// LMP
			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LMP->AdvancedSearch->SearchValue, 0), 8));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// TRIGGERR
			$this->TRIGGERR->EditAttrs["class"] = "form-control";
			$this->TRIGGERR->EditCustomAttributes = "";
			if (!$this->TRIGGERR->Raw)
				$this->TRIGGERR->AdvancedSearch->SearchValue = HtmlDecode($this->TRIGGERR->AdvancedSearch->SearchValue);
			$this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->AdvancedSearch->SearchValue);
			$this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

			// TRIGGERDATE
			$this->TRIGGERDATE->EditAttrs["class"] = "form-control";
			$this->TRIGGERDATE->EditCustomAttributes = "";
			$this->TRIGGERDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TRIGGERDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
			$this->FOLLICLE_STATUS->EditCustomAttributes = "";
			if (!$this->FOLLICLE_STATUS->Raw)
				$this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = HtmlDecode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
			$this->FOLLICLE_STATUS->EditValue = HtmlEncode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
			$this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
			$this->NUMBER_OF_IUI->EditCustomAttributes = "";
			if (!$this->NUMBER_OF_IUI->Raw)
				$this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = HtmlDecode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
			$this->NUMBER_OF_IUI->EditValue = HtmlEncode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
			$this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

			// PROCEDURE
			$this->PROCEDURE->EditAttrs["class"] = "form-control";
			$this->PROCEDURE->EditCustomAttributes = "";
			if (!$this->PROCEDURE->Raw)
				$this->PROCEDURE->AdvancedSearch->SearchValue = HtmlDecode($this->PROCEDURE->AdvancedSearch->SearchValue);
			$this->PROCEDURE->EditValue = HtmlEncode($this->PROCEDURE->AdvancedSearch->SearchValue);
			$this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
			$this->LUTEAL_SUPPORT->EditCustomAttributes = "";
			if (!$this->LUTEAL_SUPPORT->Raw)
				$this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = HtmlDecode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
			$this->LUTEAL_SUPPORT->EditValue = HtmlEncode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
			$this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

			// H/D SAMPLE
			$this->H2FD_SAMPLE->EditAttrs["class"] = "form-control";
			$this->H2FD_SAMPLE->EditCustomAttributes = "";
			if (!$this->H2FD_SAMPLE->Raw)
				$this->H2FD_SAMPLE->AdvancedSearch->SearchValue = HtmlDecode($this->H2FD_SAMPLE->AdvancedSearch->SearchValue);
			$this->H2FD_SAMPLE->EditValue = HtmlEncode($this->H2FD_SAMPLE->AdvancedSearch->SearchValue);
			$this->H2FD_SAMPLE->PlaceHolder = RemoveHtml($this->H2FD_SAMPLE->caption());

			// DONOR - I.D
			$this->DONOR___I_D->EditAttrs["class"] = "form-control";
			$this->DONOR___I_D->EditCustomAttributes = "";
			$this->DONOR___I_D->EditValue = HtmlEncode($this->DONOR___I_D->AdvancedSearch->SearchValue);
			$this->DONOR___I_D->PlaceHolder = RemoveHtml($this->DONOR___I_D->caption());

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

			// COLLECTION  METHOD
			$this->COLLECTION__METHOD->EditAttrs["class"] = "form-control";
			$this->COLLECTION__METHOD->EditCustomAttributes = "";
			if (!$this->COLLECTION__METHOD->Raw)
				$this->COLLECTION__METHOD->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTION__METHOD->AdvancedSearch->SearchValue);
			$this->COLLECTION__METHOD->EditValue = HtmlEncode($this->COLLECTION__METHOD->AdvancedSearch->SearchValue);
			$this->COLLECTION__METHOD->PlaceHolder = RemoveHtml($this->COLLECTION__METHOD->caption());

			// SAMPLE SOURCE
			$this->SAMPLE_SOURCE->EditAttrs["class"] = "form-control";
			$this->SAMPLE_SOURCE->EditCustomAttributes = "";
			if (!$this->SAMPLE_SOURCE->Raw)
				$this->SAMPLE_SOURCE->AdvancedSearch->SearchValue = HtmlDecode($this->SAMPLE_SOURCE->AdvancedSearch->SearchValue);
			$this->SAMPLE_SOURCE->EditValue = HtmlEncode($this->SAMPLE_SOURCE->AdvancedSearch->SearchValue);
			$this->SAMPLE_SOURCE->PlaceHolder = RemoveHtml($this->SAMPLE_SOURCE->caption());

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
			if (!$this->SPECIFIC_PROBLEMS->Raw)
				$this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

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
			if (!$this->LIQUIFACTION_STORAGE->Raw)
				$this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = HtmlDecode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
			$this->LIQUIFACTION_STORAGE->EditValue = HtmlEncode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
			$this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
			$this->IUI_PREP_METHOD->EditCustomAttributes = "";
			if (!$this->IUI_PREP_METHOD->Raw)
				$this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = HtmlDecode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
			$this->IUI_PREP_METHOD->EditValue = HtmlEncode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
			$this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
			$this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
			if (!$this->TIME_FROM_TRIGGER->Raw)
				$this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
			$this->TIME_FROM_TRIGGER->EditValue = HtmlEncode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
			$this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
			$this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
			if (!$this->COLLECTION_TO_PREPARATION->Raw)
				$this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
			$this->COLLECTION_TO_PREPARATION->EditValue = HtmlEncode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
			$this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
			$this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
			if (!$this->TIME_FROM_PREP_TO_INSEM->Raw)
				$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
			$this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
			$this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
			if (!$this->SPECIFIC_MATERNAL_PROBLEMS->Raw)
				$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
			$this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

			// RESULTS
			$this->RESULTS->EditAttrs["class"] = "form-control";
			$this->RESULTS->EditCustomAttributes = "";
			$this->RESULTS->EditValue = HtmlEncode($this->RESULTS->AdvancedSearch->SearchValue);
			$this->RESULTS->PlaceHolder = RemoveHtml($this->RESULTS->caption());

			// ONGOING_PREG
			$this->ONGOING_PREG->EditAttrs["class"] = "form-control";
			$this->ONGOING_PREG->EditCustomAttributes = "";
			if (!$this->ONGOING_PREG->Raw)
				$this->ONGOING_PREG->AdvancedSearch->SearchValue = HtmlDecode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
			$this->ONGOING_PREG->EditValue = HtmlEncode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
			$this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

			// EDD_Date
			$this->EDD_Date->EditAttrs["class"] = "form-control";
			$this->EDD_Date->EditCustomAttributes = "";
			$this->EDD_Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue, 0), 8));
			$this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
			$this->EDD_Date->EditAttrs["class"] = "form-control";
			$this->EDD_Date->EditCustomAttributes = "";
			$this->EDD_Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue2, 0), 8));
			$this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
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
		if (!CheckDate($this->LMP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->LMP->errorMessage());
		}
		if (!CheckDate($this->TRIGGERDATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->TRIGGERDATE->errorMessage());
		}
		if (!CheckInteger($this->DONOR___I_D->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DONOR___I_D->errorMessage());
		}
		if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PREG_TEST_DATE->errorMessage());
		}
		if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->PREG_TEST_DATE->errorMessage());
		}
		if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EDD_Date->errorMessage());
		}
		if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->EDD_Date->errorMessage());
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
		$this->NAME->AdvancedSearch->load();
		$this->HUSBAND_NAME->AdvancedSearch->load();
		$this->CoupleID->AdvancedSearch->load();
		$this->AGE____WIFE->AdvancedSearch->load();
		$this->AGE__HUSBAND->AdvancedSearch->load();
		$this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->load();
		$this->AMH_28_NG2FML29->AdvancedSearch->load();
		$this->TUBAL_PATENCY->AdvancedSearch->load();
		$this->HSG->AdvancedSearch->load();
		$this->DHL->AdvancedSearch->load();
		$this->UTERINE_PROBLEMS->AdvancedSearch->load();
		$this->W_COMORBIDS->AdvancedSearch->load();
		$this->H_COMORBIDS->AdvancedSearch->load();
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->load();
		$this->PREV_IUI->AdvancedSearch->load();
		$this->PREV_IVF->AdvancedSearch->load();
		$this->TABLETS->AdvancedSearch->load();
		$this->INJTYPE->AdvancedSearch->load();
		$this->LMP->AdvancedSearch->load();
		$this->TRIGGERR->AdvancedSearch->load();
		$this->TRIGGERDATE->AdvancedSearch->load();
		$this->FOLLICLE_STATUS->AdvancedSearch->load();
		$this->NUMBER_OF_IUI->AdvancedSearch->load();
		$this->PROCEDURE->AdvancedSearch->load();
		$this->LUTEAL_SUPPORT->AdvancedSearch->load();
		$this->H2FD_SAMPLE->AdvancedSearch->load();
		$this->DONOR___I_D->AdvancedSearch->load();
		$this->PREG_TEST_DATE->AdvancedSearch->load();
		$this->COLLECTION__METHOD->AdvancedSearch->load();
		$this->SAMPLE_SOURCE->AdvancedSearch->load();
		$this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
		$this->IMSC_1->AdvancedSearch->load();
		$this->IMSC_2->AdvancedSearch->load();
		$this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
		$this->IUI_PREP_METHOD->AdvancedSearch->load();
		$this->TIME_FROM_TRIGGER->AdvancedSearch->load();
		$this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
		$this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->load();
		$this->RESULTS->AdvancedSearch->load();
		$this->ONGOING_PREG->AdvancedSearch->load();
		$this->EDD_Date->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_iui_excellist.php"), "", $this->TableVar, TRUE);
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
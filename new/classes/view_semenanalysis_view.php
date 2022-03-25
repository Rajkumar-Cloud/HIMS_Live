<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_semenanalysis_view extends view_semenanalysis
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_semenanalysis';

	// Page object name
	public $PageObjName = "view_semenanalysis_view";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = TRUE;
	public $ExportWordCustom = TRUE;
	public $ExportPdfCustom = TRUE;
	public $ExportEmailCustom = TRUE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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
		$keyUrl = "";
		if (Get("id") !== NULL) {
			$this->RecKey["id"] = Get("id");
			$keyUrl .= "&amp;id=" . urlencode($this->RecKey["id"]);
		}
		$this->ExportPrintUrl = $this->pageUrl() . "export=print" . $keyUrl;
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html" . $keyUrl;
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel" . $keyUrl;
		$this->ExportWordUrl = $this->pageUrl() . "export=word" . $keyUrl;
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml" . $keyUrl;
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv" . $keyUrl;
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf" . $keyUrl;

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

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

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
		global $view_semenanalysis;
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
	public $ExportOptions; // Export options
	public $OtherOptions; // Other options
	public $DisplayRecords = 1;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $RecKey = [];
	public $IsModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canView()) {
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
			if (!$Security->canView()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("view_semenanalysislist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header
		if (Get("id") !== NULL) {
			if ($ExportFileName != "")
				$ExportFileName .= "_";
			$ExportFileName .= Get("id");
		}

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Custom export (post back from ew.applyTemplate), export and terminate page
		if (Post("customexport") !== NULL) {
			$this->CustomExport = Post("customexport");
			$this->Export = $this->CustomExport;
			$this->terminate();
		}

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Setup export options
		$this->setupExportOptions();
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

		// Check permission
		if (!$Security->canView()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("view_semenanalysislist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;

		// Load current record
		$loadCurrentRecord = FALSE;
		$returnUrl = "";
		$matchRecord = FALSE;
		if ($this->isPageRequest()) { // Validate request
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->RecKey["id"] = $this->id->QueryStringValue;
			} elseif (IsApi() && Key(0) !== NULL) {
				$this->id->setQueryStringValue(Key(0));
				$this->RecKey["id"] = $this->id->QueryStringValue;
			} elseif (Post("id") !== NULL) {
				$this->id->setFormValue(Post("id"));
				$this->RecKey["id"] = $this->id->FormValue;
			} elseif (IsApi() && Route(2) !== NULL) {
				$this->id->setFormValue(Route(2));
				$this->RecKey["id"] = $this->id->FormValue;
			} else {
				$returnUrl = "view_semenanalysislist.php"; // Return to list
			}

			// Get action
			$this->CurrentAction = "show"; // Display
			switch ($this->CurrentAction) {
				case "show": // Get a record to display

					// Load record based on key
					if (IsApi()) {
						$filter = $this->getRecordFilter();
						$this->CurrentFilter = $filter;
						$sql = $this->getCurrentSql();
						$conn = $this->getConnection();
						$this->Recordset = LoadRecordset($sql, $conn);
						$res = $this->Recordset && !$this->Recordset->EOF;
					} else {
						$res = $this->loadRow();
					}
					if (!$res) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
						$returnUrl = "view_semenanalysislist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "view_semenanalysislist.php"; // Not page request, return to list
		}
		if ($returnUrl != "") {
			$this->terminate($returnUrl);
			return;
		}

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Render row
		$this->RowType = ROWTYPE_VIEW;
		$this->resetAttributes();
		$this->renderRow();

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset, TRUE); // Get current record only
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows]);
			$this->terminate(TRUE);
		}
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		$item->Visible = ($this->AddUrl != "" && $Security->canAdd());

		// Edit
		$item = &$option->add("edit");
		$editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		$item->Visible = ($this->EditUrl != "" && $Security->canEdit());

		// Delete
		$item = &$option->add("delete");
		if ($this->IsModal) // Handle as inline delete
			$item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery($this->DeleteUrl, "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl != "" && $Security->canDelete());

		// Set up action default
		$option = $options["action"];
		$option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
		$option->UseDropDownButton = FALSE;
		$option->UseButtonGroup = TRUE;
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
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
		$this->PaID->setDbValue($row['PaID']);
		$this->PaName->setDbValue($row['PaName']);
		$this->PaMobile->setDbValue($row['PaMobile']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerMobile->setDbValue($row['PartnerMobile']);
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->HusbandName->setDbValue($row['HusbandName']);
		$this->RequestDr->setDbValue($row['RequestDr']);
		$this->CollectionDate->setDbValue($row['CollectionDate']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->RequestSample->setDbValue($row['RequestSample']);
		$this->CollectionType->setDbValue($row['CollectionType']);
		$this->CollectionMethod->setDbValue($row['CollectionMethod']);
		$this->Medicationused->setDbValue($row['Medicationused']);
		$this->DifficultiesinCollection->setDbValue($row['DifficultiesinCollection']);
		$this->Volume->setDbValue($row['Volume']);
		$this->pH->setDbValue($row['pH']);
		$this->Timeofcollection->setDbValue($row['Timeofcollection']);
		$this->Timeofexamination->setDbValue($row['Timeofexamination']);
		$this->Concentration->setDbValue($row['Concentration']);
		$this->Total->setDbValue($row['Total']);
		$this->ProgressiveMotility->setDbValue($row['ProgressiveMotility']);
		$this->NonProgrssiveMotile->setDbValue($row['NonProgrssiveMotile']);
		$this->Immotile->setDbValue($row['Immotile']);
		$this->TotalProgrssiveMotile->setDbValue($row['TotalProgrssiveMotile']);
		$this->Appearance->setDbValue($row['Appearance']);
		$this->Homogenosity->setDbValue($row['Homogenosity']);
		$this->CompleteSample->setDbValue($row['CompleteSample']);
		$this->Liquefactiontime->setDbValue($row['Liquefactiontime']);
		$this->Normal->setDbValue($row['Normal']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->Headdefects->setDbValue($row['Headdefects']);
		$this->MidpieceDefects->setDbValue($row['MidpieceDefects']);
		$this->TailDefects->setDbValue($row['TailDefects']);
		$this->NormalProgMotile->setDbValue($row['NormalProgMotile']);
		$this->ImmatureForms->setDbValue($row['ImmatureForms']);
		$this->Leucocytes->setDbValue($row['Leucocytes']);
		$this->Agglutination->setDbValue($row['Agglutination']);
		$this->Debris->setDbValue($row['Debris']);
		$this->Diagnosis->setDbValue($row['Diagnosis']);
		$this->Observations->setDbValue($row['Observations']);
		$this->Signature->setDbValue($row['Signature']);
		$this->SemenOrgin->setDbValue($row['SemenOrgin']);
		$this->Donor->setDbValue($row['Donor']);
		$this->DonorBloodgroup->setDbValue($row['DonorBloodgroup']);
		$this->Tank->setDbValue($row['Tank']);
		$this->Location->setDbValue($row['Location']);
		$this->Volume1->setDbValue($row['Volume1']);
		$this->Concentration1->setDbValue($row['Concentration1']);
		$this->Total1->setDbValue($row['Total1']);
		$this->ProgressiveMotility1->setDbValue($row['ProgressiveMotility1']);
		$this->NonProgrssiveMotile1->setDbValue($row['NonProgrssiveMotile1']);
		$this->Immotile1->setDbValue($row['Immotile1']);
		$this->TotalProgrssiveMotile1->setDbValue($row['TotalProgrssiveMotile1']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Color->setDbValue($row['Color']);
		$this->DoneBy->setDbValue($row['DoneBy']);
		$this->Method->setDbValue($row['Method']);
		$this->Abstinence->setDbValue($row['Abstinence']);
		$this->ProcessedBy->setDbValue($row['ProcessedBy']);
		$this->InseminationTime->setDbValue($row['InseminationTime']);
		$this->InseminationBy->setDbValue($row['InseminationBy']);
		$this->Big->setDbValue($row['Big']);
		$this->Medium->setDbValue($row['Medium']);
		$this->Small->setDbValue($row['Small']);
		$this->NoHalo->setDbValue($row['NoHalo']);
		$this->Fragmented->setDbValue($row['Fragmented']);
		$this->NonFragmented->setDbValue($row['NonFragmented']);
		$this->DFI->setDbValue($row['DFI']);
		$this->IsueBy->setDbValue($row['IsueBy']);
		$this->Volume2->setDbValue($row['Volume2']);
		$this->Concentration2->setDbValue($row['Concentration2']);
		$this->Total2->setDbValue($row['Total2']);
		$this->ProgressiveMotility2->setDbValue($row['ProgressiveMotility2']);
		$this->NonProgrssiveMotile2->setDbValue($row['NonProgrssiveMotile2']);
		$this->Immotile2->setDbValue($row['Immotile2']);
		$this->TotalProgrssiveMotile2->setDbValue($row['TotalProgrssiveMotile2']);
		$this->IssuedBy->setDbValue($row['IssuedBy']);
		$this->IssuedTo->setDbValue($row['IssuedTo']);
		$this->MACS->setDbValue($row['MACS']);
		$this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
		$this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
		$this->IMSC_1->setDbValue($row['IMSC_1']);
		$this->IMSC_2->setDbValue($row['IMSC_2']);
		$this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
		$this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
		$this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
		$this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
		$this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PaID'] = NULL;
		$row['PaName'] = NULL;
		$row['PaMobile'] = NULL;
		$row['PartnerID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerMobile'] = NULL;
		$row['RIDNo'] = NULL;
		$row['PatientName'] = NULL;
		$row['HusbandName'] = NULL;
		$row['RequestDr'] = NULL;
		$row['CollectionDate'] = NULL;
		$row['ResultDate'] = NULL;
		$row['RequestSample'] = NULL;
		$row['CollectionType'] = NULL;
		$row['CollectionMethod'] = NULL;
		$row['Medicationused'] = NULL;
		$row['DifficultiesinCollection'] = NULL;
		$row['Volume'] = NULL;
		$row['pH'] = NULL;
		$row['Timeofcollection'] = NULL;
		$row['Timeofexamination'] = NULL;
		$row['Concentration'] = NULL;
		$row['Total'] = NULL;
		$row['ProgressiveMotility'] = NULL;
		$row['NonProgrssiveMotile'] = NULL;
		$row['Immotile'] = NULL;
		$row['TotalProgrssiveMotile'] = NULL;
		$row['Appearance'] = NULL;
		$row['Homogenosity'] = NULL;
		$row['CompleteSample'] = NULL;
		$row['Liquefactiontime'] = NULL;
		$row['Normal'] = NULL;
		$row['Abnormal'] = NULL;
		$row['Headdefects'] = NULL;
		$row['MidpieceDefects'] = NULL;
		$row['TailDefects'] = NULL;
		$row['NormalProgMotile'] = NULL;
		$row['ImmatureForms'] = NULL;
		$row['Leucocytes'] = NULL;
		$row['Agglutination'] = NULL;
		$row['Debris'] = NULL;
		$row['Diagnosis'] = NULL;
		$row['Observations'] = NULL;
		$row['Signature'] = NULL;
		$row['SemenOrgin'] = NULL;
		$row['Donor'] = NULL;
		$row['DonorBloodgroup'] = NULL;
		$row['Tank'] = NULL;
		$row['Location'] = NULL;
		$row['Volume1'] = NULL;
		$row['Concentration1'] = NULL;
		$row['Total1'] = NULL;
		$row['ProgressiveMotility1'] = NULL;
		$row['NonProgrssiveMotile1'] = NULL;
		$row['Immotile1'] = NULL;
		$row['TotalProgrssiveMotile1'] = NULL;
		$row['TidNo'] = NULL;
		$row['Color'] = NULL;
		$row['DoneBy'] = NULL;
		$row['Method'] = NULL;
		$row['Abstinence'] = NULL;
		$row['ProcessedBy'] = NULL;
		$row['InseminationTime'] = NULL;
		$row['InseminationBy'] = NULL;
		$row['Big'] = NULL;
		$row['Medium'] = NULL;
		$row['Small'] = NULL;
		$row['NoHalo'] = NULL;
		$row['Fragmented'] = NULL;
		$row['NonFragmented'] = NULL;
		$row['DFI'] = NULL;
		$row['IsueBy'] = NULL;
		$row['Volume2'] = NULL;
		$row['Concentration2'] = NULL;
		$row['Total2'] = NULL;
		$row['ProgressiveMotility2'] = NULL;
		$row['NonProgrssiveMotile2'] = NULL;
		$row['Immotile2'] = NULL;
		$row['TotalProgrssiveMotile2'] = NULL;
		$row['IssuedBy'] = NULL;
		$row['IssuedTo'] = NULL;
		$row['MACS'] = NULL;
		$row['PREG_TEST_DATE'] = NULL;
		$row['SPECIFIC_PROBLEMS'] = NULL;
		$row['IMSC_1'] = NULL;
		$row['IMSC_2'] = NULL;
		$row['LIQUIFACTION_STORAGE'] = NULL;
		$row['IUI_PREP_METHOD'] = NULL;
		$row['TIME_FROM_TRIGGER'] = NULL;
		$row['COLLECTION_TO_PREPARATION'] = NULL;
		$row['TIME_FROM_PREP_TO_INSEM'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->AddUrl = $this->getAddUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();
		$this->ListUrl = $this->getListUrl();
		$this->setupOtherOptions();

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
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_semenanalysisview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_semenanalysisview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_semenanalysisview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_view_semenanalysis" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_semenanalysis\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_semenanalysisview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = TRUE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word", $this->ExportWordCustom);
		$item->Visible = TRUE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = TRUE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = TRUE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = TRUE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
		$item->Visible = TRUE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email", $this->ExportEmailCustom);
		$item->Visible = TRUE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = TRUE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide options for export
		if ($this->isExport())
			$this->ExportOptions->hideAllOptions();
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = FALSE;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;
		$this->setupStartRecord(); // Set up start record position

		// Set the last record to display
		if ($this->DisplayRecords <= 0) {
			$this->StopRecord = $this->TotalRecords;
		} else {
			$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
		}
		$this->ExportDoc = GetExportDocument($this, "v");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "view");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {
			if ($return)
				return $doc->Text; // Return email content
			else
				echo $this->exportEmail($doc->Text); // Send email
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Export email
	protected function exportEmail($emailContent)
	{
		global $TempImages, $Language;
		$sender = Post("sender", "");
		$recipient = Post("recipient", "");
		$cc = Post("cc", "");
		$bcc = Post("bcc", "");

		// Subject
		$subject = Post("subject", "");
		$emailSubject = $subject;

		// Message
		$content = Post("message", "");
		$emailMessage = $content;

		// Check sender
		if ($sender == "") {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterSenderEmail") . "</p>";
		}
		if (!CheckEmail($sender)) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
		}

		// Check recipient
		if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
		}

		// Check cc
		if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
		}

		// Check bcc
		if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
			return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
		}

		// Check email sent count
		if (!isset($_SESSION[Config("EXPORT_EMAIL_COUNTER")]))
			$_SESSION[Config("EXPORT_EMAIL_COUNTER")] = 0;
		if ((int)$_SESSION[Config("EXPORT_EMAIL_COUNTER")] > Config("MAX_EMAIL_SENT_COUNT")) {
			return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
		}

		// Send email
		$email = new Email();
		$email->Sender = $sender; // Sender
		$email->Recipient = $recipient; // Recipient
		$email->Cc = $cc; // Cc
		$email->Bcc = $bcc; // Bcc
		$email->Subject = $emailSubject; // Subject
		$email->Format = "html";
		if ($emailMessage != "")
			$emailMessage = RemoveXss($emailMessage) . "<br><br>";
		foreach ($TempImages as $tmpImage)
			$email->addEmbeddedImage($tmpImage);
		$email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
		$eventArgs = [];
		if ($this->Recordset)
			$eventArgs["rs"] = &$this->Recordset;
		$emailSent = FALSE;
		if ($this->Email_Sending($email, $eventArgs))
			$emailSent = $email->send();

		// Check email sent status
		if ($emailSent) {

			// Update email sent count
			$_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

			// Sent email success
			return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
		} else {

			// Sent email failure
			return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_semenanalysislist.php"), "", $this->TableVar, TRUE);
		$pageId = "view";
		$Breadcrumb->add("view", $pageId, $url);
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

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}
} // End class
?>
<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ip_admission_view extends ip_admission
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ip_admission';

	// Page object name
	public $PageObjName = "ip_admission_view";

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

		// Table object (ip_admission)
		if (!isset($GLOBALS["ip_admission"]) || get_class($GLOBALS["ip_admission"]) == PROJECT_NAMESPACE . "ip_admission") {
			$GLOBALS["ip_admission"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ip_admission"];
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
					$this->terminate(GetUrl("ip_admissionlist.php"));
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
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
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
		if (!$Security->canView()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ip_admissionlist.php");
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
				$returnUrl = "ip_admissionlist.php"; // Return to list
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
						$returnUrl = "ip_admissionlist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "ip_admissionlist.php"; // Not page request, return to list
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

		// Set up detail parameters
		$this->setupDetailParms();

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

		// Copy
		$item = &$option->add("copy");
		$copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->CopyUrl) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
		$item->Visible = ($this->CopyUrl != "" && $Security->canAdd());

		// Delete
		$item = &$option->add("delete");
		if ($this->IsModal) // Handle as inline delete
			$item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery($this->DeleteUrl, "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl != "" && $Security->canDelete());
		$option = $options["detail"];
		$detailTableLink = "";
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_patient_vitals"
		$item = &$option->add("detail_patient_vitals");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_vitals", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_vitalslist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_vitals_grid"]))
			$GLOBALS["patient_vitals_grid"] = new patient_vitals_grid();
		if ($GLOBALS["patient_vitals_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_vitals";
		}
		if ($GLOBALS["patient_vitals_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_vitals";
		}
		if ($GLOBALS["patient_vitals_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_vitals";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_vitals');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_vitals";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_history"
		$item = &$option->add("detail_patient_history");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_history", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_historylist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_history_grid"]))
			$GLOBALS["patient_history_grid"] = new patient_history_grid();
		if ($GLOBALS["patient_history_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_history";
		}
		if ($GLOBALS["patient_history_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_history";
		}
		if ($GLOBALS["patient_history_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_history";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_history');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_history";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_provisional_diagnosis"
		$item = &$option->add("detail_patient_provisional_diagnosis");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_provisional_diagnosis", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_provisional_diagnosislist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_provisional_diagnosis_grid"]))
			$GLOBALS["patient_provisional_diagnosis_grid"] = new patient_provisional_diagnosis_grid();
		if ($GLOBALS["patient_provisional_diagnosis_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_provisional_diagnosis";
		}
		if ($GLOBALS["patient_provisional_diagnosis_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_provisional_diagnosis";
		}
		if ($GLOBALS["patient_provisional_diagnosis_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_provisional_diagnosis";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_provisional_diagnosis');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_provisional_diagnosis";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_prescription"
		$item = &$option->add("detail_patient_prescription");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_prescription", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_prescriptionlist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_prescription_grid"]))
			$GLOBALS["patient_prescription_grid"] = new patient_prescription_grid();
		if ($GLOBALS["patient_prescription_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_prescription";
		}
		if ($GLOBALS["patient_prescription_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_prescription";
		}
		if ($GLOBALS["patient_prescription_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_prescription";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_prescription');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_prescription";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_final_diagnosis"
		$item = &$option->add("detail_patient_final_diagnosis");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_final_diagnosis", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_final_diagnosislist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_final_diagnosis_grid"]))
			$GLOBALS["patient_final_diagnosis_grid"] = new patient_final_diagnosis_grid();
		if ($GLOBALS["patient_final_diagnosis_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_final_diagnosis";
		}
		if ($GLOBALS["patient_final_diagnosis_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_final_diagnosis";
		}
		if ($GLOBALS["patient_final_diagnosis_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_final_diagnosis";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_final_diagnosis');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_final_diagnosis";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_follow_up"
		$item = &$option->add("detail_patient_follow_up");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_follow_up", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_follow_uplist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_follow_up_grid"]))
			$GLOBALS["patient_follow_up_grid"] = new patient_follow_up_grid();
		if ($GLOBALS["patient_follow_up_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_follow_up";
		}
		if ($GLOBALS["patient_follow_up_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_follow_up";
		}
		if ($GLOBALS["patient_follow_up_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_follow_up";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_follow_up');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_follow_up";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_ot_delivery_register"
		$item = &$option->add("detail_patient_ot_delivery_register");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_ot_delivery_register", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_ot_delivery_registerlist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_ot_delivery_register_grid"]))
			$GLOBALS["patient_ot_delivery_register_grid"] = new patient_ot_delivery_register_grid();
		if ($GLOBALS["patient_ot_delivery_register_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_ot_delivery_register";
		}
		if ($GLOBALS["patient_ot_delivery_register_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_ot_delivery_register";
		}
		if ($GLOBALS["patient_ot_delivery_register_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_ot_delivery_register";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_ot_delivery_register');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_ot_delivery_register";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_ot_surgery_register"
		$item = &$option->add("detail_patient_ot_surgery_register");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_ot_surgery_register", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_ot_surgery_registerlist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_ot_surgery_register_grid"]))
			$GLOBALS["patient_ot_surgery_register_grid"] = new patient_ot_surgery_register_grid();
		if ($GLOBALS["patient_ot_surgery_register_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_ot_surgery_register";
		}
		if ($GLOBALS["patient_ot_surgery_register_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_ot_surgery_register";
		}
		if ($GLOBALS["patient_ot_surgery_register_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_ot_surgery_register";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_ot_surgery_register');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_ot_surgery_register";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_services"
		$item = &$option->add("detail_patient_services");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_services", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_serviceslist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_services_grid"]))
			$GLOBALS["patient_services_grid"] = new patient_services_grid();
		if ($GLOBALS["patient_services_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_services";
		}
		if ($GLOBALS["patient_services_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_services";
		}
		if ($GLOBALS["patient_services_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_services";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_services');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_services";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_investigations"
		$item = &$option->add("detail_patient_investigations");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_investigations", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_investigationslist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_investigations_grid"]))
			$GLOBALS["patient_investigations_grid"] = new patient_investigations_grid();
		if ($GLOBALS["patient_investigations_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_investigations";
		}
		if ($GLOBALS["patient_investigations_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_investigations";
		}
		if ($GLOBALS["patient_investigations_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_investigations";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_investigations');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_investigations";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_insurance"
		$item = &$option->add("detail_patient_insurance");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_insurance", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_insurancelist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_insurance_grid"]))
			$GLOBALS["patient_insurance_grid"] = new patient_insurance_grid();
		if ($GLOBALS["patient_insurance_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_insurance";
		}
		if ($GLOBALS["patient_insurance_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_insurance";
		}
		if ($GLOBALS["patient_insurance_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_insurance";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_insurance');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_insurance";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_pharmacy_pharled"
		$item = &$option->add("detail_pharmacy_pharled");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("pharmacy_pharled", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("pharmacy_pharledlist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["pharmacy_pharled_grid"]))
			$GLOBALS["pharmacy_pharled_grid"] = new pharmacy_pharled_grid();
		if ($GLOBALS["pharmacy_pharled_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "pharmacy_pharled";
		}
		if ($GLOBALS["pharmacy_pharled_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "pharmacy_pharled";
		}
		if ($GLOBALS["pharmacy_pharled_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "pharmacy_pharled";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'pharmacy_pharled');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "pharmacy_pharled";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_view_ip_advance"
		$item = &$option->add("detail_view_ip_advance");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("view_ip_advance", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("view_ip_advancelist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["view_ip_advance_grid"]))
			$GLOBALS["view_ip_advance_grid"] = new view_ip_advance_grid();
		if ($GLOBALS["view_ip_advance_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "view_ip_advance";
		}
		if ($GLOBALS["view_ip_advance_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "view_ip_advance";
		}
		if ($GLOBALS["view_ip_advance_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "view_ip_advance";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'view_ip_advance');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "view_ip_advance";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// "detail_patient_room"
		$item = &$option->add("detail_patient_room");
		$body = $Language->phrase("ViewPageDetailLink") . $Language->TablePhrase("patient_room", "TblCaption");
		$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_roomlist.php?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "&fk_mrnNo=" . urlencode(strval($this->mrnNo->CurrentValue)) . "&fk_patient_id=" . urlencode(strval($this->patient_id->CurrentValue)) . "") . "\">" . $body . "</a>";
		$links = "";
		if (!isset($GLOBALS["patient_room_grid"]))
			$GLOBALS["patient_room_grid"] = new patient_room_grid();
		if ($GLOBALS["patient_room_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			if ($detailViewTblVar != "")
				$detailViewTblVar .= ",";
			$detailViewTblVar .= "patient_room";
		}
		if ($GLOBALS["patient_room_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			if ($detailEditTblVar != "")
				$detailEditTblVar .= ",";
			$detailEditTblVar .= "patient_room";
		}
		if ($GLOBALS["patient_room_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
			$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room")) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			if ($detailCopyTblVar != "")
				$detailCopyTblVar .= ",";
			$detailCopyTblVar .= "patient_room";
		}
		if ($links != "") {
			$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
			$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
		}
		$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
		$item->Body = $body;
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_room');
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_room";
		}
		if ($this->ShowMultipleDetails)
			$item->Visible = FALSE;

		// Multiple details
		if ($this->ShowMultipleDetails) {
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
			$links = "";
			if ($detailViewTblVar != "") {
				$links .= "<li><a class=\"ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			}
			if ($detailEditTblVar != "") {
				$links .= "<li><a class=\"ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			}
			if ($detailCopyTblVar != "") {
				$links .= "<li><a class=\"ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
				$body .= "<ul class=\"dropdown-menu ew-menu\">". $links . "</ul>";
			}
			$body .= "</div>";

			// Multiple details
			$item = &$option->add("details");
			$item->Body = $body;
		}

		// Set up detail default
		$option = $options["detail"];
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$ar = explode(",", $detailTableLink);
		$cnt = count($ar);
		$option->UseDropDownButton = ($cnt > 1);
		$option->UseButtonGroup = TRUE;
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
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
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fip_admissionview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fip_admissionview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fip_admissionview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_ip_admission" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ip_admission\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fip_admissionview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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

		// Export detail records (patient_vitals)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_vitals", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_vitals;
			if (!isset($patient_vitals))
				$patient_vitals = new patient_vitals();
			$rsdetail = $patient_vitals->loadRs($patient_vitals->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_vitals;
					$patient_vitals->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_history)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_history", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_history;
			if (!isset($patient_history))
				$patient_history = new patient_history();
			$rsdetail = $patient_history->loadRs($patient_history->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_history;
					$patient_history->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_provisional_diagnosis)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_provisional_diagnosis", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_provisional_diagnosis;
			if (!isset($patient_provisional_diagnosis))
				$patient_provisional_diagnosis = new patient_provisional_diagnosis();
			$rsdetail = $patient_provisional_diagnosis->loadRs($patient_provisional_diagnosis->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_provisional_diagnosis;
					$patient_provisional_diagnosis->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_prescription)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_prescription", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_prescription;
			if (!isset($patient_prescription))
				$patient_prescription = new patient_prescription();
			$rsdetail = $patient_prescription->loadRs($patient_prescription->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_prescription;
					$patient_prescription->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_final_diagnosis)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_final_diagnosis", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_final_diagnosis;
			if (!isset($patient_final_diagnosis))
				$patient_final_diagnosis = new patient_final_diagnosis();
			$rsdetail = $patient_final_diagnosis->loadRs($patient_final_diagnosis->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_final_diagnosis;
					$patient_final_diagnosis->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_follow_up)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_follow_up", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_follow_up;
			if (!isset($patient_follow_up))
				$patient_follow_up = new patient_follow_up();
			$rsdetail = $patient_follow_up->loadRs($patient_follow_up->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_follow_up;
					$patient_follow_up->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_ot_delivery_register)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_ot_delivery_register", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_ot_delivery_register;
			if (!isset($patient_ot_delivery_register))
				$patient_ot_delivery_register = new patient_ot_delivery_register();
			$rsdetail = $patient_ot_delivery_register->loadRs($patient_ot_delivery_register->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_ot_delivery_register;
					$patient_ot_delivery_register->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_ot_surgery_register)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_ot_surgery_register", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_ot_surgery_register;
			if (!isset($patient_ot_surgery_register))
				$patient_ot_surgery_register = new patient_ot_surgery_register();
			$rsdetail = $patient_ot_surgery_register->loadRs($patient_ot_surgery_register->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_ot_surgery_register;
					$patient_ot_surgery_register->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_services)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_services", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_services;
			if (!isset($patient_services))
				$patient_services = new patient_services();
			$rsdetail = $patient_services->loadRs($patient_services->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_services;
					$patient_services->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_investigations)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_investigations", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_investigations;
			if (!isset($patient_investigations))
				$patient_investigations = new patient_investigations();
			$rsdetail = $patient_investigations->loadRs($patient_investigations->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_investigations;
					$patient_investigations->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_insurance)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_insurance", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_insurance;
			if (!isset($patient_insurance))
				$patient_insurance = new patient_insurance();
			$rsdetail = $patient_insurance->loadRs($patient_insurance->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_insurance;
					$patient_insurance->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (pharmacy_pharled)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("pharmacy_pharled", explode(",", $this->getCurrentDetailTable()))) {
			global $pharmacy_pharled;
			if (!isset($pharmacy_pharled))
				$pharmacy_pharled = new pharmacy_pharled();
			$rsdetail = $pharmacy_pharled->loadRs($pharmacy_pharled->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $pharmacy_pharled;
					$pharmacy_pharled->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (view_ip_advance)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("view_ip_advance", explode(",", $this->getCurrentDetailTable()))) {
			global $view_ip_advance;
			if (!isset($view_ip_advance))
				$view_ip_advance = new view_ip_advance();
			$rsdetail = $view_ip_advance->loadRs($view_ip_advance->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $view_ip_advance;
					$view_ip_advance->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}

		// Export detail records (patient_room)
		if (Config("EXPORT_DETAIL_RECORDS") && in_array("patient_room", explode(",", $this->getCurrentDetailTable()))) {
			global $patient_room;
			if (!isset($patient_room))
				$patient_room = new patient_room();
			$rsdetail = $patient_room->loadRs($patient_room->getDetailFilter()); // Load detail records
			if ($rsdetail && !$rsdetail->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("h"); // Change to horizontal
				if (!$this->isExport("csv") || Config("EXPORT_DETAIL_RECORDS_FOR_CSV")) {
					$doc->exportEmptyRow();
					$detailcnt = $rsdetail->RecordCount();
					$oldtbl = $doc->Table;
					$doc->Table = $patient_room;
					$patient_room->exportDocument($doc, $rsdetail, 1, $detailcnt);
					$doc->Table = $oldtbl;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsdetail->close();
			}
		}
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
				if ($GLOBALS["patient_vitals_grid"]->DetailView) {
					$GLOBALS["patient_vitals_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_history_grid"]->DetailView) {
					$GLOBALS["patient_history_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_provisional_diagnosis_grid"]->DetailView) {
					$GLOBALS["patient_provisional_diagnosis_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_prescription_grid"]->DetailView) {
					$GLOBALS["patient_prescription_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_final_diagnosis_grid"]->DetailView) {
					$GLOBALS["patient_final_diagnosis_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_follow_up_grid"]->DetailView) {
					$GLOBALS["patient_follow_up_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_ot_delivery_register_grid"]->DetailView) {
					$GLOBALS["patient_ot_delivery_register_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_ot_surgery_register_grid"]->DetailView) {
					$GLOBALS["patient_ot_surgery_register_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_services_grid"]->DetailView) {
					$GLOBALS["patient_services_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_investigations_grid"]->DetailView) {
					$GLOBALS["patient_investigations_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_insurance_grid"]->DetailView) {
					$GLOBALS["patient_insurance_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["pharmacy_pharled_grid"]->DetailView) {
					$GLOBALS["pharmacy_pharled_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["view_ip_advance_grid"]->DetailView) {
					$GLOBALS["view_ip_advance_grid"]->CurrentMode = "view";

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
				if ($GLOBALS["patient_room_grid"]->DetailView) {
					$GLOBALS["patient_room_grid"]->CurrentMode = "view";

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
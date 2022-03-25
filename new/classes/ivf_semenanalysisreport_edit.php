<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_semenanalysisreport_edit extends ivf_semenanalysisreport
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_semenanalysisreport';

	// Page object name
	public $PageObjName = "ivf_semenanalysisreport_edit";

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

		// Table object (ivf_semenanalysisreport)
		if (!isset($GLOBALS["ivf_semenanalysisreport"]) || get_class($GLOBALS["ivf_semenanalysisreport"]) == PROJECT_NAMESPACE . "ivf_semenanalysisreport") {
			$GLOBALS["ivf_semenanalysisreport"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_semenanalysisreport"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS['view_ivf_treatment']))
			$GLOBALS['view_ivf_treatment'] = new view_ivf_treatment();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_semenanalysisreport');

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
		global $ivf_semenanalysisreport;
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
				$doc = new $class($ivf_semenanalysisreport);
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
					if ($pageName == "ivf_semenanalysisreportview.php")
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
					$this->terminate(GetUrl("ivf_semenanalysisreportlist.php"));
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
		$this->pH->setVisibility();
		$this->Timeofcollection->setVisibility();
		$this->Timeofexamination->setVisibility();
		$this->Volume->setVisibility();
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
		$this->MACS->setVisibility();
		$this->IssuedBy->setVisibility();
		$this->IssuedTo->setVisibility();
		$this->PaID->setVisibility();
		$this->PaName->setVisibility();
		$this->PaMobile->setVisibility();
		$this->PartnerID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerMobile->setVisibility();
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
		$this->setupLookupOptions($this->Donor);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_semenanalysisreportlist.php");
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
					$this->terminate("ivf_semenanalysisreportlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "ivf_semenanalysisreportlist.php")
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

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'HusbandName' first before field var 'x_HusbandName'
		$val = $CurrentForm->hasValue("HusbandName") ? $CurrentForm->getValue("HusbandName") : $CurrentForm->getValue("x_HusbandName");
		if (!$this->HusbandName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HusbandName->Visible = FALSE; // Disable update for API request
			else
				$this->HusbandName->setFormValue($val);
		}

		// Check field name 'RequestDr' first before field var 'x_RequestDr'
		$val = $CurrentForm->hasValue("RequestDr") ? $CurrentForm->getValue("RequestDr") : $CurrentForm->getValue("x_RequestDr");
		if (!$this->RequestDr->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RequestDr->Visible = FALSE; // Disable update for API request
			else
				$this->RequestDr->setFormValue($val);
		}

		// Check field name 'CollectionDate' first before field var 'x_CollectionDate'
		$val = $CurrentForm->hasValue("CollectionDate") ? $CurrentForm->getValue("CollectionDate") : $CurrentForm->getValue("x_CollectionDate");
		if (!$this->CollectionDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CollectionDate->Visible = FALSE; // Disable update for API request
			else
				$this->CollectionDate->setFormValue($val);
			$this->CollectionDate->CurrentValue = UnFormatDateTime($this->CollectionDate->CurrentValue, 0);
		}

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		}

		// Check field name 'RequestSample' first before field var 'x_RequestSample'
		$val = $CurrentForm->hasValue("RequestSample") ? $CurrentForm->getValue("RequestSample") : $CurrentForm->getValue("x_RequestSample");
		if (!$this->RequestSample->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RequestSample->Visible = FALSE; // Disable update for API request
			else
				$this->RequestSample->setFormValue($val);
		}

		// Check field name 'CollectionType' first before field var 'x_CollectionType'
		$val = $CurrentForm->hasValue("CollectionType") ? $CurrentForm->getValue("CollectionType") : $CurrentForm->getValue("x_CollectionType");
		if (!$this->CollectionType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CollectionType->Visible = FALSE; // Disable update for API request
			else
				$this->CollectionType->setFormValue($val);
		}

		// Check field name 'CollectionMethod' first before field var 'x_CollectionMethod'
		$val = $CurrentForm->hasValue("CollectionMethod") ? $CurrentForm->getValue("CollectionMethod") : $CurrentForm->getValue("x_CollectionMethod");
		if (!$this->CollectionMethod->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CollectionMethod->Visible = FALSE; // Disable update for API request
			else
				$this->CollectionMethod->setFormValue($val);
		}

		// Check field name 'Medicationused' first before field var 'x_Medicationused'
		$val = $CurrentForm->hasValue("Medicationused") ? $CurrentForm->getValue("Medicationused") : $CurrentForm->getValue("x_Medicationused");
		if (!$this->Medicationused->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Medicationused->Visible = FALSE; // Disable update for API request
			else
				$this->Medicationused->setFormValue($val);
		}

		// Check field name 'DifficultiesinCollection' first before field var 'x_DifficultiesinCollection'
		$val = $CurrentForm->hasValue("DifficultiesinCollection") ? $CurrentForm->getValue("DifficultiesinCollection") : $CurrentForm->getValue("x_DifficultiesinCollection");
		if (!$this->DifficultiesinCollection->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DifficultiesinCollection->Visible = FALSE; // Disable update for API request
			else
				$this->DifficultiesinCollection->setFormValue($val);
		}

		// Check field name 'pH' first before field var 'x_pH'
		$val = $CurrentForm->hasValue("pH") ? $CurrentForm->getValue("pH") : $CurrentForm->getValue("x_pH");
		if (!$this->pH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->pH->Visible = FALSE; // Disable update for API request
			else
				$this->pH->setFormValue($val);
		}

		// Check field name 'Timeofcollection' first before field var 'x_Timeofcollection'
		$val = $CurrentForm->hasValue("Timeofcollection") ? $CurrentForm->getValue("Timeofcollection") : $CurrentForm->getValue("x_Timeofcollection");
		if (!$this->Timeofcollection->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Timeofcollection->Visible = FALSE; // Disable update for API request
			else
				$this->Timeofcollection->setFormValue($val);
		}

		// Check field name 'Timeofexamination' first before field var 'x_Timeofexamination'
		$val = $CurrentForm->hasValue("Timeofexamination") ? $CurrentForm->getValue("Timeofexamination") : $CurrentForm->getValue("x_Timeofexamination");
		if (!$this->Timeofexamination->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Timeofexamination->Visible = FALSE; // Disable update for API request
			else
				$this->Timeofexamination->setFormValue($val);
		}

		// Check field name 'Volume' first before field var 'x_Volume'
		$val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
		if (!$this->Volume->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Volume->Visible = FALSE; // Disable update for API request
			else
				$this->Volume->setFormValue($val);
		}

		// Check field name 'Concentration' first before field var 'x_Concentration'
		$val = $CurrentForm->hasValue("Concentration") ? $CurrentForm->getValue("Concentration") : $CurrentForm->getValue("x_Concentration");
		if (!$this->Concentration->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Concentration->Visible = FALSE; // Disable update for API request
			else
				$this->Concentration->setFormValue($val);
		}

		// Check field name 'Total' first before field var 'x_Total'
		$val = $CurrentForm->hasValue("Total") ? $CurrentForm->getValue("Total") : $CurrentForm->getValue("x_Total");
		if (!$this->Total->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Total->Visible = FALSE; // Disable update for API request
			else
				$this->Total->setFormValue($val);
		}

		// Check field name 'ProgressiveMotility' first before field var 'x_ProgressiveMotility'
		$val = $CurrentForm->hasValue("ProgressiveMotility") ? $CurrentForm->getValue("ProgressiveMotility") : $CurrentForm->getValue("x_ProgressiveMotility");
		if (!$this->ProgressiveMotility->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProgressiveMotility->Visible = FALSE; // Disable update for API request
			else
				$this->ProgressiveMotility->setFormValue($val);
		}

		// Check field name 'NonProgrssiveMotile' first before field var 'x_NonProgrssiveMotile'
		$val = $CurrentForm->hasValue("NonProgrssiveMotile") ? $CurrentForm->getValue("NonProgrssiveMotile") : $CurrentForm->getValue("x_NonProgrssiveMotile");
		if (!$this->NonProgrssiveMotile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NonProgrssiveMotile->Visible = FALSE; // Disable update for API request
			else
				$this->NonProgrssiveMotile->setFormValue($val);
		}

		// Check field name 'Immotile' first before field var 'x_Immotile'
		$val = $CurrentForm->hasValue("Immotile") ? $CurrentForm->getValue("Immotile") : $CurrentForm->getValue("x_Immotile");
		if (!$this->Immotile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Immotile->Visible = FALSE; // Disable update for API request
			else
				$this->Immotile->setFormValue($val);
		}

		// Check field name 'TotalProgrssiveMotile' first before field var 'x_TotalProgrssiveMotile'
		$val = $CurrentForm->hasValue("TotalProgrssiveMotile") ? $CurrentForm->getValue("TotalProgrssiveMotile") : $CurrentForm->getValue("x_TotalProgrssiveMotile");
		if (!$this->TotalProgrssiveMotile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TotalProgrssiveMotile->Visible = FALSE; // Disable update for API request
			else
				$this->TotalProgrssiveMotile->setFormValue($val);
		}

		// Check field name 'Appearance' first before field var 'x_Appearance'
		$val = $CurrentForm->hasValue("Appearance") ? $CurrentForm->getValue("Appearance") : $CurrentForm->getValue("x_Appearance");
		if (!$this->Appearance->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Appearance->Visible = FALSE; // Disable update for API request
			else
				$this->Appearance->setFormValue($val);
		}

		// Check field name 'Homogenosity' first before field var 'x_Homogenosity'
		$val = $CurrentForm->hasValue("Homogenosity") ? $CurrentForm->getValue("Homogenosity") : $CurrentForm->getValue("x_Homogenosity");
		if (!$this->Homogenosity->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Homogenosity->Visible = FALSE; // Disable update for API request
			else
				$this->Homogenosity->setFormValue($val);
		}

		// Check field name 'CompleteSample' first before field var 'x_CompleteSample'
		$val = $CurrentForm->hasValue("CompleteSample") ? $CurrentForm->getValue("CompleteSample") : $CurrentForm->getValue("x_CompleteSample");
		if (!$this->CompleteSample->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CompleteSample->Visible = FALSE; // Disable update for API request
			else
				$this->CompleteSample->setFormValue($val);
		}

		// Check field name 'Liquefactiontime' first before field var 'x_Liquefactiontime'
		$val = $CurrentForm->hasValue("Liquefactiontime") ? $CurrentForm->getValue("Liquefactiontime") : $CurrentForm->getValue("x_Liquefactiontime");
		if (!$this->Liquefactiontime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Liquefactiontime->Visible = FALSE; // Disable update for API request
			else
				$this->Liquefactiontime->setFormValue($val);
		}

		// Check field name 'Normal' first before field var 'x_Normal'
		$val = $CurrentForm->hasValue("Normal") ? $CurrentForm->getValue("Normal") : $CurrentForm->getValue("x_Normal");
		if (!$this->Normal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Normal->Visible = FALSE; // Disable update for API request
			else
				$this->Normal->setFormValue($val);
		}

		// Check field name 'Abnormal' first before field var 'x_Abnormal'
		$val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
		if (!$this->Abnormal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Abnormal->Visible = FALSE; // Disable update for API request
			else
				$this->Abnormal->setFormValue($val);
		}

		// Check field name 'Headdefects' first before field var 'x_Headdefects'
		$val = $CurrentForm->hasValue("Headdefects") ? $CurrentForm->getValue("Headdefects") : $CurrentForm->getValue("x_Headdefects");
		if (!$this->Headdefects->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Headdefects->Visible = FALSE; // Disable update for API request
			else
				$this->Headdefects->setFormValue($val);
		}

		// Check field name 'MidpieceDefects' first before field var 'x_MidpieceDefects'
		$val = $CurrentForm->hasValue("MidpieceDefects") ? $CurrentForm->getValue("MidpieceDefects") : $CurrentForm->getValue("x_MidpieceDefects");
		if (!$this->MidpieceDefects->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MidpieceDefects->Visible = FALSE; // Disable update for API request
			else
				$this->MidpieceDefects->setFormValue($val);
		}

		// Check field name 'TailDefects' first before field var 'x_TailDefects'
		$val = $CurrentForm->hasValue("TailDefects") ? $CurrentForm->getValue("TailDefects") : $CurrentForm->getValue("x_TailDefects");
		if (!$this->TailDefects->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TailDefects->Visible = FALSE; // Disable update for API request
			else
				$this->TailDefects->setFormValue($val);
		}

		// Check field name 'NormalProgMotile' first before field var 'x_NormalProgMotile'
		$val = $CurrentForm->hasValue("NormalProgMotile") ? $CurrentForm->getValue("NormalProgMotile") : $CurrentForm->getValue("x_NormalProgMotile");
		if (!$this->NormalProgMotile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NormalProgMotile->Visible = FALSE; // Disable update for API request
			else
				$this->NormalProgMotile->setFormValue($val);
		}

		// Check field name 'ImmatureForms' first before field var 'x_ImmatureForms'
		$val = $CurrentForm->hasValue("ImmatureForms") ? $CurrentForm->getValue("ImmatureForms") : $CurrentForm->getValue("x_ImmatureForms");
		if (!$this->ImmatureForms->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ImmatureForms->Visible = FALSE; // Disable update for API request
			else
				$this->ImmatureForms->setFormValue($val);
		}

		// Check field name 'Leucocytes' first before field var 'x_Leucocytes'
		$val = $CurrentForm->hasValue("Leucocytes") ? $CurrentForm->getValue("Leucocytes") : $CurrentForm->getValue("x_Leucocytes");
		if (!$this->Leucocytes->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Leucocytes->Visible = FALSE; // Disable update for API request
			else
				$this->Leucocytes->setFormValue($val);
		}

		// Check field name 'Agglutination' first before field var 'x_Agglutination'
		$val = $CurrentForm->hasValue("Agglutination") ? $CurrentForm->getValue("Agglutination") : $CurrentForm->getValue("x_Agglutination");
		if (!$this->Agglutination->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Agglutination->Visible = FALSE; // Disable update for API request
			else
				$this->Agglutination->setFormValue($val);
		}

		// Check field name 'Debris' first before field var 'x_Debris'
		$val = $CurrentForm->hasValue("Debris") ? $CurrentForm->getValue("Debris") : $CurrentForm->getValue("x_Debris");
		if (!$this->Debris->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Debris->Visible = FALSE; // Disable update for API request
			else
				$this->Debris->setFormValue($val);
		}

		// Check field name 'Diagnosis' first before field var 'x_Diagnosis'
		$val = $CurrentForm->hasValue("Diagnosis") ? $CurrentForm->getValue("Diagnosis") : $CurrentForm->getValue("x_Diagnosis");
		if (!$this->Diagnosis->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Diagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->Diagnosis->setFormValue($val);
		}

		// Check field name 'Observations' first before field var 'x_Observations'
		$val = $CurrentForm->hasValue("Observations") ? $CurrentForm->getValue("Observations") : $CurrentForm->getValue("x_Observations");
		if (!$this->Observations->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Observations->Visible = FALSE; // Disable update for API request
			else
				$this->Observations->setFormValue($val);
		}

		// Check field name 'Signature' first before field var 'x_Signature'
		$val = $CurrentForm->hasValue("Signature") ? $CurrentForm->getValue("Signature") : $CurrentForm->getValue("x_Signature");
		if (!$this->Signature->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Signature->Visible = FALSE; // Disable update for API request
			else
				$this->Signature->setFormValue($val);
		}

		// Check field name 'SemenOrgin' first before field var 'x_SemenOrgin'
		$val = $CurrentForm->hasValue("SemenOrgin") ? $CurrentForm->getValue("SemenOrgin") : $CurrentForm->getValue("x_SemenOrgin");
		if (!$this->SemenOrgin->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SemenOrgin->Visible = FALSE; // Disable update for API request
			else
				$this->SemenOrgin->setFormValue($val);
		}

		// Check field name 'Donor' first before field var 'x_Donor'
		$val = $CurrentForm->hasValue("Donor") ? $CurrentForm->getValue("Donor") : $CurrentForm->getValue("x_Donor");
		if (!$this->Donor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Donor->Visible = FALSE; // Disable update for API request
			else
				$this->Donor->setFormValue($val);
		}

		// Check field name 'DonorBloodgroup' first before field var 'x_DonorBloodgroup'
		$val = $CurrentForm->hasValue("DonorBloodgroup") ? $CurrentForm->getValue("DonorBloodgroup") : $CurrentForm->getValue("x_DonorBloodgroup");
		if (!$this->DonorBloodgroup->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DonorBloodgroup->Visible = FALSE; // Disable update for API request
			else
				$this->DonorBloodgroup->setFormValue($val);
		}

		// Check field name 'Tank' first before field var 'x_Tank'
		$val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
		if (!$this->Tank->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Tank->Visible = FALSE; // Disable update for API request
			else
				$this->Tank->setFormValue($val);
		}

		// Check field name 'Location' first before field var 'x_Location'
		$val = $CurrentForm->hasValue("Location") ? $CurrentForm->getValue("Location") : $CurrentForm->getValue("x_Location");
		if (!$this->Location->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Location->Visible = FALSE; // Disable update for API request
			else
				$this->Location->setFormValue($val);
		}

		// Check field name 'Volume1' first before field var 'x_Volume1'
		$val = $CurrentForm->hasValue("Volume1") ? $CurrentForm->getValue("Volume1") : $CurrentForm->getValue("x_Volume1");
		if (!$this->Volume1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Volume1->Visible = FALSE; // Disable update for API request
			else
				$this->Volume1->setFormValue($val);
		}

		// Check field name 'Concentration1' first before field var 'x_Concentration1'
		$val = $CurrentForm->hasValue("Concentration1") ? $CurrentForm->getValue("Concentration1") : $CurrentForm->getValue("x_Concentration1");
		if (!$this->Concentration1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Concentration1->Visible = FALSE; // Disable update for API request
			else
				$this->Concentration1->setFormValue($val);
		}

		// Check field name 'Total1' first before field var 'x_Total1'
		$val = $CurrentForm->hasValue("Total1") ? $CurrentForm->getValue("Total1") : $CurrentForm->getValue("x_Total1");
		if (!$this->Total1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Total1->Visible = FALSE; // Disable update for API request
			else
				$this->Total1->setFormValue($val);
		}

		// Check field name 'ProgressiveMotility1' first before field var 'x_ProgressiveMotility1'
		$val = $CurrentForm->hasValue("ProgressiveMotility1") ? $CurrentForm->getValue("ProgressiveMotility1") : $CurrentForm->getValue("x_ProgressiveMotility1");
		if (!$this->ProgressiveMotility1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProgressiveMotility1->Visible = FALSE; // Disable update for API request
			else
				$this->ProgressiveMotility1->setFormValue($val);
		}

		// Check field name 'NonProgrssiveMotile1' first before field var 'x_NonProgrssiveMotile1'
		$val = $CurrentForm->hasValue("NonProgrssiveMotile1") ? $CurrentForm->getValue("NonProgrssiveMotile1") : $CurrentForm->getValue("x_NonProgrssiveMotile1");
		if (!$this->NonProgrssiveMotile1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NonProgrssiveMotile1->Visible = FALSE; // Disable update for API request
			else
				$this->NonProgrssiveMotile1->setFormValue($val);
		}

		// Check field name 'Immotile1' first before field var 'x_Immotile1'
		$val = $CurrentForm->hasValue("Immotile1") ? $CurrentForm->getValue("Immotile1") : $CurrentForm->getValue("x_Immotile1");
		if (!$this->Immotile1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Immotile1->Visible = FALSE; // Disable update for API request
			else
				$this->Immotile1->setFormValue($val);
		}

		// Check field name 'TotalProgrssiveMotile1' first before field var 'x_TotalProgrssiveMotile1'
		$val = $CurrentForm->hasValue("TotalProgrssiveMotile1") ? $CurrentForm->getValue("TotalProgrssiveMotile1") : $CurrentForm->getValue("x_TotalProgrssiveMotile1");
		if (!$this->TotalProgrssiveMotile1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TotalProgrssiveMotile1->Visible = FALSE; // Disable update for API request
			else
				$this->TotalProgrssiveMotile1->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'Color' first before field var 'x_Color'
		$val = $CurrentForm->hasValue("Color") ? $CurrentForm->getValue("Color") : $CurrentForm->getValue("x_Color");
		if (!$this->Color->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Color->Visible = FALSE; // Disable update for API request
			else
				$this->Color->setFormValue($val);
		}

		// Check field name 'DoneBy' first before field var 'x_DoneBy'
		$val = $CurrentForm->hasValue("DoneBy") ? $CurrentForm->getValue("DoneBy") : $CurrentForm->getValue("x_DoneBy");
		if (!$this->DoneBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DoneBy->Visible = FALSE; // Disable update for API request
			else
				$this->DoneBy->setFormValue($val);
		}

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}

		// Check field name 'Abstinence' first before field var 'x_Abstinence'
		$val = $CurrentForm->hasValue("Abstinence") ? $CurrentForm->getValue("Abstinence") : $CurrentForm->getValue("x_Abstinence");
		if (!$this->Abstinence->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Abstinence->Visible = FALSE; // Disable update for API request
			else
				$this->Abstinence->setFormValue($val);
		}

		// Check field name 'ProcessedBy' first before field var 'x_ProcessedBy'
		$val = $CurrentForm->hasValue("ProcessedBy") ? $CurrentForm->getValue("ProcessedBy") : $CurrentForm->getValue("x_ProcessedBy");
		if (!$this->ProcessedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProcessedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ProcessedBy->setFormValue($val);
		}

		// Check field name 'InseminationTime' first before field var 'x_InseminationTime'
		$val = $CurrentForm->hasValue("InseminationTime") ? $CurrentForm->getValue("InseminationTime") : $CurrentForm->getValue("x_InseminationTime");
		if (!$this->InseminationTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->InseminationTime->Visible = FALSE; // Disable update for API request
			else
				$this->InseminationTime->setFormValue($val);
		}

		// Check field name 'InseminationBy' first before field var 'x_InseminationBy'
		$val = $CurrentForm->hasValue("InseminationBy") ? $CurrentForm->getValue("InseminationBy") : $CurrentForm->getValue("x_InseminationBy");
		if (!$this->InseminationBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->InseminationBy->Visible = FALSE; // Disable update for API request
			else
				$this->InseminationBy->setFormValue($val);
		}

		// Check field name 'Big' first before field var 'x_Big'
		$val = $CurrentForm->hasValue("Big") ? $CurrentForm->getValue("Big") : $CurrentForm->getValue("x_Big");
		if (!$this->Big->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Big->Visible = FALSE; // Disable update for API request
			else
				$this->Big->setFormValue($val);
		}

		// Check field name 'Medium' first before field var 'x_Medium'
		$val = $CurrentForm->hasValue("Medium") ? $CurrentForm->getValue("Medium") : $CurrentForm->getValue("x_Medium");
		if (!$this->Medium->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Medium->Visible = FALSE; // Disable update for API request
			else
				$this->Medium->setFormValue($val);
		}

		// Check field name 'Small' first before field var 'x_Small'
		$val = $CurrentForm->hasValue("Small") ? $CurrentForm->getValue("Small") : $CurrentForm->getValue("x_Small");
		if (!$this->Small->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Small->Visible = FALSE; // Disable update for API request
			else
				$this->Small->setFormValue($val);
		}

		// Check field name 'NoHalo' first before field var 'x_NoHalo'
		$val = $CurrentForm->hasValue("NoHalo") ? $CurrentForm->getValue("NoHalo") : $CurrentForm->getValue("x_NoHalo");
		if (!$this->NoHalo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoHalo->Visible = FALSE; // Disable update for API request
			else
				$this->NoHalo->setFormValue($val);
		}

		// Check field name 'Fragmented' first before field var 'x_Fragmented'
		$val = $CurrentForm->hasValue("Fragmented") ? $CurrentForm->getValue("Fragmented") : $CurrentForm->getValue("x_Fragmented");
		if (!$this->Fragmented->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Fragmented->Visible = FALSE; // Disable update for API request
			else
				$this->Fragmented->setFormValue($val);
		}

		// Check field name 'NonFragmented' first before field var 'x_NonFragmented'
		$val = $CurrentForm->hasValue("NonFragmented") ? $CurrentForm->getValue("NonFragmented") : $CurrentForm->getValue("x_NonFragmented");
		if (!$this->NonFragmented->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NonFragmented->Visible = FALSE; // Disable update for API request
			else
				$this->NonFragmented->setFormValue($val);
		}

		// Check field name 'DFI' first before field var 'x_DFI'
		$val = $CurrentForm->hasValue("DFI") ? $CurrentForm->getValue("DFI") : $CurrentForm->getValue("x_DFI");
		if (!$this->DFI->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DFI->Visible = FALSE; // Disable update for API request
			else
				$this->DFI->setFormValue($val);
		}

		// Check field name 'IsueBy' first before field var 'x_IsueBy'
		$val = $CurrentForm->hasValue("IsueBy") ? $CurrentForm->getValue("IsueBy") : $CurrentForm->getValue("x_IsueBy");
		if (!$this->IsueBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IsueBy->Visible = FALSE; // Disable update for API request
			else
				$this->IsueBy->setFormValue($val);
		}

		// Check field name 'Volume2' first before field var 'x_Volume2'
		$val = $CurrentForm->hasValue("Volume2") ? $CurrentForm->getValue("Volume2") : $CurrentForm->getValue("x_Volume2");
		if (!$this->Volume2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Volume2->Visible = FALSE; // Disable update for API request
			else
				$this->Volume2->setFormValue($val);
		}

		// Check field name 'Concentration2' first before field var 'x_Concentration2'
		$val = $CurrentForm->hasValue("Concentration2") ? $CurrentForm->getValue("Concentration2") : $CurrentForm->getValue("x_Concentration2");
		if (!$this->Concentration2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Concentration2->Visible = FALSE; // Disable update for API request
			else
				$this->Concentration2->setFormValue($val);
		}

		// Check field name 'Total2' first before field var 'x_Total2'
		$val = $CurrentForm->hasValue("Total2") ? $CurrentForm->getValue("Total2") : $CurrentForm->getValue("x_Total2");
		if (!$this->Total2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Total2->Visible = FALSE; // Disable update for API request
			else
				$this->Total2->setFormValue($val);
		}

		// Check field name 'ProgressiveMotility2' first before field var 'x_ProgressiveMotility2'
		$val = $CurrentForm->hasValue("ProgressiveMotility2") ? $CurrentForm->getValue("ProgressiveMotility2") : $CurrentForm->getValue("x_ProgressiveMotility2");
		if (!$this->ProgressiveMotility2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProgressiveMotility2->Visible = FALSE; // Disable update for API request
			else
				$this->ProgressiveMotility2->setFormValue($val);
		}

		// Check field name 'NonProgrssiveMotile2' first before field var 'x_NonProgrssiveMotile2'
		$val = $CurrentForm->hasValue("NonProgrssiveMotile2") ? $CurrentForm->getValue("NonProgrssiveMotile2") : $CurrentForm->getValue("x_NonProgrssiveMotile2");
		if (!$this->NonProgrssiveMotile2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NonProgrssiveMotile2->Visible = FALSE; // Disable update for API request
			else
				$this->NonProgrssiveMotile2->setFormValue($val);
		}

		// Check field name 'Immotile2' first before field var 'x_Immotile2'
		$val = $CurrentForm->hasValue("Immotile2") ? $CurrentForm->getValue("Immotile2") : $CurrentForm->getValue("x_Immotile2");
		if (!$this->Immotile2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Immotile2->Visible = FALSE; // Disable update for API request
			else
				$this->Immotile2->setFormValue($val);
		}

		// Check field name 'TotalProgrssiveMotile2' first before field var 'x_TotalProgrssiveMotile2'
		$val = $CurrentForm->hasValue("TotalProgrssiveMotile2") ? $CurrentForm->getValue("TotalProgrssiveMotile2") : $CurrentForm->getValue("x_TotalProgrssiveMotile2");
		if (!$this->TotalProgrssiveMotile2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TotalProgrssiveMotile2->Visible = FALSE; // Disable update for API request
			else
				$this->TotalProgrssiveMotile2->setFormValue($val);
		}

		// Check field name 'MACS' first before field var 'x_MACS'
		$val = $CurrentForm->hasValue("MACS") ? $CurrentForm->getValue("MACS") : $CurrentForm->getValue("x_MACS");
		if (!$this->MACS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MACS->Visible = FALSE; // Disable update for API request
			else
				$this->MACS->setFormValue($val);
		}

		// Check field name 'IssuedBy' first before field var 'x_IssuedBy'
		$val = $CurrentForm->hasValue("IssuedBy") ? $CurrentForm->getValue("IssuedBy") : $CurrentForm->getValue("x_IssuedBy");
		if (!$this->IssuedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IssuedBy->Visible = FALSE; // Disable update for API request
			else
				$this->IssuedBy->setFormValue($val);
		}

		// Check field name 'IssuedTo' first before field var 'x_IssuedTo'
		$val = $CurrentForm->hasValue("IssuedTo") ? $CurrentForm->getValue("IssuedTo") : $CurrentForm->getValue("x_IssuedTo");
		if (!$this->IssuedTo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IssuedTo->Visible = FALSE; // Disable update for API request
			else
				$this->IssuedTo->setFormValue($val);
		}

		// Check field name 'PaID' first before field var 'x_PaID'
		$val = $CurrentForm->hasValue("PaID") ? $CurrentForm->getValue("PaID") : $CurrentForm->getValue("x_PaID");
		if (!$this->PaID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PaID->Visible = FALSE; // Disable update for API request
			else
				$this->PaID->setFormValue($val);
		}

		// Check field name 'PaName' first before field var 'x_PaName'
		$val = $CurrentForm->hasValue("PaName") ? $CurrentForm->getValue("PaName") : $CurrentForm->getValue("x_PaName");
		if (!$this->PaName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PaName->Visible = FALSE; // Disable update for API request
			else
				$this->PaName->setFormValue($val);
		}

		// Check field name 'PaMobile' first before field var 'x_PaMobile'
		$val = $CurrentForm->hasValue("PaMobile") ? $CurrentForm->getValue("PaMobile") : $CurrentForm->getValue("x_PaMobile");
		if (!$this->PaMobile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PaMobile->Visible = FALSE; // Disable update for API request
			else
				$this->PaMobile->setFormValue($val);
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

		// Check field name 'PREG_TEST_DATE' first before field var 'x_PREG_TEST_DATE'
		$val = $CurrentForm->hasValue("PREG_TEST_DATE") ? $CurrentForm->getValue("PREG_TEST_DATE") : $CurrentForm->getValue("x_PREG_TEST_DATE");
		if (!$this->PREG_TEST_DATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PREG_TEST_DATE->Visible = FALSE; // Disable update for API request
			else
				$this->PREG_TEST_DATE->setFormValue($val);
			$this->PREG_TEST_DATE->CurrentValue = UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0);
		}

		// Check field name 'SPECIFIC_PROBLEMS' first before field var 'x_SPECIFIC_PROBLEMS'
		$val = $CurrentForm->hasValue("SPECIFIC_PROBLEMS") ? $CurrentForm->getValue("SPECIFIC_PROBLEMS") : $CurrentForm->getValue("x_SPECIFIC_PROBLEMS");
		if (!$this->SPECIFIC_PROBLEMS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SPECIFIC_PROBLEMS->Visible = FALSE; // Disable update for API request
			else
				$this->SPECIFIC_PROBLEMS->setFormValue($val);
		}

		// Check field name 'IMSC_1' first before field var 'x_IMSC_1'
		$val = $CurrentForm->hasValue("IMSC_1") ? $CurrentForm->getValue("IMSC_1") : $CurrentForm->getValue("x_IMSC_1");
		if (!$this->IMSC_1->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IMSC_1->Visible = FALSE; // Disable update for API request
			else
				$this->IMSC_1->setFormValue($val);
		}

		// Check field name 'IMSC_2' first before field var 'x_IMSC_2'
		$val = $CurrentForm->hasValue("IMSC_2") ? $CurrentForm->getValue("IMSC_2") : $CurrentForm->getValue("x_IMSC_2");
		if (!$this->IMSC_2->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IMSC_2->Visible = FALSE; // Disable update for API request
			else
				$this->IMSC_2->setFormValue($val);
		}

		// Check field name 'LIQUIFACTION_STORAGE' first before field var 'x_LIQUIFACTION_STORAGE'
		$val = $CurrentForm->hasValue("LIQUIFACTION_STORAGE") ? $CurrentForm->getValue("LIQUIFACTION_STORAGE") : $CurrentForm->getValue("x_LIQUIFACTION_STORAGE");
		if (!$this->LIQUIFACTION_STORAGE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LIQUIFACTION_STORAGE->Visible = FALSE; // Disable update for API request
			else
				$this->LIQUIFACTION_STORAGE->setFormValue($val);
		}

		// Check field name 'IUI_PREP_METHOD' first before field var 'x_IUI_PREP_METHOD'
		$val = $CurrentForm->hasValue("IUI_PREP_METHOD") ? $CurrentForm->getValue("IUI_PREP_METHOD") : $CurrentForm->getValue("x_IUI_PREP_METHOD");
		if (!$this->IUI_PREP_METHOD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IUI_PREP_METHOD->Visible = FALSE; // Disable update for API request
			else
				$this->IUI_PREP_METHOD->setFormValue($val);
		}

		// Check field name 'TIME_FROM_TRIGGER' first before field var 'x_TIME_FROM_TRIGGER'
		$val = $CurrentForm->hasValue("TIME_FROM_TRIGGER") ? $CurrentForm->getValue("TIME_FROM_TRIGGER") : $CurrentForm->getValue("x_TIME_FROM_TRIGGER");
		if (!$this->TIME_FROM_TRIGGER->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TIME_FROM_TRIGGER->Visible = FALSE; // Disable update for API request
			else
				$this->TIME_FROM_TRIGGER->setFormValue($val);
		}

		// Check field name 'COLLECTION_TO_PREPARATION' first before field var 'x_COLLECTION_TO_PREPARATION'
		$val = $CurrentForm->hasValue("COLLECTION_TO_PREPARATION") ? $CurrentForm->getValue("COLLECTION_TO_PREPARATION") : $CurrentForm->getValue("x_COLLECTION_TO_PREPARATION");
		if (!$this->COLLECTION_TO_PREPARATION->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->COLLECTION_TO_PREPARATION->Visible = FALSE; // Disable update for API request
			else
				$this->COLLECTION_TO_PREPARATION->setFormValue($val);
		}

		// Check field name 'TIME_FROM_PREP_TO_INSEM' first before field var 'x_TIME_FROM_PREP_TO_INSEM'
		$val = $CurrentForm->hasValue("TIME_FROM_PREP_TO_INSEM") ? $CurrentForm->getValue("TIME_FROM_PREP_TO_INSEM") : $CurrentForm->getValue("x_TIME_FROM_PREP_TO_INSEM");
		if (!$this->TIME_FROM_PREP_TO_INSEM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TIME_FROM_PREP_TO_INSEM->Visible = FALSE; // Disable update for API request
			else
				$this->TIME_FROM_PREP_TO_INSEM->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->HusbandName->CurrentValue = $this->HusbandName->FormValue;
		$this->RequestDr->CurrentValue = $this->RequestDr->FormValue;
		$this->CollectionDate->CurrentValue = $this->CollectionDate->FormValue;
		$this->CollectionDate->CurrentValue = UnFormatDateTime($this->CollectionDate->CurrentValue, 0);
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->RequestSample->CurrentValue = $this->RequestSample->FormValue;
		$this->CollectionType->CurrentValue = $this->CollectionType->FormValue;
		$this->CollectionMethod->CurrentValue = $this->CollectionMethod->FormValue;
		$this->Medicationused->CurrentValue = $this->Medicationused->FormValue;
		$this->DifficultiesinCollection->CurrentValue = $this->DifficultiesinCollection->FormValue;
		$this->pH->CurrentValue = $this->pH->FormValue;
		$this->Timeofcollection->CurrentValue = $this->Timeofcollection->FormValue;
		$this->Timeofexamination->CurrentValue = $this->Timeofexamination->FormValue;
		$this->Volume->CurrentValue = $this->Volume->FormValue;
		$this->Concentration->CurrentValue = $this->Concentration->FormValue;
		$this->Total->CurrentValue = $this->Total->FormValue;
		$this->ProgressiveMotility->CurrentValue = $this->ProgressiveMotility->FormValue;
		$this->NonProgrssiveMotile->CurrentValue = $this->NonProgrssiveMotile->FormValue;
		$this->Immotile->CurrentValue = $this->Immotile->FormValue;
		$this->TotalProgrssiveMotile->CurrentValue = $this->TotalProgrssiveMotile->FormValue;
		$this->Appearance->CurrentValue = $this->Appearance->FormValue;
		$this->Homogenosity->CurrentValue = $this->Homogenosity->FormValue;
		$this->CompleteSample->CurrentValue = $this->CompleteSample->FormValue;
		$this->Liquefactiontime->CurrentValue = $this->Liquefactiontime->FormValue;
		$this->Normal->CurrentValue = $this->Normal->FormValue;
		$this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
		$this->Headdefects->CurrentValue = $this->Headdefects->FormValue;
		$this->MidpieceDefects->CurrentValue = $this->MidpieceDefects->FormValue;
		$this->TailDefects->CurrentValue = $this->TailDefects->FormValue;
		$this->NormalProgMotile->CurrentValue = $this->NormalProgMotile->FormValue;
		$this->ImmatureForms->CurrentValue = $this->ImmatureForms->FormValue;
		$this->Leucocytes->CurrentValue = $this->Leucocytes->FormValue;
		$this->Agglutination->CurrentValue = $this->Agglutination->FormValue;
		$this->Debris->CurrentValue = $this->Debris->FormValue;
		$this->Diagnosis->CurrentValue = $this->Diagnosis->FormValue;
		$this->Observations->CurrentValue = $this->Observations->FormValue;
		$this->Signature->CurrentValue = $this->Signature->FormValue;
		$this->SemenOrgin->CurrentValue = $this->SemenOrgin->FormValue;
		$this->Donor->CurrentValue = $this->Donor->FormValue;
		$this->DonorBloodgroup->CurrentValue = $this->DonorBloodgroup->FormValue;
		$this->Tank->CurrentValue = $this->Tank->FormValue;
		$this->Location->CurrentValue = $this->Location->FormValue;
		$this->Volume1->CurrentValue = $this->Volume1->FormValue;
		$this->Concentration1->CurrentValue = $this->Concentration1->FormValue;
		$this->Total1->CurrentValue = $this->Total1->FormValue;
		$this->ProgressiveMotility1->CurrentValue = $this->ProgressiveMotility1->FormValue;
		$this->NonProgrssiveMotile1->CurrentValue = $this->NonProgrssiveMotile1->FormValue;
		$this->Immotile1->CurrentValue = $this->Immotile1->FormValue;
		$this->TotalProgrssiveMotile1->CurrentValue = $this->TotalProgrssiveMotile1->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->Color->CurrentValue = $this->Color->FormValue;
		$this->DoneBy->CurrentValue = $this->DoneBy->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Abstinence->CurrentValue = $this->Abstinence->FormValue;
		$this->ProcessedBy->CurrentValue = $this->ProcessedBy->FormValue;
		$this->InseminationTime->CurrentValue = $this->InseminationTime->FormValue;
		$this->InseminationBy->CurrentValue = $this->InseminationBy->FormValue;
		$this->Big->CurrentValue = $this->Big->FormValue;
		$this->Medium->CurrentValue = $this->Medium->FormValue;
		$this->Small->CurrentValue = $this->Small->FormValue;
		$this->NoHalo->CurrentValue = $this->NoHalo->FormValue;
		$this->Fragmented->CurrentValue = $this->Fragmented->FormValue;
		$this->NonFragmented->CurrentValue = $this->NonFragmented->FormValue;
		$this->DFI->CurrentValue = $this->DFI->FormValue;
		$this->IsueBy->CurrentValue = $this->IsueBy->FormValue;
		$this->Volume2->CurrentValue = $this->Volume2->FormValue;
		$this->Concentration2->CurrentValue = $this->Concentration2->FormValue;
		$this->Total2->CurrentValue = $this->Total2->FormValue;
		$this->ProgressiveMotility2->CurrentValue = $this->ProgressiveMotility2->FormValue;
		$this->NonProgrssiveMotile2->CurrentValue = $this->NonProgrssiveMotile2->FormValue;
		$this->Immotile2->CurrentValue = $this->Immotile2->FormValue;
		$this->TotalProgrssiveMotile2->CurrentValue = $this->TotalProgrssiveMotile2->FormValue;
		$this->MACS->CurrentValue = $this->MACS->FormValue;
		$this->IssuedBy->CurrentValue = $this->IssuedBy->FormValue;
		$this->IssuedTo->CurrentValue = $this->IssuedTo->FormValue;
		$this->PaID->CurrentValue = $this->PaID->FormValue;
		$this->PaName->CurrentValue = $this->PaName->FormValue;
		$this->PaMobile->CurrentValue = $this->PaMobile->FormValue;
		$this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
		$this->PREG_TEST_DATE->CurrentValue = $this->PREG_TEST_DATE->FormValue;
		$this->PREG_TEST_DATE->CurrentValue = UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0);
		$this->SPECIFIC_PROBLEMS->CurrentValue = $this->SPECIFIC_PROBLEMS->FormValue;
		$this->IMSC_1->CurrentValue = $this->IMSC_1->FormValue;
		$this->IMSC_2->CurrentValue = $this->IMSC_2->FormValue;
		$this->LIQUIFACTION_STORAGE->CurrentValue = $this->LIQUIFACTION_STORAGE->FormValue;
		$this->IUI_PREP_METHOD->CurrentValue = $this->IUI_PREP_METHOD->FormValue;
		$this->TIME_FROM_TRIGGER->CurrentValue = $this->TIME_FROM_TRIGGER->FormValue;
		$this->COLLECTION_TO_PREPARATION->CurrentValue = $this->COLLECTION_TO_PREPARATION->FormValue;
		$this->TIME_FROM_PREP_TO_INSEM->CurrentValue = $this->TIME_FROM_PREP_TO_INSEM->FormValue;
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
		$this->pH->setDbValue($row['pH']);
		$this->Timeofcollection->setDbValue($row['Timeofcollection']);
		$this->Timeofexamination->setDbValue($row['Timeofexamination']);
		$this->Volume->setDbValue($row['Volume']);
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
		$this->MACS->setDbValue($row['MACS']);
		$this->IssuedBy->setDbValue($row['IssuedBy']);
		$this->IssuedTo->setDbValue($row['IssuedTo']);
		$this->PaID->setDbValue($row['PaID']);
		$this->PaName->setDbValue($row['PaName']);
		$this->PaMobile->setDbValue($row['PaMobile']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerMobile->setDbValue($row['PartnerMobile']);
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
		$row['pH'] = NULL;
		$row['Timeofcollection'] = NULL;
		$row['Timeofexamination'] = NULL;
		$row['Volume'] = NULL;
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
		$row['MACS'] = NULL;
		$row['IssuedBy'] = NULL;
		$row['IssuedTo'] = NULL;
		$row['PaID'] = NULL;
		$row['PaName'] = NULL;
		$row['PaMobile'] = NULL;
		$row['PartnerID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerMobile'] = NULL;
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
		// pH
		// Timeofcollection
		// Timeofexamination
		// Volume
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
		// MACS
		// IssuedBy
		// IssuedTo
		// PaID
		// PaName
		// PaMobile
		// PartnerID
		// PartnerName
		// PartnerMobile
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

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// HusbandName
			$this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
			$this->HusbandName->ViewCustomAttributes = "";

			// RequestDr
			$this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
			$this->RequestDr->ViewCustomAttributes = "";

			// CollectionDate
			$this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
			$this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
			$this->CollectionDate->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
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
			if (strval($this->Medicationused->CurrentValue) != "") {
				$this->Medicationused->ViewValue = $this->Medicationused->optionCaption($this->Medicationused->CurrentValue);
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

			// pH
			$this->pH->ViewValue = $this->pH->CurrentValue;
			$this->pH->ViewCustomAttributes = "";

			// Timeofcollection
			$this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
			$this->Timeofcollection->ViewCustomAttributes = "";

			// Timeofexamination
			$this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
			$this->Timeofexamination->ViewCustomAttributes = "";

			// Volume
			$this->Volume->ViewValue = $this->Volume->CurrentValue;
			$this->Volume->ViewCustomAttributes = "";

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

			// IssuedBy
			$this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
			$this->IssuedBy->ViewCustomAttributes = "";

			// IssuedTo
			$this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
			$this->IssuedTo->ViewCustomAttributes = "";

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

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
			$this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
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
			$this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
			$this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

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

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";
			$this->Volume->TooltipValue = "";

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

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";
			$this->MACS->TooltipValue = "";

			// IssuedBy
			$this->IssuedBy->LinkCustomAttributes = "";
			$this->IssuedBy->HrefValue = "";
			$this->IssuedBy->TooltipValue = "";

			// IssuedTo
			$this->IssuedTo->LinkCustomAttributes = "";
			$this->IssuedTo->HrefValue = "";
			$this->IssuedTo->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() != "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
				$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
				$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
				$this->RIDNo->ViewCustomAttributes = "";
			} else {
				$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
				$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if ($this->PatientName->getSessionValue() != "") {
				$this->PatientName->CurrentValue = $this->PatientName->getSessionValue();
				$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
				$this->PatientName->ViewCustomAttributes = "";
			} else {
				if (!$this->PatientName->Raw)
					$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
				$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
				$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());
			}

			// HusbandName
			$this->HusbandName->EditAttrs["class"] = "form-control";
			$this->HusbandName->EditCustomAttributes = "";
			if (!$this->HusbandName->Raw)
				$this->HusbandName->CurrentValue = HtmlDecode($this->HusbandName->CurrentValue);
			$this->HusbandName->EditValue = HtmlEncode($this->HusbandName->CurrentValue);
			$this->HusbandName->PlaceHolder = RemoveHtml($this->HusbandName->caption());

			// RequestDr
			$this->RequestDr->EditAttrs["class"] = "form-control";
			$this->RequestDr->EditCustomAttributes = "";
			if (!$this->RequestDr->Raw)
				$this->RequestDr->CurrentValue = HtmlDecode($this->RequestDr->CurrentValue);
			$this->RequestDr->EditValue = HtmlEncode($this->RequestDr->CurrentValue);
			$this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

			// CollectionDate
			$this->CollectionDate->EditAttrs["class"] = "form-control";
			$this->CollectionDate->EditCustomAttributes = "";
			$this->CollectionDate->EditValue = HtmlEncode(FormatDateTime($this->CollectionDate->CurrentValue, 8));
			$this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
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
			$this->Medicationused->EditValue = $this->Medicationused->options(TRUE);

			// DifficultiesinCollection
			$this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
			$this->DifficultiesinCollection->EditCustomAttributes = "";
			$this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(TRUE);

			// pH
			$this->pH->EditAttrs["class"] = "form-control";
			$this->pH->EditCustomAttributes = "";
			if (!$this->pH->Raw)
				$this->pH->CurrentValue = HtmlDecode($this->pH->CurrentValue);
			$this->pH->EditValue = HtmlEncode($this->pH->CurrentValue);
			$this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

			// Timeofcollection
			$this->Timeofcollection->EditAttrs["class"] = "form-control";
			$this->Timeofcollection->EditCustomAttributes = "";
			if (!$this->Timeofcollection->Raw)
				$this->Timeofcollection->CurrentValue = HtmlDecode($this->Timeofcollection->CurrentValue);
			$this->Timeofcollection->EditValue = HtmlEncode($this->Timeofcollection->CurrentValue);
			$this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

			// Timeofexamination
			$this->Timeofexamination->EditAttrs["class"] = "form-control";
			$this->Timeofexamination->EditCustomAttributes = "";
			if (!$this->Timeofexamination->Raw)
				$this->Timeofexamination->CurrentValue = HtmlDecode($this->Timeofexamination->CurrentValue);
			$this->Timeofexamination->EditValue = HtmlEncode($this->Timeofexamination->CurrentValue);
			$this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

			// Volume
			$this->Volume->EditAttrs["class"] = "form-control";
			$this->Volume->EditCustomAttributes = "";
			if (!$this->Volume->Raw)
				$this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
			$this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
			$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

			// Concentration
			$this->Concentration->EditAttrs["class"] = "form-control";
			$this->Concentration->EditCustomAttributes = "";
			if (!$this->Concentration->Raw)
				$this->Concentration->CurrentValue = HtmlDecode($this->Concentration->CurrentValue);
			$this->Concentration->EditValue = HtmlEncode($this->Concentration->CurrentValue);
			$this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

			// Total
			$this->Total->EditAttrs["class"] = "form-control";
			$this->Total->EditCustomAttributes = "";
			if (!$this->Total->Raw)
				$this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
			$this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
			$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

			// ProgressiveMotility
			$this->ProgressiveMotility->EditAttrs["class"] = "form-control";
			$this->ProgressiveMotility->EditCustomAttributes = "";
			if (!$this->ProgressiveMotility->Raw)
				$this->ProgressiveMotility->CurrentValue = HtmlDecode($this->ProgressiveMotility->CurrentValue);
			$this->ProgressiveMotility->EditValue = HtmlEncode($this->ProgressiveMotility->CurrentValue);
			$this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
			$this->NonProgrssiveMotile->EditCustomAttributes = "";
			if (!$this->NonProgrssiveMotile->Raw)
				$this->NonProgrssiveMotile->CurrentValue = HtmlDecode($this->NonProgrssiveMotile->CurrentValue);
			$this->NonProgrssiveMotile->EditValue = HtmlEncode($this->NonProgrssiveMotile->CurrentValue);
			$this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

			// Immotile
			$this->Immotile->EditAttrs["class"] = "form-control";
			$this->Immotile->EditCustomAttributes = "";
			if (!$this->Immotile->Raw)
				$this->Immotile->CurrentValue = HtmlDecode($this->Immotile->CurrentValue);
			$this->Immotile->EditValue = HtmlEncode($this->Immotile->CurrentValue);
			$this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
			$this->TotalProgrssiveMotile->EditCustomAttributes = "";
			if (!$this->TotalProgrssiveMotile->Raw)
				$this->TotalProgrssiveMotile->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile->CurrentValue);
			$this->TotalProgrssiveMotile->EditValue = HtmlEncode($this->TotalProgrssiveMotile->CurrentValue);
			$this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

			// Appearance
			$this->Appearance->EditAttrs["class"] = "form-control";
			$this->Appearance->EditCustomAttributes = "";
			if (!$this->Appearance->Raw)
				$this->Appearance->CurrentValue = HtmlDecode($this->Appearance->CurrentValue);
			$this->Appearance->EditValue = HtmlEncode($this->Appearance->CurrentValue);
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
				$this->Liquefactiontime->CurrentValue = HtmlDecode($this->Liquefactiontime->CurrentValue);
			$this->Liquefactiontime->EditValue = HtmlEncode($this->Liquefactiontime->CurrentValue);
			$this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

			// Normal
			$this->Normal->EditAttrs["class"] = "form-control";
			$this->Normal->EditCustomAttributes = "";
			if (!$this->Normal->Raw)
				$this->Normal->CurrentValue = HtmlDecode($this->Normal->CurrentValue);
			$this->Normal->EditValue = HtmlEncode($this->Normal->CurrentValue);
			$this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// Headdefects
			$this->Headdefects->EditAttrs["class"] = "form-control";
			$this->Headdefects->EditCustomAttributes = "";
			if (!$this->Headdefects->Raw)
				$this->Headdefects->CurrentValue = HtmlDecode($this->Headdefects->CurrentValue);
			$this->Headdefects->EditValue = HtmlEncode($this->Headdefects->CurrentValue);
			$this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

			// MidpieceDefects
			$this->MidpieceDefects->EditAttrs["class"] = "form-control";
			$this->MidpieceDefects->EditCustomAttributes = "";
			if (!$this->MidpieceDefects->Raw)
				$this->MidpieceDefects->CurrentValue = HtmlDecode($this->MidpieceDefects->CurrentValue);
			$this->MidpieceDefects->EditValue = HtmlEncode($this->MidpieceDefects->CurrentValue);
			$this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

			// TailDefects
			$this->TailDefects->EditAttrs["class"] = "form-control";
			$this->TailDefects->EditCustomAttributes = "";
			if (!$this->TailDefects->Raw)
				$this->TailDefects->CurrentValue = HtmlDecode($this->TailDefects->CurrentValue);
			$this->TailDefects->EditValue = HtmlEncode($this->TailDefects->CurrentValue);
			$this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

			// NormalProgMotile
			$this->NormalProgMotile->EditAttrs["class"] = "form-control";
			$this->NormalProgMotile->EditCustomAttributes = "";
			if (!$this->NormalProgMotile->Raw)
				$this->NormalProgMotile->CurrentValue = HtmlDecode($this->NormalProgMotile->CurrentValue);
			$this->NormalProgMotile->EditValue = HtmlEncode($this->NormalProgMotile->CurrentValue);
			$this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

			// ImmatureForms
			$this->ImmatureForms->EditAttrs["class"] = "form-control";
			$this->ImmatureForms->EditCustomAttributes = "";
			if (!$this->ImmatureForms->Raw)
				$this->ImmatureForms->CurrentValue = HtmlDecode($this->ImmatureForms->CurrentValue);
			$this->ImmatureForms->EditValue = HtmlEncode($this->ImmatureForms->CurrentValue);
			$this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

			// Leucocytes
			$this->Leucocytes->EditAttrs["class"] = "form-control";
			$this->Leucocytes->EditCustomAttributes = "";
			if (!$this->Leucocytes->Raw)
				$this->Leucocytes->CurrentValue = HtmlDecode($this->Leucocytes->CurrentValue);
			$this->Leucocytes->EditValue = HtmlEncode($this->Leucocytes->CurrentValue);
			$this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

			// Agglutination
			$this->Agglutination->EditAttrs["class"] = "form-control";
			$this->Agglutination->EditCustomAttributes = "";
			if (!$this->Agglutination->Raw)
				$this->Agglutination->CurrentValue = HtmlDecode($this->Agglutination->CurrentValue);
			$this->Agglutination->EditValue = HtmlEncode($this->Agglutination->CurrentValue);
			$this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

			// Debris
			$this->Debris->EditAttrs["class"] = "form-control";
			$this->Debris->EditCustomAttributes = "";
			if (!$this->Debris->Raw)
				$this->Debris->CurrentValue = HtmlDecode($this->Debris->CurrentValue);
			$this->Debris->EditValue = HtmlEncode($this->Debris->CurrentValue);
			$this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

			// Diagnosis
			$this->Diagnosis->EditAttrs["class"] = "form-control";
			$this->Diagnosis->EditCustomAttributes = "";
			$this->Diagnosis->EditValue = HtmlEncode($this->Diagnosis->CurrentValue);
			$this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

			// Observations
			$this->Observations->EditAttrs["class"] = "form-control";
			$this->Observations->EditCustomAttributes = "";
			$this->Observations->EditValue = HtmlEncode($this->Observations->CurrentValue);
			$this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

			// Signature
			$this->Signature->EditAttrs["class"] = "form-control";
			$this->Signature->EditCustomAttributes = "";
			if (!$this->Signature->Raw)
				$this->Signature->CurrentValue = HtmlDecode($this->Signature->CurrentValue);
			$this->Signature->EditValue = HtmlEncode($this->Signature->CurrentValue);
			$this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

			// SemenOrgin
			$this->SemenOrgin->EditAttrs["class"] = "form-control";
			$this->SemenOrgin->EditCustomAttributes = "";
			$this->SemenOrgin->EditValue = $this->SemenOrgin->options(TRUE);

			// Donor
			$this->Donor->EditCustomAttributes = "";
			$curVal = trim(strval($this->Donor->CurrentValue));
			if ($curVal != "")
				$this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
			else
				$this->Donor->ViewValue = $this->Donor->Lookup !== NULL && is_array($this->Donor->Lookup->Options) ? $curVal : NULL;
			if ($this->Donor->ViewValue !== NULL) { // Load from cache
				$this->Donor->EditValue = array_values($this->Donor->Lookup->Options);
				if ($this->Donor->ViewValue == "")
					$this->Donor->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Donor->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Donor->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
				} else {
					$this->Donor->ViewValue = $Language->phrase("PleaseSelect");
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
				$this->DonorBloodgroup->CurrentValue = HtmlDecode($this->DonorBloodgroup->CurrentValue);
			$this->DonorBloodgroup->EditValue = HtmlEncode($this->DonorBloodgroup->CurrentValue);
			$this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

			// Tank
			$this->Tank->EditAttrs["class"] = "form-control";
			$this->Tank->EditCustomAttributes = "";
			if (!$this->Tank->Raw)
				$this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
			$this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
			$this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

			// Location
			$this->Location->EditAttrs["class"] = "form-control";
			$this->Location->EditCustomAttributes = "";
			if (!$this->Location->Raw)
				$this->Location->CurrentValue = HtmlDecode($this->Location->CurrentValue);
			$this->Location->EditValue = HtmlEncode($this->Location->CurrentValue);
			$this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

			// Volume1
			$this->Volume1->EditAttrs["class"] = "form-control";
			$this->Volume1->EditCustomAttributes = "";
			if (!$this->Volume1->Raw)
				$this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
			$this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
			$this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

			// Concentration1
			$this->Concentration1->EditAttrs["class"] = "form-control";
			$this->Concentration1->EditCustomAttributes = "";
			if (!$this->Concentration1->Raw)
				$this->Concentration1->CurrentValue = HtmlDecode($this->Concentration1->CurrentValue);
			$this->Concentration1->EditValue = HtmlEncode($this->Concentration1->CurrentValue);
			$this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

			// Total1
			$this->Total1->EditAttrs["class"] = "form-control";
			$this->Total1->EditCustomAttributes = "";
			if (!$this->Total1->Raw)
				$this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
			$this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
			$this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

			// ProgressiveMotility1
			$this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
			$this->ProgressiveMotility1->EditCustomAttributes = "";
			if (!$this->ProgressiveMotility1->Raw)
				$this->ProgressiveMotility1->CurrentValue = HtmlDecode($this->ProgressiveMotility1->CurrentValue);
			$this->ProgressiveMotility1->EditValue = HtmlEncode($this->ProgressiveMotility1->CurrentValue);
			$this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
			$this->NonProgrssiveMotile1->EditCustomAttributes = "";
			if (!$this->NonProgrssiveMotile1->Raw)
				$this->NonProgrssiveMotile1->CurrentValue = HtmlDecode($this->NonProgrssiveMotile1->CurrentValue);
			$this->NonProgrssiveMotile1->EditValue = HtmlEncode($this->NonProgrssiveMotile1->CurrentValue);
			$this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

			// Immotile1
			$this->Immotile1->EditAttrs["class"] = "form-control";
			$this->Immotile1->EditCustomAttributes = "";
			if (!$this->Immotile1->Raw)
				$this->Immotile1->CurrentValue = HtmlDecode($this->Immotile1->CurrentValue);
			$this->Immotile1->EditValue = HtmlEncode($this->Immotile1->CurrentValue);
			$this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
			$this->TotalProgrssiveMotile1->EditCustomAttributes = "";
			if (!$this->TotalProgrssiveMotile1->Raw)
				$this->TotalProgrssiveMotile1->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile1->CurrentValue);
			$this->TotalProgrssiveMotile1->EditValue = HtmlEncode($this->TotalProgrssiveMotile1->CurrentValue);
			$this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() != "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
				$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
				$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
				$this->TidNo->ViewCustomAttributes = "";
			} else {
				$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
				$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// Color
			$this->Color->EditAttrs["class"] = "form-control";
			$this->Color->EditCustomAttributes = "";
			if (!$this->Color->Raw)
				$this->Color->CurrentValue = HtmlDecode($this->Color->CurrentValue);
			$this->Color->EditValue = HtmlEncode($this->Color->CurrentValue);
			$this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

			// DoneBy
			$this->DoneBy->EditAttrs["class"] = "form-control";
			$this->DoneBy->EditCustomAttributes = "";
			if (!$this->DoneBy->Raw)
				$this->DoneBy->CurrentValue = HtmlDecode($this->DoneBy->CurrentValue);
			$this->DoneBy->EditValue = HtmlEncode($this->DoneBy->CurrentValue);
			$this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (!$this->Method->Raw)
				$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
			$this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Abstinence
			$this->Abstinence->EditAttrs["class"] = "form-control";
			$this->Abstinence->EditCustomAttributes = "";
			if (!$this->Abstinence->Raw)
				$this->Abstinence->CurrentValue = HtmlDecode($this->Abstinence->CurrentValue);
			$this->Abstinence->EditValue = HtmlEncode($this->Abstinence->CurrentValue);
			$this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

			// ProcessedBy
			$this->ProcessedBy->EditAttrs["class"] = "form-control";
			$this->ProcessedBy->EditCustomAttributes = "";
			if (!$this->ProcessedBy->Raw)
				$this->ProcessedBy->CurrentValue = HtmlDecode($this->ProcessedBy->CurrentValue);
			$this->ProcessedBy->EditValue = HtmlEncode($this->ProcessedBy->CurrentValue);
			$this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

			// InseminationTime
			$this->InseminationTime->EditAttrs["class"] = "form-control";
			$this->InseminationTime->EditCustomAttributes = "";
			if (!$this->InseminationTime->Raw)
				$this->InseminationTime->CurrentValue = HtmlDecode($this->InseminationTime->CurrentValue);
			$this->InseminationTime->EditValue = HtmlEncode($this->InseminationTime->CurrentValue);
			$this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

			// InseminationBy
			$this->InseminationBy->EditAttrs["class"] = "form-control";
			$this->InseminationBy->EditCustomAttributes = "";
			if (!$this->InseminationBy->Raw)
				$this->InseminationBy->CurrentValue = HtmlDecode($this->InseminationBy->CurrentValue);
			$this->InseminationBy->EditValue = HtmlEncode($this->InseminationBy->CurrentValue);
			$this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

			// Big
			$this->Big->EditAttrs["class"] = "form-control";
			$this->Big->EditCustomAttributes = "";
			if (!$this->Big->Raw)
				$this->Big->CurrentValue = HtmlDecode($this->Big->CurrentValue);
			$this->Big->EditValue = HtmlEncode($this->Big->CurrentValue);
			$this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

			// Medium
			$this->Medium->EditAttrs["class"] = "form-control";
			$this->Medium->EditCustomAttributes = "";
			if (!$this->Medium->Raw)
				$this->Medium->CurrentValue = HtmlDecode($this->Medium->CurrentValue);
			$this->Medium->EditValue = HtmlEncode($this->Medium->CurrentValue);
			$this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

			// Small
			$this->Small->EditAttrs["class"] = "form-control";
			$this->Small->EditCustomAttributes = "";
			if (!$this->Small->Raw)
				$this->Small->CurrentValue = HtmlDecode($this->Small->CurrentValue);
			$this->Small->EditValue = HtmlEncode($this->Small->CurrentValue);
			$this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

			// NoHalo
			$this->NoHalo->EditAttrs["class"] = "form-control";
			$this->NoHalo->EditCustomAttributes = "";
			if (!$this->NoHalo->Raw)
				$this->NoHalo->CurrentValue = HtmlDecode($this->NoHalo->CurrentValue);
			$this->NoHalo->EditValue = HtmlEncode($this->NoHalo->CurrentValue);
			$this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

			// Fragmented
			$this->Fragmented->EditAttrs["class"] = "form-control";
			$this->Fragmented->EditCustomAttributes = "";
			if (!$this->Fragmented->Raw)
				$this->Fragmented->CurrentValue = HtmlDecode($this->Fragmented->CurrentValue);
			$this->Fragmented->EditValue = HtmlEncode($this->Fragmented->CurrentValue);
			$this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

			// NonFragmented
			$this->NonFragmented->EditAttrs["class"] = "form-control";
			$this->NonFragmented->EditCustomAttributes = "";
			if (!$this->NonFragmented->Raw)
				$this->NonFragmented->CurrentValue = HtmlDecode($this->NonFragmented->CurrentValue);
			$this->NonFragmented->EditValue = HtmlEncode($this->NonFragmented->CurrentValue);
			$this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

			// DFI
			$this->DFI->EditAttrs["class"] = "form-control";
			$this->DFI->EditCustomAttributes = "";
			if (!$this->DFI->Raw)
				$this->DFI->CurrentValue = HtmlDecode($this->DFI->CurrentValue);
			$this->DFI->EditValue = HtmlEncode($this->DFI->CurrentValue);
			$this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

			// IsueBy
			$this->IsueBy->EditAttrs["class"] = "form-control";
			$this->IsueBy->EditCustomAttributes = "";
			if (!$this->IsueBy->Raw)
				$this->IsueBy->CurrentValue = HtmlDecode($this->IsueBy->CurrentValue);
			$this->IsueBy->EditValue = HtmlEncode($this->IsueBy->CurrentValue);
			$this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

			// Volume2
			$this->Volume2->EditAttrs["class"] = "form-control";
			$this->Volume2->EditCustomAttributes = "";
			if (!$this->Volume2->Raw)
				$this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
			$this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
			$this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

			// Concentration2
			$this->Concentration2->EditAttrs["class"] = "form-control";
			$this->Concentration2->EditCustomAttributes = "";
			if (!$this->Concentration2->Raw)
				$this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
			$this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
			$this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

			// Total2
			$this->Total2->EditAttrs["class"] = "form-control";
			$this->Total2->EditCustomAttributes = "";
			if (!$this->Total2->Raw)
				$this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
			$this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
			$this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

			// ProgressiveMotility2
			$this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
			$this->ProgressiveMotility2->EditCustomAttributes = "";
			if (!$this->ProgressiveMotility2->Raw)
				$this->ProgressiveMotility2->CurrentValue = HtmlDecode($this->ProgressiveMotility2->CurrentValue);
			$this->ProgressiveMotility2->EditValue = HtmlEncode($this->ProgressiveMotility2->CurrentValue);
			$this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
			$this->NonProgrssiveMotile2->EditCustomAttributes = "";
			if (!$this->NonProgrssiveMotile2->Raw)
				$this->NonProgrssiveMotile2->CurrentValue = HtmlDecode($this->NonProgrssiveMotile2->CurrentValue);
			$this->NonProgrssiveMotile2->EditValue = HtmlEncode($this->NonProgrssiveMotile2->CurrentValue);
			$this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

			// Immotile2
			$this->Immotile2->EditAttrs["class"] = "form-control";
			$this->Immotile2->EditCustomAttributes = "";
			if (!$this->Immotile2->Raw)
				$this->Immotile2->CurrentValue = HtmlDecode($this->Immotile2->CurrentValue);
			$this->Immotile2->EditValue = HtmlEncode($this->Immotile2->CurrentValue);
			$this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
			$this->TotalProgrssiveMotile2->EditCustomAttributes = "";
			if (!$this->TotalProgrssiveMotile2->Raw)
				$this->TotalProgrssiveMotile2->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile2->CurrentValue);
			$this->TotalProgrssiveMotile2->EditValue = HtmlEncode($this->TotalProgrssiveMotile2->CurrentValue);
			$this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

			// MACS
			$this->MACS->EditCustomAttributes = "";
			$this->MACS->EditValue = $this->MACS->options(FALSE);

			// IssuedBy
			$this->IssuedBy->EditAttrs["class"] = "form-control";
			$this->IssuedBy->EditCustomAttributes = "";
			if (!$this->IssuedBy->Raw)
				$this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
			$this->IssuedBy->EditValue = HtmlEncode($this->IssuedBy->CurrentValue);
			$this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

			// IssuedTo
			$this->IssuedTo->EditAttrs["class"] = "form-control";
			$this->IssuedTo->EditCustomAttributes = "";
			if (!$this->IssuedTo->Raw)
				$this->IssuedTo->CurrentValue = HtmlDecode($this->IssuedTo->CurrentValue);
			$this->IssuedTo->EditValue = HtmlEncode($this->IssuedTo->CurrentValue);
			$this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

			// PaID
			$this->PaID->EditAttrs["class"] = "form-control";
			$this->PaID->EditCustomAttributes = "";
			if (!$this->PaID->Raw)
				$this->PaID->CurrentValue = HtmlDecode($this->PaID->CurrentValue);
			$this->PaID->EditValue = HtmlEncode($this->PaID->CurrentValue);
			$this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

			// PaName
			$this->PaName->EditAttrs["class"] = "form-control";
			$this->PaName->EditCustomAttributes = "";
			if (!$this->PaName->Raw)
				$this->PaName->CurrentValue = HtmlDecode($this->PaName->CurrentValue);
			$this->PaName->EditValue = HtmlEncode($this->PaName->CurrentValue);
			$this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

			// PaMobile
			$this->PaMobile->EditAttrs["class"] = "form-control";
			$this->PaMobile->EditCustomAttributes = "";
			if (!$this->PaMobile->Raw)
				$this->PaMobile->CurrentValue = HtmlDecode($this->PaMobile->CurrentValue);
			$this->PaMobile->EditValue = HtmlEncode($this->PaMobile->CurrentValue);
			$this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

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

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
			$this->PREG_TEST_DATE->EditCustomAttributes = "";
			$this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 8));
			$this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
			$this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
			$this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(TRUE);

			// IMSC_1
			$this->IMSC_1->EditAttrs["class"] = "form-control";
			$this->IMSC_1->EditCustomAttributes = "";
			if (!$this->IMSC_1->Raw)
				$this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
			$this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->CurrentValue);
			$this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

			// IMSC_2
			$this->IMSC_2->EditAttrs["class"] = "form-control";
			$this->IMSC_2->EditCustomAttributes = "";
			if (!$this->IMSC_2->Raw)
				$this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
			$this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->CurrentValue);
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
			if (!$this->TIME_FROM_PREP_TO_INSEM->Raw)
				$this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
			$this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
			$this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// HusbandName
			$this->HusbandName->LinkCustomAttributes = "";
			$this->HusbandName->HrefValue = "";

			// RequestDr
			$this->RequestDr->LinkCustomAttributes = "";
			$this->RequestDr->HrefValue = "";

			// CollectionDate
			$this->CollectionDate->LinkCustomAttributes = "";
			$this->CollectionDate->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// RequestSample
			$this->RequestSample->LinkCustomAttributes = "";
			$this->RequestSample->HrefValue = "";

			// CollectionType
			$this->CollectionType->LinkCustomAttributes = "";
			$this->CollectionType->HrefValue = "";

			// CollectionMethod
			$this->CollectionMethod->LinkCustomAttributes = "";
			$this->CollectionMethod->HrefValue = "";

			// Medicationused
			$this->Medicationused->LinkCustomAttributes = "";
			$this->Medicationused->HrefValue = "";

			// DifficultiesinCollection
			$this->DifficultiesinCollection->LinkCustomAttributes = "";
			$this->DifficultiesinCollection->HrefValue = "";

			// pH
			$this->pH->LinkCustomAttributes = "";
			$this->pH->HrefValue = "";

			// Timeofcollection
			$this->Timeofcollection->LinkCustomAttributes = "";
			$this->Timeofcollection->HrefValue = "";

			// Timeofexamination
			$this->Timeofexamination->LinkCustomAttributes = "";
			$this->Timeofexamination->HrefValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";

			// Concentration
			$this->Concentration->LinkCustomAttributes = "";
			$this->Concentration->HrefValue = "";

			// Total
			$this->Total->LinkCustomAttributes = "";
			$this->Total->HrefValue = "";

			// ProgressiveMotility
			$this->ProgressiveMotility->LinkCustomAttributes = "";
			$this->ProgressiveMotility->HrefValue = "";

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile->HrefValue = "";

			// Immotile
			$this->Immotile->LinkCustomAttributes = "";
			$this->Immotile->HrefValue = "";

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile->HrefValue = "";

			// Appearance
			$this->Appearance->LinkCustomAttributes = "";
			$this->Appearance->HrefValue = "";

			// Homogenosity
			$this->Homogenosity->LinkCustomAttributes = "";
			$this->Homogenosity->HrefValue = "";

			// CompleteSample
			$this->CompleteSample->LinkCustomAttributes = "";
			$this->CompleteSample->HrefValue = "";

			// Liquefactiontime
			$this->Liquefactiontime->LinkCustomAttributes = "";
			$this->Liquefactiontime->HrefValue = "";

			// Normal
			$this->Normal->LinkCustomAttributes = "";
			$this->Normal->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// Headdefects
			$this->Headdefects->LinkCustomAttributes = "";
			$this->Headdefects->HrefValue = "";

			// MidpieceDefects
			$this->MidpieceDefects->LinkCustomAttributes = "";
			$this->MidpieceDefects->HrefValue = "";

			// TailDefects
			$this->TailDefects->LinkCustomAttributes = "";
			$this->TailDefects->HrefValue = "";

			// NormalProgMotile
			$this->NormalProgMotile->LinkCustomAttributes = "";
			$this->NormalProgMotile->HrefValue = "";

			// ImmatureForms
			$this->ImmatureForms->LinkCustomAttributes = "";
			$this->ImmatureForms->HrefValue = "";

			// Leucocytes
			$this->Leucocytes->LinkCustomAttributes = "";
			$this->Leucocytes->HrefValue = "";

			// Agglutination
			$this->Agglutination->LinkCustomAttributes = "";
			$this->Agglutination->HrefValue = "";

			// Debris
			$this->Debris->LinkCustomAttributes = "";
			$this->Debris->HrefValue = "";

			// Diagnosis
			$this->Diagnosis->LinkCustomAttributes = "";
			$this->Diagnosis->HrefValue = "";

			// Observations
			$this->Observations->LinkCustomAttributes = "";
			$this->Observations->HrefValue = "";

			// Signature
			$this->Signature->LinkCustomAttributes = "";
			$this->Signature->HrefValue = "";

			// SemenOrgin
			$this->SemenOrgin->LinkCustomAttributes = "";
			$this->SemenOrgin->HrefValue = "";

			// Donor
			$this->Donor->LinkCustomAttributes = "";
			$this->Donor->HrefValue = "";

			// DonorBloodgroup
			$this->DonorBloodgroup->LinkCustomAttributes = "";
			$this->DonorBloodgroup->HrefValue = "";

			// Tank
			$this->Tank->LinkCustomAttributes = "";
			$this->Tank->HrefValue = "";

			// Location
			$this->Location->LinkCustomAttributes = "";
			$this->Location->HrefValue = "";

			// Volume1
			$this->Volume1->LinkCustomAttributes = "";
			$this->Volume1->HrefValue = "";

			// Concentration1
			$this->Concentration1->LinkCustomAttributes = "";
			$this->Concentration1->HrefValue = "";

			// Total1
			$this->Total1->LinkCustomAttributes = "";
			$this->Total1->HrefValue = "";

			// ProgressiveMotility1
			$this->ProgressiveMotility1->LinkCustomAttributes = "";
			$this->ProgressiveMotility1->HrefValue = "";

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile1->HrefValue = "";

			// Immotile1
			$this->Immotile1->LinkCustomAttributes = "";
			$this->Immotile1->HrefValue = "";

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile1->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// Color
			$this->Color->LinkCustomAttributes = "";
			$this->Color->HrefValue = "";

			// DoneBy
			$this->DoneBy->LinkCustomAttributes = "";
			$this->DoneBy->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Abstinence
			$this->Abstinence->LinkCustomAttributes = "";
			$this->Abstinence->HrefValue = "";

			// ProcessedBy
			$this->ProcessedBy->LinkCustomAttributes = "";
			$this->ProcessedBy->HrefValue = "";

			// InseminationTime
			$this->InseminationTime->LinkCustomAttributes = "";
			$this->InseminationTime->HrefValue = "";

			// InseminationBy
			$this->InseminationBy->LinkCustomAttributes = "";
			$this->InseminationBy->HrefValue = "";

			// Big
			$this->Big->LinkCustomAttributes = "";
			$this->Big->HrefValue = "";

			// Medium
			$this->Medium->LinkCustomAttributes = "";
			$this->Medium->HrefValue = "";

			// Small
			$this->Small->LinkCustomAttributes = "";
			$this->Small->HrefValue = "";

			// NoHalo
			$this->NoHalo->LinkCustomAttributes = "";
			$this->NoHalo->HrefValue = "";

			// Fragmented
			$this->Fragmented->LinkCustomAttributes = "";
			$this->Fragmented->HrefValue = "";

			// NonFragmented
			$this->NonFragmented->LinkCustomAttributes = "";
			$this->NonFragmented->HrefValue = "";

			// DFI
			$this->DFI->LinkCustomAttributes = "";
			$this->DFI->HrefValue = "";

			// IsueBy
			$this->IsueBy->LinkCustomAttributes = "";
			$this->IsueBy->HrefValue = "";

			// Volume2
			$this->Volume2->LinkCustomAttributes = "";
			$this->Volume2->HrefValue = "";

			// Concentration2
			$this->Concentration2->LinkCustomAttributes = "";
			$this->Concentration2->HrefValue = "";

			// Total2
			$this->Total2->LinkCustomAttributes = "";
			$this->Total2->HrefValue = "";

			// ProgressiveMotility2
			$this->ProgressiveMotility2->LinkCustomAttributes = "";
			$this->ProgressiveMotility2->HrefValue = "";

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->LinkCustomAttributes = "";
			$this->NonProgrssiveMotile2->HrefValue = "";

			// Immotile2
			$this->Immotile2->LinkCustomAttributes = "";
			$this->Immotile2->HrefValue = "";

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
			$this->TotalProgrssiveMotile2->HrefValue = "";

			// MACS
			$this->MACS->LinkCustomAttributes = "";
			$this->MACS->HrefValue = "";

			// IssuedBy
			$this->IssuedBy->LinkCustomAttributes = "";
			$this->IssuedBy->HrefValue = "";

			// IssuedTo
			$this->IssuedTo->LinkCustomAttributes = "";
			$this->IssuedTo->HrefValue = "";

			// PaID
			$this->PaID->LinkCustomAttributes = "";
			$this->PaID->HrefValue = "";

			// PaName
			$this->PaName->LinkCustomAttributes = "";
			$this->PaName->HrefValue = "";

			// PaMobile
			$this->PaMobile->LinkCustomAttributes = "";
			$this->PaMobile->HrefValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// PartnerMobile
			$this->PartnerMobile->LinkCustomAttributes = "";
			$this->PartnerMobile->HrefValue = "";

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->LinkCustomAttributes = "";
			$this->PREG_TEST_DATE->HrefValue = "";

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_PROBLEMS->HrefValue = "";

			// IMSC_1
			$this->IMSC_1->LinkCustomAttributes = "";
			$this->IMSC_1->HrefValue = "";

			// IMSC_2
			$this->IMSC_2->LinkCustomAttributes = "";
			$this->IMSC_2->HrefValue = "";

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
			$this->LIQUIFACTION_STORAGE->HrefValue = "";

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->LinkCustomAttributes = "";
			$this->IUI_PREP_METHOD->HrefValue = "";

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
			$this->TIME_FROM_TRIGGER->HrefValue = "";

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
			$this->COLLECTION_TO_PREPARATION->HrefValue = "";

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
			$this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
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
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNo->FormValue)) {
			AddMessage($FormError, $this->RIDNo->errorMessage());
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->HusbandName->Required) {
			if (!$this->HusbandName->IsDetailKey && $this->HusbandName->FormValue != NULL && $this->HusbandName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HusbandName->caption(), $this->HusbandName->RequiredErrorMessage));
			}
		}
		if ($this->RequestDr->Required) {
			if (!$this->RequestDr->IsDetailKey && $this->RequestDr->FormValue != NULL && $this->RequestDr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RequestDr->caption(), $this->RequestDr->RequiredErrorMessage));
			}
		}
		if ($this->CollectionDate->Required) {
			if (!$this->CollectionDate->IsDetailKey && $this->CollectionDate->FormValue != NULL && $this->CollectionDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollectionDate->caption(), $this->CollectionDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->CollectionDate->FormValue)) {
			AddMessage($FormError, $this->CollectionDate->errorMessage());
		}
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResultDate->FormValue)) {
			AddMessage($FormError, $this->ResultDate->errorMessage());
		}
		if ($this->RequestSample->Required) {
			if (!$this->RequestSample->IsDetailKey && $this->RequestSample->FormValue != NULL && $this->RequestSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RequestSample->caption(), $this->RequestSample->RequiredErrorMessage));
			}
		}
		if ($this->CollectionType->Required) {
			if (!$this->CollectionType->IsDetailKey && $this->CollectionType->FormValue != NULL && $this->CollectionType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollectionType->caption(), $this->CollectionType->RequiredErrorMessage));
			}
		}
		if ($this->CollectionMethod->Required) {
			if (!$this->CollectionMethod->IsDetailKey && $this->CollectionMethod->FormValue != NULL && $this->CollectionMethod->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollectionMethod->caption(), $this->CollectionMethod->RequiredErrorMessage));
			}
		}
		if ($this->Medicationused->Required) {
			if (!$this->Medicationused->IsDetailKey && $this->Medicationused->FormValue != NULL && $this->Medicationused->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medicationused->caption(), $this->Medicationused->RequiredErrorMessage));
			}
		}
		if ($this->DifficultiesinCollection->Required) {
			if (!$this->DifficultiesinCollection->IsDetailKey && $this->DifficultiesinCollection->FormValue != NULL && $this->DifficultiesinCollection->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DifficultiesinCollection->caption(), $this->DifficultiesinCollection->RequiredErrorMessage));
			}
		}
		if ($this->pH->Required) {
			if (!$this->pH->IsDetailKey && $this->pH->FormValue != NULL && $this->pH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pH->caption(), $this->pH->RequiredErrorMessage));
			}
		}
		if ($this->Timeofcollection->Required) {
			if (!$this->Timeofcollection->IsDetailKey && $this->Timeofcollection->FormValue != NULL && $this->Timeofcollection->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Timeofcollection->caption(), $this->Timeofcollection->RequiredErrorMessage));
			}
		}
		if ($this->Timeofexamination->Required) {
			if (!$this->Timeofexamination->IsDetailKey && $this->Timeofexamination->FormValue != NULL && $this->Timeofexamination->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Timeofexamination->caption(), $this->Timeofexamination->RequiredErrorMessage));
			}
		}
		if ($this->Volume->Required) {
			if (!$this->Volume->IsDetailKey && $this->Volume->FormValue != NULL && $this->Volume->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
			}
		}
		if ($this->Concentration->Required) {
			if (!$this->Concentration->IsDetailKey && $this->Concentration->FormValue != NULL && $this->Concentration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Concentration->caption(), $this->Concentration->RequiredErrorMessage));
			}
		}
		if ($this->Total->Required) {
			if (!$this->Total->IsDetailKey && $this->Total->FormValue != NULL && $this->Total->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total->caption(), $this->Total->RequiredErrorMessage));
			}
		}
		if ($this->ProgressiveMotility->Required) {
			if (!$this->ProgressiveMotility->IsDetailKey && $this->ProgressiveMotility->FormValue != NULL && $this->ProgressiveMotility->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProgressiveMotility->caption(), $this->ProgressiveMotility->RequiredErrorMessage));
			}
		}
		if ($this->NonProgrssiveMotile->Required) {
			if (!$this->NonProgrssiveMotile->IsDetailKey && $this->NonProgrssiveMotile->FormValue != NULL && $this->NonProgrssiveMotile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NonProgrssiveMotile->caption(), $this->NonProgrssiveMotile->RequiredErrorMessage));
			}
		}
		if ($this->Immotile->Required) {
			if (!$this->Immotile->IsDetailKey && $this->Immotile->FormValue != NULL && $this->Immotile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Immotile->caption(), $this->Immotile->RequiredErrorMessage));
			}
		}
		if ($this->TotalProgrssiveMotile->Required) {
			if (!$this->TotalProgrssiveMotile->IsDetailKey && $this->TotalProgrssiveMotile->FormValue != NULL && $this->TotalProgrssiveMotile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalProgrssiveMotile->caption(), $this->TotalProgrssiveMotile->RequiredErrorMessage));
			}
		}
		if ($this->Appearance->Required) {
			if (!$this->Appearance->IsDetailKey && $this->Appearance->FormValue != NULL && $this->Appearance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Appearance->caption(), $this->Appearance->RequiredErrorMessage));
			}
		}
		if ($this->Homogenosity->Required) {
			if (!$this->Homogenosity->IsDetailKey && $this->Homogenosity->FormValue != NULL && $this->Homogenosity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Homogenosity->caption(), $this->Homogenosity->RequiredErrorMessage));
			}
		}
		if ($this->CompleteSample->Required) {
			if (!$this->CompleteSample->IsDetailKey && $this->CompleteSample->FormValue != NULL && $this->CompleteSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CompleteSample->caption(), $this->CompleteSample->RequiredErrorMessage));
			}
		}
		if ($this->Liquefactiontime->Required) {
			if (!$this->Liquefactiontime->IsDetailKey && $this->Liquefactiontime->FormValue != NULL && $this->Liquefactiontime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Liquefactiontime->caption(), $this->Liquefactiontime->RequiredErrorMessage));
			}
		}
		if ($this->Normal->Required) {
			if (!$this->Normal->IsDetailKey && $this->Normal->FormValue != NULL && $this->Normal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Normal->caption(), $this->Normal->RequiredErrorMessage));
			}
		}
		if ($this->Abnormal->Required) {
			if (!$this->Abnormal->IsDetailKey && $this->Abnormal->FormValue != NULL && $this->Abnormal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
			}
		}
		if ($this->Headdefects->Required) {
			if (!$this->Headdefects->IsDetailKey && $this->Headdefects->FormValue != NULL && $this->Headdefects->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Headdefects->caption(), $this->Headdefects->RequiredErrorMessage));
			}
		}
		if ($this->MidpieceDefects->Required) {
			if (!$this->MidpieceDefects->IsDetailKey && $this->MidpieceDefects->FormValue != NULL && $this->MidpieceDefects->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MidpieceDefects->caption(), $this->MidpieceDefects->RequiredErrorMessage));
			}
		}
		if ($this->TailDefects->Required) {
			if (!$this->TailDefects->IsDetailKey && $this->TailDefects->FormValue != NULL && $this->TailDefects->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TailDefects->caption(), $this->TailDefects->RequiredErrorMessage));
			}
		}
		if ($this->NormalProgMotile->Required) {
			if (!$this->NormalProgMotile->IsDetailKey && $this->NormalProgMotile->FormValue != NULL && $this->NormalProgMotile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NormalProgMotile->caption(), $this->NormalProgMotile->RequiredErrorMessage));
			}
		}
		if ($this->ImmatureForms->Required) {
			if (!$this->ImmatureForms->IsDetailKey && $this->ImmatureForms->FormValue != NULL && $this->ImmatureForms->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ImmatureForms->caption(), $this->ImmatureForms->RequiredErrorMessage));
			}
		}
		if ($this->Leucocytes->Required) {
			if (!$this->Leucocytes->IsDetailKey && $this->Leucocytes->FormValue != NULL && $this->Leucocytes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Leucocytes->caption(), $this->Leucocytes->RequiredErrorMessage));
			}
		}
		if ($this->Agglutination->Required) {
			if (!$this->Agglutination->IsDetailKey && $this->Agglutination->FormValue != NULL && $this->Agglutination->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Agglutination->caption(), $this->Agglutination->RequiredErrorMessage));
			}
		}
		if ($this->Debris->Required) {
			if (!$this->Debris->IsDetailKey && $this->Debris->FormValue != NULL && $this->Debris->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Debris->caption(), $this->Debris->RequiredErrorMessage));
			}
		}
		if ($this->Diagnosis->Required) {
			if (!$this->Diagnosis->IsDetailKey && $this->Diagnosis->FormValue != NULL && $this->Diagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Diagnosis->caption(), $this->Diagnosis->RequiredErrorMessage));
			}
		}
		if ($this->Observations->Required) {
			if (!$this->Observations->IsDetailKey && $this->Observations->FormValue != NULL && $this->Observations->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Observations->caption(), $this->Observations->RequiredErrorMessage));
			}
		}
		if ($this->Signature->Required) {
			if (!$this->Signature->IsDetailKey && $this->Signature->FormValue != NULL && $this->Signature->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Signature->caption(), $this->Signature->RequiredErrorMessage));
			}
		}
		if ($this->SemenOrgin->Required) {
			if (!$this->SemenOrgin->IsDetailKey && $this->SemenOrgin->FormValue != NULL && $this->SemenOrgin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SemenOrgin->caption(), $this->SemenOrgin->RequiredErrorMessage));
			}
		}
		if ($this->Donor->Required) {
			if (!$this->Donor->IsDetailKey && $this->Donor->FormValue != NULL && $this->Donor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Donor->caption(), $this->Donor->RequiredErrorMessage));
			}
		}
		if ($this->DonorBloodgroup->Required) {
			if (!$this->DonorBloodgroup->IsDetailKey && $this->DonorBloodgroup->FormValue != NULL && $this->DonorBloodgroup->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DonorBloodgroup->caption(), $this->DonorBloodgroup->RequiredErrorMessage));
			}
		}
		if ($this->Tank->Required) {
			if (!$this->Tank->IsDetailKey && $this->Tank->FormValue != NULL && $this->Tank->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
			}
		}
		if ($this->Location->Required) {
			if (!$this->Location->IsDetailKey && $this->Location->FormValue != NULL && $this->Location->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Location->caption(), $this->Location->RequiredErrorMessage));
			}
		}
		if ($this->Volume1->Required) {
			if (!$this->Volume1->IsDetailKey && $this->Volume1->FormValue != NULL && $this->Volume1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume1->caption(), $this->Volume1->RequiredErrorMessage));
			}
		}
		if ($this->Concentration1->Required) {
			if (!$this->Concentration1->IsDetailKey && $this->Concentration1->FormValue != NULL && $this->Concentration1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Concentration1->caption(), $this->Concentration1->RequiredErrorMessage));
			}
		}
		if ($this->Total1->Required) {
			if (!$this->Total1->IsDetailKey && $this->Total1->FormValue != NULL && $this->Total1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total1->caption(), $this->Total1->RequiredErrorMessage));
			}
		}
		if ($this->ProgressiveMotility1->Required) {
			if (!$this->ProgressiveMotility1->IsDetailKey && $this->ProgressiveMotility1->FormValue != NULL && $this->ProgressiveMotility1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProgressiveMotility1->caption(), $this->ProgressiveMotility1->RequiredErrorMessage));
			}
		}
		if ($this->NonProgrssiveMotile1->Required) {
			if (!$this->NonProgrssiveMotile1->IsDetailKey && $this->NonProgrssiveMotile1->FormValue != NULL && $this->NonProgrssiveMotile1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NonProgrssiveMotile1->caption(), $this->NonProgrssiveMotile1->RequiredErrorMessage));
			}
		}
		if ($this->Immotile1->Required) {
			if (!$this->Immotile1->IsDetailKey && $this->Immotile1->FormValue != NULL && $this->Immotile1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Immotile1->caption(), $this->Immotile1->RequiredErrorMessage));
			}
		}
		if ($this->TotalProgrssiveMotile1->Required) {
			if (!$this->TotalProgrssiveMotile1->IsDetailKey && $this->TotalProgrssiveMotile1->FormValue != NULL && $this->TotalProgrssiveMotile1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalProgrssiveMotile1->caption(), $this->TotalProgrssiveMotile1->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}
		if ($this->Color->Required) {
			if (!$this->Color->IsDetailKey && $this->Color->FormValue != NULL && $this->Color->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Color->caption(), $this->Color->RequiredErrorMessage));
			}
		}
		if ($this->DoneBy->Required) {
			if (!$this->DoneBy->IsDetailKey && $this->DoneBy->FormValue != NULL && $this->DoneBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoneBy->caption(), $this->DoneBy->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if (!$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->Abstinence->Required) {
			if (!$this->Abstinence->IsDetailKey && $this->Abstinence->FormValue != NULL && $this->Abstinence->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abstinence->caption(), $this->Abstinence->RequiredErrorMessage));
			}
		}
		if ($this->ProcessedBy->Required) {
			if (!$this->ProcessedBy->IsDetailKey && $this->ProcessedBy->FormValue != NULL && $this->ProcessedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcessedBy->caption(), $this->ProcessedBy->RequiredErrorMessage));
			}
		}
		if ($this->InseminationTime->Required) {
			if (!$this->InseminationTime->IsDetailKey && $this->InseminationTime->FormValue != NULL && $this->InseminationTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InseminationTime->caption(), $this->InseminationTime->RequiredErrorMessage));
			}
		}
		if ($this->InseminationBy->Required) {
			if (!$this->InseminationBy->IsDetailKey && $this->InseminationBy->FormValue != NULL && $this->InseminationBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InseminationBy->caption(), $this->InseminationBy->RequiredErrorMessage));
			}
		}
		if ($this->Big->Required) {
			if (!$this->Big->IsDetailKey && $this->Big->FormValue != NULL && $this->Big->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Big->caption(), $this->Big->RequiredErrorMessage));
			}
		}
		if ($this->Medium->Required) {
			if (!$this->Medium->IsDetailKey && $this->Medium->FormValue != NULL && $this->Medium->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medium->caption(), $this->Medium->RequiredErrorMessage));
			}
		}
		if ($this->Small->Required) {
			if (!$this->Small->IsDetailKey && $this->Small->FormValue != NULL && $this->Small->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Small->caption(), $this->Small->RequiredErrorMessage));
			}
		}
		if ($this->NoHalo->Required) {
			if (!$this->NoHalo->IsDetailKey && $this->NoHalo->FormValue != NULL && $this->NoHalo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoHalo->caption(), $this->NoHalo->RequiredErrorMessage));
			}
		}
		if ($this->Fragmented->Required) {
			if (!$this->Fragmented->IsDetailKey && $this->Fragmented->FormValue != NULL && $this->Fragmented->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fragmented->caption(), $this->Fragmented->RequiredErrorMessage));
			}
		}
		if ($this->NonFragmented->Required) {
			if (!$this->NonFragmented->IsDetailKey && $this->NonFragmented->FormValue != NULL && $this->NonFragmented->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NonFragmented->caption(), $this->NonFragmented->RequiredErrorMessage));
			}
		}
		if ($this->DFI->Required) {
			if (!$this->DFI->IsDetailKey && $this->DFI->FormValue != NULL && $this->DFI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DFI->caption(), $this->DFI->RequiredErrorMessage));
			}
		}
		if ($this->IsueBy->Required) {
			if (!$this->IsueBy->IsDetailKey && $this->IsueBy->FormValue != NULL && $this->IsueBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IsueBy->caption(), $this->IsueBy->RequiredErrorMessage));
			}
		}
		if ($this->Volume2->Required) {
			if (!$this->Volume2->IsDetailKey && $this->Volume2->FormValue != NULL && $this->Volume2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume2->caption(), $this->Volume2->RequiredErrorMessage));
			}
		}
		if ($this->Concentration2->Required) {
			if (!$this->Concentration2->IsDetailKey && $this->Concentration2->FormValue != NULL && $this->Concentration2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Concentration2->caption(), $this->Concentration2->RequiredErrorMessage));
			}
		}
		if ($this->Total2->Required) {
			if (!$this->Total2->IsDetailKey && $this->Total2->FormValue != NULL && $this->Total2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Total2->caption(), $this->Total2->RequiredErrorMessage));
			}
		}
		if ($this->ProgressiveMotility2->Required) {
			if (!$this->ProgressiveMotility2->IsDetailKey && $this->ProgressiveMotility2->FormValue != NULL && $this->ProgressiveMotility2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProgressiveMotility2->caption(), $this->ProgressiveMotility2->RequiredErrorMessage));
			}
		}
		if ($this->NonProgrssiveMotile2->Required) {
			if (!$this->NonProgrssiveMotile2->IsDetailKey && $this->NonProgrssiveMotile2->FormValue != NULL && $this->NonProgrssiveMotile2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NonProgrssiveMotile2->caption(), $this->NonProgrssiveMotile2->RequiredErrorMessage));
			}
		}
		if ($this->Immotile2->Required) {
			if (!$this->Immotile2->IsDetailKey && $this->Immotile2->FormValue != NULL && $this->Immotile2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Immotile2->caption(), $this->Immotile2->RequiredErrorMessage));
			}
		}
		if ($this->TotalProgrssiveMotile2->Required) {
			if (!$this->TotalProgrssiveMotile2->IsDetailKey && $this->TotalProgrssiveMotile2->FormValue != NULL && $this->TotalProgrssiveMotile2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalProgrssiveMotile2->caption(), $this->TotalProgrssiveMotile2->RequiredErrorMessage));
			}
		}
		if ($this->MACS->Required) {
			if ($this->MACS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MACS->caption(), $this->MACS->RequiredErrorMessage));
			}
		}
		if ($this->IssuedBy->Required) {
			if (!$this->IssuedBy->IsDetailKey && $this->IssuedBy->FormValue != NULL && $this->IssuedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IssuedBy->caption(), $this->IssuedBy->RequiredErrorMessage));
			}
		}
		if ($this->IssuedTo->Required) {
			if (!$this->IssuedTo->IsDetailKey && $this->IssuedTo->FormValue != NULL && $this->IssuedTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IssuedTo->caption(), $this->IssuedTo->RequiredErrorMessage));
			}
		}
		if ($this->PaID->Required) {
			if (!$this->PaID->IsDetailKey && $this->PaID->FormValue != NULL && $this->PaID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaID->caption(), $this->PaID->RequiredErrorMessage));
			}
		}
		if ($this->PaName->Required) {
			if (!$this->PaName->IsDetailKey && $this->PaName->FormValue != NULL && $this->PaName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaName->caption(), $this->PaName->RequiredErrorMessage));
			}
		}
		if ($this->PaMobile->Required) {
			if (!$this->PaMobile->IsDetailKey && $this->PaMobile->FormValue != NULL && $this->PaMobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaMobile->caption(), $this->PaMobile->RequiredErrorMessage));
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
		if ($this->PREG_TEST_DATE->Required) {
			if (!$this->PREG_TEST_DATE->IsDetailKey && $this->PREG_TEST_DATE->FormValue != NULL && $this->PREG_TEST_DATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PREG_TEST_DATE->caption(), $this->PREG_TEST_DATE->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->PREG_TEST_DATE->FormValue)) {
			AddMessage($FormError, $this->PREG_TEST_DATE->errorMessage());
		}
		if ($this->SPECIFIC_PROBLEMS->Required) {
			if (!$this->SPECIFIC_PROBLEMS->IsDetailKey && $this->SPECIFIC_PROBLEMS->FormValue != NULL && $this->SPECIFIC_PROBLEMS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SPECIFIC_PROBLEMS->caption(), $this->SPECIFIC_PROBLEMS->RequiredErrorMessage));
			}
		}
		if ($this->IMSC_1->Required) {
			if (!$this->IMSC_1->IsDetailKey && $this->IMSC_1->FormValue != NULL && $this->IMSC_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IMSC_1->caption(), $this->IMSC_1->RequiredErrorMessage));
			}
		}
		if ($this->IMSC_2->Required) {
			if (!$this->IMSC_2->IsDetailKey && $this->IMSC_2->FormValue != NULL && $this->IMSC_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IMSC_2->caption(), $this->IMSC_2->RequiredErrorMessage));
			}
		}
		if ($this->LIQUIFACTION_STORAGE->Required) {
			if (!$this->LIQUIFACTION_STORAGE->IsDetailKey && $this->LIQUIFACTION_STORAGE->FormValue != NULL && $this->LIQUIFACTION_STORAGE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LIQUIFACTION_STORAGE->caption(), $this->LIQUIFACTION_STORAGE->RequiredErrorMessage));
			}
		}
		if ($this->IUI_PREP_METHOD->Required) {
			if (!$this->IUI_PREP_METHOD->IsDetailKey && $this->IUI_PREP_METHOD->FormValue != NULL && $this->IUI_PREP_METHOD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IUI_PREP_METHOD->caption(), $this->IUI_PREP_METHOD->RequiredErrorMessage));
			}
		}
		if ($this->TIME_FROM_TRIGGER->Required) {
			if (!$this->TIME_FROM_TRIGGER->IsDetailKey && $this->TIME_FROM_TRIGGER->FormValue != NULL && $this->TIME_FROM_TRIGGER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TIME_FROM_TRIGGER->caption(), $this->TIME_FROM_TRIGGER->RequiredErrorMessage));
			}
		}
		if ($this->COLLECTION_TO_PREPARATION->Required) {
			if (!$this->COLLECTION_TO_PREPARATION->IsDetailKey && $this->COLLECTION_TO_PREPARATION->FormValue != NULL && $this->COLLECTION_TO_PREPARATION->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COLLECTION_TO_PREPARATION->caption(), $this->COLLECTION_TO_PREPARATION->RequiredErrorMessage));
			}
		}
		if ($this->TIME_FROM_PREP_TO_INSEM->Required) {
			if (!$this->TIME_FROM_PREP_TO_INSEM->IsDetailKey && $this->TIME_FROM_PREP_TO_INSEM->FormValue != NULL && $this->TIME_FROM_PREP_TO_INSEM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TIME_FROM_PREP_TO_INSEM->caption(), $this->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage));
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

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// HusbandName
			$this->HusbandName->setDbValueDef($rsnew, $this->HusbandName->CurrentValue, NULL, $this->HusbandName->ReadOnly);

			// RequestDr
			$this->RequestDr->setDbValueDef($rsnew, $this->RequestDr->CurrentValue, NULL, $this->RequestDr->ReadOnly);

			// CollectionDate
			$this->CollectionDate->setDbValueDef($rsnew, UnFormatDateTime($this->CollectionDate->CurrentValue, 0), NULL, $this->CollectionDate->ReadOnly);

			// ResultDate
			$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, $this->ResultDate->ReadOnly);

			// RequestSample
			$this->RequestSample->setDbValueDef($rsnew, $this->RequestSample->CurrentValue, NULL, $this->RequestSample->ReadOnly);

			// CollectionType
			$this->CollectionType->setDbValueDef($rsnew, $this->CollectionType->CurrentValue, NULL, $this->CollectionType->ReadOnly);

			// CollectionMethod
			$this->CollectionMethod->setDbValueDef($rsnew, $this->CollectionMethod->CurrentValue, NULL, $this->CollectionMethod->ReadOnly);

			// Medicationused
			$this->Medicationused->setDbValueDef($rsnew, $this->Medicationused->CurrentValue, NULL, $this->Medicationused->ReadOnly);

			// DifficultiesinCollection
			$this->DifficultiesinCollection->setDbValueDef($rsnew, $this->DifficultiesinCollection->CurrentValue, NULL, $this->DifficultiesinCollection->ReadOnly);

			// pH
			$this->pH->setDbValueDef($rsnew, $this->pH->CurrentValue, NULL, $this->pH->ReadOnly);

			// Timeofcollection
			$this->Timeofcollection->setDbValueDef($rsnew, $this->Timeofcollection->CurrentValue, NULL, $this->Timeofcollection->ReadOnly);

			// Timeofexamination
			$this->Timeofexamination->setDbValueDef($rsnew, $this->Timeofexamination->CurrentValue, NULL, $this->Timeofexamination->ReadOnly);

			// Volume
			$this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, NULL, $this->Volume->ReadOnly);

			// Concentration
			$this->Concentration->setDbValueDef($rsnew, $this->Concentration->CurrentValue, NULL, $this->Concentration->ReadOnly);

			// Total
			$this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, NULL, $this->Total->ReadOnly);

			// ProgressiveMotility
			$this->ProgressiveMotility->setDbValueDef($rsnew, $this->ProgressiveMotility->CurrentValue, NULL, $this->ProgressiveMotility->ReadOnly);

			// NonProgrssiveMotile
			$this->NonProgrssiveMotile->setDbValueDef($rsnew, $this->NonProgrssiveMotile->CurrentValue, NULL, $this->NonProgrssiveMotile->ReadOnly);

			// Immotile
			$this->Immotile->setDbValueDef($rsnew, $this->Immotile->CurrentValue, NULL, $this->Immotile->ReadOnly);

			// TotalProgrssiveMotile
			$this->TotalProgrssiveMotile->setDbValueDef($rsnew, $this->TotalProgrssiveMotile->CurrentValue, NULL, $this->TotalProgrssiveMotile->ReadOnly);

			// Appearance
			$this->Appearance->setDbValueDef($rsnew, $this->Appearance->CurrentValue, NULL, $this->Appearance->ReadOnly);

			// Homogenosity
			$this->Homogenosity->setDbValueDef($rsnew, $this->Homogenosity->CurrentValue, NULL, $this->Homogenosity->ReadOnly);

			// CompleteSample
			$this->CompleteSample->setDbValueDef($rsnew, $this->CompleteSample->CurrentValue, NULL, $this->CompleteSample->ReadOnly);

			// Liquefactiontime
			$this->Liquefactiontime->setDbValueDef($rsnew, $this->Liquefactiontime->CurrentValue, NULL, $this->Liquefactiontime->ReadOnly);

			// Normal
			$this->Normal->setDbValueDef($rsnew, $this->Normal->CurrentValue, NULL, $this->Normal->ReadOnly);

			// Abnormal
			$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, NULL, $this->Abnormal->ReadOnly);

			// Headdefects
			$this->Headdefects->setDbValueDef($rsnew, $this->Headdefects->CurrentValue, NULL, $this->Headdefects->ReadOnly);

			// MidpieceDefects
			$this->MidpieceDefects->setDbValueDef($rsnew, $this->MidpieceDefects->CurrentValue, NULL, $this->MidpieceDefects->ReadOnly);

			// TailDefects
			$this->TailDefects->setDbValueDef($rsnew, $this->TailDefects->CurrentValue, NULL, $this->TailDefects->ReadOnly);

			// NormalProgMotile
			$this->NormalProgMotile->setDbValueDef($rsnew, $this->NormalProgMotile->CurrentValue, NULL, $this->NormalProgMotile->ReadOnly);

			// ImmatureForms
			$this->ImmatureForms->setDbValueDef($rsnew, $this->ImmatureForms->CurrentValue, NULL, $this->ImmatureForms->ReadOnly);

			// Leucocytes
			$this->Leucocytes->setDbValueDef($rsnew, $this->Leucocytes->CurrentValue, NULL, $this->Leucocytes->ReadOnly);

			// Agglutination
			$this->Agglutination->setDbValueDef($rsnew, $this->Agglutination->CurrentValue, NULL, $this->Agglutination->ReadOnly);

			// Debris
			$this->Debris->setDbValueDef($rsnew, $this->Debris->CurrentValue, NULL, $this->Debris->ReadOnly);

			// Diagnosis
			$this->Diagnosis->setDbValueDef($rsnew, $this->Diagnosis->CurrentValue, NULL, $this->Diagnosis->ReadOnly);

			// Observations
			$this->Observations->setDbValueDef($rsnew, $this->Observations->CurrentValue, NULL, $this->Observations->ReadOnly);

			// Signature
			$this->Signature->setDbValueDef($rsnew, $this->Signature->CurrentValue, NULL, $this->Signature->ReadOnly);

			// SemenOrgin
			$this->SemenOrgin->setDbValueDef($rsnew, $this->SemenOrgin->CurrentValue, NULL, $this->SemenOrgin->ReadOnly);

			// Donor
			$this->Donor->setDbValueDef($rsnew, $this->Donor->CurrentValue, NULL, $this->Donor->ReadOnly);

			// DonorBloodgroup
			$this->DonorBloodgroup->setDbValueDef($rsnew, $this->DonorBloodgroup->CurrentValue, NULL, $this->DonorBloodgroup->ReadOnly);

			// Tank
			$this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, NULL, $this->Tank->ReadOnly);

			// Location
			$this->Location->setDbValueDef($rsnew, $this->Location->CurrentValue, NULL, $this->Location->ReadOnly);

			// Volume1
			$this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, NULL, $this->Volume1->ReadOnly);

			// Concentration1
			$this->Concentration1->setDbValueDef($rsnew, $this->Concentration1->CurrentValue, NULL, $this->Concentration1->ReadOnly);

			// Total1
			$this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, NULL, $this->Total1->ReadOnly);

			// ProgressiveMotility1
			$this->ProgressiveMotility1->setDbValueDef($rsnew, $this->ProgressiveMotility1->CurrentValue, NULL, $this->ProgressiveMotility1->ReadOnly);

			// NonProgrssiveMotile1
			$this->NonProgrssiveMotile1->setDbValueDef($rsnew, $this->NonProgrssiveMotile1->CurrentValue, NULL, $this->NonProgrssiveMotile1->ReadOnly);

			// Immotile1
			$this->Immotile1->setDbValueDef($rsnew, $this->Immotile1->CurrentValue, NULL, $this->Immotile1->ReadOnly);

			// TotalProgrssiveMotile1
			$this->TotalProgrssiveMotile1->setDbValueDef($rsnew, $this->TotalProgrssiveMotile1->CurrentValue, NULL, $this->TotalProgrssiveMotile1->ReadOnly);

			// TidNo
			$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, $this->TidNo->ReadOnly);

			// Color
			$this->Color->setDbValueDef($rsnew, $this->Color->CurrentValue, NULL, $this->Color->ReadOnly);

			// DoneBy
			$this->DoneBy->setDbValueDef($rsnew, $this->DoneBy->CurrentValue, NULL, $this->DoneBy->ReadOnly);

			// Method
			$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, $this->Method->ReadOnly);

			// Abstinence
			$this->Abstinence->setDbValueDef($rsnew, $this->Abstinence->CurrentValue, NULL, $this->Abstinence->ReadOnly);

			// ProcessedBy
			$this->ProcessedBy->setDbValueDef($rsnew, $this->ProcessedBy->CurrentValue, NULL, $this->ProcessedBy->ReadOnly);

			// InseminationTime
			$this->InseminationTime->setDbValueDef($rsnew, $this->InseminationTime->CurrentValue, NULL, $this->InseminationTime->ReadOnly);

			// InseminationBy
			$this->InseminationBy->setDbValueDef($rsnew, $this->InseminationBy->CurrentValue, NULL, $this->InseminationBy->ReadOnly);

			// Big
			$this->Big->setDbValueDef($rsnew, $this->Big->CurrentValue, NULL, $this->Big->ReadOnly);

			// Medium
			$this->Medium->setDbValueDef($rsnew, $this->Medium->CurrentValue, NULL, $this->Medium->ReadOnly);

			// Small
			$this->Small->setDbValueDef($rsnew, $this->Small->CurrentValue, NULL, $this->Small->ReadOnly);

			// NoHalo
			$this->NoHalo->setDbValueDef($rsnew, $this->NoHalo->CurrentValue, NULL, $this->NoHalo->ReadOnly);

			// Fragmented
			$this->Fragmented->setDbValueDef($rsnew, $this->Fragmented->CurrentValue, NULL, $this->Fragmented->ReadOnly);

			// NonFragmented
			$this->NonFragmented->setDbValueDef($rsnew, $this->NonFragmented->CurrentValue, NULL, $this->NonFragmented->ReadOnly);

			// DFI
			$this->DFI->setDbValueDef($rsnew, $this->DFI->CurrentValue, NULL, $this->DFI->ReadOnly);

			// IsueBy
			$this->IsueBy->setDbValueDef($rsnew, $this->IsueBy->CurrentValue, NULL, $this->IsueBy->ReadOnly);

			// Volume2
			$this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, NULL, $this->Volume2->ReadOnly);

			// Concentration2
			$this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, NULL, $this->Concentration2->ReadOnly);

			// Total2
			$this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, NULL, $this->Total2->ReadOnly);

			// ProgressiveMotility2
			$this->ProgressiveMotility2->setDbValueDef($rsnew, $this->ProgressiveMotility2->CurrentValue, NULL, $this->ProgressiveMotility2->ReadOnly);

			// NonProgrssiveMotile2
			$this->NonProgrssiveMotile2->setDbValueDef($rsnew, $this->NonProgrssiveMotile2->CurrentValue, NULL, $this->NonProgrssiveMotile2->ReadOnly);

			// Immotile2
			$this->Immotile2->setDbValueDef($rsnew, $this->Immotile2->CurrentValue, NULL, $this->Immotile2->ReadOnly);

			// TotalProgrssiveMotile2
			$this->TotalProgrssiveMotile2->setDbValueDef($rsnew, $this->TotalProgrssiveMotile2->CurrentValue, NULL, $this->TotalProgrssiveMotile2->ReadOnly);

			// MACS
			$this->MACS->setDbValueDef($rsnew, $this->MACS->CurrentValue, NULL, $this->MACS->ReadOnly);

			// IssuedBy
			$this->IssuedBy->setDbValueDef($rsnew, $this->IssuedBy->CurrentValue, NULL, $this->IssuedBy->ReadOnly);

			// IssuedTo
			$this->IssuedTo->setDbValueDef($rsnew, $this->IssuedTo->CurrentValue, NULL, $this->IssuedTo->ReadOnly);

			// PaID
			$this->PaID->setDbValueDef($rsnew, $this->PaID->CurrentValue, NULL, $this->PaID->ReadOnly);

			// PaName
			$this->PaName->setDbValueDef($rsnew, $this->PaName->CurrentValue, NULL, $this->PaName->ReadOnly);

			// PaMobile
			$this->PaMobile->setDbValueDef($rsnew, $this->PaMobile->CurrentValue, NULL, $this->PaMobile->ReadOnly);

			// PartnerID
			$this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, NULL, $this->PartnerID->ReadOnly);

			// PartnerName
			$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, $this->PartnerName->ReadOnly);

			// PartnerMobile
			$this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, NULL, $this->PartnerMobile->ReadOnly);

			// PREG_TEST_DATE
			$this->PREG_TEST_DATE->setDbValueDef($rsnew, UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0), NULL, $this->PREG_TEST_DATE->ReadOnly);

			// SPECIFIC_PROBLEMS
			$this->SPECIFIC_PROBLEMS->setDbValueDef($rsnew, $this->SPECIFIC_PROBLEMS->CurrentValue, NULL, $this->SPECIFIC_PROBLEMS->ReadOnly);

			// IMSC_1
			$this->IMSC_1->setDbValueDef($rsnew, $this->IMSC_1->CurrentValue, NULL, $this->IMSC_1->ReadOnly);

			// IMSC_2
			$this->IMSC_2->setDbValueDef($rsnew, $this->IMSC_2->CurrentValue, NULL, $this->IMSC_2->ReadOnly);

			// LIQUIFACTION_STORAGE
			$this->LIQUIFACTION_STORAGE->setDbValueDef($rsnew, $this->LIQUIFACTION_STORAGE->CurrentValue, NULL, $this->LIQUIFACTION_STORAGE->ReadOnly);

			// IUI_PREP_METHOD
			$this->IUI_PREP_METHOD->setDbValueDef($rsnew, $this->IUI_PREP_METHOD->CurrentValue, NULL, $this->IUI_PREP_METHOD->ReadOnly);

			// TIME_FROM_TRIGGER
			$this->TIME_FROM_TRIGGER->setDbValueDef($rsnew, $this->TIME_FROM_TRIGGER->CurrentValue, NULL, $this->TIME_FROM_TRIGGER->ReadOnly);

			// COLLECTION_TO_PREPARATION
			$this->COLLECTION_TO_PREPARATION->setDbValueDef($rsnew, $this->COLLECTION_TO_PREPARATION->CurrentValue, NULL, $this->COLLECTION_TO_PREPARATION->ReadOnly);

			// TIME_FROM_PREP_TO_INSEM
			$this->TIME_FROM_PREP_TO_INSEM->setDbValueDef($rsnew, $this->TIME_FROM_PREP_TO_INSEM->CurrentValue, NULL, $this->TIME_FROM_PREP_TO_INSEM->ReadOnly);

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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("PatientName"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setQueryStringValue($parm);
					$this->PatientName->setQueryStringValue($GLOBALS["view_ivf_treatment"]->Name->QueryStringValue);
					$this->PatientName->setSessionValue($this->PatientName->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("PatientName"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setQueryStringValue($parm);
					$this->PatientName->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->Name->QueryStringValue);
					$this->PatientName->setSessionValue($this->PatientName->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue))
						$validMaster = FALSE;
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["view_ivf_treatment"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("PatientName"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setFormValue($parm);
					$this->PatientName->setFormValue($GLOBALS["view_ivf_treatment"]->Name->FormValue);
					$this->PatientName->setSessionValue($this->PatientName->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("PatientName"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setFormValue($parm);
					$this->PatientName->setFormValue($GLOBALS["ivf_treatment_plan"]->Name->FormValue);
					$this->PatientName->setSessionValue($this->PatientName->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["ivf_treatment_plan"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->FormValue))
						$validMaster = FALSE;
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
			if ($masterTblVar != "view_ivf_treatment") {
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->PatientName->CurrentValue == "")
					$this->PatientName->setSessionValue("");
			}
			if ($masterTblVar != "ivf_treatment_plan") {
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->PatientName->CurrentValue == "")
					$this->PatientName->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_semenanalysisreportlist.php"), "", $this->TableVar, TRUE);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>
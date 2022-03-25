<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class view_billing_voucher_print_edit extends view_billing_voucher_print
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_billing_voucher_print';

	// Page object name
	public $PageObjName = "view_billing_voucher_print_edit";

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

		// Table object (view_billing_voucher_print)
		if (!isset($GLOBALS["view_billing_voucher_print"]) || get_class($GLOBALS["view_billing_voucher_print"]) == PROJECT_NAMESPACE . "view_billing_voucher_print") {
			$GLOBALS["view_billing_voucher_print"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_billing_voucher_print"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_billing_voucher_print');

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
		global $view_billing_voucher_print;
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
				$doc = new $class($view_billing_voucher_print);
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
					if ($pageName == "view_billing_voucher_printview.php")
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
					$this->terminate(GetUrl("view_billing_voucher_printlist.php"));
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
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->Mobile->setVisibility();
		$this->IP_OP->setVisibility();
		$this->Doctor->setVisibility();
		$this->voucher_type->setVisibility();
		$this->Details->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->RealizationAmount->setVisibility();
		$this->RealizationStatus->setVisibility();
		$this->RealizationRemarks->setVisibility();
		$this->RealizationBatchNo->setVisibility();
		$this->RealizationDate->setVisibility();
		$this->HospID->setVisibility();
		$this->RIDNO->setVisibility();
		$this->TidNo->setVisibility();
		$this->CId->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PayerType->setVisibility();
		$this->Dob->setVisibility();
		$this->Currency->setVisibility();
		$this->DiscountRemarks->setVisibility();
		$this->Remarks->setVisibility();
		$this->PatId->setVisibility();
		$this->DrDepartment->setVisibility();
		$this->RefferedBy->setVisibility();
		$this->BillNumber->setVisibility();
		$this->CardNumber->setVisibility();
		$this->BankName->setVisibility();
		$this->DrID->setVisibility();
		$this->BillStatus->setVisibility();
		$this->ReportHeader->setVisibility();
		$this->UserName->setVisibility();
		$this->AdjustmentAdvance->setVisibility();
		$this->billing_vouchercol->setVisibility();
		$this->BillType->setVisibility();
		$this->ProcedureName->setVisibility();
		$this->ProcedureAmount->setVisibility();
		$this->IncludePackage->setVisibility();
		$this->CancelBill->setVisibility();
		$this->CancelReason->setVisibility();
		$this->CancelModeOfPayment->setVisibility();
		$this->CancelAmount->setVisibility();
		$this->CancelBankName->setVisibility();
		$this->CancelTransactionNumber->setVisibility();
		$this->LabTest->setVisibility();
		$this->sid->setVisibility();
		$this->SidNo->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->PatientName->Required = FALSE;
		$this->Amount->Required = FALSE;

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
		$this->setupLookupOptions($this->Reception);
		$this->setupLookupOptions($this->ModeofPayment);
		$this->setupLookupOptions($this->RIDNO);
		$this->setupLookupOptions($this->CId);
		$this->setupLookupOptions($this->PatId);
		$this->setupLookupOptions($this->RefferedBy);
		$this->setupLookupOptions($this->DrID);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("view_billing_voucher_printlist.php");
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
					$this->terminate("view_billing_voucher_printlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				$returnUrl = $this->GetViewUrl();
				if (GetPageName($returnUrl) == "view_billing_voucher_printlist.php")
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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}

		// Check field name 'IP_OP' first before field var 'x_IP_OP'
		$val = $CurrentForm->hasValue("IP_OP") ? $CurrentForm->getValue("IP_OP") : $CurrentForm->getValue("x_IP_OP");
		if (!$this->IP_OP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IP_OP->Visible = FALSE; // Disable update for API request
			else
				$this->IP_OP->setFormValue($val);
		}

		// Check field name 'Doctor' first before field var 'x_Doctor'
		$val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
		if (!$this->Doctor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Doctor->Visible = FALSE; // Disable update for API request
			else
				$this->Doctor->setFormValue($val);
		}

		// Check field name 'voucher_type' first before field var 'x_voucher_type'
		$val = $CurrentForm->hasValue("voucher_type") ? $CurrentForm->getValue("voucher_type") : $CurrentForm->getValue("x_voucher_type");
		if (!$this->voucher_type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->voucher_type->Visible = FALSE; // Disable update for API request
			else
				$this->voucher_type->setFormValue($val);
		}

		// Check field name 'Details' first before field var 'x_Details'
		$val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
		if (!$this->Details->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Details->Visible = FALSE; // Disable update for API request
			else
				$this->Details->setFormValue($val);
		}

		// Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
		$val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
		if (!$this->ModeofPayment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModeofPayment->Visible = FALSE; // Disable update for API request
			else
				$this->ModeofPayment->setFormValue($val);
		}

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}

		// Check field name 'AnyDues' first before field var 'x_AnyDues'
		$val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
		if (!$this->AnyDues->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnyDues->Visible = FALSE; // Disable update for API request
			else
				$this->AnyDues->setFormValue($val);
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

		// Check field name 'RealizationAmount' first before field var 'x_RealizationAmount'
		$val = $CurrentForm->hasValue("RealizationAmount") ? $CurrentForm->getValue("RealizationAmount") : $CurrentForm->getValue("x_RealizationAmount");
		if (!$this->RealizationAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RealizationAmount->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationAmount->setFormValue($val);
		}

		// Check field name 'RealizationStatus' first before field var 'x_RealizationStatus'
		$val = $CurrentForm->hasValue("RealizationStatus") ? $CurrentForm->getValue("RealizationStatus") : $CurrentForm->getValue("x_RealizationStatus");
		if (!$this->RealizationStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RealizationStatus->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationStatus->setFormValue($val);
		}

		// Check field name 'RealizationRemarks' first before field var 'x_RealizationRemarks'
		$val = $CurrentForm->hasValue("RealizationRemarks") ? $CurrentForm->getValue("RealizationRemarks") : $CurrentForm->getValue("x_RealizationRemarks");
		if (!$this->RealizationRemarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RealizationRemarks->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationRemarks->setFormValue($val);
		}

		// Check field name 'RealizationBatchNo' first before field var 'x_RealizationBatchNo'
		$val = $CurrentForm->hasValue("RealizationBatchNo") ? $CurrentForm->getValue("RealizationBatchNo") : $CurrentForm->getValue("x_RealizationBatchNo");
		if (!$this->RealizationBatchNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RealizationBatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationBatchNo->setFormValue($val);
		}

		// Check field name 'RealizationDate' first before field var 'x_RealizationDate'
		$val = $CurrentForm->hasValue("RealizationDate") ? $CurrentForm->getValue("RealizationDate") : $CurrentForm->getValue("x_RealizationDate");
		if (!$this->RealizationDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RealizationDate->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationDate->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'CId' first before field var 'x_CId'
		$val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
		if (!$this->CId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CId->Visible = FALSE; // Disable update for API request
			else
				$this->CId->setFormValue($val);
		}

		// Check field name 'PartnerName' first before field var 'x_PartnerName'
		$val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
		if (!$this->PartnerName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerName->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerName->setFormValue($val);
		}

		// Check field name 'PayerType' first before field var 'x_PayerType'
		$val = $CurrentForm->hasValue("PayerType") ? $CurrentForm->getValue("PayerType") : $CurrentForm->getValue("x_PayerType");
		if (!$this->PayerType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PayerType->Visible = FALSE; // Disable update for API request
			else
				$this->PayerType->setFormValue($val);
		}

		// Check field name 'Dob' first before field var 'x_Dob'
		$val = $CurrentForm->hasValue("Dob") ? $CurrentForm->getValue("Dob") : $CurrentForm->getValue("x_Dob");
		if (!$this->Dob->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Dob->Visible = FALSE; // Disable update for API request
			else
				$this->Dob->setFormValue($val);
		}

		// Check field name 'Currency' first before field var 'x_Currency'
		$val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
		if (!$this->Currency->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Currency->Visible = FALSE; // Disable update for API request
			else
				$this->Currency->setFormValue($val);
		}

		// Check field name 'DiscountRemarks' first before field var 'x_DiscountRemarks'
		$val = $CurrentForm->hasValue("DiscountRemarks") ? $CurrentForm->getValue("DiscountRemarks") : $CurrentForm->getValue("x_DiscountRemarks");
		if (!$this->DiscountRemarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DiscountRemarks->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountRemarks->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'PatId' first before field var 'x_PatId'
		$val = $CurrentForm->hasValue("PatId") ? $CurrentForm->getValue("PatId") : $CurrentForm->getValue("x_PatId");
		if (!$this->PatId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatId->Visible = FALSE; // Disable update for API request
			else
				$this->PatId->setFormValue($val);
		}

		// Check field name 'DrDepartment' first before field var 'x_DrDepartment'
		$val = $CurrentForm->hasValue("DrDepartment") ? $CurrentForm->getValue("DrDepartment") : $CurrentForm->getValue("x_DrDepartment");
		if (!$this->DrDepartment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrDepartment->Visible = FALSE; // Disable update for API request
			else
				$this->DrDepartment->setFormValue($val);
		}

		// Check field name 'RefferedBy' first before field var 'x_RefferedBy'
		$val = $CurrentForm->hasValue("RefferedBy") ? $CurrentForm->getValue("RefferedBy") : $CurrentForm->getValue("x_RefferedBy");
		if (!$this->RefferedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RefferedBy->Visible = FALSE; // Disable update for API request
			else
				$this->RefferedBy->setFormValue($val);
		}

		// Check field name 'BillNumber' first before field var 'x_BillNumber'
		$val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
		if (!$this->BillNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->BillNumber->setFormValue($val);
		}

		// Check field name 'CardNumber' first before field var 'x_CardNumber'
		$val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
		if (!$this->CardNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CardNumber->Visible = FALSE; // Disable update for API request
			else
				$this->CardNumber->setFormValue($val);
		}

		// Check field name 'BankName' first before field var 'x_BankName'
		$val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
		if (!$this->BankName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BankName->Visible = FALSE; // Disable update for API request
			else
				$this->BankName->setFormValue($val);
		}

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}

		// Check field name 'BillStatus' first before field var 'x_BillStatus'
		$val = $CurrentForm->hasValue("BillStatus") ? $CurrentForm->getValue("BillStatus") : $CurrentForm->getValue("x_BillStatus");
		if (!$this->BillStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillStatus->Visible = FALSE; // Disable update for API request
			else
				$this->BillStatus->setFormValue($val);
		}

		// Check field name 'ReportHeader' first before field var 'x_ReportHeader'
		$val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
		if (!$this->ReportHeader->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReportHeader->Visible = FALSE; // Disable update for API request
			else
				$this->ReportHeader->setFormValue($val);
		}

		// Check field name 'UserName' first before field var 'x_UserName'
		$val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x_UserName");
		if (!$this->UserName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserName->Visible = FALSE; // Disable update for API request
			else
				$this->UserName->setFormValue($val);
		}

		// Check field name 'AdjustmentAdvance' first before field var 'x_AdjustmentAdvance'
		$val = $CurrentForm->hasValue("AdjustmentAdvance") ? $CurrentForm->getValue("AdjustmentAdvance") : $CurrentForm->getValue("x_AdjustmentAdvance");
		if (!$this->AdjustmentAdvance->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AdjustmentAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->AdjustmentAdvance->setFormValue($val);
		}

		// Check field name 'billing_vouchercol' first before field var 'x_billing_vouchercol'
		$val = $CurrentForm->hasValue("billing_vouchercol") ? $CurrentForm->getValue("billing_vouchercol") : $CurrentForm->getValue("x_billing_vouchercol");
		if (!$this->billing_vouchercol->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->billing_vouchercol->Visible = FALSE; // Disable update for API request
			else
				$this->billing_vouchercol->setFormValue($val);
		}

		// Check field name 'BillType' first before field var 'x_BillType'
		$val = $CurrentForm->hasValue("BillType") ? $CurrentForm->getValue("BillType") : $CurrentForm->getValue("x_BillType");
		if (!$this->BillType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillType->Visible = FALSE; // Disable update for API request
			else
				$this->BillType->setFormValue($val);
		}

		// Check field name 'ProcedureName' first before field var 'x_ProcedureName'
		$val = $CurrentForm->hasValue("ProcedureName") ? $CurrentForm->getValue("ProcedureName") : $CurrentForm->getValue("x_ProcedureName");
		if (!$this->ProcedureName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProcedureName->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureName->setFormValue($val);
		}

		// Check field name 'ProcedureAmount' first before field var 'x_ProcedureAmount'
		$val = $CurrentForm->hasValue("ProcedureAmount") ? $CurrentForm->getValue("ProcedureAmount") : $CurrentForm->getValue("x_ProcedureAmount");
		if (!$this->ProcedureAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ProcedureAmount->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureAmount->setFormValue($val);
		}

		// Check field name 'IncludePackage' first before field var 'x_IncludePackage'
		$val = $CurrentForm->hasValue("IncludePackage") ? $CurrentForm->getValue("IncludePackage") : $CurrentForm->getValue("x_IncludePackage");
		if (!$this->IncludePackage->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IncludePackage->Visible = FALSE; // Disable update for API request
			else
				$this->IncludePackage->setFormValue($val);
		}

		// Check field name 'CancelBill' first before field var 'x_CancelBill'
		$val = $CurrentForm->hasValue("CancelBill") ? $CurrentForm->getValue("CancelBill") : $CurrentForm->getValue("x_CancelBill");
		if (!$this->CancelBill->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CancelBill->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBill->setFormValue($val);
		}

		// Check field name 'CancelReason' first before field var 'x_CancelReason'
		$val = $CurrentForm->hasValue("CancelReason") ? $CurrentForm->getValue("CancelReason") : $CurrentForm->getValue("x_CancelReason");
		if (!$this->CancelReason->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CancelReason->Visible = FALSE; // Disable update for API request
			else
				$this->CancelReason->setFormValue($val);
		}

		// Check field name 'CancelModeOfPayment' first before field var 'x_CancelModeOfPayment'
		$val = $CurrentForm->hasValue("CancelModeOfPayment") ? $CurrentForm->getValue("CancelModeOfPayment") : $CurrentForm->getValue("x_CancelModeOfPayment");
		if (!$this->CancelModeOfPayment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CancelModeOfPayment->Visible = FALSE; // Disable update for API request
			else
				$this->CancelModeOfPayment->setFormValue($val);
		}

		// Check field name 'CancelAmount' first before field var 'x_CancelAmount'
		$val = $CurrentForm->hasValue("CancelAmount") ? $CurrentForm->getValue("CancelAmount") : $CurrentForm->getValue("x_CancelAmount");
		if (!$this->CancelAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CancelAmount->Visible = FALSE; // Disable update for API request
			else
				$this->CancelAmount->setFormValue($val);
		}

		// Check field name 'CancelBankName' first before field var 'x_CancelBankName'
		$val = $CurrentForm->hasValue("CancelBankName") ? $CurrentForm->getValue("CancelBankName") : $CurrentForm->getValue("x_CancelBankName");
		if (!$this->CancelBankName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CancelBankName->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBankName->setFormValue($val);
		}

		// Check field name 'CancelTransactionNumber' first before field var 'x_CancelTransactionNumber'
		$val = $CurrentForm->hasValue("CancelTransactionNumber") ? $CurrentForm->getValue("CancelTransactionNumber") : $CurrentForm->getValue("x_CancelTransactionNumber");
		if (!$this->CancelTransactionNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CancelTransactionNumber->Visible = FALSE; // Disable update for API request
			else
				$this->CancelTransactionNumber->setFormValue($val);
		}

		// Check field name 'LabTest' first before field var 'x_LabTest'
		$val = $CurrentForm->hasValue("LabTest") ? $CurrentForm->getValue("LabTest") : $CurrentForm->getValue("x_LabTest");
		if (!$this->LabTest->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LabTest->Visible = FALSE; // Disable update for API request
			else
				$this->LabTest->setFormValue($val);
		}

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}

		// Check field name 'SidNo' first before field var 'x_SidNo'
		$val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
		if (!$this->SidNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SidNo->Visible = FALSE; // Disable update for API request
			else
				$this->SidNo->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->IP_OP->CurrentValue = $this->IP_OP->FormValue;
		$this->Doctor->CurrentValue = $this->Doctor->FormValue;
		$this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
		$this->RealizationStatus->CurrentValue = $this->RealizationStatus->FormValue;
		$this->RealizationRemarks->CurrentValue = $this->RealizationRemarks->FormValue;
		$this->RealizationBatchNo->CurrentValue = $this->RealizationBatchNo->FormValue;
		$this->RealizationDate->CurrentValue = $this->RealizationDate->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->CId->CurrentValue = $this->CId->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PayerType->CurrentValue = $this->PayerType->FormValue;
		$this->Dob->CurrentValue = $this->Dob->FormValue;
		$this->Currency->CurrentValue = $this->Currency->FormValue;
		$this->DiscountRemarks->CurrentValue = $this->DiscountRemarks->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->PatId->CurrentValue = $this->PatId->FormValue;
		$this->DrDepartment->CurrentValue = $this->DrDepartment->FormValue;
		$this->RefferedBy->CurrentValue = $this->RefferedBy->FormValue;
		$this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
		$this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
		$this->UserName->CurrentValue = $this->UserName->FormValue;
		$this->AdjustmentAdvance->CurrentValue = $this->AdjustmentAdvance->FormValue;
		$this->billing_vouchercol->CurrentValue = $this->billing_vouchercol->FormValue;
		$this->BillType->CurrentValue = $this->BillType->FormValue;
		$this->ProcedureName->CurrentValue = $this->ProcedureName->FormValue;
		$this->ProcedureAmount->CurrentValue = $this->ProcedureAmount->FormValue;
		$this->IncludePackage->CurrentValue = $this->IncludePackage->FormValue;
		$this->CancelBill->CurrentValue = $this->CancelBill->FormValue;
		$this->CancelReason->CurrentValue = $this->CancelReason->FormValue;
		$this->CancelModeOfPayment->CurrentValue = $this->CancelModeOfPayment->FormValue;
		$this->CancelAmount->CurrentValue = $this->CancelAmount->FormValue;
		$this->CancelBankName->CurrentValue = $this->CancelBankName->FormValue;
		$this->CancelTransactionNumber->CurrentValue = $this->CancelTransactionNumber->FormValue;
		$this->LabTest->CurrentValue = $this->LabTest->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->SidNo->CurrentValue = $this->SidNo->FormValue;
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
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->IP_OP->setDbValue($row['IP_OP']);
		$this->Doctor->setDbValue($row['Doctor']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->RealizationAmount->setDbValue($row['RealizationAmount']);
		$this->RealizationStatus->setDbValue($row['RealizationStatus']);
		$this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
		$this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
		$this->RealizationDate->setDbValue($row['RealizationDate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->CId->setDbValue($row['CId']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PayerType->setDbValue($row['PayerType']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Currency->setDbValue($row['Currency']);
		$this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->PatId->setDbValue($row['PatId']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->RefferedBy->setDbValue($row['RefferedBy']);
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->DrID->setDbValue($row['DrID']);
		$this->BillStatus->setDbValue($row['BillStatus']);
		$this->ReportHeader->setDbValue($row['ReportHeader']);
		$this->UserName->setDbValue($row['UserName']);
		$this->AdjustmentAdvance->setDbValue($row['AdjustmentAdvance']);
		$this->billing_vouchercol->setDbValue($row['billing_vouchercol']);
		$this->BillType->setDbValue($row['BillType']);
		$this->ProcedureName->setDbValue($row['ProcedureName']);
		$this->ProcedureAmount->setDbValue($row['ProcedureAmount']);
		$this->IncludePackage->setDbValue($row['IncludePackage']);
		$this->CancelBill->setDbValue($row['CancelBill']);
		$this->CancelReason->setDbValue($row['CancelReason']);
		$this->CancelModeOfPayment->setDbValue($row['CancelModeOfPayment']);
		$this->CancelAmount->setDbValue($row['CancelAmount']);
		$this->CancelBankName->setDbValue($row['CancelBankName']);
		$this->CancelTransactionNumber->setDbValue($row['CancelTransactionNumber']);
		$this->LabTest->setDbValue($row['LabTest']);
		$this->sid->setDbValue($row['sid']);
		$this->SidNo->setDbValue($row['SidNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientId'] = NULL;
		$row['mrnno'] = NULL;
		$row['PatientName'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['Mobile'] = NULL;
		$row['IP_OP'] = NULL;
		$row['Doctor'] = NULL;
		$row['voucher_type'] = NULL;
		$row['Details'] = NULL;
		$row['ModeofPayment'] = NULL;
		$row['Amount'] = NULL;
		$row['AnyDues'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['RealizationAmount'] = NULL;
		$row['RealizationStatus'] = NULL;
		$row['RealizationRemarks'] = NULL;
		$row['RealizationBatchNo'] = NULL;
		$row['RealizationDate'] = NULL;
		$row['HospID'] = NULL;
		$row['RIDNO'] = NULL;
		$row['TidNo'] = NULL;
		$row['CId'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PayerType'] = NULL;
		$row['Dob'] = NULL;
		$row['Currency'] = NULL;
		$row['DiscountRemarks'] = NULL;
		$row['Remarks'] = NULL;
		$row['PatId'] = NULL;
		$row['DrDepartment'] = NULL;
		$row['RefferedBy'] = NULL;
		$row['BillNumber'] = NULL;
		$row['CardNumber'] = NULL;
		$row['BankName'] = NULL;
		$row['DrID'] = NULL;
		$row['BillStatus'] = NULL;
		$row['ReportHeader'] = NULL;
		$row['UserName'] = NULL;
		$row['AdjustmentAdvance'] = NULL;
		$row['billing_vouchercol'] = NULL;
		$row['BillType'] = NULL;
		$row['ProcedureName'] = NULL;
		$row['ProcedureAmount'] = NULL;
		$row['IncludePackage'] = NULL;
		$row['CancelBill'] = NULL;
		$row['CancelReason'] = NULL;
		$row['CancelModeOfPayment'] = NULL;
		$row['CancelAmount'] = NULL;
		$row['CancelBankName'] = NULL;
		$row['CancelTransactionNumber'] = NULL;
		$row['LabTest'] = NULL;
		$row['sid'] = NULL;
		$row['SidNo'] = NULL;
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

		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue)))
			$this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProcedureAmount->FormValue == $this->ProcedureAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProcedureAmount->CurrentValue)))
			$this->ProcedureAmount->CurrentValue = ConvertToFloatString($this->ProcedureAmount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// PatientId
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Mobile
		// IP_OP
		// Doctor
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// HospID
		// RIDNO
		// TidNo
		// CId
		// PartnerName
		// PayerType
		// Dob
		// Currency
		// DiscountRemarks
		// Remarks
		// PatId
		// DrDepartment
		// RefferedBy
		// BillNumber
		// CardNumber
		// BankName
		// DrID
		// BillStatus
		// ReportHeader
		// UserName
		// AdjustmentAdvance
		// billing_vouchercol
		// BillType
		// ProcedureName
		// ProcedureAmount
		// IncludePackage
		// CancelBill
		// CancelReason
		// CancelModeOfPayment
		// CancelAmount
		// CancelBankName
		// CancelTransactionNumber
		// LabTest
		// sid
		// SidNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$curVal = strval($this->Reception->CurrentValue);
			if ($curVal != "") {
				$this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
				if ($this->Reception->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Reception->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Reception->ViewValue = $this->Reception->CurrentValue;
					}
				}
			} else {
				$this->Reception->ViewValue = NULL;
			}
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// IP_OP
			$this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
			$this->IP_OP->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$curVal = strval($this->ModeofPayment->CurrentValue);
			if ($curVal != "") {
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
				if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
					}
				}
			} else {
				$this->ModeofPayment->ViewValue = NULL;
			}
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// RealizationAmount
			$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
			$this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
			$this->RealizationAmount->ViewCustomAttributes = "";

			// RealizationStatus
			$this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
			$this->RealizationStatus->ViewCustomAttributes = "";

			// RealizationRemarks
			$this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
			$this->RealizationRemarks->ViewCustomAttributes = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
			$this->RealizationBatchNo->ViewCustomAttributes = "";

			// RealizationDate
			$this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
			$this->RealizationDate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$curVal = strval($this->RIDNO->CurrentValue);
			if ($curVal != "") {
				$this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
				if ($this->RIDNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->RIDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
					}
				}
			} else {
				$this->RIDNO->ViewValue = NULL;
			}
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// CId
			$curVal = strval($this->CId->CurrentValue);
			if ($curVal != "") {
				$this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
				if ($this->CId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->CId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->CId->ViewValue = $this->CId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CId->ViewValue = $this->CId->CurrentValue;
					}
				}
			} else {
				$this->CId->ViewValue = NULL;
			}
			$this->CId->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PayerType
			$this->PayerType->ViewValue = $this->PayerType->CurrentValue;
			$this->PayerType->ViewCustomAttributes = "";

			// Dob
			$this->Dob->ViewValue = $this->Dob->CurrentValue;
			$this->Dob->ViewCustomAttributes = "";

			// Currency
			$this->Currency->ViewValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// DiscountRemarks
			$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
			$this->DiscountRemarks->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// PatId
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal != "") {
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->ViewValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->ViewValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$curVal = strval($this->RefferedBy->CurrentValue);
			if ($curVal != "") {
				$this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
				if ($this->RefferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RefferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
					}
				}
			} else {
				$this->RefferedBy->ViewValue = NULL;
			}
			$this->RefferedBy->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// DrID
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal != "") {
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrID->ViewValue = $this->DrID->CurrentValue;
					}
				}
			} else {
				$this->DrID->ViewValue = NULL;
			}
			$this->DrID->ViewCustomAttributes = "";

			// BillStatus
			$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
			$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
			$this->BillStatus->ViewCustomAttributes = "";

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

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// AdjustmentAdvance
			if (strval($this->AdjustmentAdvance->CurrentValue) != "") {
				$this->AdjustmentAdvance->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->AdjustmentAdvance->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->AdjustmentAdvance->ViewValue->add($this->AdjustmentAdvance->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->AdjustmentAdvance->ViewValue = NULL;
			}
			$this->AdjustmentAdvance->ViewCustomAttributes = "";

			// billing_vouchercol
			$this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
			$this->billing_vouchercol->ViewCustomAttributes = "";

			// BillType
			$this->BillType->ViewValue = $this->BillType->CurrentValue;
			$this->BillType->ViewCustomAttributes = "";

			// ProcedureName
			$this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
			$this->ProcedureName->ViewCustomAttributes = "";

			// ProcedureAmount
			$this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
			$this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
			$this->ProcedureAmount->ViewCustomAttributes = "";

			// IncludePackage
			if (strval($this->IncludePackage->CurrentValue) != "") {
				$this->IncludePackage->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IncludePackage->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IncludePackage->ViewValue->add($this->IncludePackage->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IncludePackage->ViewValue = NULL;
			}
			$this->IncludePackage->ViewCustomAttributes = "";

			// CancelBill
			if (strval($this->CancelBill->CurrentValue) != "") {
				$this->CancelBill->ViewValue = $this->CancelBill->optionCaption($this->CancelBill->CurrentValue);
			} else {
				$this->CancelBill->ViewValue = NULL;
			}
			$this->CancelBill->ViewCustomAttributes = "";

			// CancelReason
			$this->CancelReason->ViewValue = $this->CancelReason->CurrentValue;
			$this->CancelReason->ViewCustomAttributes = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->ViewValue = $this->CancelModeOfPayment->CurrentValue;
			$this->CancelModeOfPayment->ViewCustomAttributes = "";

			// CancelAmount
			$this->CancelAmount->ViewValue = $this->CancelAmount->CurrentValue;
			$this->CancelAmount->ViewCustomAttributes = "";

			// CancelBankName
			$this->CancelBankName->ViewValue = $this->CancelBankName->CurrentValue;
			$this->CancelBankName->ViewCustomAttributes = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->ViewValue = $this->CancelTransactionNumber->CurrentValue;
			$this->CancelTransactionNumber->ViewCustomAttributes = "";

			// LabTest
			$this->LabTest->ViewValue = $this->LabTest->CurrentValue;
			$this->LabTest->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// SidNo
			$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
			$this->SidNo->ViewCustomAttributes = "";

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

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

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

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";
			$this->IP_OP->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";
			$this->AnyDues->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";
			$this->RealizationAmount->TooltipValue = "";

			// RealizationStatus
			$this->RealizationStatus->LinkCustomAttributes = "";
			$this->RealizationStatus->HrefValue = "";
			$this->RealizationStatus->TooltipValue = "";

			// RealizationRemarks
			$this->RealizationRemarks->LinkCustomAttributes = "";
			$this->RealizationRemarks->HrefValue = "";
			$this->RealizationRemarks->TooltipValue = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->LinkCustomAttributes = "";
			$this->RealizationBatchNo->HrefValue = "";
			$this->RealizationBatchNo->TooltipValue = "";

			// RealizationDate
			$this->RealizationDate->LinkCustomAttributes = "";
			$this->RealizationDate->HrefValue = "";
			$this->RealizationDate->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PayerType
			$this->PayerType->LinkCustomAttributes = "";
			$this->PayerType->HrefValue = "";
			$this->PayerType->TooltipValue = "";

			// Dob
			$this->Dob->LinkCustomAttributes = "";
			$this->Dob->HrefValue = "";
			$this->Dob->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// DiscountRemarks
			$this->DiscountRemarks->LinkCustomAttributes = "";
			$this->DiscountRemarks->HrefValue = "";
			$this->DiscountRemarks->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";

			// RefferedBy
			$this->RefferedBy->LinkCustomAttributes = "";
			$this->RefferedBy->HrefValue = "";
			$this->RefferedBy->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";
			$this->BillStatus->TooltipValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
			$this->ReportHeader->TooltipValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";

			// AdjustmentAdvance
			$this->AdjustmentAdvance->LinkCustomAttributes = "";
			$this->AdjustmentAdvance->HrefValue = "";
			$this->AdjustmentAdvance->TooltipValue = "";

			// billing_vouchercol
			$this->billing_vouchercol->LinkCustomAttributes = "";
			$this->billing_vouchercol->HrefValue = "";
			$this->billing_vouchercol->TooltipValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";
			$this->BillType->TooltipValue = "";

			// ProcedureName
			$this->ProcedureName->LinkCustomAttributes = "";
			$this->ProcedureName->HrefValue = "";
			$this->ProcedureName->TooltipValue = "";

			// ProcedureAmount
			$this->ProcedureAmount->LinkCustomAttributes = "";
			$this->ProcedureAmount->HrefValue = "";
			$this->ProcedureAmount->TooltipValue = "";

			// IncludePackage
			$this->IncludePackage->LinkCustomAttributes = "";
			$this->IncludePackage->HrefValue = "";
			$this->IncludePackage->TooltipValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";
			$this->CancelBill->TooltipValue = "";

			// CancelReason
			$this->CancelReason->LinkCustomAttributes = "";
			$this->CancelReason->HrefValue = "";
			$this->CancelReason->TooltipValue = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->LinkCustomAttributes = "";
			$this->CancelModeOfPayment->HrefValue = "";
			$this->CancelModeOfPayment->TooltipValue = "";

			// CancelAmount
			$this->CancelAmount->LinkCustomAttributes = "";
			$this->CancelAmount->HrefValue = "";
			$this->CancelAmount->TooltipValue = "";

			// CancelBankName
			$this->CancelBankName->LinkCustomAttributes = "";
			$this->CancelBankName->HrefValue = "";
			$this->CancelBankName->TooltipValue = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->LinkCustomAttributes = "";
			$this->CancelTransactionNumber->HrefValue = "";
			$this->CancelTransactionNumber->TooltipValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";
			$this->LabTest->TooltipValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
			$this->SidNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$curVal = strval($this->Reception->CurrentValue);
			if ($curVal != "") {
				$this->Reception->EditValue = $this->Reception->lookupCacheOption($curVal);
				if ($this->Reception->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Reception->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Reception->EditValue = $this->Reception->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Reception->EditValue = $this->Reception->CurrentValue;
					}
				}
			} else {
				$this->Reception->EditValue = NULL;
			}
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			$this->Age->EditValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			$this->Gender->EditValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			$this->Mobile->EditValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// IP_OP
			$this->IP_OP->EditAttrs["class"] = "form-control";
			$this->IP_OP->EditCustomAttributes = "";
			$this->IP_OP->EditValue = $this->IP_OP->CurrentValue;
			$this->IP_OP->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			$this->Doctor->EditValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			$this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			$this->Details->EditValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = strval($this->ModeofPayment->CurrentValue);
			if ($curVal != "") {
				$this->ModeofPayment->EditValue = $this->ModeofPayment->lookupCacheOption($curVal);
				if ($this->ModeofPayment->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ModeofPayment->EditValue = $this->ModeofPayment->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
					}
				}
			} else {
				$this->ModeofPayment->EditValue = NULL;
			}
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = $this->Amount->CurrentValue;
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			$this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// modifiedby
			// modifieddatetime
			// RealizationAmount

			$this->RealizationAmount->EditAttrs["class"] = "form-control";
			$this->RealizationAmount->EditCustomAttributes = "";
			$this->RealizationAmount->EditValue = $this->RealizationAmount->CurrentValue;
			$this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, 2, -2, -2, -2);
			$this->RealizationAmount->ViewCustomAttributes = "";

			// RealizationStatus
			$this->RealizationStatus->EditAttrs["class"] = "form-control";
			$this->RealizationStatus->EditCustomAttributes = "";
			$this->RealizationStatus->EditValue = $this->RealizationStatus->CurrentValue;
			$this->RealizationStatus->ViewCustomAttributes = "";

			// RealizationRemarks
			$this->RealizationRemarks->EditAttrs["class"] = "form-control";
			$this->RealizationRemarks->EditCustomAttributes = "";
			$this->RealizationRemarks->EditValue = $this->RealizationRemarks->CurrentValue;
			$this->RealizationRemarks->ViewCustomAttributes = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->EditAttrs["class"] = "form-control";
			$this->RealizationBatchNo->EditCustomAttributes = "";
			$this->RealizationBatchNo->EditValue = $this->RealizationBatchNo->CurrentValue;
			$this->RealizationBatchNo->ViewCustomAttributes = "";

			// RealizationDate
			$this->RealizationDate->EditAttrs["class"] = "form-control";
			$this->RealizationDate->EditCustomAttributes = "";
			$this->RealizationDate->EditValue = $this->RealizationDate->CurrentValue;
			$this->RealizationDate->ViewCustomAttributes = "";

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$curVal = strval($this->RIDNO->CurrentValue);
			if ($curVal != "") {
				$this->RIDNO->EditValue = $this->RIDNO->lookupCacheOption($curVal);
				if ($this->RIDNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->RIDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->RIDNO->EditValue = $this->RIDNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
					}
				}
			} else {
				$this->RIDNO->EditValue = NULL;
			}
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = $this->TidNo->CurrentValue;
			$this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$curVal = strval($this->CId->CurrentValue);
			if ($curVal != "") {
				$this->CId->EditValue = $this->CId->lookupCacheOption($curVal);
				if ($this->CId->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->CId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->CId->EditValue = $this->CId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CId->EditValue = $this->CId->CurrentValue;
					}
				}
			} else {
				$this->CId->EditValue = NULL;
			}
			$this->CId->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			$this->PartnerName->EditValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PayerType
			$this->PayerType->EditAttrs["class"] = "form-control";
			$this->PayerType->EditCustomAttributes = "";
			$this->PayerType->EditValue = $this->PayerType->CurrentValue;
			$this->PayerType->ViewCustomAttributes = "";

			// Dob
			$this->Dob->EditAttrs["class"] = "form-control";
			$this->Dob->EditCustomAttributes = "";
			$this->Dob->EditValue = $this->Dob->CurrentValue;
			$this->Dob->ViewCustomAttributes = "";

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			$this->Currency->EditValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// DiscountRemarks
			$this->DiscountRemarks->EditAttrs["class"] = "form-control";
			$this->DiscountRemarks->EditCustomAttributes = "";
			$this->DiscountRemarks->EditValue = $this->DiscountRemarks->CurrentValue;
			$this->DiscountRemarks->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// PatId
			$this->PatId->EditAttrs["class"] = "form-control";
			$this->PatId->EditCustomAttributes = "";
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal != "") {
				$this->PatId->EditValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->EditValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->EditValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->EditValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->EditAttrs["class"] = "form-control";
			$this->DrDepartment->EditCustomAttributes = "";
			$this->DrDepartment->EditValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$this->RefferedBy->EditAttrs["class"] = "form-control";
			$this->RefferedBy->EditCustomAttributes = "";
			$curVal = strval($this->RefferedBy->CurrentValue);
			if ($curVal != "") {
				$this->RefferedBy->EditValue = $this->RefferedBy->lookupCacheOption($curVal);
				if ($this->RefferedBy->EditValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RefferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RefferedBy->EditValue = $this->RefferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RefferedBy->EditValue = $this->RefferedBy->CurrentValue;
					}
				}
			} else {
				$this->RefferedBy->EditValue = NULL;
			}
			$this->RefferedBy->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			$this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			$this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			$this->BankName->EditValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal != "") {
				$this->DrID->EditValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->DrID->EditValue = $this->DrID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrID->EditValue = $this->DrID->CurrentValue;
					}
				}
			} else {
				$this->DrID->EditValue = NULL;
			}
			$this->DrID->ViewCustomAttributes = "";

			// BillStatus
			$this->BillStatus->EditAttrs["class"] = "form-control";
			$this->BillStatus->EditCustomAttributes = "";
			$this->BillStatus->EditValue = $this->BillStatus->CurrentValue;
			$this->BillStatus->EditValue = FormatNumber($this->BillStatus->EditValue, 0, -2, -2, -2);
			$this->BillStatus->ViewCustomAttributes = "";

			// ReportHeader
			$this->ReportHeader->EditAttrs["class"] = "form-control";
			$this->ReportHeader->EditCustomAttributes = "";
			if (strval($this->ReportHeader->CurrentValue) != "") {
				$this->ReportHeader->EditValue = new OptionValues();
				$arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ReportHeader->EditValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ReportHeader->EditValue = NULL;
			}
			$this->ReportHeader->ViewCustomAttributes = "";

			// UserName
			// AdjustmentAdvance

			$this->AdjustmentAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentAdvance->EditCustomAttributes = "";
			if (strval($this->AdjustmentAdvance->CurrentValue) != "") {
				$this->AdjustmentAdvance->EditValue = new OptionValues();
				$arwrk = explode(",", strval($this->AdjustmentAdvance->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->AdjustmentAdvance->EditValue->add($this->AdjustmentAdvance->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->AdjustmentAdvance->EditValue = NULL;
			}
			$this->AdjustmentAdvance->ViewCustomAttributes = "";

			// billing_vouchercol
			$this->billing_vouchercol->EditAttrs["class"] = "form-control";
			$this->billing_vouchercol->EditCustomAttributes = "";
			$this->billing_vouchercol->EditValue = $this->billing_vouchercol->CurrentValue;
			$this->billing_vouchercol->ViewCustomAttributes = "";

			// BillType
			$this->BillType->EditAttrs["class"] = "form-control";
			$this->BillType->EditCustomAttributes = "";
			$this->BillType->EditValue = $this->BillType->CurrentValue;
			$this->BillType->ViewCustomAttributes = "";

			// ProcedureName
			$this->ProcedureName->EditAttrs["class"] = "form-control";
			$this->ProcedureName->EditCustomAttributes = "";
			$this->ProcedureName->EditValue = $this->ProcedureName->CurrentValue;
			$this->ProcedureName->ViewCustomAttributes = "";

			// ProcedureAmount
			$this->ProcedureAmount->EditAttrs["class"] = "form-control";
			$this->ProcedureAmount->EditCustomAttributes = "";
			$this->ProcedureAmount->EditValue = $this->ProcedureAmount->CurrentValue;
			$this->ProcedureAmount->EditValue = FormatNumber($this->ProcedureAmount->EditValue, 2, -2, -2, -2);
			$this->ProcedureAmount->ViewCustomAttributes = "";

			// IncludePackage
			$this->IncludePackage->EditAttrs["class"] = "form-control";
			$this->IncludePackage->EditCustomAttributes = "";
			if (strval($this->IncludePackage->CurrentValue) != "") {
				$this->IncludePackage->EditValue = new OptionValues();
				$arwrk = explode(",", strval($this->IncludePackage->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IncludePackage->EditValue->add($this->IncludePackage->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IncludePackage->EditValue = NULL;
			}
			$this->IncludePackage->ViewCustomAttributes = "";

			// CancelBill
			$this->CancelBill->EditAttrs["class"] = "form-control";
			$this->CancelBill->EditCustomAttributes = "";
			$this->CancelBill->EditValue = $this->CancelBill->options(TRUE);

			// CancelReason
			$this->CancelReason->EditAttrs["class"] = "form-control";
			$this->CancelReason->EditCustomAttributes = "";
			$this->CancelReason->EditValue = HtmlEncode($this->CancelReason->CurrentValue);
			$this->CancelReason->PlaceHolder = RemoveHtml($this->CancelReason->caption());

			// CancelModeOfPayment
			$this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
			$this->CancelModeOfPayment->EditCustomAttributes = "";
			if (!$this->CancelModeOfPayment->Raw)
				$this->CancelModeOfPayment->CurrentValue = HtmlDecode($this->CancelModeOfPayment->CurrentValue);
			$this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->CurrentValue);
			$this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

			// CancelAmount
			$this->CancelAmount->EditAttrs["class"] = "form-control";
			$this->CancelAmount->EditCustomAttributes = "";
			if (!$this->CancelAmount->Raw)
				$this->CancelAmount->CurrentValue = HtmlDecode($this->CancelAmount->CurrentValue);
			$this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->CurrentValue);
			$this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

			// CancelBankName
			$this->CancelBankName->EditAttrs["class"] = "form-control";
			$this->CancelBankName->EditCustomAttributes = "";
			if (!$this->CancelBankName->Raw)
				$this->CancelBankName->CurrentValue = HtmlDecode($this->CancelBankName->CurrentValue);
			$this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->CurrentValue);
			$this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

			// CancelTransactionNumber
			$this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
			$this->CancelTransactionNumber->EditCustomAttributes = "";
			if (!$this->CancelTransactionNumber->Raw)
				$this->CancelTransactionNumber->CurrentValue = HtmlDecode($this->CancelTransactionNumber->CurrentValue);
			$this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->CurrentValue);
			$this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

			// LabTest
			$this->LabTest->EditAttrs["class"] = "form-control";
			$this->LabTest->EditCustomAttributes = "";
			if (!$this->LabTest->Raw)
				$this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
			$this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
			$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (!$this->SidNo->Raw)
				$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// Edit refer script
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

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

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

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";
			$this->IP_OP->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";
			$this->AnyDues->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";
			$this->RealizationAmount->TooltipValue = "";

			// RealizationStatus
			$this->RealizationStatus->LinkCustomAttributes = "";
			$this->RealizationStatus->HrefValue = "";
			$this->RealizationStatus->TooltipValue = "";

			// RealizationRemarks
			$this->RealizationRemarks->LinkCustomAttributes = "";
			$this->RealizationRemarks->HrefValue = "";
			$this->RealizationRemarks->TooltipValue = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->LinkCustomAttributes = "";
			$this->RealizationBatchNo->HrefValue = "";
			$this->RealizationBatchNo->TooltipValue = "";

			// RealizationDate
			$this->RealizationDate->LinkCustomAttributes = "";
			$this->RealizationDate->HrefValue = "";
			$this->RealizationDate->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PayerType
			$this->PayerType->LinkCustomAttributes = "";
			$this->PayerType->HrefValue = "";
			$this->PayerType->TooltipValue = "";

			// Dob
			$this->Dob->LinkCustomAttributes = "";
			$this->Dob->HrefValue = "";
			$this->Dob->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// DiscountRemarks
			$this->DiscountRemarks->LinkCustomAttributes = "";
			$this->DiscountRemarks->HrefValue = "";
			$this->DiscountRemarks->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";

			// RefferedBy
			$this->RefferedBy->LinkCustomAttributes = "";
			$this->RefferedBy->HrefValue = "";
			$this->RefferedBy->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";
			$this->BillStatus->TooltipValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
			$this->ReportHeader->TooltipValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";

			// AdjustmentAdvance
			$this->AdjustmentAdvance->LinkCustomAttributes = "";
			$this->AdjustmentAdvance->HrefValue = "";
			$this->AdjustmentAdvance->TooltipValue = "";

			// billing_vouchercol
			$this->billing_vouchercol->LinkCustomAttributes = "";
			$this->billing_vouchercol->HrefValue = "";
			$this->billing_vouchercol->TooltipValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";
			$this->BillType->TooltipValue = "";

			// ProcedureName
			$this->ProcedureName->LinkCustomAttributes = "";
			$this->ProcedureName->HrefValue = "";
			$this->ProcedureName->TooltipValue = "";

			// ProcedureAmount
			$this->ProcedureAmount->LinkCustomAttributes = "";
			$this->ProcedureAmount->HrefValue = "";
			$this->ProcedureAmount->TooltipValue = "";

			// IncludePackage
			$this->IncludePackage->LinkCustomAttributes = "";
			$this->IncludePackage->HrefValue = "";
			$this->IncludePackage->TooltipValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";

			// CancelReason
			$this->CancelReason->LinkCustomAttributes = "";
			$this->CancelReason->HrefValue = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->LinkCustomAttributes = "";
			$this->CancelModeOfPayment->HrefValue = "";

			// CancelAmount
			$this->CancelAmount->LinkCustomAttributes = "";
			$this->CancelAmount->HrefValue = "";

			// CancelBankName
			$this->CancelBankName->LinkCustomAttributes = "";
			$this->CancelBankName->HrefValue = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->LinkCustomAttributes = "";
			$this->CancelTransactionNumber->HrefValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->IP_OP->Required) {
			if (!$this->IP_OP->IsDetailKey && $this->IP_OP->FormValue != NULL && $this->IP_OP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IP_OP->caption(), $this->IP_OP->RequiredErrorMessage));
			}
		}
		if ($this->Doctor->Required) {
			if (!$this->Doctor->IsDetailKey && $this->Doctor->FormValue != NULL && $this->Doctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
			}
		}
		if ($this->voucher_type->Required) {
			if (!$this->voucher_type->IsDetailKey && $this->voucher_type->FormValue != NULL && $this->voucher_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
			}
		}
		if ($this->Details->Required) {
			if (!$this->Details->IsDetailKey && $this->Details->FormValue != NULL && $this->Details->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
			}
		}
		if ($this->ModeofPayment->Required) {
			if (!$this->ModeofPayment->IsDetailKey && $this->ModeofPayment->FormValue != NULL && $this->ModeofPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
			}
		}
		if ($this->Amount->Required) {
			if (!$this->Amount->IsDetailKey && $this->Amount->FormValue != NULL && $this->Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
			}
		}
		if ($this->AnyDues->Required) {
			if (!$this->AnyDues->IsDetailKey && $this->AnyDues->FormValue != NULL && $this->AnyDues->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
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
		if ($this->RealizationAmount->Required) {
			if (!$this->RealizationAmount->IsDetailKey && $this->RealizationAmount->FormValue != NULL && $this->RealizationAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
			}
		}
		if ($this->RealizationStatus->Required) {
			if (!$this->RealizationStatus->IsDetailKey && $this->RealizationStatus->FormValue != NULL && $this->RealizationStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationStatus->caption(), $this->RealizationStatus->RequiredErrorMessage));
			}
		}
		if ($this->RealizationRemarks->Required) {
			if (!$this->RealizationRemarks->IsDetailKey && $this->RealizationRemarks->FormValue != NULL && $this->RealizationRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationRemarks->caption(), $this->RealizationRemarks->RequiredErrorMessage));
			}
		}
		if ($this->RealizationBatchNo->Required) {
			if (!$this->RealizationBatchNo->IsDetailKey && $this->RealizationBatchNo->FormValue != NULL && $this->RealizationBatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationBatchNo->caption(), $this->RealizationBatchNo->RequiredErrorMessage));
			}
		}
		if ($this->RealizationDate->Required) {
			if (!$this->RealizationDate->IsDetailKey && $this->RealizationDate->FormValue != NULL && $this->RealizationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationDate->caption(), $this->RealizationDate->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if ($this->CId->Required) {
			if (!$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->PayerType->Required) {
			if (!$this->PayerType->IsDetailKey && $this->PayerType->FormValue != NULL && $this->PayerType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PayerType->caption(), $this->PayerType->RequiredErrorMessage));
			}
		}
		if ($this->Dob->Required) {
			if (!$this->Dob->IsDetailKey && $this->Dob->FormValue != NULL && $this->Dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dob->caption(), $this->Dob->RequiredErrorMessage));
			}
		}
		if ($this->Currency->Required) {
			if (!$this->Currency->IsDetailKey && $this->Currency->FormValue != NULL && $this->Currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
			}
		}
		if ($this->DiscountRemarks->Required) {
			if (!$this->DiscountRemarks->IsDetailKey && $this->DiscountRemarks->FormValue != NULL && $this->DiscountRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountRemarks->caption(), $this->DiscountRemarks->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->PatId->Required) {
			if (!$this->PatId->IsDetailKey && $this->PatId->FormValue != NULL && $this->PatId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
			}
		}
		if ($this->DrDepartment->Required) {
			if (!$this->DrDepartment->IsDetailKey && $this->DrDepartment->FormValue != NULL && $this->DrDepartment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrDepartment->caption(), $this->DrDepartment->RequiredErrorMessage));
			}
		}
		if ($this->RefferedBy->Required) {
			if (!$this->RefferedBy->IsDetailKey && $this->RefferedBy->FormValue != NULL && $this->RefferedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefferedBy->caption(), $this->RefferedBy->RequiredErrorMessage));
			}
		}
		if ($this->BillNumber->Required) {
			if (!$this->BillNumber->IsDetailKey && $this->BillNumber->FormValue != NULL && $this->BillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
			}
		}
		if ($this->CardNumber->Required) {
			if (!$this->CardNumber->IsDetailKey && $this->CardNumber->FormValue != NULL && $this->CardNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
			}
		}
		if ($this->BankName->Required) {
			if (!$this->BankName->IsDetailKey && $this->BankName->FormValue != NULL && $this->BankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
			}
		}
		if ($this->DrID->Required) {
			if (!$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if ($this->BillStatus->Required) {
			if (!$this->BillStatus->IsDetailKey && $this->BillStatus->FormValue != NULL && $this->BillStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
			}
		}
		if ($this->ReportHeader->Required) {
			if ($this->ReportHeader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
			}
		}
		if ($this->UserName->Required) {
			if (!$this->UserName->IsDetailKey && $this->UserName->FormValue != NULL && $this->UserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserName->caption(), $this->UserName->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentAdvance->Required) {
			if ($this->AdjustmentAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentAdvance->caption(), $this->AdjustmentAdvance->RequiredErrorMessage));
			}
		}
		if ($this->billing_vouchercol->Required) {
			if (!$this->billing_vouchercol->IsDetailKey && $this->billing_vouchercol->FormValue != NULL && $this->billing_vouchercol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->billing_vouchercol->caption(), $this->billing_vouchercol->RequiredErrorMessage));
			}
		}
		if ($this->BillType->Required) {
			if (!$this->BillType->IsDetailKey && $this->BillType->FormValue != NULL && $this->BillType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureName->Required) {
			if (!$this->ProcedureName->IsDetailKey && $this->ProcedureName->FormValue != NULL && $this->ProcedureName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureName->caption(), $this->ProcedureName->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureAmount->Required) {
			if (!$this->ProcedureAmount->IsDetailKey && $this->ProcedureAmount->FormValue != NULL && $this->ProcedureAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureAmount->caption(), $this->ProcedureAmount->RequiredErrorMessage));
			}
		}
		if ($this->IncludePackage->Required) {
			if ($this->IncludePackage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IncludePackage->caption(), $this->IncludePackage->RequiredErrorMessage));
			}
		}
		if ($this->CancelBill->Required) {
			if (!$this->CancelBill->IsDetailKey && $this->CancelBill->FormValue != NULL && $this->CancelBill->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBill->caption(), $this->CancelBill->RequiredErrorMessage));
			}
		}
		if ($this->CancelReason->Required) {
			if (!$this->CancelReason->IsDetailKey && $this->CancelReason->FormValue != NULL && $this->CancelReason->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelReason->caption(), $this->CancelReason->RequiredErrorMessage));
			}
		}
		if ($this->CancelModeOfPayment->Required) {
			if (!$this->CancelModeOfPayment->IsDetailKey && $this->CancelModeOfPayment->FormValue != NULL && $this->CancelModeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelModeOfPayment->caption(), $this->CancelModeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->CancelAmount->Required) {
			if (!$this->CancelAmount->IsDetailKey && $this->CancelAmount->FormValue != NULL && $this->CancelAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelAmount->caption(), $this->CancelAmount->RequiredErrorMessage));
			}
		}
		if ($this->CancelBankName->Required) {
			if (!$this->CancelBankName->IsDetailKey && $this->CancelBankName->FormValue != NULL && $this->CancelBankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBankName->caption(), $this->CancelBankName->RequiredErrorMessage));
			}
		}
		if ($this->CancelTransactionNumber->Required) {
			if (!$this->CancelTransactionNumber->IsDetailKey && $this->CancelTransactionNumber->FormValue != NULL && $this->CancelTransactionNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelTransactionNumber->caption(), $this->CancelTransactionNumber->RequiredErrorMessage));
			}
		}
		if ($this->LabTest->Required) {
			if (!$this->LabTest->IsDetailKey && $this->LabTest->FormValue != NULL && $this->LabTest->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabTest->caption(), $this->LabTest->RequiredErrorMessage));
			}
		}
		if ($this->sid->Required) {
			if (!$this->sid->IsDetailKey && $this->sid->FormValue != NULL && $this->sid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sid->FormValue)) {
			AddMessage($FormError, $this->sid->errorMessage());
		}
		if ($this->SidNo->Required) {
			if (!$this->SidNo->IsDetailKey && $this->SidNo->FormValue != NULL && $this->SidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("view_patient_services", $detailTblVar) && $GLOBALS["view_patient_services"]->DetailEdit) {
			if (!isset($GLOBALS["view_patient_services_grid"]))
				$GLOBALS["view_patient_services_grid"] = new view_patient_services_grid(); // Get detail page object
			$GLOBALS["view_patient_services_grid"]->validateGridForm();
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

			// CancelBill
			$this->CancelBill->setDbValueDef($rsnew, $this->CancelBill->CurrentValue, NULL, $this->CancelBill->ReadOnly);

			// CancelReason
			$this->CancelReason->setDbValueDef($rsnew, $this->CancelReason->CurrentValue, NULL, $this->CancelReason->ReadOnly);

			// CancelModeOfPayment
			$this->CancelModeOfPayment->setDbValueDef($rsnew, $this->CancelModeOfPayment->CurrentValue, NULL, $this->CancelModeOfPayment->ReadOnly);

			// CancelAmount
			$this->CancelAmount->setDbValueDef($rsnew, $this->CancelAmount->CurrentValue, NULL, $this->CancelAmount->ReadOnly);

			// CancelBankName
			$this->CancelBankName->setDbValueDef($rsnew, $this->CancelBankName->CurrentValue, NULL, $this->CancelBankName->ReadOnly);

			// CancelTransactionNumber
			$this->CancelTransactionNumber->setDbValueDef($rsnew, $this->CancelTransactionNumber->CurrentValue, NULL, $this->CancelTransactionNumber->ReadOnly);

			// LabTest
			$this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, NULL, $this->LabTest->ReadOnly);

			// sid
			$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, $this->sid->ReadOnly);

			// SidNo
			$this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, NULL, $this->SidNo->ReadOnly);

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
					if (in_array("view_patient_services", $detailTblVar) && $GLOBALS["view_patient_services"]->DetailEdit) {
						if (!isset($GLOBALS["view_patient_services_grid"]))
							$GLOBALS["view_patient_services_grid"] = new view_patient_services_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "view_patient_services"); // Load user level of detail table
						$editRow = $GLOBALS["view_patient_services_grid"]->gridUpdate();
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
			if (in_array("view_patient_services", $detailTblVar)) {
				if (!isset($GLOBALS["view_patient_services_grid"]))
					$GLOBALS["view_patient_services_grid"] = new view_patient_services_grid();
				if ($GLOBALS["view_patient_services_grid"]->DetailEdit) {
					$GLOBALS["view_patient_services_grid"]->CurrentMode = "edit";
					$GLOBALS["view_patient_services_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["view_patient_services_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["view_patient_services_grid"]->setStartRecordNumber(1);
					$GLOBALS["view_patient_services_grid"]->Vid->IsDetailKey = TRUE;
					$GLOBALS["view_patient_services_grid"]->Vid->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["view_patient_services_grid"]->Vid->setSessionValue($GLOBALS["view_patient_services_grid"]->Vid->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_billing_voucher_printlist.php"), "", $this->TableVar, TRUE);
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
				case "x_Reception":
					break;
				case "x_ModeofPayment":
					break;
				case "x_RIDNO":
					break;
				case "x_CId":
					break;
				case "x_PatId":
					break;
				case "x_RefferedBy":
					break;
				case "x_DrID":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_ReportHeader":
					break;
				case "x_AdjustmentAdvance":
					break;
				case "x_IncludePackage":
					break;
				case "x_CancelBill":
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
						case "x_Reception":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
							break;
						case "x_ModeofPayment":
							break;
						case "x_RIDNO":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
							break;
						case "x_CId":
							break;
						case "x_PatId":
							break;
						case "x_RefferedBy":
							break;
						case "x_DrID":
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
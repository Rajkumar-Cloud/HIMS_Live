<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class store_batchmas_edit extends store_batchmas
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'store_batchmas';

	// Page object name
	public $PageObjName = "store_batchmas_edit";

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

		// Table object (store_batchmas)
		if (!isset($GLOBALS["store_batchmas"]) || get_class($GLOBALS["store_batchmas"]) == PROJECT_NAMESPACE . "store_batchmas") {
			$GLOBALS["store_batchmas"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["store_batchmas"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_batchmas');

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
		global $store_batchmas;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($store_batchmas);
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
					if ($pageName == "store_batchmasview.php")
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
					$this->terminate(GetUrl("store_batchmaslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->PRC->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->UR->setVisibility();
		$this->RT->setVisibility();
		$this->PRCODE->setVisibility();
		$this->BATCH->setVisibility();
		$this->PC->setVisibility();
		$this->OLDRT->setVisibility();
		$this->TEMPMRQ->setVisibility();
		$this->TAXP->setVisibility();
		$this->OLDRATE->setVisibility();
		$this->NEWRATE->setVisibility();
		$this->OTEMPMRA->setVisibility();
		$this->ACTIVESTATUS->setVisibility();
		$this->id->setVisibility();
		$this->PrName->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->BRCODE->setVisibility();
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
		// Check permission

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("store_batchmaslist.php");
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
					$this->terminate("store_batchmaslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "store_batchmaslist.php")
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

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
		}

		// Check field name 'OQ' first before field var 'x_OQ'
		$val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
		if (!$this->OQ->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OQ->Visible = FALSE; // Disable update for API request
			else
				$this->OQ->setFormValue($val);
		}

		// Check field name 'RQ' first before field var 'x_RQ'
		$val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
		if (!$this->RQ->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RQ->Visible = FALSE; // Disable update for API request
			else
				$this->RQ->setFormValue($val);
		}

		// Check field name 'MRQ' first before field var 'x_MRQ'
		$val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
		if (!$this->MRQ->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MRQ->Visible = FALSE; // Disable update for API request
			else
				$this->MRQ->setFormValue($val);
		}

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
		}

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EXPDT->Visible = FALSE; // Disable update for API request
			else
				$this->EXPDT->setFormValue($val);
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UR->Visible = FALSE; // Disable update for API request
			else
				$this->UR->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'PRCODE' first before field var 'x_PRCODE'
		$val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
		if (!$this->PRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->PRCODE->setFormValue($val);
		}

		// Check field name 'BATCH' first before field var 'x_BATCH'
		$val = $CurrentForm->hasValue("BATCH") ? $CurrentForm->getValue("BATCH") : $CurrentForm->getValue("x_BATCH");
		if (!$this->BATCH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BATCH->Visible = FALSE; // Disable update for API request
			else
				$this->BATCH->setFormValue($val);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'OLDRT' first before field var 'x_OLDRT'
		$val = $CurrentForm->hasValue("OLDRT") ? $CurrentForm->getValue("OLDRT") : $CurrentForm->getValue("x_OLDRT");
		if (!$this->OLDRT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OLDRT->Visible = FALSE; // Disable update for API request
			else
				$this->OLDRT->setFormValue($val);
		}

		// Check field name 'TEMPMRQ' first before field var 'x_TEMPMRQ'
		$val = $CurrentForm->hasValue("TEMPMRQ") ? $CurrentForm->getValue("TEMPMRQ") : $CurrentForm->getValue("x_TEMPMRQ");
		if (!$this->TEMPMRQ->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TEMPMRQ->Visible = FALSE; // Disable update for API request
			else
				$this->TEMPMRQ->setFormValue($val);
		}

		// Check field name 'TAXP' first before field var 'x_TAXP'
		$val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
		if (!$this->TAXP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TAXP->Visible = FALSE; // Disable update for API request
			else
				$this->TAXP->setFormValue($val);
		}

		// Check field name 'OLDRATE' first before field var 'x_OLDRATE'
		$val = $CurrentForm->hasValue("OLDRATE") ? $CurrentForm->getValue("OLDRATE") : $CurrentForm->getValue("x_OLDRATE");
		if (!$this->OLDRATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OLDRATE->Visible = FALSE; // Disable update for API request
			else
				$this->OLDRATE->setFormValue($val);
		}

		// Check field name 'NEWRATE' first before field var 'x_NEWRATE'
		$val = $CurrentForm->hasValue("NEWRATE") ? $CurrentForm->getValue("NEWRATE") : $CurrentForm->getValue("x_NEWRATE");
		if (!$this->NEWRATE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NEWRATE->Visible = FALSE; // Disable update for API request
			else
				$this->NEWRATE->setFormValue($val);
		}

		// Check field name 'OTEMPMRA' first before field var 'x_OTEMPMRA'
		$val = $CurrentForm->hasValue("OTEMPMRA") ? $CurrentForm->getValue("OTEMPMRA") : $CurrentForm->getValue("x_OTEMPMRA");
		if (!$this->OTEMPMRA->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->OTEMPMRA->Visible = FALSE; // Disable update for API request
			else
				$this->OTEMPMRA->setFormValue($val);
		}

		// Check field name 'ACTIVESTATUS' first before field var 'x_ACTIVESTATUS'
		$val = $CurrentForm->hasValue("ACTIVESTATUS") ? $CurrentForm->getValue("ACTIVESTATUS") : $CurrentForm->getValue("x_ACTIVESTATUS");
		if (!$this->ACTIVESTATUS->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ACTIVESTATUS->Visible = FALSE; // Disable update for API request
			else
				$this->ACTIVESTATUS->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'PrName' first before field var 'x_PrName'
		$val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
		if (!$this->PrName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PrName->Visible = FALSE; // Disable update for API request
			else
				$this->PrName->setFormValue($val);
		}

		// Check field name 'PSGST' first before field var 'x_PSGST'
		$val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
		if (!$this->PSGST->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PSGST->Visible = FALSE; // Disable update for API request
			else
				$this->PSGST->setFormValue($val);
		}

		// Check field name 'PCGST' first before field var 'x_PCGST'
		$val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
		if (!$this->PCGST->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PCGST->Visible = FALSE; // Disable update for API request
			else
				$this->PCGST->setFormValue($val);
		}

		// Check field name 'SSGST' first before field var 'x_SSGST'
		$val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
		if (!$this->SSGST->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SSGST->Visible = FALSE; // Disable update for API request
			else
				$this->SSGST->setFormValue($val);
		}

		// Check field name 'SCGST' first before field var 'x_SCGST'
		$val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
		if (!$this->SCGST->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SCGST->Visible = FALSE; // Disable update for API request
			else
				$this->SCGST->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->OQ->CurrentValue = $this->OQ->FormValue;
		$this->RQ->CurrentValue = $this->RQ->FormValue;
		$this->MRQ->CurrentValue = $this->MRQ->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->UR->CurrentValue = $this->UR->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
		$this->BATCH->CurrentValue = $this->BATCH->FormValue;
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->OLDRT->CurrentValue = $this->OLDRT->FormValue;
		$this->TEMPMRQ->CurrentValue = $this->TEMPMRQ->FormValue;
		$this->TAXP->CurrentValue = $this->TAXP->FormValue;
		$this->OLDRATE->CurrentValue = $this->OLDRATE->FormValue;
		$this->NEWRATE->CurrentValue = $this->NEWRATE->FormValue;
		$this->OTEMPMRA->CurrentValue = $this->OTEMPMRA->FormValue;
		$this->ACTIVESTATUS->CurrentValue = $this->ACTIVESTATUS->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PrName->CurrentValue = $this->PrName->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
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
		$this->PRC->setDbValue($row['PRC']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->UR->setDbValue($row['UR']);
		$this->RT->setDbValue($row['RT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->BATCH->setDbValue($row['BATCH']);
		$this->PC->setDbValue($row['PC']);
		$this->OLDRT->setDbValue($row['OLDRT']);
		$this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->OLDRATE->setDbValue($row['OLDRATE']);
		$this->NEWRATE->setDbValue($row['NEWRATE']);
		$this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
		$this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
		$this->id->setDbValue($row['id']);
		$this->PrName->setDbValue($row['PrName']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->BRCODE->setDbValue($row['BRCODE']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['PRC'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['IQ'] = NULL;
		$row['MRP'] = NULL;
		$row['EXPDT'] = NULL;
		$row['UR'] = NULL;
		$row['RT'] = NULL;
		$row['PRCODE'] = NULL;
		$row['BATCH'] = NULL;
		$row['PC'] = NULL;
		$row['OLDRT'] = NULL;
		$row['TEMPMRQ'] = NULL;
		$row['TAXP'] = NULL;
		$row['OLDRATE'] = NULL;
		$row['NEWRATE'] = NULL;
		$row['OTEMPMRA'] = NULL;
		$row['ACTIVESTATUS'] = NULL;
		$row['id'] = NULL;
		$row['PrName'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['BRCODE'] = NULL;
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

		if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue)))
			$this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue)))
			$this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue)))
			$this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRT->FormValue == $this->OLDRT->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRT->CurrentValue)))
			$this->OLDRT->CurrentValue = ConvertToFloatString($this->OLDRT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TEMPMRQ->FormValue == $this->TEMPMRQ->CurrentValue && is_numeric(ConvertToFloatString($this->TEMPMRQ->CurrentValue)))
			$this->TEMPMRQ->CurrentValue = ConvertToFloatString($this->TEMPMRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue)))
			$this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRATE->FormValue == $this->OLDRATE->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRATE->CurrentValue)))
			$this->OLDRATE->CurrentValue = ConvertToFloatString($this->OLDRATE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWRATE->FormValue == $this->NEWRATE->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRATE->CurrentValue)))
			$this->NEWRATE->CurrentValue = ConvertToFloatString($this->NEWRATE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OTEMPMRA->FormValue == $this->OTEMPMRA->CurrentValue && is_numeric(ConvertToFloatString($this->OTEMPMRA->CurrentValue)))
			$this->OTEMPMRA->CurrentValue = ConvertToFloatString($this->OTEMPMRA->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// PRC
		// BATCHNO
		// OQ
		// RQ
		// MRQ
		// IQ
		// MRP
		// EXPDT
		// UR
		// RT
		// PRCODE
		// BATCH
		// PC
		// OLDRT
		// TEMPMRQ
		// TAXP
		// OLDRATE
		// NEWRATE
		// OTEMPMRA
		// ACTIVESTATUS
		// id
		// PrName
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// MFRCODE
		// BRCODE

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// OQ
			$this->OQ->ViewValue = $this->OQ->CurrentValue;
			$this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
			$this->OQ->ViewCustomAttributes = "";

			// RQ
			$this->RQ->ViewValue = $this->RQ->CurrentValue;
			$this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
			$this->RQ->ViewCustomAttributes = "";

			// MRQ
			$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
			$this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
			$this->MRQ->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// BATCH
			$this->BATCH->ViewValue = $this->BATCH->CurrentValue;
			$this->BATCH->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// OLDRT
			$this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
			$this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
			$this->OLDRT->ViewCustomAttributes = "";

			// TEMPMRQ
			$this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
			$this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
			$this->TEMPMRQ->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// OLDRATE
			$this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
			$this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
			$this->OLDRATE->ViewCustomAttributes = "";

			// NEWRATE
			$this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
			$this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
			$this->NEWRATE->ViewCustomAttributes = "";

			// OTEMPMRA
			$this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
			$this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
			$this->OTEMPMRA->ViewCustomAttributes = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
			$this->ACTIVESTATUS->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
			$this->BRCODE->ViewCustomAttributes = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";
			$this->OQ->TooltipValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";
			$this->RQ->TooltipValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";
			$this->MRQ->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";
			$this->PRCODE->TooltipValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";
			$this->BATCH->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// OLDRT
			$this->OLDRT->LinkCustomAttributes = "";
			$this->OLDRT->HrefValue = "";
			$this->OLDRT->TooltipValue = "";

			// TEMPMRQ
			$this->TEMPMRQ->LinkCustomAttributes = "";
			$this->TEMPMRQ->HrefValue = "";
			$this->TEMPMRQ->TooltipValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";
			$this->TAXP->TooltipValue = "";

			// OLDRATE
			$this->OLDRATE->LinkCustomAttributes = "";
			$this->OLDRATE->HrefValue = "";
			$this->OLDRATE->TooltipValue = "";

			// NEWRATE
			$this->NEWRATE->LinkCustomAttributes = "";
			$this->NEWRATE->HrefValue = "";
			$this->NEWRATE->TooltipValue = "";

			// OTEMPMRA
			$this->OTEMPMRA->LinkCustomAttributes = "";
			$this->OTEMPMRA->HrefValue = "";
			$this->OTEMPMRA->TooltipValue = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->LinkCustomAttributes = "";
			$this->ACTIVESTATUS->HrefValue = "";
			$this->ACTIVESTATUS->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (!$this->BATCHNO->Raw)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// OQ
			$this->OQ->EditAttrs["class"] = "form-control";
			$this->OQ->EditCustomAttributes = "";
			$this->OQ->EditValue = HtmlEncode($this->OQ->CurrentValue);
			$this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
			if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue))
				$this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
			

			// RQ
			$this->RQ->EditAttrs["class"] = "form-control";
			$this->RQ->EditCustomAttributes = "";
			$this->RQ->EditValue = HtmlEncode($this->RQ->CurrentValue);
			$this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
			if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue))
				$this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
			

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
			if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue))
				$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
			

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue))
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
			

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
			

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue))
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
			

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
			

			// PRCODE
			$this->PRCODE->EditAttrs["class"] = "form-control";
			$this->PRCODE->EditCustomAttributes = "";
			if (!$this->PRCODE->Raw)
				$this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
			$this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
			$this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			if (!$this->BATCH->Raw)
				$this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
			$this->BATCH->EditValue = HtmlEncode($this->BATCH->CurrentValue);
			$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (!$this->PC->Raw)
				$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
			$this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// OLDRT
			$this->OLDRT->EditAttrs["class"] = "form-control";
			$this->OLDRT->EditCustomAttributes = "";
			$this->OLDRT->EditValue = HtmlEncode($this->OLDRT->CurrentValue);
			$this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());
			if (strval($this->OLDRT->EditValue) != "" && is_numeric($this->OLDRT->EditValue))
				$this->OLDRT->EditValue = FormatNumber($this->OLDRT->EditValue, -2, -2, -2, -2);
			

			// TEMPMRQ
			$this->TEMPMRQ->EditAttrs["class"] = "form-control";
			$this->TEMPMRQ->EditCustomAttributes = "";
			$this->TEMPMRQ->EditValue = HtmlEncode($this->TEMPMRQ->CurrentValue);
			$this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());
			if (strval($this->TEMPMRQ->EditValue) != "" && is_numeric($this->TEMPMRQ->EditValue))
				$this->TEMPMRQ->EditValue = FormatNumber($this->TEMPMRQ->EditValue, -2, -2, -2, -2);
			

			// TAXP
			$this->TAXP->EditAttrs["class"] = "form-control";
			$this->TAXP->EditCustomAttributes = "";
			$this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
			$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
			if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue))
				$this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
			

			// OLDRATE
			$this->OLDRATE->EditAttrs["class"] = "form-control";
			$this->OLDRATE->EditCustomAttributes = "";
			$this->OLDRATE->EditValue = HtmlEncode($this->OLDRATE->CurrentValue);
			$this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());
			if (strval($this->OLDRATE->EditValue) != "" && is_numeric($this->OLDRATE->EditValue))
				$this->OLDRATE->EditValue = FormatNumber($this->OLDRATE->EditValue, -2, -2, -2, -2);
			

			// NEWRATE
			$this->NEWRATE->EditAttrs["class"] = "form-control";
			$this->NEWRATE->EditCustomAttributes = "";
			$this->NEWRATE->EditValue = HtmlEncode($this->NEWRATE->CurrentValue);
			$this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());
			if (strval($this->NEWRATE->EditValue) != "" && is_numeric($this->NEWRATE->EditValue))
				$this->NEWRATE->EditValue = FormatNumber($this->NEWRATE->EditValue, -2, -2, -2, -2);
			

			// OTEMPMRA
			$this->OTEMPMRA->EditAttrs["class"] = "form-control";
			$this->OTEMPMRA->EditCustomAttributes = "";
			$this->OTEMPMRA->EditValue = HtmlEncode($this->OTEMPMRA->CurrentValue);
			$this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());
			if (strval($this->OTEMPMRA->EditValue) != "" && is_numeric($this->OTEMPMRA->EditValue))
				$this->OTEMPMRA->EditValue = FormatNumber($this->OTEMPMRA->EditValue, -2, -2, -2, -2);
			

			// ACTIVESTATUS
			$this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
			$this->ACTIVESTATUS->EditCustomAttributes = "";
			if (!$this->ACTIVESTATUS->Raw)
				$this->ACTIVESTATUS->CurrentValue = HtmlDecode($this->ACTIVESTATUS->CurrentValue);
			$this->ACTIVESTATUS->EditValue = HtmlEncode($this->ACTIVESTATUS->CurrentValue);
			$this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (!$this->PrName->Raw)
				$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue))
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
			

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue))
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
			

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue))
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
			

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue))
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
			

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (!$this->MFRCODE->Raw)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// Edit refer script
			// PRC

			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// OLDRT
			$this->OLDRT->LinkCustomAttributes = "";
			$this->OLDRT->HrefValue = "";

			// TEMPMRQ
			$this->TEMPMRQ->LinkCustomAttributes = "";
			$this->TEMPMRQ->HrefValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";

			// OLDRATE
			$this->OLDRATE->LinkCustomAttributes = "";
			$this->OLDRATE->HrefValue = "";

			// NEWRATE
			$this->NEWRATE->LinkCustomAttributes = "";
			$this->NEWRATE->HrefValue = "";

			// OTEMPMRA
			$this->OTEMPMRA->LinkCustomAttributes = "";
			$this->OTEMPMRA->HrefValue = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->LinkCustomAttributes = "";
			$this->ACTIVESTATUS->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->OQ->Required) {
			if (!$this->OQ->IsDetailKey && $this->OQ->FormValue != NULL && $this->OQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OQ->FormValue)) {
			AddMessage($FormError, $this->OQ->errorMessage());
		}
		if ($this->RQ->Required) {
			if (!$this->RQ->IsDetailKey && $this->RQ->FormValue != NULL && $this->RQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RQ->FormValue)) {
			AddMessage($FormError, $this->RQ->errorMessage());
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRQ->FormValue)) {
			AddMessage($FormError, $this->MRQ->errorMessage());
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IQ->FormValue)) {
			AddMessage($FormError, $this->IQ->errorMessage());
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRP->FormValue)) {
			AddMessage($FormError, $this->MRP->errorMessage());
		}
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EXPDT->FormValue)) {
			AddMessage($FormError, $this->EXPDT->errorMessage());
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->RT->Required) {
			if (!$this->RT->IsDetailKey && $this->RT->FormValue != NULL && $this->RT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RT->FormValue)) {
			AddMessage($FormError, $this->RT->errorMessage());
		}
		if ($this->PRCODE->Required) {
			if (!$this->PRCODE->IsDetailKey && $this->PRCODE->FormValue != NULL && $this->PRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
			}
		}
		if ($this->BATCH->Required) {
			if (!$this->BATCH->IsDetailKey && $this->BATCH->FormValue != NULL && $this->BATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCH->caption(), $this->BATCH->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->OLDRT->Required) {
			if (!$this->OLDRT->IsDetailKey && $this->OLDRT->FormValue != NULL && $this->OLDRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDRT->caption(), $this->OLDRT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OLDRT->FormValue)) {
			AddMessage($FormError, $this->OLDRT->errorMessage());
		}
		if ($this->TEMPMRQ->Required) {
			if (!$this->TEMPMRQ->IsDetailKey && $this->TEMPMRQ->FormValue != NULL && $this->TEMPMRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMPMRQ->caption(), $this->TEMPMRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TEMPMRQ->FormValue)) {
			AddMessage($FormError, $this->TEMPMRQ->errorMessage());
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TAXP->FormValue)) {
			AddMessage($FormError, $this->TAXP->errorMessage());
		}
		if ($this->OLDRATE->Required) {
			if (!$this->OLDRATE->IsDetailKey && $this->OLDRATE->FormValue != NULL && $this->OLDRATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDRATE->caption(), $this->OLDRATE->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OLDRATE->FormValue)) {
			AddMessage($FormError, $this->OLDRATE->errorMessage());
		}
		if ($this->NEWRATE->Required) {
			if (!$this->NEWRATE->IsDetailKey && $this->NEWRATE->FormValue != NULL && $this->NEWRATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWRATE->caption(), $this->NEWRATE->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NEWRATE->FormValue)) {
			AddMessage($FormError, $this->NEWRATE->errorMessage());
		}
		if ($this->OTEMPMRA->Required) {
			if (!$this->OTEMPMRA->IsDetailKey && $this->OTEMPMRA->FormValue != NULL && $this->OTEMPMRA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OTEMPMRA->caption(), $this->OTEMPMRA->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OTEMPMRA->FormValue)) {
			AddMessage($FormError, $this->OTEMPMRA->errorMessage());
		}
		if ($this->ACTIVESTATUS->Required) {
			if (!$this->ACTIVESTATUS->IsDetailKey && $this->ACTIVESTATUS->FormValue != NULL && $this->ACTIVESTATUS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ACTIVESTATUS->caption(), $this->ACTIVESTATUS->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->PrName->Required) {
			if (!$this->PrName->IsDetailKey && $this->PrName->FormValue != NULL && $this->PrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
			}
		}
		if ($this->PSGST->Required) {
			if (!$this->PSGST->IsDetailKey && $this->PSGST->FormValue != NULL && $this->PSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PSGST->FormValue)) {
			AddMessage($FormError, $this->PSGST->errorMessage());
		}
		if ($this->PCGST->Required) {
			if (!$this->PCGST->IsDetailKey && $this->PCGST->FormValue != NULL && $this->PCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PCGST->FormValue)) {
			AddMessage($FormError, $this->PCGST->errorMessage());
		}
		if ($this->SSGST->Required) {
			if (!$this->SSGST->IsDetailKey && $this->SSGST->FormValue != NULL && $this->SSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SSGST->FormValue)) {
			AddMessage($FormError, $this->SSGST->errorMessage());
		}
		if ($this->SCGST->Required) {
			if (!$this->SCGST->IsDetailKey && $this->SCGST->FormValue != NULL && $this->SCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SCGST->FormValue)) {
			AddMessage($FormError, $this->SCGST->errorMessage());
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BRCODE->FormValue)) {
			AddMessage($FormError, $this->BRCODE->errorMessage());
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

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// OQ
			$this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, NULL, $this->OQ->ReadOnly);

			// RQ
			$this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, NULL, $this->RQ->ReadOnly);

			// MRQ
			$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, $this->MRQ->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// UR
			$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, $this->UR->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// PRCODE
			$this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, NULL, $this->PRCODE->ReadOnly);

			// BATCH
			$this->BATCH->setDbValueDef($rsnew, $this->BATCH->CurrentValue, NULL, $this->BATCH->ReadOnly);

			// PC
			$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, $this->PC->ReadOnly);

			// OLDRT
			$this->OLDRT->setDbValueDef($rsnew, $this->OLDRT->CurrentValue, NULL, $this->OLDRT->ReadOnly);

			// TEMPMRQ
			$this->TEMPMRQ->setDbValueDef($rsnew, $this->TEMPMRQ->CurrentValue, NULL, $this->TEMPMRQ->ReadOnly);

			// TAXP
			$this->TAXP->setDbValueDef($rsnew, $this->TAXP->CurrentValue, NULL, $this->TAXP->ReadOnly);

			// OLDRATE
			$this->OLDRATE->setDbValueDef($rsnew, $this->OLDRATE->CurrentValue, NULL, $this->OLDRATE->ReadOnly);

			// NEWRATE
			$this->NEWRATE->setDbValueDef($rsnew, $this->NEWRATE->CurrentValue, NULL, $this->NEWRATE->ReadOnly);

			// OTEMPMRA
			$this->OTEMPMRA->setDbValueDef($rsnew, $this->OTEMPMRA->CurrentValue, NULL, $this->OTEMPMRA->ReadOnly);

			// ACTIVESTATUS
			$this->ACTIVESTATUS->setDbValueDef($rsnew, $this->ACTIVESTATUS->CurrentValue, NULL, $this->ACTIVESTATUS->ReadOnly);

			// PrName
			$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, $this->PrName->ReadOnly);

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("store_batchmaslist.php"), "", $this->TableVar, TRUE);
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
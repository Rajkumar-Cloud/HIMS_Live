<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pharmacy_purchaseorder_edit extends pharmacy_purchaseorder
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_purchaseorder';

	// Page object name
	public $PageObjName = "pharmacy_purchaseorder_edit";

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

		// Table object (pharmacy_purchaseorder)
		if (!isset($GLOBALS["pharmacy_purchaseorder"]) || get_class($GLOBALS["pharmacy_purchaseorder"]) == PROJECT_NAMESPACE . "pharmacy_purchaseorder") {
			$GLOBALS["pharmacy_purchaseorder"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_purchaseorder"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (pharmacy_po)
		if (!isset($GLOBALS['pharmacy_po']))
			$GLOBALS['pharmacy_po'] = new pharmacy_po();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_purchaseorder');

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
		global $pharmacy_purchaseorder;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pharmacy_purchaseorder);
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
					if ($pageName == "pharmacy_purchaseorderview.php")
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
					$this->terminate(GetUrl("pharmacy_purchaseorderlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->ORDNO->setVisibility();
		$this->PRC->setVisibility();
		$this->QTY->setVisibility();
		$this->DT->setVisibility();
		$this->PC->setVisibility();
		$this->YM->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->Stock->setVisibility();
		$this->LastMonthSale->setVisibility();
		$this->Printcheck->setVisibility();
		$this->id->setVisibility();
		$this->poid->setVisibility();
		$this->grnid->Visible = FALSE;
		$this->BatchNo->Visible = FALSE;
		$this->ExpDate->Visible = FALSE;
		$this->PrName->Visible = FALSE;
		$this->Quantity->Visible = FALSE;
		$this->FreeQty->Visible = FALSE;
		$this->ItemValue->Visible = FALSE;
		$this->Disc->Visible = FALSE;
		$this->PTax->Visible = FALSE;
		$this->MRP->Visible = FALSE;
		$this->SalTax->Visible = FALSE;
		$this->PurValue->Visible = FALSE;
		$this->PurRate->Visible = FALSE;
		$this->SalRate->Visible = FALSE;
		$this->Discount->Visible = FALSE;
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->BRCODE->setVisibility();
		$this->HSN->setVisibility();
		$this->Pack->setVisibility();
		$this->PUnit->setVisibility();
		$this->SUnit->setVisibility();
		$this->GrnQuantity->setVisibility();
		$this->GrnMRP->setVisibility();
		$this->trid->setVisibility();
		$this->HospID->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
		$this->grncreatedby->setVisibility();
		$this->grncreatedDateTime->setVisibility();
		$this->grnModifiedby->setVisibility();
		$this->grnModifiedDateTime->setVisibility();
		$this->Received->setVisibility();
		$this->BillDate->setVisibility();
		$this->CurStock->setVisibility();
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
		$this->setupLookupOptions($this->PRC);
		$this->setupLookupOptions($this->PC);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pharmacy_purchaseorderlist.php");
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
					$this->terminate("pharmacy_purchaseorderlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_purchaseorderlist.php")
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

		// Check field name 'ORDNO' first before field var 'x_ORDNO'
		$val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
		if (!$this->ORDNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ORDNO->Visible = FALSE; // Disable update for API request
			else
				$this->ORDNO->setFormValue($val);
		}

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'QTY' first before field var 'x_QTY'
		$val = $CurrentForm->hasValue("QTY") ? $CurrentForm->getValue("QTY") : $CurrentForm->getValue("x_QTY");
		if (!$this->QTY->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->QTY->Visible = FALSE; // Disable update for API request
			else
				$this->QTY->setFormValue($val);
		}

		// Check field name 'DT' first before field var 'x_DT'
		$val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
		if (!$this->DT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DT->Visible = FALSE; // Disable update for API request
			else
				$this->DT->setFormValue($val);
			$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'YM' first before field var 'x_YM'
		$val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
		if (!$this->YM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->YM->Visible = FALSE; // Disable update for API request
			else
				$this->YM->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'Stock' first before field var 'x_Stock'
		$val = $CurrentForm->hasValue("Stock") ? $CurrentForm->getValue("Stock") : $CurrentForm->getValue("x_Stock");
		if (!$this->Stock->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Stock->Visible = FALSE; // Disable update for API request
			else
				$this->Stock->setFormValue($val);
		}

		// Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
		$val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
		if (!$this->LastMonthSale->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LastMonthSale->Visible = FALSE; // Disable update for API request
			else
				$this->LastMonthSale->setFormValue($val);
		}

		// Check field name 'Printcheck' first before field var 'x_Printcheck'
		$val = $CurrentForm->hasValue("Printcheck") ? $CurrentForm->getValue("Printcheck") : $CurrentForm->getValue("x_Printcheck");
		if (!$this->Printcheck->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Printcheck->Visible = FALSE; // Disable update for API request
			else
				$this->Printcheck->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'poid' first before field var 'x_poid'
		$val = $CurrentForm->hasValue("poid") ? $CurrentForm->getValue("poid") : $CurrentForm->getValue("x_poid");
		if (!$this->poid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->poid->Visible = FALSE; // Disable update for API request
			else
				$this->poid->setFormValue($val);
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

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'HSN' first before field var 'x_HSN'
		$val = $CurrentForm->hasValue("HSN") ? $CurrentForm->getValue("HSN") : $CurrentForm->getValue("x_HSN");
		if (!$this->HSN->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HSN->Visible = FALSE; // Disable update for API request
			else
				$this->HSN->setFormValue($val);
		}

		// Check field name 'Pack' first before field var 'x_Pack'
		$val = $CurrentForm->hasValue("Pack") ? $CurrentForm->getValue("Pack") : $CurrentForm->getValue("x_Pack");
		if (!$this->Pack->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Pack->Visible = FALSE; // Disable update for API request
			else
				$this->Pack->setFormValue($val);
		}

		// Check field name 'PUnit' first before field var 'x_PUnit'
		$val = $CurrentForm->hasValue("PUnit") ? $CurrentForm->getValue("PUnit") : $CurrentForm->getValue("x_PUnit");
		if (!$this->PUnit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PUnit->Visible = FALSE; // Disable update for API request
			else
				$this->PUnit->setFormValue($val);
		}

		// Check field name 'SUnit' first before field var 'x_SUnit'
		$val = $CurrentForm->hasValue("SUnit") ? $CurrentForm->getValue("SUnit") : $CurrentForm->getValue("x_SUnit");
		if (!$this->SUnit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SUnit->Visible = FALSE; // Disable update for API request
			else
				$this->SUnit->setFormValue($val);
		}

		// Check field name 'GrnQuantity' first before field var 'x_GrnQuantity'
		$val = $CurrentForm->hasValue("GrnQuantity") ? $CurrentForm->getValue("GrnQuantity") : $CurrentForm->getValue("x_GrnQuantity");
		if (!$this->GrnQuantity->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GrnQuantity->Visible = FALSE; // Disable update for API request
			else
				$this->GrnQuantity->setFormValue($val);
		}

		// Check field name 'GrnMRP' first before field var 'x_GrnMRP'
		$val = $CurrentForm->hasValue("GrnMRP") ? $CurrentForm->getValue("GrnMRP") : $CurrentForm->getValue("x_GrnMRP");
		if (!$this->GrnMRP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GrnMRP->Visible = FALSE; // Disable update for API request
			else
				$this->GrnMRP->setFormValue($val);
		}

		// Check field name 'trid' first before field var 'x_trid'
		$val = $CurrentForm->hasValue("trid") ? $CurrentForm->getValue("trid") : $CurrentForm->getValue("x_trid");
		if (!$this->trid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->trid->Visible = FALSE; // Disable update for API request
			else
				$this->trid->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
		$val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
		if (!$this->CreatedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDateTime->setFormValue($val);
			$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		}

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
			$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		}

		// Check field name 'grncreatedby' first before field var 'x_grncreatedby'
		$val = $CurrentForm->hasValue("grncreatedby") ? $CurrentForm->getValue("grncreatedby") : $CurrentForm->getValue("x_grncreatedby");
		if (!$this->grncreatedby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->grncreatedby->Visible = FALSE; // Disable update for API request
			else
				$this->grncreatedby->setFormValue($val);
		}

		// Check field name 'grncreatedDateTime' first before field var 'x_grncreatedDateTime'
		$val = $CurrentForm->hasValue("grncreatedDateTime") ? $CurrentForm->getValue("grncreatedDateTime") : $CurrentForm->getValue("x_grncreatedDateTime");
		if (!$this->grncreatedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->grncreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->grncreatedDateTime->setFormValue($val);
			$this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
		}

		// Check field name 'grnModifiedby' first before field var 'x_grnModifiedby'
		$val = $CurrentForm->hasValue("grnModifiedby") ? $CurrentForm->getValue("grnModifiedby") : $CurrentForm->getValue("x_grnModifiedby");
		if (!$this->grnModifiedby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->grnModifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->grnModifiedby->setFormValue($val);
		}

		// Check field name 'grnModifiedDateTime' first before field var 'x_grnModifiedDateTime'
		$val = $CurrentForm->hasValue("grnModifiedDateTime") ? $CurrentForm->getValue("grnModifiedDateTime") : $CurrentForm->getValue("x_grnModifiedDateTime");
		if (!$this->grnModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->grnModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->grnModifiedDateTime->setFormValue($val);
			$this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
		}

		// Check field name 'Received' first before field var 'x_Received'
		$val = $CurrentForm->hasValue("Received") ? $CurrentForm->getValue("Received") : $CurrentForm->getValue("x_Received");
		if (!$this->Received->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Received->Visible = FALSE; // Disable update for API request
			else
				$this->Received->setFormValue($val);
		}

		// Check field name 'BillDate' first before field var 'x_BillDate'
		$val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
		if (!$this->BillDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillDate->setFormValue($val);
			$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		}

		// Check field name 'CurStock' first before field var 'x_CurStock'
		$val = $CurrentForm->hasValue("CurStock") ? $CurrentForm->getValue("CurStock") : $CurrentForm->getValue("x_CurStock");
		if (!$this->CurStock->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CurStock->Visible = FALSE; // Disable update for API request
			else
				$this->CurStock->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->QTY->CurrentValue = $this->QTY->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->YM->CurrentValue = $this->YM->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->Stock->CurrentValue = $this->Stock->FormValue;
		$this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
		$this->Printcheck->CurrentValue = $this->Printcheck->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->poid->CurrentValue = $this->poid->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->HSN->CurrentValue = $this->HSN->FormValue;
		$this->Pack->CurrentValue = $this->Pack->FormValue;
		$this->PUnit->CurrentValue = $this->PUnit->FormValue;
		$this->SUnit->CurrentValue = $this->SUnit->FormValue;
		$this->GrnQuantity->CurrentValue = $this->GrnQuantity->FormValue;
		$this->GrnMRP->CurrentValue = $this->GrnMRP->FormValue;
		$this->trid->CurrentValue = $this->trid->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
		$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
		$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		$this->grncreatedby->CurrentValue = $this->grncreatedby->FormValue;
		$this->grncreatedDateTime->CurrentValue = $this->grncreatedDateTime->FormValue;
		$this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
		$this->grnModifiedby->CurrentValue = $this->grnModifiedby->FormValue;
		$this->grnModifiedDateTime->CurrentValue = $this->grnModifiedDateTime->FormValue;
		$this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
		$this->Received->CurrentValue = $this->Received->FormValue;
		$this->BillDate->CurrentValue = $this->BillDate->FormValue;
		$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		$this->CurStock->CurrentValue = $this->CurStock->FormValue;
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
		$this->ORDNO->setDbValue($row['ORDNO']);
		$this->PRC->setDbValue($row['PRC']);
		if (array_key_exists('EV__PRC', $rs->fields)) {
			$this->PRC->VirtualValue = $rs->fields('EV__PRC'); // Set up virtual field value
		} else {
			$this->PRC->VirtualValue = ""; // Clear value
		}
		$this->QTY->setDbValue($row['QTY']);
		$this->DT->setDbValue($row['DT']);
		$this->PC->setDbValue($row['PC']);
		$this->YM->setDbValue($row['YM']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->Stock->setDbValue($row['Stock']);
		$this->LastMonthSale->setDbValue($row['LastMonthSale']);
		$this->Printcheck->setDbValue($row['Printcheck']);
		$this->id->setDbValue($row['id']);
		$this->poid->setDbValue($row['poid']);
		$this->grnid->setDbValue($row['grnid']);
		$this->BatchNo->setDbValue($row['BatchNo']);
		$this->ExpDate->setDbValue($row['ExpDate']);
		$this->PrName->setDbValue($row['PrName']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->FreeQty->setDbValue($row['FreeQty']);
		$this->ItemValue->setDbValue($row['ItemValue']);
		$this->Disc->setDbValue($row['Disc']);
		$this->PTax->setDbValue($row['PTax']);
		$this->MRP->setDbValue($row['MRP']);
		$this->SalTax->setDbValue($row['SalTax']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PurRate->setDbValue($row['PurRate']);
		$this->SalRate->setDbValue($row['SalRate']);
		$this->Discount->setDbValue($row['Discount']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->HSN->setDbValue($row['HSN']);
		$this->Pack->setDbValue($row['Pack']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->GrnQuantity->setDbValue($row['GrnQuantity']);
		$this->GrnMRP->setDbValue($row['GrnMRP']);
		$this->trid->setDbValue($row['trid']);
		$this->HospID->setDbValue($row['HospID']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->grncreatedby->setDbValue($row['grncreatedby']);
		$this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
		$this->grnModifiedby->setDbValue($row['grnModifiedby']);
		$this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
		$this->Received->setDbValue($row['Received']);
		$this->BillDate->setDbValue($row['BillDate']);
		$this->CurStock->setDbValue($row['CurStock']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['ORDNO'] = NULL;
		$row['PRC'] = NULL;
		$row['QTY'] = NULL;
		$row['DT'] = NULL;
		$row['PC'] = NULL;
		$row['YM'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['Stock'] = NULL;
		$row['LastMonthSale'] = NULL;
		$row['Printcheck'] = NULL;
		$row['id'] = NULL;
		$row['poid'] = NULL;
		$row['grnid'] = NULL;
		$row['BatchNo'] = NULL;
		$row['ExpDate'] = NULL;
		$row['PrName'] = NULL;
		$row['Quantity'] = NULL;
		$row['FreeQty'] = NULL;
		$row['ItemValue'] = NULL;
		$row['Disc'] = NULL;
		$row['PTax'] = NULL;
		$row['MRP'] = NULL;
		$row['SalTax'] = NULL;
		$row['PurValue'] = NULL;
		$row['PurRate'] = NULL;
		$row['SalRate'] = NULL;
		$row['Discount'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['BRCODE'] = NULL;
		$row['HSN'] = NULL;
		$row['Pack'] = NULL;
		$row['PUnit'] = NULL;
		$row['SUnit'] = NULL;
		$row['GrnQuantity'] = NULL;
		$row['GrnMRP'] = NULL;
		$row['trid'] = NULL;
		$row['HospID'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['ModifiedBy'] = NULL;
		$row['ModifiedDateTime'] = NULL;
		$row['grncreatedby'] = NULL;
		$row['grncreatedDateTime'] = NULL;
		$row['grnModifiedby'] = NULL;
		$row['grnModifiedDateTime'] = NULL;
		$row['Received'] = NULL;
		$row['BillDate'] = NULL;
		$row['CurStock'] = NULL;
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

		// Convert decimal values if posted back
		if ($this->GrnMRP->FormValue == $this->GrnMRP->CurrentValue && is_numeric(ConvertToFloatString($this->GrnMRP->CurrentValue)))
			$this->GrnMRP->CurrentValue = ConvertToFloatString($this->GrnMRP->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// ORDNO
		// PRC
		// QTY
		// DT
		// PC
		// YM
		// MFRCODE
		// Stock
		// LastMonthSale
		// Printcheck
		// id
		// poid
		// grnid
		// BatchNo
		// ExpDate
		// PrName
		// Quantity
		// FreeQty
		// ItemValue
		// Disc
		// PTax
		// MRP
		// SalTax
		// PurValue
		// PurRate
		// SalRate
		// Discount
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// BRCODE
		// HSN
		// Pack
		// PUnit
		// SUnit
		// GrnQuantity
		// GrnMRP
		// trid
		// HospID
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// grncreatedby
		// grncreatedDateTime
		// grnModifiedby
		// grnModifiedDateTime
		// Received
		// BillDate
		// CurStock

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ORDNO
			$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
			$this->ORDNO->ViewCustomAttributes = "";

			// PRC
			if ($this->PRC->VirtualValue != "") {
				$this->PRC->ViewValue = $this->PRC->VirtualValue;
			} else {
				$this->PRC->ViewValue = $this->PRC->CurrentValue;
				$curVal = strval($this->PRC->CurrentValue);
				if ($curVal != "") {
					$this->PRC->ViewValue = $this->PRC->lookupCacheOption($curVal);
					if ($this->PRC->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->PRC->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->PRC->ViewValue = $this->PRC->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->PRC->ViewValue = $this->PRC->CurrentValue;
						}
					}
				} else {
					$this->PRC->ViewValue = NULL;
				}
			}
			$this->PRC->ViewCustomAttributes = "";

			// QTY
			$this->QTY->ViewValue = $this->QTY->CurrentValue;
			$this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 2, -2, -2, -2);
			$this->QTY->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PC
			$curVal = strval($this->PC->CurrentValue);
			if ($curVal != "") {
				$this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
				if ($this->PC->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$this->PC->ViewValue = $this->PC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PC->ViewValue = $this->PC->CurrentValue;
					}
				}
			} else {
				$this->PC->ViewValue = NULL;
			}
			$this->PC->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Stock
			$this->Stock->ViewValue = $this->Stock->CurrentValue;
			$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 2, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// LastMonthSale
			$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
			$this->LastMonthSale->ViewValue = FormatNumber($this->LastMonthSale->ViewValue, 2, -2, -2, -2);
			$this->LastMonthSale->ViewCustomAttributes = "";

			// Printcheck
			$this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
			$this->Printcheck->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// poid
			$this->poid->ViewValue = $this->poid->CurrentValue;
			$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
			$this->poid->ViewCustomAttributes = "";

			// grnid
			$this->grnid->ViewValue = $this->grnid->CurrentValue;
			$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
			$this->grnid->ViewCustomAttributes = "";

			// BatchNo
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";

			// ExpDate
			$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
			$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
			$this->ExpDate->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// FreeQty
			$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
			$this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
			$this->FreeQty->ViewCustomAttributes = "";

			// ItemValue
			$this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
			$this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
			$this->ItemValue->ViewCustomAttributes = "";

			// Disc
			$this->Disc->ViewValue = $this->Disc->CurrentValue;
			$this->Disc->ViewValue = FormatNumber($this->Disc->ViewValue, 2, -2, -2, -2);
			$this->Disc->ViewCustomAttributes = "";

			// PTax
			$this->PTax->ViewValue = $this->PTax->CurrentValue;
			$this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
			$this->PTax->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// SalTax
			$this->SalTax->ViewValue = $this->SalTax->CurrentValue;
			$this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
			$this->SalTax->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// SalRate
			$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
			$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
			$this->SalRate->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->PCGST->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->SCGST->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
			$this->BRCODE->ViewCustomAttributes = "";

			// HSN
			$this->HSN->ViewValue = $this->HSN->CurrentValue;
			$this->HSN->ViewCustomAttributes = "";

			// Pack
			$this->Pack->ViewValue = $this->Pack->CurrentValue;
			$this->Pack->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// GrnQuantity
			$this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
			$this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
			$this->GrnQuantity->ViewCustomAttributes = "";

			// GrnMRP
			$this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
			$this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
			$this->GrnMRP->ViewCustomAttributes = "";

			// trid
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// grncreatedby
			$this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
			$this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
			$this->grncreatedby->ViewCustomAttributes = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
			$this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
			$this->grncreatedDateTime->ViewCustomAttributes = "";

			// grnModifiedby
			$this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
			$this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
			$this->grnModifiedby->ViewCustomAttributes = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
			$this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
			$this->grnModifiedDateTime->ViewCustomAttributes = "";

			// Received
			if (strval($this->Received->CurrentValue) != "") {
				$this->Received->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Received->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Received->ViewValue->add($this->Received->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Received->ViewValue = NULL;
			}
			$this->Received->ViewCustomAttributes = "";

			// BillDate
			$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
			$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
			$this->BillDate->ViewCustomAttributes = "";

			// CurStock
			$this->CurStock->ViewValue = $this->CurStock->CurrentValue;
			$this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
			$this->CurStock->ViewCustomAttributes = "";

			// ORDNO
			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";
			$this->ORDNO->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";
			$this->QTY->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";
			$this->YM->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";
			$this->Stock->TooltipValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";
			$this->LastMonthSale->TooltipValue = "";

			// Printcheck
			$this->Printcheck->LinkCustomAttributes = "";
			$this->Printcheck->HrefValue = "";
			$this->Printcheck->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// poid
			$this->poid->LinkCustomAttributes = "";
			$this->poid->HrefValue = "";
			$this->poid->TooltipValue = "";

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

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// HSN
			$this->HSN->LinkCustomAttributes = "";
			$this->HSN->HrefValue = "";
			$this->HSN->TooltipValue = "";

			// Pack
			$this->Pack->LinkCustomAttributes = "";
			$this->Pack->HrefValue = "";
			$this->Pack->TooltipValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";
			$this->PUnit->TooltipValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";
			$this->SUnit->TooltipValue = "";

			// GrnQuantity
			$this->GrnQuantity->LinkCustomAttributes = "";
			$this->GrnQuantity->HrefValue = "";
			$this->GrnQuantity->TooltipValue = "";

			// GrnMRP
			$this->GrnMRP->LinkCustomAttributes = "";
			$this->GrnMRP->HrefValue = "";
			$this->GrnMRP->TooltipValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";
			$this->trid->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";
			$this->grncreatedby->TooltipValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";
			$this->grncreatedDateTime->TooltipValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";
			$this->grnModifiedby->TooltipValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";
			$this->grnModifiedDateTime->TooltipValue = "";

			// Received
			$this->Received->LinkCustomAttributes = "";
			$this->Received->HrefValue = "";
			$this->Received->TooltipValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";
			$this->BillDate->TooltipValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
			$this->CurStock->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// ORDNO
			$this->ORDNO->EditAttrs["class"] = "form-control";
			$this->ORDNO->EditCustomAttributes = "";
			if (!$this->ORDNO->Raw)
				$this->ORDNO->CurrentValue = HtmlDecode($this->ORDNO->CurrentValue);
			$this->ORDNO->EditValue = HtmlEncode($this->ORDNO->CurrentValue);
			$this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$curVal = strval($this->PRC->CurrentValue);
			if ($curVal != "") {
				$this->PRC->EditValue = $this->PRC->lookupCacheOption($curVal);
				if ($this->PRC->EditValue === NULL) { // Lookup from database
					$filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PRC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->PRC->EditValue = $this->PRC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
					}
				}
			} else {
				$this->PRC->EditValue = NULL;
			}
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// QTY
			$this->QTY->EditAttrs["class"] = "form-control";
			$this->QTY->EditCustomAttributes = "";
			$this->QTY->EditValue = HtmlEncode($this->QTY->CurrentValue);
			$this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// PC
			$this->PC->EditCustomAttributes = "";
			$curVal = trim(strval($this->PC->CurrentValue));
			if ($curVal != "")
				$this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
			else
				$this->PC->ViewValue = $this->PC->Lookup !== NULL && is_array($this->PC->Lookup->Options) ? $curVal : NULL;
			if ($this->PC->ViewValue !== NULL) { // Load from cache
				$this->PC->EditValue = array_values($this->PC->Lookup->Options);
				if ($this->PC->ViewValue == "")
					$this->PC->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PC->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PC->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode(FormatNumber($rswrk->fields('df'), 0, -2, -2, -2));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->PC->ViewValue = $this->PC->displayValue($arwrk);
				} else {
					$this->PC->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][1] = FormatNumber($arwrk[$i][1], 0, -2, -2, -2);
				}
				$this->PC->EditValue = $arwrk;
			}

			// YM
			$this->YM->EditAttrs["class"] = "form-control";
			$this->YM->EditCustomAttributes = "";
			if (!$this->YM->Raw)
				$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
			$this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
			$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (!$this->MFRCODE->Raw)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->CurrentValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// Printcheck
			$this->Printcheck->EditAttrs["class"] = "form-control";
			$this->Printcheck->EditCustomAttributes = "";
			if (!$this->Printcheck->Raw)
				$this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
			$this->Printcheck->EditValue = HtmlEncode($this->Printcheck->CurrentValue);
			$this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// poid
			$this->poid->EditAttrs["class"] = "form-control";
			$this->poid->EditCustomAttributes = "";
			if ($this->poid->getSessionValue() != "") {
				$this->poid->CurrentValue = $this->poid->getSessionValue();
				$this->poid->ViewValue = $this->poid->CurrentValue;
				$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
				$this->poid->ViewCustomAttributes = "";
			} else {
				$this->poid->EditValue = HtmlEncode($this->poid->CurrentValue);
				$this->poid->PlaceHolder = RemoveHtml($this->poid->caption());
			}

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue))
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -1, -2, 0);
			

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue))
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -1, -2, 0);
			

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue))
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -1, -2, 0);
			

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue))
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -1, -2, 0);
			

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// HSN
			$this->HSN->EditAttrs["class"] = "form-control";
			$this->HSN->EditCustomAttributes = "";
			if (!$this->HSN->Raw)
				$this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
			$this->HSN->EditValue = HtmlEncode($this->HSN->CurrentValue);
			$this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

			// Pack
			$this->Pack->EditAttrs["class"] = "form-control";
			$this->Pack->EditCustomAttributes = "";
			if (!$this->Pack->Raw)
				$this->Pack->CurrentValue = HtmlDecode($this->Pack->CurrentValue);
			$this->Pack->EditValue = HtmlEncode($this->Pack->CurrentValue);
			$this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

			// PUnit
			$this->PUnit->EditAttrs["class"] = "form-control";
			$this->PUnit->EditCustomAttributes = "";
			$this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
			$this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

			// SUnit
			$this->SUnit->EditAttrs["class"] = "form-control";
			$this->SUnit->EditCustomAttributes = "";
			$this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
			$this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

			// GrnQuantity
			$this->GrnQuantity->EditAttrs["class"] = "form-control";
			$this->GrnQuantity->EditCustomAttributes = "";
			$this->GrnQuantity->EditValue = HtmlEncode($this->GrnQuantity->CurrentValue);
			$this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

			// GrnMRP
			$this->GrnMRP->EditAttrs["class"] = "form-control";
			$this->GrnMRP->EditCustomAttributes = "";
			$this->GrnMRP->EditValue = HtmlEncode($this->GrnMRP->CurrentValue);
			$this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());
			if (strval($this->GrnMRP->EditValue) != "" && is_numeric($this->GrnMRP->EditValue))
				$this->GrnMRP->EditValue = FormatNumber($this->GrnMRP->EditValue, -2, -2, -2, -2);
			

			// trid
			$this->trid->EditAttrs["class"] = "form-control";
			$this->trid->EditCustomAttributes = "";
			$this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
			$this->trid->PlaceHolder = RemoveHtml($this->trid->caption());

			// HospID
			// CreatedBy
			// CreatedDateTime
			// ModifiedBy
			// ModifiedDateTime
			// grncreatedby

			$this->grncreatedby->EditAttrs["class"] = "form-control";
			$this->grncreatedby->EditCustomAttributes = "";
			$this->grncreatedby->EditValue = HtmlEncode($this->grncreatedby->CurrentValue);
			$this->grncreatedby->PlaceHolder = RemoveHtml($this->grncreatedby->caption());

			// grncreatedDateTime
			$this->grncreatedDateTime->EditAttrs["class"] = "form-control";
			$this->grncreatedDateTime->EditCustomAttributes = "";
			$this->grncreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->grncreatedDateTime->CurrentValue, 8));
			$this->grncreatedDateTime->PlaceHolder = RemoveHtml($this->grncreatedDateTime->caption());

			// grnModifiedby
			$this->grnModifiedby->EditAttrs["class"] = "form-control";
			$this->grnModifiedby->EditCustomAttributes = "";
			$this->grnModifiedby->EditValue = HtmlEncode($this->grnModifiedby->CurrentValue);
			$this->grnModifiedby->PlaceHolder = RemoveHtml($this->grnModifiedby->caption());

			// grnModifiedDateTime
			$this->grnModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->grnModifiedDateTime->EditCustomAttributes = "";
			$this->grnModifiedDateTime->EditValue = HtmlEncode(FormatDateTime($this->grnModifiedDateTime->CurrentValue, 8));
			$this->grnModifiedDateTime->PlaceHolder = RemoveHtml($this->grnModifiedDateTime->caption());

			// Received
			$this->Received->EditCustomAttributes = "";
			$this->Received->EditValue = $this->Received->options(FALSE);

			// BillDate
			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// CurStock
			$this->CurStock->EditAttrs["class"] = "form-control";
			$this->CurStock->EditCustomAttributes = "";
			$this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
			$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

			// Edit refer script
			// ORDNO

			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";

			// Printcheck
			$this->Printcheck->LinkCustomAttributes = "";
			$this->Printcheck->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// poid
			$this->poid->LinkCustomAttributes = "";
			$this->poid->HrefValue = "";

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

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// HSN
			$this->HSN->LinkCustomAttributes = "";
			$this->HSN->HrefValue = "";

			// Pack
			$this->Pack->LinkCustomAttributes = "";
			$this->Pack->HrefValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";

			// GrnQuantity
			$this->GrnQuantity->LinkCustomAttributes = "";
			$this->GrnQuantity->HrefValue = "";

			// GrnMRP
			$this->GrnMRP->LinkCustomAttributes = "";
			$this->GrnMRP->HrefValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";

			// Received
			$this->Received->LinkCustomAttributes = "";
			$this->Received->HrefValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
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
		if ($this->ORDNO->Required) {
			if (!$this->ORDNO->IsDetailKey && $this->ORDNO->FormValue != NULL && $this->ORDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->QTY->Required) {
			if (!$this->QTY->IsDetailKey && $this->QTY->FormValue != NULL && $this->QTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QTY->caption(), $this->QTY->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->QTY->FormValue)) {
			AddMessage($FormError, $this->QTY->errorMessage());
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DT->FormValue)) {
			AddMessage($FormError, $this->DT->errorMessage());
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->YM->Required) {
			if (!$this->YM->IsDetailKey && $this->YM->FormValue != NULL && $this->YM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->Stock->Required) {
			if (!$this->Stock->IsDetailKey && $this->Stock->FormValue != NULL && $this->Stock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stock->caption(), $this->Stock->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Stock->FormValue)) {
			AddMessage($FormError, $this->Stock->errorMessage());
		}
		if ($this->LastMonthSale->Required) {
			if (!$this->LastMonthSale->IsDetailKey && $this->LastMonthSale->FormValue != NULL && $this->LastMonthSale->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LastMonthSale->FormValue)) {
			AddMessage($FormError, $this->LastMonthSale->errorMessage());
		}
		if ($this->Printcheck->Required) {
			if (!$this->Printcheck->IsDetailKey && $this->Printcheck->FormValue != NULL && $this->Printcheck->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printcheck->caption(), $this->Printcheck->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->poid->Required) {
			if (!$this->poid->IsDetailKey && $this->poid->FormValue != NULL && $this->poid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->poid->caption(), $this->poid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->poid->FormValue)) {
			AddMessage($FormError, $this->poid->errorMessage());
		}
		if ($this->PSGST->Required) {
			if (!$this->PSGST->IsDetailKey && $this->PSGST->FormValue != NULL && $this->PSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
			}
		}
		if ($this->PCGST->Required) {
			if (!$this->PCGST->IsDetailKey && $this->PCGST->FormValue != NULL && $this->PCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
			}
		}
		if ($this->SSGST->Required) {
			if (!$this->SSGST->IsDetailKey && $this->SSGST->FormValue != NULL && $this->SSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
			}
		}
		if ($this->SCGST->Required) {
			if (!$this->SCGST->IsDetailKey && $this->SCGST->FormValue != NULL && $this->SCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
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
		if ($this->HSN->Required) {
			if (!$this->HSN->IsDetailKey && $this->HSN->FormValue != NULL && $this->HSN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSN->caption(), $this->HSN->RequiredErrorMessage));
			}
		}
		if ($this->Pack->Required) {
			if (!$this->Pack->IsDetailKey && $this->Pack->FormValue != NULL && $this->Pack->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pack->caption(), $this->Pack->RequiredErrorMessage));
			}
		}
		if ($this->PUnit->Required) {
			if (!$this->PUnit->IsDetailKey && $this->PUnit->FormValue != NULL && $this->PUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PUnit->caption(), $this->PUnit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PUnit->FormValue)) {
			AddMessage($FormError, $this->PUnit->errorMessage());
		}
		if ($this->SUnit->Required) {
			if (!$this->SUnit->IsDetailKey && $this->SUnit->FormValue != NULL && $this->SUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SUnit->caption(), $this->SUnit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SUnit->FormValue)) {
			AddMessage($FormError, $this->SUnit->errorMessage());
		}
		if ($this->GrnQuantity->Required) {
			if (!$this->GrnQuantity->IsDetailKey && $this->GrnQuantity->FormValue != NULL && $this->GrnQuantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnQuantity->caption(), $this->GrnQuantity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->GrnQuantity->FormValue)) {
			AddMessage($FormError, $this->GrnQuantity->errorMessage());
		}
		if ($this->GrnMRP->Required) {
			if (!$this->GrnMRP->IsDetailKey && $this->GrnMRP->FormValue != NULL && $this->GrnMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnMRP->caption(), $this->GrnMRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GrnMRP->FormValue)) {
			AddMessage($FormError, $this->GrnMRP->errorMessage());
		}
		if ($this->trid->Required) {
			if (!$this->trid->IsDetailKey && $this->trid->FormValue != NULL && $this->trid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->trid->caption(), $this->trid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->trid->FormValue)) {
			AddMessage($FormError, $this->trid->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->grncreatedby->Required) {
			if (!$this->grncreatedby->IsDetailKey && $this->grncreatedby->FormValue != NULL && $this->grncreatedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->grncreatedby->FormValue)) {
			AddMessage($FormError, $this->grncreatedby->errorMessage());
		}
		if ($this->grncreatedDateTime->Required) {
			if (!$this->grncreatedDateTime->IsDetailKey && $this->grncreatedDateTime->FormValue != NULL && $this->grncreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->grncreatedDateTime->FormValue)) {
			AddMessage($FormError, $this->grncreatedDateTime->errorMessage());
		}
		if ($this->grnModifiedby->Required) {
			if (!$this->grnModifiedby->IsDetailKey && $this->grnModifiedby->FormValue != NULL && $this->grnModifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->grnModifiedby->FormValue)) {
			AddMessage($FormError, $this->grnModifiedby->errorMessage());
		}
		if ($this->grnModifiedDateTime->Required) {
			if (!$this->grnModifiedDateTime->IsDetailKey && $this->grnModifiedDateTime->FormValue != NULL && $this->grnModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->grnModifiedDateTime->FormValue)) {
			AddMessage($FormError, $this->grnModifiedDateTime->errorMessage());
		}
		if ($this->Received->Required) {
			if ($this->Received->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Received->caption(), $this->Received->RequiredErrorMessage));
			}
		}
		if ($this->BillDate->Required) {
			if (!$this->BillDate->IsDetailKey && $this->BillDate->FormValue != NULL && $this->BillDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BillDate->FormValue)) {
			AddMessage($FormError, $this->BillDate->errorMessage());
		}
		if ($this->CurStock->Required) {
			if (!$this->CurStock->IsDetailKey && $this->CurStock->FormValue != NULL && $this->CurStock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CurStock->caption(), $this->CurStock->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CurStock->FormValue)) {
			AddMessage($FormError, $this->CurStock->errorMessage());
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

			// ORDNO
			$this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, NULL, $this->ORDNO->ReadOnly);

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// QTY
			$this->QTY->setDbValueDef($rsnew, $this->QTY->CurrentValue, NULL, $this->QTY->ReadOnly);

			// DT
			$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), NULL, $this->DT->ReadOnly);

			// PC
			$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, $this->PC->ReadOnly);

			// YM
			$this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, NULL, $this->YM->ReadOnly);

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// Stock
			$this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, NULL, $this->Stock->ReadOnly);

			// LastMonthSale
			$this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, NULL, $this->LastMonthSale->ReadOnly);

			// Printcheck
			$this->Printcheck->setDbValueDef($rsnew, $this->Printcheck->CurrentValue, NULL, $this->Printcheck->ReadOnly);

			// poid
			$this->poid->setDbValueDef($rsnew, $this->poid->CurrentValue, NULL, $this->poid->ReadOnly);

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// HSN
			$this->HSN->setDbValueDef($rsnew, $this->HSN->CurrentValue, NULL, $this->HSN->ReadOnly);

			// Pack
			$this->Pack->setDbValueDef($rsnew, $this->Pack->CurrentValue, NULL, $this->Pack->ReadOnly);

			// PUnit
			$this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, NULL, $this->PUnit->ReadOnly);

			// SUnit
			$this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, NULL, $this->SUnit->ReadOnly);

			// GrnQuantity
			$this->GrnQuantity->setDbValueDef($rsnew, $this->GrnQuantity->CurrentValue, NULL, $this->GrnQuantity->ReadOnly);

			// GrnMRP
			$this->GrnMRP->setDbValueDef($rsnew, $this->GrnMRP->CurrentValue, NULL, $this->GrnMRP->ReadOnly);

			// trid
			$this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, NULL, $this->trid->ReadOnly);

			// HospID
			$this->HospID->CurrentValue = HospitalID();
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

			// CreatedBy
			$this->CreatedBy->CurrentValue = CurrentUserID();
			$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL);

			// CreatedDateTime
			$this->CreatedDateTime->CurrentValue = CurrentDateTime();
			$this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, NULL);

			// ModifiedBy
			$this->ModifiedBy->CurrentValue = CurrentUserID();
			$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL);

			// ModifiedDateTime
			$this->ModifiedDateTime->CurrentValue = CurrentDateTime();
			$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL);

			// grncreatedby
			$this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, NULL, $this->grncreatedby->ReadOnly);

			// grncreatedDateTime
			$this->grncreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0), NULL, $this->grncreatedDateTime->ReadOnly);

			// grnModifiedby
			$this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, NULL, $this->grnModifiedby->ReadOnly);

			// grnModifiedDateTime
			$this->grnModifiedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0), NULL, $this->grnModifiedDateTime->ReadOnly);

			// Received
			$this->Received->setDbValueDef($rsnew, $this->Received->CurrentValue, NULL, $this->Received->ReadOnly);

			// BillDate
			$this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), NULL, $this->BillDate->ReadOnly);

			// CurStock
			$this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, NULL, $this->CurStock->ReadOnly);

			// Check referential integrity for master table 'pharmacy_po'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_pharmacy_po();
			$keyValue = isset($rsnew['poid']) ? $rsnew['poid'] : $rsold['poid'];
			if (strval($keyValue) != "") {
				$masterFilter = str_replace("@id@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["pharmacy_po"]))
					$GLOBALS["pharmacy_po"] = new pharmacy_po();
				$rsmaster = $GLOBALS["pharmacy_po"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "pharmacy_po", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
			}

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
			if ($masterTblVar == "pharmacy_po") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("poid"))) !== NULL) {
					$GLOBALS["pharmacy_po"]->id->setQueryStringValue($parm);
					$this->poid->setQueryStringValue($GLOBALS["pharmacy_po"]->id->QueryStringValue);
					$this->poid->setSessionValue($this->poid->QueryStringValue);
					if (!is_numeric($GLOBALS["pharmacy_po"]->id->QueryStringValue))
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
			if ($masterTblVar == "pharmacy_po") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("poid"))) !== NULL) {
					$GLOBALS["pharmacy_po"]->id->setFormValue($parm);
					$this->poid->setFormValue($GLOBALS["pharmacy_po"]->id->FormValue);
					$this->poid->setSessionValue($this->poid->FormValue);
					if (!is_numeric($GLOBALS["pharmacy_po"]->id->FormValue))
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
			if ($masterTblVar != "pharmacy_po") {
				if ($this->poid->CurrentValue == "")
					$this->poid->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_purchaseorderlist.php"), "", $this->TableVar, TRUE);
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
				case "x_PRC":
					break;
				case "x_PC":
					break;
				case "x_Received":
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
						case "x_PRC":
							break;
						case "x_PC":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
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
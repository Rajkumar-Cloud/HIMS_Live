<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pharmacy_storemast_add extends pharmacy_storemast
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_storemast';

	// Page object name
	public $PageObjName = "pharmacy_storemast_add";

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

		// Table object (pharmacy_storemast)
		if (!isset($GLOBALS["pharmacy_storemast"]) || get_class($GLOBALS["pharmacy_storemast"]) == PROJECT_NAMESPACE . "pharmacy_storemast") {
			$GLOBALS["pharmacy_storemast"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_storemast"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_storemast');

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
		global $pharmacy_storemast;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pharmacy_storemast);
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
					if ($pageName == "pharmacy_storemastview.php")
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
					$this->terminate(GetUrl("pharmacy_storemastlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->BRCODE->setVisibility();
		$this->PRC->setVisibility();
		$this->TYPE->setVisibility();
		$this->DES->setVisibility();
		$this->UM->setVisibility();
		$this->RT->setVisibility();
		$this->UR->Visible = FALSE;
		$this->TAXP->Visible = FALSE;
		$this->BATCHNO->setVisibility();
		$this->OQ->Visible = FALSE;
		$this->RQ->Visible = FALSE;
		$this->MRQ->Visible = FALSE;
		$this->IQ->Visible = FALSE;
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->SALQTY->Visible = FALSE;
		$this->LASTPURDT->setVisibility();
		$this->LASTSUPP->setVisibility();
		$this->GENNAME->setVisibility();
		$this->LASTISSDT->setVisibility();
		$this->CREATEDDT->setVisibility();
		$this->OPPRC->Visible = FALSE;
		$this->RESTRICT->Visible = FALSE;
		$this->BAWAPRC->Visible = FALSE;
		$this->STAXPER->Visible = FALSE;
		$this->TAXTYPE->Visible = FALSE;
		$this->OLDTAXP->Visible = FALSE;
		$this->TAXUPD->Visible = FALSE;
		$this->PACKAGE->Visible = FALSE;
		$this->NEWRT->Visible = FALSE;
		$this->NEWMRP->Visible = FALSE;
		$this->NEWUR->Visible = FALSE;
		$this->STATUS->Visible = FALSE;
		$this->RETNQTY->Visible = FALSE;
		$this->KEMODISC->Visible = FALSE;
		$this->PATSALE->Visible = FALSE;
		$this->ORGAN->Visible = FALSE;
		$this->OLDRQ->Visible = FALSE;
		$this->DRID->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->COMBCODE->setVisibility();
		$this->GENCODE->setVisibility();
		$this->STRENGTH->setVisibility();
		$this->UNIT->setVisibility();
		$this->FORMULARY->setVisibility();
		$this->STOCK->Visible = FALSE;
		$this->RACKNO->setVisibility();
		$this->SUPPNAME->setVisibility();
		$this->COMBNAME->setVisibility();
		$this->GENERICNAME->setVisibility();
		$this->REMARK->setVisibility();
		$this->TEMP->setVisibility();
		$this->PACKING->Visible = FALSE;
		$this->PhysQty->Visible = FALSE;
		$this->LedQty->Visible = FALSE;
		$this->id->Visible = FALSE;
		$this->PurValue->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SaleValue->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->SaleRate->setVisibility();
		$this->HospID->setVisibility();
		$this->BRNAME->setVisibility();
		$this->OV->Visible = FALSE;
		$this->LATESTOV->Visible = FALSE;
		$this->ITEMTYPE->Visible = FALSE;
		$this->ROWID->Visible = FALSE;
		$this->MOVED->Visible = FALSE;
		$this->NEWTAX->Visible = FALSE;
		$this->HSNCODE->Visible = FALSE;
		$this->OLDTAX->Visible = FALSE;
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
		$this->setupLookupOptions($this->LASTSUPP);
		$this->setupLookupOptions($this->GENNAME);
		$this->setupLookupOptions($this->DRID);
		$this->setupLookupOptions($this->MFRCODE);
		$this->setupLookupOptions($this->COMBCODE);
		$this->setupLookupOptions($this->GENCODE);
		$this->setupLookupOptions($this->SUPPNAME);
		$this->setupLookupOptions($this->COMBNAME);
		$this->setupLookupOptions($this->GENERICNAME);

		// Check permission
		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("pharmacy_storemastlist.php");
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
					$this->terminate("pharmacy_storemastlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "pharmacy_storemastlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "pharmacy_storemastview.php")
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
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->TYPE->CurrentValue = NULL;
		$this->TYPE->OldValue = $this->TYPE->CurrentValue;
		$this->DES->CurrentValue = NULL;
		$this->DES->OldValue = $this->DES->CurrentValue;
		$this->UM->CurrentValue = NULL;
		$this->UM->OldValue = $this->UM->CurrentValue;
		$this->RT->CurrentValue = NULL;
		$this->RT->OldValue = $this->RT->CurrentValue;
		$this->UR->CurrentValue = NULL;
		$this->UR->OldValue = $this->UR->CurrentValue;
		$this->TAXP->CurrentValue = NULL;
		$this->TAXP->OldValue = $this->TAXP->CurrentValue;
		$this->BATCHNO->CurrentValue = NULL;
		$this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
		$this->OQ->CurrentValue = NULL;
		$this->OQ->OldValue = $this->OQ->CurrentValue;
		$this->RQ->CurrentValue = NULL;
		$this->RQ->OldValue = $this->RQ->CurrentValue;
		$this->MRQ->CurrentValue = NULL;
		$this->MRQ->OldValue = $this->MRQ->CurrentValue;
		$this->IQ->CurrentValue = NULL;
		$this->IQ->OldValue = $this->IQ->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->EXPDT->CurrentValue = NULL;
		$this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
		$this->SALQTY->CurrentValue = NULL;
		$this->SALQTY->OldValue = $this->SALQTY->CurrentValue;
		$this->LASTPURDT->CurrentValue = NULL;
		$this->LASTPURDT->OldValue = $this->LASTPURDT->CurrentValue;
		$this->LASTSUPP->CurrentValue = NULL;
		$this->LASTSUPP->OldValue = $this->LASTSUPP->CurrentValue;
		$this->GENNAME->CurrentValue = NULL;
		$this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
		$this->LASTISSDT->CurrentValue = NULL;
		$this->LASTISSDT->OldValue = $this->LASTISSDT->CurrentValue;
		$this->CREATEDDT->CurrentValue = NULL;
		$this->CREATEDDT->OldValue = $this->CREATEDDT->CurrentValue;
		$this->OPPRC->CurrentValue = NULL;
		$this->OPPRC->OldValue = $this->OPPRC->CurrentValue;
		$this->RESTRICT->CurrentValue = NULL;
		$this->RESTRICT->OldValue = $this->RESTRICT->CurrentValue;
		$this->BAWAPRC->CurrentValue = NULL;
		$this->BAWAPRC->OldValue = $this->BAWAPRC->CurrentValue;
		$this->STAXPER->CurrentValue = NULL;
		$this->STAXPER->OldValue = $this->STAXPER->CurrentValue;
		$this->TAXTYPE->CurrentValue = NULL;
		$this->TAXTYPE->OldValue = $this->TAXTYPE->CurrentValue;
		$this->OLDTAXP->CurrentValue = NULL;
		$this->OLDTAXP->OldValue = $this->OLDTAXP->CurrentValue;
		$this->TAXUPD->CurrentValue = NULL;
		$this->TAXUPD->OldValue = $this->TAXUPD->CurrentValue;
		$this->PACKAGE->CurrentValue = NULL;
		$this->PACKAGE->OldValue = $this->PACKAGE->CurrentValue;
		$this->NEWRT->CurrentValue = NULL;
		$this->NEWRT->OldValue = $this->NEWRT->CurrentValue;
		$this->NEWMRP->CurrentValue = NULL;
		$this->NEWMRP->OldValue = $this->NEWMRP->CurrentValue;
		$this->NEWUR->CurrentValue = NULL;
		$this->NEWUR->OldValue = $this->NEWUR->CurrentValue;
		$this->STATUS->CurrentValue = NULL;
		$this->STATUS->OldValue = $this->STATUS->CurrentValue;
		$this->RETNQTY->CurrentValue = NULL;
		$this->RETNQTY->OldValue = $this->RETNQTY->CurrentValue;
		$this->KEMODISC->CurrentValue = NULL;
		$this->KEMODISC->OldValue = $this->KEMODISC->CurrentValue;
		$this->PATSALE->CurrentValue = NULL;
		$this->PATSALE->OldValue = $this->PATSALE->CurrentValue;
		$this->ORGAN->CurrentValue = NULL;
		$this->ORGAN->OldValue = $this->ORGAN->CurrentValue;
		$this->OLDRQ->CurrentValue = NULL;
		$this->OLDRQ->OldValue = $this->OLDRQ->CurrentValue;
		$this->DRID->CurrentValue = NULL;
		$this->DRID->OldValue = $this->DRID->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->COMBCODE->CurrentValue = NULL;
		$this->COMBCODE->OldValue = $this->COMBCODE->CurrentValue;
		$this->GENCODE->CurrentValue = NULL;
		$this->GENCODE->OldValue = $this->GENCODE->CurrentValue;
		$this->STRENGTH->CurrentValue = NULL;
		$this->STRENGTH->OldValue = $this->STRENGTH->CurrentValue;
		$this->UNIT->CurrentValue = NULL;
		$this->UNIT->OldValue = $this->UNIT->CurrentValue;
		$this->FORMULARY->CurrentValue = NULL;
		$this->FORMULARY->OldValue = $this->FORMULARY->CurrentValue;
		$this->STOCK->CurrentValue = NULL;
		$this->STOCK->OldValue = $this->STOCK->CurrentValue;
		$this->RACKNO->CurrentValue = NULL;
		$this->RACKNO->OldValue = $this->RACKNO->CurrentValue;
		$this->SUPPNAME->CurrentValue = NULL;
		$this->SUPPNAME->OldValue = $this->SUPPNAME->CurrentValue;
		$this->COMBNAME->CurrentValue = NULL;
		$this->COMBNAME->OldValue = $this->COMBNAME->CurrentValue;
		$this->GENERICNAME->CurrentValue = NULL;
		$this->GENERICNAME->OldValue = $this->GENERICNAME->CurrentValue;
		$this->REMARK->CurrentValue = NULL;
		$this->REMARK->OldValue = $this->REMARK->CurrentValue;
		$this->TEMP->CurrentValue = NULL;
		$this->TEMP->OldValue = $this->TEMP->CurrentValue;
		$this->PACKING->CurrentValue = NULL;
		$this->PACKING->OldValue = $this->PACKING->CurrentValue;
		$this->PhysQty->CurrentValue = NULL;
		$this->PhysQty->OldValue = $this->PhysQty->CurrentValue;
		$this->LedQty->CurrentValue = NULL;
		$this->LedQty->OldValue = $this->LedQty->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->PurValue->CurrentValue = NULL;
		$this->PurValue->OldValue = $this->PurValue->CurrentValue;
		$this->PSGST->CurrentValue = NULL;
		$this->PSGST->OldValue = $this->PSGST->CurrentValue;
		$this->PCGST->CurrentValue = NULL;
		$this->PCGST->OldValue = $this->PCGST->CurrentValue;
		$this->SaleValue->CurrentValue = NULL;
		$this->SaleValue->OldValue = $this->SaleValue->CurrentValue;
		$this->SSGST->CurrentValue = NULL;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = NULL;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->SaleRate->CurrentValue = NULL;
		$this->SaleRate->OldValue = $this->SaleRate->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->BRNAME->CurrentValue = NULL;
		$this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
		$this->OV->CurrentValue = NULL;
		$this->OV->OldValue = $this->OV->CurrentValue;
		$this->LATESTOV->CurrentValue = NULL;
		$this->LATESTOV->OldValue = $this->LATESTOV->CurrentValue;
		$this->ITEMTYPE->CurrentValue = NULL;
		$this->ITEMTYPE->OldValue = $this->ITEMTYPE->CurrentValue;
		$this->ROWID->CurrentValue = NULL;
		$this->ROWID->OldValue = $this->ROWID->CurrentValue;
		$this->MOVED->CurrentValue = NULL;
		$this->MOVED->OldValue = $this->MOVED->CurrentValue;
		$this->NEWTAX->CurrentValue = NULL;
		$this->NEWTAX->OldValue = $this->NEWTAX->CurrentValue;
		$this->HSNCODE->CurrentValue = NULL;
		$this->HSNCODE->OldValue = $this->HSNCODE->CurrentValue;
		$this->OLDTAX->CurrentValue = NULL;
		$this->OLDTAX->OldValue = $this->OLDTAX->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'TYPE' first before field var 'x_TYPE'
		$val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
		if (!$this->TYPE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->TYPE->setFormValue($val);
		}

		// Check field name 'DES' first before field var 'x_DES'
		$val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
		if (!$this->DES->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DES->Visible = FALSE; // Disable update for API request
			else
				$this->DES->setFormValue($val);
		}

		// Check field name 'UM' first before field var 'x_UM'
		$val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
		if (!$this->UM->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UM->Visible = FALSE; // Disable update for API request
			else
				$this->UM->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
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

		// Check field name 'LASTPURDT' first before field var 'x_LASTPURDT'
		$val = $CurrentForm->hasValue("LASTPURDT") ? $CurrentForm->getValue("LASTPURDT") : $CurrentForm->getValue("x_LASTPURDT");
		if (!$this->LASTPURDT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LASTPURDT->Visible = FALSE; // Disable update for API request
			else
				$this->LASTPURDT->setFormValue($val);
			$this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
		}

		// Check field name 'LASTSUPP' first before field var 'x_LASTSUPP'
		$val = $CurrentForm->hasValue("LASTSUPP") ? $CurrentForm->getValue("LASTSUPP") : $CurrentForm->getValue("x_LASTSUPP");
		if (!$this->LASTSUPP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LASTSUPP->Visible = FALSE; // Disable update for API request
			else
				$this->LASTSUPP->setFormValue($val);
		}

		// Check field name 'GENNAME' first before field var 'x_GENNAME'
		$val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
		if (!$this->GENNAME->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GENNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENNAME->setFormValue($val);
		}

		// Check field name 'LASTISSDT' first before field var 'x_LASTISSDT'
		$val = $CurrentForm->hasValue("LASTISSDT") ? $CurrentForm->getValue("LASTISSDT") : $CurrentForm->getValue("x_LASTISSDT");
		if (!$this->LASTISSDT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LASTISSDT->Visible = FALSE; // Disable update for API request
			else
				$this->LASTISSDT->setFormValue($val);
			$this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
		}

		// Check field name 'CREATEDDT' first before field var 'x_CREATEDDT'
		$val = $CurrentForm->hasValue("CREATEDDT") ? $CurrentForm->getValue("CREATEDDT") : $CurrentForm->getValue("x_CREATEDDT");
		if (!$this->CREATEDDT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CREATEDDT->Visible = FALSE; // Disable update for API request
			else
				$this->CREATEDDT->setFormValue($val);
			$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		}

		// Check field name 'DRID' first before field var 'x_DRID'
		$val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
		if (!$this->DRID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DRID->Visible = FALSE; // Disable update for API request
			else
				$this->DRID->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'COMBCODE' first before field var 'x_COMBCODE'
		$val = $CurrentForm->hasValue("COMBCODE") ? $CurrentForm->getValue("COMBCODE") : $CurrentForm->getValue("x_COMBCODE");
		if (!$this->COMBCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->COMBCODE->Visible = FALSE; // Disable update for API request
			else
				$this->COMBCODE->setFormValue($val);
		}

		// Check field name 'GENCODE' first before field var 'x_GENCODE'
		$val = $CurrentForm->hasValue("GENCODE") ? $CurrentForm->getValue("GENCODE") : $CurrentForm->getValue("x_GENCODE");
		if (!$this->GENCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GENCODE->Visible = FALSE; // Disable update for API request
			else
				$this->GENCODE->setFormValue($val);
		}

		// Check field name 'STRENGTH' first before field var 'x_STRENGTH'
		$val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
		if (!$this->STRENGTH->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->STRENGTH->Visible = FALSE; // Disable update for API request
			else
				$this->STRENGTH->setFormValue($val);
		}

		// Check field name 'UNIT' first before field var 'x_UNIT'
		$val = $CurrentForm->hasValue("UNIT") ? $CurrentForm->getValue("UNIT") : $CurrentForm->getValue("x_UNIT");
		if (!$this->UNIT->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UNIT->Visible = FALSE; // Disable update for API request
			else
				$this->UNIT->setFormValue($val);
		}

		// Check field name 'FORMULARY' first before field var 'x_FORMULARY'
		$val = $CurrentForm->hasValue("FORMULARY") ? $CurrentForm->getValue("FORMULARY") : $CurrentForm->getValue("x_FORMULARY");
		if (!$this->FORMULARY->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->FORMULARY->Visible = FALSE; // Disable update for API request
			else
				$this->FORMULARY->setFormValue($val);
		}

		// Check field name 'RACKNO' first before field var 'x_RACKNO'
		$val = $CurrentForm->hasValue("RACKNO") ? $CurrentForm->getValue("RACKNO") : $CurrentForm->getValue("x_RACKNO");
		if (!$this->RACKNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RACKNO->Visible = FALSE; // Disable update for API request
			else
				$this->RACKNO->setFormValue($val);
		}

		// Check field name 'SUPPNAME' first before field var 'x_SUPPNAME'
		$val = $CurrentForm->hasValue("SUPPNAME") ? $CurrentForm->getValue("SUPPNAME") : $CurrentForm->getValue("x_SUPPNAME");
		if (!$this->SUPPNAME->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SUPPNAME->Visible = FALSE; // Disable update for API request
			else
				$this->SUPPNAME->setFormValue($val);
		}

		// Check field name 'COMBNAME' first before field var 'x_COMBNAME'
		$val = $CurrentForm->hasValue("COMBNAME") ? $CurrentForm->getValue("COMBNAME") : $CurrentForm->getValue("x_COMBNAME");
		if (!$this->COMBNAME->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->COMBNAME->Visible = FALSE; // Disable update for API request
			else
				$this->COMBNAME->setFormValue($val);
		}

		// Check field name 'GENERICNAME' first before field var 'x_GENERICNAME'
		$val = $CurrentForm->hasValue("GENERICNAME") ? $CurrentForm->getValue("GENERICNAME") : $CurrentForm->getValue("x_GENERICNAME");
		if (!$this->GENERICNAME->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->GENERICNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENERICNAME->setFormValue($val);
		}

		// Check field name 'REMARK' first before field var 'x_REMARK'
		$val = $CurrentForm->hasValue("REMARK") ? $CurrentForm->getValue("REMARK") : $CurrentForm->getValue("x_REMARK");
		if (!$this->REMARK->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->REMARK->Visible = FALSE; // Disable update for API request
			else
				$this->REMARK->setFormValue($val);
		}

		// Check field name 'TEMP' first before field var 'x_TEMP'
		$val = $CurrentForm->hasValue("TEMP") ? $CurrentForm->getValue("TEMP") : $CurrentForm->getValue("x_TEMP");
		if (!$this->TEMP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TEMP->Visible = FALSE; // Disable update for API request
			else
				$this->TEMP->setFormValue($val);
		}

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PurValue->Visible = FALSE; // Disable update for API request
			else
				$this->PurValue->setFormValue($val);
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

		// Check field name 'SaleValue' first before field var 'x_SaleValue'
		$val = $CurrentForm->hasValue("SaleValue") ? $CurrentForm->getValue("SaleValue") : $CurrentForm->getValue("x_SaleValue");
		if (!$this->SaleValue->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SaleValue->Visible = FALSE; // Disable update for API request
			else
				$this->SaleValue->setFormValue($val);
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

		// Check field name 'SaleRate' first before field var 'x_SaleRate'
		$val = $CurrentForm->hasValue("SaleRate") ? $CurrentForm->getValue("SaleRate") : $CurrentForm->getValue("x_SaleRate");
		if (!$this->SaleRate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SaleRate->Visible = FALSE; // Disable update for API request
			else
				$this->SaleRate->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->BRNAME->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->TYPE->CurrentValue = $this->TYPE->FormValue;
		$this->DES->CurrentValue = $this->DES->FormValue;
		$this->UM->CurrentValue = $this->UM->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->LASTPURDT->CurrentValue = $this->LASTPURDT->FormValue;
		$this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
		$this->LASTSUPP->CurrentValue = $this->LASTSUPP->FormValue;
		$this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
		$this->LASTISSDT->CurrentValue = $this->LASTISSDT->FormValue;
		$this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
		$this->CREATEDDT->CurrentValue = $this->CREATEDDT->FormValue;
		$this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
		$this->DRID->CurrentValue = $this->DRID->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->COMBCODE->CurrentValue = $this->COMBCODE->FormValue;
		$this->GENCODE->CurrentValue = $this->GENCODE->FormValue;
		$this->STRENGTH->CurrentValue = $this->STRENGTH->FormValue;
		$this->UNIT->CurrentValue = $this->UNIT->FormValue;
		$this->FORMULARY->CurrentValue = $this->FORMULARY->FormValue;
		$this->RACKNO->CurrentValue = $this->RACKNO->FormValue;
		$this->SUPPNAME->CurrentValue = $this->SUPPNAME->FormValue;
		$this->COMBNAME->CurrentValue = $this->COMBNAME->FormValue;
		$this->GENERICNAME->CurrentValue = $this->GENERICNAME->FormValue;
		$this->REMARK->CurrentValue = $this->REMARK->FormValue;
		$this->TEMP->CurrentValue = $this->TEMP->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SaleValue->CurrentValue = $this->SaleValue->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->SaleRate->CurrentValue = $this->SaleRate->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
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
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->PRC->setDbValue($row['PRC']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DES->setDbValue($row['DES']);
		$this->UM->setDbValue($row['UM']);
		$this->RT->setDbValue($row['RT']);
		$this->UR->setDbValue($row['UR']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->SALQTY->setDbValue($row['SALQTY']);
		$this->LASTPURDT->setDbValue($row['LASTPURDT']);
		$this->LASTSUPP->setDbValue($row['LASTSUPP']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->LASTISSDT->setDbValue($row['LASTISSDT']);
		$this->CREATEDDT->setDbValue($row['CREATEDDT']);
		$this->OPPRC->setDbValue($row['OPPRC']);
		$this->RESTRICT->setDbValue($row['RESTRICT']);
		$this->BAWAPRC->setDbValue($row['BAWAPRC']);
		$this->STAXPER->setDbValue($row['STAXPER']);
		$this->TAXTYPE->setDbValue($row['TAXTYPE']);
		$this->OLDTAXP->setDbValue($row['OLDTAXP']);
		$this->TAXUPD->setDbValue($row['TAXUPD']);
		$this->PACKAGE->setDbValue($row['PACKAGE']);
		$this->NEWRT->setDbValue($row['NEWRT']);
		$this->NEWMRP->setDbValue($row['NEWMRP']);
		$this->NEWUR->setDbValue($row['NEWUR']);
		$this->STATUS->setDbValue($row['STATUS']);
		$this->RETNQTY->setDbValue($row['RETNQTY']);
		$this->KEMODISC->setDbValue($row['KEMODISC']);
		$this->PATSALE->setDbValue($row['PATSALE']);
		$this->ORGAN->setDbValue($row['ORGAN']);
		$this->OLDRQ->setDbValue($row['OLDRQ']);
		$this->DRID->setDbValue($row['DRID']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->COMBCODE->setDbValue($row['COMBCODE']);
		$this->GENCODE->setDbValue($row['GENCODE']);
		$this->STRENGTH->setDbValue($row['STRENGTH']);
		$this->UNIT->setDbValue($row['UNIT']);
		$this->FORMULARY->setDbValue($row['FORMULARY']);
		$this->STOCK->setDbValue($row['STOCK']);
		$this->RACKNO->setDbValue($row['RACKNO']);
		$this->SUPPNAME->setDbValue($row['SUPPNAME']);
		$this->COMBNAME->setDbValue($row['COMBNAME']);
		$this->GENERICNAME->setDbValue($row['GENERICNAME']);
		$this->REMARK->setDbValue($row['REMARK']);
		$this->TEMP->setDbValue($row['TEMP']);
		$this->PACKING->setDbValue($row['PACKING']);
		$this->PhysQty->setDbValue($row['PhysQty']);
		$this->LedQty->setDbValue($row['LedQty']);
		$this->id->setDbValue($row['id']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SaleValue->setDbValue($row['SaleValue']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->SaleRate->setDbValue($row['SaleRate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->BRNAME->setDbValue($row['BRNAME']);
		$this->OV->setDbValue($row['OV']);
		$this->LATESTOV->setDbValue($row['LATESTOV']);
		$this->ITEMTYPE->setDbValue($row['ITEMTYPE']);
		$this->ROWID->setDbValue($row['ROWID']);
		$this->MOVED->setDbValue($row['MOVED']);
		$this->NEWTAX->setDbValue($row['NEWTAX']);
		$this->HSNCODE->setDbValue($row['HSNCODE']);
		$this->OLDTAX->setDbValue($row['OLDTAX']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['TYPE'] = $this->TYPE->CurrentValue;
		$row['DES'] = $this->DES->CurrentValue;
		$row['UM'] = $this->UM->CurrentValue;
		$row['RT'] = $this->RT->CurrentValue;
		$row['UR'] = $this->UR->CurrentValue;
		$row['TAXP'] = $this->TAXP->CurrentValue;
		$row['BATCHNO'] = $this->BATCHNO->CurrentValue;
		$row['OQ'] = $this->OQ->CurrentValue;
		$row['RQ'] = $this->RQ->CurrentValue;
		$row['MRQ'] = $this->MRQ->CurrentValue;
		$row['IQ'] = $this->IQ->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['EXPDT'] = $this->EXPDT->CurrentValue;
		$row['SALQTY'] = $this->SALQTY->CurrentValue;
		$row['LASTPURDT'] = $this->LASTPURDT->CurrentValue;
		$row['LASTSUPP'] = $this->LASTSUPP->CurrentValue;
		$row['GENNAME'] = $this->GENNAME->CurrentValue;
		$row['LASTISSDT'] = $this->LASTISSDT->CurrentValue;
		$row['CREATEDDT'] = $this->CREATEDDT->CurrentValue;
		$row['OPPRC'] = $this->OPPRC->CurrentValue;
		$row['RESTRICT'] = $this->RESTRICT->CurrentValue;
		$row['BAWAPRC'] = $this->BAWAPRC->CurrentValue;
		$row['STAXPER'] = $this->STAXPER->CurrentValue;
		$row['TAXTYPE'] = $this->TAXTYPE->CurrentValue;
		$row['OLDTAXP'] = $this->OLDTAXP->CurrentValue;
		$row['TAXUPD'] = $this->TAXUPD->CurrentValue;
		$row['PACKAGE'] = $this->PACKAGE->CurrentValue;
		$row['NEWRT'] = $this->NEWRT->CurrentValue;
		$row['NEWMRP'] = $this->NEWMRP->CurrentValue;
		$row['NEWUR'] = $this->NEWUR->CurrentValue;
		$row['STATUS'] = $this->STATUS->CurrentValue;
		$row['RETNQTY'] = $this->RETNQTY->CurrentValue;
		$row['KEMODISC'] = $this->KEMODISC->CurrentValue;
		$row['PATSALE'] = $this->PATSALE->CurrentValue;
		$row['ORGAN'] = $this->ORGAN->CurrentValue;
		$row['OLDRQ'] = $this->OLDRQ->CurrentValue;
		$row['DRID'] = $this->DRID->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['COMBCODE'] = $this->COMBCODE->CurrentValue;
		$row['GENCODE'] = $this->GENCODE->CurrentValue;
		$row['STRENGTH'] = $this->STRENGTH->CurrentValue;
		$row['UNIT'] = $this->UNIT->CurrentValue;
		$row['FORMULARY'] = $this->FORMULARY->CurrentValue;
		$row['STOCK'] = $this->STOCK->CurrentValue;
		$row['RACKNO'] = $this->RACKNO->CurrentValue;
		$row['SUPPNAME'] = $this->SUPPNAME->CurrentValue;
		$row['COMBNAME'] = $this->COMBNAME->CurrentValue;
		$row['GENERICNAME'] = $this->GENERICNAME->CurrentValue;
		$row['REMARK'] = $this->REMARK->CurrentValue;
		$row['TEMP'] = $this->TEMP->CurrentValue;
		$row['PACKING'] = $this->PACKING->CurrentValue;
		$row['PhysQty'] = $this->PhysQty->CurrentValue;
		$row['LedQty'] = $this->LedQty->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['SaleValue'] = $this->SaleValue->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['SaleRate'] = $this->SaleRate->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['BRNAME'] = $this->BRNAME->CurrentValue;
		$row['OV'] = $this->OV->CurrentValue;
		$row['LATESTOV'] = $this->LATESTOV->CurrentValue;
		$row['ITEMTYPE'] = $this->ITEMTYPE->CurrentValue;
		$row['ROWID'] = $this->ROWID->CurrentValue;
		$row['MOVED'] = $this->MOVED->CurrentValue;
		$row['NEWTAX'] = $this->NEWTAX->CurrentValue;
		$row['HSNCODE'] = $this->HSNCODE->CurrentValue;
		$row['OLDTAX'] = $this->OLDTAX->CurrentValue;
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

		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue)))
			$this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue)))
			$this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SaleRate->FormValue == $this->SaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->SaleRate->CurrentValue)))
			$this->SaleRate->CurrentValue = ConvertToFloatString($this->SaleRate->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// BRCODE
		// PRC
		// TYPE
		// DES
		// UM
		// RT
		// UR
		// TAXP
		// BATCHNO
		// OQ
		// RQ
		// MRQ
		// IQ
		// MRP
		// EXPDT
		// SALQTY
		// LASTPURDT
		// LASTSUPP
		// GENNAME
		// LASTISSDT
		// CREATEDDT
		// OPPRC
		// RESTRICT
		// BAWAPRC
		// STAXPER
		// TAXTYPE
		// OLDTAXP
		// TAXUPD
		// PACKAGE
		// NEWRT
		// NEWMRP
		// NEWUR
		// STATUS
		// RETNQTY
		// KEMODISC
		// PATSALE
		// ORGAN
		// OLDRQ
		// DRID
		// MFRCODE
		// COMBCODE
		// GENCODE
		// STRENGTH
		// UNIT
		// FORMULARY
		// STOCK
		// RACKNO
		// SUPPNAME
		// COMBNAME
		// GENERICNAME
		// REMARK
		// TEMP
		// PACKING
		// PhysQty
		// LedQty
		// id
		// PurValue
		// PSGST
		// PCGST
		// SaleValue
		// SSGST
		// SCGST
		// SaleRate
		// HospID
		// BRNAME
		// OV
		// LATESTOV
		// ITEMTYPE
		// ROWID
		// MOVED
		// NEWTAX
		// HSNCODE
		// OLDTAX

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// TYPE
			if (strval($this->TYPE->CurrentValue) != "") {
				$this->TYPE->ViewValue = $this->TYPE->optionCaption($this->TYPE->CurrentValue);
			} else {
				$this->TYPE->ViewValue = NULL;
			}
			$this->TYPE->ViewCustomAttributes = "";

			// DES
			$this->DES->ViewValue = $this->DES->CurrentValue;
			$this->DES->ViewCustomAttributes = "";

			// UM
			$this->UM->ViewValue = $this->UM->CurrentValue;
			$this->UM->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// LASTPURDT
			$this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
			$this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
			$this->LASTPURDT->ViewCustomAttributes = "";

			// LASTSUPP
			$curVal = strval($this->LASTSUPP->CurrentValue);
			if ($curVal != "") {
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
				if ($this->LASTSUPP->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->LASTSUPP->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
					}
				}
			} else {
				$this->LASTSUPP->ViewValue = NULL;
			}
			$this->LASTSUPP->ViewCustomAttributes = "";

			// GENNAME
			$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal != "") {
				$this->GENNAME->ViewValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GENNAME->ViewValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
					}
				}
			} else {
				$this->GENNAME->ViewValue = NULL;
			}
			$this->GENNAME->ViewCustomAttributes = "";

			// LASTISSDT
			$this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
			$this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
			$this->LASTISSDT->ViewCustomAttributes = "";

			// CREATEDDT
			$this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
			$this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
			$this->CREATEDDT->ViewCustomAttributes = "";

			// DRID
			$curVal = strval($this->DRID->CurrentValue);
			if ($curVal != "") {
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
				if ($this->DRID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DRID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DRID->ViewValue = $this->DRID->CurrentValue;
					}
				}
			} else {
				$this->DRID->ViewValue = NULL;
			}
			$this->DRID->ViewCustomAttributes = "";

			// MFRCODE
			$curVal = strval($this->MFRCODE->CurrentValue);
			if ($curVal != "") {
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
				if ($this->MFRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MFRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
					}
				}
			} else {
				$this->MFRCODE->ViewValue = NULL;
			}
			$this->MFRCODE->ViewCustomAttributes = "";

			// COMBCODE
			$curVal = strval($this->COMBCODE->CurrentValue);
			if ($curVal != "") {
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
				if ($this->COMBCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->COMBCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
					}
				}
			} else {
				$this->COMBCODE->ViewValue = NULL;
			}
			$this->COMBCODE->ViewCustomAttributes = "";

			// GENCODE
			$curVal = strval($this->GENCODE->CurrentValue);
			if ($curVal != "") {
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
				if ($this->GENCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
					}
				}
			} else {
				$this->GENCODE->ViewValue = NULL;
			}
			$this->GENCODE->ViewCustomAttributes = "";

			// STRENGTH
			$this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
			$this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
			$this->STRENGTH->ViewCustomAttributes = "";

			// UNIT
			if (strval($this->UNIT->CurrentValue) != "") {
				$this->UNIT->ViewValue = $this->UNIT->optionCaption($this->UNIT->CurrentValue);
			} else {
				$this->UNIT->ViewValue = NULL;
			}
			$this->UNIT->ViewCustomAttributes = "";

			// FORMULARY
			if (strval($this->FORMULARY->CurrentValue) != "") {
				$this->FORMULARY->ViewValue = $this->FORMULARY->optionCaption($this->FORMULARY->CurrentValue);
			} else {
				$this->FORMULARY->ViewValue = NULL;
			}
			$this->FORMULARY->ViewCustomAttributes = "";

			// RACKNO
			$this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
			$this->RACKNO->ViewCustomAttributes = "";

			// SUPPNAME
			$curVal = strval($this->SUPPNAME->CurrentValue);
			if ($curVal != "") {
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
				if ($this->SUPPNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->SUPPNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
					}
				}
			} else {
				$this->SUPPNAME->ViewValue = NULL;
			}
			$this->SUPPNAME->ViewCustomAttributes = "";

			// COMBNAME
			$curVal = strval($this->COMBNAME->CurrentValue);
			if ($curVal != "") {
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
				if ($this->COMBNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->COMBNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
					}
				}
			} else {
				$this->COMBNAME->ViewValue = NULL;
			}
			$this->COMBNAME->ViewCustomAttributes = "";

			// GENERICNAME
			$curVal = strval($this->GENERICNAME->CurrentValue);
			if ($curVal != "") {
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
				if ($this->GENERICNAME->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENERICNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
					}
				}
			} else {
				$this->GENERICNAME->ViewValue = NULL;
			}
			$this->GENERICNAME->ViewCustomAttributes = "";

			// REMARK
			$this->REMARK->ViewValue = $this->REMARK->CurrentValue;
			$this->REMARK->ViewCustomAttributes = "";

			// TEMP
			$this->TEMP->ViewValue = $this->TEMP->CurrentValue;
			$this->TEMP->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// SaleValue
			$this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
			$this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
			$this->SaleValue->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// SaleRate
			$this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
			$this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
			$this->SaleRate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// BRNAME
			$this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
			$this->BRNAME->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";
			$this->TYPE->TooltipValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";
			$this->DES->TooltipValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";
			$this->UM->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// LASTPURDT
			$this->LASTPURDT->LinkCustomAttributes = "";
			$this->LASTPURDT->HrefValue = "";
			$this->LASTPURDT->TooltipValue = "";

			// LASTSUPP
			$this->LASTSUPP->LinkCustomAttributes = "";
			$this->LASTSUPP->HrefValue = "";
			$this->LASTSUPP->TooltipValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";
			$this->GENNAME->TooltipValue = "";

			// LASTISSDT
			$this->LASTISSDT->LinkCustomAttributes = "";
			$this->LASTISSDT->HrefValue = "";
			$this->LASTISSDT->TooltipValue = "";

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";
			$this->CREATEDDT->TooltipValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";
			$this->DRID->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";
			$this->COMBCODE->TooltipValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";
			$this->GENCODE->TooltipValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";
			$this->STRENGTH->TooltipValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";
			$this->UNIT->TooltipValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";
			$this->FORMULARY->TooltipValue = "";

			// RACKNO
			$this->RACKNO->LinkCustomAttributes = "";
			$this->RACKNO->HrefValue = "";
			$this->RACKNO->TooltipValue = "";

			// SUPPNAME
			$this->SUPPNAME->LinkCustomAttributes = "";
			$this->SUPPNAME->HrefValue = "";
			$this->SUPPNAME->TooltipValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";
			$this->COMBNAME->TooltipValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";
			$this->GENERICNAME->TooltipValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";
			$this->REMARK->TooltipValue = "";

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";
			$this->TEMP->TooltipValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";
			$this->SaleValue->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";
			$this->SaleRate->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// TYPE
			$this->TYPE->EditAttrs["class"] = "form-control";
			$this->TYPE->EditCustomAttributes = "";
			$this->TYPE->EditValue = $this->TYPE->options(TRUE);

			// DES
			$this->DES->EditAttrs["class"] = "form-control";
			$this->DES->EditCustomAttributes = "";
			if (!$this->DES->Raw)
				$this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
			$this->DES->EditValue = HtmlEncode($this->DES->CurrentValue);
			$this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (!$this->UM->Raw)
				$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
			$this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
			

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (!$this->BATCHNO->Raw)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

			// LASTPURDT
			$this->LASTPURDT->EditAttrs["class"] = "form-control";
			$this->LASTPURDT->EditCustomAttributes = "";
			$this->LASTPURDT->EditValue = HtmlEncode(FormatDateTime($this->LASTPURDT->CurrentValue, 8));
			$this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

			// LASTSUPP
			$this->LASTSUPP->EditCustomAttributes = "";
			$curVal = trim(strval($this->LASTSUPP->CurrentValue));
			if ($curVal != "")
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
			else
				$this->LASTSUPP->ViewValue = $this->LASTSUPP->Lookup !== NULL && is_array($this->LASTSUPP->Lookup->Options) ? $curVal : NULL;
			if ($this->LASTSUPP->ViewValue !== NULL) { // Load from cache
				$this->LASTSUPP->EditValue = array_values($this->LASTSUPP->Lookup->Options);
				if ($this->LASTSUPP->ViewValue == "")
					$this->LASTSUPP->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->LASTSUPP->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->LASTSUPP->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
				} else {
					$this->LASTSUPP->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->LASTSUPP->EditValue = $arwrk;
			}

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (!$this->GENNAME->Raw)
				$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
			$curVal = strval($this->GENNAME->CurrentValue);
			if ($curVal != "") {
				$this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
				if ($this->GENNAME->EditValue === NULL) { // Lookup from database
					$filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GENNAME->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
					}
				}
			} else {
				$this->GENNAME->EditValue = NULL;
			}
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// LASTISSDT
			$this->LASTISSDT->EditAttrs["class"] = "form-control";
			$this->LASTISSDT->EditCustomAttributes = "";
			$this->LASTISSDT->EditValue = HtmlEncode(FormatDateTime($this->LASTISSDT->CurrentValue, 8));
			$this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

			// CREATEDDT
			// DRID

			$this->DRID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DRID->CurrentValue));
			if ($curVal != "")
				$this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
			else
				$this->DRID->ViewValue = $this->DRID->Lookup !== NULL && is_array($this->DRID->Lookup->Options) ? $curVal : NULL;
			if ($this->DRID->ViewValue !== NULL) { // Load from cache
				$this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
				if ($this->DRID->ViewValue == "")
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DRID->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DRID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
				} else {
					$this->DRID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DRID->EditValue = $arwrk;
			}

			// MFRCODE
			$this->MFRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->MFRCODE->CurrentValue));
			if ($curVal != "")
				$this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
			else
				$this->MFRCODE->ViewValue = $this->MFRCODE->Lookup !== NULL && is_array($this->MFRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->MFRCODE->ViewValue !== NULL) { // Load from cache
				$this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
				if ($this->MFRCODE->ViewValue == "")
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MFRCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
				} else {
					$this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->MFRCODE->EditValue = $arwrk;
			}

			// COMBCODE
			$this->COMBCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBCODE->CurrentValue));
			if ($curVal != "")
				$this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
			else
				$this->COMBCODE->ViewValue = $this->COMBCODE->Lookup !== NULL && is_array($this->COMBCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBCODE->ViewValue !== NULL) { // Load from cache
				$this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
				if ($this->COMBCODE->ViewValue == "")
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
				} else {
					$this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->COMBCODE->EditValue = $arwrk;
			}

			// GENCODE
			$this->GENCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENCODE->CurrentValue));
			if ($curVal != "")
				$this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
			else
				$this->GENCODE->ViewValue = $this->GENCODE->Lookup !== NULL && is_array($this->GENCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->GENCODE->ViewValue !== NULL) { // Load from cache
				$this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
				if ($this->GENCODE->ViewValue == "")
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
				} else {
					$this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->GENCODE->EditValue = $arwrk;
			}

			// STRENGTH
			$this->STRENGTH->EditAttrs["class"] = "form-control";
			$this->STRENGTH->EditCustomAttributes = "";
			$this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->CurrentValue);
			$this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
			if (strval($this->STRENGTH->EditValue) != "" && is_numeric($this->STRENGTH->EditValue))
				$this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);
			

			// UNIT
			$this->UNIT->EditAttrs["class"] = "form-control";
			$this->UNIT->EditCustomAttributes = "";
			$this->UNIT->EditValue = $this->UNIT->options(TRUE);

			// FORMULARY
			$this->FORMULARY->EditAttrs["class"] = "form-control";
			$this->FORMULARY->EditCustomAttributes = "";
			$this->FORMULARY->EditValue = $this->FORMULARY->options(TRUE);

			// RACKNO
			$this->RACKNO->EditAttrs["class"] = "form-control";
			$this->RACKNO->EditCustomAttributes = "";
			if (!$this->RACKNO->Raw)
				$this->RACKNO->CurrentValue = HtmlDecode($this->RACKNO->CurrentValue);
			$this->RACKNO->EditValue = HtmlEncode($this->RACKNO->CurrentValue);
			$this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

			// SUPPNAME
			$this->SUPPNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->SUPPNAME->CurrentValue));
			if ($curVal != "")
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
			else
				$this->SUPPNAME->ViewValue = $this->SUPPNAME->Lookup !== NULL && is_array($this->SUPPNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->SUPPNAME->ViewValue !== NULL) { // Load from cache
				$this->SUPPNAME->EditValue = array_values($this->SUPPNAME->Lookup->Options);
				if ($this->SUPPNAME->ViewValue == "")
					$this->SUPPNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->SUPPNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->SUPPNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
				} else {
					$this->SUPPNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->SUPPNAME->EditValue = $arwrk;
			}

			// COMBNAME
			$this->COMBNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->COMBNAME->CurrentValue));
			if ($curVal != "")
				$this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
			else
				$this->COMBNAME->ViewValue = $this->COMBNAME->Lookup !== NULL && is_array($this->COMBNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->COMBNAME->ViewValue !== NULL) { // Load from cache
				$this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
				if ($this->COMBNAME->ViewValue == "")
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->COMBNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
				} else {
					$this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->COMBNAME->EditValue = $arwrk;
			}

			// GENERICNAME
			$this->GENERICNAME->EditCustomAttributes = "";
			$curVal = trim(strval($this->GENERICNAME->CurrentValue));
			if ($curVal != "")
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
			else
				$this->GENERICNAME->ViewValue = $this->GENERICNAME->Lookup !== NULL && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : NULL;
			if ($this->GENERICNAME->ViewValue !== NULL) { // Load from cache
				$this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
				if ($this->GENERICNAME->ViewValue == "")
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->GENERICNAME->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
				} else {
					$this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->GENERICNAME->EditValue = $arwrk;
			}

			// REMARK
			$this->REMARK->EditAttrs["class"] = "form-control";
			$this->REMARK->EditCustomAttributes = "";
			if (!$this->REMARK->Raw)
				$this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
			$this->REMARK->EditValue = HtmlEncode($this->REMARK->CurrentValue);
			$this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

			// TEMP
			$this->TEMP->EditAttrs["class"] = "form-control";
			$this->TEMP->EditCustomAttributes = "";
			if (!$this->TEMP->Raw)
				$this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
			$this->TEMP->EditValue = HtmlEncode($this->TEMP->CurrentValue);
			$this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue))
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
			

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
			

			// SaleValue
			$this->SaleValue->EditAttrs["class"] = "form-control";
			$this->SaleValue->EditCustomAttributes = "";
			$this->SaleValue->EditValue = HtmlEncode($this->SaleValue->CurrentValue);
			$this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
			if (strval($this->SaleValue->EditValue) != "" && is_numeric($this->SaleValue->EditValue))
				$this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);
			

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
			

			// SaleRate
			$this->SaleRate->EditAttrs["class"] = "form-control";
			$this->SaleRate->EditCustomAttributes = "";
			$this->SaleRate->EditValue = HtmlEncode($this->SaleRate->CurrentValue);
			$this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
			if (strval($this->SaleRate->EditValue) != "" && is_numeric($this->SaleRate->EditValue))
				$this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);
			

			// HospID
			// BRNAME
			// Add refer script
			// BRCODE

			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";

			// DES
			$this->DES->LinkCustomAttributes = "";
			$this->DES->HrefValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// LASTPURDT
			$this->LASTPURDT->LinkCustomAttributes = "";
			$this->LASTPURDT->HrefValue = "";

			// LASTSUPP
			$this->LASTSUPP->LinkCustomAttributes = "";
			$this->LASTSUPP->HrefValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";

			// LASTISSDT
			$this->LASTISSDT->LinkCustomAttributes = "";
			$this->LASTISSDT->HrefValue = "";

			// CREATEDDT
			$this->CREATEDDT->LinkCustomAttributes = "";
			$this->CREATEDDT->HrefValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// COMBCODE
			$this->COMBCODE->LinkCustomAttributes = "";
			$this->COMBCODE->HrefValue = "";

			// GENCODE
			$this->GENCODE->LinkCustomAttributes = "";
			$this->GENCODE->HrefValue = "";

			// STRENGTH
			$this->STRENGTH->LinkCustomAttributes = "";
			$this->STRENGTH->HrefValue = "";

			// UNIT
			$this->UNIT->LinkCustomAttributes = "";
			$this->UNIT->HrefValue = "";

			// FORMULARY
			$this->FORMULARY->LinkCustomAttributes = "";
			$this->FORMULARY->HrefValue = "";

			// RACKNO
			$this->RACKNO->LinkCustomAttributes = "";
			$this->RACKNO->HrefValue = "";

			// SUPPNAME
			$this->SUPPNAME->LinkCustomAttributes = "";
			$this->SUPPNAME->HrefValue = "";

			// COMBNAME
			$this->COMBNAME->LinkCustomAttributes = "";
			$this->COMBNAME->HrefValue = "";

			// GENERICNAME
			$this->GENERICNAME->LinkCustomAttributes = "";
			$this->GENERICNAME->HrefValue = "";

			// REMARK
			$this->REMARK->LinkCustomAttributes = "";
			$this->REMARK->HrefValue = "";

			// TEMP
			$this->TEMP->LinkCustomAttributes = "";
			$this->TEMP->HrefValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// SaleValue
			$this->SaleValue->LinkCustomAttributes = "";
			$this->SaleValue->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// SaleRate
			$this->SaleRate->LinkCustomAttributes = "";
			$this->SaleRate->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
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
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->TYPE->Required) {
			if (!$this->TYPE->IsDetailKey && $this->TYPE->FormValue != NULL && $this->TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DES->Required) {
			if (!$this->DES->IsDetailKey && $this->DES->FormValue != NULL && $this->DES->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DES->caption(), $this->DES->RequiredErrorMessage));
			}
		}
		if ($this->UM->Required) {
			if (!$this->UM->IsDetailKey && $this->UM->FormValue != NULL && $this->UM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
			}
		}
		if ($this->RT->Required) {
			if (!$this->RT->IsDetailKey && $this->RT->FormValue != NULL && $this->RT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RT->FormValue)) {
			AddMessage($FormError, $this->RT->errorMessage());
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
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
		if ($this->LASTPURDT->Required) {
			if (!$this->LASTPURDT->IsDetailKey && $this->LASTPURDT->FormValue != NULL && $this->LASTPURDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTPURDT->caption(), $this->LASTPURDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->LASTPURDT->FormValue)) {
			AddMessage($FormError, $this->LASTPURDT->errorMessage());
		}
		if ($this->LASTSUPP->Required) {
			if (!$this->LASTSUPP->IsDetailKey && $this->LASTSUPP->FormValue != NULL && $this->LASTSUPP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTSUPP->caption(), $this->LASTSUPP->RequiredErrorMessage));
			}
		}
		if ($this->GENNAME->Required) {
			if (!$this->GENNAME->IsDetailKey && $this->GENNAME->FormValue != NULL && $this->GENNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
			}
		}
		if ($this->LASTISSDT->Required) {
			if (!$this->LASTISSDT->IsDetailKey && $this->LASTISSDT->FormValue != NULL && $this->LASTISSDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LASTISSDT->caption(), $this->LASTISSDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->LASTISSDT->FormValue)) {
			AddMessage($FormError, $this->LASTISSDT->errorMessage());
		}
		if ($this->CREATEDDT->Required) {
			if (!$this->CREATEDDT->IsDetailKey && $this->CREATEDDT->FormValue != NULL && $this->CREATEDDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CREATEDDT->caption(), $this->CREATEDDT->RequiredErrorMessage));
			}
		}
		if ($this->DRID->Required) {
			if (!$this->DRID->IsDetailKey && $this->DRID->FormValue != NULL && $this->DRID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->COMBCODE->Required) {
			if (!$this->COMBCODE->IsDetailKey && $this->COMBCODE->FormValue != NULL && $this->COMBCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COMBCODE->caption(), $this->COMBCODE->RequiredErrorMessage));
			}
		}
		if ($this->GENCODE->Required) {
			if (!$this->GENCODE->IsDetailKey && $this->GENCODE->FormValue != NULL && $this->GENCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENCODE->caption(), $this->GENCODE->RequiredErrorMessage));
			}
		}
		if ($this->STRENGTH->Required) {
			if (!$this->STRENGTH->IsDetailKey && $this->STRENGTH->FormValue != NULL && $this->STRENGTH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STRENGTH->caption(), $this->STRENGTH->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->STRENGTH->FormValue)) {
			AddMessage($FormError, $this->STRENGTH->errorMessage());
		}
		if ($this->UNIT->Required) {
			if (!$this->UNIT->IsDetailKey && $this->UNIT->FormValue != NULL && $this->UNIT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UNIT->caption(), $this->UNIT->RequiredErrorMessage));
			}
		}
		if ($this->FORMULARY->Required) {
			if (!$this->FORMULARY->IsDetailKey && $this->FORMULARY->FormValue != NULL && $this->FORMULARY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FORMULARY->caption(), $this->FORMULARY->RequiredErrorMessage));
			}
		}
		if ($this->RACKNO->Required) {
			if (!$this->RACKNO->IsDetailKey && $this->RACKNO->FormValue != NULL && $this->RACKNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RACKNO->caption(), $this->RACKNO->RequiredErrorMessage));
			}
		}
		if ($this->SUPPNAME->Required) {
			if (!$this->SUPPNAME->IsDetailKey && $this->SUPPNAME->FormValue != NULL && $this->SUPPNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SUPPNAME->caption(), $this->SUPPNAME->RequiredErrorMessage));
			}
		}
		if ($this->COMBNAME->Required) {
			if (!$this->COMBNAME->IsDetailKey && $this->COMBNAME->FormValue != NULL && $this->COMBNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->COMBNAME->caption(), $this->COMBNAME->RequiredErrorMessage));
			}
		}
		if ($this->GENERICNAME->Required) {
			if (!$this->GENERICNAME->IsDetailKey && $this->GENERICNAME->FormValue != NULL && $this->GENERICNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENERICNAME->caption(), $this->GENERICNAME->RequiredErrorMessage));
			}
		}
		if ($this->REMARK->Required) {
			if (!$this->REMARK->IsDetailKey && $this->REMARK->FormValue != NULL && $this->REMARK->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REMARK->caption(), $this->REMARK->RequiredErrorMessage));
			}
		}
		if ($this->TEMP->Required) {
			if (!$this->TEMP->IsDetailKey && $this->TEMP->FormValue != NULL && $this->TEMP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMP->caption(), $this->TEMP->RequiredErrorMessage));
			}
		}
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurValue->FormValue)) {
			AddMessage($FormError, $this->PurValue->errorMessage());
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
		if ($this->SaleValue->Required) {
			if (!$this->SaleValue->IsDetailKey && $this->SaleValue->FormValue != NULL && $this->SaleValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SaleValue->caption(), $this->SaleValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SaleValue->FormValue)) {
			AddMessage($FormError, $this->SaleValue->errorMessage());
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
		if ($this->SaleRate->Required) {
			if (!$this->SaleRate->IsDetailKey && $this->SaleRate->FormValue != NULL && $this->SaleRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SaleRate->caption(), $this->SaleRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SaleRate->FormValue)) {
			AddMessage($FormError, $this->SaleRate->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
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
		if ($this->PRC->CurrentValue != "") { // Check field with unique index
			$filter = "(`PRC` = '" . AdjustSql($this->PRC->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PRC->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PRC->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// BRCODE
		$this->BRCODE->CurrentValue = PharmacyID();
		$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL);

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// TYPE
		$this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, NULL, FALSE);

		// DES
		$this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, NULL, FALSE);

		// UM
		$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, strval($this->UM->CurrentValue) == "");

		// RT
		$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, strval($this->RT->CurrentValue) == "");

		// BATCHNO
		$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, FALSE);

		// MRP
		$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, strval($this->MRP->CurrentValue) == "");

		// EXPDT
		$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, FALSE);

		// LASTPURDT
		$this->LASTPURDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTPURDT->CurrentValue, 0), NULL, FALSE);

		// LASTSUPP
		$this->LASTSUPP->setDbValueDef($rsnew, $this->LASTSUPP->CurrentValue, NULL, FALSE);

		// GENNAME
		$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, FALSE);

		// LASTISSDT
		$this->LASTISSDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTISSDT->CurrentValue, 0), NULL, FALSE);

		// CREATEDDT
		$this->CREATEDDT->CurrentValue = CurrentDateTime();
		$this->CREATEDDT->setDbValueDef($rsnew, $this->CREATEDDT->CurrentValue, NULL);

		// DRID
		$this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, NULL, FALSE);

		// MFRCODE
		$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, FALSE);

		// COMBCODE
		$this->COMBCODE->setDbValueDef($rsnew, $this->COMBCODE->CurrentValue, NULL, FALSE);

		// GENCODE
		$this->GENCODE->setDbValueDef($rsnew, $this->GENCODE->CurrentValue, NULL, FALSE);

		// STRENGTH
		$this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, NULL, strval($this->STRENGTH->CurrentValue) == "");

		// UNIT
		$this->UNIT->setDbValueDef($rsnew, $this->UNIT->CurrentValue, NULL, FALSE);

		// FORMULARY
		$this->FORMULARY->setDbValueDef($rsnew, $this->FORMULARY->CurrentValue, NULL, FALSE);

		// RACKNO
		$this->RACKNO->setDbValueDef($rsnew, $this->RACKNO->CurrentValue, NULL, FALSE);

		// SUPPNAME
		$this->SUPPNAME->setDbValueDef($rsnew, $this->SUPPNAME->CurrentValue, NULL, FALSE);

		// COMBNAME
		$this->COMBNAME->setDbValueDef($rsnew, $this->COMBNAME->CurrentValue, NULL, FALSE);

		// GENERICNAME
		$this->GENERICNAME->setDbValueDef($rsnew, $this->GENERICNAME->CurrentValue, NULL, FALSE);

		// REMARK
		$this->REMARK->setDbValueDef($rsnew, $this->REMARK->CurrentValue, NULL, FALSE);

		// TEMP
		$this->TEMP->setDbValueDef($rsnew, $this->TEMP->CurrentValue, NULL, FALSE);

		// PurValue
		$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, strval($this->PurValue->CurrentValue) == "");

		// PSGST
		$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, strval($this->PSGST->CurrentValue) == "");

		// PCGST
		$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, strval($this->PCGST->CurrentValue) == "");

		// SaleValue
		$this->SaleValue->setDbValueDef($rsnew, $this->SaleValue->CurrentValue, NULL, strval($this->SaleValue->CurrentValue) == "");

		// SSGST
		$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, strval($this->SSGST->CurrentValue) == "");

		// SCGST
		$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, strval($this->SCGST->CurrentValue) == "");

		// SaleRate
		$this->SaleRate->setDbValueDef($rsnew, $this->SaleRate->CurrentValue, NULL, strval($this->SaleRate->CurrentValue) == "");

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// BRNAME
		$this->BRNAME->CurrentValue = PharmacyID();
		$this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, NULL);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_storemastlist.php"), "", $this->TableVar, TRUE);
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
				case "x_TYPE":
					break;
				case "x_LASTSUPP":
					break;
				case "x_GENNAME":
					break;
				case "x_DRID":
					break;
				case "x_MFRCODE":
					break;
				case "x_COMBCODE":
					break;
				case "x_GENCODE":
					break;
				case "x_UNIT":
					break;
				case "x_FORMULARY":
					break;
				case "x_SUPPNAME":
					break;
				case "x_COMBNAME":
					break;
				case "x_GENERICNAME":
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
						case "x_LASTSUPP":
							break;
						case "x_GENNAME":
							break;
						case "x_DRID":
							break;
						case "x_MFRCODE":
							break;
						case "x_COMBCODE":
							break;
						case "x_GENCODE":
							break;
						case "x_SUPPNAME":
							break;
						case "x_COMBNAME":
							break;
						case "x_GENERICNAME":
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
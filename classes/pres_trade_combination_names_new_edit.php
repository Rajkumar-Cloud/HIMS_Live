<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pres_trade_combination_names_new_edit extends pres_trade_combination_names_new
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_trade_combination_names_new';

	// Page object name
	public $PageObjName = "pres_trade_combination_names_new_edit";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
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
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

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
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
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
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
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
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (pres_trade_combination_names_new)
		if (!isset($GLOBALS["pres_trade_combination_names_new"]) || get_class($GLOBALS["pres_trade_combination_names_new"]) == PROJECT_NAMESPACE . "pres_trade_combination_names_new") {
			$GLOBALS["pres_trade_combination_names_new"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_trade_combination_names_new"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (pres_tradenames_new)
		if (!isset($GLOBALS['pres_tradenames_new']))
			$GLOBALS['pres_tradenames_new'] = new pres_tradenames_new();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_trade_combination_names_new');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (user_login)
		if (!isset($UserTable)) {
			$UserTable = new user_login();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $pres_trade_combination_names_new;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pres_trade_combination_names_new);
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
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "pres_trade_combination_names_newview.php")
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
		$rows = array();
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
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
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
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['ID'];
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
			$this->ID->Visible = FALSE;
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
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
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
					$this->terminate(GetUrl("pres_trade_combination_names_newlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->ID->setVisibility();
		$this->tradenames_id->setVisibility();
		$this->Drug_Name->setVisibility();
		$this->Generic_Name->setVisibility();
		$this->Trade_Name->setVisibility();
		$this->PR_CODE->setVisibility();
		$this->Form->setVisibility();
		$this->Strength->setVisibility();
		$this->Unit->setVisibility();
		$this->CONTAINER_TYPE->setVisibility();
		$this->CONTAINER_STRENGTH->setVisibility();
		$this->TypeOfDrug->setVisibility();
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
		$this->setupLookupOptions($this->Generic_Name);
		$this->setupLookupOptions($this->Form);
		$this->setupLookupOptions($this->Unit);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_ID")) {
				$this->ID->setFormValue($CurrentForm->getValue("x_ID"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("ID") !== NULL) {
				$this->ID->setQueryStringValue(Get("ID"));
				$loadByQuery = TRUE;
			} else {
				$this->ID->CurrentValue = NULL;
			}
		}

		// Set up master detail parameters
		$this->setupMasterParms();

		// Load current record
		$loaded = $this->loadRow();

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
					$this->terminate("pres_trade_combination_names_newlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pres_trade_combination_names_newlist.php")
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

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
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

		// Check field name 'ID' first before field var 'x_ID'
		$val = $CurrentForm->hasValue("ID") ? $CurrentForm->getValue("ID") : $CurrentForm->getValue("x_ID");
		if (!$this->ID->IsDetailKey)
			$this->ID->setFormValue($val);

		// Check field name 'tradenames_id' first before field var 'x_tradenames_id'
		$val = $CurrentForm->hasValue("tradenames_id") ? $CurrentForm->getValue("tradenames_id") : $CurrentForm->getValue("x_tradenames_id");
		if (!$this->tradenames_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tradenames_id->Visible = FALSE; // Disable update for API request
			else
				$this->tradenames_id->setFormValue($val);
		}

		// Check field name 'Drug_Name' first before field var 'x_Drug_Name'
		$val = $CurrentForm->hasValue("Drug_Name") ? $CurrentForm->getValue("Drug_Name") : $CurrentForm->getValue("x_Drug_Name");
		if (!$this->Drug_Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Drug_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Drug_Name->setFormValue($val);
		}

		// Check field name 'Generic_Name' first before field var 'x_Generic_Name'
		$val = $CurrentForm->hasValue("Generic_Name") ? $CurrentForm->getValue("Generic_Name") : $CurrentForm->getValue("x_Generic_Name");
		if (!$this->Generic_Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Generic_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Generic_Name->setFormValue($val);
		}

		// Check field name 'Trade_Name' first before field var 'x_Trade_Name'
		$val = $CurrentForm->hasValue("Trade_Name") ? $CurrentForm->getValue("Trade_Name") : $CurrentForm->getValue("x_Trade_Name");
		if (!$this->Trade_Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Trade_Name->Visible = FALSE; // Disable update for API request
			else
				$this->Trade_Name->setFormValue($val);
		}

		// Check field name 'PR_CODE' first before field var 'x_PR_CODE'
		$val = $CurrentForm->hasValue("PR_CODE") ? $CurrentForm->getValue("PR_CODE") : $CurrentForm->getValue("x_PR_CODE");
		if (!$this->PR_CODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PR_CODE->Visible = FALSE; // Disable update for API request
			else
				$this->PR_CODE->setFormValue($val);
		}

		// Check field name 'Form' first before field var 'x_Form'
		$val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
		if (!$this->Form->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Form->Visible = FALSE; // Disable update for API request
			else
				$this->Form->setFormValue($val);
		}

		// Check field name 'Strength' first before field var 'x_Strength'
		$val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
		if (!$this->Strength->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Strength->Visible = FALSE; // Disable update for API request
			else
				$this->Strength->setFormValue($val);
		}

		// Check field name 'Unit' first before field var 'x_Unit'
		$val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
		if (!$this->Unit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Unit->Visible = FALSE; // Disable update for API request
			else
				$this->Unit->setFormValue($val);
		}

		// Check field name 'CONTAINER_TYPE' first before field var 'x_CONTAINER_TYPE'
		$val = $CurrentForm->hasValue("CONTAINER_TYPE") ? $CurrentForm->getValue("CONTAINER_TYPE") : $CurrentForm->getValue("x_CONTAINER_TYPE");
		if (!$this->CONTAINER_TYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CONTAINER_TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->CONTAINER_TYPE->setFormValue($val);
		}

		// Check field name 'CONTAINER_STRENGTH' first before field var 'x_CONTAINER_STRENGTH'
		$val = $CurrentForm->hasValue("CONTAINER_STRENGTH") ? $CurrentForm->getValue("CONTAINER_STRENGTH") : $CurrentForm->getValue("x_CONTAINER_STRENGTH");
		if (!$this->CONTAINER_STRENGTH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CONTAINER_STRENGTH->Visible = FALSE; // Disable update for API request
			else
				$this->CONTAINER_STRENGTH->setFormValue($val);
		}

		// Check field name 'TypeOfDrug' first before field var 'x_TypeOfDrug'
		$val = $CurrentForm->hasValue("TypeOfDrug") ? $CurrentForm->getValue("TypeOfDrug") : $CurrentForm->getValue("x_TypeOfDrug");
		if (!$this->TypeOfDrug->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TypeOfDrug->Visible = FALSE; // Disable update for API request
			else
				$this->TypeOfDrug->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ID->CurrentValue = $this->ID->FormValue;
		$this->tradenames_id->CurrentValue = $this->tradenames_id->FormValue;
		$this->Drug_Name->CurrentValue = $this->Drug_Name->FormValue;
		$this->Generic_Name->CurrentValue = $this->Generic_Name->FormValue;
		$this->Trade_Name->CurrentValue = $this->Trade_Name->FormValue;
		$this->PR_CODE->CurrentValue = $this->PR_CODE->FormValue;
		$this->Form->CurrentValue = $this->Form->FormValue;
		$this->Strength->CurrentValue = $this->Strength->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->CONTAINER_TYPE->CurrentValue = $this->CONTAINER_TYPE->FormValue;
		$this->CONTAINER_STRENGTH->CurrentValue = $this->CONTAINER_STRENGTH->FormValue;
		$this->TypeOfDrug->CurrentValue = $this->TypeOfDrug->FormValue;
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
		$conn = &$this->getConnection();
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
		$this->ID->setDbValue($row['ID']);
		$this->tradenames_id->setDbValue($row['tradenames_id']);
		$this->Drug_Name->setDbValue($row['Drug_Name']);
		$this->Generic_Name->setDbValue($row['Generic_Name']);
		$this->Trade_Name->setDbValue($row['Trade_Name']);
		$this->PR_CODE->setDbValue($row['PR_CODE']);
		$this->Form->setDbValue($row['Form']);
		$this->Strength->setDbValue($row['Strength']);
		$this->Unit->setDbValue($row['Unit']);
		$this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
		$this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
		$this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['ID'] = NULL;
		$row['tradenames_id'] = NULL;
		$row['Drug_Name'] = NULL;
		$row['Generic_Name'] = NULL;
		$row['Trade_Name'] = NULL;
		$row['PR_CODE'] = NULL;
		$row['Form'] = NULL;
		$row['Strength'] = NULL;
		$row['Unit'] = NULL;
		$row['CONTAINER_TYPE'] = NULL;
		$row['CONTAINER_STRENGTH'] = NULL;
		$row['TypeOfDrug'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("ID")) <> "")
			$this->ID->CurrentValue = $this->getKey("ID"); // ID
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
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
		// ID
		// tradenames_id
		// Drug_Name
		// Generic_Name
		// Trade_Name
		// PR_CODE
		// Form
		// Strength
		// Unit
		// CONTAINER_TYPE
		// CONTAINER_STRENGTH
		// TypeOfDrug

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ID
			$this->ID->ViewValue = $this->ID->CurrentValue;
			$this->ID->ViewCustomAttributes = "";

			// tradenames_id
			$this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
			$this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
			$this->tradenames_id->ViewCustomAttributes = "";

			// Drug_Name
			$this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
			$this->Drug_Name->ViewCustomAttributes = "";

			// Generic_Name
			$curVal = strval($this->Generic_Name->CurrentValue);
			if ($curVal <> "") {
				$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
				if ($this->Generic_Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Generic_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
					}
				}
			} else {
				$this->Generic_Name->ViewValue = NULL;
			}
			$this->Generic_Name->ViewCustomAttributes = "";

			// Trade_Name
			$this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
			$this->Trade_Name->ViewCustomAttributes = "";

			// PR_CODE
			$this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
			$this->PR_CODE->ViewCustomAttributes = "";

			// Form
			$curVal = strval($this->Form->CurrentValue);
			if ($curVal <> "") {
				$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
				if ($this->Form->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Form->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Form->ViewValue = $this->Form->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Form->ViewValue = $this->Form->CurrentValue;
					}
				}
			} else {
				$this->Form->ViewValue = NULL;
			}
			$this->Form->ViewCustomAttributes = "";

			// Strength
			$this->Strength->ViewValue = $this->Strength->CurrentValue;
			$this->Strength->ViewCustomAttributes = "";

			// Unit
			$curVal = strval($this->Unit->CurrentValue);
			if ($curVal <> "") {
				$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
				if ($this->Unit->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Unit->ViewValue = $this->Unit->CurrentValue;
					}
				}
			} else {
				$this->Unit->ViewValue = NULL;
			}
			$this->Unit->ViewCustomAttributes = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
			$this->CONTAINER_TYPE->ViewCustomAttributes = "";

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
			$this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

			// TypeOfDrug
			if (strval($this->TypeOfDrug->CurrentValue) <> "") {
				$this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
			} else {
				$this->TypeOfDrug->ViewValue = NULL;
			}
			$this->TypeOfDrug->ViewCustomAttributes = "";

			// ID
			$this->ID->LinkCustomAttributes = "";
			$this->ID->HrefValue = "";
			$this->ID->TooltipValue = "";

			// tradenames_id
			$this->tradenames_id->LinkCustomAttributes = "";
			$this->tradenames_id->HrefValue = "";
			$this->tradenames_id->TooltipValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";
			$this->Drug_Name->TooltipValue = "";

			// Generic_Name
			$this->Generic_Name->LinkCustomAttributes = "";
			$this->Generic_Name->HrefValue = "";
			$this->Generic_Name->TooltipValue = "";

			// Trade_Name
			$this->Trade_Name->LinkCustomAttributes = "";
			$this->Trade_Name->HrefValue = "";
			$this->Trade_Name->TooltipValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";
			$this->PR_CODE->TooltipValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";
			$this->Form->TooltipValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";
			$this->Strength->TooltipValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->LinkCustomAttributes = "";
			$this->CONTAINER_TYPE->HrefValue = "";
			$this->CONTAINER_TYPE->TooltipValue = "";

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
			$this->CONTAINER_STRENGTH->HrefValue = "";
			$this->CONTAINER_STRENGTH->TooltipValue = "";

			// TypeOfDrug
			$this->TypeOfDrug->LinkCustomAttributes = "";
			$this->TypeOfDrug->HrefValue = "";
			$this->TypeOfDrug->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// ID
			$this->ID->EditAttrs["class"] = "form-control";
			$this->ID->EditCustomAttributes = "";
			$this->ID->EditValue = $this->ID->CurrentValue;
			$this->ID->ViewCustomAttributes = "";

			// tradenames_id
			$this->tradenames_id->EditAttrs["class"] = "form-control";
			$this->tradenames_id->EditCustomAttributes = "";
			if ($this->tradenames_id->getSessionValue() <> "") {
				$this->tradenames_id->CurrentValue = $this->tradenames_id->getSessionValue();
			$this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
			$this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
			$this->tradenames_id->ViewCustomAttributes = "";
			} else {
			$this->tradenames_id->EditValue = HtmlEncode($this->tradenames_id->CurrentValue);
			$this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());
			}

			// Drug_Name
			$this->Drug_Name->EditAttrs["class"] = "form-control";
			$this->Drug_Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
			$this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->CurrentValue);
			$this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

			// Generic_Name
			$this->Generic_Name->EditAttrs["class"] = "form-control";
			$this->Generic_Name->EditCustomAttributes = "";
			$curVal = trim(strval($this->Generic_Name->CurrentValue));
			if ($curVal <> "")
				$this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
			else
				$this->Generic_Name->ViewValue = $this->Generic_Name->Lookup !== NULL && is_array($this->Generic_Name->Lookup->Options) ? $curVal : NULL;
			if ($this->Generic_Name->ViewValue !== NULL) { // Load from cache
				$this->Generic_Name->EditValue = array_values($this->Generic_Name->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Generic_Name->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Generic_Name->EditValue = $arwrk;
			}

			// Trade_Name
			$this->Trade_Name->EditAttrs["class"] = "form-control";
			$this->Trade_Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
			$this->Trade_Name->EditValue = HtmlEncode($this->Trade_Name->CurrentValue);
			$this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

			// PR_CODE
			$this->PR_CODE->EditAttrs["class"] = "form-control";
			$this->PR_CODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
			$this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->CurrentValue);
			$this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

			// Form
			$this->Form->EditAttrs["class"] = "form-control";
			$this->Form->EditCustomAttributes = "";
			$curVal = trim(strval($this->Form->CurrentValue));
			if ($curVal <> "")
				$this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
			else
				$this->Form->ViewValue = $this->Form->Lookup !== NULL && is_array($this->Form->Lookup->Options) ? $curVal : NULL;
			if ($this->Form->ViewValue !== NULL) { // Load from cache
				$this->Form->EditValue = array_values($this->Form->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Forms`" . SearchString("=", $this->Form->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Form->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Form->EditValue = $arwrk;
			}

			// Strength
			$this->Strength->EditAttrs["class"] = "form-control";
			$this->Strength->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
			$this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
			$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$curVal = trim(strval($this->Unit->CurrentValue));
			if ($curVal <> "")
				$this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
			else
				$this->Unit->ViewValue = $this->Unit->Lookup !== NULL && is_array($this->Unit->Lookup->Options) ? $curVal : NULL;
			if ($this->Unit->ViewValue !== NULL) { // Load from cache
				$this->Unit->EditValue = array_values($this->Unit->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Units`" . SearchString("=", $this->Unit->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Unit->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Unit->EditValue = $arwrk;
			}

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
			$this->CONTAINER_TYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
			$this->CONTAINER_TYPE->EditValue = HtmlEncode($this->CONTAINER_TYPE->CurrentValue);
			$this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
			$this->CONTAINER_STRENGTH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
			$this->CONTAINER_STRENGTH->EditValue = HtmlEncode($this->CONTAINER_STRENGTH->CurrentValue);
			$this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

			// TypeOfDrug
			$this->TypeOfDrug->EditAttrs["class"] = "form-control";
			$this->TypeOfDrug->EditCustomAttributes = "";
			$this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(TRUE);

			// Edit refer script
			// ID

			$this->ID->LinkCustomAttributes = "";
			$this->ID->HrefValue = "";

			// tradenames_id
			$this->tradenames_id->LinkCustomAttributes = "";
			$this->tradenames_id->HrefValue = "";

			// Drug_Name
			$this->Drug_Name->LinkCustomAttributes = "";
			$this->Drug_Name->HrefValue = "";

			// Generic_Name
			$this->Generic_Name->LinkCustomAttributes = "";
			$this->Generic_Name->HrefValue = "";

			// Trade_Name
			$this->Trade_Name->LinkCustomAttributes = "";
			$this->Trade_Name->HrefValue = "";

			// PR_CODE
			$this->PR_CODE->LinkCustomAttributes = "";
			$this->PR_CODE->HrefValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->LinkCustomAttributes = "";
			$this->CONTAINER_TYPE->HrefValue = "";

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
			$this->CONTAINER_STRENGTH->HrefValue = "";

			// TypeOfDrug
			$this->TypeOfDrug->LinkCustomAttributes = "";
			$this->TypeOfDrug->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->ID->Required) {
			if (!$this->ID->IsDetailKey && $this->ID->FormValue != NULL && $this->ID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ID->caption(), $this->ID->RequiredErrorMessage));
			}
		}
		if ($this->tradenames_id->Required) {
			if (!$this->tradenames_id->IsDetailKey && $this->tradenames_id->FormValue != NULL && $this->tradenames_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tradenames_id->caption(), $this->tradenames_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->tradenames_id->FormValue)) {
			AddMessage($FormError, $this->tradenames_id->errorMessage());
		}
		if ($this->Drug_Name->Required) {
			if (!$this->Drug_Name->IsDetailKey && $this->Drug_Name->FormValue != NULL && $this->Drug_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Drug_Name->caption(), $this->Drug_Name->RequiredErrorMessage));
			}
		}
		if ($this->Generic_Name->Required) {
			if (!$this->Generic_Name->IsDetailKey && $this->Generic_Name->FormValue != NULL && $this->Generic_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Generic_Name->caption(), $this->Generic_Name->RequiredErrorMessage));
			}
		}
		if ($this->Trade_Name->Required) {
			if (!$this->Trade_Name->IsDetailKey && $this->Trade_Name->FormValue != NULL && $this->Trade_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Trade_Name->caption(), $this->Trade_Name->RequiredErrorMessage));
			}
		}
		if ($this->PR_CODE->Required) {
			if (!$this->PR_CODE->IsDetailKey && $this->PR_CODE->FormValue != NULL && $this->PR_CODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR_CODE->caption(), $this->PR_CODE->RequiredErrorMessage));
			}
		}
		if ($this->Form->Required) {
			if (!$this->Form->IsDetailKey && $this->Form->FormValue != NULL && $this->Form->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
			}
		}
		if ($this->Strength->Required) {
			if (!$this->Strength->IsDetailKey && $this->Strength->FormValue != NULL && $this->Strength->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
			}
		}
		if ($this->Unit->Required) {
			if (!$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if ($this->CONTAINER_TYPE->Required) {
			if (!$this->CONTAINER_TYPE->IsDetailKey && $this->CONTAINER_TYPE->FormValue != NULL && $this->CONTAINER_TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CONTAINER_TYPE->caption(), $this->CONTAINER_TYPE->RequiredErrorMessage));
			}
		}
		if ($this->CONTAINER_STRENGTH->Required) {
			if (!$this->CONTAINER_STRENGTH->IsDetailKey && $this->CONTAINER_STRENGTH->FormValue != NULL && $this->CONTAINER_STRENGTH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CONTAINER_STRENGTH->caption(), $this->CONTAINER_STRENGTH->RequiredErrorMessage));
			}
		}
		if ($this->TypeOfDrug->Required) {
			if (!$this->TypeOfDrug->IsDetailKey && $this->TypeOfDrug->FormValue != NULL && $this->TypeOfDrug->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TypeOfDrug->caption(), $this->TypeOfDrug->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
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

			// tradenames_id
			$this->tradenames_id->setDbValueDef($rsnew, $this->tradenames_id->CurrentValue, 0, $this->tradenames_id->ReadOnly);

			// Drug_Name
			$this->Drug_Name->setDbValueDef($rsnew, $this->Drug_Name->CurrentValue, "", $this->Drug_Name->ReadOnly);

			// Generic_Name
			$this->Generic_Name->setDbValueDef($rsnew, $this->Generic_Name->CurrentValue, "", $this->Generic_Name->ReadOnly);

			// Trade_Name
			$this->Trade_Name->setDbValueDef($rsnew, $this->Trade_Name->CurrentValue, "", $this->Trade_Name->ReadOnly);

			// PR_CODE
			$this->PR_CODE->setDbValueDef($rsnew, $this->PR_CODE->CurrentValue, "", $this->PR_CODE->ReadOnly);

			// Form
			$this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, "", $this->Form->ReadOnly);

			// Strength
			$this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, "", $this->Strength->ReadOnly);

			// Unit
			$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, "", $this->Unit->ReadOnly);

			// CONTAINER_TYPE
			$this->CONTAINER_TYPE->setDbValueDef($rsnew, $this->CONTAINER_TYPE->CurrentValue, NULL, $this->CONTAINER_TYPE->ReadOnly);

			// CONTAINER_STRENGTH
			$this->CONTAINER_STRENGTH->setDbValueDef($rsnew, $this->CONTAINER_STRENGTH->CurrentValue, NULL, $this->CONTAINER_STRENGTH->ReadOnly);

			// TypeOfDrug
			$this->TypeOfDrug->setDbValueDef($rsnew, $this->TypeOfDrug->CurrentValue, "", $this->TypeOfDrug->ReadOnly);

			// Check referential integrity for master table 'pres_tradenames_new'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_pres_tradenames_new();
			$keyValue = isset($rsnew['tradenames_id']) ? $rsnew['tradenames_id'] : $rsold['tradenames_id'];
			if (strval($keyValue) <> "") {
				$masterFilter = str_replace("@ID@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["pres_tradenames_new"]))
					$GLOBALS["pres_tradenames_new"] = new pres_tradenames_new();
				$rsmaster = $GLOBALS["pres_tradenames_new"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "pres_tradenames_new", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
			}

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
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
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "pres_tradenames_new") {
				$validMaster = TRUE;
				if (Get("fk_ID") !== NULL) {
					$this->tradenames_id->setQueryStringValue(Get("fk_ID"));
					$this->tradenames_id->setSessionValue($this->tradenames_id->QueryStringValue);
					if (!is_numeric($this->tradenames_id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "pres_tradenames_new") {
				$validMaster = TRUE;
				if (Post("fk_ID") !== NULL) {
					$this->tradenames_id->setFormValue(Post("fk_ID"));
					$this->tradenames_id->setSessionValue($this->tradenames_id->FormValue);
					if (!is_numeric($this->tradenames_id->FormValue))
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
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "pres_tradenames_new") {
				if ($this->tradenames_id->CurrentValue == "")
					$this->tradenames_id->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pres_trade_combination_names_newlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_Generic_Name":
							break;
						case "x_Form":
							break;
						case "x_Unit":
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
}
?>
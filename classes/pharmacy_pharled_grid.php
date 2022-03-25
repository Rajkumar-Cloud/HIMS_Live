<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_pharled_grid extends pharmacy_pharled
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_pharled';

	// Page object name
	public $PageObjName = "pharmacy_pharled_grid";

	// Grid form hidden field names
	public $FormName = "fpharmacy_pharledgrid";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;
	public $CancelUrl;

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
		$this->FormActionName .= "_" . $this->FormName;
		$this->FormKeyName .= "_" . $this->FormName;
		$this->FormOldKeyName .= "_" . $this->FormName;
		$this->FormBlankRowName .= "_" . $this->FormName;
		$this->FormKeyCountName .= "_" . $this->FormName;
		$GLOBALS["Grid"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (pharmacy_pharled)
		if (!isset($GLOBALS["pharmacy_pharled"]) || get_class($GLOBALS["pharmacy_pharled"]) == PROJECT_NAMESPACE . "pharmacy_pharled") {
			$GLOBALS["pharmacy_pharled"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["pharmacy_pharled"];

		}
		$this->AddUrl = "pharmacy_pharledadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_pharled');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Export
		global $EXPORT, $pharmacy_pharled;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_pharled);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}

//		$GLOBALS["Table"] = &$GLOBALS["MasterTable"];
		unset($GLOBALS["Grid"]);
		if ($url === "")
			return;
		if (!IsApi())
			$this->Page_Redirecting($url);

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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
		if ($this->isAddOrEdit())
			$this->BRCODE->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->_USERID->Visible = FALSE;
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->HosoID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->BRNAME->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->isdate->Visible = FALSE;
	}

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $ShowOtherOptions = FALSE;
	public $DisplayRecs = 20;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $Pager;
	public $AutoHidePager = AUTO_HIDE_PAGER;
	public $AutoHidePageSizeSelector = AUTO_HIDE_PAGE_SIZE_SELECTOR;
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $RecCnt = 0; // Record count
	public $EditRowCnt;
	public $StartRowCnt = 1;
	public $RowCnt = 0;
	public $Attrs = array(); // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SearchError, $EXPORT;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

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
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
		}

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->SiNo->setVisibility();
		$this->SLNO->setVisibility();
		$this->Product->setVisibility();
		$this->RT->setVisibility();
		$this->IQ->setVisibility();
		$this->DAMT->setVisibility();
		$this->Mfg->setVisibility();
		$this->EXPDT->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->BRCODE->setVisibility();
		$this->TYPE->Visible = FALSE;
		$this->DN->Visible = FALSE;
		$this->RDN->Visible = FALSE;
		$this->DT->Visible = FALSE;
		$this->PRC->setVisibility();
		$this->OQ->Visible = FALSE;
		$this->RQ->Visible = FALSE;
		$this->MRQ->Visible = FALSE;
		$this->BILLNO->Visible = FALSE;
		$this->BILLDT->Visible = FALSE;
		$this->VALUE->Visible = FALSE;
		$this->DISC->Visible = FALSE;
		$this->TAXP->Visible = FALSE;
		$this->TAX->Visible = FALSE;
		$this->TAXR->Visible = FALSE;
		$this->EMPNO->Visible = FALSE;
		$this->PC->Visible = FALSE;
		$this->DRNAME->Visible = FALSE;
		$this->BTIME->Visible = FALSE;
		$this->ONO->Visible = FALSE;
		$this->ODT->Visible = FALSE;
		$this->PURRT->Visible = FALSE;
		$this->GRP->Visible = FALSE;
		$this->IBATCH->Visible = FALSE;
		$this->IPNO->Visible = FALSE;
		$this->OPNO->Visible = FALSE;
		$this->RECID->Visible = FALSE;
		$this->FQTY->Visible = FALSE;
		$this->UR->setVisibility();
		$this->DCID->Visible = FALSE;
		$this->_USERID->setVisibility();
		$this->MODDT->Visible = FALSE;
		$this->FYM->Visible = FALSE;
		$this->PRCBATCH->Visible = FALSE;
		$this->MRP->Visible = FALSE;
		$this->BILLYM->Visible = FALSE;
		$this->BILLGRP->Visible = FALSE;
		$this->STAFF->Visible = FALSE;
		$this->TEMPIPNO->Visible = FALSE;
		$this->PRNTED->Visible = FALSE;
		$this->PATNAME->Visible = FALSE;
		$this->PJVNO->Visible = FALSE;
		$this->PJVSLNO->Visible = FALSE;
		$this->OTHDISC->Visible = FALSE;
		$this->PJVYM->Visible = FALSE;
		$this->PURDISCPER->Visible = FALSE;
		$this->CASHIER->Visible = FALSE;
		$this->CASHTIME->Visible = FALSE;
		$this->CASHRECD->Visible = FALSE;
		$this->CASHREFNO->Visible = FALSE;
		$this->CASHIERSHIFT->Visible = FALSE;
		$this->PRCODE->Visible = FALSE;
		$this->RELEASEBY->Visible = FALSE;
		$this->CRAUTHOR->Visible = FALSE;
		$this->PAYMENT->Visible = FALSE;
		$this->DRID->Visible = FALSE;
		$this->WARD->Visible = FALSE;
		$this->STAXTYPE->Visible = FALSE;
		$this->PURDISCVAL->Visible = FALSE;
		$this->RNDOFF->Visible = FALSE;
		$this->DISCONMRP->Visible = FALSE;
		$this->DELVDT->Visible = FALSE;
		$this->DELVTIME->Visible = FALSE;
		$this->DELVBY->Visible = FALSE;
		$this->HOSPNO->Visible = FALSE;
		$this->id->setVisibility();
		$this->pbv->Visible = FALSE;
		$this->pbt->Visible = FALSE;
		$this->HosoID->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->MFRCODE->Visible = FALSE;
		$this->Reception->Visible = FALSE;
		$this->PatID->Visible = FALSE;
		$this->mrnno->Visible = FALSE;
		$this->BRNAME->setVisibility();
		$this->sretid->Visible = FALSE;
		$this->sprid->Visible = FALSE;
		$this->baid->setVisibility();
		$this->isdate->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->PurValue->setVisibility();
		$this->PurRate->setVisibility();
		$this->PUnit->setVisibility();
		$this->SUnit->setVisibility();
		$this->HSNCODE->setVisibility();
		$this->hideFieldsForAddEdit();

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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Setup other options
		$this->setupOtherOptions();

		// Set up lookup cache
		$this->setupLookupOptions($this->SLNO);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = &$this->ListOptions->getItem("griddelete");
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
			$this->loadSortOrder();

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_billing_voucher") {
			global $pharmacy_billing_voucher;
			$rsmaster = $pharmacy_billing_voucher->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("pharmacy_billing_voucherlist.php"); // Return to master page
			} else {
				$pharmacy_billing_voucher->loadListRowValues($rsmaster);
				$pharmacy_billing_voucher->RowType = ROWTYPE_MASTER; // Master row
				$pharmacy_billing_voucher->renderListRow();
				$rsmaster->close();
			}
		}

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_billing_issue") {
			global $pharmacy_billing_issue;
			$rsmaster = $pharmacy_billing_issue->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("pharmacy_billing_issuelist.php"); // Return to master page
			} else {
				$pharmacy_billing_issue->loadListRowValues($rsmaster);
				$pharmacy_billing_issue->RowType = ROWTYPE_MASTER; // Master row
				$pharmacy_billing_issue->renderListRow();
				$rsmaster->close();
			}
		}

		// Load master record
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ip_admission") {
			global $ip_admission;
			$rsmaster = $ip_admission->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ip_admissionlist.php"); // Return to master page
			} else {
				$ip_admission->loadListRowValues($rsmaster);
				$ip_admission->RowType = ROWTYPE_MASTER; // Master row
				$ip_admission->renderListRow();
				$rsmaster->close();
			}
		}

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}
		if ($this->isGridAdd()) {
			if ($this->CurrentMode == "copy") {
				$selectLimit = $this->UseSelectLimit;
				if ($selectLimit) {
					$this->TotalRecs = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecs = $this->Recordset->RecordCount();
				}
				$this->StartRec = 1;
				$this->DisplayRecs = $this->TotalRecs;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRec = 1;
				$this->DisplayRecs = $this->GridAddRowCount;
			}
			$this->TotalRecs = $this->DisplayRecs;
			$this->StopRec = $this->DisplayRecs;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecs = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
			$this->StartRec = 1;
			$this->DisplayRecs = $this->TotalRecs; // Display all records
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecs == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecs]);
			$this->terminate(TRUE);
		}
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecs()
	{
		$wrk = Get(TABLE_REC_PER_PAGE, "");
		if ($wrk <> "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecs = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecs = -1;
				} else {
					$this->DisplayRecs = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecs); // Save to Session

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->RT->FormValue = ""; // Clear form value
		$this->IQ->FormValue = ""; // Clear form value
		$this->DAMT->FormValue = ""; // Clear form value
		$this->UR->FormValue = ""; // Clear form value
		$this->PSGST->FormValue = ""; // Clear form value
		$this->PCGST->FormValue = ""; // Clear form value
		$this->SSGST->FormValue = ""; // Clear form value
		$this->SCGST->FormValue = ""; // Clear form value
		$this->PurValue->FormValue = ""; // Clear form value
		$this->PurRate->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey <> "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key <> "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey <> "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter <> "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode($GLOBALS["COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arKeyFlds) >= 1) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = &$this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "" && $rowaction <> "insert")
				continue; // Skip
			if ($rowaction == "insert") {
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
				$this->loadOldRecord(); // Load old record
			}
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key <> "")
						$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter <> "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->clearInlineMode(); // Clear grid add mode and return
			return TRUE;
		}
		if ($gridInsert) {

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_SiNo") && $CurrentForm->hasValue("o_SiNo") && $this->SiNo->CurrentValue <> $this->SiNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SLNO") && $CurrentForm->hasValue("o_SLNO") && $this->SLNO->CurrentValue <> $this->SLNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Product") && $CurrentForm->hasValue("o_Product") && $this->Product->CurrentValue <> $this->Product->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RT") && $CurrentForm->hasValue("o_RT") && $this->RT->CurrentValue <> $this->RT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue <> $this->IQ->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DAMT") && $CurrentForm->hasValue("o_DAMT") && $this->DAMT->CurrentValue <> $this->DAMT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mfg") && $CurrentForm->hasValue("o_Mfg") && $this->Mfg->CurrentValue <> $this->Mfg->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue <> $this->EXPDT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BATCHNO") && $CurrentForm->hasValue("o_BATCHNO") && $this->BATCHNO->CurrentValue <> $this->BATCHNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue <> $this->PRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_UR") && $CurrentForm->hasValue("o_UR") && $this->UR->CurrentValue <> $this->UR->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_baid") && $CurrentForm->hasValue("o_baid") && $this->baid->CurrentValue <> $this->baid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PSGST") && $CurrentForm->hasValue("o_PSGST") && $this->PSGST->CurrentValue <> $this->PSGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PCGST") && $CurrentForm->hasValue("o_PCGST") && $this->PCGST->CurrentValue <> $this->PCGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SSGST") && $CurrentForm->hasValue("o_SSGST") && $this->SSGST->CurrentValue <> $this->SSGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SCGST") && $CurrentForm->hasValue("o_SCGST") && $this->SCGST->CurrentValue <> $this->SCGST->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PurValue") && $CurrentForm->hasValue("o_PurValue") && $this->PurValue->CurrentValue <> $this->PurValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PurRate") && $CurrentForm->hasValue("o_PurRate") && $this->PurRate->CurrentValue <> $this->PurRate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PUnit") && $CurrentForm->hasValue("o_PUnit") && $this->PUnit->CurrentValue <> $this->PUnit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SUnit") && $CurrentForm->hasValue("o_SUnit") && $this->SUnit->CurrentValue <> $this->SUnit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HSNCODE") && $CurrentForm->hasValue("o_HSNCODE") && $this->HSNCODE->CurrentValue <> $this->HSNCODE->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = array();

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->pbv->setSessionValue("");
				$this->pbt->setSessionValue("");
				$this->mrnno->setSessionValue("");
				$this->PatID->setSessionValue("");
				$this->Reception->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "view"
		$item = &$this->ListOptions->add("view");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canView();
		$item->OnLeft = TRUE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$item = &$this->ListOptions->getItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode <> "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = &$options->Items["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($this->CurrentMode == "view") { // View mode

		// "view"
		$opt = &$this->ListOptions->Items["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = &$this->ListOptions->Items["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	public function setRecordKey(&$key, $rs)
	{
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs->fields('id');
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = &$this->OtherOptions["addedit"];
		$option->UseDropDownButton = FALSE;
		$option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$option->UseButtonGroup = TRUE;

		//$option->ButtonClass = ""; // Class for button group
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Add
		if ($this->CurrentMode == "view") { // Check view mode
			$item = &$option->add("add");
			$addcaption = HtmlTitle($Language->phrase("AddLink"));
			$this->AddUrl = $this->getAddUrl();
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
			$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());
		}
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = &$options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = $Security->canAdd();
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = &$options["addedit"];
			$item = &$option->getItem("add");
			$this->ShowOtherOptions = $item && $item->Visible;
		}
	}
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->SiNo->CurrentValue = NULL;
		$this->SiNo->OldValue = $this->SiNo->CurrentValue;
		$this->SLNO->CurrentValue = NULL;
		$this->SLNO->OldValue = $this->SLNO->CurrentValue;
		$this->Product->CurrentValue = NULL;
		$this->Product->OldValue = $this->Product->CurrentValue;
		$this->RT->CurrentValue = NULL;
		$this->RT->OldValue = $this->RT->CurrentValue;
		$this->IQ->CurrentValue = NULL;
		$this->IQ->OldValue = $this->IQ->CurrentValue;
		$this->DAMT->CurrentValue = NULL;
		$this->DAMT->OldValue = $this->DAMT->CurrentValue;
		$this->Mfg->CurrentValue = NULL;
		$this->Mfg->OldValue = $this->Mfg->CurrentValue;
		$this->EXPDT->CurrentValue = NULL;
		$this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
		$this->BATCHNO->CurrentValue = NULL;
		$this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->TYPE->CurrentValue = NULL;
		$this->TYPE->OldValue = $this->TYPE->CurrentValue;
		$this->DN->CurrentValue = NULL;
		$this->DN->OldValue = $this->DN->CurrentValue;
		$this->RDN->CurrentValue = NULL;
		$this->RDN->OldValue = $this->RDN->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->OQ->CurrentValue = NULL;
		$this->OQ->OldValue = $this->OQ->CurrentValue;
		$this->RQ->CurrentValue = NULL;
		$this->RQ->OldValue = $this->RQ->CurrentValue;
		$this->MRQ->CurrentValue = NULL;
		$this->MRQ->OldValue = $this->MRQ->CurrentValue;
		$this->BILLNO->CurrentValue = NULL;
		$this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
		$this->BILLDT->CurrentValue = NULL;
		$this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
		$this->VALUE->CurrentValue = NULL;
		$this->VALUE->OldValue = $this->VALUE->CurrentValue;
		$this->DISC->CurrentValue = NULL;
		$this->DISC->OldValue = $this->DISC->CurrentValue;
		$this->TAXP->CurrentValue = NULL;
		$this->TAXP->OldValue = $this->TAXP->CurrentValue;
		$this->TAX->CurrentValue = NULL;
		$this->TAX->OldValue = $this->TAX->CurrentValue;
		$this->TAXR->CurrentValue = NULL;
		$this->TAXR->OldValue = $this->TAXR->CurrentValue;
		$this->EMPNO->CurrentValue = NULL;
		$this->EMPNO->OldValue = $this->EMPNO->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->DRNAME->CurrentValue = NULL;
		$this->DRNAME->OldValue = $this->DRNAME->CurrentValue;
		$this->BTIME->CurrentValue = NULL;
		$this->BTIME->OldValue = $this->BTIME->CurrentValue;
		$this->ONO->CurrentValue = NULL;
		$this->ONO->OldValue = $this->ONO->CurrentValue;
		$this->ODT->CurrentValue = NULL;
		$this->ODT->OldValue = $this->ODT->CurrentValue;
		$this->PURRT->CurrentValue = NULL;
		$this->PURRT->OldValue = $this->PURRT->CurrentValue;
		$this->GRP->CurrentValue = NULL;
		$this->GRP->OldValue = $this->GRP->CurrentValue;
		$this->IBATCH->CurrentValue = NULL;
		$this->IBATCH->OldValue = $this->IBATCH->CurrentValue;
		$this->IPNO->CurrentValue = NULL;
		$this->IPNO->OldValue = $this->IPNO->CurrentValue;
		$this->OPNO->CurrentValue = NULL;
		$this->OPNO->OldValue = $this->OPNO->CurrentValue;
		$this->RECID->CurrentValue = NULL;
		$this->RECID->OldValue = $this->RECID->CurrentValue;
		$this->FQTY->CurrentValue = NULL;
		$this->FQTY->OldValue = $this->FQTY->CurrentValue;
		$this->UR->CurrentValue = NULL;
		$this->UR->OldValue = $this->UR->CurrentValue;
		$this->DCID->CurrentValue = NULL;
		$this->DCID->OldValue = $this->DCID->CurrentValue;
		$this->_USERID->CurrentValue = NULL;
		$this->_USERID->OldValue = $this->_USERID->CurrentValue;
		$this->MODDT->CurrentValue = NULL;
		$this->MODDT->OldValue = $this->MODDT->CurrentValue;
		$this->FYM->CurrentValue = NULL;
		$this->FYM->OldValue = $this->FYM->CurrentValue;
		$this->PRCBATCH->CurrentValue = NULL;
		$this->PRCBATCH->OldValue = $this->PRCBATCH->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->BILLYM->CurrentValue = NULL;
		$this->BILLYM->OldValue = $this->BILLYM->CurrentValue;
		$this->BILLGRP->CurrentValue = NULL;
		$this->BILLGRP->OldValue = $this->BILLGRP->CurrentValue;
		$this->STAFF->CurrentValue = NULL;
		$this->STAFF->OldValue = $this->STAFF->CurrentValue;
		$this->TEMPIPNO->CurrentValue = NULL;
		$this->TEMPIPNO->OldValue = $this->TEMPIPNO->CurrentValue;
		$this->PRNTED->CurrentValue = NULL;
		$this->PRNTED->OldValue = $this->PRNTED->CurrentValue;
		$this->PATNAME->CurrentValue = NULL;
		$this->PATNAME->OldValue = $this->PATNAME->CurrentValue;
		$this->PJVNO->CurrentValue = NULL;
		$this->PJVNO->OldValue = $this->PJVNO->CurrentValue;
		$this->PJVSLNO->CurrentValue = NULL;
		$this->PJVSLNO->OldValue = $this->PJVSLNO->CurrentValue;
		$this->OTHDISC->CurrentValue = NULL;
		$this->OTHDISC->OldValue = $this->OTHDISC->CurrentValue;
		$this->PJVYM->CurrentValue = NULL;
		$this->PJVYM->OldValue = $this->PJVYM->CurrentValue;
		$this->PURDISCPER->CurrentValue = NULL;
		$this->PURDISCPER->OldValue = $this->PURDISCPER->CurrentValue;
		$this->CASHIER->CurrentValue = NULL;
		$this->CASHIER->OldValue = $this->CASHIER->CurrentValue;
		$this->CASHTIME->CurrentValue = NULL;
		$this->CASHTIME->OldValue = $this->CASHTIME->CurrentValue;
		$this->CASHRECD->CurrentValue = NULL;
		$this->CASHRECD->OldValue = $this->CASHRECD->CurrentValue;
		$this->CASHREFNO->CurrentValue = NULL;
		$this->CASHREFNO->OldValue = $this->CASHREFNO->CurrentValue;
		$this->CASHIERSHIFT->CurrentValue = NULL;
		$this->CASHIERSHIFT->OldValue = $this->CASHIERSHIFT->CurrentValue;
		$this->PRCODE->CurrentValue = NULL;
		$this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
		$this->RELEASEBY->CurrentValue = NULL;
		$this->RELEASEBY->OldValue = $this->RELEASEBY->CurrentValue;
		$this->CRAUTHOR->CurrentValue = NULL;
		$this->CRAUTHOR->OldValue = $this->CRAUTHOR->CurrentValue;
		$this->PAYMENT->CurrentValue = NULL;
		$this->PAYMENT->OldValue = $this->PAYMENT->CurrentValue;
		$this->DRID->CurrentValue = NULL;
		$this->DRID->OldValue = $this->DRID->CurrentValue;
		$this->WARD->CurrentValue = NULL;
		$this->WARD->OldValue = $this->WARD->CurrentValue;
		$this->STAXTYPE->CurrentValue = NULL;
		$this->STAXTYPE->OldValue = $this->STAXTYPE->CurrentValue;
		$this->PURDISCVAL->CurrentValue = NULL;
		$this->PURDISCVAL->OldValue = $this->PURDISCVAL->CurrentValue;
		$this->RNDOFF->CurrentValue = NULL;
		$this->RNDOFF->OldValue = $this->RNDOFF->CurrentValue;
		$this->DISCONMRP->CurrentValue = NULL;
		$this->DISCONMRP->OldValue = $this->DISCONMRP->CurrentValue;
		$this->DELVDT->CurrentValue = NULL;
		$this->DELVDT->OldValue = $this->DELVDT->CurrentValue;
		$this->DELVTIME->CurrentValue = NULL;
		$this->DELVTIME->OldValue = $this->DELVTIME->CurrentValue;
		$this->DELVBY->CurrentValue = NULL;
		$this->DELVBY->OldValue = $this->DELVBY->CurrentValue;
		$this->HOSPNO->CurrentValue = NULL;
		$this->HOSPNO->OldValue = $this->HOSPNO->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->pbv->CurrentValue = NULL;
		$this->pbv->OldValue = $this->pbv->CurrentValue;
		$this->pbt->CurrentValue = NULL;
		$this->pbt->OldValue = $this->pbt->CurrentValue;
		$this->HosoID->CurrentValue = NULL;
		$this->HosoID->OldValue = $this->HosoID->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->BRNAME->CurrentValue = NULL;
		$this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
		$this->sretid->CurrentValue = NULL;
		$this->sretid->OldValue = $this->sretid->CurrentValue;
		$this->sprid->CurrentValue = NULL;
		$this->sprid->OldValue = $this->sprid->CurrentValue;
		$this->baid->CurrentValue = NULL;
		$this->baid->OldValue = $this->baid->CurrentValue;
		$this->isdate->CurrentValue = NULL;
		$this->isdate->OldValue = $this->isdate->CurrentValue;
		$this->PSGST->CurrentValue = NULL;
		$this->PSGST->OldValue = $this->PSGST->CurrentValue;
		$this->PCGST->CurrentValue = NULL;
		$this->PCGST->OldValue = $this->PCGST->CurrentValue;
		$this->SSGST->CurrentValue = NULL;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = NULL;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->PurValue->CurrentValue = NULL;
		$this->PurValue->OldValue = $this->PurValue->CurrentValue;
		$this->PurRate->CurrentValue = NULL;
		$this->PurRate->OldValue = $this->PurRate->CurrentValue;
		$this->PUnit->CurrentValue = NULL;
		$this->PUnit->OldValue = $this->PUnit->CurrentValue;
		$this->SUnit->CurrentValue = NULL;
		$this->SUnit->OldValue = $this->SUnit->CurrentValue;
		$this->HSNCODE->CurrentValue = NULL;
		$this->HSNCODE->OldValue = $this->HSNCODE->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'SiNo' first before field var 'x_SiNo'
		$val = $CurrentForm->hasValue("SiNo") ? $CurrentForm->getValue("SiNo") : $CurrentForm->getValue("x_SiNo");
		if (!$this->SiNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SiNo->Visible = FALSE; // Disable update for API request
			else
				$this->SiNo->setFormValue($val);
		}
		$this->SiNo->setOldValue($CurrentForm->getValue("o_SiNo"));

		// Check field name 'SLNO' first before field var 'x_SLNO'
		$val = $CurrentForm->hasValue("SLNO") ? $CurrentForm->getValue("SLNO") : $CurrentForm->getValue("x_SLNO");
		if (!$this->SLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SLNO->Visible = FALSE; // Disable update for API request
			else
				$this->SLNO->setFormValue($val);
		}
		$this->SLNO->setOldValue($CurrentForm->getValue("o_SLNO"));

		// Check field name 'Product' first before field var 'x_Product'
		$val = $CurrentForm->hasValue("Product") ? $CurrentForm->getValue("Product") : $CurrentForm->getValue("x_Product");
		if (!$this->Product->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Product->Visible = FALSE; // Disable update for API request
			else
				$this->Product->setFormValue($val);
		}
		$this->Product->setOldValue($CurrentForm->getValue("o_Product"));

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}
		$this->RT->setOldValue($CurrentForm->getValue("o_RT"));

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}
		$this->IQ->setOldValue($CurrentForm->getValue("o_IQ"));

		// Check field name 'DAMT' first before field var 'x_DAMT'
		$val = $CurrentForm->hasValue("DAMT") ? $CurrentForm->getValue("DAMT") : $CurrentForm->getValue("x_DAMT");
		if (!$this->DAMT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DAMT->Visible = FALSE; // Disable update for API request
			else
				$this->DAMT->setFormValue($val);
		}
		$this->DAMT->setOldValue($CurrentForm->getValue("o_DAMT"));

		// Check field name 'Mfg' first before field var 'x_Mfg'
		$val = $CurrentForm->hasValue("Mfg") ? $CurrentForm->getValue("Mfg") : $CurrentForm->getValue("x_Mfg");
		if (!$this->Mfg->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mfg->Visible = FALSE; // Disable update for API request
			else
				$this->Mfg->setFormValue($val);
		}
		$this->Mfg->setOldValue($CurrentForm->getValue("o_Mfg"));

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EXPDT->Visible = FALSE; // Disable update for API request
			else
				$this->EXPDT->setFormValue($val);
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}
		$this->EXPDT->setOldValue($CurrentForm->getValue("o_EXPDT"));

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
		}
		$this->BATCHNO->setOldValue($CurrentForm->getValue("o_BATCHNO"));

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}
		$this->BRCODE->setOldValue($CurrentForm->getValue("o_BRCODE"));

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}
		$this->PRC->setOldValue($CurrentForm->getValue("o_PRC"));

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UR->Visible = FALSE; // Disable update for API request
			else
				$this->UR->setFormValue($val);
		}
		$this->UR->setOldValue($CurrentForm->getValue("o_UR"));

		// Check field name 'USERID' first before field var 'x__USERID'
		$val = $CurrentForm->hasValue("USERID") ? $CurrentForm->getValue("USERID") : $CurrentForm->getValue("x__USERID");
		if (!$this->_USERID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_USERID->Visible = FALSE; // Disable update for API request
			else
				$this->_USERID->setFormValue($val);
		}
		$this->_USERID->setOldValue($CurrentForm->getValue("o__USERID"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'HosoID' first before field var 'x_HosoID'
		$val = $CurrentForm->hasValue("HosoID") ? $CurrentForm->getValue("HosoID") : $CurrentForm->getValue("x_HosoID");
		if (!$this->HosoID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HosoID->Visible = FALSE; // Disable update for API request
			else
				$this->HosoID->setFormValue($val);
		}
		$this->HosoID->setOldValue($CurrentForm->getValue("o_HosoID"));

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		$this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		$this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'BRNAME' first before field var 'x_BRNAME'
		$val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
		if (!$this->BRNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRNAME->Visible = FALSE; // Disable update for API request
			else
				$this->BRNAME->setFormValue($val);
		}
		$this->BRNAME->setOldValue($CurrentForm->getValue("o_BRNAME"));

		// Check field name 'baid' first before field var 'x_baid'
		$val = $CurrentForm->hasValue("baid") ? $CurrentForm->getValue("baid") : $CurrentForm->getValue("x_baid");
		if (!$this->baid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->baid->Visible = FALSE; // Disable update for API request
			else
				$this->baid->setFormValue($val);
		}
		$this->baid->setOldValue($CurrentForm->getValue("o_baid"));

		// Check field name 'isdate' first before field var 'x_isdate'
		$val = $CurrentForm->hasValue("isdate") ? $CurrentForm->getValue("isdate") : $CurrentForm->getValue("x_isdate");
		if (!$this->isdate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->isdate->Visible = FALSE; // Disable update for API request
			else
				$this->isdate->setFormValue($val);
			$this->isdate->CurrentValue = UnFormatDateTime($this->isdate->CurrentValue, 0);
		}
		$this->isdate->setOldValue($CurrentForm->getValue("o_isdate"));

		// Check field name 'PSGST' first before field var 'x_PSGST'
		$val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
		if (!$this->PSGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PSGST->Visible = FALSE; // Disable update for API request
			else
				$this->PSGST->setFormValue($val);
		}
		$this->PSGST->setOldValue($CurrentForm->getValue("o_PSGST"));

		// Check field name 'PCGST' first before field var 'x_PCGST'
		$val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
		if (!$this->PCGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PCGST->Visible = FALSE; // Disable update for API request
			else
				$this->PCGST->setFormValue($val);
		}
		$this->PCGST->setOldValue($CurrentForm->getValue("o_PCGST"));

		// Check field name 'SSGST' first before field var 'x_SSGST'
		$val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
		if (!$this->SSGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SSGST->Visible = FALSE; // Disable update for API request
			else
				$this->SSGST->setFormValue($val);
		}
		$this->SSGST->setOldValue($CurrentForm->getValue("o_SSGST"));

		// Check field name 'SCGST' first before field var 'x_SCGST'
		$val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
		if (!$this->SCGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SCGST->Visible = FALSE; // Disable update for API request
			else
				$this->SCGST->setFormValue($val);
		}
		$this->SCGST->setOldValue($CurrentForm->getValue("o_SCGST"));

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurValue->Visible = FALSE; // Disable update for API request
			else
				$this->PurValue->setFormValue($val);
		}
		$this->PurValue->setOldValue($CurrentForm->getValue("o_PurValue"));

		// Check field name 'PurRate' first before field var 'x_PurRate'
		$val = $CurrentForm->hasValue("PurRate") ? $CurrentForm->getValue("PurRate") : $CurrentForm->getValue("x_PurRate");
		if (!$this->PurRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurRate->Visible = FALSE; // Disable update for API request
			else
				$this->PurRate->setFormValue($val);
		}
		$this->PurRate->setOldValue($CurrentForm->getValue("o_PurRate"));

		// Check field name 'PUnit' first before field var 'x_PUnit'
		$val = $CurrentForm->hasValue("PUnit") ? $CurrentForm->getValue("PUnit") : $CurrentForm->getValue("x_PUnit");
		if (!$this->PUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PUnit->Visible = FALSE; // Disable update for API request
			else
				$this->PUnit->setFormValue($val);
		}
		$this->PUnit->setOldValue($CurrentForm->getValue("o_PUnit"));

		// Check field name 'SUnit' first before field var 'x_SUnit'
		$val = $CurrentForm->hasValue("SUnit") ? $CurrentForm->getValue("SUnit") : $CurrentForm->getValue("x_SUnit");
		if (!$this->SUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SUnit->Visible = FALSE; // Disable update for API request
			else
				$this->SUnit->setFormValue($val);
		}
		$this->SUnit->setOldValue($CurrentForm->getValue("o_SUnit"));

		// Check field name 'HSNCODE' first before field var 'x_HSNCODE'
		$val = $CurrentForm->hasValue("HSNCODE") ? $CurrentForm->getValue("HSNCODE") : $CurrentForm->getValue("x_HSNCODE");
		if (!$this->HSNCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HSNCODE->Visible = FALSE; // Disable update for API request
			else
				$this->HSNCODE->setFormValue($val);
		}
		$this->HSNCODE->setOldValue($CurrentForm->getValue("o_HSNCODE"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->SiNo->CurrentValue = $this->SiNo->FormValue;
		$this->SLNO->CurrentValue = $this->SLNO->FormValue;
		$this->Product->CurrentValue = $this->Product->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->DAMT->CurrentValue = $this->DAMT->FormValue;
		$this->Mfg->CurrentValue = $this->Mfg->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->UR->CurrentValue = $this->UR->FormValue;
		$this->_USERID->CurrentValue = $this->_USERID->FormValue;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->HosoID->CurrentValue = $this->HosoID->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
		$this->baid->CurrentValue = $this->baid->FormValue;
		$this->isdate->CurrentValue = $this->isdate->FormValue;
		$this->isdate->CurrentValue = UnFormatDateTime($this->isdate->CurrentValue, 0);
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->PurRate->CurrentValue = $this->PurRate->FormValue;
		$this->PUnit->CurrentValue = $this->PUnit->FormValue;
		$this->SUnit->CurrentValue = $this->SUnit->FormValue;
		$this->HSNCODE->CurrentValue = $this->HSNCODE->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
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
		$this->SiNo->setDbValue($row['SiNo']);
		$this->SLNO->setDbValue($row['SLNO']);
		$this->Product->setDbValue($row['Product']);
		$this->RT->setDbValue($row['RT']);
		$this->IQ->setDbValue($row['IQ']);
		$this->DAMT->setDbValue($row['DAMT']);
		$this->Mfg->setDbValue($row['Mfg']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DN->setDbValue($row['DN']);
		$this->RDN->setDbValue($row['RDN']);
		$this->DT->setDbValue($row['DT']);
		$this->PRC->setDbValue($row['PRC']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->VALUE->setDbValue($row['VALUE']);
		$this->DISC->setDbValue($row['DISC']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->TAX->setDbValue($row['TAX']);
		$this->TAXR->setDbValue($row['TAXR']);
		$this->EMPNO->setDbValue($row['EMPNO']);
		$this->PC->setDbValue($row['PC']);
		$this->DRNAME->setDbValue($row['DRNAME']);
		$this->BTIME->setDbValue($row['BTIME']);
		$this->ONO->setDbValue($row['ONO']);
		$this->ODT->setDbValue($row['ODT']);
		$this->PURRT->setDbValue($row['PURRT']);
		$this->GRP->setDbValue($row['GRP']);
		$this->IBATCH->setDbValue($row['IBATCH']);
		$this->IPNO->setDbValue($row['IPNO']);
		$this->OPNO->setDbValue($row['OPNO']);
		$this->RECID->setDbValue($row['RECID']);
		$this->FQTY->setDbValue($row['FQTY']);
		$this->UR->setDbValue($row['UR']);
		$this->DCID->setDbValue($row['DCID']);
		$this->_USERID->setDbValue($row['USERID']);
		$this->MODDT->setDbValue($row['MODDT']);
		$this->FYM->setDbValue($row['FYM']);
		$this->PRCBATCH->setDbValue($row['PRCBATCH']);
		$this->MRP->setDbValue($row['MRP']);
		$this->BILLYM->setDbValue($row['BILLYM']);
		$this->BILLGRP->setDbValue($row['BILLGRP']);
		$this->STAFF->setDbValue($row['STAFF']);
		$this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
		$this->PRNTED->setDbValue($row['PRNTED']);
		$this->PATNAME->setDbValue($row['PATNAME']);
		$this->PJVNO->setDbValue($row['PJVNO']);
		$this->PJVSLNO->setDbValue($row['PJVSLNO']);
		$this->OTHDISC->setDbValue($row['OTHDISC']);
		$this->PJVYM->setDbValue($row['PJVYM']);
		$this->PURDISCPER->setDbValue($row['PURDISCPER']);
		$this->CASHIER->setDbValue($row['CASHIER']);
		$this->CASHTIME->setDbValue($row['CASHTIME']);
		$this->CASHRECD->setDbValue($row['CASHRECD']);
		$this->CASHREFNO->setDbValue($row['CASHREFNO']);
		$this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->RELEASEBY->setDbValue($row['RELEASEBY']);
		$this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
		$this->PAYMENT->setDbValue($row['PAYMENT']);
		$this->DRID->setDbValue($row['DRID']);
		$this->WARD->setDbValue($row['WARD']);
		$this->STAXTYPE->setDbValue($row['STAXTYPE']);
		$this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
		$this->RNDOFF->setDbValue($row['RNDOFF']);
		$this->DISCONMRP->setDbValue($row['DISCONMRP']);
		$this->DELVDT->setDbValue($row['DELVDT']);
		$this->DELVTIME->setDbValue($row['DELVTIME']);
		$this->DELVBY->setDbValue($row['DELVBY']);
		$this->HOSPNO->setDbValue($row['HOSPNO']);
		$this->id->setDbValue($row['id']);
		$this->pbv->setDbValue($row['pbv']);
		$this->pbt->setDbValue($row['pbt']);
		$this->HosoID->setDbValue($row['HosoID']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatID->setDbValue($row['PatID']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->BRNAME->setDbValue($row['BRNAME']);
		$this->sretid->setDbValue($row['sretid']);
		$this->sprid->setDbValue($row['sprid']);
		$this->baid->setDbValue($row['baid']);
		$this->isdate->setDbValue($row['isdate']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PurRate->setDbValue($row['PurRate']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->HSNCODE->setDbValue($row['HSNCODE']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['SiNo'] = $this->SiNo->CurrentValue;
		$row['SLNO'] = $this->SLNO->CurrentValue;
		$row['Product'] = $this->Product->CurrentValue;
		$row['RT'] = $this->RT->CurrentValue;
		$row['IQ'] = $this->IQ->CurrentValue;
		$row['DAMT'] = $this->DAMT->CurrentValue;
		$row['Mfg'] = $this->Mfg->CurrentValue;
		$row['EXPDT'] = $this->EXPDT->CurrentValue;
		$row['BATCHNO'] = $this->BATCHNO->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['TYPE'] = $this->TYPE->CurrentValue;
		$row['DN'] = $this->DN->CurrentValue;
		$row['RDN'] = $this->RDN->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['OQ'] = $this->OQ->CurrentValue;
		$row['RQ'] = $this->RQ->CurrentValue;
		$row['MRQ'] = $this->MRQ->CurrentValue;
		$row['BILLNO'] = $this->BILLNO->CurrentValue;
		$row['BILLDT'] = $this->BILLDT->CurrentValue;
		$row['VALUE'] = $this->VALUE->CurrentValue;
		$row['DISC'] = $this->DISC->CurrentValue;
		$row['TAXP'] = $this->TAXP->CurrentValue;
		$row['TAX'] = $this->TAX->CurrentValue;
		$row['TAXR'] = $this->TAXR->CurrentValue;
		$row['EMPNO'] = $this->EMPNO->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['DRNAME'] = $this->DRNAME->CurrentValue;
		$row['BTIME'] = $this->BTIME->CurrentValue;
		$row['ONO'] = $this->ONO->CurrentValue;
		$row['ODT'] = $this->ODT->CurrentValue;
		$row['PURRT'] = $this->PURRT->CurrentValue;
		$row['GRP'] = $this->GRP->CurrentValue;
		$row['IBATCH'] = $this->IBATCH->CurrentValue;
		$row['IPNO'] = $this->IPNO->CurrentValue;
		$row['OPNO'] = $this->OPNO->CurrentValue;
		$row['RECID'] = $this->RECID->CurrentValue;
		$row['FQTY'] = $this->FQTY->CurrentValue;
		$row['UR'] = $this->UR->CurrentValue;
		$row['DCID'] = $this->DCID->CurrentValue;
		$row['USERID'] = $this->_USERID->CurrentValue;
		$row['MODDT'] = $this->MODDT->CurrentValue;
		$row['FYM'] = $this->FYM->CurrentValue;
		$row['PRCBATCH'] = $this->PRCBATCH->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['BILLYM'] = $this->BILLYM->CurrentValue;
		$row['BILLGRP'] = $this->BILLGRP->CurrentValue;
		$row['STAFF'] = $this->STAFF->CurrentValue;
		$row['TEMPIPNO'] = $this->TEMPIPNO->CurrentValue;
		$row['PRNTED'] = $this->PRNTED->CurrentValue;
		$row['PATNAME'] = $this->PATNAME->CurrentValue;
		$row['PJVNO'] = $this->PJVNO->CurrentValue;
		$row['PJVSLNO'] = $this->PJVSLNO->CurrentValue;
		$row['OTHDISC'] = $this->OTHDISC->CurrentValue;
		$row['PJVYM'] = $this->PJVYM->CurrentValue;
		$row['PURDISCPER'] = $this->PURDISCPER->CurrentValue;
		$row['CASHIER'] = $this->CASHIER->CurrentValue;
		$row['CASHTIME'] = $this->CASHTIME->CurrentValue;
		$row['CASHRECD'] = $this->CASHRECD->CurrentValue;
		$row['CASHREFNO'] = $this->CASHREFNO->CurrentValue;
		$row['CASHIERSHIFT'] = $this->CASHIERSHIFT->CurrentValue;
		$row['PRCODE'] = $this->PRCODE->CurrentValue;
		$row['RELEASEBY'] = $this->RELEASEBY->CurrentValue;
		$row['CRAUTHOR'] = $this->CRAUTHOR->CurrentValue;
		$row['PAYMENT'] = $this->PAYMENT->CurrentValue;
		$row['DRID'] = $this->DRID->CurrentValue;
		$row['WARD'] = $this->WARD->CurrentValue;
		$row['STAXTYPE'] = $this->STAXTYPE->CurrentValue;
		$row['PURDISCVAL'] = $this->PURDISCVAL->CurrentValue;
		$row['RNDOFF'] = $this->RNDOFF->CurrentValue;
		$row['DISCONMRP'] = $this->DISCONMRP->CurrentValue;
		$row['DELVDT'] = $this->DELVDT->CurrentValue;
		$row['DELVTIME'] = $this->DELVTIME->CurrentValue;
		$row['DELVBY'] = $this->DELVBY->CurrentValue;
		$row['HOSPNO'] = $this->HOSPNO->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['pbv'] = $this->pbv->CurrentValue;
		$row['pbt'] = $this->pbt->CurrentValue;
		$row['HosoID'] = $this->HosoID->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['BRNAME'] = $this->BRNAME->CurrentValue;
		$row['sretid'] = $this->sretid->CurrentValue;
		$row['sprid'] = $this->sprid->CurrentValue;
		$row['baid'] = $this->baid->CurrentValue;
		$row['isdate'] = $this->isdate->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['PurRate'] = $this->PurRate->CurrentValue;
		$row['PUnit'] = $this->PUnit->CurrentValue;
		$row['SUnit'] = $this->SUnit->CurrentValue;
		$row['HSNCODE'] = $this->HSNCODE->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$this->id->CurrentValue = strval($arKeys[0]); // id
			else
				$validKey = FALSE;
		} else {
			$validKey = FALSE;
		}

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
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Convert decimal values if posted back
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue)))
			$this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

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
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue)))
			$this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// SiNo
		// SLNO
		// Product
		// RT
		// IQ
		// DAMT
		// Mfg
		// EXPDT
		// BATCHNO
		// BRCODE
		// TYPE
		// DN
		// RDN
		// DT
		// PRC
		// OQ
		// RQ
		// MRQ
		// BILLNO
		// BILLDT
		// VALUE
		// DISC
		// TAXP
		// TAX
		// TAXR
		// EMPNO
		// PC
		// DRNAME
		// BTIME
		// ONO
		// ODT
		// PURRT
		// GRP
		// IBATCH
		// IPNO
		// OPNO
		// RECID
		// FQTY
		// UR
		// DCID
		// USERID
		// MODDT
		// FYM
		// PRCBATCH
		// MRP
		// BILLYM
		// BILLGRP
		// STAFF
		// TEMPIPNO
		// PRNTED
		// PATNAME
		// PJVNO
		// PJVSLNO
		// OTHDISC
		// PJVYM
		// PURDISCPER
		// CASHIER
		// CASHTIME
		// CASHRECD
		// CASHREFNO
		// CASHIERSHIFT
		// PRCODE
		// RELEASEBY
		// CRAUTHOR
		// PAYMENT
		// DRID
		// WARD
		// STAXTYPE
		// PURDISCVAL
		// RNDOFF
		// DISCONMRP
		// DELVDT
		// DELVTIME
		// DELVBY
		// HOSPNO
		// id
		// pbv
		// pbt
		// HosoID
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// MFRCODE
		// Reception
		// PatID
		// mrnno
		// BRNAME
		// sretid
		// sprid
		// baid
		// isdate
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// PurValue
		// PurRate
		// PUnit
		// SUnit
		// HSNCODE

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// SiNo
			$this->SiNo->ViewValue = $this->SiNo->CurrentValue;
			$this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
			$this->SiNo->ViewCustomAttributes = "";

			// SLNO
			$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->ViewValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = FormatDateTime($rswrk->fields('df4'), 0);
						$this->SLNO->ViewValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
					}
				}
			} else {
				$this->SLNO->ViewValue = NULL;
			}
			$this->SLNO->ViewCustomAttributes = "";

			// Product
			$this->Product->ViewValue = $this->Product->CurrentValue;
			$this->Product->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// DAMT
			$this->DAMT->ViewValue = $this->DAMT->CurrentValue;
			$this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
			$this->DAMT->ViewCustomAttributes = "";

			// Mfg
			$this->Mfg->ViewValue = $this->Mfg->CurrentValue;
			$this->Mfg->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewCustomAttributes = "";

			// TYPE
			$this->TYPE->ViewValue = $this->TYPE->CurrentValue;
			$this->TYPE->ViewCustomAttributes = "";

			// DN
			$this->DN->ViewValue = $this->DN->CurrentValue;
			$this->DN->ViewCustomAttributes = "";

			// RDN
			$this->RDN->ViewValue = $this->RDN->CurrentValue;
			$this->RDN->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

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

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
			$this->BILLDT->ViewCustomAttributes = "";

			// VALUE
			$this->VALUE->ViewValue = $this->VALUE->CurrentValue;
			$this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
			$this->VALUE->ViewCustomAttributes = "";

			// DISC
			$this->DISC->ViewValue = $this->DISC->CurrentValue;
			$this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
			$this->DISC->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// TAX
			$this->TAX->ViewValue = $this->TAX->CurrentValue;
			$this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
			$this->TAX->ViewCustomAttributes = "";

			// TAXR
			$this->TAXR->ViewValue = $this->TAXR->CurrentValue;
			$this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
			$this->TAXR->ViewCustomAttributes = "";

			// EMPNO
			$this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
			$this->EMPNO->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// DRNAME
			$this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
			$this->DRNAME->ViewCustomAttributes = "";

			// BTIME
			$this->BTIME->ViewValue = $this->BTIME->CurrentValue;
			$this->BTIME->ViewCustomAttributes = "";

			// ONO
			$this->ONO->ViewValue = $this->ONO->CurrentValue;
			$this->ONO->ViewCustomAttributes = "";

			// ODT
			$this->ODT->ViewValue = $this->ODT->CurrentValue;
			$this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
			$this->ODT->ViewCustomAttributes = "";

			// PURRT
			$this->PURRT->ViewValue = $this->PURRT->CurrentValue;
			$this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
			$this->PURRT->ViewCustomAttributes = "";

			// GRP
			$this->GRP->ViewValue = $this->GRP->CurrentValue;
			$this->GRP->ViewCustomAttributes = "";

			// IBATCH
			$this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
			$this->IBATCH->ViewCustomAttributes = "";

			// IPNO
			$this->IPNO->ViewValue = $this->IPNO->CurrentValue;
			$this->IPNO->ViewCustomAttributes = "";

			// OPNO
			$this->OPNO->ViewValue = $this->OPNO->CurrentValue;
			$this->OPNO->ViewCustomAttributes = "";

			// RECID
			$this->RECID->ViewValue = $this->RECID->CurrentValue;
			$this->RECID->ViewCustomAttributes = "";

			// FQTY
			$this->FQTY->ViewValue = $this->FQTY->CurrentValue;
			$this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
			$this->FQTY->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// DCID
			$this->DCID->ViewValue = $this->DCID->CurrentValue;
			$this->DCID->ViewCustomAttributes = "";

			// USERID
			$this->_USERID->ViewValue = $this->_USERID->CurrentValue;
			$this->_USERID->ViewCustomAttributes = "";

			// MODDT
			$this->MODDT->ViewValue = $this->MODDT->CurrentValue;
			$this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
			$this->MODDT->ViewCustomAttributes = "";

			// FYM
			$this->FYM->ViewValue = $this->FYM->CurrentValue;
			$this->FYM->ViewCustomAttributes = "";

			// PRCBATCH
			$this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
			$this->PRCBATCH->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// BILLYM
			$this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
			$this->BILLYM->ViewCustomAttributes = "";

			// BILLGRP
			$this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
			$this->BILLGRP->ViewCustomAttributes = "";

			// STAFF
			$this->STAFF->ViewValue = $this->STAFF->CurrentValue;
			$this->STAFF->ViewCustomAttributes = "";

			// TEMPIPNO
			$this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
			$this->TEMPIPNO->ViewCustomAttributes = "";

			// PRNTED
			$this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
			$this->PRNTED->ViewCustomAttributes = "";

			// PATNAME
			$this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
			$this->PATNAME->ViewCustomAttributes = "";

			// PJVNO
			$this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
			$this->PJVNO->ViewCustomAttributes = "";

			// PJVSLNO
			$this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
			$this->PJVSLNO->ViewCustomAttributes = "";

			// OTHDISC
			$this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
			$this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
			$this->OTHDISC->ViewCustomAttributes = "";

			// PJVYM
			$this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
			$this->PJVYM->ViewCustomAttributes = "";

			// PURDISCPER
			$this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
			$this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
			$this->PURDISCPER->ViewCustomAttributes = "";

			// CASHIER
			$this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
			$this->CASHIER->ViewCustomAttributes = "";

			// CASHTIME
			$this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
			$this->CASHTIME->ViewCustomAttributes = "";

			// CASHRECD
			$this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
			$this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
			$this->CASHRECD->ViewCustomAttributes = "";

			// CASHREFNO
			$this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
			$this->CASHREFNO->ViewCustomAttributes = "";

			// CASHIERSHIFT
			$this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
			$this->CASHIERSHIFT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// RELEASEBY
			$this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
			$this->RELEASEBY->ViewCustomAttributes = "";

			// CRAUTHOR
			$this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
			$this->CRAUTHOR->ViewCustomAttributes = "";

			// PAYMENT
			$this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
			$this->PAYMENT->ViewCustomAttributes = "";

			// DRID
			$this->DRID->ViewValue = $this->DRID->CurrentValue;
			$this->DRID->ViewCustomAttributes = "";

			// WARD
			$this->WARD->ViewValue = $this->WARD->CurrentValue;
			$this->WARD->ViewCustomAttributes = "";

			// STAXTYPE
			$this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
			$this->STAXTYPE->ViewCustomAttributes = "";

			// PURDISCVAL
			$this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
			$this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
			$this->PURDISCVAL->ViewCustomAttributes = "";

			// RNDOFF
			$this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
			$this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
			$this->RNDOFF->ViewCustomAttributes = "";

			// DISCONMRP
			$this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
			$this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
			$this->DISCONMRP->ViewCustomAttributes = "";

			// DELVDT
			$this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
			$this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
			$this->DELVDT->ViewCustomAttributes = "";

			// DELVTIME
			$this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
			$this->DELVTIME->ViewCustomAttributes = "";

			// DELVBY
			$this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
			$this->DELVBY->ViewCustomAttributes = "";

			// HOSPNO
			$this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
			$this->HOSPNO->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// pbv
			$this->pbv->ViewValue = $this->pbv->CurrentValue;
			$this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
			$this->pbv->ViewCustomAttributes = "";

			// pbt
			$this->pbt->ViewValue = $this->pbt->CurrentValue;
			$this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
			$this->pbt->ViewCustomAttributes = "";

			// HosoID
			$this->HosoID->ViewValue = $this->HosoID->CurrentValue;
			$this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
			$this->HosoID->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// BRNAME
			$this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
			$this->BRNAME->ViewCustomAttributes = "";

			// sretid
			$this->sretid->ViewValue = $this->sretid->CurrentValue;
			$this->sretid->ViewValue = FormatNumber($this->sretid->ViewValue, 0, -2, -2, -2);
			$this->sretid->ViewCustomAttributes = "";

			// sprid
			$this->sprid->ViewValue = $this->sprid->CurrentValue;
			$this->sprid->ViewValue = FormatNumber($this->sprid->ViewValue, 0, -2, -2, -2);
			$this->sprid->ViewCustomAttributes = "";

			// baid
			$this->baid->ViewValue = $this->baid->CurrentValue;
			$this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
			$this->baid->ViewCustomAttributes = "";

			// isdate
			$this->isdate->ViewValue = $this->isdate->CurrentValue;
			$this->isdate->ViewValue = FormatDateTime($this->isdate->ViewValue, 0);
			$this->isdate->ViewCustomAttributes = "";

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

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// HSNCODE
			$this->HSNCODE->ViewValue = $this->HSNCODE->CurrentValue;
			$this->HSNCODE->ViewCustomAttributes = "";

			// SiNo
			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";
			$this->SiNo->TooltipValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";
			$this->SLNO->TooltipValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";
			$this->Product->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";
			$this->DAMT->TooltipValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";
			$this->Mfg->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";
			$this->_USERID->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";
			$this->HosoID->TooltipValue = "";

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

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";
			$this->baid->TooltipValue = "";

			// isdate
			$this->isdate->LinkCustomAttributes = "";
			$this->isdate->HrefValue = "";
			$this->isdate->TooltipValue = "";

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

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";
			$this->PurRate->TooltipValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";
			$this->PUnit->TooltipValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";
			$this->SUnit->TooltipValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";
			$this->HSNCODE->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// SiNo
			$this->SiNo->EditAttrs["class"] = "form-control";
			$this->SiNo->EditCustomAttributes = "";
			$this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
			$this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

			// SLNO
			$this->SLNO->EditAttrs["class"] = "form-control";
			$this->SLNO->EditCustomAttributes = "";
			$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
						$arwrk[4] = HtmlEncode(FormatDateTime($rswrk->fields('df4'), 0));
						$this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
					}
				}
			} else {
				$this->SLNO->EditValue = NULL;
			}
			$this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

			// Product
			$this->Product->EditAttrs["class"] = "form-control";
			$this->Product->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
			$this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
			$this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue)) {
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
				$this->RT->OldValue = $this->RT->EditValue;
			}

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue)) {
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
				$this->IQ->OldValue = $this->IQ->EditValue;
			}

			// DAMT
			$this->DAMT->EditAttrs["class"] = "form-control";
			$this->DAMT->EditCustomAttributes = "";
			$this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
			$this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
			if (strval($this->DAMT->EditValue) <> "" && is_numeric($this->DAMT->EditValue)) {
				$this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
				$this->DAMT->OldValue = $this->DAMT->EditValue;
			}

			// Mfg
			$this->Mfg->EditAttrs["class"] = "form-control";
			$this->Mfg->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
			$this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
			$this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue)) {
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
				$this->UR->OldValue = $this->UR->EditValue;
			}

			// USERID
			// id
			// HosoID
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// BRNAME
			// baid

			$this->baid->EditAttrs["class"] = "form-control";
			$this->baid->EditCustomAttributes = "";
			$this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
			$this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

			// isdate
			// PSGST

			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue)) {
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
				$this->PSGST->OldValue = $this->PSGST->EditValue;
			}

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue)) {
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
				$this->PCGST->OldValue = $this->PCGST->EditValue;
			}

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue)) {
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
				$this->SSGST->OldValue = $this->SSGST->EditValue;
			}

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue)) {
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
				$this->SCGST->OldValue = $this->SCGST->EditValue;
			}

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue)) {
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
				$this->PurValue->OldValue = $this->PurValue->EditValue;
			}

			// PurRate
			$this->PurRate->EditAttrs["class"] = "form-control";
			$this->PurRate->EditCustomAttributes = "";
			$this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
			$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
			if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue)) {
				$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
				$this->PurRate->OldValue = $this->PurRate->EditValue;
			}

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

			// HSNCODE
			$this->HSNCODE->EditAttrs["class"] = "form-control";
			$this->HSNCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

			// Add refer script
			// SiNo

			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";

			// isdate
			$this->isdate->LinkCustomAttributes = "";
			$this->isdate->HrefValue = "";

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

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// SiNo
			$this->SiNo->EditAttrs["class"] = "form-control";
			$this->SiNo->EditCustomAttributes = "";
			$this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
			$this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

			// SLNO
			$this->SLNO->EditAttrs["class"] = "form-control";
			$this->SLNO->EditCustomAttributes = "";
			$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
			$curVal = strval($this->SLNO->CurrentValue);
			if ($curVal <> "") {
				$this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
				if ($this->SLNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->SLNO->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
						$arwrk[4] = HtmlEncode(FormatDateTime($rswrk->fields('df4'), 0));
						$this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
					}
				}
			} else {
				$this->SLNO->EditValue = NULL;
			}
			$this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

			// Product
			$this->Product->EditAttrs["class"] = "form-control";
			$this->Product->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
			$this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
			$this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue)) {
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
				$this->RT->OldValue = $this->RT->EditValue;
			}

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue)) {
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
				$this->IQ->OldValue = $this->IQ->EditValue;
			}

			// DAMT
			$this->DAMT->EditAttrs["class"] = "form-control";
			$this->DAMT->EditCustomAttributes = "";
			$this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
			$this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
			if (strval($this->DAMT->EditValue) <> "" && is_numeric($this->DAMT->EditValue)) {
				$this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
				$this->DAMT->OldValue = $this->DAMT->EditValue;
			}

			// Mfg
			$this->Mfg->EditAttrs["class"] = "form-control";
			$this->Mfg->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
			$this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
			$this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// BRCODE
			// PRC

			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue)) {
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
				$this->UR->OldValue = $this->UR->EditValue;
			}

			// USERID
			// id

			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// HosoID
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// BRNAME
			// baid

			$this->baid->EditAttrs["class"] = "form-control";
			$this->baid->EditCustomAttributes = "";
			$this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
			$this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

			// isdate
			// PSGST

			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue)) {
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
				$this->PSGST->OldValue = $this->PSGST->EditValue;
			}

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue)) {
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
				$this->PCGST->OldValue = $this->PCGST->EditValue;
			}

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue)) {
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
				$this->SSGST->OldValue = $this->SSGST->EditValue;
			}

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue)) {
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
				$this->SCGST->OldValue = $this->SCGST->EditValue;
			}

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue)) {
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
				$this->PurValue->OldValue = $this->PurValue->EditValue;
			}

			// PurRate
			$this->PurRate->EditAttrs["class"] = "form-control";
			$this->PurRate->EditCustomAttributes = "";
			$this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
			$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
			if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue)) {
				$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
				$this->PurRate->OldValue = $this->PurRate->EditValue;
			}

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

			// HSNCODE
			$this->HSNCODE->EditAttrs["class"] = "form-control";
			$this->HSNCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
			$this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

			// Edit refer script
			// SiNo

			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// HosoID
			$this->HosoID->LinkCustomAttributes = "";
			$this->HosoID->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";

			// isdate
			$this->isdate->LinkCustomAttributes = "";
			$this->isdate->HrefValue = "";

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

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";

			// HSNCODE
			$this->HSNCODE->LinkCustomAttributes = "";
			$this->HSNCODE->HrefValue = "";
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

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->SiNo->Required) {
			if (!$this->SiNo->IsDetailKey && $this->SiNo->FormValue != NULL && $this->SiNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SiNo->caption(), $this->SiNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SiNo->FormValue)) {
			AddMessage($FormError, $this->SiNo->errorMessage());
		}
		if ($this->SLNO->Required) {
			if (!$this->SLNO->IsDetailKey && $this->SLNO->FormValue != NULL && $this->SLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SLNO->caption(), $this->SLNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SLNO->FormValue)) {
			AddMessage($FormError, $this->SLNO->errorMessage());
		}
		if ($this->Product->Required) {
			if (!$this->Product->IsDetailKey && $this->Product->FormValue != NULL && $this->Product->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Product->caption(), $this->Product->RequiredErrorMessage));
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
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IQ->FormValue)) {
			AddMessage($FormError, $this->IQ->errorMessage());
		}
		if ($this->DAMT->Required) {
			if (!$this->DAMT->IsDetailKey && $this->DAMT->FormValue != NULL && $this->DAMT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DAMT->caption(), $this->DAMT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DAMT->FormValue)) {
			AddMessage($FormError, $this->DAMT->errorMessage());
		}
		if ($this->Mfg->Required) {
			if (!$this->Mfg->IsDetailKey && $this->Mfg->FormValue != NULL && $this->Mfg->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mfg->caption(), $this->Mfg->RequiredErrorMessage));
			}
		}
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EXPDT->FormValue)) {
			AddMessage($FormError, $this->EXPDT->errorMessage());
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->TYPE->Required) {
			if (!$this->TYPE->IsDetailKey && $this->TYPE->FormValue != NULL && $this->TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DN->Required) {
			if (!$this->DN->IsDetailKey && $this->DN->FormValue != NULL && $this->DN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DN->caption(), $this->DN->RequiredErrorMessage));
			}
		}
		if ($this->RDN->Required) {
			if (!$this->RDN->IsDetailKey && $this->RDN->FormValue != NULL && $this->RDN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RDN->caption(), $this->RDN->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->OQ->Required) {
			if (!$this->OQ->IsDetailKey && $this->OQ->FormValue != NULL && $this->OQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
			}
		}
		if ($this->RQ->Required) {
			if (!$this->RQ->IsDetailKey && $this->RQ->FormValue != NULL && $this->RQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
			}
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if ($this->BILLNO->Required) {
			if (!$this->BILLNO->IsDetailKey && $this->BILLNO->FormValue != NULL && $this->BILLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
			}
		}
		if ($this->BILLDT->Required) {
			if (!$this->BILLDT->IsDetailKey && $this->BILLDT->FormValue != NULL && $this->BILLDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
			}
		}
		if ($this->VALUE->Required) {
			if (!$this->VALUE->IsDetailKey && $this->VALUE->FormValue != NULL && $this->VALUE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VALUE->caption(), $this->VALUE->RequiredErrorMessage));
			}
		}
		if ($this->DISC->Required) {
			if (!$this->DISC->IsDetailKey && $this->DISC->FormValue != NULL && $this->DISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DISC->caption(), $this->DISC->RequiredErrorMessage));
			}
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if ($this->TAX->Required) {
			if (!$this->TAX->IsDetailKey && $this->TAX->FormValue != NULL && $this->TAX->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAX->caption(), $this->TAX->RequiredErrorMessage));
			}
		}
		if ($this->TAXR->Required) {
			if (!$this->TAXR->IsDetailKey && $this->TAXR->FormValue != NULL && $this->TAXR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXR->caption(), $this->TAXR->RequiredErrorMessage));
			}
		}
		if ($this->EMPNO->Required) {
			if (!$this->EMPNO->IsDetailKey && $this->EMPNO->FormValue != NULL && $this->EMPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EMPNO->caption(), $this->EMPNO->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->DRNAME->Required) {
			if (!$this->DRNAME->IsDetailKey && $this->DRNAME->FormValue != NULL && $this->DRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRNAME->caption(), $this->DRNAME->RequiredErrorMessage));
			}
		}
		if ($this->BTIME->Required) {
			if (!$this->BTIME->IsDetailKey && $this->BTIME->FormValue != NULL && $this->BTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BTIME->caption(), $this->BTIME->RequiredErrorMessage));
			}
		}
		if ($this->ONO->Required) {
			if (!$this->ONO->IsDetailKey && $this->ONO->FormValue != NULL && $this->ONO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ONO->caption(), $this->ONO->RequiredErrorMessage));
			}
		}
		if ($this->ODT->Required) {
			if (!$this->ODT->IsDetailKey && $this->ODT->FormValue != NULL && $this->ODT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ODT->caption(), $this->ODT->RequiredErrorMessage));
			}
		}
		if ($this->PURRT->Required) {
			if (!$this->PURRT->IsDetailKey && $this->PURRT->FormValue != NULL && $this->PURRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURRT->caption(), $this->PURRT->RequiredErrorMessage));
			}
		}
		if ($this->GRP->Required) {
			if (!$this->GRP->IsDetailKey && $this->GRP->FormValue != NULL && $this->GRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRP->caption(), $this->GRP->RequiredErrorMessage));
			}
		}
		if ($this->IBATCH->Required) {
			if (!$this->IBATCH->IsDetailKey && $this->IBATCH->FormValue != NULL && $this->IBATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IBATCH->caption(), $this->IBATCH->RequiredErrorMessage));
			}
		}
		if ($this->IPNO->Required) {
			if (!$this->IPNO->IsDetailKey && $this->IPNO->FormValue != NULL && $this->IPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IPNO->caption(), $this->IPNO->RequiredErrorMessage));
			}
		}
		if ($this->OPNO->Required) {
			if (!$this->OPNO->IsDetailKey && $this->OPNO->FormValue != NULL && $this->OPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPNO->caption(), $this->OPNO->RequiredErrorMessage));
			}
		}
		if ($this->RECID->Required) {
			if (!$this->RECID->IsDetailKey && $this->RECID->FormValue != NULL && $this->RECID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RECID->caption(), $this->RECID->RequiredErrorMessage));
			}
		}
		if ($this->FQTY->Required) {
			if (!$this->FQTY->IsDetailKey && $this->FQTY->FormValue != NULL && $this->FQTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FQTY->caption(), $this->FQTY->RequiredErrorMessage));
			}
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->DCID->Required) {
			if (!$this->DCID->IsDetailKey && $this->DCID->FormValue != NULL && $this->DCID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DCID->caption(), $this->DCID->RequiredErrorMessage));
			}
		}
		if ($this->_USERID->Required) {
			if (!$this->_USERID->IsDetailKey && $this->_USERID->FormValue != NULL && $this->_USERID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_USERID->caption(), $this->_USERID->RequiredErrorMessage));
			}
		}
		if ($this->MODDT->Required) {
			if (!$this->MODDT->IsDetailKey && $this->MODDT->FormValue != NULL && $this->MODDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MODDT->caption(), $this->MODDT->RequiredErrorMessage));
			}
		}
		if ($this->FYM->Required) {
			if (!$this->FYM->IsDetailKey && $this->FYM->FormValue != NULL && $this->FYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FYM->caption(), $this->FYM->RequiredErrorMessage));
			}
		}
		if ($this->PRCBATCH->Required) {
			if (!$this->PRCBATCH->IsDetailKey && $this->PRCBATCH->FormValue != NULL && $this->PRCBATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCBATCH->caption(), $this->PRCBATCH->RequiredErrorMessage));
			}
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if ($this->BILLYM->Required) {
			if (!$this->BILLYM->IsDetailKey && $this->BILLYM->FormValue != NULL && $this->BILLYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLYM->caption(), $this->BILLYM->RequiredErrorMessage));
			}
		}
		if ($this->BILLGRP->Required) {
			if (!$this->BILLGRP->IsDetailKey && $this->BILLGRP->FormValue != NULL && $this->BILLGRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLGRP->caption(), $this->BILLGRP->RequiredErrorMessage));
			}
		}
		if ($this->STAFF->Required) {
			if (!$this->STAFF->IsDetailKey && $this->STAFF->FormValue != NULL && $this->STAFF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAFF->caption(), $this->STAFF->RequiredErrorMessage));
			}
		}
		if ($this->TEMPIPNO->Required) {
			if (!$this->TEMPIPNO->IsDetailKey && $this->TEMPIPNO->FormValue != NULL && $this->TEMPIPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMPIPNO->caption(), $this->TEMPIPNO->RequiredErrorMessage));
			}
		}
		if ($this->PRNTED->Required) {
			if (!$this->PRNTED->IsDetailKey && $this->PRNTED->FormValue != NULL && $this->PRNTED->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRNTED->caption(), $this->PRNTED->RequiredErrorMessage));
			}
		}
		if ($this->PATNAME->Required) {
			if (!$this->PATNAME->IsDetailKey && $this->PATNAME->FormValue != NULL && $this->PATNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PATNAME->caption(), $this->PATNAME->RequiredErrorMessage));
			}
		}
		if ($this->PJVNO->Required) {
			if (!$this->PJVNO->IsDetailKey && $this->PJVNO->FormValue != NULL && $this->PJVNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVNO->caption(), $this->PJVNO->RequiredErrorMessage));
			}
		}
		if ($this->PJVSLNO->Required) {
			if (!$this->PJVSLNO->IsDetailKey && $this->PJVSLNO->FormValue != NULL && $this->PJVSLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVSLNO->caption(), $this->PJVSLNO->RequiredErrorMessage));
			}
		}
		if ($this->OTHDISC->Required) {
			if (!$this->OTHDISC->IsDetailKey && $this->OTHDISC->FormValue != NULL && $this->OTHDISC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OTHDISC->caption(), $this->OTHDISC->RequiredErrorMessage));
			}
		}
		if ($this->PJVYM->Required) {
			if (!$this->PJVYM->IsDetailKey && $this->PJVYM->FormValue != NULL && $this->PJVYM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PJVYM->caption(), $this->PJVYM->RequiredErrorMessage));
			}
		}
		if ($this->PURDISCPER->Required) {
			if (!$this->PURDISCPER->IsDetailKey && $this->PURDISCPER->FormValue != NULL && $this->PURDISCPER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURDISCPER->caption(), $this->PURDISCPER->RequiredErrorMessage));
			}
		}
		if ($this->CASHIER->Required) {
			if (!$this->CASHIER->IsDetailKey && $this->CASHIER->FormValue != NULL && $this->CASHIER->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHIER->caption(), $this->CASHIER->RequiredErrorMessage));
			}
		}
		if ($this->CASHTIME->Required) {
			if (!$this->CASHTIME->IsDetailKey && $this->CASHTIME->FormValue != NULL && $this->CASHTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHTIME->caption(), $this->CASHTIME->RequiredErrorMessage));
			}
		}
		if ($this->CASHRECD->Required) {
			if (!$this->CASHRECD->IsDetailKey && $this->CASHRECD->FormValue != NULL && $this->CASHRECD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHRECD->caption(), $this->CASHRECD->RequiredErrorMessage));
			}
		}
		if ($this->CASHREFNO->Required) {
			if (!$this->CASHREFNO->IsDetailKey && $this->CASHREFNO->FormValue != NULL && $this->CASHREFNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHREFNO->caption(), $this->CASHREFNO->RequiredErrorMessage));
			}
		}
		if ($this->CASHIERSHIFT->Required) {
			if (!$this->CASHIERSHIFT->IsDetailKey && $this->CASHIERSHIFT->FormValue != NULL && $this->CASHIERSHIFT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CASHIERSHIFT->caption(), $this->CASHIERSHIFT->RequiredErrorMessage));
			}
		}
		if ($this->PRCODE->Required) {
			if (!$this->PRCODE->IsDetailKey && $this->PRCODE->FormValue != NULL && $this->PRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
			}
		}
		if ($this->RELEASEBY->Required) {
			if (!$this->RELEASEBY->IsDetailKey && $this->RELEASEBY->FormValue != NULL && $this->RELEASEBY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RELEASEBY->caption(), $this->RELEASEBY->RequiredErrorMessage));
			}
		}
		if ($this->CRAUTHOR->Required) {
			if (!$this->CRAUTHOR->IsDetailKey && $this->CRAUTHOR->FormValue != NULL && $this->CRAUTHOR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CRAUTHOR->caption(), $this->CRAUTHOR->RequiredErrorMessage));
			}
		}
		if ($this->PAYMENT->Required) {
			if (!$this->PAYMENT->IsDetailKey && $this->PAYMENT->FormValue != NULL && $this->PAYMENT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PAYMENT->caption(), $this->PAYMENT->RequiredErrorMessage));
			}
		}
		if ($this->DRID->Required) {
			if (!$this->DRID->IsDetailKey && $this->DRID->FormValue != NULL && $this->DRID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
			}
		}
		if ($this->WARD->Required) {
			if (!$this->WARD->IsDetailKey && $this->WARD->FormValue != NULL && $this->WARD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WARD->caption(), $this->WARD->RequiredErrorMessage));
			}
		}
		if ($this->STAXTYPE->Required) {
			if (!$this->STAXTYPE->IsDetailKey && $this->STAXTYPE->FormValue != NULL && $this->STAXTYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->STAXTYPE->caption(), $this->STAXTYPE->RequiredErrorMessage));
			}
		}
		if ($this->PURDISCVAL->Required) {
			if (!$this->PURDISCVAL->IsDetailKey && $this->PURDISCVAL->FormValue != NULL && $this->PURDISCVAL->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PURDISCVAL->caption(), $this->PURDISCVAL->RequiredErrorMessage));
			}
		}
		if ($this->RNDOFF->Required) {
			if (!$this->RNDOFF->IsDetailKey && $this->RNDOFF->FormValue != NULL && $this->RNDOFF->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RNDOFF->caption(), $this->RNDOFF->RequiredErrorMessage));
			}
		}
		if ($this->DISCONMRP->Required) {
			if (!$this->DISCONMRP->IsDetailKey && $this->DISCONMRP->FormValue != NULL && $this->DISCONMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DISCONMRP->caption(), $this->DISCONMRP->RequiredErrorMessage));
			}
		}
		if ($this->DELVDT->Required) {
			if (!$this->DELVDT->IsDetailKey && $this->DELVDT->FormValue != NULL && $this->DELVDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVDT->caption(), $this->DELVDT->RequiredErrorMessage));
			}
		}
		if ($this->DELVTIME->Required) {
			if (!$this->DELVTIME->IsDetailKey && $this->DELVTIME->FormValue != NULL && $this->DELVTIME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVTIME->caption(), $this->DELVTIME->RequiredErrorMessage));
			}
		}
		if ($this->DELVBY->Required) {
			if (!$this->DELVBY->IsDetailKey && $this->DELVBY->FormValue != NULL && $this->DELVBY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DELVBY->caption(), $this->DELVBY->RequiredErrorMessage));
			}
		}
		if ($this->HOSPNO->Required) {
			if (!$this->HOSPNO->IsDetailKey && $this->HOSPNO->FormValue != NULL && $this->HOSPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HOSPNO->caption(), $this->HOSPNO->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->pbv->Required) {
			if (!$this->pbv->IsDetailKey && $this->pbv->FormValue != NULL && $this->pbv->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pbv->caption(), $this->pbv->RequiredErrorMessage));
			}
		}
		if ($this->pbt->Required) {
			if (!$this->pbt->IsDetailKey && $this->pbt->FormValue != NULL && $this->pbt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pbt->caption(), $this->pbt->RequiredErrorMessage));
			}
		}
		if ($this->HosoID->Required) {
			if (!$this->HosoID->IsDetailKey && $this->HosoID->FormValue != NULL && $this->HosoID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HosoID->caption(), $this->HosoID->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
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
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->BRNAME->Required) {
			if (!$this->BRNAME->IsDetailKey && $this->BRNAME->FormValue != NULL && $this->BRNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
			}
		}
		if ($this->sretid->Required) {
			if (!$this->sretid->IsDetailKey && $this->sretid->FormValue != NULL && $this->sretid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sretid->caption(), $this->sretid->RequiredErrorMessage));
			}
		}
		if ($this->sprid->Required) {
			if (!$this->sprid->IsDetailKey && $this->sprid->FormValue != NULL && $this->sprid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sprid->caption(), $this->sprid->RequiredErrorMessage));
			}
		}
		if ($this->baid->Required) {
			if (!$this->baid->IsDetailKey && $this->baid->FormValue != NULL && $this->baid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->baid->caption(), $this->baid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->baid->FormValue)) {
			AddMessage($FormError, $this->baid->errorMessage());
		}
		if ($this->isdate->Required) {
			if (!$this->isdate->IsDetailKey && $this->isdate->FormValue != NULL && $this->isdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isdate->caption(), $this->isdate->RequiredErrorMessage));
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
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurValue->FormValue)) {
			AddMessage($FormError, $this->PurValue->errorMessage());
		}
		if ($this->PurRate->Required) {
			if (!$this->PurRate->IsDetailKey && $this->PurRate->FormValue != NULL && $this->PurRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurRate->FormValue)) {
			AddMessage($FormError, $this->PurRate->errorMessage());
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
		if ($this->HSNCODE->Required) {
			if (!$this->HSNCODE->IsDetailKey && $this->HSNCODE->FormValue != NULL && $this->HSNCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSNCODE->caption(), $this->HSNCODE->RequiredErrorMessage));
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

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey <> "")
					$thisKey .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
				$thisKey .= $row['id'];
				if (DELETE_UPLOADED_FILES) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($deleteRows === FALSE)
					break;
				if ($key <> "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
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

			// SiNo
			$this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, NULL, $this->SiNo->ReadOnly);

			// SLNO
			$this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, NULL, $this->SLNO->ReadOnly);

			// Product
			$this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, NULL, $this->Product->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// DAMT
			$this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, NULL, $this->DAMT->ReadOnly);

			// Mfg
			$this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, NULL, $this->Mfg->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// UR
			$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, $this->UR->ReadOnly);

			// USERID
			$this->_USERID->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['USERID'] = &$this->_USERID->DbValue;

			// HosoID
			$this->HosoID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HosoID'] = &$this->HosoID->DbValue;

			// createdby
			$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['createdby'] = &$this->createdby->DbValue;

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// BRNAME
			$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

			// baid
			$this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, NULL, $this->baid->ReadOnly);

			// isdate
			$this->isdate->setDbValueDef($rsnew, CurrentDate(), NULL);
			$rsnew['isdate'] = &$this->isdate->DbValue;

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// PurValue
			$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, $this->PurValue->ReadOnly);

			// PurRate
			$this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, NULL, $this->PurRate->ReadOnly);

			// PUnit
			$this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, NULL, $this->PUnit->ReadOnly);

			// SUnit
			$this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, NULL, $this->SUnit->ReadOnly);

			// HSNCODE
			$this->HSNCODE->setDbValueDef($rsnew, $this->HSNCODE->CurrentValue, NULL, $this->HSNCODE->ReadOnly);

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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Set up foreign key field value from Session
			if ($this->getCurrentMasterTable() == "pharmacy_billing_voucher") {
				$this->pbv->CurrentValue = $this->pbv->getSessionValue();
			}
			if ($this->getCurrentMasterTable() == "pharmacy_billing_issue") {
				$this->pbt->CurrentValue = $this->pbt->getSessionValue();
			}
			if ($this->getCurrentMasterTable() == "ip_admission") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// SiNo
		$this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, NULL, FALSE);

		// SLNO
		$this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, NULL, FALSE);

		// Product
		$this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, NULL, FALSE);

		// RT
		$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, FALSE);

		// IQ
		$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, FALSE);

		// DAMT
		$this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, NULL, FALSE);

		// Mfg
		$this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, NULL, FALSE);

		// EXPDT
		$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, FALSE);

		// BATCHNO
		$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, FALSE);

		// BRCODE
		$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// UR
		$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, FALSE);

		// USERID
		$this->_USERID->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['USERID'] = &$this->_USERID->DbValue;

		// HosoID
		$this->HosoID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HosoID'] = &$this->HosoID->DbValue;

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

		// BRNAME
		$this->BRNAME->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRNAME'] = &$this->BRNAME->DbValue;

		// baid
		$this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, NULL, FALSE);

		// isdate
		$this->isdate->setDbValueDef($rsnew, CurrentDate(), NULL);
		$rsnew['isdate'] = &$this->isdate->DbValue;

		// PSGST
		$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, FALSE);

		// PCGST
		$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, FALSE);

		// SSGST
		$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, FALSE);

		// SCGST
		$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, FALSE);

		// PurValue
		$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, FALSE);

		// PurRate
		$this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, NULL, FALSE);

		// PUnit
		$this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, NULL, FALSE);

		// SUnit
		$this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, NULL, FALSE);

		// HSNCODE
		$this->HSNCODE->setDbValueDef($rsnew, $this->HSNCODE->CurrentValue, NULL, FALSE);

		// pbv
		if ($this->pbv->getSessionValue() <> "") {
			$rsnew['pbv'] = $this->pbv->getSessionValue();
		}

		// pbt
		if ($this->pbt->getSessionValue() <> "") {
			$rsnew['pbt'] = $this->pbt->getSessionValue();
		}

		// Reception
		if ($this->Reception->getSessionValue() <> "") {
			$rsnew['Reception'] = $this->Reception->getSessionValue();
		}

		// PatID
		if ($this->PatID->getSessionValue() <> "") {
			$rsnew['PatID'] = $this->PatID->getSessionValue();
		}

		// mrnno
		if ($this->mrnno->getSessionValue() <> "") {
			$rsnew['mrnno'] = $this->mrnno->getSessionValue();
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
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

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{

		// Hide foreign keys
		$masterTblVar = $this->getCurrentMasterTable();
		if ($masterTblVar == "pharmacy_billing_voucher") {
			$this->pbv->Visible = FALSE;
			if ($GLOBALS["pharmacy_billing_voucher"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		if ($masterTblVar == "pharmacy_billing_issue") {
			$this->pbt->Visible = FALSE;
			if ($GLOBALS["pharmacy_billing_issue"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		if ($masterTblVar == "ip_admission") {
			$this->mrnno->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->PatID->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->Reception->Visible = FALSE;
			if ($GLOBALS["ip_admission"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_SLNO":
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
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
						case "x_SLNO":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
							$row[4] = FormatDateTime($row[4], 0);
							$row['df4'] = $row[4];
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
	//	$this->SiNo->CurrentValue=$this->RowIndex;

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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
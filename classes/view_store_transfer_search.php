<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_store_transfer_search extends view_store_transfer
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_store_transfer';

	// Page object name
	public $PageObjName = "view_store_transfer_search";

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

		// Table object (view_store_transfer)
		if (!isset($GLOBALS["view_store_transfer"]) || get_class($GLOBALS["view_store_transfer"]) == PROJECT_NAMESPACE . "view_store_transfer") {
			$GLOBALS["view_store_transfer"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_store_transfer"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (store_billing_transfer)
		if (!isset($GLOBALS['store_billing_transfer']))
			$GLOBALS['store_billing_transfer'] = new store_billing_transfer();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_store_transfer');

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
		global $EXPORT, $view_store_transfer;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_store_transfer);
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
					if ($pageName == "view_store_transferview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

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
			if (!$Security->canSearch()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("view_store_transferlist.php"));
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
		$this->grnid->setVisibility();
		$this->BatchNo->setVisibility();
		$this->ExpDate->setVisibility();
		$this->PrName->setVisibility();
		$this->Quantity->setVisibility();
		$this->FreeQty->setVisibility();
		$this->ItemValue->setVisibility();
		$this->Disc->setVisibility();
		$this->PTax->setVisibility();
		$this->MRP->setVisibility();
		$this->SalTax->setVisibility();
		$this->PurValue->setVisibility();
		$this->PurRate->setVisibility();
		$this->SalRate->setVisibility();
		$this->Discount->setVisibility();
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
		$this->strid->setVisibility();
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
		$this->setupLookupOptions($this->ORDNO);
		$this->setupLookupOptions($this->LastMonthSale);
		$this->setupLookupOptions($this->BRCODE);

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
				if ($srchStr <> "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "view_store_transferlist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->ORDNO); // ORDNO
		$this->buildSearchUrl($srchUrl, $this->PRC); // PRC
		$this->buildSearchUrl($srchUrl, $this->QTY); // QTY
		$this->buildSearchUrl($srchUrl, $this->DT); // DT
		$this->buildSearchUrl($srchUrl, $this->PC); // PC
		$this->buildSearchUrl($srchUrl, $this->YM); // YM
		$this->buildSearchUrl($srchUrl, $this->MFRCODE); // MFRCODE
		$this->buildSearchUrl($srchUrl, $this->Stock); // Stock
		$this->buildSearchUrl($srchUrl, $this->LastMonthSale); // LastMonthSale
		$this->buildSearchUrl($srchUrl, $this->Printcheck); // Printcheck
		$this->buildSearchUrl($srchUrl, $this->id); // id
		$this->buildSearchUrl($srchUrl, $this->poid); // poid
		$this->buildSearchUrl($srchUrl, $this->grnid); // grnid
		$this->buildSearchUrl($srchUrl, $this->BatchNo); // BatchNo
		$this->buildSearchUrl($srchUrl, $this->ExpDate); // ExpDate
		$this->buildSearchUrl($srchUrl, $this->PrName); // PrName
		$this->buildSearchUrl($srchUrl, $this->Quantity); // Quantity
		$this->buildSearchUrl($srchUrl, $this->FreeQty); // FreeQty
		$this->buildSearchUrl($srchUrl, $this->ItemValue); // ItemValue
		$this->buildSearchUrl($srchUrl, $this->Disc); // Disc
		$this->buildSearchUrl($srchUrl, $this->PTax); // PTax
		$this->buildSearchUrl($srchUrl, $this->MRP); // MRP
		$this->buildSearchUrl($srchUrl, $this->SalTax); // SalTax
		$this->buildSearchUrl($srchUrl, $this->PurValue); // PurValue
		$this->buildSearchUrl($srchUrl, $this->PurRate); // PurRate
		$this->buildSearchUrl($srchUrl, $this->SalRate); // SalRate
		$this->buildSearchUrl($srchUrl, $this->Discount); // Discount
		$this->buildSearchUrl($srchUrl, $this->PSGST); // PSGST
		$this->buildSearchUrl($srchUrl, $this->PCGST); // PCGST
		$this->buildSearchUrl($srchUrl, $this->SSGST); // SSGST
		$this->buildSearchUrl($srchUrl, $this->SCGST); // SCGST
		$this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
		$this->buildSearchUrl($srchUrl, $this->HSN); // HSN
		$this->buildSearchUrl($srchUrl, $this->Pack); // Pack
		$this->buildSearchUrl($srchUrl, $this->PUnit); // PUnit
		$this->buildSearchUrl($srchUrl, $this->SUnit); // SUnit
		$this->buildSearchUrl($srchUrl, $this->GrnQuantity); // GrnQuantity
		$this->buildSearchUrl($srchUrl, $this->GrnMRP); // GrnMRP
		$this->buildSearchUrl($srchUrl, $this->strid); // strid
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->CreatedBy); // CreatedBy
		$this->buildSearchUrl($srchUrl, $this->CreatedDateTime); // CreatedDateTime
		$this->buildSearchUrl($srchUrl, $this->ModifiedBy); // ModifiedBy
		$this->buildSearchUrl($srchUrl, $this->ModifiedDateTime); // ModifiedDateTime
		$this->buildSearchUrl($srchUrl, $this->grncreatedby); // grncreatedby
		$this->buildSearchUrl($srchUrl, $this->grncreatedDateTime); // grncreatedDateTime
		$this->buildSearchUrl($srchUrl, $this->grnModifiedby); // grnModifiedby
		$this->buildSearchUrl($srchUrl, $this->grnModifiedDateTime); // grnModifiedDateTime
		$this->buildSearchUrl($srchUrl, $this->Received); // Received
		$this->buildSearchUrl($srchUrl, $this->BillDate); // BillDate
		$this->buildSearchUrl($srchUrl, $this->CurStock); // CurStock
		if ($srchUrl <> "")
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
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal <> "" && $fldVal2 <> "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal <> "" && $isValidValue && IsValidOpr($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr <> "" && $oprOnly && IsValidOpr($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 <> "" && $isValidValue && IsValidOpr($fldOpr2, $fldDataType)) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 <> "" && $oprOnly && IsValidOpr($fldOpr2, $fldDataType))) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk <> "") {
			if ($url <> "")
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
		global $CurrentForm;

		// Load search values
		// ORDNO

		if (!$this->isAddOrEdit())
			$this->ORDNO->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ORDNO"));
		$this->ORDNO->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ORDNO"));

		// PRC
		if (!$this->isAddOrEdit())
			$this->PRC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PRC"));
		$this->PRC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PRC"));

		// QTY
		if (!$this->isAddOrEdit())
			$this->QTY->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_QTY"));
		$this->QTY->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_QTY"));

		// DT
		if (!$this->isAddOrEdit())
			$this->DT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DT"));
		$this->DT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DT"));

		// PC
		if (!$this->isAddOrEdit())
			$this->PC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PC"));
		$this->PC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PC"));

		// YM
		if (!$this->isAddOrEdit())
			$this->YM->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_YM"));
		$this->YM->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_YM"));

		// MFRCODE
		if (!$this->isAddOrEdit())
			$this->MFRCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_MFRCODE"));
		$this->MFRCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_MFRCODE"));

		// Stock
		if (!$this->isAddOrEdit())
			$this->Stock->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Stock"));
		$this->Stock->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Stock"));

		// LastMonthSale
		if (!$this->isAddOrEdit())
			$this->LastMonthSale->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LastMonthSale"));
		$this->LastMonthSale->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LastMonthSale"));

		// Printcheck
		if (!$this->isAddOrEdit())
			$this->Printcheck->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Printcheck"));
		$this->Printcheck->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Printcheck"));

		// id
		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_id"));
		$this->id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_id"));

		// poid
		if (!$this->isAddOrEdit())
			$this->poid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_poid"));
		$this->poid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_poid"));

		// grnid
		if (!$this->isAddOrEdit())
			$this->grnid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_grnid"));
		$this->grnid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_grnid"));

		// BatchNo
		if (!$this->isAddOrEdit())
			$this->BatchNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BatchNo"));
		$this->BatchNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BatchNo"));

		// ExpDate
		if (!$this->isAddOrEdit())
			$this->ExpDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ExpDate"));
		$this->ExpDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ExpDate"));

		// PrName
		if (!$this->isAddOrEdit())
			$this->PrName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PrName"));
		$this->PrName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PrName"));

		// Quantity
		if (!$this->isAddOrEdit())
			$this->Quantity->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Quantity"));
		$this->Quantity->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Quantity"));

		// FreeQty
		if (!$this->isAddOrEdit())
			$this->FreeQty->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_FreeQty"));
		$this->FreeQty->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_FreeQty"));

		// ItemValue
		if (!$this->isAddOrEdit())
			$this->ItemValue->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ItemValue"));
		$this->ItemValue->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ItemValue"));

		// Disc
		if (!$this->isAddOrEdit())
			$this->Disc->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Disc"));
		$this->Disc->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Disc"));

		// PTax
		if (!$this->isAddOrEdit())
			$this->PTax->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PTax"));
		$this->PTax->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PTax"));

		// MRP
		if (!$this->isAddOrEdit())
			$this->MRP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_MRP"));
		$this->MRP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_MRP"));

		// SalTax
		if (!$this->isAddOrEdit())
			$this->SalTax->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SalTax"));
		$this->SalTax->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SalTax"));

		// PurValue
		if (!$this->isAddOrEdit())
			$this->PurValue->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PurValue"));
		$this->PurValue->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PurValue"));

		// PurRate
		if (!$this->isAddOrEdit())
			$this->PurRate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PurRate"));
		$this->PurRate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PurRate"));

		// SalRate
		if (!$this->isAddOrEdit())
			$this->SalRate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SalRate"));
		$this->SalRate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SalRate"));

		// Discount
		if (!$this->isAddOrEdit())
			$this->Discount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Discount"));
		$this->Discount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Discount"));

		// PSGST
		if (!$this->isAddOrEdit())
			$this->PSGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PSGST"));
		$this->PSGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PSGST"));

		// PCGST
		if (!$this->isAddOrEdit())
			$this->PCGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PCGST"));
		$this->PCGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PCGST"));

		// SSGST
		if (!$this->isAddOrEdit())
			$this->SSGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SSGST"));
		$this->SSGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SSGST"));

		// SCGST
		if (!$this->isAddOrEdit())
			$this->SCGST->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SCGST"));
		$this->SCGST->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SCGST"));

		// BRCODE
		if (!$this->isAddOrEdit())
			$this->BRCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BRCODE"));
		$this->BRCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BRCODE"));

		// HSN
		if (!$this->isAddOrEdit())
			$this->HSN->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HSN"));
		$this->HSN->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HSN"));

		// Pack
		if (!$this->isAddOrEdit())
			$this->Pack->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Pack"));
		$this->Pack->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Pack"));

		// PUnit
		if (!$this->isAddOrEdit())
			$this->PUnit->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PUnit"));
		$this->PUnit->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PUnit"));

		// SUnit
		if (!$this->isAddOrEdit())
			$this->SUnit->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SUnit"));
		$this->SUnit->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SUnit"));

		// GrnQuantity
		if (!$this->isAddOrEdit())
			$this->GrnQuantity->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GrnQuantity"));
		$this->GrnQuantity->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GrnQuantity"));

		// GrnMRP
		if (!$this->isAddOrEdit())
			$this->GrnMRP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GrnMRP"));
		$this->GrnMRP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GrnMRP"));

		// strid
		if (!$this->isAddOrEdit())
			$this->strid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_strid"));
		$this->strid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_strid"));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospID"));
		$this->HospID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospID"));

		// CreatedBy
		if (!$this->isAddOrEdit())
			$this->CreatedBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CreatedBy"));
		$this->CreatedBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CreatedBy"));

		// CreatedDateTime
		if (!$this->isAddOrEdit())
			$this->CreatedDateTime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CreatedDateTime"));
		$this->CreatedDateTime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CreatedDateTime"));

		// ModifiedBy
		if (!$this->isAddOrEdit())
			$this->ModifiedBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ModifiedBy"));
		$this->ModifiedBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ModifiedBy"));

		// ModifiedDateTime
		if (!$this->isAddOrEdit())
			$this->ModifiedDateTime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ModifiedDateTime"));
		$this->ModifiedDateTime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ModifiedDateTime"));

		// grncreatedby
		if (!$this->isAddOrEdit())
			$this->grncreatedby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_grncreatedby"));
		$this->grncreatedby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_grncreatedby"));

		// grncreatedDateTime
		if (!$this->isAddOrEdit())
			$this->grncreatedDateTime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_grncreatedDateTime"));
		$this->grncreatedDateTime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_grncreatedDateTime"));

		// grnModifiedby
		if (!$this->isAddOrEdit())
			$this->grnModifiedby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_grnModifiedby"));
		$this->grnModifiedby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_grnModifiedby"));

		// grnModifiedDateTime
		if (!$this->isAddOrEdit())
			$this->grnModifiedDateTime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_grnModifiedDateTime"));
		$this->grnModifiedDateTime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_grnModifiedDateTime"));

		// Received
		if (!$this->isAddOrEdit())
			$this->Received->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Received"));
		$this->Received->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Received"));

		// BillDate
		if (!$this->isAddOrEdit())
			$this->BillDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillDate"));
		$this->BillDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillDate"));

		// CurStock
		if (!$this->isAddOrEdit())
			$this->CurStock->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CurStock"));
		$this->CurStock->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CurStock"));
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue)))
			$this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PTax->FormValue == $this->PTax->CurrentValue && is_numeric(ConvertToFloatString($this->PTax->CurrentValue)))
			$this->PTax->CurrentValue = ConvertToFloatString($this->PTax->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SalTax->FormValue == $this->SalTax->CurrentValue && is_numeric(ConvertToFloatString($this->SalTax->CurrentValue)))
			$this->SalTax->CurrentValue = ConvertToFloatString($this->SalTax->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue)))
			$this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SalRate->FormValue == $this->SalRate->CurrentValue && is_numeric(ConvertToFloatString($this->SalRate->CurrentValue)))
			$this->SalRate->CurrentValue = ConvertToFloatString($this->SalRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue)))
			$this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);

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
		// strid
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
			$curVal = strval($this->ORDNO->CurrentValue);
			if ($curVal <> "") {
				$this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
				if ($this->ORDNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ORDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
					}
				}
			} else {
				$this->ORDNO->ViewValue = NULL;
			}
			$this->ORDNO->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// QTY
			$this->QTY->ViewValue = $this->QTY->CurrentValue;
			$this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
			$this->QTY->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Stock
			$this->Stock->ViewValue = $this->Stock->CurrentValue;
			$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// LastMonthSale
			$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
			$curVal = strval($this->LastMonthSale->CurrentValue);
			if ($curVal <> "") {
				$this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
				if ($this->LastMonthSale->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->LastMonthSale->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
						$arwrk[3] = FormatNumber($rswrk->fields('df3'), 2, -2, -2, -2);
						$this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
					}
				}
			} else {
				$this->LastMonthSale->ViewValue = NULL;
			}
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

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
					}
				}
			} else {
				$this->BRCODE->ViewValue = NULL;
			}
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

			// strid
			$this->strid->ViewValue = $this->strid->CurrentValue;
			$this->strid->ViewValue = FormatNumber($this->strid->ViewValue, 0, -2, -2, -2);
			$this->strid->ViewCustomAttributes = "";

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
			$this->Received->ViewValue = $this->Received->CurrentValue;
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

			// grnid
			$this->grnid->LinkCustomAttributes = "";
			$this->grnid->HrefValue = "";
			$this->grnid->TooltipValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";
			$this->BatchNo->TooltipValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";
			$this->ExpDate->TooltipValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";

			// FreeQty
			$this->FreeQty->LinkCustomAttributes = "";
			$this->FreeQty->HrefValue = "";
			$this->FreeQty->TooltipValue = "";

			// ItemValue
			$this->ItemValue->LinkCustomAttributes = "";
			$this->ItemValue->HrefValue = "";
			$this->ItemValue->TooltipValue = "";

			// Disc
			$this->Disc->LinkCustomAttributes = "";
			$this->Disc->HrefValue = "";
			$this->Disc->TooltipValue = "";

			// PTax
			$this->PTax->LinkCustomAttributes = "";
			$this->PTax->HrefValue = "";
			$this->PTax->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// SalTax
			$this->SalTax->LinkCustomAttributes = "";
			$this->SalTax->HrefValue = "";
			$this->SalTax->TooltipValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";
			$this->PurRate->TooltipValue = "";

			// SalRate
			$this->SalRate->LinkCustomAttributes = "";
			$this->SalRate->HrefValue = "";
			$this->SalRate->TooltipValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";
			$this->Discount->TooltipValue = "";

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

			// strid
			$this->strid->LinkCustomAttributes = "";
			$this->strid->HrefValue = "";
			$this->strid->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// ORDNO
			$this->ORDNO->EditAttrs["class"] = "form-control";
			$this->ORDNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ORDNO->AdvancedSearch->SearchValue = HtmlDecode($this->ORDNO->AdvancedSearch->SearchValue);
			$this->ORDNO->EditValue = HtmlEncode($this->ORDNO->AdvancedSearch->SearchValue);
			$curVal = strval($this->ORDNO->AdvancedSearch->SearchValue);
			if ($curVal <> "") {
				$this->ORDNO->EditValue = $this->ORDNO->lookupCacheOption($curVal);
				if ($this->ORDNO->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ORDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->ORDNO->EditValue = $this->ORDNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ORDNO->EditValue = HtmlEncode($this->ORDNO->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->ORDNO->EditValue = NULL;
			}
			$this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// QTY
			$this->QTY->EditAttrs["class"] = "form-control";
			$this->QTY->EditCustomAttributes = "";
			$this->QTY->EditValue = HtmlEncode($this->QTY->AdvancedSearch->SearchValue);
			$this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			$this->DT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DT->AdvancedSearch->SearchValue, 0), 8));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PC->AdvancedSearch->SearchValue = HtmlDecode($this->PC->AdvancedSearch->SearchValue);
			$this->PC->EditValue = HtmlEncode($this->PC->AdvancedSearch->SearchValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// YM
			$this->YM->EditAttrs["class"] = "form-control";
			$this->YM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->YM->AdvancedSearch->SearchValue = HtmlDecode($this->YM->AdvancedSearch->SearchValue);
			$this->YM->EditValue = HtmlEncode($this->YM->AdvancedSearch->SearchValue);
			$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->AdvancedSearch->SearchValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->AdvancedSearch->SearchValue);
			$curVal = strval($this->LastMonthSale->AdvancedSearch->SearchValue);
			if ($curVal <> "") {
				$this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
				if ($this->LastMonthSale->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->LastMonthSale->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
						$arwrk[3] = HtmlEncode(FormatNumber($rswrk->fields('df3'), 2, -2, -2, -2));
						$this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->LastMonthSale->EditValue = NULL;
			}
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// Printcheck
			$this->Printcheck->EditAttrs["class"] = "form-control";
			$this->Printcheck->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Printcheck->AdvancedSearch->SearchValue = HtmlDecode($this->Printcheck->AdvancedSearch->SearchValue);
			$this->Printcheck->EditValue = HtmlEncode($this->Printcheck->AdvancedSearch->SearchValue);
			$this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// poid
			$this->poid->EditAttrs["class"] = "form-control";
			$this->poid->EditCustomAttributes = "";
			$this->poid->EditValue = HtmlEncode($this->poid->AdvancedSearch->SearchValue);
			$this->poid->PlaceHolder = RemoveHtml($this->poid->caption());

			// grnid
			$this->grnid->EditAttrs["class"] = "form-control";
			$this->grnid->EditCustomAttributes = "";
			$this->grnid->EditValue = HtmlEncode($this->grnid->AdvancedSearch->SearchValue);
			$this->grnid->PlaceHolder = RemoveHtml($this->grnid->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BatchNo->AdvancedSearch->SearchValue = HtmlDecode($this->BatchNo->AdvancedSearch->SearchValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->AdvancedSearch->SearchValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

			// ExpDate
			$this->ExpDate->EditAttrs["class"] = "form-control";
			$this->ExpDate->EditCustomAttributes = "";
			$this->ExpDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ExpDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->AdvancedSearch->SearchValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// FreeQty
			$this->FreeQty->EditAttrs["class"] = "form-control";
			$this->FreeQty->EditCustomAttributes = "";
			$this->FreeQty->EditValue = HtmlEncode($this->FreeQty->AdvancedSearch->SearchValue);
			$this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

			// ItemValue
			$this->ItemValue->EditAttrs["class"] = "form-control";
			$this->ItemValue->EditCustomAttributes = "";
			$this->ItemValue->EditValue = HtmlEncode($this->ItemValue->AdvancedSearch->SearchValue);
			$this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());

			// Disc
			$this->Disc->EditAttrs["class"] = "form-control";
			$this->Disc->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Disc->AdvancedSearch->SearchValue = HtmlDecode($this->Disc->AdvancedSearch->SearchValue);
			$this->Disc->EditValue = HtmlEncode($this->Disc->AdvancedSearch->SearchValue);
			$this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());

			// PTax
			$this->PTax->EditAttrs["class"] = "form-control";
			$this->PTax->EditCustomAttributes = "";
			$this->PTax->EditValue = HtmlEncode($this->PTax->AdvancedSearch->SearchValue);
			$this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

			// SalTax
			$this->SalTax->EditAttrs["class"] = "form-control";
			$this->SalTax->EditCustomAttributes = "";
			$this->SalTax->EditValue = HtmlEncode($this->SalTax->AdvancedSearch->SearchValue);
			$this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

			// PurRate
			$this->PurRate->EditAttrs["class"] = "form-control";
			$this->PurRate->EditCustomAttributes = "";
			$this->PurRate->EditValue = HtmlEncode($this->PurRate->AdvancedSearch->SearchValue);
			$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());

			// SalRate
			$this->SalRate->EditAttrs["class"] = "form-control";
			$this->SalRate->EditCustomAttributes = "";
			$this->SalRate->EditValue = HtmlEncode($this->SalRate->AdvancedSearch->SearchValue);
			$this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->AdvancedSearch->SearchValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->AdvancedSearch->SearchValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->AdvancedSearch->SearchValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->AdvancedSearch->SearchValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->AdvancedSearch->SearchValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
			$curVal = strval($this->BRCODE->AdvancedSearch->SearchValue);
			if ($curVal <> "") {
				$this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->BRCODE->EditValue = NULL;
			}
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// HSN
			$this->HSN->EditAttrs["class"] = "form-control";
			$this->HSN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSN->AdvancedSearch->SearchValue = HtmlDecode($this->HSN->AdvancedSearch->SearchValue);
			$this->HSN->EditValue = HtmlEncode($this->HSN->AdvancedSearch->SearchValue);
			$this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

			// Pack
			$this->Pack->EditAttrs["class"] = "form-control";
			$this->Pack->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pack->AdvancedSearch->SearchValue = HtmlDecode($this->Pack->AdvancedSearch->SearchValue);
			$this->Pack->EditValue = HtmlEncode($this->Pack->AdvancedSearch->SearchValue);
			$this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

			// PUnit
			$this->PUnit->EditAttrs["class"] = "form-control";
			$this->PUnit->EditCustomAttributes = "";
			$this->PUnit->EditValue = HtmlEncode($this->PUnit->AdvancedSearch->SearchValue);
			$this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

			// SUnit
			$this->SUnit->EditAttrs["class"] = "form-control";
			$this->SUnit->EditCustomAttributes = "";
			$this->SUnit->EditValue = HtmlEncode($this->SUnit->AdvancedSearch->SearchValue);
			$this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

			// GrnQuantity
			$this->GrnQuantity->EditAttrs["class"] = "form-control";
			$this->GrnQuantity->EditCustomAttributes = "";
			$this->GrnQuantity->EditValue = HtmlEncode($this->GrnQuantity->AdvancedSearch->SearchValue);
			$this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

			// GrnMRP
			$this->GrnMRP->EditAttrs["class"] = "form-control";
			$this->GrnMRP->EditCustomAttributes = "";
			$this->GrnMRP->EditValue = HtmlEncode($this->GrnMRP->AdvancedSearch->SearchValue);
			$this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());

			// strid
			$this->strid->EditAttrs["class"] = "form-control";
			$this->strid->EditCustomAttributes = "";
			$this->strid->EditValue = HtmlEncode($this->strid->AdvancedSearch->SearchValue);
			$this->strid->PlaceHolder = RemoveHtml($this->strid->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->AdvancedSearch->SearchValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// CreatedDateTime
			$this->CreatedDateTime->EditAttrs["class"] = "form-control";
			$this->CreatedDateTime->EditCustomAttributes = "";
			$this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDateTime->AdvancedSearch->SearchValue, 0), 8));
			$this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->AdvancedSearch->SearchValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// ModifiedDateTime
			$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->ModifiedDateTime->EditCustomAttributes = "";
			$this->ModifiedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ModifiedDateTime->AdvancedSearch->SearchValue, 0), 8));
			$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

			// grncreatedby
			$this->grncreatedby->EditAttrs["class"] = "form-control";
			$this->grncreatedby->EditCustomAttributes = "";
			$this->grncreatedby->EditValue = HtmlEncode($this->grncreatedby->AdvancedSearch->SearchValue);
			$this->grncreatedby->PlaceHolder = RemoveHtml($this->grncreatedby->caption());

			// grncreatedDateTime
			$this->grncreatedDateTime->EditAttrs["class"] = "form-control";
			$this->grncreatedDateTime->EditCustomAttributes = "";
			$this->grncreatedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->grncreatedDateTime->AdvancedSearch->SearchValue, 0), 8));
			$this->grncreatedDateTime->PlaceHolder = RemoveHtml($this->grncreatedDateTime->caption());

			// grnModifiedby
			$this->grnModifiedby->EditAttrs["class"] = "form-control";
			$this->grnModifiedby->EditCustomAttributes = "";
			$this->grnModifiedby->EditValue = HtmlEncode($this->grnModifiedby->AdvancedSearch->SearchValue);
			$this->grnModifiedby->PlaceHolder = RemoveHtml($this->grnModifiedby->caption());

			// grnModifiedDateTime
			$this->grnModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->grnModifiedDateTime->EditCustomAttributes = "";
			$this->grnModifiedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->grnModifiedDateTime->AdvancedSearch->SearchValue, 0), 8));
			$this->grnModifiedDateTime->PlaceHolder = RemoveHtml($this->grnModifiedDateTime->caption());

			// Received
			$this->Received->EditAttrs["class"] = "form-control";
			$this->Received->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Received->AdvancedSearch->SearchValue = HtmlDecode($this->Received->AdvancedSearch->SearchValue);
			$this->Received->EditValue = HtmlEncode($this->Received->AdvancedSearch->SearchValue);
			$this->Received->PlaceHolder = RemoveHtml($this->Received->caption());

			// BillDate
			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue, 0), 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// CurStock
			$this->CurStock->EditAttrs["class"] = "form-control";
			$this->CurStock->EditCustomAttributes = "";
			$this->CurStock->EditValue = HtmlEncode($this->CurStock->AdvancedSearch->SearchValue);
			$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;
		if (!CheckInteger($this->QTY->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->QTY->errorMessage());
		}
		if (!CheckDate($this->DT->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DT->errorMessage());
		}
		if (!CheckInteger($this->Stock->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Stock->errorMessage());
		}
		if (!CheckInteger($this->LastMonthSale->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->LastMonthSale->errorMessage());
		}
		if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->id->errorMessage());
		}
		if (!CheckInteger($this->poid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->poid->errorMessage());
		}
		if (!CheckInteger($this->grnid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->grnid->errorMessage());
		}
		if (!CheckDate($this->ExpDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ExpDate->errorMessage());
		}
		if (!CheckInteger($this->Quantity->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Quantity->errorMessage());
		}
		if (!CheckInteger($this->FreeQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->FreeQty->errorMessage());
		}
		if (!CheckNumber($this->ItemValue->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ItemValue->errorMessage());
		}
		if (!CheckNumber($this->Disc->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Disc->errorMessage());
		}
		if (!CheckNumber($this->PTax->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PTax->errorMessage());
		}
		if (!CheckNumber($this->MRP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->MRP->errorMessage());
		}
		if (!CheckNumber($this->SalTax->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SalTax->errorMessage());
		}
		if (!CheckNumber($this->PurValue->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PurValue->errorMessage());
		}
		if (!CheckNumber($this->PurRate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PurRate->errorMessage());
		}
		if (!CheckNumber($this->SalRate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SalRate->errorMessage());
		}
		if (!CheckNumber($this->Discount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Discount->errorMessage());
		}
		if (!CheckNumber($this->PSGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PSGST->errorMessage());
		}
		if (!CheckNumber($this->PCGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PCGST->errorMessage());
		}
		if (!CheckNumber($this->SSGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SSGST->errorMessage());
		}
		if (!CheckNumber($this->SCGST->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SCGST->errorMessage());
		}
		if (!CheckInteger($this->BRCODE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BRCODE->errorMessage());
		}
		if (!CheckInteger($this->PUnit->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PUnit->errorMessage());
		}
		if (!CheckInteger($this->SUnit->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SUnit->errorMessage());
		}
		if (!CheckInteger($this->GrnQuantity->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->GrnQuantity->errorMessage());
		}
		if (!CheckNumber($this->GrnMRP->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->GrnMRP->errorMessage());
		}
		if (!CheckInteger($this->strid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->strid->errorMessage());
		}
		if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->HospID->errorMessage());
		}
		if (!CheckInteger($this->CreatedBy->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CreatedBy->errorMessage());
		}
		if (!CheckDate($this->CreatedDateTime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CreatedDateTime->errorMessage());
		}
		if (!CheckInteger($this->ModifiedBy->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ModifiedBy->errorMessage());
		}
		if (!CheckDate($this->ModifiedDateTime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ModifiedDateTime->errorMessage());
		}
		if (!CheckInteger($this->grncreatedby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->grncreatedby->errorMessage());
		}
		if (!CheckDate($this->grncreatedDateTime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->grncreatedDateTime->errorMessage());
		}
		if (!CheckInteger($this->grnModifiedby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->grnModifiedby->errorMessage());
		}
		if (!CheckDate($this->grnModifiedDateTime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->grnModifiedDateTime->errorMessage());
		}
		if (!CheckDate($this->BillDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BillDate->errorMessage());
		}
		if (!CheckInteger($this->CurStock->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CurStock->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->ORDNO->AdvancedSearch->load();
		$this->PRC->AdvancedSearch->load();
		$this->QTY->AdvancedSearch->load();
		$this->DT->AdvancedSearch->load();
		$this->PC->AdvancedSearch->load();
		$this->YM->AdvancedSearch->load();
		$this->MFRCODE->AdvancedSearch->load();
		$this->Stock->AdvancedSearch->load();
		$this->LastMonthSale->AdvancedSearch->load();
		$this->Printcheck->AdvancedSearch->load();
		$this->id->AdvancedSearch->load();
		$this->poid->AdvancedSearch->load();
		$this->grnid->AdvancedSearch->load();
		$this->BatchNo->AdvancedSearch->load();
		$this->ExpDate->AdvancedSearch->load();
		$this->PrName->AdvancedSearch->load();
		$this->Quantity->AdvancedSearch->load();
		$this->FreeQty->AdvancedSearch->load();
		$this->ItemValue->AdvancedSearch->load();
		$this->Disc->AdvancedSearch->load();
		$this->PTax->AdvancedSearch->load();
		$this->MRP->AdvancedSearch->load();
		$this->SalTax->AdvancedSearch->load();
		$this->PurValue->AdvancedSearch->load();
		$this->PurRate->AdvancedSearch->load();
		$this->SalRate->AdvancedSearch->load();
		$this->Discount->AdvancedSearch->load();
		$this->PSGST->AdvancedSearch->load();
		$this->PCGST->AdvancedSearch->load();
		$this->SSGST->AdvancedSearch->load();
		$this->SCGST->AdvancedSearch->load();
		$this->BRCODE->AdvancedSearch->load();
		$this->HSN->AdvancedSearch->load();
		$this->Pack->AdvancedSearch->load();
		$this->PUnit->AdvancedSearch->load();
		$this->SUnit->AdvancedSearch->load();
		$this->GrnQuantity->AdvancedSearch->load();
		$this->GrnMRP->AdvancedSearch->load();
		$this->strid->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->CreatedBy->AdvancedSearch->load();
		$this->CreatedDateTime->AdvancedSearch->load();
		$this->ModifiedBy->AdvancedSearch->load();
		$this->ModifiedDateTime->AdvancedSearch->load();
		$this->grncreatedby->AdvancedSearch->load();
		$this->grncreatedDateTime->AdvancedSearch->load();
		$this->grnModifiedby->AdvancedSearch->load();
		$this->grnModifiedDateTime->AdvancedSearch->load();
		$this->Received->AdvancedSearch->load();
		$this->BillDate->AdvancedSearch->load();
		$this->CurStock->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_store_transferlist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_LastMonthSale":
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
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
						case "x_ORDNO":
							break;
						case "x_LastMonthSale":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
							$row[3] = FormatNumber($row[3], 2, -2, -2, -2);
							$row['df3'] = $row[3];
							break;
						case "x_BRCODE":
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
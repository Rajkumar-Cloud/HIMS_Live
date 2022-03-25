<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class store_storeled_view extends store_storeled
{

	// Page ID
	public $PageID = "view";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'store_storeled';

	// Page object name
	public $PageObjName = "store_storeled_view";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;
	public $CancelUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

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

		// Table object (store_storeled)
		if (!isset($GLOBALS["store_storeled"]) || get_class($GLOBALS["store_storeled"]) == PROJECT_NAMESPACE . "store_storeled") {
			$GLOBALS["store_storeled"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["store_storeled"];
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
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'view');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_storeled');

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

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["action"] = new ListOptions();
		$this->OtherOptions["action"]->Tag = "div";
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";
		$this->OtherOptions["detail"] = new ListOptions();
		$this->OtherOptions["detail"]->Tag = "div";
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
		global $EXPORT, $store_storeled;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($store_storeled);
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
					if ($pageName == "store_storeledview.php")
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
	public $ExportOptions; // Export options
	public $OtherOptions; // Other options
	public $DisplayRecs = 1;
	public $DbMasterFilter;
	public $DbDetailFilter;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $RecCnt;
	public $RecKey = array();
	public $IsModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$SkipHeaderFooter, $EXPORT;

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
			if (!$Security->canView()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("store_storeledlist.php"));
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
			if ($ExportFileName <> "")
				$ExportFileName .= "_";
			$ExportFileName .= Get("id");
		}

		// Get custom export parameters
		if ($this->isExport() && $custom <> "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (defined(PROJECT_NAMESPACE . "USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (defined(PROJECT_NAMESPACE . "USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Setup export options
		$this->setupExportOptions();
		$this->BRCODE->setVisibility();
		$this->TYPE->setVisibility();
		$this->DN->setVisibility();
		$this->RDN->setVisibility();
		$this->DT->setVisibility();
		$this->PRC->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->EXPDT->setVisibility();
		$this->BILLNO->setVisibility();
		$this->BILLDT->setVisibility();
		$this->RT->setVisibility();
		$this->VALUE->setVisibility();
		$this->DISC->setVisibility();
		$this->TAXP->setVisibility();
		$this->TAX->setVisibility();
		$this->TAXR->setVisibility();
		$this->DAMT->setVisibility();
		$this->EMPNO->setVisibility();
		$this->PC->setVisibility();
		$this->DRNAME->setVisibility();
		$this->BTIME->setVisibility();
		$this->ONO->setVisibility();
		$this->ODT->setVisibility();
		$this->PURRT->setVisibility();
		$this->GRP->setVisibility();
		$this->IBATCH->setVisibility();
		$this->IPNO->setVisibility();
		$this->OPNO->setVisibility();
		$this->RECID->setVisibility();
		$this->FQTY->setVisibility();
		$this->UR->setVisibility();
		$this->DCID->setVisibility();
		$this->_USERID->setVisibility();
		$this->MODDT->setVisibility();
		$this->FYM->setVisibility();
		$this->PRCBATCH->setVisibility();
		$this->SLNO->setVisibility();
		$this->MRP->setVisibility();
		$this->BILLYM->setVisibility();
		$this->BILLGRP->setVisibility();
		$this->STAFF->setVisibility();
		$this->TEMPIPNO->setVisibility();
		$this->PRNTED->setVisibility();
		$this->PATNAME->setVisibility();
		$this->PJVNO->setVisibility();
		$this->PJVSLNO->setVisibility();
		$this->OTHDISC->setVisibility();
		$this->PJVYM->setVisibility();
		$this->PURDISCPER->setVisibility();
		$this->CASHIER->setVisibility();
		$this->CASHTIME->setVisibility();
		$this->CASHRECD->setVisibility();
		$this->CASHREFNO->setVisibility();
		$this->CASHIERSHIFT->setVisibility();
		$this->PRCODE->setVisibility();
		$this->RELEASEBY->setVisibility();
		$this->CRAUTHOR->setVisibility();
		$this->PAYMENT->setVisibility();
		$this->DRID->setVisibility();
		$this->WARD->setVisibility();
		$this->STAXTYPE->setVisibility();
		$this->PURDISCVAL->setVisibility();
		$this->RNDOFF->setVisibility();
		$this->DISCONMRP->setVisibility();
		$this->DELVDT->setVisibility();
		$this->DELVTIME->setVisibility();
		$this->DELVBY->setVisibility();
		$this->HOSPNO->setVisibility();
		$this->id->setVisibility();
		$this->pbv->setVisibility();
		$this->pbt->setVisibility();
		$this->SiNo->setVisibility();
		$this->Product->setVisibility();
		$this->Mfg->setVisibility();
		$this->HosoID->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->Reception->setVisibility();
		$this->PatID->setVisibility();
		$this->mrnno->setVisibility();
		$this->BRNAME->setVisibility();
		$this->StoreID->setVisibility();
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
			} elseif (IsApi() && Key(0) != NULL) {
				$this->id->setQueryStringValue(Key(0));
				$this->RecKey["id"] = $this->id->QueryStringValue;
			} elseif (Post("id") !== NULL) {
				$this->id->setFormValue(Post("id"));
				$this->RecKey["id"] = $this->id->FormValue;
			} elseif (IsApi() && Route(2) != NULL) {
				$this->id->setFormValue(Route(2));
				$this->RecKey["id"] = $this->id->FormValue;
			} else {
				$returnUrl = "store_storeledlist.php"; // Return to list
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
						$conn = &$this->getConnection();
						$this->Recordset = LoadRecordset($sql, $conn);
						$res = $this->Recordset && !$this->Recordset->EOF;
					} else {
						$res = $this->loadRow();
					}
					if (!$res) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
						$returnUrl = "store_storeledlist.php"; // No matching record, return to list
					}
			}

			// Export data only
			if (!$this->CustomExport && in_array($this->Export, array_keys($EXPORT))) {
				$this->exportData();
				$this->terminate();
			}
		} else {
			$returnUrl = "store_storeledlist.php"; // Not page request, return to list
		}
		if ($returnUrl <> "") {
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
		$option = &$options["action"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"javascript:void(0);\" onclick=\"ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());

		// Edit
		$item = &$option->add("edit");
		$editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"javascript:void(0);\" onclick=\"ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
		$item->Visible = ($this->EditUrl <> "" && $Security->canEdit());

		// Copy
		$item = &$option->add("copy");
		$copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
		if ($this->IsModal) // Modal
			$item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"javascript:void(0);\" onclick=\"ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->CopyUrl) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
		$item->Visible = ($this->CopyUrl <> "" && $Security->canAdd());

		// Delete
		$item = &$option->add("delete");
		if ($this->IsModal) // Handle as inline delete
			$item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery($this->DeleteUrl, "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl <> "" && $Security->canDelete());

		// Set up action default
		$option = &$options["action"];
		$option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
		$option->UseDropDownButton = FALSE;
		$option->UseButtonGroup = TRUE;
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
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
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->TYPE->setDbValue($row['TYPE']);
		$this->DN->setDbValue($row['DN']);
		$this->RDN->setDbValue($row['RDN']);
		$this->DT->setDbValue($row['DT']);
		$this->PRC->setDbValue($row['PRC']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->RT->setDbValue($row['RT']);
		$this->VALUE->setDbValue($row['VALUE']);
		$this->DISC->setDbValue($row['DISC']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->TAX->setDbValue($row['TAX']);
		$this->TAXR->setDbValue($row['TAXR']);
		$this->DAMT->setDbValue($row['DAMT']);
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
		$this->SLNO->setDbValue($row['SLNO']);
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
		$this->SiNo->setDbValue($row['SiNo']);
		$this->Product->setDbValue($row['Product']);
		$this->Mfg->setDbValue($row['Mfg']);
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
		$this->StoreID->setDbValue($row['StoreID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['BRCODE'] = NULL;
		$row['TYPE'] = NULL;
		$row['DN'] = NULL;
		$row['RDN'] = NULL;
		$row['DT'] = NULL;
		$row['PRC'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['IQ'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['EXPDT'] = NULL;
		$row['BILLNO'] = NULL;
		$row['BILLDT'] = NULL;
		$row['RT'] = NULL;
		$row['VALUE'] = NULL;
		$row['DISC'] = NULL;
		$row['TAXP'] = NULL;
		$row['TAX'] = NULL;
		$row['TAXR'] = NULL;
		$row['DAMT'] = NULL;
		$row['EMPNO'] = NULL;
		$row['PC'] = NULL;
		$row['DRNAME'] = NULL;
		$row['BTIME'] = NULL;
		$row['ONO'] = NULL;
		$row['ODT'] = NULL;
		$row['PURRT'] = NULL;
		$row['GRP'] = NULL;
		$row['IBATCH'] = NULL;
		$row['IPNO'] = NULL;
		$row['OPNO'] = NULL;
		$row['RECID'] = NULL;
		$row['FQTY'] = NULL;
		$row['UR'] = NULL;
		$row['DCID'] = NULL;
		$row['USERID'] = NULL;
		$row['MODDT'] = NULL;
		$row['FYM'] = NULL;
		$row['PRCBATCH'] = NULL;
		$row['SLNO'] = NULL;
		$row['MRP'] = NULL;
		$row['BILLYM'] = NULL;
		$row['BILLGRP'] = NULL;
		$row['STAFF'] = NULL;
		$row['TEMPIPNO'] = NULL;
		$row['PRNTED'] = NULL;
		$row['PATNAME'] = NULL;
		$row['PJVNO'] = NULL;
		$row['PJVSLNO'] = NULL;
		$row['OTHDISC'] = NULL;
		$row['PJVYM'] = NULL;
		$row['PURDISCPER'] = NULL;
		$row['CASHIER'] = NULL;
		$row['CASHTIME'] = NULL;
		$row['CASHRECD'] = NULL;
		$row['CASHREFNO'] = NULL;
		$row['CASHIERSHIFT'] = NULL;
		$row['PRCODE'] = NULL;
		$row['RELEASEBY'] = NULL;
		$row['CRAUTHOR'] = NULL;
		$row['PAYMENT'] = NULL;
		$row['DRID'] = NULL;
		$row['WARD'] = NULL;
		$row['STAXTYPE'] = NULL;
		$row['PURDISCVAL'] = NULL;
		$row['RNDOFF'] = NULL;
		$row['DISCONMRP'] = NULL;
		$row['DELVDT'] = NULL;
		$row['DELVTIME'] = NULL;
		$row['DELVBY'] = NULL;
		$row['HOSPNO'] = NULL;
		$row['id'] = NULL;
		$row['pbv'] = NULL;
		$row['pbt'] = NULL;
		$row['SiNo'] = NULL;
		$row['Product'] = NULL;
		$row['Mfg'] = NULL;
		$row['HosoID'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['Reception'] = NULL;
		$row['PatID'] = NULL;
		$row['mrnno'] = NULL;
		$row['BRNAME'] = NULL;
		$row['StoreID'] = NULL;
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
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->VALUE->FormValue == $this->VALUE->CurrentValue && is_numeric(ConvertToFloatString($this->VALUE->CurrentValue)))
			$this->VALUE->CurrentValue = ConvertToFloatString($this->VALUE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DISC->FormValue == $this->DISC->CurrentValue && is_numeric(ConvertToFloatString($this->DISC->CurrentValue)))
			$this->DISC->CurrentValue = ConvertToFloatString($this->DISC->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue)))
			$this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAX->FormValue == $this->TAX->CurrentValue && is_numeric(ConvertToFloatString($this->TAX->CurrentValue)))
			$this->TAX->CurrentValue = ConvertToFloatString($this->TAX->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXR->FormValue == $this->TAXR->CurrentValue && is_numeric(ConvertToFloatString($this->TAXR->CurrentValue)))
			$this->TAXR->CurrentValue = ConvertToFloatString($this->TAXR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue)))
			$this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PURRT->FormValue == $this->PURRT->CurrentValue && is_numeric(ConvertToFloatString($this->PURRT->CurrentValue)))
			$this->PURRT->CurrentValue = ConvertToFloatString($this->PURRT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->FQTY->FormValue == $this->FQTY->CurrentValue && is_numeric(ConvertToFloatString($this->FQTY->CurrentValue)))
			$this->FQTY->CurrentValue = ConvertToFloatString($this->FQTY->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OTHDISC->FormValue == $this->OTHDISC->CurrentValue && is_numeric(ConvertToFloatString($this->OTHDISC->CurrentValue)))
			$this->OTHDISC->CurrentValue = ConvertToFloatString($this->OTHDISC->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PURDISCPER->FormValue == $this->PURDISCPER->CurrentValue && is_numeric(ConvertToFloatString($this->PURDISCPER->CurrentValue)))
			$this->PURDISCPER->CurrentValue = ConvertToFloatString($this->PURDISCPER->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CASHRECD->FormValue == $this->CASHRECD->CurrentValue && is_numeric(ConvertToFloatString($this->CASHRECD->CurrentValue)))
			$this->CASHRECD->CurrentValue = ConvertToFloatString($this->CASHRECD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PURDISCVAL->FormValue == $this->PURDISCVAL->CurrentValue && is_numeric(ConvertToFloatString($this->PURDISCVAL->CurrentValue)))
			$this->PURDISCVAL->CurrentValue = ConvertToFloatString($this->PURDISCVAL->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RNDOFF->FormValue == $this->RNDOFF->CurrentValue && is_numeric(ConvertToFloatString($this->RNDOFF->CurrentValue)))
			$this->RNDOFF->CurrentValue = ConvertToFloatString($this->RNDOFF->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DISCONMRP->FormValue == $this->DISCONMRP->CurrentValue && is_numeric(ConvertToFloatString($this->DISCONMRP->CurrentValue)))
			$this->DISCONMRP->CurrentValue = ConvertToFloatString($this->DISCONMRP->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// BRCODE
		// TYPE
		// DN
		// RDN
		// DT
		// PRC
		// OQ
		// RQ
		// MRQ
		// IQ
		// BATCHNO
		// EXPDT
		// BILLNO
		// BILLDT
		// RT
		// VALUE
		// DISC
		// TAXP
		// TAX
		// TAXR
		// DAMT
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
		// SLNO
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
		// SiNo
		// Product
		// Mfg
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
		// StoreID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
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

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
			$this->BILLDT->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

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

			// DAMT
			$this->DAMT->ViewValue = $this->DAMT->CurrentValue;
			$this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
			$this->DAMT->ViewCustomAttributes = "";

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

			// SLNO
			$this->SLNO->ViewValue = $this->SLNO->CurrentValue;
			$this->SLNO->ViewValue = FormatNumber($this->SLNO->ViewValue, 0, -2, -2, -2);
			$this->SLNO->ViewCustomAttributes = "";

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

			// SiNo
			$this->SiNo->ViewValue = $this->SiNo->CurrentValue;
			$this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
			$this->SiNo->ViewCustomAttributes = "";

			// Product
			$this->Product->ViewValue = $this->Product->CurrentValue;
			$this->Product->ViewCustomAttributes = "";

			// Mfg
			$this->Mfg->ViewValue = $this->Mfg->CurrentValue;
			$this->Mfg->ViewCustomAttributes = "";

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

			// StoreID
			$this->StoreID->ViewValue = $this->StoreID->CurrentValue;
			$this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
			$this->StoreID->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// TYPE
			$this->TYPE->LinkCustomAttributes = "";
			$this->TYPE->HrefValue = "";
			$this->TYPE->TooltipValue = "";

			// DN
			$this->DN->LinkCustomAttributes = "";
			$this->DN->HrefValue = "";
			$this->DN->TooltipValue = "";

			// RDN
			$this->RDN->LinkCustomAttributes = "";
			$this->RDN->HrefValue = "";
			$this->RDN->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

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

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";
			$this->BILLNO->TooltipValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";
			$this->BILLDT->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// VALUE
			$this->VALUE->LinkCustomAttributes = "";
			$this->VALUE->HrefValue = "";
			$this->VALUE->TooltipValue = "";

			// DISC
			$this->DISC->LinkCustomAttributes = "";
			$this->DISC->HrefValue = "";
			$this->DISC->TooltipValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";
			$this->TAXP->TooltipValue = "";

			// TAX
			$this->TAX->LinkCustomAttributes = "";
			$this->TAX->HrefValue = "";
			$this->TAX->TooltipValue = "";

			// TAXR
			$this->TAXR->LinkCustomAttributes = "";
			$this->TAXR->HrefValue = "";
			$this->TAXR->TooltipValue = "";

			// DAMT
			$this->DAMT->LinkCustomAttributes = "";
			$this->DAMT->HrefValue = "";
			$this->DAMT->TooltipValue = "";

			// EMPNO
			$this->EMPNO->LinkCustomAttributes = "";
			$this->EMPNO->HrefValue = "";
			$this->EMPNO->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// DRNAME
			$this->DRNAME->LinkCustomAttributes = "";
			$this->DRNAME->HrefValue = "";
			$this->DRNAME->TooltipValue = "";

			// BTIME
			$this->BTIME->LinkCustomAttributes = "";
			$this->BTIME->HrefValue = "";
			$this->BTIME->TooltipValue = "";

			// ONO
			$this->ONO->LinkCustomAttributes = "";
			$this->ONO->HrefValue = "";
			$this->ONO->TooltipValue = "";

			// ODT
			$this->ODT->LinkCustomAttributes = "";
			$this->ODT->HrefValue = "";
			$this->ODT->TooltipValue = "";

			// PURRT
			$this->PURRT->LinkCustomAttributes = "";
			$this->PURRT->HrefValue = "";
			$this->PURRT->TooltipValue = "";

			// GRP
			$this->GRP->LinkCustomAttributes = "";
			$this->GRP->HrefValue = "";
			$this->GRP->TooltipValue = "";

			// IBATCH
			$this->IBATCH->LinkCustomAttributes = "";
			$this->IBATCH->HrefValue = "";
			$this->IBATCH->TooltipValue = "";

			// IPNO
			$this->IPNO->LinkCustomAttributes = "";
			$this->IPNO->HrefValue = "";
			$this->IPNO->TooltipValue = "";

			// OPNO
			$this->OPNO->LinkCustomAttributes = "";
			$this->OPNO->HrefValue = "";
			$this->OPNO->TooltipValue = "";

			// RECID
			$this->RECID->LinkCustomAttributes = "";
			$this->RECID->HrefValue = "";
			$this->RECID->TooltipValue = "";

			// FQTY
			$this->FQTY->LinkCustomAttributes = "";
			$this->FQTY->HrefValue = "";
			$this->FQTY->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// DCID
			$this->DCID->LinkCustomAttributes = "";
			$this->DCID->HrefValue = "";
			$this->DCID->TooltipValue = "";

			// USERID
			$this->_USERID->LinkCustomAttributes = "";
			$this->_USERID->HrefValue = "";
			$this->_USERID->TooltipValue = "";

			// MODDT
			$this->MODDT->LinkCustomAttributes = "";
			$this->MODDT->HrefValue = "";
			$this->MODDT->TooltipValue = "";

			// FYM
			$this->FYM->LinkCustomAttributes = "";
			$this->FYM->HrefValue = "";
			$this->FYM->TooltipValue = "";

			// PRCBATCH
			$this->PRCBATCH->LinkCustomAttributes = "";
			$this->PRCBATCH->HrefValue = "";
			$this->PRCBATCH->TooltipValue = "";

			// SLNO
			$this->SLNO->LinkCustomAttributes = "";
			$this->SLNO->HrefValue = "";
			$this->SLNO->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// BILLYM
			$this->BILLYM->LinkCustomAttributes = "";
			$this->BILLYM->HrefValue = "";
			$this->BILLYM->TooltipValue = "";

			// BILLGRP
			$this->BILLGRP->LinkCustomAttributes = "";
			$this->BILLGRP->HrefValue = "";
			$this->BILLGRP->TooltipValue = "";

			// STAFF
			$this->STAFF->LinkCustomAttributes = "";
			$this->STAFF->HrefValue = "";
			$this->STAFF->TooltipValue = "";

			// TEMPIPNO
			$this->TEMPIPNO->LinkCustomAttributes = "";
			$this->TEMPIPNO->HrefValue = "";
			$this->TEMPIPNO->TooltipValue = "";

			// PRNTED
			$this->PRNTED->LinkCustomAttributes = "";
			$this->PRNTED->HrefValue = "";
			$this->PRNTED->TooltipValue = "";

			// PATNAME
			$this->PATNAME->LinkCustomAttributes = "";
			$this->PATNAME->HrefValue = "";
			$this->PATNAME->TooltipValue = "";

			// PJVNO
			$this->PJVNO->LinkCustomAttributes = "";
			$this->PJVNO->HrefValue = "";
			$this->PJVNO->TooltipValue = "";

			// PJVSLNO
			$this->PJVSLNO->LinkCustomAttributes = "";
			$this->PJVSLNO->HrefValue = "";
			$this->PJVSLNO->TooltipValue = "";

			// OTHDISC
			$this->OTHDISC->LinkCustomAttributes = "";
			$this->OTHDISC->HrefValue = "";
			$this->OTHDISC->TooltipValue = "";

			// PJVYM
			$this->PJVYM->LinkCustomAttributes = "";
			$this->PJVYM->HrefValue = "";
			$this->PJVYM->TooltipValue = "";

			// PURDISCPER
			$this->PURDISCPER->LinkCustomAttributes = "";
			$this->PURDISCPER->HrefValue = "";
			$this->PURDISCPER->TooltipValue = "";

			// CASHIER
			$this->CASHIER->LinkCustomAttributes = "";
			$this->CASHIER->HrefValue = "";
			$this->CASHIER->TooltipValue = "";

			// CASHTIME
			$this->CASHTIME->LinkCustomAttributes = "";
			$this->CASHTIME->HrefValue = "";
			$this->CASHTIME->TooltipValue = "";

			// CASHRECD
			$this->CASHRECD->LinkCustomAttributes = "";
			$this->CASHRECD->HrefValue = "";
			$this->CASHRECD->TooltipValue = "";

			// CASHREFNO
			$this->CASHREFNO->LinkCustomAttributes = "";
			$this->CASHREFNO->HrefValue = "";
			$this->CASHREFNO->TooltipValue = "";

			// CASHIERSHIFT
			$this->CASHIERSHIFT->LinkCustomAttributes = "";
			$this->CASHIERSHIFT->HrefValue = "";
			$this->CASHIERSHIFT->TooltipValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";
			$this->PRCODE->TooltipValue = "";

			// RELEASEBY
			$this->RELEASEBY->LinkCustomAttributes = "";
			$this->RELEASEBY->HrefValue = "";
			$this->RELEASEBY->TooltipValue = "";

			// CRAUTHOR
			$this->CRAUTHOR->LinkCustomAttributes = "";
			$this->CRAUTHOR->HrefValue = "";
			$this->CRAUTHOR->TooltipValue = "";

			// PAYMENT
			$this->PAYMENT->LinkCustomAttributes = "";
			$this->PAYMENT->HrefValue = "";
			$this->PAYMENT->TooltipValue = "";

			// DRID
			$this->DRID->LinkCustomAttributes = "";
			$this->DRID->HrefValue = "";
			$this->DRID->TooltipValue = "";

			// WARD
			$this->WARD->LinkCustomAttributes = "";
			$this->WARD->HrefValue = "";
			$this->WARD->TooltipValue = "";

			// STAXTYPE
			$this->STAXTYPE->LinkCustomAttributes = "";
			$this->STAXTYPE->HrefValue = "";
			$this->STAXTYPE->TooltipValue = "";

			// PURDISCVAL
			$this->PURDISCVAL->LinkCustomAttributes = "";
			$this->PURDISCVAL->HrefValue = "";
			$this->PURDISCVAL->TooltipValue = "";

			// RNDOFF
			$this->RNDOFF->LinkCustomAttributes = "";
			$this->RNDOFF->HrefValue = "";
			$this->RNDOFF->TooltipValue = "";

			// DISCONMRP
			$this->DISCONMRP->LinkCustomAttributes = "";
			$this->DISCONMRP->HrefValue = "";
			$this->DISCONMRP->TooltipValue = "";

			// DELVDT
			$this->DELVDT->LinkCustomAttributes = "";
			$this->DELVDT->HrefValue = "";
			$this->DELVDT->TooltipValue = "";

			// DELVTIME
			$this->DELVTIME->LinkCustomAttributes = "";
			$this->DELVTIME->HrefValue = "";
			$this->DELVTIME->TooltipValue = "";

			// DELVBY
			$this->DELVBY->LinkCustomAttributes = "";
			$this->DELVBY->HrefValue = "";
			$this->DELVBY->TooltipValue = "";

			// HOSPNO
			$this->HOSPNO->LinkCustomAttributes = "";
			$this->HOSPNO->HrefValue = "";
			$this->HOSPNO->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// pbv
			$this->pbv->LinkCustomAttributes = "";
			$this->pbv->HrefValue = "";
			$this->pbv->TooltipValue = "";

			// pbt
			$this->pbt->LinkCustomAttributes = "";
			$this->pbt->HrefValue = "";
			$this->pbt->TooltipValue = "";

			// SiNo
			$this->SiNo->LinkCustomAttributes = "";
			$this->SiNo->HrefValue = "";
			$this->SiNo->TooltipValue = "";

			// Product
			$this->Product->LinkCustomAttributes = "";
			$this->Product->HrefValue = "";
			$this->Product->TooltipValue = "";

			// Mfg
			$this->Mfg->LinkCustomAttributes = "";
			$this->Mfg->HrefValue = "";
			$this->Mfg->TooltipValue = "";

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

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// BRNAME
			$this->BRNAME->LinkCustomAttributes = "";
			$this->BRNAME->HrefValue = "";
			$this->BRNAME->TooltipValue = "";

			// StoreID
			$this->StoreID->LinkCustomAttributes = "";
			$this->StoreID->HrefValue = "";
			$this->StoreID->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"ew.export(document.fstore_storeledview,'" . $this->ExportExcelUrl . "','excel',true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"ew.export(document.fstore_storeledview,'" . $this->ExportWordUrl . "','word',true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"javascript:void(0);\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"ew.export(document.fstore_storeledview,'" . $this->ExportPdfUrl . "','pdf',true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
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
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
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
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = TRUE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$url = "";
		$item->Body = "<button id=\"emf_store_storeled\" class=\"ew-export-link ew-email\" title=\"" . $Language->phrase("ExportToEmailText") . "\" data-caption=\"" . $Language->phrase("ExportToEmailText") . "\" onclick=\"ew.emailDialogShow({lnk:'emf_store_storeled',hdr:ew.language.phrase('ExportToEmailText'),f:document.fstore_storeledview,key:" . ArrayToJsonAttribute($this->RecKey) . ",sel:false" . $url . "});\">" . $Language->phrase("ExportToEmail") . "</button>";
		$item->Visible = FALSE;

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
		$utf8 = SameText(PROJECT_CHARSET, "utf-8");
		$selectLimit = FALSE;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecs = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecs = $rs->RecordCount();
		}
		$this->StartRec = 1;
		$this->setupStartRec(); // Set up start record position

		// Set the last record to display
		if ($this->DisplayRecs <= 0) {
			$this->StopRec = $this->TotalRecs;
		} else {
			$this->StopRec = $this->StartRec + $this->DisplayRecs - 1;
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
			$this->StartRec = 1;
			$this->StopRec = $this->DisplayRecs <= 0 ? $this->TotalRecs : $this->DisplayRecs;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRec, $this->StopRec, "view");
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
		if (!DEBUG_ENABLED && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (DEBUG_ENABLED && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("store_storeledlist.php"), "", $this->TableVar, TRUE);
		$pageId = "view";
		$Breadcrumb->add("view", $pageId, $url);
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
}
?>
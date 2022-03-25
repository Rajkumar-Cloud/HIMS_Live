<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class store_storeled_delete extends store_storeled
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'store_storeled';

	// Page object name
	public $PageObjName = "store_storeled_delete";

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

		// Table object (store_storeled)
		if (!isset($GLOBALS["store_storeled"]) || get_class($GLOBALS["store_storeled"]) == PROJECT_NAMESPACE . "store_storeled") {
			$GLOBALS["store_storeled"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["store_storeled"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_storeled');

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
		global $store_storeled;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
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
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
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

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
	}
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $TotalRecords = 0;
	public $RecordCount;
	public $RecKeys = [];
	public $StartRowCount = 1;
	public $RowCount = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canDelete()) {
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
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("store_storeledlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
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

		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("store_storeledlist.php");
			return;
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("store_storeledlist.php"); // Prevent SQL injection, return to list
			return;
		}

		// Set up filter (WHERE Clause)
		$this->CurrentFilter = $filter;

		// Get action
		if (IsApi()) {
			$this->CurrentAction = "delete"; // Delete record directly
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action");
		} elseif (Get("action") == "1") {
			$this->CurrentAction = "delete"; // Delete record directly
		} else {
			$this->CurrentAction = "show"; // Display record
		}
		if ($this->isDelete()) {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->deleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
				if (IsApi()) {
					$this->terminate(TRUE);
					return;
				} else {
					$this->terminate($this->getReturnUrl()); // Return to caller
				}
			} else { // Delete failed
				if (IsApi()) {
					$this->terminate();
					return;
				}
				$this->CurrentAction = "show"; // Display record
			}
		}
		if ($this->isShow()) { // Load records for display
			if ($this->Recordset = $this->loadRecordset())
				$this->TotalRecords = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecords <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("store_storeledlist.php"); // Return to list
			}
		}
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
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
		return $row;
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
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		$conn->beginTrans();

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
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}
		if ($deleteRows) {
			$conn->commitTrans(); // Commit the changes
		} else {
			$conn->rollbackTrans(); // Rollback changes
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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("store_storeledlist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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
} // End class
?>
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_outcome_delete extends ivf_outcome
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_outcome';

	// Page object name
	public $PageObjName = "ivf_outcome_delete";

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

		// Table object (ivf_outcome)
		if (!isset($GLOBALS["ivf_outcome"]) || get_class($GLOBALS["ivf_outcome"]) == PROJECT_NAMESPACE . "ivf_outcome") {
			$GLOBALS["ivf_outcome"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_outcome"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_outcome');

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
		global $EXPORT, $ivf_outcome;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf_outcome);
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $TotalRecs = 0;
	public $RecCnt;
	public $RecKeys = array();
	public $StartRowCnt = 1;
	public $RowCnt = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm;

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
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("ivf_outcomelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNO->setVisibility();
		$this->Name->setVisibility();
		$this->Age->setVisibility();
		$this->treatment_status->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->outcomeDate->setVisibility();
		$this->outcomeDay->setVisibility();
		$this->OPResult->setVisibility();
		$this->Gestation->setVisibility();
		$this->TransferdEmbryos->setVisibility();
		$this->InitalOfSacs->setVisibility();
		$this->ImplimentationRate->setVisibility();
		$this->EmbryoNo->setVisibility();
		$this->ExtrauterineSac->setVisibility();
		$this->PregnancyMonozygotic->setVisibility();
		$this->TypeGestation->setVisibility();
		$this->Urine->setVisibility();
		$this->PTdate->setVisibility();
		$this->Reduced->setVisibility();
		$this->INduced->setVisibility();
		$this->INducedDate->setVisibility();
		$this->Miscarriage->setVisibility();
		$this->Induced1->setVisibility();
		$this->Type->setVisibility();
		$this->IfClinical->setVisibility();
		$this->GADate->setVisibility();
		$this->GA->setVisibility();
		$this->FoetalDeath->setVisibility();
		$this->FerinatalDeath->setVisibility();
		$this->TidNo->setVisibility();
		$this->Ectopic->setVisibility();
		$this->Extra->setVisibility();
		$this->Implantation->setVisibility();
		$this->DeliveryDate->setVisibility();
		$this->BabyDetails->Visible = FALSE;
		$this->LSCSNormal->Visible = FALSE;
		$this->Notes->Visible = FALSE;
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
		// Set up master/detail parameters

		$this->setupMasterParms();

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivf_outcomelist.php"); // Prevent SQL injection, return to list
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
				$this->TotalRecs = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecs <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("ivf_outcomelist.php"); // Return to list
			}
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
		$this->id->setDbValue($row['id']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->Name->setDbValue($row['Name']);
		$this->Age->setDbValue($row['Age']);
		$this->treatment_status->setDbValue($row['treatment_status']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->outcomeDate->setDbValue($row['outcomeDate']);
		$this->outcomeDay->setDbValue($row['outcomeDay']);
		$this->OPResult->setDbValue($row['OPResult']);
		$this->Gestation->setDbValue($row['Gestation']);
		$this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
		$this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
		$this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
		$this->EmbryoNo->setDbValue($row['EmbryoNo']);
		$this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
		$this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
		$this->TypeGestation->setDbValue($row['TypeGestation']);
		$this->Urine->setDbValue($row['Urine']);
		$this->PTdate->setDbValue($row['PTdate']);
		$this->Reduced->setDbValue($row['Reduced']);
		$this->INduced->setDbValue($row['INduced']);
		$this->INducedDate->setDbValue($row['INducedDate']);
		$this->Miscarriage->setDbValue($row['Miscarriage']);
		$this->Induced1->setDbValue($row['Induced1']);
		$this->Type->setDbValue($row['Type']);
		$this->IfClinical->setDbValue($row['IfClinical']);
		$this->GADate->setDbValue($row['GADate']);
		$this->GA->setDbValue($row['GA']);
		$this->FoetalDeath->setDbValue($row['FoetalDeath']);
		$this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Ectopic->setDbValue($row['Ectopic']);
		$this->Extra->setDbValue($row['Extra']);
		$this->Implantation->setDbValue($row['Implantation']);
		$this->DeliveryDate->setDbValue($row['DeliveryDate']);
		$this->BabyDetails->setDbValue($row['BabyDetails']);
		$this->LSCSNormal->setDbValue($row['LSCSNormal']);
		$this->Notes->setDbValue($row['Notes']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNO'] = NULL;
		$row['Name'] = NULL;
		$row['Age'] = NULL;
		$row['treatment_status'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['RESULT'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['outcomeDate'] = NULL;
		$row['outcomeDay'] = NULL;
		$row['OPResult'] = NULL;
		$row['Gestation'] = NULL;
		$row['TransferdEmbryos'] = NULL;
		$row['InitalOfSacs'] = NULL;
		$row['ImplimentationRate'] = NULL;
		$row['EmbryoNo'] = NULL;
		$row['ExtrauterineSac'] = NULL;
		$row['PregnancyMonozygotic'] = NULL;
		$row['TypeGestation'] = NULL;
		$row['Urine'] = NULL;
		$row['PTdate'] = NULL;
		$row['Reduced'] = NULL;
		$row['INduced'] = NULL;
		$row['INducedDate'] = NULL;
		$row['Miscarriage'] = NULL;
		$row['Induced1'] = NULL;
		$row['Type'] = NULL;
		$row['IfClinical'] = NULL;
		$row['GADate'] = NULL;
		$row['GA'] = NULL;
		$row['FoetalDeath'] = NULL;
		$row['FerinatalDeath'] = NULL;
		$row['TidNo'] = NULL;
		$row['Ectopic'] = NULL;
		$row['Extra'] = NULL;
		$row['Implantation'] = NULL;
		$row['DeliveryDate'] = NULL;
		$row['BabyDetails'] = NULL;
		$row['LSCSNormal'] = NULL;
		$row['Notes'] = NULL;
		return $row;
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
		// RIDNO
		// Name
		// Age
		// treatment_status
		// ARTCYCLE
		// RESULT
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// outcomeDate
		// outcomeDay
		// OPResult
		// Gestation
		// TransferdEmbryos
		// InitalOfSacs
		// ImplimentationRate
		// EmbryoNo
		// ExtrauterineSac
		// PregnancyMonozygotic
		// TypeGestation
		// Urine
		// PTdate
		// Reduced
		// INduced
		// INducedDate
		// Miscarriage
		// Induced1
		// Type
		// IfClinical
		// GADate
		// GA
		// FoetalDeath
		// FerinatalDeath
		// TidNo
		// Ectopic
		// Extra
		// Implantation
		// DeliveryDate
		// BabyDetails
		// LSCSNormal
		// Notes

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// treatment_status
			$this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
			$this->treatment_status->ViewCustomAttributes = "";

			// ARTCYCLE
			$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			$this->RESULT->ViewValue = $this->RESULT->CurrentValue;
			$this->RESULT->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// outcomeDate
			$this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
			$this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
			$this->outcomeDate->ViewCustomAttributes = "";

			// outcomeDay
			$this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
			$this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
			$this->outcomeDay->ViewCustomAttributes = "";

			// OPResult
			$this->OPResult->ViewValue = $this->OPResult->CurrentValue;
			$this->OPResult->ViewCustomAttributes = "";

			// Gestation
			if (strval($this->Gestation->CurrentValue) <> "") {
				$this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
			} else {
				$this->Gestation->ViewValue = NULL;
			}
			$this->Gestation->ViewCustomAttributes = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
			$this->TransferdEmbryos->ViewCustomAttributes = "";

			// InitalOfSacs
			$this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
			$this->InitalOfSacs->ViewCustomAttributes = "";

			// ImplimentationRate
			$this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
			$this->ImplimentationRate->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
			$this->ExtrauterineSac->ViewCustomAttributes = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
			$this->PregnancyMonozygotic->ViewCustomAttributes = "";

			// TypeGestation
			$this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
			$this->TypeGestation->ViewCustomAttributes = "";

			// Urine
			if (strval($this->Urine->CurrentValue) <> "") {
				$this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
			} else {
				$this->Urine->ViewValue = NULL;
			}
			$this->Urine->ViewCustomAttributes = "";

			// PTdate
			$this->PTdate->ViewValue = $this->PTdate->CurrentValue;
			$this->PTdate->ViewCustomAttributes = "";

			// Reduced
			$this->Reduced->ViewValue = $this->Reduced->CurrentValue;
			$this->Reduced->ViewCustomAttributes = "";

			// INduced
			$this->INduced->ViewValue = $this->INduced->CurrentValue;
			$this->INduced->ViewCustomAttributes = "";

			// INducedDate
			$this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
			$this->INducedDate->ViewCustomAttributes = "";

			// Miscarriage
			if (strval($this->Miscarriage->CurrentValue) <> "") {
				$this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
			} else {
				$this->Miscarriage->ViewValue = NULL;
			}
			$this->Miscarriage->ViewCustomAttributes = "";

			// Induced1
			if (strval($this->Induced1->CurrentValue) <> "") {
				$this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
			} else {
				$this->Induced1->ViewValue = NULL;
			}
			$this->Induced1->ViewCustomAttributes = "";

			// Type
			if (strval($this->Type->CurrentValue) <> "") {
				$this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
			} else {
				$this->Type->ViewValue = NULL;
			}
			$this->Type->ViewCustomAttributes = "";

			// IfClinical
			$this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
			$this->IfClinical->ViewCustomAttributes = "";

			// GADate
			$this->GADate->ViewValue = $this->GADate->CurrentValue;
			$this->GADate->ViewCustomAttributes = "";

			// GA
			$this->GA->ViewValue = $this->GA->CurrentValue;
			$this->GA->ViewCustomAttributes = "";

			// FoetalDeath
			if (strval($this->FoetalDeath->CurrentValue) <> "") {
				$this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
			} else {
				$this->FoetalDeath->ViewValue = NULL;
			}
			$this->FoetalDeath->ViewCustomAttributes = "";

			// FerinatalDeath
			if (strval($this->FerinatalDeath->CurrentValue) <> "") {
				$this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
			} else {
				$this->FerinatalDeath->ViewValue = NULL;
			}
			$this->FerinatalDeath->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Ectopic
			if (strval($this->Ectopic->CurrentValue) <> "") {
				$this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
			} else {
				$this->Ectopic->ViewValue = NULL;
			}
			$this->Ectopic->ViewCustomAttributes = "";

			// Extra
			if (strval($this->Extra->CurrentValue) <> "") {
				$this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
			} else {
				$this->Extra->ViewValue = NULL;
			}
			$this->Extra->ViewCustomAttributes = "";

			// Implantation
			$this->Implantation->ViewValue = $this->Implantation->CurrentValue;
			$this->Implantation->ViewCustomAttributes = "";

			// DeliveryDate
			$this->DeliveryDate->ViewValue = $this->DeliveryDate->CurrentValue;
			$this->DeliveryDate->ViewValue = FormatDateTime($this->DeliveryDate->ViewValue, 7);
			$this->DeliveryDate->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// treatment_status
			$this->treatment_status->LinkCustomAttributes = "";
			$this->treatment_status->HrefValue = "";
			$this->treatment_status->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

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

			// outcomeDate
			$this->outcomeDate->LinkCustomAttributes = "";
			$this->outcomeDate->HrefValue = "";
			$this->outcomeDate->TooltipValue = "";

			// outcomeDay
			$this->outcomeDay->LinkCustomAttributes = "";
			$this->outcomeDay->HrefValue = "";
			$this->outcomeDay->TooltipValue = "";

			// OPResult
			$this->OPResult->LinkCustomAttributes = "";
			$this->OPResult->HrefValue = "";
			$this->OPResult->TooltipValue = "";

			// Gestation
			$this->Gestation->LinkCustomAttributes = "";
			$this->Gestation->HrefValue = "";
			$this->Gestation->TooltipValue = "";

			// TransferdEmbryos
			$this->TransferdEmbryos->LinkCustomAttributes = "";
			$this->TransferdEmbryos->HrefValue = "";
			$this->TransferdEmbryos->TooltipValue = "";

			// InitalOfSacs
			$this->InitalOfSacs->LinkCustomAttributes = "";
			$this->InitalOfSacs->HrefValue = "";
			$this->InitalOfSacs->TooltipValue = "";

			// ImplimentationRate
			$this->ImplimentationRate->LinkCustomAttributes = "";
			$this->ImplimentationRate->HrefValue = "";
			$this->ImplimentationRate->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// ExtrauterineSac
			$this->ExtrauterineSac->LinkCustomAttributes = "";
			$this->ExtrauterineSac->HrefValue = "";
			$this->ExtrauterineSac->TooltipValue = "";

			// PregnancyMonozygotic
			$this->PregnancyMonozygotic->LinkCustomAttributes = "";
			$this->PregnancyMonozygotic->HrefValue = "";
			$this->PregnancyMonozygotic->TooltipValue = "";

			// TypeGestation
			$this->TypeGestation->LinkCustomAttributes = "";
			$this->TypeGestation->HrefValue = "";
			$this->TypeGestation->TooltipValue = "";

			// Urine
			$this->Urine->LinkCustomAttributes = "";
			$this->Urine->HrefValue = "";
			$this->Urine->TooltipValue = "";

			// PTdate
			$this->PTdate->LinkCustomAttributes = "";
			$this->PTdate->HrefValue = "";
			$this->PTdate->TooltipValue = "";

			// Reduced
			$this->Reduced->LinkCustomAttributes = "";
			$this->Reduced->HrefValue = "";
			$this->Reduced->TooltipValue = "";

			// INduced
			$this->INduced->LinkCustomAttributes = "";
			$this->INduced->HrefValue = "";
			$this->INduced->TooltipValue = "";

			// INducedDate
			$this->INducedDate->LinkCustomAttributes = "";
			$this->INducedDate->HrefValue = "";
			$this->INducedDate->TooltipValue = "";

			// Miscarriage
			$this->Miscarriage->LinkCustomAttributes = "";
			$this->Miscarriage->HrefValue = "";
			$this->Miscarriage->TooltipValue = "";

			// Induced1
			$this->Induced1->LinkCustomAttributes = "";
			$this->Induced1->HrefValue = "";
			$this->Induced1->TooltipValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";
			$this->Type->TooltipValue = "";

			// IfClinical
			$this->IfClinical->LinkCustomAttributes = "";
			$this->IfClinical->HrefValue = "";
			$this->IfClinical->TooltipValue = "";

			// GADate
			$this->GADate->LinkCustomAttributes = "";
			$this->GADate->HrefValue = "";
			$this->GADate->TooltipValue = "";

			// GA
			$this->GA->LinkCustomAttributes = "";
			$this->GA->HrefValue = "";
			$this->GA->TooltipValue = "";

			// FoetalDeath
			$this->FoetalDeath->LinkCustomAttributes = "";
			$this->FoetalDeath->HrefValue = "";
			$this->FoetalDeath->TooltipValue = "";

			// FerinatalDeath
			$this->FerinatalDeath->LinkCustomAttributes = "";
			$this->FerinatalDeath->HrefValue = "";
			$this->FerinatalDeath->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Ectopic
			$this->Ectopic->LinkCustomAttributes = "";
			$this->Ectopic->HrefValue = "";
			$this->Ectopic->TooltipValue = "";

			// Extra
			$this->Extra->LinkCustomAttributes = "";
			$this->Extra->HrefValue = "";
			$this->Extra->TooltipValue = "";

			// Implantation
			$this->Implantation->LinkCustomAttributes = "";
			$this->Implantation->HrefValue = "";
			$this->Implantation->TooltipValue = "";

			// DeliveryDate
			$this->DeliveryDate->LinkCustomAttributes = "";
			$this->DeliveryDate->HrefValue = "";
			$this->DeliveryDate->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (Get("fk_RIDNO") !== NULL) {
					$this->RIDNO->setQueryStringValue(Get("fk_RIDNO"));
					$this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
					if (!is_numeric($this->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Name") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Name"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_id") !== NULL) {
					$this->TidNo->setQueryStringValue(Get("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($this->TidNo->QueryStringValue))
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (Post("fk_RIDNO") !== NULL) {
					$this->RIDNO->setFormValue(Post("fk_RIDNO"));
					$this->RIDNO->setSessionValue($this->RIDNO->FormValue);
					if (!is_numeric($this->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Name") !== NULL) {
					$this->Name->setFormValue(Post("fk_Name"));
					$this->Name->setSessionValue($this->Name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_id") !== NULL) {
					$this->TidNo->setFormValue(Post("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($this->TidNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "ivf_treatment_plan") {
				if ($this->RIDNO->CurrentValue == "")
					$this->RIDNO->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_outcomelist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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
}
?>
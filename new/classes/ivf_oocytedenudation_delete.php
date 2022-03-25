<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_oocytedenudation_delete extends ivf_oocytedenudation
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_oocytedenudation';

	// Page object name
	public $PageObjName = "ivf_oocytedenudation_delete";

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

		// Table object (ivf_oocytedenudation)
		if (!isset($GLOBALS["ivf_oocytedenudation"]) || get_class($GLOBALS["ivf_oocytedenudation"]) == PROJECT_NAMESPACE . "ivf_oocytedenudation") {
			$GLOBALS["ivf_oocytedenudation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_oocytedenudation"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS['view_ivf_treatment']))
			$GLOBALS['view_ivf_treatment'] = new view_ivf_treatment();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_oocytedenudation');

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
		global $ivf_oocytedenudation;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_oocytedenudation);
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
					$this->terminate(GetUrl("ivf_oocytedenudationlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ResultDate->setVisibility();
		$this->Surgeon->setVisibility();
		$this->AsstSurgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AnaestheiaType->setVisibility();
		$this->PrimaryEmbryologist->setVisibility();
		$this->SecondaryEmbryologist->setVisibility();
		$this->OPUNotes->Visible = FALSE;
		$this->NoOfFolliclesRight->setVisibility();
		$this->NoOfFolliclesLeft->setVisibility();
		$this->NoOfOocytes->setVisibility();
		$this->RecordOocyteDenudation->setVisibility();
		$this->DateOfDenudation->setVisibility();
		$this->DenudationDoneBy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TidNo->setVisibility();
		$this->ExpFollicles->setVisibility();
		$this->SecondaryDenudationDoneBy->setVisibility();
		$this->patient2->Visible = FALSE;
		$this->OocytesDonate1->Visible = FALSE;
		$this->OocytesDonate2->Visible = FALSE;
		$this->ETDonate->Visible = FALSE;
		$this->OocyteOrgin->setVisibility();
		$this->patient1->setVisibility();
		$this->OocyteType->setVisibility();
		$this->MIOocytesDonate1->setVisibility();
		$this->MIOocytesDonate2->setVisibility();
		$this->SelfMI->setVisibility();
		$this->SelfMII->setVisibility();
		$this->patient3->setVisibility();
		$this->patient4->setVisibility();
		$this->OocytesDonate3->setVisibility();
		$this->OocytesDonate4->setVisibility();
		$this->MIOocytesDonate3->setVisibility();
		$this->MIOocytesDonate4->setVisibility();
		$this->SelfOocytesMI->setVisibility();
		$this->SelfOocytesMII->setVisibility();
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
		$this->setupLookupOptions($this->patient2);
		$this->setupLookupOptions($this->patient1);
		$this->setupLookupOptions($this->patient3);
		$this->setupLookupOptions($this->patient4);

		// Check permission
		if (!$Security->canDelete()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("ivf_oocytedenudationlist.php");
			return;
		}

		// Set up master/detail parameters
		$this->setupMasterParms();

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivf_oocytedenudationlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("ivf_oocytedenudationlist.php"); // Return to list
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
		$this->id->setDbValue($row['id']);
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->AsstSurgeon->setDbValue($row['AsstSurgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AnaestheiaType->setDbValue($row['AnaestheiaType']);
		$this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
		$this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
		$this->OPUNotes->setDbValue($row['OPUNotes']);
		$this->NoOfFolliclesRight->setDbValue($row['NoOfFolliclesRight']);
		$this->NoOfFolliclesLeft->setDbValue($row['NoOfFolliclesLeft']);
		$this->NoOfOocytes->setDbValue($row['NoOfOocytes']);
		$this->RecordOocyteDenudation->setDbValue($row['RecordOocyteDenudation']);
		$this->DateOfDenudation->setDbValue($row['DateOfDenudation']);
		$this->DenudationDoneBy->setDbValue($row['DenudationDoneBy']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->ExpFollicles->setDbValue($row['ExpFollicles']);
		$this->SecondaryDenudationDoneBy->setDbValue($row['SecondaryDenudationDoneBy']);
		$this->patient2->setDbValue($row['patient2']);
		$this->OocytesDonate1->setDbValue($row['OocytesDonate1']);
		$this->OocytesDonate2->setDbValue($row['OocytesDonate2']);
		$this->ETDonate->setDbValue($row['ETDonate']);
		$this->OocyteOrgin->setDbValue($row['OocyteOrgin']);
		$this->patient1->setDbValue($row['patient1']);
		$this->OocyteType->setDbValue($row['OocyteType']);
		$this->MIOocytesDonate1->setDbValue($row['MIOocytesDonate1']);
		$this->MIOocytesDonate2->setDbValue($row['MIOocytesDonate2']);
		$this->SelfMI->setDbValue($row['SelfMI']);
		$this->SelfMII->setDbValue($row['SelfMII']);
		$this->patient3->setDbValue($row['patient3']);
		$this->patient4->setDbValue($row['patient4']);
		$this->OocytesDonate3->setDbValue($row['OocytesDonate3']);
		$this->OocytesDonate4->setDbValue($row['OocytesDonate4']);
		$this->MIOocytesDonate3->setDbValue($row['MIOocytesDonate3']);
		$this->MIOocytesDonate4->setDbValue($row['MIOocytesDonate4']);
		$this->SelfOocytesMI->setDbValue($row['SelfOocytesMI']);
		$this->SelfOocytesMII->setDbValue($row['SelfOocytesMII']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ResultDate'] = NULL;
		$row['Surgeon'] = NULL;
		$row['AsstSurgeon'] = NULL;
		$row['Anaesthetist'] = NULL;
		$row['AnaestheiaType'] = NULL;
		$row['PrimaryEmbryologist'] = NULL;
		$row['SecondaryEmbryologist'] = NULL;
		$row['OPUNotes'] = NULL;
		$row['NoOfFolliclesRight'] = NULL;
		$row['NoOfFolliclesLeft'] = NULL;
		$row['NoOfOocytes'] = NULL;
		$row['RecordOocyteDenudation'] = NULL;
		$row['DateOfDenudation'] = NULL;
		$row['DenudationDoneBy'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TidNo'] = NULL;
		$row['ExpFollicles'] = NULL;
		$row['SecondaryDenudationDoneBy'] = NULL;
		$row['patient2'] = NULL;
		$row['OocytesDonate1'] = NULL;
		$row['OocytesDonate2'] = NULL;
		$row['ETDonate'] = NULL;
		$row['OocyteOrgin'] = NULL;
		$row['patient1'] = NULL;
		$row['OocyteType'] = NULL;
		$row['MIOocytesDonate1'] = NULL;
		$row['MIOocytesDonate2'] = NULL;
		$row['SelfMI'] = NULL;
		$row['SelfMII'] = NULL;
		$row['patient3'] = NULL;
		$row['patient4'] = NULL;
		$row['OocytesDonate3'] = NULL;
		$row['OocytesDonate4'] = NULL;
		$row['MIOocytesDonate3'] = NULL;
		$row['MIOocytesDonate4'] = NULL;
		$row['SelfOocytesMI'] = NULL;
		$row['SelfOocytesMII'] = NULL;
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
		// RIDNo
		// Name
		// ResultDate
		// Surgeon
		// AsstSurgeon
		// Anaesthetist
		// AnaestheiaType
		// PrimaryEmbryologist
		// SecondaryEmbryologist
		// OPUNotes
		// NoOfFolliclesRight
		// NoOfFolliclesLeft
		// NoOfOocytes
		// RecordOocyteDenudation
		// DateOfDenudation
		// DenudationDoneBy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TidNo
		// ExpFollicles
		// SecondaryDenudationDoneBy
		// patient2
		// OocytesDonate1
		// OocytesDonate2
		// ETDonate
		// OocyteOrgin
		// patient1
		// OocyteType
		// MIOocytesDonate1
		// MIOocytesDonate2
		// SelfMI
		// SelfMII
		// patient3
		// patient4
		// OocytesDonate3
		// OocytesDonate4
		// MIOocytesDonate3
		// MIOocytesDonate4
		// SelfOocytesMI
		// SelfOocytesMII

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 11);
			$this->ResultDate->ViewCustomAttributes = "";

			// Surgeon
			$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
			$this->Surgeon->ViewCustomAttributes = "";

			// AsstSurgeon
			$this->AsstSurgeon->ViewValue = $this->AsstSurgeon->CurrentValue;
			$this->AsstSurgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AnaestheiaType
			$this->AnaestheiaType->ViewValue = $this->AnaestheiaType->CurrentValue;
			$this->AnaestheiaType->ViewCustomAttributes = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
			$this->PrimaryEmbryologist->ViewCustomAttributes = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
			$this->SecondaryEmbryologist->ViewCustomAttributes = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->ViewValue = $this->NoOfFolliclesRight->CurrentValue;
			$this->NoOfFolliclesRight->ViewCustomAttributes = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->ViewValue = $this->NoOfFolliclesLeft->CurrentValue;
			$this->NoOfFolliclesLeft->ViewCustomAttributes = "";

			// NoOfOocytes
			$this->NoOfOocytes->ViewValue = $this->NoOfOocytes->CurrentValue;
			$this->NoOfOocytes->ViewCustomAttributes = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->ViewValue = $this->RecordOocyteDenudation->CurrentValue;
			$this->RecordOocyteDenudation->ViewCustomAttributes = "";

			// DateOfDenudation
			$this->DateOfDenudation->ViewValue = $this->DateOfDenudation->CurrentValue;
			$this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 11);
			$this->DateOfDenudation->ViewCustomAttributes = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->ViewValue = $this->DenudationDoneBy->CurrentValue;
			$this->DenudationDoneBy->ViewCustomAttributes = "";

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

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// ExpFollicles
			$this->ExpFollicles->ViewValue = $this->ExpFollicles->CurrentValue;
			$this->ExpFollicles->ViewCustomAttributes = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->ViewValue = $this->SecondaryDenudationDoneBy->CurrentValue;
			$this->SecondaryDenudationDoneBy->ViewCustomAttributes = "";

			// OocyteOrgin
			if (strval($this->OocyteOrgin->CurrentValue) != "") {
				$this->OocyteOrgin->ViewValue = $this->OocyteOrgin->optionCaption($this->OocyteOrgin->CurrentValue);
			} else {
				$this->OocyteOrgin->ViewValue = NULL;
			}
			$this->OocyteOrgin->ViewCustomAttributes = "";

			// patient1
			$curVal = strval($this->patient1->CurrentValue);
			if ($curVal != "") {
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
				if ($this->patient1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient1->ViewValue = $this->patient1->CurrentValue;
					}
				}
			} else {
				$this->patient1->ViewValue = NULL;
			}
			$this->patient1->ViewCustomAttributes = "";

			// OocyteType
			if (strval($this->OocyteType->CurrentValue) != "") {
				$this->OocyteType->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OocyteType->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OocyteType->ViewValue->add($this->OocyteType->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OocyteType->ViewValue = NULL;
			}
			$this->OocyteType->ViewCustomAttributes = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->ViewValue = $this->MIOocytesDonate1->CurrentValue;
			$this->MIOocytesDonate1->ViewCustomAttributes = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->ViewValue = $this->MIOocytesDonate2->CurrentValue;
			$this->MIOocytesDonate2->ViewCustomAttributes = "";

			// SelfMI
			$this->SelfMI->ViewValue = $this->SelfMI->CurrentValue;
			$this->SelfMI->ViewCustomAttributes = "";

			// SelfMII
			$this->SelfMII->ViewValue = $this->SelfMII->CurrentValue;
			$this->SelfMII->ViewCustomAttributes = "";

			// patient3
			$curVal = strval($this->patient3->CurrentValue);
			if ($curVal != "") {
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
				if ($this->patient3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient3->ViewValue = $this->patient3->CurrentValue;
					}
				}
			} else {
				$this->patient3->ViewValue = NULL;
			}
			$this->patient3->ViewCustomAttributes = "";

			// patient4
			$curVal = strval($this->patient4->CurrentValue);
			if ($curVal != "") {
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
				if ($this->patient4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient4->ViewValue = $this->patient4->CurrentValue;
					}
				}
			} else {
				$this->patient4->ViewValue = NULL;
			}
			$this->patient4->ViewCustomAttributes = "";

			// OocytesDonate3
			$this->OocytesDonate3->ViewValue = $this->OocytesDonate3->CurrentValue;
			$this->OocytesDonate3->ViewCustomAttributes = "";

			// OocytesDonate4
			$this->OocytesDonate4->ViewValue = $this->OocytesDonate4->CurrentValue;
			$this->OocytesDonate4->ViewCustomAttributes = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->ViewValue = $this->MIOocytesDonate3->CurrentValue;
			$this->MIOocytesDonate3->ViewCustomAttributes = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->ViewValue = $this->MIOocytesDonate4->CurrentValue;
			$this->MIOocytesDonate4->ViewCustomAttributes = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->ViewValue = $this->SelfOocytesMI->CurrentValue;
			$this->SelfOocytesMI->ViewCustomAttributes = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->ViewValue = $this->SelfOocytesMII->CurrentValue;
			$this->SelfOocytesMII->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";
			$this->AsstSurgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";
			$this->AnaestheiaType->TooltipValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";
			$this->PrimaryEmbryologist->TooltipValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";
			$this->SecondaryEmbryologist->TooltipValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";
			$this->NoOfFolliclesRight->TooltipValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";
			$this->NoOfFolliclesLeft->TooltipValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";
			$this->NoOfOocytes->TooltipValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";
			$this->RecordOocyteDenudation->TooltipValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";
			$this->DateOfDenudation->TooltipValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";
			$this->DenudationDoneBy->TooltipValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";
			$this->ExpFollicles->TooltipValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";
			$this->SecondaryDenudationDoneBy->TooltipValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";
			$this->OocyteOrgin->TooltipValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";
			$this->patient1->TooltipValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";
			$this->OocyteType->TooltipValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";
			$this->MIOocytesDonate1->TooltipValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";
			$this->MIOocytesDonate2->TooltipValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";
			$this->SelfMI->TooltipValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";
			$this->SelfMII->TooltipValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";
			$this->patient3->TooltipValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";
			$this->patient4->TooltipValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";
			$this->OocytesDonate3->TooltipValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";
			$this->OocytesDonate4->TooltipValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";
			$this->MIOocytesDonate3->TooltipValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";
			$this->MIOocytesDonate4->TooltipValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";
			$this->SelfOocytesMI->TooltipValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";
			$this->SelfOocytesMII->TooltipValue = "";
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("Name"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["view_ivf_treatment"]->Name->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["view_ivf_treatment"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("Name"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["view_ivf_treatment"]->Name->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
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
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "view_ivf_treatment") {
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_oocytedenudationlist.php"), "", $this->TableVar, TRUE);
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
				case "x_patient2":
					break;
				case "x_OocyteOrgin":
					break;
				case "x_patient1":
					break;
				case "x_OocyteType":
					break;
				case "x_patient3":
					break;
				case "x_patient4":
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
						case "x_patient2":
							break;
						case "x_patient1":
							break;
						case "x_patient3":
							break;
						case "x_patient4":
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
} // End class
?>
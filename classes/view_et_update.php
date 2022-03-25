<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_et_update extends view_et
{

	// Page ID
	public $PageID = "update";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_et';

	// Page object name
	public $PageObjName = "view_et_update";

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

		// Table object (view_et)
		if (!isset($GLOBALS["view_et"]) || get_class($GLOBALS["view_et"]) == PROJECT_NAMESPACE . "view_et") {
			$GLOBALS["view_et"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_et"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'update');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_et');

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
		global $EXPORT, $view_et;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_et);
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
					if ($pageName == "view_etview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-update-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $RecKeys;
	public $Disabled;
	public $UpdateCount = 0;

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
					$this->terminate(GetUrl("view_etlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->RIDNo->setVisibility();
		$this->PatientName->setVisibility();
		$this->TiDNo->setVisibility();
		$this->id->Visible = FALSE;
		$this->EmbryoNo->setVisibility();
		$this->Stage->setVisibility();
		$this->FertilisationDate->setVisibility();
		$this->Day->setVisibility();
		$this->Grade->setVisibility();
		$this->Incubator->setVisibility();
		$this->Catheter->setVisibility();
		$this->Difficulty->setVisibility();
		$this->Easy->setVisibility();
		$this->Comments->setVisibility();
		$this->Doctor->setVisibility();
		$this->Embryologist->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->RIDNo->Required = FALSE;
		$this->TiDNo->Required = FALSE;

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
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-update-form ew-horizontal";

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Try to load keys from list form
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		if (Post("action") !== NULL && Post("action") !== "") {

			// Get action
			$this->CurrentAction = Post("action");
			$this->loadFormValues(); // Get form values

			// Validate form
			if (!$this->validateForm()) {
				$this->CurrentAction = "show"; // Form error, reset action
				$this->setFailureMessage($FormError);
			}
		} else {
			$this->loadMultiUpdateValues(); // Load initial values to form
		}
		if (count($this->RecKeys) <= 0)
			$this->terminate("view_etlist.php"); // No records selected, return to list
		if ($this->isUpdate()) {
				if ($this->updateRows()) { // Update Records based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
					$this->terminate($this->getReturnUrl()); // Return to caller
				} else {
					$this->restoreFormValues(); // Restore form values
				}
		}

		// Render row
		$this->RowType = ROWTYPE_EDIT; // Render edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	protected function loadMultiUpdateValues()
	{
		$this->CurrentFilter = $this->getFilterFromRecordKeys();

		// Load recordset
		if ($this->Recordset = $this->loadRecordset()) {
			$i = 1;
			while (!$this->Recordset->EOF) {
				if ($i == 1) {
					$this->RIDNo->setDbValue($this->Recordset->fields('RIDNo'));
					$this->PatientName->setDbValue($this->Recordset->fields('PatientName'));
					$this->TiDNo->setDbValue($this->Recordset->fields('TiDNo'));
					$this->EmbryoNo->setDbValue($this->Recordset->fields('EmbryoNo'));
					$this->Stage->setDbValue($this->Recordset->fields('Stage'));
					$this->FertilisationDate->setDbValue($this->Recordset->fields('FertilisationDate'));
					$this->Day->setDbValue($this->Recordset->fields('Day'));
					$this->Grade->setDbValue($this->Recordset->fields('Grade'));
					$this->Incubator->setDbValue($this->Recordset->fields('Incubator'));
					$this->Catheter->setDbValue($this->Recordset->fields('Catheter'));
					$this->Difficulty->setDbValue($this->Recordset->fields('Difficulty'));
					$this->Easy->setDbValue($this->Recordset->fields('Easy'));
					$this->Comments->setDbValue($this->Recordset->fields('Comments'));
					$this->Doctor->setDbValue($this->Recordset->fields('Doctor'));
					$this->Embryologist->setDbValue($this->Recordset->fields('Embryologist'));
				} else {
					if (!CompareValue($this->RIDNo->DbValue, $this->Recordset->fields('RIDNo')))
						$this->RIDNo->CurrentValue = NULL;
					if (!CompareValue($this->PatientName->DbValue, $this->Recordset->fields('PatientName')))
						$this->PatientName->CurrentValue = NULL;
					if (!CompareValue($this->TiDNo->DbValue, $this->Recordset->fields('TiDNo')))
						$this->TiDNo->CurrentValue = NULL;
					if (!CompareValue($this->EmbryoNo->DbValue, $this->Recordset->fields('EmbryoNo')))
						$this->EmbryoNo->CurrentValue = NULL;
					if (!CompareValue($this->Stage->DbValue, $this->Recordset->fields('Stage')))
						$this->Stage->CurrentValue = NULL;
					if (!CompareValue($this->FertilisationDate->DbValue, $this->Recordset->fields('FertilisationDate')))
						$this->FertilisationDate->CurrentValue = NULL;
					if (!CompareValue($this->Day->DbValue, $this->Recordset->fields('Day')))
						$this->Day->CurrentValue = NULL;
					if (!CompareValue($this->Grade->DbValue, $this->Recordset->fields('Grade')))
						$this->Grade->CurrentValue = NULL;
					if (!CompareValue($this->Incubator->DbValue, $this->Recordset->fields('Incubator')))
						$this->Incubator->CurrentValue = NULL;
					if (!CompareValue($this->Catheter->DbValue, $this->Recordset->fields('Catheter')))
						$this->Catheter->CurrentValue = NULL;
					if (!CompareValue($this->Difficulty->DbValue, $this->Recordset->fields('Difficulty')))
						$this->Difficulty->CurrentValue = NULL;
					if (!CompareValue($this->Easy->DbValue, $this->Recordset->fields('Easy')))
						$this->Easy->CurrentValue = NULL;
					if (!CompareValue($this->Comments->DbValue, $this->Recordset->fields('Comments')))
						$this->Comments->CurrentValue = NULL;
					if (!CompareValue($this->Doctor->DbValue, $this->Recordset->fields('Doctor')))
						$this->Doctor->CurrentValue = NULL;
					if (!CompareValue($this->Embryologist->DbValue, $this->Recordset->fields('Embryologist')))
						$this->Embryologist->CurrentValue = NULL;
				}
				$i++;
				$this->Recordset->moveNext();
			}
			$this->Recordset->close();
		}
	}

	// Set up key value
	protected function setupKeyValues($key)
	{
		$keyFld = $key;
		if (!is_numeric($keyFld))
			return FALSE;
		$this->id->CurrentValue = $keyFld;
		return TRUE;
	}

	// Update all selected rows
	protected function updateRows()
	{
		global $Language;
		$conn = &$this->getConnection();
		$conn->beginTrans();

		// Get old recordset
		$this->CurrentFilter = $this->getFilterFromRecordKeys();
		$sql = $this->getCurrentSql();
		$rsold = $conn->execute($sql);

		// Update all rows
		$key = "";
		foreach ($this->RecKeys as $reckey) {
			if ($this->setupKeyValues($reckey)) {
				$thisKey = $reckey;
				$this->SendEmail = FALSE; // Do not send email on update success
				$this->UpdateCount += 1; // Update record count for records being updated
				$updateRows = $this->editRow(); // Update this row
			} else {
				$updateRows = FALSE;
			}
			if (!$updateRows)
				break; // Update failed
			if ($key <> "")
				$key .= ", ";
			$key .= $thisKey;
		}

		// Check if all rows updated
		if ($updateRows) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->execute($sql);
		} else {
			$conn->rollbackTrans(); // Rollback transaction
		}
		return $updateRows;
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

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}
		$this->RIDNo->MultiUpdate = $CurrentForm->getValue("u_RIDNo");

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->MultiUpdate = $CurrentForm->getValue("u_PatientName");

		// Check field name 'TiDNo' first before field var 'x_TiDNo'
		$val = $CurrentForm->hasValue("TiDNo") ? $CurrentForm->getValue("TiDNo") : $CurrentForm->getValue("x_TiDNo");
		if (!$this->TiDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TiDNo->Visible = FALSE; // Disable update for API request
			else
				$this->TiDNo->setFormValue($val);
		}
		$this->TiDNo->MultiUpdate = $CurrentForm->getValue("u_TiDNo");

		// Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
		$val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
		if (!$this->EmbryoNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EmbryoNo->Visible = FALSE; // Disable update for API request
			else
				$this->EmbryoNo->setFormValue($val);
		}
		$this->EmbryoNo->MultiUpdate = $CurrentForm->getValue("u_EmbryoNo");

		// Check field name 'Stage' first before field var 'x_Stage'
		$val = $CurrentForm->hasValue("Stage") ? $CurrentForm->getValue("Stage") : $CurrentForm->getValue("x_Stage");
		if (!$this->Stage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Stage->Visible = FALSE; // Disable update for API request
			else
				$this->Stage->setFormValue($val);
		}
		$this->Stage->MultiUpdate = $CurrentForm->getValue("u_Stage");

		// Check field name 'FertilisationDate' first before field var 'x_FertilisationDate'
		$val = $CurrentForm->hasValue("FertilisationDate") ? $CurrentForm->getValue("FertilisationDate") : $CurrentForm->getValue("x_FertilisationDate");
		if (!$this->FertilisationDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FertilisationDate->Visible = FALSE; // Disable update for API request
			else
				$this->FertilisationDate->setFormValue($val);
			$this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
		}
		$this->FertilisationDate->MultiUpdate = $CurrentForm->getValue("u_FertilisationDate");

		// Check field name 'Day' first before field var 'x_Day'
		$val = $CurrentForm->hasValue("Day") ? $CurrentForm->getValue("Day") : $CurrentForm->getValue("x_Day");
		if (!$this->Day->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Day->Visible = FALSE; // Disable update for API request
			else
				$this->Day->setFormValue($val);
		}
		$this->Day->MultiUpdate = $CurrentForm->getValue("u_Day");

		// Check field name 'Grade' first before field var 'x_Grade'
		$val = $CurrentForm->hasValue("Grade") ? $CurrentForm->getValue("Grade") : $CurrentForm->getValue("x_Grade");
		if (!$this->Grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Grade->Visible = FALSE; // Disable update for API request
			else
				$this->Grade->setFormValue($val);
		}
		$this->Grade->MultiUpdate = $CurrentForm->getValue("u_Grade");

		// Check field name 'Incubator' first before field var 'x_Incubator'
		$val = $CurrentForm->hasValue("Incubator") ? $CurrentForm->getValue("Incubator") : $CurrentForm->getValue("x_Incubator");
		if (!$this->Incubator->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incubator->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator->setFormValue($val);
		}
		$this->Incubator->MultiUpdate = $CurrentForm->getValue("u_Incubator");

		// Check field name 'Catheter' first before field var 'x_Catheter'
		$val = $CurrentForm->hasValue("Catheter") ? $CurrentForm->getValue("Catheter") : $CurrentForm->getValue("x_Catheter");
		if (!$this->Catheter->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Catheter->Visible = FALSE; // Disable update for API request
			else
				$this->Catheter->setFormValue($val);
		}
		$this->Catheter->MultiUpdate = $CurrentForm->getValue("u_Catheter");

		// Check field name 'Difficulty' first before field var 'x_Difficulty'
		$val = $CurrentForm->hasValue("Difficulty") ? $CurrentForm->getValue("Difficulty") : $CurrentForm->getValue("x_Difficulty");
		if (!$this->Difficulty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Difficulty->Visible = FALSE; // Disable update for API request
			else
				$this->Difficulty->setFormValue($val);
		}
		$this->Difficulty->MultiUpdate = $CurrentForm->getValue("u_Difficulty");

		// Check field name 'Easy' first before field var 'x_Easy'
		$val = $CurrentForm->hasValue("Easy") ? $CurrentForm->getValue("Easy") : $CurrentForm->getValue("x_Easy");
		if (!$this->Easy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Easy->Visible = FALSE; // Disable update for API request
			else
				$this->Easy->setFormValue($val);
		}
		$this->Easy->MultiUpdate = $CurrentForm->getValue("u_Easy");

		// Check field name 'Comments' first before field var 'x_Comments'
		$val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
		if (!$this->Comments->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Comments->Visible = FALSE; // Disable update for API request
			else
				$this->Comments->setFormValue($val);
		}
		$this->Comments->MultiUpdate = $CurrentForm->getValue("u_Comments");

		// Check field name 'Doctor' first before field var 'x_Doctor'
		$val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
		if (!$this->Doctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Doctor->Visible = FALSE; // Disable update for API request
			else
				$this->Doctor->setFormValue($val);
		}
		$this->Doctor->MultiUpdate = $CurrentForm->getValue("u_Doctor");

		// Check field name 'Embryologist' first before field var 'x_Embryologist'
		$val = $CurrentForm->hasValue("Embryologist") ? $CurrentForm->getValue("Embryologist") : $CurrentForm->getValue("x_Embryologist");
		if (!$this->Embryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Embryologist->Visible = FALSE; // Disable update for API request
			else
				$this->Embryologist->setFormValue($val);
		}
		$this->Embryologist->MultiUpdate = $CurrentForm->getValue("u_Embryologist");

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->TiDNo->CurrentValue = $this->TiDNo->FormValue;
		$this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
		$this->Stage->CurrentValue = $this->Stage->FormValue;
		$this->FertilisationDate->CurrentValue = $this->FertilisationDate->FormValue;
		$this->FertilisationDate->CurrentValue = UnFormatDateTime($this->FertilisationDate->CurrentValue, 0);
		$this->Day->CurrentValue = $this->Day->FormValue;
		$this->Grade->CurrentValue = $this->Grade->FormValue;
		$this->Incubator->CurrentValue = $this->Incubator->FormValue;
		$this->Catheter->CurrentValue = $this->Catheter->FormValue;
		$this->Difficulty->CurrentValue = $this->Difficulty->FormValue;
		$this->Easy->CurrentValue = $this->Easy->FormValue;
		$this->Comments->CurrentValue = $this->Comments->FormValue;
		$this->Doctor->CurrentValue = $this->Doctor->FormValue;
		$this->Embryologist->CurrentValue = $this->Embryologist->FormValue;
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->TiDNo->setDbValue($row['TiDNo']);
		$this->id->setDbValue($row['id']);
		$this->EmbryoNo->setDbValue($row['EmbryoNo']);
		$this->Stage->setDbValue($row['Stage']);
		$this->FertilisationDate->setDbValue($row['FertilisationDate']);
		$this->Day->setDbValue($row['Day']);
		$this->Grade->setDbValue($row['Grade']);
		$this->Incubator->setDbValue($row['Incubator']);
		$this->Catheter->setDbValue($row['Catheter']);
		$this->Difficulty->setDbValue($row['Difficulty']);
		$this->Easy->setDbValue($row['Easy']);
		$this->Comments->setDbValue($row['Comments']);
		$this->Doctor->setDbValue($row['Doctor']);
		$this->Embryologist->setDbValue($row['Embryologist']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['RIDNo'] = NULL;
		$row['PatientName'] = NULL;
		$row['TiDNo'] = NULL;
		$row['id'] = NULL;
		$row['EmbryoNo'] = NULL;
		$row['Stage'] = NULL;
		$row['FertilisationDate'] = NULL;
		$row['Day'] = NULL;
		$row['Grade'] = NULL;
		$row['Incubator'] = NULL;
		$row['Catheter'] = NULL;
		$row['Difficulty'] = NULL;
		$row['Easy'] = NULL;
		$row['Comments'] = NULL;
		$row['Doctor'] = NULL;
		$row['Embryologist'] = NULL;
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
		// RIDNo
		// PatientName
		// TiDNo
		// id
		// EmbryoNo
		// Stage
		// FertilisationDate
		// Day
		// Grade
		// Incubator
		// Catheter
		// Difficulty
		// Easy
		// Comments
		// Doctor
		// Embryologist

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// TiDNo
			$this->TiDNo->ViewValue = $this->TiDNo->CurrentValue;
			$this->TiDNo->ViewValue = FormatNumber($this->TiDNo->ViewValue, 0, -2, -2, -2);
			$this->TiDNo->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// Stage
			$this->Stage->ViewValue = $this->Stage->CurrentValue;
			$this->Stage->ViewCustomAttributes = "";

			// FertilisationDate
			$this->FertilisationDate->ViewValue = $this->FertilisationDate->CurrentValue;
			$this->FertilisationDate->ViewValue = FormatDateTime($this->FertilisationDate->ViewValue, 0);
			$this->FertilisationDate->ViewCustomAttributes = "";

			// Day
			if (strval($this->Day->CurrentValue) <> "") {
				$this->Day->ViewValue = $this->Day->optionCaption($this->Day->CurrentValue);
			} else {
				$this->Day->ViewValue = NULL;
			}
			$this->Day->ViewCustomAttributes = "";

			// Grade
			if (strval($this->Grade->CurrentValue) <> "") {
				$this->Grade->ViewValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
			} else {
				$this->Grade->ViewValue = NULL;
			}
			$this->Grade->ViewCustomAttributes = "";

			// Incubator
			$this->Incubator->ViewValue = $this->Incubator->CurrentValue;
			$this->Incubator->ViewCustomAttributes = "";

			// Catheter
			$this->Catheter->ViewValue = $this->Catheter->CurrentValue;
			$this->Catheter->ViewCustomAttributes = "";

			// Difficulty
			if (strval($this->Difficulty->CurrentValue) <> "") {
				$this->Difficulty->ViewValue = $this->Difficulty->optionCaption($this->Difficulty->CurrentValue);
			} else {
				$this->Difficulty->ViewValue = NULL;
			}
			$this->Difficulty->ViewCustomAttributes = "";

			// Easy
			if (strval($this->Easy->CurrentValue) <> "") {
				$this->Easy->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Easy->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Easy->ViewValue->add($this->Easy->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Easy->ViewValue = NULL;
			}
			$this->Easy->ViewCustomAttributes = "";

			// Comments
			$this->Comments->ViewValue = $this->Comments->CurrentValue;
			$this->Comments->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// Embryologist
			$this->Embryologist->ViewValue = $this->Embryologist->CurrentValue;
			$this->Embryologist->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// TiDNo
			$this->TiDNo->LinkCustomAttributes = "";
			$this->TiDNo->HrefValue = "";
			$this->TiDNo->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// Stage
			$this->Stage->LinkCustomAttributes = "";
			$this->Stage->HrefValue = "";
			$this->Stage->TooltipValue = "";

			// FertilisationDate
			$this->FertilisationDate->LinkCustomAttributes = "";
			$this->FertilisationDate->HrefValue = "";
			$this->FertilisationDate->TooltipValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";
			$this->Day->TooltipValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
			$this->Grade->TooltipValue = "";

			// Incubator
			$this->Incubator->LinkCustomAttributes = "";
			$this->Incubator->HrefValue = "";
			$this->Incubator->TooltipValue = "";

			// Catheter
			$this->Catheter->LinkCustomAttributes = "";
			$this->Catheter->HrefValue = "";
			$this->Catheter->TooltipValue = "";

			// Difficulty
			$this->Difficulty->LinkCustomAttributes = "";
			$this->Difficulty->HrefValue = "";
			$this->Difficulty->TooltipValue = "";

			// Easy
			$this->Easy->LinkCustomAttributes = "";
			$this->Easy->HrefValue = "";
			$this->Easy->TooltipValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";
			$this->Comments->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";

			// Embryologist
			$this->Embryologist->LinkCustomAttributes = "";
			$this->Embryologist->HrefValue = "";
			$this->Embryologist->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			$this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// TiDNo
			$this->TiDNo->EditAttrs["class"] = "form-control";
			$this->TiDNo->EditCustomAttributes = "";
			$this->TiDNo->EditValue = $this->TiDNo->CurrentValue;
			$this->TiDNo->EditValue = FormatNumber($this->TiDNo->EditValue, 0, -2, -2, -2);
			$this->TiDNo->ViewCustomAttributes = "";

			// EmbryoNo
			$this->EmbryoNo->EditAttrs["class"] = "form-control";
			$this->EmbryoNo->EditCustomAttributes = "";
			$this->EmbryoNo->EditValue = $this->EmbryoNo->CurrentValue;
			$this->EmbryoNo->ViewCustomAttributes = "";

			// Stage
			$this->Stage->EditAttrs["class"] = "form-control";
			$this->Stage->EditCustomAttributes = "";
			$this->Stage->EditValue = $this->Stage->CurrentValue;
			$this->Stage->ViewCustomAttributes = "";

			// FertilisationDate
			$this->FertilisationDate->EditAttrs["class"] = "form-control";
			$this->FertilisationDate->EditCustomAttributes = "";
			$this->FertilisationDate->EditValue = $this->FertilisationDate->CurrentValue;
			$this->FertilisationDate->EditValue = FormatDateTime($this->FertilisationDate->EditValue, 0);
			$this->FertilisationDate->ViewCustomAttributes = "";

			// Day
			$this->Day->EditAttrs["class"] = "form-control";
			$this->Day->EditCustomAttributes = "";
			if (strval($this->Day->CurrentValue) <> "") {
				$this->Day->EditValue = $this->Day->optionCaption($this->Day->CurrentValue);
			} else {
				$this->Day->EditValue = NULL;
			}
			$this->Day->ViewCustomAttributes = "";

			// Grade
			$this->Grade->EditAttrs["class"] = "form-control";
			$this->Grade->EditCustomAttributes = "";
			if (strval($this->Grade->CurrentValue) <> "") {
				$this->Grade->EditValue = $this->Grade->optionCaption($this->Grade->CurrentValue);
			} else {
				$this->Grade->EditValue = NULL;
			}
			$this->Grade->ViewCustomAttributes = "";

			// Incubator
			$this->Incubator->EditAttrs["class"] = "form-control";
			$this->Incubator->EditCustomAttributes = "";
			$this->Incubator->EditValue = $this->Incubator->CurrentValue;
			$this->Incubator->ViewCustomAttributes = "";

			// Catheter
			$this->Catheter->EditAttrs["class"] = "form-control";
			$this->Catheter->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Catheter->CurrentValue = HtmlDecode($this->Catheter->CurrentValue);
			$this->Catheter->EditValue = HtmlEncode($this->Catheter->CurrentValue);
			$this->Catheter->PlaceHolder = RemoveHtml($this->Catheter->caption());

			// Difficulty
			$this->Difficulty->EditAttrs["class"] = "form-control";
			$this->Difficulty->EditCustomAttributes = "";
			$this->Difficulty->EditValue = $this->Difficulty->options(TRUE);

			// Easy
			$this->Easy->EditCustomAttributes = "";
			$this->Easy->EditValue = $this->Easy->options(FALSE);

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// Embryologist
			$this->Embryologist->EditAttrs["class"] = "form-control";
			$this->Embryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Embryologist->CurrentValue = HtmlDecode($this->Embryologist->CurrentValue);
			$this->Embryologist->EditValue = HtmlEncode($this->Embryologist->CurrentValue);
			$this->Embryologist->PlaceHolder = RemoveHtml($this->Embryologist->caption());

			// Edit refer script
			// RIDNo

			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// TiDNo
			$this->TiDNo->LinkCustomAttributes = "";
			$this->TiDNo->HrefValue = "";
			$this->TiDNo->TooltipValue = "";

			// EmbryoNo
			$this->EmbryoNo->LinkCustomAttributes = "";
			$this->EmbryoNo->HrefValue = "";
			$this->EmbryoNo->TooltipValue = "";

			// Stage
			$this->Stage->LinkCustomAttributes = "";
			$this->Stage->HrefValue = "";
			$this->Stage->TooltipValue = "";

			// FertilisationDate
			$this->FertilisationDate->LinkCustomAttributes = "";
			$this->FertilisationDate->HrefValue = "";
			$this->FertilisationDate->TooltipValue = "";

			// Day
			$this->Day->LinkCustomAttributes = "";
			$this->Day->HrefValue = "";
			$this->Day->TooltipValue = "";

			// Grade
			$this->Grade->LinkCustomAttributes = "";
			$this->Grade->HrefValue = "";
			$this->Grade->TooltipValue = "";

			// Incubator
			$this->Incubator->LinkCustomAttributes = "";
			$this->Incubator->HrefValue = "";
			$this->Incubator->TooltipValue = "";

			// Catheter
			$this->Catheter->LinkCustomAttributes = "";
			$this->Catheter->HrefValue = "";

			// Difficulty
			$this->Difficulty->LinkCustomAttributes = "";
			$this->Difficulty->HrefValue = "";

			// Easy
			$this->Easy->LinkCustomAttributes = "";
			$this->Easy->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";

			// Embryologist
			$this->Embryologist->LinkCustomAttributes = "";
			$this->Embryologist->HrefValue = "";
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
		$updateCnt = 0;
		if ($this->RIDNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatientName->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TiDNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->EmbryoNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Stage->MultiUpdate == "1")
			$updateCnt++;
		if ($this->FertilisationDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Day->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Grade->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Incubator->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Catheter->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Difficulty->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Easy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Comments->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Doctor->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Embryologist->MultiUpdate == "1")
			$updateCnt++;
		if ($updateCnt == 0) {
			$FormError = $Language->phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->RIDNo->Required) {
			if ($this->RIDNo->MultiUpdate <> "" && !$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if ($this->PatientName->MultiUpdate <> "" && !$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->TiDNo->Required) {
			if ($this->TiDNo->MultiUpdate <> "" && !$this->TiDNo->IsDetailKey && $this->TiDNo->FormValue != NULL && $this->TiDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TiDNo->caption(), $this->TiDNo->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if ($this->id->MultiUpdate <> "" && !$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->EmbryoNo->Required) {
			if ($this->EmbryoNo->MultiUpdate <> "" && !$this->EmbryoNo->IsDetailKey && $this->EmbryoNo->FormValue != NULL && $this->EmbryoNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
			}
		}
		if ($this->Stage->Required) {
			if ($this->Stage->MultiUpdate <> "" && !$this->Stage->IsDetailKey && $this->Stage->FormValue != NULL && $this->Stage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
			}
		}
		if ($this->FertilisationDate->Required) {
			if ($this->FertilisationDate->MultiUpdate <> "" && !$this->FertilisationDate->IsDetailKey && $this->FertilisationDate->FormValue != NULL && $this->FertilisationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FertilisationDate->caption(), $this->FertilisationDate->RequiredErrorMessage));
			}
		}
		if ($this->Day->Required) {
			if ($this->Day->MultiUpdate <> "" && !$this->Day->IsDetailKey && $this->Day->FormValue != NULL && $this->Day->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Day->caption(), $this->Day->RequiredErrorMessage));
			}
		}
		if ($this->Grade->Required) {
			if ($this->Grade->MultiUpdate <> "" && !$this->Grade->IsDetailKey && $this->Grade->FormValue != NULL && $this->Grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Grade->caption(), $this->Grade->RequiredErrorMessage));
			}
		}
		if ($this->Incubator->Required) {
			if ($this->Incubator->MultiUpdate <> "" && !$this->Incubator->IsDetailKey && $this->Incubator->FormValue != NULL && $this->Incubator->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
			}
		}
		if ($this->Catheter->Required) {
			if ($this->Catheter->MultiUpdate <> "" && !$this->Catheter->IsDetailKey && $this->Catheter->FormValue != NULL && $this->Catheter->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Catheter->caption(), $this->Catheter->RequiredErrorMessage));
			}
		}
		if ($this->Difficulty->Required) {
			if ($this->Difficulty->MultiUpdate <> "" && !$this->Difficulty->IsDetailKey && $this->Difficulty->FormValue != NULL && $this->Difficulty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Difficulty->caption(), $this->Difficulty->RequiredErrorMessage));
			}
		}
		if ($this->Easy->Required) {
			if ($this->Easy->MultiUpdate <> "" && $this->Easy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Easy->caption(), $this->Easy->RequiredErrorMessage));
			}
		}
		if ($this->Comments->Required) {
			if ($this->Comments->MultiUpdate <> "" && !$this->Comments->IsDetailKey && $this->Comments->FormValue != NULL && $this->Comments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
			}
		}
		if ($this->Doctor->Required) {
			if ($this->Doctor->MultiUpdate <> "" && !$this->Doctor->IsDetailKey && $this->Doctor->FormValue != NULL && $this->Doctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
			}
		}
		if ($this->Embryologist->Required) {
			if ($this->Embryologist->MultiUpdate <> "" && !$this->Embryologist->IsDetailKey && $this->Embryologist->FormValue != NULL && $this->Embryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Embryologist->caption(), $this->Embryologist->RequiredErrorMessage));
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

			// Catheter
			$this->Catheter->setDbValueDef($rsnew, $this->Catheter->CurrentValue, NULL, $this->Catheter->ReadOnly || $this->Catheter->MultiUpdate <> "1");

			// Difficulty
			$this->Difficulty->setDbValueDef($rsnew, $this->Difficulty->CurrentValue, NULL, $this->Difficulty->ReadOnly || $this->Difficulty->MultiUpdate <> "1");

			// Easy
			$this->Easy->setDbValueDef($rsnew, $this->Easy->CurrentValue, NULL, $this->Easy->ReadOnly || $this->Easy->MultiUpdate <> "1");

			// Comments
			$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, NULL, $this->Comments->ReadOnly || $this->Comments->MultiUpdate <> "1");

			// Doctor
			$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, $this->Doctor->ReadOnly || $this->Doctor->MultiUpdate <> "1");

			// Embryologist
			$this->Embryologist->setDbValueDef($rsnew, $this->Embryologist->CurrentValue, NULL, $this->Embryologist->ReadOnly || $this->Embryologist->MultiUpdate <> "1");

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_etlist.php"), "", $this->TableVar, TRUE);
		$pageId = "update";
		$Breadcrumb->add("update", $pageId, $url);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
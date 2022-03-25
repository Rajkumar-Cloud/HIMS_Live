<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_mas_user_template_addopt extends ivf_mas_user_template
{

	// Page ID
	public $PageID = "addopt";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_mas_user_template';

	// Page object name
	public $PageObjName = "ivf_mas_user_template_addopt";

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

		// Table object (ivf_mas_user_template)
		if (!isset($GLOBALS["ivf_mas_user_template"]) || get_class($GLOBALS["ivf_mas_user_template"]) == PROJECT_NAMESPACE . "ivf_mas_user_template") {
			$GLOBALS["ivf_mas_user_template"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_mas_user_template"];
		}

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'addopt');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_mas_user_template');

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
		global $ivf_mas_user_template;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_mas_user_template);
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

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
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
					$this->terminate(GetUrl("ivf_mas_user_templatelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->TemplateName->setVisibility();
		$this->TemplateType->setVisibility();
		$this->Template->setVisibility();
		$this->created->setVisibility();
		$this->createdDatetime->setVisibility();
		$this->modified->setVisibility();
		$this->modifiedDatetime->setVisibility();
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
		$this->setupLookupOptions($this->TemplateType);
		set_error_handler(PROJECT_NAMESPACE . "ErrorHandler");

		// Set up Breadcrumb
		//$this->setupBreadcrumb(); // Not used

		$this->loadRowValues(); // Load default values

		// Render row
		$this->RowType = ROWTYPE_ADD; // Render add type
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
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->TemplateName->CurrentValue = NULL;
		$this->TemplateName->OldValue = $this->TemplateName->CurrentValue;
		$this->TemplateType->CurrentValue = NULL;
		$this->TemplateType->OldValue = $this->TemplateType->CurrentValue;
		$this->Template->CurrentValue = NULL;
		$this->Template->OldValue = $this->Template->CurrentValue;
		$this->created->CurrentValue = NULL;
		$this->created->OldValue = $this->created->CurrentValue;
		$this->createdDatetime->CurrentValue = NULL;
		$this->createdDatetime->OldValue = $this->createdDatetime->CurrentValue;
		$this->modified->CurrentValue = NULL;
		$this->modified->OldValue = $this->modified->CurrentValue;
		$this->modifiedDatetime->CurrentValue = NULL;
		$this->modifiedDatetime->OldValue = $this->modifiedDatetime->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'TemplateName' first before field var 'x_TemplateName'
		$val = $CurrentForm->hasValue("TemplateName") ? $CurrentForm->getValue("TemplateName") : $CurrentForm->getValue("x_TemplateName");
		if (!$this->TemplateName->IsDetailKey) {
			$this->TemplateName->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'TemplateType' first before field var 'x_TemplateType'
		$val = $CurrentForm->hasValue("TemplateType") ? $CurrentForm->getValue("TemplateType") : $CurrentForm->getValue("x_TemplateType");
		if (!$this->TemplateType->IsDetailKey) {
			$this->TemplateType->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'Template' first before field var 'x_Template'
		$val = $CurrentForm->hasValue("Template") ? $CurrentForm->getValue("Template") : $CurrentForm->getValue("x_Template");
		if (!$this->Template->IsDetailKey) {
			$this->Template->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'created' first before field var 'x_created'
		$val = $CurrentForm->hasValue("created") ? $CurrentForm->getValue("created") : $CurrentForm->getValue("x_created");
		if (!$this->created->IsDetailKey) {
			$this->created->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'createdDatetime' first before field var 'x_createdDatetime'
		$val = $CurrentForm->hasValue("createdDatetime") ? $CurrentForm->getValue("createdDatetime") : $CurrentForm->getValue("x_createdDatetime");
		if (!$this->createdDatetime->IsDetailKey) {
			$this->createdDatetime->setFormValue(ConvertFromUtf8($val));
			$this->createdDatetime->CurrentValue = UnFormatDateTime($this->createdDatetime->CurrentValue, 0);
		}

		// Check field name 'modified' first before field var 'x_modified'
		$val = $CurrentForm->hasValue("modified") ? $CurrentForm->getValue("modified") : $CurrentForm->getValue("x_modified");
		if (!$this->modified->IsDetailKey) {
			$this->modified->setFormValue(ConvertFromUtf8($val));
		}

		// Check field name 'modifiedDatetime' first before field var 'x_modifiedDatetime'
		$val = $CurrentForm->hasValue("modifiedDatetime") ? $CurrentForm->getValue("modifiedDatetime") : $CurrentForm->getValue("x_modifiedDatetime");
		if (!$this->modifiedDatetime->IsDetailKey) {
			$this->modifiedDatetime->setFormValue(ConvertFromUtf8($val));
			$this->modifiedDatetime->CurrentValue = UnFormatDateTime($this->modifiedDatetime->CurrentValue, 0);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->TemplateName->CurrentValue = ConvertToUtf8($this->TemplateName->FormValue);
		$this->TemplateType->CurrentValue = ConvertToUtf8($this->TemplateType->FormValue);
		$this->Template->CurrentValue = ConvertToUtf8($this->Template->FormValue);
		$this->created->CurrentValue = ConvertToUtf8($this->created->FormValue);
		$this->createdDatetime->CurrentValue = ConvertToUtf8($this->createdDatetime->FormValue);
		$this->createdDatetime->CurrentValue = UnFormatDateTime($this->createdDatetime->CurrentValue, 0);
		$this->modified->CurrentValue = ConvertToUtf8($this->modified->FormValue);
		$this->modifiedDatetime->CurrentValue = ConvertToUtf8($this->modifiedDatetime->FormValue);
		$this->modifiedDatetime->CurrentValue = UnFormatDateTime($this->modifiedDatetime->CurrentValue, 0);
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
		$this->TemplateName->setDbValue($row['TemplateName']);
		$this->TemplateType->setDbValue($row['TemplateType']);
		if (array_key_exists('EV__TemplateType', $rs->fields)) {
			$this->TemplateType->VirtualValue = $rs->fields('EV__TemplateType'); // Set up virtual field value
		} else {
			$this->TemplateType->VirtualValue = ""; // Clear value
		}
		$this->Template->setDbValue($row['Template']);
		$this->created->setDbValue($row['created']);
		$this->createdDatetime->setDbValue($row['createdDatetime']);
		$this->modified->setDbValue($row['modified']);
		$this->modifiedDatetime->setDbValue($row['modifiedDatetime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['TemplateName'] = $this->TemplateName->CurrentValue;
		$row['TemplateType'] = $this->TemplateType->CurrentValue;
		$row['Template'] = $this->Template->CurrentValue;
		$row['created'] = $this->created->CurrentValue;
		$row['createdDatetime'] = $this->createdDatetime->CurrentValue;
		$row['modified'] = $this->modified->CurrentValue;
		$row['modifiedDatetime'] = $this->modifiedDatetime->CurrentValue;
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
		// TemplateName
		// TemplateType
		// Template
		// created
		// createdDatetime
		// modified
		// modifiedDatetime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// TemplateName
			$this->TemplateName->ViewValue = $this->TemplateName->CurrentValue;
			$this->TemplateName->ViewCustomAttributes = "";

			// TemplateType
			if ($this->TemplateType->VirtualValue != "") {
				$this->TemplateType->ViewValue = $this->TemplateType->VirtualValue;
			} else {
				$curVal = strval($this->TemplateType->CurrentValue);
				if ($curVal != "") {
					$this->TemplateType->ViewValue = $this->TemplateType->lookupCacheOption($curVal);
					if ($this->TemplateType->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->TemplateType->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->TemplateType->ViewValue = $this->TemplateType->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->TemplateType->ViewValue = $this->TemplateType->CurrentValue;
						}
					}
				} else {
					$this->TemplateType->ViewValue = NULL;
				}
			}
			$this->TemplateType->ViewCustomAttributes = "";

			// Template
			$this->Template->ViewValue = $this->Template->CurrentValue;
			$this->Template->ViewCustomAttributes = "";

			// created
			$this->created->ViewValue = $this->created->CurrentValue;
			$this->created->ViewCustomAttributes = "";

			// createdDatetime
			$this->createdDatetime->ViewValue = $this->createdDatetime->CurrentValue;
			$this->createdDatetime->ViewValue = FormatDateTime($this->createdDatetime->ViewValue, 0);
			$this->createdDatetime->ViewCustomAttributes = "";

			// modified
			$this->modified->ViewValue = $this->modified->CurrentValue;
			$this->modified->ViewCustomAttributes = "";

			// modifiedDatetime
			$this->modifiedDatetime->ViewValue = $this->modifiedDatetime->CurrentValue;
			$this->modifiedDatetime->ViewValue = FormatDateTime($this->modifiedDatetime->ViewValue, 0);
			$this->modifiedDatetime->ViewCustomAttributes = "";

			// TemplateName
			$this->TemplateName->LinkCustomAttributes = "";
			$this->TemplateName->HrefValue = "";
			$this->TemplateName->TooltipValue = "";

			// TemplateType
			$this->TemplateType->LinkCustomAttributes = "";
			$this->TemplateType->HrefValue = "";
			$this->TemplateType->TooltipValue = "";

			// Template
			$this->Template->LinkCustomAttributes = "";
			$this->Template->HrefValue = "";
			$this->Template->TooltipValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";
			$this->created->TooltipValue = "";

			// createdDatetime
			$this->createdDatetime->LinkCustomAttributes = "";
			$this->createdDatetime->HrefValue = "";
			$this->createdDatetime->TooltipValue = "";

			// modified
			$this->modified->LinkCustomAttributes = "";
			$this->modified->HrefValue = "";
			$this->modified->TooltipValue = "";

			// modifiedDatetime
			$this->modifiedDatetime->LinkCustomAttributes = "";
			$this->modifiedDatetime->HrefValue = "";
			$this->modifiedDatetime->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// TemplateName
			$this->TemplateName->EditAttrs["class"] = "form-control";
			$this->TemplateName->EditCustomAttributes = "";
			if (!$this->TemplateName->Raw)
				$this->TemplateName->CurrentValue = HtmlDecode($this->TemplateName->CurrentValue);
			$this->TemplateName->EditValue = HtmlEncode($this->TemplateName->CurrentValue);
			$this->TemplateName->PlaceHolder = RemoveHtml($this->TemplateName->caption());

			// TemplateType
			$this->TemplateType->EditAttrs["class"] = "form-control";
			$this->TemplateType->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateType->CurrentValue));
			if ($curVal != "")
				$this->TemplateType->ViewValue = $this->TemplateType->lookupCacheOption($curVal);
			else
				$this->TemplateType->ViewValue = $this->TemplateType->Lookup !== NULL && is_array($this->TemplateType->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateType->ViewValue !== NULL) { // Load from cache
				$this->TemplateType->EditValue = array_values($this->TemplateType->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateType->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->TemplateType->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->TemplateType->EditValue = $arwrk;
			}

			// Template
			$this->Template->EditAttrs["class"] = "form-control";
			$this->Template->EditCustomAttributes = "";
			$this->Template->EditValue = HtmlEncode($this->Template->CurrentValue);
			$this->Template->PlaceHolder = RemoveHtml($this->Template->caption());

			// created
			$this->created->EditAttrs["class"] = "form-control";
			$this->created->EditCustomAttributes = "";
			$this->created->CurrentValue = CurrentUserName();

			// createdDatetime
			$this->createdDatetime->EditAttrs["class"] = "form-control";
			$this->createdDatetime->EditCustomAttributes = "";
			$this->createdDatetime->CurrentValue = FormatDateTime(CurrentDateTime(), 8);

			// modified
			$this->modified->EditAttrs["class"] = "form-control";
			$this->modified->EditCustomAttributes = "";
			$this->modified->CurrentValue = CurrentUserName();

			// modifiedDatetime
			$this->modifiedDatetime->EditAttrs["class"] = "form-control";
			$this->modifiedDatetime->EditCustomAttributes = "";
			$this->modifiedDatetime->CurrentValue = FormatDateTime(CurrentDateTime(), 8);

			// Add refer script
			// TemplateName

			$this->TemplateName->LinkCustomAttributes = "";
			$this->TemplateName->HrefValue = "";

			// TemplateType
			$this->TemplateType->LinkCustomAttributes = "";
			$this->TemplateType->HrefValue = "";

			// Template
			$this->Template->LinkCustomAttributes = "";
			$this->Template->HrefValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";

			// createdDatetime
			$this->createdDatetime->LinkCustomAttributes = "";
			$this->createdDatetime->HrefValue = "";

			// modified
			$this->modified->LinkCustomAttributes = "";
			$this->modified->HrefValue = "";

			// modifiedDatetime
			$this->modifiedDatetime->LinkCustomAttributes = "";
			$this->modifiedDatetime->HrefValue = "";
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
		if ($this->TemplateName->Required) {
			if (!$this->TemplateName->IsDetailKey && $this->TemplateName->FormValue != NULL && $this->TemplateName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateName->caption(), $this->TemplateName->RequiredErrorMessage));
			}
		}
		if ($this->TemplateType->Required) {
			if (!$this->TemplateType->IsDetailKey && $this->TemplateType->FormValue != NULL && $this->TemplateType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateType->caption(), $this->TemplateType->RequiredErrorMessage));
			}
		}
		if ($this->Template->Required) {
			if (!$this->Template->IsDetailKey && $this->Template->FormValue != NULL && $this->Template->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Template->caption(), $this->Template->RequiredErrorMessage));
			}
		}
		if ($this->created->Required) {
			if (!$this->created->IsDetailKey && $this->created->FormValue != NULL && $this->created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->created->caption(), $this->created->RequiredErrorMessage));
			}
		}
		if ($this->createdDatetime->Required) {
			if (!$this->createdDatetime->IsDetailKey && $this->createdDatetime->FormValue != NULL && $this->createdDatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDatetime->caption(), $this->createdDatetime->RequiredErrorMessage));
			}
		}
		if ($this->modified->Required) {
			if (!$this->modified->IsDetailKey && $this->modified->FormValue != NULL && $this->modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modified->caption(), $this->modified->RequiredErrorMessage));
			}
		}
		if ($this->modifiedDatetime->Required) {
			if (!$this->modifiedDatetime->IsDetailKey && $this->modifiedDatetime->FormValue != NULL && $this->modifiedDatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedDatetime->caption(), $this->modifiedDatetime->RequiredErrorMessage));
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
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// TemplateName
		$this->TemplateName->setDbValueDef($rsnew, $this->TemplateName->CurrentValue, "", FALSE);

		// TemplateType
		$this->TemplateType->setDbValueDef($rsnew, $this->TemplateType->CurrentValue, "", FALSE);

		// Template
		$this->Template->setDbValueDef($rsnew, $this->Template->CurrentValue, NULL, FALSE);

		// created
		$this->created->CurrentValue = CurrentUserName();
		$this->created->setDbValueDef($rsnew, $this->created->CurrentValue, NULL);

		// createdDatetime
		$this->createdDatetime->CurrentValue = CurrentDateTime();
		$this->createdDatetime->setDbValueDef($rsnew, $this->createdDatetime->CurrentValue, NULL);

		// modified
		$this->modified->CurrentValue = CurrentUserName();
		$this->modified->setDbValueDef($rsnew, $this->modified->CurrentValue, NULL);

		// modifiedDatetime
		$this->modifiedDatetime->CurrentValue = CurrentDateTime();
		$this->modifiedDatetime->setDbValueDef($rsnew, $this->modifiedDatetime->CurrentValue, NULL);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_mas_user_templatelist.php"), "", $this->TableVar, TRUE);
		$pageId = "addopt";
		$Breadcrumb->add("addopt", $pageId, $url);
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
				case "x_TemplateType":
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
						case "x_TemplateType":
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
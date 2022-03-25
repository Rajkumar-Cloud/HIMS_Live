<?php
namespace PHPReportMaker12\HIMS___2019;

/**
 * Page class (personaldata)
 */
class personaldata
{

	// Page ID
	public $PageID = 'personaldata';

	// Project ID
	public $ProjectID = "{55283AC9-9E27-42B1-8A30-44C43BC7CEA5}";

	// Page object name
	public $PageObjName = 'personaldata';
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Page headings
	public $Heading = '';
	public $Subheading = '';
	public $PageHeader;
	public $PageFooter;

	// Page heading
	public function pageHeading()
	{
		global $ReportLanguage;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "TableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $ReportLanguage;
		if ($this->Subheading <> "")
			return $this->Subheading;
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
		$pageUrl = CurrentPageName() . "?";
		return $pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}

	// Get failure message
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}

	// Get success message
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}

	// Get warning message
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
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

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") // Fotoer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
	}

	// Validate page request
	public function isPageRequest()
	{
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
		global $Language, $ReportLanguage, $DashboardReport;
		global $UserTable, $UserTableConn;

		// Initialize
		if (!$DashboardReport)
			$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		$ReportLanguage = new ReportLanguage();
		if ($Language === NULL)
			$Language = $ReportLanguage;

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'personaldata');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &GetConnection();

		// User table object (user_login_base)
		if (!isset($UserTable)) {
			$UserTable = new user_login_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ReportLanguage, $EXPORT_REPORT, $ExportFileName, $DashboardReport;

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Close connection
		CloseConnections();

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			header("Location: " . $url);
		}
		exit();
	}

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$Breadcrumb;
		global $ReportLanguage;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		if (!$Security->isLoggedIn()) $Security->autoLogin();
		if (!$Security->isLoggedIn() || $Security->isSysAdmin())
			$this->terminate(GetUrl("login.php"));

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Check token
		if (!$this->validPost()) {
			echo $ReportLanguage->phrase("InvalidPostRequest");
			$this->terminate();
			exit();
		}

		// Create Token
		$this->createToken();
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("personaldata", "PersonalDataTitle", $url, "ew-personal-data", "", TRUE);
		$this->Heading = $Language->phrase("PersonalDataTitle");
		$cmd = Get("cmd", "");
		if (SameText($cmd, "Download")) {
			if ($this->personalDataResult())
				$this->terminate();
		} else if (SameText($cmd, "Delete") && IsPost()) {
			if ($this->deletePersonalData())
				$this->terminate(GetUrl("logout.php?deleted=1"));
		}
	}

	/**
	 * Write personal data as JSON
	 *
	 * @return void
	 */
	protected function personalDataResult()
	{
		global $UserTable, $UserTableConn;
		$result = [];
		$fldNames = ["mail_id"];
		$filter = str_replace("%u", AdjustSql(CurrentUserName(), USER_TABLE_DBID), USER_NAME_FILTER);
		if (!isset($UserTable)) {
			$UserTable = new user_login_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}
		$sql = $UserTable->getSql($filter);
		if (($rs = $UserTableConn->execute($sql)) && !$rs->EOF) {
			$row = &$rs->fields;
			foreach ($fldNames as $fldName)
				if (array_key_exists($fldName, $row))
					$result[$fldName] = $row[$fldName];

			// Call PersonalData_Downloading event
			PersonalData_Downloading($result);
			$personalDataFileName = Get("_personaldatafilename", "personaldata.json");
			AddHeader("Content-Disposition", "attachment; filename=\"" . $personalDataFileName . "\"");
			WriteJson($result);
			return TRUE;
		} else {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			return FALSE;
		}
	}

	/**
	 * Delete personal data
	 *
	 * @return boolean
	 */
	protected function deletePersonalData()
	{
		global $UserTable, $UserTableConn, $Language;
		$filter = str_replace("%u", AdjustSql(CurrentUserName(), USER_TABLE_DBID), USER_NAME_FILTER);
		if (!isset($UserTable)) {
			$UserTable = new user_login_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}
		$sql = $UserTable->getSql($filter);
		$pwd = Post("password", "");
		if (($rs = $UserTableConn->execute($sql)) && !$rs->EOF) {
			$row = &$rs->fields;
			if (ComparePassword($row[LOGIN_PASSWORD_FIELD_NAME], $pwd)) {
				if (DELETE_UPLOADED_FILES) // Delete old files
					$UserTable->deleteUploadedFiles($row);
				if ($UserTable->delete($row)) {

					// Call PersonalData_Deleted event
					PersonalData_Deleted($row);
					return TRUE;
				}
				$this->setFailureMessage($Language->phrase("PersonalDataDeleteFailure"));
				return FALSE;
			} else {
				$this->setFailureMessage($Language->phrase("InvalidPassword"));
				return FALSE;
			}
		} else {
			$this->setFailureMessage($Language->phrase("NoRecord"));
			return FALSE;
		}
	}
}
?>
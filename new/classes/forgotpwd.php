<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class forgotpwd extends user_login
{

	// Page ID
	public $PageID = "forgotpwd";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Page object name
	public $PageObjName = "forgotpwd";

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

		// Table object (user_login)
		if (!isset($GLOBALS["user_login"]) || get_class($GLOBALS["user_login"]) == PROJECT_NAMESPACE . "user_login") {
			$GLOBALS["user_login"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["user_login"];
		}
		if (!isset($GLOBALS["user_login"]))
			$GLOBALS["user_login"] = &$this;

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'forgotpwd');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url];
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
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

	// Reset Captcha
	protected function resetCaptcha()
	{
		$_SESSION[SESSION_CAPTCHA_CODE] = Random();
	}
	public $Email = "";
	public $IsModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$UserTable, $FormError, $Breadcrumb, $SkipHeaderFooter;
		$this->OffsetColumnClass = ""; // Override user table

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
		} else {
			$Security = new AdvancedSecurity();
		}
		$this->CurrentAction = Param("action"); // Set up current action

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

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$Breadcrumb = new Breadcrumb();
		$Breadcrumb->add("forgotpwd", "ResetPwd", CurrentUrl(), "", "", TRUE);
		$this->Heading = $Language->phrase("ResetPwd");
		$postBack = IsPost();
		$validEmail = FALSE;
		$action = "";
		$userName = "";
		$activateCode = "";
		$filter = "";
		if ($postBack) {

			// Setup variables
			$this->Email = Post("email");
			$validEmail = $this->validateForm($this->Email);
			if ($validEmail) {
				$action = "reset"; // Prompt user to change password
			} else {
				$this->setFailureMessage($FormError);
			}

			// Set up filter (WHERE Clause)
			$emailFld = @$UserTable->fields[Config("USER_EMAIL_FIELD_NAME")];
			if ($emailFld && $emailFld->isEncrypt()) // If encrypted, need to loop all records (to be improved)
				$filter = "";
			else
				$filter = GetUserFilter(Config("USER_EMAIL_FIELD_NAME"), $this->Email);

		// Handle email activation
		} elseif (Get("action") != "") {
			$action = Get("action");
			$userName = Get("user");
			$activateCode = Get("code");
			if ($userName != Decrypt($activateCode) || !SameText($action, "reset")) { // Email activation
				if ($this->getFailureMessage() == "")
					$this->setFailureMessage($Language->phrase("ActivateFailed")); // Set activate failed message
				$this->terminate("login.php"); // Go to login page
			}
			if (SameText($action, "reset"))
				$action = "resetpassword";
			$filter = GetUserFilter(Config("LOGIN_USERNAME_FIELD_NAME"), $userName);
		}

		// CAPTCHA checking
		if (IsPost()) {
			Captcha()->Response = Post("captcha");
			if (!Captcha()->validate()) { // CAPTCHA unmatched
				if ($this->getFailureMessage() == "")
					$this->setFailureMessage($Language->phrase("EnterValidateCode")); // Set message
				$validEmail = FALSE;
				$action = "";
			}
		}
		if (!$validEmail) {
			$this->resetCaptcha();
		}
		if ($action != "") {
			$emailSent = FALSE;
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			if ($rsuser = Conn($UserTable->Dbid)->execute($sql)) {
				$validEmail = FALSE;
				while (!$rsuser->EOF) {
					$rsold = $rsuser->fields;
					if ($action == "resetpassword") // Check username if email activation
						$validEmail = SameString($userName, GetUserInfo(Config("LOGIN_USERNAME_FIELD_NAME"), $rsold));
					else
						$validEmail = SameText($this->Email, GetUserInfo(Config("USER_EMAIL_FIELD_NAME"), $rsold));
					if ($validEmail) {

						// Call User Recover Password event
						$validEmail = $this->User_RecoverPassword($rsold);
						if ($validEmail) {
							$userName = GetUserInfo(Config("LOGIN_USERNAME_FIELD_NAME"), $rsold);
							$password = GetUserInfo(Config("LOGIN_PASSWORD_FIELD_NAME"), $rsold);
						}
					}
					if ($validEmail)
						break;
					else
						$rsuser->moveNext();
				}
				$rsuser->close();
				if ($validEmail) {
					if (SameText($action, "resetpassword")) { // Reset password
						$_SESSION[SESSION_USER_PROFILE_USER_NAME] = $userName; // Save login user name
						$_SESSION[SESSION_STATUS] = "passwordreset";
						$this->terminate("changepwd.php");
					} else {
						$email = new Email();
						$email->load(Config("EMAIL_RESET_PASSWORD_TEMPLATE"));
						$activateLink = FullUrl("", "resetpwd") . "?action=reset";
						$activateLink .= "&user=" . rawurlencode($userName);
						$activateLink .= "&code=" . Encrypt($userName);
						$email->replaceContent('<!--$ActivateLink-->', $activateLink);
						$email->replaceSender(Config("SENDER_EMAIL")); // Replace Sender
						$email->replaceRecipient($this->Email); // Replace Recipient
						$email->replaceContent('<!--$UserName-->', $userName);
						$args = [];
						$args["rs"] = &$rsold;
						if ($this->Email_Sending($email, $args))
							$emailSent = $email->send();
					}
				}
			}
			if ($validEmail && !$emailSent)
				$this->setFailureMessage($email->SendErrDescription); // Set up error message
			$this->setSuccessMessage($Language->phrase("ForgotPasswordResponse")); // Set up success message
			$this->terminate("login.php"); // Return to login page
		}
	}

	// Validate form
	protected function validateForm($email)
	{
		global $FormError, $Language;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;
		if ($email == "") {
			AddMessage($FormError, $Language->phrase("EnterValidEmail"));
		}
		if (!CheckEmail($email)) {
			AddMessage($FormError, $Language->phrase("EnterValidEmail"));
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form Custom Validate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
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
	// $type = ''|'success'|'failure'
	function Message_Showing(&$msg, $type) {

		// Example:
		//if ($type == 'success') $msg = "your success message";

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

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}

	// User RecoverPassword event
	function User_RecoverPassword(&$rs) {

		// Return FALSE to abort
		return TRUE;
	}
} // End class
?>
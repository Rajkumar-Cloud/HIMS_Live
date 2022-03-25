<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ResetPassword extends UserLogin
{
    use MessagesTrait;

    // Page ID
    public $PageID = "reset_password";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Page object name
    public $PageObjName = "ResetPassword";

    // Rendering View
    public $RenderingView = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
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
        $url = ScriptName() . "?";
        return $url;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;
        global $UserTable;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (user_login)
        if (!isset($GLOBALS["user_login"]) || get_class($GLOBALS["user_login"]) == PROJECT_NAMESPACE . "user_login") {
            $GLOBALS["user_login"] = &$this;
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        } else { // Check if response is JSON
            if (StartsString("application/json", $Response->getHeaderLine("Content-type")) && $Response->getBody()->getSize()) { // With JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => $url];
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Reset Captcha
    protected function resetCaptcha()
    {
        $sessionName = Captcha()->getSessionName();
        $_SESSION[$sessionName] = Random();
    }
    public $Email;
    public $IsModal = false;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $UserTable, $Breadcrumb, $SkipHeaderFooter;
        $this->OffsetColumnClass = ""; // Override user table

        // Create Email field object (used by validation only)
        $this->Email = new DbField("user_login", "user_login", "email", "email", "email", "", 202, 255, 0, false, "", false, false, false);
        $this->Email->EditAttrs->appendClass("form-control ew-control");

        // Is modal
        $this->IsModal = Param("modal") == "1";
        $this->CurrentAction = Param("action"); // Set up current action

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $Breadcrumb = new Breadcrumb("index");
        $Breadcrumb->add("reset_password", "ResetPwd", CurrentUrl(), "", "", true);
        $this->Heading = $Language->phrase("ResetPwd");
        $postBack = IsPost();
        $validEmail = false;
        $action = "";
        $userName = "";
        $activateCode = "";
        $filter = "";
        if ($postBack) {
            // Setup variables
            $this->Email->setFormValue(Post($this->Email->FieldVar));
            $validEmail = $this->validateForm();
            if ($validEmail) {
                $action = "reset"; // Prompt user to change password
            }

            // Set up filter (WHERE Clause)
            $emailFld = @$UserTable->Fields[Config("USER_EMAIL_FIELD_NAME")];
            if ($emailFld && $emailFld->isEncrypt()) { // If encrypted, need to loop all records (to be improved)
                $filter = "";
            } else {
                $filter = GetUserFilter(Config("USER_EMAIL_FIELD_NAME"), $this->Email->CurrentValue);
            }

        // Handle email activation
        } elseif (Get("action") != "") {
            $action = Get("action");
            $userName = Get("user");
            $activateCode = Get("code");
            if ($userName != Decrypt($activateCode) || !SameText($action, "reset")) { // Email activation
                if ($this->getFailureMessage() == "") {
                    $this->setFailureMessage($Language->phrase("ActivateFailed")); // Set activate failed message
                }
                $this->terminate("login"); // Go to login page
                return;
            }
            if (SameText($action, "reset")) {
                $action = "resetpassword";
            }
            $filter = GetUserFilter(Config("LOGIN_USERNAME_FIELD_NAME"), $userName);
        }

        // CAPTCHA checking
        if (IsPost()) {
            $captcha = Captcha();
            $captcha->Response = Post($captcha->ResponseField);
            if (!$captcha->validate()) { // CAPTCHA unmatched
                if ($captcha->getFailureMessage() == "") {
                    $captcha->setDefaultFailureMessage();
                }
                $validEmail = false;
                $action = "";
            }
        }
        if (!$validEmail) {
            $this->resetCaptcha();
        }
        if ($action != "") {
            $emailSent = false;
            $this->CurrentFilter = $filter;
            $sql = $this->getCurrentSql();
            if ($rsuser = Conn($UserTable->Dbid)->executeQuery($sql)) {
                $validEmail = false;
                while ($rsold = $rsuser->fetch(\PDO::FETCH_ASSOC)) {
                    if ($action == "resetpassword") // Check username if email activation
                        $validEmail = SameString($userName, GetUserInfo(Config("LOGIN_USERNAME_FIELD_NAME"), $rsold));
                    else
                        $validEmail = SameText($this->Email->CurrentValue, GetUserInfo(Config("USER_EMAIL_FIELD_NAME"), $rsold));
                    if ($validEmail) {
                        // Call User Recover Password event
                        $validEmail = $this->userRecoverPassword($rsold);
                        if ($validEmail) {
                            $userName = GetUserInfo(Config("LOGIN_USERNAME_FIELD_NAME"), $rsold);
                            $password = GetUserInfo(Config("LOGIN_PASSWORD_FIELD_NAME"), $rsold);
                        }
                    }
                    if ($validEmail) {
                        break;
                    }
                }
                $rsuser->closeCursor();
                if ($validEmail) {
                    if (SameText($action, "resetpassword")) { // Reset password
                        $_SESSION[SESSION_USER_PROFILE_USER_NAME] = $userName; // Save login user name
                        $_SESSION[SESSION_STATUS] = "passwordreset";
                        $this->terminate("changepassword");
                        return;
                    } else {
                        $email = new Email();
                        $email->load(Config("EMAIL_RESET_PASSWORD_TEMPLATE"));
                        $activateLink = FullUrl("", "resetpwd") . "?action=reset";
                        $activateLink .= "&user=" . rawurlencode($userName);
                        $activateLink .= "&code=" . Encrypt($userName);
                        $email->replaceContent('<!--$ActivateLink-->', $activateLink);
                        $email->replaceSender(Config("SENDER_EMAIL")); // Replace Sender
                        $email->replaceRecipient($this->Email->CurrentValue); // Replace Recipient
                        $email->replaceContent('<!--$UserName-->', $userName);
                        $args = [];
                        $args["rs"] = &$rsold;
                        if ($this->emailSending($email, $args)) {
                            $emailSent = $email->send();
                        }
                    }
                }
            }
            if ($validEmail && !$emailSent) {
                $this->setFailureMessage($email->SendErrDescription); // Set up error message
            }
            $this->setSuccessMessage($Language->phrase("ResetPasswordResponse")); // Set up success message
            $this->terminate("login"); // Return to login page
            return;
        }

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Visible", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        $validateForm = true;
        if (EmptyValue($this->Email->CurrentValue)) {
            $this->Email->addErrorMessage(str_replace("%s", $Language->phrase("Email"), $Language->phrase("EnterRequiredField")));
            $validateForm = false;
        }
        if (!CheckEmail($this->Email->CurrentValue)) {
            $this->Email->addErrorMessage($Language->phrase("IncorrectEmail"));
            $validateForm = false;
        }

        // Call Form Custom Validate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'
    public function messageShowing(&$msg, $type)
    {
        // Example:
        //if ($type == 'success') $msg = "your success message";
    }

    // Page Render event
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
    }

    // User RecoverPassword event
    public function userRecoverPassword(&$rs)
    {
        // Return false to abort
        return true;
    }
}

<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class UserLoginDelete extends UserLogin
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'user_login';

    // Page object name
    public $PageObjName = "UserLoginDelete";

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
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
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
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
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
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
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

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'user_login');
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
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("user_login"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
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
            SaveDebugMessage();
            Redirect(GetUrl($url));
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
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
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
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
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
    }
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $TotalRecords = 0;
    public $RecordCount;
    public $RecKeys = [];
    public $StartRowCount = 1;
    public $RowCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
        $this->User_Name->setVisibility();
        $this->mail_id->setVisibility();
        $this->mobile_no->setVisibility();
        $this->_password->setVisibility();
        $this->email_verified->setVisibility();
        $this->ReportTo->setVisibility();
        $this->_UserLevel->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->profilefield->setVisibility();
        $this->_UserID->setVisibility();
        $this->GroupID->setVisibility();
        $this->HospID->setVisibility();
        $this->PharID->setVisibility();
        $this->StoreID->setVisibility();
        $this->OTP->setVisibility();
        $this->_LoginType->setVisibility();
        $this->BranchId->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->User_Name);
        $this->setupLookupOptions($this->_UserLevel);
        $this->setupLookupOptions($this->HospID);
        $this->setupLookupOptions($this->PharID);
        $this->setupLookupOptions($this->StoreID);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("UserLoginList"); // Prevent SQL injection, return to list
            return;
        }

        // Set up filter (WHERE Clause)
        $this->CurrentFilter = $filter;

        // Get action
        if (IsApi()) {
            $this->CurrentAction = "delete"; // Delete record directly
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action");
        } elseif (Get("action") == "1") {
            $this->CurrentAction = "delete"; // Delete record directly
        } else {
            $this->CurrentAction = "show"; // Display record
        }
        if ($this->isDelete()) {
            $this->SendEmail = true; // Send email on delete success
            if ($this->deleteRows()) { // Delete rows
                if ($this->getSuccessMessage() == "") {
                    $this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
                }
                if (IsApi()) {
                    $this->terminate(true);
                    return;
                } else {
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
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
            if ($this->Recordset = $this->loadRecordset()) {
                $this->TotalRecords = $this->Recordset->recordCount(); // Get record count
            }
            if ($this->TotalRecords <= 0) { // No record found, exit
                if ($this->Recordset) {
                    $this->Recordset->close();
                }
                $this->terminate("UserLoginList"); // Return to list
                return;
            }
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

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->User_Name->setDbValue($row['User_Name']);
        $this->mail_id->setDbValue($row['mail_id']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->_password->setDbValue($row['password']);
        $this->email_verified->setDbValue($row['email_verified']);
        $this->ReportTo->setDbValue($row['ReportTo']);
        $this->_UserLevel->setDbValue($row['UserLevel']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->profilefield->setDbValue($row['profilefield']);
        $this->_UserID->setDbValue($row['UserID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PharID->setDbValue($row['PharID']);
        $this->StoreID->setDbValue($row['StoreID']);
        $this->OTP->setDbValue($row['OTP']);
        $this->_LoginType->setDbValue($row['LoginType']);
        $this->BranchId->setDbValue($row['BranchId']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['User_Name'] = null;
        $row['mail_id'] = null;
        $row['mobile_no'] = null;
        $row['password'] = null;
        $row['email_verified'] = null;
        $row['ReportTo'] = null;
        $row['UserLevel'] = null;
        $row['CreatedDateTime'] = null;
        $row['profilefield'] = null;
        $row['UserID'] = null;
        $row['GroupID'] = null;
        $row['HospID'] = null;
        $row['PharID'] = null;
        $row['StoreID'] = null;
        $row['OTP'] = null;
        $row['LoginType'] = null;
        $row['BranchId'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // User_Name

        // mail_id

        // mobile_no

        // password

        // email_verified

        // ReportTo

        // UserLevel

        // CreatedDateTime

        // profilefield

        // UserID

        // GroupID

        // HospID

        // PharID

        // StoreID

        // OTP

        // LoginType

        // BranchId
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // User_Name
            $this->User_Name->ViewValue = $this->User_Name->CurrentValue;
            $curVal = trim(strval($this->User_Name->CurrentValue));
            if ($curVal != "") {
                $this->User_Name->ViewValue = $this->User_Name->lookupCacheOption($curVal);
                if ($this->User_Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->User_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->User_Name->Lookup->renderViewRow($rswrk[0]);
                        $this->User_Name->ViewValue = $this->User_Name->displayValue($arwrk);
                    } else {
                        $this->User_Name->ViewValue = $this->User_Name->CurrentValue;
                    }
                }
            } else {
                $this->User_Name->ViewValue = null;
            }
            $this->User_Name->ViewCustomAttributes = "";

            // mail_id
            $this->mail_id->ViewValue = $this->mail_id->CurrentValue;
            $this->mail_id->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // password
            $this->_password->ViewValue = $Language->phrase("PasswordMask");
            $this->_password->ViewCustomAttributes = "";

            // email_verified
            if (strval($this->email_verified->CurrentValue) != "") {
                $this->email_verified->ViewValue = $this->email_verified->optionCaption($this->email_verified->CurrentValue);
            } else {
                $this->email_verified->ViewValue = null;
            }
            $this->email_verified->ViewCustomAttributes = "";

            // ReportTo
            $this->ReportTo->ViewValue = $this->ReportTo->CurrentValue;
            $this->ReportTo->ViewValue = FormatNumber($this->ReportTo->ViewValue, 0, -2, -2, -2);
            $this->ReportTo->ViewCustomAttributes = "";

            // UserLevel
            if ($Security->canAdmin()) { // System admin
                $curVal = trim(strval($this->_UserLevel->CurrentValue));
                if ($curVal != "") {
                    $this->_UserLevel->ViewValue = $this->_UserLevel->lookupCacheOption($curVal);
                    if ($this->_UserLevel->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->_UserLevel->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->_UserLevel->Lookup->renderViewRow($rswrk[0]);
                            $this->_UserLevel->ViewValue = $this->_UserLevel->displayValue($arwrk);
                        } else {
                            $this->_UserLevel->ViewValue = $this->_UserLevel->CurrentValue;
                        }
                    }
                } else {
                    $this->_UserLevel->ViewValue = null;
                }
            } else {
                $this->_UserLevel->ViewValue = $Language->phrase("PasswordMask");
            }
            $this->_UserLevel->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // profilefield
            $this->profilefield->ViewValue = $this->profilefield->CurrentValue;
            $this->profilefield->ViewCustomAttributes = "";

            // UserID
            $this->_UserID->ViewValue = $this->_UserID->CurrentValue;
            $this->_UserID->ViewValue = FormatNumber($this->_UserID->ViewValue, 0, -2, -2, -2);
            $this->_UserID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // HospID
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
                if ($this->HospID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                        $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                    } else {
                        $this->HospID->ViewValue = $this->HospID->CurrentValue;
                    }
                }
            } else {
                $this->HospID->ViewValue = null;
            }
            $this->HospID->ViewCustomAttributes = "";

            // PharID
            $curVal = trim(strval($this->PharID->CurrentValue));
            if ($curVal != "") {
                $this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
                if ($this->PharID->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->PharID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->PharID->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->PharID->Lookup->renderViewRow($row);
                            $this->PharID->ViewValue->add($this->PharID->displayValue($arwrk));
                        }
                    } else {
                        $this->PharID->ViewValue = $this->PharID->CurrentValue;
                    }
                }
            } else {
                $this->PharID->ViewValue = null;
            }
            $this->PharID->ViewCustomAttributes = "";

            // StoreID
            $curVal = trim(strval($this->StoreID->CurrentValue));
            if ($curVal != "") {
                $this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
                if ($this->StoreID->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->StoreID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->StoreID->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->StoreID->Lookup->renderViewRow($row);
                            $this->StoreID->ViewValue->add($this->StoreID->displayValue($arwrk));
                        }
                    } else {
                        $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
                    }
                }
            } else {
                $this->StoreID->ViewValue = null;
            }
            $this->StoreID->ViewCustomAttributes = "";

            // OTP
            $this->OTP->ViewValue = $this->OTP->CurrentValue;
            $this->OTP->ViewCustomAttributes = "";

            // LoginType
            $this->_LoginType->ViewValue = $this->_LoginType->CurrentValue;
            $this->_LoginType->ViewValue = FormatNumber($this->_LoginType->ViewValue, 0, -2, -2, -2);
            $this->_LoginType->ViewCustomAttributes = "";

            // BranchId
            $this->BranchId->ViewValue = $this->BranchId->CurrentValue;
            $this->BranchId->ViewValue = FormatNumber($this->BranchId->ViewValue, 0, -2, -2, -2);
            $this->BranchId->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // User_Name
            $this->User_Name->LinkCustomAttributes = "";
            $this->User_Name->HrefValue = "";
            $this->User_Name->TooltipValue = "";

            // mail_id
            $this->mail_id->LinkCustomAttributes = "";
            $this->mail_id->HrefValue = "";
            $this->mail_id->TooltipValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";

            // password
            $this->_password->LinkCustomAttributes = "";
            $this->_password->HrefValue = "";
            $this->_password->TooltipValue = "";

            // email_verified
            $this->email_verified->LinkCustomAttributes = "";
            $this->email_verified->HrefValue = "";
            $this->email_verified->TooltipValue = "";

            // ReportTo
            $this->ReportTo->LinkCustomAttributes = "";
            $this->ReportTo->HrefValue = "";
            $this->ReportTo->TooltipValue = "";

            // UserLevel
            $this->_UserLevel->LinkCustomAttributes = "";
            $this->_UserLevel->HrefValue = "";
            $this->_UserLevel->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // profilefield
            $this->profilefield->LinkCustomAttributes = "";
            $this->profilefield->HrefValue = "";
            $this->profilefield->TooltipValue = "";

            // UserID
            $this->_UserID->LinkCustomAttributes = "";
            $this->_UserID->HrefValue = "";
            $this->_UserID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
            $this->PharID->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";

            // OTP
            $this->OTP->LinkCustomAttributes = "";
            $this->OTP->HrefValue = "";
            $this->OTP->TooltipValue = "";

            // LoginType
            $this->_LoginType->LinkCustomAttributes = "";
            $this->_LoginType->HrefValue = "";
            $this->_LoginType->TooltipValue = "";

            // BranchId
            $this->BranchId->LinkCustomAttributes = "";
            $this->BranchId->HrefValue = "";
            $this->BranchId->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }
        $conn->beginTransaction();

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
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
            $conn->commit(); // Commit the changes
        } else {
            $conn->rollback(); // Rollback changes
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("UserLoginList"), "", $this->TableVar, true);
        $pageId = "delete";
        $Breadcrumb->add("delete", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                case "x_User_Name":
                    break;
                case "x_email_verified":
                    break;
                case "x__UserLevel":
                    break;
                case "x_HospID":
                    break;
                case "x_PharID":
                    break;
                case "x_StoreID":
                    break;
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
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
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
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
}

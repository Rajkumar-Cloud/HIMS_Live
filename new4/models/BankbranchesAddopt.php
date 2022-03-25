<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class BankbranchesAddopt extends Bankbranches
{
    use MessagesTrait;

    // Page ID
    public $PageID = "addopt";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'bankbranches';

    // Page object name
    public $PageObjName = "BankbranchesAddopt";

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

        // Table object (bankbranches)
        if (!isset($GLOBALS["bankbranches"]) || get_class($GLOBALS["bankbranches"]) == PROJECT_NAMESPACE . "bankbranches") {
            $GLOBALS["bankbranches"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'bankbranches');
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
                $doc = new $class(Container("bankbranches"));
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

    // Lookup data
    public function lookup()
    {
        global $Language, $Security;

        // Get lookup object
        $fieldName = Post("field");
        $lookup = $this->Fields[$fieldName]->Lookup;

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
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
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
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = Post("v" . $i, "");
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        $lookup->toJson($this); // Use settings from current page
    }
    public $IsModal = false;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->Visible = false;
        $this->Branch_Name->setVisibility();
        $this->Street_Address->setVisibility();
        $this->City->setVisibility();
        $this->State->setVisibility();
        $this->Zipcode->setVisibility();
        $this->Phone_Number->setVisibility();
        $this->AccountNo->setVisibility();
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

        // Set up Breadcrumb
        //$this->setupBreadcrumb(); // Not used
        $this->loadRowValues(); // Load default values

        // Render row
        $this->RowType = ROWTYPE_ADD; // Render add type
        $this->resetAttributes();
        $this->renderRow();

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

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->Branch_Name->CurrentValue = null;
        $this->Branch_Name->OldValue = $this->Branch_Name->CurrentValue;
        $this->Street_Address->CurrentValue = null;
        $this->Street_Address->OldValue = $this->Street_Address->CurrentValue;
        $this->City->CurrentValue = null;
        $this->City->OldValue = $this->City->CurrentValue;
        $this->State->CurrentValue = null;
        $this->State->OldValue = $this->State->CurrentValue;
        $this->Zipcode->CurrentValue = null;
        $this->Zipcode->OldValue = $this->Zipcode->CurrentValue;
        $this->Phone_Number->CurrentValue = null;
        $this->Phone_Number->OldValue = $this->Phone_Number->CurrentValue;
        $this->AccountNo->CurrentValue = null;
        $this->AccountNo->OldValue = $this->AccountNo->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Branch_Name' first before field var 'x_Branch_Name'
        $val = $CurrentForm->hasValue("Branch_Name") ? $CurrentForm->getValue("Branch_Name") : $CurrentForm->getValue("x_Branch_Name");
        if (!$this->Branch_Name->IsDetailKey) {
            $this->Branch_Name->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Street_Address' first before field var 'x_Street_Address'
        $val = $CurrentForm->hasValue("Street_Address") ? $CurrentForm->getValue("Street_Address") : $CurrentForm->getValue("x_Street_Address");
        if (!$this->Street_Address->IsDetailKey) {
            $this->Street_Address->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'City' first before field var 'x_City'
        $val = $CurrentForm->hasValue("City") ? $CurrentForm->getValue("City") : $CurrentForm->getValue("x_City");
        if (!$this->City->IsDetailKey) {
            $this->City->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'State' first before field var 'x_State'
        $val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
        if (!$this->State->IsDetailKey) {
            $this->State->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Zipcode' first before field var 'x_Zipcode'
        $val = $CurrentForm->hasValue("Zipcode") ? $CurrentForm->getValue("Zipcode") : $CurrentForm->getValue("x_Zipcode");
        if (!$this->Zipcode->IsDetailKey) {
            $this->Zipcode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Phone_Number' first before field var 'x_Phone_Number'
        $val = $CurrentForm->hasValue("Phone_Number") ? $CurrentForm->getValue("Phone_Number") : $CurrentForm->getValue("x_Phone_Number");
        if (!$this->Phone_Number->IsDetailKey) {
            $this->Phone_Number->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'AccountNo' first before field var 'x_AccountNo'
        $val = $CurrentForm->hasValue("AccountNo") ? $CurrentForm->getValue("AccountNo") : $CurrentForm->getValue("x_AccountNo");
        if (!$this->AccountNo->IsDetailKey) {
            $this->AccountNo->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Branch_Name->CurrentValue = ConvertToUtf8($this->Branch_Name->FormValue);
        $this->Street_Address->CurrentValue = ConvertToUtf8($this->Street_Address->FormValue);
        $this->City->CurrentValue = ConvertToUtf8($this->City->FormValue);
        $this->State->CurrentValue = ConvertToUtf8($this->State->FormValue);
        $this->Zipcode->CurrentValue = ConvertToUtf8($this->Zipcode->FormValue);
        $this->Phone_Number->CurrentValue = ConvertToUtf8($this->Phone_Number->FormValue);
        $this->AccountNo->CurrentValue = ConvertToUtf8($this->AccountNo->FormValue);
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
        $this->Branch_Name->setDbValue($row['Branch_Name']);
        $this->Street_Address->setDbValue($row['Street_Address']);
        $this->City->setDbValue($row['City']);
        $this->State->setDbValue($row['State']);
        $this->Zipcode->setDbValue($row['Zipcode']);
        $this->Phone_Number->setDbValue($row['Phone_Number']);
        $this->AccountNo->setDbValue($row['AccountNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Branch_Name'] = $this->Branch_Name->CurrentValue;
        $row['Street_Address'] = $this->Street_Address->CurrentValue;
        $row['City'] = $this->City->CurrentValue;
        $row['State'] = $this->State->CurrentValue;
        $row['Zipcode'] = $this->Zipcode->CurrentValue;
        $row['Phone_Number'] = $this->Phone_Number->CurrentValue;
        $row['AccountNo'] = $this->AccountNo->CurrentValue;
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

        // Branch_Name

        // Street_Address

        // City

        // State

        // Zipcode

        // Phone_Number

        // AccountNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Branch_Name
            $this->Branch_Name->ViewValue = $this->Branch_Name->CurrentValue;
            $this->Branch_Name->ViewCustomAttributes = "";

            // Street_Address
            $this->Street_Address->ViewValue = $this->Street_Address->CurrentValue;
            $this->Street_Address->ViewCustomAttributes = "";

            // City
            $this->City->ViewValue = $this->City->CurrentValue;
            $this->City->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Zipcode
            $this->Zipcode->ViewValue = $this->Zipcode->CurrentValue;
            $this->Zipcode->ViewCustomAttributes = "";

            // Phone_Number
            $this->Phone_Number->ViewValue = $this->Phone_Number->CurrentValue;
            $this->Phone_Number->ViewCustomAttributes = "";

            // AccountNo
            $this->AccountNo->ViewValue = $this->AccountNo->CurrentValue;
            $this->AccountNo->ViewCustomAttributes = "";

            // Branch_Name
            $this->Branch_Name->LinkCustomAttributes = "";
            $this->Branch_Name->HrefValue = "";
            $this->Branch_Name->TooltipValue = "";

            // Street_Address
            $this->Street_Address->LinkCustomAttributes = "";
            $this->Street_Address->HrefValue = "";
            $this->Street_Address->TooltipValue = "";

            // City
            $this->City->LinkCustomAttributes = "";
            $this->City->HrefValue = "";
            $this->City->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Zipcode
            $this->Zipcode->LinkCustomAttributes = "";
            $this->Zipcode->HrefValue = "";
            $this->Zipcode->TooltipValue = "";

            // Phone_Number
            $this->Phone_Number->LinkCustomAttributes = "";
            $this->Phone_Number->HrefValue = "";
            $this->Phone_Number->TooltipValue = "";

            // AccountNo
            $this->AccountNo->LinkCustomAttributes = "";
            $this->AccountNo->HrefValue = "";
            $this->AccountNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Branch_Name
            $this->Branch_Name->EditAttrs["class"] = "form-control";
            $this->Branch_Name->EditCustomAttributes = "";
            if (!$this->Branch_Name->Raw) {
                $this->Branch_Name->CurrentValue = HtmlDecode($this->Branch_Name->CurrentValue);
            }
            $this->Branch_Name->EditValue = HtmlEncode($this->Branch_Name->CurrentValue);
            $this->Branch_Name->PlaceHolder = RemoveHtml($this->Branch_Name->caption());

            // Street_Address
            $this->Street_Address->EditAttrs["class"] = "form-control";
            $this->Street_Address->EditCustomAttributes = "";
            if (!$this->Street_Address->Raw) {
                $this->Street_Address->CurrentValue = HtmlDecode($this->Street_Address->CurrentValue);
            }
            $this->Street_Address->EditValue = HtmlEncode($this->Street_Address->CurrentValue);
            $this->Street_Address->PlaceHolder = RemoveHtml($this->Street_Address->caption());

            // City
            $this->City->EditAttrs["class"] = "form-control";
            $this->City->EditCustomAttributes = "";
            if (!$this->City->Raw) {
                $this->City->CurrentValue = HtmlDecode($this->City->CurrentValue);
            }
            $this->City->EditValue = HtmlEncode($this->City->CurrentValue);
            $this->City->PlaceHolder = RemoveHtml($this->City->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Zipcode
            $this->Zipcode->EditAttrs["class"] = "form-control";
            $this->Zipcode->EditCustomAttributes = "";
            if (!$this->Zipcode->Raw) {
                $this->Zipcode->CurrentValue = HtmlDecode($this->Zipcode->CurrentValue);
            }
            $this->Zipcode->EditValue = HtmlEncode($this->Zipcode->CurrentValue);
            $this->Zipcode->PlaceHolder = RemoveHtml($this->Zipcode->caption());

            // Phone_Number
            $this->Phone_Number->EditAttrs["class"] = "form-control";
            $this->Phone_Number->EditCustomAttributes = "";
            if (!$this->Phone_Number->Raw) {
                $this->Phone_Number->CurrentValue = HtmlDecode($this->Phone_Number->CurrentValue);
            }
            $this->Phone_Number->EditValue = HtmlEncode($this->Phone_Number->CurrentValue);
            $this->Phone_Number->PlaceHolder = RemoveHtml($this->Phone_Number->caption());

            // AccountNo
            $this->AccountNo->EditAttrs["class"] = "form-control";
            $this->AccountNo->EditCustomAttributes = "";
            if (!$this->AccountNo->Raw) {
                $this->AccountNo->CurrentValue = HtmlDecode($this->AccountNo->CurrentValue);
            }
            $this->AccountNo->EditValue = HtmlEncode($this->AccountNo->CurrentValue);
            $this->AccountNo->PlaceHolder = RemoveHtml($this->AccountNo->caption());

            // Add refer script

            // Branch_Name
            $this->Branch_Name->LinkCustomAttributes = "";
            $this->Branch_Name->HrefValue = "";

            // Street_Address
            $this->Street_Address->LinkCustomAttributes = "";
            $this->Street_Address->HrefValue = "";

            // City
            $this->City->LinkCustomAttributes = "";
            $this->City->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Zipcode
            $this->Zipcode->LinkCustomAttributes = "";
            $this->Zipcode->HrefValue = "";

            // Phone_Number
            $this->Phone_Number->LinkCustomAttributes = "";
            $this->Phone_Number->HrefValue = "";

            // AccountNo
            $this->AccountNo->LinkCustomAttributes = "";
            $this->AccountNo->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
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
        if ($this->Branch_Name->Required) {
            if (!$this->Branch_Name->IsDetailKey && EmptyValue($this->Branch_Name->FormValue)) {
                $this->Branch_Name->addErrorMessage(str_replace("%s", $this->Branch_Name->caption(), $this->Branch_Name->RequiredErrorMessage));
            }
        }
        if ($this->Street_Address->Required) {
            if (!$this->Street_Address->IsDetailKey && EmptyValue($this->Street_Address->FormValue)) {
                $this->Street_Address->addErrorMessage(str_replace("%s", $this->Street_Address->caption(), $this->Street_Address->RequiredErrorMessage));
            }
        }
        if ($this->City->Required) {
            if (!$this->City->IsDetailKey && EmptyValue($this->City->FormValue)) {
                $this->City->addErrorMessage(str_replace("%s", $this->City->caption(), $this->City->RequiredErrorMessage));
            }
        }
        if ($this->State->Required) {
            if (!$this->State->IsDetailKey && EmptyValue($this->State->FormValue)) {
                $this->State->addErrorMessage(str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
            }
        }
        if ($this->Zipcode->Required) {
            if (!$this->Zipcode->IsDetailKey && EmptyValue($this->Zipcode->FormValue)) {
                $this->Zipcode->addErrorMessage(str_replace("%s", $this->Zipcode->caption(), $this->Zipcode->RequiredErrorMessage));
            }
        }
        if ($this->Phone_Number->Required) {
            if (!$this->Phone_Number->IsDetailKey && EmptyValue($this->Phone_Number->FormValue)) {
                $this->Phone_Number->addErrorMessage(str_replace("%s", $this->Phone_Number->caption(), $this->Phone_Number->RequiredErrorMessage));
            }
        }
        if ($this->AccountNo->Required) {
            if (!$this->AccountNo->IsDetailKey && EmptyValue($this->AccountNo->FormValue)) {
                $this->AccountNo->addErrorMessage(str_replace("%s", $this->AccountNo->caption(), $this->AccountNo->RequiredErrorMessage));
            }
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("BankbranchesList"), "", $this->TableVar, true);
        $pageId = "addopt";
        $Breadcrumb->add("addopt", $pageId, $url);
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

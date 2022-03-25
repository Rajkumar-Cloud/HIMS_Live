<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresTradenamesNewDelete extends PresTradenamesNew
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_tradenames_new';

    // Page object name
    public $PageObjName = "PresTradenamesNewDelete";

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

        // Table object (pres_tradenames_new)
        if (!isset($GLOBALS["pres_tradenames_new"]) || get_class($GLOBALS["pres_tradenames_new"]) == PROJECT_NAMESPACE . "pres_tradenames_new") {
            $GLOBALS["pres_tradenames_new"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_tradenames_new');
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
                $doc = new $class(Container("pres_tradenames_new"));
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
            $key .= @$ar['ID'];
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
            $this->ID->Visible = false;
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
        $this->ID->setVisibility();
        $this->Drug_Name->setVisibility();
        $this->Generic_Name->setVisibility();
        $this->Trade_Name->setVisibility();
        $this->PR_CODE->setVisibility();
        $this->Form->setVisibility();
        $this->Strength->setVisibility();
        $this->Unit->setVisibility();
        $this->CONTAINER_TYPE->Visible = false;
        $this->CONTAINER_STRENGTH->Visible = false;
        $this->TypeOfDrug->setVisibility();
        $this->ProductType->setVisibility();
        $this->Generic_Name1->setVisibility();
        $this->Strength1->setVisibility();
        $this->Unit1->setVisibility();
        $this->Generic_Name2->setVisibility();
        $this->Strength2->setVisibility();
        $this->Unit2->setVisibility();
        $this->Generic_Name3->setVisibility();
        $this->Strength3->setVisibility();
        $this->Unit3->setVisibility();
        $this->Generic_Name4->setVisibility();
        $this->Generic_Name5->setVisibility();
        $this->Strength4->setVisibility();
        $this->Strength5->setVisibility();
        $this->Unit4->setVisibility();
        $this->Unit5->setVisibility();
        $this->AlterNative1->setVisibility();
        $this->AlterNative2->setVisibility();
        $this->AlterNative3->setVisibility();
        $this->AlterNative4->setVisibility();
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
        $this->setupLookupOptions($this->Generic_Name);
        $this->setupLookupOptions($this->Form);
        $this->setupLookupOptions($this->Unit);
        $this->setupLookupOptions($this->Generic_Name1);
        $this->setupLookupOptions($this->Unit1);
        $this->setupLookupOptions($this->Generic_Name2);
        $this->setupLookupOptions($this->Unit2);
        $this->setupLookupOptions($this->Generic_Name3);
        $this->setupLookupOptions($this->Unit3);
        $this->setupLookupOptions($this->Generic_Name4);
        $this->setupLookupOptions($this->Generic_Name5);
        $this->setupLookupOptions($this->Unit4);
        $this->setupLookupOptions($this->Unit5);
        $this->setupLookupOptions($this->AlterNative1);
        $this->setupLookupOptions($this->AlterNative2);
        $this->setupLookupOptions($this->AlterNative3);
        $this->setupLookupOptions($this->AlterNative4);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PresTradenamesNewList"); // Prevent SQL injection, return to list
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
                $this->terminate("PresTradenamesNewList"); // Return to list
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
        $this->ID->setDbValue($row['ID']);
        $this->Drug_Name->setDbValue($row['Drug_Name']);
        $this->Generic_Name->setDbValue($row['Generic_Name']);
        $this->Trade_Name->setDbValue($row['Trade_Name']);
        $this->PR_CODE->setDbValue($row['PR_CODE']);
        $this->Form->setDbValue($row['Form']);
        $this->Strength->setDbValue($row['Strength']);
        $this->Unit->setDbValue($row['Unit']);
        $this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
        $this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
        $this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
        $this->ProductType->setDbValue($row['ProductType']);
        $this->Generic_Name1->setDbValue($row['Generic_Name1']);
        $this->Strength1->setDbValue($row['Strength1']);
        $this->Unit1->setDbValue($row['Unit1']);
        $this->Generic_Name2->setDbValue($row['Generic_Name2']);
        $this->Strength2->setDbValue($row['Strength2']);
        $this->Unit2->setDbValue($row['Unit2']);
        $this->Generic_Name3->setDbValue($row['Generic_Name3']);
        $this->Strength3->setDbValue($row['Strength3']);
        $this->Unit3->setDbValue($row['Unit3']);
        $this->Generic_Name4->setDbValue($row['Generic_Name4']);
        $this->Generic_Name5->setDbValue($row['Generic_Name5']);
        $this->Strength4->setDbValue($row['Strength4']);
        $this->Strength5->setDbValue($row['Strength5']);
        $this->Unit4->setDbValue($row['Unit4']);
        $this->Unit5->setDbValue($row['Unit5']);
        $this->AlterNative1->setDbValue($row['AlterNative1']);
        $this->AlterNative2->setDbValue($row['AlterNative2']);
        $this->AlterNative3->setDbValue($row['AlterNative3']);
        $this->AlterNative4->setDbValue($row['AlterNative4']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['ID'] = null;
        $row['Drug_Name'] = null;
        $row['Generic_Name'] = null;
        $row['Trade_Name'] = null;
        $row['PR_CODE'] = null;
        $row['Form'] = null;
        $row['Strength'] = null;
        $row['Unit'] = null;
        $row['CONTAINER_TYPE'] = null;
        $row['CONTAINER_STRENGTH'] = null;
        $row['TypeOfDrug'] = null;
        $row['ProductType'] = null;
        $row['Generic_Name1'] = null;
        $row['Strength1'] = null;
        $row['Unit1'] = null;
        $row['Generic_Name2'] = null;
        $row['Strength2'] = null;
        $row['Unit2'] = null;
        $row['Generic_Name3'] = null;
        $row['Strength3'] = null;
        $row['Unit3'] = null;
        $row['Generic_Name4'] = null;
        $row['Generic_Name5'] = null;
        $row['Strength4'] = null;
        $row['Strength5'] = null;
        $row['Unit4'] = null;
        $row['Unit5'] = null;
        $row['AlterNative1'] = null;
        $row['AlterNative2'] = null;
        $row['AlterNative3'] = null;
        $row['AlterNative4'] = null;
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

        // ID

        // Drug_Name

        // Generic_Name

        // Trade_Name

        // PR_CODE

        // Form

        // Strength

        // Unit

        // CONTAINER_TYPE

        // CONTAINER_STRENGTH

        // TypeOfDrug

        // ProductType

        // Generic_Name1

        // Strength1

        // Unit1

        // Generic_Name2

        // Strength2

        // Unit2

        // Generic_Name3

        // Strength3

        // Unit3

        // Generic_Name4

        // Generic_Name5

        // Strength4

        // Strength5

        // Unit4

        // Unit5

        // AlterNative1

        // AlterNative2

        // AlterNative3

        // AlterNative4
        if ($this->RowType == ROWTYPE_VIEW) {
            // ID
            $this->ID->ViewValue = $this->ID->CurrentValue;
            $this->ID->ViewCustomAttributes = "";

            // Drug_Name
            $this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
            $this->Drug_Name->ViewCustomAttributes = "";

            // Generic_Name
            $curVal = trim(strval($this->Generic_Name->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
                if ($this->Generic_Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
                    } else {
                        $this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name->ViewValue = null;
            }
            $this->Generic_Name->ViewCustomAttributes = "";

            // Trade_Name
            $this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
            $this->Trade_Name->ViewCustomAttributes = "";

            // PR_CODE
            $this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
            $this->PR_CODE->ViewCustomAttributes = "";

            // Form
            $curVal = trim(strval($this->Form->CurrentValue));
            if ($curVal != "") {
                $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
                if ($this->Form->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Form->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Form->Lookup->renderViewRow($rswrk[0]);
                        $this->Form->ViewValue = $this->Form->displayValue($arwrk);
                    } else {
                        $this->Form->ViewValue = $this->Form->CurrentValue;
                    }
                }
            } else {
                $this->Form->ViewValue = null;
            }
            $this->Form->ViewCustomAttributes = "";

            // Strength
            $this->Strength->ViewValue = $this->Strength->CurrentValue;
            $this->Strength->ViewCustomAttributes = "";

            // Unit
            $curVal = trim(strval($this->Unit->CurrentValue));
            if ($curVal != "") {
                $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
                if ($this->Unit->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
                    } else {
                        $this->Unit->ViewValue = $this->Unit->CurrentValue;
                    }
                }
            } else {
                $this->Unit->ViewValue = null;
            }
            $this->Unit->ViewCustomAttributes = "";

            // TypeOfDrug
            if (strval($this->TypeOfDrug->CurrentValue) != "") {
                $this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
            } else {
                $this->TypeOfDrug->ViewValue = null;
            }
            $this->TypeOfDrug->ViewCustomAttributes = "";

            // ProductType
            if (strval($this->ProductType->CurrentValue) != "") {
                $this->ProductType->ViewValue = $this->ProductType->optionCaption($this->ProductType->CurrentValue);
            } else {
                $this->ProductType->ViewValue = null;
            }
            $this->ProductType->ViewCustomAttributes = "";

            // Generic_Name1
            $curVal = trim(strval($this->Generic_Name1->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
                if ($this->Generic_Name1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name1->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
                    } else {
                        $this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name1->ViewValue = null;
            }
            $this->Generic_Name1->ViewCustomAttributes = "";

            // Strength1
            $this->Strength1->ViewValue = $this->Strength1->CurrentValue;
            $this->Strength1->ViewCustomAttributes = "";

            // Unit1
            $curVal = trim(strval($this->Unit1->CurrentValue));
            if ($curVal != "") {
                $this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
                if ($this->Unit1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit1->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit1->ViewValue = $this->Unit1->displayValue($arwrk);
                    } else {
                        $this->Unit1->ViewValue = $this->Unit1->CurrentValue;
                    }
                }
            } else {
                $this->Unit1->ViewValue = null;
            }
            $this->Unit1->ViewCustomAttributes = "";

            // Generic_Name2
            $curVal = trim(strval($this->Generic_Name2->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
                if ($this->Generic_Name2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name2->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
                    } else {
                        $this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name2->ViewValue = null;
            }
            $this->Generic_Name2->ViewCustomAttributes = "";

            // Strength2
            $this->Strength2->ViewValue = $this->Strength2->CurrentValue;
            $this->Strength2->ViewCustomAttributes = "";

            // Unit2
            $curVal = trim(strval($this->Unit2->CurrentValue));
            if ($curVal != "") {
                $this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
                if ($this->Unit2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit2->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit2->ViewValue = $this->Unit2->displayValue($arwrk);
                    } else {
                        $this->Unit2->ViewValue = $this->Unit2->CurrentValue;
                    }
                }
            } else {
                $this->Unit2->ViewValue = null;
            }
            $this->Unit2->ViewCustomAttributes = "";

            // Generic_Name3
            $curVal = trim(strval($this->Generic_Name3->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
                if ($this->Generic_Name3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name3->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
                    } else {
                        $this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name3->ViewValue = null;
            }
            $this->Generic_Name3->ViewCustomAttributes = "";

            // Strength3
            $this->Strength3->ViewValue = $this->Strength3->CurrentValue;
            $this->Strength3->ViewCustomAttributes = "";

            // Unit3
            $curVal = trim(strval($this->Unit3->CurrentValue));
            if ($curVal != "") {
                $this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
                if ($this->Unit3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit3->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit3->ViewValue = $this->Unit3->displayValue($arwrk);
                    } else {
                        $this->Unit3->ViewValue = $this->Unit3->CurrentValue;
                    }
                }
            } else {
                $this->Unit3->ViewValue = null;
            }
            $this->Unit3->ViewCustomAttributes = "";

            // Generic_Name4
            $curVal = trim(strval($this->Generic_Name4->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
                if ($this->Generic_Name4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name4->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
                    } else {
                        $this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name4->ViewValue = null;
            }
            $this->Generic_Name4->ViewCustomAttributes = "";

            // Generic_Name5
            $curVal = trim(strval($this->Generic_Name5->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
                if ($this->Generic_Name5->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name5->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
                    } else {
                        $this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name5->ViewValue = null;
            }
            $this->Generic_Name5->ViewCustomAttributes = "";

            // Strength4
            $this->Strength4->ViewValue = $this->Strength4->CurrentValue;
            $this->Strength4->ViewCustomAttributes = "";

            // Strength5
            $this->Strength5->ViewValue = $this->Strength5->CurrentValue;
            $this->Strength5->ViewCustomAttributes = "";

            // Unit4
            $curVal = trim(strval($this->Unit4->CurrentValue));
            if ($curVal != "") {
                $this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
                if ($this->Unit4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit4->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit4->ViewValue = $this->Unit4->displayValue($arwrk);
                    } else {
                        $this->Unit4->ViewValue = $this->Unit4->CurrentValue;
                    }
                }
            } else {
                $this->Unit4->ViewValue = null;
            }
            $this->Unit4->ViewCustomAttributes = "";

            // Unit5
            $curVal = trim(strval($this->Unit5->CurrentValue));
            if ($curVal != "") {
                $this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
                if ($this->Unit5->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit5->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit5->ViewValue = $this->Unit5->displayValue($arwrk);
                    } else {
                        $this->Unit5->ViewValue = $this->Unit5->CurrentValue;
                    }
                }
            } else {
                $this->Unit5->ViewValue = null;
            }
            $this->Unit5->ViewCustomAttributes = "";

            // AlterNative1
            $curVal = trim(strval($this->AlterNative1->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
                if ($this->AlterNative1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative1->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
                    } else {
                        $this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative1->ViewValue = null;
            }
            $this->AlterNative1->ViewCustomAttributes = "";

            // AlterNative2
            $curVal = trim(strval($this->AlterNative2->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
                if ($this->AlterNative2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative2->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
                    } else {
                        $this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative2->ViewValue = null;
            }
            $this->AlterNative2->ViewCustomAttributes = "";

            // AlterNative3
            $curVal = trim(strval($this->AlterNative3->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
                if ($this->AlterNative3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative3->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
                    } else {
                        $this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative3->ViewValue = null;
            }
            $this->AlterNative3->ViewCustomAttributes = "";

            // AlterNative4
            $curVal = trim(strval($this->AlterNative4->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
                if ($this->AlterNative4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative4->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
                    } else {
                        $this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative4->ViewValue = null;
            }
            $this->AlterNative4->ViewCustomAttributes = "";

            // ID
            $this->ID->LinkCustomAttributes = "";
            $this->ID->HrefValue = "";
            $this->ID->TooltipValue = "";

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";
            $this->Drug_Name->TooltipValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";
            $this->Generic_Name->TooltipValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";
            $this->Trade_Name->TooltipValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";
            $this->PR_CODE->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";
            $this->Strength->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";
            $this->TypeOfDrug->TooltipValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";
            $this->ProductType->TooltipValue = "";

            // Generic_Name1
            $this->Generic_Name1->LinkCustomAttributes = "";
            $this->Generic_Name1->HrefValue = "";
            $this->Generic_Name1->TooltipValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";
            $this->Strength1->TooltipValue = "";

            // Unit1
            $this->Unit1->LinkCustomAttributes = "";
            $this->Unit1->HrefValue = "";
            $this->Unit1->TooltipValue = "";

            // Generic_Name2
            $this->Generic_Name2->LinkCustomAttributes = "";
            $this->Generic_Name2->HrefValue = "";
            $this->Generic_Name2->TooltipValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";
            $this->Strength2->TooltipValue = "";

            // Unit2
            $this->Unit2->LinkCustomAttributes = "";
            $this->Unit2->HrefValue = "";
            $this->Unit2->TooltipValue = "";

            // Generic_Name3
            $this->Generic_Name3->LinkCustomAttributes = "";
            $this->Generic_Name3->HrefValue = "";
            $this->Generic_Name3->TooltipValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";
            $this->Strength3->TooltipValue = "";

            // Unit3
            $this->Unit3->LinkCustomAttributes = "";
            $this->Unit3->HrefValue = "";
            $this->Unit3->TooltipValue = "";

            // Generic_Name4
            $this->Generic_Name4->LinkCustomAttributes = "";
            $this->Generic_Name4->HrefValue = "";
            $this->Generic_Name4->TooltipValue = "";

            // Generic_Name5
            $this->Generic_Name5->LinkCustomAttributes = "";
            $this->Generic_Name5->HrefValue = "";
            $this->Generic_Name5->TooltipValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";
            $this->Strength4->TooltipValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";
            $this->Strength5->TooltipValue = "";

            // Unit4
            $this->Unit4->LinkCustomAttributes = "";
            $this->Unit4->HrefValue = "";
            $this->Unit4->TooltipValue = "";

            // Unit5
            $this->Unit5->LinkCustomAttributes = "";
            $this->Unit5->HrefValue = "";
            $this->Unit5->TooltipValue = "";

            // AlterNative1
            $this->AlterNative1->LinkCustomAttributes = "";
            $this->AlterNative1->HrefValue = "";
            $this->AlterNative1->TooltipValue = "";

            // AlterNative2
            $this->AlterNative2->LinkCustomAttributes = "";
            $this->AlterNative2->HrefValue = "";
            $this->AlterNative2->TooltipValue = "";

            // AlterNative3
            $this->AlterNative3->LinkCustomAttributes = "";
            $this->AlterNative3->HrefValue = "";
            $this->AlterNative3->TooltipValue = "";

            // AlterNative4
            $this->AlterNative4->LinkCustomAttributes = "";
            $this->AlterNative4->HrefValue = "";
            $this->AlterNative4->TooltipValue = "";
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
                $thisKey .= $row['ID'];
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresTradenamesNewList"), "", $this->TableVar, true);
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
                case "x_Generic_Name":
                    break;
                case "x_Form":
                    break;
                case "x_Unit":
                    break;
                case "x_TypeOfDrug":
                    break;
                case "x_ProductType":
                    break;
                case "x_Generic_Name1":
                    break;
                case "x_Unit1":
                    break;
                case "x_Generic_Name2":
                    break;
                case "x_Unit2":
                    break;
                case "x_Generic_Name3":
                    break;
                case "x_Unit3":
                    break;
                case "x_Generic_Name4":
                    break;
                case "x_Generic_Name5":
                    break;
                case "x_Unit4":
                    break;
                case "x_Unit5":
                    break;
                case "x_AlterNative1":
                    break;
                case "x_AlterNative2":
                    break;
                case "x_AlterNative3":
                    break;
                case "x_AlterNative4":
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

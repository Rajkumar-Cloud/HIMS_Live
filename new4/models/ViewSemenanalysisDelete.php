<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewSemenanalysisDelete extends ViewSemenanalysis
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_semenanalysis';

    // Page object name
    public $PageObjName = "ViewSemenanalysisDelete";

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

        // Table object (view_semenanalysis)
        if (!isset($GLOBALS["view_semenanalysis"]) || get_class($GLOBALS["view_semenanalysis"]) == PROJECT_NAMESPACE . "view_semenanalysis") {
            $GLOBALS["view_semenanalysis"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_semenanalysis');
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
                $doc = new $class(Container("view_semenanalysis"));
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
        $this->PaID->setVisibility();
        $this->PaName->setVisibility();
        $this->PaMobile->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->RIDNo->Visible = false;
        $this->PatientName->Visible = false;
        $this->HusbandName->Visible = false;
        $this->RequestDr->setVisibility();
        $this->CollectionDate->setVisibility();
        $this->ResultDate->setVisibility();
        $this->RequestSample->setVisibility();
        $this->CollectionType->Visible = false;
        $this->CollectionMethod->Visible = false;
        $this->Medicationused->Visible = false;
        $this->DifficultiesinCollection->Visible = false;
        $this->Volume->Visible = false;
        $this->pH->Visible = false;
        $this->Timeofcollection->Visible = false;
        $this->Timeofexamination->Visible = false;
        $this->Concentration->Visible = false;
        $this->Total->Visible = false;
        $this->ProgressiveMotility->Visible = false;
        $this->NonProgrssiveMotile->Visible = false;
        $this->Immotile->Visible = false;
        $this->TotalProgrssiveMotile->Visible = false;
        $this->Appearance->Visible = false;
        $this->Homogenosity->Visible = false;
        $this->CompleteSample->Visible = false;
        $this->Liquefactiontime->Visible = false;
        $this->Normal->Visible = false;
        $this->Abnormal->Visible = false;
        $this->Headdefects->Visible = false;
        $this->MidpieceDefects->Visible = false;
        $this->TailDefects->Visible = false;
        $this->NormalProgMotile->Visible = false;
        $this->ImmatureForms->Visible = false;
        $this->Leucocytes->Visible = false;
        $this->Agglutination->Visible = false;
        $this->Debris->Visible = false;
        $this->Diagnosis->Visible = false;
        $this->Observations->Visible = false;
        $this->Signature->Visible = false;
        $this->SemenOrgin->Visible = false;
        $this->Donor->Visible = false;
        $this->DonorBloodgroup->Visible = false;
        $this->Tank->Visible = false;
        $this->Location->Visible = false;
        $this->Volume1->Visible = false;
        $this->Concentration1->Visible = false;
        $this->Total1->Visible = false;
        $this->ProgressiveMotility1->Visible = false;
        $this->NonProgrssiveMotile1->Visible = false;
        $this->Immotile1->Visible = false;
        $this->TotalProgrssiveMotile1->Visible = false;
        $this->TidNo->setVisibility();
        $this->Color->Visible = false;
        $this->DoneBy->Visible = false;
        $this->Method->Visible = false;
        $this->Abstinence->Visible = false;
        $this->ProcessedBy->Visible = false;
        $this->InseminationTime->Visible = false;
        $this->InseminationBy->Visible = false;
        $this->Big->Visible = false;
        $this->Medium->Visible = false;
        $this->Small->Visible = false;
        $this->NoHalo->Visible = false;
        $this->Fragmented->Visible = false;
        $this->NonFragmented->Visible = false;
        $this->DFI->Visible = false;
        $this->IsueBy->Visible = false;
        $this->Volume2->Visible = false;
        $this->Concentration2->Visible = false;
        $this->Total2->Visible = false;
        $this->ProgressiveMotility2->Visible = false;
        $this->NonProgrssiveMotile2->Visible = false;
        $this->Immotile2->Visible = false;
        $this->TotalProgrssiveMotile2->Visible = false;
        $this->IssuedBy->Visible = false;
        $this->IssuedTo->Visible = false;
        $this->MACS->Visible = false;
        $this->PREG_TEST_DATE->setVisibility();
        $this->SPECIFIC_PROBLEMS->Visible = false;
        $this->IMSC_1->Visible = false;
        $this->IMSC_2->Visible = false;
        $this->LIQUIFACTION_STORAGE->Visible = false;
        $this->IUI_PREP_METHOD->Visible = false;
        $this->TIME_FROM_TRIGGER->Visible = false;
        $this->COLLECTION_TO_PREPARATION->Visible = false;
        $this->TIME_FROM_PREP_TO_INSEM->Visible = false;
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
        $this->setupLookupOptions($this->RIDNo);
        $this->setupLookupOptions($this->PatientName);
        $this->setupLookupOptions($this->HusbandName);
        $this->setupLookupOptions($this->Medicationused);
        $this->setupLookupOptions($this->Donor);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("ViewSemenanalysisList"); // Prevent SQL injection, return to list
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
                $this->terminate("ViewSemenanalysisList"); // Return to list
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
        $this->PaID->setDbValue($row['PaID']);
        $this->PaName->setDbValue($row['PaName']);
        $this->PaMobile->setDbValue($row['PaMobile']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->HusbandName->setDbValue($row['HusbandName']);
        $this->RequestDr->setDbValue($row['RequestDr']);
        $this->CollectionDate->setDbValue($row['CollectionDate']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->RequestSample->setDbValue($row['RequestSample']);
        $this->CollectionType->setDbValue($row['CollectionType']);
        $this->CollectionMethod->setDbValue($row['CollectionMethod']);
        $this->Medicationused->setDbValue($row['Medicationused']);
        $this->DifficultiesinCollection->setDbValue($row['DifficultiesinCollection']);
        $this->Volume->setDbValue($row['Volume']);
        $this->pH->setDbValue($row['pH']);
        $this->Timeofcollection->setDbValue($row['Timeofcollection']);
        $this->Timeofexamination->setDbValue($row['Timeofexamination']);
        $this->Concentration->setDbValue($row['Concentration']);
        $this->Total->setDbValue($row['Total']);
        $this->ProgressiveMotility->setDbValue($row['ProgressiveMotility']);
        $this->NonProgrssiveMotile->setDbValue($row['NonProgrssiveMotile']);
        $this->Immotile->setDbValue($row['Immotile']);
        $this->TotalProgrssiveMotile->setDbValue($row['TotalProgrssiveMotile']);
        $this->Appearance->setDbValue($row['Appearance']);
        $this->Homogenosity->setDbValue($row['Homogenosity']);
        $this->CompleteSample->setDbValue($row['CompleteSample']);
        $this->Liquefactiontime->setDbValue($row['Liquefactiontime']);
        $this->Normal->setDbValue($row['Normal']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->Headdefects->setDbValue($row['Headdefects']);
        $this->MidpieceDefects->setDbValue($row['MidpieceDefects']);
        $this->TailDefects->setDbValue($row['TailDefects']);
        $this->NormalProgMotile->setDbValue($row['NormalProgMotile']);
        $this->ImmatureForms->setDbValue($row['ImmatureForms']);
        $this->Leucocytes->setDbValue($row['Leucocytes']);
        $this->Agglutination->setDbValue($row['Agglutination']);
        $this->Debris->setDbValue($row['Debris']);
        $this->Diagnosis->setDbValue($row['Diagnosis']);
        $this->Observations->setDbValue($row['Observations']);
        $this->Signature->setDbValue($row['Signature']);
        $this->SemenOrgin->setDbValue($row['SemenOrgin']);
        $this->Donor->setDbValue($row['Donor']);
        $this->DonorBloodgroup->setDbValue($row['DonorBloodgroup']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Location->setDbValue($row['Location']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Concentration1->setDbValue($row['Concentration1']);
        $this->Total1->setDbValue($row['Total1']);
        $this->ProgressiveMotility1->setDbValue($row['ProgressiveMotility1']);
        $this->NonProgrssiveMotile1->setDbValue($row['NonProgrssiveMotile1']);
        $this->Immotile1->setDbValue($row['Immotile1']);
        $this->TotalProgrssiveMotile1->setDbValue($row['TotalProgrssiveMotile1']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Color->setDbValue($row['Color']);
        $this->DoneBy->setDbValue($row['DoneBy']);
        $this->Method->setDbValue($row['Method']);
        $this->Abstinence->setDbValue($row['Abstinence']);
        $this->ProcessedBy->setDbValue($row['ProcessedBy']);
        $this->InseminationTime->setDbValue($row['InseminationTime']);
        $this->InseminationBy->setDbValue($row['InseminationBy']);
        $this->Big->setDbValue($row['Big']);
        $this->Medium->setDbValue($row['Medium']);
        $this->Small->setDbValue($row['Small']);
        $this->NoHalo->setDbValue($row['NoHalo']);
        $this->Fragmented->setDbValue($row['Fragmented']);
        $this->NonFragmented->setDbValue($row['NonFragmented']);
        $this->DFI->setDbValue($row['DFI']);
        $this->IsueBy->setDbValue($row['IsueBy']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total2->setDbValue($row['Total2']);
        $this->ProgressiveMotility2->setDbValue($row['ProgressiveMotility2']);
        $this->NonProgrssiveMotile2->setDbValue($row['NonProgrssiveMotile2']);
        $this->Immotile2->setDbValue($row['Immotile2']);
        $this->TotalProgrssiveMotile2->setDbValue($row['TotalProgrssiveMotile2']);
        $this->IssuedBy->setDbValue($row['IssuedBy']);
        $this->IssuedTo->setDbValue($row['IssuedTo']);
        $this->MACS->setDbValue($row['MACS']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PaID'] = null;
        $row['PaName'] = null;
        $row['PaMobile'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerMobile'] = null;
        $row['RIDNo'] = null;
        $row['PatientName'] = null;
        $row['HusbandName'] = null;
        $row['RequestDr'] = null;
        $row['CollectionDate'] = null;
        $row['ResultDate'] = null;
        $row['RequestSample'] = null;
        $row['CollectionType'] = null;
        $row['CollectionMethod'] = null;
        $row['Medicationused'] = null;
        $row['DifficultiesinCollection'] = null;
        $row['Volume'] = null;
        $row['pH'] = null;
        $row['Timeofcollection'] = null;
        $row['Timeofexamination'] = null;
        $row['Concentration'] = null;
        $row['Total'] = null;
        $row['ProgressiveMotility'] = null;
        $row['NonProgrssiveMotile'] = null;
        $row['Immotile'] = null;
        $row['TotalProgrssiveMotile'] = null;
        $row['Appearance'] = null;
        $row['Homogenosity'] = null;
        $row['CompleteSample'] = null;
        $row['Liquefactiontime'] = null;
        $row['Normal'] = null;
        $row['Abnormal'] = null;
        $row['Headdefects'] = null;
        $row['MidpieceDefects'] = null;
        $row['TailDefects'] = null;
        $row['NormalProgMotile'] = null;
        $row['ImmatureForms'] = null;
        $row['Leucocytes'] = null;
        $row['Agglutination'] = null;
        $row['Debris'] = null;
        $row['Diagnosis'] = null;
        $row['Observations'] = null;
        $row['Signature'] = null;
        $row['SemenOrgin'] = null;
        $row['Donor'] = null;
        $row['DonorBloodgroup'] = null;
        $row['Tank'] = null;
        $row['Location'] = null;
        $row['Volume1'] = null;
        $row['Concentration1'] = null;
        $row['Total1'] = null;
        $row['ProgressiveMotility1'] = null;
        $row['NonProgrssiveMotile1'] = null;
        $row['Immotile1'] = null;
        $row['TotalProgrssiveMotile1'] = null;
        $row['TidNo'] = null;
        $row['Color'] = null;
        $row['DoneBy'] = null;
        $row['Method'] = null;
        $row['Abstinence'] = null;
        $row['ProcessedBy'] = null;
        $row['InseminationTime'] = null;
        $row['InseminationBy'] = null;
        $row['Big'] = null;
        $row['Medium'] = null;
        $row['Small'] = null;
        $row['NoHalo'] = null;
        $row['Fragmented'] = null;
        $row['NonFragmented'] = null;
        $row['DFI'] = null;
        $row['IsueBy'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total2'] = null;
        $row['ProgressiveMotility2'] = null;
        $row['NonProgrssiveMotile2'] = null;
        $row['Immotile2'] = null;
        $row['TotalProgrssiveMotile2'] = null;
        $row['IssuedBy'] = null;
        $row['IssuedTo'] = null;
        $row['MACS'] = null;
        $row['PREG_TEST_DATE'] = null;
        $row['SPECIFIC_PROBLEMS'] = null;
        $row['IMSC_1'] = null;
        $row['IMSC_2'] = null;
        $row['LIQUIFACTION_STORAGE'] = null;
        $row['IUI_PREP_METHOD'] = null;
        $row['TIME_FROM_TRIGGER'] = null;
        $row['COLLECTION_TO_PREPARATION'] = null;
        $row['TIME_FROM_PREP_TO_INSEM'] = null;
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

        // PaID

        // PaName

        // PaMobile

        // PartnerID

        // PartnerName

        // PartnerMobile

        // RIDNo

        // PatientName

        // HusbandName

        // RequestDr

        // CollectionDate

        // ResultDate

        // RequestSample

        // CollectionType

        // CollectionMethod

        // Medicationused

        // DifficultiesinCollection

        // Volume

        // pH

        // Timeofcollection

        // Timeofexamination

        // Concentration

        // Total

        // ProgressiveMotility

        // NonProgrssiveMotile

        // Immotile

        // TotalProgrssiveMotile

        // Appearance

        // Homogenosity

        // CompleteSample

        // Liquefactiontime

        // Normal

        // Abnormal

        // Headdefects

        // MidpieceDefects

        // TailDefects

        // NormalProgMotile

        // ImmatureForms

        // Leucocytes

        // Agglutination

        // Debris

        // Diagnosis

        // Observations

        // Signature

        // SemenOrgin

        // Donor

        // DonorBloodgroup

        // Tank

        // Location

        // Volume1

        // Concentration1

        // Total1

        // ProgressiveMotility1

        // NonProgrssiveMotile1

        // Immotile1

        // TotalProgrssiveMotile1

        // TidNo

        // Color

        // DoneBy

        // Method

        // Abstinence

        // ProcessedBy

        // InseminationTime

        // InseminationBy

        // Big

        // Medium

        // Small

        // NoHalo

        // Fragmented

        // NonFragmented

        // DFI

        // IsueBy

        // Volume2

        // Concentration2

        // Total2

        // ProgressiveMotility2

        // NonProgrssiveMotile2

        // Immotile2

        // TotalProgrssiveMotile2

        // IssuedBy

        // IssuedTo

        // MACS

        // PREG_TEST_DATE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PaID
            $this->PaID->ViewValue = $this->PaID->CurrentValue;
            $this->PaID->ViewCustomAttributes = "";

            // PaName
            $this->PaName->ViewValue = $this->PaName->CurrentValue;
            $this->PaName->ViewCustomAttributes = "";

            // PaMobile
            $this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
            $this->PaMobile->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // RIDNo
            $curVal = trim(strval($this->RIDNo->CurrentValue));
            if ($curVal != "") {
                $this->RIDNo->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
                if ($this->RIDNo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNo->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNo->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNo->ViewValue = $this->RIDNo->displayValue($arwrk);
                    } else {
                        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
                    }
                }
            } else {
                $this->RIDNo->ViewValue = null;
            }
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $curVal = trim(strval($this->PatientName->CurrentValue));
            if ($curVal != "") {
                $this->PatientName->ViewValue = $this->PatientName->lookupCacheOption($curVal);
                if ($this->PatientName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientName->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientName->ViewValue = $this->PatientName->displayValue($arwrk);
                    } else {
                        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
                    }
                }
            } else {
                $this->PatientName->ViewValue = null;
            }
            $this->PatientName->ViewCustomAttributes = "";

            // HusbandName
            $curVal = trim(strval($this->HusbandName->CurrentValue));
            if ($curVal != "") {
                $this->HusbandName->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
                if ($this->HusbandName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HusbandName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HusbandName->Lookup->renderViewRow($rswrk[0]);
                        $this->HusbandName->ViewValue = $this->HusbandName->displayValue($arwrk);
                    } else {
                        $this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
                    }
                }
            } else {
                $this->HusbandName->ViewValue = null;
            }
            $this->HusbandName->ViewCustomAttributes = "";

            // RequestDr
            $this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
            $this->RequestDr->ViewCustomAttributes = "";

            // CollectionDate
            $this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
            $this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 7);
            $this->CollectionDate->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 7);
            $this->ResultDate->ViewCustomAttributes = "";

            // RequestSample
            if (strval($this->RequestSample->CurrentValue) != "") {
                $this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
            } else {
                $this->RequestSample->ViewValue = null;
            }
            $this->RequestSample->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";
            $this->PaID->TooltipValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";
            $this->PaName->TooltipValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";
            $this->PaMobile->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";
            $this->RequestDr->TooltipValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";
            $this->CollectionDate->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";
            $this->RequestSample->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewSemenanalysisList"), "", $this->TableVar, true);
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
                case "x_RIDNo":
                    break;
                case "x_PatientName":
                    break;
                case "x_HusbandName":
                    break;
                case "x_RequestSample":
                    break;
                case "x_CollectionType":
                    break;
                case "x_CollectionMethod":
                    break;
                case "x_Medicationused":
                    break;
                case "x_DifficultiesinCollection":
                    break;
                case "x_Homogenosity":
                    break;
                case "x_CompleteSample":
                    break;
                case "x_SemenOrgin":
                    break;
                case "x_Donor":
                    break;
                case "x_MACS":
                    break;
                case "x_SPECIFIC_PROBLEMS":
                    break;
                case "x_LIQUIFACTION_STORAGE":
                    break;
                case "x_IUI_PREP_METHOD":
                    break;
                case "x_TIME_FROM_TRIGGER":
                    break;
                case "x_COLLECTION_TO_PREPARATION":
                    break;
                case "x_TIME_FROM_PREP_TO_INSEM":
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

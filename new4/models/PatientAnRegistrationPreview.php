<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientAnRegistrationPreview extends PatientAnRegistration
{
    use MessagesTrait;

    // Page ID
    public $PageID = "preview";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_an_registration';

    // Page object name
    public $PageObjName = "PatientAnRegistrationPreview";

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

        // Table object (patient_an_registration)
        if (!isset($GLOBALS["patient_an_registration"]) || get_class($GLOBALS["patient_an_registration"]) == PROJECT_NAMESPACE . "patient_an_registration") {
            $GLOBALS["patient_an_registration"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_an_registration');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");

        // List options
        $this->ListOptions = new ListOptions();
        $this->ListOptions->TableVar = $this->TableVar;

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
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
                $doc = new $class(Container("patient_an_registration"));
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
    public $Recordset;
    public $TotalRecords;
    public $RowCount;
    public $RecCount;
    public $ListOptions; // List options
    public $OtherOptions; // Other options
    public $StartRecord = 1;
    public $DisplayRecords = 0;
    public $SortField = "";
    public $SortOrder = "";
    public $UseModalLinks = false;
    public $IsModal = true;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action

        // Set up list options
        $this->setupListOptions();
        $this->id->setVisibility();
        $this->pid->setVisibility();
        $this->fid->setVisibility();
        $this->G->setVisibility();
        $this->P->setVisibility();
        $this->L->setVisibility();
        $this->A->setVisibility();
        $this->E->setVisibility();
        $this->M->setVisibility();
        $this->LMP->setVisibility();
        $this->EDO->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->MaritalHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->PreviousHistoryofGDM->setVisibility();
        $this->PreviousHistorofPIH->setVisibility();
        $this->PreviousHistoryofIUGR->setVisibility();
        $this->PreviousHistoryofOligohydramnios->setVisibility();
        $this->PreviousHistoryofPreterm->setVisibility();
        $this->G1->setVisibility();
        $this->G2->setVisibility();
        $this->G3->setVisibility();
        $this->DeliveryNDLSCS1->setVisibility();
        $this->DeliveryNDLSCS2->setVisibility();
        $this->DeliveryNDLSCS3->setVisibility();
        $this->BabySexweight1->setVisibility();
        $this->BabySexweight2->setVisibility();
        $this->BabySexweight3->setVisibility();
        $this->PastMedicalHistory->setVisibility();
        $this->PastSurgicalHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Viability->setVisibility();
        $this->ViabilityDATE->setVisibility();
        $this->ViabilityREPORT->setVisibility();
        $this->Viability2->setVisibility();
        $this->Viability2DATE->setVisibility();
        $this->Viability2REPORT->setVisibility();
        $this->NTscan->setVisibility();
        $this->NTscanDATE->setVisibility();
        $this->NTscanREPORT->setVisibility();
        $this->EarlyTarget->setVisibility();
        $this->EarlyTargetDATE->setVisibility();
        $this->EarlyTargetREPORT->setVisibility();
        $this->Anomaly->setVisibility();
        $this->AnomalyDATE->setVisibility();
        $this->AnomalyREPORT->setVisibility();
        $this->Growth->setVisibility();
        $this->GrowthDATE->setVisibility();
        $this->GrowthREPORT->setVisibility();
        $this->Growth1->setVisibility();
        $this->Growth1DATE->setVisibility();
        $this->Growth1REPORT->setVisibility();
        $this->ANProfile->setVisibility();
        $this->ANProfileDATE->setVisibility();
        $this->ANProfileINHOUSE->setVisibility();
        $this->ANProfileREPORT->setVisibility();
        $this->DualMarker->setVisibility();
        $this->DualMarkerDATE->setVisibility();
        $this->DualMarkerINHOUSE->setVisibility();
        $this->DualMarkerREPORT->setVisibility();
        $this->Quadruple->setVisibility();
        $this->QuadrupleDATE->setVisibility();
        $this->QuadrupleINHOUSE->setVisibility();
        $this->QuadrupleREPORT->setVisibility();
        $this->A5month->setVisibility();
        $this->A5monthDATE->setVisibility();
        $this->A5monthINHOUSE->setVisibility();
        $this->A5monthREPORT->setVisibility();
        $this->A7month->setVisibility();
        $this->A7monthDATE->setVisibility();
        $this->A7monthINHOUSE->setVisibility();
        $this->A7monthREPORT->setVisibility();
        $this->A9month->setVisibility();
        $this->A9monthDATE->setVisibility();
        $this->A9monthINHOUSE->setVisibility();
        $this->A9monthREPORT->setVisibility();
        $this->INJ->setVisibility();
        $this->INJDATE->setVisibility();
        $this->INJINHOUSE->setVisibility();
        $this->INJREPORT->setVisibility();
        $this->Bleeding->setVisibility();
        $this->Hypothyroidism->setVisibility();
        $this->PICMENumber->setVisibility();
        $this->Outcome->setVisibility();
        $this->DateofAdmission->setVisibility();
        $this->DateodProcedure->setVisibility();
        $this->Miscarriage->setVisibility();
        $this->ModeOfDelivery->setVisibility();
        $this->ND->setVisibility();
        $this->NDS->setVisibility();
        $this->NDP->setVisibility();
        $this->Vaccum->setVisibility();
        $this->VaccumS->setVisibility();
        $this->VaccumP->setVisibility();
        $this->Forceps->setVisibility();
        $this->ForcepsS->setVisibility();
        $this->ForcepsP->setVisibility();
        $this->Elective->setVisibility();
        $this->ElectiveS->setVisibility();
        $this->ElectiveP->setVisibility();
        $this->Emergency->setVisibility();
        $this->EmergencyS->setVisibility();
        $this->EmergencyP->setVisibility();
        $this->Maturity->setVisibility();
        $this->Baby1->setVisibility();
        $this->Baby2->setVisibility();
        $this->sex1->setVisibility();
        $this->sex2->setVisibility();
        $this->weight1->setVisibility();
        $this->weight2->setVisibility();
        $this->NICU1->setVisibility();
        $this->NICU2->setVisibility();
        $this->Jaundice1->setVisibility();
        $this->Jaundice2->setVisibility();
        $this->Others1->setVisibility();
        $this->Others2->setVisibility();
        $this->SpillOverReasons->setVisibility();
        $this->ANClosed->setVisibility();
        $this->ANClosedDATE->setVisibility();
        $this->PastMedicalHistoryOthers->setVisibility();
        $this->PastSurgicalHistoryOthers->setVisibility();
        $this->FamilyHistoryOthers->setVisibility();
        $this->PresentPregnancyComplicationsOthers->setVisibility();
        $this->ETdate->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Setup other options
        $this->setupOtherOptions();

        // Set up lookup cache

        // Load filter
        $filter = Get("f", "");
        $filter = Decrypt($filter);
        if ($filter == "") {
            $filter = "0=1";
        }
        $this->StartRecord = (int)Get("start") ?: 1;
        $this->SortField = Get("sort", "");
        $this->SortOrder = Get("sortorder", "");

        // Set up foreign keys from filter
        $this->setupForeignKeysFromFilter($filter);

        // Call Recordset Selecting event
        $this->recordsetSelecting($filter);

        // Load recordset
        $filter = $this->applyUserIDFilters($filter);
        $this->TotalRecords = $this->loadRecordCount($filter);
        if ($this->DisplayRecords <= 0) { // Show all records if page size not specified
            $this->DisplayRecords = $this->TotalRecords > 0 ? $this->TotalRecords : 10;
        }
        $sql = $this->previewSql($filter);
        if ($this->DisplayRecords > 0) {
            $sql->setFirstResult($this->StartRecord - 1)->setMaxResults($this->DisplayRecords);
        }
        $stmt = $sql->execute();
        $this->Recordset = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($this->Recordset);
        $this->renderOtherOptions();

        // Set up pager (always use PrevNextPager for preview page)
        $this->Pager = new PrevNextPager($this->StartRecord, $this->DisplayRecords, $this->TotalRecords, "", 10, $this->AutoHidePager, null, null, true);

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

    /**
     * Get preview SQL
     *
     * @param string $filter
     * @return QueryBuilder
     */
    protected function previewSql($filter)
    {
        $sortField = $this->SortField;
        $sortOrder = $this->SortOrder;
        $sort = "";
        if (array_key_exists($sortField, $this->Fields)) {
            $fld = $this->Fields[$sortField];
            $sort = $fld->Expression;
            if ($sortOrder == "ASC" || $sortOrder == "DESC") {
                $sort .= " " . $sortOrder;
            }
        }
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Set up list options
    protected function setupListOptions()
    {
        global $Security, $Language;

        // Add group option item
        $item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
        $item->Body = "";
        $item->OnLeft = true;
        $item->Visible = false;

        // "view"
        $item = &$this->ListOptions->add("view");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canView();
        $item->OnLeft = true;

        // "edit"
        $item = &$this->ListOptions->add("edit");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canEdit();
        $item->OnLeft = true;

        // "copy"
        $item = &$this->ListOptions->add("copy");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canAdd();
        $item->OnLeft = true;

        // "delete"
        $item = &$this->ListOptions->add("delete");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canDelete();
        $item->OnLeft = true;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = true;
        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
        $item = $this->ListOptions[$this->ListOptions->GroupOptionName];
        $item->Visible = $this->ListOptions->groupOptionVisible();
    }

    // Render list options
    public function renderListOptions()
    {
        global $Security, $Language, $CurrentForm;
        $this->ListOptions->loadDefault();

        // Call ListOptions_Rendering event
        $this->listOptionsRendering();
        $masterKeyUrl = $this->masterKeyUrl();

        // "view"
        $opt = $this->ListOptions["view"];
        if ($Security->canView()) {
            $viewCaption = $Language->phrase("ViewLink");
            $viewTitle = HtmlTitle($viewCaption);
            $viewUrl = $this->getViewUrl($masterKeyUrl);
            if ($this->UseModalLinks && !IsMobile()) {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewTitle . "\" data-caption=\"" . $viewTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode($viewUrl) . "',btn:null});\">" . $viewCaption . "</a>";
            } else {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewTitle . "\" data-caption=\"" . $viewTitle . "\" href=\"" . HtmlEncode($viewUrl) . "\">" . $viewCaption . "</a>";
            }
        } else {
            $opt->Body = "";
        }

        // "edit"
        $opt = $this->ListOptions["edit"];
        if ($Security->canEdit()) {
            $editCaption = $Language->phrase("EditLink");
            $editTitle = HtmlTitle($editCaption);
            $editUrl = $this->getEditUrl($masterKeyUrl);
            if ($this->UseModalLinks && !IsMobile()) {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editTitle . "\" data-caption=\"" . $editTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'" . HtmlEncode($editUrl) . "'});\">" . $editCaption . "</a>";
            } else {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editTitle . "\" data-caption=\"" . $editTitle . "\" href=\"" . HtmlEncode($editUrl) . "\">" . $editCaption . "</a>";
            }
        } else {
            $opt->Body = "";
        }

        // "copy"
        $opt = $this->ListOptions["copy"];
        if ($Security->canAdd()) {
            $copyCaption = $Language->phrase("CopyLink");
            $copyTitle = HtmlTitle($copyCaption);
            $copyUrl = $this->getCopyUrl($masterKeyUrl);
            if ($this->UseModalLinks && !IsMobile()) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copyTitle . "\" data-caption=\"" . $copyTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($copyUrl) . "'});\">" . $copyCaption . "</a>";
            } else {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copyTitle . "\" data-caption=\"" . $copyTitle . "\" href=\"" . HtmlEncode($copyUrl) . "\">" . $copyCaption . "</a>";
            }
        } else {
            $opt->Body = "";
        }

        // "delete"
        $opt = $this->ListOptions["delete"];
        if ($Security->canDelete()) {
            $deleteCaption = $Language->phrase("DeleteLink");
            $deleteTitle = HtmlTitle($deleteCaption);
            $deleteUrl = $this->getDeleteUrl();
            if ($this->UseModalLinks && !IsMobile()) {
                $opt->Body = "<a class=\"ew-row-link ew-delete\" onclick=\"return ew.confirmDelete(this);\" title=\"" . $deleteTitle . "\" data-caption=\"" . $deleteTitle . "\" href=\"" . HtmlEncode($deleteUrl . "&action=1") . "\">" . $deleteCaption . "</a>";
            } else {
                $opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . $deleteTitle . "\" data-caption=\"" . $deleteTitle . "\" href=\"" . HtmlEncode($deleteUrl) . "\">" . $deleteCaption . "</a>";
            }
        } else {
            $opt->Body = "";
        }

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["addedit"];
        $option->UseButtonGroup = true;

        // Add group option item
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->OnLeft = true;
        $item->Visible = false;

        // Add
        $item = &$option->add("add");
        $item->Visible = $Security->canAdd();
    }

    // Render other options
    protected function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["addedit"];

        // Add
        $item = $option["add"];
        if ($Security->canAdd()) {
            $addCaption = $Language->phrase("AddLink");
            $addTitle = HtmlTitle($addCaption);
            $addUrl = $this->getAddUrl($this->masterKeyUrl());
            if ($this->UseModalLinks && !IsMobile()) {
                $item->Body = "<a class=\"btn btn-default btn-sm ew-add-edit ew-add\" title=\"" . $addTitle . "\" data-caption=\"" . $addTitle . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($addUrl) . "'});\">" . $addCaption . "</a>";
            } else {
                $item->Body = "<a class=\"btn btn-default btn-sm ew-add-edit ew-add\" title=\"" . $addTitle . "\" data-caption=\"" . $addTitle . "\" href=\"" . HtmlEncode($addUrl) . "\">" . $addCaption . "</a>";
            }
        } else {
            $item->Body = "";
        }
    }

    // Get master foreign key url
    protected function masterKeyUrl()
    {
        $masterTblVar = Get("t", "");
        $url = "";
        if ($masterTblVar == "patient_opd_follow_up") {
            $url = "" . Config("TABLE_SHOW_MASTER") . "=patient_opd_follow_up&" . GetForeignKeyUrl("fk_PatientId", $this->pid->QueryStringValue) . "&" . GetForeignKeyUrl("fk_id", $this->fid->QueryStringValue) . "";
        }
        return $url;
    }

    // Set up foreign keys from filter
    protected function setupForeignKeysFromFilter($f)
    {
        $masterTblVar = Get("t", "");
        if ($masterTblVar == "patient_opd_follow_up") {
            $find = "`pid`=";
            $x = strpos($f, $find);
            if ($x !== false) {
                $x += strlen($find);
                $y = strpos($f, " AND ", $x);
                if ($y !== false)
                    $val = substr($f, $x, $y-$x);
                else
                    $val = "";
                $val = $this->unquoteValue($val, "DB");
                 $this->pid->setQueryStringValue($val);
            }
            $find = "`fid`=";
            $x = strpos($f, $find);
            if ($x !== false) {
                $x += strlen($find);
                $val = substr($f, $x);
                $val = $this->unquoteValue($val, "DB");
                 $this->fid->setQueryStringValue($val);
            }
        }
    }

    // Unquote value
    protected function unquoteValue($val, $dbid)
    {
        if (StartsString("'", $val) && EndsString("'", $val)) {
            if (GetConnectionType($dbid) == "MYSQL") {
                return stripslashes(substr($val, 1, strlen($val) - 2));
            } else {
                return str_replace("''", "'", substr($val, 1, strlen($val) - 2));
            }
        }
        return $val;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientAnRegistrationList"), "", $this->TableVar, true);
        $pageId = "preview";
        $Breadcrumb->add("preview", $pageId, $url);
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
                case "x_MenstrualHistory":
                    break;
                case "x_PreviousHistoryofGDM":
                    break;
                case "x_PreviousHistorofPIH":
                    break;
                case "x_PreviousHistoryofIUGR":
                    break;
                case "x_PreviousHistoryofOligohydramnios":
                    break;
                case "x_PreviousHistoryofPreterm":
                    break;
                case "x_PastMedicalHistory":
                    break;
                case "x_PastSurgicalHistory":
                    break;
                case "x_FamilyHistory":
                    break;
                case "x_Bleeding":
                    break;
                case "x_Miscarriage":
                    break;
                case "x_ModeOfDelivery":
                    break;
                case "x_NDS":
                    break;
                case "x_NDP":
                    break;
                case "x_VaccumS":
                    break;
                case "x_VaccumP":
                    break;
                case "x_ForcepsS":
                    break;
                case "x_ForcepsP":
                    break;
                case "x_ElectiveS":
                    break;
                case "x_ElectiveP":
                    break;
                case "x_EmergencyS":
                    break;
                case "x_EmergencyP":
                    break;
                case "x_Maturity":
                    break;
                case "x_SpillOverReasons":
                    break;
                case "x_ANClosed":
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

    // ListOptions Load event
    public function listOptionsLoad()
    {
        // Example:
        //$opt = &$this->ListOptions->Add("new");
        //$opt->Header = "xxx";
        //$opt->OnLeft = true; // Link on left
        //$opt->MoveTo(0); // Move to first column
    }

    // ListOptions Rendering event
    public function listOptionsRendering()
    {
        //Container("DetailTableGrid")->DetailAdd = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailEdit = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailView = (...condition...); // Set to true or false conditionally
    }

    // ListOptions Rendered event
    public function listOptionsRendered()
    {
        // Example:
        //$this->ListOptions["new"]->Body = "xxx";
    }
}

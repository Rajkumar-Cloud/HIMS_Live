<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyProductsList extends PharmacyProducts
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_products';

    // Page object name
    public $PageObjName = "PharmacyProductsList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpharmacy_productslist";
    public $FormActionName = "k_action";
    public $FormBlankRowName = "k_blankrow";
    public $FormKeyCountName = "key_count";

    // Page URLs
    public $AddUrl;
    public $EditUrl;
    public $CopyUrl;
    public $DeleteUrl;
    public $ViewUrl;
    public $ListUrl;

    // Export URLs
    public $ExportPrintUrl;
    public $ExportHtmlUrl;
    public $ExportExcelUrl;
    public $ExportWordUrl;
    public $ExportXmlUrl;
    public $ExportCsvUrl;
    public $ExportPdfUrl;

    // Custom export
    public $ExportExcelCustom = false;
    public $ExportWordCustom = false;
    public $ExportPdfCustom = false;
    public $ExportEmailCustom = false;

    // Update URLs
    public $InlineAddUrl;
    public $InlineCopyUrl;
    public $InlineEditUrl;
    public $GridAddUrl;
    public $GridEditUrl;
    public $MultiDeleteUrl;
    public $MultiUpdateUrl;

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

        // Table object (pharmacy_products)
        if (!isset($GLOBALS["pharmacy_products"]) || get_class($GLOBALS["pharmacy_products"]) == PROJECT_NAMESPACE . "pharmacy_products") {
            $GLOBALS["pharmacy_products"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Initialize URLs
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->AddUrl = "PharmacyProductsAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PharmacyProductsDelete";
        $this->MultiUpdateUrl = "PharmacyProductsUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_products');
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

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Import options
        $this->ImportOptions = new ListOptions("div");
        $this->ImportOptions->TagClassName = "ew-import-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";

        // Filter options
        $this->FilterOptions = new ListOptions("div");
        $this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_productslistsrch";

        // List actions
        $this->ListActions = new ListActions();
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
                $doc = new $class(Container("pharmacy_products"));
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
                        if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0) {
                            $val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
                        }
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
            $key .= @$ar['ProductCode'];
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
            $this->ProductCode->Visible = false;
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

    // Class variables
    public $ListOptions; // List options
    public $ExportOptions; // Export options
    public $SearchOptions; // Search options
    public $OtherOptions; // Other options
    public $FilterOptions; // Filter options
    public $ImportOptions; // Import options
    public $ListActions; // List actions
    public $SelectedCount = 0;
    public $SelectedIndex = 0;
    public $DisplayRecords = 20;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "20,40,60,100,500,1000,-1"; // Page sizes (comma separated)
    public $DefaultSearchWhere = ""; // Default search WHERE clause
    public $SearchWhere = ""; // Search WHERE clause
    public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
    public $SearchRowCount = 0; // For extended search
    public $SearchColumnCount = 0; // For extended search
    public $SearchFieldsPerRow = 1; // For extended search
    public $RecordCount = 0; // Record count
    public $EditRowCount;
    public $StartRowCount = 1;
    public $RowCount = 0;
    public $Attrs = []; // Row attributes and cell attributes
    public $RowIndex = 0; // Row index
    public $KeyCount = 0; // Key count
    public $RowAction = ""; // Row action
    public $MultiColumnClass = "col-sm";
    public $MultiColumnEditClass = "w-100";
    public $DbMasterFilter = ""; // Master filter
    public $DbDetailFilter = ""; // Detail filter
    public $MasterRecordExists;
    public $MultiSelectKey;
    public $Command;
    public $RestoreSearch = false;
    public $HashValue; // Hash value
    public $DetailPages;
    public $OldRecordset;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

        // Get export parameters
        $custom = "";
        if (Param("export") !== null) {
            $this->Export = Param("export");
            $custom = Param("custom", "");
        } elseif (IsPost()) {
            if (Post("exporttype") !== null) {
                $this->Export = Post("exporttype");
            }
            $custom = Post("custom", "");
        } elseif (Get("cmd") == "json") {
            $this->Export = Get("cmd");
        } else {
            $this->setExportReturnUrl(CurrentUrl());
        }
        $ExportFileName = $this->TableVar; // Get export file, used in header

        // Get custom export parameters
        if ($this->isExport() && $custom != "") {
            $this->CustomExport = $this->Export;
            $this->Export = "print";
        }
        $CustomExportType = $this->CustomExport;
        $ExportType = $this->Export; // Get export parameter, used in header

        // Update Export URLs
        if (Config("USE_PHPEXCEL")) {
            $this->ExportExcelCustom = false;
        }
        if (Config("USE_PHPWORD")) {
            $this->ExportWordCustom = false;
        }
        if ($this->ExportExcelCustom) {
            $this->ExportExcelUrl .= "&amp;custom=1";
        }
        if ($this->ExportWordCustom) {
            $this->ExportWordUrl .= "&amp;custom=1";
        }
        if ($this->ExportPdfCustom) {
            $this->ExportPdfUrl .= "&amp;custom=1";
        }
        $this->CurrentAction = Param("action"); // Set up current action

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();

        // Setup export options
        $this->setupExportOptions();
        $this->ProductCode->setVisibility();
        $this->ProductName->setVisibility();
        $this->DivisionCode->setVisibility();
        $this->ManufacturerCode->setVisibility();
        $this->SupplierCode->setVisibility();
        $this->AlternateSupplierCodes->setVisibility();
        $this->AlternateProductCode->setVisibility();
        $this->UniversalProductCode->setVisibility();
        $this->BookProductCode->setVisibility();
        $this->OldCode->setVisibility();
        $this->ProtectedProducts->setVisibility();
        $this->ProductFullName->setVisibility();
        $this->UnitOfMeasure->setVisibility();
        $this->UnitDescription->setVisibility();
        $this->BulkDescription->setVisibility();
        $this->BarCodeDescription->setVisibility();
        $this->PackageInformation->setVisibility();
        $this->PackageId->setVisibility();
        $this->Weight->setVisibility();
        $this->AllowFractions->setVisibility();
        $this->MinimumStockLevel->setVisibility();
        $this->MaximumStockLevel->setVisibility();
        $this->ReorderLevel->setVisibility();
        $this->MinMaxRatio->setVisibility();
        $this->AutoMinMaxRatio->setVisibility();
        $this->ScheduleCode->setVisibility();
        $this->RopRatio->setVisibility();
        $this->MRP->setVisibility();
        $this->PurchasePrice->setVisibility();
        $this->PurchaseUnit->setVisibility();
        $this->PurchaseTaxCode->setVisibility();
        $this->AllowDirectInward->setVisibility();
        $this->SalePrice->setVisibility();
        $this->SaleUnit->setVisibility();
        $this->SalesTaxCode->setVisibility();
        $this->StockReceived->setVisibility();
        $this->TotalStock->setVisibility();
        $this->StockType->setVisibility();
        $this->StockCheckDate->setVisibility();
        $this->StockAdjustmentDate->setVisibility();
        $this->Remarks->setVisibility();
        $this->CostCentre->setVisibility();
        $this->ProductType->setVisibility();
        $this->TaxAmount->setVisibility();
        $this->TaxId->setVisibility();
        $this->ResaleTaxApplicable->setVisibility();
        $this->CstOtherTax->setVisibility();
        $this->TotalTax->setVisibility();
        $this->ItemCost->setVisibility();
        $this->ExpiryDate->setVisibility();
        $this->BatchDescription->setVisibility();
        $this->FreeScheme->setVisibility();
        $this->CashDiscountEligibility->setVisibility();
        $this->DiscountPerAllowInBill->setVisibility();
        $this->Discount->setVisibility();
        $this->TotalAmount->setVisibility();
        $this->StandardMargin->setVisibility();
        $this->Margin->setVisibility();
        $this->MarginId->setVisibility();
        $this->ExpectedMargin->setVisibility();
        $this->SurchargeBeforeTax->setVisibility();
        $this->SurchargeAfterTax->setVisibility();
        $this->TempOrderNo->setVisibility();
        $this->TempOrderDate->setVisibility();
        $this->OrderUnit->setVisibility();
        $this->OrderQuantity->setVisibility();
        $this->MarkForOrder->setVisibility();
        $this->OrderAllId->setVisibility();
        $this->CalculateOrderQty->setVisibility();
        $this->SubLocation->setVisibility();
        $this->CategoryCode->setVisibility();
        $this->SubCategory->setVisibility();
        $this->FlexCategoryCode->setVisibility();
        $this->ABCSaleQty->setVisibility();
        $this->ABCSaleValue->setVisibility();
        $this->ConvertionFactor->setVisibility();
        $this->ConvertionUnitDesc->setVisibility();
        $this->TransactionId->setVisibility();
        $this->SoldProductId->setVisibility();
        $this->WantedBookId->setVisibility();
        $this->AllId->setVisibility();
        $this->BatchAndExpiryCompulsory->setVisibility();
        $this->BatchStockForWantedBook->setVisibility();
        $this->UnitBasedBilling->setVisibility();
        $this->DoNotCheckStock->setVisibility();
        $this->AcceptRate->setVisibility();
        $this->PriceLevel->setVisibility();
        $this->LastQuotePrice->setVisibility();
        $this->PriceChange->setVisibility();
        $this->CommodityCode->setVisibility();
        $this->InstitutePrice->setVisibility();
        $this->CtrlOrDCtrlProduct->setVisibility();
        $this->ImportedDate->setVisibility();
        $this->IsImported->setVisibility();
        $this->FileName->setVisibility();
        $this->LPName->Visible = false;
        $this->GodownNumber->setVisibility();
        $this->CreationDate->setVisibility();
        $this->CreatedbyUser->setVisibility();
        $this->ModifiedDate->setVisibility();
        $this->ModifiedbyUser->setVisibility();
        $this->isActive->setVisibility();
        $this->AllowExpiryClaim->setVisibility();
        $this->BrandCode->setVisibility();
        $this->FreeSchemeBasedon->setVisibility();
        $this->DoNotCheckCostInBill->setVisibility();
        $this->ProductGroupCode->setVisibility();
        $this->ProductStrengthCode->setVisibility();
        $this->PackingCode->setVisibility();
        $this->ComputedMinStock->setVisibility();
        $this->ComputedMaxStock->setVisibility();
        $this->ProductRemark->setVisibility();
        $this->ProductDrugCode->setVisibility();
        $this->IsMatrixProduct->setVisibility();
        $this->AttributeCount1->setVisibility();
        $this->AttributeCount2->setVisibility();
        $this->AttributeCount3->setVisibility();
        $this->AttributeCount4->setVisibility();
        $this->AttributeCount5->setVisibility();
        $this->DefaultDiscountPercentage->setVisibility();
        $this->DonotPrintBarcode->setVisibility();
        $this->ProductLevelDiscount->setVisibility();
        $this->Markup->setVisibility();
        $this->MarkDown->setVisibility();
        $this->ReworkSalePrice->setVisibility();
        $this->MultipleInput->setVisibility();
        $this->LpPackageInformation->setVisibility();
        $this->AllowNegativeStock->setVisibility();
        $this->OrderDate->setVisibility();
        $this->OrderTime->setVisibility();
        $this->RateGroupCode->setVisibility();
        $this->ConversionCaseLot->setVisibility();
        $this->ShippingLot->setVisibility();
        $this->AllowExpiryReplacement->setVisibility();
        $this->NoOfMonthExpiryAllowed->setVisibility();
        $this->ProductDiscountEligibility->setVisibility();
        $this->ScheduleTypeCode->setVisibility();
        $this->AIOCDProductCode->setVisibility();
        $this->FreeQuantity->setVisibility();
        $this->DiscountType->setVisibility();
        $this->DiscountValue->setVisibility();
        $this->HasProductOrderAttribute->setVisibility();
        $this->FirstPODate->setVisibility();
        $this->SaleprcieAndMrpCalcPercent->setVisibility();
        $this->IsGiftVoucherProducts->setVisibility();
        $this->AcceptRange4SerialNumber->setVisibility();
        $this->GiftVoucherDenomination->setVisibility();
        $this->Subclasscode->setVisibility();
        $this->BarCodeFromWeighingMachine->setVisibility();
        $this->CheckCostInReturn->setVisibility();
        $this->FrequentSaleProduct->setVisibility();
        $this->RateType->setVisibility();
        $this->TouchscreenName->setVisibility();
        $this->FreeType->setVisibility();
        $this->LooseQtyasNewBatch->setVisibility();
        $this->AllowSlabBilling->setVisibility();
        $this->ProductTypeForProduction->setVisibility();
        $this->RecipeCode->setVisibility();
        $this->DefaultUnitType->setVisibility();
        $this->PIstatus->setVisibility();
        $this->LastPiConfirmedDate->setVisibility();
        $this->BarCodeDesign->setVisibility();
        $this->AcceptRemarksInBill->setVisibility();
        $this->Classification->setVisibility();
        $this->TimeSlot->setVisibility();
        $this->IsBundle->setVisibility();
        $this->ColorCode->setVisibility();
        $this->GenderCode->setVisibility();
        $this->SizeCode->setVisibility();
        $this->GiftCard->setVisibility();
        $this->ToonLabel->setVisibility();
        $this->GarmentType->setVisibility();
        $this->AgeGroup->setVisibility();
        $this->Season->setVisibility();
        $this->DailyStockEntry->setVisibility();
        $this->ModifierApplicable->setVisibility();
        $this->ModifierType->setVisibility();
        $this->AcceptZeroRate->setVisibility();
        $this->ExciseDutyCode->setVisibility();
        $this->IndentProductGroupCode->setVisibility();
        $this->IsMultiBatch->setVisibility();
        $this->IsSingleBatch->setVisibility();
        $this->MarkUpRate1->setVisibility();
        $this->MarkDownRate1->setVisibility();
        $this->MarkUpRate2->setVisibility();
        $this->MarkDownRate2->setVisibility();
        $this->_Yield->setVisibility();
        $this->RefProductCode->setVisibility();
        $this->Volume->setVisibility();
        $this->MeasurementID->setVisibility();
        $this->CountryCode->setVisibility();
        $this->AcceptWMQty->setVisibility();
        $this->SingleBatchBasedOnRate->setVisibility();
        $this->TenderNo->setVisibility();
        $this->SingleBillMaximumSoldQtyFiled->setVisibility();
        $this->Strength1->setVisibility();
        $this->Strength2->setVisibility();
        $this->Strength3->setVisibility();
        $this->Strength4->setVisibility();
        $this->Strength5->setVisibility();
        $this->IngredientCode1->setVisibility();
        $this->IngredientCode2->setVisibility();
        $this->IngredientCode3->setVisibility();
        $this->IngredientCode4->setVisibility();
        $this->IngredientCode5->setVisibility();
        $this->OrderType->setVisibility();
        $this->StockUOM->setVisibility();
        $this->PriceUOM->setVisibility();
        $this->DefaultSaleUOM->setVisibility();
        $this->DefaultPurchaseUOM->setVisibility();
        $this->ReportingUOM->setVisibility();
        $this->LastPurchasedUOM->setVisibility();
        $this->TreatmentCodes->setVisibility();
        $this->InsuranceType->setVisibility();
        $this->CoverageGroupCodes->setVisibility();
        $this->MultipleUOM->setVisibility();
        $this->SalePriceComputation->setVisibility();
        $this->StockCorrection->setVisibility();
        $this->LBTPercentage->setVisibility();
        $this->SalesCommission->setVisibility();
        $this->LockedStock->setVisibility();
        $this->MinMaxUOM->setVisibility();
        $this->ExpiryMfrDateFormat->setVisibility();
        $this->ProductLifeTime->setVisibility();
        $this->IsCombo->setVisibility();
        $this->ComboTypeCode->setVisibility();
        $this->AttributeCount6->setVisibility();
        $this->AttributeCount7->setVisibility();
        $this->AttributeCount8->setVisibility();
        $this->AttributeCount9->setVisibility();
        $this->AttributeCount10->setVisibility();
        $this->LabourCharge->setVisibility();
        $this->AffectOtherCharge->setVisibility();
        $this->DosageInfo->setVisibility();
        $this->DosageType->setVisibility();
        $this->DefaultIndentUOM->setVisibility();
        $this->PromoTag->setVisibility();
        $this->BillLevelPromoTag->setVisibility();
        $this->IsMRPProduct->setVisibility();
        $this->MrpList->Visible = false;
        $this->AlternateSaleUOM->setVisibility();
        $this->FreeUOM->setVisibility();
        $this->MarketedCode->setVisibility();
        $this->MinimumSalePrice->setVisibility();
        $this->PRate1->setVisibility();
        $this->PRate2->setVisibility();
        $this->LPItemCost->setVisibility();
        $this->FixedItemCost->setVisibility();
        $this->HSNId->setVisibility();
        $this->TaxInclusive->setVisibility();
        $this->EligibleforWarranty->setVisibility();
        $this->NoofMonthsWarranty->setVisibility();
        $this->ComputeTaxonCost->setVisibility();
        $this->HasEmptyBottleTrack->setVisibility();
        $this->EmptyBottleReferenceCode->setVisibility();
        $this->AdditionalCESSAmount->setVisibility();
        $this->EmptyBottleRate->setVisibility();
        $this->hideFieldsForAddEdit();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Setup other options
        $this->setupOtherOptions();

        // Set up custom action (compatible with old version)
        foreach ($this->CustomActions as $name => $action) {
            $this->ListActions->add($name, $action);
        }

        // Show checkbox column if multiple action
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
                $this->ListOptions["checkbox"]->Visible = true;
                break;
            }
        }

        // Set up lookup cache

        // Search filters
        $srchAdvanced = ""; // Advanced search filter
        $srchBasic = ""; // Basic search filter
        $filter = "";

        // Get command
        $this->Command = strtolower(Get("cmd"));
        if ($this->isPageRequest()) {
            // Process list action first
            if ($this->processListAction()) { // Ajax request
                $this->terminate();
                return;
            }

            // Set up records per page
            $this->setupDisplayRecords();

            // Handle reset command
            $this->resetCmd();

            // Set up Breadcrumb
            if (!$this->isExport()) {
                $this->setupBreadcrumb();
            }

            // Hide list options
            if ($this->isExport()) {
                $this->ListOptions->hideAllOptions(["sequence"]);
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            } elseif ($this->isGridAdd() || $this->isGridEdit()) {
                $this->ListOptions->hideAllOptions();
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            }

            // Hide options
            if ($this->isExport() || $this->CurrentAction) {
                $this->ExportOptions->hideAllOptions();
                $this->FilterOptions->hideAllOptions();
                $this->ImportOptions->hideAllOptions();
            }

            // Hide other options
            if ($this->isExport()) {
                $this->OtherOptions->hideAllOptions();
            }

            // Get default search criteria
            AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
            }

            // Restore search parms from Session if not searching / reset / export
            if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms()) {
                $this->restoreSearchParms();
            }

            // Call Recordset SearchValidated event
            $this->recordsetSearchValidated();

            // Set up sorting order
            $this->setupSortOrder();

            // Get basic search criteria
            if (!$this->hasInvalidFields()) {
                $srchBasic = $this->basicSearchWhere();
            }
        }

        // Restore display records
        if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
            $this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
        } else {
            $this->DisplayRecords = 20; // Load default
            $this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
        }

        // Load Sorting Order
        if ($this->Command != "json") {
            $this->loadSortOrder();
        }

        // Load search default if no existing search criteria
        if (!$this->checkSearchParms()) {
            // Load basic search from default
            $this->BasicSearch->loadDefault();
            if ($this->BasicSearch->Keyword != "") {
                $srchBasic = $this->basicSearchWhere();
            }
        }

        // Build search criteria
        AddFilter($this->SearchWhere, $srchAdvanced);
        AddFilter($this->SearchWhere, $srchBasic);

        // Call Recordset_Searching event
        $this->recordsetSearching($this->SearchWhere);

        // Save search criteria
        if ($this->Command == "search" && !$this->RestoreSearch) {
            $this->setSearchWhere($this->SearchWhere); // Save to Session
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->Command != "json") {
            $this->SearchWhere = $this->getSearchWhere();
        }

        // Build filter
        $filter = "";
        if (!$Security->canList()) {
            $filter = "(0=1)"; // Filter all records
        }
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Set up filter
        if ($this->Command == "json") {
            $this->UseSessionForListSql = false; // Do not use session for ListSQL
            $this->CurrentFilter = $filter;
        } else {
            $this->setSessionWhere($filter);
            $this->CurrentFilter = "";
        }

        // Export data only
        if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
            $this->exportData();
            $this->terminate();
            return;
        }
        if ($this->isGridAdd()) {
            $this->CurrentFilter = "0=1";
            $this->StartRecord = 1;
            $this->DisplayRecords = $this->GridAddRowCount;
            $this->TotalRecords = $this->DisplayRecords;
            $this->StopRecord = $this->DisplayRecords;
        } else {
            $this->TotalRecords = $this->listRecordCount();
            $this->StartRecord = 1;
            if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) { // Display all records
                $this->DisplayRecords = $this->TotalRecords;
            }
            if (!($this->isExport() && $this->ExportAll)) { // Set up start record position
                $this->setupStartRecord();
            }
            $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

            // Set no record found message
            if (!$this->CurrentAction && $this->TotalRecords == 0) {
                if (!$Security->canList()) {
                    $this->setWarningMessage(DeniedMessage());
                }
                if ($this->SearchWhere == "0=101") {
                    $this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
                } else {
                    $this->setWarningMessage($Language->phrase("NoRecord"));
                }
            }
        }

        // Search options
        $this->setupSearchOptions();

        // Set up search panel class
        if ($this->SearchWhere != "") {
            AppendClass($this->SearchPanelClass, "show");
        }

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset);
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
            $this->terminate(true);
            return;
        }

        // Set up pager
        $this->Pager = new NumericPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);

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

    // Set up number of records displayed per page
    protected function setupDisplayRecords()
    {
        $wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
        if ($wrk != "") {
            if (is_numeric($wrk)) {
                $this->DisplayRecords = (int)$wrk;
            } else {
                if (SameText($wrk, "all")) { // Display all records
                    $this->DisplayRecords = -1;
                } else {
                    $this->DisplayRecords = 20; // Non-numeric, load default
                }
            }
            $this->setRecordsPerPage($this->DisplayRecords); // Save to Session
            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Build filter for all keys
    protected function buildKeyFilter()
    {
        global $CurrentForm;
        $wrkFilter = "";

        // Update row index and get row key
        $rowindex = 1;
        $CurrentForm->Index = $rowindex;
        $thisKey = strval($CurrentForm->getValue($this->OldKeyName));
        while ($thisKey != "") {
            $this->setKey($thisKey);
            if ($this->OldKey != "") {
                $filter = $this->getRecordFilter();
                if ($wrkFilter != "") {
                    $wrkFilter .= " OR ";
                }
                $wrkFilter .= $filter;
            } else {
                $wrkFilter = "0=1";
                break;
            }

            // Update row index and get row key
            $rowindex++; // Next row
            $CurrentForm->Index = $rowindex;
            $thisKey = strval($CurrentForm->getValue($this->OldKeyName));
        }
        return $wrkFilter;
    }

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";

        // Load server side filters
        if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile)) {
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_productslistsrch");
        }
        $filterList = Concat($filterList, $this->ProductCode->AdvancedSearch->toJson(), ","); // Field ProductCode
        $filterList = Concat($filterList, $this->ProductName->AdvancedSearch->toJson(), ","); // Field ProductName
        $filterList = Concat($filterList, $this->DivisionCode->AdvancedSearch->toJson(), ","); // Field DivisionCode
        $filterList = Concat($filterList, $this->ManufacturerCode->AdvancedSearch->toJson(), ","); // Field ManufacturerCode
        $filterList = Concat($filterList, $this->SupplierCode->AdvancedSearch->toJson(), ","); // Field SupplierCode
        $filterList = Concat($filterList, $this->AlternateSupplierCodes->AdvancedSearch->toJson(), ","); // Field AlternateSupplierCodes
        $filterList = Concat($filterList, $this->AlternateProductCode->AdvancedSearch->toJson(), ","); // Field AlternateProductCode
        $filterList = Concat($filterList, $this->UniversalProductCode->AdvancedSearch->toJson(), ","); // Field UniversalProductCode
        $filterList = Concat($filterList, $this->BookProductCode->AdvancedSearch->toJson(), ","); // Field BookProductCode
        $filterList = Concat($filterList, $this->OldCode->AdvancedSearch->toJson(), ","); // Field OldCode
        $filterList = Concat($filterList, $this->ProtectedProducts->AdvancedSearch->toJson(), ","); // Field ProtectedProducts
        $filterList = Concat($filterList, $this->ProductFullName->AdvancedSearch->toJson(), ","); // Field ProductFullName
        $filterList = Concat($filterList, $this->UnitOfMeasure->AdvancedSearch->toJson(), ","); // Field UnitOfMeasure
        $filterList = Concat($filterList, $this->UnitDescription->AdvancedSearch->toJson(), ","); // Field UnitDescription
        $filterList = Concat($filterList, $this->BulkDescription->AdvancedSearch->toJson(), ","); // Field BulkDescription
        $filterList = Concat($filterList, $this->BarCodeDescription->AdvancedSearch->toJson(), ","); // Field BarCodeDescription
        $filterList = Concat($filterList, $this->PackageInformation->AdvancedSearch->toJson(), ","); // Field PackageInformation
        $filterList = Concat($filterList, $this->PackageId->AdvancedSearch->toJson(), ","); // Field PackageId
        $filterList = Concat($filterList, $this->Weight->AdvancedSearch->toJson(), ","); // Field Weight
        $filterList = Concat($filterList, $this->AllowFractions->AdvancedSearch->toJson(), ","); // Field AllowFractions
        $filterList = Concat($filterList, $this->MinimumStockLevel->AdvancedSearch->toJson(), ","); // Field MinimumStockLevel
        $filterList = Concat($filterList, $this->MaximumStockLevel->AdvancedSearch->toJson(), ","); // Field MaximumStockLevel
        $filterList = Concat($filterList, $this->ReorderLevel->AdvancedSearch->toJson(), ","); // Field ReorderLevel
        $filterList = Concat($filterList, $this->MinMaxRatio->AdvancedSearch->toJson(), ","); // Field MinMaxRatio
        $filterList = Concat($filterList, $this->AutoMinMaxRatio->AdvancedSearch->toJson(), ","); // Field AutoMinMaxRatio
        $filterList = Concat($filterList, $this->ScheduleCode->AdvancedSearch->toJson(), ","); // Field ScheduleCode
        $filterList = Concat($filterList, $this->RopRatio->AdvancedSearch->toJson(), ","); // Field RopRatio
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->PurchasePrice->AdvancedSearch->toJson(), ","); // Field PurchasePrice
        $filterList = Concat($filterList, $this->PurchaseUnit->AdvancedSearch->toJson(), ","); // Field PurchaseUnit
        $filterList = Concat($filterList, $this->PurchaseTaxCode->AdvancedSearch->toJson(), ","); // Field PurchaseTaxCode
        $filterList = Concat($filterList, $this->AllowDirectInward->AdvancedSearch->toJson(), ","); // Field AllowDirectInward
        $filterList = Concat($filterList, $this->SalePrice->AdvancedSearch->toJson(), ","); // Field SalePrice
        $filterList = Concat($filterList, $this->SaleUnit->AdvancedSearch->toJson(), ","); // Field SaleUnit
        $filterList = Concat($filterList, $this->SalesTaxCode->AdvancedSearch->toJson(), ","); // Field SalesTaxCode
        $filterList = Concat($filterList, $this->StockReceived->AdvancedSearch->toJson(), ","); // Field StockReceived
        $filterList = Concat($filterList, $this->TotalStock->AdvancedSearch->toJson(), ","); // Field TotalStock
        $filterList = Concat($filterList, $this->StockType->AdvancedSearch->toJson(), ","); // Field StockType
        $filterList = Concat($filterList, $this->StockCheckDate->AdvancedSearch->toJson(), ","); // Field StockCheckDate
        $filterList = Concat($filterList, $this->StockAdjustmentDate->AdvancedSearch->toJson(), ","); // Field StockAdjustmentDate
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->CostCentre->AdvancedSearch->toJson(), ","); // Field CostCentre
        $filterList = Concat($filterList, $this->ProductType->AdvancedSearch->toJson(), ","); // Field ProductType
        $filterList = Concat($filterList, $this->TaxAmount->AdvancedSearch->toJson(), ","); // Field TaxAmount
        $filterList = Concat($filterList, $this->TaxId->AdvancedSearch->toJson(), ","); // Field TaxId
        $filterList = Concat($filterList, $this->ResaleTaxApplicable->AdvancedSearch->toJson(), ","); // Field ResaleTaxApplicable
        $filterList = Concat($filterList, $this->CstOtherTax->AdvancedSearch->toJson(), ","); // Field CstOtherTax
        $filterList = Concat($filterList, $this->TotalTax->AdvancedSearch->toJson(), ","); // Field TotalTax
        $filterList = Concat($filterList, $this->ItemCost->AdvancedSearch->toJson(), ","); // Field ItemCost
        $filterList = Concat($filterList, $this->ExpiryDate->AdvancedSearch->toJson(), ","); // Field ExpiryDate
        $filterList = Concat($filterList, $this->BatchDescription->AdvancedSearch->toJson(), ","); // Field BatchDescription
        $filterList = Concat($filterList, $this->FreeScheme->AdvancedSearch->toJson(), ","); // Field FreeScheme
        $filterList = Concat($filterList, $this->CashDiscountEligibility->AdvancedSearch->toJson(), ","); // Field CashDiscountEligibility
        $filterList = Concat($filterList, $this->DiscountPerAllowInBill->AdvancedSearch->toJson(), ","); // Field DiscountPerAllowInBill
        $filterList = Concat($filterList, $this->Discount->AdvancedSearch->toJson(), ","); // Field Discount
        $filterList = Concat($filterList, $this->TotalAmount->AdvancedSearch->toJson(), ","); // Field TotalAmount
        $filterList = Concat($filterList, $this->StandardMargin->AdvancedSearch->toJson(), ","); // Field StandardMargin
        $filterList = Concat($filterList, $this->Margin->AdvancedSearch->toJson(), ","); // Field Margin
        $filterList = Concat($filterList, $this->MarginId->AdvancedSearch->toJson(), ","); // Field MarginId
        $filterList = Concat($filterList, $this->ExpectedMargin->AdvancedSearch->toJson(), ","); // Field ExpectedMargin
        $filterList = Concat($filterList, $this->SurchargeBeforeTax->AdvancedSearch->toJson(), ","); // Field SurchargeBeforeTax
        $filterList = Concat($filterList, $this->SurchargeAfterTax->AdvancedSearch->toJson(), ","); // Field SurchargeAfterTax
        $filterList = Concat($filterList, $this->TempOrderNo->AdvancedSearch->toJson(), ","); // Field TempOrderNo
        $filterList = Concat($filterList, $this->TempOrderDate->AdvancedSearch->toJson(), ","); // Field TempOrderDate
        $filterList = Concat($filterList, $this->OrderUnit->AdvancedSearch->toJson(), ","); // Field OrderUnit
        $filterList = Concat($filterList, $this->OrderQuantity->AdvancedSearch->toJson(), ","); // Field OrderQuantity
        $filterList = Concat($filterList, $this->MarkForOrder->AdvancedSearch->toJson(), ","); // Field MarkForOrder
        $filterList = Concat($filterList, $this->OrderAllId->AdvancedSearch->toJson(), ","); // Field OrderAllId
        $filterList = Concat($filterList, $this->CalculateOrderQty->AdvancedSearch->toJson(), ","); // Field CalculateOrderQty
        $filterList = Concat($filterList, $this->SubLocation->AdvancedSearch->toJson(), ","); // Field SubLocation
        $filterList = Concat($filterList, $this->CategoryCode->AdvancedSearch->toJson(), ","); // Field CategoryCode
        $filterList = Concat($filterList, $this->SubCategory->AdvancedSearch->toJson(), ","); // Field SubCategory
        $filterList = Concat($filterList, $this->FlexCategoryCode->AdvancedSearch->toJson(), ","); // Field FlexCategoryCode
        $filterList = Concat($filterList, $this->ABCSaleQty->AdvancedSearch->toJson(), ","); // Field ABCSaleQty
        $filterList = Concat($filterList, $this->ABCSaleValue->AdvancedSearch->toJson(), ","); // Field ABCSaleValue
        $filterList = Concat($filterList, $this->ConvertionFactor->AdvancedSearch->toJson(), ","); // Field ConvertionFactor
        $filterList = Concat($filterList, $this->ConvertionUnitDesc->AdvancedSearch->toJson(), ","); // Field ConvertionUnitDesc
        $filterList = Concat($filterList, $this->TransactionId->AdvancedSearch->toJson(), ","); // Field TransactionId
        $filterList = Concat($filterList, $this->SoldProductId->AdvancedSearch->toJson(), ","); // Field SoldProductId
        $filterList = Concat($filterList, $this->WantedBookId->AdvancedSearch->toJson(), ","); // Field WantedBookId
        $filterList = Concat($filterList, $this->AllId->AdvancedSearch->toJson(), ","); // Field AllId
        $filterList = Concat($filterList, $this->BatchAndExpiryCompulsory->AdvancedSearch->toJson(), ","); // Field BatchAndExpiryCompulsory
        $filterList = Concat($filterList, $this->BatchStockForWantedBook->AdvancedSearch->toJson(), ","); // Field BatchStockForWantedBook
        $filterList = Concat($filterList, $this->UnitBasedBilling->AdvancedSearch->toJson(), ","); // Field UnitBasedBilling
        $filterList = Concat($filterList, $this->DoNotCheckStock->AdvancedSearch->toJson(), ","); // Field DoNotCheckStock
        $filterList = Concat($filterList, $this->AcceptRate->AdvancedSearch->toJson(), ","); // Field AcceptRate
        $filterList = Concat($filterList, $this->PriceLevel->AdvancedSearch->toJson(), ","); // Field PriceLevel
        $filterList = Concat($filterList, $this->LastQuotePrice->AdvancedSearch->toJson(), ","); // Field LastQuotePrice
        $filterList = Concat($filterList, $this->PriceChange->AdvancedSearch->toJson(), ","); // Field PriceChange
        $filterList = Concat($filterList, $this->CommodityCode->AdvancedSearch->toJson(), ","); // Field CommodityCode
        $filterList = Concat($filterList, $this->InstitutePrice->AdvancedSearch->toJson(), ","); // Field InstitutePrice
        $filterList = Concat($filterList, $this->CtrlOrDCtrlProduct->AdvancedSearch->toJson(), ","); // Field CtrlOrDCtrlProduct
        $filterList = Concat($filterList, $this->ImportedDate->AdvancedSearch->toJson(), ","); // Field ImportedDate
        $filterList = Concat($filterList, $this->IsImported->AdvancedSearch->toJson(), ","); // Field IsImported
        $filterList = Concat($filterList, $this->FileName->AdvancedSearch->toJson(), ","); // Field FileName
        $filterList = Concat($filterList, $this->LPName->AdvancedSearch->toJson(), ","); // Field LPName
        $filterList = Concat($filterList, $this->GodownNumber->AdvancedSearch->toJson(), ","); // Field GodownNumber
        $filterList = Concat($filterList, $this->CreationDate->AdvancedSearch->toJson(), ","); // Field CreationDate
        $filterList = Concat($filterList, $this->CreatedbyUser->AdvancedSearch->toJson(), ","); // Field CreatedbyUser
        $filterList = Concat($filterList, $this->ModifiedDate->AdvancedSearch->toJson(), ","); // Field ModifiedDate
        $filterList = Concat($filterList, $this->ModifiedbyUser->AdvancedSearch->toJson(), ","); // Field ModifiedbyUser
        $filterList = Concat($filterList, $this->isActive->AdvancedSearch->toJson(), ","); // Field isActive
        $filterList = Concat($filterList, $this->AllowExpiryClaim->AdvancedSearch->toJson(), ","); // Field AllowExpiryClaim
        $filterList = Concat($filterList, $this->BrandCode->AdvancedSearch->toJson(), ","); // Field BrandCode
        $filterList = Concat($filterList, $this->FreeSchemeBasedon->AdvancedSearch->toJson(), ","); // Field FreeSchemeBasedon
        $filterList = Concat($filterList, $this->DoNotCheckCostInBill->AdvancedSearch->toJson(), ","); // Field DoNotCheckCostInBill
        $filterList = Concat($filterList, $this->ProductGroupCode->AdvancedSearch->toJson(), ","); // Field ProductGroupCode
        $filterList = Concat($filterList, $this->ProductStrengthCode->AdvancedSearch->toJson(), ","); // Field ProductStrengthCode
        $filterList = Concat($filterList, $this->PackingCode->AdvancedSearch->toJson(), ","); // Field PackingCode
        $filterList = Concat($filterList, $this->ComputedMinStock->AdvancedSearch->toJson(), ","); // Field ComputedMinStock
        $filterList = Concat($filterList, $this->ComputedMaxStock->AdvancedSearch->toJson(), ","); // Field ComputedMaxStock
        $filterList = Concat($filterList, $this->ProductRemark->AdvancedSearch->toJson(), ","); // Field ProductRemark
        $filterList = Concat($filterList, $this->ProductDrugCode->AdvancedSearch->toJson(), ","); // Field ProductDrugCode
        $filterList = Concat($filterList, $this->IsMatrixProduct->AdvancedSearch->toJson(), ","); // Field IsMatrixProduct
        $filterList = Concat($filterList, $this->AttributeCount1->AdvancedSearch->toJson(), ","); // Field AttributeCount1
        $filterList = Concat($filterList, $this->AttributeCount2->AdvancedSearch->toJson(), ","); // Field AttributeCount2
        $filterList = Concat($filterList, $this->AttributeCount3->AdvancedSearch->toJson(), ","); // Field AttributeCount3
        $filterList = Concat($filterList, $this->AttributeCount4->AdvancedSearch->toJson(), ","); // Field AttributeCount4
        $filterList = Concat($filterList, $this->AttributeCount5->AdvancedSearch->toJson(), ","); // Field AttributeCount5
        $filterList = Concat($filterList, $this->DefaultDiscountPercentage->AdvancedSearch->toJson(), ","); // Field DefaultDiscountPercentage
        $filterList = Concat($filterList, $this->DonotPrintBarcode->AdvancedSearch->toJson(), ","); // Field DonotPrintBarcode
        $filterList = Concat($filterList, $this->ProductLevelDiscount->AdvancedSearch->toJson(), ","); // Field ProductLevelDiscount
        $filterList = Concat($filterList, $this->Markup->AdvancedSearch->toJson(), ","); // Field Markup
        $filterList = Concat($filterList, $this->MarkDown->AdvancedSearch->toJson(), ","); // Field MarkDown
        $filterList = Concat($filterList, $this->ReworkSalePrice->AdvancedSearch->toJson(), ","); // Field ReworkSalePrice
        $filterList = Concat($filterList, $this->MultipleInput->AdvancedSearch->toJson(), ","); // Field MultipleInput
        $filterList = Concat($filterList, $this->LpPackageInformation->AdvancedSearch->toJson(), ","); // Field LpPackageInformation
        $filterList = Concat($filterList, $this->AllowNegativeStock->AdvancedSearch->toJson(), ","); // Field AllowNegativeStock
        $filterList = Concat($filterList, $this->OrderDate->AdvancedSearch->toJson(), ","); // Field OrderDate
        $filterList = Concat($filterList, $this->OrderTime->AdvancedSearch->toJson(), ","); // Field OrderTime
        $filterList = Concat($filterList, $this->RateGroupCode->AdvancedSearch->toJson(), ","); // Field RateGroupCode
        $filterList = Concat($filterList, $this->ConversionCaseLot->AdvancedSearch->toJson(), ","); // Field ConversionCaseLot
        $filterList = Concat($filterList, $this->ShippingLot->AdvancedSearch->toJson(), ","); // Field ShippingLot
        $filterList = Concat($filterList, $this->AllowExpiryReplacement->AdvancedSearch->toJson(), ","); // Field AllowExpiryReplacement
        $filterList = Concat($filterList, $this->NoOfMonthExpiryAllowed->AdvancedSearch->toJson(), ","); // Field NoOfMonthExpiryAllowed
        $filterList = Concat($filterList, $this->ProductDiscountEligibility->AdvancedSearch->toJson(), ","); // Field ProductDiscountEligibility
        $filterList = Concat($filterList, $this->ScheduleTypeCode->AdvancedSearch->toJson(), ","); // Field ScheduleTypeCode
        $filterList = Concat($filterList, $this->AIOCDProductCode->AdvancedSearch->toJson(), ","); // Field AIOCDProductCode
        $filterList = Concat($filterList, $this->FreeQuantity->AdvancedSearch->toJson(), ","); // Field FreeQuantity
        $filterList = Concat($filterList, $this->DiscountType->AdvancedSearch->toJson(), ","); // Field DiscountType
        $filterList = Concat($filterList, $this->DiscountValue->AdvancedSearch->toJson(), ","); // Field DiscountValue
        $filterList = Concat($filterList, $this->HasProductOrderAttribute->AdvancedSearch->toJson(), ","); // Field HasProductOrderAttribute
        $filterList = Concat($filterList, $this->FirstPODate->AdvancedSearch->toJson(), ","); // Field FirstPODate
        $filterList = Concat($filterList, $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->toJson(), ","); // Field SaleprcieAndMrpCalcPercent
        $filterList = Concat($filterList, $this->IsGiftVoucherProducts->AdvancedSearch->toJson(), ","); // Field IsGiftVoucherProducts
        $filterList = Concat($filterList, $this->AcceptRange4SerialNumber->AdvancedSearch->toJson(), ","); // Field AcceptRange4SerialNumber
        $filterList = Concat($filterList, $this->GiftVoucherDenomination->AdvancedSearch->toJson(), ","); // Field GiftVoucherDenomination
        $filterList = Concat($filterList, $this->Subclasscode->AdvancedSearch->toJson(), ","); // Field Subclasscode
        $filterList = Concat($filterList, $this->BarCodeFromWeighingMachine->AdvancedSearch->toJson(), ","); // Field BarCodeFromWeighingMachine
        $filterList = Concat($filterList, $this->CheckCostInReturn->AdvancedSearch->toJson(), ","); // Field CheckCostInReturn
        $filterList = Concat($filterList, $this->FrequentSaleProduct->AdvancedSearch->toJson(), ","); // Field FrequentSaleProduct
        $filterList = Concat($filterList, $this->RateType->AdvancedSearch->toJson(), ","); // Field RateType
        $filterList = Concat($filterList, $this->TouchscreenName->AdvancedSearch->toJson(), ","); // Field TouchscreenName
        $filterList = Concat($filterList, $this->FreeType->AdvancedSearch->toJson(), ","); // Field FreeType
        $filterList = Concat($filterList, $this->LooseQtyasNewBatch->AdvancedSearch->toJson(), ","); // Field LooseQtyasNewBatch
        $filterList = Concat($filterList, $this->AllowSlabBilling->AdvancedSearch->toJson(), ","); // Field AllowSlabBilling
        $filterList = Concat($filterList, $this->ProductTypeForProduction->AdvancedSearch->toJson(), ","); // Field ProductTypeForProduction
        $filterList = Concat($filterList, $this->RecipeCode->AdvancedSearch->toJson(), ","); // Field RecipeCode
        $filterList = Concat($filterList, $this->DefaultUnitType->AdvancedSearch->toJson(), ","); // Field DefaultUnitType
        $filterList = Concat($filterList, $this->PIstatus->AdvancedSearch->toJson(), ","); // Field PIstatus
        $filterList = Concat($filterList, $this->LastPiConfirmedDate->AdvancedSearch->toJson(), ","); // Field LastPiConfirmedDate
        $filterList = Concat($filterList, $this->BarCodeDesign->AdvancedSearch->toJson(), ","); // Field BarCodeDesign
        $filterList = Concat($filterList, $this->AcceptRemarksInBill->AdvancedSearch->toJson(), ","); // Field AcceptRemarksInBill
        $filterList = Concat($filterList, $this->Classification->AdvancedSearch->toJson(), ","); // Field Classification
        $filterList = Concat($filterList, $this->TimeSlot->AdvancedSearch->toJson(), ","); // Field TimeSlot
        $filterList = Concat($filterList, $this->IsBundle->AdvancedSearch->toJson(), ","); // Field IsBundle
        $filterList = Concat($filterList, $this->ColorCode->AdvancedSearch->toJson(), ","); // Field ColorCode
        $filterList = Concat($filterList, $this->GenderCode->AdvancedSearch->toJson(), ","); // Field GenderCode
        $filterList = Concat($filterList, $this->SizeCode->AdvancedSearch->toJson(), ","); // Field SizeCode
        $filterList = Concat($filterList, $this->GiftCard->AdvancedSearch->toJson(), ","); // Field GiftCard
        $filterList = Concat($filterList, $this->ToonLabel->AdvancedSearch->toJson(), ","); // Field ToonLabel
        $filterList = Concat($filterList, $this->GarmentType->AdvancedSearch->toJson(), ","); // Field GarmentType
        $filterList = Concat($filterList, $this->AgeGroup->AdvancedSearch->toJson(), ","); // Field AgeGroup
        $filterList = Concat($filterList, $this->Season->AdvancedSearch->toJson(), ","); // Field Season
        $filterList = Concat($filterList, $this->DailyStockEntry->AdvancedSearch->toJson(), ","); // Field DailyStockEntry
        $filterList = Concat($filterList, $this->ModifierApplicable->AdvancedSearch->toJson(), ","); // Field ModifierApplicable
        $filterList = Concat($filterList, $this->ModifierType->AdvancedSearch->toJson(), ","); // Field ModifierType
        $filterList = Concat($filterList, $this->AcceptZeroRate->AdvancedSearch->toJson(), ","); // Field AcceptZeroRate
        $filterList = Concat($filterList, $this->ExciseDutyCode->AdvancedSearch->toJson(), ","); // Field ExciseDutyCode
        $filterList = Concat($filterList, $this->IndentProductGroupCode->AdvancedSearch->toJson(), ","); // Field IndentProductGroupCode
        $filterList = Concat($filterList, $this->IsMultiBatch->AdvancedSearch->toJson(), ","); // Field IsMultiBatch
        $filterList = Concat($filterList, $this->IsSingleBatch->AdvancedSearch->toJson(), ","); // Field IsSingleBatch
        $filterList = Concat($filterList, $this->MarkUpRate1->AdvancedSearch->toJson(), ","); // Field MarkUpRate1
        $filterList = Concat($filterList, $this->MarkDownRate1->AdvancedSearch->toJson(), ","); // Field MarkDownRate1
        $filterList = Concat($filterList, $this->MarkUpRate2->AdvancedSearch->toJson(), ","); // Field MarkUpRate2
        $filterList = Concat($filterList, $this->MarkDownRate2->AdvancedSearch->toJson(), ","); // Field MarkDownRate2
        $filterList = Concat($filterList, $this->_Yield->AdvancedSearch->toJson(), ","); // Field Yield
        $filterList = Concat($filterList, $this->RefProductCode->AdvancedSearch->toJson(), ","); // Field RefProductCode
        $filterList = Concat($filterList, $this->Volume->AdvancedSearch->toJson(), ","); // Field Volume
        $filterList = Concat($filterList, $this->MeasurementID->AdvancedSearch->toJson(), ","); // Field MeasurementID
        $filterList = Concat($filterList, $this->CountryCode->AdvancedSearch->toJson(), ","); // Field CountryCode
        $filterList = Concat($filterList, $this->AcceptWMQty->AdvancedSearch->toJson(), ","); // Field AcceptWMQty
        $filterList = Concat($filterList, $this->SingleBatchBasedOnRate->AdvancedSearch->toJson(), ","); // Field SingleBatchBasedOnRate
        $filterList = Concat($filterList, $this->TenderNo->AdvancedSearch->toJson(), ","); // Field TenderNo
        $filterList = Concat($filterList, $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->toJson(), ","); // Field SingleBillMaximumSoldQtyFiled
        $filterList = Concat($filterList, $this->Strength1->AdvancedSearch->toJson(), ","); // Field Strength1
        $filterList = Concat($filterList, $this->Strength2->AdvancedSearch->toJson(), ","); // Field Strength2
        $filterList = Concat($filterList, $this->Strength3->AdvancedSearch->toJson(), ","); // Field Strength3
        $filterList = Concat($filterList, $this->Strength4->AdvancedSearch->toJson(), ","); // Field Strength4
        $filterList = Concat($filterList, $this->Strength5->AdvancedSearch->toJson(), ","); // Field Strength5
        $filterList = Concat($filterList, $this->IngredientCode1->AdvancedSearch->toJson(), ","); // Field IngredientCode1
        $filterList = Concat($filterList, $this->IngredientCode2->AdvancedSearch->toJson(), ","); // Field IngredientCode2
        $filterList = Concat($filterList, $this->IngredientCode3->AdvancedSearch->toJson(), ","); // Field IngredientCode3
        $filterList = Concat($filterList, $this->IngredientCode4->AdvancedSearch->toJson(), ","); // Field IngredientCode4
        $filterList = Concat($filterList, $this->IngredientCode5->AdvancedSearch->toJson(), ","); // Field IngredientCode5
        $filterList = Concat($filterList, $this->OrderType->AdvancedSearch->toJson(), ","); // Field OrderType
        $filterList = Concat($filterList, $this->StockUOM->AdvancedSearch->toJson(), ","); // Field StockUOM
        $filterList = Concat($filterList, $this->PriceUOM->AdvancedSearch->toJson(), ","); // Field PriceUOM
        $filterList = Concat($filterList, $this->DefaultSaleUOM->AdvancedSearch->toJson(), ","); // Field DefaultSaleUOM
        $filterList = Concat($filterList, $this->DefaultPurchaseUOM->AdvancedSearch->toJson(), ","); // Field DefaultPurchaseUOM
        $filterList = Concat($filterList, $this->ReportingUOM->AdvancedSearch->toJson(), ","); // Field ReportingUOM
        $filterList = Concat($filterList, $this->LastPurchasedUOM->AdvancedSearch->toJson(), ","); // Field LastPurchasedUOM
        $filterList = Concat($filterList, $this->TreatmentCodes->AdvancedSearch->toJson(), ","); // Field TreatmentCodes
        $filterList = Concat($filterList, $this->InsuranceType->AdvancedSearch->toJson(), ","); // Field InsuranceType
        $filterList = Concat($filterList, $this->CoverageGroupCodes->AdvancedSearch->toJson(), ","); // Field CoverageGroupCodes
        $filterList = Concat($filterList, $this->MultipleUOM->AdvancedSearch->toJson(), ","); // Field MultipleUOM
        $filterList = Concat($filterList, $this->SalePriceComputation->AdvancedSearch->toJson(), ","); // Field SalePriceComputation
        $filterList = Concat($filterList, $this->StockCorrection->AdvancedSearch->toJson(), ","); // Field StockCorrection
        $filterList = Concat($filterList, $this->LBTPercentage->AdvancedSearch->toJson(), ","); // Field LBTPercentage
        $filterList = Concat($filterList, $this->SalesCommission->AdvancedSearch->toJson(), ","); // Field SalesCommission
        $filterList = Concat($filterList, $this->LockedStock->AdvancedSearch->toJson(), ","); // Field LockedStock
        $filterList = Concat($filterList, $this->MinMaxUOM->AdvancedSearch->toJson(), ","); // Field MinMaxUOM
        $filterList = Concat($filterList, $this->ExpiryMfrDateFormat->AdvancedSearch->toJson(), ","); // Field ExpiryMfrDateFormat
        $filterList = Concat($filterList, $this->ProductLifeTime->AdvancedSearch->toJson(), ","); // Field ProductLifeTime
        $filterList = Concat($filterList, $this->IsCombo->AdvancedSearch->toJson(), ","); // Field IsCombo
        $filterList = Concat($filterList, $this->ComboTypeCode->AdvancedSearch->toJson(), ","); // Field ComboTypeCode
        $filterList = Concat($filterList, $this->AttributeCount6->AdvancedSearch->toJson(), ","); // Field AttributeCount6
        $filterList = Concat($filterList, $this->AttributeCount7->AdvancedSearch->toJson(), ","); // Field AttributeCount7
        $filterList = Concat($filterList, $this->AttributeCount8->AdvancedSearch->toJson(), ","); // Field AttributeCount8
        $filterList = Concat($filterList, $this->AttributeCount9->AdvancedSearch->toJson(), ","); // Field AttributeCount9
        $filterList = Concat($filterList, $this->AttributeCount10->AdvancedSearch->toJson(), ","); // Field AttributeCount10
        $filterList = Concat($filterList, $this->LabourCharge->AdvancedSearch->toJson(), ","); // Field LabourCharge
        $filterList = Concat($filterList, $this->AffectOtherCharge->AdvancedSearch->toJson(), ","); // Field AffectOtherCharge
        $filterList = Concat($filterList, $this->DosageInfo->AdvancedSearch->toJson(), ","); // Field DosageInfo
        $filterList = Concat($filterList, $this->DosageType->AdvancedSearch->toJson(), ","); // Field DosageType
        $filterList = Concat($filterList, $this->DefaultIndentUOM->AdvancedSearch->toJson(), ","); // Field DefaultIndentUOM
        $filterList = Concat($filterList, $this->PromoTag->AdvancedSearch->toJson(), ","); // Field PromoTag
        $filterList = Concat($filterList, $this->BillLevelPromoTag->AdvancedSearch->toJson(), ","); // Field BillLevelPromoTag
        $filterList = Concat($filterList, $this->IsMRPProduct->AdvancedSearch->toJson(), ","); // Field IsMRPProduct
        $filterList = Concat($filterList, $this->MrpList->AdvancedSearch->toJson(), ","); // Field MrpList
        $filterList = Concat($filterList, $this->AlternateSaleUOM->AdvancedSearch->toJson(), ","); // Field AlternateSaleUOM
        $filterList = Concat($filterList, $this->FreeUOM->AdvancedSearch->toJson(), ","); // Field FreeUOM
        $filterList = Concat($filterList, $this->MarketedCode->AdvancedSearch->toJson(), ","); // Field MarketedCode
        $filterList = Concat($filterList, $this->MinimumSalePrice->AdvancedSearch->toJson(), ","); // Field MinimumSalePrice
        $filterList = Concat($filterList, $this->PRate1->AdvancedSearch->toJson(), ","); // Field PRate1
        $filterList = Concat($filterList, $this->PRate2->AdvancedSearch->toJson(), ","); // Field PRate2
        $filterList = Concat($filterList, $this->LPItemCost->AdvancedSearch->toJson(), ","); // Field LPItemCost
        $filterList = Concat($filterList, $this->FixedItemCost->AdvancedSearch->toJson(), ","); // Field FixedItemCost
        $filterList = Concat($filterList, $this->HSNId->AdvancedSearch->toJson(), ","); // Field HSNId
        $filterList = Concat($filterList, $this->TaxInclusive->AdvancedSearch->toJson(), ","); // Field TaxInclusive
        $filterList = Concat($filterList, $this->EligibleforWarranty->AdvancedSearch->toJson(), ","); // Field EligibleforWarranty
        $filterList = Concat($filterList, $this->NoofMonthsWarranty->AdvancedSearch->toJson(), ","); // Field NoofMonthsWarranty
        $filterList = Concat($filterList, $this->ComputeTaxonCost->AdvancedSearch->toJson(), ","); // Field ComputeTaxonCost
        $filterList = Concat($filterList, $this->HasEmptyBottleTrack->AdvancedSearch->toJson(), ","); // Field HasEmptyBottleTrack
        $filterList = Concat($filterList, $this->EmptyBottleReferenceCode->AdvancedSearch->toJson(), ","); // Field EmptyBottleReferenceCode
        $filterList = Concat($filterList, $this->AdditionalCESSAmount->AdvancedSearch->toJson(), ","); // Field AdditionalCESSAmount
        $filterList = Concat($filterList, $this->EmptyBottleRate->AdvancedSearch->toJson(), ","); // Field EmptyBottleRate
        if ($this->BasicSearch->Keyword != "") {
            $wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
            $filterList = Concat($filterList, $wrk, ",");
        }

        // Return filter list in JSON
        if ($filterList != "") {
            $filterList = "\"data\":{" . $filterList . "}";
        }
        if ($savedFilterList != "") {
            $filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
        }
        return ($filterList != "") ? "{" . $filterList . "}" : "null";
    }

    // Process filter list
    protected function processFilterList()
    {
        global $UserProfile;
        if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
            $filters = Post("filters");
            $UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_productslistsrch", $filters);
            WriteJson([["success" => true]]); // Success
            return true;
        } elseif (Post("cmd") == "resetfilter") {
            $this->restoreFilterList();
        }
        return false;
    }

    // Restore list of filters
    protected function restoreFilterList()
    {
        // Return if not reset filter
        if (Post("cmd") !== "resetfilter") {
            return false;
        }
        $filter = json_decode(Post("filter"), true);
        $this->Command = "search";

        // Field ProductCode
        $this->ProductCode->AdvancedSearch->SearchValue = @$filter["x_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchOperator = @$filter["z_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchCondition = @$filter["v_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchValue2 = @$filter["y_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_ProductCode"];
        $this->ProductCode->AdvancedSearch->save();

        // Field ProductName
        $this->ProductName->AdvancedSearch->SearchValue = @$filter["x_ProductName"];
        $this->ProductName->AdvancedSearch->SearchOperator = @$filter["z_ProductName"];
        $this->ProductName->AdvancedSearch->SearchCondition = @$filter["v_ProductName"];
        $this->ProductName->AdvancedSearch->SearchValue2 = @$filter["y_ProductName"];
        $this->ProductName->AdvancedSearch->SearchOperator2 = @$filter["w_ProductName"];
        $this->ProductName->AdvancedSearch->save();

        // Field DivisionCode
        $this->DivisionCode->AdvancedSearch->SearchValue = @$filter["x_DivisionCode"];
        $this->DivisionCode->AdvancedSearch->SearchOperator = @$filter["z_DivisionCode"];
        $this->DivisionCode->AdvancedSearch->SearchCondition = @$filter["v_DivisionCode"];
        $this->DivisionCode->AdvancedSearch->SearchValue2 = @$filter["y_DivisionCode"];
        $this->DivisionCode->AdvancedSearch->SearchOperator2 = @$filter["w_DivisionCode"];
        $this->DivisionCode->AdvancedSearch->save();

        // Field ManufacturerCode
        $this->ManufacturerCode->AdvancedSearch->SearchValue = @$filter["x_ManufacturerCode"];
        $this->ManufacturerCode->AdvancedSearch->SearchOperator = @$filter["z_ManufacturerCode"];
        $this->ManufacturerCode->AdvancedSearch->SearchCondition = @$filter["v_ManufacturerCode"];
        $this->ManufacturerCode->AdvancedSearch->SearchValue2 = @$filter["y_ManufacturerCode"];
        $this->ManufacturerCode->AdvancedSearch->SearchOperator2 = @$filter["w_ManufacturerCode"];
        $this->ManufacturerCode->AdvancedSearch->save();

        // Field SupplierCode
        $this->SupplierCode->AdvancedSearch->SearchValue = @$filter["x_SupplierCode"];
        $this->SupplierCode->AdvancedSearch->SearchOperator = @$filter["z_SupplierCode"];
        $this->SupplierCode->AdvancedSearch->SearchCondition = @$filter["v_SupplierCode"];
        $this->SupplierCode->AdvancedSearch->SearchValue2 = @$filter["y_SupplierCode"];
        $this->SupplierCode->AdvancedSearch->SearchOperator2 = @$filter["w_SupplierCode"];
        $this->SupplierCode->AdvancedSearch->save();

        // Field AlternateSupplierCodes
        $this->AlternateSupplierCodes->AdvancedSearch->SearchValue = @$filter["x_AlternateSupplierCodes"];
        $this->AlternateSupplierCodes->AdvancedSearch->SearchOperator = @$filter["z_AlternateSupplierCodes"];
        $this->AlternateSupplierCodes->AdvancedSearch->SearchCondition = @$filter["v_AlternateSupplierCodes"];
        $this->AlternateSupplierCodes->AdvancedSearch->SearchValue2 = @$filter["y_AlternateSupplierCodes"];
        $this->AlternateSupplierCodes->AdvancedSearch->SearchOperator2 = @$filter["w_AlternateSupplierCodes"];
        $this->AlternateSupplierCodes->AdvancedSearch->save();

        // Field AlternateProductCode
        $this->AlternateProductCode->AdvancedSearch->SearchValue = @$filter["x_AlternateProductCode"];
        $this->AlternateProductCode->AdvancedSearch->SearchOperator = @$filter["z_AlternateProductCode"];
        $this->AlternateProductCode->AdvancedSearch->SearchCondition = @$filter["v_AlternateProductCode"];
        $this->AlternateProductCode->AdvancedSearch->SearchValue2 = @$filter["y_AlternateProductCode"];
        $this->AlternateProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_AlternateProductCode"];
        $this->AlternateProductCode->AdvancedSearch->save();

        // Field UniversalProductCode
        $this->UniversalProductCode->AdvancedSearch->SearchValue = @$filter["x_UniversalProductCode"];
        $this->UniversalProductCode->AdvancedSearch->SearchOperator = @$filter["z_UniversalProductCode"];
        $this->UniversalProductCode->AdvancedSearch->SearchCondition = @$filter["v_UniversalProductCode"];
        $this->UniversalProductCode->AdvancedSearch->SearchValue2 = @$filter["y_UniversalProductCode"];
        $this->UniversalProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_UniversalProductCode"];
        $this->UniversalProductCode->AdvancedSearch->save();

        // Field BookProductCode
        $this->BookProductCode->AdvancedSearch->SearchValue = @$filter["x_BookProductCode"];
        $this->BookProductCode->AdvancedSearch->SearchOperator = @$filter["z_BookProductCode"];
        $this->BookProductCode->AdvancedSearch->SearchCondition = @$filter["v_BookProductCode"];
        $this->BookProductCode->AdvancedSearch->SearchValue2 = @$filter["y_BookProductCode"];
        $this->BookProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_BookProductCode"];
        $this->BookProductCode->AdvancedSearch->save();

        // Field OldCode
        $this->OldCode->AdvancedSearch->SearchValue = @$filter["x_OldCode"];
        $this->OldCode->AdvancedSearch->SearchOperator = @$filter["z_OldCode"];
        $this->OldCode->AdvancedSearch->SearchCondition = @$filter["v_OldCode"];
        $this->OldCode->AdvancedSearch->SearchValue2 = @$filter["y_OldCode"];
        $this->OldCode->AdvancedSearch->SearchOperator2 = @$filter["w_OldCode"];
        $this->OldCode->AdvancedSearch->save();

        // Field ProtectedProducts
        $this->ProtectedProducts->AdvancedSearch->SearchValue = @$filter["x_ProtectedProducts"];
        $this->ProtectedProducts->AdvancedSearch->SearchOperator = @$filter["z_ProtectedProducts"];
        $this->ProtectedProducts->AdvancedSearch->SearchCondition = @$filter["v_ProtectedProducts"];
        $this->ProtectedProducts->AdvancedSearch->SearchValue2 = @$filter["y_ProtectedProducts"];
        $this->ProtectedProducts->AdvancedSearch->SearchOperator2 = @$filter["w_ProtectedProducts"];
        $this->ProtectedProducts->AdvancedSearch->save();

        // Field ProductFullName
        $this->ProductFullName->AdvancedSearch->SearchValue = @$filter["x_ProductFullName"];
        $this->ProductFullName->AdvancedSearch->SearchOperator = @$filter["z_ProductFullName"];
        $this->ProductFullName->AdvancedSearch->SearchCondition = @$filter["v_ProductFullName"];
        $this->ProductFullName->AdvancedSearch->SearchValue2 = @$filter["y_ProductFullName"];
        $this->ProductFullName->AdvancedSearch->SearchOperator2 = @$filter["w_ProductFullName"];
        $this->ProductFullName->AdvancedSearch->save();

        // Field UnitOfMeasure
        $this->UnitOfMeasure->AdvancedSearch->SearchValue = @$filter["x_UnitOfMeasure"];
        $this->UnitOfMeasure->AdvancedSearch->SearchOperator = @$filter["z_UnitOfMeasure"];
        $this->UnitOfMeasure->AdvancedSearch->SearchCondition = @$filter["v_UnitOfMeasure"];
        $this->UnitOfMeasure->AdvancedSearch->SearchValue2 = @$filter["y_UnitOfMeasure"];
        $this->UnitOfMeasure->AdvancedSearch->SearchOperator2 = @$filter["w_UnitOfMeasure"];
        $this->UnitOfMeasure->AdvancedSearch->save();

        // Field UnitDescription
        $this->UnitDescription->AdvancedSearch->SearchValue = @$filter["x_UnitDescription"];
        $this->UnitDescription->AdvancedSearch->SearchOperator = @$filter["z_UnitDescription"];
        $this->UnitDescription->AdvancedSearch->SearchCondition = @$filter["v_UnitDescription"];
        $this->UnitDescription->AdvancedSearch->SearchValue2 = @$filter["y_UnitDescription"];
        $this->UnitDescription->AdvancedSearch->SearchOperator2 = @$filter["w_UnitDescription"];
        $this->UnitDescription->AdvancedSearch->save();

        // Field BulkDescription
        $this->BulkDescription->AdvancedSearch->SearchValue = @$filter["x_BulkDescription"];
        $this->BulkDescription->AdvancedSearch->SearchOperator = @$filter["z_BulkDescription"];
        $this->BulkDescription->AdvancedSearch->SearchCondition = @$filter["v_BulkDescription"];
        $this->BulkDescription->AdvancedSearch->SearchValue2 = @$filter["y_BulkDescription"];
        $this->BulkDescription->AdvancedSearch->SearchOperator2 = @$filter["w_BulkDescription"];
        $this->BulkDescription->AdvancedSearch->save();

        // Field BarCodeDescription
        $this->BarCodeDescription->AdvancedSearch->SearchValue = @$filter["x_BarCodeDescription"];
        $this->BarCodeDescription->AdvancedSearch->SearchOperator = @$filter["z_BarCodeDescription"];
        $this->BarCodeDescription->AdvancedSearch->SearchCondition = @$filter["v_BarCodeDescription"];
        $this->BarCodeDescription->AdvancedSearch->SearchValue2 = @$filter["y_BarCodeDescription"];
        $this->BarCodeDescription->AdvancedSearch->SearchOperator2 = @$filter["w_BarCodeDescription"];
        $this->BarCodeDescription->AdvancedSearch->save();

        // Field PackageInformation
        $this->PackageInformation->AdvancedSearch->SearchValue = @$filter["x_PackageInformation"];
        $this->PackageInformation->AdvancedSearch->SearchOperator = @$filter["z_PackageInformation"];
        $this->PackageInformation->AdvancedSearch->SearchCondition = @$filter["v_PackageInformation"];
        $this->PackageInformation->AdvancedSearch->SearchValue2 = @$filter["y_PackageInformation"];
        $this->PackageInformation->AdvancedSearch->SearchOperator2 = @$filter["w_PackageInformation"];
        $this->PackageInformation->AdvancedSearch->save();

        // Field PackageId
        $this->PackageId->AdvancedSearch->SearchValue = @$filter["x_PackageId"];
        $this->PackageId->AdvancedSearch->SearchOperator = @$filter["z_PackageId"];
        $this->PackageId->AdvancedSearch->SearchCondition = @$filter["v_PackageId"];
        $this->PackageId->AdvancedSearch->SearchValue2 = @$filter["y_PackageId"];
        $this->PackageId->AdvancedSearch->SearchOperator2 = @$filter["w_PackageId"];
        $this->PackageId->AdvancedSearch->save();

        // Field Weight
        $this->Weight->AdvancedSearch->SearchValue = @$filter["x_Weight"];
        $this->Weight->AdvancedSearch->SearchOperator = @$filter["z_Weight"];
        $this->Weight->AdvancedSearch->SearchCondition = @$filter["v_Weight"];
        $this->Weight->AdvancedSearch->SearchValue2 = @$filter["y_Weight"];
        $this->Weight->AdvancedSearch->SearchOperator2 = @$filter["w_Weight"];
        $this->Weight->AdvancedSearch->save();

        // Field AllowFractions
        $this->AllowFractions->AdvancedSearch->SearchValue = @$filter["x_AllowFractions"];
        $this->AllowFractions->AdvancedSearch->SearchOperator = @$filter["z_AllowFractions"];
        $this->AllowFractions->AdvancedSearch->SearchCondition = @$filter["v_AllowFractions"];
        $this->AllowFractions->AdvancedSearch->SearchValue2 = @$filter["y_AllowFractions"];
        $this->AllowFractions->AdvancedSearch->SearchOperator2 = @$filter["w_AllowFractions"];
        $this->AllowFractions->AdvancedSearch->save();

        // Field MinimumStockLevel
        $this->MinimumStockLevel->AdvancedSearch->SearchValue = @$filter["x_MinimumStockLevel"];
        $this->MinimumStockLevel->AdvancedSearch->SearchOperator = @$filter["z_MinimumStockLevel"];
        $this->MinimumStockLevel->AdvancedSearch->SearchCondition = @$filter["v_MinimumStockLevel"];
        $this->MinimumStockLevel->AdvancedSearch->SearchValue2 = @$filter["y_MinimumStockLevel"];
        $this->MinimumStockLevel->AdvancedSearch->SearchOperator2 = @$filter["w_MinimumStockLevel"];
        $this->MinimumStockLevel->AdvancedSearch->save();

        // Field MaximumStockLevel
        $this->MaximumStockLevel->AdvancedSearch->SearchValue = @$filter["x_MaximumStockLevel"];
        $this->MaximumStockLevel->AdvancedSearch->SearchOperator = @$filter["z_MaximumStockLevel"];
        $this->MaximumStockLevel->AdvancedSearch->SearchCondition = @$filter["v_MaximumStockLevel"];
        $this->MaximumStockLevel->AdvancedSearch->SearchValue2 = @$filter["y_MaximumStockLevel"];
        $this->MaximumStockLevel->AdvancedSearch->SearchOperator2 = @$filter["w_MaximumStockLevel"];
        $this->MaximumStockLevel->AdvancedSearch->save();

        // Field ReorderLevel
        $this->ReorderLevel->AdvancedSearch->SearchValue = @$filter["x_ReorderLevel"];
        $this->ReorderLevel->AdvancedSearch->SearchOperator = @$filter["z_ReorderLevel"];
        $this->ReorderLevel->AdvancedSearch->SearchCondition = @$filter["v_ReorderLevel"];
        $this->ReorderLevel->AdvancedSearch->SearchValue2 = @$filter["y_ReorderLevel"];
        $this->ReorderLevel->AdvancedSearch->SearchOperator2 = @$filter["w_ReorderLevel"];
        $this->ReorderLevel->AdvancedSearch->save();

        // Field MinMaxRatio
        $this->MinMaxRatio->AdvancedSearch->SearchValue = @$filter["x_MinMaxRatio"];
        $this->MinMaxRatio->AdvancedSearch->SearchOperator = @$filter["z_MinMaxRatio"];
        $this->MinMaxRatio->AdvancedSearch->SearchCondition = @$filter["v_MinMaxRatio"];
        $this->MinMaxRatio->AdvancedSearch->SearchValue2 = @$filter["y_MinMaxRatio"];
        $this->MinMaxRatio->AdvancedSearch->SearchOperator2 = @$filter["w_MinMaxRatio"];
        $this->MinMaxRatio->AdvancedSearch->save();

        // Field AutoMinMaxRatio
        $this->AutoMinMaxRatio->AdvancedSearch->SearchValue = @$filter["x_AutoMinMaxRatio"];
        $this->AutoMinMaxRatio->AdvancedSearch->SearchOperator = @$filter["z_AutoMinMaxRatio"];
        $this->AutoMinMaxRatio->AdvancedSearch->SearchCondition = @$filter["v_AutoMinMaxRatio"];
        $this->AutoMinMaxRatio->AdvancedSearch->SearchValue2 = @$filter["y_AutoMinMaxRatio"];
        $this->AutoMinMaxRatio->AdvancedSearch->SearchOperator2 = @$filter["w_AutoMinMaxRatio"];
        $this->AutoMinMaxRatio->AdvancedSearch->save();

        // Field ScheduleCode
        $this->ScheduleCode->AdvancedSearch->SearchValue = @$filter["x_ScheduleCode"];
        $this->ScheduleCode->AdvancedSearch->SearchOperator = @$filter["z_ScheduleCode"];
        $this->ScheduleCode->AdvancedSearch->SearchCondition = @$filter["v_ScheduleCode"];
        $this->ScheduleCode->AdvancedSearch->SearchValue2 = @$filter["y_ScheduleCode"];
        $this->ScheduleCode->AdvancedSearch->SearchOperator2 = @$filter["w_ScheduleCode"];
        $this->ScheduleCode->AdvancedSearch->save();

        // Field RopRatio
        $this->RopRatio->AdvancedSearch->SearchValue = @$filter["x_RopRatio"];
        $this->RopRatio->AdvancedSearch->SearchOperator = @$filter["z_RopRatio"];
        $this->RopRatio->AdvancedSearch->SearchCondition = @$filter["v_RopRatio"];
        $this->RopRatio->AdvancedSearch->SearchValue2 = @$filter["y_RopRatio"];
        $this->RopRatio->AdvancedSearch->SearchOperator2 = @$filter["w_RopRatio"];
        $this->RopRatio->AdvancedSearch->save();

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field PurchasePrice
        $this->PurchasePrice->AdvancedSearch->SearchValue = @$filter["x_PurchasePrice"];
        $this->PurchasePrice->AdvancedSearch->SearchOperator = @$filter["z_PurchasePrice"];
        $this->PurchasePrice->AdvancedSearch->SearchCondition = @$filter["v_PurchasePrice"];
        $this->PurchasePrice->AdvancedSearch->SearchValue2 = @$filter["y_PurchasePrice"];
        $this->PurchasePrice->AdvancedSearch->SearchOperator2 = @$filter["w_PurchasePrice"];
        $this->PurchasePrice->AdvancedSearch->save();

        // Field PurchaseUnit
        $this->PurchaseUnit->AdvancedSearch->SearchValue = @$filter["x_PurchaseUnit"];
        $this->PurchaseUnit->AdvancedSearch->SearchOperator = @$filter["z_PurchaseUnit"];
        $this->PurchaseUnit->AdvancedSearch->SearchCondition = @$filter["v_PurchaseUnit"];
        $this->PurchaseUnit->AdvancedSearch->SearchValue2 = @$filter["y_PurchaseUnit"];
        $this->PurchaseUnit->AdvancedSearch->SearchOperator2 = @$filter["w_PurchaseUnit"];
        $this->PurchaseUnit->AdvancedSearch->save();

        // Field PurchaseTaxCode
        $this->PurchaseTaxCode->AdvancedSearch->SearchValue = @$filter["x_PurchaseTaxCode"];
        $this->PurchaseTaxCode->AdvancedSearch->SearchOperator = @$filter["z_PurchaseTaxCode"];
        $this->PurchaseTaxCode->AdvancedSearch->SearchCondition = @$filter["v_PurchaseTaxCode"];
        $this->PurchaseTaxCode->AdvancedSearch->SearchValue2 = @$filter["y_PurchaseTaxCode"];
        $this->PurchaseTaxCode->AdvancedSearch->SearchOperator2 = @$filter["w_PurchaseTaxCode"];
        $this->PurchaseTaxCode->AdvancedSearch->save();

        // Field AllowDirectInward
        $this->AllowDirectInward->AdvancedSearch->SearchValue = @$filter["x_AllowDirectInward"];
        $this->AllowDirectInward->AdvancedSearch->SearchOperator = @$filter["z_AllowDirectInward"];
        $this->AllowDirectInward->AdvancedSearch->SearchCondition = @$filter["v_AllowDirectInward"];
        $this->AllowDirectInward->AdvancedSearch->SearchValue2 = @$filter["y_AllowDirectInward"];
        $this->AllowDirectInward->AdvancedSearch->SearchOperator2 = @$filter["w_AllowDirectInward"];
        $this->AllowDirectInward->AdvancedSearch->save();

        // Field SalePrice
        $this->SalePrice->AdvancedSearch->SearchValue = @$filter["x_SalePrice"];
        $this->SalePrice->AdvancedSearch->SearchOperator = @$filter["z_SalePrice"];
        $this->SalePrice->AdvancedSearch->SearchCondition = @$filter["v_SalePrice"];
        $this->SalePrice->AdvancedSearch->SearchValue2 = @$filter["y_SalePrice"];
        $this->SalePrice->AdvancedSearch->SearchOperator2 = @$filter["w_SalePrice"];
        $this->SalePrice->AdvancedSearch->save();

        // Field SaleUnit
        $this->SaleUnit->AdvancedSearch->SearchValue = @$filter["x_SaleUnit"];
        $this->SaleUnit->AdvancedSearch->SearchOperator = @$filter["z_SaleUnit"];
        $this->SaleUnit->AdvancedSearch->SearchCondition = @$filter["v_SaleUnit"];
        $this->SaleUnit->AdvancedSearch->SearchValue2 = @$filter["y_SaleUnit"];
        $this->SaleUnit->AdvancedSearch->SearchOperator2 = @$filter["w_SaleUnit"];
        $this->SaleUnit->AdvancedSearch->save();

        // Field SalesTaxCode
        $this->SalesTaxCode->AdvancedSearch->SearchValue = @$filter["x_SalesTaxCode"];
        $this->SalesTaxCode->AdvancedSearch->SearchOperator = @$filter["z_SalesTaxCode"];
        $this->SalesTaxCode->AdvancedSearch->SearchCondition = @$filter["v_SalesTaxCode"];
        $this->SalesTaxCode->AdvancedSearch->SearchValue2 = @$filter["y_SalesTaxCode"];
        $this->SalesTaxCode->AdvancedSearch->SearchOperator2 = @$filter["w_SalesTaxCode"];
        $this->SalesTaxCode->AdvancedSearch->save();

        // Field StockReceived
        $this->StockReceived->AdvancedSearch->SearchValue = @$filter["x_StockReceived"];
        $this->StockReceived->AdvancedSearch->SearchOperator = @$filter["z_StockReceived"];
        $this->StockReceived->AdvancedSearch->SearchCondition = @$filter["v_StockReceived"];
        $this->StockReceived->AdvancedSearch->SearchValue2 = @$filter["y_StockReceived"];
        $this->StockReceived->AdvancedSearch->SearchOperator2 = @$filter["w_StockReceived"];
        $this->StockReceived->AdvancedSearch->save();

        // Field TotalStock
        $this->TotalStock->AdvancedSearch->SearchValue = @$filter["x_TotalStock"];
        $this->TotalStock->AdvancedSearch->SearchOperator = @$filter["z_TotalStock"];
        $this->TotalStock->AdvancedSearch->SearchCondition = @$filter["v_TotalStock"];
        $this->TotalStock->AdvancedSearch->SearchValue2 = @$filter["y_TotalStock"];
        $this->TotalStock->AdvancedSearch->SearchOperator2 = @$filter["w_TotalStock"];
        $this->TotalStock->AdvancedSearch->save();

        // Field StockType
        $this->StockType->AdvancedSearch->SearchValue = @$filter["x_StockType"];
        $this->StockType->AdvancedSearch->SearchOperator = @$filter["z_StockType"];
        $this->StockType->AdvancedSearch->SearchCondition = @$filter["v_StockType"];
        $this->StockType->AdvancedSearch->SearchValue2 = @$filter["y_StockType"];
        $this->StockType->AdvancedSearch->SearchOperator2 = @$filter["w_StockType"];
        $this->StockType->AdvancedSearch->save();

        // Field StockCheckDate
        $this->StockCheckDate->AdvancedSearch->SearchValue = @$filter["x_StockCheckDate"];
        $this->StockCheckDate->AdvancedSearch->SearchOperator = @$filter["z_StockCheckDate"];
        $this->StockCheckDate->AdvancedSearch->SearchCondition = @$filter["v_StockCheckDate"];
        $this->StockCheckDate->AdvancedSearch->SearchValue2 = @$filter["y_StockCheckDate"];
        $this->StockCheckDate->AdvancedSearch->SearchOperator2 = @$filter["w_StockCheckDate"];
        $this->StockCheckDate->AdvancedSearch->save();

        // Field StockAdjustmentDate
        $this->StockAdjustmentDate->AdvancedSearch->SearchValue = @$filter["x_StockAdjustmentDate"];
        $this->StockAdjustmentDate->AdvancedSearch->SearchOperator = @$filter["z_StockAdjustmentDate"];
        $this->StockAdjustmentDate->AdvancedSearch->SearchCondition = @$filter["v_StockAdjustmentDate"];
        $this->StockAdjustmentDate->AdvancedSearch->SearchValue2 = @$filter["y_StockAdjustmentDate"];
        $this->StockAdjustmentDate->AdvancedSearch->SearchOperator2 = @$filter["w_StockAdjustmentDate"];
        $this->StockAdjustmentDate->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field CostCentre
        $this->CostCentre->AdvancedSearch->SearchValue = @$filter["x_CostCentre"];
        $this->CostCentre->AdvancedSearch->SearchOperator = @$filter["z_CostCentre"];
        $this->CostCentre->AdvancedSearch->SearchCondition = @$filter["v_CostCentre"];
        $this->CostCentre->AdvancedSearch->SearchValue2 = @$filter["y_CostCentre"];
        $this->CostCentre->AdvancedSearch->SearchOperator2 = @$filter["w_CostCentre"];
        $this->CostCentre->AdvancedSearch->save();

        // Field ProductType
        $this->ProductType->AdvancedSearch->SearchValue = @$filter["x_ProductType"];
        $this->ProductType->AdvancedSearch->SearchOperator = @$filter["z_ProductType"];
        $this->ProductType->AdvancedSearch->SearchCondition = @$filter["v_ProductType"];
        $this->ProductType->AdvancedSearch->SearchValue2 = @$filter["y_ProductType"];
        $this->ProductType->AdvancedSearch->SearchOperator2 = @$filter["w_ProductType"];
        $this->ProductType->AdvancedSearch->save();

        // Field TaxAmount
        $this->TaxAmount->AdvancedSearch->SearchValue = @$filter["x_TaxAmount"];
        $this->TaxAmount->AdvancedSearch->SearchOperator = @$filter["z_TaxAmount"];
        $this->TaxAmount->AdvancedSearch->SearchCondition = @$filter["v_TaxAmount"];
        $this->TaxAmount->AdvancedSearch->SearchValue2 = @$filter["y_TaxAmount"];
        $this->TaxAmount->AdvancedSearch->SearchOperator2 = @$filter["w_TaxAmount"];
        $this->TaxAmount->AdvancedSearch->save();

        // Field TaxId
        $this->TaxId->AdvancedSearch->SearchValue = @$filter["x_TaxId"];
        $this->TaxId->AdvancedSearch->SearchOperator = @$filter["z_TaxId"];
        $this->TaxId->AdvancedSearch->SearchCondition = @$filter["v_TaxId"];
        $this->TaxId->AdvancedSearch->SearchValue2 = @$filter["y_TaxId"];
        $this->TaxId->AdvancedSearch->SearchOperator2 = @$filter["w_TaxId"];
        $this->TaxId->AdvancedSearch->save();

        // Field ResaleTaxApplicable
        $this->ResaleTaxApplicable->AdvancedSearch->SearchValue = @$filter["x_ResaleTaxApplicable"];
        $this->ResaleTaxApplicable->AdvancedSearch->SearchOperator = @$filter["z_ResaleTaxApplicable"];
        $this->ResaleTaxApplicable->AdvancedSearch->SearchCondition = @$filter["v_ResaleTaxApplicable"];
        $this->ResaleTaxApplicable->AdvancedSearch->SearchValue2 = @$filter["y_ResaleTaxApplicable"];
        $this->ResaleTaxApplicable->AdvancedSearch->SearchOperator2 = @$filter["w_ResaleTaxApplicable"];
        $this->ResaleTaxApplicable->AdvancedSearch->save();

        // Field CstOtherTax
        $this->CstOtherTax->AdvancedSearch->SearchValue = @$filter["x_CstOtherTax"];
        $this->CstOtherTax->AdvancedSearch->SearchOperator = @$filter["z_CstOtherTax"];
        $this->CstOtherTax->AdvancedSearch->SearchCondition = @$filter["v_CstOtherTax"];
        $this->CstOtherTax->AdvancedSearch->SearchValue2 = @$filter["y_CstOtherTax"];
        $this->CstOtherTax->AdvancedSearch->SearchOperator2 = @$filter["w_CstOtherTax"];
        $this->CstOtherTax->AdvancedSearch->save();

        // Field TotalTax
        $this->TotalTax->AdvancedSearch->SearchValue = @$filter["x_TotalTax"];
        $this->TotalTax->AdvancedSearch->SearchOperator = @$filter["z_TotalTax"];
        $this->TotalTax->AdvancedSearch->SearchCondition = @$filter["v_TotalTax"];
        $this->TotalTax->AdvancedSearch->SearchValue2 = @$filter["y_TotalTax"];
        $this->TotalTax->AdvancedSearch->SearchOperator2 = @$filter["w_TotalTax"];
        $this->TotalTax->AdvancedSearch->save();

        // Field ItemCost
        $this->ItemCost->AdvancedSearch->SearchValue = @$filter["x_ItemCost"];
        $this->ItemCost->AdvancedSearch->SearchOperator = @$filter["z_ItemCost"];
        $this->ItemCost->AdvancedSearch->SearchCondition = @$filter["v_ItemCost"];
        $this->ItemCost->AdvancedSearch->SearchValue2 = @$filter["y_ItemCost"];
        $this->ItemCost->AdvancedSearch->SearchOperator2 = @$filter["w_ItemCost"];
        $this->ItemCost->AdvancedSearch->save();

        // Field ExpiryDate
        $this->ExpiryDate->AdvancedSearch->SearchValue = @$filter["x_ExpiryDate"];
        $this->ExpiryDate->AdvancedSearch->SearchOperator = @$filter["z_ExpiryDate"];
        $this->ExpiryDate->AdvancedSearch->SearchCondition = @$filter["v_ExpiryDate"];
        $this->ExpiryDate->AdvancedSearch->SearchValue2 = @$filter["y_ExpiryDate"];
        $this->ExpiryDate->AdvancedSearch->SearchOperator2 = @$filter["w_ExpiryDate"];
        $this->ExpiryDate->AdvancedSearch->save();

        // Field BatchDescription
        $this->BatchDescription->AdvancedSearch->SearchValue = @$filter["x_BatchDescription"];
        $this->BatchDescription->AdvancedSearch->SearchOperator = @$filter["z_BatchDescription"];
        $this->BatchDescription->AdvancedSearch->SearchCondition = @$filter["v_BatchDescription"];
        $this->BatchDescription->AdvancedSearch->SearchValue2 = @$filter["y_BatchDescription"];
        $this->BatchDescription->AdvancedSearch->SearchOperator2 = @$filter["w_BatchDescription"];
        $this->BatchDescription->AdvancedSearch->save();

        // Field FreeScheme
        $this->FreeScheme->AdvancedSearch->SearchValue = @$filter["x_FreeScheme"];
        $this->FreeScheme->AdvancedSearch->SearchOperator = @$filter["z_FreeScheme"];
        $this->FreeScheme->AdvancedSearch->SearchCondition = @$filter["v_FreeScheme"];
        $this->FreeScheme->AdvancedSearch->SearchValue2 = @$filter["y_FreeScheme"];
        $this->FreeScheme->AdvancedSearch->SearchOperator2 = @$filter["w_FreeScheme"];
        $this->FreeScheme->AdvancedSearch->save();

        // Field CashDiscountEligibility
        $this->CashDiscountEligibility->AdvancedSearch->SearchValue = @$filter["x_CashDiscountEligibility"];
        $this->CashDiscountEligibility->AdvancedSearch->SearchOperator = @$filter["z_CashDiscountEligibility"];
        $this->CashDiscountEligibility->AdvancedSearch->SearchCondition = @$filter["v_CashDiscountEligibility"];
        $this->CashDiscountEligibility->AdvancedSearch->SearchValue2 = @$filter["y_CashDiscountEligibility"];
        $this->CashDiscountEligibility->AdvancedSearch->SearchOperator2 = @$filter["w_CashDiscountEligibility"];
        $this->CashDiscountEligibility->AdvancedSearch->save();

        // Field DiscountPerAllowInBill
        $this->DiscountPerAllowInBill->AdvancedSearch->SearchValue = @$filter["x_DiscountPerAllowInBill"];
        $this->DiscountPerAllowInBill->AdvancedSearch->SearchOperator = @$filter["z_DiscountPerAllowInBill"];
        $this->DiscountPerAllowInBill->AdvancedSearch->SearchCondition = @$filter["v_DiscountPerAllowInBill"];
        $this->DiscountPerAllowInBill->AdvancedSearch->SearchValue2 = @$filter["y_DiscountPerAllowInBill"];
        $this->DiscountPerAllowInBill->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountPerAllowInBill"];
        $this->DiscountPerAllowInBill->AdvancedSearch->save();

        // Field Discount
        $this->Discount->AdvancedSearch->SearchValue = @$filter["x_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator = @$filter["z_Discount"];
        $this->Discount->AdvancedSearch->SearchCondition = @$filter["v_Discount"];
        $this->Discount->AdvancedSearch->SearchValue2 = @$filter["y_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator2 = @$filter["w_Discount"];
        $this->Discount->AdvancedSearch->save();

        // Field TotalAmount
        $this->TotalAmount->AdvancedSearch->SearchValue = @$filter["x_TotalAmount"];
        $this->TotalAmount->AdvancedSearch->SearchOperator = @$filter["z_TotalAmount"];
        $this->TotalAmount->AdvancedSearch->SearchCondition = @$filter["v_TotalAmount"];
        $this->TotalAmount->AdvancedSearch->SearchValue2 = @$filter["y_TotalAmount"];
        $this->TotalAmount->AdvancedSearch->SearchOperator2 = @$filter["w_TotalAmount"];
        $this->TotalAmount->AdvancedSearch->save();

        // Field StandardMargin
        $this->StandardMargin->AdvancedSearch->SearchValue = @$filter["x_StandardMargin"];
        $this->StandardMargin->AdvancedSearch->SearchOperator = @$filter["z_StandardMargin"];
        $this->StandardMargin->AdvancedSearch->SearchCondition = @$filter["v_StandardMargin"];
        $this->StandardMargin->AdvancedSearch->SearchValue2 = @$filter["y_StandardMargin"];
        $this->StandardMargin->AdvancedSearch->SearchOperator2 = @$filter["w_StandardMargin"];
        $this->StandardMargin->AdvancedSearch->save();

        // Field Margin
        $this->Margin->AdvancedSearch->SearchValue = @$filter["x_Margin"];
        $this->Margin->AdvancedSearch->SearchOperator = @$filter["z_Margin"];
        $this->Margin->AdvancedSearch->SearchCondition = @$filter["v_Margin"];
        $this->Margin->AdvancedSearch->SearchValue2 = @$filter["y_Margin"];
        $this->Margin->AdvancedSearch->SearchOperator2 = @$filter["w_Margin"];
        $this->Margin->AdvancedSearch->save();

        // Field MarginId
        $this->MarginId->AdvancedSearch->SearchValue = @$filter["x_MarginId"];
        $this->MarginId->AdvancedSearch->SearchOperator = @$filter["z_MarginId"];
        $this->MarginId->AdvancedSearch->SearchCondition = @$filter["v_MarginId"];
        $this->MarginId->AdvancedSearch->SearchValue2 = @$filter["y_MarginId"];
        $this->MarginId->AdvancedSearch->SearchOperator2 = @$filter["w_MarginId"];
        $this->MarginId->AdvancedSearch->save();

        // Field ExpectedMargin
        $this->ExpectedMargin->AdvancedSearch->SearchValue = @$filter["x_ExpectedMargin"];
        $this->ExpectedMargin->AdvancedSearch->SearchOperator = @$filter["z_ExpectedMargin"];
        $this->ExpectedMargin->AdvancedSearch->SearchCondition = @$filter["v_ExpectedMargin"];
        $this->ExpectedMargin->AdvancedSearch->SearchValue2 = @$filter["y_ExpectedMargin"];
        $this->ExpectedMargin->AdvancedSearch->SearchOperator2 = @$filter["w_ExpectedMargin"];
        $this->ExpectedMargin->AdvancedSearch->save();

        // Field SurchargeBeforeTax
        $this->SurchargeBeforeTax->AdvancedSearch->SearchValue = @$filter["x_SurchargeBeforeTax"];
        $this->SurchargeBeforeTax->AdvancedSearch->SearchOperator = @$filter["z_SurchargeBeforeTax"];
        $this->SurchargeBeforeTax->AdvancedSearch->SearchCondition = @$filter["v_SurchargeBeforeTax"];
        $this->SurchargeBeforeTax->AdvancedSearch->SearchValue2 = @$filter["y_SurchargeBeforeTax"];
        $this->SurchargeBeforeTax->AdvancedSearch->SearchOperator2 = @$filter["w_SurchargeBeforeTax"];
        $this->SurchargeBeforeTax->AdvancedSearch->save();

        // Field SurchargeAfterTax
        $this->SurchargeAfterTax->AdvancedSearch->SearchValue = @$filter["x_SurchargeAfterTax"];
        $this->SurchargeAfterTax->AdvancedSearch->SearchOperator = @$filter["z_SurchargeAfterTax"];
        $this->SurchargeAfterTax->AdvancedSearch->SearchCondition = @$filter["v_SurchargeAfterTax"];
        $this->SurchargeAfterTax->AdvancedSearch->SearchValue2 = @$filter["y_SurchargeAfterTax"];
        $this->SurchargeAfterTax->AdvancedSearch->SearchOperator2 = @$filter["w_SurchargeAfterTax"];
        $this->SurchargeAfterTax->AdvancedSearch->save();

        // Field TempOrderNo
        $this->TempOrderNo->AdvancedSearch->SearchValue = @$filter["x_TempOrderNo"];
        $this->TempOrderNo->AdvancedSearch->SearchOperator = @$filter["z_TempOrderNo"];
        $this->TempOrderNo->AdvancedSearch->SearchCondition = @$filter["v_TempOrderNo"];
        $this->TempOrderNo->AdvancedSearch->SearchValue2 = @$filter["y_TempOrderNo"];
        $this->TempOrderNo->AdvancedSearch->SearchOperator2 = @$filter["w_TempOrderNo"];
        $this->TempOrderNo->AdvancedSearch->save();

        // Field TempOrderDate
        $this->TempOrderDate->AdvancedSearch->SearchValue = @$filter["x_TempOrderDate"];
        $this->TempOrderDate->AdvancedSearch->SearchOperator = @$filter["z_TempOrderDate"];
        $this->TempOrderDate->AdvancedSearch->SearchCondition = @$filter["v_TempOrderDate"];
        $this->TempOrderDate->AdvancedSearch->SearchValue2 = @$filter["y_TempOrderDate"];
        $this->TempOrderDate->AdvancedSearch->SearchOperator2 = @$filter["w_TempOrderDate"];
        $this->TempOrderDate->AdvancedSearch->save();

        // Field OrderUnit
        $this->OrderUnit->AdvancedSearch->SearchValue = @$filter["x_OrderUnit"];
        $this->OrderUnit->AdvancedSearch->SearchOperator = @$filter["z_OrderUnit"];
        $this->OrderUnit->AdvancedSearch->SearchCondition = @$filter["v_OrderUnit"];
        $this->OrderUnit->AdvancedSearch->SearchValue2 = @$filter["y_OrderUnit"];
        $this->OrderUnit->AdvancedSearch->SearchOperator2 = @$filter["w_OrderUnit"];
        $this->OrderUnit->AdvancedSearch->save();

        // Field OrderQuantity
        $this->OrderQuantity->AdvancedSearch->SearchValue = @$filter["x_OrderQuantity"];
        $this->OrderQuantity->AdvancedSearch->SearchOperator = @$filter["z_OrderQuantity"];
        $this->OrderQuantity->AdvancedSearch->SearchCondition = @$filter["v_OrderQuantity"];
        $this->OrderQuantity->AdvancedSearch->SearchValue2 = @$filter["y_OrderQuantity"];
        $this->OrderQuantity->AdvancedSearch->SearchOperator2 = @$filter["w_OrderQuantity"];
        $this->OrderQuantity->AdvancedSearch->save();

        // Field MarkForOrder
        $this->MarkForOrder->AdvancedSearch->SearchValue = @$filter["x_MarkForOrder"];
        $this->MarkForOrder->AdvancedSearch->SearchOperator = @$filter["z_MarkForOrder"];
        $this->MarkForOrder->AdvancedSearch->SearchCondition = @$filter["v_MarkForOrder"];
        $this->MarkForOrder->AdvancedSearch->SearchValue2 = @$filter["y_MarkForOrder"];
        $this->MarkForOrder->AdvancedSearch->SearchOperator2 = @$filter["w_MarkForOrder"];
        $this->MarkForOrder->AdvancedSearch->save();

        // Field OrderAllId
        $this->OrderAllId->AdvancedSearch->SearchValue = @$filter["x_OrderAllId"];
        $this->OrderAllId->AdvancedSearch->SearchOperator = @$filter["z_OrderAllId"];
        $this->OrderAllId->AdvancedSearch->SearchCondition = @$filter["v_OrderAllId"];
        $this->OrderAllId->AdvancedSearch->SearchValue2 = @$filter["y_OrderAllId"];
        $this->OrderAllId->AdvancedSearch->SearchOperator2 = @$filter["w_OrderAllId"];
        $this->OrderAllId->AdvancedSearch->save();

        // Field CalculateOrderQty
        $this->CalculateOrderQty->AdvancedSearch->SearchValue = @$filter["x_CalculateOrderQty"];
        $this->CalculateOrderQty->AdvancedSearch->SearchOperator = @$filter["z_CalculateOrderQty"];
        $this->CalculateOrderQty->AdvancedSearch->SearchCondition = @$filter["v_CalculateOrderQty"];
        $this->CalculateOrderQty->AdvancedSearch->SearchValue2 = @$filter["y_CalculateOrderQty"];
        $this->CalculateOrderQty->AdvancedSearch->SearchOperator2 = @$filter["w_CalculateOrderQty"];
        $this->CalculateOrderQty->AdvancedSearch->save();

        // Field SubLocation
        $this->SubLocation->AdvancedSearch->SearchValue = @$filter["x_SubLocation"];
        $this->SubLocation->AdvancedSearch->SearchOperator = @$filter["z_SubLocation"];
        $this->SubLocation->AdvancedSearch->SearchCondition = @$filter["v_SubLocation"];
        $this->SubLocation->AdvancedSearch->SearchValue2 = @$filter["y_SubLocation"];
        $this->SubLocation->AdvancedSearch->SearchOperator2 = @$filter["w_SubLocation"];
        $this->SubLocation->AdvancedSearch->save();

        // Field CategoryCode
        $this->CategoryCode->AdvancedSearch->SearchValue = @$filter["x_CategoryCode"];
        $this->CategoryCode->AdvancedSearch->SearchOperator = @$filter["z_CategoryCode"];
        $this->CategoryCode->AdvancedSearch->SearchCondition = @$filter["v_CategoryCode"];
        $this->CategoryCode->AdvancedSearch->SearchValue2 = @$filter["y_CategoryCode"];
        $this->CategoryCode->AdvancedSearch->SearchOperator2 = @$filter["w_CategoryCode"];
        $this->CategoryCode->AdvancedSearch->save();

        // Field SubCategory
        $this->SubCategory->AdvancedSearch->SearchValue = @$filter["x_SubCategory"];
        $this->SubCategory->AdvancedSearch->SearchOperator = @$filter["z_SubCategory"];
        $this->SubCategory->AdvancedSearch->SearchCondition = @$filter["v_SubCategory"];
        $this->SubCategory->AdvancedSearch->SearchValue2 = @$filter["y_SubCategory"];
        $this->SubCategory->AdvancedSearch->SearchOperator2 = @$filter["w_SubCategory"];
        $this->SubCategory->AdvancedSearch->save();

        // Field FlexCategoryCode
        $this->FlexCategoryCode->AdvancedSearch->SearchValue = @$filter["x_FlexCategoryCode"];
        $this->FlexCategoryCode->AdvancedSearch->SearchOperator = @$filter["z_FlexCategoryCode"];
        $this->FlexCategoryCode->AdvancedSearch->SearchCondition = @$filter["v_FlexCategoryCode"];
        $this->FlexCategoryCode->AdvancedSearch->SearchValue2 = @$filter["y_FlexCategoryCode"];
        $this->FlexCategoryCode->AdvancedSearch->SearchOperator2 = @$filter["w_FlexCategoryCode"];
        $this->FlexCategoryCode->AdvancedSearch->save();

        // Field ABCSaleQty
        $this->ABCSaleQty->AdvancedSearch->SearchValue = @$filter["x_ABCSaleQty"];
        $this->ABCSaleQty->AdvancedSearch->SearchOperator = @$filter["z_ABCSaleQty"];
        $this->ABCSaleQty->AdvancedSearch->SearchCondition = @$filter["v_ABCSaleQty"];
        $this->ABCSaleQty->AdvancedSearch->SearchValue2 = @$filter["y_ABCSaleQty"];
        $this->ABCSaleQty->AdvancedSearch->SearchOperator2 = @$filter["w_ABCSaleQty"];
        $this->ABCSaleQty->AdvancedSearch->save();

        // Field ABCSaleValue
        $this->ABCSaleValue->AdvancedSearch->SearchValue = @$filter["x_ABCSaleValue"];
        $this->ABCSaleValue->AdvancedSearch->SearchOperator = @$filter["z_ABCSaleValue"];
        $this->ABCSaleValue->AdvancedSearch->SearchCondition = @$filter["v_ABCSaleValue"];
        $this->ABCSaleValue->AdvancedSearch->SearchValue2 = @$filter["y_ABCSaleValue"];
        $this->ABCSaleValue->AdvancedSearch->SearchOperator2 = @$filter["w_ABCSaleValue"];
        $this->ABCSaleValue->AdvancedSearch->save();

        // Field ConvertionFactor
        $this->ConvertionFactor->AdvancedSearch->SearchValue = @$filter["x_ConvertionFactor"];
        $this->ConvertionFactor->AdvancedSearch->SearchOperator = @$filter["z_ConvertionFactor"];
        $this->ConvertionFactor->AdvancedSearch->SearchCondition = @$filter["v_ConvertionFactor"];
        $this->ConvertionFactor->AdvancedSearch->SearchValue2 = @$filter["y_ConvertionFactor"];
        $this->ConvertionFactor->AdvancedSearch->SearchOperator2 = @$filter["w_ConvertionFactor"];
        $this->ConvertionFactor->AdvancedSearch->save();

        // Field ConvertionUnitDesc
        $this->ConvertionUnitDesc->AdvancedSearch->SearchValue = @$filter["x_ConvertionUnitDesc"];
        $this->ConvertionUnitDesc->AdvancedSearch->SearchOperator = @$filter["z_ConvertionUnitDesc"];
        $this->ConvertionUnitDesc->AdvancedSearch->SearchCondition = @$filter["v_ConvertionUnitDesc"];
        $this->ConvertionUnitDesc->AdvancedSearch->SearchValue2 = @$filter["y_ConvertionUnitDesc"];
        $this->ConvertionUnitDesc->AdvancedSearch->SearchOperator2 = @$filter["w_ConvertionUnitDesc"];
        $this->ConvertionUnitDesc->AdvancedSearch->save();

        // Field TransactionId
        $this->TransactionId->AdvancedSearch->SearchValue = @$filter["x_TransactionId"];
        $this->TransactionId->AdvancedSearch->SearchOperator = @$filter["z_TransactionId"];
        $this->TransactionId->AdvancedSearch->SearchCondition = @$filter["v_TransactionId"];
        $this->TransactionId->AdvancedSearch->SearchValue2 = @$filter["y_TransactionId"];
        $this->TransactionId->AdvancedSearch->SearchOperator2 = @$filter["w_TransactionId"];
        $this->TransactionId->AdvancedSearch->save();

        // Field SoldProductId
        $this->SoldProductId->AdvancedSearch->SearchValue = @$filter["x_SoldProductId"];
        $this->SoldProductId->AdvancedSearch->SearchOperator = @$filter["z_SoldProductId"];
        $this->SoldProductId->AdvancedSearch->SearchCondition = @$filter["v_SoldProductId"];
        $this->SoldProductId->AdvancedSearch->SearchValue2 = @$filter["y_SoldProductId"];
        $this->SoldProductId->AdvancedSearch->SearchOperator2 = @$filter["w_SoldProductId"];
        $this->SoldProductId->AdvancedSearch->save();

        // Field WantedBookId
        $this->WantedBookId->AdvancedSearch->SearchValue = @$filter["x_WantedBookId"];
        $this->WantedBookId->AdvancedSearch->SearchOperator = @$filter["z_WantedBookId"];
        $this->WantedBookId->AdvancedSearch->SearchCondition = @$filter["v_WantedBookId"];
        $this->WantedBookId->AdvancedSearch->SearchValue2 = @$filter["y_WantedBookId"];
        $this->WantedBookId->AdvancedSearch->SearchOperator2 = @$filter["w_WantedBookId"];
        $this->WantedBookId->AdvancedSearch->save();

        // Field AllId
        $this->AllId->AdvancedSearch->SearchValue = @$filter["x_AllId"];
        $this->AllId->AdvancedSearch->SearchOperator = @$filter["z_AllId"];
        $this->AllId->AdvancedSearch->SearchCondition = @$filter["v_AllId"];
        $this->AllId->AdvancedSearch->SearchValue2 = @$filter["y_AllId"];
        $this->AllId->AdvancedSearch->SearchOperator2 = @$filter["w_AllId"];
        $this->AllId->AdvancedSearch->save();

        // Field BatchAndExpiryCompulsory
        $this->BatchAndExpiryCompulsory->AdvancedSearch->SearchValue = @$filter["x_BatchAndExpiryCompulsory"];
        $this->BatchAndExpiryCompulsory->AdvancedSearch->SearchOperator = @$filter["z_BatchAndExpiryCompulsory"];
        $this->BatchAndExpiryCompulsory->AdvancedSearch->SearchCondition = @$filter["v_BatchAndExpiryCompulsory"];
        $this->BatchAndExpiryCompulsory->AdvancedSearch->SearchValue2 = @$filter["y_BatchAndExpiryCompulsory"];
        $this->BatchAndExpiryCompulsory->AdvancedSearch->SearchOperator2 = @$filter["w_BatchAndExpiryCompulsory"];
        $this->BatchAndExpiryCompulsory->AdvancedSearch->save();

        // Field BatchStockForWantedBook
        $this->BatchStockForWantedBook->AdvancedSearch->SearchValue = @$filter["x_BatchStockForWantedBook"];
        $this->BatchStockForWantedBook->AdvancedSearch->SearchOperator = @$filter["z_BatchStockForWantedBook"];
        $this->BatchStockForWantedBook->AdvancedSearch->SearchCondition = @$filter["v_BatchStockForWantedBook"];
        $this->BatchStockForWantedBook->AdvancedSearch->SearchValue2 = @$filter["y_BatchStockForWantedBook"];
        $this->BatchStockForWantedBook->AdvancedSearch->SearchOperator2 = @$filter["w_BatchStockForWantedBook"];
        $this->BatchStockForWantedBook->AdvancedSearch->save();

        // Field UnitBasedBilling
        $this->UnitBasedBilling->AdvancedSearch->SearchValue = @$filter["x_UnitBasedBilling"];
        $this->UnitBasedBilling->AdvancedSearch->SearchOperator = @$filter["z_UnitBasedBilling"];
        $this->UnitBasedBilling->AdvancedSearch->SearchCondition = @$filter["v_UnitBasedBilling"];
        $this->UnitBasedBilling->AdvancedSearch->SearchValue2 = @$filter["y_UnitBasedBilling"];
        $this->UnitBasedBilling->AdvancedSearch->SearchOperator2 = @$filter["w_UnitBasedBilling"];
        $this->UnitBasedBilling->AdvancedSearch->save();

        // Field DoNotCheckStock
        $this->DoNotCheckStock->AdvancedSearch->SearchValue = @$filter["x_DoNotCheckStock"];
        $this->DoNotCheckStock->AdvancedSearch->SearchOperator = @$filter["z_DoNotCheckStock"];
        $this->DoNotCheckStock->AdvancedSearch->SearchCondition = @$filter["v_DoNotCheckStock"];
        $this->DoNotCheckStock->AdvancedSearch->SearchValue2 = @$filter["y_DoNotCheckStock"];
        $this->DoNotCheckStock->AdvancedSearch->SearchOperator2 = @$filter["w_DoNotCheckStock"];
        $this->DoNotCheckStock->AdvancedSearch->save();

        // Field AcceptRate
        $this->AcceptRate->AdvancedSearch->SearchValue = @$filter["x_AcceptRate"];
        $this->AcceptRate->AdvancedSearch->SearchOperator = @$filter["z_AcceptRate"];
        $this->AcceptRate->AdvancedSearch->SearchCondition = @$filter["v_AcceptRate"];
        $this->AcceptRate->AdvancedSearch->SearchValue2 = @$filter["y_AcceptRate"];
        $this->AcceptRate->AdvancedSearch->SearchOperator2 = @$filter["w_AcceptRate"];
        $this->AcceptRate->AdvancedSearch->save();

        // Field PriceLevel
        $this->PriceLevel->AdvancedSearch->SearchValue = @$filter["x_PriceLevel"];
        $this->PriceLevel->AdvancedSearch->SearchOperator = @$filter["z_PriceLevel"];
        $this->PriceLevel->AdvancedSearch->SearchCondition = @$filter["v_PriceLevel"];
        $this->PriceLevel->AdvancedSearch->SearchValue2 = @$filter["y_PriceLevel"];
        $this->PriceLevel->AdvancedSearch->SearchOperator2 = @$filter["w_PriceLevel"];
        $this->PriceLevel->AdvancedSearch->save();

        // Field LastQuotePrice
        $this->LastQuotePrice->AdvancedSearch->SearchValue = @$filter["x_LastQuotePrice"];
        $this->LastQuotePrice->AdvancedSearch->SearchOperator = @$filter["z_LastQuotePrice"];
        $this->LastQuotePrice->AdvancedSearch->SearchCondition = @$filter["v_LastQuotePrice"];
        $this->LastQuotePrice->AdvancedSearch->SearchValue2 = @$filter["y_LastQuotePrice"];
        $this->LastQuotePrice->AdvancedSearch->SearchOperator2 = @$filter["w_LastQuotePrice"];
        $this->LastQuotePrice->AdvancedSearch->save();

        // Field PriceChange
        $this->PriceChange->AdvancedSearch->SearchValue = @$filter["x_PriceChange"];
        $this->PriceChange->AdvancedSearch->SearchOperator = @$filter["z_PriceChange"];
        $this->PriceChange->AdvancedSearch->SearchCondition = @$filter["v_PriceChange"];
        $this->PriceChange->AdvancedSearch->SearchValue2 = @$filter["y_PriceChange"];
        $this->PriceChange->AdvancedSearch->SearchOperator2 = @$filter["w_PriceChange"];
        $this->PriceChange->AdvancedSearch->save();

        // Field CommodityCode
        $this->CommodityCode->AdvancedSearch->SearchValue = @$filter["x_CommodityCode"];
        $this->CommodityCode->AdvancedSearch->SearchOperator = @$filter["z_CommodityCode"];
        $this->CommodityCode->AdvancedSearch->SearchCondition = @$filter["v_CommodityCode"];
        $this->CommodityCode->AdvancedSearch->SearchValue2 = @$filter["y_CommodityCode"];
        $this->CommodityCode->AdvancedSearch->SearchOperator2 = @$filter["w_CommodityCode"];
        $this->CommodityCode->AdvancedSearch->save();

        // Field InstitutePrice
        $this->InstitutePrice->AdvancedSearch->SearchValue = @$filter["x_InstitutePrice"];
        $this->InstitutePrice->AdvancedSearch->SearchOperator = @$filter["z_InstitutePrice"];
        $this->InstitutePrice->AdvancedSearch->SearchCondition = @$filter["v_InstitutePrice"];
        $this->InstitutePrice->AdvancedSearch->SearchValue2 = @$filter["y_InstitutePrice"];
        $this->InstitutePrice->AdvancedSearch->SearchOperator2 = @$filter["w_InstitutePrice"];
        $this->InstitutePrice->AdvancedSearch->save();

        // Field CtrlOrDCtrlProduct
        $this->CtrlOrDCtrlProduct->AdvancedSearch->SearchValue = @$filter["x_CtrlOrDCtrlProduct"];
        $this->CtrlOrDCtrlProduct->AdvancedSearch->SearchOperator = @$filter["z_CtrlOrDCtrlProduct"];
        $this->CtrlOrDCtrlProduct->AdvancedSearch->SearchCondition = @$filter["v_CtrlOrDCtrlProduct"];
        $this->CtrlOrDCtrlProduct->AdvancedSearch->SearchValue2 = @$filter["y_CtrlOrDCtrlProduct"];
        $this->CtrlOrDCtrlProduct->AdvancedSearch->SearchOperator2 = @$filter["w_CtrlOrDCtrlProduct"];
        $this->CtrlOrDCtrlProduct->AdvancedSearch->save();

        // Field ImportedDate
        $this->ImportedDate->AdvancedSearch->SearchValue = @$filter["x_ImportedDate"];
        $this->ImportedDate->AdvancedSearch->SearchOperator = @$filter["z_ImportedDate"];
        $this->ImportedDate->AdvancedSearch->SearchCondition = @$filter["v_ImportedDate"];
        $this->ImportedDate->AdvancedSearch->SearchValue2 = @$filter["y_ImportedDate"];
        $this->ImportedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ImportedDate"];
        $this->ImportedDate->AdvancedSearch->save();

        // Field IsImported
        $this->IsImported->AdvancedSearch->SearchValue = @$filter["x_IsImported"];
        $this->IsImported->AdvancedSearch->SearchOperator = @$filter["z_IsImported"];
        $this->IsImported->AdvancedSearch->SearchCondition = @$filter["v_IsImported"];
        $this->IsImported->AdvancedSearch->SearchValue2 = @$filter["y_IsImported"];
        $this->IsImported->AdvancedSearch->SearchOperator2 = @$filter["w_IsImported"];
        $this->IsImported->AdvancedSearch->save();

        // Field FileName
        $this->FileName->AdvancedSearch->SearchValue = @$filter["x_FileName"];
        $this->FileName->AdvancedSearch->SearchOperator = @$filter["z_FileName"];
        $this->FileName->AdvancedSearch->SearchCondition = @$filter["v_FileName"];
        $this->FileName->AdvancedSearch->SearchValue2 = @$filter["y_FileName"];
        $this->FileName->AdvancedSearch->SearchOperator2 = @$filter["w_FileName"];
        $this->FileName->AdvancedSearch->save();

        // Field LPName
        $this->LPName->AdvancedSearch->SearchValue = @$filter["x_LPName"];
        $this->LPName->AdvancedSearch->SearchOperator = @$filter["z_LPName"];
        $this->LPName->AdvancedSearch->SearchCondition = @$filter["v_LPName"];
        $this->LPName->AdvancedSearch->SearchValue2 = @$filter["y_LPName"];
        $this->LPName->AdvancedSearch->SearchOperator2 = @$filter["w_LPName"];
        $this->LPName->AdvancedSearch->save();

        // Field GodownNumber
        $this->GodownNumber->AdvancedSearch->SearchValue = @$filter["x_GodownNumber"];
        $this->GodownNumber->AdvancedSearch->SearchOperator = @$filter["z_GodownNumber"];
        $this->GodownNumber->AdvancedSearch->SearchCondition = @$filter["v_GodownNumber"];
        $this->GodownNumber->AdvancedSearch->SearchValue2 = @$filter["y_GodownNumber"];
        $this->GodownNumber->AdvancedSearch->SearchOperator2 = @$filter["w_GodownNumber"];
        $this->GodownNumber->AdvancedSearch->save();

        // Field CreationDate
        $this->CreationDate->AdvancedSearch->SearchValue = @$filter["x_CreationDate"];
        $this->CreationDate->AdvancedSearch->SearchOperator = @$filter["z_CreationDate"];
        $this->CreationDate->AdvancedSearch->SearchCondition = @$filter["v_CreationDate"];
        $this->CreationDate->AdvancedSearch->SearchValue2 = @$filter["y_CreationDate"];
        $this->CreationDate->AdvancedSearch->SearchOperator2 = @$filter["w_CreationDate"];
        $this->CreationDate->AdvancedSearch->save();

        // Field CreatedbyUser
        $this->CreatedbyUser->AdvancedSearch->SearchValue = @$filter["x_CreatedbyUser"];
        $this->CreatedbyUser->AdvancedSearch->SearchOperator = @$filter["z_CreatedbyUser"];
        $this->CreatedbyUser->AdvancedSearch->SearchCondition = @$filter["v_CreatedbyUser"];
        $this->CreatedbyUser->AdvancedSearch->SearchValue2 = @$filter["y_CreatedbyUser"];
        $this->CreatedbyUser->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedbyUser"];
        $this->CreatedbyUser->AdvancedSearch->save();

        // Field ModifiedDate
        $this->ModifiedDate->AdvancedSearch->SearchValue = @$filter["x_ModifiedDate"];
        $this->ModifiedDate->AdvancedSearch->SearchOperator = @$filter["z_ModifiedDate"];
        $this->ModifiedDate->AdvancedSearch->SearchCondition = @$filter["v_ModifiedDate"];
        $this->ModifiedDate->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedDate"];
        $this->ModifiedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedDate"];
        $this->ModifiedDate->AdvancedSearch->save();

        // Field ModifiedbyUser
        $this->ModifiedbyUser->AdvancedSearch->SearchValue = @$filter["x_ModifiedbyUser"];
        $this->ModifiedbyUser->AdvancedSearch->SearchOperator = @$filter["z_ModifiedbyUser"];
        $this->ModifiedbyUser->AdvancedSearch->SearchCondition = @$filter["v_ModifiedbyUser"];
        $this->ModifiedbyUser->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedbyUser"];
        $this->ModifiedbyUser->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedbyUser"];
        $this->ModifiedbyUser->AdvancedSearch->save();

        // Field isActive
        $this->isActive->AdvancedSearch->SearchValue = @$filter["x_isActive"];
        $this->isActive->AdvancedSearch->SearchOperator = @$filter["z_isActive"];
        $this->isActive->AdvancedSearch->SearchCondition = @$filter["v_isActive"];
        $this->isActive->AdvancedSearch->SearchValue2 = @$filter["y_isActive"];
        $this->isActive->AdvancedSearch->SearchOperator2 = @$filter["w_isActive"];
        $this->isActive->AdvancedSearch->save();

        // Field AllowExpiryClaim
        $this->AllowExpiryClaim->AdvancedSearch->SearchValue = @$filter["x_AllowExpiryClaim"];
        $this->AllowExpiryClaim->AdvancedSearch->SearchOperator = @$filter["z_AllowExpiryClaim"];
        $this->AllowExpiryClaim->AdvancedSearch->SearchCondition = @$filter["v_AllowExpiryClaim"];
        $this->AllowExpiryClaim->AdvancedSearch->SearchValue2 = @$filter["y_AllowExpiryClaim"];
        $this->AllowExpiryClaim->AdvancedSearch->SearchOperator2 = @$filter["w_AllowExpiryClaim"];
        $this->AllowExpiryClaim->AdvancedSearch->save();

        // Field BrandCode
        $this->BrandCode->AdvancedSearch->SearchValue = @$filter["x_BrandCode"];
        $this->BrandCode->AdvancedSearch->SearchOperator = @$filter["z_BrandCode"];
        $this->BrandCode->AdvancedSearch->SearchCondition = @$filter["v_BrandCode"];
        $this->BrandCode->AdvancedSearch->SearchValue2 = @$filter["y_BrandCode"];
        $this->BrandCode->AdvancedSearch->SearchOperator2 = @$filter["w_BrandCode"];
        $this->BrandCode->AdvancedSearch->save();

        // Field FreeSchemeBasedon
        $this->FreeSchemeBasedon->AdvancedSearch->SearchValue = @$filter["x_FreeSchemeBasedon"];
        $this->FreeSchemeBasedon->AdvancedSearch->SearchOperator = @$filter["z_FreeSchemeBasedon"];
        $this->FreeSchemeBasedon->AdvancedSearch->SearchCondition = @$filter["v_FreeSchemeBasedon"];
        $this->FreeSchemeBasedon->AdvancedSearch->SearchValue2 = @$filter["y_FreeSchemeBasedon"];
        $this->FreeSchemeBasedon->AdvancedSearch->SearchOperator2 = @$filter["w_FreeSchemeBasedon"];
        $this->FreeSchemeBasedon->AdvancedSearch->save();

        // Field DoNotCheckCostInBill
        $this->DoNotCheckCostInBill->AdvancedSearch->SearchValue = @$filter["x_DoNotCheckCostInBill"];
        $this->DoNotCheckCostInBill->AdvancedSearch->SearchOperator = @$filter["z_DoNotCheckCostInBill"];
        $this->DoNotCheckCostInBill->AdvancedSearch->SearchCondition = @$filter["v_DoNotCheckCostInBill"];
        $this->DoNotCheckCostInBill->AdvancedSearch->SearchValue2 = @$filter["y_DoNotCheckCostInBill"];
        $this->DoNotCheckCostInBill->AdvancedSearch->SearchOperator2 = @$filter["w_DoNotCheckCostInBill"];
        $this->DoNotCheckCostInBill->AdvancedSearch->save();

        // Field ProductGroupCode
        $this->ProductGroupCode->AdvancedSearch->SearchValue = @$filter["x_ProductGroupCode"];
        $this->ProductGroupCode->AdvancedSearch->SearchOperator = @$filter["z_ProductGroupCode"];
        $this->ProductGroupCode->AdvancedSearch->SearchCondition = @$filter["v_ProductGroupCode"];
        $this->ProductGroupCode->AdvancedSearch->SearchValue2 = @$filter["y_ProductGroupCode"];
        $this->ProductGroupCode->AdvancedSearch->SearchOperator2 = @$filter["w_ProductGroupCode"];
        $this->ProductGroupCode->AdvancedSearch->save();

        // Field ProductStrengthCode
        $this->ProductStrengthCode->AdvancedSearch->SearchValue = @$filter["x_ProductStrengthCode"];
        $this->ProductStrengthCode->AdvancedSearch->SearchOperator = @$filter["z_ProductStrengthCode"];
        $this->ProductStrengthCode->AdvancedSearch->SearchCondition = @$filter["v_ProductStrengthCode"];
        $this->ProductStrengthCode->AdvancedSearch->SearchValue2 = @$filter["y_ProductStrengthCode"];
        $this->ProductStrengthCode->AdvancedSearch->SearchOperator2 = @$filter["w_ProductStrengthCode"];
        $this->ProductStrengthCode->AdvancedSearch->save();

        // Field PackingCode
        $this->PackingCode->AdvancedSearch->SearchValue = @$filter["x_PackingCode"];
        $this->PackingCode->AdvancedSearch->SearchOperator = @$filter["z_PackingCode"];
        $this->PackingCode->AdvancedSearch->SearchCondition = @$filter["v_PackingCode"];
        $this->PackingCode->AdvancedSearch->SearchValue2 = @$filter["y_PackingCode"];
        $this->PackingCode->AdvancedSearch->SearchOperator2 = @$filter["w_PackingCode"];
        $this->PackingCode->AdvancedSearch->save();

        // Field ComputedMinStock
        $this->ComputedMinStock->AdvancedSearch->SearchValue = @$filter["x_ComputedMinStock"];
        $this->ComputedMinStock->AdvancedSearch->SearchOperator = @$filter["z_ComputedMinStock"];
        $this->ComputedMinStock->AdvancedSearch->SearchCondition = @$filter["v_ComputedMinStock"];
        $this->ComputedMinStock->AdvancedSearch->SearchValue2 = @$filter["y_ComputedMinStock"];
        $this->ComputedMinStock->AdvancedSearch->SearchOperator2 = @$filter["w_ComputedMinStock"];
        $this->ComputedMinStock->AdvancedSearch->save();

        // Field ComputedMaxStock
        $this->ComputedMaxStock->AdvancedSearch->SearchValue = @$filter["x_ComputedMaxStock"];
        $this->ComputedMaxStock->AdvancedSearch->SearchOperator = @$filter["z_ComputedMaxStock"];
        $this->ComputedMaxStock->AdvancedSearch->SearchCondition = @$filter["v_ComputedMaxStock"];
        $this->ComputedMaxStock->AdvancedSearch->SearchValue2 = @$filter["y_ComputedMaxStock"];
        $this->ComputedMaxStock->AdvancedSearch->SearchOperator2 = @$filter["w_ComputedMaxStock"];
        $this->ComputedMaxStock->AdvancedSearch->save();

        // Field ProductRemark
        $this->ProductRemark->AdvancedSearch->SearchValue = @$filter["x_ProductRemark"];
        $this->ProductRemark->AdvancedSearch->SearchOperator = @$filter["z_ProductRemark"];
        $this->ProductRemark->AdvancedSearch->SearchCondition = @$filter["v_ProductRemark"];
        $this->ProductRemark->AdvancedSearch->SearchValue2 = @$filter["y_ProductRemark"];
        $this->ProductRemark->AdvancedSearch->SearchOperator2 = @$filter["w_ProductRemark"];
        $this->ProductRemark->AdvancedSearch->save();

        // Field ProductDrugCode
        $this->ProductDrugCode->AdvancedSearch->SearchValue = @$filter["x_ProductDrugCode"];
        $this->ProductDrugCode->AdvancedSearch->SearchOperator = @$filter["z_ProductDrugCode"];
        $this->ProductDrugCode->AdvancedSearch->SearchCondition = @$filter["v_ProductDrugCode"];
        $this->ProductDrugCode->AdvancedSearch->SearchValue2 = @$filter["y_ProductDrugCode"];
        $this->ProductDrugCode->AdvancedSearch->SearchOperator2 = @$filter["w_ProductDrugCode"];
        $this->ProductDrugCode->AdvancedSearch->save();

        // Field IsMatrixProduct
        $this->IsMatrixProduct->AdvancedSearch->SearchValue = @$filter["x_IsMatrixProduct"];
        $this->IsMatrixProduct->AdvancedSearch->SearchOperator = @$filter["z_IsMatrixProduct"];
        $this->IsMatrixProduct->AdvancedSearch->SearchCondition = @$filter["v_IsMatrixProduct"];
        $this->IsMatrixProduct->AdvancedSearch->SearchValue2 = @$filter["y_IsMatrixProduct"];
        $this->IsMatrixProduct->AdvancedSearch->SearchOperator2 = @$filter["w_IsMatrixProduct"];
        $this->IsMatrixProduct->AdvancedSearch->save();

        // Field AttributeCount1
        $this->AttributeCount1->AdvancedSearch->SearchValue = @$filter["x_AttributeCount1"];
        $this->AttributeCount1->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount1"];
        $this->AttributeCount1->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount1"];
        $this->AttributeCount1->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount1"];
        $this->AttributeCount1->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount1"];
        $this->AttributeCount1->AdvancedSearch->save();

        // Field AttributeCount2
        $this->AttributeCount2->AdvancedSearch->SearchValue = @$filter["x_AttributeCount2"];
        $this->AttributeCount2->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount2"];
        $this->AttributeCount2->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount2"];
        $this->AttributeCount2->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount2"];
        $this->AttributeCount2->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount2"];
        $this->AttributeCount2->AdvancedSearch->save();

        // Field AttributeCount3
        $this->AttributeCount3->AdvancedSearch->SearchValue = @$filter["x_AttributeCount3"];
        $this->AttributeCount3->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount3"];
        $this->AttributeCount3->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount3"];
        $this->AttributeCount3->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount3"];
        $this->AttributeCount3->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount3"];
        $this->AttributeCount3->AdvancedSearch->save();

        // Field AttributeCount4
        $this->AttributeCount4->AdvancedSearch->SearchValue = @$filter["x_AttributeCount4"];
        $this->AttributeCount4->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount4"];
        $this->AttributeCount4->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount4"];
        $this->AttributeCount4->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount4"];
        $this->AttributeCount4->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount4"];
        $this->AttributeCount4->AdvancedSearch->save();

        // Field AttributeCount5
        $this->AttributeCount5->AdvancedSearch->SearchValue = @$filter["x_AttributeCount5"];
        $this->AttributeCount5->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount5"];
        $this->AttributeCount5->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount5"];
        $this->AttributeCount5->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount5"];
        $this->AttributeCount5->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount5"];
        $this->AttributeCount5->AdvancedSearch->save();

        // Field DefaultDiscountPercentage
        $this->DefaultDiscountPercentage->AdvancedSearch->SearchValue = @$filter["x_DefaultDiscountPercentage"];
        $this->DefaultDiscountPercentage->AdvancedSearch->SearchOperator = @$filter["z_DefaultDiscountPercentage"];
        $this->DefaultDiscountPercentage->AdvancedSearch->SearchCondition = @$filter["v_DefaultDiscountPercentage"];
        $this->DefaultDiscountPercentage->AdvancedSearch->SearchValue2 = @$filter["y_DefaultDiscountPercentage"];
        $this->DefaultDiscountPercentage->AdvancedSearch->SearchOperator2 = @$filter["w_DefaultDiscountPercentage"];
        $this->DefaultDiscountPercentage->AdvancedSearch->save();

        // Field DonotPrintBarcode
        $this->DonotPrintBarcode->AdvancedSearch->SearchValue = @$filter["x_DonotPrintBarcode"];
        $this->DonotPrintBarcode->AdvancedSearch->SearchOperator = @$filter["z_DonotPrintBarcode"];
        $this->DonotPrintBarcode->AdvancedSearch->SearchCondition = @$filter["v_DonotPrintBarcode"];
        $this->DonotPrintBarcode->AdvancedSearch->SearchValue2 = @$filter["y_DonotPrintBarcode"];
        $this->DonotPrintBarcode->AdvancedSearch->SearchOperator2 = @$filter["w_DonotPrintBarcode"];
        $this->DonotPrintBarcode->AdvancedSearch->save();

        // Field ProductLevelDiscount
        $this->ProductLevelDiscount->AdvancedSearch->SearchValue = @$filter["x_ProductLevelDiscount"];
        $this->ProductLevelDiscount->AdvancedSearch->SearchOperator = @$filter["z_ProductLevelDiscount"];
        $this->ProductLevelDiscount->AdvancedSearch->SearchCondition = @$filter["v_ProductLevelDiscount"];
        $this->ProductLevelDiscount->AdvancedSearch->SearchValue2 = @$filter["y_ProductLevelDiscount"];
        $this->ProductLevelDiscount->AdvancedSearch->SearchOperator2 = @$filter["w_ProductLevelDiscount"];
        $this->ProductLevelDiscount->AdvancedSearch->save();

        // Field Markup
        $this->Markup->AdvancedSearch->SearchValue = @$filter["x_Markup"];
        $this->Markup->AdvancedSearch->SearchOperator = @$filter["z_Markup"];
        $this->Markup->AdvancedSearch->SearchCondition = @$filter["v_Markup"];
        $this->Markup->AdvancedSearch->SearchValue2 = @$filter["y_Markup"];
        $this->Markup->AdvancedSearch->SearchOperator2 = @$filter["w_Markup"];
        $this->Markup->AdvancedSearch->save();

        // Field MarkDown
        $this->MarkDown->AdvancedSearch->SearchValue = @$filter["x_MarkDown"];
        $this->MarkDown->AdvancedSearch->SearchOperator = @$filter["z_MarkDown"];
        $this->MarkDown->AdvancedSearch->SearchCondition = @$filter["v_MarkDown"];
        $this->MarkDown->AdvancedSearch->SearchValue2 = @$filter["y_MarkDown"];
        $this->MarkDown->AdvancedSearch->SearchOperator2 = @$filter["w_MarkDown"];
        $this->MarkDown->AdvancedSearch->save();

        // Field ReworkSalePrice
        $this->ReworkSalePrice->AdvancedSearch->SearchValue = @$filter["x_ReworkSalePrice"];
        $this->ReworkSalePrice->AdvancedSearch->SearchOperator = @$filter["z_ReworkSalePrice"];
        $this->ReworkSalePrice->AdvancedSearch->SearchCondition = @$filter["v_ReworkSalePrice"];
        $this->ReworkSalePrice->AdvancedSearch->SearchValue2 = @$filter["y_ReworkSalePrice"];
        $this->ReworkSalePrice->AdvancedSearch->SearchOperator2 = @$filter["w_ReworkSalePrice"];
        $this->ReworkSalePrice->AdvancedSearch->save();

        // Field MultipleInput
        $this->MultipleInput->AdvancedSearch->SearchValue = @$filter["x_MultipleInput"];
        $this->MultipleInput->AdvancedSearch->SearchOperator = @$filter["z_MultipleInput"];
        $this->MultipleInput->AdvancedSearch->SearchCondition = @$filter["v_MultipleInput"];
        $this->MultipleInput->AdvancedSearch->SearchValue2 = @$filter["y_MultipleInput"];
        $this->MultipleInput->AdvancedSearch->SearchOperator2 = @$filter["w_MultipleInput"];
        $this->MultipleInput->AdvancedSearch->save();

        // Field LpPackageInformation
        $this->LpPackageInformation->AdvancedSearch->SearchValue = @$filter["x_LpPackageInformation"];
        $this->LpPackageInformation->AdvancedSearch->SearchOperator = @$filter["z_LpPackageInformation"];
        $this->LpPackageInformation->AdvancedSearch->SearchCondition = @$filter["v_LpPackageInformation"];
        $this->LpPackageInformation->AdvancedSearch->SearchValue2 = @$filter["y_LpPackageInformation"];
        $this->LpPackageInformation->AdvancedSearch->SearchOperator2 = @$filter["w_LpPackageInformation"];
        $this->LpPackageInformation->AdvancedSearch->save();

        // Field AllowNegativeStock
        $this->AllowNegativeStock->AdvancedSearch->SearchValue = @$filter["x_AllowNegativeStock"];
        $this->AllowNegativeStock->AdvancedSearch->SearchOperator = @$filter["z_AllowNegativeStock"];
        $this->AllowNegativeStock->AdvancedSearch->SearchCondition = @$filter["v_AllowNegativeStock"];
        $this->AllowNegativeStock->AdvancedSearch->SearchValue2 = @$filter["y_AllowNegativeStock"];
        $this->AllowNegativeStock->AdvancedSearch->SearchOperator2 = @$filter["w_AllowNegativeStock"];
        $this->AllowNegativeStock->AdvancedSearch->save();

        // Field OrderDate
        $this->OrderDate->AdvancedSearch->SearchValue = @$filter["x_OrderDate"];
        $this->OrderDate->AdvancedSearch->SearchOperator = @$filter["z_OrderDate"];
        $this->OrderDate->AdvancedSearch->SearchCondition = @$filter["v_OrderDate"];
        $this->OrderDate->AdvancedSearch->SearchValue2 = @$filter["y_OrderDate"];
        $this->OrderDate->AdvancedSearch->SearchOperator2 = @$filter["w_OrderDate"];
        $this->OrderDate->AdvancedSearch->save();

        // Field OrderTime
        $this->OrderTime->AdvancedSearch->SearchValue = @$filter["x_OrderTime"];
        $this->OrderTime->AdvancedSearch->SearchOperator = @$filter["z_OrderTime"];
        $this->OrderTime->AdvancedSearch->SearchCondition = @$filter["v_OrderTime"];
        $this->OrderTime->AdvancedSearch->SearchValue2 = @$filter["y_OrderTime"];
        $this->OrderTime->AdvancedSearch->SearchOperator2 = @$filter["w_OrderTime"];
        $this->OrderTime->AdvancedSearch->save();

        // Field RateGroupCode
        $this->RateGroupCode->AdvancedSearch->SearchValue = @$filter["x_RateGroupCode"];
        $this->RateGroupCode->AdvancedSearch->SearchOperator = @$filter["z_RateGroupCode"];
        $this->RateGroupCode->AdvancedSearch->SearchCondition = @$filter["v_RateGroupCode"];
        $this->RateGroupCode->AdvancedSearch->SearchValue2 = @$filter["y_RateGroupCode"];
        $this->RateGroupCode->AdvancedSearch->SearchOperator2 = @$filter["w_RateGroupCode"];
        $this->RateGroupCode->AdvancedSearch->save();

        // Field ConversionCaseLot
        $this->ConversionCaseLot->AdvancedSearch->SearchValue = @$filter["x_ConversionCaseLot"];
        $this->ConversionCaseLot->AdvancedSearch->SearchOperator = @$filter["z_ConversionCaseLot"];
        $this->ConversionCaseLot->AdvancedSearch->SearchCondition = @$filter["v_ConversionCaseLot"];
        $this->ConversionCaseLot->AdvancedSearch->SearchValue2 = @$filter["y_ConversionCaseLot"];
        $this->ConversionCaseLot->AdvancedSearch->SearchOperator2 = @$filter["w_ConversionCaseLot"];
        $this->ConversionCaseLot->AdvancedSearch->save();

        // Field ShippingLot
        $this->ShippingLot->AdvancedSearch->SearchValue = @$filter["x_ShippingLot"];
        $this->ShippingLot->AdvancedSearch->SearchOperator = @$filter["z_ShippingLot"];
        $this->ShippingLot->AdvancedSearch->SearchCondition = @$filter["v_ShippingLot"];
        $this->ShippingLot->AdvancedSearch->SearchValue2 = @$filter["y_ShippingLot"];
        $this->ShippingLot->AdvancedSearch->SearchOperator2 = @$filter["w_ShippingLot"];
        $this->ShippingLot->AdvancedSearch->save();

        // Field AllowExpiryReplacement
        $this->AllowExpiryReplacement->AdvancedSearch->SearchValue = @$filter["x_AllowExpiryReplacement"];
        $this->AllowExpiryReplacement->AdvancedSearch->SearchOperator = @$filter["z_AllowExpiryReplacement"];
        $this->AllowExpiryReplacement->AdvancedSearch->SearchCondition = @$filter["v_AllowExpiryReplacement"];
        $this->AllowExpiryReplacement->AdvancedSearch->SearchValue2 = @$filter["y_AllowExpiryReplacement"];
        $this->AllowExpiryReplacement->AdvancedSearch->SearchOperator2 = @$filter["w_AllowExpiryReplacement"];
        $this->AllowExpiryReplacement->AdvancedSearch->save();

        // Field NoOfMonthExpiryAllowed
        $this->NoOfMonthExpiryAllowed->AdvancedSearch->SearchValue = @$filter["x_NoOfMonthExpiryAllowed"];
        $this->NoOfMonthExpiryAllowed->AdvancedSearch->SearchOperator = @$filter["z_NoOfMonthExpiryAllowed"];
        $this->NoOfMonthExpiryAllowed->AdvancedSearch->SearchCondition = @$filter["v_NoOfMonthExpiryAllowed"];
        $this->NoOfMonthExpiryAllowed->AdvancedSearch->SearchValue2 = @$filter["y_NoOfMonthExpiryAllowed"];
        $this->NoOfMonthExpiryAllowed->AdvancedSearch->SearchOperator2 = @$filter["w_NoOfMonthExpiryAllowed"];
        $this->NoOfMonthExpiryAllowed->AdvancedSearch->save();

        // Field ProductDiscountEligibility
        $this->ProductDiscountEligibility->AdvancedSearch->SearchValue = @$filter["x_ProductDiscountEligibility"];
        $this->ProductDiscountEligibility->AdvancedSearch->SearchOperator = @$filter["z_ProductDiscountEligibility"];
        $this->ProductDiscountEligibility->AdvancedSearch->SearchCondition = @$filter["v_ProductDiscountEligibility"];
        $this->ProductDiscountEligibility->AdvancedSearch->SearchValue2 = @$filter["y_ProductDiscountEligibility"];
        $this->ProductDiscountEligibility->AdvancedSearch->SearchOperator2 = @$filter["w_ProductDiscountEligibility"];
        $this->ProductDiscountEligibility->AdvancedSearch->save();

        // Field ScheduleTypeCode
        $this->ScheduleTypeCode->AdvancedSearch->SearchValue = @$filter["x_ScheduleTypeCode"];
        $this->ScheduleTypeCode->AdvancedSearch->SearchOperator = @$filter["z_ScheduleTypeCode"];
        $this->ScheduleTypeCode->AdvancedSearch->SearchCondition = @$filter["v_ScheduleTypeCode"];
        $this->ScheduleTypeCode->AdvancedSearch->SearchValue2 = @$filter["y_ScheduleTypeCode"];
        $this->ScheduleTypeCode->AdvancedSearch->SearchOperator2 = @$filter["w_ScheduleTypeCode"];
        $this->ScheduleTypeCode->AdvancedSearch->save();

        // Field AIOCDProductCode
        $this->AIOCDProductCode->AdvancedSearch->SearchValue = @$filter["x_AIOCDProductCode"];
        $this->AIOCDProductCode->AdvancedSearch->SearchOperator = @$filter["z_AIOCDProductCode"];
        $this->AIOCDProductCode->AdvancedSearch->SearchCondition = @$filter["v_AIOCDProductCode"];
        $this->AIOCDProductCode->AdvancedSearch->SearchValue2 = @$filter["y_AIOCDProductCode"];
        $this->AIOCDProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_AIOCDProductCode"];
        $this->AIOCDProductCode->AdvancedSearch->save();

        // Field FreeQuantity
        $this->FreeQuantity->AdvancedSearch->SearchValue = @$filter["x_FreeQuantity"];
        $this->FreeQuantity->AdvancedSearch->SearchOperator = @$filter["z_FreeQuantity"];
        $this->FreeQuantity->AdvancedSearch->SearchCondition = @$filter["v_FreeQuantity"];
        $this->FreeQuantity->AdvancedSearch->SearchValue2 = @$filter["y_FreeQuantity"];
        $this->FreeQuantity->AdvancedSearch->SearchOperator2 = @$filter["w_FreeQuantity"];
        $this->FreeQuantity->AdvancedSearch->save();

        // Field DiscountType
        $this->DiscountType->AdvancedSearch->SearchValue = @$filter["x_DiscountType"];
        $this->DiscountType->AdvancedSearch->SearchOperator = @$filter["z_DiscountType"];
        $this->DiscountType->AdvancedSearch->SearchCondition = @$filter["v_DiscountType"];
        $this->DiscountType->AdvancedSearch->SearchValue2 = @$filter["y_DiscountType"];
        $this->DiscountType->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountType"];
        $this->DiscountType->AdvancedSearch->save();

        // Field DiscountValue
        $this->DiscountValue->AdvancedSearch->SearchValue = @$filter["x_DiscountValue"];
        $this->DiscountValue->AdvancedSearch->SearchOperator = @$filter["z_DiscountValue"];
        $this->DiscountValue->AdvancedSearch->SearchCondition = @$filter["v_DiscountValue"];
        $this->DiscountValue->AdvancedSearch->SearchValue2 = @$filter["y_DiscountValue"];
        $this->DiscountValue->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountValue"];
        $this->DiscountValue->AdvancedSearch->save();

        // Field HasProductOrderAttribute
        $this->HasProductOrderAttribute->AdvancedSearch->SearchValue = @$filter["x_HasProductOrderAttribute"];
        $this->HasProductOrderAttribute->AdvancedSearch->SearchOperator = @$filter["z_HasProductOrderAttribute"];
        $this->HasProductOrderAttribute->AdvancedSearch->SearchCondition = @$filter["v_HasProductOrderAttribute"];
        $this->HasProductOrderAttribute->AdvancedSearch->SearchValue2 = @$filter["y_HasProductOrderAttribute"];
        $this->HasProductOrderAttribute->AdvancedSearch->SearchOperator2 = @$filter["w_HasProductOrderAttribute"];
        $this->HasProductOrderAttribute->AdvancedSearch->save();

        // Field FirstPODate
        $this->FirstPODate->AdvancedSearch->SearchValue = @$filter["x_FirstPODate"];
        $this->FirstPODate->AdvancedSearch->SearchOperator = @$filter["z_FirstPODate"];
        $this->FirstPODate->AdvancedSearch->SearchCondition = @$filter["v_FirstPODate"];
        $this->FirstPODate->AdvancedSearch->SearchValue2 = @$filter["y_FirstPODate"];
        $this->FirstPODate->AdvancedSearch->SearchOperator2 = @$filter["w_FirstPODate"];
        $this->FirstPODate->AdvancedSearch->save();

        // Field SaleprcieAndMrpCalcPercent
        $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->SearchValue = @$filter["x_SaleprcieAndMrpCalcPercent"];
        $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->SearchOperator = @$filter["z_SaleprcieAndMrpCalcPercent"];
        $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->SearchCondition = @$filter["v_SaleprcieAndMrpCalcPercent"];
        $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->SearchValue2 = @$filter["y_SaleprcieAndMrpCalcPercent"];
        $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->SearchOperator2 = @$filter["w_SaleprcieAndMrpCalcPercent"];
        $this->SaleprcieAndMrpCalcPercent->AdvancedSearch->save();

        // Field IsGiftVoucherProducts
        $this->IsGiftVoucherProducts->AdvancedSearch->SearchValue = @$filter["x_IsGiftVoucherProducts"];
        $this->IsGiftVoucherProducts->AdvancedSearch->SearchOperator = @$filter["z_IsGiftVoucherProducts"];
        $this->IsGiftVoucherProducts->AdvancedSearch->SearchCondition = @$filter["v_IsGiftVoucherProducts"];
        $this->IsGiftVoucherProducts->AdvancedSearch->SearchValue2 = @$filter["y_IsGiftVoucherProducts"];
        $this->IsGiftVoucherProducts->AdvancedSearch->SearchOperator2 = @$filter["w_IsGiftVoucherProducts"];
        $this->IsGiftVoucherProducts->AdvancedSearch->save();

        // Field AcceptRange4SerialNumber
        $this->AcceptRange4SerialNumber->AdvancedSearch->SearchValue = @$filter["x_AcceptRange4SerialNumber"];
        $this->AcceptRange4SerialNumber->AdvancedSearch->SearchOperator = @$filter["z_AcceptRange4SerialNumber"];
        $this->AcceptRange4SerialNumber->AdvancedSearch->SearchCondition = @$filter["v_AcceptRange4SerialNumber"];
        $this->AcceptRange4SerialNumber->AdvancedSearch->SearchValue2 = @$filter["y_AcceptRange4SerialNumber"];
        $this->AcceptRange4SerialNumber->AdvancedSearch->SearchOperator2 = @$filter["w_AcceptRange4SerialNumber"];
        $this->AcceptRange4SerialNumber->AdvancedSearch->save();

        // Field GiftVoucherDenomination
        $this->GiftVoucherDenomination->AdvancedSearch->SearchValue = @$filter["x_GiftVoucherDenomination"];
        $this->GiftVoucherDenomination->AdvancedSearch->SearchOperator = @$filter["z_GiftVoucherDenomination"];
        $this->GiftVoucherDenomination->AdvancedSearch->SearchCondition = @$filter["v_GiftVoucherDenomination"];
        $this->GiftVoucherDenomination->AdvancedSearch->SearchValue2 = @$filter["y_GiftVoucherDenomination"];
        $this->GiftVoucherDenomination->AdvancedSearch->SearchOperator2 = @$filter["w_GiftVoucherDenomination"];
        $this->GiftVoucherDenomination->AdvancedSearch->save();

        // Field Subclasscode
        $this->Subclasscode->AdvancedSearch->SearchValue = @$filter["x_Subclasscode"];
        $this->Subclasscode->AdvancedSearch->SearchOperator = @$filter["z_Subclasscode"];
        $this->Subclasscode->AdvancedSearch->SearchCondition = @$filter["v_Subclasscode"];
        $this->Subclasscode->AdvancedSearch->SearchValue2 = @$filter["y_Subclasscode"];
        $this->Subclasscode->AdvancedSearch->SearchOperator2 = @$filter["w_Subclasscode"];
        $this->Subclasscode->AdvancedSearch->save();

        // Field BarCodeFromWeighingMachine
        $this->BarCodeFromWeighingMachine->AdvancedSearch->SearchValue = @$filter["x_BarCodeFromWeighingMachine"];
        $this->BarCodeFromWeighingMachine->AdvancedSearch->SearchOperator = @$filter["z_BarCodeFromWeighingMachine"];
        $this->BarCodeFromWeighingMachine->AdvancedSearch->SearchCondition = @$filter["v_BarCodeFromWeighingMachine"];
        $this->BarCodeFromWeighingMachine->AdvancedSearch->SearchValue2 = @$filter["y_BarCodeFromWeighingMachine"];
        $this->BarCodeFromWeighingMachine->AdvancedSearch->SearchOperator2 = @$filter["w_BarCodeFromWeighingMachine"];
        $this->BarCodeFromWeighingMachine->AdvancedSearch->save();

        // Field CheckCostInReturn
        $this->CheckCostInReturn->AdvancedSearch->SearchValue = @$filter["x_CheckCostInReturn"];
        $this->CheckCostInReturn->AdvancedSearch->SearchOperator = @$filter["z_CheckCostInReturn"];
        $this->CheckCostInReturn->AdvancedSearch->SearchCondition = @$filter["v_CheckCostInReturn"];
        $this->CheckCostInReturn->AdvancedSearch->SearchValue2 = @$filter["y_CheckCostInReturn"];
        $this->CheckCostInReturn->AdvancedSearch->SearchOperator2 = @$filter["w_CheckCostInReturn"];
        $this->CheckCostInReturn->AdvancedSearch->save();

        // Field FrequentSaleProduct
        $this->FrequentSaleProduct->AdvancedSearch->SearchValue = @$filter["x_FrequentSaleProduct"];
        $this->FrequentSaleProduct->AdvancedSearch->SearchOperator = @$filter["z_FrequentSaleProduct"];
        $this->FrequentSaleProduct->AdvancedSearch->SearchCondition = @$filter["v_FrequentSaleProduct"];
        $this->FrequentSaleProduct->AdvancedSearch->SearchValue2 = @$filter["y_FrequentSaleProduct"];
        $this->FrequentSaleProduct->AdvancedSearch->SearchOperator2 = @$filter["w_FrequentSaleProduct"];
        $this->FrequentSaleProduct->AdvancedSearch->save();

        // Field RateType
        $this->RateType->AdvancedSearch->SearchValue = @$filter["x_RateType"];
        $this->RateType->AdvancedSearch->SearchOperator = @$filter["z_RateType"];
        $this->RateType->AdvancedSearch->SearchCondition = @$filter["v_RateType"];
        $this->RateType->AdvancedSearch->SearchValue2 = @$filter["y_RateType"];
        $this->RateType->AdvancedSearch->SearchOperator2 = @$filter["w_RateType"];
        $this->RateType->AdvancedSearch->save();

        // Field TouchscreenName
        $this->TouchscreenName->AdvancedSearch->SearchValue = @$filter["x_TouchscreenName"];
        $this->TouchscreenName->AdvancedSearch->SearchOperator = @$filter["z_TouchscreenName"];
        $this->TouchscreenName->AdvancedSearch->SearchCondition = @$filter["v_TouchscreenName"];
        $this->TouchscreenName->AdvancedSearch->SearchValue2 = @$filter["y_TouchscreenName"];
        $this->TouchscreenName->AdvancedSearch->SearchOperator2 = @$filter["w_TouchscreenName"];
        $this->TouchscreenName->AdvancedSearch->save();

        // Field FreeType
        $this->FreeType->AdvancedSearch->SearchValue = @$filter["x_FreeType"];
        $this->FreeType->AdvancedSearch->SearchOperator = @$filter["z_FreeType"];
        $this->FreeType->AdvancedSearch->SearchCondition = @$filter["v_FreeType"];
        $this->FreeType->AdvancedSearch->SearchValue2 = @$filter["y_FreeType"];
        $this->FreeType->AdvancedSearch->SearchOperator2 = @$filter["w_FreeType"];
        $this->FreeType->AdvancedSearch->save();

        // Field LooseQtyasNewBatch
        $this->LooseQtyasNewBatch->AdvancedSearch->SearchValue = @$filter["x_LooseQtyasNewBatch"];
        $this->LooseQtyasNewBatch->AdvancedSearch->SearchOperator = @$filter["z_LooseQtyasNewBatch"];
        $this->LooseQtyasNewBatch->AdvancedSearch->SearchCondition = @$filter["v_LooseQtyasNewBatch"];
        $this->LooseQtyasNewBatch->AdvancedSearch->SearchValue2 = @$filter["y_LooseQtyasNewBatch"];
        $this->LooseQtyasNewBatch->AdvancedSearch->SearchOperator2 = @$filter["w_LooseQtyasNewBatch"];
        $this->LooseQtyasNewBatch->AdvancedSearch->save();

        // Field AllowSlabBilling
        $this->AllowSlabBilling->AdvancedSearch->SearchValue = @$filter["x_AllowSlabBilling"];
        $this->AllowSlabBilling->AdvancedSearch->SearchOperator = @$filter["z_AllowSlabBilling"];
        $this->AllowSlabBilling->AdvancedSearch->SearchCondition = @$filter["v_AllowSlabBilling"];
        $this->AllowSlabBilling->AdvancedSearch->SearchValue2 = @$filter["y_AllowSlabBilling"];
        $this->AllowSlabBilling->AdvancedSearch->SearchOperator2 = @$filter["w_AllowSlabBilling"];
        $this->AllowSlabBilling->AdvancedSearch->save();

        // Field ProductTypeForProduction
        $this->ProductTypeForProduction->AdvancedSearch->SearchValue = @$filter["x_ProductTypeForProduction"];
        $this->ProductTypeForProduction->AdvancedSearch->SearchOperator = @$filter["z_ProductTypeForProduction"];
        $this->ProductTypeForProduction->AdvancedSearch->SearchCondition = @$filter["v_ProductTypeForProduction"];
        $this->ProductTypeForProduction->AdvancedSearch->SearchValue2 = @$filter["y_ProductTypeForProduction"];
        $this->ProductTypeForProduction->AdvancedSearch->SearchOperator2 = @$filter["w_ProductTypeForProduction"];
        $this->ProductTypeForProduction->AdvancedSearch->save();

        // Field RecipeCode
        $this->RecipeCode->AdvancedSearch->SearchValue = @$filter["x_RecipeCode"];
        $this->RecipeCode->AdvancedSearch->SearchOperator = @$filter["z_RecipeCode"];
        $this->RecipeCode->AdvancedSearch->SearchCondition = @$filter["v_RecipeCode"];
        $this->RecipeCode->AdvancedSearch->SearchValue2 = @$filter["y_RecipeCode"];
        $this->RecipeCode->AdvancedSearch->SearchOperator2 = @$filter["w_RecipeCode"];
        $this->RecipeCode->AdvancedSearch->save();

        // Field DefaultUnitType
        $this->DefaultUnitType->AdvancedSearch->SearchValue = @$filter["x_DefaultUnitType"];
        $this->DefaultUnitType->AdvancedSearch->SearchOperator = @$filter["z_DefaultUnitType"];
        $this->DefaultUnitType->AdvancedSearch->SearchCondition = @$filter["v_DefaultUnitType"];
        $this->DefaultUnitType->AdvancedSearch->SearchValue2 = @$filter["y_DefaultUnitType"];
        $this->DefaultUnitType->AdvancedSearch->SearchOperator2 = @$filter["w_DefaultUnitType"];
        $this->DefaultUnitType->AdvancedSearch->save();

        // Field PIstatus
        $this->PIstatus->AdvancedSearch->SearchValue = @$filter["x_PIstatus"];
        $this->PIstatus->AdvancedSearch->SearchOperator = @$filter["z_PIstatus"];
        $this->PIstatus->AdvancedSearch->SearchCondition = @$filter["v_PIstatus"];
        $this->PIstatus->AdvancedSearch->SearchValue2 = @$filter["y_PIstatus"];
        $this->PIstatus->AdvancedSearch->SearchOperator2 = @$filter["w_PIstatus"];
        $this->PIstatus->AdvancedSearch->save();

        // Field LastPiConfirmedDate
        $this->LastPiConfirmedDate->AdvancedSearch->SearchValue = @$filter["x_LastPiConfirmedDate"];
        $this->LastPiConfirmedDate->AdvancedSearch->SearchOperator = @$filter["z_LastPiConfirmedDate"];
        $this->LastPiConfirmedDate->AdvancedSearch->SearchCondition = @$filter["v_LastPiConfirmedDate"];
        $this->LastPiConfirmedDate->AdvancedSearch->SearchValue2 = @$filter["y_LastPiConfirmedDate"];
        $this->LastPiConfirmedDate->AdvancedSearch->SearchOperator2 = @$filter["w_LastPiConfirmedDate"];
        $this->LastPiConfirmedDate->AdvancedSearch->save();

        // Field BarCodeDesign
        $this->BarCodeDesign->AdvancedSearch->SearchValue = @$filter["x_BarCodeDesign"];
        $this->BarCodeDesign->AdvancedSearch->SearchOperator = @$filter["z_BarCodeDesign"];
        $this->BarCodeDesign->AdvancedSearch->SearchCondition = @$filter["v_BarCodeDesign"];
        $this->BarCodeDesign->AdvancedSearch->SearchValue2 = @$filter["y_BarCodeDesign"];
        $this->BarCodeDesign->AdvancedSearch->SearchOperator2 = @$filter["w_BarCodeDesign"];
        $this->BarCodeDesign->AdvancedSearch->save();

        // Field AcceptRemarksInBill
        $this->AcceptRemarksInBill->AdvancedSearch->SearchValue = @$filter["x_AcceptRemarksInBill"];
        $this->AcceptRemarksInBill->AdvancedSearch->SearchOperator = @$filter["z_AcceptRemarksInBill"];
        $this->AcceptRemarksInBill->AdvancedSearch->SearchCondition = @$filter["v_AcceptRemarksInBill"];
        $this->AcceptRemarksInBill->AdvancedSearch->SearchValue2 = @$filter["y_AcceptRemarksInBill"];
        $this->AcceptRemarksInBill->AdvancedSearch->SearchOperator2 = @$filter["w_AcceptRemarksInBill"];
        $this->AcceptRemarksInBill->AdvancedSearch->save();

        // Field Classification
        $this->Classification->AdvancedSearch->SearchValue = @$filter["x_Classification"];
        $this->Classification->AdvancedSearch->SearchOperator = @$filter["z_Classification"];
        $this->Classification->AdvancedSearch->SearchCondition = @$filter["v_Classification"];
        $this->Classification->AdvancedSearch->SearchValue2 = @$filter["y_Classification"];
        $this->Classification->AdvancedSearch->SearchOperator2 = @$filter["w_Classification"];
        $this->Classification->AdvancedSearch->save();

        // Field TimeSlot
        $this->TimeSlot->AdvancedSearch->SearchValue = @$filter["x_TimeSlot"];
        $this->TimeSlot->AdvancedSearch->SearchOperator = @$filter["z_TimeSlot"];
        $this->TimeSlot->AdvancedSearch->SearchCondition = @$filter["v_TimeSlot"];
        $this->TimeSlot->AdvancedSearch->SearchValue2 = @$filter["y_TimeSlot"];
        $this->TimeSlot->AdvancedSearch->SearchOperator2 = @$filter["w_TimeSlot"];
        $this->TimeSlot->AdvancedSearch->save();

        // Field IsBundle
        $this->IsBundle->AdvancedSearch->SearchValue = @$filter["x_IsBundle"];
        $this->IsBundle->AdvancedSearch->SearchOperator = @$filter["z_IsBundle"];
        $this->IsBundle->AdvancedSearch->SearchCondition = @$filter["v_IsBundle"];
        $this->IsBundle->AdvancedSearch->SearchValue2 = @$filter["y_IsBundle"];
        $this->IsBundle->AdvancedSearch->SearchOperator2 = @$filter["w_IsBundle"];
        $this->IsBundle->AdvancedSearch->save();

        // Field ColorCode
        $this->ColorCode->AdvancedSearch->SearchValue = @$filter["x_ColorCode"];
        $this->ColorCode->AdvancedSearch->SearchOperator = @$filter["z_ColorCode"];
        $this->ColorCode->AdvancedSearch->SearchCondition = @$filter["v_ColorCode"];
        $this->ColorCode->AdvancedSearch->SearchValue2 = @$filter["y_ColorCode"];
        $this->ColorCode->AdvancedSearch->SearchOperator2 = @$filter["w_ColorCode"];
        $this->ColorCode->AdvancedSearch->save();

        // Field GenderCode
        $this->GenderCode->AdvancedSearch->SearchValue = @$filter["x_GenderCode"];
        $this->GenderCode->AdvancedSearch->SearchOperator = @$filter["z_GenderCode"];
        $this->GenderCode->AdvancedSearch->SearchCondition = @$filter["v_GenderCode"];
        $this->GenderCode->AdvancedSearch->SearchValue2 = @$filter["y_GenderCode"];
        $this->GenderCode->AdvancedSearch->SearchOperator2 = @$filter["w_GenderCode"];
        $this->GenderCode->AdvancedSearch->save();

        // Field SizeCode
        $this->SizeCode->AdvancedSearch->SearchValue = @$filter["x_SizeCode"];
        $this->SizeCode->AdvancedSearch->SearchOperator = @$filter["z_SizeCode"];
        $this->SizeCode->AdvancedSearch->SearchCondition = @$filter["v_SizeCode"];
        $this->SizeCode->AdvancedSearch->SearchValue2 = @$filter["y_SizeCode"];
        $this->SizeCode->AdvancedSearch->SearchOperator2 = @$filter["w_SizeCode"];
        $this->SizeCode->AdvancedSearch->save();

        // Field GiftCard
        $this->GiftCard->AdvancedSearch->SearchValue = @$filter["x_GiftCard"];
        $this->GiftCard->AdvancedSearch->SearchOperator = @$filter["z_GiftCard"];
        $this->GiftCard->AdvancedSearch->SearchCondition = @$filter["v_GiftCard"];
        $this->GiftCard->AdvancedSearch->SearchValue2 = @$filter["y_GiftCard"];
        $this->GiftCard->AdvancedSearch->SearchOperator2 = @$filter["w_GiftCard"];
        $this->GiftCard->AdvancedSearch->save();

        // Field ToonLabel
        $this->ToonLabel->AdvancedSearch->SearchValue = @$filter["x_ToonLabel"];
        $this->ToonLabel->AdvancedSearch->SearchOperator = @$filter["z_ToonLabel"];
        $this->ToonLabel->AdvancedSearch->SearchCondition = @$filter["v_ToonLabel"];
        $this->ToonLabel->AdvancedSearch->SearchValue2 = @$filter["y_ToonLabel"];
        $this->ToonLabel->AdvancedSearch->SearchOperator2 = @$filter["w_ToonLabel"];
        $this->ToonLabel->AdvancedSearch->save();

        // Field GarmentType
        $this->GarmentType->AdvancedSearch->SearchValue = @$filter["x_GarmentType"];
        $this->GarmentType->AdvancedSearch->SearchOperator = @$filter["z_GarmentType"];
        $this->GarmentType->AdvancedSearch->SearchCondition = @$filter["v_GarmentType"];
        $this->GarmentType->AdvancedSearch->SearchValue2 = @$filter["y_GarmentType"];
        $this->GarmentType->AdvancedSearch->SearchOperator2 = @$filter["w_GarmentType"];
        $this->GarmentType->AdvancedSearch->save();

        // Field AgeGroup
        $this->AgeGroup->AdvancedSearch->SearchValue = @$filter["x_AgeGroup"];
        $this->AgeGroup->AdvancedSearch->SearchOperator = @$filter["z_AgeGroup"];
        $this->AgeGroup->AdvancedSearch->SearchCondition = @$filter["v_AgeGroup"];
        $this->AgeGroup->AdvancedSearch->SearchValue2 = @$filter["y_AgeGroup"];
        $this->AgeGroup->AdvancedSearch->SearchOperator2 = @$filter["w_AgeGroup"];
        $this->AgeGroup->AdvancedSearch->save();

        // Field Season
        $this->Season->AdvancedSearch->SearchValue = @$filter["x_Season"];
        $this->Season->AdvancedSearch->SearchOperator = @$filter["z_Season"];
        $this->Season->AdvancedSearch->SearchCondition = @$filter["v_Season"];
        $this->Season->AdvancedSearch->SearchValue2 = @$filter["y_Season"];
        $this->Season->AdvancedSearch->SearchOperator2 = @$filter["w_Season"];
        $this->Season->AdvancedSearch->save();

        // Field DailyStockEntry
        $this->DailyStockEntry->AdvancedSearch->SearchValue = @$filter["x_DailyStockEntry"];
        $this->DailyStockEntry->AdvancedSearch->SearchOperator = @$filter["z_DailyStockEntry"];
        $this->DailyStockEntry->AdvancedSearch->SearchCondition = @$filter["v_DailyStockEntry"];
        $this->DailyStockEntry->AdvancedSearch->SearchValue2 = @$filter["y_DailyStockEntry"];
        $this->DailyStockEntry->AdvancedSearch->SearchOperator2 = @$filter["w_DailyStockEntry"];
        $this->DailyStockEntry->AdvancedSearch->save();

        // Field ModifierApplicable
        $this->ModifierApplicable->AdvancedSearch->SearchValue = @$filter["x_ModifierApplicable"];
        $this->ModifierApplicable->AdvancedSearch->SearchOperator = @$filter["z_ModifierApplicable"];
        $this->ModifierApplicable->AdvancedSearch->SearchCondition = @$filter["v_ModifierApplicable"];
        $this->ModifierApplicable->AdvancedSearch->SearchValue2 = @$filter["y_ModifierApplicable"];
        $this->ModifierApplicable->AdvancedSearch->SearchOperator2 = @$filter["w_ModifierApplicable"];
        $this->ModifierApplicable->AdvancedSearch->save();

        // Field ModifierType
        $this->ModifierType->AdvancedSearch->SearchValue = @$filter["x_ModifierType"];
        $this->ModifierType->AdvancedSearch->SearchOperator = @$filter["z_ModifierType"];
        $this->ModifierType->AdvancedSearch->SearchCondition = @$filter["v_ModifierType"];
        $this->ModifierType->AdvancedSearch->SearchValue2 = @$filter["y_ModifierType"];
        $this->ModifierType->AdvancedSearch->SearchOperator2 = @$filter["w_ModifierType"];
        $this->ModifierType->AdvancedSearch->save();

        // Field AcceptZeroRate
        $this->AcceptZeroRate->AdvancedSearch->SearchValue = @$filter["x_AcceptZeroRate"];
        $this->AcceptZeroRate->AdvancedSearch->SearchOperator = @$filter["z_AcceptZeroRate"];
        $this->AcceptZeroRate->AdvancedSearch->SearchCondition = @$filter["v_AcceptZeroRate"];
        $this->AcceptZeroRate->AdvancedSearch->SearchValue2 = @$filter["y_AcceptZeroRate"];
        $this->AcceptZeroRate->AdvancedSearch->SearchOperator2 = @$filter["w_AcceptZeroRate"];
        $this->AcceptZeroRate->AdvancedSearch->save();

        // Field ExciseDutyCode
        $this->ExciseDutyCode->AdvancedSearch->SearchValue = @$filter["x_ExciseDutyCode"];
        $this->ExciseDutyCode->AdvancedSearch->SearchOperator = @$filter["z_ExciseDutyCode"];
        $this->ExciseDutyCode->AdvancedSearch->SearchCondition = @$filter["v_ExciseDutyCode"];
        $this->ExciseDutyCode->AdvancedSearch->SearchValue2 = @$filter["y_ExciseDutyCode"];
        $this->ExciseDutyCode->AdvancedSearch->SearchOperator2 = @$filter["w_ExciseDutyCode"];
        $this->ExciseDutyCode->AdvancedSearch->save();

        // Field IndentProductGroupCode
        $this->IndentProductGroupCode->AdvancedSearch->SearchValue = @$filter["x_IndentProductGroupCode"];
        $this->IndentProductGroupCode->AdvancedSearch->SearchOperator = @$filter["z_IndentProductGroupCode"];
        $this->IndentProductGroupCode->AdvancedSearch->SearchCondition = @$filter["v_IndentProductGroupCode"];
        $this->IndentProductGroupCode->AdvancedSearch->SearchValue2 = @$filter["y_IndentProductGroupCode"];
        $this->IndentProductGroupCode->AdvancedSearch->SearchOperator2 = @$filter["w_IndentProductGroupCode"];
        $this->IndentProductGroupCode->AdvancedSearch->save();

        // Field IsMultiBatch
        $this->IsMultiBatch->AdvancedSearch->SearchValue = @$filter["x_IsMultiBatch"];
        $this->IsMultiBatch->AdvancedSearch->SearchOperator = @$filter["z_IsMultiBatch"];
        $this->IsMultiBatch->AdvancedSearch->SearchCondition = @$filter["v_IsMultiBatch"];
        $this->IsMultiBatch->AdvancedSearch->SearchValue2 = @$filter["y_IsMultiBatch"];
        $this->IsMultiBatch->AdvancedSearch->SearchOperator2 = @$filter["w_IsMultiBatch"];
        $this->IsMultiBatch->AdvancedSearch->save();

        // Field IsSingleBatch
        $this->IsSingleBatch->AdvancedSearch->SearchValue = @$filter["x_IsSingleBatch"];
        $this->IsSingleBatch->AdvancedSearch->SearchOperator = @$filter["z_IsSingleBatch"];
        $this->IsSingleBatch->AdvancedSearch->SearchCondition = @$filter["v_IsSingleBatch"];
        $this->IsSingleBatch->AdvancedSearch->SearchValue2 = @$filter["y_IsSingleBatch"];
        $this->IsSingleBatch->AdvancedSearch->SearchOperator2 = @$filter["w_IsSingleBatch"];
        $this->IsSingleBatch->AdvancedSearch->save();

        // Field MarkUpRate1
        $this->MarkUpRate1->AdvancedSearch->SearchValue = @$filter["x_MarkUpRate1"];
        $this->MarkUpRate1->AdvancedSearch->SearchOperator = @$filter["z_MarkUpRate1"];
        $this->MarkUpRate1->AdvancedSearch->SearchCondition = @$filter["v_MarkUpRate1"];
        $this->MarkUpRate1->AdvancedSearch->SearchValue2 = @$filter["y_MarkUpRate1"];
        $this->MarkUpRate1->AdvancedSearch->SearchOperator2 = @$filter["w_MarkUpRate1"];
        $this->MarkUpRate1->AdvancedSearch->save();

        // Field MarkDownRate1
        $this->MarkDownRate1->AdvancedSearch->SearchValue = @$filter["x_MarkDownRate1"];
        $this->MarkDownRate1->AdvancedSearch->SearchOperator = @$filter["z_MarkDownRate1"];
        $this->MarkDownRate1->AdvancedSearch->SearchCondition = @$filter["v_MarkDownRate1"];
        $this->MarkDownRate1->AdvancedSearch->SearchValue2 = @$filter["y_MarkDownRate1"];
        $this->MarkDownRate1->AdvancedSearch->SearchOperator2 = @$filter["w_MarkDownRate1"];
        $this->MarkDownRate1->AdvancedSearch->save();

        // Field MarkUpRate2
        $this->MarkUpRate2->AdvancedSearch->SearchValue = @$filter["x_MarkUpRate2"];
        $this->MarkUpRate2->AdvancedSearch->SearchOperator = @$filter["z_MarkUpRate2"];
        $this->MarkUpRate2->AdvancedSearch->SearchCondition = @$filter["v_MarkUpRate2"];
        $this->MarkUpRate2->AdvancedSearch->SearchValue2 = @$filter["y_MarkUpRate2"];
        $this->MarkUpRate2->AdvancedSearch->SearchOperator2 = @$filter["w_MarkUpRate2"];
        $this->MarkUpRate2->AdvancedSearch->save();

        // Field MarkDownRate2
        $this->MarkDownRate2->AdvancedSearch->SearchValue = @$filter["x_MarkDownRate2"];
        $this->MarkDownRate2->AdvancedSearch->SearchOperator = @$filter["z_MarkDownRate2"];
        $this->MarkDownRate2->AdvancedSearch->SearchCondition = @$filter["v_MarkDownRate2"];
        $this->MarkDownRate2->AdvancedSearch->SearchValue2 = @$filter["y_MarkDownRate2"];
        $this->MarkDownRate2->AdvancedSearch->SearchOperator2 = @$filter["w_MarkDownRate2"];
        $this->MarkDownRate2->AdvancedSearch->save();

        // Field Yield
        $this->_Yield->AdvancedSearch->SearchValue = @$filter["x__Yield"];
        $this->_Yield->AdvancedSearch->SearchOperator = @$filter["z__Yield"];
        $this->_Yield->AdvancedSearch->SearchCondition = @$filter["v__Yield"];
        $this->_Yield->AdvancedSearch->SearchValue2 = @$filter["y__Yield"];
        $this->_Yield->AdvancedSearch->SearchOperator2 = @$filter["w__Yield"];
        $this->_Yield->AdvancedSearch->save();

        // Field RefProductCode
        $this->RefProductCode->AdvancedSearch->SearchValue = @$filter["x_RefProductCode"];
        $this->RefProductCode->AdvancedSearch->SearchOperator = @$filter["z_RefProductCode"];
        $this->RefProductCode->AdvancedSearch->SearchCondition = @$filter["v_RefProductCode"];
        $this->RefProductCode->AdvancedSearch->SearchValue2 = @$filter["y_RefProductCode"];
        $this->RefProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_RefProductCode"];
        $this->RefProductCode->AdvancedSearch->save();

        // Field Volume
        $this->Volume->AdvancedSearch->SearchValue = @$filter["x_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator = @$filter["z_Volume"];
        $this->Volume->AdvancedSearch->SearchCondition = @$filter["v_Volume"];
        $this->Volume->AdvancedSearch->SearchValue2 = @$filter["y_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator2 = @$filter["w_Volume"];
        $this->Volume->AdvancedSearch->save();

        // Field MeasurementID
        $this->MeasurementID->AdvancedSearch->SearchValue = @$filter["x_MeasurementID"];
        $this->MeasurementID->AdvancedSearch->SearchOperator = @$filter["z_MeasurementID"];
        $this->MeasurementID->AdvancedSearch->SearchCondition = @$filter["v_MeasurementID"];
        $this->MeasurementID->AdvancedSearch->SearchValue2 = @$filter["y_MeasurementID"];
        $this->MeasurementID->AdvancedSearch->SearchOperator2 = @$filter["w_MeasurementID"];
        $this->MeasurementID->AdvancedSearch->save();

        // Field CountryCode
        $this->CountryCode->AdvancedSearch->SearchValue = @$filter["x_CountryCode"];
        $this->CountryCode->AdvancedSearch->SearchOperator = @$filter["z_CountryCode"];
        $this->CountryCode->AdvancedSearch->SearchCondition = @$filter["v_CountryCode"];
        $this->CountryCode->AdvancedSearch->SearchValue2 = @$filter["y_CountryCode"];
        $this->CountryCode->AdvancedSearch->SearchOperator2 = @$filter["w_CountryCode"];
        $this->CountryCode->AdvancedSearch->save();

        // Field AcceptWMQty
        $this->AcceptWMQty->AdvancedSearch->SearchValue = @$filter["x_AcceptWMQty"];
        $this->AcceptWMQty->AdvancedSearch->SearchOperator = @$filter["z_AcceptWMQty"];
        $this->AcceptWMQty->AdvancedSearch->SearchCondition = @$filter["v_AcceptWMQty"];
        $this->AcceptWMQty->AdvancedSearch->SearchValue2 = @$filter["y_AcceptWMQty"];
        $this->AcceptWMQty->AdvancedSearch->SearchOperator2 = @$filter["w_AcceptWMQty"];
        $this->AcceptWMQty->AdvancedSearch->save();

        // Field SingleBatchBasedOnRate
        $this->SingleBatchBasedOnRate->AdvancedSearch->SearchValue = @$filter["x_SingleBatchBasedOnRate"];
        $this->SingleBatchBasedOnRate->AdvancedSearch->SearchOperator = @$filter["z_SingleBatchBasedOnRate"];
        $this->SingleBatchBasedOnRate->AdvancedSearch->SearchCondition = @$filter["v_SingleBatchBasedOnRate"];
        $this->SingleBatchBasedOnRate->AdvancedSearch->SearchValue2 = @$filter["y_SingleBatchBasedOnRate"];
        $this->SingleBatchBasedOnRate->AdvancedSearch->SearchOperator2 = @$filter["w_SingleBatchBasedOnRate"];
        $this->SingleBatchBasedOnRate->AdvancedSearch->save();

        // Field TenderNo
        $this->TenderNo->AdvancedSearch->SearchValue = @$filter["x_TenderNo"];
        $this->TenderNo->AdvancedSearch->SearchOperator = @$filter["z_TenderNo"];
        $this->TenderNo->AdvancedSearch->SearchCondition = @$filter["v_TenderNo"];
        $this->TenderNo->AdvancedSearch->SearchValue2 = @$filter["y_TenderNo"];
        $this->TenderNo->AdvancedSearch->SearchOperator2 = @$filter["w_TenderNo"];
        $this->TenderNo->AdvancedSearch->save();

        // Field SingleBillMaximumSoldQtyFiled
        $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->SearchValue = @$filter["x_SingleBillMaximumSoldQtyFiled"];
        $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->SearchOperator = @$filter["z_SingleBillMaximumSoldQtyFiled"];
        $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->SearchCondition = @$filter["v_SingleBillMaximumSoldQtyFiled"];
        $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->SearchValue2 = @$filter["y_SingleBillMaximumSoldQtyFiled"];
        $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->SearchOperator2 = @$filter["w_SingleBillMaximumSoldQtyFiled"];
        $this->SingleBillMaximumSoldQtyFiled->AdvancedSearch->save();

        // Field Strength1
        $this->Strength1->AdvancedSearch->SearchValue = @$filter["x_Strength1"];
        $this->Strength1->AdvancedSearch->SearchOperator = @$filter["z_Strength1"];
        $this->Strength1->AdvancedSearch->SearchCondition = @$filter["v_Strength1"];
        $this->Strength1->AdvancedSearch->SearchValue2 = @$filter["y_Strength1"];
        $this->Strength1->AdvancedSearch->SearchOperator2 = @$filter["w_Strength1"];
        $this->Strength1->AdvancedSearch->save();

        // Field Strength2
        $this->Strength2->AdvancedSearch->SearchValue = @$filter["x_Strength2"];
        $this->Strength2->AdvancedSearch->SearchOperator = @$filter["z_Strength2"];
        $this->Strength2->AdvancedSearch->SearchCondition = @$filter["v_Strength2"];
        $this->Strength2->AdvancedSearch->SearchValue2 = @$filter["y_Strength2"];
        $this->Strength2->AdvancedSearch->SearchOperator2 = @$filter["w_Strength2"];
        $this->Strength2->AdvancedSearch->save();

        // Field Strength3
        $this->Strength3->AdvancedSearch->SearchValue = @$filter["x_Strength3"];
        $this->Strength3->AdvancedSearch->SearchOperator = @$filter["z_Strength3"];
        $this->Strength3->AdvancedSearch->SearchCondition = @$filter["v_Strength3"];
        $this->Strength3->AdvancedSearch->SearchValue2 = @$filter["y_Strength3"];
        $this->Strength3->AdvancedSearch->SearchOperator2 = @$filter["w_Strength3"];
        $this->Strength3->AdvancedSearch->save();

        // Field Strength4
        $this->Strength4->AdvancedSearch->SearchValue = @$filter["x_Strength4"];
        $this->Strength4->AdvancedSearch->SearchOperator = @$filter["z_Strength4"];
        $this->Strength4->AdvancedSearch->SearchCondition = @$filter["v_Strength4"];
        $this->Strength4->AdvancedSearch->SearchValue2 = @$filter["y_Strength4"];
        $this->Strength4->AdvancedSearch->SearchOperator2 = @$filter["w_Strength4"];
        $this->Strength4->AdvancedSearch->save();

        // Field Strength5
        $this->Strength5->AdvancedSearch->SearchValue = @$filter["x_Strength5"];
        $this->Strength5->AdvancedSearch->SearchOperator = @$filter["z_Strength5"];
        $this->Strength5->AdvancedSearch->SearchCondition = @$filter["v_Strength5"];
        $this->Strength5->AdvancedSearch->SearchValue2 = @$filter["y_Strength5"];
        $this->Strength5->AdvancedSearch->SearchOperator2 = @$filter["w_Strength5"];
        $this->Strength5->AdvancedSearch->save();

        // Field IngredientCode1
        $this->IngredientCode1->AdvancedSearch->SearchValue = @$filter["x_IngredientCode1"];
        $this->IngredientCode1->AdvancedSearch->SearchOperator = @$filter["z_IngredientCode1"];
        $this->IngredientCode1->AdvancedSearch->SearchCondition = @$filter["v_IngredientCode1"];
        $this->IngredientCode1->AdvancedSearch->SearchValue2 = @$filter["y_IngredientCode1"];
        $this->IngredientCode1->AdvancedSearch->SearchOperator2 = @$filter["w_IngredientCode1"];
        $this->IngredientCode1->AdvancedSearch->save();

        // Field IngredientCode2
        $this->IngredientCode2->AdvancedSearch->SearchValue = @$filter["x_IngredientCode2"];
        $this->IngredientCode2->AdvancedSearch->SearchOperator = @$filter["z_IngredientCode2"];
        $this->IngredientCode2->AdvancedSearch->SearchCondition = @$filter["v_IngredientCode2"];
        $this->IngredientCode2->AdvancedSearch->SearchValue2 = @$filter["y_IngredientCode2"];
        $this->IngredientCode2->AdvancedSearch->SearchOperator2 = @$filter["w_IngredientCode2"];
        $this->IngredientCode2->AdvancedSearch->save();

        // Field IngredientCode3
        $this->IngredientCode3->AdvancedSearch->SearchValue = @$filter["x_IngredientCode3"];
        $this->IngredientCode3->AdvancedSearch->SearchOperator = @$filter["z_IngredientCode3"];
        $this->IngredientCode3->AdvancedSearch->SearchCondition = @$filter["v_IngredientCode3"];
        $this->IngredientCode3->AdvancedSearch->SearchValue2 = @$filter["y_IngredientCode3"];
        $this->IngredientCode3->AdvancedSearch->SearchOperator2 = @$filter["w_IngredientCode3"];
        $this->IngredientCode3->AdvancedSearch->save();

        // Field IngredientCode4
        $this->IngredientCode4->AdvancedSearch->SearchValue = @$filter["x_IngredientCode4"];
        $this->IngredientCode4->AdvancedSearch->SearchOperator = @$filter["z_IngredientCode4"];
        $this->IngredientCode4->AdvancedSearch->SearchCondition = @$filter["v_IngredientCode4"];
        $this->IngredientCode4->AdvancedSearch->SearchValue2 = @$filter["y_IngredientCode4"];
        $this->IngredientCode4->AdvancedSearch->SearchOperator2 = @$filter["w_IngredientCode4"];
        $this->IngredientCode4->AdvancedSearch->save();

        // Field IngredientCode5
        $this->IngredientCode5->AdvancedSearch->SearchValue = @$filter["x_IngredientCode5"];
        $this->IngredientCode5->AdvancedSearch->SearchOperator = @$filter["z_IngredientCode5"];
        $this->IngredientCode5->AdvancedSearch->SearchCondition = @$filter["v_IngredientCode5"];
        $this->IngredientCode5->AdvancedSearch->SearchValue2 = @$filter["y_IngredientCode5"];
        $this->IngredientCode5->AdvancedSearch->SearchOperator2 = @$filter["w_IngredientCode5"];
        $this->IngredientCode5->AdvancedSearch->save();

        // Field OrderType
        $this->OrderType->AdvancedSearch->SearchValue = @$filter["x_OrderType"];
        $this->OrderType->AdvancedSearch->SearchOperator = @$filter["z_OrderType"];
        $this->OrderType->AdvancedSearch->SearchCondition = @$filter["v_OrderType"];
        $this->OrderType->AdvancedSearch->SearchValue2 = @$filter["y_OrderType"];
        $this->OrderType->AdvancedSearch->SearchOperator2 = @$filter["w_OrderType"];
        $this->OrderType->AdvancedSearch->save();

        // Field StockUOM
        $this->StockUOM->AdvancedSearch->SearchValue = @$filter["x_StockUOM"];
        $this->StockUOM->AdvancedSearch->SearchOperator = @$filter["z_StockUOM"];
        $this->StockUOM->AdvancedSearch->SearchCondition = @$filter["v_StockUOM"];
        $this->StockUOM->AdvancedSearch->SearchValue2 = @$filter["y_StockUOM"];
        $this->StockUOM->AdvancedSearch->SearchOperator2 = @$filter["w_StockUOM"];
        $this->StockUOM->AdvancedSearch->save();

        // Field PriceUOM
        $this->PriceUOM->AdvancedSearch->SearchValue = @$filter["x_PriceUOM"];
        $this->PriceUOM->AdvancedSearch->SearchOperator = @$filter["z_PriceUOM"];
        $this->PriceUOM->AdvancedSearch->SearchCondition = @$filter["v_PriceUOM"];
        $this->PriceUOM->AdvancedSearch->SearchValue2 = @$filter["y_PriceUOM"];
        $this->PriceUOM->AdvancedSearch->SearchOperator2 = @$filter["w_PriceUOM"];
        $this->PriceUOM->AdvancedSearch->save();

        // Field DefaultSaleUOM
        $this->DefaultSaleUOM->AdvancedSearch->SearchValue = @$filter["x_DefaultSaleUOM"];
        $this->DefaultSaleUOM->AdvancedSearch->SearchOperator = @$filter["z_DefaultSaleUOM"];
        $this->DefaultSaleUOM->AdvancedSearch->SearchCondition = @$filter["v_DefaultSaleUOM"];
        $this->DefaultSaleUOM->AdvancedSearch->SearchValue2 = @$filter["y_DefaultSaleUOM"];
        $this->DefaultSaleUOM->AdvancedSearch->SearchOperator2 = @$filter["w_DefaultSaleUOM"];
        $this->DefaultSaleUOM->AdvancedSearch->save();

        // Field DefaultPurchaseUOM
        $this->DefaultPurchaseUOM->AdvancedSearch->SearchValue = @$filter["x_DefaultPurchaseUOM"];
        $this->DefaultPurchaseUOM->AdvancedSearch->SearchOperator = @$filter["z_DefaultPurchaseUOM"];
        $this->DefaultPurchaseUOM->AdvancedSearch->SearchCondition = @$filter["v_DefaultPurchaseUOM"];
        $this->DefaultPurchaseUOM->AdvancedSearch->SearchValue2 = @$filter["y_DefaultPurchaseUOM"];
        $this->DefaultPurchaseUOM->AdvancedSearch->SearchOperator2 = @$filter["w_DefaultPurchaseUOM"];
        $this->DefaultPurchaseUOM->AdvancedSearch->save();

        // Field ReportingUOM
        $this->ReportingUOM->AdvancedSearch->SearchValue = @$filter["x_ReportingUOM"];
        $this->ReportingUOM->AdvancedSearch->SearchOperator = @$filter["z_ReportingUOM"];
        $this->ReportingUOM->AdvancedSearch->SearchCondition = @$filter["v_ReportingUOM"];
        $this->ReportingUOM->AdvancedSearch->SearchValue2 = @$filter["y_ReportingUOM"];
        $this->ReportingUOM->AdvancedSearch->SearchOperator2 = @$filter["w_ReportingUOM"];
        $this->ReportingUOM->AdvancedSearch->save();

        // Field LastPurchasedUOM
        $this->LastPurchasedUOM->AdvancedSearch->SearchValue = @$filter["x_LastPurchasedUOM"];
        $this->LastPurchasedUOM->AdvancedSearch->SearchOperator = @$filter["z_LastPurchasedUOM"];
        $this->LastPurchasedUOM->AdvancedSearch->SearchCondition = @$filter["v_LastPurchasedUOM"];
        $this->LastPurchasedUOM->AdvancedSearch->SearchValue2 = @$filter["y_LastPurchasedUOM"];
        $this->LastPurchasedUOM->AdvancedSearch->SearchOperator2 = @$filter["w_LastPurchasedUOM"];
        $this->LastPurchasedUOM->AdvancedSearch->save();

        // Field TreatmentCodes
        $this->TreatmentCodes->AdvancedSearch->SearchValue = @$filter["x_TreatmentCodes"];
        $this->TreatmentCodes->AdvancedSearch->SearchOperator = @$filter["z_TreatmentCodes"];
        $this->TreatmentCodes->AdvancedSearch->SearchCondition = @$filter["v_TreatmentCodes"];
        $this->TreatmentCodes->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentCodes"];
        $this->TreatmentCodes->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentCodes"];
        $this->TreatmentCodes->AdvancedSearch->save();

        // Field InsuranceType
        $this->InsuranceType->AdvancedSearch->SearchValue = @$filter["x_InsuranceType"];
        $this->InsuranceType->AdvancedSearch->SearchOperator = @$filter["z_InsuranceType"];
        $this->InsuranceType->AdvancedSearch->SearchCondition = @$filter["v_InsuranceType"];
        $this->InsuranceType->AdvancedSearch->SearchValue2 = @$filter["y_InsuranceType"];
        $this->InsuranceType->AdvancedSearch->SearchOperator2 = @$filter["w_InsuranceType"];
        $this->InsuranceType->AdvancedSearch->save();

        // Field CoverageGroupCodes
        $this->CoverageGroupCodes->AdvancedSearch->SearchValue = @$filter["x_CoverageGroupCodes"];
        $this->CoverageGroupCodes->AdvancedSearch->SearchOperator = @$filter["z_CoverageGroupCodes"];
        $this->CoverageGroupCodes->AdvancedSearch->SearchCondition = @$filter["v_CoverageGroupCodes"];
        $this->CoverageGroupCodes->AdvancedSearch->SearchValue2 = @$filter["y_CoverageGroupCodes"];
        $this->CoverageGroupCodes->AdvancedSearch->SearchOperator2 = @$filter["w_CoverageGroupCodes"];
        $this->CoverageGroupCodes->AdvancedSearch->save();

        // Field MultipleUOM
        $this->MultipleUOM->AdvancedSearch->SearchValue = @$filter["x_MultipleUOM"];
        $this->MultipleUOM->AdvancedSearch->SearchOperator = @$filter["z_MultipleUOM"];
        $this->MultipleUOM->AdvancedSearch->SearchCondition = @$filter["v_MultipleUOM"];
        $this->MultipleUOM->AdvancedSearch->SearchValue2 = @$filter["y_MultipleUOM"];
        $this->MultipleUOM->AdvancedSearch->SearchOperator2 = @$filter["w_MultipleUOM"];
        $this->MultipleUOM->AdvancedSearch->save();

        // Field SalePriceComputation
        $this->SalePriceComputation->AdvancedSearch->SearchValue = @$filter["x_SalePriceComputation"];
        $this->SalePriceComputation->AdvancedSearch->SearchOperator = @$filter["z_SalePriceComputation"];
        $this->SalePriceComputation->AdvancedSearch->SearchCondition = @$filter["v_SalePriceComputation"];
        $this->SalePriceComputation->AdvancedSearch->SearchValue2 = @$filter["y_SalePriceComputation"];
        $this->SalePriceComputation->AdvancedSearch->SearchOperator2 = @$filter["w_SalePriceComputation"];
        $this->SalePriceComputation->AdvancedSearch->save();

        // Field StockCorrection
        $this->StockCorrection->AdvancedSearch->SearchValue = @$filter["x_StockCorrection"];
        $this->StockCorrection->AdvancedSearch->SearchOperator = @$filter["z_StockCorrection"];
        $this->StockCorrection->AdvancedSearch->SearchCondition = @$filter["v_StockCorrection"];
        $this->StockCorrection->AdvancedSearch->SearchValue2 = @$filter["y_StockCorrection"];
        $this->StockCorrection->AdvancedSearch->SearchOperator2 = @$filter["w_StockCorrection"];
        $this->StockCorrection->AdvancedSearch->save();

        // Field LBTPercentage
        $this->LBTPercentage->AdvancedSearch->SearchValue = @$filter["x_LBTPercentage"];
        $this->LBTPercentage->AdvancedSearch->SearchOperator = @$filter["z_LBTPercentage"];
        $this->LBTPercentage->AdvancedSearch->SearchCondition = @$filter["v_LBTPercentage"];
        $this->LBTPercentage->AdvancedSearch->SearchValue2 = @$filter["y_LBTPercentage"];
        $this->LBTPercentage->AdvancedSearch->SearchOperator2 = @$filter["w_LBTPercentage"];
        $this->LBTPercentage->AdvancedSearch->save();

        // Field SalesCommission
        $this->SalesCommission->AdvancedSearch->SearchValue = @$filter["x_SalesCommission"];
        $this->SalesCommission->AdvancedSearch->SearchOperator = @$filter["z_SalesCommission"];
        $this->SalesCommission->AdvancedSearch->SearchCondition = @$filter["v_SalesCommission"];
        $this->SalesCommission->AdvancedSearch->SearchValue2 = @$filter["y_SalesCommission"];
        $this->SalesCommission->AdvancedSearch->SearchOperator2 = @$filter["w_SalesCommission"];
        $this->SalesCommission->AdvancedSearch->save();

        // Field LockedStock
        $this->LockedStock->AdvancedSearch->SearchValue = @$filter["x_LockedStock"];
        $this->LockedStock->AdvancedSearch->SearchOperator = @$filter["z_LockedStock"];
        $this->LockedStock->AdvancedSearch->SearchCondition = @$filter["v_LockedStock"];
        $this->LockedStock->AdvancedSearch->SearchValue2 = @$filter["y_LockedStock"];
        $this->LockedStock->AdvancedSearch->SearchOperator2 = @$filter["w_LockedStock"];
        $this->LockedStock->AdvancedSearch->save();

        // Field MinMaxUOM
        $this->MinMaxUOM->AdvancedSearch->SearchValue = @$filter["x_MinMaxUOM"];
        $this->MinMaxUOM->AdvancedSearch->SearchOperator = @$filter["z_MinMaxUOM"];
        $this->MinMaxUOM->AdvancedSearch->SearchCondition = @$filter["v_MinMaxUOM"];
        $this->MinMaxUOM->AdvancedSearch->SearchValue2 = @$filter["y_MinMaxUOM"];
        $this->MinMaxUOM->AdvancedSearch->SearchOperator2 = @$filter["w_MinMaxUOM"];
        $this->MinMaxUOM->AdvancedSearch->save();

        // Field ExpiryMfrDateFormat
        $this->ExpiryMfrDateFormat->AdvancedSearch->SearchValue = @$filter["x_ExpiryMfrDateFormat"];
        $this->ExpiryMfrDateFormat->AdvancedSearch->SearchOperator = @$filter["z_ExpiryMfrDateFormat"];
        $this->ExpiryMfrDateFormat->AdvancedSearch->SearchCondition = @$filter["v_ExpiryMfrDateFormat"];
        $this->ExpiryMfrDateFormat->AdvancedSearch->SearchValue2 = @$filter["y_ExpiryMfrDateFormat"];
        $this->ExpiryMfrDateFormat->AdvancedSearch->SearchOperator2 = @$filter["w_ExpiryMfrDateFormat"];
        $this->ExpiryMfrDateFormat->AdvancedSearch->save();

        // Field ProductLifeTime
        $this->ProductLifeTime->AdvancedSearch->SearchValue = @$filter["x_ProductLifeTime"];
        $this->ProductLifeTime->AdvancedSearch->SearchOperator = @$filter["z_ProductLifeTime"];
        $this->ProductLifeTime->AdvancedSearch->SearchCondition = @$filter["v_ProductLifeTime"];
        $this->ProductLifeTime->AdvancedSearch->SearchValue2 = @$filter["y_ProductLifeTime"];
        $this->ProductLifeTime->AdvancedSearch->SearchOperator2 = @$filter["w_ProductLifeTime"];
        $this->ProductLifeTime->AdvancedSearch->save();

        // Field IsCombo
        $this->IsCombo->AdvancedSearch->SearchValue = @$filter["x_IsCombo"];
        $this->IsCombo->AdvancedSearch->SearchOperator = @$filter["z_IsCombo"];
        $this->IsCombo->AdvancedSearch->SearchCondition = @$filter["v_IsCombo"];
        $this->IsCombo->AdvancedSearch->SearchValue2 = @$filter["y_IsCombo"];
        $this->IsCombo->AdvancedSearch->SearchOperator2 = @$filter["w_IsCombo"];
        $this->IsCombo->AdvancedSearch->save();

        // Field ComboTypeCode
        $this->ComboTypeCode->AdvancedSearch->SearchValue = @$filter["x_ComboTypeCode"];
        $this->ComboTypeCode->AdvancedSearch->SearchOperator = @$filter["z_ComboTypeCode"];
        $this->ComboTypeCode->AdvancedSearch->SearchCondition = @$filter["v_ComboTypeCode"];
        $this->ComboTypeCode->AdvancedSearch->SearchValue2 = @$filter["y_ComboTypeCode"];
        $this->ComboTypeCode->AdvancedSearch->SearchOperator2 = @$filter["w_ComboTypeCode"];
        $this->ComboTypeCode->AdvancedSearch->save();

        // Field AttributeCount6
        $this->AttributeCount6->AdvancedSearch->SearchValue = @$filter["x_AttributeCount6"];
        $this->AttributeCount6->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount6"];
        $this->AttributeCount6->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount6"];
        $this->AttributeCount6->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount6"];
        $this->AttributeCount6->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount6"];
        $this->AttributeCount6->AdvancedSearch->save();

        // Field AttributeCount7
        $this->AttributeCount7->AdvancedSearch->SearchValue = @$filter["x_AttributeCount7"];
        $this->AttributeCount7->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount7"];
        $this->AttributeCount7->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount7"];
        $this->AttributeCount7->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount7"];
        $this->AttributeCount7->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount7"];
        $this->AttributeCount7->AdvancedSearch->save();

        // Field AttributeCount8
        $this->AttributeCount8->AdvancedSearch->SearchValue = @$filter["x_AttributeCount8"];
        $this->AttributeCount8->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount8"];
        $this->AttributeCount8->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount8"];
        $this->AttributeCount8->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount8"];
        $this->AttributeCount8->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount8"];
        $this->AttributeCount8->AdvancedSearch->save();

        // Field AttributeCount9
        $this->AttributeCount9->AdvancedSearch->SearchValue = @$filter["x_AttributeCount9"];
        $this->AttributeCount9->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount9"];
        $this->AttributeCount9->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount9"];
        $this->AttributeCount9->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount9"];
        $this->AttributeCount9->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount9"];
        $this->AttributeCount9->AdvancedSearch->save();

        // Field AttributeCount10
        $this->AttributeCount10->AdvancedSearch->SearchValue = @$filter["x_AttributeCount10"];
        $this->AttributeCount10->AdvancedSearch->SearchOperator = @$filter["z_AttributeCount10"];
        $this->AttributeCount10->AdvancedSearch->SearchCondition = @$filter["v_AttributeCount10"];
        $this->AttributeCount10->AdvancedSearch->SearchValue2 = @$filter["y_AttributeCount10"];
        $this->AttributeCount10->AdvancedSearch->SearchOperator2 = @$filter["w_AttributeCount10"];
        $this->AttributeCount10->AdvancedSearch->save();

        // Field LabourCharge
        $this->LabourCharge->AdvancedSearch->SearchValue = @$filter["x_LabourCharge"];
        $this->LabourCharge->AdvancedSearch->SearchOperator = @$filter["z_LabourCharge"];
        $this->LabourCharge->AdvancedSearch->SearchCondition = @$filter["v_LabourCharge"];
        $this->LabourCharge->AdvancedSearch->SearchValue2 = @$filter["y_LabourCharge"];
        $this->LabourCharge->AdvancedSearch->SearchOperator2 = @$filter["w_LabourCharge"];
        $this->LabourCharge->AdvancedSearch->save();

        // Field AffectOtherCharge
        $this->AffectOtherCharge->AdvancedSearch->SearchValue = @$filter["x_AffectOtherCharge"];
        $this->AffectOtherCharge->AdvancedSearch->SearchOperator = @$filter["z_AffectOtherCharge"];
        $this->AffectOtherCharge->AdvancedSearch->SearchCondition = @$filter["v_AffectOtherCharge"];
        $this->AffectOtherCharge->AdvancedSearch->SearchValue2 = @$filter["y_AffectOtherCharge"];
        $this->AffectOtherCharge->AdvancedSearch->SearchOperator2 = @$filter["w_AffectOtherCharge"];
        $this->AffectOtherCharge->AdvancedSearch->save();

        // Field DosageInfo
        $this->DosageInfo->AdvancedSearch->SearchValue = @$filter["x_DosageInfo"];
        $this->DosageInfo->AdvancedSearch->SearchOperator = @$filter["z_DosageInfo"];
        $this->DosageInfo->AdvancedSearch->SearchCondition = @$filter["v_DosageInfo"];
        $this->DosageInfo->AdvancedSearch->SearchValue2 = @$filter["y_DosageInfo"];
        $this->DosageInfo->AdvancedSearch->SearchOperator2 = @$filter["w_DosageInfo"];
        $this->DosageInfo->AdvancedSearch->save();

        // Field DosageType
        $this->DosageType->AdvancedSearch->SearchValue = @$filter["x_DosageType"];
        $this->DosageType->AdvancedSearch->SearchOperator = @$filter["z_DosageType"];
        $this->DosageType->AdvancedSearch->SearchCondition = @$filter["v_DosageType"];
        $this->DosageType->AdvancedSearch->SearchValue2 = @$filter["y_DosageType"];
        $this->DosageType->AdvancedSearch->SearchOperator2 = @$filter["w_DosageType"];
        $this->DosageType->AdvancedSearch->save();

        // Field DefaultIndentUOM
        $this->DefaultIndentUOM->AdvancedSearch->SearchValue = @$filter["x_DefaultIndentUOM"];
        $this->DefaultIndentUOM->AdvancedSearch->SearchOperator = @$filter["z_DefaultIndentUOM"];
        $this->DefaultIndentUOM->AdvancedSearch->SearchCondition = @$filter["v_DefaultIndentUOM"];
        $this->DefaultIndentUOM->AdvancedSearch->SearchValue2 = @$filter["y_DefaultIndentUOM"];
        $this->DefaultIndentUOM->AdvancedSearch->SearchOperator2 = @$filter["w_DefaultIndentUOM"];
        $this->DefaultIndentUOM->AdvancedSearch->save();

        // Field PromoTag
        $this->PromoTag->AdvancedSearch->SearchValue = @$filter["x_PromoTag"];
        $this->PromoTag->AdvancedSearch->SearchOperator = @$filter["z_PromoTag"];
        $this->PromoTag->AdvancedSearch->SearchCondition = @$filter["v_PromoTag"];
        $this->PromoTag->AdvancedSearch->SearchValue2 = @$filter["y_PromoTag"];
        $this->PromoTag->AdvancedSearch->SearchOperator2 = @$filter["w_PromoTag"];
        $this->PromoTag->AdvancedSearch->save();

        // Field BillLevelPromoTag
        $this->BillLevelPromoTag->AdvancedSearch->SearchValue = @$filter["x_BillLevelPromoTag"];
        $this->BillLevelPromoTag->AdvancedSearch->SearchOperator = @$filter["z_BillLevelPromoTag"];
        $this->BillLevelPromoTag->AdvancedSearch->SearchCondition = @$filter["v_BillLevelPromoTag"];
        $this->BillLevelPromoTag->AdvancedSearch->SearchValue2 = @$filter["y_BillLevelPromoTag"];
        $this->BillLevelPromoTag->AdvancedSearch->SearchOperator2 = @$filter["w_BillLevelPromoTag"];
        $this->BillLevelPromoTag->AdvancedSearch->save();

        // Field IsMRPProduct
        $this->IsMRPProduct->AdvancedSearch->SearchValue = @$filter["x_IsMRPProduct"];
        $this->IsMRPProduct->AdvancedSearch->SearchOperator = @$filter["z_IsMRPProduct"];
        $this->IsMRPProduct->AdvancedSearch->SearchCondition = @$filter["v_IsMRPProduct"];
        $this->IsMRPProduct->AdvancedSearch->SearchValue2 = @$filter["y_IsMRPProduct"];
        $this->IsMRPProduct->AdvancedSearch->SearchOperator2 = @$filter["w_IsMRPProduct"];
        $this->IsMRPProduct->AdvancedSearch->save();

        // Field MrpList
        $this->MrpList->AdvancedSearch->SearchValue = @$filter["x_MrpList"];
        $this->MrpList->AdvancedSearch->SearchOperator = @$filter["z_MrpList"];
        $this->MrpList->AdvancedSearch->SearchCondition = @$filter["v_MrpList"];
        $this->MrpList->AdvancedSearch->SearchValue2 = @$filter["y_MrpList"];
        $this->MrpList->AdvancedSearch->SearchOperator2 = @$filter["w_MrpList"];
        $this->MrpList->AdvancedSearch->save();

        // Field AlternateSaleUOM
        $this->AlternateSaleUOM->AdvancedSearch->SearchValue = @$filter["x_AlternateSaleUOM"];
        $this->AlternateSaleUOM->AdvancedSearch->SearchOperator = @$filter["z_AlternateSaleUOM"];
        $this->AlternateSaleUOM->AdvancedSearch->SearchCondition = @$filter["v_AlternateSaleUOM"];
        $this->AlternateSaleUOM->AdvancedSearch->SearchValue2 = @$filter["y_AlternateSaleUOM"];
        $this->AlternateSaleUOM->AdvancedSearch->SearchOperator2 = @$filter["w_AlternateSaleUOM"];
        $this->AlternateSaleUOM->AdvancedSearch->save();

        // Field FreeUOM
        $this->FreeUOM->AdvancedSearch->SearchValue = @$filter["x_FreeUOM"];
        $this->FreeUOM->AdvancedSearch->SearchOperator = @$filter["z_FreeUOM"];
        $this->FreeUOM->AdvancedSearch->SearchCondition = @$filter["v_FreeUOM"];
        $this->FreeUOM->AdvancedSearch->SearchValue2 = @$filter["y_FreeUOM"];
        $this->FreeUOM->AdvancedSearch->SearchOperator2 = @$filter["w_FreeUOM"];
        $this->FreeUOM->AdvancedSearch->save();

        // Field MarketedCode
        $this->MarketedCode->AdvancedSearch->SearchValue = @$filter["x_MarketedCode"];
        $this->MarketedCode->AdvancedSearch->SearchOperator = @$filter["z_MarketedCode"];
        $this->MarketedCode->AdvancedSearch->SearchCondition = @$filter["v_MarketedCode"];
        $this->MarketedCode->AdvancedSearch->SearchValue2 = @$filter["y_MarketedCode"];
        $this->MarketedCode->AdvancedSearch->SearchOperator2 = @$filter["w_MarketedCode"];
        $this->MarketedCode->AdvancedSearch->save();

        // Field MinimumSalePrice
        $this->MinimumSalePrice->AdvancedSearch->SearchValue = @$filter["x_MinimumSalePrice"];
        $this->MinimumSalePrice->AdvancedSearch->SearchOperator = @$filter["z_MinimumSalePrice"];
        $this->MinimumSalePrice->AdvancedSearch->SearchCondition = @$filter["v_MinimumSalePrice"];
        $this->MinimumSalePrice->AdvancedSearch->SearchValue2 = @$filter["y_MinimumSalePrice"];
        $this->MinimumSalePrice->AdvancedSearch->SearchOperator2 = @$filter["w_MinimumSalePrice"];
        $this->MinimumSalePrice->AdvancedSearch->save();

        // Field PRate1
        $this->PRate1->AdvancedSearch->SearchValue = @$filter["x_PRate1"];
        $this->PRate1->AdvancedSearch->SearchOperator = @$filter["z_PRate1"];
        $this->PRate1->AdvancedSearch->SearchCondition = @$filter["v_PRate1"];
        $this->PRate1->AdvancedSearch->SearchValue2 = @$filter["y_PRate1"];
        $this->PRate1->AdvancedSearch->SearchOperator2 = @$filter["w_PRate1"];
        $this->PRate1->AdvancedSearch->save();

        // Field PRate2
        $this->PRate2->AdvancedSearch->SearchValue = @$filter["x_PRate2"];
        $this->PRate2->AdvancedSearch->SearchOperator = @$filter["z_PRate2"];
        $this->PRate2->AdvancedSearch->SearchCondition = @$filter["v_PRate2"];
        $this->PRate2->AdvancedSearch->SearchValue2 = @$filter["y_PRate2"];
        $this->PRate2->AdvancedSearch->SearchOperator2 = @$filter["w_PRate2"];
        $this->PRate2->AdvancedSearch->save();

        // Field LPItemCost
        $this->LPItemCost->AdvancedSearch->SearchValue = @$filter["x_LPItemCost"];
        $this->LPItemCost->AdvancedSearch->SearchOperator = @$filter["z_LPItemCost"];
        $this->LPItemCost->AdvancedSearch->SearchCondition = @$filter["v_LPItemCost"];
        $this->LPItemCost->AdvancedSearch->SearchValue2 = @$filter["y_LPItemCost"];
        $this->LPItemCost->AdvancedSearch->SearchOperator2 = @$filter["w_LPItemCost"];
        $this->LPItemCost->AdvancedSearch->save();

        // Field FixedItemCost
        $this->FixedItemCost->AdvancedSearch->SearchValue = @$filter["x_FixedItemCost"];
        $this->FixedItemCost->AdvancedSearch->SearchOperator = @$filter["z_FixedItemCost"];
        $this->FixedItemCost->AdvancedSearch->SearchCondition = @$filter["v_FixedItemCost"];
        $this->FixedItemCost->AdvancedSearch->SearchValue2 = @$filter["y_FixedItemCost"];
        $this->FixedItemCost->AdvancedSearch->SearchOperator2 = @$filter["w_FixedItemCost"];
        $this->FixedItemCost->AdvancedSearch->save();

        // Field HSNId
        $this->HSNId->AdvancedSearch->SearchValue = @$filter["x_HSNId"];
        $this->HSNId->AdvancedSearch->SearchOperator = @$filter["z_HSNId"];
        $this->HSNId->AdvancedSearch->SearchCondition = @$filter["v_HSNId"];
        $this->HSNId->AdvancedSearch->SearchValue2 = @$filter["y_HSNId"];
        $this->HSNId->AdvancedSearch->SearchOperator2 = @$filter["w_HSNId"];
        $this->HSNId->AdvancedSearch->save();

        // Field TaxInclusive
        $this->TaxInclusive->AdvancedSearch->SearchValue = @$filter["x_TaxInclusive"];
        $this->TaxInclusive->AdvancedSearch->SearchOperator = @$filter["z_TaxInclusive"];
        $this->TaxInclusive->AdvancedSearch->SearchCondition = @$filter["v_TaxInclusive"];
        $this->TaxInclusive->AdvancedSearch->SearchValue2 = @$filter["y_TaxInclusive"];
        $this->TaxInclusive->AdvancedSearch->SearchOperator2 = @$filter["w_TaxInclusive"];
        $this->TaxInclusive->AdvancedSearch->save();

        // Field EligibleforWarranty
        $this->EligibleforWarranty->AdvancedSearch->SearchValue = @$filter["x_EligibleforWarranty"];
        $this->EligibleforWarranty->AdvancedSearch->SearchOperator = @$filter["z_EligibleforWarranty"];
        $this->EligibleforWarranty->AdvancedSearch->SearchCondition = @$filter["v_EligibleforWarranty"];
        $this->EligibleforWarranty->AdvancedSearch->SearchValue2 = @$filter["y_EligibleforWarranty"];
        $this->EligibleforWarranty->AdvancedSearch->SearchOperator2 = @$filter["w_EligibleforWarranty"];
        $this->EligibleforWarranty->AdvancedSearch->save();

        // Field NoofMonthsWarranty
        $this->NoofMonthsWarranty->AdvancedSearch->SearchValue = @$filter["x_NoofMonthsWarranty"];
        $this->NoofMonthsWarranty->AdvancedSearch->SearchOperator = @$filter["z_NoofMonthsWarranty"];
        $this->NoofMonthsWarranty->AdvancedSearch->SearchCondition = @$filter["v_NoofMonthsWarranty"];
        $this->NoofMonthsWarranty->AdvancedSearch->SearchValue2 = @$filter["y_NoofMonthsWarranty"];
        $this->NoofMonthsWarranty->AdvancedSearch->SearchOperator2 = @$filter["w_NoofMonthsWarranty"];
        $this->NoofMonthsWarranty->AdvancedSearch->save();

        // Field ComputeTaxonCost
        $this->ComputeTaxonCost->AdvancedSearch->SearchValue = @$filter["x_ComputeTaxonCost"];
        $this->ComputeTaxonCost->AdvancedSearch->SearchOperator = @$filter["z_ComputeTaxonCost"];
        $this->ComputeTaxonCost->AdvancedSearch->SearchCondition = @$filter["v_ComputeTaxonCost"];
        $this->ComputeTaxonCost->AdvancedSearch->SearchValue2 = @$filter["y_ComputeTaxonCost"];
        $this->ComputeTaxonCost->AdvancedSearch->SearchOperator2 = @$filter["w_ComputeTaxonCost"];
        $this->ComputeTaxonCost->AdvancedSearch->save();

        // Field HasEmptyBottleTrack
        $this->HasEmptyBottleTrack->AdvancedSearch->SearchValue = @$filter["x_HasEmptyBottleTrack"];
        $this->HasEmptyBottleTrack->AdvancedSearch->SearchOperator = @$filter["z_HasEmptyBottleTrack"];
        $this->HasEmptyBottleTrack->AdvancedSearch->SearchCondition = @$filter["v_HasEmptyBottleTrack"];
        $this->HasEmptyBottleTrack->AdvancedSearch->SearchValue2 = @$filter["y_HasEmptyBottleTrack"];
        $this->HasEmptyBottleTrack->AdvancedSearch->SearchOperator2 = @$filter["w_HasEmptyBottleTrack"];
        $this->HasEmptyBottleTrack->AdvancedSearch->save();

        // Field EmptyBottleReferenceCode
        $this->EmptyBottleReferenceCode->AdvancedSearch->SearchValue = @$filter["x_EmptyBottleReferenceCode"];
        $this->EmptyBottleReferenceCode->AdvancedSearch->SearchOperator = @$filter["z_EmptyBottleReferenceCode"];
        $this->EmptyBottleReferenceCode->AdvancedSearch->SearchCondition = @$filter["v_EmptyBottleReferenceCode"];
        $this->EmptyBottleReferenceCode->AdvancedSearch->SearchValue2 = @$filter["y_EmptyBottleReferenceCode"];
        $this->EmptyBottleReferenceCode->AdvancedSearch->SearchOperator2 = @$filter["w_EmptyBottleReferenceCode"];
        $this->EmptyBottleReferenceCode->AdvancedSearch->save();

        // Field AdditionalCESSAmount
        $this->AdditionalCESSAmount->AdvancedSearch->SearchValue = @$filter["x_AdditionalCESSAmount"];
        $this->AdditionalCESSAmount->AdvancedSearch->SearchOperator = @$filter["z_AdditionalCESSAmount"];
        $this->AdditionalCESSAmount->AdvancedSearch->SearchCondition = @$filter["v_AdditionalCESSAmount"];
        $this->AdditionalCESSAmount->AdvancedSearch->SearchValue2 = @$filter["y_AdditionalCESSAmount"];
        $this->AdditionalCESSAmount->AdvancedSearch->SearchOperator2 = @$filter["w_AdditionalCESSAmount"];
        $this->AdditionalCESSAmount->AdvancedSearch->save();

        // Field EmptyBottleRate
        $this->EmptyBottleRate->AdvancedSearch->SearchValue = @$filter["x_EmptyBottleRate"];
        $this->EmptyBottleRate->AdvancedSearch->SearchOperator = @$filter["z_EmptyBottleRate"];
        $this->EmptyBottleRate->AdvancedSearch->SearchCondition = @$filter["v_EmptyBottleRate"];
        $this->EmptyBottleRate->AdvancedSearch->SearchValue2 = @$filter["y_EmptyBottleRate"];
        $this->EmptyBottleRate->AdvancedSearch->SearchOperator2 = @$filter["w_EmptyBottleRate"];
        $this->EmptyBottleRate->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->ProductName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DivisionCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ManufacturerCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SupplierCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AlternateSupplierCodes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AlternateProductCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OldCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProductFullName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UnitDescription, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BulkDescription, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BarCodeDescription, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PackageInformation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CstOtherTax, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BatchDescription, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SubLocation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CategoryCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SubCategory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ConvertionUnitDesc, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CommodityCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FileName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LPName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CreatedbyUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ModifiedbyUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LpPackageInformation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ShippingLot, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AIOCDProductCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Subclasscode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TouchscreenName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BarCodeDesign, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TenderNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TreatmentCodes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CoverageGroupCodes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DosageInfo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MrpList, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MarketedCode, $arKeywords, $type);
        return $where;
    }

    // Build basic search SQL
    protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
    {
        $defCond = ($type == "OR") ? "OR" : "AND";
        $arSql = []; // Array for SQL parts
        $arCond = []; // Array for search conditions
        $cnt = count($arKeywords);
        $j = 0; // Number of SQL parts
        for ($i = 0; $i < $cnt; $i++) {
            $keyword = $arKeywords[$i];
            $keyword = trim($keyword);
            if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
                $keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
                $ar = explode("\\", $keyword);
            } else {
                $ar = [$keyword];
            }
            foreach ($ar as $keyword) {
                if ($keyword != "") {
                    $wrk = "";
                    if ($keyword == "OR" && $type == "") {
                        if ($j > 0) {
                            $arCond[$j - 1] = "OR";
                        }
                    } elseif ($keyword == Config("NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NULL";
                    } elseif ($keyword == Config("NOT_NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NOT NULL";
                    } elseif ($fld->IsVirtual && $fld->Visible) {
                        $wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    } elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
                        $wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    }
                    if ($wrk != "") {
                        $arSql[$j] = $wrk;
                        $arCond[$j] = $defCond;
                        $j += 1;
                    }
                }
            }
        }
        $cnt = count($arSql);
        $quoted = false;
        $sql = "";
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt - 1; $i++) {
                if ($arCond[$i] == "OR") {
                    if (!$quoted) {
                        $sql .= "(";
                    }
                    $quoted = true;
                }
                $sql .= $arSql[$i];
                if ($quoted && $arCond[$i] != "OR") {
                    $sql .= ")";
                    $quoted = false;
                }
                $sql .= " " . $arCond[$i] . " ";
            }
            $sql .= $arSql[$cnt - 1];
            if ($quoted) {
                $sql .= ")";
            }
        }
        if ($sql != "") {
            if ($where != "") {
                $where .= " OR ";
            }
            $where .= "(" . $sql . ")";
        }
    }

    // Return basic search WHERE clause based on search keyword and type
    protected function basicSearchWhere($default = false)
    {
        global $Security;
        $searchStr = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
        $searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

        // Get search SQL
        if ($searchKeyword != "") {
            $ar = $this->BasicSearch->keywordList($default);
            // Search keyword in any fields
            if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
                foreach ($ar as $keyword) {
                    if ($keyword != "") {
                        if ($searchStr != "") {
                            $searchStr .= " " . $searchType . " ";
                        }
                        $searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
                    }
                }
            } else {
                $searchStr = $this->basicSearchSql($ar, $searchType);
            }
            if (!$default && in_array($this->Command, ["", "reset", "resetall"])) {
                $this->Command = "search";
            }
        }
        if (!$default && $this->Command == "search") {
            $this->BasicSearch->setKeyword($searchKeyword);
            $this->BasicSearch->setType($searchType);
        }
        return $searchStr;
    }

    // Check if search parm exists
    protected function checkSearchParms()
    {
        // Check basic search
        if ($this->BasicSearch->issetSession()) {
            return true;
        }
        return false;
    }

    // Clear all search parameters
    protected function resetSearchParms()
    {
        // Clear search WHERE clause
        $this->SearchWhere = "";
        $this->setSearchWhere($this->SearchWhere);

        // Clear basic search parameters
        $this->resetBasicSearchParms();
    }

    // Load advanced search default values
    protected function loadAdvancedSearchDefault()
    {
        return false;
    }

    // Clear all basic search parameters
    protected function resetBasicSearchParms()
    {
        $this->BasicSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->ProductCode); // ProductCode
            $this->updateSort($this->ProductName); // ProductName
            $this->updateSort($this->DivisionCode); // DivisionCode
            $this->updateSort($this->ManufacturerCode); // ManufacturerCode
            $this->updateSort($this->SupplierCode); // SupplierCode
            $this->updateSort($this->AlternateSupplierCodes); // AlternateSupplierCodes
            $this->updateSort($this->AlternateProductCode); // AlternateProductCode
            $this->updateSort($this->UniversalProductCode); // UniversalProductCode
            $this->updateSort($this->BookProductCode); // BookProductCode
            $this->updateSort($this->OldCode); // OldCode
            $this->updateSort($this->ProtectedProducts); // ProtectedProducts
            $this->updateSort($this->ProductFullName); // ProductFullName
            $this->updateSort($this->UnitOfMeasure); // UnitOfMeasure
            $this->updateSort($this->UnitDescription); // UnitDescription
            $this->updateSort($this->BulkDescription); // BulkDescription
            $this->updateSort($this->BarCodeDescription); // BarCodeDescription
            $this->updateSort($this->PackageInformation); // PackageInformation
            $this->updateSort($this->PackageId); // PackageId
            $this->updateSort($this->Weight); // Weight
            $this->updateSort($this->AllowFractions); // AllowFractions
            $this->updateSort($this->MinimumStockLevel); // MinimumStockLevel
            $this->updateSort($this->MaximumStockLevel); // MaximumStockLevel
            $this->updateSort($this->ReorderLevel); // ReorderLevel
            $this->updateSort($this->MinMaxRatio); // MinMaxRatio
            $this->updateSort($this->AutoMinMaxRatio); // AutoMinMaxRatio
            $this->updateSort($this->ScheduleCode); // ScheduleCode
            $this->updateSort($this->RopRatio); // RopRatio
            $this->updateSort($this->MRP); // MRP
            $this->updateSort($this->PurchasePrice); // PurchasePrice
            $this->updateSort($this->PurchaseUnit); // PurchaseUnit
            $this->updateSort($this->PurchaseTaxCode); // PurchaseTaxCode
            $this->updateSort($this->AllowDirectInward); // AllowDirectInward
            $this->updateSort($this->SalePrice); // SalePrice
            $this->updateSort($this->SaleUnit); // SaleUnit
            $this->updateSort($this->SalesTaxCode); // SalesTaxCode
            $this->updateSort($this->StockReceived); // StockReceived
            $this->updateSort($this->TotalStock); // TotalStock
            $this->updateSort($this->StockType); // StockType
            $this->updateSort($this->StockCheckDate); // StockCheckDate
            $this->updateSort($this->StockAdjustmentDate); // StockAdjustmentDate
            $this->updateSort($this->Remarks); // Remarks
            $this->updateSort($this->CostCentre); // CostCentre
            $this->updateSort($this->ProductType); // ProductType
            $this->updateSort($this->TaxAmount); // TaxAmount
            $this->updateSort($this->TaxId); // TaxId
            $this->updateSort($this->ResaleTaxApplicable); // ResaleTaxApplicable
            $this->updateSort($this->CstOtherTax); // CstOtherTax
            $this->updateSort($this->TotalTax); // TotalTax
            $this->updateSort($this->ItemCost); // ItemCost
            $this->updateSort($this->ExpiryDate); // ExpiryDate
            $this->updateSort($this->BatchDescription); // BatchDescription
            $this->updateSort($this->FreeScheme); // FreeScheme
            $this->updateSort($this->CashDiscountEligibility); // CashDiscountEligibility
            $this->updateSort($this->DiscountPerAllowInBill); // DiscountPerAllowInBill
            $this->updateSort($this->Discount); // Discount
            $this->updateSort($this->TotalAmount); // TotalAmount
            $this->updateSort($this->StandardMargin); // StandardMargin
            $this->updateSort($this->Margin); // Margin
            $this->updateSort($this->MarginId); // MarginId
            $this->updateSort($this->ExpectedMargin); // ExpectedMargin
            $this->updateSort($this->SurchargeBeforeTax); // SurchargeBeforeTax
            $this->updateSort($this->SurchargeAfterTax); // SurchargeAfterTax
            $this->updateSort($this->TempOrderNo); // TempOrderNo
            $this->updateSort($this->TempOrderDate); // TempOrderDate
            $this->updateSort($this->OrderUnit); // OrderUnit
            $this->updateSort($this->OrderQuantity); // OrderQuantity
            $this->updateSort($this->MarkForOrder); // MarkForOrder
            $this->updateSort($this->OrderAllId); // OrderAllId
            $this->updateSort($this->CalculateOrderQty); // CalculateOrderQty
            $this->updateSort($this->SubLocation); // SubLocation
            $this->updateSort($this->CategoryCode); // CategoryCode
            $this->updateSort($this->SubCategory); // SubCategory
            $this->updateSort($this->FlexCategoryCode); // FlexCategoryCode
            $this->updateSort($this->ABCSaleQty); // ABCSaleQty
            $this->updateSort($this->ABCSaleValue); // ABCSaleValue
            $this->updateSort($this->ConvertionFactor); // ConvertionFactor
            $this->updateSort($this->ConvertionUnitDesc); // ConvertionUnitDesc
            $this->updateSort($this->TransactionId); // TransactionId
            $this->updateSort($this->SoldProductId); // SoldProductId
            $this->updateSort($this->WantedBookId); // WantedBookId
            $this->updateSort($this->AllId); // AllId
            $this->updateSort($this->BatchAndExpiryCompulsory); // BatchAndExpiryCompulsory
            $this->updateSort($this->BatchStockForWantedBook); // BatchStockForWantedBook
            $this->updateSort($this->UnitBasedBilling); // UnitBasedBilling
            $this->updateSort($this->DoNotCheckStock); // DoNotCheckStock
            $this->updateSort($this->AcceptRate); // AcceptRate
            $this->updateSort($this->PriceLevel); // PriceLevel
            $this->updateSort($this->LastQuotePrice); // LastQuotePrice
            $this->updateSort($this->PriceChange); // PriceChange
            $this->updateSort($this->CommodityCode); // CommodityCode
            $this->updateSort($this->InstitutePrice); // InstitutePrice
            $this->updateSort($this->CtrlOrDCtrlProduct); // CtrlOrDCtrlProduct
            $this->updateSort($this->ImportedDate); // ImportedDate
            $this->updateSort($this->IsImported); // IsImported
            $this->updateSort($this->FileName); // FileName
            $this->updateSort($this->GodownNumber); // GodownNumber
            $this->updateSort($this->CreationDate); // CreationDate
            $this->updateSort($this->CreatedbyUser); // CreatedbyUser
            $this->updateSort($this->ModifiedDate); // ModifiedDate
            $this->updateSort($this->ModifiedbyUser); // ModifiedbyUser
            $this->updateSort($this->isActive); // isActive
            $this->updateSort($this->AllowExpiryClaim); // AllowExpiryClaim
            $this->updateSort($this->BrandCode); // BrandCode
            $this->updateSort($this->FreeSchemeBasedon); // FreeSchemeBasedon
            $this->updateSort($this->DoNotCheckCostInBill); // DoNotCheckCostInBill
            $this->updateSort($this->ProductGroupCode); // ProductGroupCode
            $this->updateSort($this->ProductStrengthCode); // ProductStrengthCode
            $this->updateSort($this->PackingCode); // PackingCode
            $this->updateSort($this->ComputedMinStock); // ComputedMinStock
            $this->updateSort($this->ComputedMaxStock); // ComputedMaxStock
            $this->updateSort($this->ProductRemark); // ProductRemark
            $this->updateSort($this->ProductDrugCode); // ProductDrugCode
            $this->updateSort($this->IsMatrixProduct); // IsMatrixProduct
            $this->updateSort($this->AttributeCount1); // AttributeCount1
            $this->updateSort($this->AttributeCount2); // AttributeCount2
            $this->updateSort($this->AttributeCount3); // AttributeCount3
            $this->updateSort($this->AttributeCount4); // AttributeCount4
            $this->updateSort($this->AttributeCount5); // AttributeCount5
            $this->updateSort($this->DefaultDiscountPercentage); // DefaultDiscountPercentage
            $this->updateSort($this->DonotPrintBarcode); // DonotPrintBarcode
            $this->updateSort($this->ProductLevelDiscount); // ProductLevelDiscount
            $this->updateSort($this->Markup); // Markup
            $this->updateSort($this->MarkDown); // MarkDown
            $this->updateSort($this->ReworkSalePrice); // ReworkSalePrice
            $this->updateSort($this->MultipleInput); // MultipleInput
            $this->updateSort($this->LpPackageInformation); // LpPackageInformation
            $this->updateSort($this->AllowNegativeStock); // AllowNegativeStock
            $this->updateSort($this->OrderDate); // OrderDate
            $this->updateSort($this->OrderTime); // OrderTime
            $this->updateSort($this->RateGroupCode); // RateGroupCode
            $this->updateSort($this->ConversionCaseLot); // ConversionCaseLot
            $this->updateSort($this->ShippingLot); // ShippingLot
            $this->updateSort($this->AllowExpiryReplacement); // AllowExpiryReplacement
            $this->updateSort($this->NoOfMonthExpiryAllowed); // NoOfMonthExpiryAllowed
            $this->updateSort($this->ProductDiscountEligibility); // ProductDiscountEligibility
            $this->updateSort($this->ScheduleTypeCode); // ScheduleTypeCode
            $this->updateSort($this->AIOCDProductCode); // AIOCDProductCode
            $this->updateSort($this->FreeQuantity); // FreeQuantity
            $this->updateSort($this->DiscountType); // DiscountType
            $this->updateSort($this->DiscountValue); // DiscountValue
            $this->updateSort($this->HasProductOrderAttribute); // HasProductOrderAttribute
            $this->updateSort($this->FirstPODate); // FirstPODate
            $this->updateSort($this->SaleprcieAndMrpCalcPercent); // SaleprcieAndMrpCalcPercent
            $this->updateSort($this->IsGiftVoucherProducts); // IsGiftVoucherProducts
            $this->updateSort($this->AcceptRange4SerialNumber); // AcceptRange4SerialNumber
            $this->updateSort($this->GiftVoucherDenomination); // GiftVoucherDenomination
            $this->updateSort($this->Subclasscode); // Subclasscode
            $this->updateSort($this->BarCodeFromWeighingMachine); // BarCodeFromWeighingMachine
            $this->updateSort($this->CheckCostInReturn); // CheckCostInReturn
            $this->updateSort($this->FrequentSaleProduct); // FrequentSaleProduct
            $this->updateSort($this->RateType); // RateType
            $this->updateSort($this->TouchscreenName); // TouchscreenName
            $this->updateSort($this->FreeType); // FreeType
            $this->updateSort($this->LooseQtyasNewBatch); // LooseQtyasNewBatch
            $this->updateSort($this->AllowSlabBilling); // AllowSlabBilling
            $this->updateSort($this->ProductTypeForProduction); // ProductTypeForProduction
            $this->updateSort($this->RecipeCode); // RecipeCode
            $this->updateSort($this->DefaultUnitType); // DefaultUnitType
            $this->updateSort($this->PIstatus); // PIstatus
            $this->updateSort($this->LastPiConfirmedDate); // LastPiConfirmedDate
            $this->updateSort($this->BarCodeDesign); // BarCodeDesign
            $this->updateSort($this->AcceptRemarksInBill); // AcceptRemarksInBill
            $this->updateSort($this->Classification); // Classification
            $this->updateSort($this->TimeSlot); // TimeSlot
            $this->updateSort($this->IsBundle); // IsBundle
            $this->updateSort($this->ColorCode); // ColorCode
            $this->updateSort($this->GenderCode); // GenderCode
            $this->updateSort($this->SizeCode); // SizeCode
            $this->updateSort($this->GiftCard); // GiftCard
            $this->updateSort($this->ToonLabel); // ToonLabel
            $this->updateSort($this->GarmentType); // GarmentType
            $this->updateSort($this->AgeGroup); // AgeGroup
            $this->updateSort($this->Season); // Season
            $this->updateSort($this->DailyStockEntry); // DailyStockEntry
            $this->updateSort($this->ModifierApplicable); // ModifierApplicable
            $this->updateSort($this->ModifierType); // ModifierType
            $this->updateSort($this->AcceptZeroRate); // AcceptZeroRate
            $this->updateSort($this->ExciseDutyCode); // ExciseDutyCode
            $this->updateSort($this->IndentProductGroupCode); // IndentProductGroupCode
            $this->updateSort($this->IsMultiBatch); // IsMultiBatch
            $this->updateSort($this->IsSingleBatch); // IsSingleBatch
            $this->updateSort($this->MarkUpRate1); // MarkUpRate1
            $this->updateSort($this->MarkDownRate1); // MarkDownRate1
            $this->updateSort($this->MarkUpRate2); // MarkUpRate2
            $this->updateSort($this->MarkDownRate2); // MarkDownRate2
            $this->updateSort($this->_Yield); // Yield
            $this->updateSort($this->RefProductCode); // RefProductCode
            $this->updateSort($this->Volume); // Volume
            $this->updateSort($this->MeasurementID); // MeasurementID
            $this->updateSort($this->CountryCode); // CountryCode
            $this->updateSort($this->AcceptWMQty); // AcceptWMQty
            $this->updateSort($this->SingleBatchBasedOnRate); // SingleBatchBasedOnRate
            $this->updateSort($this->TenderNo); // TenderNo
            $this->updateSort($this->SingleBillMaximumSoldQtyFiled); // SingleBillMaximumSoldQtyFiled
            $this->updateSort($this->Strength1); // Strength1
            $this->updateSort($this->Strength2); // Strength2
            $this->updateSort($this->Strength3); // Strength3
            $this->updateSort($this->Strength4); // Strength4
            $this->updateSort($this->Strength5); // Strength5
            $this->updateSort($this->IngredientCode1); // IngredientCode1
            $this->updateSort($this->IngredientCode2); // IngredientCode2
            $this->updateSort($this->IngredientCode3); // IngredientCode3
            $this->updateSort($this->IngredientCode4); // IngredientCode4
            $this->updateSort($this->IngredientCode5); // IngredientCode5
            $this->updateSort($this->OrderType); // OrderType
            $this->updateSort($this->StockUOM); // StockUOM
            $this->updateSort($this->PriceUOM); // PriceUOM
            $this->updateSort($this->DefaultSaleUOM); // DefaultSaleUOM
            $this->updateSort($this->DefaultPurchaseUOM); // DefaultPurchaseUOM
            $this->updateSort($this->ReportingUOM); // ReportingUOM
            $this->updateSort($this->LastPurchasedUOM); // LastPurchasedUOM
            $this->updateSort($this->TreatmentCodes); // TreatmentCodes
            $this->updateSort($this->InsuranceType); // InsuranceType
            $this->updateSort($this->CoverageGroupCodes); // CoverageGroupCodes
            $this->updateSort($this->MultipleUOM); // MultipleUOM
            $this->updateSort($this->SalePriceComputation); // SalePriceComputation
            $this->updateSort($this->StockCorrection); // StockCorrection
            $this->updateSort($this->LBTPercentage); // LBTPercentage
            $this->updateSort($this->SalesCommission); // SalesCommission
            $this->updateSort($this->LockedStock); // LockedStock
            $this->updateSort($this->MinMaxUOM); // MinMaxUOM
            $this->updateSort($this->ExpiryMfrDateFormat); // ExpiryMfrDateFormat
            $this->updateSort($this->ProductLifeTime); // ProductLifeTime
            $this->updateSort($this->IsCombo); // IsCombo
            $this->updateSort($this->ComboTypeCode); // ComboTypeCode
            $this->updateSort($this->AttributeCount6); // AttributeCount6
            $this->updateSort($this->AttributeCount7); // AttributeCount7
            $this->updateSort($this->AttributeCount8); // AttributeCount8
            $this->updateSort($this->AttributeCount9); // AttributeCount9
            $this->updateSort($this->AttributeCount10); // AttributeCount10
            $this->updateSort($this->LabourCharge); // LabourCharge
            $this->updateSort($this->AffectOtherCharge); // AffectOtherCharge
            $this->updateSort($this->DosageInfo); // DosageInfo
            $this->updateSort($this->DosageType); // DosageType
            $this->updateSort($this->DefaultIndentUOM); // DefaultIndentUOM
            $this->updateSort($this->PromoTag); // PromoTag
            $this->updateSort($this->BillLevelPromoTag); // BillLevelPromoTag
            $this->updateSort($this->IsMRPProduct); // IsMRPProduct
            $this->updateSort($this->AlternateSaleUOM); // AlternateSaleUOM
            $this->updateSort($this->FreeUOM); // FreeUOM
            $this->updateSort($this->MarketedCode); // MarketedCode
            $this->updateSort($this->MinimumSalePrice); // MinimumSalePrice
            $this->updateSort($this->PRate1); // PRate1
            $this->updateSort($this->PRate2); // PRate2
            $this->updateSort($this->LPItemCost); // LPItemCost
            $this->updateSort($this->FixedItemCost); // FixedItemCost
            $this->updateSort($this->HSNId); // HSNId
            $this->updateSort($this->TaxInclusive); // TaxInclusive
            $this->updateSort($this->EligibleforWarranty); // EligibleforWarranty
            $this->updateSort($this->NoofMonthsWarranty); // NoofMonthsWarranty
            $this->updateSort($this->ComputeTaxonCost); // ComputeTaxonCost
            $this->updateSort($this->HasEmptyBottleTrack); // HasEmptyBottleTrack
            $this->updateSort($this->EmptyBottleReferenceCode); // EmptyBottleReferenceCode
            $this->updateSort($this->AdditionalCESSAmount); // AdditionalCESSAmount
            $this->updateSort($this->EmptyBottleRate); // EmptyBottleRate
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($useDefaultSort) {
                    $orderBy = $this->getSqlOrderBy();
                    $this->setSessionOrderBy($orderBy);
                } else {
                    $this->setSessionOrderBy("");
                }
            }
        }
    }

    // Reset command
    // - cmd=reset (Reset search parameters)
    // - cmd=resetall (Reset search and master/detail parameters)
    // - cmd=resetsort (Reset sort parameters)
    protected function resetCmd()
    {
        // Check if reset command
        if (StartsString("reset", $this->Command)) {
            // Reset search criteria
            if ($this->Command == "reset" || $this->Command == "resetall") {
                $this->resetSearchParms();
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->ProductCode->setSort("");
                $this->ProductName->setSort("");
                $this->DivisionCode->setSort("");
                $this->ManufacturerCode->setSort("");
                $this->SupplierCode->setSort("");
                $this->AlternateSupplierCodes->setSort("");
                $this->AlternateProductCode->setSort("");
                $this->UniversalProductCode->setSort("");
                $this->BookProductCode->setSort("");
                $this->OldCode->setSort("");
                $this->ProtectedProducts->setSort("");
                $this->ProductFullName->setSort("");
                $this->UnitOfMeasure->setSort("");
                $this->UnitDescription->setSort("");
                $this->BulkDescription->setSort("");
                $this->BarCodeDescription->setSort("");
                $this->PackageInformation->setSort("");
                $this->PackageId->setSort("");
                $this->Weight->setSort("");
                $this->AllowFractions->setSort("");
                $this->MinimumStockLevel->setSort("");
                $this->MaximumStockLevel->setSort("");
                $this->ReorderLevel->setSort("");
                $this->MinMaxRatio->setSort("");
                $this->AutoMinMaxRatio->setSort("");
                $this->ScheduleCode->setSort("");
                $this->RopRatio->setSort("");
                $this->MRP->setSort("");
                $this->PurchasePrice->setSort("");
                $this->PurchaseUnit->setSort("");
                $this->PurchaseTaxCode->setSort("");
                $this->AllowDirectInward->setSort("");
                $this->SalePrice->setSort("");
                $this->SaleUnit->setSort("");
                $this->SalesTaxCode->setSort("");
                $this->StockReceived->setSort("");
                $this->TotalStock->setSort("");
                $this->StockType->setSort("");
                $this->StockCheckDate->setSort("");
                $this->StockAdjustmentDate->setSort("");
                $this->Remarks->setSort("");
                $this->CostCentre->setSort("");
                $this->ProductType->setSort("");
                $this->TaxAmount->setSort("");
                $this->TaxId->setSort("");
                $this->ResaleTaxApplicable->setSort("");
                $this->CstOtherTax->setSort("");
                $this->TotalTax->setSort("");
                $this->ItemCost->setSort("");
                $this->ExpiryDate->setSort("");
                $this->BatchDescription->setSort("");
                $this->FreeScheme->setSort("");
                $this->CashDiscountEligibility->setSort("");
                $this->DiscountPerAllowInBill->setSort("");
                $this->Discount->setSort("");
                $this->TotalAmount->setSort("");
                $this->StandardMargin->setSort("");
                $this->Margin->setSort("");
                $this->MarginId->setSort("");
                $this->ExpectedMargin->setSort("");
                $this->SurchargeBeforeTax->setSort("");
                $this->SurchargeAfterTax->setSort("");
                $this->TempOrderNo->setSort("");
                $this->TempOrderDate->setSort("");
                $this->OrderUnit->setSort("");
                $this->OrderQuantity->setSort("");
                $this->MarkForOrder->setSort("");
                $this->OrderAllId->setSort("");
                $this->CalculateOrderQty->setSort("");
                $this->SubLocation->setSort("");
                $this->CategoryCode->setSort("");
                $this->SubCategory->setSort("");
                $this->FlexCategoryCode->setSort("");
                $this->ABCSaleQty->setSort("");
                $this->ABCSaleValue->setSort("");
                $this->ConvertionFactor->setSort("");
                $this->ConvertionUnitDesc->setSort("");
                $this->TransactionId->setSort("");
                $this->SoldProductId->setSort("");
                $this->WantedBookId->setSort("");
                $this->AllId->setSort("");
                $this->BatchAndExpiryCompulsory->setSort("");
                $this->BatchStockForWantedBook->setSort("");
                $this->UnitBasedBilling->setSort("");
                $this->DoNotCheckStock->setSort("");
                $this->AcceptRate->setSort("");
                $this->PriceLevel->setSort("");
                $this->LastQuotePrice->setSort("");
                $this->PriceChange->setSort("");
                $this->CommodityCode->setSort("");
                $this->InstitutePrice->setSort("");
                $this->CtrlOrDCtrlProduct->setSort("");
                $this->ImportedDate->setSort("");
                $this->IsImported->setSort("");
                $this->FileName->setSort("");
                $this->LPName->setSort("");
                $this->GodownNumber->setSort("");
                $this->CreationDate->setSort("");
                $this->CreatedbyUser->setSort("");
                $this->ModifiedDate->setSort("");
                $this->ModifiedbyUser->setSort("");
                $this->isActive->setSort("");
                $this->AllowExpiryClaim->setSort("");
                $this->BrandCode->setSort("");
                $this->FreeSchemeBasedon->setSort("");
                $this->DoNotCheckCostInBill->setSort("");
                $this->ProductGroupCode->setSort("");
                $this->ProductStrengthCode->setSort("");
                $this->PackingCode->setSort("");
                $this->ComputedMinStock->setSort("");
                $this->ComputedMaxStock->setSort("");
                $this->ProductRemark->setSort("");
                $this->ProductDrugCode->setSort("");
                $this->IsMatrixProduct->setSort("");
                $this->AttributeCount1->setSort("");
                $this->AttributeCount2->setSort("");
                $this->AttributeCount3->setSort("");
                $this->AttributeCount4->setSort("");
                $this->AttributeCount5->setSort("");
                $this->DefaultDiscountPercentage->setSort("");
                $this->DonotPrintBarcode->setSort("");
                $this->ProductLevelDiscount->setSort("");
                $this->Markup->setSort("");
                $this->MarkDown->setSort("");
                $this->ReworkSalePrice->setSort("");
                $this->MultipleInput->setSort("");
                $this->LpPackageInformation->setSort("");
                $this->AllowNegativeStock->setSort("");
                $this->OrderDate->setSort("");
                $this->OrderTime->setSort("");
                $this->RateGroupCode->setSort("");
                $this->ConversionCaseLot->setSort("");
                $this->ShippingLot->setSort("");
                $this->AllowExpiryReplacement->setSort("");
                $this->NoOfMonthExpiryAllowed->setSort("");
                $this->ProductDiscountEligibility->setSort("");
                $this->ScheduleTypeCode->setSort("");
                $this->AIOCDProductCode->setSort("");
                $this->FreeQuantity->setSort("");
                $this->DiscountType->setSort("");
                $this->DiscountValue->setSort("");
                $this->HasProductOrderAttribute->setSort("");
                $this->FirstPODate->setSort("");
                $this->SaleprcieAndMrpCalcPercent->setSort("");
                $this->IsGiftVoucherProducts->setSort("");
                $this->AcceptRange4SerialNumber->setSort("");
                $this->GiftVoucherDenomination->setSort("");
                $this->Subclasscode->setSort("");
                $this->BarCodeFromWeighingMachine->setSort("");
                $this->CheckCostInReturn->setSort("");
                $this->FrequentSaleProduct->setSort("");
                $this->RateType->setSort("");
                $this->TouchscreenName->setSort("");
                $this->FreeType->setSort("");
                $this->LooseQtyasNewBatch->setSort("");
                $this->AllowSlabBilling->setSort("");
                $this->ProductTypeForProduction->setSort("");
                $this->RecipeCode->setSort("");
                $this->DefaultUnitType->setSort("");
                $this->PIstatus->setSort("");
                $this->LastPiConfirmedDate->setSort("");
                $this->BarCodeDesign->setSort("");
                $this->AcceptRemarksInBill->setSort("");
                $this->Classification->setSort("");
                $this->TimeSlot->setSort("");
                $this->IsBundle->setSort("");
                $this->ColorCode->setSort("");
                $this->GenderCode->setSort("");
                $this->SizeCode->setSort("");
                $this->GiftCard->setSort("");
                $this->ToonLabel->setSort("");
                $this->GarmentType->setSort("");
                $this->AgeGroup->setSort("");
                $this->Season->setSort("");
                $this->DailyStockEntry->setSort("");
                $this->ModifierApplicable->setSort("");
                $this->ModifierType->setSort("");
                $this->AcceptZeroRate->setSort("");
                $this->ExciseDutyCode->setSort("");
                $this->IndentProductGroupCode->setSort("");
                $this->IsMultiBatch->setSort("");
                $this->IsSingleBatch->setSort("");
                $this->MarkUpRate1->setSort("");
                $this->MarkDownRate1->setSort("");
                $this->MarkUpRate2->setSort("");
                $this->MarkDownRate2->setSort("");
                $this->_Yield->setSort("");
                $this->RefProductCode->setSort("");
                $this->Volume->setSort("");
                $this->MeasurementID->setSort("");
                $this->CountryCode->setSort("");
                $this->AcceptWMQty->setSort("");
                $this->SingleBatchBasedOnRate->setSort("");
                $this->TenderNo->setSort("");
                $this->SingleBillMaximumSoldQtyFiled->setSort("");
                $this->Strength1->setSort("");
                $this->Strength2->setSort("");
                $this->Strength3->setSort("");
                $this->Strength4->setSort("");
                $this->Strength5->setSort("");
                $this->IngredientCode1->setSort("");
                $this->IngredientCode2->setSort("");
                $this->IngredientCode3->setSort("");
                $this->IngredientCode4->setSort("");
                $this->IngredientCode5->setSort("");
                $this->OrderType->setSort("");
                $this->StockUOM->setSort("");
                $this->PriceUOM->setSort("");
                $this->DefaultSaleUOM->setSort("");
                $this->DefaultPurchaseUOM->setSort("");
                $this->ReportingUOM->setSort("");
                $this->LastPurchasedUOM->setSort("");
                $this->TreatmentCodes->setSort("");
                $this->InsuranceType->setSort("");
                $this->CoverageGroupCodes->setSort("");
                $this->MultipleUOM->setSort("");
                $this->SalePriceComputation->setSort("");
                $this->StockCorrection->setSort("");
                $this->LBTPercentage->setSort("");
                $this->SalesCommission->setSort("");
                $this->LockedStock->setSort("");
                $this->MinMaxUOM->setSort("");
                $this->ExpiryMfrDateFormat->setSort("");
                $this->ProductLifeTime->setSort("");
                $this->IsCombo->setSort("");
                $this->ComboTypeCode->setSort("");
                $this->AttributeCount6->setSort("");
                $this->AttributeCount7->setSort("");
                $this->AttributeCount8->setSort("");
                $this->AttributeCount9->setSort("");
                $this->AttributeCount10->setSort("");
                $this->LabourCharge->setSort("");
                $this->AffectOtherCharge->setSort("");
                $this->DosageInfo->setSort("");
                $this->DosageType->setSort("");
                $this->DefaultIndentUOM->setSort("");
                $this->PromoTag->setSort("");
                $this->BillLevelPromoTag->setSort("");
                $this->IsMRPProduct->setSort("");
                $this->MrpList->setSort("");
                $this->AlternateSaleUOM->setSort("");
                $this->FreeUOM->setSort("");
                $this->MarketedCode->setSort("");
                $this->MinimumSalePrice->setSort("");
                $this->PRate1->setSort("");
                $this->PRate2->setSort("");
                $this->LPItemCost->setSort("");
                $this->FixedItemCost->setSort("");
                $this->HSNId->setSort("");
                $this->TaxInclusive->setSort("");
                $this->EligibleforWarranty->setSort("");
                $this->NoofMonthsWarranty->setSort("");
                $this->ComputeTaxonCost->setSort("");
                $this->HasEmptyBottleTrack->setSort("");
                $this->EmptyBottleReferenceCode->setSort("");
                $this->AdditionalCESSAmount->setSort("");
                $this->EmptyBottleRate->setSort("");
            }

            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
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

        // List actions
        $item = &$this->ListOptions->add("listactions");
        $item->CssClass = "text-nowrap";
        $item->OnLeft = true;
        $item->Visible = false;
        $item->ShowInButtonGroup = false;
        $item->ShowInDropDown = false;

        // "checkbox"
        $item = &$this->ListOptions->add("checkbox");
        $item->Visible = false;
        $item->OnLeft = true;
        $item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
        $item->moveTo(0);
        $item->ShowInDropDown = false;
        $item->ShowInButtonGroup = false;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = true;
        if ($this->ListOptions->UseButtonGroup && IsMobile()) {
            $this->ListOptions->UseDropDownButton = true;
        }

        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
        $this->setupListOptionsExt();
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
        $pageUrl = $this->pageUrl();
        if ($this->CurrentMode == "view") {
            // "view"
            $opt = $this->ListOptions["view"];
            $viewcaption = HtmlTitle($Language->phrase("ViewLink"));
            if ($Security->canView()) {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode(GetUrl($this->ViewUrl)) . "\">" . $Language->phrase("ViewLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "edit"
            $opt = $this->ListOptions["edit"];
            $editcaption = HtmlTitle($Language->phrase("EditLink"));
            if ($Security->canEdit()) {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("EditLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if ($Security->canAdd()) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "delete"
            $opt = $this->ListOptions["delete"];
            if ($Security->canDelete()) {
            $opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("DeleteLink") . "</a>";
            } else {
                $opt->Body = "";
            }
        } // End View mode

        // Set up list action buttons
        $opt = $this->ListOptions["listactions"];
        if ($opt && !$this->isExport() && !$this->CurrentAction) {
            $body = "";
            $links = [];
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
                    $action = $listaction->Action;
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
                    $links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a></li>";
                    if (count($links) == 1) { // Single button
                        $body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a>";
                    }
                }
            }
            if (count($links) > 1) { // More than one buttons, use dropdown
                $body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
                $content = "";
                foreach ($links as $link) {
                    $content .= "<li>" . $link . "</li>";
                }
                $body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">" . $content . "</ul>";
                $body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
            }
            if (count($links) > 0) {
                $opt->Body = $body;
                $opt->Visible = true;
            }
        }

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->ProductCode->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["addedit"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("AddLink"));
        $item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("AddLink") . "</a>";
        $item->Visible = $this->AddUrl != "" && $Security->canAdd();
        $option = $options["action"];

        // Set up options default
        foreach ($options as $option) {
            $option->UseDropDownButton = true;
            $option->UseButtonGroup = true;
            //$option->ButtonClass = ""; // Class for button group
            $item = &$option->add($option->GroupOptionName);
            $item->Body = "";
            $item->Visible = false;
        }
        $options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
        $options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
        $options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

        // Filter button
        $item = &$this->FilterOptions->add("savecurrentfilter");
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_productslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_productslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
        $item->Visible = true;
        $this->FilterOptions->UseDropDownButton = true;
        $this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
        $this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

        // Add group option item
        $item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Render other options
    public function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];
        // Set up list action buttons
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE) {
                $item = &$option->add("custom_" . $listaction->Action);
                $caption = $listaction->Caption;
                $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpharmacy_productslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
                $item->Visible = $listaction->Allow;
            }
        }

        // Hide grid edit and other options
        if ($this->TotalRecords <= 0) {
            $option = $options["addedit"];
            $item = $option["gridedit"];
            if ($item) {
                $item->Visible = false;
            }
            $option = $options["action"];
            $option->hideAllOptions();
        }
    }

    // Process list action
    protected function processListAction()
    {
        global $Language, $Security;
        $userlist = "";
        $user = "";
        $filter = $this->getFilterFromRecordKeys();
        $userAction = Post("useraction", "");
        if ($filter != "" && $userAction != "") {
            // Check permission first
            $actionCaption = $userAction;
            if (array_key_exists($userAction, $this->ListActions->Items)) {
                $actionCaption = $this->ListActions[$userAction]->Caption;
                if (!$this->ListActions[$userAction]->Allow) {
                    $errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
                    if (Post("ajax") == $userAction) { // Ajax
                        echo "<p class=\"text-danger\">" . $errmsg . "</p>";
                        return true;
                    } else {
                        $this->setFailureMessage($errmsg);
                        return false;
                    }
                }
            }
            $this->CurrentFilter = $filter;
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $rs = LoadRecordset($sql, $conn, \PDO::FETCH_ASSOC);
            $this->CurrentAction = $userAction;

            // Call row action event
            if ($rs) {
                $conn->beginTransaction();
                $this->SelectedCount = $rs->recordCount();
                $this->SelectedIndex = 0;
                while (!$rs->EOF) {
                    $this->SelectedIndex++;
                    $row = $rs->fields;
                    $processed = $this->rowCustomAction($userAction, $row);
                    if (!$processed) {
                        break;
                    }
                    $rs->moveNext();
                }
                if ($processed) {
                    $conn->commit(); // Commit the changes
                    if ($this->getSuccessMessage() == "" && !ob_get_length()) { // No output
                        $this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
                    }
                } else {
                    $conn->rollback(); // Rollback changes

                    // Set up error message
                    if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                        // Use the message, do nothing
                    } elseif ($this->CancelMessage != "") {
                        $this->setFailureMessage($this->CancelMessage);
                        $this->CancelMessage = "";
                    } else {
                        $this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
                    }
                }
            }
            if ($rs) {
                $rs->close();
            }
            $this->CurrentAction = ""; // Clear action
            if (Post("ajax") == $userAction) { // Ajax
                if ($this->getSuccessMessage() != "") {
                    echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
                    $this->clearSuccessMessage(); // Clear message
                }
                if ($this->getFailureMessage() != "") {
                    echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
                    $this->clearFailureMessage(); // Clear message
                }
                return true;
            }
        }
        return false; // Not ajax request
    }

    // Set up list options (extended codes)
    protected function setupListOptionsExt()
    {
        // Hide detail items for dropdown if necessary
        $this->ListOptions->hideDetailItemsForDropDown();
    }

    // Render list options (extended codes)
    protected function renderListOptionsExt()
    {
        global $Security, $Language;
    }

    // Load basic search values
    protected function loadBasicSearchValues()
    {
        $this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), false);
        if ($this->BasicSearch->Keyword != "" && $this->Command == "") {
            $this->Command = "search";
        }
        $this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), false);
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
        $this->ProductCode->setDbValue($row['ProductCode']);
        $this->ProductName->setDbValue($row['ProductName']);
        $this->DivisionCode->setDbValue($row['DivisionCode']);
        $this->ManufacturerCode->setDbValue($row['ManufacturerCode']);
        $this->SupplierCode->setDbValue($row['SupplierCode']);
        $this->AlternateSupplierCodes->setDbValue($row['AlternateSupplierCodes']);
        $this->AlternateProductCode->setDbValue($row['AlternateProductCode']);
        $this->UniversalProductCode->setDbValue($row['UniversalProductCode']);
        $this->BookProductCode->setDbValue($row['BookProductCode']);
        $this->OldCode->setDbValue($row['OldCode']);
        $this->ProtectedProducts->setDbValue($row['ProtectedProducts']);
        $this->ProductFullName->setDbValue($row['ProductFullName']);
        $this->UnitOfMeasure->setDbValue($row['UnitOfMeasure']);
        $this->UnitDescription->setDbValue($row['UnitDescription']);
        $this->BulkDescription->setDbValue($row['BulkDescription']);
        $this->BarCodeDescription->setDbValue($row['BarCodeDescription']);
        $this->PackageInformation->setDbValue($row['PackageInformation']);
        $this->PackageId->setDbValue($row['PackageId']);
        $this->Weight->setDbValue($row['Weight']);
        $this->AllowFractions->setDbValue($row['AllowFractions']);
        $this->MinimumStockLevel->setDbValue($row['MinimumStockLevel']);
        $this->MaximumStockLevel->setDbValue($row['MaximumStockLevel']);
        $this->ReorderLevel->setDbValue($row['ReorderLevel']);
        $this->MinMaxRatio->setDbValue($row['MinMaxRatio']);
        $this->AutoMinMaxRatio->setDbValue($row['AutoMinMaxRatio']);
        $this->ScheduleCode->setDbValue($row['ScheduleCode']);
        $this->RopRatio->setDbValue($row['RopRatio']);
        $this->MRP->setDbValue($row['MRP']);
        $this->PurchasePrice->setDbValue($row['PurchasePrice']);
        $this->PurchaseUnit->setDbValue($row['PurchaseUnit']);
        $this->PurchaseTaxCode->setDbValue($row['PurchaseTaxCode']);
        $this->AllowDirectInward->setDbValue($row['AllowDirectInward']);
        $this->SalePrice->setDbValue($row['SalePrice']);
        $this->SaleUnit->setDbValue($row['SaleUnit']);
        $this->SalesTaxCode->setDbValue($row['SalesTaxCode']);
        $this->StockReceived->setDbValue($row['StockReceived']);
        $this->TotalStock->setDbValue($row['TotalStock']);
        $this->StockType->setDbValue($row['StockType']);
        $this->StockCheckDate->setDbValue($row['StockCheckDate']);
        $this->StockAdjustmentDate->setDbValue($row['StockAdjustmentDate']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->CostCentre->setDbValue($row['CostCentre']);
        $this->ProductType->setDbValue($row['ProductType']);
        $this->TaxAmount->setDbValue($row['TaxAmount']);
        $this->TaxId->setDbValue($row['TaxId']);
        $this->ResaleTaxApplicable->setDbValue($row['ResaleTaxApplicable']);
        $this->CstOtherTax->setDbValue($row['CstOtherTax']);
        $this->TotalTax->setDbValue($row['TotalTax']);
        $this->ItemCost->setDbValue($row['ItemCost']);
        $this->ExpiryDate->setDbValue($row['ExpiryDate']);
        $this->BatchDescription->setDbValue($row['BatchDescription']);
        $this->FreeScheme->setDbValue($row['FreeScheme']);
        $this->CashDiscountEligibility->setDbValue($row['CashDiscountEligibility']);
        $this->DiscountPerAllowInBill->setDbValue($row['DiscountPerAllowInBill']);
        $this->Discount->setDbValue($row['Discount']);
        $this->TotalAmount->setDbValue($row['TotalAmount']);
        $this->StandardMargin->setDbValue($row['StandardMargin']);
        $this->Margin->setDbValue($row['Margin']);
        $this->MarginId->setDbValue($row['MarginId']);
        $this->ExpectedMargin->setDbValue($row['ExpectedMargin']);
        $this->SurchargeBeforeTax->setDbValue($row['SurchargeBeforeTax']);
        $this->SurchargeAfterTax->setDbValue($row['SurchargeAfterTax']);
        $this->TempOrderNo->setDbValue($row['TempOrderNo']);
        $this->TempOrderDate->setDbValue($row['TempOrderDate']);
        $this->OrderUnit->setDbValue($row['OrderUnit']);
        $this->OrderQuantity->setDbValue($row['OrderQuantity']);
        $this->MarkForOrder->setDbValue($row['MarkForOrder']);
        $this->OrderAllId->setDbValue($row['OrderAllId']);
        $this->CalculateOrderQty->setDbValue($row['CalculateOrderQty']);
        $this->SubLocation->setDbValue($row['SubLocation']);
        $this->CategoryCode->setDbValue($row['CategoryCode']);
        $this->SubCategory->setDbValue($row['SubCategory']);
        $this->FlexCategoryCode->setDbValue($row['FlexCategoryCode']);
        $this->ABCSaleQty->setDbValue($row['ABCSaleQty']);
        $this->ABCSaleValue->setDbValue($row['ABCSaleValue']);
        $this->ConvertionFactor->setDbValue($row['ConvertionFactor']);
        $this->ConvertionUnitDesc->setDbValue($row['ConvertionUnitDesc']);
        $this->TransactionId->setDbValue($row['TransactionId']);
        $this->SoldProductId->setDbValue($row['SoldProductId']);
        $this->WantedBookId->setDbValue($row['WantedBookId']);
        $this->AllId->setDbValue($row['AllId']);
        $this->BatchAndExpiryCompulsory->setDbValue($row['BatchAndExpiryCompulsory']);
        $this->BatchStockForWantedBook->setDbValue($row['BatchStockForWantedBook']);
        $this->UnitBasedBilling->setDbValue($row['UnitBasedBilling']);
        $this->DoNotCheckStock->setDbValue($row['DoNotCheckStock']);
        $this->AcceptRate->setDbValue($row['AcceptRate']);
        $this->PriceLevel->setDbValue($row['PriceLevel']);
        $this->LastQuotePrice->setDbValue($row['LastQuotePrice']);
        $this->PriceChange->setDbValue($row['PriceChange']);
        $this->CommodityCode->setDbValue($row['CommodityCode']);
        $this->InstitutePrice->setDbValue($row['InstitutePrice']);
        $this->CtrlOrDCtrlProduct->setDbValue($row['CtrlOrDCtrlProduct']);
        $this->ImportedDate->setDbValue($row['ImportedDate']);
        $this->IsImported->setDbValue($row['IsImported']);
        $this->FileName->setDbValue($row['FileName']);
        $this->LPName->setDbValue($row['LPName']);
        $this->GodownNumber->setDbValue($row['GodownNumber']);
        $this->CreationDate->setDbValue($row['CreationDate']);
        $this->CreatedbyUser->setDbValue($row['CreatedbyUser']);
        $this->ModifiedDate->setDbValue($row['ModifiedDate']);
        $this->ModifiedbyUser->setDbValue($row['ModifiedbyUser']);
        $this->isActive->setDbValue($row['isActive']);
        $this->AllowExpiryClaim->setDbValue($row['AllowExpiryClaim']);
        $this->BrandCode->setDbValue($row['BrandCode']);
        $this->FreeSchemeBasedon->setDbValue($row['FreeSchemeBasedon']);
        $this->DoNotCheckCostInBill->setDbValue($row['DoNotCheckCostInBill']);
        $this->ProductGroupCode->setDbValue($row['ProductGroupCode']);
        $this->ProductStrengthCode->setDbValue($row['ProductStrengthCode']);
        $this->PackingCode->setDbValue($row['PackingCode']);
        $this->ComputedMinStock->setDbValue($row['ComputedMinStock']);
        $this->ComputedMaxStock->setDbValue($row['ComputedMaxStock']);
        $this->ProductRemark->setDbValue($row['ProductRemark']);
        $this->ProductDrugCode->setDbValue($row['ProductDrugCode']);
        $this->IsMatrixProduct->setDbValue($row['IsMatrixProduct']);
        $this->AttributeCount1->setDbValue($row['AttributeCount1']);
        $this->AttributeCount2->setDbValue($row['AttributeCount2']);
        $this->AttributeCount3->setDbValue($row['AttributeCount3']);
        $this->AttributeCount4->setDbValue($row['AttributeCount4']);
        $this->AttributeCount5->setDbValue($row['AttributeCount5']);
        $this->DefaultDiscountPercentage->setDbValue($row['DefaultDiscountPercentage']);
        $this->DonotPrintBarcode->setDbValue($row['DonotPrintBarcode']);
        $this->ProductLevelDiscount->setDbValue($row['ProductLevelDiscount']);
        $this->Markup->setDbValue($row['Markup']);
        $this->MarkDown->setDbValue($row['MarkDown']);
        $this->ReworkSalePrice->setDbValue($row['ReworkSalePrice']);
        $this->MultipleInput->setDbValue($row['MultipleInput']);
        $this->LpPackageInformation->setDbValue($row['LpPackageInformation']);
        $this->AllowNegativeStock->setDbValue($row['AllowNegativeStock']);
        $this->OrderDate->setDbValue($row['OrderDate']);
        $this->OrderTime->setDbValue($row['OrderTime']);
        $this->RateGroupCode->setDbValue($row['RateGroupCode']);
        $this->ConversionCaseLot->setDbValue($row['ConversionCaseLot']);
        $this->ShippingLot->setDbValue($row['ShippingLot']);
        $this->AllowExpiryReplacement->setDbValue($row['AllowExpiryReplacement']);
        $this->NoOfMonthExpiryAllowed->setDbValue($row['NoOfMonthExpiryAllowed']);
        $this->ProductDiscountEligibility->setDbValue($row['ProductDiscountEligibility']);
        $this->ScheduleTypeCode->setDbValue($row['ScheduleTypeCode']);
        $this->AIOCDProductCode->setDbValue($row['AIOCDProductCode']);
        $this->FreeQuantity->setDbValue($row['FreeQuantity']);
        $this->DiscountType->setDbValue($row['DiscountType']);
        $this->DiscountValue->setDbValue($row['DiscountValue']);
        $this->HasProductOrderAttribute->setDbValue($row['HasProductOrderAttribute']);
        $this->FirstPODate->setDbValue($row['FirstPODate']);
        $this->SaleprcieAndMrpCalcPercent->setDbValue($row['SaleprcieAndMrpCalcPercent']);
        $this->IsGiftVoucherProducts->setDbValue($row['IsGiftVoucherProducts']);
        $this->AcceptRange4SerialNumber->setDbValue($row['AcceptRange4SerialNumber']);
        $this->GiftVoucherDenomination->setDbValue($row['GiftVoucherDenomination']);
        $this->Subclasscode->setDbValue($row['Subclasscode']);
        $this->BarCodeFromWeighingMachine->setDbValue($row['BarCodeFromWeighingMachine']);
        $this->CheckCostInReturn->setDbValue($row['CheckCostInReturn']);
        $this->FrequentSaleProduct->setDbValue($row['FrequentSaleProduct']);
        $this->RateType->setDbValue($row['RateType']);
        $this->TouchscreenName->setDbValue($row['TouchscreenName']);
        $this->FreeType->setDbValue($row['FreeType']);
        $this->LooseQtyasNewBatch->setDbValue($row['LooseQtyasNewBatch']);
        $this->AllowSlabBilling->setDbValue($row['AllowSlabBilling']);
        $this->ProductTypeForProduction->setDbValue($row['ProductTypeForProduction']);
        $this->RecipeCode->setDbValue($row['RecipeCode']);
        $this->DefaultUnitType->setDbValue($row['DefaultUnitType']);
        $this->PIstatus->setDbValue($row['PIstatus']);
        $this->LastPiConfirmedDate->setDbValue($row['LastPiConfirmedDate']);
        $this->BarCodeDesign->setDbValue($row['BarCodeDesign']);
        $this->AcceptRemarksInBill->setDbValue($row['AcceptRemarksInBill']);
        $this->Classification->setDbValue($row['Classification']);
        $this->TimeSlot->setDbValue($row['TimeSlot']);
        $this->IsBundle->setDbValue($row['IsBundle']);
        $this->ColorCode->setDbValue($row['ColorCode']);
        $this->GenderCode->setDbValue($row['GenderCode']);
        $this->SizeCode->setDbValue($row['SizeCode']);
        $this->GiftCard->setDbValue($row['GiftCard']);
        $this->ToonLabel->setDbValue($row['ToonLabel']);
        $this->GarmentType->setDbValue($row['GarmentType']);
        $this->AgeGroup->setDbValue($row['AgeGroup']);
        $this->Season->setDbValue($row['Season']);
        $this->DailyStockEntry->setDbValue($row['DailyStockEntry']);
        $this->ModifierApplicable->setDbValue($row['ModifierApplicable']);
        $this->ModifierType->setDbValue($row['ModifierType']);
        $this->AcceptZeroRate->setDbValue($row['AcceptZeroRate']);
        $this->ExciseDutyCode->setDbValue($row['ExciseDutyCode']);
        $this->IndentProductGroupCode->setDbValue($row['IndentProductGroupCode']);
        $this->IsMultiBatch->setDbValue($row['IsMultiBatch']);
        $this->IsSingleBatch->setDbValue($row['IsSingleBatch']);
        $this->MarkUpRate1->setDbValue($row['MarkUpRate1']);
        $this->MarkDownRate1->setDbValue($row['MarkDownRate1']);
        $this->MarkUpRate2->setDbValue($row['MarkUpRate2']);
        $this->MarkDownRate2->setDbValue($row['MarkDownRate2']);
        $this->_Yield->setDbValue($row['Yield']);
        $this->RefProductCode->setDbValue($row['RefProductCode']);
        $this->Volume->setDbValue($row['Volume']);
        $this->MeasurementID->setDbValue($row['MeasurementID']);
        $this->CountryCode->setDbValue($row['CountryCode']);
        $this->AcceptWMQty->setDbValue($row['AcceptWMQty']);
        $this->SingleBatchBasedOnRate->setDbValue($row['SingleBatchBasedOnRate']);
        $this->TenderNo->setDbValue($row['TenderNo']);
        $this->SingleBillMaximumSoldQtyFiled->setDbValue($row['SingleBillMaximumSoldQtyFiled']);
        $this->Strength1->setDbValue($row['Strength1']);
        $this->Strength2->setDbValue($row['Strength2']);
        $this->Strength3->setDbValue($row['Strength3']);
        $this->Strength4->setDbValue($row['Strength4']);
        $this->Strength5->setDbValue($row['Strength5']);
        $this->IngredientCode1->setDbValue($row['IngredientCode1']);
        $this->IngredientCode2->setDbValue($row['IngredientCode2']);
        $this->IngredientCode3->setDbValue($row['IngredientCode3']);
        $this->IngredientCode4->setDbValue($row['IngredientCode4']);
        $this->IngredientCode5->setDbValue($row['IngredientCode5']);
        $this->OrderType->setDbValue($row['OrderType']);
        $this->StockUOM->setDbValue($row['StockUOM']);
        $this->PriceUOM->setDbValue($row['PriceUOM']);
        $this->DefaultSaleUOM->setDbValue($row['DefaultSaleUOM']);
        $this->DefaultPurchaseUOM->setDbValue($row['DefaultPurchaseUOM']);
        $this->ReportingUOM->setDbValue($row['ReportingUOM']);
        $this->LastPurchasedUOM->setDbValue($row['LastPurchasedUOM']);
        $this->TreatmentCodes->setDbValue($row['TreatmentCodes']);
        $this->InsuranceType->setDbValue($row['InsuranceType']);
        $this->CoverageGroupCodes->setDbValue($row['CoverageGroupCodes']);
        $this->MultipleUOM->setDbValue($row['MultipleUOM']);
        $this->SalePriceComputation->setDbValue($row['SalePriceComputation']);
        $this->StockCorrection->setDbValue($row['StockCorrection']);
        $this->LBTPercentage->setDbValue($row['LBTPercentage']);
        $this->SalesCommission->setDbValue($row['SalesCommission']);
        $this->LockedStock->setDbValue($row['LockedStock']);
        $this->MinMaxUOM->setDbValue($row['MinMaxUOM']);
        $this->ExpiryMfrDateFormat->setDbValue($row['ExpiryMfrDateFormat']);
        $this->ProductLifeTime->setDbValue($row['ProductLifeTime']);
        $this->IsCombo->setDbValue($row['IsCombo']);
        $this->ComboTypeCode->setDbValue($row['ComboTypeCode']);
        $this->AttributeCount6->setDbValue($row['AttributeCount6']);
        $this->AttributeCount7->setDbValue($row['AttributeCount7']);
        $this->AttributeCount8->setDbValue($row['AttributeCount8']);
        $this->AttributeCount9->setDbValue($row['AttributeCount9']);
        $this->AttributeCount10->setDbValue($row['AttributeCount10']);
        $this->LabourCharge->setDbValue($row['LabourCharge']);
        $this->AffectOtherCharge->setDbValue($row['AffectOtherCharge']);
        $this->DosageInfo->setDbValue($row['DosageInfo']);
        $this->DosageType->setDbValue($row['DosageType']);
        $this->DefaultIndentUOM->setDbValue($row['DefaultIndentUOM']);
        $this->PromoTag->setDbValue($row['PromoTag']);
        $this->BillLevelPromoTag->setDbValue($row['BillLevelPromoTag']);
        $this->IsMRPProduct->setDbValue($row['IsMRPProduct']);
        $this->MrpList->setDbValue($row['MrpList']);
        $this->AlternateSaleUOM->setDbValue($row['AlternateSaleUOM']);
        $this->FreeUOM->setDbValue($row['FreeUOM']);
        $this->MarketedCode->setDbValue($row['MarketedCode']);
        $this->MinimumSalePrice->setDbValue($row['MinimumSalePrice']);
        $this->PRate1->setDbValue($row['PRate1']);
        $this->PRate2->setDbValue($row['PRate2']);
        $this->LPItemCost->setDbValue($row['LPItemCost']);
        $this->FixedItemCost->setDbValue($row['FixedItemCost']);
        $this->HSNId->setDbValue($row['HSNId']);
        $this->TaxInclusive->setDbValue($row['TaxInclusive']);
        $this->EligibleforWarranty->setDbValue($row['EligibleforWarranty']);
        $this->NoofMonthsWarranty->setDbValue($row['NoofMonthsWarranty']);
        $this->ComputeTaxonCost->setDbValue($row['ComputeTaxonCost']);
        $this->HasEmptyBottleTrack->setDbValue($row['HasEmptyBottleTrack']);
        $this->EmptyBottleReferenceCode->setDbValue($row['EmptyBottleReferenceCode']);
        $this->AdditionalCESSAmount->setDbValue($row['AdditionalCESSAmount']);
        $this->EmptyBottleRate->setDbValue($row['EmptyBottleRate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['ProductCode'] = null;
        $row['ProductName'] = null;
        $row['DivisionCode'] = null;
        $row['ManufacturerCode'] = null;
        $row['SupplierCode'] = null;
        $row['AlternateSupplierCodes'] = null;
        $row['AlternateProductCode'] = null;
        $row['UniversalProductCode'] = null;
        $row['BookProductCode'] = null;
        $row['OldCode'] = null;
        $row['ProtectedProducts'] = null;
        $row['ProductFullName'] = null;
        $row['UnitOfMeasure'] = null;
        $row['UnitDescription'] = null;
        $row['BulkDescription'] = null;
        $row['BarCodeDescription'] = null;
        $row['PackageInformation'] = null;
        $row['PackageId'] = null;
        $row['Weight'] = null;
        $row['AllowFractions'] = null;
        $row['MinimumStockLevel'] = null;
        $row['MaximumStockLevel'] = null;
        $row['ReorderLevel'] = null;
        $row['MinMaxRatio'] = null;
        $row['AutoMinMaxRatio'] = null;
        $row['ScheduleCode'] = null;
        $row['RopRatio'] = null;
        $row['MRP'] = null;
        $row['PurchasePrice'] = null;
        $row['PurchaseUnit'] = null;
        $row['PurchaseTaxCode'] = null;
        $row['AllowDirectInward'] = null;
        $row['SalePrice'] = null;
        $row['SaleUnit'] = null;
        $row['SalesTaxCode'] = null;
        $row['StockReceived'] = null;
        $row['TotalStock'] = null;
        $row['StockType'] = null;
        $row['StockCheckDate'] = null;
        $row['StockAdjustmentDate'] = null;
        $row['Remarks'] = null;
        $row['CostCentre'] = null;
        $row['ProductType'] = null;
        $row['TaxAmount'] = null;
        $row['TaxId'] = null;
        $row['ResaleTaxApplicable'] = null;
        $row['CstOtherTax'] = null;
        $row['TotalTax'] = null;
        $row['ItemCost'] = null;
        $row['ExpiryDate'] = null;
        $row['BatchDescription'] = null;
        $row['FreeScheme'] = null;
        $row['CashDiscountEligibility'] = null;
        $row['DiscountPerAllowInBill'] = null;
        $row['Discount'] = null;
        $row['TotalAmount'] = null;
        $row['StandardMargin'] = null;
        $row['Margin'] = null;
        $row['MarginId'] = null;
        $row['ExpectedMargin'] = null;
        $row['SurchargeBeforeTax'] = null;
        $row['SurchargeAfterTax'] = null;
        $row['TempOrderNo'] = null;
        $row['TempOrderDate'] = null;
        $row['OrderUnit'] = null;
        $row['OrderQuantity'] = null;
        $row['MarkForOrder'] = null;
        $row['OrderAllId'] = null;
        $row['CalculateOrderQty'] = null;
        $row['SubLocation'] = null;
        $row['CategoryCode'] = null;
        $row['SubCategory'] = null;
        $row['FlexCategoryCode'] = null;
        $row['ABCSaleQty'] = null;
        $row['ABCSaleValue'] = null;
        $row['ConvertionFactor'] = null;
        $row['ConvertionUnitDesc'] = null;
        $row['TransactionId'] = null;
        $row['SoldProductId'] = null;
        $row['WantedBookId'] = null;
        $row['AllId'] = null;
        $row['BatchAndExpiryCompulsory'] = null;
        $row['BatchStockForWantedBook'] = null;
        $row['UnitBasedBilling'] = null;
        $row['DoNotCheckStock'] = null;
        $row['AcceptRate'] = null;
        $row['PriceLevel'] = null;
        $row['LastQuotePrice'] = null;
        $row['PriceChange'] = null;
        $row['CommodityCode'] = null;
        $row['InstitutePrice'] = null;
        $row['CtrlOrDCtrlProduct'] = null;
        $row['ImportedDate'] = null;
        $row['IsImported'] = null;
        $row['FileName'] = null;
        $row['LPName'] = null;
        $row['GodownNumber'] = null;
        $row['CreationDate'] = null;
        $row['CreatedbyUser'] = null;
        $row['ModifiedDate'] = null;
        $row['ModifiedbyUser'] = null;
        $row['isActive'] = null;
        $row['AllowExpiryClaim'] = null;
        $row['BrandCode'] = null;
        $row['FreeSchemeBasedon'] = null;
        $row['DoNotCheckCostInBill'] = null;
        $row['ProductGroupCode'] = null;
        $row['ProductStrengthCode'] = null;
        $row['PackingCode'] = null;
        $row['ComputedMinStock'] = null;
        $row['ComputedMaxStock'] = null;
        $row['ProductRemark'] = null;
        $row['ProductDrugCode'] = null;
        $row['IsMatrixProduct'] = null;
        $row['AttributeCount1'] = null;
        $row['AttributeCount2'] = null;
        $row['AttributeCount3'] = null;
        $row['AttributeCount4'] = null;
        $row['AttributeCount5'] = null;
        $row['DefaultDiscountPercentage'] = null;
        $row['DonotPrintBarcode'] = null;
        $row['ProductLevelDiscount'] = null;
        $row['Markup'] = null;
        $row['MarkDown'] = null;
        $row['ReworkSalePrice'] = null;
        $row['MultipleInput'] = null;
        $row['LpPackageInformation'] = null;
        $row['AllowNegativeStock'] = null;
        $row['OrderDate'] = null;
        $row['OrderTime'] = null;
        $row['RateGroupCode'] = null;
        $row['ConversionCaseLot'] = null;
        $row['ShippingLot'] = null;
        $row['AllowExpiryReplacement'] = null;
        $row['NoOfMonthExpiryAllowed'] = null;
        $row['ProductDiscountEligibility'] = null;
        $row['ScheduleTypeCode'] = null;
        $row['AIOCDProductCode'] = null;
        $row['FreeQuantity'] = null;
        $row['DiscountType'] = null;
        $row['DiscountValue'] = null;
        $row['HasProductOrderAttribute'] = null;
        $row['FirstPODate'] = null;
        $row['SaleprcieAndMrpCalcPercent'] = null;
        $row['IsGiftVoucherProducts'] = null;
        $row['AcceptRange4SerialNumber'] = null;
        $row['GiftVoucherDenomination'] = null;
        $row['Subclasscode'] = null;
        $row['BarCodeFromWeighingMachine'] = null;
        $row['CheckCostInReturn'] = null;
        $row['FrequentSaleProduct'] = null;
        $row['RateType'] = null;
        $row['TouchscreenName'] = null;
        $row['FreeType'] = null;
        $row['LooseQtyasNewBatch'] = null;
        $row['AllowSlabBilling'] = null;
        $row['ProductTypeForProduction'] = null;
        $row['RecipeCode'] = null;
        $row['DefaultUnitType'] = null;
        $row['PIstatus'] = null;
        $row['LastPiConfirmedDate'] = null;
        $row['BarCodeDesign'] = null;
        $row['AcceptRemarksInBill'] = null;
        $row['Classification'] = null;
        $row['TimeSlot'] = null;
        $row['IsBundle'] = null;
        $row['ColorCode'] = null;
        $row['GenderCode'] = null;
        $row['SizeCode'] = null;
        $row['GiftCard'] = null;
        $row['ToonLabel'] = null;
        $row['GarmentType'] = null;
        $row['AgeGroup'] = null;
        $row['Season'] = null;
        $row['DailyStockEntry'] = null;
        $row['ModifierApplicable'] = null;
        $row['ModifierType'] = null;
        $row['AcceptZeroRate'] = null;
        $row['ExciseDutyCode'] = null;
        $row['IndentProductGroupCode'] = null;
        $row['IsMultiBatch'] = null;
        $row['IsSingleBatch'] = null;
        $row['MarkUpRate1'] = null;
        $row['MarkDownRate1'] = null;
        $row['MarkUpRate2'] = null;
        $row['MarkDownRate2'] = null;
        $row['Yield'] = null;
        $row['RefProductCode'] = null;
        $row['Volume'] = null;
        $row['MeasurementID'] = null;
        $row['CountryCode'] = null;
        $row['AcceptWMQty'] = null;
        $row['SingleBatchBasedOnRate'] = null;
        $row['TenderNo'] = null;
        $row['SingleBillMaximumSoldQtyFiled'] = null;
        $row['Strength1'] = null;
        $row['Strength2'] = null;
        $row['Strength3'] = null;
        $row['Strength4'] = null;
        $row['Strength5'] = null;
        $row['IngredientCode1'] = null;
        $row['IngredientCode2'] = null;
        $row['IngredientCode3'] = null;
        $row['IngredientCode4'] = null;
        $row['IngredientCode5'] = null;
        $row['OrderType'] = null;
        $row['StockUOM'] = null;
        $row['PriceUOM'] = null;
        $row['DefaultSaleUOM'] = null;
        $row['DefaultPurchaseUOM'] = null;
        $row['ReportingUOM'] = null;
        $row['LastPurchasedUOM'] = null;
        $row['TreatmentCodes'] = null;
        $row['InsuranceType'] = null;
        $row['CoverageGroupCodes'] = null;
        $row['MultipleUOM'] = null;
        $row['SalePriceComputation'] = null;
        $row['StockCorrection'] = null;
        $row['LBTPercentage'] = null;
        $row['SalesCommission'] = null;
        $row['LockedStock'] = null;
        $row['MinMaxUOM'] = null;
        $row['ExpiryMfrDateFormat'] = null;
        $row['ProductLifeTime'] = null;
        $row['IsCombo'] = null;
        $row['ComboTypeCode'] = null;
        $row['AttributeCount6'] = null;
        $row['AttributeCount7'] = null;
        $row['AttributeCount8'] = null;
        $row['AttributeCount9'] = null;
        $row['AttributeCount10'] = null;
        $row['LabourCharge'] = null;
        $row['AffectOtherCharge'] = null;
        $row['DosageInfo'] = null;
        $row['DosageType'] = null;
        $row['DefaultIndentUOM'] = null;
        $row['PromoTag'] = null;
        $row['BillLevelPromoTag'] = null;
        $row['IsMRPProduct'] = null;
        $row['MrpList'] = null;
        $row['AlternateSaleUOM'] = null;
        $row['FreeUOM'] = null;
        $row['MarketedCode'] = null;
        $row['MinimumSalePrice'] = null;
        $row['PRate1'] = null;
        $row['PRate2'] = null;
        $row['LPItemCost'] = null;
        $row['FixedItemCost'] = null;
        $row['HSNId'] = null;
        $row['TaxInclusive'] = null;
        $row['EligibleforWarranty'] = null;
        $row['NoofMonthsWarranty'] = null;
        $row['ComputeTaxonCost'] = null;
        $row['HasEmptyBottleTrack'] = null;
        $row['EmptyBottleReferenceCode'] = null;
        $row['AdditionalCESSAmount'] = null;
        $row['EmptyBottleRate'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load old record
        $this->OldRecordset = null;
        $validKey = $this->OldKey != "";
        if ($validKey) {
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $this->OldRecordset = LoadRecordset($sql, $conn);
        }
        $this->loadRowValues($this->OldRecordset); // Load row values
        return $validKey;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs
        $this->ViewUrl = $this->getViewUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->InlineEditUrl = $this->getInlineEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->InlineCopyUrl = $this->getInlineCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();

        // Convert decimal values if posted back
        if ($this->Weight->FormValue == $this->Weight->CurrentValue && is_numeric(ConvertToFloatString($this->Weight->CurrentValue))) {
            $this->Weight->CurrentValue = ConvertToFloatString($this->Weight->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MinimumStockLevel->FormValue == $this->MinimumStockLevel->CurrentValue && is_numeric(ConvertToFloatString($this->MinimumStockLevel->CurrentValue))) {
            $this->MinimumStockLevel->CurrentValue = ConvertToFloatString($this->MinimumStockLevel->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MaximumStockLevel->FormValue == $this->MaximumStockLevel->CurrentValue && is_numeric(ConvertToFloatString($this->MaximumStockLevel->CurrentValue))) {
            $this->MaximumStockLevel->CurrentValue = ConvertToFloatString($this->MaximumStockLevel->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ReorderLevel->FormValue == $this->ReorderLevel->CurrentValue && is_numeric(ConvertToFloatString($this->ReorderLevel->CurrentValue))) {
            $this->ReorderLevel->CurrentValue = ConvertToFloatString($this->ReorderLevel->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MinMaxRatio->FormValue == $this->MinMaxRatio->CurrentValue && is_numeric(ConvertToFloatString($this->MinMaxRatio->CurrentValue))) {
            $this->MinMaxRatio->CurrentValue = ConvertToFloatString($this->MinMaxRatio->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->AutoMinMaxRatio->FormValue == $this->AutoMinMaxRatio->CurrentValue && is_numeric(ConvertToFloatString($this->AutoMinMaxRatio->CurrentValue))) {
            $this->AutoMinMaxRatio->CurrentValue = ConvertToFloatString($this->AutoMinMaxRatio->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RopRatio->FormValue == $this->RopRatio->CurrentValue && is_numeric(ConvertToFloatString($this->RopRatio->CurrentValue))) {
            $this->RopRatio->CurrentValue = ConvertToFloatString($this->RopRatio->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchasePrice->FormValue == $this->PurchasePrice->CurrentValue && is_numeric(ConvertToFloatString($this->PurchasePrice->CurrentValue))) {
            $this->PurchasePrice->CurrentValue = ConvertToFloatString($this->PurchasePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchaseUnit->FormValue == $this->PurchaseUnit->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseUnit->CurrentValue))) {
            $this->PurchaseUnit->CurrentValue = ConvertToFloatString($this->PurchaseUnit->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalePrice->FormValue == $this->SalePrice->CurrentValue && is_numeric(ConvertToFloatString($this->SalePrice->CurrentValue))) {
            $this->SalePrice->CurrentValue = ConvertToFloatString($this->SalePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleUnit->FormValue == $this->SaleUnit->CurrentValue && is_numeric(ConvertToFloatString($this->SaleUnit->CurrentValue))) {
            $this->SaleUnit->CurrentValue = ConvertToFloatString($this->SaleUnit->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->StockReceived->FormValue == $this->StockReceived->CurrentValue && is_numeric(ConvertToFloatString($this->StockReceived->CurrentValue))) {
            $this->StockReceived->CurrentValue = ConvertToFloatString($this->StockReceived->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalStock->FormValue == $this->TotalStock->CurrentValue && is_numeric(ConvertToFloatString($this->TotalStock->CurrentValue))) {
            $this->TotalStock->CurrentValue = ConvertToFloatString($this->TotalStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TaxAmount->FormValue == $this->TaxAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TaxAmount->CurrentValue))) {
            $this->TaxAmount->CurrentValue = ConvertToFloatString($this->TaxAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalTax->FormValue == $this->TotalTax->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTax->CurrentValue))) {
            $this->TotalTax->CurrentValue = ConvertToFloatString($this->TotalTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ItemCost->FormValue == $this->ItemCost->CurrentValue && is_numeric(ConvertToFloatString($this->ItemCost->CurrentValue))) {
            $this->ItemCost->CurrentValue = ConvertToFloatString($this->ItemCost->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountPerAllowInBill->FormValue == $this->DiscountPerAllowInBill->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountPerAllowInBill->CurrentValue))) {
            $this->DiscountPerAllowInBill->CurrentValue = ConvertToFloatString($this->DiscountPerAllowInBill->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalAmount->FormValue == $this->TotalAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalAmount->CurrentValue))) {
            $this->TotalAmount->CurrentValue = ConvertToFloatString($this->TotalAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->StandardMargin->FormValue == $this->StandardMargin->CurrentValue && is_numeric(ConvertToFloatString($this->StandardMargin->CurrentValue))) {
            $this->StandardMargin->CurrentValue = ConvertToFloatString($this->StandardMargin->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Margin->FormValue == $this->Margin->CurrentValue && is_numeric(ConvertToFloatString($this->Margin->CurrentValue))) {
            $this->Margin->CurrentValue = ConvertToFloatString($this->Margin->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ExpectedMargin->FormValue == $this->ExpectedMargin->CurrentValue && is_numeric(ConvertToFloatString($this->ExpectedMargin->CurrentValue))) {
            $this->ExpectedMargin->CurrentValue = ConvertToFloatString($this->ExpectedMargin->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SurchargeBeforeTax->FormValue == $this->SurchargeBeforeTax->CurrentValue && is_numeric(ConvertToFloatString($this->SurchargeBeforeTax->CurrentValue))) {
            $this->SurchargeBeforeTax->CurrentValue = ConvertToFloatString($this->SurchargeBeforeTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SurchargeAfterTax->FormValue == $this->SurchargeAfterTax->CurrentValue && is_numeric(ConvertToFloatString($this->SurchargeAfterTax->CurrentValue))) {
            $this->SurchargeAfterTax->CurrentValue = ConvertToFloatString($this->SurchargeAfterTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OrderUnit->FormValue == $this->OrderUnit->CurrentValue && is_numeric(ConvertToFloatString($this->OrderUnit->CurrentValue))) {
            $this->OrderUnit->CurrentValue = ConvertToFloatString($this->OrderUnit->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OrderQuantity->FormValue == $this->OrderQuantity->CurrentValue && is_numeric(ConvertToFloatString($this->OrderQuantity->CurrentValue))) {
            $this->OrderQuantity->CurrentValue = ConvertToFloatString($this->OrderQuantity->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CalculateOrderQty->FormValue == $this->CalculateOrderQty->CurrentValue && is_numeric(ConvertToFloatString($this->CalculateOrderQty->CurrentValue))) {
            $this->CalculateOrderQty->CurrentValue = ConvertToFloatString($this->CalculateOrderQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ABCSaleQty->FormValue == $this->ABCSaleQty->CurrentValue && is_numeric(ConvertToFloatString($this->ABCSaleQty->CurrentValue))) {
            $this->ABCSaleQty->CurrentValue = ConvertToFloatString($this->ABCSaleQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ABCSaleValue->FormValue == $this->ABCSaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->ABCSaleValue->CurrentValue))) {
            $this->ABCSaleValue->CurrentValue = ConvertToFloatString($this->ABCSaleValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LastQuotePrice->FormValue == $this->LastQuotePrice->CurrentValue && is_numeric(ConvertToFloatString($this->LastQuotePrice->CurrentValue))) {
            $this->LastQuotePrice->CurrentValue = ConvertToFloatString($this->LastQuotePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PriceChange->FormValue == $this->PriceChange->CurrentValue && is_numeric(ConvertToFloatString($this->PriceChange->CurrentValue))) {
            $this->PriceChange->CurrentValue = ConvertToFloatString($this->PriceChange->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->InstitutePrice->FormValue == $this->InstitutePrice->CurrentValue && is_numeric(ConvertToFloatString($this->InstitutePrice->CurrentValue))) {
            $this->InstitutePrice->CurrentValue = ConvertToFloatString($this->InstitutePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ComputedMinStock->FormValue == $this->ComputedMinStock->CurrentValue && is_numeric(ConvertToFloatString($this->ComputedMinStock->CurrentValue))) {
            $this->ComputedMinStock->CurrentValue = ConvertToFloatString($this->ComputedMinStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ComputedMaxStock->FormValue == $this->ComputedMaxStock->CurrentValue && is_numeric(ConvertToFloatString($this->ComputedMaxStock->CurrentValue))) {
            $this->ComputedMaxStock->CurrentValue = ConvertToFloatString($this->ComputedMaxStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DefaultDiscountPercentage->FormValue == $this->DefaultDiscountPercentage->CurrentValue && is_numeric(ConvertToFloatString($this->DefaultDiscountPercentage->CurrentValue))) {
            $this->DefaultDiscountPercentage->CurrentValue = ConvertToFloatString($this->DefaultDiscountPercentage->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Markup->FormValue == $this->Markup->CurrentValue && is_numeric(ConvertToFloatString($this->Markup->CurrentValue))) {
            $this->Markup->CurrentValue = ConvertToFloatString($this->Markup->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkDown->FormValue == $this->MarkDown->CurrentValue && is_numeric(ConvertToFloatString($this->MarkDown->CurrentValue))) {
            $this->MarkDown->CurrentValue = ConvertToFloatString($this->MarkDown->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FreeQuantity->FormValue == $this->FreeQuantity->CurrentValue && is_numeric(ConvertToFloatString($this->FreeQuantity->CurrentValue))) {
            $this->FreeQuantity->CurrentValue = ConvertToFloatString($this->FreeQuantity->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountValue->FormValue == $this->DiscountValue->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountValue->CurrentValue))) {
            $this->DiscountValue->CurrentValue = ConvertToFloatString($this->DiscountValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleprcieAndMrpCalcPercent->FormValue == $this->SaleprcieAndMrpCalcPercent->CurrentValue && is_numeric(ConvertToFloatString($this->SaleprcieAndMrpCalcPercent->CurrentValue))) {
            $this->SaleprcieAndMrpCalcPercent->CurrentValue = ConvertToFloatString($this->SaleprcieAndMrpCalcPercent->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkUpRate1->FormValue == $this->MarkUpRate1->CurrentValue && is_numeric(ConvertToFloatString($this->MarkUpRate1->CurrentValue))) {
            $this->MarkUpRate1->CurrentValue = ConvertToFloatString($this->MarkUpRate1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkDownRate1->FormValue == $this->MarkDownRate1->CurrentValue && is_numeric(ConvertToFloatString($this->MarkDownRate1->CurrentValue))) {
            $this->MarkDownRate1->CurrentValue = ConvertToFloatString($this->MarkDownRate1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkUpRate2->FormValue == $this->MarkUpRate2->CurrentValue && is_numeric(ConvertToFloatString($this->MarkUpRate2->CurrentValue))) {
            $this->MarkUpRate2->CurrentValue = ConvertToFloatString($this->MarkUpRate2->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarkDownRate2->FormValue == $this->MarkDownRate2->CurrentValue && is_numeric(ConvertToFloatString($this->MarkDownRate2->CurrentValue))) {
            $this->MarkDownRate2->CurrentValue = ConvertToFloatString($this->MarkDownRate2->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->_Yield->FormValue == $this->_Yield->CurrentValue && is_numeric(ConvertToFloatString($this->_Yield->CurrentValue))) {
            $this->_Yield->CurrentValue = ConvertToFloatString($this->_Yield->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Volume->FormValue == $this->Volume->CurrentValue && is_numeric(ConvertToFloatString($this->Volume->CurrentValue))) {
            $this->Volume->CurrentValue = ConvertToFloatString($this->Volume->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SingleBillMaximumSoldQtyFiled->FormValue == $this->SingleBillMaximumSoldQtyFiled->CurrentValue && is_numeric(ConvertToFloatString($this->SingleBillMaximumSoldQtyFiled->CurrentValue))) {
            $this->SingleBillMaximumSoldQtyFiled->CurrentValue = ConvertToFloatString($this->SingleBillMaximumSoldQtyFiled->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LBTPercentage->FormValue == $this->LBTPercentage->CurrentValue && is_numeric(ConvertToFloatString($this->LBTPercentage->CurrentValue))) {
            $this->LBTPercentage->CurrentValue = ConvertToFloatString($this->LBTPercentage->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalesCommission->FormValue == $this->SalesCommission->CurrentValue && is_numeric(ConvertToFloatString($this->SalesCommission->CurrentValue))) {
            $this->SalesCommission->CurrentValue = ConvertToFloatString($this->SalesCommission->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LockedStock->FormValue == $this->LockedStock->CurrentValue && is_numeric(ConvertToFloatString($this->LockedStock->CurrentValue))) {
            $this->LockedStock->CurrentValue = ConvertToFloatString($this->LockedStock->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LabourCharge->FormValue == $this->LabourCharge->CurrentValue && is_numeric(ConvertToFloatString($this->LabourCharge->CurrentValue))) {
            $this->LabourCharge->CurrentValue = ConvertToFloatString($this->LabourCharge->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MinimumSalePrice->FormValue == $this->MinimumSalePrice->CurrentValue && is_numeric(ConvertToFloatString($this->MinimumSalePrice->CurrentValue))) {
            $this->MinimumSalePrice->CurrentValue = ConvertToFloatString($this->MinimumSalePrice->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PRate1->FormValue == $this->PRate1->CurrentValue && is_numeric(ConvertToFloatString($this->PRate1->CurrentValue))) {
            $this->PRate1->CurrentValue = ConvertToFloatString($this->PRate1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PRate2->FormValue == $this->PRate2->CurrentValue && is_numeric(ConvertToFloatString($this->PRate2->CurrentValue))) {
            $this->PRate2->CurrentValue = ConvertToFloatString($this->PRate2->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LPItemCost->FormValue == $this->LPItemCost->CurrentValue && is_numeric(ConvertToFloatString($this->LPItemCost->CurrentValue))) {
            $this->LPItemCost->CurrentValue = ConvertToFloatString($this->LPItemCost->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FixedItemCost->FormValue == $this->FixedItemCost->CurrentValue && is_numeric(ConvertToFloatString($this->FixedItemCost->CurrentValue))) {
            $this->FixedItemCost->CurrentValue = ConvertToFloatString($this->FixedItemCost->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->AdditionalCESSAmount->FormValue == $this->AdditionalCESSAmount->CurrentValue && is_numeric(ConvertToFloatString($this->AdditionalCESSAmount->CurrentValue))) {
            $this->AdditionalCESSAmount->CurrentValue = ConvertToFloatString($this->AdditionalCESSAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->EmptyBottleRate->FormValue == $this->EmptyBottleRate->CurrentValue && is_numeric(ConvertToFloatString($this->EmptyBottleRate->CurrentValue))) {
            $this->EmptyBottleRate->CurrentValue = ConvertToFloatString($this->EmptyBottleRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ProductCode

        // ProductName

        // DivisionCode

        // ManufacturerCode

        // SupplierCode

        // AlternateSupplierCodes

        // AlternateProductCode

        // UniversalProductCode

        // BookProductCode

        // OldCode

        // ProtectedProducts

        // ProductFullName

        // UnitOfMeasure

        // UnitDescription

        // BulkDescription

        // BarCodeDescription

        // PackageInformation

        // PackageId

        // Weight

        // AllowFractions

        // MinimumStockLevel

        // MaximumStockLevel

        // ReorderLevel

        // MinMaxRatio

        // AutoMinMaxRatio

        // ScheduleCode

        // RopRatio

        // MRP

        // PurchasePrice

        // PurchaseUnit

        // PurchaseTaxCode

        // AllowDirectInward

        // SalePrice

        // SaleUnit

        // SalesTaxCode

        // StockReceived

        // TotalStock

        // StockType

        // StockCheckDate

        // StockAdjustmentDate

        // Remarks

        // CostCentre

        // ProductType

        // TaxAmount

        // TaxId

        // ResaleTaxApplicable

        // CstOtherTax

        // TotalTax

        // ItemCost

        // ExpiryDate

        // BatchDescription

        // FreeScheme

        // CashDiscountEligibility

        // DiscountPerAllowInBill

        // Discount

        // TotalAmount

        // StandardMargin

        // Margin

        // MarginId

        // ExpectedMargin

        // SurchargeBeforeTax

        // SurchargeAfterTax

        // TempOrderNo

        // TempOrderDate

        // OrderUnit

        // OrderQuantity

        // MarkForOrder

        // OrderAllId

        // CalculateOrderQty

        // SubLocation

        // CategoryCode

        // SubCategory

        // FlexCategoryCode

        // ABCSaleQty

        // ABCSaleValue

        // ConvertionFactor

        // ConvertionUnitDesc

        // TransactionId

        // SoldProductId

        // WantedBookId

        // AllId

        // BatchAndExpiryCompulsory

        // BatchStockForWantedBook

        // UnitBasedBilling

        // DoNotCheckStock

        // AcceptRate

        // PriceLevel

        // LastQuotePrice

        // PriceChange

        // CommodityCode

        // InstitutePrice

        // CtrlOrDCtrlProduct

        // ImportedDate

        // IsImported

        // FileName

        // LPName

        // GodownNumber

        // CreationDate

        // CreatedbyUser

        // ModifiedDate

        // ModifiedbyUser

        // isActive

        // AllowExpiryClaim

        // BrandCode

        // FreeSchemeBasedon

        // DoNotCheckCostInBill

        // ProductGroupCode

        // ProductStrengthCode

        // PackingCode

        // ComputedMinStock

        // ComputedMaxStock

        // ProductRemark

        // ProductDrugCode

        // IsMatrixProduct

        // AttributeCount1

        // AttributeCount2

        // AttributeCount3

        // AttributeCount4

        // AttributeCount5

        // DefaultDiscountPercentage

        // DonotPrintBarcode

        // ProductLevelDiscount

        // Markup

        // MarkDown

        // ReworkSalePrice

        // MultipleInput

        // LpPackageInformation

        // AllowNegativeStock

        // OrderDate

        // OrderTime

        // RateGroupCode

        // ConversionCaseLot

        // ShippingLot

        // AllowExpiryReplacement

        // NoOfMonthExpiryAllowed

        // ProductDiscountEligibility

        // ScheduleTypeCode

        // AIOCDProductCode

        // FreeQuantity

        // DiscountType

        // DiscountValue

        // HasProductOrderAttribute

        // FirstPODate

        // SaleprcieAndMrpCalcPercent

        // IsGiftVoucherProducts

        // AcceptRange4SerialNumber

        // GiftVoucherDenomination

        // Subclasscode

        // BarCodeFromWeighingMachine

        // CheckCostInReturn

        // FrequentSaleProduct

        // RateType

        // TouchscreenName

        // FreeType

        // LooseQtyasNewBatch

        // AllowSlabBilling

        // ProductTypeForProduction

        // RecipeCode

        // DefaultUnitType

        // PIstatus

        // LastPiConfirmedDate

        // BarCodeDesign

        // AcceptRemarksInBill

        // Classification

        // TimeSlot

        // IsBundle

        // ColorCode

        // GenderCode

        // SizeCode

        // GiftCard

        // ToonLabel

        // GarmentType

        // AgeGroup

        // Season

        // DailyStockEntry

        // ModifierApplicable

        // ModifierType

        // AcceptZeroRate

        // ExciseDutyCode

        // IndentProductGroupCode

        // IsMultiBatch

        // IsSingleBatch

        // MarkUpRate1

        // MarkDownRate1

        // MarkUpRate2

        // MarkDownRate2

        // Yield

        // RefProductCode

        // Volume

        // MeasurementID

        // CountryCode

        // AcceptWMQty

        // SingleBatchBasedOnRate

        // TenderNo

        // SingleBillMaximumSoldQtyFiled

        // Strength1

        // Strength2

        // Strength3

        // Strength4

        // Strength5

        // IngredientCode1

        // IngredientCode2

        // IngredientCode3

        // IngredientCode4

        // IngredientCode5

        // OrderType

        // StockUOM

        // PriceUOM

        // DefaultSaleUOM

        // DefaultPurchaseUOM

        // ReportingUOM

        // LastPurchasedUOM

        // TreatmentCodes

        // InsuranceType

        // CoverageGroupCodes

        // MultipleUOM

        // SalePriceComputation

        // StockCorrection

        // LBTPercentage

        // SalesCommission

        // LockedStock

        // MinMaxUOM

        // ExpiryMfrDateFormat

        // ProductLifeTime

        // IsCombo

        // ComboTypeCode

        // AttributeCount6

        // AttributeCount7

        // AttributeCount8

        // AttributeCount9

        // AttributeCount10

        // LabourCharge

        // AffectOtherCharge

        // DosageInfo

        // DosageType

        // DefaultIndentUOM

        // PromoTag

        // BillLevelPromoTag

        // IsMRPProduct

        // MrpList

        // AlternateSaleUOM

        // FreeUOM

        // MarketedCode

        // MinimumSalePrice

        // PRate1

        // PRate2

        // LPItemCost

        // FixedItemCost

        // HSNId

        // TaxInclusive

        // EligibleforWarranty

        // NoofMonthsWarranty

        // ComputeTaxonCost

        // HasEmptyBottleTrack

        // EmptyBottleReferenceCode

        // AdditionalCESSAmount

        // EmptyBottleRate
        if ($this->RowType == ROWTYPE_VIEW) {
            // ProductCode
            $this->ProductCode->ViewValue = $this->ProductCode->CurrentValue;
            $this->ProductCode->ViewCustomAttributes = "";

            // ProductName
            $this->ProductName->ViewValue = $this->ProductName->CurrentValue;
            $this->ProductName->ViewCustomAttributes = "";

            // DivisionCode
            $this->DivisionCode->ViewValue = $this->DivisionCode->CurrentValue;
            $this->DivisionCode->ViewCustomAttributes = "";

            // ManufacturerCode
            $this->ManufacturerCode->ViewValue = $this->ManufacturerCode->CurrentValue;
            $this->ManufacturerCode->ViewCustomAttributes = "";

            // SupplierCode
            $this->SupplierCode->ViewValue = $this->SupplierCode->CurrentValue;
            $this->SupplierCode->ViewCustomAttributes = "";

            // AlternateSupplierCodes
            $this->AlternateSupplierCodes->ViewValue = $this->AlternateSupplierCodes->CurrentValue;
            $this->AlternateSupplierCodes->ViewCustomAttributes = "";

            // AlternateProductCode
            $this->AlternateProductCode->ViewValue = $this->AlternateProductCode->CurrentValue;
            $this->AlternateProductCode->ViewCustomAttributes = "";

            // UniversalProductCode
            $this->UniversalProductCode->ViewValue = $this->UniversalProductCode->CurrentValue;
            $this->UniversalProductCode->ViewValue = FormatNumber($this->UniversalProductCode->ViewValue, 0, -2, -2, -2);
            $this->UniversalProductCode->ViewCustomAttributes = "";

            // BookProductCode
            $this->BookProductCode->ViewValue = $this->BookProductCode->CurrentValue;
            $this->BookProductCode->ViewValue = FormatNumber($this->BookProductCode->ViewValue, 0, -2, -2, -2);
            $this->BookProductCode->ViewCustomAttributes = "";

            // OldCode
            $this->OldCode->ViewValue = $this->OldCode->CurrentValue;
            $this->OldCode->ViewCustomAttributes = "";

            // ProtectedProducts
            $this->ProtectedProducts->ViewValue = $this->ProtectedProducts->CurrentValue;
            $this->ProtectedProducts->ViewValue = FormatNumber($this->ProtectedProducts->ViewValue, 0, -2, -2, -2);
            $this->ProtectedProducts->ViewCustomAttributes = "";

            // ProductFullName
            $this->ProductFullName->ViewValue = $this->ProductFullName->CurrentValue;
            $this->ProductFullName->ViewCustomAttributes = "";

            // UnitOfMeasure
            $this->UnitOfMeasure->ViewValue = $this->UnitOfMeasure->CurrentValue;
            $this->UnitOfMeasure->ViewValue = FormatNumber($this->UnitOfMeasure->ViewValue, 0, -2, -2, -2);
            $this->UnitOfMeasure->ViewCustomAttributes = "";

            // UnitDescription
            $this->UnitDescription->ViewValue = $this->UnitDescription->CurrentValue;
            $this->UnitDescription->ViewCustomAttributes = "";

            // BulkDescription
            $this->BulkDescription->ViewValue = $this->BulkDescription->CurrentValue;
            $this->BulkDescription->ViewCustomAttributes = "";

            // BarCodeDescription
            $this->BarCodeDescription->ViewValue = $this->BarCodeDescription->CurrentValue;
            $this->BarCodeDescription->ViewCustomAttributes = "";

            // PackageInformation
            $this->PackageInformation->ViewValue = $this->PackageInformation->CurrentValue;
            $this->PackageInformation->ViewCustomAttributes = "";

            // PackageId
            $this->PackageId->ViewValue = $this->PackageId->CurrentValue;
            $this->PackageId->ViewValue = FormatNumber($this->PackageId->ViewValue, 0, -2, -2, -2);
            $this->PackageId->ViewCustomAttributes = "";

            // Weight
            $this->Weight->ViewValue = $this->Weight->CurrentValue;
            $this->Weight->ViewValue = FormatNumber($this->Weight->ViewValue, 2, -2, -2, -2);
            $this->Weight->ViewCustomAttributes = "";

            // AllowFractions
            $this->AllowFractions->ViewValue = $this->AllowFractions->CurrentValue;
            $this->AllowFractions->ViewValue = FormatNumber($this->AllowFractions->ViewValue, 0, -2, -2, -2);
            $this->AllowFractions->ViewCustomAttributes = "";

            // MinimumStockLevel
            $this->MinimumStockLevel->ViewValue = $this->MinimumStockLevel->CurrentValue;
            $this->MinimumStockLevel->ViewValue = FormatNumber($this->MinimumStockLevel->ViewValue, 2, -2, -2, -2);
            $this->MinimumStockLevel->ViewCustomAttributes = "";

            // MaximumStockLevel
            $this->MaximumStockLevel->ViewValue = $this->MaximumStockLevel->CurrentValue;
            $this->MaximumStockLevel->ViewValue = FormatNumber($this->MaximumStockLevel->ViewValue, 2, -2, -2, -2);
            $this->MaximumStockLevel->ViewCustomAttributes = "";

            // ReorderLevel
            $this->ReorderLevel->ViewValue = $this->ReorderLevel->CurrentValue;
            $this->ReorderLevel->ViewValue = FormatNumber($this->ReorderLevel->ViewValue, 2, -2, -2, -2);
            $this->ReorderLevel->ViewCustomAttributes = "";

            // MinMaxRatio
            $this->MinMaxRatio->ViewValue = $this->MinMaxRatio->CurrentValue;
            $this->MinMaxRatio->ViewValue = FormatNumber($this->MinMaxRatio->ViewValue, 2, -2, -2, -2);
            $this->MinMaxRatio->ViewCustomAttributes = "";

            // AutoMinMaxRatio
            $this->AutoMinMaxRatio->ViewValue = $this->AutoMinMaxRatio->CurrentValue;
            $this->AutoMinMaxRatio->ViewValue = FormatNumber($this->AutoMinMaxRatio->ViewValue, 2, -2, -2, -2);
            $this->AutoMinMaxRatio->ViewCustomAttributes = "";

            // ScheduleCode
            $this->ScheduleCode->ViewValue = $this->ScheduleCode->CurrentValue;
            $this->ScheduleCode->ViewValue = FormatNumber($this->ScheduleCode->ViewValue, 0, -2, -2, -2);
            $this->ScheduleCode->ViewCustomAttributes = "";

            // RopRatio
            $this->RopRatio->ViewValue = $this->RopRatio->CurrentValue;
            $this->RopRatio->ViewValue = FormatNumber($this->RopRatio->ViewValue, 2, -2, -2, -2);
            $this->RopRatio->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // PurchasePrice
            $this->PurchasePrice->ViewValue = $this->PurchasePrice->CurrentValue;
            $this->PurchasePrice->ViewValue = FormatNumber($this->PurchasePrice->ViewValue, 2, -2, -2, -2);
            $this->PurchasePrice->ViewCustomAttributes = "";

            // PurchaseUnit
            $this->PurchaseUnit->ViewValue = $this->PurchaseUnit->CurrentValue;
            $this->PurchaseUnit->ViewValue = FormatNumber($this->PurchaseUnit->ViewValue, 2, -2, -2, -2);
            $this->PurchaseUnit->ViewCustomAttributes = "";

            // PurchaseTaxCode
            $this->PurchaseTaxCode->ViewValue = $this->PurchaseTaxCode->CurrentValue;
            $this->PurchaseTaxCode->ViewValue = FormatNumber($this->PurchaseTaxCode->ViewValue, 0, -2, -2, -2);
            $this->PurchaseTaxCode->ViewCustomAttributes = "";

            // AllowDirectInward
            $this->AllowDirectInward->ViewValue = $this->AllowDirectInward->CurrentValue;
            $this->AllowDirectInward->ViewValue = FormatNumber($this->AllowDirectInward->ViewValue, 0, -2, -2, -2);
            $this->AllowDirectInward->ViewCustomAttributes = "";

            // SalePrice
            $this->SalePrice->ViewValue = $this->SalePrice->CurrentValue;
            $this->SalePrice->ViewValue = FormatNumber($this->SalePrice->ViewValue, 2, -2, -2, -2);
            $this->SalePrice->ViewCustomAttributes = "";

            // SaleUnit
            $this->SaleUnit->ViewValue = $this->SaleUnit->CurrentValue;
            $this->SaleUnit->ViewValue = FormatNumber($this->SaleUnit->ViewValue, 2, -2, -2, -2);
            $this->SaleUnit->ViewCustomAttributes = "";

            // SalesTaxCode
            $this->SalesTaxCode->ViewValue = $this->SalesTaxCode->CurrentValue;
            $this->SalesTaxCode->ViewValue = FormatNumber($this->SalesTaxCode->ViewValue, 0, -2, -2, -2);
            $this->SalesTaxCode->ViewCustomAttributes = "";

            // StockReceived
            $this->StockReceived->ViewValue = $this->StockReceived->CurrentValue;
            $this->StockReceived->ViewValue = FormatNumber($this->StockReceived->ViewValue, 2, -2, -2, -2);
            $this->StockReceived->ViewCustomAttributes = "";

            // TotalStock
            $this->TotalStock->ViewValue = $this->TotalStock->CurrentValue;
            $this->TotalStock->ViewValue = FormatNumber($this->TotalStock->ViewValue, 2, -2, -2, -2);
            $this->TotalStock->ViewCustomAttributes = "";

            // StockType
            $this->StockType->ViewValue = $this->StockType->CurrentValue;
            $this->StockType->ViewValue = FormatNumber($this->StockType->ViewValue, 0, -2, -2, -2);
            $this->StockType->ViewCustomAttributes = "";

            // StockCheckDate
            $this->StockCheckDate->ViewValue = $this->StockCheckDate->CurrentValue;
            $this->StockCheckDate->ViewValue = FormatDateTime($this->StockCheckDate->ViewValue, 0);
            $this->StockCheckDate->ViewCustomAttributes = "";

            // StockAdjustmentDate
            $this->StockAdjustmentDate->ViewValue = $this->StockAdjustmentDate->CurrentValue;
            $this->StockAdjustmentDate->ViewValue = FormatDateTime($this->StockAdjustmentDate->ViewValue, 0);
            $this->StockAdjustmentDate->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // CostCentre
            $this->CostCentre->ViewValue = $this->CostCentre->CurrentValue;
            $this->CostCentre->ViewValue = FormatNumber($this->CostCentre->ViewValue, 0, -2, -2, -2);
            $this->CostCentre->ViewCustomAttributes = "";

            // ProductType
            $this->ProductType->ViewValue = $this->ProductType->CurrentValue;
            $this->ProductType->ViewValue = FormatNumber($this->ProductType->ViewValue, 0, -2, -2, -2);
            $this->ProductType->ViewCustomAttributes = "";

            // TaxAmount
            $this->TaxAmount->ViewValue = $this->TaxAmount->CurrentValue;
            $this->TaxAmount->ViewValue = FormatNumber($this->TaxAmount->ViewValue, 2, -2, -2, -2);
            $this->TaxAmount->ViewCustomAttributes = "";

            // TaxId
            $this->TaxId->ViewValue = $this->TaxId->CurrentValue;
            $this->TaxId->ViewValue = FormatNumber($this->TaxId->ViewValue, 0, -2, -2, -2);
            $this->TaxId->ViewCustomAttributes = "";

            // ResaleTaxApplicable
            $this->ResaleTaxApplicable->ViewValue = $this->ResaleTaxApplicable->CurrentValue;
            $this->ResaleTaxApplicable->ViewValue = FormatNumber($this->ResaleTaxApplicable->ViewValue, 0, -2, -2, -2);
            $this->ResaleTaxApplicable->ViewCustomAttributes = "";

            // CstOtherTax
            $this->CstOtherTax->ViewValue = $this->CstOtherTax->CurrentValue;
            $this->CstOtherTax->ViewCustomAttributes = "";

            // TotalTax
            $this->TotalTax->ViewValue = $this->TotalTax->CurrentValue;
            $this->TotalTax->ViewValue = FormatNumber($this->TotalTax->ViewValue, 2, -2, -2, -2);
            $this->TotalTax->ViewCustomAttributes = "";

            // ItemCost
            $this->ItemCost->ViewValue = $this->ItemCost->CurrentValue;
            $this->ItemCost->ViewValue = FormatNumber($this->ItemCost->ViewValue, 2, -2, -2, -2);
            $this->ItemCost->ViewCustomAttributes = "";

            // ExpiryDate
            $this->ExpiryDate->ViewValue = $this->ExpiryDate->CurrentValue;
            $this->ExpiryDate->ViewValue = FormatDateTime($this->ExpiryDate->ViewValue, 0);
            $this->ExpiryDate->ViewCustomAttributes = "";

            // BatchDescription
            $this->BatchDescription->ViewValue = $this->BatchDescription->CurrentValue;
            $this->BatchDescription->ViewCustomAttributes = "";

            // FreeScheme
            $this->FreeScheme->ViewValue = $this->FreeScheme->CurrentValue;
            $this->FreeScheme->ViewValue = FormatNumber($this->FreeScheme->ViewValue, 0, -2, -2, -2);
            $this->FreeScheme->ViewCustomAttributes = "";

            // CashDiscountEligibility
            $this->CashDiscountEligibility->ViewValue = $this->CashDiscountEligibility->CurrentValue;
            $this->CashDiscountEligibility->ViewValue = FormatNumber($this->CashDiscountEligibility->ViewValue, 0, -2, -2, -2);
            $this->CashDiscountEligibility->ViewCustomAttributes = "";

            // DiscountPerAllowInBill
            $this->DiscountPerAllowInBill->ViewValue = $this->DiscountPerAllowInBill->CurrentValue;
            $this->DiscountPerAllowInBill->ViewValue = FormatNumber($this->DiscountPerAllowInBill->ViewValue, 2, -2, -2, -2);
            $this->DiscountPerAllowInBill->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // TotalAmount
            $this->TotalAmount->ViewValue = $this->TotalAmount->CurrentValue;
            $this->TotalAmount->ViewValue = FormatNumber($this->TotalAmount->ViewValue, 2, -2, -2, -2);
            $this->TotalAmount->ViewCustomAttributes = "";

            // StandardMargin
            $this->StandardMargin->ViewValue = $this->StandardMargin->CurrentValue;
            $this->StandardMargin->ViewValue = FormatNumber($this->StandardMargin->ViewValue, 2, -2, -2, -2);
            $this->StandardMargin->ViewCustomAttributes = "";

            // Margin
            $this->Margin->ViewValue = $this->Margin->CurrentValue;
            $this->Margin->ViewValue = FormatNumber($this->Margin->ViewValue, 2, -2, -2, -2);
            $this->Margin->ViewCustomAttributes = "";

            // MarginId
            $this->MarginId->ViewValue = $this->MarginId->CurrentValue;
            $this->MarginId->ViewValue = FormatNumber($this->MarginId->ViewValue, 0, -2, -2, -2);
            $this->MarginId->ViewCustomAttributes = "";

            // ExpectedMargin
            $this->ExpectedMargin->ViewValue = $this->ExpectedMargin->CurrentValue;
            $this->ExpectedMargin->ViewValue = FormatNumber($this->ExpectedMargin->ViewValue, 2, -2, -2, -2);
            $this->ExpectedMargin->ViewCustomAttributes = "";

            // SurchargeBeforeTax
            $this->SurchargeBeforeTax->ViewValue = $this->SurchargeBeforeTax->CurrentValue;
            $this->SurchargeBeforeTax->ViewValue = FormatNumber($this->SurchargeBeforeTax->ViewValue, 2, -2, -2, -2);
            $this->SurchargeBeforeTax->ViewCustomAttributes = "";

            // SurchargeAfterTax
            $this->SurchargeAfterTax->ViewValue = $this->SurchargeAfterTax->CurrentValue;
            $this->SurchargeAfterTax->ViewValue = FormatNumber($this->SurchargeAfterTax->ViewValue, 2, -2, -2, -2);
            $this->SurchargeAfterTax->ViewCustomAttributes = "";

            // TempOrderNo
            $this->TempOrderNo->ViewValue = $this->TempOrderNo->CurrentValue;
            $this->TempOrderNo->ViewValue = FormatNumber($this->TempOrderNo->ViewValue, 0, -2, -2, -2);
            $this->TempOrderNo->ViewCustomAttributes = "";

            // TempOrderDate
            $this->TempOrderDate->ViewValue = $this->TempOrderDate->CurrentValue;
            $this->TempOrderDate->ViewValue = FormatDateTime($this->TempOrderDate->ViewValue, 0);
            $this->TempOrderDate->ViewCustomAttributes = "";

            // OrderUnit
            $this->OrderUnit->ViewValue = $this->OrderUnit->CurrentValue;
            $this->OrderUnit->ViewValue = FormatNumber($this->OrderUnit->ViewValue, 2, -2, -2, -2);
            $this->OrderUnit->ViewCustomAttributes = "";

            // OrderQuantity
            $this->OrderQuantity->ViewValue = $this->OrderQuantity->CurrentValue;
            $this->OrderQuantity->ViewValue = FormatNumber($this->OrderQuantity->ViewValue, 2, -2, -2, -2);
            $this->OrderQuantity->ViewCustomAttributes = "";

            // MarkForOrder
            $this->MarkForOrder->ViewValue = $this->MarkForOrder->CurrentValue;
            $this->MarkForOrder->ViewValue = FormatNumber($this->MarkForOrder->ViewValue, 0, -2, -2, -2);
            $this->MarkForOrder->ViewCustomAttributes = "";

            // OrderAllId
            $this->OrderAllId->ViewValue = $this->OrderAllId->CurrentValue;
            $this->OrderAllId->ViewValue = FormatNumber($this->OrderAllId->ViewValue, 0, -2, -2, -2);
            $this->OrderAllId->ViewCustomAttributes = "";

            // CalculateOrderQty
            $this->CalculateOrderQty->ViewValue = $this->CalculateOrderQty->CurrentValue;
            $this->CalculateOrderQty->ViewValue = FormatNumber($this->CalculateOrderQty->ViewValue, 2, -2, -2, -2);
            $this->CalculateOrderQty->ViewCustomAttributes = "";

            // SubLocation
            $this->SubLocation->ViewValue = $this->SubLocation->CurrentValue;
            $this->SubLocation->ViewCustomAttributes = "";

            // CategoryCode
            $this->CategoryCode->ViewValue = $this->CategoryCode->CurrentValue;
            $this->CategoryCode->ViewCustomAttributes = "";

            // SubCategory
            $this->SubCategory->ViewValue = $this->SubCategory->CurrentValue;
            $this->SubCategory->ViewCustomAttributes = "";

            // FlexCategoryCode
            $this->FlexCategoryCode->ViewValue = $this->FlexCategoryCode->CurrentValue;
            $this->FlexCategoryCode->ViewValue = FormatNumber($this->FlexCategoryCode->ViewValue, 0, -2, -2, -2);
            $this->FlexCategoryCode->ViewCustomAttributes = "";

            // ABCSaleQty
            $this->ABCSaleQty->ViewValue = $this->ABCSaleQty->CurrentValue;
            $this->ABCSaleQty->ViewValue = FormatNumber($this->ABCSaleQty->ViewValue, 2, -2, -2, -2);
            $this->ABCSaleQty->ViewCustomAttributes = "";

            // ABCSaleValue
            $this->ABCSaleValue->ViewValue = $this->ABCSaleValue->CurrentValue;
            $this->ABCSaleValue->ViewValue = FormatNumber($this->ABCSaleValue->ViewValue, 2, -2, -2, -2);
            $this->ABCSaleValue->ViewCustomAttributes = "";

            // ConvertionFactor
            $this->ConvertionFactor->ViewValue = $this->ConvertionFactor->CurrentValue;
            $this->ConvertionFactor->ViewValue = FormatNumber($this->ConvertionFactor->ViewValue, 0, -2, -2, -2);
            $this->ConvertionFactor->ViewCustomAttributes = "";

            // ConvertionUnitDesc
            $this->ConvertionUnitDesc->ViewValue = $this->ConvertionUnitDesc->CurrentValue;
            $this->ConvertionUnitDesc->ViewCustomAttributes = "";

            // TransactionId
            $this->TransactionId->ViewValue = $this->TransactionId->CurrentValue;
            $this->TransactionId->ViewValue = FormatNumber($this->TransactionId->ViewValue, 0, -2, -2, -2);
            $this->TransactionId->ViewCustomAttributes = "";

            // SoldProductId
            $this->SoldProductId->ViewValue = $this->SoldProductId->CurrentValue;
            $this->SoldProductId->ViewValue = FormatNumber($this->SoldProductId->ViewValue, 0, -2, -2, -2);
            $this->SoldProductId->ViewCustomAttributes = "";

            // WantedBookId
            $this->WantedBookId->ViewValue = $this->WantedBookId->CurrentValue;
            $this->WantedBookId->ViewValue = FormatNumber($this->WantedBookId->ViewValue, 0, -2, -2, -2);
            $this->WantedBookId->ViewCustomAttributes = "";

            // AllId
            $this->AllId->ViewValue = $this->AllId->CurrentValue;
            $this->AllId->ViewValue = FormatNumber($this->AllId->ViewValue, 0, -2, -2, -2);
            $this->AllId->ViewCustomAttributes = "";

            // BatchAndExpiryCompulsory
            $this->BatchAndExpiryCompulsory->ViewValue = $this->BatchAndExpiryCompulsory->CurrentValue;
            $this->BatchAndExpiryCompulsory->ViewValue = FormatNumber($this->BatchAndExpiryCompulsory->ViewValue, 0, -2, -2, -2);
            $this->BatchAndExpiryCompulsory->ViewCustomAttributes = "";

            // BatchStockForWantedBook
            $this->BatchStockForWantedBook->ViewValue = $this->BatchStockForWantedBook->CurrentValue;
            $this->BatchStockForWantedBook->ViewValue = FormatNumber($this->BatchStockForWantedBook->ViewValue, 0, -2, -2, -2);
            $this->BatchStockForWantedBook->ViewCustomAttributes = "";

            // UnitBasedBilling
            $this->UnitBasedBilling->ViewValue = $this->UnitBasedBilling->CurrentValue;
            $this->UnitBasedBilling->ViewValue = FormatNumber($this->UnitBasedBilling->ViewValue, 0, -2, -2, -2);
            $this->UnitBasedBilling->ViewCustomAttributes = "";

            // DoNotCheckStock
            $this->DoNotCheckStock->ViewValue = $this->DoNotCheckStock->CurrentValue;
            $this->DoNotCheckStock->ViewValue = FormatNumber($this->DoNotCheckStock->ViewValue, 0, -2, -2, -2);
            $this->DoNotCheckStock->ViewCustomAttributes = "";

            // AcceptRate
            $this->AcceptRate->ViewValue = $this->AcceptRate->CurrentValue;
            $this->AcceptRate->ViewValue = FormatNumber($this->AcceptRate->ViewValue, 0, -2, -2, -2);
            $this->AcceptRate->ViewCustomAttributes = "";

            // PriceLevel
            $this->PriceLevel->ViewValue = $this->PriceLevel->CurrentValue;
            $this->PriceLevel->ViewValue = FormatNumber($this->PriceLevel->ViewValue, 0, -2, -2, -2);
            $this->PriceLevel->ViewCustomAttributes = "";

            // LastQuotePrice
            $this->LastQuotePrice->ViewValue = $this->LastQuotePrice->CurrentValue;
            $this->LastQuotePrice->ViewValue = FormatNumber($this->LastQuotePrice->ViewValue, 2, -2, -2, -2);
            $this->LastQuotePrice->ViewCustomAttributes = "";

            // PriceChange
            $this->PriceChange->ViewValue = $this->PriceChange->CurrentValue;
            $this->PriceChange->ViewValue = FormatNumber($this->PriceChange->ViewValue, 2, -2, -2, -2);
            $this->PriceChange->ViewCustomAttributes = "";

            // CommodityCode
            $this->CommodityCode->ViewValue = $this->CommodityCode->CurrentValue;
            $this->CommodityCode->ViewCustomAttributes = "";

            // InstitutePrice
            $this->InstitutePrice->ViewValue = $this->InstitutePrice->CurrentValue;
            $this->InstitutePrice->ViewValue = FormatNumber($this->InstitutePrice->ViewValue, 2, -2, -2, -2);
            $this->InstitutePrice->ViewCustomAttributes = "";

            // CtrlOrDCtrlProduct
            $this->CtrlOrDCtrlProduct->ViewValue = $this->CtrlOrDCtrlProduct->CurrentValue;
            $this->CtrlOrDCtrlProduct->ViewValue = FormatNumber($this->CtrlOrDCtrlProduct->ViewValue, 0, -2, -2, -2);
            $this->CtrlOrDCtrlProduct->ViewCustomAttributes = "";

            // ImportedDate
            $this->ImportedDate->ViewValue = $this->ImportedDate->CurrentValue;
            $this->ImportedDate->ViewValue = FormatDateTime($this->ImportedDate->ViewValue, 0);
            $this->ImportedDate->ViewCustomAttributes = "";

            // IsImported
            $this->IsImported->ViewValue = $this->IsImported->CurrentValue;
            $this->IsImported->ViewValue = FormatNumber($this->IsImported->ViewValue, 0, -2, -2, -2);
            $this->IsImported->ViewCustomAttributes = "";

            // FileName
            $this->FileName->ViewValue = $this->FileName->CurrentValue;
            $this->FileName->ViewCustomAttributes = "";

            // GodownNumber
            $this->GodownNumber->ViewValue = $this->GodownNumber->CurrentValue;
            $this->GodownNumber->ViewValue = FormatNumber($this->GodownNumber->ViewValue, 0, -2, -2, -2);
            $this->GodownNumber->ViewCustomAttributes = "";

            // CreationDate
            $this->CreationDate->ViewValue = $this->CreationDate->CurrentValue;
            $this->CreationDate->ViewValue = FormatDateTime($this->CreationDate->ViewValue, 0);
            $this->CreationDate->ViewCustomAttributes = "";

            // CreatedbyUser
            $this->CreatedbyUser->ViewValue = $this->CreatedbyUser->CurrentValue;
            $this->CreatedbyUser->ViewCustomAttributes = "";

            // ModifiedDate
            $this->ModifiedDate->ViewValue = $this->ModifiedDate->CurrentValue;
            $this->ModifiedDate->ViewValue = FormatDateTime($this->ModifiedDate->ViewValue, 0);
            $this->ModifiedDate->ViewCustomAttributes = "";

            // ModifiedbyUser
            $this->ModifiedbyUser->ViewValue = $this->ModifiedbyUser->CurrentValue;
            $this->ModifiedbyUser->ViewCustomAttributes = "";

            // isActive
            $this->isActive->ViewValue = $this->isActive->CurrentValue;
            $this->isActive->ViewValue = FormatNumber($this->isActive->ViewValue, 0, -2, -2, -2);
            $this->isActive->ViewCustomAttributes = "";

            // AllowExpiryClaim
            $this->AllowExpiryClaim->ViewValue = $this->AllowExpiryClaim->CurrentValue;
            $this->AllowExpiryClaim->ViewValue = FormatNumber($this->AllowExpiryClaim->ViewValue, 0, -2, -2, -2);
            $this->AllowExpiryClaim->ViewCustomAttributes = "";

            // BrandCode
            $this->BrandCode->ViewValue = $this->BrandCode->CurrentValue;
            $this->BrandCode->ViewValue = FormatNumber($this->BrandCode->ViewValue, 0, -2, -2, -2);
            $this->BrandCode->ViewCustomAttributes = "";

            // FreeSchemeBasedon
            $this->FreeSchemeBasedon->ViewValue = $this->FreeSchemeBasedon->CurrentValue;
            $this->FreeSchemeBasedon->ViewValue = FormatNumber($this->FreeSchemeBasedon->ViewValue, 0, -2, -2, -2);
            $this->FreeSchemeBasedon->ViewCustomAttributes = "";

            // DoNotCheckCostInBill
            $this->DoNotCheckCostInBill->ViewValue = $this->DoNotCheckCostInBill->CurrentValue;
            $this->DoNotCheckCostInBill->ViewValue = FormatNumber($this->DoNotCheckCostInBill->ViewValue, 0, -2, -2, -2);
            $this->DoNotCheckCostInBill->ViewCustomAttributes = "";

            // ProductGroupCode
            $this->ProductGroupCode->ViewValue = $this->ProductGroupCode->CurrentValue;
            $this->ProductGroupCode->ViewValue = FormatNumber($this->ProductGroupCode->ViewValue, 0, -2, -2, -2);
            $this->ProductGroupCode->ViewCustomAttributes = "";

            // ProductStrengthCode
            $this->ProductStrengthCode->ViewValue = $this->ProductStrengthCode->CurrentValue;
            $this->ProductStrengthCode->ViewValue = FormatNumber($this->ProductStrengthCode->ViewValue, 0, -2, -2, -2);
            $this->ProductStrengthCode->ViewCustomAttributes = "";

            // PackingCode
            $this->PackingCode->ViewValue = $this->PackingCode->CurrentValue;
            $this->PackingCode->ViewValue = FormatNumber($this->PackingCode->ViewValue, 0, -2, -2, -2);
            $this->PackingCode->ViewCustomAttributes = "";

            // ComputedMinStock
            $this->ComputedMinStock->ViewValue = $this->ComputedMinStock->CurrentValue;
            $this->ComputedMinStock->ViewValue = FormatNumber($this->ComputedMinStock->ViewValue, 2, -2, -2, -2);
            $this->ComputedMinStock->ViewCustomAttributes = "";

            // ComputedMaxStock
            $this->ComputedMaxStock->ViewValue = $this->ComputedMaxStock->CurrentValue;
            $this->ComputedMaxStock->ViewValue = FormatNumber($this->ComputedMaxStock->ViewValue, 2, -2, -2, -2);
            $this->ComputedMaxStock->ViewCustomAttributes = "";

            // ProductRemark
            $this->ProductRemark->ViewValue = $this->ProductRemark->CurrentValue;
            $this->ProductRemark->ViewValue = FormatNumber($this->ProductRemark->ViewValue, 0, -2, -2, -2);
            $this->ProductRemark->ViewCustomAttributes = "";

            // ProductDrugCode
            $this->ProductDrugCode->ViewValue = $this->ProductDrugCode->CurrentValue;
            $this->ProductDrugCode->ViewValue = FormatNumber($this->ProductDrugCode->ViewValue, 0, -2, -2, -2);
            $this->ProductDrugCode->ViewCustomAttributes = "";

            // IsMatrixProduct
            $this->IsMatrixProduct->ViewValue = $this->IsMatrixProduct->CurrentValue;
            $this->IsMatrixProduct->ViewValue = FormatNumber($this->IsMatrixProduct->ViewValue, 0, -2, -2, -2);
            $this->IsMatrixProduct->ViewCustomAttributes = "";

            // AttributeCount1
            $this->AttributeCount1->ViewValue = $this->AttributeCount1->CurrentValue;
            $this->AttributeCount1->ViewValue = FormatNumber($this->AttributeCount1->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount1->ViewCustomAttributes = "";

            // AttributeCount2
            $this->AttributeCount2->ViewValue = $this->AttributeCount2->CurrentValue;
            $this->AttributeCount2->ViewValue = FormatNumber($this->AttributeCount2->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount2->ViewCustomAttributes = "";

            // AttributeCount3
            $this->AttributeCount3->ViewValue = $this->AttributeCount3->CurrentValue;
            $this->AttributeCount3->ViewValue = FormatNumber($this->AttributeCount3->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount3->ViewCustomAttributes = "";

            // AttributeCount4
            $this->AttributeCount4->ViewValue = $this->AttributeCount4->CurrentValue;
            $this->AttributeCount4->ViewValue = FormatNumber($this->AttributeCount4->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount4->ViewCustomAttributes = "";

            // AttributeCount5
            $this->AttributeCount5->ViewValue = $this->AttributeCount5->CurrentValue;
            $this->AttributeCount5->ViewValue = FormatNumber($this->AttributeCount5->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount5->ViewCustomAttributes = "";

            // DefaultDiscountPercentage
            $this->DefaultDiscountPercentage->ViewValue = $this->DefaultDiscountPercentage->CurrentValue;
            $this->DefaultDiscountPercentage->ViewValue = FormatNumber($this->DefaultDiscountPercentage->ViewValue, 2, -2, -2, -2);
            $this->DefaultDiscountPercentage->ViewCustomAttributes = "";

            // DonotPrintBarcode
            $this->DonotPrintBarcode->ViewValue = $this->DonotPrintBarcode->CurrentValue;
            $this->DonotPrintBarcode->ViewValue = FormatNumber($this->DonotPrintBarcode->ViewValue, 0, -2, -2, -2);
            $this->DonotPrintBarcode->ViewCustomAttributes = "";

            // ProductLevelDiscount
            $this->ProductLevelDiscount->ViewValue = $this->ProductLevelDiscount->CurrentValue;
            $this->ProductLevelDiscount->ViewValue = FormatNumber($this->ProductLevelDiscount->ViewValue, 0, -2, -2, -2);
            $this->ProductLevelDiscount->ViewCustomAttributes = "";

            // Markup
            $this->Markup->ViewValue = $this->Markup->CurrentValue;
            $this->Markup->ViewValue = FormatNumber($this->Markup->ViewValue, 2, -2, -2, -2);
            $this->Markup->ViewCustomAttributes = "";

            // MarkDown
            $this->MarkDown->ViewValue = $this->MarkDown->CurrentValue;
            $this->MarkDown->ViewValue = FormatNumber($this->MarkDown->ViewValue, 2, -2, -2, -2);
            $this->MarkDown->ViewCustomAttributes = "";

            // ReworkSalePrice
            $this->ReworkSalePrice->ViewValue = $this->ReworkSalePrice->CurrentValue;
            $this->ReworkSalePrice->ViewValue = FormatNumber($this->ReworkSalePrice->ViewValue, 0, -2, -2, -2);
            $this->ReworkSalePrice->ViewCustomAttributes = "";

            // MultipleInput
            $this->MultipleInput->ViewValue = $this->MultipleInput->CurrentValue;
            $this->MultipleInput->ViewValue = FormatNumber($this->MultipleInput->ViewValue, 0, -2, -2, -2);
            $this->MultipleInput->ViewCustomAttributes = "";

            // LpPackageInformation
            $this->LpPackageInformation->ViewValue = $this->LpPackageInformation->CurrentValue;
            $this->LpPackageInformation->ViewCustomAttributes = "";

            // AllowNegativeStock
            $this->AllowNegativeStock->ViewValue = $this->AllowNegativeStock->CurrentValue;
            $this->AllowNegativeStock->ViewValue = FormatNumber($this->AllowNegativeStock->ViewValue, 0, -2, -2, -2);
            $this->AllowNegativeStock->ViewCustomAttributes = "";

            // OrderDate
            $this->OrderDate->ViewValue = $this->OrderDate->CurrentValue;
            $this->OrderDate->ViewValue = FormatDateTime($this->OrderDate->ViewValue, 0);
            $this->OrderDate->ViewCustomAttributes = "";

            // OrderTime
            $this->OrderTime->ViewValue = $this->OrderTime->CurrentValue;
            $this->OrderTime->ViewValue = FormatDateTime($this->OrderTime->ViewValue, 0);
            $this->OrderTime->ViewCustomAttributes = "";

            // RateGroupCode
            $this->RateGroupCode->ViewValue = $this->RateGroupCode->CurrentValue;
            $this->RateGroupCode->ViewValue = FormatNumber($this->RateGroupCode->ViewValue, 0, -2, -2, -2);
            $this->RateGroupCode->ViewCustomAttributes = "";

            // ConversionCaseLot
            $this->ConversionCaseLot->ViewValue = $this->ConversionCaseLot->CurrentValue;
            $this->ConversionCaseLot->ViewValue = FormatNumber($this->ConversionCaseLot->ViewValue, 0, -2, -2, -2);
            $this->ConversionCaseLot->ViewCustomAttributes = "";

            // ShippingLot
            $this->ShippingLot->ViewValue = $this->ShippingLot->CurrentValue;
            $this->ShippingLot->ViewCustomAttributes = "";

            // AllowExpiryReplacement
            $this->AllowExpiryReplacement->ViewValue = $this->AllowExpiryReplacement->CurrentValue;
            $this->AllowExpiryReplacement->ViewValue = FormatNumber($this->AllowExpiryReplacement->ViewValue, 0, -2, -2, -2);
            $this->AllowExpiryReplacement->ViewCustomAttributes = "";

            // NoOfMonthExpiryAllowed
            $this->NoOfMonthExpiryAllowed->ViewValue = $this->NoOfMonthExpiryAllowed->CurrentValue;
            $this->NoOfMonthExpiryAllowed->ViewValue = FormatNumber($this->NoOfMonthExpiryAllowed->ViewValue, 0, -2, -2, -2);
            $this->NoOfMonthExpiryAllowed->ViewCustomAttributes = "";

            // ProductDiscountEligibility
            $this->ProductDiscountEligibility->ViewValue = $this->ProductDiscountEligibility->CurrentValue;
            $this->ProductDiscountEligibility->ViewValue = FormatNumber($this->ProductDiscountEligibility->ViewValue, 0, -2, -2, -2);
            $this->ProductDiscountEligibility->ViewCustomAttributes = "";

            // ScheduleTypeCode
            $this->ScheduleTypeCode->ViewValue = $this->ScheduleTypeCode->CurrentValue;
            $this->ScheduleTypeCode->ViewValue = FormatNumber($this->ScheduleTypeCode->ViewValue, 0, -2, -2, -2);
            $this->ScheduleTypeCode->ViewCustomAttributes = "";

            // AIOCDProductCode
            $this->AIOCDProductCode->ViewValue = $this->AIOCDProductCode->CurrentValue;
            $this->AIOCDProductCode->ViewCustomAttributes = "";

            // FreeQuantity
            $this->FreeQuantity->ViewValue = $this->FreeQuantity->CurrentValue;
            $this->FreeQuantity->ViewValue = FormatNumber($this->FreeQuantity->ViewValue, 2, -2, -2, -2);
            $this->FreeQuantity->ViewCustomAttributes = "";

            // DiscountType
            $this->DiscountType->ViewValue = $this->DiscountType->CurrentValue;
            $this->DiscountType->ViewValue = FormatNumber($this->DiscountType->ViewValue, 0, -2, -2, -2);
            $this->DiscountType->ViewCustomAttributes = "";

            // DiscountValue
            $this->DiscountValue->ViewValue = $this->DiscountValue->CurrentValue;
            $this->DiscountValue->ViewValue = FormatNumber($this->DiscountValue->ViewValue, 2, -2, -2, -2);
            $this->DiscountValue->ViewCustomAttributes = "";

            // HasProductOrderAttribute
            $this->HasProductOrderAttribute->ViewValue = $this->HasProductOrderAttribute->CurrentValue;
            $this->HasProductOrderAttribute->ViewValue = FormatNumber($this->HasProductOrderAttribute->ViewValue, 0, -2, -2, -2);
            $this->HasProductOrderAttribute->ViewCustomAttributes = "";

            // FirstPODate
            $this->FirstPODate->ViewValue = $this->FirstPODate->CurrentValue;
            $this->FirstPODate->ViewValue = FormatDateTime($this->FirstPODate->ViewValue, 0);
            $this->FirstPODate->ViewCustomAttributes = "";

            // SaleprcieAndMrpCalcPercent
            $this->SaleprcieAndMrpCalcPercent->ViewValue = $this->SaleprcieAndMrpCalcPercent->CurrentValue;
            $this->SaleprcieAndMrpCalcPercent->ViewValue = FormatNumber($this->SaleprcieAndMrpCalcPercent->ViewValue, 2, -2, -2, -2);
            $this->SaleprcieAndMrpCalcPercent->ViewCustomAttributes = "";

            // IsGiftVoucherProducts
            $this->IsGiftVoucherProducts->ViewValue = $this->IsGiftVoucherProducts->CurrentValue;
            $this->IsGiftVoucherProducts->ViewValue = FormatNumber($this->IsGiftVoucherProducts->ViewValue, 0, -2, -2, -2);
            $this->IsGiftVoucherProducts->ViewCustomAttributes = "";

            // AcceptRange4SerialNumber
            $this->AcceptRange4SerialNumber->ViewValue = $this->AcceptRange4SerialNumber->CurrentValue;
            $this->AcceptRange4SerialNumber->ViewValue = FormatNumber($this->AcceptRange4SerialNumber->ViewValue, 0, -2, -2, -2);
            $this->AcceptRange4SerialNumber->ViewCustomAttributes = "";

            // GiftVoucherDenomination
            $this->GiftVoucherDenomination->ViewValue = $this->GiftVoucherDenomination->CurrentValue;
            $this->GiftVoucherDenomination->ViewValue = FormatNumber($this->GiftVoucherDenomination->ViewValue, 0, -2, -2, -2);
            $this->GiftVoucherDenomination->ViewCustomAttributes = "";

            // Subclasscode
            $this->Subclasscode->ViewValue = $this->Subclasscode->CurrentValue;
            $this->Subclasscode->ViewCustomAttributes = "";

            // BarCodeFromWeighingMachine
            $this->BarCodeFromWeighingMachine->ViewValue = $this->BarCodeFromWeighingMachine->CurrentValue;
            $this->BarCodeFromWeighingMachine->ViewValue = FormatNumber($this->BarCodeFromWeighingMachine->ViewValue, 0, -2, -2, -2);
            $this->BarCodeFromWeighingMachine->ViewCustomAttributes = "";

            // CheckCostInReturn
            $this->CheckCostInReturn->ViewValue = $this->CheckCostInReturn->CurrentValue;
            $this->CheckCostInReturn->ViewValue = FormatNumber($this->CheckCostInReturn->ViewValue, 0, -2, -2, -2);
            $this->CheckCostInReturn->ViewCustomAttributes = "";

            // FrequentSaleProduct
            $this->FrequentSaleProduct->ViewValue = $this->FrequentSaleProduct->CurrentValue;
            $this->FrequentSaleProduct->ViewValue = FormatNumber($this->FrequentSaleProduct->ViewValue, 0, -2, -2, -2);
            $this->FrequentSaleProduct->ViewCustomAttributes = "";

            // RateType
            $this->RateType->ViewValue = $this->RateType->CurrentValue;
            $this->RateType->ViewValue = FormatNumber($this->RateType->ViewValue, 0, -2, -2, -2);
            $this->RateType->ViewCustomAttributes = "";

            // TouchscreenName
            $this->TouchscreenName->ViewValue = $this->TouchscreenName->CurrentValue;
            $this->TouchscreenName->ViewCustomAttributes = "";

            // FreeType
            $this->FreeType->ViewValue = $this->FreeType->CurrentValue;
            $this->FreeType->ViewValue = FormatNumber($this->FreeType->ViewValue, 0, -2, -2, -2);
            $this->FreeType->ViewCustomAttributes = "";

            // LooseQtyasNewBatch
            $this->LooseQtyasNewBatch->ViewValue = $this->LooseQtyasNewBatch->CurrentValue;
            $this->LooseQtyasNewBatch->ViewValue = FormatNumber($this->LooseQtyasNewBatch->ViewValue, 0, -2, -2, -2);
            $this->LooseQtyasNewBatch->ViewCustomAttributes = "";

            // AllowSlabBilling
            $this->AllowSlabBilling->ViewValue = $this->AllowSlabBilling->CurrentValue;
            $this->AllowSlabBilling->ViewValue = FormatNumber($this->AllowSlabBilling->ViewValue, 0, -2, -2, -2);
            $this->AllowSlabBilling->ViewCustomAttributes = "";

            // ProductTypeForProduction
            $this->ProductTypeForProduction->ViewValue = $this->ProductTypeForProduction->CurrentValue;
            $this->ProductTypeForProduction->ViewValue = FormatNumber($this->ProductTypeForProduction->ViewValue, 0, -2, -2, -2);
            $this->ProductTypeForProduction->ViewCustomAttributes = "";

            // RecipeCode
            $this->RecipeCode->ViewValue = $this->RecipeCode->CurrentValue;
            $this->RecipeCode->ViewValue = FormatNumber($this->RecipeCode->ViewValue, 0, -2, -2, -2);
            $this->RecipeCode->ViewCustomAttributes = "";

            // DefaultUnitType
            $this->DefaultUnitType->ViewValue = $this->DefaultUnitType->CurrentValue;
            $this->DefaultUnitType->ViewValue = FormatNumber($this->DefaultUnitType->ViewValue, 0, -2, -2, -2);
            $this->DefaultUnitType->ViewCustomAttributes = "";

            // PIstatus
            $this->PIstatus->ViewValue = $this->PIstatus->CurrentValue;
            $this->PIstatus->ViewValue = FormatNumber($this->PIstatus->ViewValue, 0, -2, -2, -2);
            $this->PIstatus->ViewCustomAttributes = "";

            // LastPiConfirmedDate
            $this->LastPiConfirmedDate->ViewValue = $this->LastPiConfirmedDate->CurrentValue;
            $this->LastPiConfirmedDate->ViewValue = FormatDateTime($this->LastPiConfirmedDate->ViewValue, 0);
            $this->LastPiConfirmedDate->ViewCustomAttributes = "";

            // BarCodeDesign
            $this->BarCodeDesign->ViewValue = $this->BarCodeDesign->CurrentValue;
            $this->BarCodeDesign->ViewCustomAttributes = "";

            // AcceptRemarksInBill
            $this->AcceptRemarksInBill->ViewValue = $this->AcceptRemarksInBill->CurrentValue;
            $this->AcceptRemarksInBill->ViewValue = FormatNumber($this->AcceptRemarksInBill->ViewValue, 0, -2, -2, -2);
            $this->AcceptRemarksInBill->ViewCustomAttributes = "";

            // Classification
            $this->Classification->ViewValue = $this->Classification->CurrentValue;
            $this->Classification->ViewValue = FormatNumber($this->Classification->ViewValue, 0, -2, -2, -2);
            $this->Classification->ViewCustomAttributes = "";

            // TimeSlot
            $this->TimeSlot->ViewValue = $this->TimeSlot->CurrentValue;
            $this->TimeSlot->ViewValue = FormatNumber($this->TimeSlot->ViewValue, 0, -2, -2, -2);
            $this->TimeSlot->ViewCustomAttributes = "";

            // IsBundle
            $this->IsBundle->ViewValue = $this->IsBundle->CurrentValue;
            $this->IsBundle->ViewValue = FormatNumber($this->IsBundle->ViewValue, 0, -2, -2, -2);
            $this->IsBundle->ViewCustomAttributes = "";

            // ColorCode
            $this->ColorCode->ViewValue = $this->ColorCode->CurrentValue;
            $this->ColorCode->ViewValue = FormatNumber($this->ColorCode->ViewValue, 0, -2, -2, -2);
            $this->ColorCode->ViewCustomAttributes = "";

            // GenderCode
            $this->GenderCode->ViewValue = $this->GenderCode->CurrentValue;
            $this->GenderCode->ViewValue = FormatNumber($this->GenderCode->ViewValue, 0, -2, -2, -2);
            $this->GenderCode->ViewCustomAttributes = "";

            // SizeCode
            $this->SizeCode->ViewValue = $this->SizeCode->CurrentValue;
            $this->SizeCode->ViewValue = FormatNumber($this->SizeCode->ViewValue, 0, -2, -2, -2);
            $this->SizeCode->ViewCustomAttributes = "";

            // GiftCard
            $this->GiftCard->ViewValue = $this->GiftCard->CurrentValue;
            $this->GiftCard->ViewValue = FormatNumber($this->GiftCard->ViewValue, 0, -2, -2, -2);
            $this->GiftCard->ViewCustomAttributes = "";

            // ToonLabel
            $this->ToonLabel->ViewValue = $this->ToonLabel->CurrentValue;
            $this->ToonLabel->ViewValue = FormatNumber($this->ToonLabel->ViewValue, 0, -2, -2, -2);
            $this->ToonLabel->ViewCustomAttributes = "";

            // GarmentType
            $this->GarmentType->ViewValue = $this->GarmentType->CurrentValue;
            $this->GarmentType->ViewValue = FormatNumber($this->GarmentType->ViewValue, 0, -2, -2, -2);
            $this->GarmentType->ViewCustomAttributes = "";

            // AgeGroup
            $this->AgeGroup->ViewValue = $this->AgeGroup->CurrentValue;
            $this->AgeGroup->ViewValue = FormatNumber($this->AgeGroup->ViewValue, 0, -2, -2, -2);
            $this->AgeGroup->ViewCustomAttributes = "";

            // Season
            $this->Season->ViewValue = $this->Season->CurrentValue;
            $this->Season->ViewValue = FormatNumber($this->Season->ViewValue, 0, -2, -2, -2);
            $this->Season->ViewCustomAttributes = "";

            // DailyStockEntry
            $this->DailyStockEntry->ViewValue = $this->DailyStockEntry->CurrentValue;
            $this->DailyStockEntry->ViewValue = FormatNumber($this->DailyStockEntry->ViewValue, 0, -2, -2, -2);
            $this->DailyStockEntry->ViewCustomAttributes = "";

            // ModifierApplicable
            $this->ModifierApplicable->ViewValue = $this->ModifierApplicable->CurrentValue;
            $this->ModifierApplicable->ViewValue = FormatNumber($this->ModifierApplicable->ViewValue, 0, -2, -2, -2);
            $this->ModifierApplicable->ViewCustomAttributes = "";

            // ModifierType
            $this->ModifierType->ViewValue = $this->ModifierType->CurrentValue;
            $this->ModifierType->ViewValue = FormatNumber($this->ModifierType->ViewValue, 0, -2, -2, -2);
            $this->ModifierType->ViewCustomAttributes = "";

            // AcceptZeroRate
            $this->AcceptZeroRate->ViewValue = $this->AcceptZeroRate->CurrentValue;
            $this->AcceptZeroRate->ViewValue = FormatNumber($this->AcceptZeroRate->ViewValue, 0, -2, -2, -2);
            $this->AcceptZeroRate->ViewCustomAttributes = "";

            // ExciseDutyCode
            $this->ExciseDutyCode->ViewValue = $this->ExciseDutyCode->CurrentValue;
            $this->ExciseDutyCode->ViewValue = FormatNumber($this->ExciseDutyCode->ViewValue, 0, -2, -2, -2);
            $this->ExciseDutyCode->ViewCustomAttributes = "";

            // IndentProductGroupCode
            $this->IndentProductGroupCode->ViewValue = $this->IndentProductGroupCode->CurrentValue;
            $this->IndentProductGroupCode->ViewValue = FormatNumber($this->IndentProductGroupCode->ViewValue, 0, -2, -2, -2);
            $this->IndentProductGroupCode->ViewCustomAttributes = "";

            // IsMultiBatch
            $this->IsMultiBatch->ViewValue = $this->IsMultiBatch->CurrentValue;
            $this->IsMultiBatch->ViewValue = FormatNumber($this->IsMultiBatch->ViewValue, 0, -2, -2, -2);
            $this->IsMultiBatch->ViewCustomAttributes = "";

            // IsSingleBatch
            $this->IsSingleBatch->ViewValue = $this->IsSingleBatch->CurrentValue;
            $this->IsSingleBatch->ViewValue = FormatNumber($this->IsSingleBatch->ViewValue, 0, -2, -2, -2);
            $this->IsSingleBatch->ViewCustomAttributes = "";

            // MarkUpRate1
            $this->MarkUpRate1->ViewValue = $this->MarkUpRate1->CurrentValue;
            $this->MarkUpRate1->ViewValue = FormatNumber($this->MarkUpRate1->ViewValue, 2, -2, -2, -2);
            $this->MarkUpRate1->ViewCustomAttributes = "";

            // MarkDownRate1
            $this->MarkDownRate1->ViewValue = $this->MarkDownRate1->CurrentValue;
            $this->MarkDownRate1->ViewValue = FormatNumber($this->MarkDownRate1->ViewValue, 2, -2, -2, -2);
            $this->MarkDownRate1->ViewCustomAttributes = "";

            // MarkUpRate2
            $this->MarkUpRate2->ViewValue = $this->MarkUpRate2->CurrentValue;
            $this->MarkUpRate2->ViewValue = FormatNumber($this->MarkUpRate2->ViewValue, 2, -2, -2, -2);
            $this->MarkUpRate2->ViewCustomAttributes = "";

            // MarkDownRate2
            $this->MarkDownRate2->ViewValue = $this->MarkDownRate2->CurrentValue;
            $this->MarkDownRate2->ViewValue = FormatNumber($this->MarkDownRate2->ViewValue, 2, -2, -2, -2);
            $this->MarkDownRate2->ViewCustomAttributes = "";

            // Yield
            $this->_Yield->ViewValue = $this->_Yield->CurrentValue;
            $this->_Yield->ViewValue = FormatNumber($this->_Yield->ViewValue, 2, -2, -2, -2);
            $this->_Yield->ViewCustomAttributes = "";

            // RefProductCode
            $this->RefProductCode->ViewValue = $this->RefProductCode->CurrentValue;
            $this->RefProductCode->ViewValue = FormatNumber($this->RefProductCode->ViewValue, 0, -2, -2, -2);
            $this->RefProductCode->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
            $this->Volume->ViewCustomAttributes = "";

            // MeasurementID
            $this->MeasurementID->ViewValue = $this->MeasurementID->CurrentValue;
            $this->MeasurementID->ViewValue = FormatNumber($this->MeasurementID->ViewValue, 0, -2, -2, -2);
            $this->MeasurementID->ViewCustomAttributes = "";

            // CountryCode
            $this->CountryCode->ViewValue = $this->CountryCode->CurrentValue;
            $this->CountryCode->ViewValue = FormatNumber($this->CountryCode->ViewValue, 0, -2, -2, -2);
            $this->CountryCode->ViewCustomAttributes = "";

            // AcceptWMQty
            $this->AcceptWMQty->ViewValue = $this->AcceptWMQty->CurrentValue;
            $this->AcceptWMQty->ViewValue = FormatNumber($this->AcceptWMQty->ViewValue, 0, -2, -2, -2);
            $this->AcceptWMQty->ViewCustomAttributes = "";

            // SingleBatchBasedOnRate
            $this->SingleBatchBasedOnRate->ViewValue = $this->SingleBatchBasedOnRate->CurrentValue;
            $this->SingleBatchBasedOnRate->ViewValue = FormatNumber($this->SingleBatchBasedOnRate->ViewValue, 0, -2, -2, -2);
            $this->SingleBatchBasedOnRate->ViewCustomAttributes = "";

            // TenderNo
            $this->TenderNo->ViewValue = $this->TenderNo->CurrentValue;
            $this->TenderNo->ViewCustomAttributes = "";

            // SingleBillMaximumSoldQtyFiled
            $this->SingleBillMaximumSoldQtyFiled->ViewValue = $this->SingleBillMaximumSoldQtyFiled->CurrentValue;
            $this->SingleBillMaximumSoldQtyFiled->ViewValue = FormatNumber($this->SingleBillMaximumSoldQtyFiled->ViewValue, 2, -2, -2, -2);
            $this->SingleBillMaximumSoldQtyFiled->ViewCustomAttributes = "";

            // Strength1
            $this->Strength1->ViewValue = $this->Strength1->CurrentValue;
            $this->Strength1->ViewCustomAttributes = "";

            // Strength2
            $this->Strength2->ViewValue = $this->Strength2->CurrentValue;
            $this->Strength2->ViewCustomAttributes = "";

            // Strength3
            $this->Strength3->ViewValue = $this->Strength3->CurrentValue;
            $this->Strength3->ViewCustomAttributes = "";

            // Strength4
            $this->Strength4->ViewValue = $this->Strength4->CurrentValue;
            $this->Strength4->ViewCustomAttributes = "";

            // Strength5
            $this->Strength5->ViewValue = $this->Strength5->CurrentValue;
            $this->Strength5->ViewCustomAttributes = "";

            // IngredientCode1
            $this->IngredientCode1->ViewValue = $this->IngredientCode1->CurrentValue;
            $this->IngredientCode1->ViewValue = FormatNumber($this->IngredientCode1->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode1->ViewCustomAttributes = "";

            // IngredientCode2
            $this->IngredientCode2->ViewValue = $this->IngredientCode2->CurrentValue;
            $this->IngredientCode2->ViewValue = FormatNumber($this->IngredientCode2->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode2->ViewCustomAttributes = "";

            // IngredientCode3
            $this->IngredientCode3->ViewValue = $this->IngredientCode3->CurrentValue;
            $this->IngredientCode3->ViewValue = FormatNumber($this->IngredientCode3->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode3->ViewCustomAttributes = "";

            // IngredientCode4
            $this->IngredientCode4->ViewValue = $this->IngredientCode4->CurrentValue;
            $this->IngredientCode4->ViewValue = FormatNumber($this->IngredientCode4->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode4->ViewCustomAttributes = "";

            // IngredientCode5
            $this->IngredientCode5->ViewValue = $this->IngredientCode5->CurrentValue;
            $this->IngredientCode5->ViewValue = FormatNumber($this->IngredientCode5->ViewValue, 0, -2, -2, -2);
            $this->IngredientCode5->ViewCustomAttributes = "";

            // OrderType
            $this->OrderType->ViewValue = $this->OrderType->CurrentValue;
            $this->OrderType->ViewValue = FormatNumber($this->OrderType->ViewValue, 0, -2, -2, -2);
            $this->OrderType->ViewCustomAttributes = "";

            // StockUOM
            $this->StockUOM->ViewValue = $this->StockUOM->CurrentValue;
            $this->StockUOM->ViewValue = FormatNumber($this->StockUOM->ViewValue, 0, -2, -2, -2);
            $this->StockUOM->ViewCustomAttributes = "";

            // PriceUOM
            $this->PriceUOM->ViewValue = $this->PriceUOM->CurrentValue;
            $this->PriceUOM->ViewValue = FormatNumber($this->PriceUOM->ViewValue, 0, -2, -2, -2);
            $this->PriceUOM->ViewCustomAttributes = "";

            // DefaultSaleUOM
            $this->DefaultSaleUOM->ViewValue = $this->DefaultSaleUOM->CurrentValue;
            $this->DefaultSaleUOM->ViewValue = FormatNumber($this->DefaultSaleUOM->ViewValue, 0, -2, -2, -2);
            $this->DefaultSaleUOM->ViewCustomAttributes = "";

            // DefaultPurchaseUOM
            $this->DefaultPurchaseUOM->ViewValue = $this->DefaultPurchaseUOM->CurrentValue;
            $this->DefaultPurchaseUOM->ViewValue = FormatNumber($this->DefaultPurchaseUOM->ViewValue, 0, -2, -2, -2);
            $this->DefaultPurchaseUOM->ViewCustomAttributes = "";

            // ReportingUOM
            $this->ReportingUOM->ViewValue = $this->ReportingUOM->CurrentValue;
            $this->ReportingUOM->ViewValue = FormatNumber($this->ReportingUOM->ViewValue, 0, -2, -2, -2);
            $this->ReportingUOM->ViewCustomAttributes = "";

            // LastPurchasedUOM
            $this->LastPurchasedUOM->ViewValue = $this->LastPurchasedUOM->CurrentValue;
            $this->LastPurchasedUOM->ViewValue = FormatNumber($this->LastPurchasedUOM->ViewValue, 0, -2, -2, -2);
            $this->LastPurchasedUOM->ViewCustomAttributes = "";

            // TreatmentCodes
            $this->TreatmentCodes->ViewValue = $this->TreatmentCodes->CurrentValue;
            $this->TreatmentCodes->ViewCustomAttributes = "";

            // InsuranceType
            $this->InsuranceType->ViewValue = $this->InsuranceType->CurrentValue;
            $this->InsuranceType->ViewValue = FormatNumber($this->InsuranceType->ViewValue, 0, -2, -2, -2);
            $this->InsuranceType->ViewCustomAttributes = "";

            // CoverageGroupCodes
            $this->CoverageGroupCodes->ViewValue = $this->CoverageGroupCodes->CurrentValue;
            $this->CoverageGroupCodes->ViewCustomAttributes = "";

            // MultipleUOM
            $this->MultipleUOM->ViewValue = $this->MultipleUOM->CurrentValue;
            $this->MultipleUOM->ViewValue = FormatNumber($this->MultipleUOM->ViewValue, 0, -2, -2, -2);
            $this->MultipleUOM->ViewCustomAttributes = "";

            // SalePriceComputation
            $this->SalePriceComputation->ViewValue = $this->SalePriceComputation->CurrentValue;
            $this->SalePriceComputation->ViewValue = FormatNumber($this->SalePriceComputation->ViewValue, 0, -2, -2, -2);
            $this->SalePriceComputation->ViewCustomAttributes = "";

            // StockCorrection
            $this->StockCorrection->ViewValue = $this->StockCorrection->CurrentValue;
            $this->StockCorrection->ViewValue = FormatNumber($this->StockCorrection->ViewValue, 0, -2, -2, -2);
            $this->StockCorrection->ViewCustomAttributes = "";

            // LBTPercentage
            $this->LBTPercentage->ViewValue = $this->LBTPercentage->CurrentValue;
            $this->LBTPercentage->ViewValue = FormatNumber($this->LBTPercentage->ViewValue, 2, -2, -2, -2);
            $this->LBTPercentage->ViewCustomAttributes = "";

            // SalesCommission
            $this->SalesCommission->ViewValue = $this->SalesCommission->CurrentValue;
            $this->SalesCommission->ViewValue = FormatNumber($this->SalesCommission->ViewValue, 2, -2, -2, -2);
            $this->SalesCommission->ViewCustomAttributes = "";

            // LockedStock
            $this->LockedStock->ViewValue = $this->LockedStock->CurrentValue;
            $this->LockedStock->ViewValue = FormatNumber($this->LockedStock->ViewValue, 2, -2, -2, -2);
            $this->LockedStock->ViewCustomAttributes = "";

            // MinMaxUOM
            $this->MinMaxUOM->ViewValue = $this->MinMaxUOM->CurrentValue;
            $this->MinMaxUOM->ViewValue = FormatNumber($this->MinMaxUOM->ViewValue, 0, -2, -2, -2);
            $this->MinMaxUOM->ViewCustomAttributes = "";

            // ExpiryMfrDateFormat
            $this->ExpiryMfrDateFormat->ViewValue = $this->ExpiryMfrDateFormat->CurrentValue;
            $this->ExpiryMfrDateFormat->ViewValue = FormatNumber($this->ExpiryMfrDateFormat->ViewValue, 0, -2, -2, -2);
            $this->ExpiryMfrDateFormat->ViewCustomAttributes = "";

            // ProductLifeTime
            $this->ProductLifeTime->ViewValue = $this->ProductLifeTime->CurrentValue;
            $this->ProductLifeTime->ViewValue = FormatNumber($this->ProductLifeTime->ViewValue, 0, -2, -2, -2);
            $this->ProductLifeTime->ViewCustomAttributes = "";

            // IsCombo
            $this->IsCombo->ViewValue = $this->IsCombo->CurrentValue;
            $this->IsCombo->ViewValue = FormatNumber($this->IsCombo->ViewValue, 0, -2, -2, -2);
            $this->IsCombo->ViewCustomAttributes = "";

            // ComboTypeCode
            $this->ComboTypeCode->ViewValue = $this->ComboTypeCode->CurrentValue;
            $this->ComboTypeCode->ViewValue = FormatNumber($this->ComboTypeCode->ViewValue, 0, -2, -2, -2);
            $this->ComboTypeCode->ViewCustomAttributes = "";

            // AttributeCount6
            $this->AttributeCount6->ViewValue = $this->AttributeCount6->CurrentValue;
            $this->AttributeCount6->ViewValue = FormatNumber($this->AttributeCount6->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount6->ViewCustomAttributes = "";

            // AttributeCount7
            $this->AttributeCount7->ViewValue = $this->AttributeCount7->CurrentValue;
            $this->AttributeCount7->ViewValue = FormatNumber($this->AttributeCount7->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount7->ViewCustomAttributes = "";

            // AttributeCount8
            $this->AttributeCount8->ViewValue = $this->AttributeCount8->CurrentValue;
            $this->AttributeCount8->ViewValue = FormatNumber($this->AttributeCount8->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount8->ViewCustomAttributes = "";

            // AttributeCount9
            $this->AttributeCount9->ViewValue = $this->AttributeCount9->CurrentValue;
            $this->AttributeCount9->ViewValue = FormatNumber($this->AttributeCount9->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount9->ViewCustomAttributes = "";

            // AttributeCount10
            $this->AttributeCount10->ViewValue = $this->AttributeCount10->CurrentValue;
            $this->AttributeCount10->ViewValue = FormatNumber($this->AttributeCount10->ViewValue, 0, -2, -2, -2);
            $this->AttributeCount10->ViewCustomAttributes = "";

            // LabourCharge
            $this->LabourCharge->ViewValue = $this->LabourCharge->CurrentValue;
            $this->LabourCharge->ViewValue = FormatNumber($this->LabourCharge->ViewValue, 2, -2, -2, -2);
            $this->LabourCharge->ViewCustomAttributes = "";

            // AffectOtherCharge
            $this->AffectOtherCharge->ViewValue = $this->AffectOtherCharge->CurrentValue;
            $this->AffectOtherCharge->ViewValue = FormatNumber($this->AffectOtherCharge->ViewValue, 0, -2, -2, -2);
            $this->AffectOtherCharge->ViewCustomAttributes = "";

            // DosageInfo
            $this->DosageInfo->ViewValue = $this->DosageInfo->CurrentValue;
            $this->DosageInfo->ViewCustomAttributes = "";

            // DosageType
            $this->DosageType->ViewValue = $this->DosageType->CurrentValue;
            $this->DosageType->ViewValue = FormatNumber($this->DosageType->ViewValue, 0, -2, -2, -2);
            $this->DosageType->ViewCustomAttributes = "";

            // DefaultIndentUOM
            $this->DefaultIndentUOM->ViewValue = $this->DefaultIndentUOM->CurrentValue;
            $this->DefaultIndentUOM->ViewValue = FormatNumber($this->DefaultIndentUOM->ViewValue, 0, -2, -2, -2);
            $this->DefaultIndentUOM->ViewCustomAttributes = "";

            // PromoTag
            $this->PromoTag->ViewValue = $this->PromoTag->CurrentValue;
            $this->PromoTag->ViewValue = FormatNumber($this->PromoTag->ViewValue, 0, -2, -2, -2);
            $this->PromoTag->ViewCustomAttributes = "";

            // BillLevelPromoTag
            $this->BillLevelPromoTag->ViewValue = $this->BillLevelPromoTag->CurrentValue;
            $this->BillLevelPromoTag->ViewValue = FormatNumber($this->BillLevelPromoTag->ViewValue, 0, -2, -2, -2);
            $this->BillLevelPromoTag->ViewCustomAttributes = "";

            // IsMRPProduct
            $this->IsMRPProduct->ViewValue = $this->IsMRPProduct->CurrentValue;
            $this->IsMRPProduct->ViewValue = FormatNumber($this->IsMRPProduct->ViewValue, 0, -2, -2, -2);
            $this->IsMRPProduct->ViewCustomAttributes = "";

            // AlternateSaleUOM
            $this->AlternateSaleUOM->ViewValue = $this->AlternateSaleUOM->CurrentValue;
            $this->AlternateSaleUOM->ViewValue = FormatNumber($this->AlternateSaleUOM->ViewValue, 0, -2, -2, -2);
            $this->AlternateSaleUOM->ViewCustomAttributes = "";

            // FreeUOM
            $this->FreeUOM->ViewValue = $this->FreeUOM->CurrentValue;
            $this->FreeUOM->ViewValue = FormatNumber($this->FreeUOM->ViewValue, 0, -2, -2, -2);
            $this->FreeUOM->ViewCustomAttributes = "";

            // MarketedCode
            $this->MarketedCode->ViewValue = $this->MarketedCode->CurrentValue;
            $this->MarketedCode->ViewCustomAttributes = "";

            // MinimumSalePrice
            $this->MinimumSalePrice->ViewValue = $this->MinimumSalePrice->CurrentValue;
            $this->MinimumSalePrice->ViewValue = FormatNumber($this->MinimumSalePrice->ViewValue, 2, -2, -2, -2);
            $this->MinimumSalePrice->ViewCustomAttributes = "";

            // PRate1
            $this->PRate1->ViewValue = $this->PRate1->CurrentValue;
            $this->PRate1->ViewValue = FormatNumber($this->PRate1->ViewValue, 2, -2, -2, -2);
            $this->PRate1->ViewCustomAttributes = "";

            // PRate2
            $this->PRate2->ViewValue = $this->PRate2->CurrentValue;
            $this->PRate2->ViewValue = FormatNumber($this->PRate2->ViewValue, 2, -2, -2, -2);
            $this->PRate2->ViewCustomAttributes = "";

            // LPItemCost
            $this->LPItemCost->ViewValue = $this->LPItemCost->CurrentValue;
            $this->LPItemCost->ViewValue = FormatNumber($this->LPItemCost->ViewValue, 2, -2, -2, -2);
            $this->LPItemCost->ViewCustomAttributes = "";

            // FixedItemCost
            $this->FixedItemCost->ViewValue = $this->FixedItemCost->CurrentValue;
            $this->FixedItemCost->ViewValue = FormatNumber($this->FixedItemCost->ViewValue, 2, -2, -2, -2);
            $this->FixedItemCost->ViewCustomAttributes = "";

            // HSNId
            $this->HSNId->ViewValue = $this->HSNId->CurrentValue;
            $this->HSNId->ViewValue = FormatNumber($this->HSNId->ViewValue, 0, -2, -2, -2);
            $this->HSNId->ViewCustomAttributes = "";

            // TaxInclusive
            $this->TaxInclusive->ViewValue = $this->TaxInclusive->CurrentValue;
            $this->TaxInclusive->ViewValue = FormatNumber($this->TaxInclusive->ViewValue, 0, -2, -2, -2);
            $this->TaxInclusive->ViewCustomAttributes = "";

            // EligibleforWarranty
            $this->EligibleforWarranty->ViewValue = $this->EligibleforWarranty->CurrentValue;
            $this->EligibleforWarranty->ViewValue = FormatNumber($this->EligibleforWarranty->ViewValue, 0, -2, -2, -2);
            $this->EligibleforWarranty->ViewCustomAttributes = "";

            // NoofMonthsWarranty
            $this->NoofMonthsWarranty->ViewValue = $this->NoofMonthsWarranty->CurrentValue;
            $this->NoofMonthsWarranty->ViewValue = FormatNumber($this->NoofMonthsWarranty->ViewValue, 0, -2, -2, -2);
            $this->NoofMonthsWarranty->ViewCustomAttributes = "";

            // ComputeTaxonCost
            $this->ComputeTaxonCost->ViewValue = $this->ComputeTaxonCost->CurrentValue;
            $this->ComputeTaxonCost->ViewValue = FormatNumber($this->ComputeTaxonCost->ViewValue, 0, -2, -2, -2);
            $this->ComputeTaxonCost->ViewCustomAttributes = "";

            // HasEmptyBottleTrack
            $this->HasEmptyBottleTrack->ViewValue = $this->HasEmptyBottleTrack->CurrentValue;
            $this->HasEmptyBottleTrack->ViewValue = FormatNumber($this->HasEmptyBottleTrack->ViewValue, 0, -2, -2, -2);
            $this->HasEmptyBottleTrack->ViewCustomAttributes = "";

            // EmptyBottleReferenceCode
            $this->EmptyBottleReferenceCode->ViewValue = $this->EmptyBottleReferenceCode->CurrentValue;
            $this->EmptyBottleReferenceCode->ViewValue = FormatNumber($this->EmptyBottleReferenceCode->ViewValue, 0, -2, -2, -2);
            $this->EmptyBottleReferenceCode->ViewCustomAttributes = "";

            // AdditionalCESSAmount
            $this->AdditionalCESSAmount->ViewValue = $this->AdditionalCESSAmount->CurrentValue;
            $this->AdditionalCESSAmount->ViewValue = FormatNumber($this->AdditionalCESSAmount->ViewValue, 2, -2, -2, -2);
            $this->AdditionalCESSAmount->ViewCustomAttributes = "";

            // EmptyBottleRate
            $this->EmptyBottleRate->ViewValue = $this->EmptyBottleRate->CurrentValue;
            $this->EmptyBottleRate->ViewValue = FormatNumber($this->EmptyBottleRate->ViewValue, 2, -2, -2, -2);
            $this->EmptyBottleRate->ViewCustomAttributes = "";

            // ProductCode
            $this->ProductCode->LinkCustomAttributes = "";
            $this->ProductCode->HrefValue = "";
            $this->ProductCode->TooltipValue = "";

            // ProductName
            $this->ProductName->LinkCustomAttributes = "";
            $this->ProductName->HrefValue = "";
            $this->ProductName->TooltipValue = "";

            // DivisionCode
            $this->DivisionCode->LinkCustomAttributes = "";
            $this->DivisionCode->HrefValue = "";
            $this->DivisionCode->TooltipValue = "";

            // ManufacturerCode
            $this->ManufacturerCode->LinkCustomAttributes = "";
            $this->ManufacturerCode->HrefValue = "";
            $this->ManufacturerCode->TooltipValue = "";

            // SupplierCode
            $this->SupplierCode->LinkCustomAttributes = "";
            $this->SupplierCode->HrefValue = "";
            $this->SupplierCode->TooltipValue = "";

            // AlternateSupplierCodes
            $this->AlternateSupplierCodes->LinkCustomAttributes = "";
            $this->AlternateSupplierCodes->HrefValue = "";
            $this->AlternateSupplierCodes->TooltipValue = "";

            // AlternateProductCode
            $this->AlternateProductCode->LinkCustomAttributes = "";
            $this->AlternateProductCode->HrefValue = "";
            $this->AlternateProductCode->TooltipValue = "";

            // UniversalProductCode
            $this->UniversalProductCode->LinkCustomAttributes = "";
            $this->UniversalProductCode->HrefValue = "";
            $this->UniversalProductCode->TooltipValue = "";

            // BookProductCode
            $this->BookProductCode->LinkCustomAttributes = "";
            $this->BookProductCode->HrefValue = "";
            $this->BookProductCode->TooltipValue = "";

            // OldCode
            $this->OldCode->LinkCustomAttributes = "";
            $this->OldCode->HrefValue = "";
            $this->OldCode->TooltipValue = "";

            // ProtectedProducts
            $this->ProtectedProducts->LinkCustomAttributes = "";
            $this->ProtectedProducts->HrefValue = "";
            $this->ProtectedProducts->TooltipValue = "";

            // ProductFullName
            $this->ProductFullName->LinkCustomAttributes = "";
            $this->ProductFullName->HrefValue = "";
            $this->ProductFullName->TooltipValue = "";

            // UnitOfMeasure
            $this->UnitOfMeasure->LinkCustomAttributes = "";
            $this->UnitOfMeasure->HrefValue = "";
            $this->UnitOfMeasure->TooltipValue = "";

            // UnitDescription
            $this->UnitDescription->LinkCustomAttributes = "";
            $this->UnitDescription->HrefValue = "";
            $this->UnitDescription->TooltipValue = "";

            // BulkDescription
            $this->BulkDescription->LinkCustomAttributes = "";
            $this->BulkDescription->HrefValue = "";
            $this->BulkDescription->TooltipValue = "";

            // BarCodeDescription
            $this->BarCodeDescription->LinkCustomAttributes = "";
            $this->BarCodeDescription->HrefValue = "";
            $this->BarCodeDescription->TooltipValue = "";

            // PackageInformation
            $this->PackageInformation->LinkCustomAttributes = "";
            $this->PackageInformation->HrefValue = "";
            $this->PackageInformation->TooltipValue = "";

            // PackageId
            $this->PackageId->LinkCustomAttributes = "";
            $this->PackageId->HrefValue = "";
            $this->PackageId->TooltipValue = "";

            // Weight
            $this->Weight->LinkCustomAttributes = "";
            $this->Weight->HrefValue = "";
            $this->Weight->TooltipValue = "";

            // AllowFractions
            $this->AllowFractions->LinkCustomAttributes = "";
            $this->AllowFractions->HrefValue = "";
            $this->AllowFractions->TooltipValue = "";

            // MinimumStockLevel
            $this->MinimumStockLevel->LinkCustomAttributes = "";
            $this->MinimumStockLevel->HrefValue = "";
            $this->MinimumStockLevel->TooltipValue = "";

            // MaximumStockLevel
            $this->MaximumStockLevel->LinkCustomAttributes = "";
            $this->MaximumStockLevel->HrefValue = "";
            $this->MaximumStockLevel->TooltipValue = "";

            // ReorderLevel
            $this->ReorderLevel->LinkCustomAttributes = "";
            $this->ReorderLevel->HrefValue = "";
            $this->ReorderLevel->TooltipValue = "";

            // MinMaxRatio
            $this->MinMaxRatio->LinkCustomAttributes = "";
            $this->MinMaxRatio->HrefValue = "";
            $this->MinMaxRatio->TooltipValue = "";

            // AutoMinMaxRatio
            $this->AutoMinMaxRatio->LinkCustomAttributes = "";
            $this->AutoMinMaxRatio->HrefValue = "";
            $this->AutoMinMaxRatio->TooltipValue = "";

            // ScheduleCode
            $this->ScheduleCode->LinkCustomAttributes = "";
            $this->ScheduleCode->HrefValue = "";
            $this->ScheduleCode->TooltipValue = "";

            // RopRatio
            $this->RopRatio->LinkCustomAttributes = "";
            $this->RopRatio->HrefValue = "";
            $this->RopRatio->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // PurchasePrice
            $this->PurchasePrice->LinkCustomAttributes = "";
            $this->PurchasePrice->HrefValue = "";
            $this->PurchasePrice->TooltipValue = "";

            // PurchaseUnit
            $this->PurchaseUnit->LinkCustomAttributes = "";
            $this->PurchaseUnit->HrefValue = "";
            $this->PurchaseUnit->TooltipValue = "";

            // PurchaseTaxCode
            $this->PurchaseTaxCode->LinkCustomAttributes = "";
            $this->PurchaseTaxCode->HrefValue = "";
            $this->PurchaseTaxCode->TooltipValue = "";

            // AllowDirectInward
            $this->AllowDirectInward->LinkCustomAttributes = "";
            $this->AllowDirectInward->HrefValue = "";
            $this->AllowDirectInward->TooltipValue = "";

            // SalePrice
            $this->SalePrice->LinkCustomAttributes = "";
            $this->SalePrice->HrefValue = "";
            $this->SalePrice->TooltipValue = "";

            // SaleUnit
            $this->SaleUnit->LinkCustomAttributes = "";
            $this->SaleUnit->HrefValue = "";
            $this->SaleUnit->TooltipValue = "";

            // SalesTaxCode
            $this->SalesTaxCode->LinkCustomAttributes = "";
            $this->SalesTaxCode->HrefValue = "";
            $this->SalesTaxCode->TooltipValue = "";

            // StockReceived
            $this->StockReceived->LinkCustomAttributes = "";
            $this->StockReceived->HrefValue = "";
            $this->StockReceived->TooltipValue = "";

            // TotalStock
            $this->TotalStock->LinkCustomAttributes = "";
            $this->TotalStock->HrefValue = "";
            $this->TotalStock->TooltipValue = "";

            // StockType
            $this->StockType->LinkCustomAttributes = "";
            $this->StockType->HrefValue = "";
            $this->StockType->TooltipValue = "";

            // StockCheckDate
            $this->StockCheckDate->LinkCustomAttributes = "";
            $this->StockCheckDate->HrefValue = "";
            $this->StockCheckDate->TooltipValue = "";

            // StockAdjustmentDate
            $this->StockAdjustmentDate->LinkCustomAttributes = "";
            $this->StockAdjustmentDate->HrefValue = "";
            $this->StockAdjustmentDate->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // CostCentre
            $this->CostCentre->LinkCustomAttributes = "";
            $this->CostCentre->HrefValue = "";
            $this->CostCentre->TooltipValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";
            $this->ProductType->TooltipValue = "";

            // TaxAmount
            $this->TaxAmount->LinkCustomAttributes = "";
            $this->TaxAmount->HrefValue = "";
            $this->TaxAmount->TooltipValue = "";

            // TaxId
            $this->TaxId->LinkCustomAttributes = "";
            $this->TaxId->HrefValue = "";
            $this->TaxId->TooltipValue = "";

            // ResaleTaxApplicable
            $this->ResaleTaxApplicable->LinkCustomAttributes = "";
            $this->ResaleTaxApplicable->HrefValue = "";
            $this->ResaleTaxApplicable->TooltipValue = "";

            // CstOtherTax
            $this->CstOtherTax->LinkCustomAttributes = "";
            $this->CstOtherTax->HrefValue = "";
            $this->CstOtherTax->TooltipValue = "";

            // TotalTax
            $this->TotalTax->LinkCustomAttributes = "";
            $this->TotalTax->HrefValue = "";
            $this->TotalTax->TooltipValue = "";

            // ItemCost
            $this->ItemCost->LinkCustomAttributes = "";
            $this->ItemCost->HrefValue = "";
            $this->ItemCost->TooltipValue = "";

            // ExpiryDate
            $this->ExpiryDate->LinkCustomAttributes = "";
            $this->ExpiryDate->HrefValue = "";
            $this->ExpiryDate->TooltipValue = "";

            // BatchDescription
            $this->BatchDescription->LinkCustomAttributes = "";
            $this->BatchDescription->HrefValue = "";
            $this->BatchDescription->TooltipValue = "";

            // FreeScheme
            $this->FreeScheme->LinkCustomAttributes = "";
            $this->FreeScheme->HrefValue = "";
            $this->FreeScheme->TooltipValue = "";

            // CashDiscountEligibility
            $this->CashDiscountEligibility->LinkCustomAttributes = "";
            $this->CashDiscountEligibility->HrefValue = "";
            $this->CashDiscountEligibility->TooltipValue = "";

            // DiscountPerAllowInBill
            $this->DiscountPerAllowInBill->LinkCustomAttributes = "";
            $this->DiscountPerAllowInBill->HrefValue = "";
            $this->DiscountPerAllowInBill->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // TotalAmount
            $this->TotalAmount->LinkCustomAttributes = "";
            $this->TotalAmount->HrefValue = "";
            $this->TotalAmount->TooltipValue = "";

            // StandardMargin
            $this->StandardMargin->LinkCustomAttributes = "";
            $this->StandardMargin->HrefValue = "";
            $this->StandardMargin->TooltipValue = "";

            // Margin
            $this->Margin->LinkCustomAttributes = "";
            $this->Margin->HrefValue = "";
            $this->Margin->TooltipValue = "";

            // MarginId
            $this->MarginId->LinkCustomAttributes = "";
            $this->MarginId->HrefValue = "";
            $this->MarginId->TooltipValue = "";

            // ExpectedMargin
            $this->ExpectedMargin->LinkCustomAttributes = "";
            $this->ExpectedMargin->HrefValue = "";
            $this->ExpectedMargin->TooltipValue = "";

            // SurchargeBeforeTax
            $this->SurchargeBeforeTax->LinkCustomAttributes = "";
            $this->SurchargeBeforeTax->HrefValue = "";
            $this->SurchargeBeforeTax->TooltipValue = "";

            // SurchargeAfterTax
            $this->SurchargeAfterTax->LinkCustomAttributes = "";
            $this->SurchargeAfterTax->HrefValue = "";
            $this->SurchargeAfterTax->TooltipValue = "";

            // TempOrderNo
            $this->TempOrderNo->LinkCustomAttributes = "";
            $this->TempOrderNo->HrefValue = "";
            $this->TempOrderNo->TooltipValue = "";

            // TempOrderDate
            $this->TempOrderDate->LinkCustomAttributes = "";
            $this->TempOrderDate->HrefValue = "";
            $this->TempOrderDate->TooltipValue = "";

            // OrderUnit
            $this->OrderUnit->LinkCustomAttributes = "";
            $this->OrderUnit->HrefValue = "";
            $this->OrderUnit->TooltipValue = "";

            // OrderQuantity
            $this->OrderQuantity->LinkCustomAttributes = "";
            $this->OrderQuantity->HrefValue = "";
            $this->OrderQuantity->TooltipValue = "";

            // MarkForOrder
            $this->MarkForOrder->LinkCustomAttributes = "";
            $this->MarkForOrder->HrefValue = "";
            $this->MarkForOrder->TooltipValue = "";

            // OrderAllId
            $this->OrderAllId->LinkCustomAttributes = "";
            $this->OrderAllId->HrefValue = "";
            $this->OrderAllId->TooltipValue = "";

            // CalculateOrderQty
            $this->CalculateOrderQty->LinkCustomAttributes = "";
            $this->CalculateOrderQty->HrefValue = "";
            $this->CalculateOrderQty->TooltipValue = "";

            // SubLocation
            $this->SubLocation->LinkCustomAttributes = "";
            $this->SubLocation->HrefValue = "";
            $this->SubLocation->TooltipValue = "";

            // CategoryCode
            $this->CategoryCode->LinkCustomAttributes = "";
            $this->CategoryCode->HrefValue = "";
            $this->CategoryCode->TooltipValue = "";

            // SubCategory
            $this->SubCategory->LinkCustomAttributes = "";
            $this->SubCategory->HrefValue = "";
            $this->SubCategory->TooltipValue = "";

            // FlexCategoryCode
            $this->FlexCategoryCode->LinkCustomAttributes = "";
            $this->FlexCategoryCode->HrefValue = "";
            $this->FlexCategoryCode->TooltipValue = "";

            // ABCSaleQty
            $this->ABCSaleQty->LinkCustomAttributes = "";
            $this->ABCSaleQty->HrefValue = "";
            $this->ABCSaleQty->TooltipValue = "";

            // ABCSaleValue
            $this->ABCSaleValue->LinkCustomAttributes = "";
            $this->ABCSaleValue->HrefValue = "";
            $this->ABCSaleValue->TooltipValue = "";

            // ConvertionFactor
            $this->ConvertionFactor->LinkCustomAttributes = "";
            $this->ConvertionFactor->HrefValue = "";
            $this->ConvertionFactor->TooltipValue = "";

            // ConvertionUnitDesc
            $this->ConvertionUnitDesc->LinkCustomAttributes = "";
            $this->ConvertionUnitDesc->HrefValue = "";
            $this->ConvertionUnitDesc->TooltipValue = "";

            // TransactionId
            $this->TransactionId->LinkCustomAttributes = "";
            $this->TransactionId->HrefValue = "";
            $this->TransactionId->TooltipValue = "";

            // SoldProductId
            $this->SoldProductId->LinkCustomAttributes = "";
            $this->SoldProductId->HrefValue = "";
            $this->SoldProductId->TooltipValue = "";

            // WantedBookId
            $this->WantedBookId->LinkCustomAttributes = "";
            $this->WantedBookId->HrefValue = "";
            $this->WantedBookId->TooltipValue = "";

            // AllId
            $this->AllId->LinkCustomAttributes = "";
            $this->AllId->HrefValue = "";
            $this->AllId->TooltipValue = "";

            // BatchAndExpiryCompulsory
            $this->BatchAndExpiryCompulsory->LinkCustomAttributes = "";
            $this->BatchAndExpiryCompulsory->HrefValue = "";
            $this->BatchAndExpiryCompulsory->TooltipValue = "";

            // BatchStockForWantedBook
            $this->BatchStockForWantedBook->LinkCustomAttributes = "";
            $this->BatchStockForWantedBook->HrefValue = "";
            $this->BatchStockForWantedBook->TooltipValue = "";

            // UnitBasedBilling
            $this->UnitBasedBilling->LinkCustomAttributes = "";
            $this->UnitBasedBilling->HrefValue = "";
            $this->UnitBasedBilling->TooltipValue = "";

            // DoNotCheckStock
            $this->DoNotCheckStock->LinkCustomAttributes = "";
            $this->DoNotCheckStock->HrefValue = "";
            $this->DoNotCheckStock->TooltipValue = "";

            // AcceptRate
            $this->AcceptRate->LinkCustomAttributes = "";
            $this->AcceptRate->HrefValue = "";
            $this->AcceptRate->TooltipValue = "";

            // PriceLevel
            $this->PriceLevel->LinkCustomAttributes = "";
            $this->PriceLevel->HrefValue = "";
            $this->PriceLevel->TooltipValue = "";

            // LastQuotePrice
            $this->LastQuotePrice->LinkCustomAttributes = "";
            $this->LastQuotePrice->HrefValue = "";
            $this->LastQuotePrice->TooltipValue = "";

            // PriceChange
            $this->PriceChange->LinkCustomAttributes = "";
            $this->PriceChange->HrefValue = "";
            $this->PriceChange->TooltipValue = "";

            // CommodityCode
            $this->CommodityCode->LinkCustomAttributes = "";
            $this->CommodityCode->HrefValue = "";
            $this->CommodityCode->TooltipValue = "";

            // InstitutePrice
            $this->InstitutePrice->LinkCustomAttributes = "";
            $this->InstitutePrice->HrefValue = "";
            $this->InstitutePrice->TooltipValue = "";

            // CtrlOrDCtrlProduct
            $this->CtrlOrDCtrlProduct->LinkCustomAttributes = "";
            $this->CtrlOrDCtrlProduct->HrefValue = "";
            $this->CtrlOrDCtrlProduct->TooltipValue = "";

            // ImportedDate
            $this->ImportedDate->LinkCustomAttributes = "";
            $this->ImportedDate->HrefValue = "";
            $this->ImportedDate->TooltipValue = "";

            // IsImported
            $this->IsImported->LinkCustomAttributes = "";
            $this->IsImported->HrefValue = "";
            $this->IsImported->TooltipValue = "";

            // FileName
            $this->FileName->LinkCustomAttributes = "";
            $this->FileName->HrefValue = "";
            $this->FileName->TooltipValue = "";

            // GodownNumber
            $this->GodownNumber->LinkCustomAttributes = "";
            $this->GodownNumber->HrefValue = "";
            $this->GodownNumber->TooltipValue = "";

            // CreationDate
            $this->CreationDate->LinkCustomAttributes = "";
            $this->CreationDate->HrefValue = "";
            $this->CreationDate->TooltipValue = "";

            // CreatedbyUser
            $this->CreatedbyUser->LinkCustomAttributes = "";
            $this->CreatedbyUser->HrefValue = "";
            $this->CreatedbyUser->TooltipValue = "";

            // ModifiedDate
            $this->ModifiedDate->LinkCustomAttributes = "";
            $this->ModifiedDate->HrefValue = "";
            $this->ModifiedDate->TooltipValue = "";

            // ModifiedbyUser
            $this->ModifiedbyUser->LinkCustomAttributes = "";
            $this->ModifiedbyUser->HrefValue = "";
            $this->ModifiedbyUser->TooltipValue = "";

            // isActive
            $this->isActive->LinkCustomAttributes = "";
            $this->isActive->HrefValue = "";
            $this->isActive->TooltipValue = "";

            // AllowExpiryClaim
            $this->AllowExpiryClaim->LinkCustomAttributes = "";
            $this->AllowExpiryClaim->HrefValue = "";
            $this->AllowExpiryClaim->TooltipValue = "";

            // BrandCode
            $this->BrandCode->LinkCustomAttributes = "";
            $this->BrandCode->HrefValue = "";
            $this->BrandCode->TooltipValue = "";

            // FreeSchemeBasedon
            $this->FreeSchemeBasedon->LinkCustomAttributes = "";
            $this->FreeSchemeBasedon->HrefValue = "";
            $this->FreeSchemeBasedon->TooltipValue = "";

            // DoNotCheckCostInBill
            $this->DoNotCheckCostInBill->LinkCustomAttributes = "";
            $this->DoNotCheckCostInBill->HrefValue = "";
            $this->DoNotCheckCostInBill->TooltipValue = "";

            // ProductGroupCode
            $this->ProductGroupCode->LinkCustomAttributes = "";
            $this->ProductGroupCode->HrefValue = "";
            $this->ProductGroupCode->TooltipValue = "";

            // ProductStrengthCode
            $this->ProductStrengthCode->LinkCustomAttributes = "";
            $this->ProductStrengthCode->HrefValue = "";
            $this->ProductStrengthCode->TooltipValue = "";

            // PackingCode
            $this->PackingCode->LinkCustomAttributes = "";
            $this->PackingCode->HrefValue = "";
            $this->PackingCode->TooltipValue = "";

            // ComputedMinStock
            $this->ComputedMinStock->LinkCustomAttributes = "";
            $this->ComputedMinStock->HrefValue = "";
            $this->ComputedMinStock->TooltipValue = "";

            // ComputedMaxStock
            $this->ComputedMaxStock->LinkCustomAttributes = "";
            $this->ComputedMaxStock->HrefValue = "";
            $this->ComputedMaxStock->TooltipValue = "";

            // ProductRemark
            $this->ProductRemark->LinkCustomAttributes = "";
            $this->ProductRemark->HrefValue = "";
            $this->ProductRemark->TooltipValue = "";

            // ProductDrugCode
            $this->ProductDrugCode->LinkCustomAttributes = "";
            $this->ProductDrugCode->HrefValue = "";
            $this->ProductDrugCode->TooltipValue = "";

            // IsMatrixProduct
            $this->IsMatrixProduct->LinkCustomAttributes = "";
            $this->IsMatrixProduct->HrefValue = "";
            $this->IsMatrixProduct->TooltipValue = "";

            // AttributeCount1
            $this->AttributeCount1->LinkCustomAttributes = "";
            $this->AttributeCount1->HrefValue = "";
            $this->AttributeCount1->TooltipValue = "";

            // AttributeCount2
            $this->AttributeCount2->LinkCustomAttributes = "";
            $this->AttributeCount2->HrefValue = "";
            $this->AttributeCount2->TooltipValue = "";

            // AttributeCount3
            $this->AttributeCount3->LinkCustomAttributes = "";
            $this->AttributeCount3->HrefValue = "";
            $this->AttributeCount3->TooltipValue = "";

            // AttributeCount4
            $this->AttributeCount4->LinkCustomAttributes = "";
            $this->AttributeCount4->HrefValue = "";
            $this->AttributeCount4->TooltipValue = "";

            // AttributeCount5
            $this->AttributeCount5->LinkCustomAttributes = "";
            $this->AttributeCount5->HrefValue = "";
            $this->AttributeCount5->TooltipValue = "";

            // DefaultDiscountPercentage
            $this->DefaultDiscountPercentage->LinkCustomAttributes = "";
            $this->DefaultDiscountPercentage->HrefValue = "";
            $this->DefaultDiscountPercentage->TooltipValue = "";

            // DonotPrintBarcode
            $this->DonotPrintBarcode->LinkCustomAttributes = "";
            $this->DonotPrintBarcode->HrefValue = "";
            $this->DonotPrintBarcode->TooltipValue = "";

            // ProductLevelDiscount
            $this->ProductLevelDiscount->LinkCustomAttributes = "";
            $this->ProductLevelDiscount->HrefValue = "";
            $this->ProductLevelDiscount->TooltipValue = "";

            // Markup
            $this->Markup->LinkCustomAttributes = "";
            $this->Markup->HrefValue = "";
            $this->Markup->TooltipValue = "";

            // MarkDown
            $this->MarkDown->LinkCustomAttributes = "";
            $this->MarkDown->HrefValue = "";
            $this->MarkDown->TooltipValue = "";

            // ReworkSalePrice
            $this->ReworkSalePrice->LinkCustomAttributes = "";
            $this->ReworkSalePrice->HrefValue = "";
            $this->ReworkSalePrice->TooltipValue = "";

            // MultipleInput
            $this->MultipleInput->LinkCustomAttributes = "";
            $this->MultipleInput->HrefValue = "";
            $this->MultipleInput->TooltipValue = "";

            // LpPackageInformation
            $this->LpPackageInformation->LinkCustomAttributes = "";
            $this->LpPackageInformation->HrefValue = "";
            $this->LpPackageInformation->TooltipValue = "";

            // AllowNegativeStock
            $this->AllowNegativeStock->LinkCustomAttributes = "";
            $this->AllowNegativeStock->HrefValue = "";
            $this->AllowNegativeStock->TooltipValue = "";

            // OrderDate
            $this->OrderDate->LinkCustomAttributes = "";
            $this->OrderDate->HrefValue = "";
            $this->OrderDate->TooltipValue = "";

            // OrderTime
            $this->OrderTime->LinkCustomAttributes = "";
            $this->OrderTime->HrefValue = "";
            $this->OrderTime->TooltipValue = "";

            // RateGroupCode
            $this->RateGroupCode->LinkCustomAttributes = "";
            $this->RateGroupCode->HrefValue = "";
            $this->RateGroupCode->TooltipValue = "";

            // ConversionCaseLot
            $this->ConversionCaseLot->LinkCustomAttributes = "";
            $this->ConversionCaseLot->HrefValue = "";
            $this->ConversionCaseLot->TooltipValue = "";

            // ShippingLot
            $this->ShippingLot->LinkCustomAttributes = "";
            $this->ShippingLot->HrefValue = "";
            $this->ShippingLot->TooltipValue = "";

            // AllowExpiryReplacement
            $this->AllowExpiryReplacement->LinkCustomAttributes = "";
            $this->AllowExpiryReplacement->HrefValue = "";
            $this->AllowExpiryReplacement->TooltipValue = "";

            // NoOfMonthExpiryAllowed
            $this->NoOfMonthExpiryAllowed->LinkCustomAttributes = "";
            $this->NoOfMonthExpiryAllowed->HrefValue = "";
            $this->NoOfMonthExpiryAllowed->TooltipValue = "";

            // ProductDiscountEligibility
            $this->ProductDiscountEligibility->LinkCustomAttributes = "";
            $this->ProductDiscountEligibility->HrefValue = "";
            $this->ProductDiscountEligibility->TooltipValue = "";

            // ScheduleTypeCode
            $this->ScheduleTypeCode->LinkCustomAttributes = "";
            $this->ScheduleTypeCode->HrefValue = "";
            $this->ScheduleTypeCode->TooltipValue = "";

            // AIOCDProductCode
            $this->AIOCDProductCode->LinkCustomAttributes = "";
            $this->AIOCDProductCode->HrefValue = "";
            $this->AIOCDProductCode->TooltipValue = "";

            // FreeQuantity
            $this->FreeQuantity->LinkCustomAttributes = "";
            $this->FreeQuantity->HrefValue = "";
            $this->FreeQuantity->TooltipValue = "";

            // DiscountType
            $this->DiscountType->LinkCustomAttributes = "";
            $this->DiscountType->HrefValue = "";
            $this->DiscountType->TooltipValue = "";

            // DiscountValue
            $this->DiscountValue->LinkCustomAttributes = "";
            $this->DiscountValue->HrefValue = "";
            $this->DiscountValue->TooltipValue = "";

            // HasProductOrderAttribute
            $this->HasProductOrderAttribute->LinkCustomAttributes = "";
            $this->HasProductOrderAttribute->HrefValue = "";
            $this->HasProductOrderAttribute->TooltipValue = "";

            // FirstPODate
            $this->FirstPODate->LinkCustomAttributes = "";
            $this->FirstPODate->HrefValue = "";
            $this->FirstPODate->TooltipValue = "";

            // SaleprcieAndMrpCalcPercent
            $this->SaleprcieAndMrpCalcPercent->LinkCustomAttributes = "";
            $this->SaleprcieAndMrpCalcPercent->HrefValue = "";
            $this->SaleprcieAndMrpCalcPercent->TooltipValue = "";

            // IsGiftVoucherProducts
            $this->IsGiftVoucherProducts->LinkCustomAttributes = "";
            $this->IsGiftVoucherProducts->HrefValue = "";
            $this->IsGiftVoucherProducts->TooltipValue = "";

            // AcceptRange4SerialNumber
            $this->AcceptRange4SerialNumber->LinkCustomAttributes = "";
            $this->AcceptRange4SerialNumber->HrefValue = "";
            $this->AcceptRange4SerialNumber->TooltipValue = "";

            // GiftVoucherDenomination
            $this->GiftVoucherDenomination->LinkCustomAttributes = "";
            $this->GiftVoucherDenomination->HrefValue = "";
            $this->GiftVoucherDenomination->TooltipValue = "";

            // Subclasscode
            $this->Subclasscode->LinkCustomAttributes = "";
            $this->Subclasscode->HrefValue = "";
            $this->Subclasscode->TooltipValue = "";

            // BarCodeFromWeighingMachine
            $this->BarCodeFromWeighingMachine->LinkCustomAttributes = "";
            $this->BarCodeFromWeighingMachine->HrefValue = "";
            $this->BarCodeFromWeighingMachine->TooltipValue = "";

            // CheckCostInReturn
            $this->CheckCostInReturn->LinkCustomAttributes = "";
            $this->CheckCostInReturn->HrefValue = "";
            $this->CheckCostInReturn->TooltipValue = "";

            // FrequentSaleProduct
            $this->FrequentSaleProduct->LinkCustomAttributes = "";
            $this->FrequentSaleProduct->HrefValue = "";
            $this->FrequentSaleProduct->TooltipValue = "";

            // RateType
            $this->RateType->LinkCustomAttributes = "";
            $this->RateType->HrefValue = "";
            $this->RateType->TooltipValue = "";

            // TouchscreenName
            $this->TouchscreenName->LinkCustomAttributes = "";
            $this->TouchscreenName->HrefValue = "";
            $this->TouchscreenName->TooltipValue = "";

            // FreeType
            $this->FreeType->LinkCustomAttributes = "";
            $this->FreeType->HrefValue = "";
            $this->FreeType->TooltipValue = "";

            // LooseQtyasNewBatch
            $this->LooseQtyasNewBatch->LinkCustomAttributes = "";
            $this->LooseQtyasNewBatch->HrefValue = "";
            $this->LooseQtyasNewBatch->TooltipValue = "";

            // AllowSlabBilling
            $this->AllowSlabBilling->LinkCustomAttributes = "";
            $this->AllowSlabBilling->HrefValue = "";
            $this->AllowSlabBilling->TooltipValue = "";

            // ProductTypeForProduction
            $this->ProductTypeForProduction->LinkCustomAttributes = "";
            $this->ProductTypeForProduction->HrefValue = "";
            $this->ProductTypeForProduction->TooltipValue = "";

            // RecipeCode
            $this->RecipeCode->LinkCustomAttributes = "";
            $this->RecipeCode->HrefValue = "";
            $this->RecipeCode->TooltipValue = "";

            // DefaultUnitType
            $this->DefaultUnitType->LinkCustomAttributes = "";
            $this->DefaultUnitType->HrefValue = "";
            $this->DefaultUnitType->TooltipValue = "";

            // PIstatus
            $this->PIstatus->LinkCustomAttributes = "";
            $this->PIstatus->HrefValue = "";
            $this->PIstatus->TooltipValue = "";

            // LastPiConfirmedDate
            $this->LastPiConfirmedDate->LinkCustomAttributes = "";
            $this->LastPiConfirmedDate->HrefValue = "";
            $this->LastPiConfirmedDate->TooltipValue = "";

            // BarCodeDesign
            $this->BarCodeDesign->LinkCustomAttributes = "";
            $this->BarCodeDesign->HrefValue = "";
            $this->BarCodeDesign->TooltipValue = "";

            // AcceptRemarksInBill
            $this->AcceptRemarksInBill->LinkCustomAttributes = "";
            $this->AcceptRemarksInBill->HrefValue = "";
            $this->AcceptRemarksInBill->TooltipValue = "";

            // Classification
            $this->Classification->LinkCustomAttributes = "";
            $this->Classification->HrefValue = "";
            $this->Classification->TooltipValue = "";

            // TimeSlot
            $this->TimeSlot->LinkCustomAttributes = "";
            $this->TimeSlot->HrefValue = "";
            $this->TimeSlot->TooltipValue = "";

            // IsBundle
            $this->IsBundle->LinkCustomAttributes = "";
            $this->IsBundle->HrefValue = "";
            $this->IsBundle->TooltipValue = "";

            // ColorCode
            $this->ColorCode->LinkCustomAttributes = "";
            $this->ColorCode->HrefValue = "";
            $this->ColorCode->TooltipValue = "";

            // GenderCode
            $this->GenderCode->LinkCustomAttributes = "";
            $this->GenderCode->HrefValue = "";
            $this->GenderCode->TooltipValue = "";

            // SizeCode
            $this->SizeCode->LinkCustomAttributes = "";
            $this->SizeCode->HrefValue = "";
            $this->SizeCode->TooltipValue = "";

            // GiftCard
            $this->GiftCard->LinkCustomAttributes = "";
            $this->GiftCard->HrefValue = "";
            $this->GiftCard->TooltipValue = "";

            // ToonLabel
            $this->ToonLabel->LinkCustomAttributes = "";
            $this->ToonLabel->HrefValue = "";
            $this->ToonLabel->TooltipValue = "";

            // GarmentType
            $this->GarmentType->LinkCustomAttributes = "";
            $this->GarmentType->HrefValue = "";
            $this->GarmentType->TooltipValue = "";

            // AgeGroup
            $this->AgeGroup->LinkCustomAttributes = "";
            $this->AgeGroup->HrefValue = "";
            $this->AgeGroup->TooltipValue = "";

            // Season
            $this->Season->LinkCustomAttributes = "";
            $this->Season->HrefValue = "";
            $this->Season->TooltipValue = "";

            // DailyStockEntry
            $this->DailyStockEntry->LinkCustomAttributes = "";
            $this->DailyStockEntry->HrefValue = "";
            $this->DailyStockEntry->TooltipValue = "";

            // ModifierApplicable
            $this->ModifierApplicable->LinkCustomAttributes = "";
            $this->ModifierApplicable->HrefValue = "";
            $this->ModifierApplicable->TooltipValue = "";

            // ModifierType
            $this->ModifierType->LinkCustomAttributes = "";
            $this->ModifierType->HrefValue = "";
            $this->ModifierType->TooltipValue = "";

            // AcceptZeroRate
            $this->AcceptZeroRate->LinkCustomAttributes = "";
            $this->AcceptZeroRate->HrefValue = "";
            $this->AcceptZeroRate->TooltipValue = "";

            // ExciseDutyCode
            $this->ExciseDutyCode->LinkCustomAttributes = "";
            $this->ExciseDutyCode->HrefValue = "";
            $this->ExciseDutyCode->TooltipValue = "";

            // IndentProductGroupCode
            $this->IndentProductGroupCode->LinkCustomAttributes = "";
            $this->IndentProductGroupCode->HrefValue = "";
            $this->IndentProductGroupCode->TooltipValue = "";

            // IsMultiBatch
            $this->IsMultiBatch->LinkCustomAttributes = "";
            $this->IsMultiBatch->HrefValue = "";
            $this->IsMultiBatch->TooltipValue = "";

            // IsSingleBatch
            $this->IsSingleBatch->LinkCustomAttributes = "";
            $this->IsSingleBatch->HrefValue = "";
            $this->IsSingleBatch->TooltipValue = "";

            // MarkUpRate1
            $this->MarkUpRate1->LinkCustomAttributes = "";
            $this->MarkUpRate1->HrefValue = "";
            $this->MarkUpRate1->TooltipValue = "";

            // MarkDownRate1
            $this->MarkDownRate1->LinkCustomAttributes = "";
            $this->MarkDownRate1->HrefValue = "";
            $this->MarkDownRate1->TooltipValue = "";

            // MarkUpRate2
            $this->MarkUpRate2->LinkCustomAttributes = "";
            $this->MarkUpRate2->HrefValue = "";
            $this->MarkUpRate2->TooltipValue = "";

            // MarkDownRate2
            $this->MarkDownRate2->LinkCustomAttributes = "";
            $this->MarkDownRate2->HrefValue = "";
            $this->MarkDownRate2->TooltipValue = "";

            // Yield
            $this->_Yield->LinkCustomAttributes = "";
            $this->_Yield->HrefValue = "";
            $this->_Yield->TooltipValue = "";

            // RefProductCode
            $this->RefProductCode->LinkCustomAttributes = "";
            $this->RefProductCode->HrefValue = "";
            $this->RefProductCode->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // MeasurementID
            $this->MeasurementID->LinkCustomAttributes = "";
            $this->MeasurementID->HrefValue = "";
            $this->MeasurementID->TooltipValue = "";

            // CountryCode
            $this->CountryCode->LinkCustomAttributes = "";
            $this->CountryCode->HrefValue = "";
            $this->CountryCode->TooltipValue = "";

            // AcceptWMQty
            $this->AcceptWMQty->LinkCustomAttributes = "";
            $this->AcceptWMQty->HrefValue = "";
            $this->AcceptWMQty->TooltipValue = "";

            // SingleBatchBasedOnRate
            $this->SingleBatchBasedOnRate->LinkCustomAttributes = "";
            $this->SingleBatchBasedOnRate->HrefValue = "";
            $this->SingleBatchBasedOnRate->TooltipValue = "";

            // TenderNo
            $this->TenderNo->LinkCustomAttributes = "";
            $this->TenderNo->HrefValue = "";
            $this->TenderNo->TooltipValue = "";

            // SingleBillMaximumSoldQtyFiled
            $this->SingleBillMaximumSoldQtyFiled->LinkCustomAttributes = "";
            $this->SingleBillMaximumSoldQtyFiled->HrefValue = "";
            $this->SingleBillMaximumSoldQtyFiled->TooltipValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";
            $this->Strength1->TooltipValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";
            $this->Strength2->TooltipValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";
            $this->Strength3->TooltipValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";
            $this->Strength4->TooltipValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";
            $this->Strength5->TooltipValue = "";

            // IngredientCode1
            $this->IngredientCode1->LinkCustomAttributes = "";
            $this->IngredientCode1->HrefValue = "";
            $this->IngredientCode1->TooltipValue = "";

            // IngredientCode2
            $this->IngredientCode2->LinkCustomAttributes = "";
            $this->IngredientCode2->HrefValue = "";
            $this->IngredientCode2->TooltipValue = "";

            // IngredientCode3
            $this->IngredientCode3->LinkCustomAttributes = "";
            $this->IngredientCode3->HrefValue = "";
            $this->IngredientCode3->TooltipValue = "";

            // IngredientCode4
            $this->IngredientCode4->LinkCustomAttributes = "";
            $this->IngredientCode4->HrefValue = "";
            $this->IngredientCode4->TooltipValue = "";

            // IngredientCode5
            $this->IngredientCode5->LinkCustomAttributes = "";
            $this->IngredientCode5->HrefValue = "";
            $this->IngredientCode5->TooltipValue = "";

            // OrderType
            $this->OrderType->LinkCustomAttributes = "";
            $this->OrderType->HrefValue = "";
            $this->OrderType->TooltipValue = "";

            // StockUOM
            $this->StockUOM->LinkCustomAttributes = "";
            $this->StockUOM->HrefValue = "";
            $this->StockUOM->TooltipValue = "";

            // PriceUOM
            $this->PriceUOM->LinkCustomAttributes = "";
            $this->PriceUOM->HrefValue = "";
            $this->PriceUOM->TooltipValue = "";

            // DefaultSaleUOM
            $this->DefaultSaleUOM->LinkCustomAttributes = "";
            $this->DefaultSaleUOM->HrefValue = "";
            $this->DefaultSaleUOM->TooltipValue = "";

            // DefaultPurchaseUOM
            $this->DefaultPurchaseUOM->LinkCustomAttributes = "";
            $this->DefaultPurchaseUOM->HrefValue = "";
            $this->DefaultPurchaseUOM->TooltipValue = "";

            // ReportingUOM
            $this->ReportingUOM->LinkCustomAttributes = "";
            $this->ReportingUOM->HrefValue = "";
            $this->ReportingUOM->TooltipValue = "";

            // LastPurchasedUOM
            $this->LastPurchasedUOM->LinkCustomAttributes = "";
            $this->LastPurchasedUOM->HrefValue = "";
            $this->LastPurchasedUOM->TooltipValue = "";

            // TreatmentCodes
            $this->TreatmentCodes->LinkCustomAttributes = "";
            $this->TreatmentCodes->HrefValue = "";
            $this->TreatmentCodes->TooltipValue = "";

            // InsuranceType
            $this->InsuranceType->LinkCustomAttributes = "";
            $this->InsuranceType->HrefValue = "";
            $this->InsuranceType->TooltipValue = "";

            // CoverageGroupCodes
            $this->CoverageGroupCodes->LinkCustomAttributes = "";
            $this->CoverageGroupCodes->HrefValue = "";
            $this->CoverageGroupCodes->TooltipValue = "";

            // MultipleUOM
            $this->MultipleUOM->LinkCustomAttributes = "";
            $this->MultipleUOM->HrefValue = "";
            $this->MultipleUOM->TooltipValue = "";

            // SalePriceComputation
            $this->SalePriceComputation->LinkCustomAttributes = "";
            $this->SalePriceComputation->HrefValue = "";
            $this->SalePriceComputation->TooltipValue = "";

            // StockCorrection
            $this->StockCorrection->LinkCustomAttributes = "";
            $this->StockCorrection->HrefValue = "";
            $this->StockCorrection->TooltipValue = "";

            // LBTPercentage
            $this->LBTPercentage->LinkCustomAttributes = "";
            $this->LBTPercentage->HrefValue = "";
            $this->LBTPercentage->TooltipValue = "";

            // SalesCommission
            $this->SalesCommission->LinkCustomAttributes = "";
            $this->SalesCommission->HrefValue = "";
            $this->SalesCommission->TooltipValue = "";

            // LockedStock
            $this->LockedStock->LinkCustomAttributes = "";
            $this->LockedStock->HrefValue = "";
            $this->LockedStock->TooltipValue = "";

            // MinMaxUOM
            $this->MinMaxUOM->LinkCustomAttributes = "";
            $this->MinMaxUOM->HrefValue = "";
            $this->MinMaxUOM->TooltipValue = "";

            // ExpiryMfrDateFormat
            $this->ExpiryMfrDateFormat->LinkCustomAttributes = "";
            $this->ExpiryMfrDateFormat->HrefValue = "";
            $this->ExpiryMfrDateFormat->TooltipValue = "";

            // ProductLifeTime
            $this->ProductLifeTime->LinkCustomAttributes = "";
            $this->ProductLifeTime->HrefValue = "";
            $this->ProductLifeTime->TooltipValue = "";

            // IsCombo
            $this->IsCombo->LinkCustomAttributes = "";
            $this->IsCombo->HrefValue = "";
            $this->IsCombo->TooltipValue = "";

            // ComboTypeCode
            $this->ComboTypeCode->LinkCustomAttributes = "";
            $this->ComboTypeCode->HrefValue = "";
            $this->ComboTypeCode->TooltipValue = "";

            // AttributeCount6
            $this->AttributeCount6->LinkCustomAttributes = "";
            $this->AttributeCount6->HrefValue = "";
            $this->AttributeCount6->TooltipValue = "";

            // AttributeCount7
            $this->AttributeCount7->LinkCustomAttributes = "";
            $this->AttributeCount7->HrefValue = "";
            $this->AttributeCount7->TooltipValue = "";

            // AttributeCount8
            $this->AttributeCount8->LinkCustomAttributes = "";
            $this->AttributeCount8->HrefValue = "";
            $this->AttributeCount8->TooltipValue = "";

            // AttributeCount9
            $this->AttributeCount9->LinkCustomAttributes = "";
            $this->AttributeCount9->HrefValue = "";
            $this->AttributeCount9->TooltipValue = "";

            // AttributeCount10
            $this->AttributeCount10->LinkCustomAttributes = "";
            $this->AttributeCount10->HrefValue = "";
            $this->AttributeCount10->TooltipValue = "";

            // LabourCharge
            $this->LabourCharge->LinkCustomAttributes = "";
            $this->LabourCharge->HrefValue = "";
            $this->LabourCharge->TooltipValue = "";

            // AffectOtherCharge
            $this->AffectOtherCharge->LinkCustomAttributes = "";
            $this->AffectOtherCharge->HrefValue = "";
            $this->AffectOtherCharge->TooltipValue = "";

            // DosageInfo
            $this->DosageInfo->LinkCustomAttributes = "";
            $this->DosageInfo->HrefValue = "";
            $this->DosageInfo->TooltipValue = "";

            // DosageType
            $this->DosageType->LinkCustomAttributes = "";
            $this->DosageType->HrefValue = "";
            $this->DosageType->TooltipValue = "";

            // DefaultIndentUOM
            $this->DefaultIndentUOM->LinkCustomAttributes = "";
            $this->DefaultIndentUOM->HrefValue = "";
            $this->DefaultIndentUOM->TooltipValue = "";

            // PromoTag
            $this->PromoTag->LinkCustomAttributes = "";
            $this->PromoTag->HrefValue = "";
            $this->PromoTag->TooltipValue = "";

            // BillLevelPromoTag
            $this->BillLevelPromoTag->LinkCustomAttributes = "";
            $this->BillLevelPromoTag->HrefValue = "";
            $this->BillLevelPromoTag->TooltipValue = "";

            // IsMRPProduct
            $this->IsMRPProduct->LinkCustomAttributes = "";
            $this->IsMRPProduct->HrefValue = "";
            $this->IsMRPProduct->TooltipValue = "";

            // AlternateSaleUOM
            $this->AlternateSaleUOM->LinkCustomAttributes = "";
            $this->AlternateSaleUOM->HrefValue = "";
            $this->AlternateSaleUOM->TooltipValue = "";

            // FreeUOM
            $this->FreeUOM->LinkCustomAttributes = "";
            $this->FreeUOM->HrefValue = "";
            $this->FreeUOM->TooltipValue = "";

            // MarketedCode
            $this->MarketedCode->LinkCustomAttributes = "";
            $this->MarketedCode->HrefValue = "";
            $this->MarketedCode->TooltipValue = "";

            // MinimumSalePrice
            $this->MinimumSalePrice->LinkCustomAttributes = "";
            $this->MinimumSalePrice->HrefValue = "";
            $this->MinimumSalePrice->TooltipValue = "";

            // PRate1
            $this->PRate1->LinkCustomAttributes = "";
            $this->PRate1->HrefValue = "";
            $this->PRate1->TooltipValue = "";

            // PRate2
            $this->PRate2->LinkCustomAttributes = "";
            $this->PRate2->HrefValue = "";
            $this->PRate2->TooltipValue = "";

            // LPItemCost
            $this->LPItemCost->LinkCustomAttributes = "";
            $this->LPItemCost->HrefValue = "";
            $this->LPItemCost->TooltipValue = "";

            // FixedItemCost
            $this->FixedItemCost->LinkCustomAttributes = "";
            $this->FixedItemCost->HrefValue = "";
            $this->FixedItemCost->TooltipValue = "";

            // HSNId
            $this->HSNId->LinkCustomAttributes = "";
            $this->HSNId->HrefValue = "";
            $this->HSNId->TooltipValue = "";

            // TaxInclusive
            $this->TaxInclusive->LinkCustomAttributes = "";
            $this->TaxInclusive->HrefValue = "";
            $this->TaxInclusive->TooltipValue = "";

            // EligibleforWarranty
            $this->EligibleforWarranty->LinkCustomAttributes = "";
            $this->EligibleforWarranty->HrefValue = "";
            $this->EligibleforWarranty->TooltipValue = "";

            // NoofMonthsWarranty
            $this->NoofMonthsWarranty->LinkCustomAttributes = "";
            $this->NoofMonthsWarranty->HrefValue = "";
            $this->NoofMonthsWarranty->TooltipValue = "";

            // ComputeTaxonCost
            $this->ComputeTaxonCost->LinkCustomAttributes = "";
            $this->ComputeTaxonCost->HrefValue = "";
            $this->ComputeTaxonCost->TooltipValue = "";

            // HasEmptyBottleTrack
            $this->HasEmptyBottleTrack->LinkCustomAttributes = "";
            $this->HasEmptyBottleTrack->HrefValue = "";
            $this->HasEmptyBottleTrack->TooltipValue = "";

            // EmptyBottleReferenceCode
            $this->EmptyBottleReferenceCode->LinkCustomAttributes = "";
            $this->EmptyBottleReferenceCode->HrefValue = "";
            $this->EmptyBottleReferenceCode->TooltipValue = "";

            // AdditionalCESSAmount
            $this->AdditionalCESSAmount->LinkCustomAttributes = "";
            $this->AdditionalCESSAmount->HrefValue = "";
            $this->AdditionalCESSAmount->TooltipValue = "";

            // EmptyBottleRate
            $this->EmptyBottleRate->LinkCustomAttributes = "";
            $this->EmptyBottleRate->HrefValue = "";
            $this->EmptyBottleRate->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpharmacy_productslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpharmacy_productslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpharmacy_productslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
            }
        } elseif (SameText($type, "html")) {
            return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
        } elseif (SameText($type, "xml")) {
            return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
        } elseif (SameText($type, "csv")) {
            return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
        } elseif (SameText($type, "email")) {
            $url = $custom ? ",url:'" . $pageUrl . "export=email&amp;custom=1'" : "";
            return '<button id="emf_pharmacy_products" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_pharmacy_products\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpharmacy_productslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
        } elseif (SameText($type, "print")) {
            return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
        }
    }

    // Set up export options
    protected function setupExportOptions()
    {
        global $Language;

        // Printer friendly
        $item = &$this->ExportOptions->add("print");
        $item->Body = $this->getExportTag("print");
        $item->Visible = true;

        // Export to Excel
        $item = &$this->ExportOptions->add("excel");
        $item->Body = $this->getExportTag("excel");
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word");
        $item->Visible = true;

        // Export to Html
        $item = &$this->ExportOptions->add("html");
        $item->Body = $this->getExportTag("html");
        $item->Visible = true;

        // Export to Xml
        $item = &$this->ExportOptions->add("xml");
        $item->Body = $this->getExportTag("xml");
        $item->Visible = true;

        // Export to Csv
        $item = &$this->ExportOptions->add("csv");
        $item->Body = $this->getExportTag("csv");
        $item->Visible = true;

        // Export to Pdf
        $item = &$this->ExportOptions->add("pdf");
        $item->Body = $this->getExportTag("pdf");
        $item->Visible = false;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email");
        $item->Visible = false;

        // Drop down button for export
        $this->ExportOptions->UseButtonGroup = true;
        $this->ExportOptions->UseDropDownButton = true;
        if ($this->ExportOptions->UseButtonGroup && IsMobile()) {
            $this->ExportOptions->UseDropDownButton = true;
        }
        $this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

        // Add group option item
        $item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Set up search options
    protected function setupSearchOptions()
    {
        global $Language, $Security;
        $pageUrl = $this->pageUrl();
        $this->SearchOptions = new ListOptions("div");
        $this->SearchOptions->TagClassName = "ew-search-option";

        // Search button
        $item = &$this->SearchOptions->add("searchtoggle");
        $searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_productslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Button group for search
        $this->SearchOptions->UseDropDownButton = false;
        $this->SearchOptions->UseButtonGroup = true;
        $this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

        // Add group option item
        $item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide search options
        if ($this->isExport() || $this->CurrentAction) {
            $this->SearchOptions->hideAllOptions();
        }
        if (!$Security->canSearch()) {
            $this->SearchOptions->hideAllOptions();
            $this->FilterOptions->hideAllOptions();
        }
    }

    /**
    * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
    *
    * @param bool $return Return the data rather than output it
    * @return mixed
    */
    public function exportData($return = false)
    {
        global $Language;
        $utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");

        // Load recordset
        $this->TotalRecords = $this->listRecordCount();
        $this->StartRecord = 1;

        // Export all
        if ($this->ExportAll) {
            if (Config("EXPORT_ALL_TIME_LIMIT") >= 0) {
                @set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
            }
            $this->DisplayRecords = $this->TotalRecords;
            $this->StopRecord = $this->TotalRecords;
        } else { // Export one page only
            $this->setupStartRecord(); // Set up start record position
            // Set the last record to display
            if ($this->DisplayRecords <= 0) {
                $this->StopRecord = $this->TotalRecords;
            } else {
                $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
            }
        }
        $rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
        $this->ExportDoc = GetExportDocument($this, "h");
        $doc = &$this->ExportDoc;
        if (!$doc) {
            $this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
        }
        if (!$rs || !$doc) {
            RemoveHeader("Content-Type"); // Remove header
            RemoveHeader("Content-Disposition");
            $this->showMessage();
            return;
        }
        $this->StartRecord = 1;
        $this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;

        // Call Page Exporting server event
        $this->ExportDoc->ExportCustom = !$this->pageExporting();
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        $doc->Text .= $header;
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        $doc->Text .= $footer;

        // Close recordset
        $rs->close();

        // Call Page Exported server event
        $this->pageExported();

        // Export header and footer
        $doc->exportHeaderAndFooter();

        // Clean output buffer (without destroying output buffer)
        $buffer = ob_get_contents(); // Save the output buffer
        if (!Config("DEBUG") && $buffer) {
            ob_clean();
        }

        // Write debug message if enabled
        if (Config("DEBUG") && !$this->isExport("pdf")) {
            echo GetDebugMessage();
        }

        // Output data
        if ($this->isExport("email")) {
            // Export-to-email disabled
        } else {
            $doc->export();
            if ($return) {
                RemoveHeader("Content-Type"); // Remove header
                RemoveHeader("Content-Disposition");
                $content = ob_get_contents();
                if ($content) {
                    ob_clean();
                }
                if ($buffer) {
                    echo $buffer; // Resume the output buffer
                }
                return $content;
            }
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
        $Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, true);
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

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        if ($this->isPageRequest()) { // Validate request
            $startRec = Get(Config("TABLE_START_REC"));
            $pageNo = Get(Config("TABLE_PAGE_NO"));
            if ($pageNo !== null) { // Check for "pageno" parameter first
                if (is_numeric($pageNo)) {
                    $this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
                    if ($this->StartRecord <= 0) {
                        $this->StartRecord = 1;
                    } elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1) {
                        $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1;
                    }
                    $this->setStartRecordNumber($this->StartRecord);
                }
            } elseif ($startRec !== null) { // Check for "start" parameter
                $this->StartRecord = $startRec;
                $this->setStartRecordNumber($this->StartRecord);
            }
        }
        $this->StartRecord = $this->getStartRecordNumber();

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
            $this->setStartRecordNumber($this->StartRecord);
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
            $this->setStartRecordNumber($this->StartRecord);
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

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
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

    // Row Custom Action event
    public function rowCustomAction($action, $row)
    {
        // Return false to abort
        return true;
    }

    // Page Exporting event
    // $this->ExportDoc = export document object
    public function pageExporting()
    {
        //$this->ExportDoc->Text = "my header"; // Export header
        //return false; // Return false to skip default export and use Row_Export event
        return true; // Return true to use default export and skip Row_Export event
    }

    // Row Export event
    // $this->ExportDoc = export document object
    public function rowExport($rs)
    {
        //$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
    }

    // Page Exported event
    // $this->ExportDoc = export document object
    public function pageExported()
    {
        //$this->ExportDoc->Text .= "my footer"; // Export footer
        //Log($this->ExportDoc->Text);
    }

    // Page Importing event
    public function pageImporting($reader, &$options)
    {
        //var_dump($reader); // Import data reader
        //var_dump($options); // Show all options for importing
        //return false; // Return false to skip import
        return true;
    }

    // Row Import event
    public function rowImport(&$row, $cnt)
    {
        //Log($cnt); // Import record count
        //var_dump($row); // Import row
        //return false; // Return false to skip import
        return true;
    }

    // Page Imported event
    public function pageImported($reader, $results)
    {
        //var_dump($reader); // Import data reader
        //var_dump($results); // Import results
    }
}

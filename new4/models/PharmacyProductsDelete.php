<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyProductsDelete extends PharmacyProducts
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_products';

    // Page object name
    public $PageObjName = "PharmacyProductsDelete";

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

        // Table object (pharmacy_products)
        if (!isset($GLOBALS["pharmacy_products"]) || get_class($GLOBALS["pharmacy_products"]) == PROJECT_NAMESPACE . "pharmacy_products") {
            $GLOBALS["pharmacy_products"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

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
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PharmacyProductsList"); // Prevent SQL injection, return to list
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
                $this->terminate("PharmacyProductsList"); // Return to list
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

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

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
                $thisKey .= $row['ProductCode'];
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyProductsList"), "", $this->TableVar, true);
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

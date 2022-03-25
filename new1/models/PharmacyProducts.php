<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for pharmacy_products
 */
class PharmacyProducts extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;
    public $UseCustomTemplate = false; // Use custom template

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $ProductCode;
    public $ProductName;
    public $DivisionCode;
    public $ManufacturerCode;
    public $SupplierCode;
    public $AlternateSupplierCodes;
    public $AlternateProductCode;
    public $UniversalProductCode;
    public $BookProductCode;
    public $OldCode;
    public $ProtectedProducts;
    public $ProductFullName;
    public $UnitOfMeasure;
    public $UnitDescription;
    public $BulkDescription;
    public $BarCodeDescription;
    public $PackageInformation;
    public $PackageId;
    public $Weight;
    public $AllowFractions;
    public $MinimumStockLevel;
    public $MaximumStockLevel;
    public $ReorderLevel;
    public $MinMaxRatio;
    public $AutoMinMaxRatio;
    public $ScheduleCode;
    public $RopRatio;
    public $MRP;
    public $PurchasePrice;
    public $PurchaseUnit;
    public $PurchaseTaxCode;
    public $AllowDirectInward;
    public $SalePrice;
    public $SaleUnit;
    public $SalesTaxCode;
    public $StockReceived;
    public $TotalStock;
    public $StockType;
    public $StockCheckDate;
    public $StockAdjustmentDate;
    public $Remarks;
    public $CostCentre;
    public $ProductType;
    public $TaxAmount;
    public $TaxId;
    public $ResaleTaxApplicable;
    public $CstOtherTax;
    public $TotalTax;
    public $ItemCost;
    public $ExpiryDate;
    public $BatchDescription;
    public $FreeScheme;
    public $CashDiscountEligibility;
    public $DiscountPerAllowInBill;
    public $Discount;
    public $TotalAmount;
    public $StandardMargin;
    public $Margin;
    public $MarginId;
    public $ExpectedMargin;
    public $SurchargeBeforeTax;
    public $SurchargeAfterTax;
    public $TempOrderNo;
    public $TempOrderDate;
    public $OrderUnit;
    public $OrderQuantity;
    public $MarkForOrder;
    public $OrderAllId;
    public $CalculateOrderQty;
    public $SubLocation;
    public $CategoryCode;
    public $SubCategory;
    public $FlexCategoryCode;
    public $ABCSaleQty;
    public $ABCSaleValue;
    public $ConvertionFactor;
    public $ConvertionUnitDesc;
    public $TransactionId;
    public $SoldProductId;
    public $WantedBookId;
    public $AllId;
    public $BatchAndExpiryCompulsory;
    public $BatchStockForWantedBook;
    public $UnitBasedBilling;
    public $DoNotCheckStock;
    public $AcceptRate;
    public $PriceLevel;
    public $LastQuotePrice;
    public $PriceChange;
    public $CommodityCode;
    public $InstitutePrice;
    public $CtrlOrDCtrlProduct;
    public $ImportedDate;
    public $IsImported;
    public $FileName;
    public $LPName;
    public $GodownNumber;
    public $CreationDate;
    public $CreatedbyUser;
    public $ModifiedDate;
    public $ModifiedbyUser;
    public $isActive;
    public $AllowExpiryClaim;
    public $BrandCode;
    public $FreeSchemeBasedon;
    public $DoNotCheckCostInBill;
    public $ProductGroupCode;
    public $ProductStrengthCode;
    public $PackingCode;
    public $ComputedMinStock;
    public $ComputedMaxStock;
    public $ProductRemark;
    public $ProductDrugCode;
    public $IsMatrixProduct;
    public $AttributeCount1;
    public $AttributeCount2;
    public $AttributeCount3;
    public $AttributeCount4;
    public $AttributeCount5;
    public $DefaultDiscountPercentage;
    public $DonotPrintBarcode;
    public $ProductLevelDiscount;
    public $Markup;
    public $MarkDown;
    public $ReworkSalePrice;
    public $MultipleInput;
    public $LpPackageInformation;
    public $AllowNegativeStock;
    public $OrderDate;
    public $OrderTime;
    public $RateGroupCode;
    public $ConversionCaseLot;
    public $ShippingLot;
    public $AllowExpiryReplacement;
    public $NoOfMonthExpiryAllowed;
    public $ProductDiscountEligibility;
    public $ScheduleTypeCode;
    public $AIOCDProductCode;
    public $FreeQuantity;
    public $DiscountType;
    public $DiscountValue;
    public $HasProductOrderAttribute;
    public $FirstPODate;
    public $SaleprcieAndMrpCalcPercent;
    public $IsGiftVoucherProducts;
    public $AcceptRange4SerialNumber;
    public $GiftVoucherDenomination;
    public $Subclasscode;
    public $BarCodeFromWeighingMachine;
    public $CheckCostInReturn;
    public $FrequentSaleProduct;
    public $RateType;
    public $TouchscreenName;
    public $FreeType;
    public $LooseQtyasNewBatch;
    public $AllowSlabBilling;
    public $ProductTypeForProduction;
    public $RecipeCode;
    public $DefaultUnitType;
    public $PIstatus;
    public $LastPiConfirmedDate;
    public $BarCodeDesign;
    public $AcceptRemarksInBill;
    public $Classification;
    public $TimeSlot;
    public $IsBundle;
    public $ColorCode;
    public $GenderCode;
    public $SizeCode;
    public $GiftCard;
    public $ToonLabel;
    public $GarmentType;
    public $AgeGroup;
    public $Season;
    public $DailyStockEntry;
    public $ModifierApplicable;
    public $ModifierType;
    public $AcceptZeroRate;
    public $ExciseDutyCode;
    public $IndentProductGroupCode;
    public $IsMultiBatch;
    public $IsSingleBatch;
    public $MarkUpRate1;
    public $MarkDownRate1;
    public $MarkUpRate2;
    public $MarkDownRate2;
    public $_Yield;
    public $RefProductCode;
    public $Volume;
    public $MeasurementID;
    public $CountryCode;
    public $AcceptWMQty;
    public $SingleBatchBasedOnRate;
    public $TenderNo;
    public $SingleBillMaximumSoldQtyFiled;
    public $Strength1;
    public $Strength2;
    public $Strength3;
    public $Strength4;
    public $Strength5;
    public $IngredientCode1;
    public $IngredientCode2;
    public $IngredientCode3;
    public $IngredientCode4;
    public $IngredientCode5;
    public $OrderType;
    public $StockUOM;
    public $PriceUOM;
    public $DefaultSaleUOM;
    public $DefaultPurchaseUOM;
    public $ReportingUOM;
    public $LastPurchasedUOM;
    public $TreatmentCodes;
    public $InsuranceType;
    public $CoverageGroupCodes;
    public $MultipleUOM;
    public $SalePriceComputation;
    public $StockCorrection;
    public $LBTPercentage;
    public $SalesCommission;
    public $LockedStock;
    public $MinMaxUOM;
    public $ExpiryMfrDateFormat;
    public $ProductLifeTime;
    public $IsCombo;
    public $ComboTypeCode;
    public $AttributeCount6;
    public $AttributeCount7;
    public $AttributeCount8;
    public $AttributeCount9;
    public $AttributeCount10;
    public $LabourCharge;
    public $AffectOtherCharge;
    public $DosageInfo;
    public $DosageType;
    public $DefaultIndentUOM;
    public $PromoTag;
    public $BillLevelPromoTag;
    public $IsMRPProduct;
    public $MrpList;
    public $AlternateSaleUOM;
    public $FreeUOM;
    public $MarketedCode;
    public $MinimumSalePrice;
    public $PRate1;
    public $PRate2;
    public $LPItemCost;
    public $FixedItemCost;
    public $HSNId;
    public $TaxInclusive;
    public $EligibleforWarranty;
    public $NoofMonthsWarranty;
    public $ComputeTaxonCost;
    public $HasEmptyBottleTrack;
    public $EmptyBottleReferenceCode;
    public $AdditionalCESSAmount;
    public $EmptyBottleRate;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'pharmacy_products';
        $this->TableName = 'pharmacy_products';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`pharmacy_products`";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // ProductCode
        $this->ProductCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductCode', 'ProductCode', '`ProductCode`', '`ProductCode`', 3, 11, -1, false, '`ProductCode`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->ProductCode->IsAutoIncrement = true; // Autoincrement field
        $this->ProductCode->IsPrimaryKey = true; // Primary key field
        $this->ProductCode->Sortable = true; // Allow sort
        $this->ProductCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductCode'] = &$this->ProductCode;

        // ProductName
        $this->ProductName = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductName', 'ProductName', '`ProductName`', '`ProductName`', 200, 250, -1, false, '`ProductName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductName->Sortable = true; // Allow sort
        $this->Fields['ProductName'] = &$this->ProductName;

        // DivisionCode
        $this->DivisionCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_DivisionCode', 'DivisionCode', '`DivisionCode`', '`DivisionCode`', 200, 15, -1, false, '`DivisionCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DivisionCode->Sortable = true; // Allow sort
        $this->Fields['DivisionCode'] = &$this->DivisionCode;

        // ManufacturerCode
        $this->ManufacturerCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ManufacturerCode', 'ManufacturerCode', '`ManufacturerCode`', '`ManufacturerCode`', 200, 15, -1, false, '`ManufacturerCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ManufacturerCode->Sortable = true; // Allow sort
        $this->Fields['ManufacturerCode'] = &$this->ManufacturerCode;

        // SupplierCode
        $this->SupplierCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_SupplierCode', 'SupplierCode', '`SupplierCode`', '`SupplierCode`', 200, 15, -1, false, '`SupplierCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SupplierCode->Sortable = true; // Allow sort
        $this->Fields['SupplierCode'] = &$this->SupplierCode;

        // AlternateSupplierCodes
        $this->AlternateSupplierCodes = new DbField('pharmacy_products', 'pharmacy_products', 'x_AlternateSupplierCodes', 'AlternateSupplierCodes', '`AlternateSupplierCodes`', '`AlternateSupplierCodes`', 200, 250, -1, false, '`AlternateSupplierCodes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlternateSupplierCodes->Sortable = true; // Allow sort
        $this->Fields['AlternateSupplierCodes'] = &$this->AlternateSupplierCodes;

        // AlternateProductCode
        $this->AlternateProductCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_AlternateProductCode', 'AlternateProductCode', '`AlternateProductCode`', '`AlternateProductCode`', 200, 120, -1, false, '`AlternateProductCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlternateProductCode->Sortable = true; // Allow sort
        $this->Fields['AlternateProductCode'] = &$this->AlternateProductCode;

        // UniversalProductCode
        $this->UniversalProductCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_UniversalProductCode', 'UniversalProductCode', '`UniversalProductCode`', '`UniversalProductCode`', 3, 11, -1, false, '`UniversalProductCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UniversalProductCode->Sortable = true; // Allow sort
        $this->UniversalProductCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['UniversalProductCode'] = &$this->UniversalProductCode;

        // BookProductCode
        $this->BookProductCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_BookProductCode', 'BookProductCode', '`BookProductCode`', '`BookProductCode`', 3, 11, -1, false, '`BookProductCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BookProductCode->Sortable = true; // Allow sort
        $this->BookProductCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BookProductCode'] = &$this->BookProductCode;

        // OldCode
        $this->OldCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_OldCode', 'OldCode', '`OldCode`', '`OldCode`', 200, 50, -1, false, '`OldCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OldCode->Sortable = true; // Allow sort
        $this->Fields['OldCode'] = &$this->OldCode;

        // ProtectedProducts
        $this->ProtectedProducts = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProtectedProducts', 'ProtectedProducts', '`ProtectedProducts`', '`ProtectedProducts`', 16, 4, -1, false, '`ProtectedProducts`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProtectedProducts->Sortable = true; // Allow sort
        $this->ProtectedProducts->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProtectedProducts'] = &$this->ProtectedProducts;

        // ProductFullName
        $this->ProductFullName = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductFullName', 'ProductFullName', '`ProductFullName`', '`ProductFullName`', 200, 250, -1, false, '`ProductFullName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductFullName->Sortable = true; // Allow sort
        $this->Fields['ProductFullName'] = &$this->ProductFullName;

        // UnitOfMeasure
        $this->UnitOfMeasure = new DbField('pharmacy_products', 'pharmacy_products', 'x_UnitOfMeasure', 'UnitOfMeasure', '`UnitOfMeasure`', '`UnitOfMeasure`', 3, 11, -1, false, '`UnitOfMeasure`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitOfMeasure->Sortable = true; // Allow sort
        $this->UnitOfMeasure->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['UnitOfMeasure'] = &$this->UnitOfMeasure;

        // UnitDescription
        $this->UnitDescription = new DbField('pharmacy_products', 'pharmacy_products', 'x_UnitDescription', 'UnitDescription', '`UnitDescription`', '`UnitDescription`', 200, 50, -1, false, '`UnitDescription`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitDescription->Sortable = true; // Allow sort
        $this->Fields['UnitDescription'] = &$this->UnitDescription;

        // BulkDescription
        $this->BulkDescription = new DbField('pharmacy_products', 'pharmacy_products', 'x_BulkDescription', 'BulkDescription', '`BulkDescription`', '`BulkDescription`', 200, 50, -1, false, '`BulkDescription`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BulkDescription->Sortable = true; // Allow sort
        $this->Fields['BulkDescription'] = &$this->BulkDescription;

        // BarCodeDescription
        $this->BarCodeDescription = new DbField('pharmacy_products', 'pharmacy_products', 'x_BarCodeDescription', 'BarCodeDescription', '`BarCodeDescription`', '`BarCodeDescription`', 200, 50, -1, false, '`BarCodeDescription`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BarCodeDescription->Sortable = true; // Allow sort
        $this->Fields['BarCodeDescription'] = &$this->BarCodeDescription;

        // PackageInformation
        $this->PackageInformation = new DbField('pharmacy_products', 'pharmacy_products', 'x_PackageInformation', 'PackageInformation', '`PackageInformation`', '`PackageInformation`', 200, 50, -1, false, '`PackageInformation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PackageInformation->Sortable = true; // Allow sort
        $this->Fields['PackageInformation'] = &$this->PackageInformation;

        // PackageId
        $this->PackageId = new DbField('pharmacy_products', 'pharmacy_products', 'x_PackageId', 'PackageId', '`PackageId`', '`PackageId`', 3, 11, -1, false, '`PackageId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PackageId->Sortable = true; // Allow sort
        $this->PackageId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PackageId'] = &$this->PackageId;

        // Weight
        $this->Weight = new DbField('pharmacy_products', 'pharmacy_products', 'x_Weight', 'Weight', '`Weight`', '`Weight`', 5, 22, -1, false, '`Weight`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Weight->Sortable = true; // Allow sort
        $this->Weight->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Weight->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Weight'] = &$this->Weight;

        // AllowFractions
        $this->AllowFractions = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllowFractions', 'AllowFractions', '`AllowFractions`', '`AllowFractions`', 16, 4, -1, false, '`AllowFractions`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllowFractions->Sortable = true; // Allow sort
        $this->AllowFractions->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllowFractions'] = &$this->AllowFractions;

        // MinimumStockLevel
        $this->MinimumStockLevel = new DbField('pharmacy_products', 'pharmacy_products', 'x_MinimumStockLevel', 'MinimumStockLevel', '`MinimumStockLevel`', '`MinimumStockLevel`', 5, 22, -1, false, '`MinimumStockLevel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MinimumStockLevel->Sortable = true; // Allow sort
        $this->MinimumStockLevel->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MinimumStockLevel->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MinimumStockLevel'] = &$this->MinimumStockLevel;

        // MaximumStockLevel
        $this->MaximumStockLevel = new DbField('pharmacy_products', 'pharmacy_products', 'x_MaximumStockLevel', 'MaximumStockLevel', '`MaximumStockLevel`', '`MaximumStockLevel`', 5, 22, -1, false, '`MaximumStockLevel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MaximumStockLevel->Sortable = true; // Allow sort
        $this->MaximumStockLevel->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MaximumStockLevel->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MaximumStockLevel'] = &$this->MaximumStockLevel;

        // ReorderLevel
        $this->ReorderLevel = new DbField('pharmacy_products', 'pharmacy_products', 'x_ReorderLevel', 'ReorderLevel', '`ReorderLevel`', '`ReorderLevel`', 5, 22, -1, false, '`ReorderLevel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReorderLevel->Sortable = true; // Allow sort
        $this->ReorderLevel->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ReorderLevel->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ReorderLevel'] = &$this->ReorderLevel;

        // MinMaxRatio
        $this->MinMaxRatio = new DbField('pharmacy_products', 'pharmacy_products', 'x_MinMaxRatio', 'MinMaxRatio', '`MinMaxRatio`', '`MinMaxRatio`', 5, 22, -1, false, '`MinMaxRatio`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MinMaxRatio->Sortable = true; // Allow sort
        $this->MinMaxRatio->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MinMaxRatio->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MinMaxRatio'] = &$this->MinMaxRatio;

        // AutoMinMaxRatio
        $this->AutoMinMaxRatio = new DbField('pharmacy_products', 'pharmacy_products', 'x_AutoMinMaxRatio', 'AutoMinMaxRatio', '`AutoMinMaxRatio`', '`AutoMinMaxRatio`', 5, 22, -1, false, '`AutoMinMaxRatio`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AutoMinMaxRatio->Sortable = true; // Allow sort
        $this->AutoMinMaxRatio->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->AutoMinMaxRatio->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['AutoMinMaxRatio'] = &$this->AutoMinMaxRatio;

        // ScheduleCode
        $this->ScheduleCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ScheduleCode', 'ScheduleCode', '`ScheduleCode`', '`ScheduleCode`', 3, 11, -1, false, '`ScheduleCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ScheduleCode->Sortable = true; // Allow sort
        $this->ScheduleCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ScheduleCode'] = &$this->ScheduleCode;

        // RopRatio
        $this->RopRatio = new DbField('pharmacy_products', 'pharmacy_products', 'x_RopRatio', 'RopRatio', '`RopRatio`', '`RopRatio`', 5, 22, -1, false, '`RopRatio`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RopRatio->Sortable = true; // Allow sort
        $this->RopRatio->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->RopRatio->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['RopRatio'] = &$this->RopRatio;

        // MRP
        $this->MRP = new DbField('pharmacy_products', 'pharmacy_products', 'x_MRP', 'MRP', '`MRP`', '`MRP`', 5, 22, -1, false, '`MRP`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MRP->Sortable = true; // Allow sort
        $this->MRP->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MRP->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MRP'] = &$this->MRP;

        // PurchasePrice
        $this->PurchasePrice = new DbField('pharmacy_products', 'pharmacy_products', 'x_PurchasePrice', 'PurchasePrice', '`PurchasePrice`', '`PurchasePrice`', 5, 22, -1, false, '`PurchasePrice`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchasePrice->Sortable = true; // Allow sort
        $this->PurchasePrice->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchasePrice->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurchasePrice'] = &$this->PurchasePrice;

        // PurchaseUnit
        $this->PurchaseUnit = new DbField('pharmacy_products', 'pharmacy_products', 'x_PurchaseUnit', 'PurchaseUnit', '`PurchaseUnit`', '`PurchaseUnit`', 5, 22, -1, false, '`PurchaseUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchaseUnit->Sortable = true; // Allow sort
        $this->PurchaseUnit->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PurchaseUnit->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PurchaseUnit'] = &$this->PurchaseUnit;

        // PurchaseTaxCode
        $this->PurchaseTaxCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_PurchaseTaxCode', 'PurchaseTaxCode', '`PurchaseTaxCode`', '`PurchaseTaxCode`', 3, 11, -1, false, '`PurchaseTaxCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PurchaseTaxCode->Sortable = true; // Allow sort
        $this->PurchaseTaxCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PurchaseTaxCode'] = &$this->PurchaseTaxCode;

        // AllowDirectInward
        $this->AllowDirectInward = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllowDirectInward', 'AllowDirectInward', '`AllowDirectInward`', '`AllowDirectInward`', 16, 4, -1, false, '`AllowDirectInward`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllowDirectInward->Sortable = true; // Allow sort
        $this->AllowDirectInward->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllowDirectInward'] = &$this->AllowDirectInward;

        // SalePrice
        $this->SalePrice = new DbField('pharmacy_products', 'pharmacy_products', 'x_SalePrice', 'SalePrice', '`SalePrice`', '`SalePrice`', 5, 22, -1, false, '`SalePrice`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalePrice->Sortable = true; // Allow sort
        $this->SalePrice->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalePrice->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SalePrice'] = &$this->SalePrice;

        // SaleUnit
        $this->SaleUnit = new DbField('pharmacy_products', 'pharmacy_products', 'x_SaleUnit', 'SaleUnit', '`SaleUnit`', '`SaleUnit`', 5, 22, -1, false, '`SaleUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SaleUnit->Sortable = true; // Allow sort
        $this->SaleUnit->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SaleUnit->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SaleUnit'] = &$this->SaleUnit;

        // SalesTaxCode
        $this->SalesTaxCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_SalesTaxCode', 'SalesTaxCode', '`SalesTaxCode`', '`SalesTaxCode`', 3, 11, -1, false, '`SalesTaxCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalesTaxCode->Sortable = true; // Allow sort
        $this->SalesTaxCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SalesTaxCode'] = &$this->SalesTaxCode;

        // StockReceived
        $this->StockReceived = new DbField('pharmacy_products', 'pharmacy_products', 'x_StockReceived', 'StockReceived', '`StockReceived`', '`StockReceived`', 5, 22, -1, false, '`StockReceived`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StockReceived->Sortable = true; // Allow sort
        $this->StockReceived->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->StockReceived->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['StockReceived'] = &$this->StockReceived;

        // TotalStock
        $this->TotalStock = new DbField('pharmacy_products', 'pharmacy_products', 'x_TotalStock', 'TotalStock', '`TotalStock`', '`TotalStock`', 5, 22, -1, false, '`TotalStock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalStock->Sortable = true; // Allow sort
        $this->TotalStock->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalStock->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TotalStock'] = &$this->TotalStock;

        // StockType
        $this->StockType = new DbField('pharmacy_products', 'pharmacy_products', 'x_StockType', 'StockType', '`StockType`', '`StockType`', 2, 6, -1, false, '`StockType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StockType->Sortable = true; // Allow sort
        $this->StockType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['StockType'] = &$this->StockType;

        // StockCheckDate
        $this->StockCheckDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_StockCheckDate', 'StockCheckDate', '`StockCheckDate`', CastDateFieldForLike("`StockCheckDate`", 0, "DB"), 135, 23, 0, false, '`StockCheckDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StockCheckDate->Sortable = true; // Allow sort
        $this->StockCheckDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['StockCheckDate'] = &$this->StockCheckDate;

        // StockAdjustmentDate
        $this->StockAdjustmentDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_StockAdjustmentDate', 'StockAdjustmentDate', '`StockAdjustmentDate`', CastDateFieldForLike("`StockAdjustmentDate`", 0, "DB"), 135, 23, 0, false, '`StockAdjustmentDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StockAdjustmentDate->Sortable = true; // Allow sort
        $this->StockAdjustmentDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['StockAdjustmentDate'] = &$this->StockAdjustmentDate;

        // Remarks
        $this->Remarks = new DbField('pharmacy_products', 'pharmacy_products', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 200, 100, -1, false, '`Remarks`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Remarks->Sortable = true; // Allow sort
        $this->Fields['Remarks'] = &$this->Remarks;

        // CostCentre
        $this->CostCentre = new DbField('pharmacy_products', 'pharmacy_products', 'x_CostCentre', 'CostCentre', '`CostCentre`', '`CostCentre`', 3, 11, -1, false, '`CostCentre`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CostCentre->Sortable = true; // Allow sort
        $this->CostCentre->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CostCentre'] = &$this->CostCentre;

        // ProductType
        $this->ProductType = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductType', 'ProductType', '`ProductType`', '`ProductType`', 3, 11, -1, false, '`ProductType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductType->Sortable = true; // Allow sort
        $this->ProductType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductType'] = &$this->ProductType;

        // TaxAmount
        $this->TaxAmount = new DbField('pharmacy_products', 'pharmacy_products', 'x_TaxAmount', 'TaxAmount', '`TaxAmount`', '`TaxAmount`', 5, 22, -1, false, '`TaxAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TaxAmount->Sortable = true; // Allow sort
        $this->TaxAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TaxAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TaxAmount'] = &$this->TaxAmount;

        // TaxId
        $this->TaxId = new DbField('pharmacy_products', 'pharmacy_products', 'x_TaxId', 'TaxId', '`TaxId`', '`TaxId`', 3, 11, -1, false, '`TaxId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TaxId->Sortable = true; // Allow sort
        $this->TaxId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TaxId'] = &$this->TaxId;

        // ResaleTaxApplicable
        $this->ResaleTaxApplicable = new DbField('pharmacy_products', 'pharmacy_products', 'x_ResaleTaxApplicable', 'ResaleTaxApplicable', '`ResaleTaxApplicable`', '`ResaleTaxApplicable`', 16, 4, -1, false, '`ResaleTaxApplicable`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ResaleTaxApplicable->Sortable = true; // Allow sort
        $this->ResaleTaxApplicable->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ResaleTaxApplicable'] = &$this->ResaleTaxApplicable;

        // CstOtherTax
        $this->CstOtherTax = new DbField('pharmacy_products', 'pharmacy_products', 'x_CstOtherTax', 'CstOtherTax', '`CstOtherTax`', '`CstOtherTax`', 200, 50, -1, false, '`CstOtherTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CstOtherTax->Sortable = true; // Allow sort
        $this->Fields['CstOtherTax'] = &$this->CstOtherTax;

        // TotalTax
        $this->TotalTax = new DbField('pharmacy_products', 'pharmacy_products', 'x_TotalTax', 'TotalTax', '`TotalTax`', '`TotalTax`', 5, 22, -1, false, '`TotalTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalTax->Sortable = true; // Allow sort
        $this->TotalTax->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TotalTax'] = &$this->TotalTax;

        // ItemCost
        $this->ItemCost = new DbField('pharmacy_products', 'pharmacy_products', 'x_ItemCost', 'ItemCost', '`ItemCost`', '`ItemCost`', 5, 22, -1, false, '`ItemCost`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ItemCost->Sortable = true; // Allow sort
        $this->ItemCost->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ItemCost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ItemCost'] = &$this->ItemCost;

        // ExpiryDate
        $this->ExpiryDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_ExpiryDate', 'ExpiryDate', '`ExpiryDate`', CastDateFieldForLike("`ExpiryDate`", 0, "DB"), 135, 23, 0, false, '`ExpiryDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExpiryDate->Sortable = true; // Allow sort
        $this->ExpiryDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ExpiryDate'] = &$this->ExpiryDate;

        // BatchDescription
        $this->BatchDescription = new DbField('pharmacy_products', 'pharmacy_products', 'x_BatchDescription', 'BatchDescription', '`BatchDescription`', '`BatchDescription`', 200, 50, -1, false, '`BatchDescription`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BatchDescription->Sortable = true; // Allow sort
        $this->Fields['BatchDescription'] = &$this->BatchDescription;

        // FreeScheme
        $this->FreeScheme = new DbField('pharmacy_products', 'pharmacy_products', 'x_FreeScheme', 'FreeScheme', '`FreeScheme`', '`FreeScheme`', 16, 4, -1, false, '`FreeScheme`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeScheme->Sortable = true; // Allow sort
        $this->FreeScheme->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FreeScheme'] = &$this->FreeScheme;

        // CashDiscountEligibility
        $this->CashDiscountEligibility = new DbField('pharmacy_products', 'pharmacy_products', 'x_CashDiscountEligibility', 'CashDiscountEligibility', '`CashDiscountEligibility`', '`CashDiscountEligibility`', 16, 4, -1, false, '`CashDiscountEligibility`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CashDiscountEligibility->Sortable = true; // Allow sort
        $this->CashDiscountEligibility->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CashDiscountEligibility'] = &$this->CashDiscountEligibility;

        // DiscountPerAllowInBill
        $this->DiscountPerAllowInBill = new DbField('pharmacy_products', 'pharmacy_products', 'x_DiscountPerAllowInBill', 'DiscountPerAllowInBill', '`DiscountPerAllowInBill`', '`DiscountPerAllowInBill`', 5, 22, -1, false, '`DiscountPerAllowInBill`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountPerAllowInBill->Sortable = true; // Allow sort
        $this->DiscountPerAllowInBill->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DiscountPerAllowInBill->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DiscountPerAllowInBill'] = &$this->DiscountPerAllowInBill;

        // Discount
        $this->Discount = new DbField('pharmacy_products', 'pharmacy_products', 'x_Discount', 'Discount', '`Discount`', '`Discount`', 5, 22, -1, false, '`Discount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Discount->Sortable = true; // Allow sort
        $this->Discount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Discount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Discount'] = &$this->Discount;

        // TotalAmount
        $this->TotalAmount = new DbField('pharmacy_products', 'pharmacy_products', 'x_TotalAmount', 'TotalAmount', '`TotalAmount`', '`TotalAmount`', 5, 22, -1, false, '`TotalAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TotalAmount->Sortable = true; // Allow sort
        $this->TotalAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->TotalAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['TotalAmount'] = &$this->TotalAmount;

        // StandardMargin
        $this->StandardMargin = new DbField('pharmacy_products', 'pharmacy_products', 'x_StandardMargin', 'StandardMargin', '`StandardMargin`', '`StandardMargin`', 5, 22, -1, false, '`StandardMargin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StandardMargin->Sortable = true; // Allow sort
        $this->StandardMargin->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->StandardMargin->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['StandardMargin'] = &$this->StandardMargin;

        // Margin
        $this->Margin = new DbField('pharmacy_products', 'pharmacy_products', 'x_Margin', 'Margin', '`Margin`', '`Margin`', 5, 22, -1, false, '`Margin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Margin->Sortable = true; // Allow sort
        $this->Margin->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Margin->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Margin'] = &$this->Margin;

        // MarginId
        $this->MarginId = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarginId', 'MarginId', '`MarginId`', '`MarginId`', 3, 11, -1, false, '`MarginId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarginId->Sortable = true; // Allow sort
        $this->MarginId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MarginId'] = &$this->MarginId;

        // ExpectedMargin
        $this->ExpectedMargin = new DbField('pharmacy_products', 'pharmacy_products', 'x_ExpectedMargin', 'ExpectedMargin', '`ExpectedMargin`', '`ExpectedMargin`', 5, 22, -1, false, '`ExpectedMargin`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExpectedMargin->Sortable = true; // Allow sort
        $this->ExpectedMargin->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ExpectedMargin->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ExpectedMargin'] = &$this->ExpectedMargin;

        // SurchargeBeforeTax
        $this->SurchargeBeforeTax = new DbField('pharmacy_products', 'pharmacy_products', 'x_SurchargeBeforeTax', 'SurchargeBeforeTax', '`SurchargeBeforeTax`', '`SurchargeBeforeTax`', 5, 22, -1, false, '`SurchargeBeforeTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SurchargeBeforeTax->Sortable = true; // Allow sort
        $this->SurchargeBeforeTax->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SurchargeBeforeTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SurchargeBeforeTax'] = &$this->SurchargeBeforeTax;

        // SurchargeAfterTax
        $this->SurchargeAfterTax = new DbField('pharmacy_products', 'pharmacy_products', 'x_SurchargeAfterTax', 'SurchargeAfterTax', '`SurchargeAfterTax`', '`SurchargeAfterTax`', 5, 22, -1, false, '`SurchargeAfterTax`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SurchargeAfterTax->Sortable = true; // Allow sort
        $this->SurchargeAfterTax->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SurchargeAfterTax->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SurchargeAfterTax'] = &$this->SurchargeAfterTax;

        // TempOrderNo
        $this->TempOrderNo = new DbField('pharmacy_products', 'pharmacy_products', 'x_TempOrderNo', 'TempOrderNo', '`TempOrderNo`', '`TempOrderNo`', 3, 11, -1, false, '`TempOrderNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TempOrderNo->Sortable = true; // Allow sort
        $this->TempOrderNo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TempOrderNo'] = &$this->TempOrderNo;

        // TempOrderDate
        $this->TempOrderDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_TempOrderDate', 'TempOrderDate', '`TempOrderDate`', CastDateFieldForLike("`TempOrderDate`", 0, "DB"), 135, 23, 0, false, '`TempOrderDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TempOrderDate->Sortable = true; // Allow sort
        $this->TempOrderDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['TempOrderDate'] = &$this->TempOrderDate;

        // OrderUnit
        $this->OrderUnit = new DbField('pharmacy_products', 'pharmacy_products', 'x_OrderUnit', 'OrderUnit', '`OrderUnit`', '`OrderUnit`', 5, 22, -1, false, '`OrderUnit`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OrderUnit->Sortable = true; // Allow sort
        $this->OrderUnit->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OrderUnit->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OrderUnit'] = &$this->OrderUnit;

        // OrderQuantity
        $this->OrderQuantity = new DbField('pharmacy_products', 'pharmacy_products', 'x_OrderQuantity', 'OrderQuantity', '`OrderQuantity`', '`OrderQuantity`', 5, 22, -1, false, '`OrderQuantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OrderQuantity->Sortable = true; // Allow sort
        $this->OrderQuantity->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->OrderQuantity->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['OrderQuantity'] = &$this->OrderQuantity;

        // MarkForOrder
        $this->MarkForOrder = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarkForOrder', 'MarkForOrder', '`MarkForOrder`', '`MarkForOrder`', 16, 4, -1, false, '`MarkForOrder`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarkForOrder->Sortable = true; // Allow sort
        $this->MarkForOrder->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MarkForOrder'] = &$this->MarkForOrder;

        // OrderAllId
        $this->OrderAllId = new DbField('pharmacy_products', 'pharmacy_products', 'x_OrderAllId', 'OrderAllId', '`OrderAllId`', '`OrderAllId`', 3, 11, -1, false, '`OrderAllId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OrderAllId->Sortable = true; // Allow sort
        $this->OrderAllId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['OrderAllId'] = &$this->OrderAllId;

        // CalculateOrderQty
        $this->CalculateOrderQty = new DbField('pharmacy_products', 'pharmacy_products', 'x_CalculateOrderQty', 'CalculateOrderQty', '`CalculateOrderQty`', '`CalculateOrderQty`', 5, 22, -1, false, '`CalculateOrderQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CalculateOrderQty->Sortable = true; // Allow sort
        $this->CalculateOrderQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->CalculateOrderQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['CalculateOrderQty'] = &$this->CalculateOrderQty;

        // SubLocation
        $this->SubLocation = new DbField('pharmacy_products', 'pharmacy_products', 'x_SubLocation', 'SubLocation', '`SubLocation`', '`SubLocation`', 200, 50, -1, false, '`SubLocation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SubLocation->Sortable = true; // Allow sort
        $this->Fields['SubLocation'] = &$this->SubLocation;

        // CategoryCode
        $this->CategoryCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_CategoryCode', 'CategoryCode', '`CategoryCode`', '`CategoryCode`', 200, 50, -1, false, '`CategoryCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CategoryCode->Sortable = true; // Allow sort
        $this->Fields['CategoryCode'] = &$this->CategoryCode;

        // SubCategory
        $this->SubCategory = new DbField('pharmacy_products', 'pharmacy_products', 'x_SubCategory', 'SubCategory', '`SubCategory`', '`SubCategory`', 200, 50, -1, false, '`SubCategory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SubCategory->Sortable = true; // Allow sort
        $this->Fields['SubCategory'] = &$this->SubCategory;

        // FlexCategoryCode
        $this->FlexCategoryCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_FlexCategoryCode', 'FlexCategoryCode', '`FlexCategoryCode`', '`FlexCategoryCode`', 3, 11, -1, false, '`FlexCategoryCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FlexCategoryCode->Sortable = true; // Allow sort
        $this->FlexCategoryCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FlexCategoryCode'] = &$this->FlexCategoryCode;

        // ABCSaleQty
        $this->ABCSaleQty = new DbField('pharmacy_products', 'pharmacy_products', 'x_ABCSaleQty', 'ABCSaleQty', '`ABCSaleQty`', '`ABCSaleQty`', 5, 22, -1, false, '`ABCSaleQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ABCSaleQty->Sortable = true; // Allow sort
        $this->ABCSaleQty->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ABCSaleQty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ABCSaleQty'] = &$this->ABCSaleQty;

        // ABCSaleValue
        $this->ABCSaleValue = new DbField('pharmacy_products', 'pharmacy_products', 'x_ABCSaleValue', 'ABCSaleValue', '`ABCSaleValue`', '`ABCSaleValue`', 5, 22, -1, false, '`ABCSaleValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ABCSaleValue->Sortable = true; // Allow sort
        $this->ABCSaleValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ABCSaleValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ABCSaleValue'] = &$this->ABCSaleValue;

        // ConvertionFactor
        $this->ConvertionFactor = new DbField('pharmacy_products', 'pharmacy_products', 'x_ConvertionFactor', 'ConvertionFactor', '`ConvertionFactor`', '`ConvertionFactor`', 3, 11, -1, false, '`ConvertionFactor`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ConvertionFactor->Nullable = false; // NOT NULL field
        $this->ConvertionFactor->Required = true; // Required field
        $this->ConvertionFactor->Sortable = true; // Allow sort
        $this->ConvertionFactor->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ConvertionFactor'] = &$this->ConvertionFactor;

        // ConvertionUnitDesc
        $this->ConvertionUnitDesc = new DbField('pharmacy_products', 'pharmacy_products', 'x_ConvertionUnitDesc', 'ConvertionUnitDesc', '`ConvertionUnitDesc`', '`ConvertionUnitDesc`', 200, 50, -1, false, '`ConvertionUnitDesc`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ConvertionUnitDesc->Sortable = true; // Allow sort
        $this->Fields['ConvertionUnitDesc'] = &$this->ConvertionUnitDesc;

        // TransactionId
        $this->TransactionId = new DbField('pharmacy_products', 'pharmacy_products', 'x_TransactionId', 'TransactionId', '`TransactionId`', '`TransactionId`', 3, 11, -1, false, '`TransactionId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TransactionId->Sortable = true; // Allow sort
        $this->TransactionId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TransactionId'] = &$this->TransactionId;

        // SoldProductId
        $this->SoldProductId = new DbField('pharmacy_products', 'pharmacy_products', 'x_SoldProductId', 'SoldProductId', '`SoldProductId`', '`SoldProductId`', 3, 11, -1, false, '`SoldProductId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SoldProductId->Sortable = true; // Allow sort
        $this->SoldProductId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SoldProductId'] = &$this->SoldProductId;

        // WantedBookId
        $this->WantedBookId = new DbField('pharmacy_products', 'pharmacy_products', 'x_WantedBookId', 'WantedBookId', '`WantedBookId`', '`WantedBookId`', 3, 11, -1, false, '`WantedBookId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->WantedBookId->Sortable = true; // Allow sort
        $this->WantedBookId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['WantedBookId'] = &$this->WantedBookId;

        // AllId
        $this->AllId = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllId', 'AllId', '`AllId`', '`AllId`', 3, 11, -1, false, '`AllId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllId->Sortable = true; // Allow sort
        $this->AllId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllId'] = &$this->AllId;

        // BatchAndExpiryCompulsory
        $this->BatchAndExpiryCompulsory = new DbField('pharmacy_products', 'pharmacy_products', 'x_BatchAndExpiryCompulsory', 'BatchAndExpiryCompulsory', '`BatchAndExpiryCompulsory`', '`BatchAndExpiryCompulsory`', 16, 4, -1, false, '`BatchAndExpiryCompulsory`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BatchAndExpiryCompulsory->Sortable = true; // Allow sort
        $this->BatchAndExpiryCompulsory->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BatchAndExpiryCompulsory'] = &$this->BatchAndExpiryCompulsory;

        // BatchStockForWantedBook
        $this->BatchStockForWantedBook = new DbField('pharmacy_products', 'pharmacy_products', 'x_BatchStockForWantedBook', 'BatchStockForWantedBook', '`BatchStockForWantedBook`', '`BatchStockForWantedBook`', 16, 4, -1, false, '`BatchStockForWantedBook`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BatchStockForWantedBook->Sortable = true; // Allow sort
        $this->BatchStockForWantedBook->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BatchStockForWantedBook'] = &$this->BatchStockForWantedBook;

        // UnitBasedBilling
        $this->UnitBasedBilling = new DbField('pharmacy_products', 'pharmacy_products', 'x_UnitBasedBilling', 'UnitBasedBilling', '`UnitBasedBilling`', '`UnitBasedBilling`', 16, 4, -1, false, '`UnitBasedBilling`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->UnitBasedBilling->Sortable = true; // Allow sort
        $this->UnitBasedBilling->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['UnitBasedBilling'] = &$this->UnitBasedBilling;

        // DoNotCheckStock
        $this->DoNotCheckStock = new DbField('pharmacy_products', 'pharmacy_products', 'x_DoNotCheckStock', 'DoNotCheckStock', '`DoNotCheckStock`', '`DoNotCheckStock`', 16, 4, -1, false, '`DoNotCheckStock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DoNotCheckStock->Sortable = true; // Allow sort
        $this->DoNotCheckStock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DoNotCheckStock'] = &$this->DoNotCheckStock;

        // AcceptRate
        $this->AcceptRate = new DbField('pharmacy_products', 'pharmacy_products', 'x_AcceptRate', 'AcceptRate', '`AcceptRate`', '`AcceptRate`', 16, 4, -1, false, '`AcceptRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AcceptRate->Sortable = true; // Allow sort
        $this->AcceptRate->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AcceptRate'] = &$this->AcceptRate;

        // PriceLevel
        $this->PriceLevel = new DbField('pharmacy_products', 'pharmacy_products', 'x_PriceLevel', 'PriceLevel', '`PriceLevel`', '`PriceLevel`', 16, 4, -1, false, '`PriceLevel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PriceLevel->Sortable = true; // Allow sort
        $this->PriceLevel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PriceLevel'] = &$this->PriceLevel;

        // LastQuotePrice
        $this->LastQuotePrice = new DbField('pharmacy_products', 'pharmacy_products', 'x_LastQuotePrice', 'LastQuotePrice', '`LastQuotePrice`', '`LastQuotePrice`', 5, 22, -1, false, '`LastQuotePrice`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LastQuotePrice->Sortable = true; // Allow sort
        $this->LastQuotePrice->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LastQuotePrice->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LastQuotePrice'] = &$this->LastQuotePrice;

        // PriceChange
        $this->PriceChange = new DbField('pharmacy_products', 'pharmacy_products', 'x_PriceChange', 'PriceChange', '`PriceChange`', '`PriceChange`', 5, 22, -1, false, '`PriceChange`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PriceChange->Sortable = true; // Allow sort
        $this->PriceChange->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PriceChange->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PriceChange'] = &$this->PriceChange;

        // CommodityCode
        $this->CommodityCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_CommodityCode', 'CommodityCode', '`CommodityCode`', '`CommodityCode`', 200, 25, -1, false, '`CommodityCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CommodityCode->Sortable = true; // Allow sort
        $this->Fields['CommodityCode'] = &$this->CommodityCode;

        // InstitutePrice
        $this->InstitutePrice = new DbField('pharmacy_products', 'pharmacy_products', 'x_InstitutePrice', 'InstitutePrice', '`InstitutePrice`', '`InstitutePrice`', 5, 22, -1, false, '`InstitutePrice`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InstitutePrice->Sortable = true; // Allow sort
        $this->InstitutePrice->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->InstitutePrice->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['InstitutePrice'] = &$this->InstitutePrice;

        // CtrlOrDCtrlProduct
        $this->CtrlOrDCtrlProduct = new DbField('pharmacy_products', 'pharmacy_products', 'x_CtrlOrDCtrlProduct', 'CtrlOrDCtrlProduct', '`CtrlOrDCtrlProduct`', '`CtrlOrDCtrlProduct`', 16, 4, -1, false, '`CtrlOrDCtrlProduct`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CtrlOrDCtrlProduct->Sortable = true; // Allow sort
        $this->CtrlOrDCtrlProduct->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CtrlOrDCtrlProduct'] = &$this->CtrlOrDCtrlProduct;

        // ImportedDate
        $this->ImportedDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_ImportedDate', 'ImportedDate', '`ImportedDate`', CastDateFieldForLike("`ImportedDate`", 0, "DB"), 135, 23, 0, false, '`ImportedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ImportedDate->Sortable = true; // Allow sort
        $this->ImportedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ImportedDate'] = &$this->ImportedDate;

        // IsImported
        $this->IsImported = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsImported', 'IsImported', '`IsImported`', '`IsImported`', 16, 4, -1, false, '`IsImported`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsImported->Sortable = true; // Allow sort
        $this->IsImported->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsImported'] = &$this->IsImported;

        // FileName
        $this->FileName = new DbField('pharmacy_products', 'pharmacy_products', 'x_FileName', 'FileName', '`FileName`', '`FileName`', 200, 50, -1, false, '`FileName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FileName->Sortable = true; // Allow sort
        $this->Fields['FileName'] = &$this->FileName;

        // LPName
        $this->LPName = new DbField('pharmacy_products', 'pharmacy_products', 'x_LPName', 'LPName', '`LPName`', '`LPName`', 201, 510, -1, false, '`LPName`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->LPName->Sortable = true; // Allow sort
        $this->Fields['LPName'] = &$this->LPName;

        // GodownNumber
        $this->GodownNumber = new DbField('pharmacy_products', 'pharmacy_products', 'x_GodownNumber', 'GodownNumber', '`GodownNumber`', '`GodownNumber`', 3, 11, -1, false, '`GodownNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GodownNumber->Sortable = true; // Allow sort
        $this->GodownNumber->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['GodownNumber'] = &$this->GodownNumber;

        // CreationDate
        $this->CreationDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_CreationDate', 'CreationDate', '`CreationDate`', CastDateFieldForLike("`CreationDate`", 0, "DB"), 135, 23, 0, false, '`CreationDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreationDate->Sortable = true; // Allow sort
        $this->CreationDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['CreationDate'] = &$this->CreationDate;

        // CreatedbyUser
        $this->CreatedbyUser = new DbField('pharmacy_products', 'pharmacy_products', 'x_CreatedbyUser', 'CreatedbyUser', '`CreatedbyUser`', '`CreatedbyUser`', 200, 50, -1, false, '`CreatedbyUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CreatedbyUser->Sortable = true; // Allow sort
        $this->Fields['CreatedbyUser'] = &$this->CreatedbyUser;

        // ModifiedDate
        $this->ModifiedDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_ModifiedDate', 'ModifiedDate', '`ModifiedDate`', CastDateFieldForLike("`ModifiedDate`", 0, "DB"), 135, 23, 0, false, '`ModifiedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedDate->Sortable = true; // Allow sort
        $this->ModifiedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['ModifiedDate'] = &$this->ModifiedDate;

        // ModifiedbyUser
        $this->ModifiedbyUser = new DbField('pharmacy_products', 'pharmacy_products', 'x_ModifiedbyUser', 'ModifiedbyUser', '`ModifiedbyUser`', '`ModifiedbyUser`', 200, 50, -1, false, '`ModifiedbyUser`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifiedbyUser->Sortable = true; // Allow sort
        $this->Fields['ModifiedbyUser'] = &$this->ModifiedbyUser;

        // isActive
        $this->isActive = new DbField('pharmacy_products', 'pharmacy_products', 'x_isActive', 'isActive', '`isActive`', '`isActive`', 17, 3, -1, false, '`isActive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->isActive->Sortable = true; // Allow sort
        $this->isActive->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['isActive'] = &$this->isActive;

        // AllowExpiryClaim
        $this->AllowExpiryClaim = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllowExpiryClaim', 'AllowExpiryClaim', '`AllowExpiryClaim`', '`AllowExpiryClaim`', 16, 4, -1, false, '`AllowExpiryClaim`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllowExpiryClaim->Sortable = true; // Allow sort
        $this->AllowExpiryClaim->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllowExpiryClaim'] = &$this->AllowExpiryClaim;

        // BrandCode
        $this->BrandCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_BrandCode', 'BrandCode', '`BrandCode`', '`BrandCode`', 3, 11, -1, false, '`BrandCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BrandCode->Sortable = true; // Allow sort
        $this->BrandCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BrandCode'] = &$this->BrandCode;

        // FreeSchemeBasedon
        $this->FreeSchemeBasedon = new DbField('pharmacy_products', 'pharmacy_products', 'x_FreeSchemeBasedon', 'FreeSchemeBasedon', '`FreeSchemeBasedon`', '`FreeSchemeBasedon`', 17, 3, -1, false, '`FreeSchemeBasedon`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeSchemeBasedon->Sortable = true; // Allow sort
        $this->FreeSchemeBasedon->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FreeSchemeBasedon'] = &$this->FreeSchemeBasedon;

        // DoNotCheckCostInBill
        $this->DoNotCheckCostInBill = new DbField('pharmacy_products', 'pharmacy_products', 'x_DoNotCheckCostInBill', 'DoNotCheckCostInBill', '`DoNotCheckCostInBill`', '`DoNotCheckCostInBill`', 16, 4, -1, false, '`DoNotCheckCostInBill`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DoNotCheckCostInBill->Sortable = true; // Allow sort
        $this->DoNotCheckCostInBill->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DoNotCheckCostInBill'] = &$this->DoNotCheckCostInBill;

        // ProductGroupCode
        $this->ProductGroupCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductGroupCode', 'ProductGroupCode', '`ProductGroupCode`', '`ProductGroupCode`', 3, 11, -1, false, '`ProductGroupCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductGroupCode->Sortable = true; // Allow sort
        $this->ProductGroupCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductGroupCode'] = &$this->ProductGroupCode;

        // ProductStrengthCode
        $this->ProductStrengthCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductStrengthCode', 'ProductStrengthCode', '`ProductStrengthCode`', '`ProductStrengthCode`', 3, 11, -1, false, '`ProductStrengthCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductStrengthCode->Sortable = true; // Allow sort
        $this->ProductStrengthCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductStrengthCode'] = &$this->ProductStrengthCode;

        // PackingCode
        $this->PackingCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_PackingCode', 'PackingCode', '`PackingCode`', '`PackingCode`', 3, 11, -1, false, '`PackingCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PackingCode->Sortable = true; // Allow sort
        $this->PackingCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PackingCode'] = &$this->PackingCode;

        // ComputedMinStock
        $this->ComputedMinStock = new DbField('pharmacy_products', 'pharmacy_products', 'x_ComputedMinStock', 'ComputedMinStock', '`ComputedMinStock`', '`ComputedMinStock`', 5, 22, -1, false, '`ComputedMinStock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ComputedMinStock->Sortable = true; // Allow sort
        $this->ComputedMinStock->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ComputedMinStock->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ComputedMinStock'] = &$this->ComputedMinStock;

        // ComputedMaxStock
        $this->ComputedMaxStock = new DbField('pharmacy_products', 'pharmacy_products', 'x_ComputedMaxStock', 'ComputedMaxStock', '`ComputedMaxStock`', '`ComputedMaxStock`', 5, 22, -1, false, '`ComputedMaxStock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ComputedMaxStock->Sortable = true; // Allow sort
        $this->ComputedMaxStock->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->ComputedMaxStock->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['ComputedMaxStock'] = &$this->ComputedMaxStock;

        // ProductRemark
        $this->ProductRemark = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductRemark', 'ProductRemark', '`ProductRemark`', '`ProductRemark`', 3, 11, -1, false, '`ProductRemark`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductRemark->Sortable = true; // Allow sort
        $this->ProductRemark->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductRemark'] = &$this->ProductRemark;

        // ProductDrugCode
        $this->ProductDrugCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductDrugCode', 'ProductDrugCode', '`ProductDrugCode`', '`ProductDrugCode`', 3, 11, -1, false, '`ProductDrugCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductDrugCode->Sortable = true; // Allow sort
        $this->ProductDrugCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductDrugCode'] = &$this->ProductDrugCode;

        // IsMatrixProduct
        $this->IsMatrixProduct = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsMatrixProduct', 'IsMatrixProduct', '`IsMatrixProduct`', '`IsMatrixProduct`', 3, 11, -1, false, '`IsMatrixProduct`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsMatrixProduct->Sortable = true; // Allow sort
        $this->IsMatrixProduct->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsMatrixProduct'] = &$this->IsMatrixProduct;

        // AttributeCount1
        $this->AttributeCount1 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount1', 'AttributeCount1', '`AttributeCount1`', '`AttributeCount1`', 3, 11, -1, false, '`AttributeCount1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount1->Sortable = true; // Allow sort
        $this->AttributeCount1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount1'] = &$this->AttributeCount1;

        // AttributeCount2
        $this->AttributeCount2 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount2', 'AttributeCount2', '`AttributeCount2`', '`AttributeCount2`', 3, 11, -1, false, '`AttributeCount2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount2->Sortable = true; // Allow sort
        $this->AttributeCount2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount2'] = &$this->AttributeCount2;

        // AttributeCount3
        $this->AttributeCount3 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount3', 'AttributeCount3', '`AttributeCount3`', '`AttributeCount3`', 3, 11, -1, false, '`AttributeCount3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount3->Sortable = true; // Allow sort
        $this->AttributeCount3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount3'] = &$this->AttributeCount3;

        // AttributeCount4
        $this->AttributeCount4 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount4', 'AttributeCount4', '`AttributeCount4`', '`AttributeCount4`', 3, 11, -1, false, '`AttributeCount4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount4->Sortable = true; // Allow sort
        $this->AttributeCount4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount4'] = &$this->AttributeCount4;

        // AttributeCount5
        $this->AttributeCount5 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount5', 'AttributeCount5', '`AttributeCount5`', '`AttributeCount5`', 3, 11, -1, false, '`AttributeCount5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount5->Sortable = true; // Allow sort
        $this->AttributeCount5->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount5'] = &$this->AttributeCount5;

        // DefaultDiscountPercentage
        $this->DefaultDiscountPercentage = new DbField('pharmacy_products', 'pharmacy_products', 'x_DefaultDiscountPercentage', 'DefaultDiscountPercentage', '`DefaultDiscountPercentage`', '`DefaultDiscountPercentage`', 5, 22, -1, false, '`DefaultDiscountPercentage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DefaultDiscountPercentage->Sortable = true; // Allow sort
        $this->DefaultDiscountPercentage->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DefaultDiscountPercentage->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DefaultDiscountPercentage'] = &$this->DefaultDiscountPercentage;

        // DonotPrintBarcode
        $this->DonotPrintBarcode = new DbField('pharmacy_products', 'pharmacy_products', 'x_DonotPrintBarcode', 'DonotPrintBarcode', '`DonotPrintBarcode`', '`DonotPrintBarcode`', 16, 4, -1, false, '`DonotPrintBarcode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DonotPrintBarcode->Sortable = true; // Allow sort
        $this->DonotPrintBarcode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DonotPrintBarcode'] = &$this->DonotPrintBarcode;

        // ProductLevelDiscount
        $this->ProductLevelDiscount = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductLevelDiscount', 'ProductLevelDiscount', '`ProductLevelDiscount`', '`ProductLevelDiscount`', 16, 4, -1, false, '`ProductLevelDiscount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductLevelDiscount->Sortable = true; // Allow sort
        $this->ProductLevelDiscount->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductLevelDiscount'] = &$this->ProductLevelDiscount;

        // Markup
        $this->Markup = new DbField('pharmacy_products', 'pharmacy_products', 'x_Markup', 'Markup', '`Markup`', '`Markup`', 5, 22, -1, false, '`Markup`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Markup->Sortable = true; // Allow sort
        $this->Markup->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Markup->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Markup'] = &$this->Markup;

        // MarkDown
        $this->MarkDown = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarkDown', 'MarkDown', '`MarkDown`', '`MarkDown`', 5, 22, -1, false, '`MarkDown`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarkDown->Sortable = true; // Allow sort
        $this->MarkDown->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarkDown->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MarkDown'] = &$this->MarkDown;

        // ReworkSalePrice
        $this->ReworkSalePrice = new DbField('pharmacy_products', 'pharmacy_products', 'x_ReworkSalePrice', 'ReworkSalePrice', '`ReworkSalePrice`', '`ReworkSalePrice`', 16, 4, -1, false, '`ReworkSalePrice`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReworkSalePrice->Sortable = true; // Allow sort
        $this->ReworkSalePrice->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ReworkSalePrice'] = &$this->ReworkSalePrice;

        // MultipleInput
        $this->MultipleInput = new DbField('pharmacy_products', 'pharmacy_products', 'x_MultipleInput', 'MultipleInput', '`MultipleInput`', '`MultipleInput`', 3, 11, -1, false, '`MultipleInput`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MultipleInput->Sortable = true; // Allow sort
        $this->MultipleInput->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MultipleInput'] = &$this->MultipleInput;

        // LpPackageInformation
        $this->LpPackageInformation = new DbField('pharmacy_products', 'pharmacy_products', 'x_LpPackageInformation', 'LpPackageInformation', '`LpPackageInformation`', '`LpPackageInformation`', 200, 200, -1, false, '`LpPackageInformation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LpPackageInformation->Sortable = true; // Allow sort
        $this->Fields['LpPackageInformation'] = &$this->LpPackageInformation;

        // AllowNegativeStock
        $this->AllowNegativeStock = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllowNegativeStock', 'AllowNegativeStock', '`AllowNegativeStock`', '`AllowNegativeStock`', 16, 4, -1, false, '`AllowNegativeStock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllowNegativeStock->Sortable = true; // Allow sort
        $this->AllowNegativeStock->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllowNegativeStock'] = &$this->AllowNegativeStock;

        // OrderDate
        $this->OrderDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_OrderDate', 'OrderDate', '`OrderDate`', CastDateFieldForLike("`OrderDate`", 0, "DB"), 135, 23, 0, false, '`OrderDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OrderDate->Sortable = true; // Allow sort
        $this->OrderDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['OrderDate'] = &$this->OrderDate;

        // OrderTime
        $this->OrderTime = new DbField('pharmacy_products', 'pharmacy_products', 'x_OrderTime', 'OrderTime', '`OrderTime`', CastDateFieldForLike("`OrderTime`", 0, "DB"), 135, 23, 0, false, '`OrderTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OrderTime->Sortable = true; // Allow sort
        $this->OrderTime->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['OrderTime'] = &$this->OrderTime;

        // RateGroupCode
        $this->RateGroupCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_RateGroupCode', 'RateGroupCode', '`RateGroupCode`', '`RateGroupCode`', 3, 11, -1, false, '`RateGroupCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RateGroupCode->Sortable = true; // Allow sort
        $this->RateGroupCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RateGroupCode'] = &$this->RateGroupCode;

        // ConversionCaseLot
        $this->ConversionCaseLot = new DbField('pharmacy_products', 'pharmacy_products', 'x_ConversionCaseLot', 'ConversionCaseLot', '`ConversionCaseLot`', '`ConversionCaseLot`', 3, 11, -1, false, '`ConversionCaseLot`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ConversionCaseLot->Sortable = true; // Allow sort
        $this->ConversionCaseLot->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ConversionCaseLot'] = &$this->ConversionCaseLot;

        // ShippingLot
        $this->ShippingLot = new DbField('pharmacy_products', 'pharmacy_products', 'x_ShippingLot', 'ShippingLot', '`ShippingLot`', '`ShippingLot`', 200, 50, -1, false, '`ShippingLot`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ShippingLot->Sortable = true; // Allow sort
        $this->Fields['ShippingLot'] = &$this->ShippingLot;

        // AllowExpiryReplacement
        $this->AllowExpiryReplacement = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllowExpiryReplacement', 'AllowExpiryReplacement', '`AllowExpiryReplacement`', '`AllowExpiryReplacement`', 16, 4, -1, false, '`AllowExpiryReplacement`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllowExpiryReplacement->Nullable = false; // NOT NULL field
        $this->AllowExpiryReplacement->Required = true; // Required field
        $this->AllowExpiryReplacement->Sortable = true; // Allow sort
        $this->AllowExpiryReplacement->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllowExpiryReplacement'] = &$this->AllowExpiryReplacement;

        // NoOfMonthExpiryAllowed
        $this->NoOfMonthExpiryAllowed = new DbField('pharmacy_products', 'pharmacy_products', 'x_NoOfMonthExpiryAllowed', 'NoOfMonthExpiryAllowed', '`NoOfMonthExpiryAllowed`', '`NoOfMonthExpiryAllowed`', 3, 11, -1, false, '`NoOfMonthExpiryAllowed`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoOfMonthExpiryAllowed->Sortable = true; // Allow sort
        $this->NoOfMonthExpiryAllowed->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['NoOfMonthExpiryAllowed'] = &$this->NoOfMonthExpiryAllowed;

        // ProductDiscountEligibility
        $this->ProductDiscountEligibility = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductDiscountEligibility', 'ProductDiscountEligibility', '`ProductDiscountEligibility`', '`ProductDiscountEligibility`', 16, 4, -1, false, '`ProductDiscountEligibility`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductDiscountEligibility->Sortable = true; // Allow sort
        $this->ProductDiscountEligibility->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductDiscountEligibility'] = &$this->ProductDiscountEligibility;

        // ScheduleTypeCode
        $this->ScheduleTypeCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ScheduleTypeCode', 'ScheduleTypeCode', '`ScheduleTypeCode`', '`ScheduleTypeCode`', 3, 11, -1, false, '`ScheduleTypeCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ScheduleTypeCode->Sortable = true; // Allow sort
        $this->ScheduleTypeCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ScheduleTypeCode'] = &$this->ScheduleTypeCode;

        // AIOCDProductCode
        $this->AIOCDProductCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_AIOCDProductCode', 'AIOCDProductCode', '`AIOCDProductCode`', '`AIOCDProductCode`', 200, 50, -1, false, '`AIOCDProductCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AIOCDProductCode->Sortable = true; // Allow sort
        $this->Fields['AIOCDProductCode'] = &$this->AIOCDProductCode;

        // FreeQuantity
        $this->FreeQuantity = new DbField('pharmacy_products', 'pharmacy_products', 'x_FreeQuantity', 'FreeQuantity', '`FreeQuantity`', '`FreeQuantity`', 5, 22, -1, false, '`FreeQuantity`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeQuantity->Sortable = true; // Allow sort
        $this->FreeQuantity->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->FreeQuantity->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['FreeQuantity'] = &$this->FreeQuantity;

        // DiscountType
        $this->DiscountType = new DbField('pharmacy_products', 'pharmacy_products', 'x_DiscountType', 'DiscountType', '`DiscountType`', '`DiscountType`', 3, 11, -1, false, '`DiscountType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountType->Sortable = true; // Allow sort
        $this->DiscountType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DiscountType'] = &$this->DiscountType;

        // DiscountValue
        $this->DiscountValue = new DbField('pharmacy_products', 'pharmacy_products', 'x_DiscountValue', 'DiscountValue', '`DiscountValue`', '`DiscountValue`', 5, 22, -1, false, '`DiscountValue`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DiscountValue->Sortable = true; // Allow sort
        $this->DiscountValue->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->DiscountValue->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['DiscountValue'] = &$this->DiscountValue;

        // HasProductOrderAttribute
        $this->HasProductOrderAttribute = new DbField('pharmacy_products', 'pharmacy_products', 'x_HasProductOrderAttribute', 'HasProductOrderAttribute', '`HasProductOrderAttribute`', '`HasProductOrderAttribute`', 16, 4, -1, false, '`HasProductOrderAttribute`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HasProductOrderAttribute->Sortable = true; // Allow sort
        $this->HasProductOrderAttribute->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HasProductOrderAttribute'] = &$this->HasProductOrderAttribute;

        // FirstPODate
        $this->FirstPODate = new DbField('pharmacy_products', 'pharmacy_products', 'x_FirstPODate', 'FirstPODate', '`FirstPODate`', CastDateFieldForLike("`FirstPODate`", 0, "DB"), 135, 23, 0, false, '`FirstPODate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FirstPODate->Sortable = true; // Allow sort
        $this->FirstPODate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['FirstPODate'] = &$this->FirstPODate;

        // SaleprcieAndMrpCalcPercent
        $this->SaleprcieAndMrpCalcPercent = new DbField('pharmacy_products', 'pharmacy_products', 'x_SaleprcieAndMrpCalcPercent', 'SaleprcieAndMrpCalcPercent', '`SaleprcieAndMrpCalcPercent`', '`SaleprcieAndMrpCalcPercent`', 5, 22, -1, false, '`SaleprcieAndMrpCalcPercent`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SaleprcieAndMrpCalcPercent->Nullable = false; // NOT NULL field
        $this->SaleprcieAndMrpCalcPercent->Required = true; // Required field
        $this->SaleprcieAndMrpCalcPercent->Sortable = true; // Allow sort
        $this->SaleprcieAndMrpCalcPercent->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SaleprcieAndMrpCalcPercent->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SaleprcieAndMrpCalcPercent'] = &$this->SaleprcieAndMrpCalcPercent;

        // IsGiftVoucherProducts
        $this->IsGiftVoucherProducts = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsGiftVoucherProducts', 'IsGiftVoucherProducts', '`IsGiftVoucherProducts`', '`IsGiftVoucherProducts`', 17, 3, -1, false, '`IsGiftVoucherProducts`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsGiftVoucherProducts->Sortable = true; // Allow sort
        $this->IsGiftVoucherProducts->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsGiftVoucherProducts'] = &$this->IsGiftVoucherProducts;

        // AcceptRange4SerialNumber
        $this->AcceptRange4SerialNumber = new DbField('pharmacy_products', 'pharmacy_products', 'x_AcceptRange4SerialNumber', 'AcceptRange4SerialNumber', '`AcceptRange4SerialNumber`', '`AcceptRange4SerialNumber`', 16, 4, -1, false, '`AcceptRange4SerialNumber`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AcceptRange4SerialNumber->Sortable = true; // Allow sort
        $this->AcceptRange4SerialNumber->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AcceptRange4SerialNumber'] = &$this->AcceptRange4SerialNumber;

        // GiftVoucherDenomination
        $this->GiftVoucherDenomination = new DbField('pharmacy_products', 'pharmacy_products', 'x_GiftVoucherDenomination', 'GiftVoucherDenomination', '`GiftVoucherDenomination`', '`GiftVoucherDenomination`', 3, 11, -1, false, '`GiftVoucherDenomination`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GiftVoucherDenomination->Sortable = true; // Allow sort
        $this->GiftVoucherDenomination->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['GiftVoucherDenomination'] = &$this->GiftVoucherDenomination;

        // Subclasscode
        $this->Subclasscode = new DbField('pharmacy_products', 'pharmacy_products', 'x_Subclasscode', 'Subclasscode', '`Subclasscode`', '`Subclasscode`', 200, 50, -1, false, '`Subclasscode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Subclasscode->Sortable = true; // Allow sort
        $this->Fields['Subclasscode'] = &$this->Subclasscode;

        // BarCodeFromWeighingMachine
        $this->BarCodeFromWeighingMachine = new DbField('pharmacy_products', 'pharmacy_products', 'x_BarCodeFromWeighingMachine', 'BarCodeFromWeighingMachine', '`BarCodeFromWeighingMachine`', '`BarCodeFromWeighingMachine`', 3, 11, -1, false, '`BarCodeFromWeighingMachine`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BarCodeFromWeighingMachine->Sortable = true; // Allow sort
        $this->BarCodeFromWeighingMachine->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BarCodeFromWeighingMachine'] = &$this->BarCodeFromWeighingMachine;

        // CheckCostInReturn
        $this->CheckCostInReturn = new DbField('pharmacy_products', 'pharmacy_products', 'x_CheckCostInReturn', 'CheckCostInReturn', '`CheckCostInReturn`', '`CheckCostInReturn`', 3, 11, -1, false, '`CheckCostInReturn`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CheckCostInReturn->Sortable = true; // Allow sort
        $this->CheckCostInReturn->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CheckCostInReturn'] = &$this->CheckCostInReturn;

        // FrequentSaleProduct
        $this->FrequentSaleProduct = new DbField('pharmacy_products', 'pharmacy_products', 'x_FrequentSaleProduct', 'FrequentSaleProduct', '`FrequentSaleProduct`', '`FrequentSaleProduct`', 16, 4, -1, false, '`FrequentSaleProduct`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FrequentSaleProduct->Sortable = true; // Allow sort
        $this->FrequentSaleProduct->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FrequentSaleProduct'] = &$this->FrequentSaleProduct;

        // RateType
        $this->RateType = new DbField('pharmacy_products', 'pharmacy_products', 'x_RateType', 'RateType', '`RateType`', '`RateType`', 3, 11, -1, false, '`RateType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RateType->Sortable = true; // Allow sort
        $this->RateType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RateType'] = &$this->RateType;

        // TouchscreenName
        $this->TouchscreenName = new DbField('pharmacy_products', 'pharmacy_products', 'x_TouchscreenName', 'TouchscreenName', '`TouchscreenName`', '`TouchscreenName`', 200, 50, -1, false, '`TouchscreenName`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TouchscreenName->Sortable = true; // Allow sort
        $this->Fields['TouchscreenName'] = &$this->TouchscreenName;

        // FreeType
        $this->FreeType = new DbField('pharmacy_products', 'pharmacy_products', 'x_FreeType', 'FreeType', '`FreeType`', '`FreeType`', 3, 11, -1, false, '`FreeType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeType->Sortable = true; // Allow sort
        $this->FreeType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FreeType'] = &$this->FreeType;

        // LooseQtyasNewBatch
        $this->LooseQtyasNewBatch = new DbField('pharmacy_products', 'pharmacy_products', 'x_LooseQtyasNewBatch', 'LooseQtyasNewBatch', '`LooseQtyasNewBatch`', '`LooseQtyasNewBatch`', 16, 4, -1, false, '`LooseQtyasNewBatch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LooseQtyasNewBatch->Sortable = true; // Allow sort
        $this->LooseQtyasNewBatch->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['LooseQtyasNewBatch'] = &$this->LooseQtyasNewBatch;

        // AllowSlabBilling
        $this->AllowSlabBilling = new DbField('pharmacy_products', 'pharmacy_products', 'x_AllowSlabBilling', 'AllowSlabBilling', '`AllowSlabBilling`', '`AllowSlabBilling`', 16, 4, -1, false, '`AllowSlabBilling`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AllowSlabBilling->Sortable = true; // Allow sort
        $this->AllowSlabBilling->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AllowSlabBilling'] = &$this->AllowSlabBilling;

        // ProductTypeForProduction
        $this->ProductTypeForProduction = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductTypeForProduction', 'ProductTypeForProduction', '`ProductTypeForProduction`', '`ProductTypeForProduction`', 3, 11, -1, false, '`ProductTypeForProduction`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductTypeForProduction->Sortable = true; // Allow sort
        $this->ProductTypeForProduction->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductTypeForProduction'] = &$this->ProductTypeForProduction;

        // RecipeCode
        $this->RecipeCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_RecipeCode', 'RecipeCode', '`RecipeCode`', '`RecipeCode`', 3, 11, -1, false, '`RecipeCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RecipeCode->Sortable = true; // Allow sort
        $this->RecipeCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RecipeCode'] = &$this->RecipeCode;

        // DefaultUnitType
        $this->DefaultUnitType = new DbField('pharmacy_products', 'pharmacy_products', 'x_DefaultUnitType', 'DefaultUnitType', '`DefaultUnitType`', '`DefaultUnitType`', 3, 11, -1, false, '`DefaultUnitType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DefaultUnitType->Sortable = true; // Allow sort
        $this->DefaultUnitType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DefaultUnitType'] = &$this->DefaultUnitType;

        // PIstatus
        $this->PIstatus = new DbField('pharmacy_products', 'pharmacy_products', 'x_PIstatus', 'PIstatus', '`PIstatus`', '`PIstatus`', 3, 11, -1, false, '`PIstatus`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PIstatus->Sortable = true; // Allow sort
        $this->PIstatus->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PIstatus'] = &$this->PIstatus;

        // LastPiConfirmedDate
        $this->LastPiConfirmedDate = new DbField('pharmacy_products', 'pharmacy_products', 'x_LastPiConfirmedDate', 'LastPiConfirmedDate', '`LastPiConfirmedDate`', CastDateFieldForLike("`LastPiConfirmedDate`", 0, "DB"), 135, 23, 0, false, '`LastPiConfirmedDate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LastPiConfirmedDate->Sortable = true; // Allow sort
        $this->LastPiConfirmedDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->Fields['LastPiConfirmedDate'] = &$this->LastPiConfirmedDate;

        // BarCodeDesign
        $this->BarCodeDesign = new DbField('pharmacy_products', 'pharmacy_products', 'x_BarCodeDesign', 'BarCodeDesign', '`BarCodeDesign`', '`BarCodeDesign`', 200, 50, -1, false, '`BarCodeDesign`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BarCodeDesign->Sortable = true; // Allow sort
        $this->Fields['BarCodeDesign'] = &$this->BarCodeDesign;

        // AcceptRemarksInBill
        $this->AcceptRemarksInBill = new DbField('pharmacy_products', 'pharmacy_products', 'x_AcceptRemarksInBill', 'AcceptRemarksInBill', '`AcceptRemarksInBill`', '`AcceptRemarksInBill`', 16, 4, -1, false, '`AcceptRemarksInBill`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AcceptRemarksInBill->Sortable = true; // Allow sort
        $this->AcceptRemarksInBill->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AcceptRemarksInBill'] = &$this->AcceptRemarksInBill;

        // Classification
        $this->Classification = new DbField('pharmacy_products', 'pharmacy_products', 'x_Classification', 'Classification', '`Classification`', '`Classification`', 3, 11, -1, false, '`Classification`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Classification->Sortable = true; // Allow sort
        $this->Classification->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Classification'] = &$this->Classification;

        // TimeSlot
        $this->TimeSlot = new DbField('pharmacy_products', 'pharmacy_products', 'x_TimeSlot', 'TimeSlot', '`TimeSlot`', '`TimeSlot`', 3, 11, -1, false, '`TimeSlot`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TimeSlot->Sortable = true; // Allow sort
        $this->TimeSlot->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TimeSlot'] = &$this->TimeSlot;

        // IsBundle
        $this->IsBundle = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsBundle', 'IsBundle', '`IsBundle`', '`IsBundle`', 16, 4, -1, false, '`IsBundle`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsBundle->Sortable = true; // Allow sort
        $this->IsBundle->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsBundle'] = &$this->IsBundle;

        // ColorCode
        $this->ColorCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ColorCode', 'ColorCode', '`ColorCode`', '`ColorCode`', 3, 11, -1, false, '`ColorCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ColorCode->Sortable = true; // Allow sort
        $this->ColorCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ColorCode'] = &$this->ColorCode;

        // GenderCode
        $this->GenderCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_GenderCode', 'GenderCode', '`GenderCode`', '`GenderCode`', 3, 11, -1, false, '`GenderCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GenderCode->Sortable = true; // Allow sort
        $this->GenderCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['GenderCode'] = &$this->GenderCode;

        // SizeCode
        $this->SizeCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_SizeCode', 'SizeCode', '`SizeCode`', '`SizeCode`', 3, 11, -1, false, '`SizeCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SizeCode->Sortable = true; // Allow sort
        $this->SizeCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SizeCode'] = &$this->SizeCode;

        // GiftCard
        $this->GiftCard = new DbField('pharmacy_products', 'pharmacy_products', 'x_GiftCard', 'GiftCard', '`GiftCard`', '`GiftCard`', 3, 11, -1, false, '`GiftCard`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GiftCard->Sortable = true; // Allow sort
        $this->GiftCard->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['GiftCard'] = &$this->GiftCard;

        // ToonLabel
        $this->ToonLabel = new DbField('pharmacy_products', 'pharmacy_products', 'x_ToonLabel', 'ToonLabel', '`ToonLabel`', '`ToonLabel`', 3, 11, -1, false, '`ToonLabel`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ToonLabel->Sortable = true; // Allow sort
        $this->ToonLabel->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ToonLabel'] = &$this->ToonLabel;

        // GarmentType
        $this->GarmentType = new DbField('pharmacy_products', 'pharmacy_products', 'x_GarmentType', 'GarmentType', '`GarmentType`', '`GarmentType`', 3, 11, -1, false, '`GarmentType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->GarmentType->Sortable = true; // Allow sort
        $this->GarmentType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['GarmentType'] = &$this->GarmentType;

        // AgeGroup
        $this->AgeGroup = new DbField('pharmacy_products', 'pharmacy_products', 'x_AgeGroup', 'AgeGroup', '`AgeGroup`', '`AgeGroup`', 3, 11, -1, false, '`AgeGroup`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AgeGroup->Sortable = true; // Allow sort
        $this->AgeGroup->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AgeGroup'] = &$this->AgeGroup;

        // Season
        $this->Season = new DbField('pharmacy_products', 'pharmacy_products', 'x_Season', 'Season', '`Season`', '`Season`', 3, 11, -1, false, '`Season`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Season->Sortable = true; // Allow sort
        $this->Season->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['Season'] = &$this->Season;

        // DailyStockEntry
        $this->DailyStockEntry = new DbField('pharmacy_products', 'pharmacy_products', 'x_DailyStockEntry', 'DailyStockEntry', '`DailyStockEntry`', '`DailyStockEntry`', 16, 4, -1, false, '`DailyStockEntry`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DailyStockEntry->Sortable = true; // Allow sort
        $this->DailyStockEntry->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DailyStockEntry'] = &$this->DailyStockEntry;

        // ModifierApplicable
        $this->ModifierApplicable = new DbField('pharmacy_products', 'pharmacy_products', 'x_ModifierApplicable', 'ModifierApplicable', '`ModifierApplicable`', '`ModifierApplicable`', 16, 4, -1, false, '`ModifierApplicable`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifierApplicable->Nullable = false; // NOT NULL field
        $this->ModifierApplicable->Required = true; // Required field
        $this->ModifierApplicable->Sortable = true; // Allow sort
        $this->ModifierApplicable->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ModifierApplicable'] = &$this->ModifierApplicable;

        // ModifierType
        $this->ModifierType = new DbField('pharmacy_products', 'pharmacy_products', 'x_ModifierType', 'ModifierType', '`ModifierType`', '`ModifierType`', 3, 11, -1, false, '`ModifierType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ModifierType->Nullable = false; // NOT NULL field
        $this->ModifierType->Required = true; // Required field
        $this->ModifierType->Sortable = true; // Allow sort
        $this->ModifierType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ModifierType'] = &$this->ModifierType;

        // AcceptZeroRate
        $this->AcceptZeroRate = new DbField('pharmacy_products', 'pharmacy_products', 'x_AcceptZeroRate', 'AcceptZeroRate', '`AcceptZeroRate`', '`AcceptZeroRate`', 3, 11, -1, false, '`AcceptZeroRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AcceptZeroRate->Nullable = false; // NOT NULL field
        $this->AcceptZeroRate->Required = true; // Required field
        $this->AcceptZeroRate->Sortable = true; // Allow sort
        $this->AcceptZeroRate->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AcceptZeroRate'] = &$this->AcceptZeroRate;

        // ExciseDutyCode
        $this->ExciseDutyCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ExciseDutyCode', 'ExciseDutyCode', '`ExciseDutyCode`', '`ExciseDutyCode`', 3, 11, -1, false, '`ExciseDutyCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExciseDutyCode->Sortable = true; // Allow sort
        $this->ExciseDutyCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ExciseDutyCode'] = &$this->ExciseDutyCode;

        // IndentProductGroupCode
        $this->IndentProductGroupCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_IndentProductGroupCode', 'IndentProductGroupCode', '`IndentProductGroupCode`', '`IndentProductGroupCode`', 3, 11, -1, false, '`IndentProductGroupCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IndentProductGroupCode->Sortable = true; // Allow sort
        $this->IndentProductGroupCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IndentProductGroupCode'] = &$this->IndentProductGroupCode;

        // IsMultiBatch
        $this->IsMultiBatch = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsMultiBatch', 'IsMultiBatch', '`IsMultiBatch`', '`IsMultiBatch`', 16, 4, -1, false, '`IsMultiBatch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsMultiBatch->Sortable = true; // Allow sort
        $this->IsMultiBatch->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsMultiBatch'] = &$this->IsMultiBatch;

        // IsSingleBatch
        $this->IsSingleBatch = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsSingleBatch', 'IsSingleBatch', '`IsSingleBatch`', '`IsSingleBatch`', 16, 4, -1, false, '`IsSingleBatch`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsSingleBatch->Sortable = true; // Allow sort
        $this->IsSingleBatch->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsSingleBatch'] = &$this->IsSingleBatch;

        // MarkUpRate1
        $this->MarkUpRate1 = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarkUpRate1', 'MarkUpRate1', '`MarkUpRate1`', '`MarkUpRate1`', 5, 22, -1, false, '`MarkUpRate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarkUpRate1->Sortable = true; // Allow sort
        $this->MarkUpRate1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarkUpRate1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MarkUpRate1'] = &$this->MarkUpRate1;

        // MarkDownRate1
        $this->MarkDownRate1 = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarkDownRate1', 'MarkDownRate1', '`MarkDownRate1`', '`MarkDownRate1`', 5, 22, -1, false, '`MarkDownRate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarkDownRate1->Sortable = true; // Allow sort
        $this->MarkDownRate1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarkDownRate1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MarkDownRate1'] = &$this->MarkDownRate1;

        // MarkUpRate2
        $this->MarkUpRate2 = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarkUpRate2', 'MarkUpRate2', '`MarkUpRate2`', '`MarkUpRate2`', 5, 22, -1, false, '`MarkUpRate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarkUpRate2->Sortable = true; // Allow sort
        $this->MarkUpRate2->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarkUpRate2->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MarkUpRate2'] = &$this->MarkUpRate2;

        // MarkDownRate2
        $this->MarkDownRate2 = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarkDownRate2', 'MarkDownRate2', '`MarkDownRate2`', '`MarkDownRate2`', 5, 22, -1, false, '`MarkDownRate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarkDownRate2->Sortable = true; // Allow sort
        $this->MarkDownRate2->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MarkDownRate2->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MarkDownRate2'] = &$this->MarkDownRate2;

        // Yield
        $this->_Yield = new DbField('pharmacy_products', 'pharmacy_products', 'x__Yield', 'Yield', '`Yield`', '`Yield`', 5, 22, -1, false, '`Yield`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->_Yield->Sortable = true; // Allow sort
        $this->_Yield->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->_Yield->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Yield'] = &$this->_Yield;

        // RefProductCode
        $this->RefProductCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_RefProductCode', 'RefProductCode', '`RefProductCode`', '`RefProductCode`', 3, 11, -1, false, '`RefProductCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->RefProductCode->Sortable = true; // Allow sort
        $this->RefProductCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['RefProductCode'] = &$this->RefProductCode;

        // Volume
        $this->Volume = new DbField('pharmacy_products', 'pharmacy_products', 'x_Volume', 'Volume', '`Volume`', '`Volume`', 5, 22, -1, false, '`Volume`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Volume->Sortable = true; // Allow sort
        $this->Volume->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->Volume->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['Volume'] = &$this->Volume;

        // MeasurementID
        $this->MeasurementID = new DbField('pharmacy_products', 'pharmacy_products', 'x_MeasurementID', 'MeasurementID', '`MeasurementID`', '`MeasurementID`', 3, 11, -1, false, '`MeasurementID`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MeasurementID->Sortable = true; // Allow sort
        $this->MeasurementID->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MeasurementID'] = &$this->MeasurementID;

        // CountryCode
        $this->CountryCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_CountryCode', 'CountryCode', '`CountryCode`', '`CountryCode`', 3, 11, -1, false, '`CountryCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CountryCode->Sortable = true; // Allow sort
        $this->CountryCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['CountryCode'] = &$this->CountryCode;

        // AcceptWMQty
        $this->AcceptWMQty = new DbField('pharmacy_products', 'pharmacy_products', 'x_AcceptWMQty', 'AcceptWMQty', '`AcceptWMQty`', '`AcceptWMQty`', 3, 11, -1, false, '`AcceptWMQty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AcceptWMQty->Sortable = true; // Allow sort
        $this->AcceptWMQty->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AcceptWMQty'] = &$this->AcceptWMQty;

        // SingleBatchBasedOnRate
        $this->SingleBatchBasedOnRate = new DbField('pharmacy_products', 'pharmacy_products', 'x_SingleBatchBasedOnRate', 'SingleBatchBasedOnRate', '`SingleBatchBasedOnRate`', '`SingleBatchBasedOnRate`', 3, 11, -1, false, '`SingleBatchBasedOnRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SingleBatchBasedOnRate->Sortable = true; // Allow sort
        $this->SingleBatchBasedOnRate->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SingleBatchBasedOnRate'] = &$this->SingleBatchBasedOnRate;

        // TenderNo
        $this->TenderNo = new DbField('pharmacy_products', 'pharmacy_products', 'x_TenderNo', 'TenderNo', '`TenderNo`', '`TenderNo`', 200, 50, -1, false, '`TenderNo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TenderNo->Sortable = true; // Allow sort
        $this->Fields['TenderNo'] = &$this->TenderNo;

        // SingleBillMaximumSoldQtyFiled
        $this->SingleBillMaximumSoldQtyFiled = new DbField('pharmacy_products', 'pharmacy_products', 'x_SingleBillMaximumSoldQtyFiled', 'SingleBillMaximumSoldQtyFiled', '`SingleBillMaximumSoldQtyFiled`', '`SingleBillMaximumSoldQtyFiled`', 5, 22, -1, false, '`SingleBillMaximumSoldQtyFiled`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SingleBillMaximumSoldQtyFiled->Sortable = true; // Allow sort
        $this->SingleBillMaximumSoldQtyFiled->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SingleBillMaximumSoldQtyFiled->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SingleBillMaximumSoldQtyFiled'] = &$this->SingleBillMaximumSoldQtyFiled;

        // Strength1
        $this->Strength1 = new DbField('pharmacy_products', 'pharmacy_products', 'x_Strength1', 'Strength1', '`Strength1`', '`Strength1`', 200, 50, -1, false, '`Strength1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength1->Sortable = true; // Allow sort
        $this->Fields['Strength1'] = &$this->Strength1;

        // Strength2
        $this->Strength2 = new DbField('pharmacy_products', 'pharmacy_products', 'x_Strength2', 'Strength2', '`Strength2`', '`Strength2`', 200, 50, -1, false, '`Strength2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength2->Sortable = true; // Allow sort
        $this->Fields['Strength2'] = &$this->Strength2;

        // Strength3
        $this->Strength3 = new DbField('pharmacy_products', 'pharmacy_products', 'x_Strength3', 'Strength3', '`Strength3`', '`Strength3`', 200, 50, -1, false, '`Strength3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength3->Sortable = true; // Allow sort
        $this->Fields['Strength3'] = &$this->Strength3;

        // Strength4
        $this->Strength4 = new DbField('pharmacy_products', 'pharmacy_products', 'x_Strength4', 'Strength4', '`Strength4`', '`Strength4`', 200, 50, -1, false, '`Strength4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength4->Sortable = true; // Allow sort
        $this->Fields['Strength4'] = &$this->Strength4;

        // Strength5
        $this->Strength5 = new DbField('pharmacy_products', 'pharmacy_products', 'x_Strength5', 'Strength5', '`Strength5`', '`Strength5`', 200, 50, -1, false, '`Strength5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->Strength5->Sortable = true; // Allow sort
        $this->Fields['Strength5'] = &$this->Strength5;

        // IngredientCode1
        $this->IngredientCode1 = new DbField('pharmacy_products', 'pharmacy_products', 'x_IngredientCode1', 'IngredientCode1', '`IngredientCode1`', '`IngredientCode1`', 3, 11, -1, false, '`IngredientCode1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IngredientCode1->Sortable = true; // Allow sort
        $this->IngredientCode1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IngredientCode1'] = &$this->IngredientCode1;

        // IngredientCode2
        $this->IngredientCode2 = new DbField('pharmacy_products', 'pharmacy_products', 'x_IngredientCode2', 'IngredientCode2', '`IngredientCode2`', '`IngredientCode2`', 3, 11, -1, false, '`IngredientCode2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IngredientCode2->Sortable = true; // Allow sort
        $this->IngredientCode2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IngredientCode2'] = &$this->IngredientCode2;

        // IngredientCode3
        $this->IngredientCode3 = new DbField('pharmacy_products', 'pharmacy_products', 'x_IngredientCode3', 'IngredientCode3', '`IngredientCode3`', '`IngredientCode3`', 3, 11, -1, false, '`IngredientCode3`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IngredientCode3->Sortable = true; // Allow sort
        $this->IngredientCode3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IngredientCode3'] = &$this->IngredientCode3;

        // IngredientCode4
        $this->IngredientCode4 = new DbField('pharmacy_products', 'pharmacy_products', 'x_IngredientCode4', 'IngredientCode4', '`IngredientCode4`', '`IngredientCode4`', 3, 11, -1, false, '`IngredientCode4`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IngredientCode4->Sortable = true; // Allow sort
        $this->IngredientCode4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IngredientCode4'] = &$this->IngredientCode4;

        // IngredientCode5
        $this->IngredientCode5 = new DbField('pharmacy_products', 'pharmacy_products', 'x_IngredientCode5', 'IngredientCode5', '`IngredientCode5`', '`IngredientCode5`', 3, 11, -1, false, '`IngredientCode5`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IngredientCode5->Sortable = true; // Allow sort
        $this->IngredientCode5->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IngredientCode5'] = &$this->IngredientCode5;

        // OrderType
        $this->OrderType = new DbField('pharmacy_products', 'pharmacy_products', 'x_OrderType', 'OrderType', '`OrderType`', '`OrderType`', 3, 11, -1, false, '`OrderType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->OrderType->Sortable = true; // Allow sort
        $this->OrderType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['OrderType'] = &$this->OrderType;

        // StockUOM
        $this->StockUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_StockUOM', 'StockUOM', '`StockUOM`', '`StockUOM`', 3, 11, -1, false, '`StockUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StockUOM->Sortable = true; // Allow sort
        $this->StockUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['StockUOM'] = &$this->StockUOM;

        // PriceUOM
        $this->PriceUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_PriceUOM', 'PriceUOM', '`PriceUOM`', '`PriceUOM`', 3, 11, -1, false, '`PriceUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PriceUOM->Sortable = true; // Allow sort
        $this->PriceUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PriceUOM'] = &$this->PriceUOM;

        // DefaultSaleUOM
        $this->DefaultSaleUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_DefaultSaleUOM', 'DefaultSaleUOM', '`DefaultSaleUOM`', '`DefaultSaleUOM`', 3, 11, -1, false, '`DefaultSaleUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DefaultSaleUOM->Sortable = true; // Allow sort
        $this->DefaultSaleUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DefaultSaleUOM'] = &$this->DefaultSaleUOM;

        // DefaultPurchaseUOM
        $this->DefaultPurchaseUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_DefaultPurchaseUOM', 'DefaultPurchaseUOM', '`DefaultPurchaseUOM`', '`DefaultPurchaseUOM`', 3, 11, -1, false, '`DefaultPurchaseUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DefaultPurchaseUOM->Sortable = true; // Allow sort
        $this->DefaultPurchaseUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DefaultPurchaseUOM'] = &$this->DefaultPurchaseUOM;

        // ReportingUOM
        $this->ReportingUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_ReportingUOM', 'ReportingUOM', '`ReportingUOM`', '`ReportingUOM`', 3, 11, -1, false, '`ReportingUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ReportingUOM->Sortable = true; // Allow sort
        $this->ReportingUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ReportingUOM'] = &$this->ReportingUOM;

        // LastPurchasedUOM
        $this->LastPurchasedUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_LastPurchasedUOM', 'LastPurchasedUOM', '`LastPurchasedUOM`', '`LastPurchasedUOM`', 3, 11, -1, false, '`LastPurchasedUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LastPurchasedUOM->Sortable = true; // Allow sort
        $this->LastPurchasedUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['LastPurchasedUOM'] = &$this->LastPurchasedUOM;

        // TreatmentCodes
        $this->TreatmentCodes = new DbField('pharmacy_products', 'pharmacy_products', 'x_TreatmentCodes', 'TreatmentCodes', '`TreatmentCodes`', '`TreatmentCodes`', 200, 100, -1, false, '`TreatmentCodes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TreatmentCodes->Sortable = true; // Allow sort
        $this->Fields['TreatmentCodes'] = &$this->TreatmentCodes;

        // InsuranceType
        $this->InsuranceType = new DbField('pharmacy_products', 'pharmacy_products', 'x_InsuranceType', 'InsuranceType', '`InsuranceType`', '`InsuranceType`', 3, 11, -1, false, '`InsuranceType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->InsuranceType->Sortable = true; // Allow sort
        $this->InsuranceType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['InsuranceType'] = &$this->InsuranceType;

        // CoverageGroupCodes
        $this->CoverageGroupCodes = new DbField('pharmacy_products', 'pharmacy_products', 'x_CoverageGroupCodes', 'CoverageGroupCodes', '`CoverageGroupCodes`', '`CoverageGroupCodes`', 200, 100, -1, false, '`CoverageGroupCodes`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->CoverageGroupCodes->Sortable = true; // Allow sort
        $this->Fields['CoverageGroupCodes'] = &$this->CoverageGroupCodes;

        // MultipleUOM
        $this->MultipleUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_MultipleUOM', 'MultipleUOM', '`MultipleUOM`', '`MultipleUOM`', 17, 3, -1, false, '`MultipleUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MultipleUOM->Sortable = true; // Allow sort
        $this->MultipleUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MultipleUOM'] = &$this->MultipleUOM;

        // SalePriceComputation
        $this->SalePriceComputation = new DbField('pharmacy_products', 'pharmacy_products', 'x_SalePriceComputation', 'SalePriceComputation', '`SalePriceComputation`', '`SalePriceComputation`', 3, 11, -1, false, '`SalePriceComputation`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalePriceComputation->Sortable = true; // Allow sort
        $this->SalePriceComputation->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['SalePriceComputation'] = &$this->SalePriceComputation;

        // StockCorrection
        $this->StockCorrection = new DbField('pharmacy_products', 'pharmacy_products', 'x_StockCorrection', 'StockCorrection', '`StockCorrection`', '`StockCorrection`', 17, 3, -1, false, '`StockCorrection`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->StockCorrection->Sortable = true; // Allow sort
        $this->StockCorrection->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['StockCorrection'] = &$this->StockCorrection;

        // LBTPercentage
        $this->LBTPercentage = new DbField('pharmacy_products', 'pharmacy_products', 'x_LBTPercentage', 'LBTPercentage', '`LBTPercentage`', '`LBTPercentage`', 5, 22, -1, false, '`LBTPercentage`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LBTPercentage->Sortable = true; // Allow sort
        $this->LBTPercentage->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LBTPercentage->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LBTPercentage'] = &$this->LBTPercentage;

        // SalesCommission
        $this->SalesCommission = new DbField('pharmacy_products', 'pharmacy_products', 'x_SalesCommission', 'SalesCommission', '`SalesCommission`', '`SalesCommission`', 5, 22, -1, false, '`SalesCommission`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->SalesCommission->Sortable = true; // Allow sort
        $this->SalesCommission->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->SalesCommission->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['SalesCommission'] = &$this->SalesCommission;

        // LockedStock
        $this->LockedStock = new DbField('pharmacy_products', 'pharmacy_products', 'x_LockedStock', 'LockedStock', '`LockedStock`', '`LockedStock`', 5, 22, -1, false, '`LockedStock`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LockedStock->Sortable = true; // Allow sort
        $this->LockedStock->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LockedStock->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LockedStock'] = &$this->LockedStock;

        // MinMaxUOM
        $this->MinMaxUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_MinMaxUOM', 'MinMaxUOM', '`MinMaxUOM`', '`MinMaxUOM`', 3, 11, -1, false, '`MinMaxUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MinMaxUOM->Sortable = true; // Allow sort
        $this->MinMaxUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['MinMaxUOM'] = &$this->MinMaxUOM;

        // ExpiryMfrDateFormat
        $this->ExpiryMfrDateFormat = new DbField('pharmacy_products', 'pharmacy_products', 'x_ExpiryMfrDateFormat', 'ExpiryMfrDateFormat', '`ExpiryMfrDateFormat`', '`ExpiryMfrDateFormat`', 3, 11, -1, false, '`ExpiryMfrDateFormat`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ExpiryMfrDateFormat->Sortable = true; // Allow sort
        $this->ExpiryMfrDateFormat->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ExpiryMfrDateFormat'] = &$this->ExpiryMfrDateFormat;

        // ProductLifeTime
        $this->ProductLifeTime = new DbField('pharmacy_products', 'pharmacy_products', 'x_ProductLifeTime', 'ProductLifeTime', '`ProductLifeTime`', '`ProductLifeTime`', 3, 11, -1, false, '`ProductLifeTime`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ProductLifeTime->Sortable = true; // Allow sort
        $this->ProductLifeTime->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ProductLifeTime'] = &$this->ProductLifeTime;

        // IsCombo
        $this->IsCombo = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsCombo', 'IsCombo', '`IsCombo`', '`IsCombo`', 17, 3, -1, false, '`IsCombo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsCombo->Sortable = true; // Allow sort
        $this->IsCombo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsCombo'] = &$this->IsCombo;

        // ComboTypeCode
        $this->ComboTypeCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_ComboTypeCode', 'ComboTypeCode', '`ComboTypeCode`', '`ComboTypeCode`', 3, 11, -1, false, '`ComboTypeCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ComboTypeCode->Sortable = true; // Allow sort
        $this->ComboTypeCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ComboTypeCode'] = &$this->ComboTypeCode;

        // AttributeCount6
        $this->AttributeCount6 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount6', 'AttributeCount6', '`AttributeCount6`', '`AttributeCount6`', 3, 11, -1, false, '`AttributeCount6`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount6->Sortable = true; // Allow sort
        $this->AttributeCount6->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount6'] = &$this->AttributeCount6;

        // AttributeCount7
        $this->AttributeCount7 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount7', 'AttributeCount7', '`AttributeCount7`', '`AttributeCount7`', 3, 11, -1, false, '`AttributeCount7`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount7->Sortable = true; // Allow sort
        $this->AttributeCount7->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount7'] = &$this->AttributeCount7;

        // AttributeCount8
        $this->AttributeCount8 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount8', 'AttributeCount8', '`AttributeCount8`', '`AttributeCount8`', 3, 11, -1, false, '`AttributeCount8`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount8->Sortable = true; // Allow sort
        $this->AttributeCount8->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount8'] = &$this->AttributeCount8;

        // AttributeCount9
        $this->AttributeCount9 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount9', 'AttributeCount9', '`AttributeCount9`', '`AttributeCount9`', 3, 11, -1, false, '`AttributeCount9`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount9->Sortable = true; // Allow sort
        $this->AttributeCount9->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount9'] = &$this->AttributeCount9;

        // AttributeCount10
        $this->AttributeCount10 = new DbField('pharmacy_products', 'pharmacy_products', 'x_AttributeCount10', 'AttributeCount10', '`AttributeCount10`', '`AttributeCount10`', 3, 11, -1, false, '`AttributeCount10`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AttributeCount10->Sortable = true; // Allow sort
        $this->AttributeCount10->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AttributeCount10'] = &$this->AttributeCount10;

        // LabourCharge
        $this->LabourCharge = new DbField('pharmacy_products', 'pharmacy_products', 'x_LabourCharge', 'LabourCharge', '`LabourCharge`', '`LabourCharge`', 5, 22, -1, false, '`LabourCharge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LabourCharge->Sortable = true; // Allow sort
        $this->LabourCharge->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LabourCharge->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LabourCharge'] = &$this->LabourCharge;

        // AffectOtherCharge
        $this->AffectOtherCharge = new DbField('pharmacy_products', 'pharmacy_products', 'x_AffectOtherCharge', 'AffectOtherCharge', '`AffectOtherCharge`', '`AffectOtherCharge`', 17, 3, -1, false, '`AffectOtherCharge`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AffectOtherCharge->Sortable = true; // Allow sort
        $this->AffectOtherCharge->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AffectOtherCharge'] = &$this->AffectOtherCharge;

        // DosageInfo
        $this->DosageInfo = new DbField('pharmacy_products', 'pharmacy_products', 'x_DosageInfo', 'DosageInfo', '`DosageInfo`', '`DosageInfo`', 200, 100, -1, false, '`DosageInfo`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DosageInfo->Sortable = true; // Allow sort
        $this->Fields['DosageInfo'] = &$this->DosageInfo;

        // DosageType
        $this->DosageType = new DbField('pharmacy_products', 'pharmacy_products', 'x_DosageType', 'DosageType', '`DosageType`', '`DosageType`', 3, 11, -1, false, '`DosageType`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DosageType->Sortable = true; // Allow sort
        $this->DosageType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DosageType'] = &$this->DosageType;

        // DefaultIndentUOM
        $this->DefaultIndentUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_DefaultIndentUOM', 'DefaultIndentUOM', '`DefaultIndentUOM`', '`DefaultIndentUOM`', 3, 11, -1, false, '`DefaultIndentUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->DefaultIndentUOM->Sortable = true; // Allow sort
        $this->DefaultIndentUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['DefaultIndentUOM'] = &$this->DefaultIndentUOM;

        // PromoTag
        $this->PromoTag = new DbField('pharmacy_products', 'pharmacy_products', 'x_PromoTag', 'PromoTag', '`PromoTag`', '`PromoTag`', 17, 3, -1, false, '`PromoTag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PromoTag->Sortable = true; // Allow sort
        $this->PromoTag->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['PromoTag'] = &$this->PromoTag;

        // BillLevelPromoTag
        $this->BillLevelPromoTag = new DbField('pharmacy_products', 'pharmacy_products', 'x_BillLevelPromoTag', 'BillLevelPromoTag', '`BillLevelPromoTag`', '`BillLevelPromoTag`', 17, 3, -1, false, '`BillLevelPromoTag`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->BillLevelPromoTag->Sortable = true; // Allow sort
        $this->BillLevelPromoTag->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['BillLevelPromoTag'] = &$this->BillLevelPromoTag;

        // IsMRPProduct
        $this->IsMRPProduct = new DbField('pharmacy_products', 'pharmacy_products', 'x_IsMRPProduct', 'IsMRPProduct', '`IsMRPProduct`', '`IsMRPProduct`', 17, 3, -1, false, '`IsMRPProduct`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->IsMRPProduct->Sortable = true; // Allow sort
        $this->IsMRPProduct->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['IsMRPProduct'] = &$this->IsMRPProduct;

        // MrpList
        $this->MrpList = new DbField('pharmacy_products', 'pharmacy_products', 'x_MrpList', 'MrpList', '`MrpList`', '`MrpList`', 201, 1000, -1, false, '`MrpList`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->MrpList->Sortable = true; // Allow sort
        $this->Fields['MrpList'] = &$this->MrpList;

        // AlternateSaleUOM
        $this->AlternateSaleUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_AlternateSaleUOM', 'AlternateSaleUOM', '`AlternateSaleUOM`', '`AlternateSaleUOM`', 3, 11, -1, false, '`AlternateSaleUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AlternateSaleUOM->Sortable = true; // Allow sort
        $this->AlternateSaleUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['AlternateSaleUOM'] = &$this->AlternateSaleUOM;

        // FreeUOM
        $this->FreeUOM = new DbField('pharmacy_products', 'pharmacy_products', 'x_FreeUOM', 'FreeUOM', '`FreeUOM`', '`FreeUOM`', 3, 11, -1, false, '`FreeUOM`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FreeUOM->Sortable = true; // Allow sort
        $this->FreeUOM->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['FreeUOM'] = &$this->FreeUOM;

        // MarketedCode
        $this->MarketedCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_MarketedCode', 'MarketedCode', '`MarketedCode`', '`MarketedCode`', 200, 15, -1, false, '`MarketedCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MarketedCode->Sortable = true; // Allow sort
        $this->Fields['MarketedCode'] = &$this->MarketedCode;

        // MinimumSalePrice
        $this->MinimumSalePrice = new DbField('pharmacy_products', 'pharmacy_products', 'x_MinimumSalePrice', 'MinimumSalePrice', '`MinimumSalePrice`', '`MinimumSalePrice`', 5, 22, -1, false, '`MinimumSalePrice`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->MinimumSalePrice->Sortable = true; // Allow sort
        $this->MinimumSalePrice->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->MinimumSalePrice->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['MinimumSalePrice'] = &$this->MinimumSalePrice;

        // PRate1
        $this->PRate1 = new DbField('pharmacy_products', 'pharmacy_products', 'x_PRate1', 'PRate1', '`PRate1`', '`PRate1`', 5, 22, -1, false, '`PRate1`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRate1->Sortable = true; // Allow sort
        $this->PRate1->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PRate1->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PRate1'] = &$this->PRate1;

        // PRate2
        $this->PRate2 = new DbField('pharmacy_products', 'pharmacy_products', 'x_PRate2', 'PRate2', '`PRate2`', '`PRate2`', 5, 22, -1, false, '`PRate2`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->PRate2->Sortable = true; // Allow sort
        $this->PRate2->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->PRate2->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['PRate2'] = &$this->PRate2;

        // LPItemCost
        $this->LPItemCost = new DbField('pharmacy_products', 'pharmacy_products', 'x_LPItemCost', 'LPItemCost', '`LPItemCost`', '`LPItemCost`', 5, 22, -1, false, '`LPItemCost`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->LPItemCost->Sortable = true; // Allow sort
        $this->LPItemCost->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->LPItemCost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['LPItemCost'] = &$this->LPItemCost;

        // FixedItemCost
        $this->FixedItemCost = new DbField('pharmacy_products', 'pharmacy_products', 'x_FixedItemCost', 'FixedItemCost', '`FixedItemCost`', '`FixedItemCost`', 5, 22, -1, false, '`FixedItemCost`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->FixedItemCost->Sortable = true; // Allow sort
        $this->FixedItemCost->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->FixedItemCost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['FixedItemCost'] = &$this->FixedItemCost;

        // HSNId
        $this->HSNId = new DbField('pharmacy_products', 'pharmacy_products', 'x_HSNId', 'HSNId', '`HSNId`', '`HSNId`', 3, 11, -1, false, '`HSNId`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HSNId->Sortable = true; // Allow sort
        $this->HSNId->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HSNId'] = &$this->HSNId;

        // TaxInclusive
        $this->TaxInclusive = new DbField('pharmacy_products', 'pharmacy_products', 'x_TaxInclusive', 'TaxInclusive', '`TaxInclusive`', '`TaxInclusive`', 17, 3, -1, false, '`TaxInclusive`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->TaxInclusive->Sortable = true; // Allow sort
        $this->TaxInclusive->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['TaxInclusive'] = &$this->TaxInclusive;

        // EligibleforWarranty
        $this->EligibleforWarranty = new DbField('pharmacy_products', 'pharmacy_products', 'x_EligibleforWarranty', 'EligibleforWarranty', '`EligibleforWarranty`', '`EligibleforWarranty`', 17, 3, -1, false, '`EligibleforWarranty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EligibleforWarranty->Sortable = true; // Allow sort
        $this->EligibleforWarranty->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['EligibleforWarranty'] = &$this->EligibleforWarranty;

        // NoofMonthsWarranty
        $this->NoofMonthsWarranty = new DbField('pharmacy_products', 'pharmacy_products', 'x_NoofMonthsWarranty', 'NoofMonthsWarranty', '`NoofMonthsWarranty`', '`NoofMonthsWarranty`', 3, 11, -1, false, '`NoofMonthsWarranty`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->NoofMonthsWarranty->Sortable = true; // Allow sort
        $this->NoofMonthsWarranty->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['NoofMonthsWarranty'] = &$this->NoofMonthsWarranty;

        // ComputeTaxonCost
        $this->ComputeTaxonCost = new DbField('pharmacy_products', 'pharmacy_products', 'x_ComputeTaxonCost', 'ComputeTaxonCost', '`ComputeTaxonCost`', '`ComputeTaxonCost`', 17, 3, -1, false, '`ComputeTaxonCost`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->ComputeTaxonCost->Sortable = true; // Allow sort
        $this->ComputeTaxonCost->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['ComputeTaxonCost'] = &$this->ComputeTaxonCost;

        // HasEmptyBottleTrack
        $this->HasEmptyBottleTrack = new DbField('pharmacy_products', 'pharmacy_products', 'x_HasEmptyBottleTrack', 'HasEmptyBottleTrack', '`HasEmptyBottleTrack`', '`HasEmptyBottleTrack`', 17, 3, -1, false, '`HasEmptyBottleTrack`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->HasEmptyBottleTrack->Sortable = true; // Allow sort
        $this->HasEmptyBottleTrack->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['HasEmptyBottleTrack'] = &$this->HasEmptyBottleTrack;

        // EmptyBottleReferenceCode
        $this->EmptyBottleReferenceCode = new DbField('pharmacy_products', 'pharmacy_products', 'x_EmptyBottleReferenceCode', 'EmptyBottleReferenceCode', '`EmptyBottleReferenceCode`', '`EmptyBottleReferenceCode`', 3, 11, -1, false, '`EmptyBottleReferenceCode`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmptyBottleReferenceCode->Sortable = true; // Allow sort
        $this->EmptyBottleReferenceCode->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->Fields['EmptyBottleReferenceCode'] = &$this->EmptyBottleReferenceCode;

        // AdditionalCESSAmount
        $this->AdditionalCESSAmount = new DbField('pharmacy_products', 'pharmacy_products', 'x_AdditionalCESSAmount', 'AdditionalCESSAmount', '`AdditionalCESSAmount`', '`AdditionalCESSAmount`', 5, 22, -1, false, '`AdditionalCESSAmount`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->AdditionalCESSAmount->Sortable = true; // Allow sort
        $this->AdditionalCESSAmount->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->AdditionalCESSAmount->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['AdditionalCESSAmount'] = &$this->AdditionalCESSAmount;

        // EmptyBottleRate
        $this->EmptyBottleRate = new DbField('pharmacy_products', 'pharmacy_products', 'x_EmptyBottleRate', 'EmptyBottleRate', '`EmptyBottleRate`', '`EmptyBottleRate`', 5, 22, -1, false, '`EmptyBottleRate`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->EmptyBottleRate->Sortable = true; // Allow sort
        $this->EmptyBottleRate->DefaultDecimalPrecision = 2; // Default decimal precision
        $this->EmptyBottleRate->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
        $this->Fields['EmptyBottleRate'] = &$this->EmptyBottleRate;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`pharmacy_products`";
    }

    public function sqlFrom() // For backward compatibility
    {
        return $this->getSqlFrom();
    }

    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
    }

    public function sqlSelect() // For backward compatibility
    {
        return $this->getSqlSelect();
    }

    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    public function sqlWhere() // For backward compatibility
    {
        return $this->getSqlWhere();
    }

    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    public function getSqlGroupBy() // Group By
    {
        return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
    }

    public function sqlGroupBy() // For backward compatibility
    {
        return $this->getSqlGroupBy();
    }

    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    public function sqlHaving() // For backward compatibility
    {
        return $this->getSqlHaving();
    }

    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    public function getSqlOrderBy() // Order By
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
    }

    public function sqlOrderBy() // For backward compatibility
    {
        return $this->getSqlOrderBy();
    }

    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter)
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return (($allow & 1) == 1);
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return (($allow & 4) == 4);
            case "delete":
                return (($allow & 2) == 2);
            case "view":
                return (($allow & 32) == 32);
            case "search":
                return (($allow & 64) == 64);
            default:
                return (($allow & 8) == 8);
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sql = $sql->resetQueryPart("orderBy")->getSQL();
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->ProductCode->setDbValue($conn->lastInsertId());
            $rs['ProductCode'] = $this->ProductCode->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('ProductCode', $rs)) {
                AddFilter($where, QuotedName('ProductCode', $this->Dbid) . '=' . QuotedValue($rs['ProductCode'], $this->ProductCode->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->ProductCode->DbValue = $row['ProductCode'];
        $this->ProductName->DbValue = $row['ProductName'];
        $this->DivisionCode->DbValue = $row['DivisionCode'];
        $this->ManufacturerCode->DbValue = $row['ManufacturerCode'];
        $this->SupplierCode->DbValue = $row['SupplierCode'];
        $this->AlternateSupplierCodes->DbValue = $row['AlternateSupplierCodes'];
        $this->AlternateProductCode->DbValue = $row['AlternateProductCode'];
        $this->UniversalProductCode->DbValue = $row['UniversalProductCode'];
        $this->BookProductCode->DbValue = $row['BookProductCode'];
        $this->OldCode->DbValue = $row['OldCode'];
        $this->ProtectedProducts->DbValue = $row['ProtectedProducts'];
        $this->ProductFullName->DbValue = $row['ProductFullName'];
        $this->UnitOfMeasure->DbValue = $row['UnitOfMeasure'];
        $this->UnitDescription->DbValue = $row['UnitDescription'];
        $this->BulkDescription->DbValue = $row['BulkDescription'];
        $this->BarCodeDescription->DbValue = $row['BarCodeDescription'];
        $this->PackageInformation->DbValue = $row['PackageInformation'];
        $this->PackageId->DbValue = $row['PackageId'];
        $this->Weight->DbValue = $row['Weight'];
        $this->AllowFractions->DbValue = $row['AllowFractions'];
        $this->MinimumStockLevel->DbValue = $row['MinimumStockLevel'];
        $this->MaximumStockLevel->DbValue = $row['MaximumStockLevel'];
        $this->ReorderLevel->DbValue = $row['ReorderLevel'];
        $this->MinMaxRatio->DbValue = $row['MinMaxRatio'];
        $this->AutoMinMaxRatio->DbValue = $row['AutoMinMaxRatio'];
        $this->ScheduleCode->DbValue = $row['ScheduleCode'];
        $this->RopRatio->DbValue = $row['RopRatio'];
        $this->MRP->DbValue = $row['MRP'];
        $this->PurchasePrice->DbValue = $row['PurchasePrice'];
        $this->PurchaseUnit->DbValue = $row['PurchaseUnit'];
        $this->PurchaseTaxCode->DbValue = $row['PurchaseTaxCode'];
        $this->AllowDirectInward->DbValue = $row['AllowDirectInward'];
        $this->SalePrice->DbValue = $row['SalePrice'];
        $this->SaleUnit->DbValue = $row['SaleUnit'];
        $this->SalesTaxCode->DbValue = $row['SalesTaxCode'];
        $this->StockReceived->DbValue = $row['StockReceived'];
        $this->TotalStock->DbValue = $row['TotalStock'];
        $this->StockType->DbValue = $row['StockType'];
        $this->StockCheckDate->DbValue = $row['StockCheckDate'];
        $this->StockAdjustmentDate->DbValue = $row['StockAdjustmentDate'];
        $this->Remarks->DbValue = $row['Remarks'];
        $this->CostCentre->DbValue = $row['CostCentre'];
        $this->ProductType->DbValue = $row['ProductType'];
        $this->TaxAmount->DbValue = $row['TaxAmount'];
        $this->TaxId->DbValue = $row['TaxId'];
        $this->ResaleTaxApplicable->DbValue = $row['ResaleTaxApplicable'];
        $this->CstOtherTax->DbValue = $row['CstOtherTax'];
        $this->TotalTax->DbValue = $row['TotalTax'];
        $this->ItemCost->DbValue = $row['ItemCost'];
        $this->ExpiryDate->DbValue = $row['ExpiryDate'];
        $this->BatchDescription->DbValue = $row['BatchDescription'];
        $this->FreeScheme->DbValue = $row['FreeScheme'];
        $this->CashDiscountEligibility->DbValue = $row['CashDiscountEligibility'];
        $this->DiscountPerAllowInBill->DbValue = $row['DiscountPerAllowInBill'];
        $this->Discount->DbValue = $row['Discount'];
        $this->TotalAmount->DbValue = $row['TotalAmount'];
        $this->StandardMargin->DbValue = $row['StandardMargin'];
        $this->Margin->DbValue = $row['Margin'];
        $this->MarginId->DbValue = $row['MarginId'];
        $this->ExpectedMargin->DbValue = $row['ExpectedMargin'];
        $this->SurchargeBeforeTax->DbValue = $row['SurchargeBeforeTax'];
        $this->SurchargeAfterTax->DbValue = $row['SurchargeAfterTax'];
        $this->TempOrderNo->DbValue = $row['TempOrderNo'];
        $this->TempOrderDate->DbValue = $row['TempOrderDate'];
        $this->OrderUnit->DbValue = $row['OrderUnit'];
        $this->OrderQuantity->DbValue = $row['OrderQuantity'];
        $this->MarkForOrder->DbValue = $row['MarkForOrder'];
        $this->OrderAllId->DbValue = $row['OrderAllId'];
        $this->CalculateOrderQty->DbValue = $row['CalculateOrderQty'];
        $this->SubLocation->DbValue = $row['SubLocation'];
        $this->CategoryCode->DbValue = $row['CategoryCode'];
        $this->SubCategory->DbValue = $row['SubCategory'];
        $this->FlexCategoryCode->DbValue = $row['FlexCategoryCode'];
        $this->ABCSaleQty->DbValue = $row['ABCSaleQty'];
        $this->ABCSaleValue->DbValue = $row['ABCSaleValue'];
        $this->ConvertionFactor->DbValue = $row['ConvertionFactor'];
        $this->ConvertionUnitDesc->DbValue = $row['ConvertionUnitDesc'];
        $this->TransactionId->DbValue = $row['TransactionId'];
        $this->SoldProductId->DbValue = $row['SoldProductId'];
        $this->WantedBookId->DbValue = $row['WantedBookId'];
        $this->AllId->DbValue = $row['AllId'];
        $this->BatchAndExpiryCompulsory->DbValue = $row['BatchAndExpiryCompulsory'];
        $this->BatchStockForWantedBook->DbValue = $row['BatchStockForWantedBook'];
        $this->UnitBasedBilling->DbValue = $row['UnitBasedBilling'];
        $this->DoNotCheckStock->DbValue = $row['DoNotCheckStock'];
        $this->AcceptRate->DbValue = $row['AcceptRate'];
        $this->PriceLevel->DbValue = $row['PriceLevel'];
        $this->LastQuotePrice->DbValue = $row['LastQuotePrice'];
        $this->PriceChange->DbValue = $row['PriceChange'];
        $this->CommodityCode->DbValue = $row['CommodityCode'];
        $this->InstitutePrice->DbValue = $row['InstitutePrice'];
        $this->CtrlOrDCtrlProduct->DbValue = $row['CtrlOrDCtrlProduct'];
        $this->ImportedDate->DbValue = $row['ImportedDate'];
        $this->IsImported->DbValue = $row['IsImported'];
        $this->FileName->DbValue = $row['FileName'];
        $this->LPName->DbValue = $row['LPName'];
        $this->GodownNumber->DbValue = $row['GodownNumber'];
        $this->CreationDate->DbValue = $row['CreationDate'];
        $this->CreatedbyUser->DbValue = $row['CreatedbyUser'];
        $this->ModifiedDate->DbValue = $row['ModifiedDate'];
        $this->ModifiedbyUser->DbValue = $row['ModifiedbyUser'];
        $this->isActive->DbValue = $row['isActive'];
        $this->AllowExpiryClaim->DbValue = $row['AllowExpiryClaim'];
        $this->BrandCode->DbValue = $row['BrandCode'];
        $this->FreeSchemeBasedon->DbValue = $row['FreeSchemeBasedon'];
        $this->DoNotCheckCostInBill->DbValue = $row['DoNotCheckCostInBill'];
        $this->ProductGroupCode->DbValue = $row['ProductGroupCode'];
        $this->ProductStrengthCode->DbValue = $row['ProductStrengthCode'];
        $this->PackingCode->DbValue = $row['PackingCode'];
        $this->ComputedMinStock->DbValue = $row['ComputedMinStock'];
        $this->ComputedMaxStock->DbValue = $row['ComputedMaxStock'];
        $this->ProductRemark->DbValue = $row['ProductRemark'];
        $this->ProductDrugCode->DbValue = $row['ProductDrugCode'];
        $this->IsMatrixProduct->DbValue = $row['IsMatrixProduct'];
        $this->AttributeCount1->DbValue = $row['AttributeCount1'];
        $this->AttributeCount2->DbValue = $row['AttributeCount2'];
        $this->AttributeCount3->DbValue = $row['AttributeCount3'];
        $this->AttributeCount4->DbValue = $row['AttributeCount4'];
        $this->AttributeCount5->DbValue = $row['AttributeCount5'];
        $this->DefaultDiscountPercentage->DbValue = $row['DefaultDiscountPercentage'];
        $this->DonotPrintBarcode->DbValue = $row['DonotPrintBarcode'];
        $this->ProductLevelDiscount->DbValue = $row['ProductLevelDiscount'];
        $this->Markup->DbValue = $row['Markup'];
        $this->MarkDown->DbValue = $row['MarkDown'];
        $this->ReworkSalePrice->DbValue = $row['ReworkSalePrice'];
        $this->MultipleInput->DbValue = $row['MultipleInput'];
        $this->LpPackageInformation->DbValue = $row['LpPackageInformation'];
        $this->AllowNegativeStock->DbValue = $row['AllowNegativeStock'];
        $this->OrderDate->DbValue = $row['OrderDate'];
        $this->OrderTime->DbValue = $row['OrderTime'];
        $this->RateGroupCode->DbValue = $row['RateGroupCode'];
        $this->ConversionCaseLot->DbValue = $row['ConversionCaseLot'];
        $this->ShippingLot->DbValue = $row['ShippingLot'];
        $this->AllowExpiryReplacement->DbValue = $row['AllowExpiryReplacement'];
        $this->NoOfMonthExpiryAllowed->DbValue = $row['NoOfMonthExpiryAllowed'];
        $this->ProductDiscountEligibility->DbValue = $row['ProductDiscountEligibility'];
        $this->ScheduleTypeCode->DbValue = $row['ScheduleTypeCode'];
        $this->AIOCDProductCode->DbValue = $row['AIOCDProductCode'];
        $this->FreeQuantity->DbValue = $row['FreeQuantity'];
        $this->DiscountType->DbValue = $row['DiscountType'];
        $this->DiscountValue->DbValue = $row['DiscountValue'];
        $this->HasProductOrderAttribute->DbValue = $row['HasProductOrderAttribute'];
        $this->FirstPODate->DbValue = $row['FirstPODate'];
        $this->SaleprcieAndMrpCalcPercent->DbValue = $row['SaleprcieAndMrpCalcPercent'];
        $this->IsGiftVoucherProducts->DbValue = $row['IsGiftVoucherProducts'];
        $this->AcceptRange4SerialNumber->DbValue = $row['AcceptRange4SerialNumber'];
        $this->GiftVoucherDenomination->DbValue = $row['GiftVoucherDenomination'];
        $this->Subclasscode->DbValue = $row['Subclasscode'];
        $this->BarCodeFromWeighingMachine->DbValue = $row['BarCodeFromWeighingMachine'];
        $this->CheckCostInReturn->DbValue = $row['CheckCostInReturn'];
        $this->FrequentSaleProduct->DbValue = $row['FrequentSaleProduct'];
        $this->RateType->DbValue = $row['RateType'];
        $this->TouchscreenName->DbValue = $row['TouchscreenName'];
        $this->FreeType->DbValue = $row['FreeType'];
        $this->LooseQtyasNewBatch->DbValue = $row['LooseQtyasNewBatch'];
        $this->AllowSlabBilling->DbValue = $row['AllowSlabBilling'];
        $this->ProductTypeForProduction->DbValue = $row['ProductTypeForProduction'];
        $this->RecipeCode->DbValue = $row['RecipeCode'];
        $this->DefaultUnitType->DbValue = $row['DefaultUnitType'];
        $this->PIstatus->DbValue = $row['PIstatus'];
        $this->LastPiConfirmedDate->DbValue = $row['LastPiConfirmedDate'];
        $this->BarCodeDesign->DbValue = $row['BarCodeDesign'];
        $this->AcceptRemarksInBill->DbValue = $row['AcceptRemarksInBill'];
        $this->Classification->DbValue = $row['Classification'];
        $this->TimeSlot->DbValue = $row['TimeSlot'];
        $this->IsBundle->DbValue = $row['IsBundle'];
        $this->ColorCode->DbValue = $row['ColorCode'];
        $this->GenderCode->DbValue = $row['GenderCode'];
        $this->SizeCode->DbValue = $row['SizeCode'];
        $this->GiftCard->DbValue = $row['GiftCard'];
        $this->ToonLabel->DbValue = $row['ToonLabel'];
        $this->GarmentType->DbValue = $row['GarmentType'];
        $this->AgeGroup->DbValue = $row['AgeGroup'];
        $this->Season->DbValue = $row['Season'];
        $this->DailyStockEntry->DbValue = $row['DailyStockEntry'];
        $this->ModifierApplicable->DbValue = $row['ModifierApplicable'];
        $this->ModifierType->DbValue = $row['ModifierType'];
        $this->AcceptZeroRate->DbValue = $row['AcceptZeroRate'];
        $this->ExciseDutyCode->DbValue = $row['ExciseDutyCode'];
        $this->IndentProductGroupCode->DbValue = $row['IndentProductGroupCode'];
        $this->IsMultiBatch->DbValue = $row['IsMultiBatch'];
        $this->IsSingleBatch->DbValue = $row['IsSingleBatch'];
        $this->MarkUpRate1->DbValue = $row['MarkUpRate1'];
        $this->MarkDownRate1->DbValue = $row['MarkDownRate1'];
        $this->MarkUpRate2->DbValue = $row['MarkUpRate2'];
        $this->MarkDownRate2->DbValue = $row['MarkDownRate2'];
        $this->_Yield->DbValue = $row['Yield'];
        $this->RefProductCode->DbValue = $row['RefProductCode'];
        $this->Volume->DbValue = $row['Volume'];
        $this->MeasurementID->DbValue = $row['MeasurementID'];
        $this->CountryCode->DbValue = $row['CountryCode'];
        $this->AcceptWMQty->DbValue = $row['AcceptWMQty'];
        $this->SingleBatchBasedOnRate->DbValue = $row['SingleBatchBasedOnRate'];
        $this->TenderNo->DbValue = $row['TenderNo'];
        $this->SingleBillMaximumSoldQtyFiled->DbValue = $row['SingleBillMaximumSoldQtyFiled'];
        $this->Strength1->DbValue = $row['Strength1'];
        $this->Strength2->DbValue = $row['Strength2'];
        $this->Strength3->DbValue = $row['Strength3'];
        $this->Strength4->DbValue = $row['Strength4'];
        $this->Strength5->DbValue = $row['Strength5'];
        $this->IngredientCode1->DbValue = $row['IngredientCode1'];
        $this->IngredientCode2->DbValue = $row['IngredientCode2'];
        $this->IngredientCode3->DbValue = $row['IngredientCode3'];
        $this->IngredientCode4->DbValue = $row['IngredientCode4'];
        $this->IngredientCode5->DbValue = $row['IngredientCode5'];
        $this->OrderType->DbValue = $row['OrderType'];
        $this->StockUOM->DbValue = $row['StockUOM'];
        $this->PriceUOM->DbValue = $row['PriceUOM'];
        $this->DefaultSaleUOM->DbValue = $row['DefaultSaleUOM'];
        $this->DefaultPurchaseUOM->DbValue = $row['DefaultPurchaseUOM'];
        $this->ReportingUOM->DbValue = $row['ReportingUOM'];
        $this->LastPurchasedUOM->DbValue = $row['LastPurchasedUOM'];
        $this->TreatmentCodes->DbValue = $row['TreatmentCodes'];
        $this->InsuranceType->DbValue = $row['InsuranceType'];
        $this->CoverageGroupCodes->DbValue = $row['CoverageGroupCodes'];
        $this->MultipleUOM->DbValue = $row['MultipleUOM'];
        $this->SalePriceComputation->DbValue = $row['SalePriceComputation'];
        $this->StockCorrection->DbValue = $row['StockCorrection'];
        $this->LBTPercentage->DbValue = $row['LBTPercentage'];
        $this->SalesCommission->DbValue = $row['SalesCommission'];
        $this->LockedStock->DbValue = $row['LockedStock'];
        $this->MinMaxUOM->DbValue = $row['MinMaxUOM'];
        $this->ExpiryMfrDateFormat->DbValue = $row['ExpiryMfrDateFormat'];
        $this->ProductLifeTime->DbValue = $row['ProductLifeTime'];
        $this->IsCombo->DbValue = $row['IsCombo'];
        $this->ComboTypeCode->DbValue = $row['ComboTypeCode'];
        $this->AttributeCount6->DbValue = $row['AttributeCount6'];
        $this->AttributeCount7->DbValue = $row['AttributeCount7'];
        $this->AttributeCount8->DbValue = $row['AttributeCount8'];
        $this->AttributeCount9->DbValue = $row['AttributeCount9'];
        $this->AttributeCount10->DbValue = $row['AttributeCount10'];
        $this->LabourCharge->DbValue = $row['LabourCharge'];
        $this->AffectOtherCharge->DbValue = $row['AffectOtherCharge'];
        $this->DosageInfo->DbValue = $row['DosageInfo'];
        $this->DosageType->DbValue = $row['DosageType'];
        $this->DefaultIndentUOM->DbValue = $row['DefaultIndentUOM'];
        $this->PromoTag->DbValue = $row['PromoTag'];
        $this->BillLevelPromoTag->DbValue = $row['BillLevelPromoTag'];
        $this->IsMRPProduct->DbValue = $row['IsMRPProduct'];
        $this->MrpList->DbValue = $row['MrpList'];
        $this->AlternateSaleUOM->DbValue = $row['AlternateSaleUOM'];
        $this->FreeUOM->DbValue = $row['FreeUOM'];
        $this->MarketedCode->DbValue = $row['MarketedCode'];
        $this->MinimumSalePrice->DbValue = $row['MinimumSalePrice'];
        $this->PRate1->DbValue = $row['PRate1'];
        $this->PRate2->DbValue = $row['PRate2'];
        $this->LPItemCost->DbValue = $row['LPItemCost'];
        $this->FixedItemCost->DbValue = $row['FixedItemCost'];
        $this->HSNId->DbValue = $row['HSNId'];
        $this->TaxInclusive->DbValue = $row['TaxInclusive'];
        $this->EligibleforWarranty->DbValue = $row['EligibleforWarranty'];
        $this->NoofMonthsWarranty->DbValue = $row['NoofMonthsWarranty'];
        $this->ComputeTaxonCost->DbValue = $row['ComputeTaxonCost'];
        $this->HasEmptyBottleTrack->DbValue = $row['HasEmptyBottleTrack'];
        $this->EmptyBottleReferenceCode->DbValue = $row['EmptyBottleReferenceCode'];
        $this->AdditionalCESSAmount->DbValue = $row['AdditionalCESSAmount'];
        $this->EmptyBottleRate->DbValue = $row['EmptyBottleRate'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`ProductCode` = @ProductCode@";
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('ProductCode', $row) ? $row['ProductCode'] : null;
        } else {
            $val = $this->ProductCode->OldValue !== null ? $this->ProductCode->OldValue : $this->ProductCode->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@ProductCode@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if (ReferUrl() != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login") { // Referer not same page or login page
            $_SESSION[$name] = ReferUrl(); // Save to Session
        }
        if (@$_SESSION[$name] != "") {
            return $_SESSION[$name];
        } else {
            return GetUrl("PharmacyProductsList");
        }
    }

    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "PharmacyProductsView") {
            return $Language->phrase("View");
        } elseif ($pageName == "PharmacyProductsEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "PharmacyProductsAdd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "PharmacyProductsList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("PharmacyProductsView", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("PharmacyProductsView", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "PharmacyProductsAdd?" . $this->getUrlParm($parm);
        } else {
            $url = "PharmacyProductsAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("PharmacyProductsEdit", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        $url = $this->keyUrl("PharmacyProductsAdd", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl()
    {
        return $this->keyUrl("PharmacyProductsDelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "ProductCode:" . JsonEncode($this->ProductCode->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->ProductCode->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->ProductCode->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
            return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("ProductCode") ?? Route("ProductCode")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->ProductCode->CurrentValue = $key;
            } else {
                $this->ProductCode->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
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

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

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

        // LPName
        $this->LPName->ViewValue = $this->LPName->CurrentValue;
        $this->LPName->ViewCustomAttributes = "";

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

        // MrpList
        $this->MrpList->ViewValue = $this->MrpList->CurrentValue;
        $this->MrpList->ViewCustomAttributes = "";

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

        // LPName
        $this->LPName->LinkCustomAttributes = "";
        $this->LPName->HrefValue = "";
        $this->LPName->TooltipValue = "";

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

        // MrpList
        $this->MrpList->LinkCustomAttributes = "";
        $this->MrpList->HrefValue = "";
        $this->MrpList->TooltipValue = "";

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

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // ProductCode
        $this->ProductCode->EditAttrs["class"] = "form-control";
        $this->ProductCode->EditCustomAttributes = "";
        $this->ProductCode->EditValue = $this->ProductCode->CurrentValue;
        $this->ProductCode->ViewCustomAttributes = "";

        // ProductName
        $this->ProductName->EditAttrs["class"] = "form-control";
        $this->ProductName->EditCustomAttributes = "";
        if (!$this->ProductName->Raw) {
            $this->ProductName->CurrentValue = HtmlDecode($this->ProductName->CurrentValue);
        }
        $this->ProductName->EditValue = $this->ProductName->CurrentValue;
        $this->ProductName->PlaceHolder = RemoveHtml($this->ProductName->caption());

        // DivisionCode
        $this->DivisionCode->EditAttrs["class"] = "form-control";
        $this->DivisionCode->EditCustomAttributes = "";
        if (!$this->DivisionCode->Raw) {
            $this->DivisionCode->CurrentValue = HtmlDecode($this->DivisionCode->CurrentValue);
        }
        $this->DivisionCode->EditValue = $this->DivisionCode->CurrentValue;
        $this->DivisionCode->PlaceHolder = RemoveHtml($this->DivisionCode->caption());

        // ManufacturerCode
        $this->ManufacturerCode->EditAttrs["class"] = "form-control";
        $this->ManufacturerCode->EditCustomAttributes = "";
        if (!$this->ManufacturerCode->Raw) {
            $this->ManufacturerCode->CurrentValue = HtmlDecode($this->ManufacturerCode->CurrentValue);
        }
        $this->ManufacturerCode->EditValue = $this->ManufacturerCode->CurrentValue;
        $this->ManufacturerCode->PlaceHolder = RemoveHtml($this->ManufacturerCode->caption());

        // SupplierCode
        $this->SupplierCode->EditAttrs["class"] = "form-control";
        $this->SupplierCode->EditCustomAttributes = "";
        if (!$this->SupplierCode->Raw) {
            $this->SupplierCode->CurrentValue = HtmlDecode($this->SupplierCode->CurrentValue);
        }
        $this->SupplierCode->EditValue = $this->SupplierCode->CurrentValue;
        $this->SupplierCode->PlaceHolder = RemoveHtml($this->SupplierCode->caption());

        // AlternateSupplierCodes
        $this->AlternateSupplierCodes->EditAttrs["class"] = "form-control";
        $this->AlternateSupplierCodes->EditCustomAttributes = "";
        if (!$this->AlternateSupplierCodes->Raw) {
            $this->AlternateSupplierCodes->CurrentValue = HtmlDecode($this->AlternateSupplierCodes->CurrentValue);
        }
        $this->AlternateSupplierCodes->EditValue = $this->AlternateSupplierCodes->CurrentValue;
        $this->AlternateSupplierCodes->PlaceHolder = RemoveHtml($this->AlternateSupplierCodes->caption());

        // AlternateProductCode
        $this->AlternateProductCode->EditAttrs["class"] = "form-control";
        $this->AlternateProductCode->EditCustomAttributes = "";
        if (!$this->AlternateProductCode->Raw) {
            $this->AlternateProductCode->CurrentValue = HtmlDecode($this->AlternateProductCode->CurrentValue);
        }
        $this->AlternateProductCode->EditValue = $this->AlternateProductCode->CurrentValue;
        $this->AlternateProductCode->PlaceHolder = RemoveHtml($this->AlternateProductCode->caption());

        // UniversalProductCode
        $this->UniversalProductCode->EditAttrs["class"] = "form-control";
        $this->UniversalProductCode->EditCustomAttributes = "";
        $this->UniversalProductCode->EditValue = $this->UniversalProductCode->CurrentValue;
        $this->UniversalProductCode->PlaceHolder = RemoveHtml($this->UniversalProductCode->caption());

        // BookProductCode
        $this->BookProductCode->EditAttrs["class"] = "form-control";
        $this->BookProductCode->EditCustomAttributes = "";
        $this->BookProductCode->EditValue = $this->BookProductCode->CurrentValue;
        $this->BookProductCode->PlaceHolder = RemoveHtml($this->BookProductCode->caption());

        // OldCode
        $this->OldCode->EditAttrs["class"] = "form-control";
        $this->OldCode->EditCustomAttributes = "";
        if (!$this->OldCode->Raw) {
            $this->OldCode->CurrentValue = HtmlDecode($this->OldCode->CurrentValue);
        }
        $this->OldCode->EditValue = $this->OldCode->CurrentValue;
        $this->OldCode->PlaceHolder = RemoveHtml($this->OldCode->caption());

        // ProtectedProducts
        $this->ProtectedProducts->EditAttrs["class"] = "form-control";
        $this->ProtectedProducts->EditCustomAttributes = "";
        $this->ProtectedProducts->EditValue = $this->ProtectedProducts->CurrentValue;
        $this->ProtectedProducts->PlaceHolder = RemoveHtml($this->ProtectedProducts->caption());

        // ProductFullName
        $this->ProductFullName->EditAttrs["class"] = "form-control";
        $this->ProductFullName->EditCustomAttributes = "";
        if (!$this->ProductFullName->Raw) {
            $this->ProductFullName->CurrentValue = HtmlDecode($this->ProductFullName->CurrentValue);
        }
        $this->ProductFullName->EditValue = $this->ProductFullName->CurrentValue;
        $this->ProductFullName->PlaceHolder = RemoveHtml($this->ProductFullName->caption());

        // UnitOfMeasure
        $this->UnitOfMeasure->EditAttrs["class"] = "form-control";
        $this->UnitOfMeasure->EditCustomAttributes = "";
        $this->UnitOfMeasure->EditValue = $this->UnitOfMeasure->CurrentValue;
        $this->UnitOfMeasure->PlaceHolder = RemoveHtml($this->UnitOfMeasure->caption());

        // UnitDescription
        $this->UnitDescription->EditAttrs["class"] = "form-control";
        $this->UnitDescription->EditCustomAttributes = "";
        if (!$this->UnitDescription->Raw) {
            $this->UnitDescription->CurrentValue = HtmlDecode($this->UnitDescription->CurrentValue);
        }
        $this->UnitDescription->EditValue = $this->UnitDescription->CurrentValue;
        $this->UnitDescription->PlaceHolder = RemoveHtml($this->UnitDescription->caption());

        // BulkDescription
        $this->BulkDescription->EditAttrs["class"] = "form-control";
        $this->BulkDescription->EditCustomAttributes = "";
        if (!$this->BulkDescription->Raw) {
            $this->BulkDescription->CurrentValue = HtmlDecode($this->BulkDescription->CurrentValue);
        }
        $this->BulkDescription->EditValue = $this->BulkDescription->CurrentValue;
        $this->BulkDescription->PlaceHolder = RemoveHtml($this->BulkDescription->caption());

        // BarCodeDescription
        $this->BarCodeDescription->EditAttrs["class"] = "form-control";
        $this->BarCodeDescription->EditCustomAttributes = "";
        if (!$this->BarCodeDescription->Raw) {
            $this->BarCodeDescription->CurrentValue = HtmlDecode($this->BarCodeDescription->CurrentValue);
        }
        $this->BarCodeDescription->EditValue = $this->BarCodeDescription->CurrentValue;
        $this->BarCodeDescription->PlaceHolder = RemoveHtml($this->BarCodeDescription->caption());

        // PackageInformation
        $this->PackageInformation->EditAttrs["class"] = "form-control";
        $this->PackageInformation->EditCustomAttributes = "";
        if (!$this->PackageInformation->Raw) {
            $this->PackageInformation->CurrentValue = HtmlDecode($this->PackageInformation->CurrentValue);
        }
        $this->PackageInformation->EditValue = $this->PackageInformation->CurrentValue;
        $this->PackageInformation->PlaceHolder = RemoveHtml($this->PackageInformation->caption());

        // PackageId
        $this->PackageId->EditAttrs["class"] = "form-control";
        $this->PackageId->EditCustomAttributes = "";
        $this->PackageId->EditValue = $this->PackageId->CurrentValue;
        $this->PackageId->PlaceHolder = RemoveHtml($this->PackageId->caption());

        // Weight
        $this->Weight->EditAttrs["class"] = "form-control";
        $this->Weight->EditCustomAttributes = "";
        $this->Weight->EditValue = $this->Weight->CurrentValue;
        $this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());
        if (strval($this->Weight->EditValue) != "" && is_numeric($this->Weight->EditValue)) {
            $this->Weight->EditValue = FormatNumber($this->Weight->EditValue, -2, -2, -2, -2);
        }

        // AllowFractions
        $this->AllowFractions->EditAttrs["class"] = "form-control";
        $this->AllowFractions->EditCustomAttributes = "";
        $this->AllowFractions->EditValue = $this->AllowFractions->CurrentValue;
        $this->AllowFractions->PlaceHolder = RemoveHtml($this->AllowFractions->caption());

        // MinimumStockLevel
        $this->MinimumStockLevel->EditAttrs["class"] = "form-control";
        $this->MinimumStockLevel->EditCustomAttributes = "";
        $this->MinimumStockLevel->EditValue = $this->MinimumStockLevel->CurrentValue;
        $this->MinimumStockLevel->PlaceHolder = RemoveHtml($this->MinimumStockLevel->caption());
        if (strval($this->MinimumStockLevel->EditValue) != "" && is_numeric($this->MinimumStockLevel->EditValue)) {
            $this->MinimumStockLevel->EditValue = FormatNumber($this->MinimumStockLevel->EditValue, -2, -2, -2, -2);
        }

        // MaximumStockLevel
        $this->MaximumStockLevel->EditAttrs["class"] = "form-control";
        $this->MaximumStockLevel->EditCustomAttributes = "";
        $this->MaximumStockLevel->EditValue = $this->MaximumStockLevel->CurrentValue;
        $this->MaximumStockLevel->PlaceHolder = RemoveHtml($this->MaximumStockLevel->caption());
        if (strval($this->MaximumStockLevel->EditValue) != "" && is_numeric($this->MaximumStockLevel->EditValue)) {
            $this->MaximumStockLevel->EditValue = FormatNumber($this->MaximumStockLevel->EditValue, -2, -2, -2, -2);
        }

        // ReorderLevel
        $this->ReorderLevel->EditAttrs["class"] = "form-control";
        $this->ReorderLevel->EditCustomAttributes = "";
        $this->ReorderLevel->EditValue = $this->ReorderLevel->CurrentValue;
        $this->ReorderLevel->PlaceHolder = RemoveHtml($this->ReorderLevel->caption());
        if (strval($this->ReorderLevel->EditValue) != "" && is_numeric($this->ReorderLevel->EditValue)) {
            $this->ReorderLevel->EditValue = FormatNumber($this->ReorderLevel->EditValue, -2, -2, -2, -2);
        }

        // MinMaxRatio
        $this->MinMaxRatio->EditAttrs["class"] = "form-control";
        $this->MinMaxRatio->EditCustomAttributes = "";
        $this->MinMaxRatio->EditValue = $this->MinMaxRatio->CurrentValue;
        $this->MinMaxRatio->PlaceHolder = RemoveHtml($this->MinMaxRatio->caption());
        if (strval($this->MinMaxRatio->EditValue) != "" && is_numeric($this->MinMaxRatio->EditValue)) {
            $this->MinMaxRatio->EditValue = FormatNumber($this->MinMaxRatio->EditValue, -2, -2, -2, -2);
        }

        // AutoMinMaxRatio
        $this->AutoMinMaxRatio->EditAttrs["class"] = "form-control";
        $this->AutoMinMaxRatio->EditCustomAttributes = "";
        $this->AutoMinMaxRatio->EditValue = $this->AutoMinMaxRatio->CurrentValue;
        $this->AutoMinMaxRatio->PlaceHolder = RemoveHtml($this->AutoMinMaxRatio->caption());
        if (strval($this->AutoMinMaxRatio->EditValue) != "" && is_numeric($this->AutoMinMaxRatio->EditValue)) {
            $this->AutoMinMaxRatio->EditValue = FormatNumber($this->AutoMinMaxRatio->EditValue, -2, -2, -2, -2);
        }

        // ScheduleCode
        $this->ScheduleCode->EditAttrs["class"] = "form-control";
        $this->ScheduleCode->EditCustomAttributes = "";
        $this->ScheduleCode->EditValue = $this->ScheduleCode->CurrentValue;
        $this->ScheduleCode->PlaceHolder = RemoveHtml($this->ScheduleCode->caption());

        // RopRatio
        $this->RopRatio->EditAttrs["class"] = "form-control";
        $this->RopRatio->EditCustomAttributes = "";
        $this->RopRatio->EditValue = $this->RopRatio->CurrentValue;
        $this->RopRatio->PlaceHolder = RemoveHtml($this->RopRatio->caption());
        if (strval($this->RopRatio->EditValue) != "" && is_numeric($this->RopRatio->EditValue)) {
            $this->RopRatio->EditValue = FormatNumber($this->RopRatio->EditValue, -2, -2, -2, -2);
        }

        // MRP
        $this->MRP->EditAttrs["class"] = "form-control";
        $this->MRP->EditCustomAttributes = "";
        $this->MRP->EditValue = $this->MRP->CurrentValue;
        $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
        if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
            $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
        }

        // PurchasePrice
        $this->PurchasePrice->EditAttrs["class"] = "form-control";
        $this->PurchasePrice->EditCustomAttributes = "";
        $this->PurchasePrice->EditValue = $this->PurchasePrice->CurrentValue;
        $this->PurchasePrice->PlaceHolder = RemoveHtml($this->PurchasePrice->caption());
        if (strval($this->PurchasePrice->EditValue) != "" && is_numeric($this->PurchasePrice->EditValue)) {
            $this->PurchasePrice->EditValue = FormatNumber($this->PurchasePrice->EditValue, -2, -2, -2, -2);
        }

        // PurchaseUnit
        $this->PurchaseUnit->EditAttrs["class"] = "form-control";
        $this->PurchaseUnit->EditCustomAttributes = "";
        $this->PurchaseUnit->EditValue = $this->PurchaseUnit->CurrentValue;
        $this->PurchaseUnit->PlaceHolder = RemoveHtml($this->PurchaseUnit->caption());
        if (strval($this->PurchaseUnit->EditValue) != "" && is_numeric($this->PurchaseUnit->EditValue)) {
            $this->PurchaseUnit->EditValue = FormatNumber($this->PurchaseUnit->EditValue, -2, -2, -2, -2);
        }

        // PurchaseTaxCode
        $this->PurchaseTaxCode->EditAttrs["class"] = "form-control";
        $this->PurchaseTaxCode->EditCustomAttributes = "";
        $this->PurchaseTaxCode->EditValue = $this->PurchaseTaxCode->CurrentValue;
        $this->PurchaseTaxCode->PlaceHolder = RemoveHtml($this->PurchaseTaxCode->caption());

        // AllowDirectInward
        $this->AllowDirectInward->EditAttrs["class"] = "form-control";
        $this->AllowDirectInward->EditCustomAttributes = "";
        $this->AllowDirectInward->EditValue = $this->AllowDirectInward->CurrentValue;
        $this->AllowDirectInward->PlaceHolder = RemoveHtml($this->AllowDirectInward->caption());

        // SalePrice
        $this->SalePrice->EditAttrs["class"] = "form-control";
        $this->SalePrice->EditCustomAttributes = "";
        $this->SalePrice->EditValue = $this->SalePrice->CurrentValue;
        $this->SalePrice->PlaceHolder = RemoveHtml($this->SalePrice->caption());
        if (strval($this->SalePrice->EditValue) != "" && is_numeric($this->SalePrice->EditValue)) {
            $this->SalePrice->EditValue = FormatNumber($this->SalePrice->EditValue, -2, -2, -2, -2);
        }

        // SaleUnit
        $this->SaleUnit->EditAttrs["class"] = "form-control";
        $this->SaleUnit->EditCustomAttributes = "";
        $this->SaleUnit->EditValue = $this->SaleUnit->CurrentValue;
        $this->SaleUnit->PlaceHolder = RemoveHtml($this->SaleUnit->caption());
        if (strval($this->SaleUnit->EditValue) != "" && is_numeric($this->SaleUnit->EditValue)) {
            $this->SaleUnit->EditValue = FormatNumber($this->SaleUnit->EditValue, -2, -2, -2, -2);
        }

        // SalesTaxCode
        $this->SalesTaxCode->EditAttrs["class"] = "form-control";
        $this->SalesTaxCode->EditCustomAttributes = "";
        $this->SalesTaxCode->EditValue = $this->SalesTaxCode->CurrentValue;
        $this->SalesTaxCode->PlaceHolder = RemoveHtml($this->SalesTaxCode->caption());

        // StockReceived
        $this->StockReceived->EditAttrs["class"] = "form-control";
        $this->StockReceived->EditCustomAttributes = "";
        $this->StockReceived->EditValue = $this->StockReceived->CurrentValue;
        $this->StockReceived->PlaceHolder = RemoveHtml($this->StockReceived->caption());
        if (strval($this->StockReceived->EditValue) != "" && is_numeric($this->StockReceived->EditValue)) {
            $this->StockReceived->EditValue = FormatNumber($this->StockReceived->EditValue, -2, -2, -2, -2);
        }

        // TotalStock
        $this->TotalStock->EditAttrs["class"] = "form-control";
        $this->TotalStock->EditCustomAttributes = "";
        $this->TotalStock->EditValue = $this->TotalStock->CurrentValue;
        $this->TotalStock->PlaceHolder = RemoveHtml($this->TotalStock->caption());
        if (strval($this->TotalStock->EditValue) != "" && is_numeric($this->TotalStock->EditValue)) {
            $this->TotalStock->EditValue = FormatNumber($this->TotalStock->EditValue, -2, -2, -2, -2);
        }

        // StockType
        $this->StockType->EditAttrs["class"] = "form-control";
        $this->StockType->EditCustomAttributes = "";
        $this->StockType->EditValue = $this->StockType->CurrentValue;
        $this->StockType->PlaceHolder = RemoveHtml($this->StockType->caption());

        // StockCheckDate
        $this->StockCheckDate->EditAttrs["class"] = "form-control";
        $this->StockCheckDate->EditCustomAttributes = "";
        $this->StockCheckDate->EditValue = FormatDateTime($this->StockCheckDate->CurrentValue, 8);
        $this->StockCheckDate->PlaceHolder = RemoveHtml($this->StockCheckDate->caption());

        // StockAdjustmentDate
        $this->StockAdjustmentDate->EditAttrs["class"] = "form-control";
        $this->StockAdjustmentDate->EditCustomAttributes = "";
        $this->StockAdjustmentDate->EditValue = FormatDateTime($this->StockAdjustmentDate->CurrentValue, 8);
        $this->StockAdjustmentDate->PlaceHolder = RemoveHtml($this->StockAdjustmentDate->caption());

        // Remarks
        $this->Remarks->EditAttrs["class"] = "form-control";
        $this->Remarks->EditCustomAttributes = "";
        if (!$this->Remarks->Raw) {
            $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
        }
        $this->Remarks->EditValue = $this->Remarks->CurrentValue;
        $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

        // CostCentre
        $this->CostCentre->EditAttrs["class"] = "form-control";
        $this->CostCentre->EditCustomAttributes = "";
        $this->CostCentre->EditValue = $this->CostCentre->CurrentValue;
        $this->CostCentre->PlaceHolder = RemoveHtml($this->CostCentre->caption());

        // ProductType
        $this->ProductType->EditAttrs["class"] = "form-control";
        $this->ProductType->EditCustomAttributes = "";
        $this->ProductType->EditValue = $this->ProductType->CurrentValue;
        $this->ProductType->PlaceHolder = RemoveHtml($this->ProductType->caption());

        // TaxAmount
        $this->TaxAmount->EditAttrs["class"] = "form-control";
        $this->TaxAmount->EditCustomAttributes = "";
        $this->TaxAmount->EditValue = $this->TaxAmount->CurrentValue;
        $this->TaxAmount->PlaceHolder = RemoveHtml($this->TaxAmount->caption());
        if (strval($this->TaxAmount->EditValue) != "" && is_numeric($this->TaxAmount->EditValue)) {
            $this->TaxAmount->EditValue = FormatNumber($this->TaxAmount->EditValue, -2, -2, -2, -2);
        }

        // TaxId
        $this->TaxId->EditAttrs["class"] = "form-control";
        $this->TaxId->EditCustomAttributes = "";
        $this->TaxId->EditValue = $this->TaxId->CurrentValue;
        $this->TaxId->PlaceHolder = RemoveHtml($this->TaxId->caption());

        // ResaleTaxApplicable
        $this->ResaleTaxApplicable->EditAttrs["class"] = "form-control";
        $this->ResaleTaxApplicable->EditCustomAttributes = "";
        $this->ResaleTaxApplicable->EditValue = $this->ResaleTaxApplicable->CurrentValue;
        $this->ResaleTaxApplicable->PlaceHolder = RemoveHtml($this->ResaleTaxApplicable->caption());

        // CstOtherTax
        $this->CstOtherTax->EditAttrs["class"] = "form-control";
        $this->CstOtherTax->EditCustomAttributes = "";
        if (!$this->CstOtherTax->Raw) {
            $this->CstOtherTax->CurrentValue = HtmlDecode($this->CstOtherTax->CurrentValue);
        }
        $this->CstOtherTax->EditValue = $this->CstOtherTax->CurrentValue;
        $this->CstOtherTax->PlaceHolder = RemoveHtml($this->CstOtherTax->caption());

        // TotalTax
        $this->TotalTax->EditAttrs["class"] = "form-control";
        $this->TotalTax->EditCustomAttributes = "";
        $this->TotalTax->EditValue = $this->TotalTax->CurrentValue;
        $this->TotalTax->PlaceHolder = RemoveHtml($this->TotalTax->caption());
        if (strval($this->TotalTax->EditValue) != "" && is_numeric($this->TotalTax->EditValue)) {
            $this->TotalTax->EditValue = FormatNumber($this->TotalTax->EditValue, -2, -2, -2, -2);
        }

        // ItemCost
        $this->ItemCost->EditAttrs["class"] = "form-control";
        $this->ItemCost->EditCustomAttributes = "";
        $this->ItemCost->EditValue = $this->ItemCost->CurrentValue;
        $this->ItemCost->PlaceHolder = RemoveHtml($this->ItemCost->caption());
        if (strval($this->ItemCost->EditValue) != "" && is_numeric($this->ItemCost->EditValue)) {
            $this->ItemCost->EditValue = FormatNumber($this->ItemCost->EditValue, -2, -2, -2, -2);
        }

        // ExpiryDate
        $this->ExpiryDate->EditAttrs["class"] = "form-control";
        $this->ExpiryDate->EditCustomAttributes = "";
        $this->ExpiryDate->EditValue = FormatDateTime($this->ExpiryDate->CurrentValue, 8);
        $this->ExpiryDate->PlaceHolder = RemoveHtml($this->ExpiryDate->caption());

        // BatchDescription
        $this->BatchDescription->EditAttrs["class"] = "form-control";
        $this->BatchDescription->EditCustomAttributes = "";
        if (!$this->BatchDescription->Raw) {
            $this->BatchDescription->CurrentValue = HtmlDecode($this->BatchDescription->CurrentValue);
        }
        $this->BatchDescription->EditValue = $this->BatchDescription->CurrentValue;
        $this->BatchDescription->PlaceHolder = RemoveHtml($this->BatchDescription->caption());

        // FreeScheme
        $this->FreeScheme->EditAttrs["class"] = "form-control";
        $this->FreeScheme->EditCustomAttributes = "";
        $this->FreeScheme->EditValue = $this->FreeScheme->CurrentValue;
        $this->FreeScheme->PlaceHolder = RemoveHtml($this->FreeScheme->caption());

        // CashDiscountEligibility
        $this->CashDiscountEligibility->EditAttrs["class"] = "form-control";
        $this->CashDiscountEligibility->EditCustomAttributes = "";
        $this->CashDiscountEligibility->EditValue = $this->CashDiscountEligibility->CurrentValue;
        $this->CashDiscountEligibility->PlaceHolder = RemoveHtml($this->CashDiscountEligibility->caption());

        // DiscountPerAllowInBill
        $this->DiscountPerAllowInBill->EditAttrs["class"] = "form-control";
        $this->DiscountPerAllowInBill->EditCustomAttributes = "";
        $this->DiscountPerAllowInBill->EditValue = $this->DiscountPerAllowInBill->CurrentValue;
        $this->DiscountPerAllowInBill->PlaceHolder = RemoveHtml($this->DiscountPerAllowInBill->caption());
        if (strval($this->DiscountPerAllowInBill->EditValue) != "" && is_numeric($this->DiscountPerAllowInBill->EditValue)) {
            $this->DiscountPerAllowInBill->EditValue = FormatNumber($this->DiscountPerAllowInBill->EditValue, -2, -2, -2, -2);
        }

        // Discount
        $this->Discount->EditAttrs["class"] = "form-control";
        $this->Discount->EditCustomAttributes = "";
        $this->Discount->EditValue = $this->Discount->CurrentValue;
        $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
        if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
            $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
        }

        // TotalAmount
        $this->TotalAmount->EditAttrs["class"] = "form-control";
        $this->TotalAmount->EditCustomAttributes = "";
        $this->TotalAmount->EditValue = $this->TotalAmount->CurrentValue;
        $this->TotalAmount->PlaceHolder = RemoveHtml($this->TotalAmount->caption());
        if (strval($this->TotalAmount->EditValue) != "" && is_numeric($this->TotalAmount->EditValue)) {
            $this->TotalAmount->EditValue = FormatNumber($this->TotalAmount->EditValue, -2, -2, -2, -2);
        }

        // StandardMargin
        $this->StandardMargin->EditAttrs["class"] = "form-control";
        $this->StandardMargin->EditCustomAttributes = "";
        $this->StandardMargin->EditValue = $this->StandardMargin->CurrentValue;
        $this->StandardMargin->PlaceHolder = RemoveHtml($this->StandardMargin->caption());
        if (strval($this->StandardMargin->EditValue) != "" && is_numeric($this->StandardMargin->EditValue)) {
            $this->StandardMargin->EditValue = FormatNumber($this->StandardMargin->EditValue, -2, -2, -2, -2);
        }

        // Margin
        $this->Margin->EditAttrs["class"] = "form-control";
        $this->Margin->EditCustomAttributes = "";
        $this->Margin->EditValue = $this->Margin->CurrentValue;
        $this->Margin->PlaceHolder = RemoveHtml($this->Margin->caption());
        if (strval($this->Margin->EditValue) != "" && is_numeric($this->Margin->EditValue)) {
            $this->Margin->EditValue = FormatNumber($this->Margin->EditValue, -2, -2, -2, -2);
        }

        // MarginId
        $this->MarginId->EditAttrs["class"] = "form-control";
        $this->MarginId->EditCustomAttributes = "";
        $this->MarginId->EditValue = $this->MarginId->CurrentValue;
        $this->MarginId->PlaceHolder = RemoveHtml($this->MarginId->caption());

        // ExpectedMargin
        $this->ExpectedMargin->EditAttrs["class"] = "form-control";
        $this->ExpectedMargin->EditCustomAttributes = "";
        $this->ExpectedMargin->EditValue = $this->ExpectedMargin->CurrentValue;
        $this->ExpectedMargin->PlaceHolder = RemoveHtml($this->ExpectedMargin->caption());
        if (strval($this->ExpectedMargin->EditValue) != "" && is_numeric($this->ExpectedMargin->EditValue)) {
            $this->ExpectedMargin->EditValue = FormatNumber($this->ExpectedMargin->EditValue, -2, -2, -2, -2);
        }

        // SurchargeBeforeTax
        $this->SurchargeBeforeTax->EditAttrs["class"] = "form-control";
        $this->SurchargeBeforeTax->EditCustomAttributes = "";
        $this->SurchargeBeforeTax->EditValue = $this->SurchargeBeforeTax->CurrentValue;
        $this->SurchargeBeforeTax->PlaceHolder = RemoveHtml($this->SurchargeBeforeTax->caption());
        if (strval($this->SurchargeBeforeTax->EditValue) != "" && is_numeric($this->SurchargeBeforeTax->EditValue)) {
            $this->SurchargeBeforeTax->EditValue = FormatNumber($this->SurchargeBeforeTax->EditValue, -2, -2, -2, -2);
        }

        // SurchargeAfterTax
        $this->SurchargeAfterTax->EditAttrs["class"] = "form-control";
        $this->SurchargeAfterTax->EditCustomAttributes = "";
        $this->SurchargeAfterTax->EditValue = $this->SurchargeAfterTax->CurrentValue;
        $this->SurchargeAfterTax->PlaceHolder = RemoveHtml($this->SurchargeAfterTax->caption());
        if (strval($this->SurchargeAfterTax->EditValue) != "" && is_numeric($this->SurchargeAfterTax->EditValue)) {
            $this->SurchargeAfterTax->EditValue = FormatNumber($this->SurchargeAfterTax->EditValue, -2, -2, -2, -2);
        }

        // TempOrderNo
        $this->TempOrderNo->EditAttrs["class"] = "form-control";
        $this->TempOrderNo->EditCustomAttributes = "";
        $this->TempOrderNo->EditValue = $this->TempOrderNo->CurrentValue;
        $this->TempOrderNo->PlaceHolder = RemoveHtml($this->TempOrderNo->caption());

        // TempOrderDate
        $this->TempOrderDate->EditAttrs["class"] = "form-control";
        $this->TempOrderDate->EditCustomAttributes = "";
        $this->TempOrderDate->EditValue = FormatDateTime($this->TempOrderDate->CurrentValue, 8);
        $this->TempOrderDate->PlaceHolder = RemoveHtml($this->TempOrderDate->caption());

        // OrderUnit
        $this->OrderUnit->EditAttrs["class"] = "form-control";
        $this->OrderUnit->EditCustomAttributes = "";
        $this->OrderUnit->EditValue = $this->OrderUnit->CurrentValue;
        $this->OrderUnit->PlaceHolder = RemoveHtml($this->OrderUnit->caption());
        if (strval($this->OrderUnit->EditValue) != "" && is_numeric($this->OrderUnit->EditValue)) {
            $this->OrderUnit->EditValue = FormatNumber($this->OrderUnit->EditValue, -2, -2, -2, -2);
        }

        // OrderQuantity
        $this->OrderQuantity->EditAttrs["class"] = "form-control";
        $this->OrderQuantity->EditCustomAttributes = "";
        $this->OrderQuantity->EditValue = $this->OrderQuantity->CurrentValue;
        $this->OrderQuantity->PlaceHolder = RemoveHtml($this->OrderQuantity->caption());
        if (strval($this->OrderQuantity->EditValue) != "" && is_numeric($this->OrderQuantity->EditValue)) {
            $this->OrderQuantity->EditValue = FormatNumber($this->OrderQuantity->EditValue, -2, -2, -2, -2);
        }

        // MarkForOrder
        $this->MarkForOrder->EditAttrs["class"] = "form-control";
        $this->MarkForOrder->EditCustomAttributes = "";
        $this->MarkForOrder->EditValue = $this->MarkForOrder->CurrentValue;
        $this->MarkForOrder->PlaceHolder = RemoveHtml($this->MarkForOrder->caption());

        // OrderAllId
        $this->OrderAllId->EditAttrs["class"] = "form-control";
        $this->OrderAllId->EditCustomAttributes = "";
        $this->OrderAllId->EditValue = $this->OrderAllId->CurrentValue;
        $this->OrderAllId->PlaceHolder = RemoveHtml($this->OrderAllId->caption());

        // CalculateOrderQty
        $this->CalculateOrderQty->EditAttrs["class"] = "form-control";
        $this->CalculateOrderQty->EditCustomAttributes = "";
        $this->CalculateOrderQty->EditValue = $this->CalculateOrderQty->CurrentValue;
        $this->CalculateOrderQty->PlaceHolder = RemoveHtml($this->CalculateOrderQty->caption());
        if (strval($this->CalculateOrderQty->EditValue) != "" && is_numeric($this->CalculateOrderQty->EditValue)) {
            $this->CalculateOrderQty->EditValue = FormatNumber($this->CalculateOrderQty->EditValue, -2, -2, -2, -2);
        }

        // SubLocation
        $this->SubLocation->EditAttrs["class"] = "form-control";
        $this->SubLocation->EditCustomAttributes = "";
        if (!$this->SubLocation->Raw) {
            $this->SubLocation->CurrentValue = HtmlDecode($this->SubLocation->CurrentValue);
        }
        $this->SubLocation->EditValue = $this->SubLocation->CurrentValue;
        $this->SubLocation->PlaceHolder = RemoveHtml($this->SubLocation->caption());

        // CategoryCode
        $this->CategoryCode->EditAttrs["class"] = "form-control";
        $this->CategoryCode->EditCustomAttributes = "";
        if (!$this->CategoryCode->Raw) {
            $this->CategoryCode->CurrentValue = HtmlDecode($this->CategoryCode->CurrentValue);
        }
        $this->CategoryCode->EditValue = $this->CategoryCode->CurrentValue;
        $this->CategoryCode->PlaceHolder = RemoveHtml($this->CategoryCode->caption());

        // SubCategory
        $this->SubCategory->EditAttrs["class"] = "form-control";
        $this->SubCategory->EditCustomAttributes = "";
        if (!$this->SubCategory->Raw) {
            $this->SubCategory->CurrentValue = HtmlDecode($this->SubCategory->CurrentValue);
        }
        $this->SubCategory->EditValue = $this->SubCategory->CurrentValue;
        $this->SubCategory->PlaceHolder = RemoveHtml($this->SubCategory->caption());

        // FlexCategoryCode
        $this->FlexCategoryCode->EditAttrs["class"] = "form-control";
        $this->FlexCategoryCode->EditCustomAttributes = "";
        $this->FlexCategoryCode->EditValue = $this->FlexCategoryCode->CurrentValue;
        $this->FlexCategoryCode->PlaceHolder = RemoveHtml($this->FlexCategoryCode->caption());

        // ABCSaleQty
        $this->ABCSaleQty->EditAttrs["class"] = "form-control";
        $this->ABCSaleQty->EditCustomAttributes = "";
        $this->ABCSaleQty->EditValue = $this->ABCSaleQty->CurrentValue;
        $this->ABCSaleQty->PlaceHolder = RemoveHtml($this->ABCSaleQty->caption());
        if (strval($this->ABCSaleQty->EditValue) != "" && is_numeric($this->ABCSaleQty->EditValue)) {
            $this->ABCSaleQty->EditValue = FormatNumber($this->ABCSaleQty->EditValue, -2, -2, -2, -2);
        }

        // ABCSaleValue
        $this->ABCSaleValue->EditAttrs["class"] = "form-control";
        $this->ABCSaleValue->EditCustomAttributes = "";
        $this->ABCSaleValue->EditValue = $this->ABCSaleValue->CurrentValue;
        $this->ABCSaleValue->PlaceHolder = RemoveHtml($this->ABCSaleValue->caption());
        if (strval($this->ABCSaleValue->EditValue) != "" && is_numeric($this->ABCSaleValue->EditValue)) {
            $this->ABCSaleValue->EditValue = FormatNumber($this->ABCSaleValue->EditValue, -2, -2, -2, -2);
        }

        // ConvertionFactor
        $this->ConvertionFactor->EditAttrs["class"] = "form-control";
        $this->ConvertionFactor->EditCustomAttributes = "";
        $this->ConvertionFactor->EditValue = $this->ConvertionFactor->CurrentValue;
        $this->ConvertionFactor->PlaceHolder = RemoveHtml($this->ConvertionFactor->caption());

        // ConvertionUnitDesc
        $this->ConvertionUnitDesc->EditAttrs["class"] = "form-control";
        $this->ConvertionUnitDesc->EditCustomAttributes = "";
        if (!$this->ConvertionUnitDesc->Raw) {
            $this->ConvertionUnitDesc->CurrentValue = HtmlDecode($this->ConvertionUnitDesc->CurrentValue);
        }
        $this->ConvertionUnitDesc->EditValue = $this->ConvertionUnitDesc->CurrentValue;
        $this->ConvertionUnitDesc->PlaceHolder = RemoveHtml($this->ConvertionUnitDesc->caption());

        // TransactionId
        $this->TransactionId->EditAttrs["class"] = "form-control";
        $this->TransactionId->EditCustomAttributes = "";
        $this->TransactionId->EditValue = $this->TransactionId->CurrentValue;
        $this->TransactionId->PlaceHolder = RemoveHtml($this->TransactionId->caption());

        // SoldProductId
        $this->SoldProductId->EditAttrs["class"] = "form-control";
        $this->SoldProductId->EditCustomAttributes = "";
        $this->SoldProductId->EditValue = $this->SoldProductId->CurrentValue;
        $this->SoldProductId->PlaceHolder = RemoveHtml($this->SoldProductId->caption());

        // WantedBookId
        $this->WantedBookId->EditAttrs["class"] = "form-control";
        $this->WantedBookId->EditCustomAttributes = "";
        $this->WantedBookId->EditValue = $this->WantedBookId->CurrentValue;
        $this->WantedBookId->PlaceHolder = RemoveHtml($this->WantedBookId->caption());

        // AllId
        $this->AllId->EditAttrs["class"] = "form-control";
        $this->AllId->EditCustomAttributes = "";
        $this->AllId->EditValue = $this->AllId->CurrentValue;
        $this->AllId->PlaceHolder = RemoveHtml($this->AllId->caption());

        // BatchAndExpiryCompulsory
        $this->BatchAndExpiryCompulsory->EditAttrs["class"] = "form-control";
        $this->BatchAndExpiryCompulsory->EditCustomAttributes = "";
        $this->BatchAndExpiryCompulsory->EditValue = $this->BatchAndExpiryCompulsory->CurrentValue;
        $this->BatchAndExpiryCompulsory->PlaceHolder = RemoveHtml($this->BatchAndExpiryCompulsory->caption());

        // BatchStockForWantedBook
        $this->BatchStockForWantedBook->EditAttrs["class"] = "form-control";
        $this->BatchStockForWantedBook->EditCustomAttributes = "";
        $this->BatchStockForWantedBook->EditValue = $this->BatchStockForWantedBook->CurrentValue;
        $this->BatchStockForWantedBook->PlaceHolder = RemoveHtml($this->BatchStockForWantedBook->caption());

        // UnitBasedBilling
        $this->UnitBasedBilling->EditAttrs["class"] = "form-control";
        $this->UnitBasedBilling->EditCustomAttributes = "";
        $this->UnitBasedBilling->EditValue = $this->UnitBasedBilling->CurrentValue;
        $this->UnitBasedBilling->PlaceHolder = RemoveHtml($this->UnitBasedBilling->caption());

        // DoNotCheckStock
        $this->DoNotCheckStock->EditAttrs["class"] = "form-control";
        $this->DoNotCheckStock->EditCustomAttributes = "";
        $this->DoNotCheckStock->EditValue = $this->DoNotCheckStock->CurrentValue;
        $this->DoNotCheckStock->PlaceHolder = RemoveHtml($this->DoNotCheckStock->caption());

        // AcceptRate
        $this->AcceptRate->EditAttrs["class"] = "form-control";
        $this->AcceptRate->EditCustomAttributes = "";
        $this->AcceptRate->EditValue = $this->AcceptRate->CurrentValue;
        $this->AcceptRate->PlaceHolder = RemoveHtml($this->AcceptRate->caption());

        // PriceLevel
        $this->PriceLevel->EditAttrs["class"] = "form-control";
        $this->PriceLevel->EditCustomAttributes = "";
        $this->PriceLevel->EditValue = $this->PriceLevel->CurrentValue;
        $this->PriceLevel->PlaceHolder = RemoveHtml($this->PriceLevel->caption());

        // LastQuotePrice
        $this->LastQuotePrice->EditAttrs["class"] = "form-control";
        $this->LastQuotePrice->EditCustomAttributes = "";
        $this->LastQuotePrice->EditValue = $this->LastQuotePrice->CurrentValue;
        $this->LastQuotePrice->PlaceHolder = RemoveHtml($this->LastQuotePrice->caption());
        if (strval($this->LastQuotePrice->EditValue) != "" && is_numeric($this->LastQuotePrice->EditValue)) {
            $this->LastQuotePrice->EditValue = FormatNumber($this->LastQuotePrice->EditValue, -2, -2, -2, -2);
        }

        // PriceChange
        $this->PriceChange->EditAttrs["class"] = "form-control";
        $this->PriceChange->EditCustomAttributes = "";
        $this->PriceChange->EditValue = $this->PriceChange->CurrentValue;
        $this->PriceChange->PlaceHolder = RemoveHtml($this->PriceChange->caption());
        if (strval($this->PriceChange->EditValue) != "" && is_numeric($this->PriceChange->EditValue)) {
            $this->PriceChange->EditValue = FormatNumber($this->PriceChange->EditValue, -2, -2, -2, -2);
        }

        // CommodityCode
        $this->CommodityCode->EditAttrs["class"] = "form-control";
        $this->CommodityCode->EditCustomAttributes = "";
        if (!$this->CommodityCode->Raw) {
            $this->CommodityCode->CurrentValue = HtmlDecode($this->CommodityCode->CurrentValue);
        }
        $this->CommodityCode->EditValue = $this->CommodityCode->CurrentValue;
        $this->CommodityCode->PlaceHolder = RemoveHtml($this->CommodityCode->caption());

        // InstitutePrice
        $this->InstitutePrice->EditAttrs["class"] = "form-control";
        $this->InstitutePrice->EditCustomAttributes = "";
        $this->InstitutePrice->EditValue = $this->InstitutePrice->CurrentValue;
        $this->InstitutePrice->PlaceHolder = RemoveHtml($this->InstitutePrice->caption());
        if (strval($this->InstitutePrice->EditValue) != "" && is_numeric($this->InstitutePrice->EditValue)) {
            $this->InstitutePrice->EditValue = FormatNumber($this->InstitutePrice->EditValue, -2, -2, -2, -2);
        }

        // CtrlOrDCtrlProduct
        $this->CtrlOrDCtrlProduct->EditAttrs["class"] = "form-control";
        $this->CtrlOrDCtrlProduct->EditCustomAttributes = "";
        $this->CtrlOrDCtrlProduct->EditValue = $this->CtrlOrDCtrlProduct->CurrentValue;
        $this->CtrlOrDCtrlProduct->PlaceHolder = RemoveHtml($this->CtrlOrDCtrlProduct->caption());

        // ImportedDate
        $this->ImportedDate->EditAttrs["class"] = "form-control";
        $this->ImportedDate->EditCustomAttributes = "";
        $this->ImportedDate->EditValue = FormatDateTime($this->ImportedDate->CurrentValue, 8);
        $this->ImportedDate->PlaceHolder = RemoveHtml($this->ImportedDate->caption());

        // IsImported
        $this->IsImported->EditAttrs["class"] = "form-control";
        $this->IsImported->EditCustomAttributes = "";
        $this->IsImported->EditValue = $this->IsImported->CurrentValue;
        $this->IsImported->PlaceHolder = RemoveHtml($this->IsImported->caption());

        // FileName
        $this->FileName->EditAttrs["class"] = "form-control";
        $this->FileName->EditCustomAttributes = "";
        if (!$this->FileName->Raw) {
            $this->FileName->CurrentValue = HtmlDecode($this->FileName->CurrentValue);
        }
        $this->FileName->EditValue = $this->FileName->CurrentValue;
        $this->FileName->PlaceHolder = RemoveHtml($this->FileName->caption());

        // LPName
        $this->LPName->EditAttrs["class"] = "form-control";
        $this->LPName->EditCustomAttributes = "";
        $this->LPName->EditValue = $this->LPName->CurrentValue;
        $this->LPName->PlaceHolder = RemoveHtml($this->LPName->caption());

        // GodownNumber
        $this->GodownNumber->EditAttrs["class"] = "form-control";
        $this->GodownNumber->EditCustomAttributes = "";
        $this->GodownNumber->EditValue = $this->GodownNumber->CurrentValue;
        $this->GodownNumber->PlaceHolder = RemoveHtml($this->GodownNumber->caption());

        // CreationDate
        $this->CreationDate->EditAttrs["class"] = "form-control";
        $this->CreationDate->EditCustomAttributes = "";
        $this->CreationDate->EditValue = FormatDateTime($this->CreationDate->CurrentValue, 8);
        $this->CreationDate->PlaceHolder = RemoveHtml($this->CreationDate->caption());

        // CreatedbyUser
        $this->CreatedbyUser->EditAttrs["class"] = "form-control";
        $this->CreatedbyUser->EditCustomAttributes = "";
        if (!$this->CreatedbyUser->Raw) {
            $this->CreatedbyUser->CurrentValue = HtmlDecode($this->CreatedbyUser->CurrentValue);
        }
        $this->CreatedbyUser->EditValue = $this->CreatedbyUser->CurrentValue;
        $this->CreatedbyUser->PlaceHolder = RemoveHtml($this->CreatedbyUser->caption());

        // ModifiedDate
        $this->ModifiedDate->EditAttrs["class"] = "form-control";
        $this->ModifiedDate->EditCustomAttributes = "";
        $this->ModifiedDate->EditValue = FormatDateTime($this->ModifiedDate->CurrentValue, 8);
        $this->ModifiedDate->PlaceHolder = RemoveHtml($this->ModifiedDate->caption());

        // ModifiedbyUser
        $this->ModifiedbyUser->EditAttrs["class"] = "form-control";
        $this->ModifiedbyUser->EditCustomAttributes = "";
        if (!$this->ModifiedbyUser->Raw) {
            $this->ModifiedbyUser->CurrentValue = HtmlDecode($this->ModifiedbyUser->CurrentValue);
        }
        $this->ModifiedbyUser->EditValue = $this->ModifiedbyUser->CurrentValue;
        $this->ModifiedbyUser->PlaceHolder = RemoveHtml($this->ModifiedbyUser->caption());

        // isActive
        $this->isActive->EditAttrs["class"] = "form-control";
        $this->isActive->EditCustomAttributes = "";
        $this->isActive->EditValue = $this->isActive->CurrentValue;
        $this->isActive->PlaceHolder = RemoveHtml($this->isActive->caption());

        // AllowExpiryClaim
        $this->AllowExpiryClaim->EditAttrs["class"] = "form-control";
        $this->AllowExpiryClaim->EditCustomAttributes = "";
        $this->AllowExpiryClaim->EditValue = $this->AllowExpiryClaim->CurrentValue;
        $this->AllowExpiryClaim->PlaceHolder = RemoveHtml($this->AllowExpiryClaim->caption());

        // BrandCode
        $this->BrandCode->EditAttrs["class"] = "form-control";
        $this->BrandCode->EditCustomAttributes = "";
        $this->BrandCode->EditValue = $this->BrandCode->CurrentValue;
        $this->BrandCode->PlaceHolder = RemoveHtml($this->BrandCode->caption());

        // FreeSchemeBasedon
        $this->FreeSchemeBasedon->EditAttrs["class"] = "form-control";
        $this->FreeSchemeBasedon->EditCustomAttributes = "";
        $this->FreeSchemeBasedon->EditValue = $this->FreeSchemeBasedon->CurrentValue;
        $this->FreeSchemeBasedon->PlaceHolder = RemoveHtml($this->FreeSchemeBasedon->caption());

        // DoNotCheckCostInBill
        $this->DoNotCheckCostInBill->EditAttrs["class"] = "form-control";
        $this->DoNotCheckCostInBill->EditCustomAttributes = "";
        $this->DoNotCheckCostInBill->EditValue = $this->DoNotCheckCostInBill->CurrentValue;
        $this->DoNotCheckCostInBill->PlaceHolder = RemoveHtml($this->DoNotCheckCostInBill->caption());

        // ProductGroupCode
        $this->ProductGroupCode->EditAttrs["class"] = "form-control";
        $this->ProductGroupCode->EditCustomAttributes = "";
        $this->ProductGroupCode->EditValue = $this->ProductGroupCode->CurrentValue;
        $this->ProductGroupCode->PlaceHolder = RemoveHtml($this->ProductGroupCode->caption());

        // ProductStrengthCode
        $this->ProductStrengthCode->EditAttrs["class"] = "form-control";
        $this->ProductStrengthCode->EditCustomAttributes = "";
        $this->ProductStrengthCode->EditValue = $this->ProductStrengthCode->CurrentValue;
        $this->ProductStrengthCode->PlaceHolder = RemoveHtml($this->ProductStrengthCode->caption());

        // PackingCode
        $this->PackingCode->EditAttrs["class"] = "form-control";
        $this->PackingCode->EditCustomAttributes = "";
        $this->PackingCode->EditValue = $this->PackingCode->CurrentValue;
        $this->PackingCode->PlaceHolder = RemoveHtml($this->PackingCode->caption());

        // ComputedMinStock
        $this->ComputedMinStock->EditAttrs["class"] = "form-control";
        $this->ComputedMinStock->EditCustomAttributes = "";
        $this->ComputedMinStock->EditValue = $this->ComputedMinStock->CurrentValue;
        $this->ComputedMinStock->PlaceHolder = RemoveHtml($this->ComputedMinStock->caption());
        if (strval($this->ComputedMinStock->EditValue) != "" && is_numeric($this->ComputedMinStock->EditValue)) {
            $this->ComputedMinStock->EditValue = FormatNumber($this->ComputedMinStock->EditValue, -2, -2, -2, -2);
        }

        // ComputedMaxStock
        $this->ComputedMaxStock->EditAttrs["class"] = "form-control";
        $this->ComputedMaxStock->EditCustomAttributes = "";
        $this->ComputedMaxStock->EditValue = $this->ComputedMaxStock->CurrentValue;
        $this->ComputedMaxStock->PlaceHolder = RemoveHtml($this->ComputedMaxStock->caption());
        if (strval($this->ComputedMaxStock->EditValue) != "" && is_numeric($this->ComputedMaxStock->EditValue)) {
            $this->ComputedMaxStock->EditValue = FormatNumber($this->ComputedMaxStock->EditValue, -2, -2, -2, -2);
        }

        // ProductRemark
        $this->ProductRemark->EditAttrs["class"] = "form-control";
        $this->ProductRemark->EditCustomAttributes = "";
        $this->ProductRemark->EditValue = $this->ProductRemark->CurrentValue;
        $this->ProductRemark->PlaceHolder = RemoveHtml($this->ProductRemark->caption());

        // ProductDrugCode
        $this->ProductDrugCode->EditAttrs["class"] = "form-control";
        $this->ProductDrugCode->EditCustomAttributes = "";
        $this->ProductDrugCode->EditValue = $this->ProductDrugCode->CurrentValue;
        $this->ProductDrugCode->PlaceHolder = RemoveHtml($this->ProductDrugCode->caption());

        // IsMatrixProduct
        $this->IsMatrixProduct->EditAttrs["class"] = "form-control";
        $this->IsMatrixProduct->EditCustomAttributes = "";
        $this->IsMatrixProduct->EditValue = $this->IsMatrixProduct->CurrentValue;
        $this->IsMatrixProduct->PlaceHolder = RemoveHtml($this->IsMatrixProduct->caption());

        // AttributeCount1
        $this->AttributeCount1->EditAttrs["class"] = "form-control";
        $this->AttributeCount1->EditCustomAttributes = "";
        $this->AttributeCount1->EditValue = $this->AttributeCount1->CurrentValue;
        $this->AttributeCount1->PlaceHolder = RemoveHtml($this->AttributeCount1->caption());

        // AttributeCount2
        $this->AttributeCount2->EditAttrs["class"] = "form-control";
        $this->AttributeCount2->EditCustomAttributes = "";
        $this->AttributeCount2->EditValue = $this->AttributeCount2->CurrentValue;
        $this->AttributeCount2->PlaceHolder = RemoveHtml($this->AttributeCount2->caption());

        // AttributeCount3
        $this->AttributeCount3->EditAttrs["class"] = "form-control";
        $this->AttributeCount3->EditCustomAttributes = "";
        $this->AttributeCount3->EditValue = $this->AttributeCount3->CurrentValue;
        $this->AttributeCount3->PlaceHolder = RemoveHtml($this->AttributeCount3->caption());

        // AttributeCount4
        $this->AttributeCount4->EditAttrs["class"] = "form-control";
        $this->AttributeCount4->EditCustomAttributes = "";
        $this->AttributeCount4->EditValue = $this->AttributeCount4->CurrentValue;
        $this->AttributeCount4->PlaceHolder = RemoveHtml($this->AttributeCount4->caption());

        // AttributeCount5
        $this->AttributeCount5->EditAttrs["class"] = "form-control";
        $this->AttributeCount5->EditCustomAttributes = "";
        $this->AttributeCount5->EditValue = $this->AttributeCount5->CurrentValue;
        $this->AttributeCount5->PlaceHolder = RemoveHtml($this->AttributeCount5->caption());

        // DefaultDiscountPercentage
        $this->DefaultDiscountPercentage->EditAttrs["class"] = "form-control";
        $this->DefaultDiscountPercentage->EditCustomAttributes = "";
        $this->DefaultDiscountPercentage->EditValue = $this->DefaultDiscountPercentage->CurrentValue;
        $this->DefaultDiscountPercentage->PlaceHolder = RemoveHtml($this->DefaultDiscountPercentage->caption());
        if (strval($this->DefaultDiscountPercentage->EditValue) != "" && is_numeric($this->DefaultDiscountPercentage->EditValue)) {
            $this->DefaultDiscountPercentage->EditValue = FormatNumber($this->DefaultDiscountPercentage->EditValue, -2, -2, -2, -2);
        }

        // DonotPrintBarcode
        $this->DonotPrintBarcode->EditAttrs["class"] = "form-control";
        $this->DonotPrintBarcode->EditCustomAttributes = "";
        $this->DonotPrintBarcode->EditValue = $this->DonotPrintBarcode->CurrentValue;
        $this->DonotPrintBarcode->PlaceHolder = RemoveHtml($this->DonotPrintBarcode->caption());

        // ProductLevelDiscount
        $this->ProductLevelDiscount->EditAttrs["class"] = "form-control";
        $this->ProductLevelDiscount->EditCustomAttributes = "";
        $this->ProductLevelDiscount->EditValue = $this->ProductLevelDiscount->CurrentValue;
        $this->ProductLevelDiscount->PlaceHolder = RemoveHtml($this->ProductLevelDiscount->caption());

        // Markup
        $this->Markup->EditAttrs["class"] = "form-control";
        $this->Markup->EditCustomAttributes = "";
        $this->Markup->EditValue = $this->Markup->CurrentValue;
        $this->Markup->PlaceHolder = RemoveHtml($this->Markup->caption());
        if (strval($this->Markup->EditValue) != "" && is_numeric($this->Markup->EditValue)) {
            $this->Markup->EditValue = FormatNumber($this->Markup->EditValue, -2, -2, -2, -2);
        }

        // MarkDown
        $this->MarkDown->EditAttrs["class"] = "form-control";
        $this->MarkDown->EditCustomAttributes = "";
        $this->MarkDown->EditValue = $this->MarkDown->CurrentValue;
        $this->MarkDown->PlaceHolder = RemoveHtml($this->MarkDown->caption());
        if (strval($this->MarkDown->EditValue) != "" && is_numeric($this->MarkDown->EditValue)) {
            $this->MarkDown->EditValue = FormatNumber($this->MarkDown->EditValue, -2, -2, -2, -2);
        }

        // ReworkSalePrice
        $this->ReworkSalePrice->EditAttrs["class"] = "form-control";
        $this->ReworkSalePrice->EditCustomAttributes = "";
        $this->ReworkSalePrice->EditValue = $this->ReworkSalePrice->CurrentValue;
        $this->ReworkSalePrice->PlaceHolder = RemoveHtml($this->ReworkSalePrice->caption());

        // MultipleInput
        $this->MultipleInput->EditAttrs["class"] = "form-control";
        $this->MultipleInput->EditCustomAttributes = "";
        $this->MultipleInput->EditValue = $this->MultipleInput->CurrentValue;
        $this->MultipleInput->PlaceHolder = RemoveHtml($this->MultipleInput->caption());

        // LpPackageInformation
        $this->LpPackageInformation->EditAttrs["class"] = "form-control";
        $this->LpPackageInformation->EditCustomAttributes = "";
        if (!$this->LpPackageInformation->Raw) {
            $this->LpPackageInformation->CurrentValue = HtmlDecode($this->LpPackageInformation->CurrentValue);
        }
        $this->LpPackageInformation->EditValue = $this->LpPackageInformation->CurrentValue;
        $this->LpPackageInformation->PlaceHolder = RemoveHtml($this->LpPackageInformation->caption());

        // AllowNegativeStock
        $this->AllowNegativeStock->EditAttrs["class"] = "form-control";
        $this->AllowNegativeStock->EditCustomAttributes = "";
        $this->AllowNegativeStock->EditValue = $this->AllowNegativeStock->CurrentValue;
        $this->AllowNegativeStock->PlaceHolder = RemoveHtml($this->AllowNegativeStock->caption());

        // OrderDate
        $this->OrderDate->EditAttrs["class"] = "form-control";
        $this->OrderDate->EditCustomAttributes = "";
        $this->OrderDate->EditValue = FormatDateTime($this->OrderDate->CurrentValue, 8);
        $this->OrderDate->PlaceHolder = RemoveHtml($this->OrderDate->caption());

        // OrderTime
        $this->OrderTime->EditAttrs["class"] = "form-control";
        $this->OrderTime->EditCustomAttributes = "";
        $this->OrderTime->EditValue = FormatDateTime($this->OrderTime->CurrentValue, 8);
        $this->OrderTime->PlaceHolder = RemoveHtml($this->OrderTime->caption());

        // RateGroupCode
        $this->RateGroupCode->EditAttrs["class"] = "form-control";
        $this->RateGroupCode->EditCustomAttributes = "";
        $this->RateGroupCode->EditValue = $this->RateGroupCode->CurrentValue;
        $this->RateGroupCode->PlaceHolder = RemoveHtml($this->RateGroupCode->caption());

        // ConversionCaseLot
        $this->ConversionCaseLot->EditAttrs["class"] = "form-control";
        $this->ConversionCaseLot->EditCustomAttributes = "";
        $this->ConversionCaseLot->EditValue = $this->ConversionCaseLot->CurrentValue;
        $this->ConversionCaseLot->PlaceHolder = RemoveHtml($this->ConversionCaseLot->caption());

        // ShippingLot
        $this->ShippingLot->EditAttrs["class"] = "form-control";
        $this->ShippingLot->EditCustomAttributes = "";
        if (!$this->ShippingLot->Raw) {
            $this->ShippingLot->CurrentValue = HtmlDecode($this->ShippingLot->CurrentValue);
        }
        $this->ShippingLot->EditValue = $this->ShippingLot->CurrentValue;
        $this->ShippingLot->PlaceHolder = RemoveHtml($this->ShippingLot->caption());

        // AllowExpiryReplacement
        $this->AllowExpiryReplacement->EditAttrs["class"] = "form-control";
        $this->AllowExpiryReplacement->EditCustomAttributes = "";
        $this->AllowExpiryReplacement->EditValue = $this->AllowExpiryReplacement->CurrentValue;
        $this->AllowExpiryReplacement->PlaceHolder = RemoveHtml($this->AllowExpiryReplacement->caption());

        // NoOfMonthExpiryAllowed
        $this->NoOfMonthExpiryAllowed->EditAttrs["class"] = "form-control";
        $this->NoOfMonthExpiryAllowed->EditCustomAttributes = "";
        $this->NoOfMonthExpiryAllowed->EditValue = $this->NoOfMonthExpiryAllowed->CurrentValue;
        $this->NoOfMonthExpiryAllowed->PlaceHolder = RemoveHtml($this->NoOfMonthExpiryAllowed->caption());

        // ProductDiscountEligibility
        $this->ProductDiscountEligibility->EditAttrs["class"] = "form-control";
        $this->ProductDiscountEligibility->EditCustomAttributes = "";
        $this->ProductDiscountEligibility->EditValue = $this->ProductDiscountEligibility->CurrentValue;
        $this->ProductDiscountEligibility->PlaceHolder = RemoveHtml($this->ProductDiscountEligibility->caption());

        // ScheduleTypeCode
        $this->ScheduleTypeCode->EditAttrs["class"] = "form-control";
        $this->ScheduleTypeCode->EditCustomAttributes = "";
        $this->ScheduleTypeCode->EditValue = $this->ScheduleTypeCode->CurrentValue;
        $this->ScheduleTypeCode->PlaceHolder = RemoveHtml($this->ScheduleTypeCode->caption());

        // AIOCDProductCode
        $this->AIOCDProductCode->EditAttrs["class"] = "form-control";
        $this->AIOCDProductCode->EditCustomAttributes = "";
        if (!$this->AIOCDProductCode->Raw) {
            $this->AIOCDProductCode->CurrentValue = HtmlDecode($this->AIOCDProductCode->CurrentValue);
        }
        $this->AIOCDProductCode->EditValue = $this->AIOCDProductCode->CurrentValue;
        $this->AIOCDProductCode->PlaceHolder = RemoveHtml($this->AIOCDProductCode->caption());

        // FreeQuantity
        $this->FreeQuantity->EditAttrs["class"] = "form-control";
        $this->FreeQuantity->EditCustomAttributes = "";
        $this->FreeQuantity->EditValue = $this->FreeQuantity->CurrentValue;
        $this->FreeQuantity->PlaceHolder = RemoveHtml($this->FreeQuantity->caption());
        if (strval($this->FreeQuantity->EditValue) != "" && is_numeric($this->FreeQuantity->EditValue)) {
            $this->FreeQuantity->EditValue = FormatNumber($this->FreeQuantity->EditValue, -2, -2, -2, -2);
        }

        // DiscountType
        $this->DiscountType->EditAttrs["class"] = "form-control";
        $this->DiscountType->EditCustomAttributes = "";
        $this->DiscountType->EditValue = $this->DiscountType->CurrentValue;
        $this->DiscountType->PlaceHolder = RemoveHtml($this->DiscountType->caption());

        // DiscountValue
        $this->DiscountValue->EditAttrs["class"] = "form-control";
        $this->DiscountValue->EditCustomAttributes = "";
        $this->DiscountValue->EditValue = $this->DiscountValue->CurrentValue;
        $this->DiscountValue->PlaceHolder = RemoveHtml($this->DiscountValue->caption());
        if (strval($this->DiscountValue->EditValue) != "" && is_numeric($this->DiscountValue->EditValue)) {
            $this->DiscountValue->EditValue = FormatNumber($this->DiscountValue->EditValue, -2, -2, -2, -2);
        }

        // HasProductOrderAttribute
        $this->HasProductOrderAttribute->EditAttrs["class"] = "form-control";
        $this->HasProductOrderAttribute->EditCustomAttributes = "";
        $this->HasProductOrderAttribute->EditValue = $this->HasProductOrderAttribute->CurrentValue;
        $this->HasProductOrderAttribute->PlaceHolder = RemoveHtml($this->HasProductOrderAttribute->caption());

        // FirstPODate
        $this->FirstPODate->EditAttrs["class"] = "form-control";
        $this->FirstPODate->EditCustomAttributes = "";
        $this->FirstPODate->EditValue = FormatDateTime($this->FirstPODate->CurrentValue, 8);
        $this->FirstPODate->PlaceHolder = RemoveHtml($this->FirstPODate->caption());

        // SaleprcieAndMrpCalcPercent
        $this->SaleprcieAndMrpCalcPercent->EditAttrs["class"] = "form-control";
        $this->SaleprcieAndMrpCalcPercent->EditCustomAttributes = "";
        $this->SaleprcieAndMrpCalcPercent->EditValue = $this->SaleprcieAndMrpCalcPercent->CurrentValue;
        $this->SaleprcieAndMrpCalcPercent->PlaceHolder = RemoveHtml($this->SaleprcieAndMrpCalcPercent->caption());
        if (strval($this->SaleprcieAndMrpCalcPercent->EditValue) != "" && is_numeric($this->SaleprcieAndMrpCalcPercent->EditValue)) {
            $this->SaleprcieAndMrpCalcPercent->EditValue = FormatNumber($this->SaleprcieAndMrpCalcPercent->EditValue, -2, -2, -2, -2);
        }

        // IsGiftVoucherProducts
        $this->IsGiftVoucherProducts->EditAttrs["class"] = "form-control";
        $this->IsGiftVoucherProducts->EditCustomAttributes = "";
        $this->IsGiftVoucherProducts->EditValue = $this->IsGiftVoucherProducts->CurrentValue;
        $this->IsGiftVoucherProducts->PlaceHolder = RemoveHtml($this->IsGiftVoucherProducts->caption());

        // AcceptRange4SerialNumber
        $this->AcceptRange4SerialNumber->EditAttrs["class"] = "form-control";
        $this->AcceptRange4SerialNumber->EditCustomAttributes = "";
        $this->AcceptRange4SerialNumber->EditValue = $this->AcceptRange4SerialNumber->CurrentValue;
        $this->AcceptRange4SerialNumber->PlaceHolder = RemoveHtml($this->AcceptRange4SerialNumber->caption());

        // GiftVoucherDenomination
        $this->GiftVoucherDenomination->EditAttrs["class"] = "form-control";
        $this->GiftVoucherDenomination->EditCustomAttributes = "";
        $this->GiftVoucherDenomination->EditValue = $this->GiftVoucherDenomination->CurrentValue;
        $this->GiftVoucherDenomination->PlaceHolder = RemoveHtml($this->GiftVoucherDenomination->caption());

        // Subclasscode
        $this->Subclasscode->EditAttrs["class"] = "form-control";
        $this->Subclasscode->EditCustomAttributes = "";
        if (!$this->Subclasscode->Raw) {
            $this->Subclasscode->CurrentValue = HtmlDecode($this->Subclasscode->CurrentValue);
        }
        $this->Subclasscode->EditValue = $this->Subclasscode->CurrentValue;
        $this->Subclasscode->PlaceHolder = RemoveHtml($this->Subclasscode->caption());

        // BarCodeFromWeighingMachine
        $this->BarCodeFromWeighingMachine->EditAttrs["class"] = "form-control";
        $this->BarCodeFromWeighingMachine->EditCustomAttributes = "";
        $this->BarCodeFromWeighingMachine->EditValue = $this->BarCodeFromWeighingMachine->CurrentValue;
        $this->BarCodeFromWeighingMachine->PlaceHolder = RemoveHtml($this->BarCodeFromWeighingMachine->caption());

        // CheckCostInReturn
        $this->CheckCostInReturn->EditAttrs["class"] = "form-control";
        $this->CheckCostInReturn->EditCustomAttributes = "";
        $this->CheckCostInReturn->EditValue = $this->CheckCostInReturn->CurrentValue;
        $this->CheckCostInReturn->PlaceHolder = RemoveHtml($this->CheckCostInReturn->caption());

        // FrequentSaleProduct
        $this->FrequentSaleProduct->EditAttrs["class"] = "form-control";
        $this->FrequentSaleProduct->EditCustomAttributes = "";
        $this->FrequentSaleProduct->EditValue = $this->FrequentSaleProduct->CurrentValue;
        $this->FrequentSaleProduct->PlaceHolder = RemoveHtml($this->FrequentSaleProduct->caption());

        // RateType
        $this->RateType->EditAttrs["class"] = "form-control";
        $this->RateType->EditCustomAttributes = "";
        $this->RateType->EditValue = $this->RateType->CurrentValue;
        $this->RateType->PlaceHolder = RemoveHtml($this->RateType->caption());

        // TouchscreenName
        $this->TouchscreenName->EditAttrs["class"] = "form-control";
        $this->TouchscreenName->EditCustomAttributes = "";
        if (!$this->TouchscreenName->Raw) {
            $this->TouchscreenName->CurrentValue = HtmlDecode($this->TouchscreenName->CurrentValue);
        }
        $this->TouchscreenName->EditValue = $this->TouchscreenName->CurrentValue;
        $this->TouchscreenName->PlaceHolder = RemoveHtml($this->TouchscreenName->caption());

        // FreeType
        $this->FreeType->EditAttrs["class"] = "form-control";
        $this->FreeType->EditCustomAttributes = "";
        $this->FreeType->EditValue = $this->FreeType->CurrentValue;
        $this->FreeType->PlaceHolder = RemoveHtml($this->FreeType->caption());

        // LooseQtyasNewBatch
        $this->LooseQtyasNewBatch->EditAttrs["class"] = "form-control";
        $this->LooseQtyasNewBatch->EditCustomAttributes = "";
        $this->LooseQtyasNewBatch->EditValue = $this->LooseQtyasNewBatch->CurrentValue;
        $this->LooseQtyasNewBatch->PlaceHolder = RemoveHtml($this->LooseQtyasNewBatch->caption());

        // AllowSlabBilling
        $this->AllowSlabBilling->EditAttrs["class"] = "form-control";
        $this->AllowSlabBilling->EditCustomAttributes = "";
        $this->AllowSlabBilling->EditValue = $this->AllowSlabBilling->CurrentValue;
        $this->AllowSlabBilling->PlaceHolder = RemoveHtml($this->AllowSlabBilling->caption());

        // ProductTypeForProduction
        $this->ProductTypeForProduction->EditAttrs["class"] = "form-control";
        $this->ProductTypeForProduction->EditCustomAttributes = "";
        $this->ProductTypeForProduction->EditValue = $this->ProductTypeForProduction->CurrentValue;
        $this->ProductTypeForProduction->PlaceHolder = RemoveHtml($this->ProductTypeForProduction->caption());

        // RecipeCode
        $this->RecipeCode->EditAttrs["class"] = "form-control";
        $this->RecipeCode->EditCustomAttributes = "";
        $this->RecipeCode->EditValue = $this->RecipeCode->CurrentValue;
        $this->RecipeCode->PlaceHolder = RemoveHtml($this->RecipeCode->caption());

        // DefaultUnitType
        $this->DefaultUnitType->EditAttrs["class"] = "form-control";
        $this->DefaultUnitType->EditCustomAttributes = "";
        $this->DefaultUnitType->EditValue = $this->DefaultUnitType->CurrentValue;
        $this->DefaultUnitType->PlaceHolder = RemoveHtml($this->DefaultUnitType->caption());

        // PIstatus
        $this->PIstatus->EditAttrs["class"] = "form-control";
        $this->PIstatus->EditCustomAttributes = "";
        $this->PIstatus->EditValue = $this->PIstatus->CurrentValue;
        $this->PIstatus->PlaceHolder = RemoveHtml($this->PIstatus->caption());

        // LastPiConfirmedDate
        $this->LastPiConfirmedDate->EditAttrs["class"] = "form-control";
        $this->LastPiConfirmedDate->EditCustomAttributes = "";
        $this->LastPiConfirmedDate->EditValue = FormatDateTime($this->LastPiConfirmedDate->CurrentValue, 8);
        $this->LastPiConfirmedDate->PlaceHolder = RemoveHtml($this->LastPiConfirmedDate->caption());

        // BarCodeDesign
        $this->BarCodeDesign->EditAttrs["class"] = "form-control";
        $this->BarCodeDesign->EditCustomAttributes = "";
        if (!$this->BarCodeDesign->Raw) {
            $this->BarCodeDesign->CurrentValue = HtmlDecode($this->BarCodeDesign->CurrentValue);
        }
        $this->BarCodeDesign->EditValue = $this->BarCodeDesign->CurrentValue;
        $this->BarCodeDesign->PlaceHolder = RemoveHtml($this->BarCodeDesign->caption());

        // AcceptRemarksInBill
        $this->AcceptRemarksInBill->EditAttrs["class"] = "form-control";
        $this->AcceptRemarksInBill->EditCustomAttributes = "";
        $this->AcceptRemarksInBill->EditValue = $this->AcceptRemarksInBill->CurrentValue;
        $this->AcceptRemarksInBill->PlaceHolder = RemoveHtml($this->AcceptRemarksInBill->caption());

        // Classification
        $this->Classification->EditAttrs["class"] = "form-control";
        $this->Classification->EditCustomAttributes = "";
        $this->Classification->EditValue = $this->Classification->CurrentValue;
        $this->Classification->PlaceHolder = RemoveHtml($this->Classification->caption());

        // TimeSlot
        $this->TimeSlot->EditAttrs["class"] = "form-control";
        $this->TimeSlot->EditCustomAttributes = "";
        $this->TimeSlot->EditValue = $this->TimeSlot->CurrentValue;
        $this->TimeSlot->PlaceHolder = RemoveHtml($this->TimeSlot->caption());

        // IsBundle
        $this->IsBundle->EditAttrs["class"] = "form-control";
        $this->IsBundle->EditCustomAttributes = "";
        $this->IsBundle->EditValue = $this->IsBundle->CurrentValue;
        $this->IsBundle->PlaceHolder = RemoveHtml($this->IsBundle->caption());

        // ColorCode
        $this->ColorCode->EditAttrs["class"] = "form-control";
        $this->ColorCode->EditCustomAttributes = "";
        $this->ColorCode->EditValue = $this->ColorCode->CurrentValue;
        $this->ColorCode->PlaceHolder = RemoveHtml($this->ColorCode->caption());

        // GenderCode
        $this->GenderCode->EditAttrs["class"] = "form-control";
        $this->GenderCode->EditCustomAttributes = "";
        $this->GenderCode->EditValue = $this->GenderCode->CurrentValue;
        $this->GenderCode->PlaceHolder = RemoveHtml($this->GenderCode->caption());

        // SizeCode
        $this->SizeCode->EditAttrs["class"] = "form-control";
        $this->SizeCode->EditCustomAttributes = "";
        $this->SizeCode->EditValue = $this->SizeCode->CurrentValue;
        $this->SizeCode->PlaceHolder = RemoveHtml($this->SizeCode->caption());

        // GiftCard
        $this->GiftCard->EditAttrs["class"] = "form-control";
        $this->GiftCard->EditCustomAttributes = "";
        $this->GiftCard->EditValue = $this->GiftCard->CurrentValue;
        $this->GiftCard->PlaceHolder = RemoveHtml($this->GiftCard->caption());

        // ToonLabel
        $this->ToonLabel->EditAttrs["class"] = "form-control";
        $this->ToonLabel->EditCustomAttributes = "";
        $this->ToonLabel->EditValue = $this->ToonLabel->CurrentValue;
        $this->ToonLabel->PlaceHolder = RemoveHtml($this->ToonLabel->caption());

        // GarmentType
        $this->GarmentType->EditAttrs["class"] = "form-control";
        $this->GarmentType->EditCustomAttributes = "";
        $this->GarmentType->EditValue = $this->GarmentType->CurrentValue;
        $this->GarmentType->PlaceHolder = RemoveHtml($this->GarmentType->caption());

        // AgeGroup
        $this->AgeGroup->EditAttrs["class"] = "form-control";
        $this->AgeGroup->EditCustomAttributes = "";
        $this->AgeGroup->EditValue = $this->AgeGroup->CurrentValue;
        $this->AgeGroup->PlaceHolder = RemoveHtml($this->AgeGroup->caption());

        // Season
        $this->Season->EditAttrs["class"] = "form-control";
        $this->Season->EditCustomAttributes = "";
        $this->Season->EditValue = $this->Season->CurrentValue;
        $this->Season->PlaceHolder = RemoveHtml($this->Season->caption());

        // DailyStockEntry
        $this->DailyStockEntry->EditAttrs["class"] = "form-control";
        $this->DailyStockEntry->EditCustomAttributes = "";
        $this->DailyStockEntry->EditValue = $this->DailyStockEntry->CurrentValue;
        $this->DailyStockEntry->PlaceHolder = RemoveHtml($this->DailyStockEntry->caption());

        // ModifierApplicable
        $this->ModifierApplicable->EditAttrs["class"] = "form-control";
        $this->ModifierApplicable->EditCustomAttributes = "";
        $this->ModifierApplicable->EditValue = $this->ModifierApplicable->CurrentValue;
        $this->ModifierApplicable->PlaceHolder = RemoveHtml($this->ModifierApplicable->caption());

        // ModifierType
        $this->ModifierType->EditAttrs["class"] = "form-control";
        $this->ModifierType->EditCustomAttributes = "";
        $this->ModifierType->EditValue = $this->ModifierType->CurrentValue;
        $this->ModifierType->PlaceHolder = RemoveHtml($this->ModifierType->caption());

        // AcceptZeroRate
        $this->AcceptZeroRate->EditAttrs["class"] = "form-control";
        $this->AcceptZeroRate->EditCustomAttributes = "";
        $this->AcceptZeroRate->EditValue = $this->AcceptZeroRate->CurrentValue;
        $this->AcceptZeroRate->PlaceHolder = RemoveHtml($this->AcceptZeroRate->caption());

        // ExciseDutyCode
        $this->ExciseDutyCode->EditAttrs["class"] = "form-control";
        $this->ExciseDutyCode->EditCustomAttributes = "";
        $this->ExciseDutyCode->EditValue = $this->ExciseDutyCode->CurrentValue;
        $this->ExciseDutyCode->PlaceHolder = RemoveHtml($this->ExciseDutyCode->caption());

        // IndentProductGroupCode
        $this->IndentProductGroupCode->EditAttrs["class"] = "form-control";
        $this->IndentProductGroupCode->EditCustomAttributes = "";
        $this->IndentProductGroupCode->EditValue = $this->IndentProductGroupCode->CurrentValue;
        $this->IndentProductGroupCode->PlaceHolder = RemoveHtml($this->IndentProductGroupCode->caption());

        // IsMultiBatch
        $this->IsMultiBatch->EditAttrs["class"] = "form-control";
        $this->IsMultiBatch->EditCustomAttributes = "";
        $this->IsMultiBatch->EditValue = $this->IsMultiBatch->CurrentValue;
        $this->IsMultiBatch->PlaceHolder = RemoveHtml($this->IsMultiBatch->caption());

        // IsSingleBatch
        $this->IsSingleBatch->EditAttrs["class"] = "form-control";
        $this->IsSingleBatch->EditCustomAttributes = "";
        $this->IsSingleBatch->EditValue = $this->IsSingleBatch->CurrentValue;
        $this->IsSingleBatch->PlaceHolder = RemoveHtml($this->IsSingleBatch->caption());

        // MarkUpRate1
        $this->MarkUpRate1->EditAttrs["class"] = "form-control";
        $this->MarkUpRate1->EditCustomAttributes = "";
        $this->MarkUpRate1->EditValue = $this->MarkUpRate1->CurrentValue;
        $this->MarkUpRate1->PlaceHolder = RemoveHtml($this->MarkUpRate1->caption());
        if (strval($this->MarkUpRate1->EditValue) != "" && is_numeric($this->MarkUpRate1->EditValue)) {
            $this->MarkUpRate1->EditValue = FormatNumber($this->MarkUpRate1->EditValue, -2, -2, -2, -2);
        }

        // MarkDownRate1
        $this->MarkDownRate1->EditAttrs["class"] = "form-control";
        $this->MarkDownRate1->EditCustomAttributes = "";
        $this->MarkDownRate1->EditValue = $this->MarkDownRate1->CurrentValue;
        $this->MarkDownRate1->PlaceHolder = RemoveHtml($this->MarkDownRate1->caption());
        if (strval($this->MarkDownRate1->EditValue) != "" && is_numeric($this->MarkDownRate1->EditValue)) {
            $this->MarkDownRate1->EditValue = FormatNumber($this->MarkDownRate1->EditValue, -2, -2, -2, -2);
        }

        // MarkUpRate2
        $this->MarkUpRate2->EditAttrs["class"] = "form-control";
        $this->MarkUpRate2->EditCustomAttributes = "";
        $this->MarkUpRate2->EditValue = $this->MarkUpRate2->CurrentValue;
        $this->MarkUpRate2->PlaceHolder = RemoveHtml($this->MarkUpRate2->caption());
        if (strval($this->MarkUpRate2->EditValue) != "" && is_numeric($this->MarkUpRate2->EditValue)) {
            $this->MarkUpRate2->EditValue = FormatNumber($this->MarkUpRate2->EditValue, -2, -2, -2, -2);
        }

        // MarkDownRate2
        $this->MarkDownRate2->EditAttrs["class"] = "form-control";
        $this->MarkDownRate2->EditCustomAttributes = "";
        $this->MarkDownRate2->EditValue = $this->MarkDownRate2->CurrentValue;
        $this->MarkDownRate2->PlaceHolder = RemoveHtml($this->MarkDownRate2->caption());
        if (strval($this->MarkDownRate2->EditValue) != "" && is_numeric($this->MarkDownRate2->EditValue)) {
            $this->MarkDownRate2->EditValue = FormatNumber($this->MarkDownRate2->EditValue, -2, -2, -2, -2);
        }

        // Yield
        $this->_Yield->EditAttrs["class"] = "form-control";
        $this->_Yield->EditCustomAttributes = "";
        $this->_Yield->EditValue = $this->_Yield->CurrentValue;
        $this->_Yield->PlaceHolder = RemoveHtml($this->_Yield->caption());
        if (strval($this->_Yield->EditValue) != "" && is_numeric($this->_Yield->EditValue)) {
            $this->_Yield->EditValue = FormatNumber($this->_Yield->EditValue, -2, -2, -2, -2);
        }

        // RefProductCode
        $this->RefProductCode->EditAttrs["class"] = "form-control";
        $this->RefProductCode->EditCustomAttributes = "";
        $this->RefProductCode->EditValue = $this->RefProductCode->CurrentValue;
        $this->RefProductCode->PlaceHolder = RemoveHtml($this->RefProductCode->caption());

        // Volume
        $this->Volume->EditAttrs["class"] = "form-control";
        $this->Volume->EditCustomAttributes = "";
        $this->Volume->EditValue = $this->Volume->CurrentValue;
        $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
        if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue)) {
            $this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
        }

        // MeasurementID
        $this->MeasurementID->EditAttrs["class"] = "form-control";
        $this->MeasurementID->EditCustomAttributes = "";
        $this->MeasurementID->EditValue = $this->MeasurementID->CurrentValue;
        $this->MeasurementID->PlaceHolder = RemoveHtml($this->MeasurementID->caption());

        // CountryCode
        $this->CountryCode->EditAttrs["class"] = "form-control";
        $this->CountryCode->EditCustomAttributes = "";
        $this->CountryCode->EditValue = $this->CountryCode->CurrentValue;
        $this->CountryCode->PlaceHolder = RemoveHtml($this->CountryCode->caption());

        // AcceptWMQty
        $this->AcceptWMQty->EditAttrs["class"] = "form-control";
        $this->AcceptWMQty->EditCustomAttributes = "";
        $this->AcceptWMQty->EditValue = $this->AcceptWMQty->CurrentValue;
        $this->AcceptWMQty->PlaceHolder = RemoveHtml($this->AcceptWMQty->caption());

        // SingleBatchBasedOnRate
        $this->SingleBatchBasedOnRate->EditAttrs["class"] = "form-control";
        $this->SingleBatchBasedOnRate->EditCustomAttributes = "";
        $this->SingleBatchBasedOnRate->EditValue = $this->SingleBatchBasedOnRate->CurrentValue;
        $this->SingleBatchBasedOnRate->PlaceHolder = RemoveHtml($this->SingleBatchBasedOnRate->caption());

        // TenderNo
        $this->TenderNo->EditAttrs["class"] = "form-control";
        $this->TenderNo->EditCustomAttributes = "";
        if (!$this->TenderNo->Raw) {
            $this->TenderNo->CurrentValue = HtmlDecode($this->TenderNo->CurrentValue);
        }
        $this->TenderNo->EditValue = $this->TenderNo->CurrentValue;
        $this->TenderNo->PlaceHolder = RemoveHtml($this->TenderNo->caption());

        // SingleBillMaximumSoldQtyFiled
        $this->SingleBillMaximumSoldQtyFiled->EditAttrs["class"] = "form-control";
        $this->SingleBillMaximumSoldQtyFiled->EditCustomAttributes = "";
        $this->SingleBillMaximumSoldQtyFiled->EditValue = $this->SingleBillMaximumSoldQtyFiled->CurrentValue;
        $this->SingleBillMaximumSoldQtyFiled->PlaceHolder = RemoveHtml($this->SingleBillMaximumSoldQtyFiled->caption());
        if (strval($this->SingleBillMaximumSoldQtyFiled->EditValue) != "" && is_numeric($this->SingleBillMaximumSoldQtyFiled->EditValue)) {
            $this->SingleBillMaximumSoldQtyFiled->EditValue = FormatNumber($this->SingleBillMaximumSoldQtyFiled->EditValue, -2, -2, -2, -2);
        }

        // Strength1
        $this->Strength1->EditAttrs["class"] = "form-control";
        $this->Strength1->EditCustomAttributes = "";
        if (!$this->Strength1->Raw) {
            $this->Strength1->CurrentValue = HtmlDecode($this->Strength1->CurrentValue);
        }
        $this->Strength1->EditValue = $this->Strength1->CurrentValue;
        $this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

        // Strength2
        $this->Strength2->EditAttrs["class"] = "form-control";
        $this->Strength2->EditCustomAttributes = "";
        if (!$this->Strength2->Raw) {
            $this->Strength2->CurrentValue = HtmlDecode($this->Strength2->CurrentValue);
        }
        $this->Strength2->EditValue = $this->Strength2->CurrentValue;
        $this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

        // Strength3
        $this->Strength3->EditAttrs["class"] = "form-control";
        $this->Strength3->EditCustomAttributes = "";
        if (!$this->Strength3->Raw) {
            $this->Strength3->CurrentValue = HtmlDecode($this->Strength3->CurrentValue);
        }
        $this->Strength3->EditValue = $this->Strength3->CurrentValue;
        $this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

        // Strength4
        $this->Strength4->EditAttrs["class"] = "form-control";
        $this->Strength4->EditCustomAttributes = "";
        if (!$this->Strength4->Raw) {
            $this->Strength4->CurrentValue = HtmlDecode($this->Strength4->CurrentValue);
        }
        $this->Strength4->EditValue = $this->Strength4->CurrentValue;
        $this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

        // Strength5
        $this->Strength5->EditAttrs["class"] = "form-control";
        $this->Strength5->EditCustomAttributes = "";
        if (!$this->Strength5->Raw) {
            $this->Strength5->CurrentValue = HtmlDecode($this->Strength5->CurrentValue);
        }
        $this->Strength5->EditValue = $this->Strength5->CurrentValue;
        $this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

        // IngredientCode1
        $this->IngredientCode1->EditAttrs["class"] = "form-control";
        $this->IngredientCode1->EditCustomAttributes = "";
        $this->IngredientCode1->EditValue = $this->IngredientCode1->CurrentValue;
        $this->IngredientCode1->PlaceHolder = RemoveHtml($this->IngredientCode1->caption());

        // IngredientCode2
        $this->IngredientCode2->EditAttrs["class"] = "form-control";
        $this->IngredientCode2->EditCustomAttributes = "";
        $this->IngredientCode2->EditValue = $this->IngredientCode2->CurrentValue;
        $this->IngredientCode2->PlaceHolder = RemoveHtml($this->IngredientCode2->caption());

        // IngredientCode3
        $this->IngredientCode3->EditAttrs["class"] = "form-control";
        $this->IngredientCode3->EditCustomAttributes = "";
        $this->IngredientCode3->EditValue = $this->IngredientCode3->CurrentValue;
        $this->IngredientCode3->PlaceHolder = RemoveHtml($this->IngredientCode3->caption());

        // IngredientCode4
        $this->IngredientCode4->EditAttrs["class"] = "form-control";
        $this->IngredientCode4->EditCustomAttributes = "";
        $this->IngredientCode4->EditValue = $this->IngredientCode4->CurrentValue;
        $this->IngredientCode4->PlaceHolder = RemoveHtml($this->IngredientCode4->caption());

        // IngredientCode5
        $this->IngredientCode5->EditAttrs["class"] = "form-control";
        $this->IngredientCode5->EditCustomAttributes = "";
        $this->IngredientCode5->EditValue = $this->IngredientCode5->CurrentValue;
        $this->IngredientCode5->PlaceHolder = RemoveHtml($this->IngredientCode5->caption());

        // OrderType
        $this->OrderType->EditAttrs["class"] = "form-control";
        $this->OrderType->EditCustomAttributes = "";
        $this->OrderType->EditValue = $this->OrderType->CurrentValue;
        $this->OrderType->PlaceHolder = RemoveHtml($this->OrderType->caption());

        // StockUOM
        $this->StockUOM->EditAttrs["class"] = "form-control";
        $this->StockUOM->EditCustomAttributes = "";
        $this->StockUOM->EditValue = $this->StockUOM->CurrentValue;
        $this->StockUOM->PlaceHolder = RemoveHtml($this->StockUOM->caption());

        // PriceUOM
        $this->PriceUOM->EditAttrs["class"] = "form-control";
        $this->PriceUOM->EditCustomAttributes = "";
        $this->PriceUOM->EditValue = $this->PriceUOM->CurrentValue;
        $this->PriceUOM->PlaceHolder = RemoveHtml($this->PriceUOM->caption());

        // DefaultSaleUOM
        $this->DefaultSaleUOM->EditAttrs["class"] = "form-control";
        $this->DefaultSaleUOM->EditCustomAttributes = "";
        $this->DefaultSaleUOM->EditValue = $this->DefaultSaleUOM->CurrentValue;
        $this->DefaultSaleUOM->PlaceHolder = RemoveHtml($this->DefaultSaleUOM->caption());

        // DefaultPurchaseUOM
        $this->DefaultPurchaseUOM->EditAttrs["class"] = "form-control";
        $this->DefaultPurchaseUOM->EditCustomAttributes = "";
        $this->DefaultPurchaseUOM->EditValue = $this->DefaultPurchaseUOM->CurrentValue;
        $this->DefaultPurchaseUOM->PlaceHolder = RemoveHtml($this->DefaultPurchaseUOM->caption());

        // ReportingUOM
        $this->ReportingUOM->EditAttrs["class"] = "form-control";
        $this->ReportingUOM->EditCustomAttributes = "";
        $this->ReportingUOM->EditValue = $this->ReportingUOM->CurrentValue;
        $this->ReportingUOM->PlaceHolder = RemoveHtml($this->ReportingUOM->caption());

        // LastPurchasedUOM
        $this->LastPurchasedUOM->EditAttrs["class"] = "form-control";
        $this->LastPurchasedUOM->EditCustomAttributes = "";
        $this->LastPurchasedUOM->EditValue = $this->LastPurchasedUOM->CurrentValue;
        $this->LastPurchasedUOM->PlaceHolder = RemoveHtml($this->LastPurchasedUOM->caption());

        // TreatmentCodes
        $this->TreatmentCodes->EditAttrs["class"] = "form-control";
        $this->TreatmentCodes->EditCustomAttributes = "";
        if (!$this->TreatmentCodes->Raw) {
            $this->TreatmentCodes->CurrentValue = HtmlDecode($this->TreatmentCodes->CurrentValue);
        }
        $this->TreatmentCodes->EditValue = $this->TreatmentCodes->CurrentValue;
        $this->TreatmentCodes->PlaceHolder = RemoveHtml($this->TreatmentCodes->caption());

        // InsuranceType
        $this->InsuranceType->EditAttrs["class"] = "form-control";
        $this->InsuranceType->EditCustomAttributes = "";
        $this->InsuranceType->EditValue = $this->InsuranceType->CurrentValue;
        $this->InsuranceType->PlaceHolder = RemoveHtml($this->InsuranceType->caption());

        // CoverageGroupCodes
        $this->CoverageGroupCodes->EditAttrs["class"] = "form-control";
        $this->CoverageGroupCodes->EditCustomAttributes = "";
        if (!$this->CoverageGroupCodes->Raw) {
            $this->CoverageGroupCodes->CurrentValue = HtmlDecode($this->CoverageGroupCodes->CurrentValue);
        }
        $this->CoverageGroupCodes->EditValue = $this->CoverageGroupCodes->CurrentValue;
        $this->CoverageGroupCodes->PlaceHolder = RemoveHtml($this->CoverageGroupCodes->caption());

        // MultipleUOM
        $this->MultipleUOM->EditAttrs["class"] = "form-control";
        $this->MultipleUOM->EditCustomAttributes = "";
        $this->MultipleUOM->EditValue = $this->MultipleUOM->CurrentValue;
        $this->MultipleUOM->PlaceHolder = RemoveHtml($this->MultipleUOM->caption());

        // SalePriceComputation
        $this->SalePriceComputation->EditAttrs["class"] = "form-control";
        $this->SalePriceComputation->EditCustomAttributes = "";
        $this->SalePriceComputation->EditValue = $this->SalePriceComputation->CurrentValue;
        $this->SalePriceComputation->PlaceHolder = RemoveHtml($this->SalePriceComputation->caption());

        // StockCorrection
        $this->StockCorrection->EditAttrs["class"] = "form-control";
        $this->StockCorrection->EditCustomAttributes = "";
        $this->StockCorrection->EditValue = $this->StockCorrection->CurrentValue;
        $this->StockCorrection->PlaceHolder = RemoveHtml($this->StockCorrection->caption());

        // LBTPercentage
        $this->LBTPercentage->EditAttrs["class"] = "form-control";
        $this->LBTPercentage->EditCustomAttributes = "";
        $this->LBTPercentage->EditValue = $this->LBTPercentage->CurrentValue;
        $this->LBTPercentage->PlaceHolder = RemoveHtml($this->LBTPercentage->caption());
        if (strval($this->LBTPercentage->EditValue) != "" && is_numeric($this->LBTPercentage->EditValue)) {
            $this->LBTPercentage->EditValue = FormatNumber($this->LBTPercentage->EditValue, -2, -2, -2, -2);
        }

        // SalesCommission
        $this->SalesCommission->EditAttrs["class"] = "form-control";
        $this->SalesCommission->EditCustomAttributes = "";
        $this->SalesCommission->EditValue = $this->SalesCommission->CurrentValue;
        $this->SalesCommission->PlaceHolder = RemoveHtml($this->SalesCommission->caption());
        if (strval($this->SalesCommission->EditValue) != "" && is_numeric($this->SalesCommission->EditValue)) {
            $this->SalesCommission->EditValue = FormatNumber($this->SalesCommission->EditValue, -2, -2, -2, -2);
        }

        // LockedStock
        $this->LockedStock->EditAttrs["class"] = "form-control";
        $this->LockedStock->EditCustomAttributes = "";
        $this->LockedStock->EditValue = $this->LockedStock->CurrentValue;
        $this->LockedStock->PlaceHolder = RemoveHtml($this->LockedStock->caption());
        if (strval($this->LockedStock->EditValue) != "" && is_numeric($this->LockedStock->EditValue)) {
            $this->LockedStock->EditValue = FormatNumber($this->LockedStock->EditValue, -2, -2, -2, -2);
        }

        // MinMaxUOM
        $this->MinMaxUOM->EditAttrs["class"] = "form-control";
        $this->MinMaxUOM->EditCustomAttributes = "";
        $this->MinMaxUOM->EditValue = $this->MinMaxUOM->CurrentValue;
        $this->MinMaxUOM->PlaceHolder = RemoveHtml($this->MinMaxUOM->caption());

        // ExpiryMfrDateFormat
        $this->ExpiryMfrDateFormat->EditAttrs["class"] = "form-control";
        $this->ExpiryMfrDateFormat->EditCustomAttributes = "";
        $this->ExpiryMfrDateFormat->EditValue = $this->ExpiryMfrDateFormat->CurrentValue;
        $this->ExpiryMfrDateFormat->PlaceHolder = RemoveHtml($this->ExpiryMfrDateFormat->caption());

        // ProductLifeTime
        $this->ProductLifeTime->EditAttrs["class"] = "form-control";
        $this->ProductLifeTime->EditCustomAttributes = "";
        $this->ProductLifeTime->EditValue = $this->ProductLifeTime->CurrentValue;
        $this->ProductLifeTime->PlaceHolder = RemoveHtml($this->ProductLifeTime->caption());

        // IsCombo
        $this->IsCombo->EditAttrs["class"] = "form-control";
        $this->IsCombo->EditCustomAttributes = "";
        $this->IsCombo->EditValue = $this->IsCombo->CurrentValue;
        $this->IsCombo->PlaceHolder = RemoveHtml($this->IsCombo->caption());

        // ComboTypeCode
        $this->ComboTypeCode->EditAttrs["class"] = "form-control";
        $this->ComboTypeCode->EditCustomAttributes = "";
        $this->ComboTypeCode->EditValue = $this->ComboTypeCode->CurrentValue;
        $this->ComboTypeCode->PlaceHolder = RemoveHtml($this->ComboTypeCode->caption());

        // AttributeCount6
        $this->AttributeCount6->EditAttrs["class"] = "form-control";
        $this->AttributeCount6->EditCustomAttributes = "";
        $this->AttributeCount6->EditValue = $this->AttributeCount6->CurrentValue;
        $this->AttributeCount6->PlaceHolder = RemoveHtml($this->AttributeCount6->caption());

        // AttributeCount7
        $this->AttributeCount7->EditAttrs["class"] = "form-control";
        $this->AttributeCount7->EditCustomAttributes = "";
        $this->AttributeCount7->EditValue = $this->AttributeCount7->CurrentValue;
        $this->AttributeCount7->PlaceHolder = RemoveHtml($this->AttributeCount7->caption());

        // AttributeCount8
        $this->AttributeCount8->EditAttrs["class"] = "form-control";
        $this->AttributeCount8->EditCustomAttributes = "";
        $this->AttributeCount8->EditValue = $this->AttributeCount8->CurrentValue;
        $this->AttributeCount8->PlaceHolder = RemoveHtml($this->AttributeCount8->caption());

        // AttributeCount9
        $this->AttributeCount9->EditAttrs["class"] = "form-control";
        $this->AttributeCount9->EditCustomAttributes = "";
        $this->AttributeCount9->EditValue = $this->AttributeCount9->CurrentValue;
        $this->AttributeCount9->PlaceHolder = RemoveHtml($this->AttributeCount9->caption());

        // AttributeCount10
        $this->AttributeCount10->EditAttrs["class"] = "form-control";
        $this->AttributeCount10->EditCustomAttributes = "";
        $this->AttributeCount10->EditValue = $this->AttributeCount10->CurrentValue;
        $this->AttributeCount10->PlaceHolder = RemoveHtml($this->AttributeCount10->caption());

        // LabourCharge
        $this->LabourCharge->EditAttrs["class"] = "form-control";
        $this->LabourCharge->EditCustomAttributes = "";
        $this->LabourCharge->EditValue = $this->LabourCharge->CurrentValue;
        $this->LabourCharge->PlaceHolder = RemoveHtml($this->LabourCharge->caption());
        if (strval($this->LabourCharge->EditValue) != "" && is_numeric($this->LabourCharge->EditValue)) {
            $this->LabourCharge->EditValue = FormatNumber($this->LabourCharge->EditValue, -2, -2, -2, -2);
        }

        // AffectOtherCharge
        $this->AffectOtherCharge->EditAttrs["class"] = "form-control";
        $this->AffectOtherCharge->EditCustomAttributes = "";
        $this->AffectOtherCharge->EditValue = $this->AffectOtherCharge->CurrentValue;
        $this->AffectOtherCharge->PlaceHolder = RemoveHtml($this->AffectOtherCharge->caption());

        // DosageInfo
        $this->DosageInfo->EditAttrs["class"] = "form-control";
        $this->DosageInfo->EditCustomAttributes = "";
        if (!$this->DosageInfo->Raw) {
            $this->DosageInfo->CurrentValue = HtmlDecode($this->DosageInfo->CurrentValue);
        }
        $this->DosageInfo->EditValue = $this->DosageInfo->CurrentValue;
        $this->DosageInfo->PlaceHolder = RemoveHtml($this->DosageInfo->caption());

        // DosageType
        $this->DosageType->EditAttrs["class"] = "form-control";
        $this->DosageType->EditCustomAttributes = "";
        $this->DosageType->EditValue = $this->DosageType->CurrentValue;
        $this->DosageType->PlaceHolder = RemoveHtml($this->DosageType->caption());

        // DefaultIndentUOM
        $this->DefaultIndentUOM->EditAttrs["class"] = "form-control";
        $this->DefaultIndentUOM->EditCustomAttributes = "";
        $this->DefaultIndentUOM->EditValue = $this->DefaultIndentUOM->CurrentValue;
        $this->DefaultIndentUOM->PlaceHolder = RemoveHtml($this->DefaultIndentUOM->caption());

        // PromoTag
        $this->PromoTag->EditAttrs["class"] = "form-control";
        $this->PromoTag->EditCustomAttributes = "";
        $this->PromoTag->EditValue = $this->PromoTag->CurrentValue;
        $this->PromoTag->PlaceHolder = RemoveHtml($this->PromoTag->caption());

        // BillLevelPromoTag
        $this->BillLevelPromoTag->EditAttrs["class"] = "form-control";
        $this->BillLevelPromoTag->EditCustomAttributes = "";
        $this->BillLevelPromoTag->EditValue = $this->BillLevelPromoTag->CurrentValue;
        $this->BillLevelPromoTag->PlaceHolder = RemoveHtml($this->BillLevelPromoTag->caption());

        // IsMRPProduct
        $this->IsMRPProduct->EditAttrs["class"] = "form-control";
        $this->IsMRPProduct->EditCustomAttributes = "";
        $this->IsMRPProduct->EditValue = $this->IsMRPProduct->CurrentValue;
        $this->IsMRPProduct->PlaceHolder = RemoveHtml($this->IsMRPProduct->caption());

        // MrpList
        $this->MrpList->EditAttrs["class"] = "form-control";
        $this->MrpList->EditCustomAttributes = "";
        $this->MrpList->EditValue = $this->MrpList->CurrentValue;
        $this->MrpList->PlaceHolder = RemoveHtml($this->MrpList->caption());

        // AlternateSaleUOM
        $this->AlternateSaleUOM->EditAttrs["class"] = "form-control";
        $this->AlternateSaleUOM->EditCustomAttributes = "";
        $this->AlternateSaleUOM->EditValue = $this->AlternateSaleUOM->CurrentValue;
        $this->AlternateSaleUOM->PlaceHolder = RemoveHtml($this->AlternateSaleUOM->caption());

        // FreeUOM
        $this->FreeUOM->EditAttrs["class"] = "form-control";
        $this->FreeUOM->EditCustomAttributes = "";
        $this->FreeUOM->EditValue = $this->FreeUOM->CurrentValue;
        $this->FreeUOM->PlaceHolder = RemoveHtml($this->FreeUOM->caption());

        // MarketedCode
        $this->MarketedCode->EditAttrs["class"] = "form-control";
        $this->MarketedCode->EditCustomAttributes = "";
        if (!$this->MarketedCode->Raw) {
            $this->MarketedCode->CurrentValue = HtmlDecode($this->MarketedCode->CurrentValue);
        }
        $this->MarketedCode->EditValue = $this->MarketedCode->CurrentValue;
        $this->MarketedCode->PlaceHolder = RemoveHtml($this->MarketedCode->caption());

        // MinimumSalePrice
        $this->MinimumSalePrice->EditAttrs["class"] = "form-control";
        $this->MinimumSalePrice->EditCustomAttributes = "";
        $this->MinimumSalePrice->EditValue = $this->MinimumSalePrice->CurrentValue;
        $this->MinimumSalePrice->PlaceHolder = RemoveHtml($this->MinimumSalePrice->caption());
        if (strval($this->MinimumSalePrice->EditValue) != "" && is_numeric($this->MinimumSalePrice->EditValue)) {
            $this->MinimumSalePrice->EditValue = FormatNumber($this->MinimumSalePrice->EditValue, -2, -2, -2, -2);
        }

        // PRate1
        $this->PRate1->EditAttrs["class"] = "form-control";
        $this->PRate1->EditCustomAttributes = "";
        $this->PRate1->EditValue = $this->PRate1->CurrentValue;
        $this->PRate1->PlaceHolder = RemoveHtml($this->PRate1->caption());
        if (strval($this->PRate1->EditValue) != "" && is_numeric($this->PRate1->EditValue)) {
            $this->PRate1->EditValue = FormatNumber($this->PRate1->EditValue, -2, -2, -2, -2);
        }

        // PRate2
        $this->PRate2->EditAttrs["class"] = "form-control";
        $this->PRate2->EditCustomAttributes = "";
        $this->PRate2->EditValue = $this->PRate2->CurrentValue;
        $this->PRate2->PlaceHolder = RemoveHtml($this->PRate2->caption());
        if (strval($this->PRate2->EditValue) != "" && is_numeric($this->PRate2->EditValue)) {
            $this->PRate2->EditValue = FormatNumber($this->PRate2->EditValue, -2, -2, -2, -2);
        }

        // LPItemCost
        $this->LPItemCost->EditAttrs["class"] = "form-control";
        $this->LPItemCost->EditCustomAttributes = "";
        $this->LPItemCost->EditValue = $this->LPItemCost->CurrentValue;
        $this->LPItemCost->PlaceHolder = RemoveHtml($this->LPItemCost->caption());
        if (strval($this->LPItemCost->EditValue) != "" && is_numeric($this->LPItemCost->EditValue)) {
            $this->LPItemCost->EditValue = FormatNumber($this->LPItemCost->EditValue, -2, -2, -2, -2);
        }

        // FixedItemCost
        $this->FixedItemCost->EditAttrs["class"] = "form-control";
        $this->FixedItemCost->EditCustomAttributes = "";
        $this->FixedItemCost->EditValue = $this->FixedItemCost->CurrentValue;
        $this->FixedItemCost->PlaceHolder = RemoveHtml($this->FixedItemCost->caption());
        if (strval($this->FixedItemCost->EditValue) != "" && is_numeric($this->FixedItemCost->EditValue)) {
            $this->FixedItemCost->EditValue = FormatNumber($this->FixedItemCost->EditValue, -2, -2, -2, -2);
        }

        // HSNId
        $this->HSNId->EditAttrs["class"] = "form-control";
        $this->HSNId->EditCustomAttributes = "";
        $this->HSNId->EditValue = $this->HSNId->CurrentValue;
        $this->HSNId->PlaceHolder = RemoveHtml($this->HSNId->caption());

        // TaxInclusive
        $this->TaxInclusive->EditAttrs["class"] = "form-control";
        $this->TaxInclusive->EditCustomAttributes = "";
        $this->TaxInclusive->EditValue = $this->TaxInclusive->CurrentValue;
        $this->TaxInclusive->PlaceHolder = RemoveHtml($this->TaxInclusive->caption());

        // EligibleforWarranty
        $this->EligibleforWarranty->EditAttrs["class"] = "form-control";
        $this->EligibleforWarranty->EditCustomAttributes = "";
        $this->EligibleforWarranty->EditValue = $this->EligibleforWarranty->CurrentValue;
        $this->EligibleforWarranty->PlaceHolder = RemoveHtml($this->EligibleforWarranty->caption());

        // NoofMonthsWarranty
        $this->NoofMonthsWarranty->EditAttrs["class"] = "form-control";
        $this->NoofMonthsWarranty->EditCustomAttributes = "";
        $this->NoofMonthsWarranty->EditValue = $this->NoofMonthsWarranty->CurrentValue;
        $this->NoofMonthsWarranty->PlaceHolder = RemoveHtml($this->NoofMonthsWarranty->caption());

        // ComputeTaxonCost
        $this->ComputeTaxonCost->EditAttrs["class"] = "form-control";
        $this->ComputeTaxonCost->EditCustomAttributes = "";
        $this->ComputeTaxonCost->EditValue = $this->ComputeTaxonCost->CurrentValue;
        $this->ComputeTaxonCost->PlaceHolder = RemoveHtml($this->ComputeTaxonCost->caption());

        // HasEmptyBottleTrack
        $this->HasEmptyBottleTrack->EditAttrs["class"] = "form-control";
        $this->HasEmptyBottleTrack->EditCustomAttributes = "";
        $this->HasEmptyBottleTrack->EditValue = $this->HasEmptyBottleTrack->CurrentValue;
        $this->HasEmptyBottleTrack->PlaceHolder = RemoveHtml($this->HasEmptyBottleTrack->caption());

        // EmptyBottleReferenceCode
        $this->EmptyBottleReferenceCode->EditAttrs["class"] = "form-control";
        $this->EmptyBottleReferenceCode->EditCustomAttributes = "";
        $this->EmptyBottleReferenceCode->EditValue = $this->EmptyBottleReferenceCode->CurrentValue;
        $this->EmptyBottleReferenceCode->PlaceHolder = RemoveHtml($this->EmptyBottleReferenceCode->caption());

        // AdditionalCESSAmount
        $this->AdditionalCESSAmount->EditAttrs["class"] = "form-control";
        $this->AdditionalCESSAmount->EditCustomAttributes = "";
        $this->AdditionalCESSAmount->EditValue = $this->AdditionalCESSAmount->CurrentValue;
        $this->AdditionalCESSAmount->PlaceHolder = RemoveHtml($this->AdditionalCESSAmount->caption());
        if (strval($this->AdditionalCESSAmount->EditValue) != "" && is_numeric($this->AdditionalCESSAmount->EditValue)) {
            $this->AdditionalCESSAmount->EditValue = FormatNumber($this->AdditionalCESSAmount->EditValue, -2, -2, -2, -2);
        }

        // EmptyBottleRate
        $this->EmptyBottleRate->EditAttrs["class"] = "form-control";
        $this->EmptyBottleRate->EditCustomAttributes = "";
        $this->EmptyBottleRate->EditValue = $this->EmptyBottleRate->CurrentValue;
        $this->EmptyBottleRate->PlaceHolder = RemoveHtml($this->EmptyBottleRate->caption());
        if (strval($this->EmptyBottleRate->EditValue) != "" && is_numeric($this->EmptyBottleRate->EditValue)) {
            $this->EmptyBottleRate->EditValue = FormatNumber($this->EmptyBottleRate->EditValue, -2, -2, -2, -2);
        }

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->ProductCode);
                    $doc->exportCaption($this->ProductName);
                    $doc->exportCaption($this->DivisionCode);
                    $doc->exportCaption($this->ManufacturerCode);
                    $doc->exportCaption($this->SupplierCode);
                    $doc->exportCaption($this->AlternateSupplierCodes);
                    $doc->exportCaption($this->AlternateProductCode);
                    $doc->exportCaption($this->UniversalProductCode);
                    $doc->exportCaption($this->BookProductCode);
                    $doc->exportCaption($this->OldCode);
                    $doc->exportCaption($this->ProtectedProducts);
                    $doc->exportCaption($this->ProductFullName);
                    $doc->exportCaption($this->UnitOfMeasure);
                    $doc->exportCaption($this->UnitDescription);
                    $doc->exportCaption($this->BulkDescription);
                    $doc->exportCaption($this->BarCodeDescription);
                    $doc->exportCaption($this->PackageInformation);
                    $doc->exportCaption($this->PackageId);
                    $doc->exportCaption($this->Weight);
                    $doc->exportCaption($this->AllowFractions);
                    $doc->exportCaption($this->MinimumStockLevel);
                    $doc->exportCaption($this->MaximumStockLevel);
                    $doc->exportCaption($this->ReorderLevel);
                    $doc->exportCaption($this->MinMaxRatio);
                    $doc->exportCaption($this->AutoMinMaxRatio);
                    $doc->exportCaption($this->ScheduleCode);
                    $doc->exportCaption($this->RopRatio);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->PurchasePrice);
                    $doc->exportCaption($this->PurchaseUnit);
                    $doc->exportCaption($this->PurchaseTaxCode);
                    $doc->exportCaption($this->AllowDirectInward);
                    $doc->exportCaption($this->SalePrice);
                    $doc->exportCaption($this->SaleUnit);
                    $doc->exportCaption($this->SalesTaxCode);
                    $doc->exportCaption($this->StockReceived);
                    $doc->exportCaption($this->TotalStock);
                    $doc->exportCaption($this->StockType);
                    $doc->exportCaption($this->StockCheckDate);
                    $doc->exportCaption($this->StockAdjustmentDate);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->CostCentre);
                    $doc->exportCaption($this->ProductType);
                    $doc->exportCaption($this->TaxAmount);
                    $doc->exportCaption($this->TaxId);
                    $doc->exportCaption($this->ResaleTaxApplicable);
                    $doc->exportCaption($this->CstOtherTax);
                    $doc->exportCaption($this->TotalTax);
                    $doc->exportCaption($this->ItemCost);
                    $doc->exportCaption($this->ExpiryDate);
                    $doc->exportCaption($this->BatchDescription);
                    $doc->exportCaption($this->FreeScheme);
                    $doc->exportCaption($this->CashDiscountEligibility);
                    $doc->exportCaption($this->DiscountPerAllowInBill);
                    $doc->exportCaption($this->Discount);
                    $doc->exportCaption($this->TotalAmount);
                    $doc->exportCaption($this->StandardMargin);
                    $doc->exportCaption($this->Margin);
                    $doc->exportCaption($this->MarginId);
                    $doc->exportCaption($this->ExpectedMargin);
                    $doc->exportCaption($this->SurchargeBeforeTax);
                    $doc->exportCaption($this->SurchargeAfterTax);
                    $doc->exportCaption($this->TempOrderNo);
                    $doc->exportCaption($this->TempOrderDate);
                    $doc->exportCaption($this->OrderUnit);
                    $doc->exportCaption($this->OrderQuantity);
                    $doc->exportCaption($this->MarkForOrder);
                    $doc->exportCaption($this->OrderAllId);
                    $doc->exportCaption($this->CalculateOrderQty);
                    $doc->exportCaption($this->SubLocation);
                    $doc->exportCaption($this->CategoryCode);
                    $doc->exportCaption($this->SubCategory);
                    $doc->exportCaption($this->FlexCategoryCode);
                    $doc->exportCaption($this->ABCSaleQty);
                    $doc->exportCaption($this->ABCSaleValue);
                    $doc->exportCaption($this->ConvertionFactor);
                    $doc->exportCaption($this->ConvertionUnitDesc);
                    $doc->exportCaption($this->TransactionId);
                    $doc->exportCaption($this->SoldProductId);
                    $doc->exportCaption($this->WantedBookId);
                    $doc->exportCaption($this->AllId);
                    $doc->exportCaption($this->BatchAndExpiryCompulsory);
                    $doc->exportCaption($this->BatchStockForWantedBook);
                    $doc->exportCaption($this->UnitBasedBilling);
                    $doc->exportCaption($this->DoNotCheckStock);
                    $doc->exportCaption($this->AcceptRate);
                    $doc->exportCaption($this->PriceLevel);
                    $doc->exportCaption($this->LastQuotePrice);
                    $doc->exportCaption($this->PriceChange);
                    $doc->exportCaption($this->CommodityCode);
                    $doc->exportCaption($this->InstitutePrice);
                    $doc->exportCaption($this->CtrlOrDCtrlProduct);
                    $doc->exportCaption($this->ImportedDate);
                    $doc->exportCaption($this->IsImported);
                    $doc->exportCaption($this->FileName);
                    $doc->exportCaption($this->LPName);
                    $doc->exportCaption($this->GodownNumber);
                    $doc->exportCaption($this->CreationDate);
                    $doc->exportCaption($this->CreatedbyUser);
                    $doc->exportCaption($this->ModifiedDate);
                    $doc->exportCaption($this->ModifiedbyUser);
                    $doc->exportCaption($this->isActive);
                    $doc->exportCaption($this->AllowExpiryClaim);
                    $doc->exportCaption($this->BrandCode);
                    $doc->exportCaption($this->FreeSchemeBasedon);
                    $doc->exportCaption($this->DoNotCheckCostInBill);
                    $doc->exportCaption($this->ProductGroupCode);
                    $doc->exportCaption($this->ProductStrengthCode);
                    $doc->exportCaption($this->PackingCode);
                    $doc->exportCaption($this->ComputedMinStock);
                    $doc->exportCaption($this->ComputedMaxStock);
                    $doc->exportCaption($this->ProductRemark);
                    $doc->exportCaption($this->ProductDrugCode);
                    $doc->exportCaption($this->IsMatrixProduct);
                    $doc->exportCaption($this->AttributeCount1);
                    $doc->exportCaption($this->AttributeCount2);
                    $doc->exportCaption($this->AttributeCount3);
                    $doc->exportCaption($this->AttributeCount4);
                    $doc->exportCaption($this->AttributeCount5);
                    $doc->exportCaption($this->DefaultDiscountPercentage);
                    $doc->exportCaption($this->DonotPrintBarcode);
                    $doc->exportCaption($this->ProductLevelDiscount);
                    $doc->exportCaption($this->Markup);
                    $doc->exportCaption($this->MarkDown);
                    $doc->exportCaption($this->ReworkSalePrice);
                    $doc->exportCaption($this->MultipleInput);
                    $doc->exportCaption($this->LpPackageInformation);
                    $doc->exportCaption($this->AllowNegativeStock);
                    $doc->exportCaption($this->OrderDate);
                    $doc->exportCaption($this->OrderTime);
                    $doc->exportCaption($this->RateGroupCode);
                    $doc->exportCaption($this->ConversionCaseLot);
                    $doc->exportCaption($this->ShippingLot);
                    $doc->exportCaption($this->AllowExpiryReplacement);
                    $doc->exportCaption($this->NoOfMonthExpiryAllowed);
                    $doc->exportCaption($this->ProductDiscountEligibility);
                    $doc->exportCaption($this->ScheduleTypeCode);
                    $doc->exportCaption($this->AIOCDProductCode);
                    $doc->exportCaption($this->FreeQuantity);
                    $doc->exportCaption($this->DiscountType);
                    $doc->exportCaption($this->DiscountValue);
                    $doc->exportCaption($this->HasProductOrderAttribute);
                    $doc->exportCaption($this->FirstPODate);
                    $doc->exportCaption($this->SaleprcieAndMrpCalcPercent);
                    $doc->exportCaption($this->IsGiftVoucherProducts);
                    $doc->exportCaption($this->AcceptRange4SerialNumber);
                    $doc->exportCaption($this->GiftVoucherDenomination);
                    $doc->exportCaption($this->Subclasscode);
                    $doc->exportCaption($this->BarCodeFromWeighingMachine);
                    $doc->exportCaption($this->CheckCostInReturn);
                    $doc->exportCaption($this->FrequentSaleProduct);
                    $doc->exportCaption($this->RateType);
                    $doc->exportCaption($this->TouchscreenName);
                    $doc->exportCaption($this->FreeType);
                    $doc->exportCaption($this->LooseQtyasNewBatch);
                    $doc->exportCaption($this->AllowSlabBilling);
                    $doc->exportCaption($this->ProductTypeForProduction);
                    $doc->exportCaption($this->RecipeCode);
                    $doc->exportCaption($this->DefaultUnitType);
                    $doc->exportCaption($this->PIstatus);
                    $doc->exportCaption($this->LastPiConfirmedDate);
                    $doc->exportCaption($this->BarCodeDesign);
                    $doc->exportCaption($this->AcceptRemarksInBill);
                    $doc->exportCaption($this->Classification);
                    $doc->exportCaption($this->TimeSlot);
                    $doc->exportCaption($this->IsBundle);
                    $doc->exportCaption($this->ColorCode);
                    $doc->exportCaption($this->GenderCode);
                    $doc->exportCaption($this->SizeCode);
                    $doc->exportCaption($this->GiftCard);
                    $doc->exportCaption($this->ToonLabel);
                    $doc->exportCaption($this->GarmentType);
                    $doc->exportCaption($this->AgeGroup);
                    $doc->exportCaption($this->Season);
                    $doc->exportCaption($this->DailyStockEntry);
                    $doc->exportCaption($this->ModifierApplicable);
                    $doc->exportCaption($this->ModifierType);
                    $doc->exportCaption($this->AcceptZeroRate);
                    $doc->exportCaption($this->ExciseDutyCode);
                    $doc->exportCaption($this->IndentProductGroupCode);
                    $doc->exportCaption($this->IsMultiBatch);
                    $doc->exportCaption($this->IsSingleBatch);
                    $doc->exportCaption($this->MarkUpRate1);
                    $doc->exportCaption($this->MarkDownRate1);
                    $doc->exportCaption($this->MarkUpRate2);
                    $doc->exportCaption($this->MarkDownRate2);
                    $doc->exportCaption($this->_Yield);
                    $doc->exportCaption($this->RefProductCode);
                    $doc->exportCaption($this->Volume);
                    $doc->exportCaption($this->MeasurementID);
                    $doc->exportCaption($this->CountryCode);
                    $doc->exportCaption($this->AcceptWMQty);
                    $doc->exportCaption($this->SingleBatchBasedOnRate);
                    $doc->exportCaption($this->TenderNo);
                    $doc->exportCaption($this->SingleBillMaximumSoldQtyFiled);
                    $doc->exportCaption($this->Strength1);
                    $doc->exportCaption($this->Strength2);
                    $doc->exportCaption($this->Strength3);
                    $doc->exportCaption($this->Strength4);
                    $doc->exportCaption($this->Strength5);
                    $doc->exportCaption($this->IngredientCode1);
                    $doc->exportCaption($this->IngredientCode2);
                    $doc->exportCaption($this->IngredientCode3);
                    $doc->exportCaption($this->IngredientCode4);
                    $doc->exportCaption($this->IngredientCode5);
                    $doc->exportCaption($this->OrderType);
                    $doc->exportCaption($this->StockUOM);
                    $doc->exportCaption($this->PriceUOM);
                    $doc->exportCaption($this->DefaultSaleUOM);
                    $doc->exportCaption($this->DefaultPurchaseUOM);
                    $doc->exportCaption($this->ReportingUOM);
                    $doc->exportCaption($this->LastPurchasedUOM);
                    $doc->exportCaption($this->TreatmentCodes);
                    $doc->exportCaption($this->InsuranceType);
                    $doc->exportCaption($this->CoverageGroupCodes);
                    $doc->exportCaption($this->MultipleUOM);
                    $doc->exportCaption($this->SalePriceComputation);
                    $doc->exportCaption($this->StockCorrection);
                    $doc->exportCaption($this->LBTPercentage);
                    $doc->exportCaption($this->SalesCommission);
                    $doc->exportCaption($this->LockedStock);
                    $doc->exportCaption($this->MinMaxUOM);
                    $doc->exportCaption($this->ExpiryMfrDateFormat);
                    $doc->exportCaption($this->ProductLifeTime);
                    $doc->exportCaption($this->IsCombo);
                    $doc->exportCaption($this->ComboTypeCode);
                    $doc->exportCaption($this->AttributeCount6);
                    $doc->exportCaption($this->AttributeCount7);
                    $doc->exportCaption($this->AttributeCount8);
                    $doc->exportCaption($this->AttributeCount9);
                    $doc->exportCaption($this->AttributeCount10);
                    $doc->exportCaption($this->LabourCharge);
                    $doc->exportCaption($this->AffectOtherCharge);
                    $doc->exportCaption($this->DosageInfo);
                    $doc->exportCaption($this->DosageType);
                    $doc->exportCaption($this->DefaultIndentUOM);
                    $doc->exportCaption($this->PromoTag);
                    $doc->exportCaption($this->BillLevelPromoTag);
                    $doc->exportCaption($this->IsMRPProduct);
                    $doc->exportCaption($this->MrpList);
                    $doc->exportCaption($this->AlternateSaleUOM);
                    $doc->exportCaption($this->FreeUOM);
                    $doc->exportCaption($this->MarketedCode);
                    $doc->exportCaption($this->MinimumSalePrice);
                    $doc->exportCaption($this->PRate1);
                    $doc->exportCaption($this->PRate2);
                    $doc->exportCaption($this->LPItemCost);
                    $doc->exportCaption($this->FixedItemCost);
                    $doc->exportCaption($this->HSNId);
                    $doc->exportCaption($this->TaxInclusive);
                    $doc->exportCaption($this->EligibleforWarranty);
                    $doc->exportCaption($this->NoofMonthsWarranty);
                    $doc->exportCaption($this->ComputeTaxonCost);
                    $doc->exportCaption($this->HasEmptyBottleTrack);
                    $doc->exportCaption($this->EmptyBottleReferenceCode);
                    $doc->exportCaption($this->AdditionalCESSAmount);
                    $doc->exportCaption($this->EmptyBottleRate);
                } else {
                    $doc->exportCaption($this->ProductCode);
                    $doc->exportCaption($this->ProductName);
                    $doc->exportCaption($this->DivisionCode);
                    $doc->exportCaption($this->ManufacturerCode);
                    $doc->exportCaption($this->SupplierCode);
                    $doc->exportCaption($this->AlternateSupplierCodes);
                    $doc->exportCaption($this->AlternateProductCode);
                    $doc->exportCaption($this->UniversalProductCode);
                    $doc->exportCaption($this->BookProductCode);
                    $doc->exportCaption($this->OldCode);
                    $doc->exportCaption($this->ProtectedProducts);
                    $doc->exportCaption($this->ProductFullName);
                    $doc->exportCaption($this->UnitOfMeasure);
                    $doc->exportCaption($this->UnitDescription);
                    $doc->exportCaption($this->BulkDescription);
                    $doc->exportCaption($this->BarCodeDescription);
                    $doc->exportCaption($this->PackageInformation);
                    $doc->exportCaption($this->PackageId);
                    $doc->exportCaption($this->Weight);
                    $doc->exportCaption($this->AllowFractions);
                    $doc->exportCaption($this->MinimumStockLevel);
                    $doc->exportCaption($this->MaximumStockLevel);
                    $doc->exportCaption($this->ReorderLevel);
                    $doc->exportCaption($this->MinMaxRatio);
                    $doc->exportCaption($this->AutoMinMaxRatio);
                    $doc->exportCaption($this->ScheduleCode);
                    $doc->exportCaption($this->RopRatio);
                    $doc->exportCaption($this->MRP);
                    $doc->exportCaption($this->PurchasePrice);
                    $doc->exportCaption($this->PurchaseUnit);
                    $doc->exportCaption($this->PurchaseTaxCode);
                    $doc->exportCaption($this->AllowDirectInward);
                    $doc->exportCaption($this->SalePrice);
                    $doc->exportCaption($this->SaleUnit);
                    $doc->exportCaption($this->SalesTaxCode);
                    $doc->exportCaption($this->StockReceived);
                    $doc->exportCaption($this->TotalStock);
                    $doc->exportCaption($this->StockType);
                    $doc->exportCaption($this->StockCheckDate);
                    $doc->exportCaption($this->StockAdjustmentDate);
                    $doc->exportCaption($this->Remarks);
                    $doc->exportCaption($this->CostCentre);
                    $doc->exportCaption($this->ProductType);
                    $doc->exportCaption($this->TaxAmount);
                    $doc->exportCaption($this->TaxId);
                    $doc->exportCaption($this->ResaleTaxApplicable);
                    $doc->exportCaption($this->CstOtherTax);
                    $doc->exportCaption($this->TotalTax);
                    $doc->exportCaption($this->ItemCost);
                    $doc->exportCaption($this->ExpiryDate);
                    $doc->exportCaption($this->BatchDescription);
                    $doc->exportCaption($this->FreeScheme);
                    $doc->exportCaption($this->CashDiscountEligibility);
                    $doc->exportCaption($this->DiscountPerAllowInBill);
                    $doc->exportCaption($this->Discount);
                    $doc->exportCaption($this->TotalAmount);
                    $doc->exportCaption($this->StandardMargin);
                    $doc->exportCaption($this->Margin);
                    $doc->exportCaption($this->MarginId);
                    $doc->exportCaption($this->ExpectedMargin);
                    $doc->exportCaption($this->SurchargeBeforeTax);
                    $doc->exportCaption($this->SurchargeAfterTax);
                    $doc->exportCaption($this->TempOrderNo);
                    $doc->exportCaption($this->TempOrderDate);
                    $doc->exportCaption($this->OrderUnit);
                    $doc->exportCaption($this->OrderQuantity);
                    $doc->exportCaption($this->MarkForOrder);
                    $doc->exportCaption($this->OrderAllId);
                    $doc->exportCaption($this->CalculateOrderQty);
                    $doc->exportCaption($this->SubLocation);
                    $doc->exportCaption($this->CategoryCode);
                    $doc->exportCaption($this->SubCategory);
                    $doc->exportCaption($this->FlexCategoryCode);
                    $doc->exportCaption($this->ABCSaleQty);
                    $doc->exportCaption($this->ABCSaleValue);
                    $doc->exportCaption($this->ConvertionFactor);
                    $doc->exportCaption($this->ConvertionUnitDesc);
                    $doc->exportCaption($this->TransactionId);
                    $doc->exportCaption($this->SoldProductId);
                    $doc->exportCaption($this->WantedBookId);
                    $doc->exportCaption($this->AllId);
                    $doc->exportCaption($this->BatchAndExpiryCompulsory);
                    $doc->exportCaption($this->BatchStockForWantedBook);
                    $doc->exportCaption($this->UnitBasedBilling);
                    $doc->exportCaption($this->DoNotCheckStock);
                    $doc->exportCaption($this->AcceptRate);
                    $doc->exportCaption($this->PriceLevel);
                    $doc->exportCaption($this->LastQuotePrice);
                    $doc->exportCaption($this->PriceChange);
                    $doc->exportCaption($this->CommodityCode);
                    $doc->exportCaption($this->InstitutePrice);
                    $doc->exportCaption($this->CtrlOrDCtrlProduct);
                    $doc->exportCaption($this->ImportedDate);
                    $doc->exportCaption($this->IsImported);
                    $doc->exportCaption($this->FileName);
                    $doc->exportCaption($this->GodownNumber);
                    $doc->exportCaption($this->CreationDate);
                    $doc->exportCaption($this->CreatedbyUser);
                    $doc->exportCaption($this->ModifiedDate);
                    $doc->exportCaption($this->ModifiedbyUser);
                    $doc->exportCaption($this->isActive);
                    $doc->exportCaption($this->AllowExpiryClaim);
                    $doc->exportCaption($this->BrandCode);
                    $doc->exportCaption($this->FreeSchemeBasedon);
                    $doc->exportCaption($this->DoNotCheckCostInBill);
                    $doc->exportCaption($this->ProductGroupCode);
                    $doc->exportCaption($this->ProductStrengthCode);
                    $doc->exportCaption($this->PackingCode);
                    $doc->exportCaption($this->ComputedMinStock);
                    $doc->exportCaption($this->ComputedMaxStock);
                    $doc->exportCaption($this->ProductRemark);
                    $doc->exportCaption($this->ProductDrugCode);
                    $doc->exportCaption($this->IsMatrixProduct);
                    $doc->exportCaption($this->AttributeCount1);
                    $doc->exportCaption($this->AttributeCount2);
                    $doc->exportCaption($this->AttributeCount3);
                    $doc->exportCaption($this->AttributeCount4);
                    $doc->exportCaption($this->AttributeCount5);
                    $doc->exportCaption($this->DefaultDiscountPercentage);
                    $doc->exportCaption($this->DonotPrintBarcode);
                    $doc->exportCaption($this->ProductLevelDiscount);
                    $doc->exportCaption($this->Markup);
                    $doc->exportCaption($this->MarkDown);
                    $doc->exportCaption($this->ReworkSalePrice);
                    $doc->exportCaption($this->MultipleInput);
                    $doc->exportCaption($this->LpPackageInformation);
                    $doc->exportCaption($this->AllowNegativeStock);
                    $doc->exportCaption($this->OrderDate);
                    $doc->exportCaption($this->OrderTime);
                    $doc->exportCaption($this->RateGroupCode);
                    $doc->exportCaption($this->ConversionCaseLot);
                    $doc->exportCaption($this->ShippingLot);
                    $doc->exportCaption($this->AllowExpiryReplacement);
                    $doc->exportCaption($this->NoOfMonthExpiryAllowed);
                    $doc->exportCaption($this->ProductDiscountEligibility);
                    $doc->exportCaption($this->ScheduleTypeCode);
                    $doc->exportCaption($this->AIOCDProductCode);
                    $doc->exportCaption($this->FreeQuantity);
                    $doc->exportCaption($this->DiscountType);
                    $doc->exportCaption($this->DiscountValue);
                    $doc->exportCaption($this->HasProductOrderAttribute);
                    $doc->exportCaption($this->FirstPODate);
                    $doc->exportCaption($this->SaleprcieAndMrpCalcPercent);
                    $doc->exportCaption($this->IsGiftVoucherProducts);
                    $doc->exportCaption($this->AcceptRange4SerialNumber);
                    $doc->exportCaption($this->GiftVoucherDenomination);
                    $doc->exportCaption($this->Subclasscode);
                    $doc->exportCaption($this->BarCodeFromWeighingMachine);
                    $doc->exportCaption($this->CheckCostInReturn);
                    $doc->exportCaption($this->FrequentSaleProduct);
                    $doc->exportCaption($this->RateType);
                    $doc->exportCaption($this->TouchscreenName);
                    $doc->exportCaption($this->FreeType);
                    $doc->exportCaption($this->LooseQtyasNewBatch);
                    $doc->exportCaption($this->AllowSlabBilling);
                    $doc->exportCaption($this->ProductTypeForProduction);
                    $doc->exportCaption($this->RecipeCode);
                    $doc->exportCaption($this->DefaultUnitType);
                    $doc->exportCaption($this->PIstatus);
                    $doc->exportCaption($this->LastPiConfirmedDate);
                    $doc->exportCaption($this->BarCodeDesign);
                    $doc->exportCaption($this->AcceptRemarksInBill);
                    $doc->exportCaption($this->Classification);
                    $doc->exportCaption($this->TimeSlot);
                    $doc->exportCaption($this->IsBundle);
                    $doc->exportCaption($this->ColorCode);
                    $doc->exportCaption($this->GenderCode);
                    $doc->exportCaption($this->SizeCode);
                    $doc->exportCaption($this->GiftCard);
                    $doc->exportCaption($this->ToonLabel);
                    $doc->exportCaption($this->GarmentType);
                    $doc->exportCaption($this->AgeGroup);
                    $doc->exportCaption($this->Season);
                    $doc->exportCaption($this->DailyStockEntry);
                    $doc->exportCaption($this->ModifierApplicable);
                    $doc->exportCaption($this->ModifierType);
                    $doc->exportCaption($this->AcceptZeroRate);
                    $doc->exportCaption($this->ExciseDutyCode);
                    $doc->exportCaption($this->IndentProductGroupCode);
                    $doc->exportCaption($this->IsMultiBatch);
                    $doc->exportCaption($this->IsSingleBatch);
                    $doc->exportCaption($this->MarkUpRate1);
                    $doc->exportCaption($this->MarkDownRate1);
                    $doc->exportCaption($this->MarkUpRate2);
                    $doc->exportCaption($this->MarkDownRate2);
                    $doc->exportCaption($this->_Yield);
                    $doc->exportCaption($this->RefProductCode);
                    $doc->exportCaption($this->Volume);
                    $doc->exportCaption($this->MeasurementID);
                    $doc->exportCaption($this->CountryCode);
                    $doc->exportCaption($this->AcceptWMQty);
                    $doc->exportCaption($this->SingleBatchBasedOnRate);
                    $doc->exportCaption($this->TenderNo);
                    $doc->exportCaption($this->SingleBillMaximumSoldQtyFiled);
                    $doc->exportCaption($this->Strength1);
                    $doc->exportCaption($this->Strength2);
                    $doc->exportCaption($this->Strength3);
                    $doc->exportCaption($this->Strength4);
                    $doc->exportCaption($this->Strength5);
                    $doc->exportCaption($this->IngredientCode1);
                    $doc->exportCaption($this->IngredientCode2);
                    $doc->exportCaption($this->IngredientCode3);
                    $doc->exportCaption($this->IngredientCode4);
                    $doc->exportCaption($this->IngredientCode5);
                    $doc->exportCaption($this->OrderType);
                    $doc->exportCaption($this->StockUOM);
                    $doc->exportCaption($this->PriceUOM);
                    $doc->exportCaption($this->DefaultSaleUOM);
                    $doc->exportCaption($this->DefaultPurchaseUOM);
                    $doc->exportCaption($this->ReportingUOM);
                    $doc->exportCaption($this->LastPurchasedUOM);
                    $doc->exportCaption($this->TreatmentCodes);
                    $doc->exportCaption($this->InsuranceType);
                    $doc->exportCaption($this->CoverageGroupCodes);
                    $doc->exportCaption($this->MultipleUOM);
                    $doc->exportCaption($this->SalePriceComputation);
                    $doc->exportCaption($this->StockCorrection);
                    $doc->exportCaption($this->LBTPercentage);
                    $doc->exportCaption($this->SalesCommission);
                    $doc->exportCaption($this->LockedStock);
                    $doc->exportCaption($this->MinMaxUOM);
                    $doc->exportCaption($this->ExpiryMfrDateFormat);
                    $doc->exportCaption($this->ProductLifeTime);
                    $doc->exportCaption($this->IsCombo);
                    $doc->exportCaption($this->ComboTypeCode);
                    $doc->exportCaption($this->AttributeCount6);
                    $doc->exportCaption($this->AttributeCount7);
                    $doc->exportCaption($this->AttributeCount8);
                    $doc->exportCaption($this->AttributeCount9);
                    $doc->exportCaption($this->AttributeCount10);
                    $doc->exportCaption($this->LabourCharge);
                    $doc->exportCaption($this->AffectOtherCharge);
                    $doc->exportCaption($this->DosageInfo);
                    $doc->exportCaption($this->DosageType);
                    $doc->exportCaption($this->DefaultIndentUOM);
                    $doc->exportCaption($this->PromoTag);
                    $doc->exportCaption($this->BillLevelPromoTag);
                    $doc->exportCaption($this->IsMRPProduct);
                    $doc->exportCaption($this->AlternateSaleUOM);
                    $doc->exportCaption($this->FreeUOM);
                    $doc->exportCaption($this->MarketedCode);
                    $doc->exportCaption($this->MinimumSalePrice);
                    $doc->exportCaption($this->PRate1);
                    $doc->exportCaption($this->PRate2);
                    $doc->exportCaption($this->LPItemCost);
                    $doc->exportCaption($this->FixedItemCost);
                    $doc->exportCaption($this->HSNId);
                    $doc->exportCaption($this->TaxInclusive);
                    $doc->exportCaption($this->EligibleforWarranty);
                    $doc->exportCaption($this->NoofMonthsWarranty);
                    $doc->exportCaption($this->ComputeTaxonCost);
                    $doc->exportCaption($this->HasEmptyBottleTrack);
                    $doc->exportCaption($this->EmptyBottleReferenceCode);
                    $doc->exportCaption($this->AdditionalCESSAmount);
                    $doc->exportCaption($this->EmptyBottleRate);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->ProductCode);
                        $doc->exportField($this->ProductName);
                        $doc->exportField($this->DivisionCode);
                        $doc->exportField($this->ManufacturerCode);
                        $doc->exportField($this->SupplierCode);
                        $doc->exportField($this->AlternateSupplierCodes);
                        $doc->exportField($this->AlternateProductCode);
                        $doc->exportField($this->UniversalProductCode);
                        $doc->exportField($this->BookProductCode);
                        $doc->exportField($this->OldCode);
                        $doc->exportField($this->ProtectedProducts);
                        $doc->exportField($this->ProductFullName);
                        $doc->exportField($this->UnitOfMeasure);
                        $doc->exportField($this->UnitDescription);
                        $doc->exportField($this->BulkDescription);
                        $doc->exportField($this->BarCodeDescription);
                        $doc->exportField($this->PackageInformation);
                        $doc->exportField($this->PackageId);
                        $doc->exportField($this->Weight);
                        $doc->exportField($this->AllowFractions);
                        $doc->exportField($this->MinimumStockLevel);
                        $doc->exportField($this->MaximumStockLevel);
                        $doc->exportField($this->ReorderLevel);
                        $doc->exportField($this->MinMaxRatio);
                        $doc->exportField($this->AutoMinMaxRatio);
                        $doc->exportField($this->ScheduleCode);
                        $doc->exportField($this->RopRatio);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->PurchasePrice);
                        $doc->exportField($this->PurchaseUnit);
                        $doc->exportField($this->PurchaseTaxCode);
                        $doc->exportField($this->AllowDirectInward);
                        $doc->exportField($this->SalePrice);
                        $doc->exportField($this->SaleUnit);
                        $doc->exportField($this->SalesTaxCode);
                        $doc->exportField($this->StockReceived);
                        $doc->exportField($this->TotalStock);
                        $doc->exportField($this->StockType);
                        $doc->exportField($this->StockCheckDate);
                        $doc->exportField($this->StockAdjustmentDate);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->CostCentre);
                        $doc->exportField($this->ProductType);
                        $doc->exportField($this->TaxAmount);
                        $doc->exportField($this->TaxId);
                        $doc->exportField($this->ResaleTaxApplicable);
                        $doc->exportField($this->CstOtherTax);
                        $doc->exportField($this->TotalTax);
                        $doc->exportField($this->ItemCost);
                        $doc->exportField($this->ExpiryDate);
                        $doc->exportField($this->BatchDescription);
                        $doc->exportField($this->FreeScheme);
                        $doc->exportField($this->CashDiscountEligibility);
                        $doc->exportField($this->DiscountPerAllowInBill);
                        $doc->exportField($this->Discount);
                        $doc->exportField($this->TotalAmount);
                        $doc->exportField($this->StandardMargin);
                        $doc->exportField($this->Margin);
                        $doc->exportField($this->MarginId);
                        $doc->exportField($this->ExpectedMargin);
                        $doc->exportField($this->SurchargeBeforeTax);
                        $doc->exportField($this->SurchargeAfterTax);
                        $doc->exportField($this->TempOrderNo);
                        $doc->exportField($this->TempOrderDate);
                        $doc->exportField($this->OrderUnit);
                        $doc->exportField($this->OrderQuantity);
                        $doc->exportField($this->MarkForOrder);
                        $doc->exportField($this->OrderAllId);
                        $doc->exportField($this->CalculateOrderQty);
                        $doc->exportField($this->SubLocation);
                        $doc->exportField($this->CategoryCode);
                        $doc->exportField($this->SubCategory);
                        $doc->exportField($this->FlexCategoryCode);
                        $doc->exportField($this->ABCSaleQty);
                        $doc->exportField($this->ABCSaleValue);
                        $doc->exportField($this->ConvertionFactor);
                        $doc->exportField($this->ConvertionUnitDesc);
                        $doc->exportField($this->TransactionId);
                        $doc->exportField($this->SoldProductId);
                        $doc->exportField($this->WantedBookId);
                        $doc->exportField($this->AllId);
                        $doc->exportField($this->BatchAndExpiryCompulsory);
                        $doc->exportField($this->BatchStockForWantedBook);
                        $doc->exportField($this->UnitBasedBilling);
                        $doc->exportField($this->DoNotCheckStock);
                        $doc->exportField($this->AcceptRate);
                        $doc->exportField($this->PriceLevel);
                        $doc->exportField($this->LastQuotePrice);
                        $doc->exportField($this->PriceChange);
                        $doc->exportField($this->CommodityCode);
                        $doc->exportField($this->InstitutePrice);
                        $doc->exportField($this->CtrlOrDCtrlProduct);
                        $doc->exportField($this->ImportedDate);
                        $doc->exportField($this->IsImported);
                        $doc->exportField($this->FileName);
                        $doc->exportField($this->LPName);
                        $doc->exportField($this->GodownNumber);
                        $doc->exportField($this->CreationDate);
                        $doc->exportField($this->CreatedbyUser);
                        $doc->exportField($this->ModifiedDate);
                        $doc->exportField($this->ModifiedbyUser);
                        $doc->exportField($this->isActive);
                        $doc->exportField($this->AllowExpiryClaim);
                        $doc->exportField($this->BrandCode);
                        $doc->exportField($this->FreeSchemeBasedon);
                        $doc->exportField($this->DoNotCheckCostInBill);
                        $doc->exportField($this->ProductGroupCode);
                        $doc->exportField($this->ProductStrengthCode);
                        $doc->exportField($this->PackingCode);
                        $doc->exportField($this->ComputedMinStock);
                        $doc->exportField($this->ComputedMaxStock);
                        $doc->exportField($this->ProductRemark);
                        $doc->exportField($this->ProductDrugCode);
                        $doc->exportField($this->IsMatrixProduct);
                        $doc->exportField($this->AttributeCount1);
                        $doc->exportField($this->AttributeCount2);
                        $doc->exportField($this->AttributeCount3);
                        $doc->exportField($this->AttributeCount4);
                        $doc->exportField($this->AttributeCount5);
                        $doc->exportField($this->DefaultDiscountPercentage);
                        $doc->exportField($this->DonotPrintBarcode);
                        $doc->exportField($this->ProductLevelDiscount);
                        $doc->exportField($this->Markup);
                        $doc->exportField($this->MarkDown);
                        $doc->exportField($this->ReworkSalePrice);
                        $doc->exportField($this->MultipleInput);
                        $doc->exportField($this->LpPackageInformation);
                        $doc->exportField($this->AllowNegativeStock);
                        $doc->exportField($this->OrderDate);
                        $doc->exportField($this->OrderTime);
                        $doc->exportField($this->RateGroupCode);
                        $doc->exportField($this->ConversionCaseLot);
                        $doc->exportField($this->ShippingLot);
                        $doc->exportField($this->AllowExpiryReplacement);
                        $doc->exportField($this->NoOfMonthExpiryAllowed);
                        $doc->exportField($this->ProductDiscountEligibility);
                        $doc->exportField($this->ScheduleTypeCode);
                        $doc->exportField($this->AIOCDProductCode);
                        $doc->exportField($this->FreeQuantity);
                        $doc->exportField($this->DiscountType);
                        $doc->exportField($this->DiscountValue);
                        $doc->exportField($this->HasProductOrderAttribute);
                        $doc->exportField($this->FirstPODate);
                        $doc->exportField($this->SaleprcieAndMrpCalcPercent);
                        $doc->exportField($this->IsGiftVoucherProducts);
                        $doc->exportField($this->AcceptRange4SerialNumber);
                        $doc->exportField($this->GiftVoucherDenomination);
                        $doc->exportField($this->Subclasscode);
                        $doc->exportField($this->BarCodeFromWeighingMachine);
                        $doc->exportField($this->CheckCostInReturn);
                        $doc->exportField($this->FrequentSaleProduct);
                        $doc->exportField($this->RateType);
                        $doc->exportField($this->TouchscreenName);
                        $doc->exportField($this->FreeType);
                        $doc->exportField($this->LooseQtyasNewBatch);
                        $doc->exportField($this->AllowSlabBilling);
                        $doc->exportField($this->ProductTypeForProduction);
                        $doc->exportField($this->RecipeCode);
                        $doc->exportField($this->DefaultUnitType);
                        $doc->exportField($this->PIstatus);
                        $doc->exportField($this->LastPiConfirmedDate);
                        $doc->exportField($this->BarCodeDesign);
                        $doc->exportField($this->AcceptRemarksInBill);
                        $doc->exportField($this->Classification);
                        $doc->exportField($this->TimeSlot);
                        $doc->exportField($this->IsBundle);
                        $doc->exportField($this->ColorCode);
                        $doc->exportField($this->GenderCode);
                        $doc->exportField($this->SizeCode);
                        $doc->exportField($this->GiftCard);
                        $doc->exportField($this->ToonLabel);
                        $doc->exportField($this->GarmentType);
                        $doc->exportField($this->AgeGroup);
                        $doc->exportField($this->Season);
                        $doc->exportField($this->DailyStockEntry);
                        $doc->exportField($this->ModifierApplicable);
                        $doc->exportField($this->ModifierType);
                        $doc->exportField($this->AcceptZeroRate);
                        $doc->exportField($this->ExciseDutyCode);
                        $doc->exportField($this->IndentProductGroupCode);
                        $doc->exportField($this->IsMultiBatch);
                        $doc->exportField($this->IsSingleBatch);
                        $doc->exportField($this->MarkUpRate1);
                        $doc->exportField($this->MarkDownRate1);
                        $doc->exportField($this->MarkUpRate2);
                        $doc->exportField($this->MarkDownRate2);
                        $doc->exportField($this->_Yield);
                        $doc->exportField($this->RefProductCode);
                        $doc->exportField($this->Volume);
                        $doc->exportField($this->MeasurementID);
                        $doc->exportField($this->CountryCode);
                        $doc->exportField($this->AcceptWMQty);
                        $doc->exportField($this->SingleBatchBasedOnRate);
                        $doc->exportField($this->TenderNo);
                        $doc->exportField($this->SingleBillMaximumSoldQtyFiled);
                        $doc->exportField($this->Strength1);
                        $doc->exportField($this->Strength2);
                        $doc->exportField($this->Strength3);
                        $doc->exportField($this->Strength4);
                        $doc->exportField($this->Strength5);
                        $doc->exportField($this->IngredientCode1);
                        $doc->exportField($this->IngredientCode2);
                        $doc->exportField($this->IngredientCode3);
                        $doc->exportField($this->IngredientCode4);
                        $doc->exportField($this->IngredientCode5);
                        $doc->exportField($this->OrderType);
                        $doc->exportField($this->StockUOM);
                        $doc->exportField($this->PriceUOM);
                        $doc->exportField($this->DefaultSaleUOM);
                        $doc->exportField($this->DefaultPurchaseUOM);
                        $doc->exportField($this->ReportingUOM);
                        $doc->exportField($this->LastPurchasedUOM);
                        $doc->exportField($this->TreatmentCodes);
                        $doc->exportField($this->InsuranceType);
                        $doc->exportField($this->CoverageGroupCodes);
                        $doc->exportField($this->MultipleUOM);
                        $doc->exportField($this->SalePriceComputation);
                        $doc->exportField($this->StockCorrection);
                        $doc->exportField($this->LBTPercentage);
                        $doc->exportField($this->SalesCommission);
                        $doc->exportField($this->LockedStock);
                        $doc->exportField($this->MinMaxUOM);
                        $doc->exportField($this->ExpiryMfrDateFormat);
                        $doc->exportField($this->ProductLifeTime);
                        $doc->exportField($this->IsCombo);
                        $doc->exportField($this->ComboTypeCode);
                        $doc->exportField($this->AttributeCount6);
                        $doc->exportField($this->AttributeCount7);
                        $doc->exportField($this->AttributeCount8);
                        $doc->exportField($this->AttributeCount9);
                        $doc->exportField($this->AttributeCount10);
                        $doc->exportField($this->LabourCharge);
                        $doc->exportField($this->AffectOtherCharge);
                        $doc->exportField($this->DosageInfo);
                        $doc->exportField($this->DosageType);
                        $doc->exportField($this->DefaultIndentUOM);
                        $doc->exportField($this->PromoTag);
                        $doc->exportField($this->BillLevelPromoTag);
                        $doc->exportField($this->IsMRPProduct);
                        $doc->exportField($this->MrpList);
                        $doc->exportField($this->AlternateSaleUOM);
                        $doc->exportField($this->FreeUOM);
                        $doc->exportField($this->MarketedCode);
                        $doc->exportField($this->MinimumSalePrice);
                        $doc->exportField($this->PRate1);
                        $doc->exportField($this->PRate2);
                        $doc->exportField($this->LPItemCost);
                        $doc->exportField($this->FixedItemCost);
                        $doc->exportField($this->HSNId);
                        $doc->exportField($this->TaxInclusive);
                        $doc->exportField($this->EligibleforWarranty);
                        $doc->exportField($this->NoofMonthsWarranty);
                        $doc->exportField($this->ComputeTaxonCost);
                        $doc->exportField($this->HasEmptyBottleTrack);
                        $doc->exportField($this->EmptyBottleReferenceCode);
                        $doc->exportField($this->AdditionalCESSAmount);
                        $doc->exportField($this->EmptyBottleRate);
                    } else {
                        $doc->exportField($this->ProductCode);
                        $doc->exportField($this->ProductName);
                        $doc->exportField($this->DivisionCode);
                        $doc->exportField($this->ManufacturerCode);
                        $doc->exportField($this->SupplierCode);
                        $doc->exportField($this->AlternateSupplierCodes);
                        $doc->exportField($this->AlternateProductCode);
                        $doc->exportField($this->UniversalProductCode);
                        $doc->exportField($this->BookProductCode);
                        $doc->exportField($this->OldCode);
                        $doc->exportField($this->ProtectedProducts);
                        $doc->exportField($this->ProductFullName);
                        $doc->exportField($this->UnitOfMeasure);
                        $doc->exportField($this->UnitDescription);
                        $doc->exportField($this->BulkDescription);
                        $doc->exportField($this->BarCodeDescription);
                        $doc->exportField($this->PackageInformation);
                        $doc->exportField($this->PackageId);
                        $doc->exportField($this->Weight);
                        $doc->exportField($this->AllowFractions);
                        $doc->exportField($this->MinimumStockLevel);
                        $doc->exportField($this->MaximumStockLevel);
                        $doc->exportField($this->ReorderLevel);
                        $doc->exportField($this->MinMaxRatio);
                        $doc->exportField($this->AutoMinMaxRatio);
                        $doc->exportField($this->ScheduleCode);
                        $doc->exportField($this->RopRatio);
                        $doc->exportField($this->MRP);
                        $doc->exportField($this->PurchasePrice);
                        $doc->exportField($this->PurchaseUnit);
                        $doc->exportField($this->PurchaseTaxCode);
                        $doc->exportField($this->AllowDirectInward);
                        $doc->exportField($this->SalePrice);
                        $doc->exportField($this->SaleUnit);
                        $doc->exportField($this->SalesTaxCode);
                        $doc->exportField($this->StockReceived);
                        $doc->exportField($this->TotalStock);
                        $doc->exportField($this->StockType);
                        $doc->exportField($this->StockCheckDate);
                        $doc->exportField($this->StockAdjustmentDate);
                        $doc->exportField($this->Remarks);
                        $doc->exportField($this->CostCentre);
                        $doc->exportField($this->ProductType);
                        $doc->exportField($this->TaxAmount);
                        $doc->exportField($this->TaxId);
                        $doc->exportField($this->ResaleTaxApplicable);
                        $doc->exportField($this->CstOtherTax);
                        $doc->exportField($this->TotalTax);
                        $doc->exportField($this->ItemCost);
                        $doc->exportField($this->ExpiryDate);
                        $doc->exportField($this->BatchDescription);
                        $doc->exportField($this->FreeScheme);
                        $doc->exportField($this->CashDiscountEligibility);
                        $doc->exportField($this->DiscountPerAllowInBill);
                        $doc->exportField($this->Discount);
                        $doc->exportField($this->TotalAmount);
                        $doc->exportField($this->StandardMargin);
                        $doc->exportField($this->Margin);
                        $doc->exportField($this->MarginId);
                        $doc->exportField($this->ExpectedMargin);
                        $doc->exportField($this->SurchargeBeforeTax);
                        $doc->exportField($this->SurchargeAfterTax);
                        $doc->exportField($this->TempOrderNo);
                        $doc->exportField($this->TempOrderDate);
                        $doc->exportField($this->OrderUnit);
                        $doc->exportField($this->OrderQuantity);
                        $doc->exportField($this->MarkForOrder);
                        $doc->exportField($this->OrderAllId);
                        $doc->exportField($this->CalculateOrderQty);
                        $doc->exportField($this->SubLocation);
                        $doc->exportField($this->CategoryCode);
                        $doc->exportField($this->SubCategory);
                        $doc->exportField($this->FlexCategoryCode);
                        $doc->exportField($this->ABCSaleQty);
                        $doc->exportField($this->ABCSaleValue);
                        $doc->exportField($this->ConvertionFactor);
                        $doc->exportField($this->ConvertionUnitDesc);
                        $doc->exportField($this->TransactionId);
                        $doc->exportField($this->SoldProductId);
                        $doc->exportField($this->WantedBookId);
                        $doc->exportField($this->AllId);
                        $doc->exportField($this->BatchAndExpiryCompulsory);
                        $doc->exportField($this->BatchStockForWantedBook);
                        $doc->exportField($this->UnitBasedBilling);
                        $doc->exportField($this->DoNotCheckStock);
                        $doc->exportField($this->AcceptRate);
                        $doc->exportField($this->PriceLevel);
                        $doc->exportField($this->LastQuotePrice);
                        $doc->exportField($this->PriceChange);
                        $doc->exportField($this->CommodityCode);
                        $doc->exportField($this->InstitutePrice);
                        $doc->exportField($this->CtrlOrDCtrlProduct);
                        $doc->exportField($this->ImportedDate);
                        $doc->exportField($this->IsImported);
                        $doc->exportField($this->FileName);
                        $doc->exportField($this->GodownNumber);
                        $doc->exportField($this->CreationDate);
                        $doc->exportField($this->CreatedbyUser);
                        $doc->exportField($this->ModifiedDate);
                        $doc->exportField($this->ModifiedbyUser);
                        $doc->exportField($this->isActive);
                        $doc->exportField($this->AllowExpiryClaim);
                        $doc->exportField($this->BrandCode);
                        $doc->exportField($this->FreeSchemeBasedon);
                        $doc->exportField($this->DoNotCheckCostInBill);
                        $doc->exportField($this->ProductGroupCode);
                        $doc->exportField($this->ProductStrengthCode);
                        $doc->exportField($this->PackingCode);
                        $doc->exportField($this->ComputedMinStock);
                        $doc->exportField($this->ComputedMaxStock);
                        $doc->exportField($this->ProductRemark);
                        $doc->exportField($this->ProductDrugCode);
                        $doc->exportField($this->IsMatrixProduct);
                        $doc->exportField($this->AttributeCount1);
                        $doc->exportField($this->AttributeCount2);
                        $doc->exportField($this->AttributeCount3);
                        $doc->exportField($this->AttributeCount4);
                        $doc->exportField($this->AttributeCount5);
                        $doc->exportField($this->DefaultDiscountPercentage);
                        $doc->exportField($this->DonotPrintBarcode);
                        $doc->exportField($this->ProductLevelDiscount);
                        $doc->exportField($this->Markup);
                        $doc->exportField($this->MarkDown);
                        $doc->exportField($this->ReworkSalePrice);
                        $doc->exportField($this->MultipleInput);
                        $doc->exportField($this->LpPackageInformation);
                        $doc->exportField($this->AllowNegativeStock);
                        $doc->exportField($this->OrderDate);
                        $doc->exportField($this->OrderTime);
                        $doc->exportField($this->RateGroupCode);
                        $doc->exportField($this->ConversionCaseLot);
                        $doc->exportField($this->ShippingLot);
                        $doc->exportField($this->AllowExpiryReplacement);
                        $doc->exportField($this->NoOfMonthExpiryAllowed);
                        $doc->exportField($this->ProductDiscountEligibility);
                        $doc->exportField($this->ScheduleTypeCode);
                        $doc->exportField($this->AIOCDProductCode);
                        $doc->exportField($this->FreeQuantity);
                        $doc->exportField($this->DiscountType);
                        $doc->exportField($this->DiscountValue);
                        $doc->exportField($this->HasProductOrderAttribute);
                        $doc->exportField($this->FirstPODate);
                        $doc->exportField($this->SaleprcieAndMrpCalcPercent);
                        $doc->exportField($this->IsGiftVoucherProducts);
                        $doc->exportField($this->AcceptRange4SerialNumber);
                        $doc->exportField($this->GiftVoucherDenomination);
                        $doc->exportField($this->Subclasscode);
                        $doc->exportField($this->BarCodeFromWeighingMachine);
                        $doc->exportField($this->CheckCostInReturn);
                        $doc->exportField($this->FrequentSaleProduct);
                        $doc->exportField($this->RateType);
                        $doc->exportField($this->TouchscreenName);
                        $doc->exportField($this->FreeType);
                        $doc->exportField($this->LooseQtyasNewBatch);
                        $doc->exportField($this->AllowSlabBilling);
                        $doc->exportField($this->ProductTypeForProduction);
                        $doc->exportField($this->RecipeCode);
                        $doc->exportField($this->DefaultUnitType);
                        $doc->exportField($this->PIstatus);
                        $doc->exportField($this->LastPiConfirmedDate);
                        $doc->exportField($this->BarCodeDesign);
                        $doc->exportField($this->AcceptRemarksInBill);
                        $doc->exportField($this->Classification);
                        $doc->exportField($this->TimeSlot);
                        $doc->exportField($this->IsBundle);
                        $doc->exportField($this->ColorCode);
                        $doc->exportField($this->GenderCode);
                        $doc->exportField($this->SizeCode);
                        $doc->exportField($this->GiftCard);
                        $doc->exportField($this->ToonLabel);
                        $doc->exportField($this->GarmentType);
                        $doc->exportField($this->AgeGroup);
                        $doc->exportField($this->Season);
                        $doc->exportField($this->DailyStockEntry);
                        $doc->exportField($this->ModifierApplicable);
                        $doc->exportField($this->ModifierType);
                        $doc->exportField($this->AcceptZeroRate);
                        $doc->exportField($this->ExciseDutyCode);
                        $doc->exportField($this->IndentProductGroupCode);
                        $doc->exportField($this->IsMultiBatch);
                        $doc->exportField($this->IsSingleBatch);
                        $doc->exportField($this->MarkUpRate1);
                        $doc->exportField($this->MarkDownRate1);
                        $doc->exportField($this->MarkUpRate2);
                        $doc->exportField($this->MarkDownRate2);
                        $doc->exportField($this->_Yield);
                        $doc->exportField($this->RefProductCode);
                        $doc->exportField($this->Volume);
                        $doc->exportField($this->MeasurementID);
                        $doc->exportField($this->CountryCode);
                        $doc->exportField($this->AcceptWMQty);
                        $doc->exportField($this->SingleBatchBasedOnRate);
                        $doc->exportField($this->TenderNo);
                        $doc->exportField($this->SingleBillMaximumSoldQtyFiled);
                        $doc->exportField($this->Strength1);
                        $doc->exportField($this->Strength2);
                        $doc->exportField($this->Strength3);
                        $doc->exportField($this->Strength4);
                        $doc->exportField($this->Strength5);
                        $doc->exportField($this->IngredientCode1);
                        $doc->exportField($this->IngredientCode2);
                        $doc->exportField($this->IngredientCode3);
                        $doc->exportField($this->IngredientCode4);
                        $doc->exportField($this->IngredientCode5);
                        $doc->exportField($this->OrderType);
                        $doc->exportField($this->StockUOM);
                        $doc->exportField($this->PriceUOM);
                        $doc->exportField($this->DefaultSaleUOM);
                        $doc->exportField($this->DefaultPurchaseUOM);
                        $doc->exportField($this->ReportingUOM);
                        $doc->exportField($this->LastPurchasedUOM);
                        $doc->exportField($this->TreatmentCodes);
                        $doc->exportField($this->InsuranceType);
                        $doc->exportField($this->CoverageGroupCodes);
                        $doc->exportField($this->MultipleUOM);
                        $doc->exportField($this->SalePriceComputation);
                        $doc->exportField($this->StockCorrection);
                        $doc->exportField($this->LBTPercentage);
                        $doc->exportField($this->SalesCommission);
                        $doc->exportField($this->LockedStock);
                        $doc->exportField($this->MinMaxUOM);
                        $doc->exportField($this->ExpiryMfrDateFormat);
                        $doc->exportField($this->ProductLifeTime);
                        $doc->exportField($this->IsCombo);
                        $doc->exportField($this->ComboTypeCode);
                        $doc->exportField($this->AttributeCount6);
                        $doc->exportField($this->AttributeCount7);
                        $doc->exportField($this->AttributeCount8);
                        $doc->exportField($this->AttributeCount9);
                        $doc->exportField($this->AttributeCount10);
                        $doc->exportField($this->LabourCharge);
                        $doc->exportField($this->AffectOtherCharge);
                        $doc->exportField($this->DosageInfo);
                        $doc->exportField($this->DosageType);
                        $doc->exportField($this->DefaultIndentUOM);
                        $doc->exportField($this->PromoTag);
                        $doc->exportField($this->BillLevelPromoTag);
                        $doc->exportField($this->IsMRPProduct);
                        $doc->exportField($this->AlternateSaleUOM);
                        $doc->exportField($this->FreeUOM);
                        $doc->exportField($this->MarketedCode);
                        $doc->exportField($this->MinimumSalePrice);
                        $doc->exportField($this->PRate1);
                        $doc->exportField($this->PRate2);
                        $doc->exportField($this->LPItemCost);
                        $doc->exportField($this->FixedItemCost);
                        $doc->exportField($this->HSNId);
                        $doc->exportField($this->TaxInclusive);
                        $doc->exportField($this->EligibleforWarranty);
                        $doc->exportField($this->NoofMonthsWarranty);
                        $doc->exportField($this->ComputeTaxonCost);
                        $doc->exportField($this->HasEmptyBottleTrack);
                        $doc->exportField($this->EmptyBottleReferenceCode);
                        $doc->exportField($this->AdditionalCESSAmount);
                        $doc->exportField($this->EmptyBottleRate);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
